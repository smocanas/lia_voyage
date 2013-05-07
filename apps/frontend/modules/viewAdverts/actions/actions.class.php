<?php

/**
 * viewAdverts actions.
 *
 * @package    voyage
 * @subpackage viewAdverts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class viewAdvertsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeAdverts(sfWebRequest $request)
  {
      try
      {
          $this->adverts = AdvertTable::getInstance()->findAll();
          $this->advertCount = count($this->adverts);
          $this->status = 'success';
      }
      catch (Exception $e)
      {
          $this->status = 'error';
          $this->message = $e->getMessage();
      }
    
  }
}
