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
$master_damcatchup_add = new master_damcatchup_add();

// Run the page
$master_damcatchup_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_damcatchup_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_damcatchupadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmaster_damcatchupadd = currentForm = new ew.Form("fmaster_damcatchupadd", "add");

	// Validate form
	fmaster_damcatchupadd.validate = function() {
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
			<?php if ($master_damcatchup_add->CatchUpId->Required) { ?>
				elm = this.getElements("x" + infix + "_CatchUpId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_damcatchup_add->CatchUpId->caption(), $master_damcatchup_add->CatchUpId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CatchUpId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_damcatchup_add->CatchUpId->errorMessage()) ?>");
			<?php if ($master_damcatchup_add->CatchUpName->Required) { ?>
				elm = this.getElements("x" + infix + "_CatchUpName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_damcatchup_add->CatchUpName->caption(), $master_damcatchup_add->CatchUpName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_damcatchup_add->CatchUpName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_CatchUpName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_damcatchup_add->CatchUpName_kn->caption(), $master_damcatchup_add->CatchUpName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_damcatchup_add->CatchUpName_hi->Required) { ?>
				elm = this.getElements("x" + infix + "_CatchUpName_hi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_damcatchup_add->CatchUpName_hi->caption(), $master_damcatchup_add->CatchUpName_hi->RequiredErrorMessage)) ?>");
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
	fmaster_damcatchupadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_damcatchupadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_damcatchupadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_damcatchup_add->showPageHeader(); ?>
<?php
$master_damcatchup_add->showMessage();
?>
<form name="fmaster_damcatchupadd" id="fmaster_damcatchupadd" class="<?php echo $master_damcatchup_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_damcatchup">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$master_damcatchup_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($master_damcatchup_add->CatchUpId->Visible) { // CatchUpId ?>
	<div id="r_CatchUpId" class="form-group row">
		<label id="elh_master_damcatchup_CatchUpId" for="x_CatchUpId" class="<?php echo $master_damcatchup_add->LeftColumnClass ?>"><?php echo $master_damcatchup_add->CatchUpId->caption() ?><?php echo $master_damcatchup_add->CatchUpId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_damcatchup_add->RightColumnClass ?>"><div <?php echo $master_damcatchup_add->CatchUpId->cellAttributes() ?>>
<span id="el_master_damcatchup_CatchUpId">
<input type="text" data-table="master_damcatchup" data-field="x_CatchUpId" name="x_CatchUpId" id="x_CatchUpId" size="30" maxlength="11" value="<?php echo $master_damcatchup_add->CatchUpId->EditValue ?>"<?php echo $master_damcatchup_add->CatchUpId->editAttributes() ?>>
</span>
<?php echo $master_damcatchup_add->CatchUpId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_damcatchup_add->CatchUpName->Visible) { // CatchUpName ?>
	<div id="r_CatchUpName" class="form-group row">
		<label id="elh_master_damcatchup_CatchUpName" for="x_CatchUpName" class="<?php echo $master_damcatchup_add->LeftColumnClass ?>"><?php echo $master_damcatchup_add->CatchUpName->caption() ?><?php echo $master_damcatchup_add->CatchUpName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_damcatchup_add->RightColumnClass ?>"><div <?php echo $master_damcatchup_add->CatchUpName->cellAttributes() ?>>
<span id="el_master_damcatchup_CatchUpName">
<input type="text" data-table="master_damcatchup" data-field="x_CatchUpName" name="x_CatchUpName" id="x_CatchUpName" size="30" maxlength="50" value="<?php echo $master_damcatchup_add->CatchUpName->EditValue ?>"<?php echo $master_damcatchup_add->CatchUpName->editAttributes() ?>>
</span>
<?php echo $master_damcatchup_add->CatchUpName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_damcatchup_add->CatchUpName_kn->Visible) { // CatchUpName_kn ?>
	<div id="r_CatchUpName_kn" class="form-group row">
		<label id="elh_master_damcatchup_CatchUpName_kn" for="x_CatchUpName_kn" class="<?php echo $master_damcatchup_add->LeftColumnClass ?>"><?php echo $master_damcatchup_add->CatchUpName_kn->caption() ?><?php echo $master_damcatchup_add->CatchUpName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_damcatchup_add->RightColumnClass ?>"><div <?php echo $master_damcatchup_add->CatchUpName_kn->cellAttributes() ?>>
<span id="el_master_damcatchup_CatchUpName_kn">
<input type="text" data-table="master_damcatchup" data-field="x_CatchUpName_kn" name="x_CatchUpName_kn" id="x_CatchUpName_kn" size="30" maxlength="50" value="<?php echo $master_damcatchup_add->CatchUpName_kn->EditValue ?>"<?php echo $master_damcatchup_add->CatchUpName_kn->editAttributes() ?>>
</span>
<?php echo $master_damcatchup_add->CatchUpName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_damcatchup_add->CatchUpName_hi->Visible) { // CatchUpName_hi ?>
	<div id="r_CatchUpName_hi" class="form-group row">
		<label id="elh_master_damcatchup_CatchUpName_hi" for="x_CatchUpName_hi" class="<?php echo $master_damcatchup_add->LeftColumnClass ?>"><?php echo $master_damcatchup_add->CatchUpName_hi->caption() ?><?php echo $master_damcatchup_add->CatchUpName_hi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_damcatchup_add->RightColumnClass ?>"><div <?php echo $master_damcatchup_add->CatchUpName_hi->cellAttributes() ?>>
<span id="el_master_damcatchup_CatchUpName_hi">
<input type="text" data-table="master_damcatchup" data-field="x_CatchUpName_hi" name="x_CatchUpName_hi" id="x_CatchUpName_hi" size="30" maxlength="50" value="<?php echo $master_damcatchup_add->CatchUpName_hi->EditValue ?>"<?php echo $master_damcatchup_add->CatchUpName_hi->editAttributes() ?>>
</span>
<?php echo $master_damcatchup_add->CatchUpName_hi->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_damcatchup_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_damcatchup_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_damcatchup_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_damcatchup_add->showPageFooter();
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
$master_damcatchup_add->terminate();
?>