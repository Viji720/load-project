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
$tbl_smsdata_archive_list = new tbl_smsdata_archive_list();

// Run the page
$tbl_smsdata_archive_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_smsdata_archive_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tbl_smsdata_archive_list->isExport()) { ?>
<script>
var ftbl_smsdata_archivelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftbl_smsdata_archivelist = currentForm = new ew.Form("ftbl_smsdata_archivelist", "list");
	ftbl_smsdata_archivelist.formKeyCountName = '<?php echo $tbl_smsdata_archive_list->FormKeyCountName ?>';
	loadjs.done("ftbl_smsdata_archivelist");
});
var ftbl_smsdata_archivelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftbl_smsdata_archivelistsrch = currentSearchForm = new ew.Form("ftbl_smsdata_archivelistsrch");

	// Dynamic selection lists
	// Filters

	ftbl_smsdata_archivelistsrch.filterList = <?php echo $tbl_smsdata_archive_list->getFilterList() ?>;
	loadjs.done("ftbl_smsdata_archivelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tbl_smsdata_archive_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tbl_smsdata_archive_list->TotalRecords > 0 && $tbl_smsdata_archive_list->ExportOptions->visible()) { ?>
<?php $tbl_smsdata_archive_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->ImportOptions->visible()) { ?>
<?php $tbl_smsdata_archive_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->SearchOptions->visible()) { ?>
<?php $tbl_smsdata_archive_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->FilterOptions->visible()) { ?>
<?php $tbl_smsdata_archive_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tbl_smsdata_archive_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tbl_smsdata_archive_list->isExport() && !$tbl_smsdata_archive->CurrentAction) { ?>
<form name="ftbl_smsdata_archivelistsrch" id="ftbl_smsdata_archivelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftbl_smsdata_archivelistsrch-search-panel" class="<?php echo $tbl_smsdata_archive_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tbl_smsdata_archive">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $tbl_smsdata_archive_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tbl_smsdata_archive_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tbl_smsdata_archive_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tbl_smsdata_archive_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tbl_smsdata_archive_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tbl_smsdata_archive_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tbl_smsdata_archive_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tbl_smsdata_archive_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tbl_smsdata_archive_list->showPageHeader(); ?>
<?php
$tbl_smsdata_archive_list->showMessage();
?>
<?php if ($tbl_smsdata_archive_list->TotalRecords > 0 || $tbl_smsdata_archive->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tbl_smsdata_archive_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tbl_smsdata_archive">
<?php if (!$tbl_smsdata_archive_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tbl_smsdata_archive_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_smsdata_archive_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_smsdata_archive_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftbl_smsdata_archivelist" id="ftbl_smsdata_archivelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_smsdata_archive">
<div id="gmp_tbl_smsdata_archive" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tbl_smsdata_archive_list->TotalRecords > 0 || $tbl_smsdata_archive_list->isGridEdit()) { ?>
<table id="tbl_tbl_smsdata_archivelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tbl_smsdata_archive->RowType = ROWTYPE_HEADER;

// Render list options
$tbl_smsdata_archive_list->renderListOptions();

// Render list options (header, left)
$tbl_smsdata_archive_list->ListOptions->render("header", "left");
?>
<?php if ($tbl_smsdata_archive_list->Slno->Visible) { // Slno ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->Slno) == "") { ?>
		<th data-name="Slno" class="<?php echo $tbl_smsdata_archive_list->Slno->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_Slno" class="tbl_smsdata_archive_Slno"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->Slno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Slno" class="<?php echo $tbl_smsdata_archive_list->Slno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->Slno) ?>', 2);"><div id="elh_tbl_smsdata_archive_Slno" class="tbl_smsdata_archive_Slno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->Slno->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->Slno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->Slno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $tbl_smsdata_archive_list->SMSDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_SMSDateTime" class="tbl_smsdata_archive_SMSDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $tbl_smsdata_archive_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SMSDateTime) ?>', 2);"><div id="elh_tbl_smsdata_archive_SMSDateTime" class="tbl_smsdata_archive_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->SystemDateTime->Visible) { // SystemDateTime ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SystemDateTime) == "") { ?>
		<th data-name="SystemDateTime" class="<?php echo $tbl_smsdata_archive_list->SystemDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_SystemDateTime" class="tbl_smsdata_archive_SystemDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SystemDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SystemDateTime" class="<?php echo $tbl_smsdata_archive_list->SystemDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SystemDateTime) ?>', 2);"><div id="elh_tbl_smsdata_archive_SystemDateTime" class="tbl_smsdata_archive_SystemDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SystemDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->SystemDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->SystemDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->ConfirmQueryDateTime) == "") { ?>
		<th data-name="ConfirmQueryDateTime" class="<?php echo $tbl_smsdata_archive_list->ConfirmQueryDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_ConfirmQueryDateTime" class="tbl_smsdata_archive_ConfirmQueryDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->ConfirmQueryDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConfirmQueryDateTime" class="<?php echo $tbl_smsdata_archive_list->ConfirmQueryDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->ConfirmQueryDateTime) ?>', 2);"><div id="elh_tbl_smsdata_archive_ConfirmQueryDateTime" class="tbl_smsdata_archive_ConfirmQueryDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->ConfirmQueryDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->ConfirmQueryDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->ConfirmQueryDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->ConfirmedDateTime) == "") { ?>
		<th data-name="ConfirmedDateTime" class="<?php echo $tbl_smsdata_archive_list->ConfirmedDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_ConfirmedDateTime" class="tbl_smsdata_archive_ConfirmedDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->ConfirmedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConfirmedDateTime" class="<?php echo $tbl_smsdata_archive_list->ConfirmedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->ConfirmedDateTime) ?>', 2);"><div id="elh_tbl_smsdata_archive_ConfirmedDateTime" class="tbl_smsdata_archive_ConfirmedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->ConfirmedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->ConfirmedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->ConfirmedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->SendDateTime->Visible) { // SendDateTime ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SendDateTime) == "") { ?>
		<th data-name="SendDateTime" class="<?php echo $tbl_smsdata_archive_list->SendDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_SendDateTime" class="tbl_smsdata_archive_SendDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SendDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SendDateTime" class="<?php echo $tbl_smsdata_archive_list->SendDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SendDateTime) ?>', 2);"><div id="elh_tbl_smsdata_archive_SendDateTime" class="tbl_smsdata_archive_SendDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SendDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->SendDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->SendDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->SMSText->Visible) { // SMSText ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SMSText) == "") { ?>
		<th data-name="SMSText" class="<?php echo $tbl_smsdata_archive_list->SMSText->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_SMSText" class="tbl_smsdata_archive_SMSText"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SMSText->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSText" class="<?php echo $tbl_smsdata_archive_list->SMSText->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SMSText) ?>', 2);"><div id="elh_tbl_smsdata_archive_SMSText" class="tbl_smsdata_archive_SMSText">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SMSText->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->SMSText->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->SMSText->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->Status->Visible) { // Status ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $tbl_smsdata_archive_list->Status->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_Status" class="tbl_smsdata_archive_Status"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $tbl_smsdata_archive_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->Status) ?>', 2);"><div id="elh_tbl_smsdata_archive_Status" class="tbl_smsdata_archive_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->obsremarks->Visible) { // obsremarks ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->obsremarks) == "") { ?>
		<th data-name="obsremarks" class="<?php echo $tbl_smsdata_archive_list->obsremarks->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_obsremarks" class="tbl_smsdata_archive_obsremarks"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->obsremarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obsremarks" class="<?php echo $tbl_smsdata_archive_list->obsremarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->obsremarks) ?>', 2);"><div id="elh_tbl_smsdata_archive_obsremarks" class="tbl_smsdata_archive_obsremarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->obsremarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->obsremarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->obsremarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SenderMobileNumber) == "") { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $tbl_smsdata_archive_list->SenderMobileNumber->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_SenderMobileNumber" class="tbl_smsdata_archive_SenderMobileNumber"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SenderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $tbl_smsdata_archive_list->SenderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SenderMobileNumber) ?>', 2);"><div id="elh_tbl_smsdata_archive_SenderMobileNumber" class="tbl_smsdata_archive_SenderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SenderMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->SenderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->SenderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->SubDivId->Visible) { // SubDivId ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SubDivId) == "") { ?>
		<th data-name="SubDivId" class="<?php echo $tbl_smsdata_archive_list->SubDivId->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_SubDivId" class="tbl_smsdata_archive_SubDivId"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SubDivId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivId" class="<?php echo $tbl_smsdata_archive_list->SubDivId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->SubDivId) ?>', 2);"><div id="elh_tbl_smsdata_archive_SubDivId" class="tbl_smsdata_archive_SubDivId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->SubDivId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->SubDivId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->SubDivId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->StationId->Visible) { // StationId ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $tbl_smsdata_archive_list->StationId->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_StationId" class="tbl_smsdata_archive_StationId"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $tbl_smsdata_archive_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->StationId) ?>', 2);"><div id="elh_tbl_smsdata_archive_StationId" class="tbl_smsdata_archive_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->IsFirstMsg->Visible) { // IsFirstMsg ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->IsFirstMsg) == "") { ?>
		<th data-name="IsFirstMsg" class="<?php echo $tbl_smsdata_archive_list->IsFirstMsg->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_IsFirstMsg" class="tbl_smsdata_archive_IsFirstMsg"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->IsFirstMsg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsFirstMsg" class="<?php echo $tbl_smsdata_archive_list->IsFirstMsg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->IsFirstMsg) ?>', 2);"><div id="elh_tbl_smsdata_archive_IsFirstMsg" class="tbl_smsdata_archive_IsFirstMsg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->IsFirstMsg->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->IsFirstMsg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->IsFirstMsg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->Validated->Visible) { // Validated ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->Validated) == "") { ?>
		<th data-name="Validated" class="<?php echo $tbl_smsdata_archive_list->Validated->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_Validated" class="tbl_smsdata_archive_Validated"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->Validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Validated" class="<?php echo $tbl_smsdata_archive_list->Validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->Validated) ?>', 2);"><div id="elh_tbl_smsdata_archive_Validated" class="tbl_smsdata_archive_Validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->Validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->Validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->Validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->isFreeze->Visible) { // isFreeze ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->isFreeze) == "") { ?>
		<th data-name="isFreeze" class="<?php echo $tbl_smsdata_archive_list->isFreeze->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_isFreeze" class="tbl_smsdata_archive_isFreeze"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->isFreeze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isFreeze" class="<?php echo $tbl_smsdata_archive_list->isFreeze->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->isFreeze) ?>', 2);"><div id="elh_tbl_smsdata_archive_isFreeze" class="tbl_smsdata_archive_isFreeze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->isFreeze->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->isFreeze->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->isFreeze->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->rainfall->Visible) { // rainfall ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $tbl_smsdata_archive_list->rainfall->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_rainfall" class="tbl_smsdata_archive_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $tbl_smsdata_archive_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->rainfall) ?>', 2);"><div id="elh_tbl_smsdata_archive_rainfall" class="tbl_smsdata_archive_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->min_air_temp->Visible) { // min_air_temp ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->min_air_temp) == "") { ?>
		<th data-name="min_air_temp" class="<?php echo $tbl_smsdata_archive_list->min_air_temp->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_min_air_temp" class="tbl_smsdata_archive_min_air_temp"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->min_air_temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="min_air_temp" class="<?php echo $tbl_smsdata_archive_list->min_air_temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->min_air_temp) ?>', 2);"><div id="elh_tbl_smsdata_archive_min_air_temp" class="tbl_smsdata_archive_min_air_temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->min_air_temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->min_air_temp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->min_air_temp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->max_air_temp->Visible) { // max_air_temp ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->max_air_temp) == "") { ?>
		<th data-name="max_air_temp" class="<?php echo $tbl_smsdata_archive_list->max_air_temp->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_max_air_temp" class="tbl_smsdata_archive_max_air_temp"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->max_air_temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="max_air_temp" class="<?php echo $tbl_smsdata_archive_list->max_air_temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->max_air_temp) ?>', 2);"><div id="elh_tbl_smsdata_archive_max_air_temp" class="tbl_smsdata_archive_max_air_temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->max_air_temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->max_air_temp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->max_air_temp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->atmospheric_pressure->Visible) { // atmospheric_pressure ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->atmospheric_pressure) == "") { ?>
		<th data-name="atmospheric_pressure" class="<?php echo $tbl_smsdata_archive_list->atmospheric_pressure->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_atmospheric_pressure" class="tbl_smsdata_archive_atmospheric_pressure"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->atmospheric_pressure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="atmospheric_pressure" class="<?php echo $tbl_smsdata_archive_list->atmospheric_pressure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->atmospheric_pressure) ?>', 2);"><div id="elh_tbl_smsdata_archive_atmospheric_pressure" class="tbl_smsdata_archive_atmospheric_pressure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->atmospheric_pressure->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->atmospheric_pressure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->atmospheric_pressure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->wind_speed->Visible) { // wind_speed ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->wind_speed) == "") { ?>
		<th data-name="wind_speed" class="<?php echo $tbl_smsdata_archive_list->wind_speed->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_wind_speed" class="tbl_smsdata_archive_wind_speed"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->wind_speed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="wind_speed" class="<?php echo $tbl_smsdata_archive_list->wind_speed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->wind_speed) ?>', 2);"><div id="elh_tbl_smsdata_archive_wind_speed" class="tbl_smsdata_archive_wind_speed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->wind_speed->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->wind_speed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->wind_speed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_archive_list->precipitation->Visible) { // precipitation ?>
	<?php if ($tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->precipitation) == "") { ?>
		<th data-name="precipitation" class="<?php echo $tbl_smsdata_archive_list->precipitation->headerCellClass() ?>"><div id="elh_tbl_smsdata_archive_precipitation" class="tbl_smsdata_archive_precipitation"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->precipitation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="precipitation" class="<?php echo $tbl_smsdata_archive_list->precipitation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_archive_list->SortUrl($tbl_smsdata_archive_list->precipitation) ?>', 2);"><div id="elh_tbl_smsdata_archive_precipitation" class="tbl_smsdata_archive_precipitation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_archive_list->precipitation->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_archive_list->precipitation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_archive_list->precipitation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tbl_smsdata_archive_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tbl_smsdata_archive_list->ExportAll && $tbl_smsdata_archive_list->isExport()) {
	$tbl_smsdata_archive_list->StopRecord = $tbl_smsdata_archive_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tbl_smsdata_archive_list->TotalRecords > $tbl_smsdata_archive_list->StartRecord + $tbl_smsdata_archive_list->DisplayRecords - 1)
		$tbl_smsdata_archive_list->StopRecord = $tbl_smsdata_archive_list->StartRecord + $tbl_smsdata_archive_list->DisplayRecords - 1;
	else
		$tbl_smsdata_archive_list->StopRecord = $tbl_smsdata_archive_list->TotalRecords;
}
$tbl_smsdata_archive_list->RecordCount = $tbl_smsdata_archive_list->StartRecord - 1;
if ($tbl_smsdata_archive_list->Recordset && !$tbl_smsdata_archive_list->Recordset->EOF) {
	$tbl_smsdata_archive_list->Recordset->moveFirst();
	$selectLimit = $tbl_smsdata_archive_list->UseSelectLimit;
	if (!$selectLimit && $tbl_smsdata_archive_list->StartRecord > 1)
		$tbl_smsdata_archive_list->Recordset->move($tbl_smsdata_archive_list->StartRecord - 1);
} elseif (!$tbl_smsdata_archive->AllowAddDeleteRow && $tbl_smsdata_archive_list->StopRecord == 0) {
	$tbl_smsdata_archive_list->StopRecord = $tbl_smsdata_archive->GridAddRowCount;
}

