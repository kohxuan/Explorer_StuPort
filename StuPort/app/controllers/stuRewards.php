
<?php

class stuReward extends Controller
{
    private $rewardModel;
    private $studentModel;

    public function __construct()
    {
        $this->rewardModel = $this->model('Reward');
        $this->studentModel = $this->model('stuReward');
    }

    // Method to check if the logged-in user is a student
    private function isStudent()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'student';
    }

    public function index()
    {
        if (!$this->isStudent()) {
            // Handle the case where the user is not a student
            return; // Or redirect to another page
        }

        $student_id = $_SESSION['user_id'];
        $rewards = $this->studentModel->findRewardsByStudent($student_id);
        return $rewards;
    }

    public function addRewardToStudent($student_id, $reward_id)
    {
        if (!$this->isStudent()) {
            // Handle the case where the user is not a student
            return; // Or redirect to another page
        }

        $currentDate = date('Y-m-d H:i:s');
        $data = [
            'student_id' => $student_id,
            'reward_id' => $reward_id,
            'earned_date' => $currentDate
        ];

        if ($this->studentModel->addStudentReward($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateRewardForStudent($data)
    {
        if (!$this->isStudent()) {
            // Handle the case where the user is not a student
            return; // Or redirect to another page
        }

        if ($this->studentModel->updateStudentReward($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteRewardFromStudent($student_id, $reward_id)
    {
        if (!$this->isStudent()) {
            // Handle the case where the user is not a student
            return; // Or redirect to another page
        }

        if ($this->studentModel->deleteStudentReward($student_id, $reward_id)) {
            return true;
        } else {
            return false;
        }
    }
}
