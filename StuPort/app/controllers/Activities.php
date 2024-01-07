<?php
class Activities extends Controller{

    public function __construct(){
        $this->activityModel = $this->model('Activity');
    }

    public function index(){
        $activities = $this->activityModel->manageAllActivities();
        $data = [
            'activity' => $activities
        ];

        $this->view('activities/index', $data);
    }
}


public function create()
{
    $data = 
    [
        'title' => '',
        'description' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = 
        [
        'user_id' => $_SESSION['user_id'],
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description'])
        ];


        if ($data['title'] && $data['description']){
            if ($this->postModel->addActivity($data)){
                header("Location: " . URLROOT. "/posts" );
            }
            else
            {
                die("Something went wrong :(");
            }
        }
        else
        {
            $this->view('posts/index', $data);
        }
    }

    $this->view('posts/index', $data);
}


}
?>
