<?php

/**
 * BaseDirection
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $direction
 * 
 * @method integer             getId()        Returns the current record's "id" value
 * @method string              getName()      Returns the current record's "name" value
 * @method Doctrine_Collection getDirection() Returns the current record's "direction" collection
 * @method Direction           setId()        Sets the current record's "id" value
 * @method Direction           setName()      Sets the current record's "name" value
 * @method Direction           setDirection() Sets the current record's "direction" collection
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
        $this->hasColumn('id', 'integer', 11, array(
             'type' => 'integer',
             'unique' => true,
             'autoincrement' => true,
             'primary' => true,
             'length' => 11,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'unique' => false,
             'autoincrement' => false,
             'primary' => false,
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Advert as direction', array(
             'local' => 'direction_id',
             'foreign' => 'id'));
    }
}