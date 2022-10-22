<?php

    namespace DAO;

    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;

    class UserDAO implements IUserDAO {
        
        private $fileName = ROOT . "/Data/user.json";
        private $userList = array();

        public function Add($user) {
            $this->RetrieveData();

            array_push($this->userList, $user);

            $this->SaveData();
        }

        public function GetByEmail($email) {
                $this->RetrieveData();

                $user = null;

                 $aux = array_filter($this->userList, function($user) use ($email) {
                     return $user->getEmail() === $email;
                 });

                $aux= array_values($aux);

                return (count($aux) > 0) ? $aux[0] : null;
        }

        private function RetrieveData() {
            $this->userList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value) {
                    $users = new User();
                   
                    $users->setNameUser($value["nameUser"]);
                    $users->setLastnameUser($value["lastnameUser"]);
                    $users->setDni($value["dni"]);
                    $users->setEmail($value["email"]);
                    $users->setAddress($value["address"]);
                    $users->setCellphone($value["cellphone"]);
                    $users->setPassword($value["password"]);    
                                    
                    array_push($this->userList, $users);
                }
            }
        }

        private function SaveData() {
            $arrayEncode = array();

            foreach($this->userList as $users) {
                
                $value["nameUser"] = $users->getNameUser();
                $value["lastnameUser"] = $users->getLastnameUser();
                $value["dni"] = $users->getDni();
                $value["email"] = $users->getEmail();
                $value["address"] = $users->getAddress();
                $value["cellphone"] = $users->getCellphone();
                $value["password"] = $users->getPassword();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        public function Remove($email) {
            $this->RetrieveData();

            $this->userList = array_filter($this->userList, function($user) use($email) {
                return $user->getIdUser() != $emailr;
            });

            $this->SaveData();
        }

        public function Modify($user) {
            $this->RetrieveData();

            $this->Remove($user->getEmail());

            array_push($this->userList, $user);

            $this->SaveData();
        }
    }
?>