<?php

    namespace Controllers;

use DAO\BeerTypeDAO;
use Models\BeerType;

    class BeerTypeController {
        private $beerTypeDAO;

        public function __construct() {
            $this->beerTypeDAO = new BeerTypeDAO();
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-beertype.php");
        }

        public function ShowListView() {
            require_once(VIEWS_PATH . "validate-session.php");
            $beerTypeList = $this->beerTypeDAO->GetAll();
            require_once(VIEWS_PATH . "beertype-list.php");
        }

        public function ShowModifyView($id) {
            require_once(VIEWS_PATH . "validate-session.php");
            $beerType = $this->beerTypeDAO->Exist($id);
            require_once(VIEWS_PATH . "modify-beertype.php");
        }

        public function Add($name, $description) {
            require_once(VIEWS_PATH . "validate-session.php");

            $beerType = new BeerType();
            $beerType->setName($name);
            $beerType->setDescription($description);

            $this->beerTypeDAO->Add($beerType);

            $this->ShowListView();
        }

        public function Remove($id) {
            require_once(VIEWS_PATH . "validate-session.php");

            $this->beerTypeDAO->Remove(intval($id));

            $this->ShowListView();
        }

        public function Modify($id, $name, $description) {
            require_once(VIEWS_PATH . "validate-session.php");

            $beerType = new BeerType();
            $beerType->setId(intval($id));
            $beerType->setName($name);
            $beerType->setDescription($description);

            $this->beerTypeDAO->Modify($beerType);

            $this->ShowListView();
        }
    }
?>