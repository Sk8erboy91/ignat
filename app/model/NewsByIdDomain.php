<?php
/**
 * Created by PhpStorm.
 * User: ScreeM
 * Date: 14-12-18
 * Time: 21:06
 */

namespace app\model;
use mvce\model\BusinessDomain;

class NewsByIdDomain extends BusinessDomain {
    private $statement = '';

    public function doInsert(array $properties)
    {

        if(isset($properties['message']))
        {
            $message = strip_tags($properties['message']);
            $news = $properties['news_id'];

            $query1 = "INSERT INTO `user_comment`(`text`,`user_id`,`news_id`)
                                        VALUES (:MESSAGE, 1, :NEWS_ID)";

            $statement1 = $this->conn->prepare($query1);

            $statement1->bindValue(":MESSAGE", $message, \PDO::PARAM_STR);
            $statement1->bindValue(":NEWS_ID", $news, \PDO::PARAM_INT);
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
        if(isset($properties['news_id']))
        {
            $news = $properties['news_id'];

            $query = "SELECT n.news_id, n.heading, n.news_text, n.news_picture,
                        group_concat(DISTINCT concat(u.username, ': ', u_c.text) SEPARATOR ',') as 'comments',
                        group_concat(u_c.comment_id SEPARATOR ',')
                      FROM `news` n left outer join user_comment u_c on u_c.news_id = n.news_id
                                left outer join user u on u.user_id = u_c.user_id
                      WHERE n.news_id = :NEWS_ID
                      group by n.news_id
                      order by u_c.comment_id";


            $this->statement = $this->conn->prepare($query);

            $this->statement->bindValue(":NEWS_ID", $news, \PDO::PARAM_INT);
            $this->statement->execute();

            if(isset($properties['message'])){

                NewsByIdDomain::doInsert($properties);
            }

            return $this->statement->fetch();
        }
    }
} 