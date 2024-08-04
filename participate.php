<?php 
session_start();
require_once("config.php");

//storing retrieved code into $code
$code = $_GET['code'];

//using session to save on server with security
$_SESSION['code']= $code;

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($conn){

    $sql = "select * from tests where code = '$code'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $user_id = $result['user_id'];

    $sql = "select * from users where id = $user_id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $username = $result['name'];
    $_SESSION['username']= $username;
}else{
    echo mysqli_connect_error();
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participate</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <h1>Friendship test<br>by <?php echo $username; ?>!</h1>
        <h2><u>Instructions:</u></h2>
            <ul>
                <li>Enter Your Name</li>
                <li>Select the category of questions you want to answer.</li>
                <li>Answer the questions about your friend.</li>
                <li>Check your score at the scoreboard.</li>
            </ul>
        <a href="login.php" class="submit">START</a>
    </div>
</body>
</html>