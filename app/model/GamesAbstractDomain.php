<?php

namespace app\model;
use mvce\model\BusinessDomain;

class GamesAbstractDomain extends BusinessDomain
{
    private $count = 4;
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

        $query = "SELECT game_id,
						 name,
						 description,
						 main_picture
			        FROM game
			        LIMIT $this->count";
        $this->count += $this->count;
        $statement = $this->conn->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

} 
?>