<?php


class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function studentProfile() //Here we can use calculation...
    {

        // $this->db->query("SELECT * FROM profile WHERE email = :email");

        $this->db->query("SELECT * FROM profile AS p 
                          JOIN user AS u ON p_email = u.email 
                          JOIN student AS s ON p_email = s_email 
                          WHERE u.email = :email");

        $this->db->bind(':email', $_SESSION['email']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function lecturerProfile() //Here we can use calculation...
    {

        // $this->db->query("SELECT * FROM profile WHERE email = :email");

        $this->db->query("SELECT * FROM profile AS p 
                          JOIN user AS u ON p_email = u.email 
                          JOIN lecturer AS l ON p_email = l_email 
                          WHERE u.email = :email");

        $this->db->bind(':email', $_SESSION['email']);

        $result = $this->db->resultSet();

        return $result;
    }

    // public function getUserRole($email)
    // {
    //     $this->db->query("SELECT user_role FROM user WHERE email = :email");
    //     $this->db->bind(':email', $email);
    //     $result = $this->db->single(); // Assuming single() returns a single result

    //     if ($result) {
    //         return $result->email;;
    //     } else {
    //         return null; // User role not found for this user ID
    //     }
    // }

    // public function universitySelection()
    // {

    //     $this->db->query("SELECT * FROM uni_details");

    //     $result = $this->db->resultSet();

    //     return $result;
    // }

    // public function universitySelectionDetails()
    // {

    //     if ($_SESSION['user_role'] == "student") {

    //     $user_code = $_SESSION['user_code'];

    //     $this->db->query("SELECT * FROM uni_details
    //     INNER JOIN st_profile ON uni_detailuni_code=st_profile.univ_code  WHERE st_code = :st_code");

    //     $this->db->bind(':st_code', $user_code);

    //     }elseif($_SESSION['user_role'] == "supervisor"){

    //     $user_code = $_SESSION['user_code'];

    //     $this->db->query("SELECT * FROM uni_details
    //     INNER JOIN sv_profile ON uni_detailuni_code=sv_profile.univ_code  WHERE sv_code = :sv_code");

    //     $this->db->bind(':sv_code', $user_code);

    //     }

    //     $result = $this->db->resultSet();

    //     return $result;
    // }

    //Student Role
    public function updateStudentProfile($data)
    {
        if (isset($data['profileimage'])) { //Update with image and information

            //Profile table and Student table
            // $this->db->query("UPDATE profile 
            //                       SET p_email = :email, p_name = :p_name, gender = :gender, race = :race, age = :age, dob = :dob, 
            //                       profileimage = :profileimage, position = :position, headline = :headline, 
            //                       about = :about, country = :country, citystate = :citystate 
            //                       WHERE p_email = :email;

            //                       UPDATE student 
            //                       SET s_email = :email, s_fName = :s_fName, s_lName = :s_lName, s_telephone_no = :s_telephone_no, s_address = :s_address, 
            //                       s_institution = :s_institution, s_course = :s_course, s_skills = :s_skills, s_hobby = :s_hobby, 
            //                       s_achievement = :s_achievement, s_ambition = :s_ambition, s_academic_cert = :s_academic_cert, 
            //                       s_cocurriculum_cert = :s_cocurriculum_cert
            //                       WHERE s_email = :email;");

            $this->db->query("UPDATE profile 
                                SET p_email = :email, p_name = :p_name, dob = :dob, 
                                profileimage = :profileimage, position = :position, headline = :headline, 
                                about = :about, country = :country, citystate = :citystate 
                                WHERE p_email = :email;

                                UPDATE student 
                                SET s_email = :email, s_fName = :s_fName, s_telephone_no = :s_telephone_no, s_address = :s_address, 
                                s_institution = :s_institution, s_course = :s_course, s_skills = :s_skills, s_hobby = :s_hobby, 
                                s_achievement = :s_achievement, s_ambition = :s_ambition, s_academic_cert = :s_academic_cert, 
                                s_cocurriculum_cert = :s_cocurriculum_cert, s_race = :s_race, s_age = :s_age, s_gender = :s_gender
                                WHERE s_email = :email;");

            //Profile table
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':p_name', $data['p_name']);
            // $this->db->bind(':gender', $data['gender']);
            // $this->db->bind(':race', $data['race']);
            // $this->db->bind(':age', $data['age']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':profileimage', $data['profileimage']);
            $this->db->bind(':position', $_SESSION['user_role']);
            $this->db->bind(':headline', $data['headline']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':citystate', $data['citystate']);


            //Student table
            $this->db->bind(':s_fName', $data['s_fName']);
            $this->db->bind(':s_telephone_no', $data['s_telephone_no']);
            $this->db->bind(':s_address', $data['s_address']);
            $this->db->bind(':s_institution', $data['s_institution']);
            $this->db->bind(':s_course', $data['s_course']);
            $this->db->bind(':s_skills', $data['s_skills']);
            $this->db->bind(':s_hobby', $data['s_hobby']);
            $this->db->bind(':s_achievement', $data['s_achievement']);
            $this->db->bind(':s_ambition', $data['s_ambition']);
            $this->db->bind(':s_academic_cert', $data['s_academic_cert']);
            $this->db->bind(':s_cocurriculum_cert', $data['s_cocurriculum_cert']);
            $this->db->bind(':s_gender', $data['s_gender']);
            $this->db->bind(':s_race', $data['s_race']);
            $this->db->bind(':s_age', $data['s_age']);
            
        } else { //Update without image

            $this->db->query("UPDATE profile 
                                SET p_email = :email, p_name = :p_name, dob = :dob, 
                                position = :position, headline = :headline, 
                                about = :about, country = :country, citystate = :citystate 
                                WHERE p_email = :email;

                                UPDATE student 
                                SET s_email = :email, s_fName = :s_fName, s_telephone_no = :s_telephone_no, s_address = :s_address, 
                                s_institution = :s_institution, s_course = :s_course, s_skills = :s_skills, s_hobby = :s_hobby, 
                                s_achievement = :s_achievement, s_ambition = :s_ambition, s_academic_cert = :s_academic_cert, 
                                s_cocurriculum_cert = :s_cocurriculum_cert, s_race = :s_race, s_age = :s_age, s_gender = :s_gender
                                WHERE s_email = :email;");

            //Profile table
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':p_name', $data['p_name']);
            // $this->db->bind(':gender', $data['gender']);
            // $this->db->bind(':race', $data['race']);
            // $this->db->bind(':age', $data['age']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':position', $_SESSION['user_role']);
            $this->db->bind(':headline', $data['headline']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':citystate', $data['citystate']);

            //Student table
            $this->db->bind(':s_fName', $data['s_fName']);
            $this->db->bind(':s_telephone_no', $data['s_telephone_no']);
            $this->db->bind(':s_address', $data['s_address']);
            $this->db->bind(':s_institution', $data['s_institution']);
            $this->db->bind(':s_course', $data['s_course']);
            $this->db->bind(':s_skills', $data['s_skills']);
            $this->db->bind(':s_hobby', $data['s_hobby']);
            $this->db->bind(':s_achievement', $data['s_achievement']);
            $this->db->bind(':s_ambition', $data['s_ambition']);
            $this->db->bind(':s_academic_cert', $data['s_academic_cert']);
            $this->db->bind(':s_cocurriculum_cert', $data['s_cocurriculum_cert']);
            $this->db->bind(':s_gender', $data['s_gender']);
            $this->db->bind(':s_race', $data['s_race']);
            $this->db->bind(':s_age', $data['s_age']);

        }

        // execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Lecturer Role
    public function updateLecturerProfile($data)
    {
        if (isset($data['profileimage'])) { //Update with image and information

            //Profile table and Lecturer table
            $this->db->query("UPDATE profile 
                                  SET p_email = :email, p_name = :p_name, dob = :dob, 
                                  profileimage = :profileimage, position = :position, headline = :headline, 
                                  about = :about, country = :country, citystate = :citystate 
                                  WHERE p_email = :email;
                                  
                                  UPDATE lecturer 
                                  SET l_email = :email, l_fName = :l_fName, l_telephone_no = :l_telephone_no, 
                                  l_address = :l_address, l_institution = :l_institution, l_gender = :l_gender,
                                  l_age = :l_age, l_race = :l_race
                                  WHERE a_email = :email;");

            //Profile table
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':p_name', $data['p_name']);
            // $this->db->bind(':gender', $data['gender']);
            // $this->db->bind(':race', $data['race']);
            // $this->db->bind(':age', $data['age']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':profileimage', $data['profileimage']);
            $this->db->bind(':position', $_SESSION['user_role']);
            $this->db->bind(':headline', $data['headline']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':citystate', $data['citystate']);

            //Lecturer table
            $this->db->bind(':l_fName', $data['l_fName']);
            $this->db->bind(':l_telephone_no', $data['l_telephone_no']);
            $this->db->bind(':l_address', $data['l_address']);
            $this->db->bind(':l_institution', $data['l_institution']);
            $this->db->bind(':l_gender', $data['l_gender']);
            $this->db->bind(':l_age', $data['l_age']);
            $this->db->bind(':l_race', $data['l_race']);
        } else { //Update without image

            //Profile table and Lecturer table
            $this->db->query("UPDATE profile 
                                  SET p_email = :email, p_name = :p_name, dob = :dob, 
                                  position = :position, headline = :headline, 
                                  about = :about, country = :country, citystate = :citystate 
                                  WHERE p_email = :email;
                                  
                                  UPDATE lecturer 
                                  SET l_email = :email, l_fName = :l_fName, l_telephone_no = :l_telephone_no, 
                                  l_address = :l_address, l_institution = :l_institution, l_gender = :l_gender,
                                  l_age = :l_age, l_race = :l_race
                                  WHERE a_email = :email;");

            //Profile table
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':p_name', $data['p_name']);
            // $this->db->bind(':gender', $data['gender']);
            // $this->db->bind(':race', $data['race']);
            // $this->db->bind(':age', $data['age']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':position', $_SESSION['user_role']);
            $this->db->bind(':headline', $data['headline']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':citystate', $data['citystate']);

            //Lecturer table
            $this->db->bind(':l_fName', $data['l_fName']);
            $this->db->bind(':l_telephone_no', $data['l_telephone_no']);
            $this->db->bind(':l_address', $data['l_address']);
            $this->db->bind(':l_institution', $data['l_institution']);
            $this->db->bind(':l_gender', $data['l_gender']);
            $this->db->bind(':l_age', $data['l_age']);
            $this->db->bind(':l_race', $data['l_race']);
        }

        // execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
