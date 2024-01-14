<?php

class Rewards extends Controller
{
    private $rewardModel;

    public function __construct()
    {
        $this->rewardModel = $this->model('Reward');
    }

    public function index()
    {
        $rewards = $this->rewardModel->findAllRewards();
        $data = [
            'rewards' => $rewards
        ];

        $this->view('rewards/index', $data);
    }

    public function create()
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/rewards/index");
        }

        $data = [
            'badge_name' => '',
            'badge_description' => '',
            'points_required' => ''
        ];



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            // Check if file was uploaded without errors
            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["file"]["name"]; //Checking
                $filetype = $_FILES["file"]["type"];
                $filesize = $_FILES["file"]["size"];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                    header("Location: " . URLROOT . "/rewards");
                }

                $username = $_SESSION['email']; //Email will be the name of folder created
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) {
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                    header("Location: " . URLROOT . "/rewards");
                }
                $location = "images/rewards/" . $username;

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {

                        # create directory if not exists in upload/ directory
                        if (!is_dir($location)) {
                            //mkdir($location, 0755);
                            mkdir('images/rewards/' . $username, 0777, true);
                        }

                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                        $location .= "/" . $fileNameNew;

                        move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                    header("Location: " . URLROOT . "/rewards/create");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                header("Location: " . URLROOT . "/rewards/create");
            }

            $data = [
                'badge_name' => trim($_POST['badge_name']),
                'badge_description' => trim($_POST['badge_description']),
                'points_required' => trim($_POST['points_required']),
                'badge_icon_path' => $location
            ];

            if ($data['badge_name'] && $data['badge_description'] && $data['points_required'] && $data['badge_icon_path']) {
                if ($this->rewardModel->addReward($data)) {
                    header("Location: " . URLROOT . "/rewards");
                } else {
                    die("Something went wrong :(");
                }
            } else {
                $this->view('rewards/index', $data);
            }
        }

        $this->view('rewards/index', $data);
    }

    public function update($reward_id)
    {
        $reward = $this->rewardModel->findRewardById($reward_id);

        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/rewards/index");
        }

        $data = [
            'reward' => $reward,
            'badge_name' => $reward->badge_name,
            'badge_description' => $reward->badge_description,
            'badge_icon_path' => $reward->badge_icon_path, // TODO: Add badge_icon_path to the database
            'points_required' => $reward->points_required
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    
    
                // Check if file was uploaded without errors
                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["file"]["name"]; //Checking
                    $filetype = $_FILES["file"]["type"];
                    $filesize = $_FILES["file"]["size"];
    
                    $fileExt = explode('.', $filename);
                    $fileActualExt = strtolower(end($fileExt));
    
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                        header("Location: " . URLROOT . "/rewards");
                    }
    
                    $username = $_SESSION['email']; //Email will be the name of folder created
                    $maxsize = 5 * 1024 * 1024;
                    if ($filesize > $maxsize) {
                        $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                        header("Location: " . URLROOT . "/rewards");
                    }
                    $location = "images/rewards/" . $username;
    
                    if (in_array($filetype, $allowed)) {
    
                        if (file_exists($location . $filename)) {
                            echo $filename . " is already exists.";
                        } else {
    
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/rewards/' . $username, 0777, true);
                            }
    
                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
    
                            $location .= "/" . $fileNameNew;
    
                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                        }
                    } else {
                        $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/rewards/create");
                    }
                } else {
    
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                    header("Location: " . URLROOT . "/rewards/create");
                }
    
                $data = [
                    'badge_name' => trim($_POST['badge_name']),
                    'badge_description' => trim($_POST['badge_description']),
                    'points_required' => trim($_POST['points_required']),
                    'badge_icon_path' => $location
                ];

            if ($this->rewardModel->updateReward($data)) {
                header("Location: " . URLROOT . "/rewards");
            } else {
                die("Something went wrong :(");
            }
        }

        $this->view('rewards/update', $data);
    }

    public function delete($id)
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/rewards/index");
        }

        if ($this->rewardModel->deleteReward($id)) {
            header("Location: " . URLROOT . "/rewards");
        } else {
            die('Something went wrong..');
        }
    }
}

?>
