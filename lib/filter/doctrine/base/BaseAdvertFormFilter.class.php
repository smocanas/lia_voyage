<?php

/**
 * Advert filter form base class.
 *
 * @package    voyage
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdvertFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypeAdvert'), 'add_empty' => true)),
      'type_route_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypeRoute'), 'add_empty' => true)),
      'direction_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Direction'), 'add_empty' => true)),
      'start_location'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'end_location'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'middle_location' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'departure_date'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'return_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'time'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'p_number'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'type_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TypeAdvert'), 'column' => 'id')),
      'type_route_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TypeRoute'), 'column' => 'id')),
      'direction_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Direction'), 'column' => 'id')),
      'start_location'  => new sfValidatorPass(array('required' => false)),
      'end_location'    => new sfValidatorPass(array('required' => false)),
      'middle_location' => new sfValidatorPass(array('required' => false)),
      'departure_date'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'return_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'time'            => new sfValidatorPass(array('required' => false)),
      'p_number'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment'         => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('advert_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Advert';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'type_id'         => 'ForeignKey',
      'type_route_id'   => 'ForeignKey',
      'direction_id'    => 'ForeignKey',
      'start_location'  => 'Text',
      'end_location'    => 'Text',
      'middle_location' => 'Text',
      'departure_date'  => 'Date',
      'return_date'     => 'Date',
      'time'            => 'Text',
      'p_number'        => 'Number',
      'comment'         => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'created_by'      => 'ForeignKey',
      'updated_by'      => 'ForeignKey',
    );
  }
}
