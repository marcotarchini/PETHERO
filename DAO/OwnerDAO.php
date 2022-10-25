<?php

    namespace DAO;

    use DAO\IOwnerDAO as IOwnerDAO;
    use Models\Owner as Owner;

    class OwnerDAO implements IOwnerDAO {

        private $fileName = ROOT . "/Data/owner.json";
        private $ownerList = array();
        private $userLogged;

        public function __construct()
        {
            $this->userLogged = $_SESSION["loggedUser"];
        }

        public function Add($owner) {
            $this->RetrieveData();

            $owner->setIdOwner($this->$userLogged->getId());

            array_push($this->ownerList, $owner);

            $this->SaveData();
        }

        /*private function GetNextId() {
            $idOwner = 0;

            foreach($this->ownerList as $owner) {
                $idOwner = ($owner->getIdOwner() > $idOwner) ? $owner->getIdOwner() : $idOwner;
            }

            return $idOwner + 1;
        }*/

        public function Remove($idOwner) {
            $this->RetrieveData();

            $this->ownerList = array_filter($this->ownerList, function($owner) use($idOwner) {
                return $owner->getIdOwner() != $idOwner;
            });

            $this->SaveData();
        }

        public function Modify($owner) {
            $this->RetrieveData();

            $this->Remove($owner->getIdOwner());

            array_push($this->ownerList, $owner);

            $this->SaveData();
        }

        public function GetAll() {
            $this->RetrieveData();
            return $this->ownerList;
        }

        public function GetById($idOwner) {
            $this->RetrieveData();

            $owner = null;

            $aux = array_filter($this->ownerList, function($owner) use ($idOwner) {
                return $owner->getIdOwner() === $idOwner;
            });

            $aux= array_values($aux);

            return (count($aux) > 0) ? $aux[0] : null;
        }

        private function SaveData() {
            $arrayEncode = array();

            foreach($this->ownerList as $owner) {
                $value["idOwner"] = $owner->getIdOwner();
                $value["nameOwner"] = $owner->getNameOwner();
                $value["lNameOwner"] = $owner->getLNameOwner();
                $value["dni"] = $owner->getDni();
                $value["email"] = $owner->getEmail();
                $value["address"] = $owner->getAddress();
                $value["cellphone"] = $owner->getCellphone();      
                $value["pet"] = $owner->getPet();
                $value["service"] = $owner->getService();
                $value["ownerUser"] = $owner->getOwnerUser();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData() {
            $this->ownerList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value) {
                    $owner = new Owner();

                    $owner->setIdOwner($value["idOwner"]);
                    $owner->setNameOwner($value["nameOwner"]);
                    $owner->setLNameOwner($value["lNameOwner"]);
                    $owner->setDni($value["dni"]);
                    $owner->setEmail($value["email"]);
                    $owner->setAddress($value["address"]);
                    $owner->setCellphone($value["cellphone"]);
                    $owner->setPet($value["pet"]);
                    $owner->setService($value["service"]);
                    $owner->setOwnerUser($value["ownerUser"]);
                    
                    array_push($this->ownerList, $owner);
                }
            }
        }
    }
?>