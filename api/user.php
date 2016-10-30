<?
/**
 * @author Fang
 * @see model/user.php
 * @version 1.0.0, 2016.10.30
 */

session_start();
require_once '../model/base.php';
global $sql;
$type = $sql->query("select `type` from `user` where Id = $_SESSION[UID]");
$type = $type->fetch_row();
if ($type[0] != 0) exit('<h1>非法操作!</h1>');
require_once '../model/user.php';

$u = new UserUtils();

switch ($_GET['action']){
	case 'newUser':
		$r = $u->newUser($_POST['name'],$_POST['sex']);
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
		exit;
	case 'edit':
		$u->updateNameSex($_POST['Id'],$_POST['name'],$_POST['sexual'],$_POST['position']);
		exit;
	case 'editPhone':
		$r = $u->updateTel($_POST['Id'],$_POST['phone']);
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
		exit;
	case 'getUser':
		$r = $u->getUserInfo($_POST['Id']);
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
		exit;
	case 'getPublisherByOrder':
		$r = $u->getPublisherByOrder($_POST['orderId']);
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
		exit;
	case 'getCourierByOrder':
		$r = $u->getCourierByOrder($_POST['orderId']);
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
		exit;
}