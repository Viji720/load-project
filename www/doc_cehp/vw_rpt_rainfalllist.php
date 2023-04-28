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
$vw_rpt_rainfall_list = new vw_rpt_rainfall_list();

// Run the page
$vw_rpt_rainfall_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_rpt_rainfall_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_rpt_rainfall_list->isExport()) { ?>
<script>
var fvw_rpt_rainfalllist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_rpt_rainfalllist = currentForm = new ew.Form("fvw_rpt_rainfalllist", "list");
	fvw_rpt_rainfalllist.formKeyCountName = '<?php echo $vw_rpt_rainfall_list->FormKeyCountName ?>';
	loadjs.done("fvw_rpt_rainfalllist");
});
var fvw_rpt_rainfalllistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_rpt_rainfalllistsrch = currentSearchForm = new ew.Form("fvw_rpt_rainfalllistsrch");

	// Validate function for search
	fvw_rpt_rainfalllistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SMSDateTime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_rainfall_list->SMSDateTime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Rainfall");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_rainfall_list->Rainfall->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_rpt_rainfalllistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_rpt_rainfalllistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_rpt_rainfalllistsrch.lists["x_DistrictId"] = <?php echo $vw_rpt_rainfall_list->DistrictId->Lookup->toClientList($vw_rpt_rainfall_list) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_DistrictId"].options = <?php echo JsonEncode($vw_rpt_rainfall_list->DistrictId->lookupOptions()) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_StationCode"] = <?php echo $vw_rpt_rainfall_list->StationCode->Lookup->toClientList($vw_rpt_rainfall_list) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_StationCode"].options = <?php echo JsonEncode($vw_rpt_rainfall_list->StationCode->lookupOptions()) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_SubDivisionId"] = <?php echo $vw_rpt_rainfall_list->SubDivisionId->Lookup->toClientList($vw_rpt_rainfall_list) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_SubDivisionId"].options = <?php echo JsonEncode($vw_rpt_rainfall_list->SubDivisionId->lookupOptions()) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_BasinId"] = <?php echo $vw_rpt_rainfall_list->BasinId->Lookup->toClientList($vw_rpt_rainfall_list) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_BasinId"].options = <?php echo JsonEncode($vw_rpt_rainfall_list->BasinId->lookupOptions()) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_Status"] = <?php echo $vw_rpt_rainfall_list->Status->Lookup->toClientList($vw_rpt_rainfall_list) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_Status"].options = <?php echo JsonEncode($vw_rpt_rainfall_list->Status->lookupOptions()) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_Validated"] = <?php echo $vw_rpt_rainfall_list->Validated->Lookup->toClientList($vw_rpt_rainfall_list) ?>;
	fvw_rpt_rainfalllistsrch.lists["x_Validated"].options = <?php echo JsonEncode($vw_rpt_rainfall_list->Validated->lookupOptions()) ?>;

	// Filters
	fvw_rpt_rainfalllistsrch.filterList = <?php echo $vw_rpt_rainfall_list->getFilterList() ?>;
	loadjs.done("fvw_rpt_rainfalllistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_rpt_rainfall_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_rpt_rainfall_list->TotalRecords > 0 && $vw_rpt_rainfall_list->ExportOptions->visible()) { ?>
<?php $vw_rpt_rainfall_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->ImportOptions->visible()) { ?>
<?php $vw_rpt_rainfall_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->SearchOptions->visible()) { ?>
<?php $vw_rpt_rainfall_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->FilterOptions->visible()) { ?>
<?php $vw_rpt_rainfall_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_rpt_rainfall_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_rpt_rainfall_list->isExport() && !$vw_rpt_rainfall->CurrentAction) { ?>
<form name="fvw_rpt_rainfalllistsrch" id="fvw_rpt_rainfalllistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_rpt_rainfalllistsrch-search-panel" class="<?php echo $vw_rpt_rainfall_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_rpt_rainfall">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_rpt_rainfall->RowType = ROWTYPE_SEARCH;
$vw_rpt_rainfall->resetAttributes();
$vw_rpt_rainfall_list->renderRow();
?>
<?php if ($vw_rpt_rainfall_list->DistrictId->Visible) { // DistrictId ?>
	<?php
		$vw_rpt_rainfall_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_list->SearchColumnCount - 1) % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DistrictId" class="ew-cell form-group">
		<label for="x_DistrictId" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_list->DistrictId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DistrictId" id="z_DistrictId" value="=">
</span>
		<span id="el_vw_rpt_rainfall_DistrictId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_rpt_rainfall" data-field="x_DistrictId" data-value-separator="<?php echo $vw_rpt_rainfall_list->DistrictId->displayValueSeparatorAttribute() ?>" id="x_DistrictId" name="x_DistrictId"<?php echo $vw_rpt_rainfall_list->DistrictId->editAttributes() ?>>
			<?php echo $vw_rpt_rainfall_list->DistrictId->selectOptionListHtml("x_DistrictId") ?>
		</select>
</div>
<?php echo $vw_rpt_rainfall_list->DistrictId->Lookup->getParamTag($vw_rpt_rainfall_list, "p_x_DistrictId") ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->StationCode->Visible) { // StationCode ?>
	<?php
		$vw_rpt_rainfall_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_list->SearchColumnCount - 1) % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationCode" class="ew-cell form-group">
		<label for="x_StationCode" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_list->StationCode->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_StationCode" id="z_StationCode" value="=">
