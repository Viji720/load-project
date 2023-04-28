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
$master_subdivision_list = new master_subdivision_list();

// Run the page
$master_subdivision_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_subdivision_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_subdivision_list->isExport()) { ?>
<script>
var fmaster_subdivisionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_subdivisionlist = currentForm = new ew.Form("fmaster_subdivisionlist", "list");
	fmaster_subdivisionlist.formKeyCountName = '<?php echo $master_subdivision_list->FormKeyCountName ?>';
	loadjs.done("fmaster_subdivisionlist");
});
var fmaster_subdivisionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_subdivisionlistsrch = currentSearchForm = new ew.Form("fmaster_subdivisionlistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_subdivisionlistsrch.filterList = <?php echo $master_subdivision_list->getFilterList() ?>;
	loadjs.done("fmaster_subdivisionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_subdivision_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_subdivision_list->TotalRecords > 0 && $master_subdivision_list->ExportOptions->visible()) { ?>
<?php $master_subdivision_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_subdivision_list->ImportOptions->visible()) { ?>
<?php $master_subdivision_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_subdivision_list->SearchOptions->visible()) { ?>
<?php $master_subdivision_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_subdivision_list->FilterOptions->visible()) { ?>
<?php $master_subdivision_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_subdivision_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_subdivision_list->isExport() && !$master_subdivision->CurrentAction) { ?>
<form name="fmaster_subdivisionlistsrch" id="fmaster_subdivisionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_subdivisionlistsrch-search-panel" class="<?php echo $master_subdivision_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_subdivision">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_subdivision_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_subdivision_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_subdivision_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_subdivision_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_subdivision_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_subdivision_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_subdivision_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_subdivision_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_subdivision_list->showPageHeader(); ?>
<?php
$master_subdivision_list->showMessage();
?>
<?php if ($master_subdivision_list->TotalRecords > 0 || $master_subdivision->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_subdivision_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_subdivision">
<?php if (!$master_subdivision_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_subdivision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_subdivision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_subdivision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_subdivisionlist" id="fmaster_subdivisionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_subdivision">
<div id="gmp_master_subdivision" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_subdivision_list->TotalRecords > 0 || $master_subdivision_list->isGridEdit()) { ?>
<table id="tbl_master_subdivisionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_subdivision->RowType = ROWTYPE_HEADER;

// Render list options
$master_subdivision_list->renderListOptions();

// Render list options (header, left)
$master_subdivision_list->ListOptions->render("header", "left");
?>
<?php if ($master_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($master_subdivision_list->SortUrl($master_subdivision_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $master_subdivision_list->SubDivisionId->headerCellClass() ?>"><div id="elh_master_subdivision_SubDivisionId" class="master_subdivision_SubDivisionId"><div class="ew-table-header-caption"><?php echo $master_subdivision_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $master_subdivision_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subdivision_list->SortUrl($master_subdivision_list->SubDivisionId) ?>', 2);"><div id="elh_master_subdivision_SubDivisionId" class="master_subdivision_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subdivision_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_subdivision_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subdivision_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_subdivision_list->SubDivisionName->Visible) { // SubDivisionName ?>
	<?php if ($master_subdivision_list->SortUrl($master_subdivision_list->SubDivisionName) == "") { ?>
		<th data-name="SubDivisionName" class="<?php echo $master_subdivision_list->SubDivisionName->headerCellClass() ?>"><div id="elh_master_subdivision_SubDivisionName" class="master_subdivision_SubDivisionName"><div class="ew-table-header-caption"><?php echo $master_subdivision_list->SubDivisionName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionName" class="<?php echo $master_subdivision_list->SubDivisionName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subdivision_list->SortUrl($master_subdivision_list->SubDivisionName) ?>', 2);"><div id="elh_master_subdivision_SubDivisionName" class="master_subdivision_SubDivisionName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subdivision_list->SubDivisionName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_subdivision_list->SubDivisionName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subdivision_list->SubDivisionName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_subdivision_list->SubDivisionName_kn->Visible) { // SubDivisionName_kn ?>
	<?php if ($master_subdivision_list->SortUrl($master_subdivision_list->SubDivisionName_kn) == "") { ?>
		<th data-name="SubDivisionName_kn" class="<?php echo $master_subdivision_list->SubDivisionName_kn->headerCellClass() ?>"><div id="elh_master_subdivision_SubDivisionName_kn" class="master_subdivision_SubDivisionName_kn"><div class="ew-table-header-caption"><?php echo $master_subdivision_list->SubDivisionName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionName_kn" class="<?php echo $master_subdivision_list->SubDivisionName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subdivision_list->SortUrl($master_subdivision_list->SubDivisionName_kn) ?>', 2);"><div id="elh_master_subdivision_SubDivisionName_kn" class="master_subdivision_SubDivisionName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subdivision_list->SubDivisionName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_subdivision_list->SubDivisionName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subdivision_list->SubDivisionName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_subdivision_list->divisionid->Visible) { // divisionid ?>
	<?php if ($master_subdivision_list->SortUrl($master_subdivision_list->divisionid) == "") { ?>
		<th data-name="divisionid" class="<?php echo $master_subdivision_list->divisionid->headerCellClass() ?>"><div id="elh_master_subdivision_divisionid" class="master_subdivision_divisionid"><div class="ew-table-header-caption"><?php echo $master_subdivision_list->divisionid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="divisionid" class="<?php echo $master_subdivision_list->divisionid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subdivision_list->SortUrl($master_subdivision_list->divisionid) ?>', 2);"><div id="elh_master_subdivision_divisionid" class="master_subdivision_divisionid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subdivision_list->divisionid->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_subdivision_list->divisionid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subdivision_list->divisionid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_subdivision_list->circleId->Visible) { // circleId ?>
	<?php if ($master_subdivision_list->SortUrl($master_subdivision_list->circleId) == "") { ?>
		<th data-name="circleId" class="<?php echo $master_subdivision_list->circleId->headerCellClass() ?>"><div id="elh_master_subdivision_circleId" class="master_subdivision_circleId"><div class="ew-table-header-caption"><?php echo $master_subdivision_list->circleId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="circleId" class="<?php echo $master_subdivision_list->circleId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subdivision_list->SortUrl($master_subdivision_list->circleId) ?>', 2);"><div id="elh_master_subdivision_circleId" class="master_subdivision_circleId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subdivision_list->circleId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_subdivision_list->circleId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subdivision_list->circleId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_subdivision_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_subdivision_list->ExportAll && $master_subdivision_list->isExport()) {
	$master_subdivision_list->StopRecord = $master_subdivision_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_subdivision_list->TotalRecords > $master_subdivision_list->StartRecord + $master_subdivision_list->DisplayRecords - 1)
		$master_subdivision_list->StopRecord = $master_subdivision_list->StartRecord + $master_subdivision_list->DisplayRecords - 1;
	else
		$master_subdivision_list->StopRecord = $master_subdivision_list->TotalRecords;
}
$master_subdivision_list->RecordCount = $master_subdivision_list->StartRecord - 1;
if ($master_subdivision_list->Recordset && !$master_subdivision_list->Recordset->EOF) {
	$master_subdivision_list->Recordset->moveFirst();
	$selectLimit = $master_subdivision_list->UseSelectLimit;
	if (!$selectLimit && $master_subdivision_list->StartRecord > 1)
		$master_subdivision_list->Recordset->move($master_subdivision_list->StartRecord - 1);
} elseif (!$master_subdivision->AllowAddDeleteRow && $master_subdivision_list->StopRecord == 0) {
	$master_subdivision_list->StopRecord = $master_subdivision->GridAddRowCount;
}

// Initialize aggregate
$master_subdivision->RowType = ROWTYPE_AGGREGATEINIT;
$master_subdivision->resetAttributes();
$master_subdivision_list->renderRow();
while ($master_subdivision_list->RecordCount < $master_subdivision_list->StopRecord) {
	$master_subdivision_list->RecordCount++;
	if ($master_subdivision_list->RecordCount >= $master_subdivision_list->StartRecord) {
		$master_subdivision_list->RowCount++;

		// Set up key count
		$master_subdivision_list->KeyCount = $master_subdivision_list->RowIndex;

		// Init row class and style
		$master_subdivision->resetAttributes();
		$master_subdivision->CssClass = "";
		if ($master_subdivision_list->isGridAdd()) {
		} else {
			$master_subdivision_list->loadRowValues($master_subdivision_list->Recordset); // Load row values
		}
		$master_subdivision->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_subdivision->RowAttrs->merge(["data-rowindex" => $master_subdivision_list->RowCount, "id" => "r" . $master_subdivision_list->RowCount . "_master_subdivision", "data-rowtype" => $master_subdivision->RowType]);

		// Render row
		$master_subdivision_list->renderRow();

		// Render list options
		$master_subdivision_list->renderListOptions();
?>
	<tr <?php echo $master_subdivision->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_subdivision_list->ListOptions->render("body", "left", $master_subdivision_list->RowCount);
?>
	<?php if ($master_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $master_subdivision_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_list->RowCount ?>_master_subdivision_SubDivisionId">
<span<?php echo $master_subdivision_list->SubDivisionId->viewAttributes() ?>><?php echo $master_subdivision_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_subdivision_list->SubDivisionName->Visible) { // SubDivisionName ?>
		<td data-name="SubDivisionName" <?php echo $master_subdivision_list->SubDivisionName->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_list->RowCount ?>_master_subdivision_SubDivisionName">
<span<?php echo $master_subdivision_list->SubDivisionName->viewAttributes() ?>><?php echo $master_subdivision_list->SubDivisionName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_subdivision_list->SubDivisionName_kn->Visible) { // SubDivisionName_kn ?>
		<td data-name="SubDivisionName_kn" <?php echo $master_subdivision_list->SubDivisionName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_list->RowCount ?>_master_subdivision_SubDivisionName_kn">
<span<?php echo $master_subdivision_list->SubDivisionName_kn->viewAttributes() ?>><?php echo $master_subdivision_list->SubDivisionName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_subdivision_list->divisionid->Visible) { // divisionid ?>
		<td data-name="divisionid" <?php echo $master_subdivision_list->divisionid->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_list->RowCount ?>_master_subdivision_divisionid">
<span<?php echo $master_subdivision_list->divisionid->viewAttributes() ?>><?php echo $master_subdivision_list->divisionid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_subdivision_list->circleId->Visible) { // circleId ?>
		<td data-name="circleId" <?php echo $master_subdivision_list->circleId->cellAttributes() ?>>
<span id="el<?php echo $master_subdivision_list->RowCount ?>_master_subdivision_circleId">
<span<?php echo $master_subdivision_list->circleId->viewAttributes() ?>><?php echo $master_subdivision_list->circleId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_subdivision_list->ListOptions->render("body", "right", $master_subdivision_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_subdivision_list->isGridAdd())
		$master_subdivision_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_subdivision->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_subdivision_list->Recordset)
	$master_subdivision_list->Recordset->Close();
?>
<?php if (!$master_subdivision_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_subdivision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_subdivision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_subdivision_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_subdivision_list->TotalRecords == 0 && !$master_subdivision->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_subdivision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_subdivision_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_subdivision_list->isExport()) { ?>
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
$master_subdivision_list->terminate();
?>