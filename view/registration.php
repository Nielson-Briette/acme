   <?php
    if (isset($_SESSION['loggedin'])) {
        echo '<a href="/accounts/index.php?action=Logout">Logout</a></div>';
    } else {
        echo '<a href="/accounts/index.php?action=login" title="Login or Register">My Account</a>';
    }
    ?>
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
                <form method="post" action="/accounts/index.php">
                        <h1>Acme Registration</h1>
                        <p> All fields required </p>
                        <label>
                            First name:<br>
                            <input type="text" name="firstname" id="firstname" <?php if(isset($firstname)){echo "value='$firstname'";} ?> required>
                            <br>
                        </label>

                        <label>
                            Last name:<br>
                            <input type="text" name="lastname" id="lastname" <?php if(isset($lastname)){echo "value='$lastname'";} ?> required>
                            <br>
                        </label>

                        <label>
                            Email address:<br>
                            <input type="email" name="email" id="email" <?php if(isset($email)){echo "value='$email'";} ?> required>
                            <br>
                        </label>

                        <label>
                            Password:<br>
                            <span><i>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</i></span>
                            <input type="password" name="password" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        </label>
                        <label>
                            <br>
                            <input type="submit" name="submit" class="field-button" value="Register">
                            <!--                            <!-- Add the action name - value pair -- >-->
                            <input type="hidden" name="action" value="Register">
                        </label>
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


