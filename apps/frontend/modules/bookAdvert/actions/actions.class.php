<?php

/**
 * bookAdvert actions.
 *
 * @package    voyage
 * @subpackage bookAdvert
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookAdvertActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeBookForm(sfWebRequest $request) {
        $this->message = false;
        $this->id = $request->getParameter('id');
        $this->form = new AcceptedPersonsForm();

        if ($request->isMethod('post')) {
            $params = $request->getPostParameter('accept');
            $params['_csrf_token'] = $this->form->getCsrfToken();
            $user = $this->getUser()->getGuardUser()->getId();
            $this->id = $request->getParameter('id');
            $this->form->bind($params);
            if ($this->form->isValid()) {
                AcceptedPersonsTable::addRequest($params, $this->id, $user);
                
                $this->redirect('viewAdverts/adverts');
            } else {
                $this->message = $this->form->getErrorSchema()->getMessage();
            }
        }
    }

    public function executeAddBook(sfWebRequest $request) {
        try {
            $params = $request->getPostParameter('accept');
            $user = $this->getUser()->getGuardUser()->getId();

            $form = new AcceptedPersonsForm();
            $form->bind($params);
            if ($form->isValid()) {
                
            } else {
                throw new Exception($form->getErrorSchema()->getMessage());
            }
        } catch (Exception $e) {
            $this->type = 'error';
            $this->message = $e->getMessage();
        }
    }
    
    /**
     * 
     * @param sfWebRequest $request
     */
    public function executeShowBook(sfWebRequest $request)
    {
        $id = $request->getParameter('id');
        $user = $this->getUser()->getGuardUser()->getId();
        
        $this->bookedAdvert = AcceptedPersonsTable::getUserBook($id, $user);
        
    }
    
    /**
     * 
     * @param sfWebRequest $request
     */
    public function executeDeleteBook(sfWebRequest $request)
    {
        $id = $request->getParameter('id');
        $user = $this->getUser()->getGuardUser()->getId();
        
        AcceptedPersonsTable::deleteBook($id, $user);
        
        $this->redirect('viewAdverts/adverts');
    }
}
