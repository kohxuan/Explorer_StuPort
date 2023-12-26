<?php
class Registration extends Controller{
    public function __construct(){
        $this->registrationModel = $this->model('Registration');
    }

    public function index(){
        $this ->view('registration/index');
    }
}

?>