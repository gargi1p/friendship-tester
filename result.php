<?php 
session_start();
require_once("config.php");
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($conn){
    $test_id = $_GET['test_id'];

    $sql = "select * from tests where id = $test_id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $user_id = $result['user_id'];

    $sql = "select * from users where id = $user_id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $username = $result['name'];

    $sql = "select * from results where test_id = $test_id";
    $query = mysqli_query($conn, $sql);
    

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
    <title>Result</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <h2>Friendship Test Quiz Result</h2>
        <h3><u>Your score is:</u></h3>
        <p><?php echo  $_SESSION['score']; ?></p>
        <h3>Who knows <?php echo  $username; ?> best?</h3>
        <table>
            <tr>
                <th>Participant Name</th>
                <th>Score</th>
            </tr>

            <?php 
                while($result = mysqli_fetch_assoc($query)){
                    $name = $result['participant_name'];
                    $score = $result['score'];
                    echo "<tr>
                            <td>$name</td>
                            <td>$score</td>
                          </tr>";
                }
            ?>
        </table>
        <a class="submit" href="index.php">Create Your Own Quiz</a>  
    </div>
</body>
</html>