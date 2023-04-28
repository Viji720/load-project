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
$master_river_delete = new master_river_delete();

// Run the page
$master_river_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_river_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_riverdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_riverdelete = currentForm = new ew.Form("fmaster_riverdelete", "delete");
	loadjs.done("fmaster_riverdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_river_delete->showPageHeader(); ?>
<?php
$master_river_delete->showMessage();
?>
<form name="fmaster_riverdelete" id="fmaster_riverdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_river">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_river_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_river_delete->RiverId->Visible) { // RiverId ?>
		<th class="<?php echo $master_river_delete->RiverId->headerCellClass() ?>"><span id="elh_master_river_RiverId" class="master_river_RiverId"><?php echo $master_river_delete->RiverId->caption() ?></span></th>
<?php } ?>
<?php if ($master_river_delete->RiverName->Visible) { // RiverName ?>
		<th class="<?php echo $master_river_delete->RiverName->headerCellClass() ?>"><span id="elh_master_river_RiverName" class="master_river_RiverName"><?php echo $master_river_delete->RiverName->caption() ?></span></th>
<?php } ?>
<?php if ($master_river_delete->RiverName_kn->Visible) { // RiverName_kn ?>
		<th class="<?php echo $master_river_delete->RiverName_kn->headerCellClass() ?>"><span id="elh_master_river_RiverName_kn" class="master_river_RiverName_kn"><?php echo $master_river_delete->RiverName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_river_delete->RiverName_hi->Visible) { // RiverName_hi ?>
		<th class="<?php echo $master_river_delete->RiverName_hi->headerCellClass() ?>"><span id="elh_master_river_RiverName_hi" class="master_river_RiverName_hi"><?php echo $master_river_delete->RiverName_hi->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_river_delete->RecordCount = 0;
$i = 0;
while (!$master_river_delete->Recordset->EOF) {
	$master_river_delete->RecordCount++;
	$master_river_delete->RowCount++;

	// Set row properties
	$master_river->resetAttributes();
	$master_river->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_river_delete->loadRowValues($master_river_delete->Recordset);

	// Render row
	$master_river_delete->renderRow();
?>
	<tr <?php echo $master_river->rowAttributes() ?>>
<?php if ($master_river_delete->RiverId->Visible) { // RiverId ?>
		<td <?php echo $master_river_delete->RiverId->cellAttributes() ?>>
<span id="el<?php echo $master_river_delete->RowCount ?>_master_river_RiverId" class="master_river_RiverId">
<span<?php echo $master_river_delete->RiverId->viewAttributes() ?>><?php echo $master_river_delete->RiverId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_river_delete->RiverName->Visible) { // RiverName ?>
		<td <?php echo $master_river_delete->RiverName->cellAttributes() ?>>
<span id="el<?php echo $master_river_delete->RowCount ?>_master_river_RiverName" class="master_river_RiverName">
<span<?php echo $master_river_delete->RiverName->viewAttributes() ?>><?php echo $master_river_delete->RiverName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_river_delete->RiverName_kn->Visible) { // RiverName_kn ?>
		<td <?php echo $master_river_delete->RiverName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_river_delete->RowCount ?>_master_river_RiverName_kn" class="master_river_RiverName_kn">
<span<?php echo $master_river_delete->RiverName_kn->viewAttributes() ?>><?php echo $master_river_delete->RiverName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_river_delete->RiverName_hi->Visible) { // RiverName_hi ?>
		<td <?php echo $master_river_delete->RiverName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_river_delete->RowCount ?>_master_river_RiverName_hi" class="master_river_RiverName_hi">
<span<?php echo $master_river_delete->RiverName_hi->viewAttributes() ?>><?php echo $master_river_delete->RiverName_hi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_river_delete->Recordset->moveNext();
}
$master_river_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_river_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_river_delete->showPageFooter();
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
$master_river_delete->terminate();
?>