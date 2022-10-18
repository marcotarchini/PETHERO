<?php
namespace Models;

    class Owner extends User {

        private $idOwner;
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

    }

    ?>