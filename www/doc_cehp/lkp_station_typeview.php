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
$lkp_station_type_view = new lkp_station_type_view();

// Run the page
$lkp_station_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_station_type_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_station_type_view->isExport()) { ?>
<script>
var flkp_station_typeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flkp_station_typeview = currentForm = new ew.Form("flkp_station_typeview", "view");
	loadjs.done("flkp_station_typeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_station_type_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lkp_station_type_view->ExportOptions->render("body") ?>
<?php $lkp_station_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lkp_station_type_view->showPageHeader(); ?>
<?php
$lkp_station_type_view->showMessage();
?>
<form name="flkp_station_typeview" id="flkp_station_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_station_type">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_station_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lkp_station_type_view->station_type->Visible) { // station_type ?>
	<tr id="r_station_type">
		<td class="<?php echo $lkp_station_type_view->TableLeftColumnClass ?>"><span id="elh_lkp_station_type_station_type"><?php echo $lkp_station_type_view->station_type->caption() ?></span></td>
		<td data-name="station_type" <?php echo $lkp_station_type_view->station_type->cellAttributes() ?>>
<span id="el_lkp_station_type_station_type">
<span<?php echo $lkp_station_type_view->station_type->viewAttributes() ?>><?php echo $lkp_station_type_view->station_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_station_type_view->station_type_name->Visible) { // station_type_name ?>
	<tr id="r_station_type_name">
		<td class="<?php echo $lkp_station_type_view->TableLeftColumnClass ?>"><span id="elh_lkp_station_type_station_type_name"><?php echo $lkp_station_type_view->station_type_name->caption() ?></span></td>
		<td data-name="station_type_name" <?php echo $lkp_station_type_view->station_type_name->cellAttributes() ?>>
<span id="el_lkp_station_type_station_type_name">
<span<?php echo $lkp_station_type_view->station_type_name->viewAttributes() ?>><?php echo $lkp_station_type_view->station_type_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_station_type_view->record_count->Visible) { // record_count ?>
	<tr id="r_record_count">
		<td class="<?php echo $lkp_station_type_view->TableLeftColumnClass ?>"><span id="elh_lkp_station_type_record_count"><?php echo $lkp_station_type_view->record_count->caption() ?></span></td>
		<td data-name="record_count" <?php echo $lkp_station_type_view->record_count->cellAttributes() ?>>
<span id="el_lkp_station_type_record_count">
<span<?php echo $lkp_station_type_view->record_count->viewAttributes() ?>><?php echo $lkp_station_type_view->record_count->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_station_type_view->station_type_name_kn->Visible) { // station_type_name_kn ?>
	<tr id="r_station_type_name_kn">
		<td class="<?php echo $lkp_station_type_view->TableLeftColumnClass ?>"><span id="elh_lkp_station_type_station_type_name_kn"><?php echo $lkp_station_type_view->station_type_name_kn->caption() ?></span></td>
		<td data-name="station_type_name_kn" <?php echo $lkp_station_type_view->station_type_name_kn->cellAttributes() ?>>
<span id="el_lkp_station_type_station_type_name_kn">
<span<?php echo $lkp_station_type_view->station_type_name_kn->viewAttributes() ?>><?php echo $lkp_station_type_view->station_type_name_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lkp_station_type_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_station_type_view->isExport()) { ?>
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
$lkp_station_type_view->terminate();
?>