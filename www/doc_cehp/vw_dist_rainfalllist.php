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
$vw_dist_rainfall_list = new vw_dist_rainfall_list();

// Run the page
$vw_dist_rainfall_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_dist_rainfall_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_dist_rainfall_list->isExport()) { ?>
<script>
var fvw_dist_rainfalllist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_dist_rainfalllist = currentForm = new ew.Form("fvw_dist_rainfalllist", "list");
	fvw_dist_rainfalllist.formKeyCountName = '<?php echo $vw_dist_rainfall_list->FormKeyCountName ?>';
	loadjs.done("fvw_dist_rainfalllist");
});
var fvw_dist_rainfalllistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_dist_rainfalllistsrch = currentSearchForm = new ew.Form("fvw_dist_rainfalllistsrch");

	// Validate function for search
	fvw_dist_rainfalllistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SMSDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_dist_rainfall_list->SMSDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_dist_rainfalllistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_dist_rainfalllistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_dist_rainfalllistsrch.lists["x_DistrictId"] = <?php echo $vw_dist_rainfall_list->DistrictId->Lookup->toClientList($vw_dist_rainfall_list) ?>;
	fvw_dist_rainfalllistsrch.lists["x_DistrictId"].options = <?php echo JsonEncode($vw_dist_rainfall_list->DistrictId->lookupOptions()) ?>;

	// Filters
	fvw_dist_rainfalllistsrch.filterList = <?php echo $vw_dist_rainfall_list->getFilterList() ?>;
	loadjs.done("fvw_dist_rainfalllistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_dist_rainfall_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_dist_rainfall_list->TotalRecords > 0 && $vw_dist_rainfall_list->ExportOptions->visible()) { ?>
<?php $vw_dist_rainfall_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_dist_rainfall_list->ImportOptions->visible()) { ?>
<?php $vw_dist_rainfall_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_dist_rainfall_list->SearchOptions->visible()) { ?>
<?php $vw_dist_rainfall_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_dist_rainfall_list->FilterOptions->visible()) { ?>
<?php $vw_dist_rainfall_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_dist_rainfall_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_dist_rainfall_list->isExport() && !$vw_dist_rainfall->CurrentAction) { ?>
<form name="fvw_dist_rainfalllistsrch" id="fvw_dist_rainfalllistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_dist_rainfalllistsrch-search-panel" class="<?php echo $vw_dist_rainfall_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_dist_rainfall">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_dist_rainfall->RowType = ROWTYPE_SEARCH;
$vw_dist_rainfall->resetAttributes();
$vw_dist_rainfall_list->renderRow();
?>
<?php if ($vw_dist_rainfall_list->DistrictId->Visible) { // DistrictId ?>
	<?php
		$vw_dist_rainfall_list->SearchColumnCount++;
		if (($vw_dist_rainfall_list->SearchColumnCount - 1) % $vw_dist_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_dist_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_dist_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DistrictId" class="ew-cell form-group">
		<label for="x_DistrictId" class="ew-search-caption ew-label"><?php echo $vw_dist_rainfall_list->DistrictId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DistrictId" id="z_DistrictId" value="=">
</span>
		<span id="el_vw_dist_rainfall_DistrictId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_dist_rainfall" data-field="x_DistrictId" data-value-separator="<?php echo $vw_dist_rainfall_list->DistrictId->displayValueSeparatorAttribute() ?>" id="x_DistrictId" name="x_DistrictId"<?php echo $vw_dist_rainfall_list->DistrictId->editAttributes() ?>>
			<?php echo $vw_dist_rainfall_list->DistrictId->selectOptionListHtml("x_DistrictId") ?>
		</select>
</div>
<?php echo $vw_dist_rainfall_list->DistrictId->Lookup->getParamTag($vw_dist_rainfall_list, "p_x_DistrictId") ?>
</span>
	</div>
	<?php if ($vw_dist_rainfall_list->SearchColumnCount % $vw_dist_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_dist_rainfall_list->SMSDate->Visible) { // SMSDate ?>
	<?php
		$vw_dist_rainfall_list->SearchColumnCount++;
		if (($vw_dist_rainfall_list->SearchColumnCount - 1) % $vw_dist_rainfall_list->SearchFieldsPerRow == 0) {
			$vw_dist_rainfall_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_dist_rainfall_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SMSDate" class="ew-cell form-group">
		<label for="x_SMSDate" class="ew-search-caption ew-label"><?php echo $vw_dist_rainfall_list->SMSDate->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_SMSDate" id="z_SMSDate" value="BETWEEN">
</span>
		<span id="el_vw_dist_rainfall_SMSDate" class="ew-search-field">
<input type="text" data-table="vw_dist_rainfall" data-field="x_SMSDate" data-format="7" name="x_SMSDate" id="x_SMSDate" maxlength="10" value="<?php echo $vw_dist_rainfall_list->SMSDate->EditValue ?>"<?php echo $vw_dist_rainfall_list->SMSDate->editAttributes() ?>>
<?php if (!$vw_dist_rainfall_list->SMSDate->ReadOnly && !$vw_dist_rainfall_list->SMSDate->Disabled && !isset($vw_dist_rainfall_list->SMSDate->EditAttrs["readonly"]) && !isset($vw_dist_rainfall_list->SMSDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_dist_rainfalllistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_dist_rainfalllistsrch", "x_SMSDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_dist_rainfall_SMSDate" class="ew-search-field2">
<input type="text" data-table="vw_dist_rainfall" data-field="x_SMSDate" data-format="7" name="y_SMSDate" id="y_SMSDate" maxlength="10" value="<?php echo $vw_dist_rainfall_list->SMSDate->EditValue2 ?>"<?php echo $vw_dist_rainfall_list->SMSDate->editAttributes() ?>>
<?php if (!$vw_dist_rainfall_list->SMSDate->ReadOnly && !$vw_dist_rainfall_list->SMSDate->Disabled && !isset($vw_dist_rainfall_list->SMSDate->EditAttrs["readonly"]) && !isset($vw_dist_rainfall_list->SMSDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_dist_rainfalllistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_dist_rainfalllistsrch", "y_SMSDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($vw_dist_rainfall_list->SearchColumnCount % $vw_dist_rainfall_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_dist_rainfall_list->SearchColumnCount % $vw_dist_rainfall_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_dist_rainfall_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_dist_rainfall_list->showPageHeader(); ?>
<?php
$vw_dist_rainfall_list->showMessage();
?>
<?php if ($vw_dist_rainfall_list->TotalRecords > 0 || $vw_dist_rainfall->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_dist_rainfall_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_dist_rainfall">
<?php if (!$vw_dist_rainfall_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_dist_rainfall_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_dist_rainfall_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_dist_rainfall_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_dist_rainfalllist" id="fvw_dist_rainfalllist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_dist_rainfall">
<div id="gmp_vw_dist_rainfall" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_dist_rainfall_list->TotalRecords > 0 || $vw_dist_rainfall_list->isGridEdit()) { ?>
<table id="tbl_vw_dist_rainfalllist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_dist_rainfall->RowType = ROWTYPE_HEADER;

// Render list options
$vw_dist_rainfall_list->renderListOptions();

// Render list options (header, left)
$vw_dist_rainfall_list->ListOptions->render("header", "left");
?>
<?php if ($vw_dist_rainfall_list->DistrictId->Visible) { // DistrictId ?>
	<?php if ($vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->DistrictId) == "") { ?>
		<th data-name="DistrictId" class="<?php echo $vw_dist_rainfall_list->DistrictId->headerCellClass() ?>"><div id="elh_vw_dist_rainfall_DistrictId" class="vw_dist_rainfall_DistrictId"><div class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->DistrictId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictId" class="<?php echo $vw_dist_rainfall_list->DistrictId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->DistrictId) ?>', 2);"><div id="elh_vw_dist_rainfall_DistrictId" class="vw_dist_rainfall_DistrictId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->DistrictId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_dist_rainfall_list->DistrictId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_dist_rainfall_list->DistrictId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_dist_rainfall_list->SMSDate->Visible) { // SMSDate ?>
	<?php if ($vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->SMSDate) == "") { ?>
		<th data-name="SMSDate" class="<?php echo $vw_dist_rainfall_list->SMSDate->headerCellClass() ?>"><div id="elh_vw_dist_rainfall_SMSDate" class="vw_dist_rainfall_SMSDate"><div class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->SMSDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDate" class="<?php echo $vw_dist_rainfall_list->SMSDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->SMSDate) ?>', 2);"><div id="elh_vw_dist_rainfall_SMSDate" class="vw_dist_rainfall_SMSDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->SMSDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_dist_rainfall_list->SMSDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_dist_rainfall_list->SMSDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_dist_rainfall_list->total_dist_rainfall->Visible) { // total_dist_rainfall ?>
	<?php if ($vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->total_dist_rainfall) == "") { ?>
		<th data-name="total_dist_rainfall" class="<?php echo $vw_dist_rainfall_list->total_dist_rainfall->headerCellClass() ?>"><div id="elh_vw_dist_rainfall_total_dist_rainfall" class="vw_dist_rainfall_total_dist_rainfall"><div class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->total_dist_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_dist_rainfall" class="<?php echo $vw_dist_rainfall_list->total_dist_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->total_dist_rainfall) ?>', 2);"><div id="elh_vw_dist_rainfall_total_dist_rainfall" class="vw_dist_rainfall_total_dist_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->total_dist_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_dist_rainfall_list->total_dist_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_dist_rainfall_list->total_dist_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_dist_rainfall_list->no_of_staion_dist->Visible) { // no_of_staion_dist ?>
	<?php if ($vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->no_of_staion_dist) == "") { ?>
		<th data-name="no_of_staion_dist" class="<?php echo $vw_dist_rainfall_list->no_of_staion_dist->headerCellClass() ?>"><div id="elh_vw_dist_rainfall_no_of_staion_dist" class="vw_dist_rainfall_no_of_staion_dist"><div class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->no_of_staion_dist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="no_of_staion_dist" class="<?php echo $vw_dist_rainfall_list->no_of_staion_dist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->no_of_staion_dist) ?>', 2);"><div id="elh_vw_dist_rainfall_no_of_staion_dist" class="vw_dist_rainfall_no_of_staion_dist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->no_of_staion_dist->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_dist_rainfall_list->no_of_staion_dist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_dist_rainfall_list->no_of_staion_dist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_dist_rainfall_list->dist_average->Visible) { // dist_average ?>
	<?php if ($vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->dist_average) == "") { ?>
		<th data-name="dist_average" class="<?php echo $vw_dist_rainfall_list->dist_average->headerCellClass() ?>"><div id="elh_vw_dist_rainfall_dist_average" class="vw_dist_rainfall_dist_average"><div class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->dist_average->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dist_average" class="<?php echo $vw_dist_rainfall_list->dist_average->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_dist_rainfall_list->SortUrl($vw_dist_rainfall_list->dist_average) ?>', 2);"><div id="elh_vw_dist_rainfall_dist_average" class="vw_dist_rainfall_dist_average">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_dist_rainfall_list->dist_average->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_dist_rainfall_list->dist_average->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_dist_rainfall_list->dist_average->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_dist_rainfall_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_dist_rainfall_list->ExportAll && $vw_dist_rainfall_list->isExport()) {
	$vw_dist_rainfall_list->StopRecord = $vw_dist_rainfall_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_dist_rainfall_list->TotalRecords > $vw_dist_rainfall_list->StartRecord + $vw_dist_rainfall_list->DisplayRecords - 1)
		$vw_dist_rainfall_list->StopRecord = $vw_dist_rainfall_list->StartRecord + $vw_dist_rainfall_list->DisplayRecords - 1;
	else
		$vw_dist_rainfall_list->StopRecord = $vw_dist_rainfall_list->TotalRecords;
}
$vw_dist_rainfall_list->RecordCount = $vw_dist_rainfall_list->StartRecord - 1;
if ($vw_dist_rainfall_list->Recordset && !$vw_dist_rainfall_list->Recordset->EOF) {
	$vw_dist_rainfall_list->Recordset->moveFirst();
	$selectLimit = $vw_dist_rainfall_list->UseSelectLimit;
	if (!$selectLimit && $vw_dist_rainfall_list->StartRecord > 1)
		$vw_dist_rainfall_list->Recordset->move($vw_dist_rainfall_list->StartRecord - 1);
} elseif (!$vw_dist_rainfall->AllowAddDeleteRow && $vw_dist_rainfall_list->StopRecord == 0) {
	$vw_dist_rainfall_list->StopRecord = $vw_dist_rainfall->GridAddRowCount;
}

// Initialize aggregate
$vw_dist_rainfall->RowType = ROWTYPE_AGGREGATEINIT;
$vw_dist_rainfall->resetAttributes();
$vw_dist_rainfall_list->renderRow();
while ($vw_dist_rainfall_list->RecordCount < $vw_dist_rainfall_list->StopRecord) {
	$vw_dist_rainfall_list->RecordCount++;
	if ($vw_dist_rainfall_list->RecordCount >= $vw_dist_rainfall_list->StartRecord) {
		$vw_dist_rainfall_list->RowCount++;

		// Set up key count
		$vw_dist_rainfall_list->KeyCount = $vw_dist_rainfall_list->RowIndex;

		// Init row class and style
		$vw_dist_rainfall->resetAttributes();
		$vw_dist_rainfall->CssClass = "";
		if ($vw_dist_rainfall_list->isGridAdd()) {
		} else {
			$vw_dist_rainfall_list->loadRowValues($vw_dist_rainfall_list->Recordset); // Load row values
		}
		$vw_dist_rainfall->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_dist_rainfall->RowAttrs->merge(["data-rowindex" => $vw_dist_rainfall_list->RowCount, "id" => "r" . $vw_dist_rainfall_list->RowCount . "_vw_dist_rainfall", "data-rowtype" => $vw_dist_rainfall->RowType]);

		// Render row
		$vw_dist_rainfall_list->renderRow();

		// Render list options
		$vw_dist_rainfall_list->renderListOptions();
?>
	<tr <?php echo $vw_dist_rainfall->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_dist_rainfall_list->ListOptions->render("body", "left", $vw_dist_rainfall_list->RowCount);
?>
	<?php if ($vw_dist_rainfall_list->DistrictId->Visible) { // DistrictId ?>
		<td data-name="DistrictId" <?php echo $vw_dist_rainfall_list->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $vw_dist_rainfall_list->RowCount ?>_vw_dist_rainfall_DistrictId">
<span<?php echo $vw_dist_rainfall_list->DistrictId->viewAttributes() ?>><?php echo $vw_dist_rainfall_list->DistrictId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_dist_rainfall_list->SMSDate->Visible) { // SMSDate ?>
		<td data-name="SMSDate" <?php echo $vw_dist_rainfall_list->SMSDate->cellAttributes() ?>>
<span id="el<?php echo $vw_dist_rainfall_list->RowCount ?>_vw_dist_rainfall_SMSDate">
<span<?php echo $vw_dist_rainfall_list->SMSDate->viewAttributes() ?>><?php echo $vw_dist_rainfall_list->SMSDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_dist_rainfall_list->total_dist_rainfall->Visible) { // total_dist_rainfall ?>
		<td data-name="total_dist_rainfall" <?php echo $vw_dist_rainfall_list->total_dist_rainfall->cellAttributes() ?>>
<span id="el<?php echo $vw_dist_rainfall_list->RowCount ?>_vw_dist_rainfall_total_dist_rainfall">
<span<?php echo $vw_dist_rainfall_list->total_dist_rainfall->viewAttributes() ?>><?php echo $vw_dist_rainfall_list->total_dist_rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_dist_rainfall_list->no_of_staion_dist->Visible) { // no_of_staion_dist ?>
		<td data-name="no_of_staion_dist" <?php echo $vw_dist_rainfall_list->no_of_staion_dist->cellAttributes() ?>>
<span id="el<?php echo $vw_dist_rainfall_list->RowCount ?>_vw_dist_rainfall_no_of_staion_dist">
<span<?php echo $vw_dist_rainfall_list->no_of_staion_dist->viewAttributes() ?>><?php echo $vw_dist_rainfall_list->no_of_staion_dist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_dist_rainfall_list->dist_average->Visible) { // dist_average ?>
		<td data-name="dist_average" <?php echo $vw_dist_rainfall_list->dist_average->cellAttributes() ?>>
<span id="el<?php echo $vw_dist_rainfall_list->RowCount ?>_vw_dist_rainfall_dist_average">
<span<?php echo $vw_dist_rainfall_list->dist_average->viewAttributes() ?>><?php echo $vw_dist_rainfall_list->dist_average->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_dist_rainfall_list->ListOptions->render("body", "right", $vw_dist_rainfall_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_dist_rainfall_list->isGridAdd())
		$vw_dist_rainfall_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_dist_rainfall->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_dist_rainfall_list->Recordset)
	$vw_dist_rainfall_list->Recordset->Close();
?>
<?php if (!$vw_dist_rainfall_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_dist_rainfall_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_dist_rainfall_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_dist_rainfall_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_dist_rainfall_list->TotalRecords == 0 && !$vw_dist_rainfall->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_dist_rainfall_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_dist_rainfall_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_dist_rainfall_list->isExport()) { ?>
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
$vw_dist_rainfall_list->terminate();
?>