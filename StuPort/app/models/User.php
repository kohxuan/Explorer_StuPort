<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    // public function register($data) {
    //     $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

    //     //Bind values
    //     $this->db->bind(':username', $data['username']);
    //     $this->db->bind(':email', $data['email']);
    //     $this->db->bind(':password', $data['password']);

    //     //Execute function
    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    public function register($data)
    {

        // Set timezone 
        date_default_timezone_set("Asia/Taipei");
        $user_datetime = date('Y-m-d H:i:s');
        $user_reg_status = "active";

        //insert value for user registration
        //insert value for profile detail
        if ($data['user_role'] == "Student") {

            //student users and profile
            $this->db->query("INSERT INTO user (username, email, password, user_role, datetime_register, user_reg_status) 
            VALUES(:username, :email, :password, :user_role, :datetime_register, :user_reg_status);
            
            INSERT INTO profile (p_email, p_name, gender, race, age, dob, profileimage, position, headline, about, country, citystate) 
            VALUES(:p_email, :p_name, :gender, :race, :age, :dob, :profileimage, :position, :headline, :about, :country, :citystate);
            
            INSERT INTO student (s_email, s_fName, s_lName, s_telephone_no, s_address, s_institution, s_course, s_skills, s_hobby, s_achievement, s_ambition, s_academic_cert, s_cocurriculum_cert) 
            VALUES(:s_email, :s_fName, :s_lName, :s_telephone_no, :s_address, :s_institution, :s_course, :s_skills, :s_hobby, :s_achievement, :s_ambition, :s_academic_cert, :s_cocurriculum_cert);");

            //Bind values for profile table
            // $st_ic = "";
            // $st_fullname = "";
            // $st_gender = "";
            // $st_race = "";
            // $univ_code = "";
            // $st_address = "";

            //Bind values for profile table
            $p_name = "";
            $gender = "";
            $race = "";
            $age = "";
            $dob = "";
            $profileimage = "images/dummy/user.png";
            $headline = "";
            $about = "";
            $country = "Malaysia";
            $citystate = "";
            
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

            //Bind values for users table
            //  $this->db->bind(':st_ic', $st_ic);
            //  $this->db->bind(':st_fullname', $st_fullname);
            //  $this->db->bind(':st_gender', $st_gender);
            //  $this->db->bind(':st_race', $st_race);
            //  $this->db->bind(':univ_code', $univ_code);
            //  $this->db->bind(':st_address', $st_address);
            //  $this->db->bind(':st_image', $st_image);
        
            //Bind values for user table
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_role', $data['user_role']);
            $this->db->bind(':datetime_register', $user_datetime);
            $this->db->bind(':user_reg_status', $user_reg_status);

            //Bind values for profile table
            $this->db->bind(':p_email', $data['email']);
            $this->db->bind(':p_name', $p_name);
            $this->db->bind(':gender', $gender);
            $this->db->bind(':race', $race);
            $this->db->bind(':age', $age);
            $this->db->bind(':dob', $dob);
            $this->db->bind(':profileimage', $profileimage);
            $this->db->bind(':position', $data['user_role']);
            $this->db->bind(':headline', $headline);
            $this->db->bind(':about', $about);
            $this->db->bind(':country', $country);
            $this->db->bind(':citystate', $citystate);

            //Bind values for student table
            $this->db->bind(':s_email', $data['email']);
            $this->db->bind(':s_fName', $s_fName);
            $this->db->bind(':s_lName', $s_lName);
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

        } elseif ($data['user_role'] == "Administrator") {
            //admin users and profile
            $this->db->query("INSERT INTO user (username, email, password, user_role, datetime_register, user_reg_status) 
            VALUES(:username, :email, :password, :user_role, :datetime_register, :user_reg_status);
            
            INSERT INTO profile (p_email, p_name, gender, race, age, dob, profileimage, position, headline, about, country, citystate) 
            VALUES(:p_email, :p_name, :gender, :race, :age, :dob, :profileimage, :position, :headline, :about, :country, :citystate);
            
            INSERT INTO administrator (a_email, a_organization, a_org_num, a_address) 
            VALUES(:a_email, :a_organization, :a_org_num, :a_address);");

            //Bind values for profile table
            $p_name = "";
            $gender = "";
            $race = "";
            $age = "";
            $dob = "";
            $profileimage = "images/dummy/user.png";
            $headline = "";
            $about = "";
            $country = "Malaysia";
            $citystate = "";
            
            //Bind values for admin table
            $a_organization = "";
            $a_org_num = "";
            $a_address = "";
       
            //Bind values for user table
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_role', $data['user_role']);
            $this->db->bind(':datetime_register', $user_datetime);
            $this->db->bind(':user_reg_status', $user_reg_status);

            //Bind values for profile table
            $this->db->bind(':p_email', $data['email']);
            $this->db->bind(':p_name', $p_name);
            $this->db->bind(':gender', $gender);
            $this->db->bind(':race', $race);
            $this->db->bind(':age', $age);
            $this->db->bind(':dob', $dob);
            $this->db->bind(':profileimage', $profileimage);
            $this->db->bind(':position', $data['user_role']);
            $this->db->bind(':headline', $headline);
            $this->db->bind(':about', $about);
            $this->db->bind(':country', $country);
            $this->db->bind(':citystate', $citystate);

            //Bind values for admin table
            $this->db->bind(':s_email', $data['email']);
            $this->db->bind(':a_organization', $a_organization);
            $this->db->bind(':a_org_num', $a_org_num);
            $this->db->bind(':a_address', $a_address);
         
        } else {
           
        }

        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

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