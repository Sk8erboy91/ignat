<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\GamesView;
use app\model\CategoryDomain;

class CategoryCommand extends Command
{
    private $allCategories = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {
        $category = $request->getProperty('category_id'); 

        $modelParams = array();
        $modelParams['category_id'] = $category;
        session_start();
        $_SESSION['url'] = 'Category';
        $categoryDomain = new CategoryDomain($modelParams);

        

        $this->allGames = $categoryDomain->select();
        //var_dump($this->fullGame);
        //var_dump($this->allGames);

    }

    public function invokeView(Request $request )
    {
        
        return new GamesView($this->allGames);
    }
}
?>