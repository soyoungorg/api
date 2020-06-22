<?php
//连接数据库
include_once 'connect.php';

//获取表单参数
$username=$_POST["username"];
$content=$_POST["commentContent"];
$owner=$_GET["owner"];

//进行插入更新
$queryComment="insert into comment_info (uuid, content, owner, author, update_time, like_count) VALUES (uuid(),'$content','$owner','$username',now(),0)";
$resultComment=mysqli_query($link,$queryComment);
//进行更新
$updateComment="update page_info set comment_count=comment_count+1 where page_id='$owner'";
$resultUpdateComment=mysqli_query($link,$updateComment);
if ($resultComment&&$resultUpdateComment){
    $targetPageUrlPart="../../pageDetail.php?pageId=";
    $targetPageUrl=$targetPageUrlPart.$owner;
    echo "<script>alert('留言成功!');window.location.href= '$targetPageUrl' </script>";
}else{
    echo "<script>alert('留言失败！请重试！'); window.history.go(-1);</script>";
}



