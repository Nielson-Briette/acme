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
        <link href="/acme/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title></title>
    </head>
    <body>
        <header>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php';
            ?>
        </header>
        <div>
            <nav>
                 <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/navigation.php';
            ?>
            </nav>
            <main><h1>Server Error</h1>
                <p>Sorry, the server experienced a problem.</p>
            </main>
        </div>
        <footer>
               <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>
