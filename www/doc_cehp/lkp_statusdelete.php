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
$lkp_status_delete = new lkp_status_delete();

// Run the page
$lkp_status_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_status_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_statusdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flkp_statusdelete = currentForm = new ew.Form("flkp_statusdelete", "delete");
	loadjs.done("flkp_statusdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_status_delete->showPageHeader(); ?>
<?php
$lkp_status_delete->showMessage();
?>
<form name="flkp_statusdelete" id="flkp_statusdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_status">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lkp_status_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lkp_status_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $lkp_status_delete->Status->headerCellClass() ?>"><span id="elh_lkp_status_Status" class="lkp_status_Status"><?php echo $lkp_status_delete->Status->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_status_delete->StatusName->Visible) { // StatusName ?>
		<th class="<?php echo $lkp_status_delete->StatusName->headerCellClass() ?>"><span id="elh_lkp_status_StatusName" class="lkp_status_StatusName"><?php echo $lkp_status_delete->StatusName->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_status_delete->is_station_allowed->Visible) { // is_station_allowed ?>
		<th class="<?php echo $lkp_status_delete->is_station_allowed->headerCellClass() ?>"><span id="elh_lkp_status_is_station_allowed" class="lkp_status_is_station_allowed"><?php echo $lkp_status_delete->is_station_allowed->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_status_delete->is_subdiv_allowed->Visible) { // is_subdiv_allowed ?>
		<th class="<?php echo $lkp_status_delete->is_subdiv_allowed->headerCellClass() ?>"><span id="elh_lkp_status_is_subdiv_allowed" class="lkp_status_is_subdiv_allowed"><?php echo $lkp_status_delete->is_subdiv_allowed->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_status_delete->is_circle_allowed->Visible) { // is_circle_allowed ?>
		<th class="<?php echo $lkp_status_delete->is_circle_allowed->headerCellClass() ?>"><span id="elh_lkp_status_is_circle_allowed" class="lkp_status_is_circle_allowed"><?php echo $lkp_status_delete->is_circle_allowed->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_status_delete->is_WRDO_allowed->Visible) { // is_WRDO_allowed ?>
		<th class="<?php echo $lkp_status_delete->is_WRDO_allowed->headerCellClass() ?>"><span id="elh_lkp_status_is_WRDO_allowed" class="lkp_status_is_WRDO_allowed"><?php echo $lkp_status_delete->is_WRDO_allowed->caption() ?></span></th>
<?php } ?>
<?php if ($lkp_status_delete->record_count->Visible) { // record_count ?>
		<th class="<?php echo $lkp_status_delete->record_count->headerCellClass() ?>"><span id="elh_lkp_status_record_count" class="lkp_status_record_count"><?php echo $lkp_status_delete->record_count->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lkp_status_delete->RecordCount = 0;
$i = 0;
while (!$lkp_status_delete->Recordset->EOF) {
	$lkp_status_delete->RecordCount++;
	$lkp_status_delete->RowCount++;

	// Set row properties
	$lkp_status->resetAttributes();
	$lkp_status->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lkp_status_delete->loadRowValues($lkp_status_delete->Recordset);

	// Render row
	$lkp_status_delete->renderRow();
?>
	<tr <?php echo $lkp_status->rowAttributes() ?>>
<?php if ($lkp_status_delete->Status->Visible) { // Status ?>
		<td <?php echo $lkp_status_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_delete->RowCount ?>_lkp_status_Status" class="lkp_status_Status">
<span<?php echo $lkp_status_delete->Status->viewAttributes() ?>><?php echo $lkp_status_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_status_delete->StatusName->Visible) { // StatusName ?>
		<td <?php echo $lkp_status_delete->StatusName->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_delete->RowCount ?>_lkp_status_StatusName" class="lkp_status_StatusName">
<span<?php echo $lkp_status_delete->StatusName->viewAttributes() ?>><?php echo $lkp_status_delete->StatusName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_status_delete->is_station_allowed->Visible) { // is_station_allowed ?>
		<td <?php echo $lkp_status_delete->is_station_allowed->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_delete->RowCount ?>_lkp_status_is_station_allowed" class="lkp_status_is_station_allowed">
<span<?php echo $lkp_status_delete->is_station_allowed->viewAttributes() ?>><?php echo $lkp_status_delete->is_station_allowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_status_delete->is_subdiv_allowed->Visible) { // is_subdiv_allowed ?>
		<td <?php echo $lkp_status_delete->is_subdiv_allowed->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_delete->RowCount ?>_lkp_status_is_subdiv_allowed" class="lkp_status_is_subdiv_allowed">
<span<?php echo $lkp_status_delete->is_subdiv_allowed->viewAttributes() ?>><?php echo $lkp_status_delete->is_subdiv_allowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_status_delete->is_circle_allowed->Visible) { // is_circle_allowed ?>
		<td <?php echo $lkp_status_delete->is_circle_allowed->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_delete->RowCount ?>_lkp_status_is_circle_allowed" class="lkp_status_is_circle_allowed">
<span<?php echo $lkp_status_delete->is_circle_allowed->viewAttributes() ?>><?php echo $lkp_status_delete->is_circle_allowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_status_delete->is_WRDO_allowed->Visible) { // is_WRDO_allowed ?>
		<td <?php echo $lkp_status_delete->is_WRDO_allowed->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_delete->RowCount ?>_lkp_status_is_WRDO_allowed" class="lkp_status_is_WRDO_allowed">
<span<?php echo $lkp_status_delete->is_WRDO_allowed->viewAttributes() ?>><?php echo $lkp_status_delete->is_WRDO_allowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lkp_status_delete->record_count->Visible) { // record_count ?>
		<td <?php echo $lkp_status_delete->record_count->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_delete->RowCount ?>_lkp_status_record_count" class="lkp_status_record_count">
<span<?php echo $lkp_status_delete->record_count->viewAttributes() ?>><?php echo $lkp_status_delete->record_count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lkp_status_delete->Recordset->moveNext();
}
$lkp_status_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_status_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lkp_status_delete->showPageFooter();
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
$lkp_status_delete->terminate();
?>