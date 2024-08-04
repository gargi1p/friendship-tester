<?php 
session_start();
require_once("config.php");
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($conn){

    $code = $_SESSION['code'];
    $name = $_SESSION['name'];
    $answers = $_SESSION['answers'];

    $score = 0;

    $sql = "select * from tests where code='$code'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    $test_id = $result['id'];

    foreach($answers as $answer){
        $ques_id = $answer['question_id'];
        $ans = $answer['answer'];

        $sql = "select * from answers where test_id = $test_id and question_id=$ques_id";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);

        if($result['answer']== $ans){
            $score++;
        }
    }
    
    $_SESSION['score'] = $score;

    $sql = "insert into results (score, participant_name, test_id) values ($score, '$name', $test_id)";
    $query = mysqli_query($conn, $sql);

    header("location:$baseURL/result.php?test_id=$test_id");

}else{
    echo mysqli_connect_error();
    die();
}
?>