<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <header onclick="location.href = 'index.php';">
        <div class='header-logo'>
           <img src="assets/logo.png" alt="website logo" width="135" height="135">
           <h1 class="header-title">Recipe <span>Book</span></h1> 
        </div>
        
        <ul class="header-nav">
            <li><i class="fa-solid fa-utensils"></i><a href="createRecipe.php"> Create Recipe</a> </li>
            <li><i class="fa-solid fa-list"></i><a href="recipes.php"> Recipes</a> </li>
            <li><i class="fa-solid fa-envelope"></i><a href="contact.php"> Contact</a></li>
            <li><i class="fa-solid fa-circle-info"></i><a href="about.php"> About</a></li>
        </ul>
        
    </header>

</body>
</html>