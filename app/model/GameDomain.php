<?php

namespace app\model;
use mvce\model\BusinessDomain;

class GameDomain extends BusinessDomain
{
    private $statement = '';

    public function doInsert(array $properties)
    {

        if(isset($properties['message']))
        {
            $message = strip_tags($properties['message']);
            $game = $properties['game_id'];
            //user_id go vzemam ot _SESSION->getId();

            $query1 = "INSERT INTO `user_comment`(`text`,`user_id`,`game_id`)
                                        VALUES (:MESSAGE, 1, :GAME_ID)";
            //var_dump($query1);

            $statement1 = $this->conn->prepare($query1);

            $statement1->bindValue(":MESSAGE", $message, \PDO::PARAM_STR);
            $statement1->bindValue(":GAME_ID", $game, \PDO::PARAM_INT);
            //$this->statement->bindValue(":USER_ID", $user, \PDO::PARAM_INT);

            $statement1->execute();
        }
    }

    public function doUpdate(array $properties)
    {

    }

    public function doDelete(array $properties)
    {

    }

    public function doSelect(array $properties)
    {
        //var_dump($properties['game_id']);
        //var_dump($properties);
        if(isset($properties['game_id']))
            {
                $game = $properties['game_id']; // get
                //if(is_int($game)){
                //var_dump($game);
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
                            order by u_c.comment_id"; //


                $this->statement = $this->conn->prepare($query);

                //var_dump($statement);
                $this->statement->bindValue(":GAME_ID", $game, \PDO::PARAM_INT);
                //var_dump($statement);
                $this->statement->execute();
                //var_dump($statement);

                if(isset($properties['message'])){

                GameDomain::doInsert($properties);
                }
                return $this->statement->fetch();


//                } else{
//                    header("Location:index.php");
//                }
            }
    }
} 