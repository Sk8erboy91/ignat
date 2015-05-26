<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use DateTime;

use app\model\AddEventDomain;

class AddEventCommand extends Command
{
   

    public function init()
    {

    }

    public function doExecute(Request $request)
    {	
		$modelParams = array();
		$modelParams['game_id'] = $request->getProperty('game_id');
		$modelParams['name'] = $request->getProperty('name');
        $modelParams['description'] = $request->getProperty('description');
		$modelParams['start_datetime'] = new DateTime($request->getProperty('start_datetime'));
		$modelParams['end_datetime'] = new DateTime($request->getProperty('end_datetime'));
		
        $eventDomain = new AddEventDomain($modelParams);
        $eventDomain->insert();
        

    }

    public function invokeView(Request $request )
    {
        
    }
} 