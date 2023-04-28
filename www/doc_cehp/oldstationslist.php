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
$oldstations_list = new oldstations_list();

// Run the page
$oldstations_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$oldstations_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$oldstations_list->isExport()) { ?>
<script>
var foldstationslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	foldstationslist = currentForm = new ew.Form("foldstationslist", "list");
	foldstationslist.formKeyCountName = '<?php echo $oldstations_list->FormKeyCountName ?>';
	loadjs.done("foldstationslist");
});
var foldstationslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	foldstationslistsrch = currentSearchForm = new ew.Form("foldstationslistsrch");

	// Dynamic selection lists
	// Filters

	foldstationslistsrch.filterList = <?php echo $oldstations_list->getFilterList() ?>;
	loadjs.done("foldstationslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$oldstations_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($oldstations_list->TotalRecords > 0 && $oldstations_list->ExportOptions->visible()) { ?>
<?php $oldstations_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($oldstations_list->ImportOptions->visible()) { ?>
<?php $oldstations_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($oldstations_list->SearchOptions->visible()) { ?>
<?php $oldstations_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($oldstations_list->FilterOptions->visible()) { ?>
<?php $oldstations_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$oldstations_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$oldstations_list->isExport() && !$oldstations->CurrentAction) { ?>
<form name="foldstationslistsrch" id="foldstationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="foldstationslistsrch-search-panel" class="<?php echo $oldstations_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="oldstations">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $oldstations_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($oldstations_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($oldstations_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $oldstations_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($oldstations_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($oldstations_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($oldstations_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($oldstations_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $oldstations_list->showPageHeader(); ?>
<?php
$oldstations_list->showMessage();
?>
<?php if ($oldstations_list->TotalRecords > 0 || $oldstations->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($oldstations_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> oldstations">
<?php if (!$oldstations_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$oldstations_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $oldstations_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $oldstations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="foldstationslist" id="foldstationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="oldstations">
<div id="gmp_oldstations" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($oldstations_list->TotalRecords > 0 || $oldstations_list->isGridEdit()) { ?>
<table id="tbl_oldstationslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$oldstations->RowType = ROWTYPE_HEADER;

// Render list options
$oldstations_list->renderListOptions();

// Render list options (header, left)
$oldstations_list->ListOptions->render("header", "left");
?>
<?php if ($oldstations_list->Station->Visible) { // Station ?>
	<?php if ($oldstations_list->SortUrl($oldstations_list->Station) == "") { ?>
		<th data-name="Station" class="<?php echo $oldstations_list->Station->headerCellClass() ?>"><div id="elh_oldstations_Station" class="oldstations_Station"><div class="ew-table-header-caption"><?php echo $oldstations_list->Station->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Station" class="<?php echo $oldstations_list->Station->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $oldstations_list->SortUrl($oldstations_list->Station) ?>', 2);"><div id="elh_oldstations_Station" class="oldstations_Station">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $oldstations_list->Station->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($oldstations_list->Station->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($oldstations_list->Station->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($oldstations_list->NewNumbers->Visible) { // NewNumbers ?>
	<?php if ($oldstations_list->SortUrl($oldstations_list->NewNumbers) == "") { ?>
		<th data-name="NewNumbers" class="<?php echo $oldstations_list->NewNumbers->headerCellClass() ?>"><div id="elh_oldstations_NewNumbers" class="oldstations_NewNumbers"><div class="ew-table-header-caption"><?php echo $oldstations_list->NewNumbers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NewNumbers" class="<?php echo $oldstations_list->NewNumbers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $oldstations_list->SortUrl($oldstations_list->NewNumbers) ?>', 2);"><div id="elh_oldstations_NewNumbers" class="oldstations_NewNumbers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $oldstations_list->NewNumbers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($oldstations_list->NewNumbers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($oldstations_list->NewNumbers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($oldstations_list->OldNumbers->Visible) { // OldNumbers ?>
	<?php if ($oldstations_list->SortUrl($oldstations_list->OldNumbers) == "") { ?>
		<th data-name="OldNumbers" class="<?php echo $oldstations_list->OldNumbers->headerCellClass() ?>"><div id="elh_oldstations_OldNumbers" class="oldstations_OldNumbers"><div class="ew-table-header-caption"><?php echo $oldstations_list->OldNumbers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OldNumbers" class="<?php echo $oldstations_list->OldNumbers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $oldstations_list->SortUrl($oldstations_list->OldNumbers) ?>', 2);"><div id="elh_oldstations_OldNumbers" class="oldstations_OldNumbers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $oldstations_list->OldNumbers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($oldstations_list->OldNumbers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($oldstations_list->OldNumbers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$oldstations_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($oldstations_list->ExportAll && $oldstations_list->isExport()) {
	$oldstations_list->StopRecord = $oldstations_list->TotalRecords;
} else {

	// Set the last record to display
	if ($oldstations_list->TotalRecords > $oldstations_list->StartRecord + $oldstations_list->DisplayRecords - 1)
		$oldstations_list->StopRecord = $oldstations_list->StartRecord + $oldstations_list->DisplayRecords - 1;
	else
		$oldstations_list->StopRecord = $oldstations_list->TotalRecords;
}
$oldstations_list->RecordCount = $oldstations_list->StartRecord - 1;
if ($oldstations_list->Recordset && !$oldstations_list->Recordset->EOF) {
	$oldstations_list->Recordset->moveFirst();
	$selectLimit = $oldstations_list->UseSelectLimit;
	if (!$selectLimit && $oldstations_list->StartRecord > 1)
		$oldstations_list->Recordset->move($oldstations_list->StartRecord - 1);
} elseif (!$oldstations->AllowAddDeleteRow && $oldstations_list->StopRecord == 0) {
	$oldstations_list->StopRecord = $oldstations->GridAddRowCount;
}

// Initialize aggregate
$oldstations->RowType = ROWTYPE_AGGREGATEINIT;
$oldstations->resetAttributes();
$oldstations_list->renderRow();
while ($oldstations_list->RecordCount < $oldstations_list->StopRecord) {
	$oldstations_list->RecordCount++;
	if ($oldstations_list->RecordCount >= $oldstations_list->StartRecord) {
		$oldstations_list->RowCount++;

		// Set up key count
		$oldstations_list->KeyCount = $oldstations_list->RowIndex;

		// Init row class and style
		$oldstations->resetAttributes();
		$oldstations->CssClass = "";
		if ($oldstations_list->isGridAdd()) {
		} else {
			$oldstations_list->loadRowValues($oldstations_list->Recordset); // Load row values
		}
		$oldstations->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$oldstations->RowAttrs->merge(["data-rowindex" => $oldstations_list->RowCount, "id" => "r" . $oldstations_list->RowCount . "_oldstations", "data-rowtype" => $oldstations->RowType]);

		// Render row
		$oldstations_list->renderRow();

		// Render list options
		$oldstations_list->renderListOptions();
?>
	<tr <?php echo $oldstations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$oldstations_list->ListOptions->render("body", "left", $oldstations_list->RowCount);
?>
	<?php if ($oldstations_list->Station->Visible) { // Station ?>
		<td data-name="Station" <?php echo $oldstations_list->Station->cellAttributes() ?>>
<span id="el<?php echo $oldstations_list->RowCount ?>_oldstations_Station">
<span<?php echo $oldstations_list->Station->viewAttributes() ?>><?php echo $oldstations_list->Station->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($oldstations_list->NewNumbers->Visible) { // NewNumbers ?>
		<td data-name="NewNumbers" <?php echo $oldstations_list->NewNumbers->cellAttributes() ?>>
<span id="el<?php echo $oldstations_list->RowCount ?>_oldstations_NewNumbers">
<span<?php echo $oldstations_list->NewNumbers->viewAttributes() ?>><?php echo $oldstations_list->NewNumbers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($oldstations_list->OldNumbers->Visible) { // OldNumbers ?>
		<td data-name="OldNumbers" <?php echo $oldstations_list->OldNumbers->cellAttributes() ?>>
<span id="el<?php echo $oldstations_list->RowCount ?>_oldstations_OldNumbers">
<span<?php echo $oldstations_list->OldNumbers->viewAttributes() ?>><?php echo $oldstations_list->OldNumbers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$oldstations_list->ListOptions->render("body", "right", $oldstations_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$oldstations_list->isGridAdd())
		$oldstations_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$oldstations->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($oldstations_list->Recordset)
	$oldstations_list->Recordset->Close();
?>
<?php if (!$oldstations_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$oldstations_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $oldstations_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $oldstations_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($oldstations_list->TotalRecords == 0 && !$oldstations->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $oldstations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$oldstations_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$oldstations_list->isExport()) { ?>
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
$oldstations_list->terminate();
?>