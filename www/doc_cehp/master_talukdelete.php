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
$master_taluk_delete = new master_taluk_delete();

// Run the page
$master_taluk_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_taluk_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_talukdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_talukdelete = currentForm = new ew.Form("fmaster_talukdelete", "delete");
	loadjs.done("fmaster_talukdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_taluk_delete->showPageHeader(); ?>
<?php
$master_taluk_delete->showMessage();
?>
<form name="fmaster_talukdelete" id="fmaster_talukdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_taluk">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_taluk_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_taluk_delete->TalukId->Visible) { // TalukId ?>
		<th class="<?php echo $master_taluk_delete->TalukId->headerCellClass() ?>"><span id="elh_master_taluk_TalukId" class="master_taluk_TalukId"><?php echo $master_taluk_delete->TalukId->caption() ?></span></th>
<?php } ?>
<?php if ($master_taluk_delete->TalukName->Visible) { // TalukName ?>
		<th class="<?php echo $master_taluk_delete->TalukName->headerCellClass() ?>"><span id="elh_master_taluk_TalukName" class="master_taluk_TalukName"><?php echo $master_taluk_delete->TalukName->caption() ?></span></th>
<?php } ?>
<?php if ($master_taluk_delete->TalukName_kn->Visible) { // TalukName_kn ?>
		<th class="<?php echo $master_taluk_delete->TalukName_kn->headerCellClass() ?>"><span id="elh_master_taluk_TalukName_kn" class="master_taluk_TalukName_kn"><?php echo $master_taluk_delete->TalukName_kn->caption() ?></span></th>
<?php } ?>
<?php if ($master_taluk_delete->TalukName_hi->Visible) { // TalukName_hi ?>
		<th class="<?php echo $master_taluk_delete->TalukName_hi->headerCellClass() ?>"><span id="elh_master_taluk_TalukName_hi" class="master_taluk_TalukName_hi"><?php echo $master_taluk_delete->TalukName_hi->caption() ?></span></th>
<?php } ?>
<?php if ($master_taluk_delete->DistrictId->Visible) { // DistrictId ?>
		<th class="<?php echo $master_taluk_delete->DistrictId->headerCellClass() ?>"><span id="elh_master_taluk_DistrictId" class="master_taluk_DistrictId"><?php echo $master_taluk_delete->DistrictId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_taluk_delete->RecordCount = 0;
$i = 0;
while (!$master_taluk_delete->Recordset->EOF) {
	$master_taluk_delete->RecordCount++;
	$master_taluk_delete->RowCount++;

	// Set row properties
	$master_taluk->resetAttributes();
	$master_taluk->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_taluk_delete->loadRowValues($master_taluk_delete->Recordset);

	// Render row
	$master_taluk_delete->renderRow();
?>
	<tr <?php echo $master_taluk->rowAttributes() ?>>
<?php if ($master_taluk_delete->TalukId->Visible) { // TalukId ?>
		<td <?php echo $master_taluk_delete->TalukId->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_delete->RowCount ?>_master_taluk_TalukId" class="master_taluk_TalukId">
<span<?php echo $master_taluk_delete->TalukId->viewAttributes() ?>><?php echo $master_taluk_delete->TalukId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_taluk_delete->TalukName->Visible) { // TalukName ?>
		<td <?php echo $master_taluk_delete->TalukName->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_delete->RowCount ?>_master_taluk_TalukName" class="master_taluk_TalukName">
<span<?php echo $master_taluk_delete->TalukName->viewAttributes() ?>><?php echo $master_taluk_delete->TalukName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_taluk_delete->TalukName_kn->Visible) { // TalukName_kn ?>
		<td <?php echo $master_taluk_delete->TalukName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_delete->RowCount ?>_master_taluk_TalukName_kn" class="master_taluk_TalukName_kn">
<span<?php echo $master_taluk_delete->TalukName_kn->viewAttributes() ?>><?php echo $master_taluk_delete->TalukName_kn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_taluk_delete->TalukName_hi->Visible) { // TalukName_hi ?>
		<td <?php echo $master_taluk_delete->TalukName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_delete->RowCount ?>_master_taluk_TalukName_hi" class="master_taluk_TalukName_hi">
<span<?php echo $master_taluk_delete->TalukName_hi->viewAttributes() ?>><?php echo $master_taluk_delete->TalukName_hi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_taluk_delete->DistrictId->Visible) { // DistrictId ?>
		<td <?php echo $master_taluk_delete->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_delete->RowCount ?>_master_taluk_DistrictId" class="master_taluk_DistrictId">
<span<?php echo $master_taluk_delete->DistrictId->viewAttributes() ?>><?php echo $master_taluk_delete->DistrictId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_taluk_delete->Recordset->moveNext();
}
$master_taluk_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_taluk_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_taluk_delete->showPageFooter();
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
$master_taluk_delete->terminate();
?>