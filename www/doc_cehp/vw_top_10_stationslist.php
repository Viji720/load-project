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
$vw_top_10_stations_list = new vw_top_10_stations_list();

// Run the page
$vw_top_10_stations_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_top_10_stations_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_top_10_stations_list->isExport()) { ?>
<script>
var fvw_top_10_stationslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_top_10_stationslist = currentForm = new ew.Form("fvw_top_10_stationslist", "list");
	fvw_top_10_stationslist.formKeyCountName = '<?php echo $vw_top_10_stations_list->FormKeyCountName ?>';
	loadjs.done("fvw_top_10_stationslist");
});
var fvw_top_10_stationslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_top_10_stationslistsrch = currentSearchForm = new ew.Form("fvw_top_10_stationslistsrch");

	// Dynamic selection lists
	// Filters

	fvw_top_10_stationslistsrch.filterList = <?php echo $vw_top_10_stations_list->getFilterList() ?>;
	loadjs.done("fvw_top_10_stationslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_top_10_stations_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_top_10_stations_list->TotalRecords > 0 && $vw_top_10_stations_list->ExportOptions->visible()) { ?>
<?php $vw_top_10_stations_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_top_10_stations_list->ImportOptions->visible()) { ?>
<?php $vw_top_10_stations_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_top_10_stations_list->SearchOptions->visible()) { ?>
<?php $vw_top_10_stations_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_top_10_stations_list->FilterOptions->visible()) { ?>
<?php $vw_top_10_stations_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_top_10_stations_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_top_10_stations_list->isExport() && !$vw_top_10_stations->CurrentAction) { ?>
<form name="fvw_top_10_stationslistsrch" id="fvw_top_10_stationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_top_10_stationslistsrch-search-panel" class="<?php echo $vw_top_10_stations_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_top_10_stations">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $vw_top_10_stations_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_top_10_stations_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_top_10_stations_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_top_10_stations_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_top_10_stations_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_top_10_stations_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_top_10_stations_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_top_10_stations_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_top_10_stations_list->showPageHeader(); ?>
<?php
$vw_top_10_stations_list->showMessage();
?>
<?php if ($vw_top_10_stations_list->TotalRecords > 0 || $vw_top_10_stations->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_top_10_stations_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_top_10_stations">
<?php if (!$vw_top_10_stations_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_top_10_stations_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_top_10_stations_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_top_10_stations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_top_10_stationslist" id="fvw_top_10_stationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_top_10_stations">
<div id="gmp_vw_top_10_stations" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_top_10_stations_list->TotalRecords > 0 || $vw_top_10_stations_list->isGridEdit()) { ?>
<table id="tbl_vw_top_10_stationslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_top_10_stations->RowType = ROWTYPE_HEADER;

// Render list options
$vw_top_10_stations_list->renderListOptions();

// Render list options (header, left)
$vw_top_10_stations_list->ListOptions->render("header", "left");
?>
<?php if ($vw_top_10_stations_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($vw_top_10_stations_list->SortUrl($vw_top_10_stations_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_top_10_stations_list->SMSDateTime->headerCellClass() ?>"><div id="elh_vw_top_10_stations_SMSDateTime" class="vw_top_10_stations_SMSDateTime"><div class="ew-table-header-caption"><?php echo $vw_top_10_stations_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_top_10_stations_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_top_10_stations_list->SortUrl($vw_top_10_stations_list->SMSDateTime) ?>', 2);"><div id="elh_vw_top_10_stations_SMSDateTime" class="vw_top_10_stations_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_top_10_stations_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_top_10_stations_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_top_10_stations_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_top_10_stations_list->StationId->Visible) { // StationId ?>
	<?php if ($vw_top_10_stations_list->SortUrl($vw_top_10_stations_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $vw_top_10_stations_list->StationId->headerCellClass() ?>"><div id="elh_vw_top_10_stations_StationId" class="vw_top_10_stations_StationId"><div class="ew-table-header-caption"><?php echo $vw_top_10_stations_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $vw_top_10_stations_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_top_10_stations_list->SortUrl($vw_top_10_stations_list->StationId) ?>', 2);"><div id="elh_vw_top_10_stations_StationId" class="vw_top_10_stations_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_top_10_stations_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_top_10_stations_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_top_10_stations_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_top_10_stations_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_top_10_stations_list->SortUrl($vw_top_10_stations_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_top_10_stations_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_top_10_stations_MobileNumber" class="vw_top_10_stations_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_top_10_stations_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_top_10_stations_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_top_10_stations_list->SortUrl($vw_top_10_stations_list->MobileNumber) ?>', 2);"><div id="elh_vw_top_10_stations_MobileNumber" class="vw_top_10_stations_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_top_10_stations_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_top_10_stations_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_top_10_stations_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_top_10_stations_list->rainfall->Visible) { // rainfall ?>
	<?php if ($vw_top_10_stations_list->SortUrl($vw_top_10_stations_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $vw_top_10_stations_list->rainfall->headerCellClass() ?>"><div id="elh_vw_top_10_stations_rainfall" class="vw_top_10_stations_rainfall"><div class="ew-table-header-caption"><?php echo $vw_top_10_stations_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $vw_top_10_stations_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_top_10_stations_list->SortUrl($vw_top_10_stations_list->rainfall) ?>', 2);"><div id="elh_vw_top_10_stations_rainfall" class="vw_top_10_stations_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_top_10_stations_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_top_10_stations_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_top_10_stations_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_top_10_stations_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_top_10_stations_list->ExportAll && $vw_top_10_stations_list->isExport()) {
	$vw_top_10_stations_list->StopRecord = $vw_top_10_stations_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_top_10_stations_list->TotalRecords > $vw_top_10_stations_list->StartRecord + $vw_top_10_stations_list->DisplayRecords - 1)
		$vw_top_10_stations_list->StopRecord = $vw_top_10_stations_list->StartRecord + $vw_top_10_stations_list->DisplayRecords - 1;
	else
		$vw_top_10_stations_list->StopRecord = $vw_top_10_stations_list->TotalRecords;
}
$vw_top_10_stations_list->RecordCount = $vw_top_10_stations_list->StartRecord - 1;
if ($vw_top_10_stations_list->Recordset && !$vw_top_10_stations_list->Recordset->EOF) {
	$vw_top_10_stations_list->Recordset->moveFirst();
	$selectLimit = $vw_top_10_stations_list->UseSelectLimit;
	if (!$selectLimit && $vw_top_10_stations_list->StartRecord > 1)
		$vw_top_10_stations_list->Recordset->move($vw_top_10_stations_list->StartRecord - 1);
} elseif (!$vw_top_10_stations->AllowAddDeleteRow && $vw_top_10_stations_list->StopRecord == 0) {
	$vw_top_10_stations_list->StopRecord = $vw_top_10_stations->GridAddRowCount;
}

// Initialize aggregate
$vw_top_10_stations->RowType = ROWTYPE_AGGREGATEINIT;
$vw_top_10_stations->resetAttributes();
$vw_top_10_stations_list->renderRow();
while ($vw_top_10_stations_list->RecordCount < $vw_top_10_stations_list->StopRecord) {
	$vw_top_10_stations_list->RecordCount++;
	if ($vw_top_10_stations_list->RecordCount >= $vw_top_10_stations_list->StartRecord) {
		$vw_top_10_stations_list->RowCount++;

		// Set up key count
		$vw_top_10_stations_list->KeyCount = $vw_top_10_stations_list->RowIndex;

		// Init row class and style
		$vw_top_10_stations->resetAttributes();
		$vw_top_10_stations->CssClass = "";
		if ($vw_top_10_stations_list->isGridAdd()) {
		} else {
			$vw_top_10_stations_list->loadRowValues($vw_top_10_stations_list->Recordset); // Load row values
		}
		$vw_top_10_stations->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_top_10_stations->RowAttrs->merge(["data-rowindex" => $vw_top_10_stations_list->RowCount, "id" => "r" . $vw_top_10_stations_list->RowCount . "_vw_top_10_stations", "data-rowtype" => $vw_top_10_stations->RowType]);

		// Render row
		$vw_top_10_stations_list->renderRow();

		// Render list options
		$vw_top_10_stations_list->renderListOptions();
?>
	<tr <?php echo $vw_top_10_stations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_top_10_stations_list->ListOptions->render("body", "left", $vw_top_10_stations_list->RowCount);
?>
	<?php if ($vw_top_10_stations_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $vw_top_10_stations_list->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $vw_top_10_stations_list->RowCount ?>_vw_top_10_stations_SMSDateTime">
<span<?php echo $vw_top_10_stations_list->SMSDateTime->viewAttributes() ?>><?php echo $vw_top_10_stations_list->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_top_10_stations_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $vw_top_10_stations_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $vw_top_10_stations_list->RowCount ?>_vw_top_10_stations_StationId">
<span<?php echo $vw_top_10_stations_list->StationId->viewAttributes() ?>><?php echo $vw_top_10_stations_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_top_10_stations_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_top_10_stations_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_top_10_stations_list->RowCount ?>_vw_top_10_stations_MobileNumber">
<span<?php echo $vw_top_10_stations_list->MobileNumber->viewAttributes() ?>><?php echo $vw_top_10_stations_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_top_10_stations_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $vw_top_10_stations_list->rainfall->cellAttributes() ?>>
<span id="el<?php echo $vw_top_10_stations_list->RowCount ?>_vw_top_10_stations_rainfall">
<span<?php echo $vw_top_10_stations_list->rainfall->viewAttributes() ?>><?php echo $vw_top_10_stations_list->rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_top_10_stations_list->ListOptions->render("body", "right", $vw_top_10_stations_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_top_10_stations_list->isGridAdd())
		$vw_top_10_stations_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_top_10_stations->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_top_10_stations_list->Recordset)
	$vw_top_10_stations_list->Recordset->Close();
?>
<?php if (!$vw_top_10_stations_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_top_10_stations_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_top_10_stations_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_top_10_stations_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_top_10_stations_list->TotalRecords == 0 && !$vw_top_10_stations->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_top_10_stations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_top_10_stations_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_top_10_stations_list->isExport()) { ?>
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
$vw_top_10_stations_list->terminate();
?>