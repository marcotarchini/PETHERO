<?php
namespace Models;

    class Dog {

        private $idDog
        private $nameDog;
        private $photo;
        private $race;
        private $size;
        private $vaccines;
        private $observation;
        private $video;


        public function getIdDog()
        {
                return $this->idDog;
        }

    
        public function setIdDog($idDog)
        {
                $this->idDog = $idDog;

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

      
        public function getNameDog()
        {
                return $this->nameDog;
        }

       
        public function setNameDog($nameDog)
        {
                $this->nameDog = $nameDog;

                return $this;
        }
    }

    ?>