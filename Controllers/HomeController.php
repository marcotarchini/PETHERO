<?php
namespace Controllers;//logica de negocio

use Controllers\UserController as UserController;
use DAO\UserDAO;


    class HomeController
    {
        private $userController;
      

        public function __construct() {
           $this->userController = new UserDAO();   
        }

        public function Index($message = "") {
            require_once(VIEWS_PATH . "home.php");
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-user.php");
        }

        public function Login($email, $password) {

            if($email !=null){
                $user = $this->userController->GetByEmail($email);
            
                if(($user != null) && ($user->getPassword() === $password)) {
                    $_SESSION["loggedUser"] = $user;
                    $this->ShowAddView();
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