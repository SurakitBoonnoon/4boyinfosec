<?php
	include 'connected.php';
	header("Access-Control-Allow-Origin: *");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}

if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}

if (isset($_GET)) {

	$n=50; 
		function getName($n) { 
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; 
			$randomString = ''; 
		  
			for ($i = 0; $i < $n; $i++) { 
				$index = rand(0, strlen($characters) - 1); 
				$randomString .= $characters[$index]; 
			} 
		  
			return $randomString; 
		}
	 $randomtoken = getName($n);













	if ($_GET['isAdd'] == 'true') {


		$name = $_GET['name'];
		$lastname = $_GET['lastname'];
		$email = $_GET['email'];
		$username = $_GET['username'];
		$password = $_GET['password'];
		$token = $_GET['token'];
		$phone = $_GET['phone'];
		
							
		$sql = "INSERT INTO `member`(`id`, `name`, `lastname`, `email`, `username`, `password`, `token`, `phone`, `user_status`, `point`) VALUES (Null,'$name','$lastname','$email','$username','$password','$randomtoken','$phone','member','0')";





		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome";
   
}
	mysqli_close($link);
?>

