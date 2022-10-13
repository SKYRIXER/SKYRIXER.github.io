<?php
require_once "database/models/movie.php";
require_once 'libraries/cleaners.php';

function viewmoviesController(){
    $allmovie = getAllmovies();
    require "views/movie.view.php";    
}

function addmovieController(){
    if(isset($_POST['nimi'], $_POST['ohjaaja'], $_POST['kuvaus'], $_POST['julkaisuvuosi'])){
        $pdo = connect();
        $nimi = cleanUpInput($_POST['nimi']);
        $ohjaaja = cleanUpInput($_POST['ohjaaja']);
        $kuvaus = cleanUpInput($_POST['kuvaus']);
        $julkaisu = cleanUpInput($_POST["julkaisuvuosi"]);

        addmovie($nimi, $ohjaaja, $kuvaus, $julkaisu); 
        header("Location: /");    
    } else {
        require "views/newmovie.view.php";
    }
}

function editmovieController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $movie = getmovieById($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe elokuvaa haettaessa: " . $e->getMessage();
    }
    
    if($movie){
        $id = $movie['elokuvaid'];
        $movietitle = $movie['nimi'];
        $director = $movie["ohjaaja"];
        $description = $movie['kuvaus'];
        $release = $movie["julkaisuvuosi"];
        //$dbtime = $movie['created'];
        //$time = implode("T", explode(" ",$dbtime));
        //$removetime = $movie['expirydate'];
        $id = $movie['elokuvaid'];
    
        require "views/updatemovie.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updatemovieController(){
    if(isset($_POST['nimi'], $_POST['ohjaaja'], $_POST['kuvaus'], $_POST['julkaisu'])){
        $movietitle = cleanUpInput($_POST['nimi']);
        $director = cleanUpInput($_POST['ohjaaja']);
        $description = cleanUpInput($_POST['kuvaus']);
        $release = cleanUpInput($_POST["julkaisu"]);
        $id = cleanUpInput($_POST["id"]);

        try{
            updatemovie($nimi, $ohjaaja, $kuvaus, $julkaisu, $id);
            header("Location: /");    
        } catch (PDOException $e){
                echo "Virhe elokuvaa päivitettäessä: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function deletemovieController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deletemovie($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe elokuvaa poistettaessa: " . $e->getMessage();
    }

    $allmovie = getAllmovies();

    header("Location: /");
    exit;
}





