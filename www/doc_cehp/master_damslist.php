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
$master_dams_list = new master_dams_list();

// Run the page
$master_dams_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_dams_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$master_dams_list->isExport()) { ?>
<script>
var fmaster_damslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmaster_damslist = currentForm = new ew.Form("fmaster_damslist", "list");
	fmaster_damslist.formKeyCountName = '<?php echo $master_dams_list->FormKeyCountName ?>';
	loadjs.done("fmaster_damslist");
});
var fmaster_damslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmaster_damslistsrch = currentSearchForm = new ew.Form("fmaster_damslistsrch");

	// Dynamic selection lists
	// Filters

	fmaster_damslistsrch.filterList = <?php echo $master_dams_list->getFilterList() ?>;
	loadjs.done("fmaster_damslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$master_dams_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_dams_list->TotalRecords > 0 && $master_dams_list->ExportOptions->visible()) { ?>
<?php $master_dams_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_dams_list->ImportOptions->visible()) { ?>
<?php $master_dams_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_dams_list->SearchOptions->visible()) { ?>
<?php $master_dams_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_dams_list->FilterOptions->visible()) { ?>
<?php $master_dams_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_dams_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_dams_list->isExport() && !$master_dams->CurrentAction) { ?>
<form name="fmaster_damslistsrch" id="fmaster_damslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmaster_damslistsrch-search-panel" class="<?php echo $master_dams_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_dams">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $master_dams_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($master_dams_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($master_dams_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_dams_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_dams_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_dams_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_dams_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_dams_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $master_dams_list->showPageHeader(); ?>
<?php
$master_dams_list->showMessage();
?>
<?php if ($master_dams_list->TotalRecords > 0 || $master_dams->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_dams_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_dams">
<?php if (!$master_dams_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_dams_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_dams_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_dams_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_damslist" id="fmaster_damslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_dams">
<div id="gmp_master_dams" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($master_dams_list->TotalRecords > 0 || $master_dams_list->isGridEdit()) { ?>
<table id="tbl_master_damslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_dams->RowType = ROWTYPE_HEADER;

// Render list options
$master_dams_list->renderListOptions();

// Render list options (header, left)
$master_dams_list->ListOptions->render("header", "left");
?>
<?php if ($master_dams_list->SrNo->Visible) { // SrNo ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->SrNo) == "") { ?>
		<th data-name="SrNo" class="<?php echo $master_dams_list->SrNo->headerCellClass() ?>"><div id="elh_master_dams_SrNo" class="master_dams_SrNo"><div class="ew-table-header-caption"><?php echo $master_dams_list->SrNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SrNo" class="<?php echo $master_dams_list->SrNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->SrNo) ?>', 2);"><div id="elh_master_dams_SrNo" class="master_dams_SrNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->SrNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->SrNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->SrNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->PIC->Visible) { // PIC ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->PIC) == "") { ?>
		<th data-name="PIC" class="<?php echo $master_dams_list->PIC->headerCellClass() ?>"><div id="elh_master_dams_PIC" class="master_dams_PIC"><div class="ew-table-header-caption"><?php echo $master_dams_list->PIC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PIC" class="<?php echo $master_dams_list->PIC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->PIC) ?>', 2);"><div id="elh_master_dams_PIC" class="master_dams_PIC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->PIC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->PIC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->PIC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->kpcl_ID->Visible) { // kpcl_ID ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->kpcl_ID) == "") { ?>
		<th data-name="kpcl_ID" class="<?php echo $master_dams_list->kpcl_ID->headerCellClass() ?>"><div id="elh_master_dams_kpcl_ID" class="master_dams_kpcl_ID"><div class="ew-table-header-caption"><?php echo $master_dams_list->kpcl_ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kpcl_ID" class="<?php echo $master_dams_list->kpcl_ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->kpcl_ID) ?>', 2);"><div id="elh_master_dams_kpcl_ID" class="master_dams_kpcl_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->kpcl_ID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->kpcl_ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->kpcl_ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Name_of_Dam->Visible) { // Name_of_Dam ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Name_of_Dam) == "") { ?>
		<th data-name="Name_of_Dam" class="<?php echo $master_dams_list->Name_of_Dam->headerCellClass() ?>"><div id="elh_master_dams_Name_of_Dam" class="master_dams_Name_of_Dam"><div class="ew-table-header-caption"><?php echo $master_dams_list->Name_of_Dam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name_of_Dam" class="<?php echo $master_dams_list->Name_of_Dam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Name_of_Dam) ?>', 2);"><div id="elh_master_dams_Name_of_Dam" class="master_dams_Name_of_Dam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Name_of_Dam->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Name_of_Dam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Name_of_Dam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->kpcl_dam_name->Visible) { // kpcl_dam_name ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->kpcl_dam_name) == "") { ?>
		<th data-name="kpcl_dam_name" class="<?php echo $master_dams_list->kpcl_dam_name->headerCellClass() ?>"><div id="elh_master_dams_kpcl_dam_name" class="master_dams_kpcl_dam_name"><div class="ew-table-header-caption"><?php echo $master_dams_list->kpcl_dam_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kpcl_dam_name" class="<?php echo $master_dams_list->kpcl_dam_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->kpcl_dam_name) ?>', 2);"><div id="elh_master_dams_kpcl_dam_name" class="master_dams_kpcl_dam_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->kpcl_dam_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->kpcl_dam_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->kpcl_dam_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Ops_ID->Visible) { // Ops_ID ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Ops_ID) == "") { ?>
		<th data-name="Ops_ID" class="<?php echo $master_dams_list->Ops_ID->headerCellClass() ?>"><div id="elh_master_dams_Ops_ID" class="master_dams_Ops_ID"><div class="ew-table-header-caption"><?php echo $master_dams_list->Ops_ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ops_ID" class="<?php echo $master_dams_list->Ops_ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Ops_ID) ?>', 2);"><div id="elh_master_dams_Ops_ID" class="master_dams_Ops_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Ops_ID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Ops_ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Ops_ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->dam_size_type_ID->Visible) { // dam_size_type_ID ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->dam_size_type_ID) == "") { ?>
		<th data-name="dam_size_type_ID" class="<?php echo $master_dams_list->dam_size_type_ID->headerCellClass() ?>"><div id="elh_master_dams_dam_size_type_ID" class="master_dams_dam_size_type_ID"><div class="ew-table-header-caption"><?php echo $master_dams_list->dam_size_type_ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dam_size_type_ID" class="<?php echo $master_dams_list->dam_size_type_ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->dam_size_type_ID) ?>', 2);"><div id="elh_master_dams_dam_size_type_ID" class="master_dams_dam_size_type_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->dam_size_type_ID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->dam_size_type_ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->dam_size_type_ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->dam_Longitude->Visible) { // dam_Longitude ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->dam_Longitude) == "") { ?>
		<th data-name="dam_Longitude" class="<?php echo $master_dams_list->dam_Longitude->headerCellClass() ?>"><div id="elh_master_dams_dam_Longitude" class="master_dams_dam_Longitude"><div class="ew-table-header-caption"><?php echo $master_dams_list->dam_Longitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dam_Longitude" class="<?php echo $master_dams_list->dam_Longitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->dam_Longitude) ?>', 2);"><div id="elh_master_dams_dam_Longitude" class="master_dams_dam_Longitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->dam_Longitude->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->dam_Longitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->dam_Longitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->dam_Latitude->Visible) { // dam_Latitude ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->dam_Latitude) == "") { ?>
		<th data-name="dam_Latitude" class="<?php echo $master_dams_list->dam_Latitude->headerCellClass() ?>"><div id="elh_master_dams_dam_Latitude" class="master_dams_dam_Latitude"><div class="ew-table-header-caption"><?php echo $master_dams_list->dam_Latitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dam_Latitude" class="<?php echo $master_dams_list->dam_Latitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->dam_Latitude) ?>', 2);"><div id="elh_master_dams_dam_Latitude" class="master_dams_dam_Latitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->dam_Latitude->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->dam_Latitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->dam_Latitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Year_of_Completion->Visible) { // Year_of_Completion ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Year_of_Completion) == "") { ?>
		<th data-name="Year_of_Completion" class="<?php echo $master_dams_list->Year_of_Completion->headerCellClass() ?>"><div id="elh_master_dams_Year_of_Completion" class="master_dams_Year_of_Completion"><div class="ew-table-header-caption"><?php echo $master_dams_list->Year_of_Completion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Year_of_Completion" class="<?php echo $master_dams_list->Year_of_Completion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Year_of_Completion) ?>', 2);"><div id="elh_master_dams_Year_of_Completion" class="master_dams_Year_of_Completion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Year_of_Completion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Year_of_Completion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Year_of_Completion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Basin->Visible) { // Basin ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Basin) == "") { ?>
		<th data-name="Basin" class="<?php echo $master_dams_list->Basin->headerCellClass() ?>"><div id="elh_master_dams_Basin" class="master_dams_Basin"><div class="ew-table-header-caption"><?php echo $master_dams_list->Basin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Basin" class="<?php echo $master_dams_list->Basin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Basin) ?>', 2);"><div id="elh_master_dams_Basin" class="master_dams_Basin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Basin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Basin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Basin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Sub_Basin->Visible) { // Sub-Basin ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Sub_Basin) == "") { ?>
		<th data-name="Sub_Basin" class="<?php echo $master_dams_list->Sub_Basin->headerCellClass() ?>"><div id="elh_master_dams_Sub_Basin" class="master_dams_Sub_Basin"><div class="ew-table-header-caption"><?php echo $master_dams_list->Sub_Basin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sub_Basin" class="<?php echo $master_dams_list->Sub_Basin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Sub_Basin) ?>', 2);"><div id="elh_master_dams_Sub_Basin" class="master_dams_Sub_Basin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Sub_Basin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Sub_Basin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Sub_Basin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->district->Visible) { // district ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->district) == "") { ?>
		<th data-name="district" class="<?php echo $master_dams_list->district->headerCellClass() ?>"><div id="elh_master_dams_district" class="master_dams_district"><div class="ew-table-header-caption"><?php echo $master_dams_list->district->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="district" class="<?php echo $master_dams_list->district->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->district) ?>', 2);"><div id="elh_master_dams_district" class="master_dams_district">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->district->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->district->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->district->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Taluka->Visible) { // Taluka ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Taluka) == "") { ?>
		<th data-name="Taluka" class="<?php echo $master_dams_list->Taluka->headerCellClass() ?>"><div id="elh_master_dams_Taluka" class="master_dams_Taluka"><div class="ew-table-header-caption"><?php echo $master_dams_list->Taluka->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Taluka" class="<?php echo $master_dams_list->Taluka->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Taluka) ?>', 2);"><div id="elh_master_dams_Taluka" class="master_dams_Taluka">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Taluka->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Taluka->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Taluka->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->River->Visible) { // River ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->River) == "") { ?>
		<th data-name="River" class="<?php echo $master_dams_list->River->headerCellClass() ?>"><div id="elh_master_dams_River" class="master_dams_River"><div class="ew-table-header-caption"><?php echo $master_dams_list->River->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="River" class="<?php echo $master_dams_list->River->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->River) ?>', 2);"><div id="elh_master_dams_River" class="master_dams_River">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->River->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->River->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->River->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Neareast_City->Visible) { // Neareast_City ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Neareast_City) == "") { ?>
		<th data-name="Neareast_City" class="<?php echo $master_dams_list->Neareast_City->headerCellClass() ?>"><div id="elh_master_dams_Neareast_City" class="master_dams_Neareast_City"><div class="ew-table-header-caption"><?php echo $master_dams_list->Neareast_City->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Neareast_City" class="<?php echo $master_dams_list->Neareast_City->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Neareast_City) ?>', 2);"><div id="elh_master_dams_Neareast_City" class="master_dams_Neareast_City">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Neareast_City->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Neareast_City->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Neareast_City->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->dam_construction_type->Visible) { // dam_construction_type ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->dam_construction_type) == "") { ?>
		<th data-name="dam_construction_type" class="<?php echo $master_dams_list->dam_construction_type->headerCellClass() ?>"><div id="elh_master_dams_dam_construction_type" class="master_dams_dam_construction_type"><div class="ew-table-header-caption"><?php echo $master_dams_list->dam_construction_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dam_construction_type" class="<?php echo $master_dams_list->dam_construction_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->dam_construction_type) ?>', 2);"><div id="elh_master_dams_dam_construction_type" class="master_dams_dam_construction_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->dam_construction_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->dam_construction_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->dam_construction_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->Visible) { // Height_above_Lowest_Foundation_Level_in_mtr ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr) == "") { ?>
		<th data-name="Height_above_Lowest_Foundation_Level_in_mtr" class="<?php echo $master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->headerCellClass() ?>"><div id="elh_master_dams_Height_above_Lowest_Foundation_Level_in_mtr" class="master_dams_Height_above_Lowest_Foundation_Level_in_mtr"><div class="ew-table-header-caption"><?php echo $master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Height_above_Lowest_Foundation_Level_in_mtr" class="<?php echo $master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr) ?>', 2);"><div id="elh_master_dams_Height_above_Lowest_Foundation_Level_in_mtr" class="master_dams_Height_above_Lowest_Foundation_Level_in_mtr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Length_of_Dam_in_mtr->Visible) { // Length_of_Dam_in_mtr ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Length_of_Dam_in_mtr) == "") { ?>
		<th data-name="Length_of_Dam_in_mtr" class="<?php echo $master_dams_list->Length_of_Dam_in_mtr->headerCellClass() ?>"><div id="elh_master_dams_Length_of_Dam_in_mtr" class="master_dams_Length_of_Dam_in_mtr"><div class="ew-table-header-caption"><?php echo $master_dams_list->Length_of_Dam_in_mtr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Length_of_Dam_in_mtr" class="<?php echo $master_dams_list->Length_of_Dam_in_mtr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Length_of_Dam_in_mtr) ?>', 2);"><div id="elh_master_dams_Length_of_Dam_in_mtr" class="master_dams_Length_of_Dam_in_mtr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Length_of_Dam_in_mtr->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Length_of_Dam_in_mtr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Length_of_Dam_in_mtr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Volume_Content_of_Dam_in_MCM->Visible) { // Volume_Content_of_Dam_in_MCM ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Volume_Content_of_Dam_in_MCM) == "") { ?>
		<th data-name="Volume_Content_of_Dam_in_MCM" class="<?php echo $master_dams_list->Volume_Content_of_Dam_in_MCM->headerCellClass() ?>"><div id="elh_master_dams_Volume_Content_of_Dam_in_MCM" class="master_dams_Volume_Content_of_Dam_in_MCM"><div class="ew-table-header-caption"><?php echo $master_dams_list->Volume_Content_of_Dam_in_MCM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume_Content_of_Dam_in_MCM" class="<?php echo $master_dams_list->Volume_Content_of_Dam_in_MCM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Volume_Content_of_Dam_in_MCM) ?>', 2);"><div id="elh_master_dams_Volume_Content_of_Dam_in_MCM" class="master_dams_Volume_Content_of_Dam_in_MCM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Volume_Content_of_Dam_in_MCM->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Volume_Content_of_Dam_in_MCM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Volume_Content_of_Dam_in_MCM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->Visible) { // Gross_Storage_Capacity_of_Dam_in_MCM ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM) == "") { ?>
		<th data-name="Gross_Storage_Capacity_of_Dam_in_MCM" class="<?php echo $master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->headerCellClass() ?>"><div id="elh_master_dams_Gross_Storage_Capacity_of_Dam_in_MCM" class="master_dams_Gross_Storage_Capacity_of_Dam_in_MCM"><div class="ew-table-header-caption"><?php echo $master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gross_Storage_Capacity_of_Dam_in_MCM" class="<?php echo $master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM) ?>', 2);"><div id="elh_master_dams_Gross_Storage_Capacity_of_Dam_in_MCM" class="master_dams_Gross_Storage_Capacity_of_Dam_in_MCM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Reservoir_Area_in_sq_km->Visible) { // Reservoir_Area_in_sq_km ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Reservoir_Area_in_sq_km) == "") { ?>
		<th data-name="Reservoir_Area_in_sq_km" class="<?php echo $master_dams_list->Reservoir_Area_in_sq_km->headerCellClass() ?>"><div id="elh_master_dams_Reservoir_Area_in_sq_km" class="master_dams_Reservoir_Area_in_sq_km"><div class="ew-table-header-caption"><?php echo $master_dams_list->Reservoir_Area_in_sq_km->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reservoir_Area_in_sq_km" class="<?php echo $master_dams_list->Reservoir_Area_in_sq_km->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Reservoir_Area_in_sq_km) ?>', 2);"><div id="elh_master_dams_Reservoir_Area_in_sq_km" class="master_dams_Reservoir_Area_in_sq_km">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Reservoir_Area_in_sq_km->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Reservoir_Area_in_sq_km->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Reservoir_Area_in_sq_km->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Effective_Storage_Capacity_in_MCM->Visible) { // Effective_Storage_Capacity_in_MCM ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Effective_Storage_Capacity_in_MCM) == "") { ?>
		<th data-name="Effective_Storage_Capacity_in_MCM" class="<?php echo $master_dams_list->Effective_Storage_Capacity_in_MCM->headerCellClass() ?>"><div id="elh_master_dams_Effective_Storage_Capacity_in_MCM" class="master_dams_Effective_Storage_Capacity_in_MCM"><div class="ew-table-header-caption"><?php echo $master_dams_list->Effective_Storage_Capacity_in_MCM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Effective_Storage_Capacity_in_MCM" class="<?php echo $master_dams_list->Effective_Storage_Capacity_in_MCM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Effective_Storage_Capacity_in_MCM) ?>', 2);"><div id="elh_master_dams_Effective_Storage_Capacity_in_MCM" class="master_dams_Effective_Storage_Capacity_in_MCM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Effective_Storage_Capacity_in_MCM->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Effective_Storage_Capacity_in_MCM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Effective_Storage_Capacity_in_MCM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Purpose->Visible) { // Purpose ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Purpose) == "") { ?>
		<th data-name="Purpose" class="<?php echo $master_dams_list->Purpose->headerCellClass() ?>"><div id="elh_master_dams_Purpose" class="master_dams_Purpose"><div class="ew-table-header-caption"><?php echo $master_dams_list->Purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Purpose" class="<?php echo $master_dams_list->Purpose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Purpose) ?>', 2);"><div id="elh_master_dams_Purpose" class="master_dams_Purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Purpose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Purpose->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Purpose->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->Visible) { // Designed_Spillway_Capacity_in_M3_per_sec ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec) == "") { ?>
		<th data-name="Designed_Spillway_Capacity_in_M3_per_sec" class="<?php echo $master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->headerCellClass() ?>"><div id="elh_master_dams_Designed_Spillway_Capacity_in_M3_per_sec" class="master_dams_Designed_Spillway_Capacity_in_M3_per_sec"><div class="ew-table-header-caption"><?php echo $master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Designed_Spillway_Capacity_in_M3_per_sec" class="<?php echo $master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec) ?>', 2);"><div id="elh_master_dams_Designed_Spillway_Capacity_in_M3_per_sec" class="master_dams_Designed_Spillway_Capacity_in_M3_per_sec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_dams_list->dam_construction_type_ID->Visible) { // dam_construction_type_ID ?>
	<?php if ($master_dams_list->SortUrl($master_dams_list->dam_construction_type_ID) == "") { ?>
		<th data-name="dam_construction_type_ID" class="<?php echo $master_dams_list->dam_construction_type_ID->headerCellClass() ?>"><div id="elh_master_dams_dam_construction_type_ID" class="master_dams_dam_construction_type_ID"><div class="ew-table-header-caption"><?php echo $master_dams_list->dam_construction_type_ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dam_construction_type_ID" class="<?php echo $master_dams_list->dam_construction_type_ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $master_dams_list->SortUrl($master_dams_list->dam_construction_type_ID) ?>', 2);"><div id="elh_master_dams_dam_construction_type_ID" class="master_dams_dam_construction_type_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_dams_list->dam_construction_type_ID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_dams_list->dam_construction_type_ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($master_dams_list->dam_construction_type_ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_dams_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_dams_list->ExportAll && $master_dams_list->isExport()) {
	$master_dams_list->StopRecord = $master_dams_list->TotalRecords;
} else {

	// Set the last record to display
	if ($master_dams_list->TotalRecords > $master_dams_list->StartRecord + $master_dams_list->DisplayRecords - 1)
		$master_dams_list->StopRecord = $master_dams_list->StartRecord + $master_dams_list->DisplayRecords - 1;
	else
		$master_dams_list->StopRecord = $master_dams_list->TotalRecords;
}
$master_dams_list->RecordCount = $master_dams_list->StartRecord - 1;
if ($master_dams_list->Recordset && !$master_dams_list->Recordset->EOF) {
	$master_dams_list->Recordset->moveFirst();
	$selectLimit = $master_dams_list->UseSelectLimit;
	if (!$selectLimit && $master_dams_list->StartRecord > 1)
		$master_dams_list->Recordset->move($master_dams_list->StartRecord - 1);
} elseif (!$master_dams->AllowAddDeleteRow && $master_dams_list->StopRecord == 0) {
	$master_dams_list->StopRecord = $master_dams->GridAddRowCount;
}

