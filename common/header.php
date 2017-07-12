<img src="/acme/images/site/logo.gif" alt="logo for my site">   
<div id="tools">   
    <?php
    
    if(isset($_SESSION['firstname'])){
        $firstname = $_SESSION['firstname'];
        echo "<span><a href='/acme/accounts/index.php?action=admin'>Welcome $firstname </a></span>";
    }
    
    else { 
        echo"<span><a href='/acme/accounts/index.php?action=home'>Home </a></span>";
    }
    ?>
    
    <?php
    if (isset($_SESSION['loggedin'])) {
        echo '<div id="logout"><a href="/acme/accounts/index.php?action=Logout">Logout</a></div>';
    } else {
        echo '<a href="/acme/accounts/index.php?action=login" title="Login or Register">My Account</a>';
    }
    ?>

</div>
      


