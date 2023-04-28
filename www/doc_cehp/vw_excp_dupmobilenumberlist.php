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
$vw_excp_dupmobilenumber_list = new vw_excp_dupmobilenumber_list();

// Run the page
$vw_excp_dupmobilenumber_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_excp_dupmobilenumber_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_excp_dupmobilenumber_list->isExport()) { ?>
<script>
var fvw_excp_dupmobilenumberlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_excp_dupmobilenumberlist = currentForm = new ew.Form("fvw_excp_dupmobilenumberlist", "list");
	fvw_excp_dupmobilenumberlist.formKeyCountName = '<?php echo $vw_excp_dupmobilenumber_list->FormKeyCountName ?>';
	loadjs.done("fvw_excp_dupmobilenumberlist");
});
var fvw_excp_dupmobilenumberlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_excp_dupmobilenumberlistsrch = currentSearchForm = new ew.Form("fvw_excp_dupmobilenumberlistsrch");

	// Dynamic selection lists
	// Filters

	fvw_excp_dupmobilenumberlistsrch.filterList = <?php echo $vw_excp_dupmobilenumber_list->getFilterList() ?>;
	loadjs.done("fvw_excp_dupmobilenumberlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_excp_dupmobilenumber_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_excp_dupmobilenumber_list->TotalRecords > 0 && $vw_excp_dupmobilenumber_list->ExportOptions->visible()) { ?>
<?php $vw_excp_dupmobilenumber_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_excp_dupmobilenumber_list->ImportOptions->visible()) { ?>
<?php $vw_excp_dupmobilenumber_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_excp_dupmobilenumber_list->SearchOptions->visible()) { ?>
<?php $vw_excp_dupmobilenumber_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_excp_dupmobilenumber_list->FilterOptions->visible()) { ?>
<?php $vw_excp_dupmobilenumber_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_excp_dupmobilenumber_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_excp_dupmobilenumber_list->isExport() && !$vw_excp_dupmobilenumber->CurrentAction) { ?>
<form name="fvw_excp_dupmobilenumberlistsrch" id="fvw_excp_dupmobilenumberlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_excp_dupmobilenumberlistsrch-search-panel" class="<?php echo $vw_excp_dupmobilenumber_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_excp_dupmobilenumber">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $vw_excp_dupmobilenumber_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_excp_dupmobilenumber_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_excp_dupmobilenumber_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_excp_dupmobilenumber_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_excp_dupmobilenumber_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_excp_dupmobilenumber_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_excp_dupmobilenumber_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_excp_dupmobilenumber_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_excp_dupmobilenumber_list->showPageHeader(); ?>
<?php
$vw_excp_dupmobilenumber_list->showMessage();
?>
<?php if ($vw_excp_dupmobilenumber_list->TotalRecords > 0 || $vw_excp_dupmobilenumber->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_excp_dupmobilenumber_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_excp_dupmobilenumber">
<?php if (!$vw_excp_dupmobilenumber_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_excp_dupmobilenumber_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_excp_dupmobilenumber_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_excp_dupmobilenumber_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_excp_dupmobilenumberlist" id="fvw_excp_dupmobilenumberlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_excp_dupmobilenumber">
<div id="gmp_vw_excp_dupmobilenumber" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_excp_dupmobilenumber_list->TotalRecords > 0 || $vw_excp_dupmobilenumber_list->isGridEdit()) { ?>
<table id="tbl_vw_excp_dupmobilenumberlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_excp_dupmobilenumber->RowType = ROWTYPE_HEADER;

// Render list options
$vw_excp_dupmobilenumber_list->renderListOptions();

// Render list options (header, left)
$vw_excp_dupmobilenumber_list->ListOptions->render("header", "left");
?>
<?php if ($vw_excp_dupmobilenumber_list->StationId->Visible) { // StationId ?>
	<?php if ($vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $vw_excp_dupmobilenumber_list->StationId->headerCellClass() ?>"><div id="elh_vw_excp_dupmobilenumber_StationId" class="vw_excp_dupmobilenumber_StationId"><div class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $vw_excp_dupmobilenumber_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->StationId) ?>', 2);"><div id="elh_vw_excp_dupmobilenumber_StationId" class="vw_excp_dupmobilenumber_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_excp_dupmobilenumber_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_excp_dupmobilenumber_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_excp_dupmobilenumber_list->StationName->Visible) { // StationName ?>
	<?php if ($vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->StationName) == "") { ?>
		<th data-name="StationName" class="<?php echo $vw_excp_dupmobilenumber_list->StationName->headerCellClass() ?>"><div id="elh_vw_excp_dupmobilenumber_StationName" class="vw_excp_dupmobilenumber_StationName"><div class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->StationName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationName" class="<?php echo $vw_excp_dupmobilenumber_list->StationName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->StationName) ?>', 2);"><div id="elh_vw_excp_dupmobilenumber_StationName" class="vw_excp_dupmobilenumber_StationName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->StationName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_excp_dupmobilenumber_list->StationName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_excp_dupmobilenumber_list->StationName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_excp_dupmobilenumber_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_excp_dupmobilenumber_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_excp_dupmobilenumber_MobileNumber" class="vw_excp_dupmobilenumber_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_excp_dupmobilenumber_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->MobileNumber) ?>', 2);"><div id="elh_vw_excp_dupmobilenumber_MobileNumber" class="vw_excp_dupmobilenumber_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_excp_dupmobilenumber_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_excp_dupmobilenumber_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_excp_dupmobilenumber_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_excp_dupmobilenumber_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_excp_dupmobilenumber_SubDivisionId" class="vw_excp_dupmobilenumber_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_excp_dupmobilenumber_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->SubDivisionId) ?>', 2);"><div id="elh_vw_excp_dupmobilenumber_SubDivisionId" class="vw_excp_dupmobilenumber_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_excp_dupmobilenumber_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_excp_dupmobilenumber_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_excp_dupmobilenumber_list->StationSetup->Visible) { // StationSetup ?>
	<?php if ($vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->StationSetup) == "") { ?>
		<th data-name="StationSetup" class="<?php echo $vw_excp_dupmobilenumber_list->StationSetup->headerCellClass() ?>"><div id="elh_vw_excp_dupmobilenumber_StationSetup" class="vw_excp_dupmobilenumber_StationSetup"><div class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->StationSetup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationSetup" class="<?php echo $vw_excp_dupmobilenumber_list->StationSetup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_excp_dupmobilenumber_list->SortUrl($vw_excp_dupmobilenumber_list->StationSetup) ?>', 2);"><div id="elh_vw_excp_dupmobilenumber_StationSetup" class="vw_excp_dupmobilenumber_StationSetup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_excp_dupmobilenumber_list->StationSetup->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_excp_dupmobilenumber_list->StationSetup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_excp_dupmobilenumber_list->StationSetup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_excp_dupmobilenumber_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_excp_dupmobilenumber_list->ExportAll && $vw_excp_dupmobilenumber_list->isExport()) {
	$vw_excp_dupmobilenumber_list->StopRecord = $vw_excp_dupmobilenumber_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_excp_dupmobilenumber_list->TotalRecords > $vw_excp_dupmobilenumber_list->StartRecord + $vw_excp_dupmobilenumber_list->DisplayRecords - 1)
		$vw_excp_dupmobilenumber_list->StopRecord = $vw_excp_dupmobilenumber_list->StartRecord + $vw_excp_dupmobilenumber_list->DisplayRecords - 1;
	else
		$vw_excp_dupmobilenumber_list->StopRecord = $vw_excp_dupmobilenumber_list->TotalRecords;
}
$vw_excp_dupmobilenumber_list->RecordCount = $vw_excp_dupmobilenumber_list->StartRecord - 1;
if ($vw_excp_dupmobilenumber_list->Recordset && !$vw_excp_dupmobilenumber_list->Recordset->EOF) {
	$vw_excp_dupmobilenumber_list->Recordset->moveFirst();
	$selectLimit = $vw_excp_dupmobilenumber_list->UseSelectLimit;
	if (!$selectLimit && $vw_excp_dupmobilenumber_list->StartRecord > 1)
		$vw_excp_dupmobilenumber_list->Recordset->move($vw_excp_dupmobilenumber_list->StartRecord - 1);
} elseif (!$vw_excp_dupmobilenumber->AllowAddDeleteRow && $vw_excp_dupmobilenumber_list->StopRecord == 0) {
	$vw_excp_dupmobilenumber_list->StopRecord = $vw_excp_dupmobilenumber->GridAddRowCount;
}

