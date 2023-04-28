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
$master_damcatchup_view = new master_damcatchup_view();

// Run the page
$master_damcatchup_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_damcatchup_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_damcatchup_view->isExport()) { ?>
<script>
var fmaster_damcatchupview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_damcatchupview = currentForm = new ew.Form("fmaster_damcatchupview", "view");
	loadjs.done("fmaster_damcatchupview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_damcatchup_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_damcatchup_view->ExportOptions->render("body") ?>
<?php $master_damcatchup_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_damcatchup_view->showPageHeader(); ?>
<?php
$master_damcatchup_view->showMessage();
?>
<form name="fmaster_damcatchupview" id="fmaster_damcatchupview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_damcatchup">
<input type="hidden" name="modal" value="<?php echo (int)$master_damcatchup_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_damcatchup_view->CatchUpId->Visible) { // CatchUpId ?>
	<tr id="r_CatchUpId">
		<td class="<?php echo $master_damcatchup_view->TableLeftColumnClass ?>"><span id="elh_master_damcatchup_CatchUpId"><?php echo $master_damcatchup_view->CatchUpId->caption() ?></span></td>
		<td data-name="CatchUpId" <?php echo $master_damcatchup_view->CatchUpId->cellAttributes() ?>>
<span id="el_master_damcatchup_CatchUpId">
<span<?php echo $master_damcatchup_view->CatchUpId->viewAttributes() ?>><?php echo $master_damcatchup_view->CatchUpId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_damcatchup_view->CatchUpName->Visible) { // CatchUpName ?>
	<tr id="r_CatchUpName">
		<td class="<?php echo $master_damcatchup_view->TableLeftColumnClass ?>"><span id="elh_master_damcatchup_CatchUpName"><?php echo $master_damcatchup_view->CatchUpName->caption() ?></span></td>
		<td data-name="CatchUpName" <?php echo $master_damcatchup_view->CatchUpName->cellAttributes() ?>>
<span id="el_master_damcatchup_CatchUpName">
<span<?php echo $master_damcatchup_view->CatchUpName->viewAttributes() ?>><?php echo $master_damcatchup_view->CatchUpName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_damcatchup_view->CatchUpName_kn->Visible) { // CatchUpName_kn ?>
	<tr id="r_CatchUpName_kn">
		<td class="<?php echo $master_damcatchup_view->TableLeftColumnClass ?>"><span id="elh_master_damcatchup_CatchUpName_kn"><?php echo $master_damcatchup_view->CatchUpName_kn->caption() ?></span></td>
		<td data-name="CatchUpName_kn" <?php echo $master_damcatchup_view->CatchUpName_kn->cellAttributes() ?>>
<span id="el_master_damcatchup_CatchUpName_kn">
<span<?php echo $master_damcatchup_view->CatchUpName_kn->viewAttributes() ?>><?php echo $master_damcatchup_view->CatchUpName_kn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_damcatchup_view->CatchUpName_hi->Visible) { // CatchUpName_hi ?>
	<tr id="r_CatchUpName_hi">
		<td class="<?php echo $master_damcatchup_view->TableLeftColumnClass ?>"><span id="elh_master_damcatchup_CatchUpName_hi"><?php echo $master_damcatchup_view->CatchUpName_hi->caption() ?></span></td>
		<td data-name="CatchUpName_hi" <?php echo $master_damcatchup_view->CatchUpName_hi->cellAttributes() ?>>
<span id="el_master_damcatchup_CatchUpName_hi">
<span<?php echo $master_damcatchup_view->CatchUpName_hi->viewAttributes() ?>><?php echo $master_damcatchup_view->CatchUpName_hi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_damcatchup_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_damcatchup_view->isExport()) { ?>
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
$master_damcatchup_view->terminate();
?>