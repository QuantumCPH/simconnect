<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CallbackLog filter form base class.
 *
 * @package    zapnacrm
 * @subpackage filter
 * @author     Your name here
 */
class BaseCallbackLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mobile_number' => new sfWidgetFormFilterInput(),
      'callingcode'   => new sfWidgetFormFilterInput(),
      'uniqueid'      => new sfWidgetFormFilterInput(),
      'imsi'          => new sfWidgetFormFilterInput(),
      'created'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'check_status'  => new sfWidgetFormFilterInput(),
      'imei'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mobile_number' => new sfValidatorPass(array('required' => false)),
      'callingcode'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'uniqueid'      => new sfValidatorPass(array('required' => false)),
      'imsi'          => new sfValidatorPass(array('required' => false)),
      'created'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'check_status'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'imei'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('callback_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CallbackLog';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'mobile_number' => 'Text',
      'callingcode'   => 'Number',
      'uniqueid'      => 'Text',
      'imsi'          => 'Text',
      'created'       => 'Boolean',
      'check_status'  => 'Number',
      'imei'          => 'Text',
    );
  }
}
