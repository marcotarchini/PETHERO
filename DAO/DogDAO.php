<?php

    namespace DAO;

    use Models\Dog;

    class DogDAO implements IDogDAO {
        private $fileName = ROOT . "/Data/dog.json";
        private $dogList = array();

        public function Add($dog) {
            $this->RetrieveData();

            $dog->setIddog($this->GetNextId());

            array_push($this->dogList, $dog);

            $this->SaveData();
        }
        
        private function GetNextId() {
            $idDog = 0;

            foreach($this->dogList as $dog) {
                $idDog = ($dog->getIdDog() > $idDog) ? $dog->getIdDog() : $idDog;
            }

            return $iddog + 1;
        }

        public function Remove($idDog) {
            $this->RetrieveData();

            $this->dogList = array_filter($this->dogList, function($dog) use($idDog) {
                return $dog->getIdDog() != $idDog;
            });

            $this->SaveData();
        }

        public function Modify($dog) {
            $this->RetrieveData();

            $this->Remove($dog->getIdDog());

            array_push($this->dogList, $dog);

            $this->SaveData();
        }

        public function GetAll() {
            $this->RetrieveData();
            return $this->dogList;
        }

        public function GetById($idDog) {
            $this->RetrieveData();

            $dog = null;

            $aux = array_filter($this->dogList, function($dog) use ($idDog) {
                return $dog->getEmail() === $idDog;
            });

            return (count($aux) > 0) ? $aux[0] : null;
        }

        private function SaveData() {
            $arrayEncode = array();

            foreach($this->dogList as $dog) {
                $value["idDog"] = $dog->getIdDog();
                $value["nameDog"] = $dog->getNameDog();
                $value["photo"] = $dog->getPhoto();
                $value["race"] = $dog->getRace();
                $value["size"] = $dog->getSize();
                $value["vaccines"] = $dog->getVaccines();
                $value["observation"] = $dog->getObservation();
                $value["video"] = $dog->getVideo();
                
                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData() {
            $this->dogList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value) {
                    $dog = new dog();
                    $dog->getIdDog($value["idDog"]);
                    $dog->getNameDog($value["nameDog"]);
                    $dog->getPhoto($value["photo"]);
                    $dog->getRace($value["race"]);
                    $dog->getSize($value["size"]);
                    $dog->getVaccines($value["vaccines"]);
                    $dog->getObservation($value["observation"]);
                    $dog->getVideo($value["video"]);
                                       
                    array_push($this->dogList, $dog);
                }
            }
        }
    }
?>

<!--<img src="<?php echo FRONT_ROOT.IMG_PATH.$pet->getVaccinationPlan(); ?>" alt= "no-image.php"  style="width: 100px;">-->