<?php

class Activities extends Controller
{
    public function __construct()
    
    {
        $this->activityModel = $this->model('Activity');
    }

    public function index()
    {
        $activity = $this->activityModel->manageAllActivities();
        $data = [
            'activities' => $activity
        ];
    
        $this->view('activities/index', $data);
    }
    
    public function create()
    {
        // Initialize data with default values
        $data = [
            'title' => '',
            'activity_desc' => '',
            'category' => '', 
            'act_datetime' => '', 
            'location' => '',
            'organizer_name' => '',
            'skill_acquired' => '',
            'attachment' => ''
        ];
    
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize and validate input data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


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
                 if (!array_key_exists($ext, $allowed)) {
                     $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                     header("Location: " . URLROOT . "/activities/create");
                 }
 
                 $email = $_SESSION['email']; //Email will be the name of folder created
                 $maxsize = 1 * 720 * 720;
                 if ($filesize > $maxsize) {
                     $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                     header("Location: " . URLROOT . "/activities/create");
                 }
                 $location = "images/activities/" . $email;
 
                 if (in_array($filetype, $allowed)) {
 
                     if (file_exists($location . $filename)) {
                         echo $filename . " is already exists.";
                     } else {
 
                         # create directory if not exists in upload/ directory
                         if (!is_dir($location)) {
                             //mkdir($location, 0755);
                             mkdir('images/activities/' . $email, 0777, true);
                         }
 
                         $fileNameNew = uniqid('', true) . "." . $fileActualExt;
 
                         $location .= "/" . $fileNameNew;
 
                         move_uploaded_file($_FILES['file']['tmp_name'], $location);
                     }
                 } else {
                     $_SESSION['failed'] = "Error: There was an error uploading your file!";
                     header("Location: " . URLROOT . "/activities/create");
                 }
             } else {
 
                 $_SESSION['failed'] = "Error: There was an error uploading your file!";
                 header("Location: " . URLROOT . "/activities/create");
             }

             $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'activity_desc' => trim($_POST['activity_desc']),
                'category' => trim($_POST['category']),
                'act_datetime' => trim($_POST['act_datetime']),
                'location' => trim($_POST['location']),
                'organizer_name' => trim($_POST['organizer_name']),
                'skill_acquired' => trim($_POST['skill_acquired']),
                'attachment' => $location               
            ];

    
    
            // Perform additional validation if necessary
        
                // Call the addActivity method in your model
                if ($this->activityModel->addActivity($data)) {
                    // Redirect to the activities page upon successful creation
                    header("Location: " . URLROOT . "/activities");
                    exit();
                } else {
                    // Display an error message if something went wrong
                    $this->view('activities/create', $data);
                    die("Something went wrong :(");
                
                
        }
        }
        // Load the view with the data
        $this->view('activities/index', $data);
    }

    public function update($activity_id)
{
    // Retrieve the activity based on the provided $activity_id
    $activity = $this->activityModel->findActivityById($activity_id);

    $data = [
        'activity' => $activity,
        'title' => '',
        'activity_desc' => '',
        'act_datetime' => '',
        'location' => '',
        'organizer_name' => '',
        'skill_acquired' => '',
        'u_url' => URLROOT . "/activities/update/" . $activity_id,
        'activity_id' => $activity_id
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize input data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Set updated data
        $data['title'] = trim($_POST['title']);
        $data['activity_desc'] = trim($_POST['activity_desc']);
        $data['act_datetime'] = trim($_POST['act_datetime']);
        $data['location'] = trim($_POST['location']);
        $data['organizer_name'] = trim($_POST['organizer_name']);
        $data['skill_acquired'] = trim($_POST['skill_acquired']);

        // Check if the data is not empty
            // Update the activity
            if ($this->activityModel->updateActivity($data)) {
                header("Location: " . URLROOT . "/activities");
                exit();
            } 
    }

    // Load the view with the data
    $this->view('activities/update', $data);
}



    


// delete function 
    public function delete($activity_id)
    {
        $activity = $this->activityModel->findActivityById($activity_id);


        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       
       
            if($this->activityModel->deleteActivity($activity_id)){
                header("Location: " . URLROOT . "/activities");
            }
            else
            {
                die('Something went wrong..');
            }
       
       
        }
        
    }

    public function register($activity_id)
{
       
    if (!isLoggedIn()) {
        header("Location: " . URLROOT . "/activity");
        exit();
    }

    $activity = $this->activityModel->findActivityById($activity_id);

    // Redirect if the user is the owner of the activity
    
    {
        // Perform the register operation
        if ($this->activityModel->registerActivity($activity_id, $_SESSION['user_id'])) {
            echo '<script>alert("You have successfully registered the activity.")</script>';
            echo '<script>window.location.href = "http://localhost/explorer/StuPort/activities";</script>';
        } else {
            die("Something went wrong :(");
        }
    
    }
}


public function particip()
{
    if (!isLoggedIn() || $_SESSION['user_role'] !== "Student") {
        header("Location: " . URLROOT . "/activities");
        exit();
    }

   // Fetch activities that the current student has registered
    $registeredActivities = $this->activityModel->getRegisteredActivities($_SESSION['user_id']);

    $data = [
        'registeredActivities' => $registeredActivities,
    ];


    $this->view('activities/index', $data);
}

}

?>

