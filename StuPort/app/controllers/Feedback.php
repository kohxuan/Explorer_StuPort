<?php
class Feedback extends Controller [
    public function __construct() {
        $this->feedbackModel = $this->model('feedback')
    }

    public function index() {
        $feedback = $this->activityModel->manageAllFeedbacks();

        $data= [

            'feedback' -> $feedback;

        ]

        $this->view('feedback/index', $data);
    }
]

?>