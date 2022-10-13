<?php require "partials/head.php";
require_once "database/models/movie.php";
$pdo = connectDB();
$movies = getAllmovies($pdo); ?>

<h2 class="centered">Syötä arvostelu</h2>

<div class="inputarea">
<form  action="/add_review" method="post">
<select required class="form-select" name="elokuvaid" id="elokuvaid">

<?php
        foreach($movies as $movie):?>
        <option value="<?= $movie["elokuvaid"]?>"><?= $movie["nimi"] ?></option>
<?php endforeach;?>
</select>
    <label for="elokuvaid"><p>Valitse elokuva</label><br>

    <label for="arvostelu"><p>Arvostelu:</label>
    <textarea id="arvostelu" name="arvostelu" rows="5" cols="30"></textarea>

    <label for="tahdet"><p>tähdet:</label>
    <input type="number" id="tahdet" name="tahdet" min="1" max="10"></input>

    <label for="kuva"><p>Lisää kuvan linkki:</label>
    <textarea id="kuva" name="kuva" rows="1" cols="30"></textarea>

<!--<div class="dropdown">
    <button class="dropbtn">Tähdet</button>
    <div class="dropdown-content">
    <a id="tahdet1">⭐</a>
    <a id="tahdet2">⭐⭐</a>
    <a id="tahdet3">⭐⭐⭐</a>
    <a id="tahdet4">⭐⭐⭐⭐</a>
    <a id="tahdet5">⭐⭐⭐⭐⭐</a>
</div>
</div> <br>-->
    <label for="lisayspvm">Valitse arvostelun päivämäärä</label>
    <input id="lisayspvm" type="datetime-local"  name="lisayspvm" value="date"> <br><br>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>