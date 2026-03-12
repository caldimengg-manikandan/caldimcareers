# Caldim Engineering Careers Portal

A state-of-the-art career management system for Caldim Engineering.
Features:
- Candidate registration and application tracking.
- Admin dashboard for job management and candidate review.
- Dynamic job filtering and search.
- Clean and modern TCS-inspired UI.

## Local Development (Terminal)

### Prerequisites:
- PHP installed (e.g., from XAMPP).
- MySQL server (XAMPP or standalone).

### Running Locally:
1. Ensure your MySQL server is running.
2. From the project root, run:
```cmd
c:\xampp\php\php.exe -S localhost:8000 router.php
```
3. Access the portal at [http://localhost:8000/](http://localhost:8000/).

## Database Setup
1. Create a database named `caldim_careers`.
2. Import `database/schema.sql` (for an empty project) or `database/full_database_dump.sql` (to include current test data).

## Configuration
Modify `config/db.php` for database connection credentials and `config/config.php` for global application settings. 
The application currently connects to the **MySQL 8.0 server on port 3307**.
