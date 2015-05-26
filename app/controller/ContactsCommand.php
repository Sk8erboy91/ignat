<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Request;
use app\view\ContactsView;
use app\model\ContactsDomain;
use mvce\mail\MailService;
use mvce\controller\Input;

class ContactsCommand extends Command {
	public function init() {
		if (isset ( $_REQUEST ['POST'] )) {
			$this->inputVariableSignitures ['fname'] = array (
					Input::TYPE => Input::STRING,
					Input::SCOPE => Input::REQUIRED 
			);
			$this->inputVariableSignitures ['lname'] = array (
					Input::TYPE => Input::STRING,
					Input::SCOPE => Input::REQUIRED 
			);
			$this->inputVariableSignitures ['email'] = array (
					Input::TYPE => Input::EMAIL,
					Input::SCOPE => Input::REQUIRED 
			);
			$this->inputVariableSignitures ['emailBody'] = array (
					Input::TYPE => Input::STRING,
					Input::SCOPE => Input::REQUIRED 
			);
			$this->inputVariableSignitures ['rating'] = array (
					Input::TYPE => Input::INT,
					Input::SCOPE => Input::REQUIRED 
			);
		}
		function sendEmail($fname, $lname, $mail, $emailBody, $rating) {
			$body = MailService::setMessageBody ( $emailBody, $rating );
			$subject = MailService::getMessageSubject ();
			$to = "contact@gimension.com";
			$from = "$mail";
			$name = $fname . " " . $lname;
			$body = MailService::getMessageBody ();
			MailService::sendMail ( $from, $to, $subject, $body, $name );
		}
		if (isset ( $_POST ['submit'] )) {
			sendEmail ( $_POST ['fname'], $_POST ['lname'], $_POST ['mail'], $_POST ['emailBody'], $_POST ['rating'] );
		}
	}
	public function doExecute(Request $request) {
	}
	public function invokeView(Request $request) {
		return new ContactsView ();
	}
}

?>