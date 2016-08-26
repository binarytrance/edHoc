<?php 
    session_start("");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EdHoc</title>

    <!-- Bootstrap -->
    <link href="stylesheets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheets/css/my_css.css">
    <script src='javascripts/js/my_script.js'></script>
      
    <!--stylesheets for owl carousel -->
      
    <link rel="stylesheet" href="owl/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="owl/owl.theme.default.css">
    <link rel="stylesheet" href="owl/owl.animate.css">
   <!-- <script src="js/jquery-1.12.2.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script> -->
    <script src="javascripts/js/jquery-2.2.2.min.js"></script>

    <script src="owl/owl.carousel.js"></script>
      
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="authentication/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="authentication/css/style.css"> <!-- Gem style -->
	<script src="authentication/js/modernizr.js"></script> <!-- Modernizr -->
      
				
   </head>
    <body>
        
    <!--navigation bar-->
    <div class="navbar-wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="logo" href="test1.html"><img src="images/temp-logo.jpg" height= "50" width =  "80"></a>
            </div>
            <div class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                <!--
                <li class="active"><a href="#">Home</a></li>
              -->
                <li><a href="about.html">About</a></li>
                <li><a href="Contact-Us.html">Contact</a></li>
                
                <?php  
                    if(isset($_SESSION["student_id"])) {
                ?>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="logout.php">Sign Out</a></li>
                  <?php
                    }
                    else {
                  ?>
                        <li><a class="cd-signin" href="login.php">Sign In</a></li>
                        <li><a class="cd-signin" href="Sign_up.php" role="button">Sign Up</a></li>
                  <?php  
                  }    
                  ?>  
              </ul>
            </div>
          </div>
        </nav>
    </div>


        
        
    
    <div class='jumbotron' >
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12" >
            <h1 class="welcome-text">Welcome to EdHoc. <br>Discover the best places to learn and collaborate with friends to make learning easier.</h1>
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
      <div class="col-md-6 col-md-offset-2">
		
                <div id = "items" class="owl-carousel col-md-8 col-md-offset-2">
                    <div class="item"><a href ="link_results.php?category=math"><img src="images/math.jpg"></a></div>
                    <div class="item"><a href ="link_results.php?category=chem"><img src="images/chem.jpg"></a></div>
                    <div class="item"><a href="link_results.php?category=physics"><img src="images/physics.jpg"></a></div>
                    <div class="item"><a href="link_results.php?ccategory=math"><img src="images/reso-2.jpeg"></a></div>
                    <div class="item"><a href="link_results.php?category="><img src="images/reso-1.jpeg"></a></div>
                </div>
	
      </div>

    <footer>
	<nav>
		<ul>
          <a href="#"><li>Company</li></a>
          <a href="#"><li>About Us</li></a>
          <a href="#"><li>Careers</li></a>
          <a href="#"><li>Contact Us</li></a>
		</ul>
	</nav>
</footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <!-- <script src = "https://code.jquery.com/jquery.js"></script> -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src = "javascripts/js/bootstrap.min.js"></script>
              

        <!--javascript for the slick carousel-->
        
      <!--  <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script> -->
        <script src="owl/owl.carousel.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                dots:true,
                nav:true,
                responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },

                }
            })
            });
        </script>
   </body>
</html>