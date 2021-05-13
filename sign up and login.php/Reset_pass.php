<?php include('connect_forgot.php');
session_start();
$id = $_GET['MnoQtyPXZORTE'];
$message = $Home = '';
$_SESSION['name'] = $id;
if ($_SESSION['name'] == '') {
		header("location:forgot_pass.php");
}
else
{
if(isset($_POST['submit'])) {
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	// $pass = password_hash($password, PASSWORD_BCRYPT);

	if ($password !== $cpassword) {
		$message = "<div class='alert alert-danger'>Password Not Match..!!</div>";
	}
	else{
	$id_decode = base64_decode($id);
	$query = "UPDATE users SET password = '$password' WHERE id = '$id_decode' ";
	// $sql = "UPDATE user set password "
	$result = $conn->query($query);
	
		if($result){
			$message = "<div class='alert alert-success'>Reset Your Password Successfully..</div>";
			$Home = "<a href='studentlogin.php' class='btn btn-success btn-sm'>Login</a>";
	}else{
		$message = "<div class='alert alert-danger'>Failed to Reset Password..!!</div>";
	}
	}
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
.btn btn-success btn-sm{
	background-color: navy;
}
</style>
</head>
<body class="bg-secondary">
		<div class="container w-50 mt-5">
			<form class="bg-light p-5 shadow-lg" method="post">
				<?php echo $message; ?>
				<h1 class="text-success">Forgot Password</h1>
				<label for="password">Password</label>
				<input type="text" name="password" placeholder="Password" class="form-control form-control-sm" required><br>
				<label for="password">Retype Password</label>
				<input type="text" name="cpassword" placeholder="Retype Password" class="form-control form-control-sm" required><br>
				<button type="submit" name="submit" class="btn btn-success btn-sm">Reset Password</button>
				
				  <?php echo   $Home ;?>
				 
			</form>
		</div>
</body>
</html>
