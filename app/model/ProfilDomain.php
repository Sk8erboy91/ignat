<?php

namespace app\model;

use mvce\model\BusinessDomain;

class ProfilDomain extends BusinessDomain {
	private $statement = '';
	public function doInsert(array $properties) {
	}
	public function doUpdate(array $properties) {
		$sql = "UPDATE user
		  		SET first_name=:FIRSTNAME,last_name=:LASTNAME,email=:EMAIL,password=:PASSWORD,country=:COUNTRY
		 		WHERE `username`=1";
		$statement = $this->conn->prepare ( $sql );
		// $statement->bindValue ( ":USERNAME", $properties ['username'], \PDO::PARAM_STR );
		$statement->bindValue ( ":FIRSTNAME", $properties ['firstname'], \PDO::PARAM_STR );
		$statement->bindValue ( ":LASTNAME", $properties ['lastname'], \PDO::PARAM_STR );
		$statement->bindValue ( ":EMAIL", $properties ['email'], \PDO::PARAM_STR );
		$statement->bindValue ( ":PASSWORD", $properties ['password'], \PDO::PARAM_STR );
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
					WHERE `user_id` = 1";
		
		$this->statement = $this->conn->prepare ( $query );
		// $this->statement->bindValue ( ":USER_ID", $user_id, \PDO::PARAM_INT );
		$this->statement->execute ();
		return $this->statement->fetch ();
	}
}
