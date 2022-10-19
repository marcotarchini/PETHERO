<?php

    namespace Controllers;

    use DAO\OwnerDAO as OwnerDAO;
    use Models\Owner as Owner;
    use DAO\DogDAO as DogDAO;
    use Models\Dog as Dog;
   

    class OwnerController {
        private $ownerDAO;
        private $dogDAO;

        public function __construct() {
            $this->ownerDAO = new OwnerDAO();
            $this->dogDAO = new DogDAO();
        }

        public function ShowAddView($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-owner.php");
        }

        public function ShowListView() {
            require_once(VIEWS_PATH . "validate-session.php");
            $ownerList = $this->ownerDAO->GetAll();
            require_once(VIEWS_PATH . "owner-list.php");
        }

        public function ShowModifyView($email) {
            require_once(VIEWS_PATH . "validate-session.php");
            $owner = $this->ownerDAO->GetByEmail($email);
            require_once(VIEWS_PATH . "modify-owner.php");
        }

        public function Add($nameUser, $lastnameUser, $dni,$email, $address, $cellphone, $dog, $service, $passOwner) {
            require_once(VIEWS_PATH . "validate-session.php");

            $owner = new owner();

            $owner->setNameUser($nameUser);
            $owner->setLastnameUser($lastnameUser);
            $owner->setDni($dni);
            $owner->setEmail($email);
            $owner->setAddress($address);
            $owner->setCellphone($cellphone);
            $owner->setService($service);
            $owner->setPassOwner($passOwner);
       
                $this->ownerDAO->Add($owner);
                $this->ShowListView();
            
        }

        public function Remove($idOwner) {
            require_once(VIEWS_PATH . "validate-session.php");

            $this->ownerDAO->Remove(intval($idOwner));

            $this->ShowListView();
        }

        public function Modify($idOwner, $nameUser, $lastnameUser, $dni,$email, $address, $cellphone, $dog, $service, $passOwner) {
            require_once(VIEWS_PATH . "validate-session.php");

            $owner = new owner();

            $owner->setIdOwner($idOwner);
            $owner->setNameUser($nameUser);
            $owner->setLastnameUser($lastnameUser);
            $owner->setDni($dni);
            $owner->setEmail($email);
            $owner->setAddress($address);
            $owner->setCellphone($cellphone);
            $owner->setDog($dog);
            $owner->setService($service);
            $owner->setPassOwner($passOwner);
        }
    }
?>