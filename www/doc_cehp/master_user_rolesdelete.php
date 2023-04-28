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
$master_user_roles_delete = new master_user_roles_delete();

// Run the page
$master_user_roles_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_roles_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_user_rolesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_user_rolesdelete = currentForm = new ew.Form("fmaster_user_rolesdelete", "delete");
	loadjs.done("fmaster_user_rolesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_user_roles_delete->showPageHeader(); ?>
<?php
$master_user_roles_delete->showMessage();
?>
<form name="fmaster_user_rolesdelete" id="fmaster_user_rolesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user_roles">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_user_roles_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_user_roles_delete->RoleId->Visible) { // RoleId ?>
		<th class="<?php echo $master_user_roles_delete->RoleId->headerCellClass() ?>"><span id="elh_master_user_roles_RoleId" class="master_user_roles_RoleId"><?php echo $master_user_roles_delete->RoleId->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_roles_delete->RoleName->Visible) { // RoleName ?>
		<th class="<?php echo $master_user_roles_delete->RoleName->headerCellClass() ?>"><span id="elh_master_user_roles_RoleName" class="master_user_roles_RoleName"><?php echo $master_user_roles_delete->RoleName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_user_roles_delete->RecordCount = 0;
$i = 0;
while (!$master_user_roles_delete->Recordset->EOF) {
	$master_user_roles_delete->RecordCount++;
	$master_user_roles_delete->RowCount++;

	// Set row properties
	$master_user_roles->resetAttributes();
	$master_user_roles->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_user_roles_delete->loadRowValues($master_user_roles_delete->Recordset);

	// Render row
	$master_user_roles_delete->renderRow();
?>
	<tr <?php echo $master_user_roles->rowAttributes() ?>>
<?php if ($master_user_roles_delete->RoleId->Visible) { // RoleId ?>
		<td <?php echo $master_user_roles_delete->RoleId->cellAttributes() ?>>
<span id="el<?php echo $master_user_roles_delete->RowCount ?>_master_user_roles_RoleId" class="master_user_roles_RoleId">
<span<?php echo $master_user_roles_delete->RoleId->viewAttributes() ?>><?php echo $master_user_roles_delete->RoleId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_roles_delete->RoleName->Visible) { // RoleName ?>
		<td <?php echo $master_user_roles_delete->RoleName->cellAttributes() ?>>
<span id="el<?php echo $master_user_roles_delete->RowCount ?>_master_user_roles_RoleName" class="master_user_roles_RoleName">
<span<?php echo $master_user_roles_delete->RoleName->viewAttributes() ?>><?php echo $master_user_roles_delete->RoleName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_user_roles_delete->Recordset->moveNext();
}
$master_user_roles_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_user_roles_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_user_roles_delete->showPageFooter();
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
$master_user_roles_delete->terminate();
?>