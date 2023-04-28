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
$tbl_smsdata_archive_edit = new tbl_smsdata_archive_edit();

// Run the page
$tbl_smsdata_archive_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_smsdata_archive_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftbl_smsdata_archiveedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ftbl_smsdata_archiveedit = currentForm = new ew.Form("ftbl_smsdata_archiveedit", "edit");

	// Validate form
	ftbl_smsdata_archiveedit.validate = function() {
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
			<?php if ($tbl_smsdata_archive_edit->Slno->Required) { ?>
				elm = this.getElements("x" + infix + "_Slno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->Slno->caption(), $tbl_smsdata_archive_edit->Slno->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Slno");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->Slno->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->SMSDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->SMSDateTime->caption(), $tbl_smsdata_archive_edit->SMSDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->SMSDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->SystemDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->SystemDateTime->caption(), $tbl_smsdata_archive_edit->SystemDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->SystemDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->ConfirmQueryDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ConfirmQueryDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->ConfirmQueryDateTime->caption(), $tbl_smsdata_archive_edit->ConfirmQueryDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConfirmQueryDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->ConfirmQueryDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->ConfirmedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ConfirmedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->ConfirmedDateTime->caption(), $tbl_smsdata_archive_edit->ConfirmedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConfirmedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->ConfirmedDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->SendDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SendDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->SendDateTime->caption(), $tbl_smsdata_archive_edit->SendDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SendDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->SendDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->SMSText->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSText");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->SMSText->caption(), $tbl_smsdata_archive_edit->SMSText->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_archive_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->Status->caption(), $tbl_smsdata_archive_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->Status->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->obsremarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obsremarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->obsremarks->caption(), $tbl_smsdata_archive_edit->obsremarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_archive_edit->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->SenderMobileNumber->caption(), $tbl_smsdata_archive_edit->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_archive_edit->SubDivId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->SubDivId->caption(), $tbl_smsdata_archive_edit->SubDivId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubDivId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->SubDivId->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->StationId->caption(), $tbl_smsdata_archive_edit->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->StationId->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->IsFirstMsg->Required) { ?>
				elm = this.getElements("x" + infix + "_IsFirstMsg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->IsFirstMsg->caption(), $tbl_smsdata_archive_edit->IsFirstMsg->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsFirstMsg");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->IsFirstMsg->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->Validated->Required) { ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->Validated->caption(), $tbl_smsdata_archive_edit->Validated->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->Validated->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->isFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_isFreeze[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->isFreeze->caption(), $tbl_smsdata_archive_edit->isFreeze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_archive_edit->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->rainfall->caption(), $tbl_smsdata_archive_edit->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->rainfall->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->min_air_temp->Required) { ?>
				elm = this.getElements("x" + infix + "_min_air_temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->min_air_temp->caption(), $tbl_smsdata_archive_edit->min_air_temp->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_min_air_temp");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->min_air_temp->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->max_air_temp->Required) { ?>
				elm = this.getElements("x" + infix + "_max_air_temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->max_air_temp->caption(), $tbl_smsdata_archive_edit->max_air_temp->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_max_air_temp");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->max_air_temp->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->atmospheric_pressure->Required) { ?>
				elm = this.getElements("x" + infix + "_atmospheric_pressure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->atmospheric_pressure->caption(), $tbl_smsdata_archive_edit->atmospheric_pressure->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_atmospheric_pressure");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->atmospheric_pressure->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->wind_speed->Required) { ?>
				elm = this.getElements("x" + infix + "_wind_speed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->wind_speed->caption(), $tbl_smsdata_archive_edit->wind_speed->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_wind_speed");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->wind_speed->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_edit->precipitation->Required) { ?>
				elm = this.getElements("x" + infix + "_precipitation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_edit->precipitation->caption(), $tbl_smsdata_archive_edit->precipitation->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_precipitation");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_edit->precipitation->errorMessage()) ?>");

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
	ftbl_smsdata_archiveedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_smsdata_archiveedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_smsdata_archiveedit.lists["x_isFreeze[]"] = <?php echo $tbl_smsdata_archive_edit->isFreeze->Lookup->toClientList($tbl_smsdata_archive_edit) ?>;
	ftbl_smsdata_archiveedit.lists["x_isFreeze[]"].options = <?php echo JsonEncode($tbl_smsdata_archive_edit->isFreeze->options(FALSE, TRUE)) ?>;
	loadjs.done("ftbl_smsdata_archiveedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tbl_smsdata_archive_edit->showPageHeader(); ?>
<?php
$tbl_smsdata_archive_edit->showMessage();
?>
<form name="ftbl_smsdata_archiveedit" id="ftbl_smsdata_archiveedit" class="<?php echo $tbl_smsdata_archive_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_smsdata_archive">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tbl_smsdata_archive_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tbl_smsdata_archive_edit->Slno->Visible) { // Slno ?>
	<div id="r_Slno" class="form-group row">
		<label id="elh_tbl_smsdata_archive_Slno" for="x_Slno" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->Slno->caption() ?><?php echo $tbl_smsdata_archive_edit->Slno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->Slno->cellAttributes() ?>>
<input type="text" data-table="tbl_smsdata_archive" data-field="x_Slno" name="x_Slno" id="x_Slno" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_edit->Slno->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->Slno->editAttributes() ?>>
<input type="hidden" data-table="tbl_smsdata_archive" data-field="x_Slno" name="o_Slno" id="o_Slno" value="<?php echo HtmlEncode($tbl_smsdata_archive_edit->Slno->OldValue != null ? $tbl_smsdata_archive_edit->Slno->OldValue : $tbl_smsdata_archive_edit->Slno->CurrentValue) ?>">
<?php echo $tbl_smsdata_archive_edit->Slno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->SMSDateTime->Visible) { // SMSDateTime ?>
	<div id="r_SMSDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SMSDateTime" for="x_SMSDateTime" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->SMSDateTime->caption() ?><?php echo $tbl_smsdata_archive_edit->SMSDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->SMSDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SMSDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SMSDateTime" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_edit->SMSDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->SMSDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_edit->SMSDateTime->ReadOnly && !$tbl_smsdata_archive_edit->SMSDateTime->Disabled && !isset($tbl_smsdata_archive_edit->SMSDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_edit->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveedit", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_edit->SMSDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->SystemDateTime->Visible) { // SystemDateTime ?>
	<div id="r_SystemDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SystemDateTime" for="x_SystemDateTime" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->SystemDateTime->caption() ?><?php echo $tbl_smsdata_archive_edit->SystemDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->SystemDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SystemDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SystemDateTime" name="x_SystemDateTime" id="x_SystemDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_edit->SystemDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->SystemDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_edit->SystemDateTime->ReadOnly && !$tbl_smsdata_archive_edit->SystemDateTime->Disabled && !isset($tbl_smsdata_archive_edit->SystemDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_edit->SystemDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveedit", "x_SystemDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_edit->SystemDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
	<div id="r_ConfirmQueryDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_ConfirmQueryDateTime" for="x_ConfirmQueryDateTime" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->ConfirmQueryDateTime->caption() ?><?php echo $tbl_smsdata_archive_edit->ConfirmQueryDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->ConfirmQueryDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_ConfirmQueryDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_ConfirmQueryDateTime" name="x_ConfirmQueryDateTime" id="x_ConfirmQueryDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_edit->ConfirmQueryDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->ConfirmQueryDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_edit->ConfirmQueryDateTime->ReadOnly && !$tbl_smsdata_archive_edit->ConfirmQueryDateTime->Disabled && !isset($tbl_smsdata_archive_edit->ConfirmQueryDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_edit->ConfirmQueryDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveedit", "x_ConfirmQueryDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_edit->ConfirmQueryDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
	<div id="r_ConfirmedDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_ConfirmedDateTime" for="x_ConfirmedDateTime" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->ConfirmedDateTime->caption() ?><?php echo $tbl_smsdata_archive_edit->ConfirmedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->ConfirmedDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_ConfirmedDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_ConfirmedDateTime" name="x_ConfirmedDateTime" id="x_ConfirmedDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_edit->ConfirmedDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->ConfirmedDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_edit->ConfirmedDateTime->ReadOnly && !$tbl_smsdata_archive_edit->ConfirmedDateTime->Disabled && !isset($tbl_smsdata_archive_edit->ConfirmedDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_edit->ConfirmedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveedit", "x_ConfirmedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_edit->ConfirmedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->SendDateTime->Visible) { // SendDateTime ?>
	<div id="r_SendDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SendDateTime" for="x_SendDateTime" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->SendDateTime->caption() ?><?php echo $tbl_smsdata_archive_edit->SendDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->SendDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SendDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SendDateTime" name="x_SendDateTime" id="x_SendDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_edit->SendDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->SendDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_edit->SendDateTime->ReadOnly && !$tbl_smsdata_archive_edit->SendDateTime->Disabled && !isset($tbl_smsdata_archive_edit->SendDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_edit->SendDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveedit", "x_SendDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_edit->SendDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->SMSText->Visible) { // SMSText ?>
	<div id="r_SMSText" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SMSText" for="x_SMSText" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->SMSText->caption() ?><?php echo $tbl_smsdata_archive_edit->SMSText->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->SMSText->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SMSText">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SMSText" name="x_SMSText" id="x_SMSText" size="30" maxlength="50" value="<?php echo $tbl_smsdata_archive_edit->SMSText->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->SMSText->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->SMSText->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_tbl_smsdata_archive_Status" for="x_Status" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->Status->caption() ?><?php echo $tbl_smsdata_archive_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->Status->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_Status">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_edit->Status->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->Status->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->obsremarks->Visible) { // obsremarks ?>
	<div id="r_obsremarks" class="form-group row">
		<label id="elh_tbl_smsdata_archive_obsremarks" for="x_obsremarks" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->obsremarks->caption() ?><?php echo $tbl_smsdata_archive_edit->obsremarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->obsremarks->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_obsremarks">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_obsremarks" name="x_obsremarks" id="x_obsremarks" size="30" maxlength="50" value="<?php echo $tbl_smsdata_archive_edit->obsremarks->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->obsremarks->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->obsremarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<div id="r_SenderMobileNumber" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SenderMobileNumber" for="x_SenderMobileNumber" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->SenderMobileNumber->caption() ?><?php echo $tbl_smsdata_archive_edit->SenderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->SenderMobileNumber->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SenderMobileNumber">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SenderMobileNumber" name="x_SenderMobileNumber" id="x_SenderMobileNumber" size="30" maxlength="25" value="<?php echo $tbl_smsdata_archive_edit->SenderMobileNumber->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->SenderMobileNumber->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->SenderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->SubDivId->Visible) { // SubDivId ?>
	<div id="r_SubDivId" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SubDivId" for="x_SubDivId" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->SubDivId->caption() ?><?php echo $tbl_smsdata_archive_edit->SubDivId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->SubDivId->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SubDivId">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SubDivId" name="x_SubDivId" id="x_SubDivId" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_edit->SubDivId->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->SubDivId->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->SubDivId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_tbl_smsdata_archive_StationId" for="x_StationId" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->StationId->caption() ?><?php echo $tbl_smsdata_archive_edit->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->StationId->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_StationId">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_StationId" name="x_StationId" id="x_StationId" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_edit->StationId->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->StationId->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->IsFirstMsg->Visible) { // IsFirstMsg ?>
	<div id="r_IsFirstMsg" class="form-group row">
		<label id="elh_tbl_smsdata_archive_IsFirstMsg" for="x_IsFirstMsg" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->IsFirstMsg->caption() ?><?php echo $tbl_smsdata_archive_edit->IsFirstMsg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->IsFirstMsg->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_IsFirstMsg">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_IsFirstMsg" name="x_IsFirstMsg" id="x_IsFirstMsg" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_edit->IsFirstMsg->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->IsFirstMsg->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->IsFirstMsg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->Validated->Visible) { // Validated ?>
	<div id="r_Validated" class="form-group row">
		<label id="elh_tbl_smsdata_archive_Validated" for="x_Validated" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->Validated->caption() ?><?php echo $tbl_smsdata_archive_edit->Validated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->Validated->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_Validated">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_Validated" name="x_Validated" id="x_Validated" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_edit->Validated->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->Validated->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->Validated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->isFreeze->Visible) { // isFreeze ?>
	<div id="r_isFreeze" class="form-group row">
		<label id="elh_tbl_smsdata_archive_isFreeze" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->isFreeze->caption() ?><?php echo $tbl_smsdata_archive_edit->isFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->isFreeze->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_isFreeze">
<?php
$selwrk = ConvertToBool($tbl_smsdata_archive_edit->isFreeze->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="tbl_smsdata_archive" data-field="x_isFreeze" name="x_isFreeze[]" id="x_isFreeze[]_872186" value="1"<?php echo $selwrk ?><?php echo $tbl_smsdata_archive_edit->isFreeze->editAttributes() ?>>
	<label class="custom-control-label" for="x_isFreeze[]_872186"></label>
</div>
</span>
<?php echo $tbl_smsdata_archive_edit->isFreeze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_tbl_smsdata_archive_rainfall" for="x_rainfall" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->rainfall->caption() ?><?php echo $tbl_smsdata_archive_edit->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->rainfall->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_rainfall">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_edit->rainfall->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->rainfall->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->min_air_temp->Visible) { // min_air_temp ?>
	<div id="r_min_air_temp" class="form-group row">
		<label id="elh_tbl_smsdata_archive_min_air_temp" for="x_min_air_temp" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->min_air_temp->caption() ?><?php echo $tbl_smsdata_archive_edit->min_air_temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->min_air_temp->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_min_air_temp">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_min_air_temp" name="x_min_air_temp" id="x_min_air_temp" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_edit->min_air_temp->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->min_air_temp->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->min_air_temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->max_air_temp->Visible) { // max_air_temp ?>
	<div id="r_max_air_temp" class="form-group row">
		<label id="elh_tbl_smsdata_archive_max_air_temp" for="x_max_air_temp" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->max_air_temp->caption() ?><?php echo $tbl_smsdata_archive_edit->max_air_temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->max_air_temp->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_max_air_temp">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_max_air_temp" name="x_max_air_temp" id="x_max_air_temp" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_edit->max_air_temp->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->max_air_temp->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->max_air_temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->atmospheric_pressure->Visible) { // atmospheric_pressure ?>
	<div id="r_atmospheric_pressure" class="form-group row">
		<label id="elh_tbl_smsdata_archive_atmospheric_pressure" for="x_atmospheric_pressure" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->atmospheric_pressure->caption() ?><?php echo $tbl_smsdata_archive_edit->atmospheric_pressure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->atmospheric_pressure->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_atmospheric_pressure">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_atmospheric_pressure" name="x_atmospheric_pressure" id="x_atmospheric_pressure" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_edit->atmospheric_pressure->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->atmospheric_pressure->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->atmospheric_pressure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->wind_speed->Visible) { // wind_speed ?>
	<div id="r_wind_speed" class="form-group row">
		<label id="elh_tbl_smsdata_archive_wind_speed" for="x_wind_speed" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->wind_speed->caption() ?><?php echo $tbl_smsdata_archive_edit->wind_speed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->wind_speed->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_wind_speed">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_wind_speed" name="x_wind_speed" id="x_wind_speed" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_edit->wind_speed->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->wind_speed->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->wind_speed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_edit->precipitation->Visible) { // precipitation ?>
	<div id="r_precipitation" class="form-group row">
		<label id="elh_tbl_smsdata_archive_precipitation" for="x_precipitation" class="<?php echo $tbl_smsdata_archive_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_edit->precipitation->caption() ?><?php echo $tbl_smsdata_archive_edit->precipitation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_edit->precipitation->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_precipitation">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_precipitation" name="x_precipitation" id="x_precipitation" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_edit->precipitation->EditValue ?>"<?php echo $tbl_smsdata_archive_edit->precipitation->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_edit->precipitation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tbl_smsdata_archive_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tbl_smsdata_archive_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tbl_smsdata_archive_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tbl_smsdata_archive_edit->showPageFooter();
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
$tbl_smsdata_archive_edit->terminate();
?>