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
$awaiteddata_temp_list = new awaiteddata_temp_list();

// Run the page
$awaiteddata_temp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$awaiteddata_temp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$awaiteddata_temp_list->isExport()) { ?>
<script>
var fawaiteddata_templist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fawaiteddata_templist = currentForm = new ew.Form("fawaiteddata_templist", "list");
	fawaiteddata_templist.formKeyCountName = '<?php echo $awaiteddata_temp_list->FormKeyCountName ?>';
	loadjs.done("fawaiteddata_templist");
});
var fawaiteddata_templistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fawaiteddata_templistsrch = currentSearchForm = new ew.Form("fawaiteddata_templistsrch");

	// Dynamic selection lists
	// Filters

	fawaiteddata_templistsrch.filterList = <?php echo $awaiteddata_temp_list->getFilterList() ?>;
	loadjs.done("fawaiteddata_templistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$awaiteddata_temp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($awaiteddata_temp_list->TotalRecords > 0 && $awaiteddata_temp_list->ExportOptions->visible()) { ?>
<?php $awaiteddata_temp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($awaiteddata_temp_list->ImportOptions->visible()) { ?>
<?php $awaiteddata_temp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($awaiteddata_temp_list->SearchOptions->visible()) { ?>
<?php $awaiteddata_temp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($awaiteddata_temp_list->FilterOptions->visible()) { ?>
<?php $awaiteddata_temp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$awaiteddata_temp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$awaiteddata_temp_list->isExport() && !$awaiteddata_temp->CurrentAction) { ?>
<form name="fawaiteddata_templistsrch" id="fawaiteddata_templistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fawaiteddata_templistsrch-search-panel" class="<?php echo $awaiteddata_temp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="awaiteddata_temp">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $awaiteddata_temp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($awaiteddata_temp_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($awaiteddata_temp_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $awaiteddata_temp_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($awaiteddata_temp_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($awaiteddata_temp_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($awaiteddata_temp_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($awaiteddata_temp_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $awaiteddata_temp_list->showPageHeader(); ?>
<?php
$awaiteddata_temp_list->showMessage();
?>
<?php if ($awaiteddata_temp_list->TotalRecords > 0 || $awaiteddata_temp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($awaiteddata_temp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> awaiteddata_temp">
<?php if (!$awaiteddata_temp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$awaiteddata_temp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $awaiteddata_temp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $awaiteddata_temp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fawaiteddata_templist" id="fawaiteddata_templist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="awaiteddata_temp">
<div id="gmp_awaiteddata_temp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($awaiteddata_temp_list->TotalRecords > 0 || $awaiteddata_temp_list->isGridEdit()) { ?>
<table id="tbl_awaiteddata_templist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$awaiteddata_temp->RowType = ROWTYPE_HEADER;

// Render list options
$awaiteddata_temp_list->renderListOptions();

// Render list options (header, left)
$awaiteddata_temp_list->ListOptions->render("header", "left");
?>
<?php if ($awaiteddata_temp_list->StationId->Visible) { // StationId ?>
	<?php if ($awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $awaiteddata_temp_list->StationId->headerCellClass() ?>"><div id="elh_awaiteddata_temp_StationId" class="awaiteddata_temp_StationId"><div class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $awaiteddata_temp_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->StationId) ?>', 2);"><div id="elh_awaiteddata_temp_StationId" class="awaiteddata_temp_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($awaiteddata_temp_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($awaiteddata_temp_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($awaiteddata_temp_list->StationName->Visible) { // StationName ?>
	<?php if ($awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->StationName) == "") { ?>
		<th data-name="StationName" class="<?php echo $awaiteddata_temp_list->StationName->headerCellClass() ?>"><div id="elh_awaiteddata_temp_StationName" class="awaiteddata_temp_StationName"><div class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->StationName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationName" class="<?php echo $awaiteddata_temp_list->StationName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->StationName) ?>', 2);"><div id="elh_awaiteddata_temp_StationName" class="awaiteddata_temp_StationName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->StationName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($awaiteddata_temp_list->StationName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($awaiteddata_temp_list->StationName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($awaiteddata_temp_list->SubDivision->Visible) { // SubDivision ?>
	<?php if ($awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->SubDivision) == "") { ?>
		<th data-name="SubDivision" class="<?php echo $awaiteddata_temp_list->SubDivision->headerCellClass() ?>"><div id="elh_awaiteddata_temp_SubDivision" class="awaiteddata_temp_SubDivision"><div class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->SubDivision->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivision" class="<?php echo $awaiteddata_temp_list->SubDivision->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->SubDivision) ?>', 2);"><div id="elh_awaiteddata_temp_SubDivision" class="awaiteddata_temp_SubDivision">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->SubDivision->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($awaiteddata_temp_list->SubDivision->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($awaiteddata_temp_list->SubDivision->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($awaiteddata_temp_list->ReadingDate->Visible) { // ReadingDate ?>
	<?php if ($awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->ReadingDate) == "") { ?>
		<th data-name="ReadingDate" class="<?php echo $awaiteddata_temp_list->ReadingDate->headerCellClass() ?>"><div id="elh_awaiteddata_temp_ReadingDate" class="awaiteddata_temp_ReadingDate"><div class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->ReadingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReadingDate" class="<?php echo $awaiteddata_temp_list->ReadingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->ReadingDate) ?>', 2);"><div id="elh_awaiteddata_temp_ReadingDate" class="awaiteddata_temp_ReadingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->ReadingDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($awaiteddata_temp_list->ReadingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($awaiteddata_temp_list->ReadingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($awaiteddata_temp_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $awaiteddata_temp_list->MobileNumber->headerCellClass() ?>"><div id="elh_awaiteddata_temp_MobileNumber" class="awaiteddata_temp_MobileNumber"><div class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $awaiteddata_temp_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->MobileNumber) ?>', 2);"><div id="elh_awaiteddata_temp_MobileNumber" class="awaiteddata_temp_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($awaiteddata_temp_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($awaiteddata_temp_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($awaiteddata_temp_list->NewStationId->Visible) { // NewStationId ?>
	<?php if ($awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->NewStationId) == "") { ?>
		<th data-name="NewStationId" class="<?php echo $awaiteddata_temp_list->NewStationId->headerCellClass() ?>"><div id="elh_awaiteddata_temp_NewStationId" class="awaiteddata_temp_NewStationId"><div class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->NewStationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NewStationId" class="<?php echo $awaiteddata_temp_list->NewStationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $awaiteddata_temp_list->SortUrl($awaiteddata_temp_list->NewStationId) ?>', 2);"><div id="elh_awaiteddata_temp_NewStationId" class="awaiteddata_temp_NewStationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $awaiteddata_temp_list->NewStationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($awaiteddata_temp_list->NewStationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($awaiteddata_temp_list->NewStationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$awaiteddata_temp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($awaiteddata_temp_list->ExportAll && $awaiteddata_temp_list->isExport()) {
	$awaiteddata_temp_list->StopRecord = $awaiteddata_temp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($awaiteddata_temp_list->TotalRecords > $awaiteddata_temp_list->StartRecord + $awaiteddata_temp_list->DisplayRecords - 1)
		$awaiteddata_temp_list->StopRecord = $awaiteddata_temp_list->StartRecord + $awaiteddata_temp_list->DisplayRecords - 1;
	else
		$awaiteddata_temp_list->StopRecord = $awaiteddata_temp_list->TotalRecords;
}
$awaiteddata_temp_list->RecordCount = $awaiteddata_temp_list->StartRecord - 1;
if ($awaiteddata_temp_list->Recordset && !$awaiteddata_temp_list->Recordset->EOF) {
	$awaiteddata_temp_list->Recordset->moveFirst();
	$selectLimit = $awaiteddata_temp_list->UseSelectLimit;
	if (!$selectLimit && $awaiteddata_temp_list->StartRecord > 1)
		$awaiteddata_temp_list->Recordset->move($awaiteddata_temp_list->StartRecord - 1);
} elseif (!$awaiteddata_temp->AllowAddDeleteRow && $awaiteddata_temp_list->StopRecord == 0) {
	$awaiteddata_temp_list->StopRecord = $awaiteddata_temp->GridAddRowCount;
}

// Initialize aggregate
$awaiteddata_temp->RowType = ROWTYPE_AGGREGATEINIT;
$awaiteddata_temp->resetAttributes();
$awaiteddata_temp_list->renderRow();
while ($awaiteddata_temp_list->RecordCount < $awaiteddata_temp_list->StopRecord) {
	$awaiteddata_temp_list->RecordCount++;
	if ($awaiteddata_temp_list->RecordCount >= $awaiteddata_temp_list->StartRecord) {
		$awaiteddata_temp_list->RowCount++;

		// Set up key count
		$awaiteddata_temp_list->KeyCount = $awaiteddata_temp_list->RowIndex;

		// Init row class and style
		$awaiteddata_temp->resetAttributes();
		$awaiteddata_temp->CssClass = "";
		if ($awaiteddata_temp_list->isGridAdd()) {
		} else {
			$awaiteddata_temp_list->loadRowValues($awaiteddata_temp_list->Recordset); // Load row values
		}
		$awaiteddata_temp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$awaiteddata_temp->RowAttrs->merge(["data-rowindex" => $awaiteddata_temp_list->RowCount, "id" => "r" . $awaiteddata_temp_list->RowCount . "_awaiteddata_temp", "data-rowtype" => $awaiteddata_temp->RowType]);

		// Render row
		$awaiteddata_temp_list->renderRow();

		// Render list options
		$awaiteddata_temp_list->renderListOptions();
?>
	<tr <?php echo $awaiteddata_temp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$awaiteddata_temp_list->ListOptions->render("body", "left", $awaiteddata_temp_list->RowCount);
?>
	<?php if ($awaiteddata_temp_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $awaiteddata_temp_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $awaiteddata_temp_list->RowCount ?>_awaiteddata_temp_StationId">
<span<?php echo $awaiteddata_temp_list->StationId->viewAttributes() ?>><?php echo $awaiteddata_temp_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($awaiteddata_temp_list->StationName->Visible) { // StationName ?>
		<td data-name="StationName" <?php echo $awaiteddata_temp_list->StationName->cellAttributes() ?>>
<span id="el<?php echo $awaiteddata_temp_list->RowCount ?>_awaiteddata_temp_StationName">
<span<?php echo $awaiteddata_temp_list->StationName->viewAttributes() ?>><?php echo $awaiteddata_temp_list->StationName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($awaiteddata_temp_list->SubDivision->Visible) { // SubDivision ?>
		<td data-name="SubDivision" <?php echo $awaiteddata_temp_list->SubDivision->cellAttributes() ?>>
<span id="el<?php echo $awaiteddata_temp_list->RowCount ?>_awaiteddata_temp_SubDivision">
<span<?php echo $awaiteddata_temp_list->SubDivision->viewAttributes() ?>><?php echo $awaiteddata_temp_list->SubDivision->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($awaiteddata_temp_list->ReadingDate->Visible) { // ReadingDate ?>
		<td data-name="ReadingDate" <?php echo $awaiteddata_temp_list->ReadingDate->cellAttributes() ?>>
<span id="el<?php echo $awaiteddata_temp_list->RowCount ?>_awaiteddata_temp_ReadingDate">
<span<?php echo $awaiteddata_temp_list->ReadingDate->viewAttributes() ?>><?php echo $awaiteddata_temp_list->ReadingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($awaiteddata_temp_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $awaiteddata_temp_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $awaiteddata_temp_list->RowCount ?>_awaiteddata_temp_MobileNumber">
<span<?php echo $awaiteddata_temp_list->MobileNumber->viewAttributes() ?>><?php echo $awaiteddata_temp_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($awaiteddata_temp_list->NewStationId->Visible) { // NewStationId ?>
		<td data-name="NewStationId" <?php echo $awaiteddata_temp_list->NewStationId->cellAttributes() ?>>
<span id="el<?php echo $awaiteddata_temp_list->RowCount ?>_awaiteddata_temp_NewStationId">
<span<?php echo $awaiteddata_temp_list->NewStationId->viewAttributes() ?>><?php echo $awaiteddata_temp_list->NewStationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$awaiteddata_temp_list->ListOptions->render("body", "right", $awaiteddata_temp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$awaiteddata_temp_list->isGridAdd())
		$awaiteddata_temp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$awaiteddata_temp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($awaiteddata_temp_list->Recordset)
	$awaiteddata_temp_list->Recordset->Close();
?>
<?php if (!$awaiteddata_temp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$awaiteddata_temp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $awaiteddata_temp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $awaiteddata_temp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($awaiteddata_temp_list->TotalRecords == 0 && !$awaiteddata_temp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $awaiteddata_temp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$awaiteddata_temp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$awaiteddata_temp_list->isExport()) { ?>
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
$awaiteddata_temp_list->terminate();
?>