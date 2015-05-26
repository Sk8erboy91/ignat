<?php

namespace app\view;

use mvce\view\HTMLTemplate;
use app\controller\ContactsCommand;
use mvce\mail\MailService;

class ContactsView extends HTMLTemplate {
	protected function pageContent() {
		try {
			$fnameError = '';
			echo '<div id="contactDiv">
                <section id="center">
                        <h2> CONTACT us </h2>
                       
                        <p> &nbsp;&nbsp; Your opinion does matter to us, so please send us any recommendations, issues that you are facing or just thumbs up! </p>';
			echo "<form method=\"post\" action=\"index.php?action=Contacts\">
					<p>First name:<input id=\"fname\" type=\"text\" name=\"fname\" placeholder=\"Enter Here\"></p>
					<p>Last name:<input id=\"lname\" type=\"text\" name=\"lname\" placeholder=\"Enter Here\"></p>
					<p>E-mail:<input id=\"mail\" type=\"text\" name=\"mail\" placeholder=\"Enter Here\"></p>
					<p>Your message :</p>
					<p><textarea rows=\"8\" cols=\"30\" name=\"emailBody\"> </textarea></p>
					<p>Rate Gimension : <select name=\"rating\">
	                                                                                                                <option value=\"0\"> Please choose</option>
	                                                                                                                <option value=\"5\"> &#9733 &#9733 &#9733 &#9733 &#9733</option>
	                                                                                                                <option value=\"4\"> &#9733 &#9733 &#9733 &#9733</option>
	                                                                                                                <option value=\"3\"> &#9733 &#9733 &#9733</option>
	                                                                                                                <option value=\"2\"> &#9733 &#9733</option>
	                                                                                                                <option value=\"1\"> &#9733 </option>
	                                                                                                </select></p>
				<p>	<input type=\"submit\" value=\"Send\" name=\"submit\" /></p>
				
				</form>
				</section>
        	</div>";
		} catch ( Exception $e ) {
			echo 'Caught exception: ', $e->getMessage (), "\n";
		}
	}
	function pageHeader() {
		echo '<!DOCTYPE html>
				<html>
					<head lang="en">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta charset="UTF-8">
						<title>Gimension</title>
                        <link href="css/index.css" rel="stylesheet">
                        <link href="css/contact.css" rel="stylesheet">
                        <link href="css/indexResponsive.css" rel="stylesheet">
						<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					</head><body>';
	}
}	