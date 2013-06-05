<?php

/**
 * userManagement actions.
 *
 * @package    voyage
 * @subpackage userManagement
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userManagementActions extends sfActions
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
  
  public function executeEditProfile(sfWebRequest $request)
  {
      $user = $this->getUser()->getGuardUser();
      $this->form = new CustomRegisterForm($user);
  }
  
  public function executeViewProfile(sfWebRequest $request)
  {
      $id = $request->getParameter('id');
      
      $this->userProfile = sfGuardUserTable::getInstance()->find($id);
      
//      $this->userProfile = sfGuardUserProfileTable::getInstance()->findBy('user_id', $id);
//      $this->objectType = 'userProfile';
//      if (!count($this->userProfile))
//      {
//          $this->userProfile = sfGuardUserTable::getInstance()->find($id);
//          $this->objectType = 'user';
//      }
  }
  
  public function executeSaveUserProfile(sfWebRequest $request)
  {
    $userProfile = $request->getParameter('userData');
    $id = $this->getUser()->getGuardUser()->getid();

    $obj = new sfGuardUser();
    $obj->assignIdentifier($id);
    $obj->setFirstName($userProfile['first_name']);
    $obj->setLastName($userProfile['last_name']);
    $obj->setEmailAddress($userProfile['email_address']);
    $obj->save();

    $objProfile = sfGuardUserProfileTable::getInstance()->findOneBy('user_id', $id, Doctrine_Core::HYDRATE_RECORD);
    if (!$objProfile->count())
    {
        $objProfile = new sfGuardUserProfile();
        $objProfile->setUserId($id);
    }
    if (isset($userProfile['phone']))
    {
      $objProfile->setPhone($userProfile['phone']);
    }
    if (isset($userProfile['birthday']))
    {
      $objProfile->setBirthday($userProfile['birthday']);
    }

    $files = $request->getFiles();
    foreach ($files as $file)
    {
      $filename = 'id_'.sha1($file->getOriginalName());
      $extension = $file->getExtension($file->getOriginalExtension());
      $file->save(sfConfig::get('sf_upload_dir').'/'.$filename.$extension);
      $objProfile->setPhoto($filename.$extension);
    }

    $objProfile->save();
    $this->redirect('/profile/' . $id, 200);
  }
}
