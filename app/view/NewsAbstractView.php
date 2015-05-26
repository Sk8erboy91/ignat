<?php

namespace app\view;
use mvce\view\AbstractView;


class NewsAbstractView extends AbstractView
{

private $allGames = array();

    public function __construct(array $allNews)
    {
        $this->allNews = $allNews;
    }


public function renderResponse()
{
echo '<newsel id="newsid">
<h1 id="news" class="section-title">NEWS</h1>';
foreach ($this->allNews as $news)
{
echo '     <article class="game-news">
                <h3><a href="index.php?action=NewsById&news_id='.$news['news_id'].'">'.$news['heading'].'</a></h3>
                <img class="img-article" src="images/news/'.$news['news_picture'].'" alt="'.$news['heading'].'">

            </article>';

}
echo '</newsel>';

}

}
?>