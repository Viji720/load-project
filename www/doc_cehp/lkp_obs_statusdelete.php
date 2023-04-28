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
$lkp_obs_status_delete = new lkp_obs_status_delete();

// Run the page
$lkp_obs_status_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_obs_status_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_obs_statusdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flkp_obs_statusdelete = currentForm = new ew.Form("flkp_obs_statusdelete", "delete");
	loadjs.done("flkp_obs_statusdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_obs_status_delete->showPageHeader(); ?>
<?php
$lkp_obs_status_delete->showMessage();
?>
<form name="flkp_obs_statusdelete" id="flkp_obs_statusdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_obs_status">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lkp_obs_status_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lkp_obs_status_delete->obs_Status->Visible) { // obs_Status ?>
		<th class="<?php echo $lkp_obs_status_delete->obs_Status->headerCellClass() ?>"><span id="elh_lkp_obs_status_obs_Status" class="lkp_obs_status_obs_Status"><?php echo $lkp_obs_status_delete->obs_Status->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_obs_status_delete->obs_StatusName->Visible) { // obs_StatusName ?>
		<th class="<?php echo $lkp_obs_status_delete->obs_StatusName->headerCellClass() ?>"><span id="elh_lkp_obs_status_obs_StatusName" class="lkp_obs_status_obs_StatusName"><?php echo $lkp_obs_status_delete->obs_StatusName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lkp_obs_status_delete->RecordCount = 0;
$i = 0;
while (!$lkp_obs_status_delete->Recordset->EOF) {
	$lkp_obs_status_delete->RecordCount++;
	$lkp_obs_status_delete->RowCount++;

	// Set row properties
	$lkp_obs_status->resetAttributes();
	$lkp_obs_status->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lkp_obs_status_delete->loadRowValues($lkp_obs_status_delete->Recordset);

	// Render row
	$lkp_obs_status_delete->renderRow();
?>
	<tr <?php echo $lkp_obs_status->rowAttributes() ?>>
<?php if ($lkp_obs_status_delete->obs_Status->Visible) { // obs_Status ?>
		<td <?php echo $lkp_obs_status_delete->obs_Status->cellAttributes() ?>>
<span id="el<?php echo $lkp_obs_status_delete->RowCount ?>_lkp_obs_status_obs_Status" class="lkp_obs_status_obs_Status">
<span<?php echo $lkp_obs_status_delete->obs_Status->viewAttributes() ?>><?php echo $lkp_obs_status_delete->obs_Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_obs_status_delete->obs_StatusName->Visible) { // obs_StatusName ?>
		<td <?php echo $lkp_obs_status_delete->obs_StatusName->cellAttributes() ?>>
<span id="el<?php echo $lkp_obs_status_delete->RowCount ?>_lkp_obs_status_obs_StatusName" class="lkp_obs_status_obs_StatusName">
<span<?php echo $lkp_obs_status_delete->obs_StatusName->viewAttributes() ?>><?php echo $lkp_obs_status_delete->obs_StatusName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lkp_obs_status_delete->Recordset->moveNext();
}
$lkp_obs_status_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_obs_status_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lkp_obs_status_delete->showPageFooter();
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
$lkp_obs_status_delete->terminate();
?>