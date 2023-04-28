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
$master_user_permission_view = new master_user_permission_view();

// Run the page
$master_user_permission_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_permission_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_user_permission_view->isExport()) { ?>
<script>
var fmaster_user_permissionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_user_permissionview = currentForm = new ew.Form("fmaster_user_permissionview", "view");
	loadjs.done("fmaster_user_permissionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_user_permission_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_user_permission_view->ExportOptions->render("body") ?>
<?php $master_user_permission_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_user_permission_view->showPageHeader(); ?>
<?php
$master_user_permission_view->showMessage();
?>
<form name="fmaster_user_permissionview" id="fmaster_user_permissionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user_permission">
<input type="hidden" name="modal" value="<?php echo (int)$master_user_permission_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_user_permission_view->userlevelid->Visible) { // userlevelid ?>
	<tr id="r_userlevelid">
		<td class="<?php echo $master_user_permission_view->TableLeftColumnClass ?>"><span id="elh_master_user_permission_userlevelid"><?php echo $master_user_permission_view->userlevelid->caption() ?></span></td>
		<td data-name="userlevelid" <?php echo $master_user_permission_view->userlevelid->cellAttributes() ?>>
<span id="el_master_user_permission_userlevelid">
<span<?php echo $master_user_permission_view->userlevelid->viewAttributes() ?>><?php echo $master_user_permission_view->userlevelid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_permission_view->_tablename->Visible) { // tablename ?>
	<tr id="r__tablename">
		<td class="<?php echo $master_user_permission_view->TableLeftColumnClass ?>"><span id="elh_master_user_permission__tablename"><?php echo $master_user_permission_view->_tablename->caption() ?></span></td>
		<td data-name="_tablename" <?php echo $master_user_permission_view->_tablename->cellAttributes() ?>>
<span id="el_master_user_permission__tablename">
<span<?php echo $master_user_permission_view->_tablename->viewAttributes() ?>><?php echo $master_user_permission_view->_tablename->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_permission_view->permission->Visible) { // permission ?>
	<tr id="r_permission">
		<td class="<?php echo $master_user_permission_view->TableLeftColumnClass ?>"><span id="elh_master_user_permission_permission"><?php echo $master_user_permission_view->permission->caption() ?></span></td>
		<td data-name="permission" <?php echo $master_user_permission_view->permission->cellAttributes() ?>>
<span id="el_master_user_permission_permission">
<span<?php echo $master_user_permission_view->permission->viewAttributes() ?>><?php echo $master_user_permission_view->permission->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_user_permission_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_user_permission_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$master_user_permission_view->terminate();
?>