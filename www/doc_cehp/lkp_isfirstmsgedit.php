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
$lkp_isfirstmsg_edit = new lkp_isfirstmsg_edit();

// Run the page
$lkp_isfirstmsg_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_isfirstmsg_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_isfirstmsgedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	flkp_isfirstmsgedit = currentForm = new ew.Form("flkp_isfirstmsgedit", "edit");

	// Validate form
	flkp_isfirstmsgedit.validate = function() {
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
			<?php if ($lkp_isfirstmsg_edit->isFirstMsg->Required) { ?>
				elm = this.getElements("x" + infix + "_isFirstMsg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_isfirstmsg_edit->isFirstMsg->caption(), $lkp_isfirstmsg_edit->isFirstMsg->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_isFirstMsg");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lkp_isfirstmsg_edit->isFirstMsg->errorMessage()) ?>");
			<?php if ($lkp_isfirstmsg_edit->isFirstMsgName->Required) { ?>
				elm = this.getElements("x" + infix + "_isFirstMsgName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_isfirstmsg_edit->isFirstMsgName->caption(), $lkp_isfirstmsg_edit->isFirstMsgName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_isfirstmsg_edit->is_station_allowed->Required) { ?>
				elm = this.getElements("x" + infix + "_is_station_allowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_isfirstmsg_edit->is_station_allowed->caption(), $lkp_isfirstmsg_edit->is_station_allowed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_isfirstmsg_edit->is_subdiv_allowed->Required) { ?>
				elm = this.getElements("x" + infix + "_is_subdiv_allowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_isfirstmsg_edit->is_subdiv_allowed->caption(), $lkp_isfirstmsg_edit->is_subdiv_allowed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_isfirstmsg_edit->is_circle_allowed->Required) { ?>
				elm = this.getElements("x" + infix + "_is_circle_allowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_isfirstmsg_edit->is_circle_allowed->caption(), $lkp_isfirstmsg_edit->is_circle_allowed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_isfirstmsg_edit->is_WRDO_allowed->Required) { ?>
				elm = this.getElements("x" + infix + "_is_WRDO_allowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_isfirstmsg_edit->is_WRDO_allowed->caption(), $lkp_isfirstmsg_edit->is_WRDO_allowed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_isfirstmsg_edit->record_count->Required) { ?>
				elm = this.getElements("x" + infix + "_record_count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_isfirstmsg_edit->record_count->caption(), $lkp_isfirstmsg_edit->record_count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_record_count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lkp_isfirstmsg_edit->record_count->errorMessage()) ?>");

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
	flkp_isfirstmsgedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flkp_isfirstmsgedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flkp_isfirstmsgedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_isfirstmsg_edit->showPageHeader(); ?>
<?php
$lkp_isfirstmsg_edit->showMessage();
?>
<form name="flkp_isfirstmsgedit" id="flkp_isfirstmsgedit" class="<?php echo $lkp_isfirstmsg_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_isfirstmsg">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_isfirstmsg_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lkp_isfirstmsg_edit->isFirstMsg->Visible) { // isFirstMsg ?>
	<div id="r_isFirstMsg" class="form-group row">
		<label id="elh_lkp_isfirstmsg_isFirstMsg" for="x_isFirstMsg" class="<?php echo $lkp_isfirstmsg_edit->LeftColumnClass ?>"><?php echo $lkp_isfirstmsg_edit->isFirstMsg->caption() ?><?php echo $lkp_isfirstmsg_edit->isFirstMsg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_isfirstmsg_edit->RightColumnClass ?>"><div <?php echo $lkp_isfirstmsg_edit->isFirstMsg->cellAttributes() ?>>
<input type="text" data-table="lkp_isfirstmsg" data-field="x_isFirstMsg" name="x_isFirstMsg" id="x_isFirstMsg" size="30" maxlength="11" value="<?php echo $lkp_isfirstmsg_edit->isFirstMsg->EditValue ?>"<?php echo $lkp_isfirstmsg_edit->isFirstMsg->editAttributes() ?>>
<input type="hidden" data-table="lkp_isfirstmsg" data-field="x_isFirstMsg" name="o_isFirstMsg" id="o_isFirstMsg" value="<?php echo HtmlEncode($lkp_isfirstmsg_edit->isFirstMsg->OldValue != null ? $lkp_isfirstmsg_edit->isFirstMsg->OldValue : $lkp_isfirstmsg_edit->isFirstMsg->CurrentValue) ?>">
<?php echo $lkp_isfirstmsg_edit->isFirstMsg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_isfirstmsg_edit->isFirstMsgName->Visible) { // isFirstMsgName ?>
	<div id="r_isFirstMsgName" class="form-group row">
		<label id="elh_lkp_isfirstmsg_isFirstMsgName" for="x_isFirstMsgName" class="<?php echo $lkp_isfirstmsg_edit->LeftColumnClass ?>"><?php echo $lkp_isfirstmsg_edit->isFirstMsgName->caption() ?><?php echo $lkp_isfirstmsg_edit->isFirstMsgName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_isfirstmsg_edit->RightColumnClass ?>"><div <?php echo $lkp_isfirstmsg_edit->isFirstMsgName->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_isFirstMsgName">
<input type="text" data-table="lkp_isfirstmsg" data-field="x_isFirstMsgName" name="x_isFirstMsgName" id="x_isFirstMsgName" size="30" maxlength="100" value="<?php echo $lkp_isfirstmsg_edit->isFirstMsgName->EditValue ?>"<?php echo $lkp_isfirstmsg_edit->isFirstMsgName->editAttributes() ?>>
</span>
<?php echo $lkp_isfirstmsg_edit->isFirstMsgName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_isfirstmsg_edit->is_station_allowed->Visible) { // is_station_allowed ?>
	<div id="r_is_station_allowed" class="form-group row">
		<label id="elh_lkp_isfirstmsg_is_station_allowed" for="x_is_station_allowed" class="<?php echo $lkp_isfirstmsg_edit->LeftColumnClass ?>"><?php echo $lkp_isfirstmsg_edit->is_station_allowed->caption() ?><?php echo $lkp_isfirstmsg_edit->is_station_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_isfirstmsg_edit->RightColumnClass ?>"><div <?php echo $lkp_isfirstmsg_edit->is_station_allowed->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_is_station_allowed">
<input type="text" data-table="lkp_isfirstmsg" data-field="x_is_station_allowed" name="x_is_station_allowed" id="x_is_station_allowed" size="30" maxlength="1" value="<?php echo $lkp_isfirstmsg_edit->is_station_allowed->EditValue ?>"<?php echo $lkp_isfirstmsg_edit->is_station_allowed->editAttributes() ?>>
</span>
<?php echo $lkp_isfirstmsg_edit->is_station_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_isfirstmsg_edit->is_subdiv_allowed->Visible) { // is_subdiv_allowed ?>
	<div id="r_is_subdiv_allowed" class="form-group row">
		<label id="elh_lkp_isfirstmsg_is_subdiv_allowed" for="x_is_subdiv_allowed" class="<?php echo $lkp_isfirstmsg_edit->LeftColumnClass ?>"><?php echo $lkp_isfirstmsg_edit->is_subdiv_allowed->caption() ?><?php echo $lkp_isfirstmsg_edit->is_subdiv_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_isfirstmsg_edit->RightColumnClass ?>"><div <?php echo $lkp_isfirstmsg_edit->is_subdiv_allowed->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_is_subdiv_allowed">
<input type="text" data-table="lkp_isfirstmsg" data-field="x_is_subdiv_allowed" name="x_is_subdiv_allowed" id="x_is_subdiv_allowed" size="30" maxlength="1" value="<?php echo $lkp_isfirstmsg_edit->is_subdiv_allowed->EditValue ?>"<?php echo $lkp_isfirstmsg_edit->is_subdiv_allowed->editAttributes() ?>>
</span>
<?php echo $lkp_isfirstmsg_edit->is_subdiv_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_isfirstmsg_edit->is_circle_allowed->Visible) { // is_circle_allowed ?>
	<div id="r_is_circle_allowed" class="form-group row">
		<label id="elh_lkp_isfirstmsg_is_circle_allowed" for="x_is_circle_allowed" class="<?php echo $lkp_isfirstmsg_edit->LeftColumnClass ?>"><?php echo $lkp_isfirstmsg_edit->is_circle_allowed->caption() ?><?php echo $lkp_isfirstmsg_edit->is_circle_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_isfirstmsg_edit->RightColumnClass ?>"><div <?php echo $lkp_isfirstmsg_edit->is_circle_allowed->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_is_circle_allowed">
<input type="text" data-table="lkp_isfirstmsg" data-field="x_is_circle_allowed" name="x_is_circle_allowed" id="x_is_circle_allowed" size="30" maxlength="1" value="<?php echo $lkp_isfirstmsg_edit->is_circle_allowed->EditValue ?>"<?php echo $lkp_isfirstmsg_edit->is_circle_allowed->editAttributes() ?>>
</span>
<?php echo $lkp_isfirstmsg_edit->is_circle_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_isfirstmsg_edit->is_WRDO_allowed->Visible) { // is_WRDO_allowed ?>
	<div id="r_is_WRDO_allowed" class="form-group row">
		<label id="elh_lkp_isfirstmsg_is_WRDO_allowed" for="x_is_WRDO_allowed" class="<?php echo $lkp_isfirstmsg_edit->LeftColumnClass ?>"><?php echo $lkp_isfirstmsg_edit->is_WRDO_allowed->caption() ?><?php echo $lkp_isfirstmsg_edit->is_WRDO_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_isfirstmsg_edit->RightColumnClass ?>"><div <?php echo $lkp_isfirstmsg_edit->is_WRDO_allowed->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_is_WRDO_allowed">
<input type="text" data-table="lkp_isfirstmsg" data-field="x_is_WRDO_allowed" name="x_is_WRDO_allowed" id="x_is_WRDO_allowed" size="30" maxlength="1" value="<?php echo $lkp_isfirstmsg_edit->is_WRDO_allowed->EditValue ?>"<?php echo $lkp_isfirstmsg_edit->is_WRDO_allowed->editAttributes() ?>>
</span>
<?php echo $lkp_isfirstmsg_edit->is_WRDO_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_isfirstmsg_edit->record_count->Visible) { // record_count ?>
	<div id="r_record_count" class="form-group row">
		<label id="elh_lkp_isfirstmsg_record_count" for="x_record_count" class="<?php echo $lkp_isfirstmsg_edit->LeftColumnClass ?>"><?php echo $lkp_isfirstmsg_edit->record_count->caption() ?><?php echo $lkp_isfirstmsg_edit->record_count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_isfirstmsg_edit->RightColumnClass ?>"><div <?php echo $lkp_isfirstmsg_edit->record_count->cellAttributes() ?>>
<span id="el_lkp_isfirstmsg_record_count">
<input type="text" data-table="lkp_isfirstmsg" data-field="x_record_count" name="x_record_count" id="x_record_count" size="30" maxlength="11" value="<?php echo $lkp_isfirstmsg_edit->record_count->EditValue ?>"<?php echo $lkp_isfirstmsg_edit->record_count->editAttributes() ?>>
</span>
<?php echo $lkp_isfirstmsg_edit->record_count->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lkp_isfirstmsg_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lkp_isfirstmsg_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_isfirstmsg_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lkp_isfirstmsg_edit->showPageFooter();
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
$lkp_isfirstmsg_edit->terminate();
?>