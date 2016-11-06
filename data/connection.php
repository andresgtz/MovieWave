<?php
function connectionToDataBase(){
		$servername = "localhost";
		$username = "andy";
		$password = "";
		$dbname = "moviewave";


		$conn = new mysqli($servername, $username, $password, $dbname);


		if($conn->connect_error){
			return null;
		}else{
			return $conn;
		}
	}
?>
