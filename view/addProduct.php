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
                        <label>Category</label><br>
                        <?php echo $catList; ?><br>
                        <label>Product Name</label><br>
                        <input type='text' name='invName' value="" required><br>
                        <label>Description</label><br>
                        <input type="text" name="invDescription" required><br>
                        <label>Image</label><br>
                        <input type="text" name="invImage" value="/images/no-image.png" required><br>
                        <label>Thumbnail</label><br>
                        <input type="text" name="invThumbnail" required><br>
                        <label>Price</label><br>
                        <input type="text" name="invPrice" required><br>
                        <label>Stock</label><br>
                        <input type="text" name="invStock" required><br>
                        <label>Size</label><br>
                        <input type="text" name="invSize" required><br>
                        <label>Weight</label><br>
                        <input type="text" name="invWeight" required><br>
                        <label>Location</label><br>
                        <input type="text" name="invLocation" required><br>
                        <label>Vendor</label><br>
                        <input type="text" name="invVendor" required><br>
                        <label>Style</label><br>
                        <input type="text" name="invStyle" required><br><br>
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
