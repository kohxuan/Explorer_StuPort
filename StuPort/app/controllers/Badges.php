<?php 

class Badges extends Controller{
    private $badgeModel;

    public function __construct()
    {
        $this->badgeModel = $this->model('Badge');
    }
    
    public function index()
    {
        $badges = $this->badgeModel->findAllBadges();

        $data = [
            'badges' => $badges
        ];

        $this->view('badges/index', $data);
    }

    public function create()
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/badges");
        }

        $data = [
            'user_id' => $_SESSION['user_id'],
            'reward_id' => '',
            'act_joined' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'reward_id' => trim($_POST['reward_id']),
                'act_joined' => trim($_POST['act_joined'])
            ];

            if ($this->badgeModel->addBadge($data)) {
                header("Location: " . URLROOT . "/badges");
            } else {
                die("Something went wrong, please try again!");
            }
        }

        $this->view('badges/view', $data);
    }

    public function show($id)
    {
        $badge = $this->badgeModel->findBadgeById($id);

        $data = [
            'badge' => $badge
        ];

        $this->view('badges/view', $data);
    }
}

?>