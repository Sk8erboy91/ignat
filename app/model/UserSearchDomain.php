<?php
namespace app\model;
use mvce\model\BusinessDomain;

class UserSearchDomain extends BusinessDomain
{
    public function doInsert(array $properties)
    {

    }

    public function doUpdate(array $properties)
    {

    }

    public function doDelete(array $properties)
    {

    }

    public function doSelect(array $properties)
    {

        $query = "SELECT user_id,
						 username,
						 first_name,
						 last_name,
						 country,
						 about
			        FROM user
			  where username like :USERNAME";
		
        $statement = $this->conn->prepare($query);
		$statement->bindValue(":USERNAME", "%".$properties['username']."%", \PDO::PARAM_STR);
		
        $statement->execute();

        return $statement->fetchAll();
    }
} 