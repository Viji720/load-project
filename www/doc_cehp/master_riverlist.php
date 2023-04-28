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
$master_river_list = new master_river_list();

// Run the page
$master_river_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_river_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_river_list->isExport()) { ?>
<script>
var fmaster_riverlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_riverlist = currentForm = new ew.Form("fmaster_riverlist", "list");
	fmaster_riverlist.formKeyCountName = '<?php echo $master_river_list->FormKeyCountName ?>';
	loadjs.done("fmaster_riverlist");
});
var fmaster_riverlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_riverlistsrch = currentSearchForm = new ew.Form("fmaster_riverlistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_riverlistsrch.filterList = <?php echo $master_river_list->getFilterList() ?>;
	loadjs.done("fmaster_riverlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_river_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_river_list->TotalRecords > 0 && $master_river_list->ExportOptions->visible()) { ?>
<?php $master_river_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_river_list->ImportOptions->visible()) { ?>
<?php $master_river_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_river_list->SearchOptions->visible()) { ?>
<?php $master_river_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_river_list->FilterOptions->visible()) { ?>
<?php $master_river_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_river_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_river_list->isExport() && !$master_river->CurrentAction) { ?>
<form name="fmaster_riverlistsrch" id="fmaster_riverlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_riverlistsrch-search-panel" class="<?php echo $master_river_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_river">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_river_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_river_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_river_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_river_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_river_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_river_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_river_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_river_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_river_list->showPageHeader(); ?>
<?php
$master_river_list->showMessage();
?>
<?php if ($master_river_list->TotalRecords > 0 || $master_river->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_river_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_river">
<?php if (!$master_river_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_river_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_river_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_river_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_riverlist" id="fmaster_riverlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_river">
<div id="gmp_master_river" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_river_list->TotalRecords > 0 || $master_river_list->isGridEdit()) { ?>
<table id="tbl_master_riverlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_river->RowType = ROWTYPE_HEADER;

// Render list options
$master_river_list->renderListOptions();

// Render list options (header, left)
$master_river_list->ListOptions->render("header", "left");
?>
<?php if ($master_river_list->RiverId->Visible) { // RiverId ?>
	<?php if ($master_river_list->SortUrl($master_river_list->RiverId) == "") { ?>
		<th data-name="RiverId" class="<?php echo $master_river_list->RiverId->headerCellClass() ?>"><div id="elh_master_river_RiverId" class="master_river_RiverId"><div class="ew-table-header-caption"><?php echo $master_river_list->RiverId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RiverId" class="<?php echo $master_river_list->RiverId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_river_list->SortUrl($master_river_list->RiverId) ?>', 2);"><div id="elh_master_river_RiverId" class="master_river_RiverId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_river_list->RiverId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_river_list->RiverId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_river_list->RiverId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_river_list->RiverName->Visible) { // RiverName ?>
	<?php if ($master_river_list->SortUrl($master_river_list->RiverName) == "") { ?>
		<th data-name="RiverName" class="<?php echo $master_river_list->RiverName->headerCellClass() ?>"><div id="elh_master_river_RiverName" class="master_river_RiverName"><div class="ew-table-header-caption"><?php echo $master_river_list->RiverName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RiverName" class="<?php echo $master_river_list->RiverName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_river_list->SortUrl($master_river_list->RiverName) ?>', 2);"><div id="elh_master_river_RiverName" class="master_river_RiverName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_river_list->RiverName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_river_list->RiverName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_river_list->RiverName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_river_list->RiverName_kn->Visible) { // RiverName_kn ?>
	<?php if ($master_river_list->SortUrl($master_river_list->RiverName_kn) == "") { ?>
		<th data-name="RiverName_kn" class="<?php echo $master_river_list->RiverName_kn->headerCellClass() ?>"><div id="elh_master_river_RiverName_kn" class="master_river_RiverName_kn"><div class="ew-table-header-caption"><?php echo $master_river_list->RiverName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RiverName_kn" class="<?php echo $master_river_list->RiverName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_river_list->SortUrl($master_river_list->RiverName_kn) ?>', 2);"><div id="elh_master_river_RiverName_kn" class="master_river_RiverName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_river_list->RiverName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_river_list->RiverName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_river_list->RiverName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_river_list->RiverName_hi->Visible) { // RiverName_hi ?>
	<?php if ($master_river_list->SortUrl($master_river_list->RiverName_hi) == "") { ?>
		<th data-name="RiverName_hi" class="<?php echo $master_river_list->RiverName_hi->headerCellClass() ?>"><div id="elh_master_river_RiverName_hi" class="master_river_RiverName_hi"><div class="ew-table-header-caption"><?php echo $master_river_list->RiverName_hi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RiverName_hi" class="<?php echo $master_river_list->RiverName_hi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_river_list->SortUrl($master_river_list->RiverName_hi) ?>', 2);"><div id="elh_master_river_RiverName_hi" class="master_river_RiverName_hi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_river_list->RiverName_hi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_river_list->RiverName_hi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_river_list->RiverName_hi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_river_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_river_list->ExportAll && $master_river_list->isExport()) {
	$master_river_list->StopRecord = $master_river_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_river_list->TotalRecords > $master_river_list->StartRecord + $master_river_list->DisplayRecords - 1)
		$master_river_list->StopRecord = $master_river_list->StartRecord + $master_river_list->DisplayRecords - 1;
	else
		$master_river_list->StopRecord = $master_river_list->TotalRecords;
}
$master_river_list->RecordCount = $master_river_list->StartRecord - 1;
if ($master_river_list->Recordset && !$master_river_list->Recordset->EOF) {
	$master_river_list->Recordset->moveFirst();
	$selectLimit = $master_river_list->UseSelectLimit;
	if (!$selectLimit && $master_river_list->StartRecord > 1)
		$master_river_list->Recordset->move($master_river_list->StartRecord - 1);
} elseif (!$master_river->AllowAddDeleteRow && $master_river_list->StopRecord == 0) {
	$master_river_list->StopRecord = $master_river->GridAddRowCount;
}

// Initialize aggregate
$master_river->RowType = ROWTYPE_AGGREGATEINIT;
$master_river->resetAttributes();
$master_river_list->renderRow();
while ($master_river_list->RecordCount < $master_river_list->StopRecord) {
	$master_river_list->RecordCount++;
	if ($master_river_list->RecordCount >= $master_river_list->StartRecord) {
		$master_river_list->RowCount++;

		// Set up key count
		$master_river_list->KeyCount = $master_river_list->RowIndex;

		// Init row class and style
		$master_river->resetAttributes();
		$master_river->CssClass = "";
		if ($master_river_list->isGridAdd()) {
		} else {
			$master_river_list->loadRowValues($master_river_list->Recordset); // Load row values
		}
		$master_river->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_river->RowAttrs->merge(["data-rowindex" => $master_river_list->RowCount, "id" => "r" . $master_river_list->RowCount . "_master_river", "data-rowtype" => $master_river->RowType]);

		// Render row
		$master_river_list->renderRow();

		// Render list options
		$master_river_list->renderListOptions();
?>
	<tr <?php echo $master_river->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_river_list->ListOptions->render("body", "left", $master_river_list->RowCount);
?>
	<?php if ($master_river_list->RiverId->Visible) { // RiverId ?>
		<td data-name="RiverId" <?php echo $master_river_list->RiverId->cellAttributes() ?>>
<span id="el<?php echo $master_river_list->RowCount ?>_master_river_RiverId">
<span<?php echo $master_river_list->RiverId->viewAttributes() ?>><?php echo $master_river_list->RiverId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_river_list->RiverName->Visible) { // RiverName ?>
		<td data-name="RiverName" <?php echo $master_river_list->RiverName->cellAttributes() ?>>
<span id="el<?php echo $master_river_list->RowCount ?>_master_river_RiverName">
<span<?php echo $master_river_list->RiverName->viewAttributes() ?>><?php echo $master_river_list->RiverName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_river_list->RiverName_kn->Visible) { // RiverName_kn ?>
		<td data-name="RiverName_kn" <?php echo $master_river_list->RiverName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_river_list->RowCount ?>_master_river_RiverName_kn">
<span<?php echo $master_river_list->RiverName_kn->viewAttributes() ?>><?php echo $master_river_list->RiverName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_river_list->RiverName_hi->Visible) { // RiverName_hi ?>
		<td data-name="RiverName_hi" <?php echo $master_river_list->RiverName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_river_list->RowCount ?>_master_river_RiverName_hi">
<span<?php echo $master_river_list->RiverName_hi->viewAttributes() ?>><?php echo $master_river_list->RiverName_hi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_river_list->ListOptions->render("body", "right", $master_river_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_river_list->isGridAdd())
		$master_river_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_river->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_river_list->Recordset)
	$master_river_list->Recordset->Close();
?>
<?php if (!$master_river_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_river_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_river_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_river_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_river_list->TotalRecords == 0 && !$master_river->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_river_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_river_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_river_list->isExport()) { ?>
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
$master_river_list->terminate();
?>