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
$master_district_view = new master_district_view();

// Run the page
$master_district_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_district_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_district_view->isExport()) { ?>
<script>
var fmaster_districtview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_districtview = currentForm = new ew.Form("fmaster_districtview", "view");
	loadjs.done("fmaster_districtview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_district_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_district_view->ExportOptions->render("body") ?>
<?php $master_district_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_district_view->showPageHeader(); ?>
<?php
$master_district_view->showMessage();
?>
<form name="fmaster_districtview" id="fmaster_districtview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_district">
<input type="hidden" name="modal" value="<?php echo (int)$master_district_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_district_view->DistrictId->Visible) { // DistrictId ?>
	<tr id="r_DistrictId">
		<td class="<?php echo $master_district_view->TableLeftColumnClass ?>"><span id="elh_master_district_DistrictId"><?php echo $master_district_view->DistrictId->caption() ?></span></td>
		<td data-name="DistrictId" <?php echo $master_district_view->DistrictId->cellAttributes() ?>>
<span id="el_master_district_DistrictId">
<span<?php echo $master_district_view->DistrictId->viewAttributes() ?>><?php echo $master_district_view->DistrictId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_district_view->DistrictName->Visible) { // DistrictName ?>
	<tr id="r_DistrictName">
		<td class="<?php echo $master_district_view->TableLeftColumnClass ?>"><span id="elh_master_district_DistrictName"><?php echo $master_district_view->DistrictName->caption() ?></span></td>
		<td data-name="DistrictName" <?php echo $master_district_view->DistrictName->cellAttributes() ?>>
<span id="el_master_district_DistrictName">
<span<?php echo $master_district_view->DistrictName->viewAttributes() ?>><?php echo $master_district_view->DistrictName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_district_view->DistrictName_kn->Visible) { // DistrictName_kn ?>
	<tr id="r_DistrictName_kn">
		<td class="<?php echo $master_district_view->TableLeftColumnClass ?>"><span id="elh_master_district_DistrictName_kn"><?php echo $master_district_view->DistrictName_kn->caption() ?></span></td>
		<td data-name="DistrictName_kn" <?php echo $master_district_view->DistrictName_kn->cellAttributes() ?>>
<span id="el_master_district_DistrictName_kn">
<span<?php echo $master_district_view->DistrictName_kn->viewAttributes() ?>><?php echo $master_district_view->DistrictName_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_district_view->DistrictName_hi->Visible) { // DistrictName_hi ?>
	<tr id="r_DistrictName_hi">
		<td class="<?php echo $master_district_view->TableLeftColumnClass ?>"><span id="elh_master_district_DistrictName_hi"><?php echo $master_district_view->DistrictName_hi->caption() ?></span></td>
		<td data-name="DistrictName_hi" <?php echo $master_district_view->DistrictName_hi->cellAttributes() ?>>
<span id="el_master_district_DistrictName_hi">
<span<?php echo $master_district_view->DistrictName_hi->viewAttributes() ?>><?php echo $master_district_view->DistrictName_hi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_district_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_district_view->isExport()) { ?>
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
$master_district_view->terminate();
?>