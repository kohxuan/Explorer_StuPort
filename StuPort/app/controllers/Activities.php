<?php
class Activities extends Controller{

    public function __construct(){
        $this->activityModel = $this->model('Activity');

    }

    public function index(){
        $activity = $this->activityModel->manageAllActivities();
        $data= [

            'activities' => $activity
        ];

        $this->view('activities/index'); //'view' here refers to which path of the .php is
    }

}


?>