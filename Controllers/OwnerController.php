<?php

    namespace Controllers;

    use Controllers\PetController as PetController;
    use DAO\OwnerDAO as OwnerDAO;
    use Models\Owner as Owner;
    use DAO\PetDAO as PetDAO;
    use DAO\UserDAO as UserDAO;
   
   

    class OwnerController {
        private $ownerDAO;
        private $petDAO;
        private $userLogged;
        private $petController;

        public function __construct() {
            $this->ownerDAO = new OwnerDAO();
            $this->petDAO = new PetDAO();
            $this->userLogged = $_SESSION["loggedUser"];
            $this->petController = new PetController();
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-owner.php");
        }

        public function ShowView() {
            require_once(VIEWS_PATH . "validate-session.php");
            $ownerList = $this->ownerDAO->GetAll();
            require_once(VIEWS_PATH . "owner-view.php");
            $petList = $this->petDAO->GetAll();
        }

        public function ShowModifyView($idOwner) {
            require_once(VIEWS_PATH . "validate-session.php");
            $owner = $this->ownerDAO->GetById($idOwner);
            require_once(VIEWS_PATH . "modify-owner.php");
        }

        public function Add($nameOwner, $lNameOwner, $dni, $email, $address, $cellphone, $service, $ownerUser) {
            require_once(VIEWS_PATH . "validate-session.php");

            $owner = new Owner();

            $ownerUser = $this->userDAO->GetByUser($this->userLogged->getUserName());
            $owner->setNameOwner($nameOwner);
            $owner->setLNameOwner($lNameOwner);
            $owner->setDni($dni);
            $owner->setEmail($email);
            $owner->setAddress($address);
            $owner->setCellphone($cellphone);
            $owner->setPet($pet);
            $owner->setService($service);
            $owner->setOwnerUser($ownerUser);
       
                $this->ownerDAO->Add($owner);
                $this->petController->ShowAddView();
            
        }

        public function Remove($idOwner) {
            require_once(VIEWS_PATH . "validate-session.php");

            $this->ownerDAO->Remove(intval($idOwner));

            $this->ShowListView();
        }

        public function Modify($nameOwner, $lNameOwner, $dni, $email, $address, $cellphone, $pet, $service) {
            require_once(VIEWS_PATH . "validate-session.php");

            $owner = new Owner();

            $owner->setNameOwner($nameOwner);
            $owner->setLNameOwner($lNameOwner);
            $owner->setDni($dni);
            $owner->setEmail($email);
            $owner->setAddress($address);
            $owner->setCellphone($cellphone);
            $owner->setpet($pet);
            $owner->setService($service);

            $this->ownerDAO->Modify($owner);

            $this->ShowAddView();
           
        }
    }
?>