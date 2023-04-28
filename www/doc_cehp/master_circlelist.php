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
$master_circle_list = new master_circle_list();

// Run the page
$master_circle_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_circle_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_circle_list->isExport()) { ?>
<script>
var fmaster_circlelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_circlelist = currentForm = new ew.Form("fmaster_circlelist", "list");
	fmaster_circlelist.formKeyCountName = '<?php echo $master_circle_list->FormKeyCountName ?>';
	loadjs.done("fmaster_circlelist");
});
var fmaster_circlelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_circlelistsrch = currentSearchForm = new ew.Form("fmaster_circlelistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_circlelistsrch.filterList = <?php echo $master_circle_list->getFilterList() ?>;
	loadjs.done("fmaster_circlelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_circle_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_circle_list->TotalRecords > 0 && $master_circle_list->ExportOptions->visible()) { ?>
<?php $master_circle_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_circle_list->ImportOptions->visible()) { ?>
<?php $master_circle_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_circle_list->SearchOptions->visible()) { ?>
<?php $master_circle_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_circle_list->FilterOptions->visible()) { ?>
<?php $master_circle_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_circle_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_circle_list->isExport() && !$master_circle->CurrentAction) { ?>
<form name="fmaster_circlelistsrch" id="fmaster_circlelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_circlelistsrch-search-panel" class="<?php echo $master_circle_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_circle">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_circle_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_circle_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_circle_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_circle_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_circle_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_circle_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_circle_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_circle_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_circle_list->showPageHeader(); ?>
<?php
$master_circle_list->showMessage();
?>
<?php if ($master_circle_list->TotalRecords > 0 || $master_circle->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_circle_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_circle">
<?php if (!$master_circle_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_circle_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_circle_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_circle_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_circlelist" id="fmaster_circlelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_circle">
<div id="gmp_master_circle" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_circle_list->TotalRecords > 0 || $master_circle_list->isGridEdit()) { ?>
<table id="tbl_master_circlelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_circle->RowType = ROWTYPE_HEADER;

// Render list options
$master_circle_list->renderListOptions();

// Render list options (header, left)
$master_circle_list->ListOptions->render("header", "left");
?>
<?php if ($master_circle_list->circleId->Visible) { // circleId ?>
	<?php if ($master_circle_list->SortUrl($master_circle_list->circleId) == "") { ?>
		<th data-name="circleId" class="<?php echo $master_circle_list->circleId->headerCellClass() ?>"><div id="elh_master_circle_circleId" class="master_circle_circleId"><div class="ew-table-header-caption"><?php echo $master_circle_list->circleId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="circleId" class="<?php echo $master_circle_list->circleId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_circle_list->SortUrl($master_circle_list->circleId) ?>', 2);"><div id="elh_master_circle_circleId" class="master_circle_circleId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_circle_list->circleId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_circle_list->circleId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_circle_list->circleId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_circle_list->circleName->Visible) { // circleName ?>
	<?php if ($master_circle_list->SortUrl($master_circle_list->circleName) == "") { ?>
		<th data-name="circleName" class="<?php echo $master_circle_list->circleName->headerCellClass() ?>"><div id="elh_master_circle_circleName" class="master_circle_circleName"><div class="ew-table-header-caption"><?php echo $master_circle_list->circleName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="circleName" class="<?php echo $master_circle_list->circleName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_circle_list->SortUrl($master_circle_list->circleName) ?>', 2);"><div id="elh_master_circle_circleName" class="master_circle_circleName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_circle_list->circleName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_circle_list->circleName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_circle_list->circleName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_circle_list->circleName_kn->Visible) { // circleName_kn ?>
	<?php if ($master_circle_list->SortUrl($master_circle_list->circleName_kn) == "") { ?>
		<th data-name="circleName_kn" class="<?php echo $master_circle_list->circleName_kn->headerCellClass() ?>"><div id="elh_master_circle_circleName_kn" class="master_circle_circleName_kn"><div class="ew-table-header-caption"><?php echo $master_circle_list->circleName_kn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="circleName_kn" class="<?php echo $master_circle_list->circleName_kn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_circle_list->SortUrl($master_circle_list->circleName_kn) ?>', 2);"><div id="elh_master_circle_circleName_kn" class="master_circle_circleName_kn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_circle_list->circleName_kn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_circle_list->circleName_kn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_circle_list->circleName_kn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_circle_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_circle_list->ExportAll && $master_circle_list->isExport()) {
	$master_circle_list->StopRecord = $master_circle_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_circle_list->TotalRecords > $master_circle_list->StartRecord + $master_circle_list->DisplayRecords - 1)
		$master_circle_list->StopRecord = $master_circle_list->StartRecord + $master_circle_list->DisplayRecords - 1;
	else
		$master_circle_list->StopRecord = $master_circle_list->TotalRecords;
}
$master_circle_list->RecordCount = $master_circle_list->StartRecord - 1;
if ($master_circle_list->Recordset && !$master_circle_list->Recordset->EOF) {
	$master_circle_list->Recordset->moveFirst();
	$selectLimit = $master_circle_list->UseSelectLimit;
	if (!$selectLimit && $master_circle_list->StartRecord > 1)
		$master_circle_list->Recordset->move($master_circle_list->StartRecord - 1);
} elseif (!$master_circle->AllowAddDeleteRow && $master_circle_list->StopRecord == 0) {
	$master_circle_list->StopRecord = $master_circle->GridAddRowCount;
}

// Initialize aggregate
$master_circle->RowType = ROWTYPE_AGGREGATEINIT;
$master_circle->resetAttributes();
$master_circle_list->renderRow();
while ($master_circle_list->RecordCount < $master_circle_list->StopRecord) {
	$master_circle_list->RecordCount++;
	if ($master_circle_list->RecordCount >= $master_circle_list->StartRecord) {
		$master_circle_list->RowCount++;

		// Set up key count
		$master_circle_list->KeyCount = $master_circle_list->RowIndex;

		// Init row class and style
		$master_circle->resetAttributes();
		$master_circle->CssClass = "";
		if ($master_circle_list->isGridAdd()) {
		} else {
			$master_circle_list->loadRowValues($master_circle_list->Recordset); // Load row values
		}
		$master_circle->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_circle->RowAttrs->merge(["data-rowindex" => $master_circle_list->RowCount, "id" => "r" . $master_circle_list->RowCount . "_master_circle", "data-rowtype" => $master_circle->RowType]);

		// Render row
		$master_circle_list->renderRow();

		// Render list options
		$master_circle_list->renderListOptions();
?>
	<tr <?php echo $master_circle->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_circle_list->ListOptions->render("body", "left", $master_circle_list->RowCount);
?>
	<?php if ($master_circle_list->circleId->Visible) { // circleId ?>
		<td data-name="circleId" <?php echo $master_circle_list->circleId->cellAttributes() ?>>
<span id="el<?php echo $master_circle_list->RowCount ?>_master_circle_circleId">
<span<?php echo $master_circle_list->circleId->viewAttributes() ?>><?php echo $master_circle_list->circleId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_circle_list->circleName->Visible) { // circleName ?>
		<td data-name="circleName" <?php echo $master_circle_list->circleName->cellAttributes() ?>>
<span id="el<?php echo $master_circle_list->RowCount ?>_master_circle_circleName">
<span<?php echo $master_circle_list->circleName->viewAttributes() ?>><?php echo $master_circle_list->circleName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_circle_list->circleName_kn->Visible) { // circleName_kn ?>
		<td data-name="circleName_kn" <?php echo $master_circle_list->circleName_kn->cellAttributes() ?>>
<span id="el<?php echo $master_circle_list->RowCount ?>_master_circle_circleName_kn">
<span<?php echo $master_circle_list->circleName_kn->viewAttributes() ?>><?php echo $master_circle_list->circleName_kn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_circle_list->ListOptions->render("body", "right", $master_circle_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_circle_list->isGridAdd())
		$master_circle_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_circle->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_circle_list->Recordset)
	$master_circle_list->Recordset->Close();
?>
<?php if (!$master_circle_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_circle_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_circle_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_circle_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_circle_list->TotalRecords == 0 && !$master_circle->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_circle_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_circle_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_circle_list->isExport()) { ?>
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
$master_circle_list->terminate();
?>