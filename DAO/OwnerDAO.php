<?php

    namespace DAO;

    use Models\Owner;

    class OwnerDAO implements IOwnerDAO {
        private $fileName = ROOT . "/Data/Owner.json";
        private $ownerList = array();

        public function Add($owner) {
            $this->RetrieveData();

            $owner->setIdOwner($this->GetNextId());

            array_push($this->ownerList, $owner);

            $this->SaveData();
        }

        private function GetNextId() {
            $idOwner = 0;

            foreach($this->ownerList as $owner) {
                $idOwner = ($owner->getIdOwner() > $idOwner) ? $owner->getIdOwner() : $idOwner;
            }

            return $idOwner + 1;
        }

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

            array_push($this->OwnerList, $owner);

            $this->SaveData();
        }

        public function GetAll() {
            $this->RetrieveData();
            return $this->ownerList;
        }

        public function GetByEmail($email) {
            $this->RetrieveData();

            $owner = null;

            $aux = array_filter($this->ownerList, function($owner) use ($email) {
                return $owner->getEmail() === $email;
            });

            return (count($aux) > 0) ? $aux[0] : null;
        }

        private function SaveData() {
            $arrayEncode = array();

            foreach($this->ownerList as $owner) {
                $value["idOwner"] = $owner->getIdOwner();
                $value["passOwner"] = $owner->getPassOwner();
                $value["namePerson"] = $owner->getNamePerson();
                $value["lastnamePerson"] = $owner->getLastnamePerson();
                $value["dni"] = $owner->getDni();
                $value["email"] = $owner->getEmail();
                $value["address"] = $owner->getAddress();
                $value["owner"] = $owner->getowner();
                $value["dog"] = $owner->getDog();
                $value["service"] = $owner->getService();

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
                    $owner->setPassOwner($value["passOwner"]);
                    $owner->setNamePerson($value["namePerson"]);
                    $owner->setLastnamePerson()($value["lastnamePerson"]);
                    $owner->setDni($value["dni"]);
                    $owner->setEmail($value["email"]);
                    $owner->setAddress($value["address"]);
                    $owner->setowner($value["owner"]);
                    $owner->setDog($value["dog"]);
                    $owner->setService($value["service"]);
                    
                    array_push($this->ownerList, $owner);
                }
            }
        }
    }
?>