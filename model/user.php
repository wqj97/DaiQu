<?php
require_once 'base.php';

/**
 * Provide methods to control user table (CRUD).
 * @author Fang
 * @version 1.0.0, 2016-10-30
 */
class UserUtils
{
	/**
	 * @param name 		name of new user
	 * @param sex 		sex of new user
	 * @return new user's ID (generated by AUTO_INCREAMENT)
	 */
	public function newUser($name,$sex){
		global $sql;
		// Id,name,phone,pwd,openId,AccessToken,RefreshToken,ACTexpires,position,sexual,type
		$statement = $sql->prepare('INSERT INTO user(name,sexual) VALUES(?,?)');
		$statement->bind_param($name,$sex);
		$statement->execute();

		return $sql->insert_id;
	}
	
	/**
	 * @param id 		id of user
	 * @param name 		new name
	 * @param sex 		new sex
	 * @return void
	 */
	public function updateNameSex($id,$name,$sex){
		global $sql;
		$statement = $sql->prepare('UPDATE `user` SET `name` = ?,`sexual` = ? WHERE `Id` = ?');
		$statement->bind_param($name,$sex,$id);
		$statement->execute();
	}
	
	/**
	 * @param id 		id of user
	 * @param name 		new location
	 * @return void
	 */
	public function updateLocation($id,$location){
		global $sql;
		$statement = $sql->prepare('UPDATE `user` SET `position` = ? WHERE `Id` = ?');
		$statement->bind_param($location,$id);
		$statement->execute();
	}
	
	/**
	 * @param id 		id of user
	 * @param tel 		new telephone number
	 * @return if 'result' is 失败, 'reason' is errinfo;
	 */
	public function updateTel($id,$tel){
		global $sql;
		// Check phone number ...
		if (preg_match('/^1[3|4|5|8][0-9]\d{8}$/', $tel)){
			$statement = $sql->prepare('UPDATE `user` SET `phone` = ? WHERE `Id` = ?');
			$statement->bind_param($tel,$id);
			$statement->execute();
			return ['result' => '成功'];
		} else {
			return ['result' => '失败', 'reason' => 'Illegal phone number!'];
		}
	}
	
	/**
	 * @param id 		id of user
	 * @return if 'result' is 失败, 'reason' is errinfo;
	 *	else 'result' is array['name','phone','position','sexual'].
	 */
	public function getUserInfo($id){
		global $sql;
		$statement = $sql->prepare('SELECT name,phone,position,sexual FROM `user` WHERE Id = ?');
		$statement->bind_param($id);
		$resultset = $statement->execute();
		$row = $resultset->fetch_assoc();
		if (count($row)!=1)
			return ['result' => '失败', 'reason' => 'No such user!'];
		else
			return ['result' => $row];
	}
		
	/**
	 * @param orderId 		id of order
	 * @return if 'result' is 失败, 'reason' is errinfo;
	 *	else 'result' is publisher id.
	 */
	public function getPublisherByOrder($orderId){
		global $sql;
		$statement = $sql->prepare('SELECT userId FROM `orders` WHERE Id = ?');
		$statement->bind_param($orderId);
		$resultset = $statement->execute();
		$row = $resultset->fetch_assoc();
		if (count($row)!=1)
			return ['result' => '失败', 'reason' => 'No such order!'];
		else
			return ['result' => $row['userId']];
	}
	
	/**
	 * @param orderId 		id of order
	 * @return if 'result' is 失败, 'reason' is errinfo;
	 *	else 'result' is courier id.
	 */
	public function getCourierByOrder($orderId){
		global $sql;
		$statement = $sql->prepare('SELECT toker FROM `orders` WHERE Id = ?');
		$statement->bind_param($orderId);
		$resultset = $statement->execute();
		$row = $resultset->fetch_assoc();
		if (count($row)!=1)
			return ['result' => '失败', 'reason' => 'No such order!'];
		else
			return ['result' => $row['toker']];
	}
}