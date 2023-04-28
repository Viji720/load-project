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
$tbl_smsdata_edit = new tbl_smsdata_edit();

// Run the page
$tbl_smsdata_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_smsdata_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftbl_smsdataedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ftbl_smsdataedit = currentForm = new ew.Form("ftbl_smsdataedit", "edit");

	// Validate form
	ftbl_smsdataedit.validate = function() {
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
			<?php if ($tbl_smsdata_edit->Slno->Required) { ?>
				elm = this.getElements("x" + infix + "_Slno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->Slno->caption(), $tbl_smsdata_edit->Slno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->SMSDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->SMSDateTime->caption(), $tbl_smsdata_edit->SMSDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_edit->SMSDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_edit->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->StationId->caption(), $tbl_smsdata_edit->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->SubDivId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->SubDivId->caption(), $tbl_smsdata_edit->SubDivId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->SendDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SendDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->SendDateTime->caption(), $tbl_smsdata_edit->SendDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SendDateTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_edit->SendDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_edit->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->rainfall->caption(), $tbl_smsdata_edit->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkRange(elm.value, 0.00, 200.00))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_edit->rainfall->errorMessage()) ?>");
			<?php if ($tbl_smsdata_edit->obsremarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obsremarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->obsremarks->caption(), $tbl_smsdata_edit->obsremarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->Status->caption(), $tbl_smsdata_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->Validated->Required) { ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->Validated->caption(), $tbl_smsdata_edit->Validated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->SenderMobileNumber->caption(), $tbl_smsdata_edit->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->IsFirstMsg->Required) { ?>
				elm = this.getElements("x" + infix + "_IsFirstMsg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->IsFirstMsg->caption(), $tbl_smsdata_edit->IsFirstMsg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->SMSText->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSText");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->SMSText->caption(), $tbl_smsdata_edit->SMSText->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->isFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_isFreeze[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->isFreeze->caption(), $tbl_smsdata_edit->isFreeze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_edit->SystemDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->SystemDateTime->caption(), $tbl_smsdata_edit->SystemDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_edit->SystemDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_edit->ConfirmQueryDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ConfirmQueryDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->ConfirmQueryDateTime->caption(), $tbl_smsdata_edit->ConfirmQueryDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConfirmQueryDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_edit->ConfirmQueryDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_edit->ConfirmedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ConfirmedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_edit->ConfirmedDateTime->caption(), $tbl_smsdata_edit->ConfirmedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConfirmedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_edit->ConfirmedDateTime->errorMessage()) ?>");

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
	ftbl_smsdataedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_smsdataedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_smsdataedit.lists["x_StationId"] = <?php echo $tbl_smsdata_edit->StationId->Lookup->toClientList($tbl_smsdata_edit) ?>;
	ftbl_smsdataedit.lists["x_StationId"].options = <?php echo JsonEncode($tbl_smsdata_edit->StationId->lookupOptions()) ?>;
	ftbl_smsdataedit.lists["x_SubDivId"] = <?php echo $tbl_smsdata_edit->SubDivId->Lookup->toClientList($tbl_smsdata_edit) ?>;
	ftbl_smsdataedit.lists["x_SubDivId"].options = <?php echo JsonEncode($tbl_smsdata_edit->SubDivId->lookupOptions()) ?>;
	ftbl_smsdataedit.lists["x_Status"] = <?php echo $tbl_smsdata_edit->Status->Lookup->toClientList($tbl_smsdata_edit) ?>;
	ftbl_smsdataedit.lists["x_Status"].options = <?php echo JsonEncode($tbl_smsdata_edit->Status->lookupOptions()) ?>;
	ftbl_smsdataedit.lists["x_Validated"] = <?php echo $tbl_smsdata_edit->Validated->Lookup->toClientList($tbl_smsdata_edit) ?>;
	ftbl_smsdataedit.lists["x_Validated"].options = <?php echo JsonEncode($tbl_smsdata_edit->Validated->lookupOptions()) ?>;
	ftbl_smsdataedit.lists["x_IsFirstMsg"] = <?php echo $tbl_smsdata_edit->IsFirstMsg->Lookup->toClientList($tbl_smsdata_edit) ?>;
	ftbl_smsdataedit.lists["x_IsFirstMsg"].options = <?php echo JsonEncode($tbl_smsdata_edit->IsFirstMsg->lookupOptions()) ?>;
	ftbl_smsdataedit.lists["x_isFreeze[]"] = <?php echo $tbl_smsdata_edit->isFreeze->Lookup->toClientList($tbl_smsdata_edit) ?>;
	ftbl_smsdataedit.lists["x_isFreeze[]"].options = <?php echo JsonEncode($tbl_smsdata_edit->isFreeze->options(FALSE, TRUE)) ?>;
	loadjs.done("ftbl_smsdataedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tbl_smsdata_edit->showPageHeader(); ?>
<?php
$tbl_smsdata_edit->showMessage();
?>
<form name="ftbl_smsdataedit" id="ftbl_smsdataedit" class="<?php echo $tbl_smsdata_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_smsdata">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tbl_smsdata_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tbl_smsdata_edit->Slno->Visible) { // Slno ?>
	<div id="r_Slno" class="form-group row">
		<label id="elh_tbl_smsdata_Slno" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->Slno->caption() ?><?php echo $tbl_smsdata_edit->Slno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->Slno->cellAttributes() ?>>
<span id="el_tbl_smsdata_Slno">
<span<?php echo $tbl_smsdata_edit->Slno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_smsdata_edit->Slno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_smsdata" data-field="x_Slno" name="x_Slno" id="x_Slno" value="<?php echo HtmlEncode($tbl_smsdata_edit->Slno->CurrentValue) ?>">
<?php echo $tbl_smsdata_edit->Slno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->SMSDateTime->Visible) { // SMSDateTime ?>
	<div id="r_SMSDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_SMSDateTime" for="x_SMSDateTime" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->SMSDateTime->caption() ?><?php echo $tbl_smsdata_edit->SMSDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->SMSDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_SMSDateTime">
<input type="text" data-table="tbl_smsdata" data-field="x_SMSDateTime" data-format="7" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="19" value="<?php echo $tbl_smsdata_edit->SMSDateTime->EditValue ?>"<?php echo $tbl_smsdata_edit->SMSDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_edit->SMSDateTime->ReadOnly && !$tbl_smsdata_edit->SMSDateTime->Disabled && !isset($tbl_smsdata_edit->SMSDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_edit->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdataedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdataedit", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_edit->SMSDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_tbl_smsdata_StationId" for="x_StationId" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->StationId->caption() ?><?php echo $tbl_smsdata_edit->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->StationId->cellAttributes() ?>>
<span id="el_tbl_smsdata_StationId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_StationId" data-value-separator="<?php echo $tbl_smsdata_edit->StationId->displayValueSeparatorAttribute() ?>" id="x_StationId" name="x_StationId"<?php echo $tbl_smsdata_edit->StationId->editAttributes() ?>>
			<?php echo $tbl_smsdata_edit->StationId->selectOptionListHtml("x_StationId") ?>
		</select>
</div>
<?php echo $tbl_smsdata_edit->StationId->Lookup->getParamTag($tbl_smsdata_edit, "p_x_StationId") ?>
</span>
<?php echo $tbl_smsdata_edit->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->SubDivId->Visible) { // SubDivId ?>
	<div id="r_SubDivId" class="form-group row">
		<label id="elh_tbl_smsdata_SubDivId" for="x_SubDivId" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->SubDivId->caption() ?><?php echo $tbl_smsdata_edit->SubDivId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->SubDivId->cellAttributes() ?>>
<span id="el_tbl_smsdata_SubDivId">
<?php $tbl_smsdata_edit->SubDivId->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_SubDivId" data-value-separator="<?php echo $tbl_smsdata_edit->SubDivId->displayValueSeparatorAttribute() ?>" id="x_SubDivId" name="x_SubDivId"<?php echo $tbl_smsdata_edit->SubDivId->editAttributes() ?>>
			<?php echo $tbl_smsdata_edit->SubDivId->selectOptionListHtml("x_SubDivId") ?>
		</select>
</div>
<?php echo $tbl_smsdata_edit->SubDivId->Lookup->getParamTag($tbl_smsdata_edit, "p_x_SubDivId") ?>
</span>
<?php echo $tbl_smsdata_edit->SubDivId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->SendDateTime->Visible) { // SendDateTime ?>
	<div id="r_SendDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_SendDateTime" for="x_SendDateTime" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->SendDateTime->caption() ?><?php echo $tbl_smsdata_edit->SendDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->SendDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_SendDateTime">
<input type="text" data-table="tbl_smsdata" data-field="x_SendDateTime" data-format="7" name="x_SendDateTime" id="x_SendDateTime" maxlength="19" value="<?php echo $tbl_smsdata_edit->SendDateTime->EditValue ?>"<?php echo $tbl_smsdata_edit->SendDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_edit->SendDateTime->ReadOnly && !$tbl_smsdata_edit->SendDateTime->Disabled && !isset($tbl_smsdata_edit->SendDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_edit->SendDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdataedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdataedit", "x_SendDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_edit->SendDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_tbl_smsdata_rainfall" for="x_rainfall" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->rainfall->caption() ?><?php echo $tbl_smsdata_edit->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->rainfall->cellAttributes() ?>>
<span id="el_tbl_smsdata_rainfall">
<input type="text" data-table="tbl_smsdata" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="30" maxlength="7" value="<?php echo $tbl_smsdata_edit->rainfall->EditValue ?>"<?php echo $tbl_smsdata_edit->rainfall->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_edit->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->obsremarks->Visible) { // obsremarks ?>
	<div id="r_obsremarks" class="form-group row">
		<label id="elh_tbl_smsdata_obsremarks" for="x_obsremarks" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->obsremarks->caption() ?><?php echo $tbl_smsdata_edit->obsremarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->obsremarks->cellAttributes() ?>>
<span id="el_tbl_smsdata_obsremarks">
<input type="text" data-table="tbl_smsdata" data-field="x_obsremarks" name="x_obsremarks" id="x_obsremarks" size="30" maxlength="50" value="<?php echo $tbl_smsdata_edit->obsremarks->EditValue ?>"<?php echo $tbl_smsdata_edit->obsremarks->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_edit->obsremarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_tbl_smsdata_Status" for="x_Status" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->Status->caption() ?><?php echo $tbl_smsdata_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->Status->cellAttributes() ?>>
<span id="el_tbl_smsdata_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_Status" data-value-separator="<?php echo $tbl_smsdata_edit->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $tbl_smsdata_edit->Status->editAttributes() ?>>
			<?php echo $tbl_smsdata_edit->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
<?php echo $tbl_smsdata_edit->Status->Lookup->getParamTag($tbl_smsdata_edit, "p_x_Status") ?>
</span>
<?php echo $tbl_smsdata_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->Validated->Visible) { // Validated ?>
	<div id="r_Validated" class="form-group row">
		<label id="elh_tbl_smsdata_Validated" for="x_Validated" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->Validated->caption() ?><?php echo $tbl_smsdata_edit->Validated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->Validated->cellAttributes() ?>>
<span id="el_tbl_smsdata_Validated">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_Validated" data-value-separator="<?php echo $tbl_smsdata_edit->Validated->displayValueSeparatorAttribute() ?>" id="x_Validated" name="x_Validated"<?php echo $tbl_smsdata_edit->Validated->editAttributes() ?>>
			<?php echo $tbl_smsdata_edit->Validated->selectOptionListHtml("x_Validated") ?>
		</select>
</div>
<?php echo $tbl_smsdata_edit->Validated->Lookup->getParamTag($tbl_smsdata_edit, "p_x_Validated") ?>
</span>
<?php echo $tbl_smsdata_edit->Validated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<div id="r_SenderMobileNumber" class="form-group row">
		<label id="elh_tbl_smsdata_SenderMobileNumber" for="x_SenderMobileNumber" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->SenderMobileNumber->caption() ?><?php echo $tbl_smsdata_edit->SenderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->SenderMobileNumber->cellAttributes() ?>>
<span id="el_tbl_smsdata_SenderMobileNumber">
<input type="text" data-table="tbl_smsdata" data-field="x_SenderMobileNumber" name="x_SenderMobileNumber" id="x_SenderMobileNumber" size="30" maxlength="25" value="<?php echo $tbl_smsdata_edit->SenderMobileNumber->EditValue ?>"<?php echo $tbl_smsdata_edit->SenderMobileNumber->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_edit->SenderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->IsFirstMsg->Visible) { // IsFirstMsg ?>
	<div id="r_IsFirstMsg" class="form-group row">
		<label id="elh_tbl_smsdata_IsFirstMsg" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->IsFirstMsg->caption() ?><?php echo $tbl_smsdata_edit->IsFirstMsg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->IsFirstMsg->cellAttributes() ?>>
<span id="el_tbl_smsdata_IsFirstMsg">
<div id="tp_x_IsFirstMsg" class="ew-template"><input type="radio" class="custom-control-input" data-table="tbl_smsdata" data-field="x_IsFirstMsg" data-value-separator="<?php echo $tbl_smsdata_edit->IsFirstMsg->displayValueSeparatorAttribute() ?>" name="x_IsFirstMsg" id="x_IsFirstMsg" value="{value}"<?php echo $tbl_smsdata_edit->IsFirstMsg->editAttributes() ?>></div>
<div id="dsl_x_IsFirstMsg" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $tbl_smsdata_edit->IsFirstMsg->radioButtonListHtml(FALSE, "x_IsFirstMsg") ?>
</div></div>
<?php echo $tbl_smsdata_edit->IsFirstMsg->Lookup->getParamTag($tbl_smsdata_edit, "p_x_IsFirstMsg") ?>
</span>
<?php echo $tbl_smsdata_edit->IsFirstMsg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->SMSText->Visible) { // SMSText ?>
	<div id="r_SMSText" class="form-group row">
		<label id="elh_tbl_smsdata_SMSText" for="x_SMSText" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->SMSText->caption() ?><?php echo $tbl_smsdata_edit->SMSText->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->SMSText->cellAttributes() ?>>
<span id="el_tbl_smsdata_SMSText">
<input type="text" data-table="tbl_smsdata" data-field="x_SMSText" name="x_SMSText" id="x_SMSText" size="30" maxlength="50" value="<?php echo $tbl_smsdata_edit->SMSText->EditValue ?>"<?php echo $tbl_smsdata_edit->SMSText->editAttributes() ?>>
</span>
<?php echo $tbl_smsdata_edit->SMSText->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->isFreeze->Visible) { // isFreeze ?>
	<div id="r_isFreeze" class="form-group row">
		<label id="elh_tbl_smsdata_isFreeze" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->isFreeze->caption() ?><?php echo $tbl_smsdata_edit->isFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->isFreeze->cellAttributes() ?>>
<span id="el_tbl_smsdata_isFreeze">
<?php
$selwrk = ConvertToBool($tbl_smsdata_edit->isFreeze->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="tbl_smsdata" data-field="x_isFreeze" name="x_isFreeze[]" id="x_isFreeze[]_964621" value="1"<?php echo $selwrk ?><?php echo $tbl_smsdata_edit->isFreeze->editAttributes() ?>>
	<label class="custom-control-label" for="x_isFreeze[]_964621"></label>
</div>
</span>
<?php echo $tbl_smsdata_edit->isFreeze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->SystemDateTime->Visible) { // SystemDateTime ?>
	<div id="r_SystemDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_SystemDateTime" for="x_SystemDateTime" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->SystemDateTime->caption() ?><?php echo $tbl_smsdata_edit->SystemDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->SystemDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_SystemDateTime">
<input type="text" data-table="tbl_smsdata" data-field="x_SystemDateTime" name="x_SystemDateTime" id="x_SystemDateTime" maxlength="19" value="<?php echo $tbl_smsdata_edit->SystemDateTime->EditValue ?>"<?php echo $tbl_smsdata_edit->SystemDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_edit->SystemDateTime->ReadOnly && !$tbl_smsdata_edit->SystemDateTime->Disabled && !isset($tbl_smsdata_edit->SystemDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_edit->SystemDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdataedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdataedit", "x_SystemDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_edit->SystemDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
	<div id="r_ConfirmQueryDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_ConfirmQueryDateTime" for="x_ConfirmQueryDateTime" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->ConfirmQueryDateTime->caption() ?><?php echo $tbl_smsdata_edit->ConfirmQueryDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->ConfirmQueryDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_ConfirmQueryDateTime">
<input type="text" data-table="tbl_smsdata" data-field="x_ConfirmQueryDateTime" name="x_ConfirmQueryDateTime" id="x_ConfirmQueryDateTime" maxlength="19" value="<?php echo $tbl_smsdata_edit->ConfirmQueryDateTime->EditValue ?>"<?php echo $tbl_smsdata_edit->ConfirmQueryDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_edit->ConfirmQueryDateTime->ReadOnly && !$tbl_smsdata_edit->ConfirmQueryDateTime->Disabled && !isset($tbl_smsdata_edit->ConfirmQueryDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_edit->ConfirmQueryDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdataedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdataedit", "x_ConfirmQueryDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_edit->ConfirmQueryDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_smsdata_edit->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
	<div id="r_ConfirmedDateTime" class="form-group row">
		<label id="elh_tbl_smsdata_ConfirmedDateTime" for="x_ConfirmedDateTime" class="<?php echo $tbl_smsdata_edit->LeftColumnClass ?>"><?php echo $tbl_smsdata_edit->ConfirmedDateTime->caption() ?><?php echo $tbl_smsdata_edit->ConfirmedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_smsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_smsdata_edit->ConfirmedDateTime->cellAttributes() ?>>
<span id="el_tbl_smsdata_ConfirmedDateTime">
<input type="text" data-table="tbl_smsdata" data-field="x_ConfirmedDateTime" name="x_ConfirmedDateTime" id="x_ConfirmedDateTime" maxlength="19" value="<?php echo $tbl_smsdata_edit->ConfirmedDateTime->EditValue ?>"<?php echo $tbl_smsdata_edit->ConfirmedDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_edit->ConfirmedDateTime->ReadOnly && !$tbl_smsdata_edit->ConfirmedDateTime->Disabled && !isset($tbl_smsdata_edit->ConfirmedDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_edit->ConfirmedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdataedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdataedit", "x_ConfirmedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_smsdata_edit->ConfirmedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tbl_smsdata_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tbl_smsdata_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tbl_smsdata_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tbl_smsdata_edit->showPageFooter();
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
$tbl_smsdata_edit->terminate();
?>