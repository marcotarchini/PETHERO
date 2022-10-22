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

        public function ShowModifyView($idOwner) {
            require_once(VIEWS_PATH . "validate-session.php");
            $owner = $this->ownerDAO->GetById($idOwner);
            require_once(VIEWS_PATH . "modify-owner.php");
        }

        public function Add($idOwner, $dog, $service) {
            require_once(VIEWS_PATH . "validate-session.php");

            $owner = new Owner();

            $owner->setUserOwner($userOwner);
            $owner->setIdOwner($idOwner);
            $owner->setDog($dog);
            $owner->setService($service);
       
                $this->ownerDAO->Add($owner);
                $this->ShowListView();
            
        }

        public function Remove($idOwner) {
            require_once(VIEWS_PATH . "validate-session.php");

            $this->ownerDAO->Remove(intval($idOwner));

            $this->ShowListView();
        }

        public function Modify($idOwner, $dog, $service) {
            require_once(VIEWS_PATH . "validate-session.php");

            $owner = new Owner();

            $owner->setUserOwner($userOwner);
            $owner->setIdOwner($idOwner);
            $owner->setDog($dog);
            $owner->setService($service);

            $this->ownerDAO->Modify($owner);

            $this->ShowListView();
           
        }
    }
?>