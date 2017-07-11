<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/acme/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title><?php echo $prodId; ?> Products | Acme, Inc.</title>
    </head>
    <body>
        <header>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php';
            ?>
        </header>
        <nav class="nav">
            <?php echo buildNav(); ?>
        </nav>
        <main>
            <!--<h1><?php echo $products[$prodName] ?></h1>-->
             <p>Product reviews can be found at the bottom of the page.</p>
            <?php if(isset($message)){ echo $message; } ?>
            <?php if(isset($prodDetail)){ echo $prodDetail; } ?>
            <?php if(isset($thumbnails)) {echo $thumbnails; } ?>
           
            <h2>Customer Reviews</h2>
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          echo " <p>Reviews can be added upon <a href='/acme/view/login.php'>login</a></p> ";
          }
          else {
             echo " <form action='/acme/accounts/index.php?action='Login' method='post'>
                    <input type='text' />
                    <br>
                    <button type='submit' >Add Review</button>
            </form>";
            }
            ?>
            
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>
