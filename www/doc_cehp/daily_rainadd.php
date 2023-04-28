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
$daily_rain_add = new daily_rain_add();

// Run the page
$daily_rain_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$daily_rain_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdaily_rainadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fdaily_rainadd = currentForm = new ew.Form("fdaily_rainadd", "add");

	// Validate form
	fdaily_rainadd.validate = function() {
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
			<?php if ($daily_rain_add->Obs_Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Obs_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $daily_rain_add->Obs_Date->caption(), $daily_rain_add->Obs_Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Obs_Date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($daily_rain_add->Obs_Date->errorMessage()) ?>");
			<?php if ($daily_rain_add->RAINFALL_STATION_NAME->Required) { ?>
				elm = this.getElements("x" + infix + "_RAINFALL_STATION_NAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $daily_rain_add->RAINFALL_STATION_NAME->caption(), $daily_rain_add->RAINFALL_STATION_NAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($daily_rain_add->Rainfall_in_mm->Required) { ?>
				elm = this.getElements("x" + infix + "_Rainfall_in_mm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $daily_rain_add->Rainfall_in_mm->caption(), $daily_rain_add->Rainfall_in_mm->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Rainfall_in_mm");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($daily_rain_add->Rainfall_in_mm->errorMessage()) ?>");
			<?php if ($daily_rain_add->file_name->Required) { ?>
				elm = this.getElements("x" + infix + "_file_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $daily_rain_add->file_name->caption(), $daily_rain_add->file_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($daily_rain_add->source_id->Required) { ?>
				elm = this.getElements("x" + infix + "_source_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $daily_rain_add->source_id->caption(), $daily_rain_add->source_id->RequiredErrorMessage)) ?>");
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
	fdaily_rainadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdaily_rainadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fdaily_rainadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $daily_rain_add->showPageHeader(); ?>
<?php
$daily_rain_add->showMessage();
?>
<form name="fdaily_rainadd" id="fdaily_rainadd" class="<?php echo $daily_rain_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="daily_rain">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$daily_rain_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($daily_rain_add->Obs_Date->Visible) { // Obs_Date ?>
	<div id="r_Obs_Date" class="form-group row">
		<label id="elh_daily_rain_Obs_Date" for="x_Obs_Date" class="<?php echo $daily_rain_add->LeftColumnClass ?>"><?php echo $daily_rain_add->Obs_Date->caption() ?><?php echo $daily_rain_add->Obs_Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $daily_rain_add->RightColumnClass ?>"><div <?php echo $daily_rain_add->Obs_Date->cellAttributes() ?>>
<span id="el_daily_rain_Obs_Date">
<input type="text" data-table="daily_rain" data-field="x_Obs_Date" data-format="7" name="x_Obs_Date" id="x_Obs_Date" maxlength="10" value="<?php echo $daily_rain_add->Obs_Date->EditValue ?>"<?php echo $daily_rain_add->Obs_Date->editAttributes() ?>>
<?php if (!$daily_rain_add->Obs_Date->ReadOnly && !$daily_rain_add->Obs_Date->Disabled && !isset($daily_rain_add->Obs_Date->EditAttrs["readonly"]) && !isset($daily_rain_add->Obs_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdaily_rainadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fdaily_rainadd", "x_Obs_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $daily_rain_add->Obs_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($daily_rain_add->RAINFALL_STATION_NAME->Visible) { // RAINFALL_STATION_NAME ?>
	<div id="r_RAINFALL_STATION_NAME" class="form-group row">
		<label id="elh_daily_rain_RAINFALL_STATION_NAME" for="x_RAINFALL_STATION_NAME" class="<?php echo $daily_rain_add->LeftColumnClass ?>"><?php echo $daily_rain_add->RAINFALL_STATION_NAME->caption() ?><?php echo $daily_rain_add->RAINFALL_STATION_NAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $daily_rain_add->RightColumnClass ?>"><div <?php echo $daily_rain_add->RAINFALL_STATION_NAME->cellAttributes() ?>>
<span id="el_daily_rain_RAINFALL_STATION_NAME">
<input type="text" data-table="daily_rain" data-field="x_RAINFALL_STATION_NAME" name="x_RAINFALL_STATION_NAME" id="x_RAINFALL_STATION_NAME" size="30" maxlength="100" value="<?php echo $daily_rain_add->RAINFALL_STATION_NAME->EditValue ?>"<?php echo $daily_rain_add->RAINFALL_STATION_NAME->editAttributes() ?>>
</span>
<?php echo $daily_rain_add->RAINFALL_STATION_NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($daily_rain_add->Rainfall_in_mm->Visible) { // Rainfall_in_mm ?>
	<div id="r_Rainfall_in_mm" class="form-group row">
		<label id="elh_daily_rain_Rainfall_in_mm" for="x_Rainfall_in_mm" class="<?php echo $daily_rain_add->LeftColumnClass ?>"><?php echo $daily_rain_add->Rainfall_in_mm->caption() ?><?php echo $daily_rain_add->Rainfall_in_mm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $daily_rain_add->RightColumnClass ?>"><div <?php echo $daily_rain_add->Rainfall_in_mm->cellAttributes() ?>>
<span id="el_daily_rain_Rainfall_in_mm">
<input type="text" data-table="daily_rain" data-field="x_Rainfall_in_mm" name="x_Rainfall_in_mm" id="x_Rainfall_in_mm" size="30" maxlength="6" value="<?php echo $daily_rain_add->Rainfall_in_mm->EditValue ?>"<?php echo $daily_rain_add->Rainfall_in_mm->editAttributes() ?>>
</span>
<?php echo $daily_rain_add->Rainfall_in_mm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($daily_rain_add->file_name->Visible) { // file_name ?>
	<div id="r_file_name" class="form-group row">
		<label id="elh_daily_rain_file_name" for="x_file_name" class="<?php echo $daily_rain_add->LeftColumnClass ?>"><?php echo $daily_rain_add->file_name->caption() ?><?php echo $daily_rain_add->file_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $daily_rain_add->RightColumnClass ?>"><div <?php echo $daily_rain_add->file_name->cellAttributes() ?>>
<span id="el_daily_rain_file_name">
<input type="text" data-table="daily_rain" data-field="x_file_name" name="x_file_name" id="x_file_name" size="30" maxlength="100" value="<?php echo $daily_rain_add->file_name->EditValue ?>"<?php echo $daily_rain_add->file_name->editAttributes() ?>>
</span>
<?php echo $daily_rain_add->file_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($daily_rain_add->source_id->Visible) { // source_id ?>
	<div id="r_source_id" class="form-group row">
		<label id="elh_daily_rain_source_id" for="x_source_id" class="<?php echo $daily_rain_add->LeftColumnClass ?>"><?php echo $daily_rain_add->source_id->caption() ?><?php echo $daily_rain_add->source_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $daily_rain_add->RightColumnClass ?>"><div <?php echo $daily_rain_add->source_id->cellAttributes() ?>>
<span id="el_daily_rain_source_id">
<input type="text" data-table="daily_rain" data-field="x_source_id" name="x_source_id" id="x_source_id" size="30" maxlength="2" value="<?php echo $daily_rain_add->source_id->EditValue ?>"<?php echo $daily_rain_add->source_id->editAttributes() ?>>
</span>
<?php echo $daily_rain_add->source_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$daily_rain_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $daily_rain_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $daily_rain_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$daily_rain_add->showPageFooter();
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
$daily_rain_add->terminate();
?>