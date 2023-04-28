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
$lkp_status_list = new lkp_status_list();

// Run the page
$lkp_status_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_status_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_status_list->isExport()) { ?>
<script>
var flkp_statuslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flkp_statuslist = currentForm = new ew.Form("flkp_statuslist", "list");
	flkp_statuslist.formKeyCountName = '<?php echo $lkp_status_list->FormKeyCountName ?>';
	loadjs.done("flkp_statuslist");
});
var flkp_statuslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flkp_statuslistsrch = currentSearchForm = new ew.Form("flkp_statuslistsrch");

	// Dynamic selection lists
	// Filters

	flkp_statuslistsrch.filterList = <?php echo $lkp_status_list->getFilterList() ?>;
	loadjs.done("flkp_statuslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_status_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lkp_status_list->TotalRecords > 0 && $lkp_status_list->ExportOptions->visible()) { ?>
<?php $lkp_status_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_status_list->ImportOptions->visible()) { ?>
<?php $lkp_status_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_status_list->SearchOptions->visible()) { ?>
<?php $lkp_status_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_status_list->FilterOptions->visible()) { ?>
<?php $lkp_status_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lkp_status_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lkp_status_list->isExport() && !$lkp_status->CurrentAction) { ?>
<form name="flkp_statuslistsrch" id="flkp_statuslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flkp_statuslistsrch-search-panel" class="<?php echo $lkp_status_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lkp_status">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lkp_status_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lkp_status_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lkp_status_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lkp_status_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lkp_status_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lkp_status_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lkp_status_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lkp_status_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lkp_status_list->showPageHeader(); ?>
<?php
$lkp_status_list->showMessage();
?>
<?php if ($lkp_status_list->TotalRecords > 0 || $lkp_status->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lkp_status_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lkp_status">
<?php if (!$lkp_status_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lkp_status_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lkp_status_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lkp_status_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flkp_statuslist" id="flkp_statuslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_status">
<div id="gmp_lkp_status" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lkp_status_list->TotalRecords > 0 || $lkp_status_list->isGridEdit()) { ?>
<table id="tbl_lkp_statuslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lkp_status->RowType = ROWTYPE_HEADER;

// Render list options
$lkp_status_list->renderListOptions();

// Render list options (header, left)
$lkp_status_list->ListOptions->render("header", "left");
?>
<?php if ($lkp_status_list->Status->Visible) { // Status ?>
	<?php if ($lkp_status_list->SortUrl($lkp_status_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $lkp_status_list->Status->headerCellClass() ?>"><div id="elh_lkp_status_Status" class="lkp_status_Status"><div class="ew-table-header-caption"><?php echo $lkp_status_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $lkp_status_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_status_list->SortUrl($lkp_status_list->Status) ?>', 2);"><div id="elh_lkp_status_Status" class="lkp_status_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_status_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_status_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_status_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_status_list->StatusName->Visible) { // StatusName ?>
	<?php if ($lkp_status_list->SortUrl($lkp_status_list->StatusName) == "") { ?>
		<th data-name="StatusName" class="<?php echo $lkp_status_list->StatusName->headerCellClass() ?>"><div id="elh_lkp_status_StatusName" class="lkp_status_StatusName"><div class="ew-table-header-caption"><?php echo $lkp_status_list->StatusName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StatusName" class="<?php echo $lkp_status_list->StatusName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_status_list->SortUrl($lkp_status_list->StatusName) ?>', 2);"><div id="elh_lkp_status_StatusName" class="lkp_status_StatusName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_status_list->StatusName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lkp_status_list->StatusName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_status_list->StatusName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_status_list->is_station_allowed->Visible) { // is_station_allowed ?>
	<?php if ($lkp_status_list->SortUrl($lkp_status_list->is_station_allowed) == "") { ?>
		<th data-name="is_station_allowed" class="<?php echo $lkp_status_list->is_station_allowed->headerCellClass() ?>"><div id="elh_lkp_status_is_station_allowed" class="lkp_status_is_station_allowed"><div class="ew-table-header-caption"><?php echo $lkp_status_list->is_station_allowed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="is_station_allowed" class="<?php echo $lkp_status_list->is_station_allowed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_status_list->SortUrl($lkp_status_list->is_station_allowed) ?>', 2);"><div id="elh_lkp_status_is_station_allowed" class="lkp_status_is_station_allowed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_status_list->is_station_allowed->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_status_list->is_station_allowed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_status_list->is_station_allowed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_status_list->is_subdiv_allowed->Visible) { // is_subdiv_allowed ?>
	<?php if ($lkp_status_list->SortUrl($lkp_status_list->is_subdiv_allowed) == "") { ?>
		<th data-name="is_subdiv_allowed" class="<?php echo $lkp_status_list->is_subdiv_allowed->headerCellClass() ?>"><div id="elh_lkp_status_is_subdiv_allowed" class="lkp_status_is_subdiv_allowed"><div class="ew-table-header-caption"><?php echo $lkp_status_list->is_subdiv_allowed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="is_subdiv_allowed" class="<?php echo $lkp_status_list->is_subdiv_allowed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_status_list->SortUrl($lkp_status_list->is_subdiv_allowed) ?>', 2);"><div id="elh_lkp_status_is_subdiv_allowed" class="lkp_status_is_subdiv_allowed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_status_list->is_subdiv_allowed->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_status_list->is_subdiv_allowed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_status_list->is_subdiv_allowed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_status_list->is_circle_allowed->Visible) { // is_circle_allowed ?>
	<?php if ($lkp_status_list->SortUrl($lkp_status_list->is_circle_allowed) == "") { ?>
		<th data-name="is_circle_allowed" class="<?php echo $lkp_status_list->is_circle_allowed->headerCellClass() ?>"><div id="elh_lkp_status_is_circle_allowed" class="lkp_status_is_circle_allowed"><div class="ew-table-header-caption"><?php echo $lkp_status_list->is_circle_allowed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="is_circle_allowed" class="<?php echo $lkp_status_list->is_circle_allowed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_status_list->SortUrl($lkp_status_list->is_circle_allowed) ?>', 2);"><div id="elh_lkp_status_is_circle_allowed" class="lkp_status_is_circle_allowed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_status_list->is_circle_allowed->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_status_list->is_circle_allowed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_status_list->is_circle_allowed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_status_list->is_WRDO_allowed->Visible) { // is_WRDO_allowed ?>
	<?php if ($lkp_status_list->SortUrl($lkp_status_list->is_WRDO_allowed) == "") { ?>
		<th data-name="is_WRDO_allowed" class="<?php echo $lkp_status_list->is_WRDO_allowed->headerCellClass() ?>"><div id="elh_lkp_status_is_WRDO_allowed" class="lkp_status_is_WRDO_allowed"><div class="ew-table-header-caption"><?php echo $lkp_status_list->is_WRDO_allowed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="is_WRDO_allowed" class="<?php echo $lkp_status_list->is_WRDO_allowed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_status_list->SortUrl($lkp_status_list->is_WRDO_allowed) ?>', 2);"><div id="elh_lkp_status_is_WRDO_allowed" class="lkp_status_is_WRDO_allowed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_status_list->is_WRDO_allowed->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_status_list->is_WRDO_allowed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_status_list->is_WRDO_allowed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_status_list->record_count->Visible) { // record_count ?>
	<?php if ($lkp_status_list->SortUrl($lkp_status_list->record_count) == "") { ?>
		<th data-name="record_count" class="<?php echo $lkp_status_list->record_count->headerCellClass() ?>"><div id="elh_lkp_status_record_count" class="lkp_status_record_count"><div class="ew-table-header-caption"><?php echo $lkp_status_list->record_count->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="record_count" class="<?php echo $lkp_status_list->record_count->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_status_list->SortUrl($lkp_status_list->record_count) ?>', 2);"><div id="elh_lkp_status_record_count" class="lkp_status_record_count">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_status_list->record_count->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_status_list->record_count->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_status_list->record_count->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lkp_status_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lkp_status_list->ExportAll && $lkp_status_list->isExport()) {
	$lkp_status_list->StopRecord = $lkp_status_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lkp_status_list->TotalRecords > $lkp_status_list->StartRecord + $lkp_status_list->DisplayRecords - 1)
		$lkp_status_list->StopRecord = $lkp_status_list->StartRecord + $lkp_status_list->DisplayRecords - 1;
	else
		$lkp_status_list->StopRecord = $lkp_status_list->TotalRecords;
}
$lkp_status_list->RecordCount = $lkp_status_list->StartRecord - 1;
if ($lkp_status_list->Recordset && !$lkp_status_list->Recordset->EOF) {
	$lkp_status_list->Recordset->moveFirst();
	$selectLimit = $lkp_status_list->UseSelectLimit;
	if (!$selectLimit && $lkp_status_list->StartRecord > 1)
		$lkp_status_list->Recordset->move($lkp_status_list->StartRecord - 1);
} elseif (!$lkp_status->AllowAddDeleteRow && $lkp_status_list->StopRecord == 0) {
	$lkp_status_list->StopRecord = $lkp_status->GridAddRowCount;
}

// Initialize aggregate
$lkp_status->RowType = ROWTYPE_AGGREGATEINIT;
$lkp_status->resetAttributes();
$lkp_status_list->renderRow();
while ($lkp_status_list->RecordCount < $lkp_status_list->StopRecord) {
	$lkp_status_list->RecordCount++;
	if ($lkp_status_list->RecordCount >= $lkp_status_list->StartRecord) {
		$lkp_status_list->RowCount++;

		// Set up key count
		$lkp_status_list->KeyCount = $lkp_status_list->RowIndex;

		// Init row class and style
		$lkp_status->resetAttributes();
		$lkp_status->CssClass = "";
		if ($lkp_status_list->isGridAdd()) {
		} else {
			$lkp_status_list->loadRowValues($lkp_status_list->Recordset); // Load row values
		}
		$lkp_status->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lkp_status->RowAttrs->merge(["data-rowindex" => $lkp_status_list->RowCount, "id" => "r" . $lkp_status_list->RowCount . "_lkp_status", "data-rowtype" => $lkp_status->RowType]);

		// Render row
		$lkp_status_list->renderRow();

		// Render list options
		$lkp_status_list->renderListOptions();
?>
	<tr <?php echo $lkp_status->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lkp_status_list->ListOptions->render("body", "left", $lkp_status_list->RowCount);
?>
	<?php if ($lkp_status_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $lkp_status_list->Status->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_list->RowCount ?>_lkp_status_Status">
<span<?php echo $lkp_status_list->Status->viewAttributes() ?>><?php echo $lkp_status_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_status_list->StatusName->Visible) { // StatusName ?>
		<td data-name="StatusName" <?php echo $lkp_status_list->StatusName->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_list->RowCount ?>_lkp_status_StatusName">
<span<?php echo $lkp_status_list->StatusName->viewAttributes() ?>><?php echo $lkp_status_list->StatusName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_status_list->is_station_allowed->Visible) { // is_station_allowed ?>
		<td data-name="is_station_allowed" <?php echo $lkp_status_list->is_station_allowed->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_list->RowCount ?>_lkp_status_is_station_allowed">
<span<?php echo $lkp_status_list->is_station_allowed->viewAttributes() ?>><?php echo $lkp_status_list->is_station_allowed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_status_list->is_subdiv_allowed->Visible) { // is_subdiv_allowed ?>
		<td data-name="is_subdiv_allowed" <?php echo $lkp_status_list->is_subdiv_allowed->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_list->RowCount ?>_lkp_status_is_subdiv_allowed">
<span<?php echo $lkp_status_list->is_subdiv_allowed->viewAttributes() ?>><?php echo $lkp_status_list->is_subdiv_allowed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_status_list->is_circle_allowed->Visible) { // is_circle_allowed ?>
		<td data-name="is_circle_allowed" <?php echo $lkp_status_list->is_circle_allowed->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_list->RowCount ?>_lkp_status_is_circle_allowed">
<span<?php echo $lkp_status_list->is_circle_allowed->viewAttributes() ?>><?php echo $lkp_status_list->is_circle_allowed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_status_list->is_WRDO_allowed->Visible) { // is_WRDO_allowed ?>
		<td data-name="is_WRDO_allowed" <?php echo $lkp_status_list->is_WRDO_allowed->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_list->RowCount ?>_lkp_status_is_WRDO_allowed">
<span<?php echo $lkp_status_list->is_WRDO_allowed->viewAttributes() ?>><?php echo $lkp_status_list->is_WRDO_allowed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_status_list->record_count->Visible) { // record_count ?>
		<td data-name="record_count" <?php echo $lkp_status_list->record_count->cellAttributes() ?>>
<span id="el<?php echo $lkp_status_list->RowCount ?>_lkp_status_record_count">
<span<?php echo $lkp_status_list->record_count->viewAttributes() ?>><?php echo $lkp_status_list->record_count->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lkp_status_list->ListOptions->render("body", "right", $lkp_status_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lkp_status_list->isGridAdd())
		$lkp_status_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lkp_status->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lkp_status_list->Recordset)
	$lkp_status_list->Recordset->Close();
?>
<?php if (!$lkp_status_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lkp_status_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lkp_status_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lkp_status_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lkp_status_list->TotalRecords == 0 && !$lkp_status->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lkp_status_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lkp_status_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_status_list->isExport()) { ?>
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
$lkp_status_list->terminate();
?>