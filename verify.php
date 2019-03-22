<?php 
	
		include('database.php');

        // Create connection
        $conn = mysql_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
          mysql_select_db($dbname) or die(mysql_error());
        }



	if(!isset($_GET['id']) || !isset($_GET['stat'])){
		header('location:user');
	}
	else{

		$id = $_GET['id'];

		if($_GET['stat'] == '0'){
			$query = "UPDATE submission SET verified = '2' WHERE id = '$id'";
		}
		else if($_GET['stat'] == '1'){
			$query = "UPDATE submission SET verified = '1' WHERE id = '$id'";
		}
		else{
			header('location:user');
		}
		$result = mysql_query($query) or die(mysql_error());
		header('location:user');
	}


?>