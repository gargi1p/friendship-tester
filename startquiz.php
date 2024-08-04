<?php 
session_start();

//including config.php file in this file
require_once("config.php");

//checking if request is send by post method
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];

    //making database connection
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if($conn){
        
        $sql = "insert into users (name) values ('$name')";

        //executing sql query
        $query = mysqli_query($conn, $sql);

        if($query){
            //retrieving the auto generated id from last query
            $user_id = mysqli_insert_id($conn);   

            //generating unique code string
            $code = md5(time());     

            $sql = "insert into tests (user_id, code) values ($user_id, '$code')";
            $query = mysqli_query($conn, $sql);

            if($query){
                $test_id = mysqli_insert_id($conn);
                
                // storing value temporarily to the session variable
                $_SESSION['user_id'] = $user_id;
                $_SESSION['code'] = $code;
                $_SESSION['test_id'] = $test_id;
                
                //redirecting to a different URL
                header("location:$baseURL/category.php?cat_id=1");
            }else{
                echo mysqli_error($conn);
            }
            
        }else{
            echo mysqli_error($conn);
        }

    }else{
        echo mysqli_connect_error();
    }

}else{
    echo "get method not supported";
}
?>