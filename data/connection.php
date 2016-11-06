<?php
function connectionToDataBase(){
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "moviewave";


		$conn = new mysqli($servername, $username, $password, $dbname);


		if($conn->connect_error){
			return null;
		}else{
			return $conn;
		}
	}
?>