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

        $this->db->query("SELECT * FROM profile AS p 
                          JOIN user AS u ON p.id = u.id 
                          JOIN student AS s ON p.id = s.id 
                          WHERE u.email = :email");

        $this->db->bind(':email', $_SESSION['email']);

        $result = $this->db->resultSet();

        return $result;
    }


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
    //     INNER JOIN st_profile ON uni_details.uni_code=st_profile.univ_code  WHERE st_code = :st_code");

    //     $this->db->bind(':st_code', $user_code);

    //     }elseif($_SESSION['user_role'] == "supervisor"){

    //     $user_code = $_SESSION['user_code'];

    //     $this->db->query("SELECT * FROM uni_details
    //     INNER JOIN sv_profile ON uni_details.uni_code=sv_profile.univ_code  WHERE sv_code = :sv_code");

    //     $this->db->bind(':sv_code', $user_code);

    //     }

    //     $result = $this->db->resultSet();

    //     return $result;
    // }


    public function updateStudentProfile($data)
    {
        $id = $_SESSION['user_id']; // Assuming you store the user ID in the session

        $this->db->beginTransaction();

        try {
            if (isset($data['image'])) { //Update with image and information

                $this->db->query("UPDATE users 
                                  SET email = :email
                                  WHERE id = :id;");

                $this->db->bind(':email', $data['email']);
                $this->db->bind(':id', $id);
                $this->db->execute();

                $this->db->query("UPDATE profile 
                                  SET name = :name, gender = :gender, age = :age, dob = :dob, 
                                  profileimage = :profileimage, position = :position, headline = :headline, 
                                  about = :about, country = :country, citystate = :citystate 
                                  WHERE id = :id;");

                $this->db->bind(':name', $data['name']);
                $this->db->bind(':gender', $data['gender']);
                $this->db->bind(':age', $data['age']);
                $this->db->bind(':dob', $data['dob']);
                $this->db->bind(':profileimage', $data['profileimage']);
                $this->db->bind(':position', $data['position']);
                $this->db->bind(':headline', $data['headline']);
                $this->db->bind(':about', $data['about']);
                $this->db->bind(':country', $data['country']);
                $this->db->bind(':citystate', $data['citystate']);
                $this->db->bind(':id', $id);
                $this->db->execute();

                $this->db->query("UPDATE student 
                                  SET fName = :fName, lName = :lName, telephone_no = :telephone_no, address = :address, 
                                  institution = :institution, course = :course, skills = :skills, hobby = :hobby, achievement = :achievement, ambition = :ambition, academic_cert = :academic_cert, cocurriculum_cert = :cocurriculum_cert
                                  WHERE id = :id;");
                $this->db->bind(':fName', $data['fName']);
                $this->db->bind(':lName', $data['lName']); // Assuming lName exists in $studentData
                $this->db->bind(':telephone_no', $data['telephone_no']); // Assuming telephone_no exists in $studentData
                $this->db->bind(':address', $data['address']); // Assuming address exists in $studentData
                $this->db->bind(':institution', $data['institution']); // Assuming institution exists in $studentData
                $this->db->bind(':course', $data['course']); // Assuming course exists in $studentData
                $this->db->bind(':skills', $data['skills']); // Assuming skills exists in $studentData
                $this->db->bind(':hobby', $data['hobby']); // Assuming hobby exists in $studentData
                $this->db->bind(':achievement', $data['achievement']); // Assuming achievement exists in $studentData
                $this->db->bind(':ambition', $data['ambition']); // Assuming ambition exists in $studentData
                $this->db->bind(':academic_cert', $data['academic_cert']); // Assuming academic_cert exists in $studentData
                $this->db->bind(':cocurriculum_cert', $data['cocurriculum_cert']); // Assuming cocurriculum_cert exists in $studentData
                $this->db->bind(':id', $id);
                $this->db->execute();
            } else { //Update without image

                $this->db->query("UPDATE user 
                                  SET email = :email
                                  WHERE id = :id;");

                $this->db->bind(':email', $data['email']);
                $this->db->bind(':id', $id);
                $this->db->execute();

                $this->db->query("UPDATE profile 
                                  SET name = :name, gender = :gender, age = :age, dob = :dob, 
                                  position = :position, headline = :headline, 
                                  about = :about, country = :country, citystate = :citystate 
                                  WHERE id = :id;");

                $this->db->bind(':name', $data['name']);
                $this->db->bind(':gender', $data['gender']);
                $this->db->bind(':age', $data['age']);
                $this->db->bind(':dob', $data['dob']);
                $this->db->bind(':position', $data['position']);
                $this->db->bind(':headline', $data['headline']);
                $this->db->bind(':about', $data['about']);
                $this->db->bind(':country', $data['country']);
                $this->db->bind(':citystate', $data['citystate']);
                $this->db->bind(':id', $id);
                $this->db->execute();

                $this->db->query("UPDATE student 
                                  SET fName = :fName, lName = :lName, telephone_no = :telephone_no, address = :address, 
                                  institution = :institution, course = :course, skills = :skills, hobby = :hobby, achievement = :achievement, ambition = :ambition, academic_cert = :academic_cert, cocurriculum_cert = :cocurriculum_cert
                                  WHERE id = :id;");
                $this->db->bind(':fName', $data['fName']);
                $this->db->bind(':lName', $data['lName']); // Assuming lName exists in $studentData
                $this->db->bind(':telephone_no', $data['telephone_no']); // Assuming telephone_no exists in $studentData
                $this->db->bind(':address', $data['address']); // Assuming address exists in $studentData
                $this->db->bind(':institution', $data['institution']); // Assuming institution exists in $studentData
                $this->db->bind(':course', $data['course']); // Assuming course exists in $studentData
                $this->db->bind(':skills', $data['skills']); // Assuming skills exists in $studentData
                $this->db->bind(':hobby', $data['hobby']); // Assuming hobby exists in $studentData
                $this->db->bind(':achievement', $data['achievement']); // Assuming achievement exists in $studentData
                $this->db->bind(':ambition', $data['ambition']); // Assuming ambition exists in $studentData
                $this->db->bind(':academic_cert', $data['academic_cert']); // Assuming academic_cert exists in $studentData
                $this->db->bind(':cocurriculum_cert', $data['cocurriculum_cert']); // Assuming cocurriculum_cert exists in $studentData
                $this->db->bind(':id', $id);
                $this->db->execute();
            }

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            // If any query fails, rollback changes
            $this->db->rollBack();
            return false;
        }

        //execute function
        // if ($this->db->execute()) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
}
