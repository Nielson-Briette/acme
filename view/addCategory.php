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
                   <!--php code if message is set-->
                  <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <form action="../products/index.php?action=addNewCategory" method="post">
                    <h1>Add New Category</h1>
                    <div class="field">
                        <label for="categoryname">Name</label>
                        <input type="text" id="categoryid" name="categoryname" required>
                    </div>
                    <div>
                        <button class="field-button">Submit</button>
                         <!--<input type="hidden" name="action" value="register">-->
                    </div>
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
