
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title>Acme| Home</title>
    </head>
    <body>
        <header>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php';
            ?>
        </header>
        <div>
            <nav class="nav">
                <?php echo $navList; ?>
            </nav>
            <main>
                <h1>Acme Login</h1>
                <body>
                    <form>
                        Email address:<br>
                        <input type="text" name="email">
                        <br>
                        Password<br>
                        <input type="text" name="password">
                        <input type="submit" value="Submit">
                    </form>
                </body>
            </main>
            <footer>
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php';
                ?>
            </footer>
    </body>
</html>
