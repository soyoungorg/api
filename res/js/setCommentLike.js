function setCommentLike(obj) {
    var commentId=obj.getAttribute("aria-valuetext");
    var commentLikeCount=obj.getAttribute("content");

    if (commentId.length==0)
    {
        document.getElementById(commentId).innerHTML="";
        return;
    }
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        //IE6, IE5 浏览器执行的代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById(commentId).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","res/module/litterCategoryPageAdapter.php?commentId="+commentId+"&commentLikeCount="+commentLikeCount,true);
    xmlhttp.send();
}