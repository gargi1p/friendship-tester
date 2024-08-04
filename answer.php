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

    if(isset($_GET['ques_no'])){
        $ques_no = $_GET['ques_no'];
    }else{
        $ques_no = 1;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $question_id = $_POST['question_id'];
        $answer = $_POST['answer'];

        if(!isset($_SESSION['answers'])){
            // initializing a session variable named 'answers' and setting its value to an empty array 
            $_SESSION['answers'] = array(); 
        }

        //creating an array having two elements in it 
        $data = array(
            "question_id" => $question_id,
            "answer" => $answer
        );

        // adding data to an array
        array_push($_SESSION['answers'], $data);

        if($ques_no == 10){

            header("location:$baseURL/calc_score.php");
        }else{
            $ques_no = $ques_no + 1;
            header("location:$baseURL/answer.php?cat_id=$cat_id&ques_no=$ques_no");
        }

    }else{
        $offset = $ques_no - 1;

        $sql = "select * from questions where category_id=$cat_id limit 1 offset $offset"; 

        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
    }

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
    <title>Answer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="main">
    <h3>Question <?php  echo $ques_no; ?> of 10</h3>
      <p id="question"><?php echo  str_replace("your", $_SESSION['username']."'s", $result['question']); ?></p>
        <form id="options" method="POST">
            <input type="hidden" name="question_id" value="<?php echo $result['id']; ?>" required>
            <label>
               <input type="radio" name="answer" value="1" required><?php echo $result['option1']; ?>
            </label>
            <label>
               <input type="radio" name="answer" value="2" required><?php echo $result['option2']; ?>
            </label>
            <label>
                <input type="radio" name="answer" value="3" required><?php echo $result['option3']; ?>
            </label>
            <label>
                <input type="radio" name="answer" value="4" required><?php echo $result['option4']; ?>
            </label>

            <button id="ans-submit" class="submit" type="submit">
                <?php 
                    if(($cat_id == 1 && $ques_no == 10) || ($cat_id == 2 && $ques_no == 10) || ($cat_id == 3 && $ques_no == 10)){
                        echo "SUBMIT";
                    }else{
                        echo "NEXT";
                    }
                ?>
            </button>
        </form>
   </div> 

   <script src="js/ques.js"></script>
</body>
</html>