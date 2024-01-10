<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function registerStudent($data) {
        date_default_timezone_set("Asia/Taipei");
        $user_datetime = date('Y-m-d H:i:s');
        $user_reg_status = "active";

        $this->db->query('INSERT INTO profile (p_email, p_name, gender, race, age, dob, profileimage, position, headline, about, country, citystate) 
        VALUES(:p_email, :p_name, :gender, :race, :age, :dob, :profileimage, :position, :headline, :about, :country, :citystate)');

                       
        //Bind values for profile table
        $p_name = "";
        $dob = "";
        $profileimage = "images/dummy/user.png";
        $headline = "";
        $about = "";
        $country = "Malaysia";
        $citystate = "";

        //Bind values for profile table
        $this->db->bind(':p_email', $data['email']);
        $this->db->bind(':p_name', $p_name);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':race', $data['race']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':dob', $dob);
        $this->db->bind(':profileimage', $profileimage);
        $this->db->bind(':position', $data['user_role']);
        $this->db->bind(':headline', $headline);
        $this->db->bind(':about', $about);
        $this->db->bind(':country', $country);
        $this->db->bind(':citystate', $citystate);

        $this->db->execute();

        $this->db->query('INSERT INTO student (s_email, s_fName, s_telephone_no, s_address, s_institution, s_course, s_skills, s_hobby, s_achievement, s_ambition, s_academic_cert, s_cocurriculum_cert, s_age, s_gender, s_race) 
                  VALUES(:s_email, :s_fName, :s_telephone_no, :s_address, :s_institution, :s_course, :s_skills, :s_hobby, :s_achievement, :s_ambition, :s_academic_cert, :s_cocurriculum_cert, :s_age , :s_gender, :s_race)');

        //Bind values for student table
        $s_fName = "";
        $s_lName = "";
        $s_telephone_no = "";
        $s_address = "";
        $s_institution = "";
        $s_course = "";
        $s_skills = "";
        $s_hobby = "";
        $s_achievement = "";
        $s_ambition = "";
        $s_academic_cert = "";
        $s_cocurriculum_cert = "";



        //Bind values for student table
        $this->db->bind(':s_email', $data['email']);
        $this->db->bind(':s_fName', $data['full_name']);
        $this->db->bind(':s_telephone_no', $s_telephone_no);
        $this->db->bind(':s_address', $s_address);
        $this->db->bind(':s_institution', $s_institution);
        $this->db->bind(':s_course', $s_course);
        $this->db->bind(':s_skills', $s_skills);
        $this->db->bind(':s_hobby', $s_hobby);
        $this->db->bind(':s_achievement', $s_achievement);
        $this->db->bind(':s_ambition', $s_ambition);
        $this->db->bind(':s_academic_cert', $s_academic_cert);
        $this->db->bind(':s_cocurriculum_cert', $s_cocurriculum_cert);
        $this->db->bind(':s_age', $data['age']);
        $this->db->bind(':s_gender', $data['gender']);
        $this->db->bind(':s_race', $data['race']);
    
        $this->db->execute();
    
        $dataUser = [
            'username' => $data['username'],
            'password' => $data['password'],
            'email' => $data['email'],
            'user_role' => $data['user_role'],
            'datetime_register' => $user_datetime,
            'user_reg_status' => $user_reg_status
        ];
    
        $this->registerUser($dataUser);
    }

    public function registerLecturer($data) {
        date_default_timezone_set("Asia/Taipei");
        $user_datetime = date('Y-m-d H:i:s');
        $user_reg_status = "active";

        $this->db->query('INSERT INTO profile (p_email, p_name, gender, race, age, dob, profileimage, position, headline, about, country, citystate) 
        VALUES(:p_email, :p_name, :gender, :race, :age, :dob, :profileimage, :position, :headline, :about, :country, :citystate)');

                       
        //Bind values for profile table
        $p_name = "";
        $dob = "";
        $profileimage = "images/dummy/user.png";
        $headline = "";
        $about = "";
        $country = "Malaysia";
        $citystate = "";

        //Bind values for profile table
        $this->db->bind(':p_email', $data['email']);
        $this->db->bind(':p_name', $p_name);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':race', $data['race']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':dob', $dob);
        $this->db->bind(':profileimage', $profileimage);
        $this->db->bind(':position', $data['user_role']);
        $this->db->bind(':headline', $headline);
        $this->db->bind(':about', $about);
        $this->db->bind(':country', $country);
        $this->db->bind(':citystate', $citystate);

        $this->db->execute();

        $this->db->query('INSERT INTO lecturer (l_email, l_fName, l_telephone_no, l_address, l_institution, l_age, l_gender, l_race) 
                  VALUES(:l_email, :l_fName, :l_telephone_no, :l_address, :l_institution, :l_age, :l_gender, :l_race)');

        //Bind values for student table
        $l_fName = "";
        $l_telephone_no = "";
        $l_address = "";
        $l_institution = "";
      

        //Bind values for student table
        $this->db->bind(':l_email', $data['email']);
        $this->db->bind(':l_fName', $data['full_name']);
        $this->db->bind(':l_telephone_no', $l_telephone_no);
        $this->db->bind(':l_address', $l_address);
        $this->db->bind(':l_institution', $l_institution);
        $this->db->bind(':l_age', $data['age']);
        $this->db->bind(':l_gender', $data['gender']);
        $this->db->bind(':l_race', $data['race']);
    
        $this->db->execute();
    
        $dataUser = [
            'username' => $data['username'],
            'password' => $data['password'],
            'email' => $data['email'],
            'user_role' => $data['user_role'],
            'datetime_register' => $user_datetime,
            'user_reg_status' => $user_reg_status
        ];
    
        $this->registerUser($dataUser);
    }
    
    public function registerUser($data) {
        $this->db->query('INSERT INTO user (username, password, email, user_role, datetime_register, user_reg_status) 
            VALUES(:username, :password, :email, :user_role, :datetime_register, :user_reg_status)');
    
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_role', $data['user_role']);
        $this->db->bind(':datetime_register', $data['datetime_register']);
        $this->db->bind(':user_reg_status', $data['user_reg_status']);
    
        $this->db->execute();
    }
    
    // public function register($data)
    // {
    //     // Set timezone

    
    //     if ($data['user_role'] == "Student") {
    //         $this->db->query('INSERT INTO user (username, password, email, user_role, datetime_register, user_reg_status) 
    //             VALUES(:username, :password, :email, :user_role, :datetime_register, :user_reg_status)');
    
    //         $this->db->query('INSERT INTO profile (p_email, gender, race, age, position)
    //             VALUES(:p_email, :gender, :race, :age, :position)');
    
    //         $this->db->query('INSERT INTO student (s_email, s_gender, s_race, s_age)
    //             VALUES(:s_email, :s_gender, :s_race, :s_age)');
    
    //         $this->db->bind(':p_email', $data['email']);
    //         $this->db->bind(':gender', $data['gender']);
    //         $this->db->bind(':race', $data['race']);
    //         $this->db->bind(':age', $data['age']);
    //         $this->db->bind(':position', $data['user_role']);
    
    //         $this->db->bind(':s_email', $data['email']);
    //         $this->db->bind(':s_gender', $data['gender']);
    //         $this->db->bind(':s_race', $data['race']);
    //         $this->db->bind(':s_age', $data['age']);
    //     } elseif ($data['user_role'] == "Administrator") {
    //         $this->db->query("INSERT INTO user (username, email, password, user_role, datetime_register, user_reg_status) 
    //             VALUES(:username, :email, :password, :user_role, :datetime_register, :user_reg_status)");
    
    //         $this->db->query('INSERT INTO profile (p_email, gender, race, age, position)
    //             VALUES(:p_email, :gender, :race, :age, :position)');
    
    //         $this->db->query('INSERT INTO administrator (a_email, a_organization, a_org_num, a_address)
    //             VALUES(:a_email, :a_organization, :a_org_num, :a_address)');
    
    //         $this->db->bind(':p_email', $data['email']);
    //         $this->db->bind(':gender', $data['gender']);
    //         $this->db->bind(':race', $data['race']);
    //         $this->db->bind(':age', $data['age']);
    //         $this->db->bind(':position', $data['user_role']);
    
    //         $this->db->bind(':a_email', $data['email']);
    //         $this->db->bind(':a_organization', $a_organization);  // Replace with actual value
    //         $this->db->bind(':a_org_num', $a_org_num);            // Replace with actual value
    //         $this->db->bind(':a_address', $a_address);            // Replace with actual value
    //     }
    
    //     $this->db->bind(':username', $data['username']);
    //     $this->db->bind(':email', $data['email']);
    //     $this->db->bind(':password', $data['password']);
    //     $this->db->bind(':user_role', $data['user_role']);
    //     $this->db->bind(':datetime_register', $user_datetime);
    //     $this->db->bind(':user_reg_status', $user_reg_status);
    
    // }
    

    public function login($username, $password) {
        $this->db->query('SELECT * FROM user WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        if ($row) {
            $hashedPassword = $row->password;
    
            if (password_verify($password, $hashedPassword)) {
                return $row; // User authenticated successfully
            }
        }
    
        return false; // User not found or authentication failed
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM user WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}