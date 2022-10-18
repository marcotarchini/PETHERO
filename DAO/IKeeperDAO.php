<?php

    namespace DAO;

    interface IKeeperDAO {

        function Add(Keeper $keeper);
        function Remove($idKeeper);
        function Modify(Keeper $keeper);
        function GetAll();
       /* function GetByEmail($email);*/
    }
?>