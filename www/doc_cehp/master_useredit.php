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
$master_user_edit = new master_user_edit();

// Run the page
$master_user_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_useredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_useredit = currentForm = new ew.Form("fmaster_useredit", "edit");

	// Validate form
	fmaster_useredit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($master_user_edit->_UserId->Required) { ?>
				elm = this.getElements("x" + infix + "__UserId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->_UserId->caption(), $master_user_edit->_UserId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_user_edit->UserName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->UserName->caption(), $master_user_edit->UserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_user_edit->UserAddress->Required) { ?>
				elm = this.getElements("x" + infix + "_UserAddress");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->UserAddress->caption(), $master_user_edit->UserAddress->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_user_edit->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->StationId->caption(), $master_user_edit->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_user_edit->StationId->errorMessage()) ?>");
			<?php if ($master_user_edit->TalukId->Required) { ?>
				elm = this.getElements("x" + infix + "_TalukId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->TalukId->caption(), $master_user_edit->TalukId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TalukId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_user_edit->TalukId->errorMessage()) ?>");
			<?php if ($master_user_edit->DistrictId->Required) { ?>
				elm = this.getElements("x" + infix + "_DistrictId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->DistrictId->caption(), $master_user_edit->DistrictId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DistrictId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_user_edit->DistrictId->errorMessage()) ?>");
			<?php if ($master_user_edit->SubDivsionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivsionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->SubDivsionId->caption(), $master_user_edit->SubDivsionId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubDivsionId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_user_edit->SubDivsionId->errorMessage()) ?>");
			<?php if ($master_user_edit->DivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_DivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->DivisionId->caption(), $master_user_edit->DivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DivisionId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_user_edit->DivisionId->errorMessage()) ?>");
			<?php if ($master_user_edit->RoleId->Required) { ?>
				elm = this.getElements("x" + infix + "_RoleId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->RoleId->caption(), $master_user_edit->RoleId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_user_edit->UserPassword->Required) { ?>
				elm = this.getElements("x" + infix + "_UserPassword");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->UserPassword->caption(), $master_user_edit->UserPassword->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_user_edit->UserEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_UserEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->UserEmail->caption(), $master_user_edit->UserEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_user_edit->UserMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_UserMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->UserMobileNumber->caption(), $master_user_edit->UserMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_user_edit->_UserProfile->Required) { ?>
				elm = this.getElements("x" + infix + "__UserProfile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_edit->_UserProfile->caption(), $master_user_edit->_UserProfile->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fmaster_useredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_useredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmaster_useredit.lists["x_RoleId"] = <?php echo $master_user_edit->RoleId->Lookup->toClientList($master_user_edit) ?>;
	fmaster_useredit.lists["x_RoleId"].options = <?php echo JsonEncode($master_user_edit->RoleId->lookupOptions()) ?>;
	loadjs.done("fmaster_useredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_user_edit->showPageHeader(); ?>
<?php
$master_user_edit->showMessage();
?>
<form name="fmaster_useredit" id="fmaster_useredit" class="<?php echo $master_user_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_user_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_user_edit->_UserId->Visible) { // UserId ?>
	<div id="r__UserId" class="form-group row">
		<label id="elh_master_user__UserId" for="x__UserId" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->_UserId->caption() ?><?php echo $master_user_edit->_UserId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->_UserId->cellAttributes() ?>>
<input type="text" data-table="master_user" data-field="x__UserId" name="x__UserId" id="x__UserId" size="30" maxlength="30" value="<?php echo $master_user_edit->_UserId->EditValue ?>"<?php echo $master_user_edit->_UserId->editAttributes() ?>>
<input type="hidden" data-table="master_user" data-field="x__UserId" name="o__UserId" id="o__UserId" value="<?php echo HtmlEncode($master_user_edit->_UserId->OldValue != null ? $master_user_edit->_UserId->OldValue : $master_user_edit->_UserId->CurrentValue) ?>">
<?php echo $master_user_edit->_UserId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->UserName->Visible) { // UserName ?>
	<div id="r_UserName" class="form-group row">
		<label id="elh_master_user_UserName" for="x_UserName" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->UserName->caption() ?><?php echo $master_user_edit->UserName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->UserName->cellAttributes() ?>>
<span id="el_master_user_UserName">
<input type="text" data-table="master_user" data-field="x_UserName" name="x_UserName" id="x_UserName" size="30" maxlength="100" value="<?php echo $master_user_edit->UserName->EditValue ?>"<?php echo $master_user_edit->UserName->editAttributes() ?>>
</span>
<?php echo $master_user_edit->UserName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->UserAddress->Visible) { // UserAddress ?>
	<div id="r_UserAddress" class="form-group row">
		<label id="elh_master_user_UserAddress" for="x_UserAddress" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->UserAddress->caption() ?><?php echo $master_user_edit->UserAddress->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->UserAddress->cellAttributes() ?>>
<span id="el_master_user_UserAddress">
<textarea data-table="master_user" data-field="x_UserAddress" name="x_UserAddress" id="x_UserAddress" cols="35" rows="4"<?php echo $master_user_edit->UserAddress->editAttributes() ?>><?php echo $master_user_edit->UserAddress->EditValue ?></textarea>
</span>
<?php echo $master_user_edit->UserAddress->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_master_user_StationId" for="x_StationId" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->StationId->caption() ?><?php echo $master_user_edit->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->StationId->cellAttributes() ?>>
<span id="el_master_user_StationId">
<input type="text" data-table="master_user" data-field="x_StationId" name="x_StationId" id="x_StationId" size="30" maxlength="11" value="<?php echo $master_user_edit->StationId->EditValue ?>"<?php echo $master_user_edit->StationId->editAttributes() ?>>
</span>
<?php echo $master_user_edit->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->TalukId->Visible) { // TalukId ?>
	<div id="r_TalukId" class="form-group row">
		<label id="elh_master_user_TalukId" for="x_TalukId" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->TalukId->caption() ?><?php echo $master_user_edit->TalukId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->TalukId->cellAttributes() ?>>
<span id="el_master_user_TalukId">
<input type="text" data-table="master_user" data-field="x_TalukId" name="x_TalukId" id="x_TalukId" size="30" maxlength="11" value="<?php echo $master_user_edit->TalukId->EditValue ?>"<?php echo $master_user_edit->TalukId->editAttributes() ?>>
</span>
<?php echo $master_user_edit->TalukId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->DistrictId->Visible) { // DistrictId ?>
	<div id="r_DistrictId" class="form-group row">
		<label id="elh_master_user_DistrictId" for="x_DistrictId" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->DistrictId->caption() ?><?php echo $master_user_edit->DistrictId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->DistrictId->cellAttributes() ?>>
<span id="el_master_user_DistrictId">
<input type="text" data-table="master_user" data-field="x_DistrictId" name="x_DistrictId" id="x_DistrictId" size="30" maxlength="11" value="<?php echo $master_user_edit->DistrictId->EditValue ?>"<?php echo $master_user_edit->DistrictId->editAttributes() ?>>
</span>
<?php echo $master_user_edit->DistrictId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->SubDivsionId->Visible) { // SubDivsionId ?>
	<div id="r_SubDivsionId" class="form-group row">
		<label id="elh_master_user_SubDivsionId" for="x_SubDivsionId" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->SubDivsionId->caption() ?><?php echo $master_user_edit->SubDivsionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->SubDivsionId->cellAttributes() ?>>
<span id="el_master_user_SubDivsionId">
<input type="text" data-table="master_user" data-field="x_SubDivsionId" name="x_SubDivsionId" id="x_SubDivsionId" size="30" maxlength="11" value="<?php echo $master_user_edit->SubDivsionId->EditValue ?>"<?php echo $master_user_edit->SubDivsionId->editAttributes() ?>>
</span>
<?php echo $master_user_edit->SubDivsionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->DivisionId->Visible) { // DivisionId ?>
	<div id="r_DivisionId" class="form-group row">
		<label id="elh_master_user_DivisionId" for="x_DivisionId" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->DivisionId->caption() ?><?php echo $master_user_edit->DivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->DivisionId->cellAttributes() ?>>
<span id="el_master_user_DivisionId">
<input type="text" data-table="master_user" data-field="x_DivisionId" name="x_DivisionId" id="x_DivisionId" size="30" maxlength="11" value="<?php echo $master_user_edit->DivisionId->EditValue ?>"<?php echo $master_user_edit->DivisionId->editAttributes() ?>>
</span>
<?php echo $master_user_edit->DivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->RoleId->Visible) { // RoleId ?>
	<div id="r_RoleId" class="form-group row">
		<label id="elh_master_user_RoleId" for="x_RoleId" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->RoleId->caption() ?><?php echo $master_user_edit->RoleId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->RoleId->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_master_user_RoleId">
<input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($master_user_edit->RoleId->EditValue)) ?>">
</span>
<?php } else { ?>
<span id="el_master_user_RoleId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_user" data-field="x_RoleId" data-value-separator="<?php echo $master_user_edit->RoleId->displayValueSeparatorAttribute() ?>" id="x_RoleId" name="x_RoleId"<?php echo $master_user_edit->RoleId->editAttributes() ?>>
			<?php echo $master_user_edit->RoleId->selectOptionListHtml("x_RoleId") ?>
		</select>
</div>
<?php echo $master_user_edit->RoleId->Lookup->getParamTag($master_user_edit, "p_x_RoleId") ?>
</span>
<?php } ?>
<?php echo $master_user_edit->RoleId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->UserPassword->Visible) { // UserPassword ?>
	<div id="r_UserPassword" class="form-group row">
		<label id="elh_master_user_UserPassword" for="x_UserPassword" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->UserPassword->caption() ?><?php echo $master_user_edit->UserPassword->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->UserPassword->cellAttributes() ?>>
<span id="el_master_user_UserPassword">
<input type="text" data-table="master_user" data-field="x_UserPassword" name="x_UserPassword" id="x_UserPassword" size="30" maxlength="50" value="<?php echo $master_user_edit->UserPassword->EditValue ?>"<?php echo $master_user_edit->UserPassword->editAttributes() ?>>
</span>
<?php echo $master_user_edit->UserPassword->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->UserEmail->Visible) { // UserEmail ?>
	<div id="r_UserEmail" class="form-group row">
		<label id="elh_master_user_UserEmail" for="x_UserEmail" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->UserEmail->caption() ?><?php echo $master_user_edit->UserEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->UserEmail->cellAttributes() ?>>
<span id="el_master_user_UserEmail">
<input type="text" data-table="master_user" data-field="x_UserEmail" name="x_UserEmail" id="x_UserEmail" size="30" maxlength="100" value="<?php echo $master_user_edit->UserEmail->EditValue ?>"<?php echo $master_user_edit->UserEmail->editAttributes() ?>>
</span>
<?php echo $master_user_edit->UserEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->UserMobileNumber->Visible) { // UserMobileNumber ?>
	<div id="r_UserMobileNumber" class="form-group row">
		<label id="elh_master_user_UserMobileNumber" for="x_UserMobileNumber" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->UserMobileNumber->caption() ?><?php echo $master_user_edit->UserMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->UserMobileNumber->cellAttributes() ?>>
<span id="el_master_user_UserMobileNumber">
<input type="text" data-table="master_user" data-field="x_UserMobileNumber" name="x_UserMobileNumber" id="x_UserMobileNumber" size="30" maxlength="13" value="<?php echo $master_user_edit->UserMobileNumber->EditValue ?>"<?php echo $master_user_edit->UserMobileNumber->editAttributes() ?>>
</span>
<?php echo $master_user_edit->UserMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_edit->_UserProfile->Visible) { // UserProfile ?>
	<div id="r__UserProfile" class="form-group row">
		<label id="elh_master_user__UserProfile" for="x__UserProfile" class="<?php echo $master_user_edit->LeftColumnClass ?>"><?php echo $master_user_edit->_UserProfile->caption() ?><?php echo $master_user_edit->_UserProfile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_edit->RightColumnClass ?>"><div <?php echo $master_user_edit->_UserProfile->cellAttributes() ?>>
<span id="el_master_user__UserProfile">
<textarea data-table="master_user" data-field="x__UserProfile" name="x__UserProfile" id="x__UserProfile" cols="35" rows="4"<?php echo $master_user_edit->_UserProfile->editAttributes() ?>><?php echo $master_user_edit->_UserProfile->EditValue ?></textarea>
</span>
<?php echo $master_user_edit->_UserProfile->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_user_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_user_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_user_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_user_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$master_user_edit->terminate();
?>