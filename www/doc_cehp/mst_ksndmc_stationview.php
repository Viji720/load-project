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
$mst_ksndmc_station_view = new mst_ksndmc_station_view();

// Run the page
$mst_ksndmc_station_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mst_ksndmc_station_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mst_ksndmc_station_view->isExport()) { ?>
<script>
var fmst_ksndmc_stationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmst_ksndmc_stationview = currentForm = new ew.Form("fmst_ksndmc_stationview", "view");
	loadjs.done("fmst_ksndmc_stationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mst_ksndmc_station_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mst_ksndmc_station_view->ExportOptions->render("body") ?>
<?php $mst_ksndmc_station_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mst_ksndmc_station_view->showPageHeader(); ?>
<?php
$mst_ksndmc_station_view->showMessage();
?>
<form name="fmst_ksndmc_stationview" id="fmst_ksndmc_stationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mst_ksndmc_station">
<input type="hidden" name="modal" value="<?php echo (int)$mst_ksndmc_station_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mst_ksndmc_station_view->Raingauge_id->Visible) { // Raingauge_id ?>
	<tr id="r_Raingauge_id">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_Raingauge_id"><?php echo $mst_ksndmc_station_view->Raingauge_id->caption() ?></span></td>
		<td data-name="Raingauge_id" <?php echo $mst_ksndmc_station_view->Raingauge_id->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_Raingauge_id">
<span<?php echo $mst_ksndmc_station_view->Raingauge_id->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->Raingauge_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->District_name->Visible) { // District_name ?>
	<tr id="r_District_name">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_District_name"><?php echo $mst_ksndmc_station_view->District_name->caption() ?></span></td>
		<td data-name="District_name" <?php echo $mst_ksndmc_station_view->District_name->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_District_name">
<span<?php echo $mst_ksndmc_station_view->District_name->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->District_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->Taluka_name->Visible) { // Taluka_name ?>
	<tr id="r_Taluka_name">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_Taluka_name"><?php echo $mst_ksndmc_station_view->Taluka_name->caption() ?></span></td>
		<td data-name="Taluka_name" <?php echo $mst_ksndmc_station_view->Taluka_name->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_Taluka_name">
<span<?php echo $mst_ksndmc_station_view->Taluka_name->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->Taluka_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->station_name->Visible) { // station_name ?>
	<tr id="r_station_name">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_station_name"><?php echo $mst_ksndmc_station_view->station_name->caption() ?></span></td>
		<td data-name="station_name" <?php echo $mst_ksndmc_station_view->station_name->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_station_name">
<span<?php echo $mst_ksndmc_station_view->station_name->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->station_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->station_latitude->Visible) { // station_latitude ?>
	<tr id="r_station_latitude">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_station_latitude"><?php echo $mst_ksndmc_station_view->station_latitude->caption() ?></span></td>
		<td data-name="station_latitude" <?php echo $mst_ksndmc_station_view->station_latitude->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_station_latitude">
<span<?php echo $mst_ksndmc_station_view->station_latitude->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->station_latitude->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->station_longitude->Visible) { // station_longitude ?>
	<tr id="r_station_longitude">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_station_longitude"><?php echo $mst_ksndmc_station_view->station_longitude->caption() ?></span></td>
		<td data-name="station_longitude" <?php echo $mst_ksndmc_station_view->station_longitude->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_station_longitude">
<span<?php echo $mst_ksndmc_station_view->station_longitude->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->station_longitude->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->kgis_district_id->Visible) { // kgis_district_id ?>
	<tr id="r_kgis_district_id">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_kgis_district_id"><?php echo $mst_ksndmc_station_view->kgis_district_id->caption() ?></span></td>
		<td data-name="kgis_district_id" <?php echo $mst_ksndmc_station_view->kgis_district_id->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_kgis_district_id">
<span<?php echo $mst_ksndmc_station_view->kgis_district_id->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->kgis_district_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->kgis_taluka_id->Visible) { // kgis_taluka_id ?>
	<tr id="r_kgis_taluka_id">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_kgis_taluka_id"><?php echo $mst_ksndmc_station_view->kgis_taluka_id->caption() ?></span></td>
		<td data-name="kgis_taluka_id" <?php echo $mst_ksndmc_station_view->kgis_taluka_id->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_kgis_taluka_id">
<span<?php echo $mst_ksndmc_station_view->kgis_taluka_id->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->kgis_taluka_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->kgis_hobli_id->Visible) { // kgis_hobli_id ?>
	<tr id="r_kgis_hobli_id">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_kgis_hobli_id"><?php echo $mst_ksndmc_station_view->kgis_hobli_id->caption() ?></span></td>
		<td data-name="kgis_hobli_id" <?php echo $mst_ksndmc_station_view->kgis_hobli_id->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_kgis_hobli_id">
<span<?php echo $mst_ksndmc_station_view->kgis_hobli_id->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->kgis_hobli_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->kgis_village_id->Visible) { // kgis_village_id ?>
	<tr id="r_kgis_village_id">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_kgis_village_id"><?php echo $mst_ksndmc_station_view->kgis_village_id->caption() ?></span></td>
		<td data-name="kgis_village_id" <?php echo $mst_ksndmc_station_view->kgis_village_id->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_kgis_village_id">
<span<?php echo $mst_ksndmc_station_view->kgis_village_id->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->kgis_village_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->kwris_basin_id->Visible) { // kwris_basin_id ?>
	<tr id="r_kwris_basin_id">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_kwris_basin_id"><?php echo $mst_ksndmc_station_view->kwris_basin_id->caption() ?></span></td>
		<td data-name="kwris_basin_id" <?php echo $mst_ksndmc_station_view->kwris_basin_id->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_kwris_basin_id">
<span<?php echo $mst_ksndmc_station_view->kwris_basin_id->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->kwris_basin_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mst_ksndmc_station_view->kwris_subbasin_id->Visible) { // kwris_subbasin_id ?>
	<tr id="r_kwris_subbasin_id">
		<td class="<?php echo $mst_ksndmc_station_view->TableLeftColumnClass ?>"><span id="elh_mst_ksndmc_station_kwris_subbasin_id"><?php echo $mst_ksndmc_station_view->kwris_subbasin_id->caption() ?></span></td>
		<td data-name="kwris_subbasin_id" <?php echo $mst_ksndmc_station_view->kwris_subbasin_id->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_kwris_subbasin_id">
<span<?php echo $mst_ksndmc_station_view->kwris_subbasin_id->viewAttributes() ?>><?php echo $mst_ksndmc_station_view->kwris_subbasin_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mst_ksndmc_station_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mst_ksndmc_station_view->isExport()) { ?>
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
$mst_ksndmc_station_view->terminate();
?>