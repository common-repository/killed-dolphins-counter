<?php  
add_shortcode( 'dolphins_countdown', 'wct_countdown' );
function wct_countdown( $atts, $content = null ){
	
	$data  = file_get_contents( 'http://dyingdolphins.org/starter.php?rr='.rand(0,10000) );

	$time_arr = explode(':', $data);
	
	if( $time_arr[0] == '00' && (int)$time_arr[1] < 15 ){
		$time_arr[1] = '15';
	}

	$out .= '
	<script language="JavaScript">
<!--
var hoursleft = 0;
var minutesleft = '.$time_arr[0].';			// you can change these values to any value greater than 0
var secondsleft = '.$time_arr[1].';
var millisecondsleft = 0;
var finishedtext = \'<div class="el_die">Another dolphin was killed</div><div class="die_img"><img src="'.plugins_url('/images/red_dolphin.png', __FILE__ ).'" ></div>\';
end = new Date();
end.setHours(end.getHours()+hoursleft);
end.setMinutes(end.getMinutes()+minutesleft);
end.setSeconds(end.getSeconds()+secondsleft);
end.setMilliseconds(end.getMilliseconds()+millisecondsleft);
function cd(){
	now = new Date();
	diff = end - now;
	diff = new Date(diff);
	var msec = diff.getMilliseconds();
	var sec = diff.getSeconds();
	var min = diff.getMinutes();
	var hr = diff.getHours()-1;
	if (min < 10){
		min = "0" + min;
	}
	if (sec < 10){
		sec = "0" + sec;
	}
	if(msec < 10){
		msec = "00" +msec;
	}
	else if(msec < 100){
		msec = "0" +msec;
	}
	if(now >= end){
		clearTimeout(timerID);
		document.getElementById("cdtime").innerHTML = finishedtext;
		
		console.log("end" + now + " "+end);
		clearTimeout(timerID);
		document.getElementById("cdtime").innerHTML = finishedtext;
		
		setTimeout(function(){	
		console.log( "counter restart" );
				end = new Date();
				end.setHours(end.getHours()+hoursleft);
				end.setMinutes(end.getMinutes()+minutesleft);
				end.setSeconds(end.getSeconds()+secondsleft);
				end.setMilliseconds(end.getMilliseconds()+millisecondsleft);
				cd();
			}, 15000);
			
			return;
		
	}
	else{
	document.getElementById("cdtime").innerHTML = min + ":" + sec;
	}		// you can leave out the + ":" + msec if you want...
			// If you do so, you should also change setTimeout to setTimeout("cd()",1000)
	timerID = setTimeout("cd()", 10); 
}
window.onload = cd;
//-->
</script>



<div class="widget_container">
	<div class="in_title">One dolphin gets killed every 15 minutes</div>
	<div id="cdtime">loading countdown...</div>
	<div class="act_block"><a href="http://dyingdolphins.org/act-now/" target="_blank">Act Now</a></div>
	<div class="logo_block"><a href="http://dyingdolphins.org/" target="_blank"><img src="'.plugins_url('/images/Dying_Dolphins_Logo.png', __FILE__ ).'" /></a></div>
</div>
<style>
.widget_container{
	text-align:center;
	font-family: "Arvo", Arial, Tahoma, sans-serif;
}
.widget_container > div{
	margin-bottom:5px;
}
#cdtime{
	font-size:24px;
}
.widget_container .logo_block img{
	width:100px;
}
.widget_container .act_block a{
	color:#D93D18;
	text-decoration:none;
	font-size:20px;
	font-weight:bold;
}
.widget_container .die_img img{
	width:100px;
}
.widget_container .el_die{
	color:#1F1C1A;
	font-size:16px;
}
.widget_container .in_title{
	font-size: 20px;

    font-style: italic;
	color:#1F1C1A;
}
</style>
	';
	
	return $out;	
}

?>