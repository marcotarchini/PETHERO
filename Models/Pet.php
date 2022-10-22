<?php
namespace Models;

    class Pet {

        private $idPet; 
        private $animal;
        private $namePet;
        private $photo;
        private $race;
        private $size;
        private $vaccines;
        private $observation;
        private $video;
        private $owner;

        public function getIdPet()
        {
                return $this->idPet;
        }

    
        public function setIdPet($idPet)
        {
                $this->idPet = $idPet;

                return $this;
        }

    
        public function getPhoto()
        {
                return $this->photo;
        }

   
        public function setPhoto($photo)
        {
                $this->photo = $photo;

                return $this;
        }

     
        public function getRace()
        {
                return $this->race;
        }

   
        public function setRace($race)
        {
                $this->race = $race;

                return $this;
        }

   
        public function getSize()
        {
                return $this->size;
        }


        public function setSize($size)
        {
                $this->size = $size;

                return $this;
        }

     
        public function getVaccines()
        {
                return $this->vaccines;
        }

  
        public function setVaccines($vaccines)
        {
                $this->vaccines = $vaccines;

                return $this;
        }

    
        public function getObservation()
        {
                return $this->observation;
        }

   
        public function setObservation($observation)
        {
                $this->observation = $observation;

                return $this;
        }

   
        public function getVideo()
        {
                return $this->video;
        }

  
        public function setVideo($video)
        {
                $this->video = $video;

                return $this;
        }

      
        public function getNamepet()
        {
                return $this->namepet;
        }

       
        public function setNamepet($namepet)
        {
                $this->namepet = $namepet;

                return $this;
        }

  
        public function getOwner()
        {
                return $this->owner;
        }

        public function setOwner($owner)
        {
                $this->owner = $owner;

                return $this;
        }
    }

    ?>