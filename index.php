<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name=$_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $bloodgroup=$_POST['bloodgroup'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `test`.`bloodbank` (`name`, `age`, `gender`, `bloodgroup`, `email`, `phone`, `other`, `dt`) VALUES ('$name','$age' , '$gender', '$bloodgroup', '$email', '$phone', '$desc', current_timestamp());";
    

    // Execute the query
    if($con->query($sql) == true){
        
        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    } 

    // Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOD BANK PORTAL</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="blood bank">
    <div class="container">
        <h1>+ LIFE LINE BLOOD BANK +</h1>
        <p>FOR EMERGENCY CALL - 1800102102<br>
        DONOR REGISTRATION FORM<br></p>
        <p class="secondline">Enter your details and submit this form to confirm your participation as BLOOD DONOR </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for SAVING LIVES </p>";
        }
        ?>
            <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="bloodgroup" id="bloodgroup" placeholder="Enter your BLOOD GROUP">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="2" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>   
        </form>
    </div>
    <script src="index.js"></script>
<p class="h4">List Of All Registered Candidates</p>
<a href='http://localhost/cwh/search.php'> <button class="btn2">click here</button></a>
<p class="h4">Search by BLOODGROUP</p>
<a href='http://localhost/CWH/searchbybg.php'><button class="btn2">click here</button></a>
<br>
<a href='http://localhost/CWH/rdonated.php'><button class="btn2">RECENT DONORS</button></a>
<a href='http://localhost/CWH/updatebyid.php'><button class="btn2">Admin Page</button></a>
</body>
</html>