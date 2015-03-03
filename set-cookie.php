<?php 
$id = urldecode($_GET['id']);
$days = urldecode($_GET['days']);
$value = urldecode($_GET['value']);
$redirect = urldecode($_GET['redirect']);
if(!$redirect || $redirect == 'home') $redirect = '/';
if($_GET['reset']){
	unset($_COOKIE['ter_cookie_' . $id]);
	setcookie('ter_cookie_' . $id,'',time() -3600,'/' );
	header('Location: ' . $redirect);
	exit;
}
$_COOKIE['ter_cookie_' . $id] = $value . ',' . time();
setcookie('ter_cookie_' . $id,$value . ',' . time(),time() + (60*60*24*$days),'/' );
header('Location: ' . $redirect);
exit;
?>