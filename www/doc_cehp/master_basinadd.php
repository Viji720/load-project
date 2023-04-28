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
$master_basin_add = new master_basin_add();

// Run the page
$master_basin_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_basin_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_basinadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmaster_basinadd = currentForm = new ew.Form("fmaster_basinadd", "add");

	// Validate form
	fmaster_basinadd.validate = function() {
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
			<?php if ($master_basin_add->BasinId->Required) { ?>
				elm = this.getElements("x" + infix + "_BasinId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_basin_add->BasinId->caption(), $master_basin_add->BasinId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BasinId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_basin_add->BasinId->errorMessage()) ?>");
			<?php if ($master_basin_add->BasinName->Required) { ?>
				elm = this.getElements("x" + infix + "_BasinName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_basin_add->BasinName->caption(), $master_basin_add->BasinName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_basin_add->BasinName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_BasinName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_basin_add->BasinName_kn->caption(), $master_basin_add->BasinName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_basin_add->BasinName_hi->Required) { ?>
				elm = this.getElements("x" + infix + "_BasinName_hi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_basin_add->BasinName_hi->caption(), $master_basin_add->BasinName_hi->RequiredErrorMessage)) ?>");
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
	fmaster_basinadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_basinadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_basinadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_basin_add->showPageHeader(); ?>
<?php
$master_basin_add->showMessage();
?>
<form name="fmaster_basinadd" id="fmaster_basinadd" class="<?php echo $master_basin_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_basin">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$master_basin_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($master_basin_add->BasinId->Visible) { // BasinId ?>
	<div id="r_BasinId" class="form-group row">
		<label id="elh_master_basin_BasinId" for="x_BasinId" class="<?php echo $master_basin_add->LeftColumnClass ?>"><?php echo $master_basin_add->BasinId->caption() ?><?php echo $master_basin_add->BasinId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_basin_add->RightColumnClass ?>"><div <?php echo $master_basin_add->BasinId->cellAttributes() ?>>
<span id="el_master_basin_BasinId">
<input type="text" data-table="master_basin" data-field="x_BasinId" name="x_BasinId" id="x_BasinId" size="30" maxlength="11" value="<?php echo $master_basin_add->BasinId->EditValue ?>"<?php echo $master_basin_add->BasinId->editAttributes() ?>>
</span>
<?php echo $master_basin_add->BasinId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_basin_add->BasinName->Visible) { // BasinName ?>
	<div id="r_BasinName" class="form-group row">
		<label id="elh_master_basin_BasinName" for="x_BasinName" class="<?php echo $master_basin_add->LeftColumnClass ?>"><?php echo $master_basin_add->BasinName->caption() ?><?php echo $master_basin_add->BasinName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_basin_add->RightColumnClass ?>"><div <?php echo $master_basin_add->BasinName->cellAttributes() ?>>
<span id="el_master_basin_BasinName">
<input type="text" data-table="master_basin" data-field="x_BasinName" name="x_BasinName" id="x_BasinName" size="30" maxlength="100" value="<?php echo $master_basin_add->BasinName->EditValue ?>"<?php echo $master_basin_add->BasinName->editAttributes() ?>>
</span>
<?php echo $master_basin_add->BasinName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_basin_add->BasinName_kn->Visible) { // BasinName_kn ?>
	<div id="r_BasinName_kn" class="form-group row">
		<label id="elh_master_basin_BasinName_kn" for="x_BasinName_kn" class="<?php echo $master_basin_add->LeftColumnClass ?>"><?php echo $master_basin_add->BasinName_kn->caption() ?><?php echo $master_basin_add->BasinName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_basin_add->RightColumnClass ?>"><div <?php echo $master_basin_add->BasinName_kn->cellAttributes() ?>>
<span id="el_master_basin_BasinName_kn">
<input type="text" data-table="master_basin" data-field="x_BasinName_kn" name="x_BasinName_kn" id="x_BasinName_kn" size="30" maxlength="100" value="<?php echo $master_basin_add->BasinName_kn->EditValue ?>"<?php echo $master_basin_add->BasinName_kn->editAttributes() ?>>
</span>
<?php echo $master_basin_add->BasinName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_basin_add->BasinName_hi->Visible) { // BasinName_hi ?>
	<div id="r_BasinName_hi" class="form-group row">
		<label id="elh_master_basin_BasinName_hi" for="x_BasinName_hi" class="<?php echo $master_basin_add->LeftColumnClass ?>"><?php echo $master_basin_add->BasinName_hi->caption() ?><?php echo $master_basin_add->BasinName_hi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_basin_add->RightColumnClass ?>"><div <?php echo $master_basin_add->BasinName_hi->cellAttributes() ?>>
<span id="el_master_basin_BasinName_hi">
<input type="text" data-table="master_basin" data-field="x_BasinName_hi" name="x_BasinName_hi" id="x_BasinName_hi" size="30" maxlength="100" value="<?php echo $master_basin_add->BasinName_hi->EditValue ?>"<?php echo $master_basin_add->BasinName_hi->editAttributes() ?>>
</span>
<?php echo $master_basin_add->BasinName_hi->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_basin_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_basin_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_basin_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_basin_add->showPageFooter();
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
$master_basin_add->terminate();
?>