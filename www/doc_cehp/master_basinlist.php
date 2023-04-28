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
$master_basin_list = new master_basin_list();

// Run the page
$master_basin_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_basin_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_basin_list->isExport()) { ?>
<script>
var fmaster_basinlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_basinlist = currentForm = new ew.Form("fmaster_basinlist", "list");
	fmaster_basinlist.formKeyCountName = '<?php echo $master_basin_list->FormKeyCountName ?>';
	loadjs.done("fmaster_basinlist");
});
var fmaster_basinlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_basinlistsrch = currentSearchForm = new ew.Form("fmaster_basinlistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_basinlistsrch.filterList = <?php echo $master_basin_list->getFilterList() ?>;
	loadjs.done("fmaster_basinlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_basin_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_basin_list->TotalRecords > 0 && $master_basin_list->ExportOptions->visible()) { ?>
<?php $master_basin_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_basin_list->ImportOptions->visible()) { ?>
<?php $master_basin_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_basin_list->SearchOptions->visible()) { ?>
<?php $master_basin_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_basin_list->FilterOptions->visible()) { ?>
<?php $master_basin_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_basin_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_basin_list->isExport() && !$master_basin->CurrentAction) { ?>
<form name="fmaster_basinlistsrch" id="fmaster_basinlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_basinlistsrch-search-panel" class="<?php echo $master_basin_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_basin">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_basin_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_basin_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_basin_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_basin_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_basin_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_basin_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_basin_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_basin_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_basin_list->showPageHeader(); ?>
<?php
$master_basin_list->showMessage();
?>
<?php if ($master_basin_list->TotalRecords > 0 || $master_basin->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_basin_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_basin">
<?php if (!$master_basin_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_basin_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_basin_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_basin_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_basinlist" id="fmaster_basinlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_basin">
<div id="gmp_master_basin" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_basin_list->TotalRecords > 0 || $master_basin_list->isGridEdit()) { ?>
<table id="tbl_master_basinlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_basin->RowType = ROWTYPE_HEADER;

// Render list options
$master_basin_list->renderListOptions();

// Render list options (header, left)
$master_basin_list->ListOptions->render("header", "left");
?>
<?php if ($master_basin_list->BasinId->Visible) { // BasinId ?>
	<?php if ($master_basin_list->SortUrl($master_basin_list->BasinId) == "") { ?>
		<th data-name="BasinId" class="<?php echo $master_basin_list->BasinId->headerCellClass() ?>"><div id="elh_master_basin_BasinId" class="master_basin_BasinId"><div class="ew-table-header-caption"><?php echo $master_basin_list->BasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinId" class="<?php echo $master_basin_list->BasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_basin_list->SortUrl($master_basin_list->BasinId) ?>', 2);"><div id="elh_master_basin_BasinId" class="master_basin_BasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_basin_list->BasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_basin_list->BasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_basin_list->BasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_basin_list->BasinName->Visible) { // BasinName ?>
	<?php if ($master_basin_list->SortUrl($master_basin_list->BasinName) == "") { ?>
		<th data-name="BasinName" class="<?php echo $master_basin_list->BasinName->headerCellClass() ?>"><div id="elh_master_basin_BasinName" class="master_basin_BasinName"><div class="ew-table-header-caption"><?php echo $master_basin_list->BasinName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinName" class="<?php echo $master_basin_list->BasinName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_basin_list->SortUrl($master_basin_list->BasinName) ?>', 2);"><div id="elh_master_basin_BasinName" class="master_basin_BasinName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_basin_list->BasinName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_basin_list->BasinName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_basin_list->BasinName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_basin_list->BasinName_kn->Visible) { // BasinName_kn ?>
	<?php if ($master_basin_list->SortUrl($master_basin_list->BasinName_kn) == "") { ?>
		<th data-name="BasinName_kn" class="<?php echo $master_basin_list->BasinName_kn->headerCellClass() ?>"><div id="elh_master_basin_BasinName_kn" class="master_basin_BasinName_kn"><div class="ew-table-header-caption"><?php echo $master_basin_list->BasinName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinName_kn" class="<?php echo $master_basin_list->BasinName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_basin_list->SortUrl($master_basin_list->BasinName_kn) ?>', 2);"><div id="elh_master_basin_BasinName_kn" class="master_basin_BasinName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_basin_list->BasinName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_basin_list->BasinName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_basin_list->BasinName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_basin_list->BasinName_hi->Visible) { // BasinName_hi ?>
	<?php if ($master_basin_list->SortUrl($master_basin_list->BasinName_hi) == "") { ?>
		<th data-name="BasinName_hi" class="<?php echo $master_basin_list->BasinName_hi->headerCellClass() ?>"><div id="elh_master_basin_BasinName_hi" class="master_basin_BasinName_hi"><div class="ew-table-header-caption"><?php echo $master_basin_list->BasinName_hi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinName_hi" class="<?php echo $master_basin_list->BasinName_hi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_basin_list->SortUrl($master_basin_list->BasinName_hi) ?>', 2);"><div id="elh_master_basin_BasinName_hi" class="master_basin_BasinName_hi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_basin_list->BasinName_hi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_basin_list->BasinName_hi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_basin_list->BasinName_hi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_basin_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_basin_list->ExportAll && $master_basin_list->isExport()) {
	$master_basin_list->StopRecord = $master_basin_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_basin_list->TotalRecords > $master_basin_list->StartRecord + $master_basin_list->DisplayRecords - 1)
		$master_basin_list->StopRecord = $master_basin_list->StartRecord + $master_basin_list->DisplayRecords - 1;
	else
		$master_basin_list->StopRecord = $master_basin_list->TotalRecords;
}
$master_basin_list->RecordCount = $master_basin_list->StartRecord - 1;
if ($master_basin_list->Recordset && !$master_basin_list->Recordset->EOF) {
	$master_basin_list->Recordset->moveFirst();
	$selectLimit = $master_basin_list->UseSelectLimit;
	if (!$selectLimit && $master_basin_list->StartRecord > 1)
		$master_basin_list->Recordset->move($master_basin_list->StartRecord - 1);
} elseif (!$master_basin->AllowAddDeleteRow && $master_basin_list->StopRecord == 0) {
	$master_basin_list->StopRecord = $master_basin->GridAddRowCount;
}

// Initialize aggregate
$master_basin->RowType = ROWTYPE_AGGREGATEINIT;
$master_basin->resetAttributes();
$master_basin_list->renderRow();
while ($master_basin_list->RecordCount < $master_basin_list->StopRecord) {
	$master_basin_list->RecordCount++;
	if ($master_basin_list->RecordCount >= $master_basin_list->StartRecord) {
		$master_basin_list->RowCount++;

		// Set up key count
		$master_basin_list->KeyCount = $master_basin_list->RowIndex;

		// Init row class and style
		$master_basin->resetAttributes();
		$master_basin->CssClass = "";
		if ($master_basin_list->isGridAdd()) {
		} else {
			$master_basin_list->loadRowValues($master_basin_list->Recordset); // Load row values
		}
		$master_basin->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_basin->RowAttrs->merge(["data-rowindex" => $master_basin_list->RowCount, "id" => "r" . $master_basin_list->RowCount . "_master_basin", "data-rowtype" => $master_basin->RowType]);

		// Render row
		$master_basin_list->renderRow();

		// Render list options
		$master_basin_list->renderListOptions();
?>
	<tr <?php echo $master_basin->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_basin_list->ListOptions->render("body", "left", $master_basin_list->RowCount);
?>
	<?php if ($master_basin_list->BasinId->Visible) { // BasinId ?>
		<td data-name="BasinId" <?php echo $master_basin_list->BasinId->cellAttributes() ?>>
<span id="el<?php echo $master_basin_list->RowCount ?>_master_basin_BasinId">
<span<?php echo $master_basin_list->BasinId->viewAttributes() ?>><?php echo $master_basin_list->BasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_basin_list->BasinName->Visible) { // BasinName ?>
		<td data-name="BasinName" <?php echo $master_basin_list->BasinName->cellAttributes() ?>>
<span id="el<?php echo $master_basin_list->RowCount ?>_master_basin_BasinName">
<span<?php echo $master_basin_list->BasinName->viewAttributes() ?>><?php echo $master_basin_list->BasinName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_basin_list->BasinName_kn->Visible) { // BasinName_kn ?>
		<td data-name="BasinName_kn" <?php echo $master_basin_list->BasinName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_basin_list->RowCount ?>_master_basin_BasinName_kn">
<span<?php echo $master_basin_list->BasinName_kn->viewAttributes() ?>><?php echo $master_basin_list->BasinName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_basin_list->BasinName_hi->Visible) { // BasinName_hi ?>
		<td data-name="BasinName_hi" <?php echo $master_basin_list->BasinName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_basin_list->RowCount ?>_master_basin_BasinName_hi">
<span<?php echo $master_basin_list->BasinName_hi->viewAttributes() ?>><?php echo $master_basin_list->BasinName_hi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_basin_list->ListOptions->render("body", "right", $master_basin_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_basin_list->isGridAdd())
		$master_basin_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_basin->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_basin_list->Recordset)
	$master_basin_list->Recordset->Close();
?>
<?php if (!$master_basin_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_basin_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_basin_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_basin_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_basin_list->TotalRecords == 0 && !$master_basin->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_basin_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_basin_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_basin_list->isExport()) { ?>
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
$master_basin_list->terminate();
?>