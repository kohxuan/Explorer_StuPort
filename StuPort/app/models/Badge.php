<?php 

class Badge{
    
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function findAllBadges()
        {
            $this->db->query('SELECT * FROM badges');
            $result = $this->db->resultSet();
            return $result;
        }

        public function addBadge($data)
    {
        $this->db->query('INSERT INTO badges (user_id, reward_id, act_joined) VALUES (:user_id, :reward_id, :act_joined)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':reward_id', $data['reward_id']);
        $this->db->bind(':act_joined', $data['act_joined']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

        public function findBadgeById($reward_id)
        {
            $this->db->query('SELECT * FROM badges WHERE reward_id = :reward_id' );
            $this->db->bind(':reward_id', $reward_id);
            $row = $this->db->single();
            return $row;
        }

}

?>