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
$master_river_view = new master_river_view();

// Run the page
$master_river_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_river_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_river_view->isExport()) { ?>
<script>
var fmaster_riverview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_riverview = currentForm = new ew.Form("fmaster_riverview", "view");
	loadjs.done("fmaster_riverview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_river_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_river_view->ExportOptions->render("body") ?>
<?php $master_river_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_river_view->showPageHeader(); ?>
<?php
$master_river_view->showMessage();
?>
<form name="fmaster_riverview" id="fmaster_riverview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_river">
<input type="hidden" name="modal" value="<?php echo (int)$master_river_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_river_view->RiverId->Visible) { // RiverId ?>
	<tr id="r_RiverId">
		<td class="<?php echo $master_river_view->TableLeftColumnClass ?>"><span id="elh_master_river_RiverId"><?php echo $master_river_view->RiverId->caption() ?></span></td>
		<td data-name="RiverId" <?php echo $master_river_view->RiverId->cellAttributes() ?>>
<span id="el_master_river_RiverId">
<span<?php echo $master_river_view->RiverId->viewAttributes() ?>><?php echo $master_river_view->RiverId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_river_view->RiverName->Visible) { // RiverName ?>
	<tr id="r_RiverName">
		<td class="<?php echo $master_river_view->TableLeftColumnClass ?>"><span id="elh_master_river_RiverName"><?php echo $master_river_view->RiverName->caption() ?></span></td>
		<td data-name="RiverName" <?php echo $master_river_view->RiverName->cellAttributes() ?>>
<span id="el_master_river_RiverName">
<span<?php echo $master_river_view->RiverName->viewAttributes() ?>><?php echo $master_river_view->RiverName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_river_view->RiverName_kn->Visible) { // RiverName_kn ?>
	<tr id="r_RiverName_kn">
		<td class="<?php echo $master_river_view->TableLeftColumnClass ?>"><span id="elh_master_river_RiverName_kn"><?php echo $master_river_view->RiverName_kn->caption() ?></span></td>
		<td data-name="RiverName_kn" <?php echo $master_river_view->RiverName_kn->cellAttributes() ?>>
<span id="el_master_river_RiverName_kn">
<span<?php echo $master_river_view->RiverName_kn->viewAttributes() ?>><?php echo $master_river_view->RiverName_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_river_view->RiverName_hi->Visible) { // RiverName_hi ?>
	<tr id="r_RiverName_hi">
		<td class="<?php echo $master_river_view->TableLeftColumnClass ?>"><span id="elh_master_river_RiverName_hi"><?php echo $master_river_view->RiverName_hi->caption() ?></span></td>
		<td data-name="RiverName_hi" <?php echo $master_river_view->RiverName_hi->cellAttributes() ?>>
<span id="el_master_river_RiverName_hi">
<span<?php echo $master_river_view->RiverName_hi->viewAttributes() ?>><?php echo $master_river_view->RiverName_hi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_river_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_river_view->isExport()) { ?>
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
$master_river_view->terminate();
?>