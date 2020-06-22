function getAndShowLittleCategoryPages(objInfo) {

    //获取页面url参数进而获取分类ID
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

    //获取<a>标签的值并进行相关设置
    var sortValue;
    var temp=$(objInfo).attr("aria-valuetext");
    var targetPage;
    if (temp==="preButton"||temp==="pre"||temp==="current"||temp==="next"||temp==="nextButton"){
        //点击了上下页
        //找到当前页
        var currentPageTemp=document.getElementById("pageAdapterA3");
        var currentPage=currentPageTemp.getAttribute("content");

        //找到目标页
        var targetPageTemp=temp.id;
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
        }else {
            //点击了下一页
            targetPage=currentPage+1;
        }

        //保存页面排序依据
        var A1x=document.getElementById('littleCategoryPageA1');
        var A2x=document.getElementById('littleCategoryPageA2');
        var A3x=document.getElementById('littleCategoryPageA3');
        var A4x=document.getElementById('littleCategoryPageA4');
        if (A1x.getAttribute("class")==="layui-this"){
            //根据最新排序
            sortValue="new";
        }else if (A2x.getAttribute("class")==="layui-this"){
            //根据最热排序
            sortValue="popular";
        }else if (A3x.getAttribute("class")==="layui-this"){
            //根据最热排序
            sortValue="like";
        }else if (A4x.getAttribute("class")==="layui-this"){
            //根据最热排序
            sortValue="comment";
        }

    }else {
        sortValue=temp;
        var temp=document.getElementById('pageAdapterA3');
        targetPage=temp.getAttribute("content");
        var A1=document.getElementById('littleCategoryPageA1');
        var A2=document.getElementById('littleCategoryPageA2');
        var A3=document.getElementById('littleCategoryPageA3');
        var A4=document.getElementById('littleCategoryPageA4');
        var currentA=objInfo.id;
        if (currentA===A1.id){
            A1.setAttribute("class","layui-this");
            A2.setAttribute("class","");
            A3.setAttribute("class","");
            A4.setAttribute("class","");
        }else if (currentA===A2.id){
            A2.setAttribute("class","layui-this");
            A1.setAttribute("class","");
            A3.setAttribute("class","");
            A4.setAttribute("class","");
        }else if (currentA===A3.id){
            A3.setAttribute("class","layui-this");
            A1.setAttribute("class","");
            A2.setAttribute("class","");
            A4.setAttribute("class","");
        }else if (currentA===A4.id){
            A4.setAttribute("class","layui-this");
            A1.setAttribute("class","");
            A2.setAttribute("class","");
            A3.setAttribute("class","");
        }
    }

    //开始传递输入内容

    if (sortValue.length==0)
    {
        document.getElementById("showLittleCategoryPages").innerHTML="";
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
            document.getElementById("showLittleCategoryPages").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","res/module/showLittleCategoryPages.php?sortValue="+sortValue+"&littleCategoryId="+littleCategoryId+"&page="+targetPage,true);
    xmlhttp.send();
}

