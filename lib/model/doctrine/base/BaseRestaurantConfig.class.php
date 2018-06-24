<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RestaurantConfig', 'doctrine');

/**
 * BaseRestaurantConfig
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $restaurant_id
 * @property string $keyname
 * @property integer $section
 * @property string $datatype
 * @property string $label
 * @property string $value
 * @property Restaurant $Restaurant
 * 
 * @method integer          getRestaurantId()  Returns the current record's "restaurant_id" value
 * @method string           getKeyname()       Returns the current record's "keyname" value
 * @method integer          getSection()       Returns the current record's "section" value
 * @method string           getDatatype()      Returns the current record's "datatype" value
 * @method string           getLabel()         Returns the current record's "label" value
 * @method string           getValue()         Returns the current record's "value" value
 * @method Restaurant       getRestaurant()    Returns the current record's "Restaurant" value
 * @method RestaurantConfig setRestaurantId()  Sets the current record's "restaurant_id" value
 * @method RestaurantConfig setKeyname()       Sets the current record's "keyname" value
 * @method RestaurantConfig setSection()       Sets the current record's "section" value
 * @method RestaurantConfig setDatatype()      Sets the current record's "datatype" value
 * @method RestaurantConfig setLabel()         Sets the current record's "label" value
 * @method RestaurantConfig setValue()         Sets the current record's "value" value
 * @method RestaurantConfig setRestaurant()    Sets the current record's "Restaurant" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRestaurantConfig extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('restaurant_config');
        $this->hasColumn('restaurant_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('keyname', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 32,
             ));
        $this->hasColumn('section', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'default' => 1,
             'length' => 2,
             ));
        $this->hasColumn('datatype', 'string', 32, array(
             'type' => 'string',
             'default' => 'string',
             'length' => 32,
             ));
        $this->hasColumn('label', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('value', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Restaurant', array(
             'local' => 'restaurant_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}