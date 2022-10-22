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

            $user= new UserController();

            if(($email !=null) ){

                var_dump($this->$user->UserDAO->GetByEmail($email));

                $userFromDAO = $this->$user->UserDAO->GetByEmail($email);
                if(($userFromDAO != null) && ($userFromDAO->getPassword() === $password)) {
                    $_SESSION["loggedUser"] = $user;
                    $this->ShowView();
                } else {
                    $this->Index("Email y/o contraseña incorrecta");
                }
            }else{
                $this->Index("Error de mail");
            }
        }

        public function Logout() {
            session_destroy();
            $this->Index();
        }
    }
?>