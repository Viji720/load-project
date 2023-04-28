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
$tbl_smsdata_archive_delete = new tbl_smsdata_archive_delete();

// Run the page
$tbl_smsdata_archive_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_smsdata_archive_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftbl_smsdata_archivedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftbl_smsdata_archivedelete = currentForm = new ew.Form("ftbl_smsdata_archivedelete", "delete");
	loadjs.done("ftbl_smsdata_archivedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tbl_smsdata_archive_delete->showPageHeader(); ?>
<?php
$tbl_smsdata_archive_delete->showMessage();
?>
<form name="ftbl_smsdata_archivedelete" id="ftbl_smsdata_archivedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_smsdata_archive">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tbl_smsdata_archive_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tbl_smsdata_archive_delete->Slno->Visible) { // Slno ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->Slno->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_Slno" class="tbl_smsdata_archive_Slno"><?php echo $tbl_smsdata_archive_delete->Slno->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SMSDateTime->Visible) { // SMSDateTime ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->SMSDateTime->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_SMSDateTime" class="tbl_smsdata_archive_SMSDateTime"><?php echo $tbl_smsdata_archive_delete->SMSDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SystemDateTime->Visible) { // SystemDateTime ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->SystemDateTime->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_SystemDateTime" class="tbl_smsdata_archive_SystemDateTime"><?php echo $tbl_smsdata_archive_delete->SystemDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->ConfirmQueryDateTime->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_ConfirmQueryDateTime" class="tbl_smsdata_archive_ConfirmQueryDateTime"><?php echo $tbl_smsdata_archive_delete->ConfirmQueryDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->ConfirmedDateTime->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_ConfirmedDateTime" class="tbl_smsdata_archive_ConfirmedDateTime"><?php echo $tbl_smsdata_archive_delete->ConfirmedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SendDateTime->Visible) { // SendDateTime ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->SendDateTime->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_SendDateTime" class="tbl_smsdata_archive_SendDateTime"><?php echo $tbl_smsdata_archive_delete->SendDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SMSText->Visible) { // SMSText ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->SMSText->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_SMSText" class="tbl_smsdata_archive_SMSText"><?php echo $tbl_smsdata_archive_delete->SMSText->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->Status->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_Status" class="tbl_smsdata_archive_Status"><?php echo $tbl_smsdata_archive_delete->Status->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->obsremarks->Visible) { // obsremarks ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->obsremarks->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_obsremarks" class="tbl_smsdata_archive_obsremarks"><?php echo $tbl_smsdata_archive_delete->obsremarks->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->SenderMobileNumber->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_SenderMobileNumber" class="tbl_smsdata_archive_SenderMobileNumber"><?php echo $tbl_smsdata_archive_delete->SenderMobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SubDivId->Visible) { // SubDivId ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->SubDivId->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_SubDivId" class="tbl_smsdata_archive_SubDivId"><?php echo $tbl_smsdata_archive_delete->SubDivId->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->StationId->Visible) { // StationId ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->StationId->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_StationId" class="tbl_smsdata_archive_StationId"><?php echo $tbl_smsdata_archive_delete->StationId->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->IsFirstMsg->Visible) { // IsFirstMsg ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->IsFirstMsg->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_IsFirstMsg" class="tbl_smsdata_archive_IsFirstMsg"><?php echo $tbl_smsdata_archive_delete->IsFirstMsg->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->Validated->Visible) { // Validated ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->Validated->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_Validated" class="tbl_smsdata_archive_Validated"><?php echo $tbl_smsdata_archive_delete->Validated->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->isFreeze->Visible) { // isFreeze ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->isFreeze->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_isFreeze" class="tbl_smsdata_archive_isFreeze"><?php echo $tbl_smsdata_archive_delete->isFreeze->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->rainfall->Visible) { // rainfall ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->rainfall->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_rainfall" class="tbl_smsdata_archive_rainfall"><?php echo $tbl_smsdata_archive_delete->rainfall->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->min_air_temp->Visible) { // min_air_temp ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->min_air_temp->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_min_air_temp" class="tbl_smsdata_archive_min_air_temp"><?php echo $tbl_smsdata_archive_delete->min_air_temp->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->max_air_temp->Visible) { // max_air_temp ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->max_air_temp->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_max_air_temp" class="tbl_smsdata_archive_max_air_temp"><?php echo $tbl_smsdata_archive_delete->max_air_temp->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->atmospheric_pressure->Visible) { // atmospheric_pressure ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->atmospheric_pressure->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_atmospheric_pressure" class="tbl_smsdata_archive_atmospheric_pressure"><?php echo $tbl_smsdata_archive_delete->atmospheric_pressure->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->wind_speed->Visible) { // wind_speed ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->wind_speed->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_wind_speed" class="tbl_smsdata_archive_wind_speed"><?php echo $tbl_smsdata_archive_delete->wind_speed->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->precipitation->Visible) { // precipitation ?>
		<th class="<?php echo $tbl_smsdata_archive_delete->precipitation->headerCellClass() ?>"><span id="elh_tbl_smsdata_archive_precipitation" class="tbl_smsdata_archive_precipitation"><?php echo $tbl_smsdata_archive_delete->precipitation->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_smsdata_archive_delete->RecordCount = 0;
$i = 0;
while (!$tbl_smsdata_archive_delete->Recordset->EOF) {
	$tbl_smsdata_archive_delete->RecordCount++;
	$tbl_smsdata_archive_delete->RowCount++;

	// Set row properties
	$tbl_smsdata_archive->resetAttributes();
	$tbl_smsdata_archive->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_smsdata_archive_delete->loadRowValues($tbl_smsdata_archive_delete->Recordset);

	// Render row
	$tbl_smsdata_archive_delete->renderRow();
?>
	<tr <?php echo $tbl_smsdata_archive->rowAttributes() ?>>
<?php if ($tbl_smsdata_archive_delete->Slno->Visible) { // Slno ?>
		<td <?php echo $tbl_smsdata_archive_delete->Slno->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_Slno" class="tbl_smsdata_archive_Slno">
<span<?php echo $tbl_smsdata_archive_delete->Slno->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->Slno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SMSDateTime->Visible) { // SMSDateTime ?>
		<td <?php echo $tbl_smsdata_archive_delete->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_SMSDateTime" class="tbl_smsdata_archive_SMSDateTime">
<span<?php echo $tbl_smsdata_archive_delete->SMSDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->SMSDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SystemDateTime->Visible) { // SystemDateTime ?>
		<td <?php echo $tbl_smsdata_archive_delete->SystemDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_SystemDateTime" class="tbl_smsdata_archive_SystemDateTime">
<span<?php echo $tbl_smsdata_archive_delete->SystemDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->SystemDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
		<td <?php echo $tbl_smsdata_archive_delete->ConfirmQueryDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_ConfirmQueryDateTime" class="tbl_smsdata_archive_ConfirmQueryDateTime">
<span<?php echo $tbl_smsdata_archive_delete->ConfirmQueryDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->ConfirmQueryDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
		<td <?php echo $tbl_smsdata_archive_delete->ConfirmedDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_ConfirmedDateTime" class="tbl_smsdata_archive_ConfirmedDateTime">
<span<?php echo $tbl_smsdata_archive_delete->ConfirmedDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->ConfirmedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SendDateTime->Visible) { // SendDateTime ?>
		<td <?php echo $tbl_smsdata_archive_delete->SendDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_SendDateTime" class="tbl_smsdata_archive_SendDateTime">
<span<?php echo $tbl_smsdata_archive_delete->SendDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->SendDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SMSText->Visible) { // SMSText ?>
		<td <?php echo $tbl_smsdata_archive_delete->SMSText->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_SMSText" class="tbl_smsdata_archive_SMSText">
<span<?php echo $tbl_smsdata_archive_delete->SMSText->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->SMSText->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->Status->Visible) { // Status ?>
		<td <?php echo $tbl_smsdata_archive_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_Status" class="tbl_smsdata_archive_Status">
<span<?php echo $tbl_smsdata_archive_delete->Status->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->obsremarks->Visible) { // obsremarks ?>
		<td <?php echo $tbl_smsdata_archive_delete->obsremarks->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_obsremarks" class="tbl_smsdata_archive_obsremarks">
<span<?php echo $tbl_smsdata_archive_delete->obsremarks->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->obsremarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td <?php echo $tbl_smsdata_archive_delete->SenderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_SenderMobileNumber" class="tbl_smsdata_archive_SenderMobileNumber">
<span<?php echo $tbl_smsdata_archive_delete->SenderMobileNumber->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->SenderMobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->SubDivId->Visible) { // SubDivId ?>
		<td <?php echo $tbl_smsdata_archive_delete->SubDivId->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_SubDivId" class="tbl_smsdata_archive_SubDivId">
<span<?php echo $tbl_smsdata_archive_delete->SubDivId->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->SubDivId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->StationId->Visible) { // StationId ?>
		<td <?php echo $tbl_smsdata_archive_delete->StationId->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_StationId" class="tbl_smsdata_archive_StationId">
<span<?php echo $tbl_smsdata_archive_delete->StationId->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->StationId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->IsFirstMsg->Visible) { // IsFirstMsg ?>
		<td <?php echo $tbl_smsdata_archive_delete->IsFirstMsg->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_IsFirstMsg" class="tbl_smsdata_archive_IsFirstMsg">
<span<?php echo $tbl_smsdata_archive_delete->IsFirstMsg->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->IsFirstMsg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->Validated->Visible) { // Validated ?>
		<td <?php echo $tbl_smsdata_archive_delete->Validated->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_Validated" class="tbl_smsdata_archive_Validated">
<span<?php echo $tbl_smsdata_archive_delete->Validated->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->Validated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->isFreeze->Visible) { // isFreeze ?>
		<td <?php echo $tbl_smsdata_archive_delete->isFreeze->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_isFreeze" class="tbl_smsdata_archive_isFreeze">
<span<?php echo $tbl_smsdata_archive_delete->isFreeze->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_isFreeze" class="custom-control-input" value="<?php echo $tbl_smsdata_archive_delete->isFreeze->getViewValue() ?>" disabled<?php if (ConvertToBool($tbl_smsdata_archive_delete->isFreeze->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_isFreeze"></label></div></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->rainfall->Visible) { // rainfall ?>
		<td <?php echo $tbl_smsdata_archive_delete->rainfall->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_rainfall" class="tbl_smsdata_archive_rainfall">
<span<?php echo $tbl_smsdata_archive_delete->rainfall->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->rainfall->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->min_air_temp->Visible) { // min_air_temp ?>
		<td <?php echo $tbl_smsdata_archive_delete->min_air_temp->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_min_air_temp" class="tbl_smsdata_archive_min_air_temp">
<span<?php echo $tbl_smsdata_archive_delete->min_air_temp->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->min_air_temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->max_air_temp->Visible) { // max_air_temp ?>
		<td <?php echo $tbl_smsdata_archive_delete->max_air_temp->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_max_air_temp" class="tbl_smsdata_archive_max_air_temp">
<span<?php echo $tbl_smsdata_archive_delete->max_air_temp->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->max_air_temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->atmospheric_pressure->Visible) { // atmospheric_pressure ?>
		<td <?php echo $tbl_smsdata_archive_delete->atmospheric_pressure->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_atmospheric_pressure" class="tbl_smsdata_archive_atmospheric_pressure">
<span<?php echo $tbl_smsdata_archive_delete->atmospheric_pressure->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->atmospheric_pressure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->wind_speed->Visible) { // wind_speed ?>
		<td <?php echo $tbl_smsdata_archive_delete->wind_speed->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_wind_speed" class="tbl_smsdata_archive_wind_speed">
<span<?php echo $tbl_smsdata_archive_delete->wind_speed->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->wind_speed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_smsdata_archive_delete->precipitation->Visible) { // precipitation ?>
		<td <?php echo $tbl_smsdata_archive_delete->precipitation->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_delete->RowCount ?>_tbl_smsdata_archive_precipitation" class="tbl_smsdata_archive_precipitation">
<span<?php echo $tbl_smsdata_archive_delete->precipitation->viewAttributes() ?>><?php echo $tbl_smsdata_archive_delete->precipitation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tbl_smsdata_archive_delete->Recordset->moveNext();
}
$tbl_smsdata_archive_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tbl_smsdata_archive_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tbl_smsdata_archive_delete->showPageFooter();
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
$tbl_smsdata_archive_delete->terminate();
?>