<html>
    <head>
        <title>User Panel</title>
    </head>
    <body>

<?php
    include('HeadFoot.php');
    include('dbManage/db_Connect.php');

    session_start();

    $usrname = $_POST['Username'];
    $password = $_POST['Password'];

    if ($usrname && $password) {
        
        try {
            $usrTable = db_Connect();
            $flag = $usrTable -> query("select * from usrTable where Username = '".$usrname."' and Password = sha1('".$password."')");
            if (!$flag) {
                throw new Exception('Database Error, Please try it later!');
            }

            if ($flag -> num_rows > 0) {
                html_common_header();
		echo '<br />';
                echo 'Log in Successfully!';
                html_common_footer();

            } else {
                throw new Exception('Log in Failed, Please try it later!');
            }
        } catch (exception $except) {
        	html_common_header();
		echo '<br />';
        	echo $except -> getMessage().'<br /><br />Redirecting...';
        	html_common_footer();
?>
	<script>
	function jump() {
		window.setTimeout("window.location.href='index.php'",5000); 
	}
	jump();
	</script>
<?php


        }
     }
    

?>

 </body>
</html>
