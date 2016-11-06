<?php 
	header("Content-type: application/json");
	require_once __DIR__ . '/dataLayer.php';

	$action = $_POST['action'];

	switch ($action) {
		case 'REGISTER': registerFunction();
			break;

		default:
			break;
	}

	function registerFunction(){
		$userName = $_POST["username"];
		$userEmail = $_POST["userEmail"];
		$userPassword = $_POST["userPassword"];
		
		$result = attemptRegistration($userName, $userEmail, $userPassword);

		if($result['status'] === 'SUCCESS'){

			session_start();
			session_destroy();
			session_start();

			$_SESSION['userName'] = $userName;
			$_SESSION['userEmail'] = $email;

			echo json_encode(array('message' => 'Registration successful' ));
		}
		else{
			header('HTTP/1.1 500 ' . $result['status']);
			die($result['status']);
		}
	}
	
 ?>