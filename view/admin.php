<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title>Acme| Home</title>
    </head>
    <body>
        <header>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '../common/header.php';
            ?>
        </header>
        <nav class="nav">
            <?php echo buildNav(); ?>
        </nav>
        <main>
            <?php
                $firstname = $_SESSION['clientData']['clientFirstname'];
                $lastname = $_SESSION['clientData']['clientLastname'];
                $emailaddress = $_SESSION['clientData']['clientEmail'];
                $level = $_SESSION['clientData']['clientLevel'];

                echo "<h1>$firstname $lastname</h1>
                <ul>
                    <li>First name: $firstname</li>
                    <li>Last name: $lastname</li>
                    <li>Email: $emailaddress</li>
                    <li>Level: $level</li>
                </ul>";
                if ($level == 3){
                echo '<a href="/products/index.php?action=product-management">Products</a><br>';
                }
                ?>
        </main>

        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php';
            ?>
        </footer>
    </body>
</html>


