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

class GamesView extends HTMLTemplate
{
    private $allGames = array();

    public function __construct(array $allGames)
    {
        $this->allGames = $allGames;

    }

    protected function pageContent()
    {

        echo  '<div id="newsDiv">
		<section id="center">
			<h1>Games</h1>';



        $i = 0;
        foreach ($this->allGames as $game)
        {
            $description = substr($game['description'], 0, 700);

            $seeMore = "<a class='see' href='index.php?action=Game&game_id=" . $game['game_id'] ."'>see more...</a>";

            $description .= ' ' . $seeMore;

            echo "<article class='games game" . $i ."'>";
            $i++;
            echo "<h3><a href='index.php?action=Game&game_id=" . $game['game_id'] ."'>" . $game['name'] . "</a>";

            echo '</h3>';
            echo "<a href='index.php?action=Game&game_id=" . $game['game_id'] ."'>";
             echo "<div class='render_game'><img class=\"img-article\" src='images/games/" . $game['main_picture'] . "' alt='logo'></a>";

             echo "<p><span class='bold' id='description'>" . $description . "</span>";

              echo '</p></div>
            </article>';
        }

            echo ' <input type="hidden" value="4" class="hidden"></section>
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
                        <link href="css/games.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
                        <script src="js/jquery-2.1.1.js"></script>
                        <script src="js/scrolling.js"></script>
					</head><body>';
    }
} 