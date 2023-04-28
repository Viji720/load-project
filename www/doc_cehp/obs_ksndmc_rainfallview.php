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
$obs_ksndmc_rainfall_view = new obs_ksndmc_rainfall_view();

// Run the page
$obs_ksndmc_rainfall_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_ksndmc_rainfall_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$obs_ksndmc_rainfall_view->isExport()) { ?>
<script>
var fobs_ksndmc_rainfallview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fobs_ksndmc_rainfallview = currentForm = new ew.Form("fobs_ksndmc_rainfallview", "view");
	loadjs.done("fobs_ksndmc_rainfallview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$obs_ksndmc_rainfall_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $obs_ksndmc_rainfall_view->ExportOptions->render("body") ?>
<?php $obs_ksndmc_rainfall_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $obs_ksndmc_rainfall_view->showPageHeader(); ?>
<?php
$obs_ksndmc_rainfall_view->showMessage();
?>
<form name="fobs_ksndmc_rainfallview" id="fobs_ksndmc_rainfallview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_ksndmc_rainfall">
<input type="hidden" name="modal" value="<?php echo (int)$obs_ksndmc_rainfall_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($obs_ksndmc_rainfall_view->Raingauge_id->Visible) { // Raingauge_id ?>
	<tr id="r_Raingauge_id">
		<td class="<?php echo $obs_ksndmc_rainfall_view->TableLeftColumnClass ?>"><span id="elh_obs_ksndmc_rainfall_Raingauge_id"><?php echo $obs_ksndmc_rainfall_view->Raingauge_id->caption() ?></span></td>
		<td data-name="Raingauge_id" <?php echo $obs_ksndmc_rainfall_view->Raingauge_id->cellAttributes() ?>>
<span id="el_obs_ksndmc_rainfall_Raingauge_id">
<span<?php echo $obs_ksndmc_rainfall_view->Raingauge_id->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_view->Raingauge_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_view->obs_datetime->Visible) { // obs_datetime ?>
	<tr id="r_obs_datetime">
		<td class="<?php echo $obs_ksndmc_rainfall_view->TableLeftColumnClass ?>"><span id="elh_obs_ksndmc_rainfall_obs_datetime"><?php echo $obs_ksndmc_rainfall_view->obs_datetime->caption() ?></span></td>
		<td data-name="obs_datetime" <?php echo $obs_ksndmc_rainfall_view->obs_datetime->cellAttributes() ?>>
<span id="el_obs_ksndmc_rainfall_obs_datetime">
<span<?php echo $obs_ksndmc_rainfall_view->obs_datetime->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_view->obs_datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_view->rainfall->Visible) { // rainfall ?>
	<tr id="r_rainfall">
		<td class="<?php echo $obs_ksndmc_rainfall_view->TableLeftColumnClass ?>"><span id="elh_obs_ksndmc_rainfall_rainfall"><?php echo $obs_ksndmc_rainfall_view->rainfall->caption() ?></span></td>
		<td data-name="rainfall" <?php echo $obs_ksndmc_rainfall_view->rainfall->cellAttributes() ?>>
<span id="el_obs_ksndmc_rainfall_rainfall">
<span<?php echo $obs_ksndmc_rainfall_view->rainfall->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_view->rainfall->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$obs_ksndmc_rainfall_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$obs_ksndmc_rainfall_view->isExport()) { ?>
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
$obs_ksndmc_rainfall_view->terminate();
?>