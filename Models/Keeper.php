<?php
namespace Models;

    class Keeper {

        private $idKeeper;
        private $nameKeeper;
        private $lNameKeeper;
        private $dni;
        private $email;
        private $address;
        private $cellphone;
        private $petSize;
        private $priceXDay;
        private $score;
        private $keeperUser;

      
        public function getIdKeeper()
        {
                return $this->idKeeper;
        }
   
        public function setIdKeeper($idKeeper)
        {
                $this->idKeeper = $idKeeper;

                return $this;
        }
          
        public function getPriceXDay()
        {
                return $this->priceXDay;
        }
 
        public function setPriceXDay($priceXDay)
        {
                $this->priceXDay = $priceXDay;

                return $this;
        }
      
        public function getScore()
        {
                return $this->score;
        }
    
        public function setScore($score)
        {
                $this->score = $score;

                return $this;
        }

        public function getNameKeeper()
        {
                return $this->nameKeeper;
        }

        public function setNameKeeper($nameKeeper)
        {
                $this->nameKeeper = $nameKeeper;

                return $this;
        }

        public function getLNameKeeper()
        {
                return $this->lNameKeeper;
        }

        public function setLNameKeeper($lNameKeeper)
        {
                $this->lNameKeeper = $lNameKeeper;

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
 
        public function getKeeperUser()
        {
                return $this->keeperUser;
        }

        public function setKeeperUser($keeperUser)
        {
                $this->keeperUser = $keeperUser;

                return $this;
        }

        public function getPetSize()
        {
                return $this->petSize;
        }

        public function setPetSize($petSize)
        {
                $this->petSize = $petSize;

                return $this;
        }
    }

?>