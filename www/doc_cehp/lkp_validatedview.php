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
$lkp_validated_view = new lkp_validated_view();

// Run the page
$lkp_validated_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_validated_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_validated_view->isExport()) { ?>
<script>
var flkp_validatedview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flkp_validatedview = currentForm = new ew.Form("flkp_validatedview", "view");
	loadjs.done("flkp_validatedview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_validated_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lkp_validated_view->ExportOptions->render("body") ?>
<?php $lkp_validated_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lkp_validated_view->showPageHeader(); ?>
<?php
$lkp_validated_view->showMessage();
?>
<form name="flkp_validatedview" id="flkp_validatedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_validated">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_validated_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lkp_validated_view->validated->Visible) { // validated ?>
	<tr id="r_validated">
		<td class="<?php echo $lkp_validated_view->TableLeftColumnClass ?>"><span id="elh_lkp_validated_validated"><?php echo $lkp_validated_view->validated->caption() ?></span></td>
		<td data-name="validated" <?php echo $lkp_validated_view->validated->cellAttributes() ?>>
<span id="el_lkp_validated_validated">
<span<?php echo $lkp_validated_view->validated->viewAttributes() ?>><?php echo $lkp_validated_view->validated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_validated_view->validatedName->Visible) { // validatedName ?>
	<tr id="r_validatedName">
		<td class="<?php echo $lkp_validated_view->TableLeftColumnClass ?>"><span id="elh_lkp_validated_validatedName"><?php echo $lkp_validated_view->validatedName->caption() ?></span></td>
		<td data-name="validatedName" <?php echo $lkp_validated_view->validatedName->cellAttributes() ?>>
<span id="el_lkp_validated_validatedName">
<span<?php echo $lkp_validated_view->validatedName->viewAttributes() ?>><?php echo $lkp_validated_view->validatedName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_validated_view->is_station_allowed->Visible) { // is_station_allowed ?>
	<tr id="r_is_station_allowed">
		<td class="<?php echo $lkp_validated_view->TableLeftColumnClass ?>"><span id="elh_lkp_validated_is_station_allowed"><?php echo $lkp_validated_view->is_station_allowed->caption() ?></span></td>
		<td data-name="is_station_allowed" <?php echo $lkp_validated_view->is_station_allowed->cellAttributes() ?>>
<span id="el_lkp_validated_is_station_allowed">
<span<?php echo $lkp_validated_view->is_station_allowed->viewAttributes() ?>><?php echo $lkp_validated_view->is_station_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_validated_view->is_subdiv_allowed->Visible) { // is_subdiv_allowed ?>
	<tr id="r_is_subdiv_allowed">
		<td class="<?php echo $lkp_validated_view->TableLeftColumnClass ?>"><span id="elh_lkp_validated_is_subdiv_allowed"><?php echo $lkp_validated_view->is_subdiv_allowed->caption() ?></span></td>
		<td data-name="is_subdiv_allowed" <?php echo $lkp_validated_view->is_subdiv_allowed->cellAttributes() ?>>
<span id="el_lkp_validated_is_subdiv_allowed">
<span<?php echo $lkp_validated_view->is_subdiv_allowed->viewAttributes() ?>><?php echo $lkp_validated_view->is_subdiv_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_validated_view->is_circle_allowed->Visible) { // is_circle_allowed ?>
	<tr id="r_is_circle_allowed">
		<td class="<?php echo $lkp_validated_view->TableLeftColumnClass ?>"><span id="elh_lkp_validated_is_circle_allowed"><?php echo $lkp_validated_view->is_circle_allowed->caption() ?></span></td>
		<td data-name="is_circle_allowed" <?php echo $lkp_validated_view->is_circle_allowed->cellAttributes() ?>>
<span id="el_lkp_validated_is_circle_allowed">
<span<?php echo $lkp_validated_view->is_circle_allowed->viewAttributes() ?>><?php echo $lkp_validated_view->is_circle_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_validated_view->is_WRDO_allowed->Visible) { // is_WRDO_allowed ?>
	<tr id="r_is_WRDO_allowed">
		<td class="<?php echo $lkp_validated_view->TableLeftColumnClass ?>"><span id="elh_lkp_validated_is_WRDO_allowed"><?php echo $lkp_validated_view->is_WRDO_allowed->caption() ?></span></td>
		<td data-name="is_WRDO_allowed" <?php echo $lkp_validated_view->is_WRDO_allowed->cellAttributes() ?>>
<span id="el_lkp_validated_is_WRDO_allowed">
<span<?php echo $lkp_validated_view->is_WRDO_allowed->viewAttributes() ?>><?php echo $lkp_validated_view->is_WRDO_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_validated_view->record_count->Visible) { // record_count ?>
	<tr id="r_record_count">
		<td class="<?php echo $lkp_validated_view->TableLeftColumnClass ?>"><span id="elh_lkp_validated_record_count"><?php echo $lkp_validated_view->record_count->caption() ?></span></td>
		<td data-name="record_count" <?php echo $lkp_validated_view->record_count->cellAttributes() ?>>
<span id="el_lkp_validated_record_count">
<span<?php echo $lkp_validated_view->record_count->viewAttributes() ?>><?php echo $lkp_validated_view->record_count->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lkp_validated_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_validated_view->isExport()) { ?>
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
$lkp_validated_view->terminate();
?>