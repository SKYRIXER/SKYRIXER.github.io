<?php
require_once "database/models/review.php";
require_once 'libraries/cleaners.php';

function viewreviewsController(){
    $allreviews = getAllreviews();
    require "views/review.view.php";    
}

function addreviewController(){
    if(isset($_POST['elokuvaid'], $_POST['arvostelu'], $_POST['lisayspvm'], $_POST['tahdet'], $_POST["kuva"])){
        $elokuvaid = cleanUpInput($_POST['elokuvaid']);
        $arvostelu = cleanUpInput($_POST['arvostelu']);
        $lisayspvm = cleanUpInput($_POST['lisayspvm']);
        $tahdet = cleanUpInput($_POST["tahdet"]);
        $kuva = cleanUpInput($_POST["kuva"]);

        addreviews($elokuvaid, $arvostelu, $lisayspvm, $tahdet, $kuva, $_SESSION['userid']); 
        require "views/review.view.php";
    } else {
        require "views/newreview.view.php";
    }
}

function editreviewController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $reviews = getreviewById($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe arvostelua haettaessa: " . $e->getMessage();
    }
    
    if($reviews){
        $arvosteluid = $reviews['arvosteluid'];
        $tahdet = $reviews['tahdet'];
        $arvostelu = $reviews['arvostelu'];
        $lisayspvm = $reviews['lisayspvm'];
        $elokuvaid = $reviews['elokuvaid'];
        //$time = implode("T", explode(" ",$dbtime));
    
        require "views/updatereview.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updatereviewController(){
    if(isset($_POST['tahdet'], $_POST['arvostelu'], $_POST['lisayspvm'], $_POST["arvosteluid"])){
        $tahdet = cleanUpInput($_POST["tahdet"]);
        $arvostelu = cleanUpInput($_POST['arvostelu']);
        $lisayspvm = cleanUpInput($_POST['lisayspvm']);
        $arvosteluid = cleanUpInput($_POST["arvosteluid"]);

        try{
            updatereview($tahdet, $arvostelu, $lisayspvm, $arvosteluid);
            header("Location: /");    
        } catch (PDOException $e){
                echo "Virhe arvostelua päivitettäessä: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function deletereviewController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deletereview($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista poistettaessa: " . $e->getMessage();
    }

    $allreviews = getAllreviews();

    header("Location: /");
    exit;
}





