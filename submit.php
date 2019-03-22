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
          session_start();
        }

        if(isset($_GET['logout'])){
          session_destroy();
          header('location:user');
        }
 ?>

<!DOCTYPE html>
<html>

  <head>

	<title>OpenLeaks</title>

	<!-- Font Import -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- CSS -->
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/submit.css">

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    
    $(document).ready(function(){

      var x = 0;

      $('.files span').click(function(){

          if(x == 0){
            $('.secondfile').show();
            x = 1;
          }
          else if(x == 1){
            $('.thirdfile').show();
            x = 2;
          }
          else{
            $('.fourthfile').show();
            $(this).hide();
          }

      });

    });

  </script>

  </head>

  <body>

  	<!-- Navbar -->
  	<nav>
  	  <div class="logo">
  		<img src="img/logo.png" onclick="location.href = 'index'">
  	  </div>
  	  <div class="links"><a href="about">About</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="submit">Submit</a></div>
  	</nav>

  	<!-- The Container -->
  	<div class="wrapper">

  		<div class="right">
      
        <h1>Submit</h1>

        <?php if(isset($_GET['error'])){ ?>

        <div class="error">Internal error occured. Make sure you have filled title and description.</div>
        <?php } ?>


        <?php if(isset($_GET['success'])){ ?>

        <div class="success">Thank you. Your response has been sucessfully submitted.</div>
        <?php } ?>

        <form  enctype="multipart/form-data" method="post" action="">

        <div class="files">
          <input type="file" name="uploaded_file"></input>
          <input type="file" name="uploaded_file2" class="secondfile"></input>
          <input type="file" name="uploaded_file3" class="thirdfile"></input>
          <input type="file" name="uploaded_file4" class="fourthfile"></input>
          <br>
          <span id="add">Add another field</span>
        </div>
        <table>
          <tr>
            <td>Title</td><td>:</td><td><input type="text" name="title" autofocus="" placeholder="Title of the Leak"></td>
          </tr>
          <tr>
            <td>Organisation involved</td><td>:</td><td><input type="text" name="org" placeholder="Name of Org Invloved"></td>
          </tr>
          <tr>
            <td>Leak Date</td><td>:</td><td><input type="text" name="date" placeholder="DD-MM-YYYY"></td>
          </tr>
          <tr>
            <td>Location</td><td>:</td><td><input type="text" name="location" placeholder="Where it happend"></td>
          </tr>
        <tr>
          <td>Description</td><td>:</td><td><textarea name="description" rows="5"
          	cols="49" placeholder="Description..."></textarea></td>
          </tr>
        </table>
        <div class="submitbtn">
          <button type="submit" name="Upload">Upload</button>
        </div>
          
      </form>

      </div>


<?php 
      if(isset($_POST['Upload'])){
        if(trim($_POST['title']) != "" || trim($_POST['description']) != ""){
          
          $title = $_POST['title'];
          $org = $_POST['org'];
          $date = $_POST['date'];
          $location = $_POST['location'];
          $description = $_POST['description'];

          $sql = "SELECT * FROM submission";
          $result = mysql_query($sql);

          if($result == FALSE){
              die(mysql_error());
            }
            else{

              $sql = "SELECT * FROM submission";
              $result = mysql_query($sql);

              if($result == FALSE){
                die(mysql_error());
              }
              else{
                $folderName = mysql_num_rows($result) + 1;
              }


              $path = "posts/".$folderName."";

              if(!is_dir($path)){
                mkdir($path, 0755);
              }

              //File 1
              if(!$_FILES['uploaded_file']['size'] == 0){
              $path = $path."/";
              $path1 = $path . basename( $_FILES['uploaded_file']['name']);
              if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path1)) {
                $a = 1;
              } else{
                header('location:submit?error=1');
              }
            }
            else{
              $path1 = "";
            }

            //File 2
            if(!$_FILES['uploaded_file2']['size'] == 0){
              $path2 = $path . basename( $_FILES['uploaded_file2']['name']);
              if(move_uploaded_file($_FILES['uploaded_file2']['tmp_name'], $path2)) {
                $a = 1;
              } else{
                header('location:submit?error=1');
              }
            }
            else{
              $path2 = "";
            }

            //File 3
            if(!$_FILES['uploaded_file3']['size'] == 0){
              $path3 = $path . basename( $_FILES['uploaded_file3']['name']);
              if(move_uploaded_file($_FILES['uploaded_file3']['tmp_name'], $path3)) {
                $a = 1;
              } else{
                header('location:submit?error=1');
              }
            }
            else{
              $path3 = "";
            }

            //File 4
            if(!$_FILES['uploaded_file4']['size'] == 0){
              $path4 = $path . basename( $_FILES['uploaded_file4']['name']);
              if(move_uploaded_file($_FILES['uploaded_file4']['tmp_name'], $path4)) {
                $a = 1; 
              } else{
                header('location:submit?error=1');
              }
            }
            else{
              $path4 = "";
            }

            $id = rand();

            $query = "INSERT INTO submission(id, f1, f2, f3, f4, title, org, thedate, location, description, verified, views) VALUES ('$id', '$path1', '$path2', '$path3', '$path4', '$title', '$org', '$date', '$location', '$description', '0', '0')";

            $queryResult = mysql_query($query) or die(mysql_error());
            header('location:submit?success=1');

          }

        }
      else{
        header('location:submit?error=1');
      }
    }

 ?>

  		 
  	</div>
    <br><br><br><br><br><br><br><br>

  </body>

</html>