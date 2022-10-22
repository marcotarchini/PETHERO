<?php

    namespace DAO;

    use Models\Pet as Pet;

    class PetDAO implements IPetDAO {
        private $fileName = ROOT . "/Data/pet.json";
        private $petList = array();

        public function Add($pet) {
            $this->RetrieveData();

            $pet->setIdPet($this->GetNextId());

            array_push($this->petList, $pet);

            $this->SaveData();
        }
        
        private function GetNextId() {
            $idPet = 0;

            foreach($this->petList as $pet) {
                $idPet = ($pet->getIdpet() > $idPet) ? $pet->getIdpet() : $idPet;
            }

            return $idPet + 1;
        }

        public function Remove($idPet) {
            $this->RetrieveData();

            $this->petList = array_filter($this->petList, function($pet) use($idPet) {
                return $pet->getIdpet() != $idPet;
            });

            $this->SaveData();
        }

        public function Modify($pet) {
            $this->RetrieveData();

            $this->Remove($pet->getIdpet());

            array_push($this->petList, $pet);

            $this->SaveData();
        }

        public function GetAll() {
            $this->RetrieveData();
            return $this->petList;
        }

        public function GetById($idPet) {
            $this->RetrieveData();

            $pet = null;

            $aux = array_filter($this->petList, function($pet) use ($idPet) {
                return $pet->getEmail() === $idPet;
            });

            return (count($aux) > 0) ? $aux[0] : null;
        }

        private function SaveData() {
            $arrayEncode = array();

            foreach($this->petList as $pet) {
                $value["idPet"] = $pet->getIdpet();
                $value["animal"] = $pet-> getAnimal();
                $value["namepet"] = $pet->getNamepet();
                $value["photo"] = $pet->getPhoto();
                $value["race"] = $pet->getRace();
                $value["size"] = $pet->getSize();
                $value["vaccines"] = $pet->getVaccines();
                $value["observation"] = $pet->getObservation();
                $value["video"] = $pet->getVideo();
                
                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData() {
            $this->petList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value) {
                    $pet = new Pet();
                    $pet->getIdpet($value["idPet"]);
                    $pet->getAnimal($value["animal"]);
                    $pet->getNamePet($value["namePet"]);
                    $pet->getPhoto($value["photo"]);
                    $pet->getRace($value["race"]);
                    $pet->getSize($value["size"]);
                    $pet->getVaccines($value["vaccines"]);
                    $pet->getObservation($value["observation"]);
                    $pet->getVideo($value["video"]);
                                       
                    array_push($this->petList, $pet);
                }
            }
        }
    }
?>

<!--<img src="<?php echo FRONT_ROOT.IMG_PATH.$pet->getVaccinationPlan(); ?>" alt= "no-image.php"  style="width: 100px;">-->