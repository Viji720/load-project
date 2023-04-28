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
$master_subbasin_view = new master_subbasin_view();

// Run the page
$master_subbasin_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_subbasin_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_subbasin_view->isExport()) { ?>
<script>
var fmaster_subbasinview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_subbasinview = currentForm = new ew.Form("fmaster_subbasinview", "view");
	loadjs.done("fmaster_subbasinview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_subbasin_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_subbasin_view->ExportOptions->render("body") ?>
<?php $master_subbasin_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_subbasin_view->showPageHeader(); ?>
<?php
$master_subbasin_view->showMessage();
?>
<form name="fmaster_subbasinview" id="fmaster_subbasinview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_subbasin">
<input type="hidden" name="modal" value="<?php echo (int)$master_subbasin_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_subbasin_view->SubBasinId->Visible) { // SubBasinId ?>
	<tr id="r_SubBasinId">
		<td class="<?php echo $master_subbasin_view->TableLeftColumnClass ?>"><span id="elh_master_subbasin_SubBasinId"><?php echo $master_subbasin_view->SubBasinId->caption() ?></span></td>
		<td data-name="SubBasinId" <?php echo $master_subbasin_view->SubBasinId->cellAttributes() ?>>
<span id="el_master_subbasin_SubBasinId">
<span<?php echo $master_subbasin_view->SubBasinId->viewAttributes() ?>><?php echo $master_subbasin_view->SubBasinId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_subbasin_view->SubBasinName->Visible) { // SubBasinName ?>
	<tr id="r_SubBasinName">
		<td class="<?php echo $master_subbasin_view->TableLeftColumnClass ?>"><span id="elh_master_subbasin_SubBasinName"><?php echo $master_subbasin_view->SubBasinName->caption() ?></span></td>
		<td data-name="SubBasinName" <?php echo $master_subbasin_view->SubBasinName->cellAttributes() ?>>
<span id="el_master_subbasin_SubBasinName">
<span<?php echo $master_subbasin_view->SubBasinName->viewAttributes() ?>><?php echo $master_subbasin_view->SubBasinName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_subbasin_view->SubBasinName_kn->Visible) { // SubBasinName_kn ?>
	<tr id="r_SubBasinName_kn">
		<td class="<?php echo $master_subbasin_view->TableLeftColumnClass ?>"><span id="elh_master_subbasin_SubBasinName_kn"><?php echo $master_subbasin_view->SubBasinName_kn->caption() ?></span></td>
		<td data-name="SubBasinName_kn" <?php echo $master_subbasin_view->SubBasinName_kn->cellAttributes() ?>>
<span id="el_master_subbasin_SubBasinName_kn">
<span<?php echo $master_subbasin_view->SubBasinName_kn->viewAttributes() ?>><?php echo $master_subbasin_view->SubBasinName_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_subbasin_view->SubBasinName_hi->Visible) { // SubBasinName_hi ?>
	<tr id="r_SubBasinName_hi">
		<td class="<?php echo $master_subbasin_view->TableLeftColumnClass ?>"><span id="elh_master_subbasin_SubBasinName_hi"><?php echo $master_subbasin_view->SubBasinName_hi->caption() ?></span></td>
		<td data-name="SubBasinName_hi" <?php echo $master_subbasin_view->SubBasinName_hi->cellAttributes() ?>>
<span id="el_master_subbasin_SubBasinName_hi">
<span<?php echo $master_subbasin_view->SubBasinName_hi->viewAttributes() ?>><?php echo $master_subbasin_view->SubBasinName_hi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_subbasin_view->BasinId->Visible) { // BasinId ?>
	<tr id="r_BasinId">
		<td class="<?php echo $master_subbasin_view->TableLeftColumnClass ?>"><span id="elh_master_subbasin_BasinId"><?php echo $master_subbasin_view->BasinId->caption() ?></span></td>
		<td data-name="BasinId" <?php echo $master_subbasin_view->BasinId->cellAttributes() ?>>
<span id="el_master_subbasin_BasinId">
<span<?php echo $master_subbasin_view->BasinId->viewAttributes() ?>><?php echo $master_subbasin_view->BasinId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_subbasin_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_subbasin_view->isExport()) { ?>
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
$master_subbasin_view->terminate();
?>