// Initialize aggregate
$vw_excp_dupmobilenumber->RowType = ROWTYPE_AGGREGATEINIT;
$vw_excp_dupmobilenumber->resetAttributes();
$vw_excp_dupmobilenumber_list->renderRow();
while ($vw_excp_dupmobilenumber_list->RecordCount < $vw_excp_dupmobilenumber_list->StopRecord) {
	$vw_excp_dupmobilenumber_list->RecordCount++;
	if ($vw_excp_dupmobilenumber_list->RecordCount >= $vw_excp_dupmobilenumber_list->StartRecord) {
		$vw_excp_dupmobilenumber_list->RowCount++;

		// Set up key count
		$vw_excp_dupmobilenumber_list->KeyCount = $vw_excp_dupmobilenumber_list->RowIndex;

		// Init row class and style
		$vw_excp_dupmobilenumber->resetAttributes();
		$vw_excp_dupmobilenumber->CssClass = "";
		if ($vw_excp_dupmobilenumber_list->isGridAdd()) {
		} else {
			$vw_excp_dupmobilenumber_list->loadRowValues($vw_excp_dupmobilenumber_list->Recordset); // Load row values
		}
		$vw_excp_dupmobilenumber->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_excp_dupmobilenumber->RowAttrs->merge(["data-rowindex" => $vw_excp_dupmobilenumber_list->RowCount, "id" => "r" . $vw_excp_dupmobilenumber_list->RowCount . "_vw_excp_dupmobilenumber", "data-rowtype" => $vw_excp_dupmobilenumber->RowType]);

		// Render row
		$vw_excp_dupmobilenumber_list->renderRow();

		// Render list options
		$vw_excp_dupmobilenumber_list->renderListOptions();
?>
	<tr <?php echo $vw_excp_dupmobilenumber->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_excp_dupmobilenumber_list->ListOptions->render("body", "left", $vw_excp_dupmobilenumber_list->RowCount);
?>
	<?php if ($vw_excp_dupmobilenumber_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $vw_excp_dupmobilenumber_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $vw_excp_dupmobilenumber_list->RowCount ?>_vw_excp_dupmobilenumber_StationId">
<span<?php echo $vw_excp_dupmobilenumber_list->StationId->viewAttributes() ?>><?php echo $vw_excp_dupmobilenumber_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_excp_dupmobilenumber_list->StationName->Visible) { // StationName ?>
		<td data-name="StationName" <?php echo $vw_excp_dupmobilenumber_list->StationName->cellAttributes() ?>>
<span id="el<?php echo $vw_excp_dupmobilenumber_list->RowCount ?>_vw_excp_dupmobilenumber_StationName">
<span<?php echo $vw_excp_dupmobilenumber_list->StationName->viewAttributes() ?>><?php echo $vw_excp_dupmobilenumber_list->StationName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_excp_dupmobilenumber_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_excp_dupmobilenumber_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_excp_dupmobilenumber_list->RowCount ?>_vw_excp_dupmobilenumber_MobileNumber">
<span<?php echo $vw_excp_dupmobilenumber_list->MobileNumber->viewAttributes() ?>><?php echo $vw_excp_dupmobilenumber_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_excp_dupmobilenumber_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_excp_dupmobilenumber_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_excp_dupmobilenumber_list->RowCount ?>_vw_excp_dupmobilenumber_SubDivisionId">
<span<?php echo $vw_excp_dupmobilenumber_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_excp_dupmobilenumber_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_excp_dupmobilenumber_list->StationSetup->Visible) { // StationSetup ?>
		<td data-name="StationSetup" <?php echo $vw_excp_dupmobilenumber_list->StationSetup->cellAttributes() ?>>
<span id="el<?php echo $vw_excp_dupmobilenumber_list->RowCount ?>_vw_excp_dupmobilenumber_StationSetup">
<span<?php echo $vw_excp_dupmobilenumber_list->StationSetup->viewAttributes() ?>><?php echo $vw_excp_dupmobilenumber_list->StationSetup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_excp_dupmobilenumber_list->ListOptions->render("body", "right", $vw_excp_dupmobilenumber_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_excp_dupmobilenumber_list->isGridAdd())
		$vw_excp_dupmobilenumber_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_excp_dupmobilenumber->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_excp_dupmobilenumber_list->Recordset)
	$vw_excp_dupmobilenumber_list->Recordset->Close();
?>
<?php if (!$vw_excp_dupmobilenumber_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_excp_dupmobilenumber_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_excp_dupmobilenumber_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_excp_dupmobilenumber_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_excp_dupmobilenumber_list->TotalRecords == 0 && !$vw_excp_dupmobilenumber->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_excp_dupmobilenumber_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_excp_dupmobilenumber_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_excp_dupmobilenumber_list->isExport()) { ?>
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
$vw_excp_dupmobilenumber_list->terminate();
?>