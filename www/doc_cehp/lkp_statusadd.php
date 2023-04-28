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
$lkp_status_add = new lkp_status_add();

// Run the page
$lkp_status_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_status_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_statusadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	flkp_statusadd = currentForm = new ew.Form("flkp_statusadd", "add");

	// Validate form
	flkp_statusadd.validate = function() {
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
			<?php if ($lkp_status_add->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_status_add->Status->caption(), $lkp_status_add->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lkp_status_add->Status->errorMessage()) ?>");
			<?php if ($lkp_status_add->StatusName->Required) { ?>
				elm = this.getElements("x" + infix + "_StatusName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_status_add->StatusName->caption(), $lkp_status_add->StatusName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_status_add->is_station_allowed->Required) { ?>
				elm = this.getElements("x" + infix + "_is_station_allowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_status_add->is_station_allowed->caption(), $lkp_status_add->is_station_allowed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_status_add->is_subdiv_allowed->Required) { ?>
				elm = this.getElements("x" + infix + "_is_subdiv_allowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_status_add->is_subdiv_allowed->caption(), $lkp_status_add->is_subdiv_allowed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_status_add->is_circle_allowed->Required) { ?>
				elm = this.getElements("x" + infix + "_is_circle_allowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_status_add->is_circle_allowed->caption(), $lkp_status_add->is_circle_allowed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_status_add->is_WRDO_allowed->Required) { ?>
				elm = this.getElements("x" + infix + "_is_WRDO_allowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_status_add->is_WRDO_allowed->caption(), $lkp_status_add->is_WRDO_allowed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_status_add->record_count->Required) { ?>
				elm = this.getElements("x" + infix + "_record_count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_status_add->record_count->caption(), $lkp_status_add->record_count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_record_count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lkp_status_add->record_count->errorMessage()) ?>");

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
	flkp_statusadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flkp_statusadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	flkp_statusadd.lists["x_is_station_allowed"] = <?php echo $lkp_status_add->is_station_allowed->Lookup->toClientList($lkp_status_add) ?>;
	flkp_statusadd.lists["x_is_station_allowed"].options = <?php echo JsonEncode($lkp_status_add->is_station_allowed->options(FALSE, TRUE)) ?>;
	flkp_statusadd.lists["x_is_subdiv_allowed"] = <?php echo $lkp_status_add->is_subdiv_allowed->Lookup->toClientList($lkp_status_add) ?>;
	flkp_statusadd.lists["x_is_subdiv_allowed"].options = <?php echo JsonEncode($lkp_status_add->is_subdiv_allowed->options(FALSE, TRUE)) ?>;
	flkp_statusadd.lists["x_is_circle_allowed"] = <?php echo $lkp_status_add->is_circle_allowed->Lookup->toClientList($lkp_status_add) ?>;
	flkp_statusadd.lists["x_is_circle_allowed"].options = <?php echo JsonEncode($lkp_status_add->is_circle_allowed->options(FALSE, TRUE)) ?>;
	flkp_statusadd.lists["x_is_WRDO_allowed"] = <?php echo $lkp_status_add->is_WRDO_allowed->Lookup->toClientList($lkp_status_add) ?>;
	flkp_statusadd.lists["x_is_WRDO_allowed"].options = <?php echo JsonEncode($lkp_status_add->is_WRDO_allowed->options(FALSE, TRUE)) ?>;
	loadjs.done("flkp_statusadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_status_add->showPageHeader(); ?>
<?php
$lkp_status_add->showMessage();
?>
<form name="flkp_statusadd" id="flkp_statusadd" class="<?php echo $lkp_status_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_status">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_status_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lkp_status_add->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_lkp_status_Status" for="x_Status" class="<?php echo $lkp_status_add->LeftColumnClass ?>"><?php echo $lkp_status_add->Status->caption() ?><?php echo $lkp_status_add->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_status_add->RightColumnClass ?>"><div <?php echo $lkp_status_add->Status->cellAttributes() ?>>
<span id="el_lkp_status_Status">
<input type="text" data-table="lkp_status" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="11" value="<?php echo $lkp_status_add->Status->EditValue ?>"<?php echo $lkp_status_add->Status->editAttributes() ?>>
</span>
<?php echo $lkp_status_add->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_status_add->StatusName->Visible) { // StatusName ?>
	<div id="r_StatusName" class="form-group row">
		<label id="elh_lkp_status_StatusName" for="x_StatusName" class="<?php echo $lkp_status_add->LeftColumnClass ?>"><?php echo $lkp_status_add->StatusName->caption() ?><?php echo $lkp_status_add->StatusName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_status_add->RightColumnClass ?>"><div <?php echo $lkp_status_add->StatusName->cellAttributes() ?>>
<span id="el_lkp_status_StatusName">
<input type="text" data-table="lkp_status" data-field="x_StatusName" name="x_StatusName" id="x_StatusName" size="30" maxlength="100" value="<?php echo $lkp_status_add->StatusName->EditValue ?>"<?php echo $lkp_status_add->StatusName->editAttributes() ?>>
</span>
<?php echo $lkp_status_add->StatusName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_status_add->is_station_allowed->Visible) { // is_station_allowed ?>
	<div id="r_is_station_allowed" class="form-group row">
		<label id="elh_lkp_status_is_station_allowed" class="<?php echo $lkp_status_add->LeftColumnClass ?>"><?php echo $lkp_status_add->is_station_allowed->caption() ?><?php echo $lkp_status_add->is_station_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_status_add->RightColumnClass ?>"><div <?php echo $lkp_status_add->is_station_allowed->cellAttributes() ?>>
<span id="el_lkp_status_is_station_allowed">
<div id="tp_x_is_station_allowed" class="ew-template"><input type="radio" class="custom-control-input" data-table="lkp_status" data-field="x_is_station_allowed" data-value-separator="<?php echo $lkp_status_add->is_station_allowed->displayValueSeparatorAttribute() ?>" name="x_is_station_allowed" id="x_is_station_allowed" value="{value}"<?php echo $lkp_status_add->is_station_allowed->editAttributes() ?>></div>
<div id="dsl_x_is_station_allowed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $lkp_status_add->is_station_allowed->radioButtonListHtml(FALSE, "x_is_station_allowed") ?>
</div></div>
</span>
<?php echo $lkp_status_add->is_station_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_status_add->is_subdiv_allowed->Visible) { // is_subdiv_allowed ?>
	<div id="r_is_subdiv_allowed" class="form-group row">
		<label id="elh_lkp_status_is_subdiv_allowed" class="<?php echo $lkp_status_add->LeftColumnClass ?>"><?php echo $lkp_status_add->is_subdiv_allowed->caption() ?><?php echo $lkp_status_add->is_subdiv_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_status_add->RightColumnClass ?>"><div <?php echo $lkp_status_add->is_subdiv_allowed->cellAttributes() ?>>
<span id="el_lkp_status_is_subdiv_allowed">
<div id="tp_x_is_subdiv_allowed" class="ew-template"><input type="radio" class="custom-control-input" data-table="lkp_status" data-field="x_is_subdiv_allowed" data-value-separator="<?php echo $lkp_status_add->is_subdiv_allowed->displayValueSeparatorAttribute() ?>" name="x_is_subdiv_allowed" id="x_is_subdiv_allowed" value="{value}"<?php echo $lkp_status_add->is_subdiv_allowed->editAttributes() ?>></div>
<div id="dsl_x_is_subdiv_allowed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $lkp_status_add->is_subdiv_allowed->radioButtonListHtml(FALSE, "x_is_subdiv_allowed") ?>
</div></div>
</span>
<?php echo $lkp_status_add->is_subdiv_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_status_add->is_circle_allowed->Visible) { // is_circle_allowed ?>
	<div id="r_is_circle_allowed" class="form-group row">
		<label id="elh_lkp_status_is_circle_allowed" class="<?php echo $lkp_status_add->LeftColumnClass ?>"><?php echo $lkp_status_add->is_circle_allowed->caption() ?><?php echo $lkp_status_add->is_circle_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_status_add->RightColumnClass ?>"><div <?php echo $lkp_status_add->is_circle_allowed->cellAttributes() ?>>
<span id="el_lkp_status_is_circle_allowed">
<div id="tp_x_is_circle_allowed" class="ew-template"><input type="radio" class="custom-control-input" data-table="lkp_status" data-field="x_is_circle_allowed" data-value-separator="<?php echo $lkp_status_add->is_circle_allowed->displayValueSeparatorAttribute() ?>" name="x_is_circle_allowed" id="x_is_circle_allowed" value="{value}"<?php echo $lkp_status_add->is_circle_allowed->editAttributes() ?>></div>
<div id="dsl_x_is_circle_allowed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $lkp_status_add->is_circle_allowed->radioButtonListHtml(FALSE, "x_is_circle_allowed") ?>
</div></div>
</span>
<?php echo $lkp_status_add->is_circle_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_status_add->is_WRDO_allowed->Visible) { // is_WRDO_allowed ?>
	<div id="r_is_WRDO_allowed" class="form-group row">
		<label id="elh_lkp_status_is_WRDO_allowed" class="<?php echo $lkp_status_add->LeftColumnClass ?>"><?php echo $lkp_status_add->is_WRDO_allowed->caption() ?><?php echo $lkp_status_add->is_WRDO_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_status_add->RightColumnClass ?>"><div <?php echo $lkp_status_add->is_WRDO_allowed->cellAttributes() ?>>
<span id="el_lkp_status_is_WRDO_allowed">
<div id="tp_x_is_WRDO_allowed" class="ew-template"><input type="radio" class="custom-control-input" data-table="lkp_status" data-field="x_is_WRDO_allowed" data-value-separator="<?php echo $lkp_status_add->is_WRDO_allowed->displayValueSeparatorAttribute() ?>" name="x_is_WRDO_allowed" id="x_is_WRDO_allowed" value="{value}"<?php echo $lkp_status_add->is_WRDO_allowed->editAttributes() ?>></div>
<div id="dsl_x_is_WRDO_allowed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $lkp_status_add->is_WRDO_allowed->radioButtonListHtml(FALSE, "x_is_WRDO_allowed") ?>
</div></div>
</span>
<?php echo $lkp_status_add->is_WRDO_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_status_add->record_count->Visible) { // record_count ?>
	<div id="r_record_count" class="form-group row">
		<label id="elh_lkp_status_record_count" for="x_record_count" class="<?php echo $lkp_status_add->LeftColumnClass ?>"><?php echo $lkp_status_add->record_count->caption() ?><?php echo $lkp_status_add->record_count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_status_add->RightColumnClass ?>"><div <?php echo $lkp_status_add->record_count->cellAttributes() ?>>
<span id="el_lkp_status_record_count">
<input type="text" data-table="lkp_status" data-field="x_record_count" name="x_record_count" id="x_record_count" size="30" maxlength="11" value="<?php echo $lkp_status_add->record_count->EditValue ?>"<?php echo $lkp_status_add->record_count->editAttributes() ?>>
</span>
<?php echo $lkp_status_add->record_count->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lkp_status_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lkp_status_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_status_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lkp_status_add->showPageFooter();
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
$lkp_status_add->terminate();
?>