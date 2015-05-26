<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Request;
use app\view\AdvancedSearchView;

class AdvancedSearchCommand extends Command
{
	public function init()
	{
		
	}
	
	public function doExecute(Request $request )
	{
		
	}
	
	public function invokeView(Request $request )
	{
		return new AdvancedSearchView();
	}
}

?>