<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Resto</title>
</head>

<body>
    <header>
        <a href="#" class="logo"><span>D</span>ietFood</a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navbar">
            <li><a href="#banniere" onclick="toggleMenu();">Accueil</a></li>
            <li><a href="#apropos" onclick="toggleMenu();">A propos</a></li>
            <li>
                <a href="#menu" onmouseenter="showFilter();" onclick="showFilter();" onmouseleave="hideFilter();">Menu</a>
                <div id="menu-filter" class="filter-content" onmouseenter="showFilter();" onmouseleave="hideFilter();">
                    <ul>
                        <li><a href="index.php?controller=home&action=getRecipesByCategory&categorie=salades">Salades</a></li>
                        <li><a href="index.php?controller=home&action=getRecipesByCategory&categorie=plats">Plats</a></li>
                        <li><a href="index.php?controller=home&action=getRecipesByCategory&categorie=soupes">Soupes</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#expert" onclick="toggleMenu();">Expert</a></li>
            <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>
            <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
        </ul>
    </header>

    <div id="recipes-container"></div>

    <section class="banniere" id="banniere">
        <img src="images/healthy9.jpg" alt="">
        <div class="contenu">
            <h2>Que Des Plats Délicieux</h2>
            <p>Bienvenue sur notre site dédié aux recettes pour diabétiques ! Découvrez des délices culinaires spécialement conçus pour répondre à vos besoins nutritionnels. Savourez une cuisine équilibrée et délicieuse tout en prenant soin de votre santé. Rejoignez notre communauté gourmande et inspirante dès maintenant !</p>
            <a href="#" class="btn1">Notre Menu</a>
            <a href="#" class="btn2">Selon le type de diabète</a>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleMenu() {
            var navbar = document.querySelector('.navbar');
            navbar.style.display = navbar.style.display === 'block' ? 'none' : 'block';
        }

        function showFilter() {
            document.getElementById("menu-filter").style.display = "block";
        }

        function hideFilter() {
            setTimeout(() => {
                document.getElementById("menu-filter").style.display = "none";
            }, 300);
        }
    </script>
</body>
</html>