</span>
		<span id="el_vw_rpt_rainfall_StationCode" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_rpt_rainfall" data-field="x_StationCode" data-value-separator="<?php echo $vw_rpt_rainfall_list->StationCode->displayValueSeparatorAttribute() ?>" id="x_StationCode" name="x_StationCode"<?php echo $vw_rpt_rainfall_list->StationCode->editAttributes() ?>>
			<?php echo $vw_rpt_rainfall_list->StationCode->selectOptionListHtml("x_StationCode") ?>
		</select>
</div>
<?php echo $vw_rpt_rainfall_list->StationCode->Lookup->getParamTag($vw_rpt_rainfall_list, "p_x_StationCode") ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php
		$vw_rpt_rainfall_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_list->SearchColumnCount - 1) % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SubDivisionId" class="ew-cell form-group">
		<label for="x_SubDivisionId" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_list->SubDivisionId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubDivisionId" id="z_SubDivisionId" value="=">
</span>
		<span id="el_vw_rpt_rainfall_SubDivisionId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_rpt_rainfall" data-field="x_SubDivisionId" data-value-separator="<?php echo $vw_rpt_rainfall_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x_SubDivisionId" name="x_SubDivisionId"<?php echo $vw_rpt_rainfall_list->SubDivisionId->editAttributes() ?>>
			<?php echo $vw_rpt_rainfall_list->SubDivisionId->selectOptionListHtml("x_SubDivisionId") ?>
		</select>
</div>
<?php echo $vw_rpt_rainfall_list->SubDivisionId->Lookup->getParamTag($vw_rpt_rainfall_list, "p_x_SubDivisionId") ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->BasinId->Visible) { // BasinId ?>
	<?php
		$vw_rpt_rainfall_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_list->SearchColumnCount - 1) % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BasinId" class="ew-cell form-group">
		<label for="x_BasinId" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_list->BasinId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BasinId" id="z_BasinId" value="=">
</span>
		<span id="el_vw_rpt_rainfall_BasinId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_rpt_rainfall" data-field="x_BasinId" data-value-separator="<?php echo $vw_rpt_rainfall_list->BasinId->displayValueSeparatorAttribute() ?>" id="x_BasinId" name="x_BasinId"<?php echo $vw_rpt_rainfall_list->BasinId->editAttributes() ?>>
			<?php echo $vw_rpt_rainfall_list->BasinId->selectOptionListHtml("x_BasinId") ?>
		</select>
</div>
<?php echo $vw_rpt_rainfall_list->BasinId->Lookup->getParamTag($vw_rpt_rainfall_list, "p_x_BasinId") ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php
		$vw_rpt_rainfall_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_list->SearchColumnCount - 1) % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SMSDateTime" class="ew-cell form-group">
		<label for="x_SMSDateTime" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_list->SMSDateTime->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_SMSDateTime" id="z_SMSDateTime" value="BETWEEN">
