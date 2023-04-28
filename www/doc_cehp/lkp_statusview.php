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
$lkp_status_view = new lkp_status_view();

// Run the page
$lkp_status_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_status_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_status_view->isExport()) { ?>
<script>
var flkp_statusview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flkp_statusview = currentForm = new ew.Form("flkp_statusview", "view");
	loadjs.done("flkp_statusview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_status_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lkp_status_view->ExportOptions->render("body") ?>
<?php $lkp_status_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lkp_status_view->showPageHeader(); ?>
<?php
$lkp_status_view->showMessage();
?>
<form name="flkp_statusview" id="flkp_statusview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_status">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_status_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lkp_status_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $lkp_status_view->TableLeftColumnClass ?>"><span id="elh_lkp_status_Status"><?php echo $lkp_status_view->Status->caption() ?></span></td>
		<td data-name="Status" <?php echo $lkp_status_view->Status->cellAttributes() ?>>
<span id="el_lkp_status_Status">
<span<?php echo $lkp_status_view->Status->viewAttributes() ?>><?php echo $lkp_status_view->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_status_view->StatusName->Visible) { // StatusName ?>
	<tr id="r_StatusName">
		<td class="<?php echo $lkp_status_view->TableLeftColumnClass ?>"><span id="elh_lkp_status_StatusName"><?php echo $lkp_status_view->StatusName->caption() ?></span></td>
		<td data-name="StatusName" <?php echo $lkp_status_view->StatusName->cellAttributes() ?>>
<span id="el_lkp_status_StatusName">
<span<?php echo $lkp_status_view->StatusName->viewAttributes() ?>><?php echo $lkp_status_view->StatusName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lkp_status_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_status_view->isExport()) { ?>
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
$lkp_status_view->terminate();
?>