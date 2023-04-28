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
$master_taluk_edit = new master_taluk_edit();

// Run the page
$master_taluk_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_taluk_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_talukedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_talukedit = currentForm = new ew.Form("fmaster_talukedit", "edit");

	// Validate form
	fmaster_talukedit.validate = function() {
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
			<?php if ($master_taluk_edit->TalukId->Required) { ?>
				elm = this.getElements("x" + infix + "_TalukId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_taluk_edit->TalukId->caption(), $master_taluk_edit->TalukId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TalukId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_taluk_edit->TalukId->errorMessage()) ?>");
			<?php if ($master_taluk_edit->TalukName->Required) { ?>
				elm = this.getElements("x" + infix + "_TalukName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_taluk_edit->TalukName->caption(), $master_taluk_edit->TalukName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_taluk_edit->TalukName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_TalukName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_taluk_edit->TalukName_kn->caption(), $master_taluk_edit->TalukName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_taluk_edit->TalukName_hi->Required) { ?>
				elm = this.getElements("x" + infix + "_TalukName_hi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_taluk_edit->TalukName_hi->caption(), $master_taluk_edit->TalukName_hi->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_taluk_edit->DistrictId->Required) { ?>
				elm = this.getElements("x" + infix + "_DistrictId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_taluk_edit->DistrictId->caption(), $master_taluk_edit->DistrictId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DistrictId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_taluk_edit->DistrictId->errorMessage()) ?>");

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
	fmaster_talukedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_talukedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_talukedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_taluk_edit->showPageHeader(); ?>
<?php
$master_taluk_edit->showMessage();
?>
<form name="fmaster_talukedit" id="fmaster_talukedit" class="<?php echo $master_taluk_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_taluk">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_taluk_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_taluk_edit->TalukId->Visible) { // TalukId ?>
	<div id="r_TalukId" class="form-group row">
		<label id="elh_master_taluk_TalukId" for="x_TalukId" class="<?php echo $master_taluk_edit->LeftColumnClass ?>"><?php echo $master_taluk_edit->TalukId->caption() ?><?php echo $master_taluk_edit->TalukId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_taluk_edit->RightColumnClass ?>"><div <?php echo $master_taluk_edit->TalukId->cellAttributes() ?>>
<input type="text" data-table="master_taluk" data-field="x_TalukId" name="x_TalukId" id="x_TalukId" size="30" maxlength="11" value="<?php echo $master_taluk_edit->TalukId->EditValue ?>"<?php echo $master_taluk_edit->TalukId->editAttributes() ?>>
<input type="hidden" data-table="master_taluk" data-field="x_TalukId" name="o_TalukId" id="o_TalukId" value="<?php echo HtmlEncode($master_taluk_edit->TalukId->OldValue != null ? $master_taluk_edit->TalukId->OldValue : $master_taluk_edit->TalukId->CurrentValue) ?>">
<?php echo $master_taluk_edit->TalukId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_taluk_edit->TalukName->Visible) { // TalukName ?>
	<div id="r_TalukName" class="form-group row">
		<label id="elh_master_taluk_TalukName" for="x_TalukName" class="<?php echo $master_taluk_edit->LeftColumnClass ?>"><?php echo $master_taluk_edit->TalukName->caption() ?><?php echo $master_taluk_edit->TalukName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_taluk_edit->RightColumnClass ?>"><div <?php echo $master_taluk_edit->TalukName->cellAttributes() ?>>
<span id="el_master_taluk_TalukName">
<input type="text" data-table="master_taluk" data-field="x_TalukName" name="x_TalukName" id="x_TalukName" size="30" maxlength="100" value="<?php echo $master_taluk_edit->TalukName->EditValue ?>"<?php echo $master_taluk_edit->TalukName->editAttributes() ?>>
</span>
<?php echo $master_taluk_edit->TalukName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_taluk_edit->TalukName_kn->Visible) { // TalukName_kn ?>
	<div id="r_TalukName_kn" class="form-group row">
		<label id="elh_master_taluk_TalukName_kn" for="x_TalukName_kn" class="<?php echo $master_taluk_edit->LeftColumnClass ?>"><?php echo $master_taluk_edit->TalukName_kn->caption() ?><?php echo $master_taluk_edit->TalukName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_taluk_edit->RightColumnClass ?>"><div <?php echo $master_taluk_edit->TalukName_kn->cellAttributes() ?>>
<span id="el_master_taluk_TalukName_kn">
<input type="text" data-table="master_taluk" data-field="x_TalukName_kn" name="x_TalukName_kn" id="x_TalukName_kn" size="30" maxlength="100" value="<?php echo $master_taluk_edit->TalukName_kn->EditValue ?>"<?php echo $master_taluk_edit->TalukName_kn->editAttributes() ?>>
</span>
<?php echo $master_taluk_edit->TalukName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_taluk_edit->TalukName_hi->Visible) { // TalukName_hi ?>
	<div id="r_TalukName_hi" class="form-group row">
		<label id="elh_master_taluk_TalukName_hi" for="x_TalukName_hi" class="<?php echo $master_taluk_edit->LeftColumnClass ?>"><?php echo $master_taluk_edit->TalukName_hi->caption() ?><?php echo $master_taluk_edit->TalukName_hi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_taluk_edit->RightColumnClass ?>"><div <?php echo $master_taluk_edit->TalukName_hi->cellAttributes() ?>>
<span id="el_master_taluk_TalukName_hi">
<input type="text" data-table="master_taluk" data-field="x_TalukName_hi" name="x_TalukName_hi" id="x_TalukName_hi" size="30" maxlength="100" value="<?php echo $master_taluk_edit->TalukName_hi->EditValue ?>"<?php echo $master_taluk_edit->TalukName_hi->editAttributes() ?>>
</span>
<?php echo $master_taluk_edit->TalukName_hi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_taluk_edit->DistrictId->Visible) { // DistrictId ?>
	<div id="r_DistrictId" class="form-group row">
		<label id="elh_master_taluk_DistrictId" for="x_DistrictId" class="<?php echo $master_taluk_edit->LeftColumnClass ?>"><?php echo $master_taluk_edit->DistrictId->caption() ?><?php echo $master_taluk_edit->DistrictId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_taluk_edit->RightColumnClass ?>"><div <?php echo $master_taluk_edit->DistrictId->cellAttributes() ?>>
<span id="el_master_taluk_DistrictId">
<input type="text" data-table="master_taluk" data-field="x_DistrictId" name="x_DistrictId" id="x_DistrictId" size="30" maxlength="11" value="<?php echo $master_taluk_edit->DistrictId->EditValue ?>"<?php echo $master_taluk_edit->DistrictId->editAttributes() ?>>
</span>
<?php echo $master_taluk_edit->DistrictId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_taluk_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_taluk_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_taluk_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_taluk_edit->showPageFooter();
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
$master_taluk_edit->terminate();
?>