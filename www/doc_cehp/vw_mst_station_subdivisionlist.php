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
$vw_mst_station_subdivision_list = new vw_mst_station_subdivision_list();

// Run the page
$vw_mst_station_subdivision_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_mst_station_subdivision_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_mst_station_subdivision_list->isExport()) { ?>
<script>
var fvw_mst_station_subdivisionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_mst_station_subdivisionlist = currentForm = new ew.Form("fvw_mst_station_subdivisionlist", "list");
	fvw_mst_station_subdivisionlist.formKeyCountName = '<?php echo $vw_mst_station_subdivision_list->FormKeyCountName ?>';
	loadjs.done("fvw_mst_station_subdivisionlist");
});
var fvw_mst_station_subdivisionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_mst_station_subdivisionlistsrch = currentSearchForm = new ew.Form("fvw_mst_station_subdivisionlistsrch");

	// Validate function for search
	fvw_mst_station_subdivisionlistsrch.validate = function(fobj) {
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
	fvw_mst_station_subdivisionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_mst_station_subdivisionlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_mst_station_subdivisionlistsrch.lists["x_StationCode"] = <?php echo $vw_mst_station_subdivision_list->StationCode->Lookup->toClientList($vw_mst_station_subdivision_list) ?>;
	fvw_mst_station_subdivisionlistsrch.lists["x_StationCode"].options = <?php echo JsonEncode($vw_mst_station_subdivision_list->StationCode->lookupOptions()) ?>;
	fvw_mst_station_subdivisionlistsrch.lists["x_SubDivisionId"] = <?php echo $vw_mst_station_subdivision_list->SubDivisionId->Lookup->toClientList($vw_mst_station_subdivision_list) ?>;
	fvw_mst_station_subdivisionlistsrch.lists["x_SubDivisionId"].options = <?php echo JsonEncode($vw_mst_station_subdivision_list->SubDivisionId->lookupOptions()) ?>;

	// Filters
	fvw_mst_station_subdivisionlistsrch.filterList = <?php echo $vw_mst_station_subdivision_list->getFilterList() ?>;
	loadjs.done("fvw_mst_station_subdivisionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_mst_station_subdivision_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_mst_station_subdivision_list->TotalRecords > 0 && $vw_mst_station_subdivision_list->ExportOptions->visible()) { ?>
<?php $vw_mst_station_subdivision_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->ImportOptions->visible()) { ?>
<?php $vw_mst_station_subdivision_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->SearchOptions->visible()) { ?>
<?php $vw_mst_station_subdivision_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->FilterOptions->visible()) { ?>
<?php $vw_mst_station_subdivision_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_mst_station_subdivision_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_mst_station_subdivision_list->isExport() && !$vw_mst_station_subdivision->CurrentAction) { ?>
<form name="fvw_mst_station_subdivisionlistsrch" id="fvw_mst_station_subdivisionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_mst_station_subdivisionlistsrch-search-panel" class="<?php echo $vw_mst_station_subdivision_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_mst_station_subdivision">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_mst_station_subdivision->RowType = ROWTYPE_SEARCH;
$vw_mst_station_subdivision->resetAttributes();
$vw_mst_station_subdivision_list->renderRow();
?>
<?php if ($vw_mst_station_subdivision_list->StationCode->Visible) { // StationCode ?>
	<?php
		$vw_mst_station_subdivision_list->SearchColumnCount++;
		if (($vw_mst_station_subdivision_list->SearchColumnCount - 1) % $vw_mst_station_subdivision_list->SearchFieldsPerRow == 0) {
			$vw_mst_station_subdivision_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_mst_station_subdivision_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationCode" class="ew-cell form-group">
		<label for="x_StationCode" class="ew-search-caption ew-label"><?php echo $vw_mst_station_subdivision_list->StationCode->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_StationCode" id="z_StationCode" value="=">
</span>
		<span id="el_vw_mst_station_subdivision_StationCode" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_mst_station_subdivision" data-field="x_StationCode" data-value-separator="<?php echo $vw_mst_station_subdivision_list->StationCode->displayValueSeparatorAttribute() ?>" id="x_StationCode" name="x_StationCode"<?php echo $vw_mst_station_subdivision_list->StationCode->editAttributes() ?>>
			<?php echo $vw_mst_station_subdivision_list->StationCode->selectOptionListHtml("x_StationCode") ?>
		</select>
</div>
<?php echo $vw_mst_station_subdivision_list->StationCode->Lookup->getParamTag($vw_mst_station_subdivision_list, "p_x_StationCode") ?>
</span>
	</div>
	<?php if ($vw_mst_station_subdivision_list->SearchColumnCount % $vw_mst_station_subdivision_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php
		$vw_mst_station_subdivision_list->SearchColumnCount++;
		if (($vw_mst_station_subdivision_list->SearchColumnCount - 1) % $vw_mst_station_subdivision_list->SearchFieldsPerRow == 0) {
			$vw_mst_station_subdivision_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_mst_station_subdivision_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $vw_mst_station_subdivision_list->MobileNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		<span id="el_vw_mst_station_subdivision_MobileNumber" class="ew-search-field">
<input type="text" data-table="vw_mst_station_subdivision" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="15" value="<?php echo $vw_mst_station_subdivision_list->MobileNumber->EditValue ?>"<?php echo $vw_mst_station_subdivision_list->MobileNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($vw_mst_station_subdivision_list->SearchColumnCount % $vw_mst_station_subdivision_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php
		$vw_mst_station_subdivision_list->SearchColumnCount++;
		if (($vw_mst_station_subdivision_list->SearchColumnCount - 1) % $vw_mst_station_subdivision_list->SearchFieldsPerRow == 0) {
			$vw_mst_station_subdivision_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_mst_station_subdivision_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SubDivisionId" class="ew-cell form-group">
		<label for="x_SubDivisionId" class="ew-search-caption ew-label"><?php echo $vw_mst_station_subdivision_list->SubDivisionId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubDivisionId" id="z_SubDivisionId" value="=">
</span>
		<span id="el_vw_mst_station_subdivision_SubDivisionId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_mst_station_subdivision" data-field="x_SubDivisionId" data-value-separator="<?php echo $vw_mst_station_subdivision_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x_SubDivisionId" name="x_SubDivisionId"<?php echo $vw_mst_station_subdivision_list->SubDivisionId->editAttributes() ?>>
			<?php echo $vw_mst_station_subdivision_list->SubDivisionId->selectOptionListHtml("x_SubDivisionId") ?>
		</select>
</div>
<?php echo $vw_mst_station_subdivision_list->SubDivisionId->Lookup->getParamTag($vw_mst_station_subdivision_list, "p_x_SubDivisionId") ?>
</span>
	</div>
	<?php if ($vw_mst_station_subdivision_list->SearchColumnCount % $vw_mst_station_subdivision_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_mst_station_subdivision_list->SearchColumnCount % $vw_mst_station_subdivision_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_mst_station_subdivision_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_mst_station_subdivision_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_mst_station_subdivision_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_mst_station_subdivision_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_mst_station_subdivision_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_mst_station_subdivision_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_mst_station_subdivision_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_mst_station_subdivision_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_mst_station_subdivision_list->showPageHeader(); ?>
<?php
$vw_mst_station_subdivision_list->showMessage();
?>
<?php if ($vw_mst_station_subdivision_list->TotalRecords > 0 || $vw_mst_station_subdivision->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_mst_station_subdivision_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_mst_station_subdivision">
<?php if (!$vw_mst_station_subdivision_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_mst_station_subdivision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_mst_station_subdivision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_mst_station_subdivision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_mst_station_subdivisionlist" id="fvw_mst_station_subdivisionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_mst_station_subdivision">
<div id="gmp_vw_mst_station_subdivision" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_mst_station_subdivision_list->TotalRecords > 0 || $vw_mst_station_subdivision_list->isGridEdit()) { ?>
<table id="tbl_vw_mst_station_subdivisionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_mst_station_subdivision->RowType = ROWTYPE_HEADER;

// Render list options
$vw_mst_station_subdivision_list->renderListOptions();

// Render list options (header, left)
$vw_mst_station_subdivision_list->ListOptions->render("header", "left");
?>
<?php if ($vw_mst_station_subdivision_list->StationId->Visible) { // StationId ?>
	<?php if ($vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $vw_mst_station_subdivision_list->StationId->headerCellClass() ?>"><div id="elh_vw_mst_station_subdivision_StationId" class="vw_mst_station_subdivision_StationId"><div class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $vw_mst_station_subdivision_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->StationId) ?>', 2);"><div id="elh_vw_mst_station_subdivision_StationId" class="vw_mst_station_subdivision_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_subdivision_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_subdivision_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->StationCode->Visible) { // StationCode ?>
	<?php if ($vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->StationCode) == "") { ?>
		<th data-name="StationCode" class="<?php echo $vw_mst_station_subdivision_list->StationCode->headerCellClass() ?>"><div id="elh_vw_mst_station_subdivision_StationCode" class="vw_mst_station_subdivision_StationCode"><div class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->StationCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationCode" class="<?php echo $vw_mst_station_subdivision_list->StationCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->StationCode) ?>', 2);"><div id="elh_vw_mst_station_subdivision_StationCode" class="vw_mst_station_subdivision_StationCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->StationCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_subdivision_list->StationCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_subdivision_list->StationCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_mst_station_subdivision_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_mst_station_subdivision_MobileNumber" class="vw_mst_station_subdivision_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_mst_station_subdivision_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->MobileNumber) ?>', 2);"><div id="elh_vw_mst_station_subdivision_MobileNumber" class="vw_mst_station_subdivision_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_subdivision_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_subdivision_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_mst_station_subdivision_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_mst_station_subdivision_SubDivisionId" class="vw_mst_station_subdivision_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_mst_station_subdivision_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->SubDivisionId) ?>', 2);"><div id="elh_vw_mst_station_subdivision_SubDivisionId" class="vw_mst_station_subdivision_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_subdivision_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_subdivision_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->last_reading_date->Visible) { // last_reading_date ?>
	<?php if ($vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->last_reading_date) == "") { ?>
		<th data-name="last_reading_date" class="<?php echo $vw_mst_station_subdivision_list->last_reading_date->headerCellClass() ?>"><div id="elh_vw_mst_station_subdivision_last_reading_date" class="vw_mst_station_subdivision_last_reading_date"><div class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->last_reading_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_reading_date" class="<?php echo $vw_mst_station_subdivision_list->last_reading_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->last_reading_date) ?>', 2);"><div id="elh_vw_mst_station_subdivision_last_reading_date" class="vw_mst_station_subdivision_last_reading_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->last_reading_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_subdivision_list->last_reading_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_subdivision_list->last_reading_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->first_reading_date->Visible) { // first_reading_date ?>
	<?php if ($vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->first_reading_date) == "") { ?>
		<th data-name="first_reading_date" class="<?php echo $vw_mst_station_subdivision_list->first_reading_date->headerCellClass() ?>"><div id="elh_vw_mst_station_subdivision_first_reading_date" class="vw_mst_station_subdivision_first_reading_date"><div class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->first_reading_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_reading_date" class="<?php echo $vw_mst_station_subdivision_list->first_reading_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_subdivision_list->SortUrl($vw_mst_station_subdivision_list->first_reading_date) ?>', 2);"><div id="elh_vw_mst_station_subdivision_first_reading_date" class="vw_mst_station_subdivision_first_reading_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_subdivision_list->first_reading_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_subdivision_list->first_reading_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_subdivision_list->first_reading_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_mst_station_subdivision_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_mst_station_subdivision_list->ExportAll && $vw_mst_station_subdivision_list->isExport()) {
	$vw_mst_station_subdivision_list->StopRecord = $vw_mst_station_subdivision_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_mst_station_subdivision_list->TotalRecords > $vw_mst_station_subdivision_list->StartRecord + $vw_mst_station_subdivision_list->DisplayRecords - 1)
		$vw_mst_station_subdivision_list->StopRecord = $vw_mst_station_subdivision_list->StartRecord + $vw_mst_station_subdivision_list->DisplayRecords - 1;
	else
		$vw_mst_station_subdivision_list->StopRecord = $vw_mst_station_subdivision_list->TotalRecords;
}
$vw_mst_station_subdivision_list->RecordCount = $vw_mst_station_subdivision_list->StartRecord - 1;
if ($vw_mst_station_subdivision_list->Recordset && !$vw_mst_station_subdivision_list->Recordset->EOF) {
	$vw_mst_station_subdivision_list->Recordset->moveFirst();
	$selectLimit = $vw_mst_station_subdivision_list->UseSelectLimit;
	if (!$selectLimit && $vw_mst_station_subdivision_list->StartRecord > 1)
		$vw_mst_station_subdivision_list->Recordset->move($vw_mst_station_subdivision_list->StartRecord - 1);
} elseif (!$vw_mst_station_subdivision->AllowAddDeleteRow && $vw_mst_station_subdivision_list->StopRecord == 0) {
	$vw_mst_station_subdivision_list->StopRecord = $vw_mst_station_subdivision->GridAddRowCount;
}

// Initialize aggregate
$vw_mst_station_subdivision->RowType = ROWTYPE_AGGREGATEINIT;
$vw_mst_station_subdivision->resetAttributes();
$vw_mst_station_subdivision_list->renderRow();
while ($vw_mst_station_subdivision_list->RecordCount < $vw_mst_station_subdivision_list->StopRecord) {
	$vw_mst_station_subdivision_list->RecordCount++;
	if ($vw_mst_station_subdivision_list->RecordCount >= $vw_mst_station_subdivision_list->StartRecord) {
		$vw_mst_station_subdivision_list->RowCount++;

		// Set up key count
		$vw_mst_station_subdivision_list->KeyCount = $vw_mst_station_subdivision_list->RowIndex;

		// Init row class and style
		$vw_mst_station_subdivision->resetAttributes();
		$vw_mst_station_subdivision->CssClass = "";
		if ($vw_mst_station_subdivision_list->isGridAdd()) {
		} else {
			$vw_mst_station_subdivision_list->loadRowValues($vw_mst_station_subdivision_list->Recordset); // Load row values
		}
		$vw_mst_station_subdivision->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_mst_station_subdivision->RowAttrs->merge(["data-rowindex" => $vw_mst_station_subdivision_list->RowCount, "id" => "r" . $vw_mst_station_subdivision_list->RowCount . "_vw_mst_station_subdivision", "data-rowtype" => $vw_mst_station_subdivision->RowType]);

		// Render row
		$vw_mst_station_subdivision_list->renderRow();

		// Render list options
		$vw_mst_station_subdivision_list->renderListOptions();
?>
	<tr <?php echo $vw_mst_station_subdivision->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_mst_station_subdivision_list->ListOptions->render("body", "left", $vw_mst_station_subdivision_list->RowCount);
?>
	<?php if ($vw_mst_station_subdivision_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $vw_mst_station_subdivision_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_subdivision_list->RowCount ?>_vw_mst_station_subdivision_StationId">
<span<?php echo $vw_mst_station_subdivision_list->StationId->viewAttributes() ?>><?php echo $vw_mst_station_subdivision_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_subdivision_list->StationCode->Visible) { // StationCode ?>
		<td data-name="StationCode" <?php echo $vw_mst_station_subdivision_list->StationCode->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_subdivision_list->RowCount ?>_vw_mst_station_subdivision_StationCode">
<span<?php echo $vw_mst_station_subdivision_list->StationCode->viewAttributes() ?>><?php echo $vw_mst_station_subdivision_list->StationCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_subdivision_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_mst_station_subdivision_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_subdivision_list->RowCount ?>_vw_mst_station_subdivision_MobileNumber">
<span<?php echo $vw_mst_station_subdivision_list->MobileNumber->viewAttributes() ?>><?php echo $vw_mst_station_subdivision_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_mst_station_subdivision_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_subdivision_list->RowCount ?>_vw_mst_station_subdivision_SubDivisionId">
<span<?php echo $vw_mst_station_subdivision_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_mst_station_subdivision_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_subdivision_list->last_reading_date->Visible) { // last_reading_date ?>
		<td data-name="last_reading_date" <?php echo $vw_mst_station_subdivision_list->last_reading_date->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_subdivision_list->RowCount ?>_vw_mst_station_subdivision_last_reading_date">
<span<?php echo $vw_mst_station_subdivision_list->last_reading_date->viewAttributes() ?>><?php echo $vw_mst_station_subdivision_list->last_reading_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_subdivision_list->first_reading_date->Visible) { // first_reading_date ?>
		<td data-name="first_reading_date" <?php echo $vw_mst_station_subdivision_list->first_reading_date->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_subdivision_list->RowCount ?>_vw_mst_station_subdivision_first_reading_date">
<span<?php echo $vw_mst_station_subdivision_list->first_reading_date->viewAttributes() ?>><?php echo $vw_mst_station_subdivision_list->first_reading_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_mst_station_subdivision_list->ListOptions->render("body", "right", $vw_mst_station_subdivision_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_mst_station_subdivision_list->isGridAdd())
		$vw_mst_station_subdivision_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_mst_station_subdivision->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_mst_station_subdivision_list->Recordset)
	$vw_mst_station_subdivision_list->Recordset->Close();
?>
<?php if (!$vw_mst_station_subdivision_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_mst_station_subdivision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_mst_station_subdivision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_mst_station_subdivision_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_mst_station_subdivision_list->TotalRecords == 0 && !$vw_mst_station_subdivision->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_mst_station_subdivision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_mst_station_subdivision_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_mst_station_subdivision_list->isExport()) { ?>
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
$vw_mst_station_subdivision_list->terminate();
?>