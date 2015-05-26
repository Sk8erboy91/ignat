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
use app\view\NewsByIdView;
use app\model\NewsByIdDomain;

class NewsByIdCommand extends Command
{
    private $fullNews = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {

        $message = $request->getProperty('message');
        $news = $request->getProperty('news_id');

        $modelParams = array();
        if(strlen($message) > 6 && !empty($message)){

            $modelParams['message'] = $message;
        }

        $modelParams['news_id'] = $news;
        $newsDomain = new NewsByIdDomain($modelParams);

        $this->fullNews = $newsDomain->select();
    }

    public function invokeView(Request $request )
    {
        return new NewsByIdView($this->fullNews);
    }
} 