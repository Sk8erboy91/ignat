<?php
namespace app\controller;

use mvce\controller\Command;
use app\view\LoginUserView;
use mvce\controller\Request;
use app\model\LoginUserDomain;
use mvce\controller\Session;
use mvce\controller\User;
use mvce\exception\BaseException;
use mvce\controller\Registry;

class LoginUserCommand extends Command
{
	private $userParams = array();
	private $user;
	public function init()
	{
		
	}
	
	public function doExecute(Request $request)
	{
		$loginParams = array();
		
		if($request->isPost())
		{
			$loginParams['username'] = $request->getProperty('username');
			$loginParams['password'] = $request->getProperty('password');
				
			$uppercase = preg_match('@[A-Z]@', $loginParams['password']);
			$lowercase = preg_match('@[a-z]@', $loginParams['password']);
			$number    = preg_match('@[0-9]@', $loginParams['password']);
			
			if (is_null($loginParams['username']) || strlen($loginParams['username']) < 3)
			{
				$message = "Invalid Username or Password!";
			}else if(is_null($loginParams['password']) || strlen($loginParams['password']) < 8 || !$uppercase || !$lowercase || !$number)
			{
				$message = "Invalid Username or Password!";
			}else
			{
				$loginObj = new LoginUserDomain($loginParams);
				$this->userParams = $loginObj->doSelect($loginParams);
				
				//var_dump($loginParams['comments']);
				
				$loginParams['password'] = md5($loginParams['password']);
				
				/* var_dump($loginParams['password']);
				var_dump($this->userParams['password']);  */
				
				if($loginParams['password'] == $this->userParams['password'])
				{
					$newUser = new User($this->userParams['user_id'], $this->userParams['username'],
										$this->userParams['first_name'], $this->userParams['last_name'],
										$this->userParams['country'], $this->userParams['email'], 
										$this->userParams['status'],$this->userParams['role'],
										$this->userParams['liked_games'],$this->userParams['rated_games'],
										$this->userParams['friends'], $this->userParams['comments'],
										$this->userParams['rated_comments']);

					$_SESSION['user'] = $newUser;
					
					$_SESSION['first_name'] = $newUser->getFirstName();
					$_SESSION['last_name'] = $newUser->getLastName();
					$_SESSION['user_id'] = $newUser->getUserId();
					$_SESSION['username'] = $newUser->getUsername();
					$_SESSION['country'] = $newUser->getCountry();
					$_SESSION['email'] = $newUser->getEmail();
					$_SESSION['status'] = $newUser->getStatus();
					$_SESSION['role'] = $newUser->getRole();
					
					if($_SESSION['liked_games'] != null)
					{
						$_SESSION['liked_games'] = $newUser->getLikedGames();
					}
					
					if($_SESSION['rated_games'] != null)
					{
						$_SESSION['rated_games'] = $newUser->getRatedGames();
					}
					
					if($_SESSION['comments'] != null)
					{
						$_SESSION['comments'] = $newUser->getComments();
					}
					
					if($_SESSION['friends'] != null)
					{
						$_SESSION['friends'] = $newUser->getFriendList();
					}
					
					if($_SESSION['rated_comments'] != null)
					{
						$_SESSION['rated_comments'] = $newUser->getRatedComments();
					}		
					
					//var_dump($_SESSION['user']->getFirstName());
					
					header("Location: index.php");					
										
				}else 
				{
					throw new BaseException("Invalid login");					
				}
			}
		}
	}
	
	public function invokeView(Request $request)
	{
		return new LoginUserView();
	}
}