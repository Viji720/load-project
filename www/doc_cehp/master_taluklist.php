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
$master_taluk_list = new master_taluk_list();

// Run the page
$master_taluk_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_taluk_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_taluk_list->isExport()) { ?>
<script>
var fmaster_taluklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_taluklist = currentForm = new ew.Form("fmaster_taluklist", "list");
	fmaster_taluklist.formKeyCountName = '<?php echo $master_taluk_list->FormKeyCountName ?>';
	loadjs.done("fmaster_taluklist");
});
var fmaster_taluklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_taluklistsrch = currentSearchForm = new ew.Form("fmaster_taluklistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_taluklistsrch.filterList = <?php echo $master_taluk_list->getFilterList() ?>;
	loadjs.done("fmaster_taluklistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_taluk_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_taluk_list->TotalRecords > 0 && $master_taluk_list->ExportOptions->visible()) { ?>
<?php $master_taluk_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_taluk_list->ImportOptions->visible()) { ?>
<?php $master_taluk_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_taluk_list->SearchOptions->visible()) { ?>
<?php $master_taluk_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_taluk_list->FilterOptions->visible()) { ?>
<?php $master_taluk_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_taluk_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_taluk_list->isExport() && !$master_taluk->CurrentAction) { ?>
<form name="fmaster_taluklistsrch" id="fmaster_taluklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_taluklistsrch-search-panel" class="<?php echo $master_taluk_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_taluk">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_taluk_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_taluk_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_taluk_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_taluk_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_taluk_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_taluk_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_taluk_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_taluk_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_taluk_list->showPageHeader(); ?>
<?php
$master_taluk_list->showMessage();
?>
<?php if ($master_taluk_list->TotalRecords > 0 || $master_taluk->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_taluk_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_taluk">
<?php if (!$master_taluk_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_taluk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_taluk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_taluk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_taluklist" id="fmaster_taluklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_taluk">
<div id="gmp_master_taluk" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_taluk_list->TotalRecords > 0 || $master_taluk_list->isGridEdit()) { ?>
<table id="tbl_master_taluklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_taluk->RowType = ROWTYPE_HEADER;

// Render list options
$master_taluk_list->renderListOptions();

// Render list options (header, left)
$master_taluk_list->ListOptions->render("header", "left");
?>
<?php if ($master_taluk_list->TalukId->Visible) { // TalukId ?>
	<?php if ($master_taluk_list->SortUrl($master_taluk_list->TalukId) == "") { ?>
		<th data-name="TalukId" class="<?php echo $master_taluk_list->TalukId->headerCellClass() ?>"><div id="elh_master_taluk_TalukId" class="master_taluk_TalukId"><div class="ew-table-header-caption"><?php echo $master_taluk_list->TalukId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukId" class="<?php echo $master_taluk_list->TalukId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_taluk_list->SortUrl($master_taluk_list->TalukId) ?>', 2);"><div id="elh_master_taluk_TalukId" class="master_taluk_TalukId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_taluk_list->TalukId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_taluk_list->TalukId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_taluk_list->TalukId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_taluk_list->TalukName->Visible) { // TalukName ?>
	<?php if ($master_taluk_list->SortUrl($master_taluk_list->TalukName) == "") { ?>
		<th data-name="TalukName" class="<?php echo $master_taluk_list->TalukName->headerCellClass() ?>"><div id="elh_master_taluk_TalukName" class="master_taluk_TalukName"><div class="ew-table-header-caption"><?php echo $master_taluk_list->TalukName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukName" class="<?php echo $master_taluk_list->TalukName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_taluk_list->SortUrl($master_taluk_list->TalukName) ?>', 2);"><div id="elh_master_taluk_TalukName" class="master_taluk_TalukName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_taluk_list->TalukName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_taluk_list->TalukName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_taluk_list->TalukName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_taluk_list->TalukName_kn->Visible) { // TalukName_kn ?>
	<?php if ($master_taluk_list->SortUrl($master_taluk_list->TalukName_kn) == "") { ?>
		<th data-name="TalukName_kn" class="<?php echo $master_taluk_list->TalukName_kn->headerCellClass() ?>"><div id="elh_master_taluk_TalukName_kn" class="master_taluk_TalukName_kn"><div class="ew-table-header-caption"><?php echo $master_taluk_list->TalukName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukName_kn" class="<?php echo $master_taluk_list->TalukName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_taluk_list->SortUrl($master_taluk_list->TalukName_kn) ?>', 2);"><div id="elh_master_taluk_TalukName_kn" class="master_taluk_TalukName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_taluk_list->TalukName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_taluk_list->TalukName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_taluk_list->TalukName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_taluk_list->TalukName_hi->Visible) { // TalukName_hi ?>
	<?php if ($master_taluk_list->SortUrl($master_taluk_list->TalukName_hi) == "") { ?>
		<th data-name="TalukName_hi" class="<?php echo $master_taluk_list->TalukName_hi->headerCellClass() ?>"><div id="elh_master_taluk_TalukName_hi" class="master_taluk_TalukName_hi"><div class="ew-table-header-caption"><?php echo $master_taluk_list->TalukName_hi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukName_hi" class="<?php echo $master_taluk_list->TalukName_hi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_taluk_list->SortUrl($master_taluk_list->TalukName_hi) ?>', 2);"><div id="elh_master_taluk_TalukName_hi" class="master_taluk_TalukName_hi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_taluk_list->TalukName_hi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_taluk_list->TalukName_hi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_taluk_list->TalukName_hi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_taluk_list->DistrictId->Visible) { // DistrictId ?>
	<?php if ($master_taluk_list->SortUrl($master_taluk_list->DistrictId) == "") { ?>
		<th data-name="DistrictId" class="<?php echo $master_taluk_list->DistrictId->headerCellClass() ?>"><div id="elh_master_taluk_DistrictId" class="master_taluk_DistrictId"><div class="ew-table-header-caption"><?php echo $master_taluk_list->DistrictId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictId" class="<?php echo $master_taluk_list->DistrictId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_taluk_list->SortUrl($master_taluk_list->DistrictId) ?>', 2);"><div id="elh_master_taluk_DistrictId" class="master_taluk_DistrictId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_taluk_list->DistrictId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_taluk_list->DistrictId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_taluk_list->DistrictId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_taluk_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_taluk_list->ExportAll && $master_taluk_list->isExport()) {
	$master_taluk_list->StopRecord = $master_taluk_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_taluk_list->TotalRecords > $master_taluk_list->StartRecord + $master_taluk_list->DisplayRecords - 1)
		$master_taluk_list->StopRecord = $master_taluk_list->StartRecord + $master_taluk_list->DisplayRecords - 1;
	else
		$master_taluk_list->StopRecord = $master_taluk_list->TotalRecords;
}
$master_taluk_list->RecordCount = $master_taluk_list->StartRecord - 1;
if ($master_taluk_list->Recordset && !$master_taluk_list->Recordset->EOF) {
	$master_taluk_list->Recordset->moveFirst();
	$selectLimit = $master_taluk_list->UseSelectLimit;
	if (!$selectLimit && $master_taluk_list->StartRecord > 1)
		$master_taluk_list->Recordset->move($master_taluk_list->StartRecord - 1);
} elseif (!$master_taluk->AllowAddDeleteRow && $master_taluk_list->StopRecord == 0) {
	$master_taluk_list->StopRecord = $master_taluk->GridAddRowCount;
}

// Initialize aggregate
$master_taluk->RowType = ROWTYPE_AGGREGATEINIT;
$master_taluk->resetAttributes();
$master_taluk_list->renderRow();
while ($master_taluk_list->RecordCount < $master_taluk_list->StopRecord) {
	$master_taluk_list->RecordCount++;
	if ($master_taluk_list->RecordCount >= $master_taluk_list->StartRecord) {
		$master_taluk_list->RowCount++;

		// Set up key count
		$master_taluk_list->KeyCount = $master_taluk_list->RowIndex;

		// Init row class and style
		$master_taluk->resetAttributes();
		$master_taluk->CssClass = "";
		if ($master_taluk_list->isGridAdd()) {
		} else {
			$master_taluk_list->loadRowValues($master_taluk_list->Recordset); // Load row values
		}
		$master_taluk->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_taluk->RowAttrs->merge(["data-rowindex" => $master_taluk_list->RowCount, "id" => "r" . $master_taluk_list->RowCount . "_master_taluk", "data-rowtype" => $master_taluk->RowType]);

		// Render row
		$master_taluk_list->renderRow();

		// Render list options
		$master_taluk_list->renderListOptions();
?>
	<tr <?php echo $master_taluk->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_taluk_list->ListOptions->render("body", "left", $master_taluk_list->RowCount);
?>
	<?php if ($master_taluk_list->TalukId->Visible) { // TalukId ?>
		<td data-name="TalukId" <?php echo $master_taluk_list->TalukId->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_list->RowCount ?>_master_taluk_TalukId">
<span<?php echo $master_taluk_list->TalukId->viewAttributes() ?>><?php echo $master_taluk_list->TalukId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_taluk_list->TalukName->Visible) { // TalukName ?>
		<td data-name="TalukName" <?php echo $master_taluk_list->TalukName->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_list->RowCount ?>_master_taluk_TalukName">
<span<?php echo $master_taluk_list->TalukName->viewAttributes() ?>><?php echo $master_taluk_list->TalukName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_taluk_list->TalukName_kn->Visible) { // TalukName_kn ?>
		<td data-name="TalukName_kn" <?php echo $master_taluk_list->TalukName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_list->RowCount ?>_master_taluk_TalukName_kn">
<span<?php echo $master_taluk_list->TalukName_kn->viewAttributes() ?>><?php echo $master_taluk_list->TalukName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_taluk_list->TalukName_hi->Visible) { // TalukName_hi ?>
		<td data-name="TalukName_hi" <?php echo $master_taluk_list->TalukName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_list->RowCount ?>_master_taluk_TalukName_hi">
<span<?php echo $master_taluk_list->TalukName_hi->viewAttributes() ?>><?php echo $master_taluk_list->TalukName_hi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_taluk_list->DistrictId->Visible) { // DistrictId ?>
		<td data-name="DistrictId" <?php echo $master_taluk_list->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $master_taluk_list->RowCount ?>_master_taluk_DistrictId">
<span<?php echo $master_taluk_list->DistrictId->viewAttributes() ?>><?php echo $master_taluk_list->DistrictId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_taluk_list->ListOptions->render("body", "right", $master_taluk_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_taluk_list->isGridAdd())
		$master_taluk_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_taluk->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_taluk_list->Recordset)
	$master_taluk_list->Recordset->Close();
?>
<?php if (!$master_taluk_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_taluk_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_taluk_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_taluk_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_taluk_list->TotalRecords == 0 && !$master_taluk->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_taluk_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_taluk_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_taluk_list->isExport()) { ?>
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
$master_taluk_list->terminate();
?>