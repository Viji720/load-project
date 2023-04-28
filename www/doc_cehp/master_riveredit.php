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
$master_river_edit = new master_river_edit();

// Run the page
$master_river_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_river_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_riveredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_riveredit = currentForm = new ew.Form("fmaster_riveredit", "edit");

	// Validate form
	fmaster_riveredit.validate = function() {
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
			<?php if ($master_river_edit->RiverId->Required) { ?>
				elm = this.getElements("x" + infix + "_RiverId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_river_edit->RiverId->caption(), $master_river_edit->RiverId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_river_edit->RiverName->Required) { ?>
				elm = this.getElements("x" + infix + "_RiverName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_river_edit->RiverName->caption(), $master_river_edit->RiverName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_river_edit->RiverName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_RiverName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_river_edit->RiverName_kn->caption(), $master_river_edit->RiverName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_river_edit->RiverName_hi->Required) { ?>
				elm = this.getElements("x" + infix + "_RiverName_hi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_river_edit->RiverName_hi->caption(), $master_river_edit->RiverName_hi->RequiredErrorMessage)) ?>");
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
	fmaster_riveredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_riveredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_riveredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_river_edit->showPageHeader(); ?>
<?php
$master_river_edit->showMessage();
?>
<form name="fmaster_riveredit" id="fmaster_riveredit" class="<?php echo $master_river_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_river">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_river_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_river_edit->RiverId->Visible) { // RiverId ?>
	<div id="r_RiverId" class="form-group row">
		<label id="elh_master_river_RiverId" class="<?php echo $master_river_edit->LeftColumnClass ?>"><?php echo $master_river_edit->RiverId->caption() ?><?php echo $master_river_edit->RiverId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_river_edit->RightColumnClass ?>"><div <?php echo $master_river_edit->RiverId->cellAttributes() ?>>
<span id="el_master_river_RiverId">
<span<?php echo $master_river_edit->RiverId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($master_river_edit->RiverId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="master_river" data-field="x_RiverId" name="x_RiverId" id="x_RiverId" value="<?php echo HtmlEncode($master_river_edit->RiverId->CurrentValue) ?>">
<?php echo $master_river_edit->RiverId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_river_edit->RiverName->Visible) { // RiverName ?>
	<div id="r_RiverName" class="form-group row">
		<label id="elh_master_river_RiverName" for="x_RiverName" class="<?php echo $master_river_edit->LeftColumnClass ?>"><?php echo $master_river_edit->RiverName->caption() ?><?php echo $master_river_edit->RiverName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_river_edit->RightColumnClass ?>"><div <?php echo $master_river_edit->RiverName->cellAttributes() ?>>
<span id="el_master_river_RiverName">
<input type="text" data-table="master_river" data-field="x_RiverName" name="x_RiverName" id="x_RiverName" size="30" maxlength="100" value="<?php echo $master_river_edit->RiverName->EditValue ?>"<?php echo $master_river_edit->RiverName->editAttributes() ?>>
</span>
<?php echo $master_river_edit->RiverName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_river_edit->RiverName_kn->Visible) { // RiverName_kn ?>
	<div id="r_RiverName_kn" class="form-group row">
		<label id="elh_master_river_RiverName_kn" for="x_RiverName_kn" class="<?php echo $master_river_edit->LeftColumnClass ?>"><?php echo $master_river_edit->RiverName_kn->caption() ?><?php echo $master_river_edit->RiverName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_river_edit->RightColumnClass ?>"><div <?php echo $master_river_edit->RiverName_kn->cellAttributes() ?>>
<span id="el_master_river_RiverName_kn">
<input type="text" data-table="master_river" data-field="x_RiverName_kn" name="x_RiverName_kn" id="x_RiverName_kn" size="30" maxlength="100" value="<?php echo $master_river_edit->RiverName_kn->EditValue ?>"<?php echo $master_river_edit->RiverName_kn->editAttributes() ?>>
</span>
<?php echo $master_river_edit->RiverName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_river_edit->RiverName_hi->Visible) { // RiverName_hi ?>
	<div id="r_RiverName_hi" class="form-group row">
		<label id="elh_master_river_RiverName_hi" for="x_RiverName_hi" class="<?php echo $master_river_edit->LeftColumnClass ?>"><?php echo $master_river_edit->RiverName_hi->caption() ?><?php echo $master_river_edit->RiverName_hi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_river_edit->RightColumnClass ?>"><div <?php echo $master_river_edit->RiverName_hi->cellAttributes() ?>>
<span id="el_master_river_RiverName_hi">
<input type="text" data-table="master_river" data-field="x_RiverName_hi" name="x_RiverName_hi" id="x_RiverName_hi" size="30" maxlength="100" value="<?php echo $master_river_edit->RiverName_hi->EditValue ?>"<?php echo $master_river_edit->RiverName_hi->editAttributes() ?>>
</span>
<?php echo $master_river_edit->RiverName_hi->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_river_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_river_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_river_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_river_edit->showPageFooter();
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
$master_river_edit->terminate();
?>