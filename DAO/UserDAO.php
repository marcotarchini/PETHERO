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

?>