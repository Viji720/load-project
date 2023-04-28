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
$master_subbasin_delete = new master_subbasin_delete();

// Run the page
$master_subbasin_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_subbasin_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_subbasindelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_subbasindelete = currentForm = new ew.Form("fmaster_subbasindelete", "delete");
	loadjs.done("fmaster_subbasindelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_subbasin_delete->showPageHeader(); ?>
<?php
$master_subbasin_delete->showMessage();
?>
<form name="fmaster_subbasindelete" id="fmaster_subbasindelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_subbasin">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_subbasin_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_subbasin_delete->SubBasinId->Visible) { // SubBasinId ?>
		<th class="<?php echo $master_subbasin_delete->SubBasinId->headerCellClass() ?>"><span id="elh_master_subbasin_SubBasinId" class="master_subbasin_SubBasinId"><?php echo $master_subbasin_delete->SubBasinId->caption() ?></span></th>
<?php } ?>
<?php if ($master_subbasin_delete->SubBasinName->Visible) { // SubBasinName ?>
		<th class="<?php echo $master_subbasin_delete->SubBasinName->headerCellClass() ?>"><span id="elh_master_subbasin_SubBasinName" class="master_subbasin_SubBasinName"><?php echo $master_subbasin_delete->SubBasinName->caption() ?></span></th>
<?php } ?>
<?php if ($master_subbasin_delete->SubBasinName_kn->Visible) { // SubBasinName_kn ?>
		<th class="<?php echo $master_subbasin_delete->SubBasinName_kn->headerCellClass() ?>"><span id="elh_master_subbasin_SubBasinName_kn" class="master_subbasin_SubBasinName_kn"><?php echo $master_subbasin_delete->SubBasinName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_subbasin_delete->SubBasinName_hi->Visible) { // SubBasinName_hi ?>
		<th class="<?php echo $master_subbasin_delete->SubBasinName_hi->headerCellClass() ?>"><span id="elh_master_subbasin_SubBasinName_hi" class="master_subbasin_SubBasinName_hi"><?php echo $master_subbasin_delete->SubBasinName_hi->caption() ?></span></th>
<?php } ?>
<?php if ($master_subbasin_delete->BasinId->Visible) { // BasinId ?>
		<th class="<?php echo $master_subbasin_delete->BasinId->headerCellClass() ?>"><span id="elh_master_subbasin_BasinId" class="master_subbasin_BasinId"><?php echo $master_subbasin_delete->BasinId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_subbasin_delete->RecordCount = 0;
$i = 0;
while (!$master_subbasin_delete->Recordset->EOF) {
	$master_subbasin_delete->RecordCount++;
	$master_subbasin_delete->RowCount++;

	// Set row properties
	$master_subbasin->resetAttributes();
	$master_subbasin->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_subbasin_delete->loadRowValues($master_subbasin_delete->Recordset);

	// Render row
	$master_subbasin_delete->renderRow();
?>
	<tr <?php echo $master_subbasin->rowAttributes() ?>>
<?php if ($master_subbasin_delete->SubBasinId->Visible) { // SubBasinId ?>
		<td <?php echo $master_subbasin_delete->SubBasinId->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_delete->RowCount ?>_master_subbasin_SubBasinId" class="master_subbasin_SubBasinId">
<span<?php echo $master_subbasin_delete->SubBasinId->viewAttributes() ?>><?php echo $master_subbasin_delete->SubBasinId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_subbasin_delete->SubBasinName->Visible) { // SubBasinName ?>
		<td <?php echo $master_subbasin_delete->SubBasinName->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_delete->RowCount ?>_master_subbasin_SubBasinName" class="master_subbasin_SubBasinName">
<span<?php echo $master_subbasin_delete->SubBasinName->viewAttributes() ?>><?php echo $master_subbasin_delete->SubBasinName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_subbasin_delete->SubBasinName_kn->Visible) { // SubBasinName_kn ?>
		<td <?php echo $master_subbasin_delete->SubBasinName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_delete->RowCount ?>_master_subbasin_SubBasinName_kn" class="master_subbasin_SubBasinName_kn">
<span<?php echo $master_subbasin_delete->SubBasinName_kn->viewAttributes() ?>><?php echo $master_subbasin_delete->SubBasinName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_subbasin_delete->SubBasinName_hi->Visible) { // SubBasinName_hi ?>
		<td <?php echo $master_subbasin_delete->SubBasinName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_delete->RowCount ?>_master_subbasin_SubBasinName_hi" class="master_subbasin_SubBasinName_hi">
<span<?php echo $master_subbasin_delete->SubBasinName_hi->viewAttributes() ?>><?php echo $master_subbasin_delete->SubBasinName_hi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_subbasin_delete->BasinId->Visible) { // BasinId ?>
		<td <?php echo $master_subbasin_delete->BasinId->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_delete->RowCount ?>_master_subbasin_BasinId" class="master_subbasin_BasinId">
<span<?php echo $master_subbasin_delete->BasinId->viewAttributes() ?>><?php echo $master_subbasin_delete->BasinId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_subbasin_delete->Recordset->moveNext();
}
$master_subbasin_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_subbasin_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_subbasin_delete->showPageFooter();
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
$master_subbasin_delete->terminate();
?>