<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Direction', 'doctrine');

/**
 * BaseDirection
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $DirectionRecord
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method string              getName()            Returns the current record's "name" value
 * @method Doctrine_Collection getDirectionRecord() Returns the current record's "DirectionRecord" collection
 * @method Direction           setId()              Sets the current record's "id" value
 * @method Direction           setName()            Sets the current record's "name" value
 * @method Direction           setDirectionRecord() Sets the current record's "DirectionRecord" collection
 * 
 * @package    voyage
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDirection extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('direction');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Advert as DirectionRecord', array(
             'local' => 'id',
             'foreign' => 'direction_id'));
    }
}