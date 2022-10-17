<?php
namespace Controllers;//logica de negocio

use DAO\KeeperDAO;
use DAO\OwnerDAO;

    class HomeController
    {
        private $keeperDAO;
        private $ownerDAO;

        public function __construct() {
            $this->keeperDAO = new KeeperDAO();
            $this->ownerDAO = new OwnerDAO();
        }

        public function Index($message = "") {
            require_once(VIEWS_PATH . "home.php");
        }

        public function ShowAddViewO() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-keeper.php");
        }

        public function ShowAddViewK() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-owner.php");
        }

        public function Login($email, $password) {
            $keeper = $this->keeperDAO->GetByEmail($email);
            $owner = $this->ownerDAO->GetByEmail($email);

            if(($keeper != null) && ($keeper->getPassKeeper() === $password)) {
                $_SESSION["loggedUser"] = $keeper;
                $this->ShowAddViewK();
            } else if(($owner != null) && ($owner->getPassOwner() === $password)) {
                $_SESSION["loggedUser"] = $owner;
                $this->ShowAddViewO();
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