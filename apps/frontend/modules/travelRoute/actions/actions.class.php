<?php

/**
 * travelRoute actions.
 *
 * @package    voyage
 * @subpackage travelRoute
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class travelRouteActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeAddAdvert(sfWebRequest $request) {
        $this->routesOptions = TypeRouteTable::getInstance()->findAll();
        $this->directions    = DirectionTable::getInstance()->findAll();
    }

    public function executeAddPasager(sfWebRequest $request) {
        $this->routesOptions = TypeRouteTable::getInstance()->findAll();
        $this->directions    = DirectionTable::getInstance()->findAll();
    }

    public function executeAddAdvertQuery(sfWebRequest $request) {
        $advert = $request->getPostParameter('advert');

        AdvertTable::addAdvert($advert);

        $this->forward('viewAdverts', 'adverts');
    }
    
    public function executeAddAdvertPasagerQuery(sfWebRequest $request)
    {
        $advert = $request->getPostParameter('advert');

        AdvertTable::addAdvert($advert, 2);

        $this->forward('viewAdverts', 'adverts');
    }

}
