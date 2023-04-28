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
$master_user_list = new master_user_list();

// Run the page
$master_user_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_user_list->isExport()) { ?>
<script>
var fmaster_userlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_userlist = currentForm = new ew.Form("fmaster_userlist", "list");
	fmaster_userlist.formKeyCountName = '<?php echo $master_user_list->FormKeyCountName ?>';
	loadjs.done("fmaster_userlist");
});
var fmaster_userlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_userlistsrch = currentSearchForm = new ew.Form("fmaster_userlistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_userlistsrch.filterList = <?php echo $master_user_list->getFilterList() ?>;
	loadjs.done("fmaster_userlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_user_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_user_list->TotalRecords > 0 && $master_user_list->ExportOptions->visible()) { ?>
<?php $master_user_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_list->ImportOptions->visible()) { ?>
<?php $master_user_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_list->SearchOptions->visible()) { ?>
<?php $master_user_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_user_list->FilterOptions->visible()) { ?>
<?php $master_user_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_user_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_user_list->isExport() && !$master_user->CurrentAction) { ?>
<form name="fmaster_userlistsrch" id="fmaster_userlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_userlistsrch-search-panel" class="<?php echo $master_user_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_user">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_user_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_user_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_user_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_user_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_user_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_user_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_user_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_user_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_user_list->showPageHeader(); ?>
<?php
$master_user_list->showMessage();
?>
<?php if ($master_user_list->TotalRecords > 0 || $master_user->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_user_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_user">
<?php if (!$master_user_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_user_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_user_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_user_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_userlist" id="fmaster_userlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user">
<div id="gmp_master_user" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_user_list->TotalRecords > 0 || $master_user_list->isGridEdit()) { ?>
<table id="tbl_master_userlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_user->RowType = ROWTYPE_HEADER;

// Render list options
$master_user_list->renderListOptions();

// Render list options (header, left)
$master_user_list->ListOptions->render("header", "left");
?>
<?php if ($master_user_list->_UserId->Visible) { // UserId ?>
	<?php if ($master_user_list->SortUrl($master_user_list->_UserId) == "") { ?>
		<th data-name="_UserId" class="<?php echo $master_user_list->_UserId->headerCellClass() ?>"><div id="elh_master_user__UserId" class="master_user__UserId"><div class="ew-table-header-caption"><?php echo $master_user_list->_UserId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_UserId" class="<?php echo $master_user_list->_UserId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->_UserId) ?>', 2);"><div id="elh_master_user__UserId" class="master_user__UserId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->_UserId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->_UserId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->_UserId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->UserName->Visible) { // UserName ?>
	<?php if ($master_user_list->SortUrl($master_user_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $master_user_list->UserName->headerCellClass() ?>"><div id="elh_master_user_UserName" class="master_user_UserName"><div class="ew-table-header-caption"><?php echo $master_user_list->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $master_user_list->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->UserName) ?>', 2);"><div id="elh_master_user_UserName" class="master_user_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->StationId->Visible) { // StationId ?>
	<?php if ($master_user_list->SortUrl($master_user_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $master_user_list->StationId->headerCellClass() ?>"><div id="elh_master_user_StationId" class="master_user_StationId"><div class="ew-table-header-caption"><?php echo $master_user_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $master_user_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->StationId) ?>', 2);"><div id="elh_master_user_StationId" class="master_user_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->TalukId->Visible) { // TalukId ?>
	<?php if ($master_user_list->SortUrl($master_user_list->TalukId) == "") { ?>
		<th data-name="TalukId" class="<?php echo $master_user_list->TalukId->headerCellClass() ?>"><div id="elh_master_user_TalukId" class="master_user_TalukId"><div class="ew-table-header-caption"><?php echo $master_user_list->TalukId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukId" class="<?php echo $master_user_list->TalukId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->TalukId) ?>', 2);"><div id="elh_master_user_TalukId" class="master_user_TalukId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->TalukId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->TalukId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->TalukId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->DistrictId->Visible) { // DistrictId ?>
	<?php if ($master_user_list->SortUrl($master_user_list->DistrictId) == "") { ?>
		<th data-name="DistrictId" class="<?php echo $master_user_list->DistrictId->headerCellClass() ?>"><div id="elh_master_user_DistrictId" class="master_user_DistrictId"><div class="ew-table-header-caption"><?php echo $master_user_list->DistrictId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictId" class="<?php echo $master_user_list->DistrictId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->DistrictId) ?>', 2);"><div id="elh_master_user_DistrictId" class="master_user_DistrictId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->DistrictId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->DistrictId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->DistrictId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->SubDivsionId->Visible) { // SubDivsionId ?>
	<?php if ($master_user_list->SortUrl($master_user_list->SubDivsionId) == "") { ?>
		<th data-name="SubDivsionId" class="<?php echo $master_user_list->SubDivsionId->headerCellClass() ?>"><div id="elh_master_user_SubDivsionId" class="master_user_SubDivsionId"><div class="ew-table-header-caption"><?php echo $master_user_list->SubDivsionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivsionId" class="<?php echo $master_user_list->SubDivsionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->SubDivsionId) ?>', 2);"><div id="elh_master_user_SubDivsionId" class="master_user_SubDivsionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->SubDivsionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->SubDivsionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->SubDivsionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->DivisionId->Visible) { // DivisionId ?>
	<?php if ($master_user_list->SortUrl($master_user_list->DivisionId) == "") { ?>
		<th data-name="DivisionId" class="<?php echo $master_user_list->DivisionId->headerCellClass() ?>"><div id="elh_master_user_DivisionId" class="master_user_DivisionId"><div class="ew-table-header-caption"><?php echo $master_user_list->DivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DivisionId" class="<?php echo $master_user_list->DivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->DivisionId) ?>', 2);"><div id="elh_master_user_DivisionId" class="master_user_DivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->DivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->DivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->DivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->RoleId->Visible) { // RoleId ?>
	<?php if ($master_user_list->SortUrl($master_user_list->RoleId) == "") { ?>
		<th data-name="RoleId" class="<?php echo $master_user_list->RoleId->headerCellClass() ?>"><div id="elh_master_user_RoleId" class="master_user_RoleId"><div class="ew-table-header-caption"><?php echo $master_user_list->RoleId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoleId" class="<?php echo $master_user_list->RoleId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->RoleId) ?>', 2);"><div id="elh_master_user_RoleId" class="master_user_RoleId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->RoleId->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->RoleId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->RoleId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->UserPassword->Visible) { // UserPassword ?>
	<?php if ($master_user_list->SortUrl($master_user_list->UserPassword) == "") { ?>
		<th data-name="UserPassword" class="<?php echo $master_user_list->UserPassword->headerCellClass() ?>"><div id="elh_master_user_UserPassword" class="master_user_UserPassword"><div class="ew-table-header-caption"><?php echo $master_user_list->UserPassword->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserPassword" class="<?php echo $master_user_list->UserPassword->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->UserPassword) ?>', 2);"><div id="elh_master_user_UserPassword" class="master_user_UserPassword">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->UserPassword->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->UserPassword->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->UserPassword->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->UserEmail->Visible) { // UserEmail ?>
	<?php if ($master_user_list->SortUrl($master_user_list->UserEmail) == "") { ?>
		<th data-name="UserEmail" class="<?php echo $master_user_list->UserEmail->headerCellClass() ?>"><div id="elh_master_user_UserEmail" class="master_user_UserEmail"><div class="ew-table-header-caption"><?php echo $master_user_list->UserEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserEmail" class="<?php echo $master_user_list->UserEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->UserEmail) ?>', 2);"><div id="elh_master_user_UserEmail" class="master_user_UserEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->UserEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->UserEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->UserEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_user_list->UserMobileNumber->Visible) { // UserMobileNumber ?>
	<?php if ($master_user_list->SortUrl($master_user_list->UserMobileNumber) == "") { ?>
		<th data-name="UserMobileNumber" class="<?php echo $master_user_list->UserMobileNumber->headerCellClass() ?>"><div id="elh_master_user_UserMobileNumber" class="master_user_UserMobileNumber"><div class="ew-table-header-caption"><?php echo $master_user_list->UserMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserMobileNumber" class="<?php echo $master_user_list->UserMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_user_list->SortUrl($master_user_list->UserMobileNumber) ?>', 2);"><div id="elh_master_user_UserMobileNumber" class="master_user_UserMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_user_list->UserMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_user_list->UserMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_user_list->UserMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_user_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_user_list->ExportAll && $master_user_list->isExport()) {
	$master_user_list->StopRecord = $master_user_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_user_list->TotalRecords > $master_user_list->StartRecord + $master_user_list->DisplayRecords - 1)
		$master_user_list->StopRecord = $master_user_list->StartRecord + $master_user_list->DisplayRecords - 1;
	else
		$master_user_list->StopRecord = $master_user_list->TotalRecords;
}
$master_user_list->RecordCount = $master_user_list->StartRecord - 1;
if ($master_user_list->Recordset && !$master_user_list->Recordset->EOF) {
	$master_user_list->Recordset->moveFirst();
	$selectLimit = $master_user_list->UseSelectLimit;
	if (!$selectLimit && $master_user_list->StartRecord > 1)
		$master_user_list->Recordset->move($master_user_list->StartRecord - 1);
} elseif (!$master_user->AllowAddDeleteRow && $master_user_list->StopRecord == 0) {
	$master_user_list->StopRecord = $master_user->GridAddRowCount;
}

// Initialize aggregate
$master_user->RowType = ROWTYPE_AGGREGATEINIT;
$master_user->resetAttributes();
$master_user_list->renderRow();
while ($master_user_list->RecordCount < $master_user_list->StopRecord) {
	$master_user_list->RecordCount++;
	if ($master_user_list->RecordCount >= $master_user_list->StartRecord) {
		$master_user_list->RowCount++;

		// Set up key count
		$master_user_list->KeyCount = $master_user_list->RowIndex;

		// Init row class and style
		$master_user->resetAttributes();
		$master_user->CssClass = "";
		if ($master_user_list->isGridAdd()) {
		} else {
			$master_user_list->loadRowValues($master_user_list->Recordset); // Load row values
		}
		$master_user->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_user->RowAttrs->merge(["data-rowindex" => $master_user_list->RowCount, "id" => "r" . $master_user_list->RowCount . "_master_user", "data-rowtype" => $master_user->RowType]);

		// Render row
		$master_user_list->renderRow();

		// Render list options
		$master_user_list->renderListOptions();
?>
	<tr <?php echo $master_user->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_user_list->ListOptions->render("body", "left", $master_user_list->RowCount);
?>
	<?php if ($master_user_list->_UserId->Visible) { // UserId ?>
		<td data-name="_UserId" <?php echo $master_user_list->_UserId->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user__UserId">
<span<?php echo $master_user_list->_UserId->viewAttributes() ?>><?php echo $master_user_list->_UserId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $master_user_list->UserName->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_UserName">
<span<?php echo $master_user_list->UserName->viewAttributes() ?>><?php echo $master_user_list->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $master_user_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_StationId">
<span<?php echo $master_user_list->StationId->viewAttributes() ?>><?php echo $master_user_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->TalukId->Visible) { // TalukId ?>
		<td data-name="TalukId" <?php echo $master_user_list->TalukId->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_TalukId">
<span<?php echo $master_user_list->TalukId->viewAttributes() ?>><?php echo $master_user_list->TalukId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->DistrictId->Visible) { // DistrictId ?>
		<td data-name="DistrictId" <?php echo $master_user_list->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_DistrictId">
<span<?php echo $master_user_list->DistrictId->viewAttributes() ?>><?php echo $master_user_list->DistrictId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->SubDivsionId->Visible) { // SubDivsionId ?>
		<td data-name="SubDivsionId" <?php echo $master_user_list->SubDivsionId->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_SubDivsionId">
<span<?php echo $master_user_list->SubDivsionId->viewAttributes() ?>><?php echo $master_user_list->SubDivsionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->DivisionId->Visible) { // DivisionId ?>
		<td data-name="DivisionId" <?php echo $master_user_list->DivisionId->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_DivisionId">
<span<?php echo $master_user_list->DivisionId->viewAttributes() ?>><?php echo $master_user_list->DivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->RoleId->Visible) { // RoleId ?>
		<td data-name="RoleId" <?php echo $master_user_list->RoleId->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_RoleId">
<span<?php echo $master_user_list->RoleId->viewAttributes() ?>><?php echo $master_user_list->RoleId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->UserPassword->Visible) { // UserPassword ?>
		<td data-name="UserPassword" <?php echo $master_user_list->UserPassword->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_UserPassword">
<span<?php echo $master_user_list->UserPassword->viewAttributes() ?>><?php echo $master_user_list->UserPassword->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->UserEmail->Visible) { // UserEmail ?>
		<td data-name="UserEmail" <?php echo $master_user_list->UserEmail->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_UserEmail">
<span<?php echo $master_user_list->UserEmail->viewAttributes() ?>><?php echo $master_user_list->UserEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_user_list->UserMobileNumber->Visible) { // UserMobileNumber ?>
		<td data-name="UserMobileNumber" <?php echo $master_user_list->UserMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $master_user_list->RowCount ?>_master_user_UserMobileNumber">
<span<?php echo $master_user_list->UserMobileNumber->viewAttributes() ?>><?php echo $master_user_list->UserMobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_user_list->ListOptions->render("body", "right", $master_user_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_user_list->isGridAdd())
		$master_user_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_user->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_user_list->Recordset)
	$master_user_list->Recordset->Close();
?>
<?php if (!$master_user_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_user_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_user_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_user_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_user_list->TotalRecords == 0 && !$master_user->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_user_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_user_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_user_list->isExport()) { ?>
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
$master_user_list->terminate();
?>