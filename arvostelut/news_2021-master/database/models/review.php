<?php
require_once "database/connection.php";
//INNER JOIN moviess on reviews.elokuvaid = moviess.nimi
function getAllreviews(){
    $pdo =connectDB();
    $sql = "SELECT * FROM reviews";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addreviews($elokuvaid, $arvostelu, $lisayspvm, $tahdet, $kuva, $userid){
    $pdo = connectDB();
    $data = [$elokuvaid, $arvostelu, $lisayspvm, $tahdet, $kuva, $userid];
    $sql = "INSERT INTO reviews (elokuvaid, arvostelu, lisayspvm, tahdet, kuva, userid) VALUES(?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getreviewById($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM reviews WHERE arvosteluid=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deletereview($id){
    $pdo = connectDB();
    $sql = "DELETE FROM reviews WHERE arvosteluid=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}

function updatereview($tahdet, $arvostelu, $lisayspvm, $arvosteluid){
    $pdo = connectDB();
    $data = [$tahdet, $arvostelu, $lisayspvm, $arvosteluid];
    $sql = "UPDATE reviews SET tahdet = ?, arvostelu = ?, lisayspvm = ? WHERE arvosteluid = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}