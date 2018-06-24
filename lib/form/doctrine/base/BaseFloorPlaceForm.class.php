<?php

/**
 * FloorPlace form base class.
 * sfDoctrineFormGenerator 
 * @method FloorPlace getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseFloorPlaceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'            => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'restaurant_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Restaurant'), 'add_empty' => false)),
      
        
        
       
            
            
              'floor_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Floor'), 'add_empty' => false)),
      
        
        
       
            
            
              'width'         => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'height'        => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'posx'          => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'posy'          => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'number'        => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'min_persons'   => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'max_persons'   => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'restaurant_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Restaurant'))),
                  
              'floor_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Floor'))),
                  
              'width'         => new sfValidatorInteger(),
                  
              'height'        => new sfValidatorInteger(),
                  
              'posx'          => new sfValidatorInteger(),
                  
              'posy'          => new sfValidatorInteger(),
                  
              'number'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'min_persons'   => new sfValidatorInteger(array('required' => false)),
                  
              'max_persons'   => new sfValidatorInteger(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('floor_place[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
  }

  public function getModelName()
  {
    return 'FloorPlace';
  }
    public function updateObject($values = null)
    {
        $object = parent::updateObject($values);
                return $object;
    }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
    foreach($this->embeddedTextBlocks as $block_name){
        $TextBlock = Q::c('TextBlock', 'b')
            ->where('b.special_mark = ?', $block_name)
            ->fetchOne();
        if($TextBlock){
            $this->setDefault($block_name, $TextBlock->text);
        }
    }    
      }
  

  protected function doSave($con = null)
  {
    parent::doSave($con);
    
    foreach($this->embeddedTextBlocks as $block_name){
        $TextBlock = Q::c('TextBlock', 'b')
            ->where('b.special_mark = ?', $block_name)
            ->fetchOne();
        if($TextBlock){
            $TextBlock->text = $this->values[$block_name];
            $TextBlock->save();
        }
    }
  }



}
