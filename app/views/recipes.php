<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Affichage des recettes</title>
    <link rel="stylesheet" type="text/css" href="../public/css/sty.css">
</head>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
       
    body {
        font-family: Poppins;
    }header{
    font-weight: 100;
    position: fixed;
    width: 100%;
    top: 0%;
    left: 0%;
    padding: 20px 10px;
    z-index: 1;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    transition: 0.5s;
    margin-bottom: 20px;
    /*background-color: #fff;
    border-bottom: #fff;*/
    height: 70px;
}

.logo{
    color: black;
    font-family: Poppins;
    font-size: 2em;
    text-decoration: none;
    font-weight: 400;
}

.navbar{
    display: flex;
    position: relative;
}
.navbar li{
    list-style: none;
}
.navbar a{
    color: black;
    text-decoration: none;
    margin-left: 30px;
    font-family: Poppins;
}



header .navbar li a:hover{
    color: black;
    border-bottom: 2px solid black;
}
#menu-filter {
    position: absolute;
    background: #f9f9f9;
    padding: 10px;
    border: 1px solid #ddd;
    z-index: 1;
    top: 100%;
    left: 0;
    width: 200px;
    height:250px;
    margin-left: 30%;
    display: none;
}

#menu-filter ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#menu-filter li {
    margin-bottom: 5px;
}

#menu-filter a {
    text-decoration: none;
    color: #333;
}

#menu-filter a:hover {
    color: #000;
}


    .recipes{
 
 position: relative;
 display: block;
 grid-template-columns: 300px 600px;
 border-radius: 5px;
 margin-left: 200px;
 margin-right: 200px;

 
 
}

.recipe-image img {
     width: 400px;
     height: 100%;
     
  
}.recipe{
 display:flex;
 margin-left: 100px;
 margin-top: 170px;
 margin-bottom: 70px;
 box-sizing: content-box;

}
.like-button {
  margin-left: 90%;
  margin-top: 1px;
  right: 15px;
  background: none;
  border: none;
  top: 0;
  cursor: pointer;
  transition: transform 0.3s ease; /* Ajoute une transition de 0.3 seconde avec une courbe d'accélération */
}

.like-button i {
  font-size: 30px;
  color: black; /* Couleur du cœur vide */}

.like-button.liked i {
  color: black; 
  transform: scale(1.2); /* Applique une mise à l'échelle de 1.2 (agrandissement) au clic */
}



 .recipe-image {
    width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  filter:brightness(.9) saturate(1) contrast(1);
 }.card-box {
    width: 350px;
    height: 550px;
    border: 2px solid #ccc;
  border-radius: 8px;
  overflow: hidden;}

 .recipe-content {
   flex: 1 1 auto;
 }.block{
   width: 600px;
    max-width: 600px;
   border-radius: 8px;
   box-shadow: 0 15px 20px;

 }.recipe-title{
   font-weight: 700;
   margin-left:70px;
   margin-right: 10px;
   font-size: large;
   margin-top: 20px;
 }
 .recipe-steps{
   margin-left: 25px;
   font-size: small;
   margin-bottom: 20px;
 }.recipe-info{
   margin-left: 20px;
 }
 .recipe-ingredients{
   margin-left: 25px;
   font-size: small;

 }.recipe-subtitle{
   font-size: medium;
 }

    </style>
<body>
    <div class="recipes-container">
        <div id="recipes">
            <?php foreach ($recipes as $recipe): ?>
                <div class="recipe">
                    <div class="card-box">
                        <div class="recipe-image">
                            <img src="/public/images/<?= $recipe['image'] ?>" alt="Recipe Image">
                        </div>
                    </div>
                    <div class="block">
                        <h2 class="recipe-title"><?= $recipe['nom_recette'] ?></h2>
                        <button class="like-button" data-recipe-id="<?= $recipe['id_recette'] ?>" onclick="likeRecipe(<?= $recipe['id_recette'] ?>)">
                            <i class="fas fa-heart"></i> J'aime
                        </button>
                        <div class="recipe-info">
                            <span class="recipe-portion"><?= $recipe['portion'] ?></span>
                        </div>
                        <div class="recipe-steps">
                            <h3 class="recipe-subtitle">Étapes :</h3>
                            <p class="recipe-text"><?= $recipe['etapes'] ?></p>
                        </div>
                        <div class="recipe-ingredients">
                            <h3 class="recipe-subtitle">Ingrédients :</h3>
                            <ul class="recipe-list">
                                <?php foreach ($recipe['ingredients'] as $ingredient): ?>
                                    <li class="recipe-item"><?= $ingredient['quantite'] . ' ' . $ingredient['unite'] . ' ' . $ingredient['nom_ingredient'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function likeRecipe(recipeId) {
            // Récupérer le bouton "J'aime" correspondant à l'ID de la recette
            var likeButton = document.querySelector('.like-button[data-recipe-id="' + recipeId + '"]');
            console.log('J\'aime la recette avec l\'ID : ' + recipeId);
        }
    </script>
</body>
</html>
