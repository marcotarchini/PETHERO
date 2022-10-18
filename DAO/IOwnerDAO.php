<?php

    namespace DAO;

    interface IOwnerDAO {

        function Add(Owner $owner);
        function Remove($idOwner);
        function Modify(Owner $owner);
        function GetAll();
       /* function GetByEmail($email);*/
    }
?>