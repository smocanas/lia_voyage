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
        $advertObj = AdvertTable::addAdvert($advert);
        
        $FB_APP_ID = '151347955048454';
        $FB_APP_SECRET = '55073ccab4144d53a562ff4690342a86';
        
        $token = FacebookPost::get_app_token($FB_APP_ID, $FB_APP_SECRET);
        
        $facebook = new Facebook(array(
            'appId'  => $FB_APP_ID,
            'secret' => $FB_APP_SECRET,
            'cookie' => false,
        ));
        //facebook post
        $postName = $advertObj->getStartLocation() . ' - ' . $advertObj->getEndLocation();
        $postMessage = "
            Tip ruta : " . $advertObj->getTypeRoute()->getName() . "\n
            Directia : " . $advertObj->getDirection()->getName() . "\n
            Numarul de locuri: " . $advertObj->getPNumber() . "\n
            Data de plecare: " . $advertObj->getDepartureDate() . "\n
        ";
        if ($advertObj->getReturnDate())
        {
            $postMessage .= "
                Data de intoarcere : " . $advertObj->getReturnDate() . "\n
                Comentariu : " . $advertObj->getComment() . "
            ";
        }

        $postLink = 'http://www.adventure.fun.gg/showAdvert/' . $advertObj->getId();
        $param1=explode("&",$token);
        $param2=explode("=",$param1[0]);
        $token=$param2[1];
        $attachment = array('message' => $postMessage,
                    'access_token' => $token,
                    'name' => $postName,
                    'caption' => 'Attachment Caption',
                    'link' => $postLink,
                    'description' => 'Description .....',
                    'actions' => array(array('name' => $postName, 
                                      'link' => $postLink))
                    );

//        $result = $facebook->api('/'.$FB_APP_ID.'/feed/', 'post', $attachment);

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
