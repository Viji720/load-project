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
$mst_ksndmc_station_add = new mst_ksndmc_station_add();

// Run the page
$mst_ksndmc_station_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mst_ksndmc_station_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmst_ksndmc_stationadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmst_ksndmc_stationadd = currentForm = new ew.Form("fmst_ksndmc_stationadd", "add");

	// Validate form
	fmst_ksndmc_stationadd.validate = function() {
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
			<?php if ($mst_ksndmc_station_add->Raingauge_id->Required) { ?>
				elm = this.getElements("x" + infix + "_Raingauge_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_ksndmc_station_add->Raingauge_id->caption(), $mst_ksndmc_station_add->Raingauge_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Raingauge_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mst_ksndmc_station_add->Raingauge_id->errorMessage()) ?>");
			<?php if ($mst_ksndmc_station_add->District_name->Required) { ?>
				elm = this.getElements("x" + infix + "_District_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_ksndmc_station_add->District_name->caption(), $mst_ksndmc_station_add->District_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_ksndmc_station_add->Taluka_name->Required) { ?>
				elm = this.getElements("x" + infix + "_Taluka_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_ksndmc_station_add->Taluka_name->caption(), $mst_ksndmc_station_add->Taluka_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_ksndmc_station_add->station_name->Required) { ?>
				elm = this.getElements("x" + infix + "_station_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_ksndmc_station_add->station_name->caption(), $mst_ksndmc_station_add->station_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mst_ksndmc_station_add->station_latitude->Required) { ?>
				elm = this.getElements("x" + infix + "_station_latitude");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_ksndmc_station_add->station_latitude->caption(), $mst_ksndmc_station_add->station_latitude->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_station_latitude");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mst_ksndmc_station_add->station_latitude->errorMessage()) ?>");
			<?php if ($mst_ksndmc_station_add->station_longitude->Required) { ?>
				elm = this.getElements("x" + infix + "_station_longitude");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mst_ksndmc_station_add->station_longitude->caption(), $mst_ksndmc_station_add->station_longitude->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_station_longitude");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mst_ksndmc_station_add->station_longitude->errorMessage()) ?>");

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
	fmst_ksndmc_stationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmst_ksndmc_stationadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmst_ksndmc_stationadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mst_ksndmc_station_add->showPageHeader(); ?>
<?php
$mst_ksndmc_station_add->showMessage();
?>
<form name="fmst_ksndmc_stationadd" id="fmst_ksndmc_stationadd" class="<?php echo $mst_ksndmc_station_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mst_ksndmc_station">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mst_ksndmc_station_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mst_ksndmc_station_add->Raingauge_id->Visible) { // Raingauge_id ?>
	<div id="r_Raingauge_id" class="form-group row">
		<label id="elh_mst_ksndmc_station_Raingauge_id" for="x_Raingauge_id" class="<?php echo $mst_ksndmc_station_add->LeftColumnClass ?>"><?php echo $mst_ksndmc_station_add->Raingauge_id->caption() ?><?php echo $mst_ksndmc_station_add->Raingauge_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_ksndmc_station_add->RightColumnClass ?>"><div <?php echo $mst_ksndmc_station_add->Raingauge_id->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_Raingauge_id">
<input type="text" data-table="mst_ksndmc_station" data-field="x_Raingauge_id" name="x_Raingauge_id" id="x_Raingauge_id" size="30" maxlength="11" value="<?php echo $mst_ksndmc_station_add->Raingauge_id->EditValue ?>"<?php echo $mst_ksndmc_station_add->Raingauge_id->editAttributes() ?>>
</span>
<?php echo $mst_ksndmc_station_add->Raingauge_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_ksndmc_station_add->District_name->Visible) { // District_name ?>
	<div id="r_District_name" class="form-group row">
		<label id="elh_mst_ksndmc_station_District_name" for="x_District_name" class="<?php echo $mst_ksndmc_station_add->LeftColumnClass ?>"><?php echo $mst_ksndmc_station_add->District_name->caption() ?><?php echo $mst_ksndmc_station_add->District_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_ksndmc_station_add->RightColumnClass ?>"><div <?php echo $mst_ksndmc_station_add->District_name->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_District_name">
<input type="text" data-table="mst_ksndmc_station" data-field="x_District_name" name="x_District_name" id="x_District_name" size="30" maxlength="50" value="<?php echo $mst_ksndmc_station_add->District_name->EditValue ?>"<?php echo $mst_ksndmc_station_add->District_name->editAttributes() ?>>
</span>
<?php echo $mst_ksndmc_station_add->District_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_ksndmc_station_add->Taluka_name->Visible) { // Taluka_name ?>
	<div id="r_Taluka_name" class="form-group row">
		<label id="elh_mst_ksndmc_station_Taluka_name" for="x_Taluka_name" class="<?php echo $mst_ksndmc_station_add->LeftColumnClass ?>"><?php echo $mst_ksndmc_station_add->Taluka_name->caption() ?><?php echo $mst_ksndmc_station_add->Taluka_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_ksndmc_station_add->RightColumnClass ?>"><div <?php echo $mst_ksndmc_station_add->Taluka_name->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_Taluka_name">
<input type="text" data-table="mst_ksndmc_station" data-field="x_Taluka_name" name="x_Taluka_name" id="x_Taluka_name" size="30" maxlength="50" value="<?php echo $mst_ksndmc_station_add->Taluka_name->EditValue ?>"<?php echo $mst_ksndmc_station_add->Taluka_name->editAttributes() ?>>
</span>
<?php echo $mst_ksndmc_station_add->Taluka_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_ksndmc_station_add->station_name->Visible) { // station_name ?>
	<div id="r_station_name" class="form-group row">
		<label id="elh_mst_ksndmc_station_station_name" for="x_station_name" class="<?php echo $mst_ksndmc_station_add->LeftColumnClass ?>"><?php echo $mst_ksndmc_station_add->station_name->caption() ?><?php echo $mst_ksndmc_station_add->station_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_ksndmc_station_add->RightColumnClass ?>"><div <?php echo $mst_ksndmc_station_add->station_name->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_station_name">
<input type="text" data-table="mst_ksndmc_station" data-field="x_station_name" name="x_station_name" id="x_station_name" size="30" maxlength="50" value="<?php echo $mst_ksndmc_station_add->station_name->EditValue ?>"<?php echo $mst_ksndmc_station_add->station_name->editAttributes() ?>>
</span>
<?php echo $mst_ksndmc_station_add->station_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_ksndmc_station_add->station_latitude->Visible) { // station_latitude ?>
	<div id="r_station_latitude" class="form-group row">
		<label id="elh_mst_ksndmc_station_station_latitude" for="x_station_latitude" class="<?php echo $mst_ksndmc_station_add->LeftColumnClass ?>"><?php echo $mst_ksndmc_station_add->station_latitude->caption() ?><?php echo $mst_ksndmc_station_add->station_latitude->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_ksndmc_station_add->RightColumnClass ?>"><div <?php echo $mst_ksndmc_station_add->station_latitude->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_station_latitude">
<input type="text" data-table="mst_ksndmc_station" data-field="x_station_latitude" name="x_station_latitude" id="x_station_latitude" size="30" maxlength="10" value="<?php echo $mst_ksndmc_station_add->station_latitude->EditValue ?>"<?php echo $mst_ksndmc_station_add->station_latitude->editAttributes() ?>>
</span>
<?php echo $mst_ksndmc_station_add->station_latitude->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mst_ksndmc_station_add->station_longitude->Visible) { // station_longitude ?>
	<div id="r_station_longitude" class="form-group row">
		<label id="elh_mst_ksndmc_station_station_longitude" for="x_station_longitude" class="<?php echo $mst_ksndmc_station_add->LeftColumnClass ?>"><?php echo $mst_ksndmc_station_add->station_longitude->caption() ?><?php echo $mst_ksndmc_station_add->station_longitude->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mst_ksndmc_station_add->RightColumnClass ?>"><div <?php echo $mst_ksndmc_station_add->station_longitude->cellAttributes() ?>>
<span id="el_mst_ksndmc_station_station_longitude">
<input type="text" data-table="mst_ksndmc_station" data-field="x_station_longitude" name="x_station_longitude" id="x_station_longitude" size="30" maxlength="10" value="<?php echo $mst_ksndmc_station_add->station_longitude->EditValue ?>"<?php echo $mst_ksndmc_station_add->station_longitude->editAttributes() ?>>
</span>
<?php echo $mst_ksndmc_station_add->station_longitude->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mst_ksndmc_station_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mst_ksndmc_station_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mst_ksndmc_station_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mst_ksndmc_station_add->showPageFooter();
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
$mst_ksndmc_station_add->terminate();
?>