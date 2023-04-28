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
$tbl_smsdata_archive_view = new tbl_smsdata_archive_view();

// Run the page
$tbl_smsdata_archive_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_smsdata_archive_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tbl_smsdata_archive_view->isExport()) { ?>
<script>
var ftbl_smsdata_archiveview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftbl_smsdata_archiveview = currentForm = new ew.Form("ftbl_smsdata_archiveview", "view");
	loadjs.done("ftbl_smsdata_archiveview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tbl_smsdata_archive_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tbl_smsdata_archive_view->ExportOptions->render("body") ?>
<?php $tbl_smsdata_archive_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tbl_smsdata_archive_view->showPageHeader(); ?>
<?php
$tbl_smsdata_archive_view->showMessage();
?>
<form name="ftbl_smsdata_archiveview" id="ftbl_smsdata_archiveview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_smsdata_archive">
<input type="hidden" name="modal" value="<?php echo (int)$tbl_smsdata_archive_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tbl_smsdata_archive_view->Slno->Visible) { // Slno ?>
	<tr id="r_Slno">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_Slno"><?php echo $tbl_smsdata_archive_view->Slno->caption() ?></span></td>
		<td data-name="Slno" <?php echo $tbl_smsdata_archive_view->Slno->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_Slno">
<span<?php echo $tbl_smsdata_archive_view->Slno->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->Slno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->SMSDateTime->Visible) { // SMSDateTime ?>
	<tr id="r_SMSDateTime">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_SMSDateTime"><?php echo $tbl_smsdata_archive_view->SMSDateTime->caption() ?></span></td>
		<td data-name="SMSDateTime" <?php echo $tbl_smsdata_archive_view->SMSDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SMSDateTime">
<span<?php echo $tbl_smsdata_archive_view->SMSDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->SystemDateTime->Visible) { // SystemDateTime ?>
	<tr id="r_SystemDateTime">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_SystemDateTime"><?php echo $tbl_smsdata_archive_view->SystemDateTime->caption() ?></span></td>
		<td data-name="SystemDateTime" <?php echo $tbl_smsdata_archive_view->SystemDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SystemDateTime">
<span<?php echo $tbl_smsdata_archive_view->SystemDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->SystemDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
	<tr id="r_ConfirmQueryDateTime">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_ConfirmQueryDateTime"><?php echo $tbl_smsdata_archive_view->ConfirmQueryDateTime->caption() ?></span></td>
		<td data-name="ConfirmQueryDateTime" <?php echo $tbl_smsdata_archive_view->ConfirmQueryDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_ConfirmQueryDateTime">
<span<?php echo $tbl_smsdata_archive_view->ConfirmQueryDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->ConfirmQueryDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
	<tr id="r_ConfirmedDateTime">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_ConfirmedDateTime"><?php echo $tbl_smsdata_archive_view->ConfirmedDateTime->caption() ?></span></td>
		<td data-name="ConfirmedDateTime" <?php echo $tbl_smsdata_archive_view->ConfirmedDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_ConfirmedDateTime">
<span<?php echo $tbl_smsdata_archive_view->ConfirmedDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->ConfirmedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->SendDateTime->Visible) { // SendDateTime ?>
	<tr id="r_SendDateTime">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_SendDateTime"><?php echo $tbl_smsdata_archive_view->SendDateTime->caption() ?></span></td>
		<td data-name="SendDateTime" <?php echo $tbl_smsdata_archive_view->SendDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SendDateTime">
<span<?php echo $tbl_smsdata_archive_view->SendDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->SendDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->SMSText->Visible) { // SMSText ?>
	<tr id="r_SMSText">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_SMSText"><?php echo $tbl_smsdata_archive_view->SMSText->caption() ?></span></td>
		<td data-name="SMSText" <?php echo $tbl_smsdata_archive_view->SMSText->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SMSText">
<span<?php echo $tbl_smsdata_archive_view->SMSText->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->SMSText->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_Status"><?php echo $tbl_smsdata_archive_view->Status->caption() ?></span></td>
		<td data-name="Status" <?php echo $tbl_smsdata_archive_view->Status->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_Status">
<span<?php echo $tbl_smsdata_archive_view->Status->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->obsremarks->Visible) { // obsremarks ?>
	<tr id="r_obsremarks">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_obsremarks"><?php echo $tbl_smsdata_archive_view->obsremarks->caption() ?></span></td>
		<td data-name="obsremarks" <?php echo $tbl_smsdata_archive_view->obsremarks->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_obsremarks">
<span<?php echo $tbl_smsdata_archive_view->obsremarks->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->obsremarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<tr id="r_SenderMobileNumber">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_SenderMobileNumber"><?php echo $tbl_smsdata_archive_view->SenderMobileNumber->caption() ?></span></td>
		<td data-name="SenderMobileNumber" <?php echo $tbl_smsdata_archive_view->SenderMobileNumber->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SenderMobileNumber">
<span<?php echo $tbl_smsdata_archive_view->SenderMobileNumber->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->SenderMobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->SubDivId->Visible) { // SubDivId ?>
	<tr id="r_SubDivId">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_SubDivId"><?php echo $tbl_smsdata_archive_view->SubDivId->caption() ?></span></td>
		<td data-name="SubDivId" <?php echo $tbl_smsdata_archive_view->SubDivId->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SubDivId">
<span<?php echo $tbl_smsdata_archive_view->SubDivId->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->SubDivId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->StationId->Visible) { // StationId ?>
	<tr id="r_StationId">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_StationId"><?php echo $tbl_smsdata_archive_view->StationId->caption() ?></span></td>
		<td data-name="StationId" <?php echo $tbl_smsdata_archive_view->StationId->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_StationId">
<span<?php echo $tbl_smsdata_archive_view->StationId->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->StationId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->IsFirstMsg->Visible) { // IsFirstMsg ?>
	<tr id="r_IsFirstMsg">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_IsFirstMsg"><?php echo $tbl_smsdata_archive_view->IsFirstMsg->caption() ?></span></td>
		<td data-name="IsFirstMsg" <?php echo $tbl_smsdata_archive_view->IsFirstMsg->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_IsFirstMsg">
<span<?php echo $tbl_smsdata_archive_view->IsFirstMsg->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->IsFirstMsg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->Validated->Visible) { // Validated ?>
	<tr id="r_Validated">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_Validated"><?php echo $tbl_smsdata_archive_view->Validated->caption() ?></span></td>
		<td data-name="Validated" <?php echo $tbl_smsdata_archive_view->Validated->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_Validated">
<span<?php echo $tbl_smsdata_archive_view->Validated->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->Validated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->isFreeze->Visible) { // isFreeze ?>
	<tr id="r_isFreeze">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_isFreeze"><?php echo $tbl_smsdata_archive_view->isFreeze->caption() ?></span></td>
		<td data-name="isFreeze" <?php echo $tbl_smsdata_archive_view->isFreeze->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_isFreeze">
<span<?php echo $tbl_smsdata_archive_view->isFreeze->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_isFreeze" class="custom-control-input" value="<?php echo $tbl_smsdata_archive_view->isFreeze->getViewValue() ?>" disabled<?php if (ConvertToBool($tbl_smsdata_archive_view->isFreeze->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_isFreeze"></label></div></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->rainfall->Visible) { // rainfall ?>
	<tr id="r_rainfall">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_rainfall"><?php echo $tbl_smsdata_archive_view->rainfall->caption() ?></span></td>
		<td data-name="rainfall" <?php echo $tbl_smsdata_archive_view->rainfall->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_rainfall">
<span<?php echo $tbl_smsdata_archive_view->rainfall->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->rainfall->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->min_air_temp->Visible) { // min_air_temp ?>
	<tr id="r_min_air_temp">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_min_air_temp"><?php echo $tbl_smsdata_archive_view->min_air_temp->caption() ?></span></td>
		<td data-name="min_air_temp" <?php echo $tbl_smsdata_archive_view->min_air_temp->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_min_air_temp">
<span<?php echo $tbl_smsdata_archive_view->min_air_temp->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->min_air_temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->max_air_temp->Visible) { // max_air_temp ?>
	<tr id="r_max_air_temp">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_max_air_temp"><?php echo $tbl_smsdata_archive_view->max_air_temp->caption() ?></span></td>
		<td data-name="max_air_temp" <?php echo $tbl_smsdata_archive_view->max_air_temp->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_max_air_temp">
<span<?php echo $tbl_smsdata_archive_view->max_air_temp->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->max_air_temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->atmospheric_pressure->Visible) { // atmospheric_pressure ?>
	<tr id="r_atmospheric_pressure">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_atmospheric_pressure"><?php echo $tbl_smsdata_archive_view->atmospheric_pressure->caption() ?></span></td>
		<td data-name="atmospheric_pressure" <?php echo $tbl_smsdata_archive_view->atmospheric_pressure->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_atmospheric_pressure">
<span<?php echo $tbl_smsdata_archive_view->atmospheric_pressure->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->atmospheric_pressure->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->wind_speed->Visible) { // wind_speed ?>
	<tr id="r_wind_speed">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_wind_speed"><?php echo $tbl_smsdata_archive_view->wind_speed->caption() ?></span></td>
		<td data-name="wind_speed" <?php echo $tbl_smsdata_archive_view->wind_speed->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_wind_speed">
<span<?php echo $tbl_smsdata_archive_view->wind_speed->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->wind_speed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tbl_smsdata_archive_view->precipitation->Visible) { // precipitation ?>
	<tr id="r_precipitation">
		<td class="<?php echo $tbl_smsdata_archive_view->TableLeftColumnClass ?>"><span id="elh_tbl_smsdata_archive_precipitation"><?php echo $tbl_smsdata_archive_view->precipitation->caption() ?></span></td>
		<td data-name="precipitation" <?php echo $tbl_smsdata_archive_view->precipitation->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_precipitation">
<span<?php echo $tbl_smsdata_archive_view->precipitation->viewAttributes() ?>><?php echo $tbl_smsdata_archive_view->precipitation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tbl_smsdata_archive_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tbl_smsdata_archive_view->isExport()) { ?>
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
$tbl_smsdata_archive_view->terminate();
?>