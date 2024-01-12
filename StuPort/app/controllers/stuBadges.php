<?php
class StuBadges extends Controller {
    public function __construct() {
        $this->stuBadgeModel = $this->model('StuBadge');
    }

    public function index() {
        $studentBadges = $this->stuBadgeModel->getAllStudentBadges();
        $data = [
            'studentBadges' => $studentBadges
        ];
        $this->view('student_badges/index', $data);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $student_id = $_POST['student_id'];
            $reward_id = $_POST['reward_id'];
            $date_awarded = $_POST['date_awarded'];
            $act_joined = $_POST['act_joined'];

            // Validate and sanitize user inputs
            $student_id = filter_var($student_id, FILTER_SANITIZE_NUMBER_INT);
            $reward_id = filter_var($reward_id, FILTER_SANITIZE_NUMBER_INT);
            $date_awarded = filter_var($date_awarded, FILTER_SANITIZE_STRING);
            $act_joined = filter_var($act_joined, FILTER_SANITIZE_NUMBER_INT);

            // Call the model method to add a new student badge
            if ($this->stuBadgeModel->addStudentBadge($student_id, $reward_id, $date_awarded, $act_joined)) {
                // Successfully added the student badge
                header('Location: ' . URLROOT . '/stuBadges/index');
                exit; // Stop script execution after redirect
            } else {
                // Handle database error or validation error
                $data = [
                    'error' => 'Failed to add the student badge. Please check your inputs.'
                ];
                $this->view('student_badges/create', $data);
            }
        } else {
            // Display the create student badge form
            $this->view('student_badges/create');
        }
    }

    // Add more controller methods for updating and deleting student badges if needed
}
