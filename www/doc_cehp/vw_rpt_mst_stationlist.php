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
$vw_rpt_mst_station_list = new vw_rpt_mst_station_list();

// Run the page
$vw_rpt_mst_station_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_rpt_mst_station_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_rpt_mst_station_list->isExport()) { ?>
<script>
var fvw_rpt_mst_stationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_rpt_mst_stationlist = currentForm = new ew.Form("fvw_rpt_mst_stationlist", "list");
	fvw_rpt_mst_stationlist.formKeyCountName = '<?php echo $vw_rpt_mst_station_list->FormKeyCountName ?>';
	loadjs.done("fvw_rpt_mst_stationlist");
});
var fvw_rpt_mst_stationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_rpt_mst_stationlistsrch = currentSearchForm = new ew.Form("fvw_rpt_mst_stationlistsrch");

	// Validate function for search
	fvw_rpt_mst_stationlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SubDivisionId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_mst_station_list->SubDivisionId->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_rpt_mst_stationlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_rpt_mst_stationlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fvw_rpt_mst_stationlistsrch.filterList = <?php echo $vw_rpt_mst_station_list->getFilterList() ?>;
	loadjs.done("fvw_rpt_mst_stationlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_rpt_mst_station_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_rpt_mst_station_list->TotalRecords > 0 && $vw_rpt_mst_station_list->ExportOptions->visible()) { ?>
<?php $vw_rpt_mst_station_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->ImportOptions->visible()) { ?>
<?php $vw_rpt_mst_station_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->SearchOptions->visible()) { ?>
<?php $vw_rpt_mst_station_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->FilterOptions->visible()) { ?>
<?php $vw_rpt_mst_station_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_rpt_mst_station_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_rpt_mst_station_list->isExport() && !$vw_rpt_mst_station->CurrentAction) { ?>
<form name="fvw_rpt_mst_stationlistsrch" id="fvw_rpt_mst_stationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_rpt_mst_stationlistsrch-search-panel" class="<?php echo $vw_rpt_mst_station_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_rpt_mst_station">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_rpt_mst_station->RowType = ROWTYPE_SEARCH;
$vw_rpt_mst_station->resetAttributes();
$vw_rpt_mst_station_list->renderRow();
?>
<?php if ($vw_rpt_mst_station_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php
		$vw_rpt_mst_station_list->SearchColumnCount++;
		if (($vw_rpt_mst_station_list->SearchColumnCount - 1) % $vw_rpt_mst_station_list->SearchFieldsPerRow == 0) {
			$vw_rpt_mst_station_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_mst_station_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SubDivisionId" class="ew-cell form-group">
		<label for="x_SubDivisionId" class="ew-search-caption ew-label"><?php echo $vw_rpt_mst_station_list->SubDivisionId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubDivisionId" id="z_SubDivisionId" value="=">
</span>
		<span id="el_vw_rpt_mst_station_SubDivisionId" class="ew-search-field">
<input type="text" data-table="vw_rpt_mst_station" data-field="x_SubDivisionId" name="x_SubDivisionId" id="x_SubDivisionId" size="30" maxlength="11" value="<?php echo $vw_rpt_mst_station_list->SubDivisionId->EditValue ?>"<?php echo $vw_rpt_mst_station_list->SubDivisionId->editAttributes() ?>>
</span>
	</div>
	<?php if ($vw_rpt_mst_station_list->SearchColumnCount % $vw_rpt_mst_station_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->StationName->Visible) { // StationName ?>
	<?php
		$vw_rpt_mst_station_list->SearchColumnCount++;
		if (($vw_rpt_mst_station_list->SearchColumnCount - 1) % $vw_rpt_mst_station_list->SearchFieldsPerRow == 0) {
			$vw_rpt_mst_station_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_mst_station_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationName" class="ew-cell form-group">
		<label for="x_StationName" class="ew-search-caption ew-label"><?php echo $vw_rpt_mst_station_list->StationName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_StationName" id="z_StationName" value="LIKE">
</span>
		<span id="el_vw_rpt_mst_station_StationName" class="ew-search-field">
<input type="text" data-table="vw_rpt_mst_station" data-field="x_StationName" name="x_StationName" id="x_StationName" size="30" maxlength="30" value="<?php echo $vw_rpt_mst_station_list->StationName->EditValue ?>"<?php echo $vw_rpt_mst_station_list->StationName->editAttributes() ?>>
</span>
	</div>
	<?php if ($vw_rpt_mst_station_list->SearchColumnCount % $vw_rpt_mst_station_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_rpt_mst_station_list->SearchColumnCount % $vw_rpt_mst_station_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_rpt_mst_station_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_rpt_mst_station_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_rpt_mst_station_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_rpt_mst_station_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_rpt_mst_station_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_mst_station_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_mst_station_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_mst_station_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_rpt_mst_station_list->showPageHeader(); ?>
<?php
$vw_rpt_mst_station_list->showMessage();
?>
<?php if ($vw_rpt_mst_station_list->TotalRecords > 0 || $vw_rpt_mst_station->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_rpt_mst_station_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_rpt_mst_station">
<?php if (!$vw_rpt_mst_station_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_rpt_mst_station_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_mst_station_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_mst_station_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_rpt_mst_stationlist" id="fvw_rpt_mst_stationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_rpt_mst_station">
<div id="gmp_vw_rpt_mst_station" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_rpt_mst_station_list->TotalRecords > 0 || $vw_rpt_mst_station_list->isGridEdit()) { ?>
<table id="tbl_vw_rpt_mst_stationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_rpt_mst_station->RowType = ROWTYPE_HEADER;

// Render list options
$vw_rpt_mst_station_list->renderListOptions();

// Render list options (header, left)
$vw_rpt_mst_station_list->ListOptions->render("header", "left");
?>
<?php if ($vw_rpt_mst_station_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_mst_station_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_SubDivisionId" class="vw_rpt_mst_station_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_mst_station_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->SubDivisionId) ?>', 2);"><div id="elh_vw_rpt_mst_station_SubDivisionId" class="vw_rpt_mst_station_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->SubDivisionName->Visible) { // SubDivisionName ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->SubDivisionName) == "") { ?>
		<th data-name="SubDivisionName" class="<?php echo $vw_rpt_mst_station_list->SubDivisionName->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_SubDivisionName" class="vw_rpt_mst_station_SubDivisionName"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->SubDivisionName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionName" class="<?php echo $vw_rpt_mst_station_list->SubDivisionName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->SubDivisionName) ?>', 2);"><div id="elh_vw_rpt_mst_station_SubDivisionName" class="vw_rpt_mst_station_SubDivisionName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->SubDivisionName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->SubDivisionName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->SubDivisionName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->StationId->Visible) { // StationId ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $vw_rpt_mst_station_list->StationId->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_StationId" class="vw_rpt_mst_station_StationId"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $vw_rpt_mst_station_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->StationId) ?>', 2);"><div id="elh_vw_rpt_mst_station_StationId" class="vw_rpt_mst_station_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->StationName->Visible) { // StationName ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->StationName) == "") { ?>
		<th data-name="StationName" class="<?php echo $vw_rpt_mst_station_list->StationName->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_StationName" class="vw_rpt_mst_station_StationName"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->StationName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationName" class="<?php echo $vw_rpt_mst_station_list->StationName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->StationName) ?>', 2);"><div id="elh_vw_rpt_mst_station_StationName" class="vw_rpt_mst_station_StationName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->StationName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->StationName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->StationName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_mst_station_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_MobileNumber" class="vw_rpt_mst_station_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_mst_station_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->MobileNumber) ?>', 2);"><div id="elh_vw_rpt_mst_station_MobileNumber" class="vw_rpt_mst_station_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->Longitude->Visible) { // Longitude ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->Longitude) == "") { ?>
		<th data-name="Longitude" class="<?php echo $vw_rpt_mst_station_list->Longitude->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_Longitude" class="vw_rpt_mst_station_Longitude"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->Longitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Longitude" class="<?php echo $vw_rpt_mst_station_list->Longitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->Longitude) ?>', 2);"><div id="elh_vw_rpt_mst_station_Longitude" class="vw_rpt_mst_station_Longitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->Longitude->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->Longitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->Longitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->Latitude->Visible) { // Latitude ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->Latitude) == "") { ?>
		<th data-name="Latitude" class="<?php echo $vw_rpt_mst_station_list->Latitude->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_Latitude" class="vw_rpt_mst_station_Latitude"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->Latitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Latitude" class="<?php echo $vw_rpt_mst_station_list->Latitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->Latitude) ?>', 2);"><div id="elh_vw_rpt_mst_station_Latitude" class="vw_rpt_mst_station_Latitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->Latitude->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->Latitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->Latitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->IsActive->Visible) { // IsActive ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->IsActive) == "") { ?>
		<th data-name="IsActive" class="<?php echo $vw_rpt_mst_station_list->IsActive->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_IsActive" class="vw_rpt_mst_station_IsActive"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->IsActive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsActive" class="<?php echo $vw_rpt_mst_station_list->IsActive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->IsActive) ?>', 2);"><div id="elh_vw_rpt_mst_station_IsActive" class="vw_rpt_mst_station_IsActive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->IsActive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->IsActive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->IsActive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->StationSetup->Visible) { // StationSetup ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->StationSetup) == "") { ?>
		<th data-name="StationSetup" class="<?php echo $vw_rpt_mst_station_list->StationSetup->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_StationSetup" class="vw_rpt_mst_station_StationSetup"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->StationSetup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationSetup" class="<?php echo $vw_rpt_mst_station_list->StationSetup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->StationSetup) ?>', 2);"><div id="elh_vw_rpt_mst_station_StationSetup" class="vw_rpt_mst_station_StationSetup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->StationSetup->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->StationSetup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->StationSetup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->station_type_name->Visible) { // station_type_name ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->station_type_name) == "") { ?>
		<th data-name="station_type_name" class="<?php echo $vw_rpt_mst_station_list->station_type_name->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_station_type_name" class="vw_rpt_mst_station_station_type_name"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->station_type_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_type_name" class="<?php echo $vw_rpt_mst_station_list->station_type_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->station_type_name) ?>', 2);"><div id="elh_vw_rpt_mst_station_station_type_name" class="vw_rpt_mst_station_station_type_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->station_type_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->station_type_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->station_type_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->SubBasinName->Visible) { // SubBasinName ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->SubBasinName) == "") { ?>
		<th data-name="SubBasinName" class="<?php echo $vw_rpt_mst_station_list->SubBasinName->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_SubBasinName" class="vw_rpt_mst_station_SubBasinName"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->SubBasinName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinName" class="<?php echo $vw_rpt_mst_station_list->SubBasinName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->SubBasinName) ?>', 2);"><div id="elh_vw_rpt_mst_station_SubBasinName" class="vw_rpt_mst_station_SubBasinName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->SubBasinName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->SubBasinName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->SubBasinName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->BasinName->Visible) { // BasinName ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->BasinName) == "") { ?>
		<th data-name="BasinName" class="<?php echo $vw_rpt_mst_station_list->BasinName->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_BasinName" class="vw_rpt_mst_station_BasinName"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->BasinName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinName" class="<?php echo $vw_rpt_mst_station_list->BasinName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->BasinName) ?>', 2);"><div id="elh_vw_rpt_mst_station_BasinName" class="vw_rpt_mst_station_BasinName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->BasinName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->BasinName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->BasinName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->DistrictName->Visible) { // DistrictName ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->DistrictName) == "") { ?>
		<th data-name="DistrictName" class="<?php echo $vw_rpt_mst_station_list->DistrictName->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_DistrictName" class="vw_rpt_mst_station_DistrictName"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->DistrictName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictName" class="<?php echo $vw_rpt_mst_station_list->DistrictName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->DistrictName) ?>', 2);"><div id="elh_vw_rpt_mst_station_DistrictName" class="vw_rpt_mst_station_DistrictName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->DistrictName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->DistrictName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->DistrictName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_mst_station_list->TalukName->Visible) { // TalukName ?>
	<?php if ($vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->TalukName) == "") { ?>
		<th data-name="TalukName" class="<?php echo $vw_rpt_mst_station_list->TalukName->headerCellClass() ?>"><div id="elh_vw_rpt_mst_station_TalukName" class="vw_rpt_mst_station_TalukName"><div class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->TalukName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukName" class="<?php echo $vw_rpt_mst_station_list->TalukName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_mst_station_list->SortUrl($vw_rpt_mst_station_list->TalukName) ?>', 2);"><div id="elh_vw_rpt_mst_station_TalukName" class="vw_rpt_mst_station_TalukName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_mst_station_list->TalukName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_mst_station_list->TalukName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_mst_station_list->TalukName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_rpt_mst_station_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_rpt_mst_station_list->ExportAll && $vw_rpt_mst_station_list->isExport()) {
	$vw_rpt_mst_station_list->StopRecord = $vw_rpt_mst_station_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_rpt_mst_station_list->TotalRecords > $vw_rpt_mst_station_list->StartRecord + $vw_rpt_mst_station_list->DisplayRecords - 1)
		$vw_rpt_mst_station_list->StopRecord = $vw_rpt_mst_station_list->StartRecord + $vw_rpt_mst_station_list->DisplayRecords - 1;
	else
		$vw_rpt_mst_station_list->StopRecord = $vw_rpt_mst_station_list->TotalRecords;
}
$vw_rpt_mst_station_list->RecordCount = $vw_rpt_mst_station_list->StartRecord - 1;
if ($vw_rpt_mst_station_list->Recordset && !$vw_rpt_mst_station_list->Recordset->EOF) {
	$vw_rpt_mst_station_list->Recordset->moveFirst();
	$selectLimit = $vw_rpt_mst_station_list->UseSelectLimit;
	if (!$selectLimit && $vw_rpt_mst_station_list->StartRecord > 1)
		$vw_rpt_mst_station_list->Recordset->move($vw_rpt_mst_station_list->StartRecord - 1);
} elseif (!$vw_rpt_mst_station->AllowAddDeleteRow && $vw_rpt_mst_station_list->StopRecord == 0) {
	$vw_rpt_mst_station_list->StopRecord = $vw_rpt_mst_station->GridAddRowCount;
}

