<?php
namespace app\view;

use mvce\view\HTMLTemplate;
use app\view\render;

class SearchView extends HTMLTemplate

{

	private $results = array();

    public function __construct(array $results)
    {
        $this->results = $results;
		
    }

	
    protected function pageContent()
    {
      echo '<div id="centerOfAll">
		<section id="center">
		<section>

			<h1 id="games" class="section-title">GAMES</h1>';
		
		$i = '';
		foreach ($this->results as $game)
		{
		if ($game['TYPE'] == "games")		
			{
			$description = substr($game['text'], 0, 700);

            $seeMore = "<a class='see' href='index.php?action=Game&game_id=" . $game['id'] ."'>see more...</a>";

            $description .= ' ' . $seeMore;

            echo "<article class='games game" . $i ."'>";
            $i++;
            echo "<h3><a href='index.php?action=Game&game_id=" . $game['id'] ."'>" . $game['name'] . "</a>";

            echo '</h3>';
            echo "<a href='index.php?action=Game&game_id=" . $game['id'] ."'>";
             echo "<div class='render_game'><img class=\"img-article\" src='images/games/" . $game['picture'] . "' alt='logo'></a>";

             echo "<p><span class='bold' id='description'>" . $description . "</span>";

              echo '</p></div>
            </article>';
			}
		}
			

			
		echo '</section>

		<section>

			<h1 id="news" class="section-title">NEWS</h1>';

			$i = '';
		foreach ($this->results as $news)
		{
		if ($news['TYPE'] == "news")		
			{
			$text = substr($news['text'], 0, 700);

            $seeMore = "<a class='see' href='index.php?action=NewsById&news_id=" . $news['id'] ."'>see more...</a>";

            $text .= ' ' . $seeMore;

            echo '<article class="news">
                <h3>';
            echo "<a href='index.php?action=NewsById&news_id=" . $news['id'] ."'>" . $news['name'] . "</a>";

            echo '</h3>';
            echo "<a href='index.php?action=NewsById&news_id=" . $news['id'] ."'>";
             echo "<img class=\"img-article\" src='images/news/" . $news['picture'] . "' alt='logo'></a>";

             echo "<p><span class='bold' id='text'>" . $text . "</span>";

              echo '</p>
            </article>';
			}

            
			
		}

		echo '</section></div>';
    }
}

?>