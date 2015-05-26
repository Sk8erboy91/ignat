<?php
namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Request;
use app\view\RegistryView;
use app\model\RegistryDomain;
use app\view\RegisterView;
use mvce\controller\Input;
use app\model\RegisterDomain;

class RegisterCommand extends Command
{	
	
	private $user = array();
	
	public function init()
	{
		
	}

	
	public function doExecute(Request $request)
	{
		$inParams = array();
		$register = false;
		
		
		if($request->isPost())
		{
		
		$user = array();
			
		$inParams['firstname'] = $request->getProperty('firstname');
		$inParams['lastname'] = $request->getProperty('lastname');
		$inParams['email'] = $request->getProperty('email');
		$inParams['username'] = $request->getProperty('username');
		$inParams['password'] = $request->getProperty('password');
		$inParams['repass'] = $request->getProperty('repass');
		$inParams['country'] = $request->getProperty('country');
		
		$uppercase = preg_match('@[A-Z]@', $inParams['password']);
		$lowercase = preg_match('@[a-z]@', $inParams['password']);
		$number    = preg_match('@[0-9]@', $inParams['password']); 
				
		if (is_null($inParams['firstname']) || strlen($inParams['firstname']) < 3 )
		{
			$message = "Please, enter valid first name!";
		}else if (is_null($inParams['lastname']) || strlen($inParams['lastname']) < 3 )
		{
			$message = "Please, enter valid last name!";
		}else if (is_null($inParams['username']) || strlen($inParams['username']) < 5)
		{
			$message = "Please enter valid username - it should have at least 5 characters, one digit or one letter!";
		}else if(is_null($inParams['email']) || strlen($inParams['email']) < 6)
		{
			$message = "Please enter valid email address!";
		}else if(is_null($inParams['password']) || strlen($inParams['password']) < 8 || !$uppercase || !$lowercase || !$number )
		{
			$message = "Please enter valid password!";
		}else if(is_null($inParams['repass']) || $inParams['repass'] != $inParams['password'])
		{
			$message = "Incorrect password confirm, please check your password";
		}else if (is_null($inParams['country']) || strlen($inParams['country']) < 4)
		{
			$message = "Please enter valid country!";
		}else
		{		
			
			$inParams['password']= md5($inParams['password']);
			
			$regObject = new RegisterDomain ($inParams);
			$this->user = $regObject->doSelect($inParams);
			
			if($this->user == null)
			{
				$regObject->insert();
				$regObject->commit();
				$register = true;
			}else
			{
				$message = "This username is not valid!";
			}
			
			if($register == true)
			{
				header("Location: index.php");
				exit;
			} 
		}	
		
		}
	}
	
	public function invokeView(Request $request )
	{
		return new RegisterView();
	}
	
}