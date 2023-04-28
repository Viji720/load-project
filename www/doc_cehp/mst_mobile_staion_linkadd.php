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
$mst_mobile_staion_link_add = new mst_mobile_staion_link_add();

// Run the page
$mst_mobile_staion_link_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mst_mobile_staion_link_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmst_mobile_staion_linkadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmst_mobile_staion_linkadd = currentForm = new ew.Form("fmst_mobile_staion_linkadd", "add");

	// Validate form
	fmst_mobile_staion_linkadd.validate = function() {
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
			<?php if ($mst_mobile_staion_link_add->senderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_senderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_add->senderMobileNumber->caption(), $mst_mobile_staion_link_add->senderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_mobile_staion_link_add->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_add->StationId->caption(), $mst_mobile_staion_link_add->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_mobile_staion_link_add->Effective_From_Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Effective_From_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_add->Effective_From_Date->caption(), $mst_mobile_staion_link_add->Effective_From_Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Effective_From_Date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mst_mobile_staion_link_add->Effective_From_Date->errorMessage()) ?>");
			<?php if ($mst_mobile_staion_link_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_mobile_staion_link_add->Remarks->caption(), $mst_mobile_staion_link_add->Remarks->RequiredErrorMessage)) ?>");
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
	fmst_mobile_staion_linkadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmst_mobile_staion_linkadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmst_mobile_staion_linkadd.lists["x_StationId"] = <?php echo $mst_mobile_staion_link_add->StationId->Lookup->toClientList($mst_mobile_staion_link_add) ?>;
	fmst_mobile_staion_linkadd.lists["x_StationId"].options = <?php echo JsonEncode($mst_mobile_staion_link_add->StationId->lookupOptions()) ?>;
	loadjs.done("fmst_mobile_staion_linkadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mst_mobile_staion_link_add->showPageHeader(); ?>
<?php
$mst_mobile_staion_link_add->showMessage();
?>
<form name="fmst_mobile_staion_linkadd" id="fmst_mobile_staion_linkadd" class="<?php echo $mst_mobile_staion_link_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mst_mobile_staion_link">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mst_mobile_staion_link_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mst_mobile_staion_link_add->senderMobileNumber->Visible) { // senderMobileNumber ?>
	<div id="r_senderMobileNumber" class="form-group row">
		<label id="elh_mst_mobile_staion_link_senderMobileNumber" for="x_senderMobileNumber" class="<?php echo $mst_mobile_staion_link_add->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_add->senderMobileNumber->caption() ?><?php echo $mst_mobile_staion_link_add->senderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_add->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_add->senderMobileNumber->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_senderMobileNumber">
<input type="text" data-table="mst_mobile_staion_link" data-field="x_senderMobileNumber" name="x_senderMobileNumber" id="x_senderMobileNumber" size="30" maxlength="25" value="<?php echo $mst_mobile_staion_link_add->senderMobileNumber->EditValue ?>"<?php echo $mst_mobile_staion_link_add->senderMobileNumber->editAttributes() ?>>
</span>
<?php echo $mst_mobile_staion_link_add->senderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_mobile_staion_link_add->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_mst_mobile_staion_link_StationId" for="x_StationId" class="<?php echo $mst_mobile_staion_link_add->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_add->StationId->caption() ?><?php echo $mst_mobile_staion_link_add->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_add->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_add->StationId->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_StationId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mst_mobile_staion_link" data-field="x_StationId" data-value-separator="<?php echo $mst_mobile_staion_link_add->StationId->displayValueSeparatorAttribute() ?>" id="x_StationId" name="x_StationId"<?php echo $mst_mobile_staion_link_add->StationId->editAttributes() ?>>
			<?php echo $mst_mobile_staion_link_add->StationId->selectOptionListHtml("x_StationId") ?>
		</select>
</div>
<?php echo $mst_mobile_staion_link_add->StationId->Lookup->getParamTag($mst_mobile_staion_link_add, "p_x_StationId") ?>
</span>
<?php echo $mst_mobile_staion_link_add->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_mobile_staion_link_add->Effective_From_Date->Visible) { // Effective_From_Date ?>
	<div id="r_Effective_From_Date" class="form-group row">
		<label id="elh_mst_mobile_staion_link_Effective_From_Date" for="x_Effective_From_Date" class="<?php echo $mst_mobile_staion_link_add->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_add->Effective_From_Date->caption() ?><?php echo $mst_mobile_staion_link_add->Effective_From_Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_add->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_add->Effective_From_Date->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_Effective_From_Date">
<input type="text" data-table="mst_mobile_staion_link" data-field="x_Effective_From_Date" data-format="7" name="x_Effective_From_Date" id="x_Effective_From_Date" maxlength="10" value="<?php echo $mst_mobile_staion_link_add->Effective_From_Date->EditValue ?>"<?php echo $mst_mobile_staion_link_add->Effective_From_Date->editAttributes() ?>>
<?php if (!$mst_mobile_staion_link_add->Effective_From_Date->ReadOnly && !$mst_mobile_staion_link_add->Effective_From_Date->Disabled && !isset($mst_mobile_staion_link_add->Effective_From_Date->EditAttrs["readonly"]) && !isset($mst_mobile_staion_link_add->Effective_From_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmst_mobile_staion_linkadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fmst_mobile_staion_linkadd", "x_Effective_From_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $mst_mobile_staion_link_add->Effective_From_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_mobile_staion_link_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_mst_mobile_staion_link_Remarks" for="x_Remarks" class="<?php echo $mst_mobile_staion_link_add->LeftColumnClass ?>"><?php echo $mst_mobile_staion_link_add->Remarks->caption() ?><?php echo $mst_mobile_staion_link_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_mobile_staion_link_add->RightColumnClass ?>"><div <?php echo $mst_mobile_staion_link_add->Remarks->cellAttributes() ?>>
<span id="el_mst_mobile_staion_link_Remarks">
<input type="text" data-table="mst_mobile_staion_link" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="255" value="<?php echo $mst_mobile_staion_link_add->Remarks->EditValue ?>"<?php echo $mst_mobile_staion_link_add->Remarks->editAttributes() ?>>
</span>
<?php echo $mst_mobile_staion_link_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mst_mobile_staion_link_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mst_mobile_staion_link_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mst_mobile_staion_link_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mst_mobile_staion_link_add->showPageFooter();
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
$mst_mobile_staion_link_add->terminate();
?>