<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerForm
 *
 * @author smocanas
 */
class registerForm extends sfGuardRegisterForm{
    /**
    * @see sfForm
    */
   public function configure()
   {
       $this->widgetSchema['first_name']->setLabel('Nume');
       $this->widgetSchema['last_name']->setLabel('Prenume');
       $this->widgetSchema['email_address']->setLabel('Adresa email');
       $this->widgetSchema['username']->setLabel('Nume utilizator');
       $this->widgetSchema['password']->setLabel('Parola');
       $this->widgetSchema['password_again']->setLabel('Repeta parola');
       
       $this->mergeForm(new sfGuardUserProfileForm());
       //password
   }
}

?>