</span>
		<span id="el_vw_rpt_rainfall_SMSDateTime" class="ew-search-field">
<input type="text" data-table="vw_rpt_rainfall" data-field="x_SMSDateTime" data-format="7" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="19" value="<?php echo $vw_rpt_rainfall_list->SMSDateTime->EditValue ?>"<?php echo $vw_rpt_rainfall_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_rainfall_list->SMSDateTime->ReadOnly && !$vw_rpt_rainfall_list->SMSDateTime->Disabled && !isset($vw_rpt_rainfall_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_rainfall_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_rainfalllistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_rainfalllistsrch", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_rainfall_SMSDateTime" class="ew-search-field2">
<input type="text" data-table="vw_rpt_rainfall" data-field="x_SMSDateTime" data-format="7" name="y_SMSDateTime" id="y_SMSDateTime" maxlength="19" value="<?php echo $vw_rpt_rainfall_list->SMSDateTime->EditValue2 ?>"<?php echo $vw_rpt_rainfall_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_rainfall_list->SMSDateTime->ReadOnly && !$vw_rpt_rainfall_list->SMSDateTime->Disabled && !isset($vw_rpt_rainfall_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_rainfall_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_rainfalllistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_rainfalllistsrch", "y_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->Rainfall->Visible) { // Rainfall ?>
	<?php
		$vw_rpt_rainfall_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_list->SearchColumnCount - 1) % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Rainfall" class="ew-cell form-group">
		<label for="x_Rainfall" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_list->Rainfall->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_Rainfall" id="z_Rainfall" value="BETWEEN">
</span>
		<span id="el_vw_rpt_rainfall_Rainfall" class="ew-search-field">
<input type="text" data-table="vw_rpt_rainfall" data-field="x_Rainfall" name="x_Rainfall" id="x_Rainfall" size="30" maxlength="7" value="<?php echo $vw_rpt_rainfall_list->Rainfall->EditValue ?>"<?php echo $vw_rpt_rainfall_list->Rainfall->editAttributes() ?>>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_rainfall_Rainfall" class="ew-search-field2">
<input type="text" data-table="vw_rpt_rainfall" data-field="x_Rainfall" name="y_Rainfall" id="y_Rainfall" size="30" maxlength="7" value="<?php echo $vw_rpt_rainfall_list->Rainfall->EditValue2 ?>"<?php echo $vw_rpt_rainfall_list->Rainfall->editAttributes() ?>>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->Status->Visible) { // Status ?>
	<?php
		$vw_rpt_rainfall_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_list->SearchColumnCount - 1) % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Status" class="ew-cell form-group">
		<label for="x_Status" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_list->Status->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Status" id="z_Status" value="=">
</span>
		<span id="el_vw_rpt_rainfall_Status" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_rpt_rainfall" data-field="x_Status" data-value-separator="<?php echo $vw_rpt_rainfall_list->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $vw_rpt_rainfall_list->Status->editAttributes() ?>>
			<?php echo $vw_rpt_rainfall_list->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
<?php echo $vw_rpt_rainfall_list->Status->Lookup->getParamTag($vw_rpt_rainfall_list, "p_x_Status") ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->Validated->Visible) { // Validated ?>
	<?php
		$vw_rpt_rainfall_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_list->SearchColumnCount - 1) % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Validated" class="ew-cell form-group">
		<label for="x_Validated" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_list->Validated->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Validated" id="z_Validated" value="=">
</span>
		<span id="el_vw_rpt_rainfall_Validated" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_rpt_rainfall" data-field="x_Validated" data-value-separator="<?php echo $vw_rpt_rainfall_list->Validated->displayValueSeparatorAttribute() ?>" id="x_Validated" name="x_Validated"<?php echo $vw_rpt_rainfall_list->Validated->editAttributes() ?>>
			<?php echo $vw_rpt_rainfall_list->Validated->selectOptionListHtml("x_Validated") ?>
		</select>
