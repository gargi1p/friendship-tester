<?php 
session_start();
require_once("config.php");
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($conn){

    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
    }else{
        $cat_id = 1;
    }

    $sql = "select * from categories where id=$cat_id";

    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    
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
    <title><?php echo $result['name']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <h1>Answer the Questions for Category</h1>
        <h2><u><?php echo $result['name']; ?></u></h2>
        <img id="category-image" src="<?php echo $result['image']; ?>"><br>
        <a href="<?php echo "$baseURL/ques.php?cat_id=$cat_id&ques_no=1"; ?>" class="submit">NEXT</a> 
    </div>
</body>
</html>