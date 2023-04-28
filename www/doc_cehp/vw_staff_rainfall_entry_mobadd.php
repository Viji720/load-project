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
$vw_staff_rainfall_entry_mob_add = new vw_staff_rainfall_entry_mob_add();

// Run the page
$vw_staff_rainfall_entry_mob_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_staff_rainfall_entry_mob_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fvw_staff_rainfall_entry_mobadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fvw_staff_rainfall_entry_mobadd = currentForm = new ew.Form("fvw_staff_rainfall_entry_mobadd", "add");

	// Validate form
	fvw_staff_rainfall_entry_mobadd.validate = function() {
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
			<?php if ($vw_staff_rainfall_entry_mob_add->stationcode->Required) { ?>
				elm = this.getElements("x" + infix + "_stationcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_mob_add->stationcode->caption(), $vw_staff_rainfall_entry_mob_add->stationcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_mob_add->obs_date->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_mob_add->obs_date->caption(), $vw_staff_rainfall_entry_mob_add->obs_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_obs_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_staff_rainfall_entry_mob_add->obs_date->errorMessage()) ?>");
			<?php if ($vw_staff_rainfall_entry_mob_add->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_mob_add->rainfall->caption(), $vw_staff_rainfall_entry_mob_add->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkRange(elm.value, 0.00, 200.00))
					return this.onError(elm, "<?php echo JsEncode($vw_staff_rainfall_entry_mob_add->rainfall->errorMessage()) ?>");
			<?php if ($vw_staff_rainfall_entry_mob_add->obs_remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_mob_add->obs_remarks->caption(), $vw_staff_rainfall_entry_mob_add->obs_remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_mob_add->mobile_number->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_number");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_mob_add->mobile_number->caption(), $vw_staff_rainfall_entry_mob_add->mobile_number->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_mob_add->mst_status->Required) { ?>
				elm = this.getElements("x" + infix + "_mst_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_mob_add->mst_status->caption(), $vw_staff_rainfall_entry_mob_add->mst_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_mob_add->mst_validated->Required) { ?>
				elm = this.getElements("x" + infix + "_mst_validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_mob_add->mst_validated->caption(), $vw_staff_rainfall_entry_mob_add->mst_validated->RequiredErrorMessage)) ?>");
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
	fvw_staff_rainfall_entry_mobadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_staff_rainfall_entry_mobadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_staff_rainfall_entry_mobadd.lists["x_stationcode"] = <?php echo $vw_staff_rainfall_entry_mob_add->stationcode->Lookup->toClientList($vw_staff_rainfall_entry_mob_add) ?>;
	fvw_staff_rainfall_entry_mobadd.lists["x_stationcode"].options = <?php echo JsonEncode($vw_staff_rainfall_entry_mob_add->stationcode->lookupOptions()) ?>;
	fvw_staff_rainfall_entry_mobadd.lists["x_mst_status"] = <?php echo $vw_staff_rainfall_entry_mob_add->mst_status->Lookup->toClientList($vw_staff_rainfall_entry_mob_add) ?>;
	fvw_staff_rainfall_entry_mobadd.lists["x_mst_status"].options = <?php echo JsonEncode($vw_staff_rainfall_entry_mob_add->mst_status->lookupOptions()) ?>;
	fvw_staff_rainfall_entry_mobadd.lists["x_mst_validated"] = <?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->Lookup->toClientList($vw_staff_rainfall_entry_mob_add) ?>;
	fvw_staff_rainfall_entry_mobadd.lists["x_mst_validated"].options = <?php echo JsonEncode($vw_staff_rainfall_entry_mob_add->mst_validated->lookupOptions()) ?>;
	loadjs.done("fvw_staff_rainfall_entry_mobadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $vw_staff_rainfall_entry_mob_add->showPageHeader(); ?>
<?php
$vw_staff_rainfall_entry_mob_add->showMessage();
?>
<form name="fvw_staff_rainfall_entry_mobadd" id="fvw_staff_rainfall_entry_mobadd" class="<?php echo $vw_staff_rainfall_entry_mob_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_staff_rainfall_entry_mob">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$vw_staff_rainfall_entry_mob_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($vw_staff_rainfall_entry_mob_add->stationcode->Visible) { // stationcode ?>
	<div id="r_stationcode" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mob_stationcode" for="x_stationcode" class="<?php echo $vw_staff_rainfall_entry_mob_add->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_mob_add->stationcode->caption() ?><?php echo $vw_staff_rainfall_entry_mob_add->stationcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_mob_add->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_mob_add->stationcode->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mob_stationcode">
<?php $vw_staff_rainfall_entry_mob_add->stationcode->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_staff_rainfall_entry_mob" data-field="x_stationcode" data-value-separator="<?php echo $vw_staff_rainfall_entry_mob_add->stationcode->displayValueSeparatorAttribute() ?>" id="x_stationcode" name="x_stationcode"<?php echo $vw_staff_rainfall_entry_mob_add->stationcode->editAttributes() ?>>
			<?php echo $vw_staff_rainfall_entry_mob_add->stationcode->selectOptionListHtml("x_stationcode") ?>
		</select>
</div>
<?php echo $vw_staff_rainfall_entry_mob_add->stationcode->Lookup->getParamTag($vw_staff_rainfall_entry_mob_add, "p_x_stationcode") ?>
</span>
<?php echo $vw_staff_rainfall_entry_mob_add->stationcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_add->obs_date->Visible) { // obs_date ?>
	<div id="r_obs_date" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mob_obs_date" for="x_obs_date" class="<?php echo $vw_staff_rainfall_entry_mob_add->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_mob_add->obs_date->caption() ?><?php echo $vw_staff_rainfall_entry_mob_add->obs_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_mob_add->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_mob_add->obs_date->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mob_obs_date">
<input type="text" data-table="vw_staff_rainfall_entry_mob" data-field="x_obs_date" data-format="7" name="x_obs_date" id="x_obs_date" maxlength="10" placeholder="<?php echo HtmlEncode($vw_staff_rainfall_entry_mob_add->obs_date->getPlaceHolder()) ?>" value="<?php echo $vw_staff_rainfall_entry_mob_add->obs_date->EditValue ?>"<?php echo $vw_staff_rainfall_entry_mob_add->obs_date->editAttributes() ?>>
<?php if (!$vw_staff_rainfall_entry_mob_add->obs_date->ReadOnly && !$vw_staff_rainfall_entry_mob_add->obs_date->Disabled && !isset($vw_staff_rainfall_entry_mob_add->obs_date->EditAttrs["readonly"]) && !isset($vw_staff_rainfall_entry_mob_add->obs_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_staff_rainfall_entry_mobadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_staff_rainfall_entry_mobadd", "x_obs_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $vw_staff_rainfall_entry_mob_add->obs_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_add->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mob_rainfall" for="x_rainfall" class="<?php echo $vw_staff_rainfall_entry_mob_add->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_mob_add->rainfall->caption() ?><?php echo $vw_staff_rainfall_entry_mob_add->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_mob_add->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_mob_add->rainfall->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mob_rainfall">
<input type="text" data-table="vw_staff_rainfall_entry_mob" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="15" maxlength="7" placeholder="<?php echo HtmlEncode($vw_staff_rainfall_entry_mob_add->rainfall->getPlaceHolder()) ?>" value="<?php echo $vw_staff_rainfall_entry_mob_add->rainfall->EditValue ?>"<?php echo $vw_staff_rainfall_entry_mob_add->rainfall->editAttributes() ?>>
</span>
<?php echo $vw_staff_rainfall_entry_mob_add->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_add->obs_remarks->Visible) { // obs_remarks ?>
	<div id="r_obs_remarks" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mob_obs_remarks" for="x_obs_remarks" class="<?php echo $vw_staff_rainfall_entry_mob_add->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_mob_add->obs_remarks->caption() ?><?php echo $vw_staff_rainfall_entry_mob_add->obs_remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_mob_add->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_mob_add->obs_remarks->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mob_obs_remarks">
<input type="text" data-table="vw_staff_rainfall_entry_mob" data-field="x_obs_remarks" name="x_obs_remarks" id="x_obs_remarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($vw_staff_rainfall_entry_mob_add->obs_remarks->getPlaceHolder()) ?>" value="<?php echo $vw_staff_rainfall_entry_mob_add->obs_remarks->EditValue ?>"<?php echo $vw_staff_rainfall_entry_mob_add->obs_remarks->editAttributes() ?>>
</span>
<?php echo $vw_staff_rainfall_entry_mob_add->obs_remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_add->mobile_number->Visible) { // mobile_number ?>
	<div id="r_mobile_number" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mob_mobile_number" for="x_mobile_number" class="<?php echo $vw_staff_rainfall_entry_mob_add->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_mob_add->mobile_number->caption() ?><?php echo $vw_staff_rainfall_entry_mob_add->mobile_number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_mob_add->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_mob_add->mobile_number->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mob_mobile_number">
<input type="text" data-table="vw_staff_rainfall_entry_mob" data-field="x_mobile_number" name="x_mobile_number" id="x_mobile_number" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($vw_staff_rainfall_entry_mob_add->mobile_number->getPlaceHolder()) ?>" value="<?php echo $vw_staff_rainfall_entry_mob_add->mobile_number->EditValue ?>"<?php echo $vw_staff_rainfall_entry_mob_add->mobile_number->editAttributes() ?>>
</span>
<?php echo $vw_staff_rainfall_entry_mob_add->mobile_number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_add->mst_status->Visible) { // mst_status ?>
	<div id="r_mst_status" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mob_mst_status" for="x_mst_status" class="<?php echo $vw_staff_rainfall_entry_mob_add->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_mob_add->mst_status->caption() ?><?php echo $vw_staff_rainfall_entry_mob_add->mst_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_mob_add->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_mob_add->mst_status->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mob_mst_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_staff_rainfall_entry_mob" data-field="x_mst_status" data-value-separator="<?php echo $vw_staff_rainfall_entry_mob_add->mst_status->displayValueSeparatorAttribute() ?>" id="x_mst_status" name="x_mst_status"<?php echo $vw_staff_rainfall_entry_mob_add->mst_status->editAttributes() ?>>
			<?php echo $vw_staff_rainfall_entry_mob_add->mst_status->selectOptionListHtml("x_mst_status") ?>
		</select>
</div>
<?php echo $vw_staff_rainfall_entry_mob_add->mst_status->Lookup->getParamTag($vw_staff_rainfall_entry_mob_add, "p_x_mst_status") ?>
</span>
<?php echo $vw_staff_rainfall_entry_mob_add->mst_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_add->mst_validated->Visible) { // mst_validated ?>
	<div id="r_mst_validated" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mob_mst_validated" for="x_mst_validated" class="<?php echo $vw_staff_rainfall_entry_mob_add->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->caption() ?><?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_mob_add->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mob_mst_validated">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_staff_rainfall_entry_mob" data-field="x_mst_validated" data-value-separator="<?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->displayValueSeparatorAttribute() ?>" id="x_mst_validated" name="x_mst_validated"<?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->editAttributes() ?>>
			<?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->selectOptionListHtml("x_mst_validated") ?>
		</select>
</div>
<?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->Lookup->getParamTag($vw_staff_rainfall_entry_mob_add, "p_x_mst_validated") ?>
</span>
<?php echo $vw_staff_rainfall_entry_mob_add->mst_validated->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$vw_staff_rainfall_entry_mob_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $vw_staff_rainfall_entry_mob_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $vw_staff_rainfall_entry_mob_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$vw_staff_rainfall_entry_mob_add->showPageFooter();
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
$vw_staff_rainfall_entry_mob_add->terminate();
?>