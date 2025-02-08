
<?php
session_start(); // Start session to store user login status

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "student";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>


<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<title>Admin Page</title>
    <link rel="stylesheet" href="Admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-secondary">
    <center>
	<!-- Main Content -->
	<div class="container-fluid" style="margin-top: 70px;">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Log In</h2>
					</div>
					<div class="row" >
						<form method="POST" action="a.php" class="form-group">
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Password">
							</div>
							
							<div class="row">
								<input type="submit" name="sub" value="Submit" class="btn btn-dark">
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	
</center>
</body>