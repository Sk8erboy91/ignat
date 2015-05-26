<?php
/**
 * Created by PhpStorm.
 * User: ScreeM
 * Date: 14-12-14
 * Time: 23:16
 */

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\NewsView;
use app\model\NewsDomain;

class NewsCommand extends Command
{
    private $allNews = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {

        $newsDomain = new NewsDomain();
        $this->allNews = $newsDomain->select();
        //var_dump($this->allGames);

    }

    public function invokeView(Request $request )
    {
        //var_dump($this->allGames);
        return new NewsView($this->allNews);
    }
} 