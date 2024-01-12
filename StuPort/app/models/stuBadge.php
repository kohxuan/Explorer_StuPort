<?php
class StuBadge {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Add methods to interact with the student_badges table here

    // Example method to fetch all student badges
    public function getAllStudentBadges() {
        $this->db->query("SELECT * FROM student_badges");
        return $this->db->resultSet();
    }

    // Example method to add a new student badge
    public function addStudentBadge($student_id, $reward_id, $date_awarded, $act_joined) {
        $this->db->query("INSERT INTO student_badges (student_id, reward_id, date_awarded, act_joined) VALUES (:student_id, :reward_id, :date_awarded, :act_joined)");

        $this->db->bind(':student_id', $student_id);
        $this->db->bind(':reward_id', $reward_id);
        $this->db->bind(':date_awarded', $date_awarded);
        $this->db->bind(':act_joined', $act_joined);

        return $this->db->execute();
    }

    // Add more methods for updating, deleting, or retrieving specific student badges as needed
}
