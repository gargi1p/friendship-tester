<?php 
session_start();
require_once("config.php");

//assigning retrieved value from $SESSION superglobal array to $code
$code = $_SESSION['code'];
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

    $link = "$baseURL/participate.php?code=$code";

    $msg = "*FRIENDSHIP TEST QUIZ*\nHow well you know $username?\nTest your friendship with $username!\n\nClick here now!!\n$link";
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
    <title>Quiz Link</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <h2>Your Quiz is here</h2>
        <ol>
            <li>Copy your quiz-link.</li>
            <li>Send the link to your friends and encourage them to take your quiz.</li>
            <li>Share your quiz using one of the social networks below.</li>
        </ol>
        <p>Your quiz-link:</p>
        <input id="quiz-link" type="text" value="<?php echo "$link"; ?>">
        <a href="javascript:copyToClipboard();" class="share_button" data-action="copy_link" >Copy link</a>
        <p>Share your quiz:</p>
        <a href="https://wa.me/?text=<?php echo urlencode($msg); ?>" class="share_button" target="_blank" data-action="share/whatsapp/share">
            <img src="img/whatsapp-icon-.png" width="32" height="32">
            <span>WhatsApp</span>   
        </a>
        <a href="https://www.instagram.com/your-instagram-username=Check out this Friendship Test Quiz:https://technosanik.com/friendship/quiz/0fd71b?text=<?php echo urlencode($msg); ?>" class="share_button" target="_blank" data-action="share/instagram/share">
            <img src="img/instagram-icon-.jpg" width="32" height="32">
            <span>Instagram</span>   
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?text=<?php echo urlencode($msg); ?>" class="share_button" target="_blank" data-action="share/facebook/share">
            <img src="img/facebook-icon-.png" width="36" height="32">
           <span>Facebook</span>  
        </a>
        <a href="mailto:?subject=Check out this Friendship Test Quiz:<?php echo urlencode($msg); ?>" class="share_button" target="_blank" data-action="share/message/share">
            <img src="img/messages-icon-.webp"  width="34" height="33">
            <span>Message</span>   
        </a>
    </div>

    <script src="js/link.js"></script>
</body>
</html>