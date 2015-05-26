<?php

namespace app\view;

use mvce\view\HTMLTemplate;

class AboutusView extends HTMLTemplate
{
	protected function pageContent()
	{
	echo '<div id="aboutUs">
                <section id="center">
                       
                        <h2>About us</h2>
                       
                                <p id="text"> &nbsp; &nbsp; We are <span id="bold">Mihail Nikov, Maria Deleva, Ignat Milev and Yavor Parmakov</span> - students from <span><u><a href="http://ittalents.bg/">IT Talents Academy</a></u></span>, <span>PHP</span> course.
                                And this is our final project - to create a page, where all kind of gamers can share,
                                search or just communicate with their own kind.
                                We will try to create the best experience for every visitor and gamer and
                                we hope you would all love our work!</p>
                                                               
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
                        <link href="css/index.css" rel="stylesheet">
                        <link href="css/aboutus.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
						<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					</head><body>';
    }

}

?>