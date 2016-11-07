<?php
	header("Content-type: application/json");
	require_once __DIR__ . '/dataLayer.php';

	$action = $_POST['action'];

	switch ($action) {
		case 'REGISTER': registerFunction();
			break;

    case 'ADDMOVIE': addMovieFunction();
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
			echo json_encode(array('message' => 'Registration successful' ));
		}
		else{
			header('HTTP/1.1 500 ' . $result['status']);
			die($result['status']);
		}
	}

  function addMovieFunction(){
    $movieTitle = $_POST['movieTitle'];
    $movieYear = $_POST['movieYear'];
    $movieActors = $_POST['movieActors'];
    $movieGenre = $_POST['movieGenre'];
    $movieDescription = $_POST['movieDescription'];

    $result = attemptAddMovie($movieTitle,$movieYear,$movieActors,$movieGenre,$movieDescription);


    if($result['status'] === 'SUCCESS'){
       echo json_encode(array('message' => 'Movie added succesfully.'));
    }else {
      header('HTTP/1.1 500 ' . $result['status']);
      die($result['status']);
    }
  }

  

 ?>
