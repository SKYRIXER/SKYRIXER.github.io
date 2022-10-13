<?php require "partials/head.php"; ?>

<h2 class="centered">Syötä elokuva</h2>

<div class="inputarea">
<form  action="/update_movie" method="post" >
    <label for="title">Nimi:</label>
    <input id="title" type="text" name="nimi" maxlength=30 value="<?=$title?>">
    <label for="title">Ohjaaja:</label>
    <input id="title" type="text" name="ohjaaja" maxlength=50 value="<?=$title?>">
    <label for="text">kuvaus:</label>
    <textarea id="text" name="kuvaus" rows="5" cols="30"><?=$text?></textarea>     
    <label for="date">päivämäärä</label>
    <input id="date" type="datetime-local"  name="julkaisu" value=<?=$time?>> 
    <input type="hidden" id="elokuvaid" name="id" value=<?=$id?>>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>