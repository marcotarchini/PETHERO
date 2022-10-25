<?php

    namespace DAO;

    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;

    class UserDAO implements IUserDAO {
        
        private $fileName = ROOT . "/Data/user.json";
        public $userList = array();

        public function Add($user) {
            $this->RetrieveData();

            $user->setId($this->GetNextId());

            array_push($this->userList, $user);

            $this->SaveData();
        }

        public function GetByUser($userName) {
                $this->RetrieveData();

                $user = null;

                 $aux = array_filter($this->userList, function($user) use ($userName) {
                     return $user->getUserName() === $userName;
                 });

                $aux= array_values($aux);

                return (count($aux) > 0) ? $aux[0] : null;
        }

        private function GetNextId() {
            $id = 0;

            foreach($this->userList as $user) {
                $id = ($user->getId() > $id) ? $user->getId() : $id;
            }

            return $id + 1;
        }

        private function RetrieveData() {
            $this->userList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value) {
                    $user = new User();

                    $user->setId($value["id"]);
                    $user->setUserName($value["userName"]);
                    $user->setPassword($value["password"]);    
                                    
                    array_push($this->userList, $user);
                }
            }
        }

        private function SaveData() {
            $arrayEncode = array();

            foreach($this->userList as $user) {
                
                $value["id"] = $user->getId();
                $value["userName"] = $user->getUserName();
                $value["password"] = $user->getPassword();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        public function Remove($id) {
            $this->RetrieveData();

            $this->userList = array_filter($this->userList, function($user) use($id) {
                return $user->getId() != $id;
            });

            $this->SaveData();
        }

        public function Modify($user) {
            $this->RetrieveData();

            $this->Remove($user->getUserName());

            array_push($this->userList, $user);

            $this->SaveData();
        }
    }
?>