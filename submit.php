<?php 
	session_start(); 
	include 'db_connect.php';
	$li = $_SESSION['li'];
	$app = mysqli_real_escape_string($db, $_GET['key']);
	$query = "SELECT * FROM users_to_applications WHERE user = '$li' AND application_key = '$app';";
	$result = mysqli_query($db, $query);
	if ($row = mysqli_fetch_array($result)) {
		$query = "SELECT * FROM users_to_applications WHERE user = 'admin' AND application_key = '$app';";
		$result = mysqli_query($db, $query);
		if(!($row = mysqli_fetch_array($result))) {
			$query = "INSERT INTO users_to_applications WHERE user = 'admin' AND application_key = '$app';";
		}else{
			echo "ONE: $app";
		}
	}else{
		echo "TWO: $app";
	}
?>
<HTML>
	<HEAD>
		<?php
			echo "<meta HTTP-EQUIV='REFRESH' content='0; url=expedited1.php?key=$app'/>";
		?>
	</HEAD>
</HTML>