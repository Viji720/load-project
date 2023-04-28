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
$master_user_roles_list = new master_user_roles_list();

// Run the page
$master_user_roles_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_roles_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_user_roles_list->isExport()) { ?>
<script>
var fmaster_user_roleslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_user_roleslist = currentForm = new ew.Form("fmaster_user_roleslist", "list");
	fmaster_user_roleslist.formKeyCountName = '<?php echo $master_user_roles_list->FormKeyCountName ?>';
	loadjs.done("fmaster_user_roleslist");
});
var fmaster_user_roleslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_user_roleslistsrch = currentSearchForm = new ew.Form("fmaster_user_roleslistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_user_roleslistsrch.filterList = <?php echo $master_user_roles_list->getFilterList() ?>;
	loadjs.done("fmaster_user_roleslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_user_roles_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_user_roles_list->TotalRecords > 0 && $master_user_roles_list->ExportOptions->visible()) { ?>
<?php $master_user_roles_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_roles_list->ImportOptions->visible()) { ?>
<?php $master_user_roles_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_roles_list->SearchOptions->visible()) { ?>
<?php $master_user_roles_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_roles_list->FilterOptions->visible()) { ?>
<?php $master_user_roles_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_user_roles_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_user_roles_list->isExport() && !$master_user_roles->CurrentAction) { ?>
<form name="fmaster_user_roleslistsrch" id="fmaster_user_roleslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_user_roleslistsrch-search-panel" class="<?php echo $master_user_roles_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_user_roles">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_user_roles_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_user_roles_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_user_roles_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_user_roles_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_user_roles_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_user_roles_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_user_roles_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_user_roles_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_user_roles_list->showPageHeader(); ?>
<?php
$master_user_roles_list->showMessage();
?>
<?php if ($master_user_roles_list->TotalRecords > 0 || $master_user_roles->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_user_roles_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_user_roles">
<?php if (!$master_user_roles_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_user_roles_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_user_roles_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_user_roles_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_user_roleslist" id="fmaster_user_roleslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user_roles">
<div id="gmp_master_user_roles" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_user_roles_list->TotalRecords > 0 || $master_user_roles_list->isGridEdit()) { ?>
<table id="tbl_master_user_roleslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_user_roles->RowType = ROWTYPE_HEADER;

// Render list options
$master_user_roles_list->renderListOptions();

// Render list options (header, left)
$master_user_roles_list->ListOptions->render("header", "left");
?>
<?php if ($master_user_roles_list->RoleId->Visible) { // RoleId ?>
	<?php if ($master_user_roles_list->SortUrl($master_user_roles_list->RoleId) == "") { ?>
		<th data-name="RoleId" class="<?php echo $master_user_roles_list->RoleId->headerCellClass() ?>"><div id="elh_master_user_roles_RoleId" class="master_user_roles_RoleId"><div class="ew-table-header-caption"><?php echo $master_user_roles_list->RoleId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoleId" class="<?php echo $master_user_roles_list->RoleId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_roles_list->SortUrl($master_user_roles_list->RoleId) ?>', 2);"><div id="elh_master_user_roles_RoleId" class="master_user_roles_RoleId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_roles_list->RoleId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_roles_list->RoleId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_roles_list->RoleId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_roles_list->RoleName->Visible) { // RoleName ?>
	<?php if ($master_user_roles_list->SortUrl($master_user_roles_list->RoleName) == "") { ?>
		<th data-name="RoleName" class="<?php echo $master_user_roles_list->RoleName->headerCellClass() ?>"><div id="elh_master_user_roles_RoleName" class="master_user_roles_RoleName"><div class="ew-table-header-caption"><?php echo $master_user_roles_list->RoleName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoleName" class="<?php echo $master_user_roles_list->RoleName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_roles_list->SortUrl($master_user_roles_list->RoleName) ?>', 2);"><div id="elh_master_user_roles_RoleName" class="master_user_roles_RoleName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_roles_list->RoleName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_user_roles_list->RoleName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_roles_list->RoleName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_user_roles_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_user_roles_list->ExportAll && $master_user_roles_list->isExport()) {
	$master_user_roles_list->StopRecord = $master_user_roles_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_user_roles_list->TotalRecords > $master_user_roles_list->StartRecord + $master_user_roles_list->DisplayRecords - 1)
		$master_user_roles_list->StopRecord = $master_user_roles_list->StartRecord + $master_user_roles_list->DisplayRecords - 1;
	else
		$master_user_roles_list->StopRecord = $master_user_roles_list->TotalRecords;
}
$master_user_roles_list->RecordCount = $master_user_roles_list->StartRecord - 1;
if ($master_user_roles_list->Recordset && !$master_user_roles_list->Recordset->EOF) {
	$master_user_roles_list->Recordset->moveFirst();
	$selectLimit = $master_user_roles_list->UseSelectLimit;
	if (!$selectLimit && $master_user_roles_list->StartRecord > 1)
		$master_user_roles_list->Recordset->move($master_user_roles_list->StartRecord - 1);
} elseif (!$master_user_roles->AllowAddDeleteRow && $master_user_roles_list->StopRecord == 0) {
	$master_user_roles_list->StopRecord = $master_user_roles->GridAddRowCount;
}

// Initialize aggregate
$master_user_roles->RowType = ROWTYPE_AGGREGATEINIT;
$master_user_roles->resetAttributes();
$master_user_roles_list->renderRow();
while ($master_user_roles_list->RecordCount < $master_user_roles_list->StopRecord) {
	$master_user_roles_list->RecordCount++;
	if ($master_user_roles_list->RecordCount >= $master_user_roles_list->StartRecord) {
		$master_user_roles_list->RowCount++;

		// Set up key count
		$master_user_roles_list->KeyCount = $master_user_roles_list->RowIndex;

		// Init row class and style
		$master_user_roles->resetAttributes();
		$master_user_roles->CssClass = "";
		if ($master_user_roles_list->isGridAdd()) {
		} else {
			$master_user_roles_list->loadRowValues($master_user_roles_list->Recordset); // Load row values
		}
		$master_user_roles->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_user_roles->RowAttrs->merge(["data-rowindex" => $master_user_roles_list->RowCount, "id" => "r" . $master_user_roles_list->RowCount . "_master_user_roles", "data-rowtype" => $master_user_roles->RowType]);

		// Render row
		$master_user_roles_list->renderRow();

		// Render list options
		$master_user_roles_list->renderListOptions();
?>
	<tr <?php echo $master_user_roles->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_user_roles_list->ListOptions->render("body", "left", $master_user_roles_list->RowCount);
?>
	<?php if ($master_user_roles_list->RoleId->Visible) { // RoleId ?>
		<td data-name="RoleId" <?php echo $master_user_roles_list->RoleId->cellAttributes() ?>>
<span id="el<?php echo $master_user_roles_list->RowCount ?>_master_user_roles_RoleId">
<span<?php echo $master_user_roles_list->RoleId->viewAttributes() ?>><?php echo $master_user_roles_list->RoleId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_roles_list->RoleName->Visible) { // RoleName ?>
		<td data-name="RoleName" <?php echo $master_user_roles_list->RoleName->cellAttributes() ?>>
<span id="el<?php echo $master_user_roles_list->RowCount ?>_master_user_roles_RoleName">
<span<?php echo $master_user_roles_list->RoleName->viewAttributes() ?>><?php echo $master_user_roles_list->RoleName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_user_roles_list->ListOptions->render("body", "right", $master_user_roles_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_user_roles_list->isGridAdd())
		$master_user_roles_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_user_roles->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_user_roles_list->Recordset)
	$master_user_roles_list->Recordset->Close();
?>
<?php if (!$master_user_roles_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_user_roles_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_user_roles_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_user_roles_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_user_roles_list->TotalRecords == 0 && !$master_user_roles->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_user_roles_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_user_roles_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_user_roles_list->isExport()) { ?>
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
$master_user_roles_list->terminate();
?>