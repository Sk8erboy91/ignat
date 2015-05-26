<?php

namespace app\view;
use mvce\view\AbstractView;


class RecommendedGamesView extends AbstractView
{

private $allGames = array();

    public function __construct(array $allGames)
    {
        $this->allGames = $allGames;
    }


public function renderResponse()
{
echo '<recomel id=""recommend">
		
			<h1 class="section-title">RECOMMENDED GAMES</h1>';

			
			
			foreach($this->allGames as $game)
			{
			
			echo '<div>
				<div class="bold">Release date:'.$game['release_date'].'</div>
				<div>'.$game['name'].'</div>
				<a class="see" href="index.php?action=Game&game_id='.$game['game_id'].'">see more...</a>
			</div>';
			}
			

			

	echo	'</recomel>';
}

}
?>