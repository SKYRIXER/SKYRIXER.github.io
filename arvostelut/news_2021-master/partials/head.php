<!DOCTYPE html>
<html lang="fi">
<head>
    <title>Arvostelut</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/uutiset.css" type="text/css">
</head>
<body>
<script>
    function confirmDelete(id) {
        const answer = confirm("Poistetaanko arvostelu?");
        if(!answer){
            document.getElementById('deleteNews' + id).href = '/';
        }
        return answer;
    }
</script>
    <header>
        <h1>Elokuva Arvostelut!</h1>
    </header>
<nav>
    <ul class="navbar">
        <li class="navbutton"><a href="/">Lue arvostelut</a></li>
        <?php if(!isLoggedIn()): ?>
            <li class="navbutton"><a href="/login">Kirjaudu sisään</a></li> 
            <li class="navbutton"><a href="/register">Rekisteröidy</a></li>
        <?php else: ?>
            <li class="navbutton"><a href="/add_movie">Uusi elokuva</a></li>
            <li class="navbutton"><a href="/add_review">Uusi arvostelu</a></li>
            <li class="navbutton"><a href="/logout">Kirjaudu ulos</a></li>
        <?php endif ?>

    </ul>
</nav>