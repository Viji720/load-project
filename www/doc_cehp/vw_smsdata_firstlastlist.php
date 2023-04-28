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
$vw_smsdata_firstlast_list = new vw_smsdata_firstlast_list();

// Run the page
$vw_smsdata_firstlast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_smsdata_firstlast_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_smsdata_firstlast_list->isExport()) { ?>
<script>
var fvw_smsdata_firstlastlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_smsdata_firstlastlist = currentForm = new ew.Form("fvw_smsdata_firstlastlist", "list");
	fvw_smsdata_firstlastlist.formKeyCountName = '<?php echo $vw_smsdata_firstlast_list->FormKeyCountName ?>';
	loadjs.done("fvw_smsdata_firstlastlist");
});
var fvw_smsdata_firstlastlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_smsdata_firstlastlistsrch = currentSearchForm = new ew.Form("fvw_smsdata_firstlastlistsrch");

	// Dynamic selection lists
	// Filters

	fvw_smsdata_firstlastlistsrch.filterList = <?php echo $vw_smsdata_firstlast_list->getFilterList() ?>;
	loadjs.done("fvw_smsdata_firstlastlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_smsdata_firstlast_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_smsdata_firstlast_list->TotalRecords > 0 && $vw_smsdata_firstlast_list->ExportOptions->visible()) { ?>
<?php $vw_smsdata_firstlast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_smsdata_firstlast_list->ImportOptions->visible()) { ?>
<?php $vw_smsdata_firstlast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_smsdata_firstlast_list->SearchOptions->visible()) { ?>
<?php $vw_smsdata_firstlast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_smsdata_firstlast_list->FilterOptions->visible()) { ?>
<?php $vw_smsdata_firstlast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_smsdata_firstlast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_smsdata_firstlast_list->isExport() && !$vw_smsdata_firstlast->CurrentAction) { ?>
<form name="fvw_smsdata_firstlastlistsrch" id="fvw_smsdata_firstlastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_smsdata_firstlastlistsrch-search-panel" class="<?php echo $vw_smsdata_firstlast_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_smsdata_firstlast">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $vw_smsdata_firstlast_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_smsdata_firstlast_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_smsdata_firstlast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_smsdata_firstlast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_smsdata_firstlast_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_smsdata_firstlast_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_smsdata_firstlast_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_smsdata_firstlast_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_smsdata_firstlast_list->showPageHeader(); ?>
<?php
$vw_smsdata_firstlast_list->showMessage();
?>
<?php if ($vw_smsdata_firstlast_list->TotalRecords > 0 || $vw_smsdata_firstlast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_smsdata_firstlast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_smsdata_firstlast">
<?php if (!$vw_smsdata_firstlast_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_smsdata_firstlast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_smsdata_firstlast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_smsdata_firstlast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_smsdata_firstlastlist" id="fvw_smsdata_firstlastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_smsdata_firstlast">
<div id="gmp_vw_smsdata_firstlast" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_smsdata_firstlast_list->TotalRecords > 0 || $vw_smsdata_firstlast_list->isGridEdit()) { ?>
<table id="tbl_vw_smsdata_firstlastlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_smsdata_firstlast->RowType = ROWTYPE_HEADER;

// Render list options
$vw_smsdata_firstlast_list->renderListOptions();

// Render list options (header, left)
$vw_smsdata_firstlast_list->ListOptions->render("header", "left");
?>
<?php if ($vw_smsdata_firstlast_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<?php if ($vw_smsdata_firstlast_list->SortUrl($vw_smsdata_firstlast_list->SenderMobileNumber) == "") { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $vw_smsdata_firstlast_list->SenderMobileNumber->headerCellClass() ?>"><div id="elh_vw_smsdata_firstlast_SenderMobileNumber" class="vw_smsdata_firstlast_SenderMobileNumber"><div class="ew-table-header-caption"><?php echo $vw_smsdata_firstlast_list->SenderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $vw_smsdata_firstlast_list->SenderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_smsdata_firstlast_list->SortUrl($vw_smsdata_firstlast_list->SenderMobileNumber) ?>', 2);"><div id="elh_vw_smsdata_firstlast_SenderMobileNumber" class="vw_smsdata_firstlast_SenderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_smsdata_firstlast_list->SenderMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_smsdata_firstlast_list->SenderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_smsdata_firstlast_list->SenderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_smsdata_firstlast_list->first_reading_date->Visible) { // first_reading_date ?>
	<?php if ($vw_smsdata_firstlast_list->SortUrl($vw_smsdata_firstlast_list->first_reading_date) == "") { ?>
		<th data-name="first_reading_date" class="<?php echo $vw_smsdata_firstlast_list->first_reading_date->headerCellClass() ?>"><div id="elh_vw_smsdata_firstlast_first_reading_date" class="vw_smsdata_firstlast_first_reading_date"><div class="ew-table-header-caption"><?php echo $vw_smsdata_firstlast_list->first_reading_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_reading_date" class="<?php echo $vw_smsdata_firstlast_list->first_reading_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_smsdata_firstlast_list->SortUrl($vw_smsdata_firstlast_list->first_reading_date) ?>', 2);"><div id="elh_vw_smsdata_firstlast_first_reading_date" class="vw_smsdata_firstlast_first_reading_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_smsdata_firstlast_list->first_reading_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_smsdata_firstlast_list->first_reading_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_smsdata_firstlast_list->first_reading_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_smsdata_firstlast_list->last_reading_date->Visible) { // last_reading_date ?>
	<?php if ($vw_smsdata_firstlast_list->SortUrl($vw_smsdata_firstlast_list->last_reading_date) == "") { ?>
		<th data-name="last_reading_date" class="<?php echo $vw_smsdata_firstlast_list->last_reading_date->headerCellClass() ?>"><div id="elh_vw_smsdata_firstlast_last_reading_date" class="vw_smsdata_firstlast_last_reading_date"><div class="ew-table-header-caption"><?php echo $vw_smsdata_firstlast_list->last_reading_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_reading_date" class="<?php echo $vw_smsdata_firstlast_list->last_reading_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_smsdata_firstlast_list->SortUrl($vw_smsdata_firstlast_list->last_reading_date) ?>', 2);"><div id="elh_vw_smsdata_firstlast_last_reading_date" class="vw_smsdata_firstlast_last_reading_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_smsdata_firstlast_list->last_reading_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_smsdata_firstlast_list->last_reading_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_smsdata_firstlast_list->last_reading_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_smsdata_firstlast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_smsdata_firstlast_list->ExportAll && $vw_smsdata_firstlast_list->isExport()) {
	$vw_smsdata_firstlast_list->StopRecord = $vw_smsdata_firstlast_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_smsdata_firstlast_list->TotalRecords > $vw_smsdata_firstlast_list->StartRecord + $vw_smsdata_firstlast_list->DisplayRecords - 1)
		$vw_smsdata_firstlast_list->StopRecord = $vw_smsdata_firstlast_list->StartRecord + $vw_smsdata_firstlast_list->DisplayRecords - 1;
	else
		$vw_smsdata_firstlast_list->StopRecord = $vw_smsdata_firstlast_list->TotalRecords;
}
$vw_smsdata_firstlast_list->RecordCount = $vw_smsdata_firstlast_list->StartRecord - 1;
if ($vw_smsdata_firstlast_list->Recordset && !$vw_smsdata_firstlast_list->Recordset->EOF) {
	$vw_smsdata_firstlast_list->Recordset->moveFirst();
	$selectLimit = $vw_smsdata_firstlast_list->UseSelectLimit;
	if (!$selectLimit && $vw_smsdata_firstlast_list->StartRecord > 1)
		$vw_smsdata_firstlast_list->Recordset->move($vw_smsdata_firstlast_list->StartRecord - 1);
} elseif (!$vw_smsdata_firstlast->AllowAddDeleteRow && $vw_smsdata_firstlast_list->StopRecord == 0) {
	$vw_smsdata_firstlast_list->StopRecord = $vw_smsdata_firstlast->GridAddRowCount;
}

// Initialize aggregate
$vw_smsdata_firstlast->RowType = ROWTYPE_AGGREGATEINIT;
$vw_smsdata_firstlast->resetAttributes();
$vw_smsdata_firstlast_list->renderRow();
while ($vw_smsdata_firstlast_list->RecordCount < $vw_smsdata_firstlast_list->StopRecord) {
	$vw_smsdata_firstlast_list->RecordCount++;
	if ($vw_smsdata_firstlast_list->RecordCount >= $vw_smsdata_firstlast_list->StartRecord) {
		$vw_smsdata_firstlast_list->RowCount++;

		// Set up key count
		$vw_smsdata_firstlast_list->KeyCount = $vw_smsdata_firstlast_list->RowIndex;

		// Init row class and style
		$vw_smsdata_firstlast->resetAttributes();
		$vw_smsdata_firstlast->CssClass = "";
		if ($vw_smsdata_firstlast_list->isGridAdd()) {
		} else {
			$vw_smsdata_firstlast_list->loadRowValues($vw_smsdata_firstlast_list->Recordset); // Load row values
		}
		$vw_smsdata_firstlast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_smsdata_firstlast->RowAttrs->merge(["data-rowindex" => $vw_smsdata_firstlast_list->RowCount, "id" => "r" . $vw_smsdata_firstlast_list->RowCount . "_vw_smsdata_firstlast", "data-rowtype" => $vw_smsdata_firstlast->RowType]);

		// Render row
		$vw_smsdata_firstlast_list->renderRow();

		// Render list options
		$vw_smsdata_firstlast_list->renderListOptions();
?>
	<tr <?php echo $vw_smsdata_firstlast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_smsdata_firstlast_list->ListOptions->render("body", "left", $vw_smsdata_firstlast_list->RowCount);
?>
	<?php if ($vw_smsdata_firstlast_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber" <?php echo $vw_smsdata_firstlast_list->SenderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_smsdata_firstlast_list->RowCount ?>_vw_smsdata_firstlast_SenderMobileNumber">
<span<?php echo $vw_smsdata_firstlast_list->SenderMobileNumber->viewAttributes() ?>><?php echo $vw_smsdata_firstlast_list->SenderMobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_smsdata_firstlast_list->first_reading_date->Visible) { // first_reading_date ?>
		<td data-name="first_reading_date" <?php echo $vw_smsdata_firstlast_list->first_reading_date->cellAttributes() ?>>
<span id="el<?php echo $vw_smsdata_firstlast_list->RowCount ?>_vw_smsdata_firstlast_first_reading_date">
<span<?php echo $vw_smsdata_firstlast_list->first_reading_date->viewAttributes() ?>><?php echo $vw_smsdata_firstlast_list->first_reading_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_smsdata_firstlast_list->last_reading_date->Visible) { // last_reading_date ?>
		<td data-name="last_reading_date" <?php echo $vw_smsdata_firstlast_list->last_reading_date->cellAttributes() ?>>
<span id="el<?php echo $vw_smsdata_firstlast_list->RowCount ?>_vw_smsdata_firstlast_last_reading_date">
<span<?php echo $vw_smsdata_firstlast_list->last_reading_date->viewAttributes() ?>><?php echo $vw_smsdata_firstlast_list->last_reading_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_smsdata_firstlast_list->ListOptions->render("body", "right", $vw_smsdata_firstlast_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_smsdata_firstlast_list->isGridAdd())
		$vw_smsdata_firstlast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_smsdata_firstlast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_smsdata_firstlast_list->Recordset)
	$vw_smsdata_firstlast_list->Recordset->Close();
?>
<?php if (!$vw_smsdata_firstlast_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_smsdata_firstlast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_smsdata_firstlast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_smsdata_firstlast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_smsdata_firstlast_list->TotalRecords == 0 && !$vw_smsdata_firstlast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_smsdata_firstlast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_smsdata_firstlast_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_smsdata_firstlast_list->isExport()) { ?>
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
$vw_smsdata_firstlast_list->terminate();
?>