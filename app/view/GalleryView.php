<?php
namespace app\view;

use mvce\view\HTMLTemplate;

class GalleryView extends HTMLTemplate
{
	public function pageHeader()
	{
		echo '<!DOCTYPE html>
				<html>
					<head lang="en">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta charset="UTF-8">
						<title>Gimension</title>
                        <link href="css/index.css" rel="stylesheet">
                        <link href="css/gallery.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
						<script type="text/javascript" src="js/gallery_script.js"></script>
						<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					</head>
					<body onload="startTimer()">
					';
	}
	
	protected function pageContent()
	{
		echo '<div id="galleryDiv">
				<section id="center">
				<script>
					var images = [], x = -1;
					images[0] = "images/gallery/img1.jpg";
					images[1] = "images/gallery/img2.jpg";
					images[2] = "images/gallery/img3.jpg";
					images[3] = "images/gallery/img4.jpg";
					images[4] = "images/gallery/img5.jpg";
					images[5] = "images/gallery/img6.jpg";
					images[6] = "images/gallery/img7.jpg";
					images[7] = "images/gallery/img8.jpg";
					images[8] = "images/gallery/img9.jpg";
					images[9] = "images/gallery/img10.jpg";
					images[10] = "images/gallery/img0.jpg"; // tazi vinagi trqbva da bude posledna, inache shte se obyrka reda!
					</script>
					
				<div>
					<img id="img" src="images/gallery/img0.jpg">
					<br>
					<button onclick="displayPreviousImage()">Previous</button>
					<button onclick="displayNextImage()">Next</button>
				</div>
				</section>
			</div>';
	}
}