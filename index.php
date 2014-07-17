<?php
    require('HeadFoot.php');
?>

<html>
    <head>
        <title><?php echo "MealTrack"; ?></title>
    </head>
    <body>
        <?php
            html_common_header();
        ?>

        <form action = "Logged_in.php" method = "post">
        Username: <input type = "text" name = "Username"><br /> <br />
        Password: <input type = "password" name = "Password"><br /><br />
        <input type = "submit" value = "Login">
        </form>

	<a href = "RegisterPage.php">Join in now.</a>
        <?php
             html_common_footer();
        ?>
        
    </body>
</html>
