<?php
/**
 * 此页面用于显示实时时间
 * Created by 梦栖笔谈,2020-01-25
 */

//header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
echo '<li id="time"></li>
	<script type="text/javascript">
		var dayNames = new Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
			function get_obj(time){
				return document.getElementById(time);
			}
			var ts='.(round(microtime(true)*1000)).';
			function getTime(){
				var t=new Date(ts);
				with(t){
					var _time="现在是北京时间："+" "+getFullYear()+"-" + (getMonth()+1)+"-"+getDate()+" " + (getHours()<10 ? "0" :"") + getHours() + ":" + (getMinutes()<10 ? "0" :"") + getMinutes() + ":" + (getSeconds()<10 ? "0" :"") + getSeconds() + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "今天："+dayNames[t.getDay()];
				}
				get_obj("time").innerHTML=_time;
				setTimeout("getTime()",1000);
				ts+=1000;
			}
			getTime();
	</script>';
?>
