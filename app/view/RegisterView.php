<?php
namespace app\view;

use mvce\view\HTMLTemplate;

class RegisterView extends HTMLTemplate
{
	private $properties;
	
	/* public function __construct(array $properties)
	{
		$this->properties = $properties;
	} */
	
	protected function pageContent()
	{
		echo '<div id="centerOfAll"> 
				<section id="center"><div class="registration-form">
		
			<span class="rightcornerlink">All fields are required</span>
				<form action="index.php?action=Register" method="post">
			<h2>
				Register
					<span class="reg_weak">(its free)</span>
							</h2>
		
							<div class="reg-row">
							<label class="reg-left" for="first_name"> First Name : </label>
							<div class="reg-right">
							<input id="firstname" class="reg-box" type="text\" name="firstname" placeholder="Your first name" />
							</div>
							</div>
		
							<div class="reg-row">
							<label class="reg-left" for="last_name"> Last Name : </label>
							<div class="reg-right">
							<input id="lastname" class="reg-box" type="text" name="lastname" placeholder="Your last name" />
							</div>
							</div>
		
							<div class="reg-row">
							<label class="reg-left" for="mail"> E-Mail : </label>
							<div class="reg-right">
							<input id="email" class="reg-box" type="email" name="email" placeholder="Your email" />
							</div>
							</div>
		
							<div class="reg-row">
							<label class="reg-left" for="username"> Username: </label>
							<div class="reg-right">
							<input id="username" class="reg-box" type="text" name="username" placeholder="Choose username" />
							</div>
							</div>
		
							<div class="reg-row">
							<label class="reg-left" for="password"> Password : </label>
							<div class="reg-right">
							<input id="password" class="reg-box"type="password" name="password" placeholder="Your password" />
							</div>
							</div>
								
							<div class="reg-row">
							<label class="reg-left" for="password"> Confirm Password : </label>
							<div class="reg-right">
							<input id="repass" class="reg-box" type="password" name="repass" placeholder="Confirm your password" />
							</div>
							</div>
							 
							<div class="reg-row">
							<label class="reg-left" for="country"> Country : </label>
							<div class="reg-right">
							<input id="country" class="reg-box" type="text" name="country" placeholder="Enter your country" />
							</div>
							</div>
		
				  	<div class="reg-row">
				  	<div class="reg-right">
				  	<input class="btn-register" type="submit" name="register" value="Register" />
				  	</div>
				  	</div>
				  	</div>
				  	</form>
		
				  	</section>
				  	</div>';
	}
	
	
	public function pageHeader()
	{
		echo '<!DOCTYPE html>
				<html>
					<head lang="en">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta charset="UTF-8">
						<title>Gimension</title>
                        <link href="css/index.css" rel="stylesheet">
						<link href="css/register.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
						<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					</head>
					<body>
					';
	}
}