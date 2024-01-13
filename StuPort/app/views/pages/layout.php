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

        // if($url == $p_url){
        //     // Redirect based on user_role
        //     if ($_SESSION['user_role'] == 'Administrator') {
        //         require 'dashboard_administrator.php';
        //     } elseif ($_SESSION['user_role'] == 'Master Administrator') {
        //         require 'dashboard_masteradministrator.php';
        //     } elseif ($_SESSION['user_role'] == 'Student') {
        //         // Default redirect for other user roles
        //         require 'dashboard_student.php';
        //     } elseif ($_SESSION['user_role'] == 'Lecturer') {
        //         require 'dashboard_lecturer.php';
        //     } else {
        //         echo "User_role undefined.";
        //         header('location:' . URLROOT . '/users/login');
        //     }
        // }



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
                require 'generate_resume_student.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Lecturer") {
                echo "Session not set.";
            } else {
                echo "Session not set.";
            }
        }
        elseif ($url == $v_url) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'view_profile_student.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Lecturer") {
                require 'view_profile_lecturer.php';
            } else {
                echo "Session not set.";
            }
        }
        elseif ($url == $d_url) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Student") {
                require 'dashboard_stud.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Lecturer") {
                require 'dashboard_lect.php';
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Administrator") {
                require 'dashboard_admin.php';
            }else {
                echo "Session not set.";
            }
        }
        else {
           
        }

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
        $lecturerSql = "SELECT COUNT(*) as lecturerCount FROM lecturer";
        $lecturerResult = $conn->query($lecturerSql);

        $lecturerCount = 0;

        if ($lecturerResult->num_rows > 0) {
            $lecturerRow = $lecturerResult->fetch_assoc();
            $lecturerCount = $lecturerRow["lecturerCount"];
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

        ?>

<?php
        // Assuming you have your database connection in place
        // Query to retrieve data from the Activity table
        $stmt = $conn->prepare('SELECT category, COUNT(*) as num_activities FROM activity GROUP BY category');
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($category, $num_activities);

        // Fetch data into an associative array
        $activityData = array();
        while ($stmt->fetch()) {
            $activityData[] = array('category' => $category, 'num_activities' => $num_activities);
        }

        // Prepare labels and data for the chart
        $labels = array_column($activityData, 'category');
        $data = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Number of Activities Created',
                    'data' => array_column($activityData, 'num_activities'),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ];

        // Close the statement
        $stmt->close();
        // Close the database connection
        $conn->close();
        ?>

        <?php if ($_SESSION['user_role'] == 'Administrator') : ?>
            <div class="container">
            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Activity Statistics</h5>
                    </div>
                    <div class="card-body">
                        <!-- Create a canvas for the chart with adjusted width and height -->
                        <canvas id="myChart" width="210" height="90"></canvas>
                    </div>

                    <!-- Script to initialize the bar chart -->
                    <script>
                        // Your existing Bar Chart script
                        var ctxBar = document.getElementById('myChart').getContext('2d');
                        var myBarChart = new Chart(ctxBar, {
                            type: 'bar',
                            data: <?php echo json_encode($data); ?>,
                            options: {
                                scales: {
                                    x: {
                                        beginAtZero: true,
                                        maxTicksLimit: 6,
                                        title: {
                                            display: true,
                                            text: 'Type of Category' // Label for the x-axis
                                        }
                                    },
                                    y: {
                                        beginAtZero: true,
                                        stepSize: 1,
                                        title: {
                                            display: true,
                                            text: 'Number of Activities Created' // Label for the y-axis
                                        },
                                        ticks: {
                                            display: false // Hide the tick labels
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-bookmark-check-fill" style="font-size: 3rem; color: black; margin-right: 1rem;"></i>
                            <div>
                                <h3 class="card-title">Manage Activity</h3>
                                <p class="card-text">YouthVentures activity which collaborate with its clients and partners</p>
                                <p class="card-text">Aimed to improve the student participation</p>
                                <a href="<?php echo URLROOT . '/activities'; ?>" class="btn btn-primary">Explore More</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        <?php endif; ?>

        

        <?php if ($_SESSION['user_role'] == 'Master Administrator') : ?>

        <div class="container">
        <div class="row">
        <!-- First Card -->
        <div class="col-md-6 mb8">
        <div class="card card-flush h-md-75 mb-5 mb-xl-10">
            <div class="card-header pt-5">
                <div class="card-title d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"><?php echo $userCount; ?></span>
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>2.2%
                        </span>
                    </div>
                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Registered Users</span>
                </div>
            </div>
            <div class="card-body d-flex align-items-center">
                <!-- Doughnut Chart -->
                <div style="flex: 1;">
                    <canvas id="userChart" width="200" height="130"></canvas>
                </div>

                <div class="d-flex flex-column content-justify-center" style="flex: 1; margin-left: 20px;">
                    <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                        <div class="bullet w-8px h-6px rounded-2" style="background-color: #dc3545; margin-right: 10px;"></div>
                        <div class="text-gray-500 flex-grow-1">Clients / Partners</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end"><?php echo ($userCount - $lecturerCount - $studentCount); ?></div>
                    </div>
                    <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                        <div class="bullet w-8px h-6px rounded-2" style="background-color: #007bff; margin-right: 10px;"></div>
                        <div class="text-gray-500 flex-grow-1">Lecturers</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end"><?php echo $lecturerCount; ?></div>
                    </div>
                    <div class="d-flex fs-6 fw-semibold align-items-center">
                        <div class="bullet w-8px h-6px rounded-2" style="background-color: #28a745; margin-right: 10px;"></div>
                        <div class="text-gray-500 flex-grow-1">Students</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end"><?php echo $studentCount; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script to initialize Doughnut Chart -->
        <script>
            var ctx = document.getElementById('userChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [<?php echo ($userCount - $lecturerCount - $studentCount); ?>, <?php echo $lecturerCount; ?>, <?php echo $studentCount; ?>],
                        backgroundColor: ['#dc3545', '#007bff', '#28a745'],
                    }]
                },
                options: {
                    cutoutPercentage: 80,
                    responsive: false,
                    maintainAspectRatio: false,
                    legend: {
                        display: true
                    }
                }
            });
        </script>


        </div>

        <!-- Second Card -->
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Activity Categorization Statistics</h5>
                </div>
                <div class="card-body">
                    <!-- Create a canvas for the chart with adjusted width and height -->
                    <canvas id="myChart" width="210" height="90"></canvas>
                </div>

                <!-- Script to initialize the bar chart -->
                <script>
                    // Your existing Bar Chart script
                    var ctxBar = document.getElementById('myChart').getContext('2d');
                    var myBarChart = new Chart(ctxBar, {
                        type: 'bar',
                        data: <?php echo json_encode($data); ?>,
                        options: {
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    maxTicksLimit: 6,
                                    title: {
                                        display: true,
                                        text: 'Type of Category' // Label for the x-axis
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1,
                                    title: {
                                        display: true,
                                        text: 'Number of Activities Created' // Label for the y-axis
                                    },
                                    ticks: {
                                        display: false // Hide the tick labels
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-bookmark-check-fill" style="font-size: 3rem; color: black; margin-right: 1rem;"></i>
                        <div>
                            <h3 class="card-title">Manage Activity</h3>
                            <p class="card-text">YouthVentures activity with its clients/partners</p>
                            <a href="<?php echo URLROOT . '/activities'; ?>" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-patch-check-fill" style="font-size: 3rem; color: black; margin-right: 1rem;"></i>
                        <div>
                            <h3 class="card-title">Manage Rewards</h3>
                            <p class="card-text">Rewards to the registered students</p>
                            <a href="<?php echo URLROOT . '/rewards'; ?>" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-chat-right-text" style="font-size: 3rem; color: black; margin-right: 1rem;"></i>
                        <div>
                            <h3 class="card-title">Student Activity</h3>
                            <p class="card-text">To validate student joined activity</p>
                            <a href="<?php echo URLROOT . '/perActivity'; ?>" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php endif; ?>

        <?php if ($_SESSION['user_role'] == 'Lecturer') : ?>

        <div class="card">
            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                <?php require "view_profile_lecturer.php"; ?>
            </div>
            <!--end::Card body-->
        </div>

        <?php endif; ?>


        <?php if ($_SESSION['user_role'] == 'Student') : ?>

            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-2 pb-4 d-flex align-items-center">
                    <?php require "view_profile_student.php"; ?>
                </div>
                <!--end::Card body-->
            </div>

        <?php endif; ?>

        <?php if ($_SESSION['user_role'] == 'Lecturer') : ?>

        <div class="card">
            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                <?php require "view_profile_lecturer.php"; ?>
            </div>
            <!--end::Card body-->
        </div>

        <?php endif; ?>


        <!--End of Content area here-->


        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->