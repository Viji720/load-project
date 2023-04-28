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
$vw_staff_rainfall_entry_edit = new vw_staff_rainfall_entry_edit();

// Run the page
$vw_staff_rainfall_entry_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_staff_rainfall_entry_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fvw_staff_rainfall_entryedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fvw_staff_rainfall_entryedit = currentForm = new ew.Form("fvw_staff_rainfall_entryedit", "edit");

	// Validate form
	fvw_staff_rainfall_entryedit.validate = function() {
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
			<?php if ($vw_staff_rainfall_entry_edit->obs_date->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->obs_date->caption(), $vw_staff_rainfall_entry_edit->obs_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_edit->stationcode->Required) { ?>
				elm = this.getElements("x" + infix + "_stationcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->stationcode->caption(), $vw_staff_rainfall_entry_edit->stationcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_edit->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->rainfall->caption(), $vw_staff_rainfall_entry_edit->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkRange(elm.value, 0, 600))
					return this.onError(elm, "<?php echo JsEncode($vw_staff_rainfall_entry_edit->rainfall->errorMessage()) ?>");
			<?php if ($vw_staff_rainfall_entry_edit->obs_remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->obs_remarks->caption(), $vw_staff_rainfall_entry_edit->obs_remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_edit->mst_status->Required) { ?>
				elm = this.getElements("x" + infix + "_mst_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->mst_status->caption(), $vw_staff_rainfall_entry_edit->mst_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_edit->mst_validated->Required) { ?>
				elm = this.getElements("x" + infix + "_mst_validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->mst_validated->caption(), $vw_staff_rainfall_entry_edit->mst_validated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_edit->mobile_number->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_number");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->mobile_number->caption(), $vw_staff_rainfall_entry_edit->mobile_number->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_staff_rainfall_entry_edit->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->SubDivisionId->caption(), $vw_staff_rainfall_entry_edit->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_staff_rainfall_entry_edit->SubDivisionId->errorMessage()) ?>");
			<?php if ($vw_staff_rainfall_entry_edit->SubDivision_code->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivision_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->SubDivision_code->caption(), $vw_staff_rainfall_entry_edit->SubDivision_code->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubDivision_code");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_staff_rainfall_entry_edit->SubDivision_code->errorMessage()) ?>");
			<?php if ($vw_staff_rainfall_entry_edit->obs_owner->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_owner");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_staff_rainfall_entry_edit->obs_owner->caption(), $vw_staff_rainfall_entry_edit->obs_owner->RequiredErrorMessage)) ?>");
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
	fvw_staff_rainfall_entryedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_staff_rainfall_entryedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fvw_staff_rainfall_entryedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $vw_staff_rainfall_entry_edit->showPageHeader(); ?>
<?php
$vw_staff_rainfall_entry_edit->showMessage();
?>
<form name="fvw_staff_rainfall_entryedit" id="fvw_staff_rainfall_entryedit" class="<?php echo $vw_staff_rainfall_entry_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_staff_rainfall_entry">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$vw_staff_rainfall_entry_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($vw_staff_rainfall_entry_edit->obs_date->Visible) { // obs_date ?>
	<div id="r_obs_date" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_obs_date" for="x_obs_date" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->obs_date->caption() ?><?php echo $vw_staff_rainfall_entry_edit->obs_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->obs_date->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_obs_date">
<span<?php echo $vw_staff_rainfall_entry_edit->obs_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_staff_rainfall_entry_edit->obs_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_staff_rainfall_entry" data-field="x_obs_date" name="x_obs_date" id="x_obs_date" value="<?php echo HtmlEncode($vw_staff_rainfall_entry_edit->obs_date->CurrentValue) ?>">
<?php echo $vw_staff_rainfall_entry_edit->obs_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->stationcode->Visible) { // stationcode ?>
	<div id="r_stationcode" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_stationcode" for="x_stationcode" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->stationcode->caption() ?><?php echo $vw_staff_rainfall_entry_edit->stationcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->stationcode->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_stationcode">
<span<?php echo $vw_staff_rainfall_entry_edit->stationcode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_staff_rainfall_entry_edit->stationcode->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_staff_rainfall_entry" data-field="x_stationcode" name="x_stationcode" id="x_stationcode" value="<?php echo HtmlEncode($vw_staff_rainfall_entry_edit->stationcode->CurrentValue) ?>">
<?php echo $vw_staff_rainfall_entry_edit->stationcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_rainfall" for="x_rainfall" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->rainfall->caption() ?><?php echo $vw_staff_rainfall_entry_edit->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->rainfall->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_rainfall">
<input type="text" data-table="vw_staff_rainfall_entry" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="7" maxlength="7" value="<?php echo $vw_staff_rainfall_entry_edit->rainfall->EditValue ?>"<?php echo $vw_staff_rainfall_entry_edit->rainfall->editAttributes() ?>>
</span>
<?php echo $vw_staff_rainfall_entry_edit->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->obs_remarks->Visible) { // obs_remarks ?>
	<div id="r_obs_remarks" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_obs_remarks" for="x_obs_remarks" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->obs_remarks->caption() ?><?php echo $vw_staff_rainfall_entry_edit->obs_remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->obs_remarks->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_obs_remarks">
<input type="text" data-table="vw_staff_rainfall_entry" data-field="x_obs_remarks" name="x_obs_remarks" id="x_obs_remarks" size="30" maxlength="50" value="<?php echo $vw_staff_rainfall_entry_edit->obs_remarks->EditValue ?>"<?php echo $vw_staff_rainfall_entry_edit->obs_remarks->editAttributes() ?>>
</span>
<?php echo $vw_staff_rainfall_entry_edit->obs_remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->mst_status->Visible) { // mst_status ?>
	<div id="r_mst_status" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mst_status" for="x_mst_status" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->mst_status->caption() ?><?php echo $vw_staff_rainfall_entry_edit->mst_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->mst_status->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mst_status">
<span<?php echo $vw_staff_rainfall_entry_edit->mst_status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_staff_rainfall_entry_edit->mst_status->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_staff_rainfall_entry" data-field="x_mst_status" name="x_mst_status" id="x_mst_status" value="<?php echo HtmlEncode($vw_staff_rainfall_entry_edit->mst_status->CurrentValue) ?>">
<?php echo $vw_staff_rainfall_entry_edit->mst_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->mst_validated->Visible) { // mst_validated ?>
	<div id="r_mst_validated" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mst_validated" for="x_mst_validated" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->mst_validated->caption() ?><?php echo $vw_staff_rainfall_entry_edit->mst_validated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->mst_validated->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mst_validated">
<span<?php echo $vw_staff_rainfall_entry_edit->mst_validated->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_staff_rainfall_entry_edit->mst_validated->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_staff_rainfall_entry" data-field="x_mst_validated" name="x_mst_validated" id="x_mst_validated" value="<?php echo HtmlEncode($vw_staff_rainfall_entry_edit->mst_validated->CurrentValue) ?>">
<?php echo $vw_staff_rainfall_entry_edit->mst_validated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->mobile_number->Visible) { // mobile_number ?>
	<div id="r_mobile_number" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_mobile_number" for="x_mobile_number" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->mobile_number->caption() ?><?php echo $vw_staff_rainfall_entry_edit->mobile_number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->mobile_number->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_mobile_number">
<span<?php echo $vw_staff_rainfall_entry_edit->mobile_number->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_staff_rainfall_entry_edit->mobile_number->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_staff_rainfall_entry" data-field="x_mobile_number" name="x_mobile_number" id="x_mobile_number" value="<?php echo HtmlEncode($vw_staff_rainfall_entry_edit->mobile_number->CurrentValue) ?>">
<?php echo $vw_staff_rainfall_entry_edit->mobile_number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_SubDivisionId" for="x_SubDivisionId" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->SubDivisionId->caption() ?><?php echo $vw_staff_rainfall_entry_edit->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->SubDivisionId->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_SubDivisionId">
<input type="text" data-table="vw_staff_rainfall_entry" data-field="x_SubDivisionId" name="x_SubDivisionId" id="x_SubDivisionId" size="30" maxlength="11" value="<?php echo $vw_staff_rainfall_entry_edit->SubDivisionId->EditValue ?>"<?php echo $vw_staff_rainfall_entry_edit->SubDivisionId->editAttributes() ?>>
</span>
<?php echo $vw_staff_rainfall_entry_edit->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->SubDivision_code->Visible) { // SubDivision_code ?>
	<div id="r_SubDivision_code" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_SubDivision_code" for="x_SubDivision_code" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->SubDivision_code->caption() ?><?php echo $vw_staff_rainfall_entry_edit->SubDivision_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->SubDivision_code->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_SubDivision_code">
<input type="text" data-table="vw_staff_rainfall_entry" data-field="x_SubDivision_code" name="x_SubDivision_code" id="x_SubDivision_code" size="30" maxlength="11" value="<?php echo $vw_staff_rainfall_entry_edit->SubDivision_code->EditValue ?>"<?php echo $vw_staff_rainfall_entry_edit->SubDivision_code->editAttributes() ?>>
</span>
<?php echo $vw_staff_rainfall_entry_edit->SubDivision_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_edit->obs_owner->Visible) { // obs_owner ?>
	<div id="r_obs_owner" class="form-group row">
		<label id="elh_vw_staff_rainfall_entry_obs_owner" for="x_obs_owner" class="<?php echo $vw_staff_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_staff_rainfall_entry_edit->obs_owner->caption() ?><?php echo $vw_staff_rainfall_entry_edit->obs_owner->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_staff_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_staff_rainfall_entry_edit->obs_owner->cellAttributes() ?>>
<span id="el_vw_staff_rainfall_entry_obs_owner">
<input type="text" data-table="vw_staff_rainfall_entry" data-field="x_obs_owner" name="x_obs_owner" id="x_obs_owner" size="30" maxlength="25" value="<?php echo $vw_staff_rainfall_entry_edit->obs_owner->EditValue ?>"<?php echo $vw_staff_rainfall_entry_edit->obs_owner->editAttributes() ?>>
</span>
<?php echo $vw_staff_rainfall_entry_edit->obs_owner->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="vw_staff_rainfall_entry" data-field="x_obs_rainfall_ID" name="x_obs_rainfall_ID" id="x_obs_rainfall_ID" value="<?php echo HtmlEncode($vw_staff_rainfall_entry_edit->obs_rainfall_ID->CurrentValue) ?>">
<?php if (!$vw_staff_rainfall_entry_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $vw_staff_rainfall_entry_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $vw_staff_rainfall_entry_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$vw_staff_rainfall_entry_edit->showPageFooter();
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
$vw_staff_rainfall_entry_edit->terminate();
?>