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
$lkp_station_type_list = new lkp_station_type_list();

// Run the page
$lkp_station_type_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_station_type_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_station_type_list->isExport()) { ?>
<script>
var flkp_station_typelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flkp_station_typelist = currentForm = new ew.Form("flkp_station_typelist", "list");
	flkp_station_typelist.formKeyCountName = '<?php echo $lkp_station_type_list->FormKeyCountName ?>';
	loadjs.done("flkp_station_typelist");
});
var flkp_station_typelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flkp_station_typelistsrch = currentSearchForm = new ew.Form("flkp_station_typelistsrch");

	// Dynamic selection lists
	// Filters

	flkp_station_typelistsrch.filterList = <?php echo $lkp_station_type_list->getFilterList() ?>;
	loadjs.done("flkp_station_typelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_station_type_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lkp_station_type_list->TotalRecords > 0 && $lkp_station_type_list->ExportOptions->visible()) { ?>
<?php $lkp_station_type_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_station_type_list->ImportOptions->visible()) { ?>
<?php $lkp_station_type_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_station_type_list->SearchOptions->visible()) { ?>
<?php $lkp_station_type_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_station_type_list->FilterOptions->visible()) { ?>
<?php $lkp_station_type_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lkp_station_type_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lkp_station_type_list->isExport() && !$lkp_station_type->CurrentAction) { ?>
<form name="flkp_station_typelistsrch" id="flkp_station_typelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flkp_station_typelistsrch-search-panel" class="<?php echo $lkp_station_type_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lkp_station_type">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lkp_station_type_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lkp_station_type_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lkp_station_type_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lkp_station_type_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lkp_station_type_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lkp_station_type_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lkp_station_type_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lkp_station_type_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lkp_station_type_list->showPageHeader(); ?>
<?php
$lkp_station_type_list->showMessage();
?>
<?php if ($lkp_station_type_list->TotalRecords > 0 || $lkp_station_type->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lkp_station_type_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lkp_station_type">
<?php if (!$lkp_station_type_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lkp_station_type_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lkp_station_type_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lkp_station_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flkp_station_typelist" id="flkp_station_typelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_station_type">
<div id="gmp_lkp_station_type" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lkp_station_type_list->TotalRecords > 0 || $lkp_station_type_list->isGridEdit()) { ?>
<table id="tbl_lkp_station_typelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lkp_station_type->RowType = ROWTYPE_HEADER;

// Render list options
$lkp_station_type_list->renderListOptions();

// Render list options (header, left)
$lkp_station_type_list->ListOptions->render("header", "left");
?>
<?php if ($lkp_station_type_list->station_type->Visible) { // station_type ?>
	<?php if ($lkp_station_type_list->SortUrl($lkp_station_type_list->station_type) == "") { ?>
		<th data-name="station_type" class="<?php echo $lkp_station_type_list->station_type->headerCellClass() ?>"><div id="elh_lkp_station_type_station_type" class="lkp_station_type_station_type"><div class="ew-table-header-caption"><?php echo $lkp_station_type_list->station_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_type" class="<?php echo $lkp_station_type_list->station_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_station_type_list->SortUrl($lkp_station_type_list->station_type) ?>', 2);"><div id="elh_lkp_station_type_station_type" class="lkp_station_type_station_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_station_type_list->station_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_station_type_list->station_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_station_type_list->station_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_station_type_list->station_type_name->Visible) { // station_type_name ?>
	<?php if ($lkp_station_type_list->SortUrl($lkp_station_type_list->station_type_name) == "") { ?>
		<th data-name="station_type_name" class="<?php echo $lkp_station_type_list->station_type_name->headerCellClass() ?>"><div id="elh_lkp_station_type_station_type_name" class="lkp_station_type_station_type_name"><div class="ew-table-header-caption"><?php echo $lkp_station_type_list->station_type_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_type_name" class="<?php echo $lkp_station_type_list->station_type_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_station_type_list->SortUrl($lkp_station_type_list->station_type_name) ?>', 2);"><div id="elh_lkp_station_type_station_type_name" class="lkp_station_type_station_type_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_station_type_list->station_type_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lkp_station_type_list->station_type_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_station_type_list->station_type_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_station_type_list->record_count->Visible) { // record_count ?>
	<?php if ($lkp_station_type_list->SortUrl($lkp_station_type_list->record_count) == "") { ?>
		<th data-name="record_count" class="<?php echo $lkp_station_type_list->record_count->headerCellClass() ?>"><div id="elh_lkp_station_type_record_count" class="lkp_station_type_record_count"><div class="ew-table-header-caption"><?php echo $lkp_station_type_list->record_count->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="record_count" class="<?php echo $lkp_station_type_list->record_count->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_station_type_list->SortUrl($lkp_station_type_list->record_count) ?>', 2);"><div id="elh_lkp_station_type_record_count" class="lkp_station_type_record_count">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_station_type_list->record_count->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_station_type_list->record_count->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_station_type_list->record_count->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_station_type_list->station_type_name_kn->Visible) { // station_type_name_kn ?>
	<?php if ($lkp_station_type_list->SortUrl($lkp_station_type_list->station_type_name_kn) == "") { ?>
		<th data-name="station_type_name_kn" class="<?php echo $lkp_station_type_list->station_type_name_kn->headerCellClass() ?>"><div id="elh_lkp_station_type_station_type_name_kn" class="lkp_station_type_station_type_name_kn"><div class="ew-table-header-caption"><?php echo $lkp_station_type_list->station_type_name_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_type_name_kn" class="<?php echo $lkp_station_type_list->station_type_name_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_station_type_list->SortUrl($lkp_station_type_list->station_type_name_kn) ?>', 2);"><div id="elh_lkp_station_type_station_type_name_kn" class="lkp_station_type_station_type_name_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_station_type_list->station_type_name_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lkp_station_type_list->station_type_name_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_station_type_list->station_type_name_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lkp_station_type_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lkp_station_type_list->ExportAll && $lkp_station_type_list->isExport()) {
	$lkp_station_type_list->StopRecord = $lkp_station_type_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lkp_station_type_list->TotalRecords > $lkp_station_type_list->StartRecord + $lkp_station_type_list->DisplayRecords - 1)
		$lkp_station_type_list->StopRecord = $lkp_station_type_list->StartRecord + $lkp_station_type_list->DisplayRecords - 1;
	else
		$lkp_station_type_list->StopRecord = $lkp_station_type_list->TotalRecords;
}
$lkp_station_type_list->RecordCount = $lkp_station_type_list->StartRecord - 1;
if ($lkp_station_type_list->Recordset && !$lkp_station_type_list->Recordset->EOF) {
	$lkp_station_type_list->Recordset->moveFirst();
	$selectLimit = $lkp_station_type_list->UseSelectLimit;
	if (!$selectLimit && $lkp_station_type_list->StartRecord > 1)
		$lkp_station_type_list->Recordset->move($lkp_station_type_list->StartRecord - 1);
} elseif (!$lkp_station_type->AllowAddDeleteRow && $lkp_station_type_list->StopRecord == 0) {
	$lkp_station_type_list->StopRecord = $lkp_station_type->GridAddRowCount;
}

// Initialize aggregate
$lkp_station_type->RowType = ROWTYPE_AGGREGATEINIT;
$lkp_station_type->resetAttributes();
$lkp_station_type_list->renderRow();
while ($lkp_station_type_list->RecordCount < $lkp_station_type_list->StopRecord) {
	$lkp_station_type_list->RecordCount++;
	if ($lkp_station_type_list->RecordCount >= $lkp_station_type_list->StartRecord) {
		$lkp_station_type_list->RowCount++;

		// Set up key count
		$lkp_station_type_list->KeyCount = $lkp_station_type_list->RowIndex;

		// Init row class and style
		$lkp_station_type->resetAttributes();
		$lkp_station_type->CssClass = "";
		if ($lkp_station_type_list->isGridAdd()) {
		} else {
			$lkp_station_type_list->loadRowValues($lkp_station_type_list->Recordset); // Load row values
		}
		$lkp_station_type->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lkp_station_type->RowAttrs->merge(["data-rowindex" => $lkp_station_type_list->RowCount, "id" => "r" . $lkp_station_type_list->RowCount . "_lkp_station_type", "data-rowtype" => $lkp_station_type->RowType]);

		// Render row
		$lkp_station_type_list->renderRow();

		// Render list options
		$lkp_station_type_list->renderListOptions();
?>
	<tr <?php echo $lkp_station_type->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lkp_station_type_list->ListOptions->render("body", "left", $lkp_station_type_list->RowCount);
?>
	<?php if ($lkp_station_type_list->station_type->Visible) { // station_type ?>
		<td data-name="station_type" <?php echo $lkp_station_type_list->station_type->cellAttributes() ?>>
<span id="el<?php echo $lkp_station_type_list->RowCount ?>_lkp_station_type_station_type">
<span<?php echo $lkp_station_type_list->station_type->viewAttributes() ?>><?php echo $lkp_station_type_list->station_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_station_type_list->station_type_name->Visible) { // station_type_name ?>
		<td data-name="station_type_name" <?php echo $lkp_station_type_list->station_type_name->cellAttributes() ?>>
<span id="el<?php echo $lkp_station_type_list->RowCount ?>_lkp_station_type_station_type_name">
<span<?php echo $lkp_station_type_list->station_type_name->viewAttributes() ?>><?php echo $lkp_station_type_list->station_type_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_station_type_list->record_count->Visible) { // record_count ?>
		<td data-name="record_count" <?php echo $lkp_station_type_list->record_count->cellAttributes() ?>>
<span id="el<?php echo $lkp_station_type_list->RowCount ?>_lkp_station_type_record_count">
<span<?php echo $lkp_station_type_list->record_count->viewAttributes() ?>><?php echo $lkp_station_type_list->record_count->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_station_type_list->station_type_name_kn->Visible) { // station_type_name_kn ?>
		<td data-name="station_type_name_kn" <?php echo $lkp_station_type_list->station_type_name_kn->cellAttributes() ?>>
<span id="el<?php echo $lkp_station_type_list->RowCount ?>_lkp_station_type_station_type_name_kn">
<span<?php echo $lkp_station_type_list->station_type_name_kn->viewAttributes() ?>><?php echo $lkp_station_type_list->station_type_name_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lkp_station_type_list->ListOptions->render("body", "right", $lkp_station_type_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lkp_station_type_list->isGridAdd())
		$lkp_station_type_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lkp_station_type->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lkp_station_type_list->Recordset)
	$lkp_station_type_list->Recordset->Close();
?>
<?php if (!$lkp_station_type_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lkp_station_type_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lkp_station_type_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lkp_station_type_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lkp_station_type_list->TotalRecords == 0 && !$lkp_station_type->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lkp_station_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lkp_station_type_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_station_type_list->isExport()) { ?>
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
$lkp_station_type_list->terminate();
?>