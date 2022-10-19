<?php
namespace Models;

    class Cat {

        private $idCat
        private $nameCat;
        private $photo;
        private $race;
        private $size;
        private $vaccines;
        private $observation;
        private $video;

        public function getIdCat()
        {
                return $this->idCat;
        }

        public function setIdCat($idCat)
        {
                $this->idCat = $idCat;

                return $this;
        }

        public function getNameCat()
        {
                return $this->nameCat;
        }

        public function setNameCat($nameCat)
        {
                $this->nameCat = $nameCat;

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
    }
?>