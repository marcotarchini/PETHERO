<?php

    namespace Controllers;

    use DAO\BeerDAO;
    use DAO\BeerTypeDAO;
    use Models\Beer;
    use Models\BeerType;

    class BeerController {
        private $beerDAO;

        public function __construct() {
            $this->beerDAO = new BeerDAO();
        }

        public function ShowAddView($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-beer.php");
        }

        public function ShowListView() {
            require_once(VIEWS_PATH . "validate-session.php");
            $beerList = $this->beerDAO->GetAll();
            require_once(VIEWS_PATH . "beer-list.php");
        }

        public function ShowModifyView($code) {
            require_once(VIEWS_PATH . "validate-session.php");
            $beer = $this->beerDAO->GetByCode($code);
            require_once(VIEWS_PATH . "modify-beer.php");
        }

        public function Add($code, $description, $density, $beerType, $price) {
            require_once(VIEWS_PATH . "validate-session.php");

            $beerTypeDAO = new BeerTypeDAO();
            $type = $beerTypeDAO->Exist(intval($beerType));

            if($type) {
                $beer = new Beer();
                $beer->setCode($code);
                $beer->setDescription($description);
                $beer->setDensity($density);
                $beer->setBeerType($type);
                $beer->setPrice($price);

                $this->beerDAO->Add($beer);

                $this->ShowListView();
            } else {
                $this->ShowAddView("El tipo de cerveza ingresado no existe");
            }
        }

        public function Remove($code) {
            require_once(VIEWS_PATH . "validate-session.php");

            $this->beerDAO->Remove(intval($code));

            $this->ShowListView();
        }

        public function Modify($id, $code, $description, $density, $beerType, $price) {
            require_once(VIEWS_PATH . "validate-session.php");

            $beerTypeDAO = new BeerTypeDAO();
            $type = $beerTypeDAO->Exist(intval($beerType));

            if($type) {
                $beer = new Beer();
                $beer->setId(intval($id));
                $beer->setCode($code);
                $beer->setDescription($description);
                $beer->setDensity($density);
                $beer->setBeerType($type);
                $beer->setPrice($price);

                $this->beerDAO->Modify($beer);

                $this->ShowListView();
            } else {
                $this->ShowModifyView("El tipo de cerveza ingresado no existe");
            }
        }
    }
?>