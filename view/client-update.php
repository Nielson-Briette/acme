<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location:/index.php');
    exit;
}
$clientData=$_SESSION['clientData'];
?>
<!DOCTYPE HTML>
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
            include $_SERVER['DOCUMENT_ROOT'] . '../common/header.php';
            ?>
        </header>
        <nav class="nav">
            <?php echo buildNav(); ?>
        </nav>
        <main>
             <?php
                if  (isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset ($_SESSION['message']);
                }
                ?>
              <h1>Update Account</h1><br>
                        <p>Please use the field below to make any changes to your account info.</p>
            <div id="form">
                <form action="/accounts/index.php?action=updateAccount" method="post">
                    <fieldset>
                        <label>First Name</label><br>
                        <input type="text" name="upfirstName" id="upfirstName" required
                        <?php if (isset($upfirstName)) {echo "value='$upfirstName'";}
                        elseif(isset($clientData['clientFirstname'])) {echo "value='$clientData[clientFirstname]'"; }?>><br>

                        <label>Last Name</label><br>
                        <input type="text" name="uplastName" id="uplastName" required
                       <?php if (isset($uplastName)) {echo "value='$uplastName'";}
                        elseif(isset($clientData['clientLastname'])) {echo "value='$clientData[clientLastname]'"; }?>><br>
                        
                        <label>Email</label><br>
                        <input type="text" name="upEmail" id="upEmail" required
                        <?php if (isset($upEmail)) {echo "value='$upEmail'";}
                        elseif(isset($clientData['clientEmail'])) {echo "value='$clientData[clientEmail]'"; }?>><br>
                        
                        <input type="submit" name="submit" value="Update Information">
                        <input type="hidden" name="updateId" value="<?php if (isset($clientData['clientId'])) {echo $clientData['clientId'];} elseif (isset($clientId)) {echo $clientId;} ?>">
                    </fieldset>
                </form>                
            </div>

            <div id="form2">
                <form action="/accounts/index.php?action=updatePassword" method="post">
                    <fieldset>
                        <h1>Change Password</h1><br>
                        <p> Use the form field to update your password. </p> <br>
                          <label>
                            Password:<br>
                            <span><i>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</i></span>
                            <input type="password" name="updatePass" id="updatePass" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        </label>
                        <label>
                        <input type="submit" name="submit" value="Update Password">
                        <input type="hidden" name="action" value="updatePassword">
                        </label>
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