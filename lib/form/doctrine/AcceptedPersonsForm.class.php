<?php

/**
 * AcceptedPersons form.
 *
 * @package    voyage
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AcceptedPersonsForm extends BaseAcceptedPersonsForm
{
  public function configure()
  {
      $this->useFields(array('p_number', 'comment'));
      
      $this->widgetSchema->setLabels(array(
        'p_number'    => 'Numarul de persoane',
        'comment'   => 'Comentariu',
      ));
      
      $this->setValidators(array(
        'p_number'    => new sfValidatorInteger(
            array('required' => true, 'min' => 1, 'max' => 50),
            array('required' => 'Numarul de persoane este obligator', 'min' => 'Introduceti minim o pesoana', 'max' => 'Numarul maxim de persoane este 50', 'invalid' => 'Valoarea introdusa nu este un numar intreg')
        ),
        'comment' => new sfValidatorString(array('required' => false))
      ));
      
      $this->widgetSchema->setNameFormat('accept[%s]');
  }
}
