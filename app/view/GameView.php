<?php
/**
 * Created by PhpStorm.
 * User: ScreeM
 * Date: 14-12-15
 * Time: 1:03
 */

namespace app\view;
use mvce\view\HTMLTemplate;
use app\view\render;

class GameView extends HTMLTemplate
{
    private $fullGame = array();

    public function __construct(array $fullGame)
    {
        $this->fullGame = $fullGame;
    }

    protected function pageContent()
    {
        $game = $this->fullGame;

        //GAME VIEW

        //var_dump($game);

       echo '<div id="description">
		<section id="center">
			<h1 class="section-title">';

        echo $game['name'];

    echo"</h1>
			<img id='gamePic' src='images/games/" . $game['main_picture'] . "' alt='logo'>";

        echo '<br><br>';

        echo '<p>Screenshots:</p>';
        $screenshots = explode(",", $game['screenshots']);

        foreach($screenshots as $screenshot){

            echo "<img class=\"img-screenshot\" src='images/games/" . $screenshot . "' alt='screenshot'>";
        }


			echo '<br><br>
			<p>Producer: ';
        echo $game['company_name'];
            echo '</p>';

        echo '<br>
			<p>Website: ';

        echo "<a href='" . $game['company_website'] ."'>" . $game['company_website'] . "</a>";

        echo '</p>
			<br>';


            $trailer = $game['trailer'];

            if($trailer != ""){
                $trailer = substr($trailer, 8, strlen($trailer));

//                <iframe width="560" height="315" src="//www.youtube.com/watch?v=8C__7eWSOJs" frameborder="0" allowfullscreen></iframe>
//                <iframe width="560" height="315" src="//www.youtube.com/embed/8C__7eWSOJs" frameborder="0" allowfullscreen></iframe>

//                $pattern = '/(\w+)\/(watch\?v=)(\w+)/';
//                $replacement = '${1}embed/,$3';
//                $trailer = preg_replace($pattern, $replacement, $trailer);

                $pattern = '/\bwatch\?v=\b/';
                $trailer = preg_replace($pattern,"embed/",$trailer);

                //echo $trailer;
			echo '
			<br><p>Trailer:</p>';

			echo "<iframe width='640' height='360' src='//" . $trailer . "' frameborder='0' allowfullscreen></iframe>";

            }


			echo '<h4>Description:</h4>';



            echo "<p>" . $game['description'] . "</p>";

            echo '<br>';

            echo '<p>Platform: ';

            echo $game['platform'];

            echo '</p><br>';

            $requirements = explode(",", $game['requirements']);

            echo '<p>Requirements:</p>';

            foreach($requirements as $requirement){
                echo "<p>" . $requirement . "</p>";
            }
//release_date

            echo '<br>';

            echo '<p>Release date: ';

            echo $game['release_date'];

            echo '</p><br>';

            $categories = explode(",", $game['categories']);

            echo '<p>Categories: ';
            //var_dump($game['categories']);
            foreach($categories as $category){

                $category = explode(":", $category);
                //echo $category;
                //$game['category_id'] shte se sloji sled category_id=
                echo "<a class='category' href='index.php?action=Category&category_id=" . $category[1] ."'>" . $category[0] . "</a>" . "&nbsp";
            }
            echo '</p>';
			echo '<h4>Events: </h4>';
			if ($game['events'] != null)
			{
				$events = explode(';', $game['events']);

				
           
			
				foreach($events as $event){

					$event = explode(",", $event);
					echo "<p></p>";
					echo "<p >Event title: " . $event[1] . "</>";
					echo "<p class='event'>Description: " . $event[2] . "</>";
					echo "<p class='event'>Start: " . $event[3] . "</>";
					echo "<p class='event'>End:" . $event[4] . "</>";

				}
          }else{
		  echo "No events available at this time.";
		  
		  }
		  echo '<form action="index.php?action=AddEventForm&game_id='.$game['game_id'].'" method="POST"><button id="addevent" type="submit" >Add event</button></form>';
			

        echo '<h4>Comments: </h4>';

            echo "<form action='index.php?action=Game&game_id=" . $game['game_id'] . "' method='POST' onsubmit='return onClickCheck();'>";

                            echo '<div id="comments-form"><textarea placeholder="The message have to be longer then 6 symbols" type="text" id="message" name="message"></textarea>
                            <div id="div-comment"><button id="comment">Comment</button></div>
                        </form></p>
                        <div id="chat">';

        $comments = explode(",", $game['comments']);

        foreach($comments as $comment){
            echo "<div class='render_comments'>" . $comment . "</div>";
        }

            echo '</div></div>';
			echo '</section>
	            </div>';

    }



    function pageHeader()
    {
	
	if (isset ($_COOKIE['lastVisited']) && stristr($_COOKIE['lastVisited'], $this->fullGame['name']) == false)
		{
		$temp = explode('|', $_COOKIE['lastVisited']);
			if (count($temp) < 5)
			{
			$cookie = $_COOKIE['lastVisited'];
			$cookie	= $this->fullGame['game_id'].','.$this->fullGame['name'].'|'.$cookie;
			setcookie('lastVisited', $cookie);
			
			}
			else{ unset($temp[4]);
			$cookie = implode('|', $temp);
			$cookie	= $this->fullGame['game_id'].','.$this->fullGame['name'].'|'.$cookie;
			setcookie('lastVisited', $cookie);
		}
		}elseif(isset ($_COOKIE['lastVisited']) && stristr($_COOKIE['lastVisited'], $this->fullGame['name']) != false){
		}else
		{
		
		
		$value = $this->fullGame['game_id'].','.$this->fullGame['name'];
		setcookie('lastVisited', $value);
		}
		
        echo '<!DOCTYPE html>
				<html>
					<head lang="en">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta charset="UTF-8">
						<title>Gimension</title>
                        <link href="css/index.css" rel="stylesheet">
                        <link href="css/game.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
                        <script src="js/jquery-2.1.1.js"></script>
                        <script src="js/jquery.noty.packaged.min.js"></script>
                        <script src="js/checks.js"></script>
					</head><body>';
    }
} 
?>