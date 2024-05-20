<?php

require_once "db/pdo.php";

try {
    $stmt = $pdo->query("SELECT * FROM recipes");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo("Internal error, please contact support");
    error_log("error4.php, SQL error=" . $ex->getMessage());
    return;
}

try {
    $stmt = $pdo->query("SELECT * FROM recipes");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo("Internal error, please contact support");
    error_log("error4.php, SQL error=" . $ex->getMessage());
    return;
}

try {
    if (isset($_POST['save_recipe'])) {
        // Update logic
        $sql = "UPDATE recipes SET recipeName = :recipeName, servings = :servings, prepTime = :prepTime, cookTime = :cookTime, totalTime = :totalTime, ingredients = :ingredients, description = :description, instructions = :instructions WHERE id = :recipe_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':recipe_id' => $_POST['recipe_id'],
            ':recipeName' => $_POST['recipeName'],
            ':servings' => $_POST['servings'],
            ':prepTime' => $_POST['prepTime'],
            ':cookTime' => $_POST['cookTime'],
            ':totalTime' => $_POST['totalTime'],
            ':ingredients' => $_POST['ingredients'],
            ':description' => $_POST['description'],
            ':instructions' => $_POST['instructions']
        ));
        header("Location: recipes.php");
        exit();
    } elseif (isset($_POST['recipe_id'])) {
        // Delete logic
        $sql = "DELETE FROM recipes WHERE id = :recipe_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':recipe_id' => $_POST['recipe_id']
        ));
        header("Location: recipes.php");
        exit();
    } elseif (isset($_POST['edit_recipe_id'])) {
        // Fetch the recipe to edit
        $stmt = $pdo->prepare("SELECT * FROM recipes WHERE id = :recipe_id");
        $stmt->execute(array(
            ':recipe_id' => $_POST['edit_recipe_id']
        ));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (Exception $ex) {
    echo("Internal error, please contact support");
    error_log("error4.php, SQL error=" . $ex->getMessage());
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/recipes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <?php include_once 'components/header.php'; ?>

    <main>
        <?php if (isset($editRow)): ?>
            <div class="edit-form">
                <form method="post">
                    <input type="hidden" name="recipe_id" value="<?= $editRow['id'] ?>">
                    <label for="recipeName">🍕 Recipe Name</label>
                    <input type="text" name="recipeName" value="<?= $editRow['recipeName'] ?>" required>
                    <label for="servings"><i class="fa-solid fa-star"></i> Servings</label>
                    <input type="number" name="servings" value="<?= $editRow['servings'] ?>" required>
                    <label for="prepTime"><i class="fa-regular fa-clock"></i> Prep Time</label>
                    <input type="text" name="prepTime" value="<?= $editRow['prepTime'] ?>" required>
                    <label for="cookTime"><i class="fa-regular fa-clock"></i> Cook Time</label>
                    <input type="text" name="cookTime" value="<?= $editRow['cookTime'] ?>" required>
                    <label for="totalTime"><i class="fa-regular fa-clock"></i> Total Time</label>
                    <input type="text" name="totalTime" value="<?= $editRow['totalTime'] ?>" required>
                    <label for="ingredients"><i class="fa-solid fa-utensils"></i> Ingredients</label>
                    <textarea name="ingredients" required><?= $editRow['ingredients'] ?></textarea>
                    <label for="description"><i class="fa-regular fa-comments"></i> Description</label>
                    <textarea name="description" required><?= $editRow['description'] ?></textarea>
                    <label for="instructions"><i class="fa-solid fa-book"></i> Instructions</label>
                    <textarea name="instructions" required><?= $editRow['instructions'] ?></textarea>
                    <button type="submit" class="btn" name="save_recipe">Save</button>
                    <button type="button" class="btn" onclick="window.location.href='recipes.php'">Cancel</button>
                </form>
            </div>
        <?php else: ?>
            <?php foreach ($rows as $row): ?>
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">🍕<?= $row['recipeName'] ?></h1>
                        <div class="card-actions">
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="edit_recipe_id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="recipe_id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                    <ul class="card-details">
                        <li><i class="fa-solid fa-star"></i> Servings: <span><?= $row['servings'] ?></span></li>
                        <li><i class="fa-regular fa-clock"></i> Prep Time: <span> <?= $row['prepTime'] ?></span></li>
                        <li><i class="fa-regular fa-clock"></i> Cook Time: <span><?= $row['cookTime'] ?></span></li>
                        <li><i class="fa-regular fa-clock"></i> Total Time: <span><?= $row['totalTime'] ?></span></li>
                    </ul>
                    <ul class="card-instructions">
                        <li>
                            <h2><i class="fa-solid fa-utensils"></i> Ingredients:</h2>
                            <p><?= $row['ingredients'] ?></p>
                        </li>
                        <li>
                            <h2><i class="fa-regular fa-comments"></i> Description:</h2>
                            <p><?= $row['description'] ?></p>
                        </li>
                        <li>
                            <h2><i class="fa-solid fa-book"></i> Instructions:</h2>
                            <p><?= $row['instructions'] ?></p>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>

    <?php include_once 'components/footer.php'; ?>
</body>
</html>