// Initialize aggregate
$tbl_smsdata_archive->RowType = ROWTYPE_AGGREGATEINIT;
$tbl_smsdata_archive->resetAttributes();
$tbl_smsdata_archive_list->renderRow();
while ($tbl_smsdata_archive_list->RecordCount < $tbl_smsdata_archive_list->StopRecord) {
	$tbl_smsdata_archive_list->RecordCount++;
	if ($tbl_smsdata_archive_list->RecordCount >= $tbl_smsdata_archive_list->StartRecord) {
		$tbl_smsdata_archive_list->RowCount++;

		// Set up key count
		$tbl_smsdata_archive_list->KeyCount = $tbl_smsdata_archive_list->RowIndex;

		// Init row class and style
		$tbl_smsdata_archive->resetAttributes();
		$tbl_smsdata_archive->CssClass = "";
		if ($tbl_smsdata_archive_list->isGridAdd()) {
		} else {
			$tbl_smsdata_archive_list->loadRowValues($tbl_smsdata_archive_list->Recordset); // Load row values
		}
		$tbl_smsdata_archive->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tbl_smsdata_archive->RowAttrs->merge(["data-rowindex" => $tbl_smsdata_archive_list->RowCount, "id" => "r" . $tbl_smsdata_archive_list->RowCount . "_tbl_smsdata_archive", "data-rowtype" => $tbl_smsdata_archive->RowType]);

		// Render row
		$tbl_smsdata_archive_list->renderRow();

		// Render list options
		$tbl_smsdata_archive_list->renderListOptions();
?>
	<tr <?php echo $tbl_smsdata_archive->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_smsdata_archive_list->ListOptions->render("body", "left", $tbl_smsdata_archive_list->RowCount);
?>
	<?php if ($tbl_smsdata_archive_list->Slno->Visible) { // Slno ?>
		<td data-name="Slno" <?php echo $tbl_smsdata_archive_list->Slno->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_Slno">
<span<?php echo $tbl_smsdata_archive_list->Slno->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->Slno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $tbl_smsdata_archive_list->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_SMSDateTime">
<span<?php echo $tbl_smsdata_archive_list->SMSDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->SystemDateTime->Visible) { // SystemDateTime ?>
		<td data-name="SystemDateTime" <?php echo $tbl_smsdata_archive_list->SystemDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_SystemDateTime">
<span<?php echo $tbl_smsdata_archive_list->SystemDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->SystemDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
		<td data-name="ConfirmQueryDateTime" <?php echo $tbl_smsdata_archive_list->ConfirmQueryDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_ConfirmQueryDateTime">
<span<?php echo $tbl_smsdata_archive_list->ConfirmQueryDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->ConfirmQueryDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
		<td data-name="ConfirmedDateTime" <?php echo $tbl_smsdata_archive_list->ConfirmedDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_ConfirmedDateTime">
<span<?php echo $tbl_smsdata_archive_list->ConfirmedDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->ConfirmedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->SendDateTime->Visible) { // SendDateTime ?>
		<td data-name="SendDateTime" <?php echo $tbl_smsdata_archive_list->SendDateTime->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_SendDateTime">
<span<?php echo $tbl_smsdata_archive_list->SendDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->SendDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->SMSText->Visible) { // SMSText ?>
		<td data-name="SMSText" <?php echo $tbl_smsdata_archive_list->SMSText->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_SMSText">
<span<?php echo $tbl_smsdata_archive_list->SMSText->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->SMSText->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $tbl_smsdata_archive_list->Status->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_Status">
<span<?php echo $tbl_smsdata_archive_list->Status->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->obsremarks->Visible) { // obsremarks ?>
		<td data-name="obsremarks" <?php echo $tbl_smsdata_archive_list->obsremarks->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_obsremarks">
<span<?php echo $tbl_smsdata_archive_list->obsremarks->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->obsremarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber" <?php echo $tbl_smsdata_archive_list->SenderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_SenderMobileNumber">
<span<?php echo $tbl_smsdata_archive_list->SenderMobileNumber->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->SenderMobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->SubDivId->Visible) { // SubDivId ?>
		<td data-name="SubDivId" <?php echo $tbl_smsdata_archive_list->SubDivId->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_SubDivId">
<span<?php echo $tbl_smsdata_archive_list->SubDivId->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->SubDivId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $tbl_smsdata_archive_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_StationId">
<span<?php echo $tbl_smsdata_archive_list->StationId->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->IsFirstMsg->Visible) { // IsFirstMsg ?>
		<td data-name="IsFirstMsg" <?php echo $tbl_smsdata_archive_list->IsFirstMsg->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_IsFirstMsg">
<span<?php echo $tbl_smsdata_archive_list->IsFirstMsg->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->IsFirstMsg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->Validated->Visible) { // Validated ?>
		<td data-name="Validated" <?php echo $tbl_smsdata_archive_list->Validated->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_Validated">
<span<?php echo $tbl_smsdata_archive_list->Validated->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->Validated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->isFreeze->Visible) { // isFreeze ?>
		<td data-name="isFreeze" <?php echo $tbl_smsdata_archive_list->isFreeze->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_isFreeze">
<span<?php echo $tbl_smsdata_archive_list->isFreeze->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_isFreeze" class="custom-control-input" value="<?php echo $tbl_smsdata_archive_list->isFreeze->getViewValue() ?>" disabled<?php if (ConvertToBool($tbl_smsdata_archive_list->isFreeze->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_isFreeze"></label></div></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $tbl_smsdata_archive_list->rainfall->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_rainfall">
<span<?php echo $tbl_smsdata_archive_list->rainfall->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->min_air_temp->Visible) { // min_air_temp ?>
		<td data-name="min_air_temp" <?php echo $tbl_smsdata_archive_list->min_air_temp->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_min_air_temp">
<span<?php echo $tbl_smsdata_archive_list->min_air_temp->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->min_air_temp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->max_air_temp->Visible) { // max_air_temp ?>
		<td data-name="max_air_temp" <?php echo $tbl_smsdata_archive_list->max_air_temp->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_max_air_temp">
<span<?php echo $tbl_smsdata_archive_list->max_air_temp->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->max_air_temp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->atmospheric_pressure->Visible) { // atmospheric_pressure ?>
		<td data-name="atmospheric_pressure" <?php echo $tbl_smsdata_archive_list->atmospheric_pressure->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_atmospheric_pressure">
<span<?php echo $tbl_smsdata_archive_list->atmospheric_pressure->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->atmospheric_pressure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->wind_speed->Visible) { // wind_speed ?>
		<td data-name="wind_speed" <?php echo $tbl_smsdata_archive_list->wind_speed->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_wind_speed">
<span<?php echo $tbl_smsdata_archive_list->wind_speed->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->wind_speed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_archive_list->precipitation->Visible) { // precipitation ?>
		<td data-name="precipitation" <?php echo $tbl_smsdata_archive_list->precipitation->cellAttributes() ?>>
<span id="el<?php echo $tbl_smsdata_archive_list->RowCount ?>_tbl_smsdata_archive_precipitation">
<span<?php echo $tbl_smsdata_archive_list->precipitation->viewAttributes() ?>><?php echo $tbl_smsdata_archive_list->precipitation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_smsdata_archive_list->ListOptions->render("body", "right", $tbl_smsdata_archive_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$tbl_smsdata_archive_list->isGridAdd())
		$tbl_smsdata_archive_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$tbl_smsdata_archive->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tbl_smsdata_archive_list->Recordset)
	$tbl_smsdata_archive_list->Recordset->Close();
?>
<?php if (!$tbl_smsdata_archive_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tbl_smsdata_archive_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_smsdata_archive_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_smsdata_archive_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tbl_smsdata_archive_list->TotalRecords == 0 && !$tbl_smsdata_archive->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tbl_smsdata_archive_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tbl_smsdata_archive_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tbl_smsdata_archive_list->isExport()) { ?>
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
$tbl_smsdata_archive_list->terminate();
?>