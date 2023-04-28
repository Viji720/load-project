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
$master_station_delete = new master_station_delete();

// Run the page
$master_station_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_station_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_stationdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_stationdelete = currentForm = new ew.Form("fmaster_stationdelete", "delete");
	loadjs.done("fmaster_stationdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_station_delete->showPageHeader(); ?>
<?php
$master_station_delete->showMessage();
?>
<form name="fmaster_stationdelete" id="fmaster_stationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_station">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_station_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_station_delete->SubDivisionId->Visible) { // SubDivisionId ?>
		<th class="<?php echo $master_station_delete->SubDivisionId->headerCellClass() ?>"><span id="elh_master_station_SubDivisionId" class="master_station_SubDivisionId"><?php echo $master_station_delete->SubDivisionId->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->StationName->Visible) { // StationName ?>
		<th class="<?php echo $master_station_delete->StationName->headerCellClass() ?>"><span id="elh_master_station_StationName" class="master_station_StationName"><?php echo $master_station_delete->StationName->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->StationName_kn->Visible) { // StationName_kn ?>
		<th class="<?php echo $master_station_delete->StationName_kn->headerCellClass() ?>"><span id="elh_master_station_StationName_kn" class="master_station_StationName_kn"><?php echo $master_station_delete->StationName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $master_station_delete->MobileNumber->headerCellClass() ?>"><span id="elh_master_station_MobileNumber" class="master_station_MobileNumber"><?php echo $master_station_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->Longitude->Visible) { // Longitude ?>
		<th class="<?php echo $master_station_delete->Longitude->headerCellClass() ?>"><span id="elh_master_station_Longitude" class="master_station_Longitude"><?php echo $master_station_delete->Longitude->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->Latitude->Visible) { // Latitude ?>
		<th class="<?php echo $master_station_delete->Latitude->headerCellClass() ?>"><span id="elh_master_station_Latitude" class="master_station_Latitude"><?php echo $master_station_delete->Latitude->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->Altitude_MSL_in_mtrs->Visible) { // Altitude_MSL_in_mtrs ?>
		<th class="<?php echo $master_station_delete->Altitude_MSL_in_mtrs->headerCellClass() ?>"><span id="elh_master_station_Altitude_MSL_in_mtrs" class="master_station_Altitude_MSL_in_mtrs"><?php echo $master_station_delete->Altitude_MSL_in_mtrs->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->station_type->Visible) { // station_type ?>
		<th class="<?php echo $master_station_delete->station_type->headerCellClass() ?>"><span id="elh_master_station_station_type" class="master_station_station_type"><?php echo $master_station_delete->station_type->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->IsActive->Visible) { // IsActive ?>
		<th class="<?php echo $master_station_delete->IsActive->headerCellClass() ?>"><span id="elh_master_station_IsActive" class="master_station_IsActive"><?php echo $master_station_delete->IsActive->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->last_active_date->Visible) { // last_active_date ?>
		<th class="<?php echo $master_station_delete->last_active_date->headerCellClass() ?>"><span id="elh_master_station_last_active_date" class="master_station_last_active_date"><?php echo $master_station_delete->last_active_date->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->DistrictId->Visible) { // DistrictId ?>
		<th class="<?php echo $master_station_delete->DistrictId->headerCellClass() ?>"><span id="elh_master_station_DistrictId" class="master_station_DistrictId"><?php echo $master_station_delete->DistrictId->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->TalukID->Visible) { // TalukID ?>
		<th class="<?php echo $master_station_delete->TalukID->headerCellClass() ?>"><span id="elh_master_station_TalukID" class="master_station_TalukID"><?php echo $master_station_delete->TalukID->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->BasinId->Visible) { // BasinId ?>
		<th class="<?php echo $master_station_delete->BasinId->headerCellClass() ?>"><span id="elh_master_station_BasinId" class="master_station_BasinId"><?php echo $master_station_delete->BasinId->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->SubBasinId->Visible) { // SubBasinId ?>
		<th class="<?php echo $master_station_delete->SubBasinId->headerCellClass() ?>"><span id="elh_master_station_SubBasinId" class="master_station_SubBasinId"><?php echo $master_station_delete->SubBasinId->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->CatchUpId->Visible) { // CatchUpId ?>
		<th class="<?php echo $master_station_delete->CatchUpId->headerCellClass() ?>"><span id="elh_master_station_CatchUpId" class="master_station_CatchUpId"><?php echo $master_station_delete->CatchUpId->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->PIC->Visible) { // PIC ?>
		<th class="<?php echo $master_station_delete->PIC->headerCellClass() ?>"><span id="elh_master_station_PIC" class="master_station_PIC"><?php echo $master_station_delete->PIC->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->RiverId->Visible) { // RiverId ?>
		<th class="<?php echo $master_station_delete->RiverId->headerCellClass() ?>"><span id="elh_master_station_RiverId" class="master_station_RiverId"><?php echo $master_station_delete->RiverId->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->max_rainfall_date->Visible) { // max_rainfall_date ?>
		<th class="<?php echo $master_station_delete->max_rainfall_date->headerCellClass() ?>"><span id="elh_master_station_max_rainfall_date" class="master_station_max_rainfall_date"><?php echo $master_station_delete->max_rainfall_date->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->max_rainfall->Visible) { // max_rainfall ?>
		<th class="<?php echo $master_station_delete->max_rainfall->headerCellClass() ?>"><span id="elh_master_station_max_rainfall" class="master_station_max_rainfall"><?php echo $master_station_delete->max_rainfall->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->last_reading_date->Visible) { // last_reading_date ?>
		<th class="<?php echo $master_station_delete->last_reading_date->headerCellClass() ?>"><span id="elh_master_station_last_reading_date" class="master_station_last_reading_date"><?php echo $master_station_delete->last_reading_date->caption() ?></span></th>
<?php } ?>
<?php if ($master_station_delete->first_reading_date->Visible) { // first_reading_date ?>
		<th class="<?php echo $master_station_delete->first_reading_date->headerCellClass() ?>"><span id="elh_master_station_first_reading_date" class="master_station_first_reading_date"><?php echo $master_station_delete->first_reading_date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_station_delete->RecordCount = 0;
$i = 0;
while (!$master_station_delete->Recordset->EOF) {
	$master_station_delete->RecordCount++;
	$master_station_delete->RowCount++;

	// Set row properties
	$master_station->resetAttributes();
	$master_station->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_station_delete->loadRowValues($master_station_delete->Recordset);

	// Render row
	$master_station_delete->renderRow();
?>
	<tr <?php echo $master_station->rowAttributes() ?>>
<?php if ($master_station_delete->SubDivisionId->Visible) { // SubDivisionId ?>
		<td <?php echo $master_station_delete->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_SubDivisionId" class="master_station_SubDivisionId">
<span<?php echo $master_station_delete->SubDivisionId->viewAttributes() ?>><?php echo $master_station_delete->SubDivisionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->StationName->Visible) { // StationName ?>
		<td <?php echo $master_station_delete->StationName->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_StationName" class="master_station_StationName">
<span<?php echo $master_station_delete->StationName->viewAttributes() ?>><?php echo $master_station_delete->StationName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->StationName_kn->Visible) { // StationName_kn ?>
		<td <?php echo $master_station_delete->StationName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_StationName_kn" class="master_station_StationName_kn">
<span<?php echo $master_station_delete->StationName_kn->viewAttributes() ?>><?php echo $master_station_delete->StationName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $master_station_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_MobileNumber" class="master_station_MobileNumber">
<span<?php echo $master_station_delete->MobileNumber->viewAttributes() ?>><?php echo $master_station_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->Longitude->Visible) { // Longitude ?>
		<td <?php echo $master_station_delete->Longitude->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_Longitude" class="master_station_Longitude">
<span<?php echo $master_station_delete->Longitude->viewAttributes() ?>><?php echo $master_station_delete->Longitude->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->Latitude->Visible) { // Latitude ?>
		<td <?php echo $master_station_delete->Latitude->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_Latitude" class="master_station_Latitude">
<span<?php echo $master_station_delete->Latitude->viewAttributes() ?>><?php echo $master_station_delete->Latitude->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->Altitude_MSL_in_mtrs->Visible) { // Altitude_MSL_in_mtrs ?>
		<td <?php echo $master_station_delete->Altitude_MSL_in_mtrs->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_Altitude_MSL_in_mtrs" class="master_station_Altitude_MSL_in_mtrs">
<span<?php echo $master_station_delete->Altitude_MSL_in_mtrs->viewAttributes() ?>><?php echo $master_station_delete->Altitude_MSL_in_mtrs->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->station_type->Visible) { // station_type ?>
		<td <?php echo $master_station_delete->station_type->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_station_type" class="master_station_station_type">
<span<?php echo $master_station_delete->station_type->viewAttributes() ?>><?php echo $master_station_delete->station_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->IsActive->Visible) { // IsActive ?>
		<td <?php echo $master_station_delete->IsActive->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_IsActive" class="master_station_IsActive">
<span<?php echo $master_station_delete->IsActive->viewAttributes() ?>><?php echo $master_station_delete->IsActive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->last_active_date->Visible) { // last_active_date ?>
		<td <?php echo $master_station_delete->last_active_date->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_last_active_date" class="master_station_last_active_date">
<span<?php echo $master_station_delete->last_active_date->viewAttributes() ?>><?php echo $master_station_delete->last_active_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->DistrictId->Visible) { // DistrictId ?>
		<td <?php echo $master_station_delete->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_DistrictId" class="master_station_DistrictId">
<span<?php echo $master_station_delete->DistrictId->viewAttributes() ?>><?php echo $master_station_delete->DistrictId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->TalukID->Visible) { // TalukID ?>
		<td <?php echo $master_station_delete->TalukID->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_TalukID" class="master_station_TalukID">
<span<?php echo $master_station_delete->TalukID->viewAttributes() ?>><?php echo $master_station_delete->TalukID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->BasinId->Visible) { // BasinId ?>
		<td <?php echo $master_station_delete->BasinId->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_BasinId" class="master_station_BasinId">
<span<?php echo $master_station_delete->BasinId->viewAttributes() ?>><?php echo $master_station_delete->BasinId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->SubBasinId->Visible) { // SubBasinId ?>
		<td <?php echo $master_station_delete->SubBasinId->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_SubBasinId" class="master_station_SubBasinId">
<span<?php echo $master_station_delete->SubBasinId->viewAttributes() ?>><?php echo $master_station_delete->SubBasinId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->CatchUpId->Visible) { // CatchUpId ?>
		<td <?php echo $master_station_delete->CatchUpId->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_CatchUpId" class="master_station_CatchUpId">
<span<?php echo $master_station_delete->CatchUpId->viewAttributes() ?>><?php echo $master_station_delete->CatchUpId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->PIC->Visible) { // PIC ?>
		<td <?php echo $master_station_delete->PIC->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_PIC" class="master_station_PIC">
<span<?php echo $master_station_delete->PIC->viewAttributes() ?>><?php echo $master_station_delete->PIC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->RiverId->Visible) { // RiverId ?>
		<td <?php echo $master_station_delete->RiverId->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_RiverId" class="master_station_RiverId">
<span<?php echo $master_station_delete->RiverId->viewAttributes() ?>><?php echo $master_station_delete->RiverId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->max_rainfall_date->Visible) { // max_rainfall_date ?>
		<td <?php echo $master_station_delete->max_rainfall_date->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_max_rainfall_date" class="master_station_max_rainfall_date">
<span<?php echo $master_station_delete->max_rainfall_date->viewAttributes() ?>><?php echo $master_station_delete->max_rainfall_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->max_rainfall->Visible) { // max_rainfall ?>
		<td <?php echo $master_station_delete->max_rainfall->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_max_rainfall" class="master_station_max_rainfall">
<span<?php echo $master_station_delete->max_rainfall->viewAttributes() ?>><?php echo $master_station_delete->max_rainfall->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->last_reading_date->Visible) { // last_reading_date ?>
		<td <?php echo $master_station_delete->last_reading_date->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_last_reading_date" class="master_station_last_reading_date">
<span<?php echo $master_station_delete->last_reading_date->viewAttributes() ?>><?php echo $master_station_delete->last_reading_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_station_delete->first_reading_date->Visible) { // first_reading_date ?>
		<td <?php echo $master_station_delete->first_reading_date->cellAttributes() ?>>
<span id="el<?php echo $master_station_delete->RowCount ?>_master_station_first_reading_date" class="master_station_first_reading_date">
<span<?php echo $master_station_delete->first_reading_date->viewAttributes() ?>><?php echo $master_station_delete->first_reading_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_station_delete->Recordset->moveNext();
}
$master_station_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_station_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_station_delete->showPageFooter();
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
$master_station_delete->terminate();
?>