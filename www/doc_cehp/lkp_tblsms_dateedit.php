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
$lkp_tblsms_date_edit = new lkp_tblsms_date_edit();

// Run the page
$lkp_tblsms_date_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_tblsms_date_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_tblsms_dateedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	flkp_tblsms_dateedit = currentForm = new ew.Form("flkp_tblsms_dateedit", "edit");

	// Validate form
	flkp_tblsms_dateedit.validate = function() {
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
			<?php if ($lkp_tblsms_date_edit->tblSMS_date->Required) { ?>
				elm = this.getElements("x" + infix + "_tblSMS_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_tblsms_date_edit->tblSMS_date->caption(), $lkp_tblsms_date_edit->tblSMS_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tblSMS_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lkp_tblsms_date_edit->tblSMS_date->errorMessage()) ?>");

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
	flkp_tblsms_dateedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flkp_tblsms_dateedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flkp_tblsms_dateedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_tblsms_date_edit->showPageHeader(); ?>
<?php
$lkp_tblsms_date_edit->showMessage();
?>
<form name="flkp_tblsms_dateedit" id="flkp_tblsms_dateedit" class="<?php echo $lkp_tblsms_date_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_tblsms_date">
<input type="hidden" name="k_hash" id="k_hash" value="<?php echo $lkp_tblsms_date_edit->HashValue ?>">
<?php if ($lkp_tblsms_date->UpdateConflict == "U") { // Record already updated by other user ?>
<input type="hidden" name="conflict" id="conflict" value="1">
<?php } ?>
<?php if ($lkp_tblsms_date->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$lkp_tblsms_date_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lkp_tblsms_date_edit->tblSMS_date->Visible) { // tblSMS_date ?>
	<div id="r_tblSMS_date" class="form-group row">
		<label id="elh_lkp_tblsms_date_tblSMS_date" for="x_tblSMS_date" class="<?php echo $lkp_tblsms_date_edit->LeftColumnClass ?>"><?php echo $lkp_tblsms_date_edit->tblSMS_date->caption() ?><?php echo $lkp_tblsms_date_edit->tblSMS_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_tblsms_date_edit->RightColumnClass ?>"><div <?php echo $lkp_tblsms_date_edit->tblSMS_date->cellAttributes() ?>>
<?php if (!$lkp_tblsms_date->isConfirm()) { ?>
<input type="text" data-table="lkp_tblsms_date" data-field="x_tblSMS_date" data-format="7" name="x_tblSMS_date" id="x_tblSMS_date" maxlength="19" value="<?php echo $lkp_tblsms_date_edit->tblSMS_date->EditValue ?>"<?php echo $lkp_tblsms_date_edit->tblSMS_date->editAttributes() ?>>
<?php if (!$lkp_tblsms_date_edit->tblSMS_date->ReadOnly && !$lkp_tblsms_date_edit->tblSMS_date->Disabled && !isset($lkp_tblsms_date_edit->tblSMS_date->EditAttrs["readonly"]) && !isset($lkp_tblsms_date_edit->tblSMS_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flkp_tblsms_dateedit", "datetimepicker"], function() {
	ew.createDateTimePicker("flkp_tblsms_dateedit", "x_tblSMS_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
<input type="hidden" data-table="lkp_tblsms_date" data-field="x_tblSMS_date" name="o_tblSMS_date" id="o_tblSMS_date" value="<?php echo HtmlEncode($lkp_tblsms_date_edit->tblSMS_date->OldValue != null ? $lkp_tblsms_date_edit->tblSMS_date->OldValue : $lkp_tblsms_date_edit->tblSMS_date->CurrentValue) ?>">
<?php } else { ?>
<span id="el_lkp_tblsms_date_tblSMS_date">
<span<?php echo $lkp_tblsms_date_edit->tblSMS_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lkp_tblsms_date_edit->tblSMS_date->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="lkp_tblsms_date" data-field="x_tblSMS_date" name="x_tblSMS_date" id="x_tblSMS_date" value="<?php echo HtmlEncode($lkp_tblsms_date_edit->tblSMS_date->FormValue) ?>">
<input type="hidden" data-table="lkp_tblsms_date" data-field="x_tblSMS_date" name="o_tblSMS_date" id="o_tblSMS_date" value="<?php echo HtmlEncode($lkp_tblsms_date_edit->tblSMS_date->OldValue != null ? $lkp_tblsms_date_edit->tblSMS_date->OldValue : $lkp_tblsms_date_edit->tblSMS_date->CurrentValue) ?>">
<?php } ?>
<?php echo $lkp_tblsms_date_edit->tblSMS_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lkp_tblsms_date_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lkp_tblsms_date_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if ($lkp_tblsms_date->UpdateConflict == "U") { // Record already updated by other user ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='overwrite';"><?php echo $Language->phrase("OverwriteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-reload" id="btn-reload" type="submit" onclick="this.form.action.value='show';"><?php echo $Language->phrase("ReloadBtn") ?></button>
<?php } else { ?>
<?php if (!$lkp_tblsms_date->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_tblsms_date_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("ConfirmBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="submit" onclick="this.form.action.value='cancel';"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } ?>
<?php } ?>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lkp_tblsms_date_edit->showPageFooter();
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
$lkp_tblsms_date_edit->terminate();
?>