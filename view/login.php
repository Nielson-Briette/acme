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
            include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php';
            ?>
        </header>
        <nav class="nav">
            <?php echo buildNav(); ?>
        </nav>
        <main>
            <div class="login">
                <!--php code if message is set-->
                  <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <!--end php-->
                <form action="../accounts/index.php?action=login" method="post">
                    <h1>Acme Login</h1>
                    <div class="field">
                        <label for="name">Email:</label>
                        <input type="email" id="name" name="username" <?php if(isset($email)){echo "value='$email'";} ?> required>
                    </div>
                    <div class="field">
                        <label for="pwd">Password:</label>
                        <span><i>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</i></span>
                        <input type="password" name="password" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    </div>
                    <div>
                        <button class="field-button">Login</button>
                         <input type="hidden" name="action" value="Login">
                    </div>
                    <div>
                        <br>
                        <p>If you have not yet registered, please click the link below to create an account</p>
                        <!--pass a name - value pair that tells the controller to deliver the registration view.-->
                        <a class="field-button" href='/accounts/index.php?action=Register'>Create Account</a>
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
