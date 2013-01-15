<?php use_helper('I18N') ?>
<?php use_helper('Number') ?>
<div id="sf_admin_container"><h1><?php echo __('Refill Detail') ?></h1>
<?php if ($sf_user->hasFlash('message')): ?>
<div class="save-ok">
  <h2><?php echo __($sf_user->getFlash('message')) ?></h2>
</div>
<?php endif; ?>
</div>
<form id="refillform" name="refillform" method="post" enctype="multipart/form-data" action="refillTransaction">
    <table width="100%" cellspacing="0" cellpadding="2" class="tblAlign">     
       <tr>
           <td style="padding: 11px 0 0 5px;font-weight:bold;" width="100" valign="top">Amount:</td>
           <td class="tdcss">
               <b><?php echo sfConfig::get('app_currency_code');?></b><?php echo number_format($refillamount,2);?>
               <input type="hidden" name="refillamount" value="<?php echo number_format($refillamount,2);?>" />
           </td>           
       </tr>
       <tr>
           <td style="padding: 11px 0 0 5px;font-weight:bold;" width="100" valign="top">VAT</td>
           <td class="tdcss">
               <b><?php echo sfConfig::get('app_currency_code');?></b><?php echo number_format($vat,2)?>
               <input type="hidden" name="vat" value="<?php echo number_format($vat,2);?>" />
           </td>
       </tr>
       <tr>
           <td style="padding: 11px 0 0 5px;font-weight:bold;" width="100" valign="top">Total Amount</td>
           <td class="tdcss">
               <b><?php echo sfConfig::get('app_currency_code');?></b><?php echo number_format($refilltotal,2);?>
               <input type="hidden" name="refilltotal" value="<?php echo number_format($refilltotal,2);?>" />
           </td>
       </tr>
       <tr><td></td><td><div class="nextbtndiv" style="margin-left:4px;">
                    <input type="submit" name="submit" value="Refill" />
                </div></td></tr>
    </table>
</form>
