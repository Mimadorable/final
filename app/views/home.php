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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var menuFilter = document.getElementById("menu-filter");
    var filterTimeout;

    function toggleMenu() {
        var navbar = document.querySelector('.navbar');
        if (navbar.style.display === 'block') {
            navbar.style.display = 'none';
        } else {
            navbar.style.display = 'block';
        }
    }

    function showFilter() {
        clearTimeout(filterTimeout);
        menuFilter.style.display = "block";
    }
    function hideFilter() {
        filterTimeout = setTimeout(function() {
            menuFilter.style.display = "none";
        }, 300);
    }

    function getRecipesByCategory(categorie) {
    $.ajax({
        url: 'get_recipes.php',
        method: 'GET',
        data: { categorie: categorie },
        dataType: 'json',
        success: function (recipes) {
            var recipesList = $('#recipes-list');
            recipesList.empty();

            for (var i = 0; i < recipes.length; i++) {
                var recipe = recipes[i];
                var recipeItem = $('<li>').text(recipe.nom_recette);
                recipesList.append(recipeItem);
            }
        },
        error: function (xhr, status, error) {
            console.log('Une erreur s\'est produite lors de la récupération des recettes.');
        }
    });
}

function displayRecipes(recipes) {
    var recipesContainer = document.getElementById("recipes-container");
    recipesContainer.innerHTML = "";

    if (recipes.length > 0) {
        for (var i = 0; i < recipes.length; i++) {
            var recipe = recipes[i];
            var recipeElement = document.createElement("div");
            recipeElement.innerHTML = "<h3>" + recipe.nom_recette + "</h3><p>" + recipe.description_recette + "</p>";
            recipesContainer.appendChild(recipeElement);
        }
    } else {
        var noRecipesMessage = document.createElement("p");
        noRecipesMessage.textContent = "Aucune recette disponible pour cette catégorie.";
        recipesContainer.appendChild(noRecipesMessage);
    }
}
</script>
<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>Que Des Plats Délicieux</h2>
        <p>Bienvenue sur notre site dédié aux recettes pour diabétiques ! Découvrez des délices culinaires spécialement conçus pour répondre à vos besoins nutritionnels. Savourez une cuisine équilibrée et délicieuse tout en prenant soin de votre santé. Rejoignez notre communauté gourmande et inspirante dès maintenant !</p>
        <a href="index.html#menu" class="btn1">Notre Menu</a>
        <a href="formulaire.html" class="btn2">Selon le type de diabète</a>
    </div>
</section>

<section class="apropos" id="apropos">
    <div class="row">
        <div class="col50">
            <h2 class="titre-texte"><span>A</span> Propos De Nous</h2>
            <p>Nous sommes deux étudiants passionnés de cuisine et soucieux de promouvoir une alimentation saine. À travers ce projet, nous souhaitons offrir une expérience culinaire unique en proposant des recettes délicieuses, équilibrées et spécialement conçues pour répondre aux besoins des personnes souffrant de diabète. Notre site est le fruit de nombreuses recherches et tests, et nous espérons pouvoir vous inspirer à adopter un mode de vie sain sans compromettre le plaisir de manger.</p>
        </div>
        <div class="col50">
            <div class="img">
                <img src="./images/healthy5.jpg" alt="image">
            </div>
        </div>
    </div>
</section>

