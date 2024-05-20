<?php
  
    require_once "db/pdo.php";

    try {
         if(isset($_POST['recipe-name'], $_POST['servings'], $_POST['prep-time'], $_POST['cook-time'], $_POST['total-time'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'])) {

            $sql = 'INSERT INTO recipes (recipeName, servings, prepTime, cookTime, totalTime, description, ingredients, instructions) VALUES (:recipeName, :servings, :prepTime, :cookTime, :totalTime, :description, :ingredients, :instructions)';

            $stmt = $pdo->prepare($sql);

            $stmt->execute(array(
                ':recipeName' => $_POST['recipe-name'],
                ':servings' => $_POST['servings'],
                ':prepTime' => $_POST['prep-time'],
                ':cookTime' => $_POST['cook-time'],
                ':totalTime' => $_POST['total-time'],
                ':description' => $_POST['description'],
                ':ingredients' => $_POST['ingredients'],
                ':instructions' => $_POST['instructions']
            ));

            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        }
    } catch (Exception $ex ) {
        echo("Internal error, please contact support");
        error_log("error4.php, SQL error=".$ex->getMessage());
        return;
    }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/createRecipe.css">
    <title>Document</title>
</head>
<body>

    <?php include_once 'components/header.php'; ?>
    <main>
        <section class="content">
            <h1>Create a Recipe</h1>
            <p>
                Please fill in the form below to create a new recipe. Make sure to include all the required information..
            </p>
        </section>

        <section class="section-form">
            <form method="post">
            <div class="form-group">
                <label for="recipe-name">Recipe Name:</label>
                <input type="text" name="recipe-name" id="recipe-name" required>
            </div>
            <div class="form-group">
                <label for="servings">Servings:</label>
                <input type="number" name="servings" id="servings" required>
            </div>
            <div class="form-group">
                <label for="prep-time">Prep Time:</label>
                <input type="number" name="prep-time" id="prep-time" required>
            </div>
            <div class="form-group">
                <label for="cook-time">Cook Time:</label>
                <input type="number" name="cook-time" id="cook-time" required>
            </div>
            <div class="form-group">
                <label for="total-time">Total Time:</label>
                <input type="number" name="total-time" id="total-time" required>
            </div>
            <hr>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea rows="5" cols="30" name="description" id="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients:</label>
                <textarea rows="5" cols="30" name="ingredients" id="ingredients" required></textarea>
            </div>
            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <textarea rows="5" cols="30" name="instructions" id="instructions" required></textarea>
            </div>
            <div class="form-group">
                <input class="btn" type="submit" value="Submit">
            </div>
        </form>
        </section>

        
        
    </main>
    <?php include_once 'components/footer.php'; ?>
</body>
</html>