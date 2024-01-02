<?php

    class Rewards extends Controller {

        public function __construct() {

            $this->rewardModel = $this->model('Reward');

        }

        public function index() {

            $rewards = $this->rewardModel->findAllRewards();
            $data = [

                'rewards' => $rewards

            ];

            $this->view('rewards/index', $data);

        }

        public function create() {

            if (!isLoggedIn()){

                header("Location: " . URLROOT. "/rewards" );

            }

            $data = [

                'badge_name' => '',
                'achievement_status' => '',
                'badge_description' => ''

            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $tempname = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];

                if($error === 0) {

                    // check filesize
                    $maxsize = 5 * 1024 * 1024;
                    if($filesize > $maxsize) {

                        $_SESSION['error'] = "Sorry, your file is greater than 5Mb";
                        header("Location: " . URLROOT . "/rewards/create");

                    } else {

                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        $ext_lc = strtolower($ext);

                        $allowed = array("jpg", "jpeg", "png");

                        if(in_array($ext_lc, $allowed)) {

                            $uploadDir = 'assets/media/rewards/';
                            $newIconPath = $uploadDir . basename($filename);

                            // exit if file already existed
                            if(file_exists($newIconPath)) {

                                echo $filename . " is already exists.";

                            } else {

                                // Create the directory if it doesn't exist
                                if(!file_exists($uploadDir)) {

                                    mkdir($uploadDir, 0755, true);

                                }

                                // Set appropriate permissions on the directory
                                chmod($uploadDir, 0755);

                                // $filenameNew = uniqid('', true) . "." . $ext_lc;

                                $uploadDir .= "/" . $filename;

                                move_uploaded_file($tempname, $uploadDir);

                            }
    
                        } else {
                            
                            $_SESSION['error'] = "Sorry, your file is not supported";
                            header("Location: " . URLROOT . "/rewards/create");

                        }

                    }

                } else {

                    $_SESSION['error'] = "Unknown error occur";
                    header("Location: " . URLROOT . "/rewards/create");

                }

                $data = [

                    // 'user_id' => $_SESSION['user_id'],
                    'badge_name' => trim($_POST['badge_name']),
                    'badge_description' => trim($_POST['badge_description']),
                    'achievement_status' => $newIconPath

                ];

                if ($data['badge_name'] && $data['badge_description'] && $data['achievement_status']) {

                    if ($this->rewardModel->addReward($data)) {

                        $_SESSION['error'] = "";

                        header("Location: " . URLROOT. "/rewards" );
                        
                    } else {

                        die("Something went wrong :(");

                    }
                    
                } else {

                    $this->view('rewards/index', $data);

                }

            }

            $this->view('rewards/index', $data);

        }

        public function update($id) {

            $badge = $this->rewardModel->findRewardById($id);

            if(!isLoggedIn()) {

                header("Location: " . URLROOT . "/rewards");

            } 
            // elseif($badge->user_id != $_SESSION['user_id']) {

            //     header("Location: " . URLROOT . "/posts");

            // }

            $data = [

                'reward' => reward,
                'badge_name' => '',
                'badge_description' => '',
                'achievement_status' => '',
                'badge_name_Error' => '',
                'badge_description_Error' => '',
                'achievement_status_Error' => ''

            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if(!empty($_FILES['image'])) {

                    $filename = $_FILES['image']['name'];
                    $filesize = $_FILES['image']['size'];
                    $tempname = $_FILES['image']['tmp_name'];
                    $error = $_FILES['image']['error'];

                    if($error === 0) {

                        // check filesize
                        $maxsize = 5 * 1024 * 1024;
                        if($filesize > $maxsize) {

                            $_SESSION['error'] = "Sorry, your file is greater than 5Mb";
                            header("Location: " . URLROOT . "/rewards/update/" . $data['reward']->reward_id);

                        } else {

                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            $ext_lc = strtolower($ext);

                            $allowed = array("jpg", "jpeg", "png");

                            if(in_array($ext_lc, $allowed)) {

                                $uploadDir = 'assets/media/rewards/';
                                $newIconPath = $uploadDir . basename($filename);

                                // exit if file already existed
                                if(file_exists($newIconPath)) {

                                    echo $filename . " is already exists.";

                                } else {

                                    // Create the directory if it doesn't exist
                                    if(!file_exists($uploadDir)) {

                                        mkdir($uploadDir, 0755, true);

                                    }

                                    // Set appropriate permissions on the directory
                                    chmod($uploadDir, 0755);

                                    // $filenameNew = uniqid('', true) . "." . $ext_lc;

                                    $uploadDir .= "/" . $filename;

                                    move_uploaded_file($tempname, $uploadDir);

                                }
        
                            } else {
                                
                                $_SESSION['error'] = "Sorry, your file is not supported";
                                header("Location: " . URLROOT . "/rewards/update/" . $data['reward']->reward_id);

                            }

                        }

                    } 
                    // else {

                    //     $_SESSION['error'] = "Error uploading file";
                    //     header("Location: " . URLROOT . "/badges/update/" . $data['badge']->badge_id);

                    // }

                } 
                // else {

                //     $newIconPath = trim($_POST['existing_icon']);

                // }

                $data = [

                    'reward_id' => $id,
                    'reward' => $reward,
                    // 'user_id' => $_SESSION['user_id'],
                    'badge_name' => trim($_POST['badge_name']),
                    'badge_description' => trim($_POST['badge_description']),
                    'achievement_status' => $newIconPath,
                    'badge_name_Error' => '',
                    'badge_description_Error' => '',
                    'achievement_status_Error' => ''

                ];

                // Check empty
                if(empty($data['badge_name'])) {

                    $data['badge_name_Error'] = 'The name of a reward cannot be empty';

                }

                if(empty($data['badge_description'])) {

                    $data['badge_description_Error'] = 'The description of a reward cannot be empty';

                }

                if(empty($data['achievement_status'])) {

                    $data['achievement_status_Error'] = $this->rewardModel->findRewardById($id)->achievement_status;

                }
                // End of Check empty

                // Check changes
                if($data['badge_name'] == $this->rewardModel->findRewardById($id)->badge_name) {

                    $data['badge_name_Error'] = "At least change the name!";

                }

                if($data['badge_description'] == $this->rewardModel->findRewardById($id)->badge_description) {

                    $data['badge_description_Error'] = "At least change the description!";

                }

                if($data['achievement_status'] == $this->rewardModel->findRewardById($id)->achievement_status) {

                    $data['achievement_status_Error'] = "At least change the icon!";

                }
                // End of Check changes


                if (empty($data['badge_name_Error'] && $data['badge_description_Error'] && $data['achievement_status_Error'])) {

                    if ($this->rewardModel->updateReward($data)) {

                        $_SESSION['error'] = "";

                        header("Location: " . URLROOT. "/rewards" );

                    } else {

                        die("Something went wrong :(");

                    }

                } else {

                    $this->view('rewards/index', $data);

                }

            }

            $this->view('rewards/index', $data);

        }

        public function delete($id) {

            $reward = $this->rewardModel->findRewardById($id);

            if(!isLoggedIn()) {

                header("Location: " . URLROOT . "/rewards");

            }
            // elseif($post->user_id != $_SESSION['user_id'])
            // {
            //     header("Location: " . URLROOT . "/posts");

            // }

            $data = [

                'reward' => reward,
                'badge_name' => '',
                'badge_description' => '',
                'achievement_status' => '',
                'badge_name_Error' => '',
                'badge_description_Error' => '',
                'achievement_status_Error' => ''

            ];

            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            }

            if($this->badgeModel->deleteBadge($id)){

                header("Location: " . URLROOT . "/reward");

            } else {

                die('Something went wrong..');

            }
            
        }

    }

?>