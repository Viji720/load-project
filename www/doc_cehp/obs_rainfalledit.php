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
$obs_rainfall_edit = new obs_rainfall_edit();

// Run the page
$obs_rainfall_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_rainfall_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fobs_rainfalledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fobs_rainfalledit = currentForm = new ew.Form("fobs_rainfalledit", "edit");

	// Validate form
	fobs_rainfalledit.validate = function() {
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
			<?php if ($obs_rainfall_edit->obs_date->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->obs_date->caption(), $obs_rainfall_edit->obs_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_rainfall_edit->stationcode->Required) { ?>
				elm = this.getElements("x" + infix + "_stationcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->stationcode->caption(), $obs_rainfall_edit->stationcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_rainfall_edit->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->rainfall->caption(), $obs_rainfall_edit->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_rainfall_edit->rainfall->errorMessage()) ?>");
			<?php if ($obs_rainfall_edit->rainfall_lastyear->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall_lastyear");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->rainfall_lastyear->caption(), $obs_rainfall_edit->rainfall_lastyear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_rainfall_edit->rainfall_30year_avg->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall_30year_avg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->rainfall_30year_avg->caption(), $obs_rainfall_edit->rainfall_30year_avg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_rainfall_edit->obs_Status->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->obs_Status->caption(), $obs_rainfall_edit->obs_Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_rainfall_edit->obs_remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->obs_remarks->caption(), $obs_rainfall_edit->obs_remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_rainfall_edit->Validated->Required) { ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->Validated->caption(), $obs_rainfall_edit->Validated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_rainfall_edit->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_rainfall_edit->SubDivisionId->caption(), $obs_rainfall_edit->SubDivisionId->RequiredErrorMessage)) ?>");
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
	fobs_rainfalledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fobs_rainfalledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fobs_rainfalledit.lists["x_obs_Status"] = <?php echo $obs_rainfall_edit->obs_Status->Lookup->toClientList($obs_rainfall_edit) ?>;
	fobs_rainfalledit.lists["x_obs_Status"].options = <?php echo JsonEncode($obs_rainfall_edit->obs_Status->lookupOptions()) ?>;
	loadjs.done("fobs_rainfalledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $obs_rainfall_edit->showPageHeader(); ?>
<?php
$obs_rainfall_edit->showMessage();
?>
<form name="fobs_rainfalledit" id="fobs_rainfalledit" class="<?php echo $obs_rainfall_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_rainfall">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$obs_rainfall_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($obs_rainfall_edit->obs_date->Visible) { // obs_date ?>
	<div id="r_obs_date" class="form-group row">
		<label id="elh_obs_rainfall_obs_date" for="x_obs_date" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->obs_date->caption() ?><?php echo $obs_rainfall_edit->obs_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->obs_date->cellAttributes() ?>>
<span id="el_obs_rainfall_obs_date">
<span<?php echo $obs_rainfall_edit->obs_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($obs_rainfall_edit->obs_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="obs_rainfall" data-field="x_obs_date" name="x_obs_date" id="x_obs_date" value="<?php echo HtmlEncode($obs_rainfall_edit->obs_date->CurrentValue) ?>">
<?php echo $obs_rainfall_edit->obs_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_rainfall_edit->stationcode->Visible) { // stationcode ?>
	<div id="r_stationcode" class="form-group row">
		<label id="elh_obs_rainfall_stationcode" for="x_stationcode" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->stationcode->caption() ?><?php echo $obs_rainfall_edit->stationcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->stationcode->cellAttributes() ?>>
<span id="el_obs_rainfall_stationcode">
<span<?php echo $obs_rainfall_edit->stationcode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($obs_rainfall_edit->stationcode->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="obs_rainfall" data-field="x_stationcode" name="x_stationcode" id="x_stationcode" value="<?php echo HtmlEncode($obs_rainfall_edit->stationcode->CurrentValue) ?>">
<?php echo $obs_rainfall_edit->stationcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_rainfall_edit->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_obs_rainfall_rainfall" for="x_rainfall" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->rainfall->caption() ?><?php echo $obs_rainfall_edit->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->rainfall->cellAttributes() ?>>
<span id="el_obs_rainfall_rainfall">
<input type="text" data-table="obs_rainfall" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="30" maxlength="7" value="<?php echo $obs_rainfall_edit->rainfall->EditValue ?>"<?php echo $obs_rainfall_edit->rainfall->editAttributes() ?>>
</span>
<?php echo $obs_rainfall_edit->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_rainfall_edit->rainfall_lastyear->Visible) { // rainfall_lastyear ?>
	<div id="r_rainfall_lastyear" class="form-group row">
		<label id="elh_obs_rainfall_rainfall_lastyear" for="x_rainfall_lastyear" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->rainfall_lastyear->caption() ?><?php echo $obs_rainfall_edit->rainfall_lastyear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->rainfall_lastyear->cellAttributes() ?>>
<span id="el_obs_rainfall_rainfall_lastyear">
<span<?php echo $obs_rainfall_edit->rainfall_lastyear->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($obs_rainfall_edit->rainfall_lastyear->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="obs_rainfall" data-field="x_rainfall_lastyear" name="x_rainfall_lastyear" id="x_rainfall_lastyear" value="<?php echo HtmlEncode($obs_rainfall_edit->rainfall_lastyear->CurrentValue) ?>">
<?php echo $obs_rainfall_edit->rainfall_lastyear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_rainfall_edit->rainfall_30year_avg->Visible) { // rainfall_30year_avg ?>
	<div id="r_rainfall_30year_avg" class="form-group row">
		<label id="elh_obs_rainfall_rainfall_30year_avg" for="x_rainfall_30year_avg" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->rainfall_30year_avg->caption() ?><?php echo $obs_rainfall_edit->rainfall_30year_avg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->rainfall_30year_avg->cellAttributes() ?>>
<span id="el_obs_rainfall_rainfall_30year_avg">
<span<?php echo $obs_rainfall_edit->rainfall_30year_avg->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($obs_rainfall_edit->rainfall_30year_avg->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="obs_rainfall" data-field="x_rainfall_30year_avg" name="x_rainfall_30year_avg" id="x_rainfall_30year_avg" value="<?php echo HtmlEncode($obs_rainfall_edit->rainfall_30year_avg->CurrentValue) ?>">
<?php echo $obs_rainfall_edit->rainfall_30year_avg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_rainfall_edit->obs_Status->Visible) { // obs_Status ?>
	<div id="r_obs_Status" class="form-group row">
		<label id="elh_obs_rainfall_obs_Status" for="x_obs_Status" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->obs_Status->caption() ?><?php echo $obs_rainfall_edit->obs_Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->obs_Status->cellAttributes() ?>>
<span id="el_obs_rainfall_obs_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="obs_rainfall" data-field="x_obs_Status" data-value-separator="<?php echo $obs_rainfall_edit->obs_Status->displayValueSeparatorAttribute() ?>" id="x_obs_Status" name="x_obs_Status"<?php echo $obs_rainfall_edit->obs_Status->editAttributes() ?>>
			<?php echo $obs_rainfall_edit->obs_Status->selectOptionListHtml("x_obs_Status") ?>
		</select>
</div>
<?php echo $obs_rainfall_edit->obs_Status->Lookup->getParamTag($obs_rainfall_edit, "p_x_obs_Status") ?>
</span>
<?php echo $obs_rainfall_edit->obs_Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_rainfall_edit->obs_remarks->Visible) { // obs_remarks ?>
	<div id="r_obs_remarks" class="form-group row">
		<label id="elh_obs_rainfall_obs_remarks" for="x_obs_remarks" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->obs_remarks->caption() ?><?php echo $obs_rainfall_edit->obs_remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->obs_remarks->cellAttributes() ?>>
<span id="el_obs_rainfall_obs_remarks">
<input type="text" data-table="obs_rainfall" data-field="x_obs_remarks" name="x_obs_remarks" id="x_obs_remarks" size="30" maxlength="50" value="<?php echo $obs_rainfall_edit->obs_remarks->EditValue ?>"<?php echo $obs_rainfall_edit->obs_remarks->editAttributes() ?>>
</span>
<?php echo $obs_rainfall_edit->obs_remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_rainfall_edit->Validated->Visible) { // Validated ?>
	<div id="r_Validated" class="form-group row">
		<label id="elh_obs_rainfall_Validated" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->Validated->caption() ?><?php echo $obs_rainfall_edit->Validated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->Validated->cellAttributes() ?>>
<span id="el_obs_rainfall_Validated">
<span<?php echo $obs_rainfall_edit->Validated->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($obs_rainfall_edit->Validated->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="obs_rainfall" data-field="x_Validated" name="x_Validated" id="x_Validated" value="<?php echo HtmlEncode($obs_rainfall_edit->Validated->CurrentValue) ?>">
<?php echo $obs_rainfall_edit->Validated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_rainfall_edit->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_obs_rainfall_SubDivisionId" for="x_SubDivisionId" class="<?php echo $obs_rainfall_edit->LeftColumnClass ?>"><?php echo $obs_rainfall_edit->SubDivisionId->caption() ?><?php echo $obs_rainfall_edit->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_rainfall_edit->RightColumnClass ?>"><div <?php echo $obs_rainfall_edit->SubDivisionId->cellAttributes() ?>>
<span id="el_obs_rainfall_SubDivisionId">
<span<?php echo $obs_rainfall_edit->SubDivisionId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($obs_rainfall_edit->SubDivisionId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="obs_rainfall" data-field="x_SubDivisionId" name="x_SubDivisionId" id="x_SubDivisionId" value="<?php echo HtmlEncode($obs_rainfall_edit->SubDivisionId->CurrentValue) ?>">
<?php echo $obs_rainfall_edit->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="obs_rainfall" data-field="x_obs_rainfall_ID" name="x_obs_rainfall_ID" id="x_obs_rainfall_ID" value="<?php echo HtmlEncode($obs_rainfall_edit->obs_rainfall_ID->CurrentValue) ?>">
<?php if (!$obs_rainfall_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $obs_rainfall_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $obs_rainfall_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$obs_rainfall_edit->showPageFooter();
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
$obs_rainfall_edit->terminate();
?>