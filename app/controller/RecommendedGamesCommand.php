<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\RecommendedGamesView;
use app\model\RecommendedGamesDomain;

class RecommendedGamesCommand extends Command
{
    private $allGames = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {

        $gamesDomain = new RecommendedGamesDomain();
        $this->allGames = $gamesDomain->select();
        

    }

    public function invokeView(Request $request )
    {
      
        return new RecommendedGamesView($this->allGames);
    }
} 