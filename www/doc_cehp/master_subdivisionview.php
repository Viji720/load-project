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
$master_subdivision_view = new master_subdivision_view();

// Run the page
$master_subdivision_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_subdivision_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_subdivision_view->isExport()) { ?>
<script>
var fmaster_subdivisionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_subdivisionview = currentForm = new ew.Form("fmaster_subdivisionview", "view");
	loadjs.done("fmaster_subdivisionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_subdivision_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_subdivision_view->ExportOptions->render("body") ?>
<?php $master_subdivision_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_subdivision_view->showPageHeader(); ?>
<?php
$master_subdivision_view->showMessage();
?>
<form name="fmaster_subdivisionview" id="fmaster_subdivisionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_subdivision">
<input type="hidden" name="modal" value="<?php echo (int)$master_subdivision_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_subdivision_view->SubDivisionId->Visible) { // SubDivisionId ?>
	<tr id="r_SubDivisionId">
		<td class="<?php echo $master_subdivision_view->TableLeftColumnClass ?>"><span id="elh_master_subdivision_SubDivisionId"><?php echo $master_subdivision_view->SubDivisionId->caption() ?></span></td>
		<td data-name="SubDivisionId" <?php echo $master_subdivision_view->SubDivisionId->cellAttributes() ?>>
<span id="el_master_subdivision_SubDivisionId">
<span<?php echo $master_subdivision_view->SubDivisionId->viewAttributes() ?>><?php echo $master_subdivision_view->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_subdivision_view->SubDivisionName->Visible) { // SubDivisionName ?>
	<tr id="r_SubDivisionName">
		<td class="<?php echo $master_subdivision_view->TableLeftColumnClass ?>"><span id="elh_master_subdivision_SubDivisionName"><?php echo $master_subdivision_view->SubDivisionName->caption() ?></span></td>
		<td data-name="SubDivisionName" <?php echo $master_subdivision_view->SubDivisionName->cellAttributes() ?>>
<span id="el_master_subdivision_SubDivisionName">
<span<?php echo $master_subdivision_view->SubDivisionName->viewAttributes() ?>><?php echo $master_subdivision_view->SubDivisionName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_subdivision_view->SubDivisionName_kn->Visible) { // SubDivisionName_kn ?>
	<tr id="r_SubDivisionName_kn">
		<td class="<?php echo $master_subdivision_view->TableLeftColumnClass ?>"><span id="elh_master_subdivision_SubDivisionName_kn"><?php echo $master_subdivision_view->SubDivisionName_kn->caption() ?></span></td>
		<td data-name="SubDivisionName_kn" <?php echo $master_subdivision_view->SubDivisionName_kn->cellAttributes() ?>>
<span id="el_master_subdivision_SubDivisionName_kn">
<span<?php echo $master_subdivision_view->SubDivisionName_kn->viewAttributes() ?>><?php echo $master_subdivision_view->SubDivisionName_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_subdivision_view->SubDivisionName_hi->Visible) { // SubDivisionName_hi ?>
	<tr id="r_SubDivisionName_hi">
		<td class="<?php echo $master_subdivision_view->TableLeftColumnClass ?>"><span id="elh_master_subdivision_SubDivisionName_hi"><?php echo $master_subdivision_view->SubDivisionName_hi->caption() ?></span></td>
		<td data-name="SubDivisionName_hi" <?php echo $master_subdivision_view->SubDivisionName_hi->cellAttributes() ?>>
<span id="el_master_subdivision_SubDivisionName_hi">
<span<?php echo $master_subdivision_view->SubDivisionName_hi->viewAttributes() ?>><?php echo $master_subdivision_view->SubDivisionName_hi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_subdivision_view->TalukId->Visible) { // TalukId ?>
	<tr id="r_TalukId">
		<td class="<?php echo $master_subdivision_view->TableLeftColumnClass ?>"><span id="elh_master_subdivision_TalukId"><?php echo $master_subdivision_view->TalukId->caption() ?></span></td>
		<td data-name="TalukId" <?php echo $master_subdivision_view->TalukId->cellAttributes() ?>>
<span id="el_master_subdivision_TalukId">
<span<?php echo $master_subdivision_view->TalukId->viewAttributes() ?>><?php echo $master_subdivision_view->TalukId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_subdivision_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_subdivision_view->isExport()) { ?>
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
$master_subdivision_view->terminate();
?>