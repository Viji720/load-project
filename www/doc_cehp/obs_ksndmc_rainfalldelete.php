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
$obs_ksndmc_rainfall_delete = new obs_ksndmc_rainfall_delete();

// Run the page
$obs_ksndmc_rainfall_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_ksndmc_rainfall_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fobs_ksndmc_rainfalldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fobs_ksndmc_rainfalldelete = currentForm = new ew.Form("fobs_ksndmc_rainfalldelete", "delete");
	loadjs.done("fobs_ksndmc_rainfalldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $obs_ksndmc_rainfall_delete->showPageHeader(); ?>
<?php
$obs_ksndmc_rainfall_delete->showMessage();
?>
<form name="fobs_ksndmc_rainfalldelete" id="fobs_ksndmc_rainfalldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_ksndmc_rainfall">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($obs_ksndmc_rainfall_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($obs_ksndmc_rainfall_delete->Raingauge_id->Visible) { // Raingauge_id ?>
		<th class="<?php echo $obs_ksndmc_rainfall_delete->Raingauge_id->headerCellClass() ?>"><span id="elh_obs_ksndmc_rainfall_Raingauge_id" class="obs_ksndmc_rainfall_Raingauge_id"><?php echo $obs_ksndmc_rainfall_delete->Raingauge_id->caption() ?></span></th>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_delete->obs_datetime->Visible) { // obs_datetime ?>
		<th class="<?php echo $obs_ksndmc_rainfall_delete->obs_datetime->headerCellClass() ?>"><span id="elh_obs_ksndmc_rainfall_obs_datetime" class="obs_ksndmc_rainfall_obs_datetime"><?php echo $obs_ksndmc_rainfall_delete->obs_datetime->caption() ?></span></th>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_delete->rainfall->Visible) { // rainfall ?>
		<th class="<?php echo $obs_ksndmc_rainfall_delete->rainfall->headerCellClass() ?>"><span id="elh_obs_ksndmc_rainfall_rainfall" class="obs_ksndmc_rainfall_rainfall"><?php echo $obs_ksndmc_rainfall_delete->rainfall->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$obs_ksndmc_rainfall_delete->RecordCount = 0;
$i = 0;
while (!$obs_ksndmc_rainfall_delete->Recordset->EOF) {
	$obs_ksndmc_rainfall_delete->RecordCount++;
	$obs_ksndmc_rainfall_delete->RowCount++;

	// Set row properties
	$obs_ksndmc_rainfall->resetAttributes();
	$obs_ksndmc_rainfall->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$obs_ksndmc_rainfall_delete->loadRowValues($obs_ksndmc_rainfall_delete->Recordset);

	// Render row
	$obs_ksndmc_rainfall_delete->renderRow();
?>
	<tr <?php echo $obs_ksndmc_rainfall->rowAttributes() ?>>
<?php if ($obs_ksndmc_rainfall_delete->Raingauge_id->Visible) { // Raingauge_id ?>
		<td <?php echo $obs_ksndmc_rainfall_delete->Raingauge_id->cellAttributes() ?>>
<span id="el<?php echo $obs_ksndmc_rainfall_delete->RowCount ?>_obs_ksndmc_rainfall_Raingauge_id" class="obs_ksndmc_rainfall_Raingauge_id">
<span<?php echo $obs_ksndmc_rainfall_delete->Raingauge_id->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_delete->Raingauge_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_delete->obs_datetime->Visible) { // obs_datetime ?>
		<td <?php echo $obs_ksndmc_rainfall_delete->obs_datetime->cellAttributes() ?>>
<span id="el<?php echo $obs_ksndmc_rainfall_delete->RowCount ?>_obs_ksndmc_rainfall_obs_datetime" class="obs_ksndmc_rainfall_obs_datetime">
<span<?php echo $obs_ksndmc_rainfall_delete->obs_datetime->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_delete->obs_datetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_delete->rainfall->Visible) { // rainfall ?>
		<td <?php echo $obs_ksndmc_rainfall_delete->rainfall->cellAttributes() ?>>
<span id="el<?php echo $obs_ksndmc_rainfall_delete->RowCount ?>_obs_ksndmc_rainfall_rainfall" class="obs_ksndmc_rainfall_rainfall">
<span<?php echo $obs_ksndmc_rainfall_delete->rainfall->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_delete->rainfall->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$obs_ksndmc_rainfall_delete->Recordset->moveNext();
}
$obs_ksndmc_rainfall_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $obs_ksndmc_rainfall_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$obs_ksndmc_rainfall_delete->showPageFooter();
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
$obs_ksndmc_rainfall_delete->terminate();
?>