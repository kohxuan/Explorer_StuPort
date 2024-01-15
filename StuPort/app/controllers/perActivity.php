


<?php

class Peractivity extends Controller
{
    public function __construct()
    {
        $this->peractivityModel = $this->model('Peractivities'); //model name
        $this->activityModel = $this->model('Activity'); //model name
    }

    public function index()
{
    if ($_SESSION['user_role'] == "Student") {
        $s_id = $this->activityModel->getStudentID($_SESSION['user_id']);
        $perActivities = $this->peractivityModel->WaitAllperActivity($s_id);
    } else if ($_SESSION['user_role'] == "Lecturer") {
        $l_id = $this->activityModel->getLecturerID($_SESSION['user_id']);
        $perActivities = $this->peractivityModel->findperActivityByLecturer($l_id);
    } else {
        $perActivities = $this->peractivityModel->findAllperActivity();
    }

    $data = [
        'perActivity' => $perActivities
    ];

    $this->view('peractivity/index', $data);
}




public function create()
    {
        if (!isLoggedIn()){
            header("Location: " . URLROOT. "/users/login" );
        }

        $s_id = $this->activityModel->getStudentID($_SESSION['user_id']);

        $data = 
        [
            's_id' => $s_id,
            'name' => '',
            'date' => '',
            'venue' => '',
            'description' => '',
            'evidence' => ''

        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if (!empty($_FILES['evidence']['name'])){            
                $file_name=$_FILES['evidence']['name'];
                $file_temp=$_FILES['evidence']['tmp_name'];
                $file_destination= 'uploads/'.$file_name;
    
                if(move_uploaded_file($file_temp, $file_destination)){
                    $data['evidence']=$file_destination;
                }
                else{
                    echo "File upload failed!";
                }
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            
            $data = 
            [
            's_id' => $s_id,
            'name' => trim($_POST['name']),
            'date' => trim($_POST['date']),
            'venue' => trim($_POST['venue']),
            'description' => trim($_POST['description']),
            'evidence' => $data['evidence']
            ];


            if ($data['name'] && $data['date'] && $data['venue'] && $data['description'] && $data['evidence']){
                if ($this->peractivityModel->addperActivity($data)){
                    header("Location: " . URLROOT. "/peractivity" ); //same name with naming of controller file 
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('peractivity/index', $data);
            }
        }

        $this->view('peractivity/index', $data);
    }

    public function update($pac_id)
    {
        $peractivity = $this->peractivityModel->findperActivityById($pac_id);
    
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/peractivity");
            exit; // Added exit to stop further execution
        }
    
        $data = [
            'pac_id' => $pac_id, // Added this line to pass the activity ID to the view
            'perActivity' => $peractivity,
            'name' => '',
            'venue' => '',
            'date' => '',
            'description' => '',
            'evidence' => '',
            'nameError' => '',
            'venueError' => '',
            'u_url' => URLROOT . "/peractivity/update/" . $pac_id
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'pac_id' => $pac_id,
                'perActivity' => $peractivity,
                'name' => trim($_POST['name']),
                'venue' => trim($_POST['venue']),
                'date' => trim($_POST['date']),
                'description' => trim($_POST['description']),
                'evidence' => trim($_POST['evidence']),
                'nameError' => '',
                'venueError' => ''
            ];
    
            // Check if there are no errors
            if (empty($data['nameError']) && empty($data['venueError'])) {
                // Update the activity
                if ($this->peractivityModel->updateperActivity($data)) {
                    header("Location: " . URLROOT . "/peractivity");
                    exit; // Added exit to stop further execution
                } else {
                    header("Location: " . URLROOT . "/peractivity");
                    exit; // Added exit to stop further execution
                }
            }
        }
    
        $this->view('peractivity/index', $data);
    }
    
    


