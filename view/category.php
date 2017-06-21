<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title><?php echo $type; ?> Products | Acme, Inc.</title>
    </head>
    <body>
        <header>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php';
            ?>
        </header>
        <nav class="nav">
            <?php echo buildNav(); ?>
        </nav>
        <main>
            <h1><?php echo $type; ?> Products</h1>
            <?php if(isset($message)){ echo $message; } ?>
            <?php if(isset($prodDisplay)){ echo $prodDisplay; } ?>
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>
