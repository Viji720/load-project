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
$obs_sms_messages_edit = new obs_sms_messages_edit();

// Run the page
$obs_sms_messages_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_sms_messages_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fobs_sms_messagesedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fobs_sms_messagesedit = currentForm = new ew.Form("fobs_sms_messagesedit", "edit");

	// Validate form
	fobs_sms_messagesedit.validate = function() {
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
			<?php if ($obs_sms_messages_edit->message_id->Required) { ?>
				elm = this.getElements("x" + infix + "_message_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->message_id->caption(), $obs_sms_messages_edit->message_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_message_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_sms_messages_edit->message_id->errorMessage()) ?>");
			<?php if ($obs_sms_messages_edit->SMSDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->SMSDateTime->caption(), $obs_sms_messages_edit->SMSDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_sms_messages_edit->SMSDateTime->errorMessage()) ?>");
			<?php if ($obs_sms_messages_edit->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->MobileNumber->caption(), $obs_sms_messages_edit->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_sms_messages_edit->SystemDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->SystemDateTime->caption(), $obs_sms_messages_edit->SystemDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_sms_messages_edit->SystemDateTime->errorMessage()) ?>");
			<?php if ($obs_sms_messages_edit->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->rainfall->caption(), $obs_sms_messages_edit->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_sms_messages_edit->rainfall->errorMessage()) ?>");
			<?php if ($obs_sms_messages_edit->stationid->Required) { ?>
				elm = this.getElements("x" + infix + "_stationid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->stationid->caption(), $obs_sms_messages_edit->stationid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_stationid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_sms_messages_edit->stationid->errorMessage()) ?>");
			<?php if ($obs_sms_messages_edit->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->SubDivisionId->caption(), $obs_sms_messages_edit->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_sms_messages_edit->SubDivisionId->errorMessage()) ?>");
			<?php if ($obs_sms_messages_edit->SMSText->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSText");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->SMSText->caption(), $obs_sms_messages_edit->SMSText->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obs_sms_messages_edit->sms_statusid->Required) { ?>
				elm = this.getElements("x" + infix + "_sms_statusid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obs_sms_messages_edit->sms_statusid->caption(), $obs_sms_messages_edit->sms_statusid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sms_statusid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obs_sms_messages_edit->sms_statusid->errorMessage()) ?>");

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
	fobs_sms_messagesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fobs_sms_messagesedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fobs_sms_messagesedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $obs_sms_messages_edit->showPageHeader(); ?>
<?php
$obs_sms_messages_edit->showMessage();
?>
<form name="fobs_sms_messagesedit" id="fobs_sms_messagesedit" class="<?php echo $obs_sms_messages_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_sms_messages">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$obs_sms_messages_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($obs_sms_messages_edit->message_id->Visible) { // message_id ?>
	<div id="r_message_id" class="form-group row">
		<label id="elh_obs_sms_messages_message_id" for="x_message_id" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->message_id->caption() ?><?php echo $obs_sms_messages_edit->message_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->message_id->cellAttributes() ?>>
<input type="text" data-table="obs_sms_messages" data-field="x_message_id" name="x_message_id" id="x_message_id" size="30" maxlength="11" value="<?php echo $obs_sms_messages_edit->message_id->EditValue ?>"<?php echo $obs_sms_messages_edit->message_id->editAttributes() ?>>
<input type="hidden" data-table="obs_sms_messages" data-field="x_message_id" name="o_message_id" id="o_message_id" value="<?php echo HtmlEncode($obs_sms_messages_edit->message_id->OldValue != null ? $obs_sms_messages_edit->message_id->OldValue : $obs_sms_messages_edit->message_id->CurrentValue) ?>">
<?php echo $obs_sms_messages_edit->message_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_sms_messages_edit->SMSDateTime->Visible) { // SMSDateTime ?>
	<div id="r_SMSDateTime" class="form-group row">
		<label id="elh_obs_sms_messages_SMSDateTime" for="x_SMSDateTime" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->SMSDateTime->caption() ?><?php echo $obs_sms_messages_edit->SMSDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->SMSDateTime->cellAttributes() ?>>
<span id="el_obs_sms_messages_SMSDateTime">
<input type="text" data-table="obs_sms_messages" data-field="x_SMSDateTime" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="19" value="<?php echo $obs_sms_messages_edit->SMSDateTime->EditValue ?>"<?php echo $obs_sms_messages_edit->SMSDateTime->editAttributes() ?>>
<?php if (!$obs_sms_messages_edit->SMSDateTime->ReadOnly && !$obs_sms_messages_edit->SMSDateTime->Disabled && !isset($obs_sms_messages_edit->SMSDateTime->EditAttrs["readonly"]) && !isset($obs_sms_messages_edit->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fobs_sms_messagesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fobs_sms_messagesedit", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $obs_sms_messages_edit->SMSDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_sms_messages_edit->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_obs_sms_messages_MobileNumber" for="x_MobileNumber" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->MobileNumber->caption() ?><?php echo $obs_sms_messages_edit->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->MobileNumber->cellAttributes() ?>>
<span id="el_obs_sms_messages_MobileNumber">
<input type="text" data-table="obs_sms_messages" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="50" value="<?php echo $obs_sms_messages_edit->MobileNumber->EditValue ?>"<?php echo $obs_sms_messages_edit->MobileNumber->editAttributes() ?>>
</span>
<?php echo $obs_sms_messages_edit->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_sms_messages_edit->SystemDateTime->Visible) { // SystemDateTime ?>
	<div id="r_SystemDateTime" class="form-group row">
		<label id="elh_obs_sms_messages_SystemDateTime" for="x_SystemDateTime" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->SystemDateTime->caption() ?><?php echo $obs_sms_messages_edit->SystemDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->SystemDateTime->cellAttributes() ?>>
<span id="el_obs_sms_messages_SystemDateTime">
<input type="text" data-table="obs_sms_messages" data-field="x_SystemDateTime" name="x_SystemDateTime" id="x_SystemDateTime" maxlength="19" value="<?php echo $obs_sms_messages_edit->SystemDateTime->EditValue ?>"<?php echo $obs_sms_messages_edit->SystemDateTime->editAttributes() ?>>
<?php if (!$obs_sms_messages_edit->SystemDateTime->ReadOnly && !$obs_sms_messages_edit->SystemDateTime->Disabled && !isset($obs_sms_messages_edit->SystemDateTime->EditAttrs["readonly"]) && !isset($obs_sms_messages_edit->SystemDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fobs_sms_messagesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fobs_sms_messagesedit", "x_SystemDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $obs_sms_messages_edit->SystemDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_sms_messages_edit->rainfall->Visible) { // rainfall ?>
	<div id="r_rainfall" class="form-group row">
		<label id="elh_obs_sms_messages_rainfall" for="x_rainfall" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->rainfall->caption() ?><?php echo $obs_sms_messages_edit->rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->rainfall->cellAttributes() ?>>
<span id="el_obs_sms_messages_rainfall">
<input type="text" data-table="obs_sms_messages" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="30" maxlength="6" value="<?php echo $obs_sms_messages_edit->rainfall->EditValue ?>"<?php echo $obs_sms_messages_edit->rainfall->editAttributes() ?>>
</span>
<?php echo $obs_sms_messages_edit->rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_sms_messages_edit->stationid->Visible) { // stationid ?>
	<div id="r_stationid" class="form-group row">
		<label id="elh_obs_sms_messages_stationid" for="x_stationid" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->stationid->caption() ?><?php echo $obs_sms_messages_edit->stationid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->stationid->cellAttributes() ?>>
<span id="el_obs_sms_messages_stationid">
<input type="text" data-table="obs_sms_messages" data-field="x_stationid" name="x_stationid" id="x_stationid" size="30" maxlength="11" value="<?php echo $obs_sms_messages_edit->stationid->EditValue ?>"<?php echo $obs_sms_messages_edit->stationid->editAttributes() ?>>
</span>
<?php echo $obs_sms_messages_edit->stationid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_sms_messages_edit->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_obs_sms_messages_SubDivisionId" for="x_SubDivisionId" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->SubDivisionId->caption() ?><?php echo $obs_sms_messages_edit->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->SubDivisionId->cellAttributes() ?>>
<span id="el_obs_sms_messages_SubDivisionId">
<input type="text" data-table="obs_sms_messages" data-field="x_SubDivisionId" name="x_SubDivisionId" id="x_SubDivisionId" size="30" maxlength="11" value="<?php echo $obs_sms_messages_edit->SubDivisionId->EditValue ?>"<?php echo $obs_sms_messages_edit->SubDivisionId->editAttributes() ?>>
</span>
<?php echo $obs_sms_messages_edit->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_sms_messages_edit->SMSText->Visible) { // SMSText ?>
	<div id="r_SMSText" class="form-group row">
		<label id="elh_obs_sms_messages_SMSText" for="x_SMSText" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->SMSText->caption() ?><?php echo $obs_sms_messages_edit->SMSText->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->SMSText->cellAttributes() ?>>
<span id="el_obs_sms_messages_SMSText">
<input type="text" data-table="obs_sms_messages" data-field="x_SMSText" name="x_SMSText" id="x_SMSText" size="30" maxlength="200" value="<?php echo $obs_sms_messages_edit->SMSText->EditValue ?>"<?php echo $obs_sms_messages_edit->SMSText->editAttributes() ?>>
</span>
<?php echo $obs_sms_messages_edit->SMSText->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obs_sms_messages_edit->sms_statusid->Visible) { // sms_statusid ?>
	<div id="r_sms_statusid" class="form-group row">
		<label id="elh_obs_sms_messages_sms_statusid" for="x_sms_statusid" class="<?php echo $obs_sms_messages_edit->LeftColumnClass ?>"><?php echo $obs_sms_messages_edit->sms_statusid->caption() ?><?php echo $obs_sms_messages_edit->sms_statusid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obs_sms_messages_edit->RightColumnClass ?>"><div <?php echo $obs_sms_messages_edit->sms_statusid->cellAttributes() ?>>
<span id="el_obs_sms_messages_sms_statusid">
<input type="text" data-table="obs_sms_messages" data-field="x_sms_statusid" name="x_sms_statusid" id="x_sms_statusid" size="30" maxlength="11" value="<?php echo $obs_sms_messages_edit->sms_statusid->EditValue ?>"<?php echo $obs_sms_messages_edit->sms_statusid->editAttributes() ?>>
</span>
<?php echo $obs_sms_messages_edit->sms_statusid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$obs_sms_messages_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $obs_sms_messages_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $obs_sms_messages_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$obs_sms_messages_edit->showPageFooter();
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
$obs_sms_messages_edit->terminate();
?>