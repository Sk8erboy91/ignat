<?php
namespace app\model;
use mvce\model\BusinessDomain;

class NewsSearchDomain extends BusinessDomain
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

        $query = "SELECT news_id,
						 heading,
						 news_text,
						 news_picture
			        FROM news
			  where news_text like :TEXT and heading like :HEADING";
		
        $statement = $this->conn->prepare($query);
		$statement->bindValue(":TEXT", "%".$properties['text']."%", \PDO::PARAM_STR);
		$statement->bindValue(":HEADING", "%".$properties['heading']."%", \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
} 