<?php
$catList = "<select name='categoryId' id='categoryId'>";
$catList .= '<option value ="">Please Choose</option>';
foreach ($categoriesAndIds as $catAndId) {
   $catList .= "<option value='$catAndId[categoryId]'";
   if(isset($categoryId)){
   
   if($catAndId['categoryId'] === $categoryId){
     $catList .= ' selected ';
 }
}   
   $catList .= ">$catAndId[categoryName]</option>";
}
$catList .= "</select>";
?>
<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /index.php');
 exit;
}
?><!DOCTYPE html>
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
             <?php echo buildNav(); ?>         
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
                        <?php echo $catList; ?> <br>
                        <label>Product Name</label><br>
                        <input type='text' name='invName' id="invName" <?php if(isset($invName)){echo "value='$invName'";} ?> required><br>
                        <label>Description</label><br>
                        <textarea rows="5" name='invDescription' id="invDescription">
                        <?php if(isset($invDescription)){echo "value='$invDescription'";} ?>
                        </textarea>
                        <br>
                        <label>Image</label><br>
                        <input type="text" name="invImage" id="invImage" value="/images/no-image.png" <?php if(isset($invImage)){echo "value='$invImage'";} ?> required><br>
                        <label>Thumbnail</label><br>
                        <input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required><br>
                        <label>Price</label><br>
                        <input type="number" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required><br>
                        <label>Stock</label><br>
                        <input type="number" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required><br>
                        <label>Size</label><br>
                        <input type="number" name="invSize" id="invSize" <?php if(isset($invSize)){echo "value='$invSize'";} ?> required><br>
                        <label>Weight</label><br>
                        <input type="number" name="invWeight" id="invWeight" <?php if(isset($invWeight)){echo "value='$invWeight'";} ?> required><br>
                        <label>Location</label><br>
                        <input type="text" name="invLocation" id="invLocation" <?php if(isset($invLocation)){echo "value='$invLocation'";} ?> required><br>
                        <label>Vendor</label><br>
                        <input type="text" name="invVendor" id="invVendor" <?php if(isset($invVendor)){echo "value='$invVendor'";} ?> required><br>
                        <label>Style</label><br>
                        <input type="text" name="invStyle" id="invStyle" <?php if(isset($invStyle)){echo "value='$invStyle'";} ?> required><br><br>
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
