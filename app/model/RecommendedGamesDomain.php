<?php

namespace app\model;
use mvce\model\BusinessDomain;

class RecommendedGamesDomain extends BusinessDomain
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
                             main_picture,
							 release_date
                        FROM game order by release_date DESC
                        LIMIT " . $this->count;
            
            $statement = $this->conn->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        
    }

} 