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
                   <!--php code if message is set-->
                  <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <form action="../products/index.php?action=addNewProduct" method="post">
                    <h1>Add New Product</h1>
                    <div class="field">
                        <label for="invName">Inventory Name</label>
                        <input type="text" id="" name="invName" required>
                    </div>
                       <div class="field">
                        <label for="invDescription">Description</label>
                        <input type="text" id="" name="invDescription" required>
                    </div>
                       <div class="field">
                        <label for="invImage">Image</label>
                        <input id="image" type="image"
                               src="/images/no-image.png">
                    </div>
                       <div class="field">
                        <label for="invThumbnail">Thumbnail</label>
                        <input type="text" id="" name="invThumbnail" required>
                    </div>
                       <div class="field">
                        <label for="invPrice">Price</label>
                        <input type="text" id="" name="invPrice" required>
                    </div>
                       <div class="field">
                        <label for="invStock">Stock</label>
                        <input type="text" id="" name="invStock" required>
                    </div>
                       <div class="field">
                        <label for="invSize">Size</label>
                        <input type="text" id="" name="invSize" required>
                    </div>
                       <div class="field">
                        <label for="invWeight">Weight</label>
                        <input type="text" id="" name="invWeight" required>
                    </div>
                       <div class="field">
                        <label for="invLocation">Location</label>
                        <input type="text" id="" name="invLocation" required>
                    </div>
                       <div class="field">
                        <label for="categoryId">Category Id</label>
                        <input type="text" id="" name="categoryId" required>
                    </div>
                       <div class="field">
                        <label for="invVendor">Vendor</label>
                        <input type="text" id="" name="invVendor" required>
                    </div>
                         <div class="field">
                        <label for="invStyle">Style</label>
                        <input type="text" id="" name="invStyle" required>
                    </div>
                    <div>
                        <button class="field-button">Submit</button>
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
