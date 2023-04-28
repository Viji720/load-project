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
$vw_mst_station_mob_list = new vw_mst_station_mob_list();

// Run the page
$vw_mst_station_mob_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_mst_station_mob_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_mst_station_mob_list->isExport()) { ?>
<script>
var fvw_mst_station_moblist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_mst_station_moblist = currentForm = new ew.Form("fvw_mst_station_moblist", "list");
	fvw_mst_station_moblist.formKeyCountName = '<?php echo $vw_mst_station_mob_list->FormKeyCountName ?>';
	loadjs.done("fvw_mst_station_moblist");
});
var fvw_mst_station_moblistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_mst_station_moblistsrch = currentSearchForm = new ew.Form("fvw_mst_station_moblistsrch");

	// Dynamic selection lists
	// Filters

	fvw_mst_station_moblistsrch.filterList = <?php echo $vw_mst_station_mob_list->getFilterList() ?>;
	loadjs.done("fvw_mst_station_moblistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_mst_station_mob_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_mst_station_mob_list->TotalRecords > 0 && $vw_mst_station_mob_list->ExportOptions->visible()) { ?>
<?php $vw_mst_station_mob_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->ImportOptions->visible()) { ?>
<?php $vw_mst_station_mob_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->SearchOptions->visible()) { ?>
<?php $vw_mst_station_mob_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->FilterOptions->visible()) { ?>
<?php $vw_mst_station_mob_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_mst_station_mob_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_mst_station_mob_list->isExport() && !$vw_mst_station_mob->CurrentAction) { ?>
<form name="fvw_mst_station_moblistsrch" id="fvw_mst_station_moblistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_mst_station_moblistsrch-search-panel" class="<?php echo $vw_mst_station_mob_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_mst_station_mob">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $vw_mst_station_mob_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_mst_station_mob_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_mst_station_mob_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_mst_station_mob_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_mst_station_mob_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_mst_station_mob_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_mst_station_mob_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_mst_station_mob_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_mst_station_mob_list->showPageHeader(); ?>
<?php
$vw_mst_station_mob_list->showMessage();
?>
<?php if ($vw_mst_station_mob_list->TotalRecords > 0 || $vw_mst_station_mob->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_mst_station_mob_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_mst_station_mob">
<?php if (!$vw_mst_station_mob_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_mst_station_mob_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_mst_station_mob_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_mst_station_mob_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_mst_station_moblist" id="fvw_mst_station_moblist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_mst_station_mob">
<div id="gmp_vw_mst_station_mob" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_mst_station_mob_list->TotalRecords > 0 || $vw_mst_station_mob_list->isGridEdit()) { ?>
<table id="tbl_vw_mst_station_moblist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_mst_station_mob->RowType = ROWTYPE_HEADER;

// Render list options
$vw_mst_station_mob_list->renderListOptions();

// Render list options (header, left)
$vw_mst_station_mob_list->ListOptions->render("header", "left");
?>
<?php if ($vw_mst_station_mob_list->StationId->Visible) { // StationId ?>
	<?php if ($vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $vw_mst_station_mob_list->StationId->headerCellClass() ?>"><div id="elh_vw_mst_station_mob_StationId" class="vw_mst_station_mob_StationId"><div class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $vw_mst_station_mob_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->StationId) ?>', 2);"><div id="elh_vw_mst_station_mob_StationId" class="vw_mst_station_mob_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_mob_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_mob_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->StationName->Visible) { // StationName ?>
	<?php if ($vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->StationName) == "") { ?>
		<th data-name="StationName" class="<?php echo $vw_mst_station_mob_list->StationName->headerCellClass() ?>"><div id="elh_vw_mst_station_mob_StationName" class="vw_mst_station_mob_StationName"><div class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->StationName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationName" class="<?php echo $vw_mst_station_mob_list->StationName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->StationName) ?>', 2);"><div id="elh_vw_mst_station_mob_StationName" class="vw_mst_station_mob_StationName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->StationName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_mob_list->StationName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_mob_list->StationName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->StationName_kn->Visible) { // StationName_kn ?>
	<?php if ($vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->StationName_kn) == "") { ?>
		<th data-name="StationName_kn" class="<?php echo $vw_mst_station_mob_list->StationName_kn->headerCellClass() ?>"><div id="elh_vw_mst_station_mob_StationName_kn" class="vw_mst_station_mob_StationName_kn"><div class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->StationName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationName_kn" class="<?php echo $vw_mst_station_mob_list->StationName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->StationName_kn) ?>', 2);"><div id="elh_vw_mst_station_mob_StationName_kn" class="vw_mst_station_mob_StationName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->StationName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_mob_list->StationName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_mob_list->StationName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_mst_station_mob_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_mst_station_mob_MobileNumber" class="vw_mst_station_mob_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_mst_station_mob_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->MobileNumber) ?>', 2);"><div id="elh_vw_mst_station_mob_MobileNumber" class="vw_mst_station_mob_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_mob_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_mob_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_mst_station_mob_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_mst_station_mob_SubDivisionId" class="vw_mst_station_mob_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_mst_station_mob_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->SubDivisionId) ?>', 2);"><div id="elh_vw_mst_station_mob_SubDivisionId" class="vw_mst_station_mob_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_mob_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_mob_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->mst_station_owner->Visible) { // mst_station_owner ?>
	<?php if ($vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->mst_station_owner) == "") { ?>
		<th data-name="mst_station_owner" class="<?php echo $vw_mst_station_mob_list->mst_station_owner->headerCellClass() ?>"><div id="elh_vw_mst_station_mob_mst_station_owner" class="vw_mst_station_mob_mst_station_owner"><div class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->mst_station_owner->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mst_station_owner" class="<?php echo $vw_mst_station_mob_list->mst_station_owner->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->mst_station_owner) ?>', 2);"><div id="elh_vw_mst_station_mob_mst_station_owner" class="vw_mst_station_mob_mst_station_owner">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->mst_station_owner->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_mob_list->mst_station_owner->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_mob_list->mst_station_owner->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->first_reading_date->Visible) { // first_reading_date ?>
	<?php if ($vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->first_reading_date) == "") { ?>
		<th data-name="first_reading_date" class="<?php echo $vw_mst_station_mob_list->first_reading_date->headerCellClass() ?>"><div id="elh_vw_mst_station_mob_first_reading_date" class="vw_mst_station_mob_first_reading_date"><div class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->first_reading_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_reading_date" class="<?php echo $vw_mst_station_mob_list->first_reading_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->first_reading_date) ?>', 2);"><div id="elh_vw_mst_station_mob_first_reading_date" class="vw_mst_station_mob_first_reading_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->first_reading_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_mob_list->first_reading_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_mob_list->first_reading_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_mst_station_mob_list->last_reading_date->Visible) { // last_reading_date ?>
	<?php if ($vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->last_reading_date) == "") { ?>
		<th data-name="last_reading_date" class="<?php echo $vw_mst_station_mob_list->last_reading_date->headerCellClass() ?>"><div id="elh_vw_mst_station_mob_last_reading_date" class="vw_mst_station_mob_last_reading_date"><div class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->last_reading_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_reading_date" class="<?php echo $vw_mst_station_mob_list->last_reading_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_mst_station_mob_list->SortUrl($vw_mst_station_mob_list->last_reading_date) ?>', 2);"><div id="elh_vw_mst_station_mob_last_reading_date" class="vw_mst_station_mob_last_reading_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_mst_station_mob_list->last_reading_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_mst_station_mob_list->last_reading_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_mst_station_mob_list->last_reading_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_mst_station_mob_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_mst_station_mob_list->ExportAll && $vw_mst_station_mob_list->isExport()) {
	$vw_mst_station_mob_list->StopRecord = $vw_mst_station_mob_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_mst_station_mob_list->TotalRecords > $vw_mst_station_mob_list->StartRecord + $vw_mst_station_mob_list->DisplayRecords - 1)
		$vw_mst_station_mob_list->StopRecord = $vw_mst_station_mob_list->StartRecord + $vw_mst_station_mob_list->DisplayRecords - 1;
	else
		$vw_mst_station_mob_list->StopRecord = $vw_mst_station_mob_list->TotalRecords;
}
$vw_mst_station_mob_list->RecordCount = $vw_mst_station_mob_list->StartRecord - 1;
if ($vw_mst_station_mob_list->Recordset && !$vw_mst_station_mob_list->Recordset->EOF) {
	$vw_mst_station_mob_list->Recordset->moveFirst();
	$selectLimit = $vw_mst_station_mob_list->UseSelectLimit;
	if (!$selectLimit && $vw_mst_station_mob_list->StartRecord > 1)
		$vw_mst_station_mob_list->Recordset->move($vw_mst_station_mob_list->StartRecord - 1);
} elseif (!$vw_mst_station_mob->AllowAddDeleteRow && $vw_mst_station_mob_list->StopRecord == 0) {
	$vw_mst_station_mob_list->StopRecord = $vw_mst_station_mob->GridAddRowCount;
}

