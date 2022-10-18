<?php

    namespace Controllers;

    use DAO\KeeperDAO;
    use Models\Keeper;

    class keeperController {
        private $keeperDAO;

        public function __construct() {
            $this->keeperDAO = new KeeperDAO();
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

        public function ShowModifyView($email) {
            require_once(VIEWS_PATH . "validate-session.php");
            $keeper = $this->keeperDAO->GetByEmail($email);
            require_once(VIEWS_PATH . "modify-keeper.php");
        }

        public function Add($namePerson, $lastnamePerson, $dni,$email, $address, $cellphone, $dogType, $priceXDay, $score, $passKeeper) {
            require_once(VIEWS_PATH . "validate-session.php");

            $keeper = new keeper();
            $keeper->setNamePerson($namePerson);
            $keeper->setLastnamePerson($lastnamePerson);
            $keeper->setDni($dni);
            $keeper->setEmail($email);
            $keeper->setAddress($address);
            $keeper->setCellphone($cellphone);
            $keeper->setDogType($dogType);
            $keeper->setPriceXDay($priceXDay);
            $keeper->setScore($score);
            $keeper->setPassKeeper($passKeeper);
                       
            $this->keeperDAO->Add($keeper);

            $this->ShowListView();
        }

        public function Remove($idKeeper) {
            require_once(VIEWS_PATH . "validate-session.php");
            
            $this->keeperDAO->Remove($idKeeper);

            $this->ShowListView();
        }

        public function Modify($idKeeper, $namePerson, $lastnamePerson, $dni,$email, $address, $cellphone, $dogType, $priceXDay, $score, $passKeeper) {

            $keeper = new keeper();

            $keeper->setId(intval($idKeeper));
            $keeper->setNamePerson($namePerson);
            $keeper->setLastnamePerson($lastnamePerson);
            $keeper->setDni($dni);
            $keeper->setEmail($email);
            $keeper->setAddress($address);
            $keeper->setCellphone($cellphone);
            $keeper->setDogType($dogType);
            $keeper->setPriceXDay($priceXDay);
            $keeper->setScore($score);
            $keeper->setPassKeeper($passKeeper);

            $this->keeperDAO->Modify($keeper);

            $this->ShowListView();
        }
    }
?>