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
$mst_mobile_staion_link_edit = new mst_mobile_staion_link_edit();

// Run the page
$mst_mobile_staion_link_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mst_mobile_staion_link_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmst_mobile_staion_linkedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmst_mobile_staion_linkedit = currentForm = new ew.Form("fmst_mobile_staion_linkedit", "edit");

	// Validate form
	fmst_mobile_staion_linkedit.validate = function() {
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
			<?php if ($mst_mobile_staion_link_edit->mobile_staion_link_id->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_staion_link_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_edit->mobile_staion_link_id->caption(), $mst_mobile_staion_link_edit->mobile_staion_link_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_mobile_staion_link_edit->senderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_senderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_edit->senderMobileNumber->caption(), $mst_mobile_staion_link_edit->senderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_mobile_staion_link_edit->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_edit->StationId->caption(), $mst_mobile_staion_link_edit->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_mobile_staion_link_edit->Effective_From_Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Effective_From_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_edit->Effective_From_Date->caption(), $mst_mobile_staion_link_edit->Effective_From_Date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_mobile_staion_link_edit->Effective_till_Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Effective_till_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_edit->Effective_till_Date->caption(), $mst_mobile_staion_link_edit->Effective_till_Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Effective_till_Date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mst_mobile_staion_link_edit->Effective_till_Date->errorMessage()) ?>");
			<?php if ($mst_mobile_staion_link_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_edit->Remarks->caption(), $mst_mobile_staion_link_edit->Remarks->RequiredErrorMessage)) ?>");
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
	fmst_mobile_staion_linkedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmst_mobile_staion_linkedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmst_mobile_staion_linkedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mst_mobile_staion_link_edit->showPageHeader(); ?>
