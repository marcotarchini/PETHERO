<?php
namespace Models;

    class Owner {

        private $idOwner;
        private $nameOwner;
        private $lNameOwner;
        private $dni;
        private $email;
        private $address;
        private $cellphone;
        private $pet;
        private $service;
        private $ownerUser;


        public function getIdOwner()
        {
                return $this->idOwner;
        }
   
        public function setIdOwner($idOwner)
        {
                $this->idOwner = $idOwner;

                return $this;
        }

        public function getNameOwner()
        {
                return $this->nameOwner;
        }

        public function setNameOwner($nameOwner)
        {
                $this->nameOwner = $nameOwner;

                return $this;
        }

        public function getLNameOwner()
        {
                return $this->lNameOwner;
        }

        public function setLNameOwner($lNameOwner)
        {
                $this->lNameOwner = $lNameOwner;

                return $this;
        }

        public function getDni()
        {
                return $this->dni;
        }

        public function setDni($dni)
        {
                $this->dni = $dni;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getAddress()
        {
                return $this->address;
        }

        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
        }

        public function getCellphone()
        {
                return $this->cellphone;
        }

        public function setCellphone($cellphone)
        {
                $this->cellphone = $cellphone;

                return $this;
        }


        public function getPet()
        {
                return $this->pet;
        }

        public function setPet($pet)
        {
                $this->pet = $pet;

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

        public function getOwnerUser()
        {
                return $this->ownerUser;
        }

        public function setOwnerUser($ownerUser)
        {
                $this->ownerUser = $ownerUser;

                return $this;
        }
    }

    ?>