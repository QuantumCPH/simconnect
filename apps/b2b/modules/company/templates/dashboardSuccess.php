<div id="sf_admin_container" style="clear: both;">
    <table>
	<tr id="slogan">
            <td><h2>Available Balance:</h2><small>(excluding vat)</small></td>
            <td  align="right" valign="top"> <h2><?php echo sfConfig::get('app_currency_code');?><?php echo number_format($balance,2); ?></h2></td>
	</tr>
	<tr><td colspan="2"></td></tr>
	<tr id="slogan">
            <td><h2>Credit Limit:</h2><small>(excluding vat)</small></td>
            <td align="right" valign="top"><h2><?php echo sfConfig::get('app_currency_code');?><?php echo  number_format($company->getCreditLimit(),2);  ?></h2></td>
	</tr> 
	<tr><td colspan="2"></td></tr>
    </table>
    <h1><?php echo __('Employees') ?></h1>
</div>
<table class="tblAlign" width="100%" cellspacing="0" cellpadding="3">
    <thead>
        <tr class="headings">
            <th align="left"  id="sf_admin_list_th_name"><?php echo __('Name') ?></th>
            <th align="left"  id="sf_admin_list_th_name"><?php echo __('Consumed Balance') ?></th>
            <th align="left"  id="sf_admin_list_th_name"><?php echo __('Created at') ?></th>
        </tr>
    </thead>
    <?php
        $incrment = 1;
        $ComtelintaObj = new CompanyEmployeActivation();
        foreach ($employees as $employee) {
             if($incrment%2==0){
                $class= 'class="even"';
             }else{
                $class= 'class="odd"';
             }
            $incrment++;
   ?>
   <tr <?php echo $class ?>>
        <td><?php echo $employee->getFirstName(); ?></td>
        <td><?php
            $ct = new Criteria();
           // $ct->add(TelintaAccountsPeer::ACCOUNT_TITLE, sfConfig::get("app_telinta_emp") . $company->getId() . $employee->getId());
            $ct->add(TelintaAccountsPeer::ACCOUNT_TITLE, "a".$employee->getCountryMobileNumber());
            $ct->addAnd(TelintaAccountsPeer::STATUS, 3);
            $telintaAccount = TelintaAccountsPeer::doSelectOne($ct);
            $accountInfo = $ComtelintaObj->getAccountInfo($telintaAccount->getIAccount());
            echo "<b>Call Through:</b> ";echo sfConfig::get('app_currency_code');echo number_format($accountInfo->account_info->balance,2);
            
            ?>
            <br />
            <?php
            $ct = new Criteria();
           // $ct->add(TelintaAccountsPeer::ACCOUNT_TITLE, sfConfig::get("app_telinta_emp") . $company->getId() . $employee->getId());
            $ct->add(TelintaAccountsPeer::ACCOUNT_TITLE, "cb".$employee->getCountryMobileNumber());
            $ct->addAnd(TelintaAccountsPeer::STATUS, 3);
            $cbAcc = TelintaAccountsPeer::doCount($ct);
            if($cbAcc>0){
                $telintaAccount = TelintaAccountsPeer::doSelectOne($ct);
                $accountInfo = $ComtelintaObj->getAccountInfo($telintaAccount->getIAccount());
                echo "<b>Call Back:</b> ";echo sfConfig::get('app_currency_code');echo number_format($accountInfo->account_info->balance,2);
            }
            ?>
        </td>
        <td><?php echo  date("d-m-Y H:i:s",strtotime($employee->getCreatedAt())); ?></td>
   </tr>
        <?php } ?>
</table>
<!--<div id="sf_admin_container"><h1><?php echo __('News Box') ?></h1></div>
    <div class="borderDiv">
        <br/>
        <p>
        <?php
            $currentDate = date('Y-m-d');
            foreach ($updateNews as $updateNew) {
                $sDate = $updateNew->getStartingDate();
                $eDate = $updateNew->getExpireDate();
                if ($currentDate >= $sDate) {
        ?>
                   <b><?php echo $sDate ?></b><br/>
                   <?php echo $updateNew->getHeading(); ?> :
                   <?php
                        if (strlen($updateNew->getMessage()) > 100) {
                            echo substr($updateNew->getMessage(), 0, 100);
                            echo link_to('....read more', sfConfig::get('app_b2b_url') . 'company/newsListing');
                        } else {
                            echo $updateNew->getMessage();
                        }
                    ?>
                   <br/><br/>
            <?php } } ?>
            <b><?php echo link_to(__('View All News & Updates'), sfConfig::get('app_b2b_url') . 'company/newsListing'); ?> </b>
    </p>
</div>
<div id="sf_admin_container"><h1><?php echo __('Promotion Rates') ?></h1></div>
<table width="100%" class="tblAlign" cellpadding='3' cellspacing="0">
    <tr class="headings">
        <td><b>Destination Name</b></td>
        <td><b>Destination Rate</b></td>
    </tr>
<?php
$rt = new Criteria();
$rt->add(PromotionRatesPeer::AGENT_ID , $company->getId());
$promotionRates = PromotionRatesPeer::doSelect($rt);
foreach ($promotionRates as $promotionRate){ 
?>
   <tr>
        <td><?php echo $promotionRate->getNetworkName();?></td>
        <td><?php echo $promotionRate->getNetworkRate();?></td>
   </tr>
<?php } ?>
</table>-->
<br />
