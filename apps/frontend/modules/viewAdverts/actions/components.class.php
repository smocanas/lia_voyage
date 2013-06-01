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
                 $this->adverts = AdvertTable::getInstance()->createQuery("a")
                         ->select("a.*")
                         ->leftJoin("a.TypeRoute tr ON a.type_route_id=tr.id")
                         ->orderBy('a.id DESC')
                         ->execute();
//                $this->adverts = AdvertTable::getInstance()->findAll();
                
            }
            $this->advertCount = count($this->adverts);
            $this->status = 'success';
            $this->userId = $this->getUser()->getGuardUser()->getId();
        } catch (Exception $e) {
            $this->status = 'error';
            $this->message = $e->getMessage();
        }
    }
}