<?php
$mst_mobile_staion_link_edit->showMessage();
?>
<form name="fmst_mobile_staion_linkedit" id="fmst_mobile_staion_linkedit" class="<?php echo $mst_mobile_staion_link_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mst_mobile_staion_link">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mst_mobile_staion_link_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mst_mobile_staion_link_edit->mobile_staion_link_id->Visible) { // mobile_staion_link_id ?>
	<div id="r_mobile_staion_link_id" class="form-group row">
		<label id="elh_mst_mobile_staion_link_mobile_staion_link_id" class="<?php echo $mst_mobile_staion_link_edit->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_edit->mobile_staion_link_id->caption() ?><?php echo $mst_mobile_staion_link_edit->mobile_staion_link_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_edit->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_edit->mobile_staion_link_id->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_mobile_staion_link_id">
<span<?php echo $mst_mobile_staion_link_edit->mobile_staion_link_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mst_mobile_staion_link_edit->mobile_staion_link_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mst_mobile_staion_link" data-field="x_mobile_staion_link_id" name="x_mobile_staion_link_id" id="x_mobile_staion_link_id" value="<?php echo HtmlEncode($mst_mobile_staion_link_edit->mobile_staion_link_id->CurrentValue) ?>">
<?php echo $mst_mobile_staion_link_edit->mobile_staion_link_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_mobile_staion_link_edit->senderMobileNumber->Visible) { // senderMobileNumber ?>
	<div id="r_senderMobileNumber" class="form-group row">
		<label id="elh_mst_mobile_staion_link_senderMobileNumber" for="x_senderMobileNumber" class="<?php echo $mst_mobile_staion_link_edit->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_edit->senderMobileNumber->caption() ?><?php echo $mst_mobile_staion_link_edit->senderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_edit->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_edit->senderMobileNumber->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_senderMobileNumber">
<span<?php echo $mst_mobile_staion_link_edit->senderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mst_mobile_staion_link_edit->senderMobileNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mst_mobile_staion_link" data-field="x_senderMobileNumber" name="x_senderMobileNumber" id="x_senderMobileNumber" value="<?php echo HtmlEncode($mst_mobile_staion_link_edit->senderMobileNumber->CurrentValue) ?>">
<?php echo $mst_mobile_staion_link_edit->senderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_mobile_staion_link_edit->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_mst_mobile_staion_link_StationId" for="x_StationId" class="<?php echo $mst_mobile_staion_link_edit->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_edit->StationId->caption() ?><?php echo $mst_mobile_staion_link_edit->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_edit->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_edit->StationId->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_StationId">
<span<?php echo $mst_mobile_staion_link_edit->StationId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mst_mobile_staion_link_edit->StationId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mst_mobile_staion_link" data-field="x_StationId" name="x_StationId" id="x_StationId" value="<?php echo HtmlEncode($mst_mobile_staion_link_edit->StationId->CurrentValue) ?>">
<?php echo $mst_mobile_staion_link_edit->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_mobile_staion_link_edit->Effective_From_Date->Visible) { // Effective_From_Date ?>
	<div id="r_Effective_From_Date" class="form-group row">
		<label id="elh_mst_mobile_staion_link_Effective_From_Date" for="x_Effective_From_Date" class="<?php echo $mst_mobile_staion_link_edit->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_edit->Effective_From_Date->caption() ?><?php echo $mst_mobile_staion_link_edit->Effective_From_Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_edit->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_edit->Effective_From_Date->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_Effective_From_Date">
<span<?php echo $mst_mobile_staion_link_edit->Effective_From_Date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mst_mobile_staion_link_edit->Effective_From_Date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mst_mobile_staion_link" data-field="x_Effective_From_Date" name="x_Effective_From_Date" id="x_Effective_From_Date" value="<?php echo HtmlEncode($mst_mobile_staion_link_edit->Effective_From_Date->CurrentValue) ?>">
<?php echo $mst_mobile_staion_link_edit->Effective_From_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_mobile_staion_link_edit->Effective_till_Date->Visible) { // Effective_till_Date ?>
	<div id="r_Effective_till_Date" class="form-group row">
		<label id="elh_mst_mobile_staion_link_Effective_till_Date" for="x_Effective_till_Date" class="<?php echo $mst_mobile_staion_link_edit->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_edit->Effective_till_Date->caption() ?><?php echo $mst_mobile_staion_link_edit->Effective_till_Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_edit->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_edit->Effective_till_Date->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_Effective_till_Date">
<input type="text" data-table="mst_mobile_staion_link" data-field="x_Effective_till_Date" data-format="7" name="x_Effective_till_Date" id="x_Effective_till_Date" maxlength="10" value="<?php echo $mst_mobile_staion_link_edit->Effective_till_Date->EditValue ?>"<?php echo $mst_mobile_staion_link_edit->Effective_till_Date->editAttributes() ?>>
<?php if (!$mst_mobile_staion_link_edit->Effective_till_Date->ReadOnly && !$mst_mobile_staion_link_edit->Effective_till_Date->Disabled && !isset($mst_mobile_staion_link_edit->Effective_till_Date->EditAttrs["readonly"]) && !isset($mst_mobile_staion_link_edit->Effective_till_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmst_mobile_staion_linkedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fmst_mobile_staion_linkedit", "x_Effective_till_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $mst_mobile_staion_link_edit->Effective_till_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_mobile_staion_link_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_mst_mobile_staion_link_Remarks" for="x_Remarks" class="<?php echo $mst_mobile_staion_link_edit->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_edit->Remarks->caption() ?><?php echo $mst_mobile_staion_link_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_edit->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_edit->Remarks->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_Remarks">
<input type="text" data-table="mst_mobile_staion_link" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="255" value="<?php echo $mst_mobile_staion_link_edit->Remarks->EditValue ?>"<?php echo $mst_mobile_staion_link_edit->Remarks->editAttributes() ?>>
</span>
<?php echo $mst_mobile_staion_link_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mst_mobile_staion_link_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mst_mobile_staion_link_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mst_mobile_staion_link_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mst_mobile_staion_link_edit->showPageFooter();
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
$mst_mobile_staion_link_edit->terminate();
?>