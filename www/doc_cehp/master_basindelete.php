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
$master_basin_delete = new master_basin_delete();

// Run the page
$master_basin_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_basin_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_basindelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_basindelete = currentForm = new ew.Form("fmaster_basindelete", "delete");
	loadjs.done("fmaster_basindelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_basin_delete->showPageHeader(); ?>
<?php
$master_basin_delete->showMessage();
?>
<form name="fmaster_basindelete" id="fmaster_basindelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_basin">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_basin_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_basin_delete->BasinId->Visible) { // BasinId ?>
		<th class="<?php echo $master_basin_delete->BasinId->headerCellClass() ?>"><span id="elh_master_basin_BasinId" class="master_basin_BasinId"><?php echo $master_basin_delete->BasinId->caption() ?></span></th>
<?php } ?>
<?php if ($master_basin_delete->BasinName->Visible) { // BasinName ?>
		<th class="<?php echo $master_basin_delete->BasinName->headerCellClass() ?>"><span id="elh_master_basin_BasinName" class="master_basin_BasinName"><?php echo $master_basin_delete->BasinName->caption() ?></span></th>
<?php } ?>
<?php if ($master_basin_delete->BasinName_kn->Visible) { // BasinName_kn ?>
		<th class="<?php echo $master_basin_delete->BasinName_kn->headerCellClass() ?>"><span id="elh_master_basin_BasinName_kn" class="master_basin_BasinName_kn"><?php echo $master_basin_delete->BasinName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_basin_delete->BasinName_hi->Visible) { // BasinName_hi ?>
		<th class="<?php echo $master_basin_delete->BasinName_hi->headerCellClass() ?>"><span id="elh_master_basin_BasinName_hi" class="master_basin_BasinName_hi"><?php echo $master_basin_delete->BasinName_hi->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_basin_delete->RecordCount = 0;
$i = 0;
while (!$master_basin_delete->Recordset->EOF) {
	$master_basin_delete->RecordCount++;
	$master_basin_delete->RowCount++;

	// Set row properties
	$master_basin->resetAttributes();
	$master_basin->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_basin_delete->loadRowValues($master_basin_delete->Recordset);

	// Render row
	$master_basin_delete->renderRow();
?>
	<tr <?php echo $master_basin->rowAttributes() ?>>
<?php if ($master_basin_delete->BasinId->Visible) { // BasinId ?>
		<td <?php echo $master_basin_delete->BasinId->cellAttributes() ?>>
<span id="el<?php echo $master_basin_delete->RowCount ?>_master_basin_BasinId" class="master_basin_BasinId">
<span<?php echo $master_basin_delete->BasinId->viewAttributes() ?>><?php echo $master_basin_delete->BasinId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_basin_delete->BasinName->Visible) { // BasinName ?>
		<td <?php echo $master_basin_delete->BasinName->cellAttributes() ?>>
<span id="el<?php echo $master_basin_delete->RowCount ?>_master_basin_BasinName" class="master_basin_BasinName">
<span<?php echo $master_basin_delete->BasinName->viewAttributes() ?>><?php echo $master_basin_delete->BasinName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_basin_delete->BasinName_kn->Visible) { // BasinName_kn ?>
		<td <?php echo $master_basin_delete->BasinName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_basin_delete->RowCount ?>_master_basin_BasinName_kn" class="master_basin_BasinName_kn">
<span<?php echo $master_basin_delete->BasinName_kn->viewAttributes() ?>><?php echo $master_basin_delete->BasinName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_basin_delete->BasinName_hi->Visible) { // BasinName_hi ?>
		<td <?php echo $master_basin_delete->BasinName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_basin_delete->RowCount ?>_master_basin_BasinName_hi" class="master_basin_BasinName_hi">
<span<?php echo $master_basin_delete->BasinName_hi->viewAttributes() ?>><?php echo $master_basin_delete->BasinName_hi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_basin_delete->Recordset->moveNext();
}
$master_basin_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_basin_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_basin_delete->showPageFooter();
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
$master_basin_delete->terminate();
?>