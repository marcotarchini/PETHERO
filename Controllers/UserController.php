<?php

    namespace Controllers;

    use DAO\UserDAO;
    use Models\User;

    class userController {
        private $userController;

        public function __construct() {
            $this->userController = new UserDAO();
            
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-user.php");
        }
    }
?>