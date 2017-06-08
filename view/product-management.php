   <?php
    if (isset($_SESSION['loggedin'])) {
            echo '<a href="/accounts/index.php?action=Logout">Logout</a></div>';
    } else {
        echo '<a href="/accounts/index.php?action=login" title="Login or Register">My Account</a>';
    }
    ?>
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
            <?php echo buildNav(); ?>
        </nav>
        <main>
            <div class="login">
                <h1>Product Management</h1>
                <p> Welcome to the product management page. Please choose an option below: </p>
                <ul>
                    <!--//Link to the controller that will trigger the delivery of the add category view.-->
                    <li><a href="../products/index.php?action=addCategory" title="add category">Add new Category</a></li>
                    <!--Link to the controller that will trigger the delivery of the add category view.-->
                    <li><a href="../products/index.php?action=addProduct" title="add a new product">Add new Product</a> </li>
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
