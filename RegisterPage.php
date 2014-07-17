<?php
    require('HeadFoot.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo "Register";?></title>
    </head>
    <body>
        <?php
            html_common_header();
        ?>

        <form action="Register.php" method="post">
        Username:  <input type="text" name="Username"><br /> <br />
        Password:  <input type="password" name="Password"><br /><br />
        Confirmed: <input type="password" name="Confirmed"><br /><br />
        <input type="submit" value="Register">
        </form>
        <?php
             html_common_footer();
        ?>
        
    </body>
</html>
