<?php

    namespace DAO;

    use DAO\IKeeperDAO as IKeeperDAO;
    use Models\Keeper as Keeper;

    class KeeperDAO implements IKeeperDAO {
        
        private $fileName = ROOT . "/Data/keeper.json";
        private $keeperList = array();

        public function Add($keeper) {
            $this->RetrieveData();

            $keeper->setIdKeeper($this->GetNextId());

            array_push($this->keeperList, $keeper);

            $this->SaveData();
        }
        
        private function GetNextId() {
            $idKeeper = 0;

            foreach($this->keeperList as $keeper) {
                $idKeeper = ($keeper->getIdKeeper() > $idKeeper) ? $keeper->getIdKeeper() : $idKeeper;
            }

            return $idKeeper + 1;
        }

        public function Remove($idKeeper) {
            $this->RetrieveData();

            $this->keeperList = array_filter($this->keeperList, function($keeper) use($idKeeper) {
                return $keeper->getIdKeeper() != $idKeeper;
            });

            $this->SaveData();
        }

        public function Modify($keeper) {
            $this->RetrieveData();

            $this->Remove($keeper->getIdKeeper());

            array_push($this->keeperList, $keeper);

            $this->SaveData();
        }

        public function GetAll() {
            $this->RetrieveData();
            return $this->keeperList;
        }

        public function GetByEmail($email) {
            $this->RetrieveData();

            $keeper = null;

            $aux = array_filter($this->keeperList, function($keeper) use ($email) {
                return $keeper->getEmail() === $email;
            });

            $aux= array_values($aux);

            return (count($aux) > 0) ? $aux[0] : null;
        }

        private function SaveData() {
            $arrayEncode = array();

            foreach($this->kepperList as $keeper) {
                $value["idKeeper"] = $keeper->getIdKeeper();
                $value["passKeeper"] = $keeper->getPassKeeper();
                $value["namePerson"] = $keeper->getNamePerson();
                $value["lastnamePerson"] = $keeper->getLastnamePerson();
                $value["dni"] = $keeper->getDni();
                $value["email"] = $keeper->getEmail();
                $value["address"] = $keeper->getAddress();
                $value["cellphone"] = $keeper->getCellphone();
                $value["dogType"] = $keeper->getDogType();
                $value["score"] = $keeper->getScore();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData() {
            $this->keeperList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value) {
                    $keeper = new keeper();
                    $keeper->setIdKeeper($value["idKeeper"]);
                    $keeper->setPassKeeper($value["passKeeper"]);
                    $keeper->setNamePerson($value["namePerson"]);
                    $keeper->setLastnamePerson($value["lastnamePerson"]);
                    $keeper->setDni($value["dni"]);
                    $keeper->setEmail($value["email"]);
                    $keeper->setAddress($value["address"]);
                    $keeper->setCellphone($value["cellphone"]);
                    $keeper->setDogType($value["dogType"]);
                    $keeper->setScore($value["score"]);
                    
                    array_push($this->keeperList, $keeper);
                }
            }
        }
    }
?>