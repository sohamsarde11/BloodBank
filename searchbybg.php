<?php

// Username is root
$user = 'root';
$password = '';
$bgm=[];
// Database name is gfg
$database = 'test';

// Server is localhost with
// port number 3308
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>BG DONOR DETAILS</title>
	<!-- CSS FOR STYLING THE PAGE -->
    
	<style>
section{max-width:80% ; 
    padding: 34px; 
    margin: auto;
}
input{
    align-items: center;
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    font-size: 16px;
    width: 20%;
    margin: 11px 0px;
    padding: 7px;
}
}
table {
    margin: 0 auto;
    font-size: large;
    border: 1px solid black;
}

h2 {
    text-align: center;
    color:red;
    font-size: xx-large;
    font-family: 'Gill Sans', 'Gill Sans MT',
    ' Calibri', 'Trebuchet MS', 'sans-serif';
}

td {
    background-color:#E4F5D4;
    border: 1px solid black;
}

th,
td {
    font-weight: bold;
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}

td {
    font-weight: lighter;
}
.bg{
    width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 0.7;
}
h1 {
    text-align: center;
    color: rgb(245, 219, 219);
    font-size: 50px;
    font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    background-color: red;
    border-radius: 6px;
}
form {display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    margin: auto;
}
.btn{
    max-width:80% ; 
    padding: 34px; 
    margin: auto;
    display: flex;
    align-items:center;
    justify-content: center;
    flex-direction: column;
    align-self: center;
    color: white;
    background:purple;
    padding: 8px 12px;
    font-size: 20px;
    border: 2px solid white;
    border-radius: 14px;
    cursor: pointer;
}
</style>
</head>

<body>
<img class="bg" src="bg.jpg" alt="blood bank">

	<section>
    
    <h1>+ LIFE LINE BLOOD BANK +</h3>
    
    <h2> SEAECH AVAILABLE DONORS BY BLOOD GROUP</h2>


<form action="searchbybg.php" method="post">
            <input type="text" name="bgm" id="bgm" placeholder="Enter BLOODGROUP to Search">
            <button class="btn">Submit</button> 
</form>
<?php
error_reporting(0);
$bgm = $_POST['bgm'];
// SQL query to select data from database
$sql = "SELECT * FROM `bloodbank` WHERE bloodgroup='$bgm' ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
       
		<h2>REGISTRED BLOOD DONORS</h2>
        
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
            <td><b>Donor Id</td>
            <td><b>Full Name</td>
            <td><b>Age</td>
            <td><b>Gender</td>
            <td><b>bloodgroup</td>
            <td><b>email</td>
            <td><b>phone</td>
            <td><b>desc</td>
            <td><b>status</td>
            <td><b>date of ReG.</td>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
            
            while($rows=$result->fetch_assoc())
                {
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['age'];?></td>
				<td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['bloodgroup'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><?php echo $rows['other'];?></td>
                <td><?php echo $rows['status'];?></td>
                <td><?php echo $rows['dt'];?></td>

                </tr>
            
			<?php
			}	
			?>
		</table>
	</section>
</body>

</html>