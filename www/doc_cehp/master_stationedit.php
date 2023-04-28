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
$master_station_edit = new master_station_edit();

// Run the page
$master_station_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_station_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_stationedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_stationedit = currentForm = new ew.Form("fmaster_stationedit", "edit");

	// Validate form
	fmaster_stationedit.validate = function() {
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
			<?php if ($master_station_edit->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->SubDivisionId->caption(), $master_station_edit->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->StationName->Required) { ?>
				elm = this.getElements("x" + infix + "_StationName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->StationName->caption(), $master_station_edit->StationName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->StationName_kn->Required) { ?>
				elm = this.getElements("x" + infix + "_StationName_kn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->StationName_kn->caption(), $master_station_edit->StationName_kn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->MobileNumber->caption(), $master_station_edit->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->Longitude->Required) { ?>
				elm = this.getElements("x" + infix + "_Longitude");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->Longitude->caption(), $master_station_edit->Longitude->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Longitude");
				if (elm && !ew.checkRange(elm.value, 74, 78.5000))
					return this.onError(elm, "<?php echo JsEncode($master_station_edit->Longitude->errorMessage()) ?>");
			<?php if ($master_station_edit->Latitude->Required) { ?>
				elm = this.getElements("x" + infix + "_Latitude");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->Latitude->caption(), $master_station_edit->Latitude->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Latitude");
				if (elm && !ew.checkRange(elm.value, 11.5, 18.5))
					return this.onError(elm, "<?php echo JsEncode($master_station_edit->Latitude->errorMessage()) ?>");
			<?php if ($master_station_edit->Altitude_MSL_in_mtrs->Required) { ?>
				elm = this.getElements("x" + infix + "_Altitude_MSL_in_mtrs");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->Altitude_MSL_in_mtrs->caption(), $master_station_edit->Altitude_MSL_in_mtrs->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Altitude_MSL_in_mtrs");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_station_edit->Altitude_MSL_in_mtrs->errorMessage()) ?>");
			<?php if ($master_station_edit->station_type->Required) { ?>
				elm = this.getElements("x" + infix + "_station_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->station_type->caption(), $master_station_edit->station_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->IsActive->Required) { ?>
				elm = this.getElements("x" + infix + "_IsActive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->IsActive->caption(), $master_station_edit->IsActive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->last_active_date->Required) { ?>
				elm = this.getElements("x" + infix + "_last_active_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->last_active_date->caption(), $master_station_edit->last_active_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_last_active_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_station_edit->last_active_date->errorMessage()) ?>");
			<?php if ($master_station_edit->CatchUpId->Required) { ?>
				elm = this.getElements("x" + infix + "_CatchUpId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->CatchUpId->caption(), $master_station_edit->CatchUpId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->PIC->Required) { ?>
				elm = this.getElements("x" + infix + "_PIC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->PIC->caption(), $master_station_edit->PIC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->RiverId->Required) { ?>
				elm = this.getElements("x" + infix + "_RiverId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->RiverId->caption(), $master_station_edit->RiverId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->Address->caption(), $master_station_edit->Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->max_rainfall_date->Required) { ?>
				elm = this.getElements("x" + infix + "_max_rainfall_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->max_rainfall_date->caption(), $master_station_edit->max_rainfall_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->max_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_max_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->max_rainfall->caption(), $master_station_edit->max_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->last_reading_date->Required) { ?>
				elm = this.getElements("x" + infix + "_last_reading_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->last_reading_date->caption(), $master_station_edit->last_reading_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->first_reading_date->Required) { ?>
				elm = this.getElements("x" + infix + "_first_reading_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->first_reading_date->caption(), $master_station_edit->first_reading_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->no_of_manual_entry->Required) { ?>
				elm = this.getElements("x" + infix + "_no_of_manual_entry");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->no_of_manual_entry->caption(), $master_station_edit->no_of_manual_entry->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_station_edit->no_of_sms->Required) { ?>
				elm = this.getElements("x" + infix + "_no_of_sms");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_station_edit->no_of_sms->caption(), $master_station_edit->no_of_sms->RequiredErrorMessage)) ?>");
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
	fmaster_stationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_stationedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Multi-Page
	fmaster_stationedit.multiPage = new ew.MultiPage("fmaster_stationedit");

	// Dynamic selection lists
	fmaster_stationedit.lists["x_SubDivisionId"] = <?php echo $master_station_edit->SubDivisionId->Lookup->toClientList($master_station_edit) ?>;
	fmaster_stationedit.lists["x_SubDivisionId"].options = <?php echo JsonEncode($master_station_edit->SubDivisionId->lookupOptions()) ?>;
	fmaster_stationedit.lists["x_station_type"] = <?php echo $master_station_edit->station_type->Lookup->toClientList($master_station_edit) ?>;
	fmaster_stationedit.lists["x_station_type"].options = <?php echo JsonEncode($master_station_edit->station_type->lookupOptions()) ?>;
	fmaster_stationedit.lists["x_IsActive"] = <?php echo $master_station_edit->IsActive->Lookup->toClientList($master_station_edit) ?>;
	fmaster_stationedit.lists["x_IsActive"].options = <?php echo JsonEncode($master_station_edit->IsActive->options(FALSE, TRUE)) ?>;
	fmaster_stationedit.lists["x_CatchUpId"] = <?php echo $master_station_edit->CatchUpId->Lookup->toClientList($master_station_edit) ?>;
	fmaster_stationedit.lists["x_CatchUpId"].options = <?php echo JsonEncode($master_station_edit->CatchUpId->lookupOptions()) ?>;
	fmaster_stationedit.lists["x_PIC"] = <?php echo $master_station_edit->PIC->Lookup->toClientList($master_station_edit) ?>;
	fmaster_stationedit.lists["x_PIC"].options = <?php echo JsonEncode($master_station_edit->PIC->lookupOptions()) ?>;
	fmaster_stationedit.lists["x_RiverId"] = <?php echo $master_station_edit->RiverId->Lookup->toClientList($master_station_edit) ?>;
	fmaster_stationedit.lists["x_RiverId"].options = <?php echo JsonEncode($master_station_edit->RiverId->lookupOptions()) ?>;
	loadjs.done("fmaster_stationedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_station_edit->showPageHeader(); ?>
<?php
$master_station_edit->showMessage();
?>
<form name="fmaster_stationedit" id="fmaster_stationedit" class="<?php echo $master_station_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_station">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_station_edit->IsModal ?>">
<?php if ($master_station_edit->MultiPages->Items[0]->Visible) { ?>
<div class="ew-edit-div"><!-- page0 -->
<?php if ($master_station_edit->StationName->Visible) { // StationName ?>
	<div id="r_StationName" class="form-group row">
		<label id="elh_master_station_StationName" for="x_StationName" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->StationName->caption() ?><?php echo $master_station_edit->StationName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->StationName->cellAttributes() ?>>
<span id="el_master_station_StationName">
<input type="text" data-table="master_station" data-field="x_StationName" data-page="0" name="x_StationName" id="x_StationName" size="20" maxlength="50" value="<?php echo $master_station_edit->StationName->EditValue ?>"<?php echo $master_station_edit->StationName->editAttributes() ?>>
</span>
<?php echo $master_station_edit->StationName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->StationName_kn->Visible) { // StationName_kn ?>
	<div id="r_StationName_kn" class="form-group row">
		<label id="elh_master_station_StationName_kn" for="x_StationName_kn" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->StationName_kn->caption() ?><?php echo $master_station_edit->StationName_kn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->StationName_kn->cellAttributes() ?>>
<span id="el_master_station_StationName_kn">
<input type="text" data-table="master_station" data-field="x_StationName_kn" data-page="0" name="x_StationName_kn" id="x_StationName_kn" size="20" maxlength="50" value="<?php echo $master_station_edit->StationName_kn->EditValue ?>"<?php echo $master_station_edit->StationName_kn->editAttributes() ?>>
</span>
<?php echo $master_station_edit->StationName_kn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_master_station_MobileNumber" for="x_MobileNumber" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->MobileNumber->caption() ?><?php echo $master_station_edit->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->MobileNumber->cellAttributes() ?>>
<span id="el_master_station_MobileNumber">
<input type="text" data-table="master_station" data-field="x_MobileNumber" data-page="0" name="x_MobileNumber" id="x_MobileNumber" size="12" maxlength="12" value="<?php echo $master_station_edit->MobileNumber->EditValue ?>"<?php echo $master_station_edit->MobileNumber->editAttributes() ?>>
</span>
<?php echo $master_station_edit->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page0 -->
<?php } ?>
<div class="ew-multi-page"><!-- multi-page -->
<div class="ew-nav-tabs" id="master_station_edit"><!-- multi-page tabs -->
	<ul class="<?php echo $master_station_edit->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $master_station_edit->MultiPages->pageStyle(1) ?>" href="#tab_master_station1" data-toggle="tab"><?php echo $master_station->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $master_station_edit->MultiPages->pageStyle(2) ?>" href="#tab_master_station2" data-toggle="tab"><?php echo $master_station->pageCaption(2) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $master_station_edit->MultiPages->pageStyle(3) ?>" href="#tab_master_station3" data-toggle="tab"><?php echo $master_station->pageCaption(3) ?></a></li>
	</ul>
	<div class="tab-content"><!-- multi-page tabs .tab-content -->
		<div class="tab-pane<?php echo $master_station_edit->MultiPages->pageStyle(1) ?>" id="tab_master_station1"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_station_edit->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_master_station_SubDivisionId" for="x_SubDivisionId" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->SubDivisionId->caption() ?><?php echo $master_station_edit->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->SubDivisionId->cellAttributes() ?>>
<span id="el_master_station_SubDivisionId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_SubDivisionId" data-page="1" data-value-separator="<?php echo $master_station_edit->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x_SubDivisionId" name="x_SubDivisionId"<?php echo $master_station_edit->SubDivisionId->editAttributes() ?>>
			<?php echo $master_station_edit->SubDivisionId->selectOptionListHtml("x_SubDivisionId") ?>
		</select>
</div>
<?php echo $master_station_edit->SubDivisionId->Lookup->getParamTag($master_station_edit, "p_x_SubDivisionId") ?>
</span>
<?php echo $master_station_edit->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->Longitude->Visible) { // Longitude ?>
	<div id="r_Longitude" class="form-group row">
		<label id="elh_master_station_Longitude" for="x_Longitude" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->Longitude->caption() ?><?php echo $master_station_edit->Longitude->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->Longitude->cellAttributes() ?>>
<span id="el_master_station_Longitude">
<input type="text" data-table="master_station" data-field="x_Longitude" data-page="1" name="x_Longitude" id="x_Longitude" size="10" maxlength="8" value="<?php echo $master_station_edit->Longitude->EditValue ?>"<?php echo $master_station_edit->Longitude->editAttributes() ?>>
</span>
<?php echo $master_station_edit->Longitude->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->Latitude->Visible) { // Latitude ?>
	<div id="r_Latitude" class="form-group row">
		<label id="elh_master_station_Latitude" for="x_Latitude" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->Latitude->caption() ?><?php echo $master_station_edit->Latitude->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->Latitude->cellAttributes() ?>>
<span id="el_master_station_Latitude">
<input type="text" data-table="master_station" data-field="x_Latitude" data-page="1" name="x_Latitude" id="x_Latitude" size="8" maxlength="8" value="<?php echo $master_station_edit->Latitude->EditValue ?>"<?php echo $master_station_edit->Latitude->editAttributes() ?>>
</span>
<?php echo $master_station_edit->Latitude->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->Altitude_MSL_in_mtrs->Visible) { // Altitude_MSL_in_mtrs ?>
	<div id="r_Altitude_MSL_in_mtrs" class="form-group row">
		<label id="elh_master_station_Altitude_MSL_in_mtrs" for="x_Altitude_MSL_in_mtrs" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->Altitude_MSL_in_mtrs->caption() ?><?php echo $master_station_edit->Altitude_MSL_in_mtrs->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->Altitude_MSL_in_mtrs->cellAttributes() ?>>
<span id="el_master_station_Altitude_MSL_in_mtrs">
<input type="text" data-table="master_station" data-field="x_Altitude_MSL_in_mtrs" data-page="1" name="x_Altitude_MSL_in_mtrs" id="x_Altitude_MSL_in_mtrs" size="7" maxlength="7" value="<?php echo $master_station_edit->Altitude_MSL_in_mtrs->EditValue ?>"<?php echo $master_station_edit->Altitude_MSL_in_mtrs->editAttributes() ?>>
</span>
<?php echo $master_station_edit->Altitude_MSL_in_mtrs->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->station_type->Visible) { // station_type ?>
	<div id="r_station_type" class="form-group row">
		<label id="elh_master_station_station_type" for="x_station_type" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->station_type->caption() ?><?php echo $master_station_edit->station_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->station_type->cellAttributes() ?>>
<span id="el_master_station_station_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_station_type" data-page="1" data-value-separator="<?php echo $master_station_edit->station_type->displayValueSeparatorAttribute() ?>" id="x_station_type" name="x_station_type"<?php echo $master_station_edit->station_type->editAttributes() ?>>
			<?php echo $master_station_edit->station_type->selectOptionListHtml("x_station_type") ?>
		</select>
</div>
<?php echo $master_station_edit->station_type->Lookup->getParamTag($master_station_edit, "p_x_station_type") ?>
</span>
<?php echo $master_station_edit->station_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->IsActive->Visible) { // IsActive ?>
	<div id="r_IsActive" class="form-group row">
		<label id="elh_master_station_IsActive" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->IsActive->caption() ?><?php echo $master_station_edit->IsActive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->IsActive->cellAttributes() ?>>
<span id="el_master_station_IsActive">
<div id="tp_x_IsActive" class="ew-template"><input type="radio" class="custom-control-input" data-table="master_station" data-field="x_IsActive" data-page="1" data-value-separator="<?php echo $master_station_edit->IsActive->displayValueSeparatorAttribute() ?>" name="x_IsActive" id="x_IsActive" value="{value}"<?php echo $master_station_edit->IsActive->editAttributes() ?>></div>
<div id="dsl_x_IsActive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $master_station_edit->IsActive->radioButtonListHtml(FALSE, "x_IsActive", 1) ?>
</div></div>
</span>
<?php echo $master_station_edit->IsActive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->last_active_date->Visible) { // last_active_date ?>
	<div id="r_last_active_date" class="form-group row">
		<label id="elh_master_station_last_active_date" for="x_last_active_date" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->last_active_date->caption() ?><?php echo $master_station_edit->last_active_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->last_active_date->cellAttributes() ?>>
<span id="el_master_station_last_active_date">
<input type="text" data-table="master_station" data-field="x_last_active_date" data-page="1" data-format="7" name="x_last_active_date" id="x_last_active_date" maxlength="10" value="<?php echo $master_station_edit->last_active_date->EditValue ?>"<?php echo $master_station_edit->last_active_date->editAttributes() ?>>
<?php if (!$master_station_edit->last_active_date->ReadOnly && !$master_station_edit->last_active_date->Disabled && !isset($master_station_edit->last_active_date->EditAttrs["readonly"]) && !isset($master_station_edit->last_active_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmaster_stationedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fmaster_stationedit", "x_last_active_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $master_station_edit->last_active_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $master_station_edit->MultiPages->pageStyle(2) ?>" id="tab_master_station2"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_station_edit->CatchUpId->Visible) { // CatchUpId ?>
	<div id="r_CatchUpId" class="form-group row">
		<label id="elh_master_station_CatchUpId" for="x_CatchUpId" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->CatchUpId->caption() ?><?php echo $master_station_edit->CatchUpId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->CatchUpId->cellAttributes() ?>>
<span id="el_master_station_CatchUpId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_CatchUpId" data-page="2" data-value-separator="<?php echo $master_station_edit->CatchUpId->displayValueSeparatorAttribute() ?>" id="x_CatchUpId" name="x_CatchUpId"<?php echo $master_station_edit->CatchUpId->editAttributes() ?>>
			<?php echo $master_station_edit->CatchUpId->selectOptionListHtml("x_CatchUpId") ?>
		</select>
</div>
<?php echo $master_station_edit->CatchUpId->Lookup->getParamTag($master_station_edit, "p_x_CatchUpId") ?>
</span>
<?php echo $master_station_edit->CatchUpId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->PIC->Visible) { // PIC ?>
	<div id="r_PIC" class="form-group row">
		<label id="elh_master_station_PIC" for="x_PIC" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->PIC->caption() ?><?php echo $master_station_edit->PIC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->PIC->cellAttributes() ?>>
<span id="el_master_station_PIC">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_PIC" data-page="2" data-value-separator="<?php echo $master_station_edit->PIC->displayValueSeparatorAttribute() ?>" id="x_PIC" name="x_PIC"<?php echo $master_station_edit->PIC->editAttributes() ?>>
			<?php echo $master_station_edit->PIC->selectOptionListHtml("x_PIC") ?>
		</select>
</div>
<?php echo $master_station_edit->PIC->Lookup->getParamTag($master_station_edit, "p_x_PIC") ?>
</span>
<?php echo $master_station_edit->PIC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->RiverId->Visible) { // RiverId ?>
	<div id="r_RiverId" class="form-group row">
		<label id="elh_master_station_RiverId" for="x_RiverId" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->RiverId->caption() ?><?php echo $master_station_edit->RiverId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->RiverId->cellAttributes() ?>>
<span id="el_master_station_RiverId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_RiverId" data-page="2" data-value-separator="<?php echo $master_station_edit->RiverId->displayValueSeparatorAttribute() ?>" id="x_RiverId" name="x_RiverId"<?php echo $master_station_edit->RiverId->editAttributes() ?>>
			<?php echo $master_station_edit->RiverId->selectOptionListHtml("x_RiverId") ?>
		</select>
</div>
<?php echo $master_station_edit->RiverId->Lookup->getParamTag($master_station_edit, "p_x_RiverId") ?>
</span>
<?php echo $master_station_edit->RiverId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $master_station_edit->MultiPages->pageStyle(3) ?>" id="tab_master_station3"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_station_edit->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_master_station_Address" for="x_Address" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->Address->caption() ?><?php echo $master_station_edit->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->Address->cellAttributes() ?>>
<span id="el_master_station_Address">
<span<?php echo $master_station_edit->Address->viewAttributes() ?>><?php echo $master_station_edit->Address->EditValue ?></span>
</span>
<input type="hidden" data-table="master_station" data-field="x_Address" data-page="3" name="x_Address" id="x_Address" value="<?php echo HtmlEncode($master_station_edit->Address->CurrentValue) ?>">
<?php echo $master_station_edit->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->max_rainfall_date->Visible) { // max_rainfall_date ?>
	<div id="r_max_rainfall_date" class="form-group row">
		<label id="elh_master_station_max_rainfall_date" for="x_max_rainfall_date" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->max_rainfall_date->caption() ?><?php echo $master_station_edit->max_rainfall_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->max_rainfall_date->cellAttributes() ?>>
<span id="el_master_station_max_rainfall_date">
<span<?php echo $master_station_edit->max_rainfall_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($master_station_edit->max_rainfall_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="master_station" data-field="x_max_rainfall_date" data-page="3" name="x_max_rainfall_date" id="x_max_rainfall_date" value="<?php echo HtmlEncode($master_station_edit->max_rainfall_date->CurrentValue) ?>">
<?php echo $master_station_edit->max_rainfall_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->max_rainfall->Visible) { // max_rainfall ?>
	<div id="r_max_rainfall" class="form-group row">
		<label id="elh_master_station_max_rainfall" for="x_max_rainfall" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->max_rainfall->caption() ?><?php echo $master_station_edit->max_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->max_rainfall->cellAttributes() ?>>
<span id="el_master_station_max_rainfall">
<span<?php echo $master_station_edit->max_rainfall->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($master_station_edit->max_rainfall->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="master_station" data-field="x_max_rainfall" data-page="3" name="x_max_rainfall" id="x_max_rainfall" value="<?php echo HtmlEncode($master_station_edit->max_rainfall->CurrentValue) ?>">
<?php echo $master_station_edit->max_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->last_reading_date->Visible) { // last_reading_date ?>
	<div id="r_last_reading_date" class="form-group row">
		<label id="elh_master_station_last_reading_date" for="x_last_reading_date" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->last_reading_date->caption() ?><?php echo $master_station_edit->last_reading_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->last_reading_date->cellAttributes() ?>>
<span id="el_master_station_last_reading_date">
<span<?php echo $master_station_edit->last_reading_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($master_station_edit->last_reading_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="master_station" data-field="x_last_reading_date" data-page="3" name="x_last_reading_date" id="x_last_reading_date" value="<?php echo HtmlEncode($master_station_edit->last_reading_date->CurrentValue) ?>">
<?php echo $master_station_edit->last_reading_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->first_reading_date->Visible) { // first_reading_date ?>
	<div id="r_first_reading_date" class="form-group row">
		<label id="elh_master_station_first_reading_date" for="x_first_reading_date" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->first_reading_date->caption() ?><?php echo $master_station_edit->first_reading_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->first_reading_date->cellAttributes() ?>>
<span id="el_master_station_first_reading_date">
<span<?php echo $master_station_edit->first_reading_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($master_station_edit->first_reading_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="master_station" data-field="x_first_reading_date" data-page="3" name="x_first_reading_date" id="x_first_reading_date" value="<?php echo HtmlEncode($master_station_edit->first_reading_date->CurrentValue) ?>">
<?php echo $master_station_edit->first_reading_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->no_of_manual_entry->Visible) { // no_of_manual_entry ?>
	<div id="r_no_of_manual_entry" class="form-group row">
		<label id="elh_master_station_no_of_manual_entry" for="x_no_of_manual_entry" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->no_of_manual_entry->caption() ?><?php echo $master_station_edit->no_of_manual_entry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->no_of_manual_entry->cellAttributes() ?>>
<span id="el_master_station_no_of_manual_entry">
<span<?php echo $master_station_edit->no_of_manual_entry->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($master_station_edit->no_of_manual_entry->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="master_station" data-field="x_no_of_manual_entry" data-page="3" name="x_no_of_manual_entry" id="x_no_of_manual_entry" value="<?php echo HtmlEncode($master_station_edit->no_of_manual_entry->CurrentValue) ?>">
<?php echo $master_station_edit->no_of_manual_entry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_station_edit->no_of_sms->Visible) { // no_of_sms ?>
	<div id="r_no_of_sms" class="form-group row">
		<label id="elh_master_station_no_of_sms" for="x_no_of_sms" class="<?php echo $master_station_edit->LeftColumnClass ?>"><?php echo $master_station_edit->no_of_sms->caption() ?><?php echo $master_station_edit->no_of_sms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_station_edit->RightColumnClass ?>"><div <?php echo $master_station_edit->no_of_sms->cellAttributes() ?>>
<span id="el_master_station_no_of_sms">
<span<?php echo $master_station_edit->no_of_sms->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($master_station_edit->no_of_sms->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="master_station" data-field="x_no_of_sms" data-page="3" name="x_no_of_sms" id="x_no_of_sms" value="<?php echo HtmlEncode($master_station_edit->no_of_sms->CurrentValue) ?>">
<?php echo $master_station_edit->no_of_sms->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
	</div><!-- /multi-page tabs .tab-content -->
</div><!-- /multi-page tabs -->
</div><!-- /multi-page -->
	<input type="hidden" data-table="master_station" data-field="x_StationId" name="x_StationId" id="x_StationId" value="<?php echo HtmlEncode($master_station_edit->StationId->CurrentValue) ?>">
<?php if (!$master_station_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_station_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_station_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_station_edit->showPageFooter();
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
$master_station_edit->terminate();
?>