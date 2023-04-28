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
$master_user_delete = new master_user_delete();

// Run the page
$master_user_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_userdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_userdelete = currentForm = new ew.Form("fmaster_userdelete", "delete");
	loadjs.done("fmaster_userdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_user_delete->showPageHeader(); ?>
<?php
$master_user_delete->showMessage();
?>
<form name="fmaster_userdelete" id="fmaster_userdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_user_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_user_delete->_UserId->Visible) { // UserId ?>
		<th class="<?php echo $master_user_delete->_UserId->headerCellClass() ?>"><span id="elh_master_user__UserId" class="master_user__UserId"><?php echo $master_user_delete->_UserId->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->UserName->Visible) { // UserName ?>
		<th class="<?php echo $master_user_delete->UserName->headerCellClass() ?>"><span id="elh_master_user_UserName" class="master_user_UserName"><?php echo $master_user_delete->UserName->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->StationId->Visible) { // StationId ?>
		<th class="<?php echo $master_user_delete->StationId->headerCellClass() ?>"><span id="elh_master_user_StationId" class="master_user_StationId"><?php echo $master_user_delete->StationId->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->TalukId->Visible) { // TalukId ?>
		<th class="<?php echo $master_user_delete->TalukId->headerCellClass() ?>"><span id="elh_master_user_TalukId" class="master_user_TalukId"><?php echo $master_user_delete->TalukId->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->DistrictId->Visible) { // DistrictId ?>
		<th class="<?php echo $master_user_delete->DistrictId->headerCellClass() ?>"><span id="elh_master_user_DistrictId" class="master_user_DistrictId"><?php echo $master_user_delete->DistrictId->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->SubDivsionId->Visible) { // SubDivsionId ?>
		<th class="<?php echo $master_user_delete->SubDivsionId->headerCellClass() ?>"><span id="elh_master_user_SubDivsionId" class="master_user_SubDivsionId"><?php echo $master_user_delete->SubDivsionId->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->DivisionId->Visible) { // DivisionId ?>
		<th class="<?php echo $master_user_delete->DivisionId->headerCellClass() ?>"><span id="elh_master_user_DivisionId" class="master_user_DivisionId"><?php echo $master_user_delete->DivisionId->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->RoleId->Visible) { // RoleId ?>
		<th class="<?php echo $master_user_delete->RoleId->headerCellClass() ?>"><span id="elh_master_user_RoleId" class="master_user_RoleId"><?php echo $master_user_delete->RoleId->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->UserPassword->Visible) { // UserPassword ?>
		<th class="<?php echo $master_user_delete->UserPassword->headerCellClass() ?>"><span id="elh_master_user_UserPassword" class="master_user_UserPassword"><?php echo $master_user_delete->UserPassword->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->UserEmail->Visible) { // UserEmail ?>
		<th class="<?php echo $master_user_delete->UserEmail->headerCellClass() ?>"><span id="elh_master_user_UserEmail" class="master_user_UserEmail"><?php echo $master_user_delete->UserEmail->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_delete->UserMobileNumber->Visible) { // UserMobileNumber ?>
		<th class="<?php echo $master_user_delete->UserMobileNumber->headerCellClass() ?>"><span id="elh_master_user_UserMobileNumber" class="master_user_UserMobileNumber"><?php echo $master_user_delete->UserMobileNumber->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_user_delete->RecordCount = 0;
$i = 0;
while (!$master_user_delete->Recordset->EOF) {
	$master_user_delete->RecordCount++;
	$master_user_delete->RowCount++;

	// Set row properties
	$master_user->resetAttributes();
	$master_user->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_user_delete->loadRowValues($master_user_delete->Recordset);

	// Render row
	$master_user_delete->renderRow();
?>
	<tr <?php echo $master_user->rowAttributes() ?>>
<?php if ($master_user_delete->_UserId->Visible) { // UserId ?>
		<td <?php echo $master_user_delete->_UserId->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user__UserId" class="master_user__UserId">
<span<?php echo $master_user_delete->_UserId->viewAttributes() ?>><?php echo $master_user_delete->_UserId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->UserName->Visible) { // UserName ?>
		<td <?php echo $master_user_delete->UserName->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_UserName" class="master_user_UserName">
<span<?php echo $master_user_delete->UserName->viewAttributes() ?>><?php echo $master_user_delete->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->StationId->Visible) { // StationId ?>
		<td <?php echo $master_user_delete->StationId->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_StationId" class="master_user_StationId">
<span<?php echo $master_user_delete->StationId->viewAttributes() ?>><?php echo $master_user_delete->StationId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->TalukId->Visible) { // TalukId ?>
		<td <?php echo $master_user_delete->TalukId->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_TalukId" class="master_user_TalukId">
<span<?php echo $master_user_delete->TalukId->viewAttributes() ?>><?php echo $master_user_delete->TalukId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->DistrictId->Visible) { // DistrictId ?>
		<td <?php echo $master_user_delete->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_DistrictId" class="master_user_DistrictId">
<span<?php echo $master_user_delete->DistrictId->viewAttributes() ?>><?php echo $master_user_delete->DistrictId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->SubDivsionId->Visible) { // SubDivsionId ?>
		<td <?php echo $master_user_delete->SubDivsionId->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_SubDivsionId" class="master_user_SubDivsionId">
<span<?php echo $master_user_delete->SubDivsionId->viewAttributes() ?>><?php echo $master_user_delete->SubDivsionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->DivisionId->Visible) { // DivisionId ?>
		<td <?php echo $master_user_delete->DivisionId->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_DivisionId" class="master_user_DivisionId">
<span<?php echo $master_user_delete->DivisionId->viewAttributes() ?>><?php echo $master_user_delete->DivisionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->RoleId->Visible) { // RoleId ?>
		<td <?php echo $master_user_delete->RoleId->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_RoleId" class="master_user_RoleId">
<span<?php echo $master_user_delete->RoleId->viewAttributes() ?>><?php echo $master_user_delete->RoleId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->UserPassword->Visible) { // UserPassword ?>
		<td <?php echo $master_user_delete->UserPassword->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_UserPassword" class="master_user_UserPassword">
<span<?php echo $master_user_delete->UserPassword->viewAttributes() ?>><?php echo $master_user_delete->UserPassword->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->UserEmail->Visible) { // UserEmail ?>
		<td <?php echo $master_user_delete->UserEmail->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_UserEmail" class="master_user_UserEmail">
<span<?php echo $master_user_delete->UserEmail->viewAttributes() ?>><?php echo $master_user_delete->UserEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_delete->UserMobileNumber->Visible) { // UserMobileNumber ?>
		<td <?php echo $master_user_delete->UserMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $master_user_delete->RowCount ?>_master_user_UserMobileNumber" class="master_user_UserMobileNumber">
<span<?php echo $master_user_delete->UserMobileNumber->viewAttributes() ?>><?php echo $master_user_delete->UserMobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_user_delete->Recordset->moveNext();
}
$master_user_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_user_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_user_delete->showPageFooter();
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
$master_user_delete->terminate();
?>