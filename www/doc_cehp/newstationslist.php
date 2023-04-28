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
$newstations_list = new newstations_list();

// Run the page
$newstations_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$newstations_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$newstations_list->isExport()) { ?>
<script>
var fnewstationslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fnewstationslist = currentForm = new ew.Form("fnewstationslist", "list");
	fnewstationslist.formKeyCountName = '<?php echo $newstations_list->FormKeyCountName ?>';
	loadjs.done("fnewstationslist");
});
var fnewstationslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fnewstationslistsrch = currentSearchForm = new ew.Form("fnewstationslistsrch");

	// Dynamic selection lists
	// Filters

	fnewstationslistsrch.filterList = <?php echo $newstations_list->getFilterList() ?>;
	loadjs.done("fnewstationslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$newstations_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($newstations_list->TotalRecords > 0 && $newstations_list->ExportOptions->visible()) { ?>
<?php $newstations_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($newstations_list->ImportOptions->visible()) { ?>
<?php $newstations_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($newstations_list->SearchOptions->visible()) { ?>
<?php $newstations_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($newstations_list->FilterOptions->visible()) { ?>
<?php $newstations_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$newstations_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$newstations_list->isExport() && !$newstations->CurrentAction) { ?>
<form name="fnewstationslistsrch" id="fnewstationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fnewstationslistsrch-search-panel" class="<?php echo $newstations_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="newstations">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $newstations_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($newstations_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($newstations_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $newstations_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($newstations_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($newstations_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($newstations_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($newstations_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $newstations_list->showPageHeader(); ?>
<?php
$newstations_list->showMessage();
?>
<?php if ($newstations_list->TotalRecords > 0 || $newstations->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($newstations_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> newstations">
<?php if (!$newstations_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$newstations_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $newstations_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $newstations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fnewstationslist" id="fnewstationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="newstations">
<div id="gmp_newstations" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($newstations_list->TotalRecords > 0 || $newstations_list->isGridEdit()) { ?>
<table id="tbl_newstationslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$newstations->RowType = ROWTYPE_HEADER;

// Render list options
$newstations_list->renderListOptions();

// Render list options (header, left)
$newstations_list->ListOptions->render("header", "left");
?>
<?php if ($newstations_list->Name->Visible) { // Name ?>
	<?php if ($newstations_list->SortUrl($newstations_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $newstations_list->Name->headerCellClass() ?>"><div id="elh_newstations_Name" class="newstations_Name"><div class="ew-table-header-caption"><?php echo $newstations_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $newstations_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstations_list->SortUrl($newstations_list->Name) ?>', 2);"><div id="elh_newstations_Name" class="newstations_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstations_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstations_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstations_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstations_list->Number->Visible) { // Number ?>
	<?php if ($newstations_list->SortUrl($newstations_list->Number) == "") { ?>
		<th data-name="Number" class="<?php echo $newstations_list->Number->headerCellClass() ?>"><div id="elh_newstations_Number" class="newstations_Number"><div class="ew-table-header-caption"><?php echo $newstations_list->Number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Number" class="<?php echo $newstations_list->Number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstations_list->SortUrl($newstations_list->Number) ?>', 2);"><div id="elh_newstations_Number" class="newstations_Number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstations_list->Number->caption() ?></span><span class="ew-table-header-sort"><?php if ($newstations_list->Number->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstations_list->Number->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$newstations_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($newstations_list->ExportAll && $newstations_list->isExport()) {
	$newstations_list->StopRecord = $newstations_list->TotalRecords;
} else {

	// Set the last record to display
	if ($newstations_list->TotalRecords > $newstations_list->StartRecord + $newstations_list->DisplayRecords - 1)
		$newstations_list->StopRecord = $newstations_list->StartRecord + $newstations_list->DisplayRecords - 1;
	else
		$newstations_list->StopRecord = $newstations_list->TotalRecords;
}
$newstations_list->RecordCount = $newstations_list->StartRecord - 1;
if ($newstations_list->Recordset && !$newstations_list->Recordset->EOF) {
	$newstations_list->Recordset->moveFirst();
	$selectLimit = $newstations_list->UseSelectLimit;
	if (!$selectLimit && $newstations_list->StartRecord > 1)
		$newstations_list->Recordset->move($newstations_list->StartRecord - 1);
} elseif (!$newstations->AllowAddDeleteRow && $newstations_list->StopRecord == 0) {
	$newstations_list->StopRecord = $newstations->GridAddRowCount;
}

// Initialize aggregate
$newstations->RowType = ROWTYPE_AGGREGATEINIT;
$newstations->resetAttributes();
$newstations_list->renderRow();
while ($newstations_list->RecordCount < $newstations_list->StopRecord) {
	$newstations_list->RecordCount++;
	if ($newstations_list->RecordCount >= $newstations_list->StartRecord) {
		$newstations_list->RowCount++;

		// Set up key count
		$newstations_list->KeyCount = $newstations_list->RowIndex;

		// Init row class and style
		$newstations->resetAttributes();
		$newstations->CssClass = "";
		if ($newstations_list->isGridAdd()) {
		} else {
			$newstations_list->loadRowValues($newstations_list->Recordset); // Load row values
		}
		$newstations->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$newstations->RowAttrs->merge(["data-rowindex" => $newstations_list->RowCount, "id" => "r" . $newstations_list->RowCount . "_newstations", "data-rowtype" => $newstations->RowType]);

		// Render row
		$newstations_list->renderRow();

		// Render list options
		$newstations_list->renderListOptions();
?>
	<tr <?php echo $newstations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$newstations_list->ListOptions->render("body", "left", $newstations_list->RowCount);
?>
	<?php if ($newstations_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $newstations_list->Name->cellAttributes() ?>>
<span id="el<?php echo $newstations_list->RowCount ?>_newstations_Name">
<span<?php echo $newstations_list->Name->viewAttributes() ?>><?php echo $newstations_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstations_list->Number->Visible) { // Number ?>
		<td data-name="Number" <?php echo $newstations_list->Number->cellAttributes() ?>>
<span id="el<?php echo $newstations_list->RowCount ?>_newstations_Number">
<span<?php echo $newstations_list->Number->viewAttributes() ?>><?php echo $newstations_list->Number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$newstations_list->ListOptions->render("body", "right", $newstations_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$newstations_list->isGridAdd())
		$newstations_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$newstations->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($newstations_list->Recordset)
	$newstations_list->Recordset->Close();
?>
<?php if (!$newstations_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$newstations_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $newstations_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $newstations_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($newstations_list->TotalRecords == 0 && !$newstations->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $newstations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$newstations_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$newstations_list->isExport()) { ?>
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
$newstations_list->terminate();
?>