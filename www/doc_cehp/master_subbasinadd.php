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
$master_subbasin_add = new master_subbasin_add();

// Run the page
$master_subbasin_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_subbasin_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_subbasinadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmaster_subbasinadd = currentForm = new ew.Form("fmaster_subbasinadd", "add");

	// Validate form
	fmaster_subbasinadd.validate = function() {
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
			<?php if ($master_subbasin_add->SubBasinId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubBasinId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subbasin_add->SubBasinId->caption(), $master_subbasin_add->SubBasinId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubBasinId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_subbasin_add->SubBasinId->errorMessage()) ?>");
			<?php if ($master_subbasin_add->SubBasinName->Required) { ?>
				elm = this.getElements("x" + infix + "_SubBasinName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subbasin_add->SubBasinName->caption(), $master_subbasin_add->SubBasinName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_subbasin_add->SubBasinName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_SubBasinName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subbasin_add->SubBasinName_kn->caption(), $master_subbasin_add->SubBasinName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_subbasin_add->SubBasinName_hi->Required) { ?>
				elm = this.getElements("x" + infix + "_SubBasinName_hi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subbasin_add->SubBasinName_hi->caption(), $master_subbasin_add->SubBasinName_hi->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_subbasin_add->BasinId->Required) { ?>
				elm = this.getElements("x" + infix + "_BasinId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_subbasin_add->BasinId->caption(), $master_subbasin_add->BasinId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BasinId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_subbasin_add->BasinId->errorMessage()) ?>");

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
	fmaster_subbasinadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_subbasinadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_subbasinadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_subbasin_add->showPageHeader(); ?>
<?php
$master_subbasin_add->showMessage();
?>
<form name="fmaster_subbasinadd" id="fmaster_subbasinadd" class="<?php echo $master_subbasin_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_subbasin">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$master_subbasin_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($master_subbasin_add->SubBasinId->Visible) { // SubBasinId ?>
	<div id="r_SubBasinId" class="form-group row">
		<label id="elh_master_subbasin_SubBasinId" for="x_SubBasinId" class="<?php echo $master_subbasin_add->LeftColumnClass ?>"><?php echo $master_subbasin_add->SubBasinId->caption() ?><?php echo $master_subbasin_add->SubBasinId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subbasin_add->RightColumnClass ?>"><div <?php echo $master_subbasin_add->SubBasinId->cellAttributes() ?>>
<span id="el_master_subbasin_SubBasinId">
<input type="text" data-table="master_subbasin" data-field="x_SubBasinId" name="x_SubBasinId" id="x_SubBasinId" size="30" maxlength="11" value="<?php echo $master_subbasin_add->SubBasinId->EditValue ?>"<?php echo $master_subbasin_add->SubBasinId->editAttributes() ?>>
</span>
<?php echo $master_subbasin_add->SubBasinId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_subbasin_add->SubBasinName->Visible) { // SubBasinName ?>
	<div id="r_SubBasinName" class="form-group row">
		<label id="elh_master_subbasin_SubBasinName" for="x_SubBasinName" class="<?php echo $master_subbasin_add->LeftColumnClass ?>"><?php echo $master_subbasin_add->SubBasinName->caption() ?><?php echo $master_subbasin_add->SubBasinName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subbasin_add->RightColumnClass ?>"><div <?php echo $master_subbasin_add->SubBasinName->cellAttributes() ?>>
<span id="el_master_subbasin_SubBasinName">
<input type="text" data-table="master_subbasin" data-field="x_SubBasinName" name="x_SubBasinName" id="x_SubBasinName" size="30" maxlength="100" value="<?php echo $master_subbasin_add->SubBasinName->EditValue ?>"<?php echo $master_subbasin_add->SubBasinName->editAttributes() ?>>
</span>
<?php echo $master_subbasin_add->SubBasinName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_subbasin_add->SubBasinName_kn->Visible) { // SubBasinName_kn ?>
	<div id="r_SubBasinName_kn" class="form-group row">
		<label id="elh_master_subbasin_SubBasinName_kn" for="x_SubBasinName_kn" class="<?php echo $master_subbasin_add->LeftColumnClass ?>"><?php echo $master_subbasin_add->SubBasinName_kn->caption() ?><?php echo $master_subbasin_add->SubBasinName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subbasin_add->RightColumnClass ?>"><div <?php echo $master_subbasin_add->SubBasinName_kn->cellAttributes() ?>>
<span id="el_master_subbasin_SubBasinName_kn">
<input type="text" data-table="master_subbasin" data-field="x_SubBasinName_kn" name="x_SubBasinName_kn" id="x_SubBasinName_kn" size="30" maxlength="100" value="<?php echo $master_subbasin_add->SubBasinName_kn->EditValue ?>"<?php echo $master_subbasin_add->SubBasinName_kn->editAttributes() ?>>
</span>
<?php echo $master_subbasin_add->SubBasinName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_subbasin_add->SubBasinName_hi->Visible) { // SubBasinName_hi ?>
	<div id="r_SubBasinName_hi" class="form-group row">
		<label id="elh_master_subbasin_SubBasinName_hi" for="x_SubBasinName_hi" class="<?php echo $master_subbasin_add->LeftColumnClass ?>"><?php echo $master_subbasin_add->SubBasinName_hi->caption() ?><?php echo $master_subbasin_add->SubBasinName_hi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subbasin_add->RightColumnClass ?>"><div <?php echo $master_subbasin_add->SubBasinName_hi->cellAttributes() ?>>
<span id="el_master_subbasin_SubBasinName_hi">
<input type="text" data-table="master_subbasin" data-field="x_SubBasinName_hi" name="x_SubBasinName_hi" id="x_SubBasinName_hi" size="30" maxlength="100" value="<?php echo $master_subbasin_add->SubBasinName_hi->EditValue ?>"<?php echo $master_subbasin_add->SubBasinName_hi->editAttributes() ?>>
</span>
<?php echo $master_subbasin_add->SubBasinName_hi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_subbasin_add->BasinId->Visible) { // BasinId ?>
	<div id="r_BasinId" class="form-group row">
		<label id="elh_master_subbasin_BasinId" for="x_BasinId" class="<?php echo $master_subbasin_add->LeftColumnClass ?>"><?php echo $master_subbasin_add->BasinId->caption() ?><?php echo $master_subbasin_add->BasinId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_subbasin_add->RightColumnClass ?>"><div <?php echo $master_subbasin_add->BasinId->cellAttributes() ?>>
<span id="el_master_subbasin_BasinId">
<input type="text" data-table="master_subbasin" data-field="x_BasinId" name="x_BasinId" id="x_BasinId" size="30" maxlength="11" value="<?php echo $master_subbasin_add->BasinId->EditValue ?>"<?php echo $master_subbasin_add->BasinId->editAttributes() ?>>
</span>
<?php echo $master_subbasin_add->BasinId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_subbasin_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_subbasin_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_subbasin_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_subbasin_add->showPageFooter();
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
$master_subbasin_add->terminate();
?>