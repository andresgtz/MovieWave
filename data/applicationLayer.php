<?php
	header("Content-type: application/json");
	require_once __DIR__ . '/dataLayer.php';

	$action = $_POST['action'];

	switch ($action) {
		case 'REGISTER': registerFunction();
			break;
    case 'LOGIN': loginFunction();
      break;
    case 'ABOUTME': aboutMeFunction();
      break;
    case 'ADDMOVIE': addMovieFunction();
      break;
    case 'CHECKSESSION': checkSessionFunction();
      break;
		case 'LOGOUT': logoutFunction();
		default:
			break;
	}

	function registerFunction(){
		$userName = $_POST["username"];
		$userEmail = $_POST["userEmail"];
		$userPassword = $_POST["userPassword"];

		$result = attemptRegistration($userName, $userEmail, $userPassword);

		if($result['status'] == 'SUCCESS'){
			echo json_encode(array('message' => 'Registration successful' ));
		}
		else{
			header('HTTP/1.1 500 ' . $result['status']);
			die($result['status']);
		}
	}

  function loginFunction(){
    $userName = $_POST["loginUsername"];
    $password = $_POST["loginPassword"];

    $result = attemptLogin($userName,$password);

    if($result['status'] == 'SUCCESS'){
      echo json_encode(array('message' => 'SUCCESS'));

    }else{
      echo json_encode(array('message' => 'ERROR'));
    }
  }

  function aboutMeFunction(){
    session_start();
    $userName = $_SESSION["username"];
    $aboutMe = $_POST["aboutMe"];
    $result = attemptUpdateAboutMe($userName,$aboutMe);

    if($result['status'] == 'SUCCESS'){
      echo json_encode(array('message' => 'Edit ABOUTME Succesful'));
    }else{
      header('HTTP/1.1 421 '. $result['status']);
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


    if($result['status'] == 'SUCCESS'){
       echo json_encode(array('message' => 'Movie added succesfully.'));
    }else {
      header('HTTP/1.1 500 ' . $result['status']);
      die($result['status']);
    }
  }

  function checkSessionFunction(){
    session_start();
    if(isset($_SESSION['username'])){
      echo json_encode(array('username'=> $_SESSION['username']));
    }else{
      echo json_encode(array('username'=> ""));
    }
  }

	function logoutFunction(){
		session_start();
		session_unset();
		session_destroy();

		echo json_encode(array('message'=>'LOGOUT SUCCESS'));
	}

 ?>
