<?php
//获取要点赞的评论Id
$commentId=$_GET["commentId"];
$commentLikeCount=$_GET["commentLikeCount"];
$commentLikeCount++;

//连接数据库进行更新
include_once 'connect.php';
$updateCommentLike="Update comment_info set like_count='$commentLikeCount'";
$resultUpdate=mysqli_query($link,$updateCommentLike);

echo $commentLikeCount;