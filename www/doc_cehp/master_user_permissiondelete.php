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
$master_user_permission_delete = new master_user_permission_delete();

// Run the page
$master_user_permission_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_permission_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_user_permissiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmaster_user_permissiondelete = currentForm = new ew.Form("fmaster_user_permissiondelete", "delete");
	loadjs.done("fmaster_user_permissiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_user_permission_delete->showPageHeader(); ?>
<?php
$master_user_permission_delete->showMessage();
?>
<form name="fmaster_user_permissiondelete" id="fmaster_user_permissiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user_permission">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_user_permission_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_user_permission_delete->userlevelid->Visible) { // userlevelid ?>
		<th class="<?php echo $master_user_permission_delete->userlevelid->headerCellClass() ?>"><span id="elh_master_user_permission_userlevelid" class="master_user_permission_userlevelid"><?php echo $master_user_permission_delete->userlevelid->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_permission_delete->_tablename->Visible) { // tablename ?>
		<th class="<?php echo $master_user_permission_delete->_tablename->headerCellClass() ?>"><span id="elh_master_user_permission__tablename" class="master_user_permission__tablename"><?php echo $master_user_permission_delete->_tablename->caption() ?></span></th>
<?php } ?>
<?php if ($master_user_permission_delete->permission->Visible) { // permission ?>
		<th class="<?php echo $master_user_permission_delete->permission->headerCellClass() ?>"><span id="elh_master_user_permission_permission" class="master_user_permission_permission"><?php echo $master_user_permission_delete->permission->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_user_permission_delete->RecordCount = 0;
$i = 0;
while (!$master_user_permission_delete->Recordset->EOF) {
	$master_user_permission_delete->RecordCount++;
	$master_user_permission_delete->RowCount++;

	// Set row properties
	$master_user_permission->resetAttributes();
	$master_user_permission->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_user_permission_delete->loadRowValues($master_user_permission_delete->Recordset);

	// Render row
	$master_user_permission_delete->renderRow();
?>
	<tr <?php echo $master_user_permission->rowAttributes() ?>>
<?php if ($master_user_permission_delete->userlevelid->Visible) { // userlevelid ?>
		<td <?php echo $master_user_permission_delete->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $master_user_permission_delete->RowCount ?>_master_user_permission_userlevelid" class="master_user_permission_userlevelid">
<span<?php echo $master_user_permission_delete->userlevelid->viewAttributes() ?>><?php echo $master_user_permission_delete->userlevelid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_permission_delete->_tablename->Visible) { // tablename ?>
		<td <?php echo $master_user_permission_delete->_tablename->cellAttributes() ?>>
<span id="el<?php echo $master_user_permission_delete->RowCount ?>_master_user_permission__tablename" class="master_user_permission__tablename">
<span<?php echo $master_user_permission_delete->_tablename->viewAttributes() ?>><?php echo $master_user_permission_delete->_tablename->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_user_permission_delete->permission->Visible) { // permission ?>
		<td <?php echo $master_user_permission_delete->permission->cellAttributes() ?>>
<span id="el<?php echo $master_user_permission_delete->RowCount ?>_master_user_permission_permission" class="master_user_permission_permission">
<span<?php echo $master_user_permission_delete->permission->viewAttributes() ?>><?php echo $master_user_permission_delete->permission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_user_permission_delete->Recordset->moveNext();
}
$master_user_permission_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_user_permission_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_user_permission_delete->showPageFooter();
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
$master_user_permission_delete->terminate();
?>