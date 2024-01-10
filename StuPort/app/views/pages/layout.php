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
        $r_url = URLROOT . "/resume";
        $v_url = URLROOT . "/pages/view_profile";


        if ($url == $e_url) {
            //page edit user

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'edit_profile_student.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Lecturer") {
                require 'edit_profile_lecturer.php';
            } else {
                echo "Session not set.";
            }
        }
        elseif ($url == $r_url) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                // require URLROOT . '/resume/generate_resume.php';
            } 
            else {
                echo "Session not set.";
            }
        }
        elseif ($url == $v_url) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'view_profile_student.php';
            } 
            else {
                echo "Session not set.";
            }
        }

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
        // }

        ?>
        
        <?php
        // Assuming you have a database connection established

        // Replace these with your actual database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "niagaped_Explorer";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve the total number of registered users
        $userSql = "SELECT COUNT(*) as userCount FROM user";
        $userResult = $conn->query($userSql);

        $userCount = 0;

        if ($userResult->num_rows > 0) {
            $userRow = $userResult->fetch_assoc();
            $userCount = $userRow["userCount"];
        }

        // Query to retrieve the total number of registered students
        $studentSql = "SELECT COUNT(*) as studentCount FROM student";
        $studentResult = $conn->query($studentSql);

        $studentCount = 0;

        if ($studentResult->num_rows > 0) {
            $studentRow = $studentResult->fetch_assoc();
            $studentCount = $studentRow["studentCount"];
        }

        // Query to retrieve the total number of clients/partners
        $clientSql = "SELECT COUNT(*) as clientCount FROM administrator";
        $clientResult = $conn->query($clientSql);

        $clientCount = 0;

        if ($clientResult->num_rows > 0) {
            $clientRow = $clientResult->fetch_assoc();
            $clientCount = $clientRow["clientCount"];
        }

        // Close the database connection
        $conn->close();
        ?>

        <!-- Display the card with dynamic data -->
        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                        <!--begin::Amount for total registered users-->
                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"><?php echo $userCount; ?></span>
                        <!--end::Amount-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>2.2%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Registered Users</span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                <!-- Display the dynamic data -->
                <div class="d-flex flex-column content-justify-center w-100">
                    <!--begin::Label for clients/partners-->
                    <div class="d-flex fs-6 fw-semibold align-items-center">
                        <!--begin::Bullet-->
                        <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                        <!--end::Bullet-->
                        <!--begisn::Label-->
                        <div class="text-gray-500 flex-grow-1 me-4">Clients / Partners</div>
                        <!--end::Label-->
                        <!--begin::Stats-->
                        <div class="fw-bolder text-gray-700 text-xxl-end"><?php echo $clientCount; ?></div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Label-->
                    <!--begin::Label for students-->
                    <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                        <!--begin::Bullet-->
                        <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                        <!--end::Bullet-->
                        <!--begin::Label-->
                        <div class="text-gray-500 flex-grow-1 me-4">Students</div>
                        <!--end::Label-->
                        <!--begin::Stats-->
                        <div class="fw-bolder text-gray-700 text-xxl-end"><?php echo $studentCount; ?></div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Labels-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 4-->
	


        <!--End of Content area here-->


        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->