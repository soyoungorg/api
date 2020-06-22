function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function initPageAdapter() {

    //获取页面url参数
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

    //进行局部UI的初始化
    var targetPage=getCookie("littleCategoryCurrentPage");
    var currentSort=getCookie("littleCategoryCurrentSort");


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
            if (window.XMLHttpRequest)
            {
                // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                xmlhttp2=new XMLHttpRequest();
            }
            else
            {
                //IE6, IE5 浏览器执行的代码
                xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp2.onreadystatechange=function()
            {
                if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
                {
                    document.getElementById("showLittleCategoryPages").innerHTML=xmlhttp2.responseText;
                }
            }
            xmlhttp2.open("GET","res/module/showLittleCategoryPages.php?sortValue="+currentSort+"&littleCategoryId="+littleCategoryId+"&page="+targetPage,false);
            xmlhttp2.send();

            document.getElementById("pageAdapter").innerHTML=xmlhttp.responseText;
        }

    }

    xmlhttp.open("GET","res/module/littleCategoryPageAdapter.php?littleCategoryId="+littleCategoryId+"&page="+targetPage,false);

    xmlhttp.send();



}



function initLittleCategoryPages(str1,str2,str3) {

    //获取页面url参数以传递Url
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

    //进行局部UI的初始化
    var currentPage=str1;
    var sortValue=str2;
    //var A3x=document.getElementById("pageAdapterA3");
    var A1=document.getElementById("littleCategoryPageA1");
    var A2=document.getElementById("littleCategoryPageA2");
    var A3=document.getElementById("littleCategoryPageA3");
    var A4=document.getElementById("littleCategoryPageA4");
    A3x.setAttribute("content",currentPage);
    if (A1.getAttribute("aria-valuetext")===sortValue){
        A1.setAttribute("class","layui-this");
    }else if (A2.getAttribute("aria-valuetext")===sortValue){
        A2.setAttribute("class","layui-this");
    }else if (A3.getAttribute("aria-valuetext")===sortValue){
        A3.setAttribute("class","layui-this");
    }else if (A4.getAttribute("aria-valuetext")===sortValue){
        A4.setAttribute("class","layui-this");
    }
    window.alert(currentPage);

    //开始传递输入内容

    /*if (littleCategoryId.length===0)
    {
        document.getElementById("showLittleCategoryPages").innerHTML="";
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
            document.getElementById("showLittleCategoryPages").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","res/module/showLittleCategoryPages.php?sortValue="+str2+"&littleCategoryId="+str3+"&page="+str1,false);
    xmlhttp.send();

}