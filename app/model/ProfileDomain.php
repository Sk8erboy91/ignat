<?php

namespace app\model;

use mvce\model\BusinessDomain;

class ProfileDomain extends BusinessDomain {
	private $statement = '';
	public function doInsert(array $properties) {
	}
	public function doUpdate(array $properties) {
		$sql = "UPDATE user
		  		SET first_name=:FIRSTNAME,last_name=:LASTNAME,email=:EMAIL,country=:COUNTRY
		 		WHERE `user_id`=:USER_ID";
		$statement = $this->conn->prepare ( $sql );
		$statement->bindValue ( ":USER_ID", $_SESSION ['user_id'], \PDO::PARAM_INT );
		$statement->bindValue ( ":FIRSTNAME", $properties ['firstname'], \PDO::PARAM_STR );
		$statement->bindValue ( ":LASTNAME", $properties ['lastname'], \PDO::PARAM_STR );
		$statement->bindValue ( ":EMAIL", $properties ['email'], \PDO::PARAM_STR );
		$statement->bindValue ( ":COUNTRY", $properties ['country'], \PDO::PARAM_STR );
		$statement->execute ();
	}
	public function doDelete(array $properties) {
	}
	public function doSelect(array $properties) {
		/*
		 * if (isset ( $properties ['user_id'] )) {
		 * $user_id = $properties ['user_id'];
		 * }
		 */
		$query = "SELECT username,first_name,last_name,email,password,country 
					FROM `user` 
					WHERE `user_id` = :USER_ID";
		
		$this->statement = $this->conn->prepare ( $query );
		$this->statement->bindValue ( ":USER_ID", $_SESSION ['user_id'], \PDO::PARAM_INT );
		$this->statement->execute ();
		return $this->statement->fetch ();
	}
}
