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
$master_damcatchup_list = new master_damcatchup_list();

// Run the page
$master_damcatchup_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_damcatchup_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_damcatchup_list->isExport()) { ?>
<script>
var fmaster_damcatchuplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_damcatchuplist = currentForm = new ew.Form("fmaster_damcatchuplist", "list");
	fmaster_damcatchuplist.formKeyCountName = '<?php echo $master_damcatchup_list->FormKeyCountName ?>';
	loadjs.done("fmaster_damcatchuplist");
});
var fmaster_damcatchuplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_damcatchuplistsrch = currentSearchForm = new ew.Form("fmaster_damcatchuplistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_damcatchuplistsrch.filterList = <?php echo $master_damcatchup_list->getFilterList() ?>;
	loadjs.done("fmaster_damcatchuplistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_damcatchup_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_damcatchup_list->TotalRecords > 0 && $master_damcatchup_list->ExportOptions->visible()) { ?>
<?php $master_damcatchup_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_damcatchup_list->ImportOptions->visible()) { ?>
<?php $master_damcatchup_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_damcatchup_list->SearchOptions->visible()) { ?>
<?php $master_damcatchup_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_damcatchup_list->FilterOptions->visible()) { ?>
<?php $master_damcatchup_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_damcatchup_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_damcatchup_list->isExport() && !$master_damcatchup->CurrentAction) { ?>
<form name="fmaster_damcatchuplistsrch" id="fmaster_damcatchuplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_damcatchuplistsrch-search-panel" class="<?php echo $master_damcatchup_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_damcatchup">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_damcatchup_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_damcatchup_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_damcatchup_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_damcatchup_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_damcatchup_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_damcatchup_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_damcatchup_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_damcatchup_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_damcatchup_list->showPageHeader(); ?>
<?php
$master_damcatchup_list->showMessage();
?>
<?php if ($master_damcatchup_list->TotalRecords > 0 || $master_damcatchup->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_damcatchup_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_damcatchup">
<?php if (!$master_damcatchup_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_damcatchup_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_damcatchup_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_damcatchup_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_damcatchuplist" id="fmaster_damcatchuplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_damcatchup">
<div id="gmp_master_damcatchup" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_damcatchup_list->TotalRecords > 0 || $master_damcatchup_list->isGridEdit()) { ?>
<table id="tbl_master_damcatchuplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_damcatchup->RowType = ROWTYPE_HEADER;

// Render list options
$master_damcatchup_list->renderListOptions();

// Render list options (header, left)
$master_damcatchup_list->ListOptions->render("header", "left");
?>
<?php if ($master_damcatchup_list->CatchUpId->Visible) { // CatchUpId ?>
	<?php if ($master_damcatchup_list->SortUrl($master_damcatchup_list->CatchUpId) == "") { ?>
		<th data-name="CatchUpId" class="<?php echo $master_damcatchup_list->CatchUpId->headerCellClass() ?>"><div id="elh_master_damcatchup_CatchUpId" class="master_damcatchup_CatchUpId"><div class="ew-table-header-caption"><?php echo $master_damcatchup_list->CatchUpId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CatchUpId" class="<?php echo $master_damcatchup_list->CatchUpId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_damcatchup_list->SortUrl($master_damcatchup_list->CatchUpId) ?>', 2);"><div id="elh_master_damcatchup_CatchUpId" class="master_damcatchup_CatchUpId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_damcatchup_list->CatchUpId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_damcatchup_list->CatchUpId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_damcatchup_list->CatchUpId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_damcatchup_list->CatchUpName->Visible) { // CatchUpName ?>
	<?php if ($master_damcatchup_list->SortUrl($master_damcatchup_list->CatchUpName) == "") { ?>
		<th data-name="CatchUpName" class="<?php echo $master_damcatchup_list->CatchUpName->headerCellClass() ?>"><div id="elh_master_damcatchup_CatchUpName" class="master_damcatchup_CatchUpName"><div class="ew-table-header-caption"><?php echo $master_damcatchup_list->CatchUpName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CatchUpName" class="<?php echo $master_damcatchup_list->CatchUpName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_damcatchup_list->SortUrl($master_damcatchup_list->CatchUpName) ?>', 2);"><div id="elh_master_damcatchup_CatchUpName" class="master_damcatchup_CatchUpName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_damcatchup_list->CatchUpName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_damcatchup_list->CatchUpName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_damcatchup_list->CatchUpName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_damcatchup_list->CatchUpName_kn->Visible) { // CatchUpName_kn ?>
	<?php if ($master_damcatchup_list->SortUrl($master_damcatchup_list->CatchUpName_kn) == "") { ?>
		<th data-name="CatchUpName_kn" class="<?php echo $master_damcatchup_list->CatchUpName_kn->headerCellClass() ?>"><div id="elh_master_damcatchup_CatchUpName_kn" class="master_damcatchup_CatchUpName_kn"><div class="ew-table-header-caption"><?php echo $master_damcatchup_list->CatchUpName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CatchUpName_kn" class="<?php echo $master_damcatchup_list->CatchUpName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_damcatchup_list->SortUrl($master_damcatchup_list->CatchUpName_kn) ?>', 2);"><div id="elh_master_damcatchup_CatchUpName_kn" class="master_damcatchup_CatchUpName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_damcatchup_list->CatchUpName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_damcatchup_list->CatchUpName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_damcatchup_list->CatchUpName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_damcatchup_list->CatchUpName_hi->Visible) { // CatchUpName_hi ?>
	<?php if ($master_damcatchup_list->SortUrl($master_damcatchup_list->CatchUpName_hi) == "") { ?>
		<th data-name="CatchUpName_hi" class="<?php echo $master_damcatchup_list->CatchUpName_hi->headerCellClass() ?>"><div id="elh_master_damcatchup_CatchUpName_hi" class="master_damcatchup_CatchUpName_hi"><div class="ew-table-header-caption"><?php echo $master_damcatchup_list->CatchUpName_hi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CatchUpName_hi" class="<?php echo $master_damcatchup_list->CatchUpName_hi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_damcatchup_list->SortUrl($master_damcatchup_list->CatchUpName_hi) ?>', 2);"><div id="elh_master_damcatchup_CatchUpName_hi" class="master_damcatchup_CatchUpName_hi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_damcatchup_list->CatchUpName_hi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_damcatchup_list->CatchUpName_hi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_damcatchup_list->CatchUpName_hi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_damcatchup_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_damcatchup_list->ExportAll && $master_damcatchup_list->isExport()) {
	$master_damcatchup_list->StopRecord = $master_damcatchup_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_damcatchup_list->TotalRecords > $master_damcatchup_list->StartRecord + $master_damcatchup_list->DisplayRecords - 1)
		$master_damcatchup_list->StopRecord = $master_damcatchup_list->StartRecord + $master_damcatchup_list->DisplayRecords - 1;
	else
		$master_damcatchup_list->StopRecord = $master_damcatchup_list->TotalRecords;
}
$master_damcatchup_list->RecordCount = $master_damcatchup_list->StartRecord - 1;
if ($master_damcatchup_list->Recordset && !$master_damcatchup_list->Recordset->EOF) {
	$master_damcatchup_list->Recordset->moveFirst();
	$selectLimit = $master_damcatchup_list->UseSelectLimit;
	if (!$selectLimit && $master_damcatchup_list->StartRecord > 1)
		$master_damcatchup_list->Recordset->move($master_damcatchup_list->StartRecord - 1);
} elseif (!$master_damcatchup->AllowAddDeleteRow && $master_damcatchup_list->StopRecord == 0) {
	$master_damcatchup_list->StopRecord = $master_damcatchup->GridAddRowCount;
}

// Initialize aggregate
$master_damcatchup->RowType = ROWTYPE_AGGREGATEINIT;
$master_damcatchup->resetAttributes();
$master_damcatchup_list->renderRow();
while ($master_damcatchup_list->RecordCount < $master_damcatchup_list->StopRecord) {
	$master_damcatchup_list->RecordCount++;
	if ($master_damcatchup_list->RecordCount >= $master_damcatchup_list->StartRecord) {
		$master_damcatchup_list->RowCount++;

		// Set up key count
		$master_damcatchup_list->KeyCount = $master_damcatchup_list->RowIndex;

		// Init row class and style
		$master_damcatchup->resetAttributes();
		$master_damcatchup->CssClass = "";
		if ($master_damcatchup_list->isGridAdd()) {
		} else {
			$master_damcatchup_list->loadRowValues($master_damcatchup_list->Recordset); // Load row values
		}
		$master_damcatchup->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_damcatchup->RowAttrs->merge(["data-rowindex" => $master_damcatchup_list->RowCount, "id" => "r" . $master_damcatchup_list->RowCount . "_master_damcatchup", "data-rowtype" => $master_damcatchup->RowType]);

		// Render row
		$master_damcatchup_list->renderRow();

		// Render list options
		$master_damcatchup_list->renderListOptions();
?>
	<tr <?php echo $master_damcatchup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_damcatchup_list->ListOptions->render("body", "left", $master_damcatchup_list->RowCount);
?>
	<?php if ($master_damcatchup_list->CatchUpId->Visible) { // CatchUpId ?>
		<td data-name="CatchUpId" <?php echo $master_damcatchup_list->CatchUpId->cellAttributes() ?>>
<span id="el<?php echo $master_damcatchup_list->RowCount ?>_master_damcatchup_CatchUpId">
<span<?php echo $master_damcatchup_list->CatchUpId->viewAttributes() ?>><?php echo $master_damcatchup_list->CatchUpId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_damcatchup_list->CatchUpName->Visible) { // CatchUpName ?>
		<td data-name="CatchUpName" <?php echo $master_damcatchup_list->CatchUpName->cellAttributes() ?>>
<span id="el<?php echo $master_damcatchup_list->RowCount ?>_master_damcatchup_CatchUpName">
<span<?php echo $master_damcatchup_list->CatchUpName->viewAttributes() ?>><?php echo $master_damcatchup_list->CatchUpName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_damcatchup_list->CatchUpName_kn->Visible) { // CatchUpName_kn ?>
		<td data-name="CatchUpName_kn" <?php echo $master_damcatchup_list->CatchUpName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_damcatchup_list->RowCount ?>_master_damcatchup_CatchUpName_kn">
<span<?php echo $master_damcatchup_list->CatchUpName_kn->viewAttributes() ?>><?php echo $master_damcatchup_list->CatchUpName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_damcatchup_list->CatchUpName_hi->Visible) { // CatchUpName_hi ?>
		<td data-name="CatchUpName_hi" <?php echo $master_damcatchup_list->CatchUpName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_damcatchup_list->RowCount ?>_master_damcatchup_CatchUpName_hi">
<span<?php echo $master_damcatchup_list->CatchUpName_hi->viewAttributes() ?>><?php echo $master_damcatchup_list->CatchUpName_hi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_damcatchup_list->ListOptions->render("body", "right", $master_damcatchup_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_damcatchup_list->isGridAdd())
		$master_damcatchup_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_damcatchup->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_damcatchup_list->Recordset)
	$master_damcatchup_list->Recordset->Close();
?>
<?php if (!$master_damcatchup_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_damcatchup_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_damcatchup_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_damcatchup_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_damcatchup_list->TotalRecords == 0 && !$master_damcatchup->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_damcatchup_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_damcatchup_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_damcatchup_list->isExport()) { ?>
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
$master_damcatchup_list->terminate();
?>