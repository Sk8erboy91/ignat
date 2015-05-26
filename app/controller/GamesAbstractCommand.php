<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\GamesAbstractView;
use app\model\GamesAbstractDomain;

class GamesAbstractCommand extends Command
{
    private $allGames = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {
        
        
        $gamesDomain = new GamesAbstractDomain();
        $this->allGames = $gamesDomain->select();
      

    }

    public function invokeView(Request $request )
    {
       
        return new GamesAbstractView($this->allGames);
    }
} 
?>