<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php_simple_logIn_system/php/auth.php';
    $id=null;    
    $data = user_bio('user','SELECT',$id);
    $details=$data->fetch_assoc();
    $data_post=post_on_the_wall();
    $post_details=$data_post->fetch_assoc();    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>FreedomWall</title>
</head>
<body>
    <header>
        <h2><a href='./index.php'><span>Freedom</span><span>WALL</span></a></h2>
        <div>
            <div><a href='./php/login.php'>LOG IN</a></div>
            <div><a href='./php/register.php'>REGISTER</a></div>
        </div>
    </header>

    <main>
        <div class="user_posted">
            <?php
                if(isset($post_details)){
                    do{
                    
                        echo "<div class=name_index>".strtoupper($post_details['fname']." ".$post_details['lname'])."<br />".$post_details['post_text']."</div><br />";
                    
                    }while($post_details=$data_post->fetch_assoc());
                }  
            ?>    
        </div>

        
        <div class='circle_1'></div>
        <div class='circle_2'></div>
    </main>
</body>
</html>