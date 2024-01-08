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
            'activity_desc' => ''
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'activity_desc' => trim($_POST['activity_desc']),
                'act_datetime' => date('Y-m-d H:i:s')
            ];
    
            if ($data['title'] && $data['activity_desc']) {
                if ($this->activityModel->addActivity($data)) {
                    header("Location: " . URLROOT . "/activities");
                     // Added exit() to stop further execution after the redirect
                } else {
                    die("Something went wrong :(");
                }
            } else {
                $this->view('activities/create', $data);
                // Added return to stop further execution after rendering the view
            }
        }
    
        $this->view('activities/create', $data);
    }

    public function update($activity_id)
    {
        $activity = $this->activityModel->findActivityById($activity_id);

        $data = 
        [
            'activities' => $activity,
            'title' => '',
            'activity_desc' => '',

        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'id' => $activity_id,
            'activities' => $activity,
            'user_id' => $_SESSION['user_id'],
            'title' => trim($_POST['title']),
            'activity_desc' => trim($_POST['activity_desc']),

            ];



            if (empty($data['title'] && $data['activity_desc'])){
                if ($this->activityModel->updateActivity($data)){
                    header("Location: " . URLROOT. "/activities" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
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
