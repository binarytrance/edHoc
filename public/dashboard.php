<?php
    require_once("../includes/database.php");
    session_start();

// restricts access to logged in users only
if(isset($_SESSION['student_id'])) {
    // do nothing
}
else {
    header('Location: login.php');
}

    //mysql_
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(mysqli_connect_errno())
    {
        die("Database connection failed: " .
                    mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")");
    }

    // retrieves current user information
    $student_id = $_SESSION['student_id'];
    $query1 = "SELECT * FROM students WHERE student_id = {$student_id}";
    $result1 = mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($result1);
    $_SESSION["fname"] = $row["f_name"];
    $_SESSION["lname"] = $row["l_name"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["key"] = $row["password"];
    

    // updates database with updated user info
    if(isset($_POST['update'])) {
        $update_f_name = $_POST['fname'];
        $update_l_name = $_POST['lname'];
        $update_email = $_POST['email'];
        $update_pword = $_POST['key'];
        $insert_username = $_POST['username'];
        $insert_city = $_POST['city'];
        $insert_state = $_POST['state'];
        $insert_zip = $_POST['zip'];
        $insert_bio = $_POST['bio'];
        //updates information already in the db
        $query = "UPDATE students 
                SET f_name = '{$update_f_name}', 
                l_name = '{$update_l_name}', 
                email = '{$update_email}', 
                password = '{$update_pword}',
                username = '{$insert_username}',
                city = '{$insert_city}',
                zip = '{$insert_state}'
                WHERE student_id='{$student_id}'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Database query failed.". mysqli_error($connection));
        }
        header('Location: dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>EdHoc - Sign Up</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="stylesheets/css/sign_in_style.css">

<meta name="viewport" content="width=device-width, intial-scale=1, maximum-scale=1">
</head>
<body>
	
	<!--login form-->
	<section id="signup">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Update your information</h1>
                    <form role="form" action="dashboard.php" method="post" id="register-form" name="register-form" autocomplete="on">
                        <div class="form-group">
                            <label for="first_name" class="sr-only">First Name</label>
                            <input type="fname" name="fname" id="fname" class="form-control"  required = "required" placeholder="Enter First Name " value="<?php echo $_SESSION["fname"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="sr-only">Last Name</label>
                            <input type="lname" name="lname" id="lname" class="form-control"  required = "required" placeholder="Enter Last Name " value="<?php echo $_SESSION["lname"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control"  required = "required" placeholder="Enter Email-Id " value="<?php echo $_SESSION["email"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">User name</label>
                            <input type="username" name="username" id="username" class="form-control" placeholder="Enter a username ">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="key" id="key" class="form-control"  required = "required" placeholder="New Password" value="<?php echo $_SESSION["key"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="city" class="sr-only">City</label>
                            <input type="city" name="city" id="city" class="form-control" placeholder="Enter your city ">
                        </div>
                        <div class="form-group">
                            <label for="state" class="sr-only">State</label>
                            <input type="state" name="state" id="state" class="form-control" placeholder="Enter your state ">
                        </div>
                        <div class="form-group">
                            <label for="state" class="sr-only">Zip</label>
                            <input type="zip" name="zip" id="zip" class="form-control" placeholder="Enter your zip code ">
                        </div>
                        <textarea class="sr-only" name="bio" cols="60" rows="8"
      				readonly="readonly">You are special. Tell your friends more about yourself.
			            </textarea>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Update Info" name="update">
                    </form>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recovery</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->


	<!--link-->
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
