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
$vw_rpt_invalidmessages_list = new vw_rpt_invalidmessages_list();

// Run the page
$vw_rpt_invalidmessages_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_rpt_invalidmessages_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_rpt_invalidmessages_list->isExport()) { ?>
<script>
var fvw_rpt_invalidmessageslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_rpt_invalidmessageslist = currentForm = new ew.Form("fvw_rpt_invalidmessageslist", "list");
	fvw_rpt_invalidmessageslist.formKeyCountName = '<?php echo $vw_rpt_invalidmessages_list->FormKeyCountName ?>';
	loadjs.done("fvw_rpt_invalidmessageslist");
});
var fvw_rpt_invalidmessageslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_rpt_invalidmessageslistsrch = currentSearchForm = new ew.Form("fvw_rpt_invalidmessageslistsrch");

	// Validate function for search
	fvw_rpt_invalidmessageslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SMSDateTime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_invalidmessages_list->SMSDateTime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_rpt_invalidmessageslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_rpt_invalidmessageslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_rpt_invalidmessageslistsrch.lists["x_SubDivisionId"] = <?php echo $vw_rpt_invalidmessages_list->SubDivisionId->Lookup->toClientList($vw_rpt_invalidmessages_list) ?>;
	fvw_rpt_invalidmessageslistsrch.lists["x_SubDivisionId"].options = <?php echo JsonEncode($vw_rpt_invalidmessages_list->SubDivisionId->lookupOptions()) ?>;

	// Filters
	fvw_rpt_invalidmessageslistsrch.filterList = <?php echo $vw_rpt_invalidmessages_list->getFilterList() ?>;
	loadjs.done("fvw_rpt_invalidmessageslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_rpt_invalidmessages_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_rpt_invalidmessages_list->TotalRecords > 0 && $vw_rpt_invalidmessages_list->ExportOptions->visible()) { ?>
<?php $vw_rpt_invalidmessages_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->ImportOptions->visible()) { ?>
<?php $vw_rpt_invalidmessages_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->SearchOptions->visible()) { ?>
<?php $vw_rpt_invalidmessages_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->FilterOptions->visible()) { ?>
<?php $vw_rpt_invalidmessages_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_rpt_invalidmessages_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_rpt_invalidmessages_list->isExport() && !$vw_rpt_invalidmessages->CurrentAction) { ?>
<form name="fvw_rpt_invalidmessageslistsrch" id="fvw_rpt_invalidmessageslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_rpt_invalidmessageslistsrch-search-panel" class="<?php echo $vw_rpt_invalidmessages_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_rpt_invalidmessages">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_rpt_invalidmessages->RowType = ROWTYPE_SEARCH;
$vw_rpt_invalidmessages->resetAttributes();
$vw_rpt_invalidmessages_list->renderRow();
?>
<?php if ($vw_rpt_invalidmessages_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php
		$vw_rpt_invalidmessages_list->SearchColumnCount++;
		if (($vw_rpt_invalidmessages_list->SearchColumnCount - 1) % $vw_rpt_invalidmessages_list->SearchFieldsPerRow == 0) {
			$vw_rpt_invalidmessages_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_invalidmessages_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SubDivisionId" class="ew-cell form-group">
		<label for="x_SubDivisionId" class="ew-search-caption ew-label"><?php echo $vw_rpt_invalidmessages_list->SubDivisionId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubDivisionId" id="z_SubDivisionId" value="=">
</span>
		<span id="el_vw_rpt_invalidmessages_SubDivisionId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_rpt_invalidmessages" data-field="x_SubDivisionId" data-value-separator="<?php echo $vw_rpt_invalidmessages_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x_SubDivisionId" name="x_SubDivisionId"<?php echo $vw_rpt_invalidmessages_list->SubDivisionId->editAttributes() ?>>
			<?php echo $vw_rpt_invalidmessages_list->SubDivisionId->selectOptionListHtml("x_SubDivisionId") ?>
		</select>
</div>
<?php echo $vw_rpt_invalidmessages_list->SubDivisionId->Lookup->getParamTag($vw_rpt_invalidmessages_list, "p_x_SubDivisionId") ?>
</span>
	</div>
	<?php if ($vw_rpt_invalidmessages_list->SearchColumnCount % $vw_rpt_invalidmessages_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php
		$vw_rpt_invalidmessages_list->SearchColumnCount++;
		if (($vw_rpt_invalidmessages_list->SearchColumnCount - 1) % $vw_rpt_invalidmessages_list->SearchFieldsPerRow == 0) {
			$vw_rpt_invalidmessages_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_invalidmessages_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SMSDateTime" class="ew-cell form-group">
		<label for="x_SMSDateTime" class="ew-search-caption ew-label"><?php echo $vw_rpt_invalidmessages_list->SMSDateTime->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_SMSDateTime" id="z_SMSDateTime" value="BETWEEN">
</span>
		<span id="el_vw_rpt_invalidmessages_SMSDateTime" class="ew-search-field">
<input type="text" data-table="vw_rpt_invalidmessages" data-field="x_SMSDateTime" data-format="7" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="19" value="<?php echo $vw_rpt_invalidmessages_list->SMSDateTime->EditValue ?>"<?php echo $vw_rpt_invalidmessages_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_invalidmessages_list->SMSDateTime->ReadOnly && !$vw_rpt_invalidmessages_list->SMSDateTime->Disabled && !isset($vw_rpt_invalidmessages_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_invalidmessages_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_invalidmessageslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_invalidmessageslistsrch", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_invalidmessages_SMSDateTime" class="ew-search-field2">
<input type="text" data-table="vw_rpt_invalidmessages" data-field="x_SMSDateTime" data-format="7" name="y_SMSDateTime" id="y_SMSDateTime" maxlength="19" value="<?php echo $vw_rpt_invalidmessages_list->SMSDateTime->EditValue2 ?>"<?php echo $vw_rpt_invalidmessages_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_invalidmessages_list->SMSDateTime->ReadOnly && !$vw_rpt_invalidmessages_list->SMSDateTime->Disabled && !isset($vw_rpt_invalidmessages_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_invalidmessages_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_invalidmessageslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_invalidmessageslistsrch", "y_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($vw_rpt_invalidmessages_list->SearchColumnCount % $vw_rpt_invalidmessages_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php
		$vw_rpt_invalidmessages_list->SearchColumnCount++;
		if (($vw_rpt_invalidmessages_list->SearchColumnCount - 1) % $vw_rpt_invalidmessages_list->SearchFieldsPerRow == 0) {
			$vw_rpt_invalidmessages_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_invalidmessages_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $vw_rpt_invalidmessages_list->MobileNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		<span id="el_vw_rpt_invalidmessages_MobileNumber" class="ew-search-field">
<input type="text" data-table="vw_rpt_invalidmessages" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="50" value="<?php echo $vw_rpt_invalidmessages_list->MobileNumber->EditValue ?>"<?php echo $vw_rpt_invalidmessages_list->MobileNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($vw_rpt_invalidmessages_list->SearchColumnCount % $vw_rpt_invalidmessages_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_rpt_invalidmessages_list->SearchColumnCount % $vw_rpt_invalidmessages_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_rpt_invalidmessages_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_rpt_invalidmessages_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_rpt_invalidmessages_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_rpt_invalidmessages_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_rpt_invalidmessages_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_invalidmessages_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_invalidmessages_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_invalidmessages_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_rpt_invalidmessages_list->showPageHeader(); ?>
<?php
$vw_rpt_invalidmessages_list->showMessage();
?>
<?php if ($vw_rpt_invalidmessages_list->TotalRecords > 0 || $vw_rpt_invalidmessages->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_rpt_invalidmessages_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_rpt_invalidmessages">
<?php if (!$vw_rpt_invalidmessages_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_rpt_invalidmessages_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_invalidmessages_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_invalidmessages_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_rpt_invalidmessageslist" id="fvw_rpt_invalidmessageslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_rpt_invalidmessages">
<div id="gmp_vw_rpt_invalidmessages" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_rpt_invalidmessages_list->TotalRecords > 0 || $vw_rpt_invalidmessages_list->isGridEdit()) { ?>
<table id="tbl_vw_rpt_invalidmessageslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_rpt_invalidmessages->RowType = ROWTYPE_HEADER;

// Render list options
$vw_rpt_invalidmessages_list->renderListOptions();

// Render list options (header, left)
$vw_rpt_invalidmessages_list->ListOptions->render("header", "left");
?>
<?php if ($vw_rpt_invalidmessages_list->stationid->Visible) { // stationid ?>
	<?php if ($vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->stationid) == "") { ?>
		<th data-name="stationid" class="<?php echo $vw_rpt_invalidmessages_list->stationid->headerCellClass() ?>"><div id="elh_vw_rpt_invalidmessages_stationid" class="vw_rpt_invalidmessages_stationid"><div class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->stationid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stationid" class="<?php echo $vw_rpt_invalidmessages_list->stationid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->stationid) ?>', 2);"><div id="elh_vw_rpt_invalidmessages_stationid" class="vw_rpt_invalidmessages_stationid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->stationid->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_invalidmessages_list->stationid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_invalidmessages_list->stationid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_invalidmessages_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_rpt_invalidmessages_SubDivisionId" class="vw_rpt_invalidmessages_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_invalidmessages_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->SubDivisionId) ?>', 2);"><div id="elh_vw_rpt_invalidmessages_SubDivisionId" class="vw_rpt_invalidmessages_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_invalidmessages_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_invalidmessages_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_invalidmessages_list->SMSDateTime->headerCellClass() ?>"><div id="elh_vw_rpt_invalidmessages_SMSDateTime" class="vw_rpt_invalidmessages_SMSDateTime"><div class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_invalidmessages_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->SMSDateTime) ?>', 2);"><div id="elh_vw_rpt_invalidmessages_SMSDateTime" class="vw_rpt_invalidmessages_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_invalidmessages_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_invalidmessages_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->SMSText->Visible) { // SMSText ?>
	<?php if ($vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->SMSText) == "") { ?>
		<th data-name="SMSText" class="<?php echo $vw_rpt_invalidmessages_list->SMSText->headerCellClass() ?>"><div id="elh_vw_rpt_invalidmessages_SMSText" class="vw_rpt_invalidmessages_SMSText"><div class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->SMSText->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSText" class="<?php echo $vw_rpt_invalidmessages_list->SMSText->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->SMSText) ?>', 2);"><div id="elh_vw_rpt_invalidmessages_SMSText" class="vw_rpt_invalidmessages_SMSText">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->SMSText->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_invalidmessages_list->SMSText->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_invalidmessages_list->SMSText->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_invalidmessages_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_rpt_invalidmessages_MobileNumber" class="vw_rpt_invalidmessages_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_invalidmessages_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->MobileNumber) ?>', 2);"><div id="elh_vw_rpt_invalidmessages_MobileNumber" class="vw_rpt_invalidmessages_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_invalidmessages_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_invalidmessages_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->sms_statusid->Visible) { // sms_statusid ?>
	<?php if ($vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->sms_statusid) == "") { ?>
		<th data-name="sms_statusid" class="<?php echo $vw_rpt_invalidmessages_list->sms_statusid->headerCellClass() ?>"><div id="elh_vw_rpt_invalidmessages_sms_statusid" class="vw_rpt_invalidmessages_sms_statusid"><div class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->sms_statusid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sms_statusid" class="<?php echo $vw_rpt_invalidmessages_list->sms_statusid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_invalidmessages_list->SortUrl($vw_rpt_invalidmessages_list->sms_statusid) ?>', 2);"><div id="elh_vw_rpt_invalidmessages_sms_statusid" class="vw_rpt_invalidmessages_sms_statusid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_invalidmessages_list->sms_statusid->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_invalidmessages_list->sms_statusid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_invalidmessages_list->sms_statusid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_rpt_invalidmessages_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_rpt_invalidmessages_list->ExportAll && $vw_rpt_invalidmessages_list->isExport()) {
	$vw_rpt_invalidmessages_list->StopRecord = $vw_rpt_invalidmessages_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_rpt_invalidmessages_list->TotalRecords > $vw_rpt_invalidmessages_list->StartRecord + $vw_rpt_invalidmessages_list->DisplayRecords - 1)
		$vw_rpt_invalidmessages_list->StopRecord = $vw_rpt_invalidmessages_list->StartRecord + $vw_rpt_invalidmessages_list->DisplayRecords - 1;
	else
		$vw_rpt_invalidmessages_list->StopRecord = $vw_rpt_invalidmessages_list->TotalRecords;
}
$vw_rpt_invalidmessages_list->RecordCount = $vw_rpt_invalidmessages_list->StartRecord - 1;
if ($vw_rpt_invalidmessages_list->Recordset && !$vw_rpt_invalidmessages_list->Recordset->EOF) {
	$vw_rpt_invalidmessages_list->Recordset->moveFirst();
	$selectLimit = $vw_rpt_invalidmessages_list->UseSelectLimit;
	if (!$selectLimit && $vw_rpt_invalidmessages_list->StartRecord > 1)
		$vw_rpt_invalidmessages_list->Recordset->move($vw_rpt_invalidmessages_list->StartRecord - 1);
} elseif (!$vw_rpt_invalidmessages->AllowAddDeleteRow && $vw_rpt_invalidmessages_list->StopRecord == 0) {
	$vw_rpt_invalidmessages_list->StopRecord = $vw_rpt_invalidmessages->GridAddRowCount;
}

// Initialize aggregate
$vw_rpt_invalidmessages->RowType = ROWTYPE_AGGREGATEINIT;
$vw_rpt_invalidmessages->resetAttributes();
$vw_rpt_invalidmessages_list->renderRow();
while ($vw_rpt_invalidmessages_list->RecordCount < $vw_rpt_invalidmessages_list->StopRecord) {
	$vw_rpt_invalidmessages_list->RecordCount++;
	if ($vw_rpt_invalidmessages_list->RecordCount >= $vw_rpt_invalidmessages_list->StartRecord) {
		$vw_rpt_invalidmessages_list->RowCount++;

		// Set up key count
		$vw_rpt_invalidmessages_list->KeyCount = $vw_rpt_invalidmessages_list->RowIndex;

		// Init row class and style
		$vw_rpt_invalidmessages->resetAttributes();
		$vw_rpt_invalidmessages->CssClass = "";
		if ($vw_rpt_invalidmessages_list->isGridAdd()) {
		} else {
			$vw_rpt_invalidmessages_list->loadRowValues($vw_rpt_invalidmessages_list->Recordset); // Load row values
		}
		$vw_rpt_invalidmessages->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_rpt_invalidmessages->RowAttrs->merge(["data-rowindex" => $vw_rpt_invalidmessages_list->RowCount, "id" => "r" . $vw_rpt_invalidmessages_list->RowCount . "_vw_rpt_invalidmessages", "data-rowtype" => $vw_rpt_invalidmessages->RowType]);

		// Render row
		$vw_rpt_invalidmessages_list->renderRow();

		// Render list options
		$vw_rpt_invalidmessages_list->renderListOptions();
?>
	<tr <?php echo $vw_rpt_invalidmessages->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_rpt_invalidmessages_list->ListOptions->render("body", "left", $vw_rpt_invalidmessages_list->RowCount);
?>
	<?php if ($vw_rpt_invalidmessages_list->stationid->Visible) { // stationid ?>
		<td data-name="stationid" <?php echo $vw_rpt_invalidmessages_list->stationid->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_invalidmessages_list->RowCount ?>_vw_rpt_invalidmessages_stationid">
<span<?php echo $vw_rpt_invalidmessages_list->stationid->viewAttributes() ?>><?php echo $vw_rpt_invalidmessages_list->stationid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_invalidmessages_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_rpt_invalidmessages_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_invalidmessages_list->RowCount ?>_vw_rpt_invalidmessages_SubDivisionId">
<span<?php echo $vw_rpt_invalidmessages_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_rpt_invalidmessages_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_invalidmessages_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $vw_rpt_invalidmessages_list->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_invalidmessages_list->RowCount ?>_vw_rpt_invalidmessages_SMSDateTime">
<span<?php echo $vw_rpt_invalidmessages_list->SMSDateTime->viewAttributes() ?>><?php echo $vw_rpt_invalidmessages_list->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_invalidmessages_list->SMSText->Visible) { // SMSText ?>
		<td data-name="SMSText" <?php echo $vw_rpt_invalidmessages_list->SMSText->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_invalidmessages_list->RowCount ?>_vw_rpt_invalidmessages_SMSText">
<span<?php echo $vw_rpt_invalidmessages_list->SMSText->viewAttributes() ?>><?php echo $vw_rpt_invalidmessages_list->SMSText->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_invalidmessages_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_rpt_invalidmessages_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_invalidmessages_list->RowCount ?>_vw_rpt_invalidmessages_MobileNumber">
<span<?php echo $vw_rpt_invalidmessages_list->MobileNumber->viewAttributes() ?>><?php echo $vw_rpt_invalidmessages_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_invalidmessages_list->sms_statusid->Visible) { // sms_statusid ?>
		<td data-name="sms_statusid" <?php echo $vw_rpt_invalidmessages_list->sms_statusid->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_invalidmessages_list->RowCount ?>_vw_rpt_invalidmessages_sms_statusid">
<span<?php echo $vw_rpt_invalidmessages_list->sms_statusid->viewAttributes() ?>><?php echo $vw_rpt_invalidmessages_list->sms_statusid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_rpt_invalidmessages_list->ListOptions->render("body", "right", $vw_rpt_invalidmessages_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_rpt_invalidmessages_list->isGridAdd())
		$vw_rpt_invalidmessages_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_rpt_invalidmessages->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_rpt_invalidmessages_list->Recordset)
	$vw_rpt_invalidmessages_list->Recordset->Close();
?>
<?php if (!$vw_rpt_invalidmessages_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_rpt_invalidmessages_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_invalidmessages_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_invalidmessages_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_rpt_invalidmessages_list->TotalRecords == 0 && !$vw_rpt_invalidmessages->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_rpt_invalidmessages_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_rpt_invalidmessages_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_rpt_invalidmessages_list->isExport()) { ?>
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
$vw_rpt_invalidmessages_list->terminate();
?>