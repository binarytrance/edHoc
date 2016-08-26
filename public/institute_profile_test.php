<?php require_once("../includes/database.php"); 
      session_start();
?>

    <?php
      //mysql_
        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if(mysqli_connect_errno())
        {
            die("Database connection failed: " .
                        mysqli_connect_error() .
            " (" . mysqli_connect_errno() . ")");
        }
        $result = "";
        if(isset($_GET['id']))
        {
            $id = (int)$_GET['id'];
            $_SESSION['institute_id'] = $id;
            $query = "SELECT * FROM institutes WHERE institute_id = {$id}";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            //echo $row;
            $id = $row["institute_id"];
            $name = $row["name"];
            $tagline = $row["tagline"];
            $city = $row["city"];
            $state = $row["state"];
            
        }

        $get_review_query = "SELECT * FROM reviews WHERE institute_id = {$id}";
        $result = mysqli_query($connection, $get_review_query);
        if(!$result){
                 die("Database query failed.");
             }                                                     
          $count = mysqli_num_rows($result);
          if($count == 0)
          {
              $output = "There're no reviews for this institute.";
          }
          else {
                while($row = mysqli_fetch_assoc($result))
                {
                    
                    $review_contents = $row['content'];
                    $institute_id = $row['institute_id'];
                    $student_id = $row['student_id'];
                    $date = $row['created_on'];
                    
                    $query_student_name = "SELECT f_name, l_name FROM students 
                                            WHERE student_id = {$student_id}";
                    $result1 = mysqli_query($connection, $query_student_name);
                    if(!$result1){
                 die("Database query failed.");
             }                                                     
          else {
                    $row1 = mysqli_fetch_assoc($result1);
                    $student_f_name = $row1['f_name'];
                    $student_l_name = $row1['l_name'];
                }
                    $review_array[] = $row;
          }
          } 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>$name</title>

    <!-- Bootstrap core CSS -->
    <link href="stylesheets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/css/jumbotron-narrow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheets/css/results_my_css.css">
      
    <!-- Custom styles for image carousel -->
    <link rel="stylesheet" href="owl/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="owl/owl.theme.default.css">
    <link rel="stylesheet" href="owl/owl.animate.css">
    
      <!--Custom styles for Google Maps API -->
      <link rel="stylesheet" href="stylesheets/css/map_style.css">

</head>

  <body>
      <div class = "foreground">
    <nav class="navbar navbar-inverse navbar-fixed-top custom-nav">
        <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">EdHoc</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
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
          <form class="navbar-form navbar-right  ">
            <input type="text" action="search_results.php" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

      <div class="jumbotron header clearfix col-md-8 col-md-offset-2 custom-jumbotron">
        <h1><?php echo $name; ?></h1>
        <h2><?php echo $tagline; ?></h2>
        <p><?php echo ucfirst($city) . ", " . ucfirst($state); ?></p>
        <!-- <p class="lead institute-rating">Rating: x/5</p> -->
        <div class="institute-rate">
            <p>Rate this institue: </p>
            <?php foreach(range(1,5) as $rating): ?>
                <a href="rate.php?id=<?php echo $id; ?>&rating=<?php echo $rating;?>"><?php echo $rating; ?></a>  
            <?php endforeach; ?>
          </div>
        <p><a class="btn btn-lg btn-success" <?php  
                                                if(isset($_SESSION["student_id"])) {
                                             ?>
                                                href="#review-form" 
                                            <?php
                                                }
                                                else {
                                             ?>
                                                href="login.php?id=<?php echo $id; ?>"
                                             <?php
                                                }
                                             ?>
              role="button">Write a Review</a></p>
      </div>

      
      <div class="col-md-5 col-md-offset-2">
          <fieldset>
			<legend>Photos</legend>			
                <div id = "items" class="owl-carousel">
                    <div class="item"><img src="images/reso-2.jpeg"></div>
                    <div class="item"><img src="images/reso-1.jpeg"></div>
                    <div class="item"><img src="images/reso-3.jpg"></div>
                    <div class="item"><img src="images/reso-2.jpeg"></div>
                    <div class="item"><img src="images/reso-1.jpeg"></div>
                </div>
			</fieldset>
      </div>
      <!-- <div class = "col-md-4 col-md-offset-7 map-container"> -->
        <div class="mapid">
            <script>
            jQuery('.mapid').load('maps1.php?id=<?php echo $id;?>');
            </script>
            <?php include("maps1.php"); ?>  
        </div>
          
      <div class="col-md-5 col-md-offset-2">
          <!--
          <fieldset>
			<legend>Details</legend>			
				Degree 
				<select>
  					<option value="MBA">Master of Busines Administration</option>
  					<option value="xyz">xyz</option>
  					<option value="abc">abc</option>
  					<option value="pqr">pqr</option>
				</select>
				<br>
				Student ID
				<input type = "text" name = "ID">
			</fieldset>
-->
          
              <a class ="no-link" name="review-form"><h3>Add a Review</h3></a>
              
              <form name="review_form" method="post" action="process_review.php">
                <textarea name="review" required="required" cols="60" rows="7" placeholder="Write a review..."></textarea>
                <input type="submit" class="btn btn-custom btn-lg " value="Submit" name="submit_review">
              </form>
          <hr>
          
          <!-- display reviews -->
          <fieldset>
			<legend>Reviews for <?php echo $name; ?></legend>
              <br>
              <?php
              foreach($review_array as $value){
                  ?>
              <legend><?php echo $student_f_name . " ". $student_l_name; ?> said:</legend>
                <div id = "items" class="">
                    <?php echo $review_contents; ?>
                </div>
              <br>
                <div>
                    <?php echo $date; ?>
                </div>
              <?php } ?>
			</fieldset>
          <br><br><hr>
          <div id="footer">
        EdHoc Inc. &copy; 2016. All rights reserved. <a href="index.php">Return to homepage</a>
      </div>
      </div>
          
<!--
      <footer class="footer">
        <p>&copy;</p>
      </footer>
-->
        <script src="javascripts/js/jquery-1.12.2.min.js"></script>
        <script src="javascript/js/jquery-migrate-1.2.1.min.js"></script>
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
     

    </div>
  </body>
</html>
