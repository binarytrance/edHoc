<?php require_once("database.php"); ?>
      

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
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
          </ul>
          <form class="navbar-form navbar-right  ">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
<br>
   
      <?php
        mysql_connect($dbhost, $dbuser, $dbpass) or die("could not connect.");
      mysql_select_db($dbname) or die("could not find database.");
      $result = "";
      //collect info from database
      if(isset($_POST['search'])) {
          $searchq = $_POST['search'];
          $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
          echo $searchq;
    //SQL query
          $query = mysql_query("SELECT name FROM institutes WHERE 
           category1 = '$searchq' OR
                                                                  category2 = '$searchq' OR
                                                                  category3 = '$searchq' OR 
                                                                  category4 = '$searchq' OR
                                                                  category5 = '$searchq'") 
                                                                  or die(" No records found.");
          $count = mysql_num_rows($query);
          echo $count;
          echo $query;
          if($count == 0)
          {
              $output = "There's no search result";
          }
          else {
              while($array = mysql_fetch_assoc($query))
        {
        ?>
            <li><?php echo $array['website'];?></li>
        <?php
        }
      
    }
}
          ?>
      

  </body>
</html>
