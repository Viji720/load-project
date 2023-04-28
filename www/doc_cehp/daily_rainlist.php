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
$daily_rain_list = new daily_rain_list();

// Run the page
$daily_rain_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$daily_rain_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$daily_rain_list->isExport()) { ?>
<script>
var fdaily_rainlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdaily_rainlist = currentForm = new ew.Form("fdaily_rainlist", "list");
	fdaily_rainlist.formKeyCountName = '<?php echo $daily_rain_list->FormKeyCountName ?>';
	loadjs.done("fdaily_rainlist");
});
var fdaily_rainlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdaily_rainlistsrch = currentSearchForm = new ew.Form("fdaily_rainlistsrch");

	// Validate function for search
	fdaily_rainlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_Obs_Date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($daily_rain_list->Obs_Date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Rainfall_in_mm");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($daily_rain_list->Rainfall_in_mm->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fdaily_rainlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdaily_rainlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fdaily_rainlistsrch.filterList = <?php echo $daily_rain_list->getFilterList() ?>;
	loadjs.done("fdaily_rainlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$daily_rain_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($daily_rain_list->TotalRecords > 0 && $daily_rain_list->ExportOptions->visible()) { ?>
<?php $daily_rain_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($daily_rain_list->ImportOptions->visible()) { ?>
<?php $daily_rain_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($daily_rain_list->SearchOptions->visible()) { ?>
<?php $daily_rain_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($daily_rain_list->FilterOptions->visible()) { ?>
<?php $daily_rain_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$daily_rain_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$daily_rain_list->isExport() && !$daily_rain->CurrentAction) { ?>
<form name="fdaily_rainlistsrch" id="fdaily_rainlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdaily_rainlistsrch-search-panel" class="<?php echo $daily_rain_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="daily_rain">
	<div class="ew-extended-search">
<?php

// Render search row
$daily_rain->RowType = ROWTYPE_SEARCH;
$daily_rain->resetAttributes();
$daily_rain_list->renderRow();
?>
<?php if ($daily_rain_list->Obs_Date->Visible) { // Obs_Date ?>
	<?php
		$daily_rain_list->SearchColumnCount++;
		if (($daily_rain_list->SearchColumnCount - 1) % $daily_rain_list->SearchFieldsPerRow == 0) {
			$daily_rain_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $daily_rain_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Obs_Date" class="ew-cell form-group">
		<label for="x_Obs_Date" class="ew-search-caption ew-label"><?php echo $daily_rain_list->Obs_Date->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_Obs_Date" id="z_Obs_Date" value="BETWEEN">
</span>
		<span id="el_daily_rain_Obs_Date" class="ew-search-field">
<input type="text" data-table="daily_rain" data-field="x_Obs_Date" data-format="7" name="x_Obs_Date" id="x_Obs_Date" maxlength="10" value="<?php echo $daily_rain_list->Obs_Date->EditValue ?>"<?php echo $daily_rain_list->Obs_Date->editAttributes() ?>>
<?php if (!$daily_rain_list->Obs_Date->ReadOnly && !$daily_rain_list->Obs_Date->Disabled && !isset($daily_rain_list->Obs_Date->EditAttrs["readonly"]) && !isset($daily_rain_list->Obs_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdaily_rainlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fdaily_rainlistsrch", "x_Obs_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_daily_rain_Obs_Date" class="ew-search-field2">
<input type="text" data-table="daily_rain" data-field="x_Obs_Date" data-format="7" name="y_Obs_Date" id="y_Obs_Date" maxlength="10" value="<?php echo $daily_rain_list->Obs_Date->EditValue2 ?>"<?php echo $daily_rain_list->Obs_Date->editAttributes() ?>>
<?php if (!$daily_rain_list->Obs_Date->ReadOnly && !$daily_rain_list->Obs_Date->Disabled && !isset($daily_rain_list->Obs_Date->EditAttrs["readonly"]) && !isset($daily_rain_list->Obs_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdaily_rainlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fdaily_rainlistsrch", "y_Obs_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($daily_rain_list->SearchColumnCount % $daily_rain_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($daily_rain_list->Rainfall_in_mm->Visible) { // Rainfall_in_mm ?>
	<?php
		$daily_rain_list->SearchColumnCount++;
		if (($daily_rain_list->SearchColumnCount - 1) % $daily_rain_list->SearchFieldsPerRow == 0) {
			$daily_rain_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $daily_rain_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Rainfall_in_mm" class="ew-cell form-group">
		<label for="x_Rainfall_in_mm" class="ew-search-caption ew-label"><?php echo $daily_rain_list->Rainfall_in_mm->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_Rainfall_in_mm" id="z_Rainfall_in_mm" value="BETWEEN">
</span>
		<span id="el_daily_rain_Rainfall_in_mm" class="ew-search-field">
<input type="text" data-table="daily_rain" data-field="x_Rainfall_in_mm" name="x_Rainfall_in_mm" id="x_Rainfall_in_mm" size="30" maxlength="6" value="<?php echo $daily_rain_list->Rainfall_in_mm->EditValue ?>"<?php echo $daily_rain_list->Rainfall_in_mm->editAttributes() ?>>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_daily_rain_Rainfall_in_mm" class="ew-search-field2">
<input type="text" data-table="daily_rain" data-field="x_Rainfall_in_mm" name="y_Rainfall_in_mm" id="y_Rainfall_in_mm" size="30" maxlength="6" value="<?php echo $daily_rain_list->Rainfall_in_mm->EditValue2 ?>"<?php echo $daily_rain_list->Rainfall_in_mm->editAttributes() ?>>
</span>
	</div>
	<?php if ($daily_rain_list->SearchColumnCount % $daily_rain_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($daily_rain_list->SearchColumnCount % $daily_rain_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $daily_rain_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($daily_rain_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($daily_rain_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $daily_rain_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($daily_rain_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($daily_rain_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($daily_rain_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($daily_rain_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $daily_rain_list->showPageHeader(); ?>
<?php
$daily_rain_list->showMessage();
?>
<?php if ($daily_rain_list->TotalRecords > 0 || $daily_rain->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($daily_rain_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> daily_rain">
<?php if (!$daily_rain_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$daily_rain_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $daily_rain_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $daily_rain_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdaily_rainlist" id="fdaily_rainlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="daily_rain">
<div id="gmp_daily_rain" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($daily_rain_list->TotalRecords > 0 || $daily_rain_list->isGridEdit()) { ?>
<table id="tbl_daily_rainlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$daily_rain->RowType = ROWTYPE_HEADER;

// Render list options
$daily_rain_list->renderListOptions();

// Render list options (header, left)
$daily_rain_list->ListOptions->render("header", "left");
?>
<?php if ($daily_rain_list->Obs_Date->Visible) { // Obs_Date ?>
	<?php if ($daily_rain_list->SortUrl($daily_rain_list->Obs_Date) == "") { ?>
		<th data-name="Obs_Date" class="<?php echo $daily_rain_list->Obs_Date->headerCellClass() ?>"><div id="elh_daily_rain_Obs_Date" class="daily_rain_Obs_Date"><div class="ew-table-header-caption"><?php echo $daily_rain_list->Obs_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Obs_Date" class="<?php echo $daily_rain_list->Obs_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $daily_rain_list->SortUrl($daily_rain_list->Obs_Date) ?>', 2);"><div id="elh_daily_rain_Obs_Date" class="daily_rain_Obs_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $daily_rain_list->Obs_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($daily_rain_list->Obs_Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($daily_rain_list->Obs_Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($daily_rain_list->RAINFALL_STATION_NAME->Visible) { // RAINFALL_STATION_NAME ?>
	<?php if ($daily_rain_list->SortUrl($daily_rain_list->RAINFALL_STATION_NAME) == "") { ?>
		<th data-name="RAINFALL_STATION_NAME" class="<?php echo $daily_rain_list->RAINFALL_STATION_NAME->headerCellClass() ?>"><div id="elh_daily_rain_RAINFALL_STATION_NAME" class="daily_rain_RAINFALL_STATION_NAME"><div class="ew-table-header-caption"><?php echo $daily_rain_list->RAINFALL_STATION_NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RAINFALL_STATION_NAME" class="<?php echo $daily_rain_list->RAINFALL_STATION_NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $daily_rain_list->SortUrl($daily_rain_list->RAINFALL_STATION_NAME) ?>', 2);"><div id="elh_daily_rain_RAINFALL_STATION_NAME" class="daily_rain_RAINFALL_STATION_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $daily_rain_list->RAINFALL_STATION_NAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($daily_rain_list->RAINFALL_STATION_NAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($daily_rain_list->RAINFALL_STATION_NAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($daily_rain_list->Rainfall_in_mm->Visible) { // Rainfall_in_mm ?>
	<?php if ($daily_rain_list->SortUrl($daily_rain_list->Rainfall_in_mm) == "") { ?>
		<th data-name="Rainfall_in_mm" class="<?php echo $daily_rain_list->Rainfall_in_mm->headerCellClass() ?>"><div id="elh_daily_rain_Rainfall_in_mm" class="daily_rain_Rainfall_in_mm"><div class="ew-table-header-caption"><?php echo $daily_rain_list->Rainfall_in_mm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rainfall_in_mm" class="<?php echo $daily_rain_list->Rainfall_in_mm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $daily_rain_list->SortUrl($daily_rain_list->Rainfall_in_mm) ?>', 2);"><div id="elh_daily_rain_Rainfall_in_mm" class="daily_rain_Rainfall_in_mm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $daily_rain_list->Rainfall_in_mm->caption() ?></span><span class="ew-table-header-sort"><?php if ($daily_rain_list->Rainfall_in_mm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($daily_rain_list->Rainfall_in_mm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($daily_rain_list->file_name->Visible) { // file_name ?>
	<?php if ($daily_rain_list->SortUrl($daily_rain_list->file_name) == "") { ?>
		<th data-name="file_name" class="<?php echo $daily_rain_list->file_name->headerCellClass() ?>"><div id="elh_daily_rain_file_name" class="daily_rain_file_name"><div class="ew-table-header-caption"><?php echo $daily_rain_list->file_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="file_name" class="<?php echo $daily_rain_list->file_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $daily_rain_list->SortUrl($daily_rain_list->file_name) ?>', 2);"><div id="elh_daily_rain_file_name" class="daily_rain_file_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $daily_rain_list->file_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($daily_rain_list->file_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($daily_rain_list->file_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($daily_rain_list->source_id->Visible) { // source_id ?>
	<?php if ($daily_rain_list->SortUrl($daily_rain_list->source_id) == "") { ?>
		<th data-name="source_id" class="<?php echo $daily_rain_list->source_id->headerCellClass() ?>"><div id="elh_daily_rain_source_id" class="daily_rain_source_id"><div class="ew-table-header-caption"><?php echo $daily_rain_list->source_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="source_id" class="<?php echo $daily_rain_list->source_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $daily_rain_list->SortUrl($daily_rain_list->source_id) ?>', 2);"><div id="elh_daily_rain_source_id" class="daily_rain_source_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $daily_rain_list->source_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($daily_rain_list->source_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($daily_rain_list->source_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$daily_rain_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($daily_rain_list->ExportAll && $daily_rain_list->isExport()) {
	$daily_rain_list->StopRecord = $daily_rain_list->TotalRecords;
} else {

	// Set the last record to display
	if ($daily_rain_list->TotalRecords > $daily_rain_list->StartRecord + $daily_rain_list->DisplayRecords - 1)
		$daily_rain_list->StopRecord = $daily_rain_list->StartRecord + $daily_rain_list->DisplayRecords - 1;
	else
		$daily_rain_list->StopRecord = $daily_rain_list->TotalRecords;
}
$daily_rain_list->RecordCount = $daily_rain_list->StartRecord - 1;
if ($daily_rain_list->Recordset && !$daily_rain_list->Recordset->EOF) {
	$daily_rain_list->Recordset->moveFirst();
	$selectLimit = $daily_rain_list->UseSelectLimit;
	if (!$selectLimit && $daily_rain_list->StartRecord > 1)
		$daily_rain_list->Recordset->move($daily_rain_list->StartRecord - 1);
} elseif (!$daily_rain->AllowAddDeleteRow && $daily_rain_list->StopRecord == 0) {
	$daily_rain_list->StopRecord = $daily_rain->GridAddRowCount;
}

// Initialize aggregate
$daily_rain->RowType = ROWTYPE_AGGREGATEINIT;
$daily_rain->resetAttributes();
$daily_rain_list->renderRow();
while ($daily_rain_list->RecordCount < $daily_rain_list->StopRecord) {
	$daily_rain_list->RecordCount++;
	if ($daily_rain_list->RecordCount >= $daily_rain_list->StartRecord) {
		$daily_rain_list->RowCount++;

		// Set up key count
		$daily_rain_list->KeyCount = $daily_rain_list->RowIndex;

		// Init row class and style
		$daily_rain->resetAttributes();
		$daily_rain->CssClass = "";
		if ($daily_rain_list->isGridAdd()) {
		} else {
			$daily_rain_list->loadRowValues($daily_rain_list->Recordset); // Load row values
		}
		$daily_rain->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$daily_rain->RowAttrs->merge(["data-rowindex" => $daily_rain_list->RowCount, "id" => "r" . $daily_rain_list->RowCount . "_daily_rain", "data-rowtype" => $daily_rain->RowType]);

		// Render row
		$daily_rain_list->renderRow();

		// Render list options
		$daily_rain_list->renderListOptions();
?>
	<tr <?php echo $daily_rain->rowAttributes() ?>>
<?php

// Render list options (body, left)
$daily_rain_list->ListOptions->render("body", "left", $daily_rain_list->RowCount);
?>
	<?php if ($daily_rain_list->Obs_Date->Visible) { // Obs_Date ?>
		<td data-name="Obs_Date" <?php echo $daily_rain_list->Obs_Date->cellAttributes() ?>>
<span id="el<?php echo $daily_rain_list->RowCount ?>_daily_rain_Obs_Date">
<span<?php echo $daily_rain_list->Obs_Date->viewAttributes() ?>><?php echo $daily_rain_list->Obs_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($daily_rain_list->RAINFALL_STATION_NAME->Visible) { // RAINFALL_STATION_NAME ?>
		<td data-name="RAINFALL_STATION_NAME" <?php echo $daily_rain_list->RAINFALL_STATION_NAME->cellAttributes() ?>>
<span id="el<?php echo $daily_rain_list->RowCount ?>_daily_rain_RAINFALL_STATION_NAME">
<span<?php echo $daily_rain_list->RAINFALL_STATION_NAME->viewAttributes() ?>><?php echo $daily_rain_list->RAINFALL_STATION_NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($daily_rain_list->Rainfall_in_mm->Visible) { // Rainfall_in_mm ?>
		<td data-name="Rainfall_in_mm" <?php echo $daily_rain_list->Rainfall_in_mm->cellAttributes() ?>>
<span id="el<?php echo $daily_rain_list->RowCount ?>_daily_rain_Rainfall_in_mm">
<span<?php echo $daily_rain_list->Rainfall_in_mm->viewAttributes() ?>><?php echo $daily_rain_list->Rainfall_in_mm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($daily_rain_list->file_name->Visible) { // file_name ?>
		<td data-name="file_name" <?php echo $daily_rain_list->file_name->cellAttributes() ?>>
<span id="el<?php echo $daily_rain_list->RowCount ?>_daily_rain_file_name">
<span<?php echo $daily_rain_list->file_name->viewAttributes() ?>><?php echo $daily_rain_list->file_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($daily_rain_list->source_id->Visible) { // source_id ?>
		<td data-name="source_id" <?php echo $daily_rain_list->source_id->cellAttributes() ?>>
<span id="el<?php echo $daily_rain_list->RowCount ?>_daily_rain_source_id">
<span<?php echo $daily_rain_list->source_id->viewAttributes() ?>><?php echo $daily_rain_list->source_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$daily_rain_list->ListOptions->render("body", "right", $daily_rain_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$daily_rain_list->isGridAdd())
		$daily_rain_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$daily_rain->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($daily_rain_list->Recordset)
	$daily_rain_list->Recordset->Close();
?>
<?php if (!$daily_rain_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$daily_rain_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $daily_rain_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $daily_rain_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($daily_rain_list->TotalRecords == 0 && !$daily_rain->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $daily_rain_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$daily_rain_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$daily_rain_list->isExport()) { ?>
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
$daily_rain_list->terminate();
?>