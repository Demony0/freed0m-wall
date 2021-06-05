<?php
    
    SESSION_START();

    //connection between database and webpage;
    function authentication(){
        $username='root';
        $password='admin123';
        $host='localhost';
        $database='login_system';
        $con=new mysqli($host,$username,$password,$database);
        if ($con->connect_error){
            echo $con->connect_error;
        }else{
            return $con;
        }
    }

    //register the user into database
    function user_action($table,$mode,$fname,$lname,$username,$password,$id){
        $con = authentication();
        if($mode=='INSERT'){
            $sql = "$mode INTO $table values('','$fname','$lname','$username','$password')";
        }else if ($mode=='SELECT' && $password==null && $id==null){
            $sql = "$mode * FROM $table WHERE `username`='$username'";
        }else if ($mode=='SELECT' && $password==null && isset($id)){
            $sql = "$mode * FROM $table WHERE `username`='$username' and `userid`='$id'";
        }else if($mode =='SELECT' && $password!=null){
            $sql = "$mode * FROM $table WHERE `username`='$username' && `password`='$password'";
        }else if($mode == 'UPDATE'){
            $sql = "$mode $table SET `username`='$username', `fname`='$fname', `lname`='$lname' ,`password`='$password' where `userid`='$id'";
        }
        $data=$con->query($sql) or die($con->error);
        return $data;
    }

    //Primary key is being use to get the rest of the data
    function user_bio($table,$mode,$id){
        $con=authentication();
        $sql = "$mode * FROM $table WHERE `userid`='$id'";
        $data=  $con->query($sql) or die($con->error);
        return $data;
    }


    //post the users thoughts on the wall
    function post_the_content($mode,$table,$userid,$post){
        $con=authentication();
        $sql = "$mode INTO $table values('','$userid','$post')";
        $data= $con->query($sql) or die($con->error);
    }

    function post_on_the_wall(){
        $con=authentication();
        $sql='SELECT user.userid,user.fname,user.lname,post.post_text FROM user INNER JOIN post on user.userid=post.userid order by postid DESC ';
        $data = $con->query($sql) or die($con->error);
        return $data;
    }












?>