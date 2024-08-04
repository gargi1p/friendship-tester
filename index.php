<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendship Test Quiz</title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <div>
      <h1><u>Friendship Quiz- Test Your Bond</u></h1>
      <h2>Explore the Depths of Your Friendships: Take The Fun Quiz Now</h2>
      <h3>How well do you know your friend? Find out by playing this friendship quiz</h3>
      <div id="main">
        <h2>Instructions</h2>
            <ul>
                <li>Enter Your Name</li>
                <li>Answer the questions about yourself of each category.</li>
                <li>Your quiz-link will be ready.</li>
                <li>Share your quiz-link with your friends.</li>
                <li>Your friends will try to guess correct answer of selected category questions.</li>
                <li>Check the score of your friends at your quiz-link.</li>
            </ul>
            <form action="startquiz.php" method="POST">
                <h3>Enter Your Name:</h3>
                <input id="inputName" type="text" placeholder="Full Name" name="name" autocomplete="off">
                <button id="submit" type="submit" disabled>START</button>
            </form>
      </div>
    </div>

    <script src="js/index.js"></script>
</body>
</html>