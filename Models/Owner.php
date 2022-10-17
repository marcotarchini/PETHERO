<?php
namespace Models;

    class Owner extends Person {

        private $idOwner;
        private $passOwner;
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

        public function getPassOwner()
        {
                return $this->passOwner;
        }

        public function setPassOwner($passOwner)
        {
                $this->passOwner = $passOwner;

                return $this;
        }
    }

    ?>