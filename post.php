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


  
  if(!isset($_GET['id']))
    header('location:index');

?>
<!DOCTYPE html>
<html>

  <head>

	<title>OpenLeaks - The Post</title>

	<!-- Font Import -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- CSS -->
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/post.css">

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
      
<?php 
    
      $id = $_GET['id'];
      $query = "SELECT * FROM submission WHERE id = '$id'";
      $result = mysql_query($query) or die(mysql_error());

      if($result == FALSE){
        header('location:index');
      }
      else{

        if(mysql_num_rows($result) > 0){

          while($row = mysql_fetch_assoc($result)){  



            ?>



            <h1>
              <?php  echo $row['title']; ?>
            </h1>
        <h3><?php echo $row['org']; ?></h3>

       <img src="
          <?php
          if($row['f1'] != "" || $row['f2'] != "" || $row['f3'] != "" || $row['f4'] != ""){
        if(exif_imagetype($row['f1']) == IMAGETYPE_JPEG || exif_imagetype($row['f1']) == IMAGETYPE_PNG){
              echo $row['f1'];
          }
          else if(exif_imagetype($row['f2']) == IMAGETYPE_JPEG || exif_imagetype($row['f2']) == IMAGETYPE_PNG){
            echo $row['f2'];
          }
          else if(exif_imagetype($row['f3']) == IMAGETYPE_JPEG || exif_imagetype($row['f3']) == IMAGETYPE_PNG){
            echo $row['f3'];
          }
          else if(exif_imagetype($row['f4']) == IMAGETYPE_JPEG || exif_imagetype($row['f4']) == IMAGETYPE_PNG){
            echo $row['f4'];
          }
          else{
            echo "img/globe.png";
          }
          }
          else{
            echo "img/globe.png";
          }
       ?>
       ">

        <!-- The links for leaked documents -->
        <div class="leaked-docs">
          
          <h3>Leaked Documents</h3>

            <?php if($row['f1'] != ''){ ?>
              <a href="<?php echo $row['f1']; ?>" download><?php echo basename($row['f1']); ?></a>
            <?php } ?>
            
            <?php if($row['f2'] != ''){ ?>
              <a href="<?php echo $row['f2']; ?>" download><?php echo basename($row['f2']); ?></a>
            <?php } ?>

            <?php if($row['f3'] != ''){ ?>
              <a href="<?php echo $row['f3']; ?>" download><?php echo basename($row['f3']); ?></a>
            <?php } ?>

            <?php if($row['f4'] != ''){ ?>
              <a href="<?php echo $row['f4']; ?>" download><?php echo basename($row['f4']); ?></a>
            <?php } ?>

        </div>

        <!-- The description -->
        <p class="date"><?php echo $row['thedate']; ?></p>

        <p><?php echo $row['description']; ?></p>

     <? 
       }

        }

      }
  
?>

              

      </div>

  		 
  	</div>
    <br><br><br><br><br>

  </body>

</html>