<?php
class Feedbacks extends Controller {
    public function __construct() {
        $this->feedbackModel = $this->model('Feedback');
    } //Initializes the Feedbacks controller by creating an instance of the Feedback model

    public function index() {
        $feedback = $this->feedbackModel->manageAllFeedbacks(); //Retrieves all feedbacks from the model

        $data= [

            'feedbacks' => $feedback

        ];

        $this->view('feedbacks/index', $data);
    }

    public function create()
    {

        $data = 
        [
            'link_form' => ''
        ];

        /*determine if a form has been submitted*/
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'activity_id' => $_POST['activity_id'],
            'link_form' => trim($_POST['link_form']) // obtain the value of the 'link_form' field
            ];


            if ($data['link_form']){
                if ($this->feedbackModel->addFeedback($data)){
                    header("Location: " . URLROOT. "/feedbacks" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('feedbacks/index', $data);
            }
        }

        $activity_id = $_GET['activity_id'];


        $activity = $this->feedbackModel->findActivityById($activity_id); //retrieve information about the activity based on the activity ID.

        $data = 
        [
            'activity' => $activity
        ];

        $this->view('feedbacks/index', $data);
    }

    public function edit($activity_id) // not sur eif $feedback__id
    {
        $feedback = $this->feedbackModel->findFeedbackById($activity_id);

        $data = 
        [
            'feedback' => $feedback,
            'link_form' => trim($_POST['link_form'])
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'feedback_id' => $activity_id,
            'feedback' => $feedback,
            'link_form' => trim($_POST['link_form'])
            ];


            if (empty($data['link_form'])){
                if ($this->feedbackModel->editFeedback($data)){
                    header("Location: " . URLROOT. "/feedbacks" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('feedbacks/index', $data);
            }
        }

        $this->view('feedbacks/index', $data);
    }

    public function delete($feedback_id)
    {
        $feedback = $this->feedbackModel->findFeedbackById($feedback_id);

        $data = 
        [
            'activity_id' => $_POST['activity_id']
        ];


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->feedbackModel->deleteFeedback($feedback_id, $data)){
            header("Location: " . URLROOT . "/feedbacks");
            }
            else
            {
                die('Something went wrong..');
            }
         }
    }
}
?>