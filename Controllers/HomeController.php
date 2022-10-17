<?php
namespace Controllers;//logica de negocio

use DAO\KeeperDAO;
use DAO\OwnerDAO;

    class HomeController
    {
        private $keeperDAO;
        private $ownerDAO;

        public function __construct() {
            $this->keeperDAO = new keeperDAO();
            $this->ownerDAO = new ownerDAO();
        }

        public function Index($message = "") {
            require_once(VIEWS_PATH . "home.php");
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-keeper.php");
            require_once(VIEWS_PATH . "add-owner.php");
        }

        public function Login($email, $password) {
            $keeper = $this->keeperDAO->GetByEmail($email);
            $owner = $this->ownerDAO->GetByEmail($email);

            if(($keeper != null) && ($keeper->getPassKeeper() === $passKeeper)) {
                $_SESSION["loggedUser"] = $keeper;
                $this->ShowAddView();
            } else {
                $this->Index("Email y/o contraseña incorrecta");
            }
            if(($owner != null) && ($owner->getPassOwner() === $passOwner)) {
                $_SESSION["loggedUser"] = $owner;
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