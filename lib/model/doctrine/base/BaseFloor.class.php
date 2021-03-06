<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Floor', 'doctrine');

/**
 * BaseFloor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $restaurant_id
 * @property string $name
 * @property integer $width
 * @property integer $height
 * @property Restaurant $Restaurant
 * @property Doctrine_Collection $Spacers
 * @property Doctrine_Collection $Places
 * 
 * @method integer             getRestaurantId()  Returns the current record's "restaurant_id" value
 * @method string              getName()          Returns the current record's "name" value
 * @method integer             getWidth()         Returns the current record's "width" value
 * @method integer             getHeight()        Returns the current record's "height" value
 * @method Restaurant          getRestaurant()    Returns the current record's "Restaurant" value
 * @method Doctrine_Collection getSpacers()       Returns the current record's "Spacers" collection
 * @method Doctrine_Collection getPlaces()        Returns the current record's "Places" collection
 * @method Floor               setRestaurantId()  Sets the current record's "restaurant_id" value
 * @method Floor               setName()          Sets the current record's "name" value
 * @method Floor               setWidth()         Sets the current record's "width" value
 * @method Floor               setHeight()        Sets the current record's "height" value
 * @method Floor               setRestaurant()    Sets the current record's "Restaurant" value
 * @method Floor               setSpacers()       Sets the current record's "Spacers" collection
 * @method Floor               setPlaces()        Sets the current record's "Places" collection
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFloor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('floor');
        $this->hasColumn('restaurant_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('width', 'integer', 2, array(
             'type' => 'integer',
             'notnull' => true,
             'unsigned' => true,
             'length' => 2,
             ));
        $this->hasColumn('height', 'integer', 2, array(
             'type' => 'integer',
             'notnull' => true,
             'unsigned' => true,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Restaurant', array(
             'local' => 'restaurant_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('FloorSpacer as Spacers', array(
             'local' => 'id',
             'foreign' => 'floor_id'));

        $this->hasMany('FloorPlace as Places', array(
             'local' => 'id',
             'foreign' => 'floor_id'));
    }
}