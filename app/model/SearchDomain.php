<?php
namespace app\model;
use mvce\model\BusinessDomain;

class SearchDomain extends BusinessDomain
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

        $query = " SELECT news_id as 'id', heading as 'name', news_text as 'text', news_picture as 'picture' , 'news' AS
					TYPE FROM `news`
					WHERE heading LIKE :KEYWORD
					OR news_text LIKE :KEYWORD
						UNION
					SELECT game_id, name, description, main_picture, 'games' AS
					TYPE
					FROM game
					WHERE name LIKE :KEYWORD
					OR description LIKE :KEYWORD;";
		
        $statement = $this->conn->prepare($query);
		$statement->bindValue(":KEYWORD", "%".$properties['keywords']."%", \PDO::PARAM_STR);
		
        $statement->execute();
		$results=$statement->fetchAll();
		
        return  $results;
		
    }
} 