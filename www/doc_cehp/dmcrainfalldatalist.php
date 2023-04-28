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
$dmcrainfalldata_list = new dmcrainfalldata_list();

// Run the page
$dmcrainfalldata_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$dmcrainfalldata_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$dmcrainfalldata_list->isExport()) { ?>
<script>
var fdmcrainfalldatalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdmcrainfalldatalist = currentForm = new ew.Form("fdmcrainfalldatalist", "list");
	fdmcrainfalldatalist.formKeyCountName = '<?php echo $dmcrainfalldata_list->FormKeyCountName ?>';
	loadjs.done("fdmcrainfalldatalist");
});
var fdmcrainfalldatalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdmcrainfalldatalistsrch = currentSearchForm = new ew.Form("fdmcrainfalldatalistsrch");

	// Dynamic selection lists
	// Filters

	fdmcrainfalldatalistsrch.filterList = <?php echo $dmcrainfalldata_list->getFilterList() ?>;
	loadjs.done("fdmcrainfalldatalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$dmcrainfalldata_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($dmcrainfalldata_list->TotalRecords > 0 && $dmcrainfalldata_list->ExportOptions->visible()) { ?>
<?php $dmcrainfalldata_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($dmcrainfalldata_list->ImportOptions->visible()) { ?>
<?php $dmcrainfalldata_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($dmcrainfalldata_list->SearchOptions->visible()) { ?>
<?php $dmcrainfalldata_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($dmcrainfalldata_list->FilterOptions->visible()) { ?>
<?php $dmcrainfalldata_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$dmcrainfalldata_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$dmcrainfalldata_list->isExport() && !$dmcrainfalldata->CurrentAction) { ?>
<form name="fdmcrainfalldatalistsrch" id="fdmcrainfalldatalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdmcrainfalldatalistsrch-search-panel" class="<?php echo $dmcrainfalldata_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="dmcrainfalldata">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $dmcrainfalldata_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($dmcrainfalldata_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($dmcrainfalldata_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $dmcrainfalldata_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($dmcrainfalldata_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($dmcrainfalldata_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($dmcrainfalldata_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($dmcrainfalldata_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $dmcrainfalldata_list->showPageHeader(); ?>
<?php
$dmcrainfalldata_list->showMessage();
?>
<?php if ($dmcrainfalldata_list->TotalRecords > 0 || $dmcrainfalldata->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($dmcrainfalldata_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> dmcrainfalldata">
<?php if (!$dmcrainfalldata_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$dmcrainfalldata_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $dmcrainfalldata_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $dmcrainfalldata_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdmcrainfalldatalist" id="fdmcrainfalldatalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="dmcrainfalldata">
<div id="gmp_dmcrainfalldata" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($dmcrainfalldata_list->TotalRecords > 0 || $dmcrainfalldata_list->isGridEdit()) { ?>
<table id="tbl_dmcrainfalldatalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$dmcrainfalldata->RowType = ROWTYPE_HEADER;

// Render list options
$dmcrainfalldata_list->renderListOptions();

// Render list options (header, left)
$dmcrainfalldata_list->ListOptions->render("header", "left");
?>
<?php if ($dmcrainfalldata_list->Raingauge->Visible) { // Raingauge ?>
	<?php if ($dmcrainfalldata_list->SortUrl($dmcrainfalldata_list->Raingauge) == "") { ?>
		<th data-name="Raingauge" class="<?php echo $dmcrainfalldata_list->Raingauge->headerCellClass() ?>"><div id="elh_dmcrainfalldata_Raingauge" class="dmcrainfalldata_Raingauge"><div class="ew-table-header-caption"><?php echo $dmcrainfalldata_list->Raingauge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Raingauge" class="<?php echo $dmcrainfalldata_list->Raingauge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $dmcrainfalldata_list->SortUrl($dmcrainfalldata_list->Raingauge) ?>', 2);"><div id="elh_dmcrainfalldata_Raingauge" class="dmcrainfalldata_Raingauge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $dmcrainfalldata_list->Raingauge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($dmcrainfalldata_list->Raingauge->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($dmcrainfalldata_list->Raingauge->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($dmcrainfalldata_list->RainFall_Date->Visible) { // RainFall_Date ?>
	<?php if ($dmcrainfalldata_list->SortUrl($dmcrainfalldata_list->RainFall_Date) == "") { ?>
		<th data-name="RainFall_Date" class="<?php echo $dmcrainfalldata_list->RainFall_Date->headerCellClass() ?>"><div id="elh_dmcrainfalldata_RainFall_Date" class="dmcrainfalldata_RainFall_Date"><div class="ew-table-header-caption"><?php echo $dmcrainfalldata_list->RainFall_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RainFall_Date" class="<?php echo $dmcrainfalldata_list->RainFall_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $dmcrainfalldata_list->SortUrl($dmcrainfalldata_list->RainFall_Date) ?>', 2);"><div id="elh_dmcrainfalldata_RainFall_Date" class="dmcrainfalldata_RainFall_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $dmcrainfalldata_list->RainFall_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($dmcrainfalldata_list->RainFall_Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($dmcrainfalldata_list->RainFall_Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($dmcrainfalldata_list->RainFall_Time->Visible) { // RainFall_Time ?>
	<?php if ($dmcrainfalldata_list->SortUrl($dmcrainfalldata_list->RainFall_Time) == "") { ?>
		<th data-name="RainFall_Time" class="<?php echo $dmcrainfalldata_list->RainFall_Time->headerCellClass() ?>"><div id="elh_dmcrainfalldata_RainFall_Time" class="dmcrainfalldata_RainFall_Time"><div class="ew-table-header-caption"><?php echo $dmcrainfalldata_list->RainFall_Time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RainFall_Time" class="<?php echo $dmcrainfalldata_list->RainFall_Time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $dmcrainfalldata_list->SortUrl($dmcrainfalldata_list->RainFall_Time) ?>', 2);"><div id="elh_dmcrainfalldata_RainFall_Time" class="dmcrainfalldata_RainFall_Time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $dmcrainfalldata_list->RainFall_Time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($dmcrainfalldata_list->RainFall_Time->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($dmcrainfalldata_list->RainFall_Time->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($dmcrainfalldata_list->Rain->Visible) { // Rain ?>
	<?php if ($dmcrainfalldata_list->SortUrl($dmcrainfalldata_list->Rain) == "") { ?>
		<th data-name="Rain" class="<?php echo $dmcrainfalldata_list->Rain->headerCellClass() ?>"><div id="elh_dmcrainfalldata_Rain" class="dmcrainfalldata_Rain"><div class="ew-table-header-caption"><?php echo $dmcrainfalldata_list->Rain->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rain" class="<?php echo $dmcrainfalldata_list->Rain->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $dmcrainfalldata_list->SortUrl($dmcrainfalldata_list->Rain) ?>', 2);"><div id="elh_dmcrainfalldata_Rain" class="dmcrainfalldata_Rain">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $dmcrainfalldata_list->Rain->caption() ?></span><span class="ew-table-header-sort"><?php if ($dmcrainfalldata_list->Rain->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($dmcrainfalldata_list->Rain->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$dmcrainfalldata_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($dmcrainfalldata_list->ExportAll && $dmcrainfalldata_list->isExport()) {
	$dmcrainfalldata_list->StopRecord = $dmcrainfalldata_list->TotalRecords;
} else {

	// Set the last record to display
	if ($dmcrainfalldata_list->TotalRecords > $dmcrainfalldata_list->StartRecord + $dmcrainfalldata_list->DisplayRecords - 1)
		$dmcrainfalldata_list->StopRecord = $dmcrainfalldata_list->StartRecord + $dmcrainfalldata_list->DisplayRecords - 1;
	else
		$dmcrainfalldata_list->StopRecord = $dmcrainfalldata_list->TotalRecords;
}
$dmcrainfalldata_list->RecordCount = $dmcrainfalldata_list->StartRecord - 1;
if ($dmcrainfalldata_list->Recordset && !$dmcrainfalldata_list->Recordset->EOF) {
	$dmcrainfalldata_list->Recordset->moveFirst();
	$selectLimit = $dmcrainfalldata_list->UseSelectLimit;
	if (!$selectLimit && $dmcrainfalldata_list->StartRecord > 1)
		$dmcrainfalldata_list->Recordset->move($dmcrainfalldata_list->StartRecord - 1);
} elseif (!$dmcrainfalldata->AllowAddDeleteRow && $dmcrainfalldata_list->StopRecord == 0) {
	$dmcrainfalldata_list->StopRecord = $dmcrainfalldata->GridAddRowCount;
}

// Initialize aggregate
$dmcrainfalldata->RowType = ROWTYPE_AGGREGATEINIT;
$dmcrainfalldata->resetAttributes();
$dmcrainfalldata_list->renderRow();
while ($dmcrainfalldata_list->RecordCount < $dmcrainfalldata_list->StopRecord) {
	$dmcrainfalldata_list->RecordCount++;
	if ($dmcrainfalldata_list->RecordCount >= $dmcrainfalldata_list->StartRecord) {
		$dmcrainfalldata_list->RowCount++;

		// Set up key count
		$dmcrainfalldata_list->KeyCount = $dmcrainfalldata_list->RowIndex;

		// Init row class and style
		$dmcrainfalldata->resetAttributes();
		$dmcrainfalldata->CssClass = "";
		if ($dmcrainfalldata_list->isGridAdd()) {
		} else {
			$dmcrainfalldata_list->loadRowValues($dmcrainfalldata_list->Recordset); // Load row values
		}
		$dmcrainfalldata->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$dmcrainfalldata->RowAttrs->merge(["data-rowindex" => $dmcrainfalldata_list->RowCount, "id" => "r" . $dmcrainfalldata_list->RowCount . "_dmcrainfalldata", "data-rowtype" => $dmcrainfalldata->RowType]);

		// Render row
		$dmcrainfalldata_list->renderRow();

		// Render list options
		$dmcrainfalldata_list->renderListOptions();
?>
	<tr <?php echo $dmcrainfalldata->rowAttributes() ?>>
<?php

// Render list options (body, left)
$dmcrainfalldata_list->ListOptions->render("body", "left", $dmcrainfalldata_list->RowCount);
?>
	<?php if ($dmcrainfalldata_list->Raingauge->Visible) { // Raingauge ?>
		<td data-name="Raingauge" <?php echo $dmcrainfalldata_list->Raingauge->cellAttributes() ?>>
<span id="el<?php echo $dmcrainfalldata_list->RowCount ?>_dmcrainfalldata_Raingauge">
<span<?php echo $dmcrainfalldata_list->Raingauge->viewAttributes() ?>><?php echo $dmcrainfalldata_list->Raingauge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($dmcrainfalldata_list->RainFall_Date->Visible) { // RainFall_Date ?>
		<td data-name="RainFall_Date" <?php echo $dmcrainfalldata_list->RainFall_Date->cellAttributes() ?>>
<span id="el<?php echo $dmcrainfalldata_list->RowCount ?>_dmcrainfalldata_RainFall_Date">
<span<?php echo $dmcrainfalldata_list->RainFall_Date->viewAttributes() ?>><?php echo $dmcrainfalldata_list->RainFall_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($dmcrainfalldata_list->RainFall_Time->Visible) { // RainFall_Time ?>
		<td data-name="RainFall_Time" <?php echo $dmcrainfalldata_list->RainFall_Time->cellAttributes() ?>>
<span id="el<?php echo $dmcrainfalldata_list->RowCount ?>_dmcrainfalldata_RainFall_Time">
<span<?php echo $dmcrainfalldata_list->RainFall_Time->viewAttributes() ?>><?php echo $dmcrainfalldata_list->RainFall_Time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($dmcrainfalldata_list->Rain->Visible) { // Rain ?>
		<td data-name="Rain" <?php echo $dmcrainfalldata_list->Rain->cellAttributes() ?>>
<span id="el<?php echo $dmcrainfalldata_list->RowCount ?>_dmcrainfalldata_Rain">
<span<?php echo $dmcrainfalldata_list->Rain->viewAttributes() ?>><?php echo $dmcrainfalldata_list->Rain->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$dmcrainfalldata_list->ListOptions->render("body", "right", $dmcrainfalldata_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$dmcrainfalldata_list->isGridAdd())
		$dmcrainfalldata_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$dmcrainfalldata->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($dmcrainfalldata_list->Recordset)
	$dmcrainfalldata_list->Recordset->Close();
?>
<?php if (!$dmcrainfalldata_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$dmcrainfalldata_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $dmcrainfalldata_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $dmcrainfalldata_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($dmcrainfalldata_list->TotalRecords == 0 && !$dmcrainfalldata->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $dmcrainfalldata_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$dmcrainfalldata_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$dmcrainfalldata_list->isExport()) { ?>
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
$dmcrainfalldata_list->terminate();
?>