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
$lkp_month_id_list = new lkp_month_id_list();

// Run the page
$lkp_month_id_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_month_id_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_month_id_list->isExport()) { ?>
<script>
var flkp_month_idlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flkp_month_idlist = currentForm = new ew.Form("flkp_month_idlist", "list");
	flkp_month_idlist.formKeyCountName = '<?php echo $lkp_month_id_list->FormKeyCountName ?>';
	loadjs.done("flkp_month_idlist");
});
var flkp_month_idlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flkp_month_idlistsrch = currentSearchForm = new ew.Form("flkp_month_idlistsrch");

	// Dynamic selection lists
	// Filters

	flkp_month_idlistsrch.filterList = <?php echo $lkp_month_id_list->getFilterList() ?>;
	loadjs.done("flkp_month_idlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_month_id_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lkp_month_id_list->TotalRecords > 0 && $lkp_month_id_list->ExportOptions->visible()) { ?>
<?php $lkp_month_id_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_month_id_list->ImportOptions->visible()) { ?>
<?php $lkp_month_id_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_month_id_list->SearchOptions->visible()) { ?>
<?php $lkp_month_id_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_month_id_list->FilterOptions->visible()) { ?>
<?php $lkp_month_id_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lkp_month_id_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lkp_month_id_list->isExport() && !$lkp_month_id->CurrentAction) { ?>
<form name="flkp_month_idlistsrch" id="flkp_month_idlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flkp_month_idlistsrch-search-panel" class="<?php echo $lkp_month_id_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lkp_month_id">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lkp_month_id_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lkp_month_id_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lkp_month_id_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lkp_month_id_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lkp_month_id_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lkp_month_id_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lkp_month_id_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lkp_month_id_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lkp_month_id_list->showPageHeader(); ?>
<?php
$lkp_month_id_list->showMessage();
?>
<?php if ($lkp_month_id_list->TotalRecords > 0 || $lkp_month_id->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lkp_month_id_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lkp_month_id">
<?php if (!$lkp_month_id_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lkp_month_id_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lkp_month_id_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lkp_month_id_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flkp_month_idlist" id="flkp_month_idlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_month_id">
<div id="gmp_lkp_month_id" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lkp_month_id_list->TotalRecords > 0 || $lkp_month_id_list->isGridEdit()) { ?>
<table id="tbl_lkp_month_idlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lkp_month_id->RowType = ROWTYPE_HEADER;

// Render list options
$lkp_month_id_list->renderListOptions();

// Render list options (header, left)
$lkp_month_id_list->ListOptions->render("header", "left");
?>
<?php if ($lkp_month_id_list->month_id->Visible) { // month_id ?>
	<?php if ($lkp_month_id_list->SortUrl($lkp_month_id_list->month_id) == "") { ?>
		<th data-name="month_id" class="<?php echo $lkp_month_id_list->month_id->headerCellClass() ?>"><div id="elh_lkp_month_id_month_id" class="lkp_month_id_month_id"><div class="ew-table-header-caption"><?php echo $lkp_month_id_list->month_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="month_id" class="<?php echo $lkp_month_id_list->month_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_month_id_list->SortUrl($lkp_month_id_list->month_id) ?>', 2);"><div id="elh_lkp_month_id_month_id" class="lkp_month_id_month_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_month_id_list->month_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lkp_month_id_list->month_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_month_id_list->month_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lkp_month_id_list->month_Name->Visible) { // month_Name ?>
	<?php if ($lkp_month_id_list->SortUrl($lkp_month_id_list->month_Name) == "") { ?>
		<th data-name="month_Name" class="<?php echo $lkp_month_id_list->month_Name->headerCellClass() ?>"><div id="elh_lkp_month_id_month_Name" class="lkp_month_id_month_Name"><div class="ew-table-header-caption"><?php echo $lkp_month_id_list->month_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="month_Name" class="<?php echo $lkp_month_id_list->month_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_month_id_list->SortUrl($lkp_month_id_list->month_Name) ?>', 2);"><div id="elh_lkp_month_id_month_Name" class="lkp_month_id_month_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_month_id_list->month_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lkp_month_id_list->month_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_month_id_list->month_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lkp_month_id_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lkp_month_id_list->ExportAll && $lkp_month_id_list->isExport()) {
	$lkp_month_id_list->StopRecord = $lkp_month_id_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lkp_month_id_list->TotalRecords > $lkp_month_id_list->StartRecord + $lkp_month_id_list->DisplayRecords - 1)
		$lkp_month_id_list->StopRecord = $lkp_month_id_list->StartRecord + $lkp_month_id_list->DisplayRecords - 1;
	else
		$lkp_month_id_list->StopRecord = $lkp_month_id_list->TotalRecords;
}
$lkp_month_id_list->RecordCount = $lkp_month_id_list->StartRecord - 1;
if ($lkp_month_id_list->Recordset && !$lkp_month_id_list->Recordset->EOF) {
	$lkp_month_id_list->Recordset->moveFirst();
	$selectLimit = $lkp_month_id_list->UseSelectLimit;
	if (!$selectLimit && $lkp_month_id_list->StartRecord > 1)
		$lkp_month_id_list->Recordset->move($lkp_month_id_list->StartRecord - 1);
} elseif (!$lkp_month_id->AllowAddDeleteRow && $lkp_month_id_list->StopRecord == 0) {
	$lkp_month_id_list->StopRecord = $lkp_month_id->GridAddRowCount;
}

// Initialize aggregate
$lkp_month_id->RowType = ROWTYPE_AGGREGATEINIT;
$lkp_month_id->resetAttributes();
$lkp_month_id_list->renderRow();
while ($lkp_month_id_list->RecordCount < $lkp_month_id_list->StopRecord) {
	$lkp_month_id_list->RecordCount++;
	if ($lkp_month_id_list->RecordCount >= $lkp_month_id_list->StartRecord) {
		$lkp_month_id_list->RowCount++;

		// Set up key count
		$lkp_month_id_list->KeyCount = $lkp_month_id_list->RowIndex;

		// Init row class and style
		$lkp_month_id->resetAttributes();
		$lkp_month_id->CssClass = "";
		if ($lkp_month_id_list->isGridAdd()) {
		} else {
			$lkp_month_id_list->loadRowValues($lkp_month_id_list->Recordset); // Load row values
		}
		$lkp_month_id->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lkp_month_id->RowAttrs->merge(["data-rowindex" => $lkp_month_id_list->RowCount, "id" => "r" . $lkp_month_id_list->RowCount . "_lkp_month_id", "data-rowtype" => $lkp_month_id->RowType]);

		// Render row
		$lkp_month_id_list->renderRow();

		// Render list options
		$lkp_month_id_list->renderListOptions();
?>
	<tr <?php echo $lkp_month_id->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lkp_month_id_list->ListOptions->render("body", "left", $lkp_month_id_list->RowCount);
?>
	<?php if ($lkp_month_id_list->month_id->Visible) { // month_id ?>
		<td data-name="month_id" <?php echo $lkp_month_id_list->month_id->cellAttributes() ?>>
<span id="el<?php echo $lkp_month_id_list->RowCount ?>_lkp_month_id_month_id">
<span<?php echo $lkp_month_id_list->month_id->viewAttributes() ?>><?php echo $lkp_month_id_list->month_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lkp_month_id_list->month_Name->Visible) { // month_Name ?>
		<td data-name="month_Name" <?php echo $lkp_month_id_list->month_Name->cellAttributes() ?>>
<span id="el<?php echo $lkp_month_id_list->RowCount ?>_lkp_month_id_month_Name">
<span<?php echo $lkp_month_id_list->month_Name->viewAttributes() ?>><?php echo $lkp_month_id_list->month_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lkp_month_id_list->ListOptions->render("body", "right", $lkp_month_id_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lkp_month_id_list->isGridAdd())
		$lkp_month_id_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lkp_month_id->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lkp_month_id_list->Recordset)
	$lkp_month_id_list->Recordset->Close();
?>
<?php if (!$lkp_month_id_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lkp_month_id_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lkp_month_id_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lkp_month_id_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lkp_month_id_list->TotalRecords == 0 && !$lkp_month_id->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lkp_month_id_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lkp_month_id_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_month_id_list->isExport()) { ?>
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
$lkp_month_id_list->terminate();
?>