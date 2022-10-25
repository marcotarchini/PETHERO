<?php
namespace Controllers;//logica de negocio

use Controllers\UserController as UserController;
use DAO\UserDAO as UserDAO;


    class HomeController    {
        private $userController;
      

        public function __construct() {
           $this->userController = new UserController();   
        }

        public function Index($message = "") {
            require_once(VIEWS_PATH . "home.php");
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "add-user.php");
        }

        public function ShowView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "user-view.php");
        }

        public function Login($userName, $password) {

            //$user= new UserController();
            $user = new UserDAO();

            if(($userName !=null) ){

                $aux = $user->GetByUser($userName);
                if(($aux != null) && ($aux->getPassword() === $password)) {
                    $_SESSION["loggedUser"] = $aux;
                    $this->ShowView();
                } else {
                    $this->ShowAddView();
                }
            }else{
                $this->Index("Error de usuario");
            }
        }

        public function Logout() {
            session_destroy();
            $this->Index();
        }
    }
?>