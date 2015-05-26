<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\GamesView;
use app\model\GameSearchDomain;

class GameSearchCommand extends Command
{
    private $allGames = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {
		$modelParams = array();
		$modelParams['name'] = $request->getProperty('name');
		$modelParams['description'] = $request->getProperty('description');
		$modelParams['category'] = $request->getProperty('category');
		$modelParams['platform'] = $request->getProperty('platform');
		$modelParams['company'] = $request->getProperty('company');
        $gameSearchDomain = new GameSearchDomain($modelParams);
        $this->allGames = $gameSearchDomain->select();
        

    }

    public function invokeView(Request $request )
    {
        
        return new GamesView($this->allGames);
    }
} 