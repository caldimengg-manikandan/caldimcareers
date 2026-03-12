<?php
/**
 * AuthController – Candidate Registration & Login
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../helpers/mailer.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/AdminModel.php';

class AuthController
{
    private UserModel $userModel;
    private AdminModel $adminModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->adminModel = new AdminModel();
    }

    // ── Candidate Registration ───────────────────────────────────
    public function registerForm(): void
    {
        if (isLoggedIn()) {
            redirect('my-applications');
        }
        $csrf = generateCsrf();
        $flash = getFlash();
        require __DIR__ . '/../../frontend/views/auth/register.php';
    }

    public function registerPost(): void
    {
        verifyCsrf();

        $name = trim($_POST['full_name'] ?? '');
        $email = trim(strtolower($_POST['email'] ?? ''));
        $phone = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        // Validation
        $errors = [];
        if (strlen($name) < 2)
            $errors[] = 'Full name is required.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = 'Valid email is required.';
        if (strlen($password) < 8)
            $errors[] = 'Password must be at least 8 characters.';
        if ($password !== $confirm)
            $errors[] = 'Passwords do not match.';
        if ($this->userModel->emailExists($email))
            $errors[] = 'This email is already registered.';

        if ($errors) {
            setFlash('error', implode('<br>', $errors));
            redirect('register');
        }

        $userId = $this->userModel->register([
            'full_name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
        ]);

        loginUser(['id' => $userId, 'full_name' => $name, 'email' => $email]);
        setFlash('success', 'Welcome to ' . COMPANY . '! Your account has been created.');
        redirect('my-applications');
    }

    // ── Candidate Login ──────────────────────────────────────────
    public function loginForm(): void
    {
        if (isLoggedIn()) {
            redirect('my-applications');
        }
        $csrf = generateCsrf();
        $flash = getFlash();
        require __DIR__ . '/../../frontend/views/auth/login.php';
    }

    public function loginPost(): void
    {
        verifyCsrf();

        $email = trim(strtolower($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            setFlash('error', 'Invalid email or password.');
            redirect('login');
        }

        loginUser($user);
        $this->userModel->updateLastLogin($user['id']);

        $intended = $_SESSION['intended'] ?? 'my-applications';
        unset($_SESSION['intended']);
        redirect($intended);
    }

    // ── Logout ───────────────────────────────────────────────────
    public function logout(): void
    {
        logoutUser();
        setFlash('success', 'You have been logged out.');
        redirect('login');
    }

    // ── Admin Login ──────────────────────────────────────────────
    public function adminLoginForm(): void
    {
        if (isAdmin()) {
            redirect('admin');
        }
        $csrf = generateCsrf();
        $flash = getFlash();
        require __DIR__ . '/../../frontend/views/admin/login.php';
    }

    public function adminLoginPost(): void
    {
        verifyCsrf();

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $admin = $this->adminModel->findByUsername($username);

        if (!$admin || !$this->adminModel->verifyPassword($password, $admin['password_hash'])) {
            setFlash('error', 'Invalid credentials.');
            redirect('admin/login');
        }

        loginAdmin($admin);
        $this->adminModel->updateLastLogin($admin['id']);
        redirect('admin');
    }

    // ── Admin Logout ─────────────────────────────────────────────
    public function adminLogout(): void
    {
        logoutUser();
        redirect('admin/login');
    }
}
