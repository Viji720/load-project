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
$tbl_hmsdata_delete = new tbl_hmsdata_delete();

// Run the page
$tbl_hmsdata_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_hmsdata_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftbl_hmsdatadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftbl_hmsdatadelete = currentForm = new ew.Form("ftbl_hmsdatadelete", "delete");
	loadjs.done("ftbl_hmsdatadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tbl_hmsdata_delete->showPageHeader(); ?>
<?php
$tbl_hmsdata_delete->showMessage();
?>
<form name="ftbl_hmsdatadelete" id="ftbl_hmsdatadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_hmsdata">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tbl_hmsdata_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tbl_hmsdata_delete->Slno->Visible) { // Slno ?>
		<th class="<?php echo $tbl_hmsdata_delete->Slno->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Slno" class="tbl_hmsdata_Slno"><?php echo $tbl_hmsdata_delete->Slno->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->StationId->Visible) { // StationId ?>
		<th class="<?php echo $tbl_hmsdata_delete->StationId->headerCellClass() ?>"><span id="elh_tbl_hmsdata_StationId" class="tbl_hmsdata_StationId"><?php echo $tbl_hmsdata_delete->StationId->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->obs_DateTime->Visible) { // obs_DateTime ?>
		<th class="<?php echo $tbl_hmsdata_delete->obs_DateTime->headerCellClass() ?>"><span id="elh_tbl_hmsdata_obs_DateTime" class="tbl_hmsdata_obs_DateTime"><?php echo $tbl_hmsdata_delete->obs_DateTime->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Temp_water_in_pan_inC_830AM->Visible) { // Temp_water_in_pan_inC_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Temp_water_in_pan_inC_830AM" class="tbl_hmsdata_Temp_water_in_pan_inC_830AM"><?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Temp_water_in_pan_inC_530PM->Visible) { // Temp_water_in_pan_inC_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Temp_water_in_pan_inC_530PM" class="tbl_hmsdata_Temp_water_in_pan_inC_530PM"><?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->App_Evaporation_inMM_830AM->Visible) { // App_Evaporation_inMM_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_App_Evaporation_inMM_830AM" class="tbl_hmsdata_App_Evaporation_inMM_830AM"><?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->App_Evaporation_inMM_530PM->Visible) { // App_Evaporation_inMM_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_App_Evaporation_inMM_530PM" class="tbl_hmsdata_App_Evaporation_inMM_530PM"><?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Rainfall_inMM_830AM->Visible) { // Rainfall_inMM_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Rainfall_inMM_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Rainfall_inMM_830AM" class="tbl_hmsdata_Rainfall_inMM_830AM"><?php echo $tbl_hmsdata_delete->Rainfall_inMM_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Rainfall_inMM_530PM->Visible) { // Rainfall_inMM_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Rainfall_inMM_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Rainfall_inMM_530PM" class="tbl_hmsdata_Rainfall_inMM_530PM"><?php echo $tbl_hmsdata_delete->Rainfall_inMM_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Evaporation_curing_inMM_830AM->Visible) { // Evaporation_curing_inMM_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Evaporation_curing_inMM_830AM" class="tbl_hmsdata_Evaporation_curing_inMM_830AM"><?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Evaporation_curing_inMM_530PM->Visible) { // Evaporation_curing_inMM_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Evaporation_curing_inMM_530PM" class="tbl_hmsdata_Evaporation_curing_inMM_530PM"><?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Evaporation_curing_DaywithRain_inMM->Visible) { // Evaporation_curing_DaywithRain_inMM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithRain_inMM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM" class="tbl_hmsdata_Evaporation_curing_DaywithRain_inMM"><?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithRain_inMM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Evaporation_curing_DaywithNoRain_inMM->Visible) { // Evaporation_curing_DaywithNoRain_inMM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithNoRain_inMM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM" class="tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM"><?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithNoRain_inMM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Dry_Bulb_Temp_inC_830AM->Visible) { // Dry_Bulb_Temp_inC_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM" class="tbl_hmsdata_Dry_Bulb_Temp_inC_830AM"><?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Wet_Bulb_Temp_inC_830AM->Visible) { // Wet_Bulb_Temp_inC_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM" class="tbl_hmsdata_Wet_Bulb_Temp_inC_830AM"><?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Vapour_Temp_inC_830AM->Visible) { // Vapour_Temp_inC_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Vapour_Temp_inC_830AM" class="tbl_hmsdata_Vapour_Temp_inC_830AM"><?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Dry_Bulb_Temp_inC_530PM->Visible) { // Dry_Bulb_Temp_inC_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM" class="tbl_hmsdata_Dry_Bulb_Temp_inC_530PM"><?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Wet_Bulb_Temp_inC_530PM->Visible) { // Wet_Bulb_Temp_inC_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM" class="tbl_hmsdata_Wet_Bulb_Temp_inC_530PM"><?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Vapour_Temp_inC_530PM->Visible) { // Vapour_Temp_inC_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Vapour_Temp_inC_530PM" class="tbl_hmsdata_Vapour_Temp_inC_530PM"><?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Max_Temp_inC->Visible) { // Max_Temp_inC ?>
		<th class="<?php echo $tbl_hmsdata_delete->Max_Temp_inC->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Max_Temp_inC" class="tbl_hmsdata_Max_Temp_inC"><?php echo $tbl_hmsdata_delete->Max_Temp_inC->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Min_Temp_inC->Visible) { // Min_Temp_inC ?>
		<th class="<?php echo $tbl_hmsdata_delete->Min_Temp_inC->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Min_Temp_inC" class="tbl_hmsdata_Min_Temp_inC"><?php echo $tbl_hmsdata_delete->Min_Temp_inC->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Total_Wind_Run_inKM_830AM->Visible) { // Total_Wind_Run_inKM_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Total_Wind_Run_inKM_830AM" class="tbl_hmsdata_Total_Wind_Run_inKM_830AM"><?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Total_Wind_Run_inKM_530PM->Visible) { // Total_Wind_Run_inKM_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Total_Wind_Run_inKM_530PM" class="tbl_hmsdata_Total_Wind_Run_inKM_530PM"><?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Average_Wind_Speed_inKM->Visible) { // Average_Wind_Speed_inKM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Average_Wind_Speed_inKM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Average_Wind_Speed_inKM" class="tbl_hmsdata_Average_Wind_Speed_inKM"><?php echo $tbl_hmsdata_delete->Average_Wind_Speed_inKM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Number_of_Hours_of_Brightsuned->Visible) { // Number_of_Hours_of_Brightsuned ?>
		<th class="<?php echo $tbl_hmsdata_delete->Number_of_Hours_of_Brightsuned->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Number_of_Hours_of_Brightsuned" class="tbl_hmsdata_Number_of_Hours_of_Brightsuned"><?php echo $tbl_hmsdata_delete->Number_of_Hours_of_Brightsuned->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Relative_Humidity_in_Precentage_830AM->Visible) { // Relative_Humidity_in_Precentage_830AM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_830AM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM" class="tbl_hmsdata_Relative_Humidity_in_Precentage_830AM"><?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_830AM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Relative_Humidity_in_Precentage_530PM->Visible) { // Relative_Humidity_in_Precentage_530PM ?>
		<th class="<?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_530PM->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM" class="tbl_hmsdata_Relative_Humidity_in_Precentage_530PM"><?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_530PM->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->obs_remarks->Visible) { // obs_remarks ?>
		<th class="<?php echo $tbl_hmsdata_delete->obs_remarks->headerCellClass() ?>"><span id="elh_tbl_hmsdata_obs_remarks" class="tbl_hmsdata_obs_remarks"><?php echo $tbl_hmsdata_delete->obs_remarks->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $tbl_hmsdata_delete->Status->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Status" class="tbl_hmsdata_Status"><?php echo $tbl_hmsdata_delete->Status->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Validated->Visible) { // Validated ?>
		<th class="<?php echo $tbl_hmsdata_delete->Validated->headerCellClass() ?>"><span id="elh_tbl_hmsdata_Validated" class="tbl_hmsdata_Validated"><?php echo $tbl_hmsdata_delete->Validated->caption() ?></span></th>
<?php } ?>
<?php if ($tbl_hmsdata_delete->isFreeze->Visible) { // isFreeze ?>
		<th class="<?php echo $tbl_hmsdata_delete->isFreeze->headerCellClass() ?>"><span id="elh_tbl_hmsdata_isFreeze" class="tbl_hmsdata_isFreeze"><?php echo $tbl_hmsdata_delete->isFreeze->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_hmsdata_delete->RecordCount = 0;
$i = 0;
while (!$tbl_hmsdata_delete->Recordset->EOF) {
	$tbl_hmsdata_delete->RecordCount++;
	$tbl_hmsdata_delete->RowCount++;

	// Set row properties
	$tbl_hmsdata->resetAttributes();
	$tbl_hmsdata->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_hmsdata_delete->loadRowValues($tbl_hmsdata_delete->Recordset);

	// Render row
	$tbl_hmsdata_delete->renderRow();
?>
	<tr <?php echo $tbl_hmsdata->rowAttributes() ?>>
<?php if ($tbl_hmsdata_delete->Slno->Visible) { // Slno ?>
		<td <?php echo $tbl_hmsdata_delete->Slno->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Slno" class="tbl_hmsdata_Slno">
<span<?php echo $tbl_hmsdata_delete->Slno->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Slno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->StationId->Visible) { // StationId ?>
		<td <?php echo $tbl_hmsdata_delete->StationId->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_StationId" class="tbl_hmsdata_StationId">
<span<?php echo $tbl_hmsdata_delete->StationId->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->StationId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->obs_DateTime->Visible) { // obs_DateTime ?>
		<td <?php echo $tbl_hmsdata_delete->obs_DateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_obs_DateTime" class="tbl_hmsdata_obs_DateTime">
<span<?php echo $tbl_hmsdata_delete->obs_DateTime->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->obs_DateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Temp_water_in_pan_inC_830AM->Visible) { // Temp_water_in_pan_inC_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Temp_water_in_pan_inC_830AM" class="tbl_hmsdata_Temp_water_in_pan_inC_830AM">
<span<?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Temp_water_in_pan_inC_530PM->Visible) { // Temp_water_in_pan_inC_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Temp_water_in_pan_inC_530PM" class="tbl_hmsdata_Temp_water_in_pan_inC_530PM">
<span<?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Temp_water_in_pan_inC_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->App_Evaporation_inMM_830AM->Visible) { // App_Evaporation_inMM_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_App_Evaporation_inMM_830AM" class="tbl_hmsdata_App_Evaporation_inMM_830AM">
<span<?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->App_Evaporation_inMM_530PM->Visible) { // App_Evaporation_inMM_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_App_Evaporation_inMM_530PM" class="tbl_hmsdata_App_Evaporation_inMM_530PM">
<span<?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->App_Evaporation_inMM_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Rainfall_inMM_830AM->Visible) { // Rainfall_inMM_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->Rainfall_inMM_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Rainfall_inMM_830AM" class="tbl_hmsdata_Rainfall_inMM_830AM">
<span<?php echo $tbl_hmsdata_delete->Rainfall_inMM_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Rainfall_inMM_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Rainfall_inMM_530PM->Visible) { // Rainfall_inMM_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->Rainfall_inMM_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Rainfall_inMM_530PM" class="tbl_hmsdata_Rainfall_inMM_530PM">
<span<?php echo $tbl_hmsdata_delete->Rainfall_inMM_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Rainfall_inMM_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Evaporation_curing_inMM_830AM->Visible) { // Evaporation_curing_inMM_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Evaporation_curing_inMM_830AM" class="tbl_hmsdata_Evaporation_curing_inMM_830AM">
<span<?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Evaporation_curing_inMM_530PM->Visible) { // Evaporation_curing_inMM_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Evaporation_curing_inMM_530PM" class="tbl_hmsdata_Evaporation_curing_inMM_530PM">
<span<?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Evaporation_curing_inMM_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Evaporation_curing_DaywithRain_inMM->Visible) { // Evaporation_curing_DaywithRain_inMM ?>
		<td <?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithRain_inMM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM" class="tbl_hmsdata_Evaporation_curing_DaywithRain_inMM">
<span<?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithRain_inMM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithRain_inMM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Evaporation_curing_DaywithNoRain_inMM->Visible) { // Evaporation_curing_DaywithNoRain_inMM ?>
		<td <?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithNoRain_inMM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM" class="tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM">
<span<?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithNoRain_inMM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Evaporation_curing_DaywithNoRain_inMM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Dry_Bulb_Temp_inC_830AM->Visible) { // Dry_Bulb_Temp_inC_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM" class="tbl_hmsdata_Dry_Bulb_Temp_inC_830AM">
<span<?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Wet_Bulb_Temp_inC_830AM->Visible) { // Wet_Bulb_Temp_inC_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM" class="tbl_hmsdata_Wet_Bulb_Temp_inC_830AM">
<span<?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Vapour_Temp_inC_830AM->Visible) { // Vapour_Temp_inC_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Vapour_Temp_inC_830AM" class="tbl_hmsdata_Vapour_Temp_inC_830AM">
<span<?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Dry_Bulb_Temp_inC_530PM->Visible) { // Dry_Bulb_Temp_inC_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM" class="tbl_hmsdata_Dry_Bulb_Temp_inC_530PM">
<span<?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Dry_Bulb_Temp_inC_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Wet_Bulb_Temp_inC_530PM->Visible) { // Wet_Bulb_Temp_inC_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM" class="tbl_hmsdata_Wet_Bulb_Temp_inC_530PM">
<span<?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Wet_Bulb_Temp_inC_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Vapour_Temp_inC_530PM->Visible) { // Vapour_Temp_inC_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Vapour_Temp_inC_530PM" class="tbl_hmsdata_Vapour_Temp_inC_530PM">
<span<?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Vapour_Temp_inC_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Max_Temp_inC->Visible) { // Max_Temp_inC ?>
		<td <?php echo $tbl_hmsdata_delete->Max_Temp_inC->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Max_Temp_inC" class="tbl_hmsdata_Max_Temp_inC">
<span<?php echo $tbl_hmsdata_delete->Max_Temp_inC->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Max_Temp_inC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Min_Temp_inC->Visible) { // Min_Temp_inC ?>
		<td <?php echo $tbl_hmsdata_delete->Min_Temp_inC->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Min_Temp_inC" class="tbl_hmsdata_Min_Temp_inC">
<span<?php echo $tbl_hmsdata_delete->Min_Temp_inC->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Min_Temp_inC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Total_Wind_Run_inKM_830AM->Visible) { // Total_Wind_Run_inKM_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Total_Wind_Run_inKM_830AM" class="tbl_hmsdata_Total_Wind_Run_inKM_830AM">
<span<?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Total_Wind_Run_inKM_530PM->Visible) { // Total_Wind_Run_inKM_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Total_Wind_Run_inKM_530PM" class="tbl_hmsdata_Total_Wind_Run_inKM_530PM">
<span<?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Total_Wind_Run_inKM_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Average_Wind_Speed_inKM->Visible) { // Average_Wind_Speed_inKM ?>
		<td <?php echo $tbl_hmsdata_delete->Average_Wind_Speed_inKM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Average_Wind_Speed_inKM" class="tbl_hmsdata_Average_Wind_Speed_inKM">
<span<?php echo $tbl_hmsdata_delete->Average_Wind_Speed_inKM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Average_Wind_Speed_inKM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Number_of_Hours_of_Brightsuned->Visible) { // Number_of_Hours_of_Brightsuned ?>
		<td <?php echo $tbl_hmsdata_delete->Number_of_Hours_of_Brightsuned->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Number_of_Hours_of_Brightsuned" class="tbl_hmsdata_Number_of_Hours_of_Brightsuned">
<span<?php echo $tbl_hmsdata_delete->Number_of_Hours_of_Brightsuned->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Number_of_Hours_of_Brightsuned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Relative_Humidity_in_Precentage_830AM->Visible) { // Relative_Humidity_in_Precentage_830AM ?>
		<td <?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_830AM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM" class="tbl_hmsdata_Relative_Humidity_in_Precentage_830AM">
<span<?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_830AM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Relative_Humidity_in_Precentage_530PM->Visible) { // Relative_Humidity_in_Precentage_530PM ?>
		<td <?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_530PM->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM" class="tbl_hmsdata_Relative_Humidity_in_Precentage_530PM">
<span<?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Relative_Humidity_in_Precentage_530PM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->obs_remarks->Visible) { // obs_remarks ?>
		<td <?php echo $tbl_hmsdata_delete->obs_remarks->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_obs_remarks" class="tbl_hmsdata_obs_remarks">
<span<?php echo $tbl_hmsdata_delete->obs_remarks->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->obs_remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Status->Visible) { // Status ?>
		<td <?php echo $tbl_hmsdata_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Status" class="tbl_hmsdata_Status">
<span<?php echo $tbl_hmsdata_delete->Status->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->Validated->Visible) { // Validated ?>
		<td <?php echo $tbl_hmsdata_delete->Validated->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_Validated" class="tbl_hmsdata_Validated">
<span<?php echo $tbl_hmsdata_delete->Validated->viewAttributes() ?>><?php echo $tbl_hmsdata_delete->Validated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tbl_hmsdata_delete->isFreeze->Visible) { // isFreeze ?>
		<td <?php echo $tbl_hmsdata_delete->isFreeze->cellAttributes() ?>>
<span id="el<?php echo $tbl_hmsdata_delete->RowCount ?>_tbl_hmsdata_isFreeze" class="tbl_hmsdata_isFreeze">
<span<?php echo $tbl_hmsdata_delete->isFreeze->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_isFreeze" class="custom-control-input" value="<?php echo $tbl_hmsdata_delete->isFreeze->getViewValue() ?>" disabled<?php if (ConvertToBool($tbl_hmsdata_delete->isFreeze->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_isFreeze"></label></div></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tbl_hmsdata_delete->Recordset->moveNext();
}
$tbl_hmsdata_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tbl_hmsdata_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tbl_hmsdata_delete->showPageFooter();
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
$tbl_hmsdata_delete->terminate();
?>