<!DOCTYPE html>
<html lang="en">
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
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href = "C:\Users\Mickey.Utopia\Documents\EdHoc\Sign_in.htm">Sign In</a></li>
                <li><a href = "#" class="active" role="button">Sign Up</a></li>
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
                    <div class="item"><img src="images/math.jpg"></div>
                    <div class="item"><img src="images/chem.jpg"></div>
                    <div class="item"><img src="images/physics.jpg"></div>
                    <div class="item"><img src="images/reso-2.jpeg"></div>
                    <div class="item"><img src="images/reso-1.jpeg"></div>
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
        </script>
   </body>
</html>