<?php

class Registrations extends Controller {
    public function __construct() {
        $this->registrationModel = $this->model('Registration');
    }

    public function index() {
        $registrations = $this->registrationModel->manageAllRegistrations();
        $data = ['registrations' => $registrations];
        $this->view('registrations/index', $data);
    }

    public function create() {
        $data = [
            'activity_id' => trim($_POST['activity_id']),
            'link' => trim($_POST['link']),
            'status' => trim($_POST['status']),
            'user_notes' => trim($_POST['user_notes'])
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'user_id' => $_SESSION['user_id'], // Assuming user_id comes from the session
                'activity_id' => trim($_POST['activity_id']),
                'link' => trim($_POST['link'])
            ];

            if ($data['activity_id'] && $data['link']) {
                if ($this->registrationModel->addRegistration($data)) {
                    header("Location: " . URLROOT . "/registrations");
                } else {
                    die("Something went wrong :(");
                }
            } else {
                $this->view('registrations/create', $data); // Redirect to a create view if data is incomplete
            }
        } else {
            $this->view('registrations/create', $data); // Show create view for GET request
        }
    }

    public function update($activity_id) {
        $registration = $this->registrationModel->findRegistrationById($activity_id);
        $data = [
            'activity_id' => trim($_POST['activity_id']),
            'link' => trim($_POST['link']),
            'status' => trim($_POST['status'])
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'activity_id' => trim($_POST['activity_id']),
                'link' => trim($_POST['link']),
                'status' => trim($_POST['status'])
            ];
    
            if (!empty($data['activity_id']) && !empty($data['link'])) {
                if ($this->registrationModel->updateRegistration($data)) {
                    header("Location: " . URLROOT . "/registrations");
                } else {
                    die("Something went wrong :(");
                }
            } else {
                $this->view('registrations/update', $data); // Redirect to an update view if data is incomplete
            }
        } else {
            $this->view('registrations/update', $data); // Show update view for GET request
        }
    }

    public function delete($activity_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->registrationModel->deleteRegistration($activity_id)) {
                header("Location: " . URLROOT . "/registrations");
            } else {
                die('Something went wrong..');
            }
        }
    }
}

?>
