<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.js"></script>

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->


        <!--Content area here-->

        <?php
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        // Append the host(domain name, ip) to the URL.   
        $url .= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL   
        $url .= $_SERVER['REQUEST_URI'];

        ?>

        <?php

        $p_url = URLROOT . "/pages/index"; //home_url
        $e_url = URLROOT . "/pages/edit_profile"; //edit_user_url
        $r_url = URLROOT . "/pages/generate_resume";
        $v_url = URLROOT . "/pages/view_profile";
        $d_url = URLROOT . "/pages/dashboard";


        if ($url == $e_url) {
            //page edit user

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'edit_profile_student.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Lecturer") {
                require 'edit_profile_lecturer.php';
            } else {
                echo "Session not set.";
            }
        } elseif ($url == $r_url) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'generate_resume_student.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Lecturer") {
                echo "Sorry, you do not have permission to download your resume.";
            } else {
                echo "Session not set.";
            }
        } elseif ($url == $v_url) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'view_profile_student.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Lecturer") {
                require 'view_profile_lecturer.php';
            } else {
                echo "Session not set.";
            }
        } elseif ($url == $p_url) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'dashboard_student.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Lecturer") {
                require 'dashboard_lecturer.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Administrator") {
                require 'dashboard_administrator.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Master Administrator") {
                require 'dashboard_masteradministrator.php';
            } else {
                echo "Session not set.";
            }
        } else {
        }

        ?>

    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->