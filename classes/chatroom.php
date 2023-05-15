<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm</title>
    <link rel="stylesheet" href="assets/css/chatroom.css">
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['auth'])){
            header('location:login.php');
        }
    ?>
    <h1>Welcome to Chatroom</h1>

    <div id="chatroom">
        <div class="messages">
            
        </div>
        <div class="input">
            <input type="text" id="input" placeholder="Enter your message">
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chatroom.js"></script>
</body>
</html>