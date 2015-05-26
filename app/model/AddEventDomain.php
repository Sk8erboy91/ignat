<?php

namespace app\model;
use mvce\model\BusinessDomain;

class AddEventDomain extends BusinessDomain
{
    
	
	
	
    public function doInsert(array $properties)
    {
		
		$query = "INSERT INTO game_event (`name`, `description`, `game_id`, `start_datetime`, `end_datetime`) VALUES (:NAME,:DESCRIPTION,:GAME_ID,:START_DATETIME,:END_DATETIME)";
		
		$statement = $this->conn->prepare($query);
		$statement->bindValue(":NAME", $properties['name'], \PDO::PARAM_STR);
		$statement->bindValue(":DESCRIPTION", $properties['description'], \PDO::PARAM_STR);
		$statement->bindValue(":GAME_ID", $properties['game_id'], \PDO::PARAM_INT);
		$statement->bindValue(":START_DATETIME", $properties['start_datetime']->format('y-m-d'));
		$statement->bindValue(":END_DATETIME", $properties['end_datetime']->format('y-m-d'));
		
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
       $query = "SELECT g.game_id, g.name, g.description, g.main_picture, g.trailer, g.avg_rating, g.release_date,
				group_concat(DISTINCT concat(g_rate.rating,',',g_rate.user_id) SEPARATOR ',') as 'rating',
                             group_concat(DISTINCT concat(ca.category_name, ':', ca.category_id) SEPARATOR ',') as 'categories', co.company_name, co.company_website,
                              group_concat(DISTINCT p. name SEPARATOR ',') as 'platform',
                              group_concat(DISTINCT concat(sp.name, ': ', g_r.value) SEPARATOR ',') as 'requirements',
                              group_concat(DISTINCT sc.scr_link SEPARATOR ',') as 'screenshots',
                              group_concat(DISTINCT concat(u.username, ': ', u_c.text) SEPARATOR ',') as 'comments',
							  group_concat(DISTINCT concat(ge.event_id, ',', ge.name, ',', ge.description, ',', ge.start_datetime, ',', ge.end_datetime) SEPARATOR ';') as 'events',
                              group_concat(u_c.comment_id SEPARATOR ',')
                            FROM game g left outer join company co on g.company_id = co.company_id
                                            left outer join game_platform g_p on g_p.game_id = g.game_id
                                                left outer join platform p on p.platform_id = g_p.platform_id
                                                        left outer join screenshot sc on sc.game_id = g.game_id
                                                            left outer join game_category g_c on g_c.game_id = g.game_id
                                                                left outer join category ca on ca.category_id = g_c.category_id
																	left outer join game_event ge on g.game_id = ge.game_id
																		left outer join game_requirement g_r on g_r.game_id = g.game_id
																			left outer join specification sp on sp.specification_id = g_r.spec_id
																				left outer join user_comment u_c on u_c.game_id = g.game_id
																					left outer join user u on u.user_id = u_c.user_id
																						left outer join game_rating g_rate on g.game_id = g_rate.game_id
                            WHERE g.game_id =:GAME_ID
                            order by u_c.comment_id";
							
			$statement = $this->conn->prepare($query);
		
		$statement->bindValue(":GAME_ID", $properties['game_id'], \PDO::PARAM_INT);
		
		
		$statement->execute();
		return $statement->fetch();
    }

} 