<?php

class Registrations extends Controller{
    public function __construct() {
        $this->registrationModel = $this->model('Registration');
    }

    public function index() {

        $registrations = $this->registrationModel->manageAllRegistrations();

        $data=[
            'registrations' => $registrations,
        ];
        

        $this->view('registrations/index', $data);
    }

    public function create()
    {
        
        $data = 
        [
            'activity_id' => '',
            'link' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'user_id' => $_SESSION['user_id'],
            'activity_id' => trim($_POST['activity_id']),
            'link' => trim($_POST['link'])
            ];


            if ($data['activity_id'] && $data['link']){
                if ($this->registrationModel->addRegistration($data)){
                    header("Location: " . URLROOT. "/registrations" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('registrations/index', $data);
            }
        }

        $this->view('registrations/index', $data);
    }
}

?>