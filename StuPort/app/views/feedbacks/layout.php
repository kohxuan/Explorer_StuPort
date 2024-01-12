<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->


        <!--Content area here-->
        <?php //Baca current URL
                    // Read the current URL
                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                        $url = "https://";
                    } else {
                        $url = "http://";
                    }
                    
                    // Append the host (domain name, IP) to the URL.
                    $url .= $_SERVER['HTTP_HOST'];
                    
                    // Append the requested resource location to the URL.
                    $url .= $_SERVER['REQUEST_URI'];
                    
                    $t_url = ''; // Initialize $t_url
                    
                    if (isset($_GET['activity_id'])) {
                        $activity_id = $_GET['activity_id'];
                        $t_url = URLROOT . "/feedbacks/create/?activity_id=$activity_id";
                    }
                    
                    $c_url = URLROOT . "/feedbacks";
                    
                    // Check if feedback data is set and is an object
                    if (isset($data['feedback']) && is_object($data['feedback'])) {
                        $u_url = URLROOT . "/feedbacks/edit/" . $data['feedback']->feedback_id;
                    } else {
                        // $u_url is not set in the provided code
                    }
                    
                    // Compare the current URL with defined URLs and include the corresponding files
                    if ($url == $c_url) {
                        require 'manage.php';
                    } elseif ($url == $t_url) {
                        require 'create.php';
                    } elseif ($url == $u_url) {
                        require 'edit.php';
                    } else {
                        // Handle other cases if needed
                    }

        ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


