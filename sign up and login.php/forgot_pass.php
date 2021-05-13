<?php include('connect_forgot.php');
session_start();
$message = $link = '';
if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$query = "SELECT * FROM users WHERE email = '".$email."'";
	$result = $conn->query($query);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$id = $row['id'];
		$id_encode = base64_encode($id);
		$link = "<a href='Reset_pass.php?MnoQtyPXZORTE=$id_encode' class='btn btn-info btn-sm'>Click here to reset</a>";
	}
	}else{
		$message = "<div class='alert alert-danger'>Invalid Email..!!</div>";
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
<style>.bg-secondary{
	margin:130px auto;
	
}
	</style>
</head>
<body  class="bg-secondary">
		<div class="container w-50 mt-5">
			<form class="bg-light p-5 shadow-lg" method="post">
				<?php echo $message; ?>
				<h1 class="text-success">Forgot Password</h1>
				
				<label for="Email">Email</label>
				<input type="email" name="email" placeholder="Enter your registered email id" class="form-control form-control-sm" required><br>
				<button type="submit" name="submit" class="btn btn-success btn-sm">Reset</button>
				<?php echo $link; ?>
			</form>
		</div>
</body>
</html>
