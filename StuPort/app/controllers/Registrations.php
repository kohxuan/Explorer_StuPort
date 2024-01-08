<?php
class Registration extends Controller {
    public function __construct() {
        $this->registrationModel = $this->model('registrations');
    }

    public function index() {
        $registrations = $this->registrationModel->manageAllRegistration();

        $data= [

            'registrations' => $registrations


        ];

        $this->view('registrations', $data);
    }

    public function create()
    {

        $data = 
        [
            'link' => ''
            'activity_id' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'activity_id' => $_POST['activity_id'],
            'link' => trim($_POST['link'])
            ];


            if ($data['link']){
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

    public function edit($id)
    {
        $registrations = $this->registrationModel->findRegistrationById($id);

        $data = 
        [
            'registrations' => $registrations,
            'activity_id' => '',
            'link_form' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'user_id' => $user_id,
            'registrations' => $registrations,
            'activity_id' => $_SESSION['activity_id'],
            'link' => trim($_POST['link'])
            ];


            if (empty($data['link'])){
                if ($this->registrationModel->editRegistration($data)){
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

        $this->view('registrations/index', $data)
    }

    public function delete($user_id)
    {
        $registrations = $this->registrationModel->findRegistrationById($user_id);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->feedbackModel->deleteFeedback($user_id)){
            header("Location: " . URLROOT . "/registrations");
            }
            else
            {
                die('Something went wrong..');
            }
         }
    }

}
?>