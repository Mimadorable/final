<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projetttt/public/css/sty.css">

    <title>Inscription & Connexion</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#contact">Contact</a></li>
            </ul>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
        </nav>
    </header>

    <form action="index.php?controller=user&action=register" id="register" class="input-group" method="POST">
        <fieldset>
            <legend>Inscription</legend>
            <label>Nom</label>
            <input type="text" name="nom" placeholder="Votre nom ici" required><br>
            <label>Mot de Passe</label>
            <input type="password" name="mot_de_passe" placeholder="Votre mot de passe ici" required><br>
            <label>Email</label>
            <input type="email" name="mail" placeholder="Votre Email ici" required><br>
            <label>Type</label>
            <select name="type" required>
                <option value="">Sélectionnez le type de diabète</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br>
            <label>Sexe</label>
            <input type="radio" name="gender" value="Homme" required> Homme 
            <input type="radio" name="gender" value="Femme" required> Femme
            <input type="submit" class="submit-btn" value="S'inscrire" name="submit">
        </fieldset>
    </form>

    <form id="login" class="input-group" method="POST" action="index.php?controller=user&action=login">
        <fieldset>
            <legend>Connexion</legend>
            <label for="username">Nom</label>
            <input type="text" class="input-field" id="username" name="username" placeholder="User Id" required><br>
            <label for="password">Mot de passe</label>
            <input type="password" class="input-field" id="password" name="password" placeholder="Enter Password" required><br>
            <input type="checkbox" class="check-box" id="remember" name="remember">
            <label for="remember">Remember Password</label>
            <button type="submit" class="submit-btn">Se connecter</button>
        </fieldset>
    </form>

    <script>
        function register() {
            var registerForm = document.getElementById("register");
            var loginForm = document.getElementById("login");
            var btn = document.getElementById("btn");

            registerForm.style.display = "block";
            loginForm.style.display = "none";
            btn.style.left = "110px";
        }

        function login() {
            var registerForm = document.getElementById("register");
            var loginForm = document.getElementById("login");
            var btn = document.getElementById("btn");

            registerForm.style.display = "none";
            loginForm.style.display = "block";
            btn.style.left = "0px";
        }
    </script>
</body>
</html>
