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
$master_division_list = new master_division_list();

// Run the page
$master_division_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_division_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_division_list->isExport()) { ?>
<script>
var fmaster_divisionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_divisionlist = currentForm = new ew.Form("fmaster_divisionlist", "list");
	fmaster_divisionlist.formKeyCountName = '<?php echo $master_division_list->FormKeyCountName ?>';
	loadjs.done("fmaster_divisionlist");
});
var fmaster_divisionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_divisionlistsrch = currentSearchForm = new ew.Form("fmaster_divisionlistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_divisionlistsrch.filterList = <?php echo $master_division_list->getFilterList() ?>;
	loadjs.done("fmaster_divisionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_division_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_division_list->TotalRecords > 0 && $master_division_list->ExportOptions->visible()) { ?>
<?php $master_division_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_division_list->ImportOptions->visible()) { ?>
<?php $master_division_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_division_list->SearchOptions->visible()) { ?>
<?php $master_division_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_division_list->FilterOptions->visible()) { ?>
<?php $master_division_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_division_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_division_list->isExport() && !$master_division->CurrentAction) { ?>
<form name="fmaster_divisionlistsrch" id="fmaster_divisionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_divisionlistsrch-search-panel" class="<?php echo $master_division_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_division">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_division_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_division_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_division_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_division_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_division_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_division_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_division_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_division_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_division_list->showPageHeader(); ?>
<?php
$master_division_list->showMessage();
?>
<?php if ($master_division_list->TotalRecords > 0 || $master_division->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_division_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_division">
<?php if (!$master_division_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_division_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_division_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_division_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_divisionlist" id="fmaster_divisionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_division">
<div id="gmp_master_division" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_division_list->TotalRecords > 0 || $master_division_list->isGridEdit()) { ?>
<table id="tbl_master_divisionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_division->RowType = ROWTYPE_HEADER;

// Render list options
$master_division_list->renderListOptions();

// Render list options (header, left)
$master_division_list->ListOptions->render("header", "left");
?>
<?php if ($master_division_list->divisionId->Visible) { // divisionId ?>
	<?php if ($master_division_list->SortUrl($master_division_list->divisionId) == "") { ?>
		<th data-name="divisionId" class="<?php echo $master_division_list->divisionId->headerCellClass() ?>"><div id="elh_master_division_divisionId" class="master_division_divisionId"><div class="ew-table-header-caption"><?php echo $master_division_list->divisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="divisionId" class="<?php echo $master_division_list->divisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_division_list->SortUrl($master_division_list->divisionId) ?>', 2);"><div id="elh_master_division_divisionId" class="master_division_divisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_division_list->divisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_division_list->divisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_division_list->divisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_division_list->divisionName->Visible) { // divisionName ?>
	<?php if ($master_division_list->SortUrl($master_division_list->divisionName) == "") { ?>
		<th data-name="divisionName" class="<?php echo $master_division_list->divisionName->headerCellClass() ?>"><div id="elh_master_division_divisionName" class="master_division_divisionName"><div class="ew-table-header-caption"><?php echo $master_division_list->divisionName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="divisionName" class="<?php echo $master_division_list->divisionName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_division_list->SortUrl($master_division_list->divisionName) ?>', 2);"><div id="elh_master_division_divisionName" class="master_division_divisionName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_division_list->divisionName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_division_list->divisionName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_division_list->divisionName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_division_list->divisionName_kn->Visible) { // divisionName_kn ?>
	<?php if ($master_division_list->SortUrl($master_division_list->divisionName_kn) == "") { ?>
		<th data-name="divisionName_kn" class="<?php echo $master_division_list->divisionName_kn->headerCellClass() ?>"><div id="elh_master_division_divisionName_kn" class="master_division_divisionName_kn"><div class="ew-table-header-caption"><?php echo $master_division_list->divisionName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="divisionName_kn" class="<?php echo $master_division_list->divisionName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_division_list->SortUrl($master_division_list->divisionName_kn) ?>', 2);"><div id="elh_master_division_divisionName_kn" class="master_division_divisionName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_division_list->divisionName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_division_list->divisionName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_division_list->divisionName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_division_list->divisionName_hi->Visible) { // divisionName_hi ?>
	<?php if ($master_division_list->SortUrl($master_division_list->divisionName_hi) == "") { ?>
		<th data-name="divisionName_hi" class="<?php echo $master_division_list->divisionName_hi->headerCellClass() ?>"><div id="elh_master_division_divisionName_hi" class="master_division_divisionName_hi"><div class="ew-table-header-caption"><?php echo $master_division_list->divisionName_hi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="divisionName_hi" class="<?php echo $master_division_list->divisionName_hi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_division_list->SortUrl($master_division_list->divisionName_hi) ?>', 2);"><div id="elh_master_division_divisionName_hi" class="master_division_divisionName_hi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_division_list->divisionName_hi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_division_list->divisionName_hi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_division_list->divisionName_hi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_division_list->circleId->Visible) { // circleId ?>
	<?php if ($master_division_list->SortUrl($master_division_list->circleId) == "") { ?>
		<th data-name="circleId" class="<?php echo $master_division_list->circleId->headerCellClass() ?>"><div id="elh_master_division_circleId" class="master_division_circleId"><div class="ew-table-header-caption"><?php echo $master_division_list->circleId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="circleId" class="<?php echo $master_division_list->circleId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_division_list->SortUrl($master_division_list->circleId) ?>', 2);"><div id="elh_master_division_circleId" class="master_division_circleId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_division_list->circleId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_division_list->circleId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_division_list->circleId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_division_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_division_list->ExportAll && $master_division_list->isExport()) {
	$master_division_list->StopRecord = $master_division_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_division_list->TotalRecords > $master_division_list->StartRecord + $master_division_list->DisplayRecords - 1)
		$master_division_list->StopRecord = $master_division_list->StartRecord + $master_division_list->DisplayRecords - 1;
	else
		$master_division_list->StopRecord = $master_division_list->TotalRecords;
}
$master_division_list->RecordCount = $master_division_list->StartRecord - 1;
if ($master_division_list->Recordset && !$master_division_list->Recordset->EOF) {
	$master_division_list->Recordset->moveFirst();
	$selectLimit = $master_division_list->UseSelectLimit;
	if (!$selectLimit && $master_division_list->StartRecord > 1)
		$master_division_list->Recordset->move($master_division_list->StartRecord - 1);
} elseif (!$master_division->AllowAddDeleteRow && $master_division_list->StopRecord == 0) {
	$master_division_list->StopRecord = $master_division->GridAddRowCount;
}

// Initialize aggregate
$master_division->RowType = ROWTYPE_AGGREGATEINIT;
$master_division->resetAttributes();
$master_division_list->renderRow();
while ($master_division_list->RecordCount < $master_division_list->StopRecord) {
	$master_division_list->RecordCount++;
	if ($master_division_list->RecordCount >= $master_division_list->StartRecord) {
		$master_division_list->RowCount++;

		// Set up key count
		$master_division_list->KeyCount = $master_division_list->RowIndex;

		// Init row class and style
		$master_division->resetAttributes();
		$master_division->CssClass = "";
		if ($master_division_list->isGridAdd()) {
		} else {
			$master_division_list->loadRowValues($master_division_list->Recordset); // Load row values
		}
		$master_division->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_division->RowAttrs->merge(["data-rowindex" => $master_division_list->RowCount, "id" => "r" . $master_division_list->RowCount . "_master_division", "data-rowtype" => $master_division->RowType]);

		// Render row
		$master_division_list->renderRow();

		// Render list options
		$master_division_list->renderListOptions();
?>
	<tr <?php echo $master_division->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_division_list->ListOptions->render("body", "left", $master_division_list->RowCount);
?>
	<?php if ($master_division_list->divisionId->Visible) { // divisionId ?>
		<td data-name="divisionId" <?php echo $master_division_list->divisionId->cellAttributes() ?>>
<span id="el<?php echo $master_division_list->RowCount ?>_master_division_divisionId">
<span<?php echo $master_division_list->divisionId->viewAttributes() ?>><?php echo $master_division_list->divisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_division_list->divisionName->Visible) { // divisionName ?>
		<td data-name="divisionName" <?php echo $master_division_list->divisionName->cellAttributes() ?>>
<span id="el<?php echo $master_division_list->RowCount ?>_master_division_divisionName">
<span<?php echo $master_division_list->divisionName->viewAttributes() ?>><?php echo $master_division_list->divisionName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_division_list->divisionName_kn->Visible) { // divisionName_kn ?>
		<td data-name="divisionName_kn" <?php echo $master_division_list->divisionName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_division_list->RowCount ?>_master_division_divisionName_kn">
<span<?php echo $master_division_list->divisionName_kn->viewAttributes() ?>><?php echo $master_division_list->divisionName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_division_list->divisionName_hi->Visible) { // divisionName_hi ?>
		<td data-name="divisionName_hi" <?php echo $master_division_list->divisionName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_division_list->RowCount ?>_master_division_divisionName_hi">
<span<?php echo $master_division_list->divisionName_hi->viewAttributes() ?>><?php echo $master_division_list->divisionName_hi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_division_list->circleId->Visible) { // circleId ?>
		<td data-name="circleId" <?php echo $master_division_list->circleId->cellAttributes() ?>>
<span id="el<?php echo $master_division_list->RowCount ?>_master_division_circleId">
<span<?php echo $master_division_list->circleId->viewAttributes() ?>><?php echo $master_division_list->circleId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_division_list->ListOptions->render("body", "right", $master_division_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_division_list->isGridAdd())
		$master_division_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_division->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_division_list->Recordset)
	$master_division_list->Recordset->Close();
?>
<?php if (!$master_division_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_division_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_division_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_division_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_division_list->TotalRecords == 0 && !$master_division->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_division_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_division_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_division_list->isExport()) { ?>
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
$master_division_list->terminate();
?>