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
      'type_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_route_id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direction_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'start_location'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'end_location'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'middle_location' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'time'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'p_number'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'type_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_route_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'direction_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'start_location'  => new sfValidatorPass(array('required' => false)),
      'end_location'    => new sfValidatorPass(array('required' => false)),
      'middle_location' => new sfValidatorPass(array('required' => false)),
      'time'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'p_number'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment'         => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
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
      'type_id'         => 'Number',
      'type_route_id'   => 'Number',
      'direction_id'    => 'Number',
      'start_location'  => 'Text',
      'end_location'    => 'Text',
      'middle_location' => 'Text',
      'time'            => 'Date',
      'p_number'        => 'Number',
      'comment'         => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
