<!DOCTYPE html>

<?php 
$con = mysqli_connect("localhost","root","122333","php") or die("sikinti var");
 ?>
	<head>
		<title>PHP % mysql </title>
	</head>
	<body>
		<form action="form.php" method="post">
			<input type="text" name="name" placeholder="write name"> <br/>
			<input type="password" name="pass" placeholder="write password"><br/>
			<input type="text" name="email" placeholder="write email"><br/>
			<input type="submit" name="sub" value="Insert Data"><br/>
		</form>

		<?php 

			if(isset($_POST['sub'])) {
				$name = $_POST['name'];
				$pass = $_POST['pass'];
				$email = $_POST['email'];

				$insert = "insert into users (name, pass,email) values ('$name', '$pass', '$email')";

				$run = mysqli_query($con, $insert);

				if($run) {
					echo "<h3> succes</h3>";
				}

			}

		 ?>
	</body>
</html>