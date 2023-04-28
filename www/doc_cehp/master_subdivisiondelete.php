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
$master_subdivision_delete = new master_subdivision_delete();

// Run the page
$master_subdivision_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_subdivision_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_subdivisiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_subdivisiondelete = currentForm = new ew.Form("fmaster_subdivisiondelete", "delete");
	loadjs.done("fmaster_subdivisiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_subdivision_delete->showPageHeader(); ?>
<?php
$master_subdivision_delete->showMessage();
?>
<form name="fmaster_subdivisiondelete" id="fmaster_subdivisiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_subdivision">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_subdivision_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_subdivision_delete->SubDivisionId->Visible) { // SubDivisionId ?>
		<th class="<?php echo $master_subdivision_delete->SubDivisionId->headerCellClass() ?>"><span id="elh_master_subdivision_SubDivisionId" class="master_subdivision_SubDivisionId"><?php echo $master_subdivision_delete->SubDivisionId->caption() ?></span></th>
<?php } ?>
<?php if ($master_subdivision_delete->SubDivisionName->Visible) { // SubDivisionName ?>
		<th class="<?php echo $master_subdivision_delete->SubDivisionName->headerCellClass() ?>"><span id="elh_master_subdivision_SubDivisionName" class="master_subdivision_SubDivisionName"><?php echo $master_subdivision_delete->SubDivisionName->caption() ?></span></th>
<?php } ?>
<?php if ($master_subdivision_delete->SubDivisionName_kn->Visible) { // SubDivisionName_kn ?>
		<th class="<?php echo $master_subdivision_delete->SubDivisionName_kn->headerCellClass() ?>"><span id="elh_master_subdivision_SubDivisionName_kn" class="master_subdivision_SubDivisionName_kn"><?php echo $master_subdivision_delete->SubDivisionName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_subdivision_delete->divisionid->Visible) { // divisionid ?>
		<th class="<?php echo $master_subdivision_delete->divisionid->headerCellClass() ?>"><span id="elh_master_subdivision_divisionid" class="master_subdivision_divisionid"><?php echo $master_subdivision_delete->divisionid->caption() ?></span></th>
<?php } ?>
<?php if ($master_subdivision_delete->circleId->Visible) { // circleId ?>
		<th class="<?php echo $master_subdivision_delete->circleId->headerCellClass() ?>"><span id="elh_master_subdivision_circleId" class="master_subdivision_circleId"><?php echo $master_subdivision_delete->circleId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_subdivision_delete->RecordCount = 0;
$i = 0;
while (!$master_subdivision_delete->Recordset->EOF) {
	$master_subdivision_delete->RecordCount++;
	$master_subdivision_delete->RowCount++;

	// Set row properties
	$master_subdivision->resetAttributes();
	$master_subdivision->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_subdivision_delete->loadRowValues($master_subdivision_delete->Recordset);

	// Render row
	$master_subdivision_delete->renderRow();
?>
	<tr <?php echo $master_subdivision->rowAttributes() ?>>
<?php if ($master_subdivision_delete->SubDivisionId->Visible) { // SubDivisionId ?>
		<td <?php echo $master_subdivision_delete->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_delete->RowCount ?>_master_subdivision_SubDivisionId" class="master_subdivision_SubDivisionId">
<span<?php echo $master_subdivision_delete->SubDivisionId->viewAttributes() ?>><?php echo $master_subdivision_delete->SubDivisionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_subdivision_delete->SubDivisionName->Visible) { // SubDivisionName ?>
		<td <?php echo $master_subdivision_delete->SubDivisionName->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_delete->RowCount ?>_master_subdivision_SubDivisionName" class="master_subdivision_SubDivisionName">
<span<?php echo $master_subdivision_delete->SubDivisionName->viewAttributes() ?>><?php echo $master_subdivision_delete->SubDivisionName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_subdivision_delete->SubDivisionName_kn->Visible) { // SubDivisionName_kn ?>
		<td <?php echo $master_subdivision_delete->SubDivisionName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_delete->RowCount ?>_master_subdivision_SubDivisionName_kn" class="master_subdivision_SubDivisionName_kn">
<span<?php echo $master_subdivision_delete->SubDivisionName_kn->viewAttributes() ?>><?php echo $master_subdivision_delete->SubDivisionName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_subdivision_delete->divisionid->Visible) { // divisionid ?>
		<td <?php echo $master_subdivision_delete->divisionid->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_delete->RowCount ?>_master_subdivision_divisionid" class="master_subdivision_divisionid">
<span<?php echo $master_subdivision_delete->divisionid->viewAttributes() ?>><?php echo $master_subdivision_delete->divisionid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_subdivision_delete->circleId->Visible) { // circleId ?>
		<td <?php echo $master_subdivision_delete->circleId->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_delete->RowCount ?>_master_subdivision_circleId" class="master_subdivision_circleId">
<span<?php echo $master_subdivision_delete->circleId->viewAttributes() ?>><?php echo $master_subdivision_delete->circleId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_subdivision_delete->Recordset->moveNext();
}
$master_subdivision_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_subdivision_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_subdivision_delete->showPageFooter();
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
$master_subdivision_delete->terminate();
?>