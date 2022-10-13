<?php require "partials/head.php"; ?>

<h2 class="centered">Syötä arvostelu</h2>

<div class="inputarea">
<form  action="/update_review" method="post" >

    <label for="arvostelu"><p>Arvostelu:</label>
    <textarea id="arvostelu" name="arvostelu" rows="5" cols="30"><?=$arvostelu?></textarea>
    <label for="tahdet"><p>tähdet:</label>
    <input type="number" id="tahdet" name="tahdet" min="1" max="10"></input>   
    <label for="lisayspvm"><p>päivämäärä</label>
    <input id="lisayspvm" type="datetime-local"  name="lisayspvm" value=<?=$lisayspvm?>> 
    <input type="hidden" id="arvosteluid" name="arvosteluid" value=<?=$arvosteluid?>><br><br>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>