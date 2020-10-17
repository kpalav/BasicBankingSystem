<!Doctype html>
<html>
<head>
	<title>Transfer History</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <div class="topnav-right">
  <a class="active" href="transferdetails.php">Transfer History</a>
  <a class="active" href="viewusers.php">View Users</a>

  </div>
</div>
</div>  
<table class="viewusers">
	<h1>Transfer History</h1>
	<tr>
		<th>Sender</th>
		<th>Reciever</th>
		<th>Credit</th>
	</tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "banking");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}

	$sql = "SELECT * FROM transfer_history";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["from_user"] ."</td><td>".  $row["to_user"] ."</td><td>" .  $row["Credit"] ."</td></tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
    $conn-> close();
	?>
</table>
<div class="middle">
	<h3>by Krutika Palav</h3>
	<a class="btn" href="">
		<i class="fab fa-twitter"></i>
    </a>
    <a class="btn" href="">
        <i class="fab fa-instagram"></i>
    </a>
    <a class="btn" href="">
        <i class="fab fa-github"></i>
    </a>
    <a class="btn" href="">
       <i class="fab fa-linkedin"></i>
    </a>
</div>	
</body>
</html>