<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/acme/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title>Acme| Home</title>
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
            <h1>Template Header</h1>
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>
