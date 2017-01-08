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
		<br>
		<table width="500" bgcolor="orange" border="2">
			<tr>
				<th>s.n.</th>
				<th>name</th>
				<th>password</th>
				<th>email</th>
				<th>edit</th>
				<th>delete</th>
			</tr>
			<?php
				$select = "select * from users";
				$run = mysqli_query($con, $select);

				while ($row = mysqli_fetch_array($run)) {
					$user_id = $row['id'];
					$user_name = $row['name'];
					$user_pass = $row['pass'] ;
					$user_email = $row['email'] ;

				
			  ?>
			<tr align="center">
				<td><?php echo $user_id; ?></td>
				<td><?php echo $user_name; ?></td>
				<td><?php echo $user_pass; ?></td>
				<td><?php echo $user_email; ?></td>
				<td><a href="form.php?edit=<?php echo $user_id; ?>">Edit</a></td>
				<td><a href="form.php?delete=<?php echo $user_id; ?>">Delete</a></td>
			</tr>
			<?php } ?>
		</table>

		<?php 

			if(isset($_GET['delete'])) {
				$delete_id = $_GET['delete'];

				$delete = "delete from users where id='$delete_id'";
				$run_delete = mysqli_query($con, $delete);

				if($run_delete) {
					echo "<script>confirm('a user has been deleted');</script>";
					echo "<script>window.open('form.php', '_self');</script>";
				}

			}

		 ?>
	</body>
</html>