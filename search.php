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


    if(!isset($_GET['q'])){
        header('location:search?q=');
  }
 ?>
<!DOCTYPE html>
<html>

  <head>

	<title>Search results for <?php echo "\"".$_GET['q']."\""; ?></title>

	<!-- Font Import -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- CSS -->
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/search.css">

  <!-- Scripts -->
  

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
      
        <?php if(isset($_GET['q'])){
              $q = $_GET['q'];
         ?>
          <h1>Search results for "<?php echo $_GET['q']; ?>"</h1>
        <?php } ?>

        <!-- Search Bar -->
        <form method="get" action="">
        <div class="search">
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td>
                <input type="text" name="q" value="<?php echo $_GET['q']; ?>">
                <button type="submit"><img src="img/search.png"></button>
              </td>
            </tr> 
          </table>
        </div>
        </form>

        <!-- The Search Results -->
        <div class="search-results">
          
          <?php 

                $query = mysql_query("SELECT * FROM submission WHERE title LIKE '%{$q}%' AND verified = '1'") or die(mysql_error());

                if(mysql_num_rows($query) > 0){
                    while($row = mysql_fetch_assoc($query)){  ?>


            <div class="sr-title">
              <a href="post?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
            </div>
            <div class="sr-date"><?php echo $row['thedate']; ?></div>
            <div class="sr-description">
              <?php echo $row['description']; ?>
            </div>
          <? }



                }

           ?>

        </div>

        
      </div>

  		 
  	</div>
    <br><br><br><br><br><br><br>

  </body>

</html>