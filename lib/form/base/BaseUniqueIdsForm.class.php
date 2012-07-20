<?php

/**
 * UniqueIds form base class.
 *
 * @package    zapnacrm
 * @subpackage form
 * @author     Your name here
 */
class BaseUniqueIdsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'unique_number'        => new sfWidgetFormInput(),
      'created_at'           => new sfWidgetFormInputCheckbox(),
      'assigned_at'          => new sfWidgetFormDateTime(),
      'registration_type_id' => new sfWidgetFormInput(),
      'sim_type_id'          => new sfWidgetFormInput(),
      'status'               => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'UniqueIds', 'column' => 'id', 'required' => false)),
      'unique_number'        => new sfValidatorString(array('max_length' => 50)),
      'created_at'           => new sfValidatorBoolean(),
      'assigned_at'          => new sfValidatorDateTime(),
      'registration_type_id' => new sfValidatorInteger(),
      'sim_type_id'          => new sfValidatorInteger(array('required' => false)),
      'status'               => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('unique_ids[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UniqueIds';
  }


}
