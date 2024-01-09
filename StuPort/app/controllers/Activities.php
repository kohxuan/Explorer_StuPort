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
        $data = [
            'title' => '',
            'activity_desc' => '',
            'category' => '', // Add the category field
            'act_datetime' => '', // Add the act_datetime field
            'location' => '',
            'organizer_name' => '',
            'skill_acquired' => '',
            'attachment' => ''

        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                'attachment' => $_FILES['attachment'] // Use $_FILES to access file data
            ];
    
            // Perform additional validation if necessary
            if ($data['title'] && $data['activity_desc'] && $data['category'] && $data['act_datetime'] && $data['location'] && $data['organizer_name'] && $data['skill_acquired'] && $data['attachment']){
            if ($this->activityModel->addActivity($data)) {
                header("Location: " . URLROOT . "/activities");
                exit();
            } else {
                $this->view('activities/create', $data);
                // Added return to stop further execution after rendering the view
                die("Something went wrong :(");
            }
        }
    
        $this->view('activities/create', $data);
    }
}



    public function update($activity_id)
{
    $activity = $this->activityModel->findActivityById($activity_id);

    $data = [
        'activities' => $activity,
        'title' => '',
        'activity_desc' => '',
        'category' => '', // Add the category field
        'act_datetime' => '', // Add the act_datetime field
        'location' => '',
        'organizer_name' => '',
        'skill_acquired' => '',
        'attachment' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'id' => $activity_id,
            'activities' => $activity,
            'user_id' => $_SESSION['user_id'],
            'title' => trim($_POST['title']),
            'activity_desc' => trim($_POST['activity_desc']),
            'category' => trim($_POST['category']),
            'act_datetime' => trim($_POST['act_datetime']),
            'location' => trim($_POST['location']),
            'organizer_name' => trim($_POST['organizer_name']),
            'skill_acquired' => isset($_POST['skill_acquired']) ? trim($_POST['skill_acquired']) : '',
            'attachment' => isset($_POST['attachment']) ? trim($_POST['attachment']) : ''
        ];

        if (empty($data['title']) && empty($data['activity_desc']) && empty($data['category']) && empty($data['act_datetime']) && empty($data['location']) && empty($data['organizer_name']) && empty($data['skill_acquired']) && empty($data['attachment'])) {
            if ($this->activityModel->updateActivity($data)) {
                header("Location: " . URLROOT . "/activities");
                exit();
            } else {
                die("Something went wrong :(");
            }
        } else {
            $this->view('activities/index', $data);
        }
    }

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
