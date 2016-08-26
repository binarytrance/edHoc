<?php 
    require("../includes/database.php");
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
?>
<?php
    if(isset($_POST['register'])) {
        session_start();
        $f_name = $_POST['fname'];
        $l_name = $_POST['lname'];
        $email = $_POST['email'];
        $pword = $_POST['key'];
        
        $store_password = password_hash($pword, PASSWORD_BCRYPT, array('cost' => 10));
        
        $query ="INSERT INTO students (email, password, f_name, l_name, username, city, state, zip) VALUES('{$email}', '{$store_password}', '{$f_name}', '{$l_name}', NULL, NULL, NULL,NULL)";
        $result = mysqli_query($connection, $query);
        
        if(!$result){
            die("Database query failed.". mysqli_error($connection));
        }
        header('Location: login.php');
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
                <h1>Sign Up</h1><hr>
                    <form role="form" action="Sign_up.php" method="post" id="register-form" name="register-form" autocomplete="off">
                        <div class="form-group">
                            <label for="first_name" class="sr-only">First Name</label>
                            <input type="fname" name="fname" id="fname" class="form-control"  required = "required" placeholder="Enter First Name " >
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="sr-only">Last Name</label>
                            <input type="lname" name="lname" id="lname" class="form-control"  required = "required" placeholder="Enter Last Name ">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control"  required = "required" placeholder="Enter Email-Id ">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="key" id="key" class="form-control"  required = "required" placeholder="Password">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Sign Up" name="register">
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
