<?php

/**
 * Advert form base class.
 *
 * @method Advert getObject() Returns the current form's model object
 *
 * @package    voyage
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdvertForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'type_id'         => new sfWidgetFormInputText(),
      'type_route_id'   => new sfWidgetFormInputText(),
      'direction_id'    => new sfWidgetFormInputText(),
      'start_location'  => new sfWidgetFormInputText(),
      'end_location'    => new sfWidgetFormInputText(),
      'middle_location' => new sfWidgetFormInputText(),
      'time'            => new sfWidgetFormDateTime(),
      'p_number'        => new sfWidgetFormInputText(),
      'comment'         => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type_id'         => new sfValidatorInteger(),
      'type_route_id'   => new sfValidatorInteger(),
      'direction_id'    => new sfValidatorInteger(),
      'start_location'  => new sfValidatorString(array('max_length' => 255)),
      'end_location'    => new sfValidatorString(array('max_length' => 255)),
      'middle_location' => new sfValidatorString(array('max_length' => 255)),
      'time'            => new sfValidatorDateTime(),
      'p_number'        => new sfValidatorInteger(),
      'comment'         => new sfValidatorString(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('advert[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Advert';
  }

}
