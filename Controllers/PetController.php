<?php

    namespace Controllers;

    use DAO\OwnerDAO as OwnerDAO; 
    use DAO\PetDAO as PetDAO;
    use Models\Pet as Pet;
    use Controller\OwnerController as OwnerController;
    

    class PetController {
        private $ownerDAO;
        private $petDAO;
        private $ownerController;

        public function __construct() {
            $this->ownerDAO = new OwnerDAO();
            $this->petDAO = new PetDAO();
            $this->userLogged = $_SESSION["loggedUser"];
            $this->ownerController = new OwnerController();
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-pet.php");
        }

        public function ShowListView() {
            require_once(VIEWS_PATH . "validate-session.php");
            $petList = $this->petDAO->GetAll();
            require_once(VIEWS_PATH . "owner-view.php");
        }

        public function ShowModifyView($idPet) {
            require_once(VIEWS_PATH . "validate-session.php");
            $pet = $this->petDAO->GetById($idPet);
            require_once(VIEWS_PATH . "modify-pet.php");
        }

        public function Add($namePet, $photo, $race,$size, $vaccines, $observation, $video, $owner) {
            require_once(VIEWS_PATH . "validate-session.php");

            $pet = new Pet();

            $owner = $this->ownerDAO->GetById($this->userLogged->getId());
            $pet->setAnimal($animal);
            $pet->setNamePet($namePet);
            $pet->setPhoto($photo);
            $pet->setRace($race);
            $pet->setSize($size);
            $pet->setVaccines($vaccines);
            $pet->setObservation($observation);
            $pet->setVideo($video);
            $pet->setOwner($owner);
                   
                $this->petDAO->Add($pet);
                $this->ownerController->ShowView();
            
        }

        public function Remove($idpet) {
            require_once(VIEWS_PATH . "validate-session.php");
            
            $this->petDAO->Remove(intval($idpet));
            $this->ShowListView();
        }

        public function Modify($namepet, $photo, $race,$size, $vaccines, $observation, $video) {
            require_once(VIEWS_PATH . "validate-session.php");

            $pet = new pet();

            $pet->setNamepet($namepet);
            $pet->setPhoto($photo);
            $pet->setRace($race);
            $pet->setSize($size);
            $pet->setVaccines($vaccines);
            $pet->setObservation($observation);
            $pet->setVideo($video);
        }
    }
?>