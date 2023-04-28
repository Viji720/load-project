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
$lkp_station_type_add = new lkp_station_type_add();

// Run the page
$lkp_station_type_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_station_type_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_station_typeadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	flkp_station_typeadd = currentForm = new ew.Form("flkp_station_typeadd", "add");

	// Validate form
	flkp_station_typeadd.validate = function() {
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
			<?php if ($lkp_station_type_add->station_type->Required) { ?>
				elm = this.getElements("x" + infix + "_station_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_station_type_add->station_type->caption(), $lkp_station_type_add->station_type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_station_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lkp_station_type_add->station_type->errorMessage()) ?>");
			<?php if ($lkp_station_type_add->station_type_name->Required) { ?>
				elm = this.getElements("x" + infix + "_station_type_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_station_type_add->station_type_name->caption(), $lkp_station_type_add->station_type_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_station_type_add->record_count->Required) { ?>
				elm = this.getElements("x" + infix + "_record_count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_station_type_add->record_count->caption(), $lkp_station_type_add->record_count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_record_count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lkp_station_type_add->record_count->errorMessage()) ?>");
			<?php if ($lkp_station_type_add->station_type_name_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_station_type_name_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_station_type_add->station_type_name_kn->caption(), $lkp_station_type_add->station_type_name_kn->RequiredErrorMessage)) ?>");
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
	flkp_station_typeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flkp_station_typeadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flkp_station_typeadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_station_type_add->showPageHeader(); ?>
<?php
$lkp_station_type_add->showMessage();
?>
<form name="flkp_station_typeadd" id="flkp_station_typeadd" class="<?php echo $lkp_station_type_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_station_type">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_station_type_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lkp_station_type_add->station_type->Visible) { // station_type ?>
	<div id="r_station_type" class="form-group row">
		<label id="elh_lkp_station_type_station_type" for="x_station_type" class="<?php echo $lkp_station_type_add->LeftColumnClass ?>"><?php echo $lkp_station_type_add->station_type->caption() ?><?php echo $lkp_station_type_add->station_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_station_type_add->RightColumnClass ?>"><div <?php echo $lkp_station_type_add->station_type->cellAttributes() ?>>
<span id="el_lkp_station_type_station_type">
<input type="text" data-table="lkp_station_type" data-field="x_station_type" name="x_station_type" id="x_station_type" size="30" maxlength="2" value="<?php echo $lkp_station_type_add->station_type->EditValue ?>"<?php echo $lkp_station_type_add->station_type->editAttributes() ?>>
</span>
<?php echo $lkp_station_type_add->station_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_station_type_add->station_type_name->Visible) { // station_type_name ?>
	<div id="r_station_type_name" class="form-group row">
		<label id="elh_lkp_station_type_station_type_name" for="x_station_type_name" class="<?php echo $lkp_station_type_add->LeftColumnClass ?>"><?php echo $lkp_station_type_add->station_type_name->caption() ?><?php echo $lkp_station_type_add->station_type_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_station_type_add->RightColumnClass ?>"><div <?php echo $lkp_station_type_add->station_type_name->cellAttributes() ?>>
<span id="el_lkp_station_type_station_type_name">
<input type="text" data-table="lkp_station_type" data-field="x_station_type_name" name="x_station_type_name" id="x_station_type_name" size="30" maxlength="50" value="<?php echo $lkp_station_type_add->station_type_name->EditValue ?>"<?php echo $lkp_station_type_add->station_type_name->editAttributes() ?>>
</span>
<?php echo $lkp_station_type_add->station_type_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_station_type_add->record_count->Visible) { // record_count ?>
	<div id="r_record_count" class="form-group row">
		<label id="elh_lkp_station_type_record_count" for="x_record_count" class="<?php echo $lkp_station_type_add->LeftColumnClass ?>"><?php echo $lkp_station_type_add->record_count->caption() ?><?php echo $lkp_station_type_add->record_count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_station_type_add->RightColumnClass ?>"><div <?php echo $lkp_station_type_add->record_count->cellAttributes() ?>>
<span id="el_lkp_station_type_record_count">
<input type="text" data-table="lkp_station_type" data-field="x_record_count" name="x_record_count" id="x_record_count" size="30" maxlength="11" value="<?php echo $lkp_station_type_add->record_count->EditValue ?>"<?php echo $lkp_station_type_add->record_count->editAttributes() ?>>
</span>
<?php echo $lkp_station_type_add->record_count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_station_type_add->station_type_name_kn->Visible) { // station_type_name_kn ?>
	<div id="r_station_type_name_kn" class="form-group row">
		<label id="elh_lkp_station_type_station_type_name_kn" for="x_station_type_name_kn" class="<?php echo $lkp_station_type_add->LeftColumnClass ?>"><?php echo $lkp_station_type_add->station_type_name_kn->caption() ?><?php echo $lkp_station_type_add->station_type_name_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_station_type_add->RightColumnClass ?>"><div <?php echo $lkp_station_type_add->station_type_name_kn->cellAttributes() ?>>
<span id="el_lkp_station_type_station_type_name_kn">
<input type="text" data-table="lkp_station_type" data-field="x_station_type_name_kn" name="x_station_type_name_kn" id="x_station_type_name_kn" size="30" maxlength="50" value="<?php echo $lkp_station_type_add->station_type_name_kn->EditValue ?>"<?php echo $lkp_station_type_add->station_type_name_kn->editAttributes() ?>>
</span>
<?php echo $lkp_station_type_add->station_type_name_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lkp_station_type_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lkp_station_type_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_station_type_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lkp_station_type_add->showPageFooter();
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
$lkp_station_type_add->terminate();
?>