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
$vw_subdiv_rainfall_entry_edit = new vw_subdiv_rainfall_entry_edit();

// Run the page
$vw_subdiv_rainfall_entry_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_subdiv_rainfall_entry_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fvw_subdiv_rainfall_entryedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fvw_subdiv_rainfall_entryedit = currentForm = new ew.Form("fvw_subdiv_rainfall_entryedit", "edit");

	// Validate form
	fvw_subdiv_rainfall_entryedit.validate = function() {
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
			<?php if ($vw_subdiv_rainfall_entry_edit->obs_date->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_edit->obs_date->caption(), $vw_subdiv_rainfall_entry_edit->obs_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_edit->stationcode->Required) { ?>
				elm = this.getElements("x" + infix + "_stationcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_edit->stationcode->caption(), $vw_subdiv_rainfall_entry_edit->stationcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_edit->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_edit->SubDivisionId->caption(), $vw_subdiv_rainfall_entry_edit->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_edit->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_edit->rainfall->caption(), $vw_subdiv_rainfall_entry_edit->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_subdiv_rainfall_entry_edit->rainfall->errorMessage()) ?>");
			<?php if ($vw_subdiv_rainfall_entry_edit->obs_remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_edit->obs_remarks->caption(), $vw_subdiv_rainfall_entry_edit->obs_remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_edit->isFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_isFreeze");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_edit->isFreeze->caption(), $vw_subdiv_rainfall_entry_edit->isFreeze->RequiredErrorMessage)) ?>");
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
	fvw_subdiv_rainfall_entryedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_subdiv_rainfall_entryedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fvw_subdiv_rainfall_entryedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $vw_subdiv_rainfall_entry_edit->showPageHeader(); ?>
<?php
$vw_subdiv_rainfall_entry_edit->showMessage();
?>
<form name="fvw_subdiv_rainfall_entryedit" id="fvw_subdiv_rainfall_entryedit" class="<?php echo $vw_subdiv_rainfall_entry_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_subdiv_rainfall_entry">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$vw_subdiv_rainfall_entry_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($vw_subdiv_rainfall_entry_edit->obs_date->Visible) { // obs_date ?>
	<div id="r_obs_date" class="form-group row">
		<label id="elh_vw_subdiv_rainfall_entry_obs_date" for="x_obs_date" class="<?php echo $vw_subdiv_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_subdiv_rainfall_entry_edit->obs_date->caption() ?><?php echo $vw_subdiv_rainfall_entry_edit->obs_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_subdiv_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_subdiv_rainfall_entry_edit->obs_date->cellAttributes() ?>>
<span id="el_vw_subdiv_rainfall_entry_obs_date">
<span<?php echo $vw_subdiv_rainfall_entry_edit->obs_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_subdiv_rainfall_entry_edit->obs_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_date" name="x_obs_date" id="x_obs_date" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_edit->obs_date->CurrentValue) ?>">
<?php echo $vw_subdiv_rainfall_entry_edit->obs_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_edit->stationcode->Visible) { // stationcode ?>
	<div id="r_stationcode" class="form-group row">
		<label id="elh_vw_subdiv_rainfall_entry_stationcode" for="x_stationcode" class="<?php echo $vw_subdiv_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_subdiv_rainfall_entry_edit->stationcode->caption() ?><?php echo $vw_subdiv_rainfall_entry_edit->stationcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_subdiv_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_subdiv_rainfall_entry_edit->stationcode->cellAttributes() ?>>
<span id="el_vw_subdiv_rainfall_entry_stationcode">
<span<?php echo $vw_subdiv_rainfall_entry_edit->stationcode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_subdiv_rainfall_entry_edit->stationcode->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_stationcode" name="x_stationcode" id="x_stationcode" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_edit->stationcode->CurrentValue) ?>">
<?php echo $vw_subdiv_rainfall_entry_edit->stationcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_edit->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_vw_subdiv_rainfall_entry_SubDivisionId" for="x_SubDivisionId" class="<?php echo $vw_subdiv_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_subdiv_rainfall_entry_edit->SubDivisionId->caption() ?><?php echo $vw_subdiv_rainfall_entry_edit->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_subdiv_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_subdiv_rainfall_entry_edit->SubDivisionId->cellAttributes() ?>>
<span id="el_vw_subdiv_rainfall_entry_SubDivisionId">
<span<?php echo $vw_subdiv_rainfall_entry_edit->SubDivisionId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_subdiv_rainfall_entry_edit->SubDivisionId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivisionId" name="x_SubDivisionId" id="x_SubDivisionId" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_edit->SubDivisionId->CurrentValue) ?>">
<?php echo $vw_subdiv_rainfall_entry_edit->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_edit->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_vw_subdiv_rainfall_entry_rainfall" for="x_rainfall" class="<?php echo $vw_subdiv_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_subdiv_rainfall_entry_edit->rainfall->caption() ?><?php echo $vw_subdiv_rainfall_entry_edit->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_subdiv_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_subdiv_rainfall_entry_edit->rainfall->cellAttributes() ?>>
<span id="el_vw_subdiv_rainfall_entry_rainfall">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="30" maxlength="7" value="<?php echo $vw_subdiv_rainfall_entry_edit->rainfall->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_edit->rainfall->editAttributes() ?>>
</span>
<?php echo $vw_subdiv_rainfall_entry_edit->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_edit->obs_remarks->Visible) { // obs_remarks ?>
	<div id="r_obs_remarks" class="form-group row">
		<label id="elh_vw_subdiv_rainfall_entry_obs_remarks" for="x_obs_remarks" class="<?php echo $vw_subdiv_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_subdiv_rainfall_entry_edit->obs_remarks->caption() ?><?php echo $vw_subdiv_rainfall_entry_edit->obs_remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_subdiv_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_subdiv_rainfall_entry_edit->obs_remarks->cellAttributes() ?>>
<span id="el_vw_subdiv_rainfall_entry_obs_remarks">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_remarks" name="x_obs_remarks" id="x_obs_remarks" size="30" maxlength="50" value="<?php echo $vw_subdiv_rainfall_entry_edit->obs_remarks->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_edit->obs_remarks->editAttributes() ?>>
</span>
<?php echo $vw_subdiv_rainfall_entry_edit->obs_remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_edit->isFreeze->Visible) { // isFreeze ?>
	<div id="r_isFreeze" class="form-group row">
		<label id="elh_vw_subdiv_rainfall_entry_isFreeze" class="<?php echo $vw_subdiv_rainfall_entry_edit->LeftColumnClass ?>"><?php echo $vw_subdiv_rainfall_entry_edit->isFreeze->caption() ?><?php echo $vw_subdiv_rainfall_entry_edit->isFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_subdiv_rainfall_entry_edit->RightColumnClass ?>"><div <?php echo $vw_subdiv_rainfall_entry_edit->isFreeze->cellAttributes() ?>>
<span id="el_vw_subdiv_rainfall_entry_isFreeze">
<span<?php echo $vw_subdiv_rainfall_entry_edit->isFreeze->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_subdiv_rainfall_entry_edit->isFreeze->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_isFreeze" name="x_isFreeze" id="x_isFreeze" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_edit->isFreeze->CurrentValue) ?>">
<?php echo $vw_subdiv_rainfall_entry_edit->isFreeze->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_rainfall_ID" name="x_obs_rainfall_ID" id="x_obs_rainfall_ID" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_edit->obs_rainfall_ID->CurrentValue) ?>">
<?php if (!$vw_subdiv_rainfall_entry_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $vw_subdiv_rainfall_entry_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $vw_subdiv_rainfall_entry_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$vw_subdiv_rainfall_entry_edit->showPageFooter();
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
$vw_subdiv_rainfall_entry_edit->terminate();
?>