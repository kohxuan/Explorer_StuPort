<?php
class Feedbacks extends Controller {
    public function __construct() {
        $this->feedbackModel = $this->model('feedback');
    }

    public function index() {
        $feedback = $this->feedbackModel->manageAllFeedbacks();

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

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'activity_id' => $_SESSION['activity_id'],
            'link_form' => trim($_POST['link_form'])
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

        $this->view('feedbacks/index', $data);
    }

    public function update($id)
    {
        $post = $this->postModel->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/feedbacks");
        }
        elseif($post->user_id != $_SESSION['user_id'])
        {
            header("Location: " . URLROOT . "/feedbacks");

        }

        $data = 
        [
            'post' => $post,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'id' => $id,
            'post' => $post,
            'user_id' => $_SESSION['user_id'],
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'titleError' => '',
            'bodyError' => ''
            ];

            if(empty($data['title'])){
                $data['titleError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['body'])){
                $data['bodyError'] = 'The body of a post cannot be empty';
            }

            if($data['title'] == $this->postModel->findPostById($id)->title)
            {
                $data['titleError'] = "At least change the title!";
            }

            if($data['body'] == $this->postModel->findPostById($id)->body)
            {
                $data['bodyError'] = "At least change the body!";
            }


            if (empty($data['titleError'] && $data['bodyError'])){
                if ($this->postModel->updatePost($data)){
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

    public function delete($id)
    {
        $post = $this->postModel->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/feedbacks");
        }
        elseif($post->user_id != $_SESSION['user_id'])
        {
            header("Location: " . URLROOT . "/feedbacks");

        }

        $data = 
        [
            'post' => $post,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }

        if($this->postModel->deletePost($id)){
            header("Location: " . URLROOT . "/feedbacks");
        }
        else
        {
            die('Something went wrong..');
        }
        
    }
}

?>