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

	function attemptAddComment($userName, $comment, $rating, $movie){
		$conn = connectionToDataBase();

		if($conn != null){
				$sql = "SELECT id FROM movies WHERE movieName = '$movie'";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
				$movieId = $row[0];
				$sql = "INSERT INTO comments (rate, content, username, movie_id) VALUES ('$rating', '$comment', '$userName', '$movieId')";

				if (mysqli_query($conn, $sql)){
					$conn -> close();
					return array('status' => 'SUCCESS' );
				}else{
					$conn -> close();
					return array('status' => 'COULD NOT ADD COMMENT.' );
				}
		}
	}

	function attemptGetMoviesByGenre($genre){
		$conn = connectionToDataBase();

		if($conn != null){
			$sql = "SELECT movieName, movieYear FROM movies WHERE genre = '$genre'";
			$result = $conn->query($sql);
			$arr = array();
			while($row=mysqli_fetch_array($result)){
				array_push($arr,$row[0]);
			}
			return $arr;
		}else{
			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG');
		}

	}

	function attemptGetMovieSearch($title){
		$conn = connectionToDataBase();

		if($conn != null){
			$sql = "SELECT movieName FROM movies WHERE movieName = '$title'";
			$result = $conn->query($sql);
			if($result -> num_rows > 0){
				return 1;
			}else{
				return 0;			}
		}else{
			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG');
		}

	}


	//attemptLogin
	function attemptLogin($userName, $password){
		$conn = connectionToDataBase();

		if($conn != null){
			$sql = "SELECT * FROM users WHERE username = '$userName' and pass = '$password'";
			$result = $conn->query($sql);

			if($result -> num_rows > 0){
				//start session
				session_start();
				session_destroy();
				session_start();

				$_SESSION['username'] = $userName;

				$conn->close();
				return array('status' => 'SUCCESS');
			}else{
				$conn->close();
				return array('status'=>'LOGIN UNSUCCESFUL');
			}
		}else{
			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG');
		}
	}

	function attemptUpdateAboutMe($userName,$aboutMe){
		$conn = connectionToDataBase();

		if($conn != null){
			$sql = "SELECT * FROM users WHERE username = '$userName'";
			$result = $conn->query($sql);

			if($result -> num_rows > 0){
				$sql = "UPDATE users SET aboutme='$aboutMe' WHERE username='$userName'";
				$result = $conn->query($sql);
				$conn->close();
				return array('status' => 'SUCCESS');
			}else{
				$conn->close();
				return array('status'=>'EDIT UNSUCCESFUL');
			}
		}else{
			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG');
		}
	}

	function attemptLoadAboutMe($userName){
		$conn = connectionToDataBase();

		if($conn != null){
			$sql = "SELECT username, aboutme FROM users WHERE username = '$userName'";
			$result = $conn->query($sql);

			if($resultado=$result->fetch_row()){
				$conn->close();
				return array('status' => 'SUCCESS','user' => $resultado[0], 'about' => $resultado[1]);
			}else{
				$conn->close();
				return array('status'=>'LOAD UNSUCCESFUL');
			}
		}else{
			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG');
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
				$sql = "INSERT INTO movies(movieName, movieYear, actors, genre, description) VALUES ('$movieTitle', '$movieYear', '$movieActors', '$movieGenre', '$movieDescription')";

				if (mysqli_query($conn, $sql)){
					$conn -> close();
					return array('status' => 'SUCCESS' );
				}else{
					$conn -> close();
					return array('status' => 'COULD NOT INSERT MOVIE.' );
				}
			}
		}else{
			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG');
		}
	}

	//attemptUpdateGenre
	function attemptUpdateGenre(){
		$conn = connectionToDataBase();


		if($conn != null){
			$sql = "SELECT DISTINCT genre FROM movies";
			$result = $conn->query($sql);
			$arr = array();
			while($row=mysqli_fetch_array($result)){
				//error_log(print_r($row[0],true));
				array_push($arr,$row[0]);

			}

			return $arr;

		}else{

			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG');
		}
	}

	//attemptGetMovieInfo
	function attemptGetMovieInfo($title){
		$conn = connectionToDataBase();

		if($conn != null){
			$sql = "SELECT * FROM movies WHERE movieName = '$title'";
			$result = $conn->query($sql);

			$arr = array();

			while($row = mysqli_fetch_array($result)){
				$id = $row[0];
			 	$arr =$row;
			}

			$sql = "SELECT AVG(rate) FROM comments WHERE movie_id = '$id'";
			//$sql = "SELECT AVG(id) FROM movies";
			$result = $conn->query($sql);
			$row = mysqli_fetch_array($result);
			array_push($arr,$row[0]);

			return $arr;
		}else{
			$conn -> close();
			return array('status' => 'CONNECTION WITH DB WENT WRONG');
		}
	}

	//try add favorite
	function tryAddFavorite($username,$movieId){
		$conn = connectionToDataBase();
		if($conn != null){
			$sql = "SELECT id FROM favorites WHERE movie_id  = '$movieId'";
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				$conn -> close();
				return array('status' => 'Movie already in favorites.' );

			}

			else{
				$sql = "INSERT INTO favorites (movie_id, username) VALUES ('$movieId', '$username')";

				if (mysqli_query($conn, $sql)){
					$conn -> close();
					return array('status' => 'SUCCESS' );
				}else{
					$conn -> close();
					return array('status' => 'COULD NOT REGISTER USER.' );
				}
			}
		}
	}

 ?>
