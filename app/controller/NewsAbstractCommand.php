<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\NewsAbstractView;
use app\model\NewsAbstractDomain;

class NewsAbstractCommand extends Command
{
    private $allNews = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {

        $newsDomain = new NewsAbstractDomain();
        $this->allNews = $newsDomain->select();
        

    }

    public function invokeView(Request $request )
    {
      
        return new NewsAbstractView($this->allNews);
    }
} 