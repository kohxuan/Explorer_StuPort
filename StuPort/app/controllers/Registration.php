<?php
class Registration extends Controller{
    public function __construct(){
        $this->registrationModel = $this->model('Registration');
    }

    public function index(){
        $registration = $this->registrationModel->manageAllRegistration();
        $data =[
                'registration' => $registration
            ];
        
        $this ->view('registration/index' , $data);
    }
}

?>