<?php 
$id = urldecode($_GET['id']);
$days = urldecode($_GET['days']);
$value = urldecode($_GET['value']);
$redirect = urldecode($_GET['redirect']);
if(!$redirect || $redirect == 'home') $redirect = '/';
if($_GET['reset']){
	setcookie('ter_cookie_' . $id,'',time() -3600,'/' );
	header('Location: ' . $redirect);
	exit;
}
setcookie('ter_cookie_' . $id,$value . ',' . time(),time() + (60*60*24*$days),'/' );
header('Location: ' . $redirect);
exit;
?>