<?php

/**
 * CallRateTableLandcall form base class.
 *
 * @package    zapnacrm
 * @subpackage form
 * @author     Your name here
 */
class BaseCallRateTableLandcallForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'call_rate_table_id'  => new sfWidgetFormInputHidden(),
      'destination_name'    => new sfWidgetFormInput(),
      'destination_no_from' => new sfWidgetFormInput(),
      'connect_charge'      => new sfWidgetFormInput(),
      'rate'                => new sfWidgetFormInput(),
      'rate_status'         => new sfWidgetFormInput(),
      'ratecreated'         => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'call_rate_table_id'  => new sfValidatorPropelChoice(array('model' => 'CallRateTableLandcall', 'column' => 'call_rate_table_id', 'required' => false)),
      'destination_name'    => new sfValidatorString(array('max_length' => 255)),
      'destination_no_from' => new sfValidatorString(array('max_length' => 255)),
      'connect_charge'      => new sfValidatorString(array('max_length' => 255)),
      'rate'                => new sfValidatorString(array('max_length' => 255)),
      'rate_status'         => new sfValidatorInteger(),
      'ratecreated'         => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('call_rate_table_landcall[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CallRateTableLandcall';
  }


}
