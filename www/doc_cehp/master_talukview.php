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
$master_taluk_view = new master_taluk_view();

// Run the page
$master_taluk_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_taluk_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_taluk_view->isExport()) { ?>
<script>
var fmaster_talukview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_talukview = currentForm = new ew.Form("fmaster_talukview", "view");
	loadjs.done("fmaster_talukview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_taluk_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_taluk_view->ExportOptions->render("body") ?>
<?php $master_taluk_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_taluk_view->showPageHeader(); ?>
<?php
$master_taluk_view->showMessage();
?>
<form name="fmaster_talukview" id="fmaster_talukview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_taluk">
<input type="hidden" name="modal" value="<?php echo (int)$master_taluk_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_taluk_view->TalukId->Visible) { // TalukId ?>
	<tr id="r_TalukId">
		<td class="<?php echo $master_taluk_view->TableLeftColumnClass ?>"><span id="elh_master_taluk_TalukId"><?php echo $master_taluk_view->TalukId->caption() ?></span></td>
		<td data-name="TalukId" <?php echo $master_taluk_view->TalukId->cellAttributes() ?>>
<span id="el_master_taluk_TalukId">
<span<?php echo $master_taluk_view->TalukId->viewAttributes() ?>><?php echo $master_taluk_view->TalukId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_taluk_view->TalukName->Visible) { // TalukName ?>
	<tr id="r_TalukName">
		<td class="<?php echo $master_taluk_view->TableLeftColumnClass ?>"><span id="elh_master_taluk_TalukName"><?php echo $master_taluk_view->TalukName->caption() ?></span></td>
		<td data-name="TalukName" <?php echo $master_taluk_view->TalukName->cellAttributes() ?>>
<span id="el_master_taluk_TalukName">
<span<?php echo $master_taluk_view->TalukName->viewAttributes() ?>><?php echo $master_taluk_view->TalukName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_taluk_view->TalukName_kn->Visible) { // TalukName_kn ?>
	<tr id="r_TalukName_kn">
		<td class="<?php echo $master_taluk_view->TableLeftColumnClass ?>"><span id="elh_master_taluk_TalukName_kn"><?php echo $master_taluk_view->TalukName_kn->caption() ?></span></td>
		<td data-name="TalukName_kn" <?php echo $master_taluk_view->TalukName_kn->cellAttributes() ?>>
<span id="el_master_taluk_TalukName_kn">
<span<?php echo $master_taluk_view->TalukName_kn->viewAttributes() ?>><?php echo $master_taluk_view->TalukName_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_taluk_view->TalukName_hi->Visible) { // TalukName_hi ?>
	<tr id="r_TalukName_hi">
		<td class="<?php echo $master_taluk_view->TableLeftColumnClass ?>"><span id="elh_master_taluk_TalukName_hi"><?php echo $master_taluk_view->TalukName_hi->caption() ?></span></td>
		<td data-name="TalukName_hi" <?php echo $master_taluk_view->TalukName_hi->cellAttributes() ?>>
<span id="el_master_taluk_TalukName_hi">
<span<?php echo $master_taluk_view->TalukName_hi->viewAttributes() ?>><?php echo $master_taluk_view->TalukName_hi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_taluk_view->DistrictId->Visible) { // DistrictId ?>
	<tr id="r_DistrictId">
		<td class="<?php echo $master_taluk_view->TableLeftColumnClass ?>"><span id="elh_master_taluk_DistrictId"><?php echo $master_taluk_view->DistrictId->caption() ?></span></td>
		<td data-name="DistrictId" <?php echo $master_taluk_view->DistrictId->cellAttributes() ?>>
<span id="el_master_taluk_DistrictId">
<span<?php echo $master_taluk_view->DistrictId->viewAttributes() ?>><?php echo $master_taluk_view->DistrictId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_taluk_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_taluk_view->isExport()) { ?>
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
$master_taluk_view->terminate();
?>