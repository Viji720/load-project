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
$vw_excp_mobilenumbernotmapped_list = new vw_excp_mobilenumbernotmapped_list();

// Run the page
$vw_excp_mobilenumbernotmapped_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_excp_mobilenumbernotmapped_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_excp_mobilenumbernotmapped_list->isExport()) { ?>
<script>
var fvw_excp_mobilenumbernotmappedlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_excp_mobilenumbernotmappedlist = currentForm = new ew.Form("fvw_excp_mobilenumbernotmappedlist", "list");
	fvw_excp_mobilenumbernotmappedlist.formKeyCountName = '<?php echo $vw_excp_mobilenumbernotmapped_list->FormKeyCountName ?>';
	loadjs.done("fvw_excp_mobilenumbernotmappedlist");
});
var fvw_excp_mobilenumbernotmappedlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_excp_mobilenumbernotmappedlistsrch = currentSearchForm = new ew.Form("fvw_excp_mobilenumbernotmappedlistsrch");

	// Dynamic selection lists
	// Filters

	fvw_excp_mobilenumbernotmappedlistsrch.filterList = <?php echo $vw_excp_mobilenumbernotmapped_list->getFilterList() ?>;
	loadjs.done("fvw_excp_mobilenumbernotmappedlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_excp_mobilenumbernotmapped_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_excp_mobilenumbernotmapped_list->TotalRecords > 0 && $vw_excp_mobilenumbernotmapped_list->ExportOptions->visible()) { ?>
<?php $vw_excp_mobilenumbernotmapped_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_excp_mobilenumbernotmapped_list->ImportOptions->visible()) { ?>
<?php $vw_excp_mobilenumbernotmapped_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_excp_mobilenumbernotmapped_list->SearchOptions->visible()) { ?>
<?php $vw_excp_mobilenumbernotmapped_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_excp_mobilenumbernotmapped_list->FilterOptions->visible()) { ?>
<?php $vw_excp_mobilenumbernotmapped_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_excp_mobilenumbernotmapped_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_excp_mobilenumbernotmapped_list->isExport() && !$vw_excp_mobilenumbernotmapped->CurrentAction) { ?>
<form name="fvw_excp_mobilenumbernotmappedlistsrch" id="fvw_excp_mobilenumbernotmappedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_excp_mobilenumbernotmappedlistsrch-search-panel" class="<?php echo $vw_excp_mobilenumbernotmapped_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_excp_mobilenumbernotmapped">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $vw_excp_mobilenumbernotmapped_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_excp_mobilenumbernotmapped_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_excp_mobilenumbernotmapped_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_excp_mobilenumbernotmapped_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_excp_mobilenumbernotmapped_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_excp_mobilenumbernotmapped_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_excp_mobilenumbernotmapped_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_excp_mobilenumbernotmapped_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_excp_mobilenumbernotmapped_list->showPageHeader(); ?>
<?php
$vw_excp_mobilenumbernotmapped_list->showMessage();
?>
<?php if ($vw_excp_mobilenumbernotmapped_list->TotalRecords > 0 || $vw_excp_mobilenumbernotmapped->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_excp_mobilenumbernotmapped_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_excp_mobilenumbernotmapped">
<?php if (!$vw_excp_mobilenumbernotmapped_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_excp_mobilenumbernotmapped_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_excp_mobilenumbernotmapped_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_excp_mobilenumbernotmapped_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_excp_mobilenumbernotmappedlist" id="fvw_excp_mobilenumbernotmappedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_excp_mobilenumbernotmapped">
<div id="gmp_vw_excp_mobilenumbernotmapped" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_excp_mobilenumbernotmapped_list->TotalRecords > 0 || $vw_excp_mobilenumbernotmapped_list->isGridEdit()) { ?>
<table id="tbl_vw_excp_mobilenumbernotmappedlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_excp_mobilenumbernotmapped->RowType = ROWTYPE_HEADER;

// Render list options
$vw_excp_mobilenumbernotmapped_list->renderListOptions();

// Render list options (header, left)
$vw_excp_mobilenumbernotmapped_list->ListOptions->render("header", "left");
?>
<?php if ($vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<?php if ($vw_excp_mobilenumbernotmapped_list->SortUrl($vw_excp_mobilenumbernotmapped_list->SenderMobileNumber) == "") { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->headerCellClass() ?>"><div id="elh_vw_excp_mobilenumbernotmapped_SenderMobileNumber" class="vw_excp_mobilenumbernotmapped_SenderMobileNumber"><div class="ew-table-header-caption"><?php echo $vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_excp_mobilenumbernotmapped_list->SortUrl($vw_excp_mobilenumbernotmapped_list->SenderMobileNumber) ?>', 2);"><div id="elh_vw_excp_mobilenumbernotmapped_SenderMobileNumber" class="vw_excp_mobilenumbernotmapped_SenderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_excp_mobilenumbernotmapped_list->Number_of_SMS->Visible) { // Number_of_SMS ?>
	<?php if ($vw_excp_mobilenumbernotmapped_list->SortUrl($vw_excp_mobilenumbernotmapped_list->Number_of_SMS) == "") { ?>
		<th data-name="Number_of_SMS" class="<?php echo $vw_excp_mobilenumbernotmapped_list->Number_of_SMS->headerCellClass() ?>"><div id="elh_vw_excp_mobilenumbernotmapped_Number_of_SMS" class="vw_excp_mobilenumbernotmapped_Number_of_SMS"><div class="ew-table-header-caption"><?php echo $vw_excp_mobilenumbernotmapped_list->Number_of_SMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Number_of_SMS" class="<?php echo $vw_excp_mobilenumbernotmapped_list->Number_of_SMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_excp_mobilenumbernotmapped_list->SortUrl($vw_excp_mobilenumbernotmapped_list->Number_of_SMS) ?>', 2);"><div id="elh_vw_excp_mobilenumbernotmapped_Number_of_SMS" class="vw_excp_mobilenumbernotmapped_Number_of_SMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_excp_mobilenumbernotmapped_list->Number_of_SMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_excp_mobilenumbernotmapped_list->Number_of_SMS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_excp_mobilenumbernotmapped_list->Number_of_SMS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_excp_mobilenumbernotmapped_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_excp_mobilenumbernotmapped_list->ExportAll && $vw_excp_mobilenumbernotmapped_list->isExport()) {
	$vw_excp_mobilenumbernotmapped_list->StopRecord = $vw_excp_mobilenumbernotmapped_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_excp_mobilenumbernotmapped_list->TotalRecords > $vw_excp_mobilenumbernotmapped_list->StartRecord + $vw_excp_mobilenumbernotmapped_list->DisplayRecords - 1)
		$vw_excp_mobilenumbernotmapped_list->StopRecord = $vw_excp_mobilenumbernotmapped_list->StartRecord + $vw_excp_mobilenumbernotmapped_list->DisplayRecords - 1;
	else
		$vw_excp_mobilenumbernotmapped_list->StopRecord = $vw_excp_mobilenumbernotmapped_list->TotalRecords;
}
$vw_excp_mobilenumbernotmapped_list->RecordCount = $vw_excp_mobilenumbernotmapped_list->StartRecord - 1;
if ($vw_excp_mobilenumbernotmapped_list->Recordset && !$vw_excp_mobilenumbernotmapped_list->Recordset->EOF) {
	$vw_excp_mobilenumbernotmapped_list->Recordset->moveFirst();
	$selectLimit = $vw_excp_mobilenumbernotmapped_list->UseSelectLimit;
	if (!$selectLimit && $vw_excp_mobilenumbernotmapped_list->StartRecord > 1)
		$vw_excp_mobilenumbernotmapped_list->Recordset->move($vw_excp_mobilenumbernotmapped_list->StartRecord - 1);
} elseif (!$vw_excp_mobilenumbernotmapped->AllowAddDeleteRow && $vw_excp_mobilenumbernotmapped_list->StopRecord == 0) {
	$vw_excp_mobilenumbernotmapped_list->StopRecord = $vw_excp_mobilenumbernotmapped->GridAddRowCount;
}

// Initialize aggregate
$vw_excp_mobilenumbernotmapped->RowType = ROWTYPE_AGGREGATEINIT;
$vw_excp_mobilenumbernotmapped->resetAttributes();
$vw_excp_mobilenumbernotmapped_list->renderRow();
while ($vw_excp_mobilenumbernotmapped_list->RecordCount < $vw_excp_mobilenumbernotmapped_list->StopRecord) {
	$vw_excp_mobilenumbernotmapped_list->RecordCount++;
	if ($vw_excp_mobilenumbernotmapped_list->RecordCount >= $vw_excp_mobilenumbernotmapped_list->StartRecord) {
		$vw_excp_mobilenumbernotmapped_list->RowCount++;

		// Set up key count
		$vw_excp_mobilenumbernotmapped_list->KeyCount = $vw_excp_mobilenumbernotmapped_list->RowIndex;

		// Init row class and style
		$vw_excp_mobilenumbernotmapped->resetAttributes();
		$vw_excp_mobilenumbernotmapped->CssClass = "";
		if ($vw_excp_mobilenumbernotmapped_list->isGridAdd()) {
		} else {
			$vw_excp_mobilenumbernotmapped_list->loadRowValues($vw_excp_mobilenumbernotmapped_list->Recordset); // Load row values
		}
		$vw_excp_mobilenumbernotmapped->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_excp_mobilenumbernotmapped->RowAttrs->merge(["data-rowindex" => $vw_excp_mobilenumbernotmapped_list->RowCount, "id" => "r" . $vw_excp_mobilenumbernotmapped_list->RowCount . "_vw_excp_mobilenumbernotmapped", "data-rowtype" => $vw_excp_mobilenumbernotmapped->RowType]);

		// Render row
		$vw_excp_mobilenumbernotmapped_list->renderRow();

		// Render list options
		$vw_excp_mobilenumbernotmapped_list->renderListOptions();
?>
	<tr <?php echo $vw_excp_mobilenumbernotmapped->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_excp_mobilenumbernotmapped_list->ListOptions->render("body", "left", $vw_excp_mobilenumbernotmapped_list->RowCount);
?>
	<?php if ($vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber" <?php echo $vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_excp_mobilenumbernotmapped_list->RowCount ?>_vw_excp_mobilenumbernotmapped_SenderMobileNumber">
<span<?php echo $vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->viewAttributes() ?>><?php echo $vw_excp_mobilenumbernotmapped_list->SenderMobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_excp_mobilenumbernotmapped_list->Number_of_SMS->Visible) { // Number_of_SMS ?>
		<td data-name="Number_of_SMS" <?php echo $vw_excp_mobilenumbernotmapped_list->Number_of_SMS->cellAttributes() ?>>
<span id="el<?php echo $vw_excp_mobilenumbernotmapped_list->RowCount ?>_vw_excp_mobilenumbernotmapped_Number_of_SMS">
<span<?php echo $vw_excp_mobilenumbernotmapped_list->Number_of_SMS->viewAttributes() ?>><?php echo $vw_excp_mobilenumbernotmapped_list->Number_of_SMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_excp_mobilenumbernotmapped_list->ListOptions->render("body", "right", $vw_excp_mobilenumbernotmapped_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_excp_mobilenumbernotmapped_list->isGridAdd())
		$vw_excp_mobilenumbernotmapped_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_excp_mobilenumbernotmapped->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_excp_mobilenumbernotmapped_list->Recordset)
	$vw_excp_mobilenumbernotmapped_list->Recordset->Close();
?>
<?php if (!$vw_excp_mobilenumbernotmapped_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_excp_mobilenumbernotmapped_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_excp_mobilenumbernotmapped_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_excp_mobilenumbernotmapped_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_excp_mobilenumbernotmapped_list->TotalRecords == 0 && !$vw_excp_mobilenumbernotmapped->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_excp_mobilenumbernotmapped_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_excp_mobilenumbernotmapped_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_excp_mobilenumbernotmapped_list->isExport()) { ?>
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
$vw_excp_mobilenumbernotmapped_list->terminate();
?>