<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'components/header.php'; ?>

    <main>
        <section>
            <div class="main-img">
              <img src="assets/dinner.avif" alt="">
            </div>

        <div class="main-content">
            <h1>Welcome to Recipe Book</h1>
            <p>Your one-stop shop for all your recipe needs. Here, you can find a wide variety of recipes from all over the world, each with its own unique twist and flavor. Whether you're a seasoned chef or a culinary newbie, we've got you covered.</p>

            <button class="btn">View Recipes</button>
        </div>
        </section>

        <article>
            <h1>Explore Our Delicious Recipes</h1>
            <p>From classic comfort food to exotic international dishes, our collection of recipes has something for everyone. Browse through our collection, and let the flavors of the world inspire you to create something truly delicious!</p>

            <ul>
                <li class="card">
                    <div class="img-wrapper">
                       <img src="assets/carbonara.jpg" alt="Pasta recipe"> 
                    </div>
                    
                    <h2>Pasta Carbonara</h2>
                    <p>Classic Italian spaghetti dish with bacon, eggs, and parmesan cheese.</p>
                </li>
                <li class="card">
                    <div class="img-wrapper">
                        <img src="assets/tacos.jpg" alt="Tacos recipe">
                    </div>
                
                    <h2>Tacos</h2>
                    <p>Mexican dish with seasoned ground beef, lettuce, tomatoes, and cheese.</p>
                </li>
                <li class="card">
                    <div class="img-wrapper">
                        <img src="assets/pizza.jpg" alt="Pizza recipe">
                    </div>
                    <h2>Pizza</h2>
                    <p>Pizza: crispy crust, tangy tomato sauce, melted cheese &amp; toppings.</p>
                </li>
            </ul>
        </article>
        
    </main>

    <?php include_once 'components/footer.php'; ?>
    
</body>
</html>
