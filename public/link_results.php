<?php require_once("../includes/database.php"); ?>

<?php
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(mysqli_connect_errno())
    {
        die("Database connection failed: " .
                    mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")");
    }
?>

<?php
    if(isset($_GET['category'])) {
          $searchq = $_GET['category'];
          $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
          
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
                        <a href="institute_profile_test.php?id=<?php echo $id; ?>"><?php echo $row["name"];?>
                        </a>
                      </h3>
                      
                  </li>
          <div class = "rating">Rating: <?php echo $average_array[$id] ?>/5</div>
        <?php
        }
      
    }
}
?>