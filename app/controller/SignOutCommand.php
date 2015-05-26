<?php
namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Request;

class SignOutCommand extends Command
{
	public function init()
	{		
	}
	
	public function doExecute(Request $request )
	{		
		session_destroy();
		
		header("Location: index.php");
	}
	
	public function invokeView(Request $request )
	{
		
	}
}