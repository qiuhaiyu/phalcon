<?php
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    protected $_connection;

    public function setConnection($connection){
        $this->_connection = $connection;
    }

    public function indexAction(){
        /*$this->view->setVar('name','harry');
        $this->view->setVar('list',array('a','b','c','d','e'));
        echo $this->view->render('index/index');*/

        //$data = $this->db->insert('users',['name'=>goods,'email'=>'haiyu613@126.com']);



    }

    public function slipAction(){
        echo 'goods';
    }
}


?>