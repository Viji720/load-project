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
$mst_mobile_staion_link_delete = new mst_mobile_staion_link_delete();

// Run the page
$mst_mobile_staion_link_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mst_mobile_staion_link_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmst_mobile_staion_linkdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmst_mobile_staion_linkdelete = currentForm = new ew.Form("fmst_mobile_staion_linkdelete", "delete");
	loadjs.done("fmst_mobile_staion_linkdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mst_mobile_staion_link_delete->showPageHeader(); ?>
<?php
$mst_mobile_staion_link_delete->showMessage();
?>
<form name="fmst_mobile_staion_linkdelete" id="fmst_mobile_staion_linkdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mst_mobile_staion_link">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mst_mobile_staion_link_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mst_mobile_staion_link_delete->senderMobileNumber->Visible) { // senderMobileNumber ?>
		<th class="<?php echo $mst_mobile_staion_link_delete->senderMobileNumber->headerCellClass() ?>"><span id="elh_mst_mobile_staion_link_senderMobileNumber" class="mst_mobile_staion_link_senderMobileNumber"><?php echo $mst_mobile_staion_link_delete->senderMobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($mst_mobile_staion_link_delete->StationId->Visible) { // StationId ?>
		<th class="<?php echo $mst_mobile_staion_link_delete->StationId->headerCellClass() ?>"><span id="elh_mst_mobile_staion_link_StationId" class="mst_mobile_staion_link_StationId"><?php echo $mst_mobile_staion_link_delete->StationId->caption() ?></span></th>
<?php } ?>
<?php if ($mst_mobile_staion_link_delete->Effective_From_Date->Visible) { // Effective_From_Date ?>
		<th class="<?php echo $mst_mobile_staion_link_delete->Effective_From_Date->headerCellClass() ?>"><span id="elh_mst_mobile_staion_link_Effective_From_Date" class="mst_mobile_staion_link_Effective_From_Date"><?php echo $mst_mobile_staion_link_delete->Effective_From_Date->caption() ?></span></th>
<?php } ?>
<?php if ($mst_mobile_staion_link_delete->Effective_till_Date->Visible) { // Effective_till_Date ?>
		<th class="<?php echo $mst_mobile_staion_link_delete->Effective_till_Date->headerCellClass() ?>"><span id="elh_mst_mobile_staion_link_Effective_till_Date" class="mst_mobile_staion_link_Effective_till_Date"><?php echo $mst_mobile_staion_link_delete->Effective_till_Date->caption() ?></span></th>
<?php } ?>
<?php if ($mst_mobile_staion_link_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $mst_mobile_staion_link_delete->Remarks->headerCellClass() ?>"><span id="elh_mst_mobile_staion_link_Remarks" class="mst_mobile_staion_link_Remarks"><?php echo $mst_mobile_staion_link_delete->Remarks->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mst_mobile_staion_link_delete->RecordCount = 0;
$i = 0;
while (!$mst_mobile_staion_link_delete->Recordset->EOF) {
	$mst_mobile_staion_link_delete->RecordCount++;
	$mst_mobile_staion_link_delete->RowCount++;

	// Set row properties
	$mst_mobile_staion_link->resetAttributes();
	$mst_mobile_staion_link->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mst_mobile_staion_link_delete->loadRowValues($mst_mobile_staion_link_delete->Recordset);

	// Render row
	$mst_mobile_staion_link_delete->renderRow();
?>
	<tr <?php echo $mst_mobile_staion_link->rowAttributes() ?>>
<?php if ($mst_mobile_staion_link_delete->senderMobileNumber->Visible) { // senderMobileNumber ?>
		<td <?php echo $mst_mobile_staion_link_delete->senderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_delete->RowCount ?>_mst_mobile_staion_link_senderMobileNumber" class="mst_mobile_staion_link_senderMobileNumber">
<span<?php echo $mst_mobile_staion_link_delete->senderMobileNumber->viewAttributes() ?>><?php echo $mst_mobile_staion_link_delete->senderMobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mst_mobile_staion_link_delete->StationId->Visible) { // StationId ?>
		<td <?php echo $mst_mobile_staion_link_delete->StationId->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_delete->RowCount ?>_mst_mobile_staion_link_StationId" class="mst_mobile_staion_link_StationId">
<span<?php echo $mst_mobile_staion_link_delete->StationId->viewAttributes() ?>><?php echo $mst_mobile_staion_link_delete->StationId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mst_mobile_staion_link_delete->Effective_From_Date->Visible) { // Effective_From_Date ?>
		<td <?php echo $mst_mobile_staion_link_delete->Effective_From_Date->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_delete->RowCount ?>_mst_mobile_staion_link_Effective_From_Date" class="mst_mobile_staion_link_Effective_From_Date">
<span<?php echo $mst_mobile_staion_link_delete->Effective_From_Date->viewAttributes() ?>><?php echo $mst_mobile_staion_link_delete->Effective_From_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mst_mobile_staion_link_delete->Effective_till_Date->Visible) { // Effective_till_Date ?>
		<td <?php echo $mst_mobile_staion_link_delete->Effective_till_Date->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_delete->RowCount ?>_mst_mobile_staion_link_Effective_till_Date" class="mst_mobile_staion_link_Effective_till_Date">
<span<?php echo $mst_mobile_staion_link_delete->Effective_till_Date->viewAttributes() ?>><?php echo $mst_mobile_staion_link_delete->Effective_till_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mst_mobile_staion_link_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $mst_mobile_staion_link_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_delete->RowCount ?>_mst_mobile_staion_link_Remarks" class="mst_mobile_staion_link_Remarks">
<span<?php echo $mst_mobile_staion_link_delete->Remarks->viewAttributes() ?>><?php echo $mst_mobile_staion_link_delete->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mst_mobile_staion_link_delete->Recordset->moveNext();
}
$mst_mobile_staion_link_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mst_mobile_staion_link_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mst_mobile_staion_link_delete->showPageFooter();
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
$mst_mobile_staion_link_delete->terminate();
?>