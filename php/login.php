<?php

    include $_SERVER['DOCUMENT_ROOT'].'/php_simple_logIn_system/php/auth.php';
    $con=authentication();
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $data=  user_action('user','SELECT',null,null,$username,$password,null);
        $details = $data->fetch_assoc();
        if(isset($details['username']) && isset($details['password'])){
            echo header('location:./freedom_wall.php?id='.$details['userid']);
        }else{
            echo "<div class=err>ACCOUNT DOESN`T EXIST </div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <title>FreedomWall-LOGIN</title>
</head>
<body>
    <main>
        <form action="login.php" method='post'>
            <a href='../index.php'><img src="../icon/back-arrow.png" alt="back" class="back"></a>
            <label for="username">User Name:</label><input type="text" name="username" id="username" required>
            <label for='password'>Password:</label><input type="password" name="password" id="password" required>
            <br />
            <input type="submit" name='submit' id='submit' value="LOGIN">
        </form>
        <div class='circle_1'></div>
        <div class='circle_2'></div>
    </main>   
</body>
</html>