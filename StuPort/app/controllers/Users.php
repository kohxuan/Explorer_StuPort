<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        $data = [
            'username' => '',
            'email' => '',
            'full_name' => '',
            'telephone' => '',
            'age' => '',
            'race' => '',
            'gender' => '',
            'password' => '',
            'confirmPassword' => '',
            'user_role' => '',  
            'address' => '',
            'institution' => '',
            'course' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'fullNameError' => '',  // Add these lines to initialize the new keys
            'genderError' => '',
            'ageError' => '',
            'addressError' => '',
            'courseError' => '',
            'institutionError' => '',
            'telephoneError' => '',
            'raceError' => ''
    
        ];
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'full_name' => trim($_POST['full_name']),
                'telephone' => trim($_POST['telephone']),
                'age' => trim($_POST['age']),
                'race' => trim($_POST['race']),
                'gender' => trim($_POST['gender']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'user_role' => isset($_POST['user_role'])? $_POST['user_role'] : '',  // Add user role to the data array
                'address' => trim($_POST['address']),
                'institution' => trim($_POST['institution']),
                'course' => trim($_POST['course']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'fullNameError' => '',  // Add these lines to initialize the new keys
                'genderError' => '',
                'ageError' => '',
                'addressError' => '',
                'courseError' => '',
                'institutionError' => '',
                'telephoneError' => '',
                'raceError' => ''
        
                //'userRoleError' => ''  // Add user role error to the data array
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
     

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } 

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Validate Age
            if (empty($data['age'])) {
                $data['ageError'] = 'Please enter age.';
            } elseif (!is_numeric($data['age']) || $data['age'] < 0) {
                $data['ageError'] = 'Age must be a positive number.';
            }

            // Validate Address
            if (empty($data['addressError']) && empty($data['address'])) {
                $data['addressError'] = 'Please enter address.';
            }

            
            // Validate course
            if (empty($data['courseError']) && empty($data['course'])) {
                $data['courseError'] = 'Please enter course.';
            }
            
            // Validate institution
            if (empty($data['institutionError']) && empty($data['institution'])) {
                $data['institutionError'] = 'Please enter institution.';
            }
            
            // Validate telephone
            if (empty($data['telephoneError']) && empty($data['telephone'])) {
                $data['telephoneError'] = 'Please enter telephone.';
            }

            // Validate race
            if (empty($data['raceError']) && empty($data['race'])) {
                $data['raceError'] = 'Please enter race.';
            }

               




            // Make sure that errors are empty
            if (empty($data['usernameError']) &&
                empty($data['emailError']) && 
                empty($data['passwordError']) && 
                empty($data['confirmPasswordError']) && 
                empty($data['ageError']) &&
                empty($data['addressError']) &&
                empty($data['courseError']) &&
                empty($data['institutionError']) &&
                empty($data['telephoneError']) &&
                empty($data['raceError'])

                ) {
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Assign the user role to the $data array
                //$data['user_role'] = $_POST['user_role'];


                if ($data['user_role'] == "Student") {
                    $this->userModel->registerStudent($data);
                    header('location:'. URLROOT . '/user/login');
                } else if ($data['user_role'] == "Lecturer") {
                    $this->userModel->registerLecturer($data);
                    header('location:'. URLROOT . '/user/login');
                }
            }

        }
        $this->view('users/register', $data);
      }  // This brace was moved to the correct position

     

    
    public function login() {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];
    
        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
    
            // Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }
    
            // Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

                // Validate other fields to ensure they are not empty
            $requiredFields = ['address', 'course', 'institution', 'telephone', 'race'];

            foreach ($requiredFields as $field) {
                if (empty($data[$field])) {
                    $data[$field . 'Error'] = 'Please enter ' . $field . '.';
                }
            }
    
            // Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                if ($loggedInUser) {
                    // If the login is successful, redirect to the home page or some other page
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
                    // Log the entered username and password
                    error_log("Entered Username: {$data['username']}, Entered Password: {$data['password']}");
                }
            }
        }
    
        $this->view('users/login', $data);
    }





    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['user_role'] = $user->user_role;

    
        // Redirect based on user_role
        header('location:' . URLROOT . '/pages/index');
    }
    
    
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['user_role']);
        header('location:' . URLROOT . '/users/login');
    }
}