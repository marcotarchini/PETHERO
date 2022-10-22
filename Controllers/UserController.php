<?php

    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    

    class userController {
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

        public function ShowModifyView($email) {
            require_once(VIEWS_PATH . "validate-session.php");
            $user = $this->userDAO->GetByEmail($email);
            require_once(VIEWS_PATH . "modify-user.php");
        }

        public function Remove($email) {
            require_once(VIEWS_PATH . "validate-session.php");
            $this->userController->Remove(intval($email));
            $this->ShowAddView();
        }

        public function Add($nameUser, $lastnameUser, $dni, $email, $address, $cellphone, $password) {
            require_once(VIEWS_PATH . "validate-session.php");

            $user = new User();

            $user->setNameUser($nameUser);
            $user->setLastnameUser($lastnameUser);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setAddress($address);
            $user->setCellphone($cellphone);
            $user->setPassword($password);

            $this->userController->Add($user);
            $this->ShowView();
        }

        public function Modify($nameUser, $lastnameUser, $dni, $email, $address, $cellphone, $password) {
            require_once(VIEWS_PATH . "validate-session.php");

            $user = new User();

            $user->setNameUser($nameUser);
            $user->setLastnameUser($lastnameUser);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setAddress($address);
            $user->setCellphone($cellphone);
            $user->setPassword($password);

            $this->userController->Modify($user);
            $this->ShowView();
        }
    }
    
?>