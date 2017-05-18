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
                <!--end php-->
                <form method="post" action="/accounts/index.php">
                        <h1>Acme Registration</h1>
                        <p> All fields required </p>
                        <label>
                            First name:<br>
                            <input type="text" name="firstname" id="firstname">
                            <br>
                        </label>

                        <label>
                            Last name:<br>
                            <input type="text" name="lastname" id="lastname">
                            <br>
                        </label>

                        <label>
                            Email address:<br>
                            <input type="email" name="email" id="email">
                            <br>
                        </label>

                        <label>
                            Password:<br>
                            <input type="password" name="password" id="password">
                        </label>
                        <label>
                            <br>
                            <input type="submit" name="submit" class="field-button" value="Register">
                            <!--                            <!-- Add the action name - value pair -- >-->
                            <input type="hidden" name="action" value="register">
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


