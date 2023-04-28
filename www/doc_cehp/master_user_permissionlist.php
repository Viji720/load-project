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
$master_user_permission_list = new master_user_permission_list();

// Run the page
$master_user_permission_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_permission_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_user_permission_list->isExport()) { ?>
<script>
var fmaster_user_permissionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_user_permissionlist = currentForm = new ew.Form("fmaster_user_permissionlist", "list");
	fmaster_user_permissionlist.formKeyCountName = '<?php echo $master_user_permission_list->FormKeyCountName ?>';
	loadjs.done("fmaster_user_permissionlist");
});
var fmaster_user_permissionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_user_permissionlistsrch = currentSearchForm = new ew.Form("fmaster_user_permissionlistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_user_permissionlistsrch.filterList = <?php echo $master_user_permission_list->getFilterList() ?>;
	loadjs.done("fmaster_user_permissionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_user_permission_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_user_permission_list->TotalRecords > 0 && $master_user_permission_list->ExportOptions->visible()) { ?>
<?php $master_user_permission_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_permission_list->ImportOptions->visible()) { ?>
<?php $master_user_permission_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_permission_list->SearchOptions->visible()) { ?>
<?php $master_user_permission_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_permission_list->FilterOptions->visible()) { ?>
<?php $master_user_permission_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_user_permission_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_user_permission_list->isExport() && !$master_user_permission->CurrentAction) { ?>
<form name="fmaster_user_permissionlistsrch" id="fmaster_user_permissionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_user_permissionlistsrch-search-panel" class="<?php echo $master_user_permission_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_user_permission">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_user_permission_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_user_permission_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_user_permission_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_user_permission_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_user_permission_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_user_permission_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_user_permission_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_user_permission_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_user_permission_list->showPageHeader(); ?>
<?php
$master_user_permission_list->showMessage();
?>
<?php if ($master_user_permission_list->TotalRecords > 0 || $master_user_permission->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_user_permission_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_user_permission">
<?php if (!$master_user_permission_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_user_permission_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_user_permission_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_user_permission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_user_permissionlist" id="fmaster_user_permissionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user_permission">
<div id="gmp_master_user_permission" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_user_permission_list->TotalRecords > 0 || $master_user_permission_list->isGridEdit()) { ?>
<table id="tbl_master_user_permissionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_user_permission->RowType = ROWTYPE_HEADER;

// Render list options
$master_user_permission_list->renderListOptions();

// Render list options (header, left)
$master_user_permission_list->ListOptions->render("header", "left");
?>
<?php if ($master_user_permission_list->userlevelid->Visible) { // userlevelid ?>
	<?php if ($master_user_permission_list->SortUrl($master_user_permission_list->userlevelid) == "") { ?>
		<th data-name="userlevelid" class="<?php echo $master_user_permission_list->userlevelid->headerCellClass() ?>"><div id="elh_master_user_permission_userlevelid" class="master_user_permission_userlevelid"><div class="ew-table-header-caption"><?php echo $master_user_permission_list->userlevelid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelid" class="<?php echo $master_user_permission_list->userlevelid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_permission_list->SortUrl($master_user_permission_list->userlevelid) ?>', 2);"><div id="elh_master_user_permission_userlevelid" class="master_user_permission_userlevelid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_permission_list->userlevelid->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_permission_list->userlevelid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_permission_list->userlevelid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_permission_list->_tablename->Visible) { // tablename ?>
	<?php if ($master_user_permission_list->SortUrl($master_user_permission_list->_tablename) == "") { ?>
		<th data-name="_tablename" class="<?php echo $master_user_permission_list->_tablename->headerCellClass() ?>"><div id="elh_master_user_permission__tablename" class="master_user_permission__tablename"><div class="ew-table-header-caption"><?php echo $master_user_permission_list->_tablename->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_tablename" class="<?php echo $master_user_permission_list->_tablename->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_permission_list->SortUrl($master_user_permission_list->_tablename) ?>', 2);"><div id="elh_master_user_permission__tablename" class="master_user_permission__tablename">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_permission_list->_tablename->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_user_permission_list->_tablename->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_permission_list->_tablename->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_permission_list->permission->Visible) { // permission ?>
	<?php if ($master_user_permission_list->SortUrl($master_user_permission_list->permission) == "") { ?>
		<th data-name="permission" class="<?php echo $master_user_permission_list->permission->headerCellClass() ?>"><div id="elh_master_user_permission_permission" class="master_user_permission_permission"><div class="ew-table-header-caption"><?php echo $master_user_permission_list->permission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="permission" class="<?php echo $master_user_permission_list->permission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_permission_list->SortUrl($master_user_permission_list->permission) ?>', 2);"><div id="elh_master_user_permission_permission" class="master_user_permission_permission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_permission_list->permission->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_permission_list->permission->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_permission_list->permission->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_user_permission_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_user_permission_list->ExportAll && $master_user_permission_list->isExport()) {
	$master_user_permission_list->StopRecord = $master_user_permission_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_user_permission_list->TotalRecords > $master_user_permission_list->StartRecord + $master_user_permission_list->DisplayRecords - 1)
		$master_user_permission_list->StopRecord = $master_user_permission_list->StartRecord + $master_user_permission_list->DisplayRecords - 1;
	else
		$master_user_permission_list->StopRecord = $master_user_permission_list->TotalRecords;
}
$master_user_permission_list->RecordCount = $master_user_permission_list->StartRecord - 1;
if ($master_user_permission_list->Recordset && !$master_user_permission_list->Recordset->EOF) {
	$master_user_permission_list->Recordset->moveFirst();
	$selectLimit = $master_user_permission_list->UseSelectLimit;
	if (!$selectLimit && $master_user_permission_list->StartRecord > 1)
		$master_user_permission_list->Recordset->move($master_user_permission_list->StartRecord - 1);
} elseif (!$master_user_permission->AllowAddDeleteRow && $master_user_permission_list->StopRecord == 0) {
	$master_user_permission_list->StopRecord = $master_user_permission->GridAddRowCount;
}

// Initialize aggregate
$master_user_permission->RowType = ROWTYPE_AGGREGATEINIT;
$master_user_permission->resetAttributes();
$master_user_permission_list->renderRow();
while ($master_user_permission_list->RecordCount < $master_user_permission_list->StopRecord) {
	$master_user_permission_list->RecordCount++;
	if ($master_user_permission_list->RecordCount >= $master_user_permission_list->StartRecord) {
		$master_user_permission_list->RowCount++;

		// Set up key count
		$master_user_permission_list->KeyCount = $master_user_permission_list->RowIndex;

		// Init row class and style
		$master_user_permission->resetAttributes();
		$master_user_permission->CssClass = "";
		if ($master_user_permission_list->isGridAdd()) {
		} else {
			$master_user_permission_list->loadRowValues($master_user_permission_list->Recordset); // Load row values
		}
		$master_user_permission->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_user_permission->RowAttrs->merge(["data-rowindex" => $master_user_permission_list->RowCount, "id" => "r" . $master_user_permission_list->RowCount . "_master_user_permission", "data-rowtype" => $master_user_permission->RowType]);

		// Render row
		$master_user_permission_list->renderRow();

		// Render list options
		$master_user_permission_list->renderListOptions();
?>
	<tr <?php echo $master_user_permission->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_user_permission_list->ListOptions->render("body", "left", $master_user_permission_list->RowCount);
?>
	<?php if ($master_user_permission_list->userlevelid->Visible) { // userlevelid ?>
		<td data-name="userlevelid" <?php echo $master_user_permission_list->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $master_user_permission_list->RowCount ?>_master_user_permission_userlevelid">
<span<?php echo $master_user_permission_list->userlevelid->viewAttributes() ?>><?php echo $master_user_permission_list->userlevelid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_permission_list->_tablename->Visible) { // tablename ?>
		<td data-name="_tablename" <?php echo $master_user_permission_list->_tablename->cellAttributes() ?>>
<span id="el<?php echo $master_user_permission_list->RowCount ?>_master_user_permission__tablename">
<span<?php echo $master_user_permission_list->_tablename->viewAttributes() ?>><?php echo $master_user_permission_list->_tablename->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_permission_list->permission->Visible) { // permission ?>
		<td data-name="permission" <?php echo $master_user_permission_list->permission->cellAttributes() ?>>
<span id="el<?php echo $master_user_permission_list->RowCount ?>_master_user_permission_permission">
<span<?php echo $master_user_permission_list->permission->viewAttributes() ?>><?php echo $master_user_permission_list->permission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_user_permission_list->ListOptions->render("body", "right", $master_user_permission_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_user_permission_list->isGridAdd())
		$master_user_permission_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_user_permission->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_user_permission_list->Recordset)
	$master_user_permission_list->Recordset->Close();
?>
<?php if (!$master_user_permission_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_user_permission_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_user_permission_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_user_permission_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_user_permission_list->TotalRecords == 0 && !$master_user_permission->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_user_permission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_user_permission_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_user_permission_list->isExport()) { ?>
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
$master_user_permission_list->terminate();
?>