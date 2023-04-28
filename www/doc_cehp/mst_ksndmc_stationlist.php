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
$mst_ksndmc_station_list = new mst_ksndmc_station_list();

// Run the page
$mst_ksndmc_station_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mst_ksndmc_station_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mst_ksndmc_station_list->isExport()) { ?>
<script>
var fmst_ksndmc_stationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmst_ksndmc_stationlist = currentForm = new ew.Form("fmst_ksndmc_stationlist", "list");
	fmst_ksndmc_stationlist.formKeyCountName = '<?php echo $mst_ksndmc_station_list->FormKeyCountName ?>';
	loadjs.done("fmst_ksndmc_stationlist");
});
var fmst_ksndmc_stationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmst_ksndmc_stationlistsrch = currentSearchForm = new ew.Form("fmst_ksndmc_stationlistsrch");

	// Validate function for search
	fmst_ksndmc_stationlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fmst_ksndmc_stationlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmst_ksndmc_stationlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fmst_ksndmc_stationlistsrch.filterList = <?php echo $mst_ksndmc_station_list->getFilterList() ?>;
	loadjs.done("fmst_ksndmc_stationlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mst_ksndmc_station_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mst_ksndmc_station_list->TotalRecords > 0 && $mst_ksndmc_station_list->ExportOptions->visible()) { ?>
<?php $mst_ksndmc_station_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mst_ksndmc_station_list->ImportOptions->visible()) { ?>
<?php $mst_ksndmc_station_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mst_ksndmc_station_list->SearchOptions->visible()) { ?>
<?php $mst_ksndmc_station_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mst_ksndmc_station_list->FilterOptions->visible()) { ?>
<?php $mst_ksndmc_station_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mst_ksndmc_station_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mst_ksndmc_station_list->isExport() && !$mst_ksndmc_station->CurrentAction) { ?>
<form name="fmst_ksndmc_stationlistsrch" id="fmst_ksndmc_stationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmst_ksndmc_stationlistsrch-search-panel" class="<?php echo $mst_ksndmc_station_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mst_ksndmc_station">
	<div class="ew-extended-search">
<?php

// Render search row
$mst_ksndmc_station->RowType = ROWTYPE_SEARCH;
$mst_ksndmc_station->resetAttributes();
$mst_ksndmc_station_list->renderRow();
?>
<?php if ($mst_ksndmc_station_list->District_name->Visible) { // District_name ?>
	<?php
		$mst_ksndmc_station_list->SearchColumnCount++;
		if (($mst_ksndmc_station_list->SearchColumnCount - 1) % $mst_ksndmc_station_list->SearchFieldsPerRow == 0) {
			$mst_ksndmc_station_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $mst_ksndmc_station_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_District_name" class="ew-cell form-group">
		<label for="x_District_name" class="ew-search-caption ew-label"><?php echo $mst_ksndmc_station_list->District_name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_District_name" id="z_District_name" value="LIKE">
</span>
		<span id="el_mst_ksndmc_station_District_name" class="ew-search-field">
<input type="text" data-table="mst_ksndmc_station" data-field="x_District_name" name="x_District_name" id="x_District_name" size="30" maxlength="50" value="<?php echo $mst_ksndmc_station_list->District_name->EditValue ?>"<?php echo $mst_ksndmc_station_list->District_name->editAttributes() ?>>
</span>
	</div>
	<?php if ($mst_ksndmc_station_list->SearchColumnCount % $mst_ksndmc_station_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($mst_ksndmc_station_list->SearchColumnCount % $mst_ksndmc_station_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $mst_ksndmc_station_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mst_ksndmc_station_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mst_ksndmc_station_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mst_ksndmc_station_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mst_ksndmc_station_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mst_ksndmc_station_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mst_ksndmc_station_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mst_ksndmc_station_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mst_ksndmc_station_list->showPageHeader(); ?>
<?php
$mst_ksndmc_station_list->showMessage();
?>
<?php if ($mst_ksndmc_station_list->TotalRecords > 0 || $mst_ksndmc_station->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mst_ksndmc_station_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mst_ksndmc_station">
<?php if (!$mst_ksndmc_station_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mst_ksndmc_station_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mst_ksndmc_station_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mst_ksndmc_station_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmst_ksndmc_stationlist" id="fmst_ksndmc_stationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mst_ksndmc_station">
<div id="gmp_mst_ksndmc_station" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mst_ksndmc_station_list->TotalRecords > 0 || $mst_ksndmc_station_list->isGridEdit()) { ?>
<table id="tbl_mst_ksndmc_stationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mst_ksndmc_station->RowType = ROWTYPE_HEADER;

// Render list options
$mst_ksndmc_station_list->renderListOptions();

// Render list options (header, left)
$mst_ksndmc_station_list->ListOptions->render("header", "left");
?>
<?php if ($mst_ksndmc_station_list->Raingauge_id->Visible) { // Raingauge_id ?>
	<?php if ($mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->Raingauge_id) == "") { ?>
		<th data-name="Raingauge_id" class="<?php echo $mst_ksndmc_station_list->Raingauge_id->headerCellClass() ?>"><div id="elh_mst_ksndmc_station_Raingauge_id" class="mst_ksndmc_station_Raingauge_id"><div class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->Raingauge_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Raingauge_id" class="<?php echo $mst_ksndmc_station_list->Raingauge_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->Raingauge_id) ?>', 2);"><div id="elh_mst_ksndmc_station_Raingauge_id" class="mst_ksndmc_station_Raingauge_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->Raingauge_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mst_ksndmc_station_list->Raingauge_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_ksndmc_station_list->Raingauge_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_ksndmc_station_list->District_name->Visible) { // District_name ?>
	<?php if ($mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->District_name) == "") { ?>
		<th data-name="District_name" class="<?php echo $mst_ksndmc_station_list->District_name->headerCellClass() ?>"><div id="elh_mst_ksndmc_station_District_name" class="mst_ksndmc_station_District_name"><div class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->District_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="District_name" class="<?php echo $mst_ksndmc_station_list->District_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->District_name) ?>', 2);"><div id="elh_mst_ksndmc_station_District_name" class="mst_ksndmc_station_District_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->District_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mst_ksndmc_station_list->District_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_ksndmc_station_list->District_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_ksndmc_station_list->Taluka_name->Visible) { // Taluka_name ?>
	<?php if ($mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->Taluka_name) == "") { ?>
		<th data-name="Taluka_name" class="<?php echo $mst_ksndmc_station_list->Taluka_name->headerCellClass() ?>"><div id="elh_mst_ksndmc_station_Taluka_name" class="mst_ksndmc_station_Taluka_name"><div class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->Taluka_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Taluka_name" class="<?php echo $mst_ksndmc_station_list->Taluka_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->Taluka_name) ?>', 2);"><div id="elh_mst_ksndmc_station_Taluka_name" class="mst_ksndmc_station_Taluka_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->Taluka_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mst_ksndmc_station_list->Taluka_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_ksndmc_station_list->Taluka_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_ksndmc_station_list->station_name->Visible) { // station_name ?>
	<?php if ($mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->station_name) == "") { ?>
		<th data-name="station_name" class="<?php echo $mst_ksndmc_station_list->station_name->headerCellClass() ?>"><div id="elh_mst_ksndmc_station_station_name" class="mst_ksndmc_station_station_name"><div class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->station_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_name" class="<?php echo $mst_ksndmc_station_list->station_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->station_name) ?>', 2);"><div id="elh_mst_ksndmc_station_station_name" class="mst_ksndmc_station_station_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->station_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mst_ksndmc_station_list->station_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_ksndmc_station_list->station_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_ksndmc_station_list->station_latitude->Visible) { // station_latitude ?>
	<?php if ($mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->station_latitude) == "") { ?>
		<th data-name="station_latitude" class="<?php echo $mst_ksndmc_station_list->station_latitude->headerCellClass() ?>"><div id="elh_mst_ksndmc_station_station_latitude" class="mst_ksndmc_station_station_latitude"><div class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->station_latitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_latitude" class="<?php echo $mst_ksndmc_station_list->station_latitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->station_latitude) ?>', 2);"><div id="elh_mst_ksndmc_station_station_latitude" class="mst_ksndmc_station_station_latitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->station_latitude->caption() ?></span><span class="ew-table-header-sort"><?php if ($mst_ksndmc_station_list->station_latitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_ksndmc_station_list->station_latitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_ksndmc_station_list->station_longitude->Visible) { // station_longitude ?>
	<?php if ($mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->station_longitude) == "") { ?>
		<th data-name="station_longitude" class="<?php echo $mst_ksndmc_station_list->station_longitude->headerCellClass() ?>"><div id="elh_mst_ksndmc_station_station_longitude" class="mst_ksndmc_station_station_longitude"><div class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->station_longitude->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_longitude" class="<?php echo $mst_ksndmc_station_list->station_longitude->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_ksndmc_station_list->SortUrl($mst_ksndmc_station_list->station_longitude) ?>', 2);"><div id="elh_mst_ksndmc_station_station_longitude" class="mst_ksndmc_station_station_longitude">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_ksndmc_station_list->station_longitude->caption() ?></span><span class="ew-table-header-sort"><?php if ($mst_ksndmc_station_list->station_longitude->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_ksndmc_station_list->station_longitude->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mst_ksndmc_station_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mst_ksndmc_station_list->ExportAll && $mst_ksndmc_station_list->isExport()) {
	$mst_ksndmc_station_list->StopRecord = $mst_ksndmc_station_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mst_ksndmc_station_list->TotalRecords > $mst_ksndmc_station_list->StartRecord + $mst_ksndmc_station_list->DisplayRecords - 1)
		$mst_ksndmc_station_list->StopRecord = $mst_ksndmc_station_list->StartRecord + $mst_ksndmc_station_list->DisplayRecords - 1;
	else
		$mst_ksndmc_station_list->StopRecord = $mst_ksndmc_station_list->TotalRecords;
}
$mst_ksndmc_station_list->RecordCount = $mst_ksndmc_station_list->StartRecord - 1;
if ($mst_ksndmc_station_list->Recordset && !$mst_ksndmc_station_list->Recordset->EOF) {
	$mst_ksndmc_station_list->Recordset->moveFirst();
	$selectLimit = $mst_ksndmc_station_list->UseSelectLimit;
	if (!$selectLimit && $mst_ksndmc_station_list->StartRecord > 1)
		$mst_ksndmc_station_list->Recordset->move($mst_ksndmc_station_list->StartRecord - 1);
} elseif (!$mst_ksndmc_station->AllowAddDeleteRow && $mst_ksndmc_station_list->StopRecord == 0) {
	$mst_ksndmc_station_list->StopRecord = $mst_ksndmc_station->GridAddRowCount;
}

// Initialize aggregate
$mst_ksndmc_station->RowType = ROWTYPE_AGGREGATEINIT;
$mst_ksndmc_station->resetAttributes();
$mst_ksndmc_station_list->renderRow();
while ($mst_ksndmc_station_list->RecordCount < $mst_ksndmc_station_list->StopRecord) {
	$mst_ksndmc_station_list->RecordCount++;
	if ($mst_ksndmc_station_list->RecordCount >= $mst_ksndmc_station_list->StartRecord) {
		$mst_ksndmc_station_list->RowCount++;

		// Set up key count
		$mst_ksndmc_station_list->KeyCount = $mst_ksndmc_station_list->RowIndex;

		// Init row class and style
		$mst_ksndmc_station->resetAttributes();
		$mst_ksndmc_station->CssClass = "";
		if ($mst_ksndmc_station_list->isGridAdd()) {
		} else {
			$mst_ksndmc_station_list->loadRowValues($mst_ksndmc_station_list->Recordset); // Load row values
		}
		$mst_ksndmc_station->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mst_ksndmc_station->RowAttrs->merge(["data-rowindex" => $mst_ksndmc_station_list->RowCount, "id" => "r" . $mst_ksndmc_station_list->RowCount . "_mst_ksndmc_station", "data-rowtype" => $mst_ksndmc_station->RowType]);

		// Render row
		$mst_ksndmc_station_list->renderRow();

		// Render list options
		$mst_ksndmc_station_list->renderListOptions();
?>
	<tr <?php echo $mst_ksndmc_station->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mst_ksndmc_station_list->ListOptions->render("body", "left", $mst_ksndmc_station_list->RowCount);
?>
	<?php if ($mst_ksndmc_station_list->Raingauge_id->Visible) { // Raingauge_id ?>
		<td data-name="Raingauge_id" <?php echo $mst_ksndmc_station_list->Raingauge_id->cellAttributes() ?>>
<span id="el<?php echo $mst_ksndmc_station_list->RowCount ?>_mst_ksndmc_station_Raingauge_id">
<span<?php echo $mst_ksndmc_station_list->Raingauge_id->viewAttributes() ?>><?php echo $mst_ksndmc_station_list->Raingauge_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_ksndmc_station_list->District_name->Visible) { // District_name ?>
		<td data-name="District_name" <?php echo $mst_ksndmc_station_list->District_name->cellAttributes() ?>>
<span id="el<?php echo $mst_ksndmc_station_list->RowCount ?>_mst_ksndmc_station_District_name">
<span<?php echo $mst_ksndmc_station_list->District_name->viewAttributes() ?>><?php echo $mst_ksndmc_station_list->District_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_ksndmc_station_list->Taluka_name->Visible) { // Taluka_name ?>
		<td data-name="Taluka_name" <?php echo $mst_ksndmc_station_list->Taluka_name->cellAttributes() ?>>
<span id="el<?php echo $mst_ksndmc_station_list->RowCount ?>_mst_ksndmc_station_Taluka_name">
<span<?php echo $mst_ksndmc_station_list->Taluka_name->viewAttributes() ?>><?php echo $mst_ksndmc_station_list->Taluka_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_ksndmc_station_list->station_name->Visible) { // station_name ?>
		<td data-name="station_name" <?php echo $mst_ksndmc_station_list->station_name->cellAttributes() ?>>
<span id="el<?php echo $mst_ksndmc_station_list->RowCount ?>_mst_ksndmc_station_station_name">
<span<?php echo $mst_ksndmc_station_list->station_name->viewAttributes() ?>><?php echo $mst_ksndmc_station_list->station_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_ksndmc_station_list->station_latitude->Visible) { // station_latitude ?>
		<td data-name="station_latitude" <?php echo $mst_ksndmc_station_list->station_latitude->cellAttributes() ?>>
<span id="el<?php echo $mst_ksndmc_station_list->RowCount ?>_mst_ksndmc_station_station_latitude">
<span<?php echo $mst_ksndmc_station_list->station_latitude->viewAttributes() ?>><?php echo $mst_ksndmc_station_list->station_latitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_ksndmc_station_list->station_longitude->Visible) { // station_longitude ?>
		<td data-name="station_longitude" <?php echo $mst_ksndmc_station_list->station_longitude->cellAttributes() ?>>
<span id="el<?php echo $mst_ksndmc_station_list->RowCount ?>_mst_ksndmc_station_station_longitude">
<span<?php echo $mst_ksndmc_station_list->station_longitude->viewAttributes() ?>><?php echo $mst_ksndmc_station_list->station_longitude->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mst_ksndmc_station_list->ListOptions->render("body", "right", $mst_ksndmc_station_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mst_ksndmc_station_list->isGridAdd())
		$mst_ksndmc_station_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mst_ksndmc_station->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mst_ksndmc_station_list->Recordset)
	$mst_ksndmc_station_list->Recordset->Close();
?>
<?php if (!$mst_ksndmc_station_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mst_ksndmc_station_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mst_ksndmc_station_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mst_ksndmc_station_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mst_ksndmc_station_list->TotalRecords == 0 && !$mst_ksndmc_station->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mst_ksndmc_station_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mst_ksndmc_station_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mst_ksndmc_station_list->isExport()) { ?>
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
$mst_ksndmc_station_list->terminate();
?>