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
$master_basin_view = new master_basin_view();

// Run the page
$master_basin_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_basin_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_basin_view->isExport()) { ?>
<script>
var fmaster_basinview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_basinview = currentForm = new ew.Form("fmaster_basinview", "view");
	loadjs.done("fmaster_basinview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_basin_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_basin_view->ExportOptions->render("body") ?>
<?php $master_basin_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_basin_view->showPageHeader(); ?>
<?php
$master_basin_view->showMessage();
?>
<form name="fmaster_basinview" id="fmaster_basinview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_basin">
<input type="hidden" name="modal" value="<?php echo (int)$master_basin_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_basin_view->BasinId->Visible) { // BasinId ?>
	<tr id="r_BasinId">
		<td class="<?php echo $master_basin_view->TableLeftColumnClass ?>"><span id="elh_master_basin_BasinId"><?php echo $master_basin_view->BasinId->caption() ?></span></td>
		<td data-name="BasinId" <?php echo $master_basin_view->BasinId->cellAttributes() ?>>
<span id="el_master_basin_BasinId">
<span<?php echo $master_basin_view->BasinId->viewAttributes() ?>><?php echo $master_basin_view->BasinId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_basin_view->BasinName->Visible) { // BasinName ?>
	<tr id="r_BasinName">
		<td class="<?php echo $master_basin_view->TableLeftColumnClass ?>"><span id="elh_master_basin_BasinName"><?php echo $master_basin_view->BasinName->caption() ?></span></td>
		<td data-name="BasinName" <?php echo $master_basin_view->BasinName->cellAttributes() ?>>
<span id="el_master_basin_BasinName">
<span<?php echo $master_basin_view->BasinName->viewAttributes() ?>><?php echo $master_basin_view->BasinName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_basin_view->BasinName_kn->Visible) { // BasinName_kn ?>
	<tr id="r_BasinName_kn">
		<td class="<?php echo $master_basin_view->TableLeftColumnClass ?>"><span id="elh_master_basin_BasinName_kn"><?php echo $master_basin_view->BasinName_kn->caption() ?></span></td>
		<td data-name="BasinName_kn" <?php echo $master_basin_view->BasinName_kn->cellAttributes() ?>>
<span id="el_master_basin_BasinName_kn">
<span<?php echo $master_basin_view->BasinName_kn->viewAttributes() ?>><?php echo $master_basin_view->BasinName_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_basin_view->BasinName_hi->Visible) { // BasinName_hi ?>
	<tr id="r_BasinName_hi">
		<td class="<?php echo $master_basin_view->TableLeftColumnClass ?>"><span id="elh_master_basin_BasinName_hi"><?php echo $master_basin_view->BasinName_hi->caption() ?></span></td>
		<td data-name="BasinName_hi" <?php echo $master_basin_view->BasinName_hi->cellAttributes() ?>>
<span id="el_master_basin_BasinName_hi">
<span<?php echo $master_basin_view->BasinName_hi->viewAttributes() ?>><?php echo $master_basin_view->BasinName_hi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_basin_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_basin_view->isExport()) { ?>
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
$master_basin_view->terminate();
?>