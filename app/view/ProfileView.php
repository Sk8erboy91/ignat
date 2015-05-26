<?php

namespace app\view;

use mvce\view\HTMLTemplate;

class ProfileView extends HTMLTemplate {
	private $allInfo = array ();
	public function __construct(array $allInfo) {
		$this->allInfo = $allInfo;
	}
	protected function pageContent() {
		echo '<div id="centerOfAll"> 
				<section id="center"><div class="registration-form">
		
				<form action="index.php?action=Profile" method="post">
			<h2>';
		echo "		Profile : " . $this->allInfo ['username'];
		echo '				</h2>
							<div class="reg-row">
							<label class="reg-left" for="first_name"> First Name : </label>
			         		<div class="reg-right">';
		echo "					<input id=\"firstname\" class=\"reg-box\" type=\"text\" name=\"firstname\" value =" . $this->allInfo ['first_name'] . " />";
		echo '				</div>
							</div>
		
							<div class="reg-row">
							<label class="reg-left" for="last_name"> Last Name : </label>
							<div class="reg-right">';
		echo "					<input id=\"lastname\" class=\"reg-box\" type=\"text\" name=\"lastname\" value=" . $this->allInfo ['last_name'] . " />";
		echo '				</div>
							</div>
		
							<div class="reg-row">
							<label class="reg-left" for="mail"> E-Mail : </label>
							<div class="reg-right">';
		echo "				<input id=\"email\" class=\"reg-box\" type=\"email\" name=\"email\" value=" . $this->allInfo ['email'] . " />";
		echo '				</div>
							</div>
		
							<div class="reg-row">
							<label class="reg-left" for="country"> Country : </label>
							<div class="reg-right">';
		echo "					<input id=\"country\" class=\"reg-box\" type=\"text\" name=\"country\" value=" . $this->allInfo ['country'] . " />";
		echo '				</div>
							</div>
				
				  	<div class="reg-row">
				  	<div class="reg-right">
				  	<input class="btn-register" type="submit" name="update" value="Update" />
				  	</div>
				  	</div>
				  	</div>
				  	</form>
		
				  	</section>
				  	</div>';
	}
	public function pageHeader() {
		echo '<!DOCTYPE html>
				<html>
					<head lang="en">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta charset="UTF-8">
						<title>Gimension</title>
                        <link href="css/index.css" rel="stylesheet">
						<link href="css/register.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
					</head>
					<body>
					';
	}
}

?>