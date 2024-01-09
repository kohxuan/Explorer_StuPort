<?php
class Pages extends Controller {
    public function __construct()
    {
        $this->pageModel = $this->model('Page');
    }

    public function index() {
        $data = [
            // 'title' => 'Home page'
            'pages' => 'pages'
        ];

        // $this->view('index', $data);
        $this->view('pages/index', $data);
    }

    public function edit_profile()
    {

        //check for post from form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if server request open

            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Check if file was uploaded without errors
            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["file"]["name"]; //Checking
                $filetype = $_FILES["file"]["type"];
                $filesize = $_FILES["file"]["size"];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)){
                    $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                    header("Location: " . URLROOT . "/pages/edit_profile");
                }

                $username = $_SESSION['email']; //Email will be the name of folder created
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                            header("Location: " . URLROOT . "/pages/edit_profile");
                } 
                $location = "images/users/" . $username;

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/users/' . $username, 0777, true);
                            }

                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                            $location .= "/" . $fileNameNew;

                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/pages/edit_profile");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/pages/edit_profile");
              
            }

            if (isset($_FILES["filepdf"]) && $_FILES["filepdf"]["error"] == 0) {
                $allowed = array(
                    "pdf" => "application/pdf" // Only allowing PDF files
                );
                
                $filename = $_FILES["filepdf"]["name"]; //Checking
                $filetype = $_FILES["filepdf"]["type"];
                $filesize = $_FILES["filepdf"]["size"];
            
                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));
            
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed) || $_FILES["filepdf"]["type"] !== "application/pdf") {
                    $_SESSION['failed'] = "Error: You can only upload PDF files!";
                    header("Location: " . URLROOT . "/pages/edit_profile");
                }
            
                $username = $_SESSION['email']; //Email will be the name of folder created
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                    header("Location: " . URLROOT . "/pages/edit_profile");
                } 
            
                $locationpdf1 = "files/users/" . $username;
            
                if ($filetype === "application/pdf") {
                    if (file_exists($locationpdf1 . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        // create directory if not exists in upload/ directory
                        if (!is_dir($locationpdf1)) {
                            mkdir('files/users/' . $username, 0777, true);
                        }
            
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            
                        $locationpdf1 .= "/" . $fileNameNew;
            
                        move_uploaded_file($_FILES['filepdf']['tmp_name'], $locationpdf1);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                    header("Location: " . URLROOT . "/pages/edit_profile");
                }
            } else {
                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                header("Location: " . URLROOT . "/pages/edit_profile");
            }
            

            //No need hidden value if for multiple functions
            // $_POST['update_student'] hidden value from form //update partner //update administrator
        //    if ($_POST['update_student']) {

        //         if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) { //Nak update gambar

        //             $data = [


        //                 'st_ic' => trim($_POST['st_ic']),
        //                 'st_email' => trim($_POST['st_email']),
        //                 'st_fullname' => trim($_POST['st_fullname']),
        //                 'st_gender' => trim($_POST['st_gender']),
        //                 'st_race' => trim($_POST['st_race']),
        //                 'univ_code' => trim($_POST['univ_code']),
        //                 'st_address' => trim($_POST['st_address']),
        //                 'st_image' => $location
    
        //             ];

        //         }else{ //Xnak update gambar

        //             $data = [

        //                 'st_ic' => trim($_POST['st_ic']),
        //                 'st_email' => trim($_POST['st_email']),
        //                 'st_fullname' => trim($_POST['st_fullname']),
        //                 'st_gender' => trim($_POST['st_gender']),
        //                 'st_race' => trim($_POST['st_race']),
        //                 'univ_code' => trim($_POST['univ_code']),
        //                 'st_address' => trim($_POST['st_address']),
               
        //             ];
        //         }

        //     } //elseif ($_POST['update_partner'])
            //elseif ($_POST['update_masteradmin'])

            //var_dump($data);

            if ($_POST['update_student']) {

                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) { //Nak update gambar

                    $data = [

                        //Profile table
                        // 'p_email' => trim($_POST['p_email']),
                        'p_name' => trim($_POST['p_name']),
                        'gender' => trim($_POST['gender']),
                        'race' => trim($_POST['race']),
                        'age' => trim($_POST['age']),
                        'dob' => trim($_POST['dob']),
                        'profileimage' => $location,
                        'position' => trim($_POST['position']),
                        'headline' => trim($_POST['headline']),
                        'about' => trim($_POST['about']),
                        'country' => trim($_POST['country']),
                        'citystate' => trim($_POST['citystate']),

                        //Student table
                        // 's_email' => trim($_POST['s_email']),
                        's_fName' => trim($_POST['s_fName']),
                        's_lName' => trim($_POST['s_lName']),
                        's_telephone_no' => trim($_POST['s_telephone_no']),
                        's_address' => trim($_POST['s_address']),
                        's_institution' => trim($_POST['s_institution']),
                        's_course' => trim($_POST['s_course']),
                        's_skills' => trim($_POST['s_skills']),
                        's_hobby' => trim($_POST['s_hobby']),
                        's_achievement' => trim($_POST['s_achievement']),
                        's_ambition' => trim($_POST['s_ambition']),
                        // 's_academic_cert' => trim($_POST['s_academic_cert']),
                        's_academic_cert' => $locationpdf1,
                        's_cocurriculum_cert' => trim($_POST['s_cocurriculum_cert']),
    
                    ];

                }else{ //Xnak update gambar

                    $data = [

                        //Profile table
                        // 'p_email' => trim($_POST['p_email']),
                        'p_name' => trim($_POST['p_name']),
                        'gender' => trim($_POST['gender']),
                        'race' => trim($_POST['race']),
                        'age' => trim($_POST['age']),
                        'dob' => trim($_POST['dob']),
                        'position' => trim($_POST['position']),
                        'headline' => trim($_POST['headline']),
                        'about' => trim($_POST['about']),
                        'country' => trim($_POST['country']),
                        'citystate' => trim($_POST['citystate']),

                        //Student table
                        // 's_email' => trim($_POST['s_email']),
                        's_fName' => trim($_POST['s_fName']),
                        's_lName' => trim($_POST['s_lName']),
                        's_telephone_no' => trim($_POST['s_telephone_no']),
                        's_address' => trim($_POST['s_address']),
                        's_institution' => trim($_POST['s_institution']),
                        's_course' => trim($_POST['s_course']),
                        's_skills' => trim($_POST['s_skills']),
                        's_hobby' => trim($_POST['s_hobby']),
                        's_achievement' => trim($_POST['s_achievement']),
                        's_ambition' => trim($_POST['s_ambition']),
                        // 's_academic_cert' => trim($_POST['s_academic_cert']),
                        's_academic_cert' => $locationpdf1,
                        's_cocurriculum_cert' => trim($_POST['s_cocurriculum_cert']),
               
                    ];
                }
            }

            elseif ($_POST['update_admin']) {

                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) { //Nak update gambar

                    $data = [

                        //Profile table
                        // 'p_email' => trim($_POST['p_email']),
                        'p_name' => trim($_POST['p_name']),
                        'gender' => trim($_POST['gender']),
                        'race' => trim($_POST['race']),
                        'age' => trim($_POST['age']),
                        'dob' => trim($_POST['dob']),
                        'profileimage' => $location,
                        'position' => trim($_POST['position']),
                        'headline' => trim($_POST['headline']),
                        'about' => trim($_POST['about']),
                        'country' => trim($_POST['country']),
                        'citystate' => trim($_POST['citystate']),

                        //Admin table
                        // 'a_email' => trim($_POST['a_email']),
                        'a_organization' => trim($_POST['a_organization']),
                        'a_org_num' => trim($_POST['a_org_num']),
                        'a_address' => trim($_POST['a_address']),
    
                    ];

                }else{ //Xnak update gambar

                    $data = [

                        //Profile table
                        // 'p_email' => trim($_POST['p_email']),
                        'p_name' => trim($_POST['p_name']),
                        'gender' => trim($_POST['gender']),
                        'race' => trim($_POST['race']),
                        'age' => trim($_POST['age']),
                        'dob' => trim($_POST['dob']),
                        'position' => trim($_POST['position']),
                        'headline' => trim($_POST['headline']),
                        'about' => trim($_POST['about']),
                        'country' => trim($_POST['country']),
                        'citystate' => trim($_POST['citystate']),

                        //Admin table
                        // 'a_email' => trim($_POST['a_email']),
                        'a_organization' => trim($_POST['a_organization']),
                        'a_org_num' => trim($_POST['a_org_num']),
                        'a_address' => trim($_POST['a_address']),
               
                    ];
                }
            }

          if ($_POST['update_student']) {
                if ($this->pageModel->updateStudentProfile($data)) { //Hantar ke page model 
                    header("Location: " . URLROOT . "/pages/edit_profile");
                } else {
                    die("Something went wrong, please try again!");
                }
            } elseif ($_POST['update_admin']) {
                if ($this->pageModel->updateAdminProfile($data)) { //Hantar ke page model 
                    header("Location: " . URLROOT . "/pages/edit_profile");
                } else {
                    die("Something went wrong, please try again!");
                }
            }
            else {
                $this->view('pages/edit_profile');
            } //elseif ($_POST['update_partner'])
            //     if ($this->pageModel->updatePartnerProfile($data)) {
            //         header("Location: " . URLROOT . "/pages/edit_profile");
            //     } else {
            //         die("Something went wrong, please try again!");
            //     }
            // } else {
            //     $this->view('pages/index');
            // } 

        } // end of if statement 

        $studentProfile = $this->pageModel->studentProfile(); //Pulling data
        $adminProfile = $this->pageModel->adminProfile();

        $data = [
            'studentProfile' => $studentProfile, //Connecting data
            'adminProfile' => $adminProfile //Connecting data
        ];

        $this->view('pages/index', $data); //Display data
    }

    public function view_profile() {
        // Fetch the data you want to pass to the view
        $studentProfile = $this->pageModel->studentProfile(); // Replace with your actual method to fetch student data
    
        // Prepare the data array
        $data = [
            'studentProfile' => $studentProfile // Assuming this is the data you want to pass to the view
            // Add more data here if needed
        ];
    
        // Load the view and pass the data to it
        $this->view('pages/view_profile_student', $data);
    }
    
}