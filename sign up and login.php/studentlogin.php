<?php include('connect_forgot.php');

session_start();
$message = '';
if(isset($_POST['submit']) != '') {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
	$result = $conn->query($query);
if($result->num_rows > 0){
		 $message = "<div class='alert alert-success'>Login Successfull..</div>";
	}else{
		$message = "<div class='alert alert-danger'>Login failed..!!</div>";
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>forgot Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
.bg-secondary{
	margin: 130px auto;
	

}
</style>

</head>
<body class="bg-secondary">
		<div class="container w-50 mt-5">
			<form method="post" class="bg-light p-5 shadow-lg">
				<?php echo $message; ?>
				<h1 class="text-success">LOGIN</h1>
				<label for="Email">Email</label>
				<input type="text" name="email" placeholder="Enter your registered email ID" class="form-control form-control-sm" required><br>
				<label for="password">Password</label>
				<input type="text" name="password" placeholder="Enter Password" class="form-control form-control-sm " required><br>
				<button type="submit" name="submit" class="btn btn-success btn-sm ">Login</button>
				<a href="forgot_pass.php" class="btn btn-sm btn-warning">forgot Password?</a>
			</form>
		</div>
</body>
</html>
