<!DOCTYPE html>
<!--// PRODUCT MANAGEMENT VIEW-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title>Acme| Products</title>
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
                <h1>Product Management</h1>
                <p> Welcome to the product management page. Please choose an option below: </p>
                <ul>
                    <!--//Link to the controller that will trigger the delivery of the add category view.-->
                    <li><a class="field-button" href='addCategory.php'>Add new Category</a></li>
                    <!--Link to the controller that will trigger the delivery of the add category view.-->
                    <li><a class="field-button" href='addProduct.php'>Add new Product</a> </li>
                </ul>
            </div>
        </main>

        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php';
            ?>
        </footer>
    </body>
</html>
