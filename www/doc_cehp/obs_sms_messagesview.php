<?php
namespace PHPMaker2020\cehp;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$obs_sms_messages_view = new obs_sms_messages_view();

// Run the page
$obs_sms_messages_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_sms_messages_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$obs_sms_messages_view->isExport()) { ?>
<script>
var fobs_sms_messagesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fobs_sms_messagesview = currentForm = new ew.Form("fobs_sms_messagesview", "view");
	loadjs.done("fobs_sms_messagesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$obs_sms_messages_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $obs_sms_messages_view->ExportOptions->render("body") ?>
<?php $obs_sms_messages_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $obs_sms_messages_view->showPageHeader(); ?>
<?php
$obs_sms_messages_view->showMessage();
?>
<form name="fobs_sms_messagesview" id="fobs_sms_messagesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_sms_messages">
<input type="hidden" name="modal" value="<?php echo (int)$obs_sms_messages_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($obs_sms_messages_view->message_id->Visible) { // message_id ?>
	<tr id="r_message_id">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_message_id"><?php echo $obs_sms_messages_view->message_id->caption() ?></span></td>
		<td data-name="message_id" <?php echo $obs_sms_messages_view->message_id->cellAttributes() ?>>
<span id="el_obs_sms_messages_message_id">
<span<?php echo $obs_sms_messages_view->message_id->viewAttributes() ?>><?php echo $obs_sms_messages_view->message_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_sms_messages_view->SMSDateTime->Visible) { // SMSDateTime ?>
	<tr id="r_SMSDateTime">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_SMSDateTime"><?php echo $obs_sms_messages_view->SMSDateTime->caption() ?></span></td>
		<td data-name="SMSDateTime" <?php echo $obs_sms_messages_view->SMSDateTime->cellAttributes() ?>>
<span id="el_obs_sms_messages_SMSDateTime">
<span<?php echo $obs_sms_messages_view->SMSDateTime->viewAttributes() ?>><?php echo $obs_sms_messages_view->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_sms_messages_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_MobileNumber"><?php echo $obs_sms_messages_view->MobileNumber->caption() ?></span></td>
		<td data-name="MobileNumber" <?php echo $obs_sms_messages_view->MobileNumber->cellAttributes() ?>>
<span id="el_obs_sms_messages_MobileNumber">
<span<?php echo $obs_sms_messages_view->MobileNumber->viewAttributes() ?>><?php echo $obs_sms_messages_view->MobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_sms_messages_view->SystemDateTime->Visible) { // SystemDateTime ?>
	<tr id="r_SystemDateTime">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_SystemDateTime"><?php echo $obs_sms_messages_view->SystemDateTime->caption() ?></span></td>
		<td data-name="SystemDateTime" <?php echo $obs_sms_messages_view->SystemDateTime->cellAttributes() ?>>
<span id="el_obs_sms_messages_SystemDateTime">
<span<?php echo $obs_sms_messages_view->SystemDateTime->viewAttributes() ?>><?php echo $obs_sms_messages_view->SystemDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_sms_messages_view->rainfall->Visible) { // rainfall ?>
	<tr id="r_rainfall">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_rainfall"><?php echo $obs_sms_messages_view->rainfall->caption() ?></span></td>
		<td data-name="rainfall" <?php echo $obs_sms_messages_view->rainfall->cellAttributes() ?>>
<span id="el_obs_sms_messages_rainfall">
<span<?php echo $obs_sms_messages_view->rainfall->viewAttributes() ?>><?php echo $obs_sms_messages_view->rainfall->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_sms_messages_view->stationid->Visible) { // stationid ?>
	<tr id="r_stationid">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_stationid"><?php echo $obs_sms_messages_view->stationid->caption() ?></span></td>
		<td data-name="stationid" <?php echo $obs_sms_messages_view->stationid->cellAttributes() ?>>
<span id="el_obs_sms_messages_stationid">
<span<?php echo $obs_sms_messages_view->stationid->viewAttributes() ?>><?php echo $obs_sms_messages_view->stationid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_sms_messages_view->SubDivisionId->Visible) { // SubDivisionId ?>
	<tr id="r_SubDivisionId">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_SubDivisionId"><?php echo $obs_sms_messages_view->SubDivisionId->caption() ?></span></td>
		<td data-name="SubDivisionId" <?php echo $obs_sms_messages_view->SubDivisionId->cellAttributes() ?>>
<span id="el_obs_sms_messages_SubDivisionId">
<span<?php echo $obs_sms_messages_view->SubDivisionId->viewAttributes() ?>><?php echo $obs_sms_messages_view->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_sms_messages_view->SMSText->Visible) { // SMSText ?>
	<tr id="r_SMSText">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_SMSText"><?php echo $obs_sms_messages_view->SMSText->caption() ?></span></td>
		<td data-name="SMSText" <?php echo $obs_sms_messages_view->SMSText->cellAttributes() ?>>
<span id="el_obs_sms_messages_SMSText">
<span<?php echo $obs_sms_messages_view->SMSText->viewAttributes() ?>><?php echo $obs_sms_messages_view->SMSText->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_sms_messages_view->sms_statusid->Visible) { // sms_statusid ?>
	<tr id="r_sms_statusid">
		<td class="<?php echo $obs_sms_messages_view->TableLeftColumnClass ?>"><span id="elh_obs_sms_messages_sms_statusid"><?php echo $obs_sms_messages_view->sms_statusid->caption() ?></span></td>
		<td data-name="sms_statusid" <?php echo $obs_sms_messages_view->sms_statusid->cellAttributes() ?>>
<span id="el_obs_sms_messages_sms_statusid">
<span<?php echo $obs_sms_messages_view->sms_statusid->viewAttributes() ?>><?php echo $obs_sms_messages_view->sms_statusid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$obs_sms_messages_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$obs_sms_messages_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$obs_sms_messages_view->terminate();
?>