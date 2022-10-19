<?php

    namespace Controllers;

    use DAO\DogDAO;
    use Models\Dog;
    

    class DogController {
        private $dogDAO;

        public function __construct() {
            $this->dogDAO = new DogDAO();
        }

        public function ShowAddView($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-dog.php");
        }

        public function ShowListView() {
            require_once(VIEWS_PATH . "validate-session.php");
            $dogList = $this->dogDAO->GetAll();
            require_once(VIEWS_PATH . "dog-list.php");
        }

        public function ShowModifyView($idDog) {
            require_once(VIEWS_PATH . "validate-session.php");
            $dog = $this->dogDAO->GetById($idDog);
            require_once(VIEWS_PATH . "modify-dog.php");
        }

        public function Add($nameDog, $photo, $race,$size, $vaccines, $observation, $video, $owner) {
            require_once(VIEWS_PATH . "validate-session.php");

            $dog = new dog();

            $dog->setNameDog($nameDog);
            $dog->setPhoto($photo);
            $dog->setRace($race);
            $dog->setSize($size);
            $dog->setVaccines($vaccines);
            $dog->setObservation($observation);
            $dog->setVideo($video);
            $dog->setOwner($owner);
                   
                $this->dogDAO->Add($dog);
                $this->OwnerDAO->Add($Owner.dog);
                $this->ShowListView();
            
        }

        public function Remove($idDog) {
            require_once(VIEWS_PATH . "validate-session.php");

            $this->dogDAO->Remove(intval($idDog));

            $this->ShowListView();
        }

        public function Modify($idDog, $nameDog, $photo, $race,$size, $vaccines, $observation, $video) {
            require_once(VIEWS_PATH . "validate-session.php");

            $dog = new dog();

            $dog->setIdDog($idDog);
            $dog->setNameDog($nameDog);
            $dog->setPhoto($photo);
            $dog->setRace($race);
            $dog->setSize($size);
            $dog->setVaccines($vaccines);
            $dog->setObservation($observation);
            $dog->setVideo($video);
        }
    }
?>