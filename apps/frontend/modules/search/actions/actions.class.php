<?php

/**
 * search actions.
 *
 * @package    voyage
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        try {
            $this->search = $request->getPostParameter('s2');
            $this->adverts = AdvertTable::search($this->search);
            $this->advertCount = count($this->adverts);
            $this->status = 'success';
        } catch (Exception $e) {
            $m = $e;
        }
    }
    
    /**
     * 
     * @param sfWebRequest $request
     */
    public function executeAdvancedSearch(sfWebRequest $request)
    {
        $this->routesOptions = TypeRouteTable::getInstance()->findAll();
        $this->directions    = DirectionTable::getInstance()->findAll();
    }
    
    /**
     * 
     * @param sfWebRequest $request
     */
    public function executeAdvancedSearchQuery(sfWebRequest $request)
    {
        $searchParams = $request->getPostParameter('advert');
        
        $this->adverts = AdvertTable::advancedSearch($searchParams);
    }

}
