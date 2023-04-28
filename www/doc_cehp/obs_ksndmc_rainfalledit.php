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
$obs_ksndmc_rainfall_edit = new obs_ksndmc_rainfall_edit();

// Run the page
$obs_ksndmc_rainfall_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_ksndmc_rainfall_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fobs_ksndmc_rainfalledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fobs_ksndmc_rainfalledit = currentForm = new ew.Form("fobs_ksndmc_rainfalledit", "edit");

	// Validate form
	fobs_ksndmc_rainfalledit.validate = function() {
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
			<?php if ($obs_ksndmc_rainfall_edit->Raingauge_id->Required) { ?>
				elm = this.getElements("x" + infix + "_Raingauge_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_ksndmc_rainfall_edit->Raingauge_id->caption(), $obs_ksndmc_rainfall_edit->Raingauge_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Raingauge_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_ksndmc_rainfall_edit->Raingauge_id->errorMessage()) ?>");
			<?php if ($obs_ksndmc_rainfall_edit->obs_datetime->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_datetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_ksndmc_rainfall_edit->obs_datetime->caption(), $obs_ksndmc_rainfall_edit->obs_datetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_obs_datetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_ksndmc_rainfall_edit->obs_datetime->errorMessage()) ?>");
			<?php if ($obs_ksndmc_rainfall_edit->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_ksndmc_rainfall_edit->rainfall->caption(), $obs_ksndmc_rainfall_edit->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_ksndmc_rainfall_edit->rainfall->errorMessage()) ?>");

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
	fobs_ksndmc_rainfalledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fobs_ksndmc_rainfalledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fobs_ksndmc_rainfalledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $obs_ksndmc_rainfall_edit->showPageHeader(); ?>
<?php
$obs_ksndmc_rainfall_edit->showMessage();
?>
<form name="fobs_ksndmc_rainfalledit" id="fobs_ksndmc_rainfalledit" class="<?php echo $obs_ksndmc_rainfall_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_ksndmc_rainfall">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$obs_ksndmc_rainfall_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($obs_ksndmc_rainfall_edit->Raingauge_id->Visible) { // Raingauge_id ?>
	<div id="r_Raingauge_id" class="form-group row">
		<label id="elh_obs_ksndmc_rainfall_Raingauge_id" for="x_Raingauge_id" class="<?php echo $obs_ksndmc_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_ksndmc_rainfall_edit->Raingauge_id->caption() ?><?php echo $obs_ksndmc_rainfall_edit->Raingauge_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_ksndmc_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_ksndmc_rainfall_edit->Raingauge_id->cellAttributes() ?>>
<input type="text" data-table="obs_ksndmc_rainfall" data-field="x_Raingauge_id" name="x_Raingauge_id" id="x_Raingauge_id" size="30" maxlength="11" value="<?php echo $obs_ksndmc_rainfall_edit->Raingauge_id->EditValue ?>"<?php echo $obs_ksndmc_rainfall_edit->Raingauge_id->editAttributes() ?>>
<input type="hidden" data-table="obs_ksndmc_rainfall" data-field="x_Raingauge_id" name="o_Raingauge_id" id="o_Raingauge_id" value="<?php echo HtmlEncode($obs_ksndmc_rainfall_edit->Raingauge_id->OldValue != null ? $obs_ksndmc_rainfall_edit->Raingauge_id->OldValue : $obs_ksndmc_rainfall_edit->Raingauge_id->CurrentValue) ?>">
<?php echo $obs_ksndmc_rainfall_edit->Raingauge_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_edit->obs_datetime->Visible) { // obs_datetime ?>
	<div id="r_obs_datetime" class="form-group row">
		<label id="elh_obs_ksndmc_rainfall_obs_datetime" for="x_obs_datetime" class="<?php echo $obs_ksndmc_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_ksndmc_rainfall_edit->obs_datetime->caption() ?><?php echo $obs_ksndmc_rainfall_edit->obs_datetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_ksndmc_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_ksndmc_rainfall_edit->obs_datetime->cellAttributes() ?>>
<input type="text" data-table="obs_ksndmc_rainfall" data-field="x_obs_datetime" name="x_obs_datetime" id="x_obs_datetime" maxlength="19" value="<?php echo $obs_ksndmc_rainfall_edit->obs_datetime->EditValue ?>"<?php echo $obs_ksndmc_rainfall_edit->obs_datetime->editAttributes() ?>>
<?php if (!$obs_ksndmc_rainfall_edit->obs_datetime->ReadOnly && !$obs_ksndmc_rainfall_edit->obs_datetime->Disabled && !isset($obs_ksndmc_rainfall_edit->obs_datetime->EditAttrs["readonly"]) && !isset($obs_ksndmc_rainfall_edit->obs_datetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fobs_ksndmc_rainfalledit", "datetimepicker"], function() {
	ew.createDateTimePicker("fobs_ksndmc_rainfalledit", "x_obs_datetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<input type="hidden" data-table="obs_ksndmc_rainfall" data-field="x_obs_datetime" name="o_obs_datetime" id="o_obs_datetime" value="<?php echo HtmlEncode($obs_ksndmc_rainfall_edit->obs_datetime->OldValue != null ? $obs_ksndmc_rainfall_edit->obs_datetime->OldValue : $obs_ksndmc_rainfall_edit->obs_datetime->CurrentValue) ?>">
<?php echo $obs_ksndmc_rainfall_edit->obs_datetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_edit->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_obs_ksndmc_rainfall_rainfall" for="x_rainfall" class="<?php echo $obs_ksndmc_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_ksndmc_rainfall_edit->rainfall->caption() ?><?php echo $obs_ksndmc_rainfall_edit->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_ksndmc_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_ksndmc_rainfall_edit->rainfall->cellAttributes() ?>>
<span id="el_obs_ksndmc_rainfall_rainfall">
<input type="text" data-table="obs_ksndmc_rainfall" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="30" maxlength="10" value="<?php echo $obs_ksndmc_rainfall_edit->rainfall->EditValue ?>"<?php echo $obs_ksndmc_rainfall_edit->rainfall->editAttributes() ?>>
</span>
<?php echo $obs_ksndmc_rainfall_edit->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$obs_ksndmc_rainfall_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $obs_ksndmc_rainfall_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $obs_ksndmc_rainfall_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$obs_ksndmc_rainfall_edit->showPageFooter();
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
$obs_ksndmc_rainfall_edit->terminate();
?>