<?php
namespace Controllers;//logica de negocio

use Controllers\UserController as UserController;

    class HomeController
    {
        private $userController;
      

        public function __construct() {
           $this->userController = new UserController();
           
        }

        public function Index($message = "") {
            require_once(VIEWS_PATH . "home.php");
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-user.php");
        }

        public function Login($email, $password) {
            $user = $this->userController->GetByEmail($email);
           
            if(($keeper != null) && ($user->getPassword() === $password)) {
                $_SESSION["loggedUser"] = $user;
                $this->ShowAddView();
            } else {
                $this->Index("Email y/o contraseña incorrecta");
            }
        }

        public function Logout() {
            session_destroy();
            $this->Index();
        }
    }
?>