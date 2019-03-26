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

	<title>Admin Page</title>

	<!-- Font Import -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- CSS -->
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/user.css">

  <!-- Scripts -->
  

  </head>

  <body>

  	<!-- Navbar -->
  	<nav>
  	  <div class="logo">
  		<img src="img/logo.png" onclick="location.href = 'index'">
  	  </div>
  	  <div class="links"><a href="index">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="submit">Submit</a></div>
  	</nav>

  	<!-- The Container -->
  	<div class="wrapper">

      <div class="right">
      
        <!-- Load this part of the page if there is no logged in user -->
        <?php  if(!isset($_SESSION['user'])){ ?>

          <h1>Login</h1>

          <!-- The error statement -->
          <?php if(isset($_GET['login_attempt'])){ ?>
            
            <div class="error">
              The user is not found. Make sure you have typed your details correctly.
            </div>

          <?php } ?>

          <form method="post" action="">

            <input type="text" name="id" placeholder="Login Id">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>

          </form>


          <!-- Login form submit -->
          <?php if(isset($_POST['id']) && isset($_POST['password'])){

            //Form submission login comes here
            $myId = $_POST['id'];
            $myPassword = $_POST['password'];
            $sql = "SELECT * FROM users WHERE id = '".$myId."' AND password = '".$myPassword."'";
            $result = mysql_query($sql);
         
           if($result == FALSE){
              die(mysql_error());
            }
            else{
              if(mysql_num_rows($result) > 0){
                  $_SESSION['user'] = $myId;
                  header("Refresh: 0;url=user");
                }
                else{
                  header('location:user?login_attempt=1');
                }
            }

            }

           ?>


        <!-- The Logic for logged in user -------------->
        <?php } else{ ?>

          <h1>Welcome <?php echo $_SESSION['user']; ?>
            <a href="?logout=1"><button class="logout">Log Out</button></a>
          </h1>


                  <div class="help-text">Unverified Leaks</div>
          <!-- The Search Results -->
        <div class="post-results">
          
          <?php 

                $query = "SELECT * FROM submission WHERE verified = '0'";
                $result = mysql_query($query) or die(mysql_error());

                if(mysql_num_rows($result) > 0){

                  //output
                  while($row = mysql_fetch_assoc($result)){ ?>



                    <div class="post-title">
                      <a href=""><?php echo $row["title"]; ?></a>
                  </div>
                  <div class="post-date"><?php echo $row['thedate']; ?></div>
                  <div class="post-description">
                    <?php echo $row['description']; ?>
                  </div>

                  <div class="post-buttons">
                    <a href="verify.php?id=<?php echo $row['id']; ?>&stat=0"><button class="right-btn remove">Remove</button></a>
                    <a href="verify.php?id=<?php echo $row['id']; ?>&stat=1"><button class="right-btn verify">Verify</button></a>
                  </div>


                  <?php 

                }


           ?>


          <?php } ?>

        </div>




        <?php } ?>

        
      </div>

  		 
  	</div>
    <br><br><br><br><br>

  </body>

</html>