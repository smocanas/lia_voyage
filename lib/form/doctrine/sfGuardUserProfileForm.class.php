<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    voyage
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{
  public function configure()
  {
      unset($this['id'], $this['user_id']);
      
      $this->widgetSchema['birthday']=new sfWidgetFormInput(array(), array(
            'class' => 'reg_datepicker'
        ));
      
      $this->widgetSchema['photo'] = new sfWidgetFormInputFile();

      $this->widgetSchema['phone']->setLabel('Telefon');
      $this->widgetSchema['photo']->setLabel('Poza');
      $this->widgetSchema['birthday']->setLabel('Ziua de nastere');
        
      $this->widgetSchema->setNameFormat('userProfile[%s]');
  }
}
