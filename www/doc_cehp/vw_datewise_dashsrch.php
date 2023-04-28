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
$vw_datewise_dash_search = new vw_datewise_dash_search();

// Run the page
$vw_datewise_dash_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_datewise_dash_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fvw_datewise_dashsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($vw_datewise_dash_search->IsModal) { ?>
	fvw_datewise_dashsearch = currentAdvancedSearchForm = new ew.Form("fvw_datewise_dashsearch", "search");
	<?php } else { ?>
	fvw_datewise_dashsearch = currentForm = new ew.Form("fvw_datewise_dashsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fvw_datewise_dashsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_sms_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_datewise_dash_search->sms_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_percent_completed");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_datewise_dash_search->percent_completed->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_total_Verified");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_datewise_dash_search->total_Verified->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_total_CEHP_Created");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_datewise_dash_search->total_CEHP_Created->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_total_Auto_created");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_datewise_dash_search->total_Auto_created->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_total_status_3");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_datewise_dash_search->total_status_3->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_total_station");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_datewise_dash_search->total_station->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_datewise_dashsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_datewise_dashsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fvw_datewise_dashsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $vw_datewise_dash_search->showPageHeader(); ?>
<?php
$vw_datewise_dash_search->showMessage();
?>
<form name="fvw_datewise_dashsearch" id="fvw_datewise_dashsearch" class="<?php echo $vw_datewise_dash_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_datewise_dash">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$vw_datewise_dash_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($vw_datewise_dash_search->sms_date->Visible) { // sms_date ?>
	<div id="r_sms_date" class="form-group row">
		<label for="x_sms_date" class="<?php echo $vw_datewise_dash_search->LeftColumnClass ?>"><span id="elh_vw_datewise_dash_sms_date"><?php echo $vw_datewise_dash_search->sms_date->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_sms_date" id="z_sms_date" value="=">
</span>
		</label>
		<div class="<?php echo $vw_datewise_dash_search->RightColumnClass ?>"><div <?php echo $vw_datewise_dash_search->sms_date->cellAttributes() ?>>
			<span id="el_vw_datewise_dash_sms_date" class="ew-search-field">
<input type="text" data-table="vw_datewise_dash" data-field="x_sms_date" data-format="7" name="x_sms_date" id="x_sms_date" maxlength="10" value="<?php echo $vw_datewise_dash_search->sms_date->EditValue ?>"<?php echo $vw_datewise_dash_search->sms_date->editAttributes() ?>>
<?php if (!$vw_datewise_dash_search->sms_date->ReadOnly && !$vw_datewise_dash_search->sms_date->Disabled && !isset($vw_datewise_dash_search->sms_date->EditAttrs["readonly"]) && !isset($vw_datewise_dash_search->sms_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_datewise_dashsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_datewise_dashsearch", "x_sms_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($vw_datewise_dash_search->percent_completed->Visible) { // percent_completed ?>
	<div id="r_percent_completed" class="form-group row">
		<label for="x_percent_completed" class="<?php echo $vw_datewise_dash_search->LeftColumnClass ?>"><span id="elh_vw_datewise_dash_percent_completed"><?php echo $vw_datewise_dash_search->percent_completed->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_percent_completed" id="z_percent_completed" value="=">
</span>
		</label>
		<div class="<?php echo $vw_datewise_dash_search->RightColumnClass ?>"><div <?php echo $vw_datewise_dash_search->percent_completed->cellAttributes() ?>>
			<span id="el_vw_datewise_dash_percent_completed" class="ew-search-field">
<input type="text" data-table="vw_datewise_dash" data-field="x_percent_completed" name="x_percent_completed" id="x_percent_completed" size="30" maxlength="27" value="<?php echo $vw_datewise_dash_search->percent_completed->EditValue ?>"<?php echo $vw_datewise_dash_search->percent_completed->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($vw_datewise_dash_search->total_Verified->Visible) { // total_Verified ?>
	<div id="r_total_Verified" class="form-group row">
		<label for="x_total_Verified" class="<?php echo $vw_datewise_dash_search->LeftColumnClass ?>"><span id="elh_vw_datewise_dash_total_Verified"><?php echo $vw_datewise_dash_search->total_Verified->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_total_Verified" id="z_total_Verified" value="=">
</span>
		</label>
		<div class="<?php echo $vw_datewise_dash_search->RightColumnClass ?>"><div <?php echo $vw_datewise_dash_search->total_Verified->cellAttributes() ?>>
			<span id="el_vw_datewise_dash_total_Verified" class="ew-search-field">
<input type="text" data-table="vw_datewise_dash" data-field="x_total_Verified" name="x_total_Verified" id="x_total_Verified" size="30" maxlength="23" value="<?php echo $vw_datewise_dash_search->total_Verified->EditValue ?>"<?php echo $vw_datewise_dash_search->total_Verified->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($vw_datewise_dash_search->total_CEHP_Created->Visible) { // total_CEHP_Created ?>
	<div id="r_total_CEHP_Created" class="form-group row">
		<label for="x_total_CEHP_Created" class="<?php echo $vw_datewise_dash_search->LeftColumnClass ?>"><span id="elh_vw_datewise_dash_total_CEHP_Created"><?php echo $vw_datewise_dash_search->total_CEHP_Created->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_total_CEHP_Created" id="z_total_CEHP_Created" value="=">
</span>
		</label>
		<div class="<?php echo $vw_datewise_dash_search->RightColumnClass ?>"><div <?php echo $vw_datewise_dash_search->total_CEHP_Created->cellAttributes() ?>>
			<span id="el_vw_datewise_dash_total_CEHP_Created" class="ew-search-field">
<input type="text" data-table="vw_datewise_dash" data-field="x_total_CEHP_Created" name="x_total_CEHP_Created" id="x_total_CEHP_Created" size="30" maxlength="23" value="<?php echo $vw_datewise_dash_search->total_CEHP_Created->EditValue ?>"<?php echo $vw_datewise_dash_search->total_CEHP_Created->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($vw_datewise_dash_search->total_Auto_created->Visible) { // total_Auto_created ?>
	<div id="r_total_Auto_created" class="form-group row">
		<label for="x_total_Auto_created" class="<?php echo $vw_datewise_dash_search->LeftColumnClass ?>"><span id="elh_vw_datewise_dash_total_Auto_created"><?php echo $vw_datewise_dash_search->total_Auto_created->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_total_Auto_created" id="z_total_Auto_created" value="=">
</span>
		</label>
		<div class="<?php echo $vw_datewise_dash_search->RightColumnClass ?>"><div <?php echo $vw_datewise_dash_search->total_Auto_created->cellAttributes() ?>>
			<span id="el_vw_datewise_dash_total_Auto_created" class="ew-search-field">
<input type="text" data-table="vw_datewise_dash" data-field="x_total_Auto_created" name="x_total_Auto_created" id="x_total_Auto_created" size="30" maxlength="23" value="<?php echo $vw_datewise_dash_search->total_Auto_created->EditValue ?>"<?php echo $vw_datewise_dash_search->total_Auto_created->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($vw_datewise_dash_search->total_status_3->Visible) { // total_status_3 ?>
	<div id="r_total_status_3" class="form-group row">
		<label for="x_total_status_3" class="<?php echo $vw_datewise_dash_search->LeftColumnClass ?>"><span id="elh_vw_datewise_dash_total_status_3"><?php echo $vw_datewise_dash_search->total_status_3->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_total_status_3" id="z_total_status_3" value="=">
</span>
		</label>
		<div class="<?php echo $vw_datewise_dash_search->RightColumnClass ?>"><div <?php echo $vw_datewise_dash_search->total_status_3->cellAttributes() ?>>
			<span id="el_vw_datewise_dash_total_status_3" class="ew-search-field">
<input type="text" data-table="vw_datewise_dash" data-field="x_total_status_3" name="x_total_status_3" id="x_total_status_3" size="30" maxlength="23" value="<?php echo $vw_datewise_dash_search->total_status_3->EditValue ?>"<?php echo $vw_datewise_dash_search->total_status_3->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($vw_datewise_dash_search->total_station->Visible) { // total_station ?>
	<div id="r_total_station" class="form-group row">
		<label for="x_total_station" class="<?php echo $vw_datewise_dash_search->LeftColumnClass ?>"><span id="elh_vw_datewise_dash_total_station"><?php echo $vw_datewise_dash_search->total_station->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_total_station" id="z_total_station" value="=">
</span>
		</label>
		<div class="<?php echo $vw_datewise_dash_search->RightColumnClass ?>"><div <?php echo $vw_datewise_dash_search->total_station->cellAttributes() ?>>
			<span id="el_vw_datewise_dash_total_station" class="ew-search-field">
<input type="text" data-table="vw_datewise_dash" data-field="x_total_station" name="x_total_station" id="x_total_station" size="30" maxlength="21" value="<?php echo $vw_datewise_dash_search->total_station->EditValue ?>"<?php echo $vw_datewise_dash_search->total_station->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$vw_datewise_dash_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $vw_datewise_dash_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$vw_datewise_dash_search->showPageFooter();
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
$vw_datewise_dash_search->terminate();
?>