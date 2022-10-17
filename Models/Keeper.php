<?php
namespace Models;

    class Keeper extends Person {

        private $idKeeper;
        private $passKeeper;
        private $dogType;
        private $priceXDay;
        private $score;

      
        public function getIdKeeper()
        {
                return $this->idKeeper;
        }

     
        public function setIdKeeper($idKeeper)
        {
                $this->idKeeper = $idKeeper;

                return $this;
        }

      
        public function getDogType()
        {
                return $this->dogType;
        }

   
        public function setDogType($dogType)
        {
                $this->dogType = $dogType;

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

       
        public function getPassKeeper()
        {
                return $this->passKeeper;
        }

        
        public function setPassKeeper($passKeeper)
        {
                $this->passKeeper = $passKeeper;

                return $this;
        }
    }

?>