<?php

    namespace DAO;

    interface IDogDAO {

        function Add(Dog $dog);
        function Remove($idDog);
        function Modify(Dog $dog);
        function GetAll();
        function GetById($idDog);
    }
?>