<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomRegisterForm
 *
 * @author smocanas
 */
class CustomRegisterForm extends sfGuardRegisterForm {
    public function __construct($object = null, $options = array(), $CSRFSecret = null) {
        parent::__construct($object, $options, $CSRFSecret);
    }
    /**
     * @see sfForm
     */
    public function configure() {
        unset($this['username'], $this['password'], $this['password_again']);
        $this->mergeForm(new sfGuardUserProfileForm());
        $this->widgetSchema->setNameFormat('userData[%s]');
    }

}

?>
