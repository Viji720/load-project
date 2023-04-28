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
$master_circle_edit = new master_circle_edit();

// Run the page
$master_circle_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_circle_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_circleedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_circleedit = currentForm = new ew.Form("fmaster_circleedit", "edit");

	// Validate form
	fmaster_circleedit.validate = function() {
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
			<?php if ($master_circle_edit->circleId->Required) { ?>
				elm = this.getElements("x" + infix + "_circleId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_circle_edit->circleId->caption(), $master_circle_edit->circleId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_circleId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_circle_edit->circleId->errorMessage()) ?>");
			<?php if ($master_circle_edit->circleName->Required) { ?>
				elm = this.getElements("x" + infix + "_circleName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_circle_edit->circleName->caption(), $master_circle_edit->circleName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_circle_edit->circleName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_circleName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_circle_edit->circleName_kn->caption(), $master_circle_edit->circleName_kn->RequiredErrorMessage)) ?>");
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
	fmaster_circleedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_circleedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_circleedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_circle_edit->showPageHeader(); ?>
<?php
$master_circle_edit->showMessage();
?>
<form name="fmaster_circleedit" id="fmaster_circleedit" class="<?php echo $master_circle_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_circle">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_circle_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_circle_edit->circleId->Visible) { // circleId ?>
	<div id="r_circleId" class="form-group row">
		<label id="elh_master_circle_circleId" for="x_circleId" class="<?php echo $master_circle_edit->LeftColumnClass ?>"><?php echo $master_circle_edit->circleId->caption() ?><?php echo $master_circle_edit->circleId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_circle_edit->RightColumnClass ?>"><div <?php echo $master_circle_edit->circleId->cellAttributes() ?>>
<input type="text" data-table="master_circle" data-field="x_circleId" name="x_circleId" id="x_circleId" size="30" maxlength="11" value="<?php echo $master_circle_edit->circleId->EditValue ?>"<?php echo $master_circle_edit->circleId->editAttributes() ?>>
<input type="hidden" data-table="master_circle" data-field="x_circleId" name="o_circleId" id="o_circleId" value="<?php echo HtmlEncode($master_circle_edit->circleId->OldValue != null ? $master_circle_edit->circleId->OldValue : $master_circle_edit->circleId->CurrentValue) ?>">
<?php echo $master_circle_edit->circleId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_circle_edit->circleName->Visible) { // circleName ?>
	<div id="r_circleName" class="form-group row">
		<label id="elh_master_circle_circleName" for="x_circleName" class="<?php echo $master_circle_edit->LeftColumnClass ?>"><?php echo $master_circle_edit->circleName->caption() ?><?php echo $master_circle_edit->circleName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_circle_edit->RightColumnClass ?>"><div <?php echo $master_circle_edit->circleName->cellAttributes() ?>>
<span id="el_master_circle_circleName">
<input type="text" data-table="master_circle" data-field="x_circleName" name="x_circleName" id="x_circleName" size="30" maxlength="100" value="<?php echo $master_circle_edit->circleName->EditValue ?>"<?php echo $master_circle_edit->circleName->editAttributes() ?>>
</span>
<?php echo $master_circle_edit->circleName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_circle_edit->circleName_kn->Visible) { // circleName_kn ?>
	<div id="r_circleName_kn" class="form-group row">
		<label id="elh_master_circle_circleName_kn" for="x_circleName_kn" class="<?php echo $master_circle_edit->LeftColumnClass ?>"><?php echo $master_circle_edit->circleName_kn->caption() ?><?php echo $master_circle_edit->circleName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_circle_edit->RightColumnClass ?>"><div <?php echo $master_circle_edit->circleName_kn->cellAttributes() ?>>
<span id="el_master_circle_circleName_kn">
<input type="text" data-table="master_circle" data-field="x_circleName_kn" name="x_circleName_kn" id="x_circleName_kn" size="30" maxlength="100" value="<?php echo $master_circle_edit->circleName_kn->EditValue ?>"<?php echo $master_circle_edit->circleName_kn->editAttributes() ?>>
</span>
<?php echo $master_circle_edit->circleName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_circle_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_circle_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_circle_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_circle_edit->showPageFooter();
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
$master_circle_edit->terminate();
?>