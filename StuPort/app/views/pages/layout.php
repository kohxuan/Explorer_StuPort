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

        $h_url = URLROOT .  "/"; //home_url
        $e_url = URLROOT . "/pages/edit_profile"; //edit_user_url


        if ($url == $e_url) {
            //page edit user

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'edit_profile_student.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Administrator") {
                require 'edit_profile_admin.php';
            } else {
                echo "Session not set.";
            }
        }

        $d_url = URLROOT . "/pages"; //edit_user_url
        if ($url == $d_url) {
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'index_student.php';
            }
        } else {

            // if (isset($_SESSION['email'])) {
            //     $pageModel = new Page();
            //     $userRole = $pageModel->getUserRole($_SESSION['email']);

            //     if ($userRole === "Student") {

            //         require 'edit_profile.php';

            //     } elseif ($userRole === "Administrator") {

            //     } elseif ($userRole === "Master Administrator") {

            //     } else {
            //         echo "Unknown or invalid role." . $userRole;
            //     }
            // } else {
            //     echo "User ID not set in the session.";
            // }
        }

        ?>


        <!--End of Content area here-->


        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->