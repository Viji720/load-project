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
$lkp_month_id_delete = new lkp_month_id_delete();

// Run the page
$lkp_month_id_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_month_id_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_month_iddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flkp_month_iddelete = currentForm = new ew.Form("flkp_month_iddelete", "delete");
	loadjs.done("flkp_month_iddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_month_id_delete->showPageHeader(); ?>
<?php
$lkp_month_id_delete->showMessage();
?>
<form name="flkp_month_iddelete" id="flkp_month_iddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_month_id">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lkp_month_id_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lkp_month_id_delete->month_id->Visible) { // month_id ?>
		<th class="<?php echo $lkp_month_id_delete->month_id->headerCellClass() ?>"><span id="elh_lkp_month_id_month_id" class="lkp_month_id_month_id"><?php echo $lkp_month_id_delete->month_id->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_month_id_delete->month_Name->Visible) { // month_Name ?>
		<th class="<?php echo $lkp_month_id_delete->month_Name->headerCellClass() ?>"><span id="elh_lkp_month_id_month_Name" class="lkp_month_id_month_Name"><?php echo $lkp_month_id_delete->month_Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lkp_month_id_delete->RecordCount = 0;
$i = 0;
while (!$lkp_month_id_delete->Recordset->EOF) {
	$lkp_month_id_delete->RecordCount++;
	$lkp_month_id_delete->RowCount++;

	// Set row properties
	$lkp_month_id->resetAttributes();
	$lkp_month_id->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lkp_month_id_delete->loadRowValues($lkp_month_id_delete->Recordset);

	// Render row
	$lkp_month_id_delete->renderRow();
?>
	<tr <?php echo $lkp_month_id->rowAttributes() ?>>
<?php if ($lkp_month_id_delete->month_id->Visible) { // month_id ?>
		<td <?php echo $lkp_month_id_delete->month_id->cellAttributes() ?>>
<span id="el<?php echo $lkp_month_id_delete->RowCount ?>_lkp_month_id_month_id" class="lkp_month_id_month_id">
<span<?php echo $lkp_month_id_delete->month_id->viewAttributes() ?>><?php echo $lkp_month_id_delete->month_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_month_id_delete->month_Name->Visible) { // month_Name ?>
		<td <?php echo $lkp_month_id_delete->month_Name->cellAttributes() ?>>
<span id="el<?php echo $lkp_month_id_delete->RowCount ?>_lkp_month_id_month_Name" class="lkp_month_id_month_Name">
<span<?php echo $lkp_month_id_delete->month_Name->viewAttributes() ?>><?php echo $lkp_month_id_delete->month_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lkp_month_id_delete->Recordset->moveNext();
}
$lkp_month_id_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_month_id_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lkp_month_id_delete->showPageFooter();
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
$lkp_month_id_delete->terminate();
?>