<?php require "partials/head.php"; ?>

<h2 class="centered">Login</h2>

<div class="inputarea">
<form  action="/login" method="post">
    <label for="uname"><p>Käyttäjänimi:</label>
    <input id="uname" type="text" name="username" maxlength=30>
    <label for="pwprd"><p>Salasana:</label>
    <input id="pword" type="password" name="password" maxlength=30> <br><br>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>