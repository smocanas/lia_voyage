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
        $this->advert = false;
    }

    public function executeAddPasager(sfWebRequest $request) {
        $this->routesOptions = TypeRouteTable::getInstance()->findAll();
        $this->directions    = DirectionTable::getInstance()->findAll();
    }

    public function executeAddAdvertQuery(sfWebRequest $request) {
        $user = $this->getUser()->getGuardUser()->getId();
        $advert = $request->getPostParameter('advert');
        $advert['user_id'] = $user;
        AdvertTable::addAdvert($advert);

        $this->redirect('viewAdverts/adverts');
    }
    
    public function executeAddAdvertPasagerQuery(sfWebRequest $request)
    {
        $user = $this->getUser()->getGuardUser()->getId();
        $advert = $request->getPostParameter('advert');

        AdvertTable::addAdvert($advert, 2);
        $advert['user_id'] = $user;
        $this->forward('viewAdverts', 'adverts');
    }
    
    
    public function executeRemoveAdvert(sfWebRequest $request)
    {
        $pathInfo = $request->getPathInfoArray();
        $redirectPath = $pathInfo['HTTP_REFERER'];
        $id = $request->getParameter('id');
        $user = $this->getUser()->getGuardUser()->getId();
        AdvertTable::removeAdvert($id, $user);
        
        $this->redirect($redirectPath);
        return sfView::NONE;
    }
    
    public function executeEditAdvert(sfWebRequest $request)
    {
        $this->routesOptions = TypeRouteTable::getInstance()->findAll();
        $this->directions    = DirectionTable::getInstance()->findAll();
        $id = $request->getParameter('id');
        
        $this->advert = AdvertTable::getInstance()->find($id);
        
        $this->setTemplate('addAdvert', 'travelRoute');
    }
}
