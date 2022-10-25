<?php

    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    

    class UserController {
        private $userController;

        public function __construct() {
            $this->userController = new UserDAO();      
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-user.php");
        }

        public function ShowView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "user-view.php");
        }

        public function ShowModifyView($userName) {
            require_once(VIEWS_PATH . "validate-session.php");
            $user = $this->userDAO->GetByUser($userName);
            require_once(VIEWS_PATH . "modify-user.php");
        }

        public function Remove($id) {
            require_once(VIEWS_PATH . "validate-session.php");
            $this->userController->Remove(intval($id));
            $this->ShowView();
        }

        public function Add($userName, $password) {
            require_once(VIEWS_PATH . "validate-session.php");

            $user = new User();

            $user->setNameUser($userName);
            $user->setPassword($password);

            $this->userController->Add($user);
            $this->ShowView();
        }

        public function Modify($userName, $password) {
            require_once(VIEWS_PATH . "validate-session.php");

            $user = new User();

            $user->setUserName($userName);
            $user->setPassword($password);

            $this->userController->Modify($user);
            $this->ShowView();
        }
    }
    
?>