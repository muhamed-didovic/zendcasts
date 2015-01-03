<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
    {
	$moduleLoader = new Zend_Application_Module_Autoloader(array(
		'namespace' => '',
		'basePath' => APPLICATION_PATH));	
	return $moduleLoader;
    }
    protected function _initRoutes()
    {
	$frontController = Zend_Controller_Front::getInstance();
	$router = $frontController->getRouter();
	$router->removeDefaultRoutes();
	$router->addRoute(
	  'langmodcontrolleraction',
	  new Zend_Controller_Router_Route('/:lang/:module/:controller/:action',
	    array('lang' => ':lang')
	  )
	);
	$router->addRoute(
	  'langcontrolleraction',
	  new Zend_Controller_Router_Route('/:lang/:controller/:action',
	    array('lang' => ':lang')
	  )
	);
	$router->addRoute(
	  'langindex',
	  new Zend_Controller_Router_Route('/:lang',
	    array('lang' => 'en',
		  'module' => 'default',
		  'controller' => 'index',
		  'action' => 'index'
	    )
	  )
	);
	$router->addRoute(
	  'langcontroller',
	  new Zend_Controller_Router_Route('/:lang/:controller',
	    array('lang' => 'en',
		  'module' => 'default',
		  'controller' => 'index',
		  'action' => 'index'
	    )
	  )
	);

    }

}

