<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * SmsLog filter form base class.
 *
 * @package    zapnacrm
 * @subpackage filter
 * @author     Your name here
 */
class BaseSmsLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mobile_number' => new sfWidgetFormFilterInput(),
      'message'       => new sfWidgetFormFilterInput(),
      'sender_name'   => new sfWidgetFormFilterInput(),
      'status'        => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'customer_id'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mobile_number' => new sfValidatorPass(array('required' => false)),
      'message'       => new sfValidatorPass(array('required' => false)),
      'sender_name'   => new sfValidatorPass(array('required' => false)),
      'status'        => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'customer_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sms_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SmsLog';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'mobile_number' => 'Text',
      'message'       => 'Text',
      'sender_name'   => 'Text',
      'status'        => 'Text',
      'created_at'    => 'Boolean',
      'customer_id'   => 'Number',
    );
  }
}
