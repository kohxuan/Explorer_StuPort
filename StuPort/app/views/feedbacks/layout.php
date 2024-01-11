<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->


        <!--Content area here-->
        <?php //Baca current URL
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
        if (isset($_GET['activity_id']))
        {
            $activity_id = $_GET['activity_id'];
            $t_url = URLROOT . "/feedbacks/create/?activity_id=$activity_id";
        }
        else
        {

        }
                    $c_url = URLROOT . "/feedbacks"; 
                    

                    if (isset($data['feedback']) && is_object($data['feedback'])) {
                    //$u_url = URLROOT . "/feedbacks/edit/".$data['feedback']->feedback_id; 
                    }else{
                        echo "No feedback data send<br>";
                    }

                    //echo $t_url."<br>";
                    //echo $url."<br>";

                    //error_reporting(0);
                    if ($url == $c_url) {

                        require 'manage.php';
                    }elseif($url == $t_url){
                        require 'create.php';
                    } else {

                    }

        ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


