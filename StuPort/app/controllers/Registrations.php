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

    public function update($id)
    {
        $registrations = $this->registrationModel->findRegistrationById($id);


        $data = 
        [
            'registrations' => $registrations,
            'activity_id' => '',
            'link' => '',

        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'registrations' => $registrations,
            'activity_id' => $activity_id,
            'link' => $link,
            'user_id' => $_SESSION['user_id'],
            'activity_id' => trim($_POST['activity_id']),
            'activity_id' => trim($_POST['link']),
            ];



            if (empty($data['activity_id'] && $data['activity_id'])){
                if ($this->registrationModel->updateRegistration($data)){
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

    public function delete($activity_id)
    {
        $registrations = $this->registrationModel->findRegistrationById($activity_id);

        

        

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }

        if($this->registrationModel->deleteRegistration($activity_id)){
            header("Location: " . URLROOT . "/registrations");
        }
        else
        {
            die('Something went wrong..');
        }
        
    }
}



?>