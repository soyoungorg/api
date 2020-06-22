function pageAdapter(objInfo) {

    //获取页面url参数以获取分类ID
    var url = window.location.href;

    var querys = url.substring(url.indexOf('?') + 1).split('&');
    var result=[];
    for(var i=0;i<querys.length;i++){
        var temp=querys[i].split('=');
        if(temp.length<2){
            result[temp[0]]='';
        }else{
            result[temp[0]]=temp[1];
        }
    }
    var littleCategoryId=result['littleCategoryId'];
    if (littleCategoryId==null){
        littleCategoryId=11;
    }

    //进行判断点击操作(不必判断排序方式,因为数据固定)
    //找到当前页
    var currentPageTemp=document.getElementById("pageAdapterA3");
    var currentPage=currentPageTemp.getAttribute("content");

    //找到目标页
    var targetPageTemp=temp.id;
    var targetPage;
    var A1P=document.getElementById('pageAdapterA1');
    var A2P=document.getElementById('pageAdapterA2');
    var A4P=document.getElementById('pageAdapterA4');
    var A5P=document.getElementById('pageAdapterA5');
    if (targetPageTemp===A1P.id||targetPageTemp===A2P.id){
        //点击了上一页
        targetPage=currentPage-1;
    }else if (targetPageTemp===currentPageTemp.id){
        //点击了当前页
        targetPage=currentPage;
    }else if (targetPageTemp===A4P.id||targetPageTemp===A5P.id){
        //点击了下一页
        targetPage=currentPage+1;
    }

    if (targetPage===null){
        targetPage=1;
    }

    //开始传递输入内容

    /*if (sortValue.length==0)
    {
        document.getElementById("pageAdapter").innerHTML="";
        return;
    }*/
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
            document.getElementById("pageAdapter").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","res/module/litterCategoryPageAdapter.php?page="+targetPage+"&littleCategoryId="+littleCategoryId,true);
    xmlhttp.send();

}