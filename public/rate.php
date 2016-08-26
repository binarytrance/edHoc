<?php 
    require_once("../includes/database.php");
session_start();
if(isset($_SESSION['student_id']))
{
    $student_id = $_SESSION['student_id'];
}
$counter = 1;
    if(isset($_GET['id']) and $_GET['rating'])
    {
        $institute_id = (int)$_GET['id'];
        $rating = (int)$_GET['rating'];
        
        if(in_array($rating, [1, 2, 3, 4, 5]))
        {
            $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            $query = ("SELECT institute_id FROM institutes WHERE institute_id = {$institute_id}");
            $result = mysqli_query($connection, $query);
            if(!$result){
                 die("Database query failed. :");
             }                                                     
          $count = mysqli_num_rows($result);
          if($count == 0)
          {
              $output = "There's no search result";
          }
          else {
                $insert_query = "INSERT INTO ratings (rating, student_id, institute_id) VALUES({$rating}, {$student_id}, {$institute_id})";
              $counter++;
                $result1 = mysqli_query($connection, $insert_query);
//test for query error
if($result1)
{
    //success
    header("Location: institute_profile_test.php?id=" . $institute_id);
} else {
    //failure
    // $message = "subject creation failed"
    //die("Database query failed." . mysqli_error($connection));
    echo "Only one rating per user!";
    header("Location: institute_profile_test.php?id=" . $institute_id);
}
                
            }
        }
    }
    
?>