<section class="menu" id="menu">
    <div class="titre">
        <h2 class="titre-texte"><span>M</span>enu</h2>
    </div>
    <div class="best" style="width:25rem; margin-left:60px; font-weight:600; font-size: x-large; margin-top: 10px; border-bottom: .8px solid;">Nos Meilleures recettes</div>
    <div id="recipes-container"></div>

    <script>
        function displayRecipes(recipes) {
            var recipesContainer = document.getElementById("recipes-container");
            recipesContainer.innerHTML = "";

            if (recipes.length > 0) {
                for (var i = 0; i < recipes.length; i++) {
                    var recipe = recipes[i];
                    var recipeElement = document.createElement("div");
                    recipeElement.innerHTML = "<h3>" + recipe.nom_recette + "</h3><p>" + recipe.description_recette + "</p>";
                    recipesContainer.appendChild(recipeElement);
                }
            } else {
                var noRecipesMessage = document.createElement("p");
                noRecipesMessage.textContent = "Aucune recette disponible pour cette catégorie.";
                recipesContainer.appendChild(noRecipesMessage);
            }
        }

        function getRecipes() {
            $.ajax({
                url: 'get_recipes.php', // Remplace par l'URL de ton script pour récupérer les recettes
                method: 'GET',
                dataType: 'json',
                success: function (recipes) {
                    displayRecipes(recipes);
                },
                error: function (xhr, status, error) {
                    console.log('Une erreur s\'est produite lors de la récupération des recettes.');
                }
            });
        }

        // Appeler la fonction pour récupérer les recettes au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            getRecipes();
        });
    </script>
</section>

<section class="expert" id="expert">
    <div class="titre">
        <h2 class="titre-texte">Nos <span>E</span>xperts</h2>
        <p>Dans cette session nous vous présentons nos meilleurs experts de cuisine pour recettes à faible teneur en sucre.</p>
    </div>
    <div class="contenu">
        <div class="box">
            <div class="imbox">
                <img src="./images/equipe1.jpg" alt="">
            </div>
            <div class="text">
                <h3>Franck Melin</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="./images/equipe2.jpg" alt="">
            </div>
            <div class="text">
                <h3>Benoit Largaut</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="./images/equipe3.jpg" alt="">
            </div>
            <div class="text">
                <h3>Issam Aissi</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="./images/equipe4.jpg" alt="">
            </div>
            <div class="text">
                <h3>Bernard Melissa</h3>
            </div>
        </div>
    </div>
</section>

<section class="temoignage" id="temoignage">
    <div class="titre blanc">
        <h2 class="titre-texte">Que Disent Nos <span>C</span>lients</h2>
        <p>On vous présente ici plusieurs avis de nos clients !</p>
    </div>
    <div class="contenu">
        <div class="box">
            <div class="imbox">
                <img src="./images/t1.jpeg" alt="">
            </div>
            <div class="text">
                <p>"J'ai récemment découvert ce site pour diabétiques et je suis extrêmement satisfait de l'expérience globale. En tant que personne atteinte de diabète de type 2, je recherche toujours des ressources fiables pour m'aider à gérer ma condition. Ce site a vraiment dépassé mes attentes."</p>
                <h3>Amine Matue</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="./images/t2.jpg" alt="">
            </div>
            <div class="text">
                <p>"La facilité de navigation et la convivialité du site m'ont impressionné. Les différentes sections sont bien organisées, ce qui facilite la recherche d'informations spécifiques. De plus, le design est attrayant et moderne."</p>
                <h3>Emine Armant</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="./images/t3.jpg" alt="">
            </div>
            <div class="text">
                <p>"Je recommande vivement ce site à toute personne cherchant des ressources fiables pour gérer le diabète. C'est un véritable atout pour la communauté diabétique."</p>
                <h3>Riba Armenin</h3>
            </div>
        </div>
    </div>
</section>

<section class="contact" id="contact">
    <div class="titre noir">
        <h2 class="titre-text"><span>C</span>ontact</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
    </div>
    <div class="contactform">
        <h3>Envoyer un message</h3>
        <div class="inputboite">
            <input type="text" placeholder="Nom">
        </div>
        <div class="inputboite">
            <input type="text" placeholder="Email">
        </div>
        <div class="inputboite">
            <textarea placeholder="Message"></textarea>
        </div>
        <div class="inputboite">
            <input type="submit" value="Envoyer">
        </div>
    </div>
</section>

<div class="copyright">
    <p>Site pour diabétiques 2023 <a href="#">Sekher Ghenima et Sfihi Anis</a> projet de fin d'études licence 2023</p>
</div>

<script type="text/javascript">
    window.addEventListener('scroll', function(){
        const header = document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0);
    });

    function toggleMenu(){
        const menuToggle = document.querySelector('.menuToggle');
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('active');
        menuToggle.classList.toggle('active');
    }
</script>

</body>
</html>
</body>
</html>
