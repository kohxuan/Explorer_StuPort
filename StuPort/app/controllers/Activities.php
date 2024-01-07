<?php
class Activities extends Controller
{
    public function __construct()
    {
        $this->activityModel = $this->model('Activity');
    }

    public function index()
    {
        $activities = $this->activityModel->manageAllActivities();
        $data = [
            'activity' => $activities
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
                'activity_desc' => trim($_POST['activity_desc'])
            ];

            if ($data['title'] && $data['activity_desc']) {
                if ($this->activityModel->addActivity($data)) {
                    header("Location: " . URLROOT . "/activities");
                } else {
                    die("Something went wrong :(");
                }
            } else {
                $this->view('activities/index', $data);
            }
        }

        $this->view('activities/index', $data);
    }
}
?>
