<?php
// auto-generated by sfViewConfigHandler
// date: 2013/05/17 17:01:58
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('pepper-grinder/jquery-ui-1.10.2.custom.min.css', '', array ());
  $response->addStylesheet('jquery.ui.timepicker.css', '', array ());
  $response->addStylesheet('search.css', '', array ());
  $response->addJavascript('jquery-1.9.1.js', '', array ());
  $response->addJavascript('jquery-ui-1.10.2.custom.min.js', '', array ());
  $response->addJavascript('jquery.ui.timepicker.js', '', array ());
  $response->addJavascript('search_jsinput.js', '', array ());
  $response->addJavascript('jquery.easing.min.js', '', array ());
  $response->addJavascript('bjqs-1.3.min.js', '', array ());
  $response->addJavascript('bjqs-1.3.js', '', array ());
  $response->addJavascript('jquery.secret-source.min.js', '', array ());


