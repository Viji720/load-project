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
$master_district_edit = new master_district_edit();

// Run the page
$master_district_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_district_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_districtedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_districtedit = currentForm = new ew.Form("fmaster_districtedit", "edit");

	// Validate form
	fmaster_districtedit.validate = function() {
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
			<?php if ($master_district_edit->DistrictId->Required) { ?>
				elm = this.getElements("x" + infix + "_DistrictId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_district_edit->DistrictId->caption(), $master_district_edit->DistrictId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DistrictId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_district_edit->DistrictId->errorMessage()) ?>");
			<?php if ($master_district_edit->DistrictName->Required) { ?>
				elm = this.getElements("x" + infix + "_DistrictName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_district_edit->DistrictName->caption(), $master_district_edit->DistrictName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_district_edit->DistrictName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_DistrictName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_district_edit->DistrictName_kn->caption(), $master_district_edit->DistrictName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_district_edit->DistrictName_hi->Required) { ?>
				elm = this.getElements("x" + infix + "_DistrictName_hi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_district_edit->DistrictName_hi->caption(), $master_district_edit->DistrictName_hi->RequiredErrorMessage)) ?>");
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
	fmaster_districtedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_districtedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_districtedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_district_edit->showPageHeader(); ?>
<?php
$master_district_edit->showMessage();
?>
<form name="fmaster_districtedit" id="fmaster_districtedit" class="<?php echo $master_district_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_district">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_district_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_district_edit->DistrictId->Visible) { // DistrictId ?>
	<div id="r_DistrictId" class="form-group row">
		<label id="elh_master_district_DistrictId" for="x_DistrictId" class="<?php echo $master_district_edit->LeftColumnClass ?>"><?php echo $master_district_edit->DistrictId->caption() ?><?php echo $master_district_edit->DistrictId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_district_edit->RightColumnClass ?>"><div <?php echo $master_district_edit->DistrictId->cellAttributes() ?>>
<input type="text" data-table="master_district" data-field="x_DistrictId" name="x_DistrictId" id="x_DistrictId" size="30" maxlength="11" value="<?php echo $master_district_edit->DistrictId->EditValue ?>"<?php echo $master_district_edit->DistrictId->editAttributes() ?>>
<input type="hidden" data-table="master_district" data-field="x_DistrictId" name="o_DistrictId" id="o_DistrictId" value="<?php echo HtmlEncode($master_district_edit->DistrictId->OldValue != null ? $master_district_edit->DistrictId->OldValue : $master_district_edit->DistrictId->CurrentValue) ?>">
<?php echo $master_district_edit->DistrictId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_district_edit->DistrictName->Visible) { // DistrictName ?>
	<div id="r_DistrictName" class="form-group row">
		<label id="elh_master_district_DistrictName" for="x_DistrictName" class="<?php echo $master_district_edit->LeftColumnClass ?>"><?php echo $master_district_edit->DistrictName->caption() ?><?php echo $master_district_edit->DistrictName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_district_edit->RightColumnClass ?>"><div <?php echo $master_district_edit->DistrictName->cellAttributes() ?>>
<span id="el_master_district_DistrictName">
<input type="text" data-table="master_district" data-field="x_DistrictName" name="x_DistrictName" id="x_DistrictName" size="30" maxlength="100" value="<?php echo $master_district_edit->DistrictName->EditValue ?>"<?php echo $master_district_edit->DistrictName->editAttributes() ?>>
</span>
<?php echo $master_district_edit->DistrictName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_district_edit->DistrictName_kn->Visible) { // DistrictName_kn ?>
	<div id="r_DistrictName_kn" class="form-group row">
		<label id="elh_master_district_DistrictName_kn" for="x_DistrictName_kn" class="<?php echo $master_district_edit->LeftColumnClass ?>"><?php echo $master_district_edit->DistrictName_kn->caption() ?><?php echo $master_district_edit->DistrictName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_district_edit->RightColumnClass ?>"><div <?php echo $master_district_edit->DistrictName_kn->cellAttributes() ?>>
<span id="el_master_district_DistrictName_kn">
<input type="text" data-table="master_district" data-field="x_DistrictName_kn" name="x_DistrictName_kn" id="x_DistrictName_kn" size="30" maxlength="100" value="<?php echo $master_district_edit->DistrictName_kn->EditValue ?>"<?php echo $master_district_edit->DistrictName_kn->editAttributes() ?>>
</span>
<?php echo $master_district_edit->DistrictName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_district_edit->DistrictName_hi->Visible) { // DistrictName_hi ?>
	<div id="r_DistrictName_hi" class="form-group row">
		<label id="elh_master_district_DistrictName_hi" for="x_DistrictName_hi" class="<?php echo $master_district_edit->LeftColumnClass ?>"><?php echo $master_district_edit->DistrictName_hi->caption() ?><?php echo $master_district_edit->DistrictName_hi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_district_edit->RightColumnClass ?>"><div <?php echo $master_district_edit->DistrictName_hi->cellAttributes() ?>>
<span id="el_master_district_DistrictName_hi">
<input type="text" data-table="master_district" data-field="x_DistrictName_hi" name="x_DistrictName_hi" id="x_DistrictName_hi" size="30" maxlength="100" value="<?php echo $master_district_edit->DistrictName_hi->EditValue ?>"<?php echo $master_district_edit->DistrictName_hi->editAttributes() ?>>
</span>
<?php echo $master_district_edit->DistrictName_hi->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_district_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_district_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_district_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_district_edit->showPageFooter();
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
$master_district_edit->terminate();
?>