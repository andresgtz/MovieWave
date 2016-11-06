<?php
	require_once __DIR__ . '/connection.php';

	//attemptRegistration
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

	//attemptAddMovie
	function attemptAddMovie($movieTitle,$movieYear,$movieActors,$movieGenre,$movieDescription){
		$conn =connectionToDataBase();

		if($conn != null){
			$sql = "SELECT movieName FROM movies WHERE movieName = '$movieTitle'";
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				$conn -> close();
				return array('status' => 'MOVIE ALREADY EXISTS.');
			}else{
				$sql = "INSERT INTO users (movieName, movieYear, genre, description) VALUES ('$movieTitle', '$movieYear', '$movieActors', '$movieGenre', '$movieDescription')";

				if (mysqli_query($conn, $sql)){
					$conn -> close();
					return array('status' => 'SUCCESS' );
				}else{
					$conn -> close();
					return array('status' => 'COULD NOT INSERT MOVIE.' );
				}
			}
		}
	}

 ?>
