<?php


namespace app\view;
use mvce\view\HTMLTemplate;
use app\view\render;

class NewsView extends HTMLTemplate
{
    private $allNews = array();

    public function __construct(array $allNews)
    {
        $this->allNews = $allNews;
    }

    protected function pageContent()
    {
        echo  '<div id="newsDiv">
		<section id="center">
			<h1> News </h1>';
        foreach ($this->allNews as $news)
        {
            $text = substr($news['news_text'], 0, 700);

            $seeMore = "<a class='see' href='index.php?action=NewsById&news_id=" . $news['news_id'] ."'>see more...</a>";

            $text .= ' ' . $seeMore;

            echo '<article class="news">
                <h3>';
            echo "<a href='index.php?action=NewsById&news_id=" . $news['news_id'] ."'>" . $news['heading'] . "</a>";

            echo '</h3>';
            echo "<a href='index.php?action=NewsById&news_id=" . $news['news_id'] ."'>";
             echo "<img class=\"img-article\" src='images/news/" . $news['news_picture'] . "' alt='logo'></a>";

             echo "<p><span class='bold' id='text'>" . $text . "</span>";

              echo '</p>
            </article>';
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
                        <link href="css/news.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
						<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					</head><body>';
    }
} 