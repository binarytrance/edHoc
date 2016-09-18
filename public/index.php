<?php 
    session_start("");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EdHoc</title>
    <!-- Google Font: philosopher for logo -->
    <link href="https://fonts.googleapis.com/css?family=Philosopher:400,700" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="stylesheets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="stylesheets/css/my_css.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Custom JS -->
    <script src='javascripts/js/my_script.js'></script>
      
    <!--stylesheets for owl carousel 
      
    <link rel="stylesheet" href="owl/owl.carousel.css">

    

    <script src="owl/owl.carousel.js"></script> 
    -->
      
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'> 
  	<script src="authentication/js/modernizr.js"></script> <!-- Modernizr -->
      
				
   </head>
    <body>
    <div class="one-above-all">    
    <!--navigation bar-->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
                <!-- <a class="logo" href="index.php"><p><span class="logo-underline">ed</span>Hoc</p></a> -->
            <a class="logo navbar-brand" href="index.php"><p><span class="underline">ed</span>Hoc</p></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                  <!--
                  <li class="active"><a href="#">Home</a></li>
                -->
              <li><a href="about.html"><p class="navbar-list">About</p></a></li>
              <li><a href="Contact-Us.html"><p class="navbar-list">Contact</p></a></li>
                  
                <?php  
                    if(isset($_SESSION["student_id"])) {
                ?>
                        <li><a class="navbar-list" href="dashboard.php"><p class="navbar-list">Dashboard</p></a></li>
                        <li><a class="navbar-list" href="logout.php"><p class="navbar-list">Sign Out</p></a></li>
                  <?php
                    }
                    else {
                  ?>
                        <li><a class="cd-signin" href="login.php"><p class="navbar-list">Sign In</p></a></li>
                        <li><a class="cd-signin" href="Sign_up.php" role="button"><p class="navbar-list">Sign Up</p></a></li>
                  <?php  
                  }    
                  ?>  
              </ul>
            </div>
            </div>
      </nav>


        
        
    
      <div class='jumbotron'>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-lg-12" >
              <h1 class="welcome-text">Discover the best places to learn and collaborate with friends to make learning easier.</h1>
                </div>
          </div>
          </div>
      </div>
      <hr>
      <div class="row col-md-6 col-md-offset-2">
        <div class="col-lg-6">
          <div class="input-group">
            <form action="search_results.php" method = "post">
              <input type="text" name="search" class="form-control" placeholder="Search by subjects...">
                    
              <span class="input-group-btn">
                <button class="btn btn-default" type="button submit">Go!</button>
              </span>
            </form>
              
          </div><!-- /input-group -->
        </div>
      </div>
 <br>
 <br>
        <br>
<hr>
<!-- <br>
<br>
<br>
<br>
<br>
<br> -->

      <!-- <div class="col-md-6 col-md-offset-2">
		
                <div id = "items" class="owl-carousel col-md-8 col-md-offset-2">
                    <div class="item"><a href ="link_results.php?category=math"><img src="images/math.jpg"></a></div>
                    <div class="item"><a href ="link_results.php?category=chem"><img src="images/chem.jpg"></a></div>
                    <div class="item"><a href="link_results.php?category=physics"><img src="images/physics.jpg"></a></div>
                    <div class="item"><a href="link_results.php?ccategory=math"><img src="images/reso-2.jpeg"></a></div>
                    <div class="item"><a href="link_results.php?category="><img src="images/reso-1.jpeg"></a></div>
                </div>
	
      </div> -->
      <p>hey</p>
      <p>hey</p>
      <p>hey</p>
      <p>hey</p>
      <p>hey</p>
      <p>hey</p>
    </div> <!-- closing one-above-all -->
    <footer>
    		<ul>
              <a href="#"><li>Company</li></a>
              <a href="#"><li>About Us</li></a>
              <a href="#"><li>Careers</li></a>
              <a href="#"><li>Contact Us</li></a>
    		</ul>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <!-- <script src = "https://code.jquery.com/jquery.js"></script> -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
      
              

        <!--javascript for the slick carousel-->
        
      <!--  <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script> -->

        
        

   </body>
</html>