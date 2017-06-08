<img src="/images/site/logo.gif" alt="logo for my site">   
<div id="tools">   
    <?php
    if (isset($cookieFirstname)) {
        echo "<span>Welcome $cookieFirstname</span>";
    }
    ?>
    
    <?php
    if (isset($_SESSION['loggedin'])) {
        echo '<div id="logout"><a href="/accounts/index.php?action=Logout">Logout</a></div>';
    } else {
        echo '<a href="/accounts/index.php?action=login" title="Login or Register">My Account</a>';
    }
    ?>

</div>
      


