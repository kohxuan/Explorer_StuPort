# <img src="https://github.com/user-attachments/assets/3546ff70-903b-467f-8435-f4393d46d81e" width="30px" height="30px"> <img src="https://github.com/user-attachments/assets/fc371ce7-41e8-434d-a85c-d94ec03a7040" width="105px" height="30px"> Youth Ventures Student Portfolio Management System (StuPort) 🚀
**StuPort** is a web-based management system designed for **Youth Ventures Asia (YV)** to efficiently collect, manage, and utilize student portfolio information. It empowers students to track their activities and provides administrators with tools for activity management, feedback collection, and analytics. This system is built using **PHP** and **MySQL**, utilizing an MVC-like architecture and the Metronic UI template.
<br><br>

### ✨ Features
- **User Authentication & Profile Management**: Secure Sign Up, Log In, Log Out, and comprehensive profile management for Students, Lecturers, and Admins (handled in `app/controllers/Users.php` and `app/models/User.php`). Passwords should be securely handled.
- **Dashboard & Analytics**: Role-specific dashboards (e.g., `app/views/pages/dashboard_student.php`) providing key insights.
- **YV Activity Management**: Create, Read, Update, Delete (CRUD) operations for activities (`app/controllers/Activities.php`, `app/models/Activity.php`).
- **Student Registration**: Students can register for activities (`app/controllers/Registrations.php`, `app/models/Registration.php`).
- **Feedback System**: Handle activity feedback (`app/controllers/Feedbacks.php`, `app/models/Feedback.php`).
- **Reward Management**: Manage rewards and badges (`app/controllers/Rewards.php`, `app/controllers/Badges.php`, corresponding models).
- **Resume/Transcript Generation**: Students can generate reports (`app/views/pages/generate_resume_student.php`).
- **Personal Activity Tracking**: Students manage personal activities (`app/controllers/perActivity.php`, `app/models/perActivities.php`).
<br>

### 🛠️ Technical Overview
- **Backend Scripting**: PHP (Version check recommended, e.g., 7.4+)
- **Database**: MySQL (Commonly used with XAMPP)
- **Web Server**: Apache (Bundled with XAMPP)
- **Architecture**: MVC-like (Controllers, Models, Views in `app/`)
- **Frontend Template**: Metronic HTML Admin Template v8.2.1 (Assets used in `public/assets/`)
- **Styling/Frontend**: HTML, CSS, JavaScript (Bundled with Metronic)
- **URL Routing**: Handled via `.htaccess` and a core library/router (`app/libraries/` and `public/index.php`).
- **Version Control**: GitHub
<br>

### 📁 Key Files / Directories
- **`StuPort/`**: Main project root directory.
    - **`app/`**: Core application logic.
        - `controllers/`: Handles user requests and business logic.
        - `models/`: Interacts with the database.
        - `views/`: Contains PHP/HTML templates for the UI.
        - `config/`: Likely contains configuration settings (check files within).
        - `libraries/`: Core framework classes (e.g., Controller, Database, Core router).
        - `helpers/`: Utility functions.
        - `require.php`: Bootsraps the application, includes necessary files.
        - `.htaccess`: URL rewriting rules for the app.
    - **`public/`**: Web server's document root for this project.
        - `index.php`: Entry point for all requests.
        - `assets/`: Contains static files (CSS, JS, images) likely copied/adapted from the Metronic template.
        - `uploads/`: Directory for file uploads (ensure permissions are set correctly).
        - `.htaccess`: URL rewriting rules for the public directory.
    - **`config.php`**: Top-level configuration file (Database credentials).
    - **`.htaccess`**: Top-level URL rewriting rules.
    - **`niagaped_Explorer.sql`**: Database schema/data file.
- **`metronic_html_v8.2.1_demo18/`**: (Located alongside `StuPort/`) Contains the source files for the Metronic template used. Assets are copied from here into `StuPort/public/assets/`.
<br>

### 👥 Target Audience / Actors
- **Students**: Participants in Youth Ventures programs.
- **Administrators (Admins)**: Staff from YV partner organizations.
- **Master Administrators**: Core Youth Ventures Asia staff.
- **Lecturers**: Validators for student personal activities.
<br>

### 🚀 Getting Started
1.  **Prerequisites**:
    *   XAMPP installed (provides Apache, MySQL, PHP). Ensure Apache and MySQL services are running via the XAMPP Control Panel.
    *   GitHub
    *   A database management tool (phpMyAdmin (included with XAMPP)).

2.  **Clone the Repository**:
    *   Clone the repository *into* your XAMPP `htdocs` directory, maintaining the structure you provided:
        ```bash
        cd C:\xampp\htdocs\
        git clone https://github.com/kohxuan/Explorer_StuPort.git explorer
        # This should create C:\xampp\htdocs\explorer\StuPort\ and C:\xampp\htdocs\explorer\metronic_html_v8.2.1_demo18\
        ```
    *   *(If you cloned elsewhere, copy/move the `explorer` folder containing `StuPort` and `metronic_html...` into `C:\xampp\htdocs\`)*

3.  **Configure Database**:
    *   Open phpMyAdmin (`http://localhost/phpmyadmin`).
    *   Create a new database. Let's assume you name it `stuport_db` (or use the name suggested by the `.sql` files like `niagaped_explorer`).
    *   Check the database configuration file(s) within the `StuPort` project (likely `StuPort/config.php` or possibly files inside `StuPort/app/config/`). Update these files with your database details:
        *   Database Host (usually `localhost` or `127.0.0.1` for XAMPP)
        *   Database Name (e.g., `stuport_db`)
        *   Database User (usually `root` for default XAMPP)
        *   Database Password (usually empty `` for default XAMPP)

4.  **Set Up Database Schema/Tables**:
    *   In phpMyAdmin, select your newly created database (e.g., `stuport_db`).
    *   Go to the "Import" tab.
    *   Choose the `.sql` file provided (`StuPort/niagaped_Explorer.sql`).
    *   Click "Go" or "Import" to execute the SQL script and create the tables.

5.  **Web Server Configuration (XAMPP)**:
    *   Ensure Apache is running from the XAMPP Control Panel.
    *   Make sure Apache's `mod_rewrite` module is enabled (it usually is by default in XAMPP). This is needed for the `.htaccess` files to work correctly.

6.  **Access StuPort**:
    *   Open your browser and navigate to the project's public directory via localhost:
        `http://localhost/explorer/StuPort/public/`
    *   *Alternatively, if the root `.htaccess` and `index.php` handle routing correctly, you might access it via `http://localhost/explorer/StuPort/`.* Try the `/public/` URL first.
<br>
