<?php
/**
 * JobController – Public Job Listing & Detail
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/JobModel.php';
require_once __DIR__ . '/../models/DepartmentModel.php';
require_once __DIR__ . '/../models/ApplicationModel.php';

class JobController
{
    private JobModel $jobModel;
    private DepartmentModel $deptModel;
    private ApplicationModel $appModel;

    public function __construct()
    {
        $this->jobModel = new JobModel();
        $this->deptModel = new DepartmentModel();
        $this->appModel = new ApplicationModel();
    }

    /** Home / Landing Page */
    public function home(): void
    {
        $featuredJobs = $this->jobModel->getFeatured(6);
        $internships = $this->jobModel->getInternships(4);
        $departments = $this->deptModel->getAllWithJobCount();
        $jobStats = $this->jobModel->getStats();
        $flash = getFlash();
        require __DIR__ . '/../views/home.php';
    }

    /** iBegin Landing Page */
    public function ibegin(): void
    {
        $departments = $this->deptModel->getAllWithJobCount();
        $flash = getFlash();
        require __DIR__ . '/../views/jobs/ibegin.php';
    }

    /** Guided Search Page */
    public function guidedSearch(): void
    {
        $departments = $this->deptModel->getAllWithJobCount();
        $flash = getFlash();
        require __DIR__ . '/../views/jobs/guided_search.php';
    }

    /** Job Listing with Filters + Pagination */
    public function list(): void
    {
        $filters = [
            'keyword' => trim($_GET['keyword'] ?? ''),
            'department' => intval($_GET['department'] ?? 0) ?: null,
            'location' => trim($_GET['location'] ?? ''),
            'job_type' => trim($_GET['job_type'] ?? ''),
            'experience' => $_GET['experience'] ?? '',
        ];

        $page = max(1, intval($_GET['page'] ?? 1));
        $jobs = $this->jobModel->getAll($filters, $page);
        $total = $this->jobModel->getCount($filters);
        $pages = ceil($total / JOBS_PER_PAGE);

        $departments = $this->deptModel->getAll();
        $locations = $this->jobModel->getDistinctLocations();
        $flash = getFlash();

        // AJAX request – return JSON
        if (!empty($_GET['ajax'])) {
            header('Content-Type: application/json');
            echo json_encode(['jobs' => $jobs, 'total' => $total, 'pages' => $pages, 'page' => $page]);
            exit;
        }

        require __DIR__ . '/../views/jobs/list.php';
    }

    /** Job Detail Page */
    public function detail(int $id): void
    {
        $job = $this->jobModel->getById($id);
        if (!$job) {
            http_response_code(404);
            require __DIR__ . '/../views/404.php';
            return;
        }

        $hasApplied = false;
        if (isLoggedIn()) {
            $hasApplied = $this->appModel->hasApplied($id, $_SESSION['user_id']);
        }

        // Related jobs (same dept, different id)
        $related = array_filter(
            $this->jobModel->getAll(['department' => $job['department_id']], 1),
        fn($j) => $j['id'] !== $job['id']
        );
        $related = array_slice(array_values($related), 0, 3);

        $flash = getFlash();
        require __DIR__ . '/../views/jobs/detail.php';
    }
}
