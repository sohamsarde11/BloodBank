<?php
$insert = false;
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
<link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ADMIN PAGE</title>
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
    width: 25%;
    margin: 11px 0px;
    padding: 7px;
}
}
table {
    margin: 0 auto;
    font-size: large;
    border: 1px solid black;
}
.h4{
    max-width:80% ; 
    padding: 34px; 
    margin: auto;
    font-size: 30px;
    text-align: center;
    font-family: 'Sriracha', cursive;

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
.submitMsg{ 
    max-width:80% ; 
    padding: 34px; 
    margin: auto;
    font-size: 20px;
    text-align: center;
    font-family: 'Sriracha';
    color: green;
}
}
</style>
</head>

<body>
<img class="bg" src="bg.jpg" alt="blood bank">

	<section>
    
    <h1>+ LIFE LINE BLOOD BANK +</h3>
    <h2> ADMIN PAGE </h2>
    <p class="h4">UPDATE DONATION STATUS</p>
<form action="updatebyid.php" method="post">
            <input type="text" name="bgm" id="bgm" placeholder="Enter ID to update">
            <button class="btn">Submit</button> 
</form>
<?php
error_reporting(0);
$bgm = $_POST['bgm'];
// SQL query to select data from database
$sql = "UPDATE `bloodbank` SET `status`='1' WHERE `id`= '$bgm'";

//$result = $mysqli->query($sql);

if($mysqli->query($sql) == true){
        
    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $mysqli->error";
} 

// Close the database connection

    
?>

<p class="h4">DELETE DONOR DETAILS</p>
<form action="updatebyid.php" method="post">
            <input type="text" name="del" id="del" placeholder="Enter ID to DELETE">
            <button class="btn">Submit</button>
</form>
<?php
error_reporting(0);
$del = $_POST['del'];
// SQL query to select data from database
$sql = "DELETE FROM `bloodbank` WHERE `bloodbank`.`id` = '$del'";

//$result = $mysqli->query($sql);

if($mysqli->query($sql) == true){
        
    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $mysqli->error";
} 

// Close the database connection
$mysqli->close();
    
?>
      
		
	</section>
</body>

</html>