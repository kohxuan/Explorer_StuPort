<?php
// StuBadge.php (Model)

class StuBadge {
    private $db;

    public function __construct() {
        $this->db = new Database; // Make sure you have a Database class that handles DB connections
    }

    public function getAllStudentBadgesWithTypes() {
        // The SQL query now includes a CASE statement to calculate the badge_type
        $this->db->query("SELECT student_id, reward_id, date_awarded, act_joined,
                          CASE
                            WHEN act_joined < 10 THEN 'Bronze'
                            WHEN act_joined >= 10 AND act_joined < 20 THEN 'Silver'
                            WHEN act_joined >= 20 AND act_joined < 40 THEN 'Gold'
                            ELSE 'Diamond'
                          END AS badge_type
                          FROM student_badges");

        return $this->db->resultSet(); // Assuming resultSet returns an array of objects
    }

    // Other methods like addStudentBadge, updateStudentBadge, etc.
}
