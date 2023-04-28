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
$tbl_smsdata_archive_add = new tbl_smsdata_archive_add();

// Run the page
$tbl_smsdata_archive_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_smsdata_archive_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftbl_smsdata_archiveadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ftbl_smsdata_archiveadd = currentForm = new ew.Form("ftbl_smsdata_archiveadd", "add");

	// Validate form
	ftbl_smsdata_archiveadd.validate = function() {
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
			<?php if ($tbl_smsdata_archive_add->Slno->Required) { ?>
				elm = this.getElements("x" + infix + "_Slno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->Slno->caption(), $tbl_smsdata_archive_add->Slno->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Slno");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->Slno->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->SMSDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->SMSDateTime->caption(), $tbl_smsdata_archive_add->SMSDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->SMSDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->SystemDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->SystemDateTime->caption(), $tbl_smsdata_archive_add->SystemDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->SystemDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->ConfirmQueryDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ConfirmQueryDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->ConfirmQueryDateTime->caption(), $tbl_smsdata_archive_add->ConfirmQueryDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConfirmQueryDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->ConfirmQueryDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->ConfirmedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ConfirmedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->ConfirmedDateTime->caption(), $tbl_smsdata_archive_add->ConfirmedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConfirmedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->ConfirmedDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->SendDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SendDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->SendDateTime->caption(), $tbl_smsdata_archive_add->SendDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SendDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->SendDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->SMSText->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSText");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->SMSText->caption(), $tbl_smsdata_archive_add->SMSText->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_archive_add->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->Status->caption(), $tbl_smsdata_archive_add->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->Status->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->obsremarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obsremarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->obsremarks->caption(), $tbl_smsdata_archive_add->obsremarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_archive_add->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->SenderMobileNumber->caption(), $tbl_smsdata_archive_add->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_archive_add->SubDivId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->SubDivId->caption(), $tbl_smsdata_archive_add->SubDivId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubDivId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->SubDivId->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->StationId->caption(), $tbl_smsdata_archive_add->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->StationId->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->IsFirstMsg->Required) { ?>
				elm = this.getElements("x" + infix + "_IsFirstMsg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->IsFirstMsg->caption(), $tbl_smsdata_archive_add->IsFirstMsg->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsFirstMsg");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->IsFirstMsg->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->Validated->Required) { ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->Validated->caption(), $tbl_smsdata_archive_add->Validated->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->Validated->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->isFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_isFreeze[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->isFreeze->caption(), $tbl_smsdata_archive_add->isFreeze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_archive_add->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->rainfall->caption(), $tbl_smsdata_archive_add->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->rainfall->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->min_air_temp->Required) { ?>
				elm = this.getElements("x" + infix + "_min_air_temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->min_air_temp->caption(), $tbl_smsdata_archive_add->min_air_temp->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_min_air_temp");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->min_air_temp->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->max_air_temp->Required) { ?>
				elm = this.getElements("x" + infix + "_max_air_temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->max_air_temp->caption(), $tbl_smsdata_archive_add->max_air_temp->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_max_air_temp");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->max_air_temp->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->atmospheric_pressure->Required) { ?>
				elm = this.getElements("x" + infix + "_atmospheric_pressure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->atmospheric_pressure->caption(), $tbl_smsdata_archive_add->atmospheric_pressure->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_atmospheric_pressure");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->atmospheric_pressure->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->wind_speed->Required) { ?>
				elm = this.getElements("x" + infix + "_wind_speed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->wind_speed->caption(), $tbl_smsdata_archive_add->wind_speed->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_wind_speed");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->wind_speed->errorMessage()) ?>");
			<?php if ($tbl_smsdata_archive_add->precipitation->Required) { ?>
				elm = this.getElements("x" + infix + "_precipitation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_archive_add->precipitation->caption(), $tbl_smsdata_archive_add->precipitation->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_precipitation");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_archive_add->precipitation->errorMessage()) ?>");

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
	ftbl_smsdata_archiveadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_smsdata_archiveadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_smsdata_archiveadd.lists["x_isFreeze[]"] = <?php echo $tbl_smsdata_archive_add->isFreeze->Lookup->toClientList($tbl_smsdata_archive_add) ?>;
	ftbl_smsdata_archiveadd.lists["x_isFreeze[]"].options = <?php echo JsonEncode($tbl_smsdata_archive_add->isFreeze->options(FALSE, TRUE)) ?>;
	loadjs.done("ftbl_smsdata_archiveadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tbl_smsdata_archive_add->showPageHeader(); ?>
<?php
$tbl_smsdata_archive_add->showMessage();
?>
<form name="ftbl_smsdata_archiveadd" id="ftbl_smsdata_archiveadd" class="<?php echo $tbl_smsdata_archive_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_smsdata_archive">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tbl_smsdata_archive_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($tbl_smsdata_archive_add->Slno->Visible) { // Slno ?>
	<div id="r_Slno" class="form-group row">
		<label id="elh_tbl_smsdata_archive_Slno" for="x_Slno" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->Slno->caption() ?><?php echo $tbl_smsdata_archive_add->Slno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->Slno->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_Slno">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_Slno" name="x_Slno" id="x_Slno" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_add->Slno->EditValue ?>"<?php echo $tbl_smsdata_archive_add->Slno->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->Slno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->SMSDateTime->Visible) { // SMSDateTime ?>
	<div id="r_SMSDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SMSDateTime" for="x_SMSDateTime" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->SMSDateTime->caption() ?><?php echo $tbl_smsdata_archive_add->SMSDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->SMSDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SMSDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SMSDateTime" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_add->SMSDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_add->SMSDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_add->SMSDateTime->ReadOnly && !$tbl_smsdata_archive_add->SMSDateTime->Disabled && !isset($tbl_smsdata_archive_add->SMSDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_add->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveadd", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_add->SMSDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->SystemDateTime->Visible) { // SystemDateTime ?>
	<div id="r_SystemDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SystemDateTime" for="x_SystemDateTime" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->SystemDateTime->caption() ?><?php echo $tbl_smsdata_archive_add->SystemDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->SystemDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SystemDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SystemDateTime" name="x_SystemDateTime" id="x_SystemDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_add->SystemDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_add->SystemDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_add->SystemDateTime->ReadOnly && !$tbl_smsdata_archive_add->SystemDateTime->Disabled && !isset($tbl_smsdata_archive_add->SystemDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_add->SystemDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveadd", "x_SystemDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_add->SystemDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
	<div id="r_ConfirmQueryDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_ConfirmQueryDateTime" for="x_ConfirmQueryDateTime" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->ConfirmQueryDateTime->caption() ?><?php echo $tbl_smsdata_archive_add->ConfirmQueryDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->ConfirmQueryDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_ConfirmQueryDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_ConfirmQueryDateTime" name="x_ConfirmQueryDateTime" id="x_ConfirmQueryDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_add->ConfirmQueryDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_add->ConfirmQueryDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_add->ConfirmQueryDateTime->ReadOnly && !$tbl_smsdata_archive_add->ConfirmQueryDateTime->Disabled && !isset($tbl_smsdata_archive_add->ConfirmQueryDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_add->ConfirmQueryDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveadd", "x_ConfirmQueryDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_add->ConfirmQueryDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
	<div id="r_ConfirmedDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_ConfirmedDateTime" for="x_ConfirmedDateTime" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->ConfirmedDateTime->caption() ?><?php echo $tbl_smsdata_archive_add->ConfirmedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->ConfirmedDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_ConfirmedDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_ConfirmedDateTime" name="x_ConfirmedDateTime" id="x_ConfirmedDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_add->ConfirmedDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_add->ConfirmedDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_add->ConfirmedDateTime->ReadOnly && !$tbl_smsdata_archive_add->ConfirmedDateTime->Disabled && !isset($tbl_smsdata_archive_add->ConfirmedDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_add->ConfirmedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveadd", "x_ConfirmedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_add->ConfirmedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->SendDateTime->Visible) { // SendDateTime ?>
	<div id="r_SendDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SendDateTime" for="x_SendDateTime" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->SendDateTime->caption() ?><?php echo $tbl_smsdata_archive_add->SendDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->SendDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SendDateTime">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SendDateTime" name="x_SendDateTime" id="x_SendDateTime" maxlength="19" value="<?php echo $tbl_smsdata_archive_add->SendDateTime->EditValue ?>"<?php echo $tbl_smsdata_archive_add->SendDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_archive_add->SendDateTime->ReadOnly && !$tbl_smsdata_archive_add->SendDateTime->Disabled && !isset($tbl_smsdata_archive_add->SendDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_archive_add->SendDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdata_archiveadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdata_archiveadd", "x_SendDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_archive_add->SendDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->SMSText->Visible) { // SMSText ?>
	<div id="r_SMSText" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SMSText" for="x_SMSText" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->SMSText->caption() ?><?php echo $tbl_smsdata_archive_add->SMSText->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->SMSText->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SMSText">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SMSText" name="x_SMSText" id="x_SMSText" size="30" maxlength="50" value="<?php echo $tbl_smsdata_archive_add->SMSText->EditValue ?>"<?php echo $tbl_smsdata_archive_add->SMSText->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->SMSText->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_tbl_smsdata_archive_Status" for="x_Status" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->Status->caption() ?><?php echo $tbl_smsdata_archive_add->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->Status->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_Status">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_add->Status->EditValue ?>"<?php echo $tbl_smsdata_archive_add->Status->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->obsremarks->Visible) { // obsremarks ?>
	<div id="r_obsremarks" class="form-group row">
		<label id="elh_tbl_smsdata_archive_obsremarks" for="x_obsremarks" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->obsremarks->caption() ?><?php echo $tbl_smsdata_archive_add->obsremarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->obsremarks->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_obsremarks">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_obsremarks" name="x_obsremarks" id="x_obsremarks" size="30" maxlength="50" value="<?php echo $tbl_smsdata_archive_add->obsremarks->EditValue ?>"<?php echo $tbl_smsdata_archive_add->obsremarks->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->obsremarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<div id="r_SenderMobileNumber" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SenderMobileNumber" for="x_SenderMobileNumber" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->SenderMobileNumber->caption() ?><?php echo $tbl_smsdata_archive_add->SenderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->SenderMobileNumber->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SenderMobileNumber">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SenderMobileNumber" name="x_SenderMobileNumber" id="x_SenderMobileNumber" size="30" maxlength="25" value="<?php echo $tbl_smsdata_archive_add->SenderMobileNumber->EditValue ?>"<?php echo $tbl_smsdata_archive_add->SenderMobileNumber->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->SenderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->SubDivId->Visible) { // SubDivId ?>
	<div id="r_SubDivId" class="form-group row">
		<label id="elh_tbl_smsdata_archive_SubDivId" for="x_SubDivId" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->SubDivId->caption() ?><?php echo $tbl_smsdata_archive_add->SubDivId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->SubDivId->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_SubDivId">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_SubDivId" name="x_SubDivId" id="x_SubDivId" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_add->SubDivId->EditValue ?>"<?php echo $tbl_smsdata_archive_add->SubDivId->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->SubDivId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_tbl_smsdata_archive_StationId" for="x_StationId" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->StationId->caption() ?><?php echo $tbl_smsdata_archive_add->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->StationId->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_StationId">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_StationId" name="x_StationId" id="x_StationId" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_add->StationId->EditValue ?>"<?php echo $tbl_smsdata_archive_add->StationId->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->IsFirstMsg->Visible) { // IsFirstMsg ?>
	<div id="r_IsFirstMsg" class="form-group row">
		<label id="elh_tbl_smsdata_archive_IsFirstMsg" for="x_IsFirstMsg" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->IsFirstMsg->caption() ?><?php echo $tbl_smsdata_archive_add->IsFirstMsg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->IsFirstMsg->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_IsFirstMsg">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_IsFirstMsg" name="x_IsFirstMsg" id="x_IsFirstMsg" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_add->IsFirstMsg->EditValue ?>"<?php echo $tbl_smsdata_archive_add->IsFirstMsg->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->IsFirstMsg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->Validated->Visible) { // Validated ?>
	<div id="r_Validated" class="form-group row">
		<label id="elh_tbl_smsdata_archive_Validated" for="x_Validated" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->Validated->caption() ?><?php echo $tbl_smsdata_archive_add->Validated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->Validated->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_Validated">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_Validated" name="x_Validated" id="x_Validated" size="30" maxlength="11" value="<?php echo $tbl_smsdata_archive_add->Validated->EditValue ?>"<?php echo $tbl_smsdata_archive_add->Validated->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->Validated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->isFreeze->Visible) { // isFreeze ?>
	<div id="r_isFreeze" class="form-group row">
		<label id="elh_tbl_smsdata_archive_isFreeze" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->isFreeze->caption() ?><?php echo $tbl_smsdata_archive_add->isFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->isFreeze->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_isFreeze">
<?php
$selwrk = ConvertToBool($tbl_smsdata_archive_add->isFreeze->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="tbl_smsdata_archive" data-field="x_isFreeze" name="x_isFreeze[]" id="x_isFreeze[]_417339" value="1"<?php echo $selwrk ?><?php echo $tbl_smsdata_archive_add->isFreeze->editAttributes() ?>>
	<label class="custom-control-label" for="x_isFreeze[]_417339"></label>
</div>
</span>
<?php echo $tbl_smsdata_archive_add->isFreeze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_tbl_smsdata_archive_rainfall" for="x_rainfall" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->rainfall->caption() ?><?php echo $tbl_smsdata_archive_add->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->rainfall->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_rainfall">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_add->rainfall->EditValue ?>"<?php echo $tbl_smsdata_archive_add->rainfall->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->min_air_temp->Visible) { // min_air_temp ?>
	<div id="r_min_air_temp" class="form-group row">
		<label id="elh_tbl_smsdata_archive_min_air_temp" for="x_min_air_temp" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->min_air_temp->caption() ?><?php echo $tbl_smsdata_archive_add->min_air_temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->min_air_temp->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_min_air_temp">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_min_air_temp" name="x_min_air_temp" id="x_min_air_temp" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_add->min_air_temp->EditValue ?>"<?php echo $tbl_smsdata_archive_add->min_air_temp->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->min_air_temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->max_air_temp->Visible) { // max_air_temp ?>
	<div id="r_max_air_temp" class="form-group row">
		<label id="elh_tbl_smsdata_archive_max_air_temp" for="x_max_air_temp" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->max_air_temp->caption() ?><?php echo $tbl_smsdata_archive_add->max_air_temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->max_air_temp->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_max_air_temp">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_max_air_temp" name="x_max_air_temp" id="x_max_air_temp" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_add->max_air_temp->EditValue ?>"<?php echo $tbl_smsdata_archive_add->max_air_temp->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->max_air_temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->atmospheric_pressure->Visible) { // atmospheric_pressure ?>
	<div id="r_atmospheric_pressure" class="form-group row">
		<label id="elh_tbl_smsdata_archive_atmospheric_pressure" for="x_atmospheric_pressure" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->atmospheric_pressure->caption() ?><?php echo $tbl_smsdata_archive_add->atmospheric_pressure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->atmospheric_pressure->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_atmospheric_pressure">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_atmospheric_pressure" name="x_atmospheric_pressure" id="x_atmospheric_pressure" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_add->atmospheric_pressure->EditValue ?>"<?php echo $tbl_smsdata_archive_add->atmospheric_pressure->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->atmospheric_pressure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->wind_speed->Visible) { // wind_speed ?>
	<div id="r_wind_speed" class="form-group row">
		<label id="elh_tbl_smsdata_archive_wind_speed" for="x_wind_speed" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->wind_speed->caption() ?><?php echo $tbl_smsdata_archive_add->wind_speed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->wind_speed->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_wind_speed">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_wind_speed" name="x_wind_speed" id="x_wind_speed" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_add->wind_speed->EditValue ?>"<?php echo $tbl_smsdata_archive_add->wind_speed->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->wind_speed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_archive_add->precipitation->Visible) { // precipitation ?>
	<div id="r_precipitation" class="form-group row">
		<label id="elh_tbl_smsdata_archive_precipitation" for="x_precipitation" class="<?php echo $tbl_smsdata_archive_add->LeftColumnClass ?>"><?php echo $tbl_smsdata_archive_add->precipitation->caption() ?><?php echo $tbl_smsdata_archive_add->precipitation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_archive_add->RightColumnClass ?>"><div <?php echo $tbl_smsdata_archive_add->precipitation->cellAttributes() ?>>
<span id="el_tbl_smsdata_archive_precipitation">
<input type="text" data-table="tbl_smsdata_archive" data-field="x_precipitation" name="x_precipitation" id="x_precipitation" size="30" maxlength="7" value="<?php echo $tbl_smsdata_archive_add->precipitation->EditValue ?>"<?php echo $tbl_smsdata_archive_add->precipitation->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_archive_add->precipitation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tbl_smsdata_archive_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tbl_smsdata_archive_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tbl_smsdata_archive_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tbl_smsdata_archive_add->showPageFooter();
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
$tbl_smsdata_archive_add->terminate();
?>