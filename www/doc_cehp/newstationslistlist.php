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
$newstationslist_list = new newstationslist_list();

// Run the page
$newstationslist_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$newstationslist_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$newstationslist_list->isExport()) { ?>
<script>
var fnewstationslistlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fnewstationslistlist = currentForm = new ew.Form("fnewstationslistlist", "list");
	fnewstationslistlist.formKeyCountName = '<?php echo $newstationslist_list->FormKeyCountName ?>';
	loadjs.done("fnewstationslistlist");
});
var fnewstationslistlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fnewstationslistlistsrch = currentSearchForm = new ew.Form("fnewstationslistlistsrch");

	// Dynamic selection lists
	// Filters

	fnewstationslistlistsrch.filterList = <?php echo $newstationslist_list->getFilterList() ?>;
	loadjs.done("fnewstationslistlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$newstationslist_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($newstationslist_list->TotalRecords > 0 && $newstationslist_list->ExportOptions->visible()) { ?>
<?php $newstationslist_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($newstationslist_list->ImportOptions->visible()) { ?>
<?php $newstationslist_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($newstationslist_list->SearchOptions->visible()) { ?>
<?php $newstationslist_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($newstationslist_list->FilterOptions->visible()) { ?>
<?php $newstationslist_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$newstationslist_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$newstationslist_list->isExport() && !$newstationslist->CurrentAction) { ?>
<form name="fnewstationslistlistsrch" id="fnewstationslistlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fnewstationslistlistsrch-search-panel" class="<?php echo $newstationslist_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="newstationslist">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $newstationslist_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($newstationslist_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($newstationslist_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $newstationslist_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($newstationslist_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($newstationslist_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($newstationslist_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($newstationslist_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $newstationslist_list->showPageHeader(); ?>
<?php
$newstationslist_list->showMessage();
?>
<?php if ($newstationslist_list->TotalRecords > 0 || $newstationslist->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($newstationslist_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> newstationslist">
<?php if (!$newstationslist_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$newstationslist_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $newstationslist_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $newstationslist_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fnewstationslistlist" id="fnewstationslistlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="newstationslist">
<div id="gmp_newstationslist" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($newstationslist_list->TotalRecords > 0 || $newstationslist_list->isGridEdit()) { ?>
<table id="tbl_newstationslistlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$newstationslist->RowType = ROWTYPE_HEADER;

// Render list options
$newstationslist_list->renderListOptions();

// Render list options (header, left)
$newstationslist_list->ListOptions->render("header", "left");
?>
<?php if ($newstationslist_list->StationName->Visible) { // StationName ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->StationName) == "") { ?>
		<th data-name="StationName" class="<?php echo $newstationslist_list->StationName->headerCellClass() ?>"><div id="elh_newstationslist_StationName" class="newstationslist_StationName"><div class="ew-table-header-caption"><?php echo $newstationslist_list->StationName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationName" class="<?php echo $newstationslist_list->StationName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->StationName) ?>', 2);"><div id="elh_newstationslist_StationName" class="newstationslist_StationName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->StationName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->StationName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->StationName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->District->Visible) { // District ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->District) == "") { ?>
		<th data-name="District" class="<?php echo $newstationslist_list->District->headerCellClass() ?>"><div id="elh_newstationslist_District" class="newstationslist_District"><div class="ew-table-header-caption"><?php echo $newstationslist_list->District->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="District" class="<?php echo $newstationslist_list->District->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->District) ?>', 2);"><div id="elh_newstationslist_District" class="newstationslist_District">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->District->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->District->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->District->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->Taluk->Visible) { // Taluk ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->Taluk) == "") { ?>
		<th data-name="Taluk" class="<?php echo $newstationslist_list->Taluk->headerCellClass() ?>"><div id="elh_newstationslist_Taluk" class="newstationslist_Taluk"><div class="ew-table-header-caption"><?php echo $newstationslist_list->Taluk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Taluk" class="<?php echo $newstationslist_list->Taluk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->Taluk) ?>', 2);"><div id="elh_newstationslist_Taluk" class="newstationslist_Taluk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->Taluk->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->Taluk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->Taluk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->NameofSubDivision->Visible) { // NameofSubDivision ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->NameofSubDivision) == "") { ?>
		<th data-name="NameofSubDivision" class="<?php echo $newstationslist_list->NameofSubDivision->headerCellClass() ?>"><div id="elh_newstationslist_NameofSubDivision" class="newstationslist_NameofSubDivision"><div class="ew-table-header-caption"><?php echo $newstationslist_list->NameofSubDivision->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NameofSubDivision" class="<?php echo $newstationslist_list->NameofSubDivision->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->NameofSubDivision) ?>', 2);"><div id="elh_newstationslist_NameofSubDivision" class="newstationslist_NameofSubDivision">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->NameofSubDivision->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->NameofSubDivision->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->NameofSubDivision->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->TypeofStation->Visible) { // TypeofStation ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->TypeofStation) == "") { ?>
		<th data-name="TypeofStation" class="<?php echo $newstationslist_list->TypeofStation->headerCellClass() ?>"><div id="elh_newstationslist_TypeofStation" class="newstationslist_TypeofStation"><div class="ew-table-header-caption"><?php echo $newstationslist_list->TypeofStation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeofStation" class="<?php echo $newstationslist_list->TypeofStation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->TypeofStation) ?>', 2);"><div id="elh_newstationslist_TypeofStation" class="newstationslist_TypeofStation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->TypeofStation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->TypeofStation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->TypeofStation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->BasinName->Visible) { // BasinName ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->BasinName) == "") { ?>
		<th data-name="BasinName" class="<?php echo $newstationslist_list->BasinName->headerCellClass() ?>"><div id="elh_newstationslist_BasinName" class="newstationslist_BasinName"><div class="ew-table-header-caption"><?php echo $newstationslist_list->BasinName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinName" class="<?php echo $newstationslist_list->BasinName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->BasinName) ?>', 2);"><div id="elh_newstationslist_BasinName" class="newstationslist_BasinName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->BasinName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->BasinName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->BasinName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->SubBasinname->Visible) { // SubBasinname ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->SubBasinname) == "") { ?>
		<th data-name="SubBasinname" class="<?php echo $newstationslist_list->SubBasinname->headerCellClass() ?>"><div id="elh_newstationslist_SubBasinname" class="newstationslist_SubBasinname"><div class="ew-table-header-caption"><?php echo $newstationslist_list->SubBasinname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinname" class="<?php echo $newstationslist_list->SubBasinname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->SubBasinname) ?>', 2);"><div id="elh_newstationslist_SubBasinname" class="newstationslist_SubBasinname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->SubBasinname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->SubBasinname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->SubBasinname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->DamCatchment->Visible) { // DamCatchment ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->DamCatchment) == "") { ?>
		<th data-name="DamCatchment" class="<?php echo $newstationslist_list->DamCatchment->headerCellClass() ?>"><div id="elh_newstationslist_DamCatchment" class="newstationslist_DamCatchment"><div class="ew-table-header-caption"><?php echo $newstationslist_list->DamCatchment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DamCatchment" class="<?php echo $newstationslist_list->DamCatchment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->DamCatchment) ?>', 2);"><div id="elh_newstationslist_DamCatchment" class="newstationslist_DamCatchment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->DamCatchment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->DamCatchment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->DamCatchment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->Longitude->Visible) { // Longitude ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->Longitude) == "") { ?>
		<th data-name="Longitude" class="<?php echo $newstationslist_list->Longitude->headerCellClass() ?>"><div id="elh_newstationslist_Longitude" class="newstationslist_Longitude"><div class="ew-table-header-caption"><?php echo $newstationslist_list->Longitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Longitude" class="<?php echo $newstationslist_list->Longitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->Longitude) ?>', 2);"><div id="elh_newstationslist_Longitude" class="newstationslist_Longitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->Longitude->caption() ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->Longitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->Longitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->Latitude->Visible) { // Latitude ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->Latitude) == "") { ?>
		<th data-name="Latitude" class="<?php echo $newstationslist_list->Latitude->headerCellClass() ?>"><div id="elh_newstationslist_Latitude" class="newstationslist_Latitude"><div class="ew-table-header-caption"><?php echo $newstationslist_list->Latitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Latitude" class="<?php echo $newstationslist_list->Latitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->Latitude) ?>', 2);"><div id="elh_newstationslist_Latitude" class="newstationslist_Latitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->Latitude->caption() ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->Latitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->Latitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $newstationslist_list->MobileNumber->headerCellClass() ?>"><div id="elh_newstationslist_MobileNumber" class="newstationslist_MobileNumber"><div class="ew-table-header-caption"><?php echo $newstationslist_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $newstationslist_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->MobileNumber) ?>', 2);"><div id="elh_newstationslist_MobileNumber" class="newstationslist_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->senderMobileNumber->Visible) { // senderMobileNumber ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->senderMobileNumber) == "") { ?>
		<th data-name="senderMobileNumber" class="<?php echo $newstationslist_list->senderMobileNumber->headerCellClass() ?>"><div id="elh_newstationslist_senderMobileNumber" class="newstationslist_senderMobileNumber"><div class="ew-table-header-caption"><?php echo $newstationslist_list->senderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="senderMobileNumber" class="<?php echo $newstationslist_list->senderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->senderMobileNumber) ?>', 2);"><div id="elh_newstationslist_senderMobileNumber" class="newstationslist_senderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->senderMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->senderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->senderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($newstationslist_list->StationId->Visible) { // StationId ?>
	<?php if ($newstationslist_list->SortUrl($newstationslist_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $newstationslist_list->StationId->headerCellClass() ?>"><div id="elh_newstationslist_StationId" class="newstationslist_StationId"><div class="ew-table-header-caption"><?php echo $newstationslist_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $newstationslist_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $newstationslist_list->SortUrl($newstationslist_list->StationId) ?>', 2);"><div id="elh_newstationslist_StationId" class="newstationslist_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $newstationslist_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($newstationslist_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($newstationslist_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$newstationslist_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($newstationslist_list->ExportAll && $newstationslist_list->isExport()) {
	$newstationslist_list->StopRecord = $newstationslist_list->TotalRecords;
} else {

	// Set the last record to display
	if ($newstationslist_list->TotalRecords > $newstationslist_list->StartRecord + $newstationslist_list->DisplayRecords - 1)
		$newstationslist_list->StopRecord = $newstationslist_list->StartRecord + $newstationslist_list->DisplayRecords - 1;
	else
		$newstationslist_list->StopRecord = $newstationslist_list->TotalRecords;
}
$newstationslist_list->RecordCount = $newstationslist_list->StartRecord - 1;
if ($newstationslist_list->Recordset && !$newstationslist_list->Recordset->EOF) {
	$newstationslist_list->Recordset->moveFirst();
	$selectLimit = $newstationslist_list->UseSelectLimit;
	if (!$selectLimit && $newstationslist_list->StartRecord > 1)
		$newstationslist_list->Recordset->move($newstationslist_list->StartRecord - 1);
} elseif (!$newstationslist->AllowAddDeleteRow && $newstationslist_list->StopRecord == 0) {
	$newstationslist_list->StopRecord = $newstationslist->GridAddRowCount;
}

// Initialize aggregate
$newstationslist->RowType = ROWTYPE_AGGREGATEINIT;
$newstationslist->resetAttributes();
$newstationslist_list->renderRow();
while ($newstationslist_list->RecordCount < $newstationslist_list->StopRecord) {
	$newstationslist_list->RecordCount++;
	if ($newstationslist_list->RecordCount >= $newstationslist_list->StartRecord) {
		$newstationslist_list->RowCount++;

		// Set up key count
		$newstationslist_list->KeyCount = $newstationslist_list->RowIndex;

		// Init row class and style
		$newstationslist->resetAttributes();
		$newstationslist->CssClass = "";
		if ($newstationslist_list->isGridAdd()) {
		} else {
			$newstationslist_list->loadRowValues($newstationslist_list->Recordset); // Load row values
		}
		$newstationslist->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$newstationslist->RowAttrs->merge(["data-rowindex" => $newstationslist_list->RowCount, "id" => "r" . $newstationslist_list->RowCount . "_newstationslist", "data-rowtype" => $newstationslist->RowType]);

		// Render row
		$newstationslist_list->renderRow();

		// Render list options
		$newstationslist_list->renderListOptions();
?>
	<tr <?php echo $newstationslist->rowAttributes() ?>>
<?php

// Render list options (body, left)
$newstationslist_list->ListOptions->render("body", "left", $newstationslist_list->RowCount);
?>
	<?php if ($newstationslist_list->StationName->Visible) { // StationName ?>
		<td data-name="StationName" <?php echo $newstationslist_list->StationName->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_StationName">
<span<?php echo $newstationslist_list->StationName->viewAttributes() ?>><?php echo $newstationslist_list->StationName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->District->Visible) { // District ?>
		<td data-name="District" <?php echo $newstationslist_list->District->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_District">
<span<?php echo $newstationslist_list->District->viewAttributes() ?>><?php echo $newstationslist_list->District->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->Taluk->Visible) { // Taluk ?>
		<td data-name="Taluk" <?php echo $newstationslist_list->Taluk->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_Taluk">
<span<?php echo $newstationslist_list->Taluk->viewAttributes() ?>><?php echo $newstationslist_list->Taluk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->NameofSubDivision->Visible) { // NameofSubDivision ?>
		<td data-name="NameofSubDivision" <?php echo $newstationslist_list->NameofSubDivision->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_NameofSubDivision">
<span<?php echo $newstationslist_list->NameofSubDivision->viewAttributes() ?>><?php echo $newstationslist_list->NameofSubDivision->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->TypeofStation->Visible) { // TypeofStation ?>
		<td data-name="TypeofStation" <?php echo $newstationslist_list->TypeofStation->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_TypeofStation">
<span<?php echo $newstationslist_list->TypeofStation->viewAttributes() ?>><?php echo $newstationslist_list->TypeofStation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->BasinName->Visible) { // BasinName ?>
		<td data-name="BasinName" <?php echo $newstationslist_list->BasinName->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_BasinName">
<span<?php echo $newstationslist_list->BasinName->viewAttributes() ?>><?php echo $newstationslist_list->BasinName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->SubBasinname->Visible) { // SubBasinname ?>
		<td data-name="SubBasinname" <?php echo $newstationslist_list->SubBasinname->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_SubBasinname">
<span<?php echo $newstationslist_list->SubBasinname->viewAttributes() ?>><?php echo $newstationslist_list->SubBasinname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->DamCatchment->Visible) { // DamCatchment ?>
		<td data-name="DamCatchment" <?php echo $newstationslist_list->DamCatchment->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_DamCatchment">
<span<?php echo $newstationslist_list->DamCatchment->viewAttributes() ?>><?php echo $newstationslist_list->DamCatchment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->Longitude->Visible) { // Longitude ?>
		<td data-name="Longitude" <?php echo $newstationslist_list->Longitude->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_Longitude">
<span<?php echo $newstationslist_list->Longitude->viewAttributes() ?>><?php echo $newstationslist_list->Longitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->Latitude->Visible) { // Latitude ?>
		<td data-name="Latitude" <?php echo $newstationslist_list->Latitude->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_Latitude">
<span<?php echo $newstationslist_list->Latitude->viewAttributes() ?>><?php echo $newstationslist_list->Latitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $newstationslist_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_MobileNumber">
<span<?php echo $newstationslist_list->MobileNumber->viewAttributes() ?>><?php echo $newstationslist_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->senderMobileNumber->Visible) { // senderMobileNumber ?>
		<td data-name="senderMobileNumber" <?php echo $newstationslist_list->senderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_senderMobileNumber">
<span<?php echo $newstationslist_list->senderMobileNumber->viewAttributes() ?>><?php echo $newstationslist_list->senderMobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($newstationslist_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $newstationslist_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $newstationslist_list->RowCount ?>_newstationslist_StationId">
<span<?php echo $newstationslist_list->StationId->viewAttributes() ?>><?php echo $newstationslist_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$newstationslist_list->ListOptions->render("body", "right", $newstationslist_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$newstationslist_list->isGridAdd())
		$newstationslist_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$newstationslist->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($newstationslist_list->Recordset)
	$newstationslist_list->Recordset->Close();
?>
<?php if (!$newstationslist_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$newstationslist_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $newstationslist_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $newstationslist_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($newstationslist_list->TotalRecords == 0 && !$newstationslist->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $newstationslist_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$newstationslist_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$newstationslist_list->isExport()) { ?>
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
$newstationslist_list->terminate();
?>