</div>
<?php echo $vw_rpt_rainfall_list->Validated->Lookup->getParamTag($vw_rpt_rainfall_list, "p_x_Validated") ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_rpt_rainfall_list->SearchColumnCount % $vw_rpt_rainfall_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_rpt_rainfall_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_rpt_rainfall_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_rpt_rainfall_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_rpt_rainfall_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_rpt_rainfall_list->showPageHeader(); ?>
<?php
$vw_rpt_rainfall_list->showMessage();
?>
<?php if ($vw_rpt_rainfall_list->TotalRecords > 0 || $vw_rpt_rainfall->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_rpt_rainfall_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_rpt_rainfall">
<?php if (!$vw_rpt_rainfall_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_rpt_rainfall_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_rainfall_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_rpt_rainfalllist" id="fvw_rpt_rainfalllist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_rpt_rainfall">
<div id="gmp_vw_rpt_rainfall" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_rpt_rainfall_list->TotalRecords > 0 || $vw_rpt_rainfall_list->isGridEdit()) { ?>
<table id="tbl_vw_rpt_rainfalllist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_rpt_rainfall->RowType = ROWTYPE_HEADER;

// Render list options
$vw_rpt_rainfall_list->renderListOptions();

// Render list options (header, left)
$vw_rpt_rainfall_list->ListOptions->render("header", "left");
?>
<?php if ($vw_rpt_rainfall_list->DistrictId->Visible) { // DistrictId ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->DistrictId) == "") { ?>
		<th data-name="DistrictId" class="<?php echo $vw_rpt_rainfall_list->DistrictId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_DistrictId" class="vw_rpt_rainfall_DistrictId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->DistrictId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictId" class="<?php echo $vw_rpt_rainfall_list->DistrictId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->DistrictId) ?>', 2);"><div id="elh_vw_rpt_rainfall_DistrictId" class="vw_rpt_rainfall_DistrictId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->DistrictId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->DistrictId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->DistrictId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->TalukID->Visible) { // TalukID ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->TalukID) == "") { ?>
		<th data-name="TalukID" class="<?php echo $vw_rpt_rainfall_list->TalukID->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_TalukID" class="vw_rpt_rainfall_TalukID"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->TalukID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukID" class="<?php echo $vw_rpt_rainfall_list->TalukID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->TalukID) ?>', 2);"><div id="elh_vw_rpt_rainfall_TalukID" class="vw_rpt_rainfall_TalukID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->TalukID->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->TalukID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->TalukID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->StationCode->Visible) { // StationCode ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->StationCode) == "") { ?>
		<th data-name="StationCode" class="<?php echo $vw_rpt_rainfall_list->StationCode->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_StationCode" class="vw_rpt_rainfall_StationCode"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->StationCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationCode" class="<?php echo $vw_rpt_rainfall_list->StationCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->StationCode) ?>', 2);"><div id="elh_vw_rpt_rainfall_StationCode" class="vw_rpt_rainfall_StationCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->StationCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->StationCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->StationCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_rainfall_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_SubDivisionId" class="vw_rpt_rainfall_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_rainfall_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->SubDivisionId) ?>', 2);"><div id="elh_vw_rpt_rainfall_SubDivisionId" class="vw_rpt_rainfall_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->BasinId->Visible) { // BasinId ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->BasinId) == "") { ?>
		<th data-name="BasinId" class="<?php echo $vw_rpt_rainfall_list->BasinId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_BasinId" class="vw_rpt_rainfall_BasinId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->BasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinId" class="<?php echo $vw_rpt_rainfall_list->BasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->BasinId) ?>', 2);"><div id="elh_vw_rpt_rainfall_BasinId" class="vw_rpt_rainfall_BasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->BasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->BasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->BasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->SubBasinId->Visible) { // SubBasinId ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->SubBasinId) == "") { ?>
		<th data-name="SubBasinId" class="<?php echo $vw_rpt_rainfall_list->SubBasinId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_SubBasinId" class="vw_rpt_rainfall_SubBasinId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->SubBasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinId" class="<?php echo $vw_rpt_rainfall_list->SubBasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->SubBasinId) ?>', 2);"><div id="elh_vw_rpt_rainfall_SubBasinId" class="vw_rpt_rainfall_SubBasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->SubBasinId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->SubBasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->SubBasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_rainfall_list->SMSDateTime->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_SMSDateTime" class="vw_rpt_rainfall_SMSDateTime"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_rainfall_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->SMSDateTime) ?>', 2);"><div id="elh_vw_rpt_rainfall_SMSDateTime" class="vw_rpt_rainfall_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->Rainfall->Visible) { // Rainfall ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->Rainfall) == "") { ?>
		<th data-name="Rainfall" class="<?php echo $vw_rpt_rainfall_list->Rainfall->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_Rainfall" class="vw_rpt_rainfall_Rainfall"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->Rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rainfall" class="<?php echo $vw_rpt_rainfall_list->Rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->Rainfall) ?>', 2);"><div id="elh_vw_rpt_rainfall_Rainfall" class="vw_rpt_rainfall_Rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->Rainfall->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->Rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->Rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->Status->Visible) { // Status ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $vw_rpt_rainfall_list->Status->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_Status" class="vw_rpt_rainfall_Status"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $vw_rpt_rainfall_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->Status) ?>', 2);"><div id="elh_vw_rpt_rainfall_Status" class="vw_rpt_rainfall_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->Validated->Visible) { // Validated ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->Validated) == "") { ?>
		<th data-name="Validated" class="<?php echo $vw_rpt_rainfall_list->Validated->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_Validated" class="vw_rpt_rainfall_Validated"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->Validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Validated" class="<?php echo $vw_rpt_rainfall_list->Validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->Validated) ?>', 2);"><div id="elh_vw_rpt_rainfall_Validated" class="vw_rpt_rainfall_Validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->Validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->Validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->Validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_rainfall_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_MobileNumber" class="vw_rpt_rainfall_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_rainfall_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_list->SortUrl($vw_rpt_rainfall_list->MobileNumber) ?>', 2);"><div id="elh_vw_rpt_rainfall_MobileNumber" class="vw_rpt_rainfall_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_rpt_rainfall_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_rpt_rainfall_list->ExportAll && $vw_rpt_rainfall_list->isExport()) {
	$vw_rpt_rainfall_list->StopRecord = $vw_rpt_rainfall_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_rpt_rainfall_list->TotalRecords > $vw_rpt_rainfall_list->StartRecord + $vw_rpt_rainfall_list->DisplayRecords - 1)
		$vw_rpt_rainfall_list->StopRecord = $vw_rpt_rainfall_list->StartRecord + $vw_rpt_rainfall_list->DisplayRecords - 1;
	else
		$vw_rpt_rainfall_list->StopRecord = $vw_rpt_rainfall_list->TotalRecords;
}
$vw_rpt_rainfall_list->RecordCount = $vw_rpt_rainfall_list->StartRecord - 1;
if ($vw_rpt_rainfall_list->Recordset && !$vw_rpt_rainfall_list->Recordset->EOF) {
	$vw_rpt_rainfall_list->Recordset->moveFirst();
	$selectLimit = $vw_rpt_rainfall_list->UseSelectLimit;
	if (!$selectLimit && $vw_rpt_rainfall_list->StartRecord > 1)
		$vw_rpt_rainfall_list->Recordset->move($vw_rpt_rainfall_list->StartRecord - 1);
} elseif (!$vw_rpt_rainfall->AllowAddDeleteRow && $vw_rpt_rainfall_list->StopRecord == 0) {
	$vw_rpt_rainfall_list->StopRecord = $vw_rpt_rainfall->GridAddRowCount;
}

