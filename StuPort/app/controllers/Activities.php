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
?>
