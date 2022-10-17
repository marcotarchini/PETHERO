<?php

    namespace DAO;

    interface IKeeperDAO {

        function Add($keeper);
        function Remove($idKeeper);
        function Modify($keeper);
        function GetAll();
        function GetByEmail($email);
    }
?>