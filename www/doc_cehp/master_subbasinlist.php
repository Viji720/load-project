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
$master_subbasin_list = new master_subbasin_list();

// Run the page
$master_subbasin_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_subbasin_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_subbasin_list->isExport()) { ?>
<script>
var fmaster_subbasinlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_subbasinlist = currentForm = new ew.Form("fmaster_subbasinlist", "list");
	fmaster_subbasinlist.formKeyCountName = '<?php echo $master_subbasin_list->FormKeyCountName ?>';
	loadjs.done("fmaster_subbasinlist");
});
var fmaster_subbasinlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_subbasinlistsrch = currentSearchForm = new ew.Form("fmaster_subbasinlistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_subbasinlistsrch.filterList = <?php echo $master_subbasin_list->getFilterList() ?>;
	loadjs.done("fmaster_subbasinlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_subbasin_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_subbasin_list->TotalRecords > 0 && $master_subbasin_list->ExportOptions->visible()) { ?>
<?php $master_subbasin_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_subbasin_list->ImportOptions->visible()) { ?>
<?php $master_subbasin_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_subbasin_list->SearchOptions->visible()) { ?>
<?php $master_subbasin_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_subbasin_list->FilterOptions->visible()) { ?>
<?php $master_subbasin_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_subbasin_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_subbasin_list->isExport() && !$master_subbasin->CurrentAction) { ?>
<form name="fmaster_subbasinlistsrch" id="fmaster_subbasinlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_subbasinlistsrch-search-panel" class="<?php echo $master_subbasin_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_subbasin">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_subbasin_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_subbasin_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_subbasin_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_subbasin_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_subbasin_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_subbasin_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_subbasin_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_subbasin_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_subbasin_list->showPageHeader(); ?>
<?php
$master_subbasin_list->showMessage();
?>
<?php if ($master_subbasin_list->TotalRecords > 0 || $master_subbasin->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_subbasin_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_subbasin">
<?php if (!$master_subbasin_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_subbasin_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_subbasin_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_subbasin_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_subbasinlist" id="fmaster_subbasinlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_subbasin">
<div id="gmp_master_subbasin" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_subbasin_list->TotalRecords > 0 || $master_subbasin_list->isGridEdit()) { ?>
<table id="tbl_master_subbasinlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_subbasin->RowType = ROWTYPE_HEADER;

// Render list options
$master_subbasin_list->renderListOptions();

// Render list options (header, left)
$master_subbasin_list->ListOptions->render("header", "left");
?>
<?php if ($master_subbasin_list->SubBasinId->Visible) { // SubBasinId ?>
	<?php if ($master_subbasin_list->SortUrl($master_subbasin_list->SubBasinId) == "") { ?>
		<th data-name="SubBasinId" class="<?php echo $master_subbasin_list->SubBasinId->headerCellClass() ?>"><div id="elh_master_subbasin_SubBasinId" class="master_subbasin_SubBasinId"><div class="ew-table-header-caption"><?php echo $master_subbasin_list->SubBasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinId" class="<?php echo $master_subbasin_list->SubBasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subbasin_list->SortUrl($master_subbasin_list->SubBasinId) ?>', 2);"><div id="elh_master_subbasin_SubBasinId" class="master_subbasin_SubBasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subbasin_list->SubBasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_subbasin_list->SubBasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subbasin_list->SubBasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_subbasin_list->SubBasinName->Visible) { // SubBasinName ?>
	<?php if ($master_subbasin_list->SortUrl($master_subbasin_list->SubBasinName) == "") { ?>
		<th data-name="SubBasinName" class="<?php echo $master_subbasin_list->SubBasinName->headerCellClass() ?>"><div id="elh_master_subbasin_SubBasinName" class="master_subbasin_SubBasinName"><div class="ew-table-header-caption"><?php echo $master_subbasin_list->SubBasinName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinName" class="<?php echo $master_subbasin_list->SubBasinName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subbasin_list->SortUrl($master_subbasin_list->SubBasinName) ?>', 2);"><div id="elh_master_subbasin_SubBasinName" class="master_subbasin_SubBasinName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subbasin_list->SubBasinName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_subbasin_list->SubBasinName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subbasin_list->SubBasinName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_subbasin_list->SubBasinName_kn->Visible) { // SubBasinName_kn ?>
	<?php if ($master_subbasin_list->SortUrl($master_subbasin_list->SubBasinName_kn) == "") { ?>
		<th data-name="SubBasinName_kn" class="<?php echo $master_subbasin_list->SubBasinName_kn->headerCellClass() ?>"><div id="elh_master_subbasin_SubBasinName_kn" class="master_subbasin_SubBasinName_kn"><div class="ew-table-header-caption"><?php echo $master_subbasin_list->SubBasinName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinName_kn" class="<?php echo $master_subbasin_list->SubBasinName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subbasin_list->SortUrl($master_subbasin_list->SubBasinName_kn) ?>', 2);"><div id="elh_master_subbasin_SubBasinName_kn" class="master_subbasin_SubBasinName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subbasin_list->SubBasinName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_subbasin_list->SubBasinName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subbasin_list->SubBasinName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_subbasin_list->SubBasinName_hi->Visible) { // SubBasinName_hi ?>
	<?php if ($master_subbasin_list->SortUrl($master_subbasin_list->SubBasinName_hi) == "") { ?>
		<th data-name="SubBasinName_hi" class="<?php echo $master_subbasin_list->SubBasinName_hi->headerCellClass() ?>"><div id="elh_master_subbasin_SubBasinName_hi" class="master_subbasin_SubBasinName_hi"><div class="ew-table-header-caption"><?php echo $master_subbasin_list->SubBasinName_hi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinName_hi" class="<?php echo $master_subbasin_list->SubBasinName_hi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subbasin_list->SortUrl($master_subbasin_list->SubBasinName_hi) ?>', 2);"><div id="elh_master_subbasin_SubBasinName_hi" class="master_subbasin_SubBasinName_hi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subbasin_list->SubBasinName_hi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_subbasin_list->SubBasinName_hi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subbasin_list->SubBasinName_hi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_subbasin_list->BasinId->Visible) { // BasinId ?>
	<?php if ($master_subbasin_list->SortUrl($master_subbasin_list->BasinId) == "") { ?>
		<th data-name="BasinId" class="<?php echo $master_subbasin_list->BasinId->headerCellClass() ?>"><div id="elh_master_subbasin_BasinId" class="master_subbasin_BasinId"><div class="ew-table-header-caption"><?php echo $master_subbasin_list->BasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinId" class="<?php echo $master_subbasin_list->BasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_subbasin_list->SortUrl($master_subbasin_list->BasinId) ?>', 2);"><div id="elh_master_subbasin_BasinId" class="master_subbasin_BasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_subbasin_list->BasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_subbasin_list->BasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_subbasin_list->BasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_subbasin_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_subbasin_list->ExportAll && $master_subbasin_list->isExport()) {
	$master_subbasin_list->StopRecord = $master_subbasin_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_subbasin_list->TotalRecords > $master_subbasin_list->StartRecord + $master_subbasin_list->DisplayRecords - 1)
		$master_subbasin_list->StopRecord = $master_subbasin_list->StartRecord + $master_subbasin_list->DisplayRecords - 1;
	else
		$master_subbasin_list->StopRecord = $master_subbasin_list->TotalRecords;
}
$master_subbasin_list->RecordCount = $master_subbasin_list->StartRecord - 1;
if ($master_subbasin_list->Recordset && !$master_subbasin_list->Recordset->EOF) {
	$master_subbasin_list->Recordset->moveFirst();
	$selectLimit = $master_subbasin_list->UseSelectLimit;
	if (!$selectLimit && $master_subbasin_list->StartRecord > 1)
		$master_subbasin_list->Recordset->move($master_subbasin_list->StartRecord - 1);
} elseif (!$master_subbasin->AllowAddDeleteRow && $master_subbasin_list->StopRecord == 0) {
	$master_subbasin_list->StopRecord = $master_subbasin->GridAddRowCount;
}

// Initialize aggregate
$master_subbasin->RowType = ROWTYPE_AGGREGATEINIT;
$master_subbasin->resetAttributes();
$master_subbasin_list->renderRow();
while ($master_subbasin_list->RecordCount < $master_subbasin_list->StopRecord) {
	$master_subbasin_list->RecordCount++;
	if ($master_subbasin_list->RecordCount >= $master_subbasin_list->StartRecord) {
		$master_subbasin_list->RowCount++;

		// Set up key count
		$master_subbasin_list->KeyCount = $master_subbasin_list->RowIndex;

		// Init row class and style
		$master_subbasin->resetAttributes();
		$master_subbasin->CssClass = "";
		if ($master_subbasin_list->isGridAdd()) {
		} else {
			$master_subbasin_list->loadRowValues($master_subbasin_list->Recordset); // Load row values
		}
		$master_subbasin->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_subbasin->RowAttrs->merge(["data-rowindex" => $master_subbasin_list->RowCount, "id" => "r" . $master_subbasin_list->RowCount . "_master_subbasin", "data-rowtype" => $master_subbasin->RowType]);

		// Render row
		$master_subbasin_list->renderRow();

		// Render list options
		$master_subbasin_list->renderListOptions();
?>
	<tr <?php echo $master_subbasin->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_subbasin_list->ListOptions->render("body", "left", $master_subbasin_list->RowCount);
?>
	<?php if ($master_subbasin_list->SubBasinId->Visible) { // SubBasinId ?>
		<td data-name="SubBasinId" <?php echo $master_subbasin_list->SubBasinId->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_list->RowCount ?>_master_subbasin_SubBasinId">
<span<?php echo $master_subbasin_list->SubBasinId->viewAttributes() ?>><?php echo $master_subbasin_list->SubBasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_subbasin_list->SubBasinName->Visible) { // SubBasinName ?>
		<td data-name="SubBasinName" <?php echo $master_subbasin_list->SubBasinName->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_list->RowCount ?>_master_subbasin_SubBasinName">
<span<?php echo $master_subbasin_list->SubBasinName->viewAttributes() ?>><?php echo $master_subbasin_list->SubBasinName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_subbasin_list->SubBasinName_kn->Visible) { // SubBasinName_kn ?>
		<td data-name="SubBasinName_kn" <?php echo $master_subbasin_list->SubBasinName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_list->RowCount ?>_master_subbasin_SubBasinName_kn">
<span<?php echo $master_subbasin_list->SubBasinName_kn->viewAttributes() ?>><?php echo $master_subbasin_list->SubBasinName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_subbasin_list->SubBasinName_hi->Visible) { // SubBasinName_hi ?>
		<td data-name="SubBasinName_hi" <?php echo $master_subbasin_list->SubBasinName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_list->RowCount ?>_master_subbasin_SubBasinName_hi">
<span<?php echo $master_subbasin_list->SubBasinName_hi->viewAttributes() ?>><?php echo $master_subbasin_list->SubBasinName_hi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_subbasin_list->BasinId->Visible) { // BasinId ?>
		<td data-name="BasinId" <?php echo $master_subbasin_list->BasinId->cellAttributes() ?>>
<span id="el<?php echo $master_subbasin_list->RowCount ?>_master_subbasin_BasinId">
<span<?php echo $master_subbasin_list->BasinId->viewAttributes() ?>><?php echo $master_subbasin_list->BasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_subbasin_list->ListOptions->render("body", "right", $master_subbasin_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_subbasin_list->isGridAdd())
		$master_subbasin_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_subbasin->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_subbasin_list->Recordset)
	$master_subbasin_list->Recordset->Close();
?>
<?php if (!$master_subbasin_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_subbasin_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_subbasin_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_subbasin_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_subbasin_list->TotalRecords == 0 && !$master_subbasin->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_subbasin_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_subbasin_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_subbasin_list->isExport()) { ?>
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
$master_subbasin_list->terminate();
?>