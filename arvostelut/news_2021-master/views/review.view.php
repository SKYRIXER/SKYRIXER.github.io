<?php require "partials/head.php";
    $allreviews = getAllreviews();
    $pdo = connectDB();
    $movies = getAllmovies($pdo); 
    //$sheesh = array_combine($allreviews, $movies);?>

<h2 class="centered">Lue arvostelut</h2>

<div class = "reviews">
<?php
    foreach($allreviews as $reviewsitem): ?>
        <div class='reviewsitem'>
        <h3>Elokuva: <?=$reviewsitem["elokuvaid"] ?></h3>
        <h3>Arvostelu: <?=$reviewsitem["arvostelu"] ?></h3>
        <p>Tähdet: <?=$reviewsitem["tahdet"]?></p>
        <p>Päivämäärä: <?=$reviewsitem["lisayspvm"]?></p>
        <p><img src='<?=$reviewsitem["kuva"]?>'> </p>
        <?php
        if(isLoggedIn() && ($reviewsitem["userid"] == $_SESSION["userid"])):
            $id = $reviewsitem['arvosteluid'];
            $arvosteluid = 'deletereviews' . $id; ?>
            <a id=<?=$arvosteluid ?> onClick='confirmDelete(<?=$id?>)' href='/delete_review?id=<?=$id?>'>Poista</a> | 
            <a href='/update_review?id=<?=$id?>'>Päivitä</a>
        <?php endif; ?>
        </div>
    <?php endforeach ?>
</div>

<?php require "partials/footer.php"; ?>