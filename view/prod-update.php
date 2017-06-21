<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/index.php');
 exit;
}
?>
<?php
// Build the categories option list
$catList = '<select name="catType" id="catType">';
$catList .= "<option>Choose a Category</option>";
foreach ($categoriesAndIds as $catAndId) {
    $catList .= "<option value='$catAndId[categoryId]'";
    if(isset($catType)){
    if($catAndId['categoryId'] === $catType){
      $catList .= ' selected ';
  }
} elseif (isset ($prodInfo['categoryId'])) {
    if($catAndId['categoryId'] === $prodInfo['categoryId']){
       $catList .= ' selected '; 
    }
}
    $catList .= ">$catAndId[categoryName]</option>";
}
$catList .= "</select>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($prodName)) { echo $prodName; }?> Acme, Inc</title>
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
           <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($prodName)) { echo $prodName; }?> I </h1>
           <p>Modify a new product here:</p>
                <?php
                if (isset($message)) {
                echo $message;
                }
                ?>
                <form action="/acme/products/index.php?action=updateProd" method="post">
                    <fieldset>
                        <label>Category</label><br>
                        <?php echo $catList; ?> <br>
                        
                        <label>Product Name</label><br>
                        <input type="text" name="prodName" id="prodName" required 
                            <?php if(isset($prodName)){ echo "value='$prodName'"; } 
                        elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>><br>
                        
                        <label>Description</label><br>
                        <textarea name="prodDesc" id="prodDesc" required>
                            <?php if(isset($prodDesc)){ echo $prodDesc; }
                        elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }?>
                        </textarea>
                        
                        <label>Image</label><br>
                        <input type="text" name="prodImage" id="prodImage" value="/acme/images/no-image.png" required 
                            <?php if(isset($prodImage)){echo "value='$prodImage'";} 
                        elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; }?>><br>
                        
                        <label>Thumbnail</label><br>
                        <input type="text" name="prodThumbnail" id="prodThumbnail" required 
                            <?php if(isset($prodThumbnail)){echo "value='$prodThumbnail'";} 
                        elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; }?>><br>
                        
                        <label>Price</label><br>
                        <input type="number" name="prodPrice" id="prodPrice" required 
                            <?php if(isset($prodPrice)){echo "value='$prodPrice'";} 
                        elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; }?>><br>
                        
                        <label>Stock</label><br>
                        <input type="number" name="prodStock" id="prodStock" required
                            <?php if(isset($prodStock)){echo "value='$prodStock'";} 
                        elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; }?>><br>
                        
                        <label>Size</label><br>
                        <input type="number" name="prodSize" id="prodSize" required 
                            <?php if(isset($prodSize)){echo "value='$prodSize'";} 
                        elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; }?>><br>
                        
                        <label>Weight</label><br>
                        <input type="number" name="prodWeight" id="prodWeight" required 
                            <?php if(isset($prodWeight)){echo "value='$prodWeight'";} 
                        elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; }?>><br>
                        
                        <label>Location</label><br>
                        <input type="text" name="prodLocation" id="prodLocation" required 
                            <?php if(isset($prodLocation)){echo "value='$prodLocation'";} 
                        elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; }?>><br>
                        
                        <label>Vendor</label><br>
                        <input type="text" name="prodVendor" id="prodVendor" required 
                            <?php if(isset($prodVendor)){echo "value='$prodVendor'";} 
                        elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; }?>><br>
                        
                        <label>Style</label><br>
                        <input type="text" name="prodStyle" id="prodStyle" required 
                            <?php if(isset($prodStyle)){echo "value='$prodStyle'";} 
                        elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; }?>><br>
                        
                        <label>&nbsp;</label>
                        <input type="submit" name="submit" value="Update Product">
                        
                        <input type="hidden" name="action" value="updateProd">
                        <input type="hidden" name="prodId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($prodId)){ echo $prodId; } ?>">
                        
                    </fieldset>
                </form>                
            </div>
        </main>

        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>