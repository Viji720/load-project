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
$master_station_add = new master_station_add();

// Run the page
$master_station_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_station_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_stationadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmaster_stationadd = currentForm = new ew.Form("fmaster_stationadd", "add");

	// Validate form
	fmaster_stationadd.validate = function() {
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
			<?php if ($master_station_add->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->SubDivisionId->caption(), $master_station_add->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_add->StationName->Required) { ?>
				elm = this.getElements("x" + infix + "_StationName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->StationName->caption(), $master_station_add->StationName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_add->StationName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_StationName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->StationName_kn->caption(), $master_station_add->StationName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_add->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->MobileNumber->caption(), $master_station_add->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_add->Longitude->Required) { ?>
				elm = this.getElements("x" + infix + "_Longitude");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->Longitude->caption(), $master_station_add->Longitude->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Longitude");
				if (elm && !ew.checkRange(elm.value, 74, 78.5000))
					return this.onError(elm, "<?php echo JsEncode($master_station_add->Longitude->errorMessage()) ?>");
			<?php if ($master_station_add->Latitude->Required) { ?>
				elm = this.getElements("x" + infix + "_Latitude");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->Latitude->caption(), $master_station_add->Latitude->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Latitude");
				if (elm && !ew.checkRange(elm.value, 11.5, 18.5))
					return this.onError(elm, "<?php echo JsEncode($master_station_add->Latitude->errorMessage()) ?>");
			<?php if ($master_station_add->station_type->Required) { ?>
				elm = this.getElements("x" + infix + "_station_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->station_type->caption(), $master_station_add->station_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_add->IsActive->Required) { ?>
				elm = this.getElements("x" + infix + "_IsActive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->IsActive->caption(), $master_station_add->IsActive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_add->last_active_date->Required) { ?>
				elm = this.getElements("x" + infix + "_last_active_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->last_active_date->caption(), $master_station_add->last_active_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_last_active_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_station_add->last_active_date->errorMessage()) ?>");
			<?php if ($master_station_add->PIC->Required) { ?>
				elm = this.getElements("x" + infix + "_PIC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->PIC->caption(), $master_station_add->PIC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_add->Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->Address->caption(), $master_station_add->Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_add->max_rainfall_date->Required) { ?>
				elm = this.getElements("x" + infix + "_max_rainfall_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->max_rainfall_date->caption(), $master_station_add->max_rainfall_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_max_rainfall_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_station_add->max_rainfall_date->errorMessage()) ?>");
			<?php if ($master_station_add->max_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_max_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_add->max_rainfall->caption(), $master_station_add->max_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_max_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_station_add->max_rainfall->errorMessage()) ?>");

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
	fmaster_stationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_stationadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Multi-Page
	fmaster_stationadd.multiPage = new ew.MultiPage("fmaster_stationadd");

	// Dynamic selection lists
	fmaster_stationadd.lists["x_SubDivisionId"] = <?php echo $master_station_add->SubDivisionId->Lookup->toClientList($master_station_add) ?>;
	fmaster_stationadd.lists["x_SubDivisionId"].options = <?php echo JsonEncode($master_station_add->SubDivisionId->lookupOptions()) ?>;
	fmaster_stationadd.lists["x_station_type"] = <?php echo $master_station_add->station_type->Lookup->toClientList($master_station_add) ?>;
	fmaster_stationadd.lists["x_station_type"].options = <?php echo JsonEncode($master_station_add->station_type->lookupOptions()) ?>;
	fmaster_stationadd.lists["x_IsActive"] = <?php echo $master_station_add->IsActive->Lookup->toClientList($master_station_add) ?>;
	fmaster_stationadd.lists["x_IsActive"].options = <?php echo JsonEncode($master_station_add->IsActive->options(FALSE, TRUE)) ?>;
	fmaster_stationadd.lists["x_PIC"] = <?php echo $master_station_add->PIC->Lookup->toClientList($master_station_add) ?>;
	fmaster_stationadd.lists["x_PIC"].options = <?php echo JsonEncode($master_station_add->PIC->lookupOptions()) ?>;
	loadjs.done("fmaster_stationadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_station_add->showPageHeader(); ?>
<?php
$master_station_add->showMessage();
?>
<form name="fmaster_stationadd" id="fmaster_stationadd" class="<?php echo $master_station_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_station">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$master_station_add->IsModal ?>">
<?php if ($master_station_add->MultiPages->Items[0]->Visible) { ?>
<div class="ew-add-div"><!-- page0 -->
<?php if ($master_station_add->StationName->Visible) { // StationName ?>
	<div id="r_StationName" class="form-group row">
		<label id="elh_master_station_StationName" for="x_StationName" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->StationName->caption() ?><?php echo $master_station_add->StationName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->StationName->cellAttributes() ?>>
<span id="el_master_station_StationName">
<input type="text" data-table="master_station" data-field="x_StationName" data-page="0" name="x_StationName" id="x_StationName" size="20" maxlength="50" value="<?php echo $master_station_add->StationName->EditValue ?>"<?php echo $master_station_add->StationName->editAttributes() ?>>
</span>
<?php echo $master_station_add->StationName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->StationName_kn->Visible) { // StationName_kn ?>
	<div id="r_StationName_kn" class="form-group row">
		<label id="elh_master_station_StationName_kn" for="x_StationName_kn" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->StationName_kn->caption() ?><?php echo $master_station_add->StationName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->StationName_kn->cellAttributes() ?>>
<span id="el_master_station_StationName_kn">
<input type="text" data-table="master_station" data-field="x_StationName_kn" data-page="0" name="x_StationName_kn" id="x_StationName_kn" size="20" maxlength="50" value="<?php echo $master_station_add->StationName_kn->EditValue ?>"<?php echo $master_station_add->StationName_kn->editAttributes() ?>>
</span>
<?php echo $master_station_add->StationName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_master_station_MobileNumber" for="x_MobileNumber" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->MobileNumber->caption() ?><?php echo $master_station_add->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->MobileNumber->cellAttributes() ?>>
<span id="el_master_station_MobileNumber">
<input type="text" data-table="master_station" data-field="x_MobileNumber" data-page="0" name="x_MobileNumber" id="x_MobileNumber" size="12" maxlength="12" value="<?php echo $master_station_add->MobileNumber->EditValue ?>"<?php echo $master_station_add->MobileNumber->editAttributes() ?>>
</span>
<?php echo $master_station_add->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page0 -->
<?php } ?>
<div class="ew-multi-page"><!-- multi-page -->
<div class="ew-nav-tabs" id="master_station_add"><!-- multi-page tabs -->
	<ul class="<?php echo $master_station_add->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $master_station_add->MultiPages->pageStyle(1) ?>" href="#tab_master_station1" data-toggle="tab"><?php echo $master_station->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $master_station_add->MultiPages->pageStyle(2) ?>" href="#tab_master_station2" data-toggle="tab"><?php echo $master_station->pageCaption(2) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $master_station_add->MultiPages->pageStyle(3) ?>" href="#tab_master_station3" data-toggle="tab"><?php echo $master_station->pageCaption(3) ?></a></li>
	</ul>
	<div class="tab-content"><!-- multi-page tabs .tab-content -->
		<div class="tab-pane<?php echo $master_station_add->MultiPages->pageStyle(1) ?>" id="tab_master_station1"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($master_station_add->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_master_station_SubDivisionId" for="x_SubDivisionId" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->SubDivisionId->caption() ?><?php echo $master_station_add->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->SubDivisionId->cellAttributes() ?>>
<span id="el_master_station_SubDivisionId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_SubDivisionId" data-page="1" data-value-separator="<?php echo $master_station_add->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x_SubDivisionId" name="x_SubDivisionId"<?php echo $master_station_add->SubDivisionId->editAttributes() ?>>
			<?php echo $master_station_add->SubDivisionId->selectOptionListHtml("x_SubDivisionId") ?>
		</select>
</div>
<?php echo $master_station_add->SubDivisionId->Lookup->getParamTag($master_station_add, "p_x_SubDivisionId") ?>
</span>
<?php echo $master_station_add->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->Longitude->Visible) { // Longitude ?>
	<div id="r_Longitude" class="form-group row">
		<label id="elh_master_station_Longitude" for="x_Longitude" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->Longitude->caption() ?><?php echo $master_station_add->Longitude->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->Longitude->cellAttributes() ?>>
<span id="el_master_station_Longitude">
<input type="text" data-table="master_station" data-field="x_Longitude" data-page="1" name="x_Longitude" id="x_Longitude" size="10" maxlength="8" value="<?php echo $master_station_add->Longitude->EditValue ?>"<?php echo $master_station_add->Longitude->editAttributes() ?>>
</span>
<?php echo $master_station_add->Longitude->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->Latitude->Visible) { // Latitude ?>
	<div id="r_Latitude" class="form-group row">
		<label id="elh_master_station_Latitude" for="x_Latitude" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->Latitude->caption() ?><?php echo $master_station_add->Latitude->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->Latitude->cellAttributes() ?>>
<span id="el_master_station_Latitude">
<input type="text" data-table="master_station" data-field="x_Latitude" data-page="1" name="x_Latitude" id="x_Latitude" size="8" maxlength="8" value="<?php echo $master_station_add->Latitude->EditValue ?>"<?php echo $master_station_add->Latitude->editAttributes() ?>>
</span>
<?php echo $master_station_add->Latitude->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->station_type->Visible) { // station_type ?>
	<div id="r_station_type" class="form-group row">
		<label id="elh_master_station_station_type" for="x_station_type" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->station_type->caption() ?><?php echo $master_station_add->station_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->station_type->cellAttributes() ?>>
<span id="el_master_station_station_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_station_type" data-page="1" data-value-separator="<?php echo $master_station_add->station_type->displayValueSeparatorAttribute() ?>" id="x_station_type" name="x_station_type"<?php echo $master_station_add->station_type->editAttributes() ?>>
			<?php echo $master_station_add->station_type->selectOptionListHtml("x_station_type") ?>
		</select>
</div>
<?php echo $master_station_add->station_type->Lookup->getParamTag($master_station_add, "p_x_station_type") ?>
</span>
<?php echo $master_station_add->station_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->IsActive->Visible) { // IsActive ?>
	<div id="r_IsActive" class="form-group row">
		<label id="elh_master_station_IsActive" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->IsActive->caption() ?><?php echo $master_station_add->IsActive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->IsActive->cellAttributes() ?>>
<span id="el_master_station_IsActive">
<div id="tp_x_IsActive" class="ew-template"><input type="radio" class="custom-control-input" data-table="master_station" data-field="x_IsActive" data-page="1" data-value-separator="<?php echo $master_station_add->IsActive->displayValueSeparatorAttribute() ?>" name="x_IsActive" id="x_IsActive" value="{value}"<?php echo $master_station_add->IsActive->editAttributes() ?>></div>
<div id="dsl_x_IsActive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $master_station_add->IsActive->radioButtonListHtml(FALSE, "x_IsActive", 1) ?>
</div></div>
</span>
<?php echo $master_station_add->IsActive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->last_active_date->Visible) { // last_active_date ?>
	<div id="r_last_active_date" class="form-group row">
		<label id="elh_master_station_last_active_date" for="x_last_active_date" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->last_active_date->caption() ?><?php echo $master_station_add->last_active_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->last_active_date->cellAttributes() ?>>
<span id="el_master_station_last_active_date">
<input type="text" data-table="master_station" data-field="x_last_active_date" data-page="1" data-format="7" name="x_last_active_date" id="x_last_active_date" maxlength="10" value="<?php echo $master_station_add->last_active_date->EditValue ?>"<?php echo $master_station_add->last_active_date->editAttributes() ?>>
<?php if (!$master_station_add->last_active_date->ReadOnly && !$master_station_add->last_active_date->Disabled && !isset($master_station_add->last_active_date->EditAttrs["readonly"]) && !isset($master_station_add->last_active_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmaster_stationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fmaster_stationadd", "x_last_active_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $master_station_add->last_active_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $master_station_add->MultiPages->pageStyle(2) ?>" id="tab_master_station2"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($master_station_add->PIC->Visible) { // PIC ?>
	<div id="r_PIC" class="form-group row">
		<label id="elh_master_station_PIC" for="x_PIC" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->PIC->caption() ?><?php echo $master_station_add->PIC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->PIC->cellAttributes() ?>>
<span id="el_master_station_PIC">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_PIC" data-page="2" data-value-separator="<?php echo $master_station_add->PIC->displayValueSeparatorAttribute() ?>" id="x_PIC" name="x_PIC"<?php echo $master_station_add->PIC->editAttributes() ?>>
			<?php echo $master_station_add->PIC->selectOptionListHtml("x_PIC") ?>
		</select>
</div>
<?php echo $master_station_add->PIC->Lookup->getParamTag($master_station_add, "p_x_PIC") ?>
</span>
<?php echo $master_station_add->PIC->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $master_station_add->MultiPages->pageStyle(3) ?>" id="tab_master_station3"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($master_station_add->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_master_station_Address" for="x_Address" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->Address->caption() ?><?php echo $master_station_add->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->Address->cellAttributes() ?>>
<span id="el_master_station_Address">
<textarea data-table="master_station" data-field="x_Address" data-page="3" name="x_Address" id="x_Address" cols="35" rows="4"<?php echo $master_station_add->Address->editAttributes() ?>><?php echo $master_station_add->Address->EditValue ?></textarea>
</span>
<?php echo $master_station_add->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->max_rainfall_date->Visible) { // max_rainfall_date ?>
	<div id="r_max_rainfall_date" class="form-group row">
		<label id="elh_master_station_max_rainfall_date" for="x_max_rainfall_date" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->max_rainfall_date->caption() ?><?php echo $master_station_add->max_rainfall_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->max_rainfall_date->cellAttributes() ?>>
<span id="el_master_station_max_rainfall_date">
<input type="text" data-table="master_station" data-field="x_max_rainfall_date" data-page="3" data-format="7" name="x_max_rainfall_date" id="x_max_rainfall_date" maxlength="10" value="<?php echo $master_station_add->max_rainfall_date->EditValue ?>"<?php echo $master_station_add->max_rainfall_date->editAttributes() ?>>
<?php if (!$master_station_add->max_rainfall_date->ReadOnly && !$master_station_add->max_rainfall_date->Disabled && !isset($master_station_add->max_rainfall_date->EditAttrs["readonly"]) && !isset($master_station_add->max_rainfall_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmaster_stationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fmaster_stationadd", "x_max_rainfall_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $master_station_add->max_rainfall_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_add->max_rainfall->Visible) { // max_rainfall ?>
	<div id="r_max_rainfall" class="form-group row">
		<label id="elh_master_station_max_rainfall" for="x_max_rainfall" class="<?php echo $master_station_add->LeftColumnClass ?>"><?php echo $master_station_add->max_rainfall->caption() ?><?php echo $master_station_add->max_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_add->RightColumnClass ?>"><div <?php echo $master_station_add->max_rainfall->cellAttributes() ?>>
<span id="el_master_station_max_rainfall">
<input type="text" data-table="master_station" data-field="x_max_rainfall" data-page="3" name="x_max_rainfall" id="x_max_rainfall" size="10" maxlength="10" value="<?php echo $master_station_add->max_rainfall->EditValue ?>"<?php echo $master_station_add->max_rainfall->editAttributes() ?>>
</span>
<?php echo $master_station_add->max_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
	</div><!-- /multi-page tabs .tab-content -->
</div><!-- /multi-page tabs -->
</div><!-- /multi-page -->
<?php if (!$master_station_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_station_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_station_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_station_add->showPageFooter();
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
$master_station_add->terminate();
?>