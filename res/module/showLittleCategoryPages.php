<?php
//连接数据库
include_once 'connect.php';
//获取Url携带的参数
$sortValue=$_GET["sortValue"];
$littleCategoryId=$_GET["littleCategoryId"];
$page=$_GET["page"];
if ($littleCategoryId==null){
    $littleCategoryId=11;
}
if ($page==null){
    $page=1;
}
//$page=1;
//设置cookie
setcookie("littleCategoryCurrentPage",$page,time()+3600*6666,"/");
setcookie("littleCategoryCurrentSort",$sortValue,time()+3600*6666,"/");

//查询要获取的数据的上限与下线
$pageBottom=($page-1)*10;
$pageTop=$page*10-1;

if ($sortValue=="new"){
    //点击了查看该分类下的最新文章
    $queryLittleCategoryPageNew="select * from page_info inner join user_info where little_category_id='$littleCategoryId' AND author_id=user_id order by update_time desc limit $pageBottom,$pageTop";
    $resultLittleCategoryPageNew=mysqli_query($link,$queryLittleCategoryPageNew);
    if ($resultLittleCategoryPageNew){
        while ($rowLittleCategoryPageNew=mysqli_fetch_assoc($resultLittleCategoryPageNew)){
            $reLittleCategoryPageNewId=$rowLittleCategoryPageNew["page_id"];
            $reLittleCategoryPageNewLargeId=$rowLittleCategoryPageNew["large_category_id"];
            $reLittleCategoryPageNewLittleId=$rowLittleCategoryPageNew["little_category_id"];
            $reLittleCategoryPageNewTitle=$rowLittleCategoryPageNew["page_title"];
            $reLittleCategoryPageNewDescription=$rowLittleCategoryPageNew["page_description"];
            $reLittleCategoryPageNewPath=$rowLittleCategoryPageNew["page_path"];
            $reLittleCategoryPageNewLike=$rowLittleCategoryPageNew["like_count"];
            $reLittleCategoryPageNewComment=$rowLittleCategoryPageNew["comment_count"];
            $reLittleCategoryPageNewView=$rowLittleCategoryPageNew["view_count"];
            $reLittleCategoryPageNewUpdate=$rowLittleCategoryPageNew["update_time"];
            $reLittleCategoryPageNewAuthorId=$rowLittleCategoryPageNew["author_id"];
            $reLittleCategoryPageNewNickname=$rowLittleCategoryPageNew["nickname"];
            $reLittleCategoryPageNewHeadSculpture=$rowLittleCategoryPageNew["head_sculpture"];
            echo "<li>
    <a href='about.php' class='fly-avatar'>
        <img src=$reLittleCategoryPageNewHeadSculpture alt=$reLittleCategoryPageNewNickname>
    </a>
    <h2>
        <a class='layui-badge'>$reLittleCategoryPageNewLargeId</a>
        <a class='layui-badge'>$reLittleCategoryPageNewLittleId</a>
        <a target='_blank' href=$reLittleCategoryPageNewPath>$reLittleCategoryPageNewTitle</a>
        <p>$reLittleCategoryPageNewDescription</p>
    </h2>
    <div class='fly-list-info'>
        <a target='_blank' href='about.php' link>
            <cite>$reLittleCategoryPageNewNickname</cite>
            <!--
            <i class='iconfont icon-renzheng' title='认证信息：XXX'></i>
            <i class='layui-badge fly-badge-vip'>VIP3</i>
            -->
        </a>
        <span>$reLittleCategoryPageNewUpdate</span>

        <span class='fly-list-kiss layui-hide-xs' title='浏览量'><i class='iconfont icon-liulanyanjing'></i> $reLittleCategoryPageNewView</span>
        <span class='fly-list-kiss layui-hide-xs' title='点赞数'><i class='iconfont icon-zan '></i> $reLittleCategoryPageNewLike</span>
        <span class='fly-list-kiss layui-hide-xs' title='评论数'><i class='iconfont icon-pinglun1 '></i> $reLittleCategoryPageNewComment</span>
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
}elseif ($sortValue=="popular"){
    //点击了查看该分类下的最新文章
    $queryLittleCategoryPagePopular="select * from page_info inner join user_info where little_category_id='$littleCategoryId' AND author_id=user_id order by view_count desc limit $pageBottom,$pageTop";
    $resultLittleCategoryPagePopular=mysqli_query($link,$queryLittleCategoryPagePopular);
    if ($resultLittleCategoryPagePopular){
        while ($rowLittleCategoryPagePopular=mysqli_fetch_assoc($resultLittleCategoryPagePopular)){
            $reLittleCategoryPagePopularId=$rowLittleCategoryPagePopular["page_id"];
            $reLittleCategoryPagePopularLargeId=$rowLittleCategoryPagePopular["large_category_id"];
            $reLittleCategoryPagePopularLittleId=$rowLittleCategoryPagePopular["little_category_id"];
            $reLittleCategoryPagePopularTitle=$rowLittleCategoryPagePopular["page_title"];
            $reLittleCategoryPagePopularDescription=$rowLittleCategoryPagePopular["page_description"];
            $reLittleCategoryPagePopularPath=$rowLittleCategoryPagePopular["page_path"];
            $reLittleCategoryPagePopularLike=$rowLittleCategoryPagePopular["like_count"];
            $reLittleCategoryPagePopularComment=$rowLittleCategoryPagePopular["comment_count"];
            $reLittleCategoryPagePopularView=$rowLittleCategoryPagePopular["view_count"];
            $reLittleCategoryPagePopularUpdate=$rowLittleCategoryPagePopular["update_time"];
            $reLittleCategoryPagePopularAuthorId=$rowLittleCategoryPagePopular["author_id"];
            $reLittleCategoryPagePopularNickname=$rowLittleCategoryPagePopular["nickname"];
            $reLittleCategoryPagePopularHeadSculpture=$rowLittleCategoryPagePopular["head_sculpture"];
            echo "<li>
    <a href='about.php' class='fly-avatar'>
        <img src=$reLittleCategoryPagePopularHeadSculpture alt=$reLittleCategoryPagePopularNickname>
    </a>
    <h2>
        <a class='layui-badge'>$reLittleCategoryPagePopularLargeId</a>
        <a class='layui-badge'>$reLittleCategoryPagePopularLittleId</a>
        <a target='_blank' href='$reLittleCategoryPagePopularPath'>$reLittleCategoryPagePopularTitle</a>
        <p>$reLittleCategoryPagePopularDescription</p>
    </h2>
    <div class='fly-list-info'>
        <a target='_blank' href='about.php' link>
            <cite>$reLittleCategoryPagePopularNickname</cite>
            <!--
            <i class='iconfont icon-renzheng' title='认证信息：XXX'></i>
            <i class='layui-badge fly-badge-vip'>VIP3</i>
            -->
        </a>
        <span>$reLittleCategoryPagePopularUpdate</span>

        <span class='fly-list-kiss layui-hide-xs' title='浏览量'><i class='iconfont icon-liulanyanjing'></i> $reLittleCategoryPagePopularView</span>
        <span class='fly-list-kiss layui-hide-xs' title='点赞数'><i class='iconfont icon-zan '></i> $reLittleCategoryPagePopularLike</span>
        <span class='fly-list-kiss layui-hide-xs' title='评论数'><i class='iconfont icon-pinglun1 '></i> $reLittleCategoryPagePopularComment</span>
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
}elseif ($sortValue=="like"){
    //点击了查看该分类下的最新文章
    $queryLittleCategoryPageLike="select * from page_info inner join user_info where little_category_id='$littleCategoryId' AND author_id=user_id order by like_count desc limit $pageBottom,$pageTop";
    $resultLittleCategoryPageLike=mysqli_query($link,$queryLittleCategoryPageLike);
    if ($resultLittleCategoryPageLike){
        while ($rowLittleCategoryPageLike=mysqli_fetch_assoc($resultLittleCategoryPageLike)){
            $reLittleCategoryPageLikeId=$rowLittleCategoryPageLike["page_id"];
            $reLittleCategoryPageLikeLargeId=$rowLittleCategoryPageLike["large_category_id"];
            $reLittleCategoryPageLikeLittleId=$rowLittleCategoryPageLike["little_category_id"];
            $reLittleCategoryPageLikeTitle=$rowLittleCategoryPageLike["page_title"];
            $reLittleCategoryPageLikeDescription=$rowLittleCategoryPageLike["page_description"];
            $reLittleCategoryPageLikePath=$rowLittleCategoryPageLike["page_path"];
            $reLittleCategoryPageLikeLike=$rowLittleCategoryPageLike["like_count"];
            $reLittleCategoryPageLikeComment=$rowLittleCategoryPageLike["comment_count"];
            $reLittleCategoryPageLikeView=$rowLittleCategoryPageLike["view_count"];
            $reLittleCategoryPageLikeUpdate=$rowLittleCategoryPageLike["update_time"];
            $reLittleCategoryPageLikeAuthorId=$rowLittleCategoryPageLike["author_id"];
            $reLittleCategoryPageLikeNickname=$rowLittleCategoryPageLike["nickname"];
            $reLittleCategoryPageLikeHeadSculpture=$rowLittleCategoryPageLike["head_sculpture"];
            echo "<li>
    <a href='about.php' class='fly-avatar'>
        <img src=$reLittleCategoryPageLikeHeadSculpture alt=$reLittleCategoryPageLikeNickname>
    </a>
    <h2>
        <a class='layui-badge'>$reLittleCategoryPageLikeLargeId</a>
        <a class='layui-badge'>$reLittleCategoryPageLikeLittleId</a>
        <a target='_blank' href='$reLittleCategoryPageLikePath'>$reLittleCategoryPageLikeTitle</a>
        <p>$reLittleCategoryPageLikeDescription</p>
    </h2>
    <div class='fly-list-info'>
        <a target='_blank' href='about.php' link>
            <cite>$reLittleCategoryPageLikeNickname</cite>
            <!--
            <i class='iconfont icon-renzheng' title='认证信息：XXX'></i>
            <i class='layui-badge fly-badge-vip'>VIP3</i>
            -->
        </a>
        <span>$reLittleCategoryPageLikeUpdate</span>

        <span class='fly-list-kiss layui-hide-xs' title='浏览量'><i class='iconfont icon-liulanyanjing'></i> $reLittleCategoryPageLikeView</span>
        <span class='fly-list-kiss layui-hide-xs' title='点赞数'><i class='iconfont icon-zan '></i> $reLittleCategoryPageLikeLike</span>
        <span class='fly-list-kiss layui-hide-xs' title='评论数'><i class='iconfont icon-pinglun1 '></i> $reLittleCategoryPageLikeComment</span>
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
}elseif ($sortValue=="comment"){
    //点击了查看该分类下的最新文章
    $queryLittleCategoryPageComment="select * from page_info inner join user_info where little_category_id='$littleCategoryId' AND author_id=user_id order by comment_count desc limit $pageBottom,$pageTop";
    $resultLittleCategoryPageComment=mysqli_query($link,$queryLittleCategoryPageComment);
    if ($resultLittleCategoryPageComment){
        while ($rowLittleCategoryPageComment=mysqli_fetch_assoc($resultLittleCategoryPageComment)){
            $reLittleCategoryPageCommentId=$rowLittleCategoryPageComment["page_id"];
            $reLittleCategoryPageCommentLargeId=$rowLittleCategoryPageComment["large_category_id"];
            $reLittleCategoryPageCommentLittleId=$rowLittleCategoryPageComment["little_category_id"];
            $reLittleCategoryPageCommentTitle=$rowLittleCategoryPageComment["page_title"];
            $reLittleCategoryPageCommentDescription=$rowLittleCategoryPageComment["page_description"];
            $reLittleCategoryPageCommentPath=$rowLittleCategoryPageComment["page_path"];
            $reLittleCategoryPageCommentLike=$rowLittleCategoryPageComment["like_count"];
            $reLittleCategoryPageCommentComment=$rowLittleCategoryPageComment["comment_count"];
            $reLittleCategoryPageCommentView=$rowLittleCategoryPageComment["view_count"];
            $reLittleCategoryPageCommentUpdate=$rowLittleCategoryPageComment["update_time"];
            $reLittleCategoryPageCommentAuthorId=$rowLittleCategoryPageComment["author_id"];
            $reLittleCategoryPageCommentNickname=$rowLittleCategoryPageComment["nickname"];
            $reLittleCategoryPageCommentHeadSculpture=$rowLittleCategoryPageComment["head_sculpture"];
            echo "<li>
    <a href='about.php' class='fly-avatar'>
        <img src=$reLittleCategoryPageCommentHeadSculpture alt=$reLittleCategoryPageCommentNickname>
    </a>
    <h2>
        <a class='layui-badge'>$reLittleCategoryPageCommentLargeId</a>
        <a class='layui-badge'>$reLittleCategoryPageCommentLittleId</a>
        <a target='_blank' href='$reLittleCategoryPageCommentPath'>$reLittleCategoryPageCommentTitle</a>
        <p>$reLittleCategoryPageCommentDescription</p>
    </h2>
    <div class='fly-list-info'>
        <a target='_blank' href='about.php' link>
            <cite>$reLittleCategoryPageCommentNickname</cite>
            <!--
            <i class='iconfont icon-renzheng' title='认证信息：XXX'></i>
            <i class='layui-badge fly-badge-vip'>VIP3</i>
            -->
        </a>
        <span>$reLittleCategoryPageCommentUpdate</span>

        <span class='fly-list-kiss layui-hide-xs' title='浏览量'><i class='iconfont icon-liulanyanjing'></i> $reLittleCategoryPageCommentView</span>
        <span class='fly-list-kiss layui-hide-xs' title='点赞数'><i class='iconfont icon-zan '></i> $reLittleCategoryPageCommentLike</span>
        <span class='fly-list-kiss layui-hide-xs' title='评论数'><i class='iconfont icon-pinglun1 '></i> $reLittleCategoryPageCommentComment</span>
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
}
?>
