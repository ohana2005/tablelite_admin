<?php

/**
 * Floor filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFloorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'restaurant_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Restaurant'), 'add_empty' => true)),
      'name'          => new sfWidgetFormFilterInput(),
      'width'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'height'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'restaurant_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Restaurant'), 'column' => 'id')),
      'name'          => new sfValidatorPass(array('required' => false)),
      'width'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'height'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('floor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'Floor';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'restaurant_id' => 'ForeignKey',
      'name'          => 'Text',
      'width'         => 'Number',
      'height'        => 'Number',
    );
  }
}
