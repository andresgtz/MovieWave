<?php 
	require_once __DIR__ . '/connection.php';
	function attemptRegistration($userName, $userEmail, $userPassword){
		$conn = connectionToDataBase();

		if($conn != null){
			$sql = "SELECT username FROM users WHERE username = '$userName'";
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				$conn -> close();
				return array('status' => 'USER ALREADY EXISTS.' );

			}

			else{
				$sql = "INSERT INTO users (username, email, pass) VALUES ('$userName', '$userEmail', '$userPassword')";

				if (mysqli_query($conn, $sql)){
					$conn -> close();
					return array('status' => 'SUCCESS' );
				}else{
					$conn -> close();
					return array('status' => 'COULD NOT REGISTER USER.' );
				}
			}
		}
		else{
			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG.');
		}

	}

 ?>