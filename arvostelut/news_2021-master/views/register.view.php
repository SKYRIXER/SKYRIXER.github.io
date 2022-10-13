<?php require "partials/head.php"; ?>

<h2 class="centered">Rekisteröidy</h2>

<div class="inputarea">
<form  action="/register" method="post">
    <label for="fname"><p>Etunimi:</label> 
    <input id="fname" type="text" name="firstname" maxlength=30>
    <label for="lname"><p>Sukunimi:</label>         
    <input id="lname" type="text" name="lastname" maxlength=30>
    <label for="uname"><p>Käyttäjänimi:</label>
    <input id="uname" type="text" name="username" maxlength=30>
    <label for="pword"><p>Salasana:</label>
    <input id="pword" type="password" name="password" maxlength=30><br><br>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>