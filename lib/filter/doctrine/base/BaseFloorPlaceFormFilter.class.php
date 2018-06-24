<?php

/**
 * FloorPlace filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFloorPlaceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'restaurant_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Restaurant'), 'add_empty' => true)),
      'floor_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Floor'), 'add_empty' => true)),
      'width'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'height'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'posx'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'posy'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'number'        => new sfWidgetFormFilterInput(),
      'min_persons'   => new sfWidgetFormFilterInput(),
      'max_persons'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'restaurant_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Restaurant'), 'column' => 'id')),
      'floor_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Floor'), 'column' => 'id')),
      'width'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'height'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'posx'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'posy'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'number'        => new sfValidatorPass(array('required' => false)),
      'min_persons'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_persons'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('floor_place_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'FloorPlace';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'restaurant_id' => 'ForeignKey',
      'floor_id'      => 'ForeignKey',
      'width'         => 'Number',
      'height'        => 'Number',
      'posx'          => 'Number',
      'posy'          => 'Number',
      'number'        => 'Text',
      'min_persons'   => 'Number',
      'max_persons'   => 'Number',
    );
  }
}
