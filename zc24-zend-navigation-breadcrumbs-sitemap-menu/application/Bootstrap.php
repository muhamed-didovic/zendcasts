<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload()
	{
		$moduleLoader = new Zend_Application_Module_Autoloader(array(
			'namespace' => '',
			'basePath' => APPLICATION_PATH));

		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace(array('App_'));
		
		return $moduleLoader;
	}
	protected function _initViewHelpers()
	{
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		$view = $layout->getView();
		$view->doctype('XHTML1_STRICT');
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
	}	
	
	/**
	 * used for handling top-level navigation
	 * @return Zend_Navigation
	 */
	protected function _initNavigation()
	{
  		$this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();		
        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');

		$container = new Zend_Navigation($config);
		
		$view->navigation($container);
		

	}	

}

