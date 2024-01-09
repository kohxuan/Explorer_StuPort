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
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'activity_desc' => trim($_POST['activity_desc']),
                'category' => trim($_POST['category']),
                'act_datetime' => trim($_POST['act_datetime']),
                'location' => trim($_POST['location']),
                'organizer_name' => trim($_POST['organizer_name']),
                'skill_acquired' => trim($_POST['skill_acquired']),
                'attachment' => isset($_FILES['attachment']) ? $_FILES['attachment'] : null
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
        'category' => '',
        'act_datetime' => '',
        'location' => '',
        'organizer_name' => '',
        'skill_acquired' => '',
        'attachment' => '',
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize input data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Set updated data
        $data['title'] = trim($_POST['title']);
        $data['activity_desc'] = trim($_POST['activity_desc']);
        $data['category'] = trim($_POST['category']);
        $data['act_datetime'] = trim($_POST['act_datetime']);
        $data['location'] = trim($_POST['location']);
        $data['organizer_name'] = trim($_POST['organizer_name']);
        $data['skill_acquired'] = trim($_POST['skill_acquired']);
        $data['attachment'] = trim($_POST['attachment']);

        // Check if the data is not empty
        if (!empty($data['title']) && !empty($data['activity_desc']) && !empty($data['category']) && !empty($data['act_datetime']) && !empty($data['location']) && !empty($data['organizer_name']) && !empty($data['skill_acquired']) && !empty($data['attachment'])) {
            // Update the activity
            if ($this->activityModel->updateActivity($data)) {
                header("Location: " . URLROOT . "/activities");
                exit();
            } else {
                die("Something went wrong :(");
            }
        } else {
            // Data is empty, display the view with the updated data
            $this->view('activities/index', $data);
            exit();
        }
    }

    // Load the view with the data
    $this->view('activities/index', $data);
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

}

?>
