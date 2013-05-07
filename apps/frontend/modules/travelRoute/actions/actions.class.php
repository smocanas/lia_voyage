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
        //pe viitor datele formularului pentru update
    }

    public function addAdvertQuery(sfWebRequest $request) {
        try {
            $advert = $request->getParameter('advert');

            AdvertTable::addAdvert($advert);
            
            return sfView::NONE;
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    }

}
