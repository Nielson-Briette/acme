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
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <?php
            if (isset($prodDetail)) {
                echo $prodDetail;
            }
            ?>
            <?php
            if (isset($thumbnails)) {
                echo $thumbnails;
            }
            ?>

            <h2>Customer Reviews</h2>
            <?php if (isset($_SESSION['loggedin'])) : ?>
                <?php $firstname = $_SESSION['clientData']['clientFirstname'] ?>
                <?php $lastname = $_SESSION['clientData']['clientLastname'] ?>
                <form action="/acme/reviews/index.php" method='post'>
                    <p> Screen name: <?php echo substr("$firstname", 0, 1); ?><?php echo $lastname; ?></p>
                    <label for=“reviewText”>Write your review:</label><br>
                    <textarea name="reviewText" id=“reviewText”  rows="10" cols="60" required><?php
                        if (isset($reviewText)) {
                            echo "$reviewText";
                        }
                        ?> </textarea><br>
                    <input type="submit" name="submit" value="Add Review">
                    <input type="hidden" name="action" value="addReview">
                    <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
                    <input type="hidden" name="invId" value="<?php echo $product['invId']; ?>">
                </form>

            <?php else : ?>
                <p>Please <a href="/acme/accounts/index.php?action=login">login</a></p>
            <?php endif; ?>

            <!--display previous written reviews here-->    
            <?php if (isset($_SESSION['loggedin'])) : ?>
            <div class="login">
                <h2> Your product reviews </h2>
            
                <p><?php echo substr("$firstname", 0, 1); ?><?php echo $lastname; ?> Wrote 
                 
                    <?php
                    $clientId = $_SESSION['clientData']['clientId'];
                    $reviews = getReviewByClient($clientId);
                    $reviewsList = "<ul>";
                    foreach ($reviews as $review) {
                        if ($review['invId'] == $prodId) {
                            $reviewsList .= "<li>$review[reviewText] was written on $review[reviewDate] </li>";
                        }
                    }
                    $reviewsList .= "</ul>";
                    echo $reviewsList;
                    ?>
                    
                <?php else : ?>
                <p>Please <a href="/acme/accounts/index.php?action=login">login to see your reviews.</a></p>
            <?php endif; ?>       
            </div>

        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>
