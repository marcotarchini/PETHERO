<?php
namespace Models;

    class User {

        private $id;
        private $userName;
        private $password;

     
        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        public function getUserName()
        {
                return $this->userName;
        }

        public function setUserName($userName)
        {
                $this->userName = $userName;

                return $this;
        }

        public function getId()
        {
                return $this->id;
        }


        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }

?>