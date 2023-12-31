<?php
class Activities extends Controller{

    public function __construct(){
        $this->activityModel = $this->model('Activity');

    }

    public function index(){
        $this->view('activities/index'); //'view' here refers to which path of the .php is
    }

}


?>