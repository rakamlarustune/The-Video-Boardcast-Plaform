<?php

require_once "config.php";

$cookie_sure=86400*4;

$con = new  PDO("mysql:host=$h_name;dbname=$dbnames;charset=utf8", $usr_root, $usr_pass
, array(
    PDO::ATTR_EMULATE_PREPARES=>false,
    PDO::MYSQL_ATTR_DIRECT_QUERY=>false,
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
));
$tabayar="ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
	$glob_tabad_users="c_vids";
	$sql = "CREATE TABLE IF NOT EXISTS $glob_tabad_users (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`v1` VARCHAR(42) NOT NULL,
	`v2` MEDIUMTEXT NULL DEFAULT NULL,
	`v3` MEDIUMTEXT NULL DEFAULT NULL,
	`v4` MEDIUMTEXT NULL DEFAULT NULL,
	`v5` MEDIUMTEXT NULL DEFAULT NULL,
	UNIQUE INDEX `İndeks 1` (`id`),
	PRIMARY KEY (`v1`)
	) $tabayar ";
	$con->exec($sql);



function strtohex($string){$hex = '';for ($i=0; $i<strlen($string); $i++){$ord = ord($string[$i]);$hexCode = dechex($ord);$hex .= substr('0'.$hexCode, -2);}return strToUpper($hex);}
function hextostr($hex){$string='';for ($i=0; $i < strlen($hex)-1; $i+=2){ $string .= chr(hexdec($hex[$i].$hex[$i+1]));}return $string;}
function post_data($e){if(isset($_POST[$e])){return $_POST[$e];}else{return "";}}
function get_data($e){if(isset($_GET[$e])){return $_GET[$e];}else{return "";}}
function log_ekle($f,$a){$myfile = fopen($f.'.txt', "a+") or die('Unable to open file!');fwrite($myfile,$a);fclose($myfile);}
function ref_go_post($e='1'){if(isset($_POST["ref"])){$ref=$_POST["ref"];header("Location: index.php?durum=$e&d=info&ref=$ref");}}
function ref_go($e='1'){if(isset($_GET["ref"])){$ref=$_GET["ref"];header("Location: index.php?durum=$e&d=info&ref=$ref");}}
function tmp_http_eror(){error_reporting(E_ALL);header('HTTP', true, 500);}
function session_in($a,$time){
		setcookie("cook_logind","1", time()+$time,'/');
		setcookie("cook_loginad",base64_encode($a), time()+$time,'/');
}
function cookie_reset(){
	global $cookie_sure;
	if(isset($_SERVER['HTTP_COOKIE'])){
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		foreach($cookies as $cookie){
			$parts = explode('=', $cookie);
			if($parts){
			$name = trim($parts[0]);
				if($name){
				if($name=='cook_rem'){continue;}
					setcookie($name,'',time()-$time);
					setcookie($name,'',time()-$time, '/');
				}
			}
		}
	}
	echo "<script>window.location.href='index.php';</script>";exit;
}





$sorgu="data_send_1";
if(isset($_GET[$sorgu])){if($_GET[$sorgu]=='1'){
$v1=get_data("v1");
$v2=get_data("v2");
if($v1 && $v2){
		$tabad='c_vids';
		$sql="INSERT into $tabad(v1,v2) VALUES('$v1','$v2')";
		$ins = $con->prepare($sql);
		$ins->execute();
}
}}



?>