<?php
/**
 * Created by PhpStorm.
 * User: ScreeM
 * Date: 14-12-18
 * Time: 21:06
 */

namespace app\view;
use mvce\view\HTMLTemplate;

class NewsByIdView extends HTMLTemplate {
    private $fullNews = array();

    public function __construct(array $fullNews)
    {
        $this->fullNews = $fullNews;
    }

    protected function pageContent()
    {
        $news = $this->fullNews;

        //NEWS VIEW

        //var_dump($news);

        echo '<div id="description">
		<section id="center">
			<h1 class="section-title">';

            echo $news['heading'];

        echo"</h1>
			<img id='newsPic' src='images/news/" . $news['news_picture'] . "' alt='logo'>";

        echo '<br><br>';

        echo "<p>" . $news['news_text'] . "</p>";

        echo '<br>';

        echo '<h4>Comments: </h4>';

        echo "<form action='index.php?action=NewsById&news_id=" . $news['news_id'] . "' method='POST' onsubmit='return onClickCheck();'>";

        echo '<div id="comments-form"><textarea placeholder="The message have to be longer then 6 symbols" type="text" id="message" name="message"></textarea>
                            <div id="div-comment"><button id="comment">Comment</button></div>
                        </form></p>
                        <div id="chat">';

        $comments = explode(",", $news['comments']);

        foreach($comments as $comment){
            echo "<div class='render_comments'>" . $comment . "</div>";
        }

        echo '</div></div>';
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
                        <link href="css/newsById.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
                        <script src="js/jquery-2.1.1.js"></script>
                        <script src="js/jquery.noty.packaged.min.js"></script>
                        <script src="js/checks.js"></script>
					</head><body>';
    }
} 