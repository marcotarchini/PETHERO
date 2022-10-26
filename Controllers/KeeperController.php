<?php

    namespace Controllers;

    use DAO\KeeperDAO as KeeperDAO;
    use Models\Keeper as Keeper;
    use DAO\UserDAO as UserDAO;
   

    class KeeperController {
        private $keeperDAO;
        private $userLogged;
        private $userDAO;

        public function __construct() {
            $this->keeperDAO = new KeeperDAO();
            $this->userLogged = $_SESSION["loggedUser"];
            $this->userDAO = new UserDAO();
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-keeper.php");
        }

        public function ShowListView() {
            require_once(VIEWS_PATH . "validate-session.php");
            $keeperList = $this->keeperDAO->GetAll();
            require_once(VIEWS_PATH . "keeper-list.php");
        }

        public function ShowModifyView($idKeeper) {
            require_once(VIEWS_PATH . "validate-session.php");
            $keeper = $this->keeperDAO->GetById($idKeeper);
            require_once(VIEWS_PATH . "modify-keeper.php");
        }

        public function Add($nameKeeper, $lNameKeeper, $dni, $email, $address, $cellphone, $petSize, $priceXDay, $score) {
            require_once(VIEWS_PATH . "validate-session.php");

            $keeper = new Keeper();

            $keeperUser = $this->userDAO->GetByUser($this->userLogged->getUserName());
            $keeper->setNameKeeper($nameKeeper);
            $keeper->setLNameKeeper($lNameKeeper);
            $keeper->setDni($dni);
            $keeper->setEmail($email);
            $keeper->setAddress($address);
            $keeper->setCellphone($cellphone);
            $keeper->setPetSize($petSize);
            $keeper->setPriceXDay($priceXDay);
            $keeper->setScore($score);
            $keeper->setKeeperUser($keeperUser);
                       
            $this->keeperDAO->Add($keeper);

            $this->ShowListView();
        }

        public function Remove($idKeeper) {
            require_once(VIEWS_PATH . "validate-session.php");
            
            $this->keeperDAO->Remove($idKeeper);

            $this->ShowListView();
        }

        public function Modify($nameKeeper, $lNameKeeper, $dni, $email, $address, $cellphone, $petSize, $priceXDay, $score) {

            $keeper = new Keeper();

            $keeper->setNameKeeper($nameKeeper);
            $keeper->setLNameKeeper($lNameKeeper);
            $keeper->setDni($dni);
            $keeper->setEmail($email);
            $keeper->setAddress($address);
            $keeper->setCellphone($cellphone);
            $keeper->setPetSize($petSize);
            $keeper->setPriceXDay($priceXDay);
            $keeper->setScore($score);
        
            $this->keeperDAO->Modify($keeper);

            $this->ShowListView();
        }
    }
?>