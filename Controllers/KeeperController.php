<?php

    namespace Controllers;

    use DAO\KeeperDAO as KeeperDAO;
    use Models\Keeper as Keeper;

    class keeperController {
        private $keeperDAO;

        public function __construct() {
            $this->keeperDAO = new KeeperDAO();
        }

        public function ShowAddView() {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "add-keeper.php");
        }

        public function ShowListView() {
            require_once(VIEWS_PATH . "validate-session.php");
            $keeperList = $this->keeperDAO->GetAll();
            require_once(VIEWS_PATH . "keeper-list.php");
        }

        public function ShowModifyView($idKeeper) {
            require_once(VIEWS_PATH . "validate-session.php");
            $keeper = $this->keeperDAO->GetById($idKeeper);
            require_once(VIEWS_PATH . "modify-keeper.php");
        }

        public function Add($userKeeper, $idKeeper, $dogType, $priceXDay, $score) {
            require_once(VIEWS_PATH . "validate-session.php");

            $keeper = new Keeper();

            $keeper->setUserKeeper($userKeeper);
            $keeper->setIdKeeper($idKeeper);
            $keeper->setDogType($dogType);
            $keeper->setPriceXDay($priceXDay);
            $keeper->setScore($score);
                       
            $this->keeperDAO->Add($keeper);

            $this->ShowListView();
        }

        public function Remove($idKeeper) {
            require_once(VIEWS_PATH . "validate-session.php");
            
            $this->keeperDAO->Remove($idKeeper);

            $this->ShowListView();
        }

        public function Modify($userKeeper, $idKeeper, $dogType, $priceXDay, $score) {

            $keeper = new Keeper();

            $keeper->setUserKeeper($userKeeper);
            $keeper->setIdKeeper(intval($idKeeper));
            $keeper->setDogType($dogType);
            $keeper->setPriceXDay($priceXDay);
            $keeper->setScore($score);
        
            $this->keeperDAO->Modify($keeper);

            $this->ShowListView();
        }
    }
?>