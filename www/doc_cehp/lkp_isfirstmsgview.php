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
$lkp_isfirstmsg_view = new lkp_isfirstmsg_view();

// Run the page
$lkp_isfirstmsg_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_isfirstmsg_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_isfirstmsg_view->isExport()) { ?>
<script>
var flkp_isfirstmsgview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flkp_isfirstmsgview = currentForm = new ew.Form("flkp_isfirstmsgview", "view");
	loadjs.done("flkp_isfirstmsgview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_isfirstmsg_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lkp_isfirstmsg_view->ExportOptions->render("body") ?>
<?php $lkp_isfirstmsg_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lkp_isfirstmsg_view->showPageHeader(); ?>
<?php
$lkp_isfirstmsg_view->showMessage();
?>
<form name="flkp_isfirstmsgview" id="flkp_isfirstmsgview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_isfirstmsg">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_isfirstmsg_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lkp_isfirstmsg_view->isFirstMsg->Visible) { // isFirstMsg ?>
	<tr id="r_isFirstMsg">
		<td class="<?php echo $lkp_isfirstmsg_view->TableLeftColumnClass ?>"><span id="elh_lkp_isfirstmsg_isFirstMsg"><?php echo $lkp_isfirstmsg_view->isFirstMsg->caption() ?></span></td>
		<td data-name="isFirstMsg" <?php echo $lkp_isfirstmsg_view->isFirstMsg->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_isFirstMsg">
<span<?php echo $lkp_isfirstmsg_view->isFirstMsg->viewAttributes() ?>><?php echo $lkp_isfirstmsg_view->isFirstMsg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_isfirstmsg_view->isFirstMsgName->Visible) { // isFirstMsgName ?>
	<tr id="r_isFirstMsgName">
		<td class="<?php echo $lkp_isfirstmsg_view->TableLeftColumnClass ?>"><span id="elh_lkp_isfirstmsg_isFirstMsgName"><?php echo $lkp_isfirstmsg_view->isFirstMsgName->caption() ?></span></td>
		<td data-name="isFirstMsgName" <?php echo $lkp_isfirstmsg_view->isFirstMsgName->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_isFirstMsgName">
<span<?php echo $lkp_isfirstmsg_view->isFirstMsgName->viewAttributes() ?>><?php echo $lkp_isfirstmsg_view->isFirstMsgName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_isfirstmsg_view->is_station_allowed->Visible) { // is_station_allowed ?>
	<tr id="r_is_station_allowed">
		<td class="<?php echo $lkp_isfirstmsg_view->TableLeftColumnClass ?>"><span id="elh_lkp_isfirstmsg_is_station_allowed"><?php echo $lkp_isfirstmsg_view->is_station_allowed->caption() ?></span></td>
		<td data-name="is_station_allowed" <?php echo $lkp_isfirstmsg_view->is_station_allowed->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_is_station_allowed">
<span<?php echo $lkp_isfirstmsg_view->is_station_allowed->viewAttributes() ?>><?php echo $lkp_isfirstmsg_view->is_station_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_isfirstmsg_view->is_subdiv_allowed->Visible) { // is_subdiv_allowed ?>
	<tr id="r_is_subdiv_allowed">
		<td class="<?php echo $lkp_isfirstmsg_view->TableLeftColumnClass ?>"><span id="elh_lkp_isfirstmsg_is_subdiv_allowed"><?php echo $lkp_isfirstmsg_view->is_subdiv_allowed->caption() ?></span></td>
		<td data-name="is_subdiv_allowed" <?php echo $lkp_isfirstmsg_view->is_subdiv_allowed->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_is_subdiv_allowed">
<span<?php echo $lkp_isfirstmsg_view->is_subdiv_allowed->viewAttributes() ?>><?php echo $lkp_isfirstmsg_view->is_subdiv_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_isfirstmsg_view->is_circle_allowed->Visible) { // is_circle_allowed ?>
	<tr id="r_is_circle_allowed">
		<td class="<?php echo $lkp_isfirstmsg_view->TableLeftColumnClass ?>"><span id="elh_lkp_isfirstmsg_is_circle_allowed"><?php echo $lkp_isfirstmsg_view->is_circle_allowed->caption() ?></span></td>
		<td data-name="is_circle_allowed" <?php echo $lkp_isfirstmsg_view->is_circle_allowed->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_is_circle_allowed">
<span<?php echo $lkp_isfirstmsg_view->is_circle_allowed->viewAttributes() ?>><?php echo $lkp_isfirstmsg_view->is_circle_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_isfirstmsg_view->is_WRDO_allowed->Visible) { // is_WRDO_allowed ?>
	<tr id="r_is_WRDO_allowed">
		<td class="<?php echo $lkp_isfirstmsg_view->TableLeftColumnClass ?>"><span id="elh_lkp_isfirstmsg_is_WRDO_allowed"><?php echo $lkp_isfirstmsg_view->is_WRDO_allowed->caption() ?></span></td>
		<td data-name="is_WRDO_allowed" <?php echo $lkp_isfirstmsg_view->is_WRDO_allowed->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_is_WRDO_allowed">
<span<?php echo $lkp_isfirstmsg_view->is_WRDO_allowed->viewAttributes() ?>><?php echo $lkp_isfirstmsg_view->is_WRDO_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lkp_isfirstmsg_view->record_count->Visible) { // record_count ?>
	<tr id="r_record_count">
		<td class="<?php echo $lkp_isfirstmsg_view->TableLeftColumnClass ?>"><span id="elh_lkp_isfirstmsg_record_count"><?php echo $lkp_isfirstmsg_view->record_count->caption() ?></span></td>
		<td data-name="record_count" <?php echo $lkp_isfirstmsg_view->record_count->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_record_count">
<span<?php echo $lkp_isfirstmsg_view->record_count->viewAttributes() ?>><?php echo $lkp_isfirstmsg_view->record_count->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lkp_isfirstmsg_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_isfirstmsg_view->isExport()) { ?>
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
$lkp_isfirstmsg_view->terminate();
?>