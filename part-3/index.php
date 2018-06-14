<?php

define('APP', 'MyApplication');
$file='demo.mp4';
$file_id=md5($file);

function getip(){
//generating ip-CLIENT_IP  or REMOTE_ADDR stuff
$ip="0";
if(isset($_SERVER['HTTP_CLIENT_IP']) && isset($_SERVER['HTTP_X_FORWARDED_FOR']) && isset($_SERVER['REMOTE_ADDR'])){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
}else{$ip="0";}
return $ip;
}

function key_gen(){
$e="";
if(isset($_SERVER['HTTP_USER_AGENT'])){
if(!empty($_SERVER['HTTP_USER_AGENT'])){
  $e=$_SERVER['HTTP_USER_AGENT'];
  }else{$e="0";}
}
else{$e="0";}
    return sha1(getip().$e);
}

//generate-new
$user_id=key_gen();



?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="video">

<!---  some css and js library --->
<link rel="stylesheet" href="data/lib/reset.css">
<link rel="stylesheet" href="data/lib/normalizer.css">
<link rel="stylesheet" href="data/lib/w3.css">
<script type='text/javascript' src="data/lib/jquery.js"></script>

<!---  title --->
<title> Protyped Version Beta</title>
</head>
<style>
body{
	background:rgb(220,220,220);
}
</style>
<body>
<center>
<h3 class="w3-grey w3-block" >video file play</h3>
<video width="auto" controls style='display:block;width:75%;'>
<source src="data/play/video.php?v=<?php print($file); ?>" type="video/mp4" />
Your browser does not support HTML5 video.
</video>
</center>
<script>
var user_id="<?php print($user_id); ?>";
var file_id="<?php print($file_id); ?>";
if(user_id && file_id){
//Jquery ajax function
	$.ajax({
		type:"GET"
		,url:"go.php"
		,data:{'data_send_1':'1','v1':user_id,'v2':file_id}
		,success:function(e){
			//debug message
			alert(e);
		}
	});
}
</script>
</body>
</html>
