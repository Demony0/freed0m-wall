<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php_simple_logIn_system/php/auth.php';


    if(isset($_GET['logout'])){
        $_SESSION['id']=null;
        echo header('location:../index.php');
    }

    if(isset($_GET['id'])){
        $_SESSION['id']=$_GET['id'];
    }

    if(!isset($_SESSION['id'])){
        echo header('location:../index.php');
    }

    if(isset($_GET['post'])){
        $userid=$_SESSION['id'];
        $post=$_GET['content'];
        if(isset($post)){
         post_the_content('INSERT','post',$userid,$post);
         $_GET['post']=false;
        }
        echo header('location:./freedom_wall.php');
    }

    $id=$_SESSION['id'];    
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
    <link rel="stylesheet" href="../css/index.css">
    <title>FreedomWall</title>
</head>
<body>
    <header>
        <h2><a href='./freedom_wall.php'><span>Freedom</span><span>WALL</span></a></h2>
        <div>
            <div><?php  echo strtoupper($details['fname'].' '.$details['lname'])    ?></div>
            <div><a href="./setting.php">SETTING</a></div>
            <form action="freedom_wall.php" method="GET">
                <input type="submit" value="Logout" name="logout" style='color:black;margin-right:10px;'>
            </form>
        </div>
    </header>

    <main>
        <div class="post">
            <form action="freedom_wall.php" method='get'>
                <label>WHAT`S ON YOUR MIND?:</label>
                <input type="text" name="content" id="content">
                <input type="submit" value="POST" name="post" style="color:black;font-weight:bold;">
            </form>
        </div>


        <div class="user_posted">
            <?php
                if(isset($post_details)){
                    do{
                        if($post_details['userid']==$id){
                            echo "<div class=name_diff>".strtoupper($post_details['fname']." ".$post_details['lname'])."<br />".$post_details['post_text']."</div><br/>";
                        }else{
                            echo "<div class=name>".strtoupper($post_details['fname']." ".$post_details['lname'])."<br />".$post_details['post_text']."</div><br />";
                        }
                    }while($post_details=$data_post->fetch_assoc());  
                }
            ?>    
        </div>
        
        <div class='circle_1'></div>
        <div class='circle_2'></div>
    </main>
</body>
</html> 