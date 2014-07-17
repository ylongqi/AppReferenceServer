<?php
function checkValue($sub_form){
	
	foreach ($sub_form as $key => $value) {
		if(!isset($key) || $value == ''){
			return false;
		}
	}

	return true;
}
?>


<html>
	<head>
		<title>Sign up</title>
	</head>
	<body>


<?php
	include('HeadFoot.php');
	include('dbManage/db_Connect.php');

	session_start();
	
	$usrname = $_POST['Username'];
	$password = $_POST['Password'];
	$passwordConfirm = $_POST['Confirmed'];

	try {
		if(!checkValue($_POST)){
			throw new Exception('Registration Form is not filled properly!');
		}
		
		if(strcmp($password, $passwordConfirm) != 0){
			throw new Exception('Password not Match!');
		}

		if(strlen($password) < 6 || strlen($passwordConfirm) > 16){
			throw new Exception('Illeagle Password!');
		}

		$db = db_Connect();
		$flag = $db -> query("select * from usrTable where Username = '".usrname."'");
		if(!$flag){
			throw new Exception("Database Error!");
		}

		if($flag -> num_rows > 0){
			throw new Exception("Exist Username, Please Choose another one!");
		}

		$flag = $db -> query("insert into usrTable values ('".$usrname."', sha1('".$password."'))");

		if(!$flag){
			throw new Exception("Database Insert Error!");
		}

		html_common_header();
		echo '<br />';
		echo 'Your Registration is Successful!';
		html_common_footer();
        } catch(Exception $except) {
		html_common_header();
		echo '<br />';
		echo $except -> getMessage();
		html_common_footer();
	}
?>

	</body>
</html>
