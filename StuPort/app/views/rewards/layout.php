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

                    // rule to access each file
                    $c_url = URLROOT . "/rewards";
                    $t_url = URLROOT . "/rewards/create";

                    if (isset($data['rewards']) && is_object($data['rewards'])) {
                        $u_url = URLROOT . "/rewards/update/".$data['rewards']->badge_name; 
                    }

                    //error_reporting(0);
                    if ($url == $c_url) {
        
                        require 'listRewards.php';

                    } elseif($url == $t_url) {

                        require 'create.php';

                    } elseif($url == $u_url) {

                        require 'update.php';

                    } else {

                    }

                    ?>

        <!--End of Content area here-->

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


