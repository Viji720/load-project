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
$master_division_edit = new master_division_edit();

// Run the page
$master_division_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_division_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_divisionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_divisionedit = currentForm = new ew.Form("fmaster_divisionedit", "edit");

	// Validate form
	fmaster_divisionedit.validate = function() {
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
			<?php if ($master_division_edit->divisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_divisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_division_edit->divisionId->caption(), $master_division_edit->divisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_divisionId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_division_edit->divisionId->errorMessage()) ?>");
			<?php if ($master_division_edit->divisionName->Required) { ?>
				elm = this.getElements("x" + infix + "_divisionName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_division_edit->divisionName->caption(), $master_division_edit->divisionName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_division_edit->divisionName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_divisionName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_division_edit->divisionName_kn->caption(), $master_division_edit->divisionName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_division_edit->divisionName_hi->Required) { ?>
				elm = this.getElements("x" + infix + "_divisionName_hi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_division_edit->divisionName_hi->caption(), $master_division_edit->divisionName_hi->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_division_edit->circleId->Required) { ?>
				elm = this.getElements("x" + infix + "_circleId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_division_edit->circleId->caption(), $master_division_edit->circleId->RequiredErrorMessage)) ?>");
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
	fmaster_divisionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_divisionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmaster_divisionedit.lists["x_circleId"] = <?php echo $master_division_edit->circleId->Lookup->toClientList($master_division_edit) ?>;
	fmaster_divisionedit.lists["x_circleId"].options = <?php echo JsonEncode($master_division_edit->circleId->lookupOptions()) ?>;
	loadjs.done("fmaster_divisionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_division_edit->showPageHeader(); ?>
<?php
$master_division_edit->showMessage();
?>
<form name="fmaster_divisionedit" id="fmaster_divisionedit" class="<?php echo $master_division_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_division">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_division_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_division_edit->divisionId->Visible) { // divisionId ?>
	<div id="r_divisionId" class="form-group row">
		<label id="elh_master_division_divisionId" for="x_divisionId" class="<?php echo $master_division_edit->LeftColumnClass ?>"><?php echo $master_division_edit->divisionId->caption() ?><?php echo $master_division_edit->divisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_division_edit->RightColumnClass ?>"><div <?php echo $master_division_edit->divisionId->cellAttributes() ?>>
<input type="text" data-table="master_division" data-field="x_divisionId" name="x_divisionId" id="x_divisionId" size="30" maxlength="11" value="<?php echo $master_division_edit->divisionId->EditValue ?>"<?php echo $master_division_edit->divisionId->editAttributes() ?>>
<input type="hidden" data-table="master_division" data-field="x_divisionId" name="o_divisionId" id="o_divisionId" value="<?php echo HtmlEncode($master_division_edit->divisionId->OldValue != null ? $master_division_edit->divisionId->OldValue : $master_division_edit->divisionId->CurrentValue) ?>">
<?php echo $master_division_edit->divisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_division_edit->divisionName->Visible) { // divisionName ?>
	<div id="r_divisionName" class="form-group row">
		<label id="elh_master_division_divisionName" for="x_divisionName" class="<?php echo $master_division_edit->LeftColumnClass ?>"><?php echo $master_division_edit->divisionName->caption() ?><?php echo $master_division_edit->divisionName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_division_edit->RightColumnClass ?>"><div <?php echo $master_division_edit->divisionName->cellAttributes() ?>>
<span id="el_master_division_divisionName">
<input type="text" data-table="master_division" data-field="x_divisionName" name="x_divisionName" id="x_divisionName" size="30" maxlength="100" value="<?php echo $master_division_edit->divisionName->EditValue ?>"<?php echo $master_division_edit->divisionName->editAttributes() ?>>
</span>
<?php echo $master_division_edit->divisionName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_division_edit->divisionName_kn->Visible) { // divisionName_kn ?>
	<div id="r_divisionName_kn" class="form-group row">
		<label id="elh_master_division_divisionName_kn" for="x_divisionName_kn" class="<?php echo $master_division_edit->LeftColumnClass ?>"><?php echo $master_division_edit->divisionName_kn->caption() ?><?php echo $master_division_edit->divisionName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_division_edit->RightColumnClass ?>"><div <?php echo $master_division_edit->divisionName_kn->cellAttributes() ?>>
<span id="el_master_division_divisionName_kn">
<input type="text" data-table="master_division" data-field="x_divisionName_kn" name="x_divisionName_kn" id="x_divisionName_kn" size="30" maxlength="100" value="<?php echo $master_division_edit->divisionName_kn->EditValue ?>"<?php echo $master_division_edit->divisionName_kn->editAttributes() ?>>
</span>
<?php echo $master_division_edit->divisionName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_division_edit->divisionName_hi->Visible) { // divisionName_hi ?>
	<div id="r_divisionName_hi" class="form-group row">
		<label id="elh_master_division_divisionName_hi" for="x_divisionName_hi" class="<?php echo $master_division_edit->LeftColumnClass ?>"><?php echo $master_division_edit->divisionName_hi->caption() ?><?php echo $master_division_edit->divisionName_hi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_division_edit->RightColumnClass ?>"><div <?php echo $master_division_edit->divisionName_hi->cellAttributes() ?>>
<span id="el_master_division_divisionName_hi">
<input type="text" data-table="master_division" data-field="x_divisionName_hi" name="x_divisionName_hi" id="x_divisionName_hi" size="30" maxlength="100" value="<?php echo $master_division_edit->divisionName_hi->EditValue ?>"<?php echo $master_division_edit->divisionName_hi->editAttributes() ?>>
</span>
<?php echo $master_division_edit->divisionName_hi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_division_edit->circleId->Visible) { // circleId ?>
	<div id="r_circleId" class="form-group row">
		<label id="elh_master_division_circleId" for="x_circleId" class="<?php echo $master_division_edit->LeftColumnClass ?>"><?php echo $master_division_edit->circleId->caption() ?><?php echo $master_division_edit->circleId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_division_edit->RightColumnClass ?>"><div <?php echo $master_division_edit->circleId->cellAttributes() ?>>
<span id="el_master_division_circleId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_division" data-field="x_circleId" data-value-separator="<?php echo $master_division_edit->circleId->displayValueSeparatorAttribute() ?>" id="x_circleId" name="x_circleId"<?php echo $master_division_edit->circleId->editAttributes() ?>>
			<?php echo $master_division_edit->circleId->selectOptionListHtml("x_circleId") ?>
		</select>
</div>
<?php echo $master_division_edit->circleId->Lookup->getParamTag($master_division_edit, "p_x_circleId") ?>
</span>
<?php echo $master_division_edit->circleId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_division_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_division_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_division_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_division_edit->showPageFooter();
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
$master_division_edit->terminate();
?>