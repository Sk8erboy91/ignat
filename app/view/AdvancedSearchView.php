<?php

namespace app\view;

use mvce\view\HTMLTemplate;

class AdvancedSearchView extends HTMLTemplate
{
	protected function pageContent()
	{
	echo'<div id="newsDiv">
		<section id="center">
	<p><select id="search_advance" onchange="changeOption();"></p>
        <option> - Search by - </option>
        <option value="1">Games</option>
        <option value="2">News</option>
        <option value="3">User</option>
    </select>
    <form method="POST">
        <div id="games_search">
		
           <p> Name: <input type="text" name="name" value=""></p>
           <p> Description: <input type="text" name="description"
			value=""></p>
          <p> Category: <input type="text" name="category" value=""></p>
          <p> Platform: <input type="text" name="platform" value=""></p>
           <p> Company <input type="text" name="company" value=""></p>
		    <p> <button type="submit" formaction="index.php?action=GameSearch">Submit</button></p>
			
        </div>

        <div id="news_search">
	
            <p>Text <input type="text" name="text" value=""></p>
           <p>Heading <input type="text" name="heading" value=""></p>
		  <p> <button type="submit" formaction="index.php?action=NewsSearch">Submit</button></p>

        </div>

        <div id="user_search">
		
           <p> Username <input type="text" name="username" value=""></p>
		    <p> <button type="submit" formaction="index.php?action=UserSearch">Submit</button></p>
			
			</form>
        </div>
		</section>
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
						<script src="js/searchOptions.js"></script>
						<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                        <link href="css/index.css" rel="stylesheet">
                       <link href="css/searchOptions.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
					</head><body>';
    }

}

?>