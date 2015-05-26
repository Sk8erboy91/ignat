<?php
namespace app\controller;

use mvce\controller\Command;
use app\view\GalleryView;
use mvce\controller\Request;


class GalleryCommand extends Command
{
	public function init()
	{
		
	}
	
	public function doExecute(Request $request )
	{
		
	}
	
	public function invokeView(Request $request )
	{
		return new GalleryView();
	}
}