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
$master_dams_delete = new master_dams_delete();

// Run the page
$master_dams_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_dams_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_damsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_damsdelete = currentForm = new ew.Form("fmaster_damsdelete", "delete");
	loadjs.done("fmaster_damsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_dams_delete->showPageHeader(); ?>
<?php
$master_dams_delete->showMessage();
?>
<form name="fmaster_damsdelete" id="fmaster_damsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_dams">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_dams_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_dams_delete->SrNo->Visible) { // SrNo ?>
		<th class="<?php echo $master_dams_delete->SrNo->headerCellClass() ?>"><span id="elh_master_dams_SrNo" class="master_dams_SrNo"><?php echo $master_dams_delete->SrNo->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->PIC->Visible) { // PIC ?>
		<th class="<?php echo $master_dams_delete->PIC->headerCellClass() ?>"><span id="elh_master_dams_PIC" class="master_dams_PIC"><?php echo $master_dams_delete->PIC->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->kpcl_ID->Visible) { // kpcl_ID ?>
		<th class="<?php echo $master_dams_delete->kpcl_ID->headerCellClass() ?>"><span id="elh_master_dams_kpcl_ID" class="master_dams_kpcl_ID"><?php echo $master_dams_delete->kpcl_ID->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Name_of_Dam->Visible) { // Name_of_Dam ?>
		<th class="<?php echo $master_dams_delete->Name_of_Dam->headerCellClass() ?>"><span id="elh_master_dams_Name_of_Dam" class="master_dams_Name_of_Dam"><?php echo $master_dams_delete->Name_of_Dam->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->kpcl_dam_name->Visible) { // kpcl_dam_name ?>
		<th class="<?php echo $master_dams_delete->kpcl_dam_name->headerCellClass() ?>"><span id="elh_master_dams_kpcl_dam_name" class="master_dams_kpcl_dam_name"><?php echo $master_dams_delete->kpcl_dam_name->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Ops_ID->Visible) { // Ops_ID ?>
		<th class="<?php echo $master_dams_delete->Ops_ID->headerCellClass() ?>"><span id="elh_master_dams_Ops_ID" class="master_dams_Ops_ID"><?php echo $master_dams_delete->Ops_ID->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->dam_size_type_ID->Visible) { // dam_size_type_ID ?>
		<th class="<?php echo $master_dams_delete->dam_size_type_ID->headerCellClass() ?>"><span id="elh_master_dams_dam_size_type_ID" class="master_dams_dam_size_type_ID"><?php echo $master_dams_delete->dam_size_type_ID->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->dam_Longitude->Visible) { // dam_Longitude ?>
		<th class="<?php echo $master_dams_delete->dam_Longitude->headerCellClass() ?>"><span id="elh_master_dams_dam_Longitude" class="master_dams_dam_Longitude"><?php echo $master_dams_delete->dam_Longitude->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->dam_Latitude->Visible) { // dam_Latitude ?>
		<th class="<?php echo $master_dams_delete->dam_Latitude->headerCellClass() ?>"><span id="elh_master_dams_dam_Latitude" class="master_dams_dam_Latitude"><?php echo $master_dams_delete->dam_Latitude->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Year_of_Completion->Visible) { // Year_of_Completion ?>
		<th class="<?php echo $master_dams_delete->Year_of_Completion->headerCellClass() ?>"><span id="elh_master_dams_Year_of_Completion" class="master_dams_Year_of_Completion"><?php echo $master_dams_delete->Year_of_Completion->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Basin->Visible) { // Basin ?>
		<th class="<?php echo $master_dams_delete->Basin->headerCellClass() ?>"><span id="elh_master_dams_Basin" class="master_dams_Basin"><?php echo $master_dams_delete->Basin->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Sub_Basin->Visible) { // Sub-Basin ?>
		<th class="<?php echo $master_dams_delete->Sub_Basin->headerCellClass() ?>"><span id="elh_master_dams_Sub_Basin" class="master_dams_Sub_Basin"><?php echo $master_dams_delete->Sub_Basin->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->district->Visible) { // district ?>
		<th class="<?php echo $master_dams_delete->district->headerCellClass() ?>"><span id="elh_master_dams_district" class="master_dams_district"><?php echo $master_dams_delete->district->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Taluka->Visible) { // Taluka ?>
		<th class="<?php echo $master_dams_delete->Taluka->headerCellClass() ?>"><span id="elh_master_dams_Taluka" class="master_dams_Taluka"><?php echo $master_dams_delete->Taluka->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->River->Visible) { // River ?>
		<th class="<?php echo $master_dams_delete->River->headerCellClass() ?>"><span id="elh_master_dams_River" class="master_dams_River"><?php echo $master_dams_delete->River->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Neareast_City->Visible) { // Neareast_City ?>
		<th class="<?php echo $master_dams_delete->Neareast_City->headerCellClass() ?>"><span id="elh_master_dams_Neareast_City" class="master_dams_Neareast_City"><?php echo $master_dams_delete->Neareast_City->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->dam_construction_type->Visible) { // dam_construction_type ?>
		<th class="<?php echo $master_dams_delete->dam_construction_type->headerCellClass() ?>"><span id="elh_master_dams_dam_construction_type" class="master_dams_dam_construction_type"><?php echo $master_dams_delete->dam_construction_type->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Height_above_Lowest_Foundation_Level_in_mtr->Visible) { // Height_above_Lowest_Foundation_Level_in_mtr ?>
		<th class="<?php echo $master_dams_delete->Height_above_Lowest_Foundation_Level_in_mtr->headerCellClass() ?>"><span id="elh_master_dams_Height_above_Lowest_Foundation_Level_in_mtr" class="master_dams_Height_above_Lowest_Foundation_Level_in_mtr"><?php echo $master_dams_delete->Height_above_Lowest_Foundation_Level_in_mtr->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Length_of_Dam_in_mtr->Visible) { // Length_of_Dam_in_mtr ?>
		<th class="<?php echo $master_dams_delete->Length_of_Dam_in_mtr->headerCellClass() ?>"><span id="elh_master_dams_Length_of_Dam_in_mtr" class="master_dams_Length_of_Dam_in_mtr"><?php echo $master_dams_delete->Length_of_Dam_in_mtr->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Volume_Content_of_Dam_in_MCM->Visible) { // Volume_Content_of_Dam_in_MCM ?>
		<th class="<?php echo $master_dams_delete->Volume_Content_of_Dam_in_MCM->headerCellClass() ?>"><span id="elh_master_dams_Volume_Content_of_Dam_in_MCM" class="master_dams_Volume_Content_of_Dam_in_MCM"><?php echo $master_dams_delete->Volume_Content_of_Dam_in_MCM->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Gross_Storage_Capacity_of_Dam_in_MCM->Visible) { // Gross_Storage_Capacity_of_Dam_in_MCM ?>
		<th class="<?php echo $master_dams_delete->Gross_Storage_Capacity_of_Dam_in_MCM->headerCellClass() ?>"><span id="elh_master_dams_Gross_Storage_Capacity_of_Dam_in_MCM" class="master_dams_Gross_Storage_Capacity_of_Dam_in_MCM"><?php echo $master_dams_delete->Gross_Storage_Capacity_of_Dam_in_MCM->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Reservoir_Area_in_sq_km->Visible) { // Reservoir_Area_in_sq_km ?>
		<th class="<?php echo $master_dams_delete->Reservoir_Area_in_sq_km->headerCellClass() ?>"><span id="elh_master_dams_Reservoir_Area_in_sq_km" class="master_dams_Reservoir_Area_in_sq_km"><?php echo $master_dams_delete->Reservoir_Area_in_sq_km->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Effective_Storage_Capacity_in_MCM->Visible) { // Effective_Storage_Capacity_in_MCM ?>
		<th class="<?php echo $master_dams_delete->Effective_Storage_Capacity_in_MCM->headerCellClass() ?>"><span id="elh_master_dams_Effective_Storage_Capacity_in_MCM" class="master_dams_Effective_Storage_Capacity_in_MCM"><?php echo $master_dams_delete->Effective_Storage_Capacity_in_MCM->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Purpose->Visible) { // Purpose ?>
		<th class="<?php echo $master_dams_delete->Purpose->headerCellClass() ?>"><span id="elh_master_dams_Purpose" class="master_dams_Purpose"><?php echo $master_dams_delete->Purpose->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->Designed_Spillway_Capacity_in_M3_per_sec->Visible) { // Designed_Spillway_Capacity_in_M3_per_sec ?>
		<th class="<?php echo $master_dams_delete->Designed_Spillway_Capacity_in_M3_per_sec->headerCellClass() ?>"><span id="elh_master_dams_Designed_Spillway_Capacity_in_M3_per_sec" class="master_dams_Designed_Spillway_Capacity_in_M3_per_sec"><?php echo $master_dams_delete->Designed_Spillway_Capacity_in_M3_per_sec->caption() ?></span></th>
<?php } ?>
<?php if ($master_dams_delete->dam_construction_type_ID->Visible) { // dam_construction_type_ID ?>
		<th class="<?php echo $master_dams_delete->dam_construction_type_ID->headerCellClass() ?>"><span id="elh_master_dams_dam_construction_type_ID" class="master_dams_dam_construction_type_ID"><?php echo $master_dams_delete->dam_construction_type_ID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_dams_delete->RecordCount = 0;
$i = 0;
while (!$master_dams_delete->Recordset->EOF) {
	$master_dams_delete->RecordCount++;
	$master_dams_delete->RowCount++;

	// Set row properties
	$master_dams->resetAttributes();
	$master_dams->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_dams_delete->loadRowValues($master_dams_delete->Recordset);

	// Render row
	$master_dams_delete->renderRow();
?>
	<tr <?php echo $master_dams->rowAttributes() ?>>
<?php if ($master_dams_delete->SrNo->Visible) { // SrNo ?>
		<td <?php echo $master_dams_delete->SrNo->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_SrNo" class="master_dams_SrNo">
<span<?php echo $master_dams_delete->SrNo->viewAttributes() ?>><?php echo $master_dams_delete->SrNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->PIC->Visible) { // PIC ?>
		<td <?php echo $master_dams_delete->PIC->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_PIC" class="master_dams_PIC">
<span<?php echo $master_dams_delete->PIC->viewAttributes() ?>><?php echo $master_dams_delete->PIC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->kpcl_ID->Visible) { // kpcl_ID ?>
		<td <?php echo $master_dams_delete->kpcl_ID->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_kpcl_ID" class="master_dams_kpcl_ID">
<span<?php echo $master_dams_delete->kpcl_ID->viewAttributes() ?>><?php echo $master_dams_delete->kpcl_ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Name_of_Dam->Visible) { // Name_of_Dam ?>
		<td <?php echo $master_dams_delete->Name_of_Dam->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Name_of_Dam" class="master_dams_Name_of_Dam">
<span<?php echo $master_dams_delete->Name_of_Dam->viewAttributes() ?>><?php echo $master_dams_delete->Name_of_Dam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->kpcl_dam_name->Visible) { // kpcl_dam_name ?>
		<td <?php echo $master_dams_delete->kpcl_dam_name->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_kpcl_dam_name" class="master_dams_kpcl_dam_name">
<span<?php echo $master_dams_delete->kpcl_dam_name->viewAttributes() ?>><?php echo $master_dams_delete->kpcl_dam_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Ops_ID->Visible) { // Ops_ID ?>
		<td <?php echo $master_dams_delete->Ops_ID->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Ops_ID" class="master_dams_Ops_ID">
<span<?php echo $master_dams_delete->Ops_ID->viewAttributes() ?>><?php echo $master_dams_delete->Ops_ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->dam_size_type_ID->Visible) { // dam_size_type_ID ?>
		<td <?php echo $master_dams_delete->dam_size_type_ID->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_dam_size_type_ID" class="master_dams_dam_size_type_ID">
<span<?php echo $master_dams_delete->dam_size_type_ID->viewAttributes() ?>><?php echo $master_dams_delete->dam_size_type_ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->dam_Longitude->Visible) { // dam_Longitude ?>
		<td <?php echo $master_dams_delete->dam_Longitude->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_dam_Longitude" class="master_dams_dam_Longitude">
<span<?php echo $master_dams_delete->dam_Longitude->viewAttributes() ?>><?php echo $master_dams_delete->dam_Longitude->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->dam_Latitude->Visible) { // dam_Latitude ?>
		<td <?php echo $master_dams_delete->dam_Latitude->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_dam_Latitude" class="master_dams_dam_Latitude">
<span<?php echo $master_dams_delete->dam_Latitude->viewAttributes() ?>><?php echo $master_dams_delete->dam_Latitude->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Year_of_Completion->Visible) { // Year_of_Completion ?>
		<td <?php echo $master_dams_delete->Year_of_Completion->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Year_of_Completion" class="master_dams_Year_of_Completion">
<span<?php echo $master_dams_delete->Year_of_Completion->viewAttributes() ?>><?php echo $master_dams_delete->Year_of_Completion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Basin->Visible) { // Basin ?>
		<td <?php echo $master_dams_delete->Basin->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Basin" class="master_dams_Basin">
<span<?php echo $master_dams_delete->Basin->viewAttributes() ?>><?php echo $master_dams_delete->Basin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Sub_Basin->Visible) { // Sub-Basin ?>
		<td <?php echo $master_dams_delete->Sub_Basin->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Sub_Basin" class="master_dams_Sub_Basin">
<span<?php echo $master_dams_delete->Sub_Basin->viewAttributes() ?>><?php echo $master_dams_delete->Sub_Basin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->district->Visible) { // district ?>
		<td <?php echo $master_dams_delete->district->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_district" class="master_dams_district">
<span<?php echo $master_dams_delete->district->viewAttributes() ?>><?php echo $master_dams_delete->district->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Taluka->Visible) { // Taluka ?>
		<td <?php echo $master_dams_delete->Taluka->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Taluka" class="master_dams_Taluka">
<span<?php echo $master_dams_delete->Taluka->viewAttributes() ?>><?php echo $master_dams_delete->Taluka->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->River->Visible) { // River ?>
		<td <?php echo $master_dams_delete->River->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_River" class="master_dams_River">
<span<?php echo $master_dams_delete->River->viewAttributes() ?>><?php echo $master_dams_delete->River->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Neareast_City->Visible) { // Neareast_City ?>
		<td <?php echo $master_dams_delete->Neareast_City->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Neareast_City" class="master_dams_Neareast_City">
<span<?php echo $master_dams_delete->Neareast_City->viewAttributes() ?>><?php echo $master_dams_delete->Neareast_City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->dam_construction_type->Visible) { // dam_construction_type ?>
		<td <?php echo $master_dams_delete->dam_construction_type->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_dam_construction_type" class="master_dams_dam_construction_type">
<span<?php echo $master_dams_delete->dam_construction_type->viewAttributes() ?>><?php echo $master_dams_delete->dam_construction_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Height_above_Lowest_Foundation_Level_in_mtr->Visible) { // Height_above_Lowest_Foundation_Level_in_mtr ?>
		<td <?php echo $master_dams_delete->Height_above_Lowest_Foundation_Level_in_mtr->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Height_above_Lowest_Foundation_Level_in_mtr" class="master_dams_Height_above_Lowest_Foundation_Level_in_mtr">
<span<?php echo $master_dams_delete->Height_above_Lowest_Foundation_Level_in_mtr->viewAttributes() ?>><?php echo $master_dams_delete->Height_above_Lowest_Foundation_Level_in_mtr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Length_of_Dam_in_mtr->Visible) { // Length_of_Dam_in_mtr ?>
		<td <?php echo $master_dams_delete->Length_of_Dam_in_mtr->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Length_of_Dam_in_mtr" class="master_dams_Length_of_Dam_in_mtr">
<span<?php echo $master_dams_delete->Length_of_Dam_in_mtr->viewAttributes() ?>><?php echo $master_dams_delete->Length_of_Dam_in_mtr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Volume_Content_of_Dam_in_MCM->Visible) { // Volume_Content_of_Dam_in_MCM ?>
		<td <?php echo $master_dams_delete->Volume_Content_of_Dam_in_MCM->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Volume_Content_of_Dam_in_MCM" class="master_dams_Volume_Content_of_Dam_in_MCM">
<span<?php echo $master_dams_delete->Volume_Content_of_Dam_in_MCM->viewAttributes() ?>><?php echo $master_dams_delete->Volume_Content_of_Dam_in_MCM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Gross_Storage_Capacity_of_Dam_in_MCM->Visible) { // Gross_Storage_Capacity_of_Dam_in_MCM ?>
		<td <?php echo $master_dams_delete->Gross_Storage_Capacity_of_Dam_in_MCM->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Gross_Storage_Capacity_of_Dam_in_MCM" class="master_dams_Gross_Storage_Capacity_of_Dam_in_MCM">
<span<?php echo $master_dams_delete->Gross_Storage_Capacity_of_Dam_in_MCM->viewAttributes() ?>><?php echo $master_dams_delete->Gross_Storage_Capacity_of_Dam_in_MCM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Reservoir_Area_in_sq_km->Visible) { // Reservoir_Area_in_sq_km ?>
		<td <?php echo $master_dams_delete->Reservoir_Area_in_sq_km->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Reservoir_Area_in_sq_km" class="master_dams_Reservoir_Area_in_sq_km">
<span<?php echo $master_dams_delete->Reservoir_Area_in_sq_km->viewAttributes() ?>><?php echo $master_dams_delete->Reservoir_Area_in_sq_km->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Effective_Storage_Capacity_in_MCM->Visible) { // Effective_Storage_Capacity_in_MCM ?>
		<td <?php echo $master_dams_delete->Effective_Storage_Capacity_in_MCM->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Effective_Storage_Capacity_in_MCM" class="master_dams_Effective_Storage_Capacity_in_MCM">
<span<?php echo $master_dams_delete->Effective_Storage_Capacity_in_MCM->viewAttributes() ?>><?php echo $master_dams_delete->Effective_Storage_Capacity_in_MCM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Purpose->Visible) { // Purpose ?>
		<td <?php echo $master_dams_delete->Purpose->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Purpose" class="master_dams_Purpose">
<span<?php echo $master_dams_delete->Purpose->viewAttributes() ?>><?php echo $master_dams_delete->Purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->Designed_Spillway_Capacity_in_M3_per_sec->Visible) { // Designed_Spillway_Capacity_in_M3_per_sec ?>
		<td <?php echo $master_dams_delete->Designed_Spillway_Capacity_in_M3_per_sec->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_Designed_Spillway_Capacity_in_M3_per_sec" class="master_dams_Designed_Spillway_Capacity_in_M3_per_sec">
<span<?php echo $master_dams_delete->Designed_Spillway_Capacity_in_M3_per_sec->viewAttributes() ?>><?php echo $master_dams_delete->Designed_Spillway_Capacity_in_M3_per_sec->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_dams_delete->dam_construction_type_ID->Visible) { // dam_construction_type_ID ?>
		<td <?php echo $master_dams_delete->dam_construction_type_ID->cellAttributes() ?>>
<span id="el<?php echo $master_dams_delete->RowCount ?>_master_dams_dam_construction_type_ID" class="master_dams_dam_construction_type_ID">
<span<?php echo $master_dams_delete->dam_construction_type_ID->viewAttributes() ?>><?php echo $master_dams_delete->dam_construction_type_ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_dams_delete->Recordset->moveNext();
}
$master_dams_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_dams_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_dams_delete->showPageFooter();
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
$master_dams_delete->terminate();
?>