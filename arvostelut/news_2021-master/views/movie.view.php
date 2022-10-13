<?php require "partials/head.php"; ?>

<h2 class="centered">Selaa elokuvia</h2>

<div class = "movies">
<?php
    foreach($allmovies as $movieitem): ?>
        <div class='movieitem'>
        <h3><?=$movieitem["nimi"] ?></h3>
        <p><?=$movieitem["ohjaaja"]?></p>
        <p><?=$movieitem["julkaisuvuosi"]?> by user: <?=$newsitem["userid"]?></p>
        <?php
        if(isLoggedIn() && ($newsitem["userid"] == $_SESSION["userid"])):
            $id = $newsitem['elokuvaid'];
            $newsid = 'deleteNews' . $id; ?>
            <a id=<?=$newsid ?> onClick='confirmDelete(<?=$id?>)' href='/delete_movie?id=<?=$id?>'>Poista</a> | 
            <a href='/update_movie?id=<?=$id?>'>Päivitä</a>
        <?php endif; ?>
        </div>
    <?php endforeach ?>
</div>

<?php require "partials/footer.php"; ?>