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
$lkp_obs_status_edit = new lkp_obs_status_edit();

// Run the page
$lkp_obs_status_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_obs_status_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_obs_statusedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	flkp_obs_statusedit = currentForm = new ew.Form("flkp_obs_statusedit", "edit");

	// Validate form
	flkp_obs_statusedit.validate = function() {
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
			<?php if ($lkp_obs_status_edit->obs_Status->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_obs_status_edit->obs_Status->caption(), $lkp_obs_status_edit->obs_Status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_obs_Status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lkp_obs_status_edit->obs_Status->errorMessage()) ?>");
			<?php if ($lkp_obs_status_edit->obs_StatusName->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_StatusName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_obs_status_edit->obs_StatusName->caption(), $lkp_obs_status_edit->obs_StatusName->RequiredErrorMessage)) ?>");
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
	flkp_obs_statusedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flkp_obs_statusedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flkp_obs_statusedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_obs_status_edit->showPageHeader(); ?>
<?php
$lkp_obs_status_edit->showMessage();
?>
<form name="flkp_obs_statusedit" id="flkp_obs_statusedit" class="<?php echo $lkp_obs_status_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_obs_status">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_obs_status_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lkp_obs_status_edit->obs_Status->Visible) { // obs_Status ?>
	<div id="r_obs_Status" class="form-group row">
		<label id="elh_lkp_obs_status_obs_Status" for="x_obs_Status" class="<?php echo $lkp_obs_status_edit->LeftColumnClass ?>"><?php echo $lkp_obs_status_edit->obs_Status->caption() ?><?php echo $lkp_obs_status_edit->obs_Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_obs_status_edit->RightColumnClass ?>"><div <?php echo $lkp_obs_status_edit->obs_Status->cellAttributes() ?>>
<input type="text" data-table="lkp_obs_status" data-field="x_obs_Status" name="x_obs_Status" id="x_obs_Status" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($lkp_obs_status_edit->obs_Status->getPlaceHolder()) ?>" value="<?php echo $lkp_obs_status_edit->obs_Status->EditValue ?>"<?php echo $lkp_obs_status_edit->obs_Status->editAttributes() ?>>
<input type="hidden" data-table="lkp_obs_status" data-field="x_obs_Status" name="o_obs_Status" id="o_obs_Status" value="<?php echo HtmlEncode($lkp_obs_status_edit->obs_Status->OldValue != null ? $lkp_obs_status_edit->obs_Status->OldValue : $lkp_obs_status_edit->obs_Status->CurrentValue) ?>">
<?php echo $lkp_obs_status_edit->obs_Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_obs_status_edit->obs_StatusName->Visible) { // obs_StatusName ?>
	<div id="r_obs_StatusName" class="form-group row">
		<label id="elh_lkp_obs_status_obs_StatusName" for="x_obs_StatusName" class="<?php echo $lkp_obs_status_edit->LeftColumnClass ?>"><?php echo $lkp_obs_status_edit->obs_StatusName->caption() ?><?php echo $lkp_obs_status_edit->obs_StatusName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_obs_status_edit->RightColumnClass ?>"><div <?php echo $lkp_obs_status_edit->obs_StatusName->cellAttributes() ?>>
<span id="el_lkp_obs_status_obs_StatusName">
<input type="text" data-table="lkp_obs_status" data-field="x_obs_StatusName" name="x_obs_StatusName" id="x_obs_StatusName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lkp_obs_status_edit->obs_StatusName->getPlaceHolder()) ?>" value="<?php echo $lkp_obs_status_edit->obs_StatusName->EditValue ?>"<?php echo $lkp_obs_status_edit->obs_StatusName->editAttributes() ?>>
</span>
<?php echo $lkp_obs_status_edit->obs_StatusName->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lkp_obs_status_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lkp_obs_status_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_obs_status_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lkp_obs_status_edit->showPageFooter();
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
$lkp_obs_status_edit->terminate();
?>