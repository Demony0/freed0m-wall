<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php_simple_logIn_system/php/auth.php';
    $con=authentication();
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $data = user_action('user','SELECT',null,null,$username,null,null);
        $details = $data->fetch_assoc();
        if(!isset($details['username'])){
            user_action('user','INSERT',$fname,$lname,$username,$password,null);
            echo header('location:./login.php');
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
    <title>FreedomWall-REGISTER</title>
</head>
<body>
    <header></header>
    <main>
        <form action="register.php" method='post'>
            <a href='../index.php'><img src="../icon/back-arrow.png" alt="back" class="back"></a>
            <label for="fname">First Name:</label><input type="text" name="fname" id="fname" required>
            <label for="lname">Last Name:</label><input type="text" name="lname" id="lname" required>
            <label for="username">User Name:</label><input type="text" name="username" id="username" required>
            <label for='password'>Password:</label><input type="password" name="password" id="password" required>
            <br />
            <input type="submit" name='submit' id='submit' value="REGISTER">
        </form>
        <div class='circle_1'></div>
        <div class='circle_2'></div>
    </main>   
</body>
</html>