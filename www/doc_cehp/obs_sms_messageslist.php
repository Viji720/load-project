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
$obs_sms_messages_list = new obs_sms_messages_list();

// Run the page
$obs_sms_messages_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_sms_messages_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$obs_sms_messages_list->isExport()) { ?>
<script>
var fobs_sms_messageslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fobs_sms_messageslist = currentForm = new ew.Form("fobs_sms_messageslist", "list");
	fobs_sms_messageslist.formKeyCountName = '<?php echo $obs_sms_messages_list->FormKeyCountName ?>';
	loadjs.done("fobs_sms_messageslist");
});
var fobs_sms_messageslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fobs_sms_messageslistsrch = currentSearchForm = new ew.Form("fobs_sms_messageslistsrch");

	// Dynamic selection lists
	// Filters

	fobs_sms_messageslistsrch.filterList = <?php echo $obs_sms_messages_list->getFilterList() ?>;
	loadjs.done("fobs_sms_messageslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$obs_sms_messages_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($obs_sms_messages_list->TotalRecords > 0 && $obs_sms_messages_list->ExportOptions->visible()) { ?>
<?php $obs_sms_messages_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($obs_sms_messages_list->ImportOptions->visible()) { ?>
<?php $obs_sms_messages_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($obs_sms_messages_list->SearchOptions->visible()) { ?>
<?php $obs_sms_messages_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($obs_sms_messages_list->FilterOptions->visible()) { ?>
<?php $obs_sms_messages_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$obs_sms_messages_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$obs_sms_messages_list->isExport() && !$obs_sms_messages->CurrentAction) { ?>
<form name="fobs_sms_messageslistsrch" id="fobs_sms_messageslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fobs_sms_messageslistsrch-search-panel" class="<?php echo $obs_sms_messages_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="obs_sms_messages">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $obs_sms_messages_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($obs_sms_messages_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($obs_sms_messages_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $obs_sms_messages_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($obs_sms_messages_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($obs_sms_messages_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($obs_sms_messages_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($obs_sms_messages_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $obs_sms_messages_list->showPageHeader(); ?>
<?php
$obs_sms_messages_list->showMessage();
?>
<?php if ($obs_sms_messages_list->TotalRecords > 0 || $obs_sms_messages->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($obs_sms_messages_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> obs_sms_messages">
<?php if (!$obs_sms_messages_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$obs_sms_messages_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $obs_sms_messages_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $obs_sms_messages_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fobs_sms_messageslist" id="fobs_sms_messageslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_sms_messages">
<div id="gmp_obs_sms_messages" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($obs_sms_messages_list->TotalRecords > 0 || $obs_sms_messages_list->isGridEdit()) { ?>
<table id="tbl_obs_sms_messageslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$obs_sms_messages->RowType = ROWTYPE_HEADER;

// Render list options
$obs_sms_messages_list->renderListOptions();

// Render list options (header, left)
$obs_sms_messages_list->ListOptions->render("header", "left");
?>
<?php if ($obs_sms_messages_list->message_id->Visible) { // message_id ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->message_id) == "") { ?>
		<th data-name="message_id" class="<?php echo $obs_sms_messages_list->message_id->headerCellClass() ?>"><div id="elh_obs_sms_messages_message_id" class="obs_sms_messages_message_id"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->message_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="message_id" class="<?php echo $obs_sms_messages_list->message_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->message_id) ?>', 2);"><div id="elh_obs_sms_messages_message_id" class="obs_sms_messages_message_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->message_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->message_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->message_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_sms_messages_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $obs_sms_messages_list->SMSDateTime->headerCellClass() ?>"><div id="elh_obs_sms_messages_SMSDateTime" class="obs_sms_messages_SMSDateTime"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $obs_sms_messages_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->SMSDateTime) ?>', 2);"><div id="elh_obs_sms_messages_SMSDateTime" class="obs_sms_messages_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_sms_messages_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $obs_sms_messages_list->MobileNumber->headerCellClass() ?>"><div id="elh_obs_sms_messages_MobileNumber" class="obs_sms_messages_MobileNumber"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $obs_sms_messages_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->MobileNumber) ?>', 2);"><div id="elh_obs_sms_messages_MobileNumber" class="obs_sms_messages_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_sms_messages_list->SystemDateTime->Visible) { // SystemDateTime ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->SystemDateTime) == "") { ?>
		<th data-name="SystemDateTime" class="<?php echo $obs_sms_messages_list->SystemDateTime->headerCellClass() ?>"><div id="elh_obs_sms_messages_SystemDateTime" class="obs_sms_messages_SystemDateTime"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->SystemDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SystemDateTime" class="<?php echo $obs_sms_messages_list->SystemDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->SystemDateTime) ?>', 2);"><div id="elh_obs_sms_messages_SystemDateTime" class="obs_sms_messages_SystemDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->SystemDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->SystemDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->SystemDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_sms_messages_list->rainfall->Visible) { // rainfall ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $obs_sms_messages_list->rainfall->headerCellClass() ?>"><div id="elh_obs_sms_messages_rainfall" class="obs_sms_messages_rainfall"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $obs_sms_messages_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->rainfall) ?>', 2);"><div id="elh_obs_sms_messages_rainfall" class="obs_sms_messages_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_sms_messages_list->stationid->Visible) { // stationid ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->stationid) == "") { ?>
		<th data-name="stationid" class="<?php echo $obs_sms_messages_list->stationid->headerCellClass() ?>"><div id="elh_obs_sms_messages_stationid" class="obs_sms_messages_stationid"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->stationid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stationid" class="<?php echo $obs_sms_messages_list->stationid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->stationid) ?>', 2);"><div id="elh_obs_sms_messages_stationid" class="obs_sms_messages_stationid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->stationid->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->stationid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->stationid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_sms_messages_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $obs_sms_messages_list->SubDivisionId->headerCellClass() ?>"><div id="elh_obs_sms_messages_SubDivisionId" class="obs_sms_messages_SubDivisionId"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $obs_sms_messages_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->SubDivisionId) ?>', 2);"><div id="elh_obs_sms_messages_SubDivisionId" class="obs_sms_messages_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_sms_messages_list->SMSText->Visible) { // SMSText ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->SMSText) == "") { ?>
		<th data-name="SMSText" class="<?php echo $obs_sms_messages_list->SMSText->headerCellClass() ?>"><div id="elh_obs_sms_messages_SMSText" class="obs_sms_messages_SMSText"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->SMSText->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSText" class="<?php echo $obs_sms_messages_list->SMSText->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->SMSText) ?>', 2);"><div id="elh_obs_sms_messages_SMSText" class="obs_sms_messages_SMSText">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->SMSText->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->SMSText->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->SMSText->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_sms_messages_list->sms_statusid->Visible) { // sms_statusid ?>
	<?php if ($obs_sms_messages_list->SortUrl($obs_sms_messages_list->sms_statusid) == "") { ?>
		<th data-name="sms_statusid" class="<?php echo $obs_sms_messages_list->sms_statusid->headerCellClass() ?>"><div id="elh_obs_sms_messages_sms_statusid" class="obs_sms_messages_sms_statusid"><div class="ew-table-header-caption"><?php echo $obs_sms_messages_list->sms_statusid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sms_statusid" class="<?php echo $obs_sms_messages_list->sms_statusid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_sms_messages_list->SortUrl($obs_sms_messages_list->sms_statusid) ?>', 2);"><div id="elh_obs_sms_messages_sms_statusid" class="obs_sms_messages_sms_statusid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_sms_messages_list->sms_statusid->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_sms_messages_list->sms_statusid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_sms_messages_list->sms_statusid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$obs_sms_messages_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($obs_sms_messages_list->ExportAll && $obs_sms_messages_list->isExport()) {
	$obs_sms_messages_list->StopRecord = $obs_sms_messages_list->TotalRecords;
} else {

	// Set the last record to display
	if ($obs_sms_messages_list->TotalRecords > $obs_sms_messages_list->StartRecord + $obs_sms_messages_list->DisplayRecords - 1)
		$obs_sms_messages_list->StopRecord = $obs_sms_messages_list->StartRecord + $obs_sms_messages_list->DisplayRecords - 1;
	else
		$obs_sms_messages_list->StopRecord = $obs_sms_messages_list->TotalRecords;
}
$obs_sms_messages_list->RecordCount = $obs_sms_messages_list->StartRecord - 1;
if ($obs_sms_messages_list->Recordset && !$obs_sms_messages_list->Recordset->EOF) {
	$obs_sms_messages_list->Recordset->moveFirst();
	$selectLimit = $obs_sms_messages_list->UseSelectLimit;
	if (!$selectLimit && $obs_sms_messages_list->StartRecord > 1)
		$obs_sms_messages_list->Recordset->move($obs_sms_messages_list->StartRecord - 1);
} elseif (!$obs_sms_messages->AllowAddDeleteRow && $obs_sms_messages_list->StopRecord == 0) {
	$obs_sms_messages_list->StopRecord = $obs_sms_messages->GridAddRowCount;
}

// Initialize aggregate
$obs_sms_messages->RowType = ROWTYPE_AGGREGATEINIT;
$obs_sms_messages->resetAttributes();
$obs_sms_messages_list->renderRow();
while ($obs_sms_messages_list->RecordCount < $obs_sms_messages_list->StopRecord) {
	$obs_sms_messages_list->RecordCount++;
	if ($obs_sms_messages_list->RecordCount >= $obs_sms_messages_list->StartRecord) {
		$obs_sms_messages_list->RowCount++;

		// Set up key count
		$obs_sms_messages_list->KeyCount = $obs_sms_messages_list->RowIndex;

		// Init row class and style
		$obs_sms_messages->resetAttributes();
		$obs_sms_messages->CssClass = "";
		if ($obs_sms_messages_list->isGridAdd()) {
		} else {
			$obs_sms_messages_list->loadRowValues($obs_sms_messages_list->Recordset); // Load row values
		}
		$obs_sms_messages->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$obs_sms_messages->RowAttrs->merge(["data-rowindex" => $obs_sms_messages_list->RowCount, "id" => "r" . $obs_sms_messages_list->RowCount . "_obs_sms_messages", "data-rowtype" => $obs_sms_messages->RowType]);

		// Render row
		$obs_sms_messages_list->renderRow();

		// Render list options
		$obs_sms_messages_list->renderListOptions();
?>
	<tr <?php echo $obs_sms_messages->rowAttributes() ?>>
<?php

// Render list options (body, left)
$obs_sms_messages_list->ListOptions->render("body", "left", $obs_sms_messages_list->RowCount);
?>
	<?php if ($obs_sms_messages_list->message_id->Visible) { // message_id ?>
		<td data-name="message_id" <?php echo $obs_sms_messages_list->message_id->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_message_id">
<span<?php echo $obs_sms_messages_list->message_id->viewAttributes() ?>><?php echo $obs_sms_messages_list->message_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_sms_messages_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $obs_sms_messages_list->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_SMSDateTime">
<span<?php echo $obs_sms_messages_list->SMSDateTime->viewAttributes() ?>><?php echo $obs_sms_messages_list->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_sms_messages_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $obs_sms_messages_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_MobileNumber">
<span<?php echo $obs_sms_messages_list->MobileNumber->viewAttributes() ?>><?php echo $obs_sms_messages_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_sms_messages_list->SystemDateTime->Visible) { // SystemDateTime ?>
		<td data-name="SystemDateTime" <?php echo $obs_sms_messages_list->SystemDateTime->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_SystemDateTime">
<span<?php echo $obs_sms_messages_list->SystemDateTime->viewAttributes() ?>><?php echo $obs_sms_messages_list->SystemDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_sms_messages_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $obs_sms_messages_list->rainfall->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_rainfall">
<span<?php echo $obs_sms_messages_list->rainfall->viewAttributes() ?>><?php echo $obs_sms_messages_list->rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_sms_messages_list->stationid->Visible) { // stationid ?>
		<td data-name="stationid" <?php echo $obs_sms_messages_list->stationid->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_stationid">
<span<?php echo $obs_sms_messages_list->stationid->viewAttributes() ?>><?php echo $obs_sms_messages_list->stationid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_sms_messages_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $obs_sms_messages_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_SubDivisionId">
<span<?php echo $obs_sms_messages_list->SubDivisionId->viewAttributes() ?>><?php echo $obs_sms_messages_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_sms_messages_list->SMSText->Visible) { // SMSText ?>
		<td data-name="SMSText" <?php echo $obs_sms_messages_list->SMSText->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_SMSText">
<span<?php echo $obs_sms_messages_list->SMSText->viewAttributes() ?>><?php echo $obs_sms_messages_list->SMSText->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_sms_messages_list->sms_statusid->Visible) { // sms_statusid ?>
		<td data-name="sms_statusid" <?php echo $obs_sms_messages_list->sms_statusid->cellAttributes() ?>>
<span id="el<?php echo $obs_sms_messages_list->RowCount ?>_obs_sms_messages_sms_statusid">
<span<?php echo $obs_sms_messages_list->sms_statusid->viewAttributes() ?>><?php echo $obs_sms_messages_list->sms_statusid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$obs_sms_messages_list->ListOptions->render("body", "right", $obs_sms_messages_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$obs_sms_messages_list->isGridAdd())
		$obs_sms_messages_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$obs_sms_messages->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($obs_sms_messages_list->Recordset)
	$obs_sms_messages_list->Recordset->Close();
?>
<?php if (!$obs_sms_messages_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$obs_sms_messages_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $obs_sms_messages_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $obs_sms_messages_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($obs_sms_messages_list->TotalRecords == 0 && !$obs_sms_messages->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $obs_sms_messages_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$obs_sms_messages_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$obs_sms_messages_list->isExport()) { ?>
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
$obs_sms_messages_list->terminate();
?>