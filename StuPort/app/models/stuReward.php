
<?php

class StuReward
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllRewardsByStudent($student_id)
    {
        $this->db->query('SELECT * FROM stuReward WHERE student_id = :student_id');
        $this->db->bind(':student_id', $student_id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function addStudentReward($data)
    {
        $this->db->query('INSERT INTO stuReward (student_id, reward_id, earned_date) VALUES (:student_id, :reward_id, :earned_date)');
        $this->db->bind(':student_id', $data['student_id']);
        $this->db->bind(':reward_id', $data['reward_id']);
        $this->db->bind(':earned_date', $data['earned_date']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStudentReward($data)
    {
        $this->db->query('UPDATE stuReward SET reward_id = :reward_id, earned_date = :earned_date WHERE student_id = :student_id');
        $this->db->bind(':student_id', $data['student_id']);
        $this->db->bind(':reward_id', $data['reward_id']);
        $this->db->bind(':earned_date', $data['earned_date']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteStudentReward($student_id, $reward_id)
    {
        $this->db->query('DELETE FROM stuReward WHERE student_id = :student_id AND reward_id = :reward_id');
        $this->db->bind(':student_id', $student_id);
        $this->db->bind(':reward_id', $reward_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
