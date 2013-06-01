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
      'type_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypeAdvert'), 'add_empty' => false)),
      'type_route_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypeRoute'), 'add_empty' => false)),
      'direction_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Direction'), 'add_empty' => false)),
      'start_location'  => new sfWidgetFormInputText(),
      'end_location'    => new sfWidgetFormInputText(),
      'middle_location' => new sfWidgetFormInputText(),
      'departure_date'  => new sfWidgetFormDate(),
      'return_date'     => new sfWidgetFormDate(),
      'time'            => new sfWidgetFormTime(),
      'p_number'        => new sfWidgetFormInputText(),
      'comment'         => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TypeAdvert'))),
      'type_route_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TypeRoute'))),
      'direction_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Direction'))),
      'start_location'  => new sfValidatorString(array('max_length' => 255)),
      'end_location'    => new sfValidatorString(array('max_length' => 255)),
      'middle_location' => new sfValidatorString(array('max_length' => 255)),
      'departure_date'  => new sfValidatorDate(),
      'return_date'     => new sfValidatorDate(),
      'time'            => new sfValidatorTime(),
      'p_number'        => new sfValidatorInteger(),
      'comment'         => new sfValidatorString(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'created_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
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
