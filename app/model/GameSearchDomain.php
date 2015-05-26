<?php
namespace app\model;
use mvce\model\BusinessDomain;

class GameSearchDomain extends BusinessDomain
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
	

        $query = "SELECT DISTINCT g.game_id,
						 g.name,
						 g.description,
						 g.main_picture
			        FROM game g 
					left outer join company c using (company_id)
					left outer join game_platform gp using (game_id) 
					left outer join platform p using (platform_id) 
					left outer join game_category using (game_id) 
					left outer join category cat using (category_id)
			  where g.name like :NAME and g.description like :DESCRIPTION and c.company_name like :COMPANY and p.name like :PLATFORM and cat.category_name like :CATEGORY";
		
        $statement = $this->conn->prepare($query);
		 $statement->bindValue(":NAME", "%".$properties['name']."%", \PDO::PARAM_STR);
		 $statement->bindValue(":DESCRIPTION", "%".$properties['description']."%", \PDO::PARAM_STR);
		 $statement->bindValue(":CATEGORY", "%".$properties['category']."%", \PDO::PARAM_STR);
		 $statement->bindValue(":PLATFORM", "%".$properties['platform']."%", \PDO::PARAM_STR);
		 $statement->bindValue(":COMPANY", "%".$properties['company']."%", \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
} 