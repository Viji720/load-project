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
$master_circle_delete = new master_circle_delete();

// Run the page
$master_circle_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_circle_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_circledelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_circledelete = currentForm = new ew.Form("fmaster_circledelete", "delete");
	loadjs.done("fmaster_circledelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_circle_delete->showPageHeader(); ?>
<?php
$master_circle_delete->showMessage();
?>
<form name="fmaster_circledelete" id="fmaster_circledelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_circle">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_circle_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_circle_delete->circleId->Visible) { // circleId ?>
		<th class="<?php echo $master_circle_delete->circleId->headerCellClass() ?>"><span id="elh_master_circle_circleId" class="master_circle_circleId"><?php echo $master_circle_delete->circleId->caption() ?></span></th>
<?php } ?>
<?php if ($master_circle_delete->circleName->Visible) { // circleName ?>
		<th class="<?php echo $master_circle_delete->circleName->headerCellClass() ?>"><span id="elh_master_circle_circleName" class="master_circle_circleName"><?php echo $master_circle_delete->circleName->caption() ?></span></th>
<?php } ?>
<?php if ($master_circle_delete->circleName_kn->Visible) { // circleName_kn ?>
		<th class="<?php echo $master_circle_delete->circleName_kn->headerCellClass() ?>"><span id="elh_master_circle_circleName_kn" class="master_circle_circleName_kn"><?php echo $master_circle_delete->circleName_kn->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_circle_delete->RecordCount = 0;
$i = 0;
while (!$master_circle_delete->Recordset->EOF) {
	$master_circle_delete->RecordCount++;
	$master_circle_delete->RowCount++;

	// Set row properties
	$master_circle->resetAttributes();
	$master_circle->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_circle_delete->loadRowValues($master_circle_delete->Recordset);

	// Render row
	$master_circle_delete->renderRow();
?>
	<tr <?php echo $master_circle->rowAttributes() ?>>
<?php if ($master_circle_delete->circleId->Visible) { // circleId ?>
		<td <?php echo $master_circle_delete->circleId->cellAttributes() ?>>
<span id="el<?php echo $master_circle_delete->RowCount ?>_master_circle_circleId" class="master_circle_circleId">
<span<?php echo $master_circle_delete->circleId->viewAttributes() ?>><?php echo $master_circle_delete->circleId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_circle_delete->circleName->Visible) { // circleName ?>
		<td <?php echo $master_circle_delete->circleName->cellAttributes() ?>>
<span id="el<?php echo $master_circle_delete->RowCount ?>_master_circle_circleName" class="master_circle_circleName">
<span<?php echo $master_circle_delete->circleName->viewAttributes() ?>><?php echo $master_circle_delete->circleName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_circle_delete->circleName_kn->Visible) { // circleName_kn ?>
		<td <?php echo $master_circle_delete->circleName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_circle_delete->RowCount ?>_master_circle_circleName_kn" class="master_circle_circleName_kn">
<span<?php echo $master_circle_delete->circleName_kn->viewAttributes() ?>><?php echo $master_circle_delete->circleName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_circle_delete->Recordset->moveNext();
}
$master_circle_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_circle_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_circle_delete->showPageFooter();
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
$master_circle_delete->terminate();
?>