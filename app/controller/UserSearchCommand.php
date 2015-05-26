<?php

namespace app\controller;

use mvce\controller\Command;
use mvce\controller\Input;
use mvce\controller\Request;
use mvce\exception\InputValidationException;
use app\view\UserSearchView;
use app\model\UserSearchDomain;

class UserSearchCommand extends Command
{
    private $allUsers = array();

    public function init()
    {

    }

    public function doExecute(Request $request)
    {
		$modelParams = array();
		$modelParams['username'] = $request->getProperty['username'];
		

        $userSearchDomain = new UserSearchDomain($modelParams);
        $this->allUsers = $userSearchDomain->select();
        

    }

    public function invokeView(Request $request )
    {
        
        return new UserSearchView($this->allUsers);
    }
} 