<?php

namespace app\model;

use mvce\model\BusinessDomain;

class RegisterDomain extends BusinessDomain
{
	public function doInsert(array $properties)
	{
		$sql = "INSERT INTO `user`(`username`, `first_name`, `last_name`, `email`, `password`, `country`)
                  VALUES (:USERNAME, :FIRSTNAME, :LASTNAME, :EMAIL, :PASSWORD, :COUNTRY);
                    UPDATE user SET date_reg= now() WHERE username=:USERNAME";
		
		/*$sql = 'INSERT INTO user ( `username`, `first_name`, `last_name`, `email`, `password`, `country`, `date_reg` ) 
				VALUES (:USERNAME, :FIRSTNAME, :LASTNAME, :EMAIL, :PASSWORD, :COUNTRY, now() )';*/

		
		$statement = $this->conn->prepare($sql);
		
		//var_dump($properties['username']);
		
		$statement->bindValue(":USERNAME", $properties['username'], \PDO::PARAM_STR);
		$statement->bindValue(":FIRSTNAME", $properties['firstname'], \PDO::PARAM_STR);
		$statement->bindValue(":LASTNAME", $properties['lastname'], \PDO::PARAM_STR);
		$statement->bindValue(":EMAIL", $properties['email'], \PDO::PARAM_STR);
		$statement->bindValue(":PASSWORD", $properties['password'], \PDO::PARAM_STR);
		$statement->bindValue(":COUNTRY", $properties['country'], \PDO::PARAM_STR); 
		
		$statement->execute();
				
	}
	
	public function doUpdate(array $properties)
	{
		
	}
	
	public function doDelete(array $properties)
	{
		
	}
	
	public function doSelect(array $properties)
	{
		$sql = "SELECT * 
				FROM `user` 
				WHERE `username` = :USERNAME;";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(":USERNAME", $properties['username'], \PDO::PARAM_STR);
		$stmt->execute();
		
		return $stmt->fetch();
	}
}