<?php
namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\NewsView;
use app\model\NewsSearchDomain;

class NewsSearchCommand extends Command
{
    private $allNews = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {
		$modelParams = array();
		$modelParams['text'] = $request->getProperty['text'];
		$modelParams['heading'] = $request->getProperty['heading'];

        $newsSearchDomain = new NewsSearchDomain($modelParams);
        $this->allNews = $newsSearchDomain->select();
        

    }

    public function invokeView(Request $request )
    {
        
        return new NewsView($this->allNews);
    }
} 