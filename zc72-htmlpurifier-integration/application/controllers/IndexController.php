<?php

class IndexController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $this->view->purifier = Zend_Registry::get('purifier');
    }


}

