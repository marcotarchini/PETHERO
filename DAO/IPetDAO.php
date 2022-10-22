<?php

    namespace DAO;

    interface IPetDAO {

        function Add(Pet $pet);
        function Remove($idPet);
        function Modify(Pet $pet);
        function GetAll();
        function GetById($idPet);
    }
?>