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
$obs_sms_messages_delete = new obs_sms_messages_delete();

// Run the page
$obs_sms_messages_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_sms_messages_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fobs_sms_messagesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fobs_sms_messagesdelete = currentForm = new ew.Form("fobs_sms_messagesdelete", "delete");
	loadjs.done("fobs_sms_messagesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $obs_sms_messages_delete->showPageHeader(); ?>
<?php
$obs_sms_messages_delete->showMessage();
?>
<form name="fobs_sms_messagesdelete" id="fobs_sms_messagesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_sms_messages">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($obs_sms_messages_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($obs_sms_messages_delete->message_id->Visible) { // message_id ?>
		<th class="<?php echo $obs_sms_messages_delete->message_id->headerCellClass() ?>"><span id="elh_obs_sms_messages_message_id" class="obs_sms_messages_message_id"><?php echo $obs_sms_messages_delete->message_id->caption() ?></span></th>
<?php } ?>
<?php if ($obs_sms_messages_delete->SMSDateTime->Visible) { // SMSDateTime ?>
		<th class="<?php echo $obs_sms_messages_delete->SMSDateTime->headerCellClass() ?>"><span id="elh_obs_sms_messages_SMSDateTime" class="obs_sms_messages_SMSDateTime"><?php echo $obs_sms_messages_delete->SMSDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($obs_sms_messages_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $obs_sms_messages_delete->MobileNumber->headerCellClass() ?>"><span id="elh_obs_sms_messages_MobileNumber" class="obs_sms_messages_MobileNumber"><?php echo $obs_sms_messages_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($obs_sms_messages_delete->SystemDateTime->Visible) { // SystemDateTime ?>
		<th class="<?php echo $obs_sms_messages_delete->SystemDateTime->headerCellClass() ?>"><span id="elh_obs_sms_messages_SystemDateTime" class="obs_sms_messages_SystemDateTime"><?php echo $obs_sms_messages_delete->SystemDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($obs_sms_messages_delete->rainfall->Visible) { // rainfall ?>
		<th class="<?php echo $obs_sms_messages_delete->rainfall->headerCellClass() ?>"><span id="elh_obs_sms_messages_rainfall" class="obs_sms_messages_rainfall"><?php echo $obs_sms_messages_delete->rainfall->caption() ?></span></th>
<?php } ?>
<?php if ($obs_sms_messages_delete->stationid->Visible) { // stationid ?>
		<th class="<?php echo $obs_sms_messages_delete->stationid->headerCellClass() ?>"><span id="elh_obs_sms_messages_stationid" class="obs_sms_messages_stationid"><?php echo $obs_sms_messages_delete->stationid->caption() ?></span></th>
<?php } ?>
<?php if ($obs_sms_messages_delete->SubDivisionId->Visible) { // SubDivisionId ?>
		<th class="<?php echo $obs_sms_messages_delete->SubDivisionId->headerCellClass() ?>"><span id="elh_obs_sms_messages_SubDivisionId" class="obs_sms_messages_SubDivisionId"><?php echo $obs_sms_messages_delete->SubDivisionId->caption() ?></span></th>
<?php } ?>
<?php if ($obs_sms_messages_delete->SMSText->Visible) { // SMSText ?>
		<th class="<?php echo $obs_sms_messages_delete->SMSText->headerCellClass() ?>"><span id="elh_obs_sms_messages_SMSText" class="obs_sms_messages_SMSText"><?php echo $obs_sms_messages_delete->SMSText->caption() ?></span></th>
<?php } ?>
<?php if ($obs_sms_messages_delete->sms_statusid->Visible) { // sms_statusid ?>
		<th class="<?php echo $obs_sms_messages_delete->sms_statusid->headerCellClass() ?>"><span id="elh_obs_sms_messages_sms_statusid" class="obs_sms_messages_sms_statusid"><?php echo $obs_sms_messages_delete->sms_statusid->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$obs_sms_messages_delete->RecordCount = 0;
$i = 0;
while (!$obs_sms_messages_delete->Recordset->EOF) {
	$obs_sms_messages_delete->RecordCount++;
	$obs_sms_messages_delete->RowCount++;

	// Set row properties
	$obs_sms_messages->resetAttributes();
	$obs_sms_messages->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$obs_sms_messages_delete->loadRowValues($obs_sms_messages_delete->Recordset);

	// Render row
	$obs_sms_messages_delete->renderRow();
?>
	<tr <?php echo $obs_sms_messages->rowAttributes() ?>>
<?php if ($obs_sms_messages_delete->message_id->Visible) { // message_id ?>
		<td <?php echo $obs_sms_messages_delete->message_id->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_message_id" class="obs_sms_messages_message_id">
<span<?php echo $obs_sms_messages_delete->message_id->viewAttributes() ?>><?php echo $obs_sms_messages_delete->message_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_sms_messages_delete->SMSDateTime->Visible) { // SMSDateTime ?>
		<td <?php echo $obs_sms_messages_delete->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_SMSDateTime" class="obs_sms_messages_SMSDateTime">
<span<?php echo $obs_sms_messages_delete->SMSDateTime->viewAttributes() ?>><?php echo $obs_sms_messages_delete->SMSDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_sms_messages_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $obs_sms_messages_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_MobileNumber" class="obs_sms_messages_MobileNumber">
<span<?php echo $obs_sms_messages_delete->MobileNumber->viewAttributes() ?>><?php echo $obs_sms_messages_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_sms_messages_delete->SystemDateTime->Visible) { // SystemDateTime ?>
		<td <?php echo $obs_sms_messages_delete->SystemDateTime->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_SystemDateTime" class="obs_sms_messages_SystemDateTime">
<span<?php echo $obs_sms_messages_delete->SystemDateTime->viewAttributes() ?>><?php echo $obs_sms_messages_delete->SystemDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_sms_messages_delete->rainfall->Visible) { // rainfall ?>
		<td <?php echo $obs_sms_messages_delete->rainfall->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_rainfall" class="obs_sms_messages_rainfall">
<span<?php echo $obs_sms_messages_delete->rainfall->viewAttributes() ?>><?php echo $obs_sms_messages_delete->rainfall->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_sms_messages_delete->stationid->Visible) { // stationid ?>
		<td <?php echo $obs_sms_messages_delete->stationid->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_stationid" class="obs_sms_messages_stationid">
<span<?php echo $obs_sms_messages_delete->stationid->viewAttributes() ?>><?php echo $obs_sms_messages_delete->stationid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_sms_messages_delete->SubDivisionId->Visible) { // SubDivisionId ?>
		<td <?php echo $obs_sms_messages_delete->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_SubDivisionId" class="obs_sms_messages_SubDivisionId">
<span<?php echo $obs_sms_messages_delete->SubDivisionId->viewAttributes() ?>><?php echo $obs_sms_messages_delete->SubDivisionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_sms_messages_delete->SMSText->Visible) { // SMSText ?>
		<td <?php echo $obs_sms_messages_delete->SMSText->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_SMSText" class="obs_sms_messages_SMSText">
<span<?php echo $obs_sms_messages_delete->SMSText->viewAttributes() ?>><?php echo $obs_sms_messages_delete->SMSText->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_sms_messages_delete->sms_statusid->Visible) { // sms_statusid ?>
		<td <?php echo $obs_sms_messages_delete->sms_statusid->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_delete->RowCount ?>_obs_sms_messages_sms_statusid" class="obs_sms_messages_sms_statusid">
<span<?php echo $obs_sms_messages_delete->sms_statusid->viewAttributes() ?>><?php echo $obs_sms_messages_delete->sms_statusid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$obs_sms_messages_delete->Recordset->moveNext();
}
$obs_sms_messages_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $obs_sms_messages_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$obs_sms_messages_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$obs_sms_messages_delete->terminate();
?>