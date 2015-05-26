<?php


namespace app\view;
use mvce\view\HTMLTemplate;
use app\view\render;

class UserSearchView extends HTMLTemplate
{
    private $allUsers = array();

    public function __construct(array $allUsers)
    {
        $this->allUsers = $allUsers;
    }

    protected function pageContent()
    {
        echo  '<div id="usersDiv">
		<section id="center">
			<h1> Users </h1>';
        foreach ($this->allUsers as $user)
        {
            
            echo "<p><a href='index.php?action=UsersById&user_id=" . $user['user_id'] ."'></p>";
            
        }

            echo '</section>
	        </div>';
    }

    function pageHeader()
    {
        echo '<!DOCTYPE html>
				<html>
					<head lang="en">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta charset="UTF-8">
						<title>Gimension</title>
                        <link href="css/index.css" rel="stylesheet">
                        
                        <link href="css/indexResponsive.css" rel="stylesheet">
						<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					</head><body>';
    }
} 