<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Request;
use app\view\ProfileView;
use mvce\controller\Input;
use app\model\ProfileDomain;

class ProfileCommand extends Command {
	private $allInfo = array ();
	private $userProfil = array ();
	public function init() {
	}
	public function doExecute(Request $request) {
		$inParams = array ();
		$update = false;
		
		$ProfilDomain = new ProfileDomain ();
		$this->allInfo = $ProfilDomain->select ();
		
		if ($request->isPost ()) {
			$userProfil = array ();
			$inParams ['firstname'] = $request->getProperty ( 'firstname' );
			$inParams ['lastname'] = $request->getProperty ( 'lastname' );
			$inParams ['email'] = $request->getProperty ( 'email' );
			$inParams ['country'] = $request->getProperty ( 'country' );
			
			if (is_null ( $inParams ['firstname'] ) || strlen ( $inParams ['firstname'] ) < 3) {
				$message = "Please, enter valid first name!";
			} else if (is_null ( $inParams ['lastname'] ) || strlen ( $inParams ['lastname'] ) < 3) {
				$message = "Please, enter valid last name!";
			} else if (is_null ( $inParams ['email'] ) || strlen ( $inParams ['email'] ) < 6) {
				$message = "Please enter valid email address!";
			} else if (is_null ( $inParams ['country'] ) || strlen ( $inParams ['country'] ) < 4) {
				$message = "Please enter valid country!";
			} else {
				
				$ProfilDomain->setProperties ( $inParams );
				$this->userProfil = $ProfilDomain->doUpdate ( $inParams );
				
				if ($this->userProfil == null) {
					$ProfilDomain->update ( $inParams );
					$ProfilDomain->commit ();
					$update = true;
				} else {
					$message = "This username is not valid!";
				}
				
				if ($update == true) {
					header ( "Location: index.php" );
					exit ();
				}
			}
		}
	}
	public function invokeView(Request $request) {
		return new ProfileView ( $this->allInfo );
	}
}