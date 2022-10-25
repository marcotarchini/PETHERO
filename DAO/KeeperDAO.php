<?php

    namespace DAO;

    use DAO\IKeeperDAO as IKeeperDAO;
    use Models\Keeper as Keeper;

    class KeeperDAO implements IKeeperDAO {
        
        private $fileName = ROOT . "/Data/keeper.json";
        private $keeperList = array();
        private $userLogged = $_SESSION["loggedUser"];

        public function Add($keeper) {
            $this->RetrieveData();

            $keeper->setIdKeeper($this->$userLogged->getId());

            array_push($this->keeperList, $keeper);

            $this->SaveData();
        }
        
        /*private function GetNextId() {
            $idKeeper = 0;

            foreach($this->keeperList as $keeper) {
                $idKeeper = ($keeper->getIdKeeper() > $idKeeper) ? $keeper->getIdKeeper() : $idKeeper;
            }

            return $idKeeper + 1;
        }*/

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

        public function GetById($idKeeper) {
            $this->RetrieveData();

            $keeper = null;

            $aux = array_filter($this->keeperList, function($keeper) use ($idKeeper) {
                return $keeper->getIdKeeper() === $idKeeper;
            });

            $aux= array_values($aux);

            return (count($aux) > 0) ? $aux[0] : null;
        }

        private function SaveData() {
            $arrayEncode = array();

            foreach($this->kepperList as $keeper) {

                $value["idKeeper"] = $keeper->getIdKeeper();
                $value["nameKeeper"] = $keeper->getNameKeeper();
                $value["lNameKeeper"] = $keeper->getLNameKeeper();
                $value["dni"] = $keeper->getDni();
                $value["email"] = $keeper->getEmail();
                $value["address"] = $keeper->getAddress();
                $value["cellphone"] = $keeper->getCellphone(); 
                $value["petSize"] = $keeper->getPetSize();
                $value ["priceXDay"] = $keeper->getPriceXDay();
                $value["score"] = $keeper->getScore();
                $value["keeperUser"] = $keeper->getKeeperUser();

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
                    $keeper = new Keeper();
                    
                    $keeper->setIdKeeper($value["idKeeper"]);
                    $keeper->setNameKeeper($value["nameKeeper"]);
                    $keeper->setLNameKeeper($value["lNameKeeper"]);
                    $keeper->setDni($value["dni"]);
                    $keeper->setEmail($value["email"]);
                    $keeper->setAddress($value["address"]);
                    $keeper->setCellphone($value["cellphone"]);
                    $keeper->setPetSize($value["petSize"]);
                    $keeper->setPriceXDay($value["priceXDay"]);
                    $keeper->setScore($value["score"]);
                    $keeper->setKeeperUser($value["keeperUser"]);
                    
                    array_push($this->keeperList, $keeper);
                }
            }
        }
    }
?>