<?php
namespace app\view;

use mvce\view\HTMLTemplate;

class AddEventFormView extends HTMLTemplate
{
	private $game;
	public function __construct($game)
	{
		$this->game = $game;
	
	}
	
	protected function pageContent()
	{
		echo '<div id="centerOfAll"> 
				<section id="center"><div class="registration-form">
		<h2>ADD EVENT: </h2>
				<form action="index.php?action=AddEvent&game_id='.$this->game.'" method="post">
			 <p> Title: <input type="text" name="name" value=""></p>
           <p> Description: <input type="text" name="description"
			value=""></p>
          <p> Start: <input type="text" name="start_datetime" value="" class="datepicker"></p>
          <p> End: <input type="text" name="end_datetime" value="" class="datepicker"></p>
           
		    <p> <button type="submit">Submit</button></p>
			</form>
	
				  	</section>
				  	</div>';
	}
	
	protected function pageHeader()
    {
         echo '<!DOCTYPE html>
				<html>
					<head lang="en">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta charset="UTF-8">
						<title>Gimension</title>
						
                        <link href="css/index.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
						 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
						 <script>
$(function() {
$( ".datepicker" ).datepicker();
});
</script>
					</head><body>';
    }
	
	
}