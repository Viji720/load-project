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
$lkp_month_id_add = new lkp_month_id_add();

// Run the page
$lkp_month_id_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_month_id_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flkp_month_idadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	flkp_month_idadd = currentForm = new ew.Form("flkp_month_idadd", "add");

	// Validate form
	flkp_month_idadd.validate = function() {
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
			<?php if ($lkp_month_id_add->month_id->Required) { ?>
				elm = this.getElements("x" + infix + "_month_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_month_id_add->month_id->caption(), $lkp_month_id_add->month_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lkp_month_id_add->month_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_month_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lkp_month_id_add->month_Name->caption(), $lkp_month_id_add->month_Name->RequiredErrorMessage)) ?>");
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
	flkp_month_idadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flkp_month_idadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flkp_month_idadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lkp_month_id_add->showPageHeader(); ?>
<?php
$lkp_month_id_add->showMessage();
?>
<form name="flkp_month_idadd" id="flkp_month_idadd" class="<?php echo $lkp_month_id_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_month_id">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lkp_month_id_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lkp_month_id_add->month_id->Visible) { // month_id ?>
	<div id="r_month_id" class="form-group row">
		<label id="elh_lkp_month_id_month_id" for="x_month_id" class="<?php echo $lkp_month_id_add->LeftColumnClass ?>"><?php echo $lkp_month_id_add->month_id->caption() ?><?php echo $lkp_month_id_add->month_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_month_id_add->RightColumnClass ?>"><div <?php echo $lkp_month_id_add->month_id->cellAttributes() ?>>
<span id="el_lkp_month_id_month_id">
<input type="text" data-table="lkp_month_id" data-field="x_month_id" name="x_month_id" id="x_month_id" size="30" maxlength="2" value="<?php echo $lkp_month_id_add->month_id->EditValue ?>"<?php echo $lkp_month_id_add->month_id->editAttributes() ?>>
</span>
<?php echo $lkp_month_id_add->month_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lkp_month_id_add->month_Name->Visible) { // month_Name ?>
	<div id="r_month_Name" class="form-group row">
		<label id="elh_lkp_month_id_month_Name" for="x_month_Name" class="<?php echo $lkp_month_id_add->LeftColumnClass ?>"><?php echo $lkp_month_id_add->month_Name->caption() ?><?php echo $lkp_month_id_add->month_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lkp_month_id_add->RightColumnClass ?>"><div <?php echo $lkp_month_id_add->month_Name->cellAttributes() ?>>
<span id="el_lkp_month_id_month_Name">
<input type="text" data-table="lkp_month_id" data-field="x_month_Name" name="x_month_Name" id="x_month_Name" size="30" maxlength="10" value="<?php echo $lkp_month_id_add->month_Name->EditValue ?>"<?php echo $lkp_month_id_add->month_Name->editAttributes() ?>>
</span>
<?php echo $lkp_month_id_add->month_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lkp_month_id_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lkp_month_id_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lkp_month_id_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lkp_month_id_add->showPageFooter();
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
$lkp_month_id_add->terminate();
?>