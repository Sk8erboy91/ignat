<?php

namespace app\model;
use mvce\model\BusinessDomain;

class GamesDomain extends BusinessDomain
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
        if(isset($_GET['scrolling'])) {
            $query = "SELECT game_id,
                             name,
                             description,
                             main_picture
                        FROM game
                        LIMIT :SCROLL" . ", " . $this->count;
            // $this->count += $this->count;
            $statement = $this->conn->prepare($query);
            $statement->bindValue(":SCROLL", $_GET['scrolling'], \PDO::PARAM_INT);
            $statement->execute();

            return $statement->fetchAll();
        }
        else {
            $query = "SELECT game_id,
                             name,
                             description,
                             main_picture
                        FROM game
                        LIMIT " . $this->count;
            // $this->count += $this->count;
            $statement = $this->conn->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        }
    }

} 