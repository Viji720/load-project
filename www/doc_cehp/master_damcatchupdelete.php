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
$master_damcatchup_delete = new master_damcatchup_delete();

// Run the page
$master_damcatchup_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_damcatchup_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_damcatchupdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_damcatchupdelete = currentForm = new ew.Form("fmaster_damcatchupdelete", "delete");
	loadjs.done("fmaster_damcatchupdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_damcatchup_delete->showPageHeader(); ?>
<?php
$master_damcatchup_delete->showMessage();
?>
<form name="fmaster_damcatchupdelete" id="fmaster_damcatchupdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_damcatchup">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_damcatchup_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_damcatchup_delete->CatchUpId->Visible) { // CatchUpId ?>
		<th class="<?php echo $master_damcatchup_delete->CatchUpId->headerCellClass() ?>"><span id="elh_master_damcatchup_CatchUpId" class="master_damcatchup_CatchUpId"><?php echo $master_damcatchup_delete->CatchUpId->caption() ?></span></th>
<?php } ?>
<?php if ($master_damcatchup_delete->CatchUpName->Visible) { // CatchUpName ?>
		<th class="<?php echo $master_damcatchup_delete->CatchUpName->headerCellClass() ?>"><span id="elh_master_damcatchup_CatchUpName" class="master_damcatchup_CatchUpName"><?php echo $master_damcatchup_delete->CatchUpName->caption() ?></span></th>
<?php } ?>
<?php if ($master_damcatchup_delete->CatchUpName_kn->Visible) { // CatchUpName_kn ?>
		<th class="<?php echo $master_damcatchup_delete->CatchUpName_kn->headerCellClass() ?>"><span id="elh_master_damcatchup_CatchUpName_kn" class="master_damcatchup_CatchUpName_kn"><?php echo $master_damcatchup_delete->CatchUpName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_damcatchup_delete->CatchUpName_hi->Visible) { // CatchUpName_hi ?>
		<th class="<?php echo $master_damcatchup_delete->CatchUpName_hi->headerCellClass() ?>"><span id="elh_master_damcatchup_CatchUpName_hi" class="master_damcatchup_CatchUpName_hi"><?php echo $master_damcatchup_delete->CatchUpName_hi->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_damcatchup_delete->RecordCount = 0;
$i = 0;
while (!$master_damcatchup_delete->Recordset->EOF) {
	$master_damcatchup_delete->RecordCount++;
	$master_damcatchup_delete->RowCount++;

	// Set row properties
	$master_damcatchup->resetAttributes();
	$master_damcatchup->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_damcatchup_delete->loadRowValues($master_damcatchup_delete->Recordset);

	// Render row
	$master_damcatchup_delete->renderRow();
?>
	<tr <?php echo $master_damcatchup->rowAttributes() ?>>
<?php if ($master_damcatchup_delete->CatchUpId->Visible) { // CatchUpId ?>
		<td <?php echo $master_damcatchup_delete->CatchUpId->cellAttributes() ?>>
<span id="el<?php echo $master_damcatchup_delete->RowCount ?>_master_damcatchup_CatchUpId" class="master_damcatchup_CatchUpId">
<span<?php echo $master_damcatchup_delete->CatchUpId->viewAttributes() ?>><?php echo $master_damcatchup_delete->CatchUpId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_damcatchup_delete->CatchUpName->Visible) { // CatchUpName ?>
		<td <?php echo $master_damcatchup_delete->CatchUpName->cellAttributes() ?>>
<span id="el<?php echo $master_damcatchup_delete->RowCount ?>_master_damcatchup_CatchUpName" class="master_damcatchup_CatchUpName">
<span<?php echo $master_damcatchup_delete->CatchUpName->viewAttributes() ?>><?php echo $master_damcatchup_delete->CatchUpName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_damcatchup_delete->CatchUpName_kn->Visible) { // CatchUpName_kn ?>
		<td <?php echo $master_damcatchup_delete->CatchUpName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_damcatchup_delete->RowCount ?>_master_damcatchup_CatchUpName_kn" class="master_damcatchup_CatchUpName_kn">
<span<?php echo $master_damcatchup_delete->CatchUpName_kn->viewAttributes() ?>><?php echo $master_damcatchup_delete->CatchUpName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_damcatchup_delete->CatchUpName_hi->Visible) { // CatchUpName_hi ?>
		<td <?php echo $master_damcatchup_delete->CatchUpName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_damcatchup_delete->RowCount ?>_master_damcatchup_CatchUpName_hi" class="master_damcatchup_CatchUpName_hi">
<span<?php echo $master_damcatchup_delete->CatchUpName_hi->viewAttributes() ?>><?php echo $master_damcatchup_delete->CatchUpName_hi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_damcatchup_delete->Recordset->moveNext();
}
$master_damcatchup_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_damcatchup_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_damcatchup_delete->showPageFooter();
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
$master_damcatchup_delete->terminate();
?>