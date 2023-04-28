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
$master_station_view = new master_station_view();

// Run the page
$master_station_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_station_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_station_view->isExport()) { ?>
<script>
var fmaster_stationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_stationview = currentForm = new ew.Form("fmaster_stationview", "view");
	loadjs.done("fmaster_stationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_station_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_station_view->ExportOptions->render("body") ?>
<?php $master_station_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_station_view->showPageHeader(); ?>
<?php
$master_station_view->showMessage();
?>
<form name="fmaster_stationview" id="fmaster_stationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_station">
<input type="hidden" name="modal" value="<?php echo (int)$master_station_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_station_view->StationId->Visible) { // StationId ?>
	<tr id="r_StationId">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_StationId"><?php echo $master_station_view->StationId->caption() ?></span></td>
		<td data-name="StationId" <?php echo $master_station_view->StationId->cellAttributes() ?>>
<span id="el_master_station_StationId">
<span<?php echo $master_station_view->StationId->viewAttributes() ?>><?php echo $master_station_view->StationId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->StationName->Visible) { // StationName ?>
	<tr id="r_StationName">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_StationName"><?php echo $master_station_view->StationName->caption() ?></span></td>
		<td data-name="StationName" <?php echo $master_station_view->StationName->cellAttributes() ?>>
<span id="el_master_station_StationName">
<span<?php echo $master_station_view->StationName->viewAttributes() ?>><?php echo $master_station_view->StationName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->StationName_kn->Visible) { // StationName_kn ?>
	<tr id="r_StationName_kn">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_StationName_kn"><?php echo $master_station_view->StationName_kn->caption() ?></span></td>
		<td data-name="StationName_kn" <?php echo $master_station_view->StationName_kn->cellAttributes() ?>>
<span id="el_master_station_StationName_kn">
<span<?php echo $master_station_view->StationName_kn->viewAttributes() ?>><?php echo $master_station_view->StationName_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->StationName_hi->Visible) { // StationName_hi ?>
	<tr id="r_StationName_hi">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_StationName_hi"><?php echo $master_station_view->StationName_hi->caption() ?></span></td>
		<td data-name="StationName_hi" <?php echo $master_station_view->StationName_hi->cellAttributes() ?>>
<span id="el_master_station_StationName_hi">
<span<?php echo $master_station_view->StationName_hi->viewAttributes() ?>><?php echo $master_station_view->StationName_hi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->StationCode->Visible) { // StationCode ?>
	<tr id="r_StationCode">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_StationCode"><?php echo $master_station_view->StationCode->caption() ?></span></td>
		<td data-name="StationCode" <?php echo $master_station_view->StationCode->cellAttributes() ?>>
<span id="el_master_station_StationCode">
<span<?php echo $master_station_view->StationCode->viewAttributes() ?>><?php echo $master_station_view->StationCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_MobileNumber"><?php echo $master_station_view->MobileNumber->caption() ?></span></td>
		<td data-name="MobileNumber" <?php echo $master_station_view->MobileNumber->cellAttributes() ?>>
<span id="el_master_station_MobileNumber">
<span<?php echo $master_station_view->MobileNumber->viewAttributes() ?>><?php echo $master_station_view->MobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->Address->Visible) { // Address ?>
	<tr id="r_Address">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_Address"><?php echo $master_station_view->Address->caption() ?></span></td>
		<td data-name="Address" <?php echo $master_station_view->Address->cellAttributes() ?>>
<span id="el_master_station_Address">
<span<?php echo $master_station_view->Address->viewAttributes() ?>><?php echo $master_station_view->Address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->Longitude->Visible) { // Longitude ?>
	<tr id="r_Longitude">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_Longitude"><?php echo $master_station_view->Longitude->caption() ?></span></td>
		<td data-name="Longitude" <?php echo $master_station_view->Longitude->cellAttributes() ?>>
<span id="el_master_station_Longitude">
<span<?php echo $master_station_view->Longitude->viewAttributes() ?>><?php echo $master_station_view->Longitude->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->Latitude->Visible) { // Latitude ?>
	<tr id="r_Latitude">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_Latitude"><?php echo $master_station_view->Latitude->caption() ?></span></td>
		<td data-name="Latitude" <?php echo $master_station_view->Latitude->cellAttributes() ?>>
<span id="el_master_station_Latitude">
<span<?php echo $master_station_view->Latitude->viewAttributes() ?>><?php echo $master_station_view->Latitude->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->SubDivisionId->Visible) { // SubDivisionId ?>
	<tr id="r_SubDivisionId">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_SubDivisionId"><?php echo $master_station_view->SubDivisionId->caption() ?></span></td>
		<td data-name="SubDivisionId" <?php echo $master_station_view->SubDivisionId->cellAttributes() ?>>
<span id="el_master_station_SubDivisionId">
<span<?php echo $master_station_view->SubDivisionId->viewAttributes() ?>><?php echo $master_station_view->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->IsActive->Visible) { // IsActive ?>
	<tr id="r_IsActive">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_IsActive"><?php echo $master_station_view->IsActive->caption() ?></span></td>
		<td data-name="IsActive" <?php echo $master_station_view->IsActive->cellAttributes() ?>>
<span id="el_master_station_IsActive">
<span<?php echo $master_station_view->IsActive->viewAttributes() ?>><?php echo $master_station_view->IsActive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->last_reading_date->Visible) { // last_reading_date ?>
	<tr id="r_last_reading_date">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_last_reading_date"><?php echo $master_station_view->last_reading_date->caption() ?></span></td>
		<td data-name="last_reading_date" <?php echo $master_station_view->last_reading_date->cellAttributes() ?>>
<span id="el_master_station_last_reading_date">
<span<?php echo $master_station_view->last_reading_date->viewAttributes() ?>><?php echo $master_station_view->last_reading_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->first_reading_date->Visible) { // first_reading_date ?>
	<tr id="r_first_reading_date">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_first_reading_date"><?php echo $master_station_view->first_reading_date->caption() ?></span></td>
		<td data-name="first_reading_date" <?php echo $master_station_view->first_reading_date->cellAttributes() ?>>
<span id="el_master_station_first_reading_date">
<span<?php echo $master_station_view->first_reading_date->viewAttributes() ?>><?php echo $master_station_view->first_reading_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->Altitude->Visible) { // Altitude ?>
	<tr id="r_Altitude">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_Altitude"><?php echo $master_station_view->Altitude->caption() ?></span></td>
		<td data-name="Altitude" <?php echo $master_station_view->Altitude->cellAttributes() ?>>
<span id="el_master_station_Altitude">
<span<?php echo $master_station_view->Altitude->viewAttributes() ?>><?php echo $master_station_view->Altitude->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->DivisionId->Visible) { // DivisionId ?>
	<tr id="r_DivisionId">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_DivisionId"><?php echo $master_station_view->DivisionId->caption() ?></span></td>
		<td data-name="DivisionId" <?php echo $master_station_view->DivisionId->cellAttributes() ?>>
<span id="el_master_station_DivisionId">
<span<?php echo $master_station_view->DivisionId->viewAttributes() ?>><?php echo $master_station_view->DivisionId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->DistrictId->Visible) { // DistrictId ?>
	<tr id="r_DistrictId">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_DistrictId"><?php echo $master_station_view->DistrictId->caption() ?></span></td>
		<td data-name="DistrictId" <?php echo $master_station_view->DistrictId->cellAttributes() ?>>
<span id="el_master_station_DistrictId">
<span<?php echo $master_station_view->DistrictId->viewAttributes() ?>><?php echo $master_station_view->DistrictId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->TalukID->Visible) { // TalukID ?>
	<tr id="r_TalukID">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_TalukID"><?php echo $master_station_view->TalukID->caption() ?></span></td>
		<td data-name="TalukID" <?php echo $master_station_view->TalukID->cellAttributes() ?>>
<span id="el_master_station_TalukID">
<span<?php echo $master_station_view->TalukID->viewAttributes() ?>><?php echo $master_station_view->TalukID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->BasinId->Visible) { // BasinId ?>
	<tr id="r_BasinId">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_BasinId"><?php echo $master_station_view->BasinId->caption() ?></span></td>
		<td data-name="BasinId" <?php echo $master_station_view->BasinId->cellAttributes() ?>>
<span id="el_master_station_BasinId">
<span<?php echo $master_station_view->BasinId->viewAttributes() ?>><?php echo $master_station_view->BasinId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->SubBasinId->Visible) { // SubBasinId ?>
	<tr id="r_SubBasinId">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_SubBasinId"><?php echo $master_station_view->SubBasinId->caption() ?></span></td>
		<td data-name="SubBasinId" <?php echo $master_station_view->SubBasinId->cellAttributes() ?>>
<span id="el_master_station_SubBasinId">
<span<?php echo $master_station_view->SubBasinId->viewAttributes() ?>><?php echo $master_station_view->SubBasinId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->CatchUpId->Visible) { // CatchUpId ?>
	<tr id="r_CatchUpId">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_CatchUpId"><?php echo $master_station_view->CatchUpId->caption() ?></span></td>
		<td data-name="CatchUpId" <?php echo $master_station_view->CatchUpId->cellAttributes() ?>>
<span id="el_master_station_CatchUpId">
<span<?php echo $master_station_view->CatchUpId->viewAttributes() ?>><?php echo $master_station_view->CatchUpId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->RiverId->Visible) { // RiverId ?>
	<tr id="r_RiverId">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_RiverId"><?php echo $master_station_view->RiverId->caption() ?></span></td>
		<td data-name="RiverId" <?php echo $master_station_view->RiverId->cellAttributes() ?>>
<span id="el_master_station_RiverId">
<span<?php echo $master_station_view->RiverId->viewAttributes() ?>><?php echo $master_station_view->RiverId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->StationSetup->Visible) { // StationSetup ?>
	<tr id="r_StationSetup">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_StationSetup"><?php echo $master_station_view->StationSetup->caption() ?></span></td>
		<td data-name="StationSetup" <?php echo $master_station_view->StationSetup->cellAttributes() ?>>
<span id="el_master_station_StationSetup">
<span<?php echo $master_station_view->StationSetup->viewAttributes() ?>><?php echo $master_station_view->StationSetup->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->NewStationCode->Visible) { // NewStationCode ?>
	<tr id="r_NewStationCode">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_NewStationCode"><?php echo $master_station_view->NewStationCode->caption() ?></span></td>
		<td data-name="NewStationCode" <?php echo $master_station_view->NewStationCode->cellAttributes() ?>>
<span id="el_master_station_NewStationCode">
<span<?php echo $master_station_view->NewStationCode->viewAttributes() ?>><?php echo $master_station_view->NewStationCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->no_of_sms->Visible) { // no_of_sms ?>
	<tr id="r_no_of_sms">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_no_of_sms"><?php echo $master_station_view->no_of_sms->caption() ?></span></td>
		<td data-name="no_of_sms" <?php echo $master_station_view->no_of_sms->cellAttributes() ?>>
<span id="el_master_station_no_of_sms">
<span<?php echo $master_station_view->no_of_sms->viewAttributes() ?>><?php echo $master_station_view->no_of_sms->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_station_view->no_of_manual_entry->Visible) { // no_of_manual_entry ?>
	<tr id="r_no_of_manual_entry">
		<td class="<?php echo $master_station_view->TableLeftColumnClass ?>"><span id="elh_master_station_no_of_manual_entry"><?php echo $master_station_view->no_of_manual_entry->caption() ?></span></td>
		<td data-name="no_of_manual_entry" <?php echo $master_station_view->no_of_manual_entry->cellAttributes() ?>>
<span id="el_master_station_no_of_manual_entry">
<span<?php echo $master_station_view->no_of_manual_entry->viewAttributes() ?>><?php echo $master_station_view->no_of_manual_entry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_station_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_station_view->isExport()) { ?>
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
$master_station_view->terminate();
?>