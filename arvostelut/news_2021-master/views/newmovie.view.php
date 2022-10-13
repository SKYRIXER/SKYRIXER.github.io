<?php require "partials/head.php" ?>

<h2 class="centered">Syötä elokuva</h2>

<div class="inputarea">
<form action="/add_movie" method="post">
    <label for="nimi"><p>Elokuvan nimi: </label>
    <input id="nimi" type="text" name="nimi" maxlength=50 value="">

    <label for="ohjaaja"><p>Ohjaaja: </label>
    <input id="ohjaaja" type="text" name="ohjaaja" maxlength=40 value="">

    <label for="kuvaus"><p>Kuvaus: </label>
    <textarea id="kuvaus" name="kuvaus" rows="3" cols="30"></textarea>

    <label for="julkaisuvuosi"><p>Julkaisu vuosi </label>
    <input id="julkaisuvuosi" type="number" name="julkaisuvuosi" maxlength=40 value="">
<br><br>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>