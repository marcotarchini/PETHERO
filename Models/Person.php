<?php
namespace Models;

    abstract class Person {

        private $namePerson;
        private $lastnamePerson;
        private $dni;
        private $email;
        private $address;
        private $cellphone;

    
        public function getNamePerson()
        {
                return $this->namePerson;
        }

     
        public function setNamePerson($namePerson)
        {
                $this->namePerson = $namePerson;

                return $this;
        }

     
        public function getLastnamePerson()
        {
                return $this->lastnamePerson;
        }

       
        public function setLastnamePerson($lastnamePerson)
        {
                $this->lastnamePerson = $lastnamePerson;

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

    }

    ?>