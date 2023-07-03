<?php
$insert = false;
if(isset($_POST['name'])){
    

    $server = "localhost" ;
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection failed due to ".mysqli_connect_error());
    }

    //echo "success connecting to DB"
    $name = $_POST['name'];
    $gender =$_POST['gender'] ;
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $sql ="INSERT INTO `cec_trip'.'cec_trip` (`name`, `age`, `gendre`, `phone`, `other`,
    `Date/Time`) VALUES ('$name', '$age', '$gender', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true){
       // echo "Successfully inserted";
       $insert= true;

    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="CEC Manglore">
    <div class="container">
        <h1>Welcome To CEC Travel Form</h1>
        <p>Enter your details for the trip and submit</p>
        <?php
        if($insert == true){
        echo"<p class='submitmsg'>Thanks for submitting the form and joining us for the trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="Name" id="name" placeholder="Enter Name">
            <input type="text" name="Age" id="name" placeholder="Enter Age">
            <input type="email" name="email" id="email" placeholder="Enter Mail">
            <input type="Phone" name="Phone" id="Phone" placeholder="Enter ph.no">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter suggestions">

</textarea>
<button class="btn">submit</button>



</form>   
 </div>
    <script src="index.jss"></script>
    
</body>
</html>