// Initialize aggregate
$vw_rpt_mst_station->RowType = ROWTYPE_AGGREGATEINIT;
$vw_rpt_mst_station->resetAttributes();
$vw_rpt_mst_station_list->renderRow();
while ($vw_rpt_mst_station_list->RecordCount < $vw_rpt_mst_station_list->StopRecord) {
	$vw_rpt_mst_station_list->RecordCount++;
	if ($vw_rpt_mst_station_list->RecordCount >= $vw_rpt_mst_station_list->StartRecord) {
		$vw_rpt_mst_station_list->RowCount++;

		// Set up key count
		$vw_rpt_mst_station_list->KeyCount = $vw_rpt_mst_station_list->RowIndex;

		// Init row class and style
		$vw_rpt_mst_station->resetAttributes();
		$vw_rpt_mst_station->CssClass = "";
		if ($vw_rpt_mst_station_list->isGridAdd()) {
		} else {
			$vw_rpt_mst_station_list->loadRowValues($vw_rpt_mst_station_list->Recordset); // Load row values
		}
		$vw_rpt_mst_station->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_rpt_mst_station->RowAttrs->merge(["data-rowindex" => $vw_rpt_mst_station_list->RowCount, "id" => "r" . $vw_rpt_mst_station_list->RowCount . "_vw_rpt_mst_station", "data-rowtype" => $vw_rpt_mst_station->RowType]);

		// Render row
		$vw_rpt_mst_station_list->renderRow();

		// Render list options
		$vw_rpt_mst_station_list->renderListOptions();
?>
	<tr <?php echo $vw_rpt_mst_station->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_rpt_mst_station_list->ListOptions->render("body", "left", $vw_rpt_mst_station_list->RowCount);
?>
	<?php if ($vw_rpt_mst_station_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_rpt_mst_station_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_SubDivisionId">
<span<?php echo $vw_rpt_mst_station_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->SubDivisionName->Visible) { // SubDivisionName ?>
		<td data-name="SubDivisionName" <?php echo $vw_rpt_mst_station_list->SubDivisionName->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_SubDivisionName">
<span<?php echo $vw_rpt_mst_station_list->SubDivisionName->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->SubDivisionName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $vw_rpt_mst_station_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_StationId">
<span<?php echo $vw_rpt_mst_station_list->StationId->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->StationName->Visible) { // StationName ?>
		<td data-name="StationName" <?php echo $vw_rpt_mst_station_list->StationName->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_StationName">
<span<?php echo $vw_rpt_mst_station_list->StationName->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->StationName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_rpt_mst_station_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_MobileNumber">
<span<?php echo $vw_rpt_mst_station_list->MobileNumber->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->Longitude->Visible) { // Longitude ?>
		<td data-name="Longitude" <?php echo $vw_rpt_mst_station_list->Longitude->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_Longitude">
<span<?php echo $vw_rpt_mst_station_list->Longitude->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->Longitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->Latitude->Visible) { // Latitude ?>
		<td data-name="Latitude" <?php echo $vw_rpt_mst_station_list->Latitude->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_Latitude">
<span<?php echo $vw_rpt_mst_station_list->Latitude->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->Latitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->IsActive->Visible) { // IsActive ?>
		<td data-name="IsActive" <?php echo $vw_rpt_mst_station_list->IsActive->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_IsActive">
<span<?php echo $vw_rpt_mst_station_list->IsActive->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->IsActive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->StationSetup->Visible) { // StationSetup ?>
		<td data-name="StationSetup" <?php echo $vw_rpt_mst_station_list->StationSetup->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_StationSetup">
<span<?php echo $vw_rpt_mst_station_list->StationSetup->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->StationSetup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->station_type_name->Visible) { // station_type_name ?>
		<td data-name="station_type_name" <?php echo $vw_rpt_mst_station_list->station_type_name->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_station_type_name">
<span<?php echo $vw_rpt_mst_station_list->station_type_name->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->station_type_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->SubBasinName->Visible) { // SubBasinName ?>
		<td data-name="SubBasinName" <?php echo $vw_rpt_mst_station_list->SubBasinName->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_SubBasinName">
<span<?php echo $vw_rpt_mst_station_list->SubBasinName->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->SubBasinName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->BasinName->Visible) { // BasinName ?>
		<td data-name="BasinName" <?php echo $vw_rpt_mst_station_list->BasinName->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_BasinName">
<span<?php echo $vw_rpt_mst_station_list->BasinName->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->BasinName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->DistrictName->Visible) { // DistrictName ?>
		<td data-name="DistrictName" <?php echo $vw_rpt_mst_station_list->DistrictName->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_DistrictName">
<span<?php echo $vw_rpt_mst_station_list->DistrictName->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->DistrictName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_mst_station_list->TalukName->Visible) { // TalukName ?>
		<td data-name="TalukName" <?php echo $vw_rpt_mst_station_list->TalukName->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_mst_station_list->RowCount ?>_vw_rpt_mst_station_TalukName">
<span<?php echo $vw_rpt_mst_station_list->TalukName->viewAttributes() ?>><?php echo $vw_rpt_mst_station_list->TalukName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_rpt_mst_station_list->ListOptions->render("body", "right", $vw_rpt_mst_station_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_rpt_mst_station_list->isGridAdd())
		$vw_rpt_mst_station_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_rpt_mst_station->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_rpt_mst_station_list->Recordset)
	$vw_rpt_mst_station_list->Recordset->Close();
?>
<?php if (!$vw_rpt_mst_station_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_rpt_mst_station_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_mst_station_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_mst_station_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_rpt_mst_station_list->TotalRecords == 0 && !$vw_rpt_mst_station->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_rpt_mst_station_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_rpt_mst_station_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_rpt_mst_station_list->isExport()) { ?>
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
$vw_rpt_mst_station_list->terminate();
?>