    public function delete($pac_id)
    {
        $peractivities = $this->peractivityModel->findperActivityById($pac_id);

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        

            if($this->peractivityModel->deleteperActivity($pac_id)){
                header("Location: " . URLROOT . "/peractivity");
            }
            else
            {
                die('Something went wrong..');
            }
        }

        
        
    }

    public function approved()
    {
        // Check if the user is logged in
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/peractivity");
            exit; // Added exit to stop further execution
        }
    
        // Get the student ID
        $s_id = $this->activityModel->getStudentID($_SESSION['user_id']);
    
        // Get only approved personal activities
        $approvedPerActivities = $this->peractivityModel->findApprovedPerActivities($s_id);
    
        $data = [
            'perActivity' => $approvedPerActivities
        ];
    
        $this->view('peractivity/index', $data);
    }


    // public function assign($id) {

    //     $skill = $this->skillModel->findSkillById($id);

    //     if(!isLoggedIn()) {

    //         header("Location: " . URLROOT . "/skills");

    //     }

    //     $data = [

    //         'skill' => $skill

    //     ];
        
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         $data = [

    //             'skill' => $skill,
    //             'st_id' => trim($_POST['st_id']),
    //             'skill_id' => trim($_POST['skill_id'])

    //         ];

    //         // // Check empty
    //         // if(empty($data['st_id'])) {

    //         //     $data['st_id_Error'] = "The student's field cannot be empty";

    //         // }

    //         // if(empty($data['skill_id'])) {

    //         //     $data['skill_id_Error'] = "The skill's field cannot be empty";

    //         // }
    //         // // End of Check empty

    //         if ($data['st_id'] && $data['skill_id']) {

    //             if ($this->skillModel->assignSkills($data)) {

    //                 $_SESSION['error'] = "";

    //                 header("Location: " . URLROOT. "/skills" );

    //             } else {

    //                 die("Something went wrong :(");

    //             }

    //         } else {

    //             $this->view('skills/index', $data);

    //         }

    //     }

    //     $stu_list = $this->skillModel->studentList();

    //     $data_2 = [

    //         'stu_list' => $stu_list

    //     ];

    //     $skill_list = $this->skillModel->findAllSkills();

    //     $data_3 = [

    //         'skill_list' => $skill_list

    //     ];

        

    //     $this->view('skills/index', $data, $data_2, $data_3);

    // }
   
    public function assign($pac_id)
{
    if (!isLoggedIn()) {
        redirectToPeractivity();
    }

    $perActivities = $this->peractivityModel->findperActivityById($pac_id);

    if (!$perActivities) {
        redirectToPeractivity();
    }

    $data = [
        'perActivity' => $perActivities,
        'l_id' => '',
        'pac_id' => $pac_id,
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        handlePostRequest($data);
    }

    // Retrieve lecturer list
    $lc_list = $this->peractivityModel->lecturerList();

    $data_2 = [
        'lc_list' => $lc_list
    ];

    $this->view('peractivity/index', $data, $data_2);
}

// Helper function for consistent redirection
function redirectToPeractivity()
{
    header("Location: " . URLROOT . "/peractivity");
    exit;
}

// Handle POST request logic
function handlePostRequest(&$data)
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data['l_id'] = trim($_POST['l_id']);

    if ($data['l_id']) {
        $this->peractivityModel->assignperActivity($data);
        redirectToPeractivity();
    } else {
        $this->view('peractivity/index', $data);
    }
}




public function approve($pac_id)
{
    if (!isLoggedIn()) {
        header("Location: " . URLROOT . "/peractivity");
        exit; // Added exit to stop further execution
    }

    $perActivities = $this->peractivityModel->findperActivityById($pac_id);

    if (!$perActivities) {
        header("Location: " . URLROOT . "/peractivity");
        exit; // Added exit to stop further execution
    }

    $data = [
        'perActivity' => $perActivities,
        'pac_id' => $pac_id,
    ];



        if ($this->peractivityModel->setApprove($pac_id)) {
            echo '<script>alert("You have successfully approved the personal activity.");</script>';
            echo '<script>window.location.href = "http://localhost/explorer/StuPort/peractivity";</script>';
            exit;
        }  else {
            echo '<script>alert("You have successfully approved the personal activity.");</script>';
            echo '<script>window.location.href = "http://localhost/explorer/StuPort/peractivity";</script>';
        }
    

    $this->view('peractivity/index', $data);
}



}

?>
