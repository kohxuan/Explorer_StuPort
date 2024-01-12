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
                     $c_url = URLROOT . "/studentBadge";
                     $t_url = URLROOT . "/studentBadge/create";

                    if (isset($data['studentBadge']) && is_object($data['studentBadge'])) {
                         $u_url = URLROOT . "/studentBadge/update/".$data['studentBadge']->badge_name; 
                     }

                    // //error_reporting(0);
                    if ($url == $c_url) {
        
                        require 'manage.php';

                     } elseif($url == $t_url) {

                         require 'view.php';

                     }
                    

                    ?>

        <!--End of Content area here-->

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


