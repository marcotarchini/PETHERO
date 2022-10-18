<?php
namespace Models;

    abstract class User {

        private $nameUser;
        private $lastnameUser;
        private $dni;
        private $email;
        private $address;
        private $cellphone;
        private $password;

    
        public function getNameUser()
        {
                return $this->nameUser;
        }

     
        public function setNameUser($nameUser)
        {
                $this->nameUser = $nameUser;

                return $this;
        }

     
        public function getLastnameUser()
        {
                return $this->lastnameUser;
        }

       
        public function setLastnameUser($lastnameUser)
        {
                $this->lastnameUser = $lastnameUser;

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

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
    }

    ?>