<?php
/**
 * 此页面用于连接数据库
 * Created by 易康 Group,2020-01-20
 */
//header('Content-type:text/html;charset=utf-8');

//与mysql数据库建立连接,$link相当于获取数据库令牌
$link=@mysqli_connect('localhost','nextin','nextin','nextin',3306);
//连接错误时提示
if(mysqli_connect_errno()){
    exit(mysqli_connect_error());
}

//设置默认字符编码
mysqli_set_charset($link,'utf8');

//连接特定的数据库
//mysqli_select_db($link,'d2');

//关闭与特定数据库的连接
//mysqli_close($link);

