<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/contact.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'components/header.php'; ?>

    <main>
        <h1>Contact Us</h1>
        <p>We'd love to hear from you!</p>

        <form action="contact.php" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required size="40">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required size="40">
            </div>

            <div>
                <label for="message">Message</label>
                <textarea id="message" name="message" required cols="40" rows="5"></textarea>
            </div>
           
            <input type="submit" value="Send">
        </form>
    </main>

    <?php include_once 'components/footer.php'; ?>
</body>
</html>