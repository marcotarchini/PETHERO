<?php

    namespace DAO;

    interface IUserDAO {

        function Add(User $user);
        function GetByEmail($email);
    }
?>