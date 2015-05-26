<?php

namespace app\view;
use mvce\view\AbstractView;


class GamesAbstractView extends AbstractView
{

private $allGames = array();

    public function __construct(array $allGames)
    {
        $this->allGames = $allGames;
    }


public function renderResponse()
{
echo '<gameel id="gamesid">
<h1 id="games" class="section-title">GAMES</h1>';
foreach ($this->allGames as $game)
{
echo '     <article class="game-article">
                <h3><a href="index.php?action=Game&game_id='.$game['game_id'].'">'.$game['name'].'</a></h3>
                <img class="img-article" src="images/games/'.$game['main_picture'].'" alt="'.$game['name'].'">

            </article>';

}
echo '</gameel>';

}

}
?>