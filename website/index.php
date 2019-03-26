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
 ?>
 <!DOCTYPE html>
<html>

  <head>

	<title>OpenLeaks</title>

	<!-- Meta Tags -->

	<!-- CSS Include -->
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">

	<!-- jQuery Include -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>

  <body>

  	<div class="topbar"><div><img src="img/home.png" height="15">&emsp;Welcome to OpenLeaks</div></div>

  	<div id="wrapper">

  	  <!-- The Company Logo -->
  	  <form method="get" action="search">
  	  <div class="logo"><img src="img/logo.png"></div>
  	  <div class="search">
  	  	<table cellpadding="0" cellspacing="0" align="right">
  	  	  <tr>
  	  		<td><input type="text" placeholder="Search keyword" name="q"></td>
  	  		<td><button><img src="img/search.png" height="18"></button></td>
  	  	  </tr>
  	  	</table>
  	  </div>
  	  </form>

  	  <!-- The Navigation Bar -->
  	  <nav>
  	  	<ul>
  	  		<a href="about"><li class="first">About</li></a>
  	  		<a href="submit"><li>Submit</li></a>
  	  		<a href="search"><li>Search</li></a>
  	  		<a href="about?t=us"><li>About this Project</li></a>
  	  		<a href="user"><li class="last">Login</li></a>
  	  	</ul>
  	  </nav>

  	  <!-- The Left Bar -->
  	  <div class="left">
  	  	
  	  	<!-- The Login Part -->
        <form method="post" action="user">
  	  	<fieldset>  	  		
  	  		<legend align="left">Admin Login</legend>
  	  		<input type="text" name="id" placeholder="Login Id">
  	  		<input type="password" name="password" placeholder="Password">
  	  		<button type="submit">Login</button>
		    </fieldset>
        </form>

		<!-- The Trends Part -->
		<div class="trends">
			
			<h3>Editorials</h3>

			<ul>
				<?php 

              $query = "SELECT * FROM submission WHERE verified = '1'";
                $result = mysql_query($query) or die(mysql_error());

                if(mysql_num_rows($result) > 0){

                  //output
                  while($row = mysql_fetch_assoc($result)){ ?>

					     <li><a href="post?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>

				<?php }

          }
         ?>
			</ul>

		</div>
    
  	  </div>

  	  <!-- The right side main content -->
  	  <div class="right">

        <?php 

            $query3 = mysql_query("SELECT * FROM submission ORDER BY views LIMIT 1") or die(mysql_error());

            if(mysql_num_rows($query3)){
                while($row = mysql_fetch_assoc($query3)){ ?>


          <div class="cover-story">
          
          <h1><?php echo $row['title']; ?></h1>
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

          <div class="cover-date"><?php echo $row['thedate']; ?></div>

          <div class="cover-description">           
            &emsp;&emsp;&emsp;&emsp;<?php echo $row['description']; ?>

        <br><a href="post?id=<?php echo $row['id']; ?>">Read More »</a>
          </div>

        </div>






               <?php }


            }

        ?>
  	  	

  	  	<!-- The six non major stories -->
        <div class="non-major">
  	  		<?php 

                $query2 = mysql_query("SELECT * FROM submission WHERE verified = '1'");

                if(mysql_num_rows($query2) > 0){
                  $i = 1;
                  while($row = mysql_fetch_assoc($query2)){ 
                    ?>


             <div class="post" onclick="location.href='<?php echo "post?id=".$row['id']; ?>'">
              

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



              <h3><?php echo $row['title']; ?></h3>

              <div class="description">
               <?php echo $row['description']; ?>
              </div>

              <div class="date">13th January, 2013&emsp;</div>

            </div>





                <?
                 }
              }

           ?>



<!---------------------------------------------->





  	    </div>

  	  <!-- The BottomBar -->
  	  <div class="bottombar">
  	  	<b>OpenLeaks</b> | 2018
  	  	<span>This website is a part of Smart India Hackathon</span>
  	  </div>	


  	  </div>



  	</div>
  	
  </body>

</html>