<?php
/**
 * Created by PhpStorm.
 * User: ScreeM
 * Date: 14-12-18
 * Time: 18:40
 */

namespace app\model;

use mvce\model\BusinessDomain;

class NewsDomain extends BusinessDomain{

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

    $query = "SELECT news_id,
						 news_text,
						 news_picture,
						 heading
			        FROM news
			        LIMIT $this->count";
    $this->count += $this->count;
    $statement = $this->conn->prepare($query);
    $statement->execute();

    return $statement->fetchAll();
}
} 