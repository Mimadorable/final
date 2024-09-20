<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Affichage des recettes</title>
    <link rel="stylesheet" type="text/css" href="/public/css/sty.css">
</head>
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
