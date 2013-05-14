<?php

/**
 * viewAdverts actions.
 *
 * @package    voyage
 * @subpackage viewAdverts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class viewAdvertsComponents extends sfComponents {

    /**
     * 
     * @param sfWebRequest $request
     */
    public function executeAdvertsList(sfWebRequest $request) {
        try {

            if (!$this->adverts)
            {
                 $this->adverts = AdvertTable::getInstance()->findAll();
            }
            $this->advertCount = count($this->adverts);
            $this->status = 'success';
        } catch (Exception $e) {
            $this->status = 'error';
            $this->message = $e->getMessage();
        }
    }
}
