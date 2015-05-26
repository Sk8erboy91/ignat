<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\SearchView;
use app\model\SearchDomain;

class SearchCommand extends Command
{
    private $results = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {
	
		$modelParams = array();
		$modelParams['keywords'] = $request->getProperty('keywords');
		

        $searchDomain = new SearchDomain($modelParams);
        $this->results = $searchDomain->select();
        

    }

    public function invokeView(Request $request )
    {
		
        
        return new SearchView($this->results);
    }
} 
?>