<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php_simple_logIn_system/php/auth.php';
    $con=authentication();
    if(!isset($_SESSION['id'])){
        echo header('location:../index.php');
    }
    if(isset($_POST['submit'])){
        $id=$_SESSION['id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $data = user_action('user','SELECT',null,null,$username,null,null);
        $data_2 = user_action('user','SELECT',null,null,$username,null,$id);
        $details = $data->fetch_assoc();
        $details_2 = $data_2->fetch_assoc();
        if((!isset($details['username']) && !isset($details_2['username'])) || isset($details['username'])==isset($details_2['username'])){
            user_action('user','UPDATE',$fname,$lname,$username,$password,$id);
            echo header('location:./freedom_wall.php');
        }else{
            echo "<div class=err>EMAIL ALREADY TAKEN</div>";
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
    <title>FreedomWall-SETTING</title>
</head>
<body>
    <header></header>
    <main>
        <form action="setting.php" method='post'>
            <a href='./freedom_wall.php'><img src="../icon/back-arrow.png" alt="back" class="back"></a>
            <label for="fname">First Name:</label><input type="text" name="fname" id="fname" required>
            <label for="lname">Last Name:</label><input type="text" name="lname" id="lname" required>
            <label for="username">User Name:</label><input type="text" name="username" id="username" required>
            <label for='password'>Password:</label><input type="password" name="password" id="password" required>
            <br />
            <input type="submit" name='submit' id='submit' value="UPDATE">
        </form>
        <div class='circle_1'></div>
        <div class='circle_2'></div>
    </main>   
</body>
</html>