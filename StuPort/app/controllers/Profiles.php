<?php
// class Profiles extends Controller
// {

//     protected $profileModel;

//     public function __construct()
//     {
//         $this->profileModel = $this->model('Profile');
//     }

//     public function viewProfile($email = null)
//     {
//         if (!$email) {
//             // No email provided, show logged-in user's profile
//             if (!isLoggedIn()) {
//                 header('location: ' . URLROOT . '/users/login');
//             }
//             $email = $_SESSION['email'];
//         }

//         $profile = $this->profileModel->getProfileByEmail($email);

//         // Check if the profile exists
//         if (!$profile) {
//             // Handle profile not found
//             die('Profile not found');
//         }

//         // Load the view with profile data
//         $data = [
//             'profile' => $profile,
//         ];

//         $this->view('profiles/view', $data);
//     }
// }
?>