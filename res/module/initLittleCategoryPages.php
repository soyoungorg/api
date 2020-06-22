<?php
//获取Url携带的参数
$littleCategoryId=$_GET["littleCategoryId"];
$currentPage=$_GET["currentPage"];
//获取cookie
if (isset($_COOKIE["littleCategoryCurrentPage"])){
    $currentPage=$_COOKIE["littleCategoryCurrentPage"];
}
if ($littleCategoryId==null){
    $littleCategoryId==11;
}

//连接数据库
include_once 'connect.php';

$queryInitLittleCategory="select * from page_info inner join user_info where little_category_id='$littleCategoryId' AND author_id=user_id order by update_time desc  limit 10";
$resultInitLittleCategory=mysqli_query($link,$queryInitLittleCategory);

if ($resultInitLittleCategory){
    while ($rowInitLittleCategory=mysqli_fetch_assoc($resultInitLittleCategory)){
        $reInitLittleCategoryId=$rowInitLittleCategory["page_id"];
        $reInitLittleCategoryLargeId=$rowInitLittleCategory["large_category_id"];
        $reInitLittleCategoryLittleId=$rowInitLittleCategory["little_category_id"];
        $reInitLittleCategoryTitle=$rowInitLittleCategory["page_title"];
        $reInitLittleCategoryDescription=$rowInitLittleCategory["page_description"];
        $reInitLittleCategoryPath=$rowInitLittleCategory["page_path"];
        $reInitLittleCategoryLike=$rowInitLittleCategory["like_count"];
        $reInitLittleCategoryComment=$rowInitLittleCategory["comment_count"];
        $reInitLittleCategoryView=$rowInitLittleCategory["view_count"];
        $reInitLittleCategoryUpdate=$rowInitLittleCategory["update_time"];
        $reInitLittleCategoryAuthorId=$rowInitLittleCategory["author_id"];
        $reInitLittleCategoryNickname=$rowInitLittleCategory["nickname"];
        $reInitLittleCategoryHeadSculpture=$rowInitLittleCategory["head_sculpture"];
        echo "<li>
    <a href='about.php' class='fly-avatar'>
        <img src=$reInitLittleCategoryHeadSculpture alt=$reInitLittleCategoryNickname>
    </a>
    <h2>
        <a class='layui-badge'>$reInitLittleCategoryLargeId</a>
        <a class='layui-badge'>$reInitLittleCategoryLittleId</a>
        <a href='pageDetail.php'>$reInitLittleCategoryTitle</a>
        <p>$reInitLittleCategoryDescription</p>
    </h2>
    <div class='fly-list-info'>
        <a href='about.php' link>
            <cite>$reInitLittleCategoryNickname</cite>
            <!--
            <i class='iconfont icon-renzheng' title='认证信息：XXX'></i>
            <i class='layui-badge fly-badge-vip'>VIP3</i>
            -->
        </a>
        <span>$reInitLittleCategoryUpdate</span>

        <span class='fly-list-kiss layui-hide-xs' title='浏览量'><i class='iconfont icon-liulanyanjing'></i> $reInitLittleCategoryView</span>
        <span class='fly-list-kiss layui-hide-xs' title='点赞数'><i class='iconfont icon-zan '></i> $reInitLittleCategoryLike</span>
        <span class='fly-list-kiss layui-hide-xs' title='评论数'><i class='iconfont icon-pinglun1 '></i> $reInitLittleCategoryComment</span>
        <!--<span class='layui-badge fly-badge-accept layui-hide-xs'>已结</span>-->
        <span class='fly-list-nums'>
                <i class='iconfont icon-daima' title='回复'></i> Hello AI
              </span>
    </div>
    <div class='fly-list-badge'>
        <!--<span class='layui-badge layui-bg-red'>精帖</span>-->
    </div>
</li>";
    }
}
