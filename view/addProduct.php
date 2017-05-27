<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title>Acme| Add Product</title>
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
           <h1>Add a new product here:</h1>
                <?php
                if (isset($message)) {
                echo $message;
                }
                ?>
                <form action="/products/index.php?action=addNewProduct" method="post">
                    <fieldset>
                        <label for="categoryId">Category</label><br>
                        <?php echo $catList; ?><br>
                        <label for ="invName">Product Name</label><br>
                        <input type='text' name='invName' value="" required><br>
                        <label for="invDescription">Description</label><br>
                        <input type="text" name="invDescription" required><br>
                        <label for ="invImage">Image</label><br>
                        <input type="text" name="invImage" value="/images/no-image.png" require><br>
                        <label for="invThumbnail">Thumbnail</label><br>
                        <input type="text" id="" name="invThumbnail" required><br>
                        <label for="invPrice">Price</label><br>
                        <input type="text" id="" name="invPrice" required><br>
                        <label for="invStock">Stock</label><br>
                        <input type="text" id="" name="invStock" required><br>
                        <label for="invSize">Size</label><br>
                        <input type="text" id="" name="invSize" required><br>
                        <label for="invWeight">Weight</label><br>
                        <input type="text" id="" name="invWeight" required><br>
                        <label for="invLocation">Location</label><br>
                        <input type="text" id="" name="invLocation" required><br>
                        <label for="invVendor">Vendor</label><br>
                        <input type="text" id="" name="invVendor" required><br>
                        <label for="invStyle">Style</label><br>
                        <input type="text" id="" name="invStyle" required><br><br>
                        <button class="field-button" type="submit">Submit</button>
                    </fieldset>
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
