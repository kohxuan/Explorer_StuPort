

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->



        <!--Content area here-->
        <?php //Baca current URL
            // Initialize $u_url
             $u_url = "";
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
                    //rule :depend what root file u wanna use
                    $c_url = URLROOT . "/activities"; 
                    $t_url = URLROOT . "/activities/create"; 

                    if (isset($data['activity']) && is_object($data['activity'])) {
                    $u_url = URLROOT . "/activities/update/".$data['activity']->activity_id; //Update must have id // Dynamic URL (id from database) 
                    }
                    // echo $url."<br>".$u_url;

                    //error_reporting(0);
                    //Buat comparison and lead to the correspond website defined earlier
                    if ($url == $c_url) {
        
                        require 'manage.php'; //All are Form


                    }elseif($url == $t_url){

                        require 'create.php'; //All are Form
                        
                    }elseif($url == $u_url){

                    require 'update.php'; //All are Form
                        
                    }
                    
                    else{
                       
                    }
                    

                    ?>


        <!--end of Content area here-->
        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


