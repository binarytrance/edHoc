<?php require_once("../includes/database.php"); ?>
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

    <title>Resonance</title>

    <!-- Bootstrap core CSS -->
    <link href="stylesheets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/css/jumbotron-narrow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheets/css/results_my_css.css">
      
    <!-- Custom styles for image carousel -->
    <link rel="stylesheet" href="owl/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="owl/owl.theme.default.css">
    <link rel="stylesheet" href="owl/owl.animate.css">

</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top custom-nav">
        <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">EdHoc</a>
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
          <form class="navbar-form navbar-right" method = "post" action="search_results.php">
            <input type="text" class="form-control" placeholder="Search..." name="search">
          </form>
        </div>
      </div>
    </nav>
<br>
   <br>
      <br>
      
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
      //collect info from database
      if(isset($_POST['search'])) {
          $searchq = $_POST['search'];
          $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
          //echo $searchq;
    //SQL query
          $query = "SELECT institute_id, name FROM institutes WHERE 
                                     course_offered1 LIKE '%$searchq%' OR
                                     course_offered2 LIKE '%$searchq%' OR
                                     course_offered3 LIKE '%$searchq%' OR 
                                     course_offered4 LIKE '%$searchq%'";
           $result = mysqli_query($connection, $query);
          
          // Test if there was a query failure   
          if(!$result){
                 die("Database query failed.");
             }                                                     
          $count = mysqli_num_rows($result);
          if($count == 0)
          {
              $output = "There's no search result";
          }
          else {
                while($row = mysqli_fetch_assoc($result))
                {
                  $id = $row["institute_id"];
                    //echo $row["name"];
                  $query2 = "SELECT rating FROM ratings WHERE institute_id = {$id}";
                  $result2 = mysqli_query($connection, $query2);
                  // average rating vars
                  $count = 0;
                  $sum = 0;
                  while($row2 = mysqli_fetch_assoc($result2))
                  {
                      //echo $row2;
                      $count++;
                      $sum += $row2["rating"];
                  }
                  $average = ($sum / $count);
                  $average = round($average, 1, PHP_ROUND_HALF_UP);
                    // JSON array
                  $average_array = array($id => $average);
                  
                


        ?>
                  <li>
                      <h3>
                        <a href="institute_profile_test.php?id=<?php echo $id; ?>"><?php echo $row["name"]; ?>
                        </a>
                      </h3>
                      
                  </li>
          <div class = "rating">Rating: <?php echo $average_array[$id] ?>/5</div>
        <?php
        }
          }
    }

          ?>
      

  </body>
</html>
