<?php
require_once "database/connection.php";

function getAllmovies(){
    $pdo =connectDB();
    $sql = "SELECT * FROM moviess";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addmovie($nimi, $ohjaaja, $kuvaus, $julkaisuvuosi){
    $pdo =connectDB();
    $data = [$nimi, $ohjaaja, $kuvaus, $julkaisuvuosi];
    $sql = "INSERT INTO moviess (nimi, ohjaaja, kuvaus, julkaisuvuosi) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getmovieById($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM moviess WHERE elokuvaid=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deletemovie($id){
    $pdo = connectDB();
    $sql = "DELETE FROM moviess WHERE elokuvaid=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}

function updatemovie($nimi, $ohjaaja, $kuvaus, $julkaisuvuosi){
    $pdo = connectDB();
    $data = [$nimi, $ohjaaja, $kuvaus, $julkaisuvuosi];
    $sql = "UPDATE moviess SET nimi = ?, ohjaaja = ?, kuvaus = ?, julkaisuvuosi = ? WHERE elokuvaid = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}