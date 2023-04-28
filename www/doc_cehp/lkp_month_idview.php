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
$lkp_month_id_view = new lkp_month_id_view();

// Run the page
$lkp_month_id_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_month_id_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_month_id_view->isExport()) { ?>
<script>
var flkp_month_idview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flkp_month_idview = currentForm = new ew.Form("flkp_month_idview", "view");
	loadjs.done("flkp_month_idview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_month_id_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lkp_month_id_view->ExportOptions->render("body") ?>
<?php $lkp_month_id_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lkp_month_id_view->showPageHeader(); ?>
<?php
$lkp_month_id_view->showMessage();
?>
<form name="flkp_month_idview" id="flkp_month_idview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_month_id">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_month_id_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lkp_month_id_view->month_id->Visible) { // month_id ?>
	<tr id="r_month_id">
		<td class="<?php echo $lkp_month_id_view->TableLeftColumnClass ?>"><span id="elh_lkp_month_id_month_id"><?php echo $lkp_month_id_view->month_id->caption() ?></span></td>
		<td data-name="month_id" <?php echo $lkp_month_id_view->month_id->cellAttributes() ?>>
<span id="el_lkp_month_id_month_id">
<span<?php echo $lkp_month_id_view->month_id->viewAttributes() ?>><?php echo $lkp_month_id_view->month_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_month_id_view->month_Name->Visible) { // month_Name ?>
	<tr id="r_month_Name">
		<td class="<?php echo $lkp_month_id_view->TableLeftColumnClass ?>"><span id="elh_lkp_month_id_month_Name"><?php echo $lkp_month_id_view->month_Name->caption() ?></span></td>
		<td data-name="month_Name" <?php echo $lkp_month_id_view->month_Name->cellAttributes() ?>>
<span id="el_lkp_month_id_month_Name">
<span<?php echo $lkp_month_id_view->month_Name->viewAttributes() ?>><?php echo $lkp_month_id_view->month_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lkp_month_id_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_month_id_view->isExport()) { ?>
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
$lkp_month_id_view->terminate();
?>