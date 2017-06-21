<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title>Acme| Home</title>
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
            <h1>Welcome to Acme!</h1>

            <div class="hero">
                <div class="acmerocket">
                    <ul>
                        <li><h2>Acme Rocket</h2></li>
                        <li>Quick lighting fuse</li>
                        <li>NHTSA approved seat belts</li>
                        <li>Mobile launch stand included</li>
                        <li><a href="/acme/images/cart/"><img id="actionbtn" alt="Add to cart button" src="/acme/images/site/iwantit.gif"></a></li>
                    </ul>
                </div>
            </div>
                      
                <div class="flexbox">
                    <div class="recipes">
                        <h3>Featured Recipes</h3>   
                        <br>
                        <figure>
                            <img src='/acme/images/recipes/bbqsand.jpg' alt='bbqsand'/>
                            <figcaption>Pulled Road Runner BBQ</figcaption>
                        </figure>
                    </div> 
                    <div class="flexrecipe"> 
                        <figure>
                            <img src='/acme/images/recipes/potpie.jpg' alt='potpie'/>
                            <figcaption>Roadrunner Pot Pie</figcaption>
                        </figure>
                    </div>
                    <div class="flexrecipe">
                        <figure>
                            <img src='/acme/images/recipes/soup.jpg' alt='soup'/>
                            <figcaption>Roadrunner Soup</figcaption>
                        </figure>
                    </div>
                    <div class="flexrecipe">
                        <figure>
                            <img src='/acme/images/recipes/taco.jpg' alt='tacos'/>
                            <figcaption>Roadrunner Tacos</figcaption>
                        </figure>

                    </div>
               
                <div class="reviews">
                    <h3>Get Dinner Rocket Reviews</h3>
                    <ul>
                           <li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
                        <li>"That thing was fast!" (4/5)</li>
                        <li>"Talk about fast delivery." (5/5)</li>
                        <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
                        <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
                    </ul>
                </div>
                     </div>
        </main>

        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>
