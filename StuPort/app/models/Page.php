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

    public function adminProfile() //Here we can use calculation...
    {

        // $this->db->query("SELECT * FROM profile WHERE email = :email");

        $this->db->query("SELECT * FROM profile AS p 
                          JOIN user AS u ON p_email = u.email 
                          JOIN administrator AS a ON p_email = a.a_email 
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
            $this->db->query("UPDATE profile 
                                  SET p_email = :email, p_name = :p_name, gender = :gender, race = :race, age = :age, dob = :dob, 
                                  profileimage = :profileimage, position = :position, headline = :headline, 
                                  about = :about, country = :country, citystate = :citystate 
                                  WHERE p_email = :email;
                                  
                                  UPDATE student 
                                  SET s_email = :email, s_fName = :s_fName, s_lName = :s_lName, s_telephone_no = :s_telephone_no, s_address = :s_address, 
                                  s_institution = :s_institution, s_course = :s_course, s_skills = :s_skills, s_hobby = :s_hobby, 
                                  s_achievement = :s_achievement, s_ambition = :s_ambition, s_academic_cert = :s_academic_cert, 
                                  s_cocurriculum_cert = :s_cocurriculum_cert
                                  WHERE s_email = :email;");

            //Profile table
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':p_name', $data['p_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':race', $data['race']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':profileimage', $data['profileimage']);
            $this->db->bind(':position', $_SESSION['user_role']);
            $this->db->bind(':headline', $data['headline']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':citystate', $data['citystate']);


            //Student table
            $this->db->bind(':s_fName', $data['s_fName']);
            $this->db->bind(':s_lName', $data['s_lName']);
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

            
        } else { //Update without image

            //Profile table and Student table
            $this->db->query("UPDATE profile 
                                  SET p_email = :email, p_name = :p_name, gender = :gender, race = :race, age = :age, dob = :dob, 
                                  position = :position, headline = :headline, 
                                  about = :about, country = :country, citystate = :citystate 
                                  WHERE p_email = :email;
                                  
                                  UPDATE student 
                                  SET s_email = :email, s_fName = :s_fName, s_lName = :s_lName, s_telephone_no = :s_telephone_no, s_address = :s_address, 
                                  s_institution = :s_institution, s_course = :s_course, s_skills = :s_skills, s_hobby = :s_hobby, 
                                  s_achievement = :s_achievement, s_ambition = :s_ambition, s_academic_cert = :s_academic_cert, 
                                  s_cocurriculum_cert = :s_cocurriculum_cert
                                  WHERE s_email = :email;");

            //Profile table
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':p_name', $data['p_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':race', $data['race']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':position', $_SESSION['user_role']);
            $this->db->bind(':headline', $data['headline']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':citystate', $data['citystate']);


            //Student table
            $this->db->bind(':s_fName', $data['s_fName']);
            $this->db->bind(':s_lName', $data['s_lName']);
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

        }

        // execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Administrator Role
    public function updateAdminProfile($data)
    {
        if (isset($data['profileimage'])) { //Update with image and information

            //Profile table and Admin table
            $this->db->query("UPDATE p 
                                  SET p_email = :email, p_name = :p_name, gender = :gender, race = :race, age = :age, dob = :dob, 
                                  profileimage = :profileimage, position = :user_role, headline = :headline, 
                                  about = :about, country = :country, citystate = :citystate 
                                  WHERE p_email = :email;
                                  
                                  UPDATE a 
                                  SET a.a_email = :email, a.a_organization = :a_organization, a.a_org_num = :a_org_num, a.a_address = :a_address
                                  WHERE a.a_email = :email;");

            //Profile table
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':p_name', $data['p_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':race', $data['race']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':profileimage', $data['profileimage']);
            $this->db->bind(':position', $_SESSION['user_role']);
            $this->db->bind(':headline', $data['headline']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':citystate', $data['citystate']);
            $this->db->execute();

            //Admin table
            $this->db->bind(':a_organization', $data['a_organization']);
            $this->db->bind(':a_org_num', $data['a_org_num']);
            $this->db->bind(':a_address', $data['a_address']);
            $this->db->execute();
            
        } else { //Update without image

            //Profile table and Admin table
            $this->db->query("UPDATE p 
                                  SET p_email = :email, p_name = :p_name, gender = :gender, race = :race, age = :age, dob = :dob, 
                                  profileimage = :profileimage, position = :user_role, headline = :headline, 
                                  about = :about, country = :country, citystate = :citystate 
                                  WHERE p_email = :email;
                                  
                                  UPDATE a 
                                  SET a.a_email = :email, a.a_organization = :a_organization, a.a_org_num = :a_org_num, a.a_address = :a_address
                                  WHERE a.a_email = :email;");

            //Profile table
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':p_name', $data['p_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':race', $data['race']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':profileimage', $data['profileimage']);
            $this->db->bind(':position', $_SESSION['user_role']);
            $this->db->bind(':headline', $data['headline']);
            $this->db->bind(':about', $data['about']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':citystate', $data['citystate']);
            $this->db->execute();

            //Admin table
            $this->db->bind(':a_organization', $data['a_organization']);
            $this->db->bind(':a_org_num', $data['a_org_num']);
            $this->db->bind(':a_address', $data['a_address']);
            $this->db->execute();
            
        }

        // execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function generatePDF()
    {
        $data = $this->studentProfile();

        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Student Profile');
        $pdf->SetSubject('Student Profile PDF');
        $pdf->SetKeywords('Student, Profile, PDF');

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Create a simple table with headers
        $html = '<h1>Student Profile</h1>';
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<tr>';
        $html .= '<th>Name</th>';
        $html .= '<th>Email</th>';
        // Add more headers as needed
        $html .= '</tr>';

        // Add data to the table
        foreach ($data as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row['name'] . '</td>';
            $html .= '<td>' . $row['email'] . '</td>';
            // Add more data fields as required
            $html .= '</tr>';
        }
        $html .= '</table>';

        // Output the HTML content to PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output PDF document
        $pdf->Output('student_profile.pdf', 'D');
    }
}
