<?php
//获取表单参数
$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];

//连接数据库
include_once 'connect.php';
$insertMessage="insert into message (uuid, name, email, subject, content, create_time) values (uuid(),'$name','$email','$subject','$message',now())";
$resultMessage=mysqli_query($link,$insertMessage);
if ($resultMessage){
    echo "<script>alert('留言成功,稍后请注意查收邮件回复哦！');window.location.href='../../index.php';</script>";
}else{
    echo "<script>alert('留言失败！请重试');window.history.go(-1);</script>";
}
