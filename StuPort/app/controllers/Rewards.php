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
                $allowed = array("jpg" => "images/jpg", "jpeg" => "images/jpeg", "gif" => "images/gif", "png" => "images/png");
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
                    header("Location: " . URLROOT . "/rewards");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                header("Location: " . URLROOT . "/rewards");
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
    // public function update($id) {

    //     $badge = $this->rewardModel->findRewardById($id);

    //     if(!isLoggedIn()) {

    //         header("Location: " . URLROOT . "/rewards");

    //     } 
    //     // elseif($badge->user_id != $_SESSION['user_id']) {

    //     //     header("Location: " . URLROOT . "/posts");

    //     // }

    //     $data = [
    //         'reward_id' => $id,
    //         'reward' => $badge,
    //         'badge_name' => '',
    //         'badge_description' => '',
    //         'points_required' => ''

    //     ];

    //     if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         if(!empty($_FILES['images'])) {

    //             $filename = $_FILES['images']['name'];
    //             $filesize = $_FILES['images']['size'];
    //             $tempname = $_FILES['images']['tmp_name'];
    //             $error = $_FILES['images']['error'];

    //             if($error === 0) {

    //                 // check filesize
    //                 $maxsize = 5 * 1024 * 1024;
    //                 if($filesize > $maxsize) {

    //                     $_SESSION['error'] = "Sorry, your file is greater than 5Mb";
    //                     header("Location: " . URLROOT . "/rewards/update/" . $data['reward']->badge_id);

    //                 } else {

    //                     $ext = pathinfo($filename, PATHINFO_EXTENSION);
    //                     $ext_lc = strtolower($ext);

    //                     $allowed = array("jpg", "jpeg", "png");

    //                     if(in_array($ext_lc, $allowed)) {

    //                         $uploadDir = 'assets/media/rewards/';
    //                         $newIconPath = $uploadDir . basename($filename);

    //                         // exit if file already existed
    //                         if(file_exists($newIconPath)) {

    //                             echo $filename . " is already exists.";

    //                         } else {

    //                             // Create the directory if it doesn't exist
    //                             if(!file_exists($uploadDir)) {

    //                                 mkdir($uploadDir, 0755, true);

    //                             }

    //                             // Set appropriate permissions on the directory
    //                             chmod($uploadDir, 0755);

    //                             // $filenameNew = uniqid('', true) . "." . $ext_lc;

    //                             $uploadDir .= "/" . $filename;

    //                             move_uploaded_file($tempname, $uploadDir);

    //                         }
    
    //                     } else {
                            
    //                         $_SESSION['error'] = "Sorry, your file is not supported";
    //                         header("Location: " . URLROOT . "/rewards/update/" . $data['reward']->badge_id);

    //                     }

    //                 }

    //             } 
    //             // else {

    //             //     $_SESSION['error'] = "Error uploading file";
    //             //     header("Location: " . URLROOT . "/rewards/update/" . $data['badge']->badge_id);

    //             // }

    //         } 
    //         // else {

    //         //     $newIconPath = trim($_POST['existing_icon']);

    //         // }

    //         $data = [

    //             'badge_name' => trim($_POST['badge_name']),
    //             'badge_description' => trim($_POST['badge_description']),
    //             'points_required' => trim($_POST['points_required'])

    //         ];
    //         // End of Check changes



    //             $this->rewardModel->updateReward($data);

    //     }

    //     $this->view('rewards/index', $data);

    // }
public function update($reward_id)
{
    $reward = $this->rewardModel->findRewardById($reward_id);


    $data = [
        'reward' => $reward,
        'badge_name' => '',
        'badge_description' => '',
        'badge_icon_path' => '',  // TODO: Add badge_icon_path to the database
        'points_required' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Check if file was uploaded without errors
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
            $allowed = array("jpg" => "images/jpg", "jpeg" => "images/jpeg", "gif" => "images/gif", "png" => "images/png");
            $filename = $_FILES["file"]["name"];
            $filetype = $_FILES["file"]["type"];
            $filesize = $_FILES["file"]["size"];

            $fileExt = explode('.', $filename);
            $fileActualExt = strtolower(end($fileExt));

            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) {
                $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                header("Location: " . URLROOT . "/rewards");
                exit;
            }

            $username = $_SESSION['email'];
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize) {
                $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                header("Location: " . URLROOT . "/rewards");
                exit;
            }
            $location = "imagess/rewards/" . $username;

            if (in_array($filetype, $allowed)) {
                if (file_exists($location . $filename)) {
                    $_SESSION['failed'] = $filename . " is already exists.";
                    header("Location: " . URLROOT . "/rewards");
                    exit;
                } else {
                    if (!is_dir($location)) {
                        mkdir($location, 0777, true);
                    }

                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $location .= "/" . $fileNameNew;

                    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                        $data['badge_icon_path'] = $location;
                    } else {
                        $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/rewards");
                        exit;
                    }
                }
            } else {
                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                header("Location: " . URLROOT . "/rewards");
                exit;
            }
        }

        $data['badge_name'] = trim($_POST['badge_name']);
        $data['badge_description'] = trim($_POST['badge_description']);
        $data['points_required'] = trim($_POST['points_required']);

        if ($this->rewardModel->updateReward($data)) {
            header("Location: " . URLROOT . "/rewards");
            exit;
        } else {
            // Handle the case where the update failed (e.g., database error).
            // You can redirect or show an error message here.
            die("Something went wrong :(");
        }
    }

    $this->view('rewards/index', $data);
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

    // Inside your Reward model
        public function getRewardimagesPath($points_required) {
            if ($points_required < 10) {
                return 'path/to/bronze_badge.png';
            } elseif ($points_required >= 10 && $points_required < 30) {
                return 'path/to/silver_badge.png';
            } elseif ($points_required >= 30 && $points_required < 50) {
                return 'path/to/gold_badge.png';
            } elseif ($points_required >= 50) {
                return 'path/to/diamond_badge.png';
            } else {
                return 'path/to/default_badge.png'; // Default badge if no condition is met
            }
        }


  
    
    
}

?>
