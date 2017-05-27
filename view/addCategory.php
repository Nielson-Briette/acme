<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title>Acme| Category</title>
    </head>
    <body>
        <header>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php';
            ?>
        </header>
        <nav class="nav">
            <?php echo $navList; ?>
        </nav>
        <main>
            <div class="login">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <h1>Add Category</h1>
                <form action="/products/index.php?action=addNewCategory" method="post">
                    <input type="text" name="categoryName" />
                    <br>
                    <button type='submit' >Add Category</button>
                </form>
            </div>
        </main>

        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php';
            ?>
        </footer>
    </body>
</html>
