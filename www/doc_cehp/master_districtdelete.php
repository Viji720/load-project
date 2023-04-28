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
$master_district_delete = new master_district_delete();

// Run the page
$master_district_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_district_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_districtdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_districtdelete = currentForm = new ew.Form("fmaster_districtdelete", "delete");
	loadjs.done("fmaster_districtdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_district_delete->showPageHeader(); ?>
<?php
$master_district_delete->showMessage();
?>
<form name="fmaster_districtdelete" id="fmaster_districtdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_district">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_district_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_district_delete->DistrictId->Visible) { // DistrictId ?>
		<th class="<?php echo $master_district_delete->DistrictId->headerCellClass() ?>"><span id="elh_master_district_DistrictId" class="master_district_DistrictId"><?php echo $master_district_delete->DistrictId->caption() ?></span></th>
<?php } ?>
<?php if ($master_district_delete->DistrictName->Visible) { // DistrictName ?>
		<th class="<?php echo $master_district_delete->DistrictName->headerCellClass() ?>"><span id="elh_master_district_DistrictName" class="master_district_DistrictName"><?php echo $master_district_delete->DistrictName->caption() ?></span></th>
<?php } ?>
<?php if ($master_district_delete->DistrictName_kn->Visible) { // DistrictName_kn ?>
		<th class="<?php echo $master_district_delete->DistrictName_kn->headerCellClass() ?>"><span id="elh_master_district_DistrictName_kn" class="master_district_DistrictName_kn"><?php echo $master_district_delete->DistrictName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_district_delete->DistrictName_hi->Visible) { // DistrictName_hi ?>
		<th class="<?php echo $master_district_delete->DistrictName_hi->headerCellClass() ?>"><span id="elh_master_district_DistrictName_hi" class="master_district_DistrictName_hi"><?php echo $master_district_delete->DistrictName_hi->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_district_delete->RecordCount = 0;
$i = 0;
while (!$master_district_delete->Recordset->EOF) {
	$master_district_delete->RecordCount++;
	$master_district_delete->RowCount++;

	// Set row properties
	$master_district->resetAttributes();
	$master_district->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_district_delete->loadRowValues($master_district_delete->Recordset);

	// Render row
	$master_district_delete->renderRow();
?>
	<tr <?php echo $master_district->rowAttributes() ?>>
<?php if ($master_district_delete->DistrictId->Visible) { // DistrictId ?>
		<td <?php echo $master_district_delete->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $master_district_delete->RowCount ?>_master_district_DistrictId" class="master_district_DistrictId">
<span<?php echo $master_district_delete->DistrictId->viewAttributes() ?>><?php echo $master_district_delete->DistrictId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_district_delete->DistrictName->Visible) { // DistrictName ?>
		<td <?php echo $master_district_delete->DistrictName->cellAttributes() ?>>
<span id="el<?php echo $master_district_delete->RowCount ?>_master_district_DistrictName" class="master_district_DistrictName">
<span<?php echo $master_district_delete->DistrictName->viewAttributes() ?>><?php echo $master_district_delete->DistrictName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_district_delete->DistrictName_kn->Visible) { // DistrictName_kn ?>
		<td <?php echo $master_district_delete->DistrictName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_district_delete->RowCount ?>_master_district_DistrictName_kn" class="master_district_DistrictName_kn">
<span<?php echo $master_district_delete->DistrictName_kn->viewAttributes() ?>><?php echo $master_district_delete->DistrictName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_district_delete->DistrictName_hi->Visible) { // DistrictName_hi ?>
		<td <?php echo $master_district_delete->DistrictName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_district_delete->RowCount ?>_master_district_DistrictName_hi" class="master_district_DistrictName_hi">
<span<?php echo $master_district_delete->DistrictName_hi->viewAttributes() ?>><?php echo $master_district_delete->DistrictName_hi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_district_delete->Recordset->moveNext();
}
$master_district_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_district_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_district_delete->showPageFooter();
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
$master_district_delete->terminate();
?>