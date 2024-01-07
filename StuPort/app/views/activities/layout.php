

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
                    $url = "http:"
                    ?>

        <?php
                    //rule :depend what root file u wanna use
                    $c_url = URLROOT . "/activities"; 
                   $t_url = URLROOT . "/activities/create"; 

                    // if (isset($data['post']) && is_object($data['post'])) {
                    // $u_url = URLROOT . "/posts/update/".$data['post']->id; //Update must have id // Dynamic URL (id from database) 
                    // }


                    //error_reporting(0);
                    //Buat comparison and lead to the correspond website defined earlier
                    if ($url == $c_url) {
        
                        require 'manage.php'; //All are Form


                    }else if( $url == $c_url){
                        
                    }else{
                        require 'manage.php'; //All are Form
                    }
                    

                    ?>


        <!--end of Content area here-->
        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


