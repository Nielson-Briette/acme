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
        <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?> | Acme, Inc.</title>
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
           <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>
           
                <form method="post" action="/products/">
                    <fieldset>
                        
                        <label>Product Name</label><br>
                        <input type="text" readonly name="prodName" id="prodName"
                            <?php if(isset($prodName)){ echo "value='$prodName'"; } 
                        elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>><br>
                        
                        <label>Description</label><br>
                        <textarea name="prodDesc" readonly id="prodDesc">
                            <?php if(isset($prodDesc)){ echo $prodDesc; }
                        elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }?>
                        </textarea>
                        
                        <label>&nbsp;</label>
                        <input type="submit" name="submit" value="Delete Product">
                        
                        <input type="hidden" name="action" value="deleteProd">
                        <input type="hidden" name="prodId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
                        <p>Confirm Product Deletion. The delete is permanent.</p>
                        
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