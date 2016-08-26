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
    if(isset($_POST['login'])) {
        session_start();
        $email = $_POST['email'];
        $pword = $_POST['key'];
        
        $query ="SELECT * FROM students WHERE email = '{$email}'";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Database query failed.". mysqli_error($connection));
        }
                
        //Obect Oriented PHP
        $row = $result -> fetch_array(MYSQLI_BOTH);
        if(password_verify($pword, $row['password'])){
            $_SESSION['student_id'] = $row['student_id'];
            header('Location: test-1.php');
        }
        else {
            $_SESSION["LogInFail"] = "Yes";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>EdHoc - Sign In</title>
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
                <h1>Sign In</h1>
                    <hr>
                    <?php if(isset($_SESSION["LogInFail"])) { ?>
                            <div>Sign in failed! Please try again.</div>
                        <?php } ?><br>
                    <form role="form" action="login.php" method="post" id="register-form" name="register-form" autocomplete="on">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control"  required = "required" placeholder="Enter Email-Id ">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="key" id="key" class="form-control"  required = "required" placeholder="Password">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Sign In" name="login">
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
</html>