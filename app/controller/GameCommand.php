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
use app\view\GameView;
use app\model\GameDomain;


class GameCommand extends Command
{
    private $fullGame = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {

        $message = $request->getProperty('message');
        //var_dump($message); raboti

        $game = $request->getProperty('game_id'); // $_GET['game_id']
//        $game = $_GET['game_id'];
//        var_dump($request->getMethod()); GET e...

        $modelParams = array();
        if(strlen($message) > 6 && !empty($message)){

        $modelParams['message'] = $message;
        }

        $modelParams['game_id'] = $game;
        $gameDomain = new GameDomain($modelParams);

        //var_dump($gameDomain); //raboti
        //var_dump($this->fullGame); empty
        //var_dump($gameDomain->select());

        $this->fullGame = $gameDomain->select();
        //var_dump($this->fullGame);
        //var_dump($this->allGames);
		

    }

    public function invokeView(Request $request )
    {
        //var_dump($this->allGames);
        return new GameView($this->fullGame);
    }
} 