<?php
// StuBadges.php (Controller)

class StuBadges extends Controller {
    private $stuBadgeModel;

    public function __construct() {
        $this->stuBadgeModel = $this->model('StuBadge'); // Ensure the model method properly loads the model
    }

    public function index() {
        // Fetch all student badges with the types determined in the model
        $studentBadges = $this->stuBadgeModel->getAllStudentBadgesWithTypes();
        $data = [
            'studentBadges' => $studentBadges
        ];

        $this->view('studentBadge/manage', $data); // Render the manage view with the badges data
    }

    // Other methods like create, update, delete, etc.
}
