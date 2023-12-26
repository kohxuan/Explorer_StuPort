<?php
class Registration extends Controller{
    public function __construct(){
        $this->registrationModel = $this->model('Registration');
    }

    public function index(){
        $registration = $this->registrationModel->manageAllRegistration();
        $data =[
                'registration' => $registration
            ];
        
        $this ->view('registration/index' , $data);
    }

    public function create()
    {
        
        $data = 
        [
            'link' => '',
            'activity_id' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'user_id' => $_SESSION['user_id'],
            'link' => trim($_POST['link']),
            'activity_id' => trim($_POST['activity_id'])
            ];


            if ($data['link'] && $data['activity_id']){
                if ($this->registrationModel->addRegistration($data)){
                    header("Location: " . URLROOT. "/registration" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('registration/index', $data);
            }
        }

        $this->view('registration/index', $data);
    }

    public function update($id)
    {
        $registration = $this->registrationModel->findRegistrationById($id);

       

        $data = 
        [
            'registration' => $registration,
            'activity_id' => '',
            'link' => '',
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'activity_id' => $activity_id,
            'registration' => $registration,
            'user_id' => $_SESSION['user_id'],
            'link' => trim($_POST['link']),
            
            ];



            if (empty($data['link'] && $data['link'])){
                if ($this->postModel->updatePost($data)){
                    header("Location: " . URLROOT. "/posts" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('posts/index', $data);
            }
        }

        $this->view('posts/index', $data);
    }
}

?>