// Initialize aggregate
$master_dams->RowType = ROWTYPE_AGGREGATEINIT;
$master_dams->resetAttributes();
$master_dams_list->renderRow();
while ($master_dams_list->RecordCount < $master_dams_list->StopRecord) {
	$master_dams_list->RecordCount++;
	if ($master_dams_list->RecordCount >= $master_dams_list->StartRecord) {
		$master_dams_list->RowCount++;

		// Set up key count
		$master_dams_list->KeyCount = $master_dams_list->RowIndex;

		// Init row class and style
		$master_dams->resetAttributes();
		$master_dams->CssClass = "";
		if ($master_dams_list->isGridAdd()) {
		} else {
			$master_dams_list->loadRowValues($master_dams_list->Recordset); // Load row values
		}
		$master_dams->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_dams->RowAttrs->merge(["data-rowindex" => $master_dams_list->RowCount, "id" => "r" . $master_dams_list->RowCount . "_master_dams", "data-rowtype" => $master_dams->RowType]);

		// Render row
		$master_dams_list->renderRow();

		// Render list options
		$master_dams_list->renderListOptions();
?>
	<tr <?php echo $master_dams->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_dams_list->ListOptions->render("body", "left", $master_dams_list->RowCount);
?>
	<?php if ($master_dams_list->SrNo->Visible) { // SrNo ?>
		<td data-name="SrNo" <?php echo $master_dams_list->SrNo->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_SrNo">
<span<?php echo $master_dams_list->SrNo->viewAttributes() ?>><?php echo $master_dams_list->SrNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->PIC->Visible) { // PIC ?>
		<td data-name="PIC" <?php echo $master_dams_list->PIC->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_PIC">
<span<?php echo $master_dams_list->PIC->viewAttributes() ?>><?php echo $master_dams_list->PIC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->kpcl_ID->Visible) { // kpcl_ID ?>
		<td data-name="kpcl_ID" <?php echo $master_dams_list->kpcl_ID->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_kpcl_ID">
<span<?php echo $master_dams_list->kpcl_ID->viewAttributes() ?>><?php echo $master_dams_list->kpcl_ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Name_of_Dam->Visible) { // Name_of_Dam ?>
		<td data-name="Name_of_Dam" <?php echo $master_dams_list->Name_of_Dam->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Name_of_Dam">
<span<?php echo $master_dams_list->Name_of_Dam->viewAttributes() ?>><?php echo $master_dams_list->Name_of_Dam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->kpcl_dam_name->Visible) { // kpcl_dam_name ?>
		<td data-name="kpcl_dam_name" <?php echo $master_dams_list->kpcl_dam_name->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_kpcl_dam_name">
<span<?php echo $master_dams_list->kpcl_dam_name->viewAttributes() ?>><?php echo $master_dams_list->kpcl_dam_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Ops_ID->Visible) { // Ops_ID ?>
		<td data-name="Ops_ID" <?php echo $master_dams_list->Ops_ID->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Ops_ID">
<span<?php echo $master_dams_list->Ops_ID->viewAttributes() ?>><?php echo $master_dams_list->Ops_ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->dam_size_type_ID->Visible) { // dam_size_type_ID ?>
		<td data-name="dam_size_type_ID" <?php echo $master_dams_list->dam_size_type_ID->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_dam_size_type_ID">
<span<?php echo $master_dams_list->dam_size_type_ID->viewAttributes() ?>><?php echo $master_dams_list->dam_size_type_ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->dam_Longitude->Visible) { // dam_Longitude ?>
		<td data-name="dam_Longitude" <?php echo $master_dams_list->dam_Longitude->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_dam_Longitude">
<span<?php echo $master_dams_list->dam_Longitude->viewAttributes() ?>><?php echo $master_dams_list->dam_Longitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->dam_Latitude->Visible) { // dam_Latitude ?>
		<td data-name="dam_Latitude" <?php echo $master_dams_list->dam_Latitude->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_dam_Latitude">
<span<?php echo $master_dams_list->dam_Latitude->viewAttributes() ?>><?php echo $master_dams_list->dam_Latitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Year_of_Completion->Visible) { // Year_of_Completion ?>
		<td data-name="Year_of_Completion" <?php echo $master_dams_list->Year_of_Completion->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Year_of_Completion">
<span<?php echo $master_dams_list->Year_of_Completion->viewAttributes() ?>><?php echo $master_dams_list->Year_of_Completion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Basin->Visible) { // Basin ?>
		<td data-name="Basin" <?php echo $master_dams_list->Basin->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Basin">
<span<?php echo $master_dams_list->Basin->viewAttributes() ?>><?php echo $master_dams_list->Basin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Sub_Basin->Visible) { // Sub-Basin ?>
		<td data-name="Sub_Basin" <?php echo $master_dams_list->Sub_Basin->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Sub_Basin">
<span<?php echo $master_dams_list->Sub_Basin->viewAttributes() ?>><?php echo $master_dams_list->Sub_Basin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->district->Visible) { // district ?>
		<td data-name="district" <?php echo $master_dams_list->district->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_district">
<span<?php echo $master_dams_list->district->viewAttributes() ?>><?php echo $master_dams_list->district->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Taluka->Visible) { // Taluka ?>
		<td data-name="Taluka" <?php echo $master_dams_list->Taluka->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Taluka">
<span<?php echo $master_dams_list->Taluka->viewAttributes() ?>><?php echo $master_dams_list->Taluka->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->River->Visible) { // River ?>
		<td data-name="River" <?php echo $master_dams_list->River->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_River">
<span<?php echo $master_dams_list->River->viewAttributes() ?>><?php echo $master_dams_list->River->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Neareast_City->Visible) { // Neareast_City ?>
		<td data-name="Neareast_City" <?php echo $master_dams_list->Neareast_City->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Neareast_City">
<span<?php echo $master_dams_list->Neareast_City->viewAttributes() ?>><?php echo $master_dams_list->Neareast_City->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->dam_construction_type->Visible) { // dam_construction_type ?>
		<td data-name="dam_construction_type" <?php echo $master_dams_list->dam_construction_type->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_dam_construction_type">
<span<?php echo $master_dams_list->dam_construction_type->viewAttributes() ?>><?php echo $master_dams_list->dam_construction_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->Visible) { // Height_above_Lowest_Foundation_Level_in_mtr ?>
		<td data-name="Height_above_Lowest_Foundation_Level_in_mtr" <?php echo $master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Height_above_Lowest_Foundation_Level_in_mtr">
<span<?php echo $master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->viewAttributes() ?>><?php echo $master_dams_list->Height_above_Lowest_Foundation_Level_in_mtr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Length_of_Dam_in_mtr->Visible) { // Length_of_Dam_in_mtr ?>
		<td data-name="Length_of_Dam_in_mtr" <?php echo $master_dams_list->Length_of_Dam_in_mtr->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Length_of_Dam_in_mtr">
<span<?php echo $master_dams_list->Length_of_Dam_in_mtr->viewAttributes() ?>><?php echo $master_dams_list->Length_of_Dam_in_mtr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Volume_Content_of_Dam_in_MCM->Visible) { // Volume_Content_of_Dam_in_MCM ?>
		<td data-name="Volume_Content_of_Dam_in_MCM" <?php echo $master_dams_list->Volume_Content_of_Dam_in_MCM->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Volume_Content_of_Dam_in_MCM">
<span<?php echo $master_dams_list->Volume_Content_of_Dam_in_MCM->viewAttributes() ?>><?php echo $master_dams_list->Volume_Content_of_Dam_in_MCM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->Visible) { // Gross_Storage_Capacity_of_Dam_in_MCM ?>
		<td data-name="Gross_Storage_Capacity_of_Dam_in_MCM" <?php echo $master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Gross_Storage_Capacity_of_Dam_in_MCM">
<span<?php echo $master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->viewAttributes() ?>><?php echo $master_dams_list->Gross_Storage_Capacity_of_Dam_in_MCM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Reservoir_Area_in_sq_km->Visible) { // Reservoir_Area_in_sq_km ?>
		<td data-name="Reservoir_Area_in_sq_km" <?php echo $master_dams_list->Reservoir_Area_in_sq_km->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Reservoir_Area_in_sq_km">
<span<?php echo $master_dams_list->Reservoir_Area_in_sq_km->viewAttributes() ?>><?php echo $master_dams_list->Reservoir_Area_in_sq_km->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Effective_Storage_Capacity_in_MCM->Visible) { // Effective_Storage_Capacity_in_MCM ?>
		<td data-name="Effective_Storage_Capacity_in_MCM" <?php echo $master_dams_list->Effective_Storage_Capacity_in_MCM->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Effective_Storage_Capacity_in_MCM">
<span<?php echo $master_dams_list->Effective_Storage_Capacity_in_MCM->viewAttributes() ?>><?php echo $master_dams_list->Effective_Storage_Capacity_in_MCM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose" <?php echo $master_dams_list->Purpose->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Purpose">
<span<?php echo $master_dams_list->Purpose->viewAttributes() ?>><?php echo $master_dams_list->Purpose->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->Visible) { // Designed_Spillway_Capacity_in_M3_per_sec ?>
		<td data-name="Designed_Spillway_Capacity_in_M3_per_sec" <?php echo $master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_Designed_Spillway_Capacity_in_M3_per_sec">
<span<?php echo $master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->viewAttributes() ?>><?php echo $master_dams_list->Designed_Spillway_Capacity_in_M3_per_sec->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_dams_list->dam_construction_type_ID->Visible) { // dam_construction_type_ID ?>
		<td data-name="dam_construction_type_ID" <?php echo $master_dams_list->dam_construction_type_ID->cellAttributes() ?>>
<span id="el<?php echo $master_dams_list->RowCount ?>_master_dams_dam_construction_type_ID">
<span<?php echo $master_dams_list->dam_construction_type_ID->viewAttributes() ?>><?php echo $master_dams_list->dam_construction_type_ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_dams_list->ListOptions->render("body", "right", $master_dams_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$master_dams_list->isGridAdd())
		$master_dams_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$master_dams->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_dams_list->Recordset)
	$master_dams_list->Recordset->Close();
?>
<?php if (!$master_dams_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_dams_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $master_dams_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_dams_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_dams_list->TotalRecords == 0 && !$master_dams->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_dams_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_dams_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$master_dams_list->isExport()) { ?>
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
$master_dams_list->terminate();
?>