// Initialize aggregate
$vw_mst_station_mob->RowType = ROWTYPE_AGGREGATEINIT;
$vw_mst_station_mob->resetAttributes();
$vw_mst_station_mob_list->renderRow();
while ($vw_mst_station_mob_list->RecordCount < $vw_mst_station_mob_list->StopRecord) {
	$vw_mst_station_mob_list->RecordCount++;
	if ($vw_mst_station_mob_list->RecordCount >= $vw_mst_station_mob_list->StartRecord) {
		$vw_mst_station_mob_list->RowCount++;

		// Set up key count
		$vw_mst_station_mob_list->KeyCount = $vw_mst_station_mob_list->RowIndex;

		// Init row class and style
		$vw_mst_station_mob->resetAttributes();
		$vw_mst_station_mob->CssClass = "";
		if ($vw_mst_station_mob_list->isGridAdd()) {
		} else {
			$vw_mst_station_mob_list->loadRowValues($vw_mst_station_mob_list->Recordset); // Load row values
		}
		$vw_mst_station_mob->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_mst_station_mob->RowAttrs->merge(["data-rowindex" => $vw_mst_station_mob_list->RowCount, "id" => "r" . $vw_mst_station_mob_list->RowCount . "_vw_mst_station_mob", "data-rowtype" => $vw_mst_station_mob->RowType]);

		// Render row
		$vw_mst_station_mob_list->renderRow();

		// Render list options
		$vw_mst_station_mob_list->renderListOptions();
?>
	<tr <?php echo $vw_mst_station_mob->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_mst_station_mob_list->ListOptions->render("body", "left", $vw_mst_station_mob_list->RowCount);
?>
	<?php if ($vw_mst_station_mob_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $vw_mst_station_mob_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_mob_list->RowCount ?>_vw_mst_station_mob_StationId">
<span<?php echo $vw_mst_station_mob_list->StationId->viewAttributes() ?>><?php echo $vw_mst_station_mob_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_mob_list->StationName->Visible) { // StationName ?>
		<td data-name="StationName" <?php echo $vw_mst_station_mob_list->StationName->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_mob_list->RowCount ?>_vw_mst_station_mob_StationName">
<span<?php echo $vw_mst_station_mob_list->StationName->viewAttributes() ?>><?php echo $vw_mst_station_mob_list->StationName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_mob_list->StationName_kn->Visible) { // StationName_kn ?>
		<td data-name="StationName_kn" <?php echo $vw_mst_station_mob_list->StationName_kn->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_mob_list->RowCount ?>_vw_mst_station_mob_StationName_kn">
<span<?php echo $vw_mst_station_mob_list->StationName_kn->viewAttributes() ?>><?php echo $vw_mst_station_mob_list->StationName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_mob_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_mst_station_mob_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_mob_list->RowCount ?>_vw_mst_station_mob_MobileNumber">
<span<?php echo $vw_mst_station_mob_list->MobileNumber->viewAttributes() ?>><?php echo $vw_mst_station_mob_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_mob_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_mst_station_mob_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_mob_list->RowCount ?>_vw_mst_station_mob_SubDivisionId">
<span<?php echo $vw_mst_station_mob_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_mst_station_mob_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_mob_list->mst_station_owner->Visible) { // mst_station_owner ?>
		<td data-name="mst_station_owner" <?php echo $vw_mst_station_mob_list->mst_station_owner->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_mob_list->RowCount ?>_vw_mst_station_mob_mst_station_owner">
<span<?php echo $vw_mst_station_mob_list->mst_station_owner->viewAttributes() ?>><?php echo $vw_mst_station_mob_list->mst_station_owner->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_mob_list->first_reading_date->Visible) { // first_reading_date ?>
		<td data-name="first_reading_date" <?php echo $vw_mst_station_mob_list->first_reading_date->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_mob_list->RowCount ?>_vw_mst_station_mob_first_reading_date">
<span<?php echo $vw_mst_station_mob_list->first_reading_date->viewAttributes() ?>><?php echo $vw_mst_station_mob_list->first_reading_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_mst_station_mob_list->last_reading_date->Visible) { // last_reading_date ?>
		<td data-name="last_reading_date" <?php echo $vw_mst_station_mob_list->last_reading_date->cellAttributes() ?>>
<span id="el<?php echo $vw_mst_station_mob_list->RowCount ?>_vw_mst_station_mob_last_reading_date">
<span<?php echo $vw_mst_station_mob_list->last_reading_date->viewAttributes() ?>><?php echo $vw_mst_station_mob_list->last_reading_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_mst_station_mob_list->ListOptions->render("body", "right", $vw_mst_station_mob_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_mst_station_mob_list->isGridAdd())
		$vw_mst_station_mob_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_mst_station_mob->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_mst_station_mob_list->Recordset)
	$vw_mst_station_mob_list->Recordset->Close();
?>
<?php if (!$vw_mst_station_mob_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_mst_station_mob_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_mst_station_mob_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_mst_station_mob_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_mst_station_mob_list->TotalRecords == 0 && !$vw_mst_station_mob->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_mst_station_mob_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_mst_station_mob_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_mst_station_mob_list->isExport()) { ?>
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
$vw_mst_station_mob_list->terminate();
?>