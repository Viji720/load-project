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
$master_division_delete = new master_division_delete();

// Run the page
$master_division_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_division_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_divisiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_divisiondelete = currentForm = new ew.Form("fmaster_divisiondelete", "delete");
	loadjs.done("fmaster_divisiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_division_delete->showPageHeader(); ?>
<?php
$master_division_delete->showMessage();
?>
<form name="fmaster_divisiondelete" id="fmaster_divisiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_division">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_division_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_division_delete->divisionId->Visible) { // divisionId ?>
		<th class="<?php echo $master_division_delete->divisionId->headerCellClass() ?>"><span id="elh_master_division_divisionId" class="master_division_divisionId"><?php echo $master_division_delete->divisionId->caption() ?></span></th>
<?php } ?>
<?php if ($master_division_delete->divisionName->Visible) { // divisionName ?>
		<th class="<?php echo $master_division_delete->divisionName->headerCellClass() ?>"><span id="elh_master_division_divisionName" class="master_division_divisionName"><?php echo $master_division_delete->divisionName->caption() ?></span></th>
<?php } ?>
<?php if ($master_division_delete->divisionName_kn->Visible) { // divisionName_kn ?>
		<th class="<?php echo $master_division_delete->divisionName_kn->headerCellClass() ?>"><span id="elh_master_division_divisionName_kn" class="master_division_divisionName_kn"><?php echo $master_division_delete->divisionName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_division_delete->divisionName_hi->Visible) { // divisionName_hi ?>
		<th class="<?php echo $master_division_delete->divisionName_hi->headerCellClass() ?>"><span id="elh_master_division_divisionName_hi" class="master_division_divisionName_hi"><?php echo $master_division_delete->divisionName_hi->caption() ?></span></th>
<?php } ?>
<?php if ($master_division_delete->circleId->Visible) { // circleId ?>
		<th class="<?php echo $master_division_delete->circleId->headerCellClass() ?>"><span id="elh_master_division_circleId" class="master_division_circleId"><?php echo $master_division_delete->circleId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_division_delete->RecordCount = 0;
$i = 0;
while (!$master_division_delete->Recordset->EOF) {
	$master_division_delete->RecordCount++;
	$master_division_delete->RowCount++;

	// Set row properties
	$master_division->resetAttributes();
	$master_division->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_division_delete->loadRowValues($master_division_delete->Recordset);

	// Render row
	$master_division_delete->renderRow();
?>
	<tr <?php echo $master_division->rowAttributes() ?>>
<?php if ($master_division_delete->divisionId->Visible) { // divisionId ?>
		<td <?php echo $master_division_delete->divisionId->cellAttributes() ?>>
<span id="el<?php echo $master_division_delete->RowCount ?>_master_division_divisionId" class="master_division_divisionId">
<span<?php echo $master_division_delete->divisionId->viewAttributes() ?>><?php echo $master_division_delete->divisionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_division_delete->divisionName->Visible) { // divisionName ?>
		<td <?php echo $master_division_delete->divisionName->cellAttributes() ?>>
<span id="el<?php echo $master_division_delete->RowCount ?>_master_division_divisionName" class="master_division_divisionName">
<span<?php echo $master_division_delete->divisionName->viewAttributes() ?>><?php echo $master_division_delete->divisionName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_division_delete->divisionName_kn->Visible) { // divisionName_kn ?>
		<td <?php echo $master_division_delete->divisionName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_division_delete->RowCount ?>_master_division_divisionName_kn" class="master_division_divisionName_kn">
<span<?php echo $master_division_delete->divisionName_kn->viewAttributes() ?>><?php echo $master_division_delete->divisionName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_division_delete->divisionName_hi->Visible) { // divisionName_hi ?>
		<td <?php echo $master_division_delete->divisionName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_division_delete->RowCount ?>_master_division_divisionName_hi" class="master_division_divisionName_hi">
<span<?php echo $master_division_delete->divisionName_hi->viewAttributes() ?>><?php echo $master_division_delete->divisionName_hi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_division_delete->circleId->Visible) { // circleId ?>
		<td <?php echo $master_division_delete->circleId->cellAttributes() ?>>
<span id="el<?php echo $master_division_delete->RowCount ?>_master_division_circleId" class="master_division_circleId">
<span<?php echo $master_division_delete->circleId->viewAttributes() ?>><?php echo $master_division_delete->circleId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_division_delete->Recordset->moveNext();
}
$master_division_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_division_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_division_delete->showPageFooter();
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
$master_division_delete->terminate();
?>