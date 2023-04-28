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
$vw_rpt_dmcreport_list = new vw_rpt_dmcreport_list();

// Run the page
$vw_rpt_dmcreport_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_rpt_dmcreport_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_rpt_dmcreport_list->isExport()) { ?>
<script>
var fvw_rpt_dmcreportlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_rpt_dmcreportlist = currentForm = new ew.Form("fvw_rpt_dmcreportlist", "list");
	fvw_rpt_dmcreportlist.formKeyCountName = '<?php echo $vw_rpt_dmcreport_list->FormKeyCountName ?>';
	loadjs.done("fvw_rpt_dmcreportlist");
});
var fvw_rpt_dmcreportlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_rpt_dmcreportlistsrch = currentSearchForm = new ew.Form("fvw_rpt_dmcreportlistsrch");

	// Validate function for search
	fvw_rpt_dmcreportlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_obs_datetime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_dmcreport_list->obs_datetime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_rpt_dmcreportlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_rpt_dmcreportlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fvw_rpt_dmcreportlistsrch.filterList = <?php echo $vw_rpt_dmcreport_list->getFilterList() ?>;
	loadjs.done("fvw_rpt_dmcreportlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_rpt_dmcreport_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_rpt_dmcreport_list->TotalRecords > 0 && $vw_rpt_dmcreport_list->ExportOptions->visible()) { ?>
<?php $vw_rpt_dmcreport_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->ImportOptions->visible()) { ?>
<?php $vw_rpt_dmcreport_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->SearchOptions->visible()) { ?>
<?php $vw_rpt_dmcreport_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->FilterOptions->visible()) { ?>
<?php $vw_rpt_dmcreport_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_rpt_dmcreport_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_rpt_dmcreport_list->isExport() && !$vw_rpt_dmcreport->CurrentAction) { ?>
<form name="fvw_rpt_dmcreportlistsrch" id="fvw_rpt_dmcreportlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_rpt_dmcreportlistsrch-search-panel" class="<?php echo $vw_rpt_dmcreport_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_rpt_dmcreport">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_rpt_dmcreport->RowType = ROWTYPE_SEARCH;
$vw_rpt_dmcreport->resetAttributes();
$vw_rpt_dmcreport_list->renderRow();
?>
<?php if ($vw_rpt_dmcreport_list->obs_datetime->Visible) { // obs_datetime ?>
	<?php
		$vw_rpt_dmcreport_list->SearchColumnCount++;
		if (($vw_rpt_dmcreport_list->SearchColumnCount - 1) % $vw_rpt_dmcreport_list->SearchFieldsPerRow == 0) {
			$vw_rpt_dmcreport_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_dmcreport_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_obs_datetime" class="ew-cell form-group">
		<label for="x_obs_datetime" class="ew-search-caption ew-label"><?php echo $vw_rpt_dmcreport_list->obs_datetime->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_obs_datetime" id="z_obs_datetime" value="BETWEEN">
</span>
		<span id="el_vw_rpt_dmcreport_obs_datetime" class="ew-search-field">
<input type="text" data-table="vw_rpt_dmcreport" data-field="x_obs_datetime" data-format="7" name="x_obs_datetime" id="x_obs_datetime" maxlength="19" value="<?php echo $vw_rpt_dmcreport_list->obs_datetime->EditValue ?>"<?php echo $vw_rpt_dmcreport_list->obs_datetime->editAttributes() ?>>
<?php if (!$vw_rpt_dmcreport_list->obs_datetime->ReadOnly && !$vw_rpt_dmcreport_list->obs_datetime->Disabled && !isset($vw_rpt_dmcreport_list->obs_datetime->EditAttrs["readonly"]) && !isset($vw_rpt_dmcreport_list->obs_datetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_dmcreportlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_dmcreportlistsrch", "x_obs_datetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_dmcreport_obs_datetime" class="ew-search-field2">
<input type="text" data-table="vw_rpt_dmcreport" data-field="x_obs_datetime" data-format="7" name="y_obs_datetime" id="y_obs_datetime" maxlength="19" value="<?php echo $vw_rpt_dmcreport_list->obs_datetime->EditValue2 ?>"<?php echo $vw_rpt_dmcreport_list->obs_datetime->editAttributes() ?>>
<?php if (!$vw_rpt_dmcreport_list->obs_datetime->ReadOnly && !$vw_rpt_dmcreport_list->obs_datetime->Disabled && !isset($vw_rpt_dmcreport_list->obs_datetime->EditAttrs["readonly"]) && !isset($vw_rpt_dmcreport_list->obs_datetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_dmcreportlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_dmcreportlistsrch", "y_obs_datetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($vw_rpt_dmcreport_list->SearchColumnCount % $vw_rpt_dmcreport_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_rpt_dmcreport_list->SearchColumnCount % $vw_rpt_dmcreport_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_rpt_dmcreport_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_rpt_dmcreport_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_rpt_dmcreport_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_rpt_dmcreport_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_rpt_dmcreport_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_dmcreport_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_dmcreport_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_dmcreport_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_rpt_dmcreport_list->showPageHeader(); ?>
<?php
$vw_rpt_dmcreport_list->showMessage();
?>
<?php if ($vw_rpt_dmcreport_list->TotalRecords > 0 || $vw_rpt_dmcreport->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_rpt_dmcreport_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_rpt_dmcreport">
<?php if (!$vw_rpt_dmcreport_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_rpt_dmcreport_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_dmcreport_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_dmcreport_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_rpt_dmcreportlist" id="fvw_rpt_dmcreportlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_rpt_dmcreport">
<div id="gmp_vw_rpt_dmcreport" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_rpt_dmcreport_list->TotalRecords > 0 || $vw_rpt_dmcreport_list->isGridEdit()) { ?>
<table id="tbl_vw_rpt_dmcreportlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_rpt_dmcreport->RowType = ROWTYPE_HEADER;

// Render list options
$vw_rpt_dmcreport_list->renderListOptions();

// Render list options (header, left)
$vw_rpt_dmcreport_list->ListOptions->render("header", "left");
?>
<?php if ($vw_rpt_dmcreport_list->Raingauge_id->Visible) { // Raingauge_id ?>
	<?php if ($vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->Raingauge_id) == "") { ?>
		<th data-name="Raingauge_id" class="<?php echo $vw_rpt_dmcreport_list->Raingauge_id->headerCellClass() ?>"><div id="elh_vw_rpt_dmcreport_Raingauge_id" class="vw_rpt_dmcreport_Raingauge_id"><div class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->Raingauge_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Raingauge_id" class="<?php echo $vw_rpt_dmcreport_list->Raingauge_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->Raingauge_id) ?>', 2);"><div id="elh_vw_rpt_dmcreport_Raingauge_id" class="vw_rpt_dmcreport_Raingauge_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->Raingauge_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_dmcreport_list->Raingauge_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_dmcreport_list->Raingauge_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->obs_datetime->Visible) { // obs_datetime ?>
	<?php if ($vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->obs_datetime) == "") { ?>
		<th data-name="obs_datetime" class="<?php echo $vw_rpt_dmcreport_list->obs_datetime->headerCellClass() ?>"><div id="elh_vw_rpt_dmcreport_obs_datetime" class="vw_rpt_dmcreport_obs_datetime"><div class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->obs_datetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_datetime" class="<?php echo $vw_rpt_dmcreport_list->obs_datetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->obs_datetime) ?>', 2);"><div id="elh_vw_rpt_dmcreport_obs_datetime" class="vw_rpt_dmcreport_obs_datetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->obs_datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_dmcreport_list->obs_datetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_dmcreport_list->obs_datetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->District_name->Visible) { // District_name ?>
	<?php if ($vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->District_name) == "") { ?>
		<th data-name="District_name" class="<?php echo $vw_rpt_dmcreport_list->District_name->headerCellClass() ?>"><div id="elh_vw_rpt_dmcreport_District_name" class="vw_rpt_dmcreport_District_name"><div class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->District_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="District_name" class="<?php echo $vw_rpt_dmcreport_list->District_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->District_name) ?>', 2);"><div id="elh_vw_rpt_dmcreport_District_name" class="vw_rpt_dmcreport_District_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->District_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_dmcreport_list->District_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_dmcreport_list->District_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->Taluka_name->Visible) { // Taluka_name ?>
	<?php if ($vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->Taluka_name) == "") { ?>
		<th data-name="Taluka_name" class="<?php echo $vw_rpt_dmcreport_list->Taluka_name->headerCellClass() ?>"><div id="elh_vw_rpt_dmcreport_Taluka_name" class="vw_rpt_dmcreport_Taluka_name"><div class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->Taluka_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Taluka_name" class="<?php echo $vw_rpt_dmcreport_list->Taluka_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->Taluka_name) ?>', 2);"><div id="elh_vw_rpt_dmcreport_Taluka_name" class="vw_rpt_dmcreport_Taluka_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->Taluka_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_dmcreport_list->Taluka_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_dmcreport_list->Taluka_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->station_name->Visible) { // station_name ?>
	<?php if ($vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->station_name) == "") { ?>
		<th data-name="station_name" class="<?php echo $vw_rpt_dmcreport_list->station_name->headerCellClass() ?>"><div id="elh_vw_rpt_dmcreport_station_name" class="vw_rpt_dmcreport_station_name"><div class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->station_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="station_name" class="<?php echo $vw_rpt_dmcreport_list->station_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->station_name) ?>', 2);"><div id="elh_vw_rpt_dmcreport_station_name" class="vw_rpt_dmcreport_station_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->station_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_dmcreport_list->station_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_dmcreport_list->station_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->rainfall->Visible) { // rainfall ?>
	<?php if ($vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $vw_rpt_dmcreport_list->rainfall->headerCellClass() ?>"><div id="elh_vw_rpt_dmcreport_rainfall" class="vw_rpt_dmcreport_rainfall"><div class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $vw_rpt_dmcreport_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_dmcreport_list->SortUrl($vw_rpt_dmcreport_list->rainfall) ?>', 2);"><div id="elh_vw_rpt_dmcreport_rainfall" class="vw_rpt_dmcreport_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_dmcreport_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_dmcreport_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_dmcreport_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_rpt_dmcreport_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_rpt_dmcreport_list->ExportAll && $vw_rpt_dmcreport_list->isExport()) {
	$vw_rpt_dmcreport_list->StopRecord = $vw_rpt_dmcreport_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_rpt_dmcreport_list->TotalRecords > $vw_rpt_dmcreport_list->StartRecord + $vw_rpt_dmcreport_list->DisplayRecords - 1)
		$vw_rpt_dmcreport_list->StopRecord = $vw_rpt_dmcreport_list->StartRecord + $vw_rpt_dmcreport_list->DisplayRecords - 1;
	else
		$vw_rpt_dmcreport_list->StopRecord = $vw_rpt_dmcreport_list->TotalRecords;
}
$vw_rpt_dmcreport_list->RecordCount = $vw_rpt_dmcreport_list->StartRecord - 1;
if ($vw_rpt_dmcreport_list->Recordset && !$vw_rpt_dmcreport_list->Recordset->EOF) {
	$vw_rpt_dmcreport_list->Recordset->moveFirst();
	$selectLimit = $vw_rpt_dmcreport_list->UseSelectLimit;
	if (!$selectLimit && $vw_rpt_dmcreport_list->StartRecord > 1)
		$vw_rpt_dmcreport_list->Recordset->move($vw_rpt_dmcreport_list->StartRecord - 1);
} elseif (!$vw_rpt_dmcreport->AllowAddDeleteRow && $vw_rpt_dmcreport_list->StopRecord == 0) {
	$vw_rpt_dmcreport_list->StopRecord = $vw_rpt_dmcreport->GridAddRowCount;
}

// Initialize aggregate
$vw_rpt_dmcreport->RowType = ROWTYPE_AGGREGATEINIT;
$vw_rpt_dmcreport->resetAttributes();
$vw_rpt_dmcreport_list->renderRow();
while ($vw_rpt_dmcreport_list->RecordCount < $vw_rpt_dmcreport_list->StopRecord) {
	$vw_rpt_dmcreport_list->RecordCount++;
	if ($vw_rpt_dmcreport_list->RecordCount >= $vw_rpt_dmcreport_list->StartRecord) {
		$vw_rpt_dmcreport_list->RowCount++;

		// Set up key count
		$vw_rpt_dmcreport_list->KeyCount = $vw_rpt_dmcreport_list->RowIndex;

		// Init row class and style
		$vw_rpt_dmcreport->resetAttributes();
		$vw_rpt_dmcreport->CssClass = "";
		if ($vw_rpt_dmcreport_list->isGridAdd()) {
		} else {
			$vw_rpt_dmcreport_list->loadRowValues($vw_rpt_dmcreport_list->Recordset); // Load row values
		}
		$vw_rpt_dmcreport->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_rpt_dmcreport->RowAttrs->merge(["data-rowindex" => $vw_rpt_dmcreport_list->RowCount, "id" => "r" . $vw_rpt_dmcreport_list->RowCount . "_vw_rpt_dmcreport", "data-rowtype" => $vw_rpt_dmcreport->RowType]);

		// Render row
		$vw_rpt_dmcreport_list->renderRow();

		// Render list options
		$vw_rpt_dmcreport_list->renderListOptions();
?>
	<tr <?php echo $vw_rpt_dmcreport->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_rpt_dmcreport_list->ListOptions->render("body", "left", $vw_rpt_dmcreport_list->RowCount);
?>
	<?php if ($vw_rpt_dmcreport_list->Raingauge_id->Visible) { // Raingauge_id ?>
		<td data-name="Raingauge_id" <?php echo $vw_rpt_dmcreport_list->Raingauge_id->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_dmcreport_list->RowCount ?>_vw_rpt_dmcreport_Raingauge_id">
<span<?php echo $vw_rpt_dmcreport_list->Raingauge_id->viewAttributes() ?>><?php echo $vw_rpt_dmcreport_list->Raingauge_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_dmcreport_list->obs_datetime->Visible) { // obs_datetime ?>
		<td data-name="obs_datetime" <?php echo $vw_rpt_dmcreport_list->obs_datetime->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_dmcreport_list->RowCount ?>_vw_rpt_dmcreport_obs_datetime">
<span<?php echo $vw_rpt_dmcreport_list->obs_datetime->viewAttributes() ?>><?php echo $vw_rpt_dmcreport_list->obs_datetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_dmcreport_list->District_name->Visible) { // District_name ?>
		<td data-name="District_name" <?php echo $vw_rpt_dmcreport_list->District_name->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_dmcreport_list->RowCount ?>_vw_rpt_dmcreport_District_name">
<span<?php echo $vw_rpt_dmcreport_list->District_name->viewAttributes() ?>><?php echo $vw_rpt_dmcreport_list->District_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_dmcreport_list->Taluka_name->Visible) { // Taluka_name ?>
		<td data-name="Taluka_name" <?php echo $vw_rpt_dmcreport_list->Taluka_name->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_dmcreport_list->RowCount ?>_vw_rpt_dmcreport_Taluka_name">
<span<?php echo $vw_rpt_dmcreport_list->Taluka_name->viewAttributes() ?>><?php echo $vw_rpt_dmcreport_list->Taluka_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_dmcreport_list->station_name->Visible) { // station_name ?>
		<td data-name="station_name" <?php echo $vw_rpt_dmcreport_list->station_name->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_dmcreport_list->RowCount ?>_vw_rpt_dmcreport_station_name">
<span<?php echo $vw_rpt_dmcreport_list->station_name->viewAttributes() ?>><?php echo $vw_rpt_dmcreport_list->station_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_dmcreport_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $vw_rpt_dmcreport_list->rainfall->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_dmcreport_list->RowCount ?>_vw_rpt_dmcreport_rainfall">
<span<?php echo $vw_rpt_dmcreport_list->rainfall->viewAttributes() ?>><?php echo $vw_rpt_dmcreport_list->rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_rpt_dmcreport_list->ListOptions->render("body", "right", $vw_rpt_dmcreport_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_rpt_dmcreport_list->isGridAdd())
		$vw_rpt_dmcreport_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_rpt_dmcreport->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_rpt_dmcreport_list->Recordset)
	$vw_rpt_dmcreport_list->Recordset->Close();
?>
<?php if (!$vw_rpt_dmcreport_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_rpt_dmcreport_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_dmcreport_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_dmcreport_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_rpt_dmcreport_list->TotalRecords == 0 && !$vw_rpt_dmcreport->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_rpt_dmcreport_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_rpt_dmcreport_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_rpt_dmcreport_list->isExport()) { ?>
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
$vw_rpt_dmcreport_list->terminate();
?>