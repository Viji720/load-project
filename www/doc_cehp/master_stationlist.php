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
$master_station_list = new master_station_list();

// Run the page
$master_station_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_station_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_station_list->isExport()) { ?>
<script>
var fmaster_stationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_stationlist = currentForm = new ew.Form("fmaster_stationlist", "list");
	fmaster_stationlist.formKeyCountName = '<?php echo $master_station_list->FormKeyCountName ?>';
	loadjs.done("fmaster_stationlist");
});
var fmaster_stationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_stationlistsrch = currentSearchForm = new ew.Form("fmaster_stationlistsrch");

	// Validate function for search
	fmaster_stationlistsrch.validate = function(fobj) {
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
	fmaster_stationlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_stationlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmaster_stationlistsrch.lists["x_SubDivisionId"] = <?php echo $master_station_list->SubDivisionId->Lookup->toClientList($master_station_list) ?>;
	fmaster_stationlistsrch.lists["x_SubDivisionId"].options = <?php echo JsonEncode($master_station_list->SubDivisionId->lookupOptions()) ?>;

	// Filters
	fmaster_stationlistsrch.filterList = <?php echo $master_station_list->getFilterList() ?>;
	loadjs.done("fmaster_stationlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_station_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_station_list->TotalRecords > 0 && $master_station_list->ExportOptions->visible()) { ?>
<?php $master_station_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_station_list->ImportOptions->visible()) { ?>
<?php $master_station_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_station_list->SearchOptions->visible()) { ?>
<?php $master_station_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_station_list->FilterOptions->visible()) { ?>
<?php $master_station_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_station_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_station_list->isExport() && !$master_station->CurrentAction) { ?>
<form name="fmaster_stationlistsrch" id="fmaster_stationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_stationlistsrch-search-panel" class="<?php echo $master_station_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_station">
	<div class="ew-extended-search">
<?php

// Render search row
$master_station->RowType = ROWTYPE_SEARCH;
$master_station->resetAttributes();
$master_station_list->renderRow();
?>
<?php if ($master_station_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php
		$master_station_list->SearchColumnCount++;
		if (($master_station_list->SearchColumnCount - 1) % $master_station_list->SearchFieldsPerRow == 0) {
			$master_station_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $master_station_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SubDivisionId" class="ew-cell form-group">
		<label for="x_SubDivisionId" class="ew-search-caption ew-label"><?php echo $master_station_list->SubDivisionId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubDivisionId" id="z_SubDivisionId" value="=">
</span>
		<span id="el_master_station_SubDivisionId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="master_station" data-field="x_SubDivisionId" data-value-separator="<?php echo $master_station_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x_SubDivisionId" name="x_SubDivisionId"<?php echo $master_station_list->SubDivisionId->editAttributes() ?>>
			<?php echo $master_station_list->SubDivisionId->selectOptionListHtml("x_SubDivisionId") ?>
		</select>
</div>
<?php echo $master_station_list->SubDivisionId->Lookup->getParamTag($master_station_list, "p_x_SubDivisionId") ?>
</span>
	</div>
	<?php if ($master_station_list->SearchColumnCount % $master_station_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->StationName->Visible) { // StationName ?>
	<?php
		$master_station_list->SearchColumnCount++;
		if (($master_station_list->SearchColumnCount - 1) % $master_station_list->SearchFieldsPerRow == 0) {
			$master_station_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $master_station_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationName" class="ew-cell form-group">
		<label for="x_StationName" class="ew-search-caption ew-label"><?php echo $master_station_list->StationName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_StationName" id="z_StationName" value="LIKE">
</span>
		<span id="el_master_station_StationName" class="ew-search-field">
<input type="text" data-table="master_station" data-field="x_StationName" name="x_StationName" id="x_StationName" size="20" maxlength="50" value="<?php echo $master_station_list->StationName->EditValue ?>"<?php echo $master_station_list->StationName->editAttributes() ?>>
</span>
	</div>
	<?php if ($master_station_list->SearchColumnCount % $master_station_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php
		$master_station_list->SearchColumnCount++;
		if (($master_station_list->SearchColumnCount - 1) % $master_station_list->SearchFieldsPerRow == 0) {
			$master_station_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $master_station_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $master_station_list->MobileNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		<span id="el_master_station_MobileNumber" class="ew-search-field">
<input type="text" data-table="master_station" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="12" maxlength="12" value="<?php echo $master_station_list->MobileNumber->EditValue ?>"<?php echo $master_station_list->MobileNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($master_station_list->SearchColumnCount % $master_station_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($master_station_list->SearchColumnCount % $master_station_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $master_station_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_station_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_station_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_station_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_station_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_station_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_station_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_station_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_station_list->showPageHeader(); ?>
<?php
$master_station_list->showMessage();
?>
<?php if ($master_station_list->TotalRecords > 0 || $master_station->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_station_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_station">
<?php if (!$master_station_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_station_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_station_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_station_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_stationlist" id="fmaster_stationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_station">
<div id="gmp_master_station" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_station_list->TotalRecords > 0 || $master_station_list->isGridEdit()) { ?>
<table id="tbl_master_stationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_station->RowType = ROWTYPE_HEADER;

// Render list options
$master_station_list->renderListOptions();

// Render list options (header, left)
$master_station_list->ListOptions->render("header", "left");
?>
<?php if ($master_station_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($master_station_list->SortUrl($master_station_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $master_station_list->SubDivisionId->headerCellClass() ?>"><div id="elh_master_station_SubDivisionId" class="master_station_SubDivisionId"><div class="ew-table-header-caption"><?php echo $master_station_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $master_station_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->SubDivisionId) ?>', 2);"><div id="elh_master_station_SubDivisionId" class="master_station_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->StationName->Visible) { // StationName ?>
	<?php if ($master_station_list->SortUrl($master_station_list->StationName) == "") { ?>
		<th data-name="StationName" class="<?php echo $master_station_list->StationName->headerCellClass() ?>"><div id="elh_master_station_StationName" class="master_station_StationName"><div class="ew-table-header-caption"><?php echo $master_station_list->StationName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationName" class="<?php echo $master_station_list->StationName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->StationName) ?>', 2);"><div id="elh_master_station_StationName" class="master_station_StationName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->StationName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->StationName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->StationName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->StationName_kn->Visible) { // StationName_kn ?>
	<?php if ($master_station_list->SortUrl($master_station_list->StationName_kn) == "") { ?>
		<th data-name="StationName_kn" class="<?php echo $master_station_list->StationName_kn->headerCellClass() ?>"><div id="elh_master_station_StationName_kn" class="master_station_StationName_kn"><div class="ew-table-header-caption"><?php echo $master_station_list->StationName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationName_kn" class="<?php echo $master_station_list->StationName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->StationName_kn) ?>', 2);"><div id="elh_master_station_StationName_kn" class="master_station_StationName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->StationName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->StationName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->StationName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($master_station_list->SortUrl($master_station_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $master_station_list->MobileNumber->headerCellClass() ?>"><div id="elh_master_station_MobileNumber" class="master_station_MobileNumber"><div class="ew-table-header-caption"><?php echo $master_station_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $master_station_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->MobileNumber) ?>', 2);"><div id="elh_master_station_MobileNumber" class="master_station_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->Longitude->Visible) { // Longitude ?>
	<?php if ($master_station_list->SortUrl($master_station_list->Longitude) == "") { ?>
		<th data-name="Longitude" class="<?php echo $master_station_list->Longitude->headerCellClass() ?>"><div id="elh_master_station_Longitude" class="master_station_Longitude"><div class="ew-table-header-caption"><?php echo $master_station_list->Longitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Longitude" class="<?php echo $master_station_list->Longitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->Longitude) ?>', 2);"><div id="elh_master_station_Longitude" class="master_station_Longitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->Longitude->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->Longitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->Longitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->Latitude->Visible) { // Latitude ?>
	<?php if ($master_station_list->SortUrl($master_station_list->Latitude) == "") { ?>
		<th data-name="Latitude" class="<?php echo $master_station_list->Latitude->headerCellClass() ?>"><div id="elh_master_station_Latitude" class="master_station_Latitude"><div class="ew-table-header-caption"><?php echo $master_station_list->Latitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Latitude" class="<?php echo $master_station_list->Latitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->Latitude) ?>', 2);"><div id="elh_master_station_Latitude" class="master_station_Latitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->Latitude->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->Latitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->Latitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->Altitude_MSL_in_mtrs->Visible) { // Altitude_MSL_in_mtrs ?>
	<?php if ($master_station_list->SortUrl($master_station_list->Altitude_MSL_in_mtrs) == "") { ?>
		<th data-name="Altitude_MSL_in_mtrs" class="<?php echo $master_station_list->Altitude_MSL_in_mtrs->headerCellClass() ?>"><div id="elh_master_station_Altitude_MSL_in_mtrs" class="master_station_Altitude_MSL_in_mtrs"><div class="ew-table-header-caption"><?php echo $master_station_list->Altitude_MSL_in_mtrs->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Altitude_MSL_in_mtrs" class="<?php echo $master_station_list->Altitude_MSL_in_mtrs->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->Altitude_MSL_in_mtrs) ?>', 2);"><div id="elh_master_station_Altitude_MSL_in_mtrs" class="master_station_Altitude_MSL_in_mtrs">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->Altitude_MSL_in_mtrs->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->Altitude_MSL_in_mtrs->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->Altitude_MSL_in_mtrs->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->station_type->Visible) { // station_type ?>
	<?php if ($master_station_list->SortUrl($master_station_list->station_type) == "") { ?>
		<th data-name="station_type" class="<?php echo $master_station_list->station_type->headerCellClass() ?>"><div id="elh_master_station_station_type" class="master_station_station_type"><div class="ew-table-header-caption"><?php echo $master_station_list->station_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_type" class="<?php echo $master_station_list->station_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->station_type) ?>', 2);"><div id="elh_master_station_station_type" class="master_station_station_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->station_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->station_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->station_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->IsActive->Visible) { // IsActive ?>
	<?php if ($master_station_list->SortUrl($master_station_list->IsActive) == "") { ?>
		<th data-name="IsActive" class="<?php echo $master_station_list->IsActive->headerCellClass() ?>"><div id="elh_master_station_IsActive" class="master_station_IsActive"><div class="ew-table-header-caption"><?php echo $master_station_list->IsActive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsActive" class="<?php echo $master_station_list->IsActive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->IsActive) ?>', 2);"><div id="elh_master_station_IsActive" class="master_station_IsActive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->IsActive->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->IsActive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->IsActive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->last_active_date->Visible) { // last_active_date ?>
	<?php if ($master_station_list->SortUrl($master_station_list->last_active_date) == "") { ?>
		<th data-name="last_active_date" class="<?php echo $master_station_list->last_active_date->headerCellClass() ?>"><div id="elh_master_station_last_active_date" class="master_station_last_active_date"><div class="ew-table-header-caption"><?php echo $master_station_list->last_active_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_active_date" class="<?php echo $master_station_list->last_active_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->last_active_date) ?>', 2);"><div id="elh_master_station_last_active_date" class="master_station_last_active_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->last_active_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->last_active_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->last_active_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->DistrictId->Visible) { // DistrictId ?>
	<?php if ($master_station_list->SortUrl($master_station_list->DistrictId) == "") { ?>
		<th data-name="DistrictId" class="<?php echo $master_station_list->DistrictId->headerCellClass() ?>"><div id="elh_master_station_DistrictId" class="master_station_DistrictId"><div class="ew-table-header-caption"><?php echo $master_station_list->DistrictId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictId" class="<?php echo $master_station_list->DistrictId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->DistrictId) ?>', 2);"><div id="elh_master_station_DistrictId" class="master_station_DistrictId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->DistrictId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->DistrictId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->DistrictId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->TalukID->Visible) { // TalukID ?>
	<?php if ($master_station_list->SortUrl($master_station_list->TalukID) == "") { ?>
		<th data-name="TalukID" class="<?php echo $master_station_list->TalukID->headerCellClass() ?>"><div id="elh_master_station_TalukID" class="master_station_TalukID"><div class="ew-table-header-caption"><?php echo $master_station_list->TalukID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukID" class="<?php echo $master_station_list->TalukID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->TalukID) ?>', 2);"><div id="elh_master_station_TalukID" class="master_station_TalukID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->TalukID->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->TalukID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->TalukID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->BasinId->Visible) { // BasinId ?>
	<?php if ($master_station_list->SortUrl($master_station_list->BasinId) == "") { ?>
		<th data-name="BasinId" class="<?php echo $master_station_list->BasinId->headerCellClass() ?>"><div id="elh_master_station_BasinId" class="master_station_BasinId"><div class="ew-table-header-caption"><?php echo $master_station_list->BasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinId" class="<?php echo $master_station_list->BasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->BasinId) ?>', 2);"><div id="elh_master_station_BasinId" class="master_station_BasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->BasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->BasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->BasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->SubBasinId->Visible) { // SubBasinId ?>
	<?php if ($master_station_list->SortUrl($master_station_list->SubBasinId) == "") { ?>
		<th data-name="SubBasinId" class="<?php echo $master_station_list->SubBasinId->headerCellClass() ?>"><div id="elh_master_station_SubBasinId" class="master_station_SubBasinId"><div class="ew-table-header-caption"><?php echo $master_station_list->SubBasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinId" class="<?php echo $master_station_list->SubBasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->SubBasinId) ?>', 2);"><div id="elh_master_station_SubBasinId" class="master_station_SubBasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->SubBasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->SubBasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->SubBasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->CatchUpId->Visible) { // CatchUpId ?>
	<?php if ($master_station_list->SortUrl($master_station_list->CatchUpId) == "") { ?>
		<th data-name="CatchUpId" class="<?php echo $master_station_list->CatchUpId->headerCellClass() ?>"><div id="elh_master_station_CatchUpId" class="master_station_CatchUpId"><div class="ew-table-header-caption"><?php echo $master_station_list->CatchUpId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CatchUpId" class="<?php echo $master_station_list->CatchUpId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->CatchUpId) ?>', 2);"><div id="elh_master_station_CatchUpId" class="master_station_CatchUpId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->CatchUpId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->CatchUpId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->CatchUpId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->PIC->Visible) { // PIC ?>
	<?php if ($master_station_list->SortUrl($master_station_list->PIC) == "") { ?>
		<th data-name="PIC" class="<?php echo $master_station_list->PIC->headerCellClass() ?>"><div id="elh_master_station_PIC" class="master_station_PIC"><div class="ew-table-header-caption"><?php echo $master_station_list->PIC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PIC" class="<?php echo $master_station_list->PIC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->PIC) ?>', 2);"><div id="elh_master_station_PIC" class="master_station_PIC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->PIC->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->PIC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->PIC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->RiverId->Visible) { // RiverId ?>
	<?php if ($master_station_list->SortUrl($master_station_list->RiverId) == "") { ?>
		<th data-name="RiverId" class="<?php echo $master_station_list->RiverId->headerCellClass() ?>"><div id="elh_master_station_RiverId" class="master_station_RiverId"><div class="ew-table-header-caption"><?php echo $master_station_list->RiverId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RiverId" class="<?php echo $master_station_list->RiverId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->RiverId) ?>', 2);"><div id="elh_master_station_RiverId" class="master_station_RiverId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->RiverId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->RiverId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->RiverId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->max_rainfall_date->Visible) { // max_rainfall_date ?>
	<?php if ($master_station_list->SortUrl($master_station_list->max_rainfall_date) == "") { ?>
		<th data-name="max_rainfall_date" class="<?php echo $master_station_list->max_rainfall_date->headerCellClass() ?>"><div id="elh_master_station_max_rainfall_date" class="master_station_max_rainfall_date"><div class="ew-table-header-caption"><?php echo $master_station_list->max_rainfall_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="max_rainfall_date" class="<?php echo $master_station_list->max_rainfall_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->max_rainfall_date) ?>', 2);"><div id="elh_master_station_max_rainfall_date" class="master_station_max_rainfall_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->max_rainfall_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->max_rainfall_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->max_rainfall_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->max_rainfall->Visible) { // max_rainfall ?>
	<?php if ($master_station_list->SortUrl($master_station_list->max_rainfall) == "") { ?>
		<th data-name="max_rainfall" class="<?php echo $master_station_list->max_rainfall->headerCellClass() ?>"><div id="elh_master_station_max_rainfall" class="master_station_max_rainfall"><div class="ew-table-header-caption"><?php echo $master_station_list->max_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="max_rainfall" class="<?php echo $master_station_list->max_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->max_rainfall) ?>', 2);"><div id="elh_master_station_max_rainfall" class="master_station_max_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->max_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->max_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->max_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->last_reading_date->Visible) { // last_reading_date ?>
	<?php if ($master_station_list->SortUrl($master_station_list->last_reading_date) == "") { ?>
		<th data-name="last_reading_date" class="<?php echo $master_station_list->last_reading_date->headerCellClass() ?>"><div id="elh_master_station_last_reading_date" class="master_station_last_reading_date"><div class="ew-table-header-caption"><?php echo $master_station_list->last_reading_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_reading_date" class="<?php echo $master_station_list->last_reading_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->last_reading_date) ?>', 2);"><div id="elh_master_station_last_reading_date" class="master_station_last_reading_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->last_reading_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->last_reading_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->last_reading_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_station_list->first_reading_date->Visible) { // first_reading_date ?>
	<?php if ($master_station_list->SortUrl($master_station_list->first_reading_date) == "") { ?>
		<th data-name="first_reading_date" class="<?php echo $master_station_list->first_reading_date->headerCellClass() ?>"><div id="elh_master_station_first_reading_date" class="master_station_first_reading_date"><div class="ew-table-header-caption"><?php echo $master_station_list->first_reading_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_reading_date" class="<?php echo $master_station_list->first_reading_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_station_list->SortUrl($master_station_list->first_reading_date) ?>', 2);"><div id="elh_master_station_first_reading_date" class="master_station_first_reading_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_station_list->first_reading_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_station_list->first_reading_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_station_list->first_reading_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_station_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_station_list->ExportAll && $master_station_list->isExport()) {
	$master_station_list->StopRecord = $master_station_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_station_list->TotalRecords > $master_station_list->StartRecord + $master_station_list->DisplayRecords - 1)
		$master_station_list->StopRecord = $master_station_list->StartRecord + $master_station_list->DisplayRecords - 1;
	else
		$master_station_list->StopRecord = $master_station_list->TotalRecords;
}
$master_station_list->RecordCount = $master_station_list->StartRecord - 1;
if ($master_station_list->Recordset && !$master_station_list->Recordset->EOF) {
	$master_station_list->Recordset->moveFirst();
	$selectLimit = $master_station_list->UseSelectLimit;
	if (!$selectLimit && $master_station_list->StartRecord > 1)
		$master_station_list->Recordset->move($master_station_list->StartRecord - 1);
} elseif (!$master_station->AllowAddDeleteRow && $master_station_list->StopRecord == 0) {
	$master_station_list->StopRecord = $master_station->GridAddRowCount;
}

// Initialize aggregate
$master_station->RowType = ROWTYPE_AGGREGATEINIT;
$master_station->resetAttributes();
$master_station_list->renderRow();
while ($master_station_list->RecordCount < $master_station_list->StopRecord) {
	$master_station_list->RecordCount++;
	if ($master_station_list->RecordCount >= $master_station_list->StartRecord) {
		$master_station_list->RowCount++;

		// Set up key count
		$master_station_list->KeyCount = $master_station_list->RowIndex;

		// Init row class and style
		$master_station->resetAttributes();
		$master_station->CssClass = "";
		if ($master_station_list->isGridAdd()) {
		} else {
			$master_station_list->loadRowValues($master_station_list->Recordset); // Load row values
		}
		$master_station->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_station->RowAttrs->merge(["data-rowindex" => $master_station_list->RowCount, "id" => "r" . $master_station_list->RowCount . "_master_station", "data-rowtype" => $master_station->RowType]);

		// Render row
		$master_station_list->renderRow();

		// Render list options
		$master_station_list->renderListOptions();
?>
	<tr <?php echo $master_station->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_station_list->ListOptions->render("body", "left", $master_station_list->RowCount);
?>
	<?php if ($master_station_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $master_station_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_SubDivisionId">
<span<?php echo $master_station_list->SubDivisionId->viewAttributes() ?>><?php echo $master_station_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->StationName->Visible) { // StationName ?>
		<td data-name="StationName" <?php echo $master_station_list->StationName->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_StationName">
<span<?php echo $master_station_list->StationName->viewAttributes() ?>><?php echo $master_station_list->StationName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->StationName_kn->Visible) { // StationName_kn ?>
		<td data-name="StationName_kn" <?php echo $master_station_list->StationName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_StationName_kn">
<span<?php echo $master_station_list->StationName_kn->viewAttributes() ?>><?php echo $master_station_list->StationName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $master_station_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_MobileNumber">
<span<?php echo $master_station_list->MobileNumber->viewAttributes() ?>><?php echo $master_station_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->Longitude->Visible) { // Longitude ?>
		<td data-name="Longitude" <?php echo $master_station_list->Longitude->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_Longitude">
<span<?php echo $master_station_list->Longitude->viewAttributes() ?>><?php echo $master_station_list->Longitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->Latitude->Visible) { // Latitude ?>
		<td data-name="Latitude" <?php echo $master_station_list->Latitude->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_Latitude">
<span<?php echo $master_station_list->Latitude->viewAttributes() ?>><?php echo $master_station_list->Latitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->Altitude_MSL_in_mtrs->Visible) { // Altitude_MSL_in_mtrs ?>
		<td data-name="Altitude_MSL_in_mtrs" <?php echo $master_station_list->Altitude_MSL_in_mtrs->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_Altitude_MSL_in_mtrs">
<span<?php echo $master_station_list->Altitude_MSL_in_mtrs->viewAttributes() ?>><?php echo $master_station_list->Altitude_MSL_in_mtrs->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->station_type->Visible) { // station_type ?>
		<td data-name="station_type" <?php echo $master_station_list->station_type->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_station_type">
<span<?php echo $master_station_list->station_type->viewAttributes() ?>><?php echo $master_station_list->station_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->IsActive->Visible) { // IsActive ?>
		<td data-name="IsActive" <?php echo $master_station_list->IsActive->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_IsActive">
<span<?php echo $master_station_list->IsActive->viewAttributes() ?>><?php echo $master_station_list->IsActive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->last_active_date->Visible) { // last_active_date ?>
		<td data-name="last_active_date" <?php echo $master_station_list->last_active_date->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_last_active_date">
<span<?php echo $master_station_list->last_active_date->viewAttributes() ?>><?php echo $master_station_list->last_active_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->DistrictId->Visible) { // DistrictId ?>
		<td data-name="DistrictId" <?php echo $master_station_list->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_DistrictId">
<span<?php echo $master_station_list->DistrictId->viewAttributes() ?>><?php echo $master_station_list->DistrictId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->TalukID->Visible) { // TalukID ?>
		<td data-name="TalukID" <?php echo $master_station_list->TalukID->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_TalukID">
<span<?php echo $master_station_list->TalukID->viewAttributes() ?>><?php echo $master_station_list->TalukID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->BasinId->Visible) { // BasinId ?>
		<td data-name="BasinId" <?php echo $master_station_list->BasinId->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_BasinId">
<span<?php echo $master_station_list->BasinId->viewAttributes() ?>><?php echo $master_station_list->BasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->SubBasinId->Visible) { // SubBasinId ?>
		<td data-name="SubBasinId" <?php echo $master_station_list->SubBasinId->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_SubBasinId">
<span<?php echo $master_station_list->SubBasinId->viewAttributes() ?>><?php echo $master_station_list->SubBasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->CatchUpId->Visible) { // CatchUpId ?>
		<td data-name="CatchUpId" <?php echo $master_station_list->CatchUpId->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_CatchUpId">
<span<?php echo $master_station_list->CatchUpId->viewAttributes() ?>><?php echo $master_station_list->CatchUpId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->PIC->Visible) { // PIC ?>
		<td data-name="PIC" <?php echo $master_station_list->PIC->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_PIC">
<span<?php echo $master_station_list->PIC->viewAttributes() ?>><?php echo $master_station_list->PIC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->RiverId->Visible) { // RiverId ?>
		<td data-name="RiverId" <?php echo $master_station_list->RiverId->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_RiverId">
<span<?php echo $master_station_list->RiverId->viewAttributes() ?>><?php echo $master_station_list->RiverId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->max_rainfall_date->Visible) { // max_rainfall_date ?>
		<td data-name="max_rainfall_date" <?php echo $master_station_list->max_rainfall_date->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_max_rainfall_date">
<span<?php echo $master_station_list->max_rainfall_date->viewAttributes() ?>><?php echo $master_station_list->max_rainfall_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->max_rainfall->Visible) { // max_rainfall ?>
		<td data-name="max_rainfall" <?php echo $master_station_list->max_rainfall->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_max_rainfall">
<span<?php echo $master_station_list->max_rainfall->viewAttributes() ?>><?php echo $master_station_list->max_rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->last_reading_date->Visible) { // last_reading_date ?>
		<td data-name="last_reading_date" <?php echo $master_station_list->last_reading_date->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_last_reading_date">
<span<?php echo $master_station_list->last_reading_date->viewAttributes() ?>><?php echo $master_station_list->last_reading_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_station_list->first_reading_date->Visible) { // first_reading_date ?>
		<td data-name="first_reading_date" <?php echo $master_station_list->first_reading_date->cellAttributes() ?>>
<span id="el<?php echo $master_station_list->RowCount ?>_master_station_first_reading_date">
<span<?php echo $master_station_list->first_reading_date->viewAttributes() ?>><?php echo $master_station_list->first_reading_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_station_list->ListOptions->render("body", "right", $master_station_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_station_list->isGridAdd())
		$master_station_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_station->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_station_list->Recordset)
	$master_station_list->Recordset->Close();
?>
<?php if (!$master_station_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_station_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_station_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_station_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_station_list->TotalRecords == 0 && !$master_station->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_station_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_station_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_station_list->isExport()) { ?>
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
$master_station_list->terminate();
?>