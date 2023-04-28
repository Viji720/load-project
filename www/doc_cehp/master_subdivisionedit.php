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
$master_subdivision_edit = new master_subdivision_edit();

// Run the page
$master_subdivision_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_subdivision_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_subdivisionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_subdivisionedit = currentForm = new ew.Form("fmaster_subdivisionedit", "edit");

	// Validate form
	fmaster_subdivisionedit.validate = function() {
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
			<?php if ($master_subdivision_edit->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subdivision_edit->SubDivisionId->caption(), $master_subdivision_edit->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_subdivision_edit->SubDivisionId->errorMessage()) ?>");
			<?php if ($master_subdivision_edit->SubDivisionName->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subdivision_edit->SubDivisionName->caption(), $master_subdivision_edit->SubDivisionName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_subdivision_edit->SubDivisionName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subdivision_edit->SubDivisionName_kn->caption(), $master_subdivision_edit->SubDivisionName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_subdivision_edit->divisionid->Required) { ?>
				elm = this.getElements("x" + infix + "_divisionid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subdivision_edit->divisionid->caption(), $master_subdivision_edit->divisionid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_subdivision_edit->circleId->Required) { ?>
				elm = this.getElements("x" + infix + "_circleId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subdivision_edit->circleId->caption(), $master_subdivision_edit->circleId->RequiredErrorMessage)) ?>");
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
	fmaster_subdivisionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_subdivisionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmaster_subdivisionedit.lists["x_divisionid"] = <?php echo $master_subdivision_edit->divisionid->Lookup->toClientList($master_subdivision_edit) ?>;
	fmaster_subdivisionedit.lists["x_divisionid"].options = <?php echo JsonEncode($master_subdivision_edit->divisionid->lookupOptions()) ?>;
	fmaster_subdivisionedit.lists["x_circleId"] = <?php echo $master_subdivision_edit->circleId->Lookup->toClientList($master_subdivision_edit) ?>;
	fmaster_subdivisionedit.lists["x_circleId"].options = <?php echo JsonEncode($master_subdivision_edit->circleId->lookupOptions()) ?>;
	loadjs.done("fmaster_subdivisionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_subdivision_edit->showPageHeader(); ?>
<?php
$master_subdivision_edit->showMessage();
?>
<form name="fmaster_subdivisionedit" id="fmaster_subdivisionedit" class="<?php echo $master_subdivision_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_subdivision">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_subdivision_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_subdivision_edit->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_master_subdivision_SubDivisionId" for="x_SubDivisionId" class="<?php echo $master_subdivision_edit->LeftColumnClass ?>"><?php echo $master_subdivision_edit->SubDivisionId->caption() ?><?php echo $master_subdivision_edit->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subdivision_edit->RightColumnClass ?>"><div <?php echo $master_subdivision_edit->SubDivisionId->cellAttributes() ?>>
<input type="text" data-table="master_subdivision" data-field="x_SubDivisionId" name="x_SubDivisionId" id="x_SubDivisionId" size="30" maxlength="11" value="<?php echo $master_subdivision_edit->SubDivisionId->EditValue ?>"<?php echo $master_subdivision_edit->SubDivisionId->editAttributes() ?>>
<input type="hidden" data-table="master_subdivision" data-field="x_SubDivisionId" name="o_SubDivisionId" id="o_SubDivisionId" value="<?php echo HtmlEncode($master_subdivision_edit->SubDivisionId->OldValue != null ? $master_subdivision_edit->SubDivisionId->OldValue : $master_subdivision_edit->SubDivisionId->CurrentValue) ?>">
<?php echo $master_subdivision_edit->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_subdivision_edit->SubDivisionName->Visible) { // SubDivisionName ?>
	<div id="r_SubDivisionName" class="form-group row">
		<label id="elh_master_subdivision_SubDivisionName" for="x_SubDivisionName" class="<?php echo $master_subdivision_edit->LeftColumnClass ?>"><?php echo $master_subdivision_edit->SubDivisionName->caption() ?><?php echo $master_subdivision_edit->SubDivisionName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subdivision_edit->RightColumnClass ?>"><div <?php echo $master_subdivision_edit->SubDivisionName->cellAttributes() ?>>
<span id="el_master_subdivision_SubDivisionName">
<input type="text" data-table="master_subdivision" data-field="x_SubDivisionName" name="x_SubDivisionName" id="x_SubDivisionName" size="30" maxlength="100" value="<?php echo $master_subdivision_edit->SubDivisionName->EditValue ?>"<?php echo $master_subdivision_edit->SubDivisionName->editAttributes() ?>>
</span>
<?php echo $master_subdivision_edit->SubDivisionName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_subdivision_edit->SubDivisionName_kn->Visible) { // SubDivisionName_kn ?>
	<div id="r_SubDivisionName_kn" class="form-group row">
		<label id="elh_master_subdivision_SubDivisionName_kn" for="x_SubDivisionName_kn" class="<?php echo $master_subdivision_edit->LeftColumnClass ?>"><?php echo $master_subdivision_edit->SubDivisionName_kn->caption() ?><?php echo $master_subdivision_edit->SubDivisionName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subdivision_edit->RightColumnClass ?>"><div <?php echo $master_subdivision_edit->SubDivisionName_kn->cellAttributes() ?>>
<span id="el_master_subdivision_SubDivisionName_kn">
<input type="text" data-table="master_subdivision" data-field="x_SubDivisionName_kn" name="x_SubDivisionName_kn" id="x_SubDivisionName_kn" size="30" maxlength="100" value="<?php echo $master_subdivision_edit->SubDivisionName_kn->EditValue ?>"<?php echo $master_subdivision_edit->SubDivisionName_kn->editAttributes() ?>>
</span>
<?php echo $master_subdivision_edit->SubDivisionName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_subdivision_edit->divisionid->Visible) { // divisionid ?>
	<div id="r_divisionid" class="form-group row">
		<label id="elh_master_subdivision_divisionid" for="x_divisionid" class="<?php echo $master_subdivision_edit->LeftColumnClass ?>"><?php echo $master_subdivision_edit->divisionid->caption() ?><?php echo $master_subdivision_edit->divisionid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subdivision_edit->RightColumnClass ?>"><div <?php echo $master_subdivision_edit->divisionid->cellAttributes() ?>>
<span id="el_master_subdivision_divisionid">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_subdivision" data-field="x_divisionid" data-value-separator="<?php echo $master_subdivision_edit->divisionid->displayValueSeparatorAttribute() ?>" id="x_divisionid" name="x_divisionid"<?php echo $master_subdivision_edit->divisionid->editAttributes() ?>>
			<?php echo $master_subdivision_edit->divisionid->selectOptionListHtml("x_divisionid") ?>
		</select>
</div>
<?php echo $master_subdivision_edit->divisionid->Lookup->getParamTag($master_subdivision_edit, "p_x_divisionid") ?>
</span>
<?php echo $master_subdivision_edit->divisionid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_subdivision_edit->circleId->Visible) { // circleId ?>
	<div id="r_circleId" class="form-group row">
		<label id="elh_master_subdivision_circleId" for="x_circleId" class="<?php echo $master_subdivision_edit->LeftColumnClass ?>"><?php echo $master_subdivision_edit->circleId->caption() ?><?php echo $master_subdivision_edit->circleId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subdivision_edit->RightColumnClass ?>"><div <?php echo $master_subdivision_edit->circleId->cellAttributes() ?>>
<span id="el_master_subdivision_circleId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_subdivision" data-field="x_circleId" data-value-separator="<?php echo $master_subdivision_edit->circleId->displayValueSeparatorAttribute() ?>" id="x_circleId" name="x_circleId"<?php echo $master_subdivision_edit->circleId->editAttributes() ?>>
			<?php echo $master_subdivision_edit->circleId->selectOptionListHtml("x_circleId") ?>
		</select>
</div>
<?php echo $master_subdivision_edit->circleId->Lookup->getParamTag($master_subdivision_edit, "p_x_circleId") ?>
</span>
<?php echo $master_subdivision_edit->circleId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_subdivision_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_subdivision_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_subdivision_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_subdivision_edit->showPageFooter();
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
$master_subdivision_edit->terminate();
?>