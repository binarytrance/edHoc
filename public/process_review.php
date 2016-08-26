<?php
    require_once("../includes/database.php");
    session_start();
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(mysqli_connect_errno())
    {
        die("Database connection failed: " .
                    mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")");
    }
        if(isset($_POST['submit_review'])) 
        {
            $review = mysqli_real_escape_string($connection, $_POST['review']);
            $student_id = $_SESSION['student_id'];
            $institute_id = $_SESSION['institute_id'];
                //echo $institute_id;
                //echo $student_id;
            $review_query = "INSERT INTO reviews 
                            (content, student_id, institute_id) 
                            VALUES ('$review', $student_id, $institute_id)";
            $result = mysqli_query($connection, $review_query);
            if(!$result){
            die("Database query failed.". mysqli_error($connection));
        }else{
            header('Location: institute_profile_test.php?id=' . $institute_id);
            }     
        }
?>