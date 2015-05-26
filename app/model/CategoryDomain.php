<?php
namespace app\model;
use mvce\model\BusinessDomain;

class CategoryDomain extends BusinessDomain
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
        

        if(isset($properties['category_id']))
            {

                $category = $properties['category_id'];
                $_SESSION['category_id'] = $category;

                $query = "SELECT g.game_id,
						 g.name,
						 g.description,
						g.main_picture
						 
			        FROM game g inner join game_category gc using (game_id)
			        WHERE gc.category_id = :CATEGORY_ID
			        limit 4";

                $statement = $this->conn->prepare($query);
               
                $statement->bindValue(":CATEGORY_ID", $category, \PDO::PARAM_INT);
                
                $statement->execute();
                
                return $statement->fetchAll();
            }
    }
} 