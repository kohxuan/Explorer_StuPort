<?php
class Activities extends Controller{

    public function __construct(){
        $this->activityModel = $this->model('Activity');

    }

    public function index(){
        $activities = $this->activityModel->manageAllActivities();
        $data= [

            'activities' => $activities
        ];

        $this->view('activities/index'); //'view' here refers to which path of the .php is
    }

}


?>