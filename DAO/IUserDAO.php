<?php

    namespace DAO;

    interface IUserDAO {

        function Add(User $user);
        function GetByUser($userName);
        function Remove($id);
        function Modify(User $user);
        function GetAll();
    }
?>