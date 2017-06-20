<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen">
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
                <h1>Template Header</h1>
    </main>
    <footer>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php';
        ?>
    </footer>
</body>
</html>
