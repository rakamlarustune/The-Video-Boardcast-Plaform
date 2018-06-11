<?php

define('APP', 'MyApplication');
$file='demo.mp4';

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
</body>
</html>
