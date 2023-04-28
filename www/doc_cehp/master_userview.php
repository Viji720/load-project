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
$master_user_view = new master_user_view();

// Run the page
$master_user_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_user_view->isExport()) { ?>
<script>
var fmaster_userview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmaster_userview = currentForm = new ew.Form("fmaster_userview", "view");
	loadjs.done("fmaster_userview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_user_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_user_view->ExportOptions->render("body") ?>
<?php $master_user_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_user_view->showPageHeader(); ?>
<?php
$master_user_view->showMessage();
?>
<form name="fmaster_userview" id="fmaster_userview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user">
<input type="hidden" name="modal" value="<?php echo (int)$master_user_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_user_view->_UserId->Visible) { // UserId ?>
	<tr id="r__UserId">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user__UserId"><?php echo $master_user_view->_UserId->caption() ?></span></td>
		<td data-name="_UserId" <?php echo $master_user_view->_UserId->cellAttributes() ?>>
<span id="el_master_user__UserId">
<span<?php echo $master_user_view->_UserId->viewAttributes() ?>><?php echo $master_user_view->_UserId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->UserName->Visible) { // UserName ?>
	<tr id="r_UserName">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_UserName"><?php echo $master_user_view->UserName->caption() ?></span></td>
		<td data-name="UserName" <?php echo $master_user_view->UserName->cellAttributes() ?>>
<span id="el_master_user_UserName">
<span<?php echo $master_user_view->UserName->viewAttributes() ?>><?php echo $master_user_view->UserName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->UserAddress->Visible) { // UserAddress ?>
	<tr id="r_UserAddress">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_UserAddress"><?php echo $master_user_view->UserAddress->caption() ?></span></td>
		<td data-name="UserAddress" <?php echo $master_user_view->UserAddress->cellAttributes() ?>>
<span id="el_master_user_UserAddress">
<span<?php echo $master_user_view->UserAddress->viewAttributes() ?>><?php echo $master_user_view->UserAddress->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->StationId->Visible) { // StationId ?>
	<tr id="r_StationId">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_StationId"><?php echo $master_user_view->StationId->caption() ?></span></td>
		<td data-name="StationId" <?php echo $master_user_view->StationId->cellAttributes() ?>>
<span id="el_master_user_StationId">
<span<?php echo $master_user_view->StationId->viewAttributes() ?>><?php echo $master_user_view->StationId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->TalukId->Visible) { // TalukId ?>
	<tr id="r_TalukId">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_TalukId"><?php echo $master_user_view->TalukId->caption() ?></span></td>
		<td data-name="TalukId" <?php echo $master_user_view->TalukId->cellAttributes() ?>>
<span id="el_master_user_TalukId">
<span<?php echo $master_user_view->TalukId->viewAttributes() ?>><?php echo $master_user_view->TalukId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->DistrictId->Visible) { // DistrictId ?>
	<tr id="r_DistrictId">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_DistrictId"><?php echo $master_user_view->DistrictId->caption() ?></span></td>
		<td data-name="DistrictId" <?php echo $master_user_view->DistrictId->cellAttributes() ?>>
<span id="el_master_user_DistrictId">
<span<?php echo $master_user_view->DistrictId->viewAttributes() ?>><?php echo $master_user_view->DistrictId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->SubDivsionId->Visible) { // SubDivsionId ?>
	<tr id="r_SubDivsionId">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_SubDivsionId"><?php echo $master_user_view->SubDivsionId->caption() ?></span></td>
		<td data-name="SubDivsionId" <?php echo $master_user_view->SubDivsionId->cellAttributes() ?>>
<span id="el_master_user_SubDivsionId">
<span<?php echo $master_user_view->SubDivsionId->viewAttributes() ?>><?php echo $master_user_view->SubDivsionId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->DivisionId->Visible) { // DivisionId ?>
	<tr id="r_DivisionId">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_DivisionId"><?php echo $master_user_view->DivisionId->caption() ?></span></td>
		<td data-name="DivisionId" <?php echo $master_user_view->DivisionId->cellAttributes() ?>>
<span id="el_master_user_DivisionId">
<span<?php echo $master_user_view->DivisionId->viewAttributes() ?>><?php echo $master_user_view->DivisionId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->RoleId->Visible) { // RoleId ?>
	<tr id="r_RoleId">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_RoleId"><?php echo $master_user_view->RoleId->caption() ?></span></td>
		<td data-name="RoleId" <?php echo $master_user_view->RoleId->cellAttributes() ?>>
<span id="el_master_user_RoleId">
<span<?php echo $master_user_view->RoleId->viewAttributes() ?>><?php echo $master_user_view->RoleId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->UserPassword->Visible) { // UserPassword ?>
	<tr id="r_UserPassword">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_UserPassword"><?php echo $master_user_view->UserPassword->caption() ?></span></td>
		<td data-name="UserPassword" <?php echo $master_user_view->UserPassword->cellAttributes() ?>>
<span id="el_master_user_UserPassword">
<span<?php echo $master_user_view->UserPassword->viewAttributes() ?>><?php echo $master_user_view->UserPassword->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->UserEmail->Visible) { // UserEmail ?>
	<tr id="r_UserEmail">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_UserEmail"><?php echo $master_user_view->UserEmail->caption() ?></span></td>
		<td data-name="UserEmail" <?php echo $master_user_view->UserEmail->cellAttributes() ?>>
<span id="el_master_user_UserEmail">
<span<?php echo $master_user_view->UserEmail->viewAttributes() ?>><?php echo $master_user_view->UserEmail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->UserMobileNumber->Visible) { // UserMobileNumber ?>
	<tr id="r_UserMobileNumber">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user_UserMobileNumber"><?php echo $master_user_view->UserMobileNumber->caption() ?></span></td>
		<td data-name="UserMobileNumber" <?php echo $master_user_view->UserMobileNumber->cellAttributes() ?>>
<span id="el_master_user_UserMobileNumber">
<span<?php echo $master_user_view->UserMobileNumber->viewAttributes() ?>><?php echo $master_user_view->UserMobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_user_view->_UserProfile->Visible) { // UserProfile ?>
	<tr id="r__UserProfile">
		<td class="<?php echo $master_user_view->TableLeftColumnClass ?>"><span id="elh_master_user__UserProfile"><?php echo $master_user_view->_UserProfile->caption() ?></span></td>
		<td data-name="_UserProfile" <?php echo $master_user_view->_UserProfile->cellAttributes() ?>>
<span id="el_master_user__UserProfile">
<span<?php echo $master_user_view->_UserProfile->viewAttributes() ?>><?php echo $master_user_view->_UserProfile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_user_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_user_view->isExport()) { ?>
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
$master_user_view->terminate();
?>