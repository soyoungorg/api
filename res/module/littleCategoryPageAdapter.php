<?php
//获取目标页面页数
$page=$_GET["page"];
$littleCategoryId=$_GET["littleCategoryId"];

setcookie("littleCategoryCurrentPage",$page,time()+3600*6666,"/");

//实现内容的翻页
$prePage=$page-1;
$nextPage=$page+1;
include_once 'connect.php';

$queryPageNum="select * from page_info where little_category_id='$littleCategoryId'";
$resultPageNum=mysqli_query($link,$queryPageNum);
$pageNum_temp=mysqli_num_rows($resultPageNum);
$pageNum=$pageNum_temp/6+1; //实际页数
if ($pageNum=1){
    //内容仅够一页
    echo "<a id='pageAdapterA3' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='current' content='1' class='laypage-curr' >$page</a>";
}else if ($pageNum=2){
    if ($prePage<1){
        //不应显示上一页
        echo "
                      <a id='pageAdapterA3' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='current' content='1' class='laypage-curr' >$page</a>
                      <a id='pageAdapterA4' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='next'>$nextPage</a>
                      <a id='pageAdapterA5' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='nextButton' class='laypage-next'>下一页</a>";
    }else if ($nextPage>$pageNum){
        //不应显示下一页
        echo "<a id='pageAdapterA1' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='preButton' class='laypage-prev'>上一页</a>
                      <a id='pageAdapterA2' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='pre'>$prePage</a>
                      <a id='pageAdapterA3' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='current' content='2' class='laypage-curr' >$page</a>
                      ";
    }
}else{
    if ($prePage>0&&$nextPage<=$pageNum){
        //正常范围内
        echo "<a id='pageAdapterA1' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='preButton' class='laypage-prev'>上一页</a>
                      <a id='pageAdapterA2' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='pre'>$prePage</a>
                      <a id='pageAdapterA3' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='current' content=$page class='laypage-curr'>$page</a>
                      <a id='pageAdapterA4' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='next'>$nextPage</a>
                      <a id='pageAdapterA5' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='nextButton' class='laypage-next'>下一页</a>";
    }else if ($prePage<1){
        //不应显示上一页
        echo "
              <a id='pageAdapterA3' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='current' content=$page class='laypage-curr'>$page</a>
              <a id='pageAdapterA4' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='next'> $nextPage </a>
              <a id='pageAdapterA5' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='nextButton' class='laypage-next'>下一页</a>";
    }else if ($nextPage>$pageNum){
        echo "<a id='pageAdapterA1' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='preButton' class='laypage-prev'>上一页</a>
                      <a id='pageAdapterA2' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='pre'>$prePage</a>
                      <a id='pageAdapterA3' onclick='getAndShowLittleCategoryPages(this);pageAdapter(this)' aria-valuetext='current' content=$page class='laypage-curr'>$page</a>
                      ";
    }
}
/*echo "<a href=$targetPagePre class='laypage-prev'>上一页</a>
     <a href=$targetPagePre>$prePage</a>
     <a class='laypage-curr' href=''>$page</a>
     <a href=$targetPageNext>$nextPage</a>
     <a href=$targetPageNext class='laypage-next'>下一页</a>";*/
echo "<a>第 $page 页，共 $pageNum 页, $pageNum_temp 篇文章</a>";