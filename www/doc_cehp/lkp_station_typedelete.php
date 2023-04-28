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
$lkp_station_type_delete = new lkp_station_type_delete();

// Run the page
$lkp_station_type_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_station_type_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_station_typedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flkp_station_typedelete = currentForm = new ew.Form("flkp_station_typedelete", "delete");
	loadjs.done("flkp_station_typedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_station_type_delete->showPageHeader(); ?>
<?php
$lkp_station_type_delete->showMessage();
?>
<form name="flkp_station_typedelete" id="flkp_station_typedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_station_type">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lkp_station_type_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lkp_station_type_delete->station_type->Visible) { // station_type ?>
		<th class="<?php echo $lkp_station_type_delete->station_type->headerCellClass() ?>"><span id="elh_lkp_station_type_station_type" class="lkp_station_type_station_type"><?php echo $lkp_station_type_delete->station_type->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_station_type_delete->station_type_name->Visible) { // station_type_name ?>
		<th class="<?php echo $lkp_station_type_delete->station_type_name->headerCellClass() ?>"><span id="elh_lkp_station_type_station_type_name" class="lkp_station_type_station_type_name"><?php echo $lkp_station_type_delete->station_type_name->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_station_type_delete->record_count->Visible) { // record_count ?>
		<th class="<?php echo $lkp_station_type_delete->record_count->headerCellClass() ?>"><span id="elh_lkp_station_type_record_count" class="lkp_station_type_record_count"><?php echo $lkp_station_type_delete->record_count->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_station_type_delete->station_type_name_kn->Visible) { // station_type_name_kn ?>
		<th class="<?php echo $lkp_station_type_delete->station_type_name_kn->headerCellClass() ?>"><span id="elh_lkp_station_type_station_type_name_kn" class="lkp_station_type_station_type_name_kn"><?php echo $lkp_station_type_delete->station_type_name_kn->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lkp_station_type_delete->RecordCount = 0;
$i = 0;
while (!$lkp_station_type_delete->Recordset->EOF) {
	$lkp_station_type_delete->RecordCount++;
	$lkp_station_type_delete->RowCount++;

	// Set row properties
	$lkp_station_type->resetAttributes();
	$lkp_station_type->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lkp_station_type_delete->loadRowValues($lkp_station_type_delete->Recordset);

	// Render row
	$lkp_station_type_delete->renderRow();
?>
	<tr <?php echo $lkp_station_type->rowAttributes() ?>>
<?php if ($lkp_station_type_delete->station_type->Visible) { // station_type ?>
		<td <?php echo $lkp_station_type_delete->station_type->cellAttributes() ?>>
<span id="el<?php echo $lkp_station_type_delete->RowCount ?>_lkp_station_type_station_type" class="lkp_station_type_station_type">
<span<?php echo $lkp_station_type_delete->station_type->viewAttributes() ?>><?php echo $lkp_station_type_delete->station_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_station_type_delete->station_type_name->Visible) { // station_type_name ?>
		<td <?php echo $lkp_station_type_delete->station_type_name->cellAttributes() ?>>
<span id="el<?php echo $lkp_station_type_delete->RowCount ?>_lkp_station_type_station_type_name" class="lkp_station_type_station_type_name">
<span<?php echo $lkp_station_type_delete->station_type_name->viewAttributes() ?>><?php echo $lkp_station_type_delete->station_type_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_station_type_delete->record_count->Visible) { // record_count ?>
		<td <?php echo $lkp_station_type_delete->record_count->cellAttributes() ?>>
<span id="el<?php echo $lkp_station_type_delete->RowCount ?>_lkp_station_type_record_count" class="lkp_station_type_record_count">
<span<?php echo $lkp_station_type_delete->record_count->viewAttributes() ?>><?php echo $lkp_station_type_delete->record_count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_station_type_delete->station_type_name_kn->Visible) { // station_type_name_kn ?>
		<td <?php echo $lkp_station_type_delete->station_type_name_kn->cellAttributes() ?>>
<span id="el<?php echo $lkp_station_type_delete->RowCount ?>_lkp_station_type_station_type_name_kn" class="lkp_station_type_station_type_name_kn">
<span<?php echo $lkp_station_type_delete->station_type_name_kn->viewAttributes() ?>><?php echo $lkp_station_type_delete->station_type_name_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lkp_station_type_delete->Recordset->moveNext();
}
$lkp_station_type_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_station_type_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lkp_station_type_delete->showPageFooter();
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
$lkp_station_type_delete->terminate();
?>