// Initialize aggregate
$vw_rpt_rainfall->RowType = ROWTYPE_AGGREGATEINIT;
$vw_rpt_rainfall->resetAttributes();
$vw_rpt_rainfall_list->renderRow();
while ($vw_rpt_rainfall_list->RecordCount < $vw_rpt_rainfall_list->StopRecord) {
	$vw_rpt_rainfall_list->RecordCount++;
	if ($vw_rpt_rainfall_list->RecordCount >= $vw_rpt_rainfall_list->StartRecord) {
		$vw_rpt_rainfall_list->RowCount++;

		// Set up key count
		$vw_rpt_rainfall_list->KeyCount = $vw_rpt_rainfall_list->RowIndex;

		// Init row class and style
		$vw_rpt_rainfall->resetAttributes();
		$vw_rpt_rainfall->CssClass = "";
		if ($vw_rpt_rainfall_list->isGridAdd()) {
		} else {
			$vw_rpt_rainfall_list->loadRowValues($vw_rpt_rainfall_list->Recordset); // Load row values
		}
		$vw_rpt_rainfall->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_rpt_rainfall->RowAttrs->merge(["data-rowindex" => $vw_rpt_rainfall_list->RowCount, "id" => "r" . $vw_rpt_rainfall_list->RowCount . "_vw_rpt_rainfall", "data-rowtype" => $vw_rpt_rainfall->RowType]);

		// Render row
		$vw_rpt_rainfall_list->renderRow();

		// Render list options
		$vw_rpt_rainfall_list->renderListOptions();
?>
	<tr <?php echo $vw_rpt_rainfall->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_rpt_rainfall_list->ListOptions->render("body", "left", $vw_rpt_rainfall_list->RowCount);
?>
	<?php if ($vw_rpt_rainfall_list->DistrictId->Visible) { // DistrictId ?>
		<td data-name="DistrictId" <?php echo $vw_rpt_rainfall_list->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_DistrictId">
<span<?php echo $vw_rpt_rainfall_list->DistrictId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->DistrictId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->TalukID->Visible) { // TalukID ?>
		<td data-name="TalukID" <?php echo $vw_rpt_rainfall_list->TalukID->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_TalukID">
<span<?php echo $vw_rpt_rainfall_list->TalukID->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->TalukID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->StationCode->Visible) { // StationCode ?>
		<td data-name="StationCode" <?php echo $vw_rpt_rainfall_list->StationCode->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_StationCode">
<span<?php echo $vw_rpt_rainfall_list->StationCode->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->StationCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_rpt_rainfall_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_SubDivisionId">
<span<?php echo $vw_rpt_rainfall_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->BasinId->Visible) { // BasinId ?>
		<td data-name="BasinId" <?php echo $vw_rpt_rainfall_list->BasinId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_BasinId">
<span<?php echo $vw_rpt_rainfall_list->BasinId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->BasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->SubBasinId->Visible) { // SubBasinId ?>
		<td data-name="SubBasinId" <?php echo $vw_rpt_rainfall_list->SubBasinId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_SubBasinId">
<span<?php echo $vw_rpt_rainfall_list->SubBasinId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->SubBasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $vw_rpt_rainfall_list->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_SMSDateTime">
<span<?php echo $vw_rpt_rainfall_list->SMSDateTime->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->Rainfall->Visible) { // Rainfall ?>
		<td data-name="Rainfall" <?php echo $vw_rpt_rainfall_list->Rainfall->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_Rainfall">
<span<?php echo $vw_rpt_rainfall_list->Rainfall->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->Rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $vw_rpt_rainfall_list->Status->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_Status">
<span<?php echo $vw_rpt_rainfall_list->Status->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->Validated->Visible) { // Validated ?>
		<td data-name="Validated" <?php echo $vw_rpt_rainfall_list->Validated->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_Validated">
<span<?php echo $vw_rpt_rainfall_list->Validated->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->Validated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_rpt_rainfall_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_list->RowCount ?>_vw_rpt_rainfall_MobileNumber">
<span<?php echo $vw_rpt_rainfall_list->MobileNumber->viewAttributes() ?>><?php echo $vw_rpt_rainfall_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_rpt_rainfall_list->ListOptions->render("body", "right", $vw_rpt_rainfall_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_rpt_rainfall_list->isGridAdd())
		$vw_rpt_rainfall_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_rpt_rainfall->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_rpt_rainfall_list->Recordset)
	$vw_rpt_rainfall_list->Recordset->Close();
?>
<?php if (!$vw_rpt_rainfall_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_rpt_rainfall_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_rainfall_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_rpt_rainfall_list->TotalRecords == 0 && !$vw_rpt_rainfall->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_rpt_rainfall_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_rpt_rainfall_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$vw_rpt_rainfall_list->terminate();
?>