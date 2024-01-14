<?php
class Badges extends Controller
{
    private $activityModel;
    private $badgeModel;

    public function __construct()
    {
        $this->activityModel = $this->model('Activity');
        $this->badgeModel = $this->model('Badge'); // Instantiate the Badge model
    }

    public function index()
    {
        $activities = $this->activityModel->manageAllActivities();
        $data = ['activities' => $activities];
    
        $this->view('activities/index', $data);
    }

    public function create()
    {
        // ... Existing code for create method ...

        // This is where you handle the creation of a new activity
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // ... Existing code for handling form submission ...

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

        $this->view('activities/create', $data);
    }

    // public function update($activity_id)
    // {
    //     // ... Existing code for update method ...

    //     // This is where you handle the update of an activity
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // ... Existing code for handling form submission ...

    //         if ($this->activityModel->updateActivity($data)) {
    //             header("Location: " . URLROOT . "/activities");
    //             exit();
    //         } 
    //     }

    //     $this->view('activities/update', $data);
    // }

    // public function delete($activity_id)
    // {
    //     // ... Existing code for delete method ...

    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         if($this->activityModel->deleteActivity($activity_id)){
    //             header("Location: " . URLROOT . "/activities");
    //         } else {
    //             die('Something went wrong..');
    //         }
    //     }
    // }

    public function join($activity_id)
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/activities");
            exit();
        }

        if ($this->activityModel->joinActivity($activity_id, $_SESSION['user_id'])) {
            // Increment activity count and update badge
            $this->badgeModel->incrementActivityCount($_SESSION['user_id']);
            echo '<script>alert("You have successfully joined the activity.")</script>';
            echo '<script>window.location.href = "' . URLROOT . '/activities";</script>';
        } else {
            die("Something went wrong :(");
        }
    }
    
    public function particip()
    {
        if (!isLoggedIn() || $_SESSION['user_role'] !== "Student") {
            header("Location: " . URLROOT . "/activities");
            exit();
        }
    
        // Fetch activities that the current student has joined
        $joinedActivities = $this->activityModel->getJoinedActivities($_SESSION['user_id']);
    
        $data = ['joinedActivities' => $joinedActivities];
    
        $this->view('activities/particip', $data);
    }
    
    // Add more methods as needed for the functionality of your application
}
?>    
