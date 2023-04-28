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
$master_district_list = new master_district_list();

// Run the page
$master_district_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_district_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_district_list->isExport()) { ?>
<script>
var fmaster_districtlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_districtlist = currentForm = new ew.Form("fmaster_districtlist", "list");
	fmaster_districtlist.formKeyCountName = '<?php echo $master_district_list->FormKeyCountName ?>';
	loadjs.done("fmaster_districtlist");
});
var fmaster_districtlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_districtlistsrch = currentSearchForm = new ew.Form("fmaster_districtlistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_districtlistsrch.filterList = <?php echo $master_district_list->getFilterList() ?>;
	loadjs.done("fmaster_districtlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_district_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_district_list->TotalRecords > 0 && $master_district_list->ExportOptions->visible()) { ?>
<?php $master_district_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_district_list->ImportOptions->visible()) { ?>
<?php $master_district_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_district_list->SearchOptions->visible()) { ?>
<?php $master_district_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_district_list->FilterOptions->visible()) { ?>
<?php $master_district_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_district_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_district_list->isExport() && !$master_district->CurrentAction) { ?>
<form name="fmaster_districtlistsrch" id="fmaster_districtlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_districtlistsrch-search-panel" class="<?php echo $master_district_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_district">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_district_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_district_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_district_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_district_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_district_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_district_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_district_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_district_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_district_list->showPageHeader(); ?>
<?php
$master_district_list->showMessage();
?>
<?php if ($master_district_list->TotalRecords > 0 || $master_district->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_district_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_district">
<?php if (!$master_district_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_district_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_district_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_district_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_districtlist" id="fmaster_districtlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_district">
<div id="gmp_master_district" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_district_list->TotalRecords > 0 || $master_district_list->isGridEdit()) { ?>
<table id="tbl_master_districtlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_district->RowType = ROWTYPE_HEADER;

// Render list options
$master_district_list->renderListOptions();

// Render list options (header, left)
$master_district_list->ListOptions->render("header", "left");
?>
<?php if ($master_district_list->DistrictId->Visible) { // DistrictId ?>
	<?php if ($master_district_list->SortUrl($master_district_list->DistrictId) == "") { ?>
		<th data-name="DistrictId" class="<?php echo $master_district_list->DistrictId->headerCellClass() ?>"><div id="elh_master_district_DistrictId" class="master_district_DistrictId"><div class="ew-table-header-caption"><?php echo $master_district_list->DistrictId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictId" class="<?php echo $master_district_list->DistrictId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_district_list->SortUrl($master_district_list->DistrictId) ?>', 2);"><div id="elh_master_district_DistrictId" class="master_district_DistrictId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_district_list->DistrictId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_district_list->DistrictId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_district_list->DistrictId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_district_list->DistrictName->Visible) { // DistrictName ?>
	<?php if ($master_district_list->SortUrl($master_district_list->DistrictName) == "") { ?>
		<th data-name="DistrictName" class="<?php echo $master_district_list->DistrictName->headerCellClass() ?>"><div id="elh_master_district_DistrictName" class="master_district_DistrictName"><div class="ew-table-header-caption"><?php echo $master_district_list->DistrictName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictName" class="<?php echo $master_district_list->DistrictName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_district_list->SortUrl($master_district_list->DistrictName) ?>', 2);"><div id="elh_master_district_DistrictName" class="master_district_DistrictName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_district_list->DistrictName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_district_list->DistrictName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_district_list->DistrictName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_district_list->DistrictName_kn->Visible) { // DistrictName_kn ?>
	<?php if ($master_district_list->SortUrl($master_district_list->DistrictName_kn) == "") { ?>
		<th data-name="DistrictName_kn" class="<?php echo $master_district_list->DistrictName_kn->headerCellClass() ?>"><div id="elh_master_district_DistrictName_kn" class="master_district_DistrictName_kn"><div class="ew-table-header-caption"><?php echo $master_district_list->DistrictName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictName_kn" class="<?php echo $master_district_list->DistrictName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_district_list->SortUrl($master_district_list->DistrictName_kn) ?>', 2);"><div id="elh_master_district_DistrictName_kn" class="master_district_DistrictName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_district_list->DistrictName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_district_list->DistrictName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_district_list->DistrictName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_district_list->DistrictName_hi->Visible) { // DistrictName_hi ?>
	<?php if ($master_district_list->SortUrl($master_district_list->DistrictName_hi) == "") { ?>
		<th data-name="DistrictName_hi" class="<?php echo $master_district_list->DistrictName_hi->headerCellClass() ?>"><div id="elh_master_district_DistrictName_hi" class="master_district_DistrictName_hi"><div class="ew-table-header-caption"><?php echo $master_district_list->DistrictName_hi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictName_hi" class="<?php echo $master_district_list->DistrictName_hi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_district_list->SortUrl($master_district_list->DistrictName_hi) ?>', 2);"><div id="elh_master_district_DistrictName_hi" class="master_district_DistrictName_hi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_district_list->DistrictName_hi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_district_list->DistrictName_hi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_district_list->DistrictName_hi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_district_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_district_list->ExportAll && $master_district_list->isExport()) {
	$master_district_list->StopRecord = $master_district_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_district_list->TotalRecords > $master_district_list->StartRecord + $master_district_list->DisplayRecords - 1)
		$master_district_list->StopRecord = $master_district_list->StartRecord + $master_district_list->DisplayRecords - 1;
	else
		$master_district_list->StopRecord = $master_district_list->TotalRecords;
}
$master_district_list->RecordCount = $master_district_list->StartRecord - 1;
if ($master_district_list->Recordset && !$master_district_list->Recordset->EOF) {
	$master_district_list->Recordset->moveFirst();
	$selectLimit = $master_district_list->UseSelectLimit;
	if (!$selectLimit && $master_district_list->StartRecord > 1)
		$master_district_list->Recordset->move($master_district_list->StartRecord - 1);
} elseif (!$master_district->AllowAddDeleteRow && $master_district_list->StopRecord == 0) {
	$master_district_list->StopRecord = $master_district->GridAddRowCount;
}

// Initialize aggregate
$master_district->RowType = ROWTYPE_AGGREGATEINIT;
$master_district->resetAttributes();
$master_district_list->renderRow();
while ($master_district_list->RecordCount < $master_district_list->StopRecord) {
	$master_district_list->RecordCount++;
	if ($master_district_list->RecordCount >= $master_district_list->StartRecord) {
		$master_district_list->RowCount++;

		// Set up key count
		$master_district_list->KeyCount = $master_district_list->RowIndex;

		// Init row class and style
		$master_district->resetAttributes();
		$master_district->CssClass = "";
		if ($master_district_list->isGridAdd()) {
		} else {
			$master_district_list->loadRowValues($master_district_list->Recordset); // Load row values
		}
		$master_district->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_district->RowAttrs->merge(["data-rowindex" => $master_district_list->RowCount, "id" => "r" . $master_district_list->RowCount . "_master_district", "data-rowtype" => $master_district->RowType]);

		// Render row
		$master_district_list->renderRow();

		// Render list options
		$master_district_list->renderListOptions();
?>
	<tr <?php echo $master_district->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_district_list->ListOptions->render("body", "left", $master_district_list->RowCount);
?>
	<?php if ($master_district_list->DistrictId->Visible) { // DistrictId ?>
		<td data-name="DistrictId" <?php echo $master_district_list->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $master_district_list->RowCount ?>_master_district_DistrictId">
<span<?php echo $master_district_list->DistrictId->viewAttributes() ?>><?php echo $master_district_list->DistrictId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_district_list->DistrictName->Visible) { // DistrictName ?>
		<td data-name="DistrictName" <?php echo $master_district_list->DistrictName->cellAttributes() ?>>
<span id="el<?php echo $master_district_list->RowCount ?>_master_district_DistrictName">
<span<?php echo $master_district_list->DistrictName->viewAttributes() ?>><?php echo $master_district_list->DistrictName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_district_list->DistrictName_kn->Visible) { // DistrictName_kn ?>
		<td data-name="DistrictName_kn" <?php echo $master_district_list->DistrictName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_district_list->RowCount ?>_master_district_DistrictName_kn">
<span<?php echo $master_district_list->DistrictName_kn->viewAttributes() ?>><?php echo $master_district_list->DistrictName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_district_list->DistrictName_hi->Visible) { // DistrictName_hi ?>
		<td data-name="DistrictName_hi" <?php echo $master_district_list->DistrictName_hi->cellAttributes() ?>>
<span id="el<?php echo $master_district_list->RowCount ?>_master_district_DistrictName_hi">
<span<?php echo $master_district_list->DistrictName_hi->viewAttributes() ?>><?php echo $master_district_list->DistrictName_hi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_district_list->ListOptions->render("body", "right", $master_district_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_district_list->isGridAdd())
		$master_district_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_district->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_district_list->Recordset)
	$master_district_list->Recordset->Close();
?>
<?php if (!$master_district_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_district_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_district_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_district_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_district_list->TotalRecords == 0 && !$master_district->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_district_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_district_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_district_list->isExport()) { ?>
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
$master_district_list->terminate();
?>