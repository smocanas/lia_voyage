<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginForm
 *
 * @author Lia
 */
class loginForm extends sfGuardFormSignin {

    /**
     * @see sfForm
     */
    public function configure() {
        $this->widgetSchema['username']->setLabel('User');
        $this->widgetSchema['password']->setLabel('Parola');
        $this->widgetSchema['remember']->setLabel('Memorează');
    }

}

?>
