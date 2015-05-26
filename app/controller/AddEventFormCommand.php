<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\AddEventFormView;



class AddEventFormCommand extends Command
{
	private $game;
    
    public function init()
    {

    }

    public function doExecute(Request $request)
    {
	

       $this->game = $request->getProperty('game_id');
		

    }

    public function invokeView(Request $request )
    {
        
        return new AddEventFormView($this->game);
    }
} 