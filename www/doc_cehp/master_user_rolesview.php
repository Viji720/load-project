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
$master_user_roles_view = new master_user_roles_view();

// Run the page
$master_user_roles_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_roles_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_user_roles_view->isExport()) { ?>
<script>
var fmaster_user_rolesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_user_rolesview = currentForm = new ew.Form("fmaster_user_rolesview", "view");
	loadjs.done("fmaster_user_rolesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_user_roles_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_user_roles_view->ExportOptions->render("body") ?>
<?php $master_user_roles_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_user_roles_view->showPageHeader(); ?>
<?php
$master_user_roles_view->showMessage();
?>
<form name="fmaster_user_rolesview" id="fmaster_user_rolesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user_roles">
<input type="hidden" name="modal" value="<?php echo (int)$master_user_roles_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_user_roles_view->RoleId->Visible) { // RoleId ?>
	<tr id="r_RoleId">
		<td class="<?php echo $master_user_roles_view->TableLeftColumnClass ?>"><span id="elh_master_user_roles_RoleId"><?php echo $master_user_roles_view->RoleId->caption() ?></span></td>
		<td data-name="RoleId" <?php echo $master_user_roles_view->RoleId->cellAttributes() ?>>
<span id="el_master_user_roles_RoleId">
<span<?php echo $master_user_roles_view->RoleId->viewAttributes() ?>><?php echo $master_user_roles_view->RoleId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_roles_view->RoleName->Visible) { // RoleName ?>
	<tr id="r_RoleName">
		<td class="<?php echo $master_user_roles_view->TableLeftColumnClass ?>"><span id="elh_master_user_roles_RoleName"><?php echo $master_user_roles_view->RoleName->caption() ?></span></td>
		<td data-name="RoleName" <?php echo $master_user_roles_view->RoleName->cellAttributes() ?>>
<span id="el_master_user_roles_RoleName">
<span<?php echo $master_user_roles_view->RoleName->viewAttributes() ?>><?php echo $master_user_roles_view->RoleName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_user_roles_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_user_roles_view->isExport()) { ?>
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
$master_user_roles_view->terminate();
?>