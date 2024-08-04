<?php 
session_start();
require_once("config.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cat_id = $_POST['cat_id'];
    $name = $_POST['name'];

    $_SESSION['name'] = $name;

    header("location:$baseURL/answer.php?cat_id=$cat_id&ques_no=1");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <form action="" method="POST" id="formLogin" onsubmit="return validate();">
            <h3>Enter Your Name</h3>
            <input id="input-name" type="text" name="name" placeholder="Full Name" autocomplete="off">
            <input type="hidden" name="cat_id" id="cat_id">
            <h3><u>Select category</u></h3>
            <div id="cat_name">
                <h4>entertainment</h4>
                <h4>food</h4>
                <h4>childhood</h4>
            </div>
            <div id="cat_select">
            <img src="img/entertainment.jpg" class="cat_image" alt="entertainment" width="100px" height="70px" data-category="category1">
            <img src="img/food.webp" class="cat_image" alt="food" width="100px" height="70px" data-category="category2">
            <img src="img/childhood.jpg"class="cat_image" alt="childhood" width="95px" height="70px" data-category="category3">
            </div>
            <button id="info-submit" class="submit" type="submit" disabled>SUBMIT</button>

        </form>
    </div> 

    <script src="js/login.js"></script>
</body>
</html>