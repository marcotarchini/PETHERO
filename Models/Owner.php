<?php
namespace Models;

    class Owner {

        private $idOwner;
        private $userOwner;
        private $dog;
        private $service;


        public function getDog()
        {
                return $this->dog;
        }

    
        public function setDog($dog)
        {
                $this->dog = $dog;

                return $this;
        }

    
        public function getService()
        {
                return $this->service;
        }

     
        public function setService($service)
        {
                $this->service = $service;

                return $this;
        }

        public function getIdOwner()
        {
                return $this->idOwner;
        }
   
        public function setIdOwner($idOwner)
        {
                $this->idOwner = $idOwner;

                return $this;
        }

        public function getUserOwner()
        {
                return $this->userOwner;
        }

        public function setUserOwner($userOwner)
        {
                $this->userOwner = $userOwner;

                return $this;
        }
    }

    ?>