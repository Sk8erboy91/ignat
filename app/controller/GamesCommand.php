<?php
/**
 * Created by PhpStorm.
 * User: ScreeM
 * Date: 14-12-15
 * Time: 1:08
 */
namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\GamesView;
use app\model\GamesDomain;

class GamesCommand extends Command
{
    private $allGames = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {
        $_SESSION['url'] = 'Games';
        $gamesDomain = new GamesDomain();
        $this->allGames = $gamesDomain->select();
        //var_dump($this->allGames);

    }

    public function invokeView(Request $request )
    {
        //var_dump($this->allGames);
        return new GamesView($this->allGames);
    }
} 