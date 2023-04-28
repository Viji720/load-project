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
$obs_rainfall_list = new obs_rainfall_list();

// Run the page
$obs_rainfall_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_rainfall_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$obs_rainfall_list->isExport()) { ?>
<script>
var fobs_rainfalllist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fobs_rainfalllist = currentForm = new ew.Form("fobs_rainfalllist", "list");
	fobs_rainfalllist.formKeyCountName = '<?php echo $obs_rainfall_list->FormKeyCountName ?>';
	loadjs.done("fobs_rainfalllist");
});
var fobs_rainfalllistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fobs_rainfalllistsrch = currentSearchForm = new ew.Form("fobs_rainfalllistsrch");

	// Validate function for search
	fobs_rainfalllistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fobs_rainfalllistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fobs_rainfalllistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fobs_rainfalllistsrch.lists["x_obs_Status"] = <?php echo $obs_rainfall_list->obs_Status->Lookup->toClientList($obs_rainfall_list) ?>;
	fobs_rainfalllistsrch.lists["x_obs_Status"].options = <?php echo JsonEncode($obs_rainfall_list->obs_Status->lookupOptions()) ?>;
	fobs_rainfalllistsrch.lists["x_SubDivisionId"] = <?php echo $obs_rainfall_list->SubDivisionId->Lookup->toClientList($obs_rainfall_list) ?>;
	fobs_rainfalllistsrch.lists["x_SubDivisionId"].options = <?php echo JsonEncode($obs_rainfall_list->SubDivisionId->lookupOptions()) ?>;

	// Filters
	fobs_rainfalllistsrch.filterList = <?php echo $obs_rainfall_list->getFilterList() ?>;
	loadjs.done("fobs_rainfalllistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$obs_rainfall_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($obs_rainfall_list->TotalRecords > 0 && $obs_rainfall_list->ExportOptions->visible()) { ?>
<?php $obs_rainfall_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($obs_rainfall_list->ImportOptions->visible()) { ?>
<?php $obs_rainfall_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($obs_rainfall_list->SearchOptions->visible()) { ?>
<?php $obs_rainfall_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($obs_rainfall_list->FilterOptions->visible()) { ?>
<?php $obs_rainfall_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$obs_rainfall_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$obs_rainfall_list->isExport() && !$obs_rainfall->CurrentAction) { ?>
<form name="fobs_rainfalllistsrch" id="fobs_rainfalllistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fobs_rainfalllistsrch-search-panel" class="<?php echo $obs_rainfall_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="obs_rainfall">
	<div class="ew-extended-search">
<?php

// Render search row
$obs_rainfall->RowType = ROWTYPE_SEARCH;
$obs_rainfall->resetAttributes();
$obs_rainfall_list->renderRow();
?>
<?php if ($obs_rainfall_list->stationcode->Visible) { // stationcode ?>
	<?php
		$obs_rainfall_list->SearchColumnCount++;
		if (($obs_rainfall_list->SearchColumnCount - 1) % $obs_rainfall_list->SearchFieldsPerRow == 0) {
			$obs_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $obs_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_stationcode" class="ew-cell form-group">
		<label for="x_stationcode" class="ew-search-caption ew-label"><?php echo $obs_rainfall_list->stationcode->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_stationcode" id="z_stationcode" value="LIKE">
</span>
		<span id="el_obs_rainfall_stationcode" class="ew-search-field">
<input type="text" data-table="obs_rainfall" data-field="x_stationcode" name="x_stationcode" id="x_stationcode" size="30" maxlength="30" value="<?php echo $obs_rainfall_list->stationcode->EditValue ?>"<?php echo $obs_rainfall_list->stationcode->editAttributes() ?>>
</span>
	</div>
	<?php if ($obs_rainfall_list->SearchColumnCount % $obs_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->obs_Status->Visible) { // obs_Status ?>
	<?php
		$obs_rainfall_list->SearchColumnCount++;
		if (($obs_rainfall_list->SearchColumnCount - 1) % $obs_rainfall_list->SearchFieldsPerRow == 0) {
			$obs_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $obs_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_obs_Status" class="ew-cell form-group">
		<label for="x_obs_Status" class="ew-search-caption ew-label"><?php echo $obs_rainfall_list->obs_Status->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_obs_Status" id="z_obs_Status" value="=">
</span>
		<span id="el_obs_rainfall_obs_Status" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="obs_rainfall" data-field="x_obs_Status" data-value-separator="<?php echo $obs_rainfall_list->obs_Status->displayValueSeparatorAttribute() ?>" id="x_obs_Status" name="x_obs_Status"<?php echo $obs_rainfall_list->obs_Status->editAttributes() ?>>
			<?php echo $obs_rainfall_list->obs_Status->selectOptionListHtml("x_obs_Status") ?>
		</select>
</div>
<?php echo $obs_rainfall_list->obs_Status->Lookup->getParamTag($obs_rainfall_list, "p_x_obs_Status") ?>
</span>
	</div>
	<?php if ($obs_rainfall_list->SearchColumnCount % $obs_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php
		$obs_rainfall_list->SearchColumnCount++;
		if (($obs_rainfall_list->SearchColumnCount - 1) % $obs_rainfall_list->SearchFieldsPerRow == 0) {
			$obs_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $obs_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SubDivisionId" class="ew-cell form-group">
		<label for="x_SubDivisionId" class="ew-search-caption ew-label"><?php echo $obs_rainfall_list->SubDivisionId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubDivisionId" id="z_SubDivisionId" value="=">
</span>
		<span id="el_obs_rainfall_SubDivisionId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="obs_rainfall" data-field="x_SubDivisionId" data-value-separator="<?php echo $obs_rainfall_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x_SubDivisionId" name="x_SubDivisionId"<?php echo $obs_rainfall_list->SubDivisionId->editAttributes() ?>>
			<?php echo $obs_rainfall_list->SubDivisionId->selectOptionListHtml("x_SubDivisionId") ?>
		</select>
</div>
<?php echo $obs_rainfall_list->SubDivisionId->Lookup->getParamTag($obs_rainfall_list, "p_x_SubDivisionId") ?>
</span>
	</div>
	<?php if ($obs_rainfall_list->SearchColumnCount % $obs_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($obs_rainfall_list->SearchColumnCount % $obs_rainfall_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $obs_rainfall_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($obs_rainfall_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($obs_rainfall_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $obs_rainfall_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($obs_rainfall_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($obs_rainfall_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($obs_rainfall_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($obs_rainfall_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $obs_rainfall_list->showPageHeader(); ?>
<?php
$obs_rainfall_list->showMessage();
?>
<?php if ($obs_rainfall_list->TotalRecords > 0 || $obs_rainfall->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($obs_rainfall_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> obs_rainfall">
<?php if (!$obs_rainfall_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$obs_rainfall_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $obs_rainfall_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $obs_rainfall_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fobs_rainfalllist" id="fobs_rainfalllist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_rainfall">
<div id="gmp_obs_rainfall" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($obs_rainfall_list->TotalRecords > 0 || $obs_rainfall_list->isGridEdit()) { ?>
<table id="tbl_obs_rainfalllist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$obs_rainfall->RowType = ROWTYPE_HEADER;

// Render list options
$obs_rainfall_list->renderListOptions();

// Render list options (header, left)
$obs_rainfall_list->ListOptions->render("header", "left");
?>
<?php if ($obs_rainfall_list->obs_date->Visible) { // obs_date ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->obs_date) == "") { ?>
		<th data-name="obs_date" class="<?php echo $obs_rainfall_list->obs_date->headerCellClass() ?>"><div id="elh_obs_rainfall_obs_date" class="obs_rainfall_obs_date"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->obs_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_date" class="<?php echo $obs_rainfall_list->obs_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->obs_date) ?>', 2);"><div id="elh_obs_rainfall_obs_date" class="obs_rainfall_obs_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->obs_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->obs_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->obs_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->stationcode->Visible) { // stationcode ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->stationcode) == "") { ?>
		<th data-name="stationcode" class="<?php echo $obs_rainfall_list->stationcode->headerCellClass() ?>"><div id="elh_obs_rainfall_stationcode" class="obs_rainfall_stationcode"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->stationcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stationcode" class="<?php echo $obs_rainfall_list->stationcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->stationcode) ?>', 2);"><div id="elh_obs_rainfall_stationcode" class="obs_rainfall_stationcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->stationcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->stationcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->stationcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->rainfall->Visible) { // rainfall ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $obs_rainfall_list->rainfall->headerCellClass() ?>"><div id="elh_obs_rainfall_rainfall" class="obs_rainfall_rainfall"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $obs_rainfall_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->rainfall) ?>', 2);"><div id="elh_obs_rainfall_rainfall" class="obs_rainfall_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->rainfall_lastyear->Visible) { // rainfall_lastyear ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->rainfall_lastyear) == "") { ?>
		<th data-name="rainfall_lastyear" class="<?php echo $obs_rainfall_list->rainfall_lastyear->headerCellClass() ?>"><div id="elh_obs_rainfall_rainfall_lastyear" class="obs_rainfall_rainfall_lastyear"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->rainfall_lastyear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall_lastyear" class="<?php echo $obs_rainfall_list->rainfall_lastyear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->rainfall_lastyear) ?>', 2);"><div id="elh_obs_rainfall_rainfall_lastyear" class="obs_rainfall_rainfall_lastyear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->rainfall_lastyear->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->rainfall_lastyear->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->rainfall_lastyear->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->rainfall_30year_avg->Visible) { // rainfall_30year_avg ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->rainfall_30year_avg) == "") { ?>
		<th data-name="rainfall_30year_avg" class="<?php echo $obs_rainfall_list->rainfall_30year_avg->headerCellClass() ?>"><div id="elh_obs_rainfall_rainfall_30year_avg" class="obs_rainfall_rainfall_30year_avg"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->rainfall_30year_avg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall_30year_avg" class="<?php echo $obs_rainfall_list->rainfall_30year_avg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->rainfall_30year_avg) ?>', 2);"><div id="elh_obs_rainfall_rainfall_30year_avg" class="obs_rainfall_rainfall_30year_avg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->rainfall_30year_avg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->rainfall_30year_avg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->rainfall_30year_avg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->obs_Status->Visible) { // obs_Status ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->obs_Status) == "") { ?>
		<th data-name="obs_Status" class="<?php echo $obs_rainfall_list->obs_Status->headerCellClass() ?>"><div id="elh_obs_rainfall_obs_Status" class="obs_rainfall_obs_Status"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->obs_Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_Status" class="<?php echo $obs_rainfall_list->obs_Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->obs_Status) ?>', 2);"><div id="elh_obs_rainfall_obs_Status" class="obs_rainfall_obs_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->obs_Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->obs_Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->obs_Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->obs_remarks->Visible) { // obs_remarks ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->obs_remarks) == "") { ?>
		<th data-name="obs_remarks" class="<?php echo $obs_rainfall_list->obs_remarks->headerCellClass() ?>"><div id="elh_obs_rainfall_obs_remarks" class="obs_rainfall_obs_remarks"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->obs_remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_remarks" class="<?php echo $obs_rainfall_list->obs_remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->obs_remarks) ?>', 2);"><div id="elh_obs_rainfall_obs_remarks" class="obs_rainfall_obs_remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->obs_remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->obs_remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->obs_remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->Validated->Visible) { // Validated ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->Validated) == "") { ?>
		<th data-name="Validated" class="<?php echo $obs_rainfall_list->Validated->headerCellClass() ?>"><div id="elh_obs_rainfall_Validated" class="obs_rainfall_Validated"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->Validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Validated" class="<?php echo $obs_rainfall_list->Validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->Validated) ?>', 2);"><div id="elh_obs_rainfall_Validated" class="obs_rainfall_Validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->Validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->Validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->Validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_rainfall_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($obs_rainfall_list->SortUrl($obs_rainfall_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $obs_rainfall_list->SubDivisionId->headerCellClass() ?>"><div id="elh_obs_rainfall_SubDivisionId" class="obs_rainfall_SubDivisionId"><div class="ew-table-header-caption"><?php echo $obs_rainfall_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $obs_rainfall_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_rainfall_list->SortUrl($obs_rainfall_list->SubDivisionId) ?>', 2);"><div id="elh_obs_rainfall_SubDivisionId" class="obs_rainfall_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_rainfall_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_rainfall_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_rainfall_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$obs_rainfall_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($obs_rainfall_list->ExportAll && $obs_rainfall_list->isExport()) {
	$obs_rainfall_list->StopRecord = $obs_rainfall_list->TotalRecords;
} else {

	// Set the last record to display
	if ($obs_rainfall_list->TotalRecords > $obs_rainfall_list->StartRecord + $obs_rainfall_list->DisplayRecords - 1)
		$obs_rainfall_list->StopRecord = $obs_rainfall_list->StartRecord + $obs_rainfall_list->DisplayRecords - 1;
	else
		$obs_rainfall_list->StopRecord = $obs_rainfall_list->TotalRecords;
}
$obs_rainfall_list->RecordCount = $obs_rainfall_list->StartRecord - 1;
if ($obs_rainfall_list->Recordset && !$obs_rainfall_list->Recordset->EOF) {
	$obs_rainfall_list->Recordset->moveFirst();
	$selectLimit = $obs_rainfall_list->UseSelectLimit;
	if (!$selectLimit && $obs_rainfall_list->StartRecord > 1)
		$obs_rainfall_list->Recordset->move($obs_rainfall_list->StartRecord - 1);
} elseif (!$obs_rainfall->AllowAddDeleteRow && $obs_rainfall_list->StopRecord == 0) {
	$obs_rainfall_list->StopRecord = $obs_rainfall->GridAddRowCount;
}

// Initialize aggregate
$obs_rainfall->RowType = ROWTYPE_AGGREGATEINIT;
$obs_rainfall->resetAttributes();
$obs_rainfall_list->renderRow();
while ($obs_rainfall_list->RecordCount < $obs_rainfall_list->StopRecord) {
	$obs_rainfall_list->RecordCount++;
	if ($obs_rainfall_list->RecordCount >= $obs_rainfall_list->StartRecord) {
		$obs_rainfall_list->RowCount++;

		// Set up key count
		$obs_rainfall_list->KeyCount = $obs_rainfall_list->RowIndex;

		// Init row class and style
		$obs_rainfall->resetAttributes();
		$obs_rainfall->CssClass = "";
		if ($obs_rainfall_list->isGridAdd()) {
		} else {
			$obs_rainfall_list->loadRowValues($obs_rainfall_list->Recordset); // Load row values
		}
		$obs_rainfall->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$obs_rainfall->RowAttrs->merge(["data-rowindex" => $obs_rainfall_list->RowCount, "id" => "r" . $obs_rainfall_list->RowCount . "_obs_rainfall", "data-rowtype" => $obs_rainfall->RowType]);

		// Render row
		$obs_rainfall_list->renderRow();

		// Render list options
		$obs_rainfall_list->renderListOptions();
?>
	<tr <?php echo $obs_rainfall->rowAttributes() ?>>
<?php

// Render list options (body, left)
$obs_rainfall_list->ListOptions->render("body", "left", $obs_rainfall_list->RowCount);
?>
	<?php if ($obs_rainfall_list->obs_date->Visible) { // obs_date ?>
		<td data-name="obs_date" <?php echo $obs_rainfall_list->obs_date->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_obs_date">
<span<?php echo $obs_rainfall_list->obs_date->viewAttributes() ?>><?php echo $obs_rainfall_list->obs_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_rainfall_list->stationcode->Visible) { // stationcode ?>
		<td data-name="stationcode" <?php echo $obs_rainfall_list->stationcode->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_stationcode">
<span<?php echo $obs_rainfall_list->stationcode->viewAttributes() ?>><?php echo $obs_rainfall_list->stationcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_rainfall_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $obs_rainfall_list->rainfall->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_rainfall">
<span<?php echo $obs_rainfall_list->rainfall->viewAttributes() ?>><?php echo $obs_rainfall_list->rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_rainfall_list->rainfall_lastyear->Visible) { // rainfall_lastyear ?>
		<td data-name="rainfall_lastyear" <?php echo $obs_rainfall_list->rainfall_lastyear->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_rainfall_lastyear">
<span<?php echo $obs_rainfall_list->rainfall_lastyear->viewAttributes() ?>><?php echo $obs_rainfall_list->rainfall_lastyear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_rainfall_list->rainfall_30year_avg->Visible) { // rainfall_30year_avg ?>
		<td data-name="rainfall_30year_avg" <?php echo $obs_rainfall_list->rainfall_30year_avg->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_rainfall_30year_avg">
<span<?php echo $obs_rainfall_list->rainfall_30year_avg->viewAttributes() ?>><?php echo $obs_rainfall_list->rainfall_30year_avg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_rainfall_list->obs_Status->Visible) { // obs_Status ?>
		<td data-name="obs_Status" <?php echo $obs_rainfall_list->obs_Status->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_obs_Status">
<span<?php echo $obs_rainfall_list->obs_Status->viewAttributes() ?>><?php echo $obs_rainfall_list->obs_Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_rainfall_list->obs_remarks->Visible) { // obs_remarks ?>
		<td data-name="obs_remarks" <?php echo $obs_rainfall_list->obs_remarks->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_obs_remarks">
<span<?php echo $obs_rainfall_list->obs_remarks->viewAttributes() ?>><?php echo $obs_rainfall_list->obs_remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_rainfall_list->Validated->Visible) { // Validated ?>
		<td data-name="Validated" <?php echo $obs_rainfall_list->Validated->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_Validated">
<span<?php echo $obs_rainfall_list->Validated->viewAttributes() ?>><?php echo $obs_rainfall_list->Validated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_rainfall_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $obs_rainfall_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $obs_rainfall_list->RowCount ?>_obs_rainfall_SubDivisionId">
<span<?php echo $obs_rainfall_list->SubDivisionId->viewAttributes() ?>><?php echo $obs_rainfall_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$obs_rainfall_list->ListOptions->render("body", "right", $obs_rainfall_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$obs_rainfall_list->isGridAdd())
		$obs_rainfall_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$obs_rainfall->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($obs_rainfall_list->Recordset)
	$obs_rainfall_list->Recordset->Close();
?>
<?php if (!$obs_rainfall_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$obs_rainfall_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $obs_rainfall_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $obs_rainfall_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($obs_rainfall_list->TotalRecords == 0 && !$obs_rainfall->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $obs_rainfall_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$obs_rainfall_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$obs_rainfall_list->isExport()) { ?>
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
$obs_rainfall_list->terminate();
?>