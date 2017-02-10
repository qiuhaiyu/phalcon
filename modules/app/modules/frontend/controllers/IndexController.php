<?php

namespace Modules\Modules\Frontend\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        //$name = 'qhy';
        $arr = array('name'=>12,'good'=>'we');
        //$this->view->setVar('name',$name);
        //$this->view->setVars(['age'=>27,'sex'=>'man']);
        $this->view->arr = $arr;
        $this->view->pick('index/test');
    }

}

