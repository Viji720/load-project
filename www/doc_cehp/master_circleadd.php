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
$master_circle_add = new master_circle_add();

// Run the page
$master_circle_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_circle_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_circleadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmaster_circleadd = currentForm = new ew.Form("fmaster_circleadd", "add");

	// Validate form
	fmaster_circleadd.validate = function() {
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
			<?php if ($master_circle_add->circleId->Required) { ?>
				elm = this.getElements("x" + infix + "_circleId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_circle_add->circleId->caption(), $master_circle_add->circleId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_circleId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_circle_add->circleId->errorMessage()) ?>");
			<?php if ($master_circle_add->circleName->Required) { ?>
				elm = this.getElements("x" + infix + "_circleName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_circle_add->circleName->caption(), $master_circle_add->circleName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_circle_add->circleName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_circleName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_circle_add->circleName_kn->caption(), $master_circle_add->circleName_kn->RequiredErrorMessage)) ?>");
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
	fmaster_circleadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_circleadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_circleadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_circle_add->showPageHeader(); ?>
<?php
$master_circle_add->showMessage();
?>
<form name="fmaster_circleadd" id="fmaster_circleadd" class="<?php echo $master_circle_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_circle">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$master_circle_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($master_circle_add->circleId->Visible) { // circleId ?>
	<div id="r_circleId" class="form-group row">
		<label id="elh_master_circle_circleId" for="x_circleId" class="<?php echo $master_circle_add->LeftColumnClass ?>"><?php echo $master_circle_add->circleId->caption() ?><?php echo $master_circle_add->circleId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_circle_add->RightColumnClass ?>"><div <?php echo $master_circle_add->circleId->cellAttributes() ?>>
<span id="el_master_circle_circleId">
<input type="text" data-table="master_circle" data-field="x_circleId" name="x_circleId" id="x_circleId" size="30" maxlength="11" value="<?php echo $master_circle_add->circleId->EditValue ?>"<?php echo $master_circle_add->circleId->editAttributes() ?>>
</span>
<?php echo $master_circle_add->circleId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_circle_add->circleName->Visible) { // circleName ?>
	<div id="r_circleName" class="form-group row">
		<label id="elh_master_circle_circleName" for="x_circleName" class="<?php echo $master_circle_add->LeftColumnClass ?>"><?php echo $master_circle_add->circleName->caption() ?><?php echo $master_circle_add->circleName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_circle_add->RightColumnClass ?>"><div <?php echo $master_circle_add->circleName->cellAttributes() ?>>
<span id="el_master_circle_circleName">
<input type="text" data-table="master_circle" data-field="x_circleName" name="x_circleName" id="x_circleName" size="30" maxlength="100" value="<?php echo $master_circle_add->circleName->EditValue ?>"<?php echo $master_circle_add->circleName->editAttributes() ?>>
</span>
<?php echo $master_circle_add->circleName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_circle_add->circleName_kn->Visible) { // circleName_kn ?>
	<div id="r_circleName_kn" class="form-group row">
		<label id="elh_master_circle_circleName_kn" for="x_circleName_kn" class="<?php echo $master_circle_add->LeftColumnClass ?>"><?php echo $master_circle_add->circleName_kn->caption() ?><?php echo $master_circle_add->circleName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_circle_add->RightColumnClass ?>"><div <?php echo $master_circle_add->circleName_kn->cellAttributes() ?>>
<span id="el_master_circle_circleName_kn">
<input type="text" data-table="master_circle" data-field="x_circleName_kn" name="x_circleName_kn" id="x_circleName_kn" size="30" maxlength="100" value="<?php echo $master_circle_add->circleName_kn->EditValue ?>"<?php echo $master_circle_add->circleName_kn->editAttributes() ?>>
</span>
<?php echo $master_circle_add->circleName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_circle_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_circle_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_circle_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_circle_add->showPageFooter();
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
$master_circle_add->terminate();
?>