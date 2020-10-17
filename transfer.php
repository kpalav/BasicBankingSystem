<?php
$conn = mysqli_connect("localhost", "root", "", "banking");
if($conn-> connect_error){
	die("connection failed:". $conn-> connect_error);
}
$sql = "SELECT name, email, credit FROM students";
error_reporting(0);
$result = mysqli_query($conn,"SELECT *  FROM students");
$resul1 = mysqli_query($conn,"SELECT *  FROM students");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transfer Credits</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
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
<div class ='form'> 
	<h1 align ='center'> Transfer Money </h1>
</div> 
<div class='main'>
<form action="" method="GET" class = "form">
		<select  class= fromuser type="text"  name="u1" required value="">
		<option value ="">From User</option>
		<?php
                        while($tname = mysqli_fetch_array($result)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

        </select>
		<select  class =touser  type="text" name="u2" value="">
	     <option value ="">To User</option>
		<?php
                        while($tname = mysqli_fetch_array($resul1)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

        </select>
		
		<input type="text" id="amount" name="amt" placeholder="Enter amount">
		
		<input type="submit" id= submit name="submit" value=" Transfer">
		
	</form>
</div>

	<?php
	
			if($_GET['submit'])
			{
			$u1=$_GET['u1'];
			$u2=$_GET['u2'];
			$amt=$_GET['amt'];


			if($u1!="" && $u2!="" && $amt!="")
			{
				//update transaction changes in database
				$query1= "UPDATE students  SET credit = credit + '$amt' WHERE Name = '$u2' ";
				$data1= mysqli_query($conn, $query1);
				$query2= "UPDATE  students SET credit = credit  - '$amt' WHERE Name = '$u1' ";
				$data2= mysqli_query($conn, $query2);
				
				//insert into transaction_history
				    $query1 = "INSERT INTO transfer_history (from_user,to_user,Credit) VALUES('$u1','$u2','$amt')";
                                    $res2 = mysqli_query($conn,$query1);
				
                                          if($res2){
		                           	 $user1 = "SELECT * FROM students WHERE  Name='$u1' ";
                                                 $res=mysqli_query($conn,$user1);
                                                 $row_count=mysqli_num_rows($res);
			                      }
				
            

				     if ($data1 && $data2)
				     {
					$message="Successful transfer";
                                        echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}
				else
				{
					$message="Error While Commiting Transaction ";
					echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}

			}

			else
			{
				$message="All Fields are Mandatory";
				echo "<script type='text/javascript'>alert('$message');
                    </script>";
			}
		}
		

	?>
</div>	
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