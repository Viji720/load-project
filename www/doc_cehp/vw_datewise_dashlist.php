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
$vw_datewise_dash_list = new vw_datewise_dash_list();

// Run the page
$vw_datewise_dash_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_datewise_dash_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_datewise_dash_list->isExport()) { ?>
<script>
var fvw_datewise_dashlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_datewise_dashlist = currentForm = new ew.Form("fvw_datewise_dashlist", "list");
	fvw_datewise_dashlist.formKeyCountName = '<?php echo $vw_datewise_dash_list->FormKeyCountName ?>';
	loadjs.done("fvw_datewise_dashlist");
});
var fvw_datewise_dashlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_datewise_dashlistsrch = currentSearchForm = new ew.Form("fvw_datewise_dashlistsrch");

	// Validate function for search
	fvw_datewise_dashlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_sms_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_datewise_dash_list->sms_date->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_datewise_dashlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_datewise_dashlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fvw_datewise_dashlistsrch.filterList = <?php echo $vw_datewise_dash_list->getFilterList() ?>;
	loadjs.done("fvw_datewise_dashlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_datewise_dash_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_datewise_dash_list->TotalRecords > 0 && $vw_datewise_dash_list->ExportOptions->visible()) { ?>
<?php $vw_datewise_dash_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->ImportOptions->visible()) { ?>
<?php $vw_datewise_dash_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->SearchOptions->visible()) { ?>
<?php $vw_datewise_dash_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->FilterOptions->visible()) { ?>
<?php $vw_datewise_dash_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_datewise_dash_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_datewise_dash_list->isExport() && !$vw_datewise_dash->CurrentAction) { ?>
<form name="fvw_datewise_dashlistsrch" id="fvw_datewise_dashlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_datewise_dashlistsrch-search-panel" class="<?php echo $vw_datewise_dash_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_datewise_dash">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_datewise_dash->RowType = ROWTYPE_SEARCH;
$vw_datewise_dash->resetAttributes();
$vw_datewise_dash_list->renderRow();
?>
<?php if ($vw_datewise_dash_list->sms_date->Visible) { // sms_date ?>
	<?php
		$vw_datewise_dash_list->SearchColumnCount++;
		if (($vw_datewise_dash_list->SearchColumnCount - 1) % $vw_datewise_dash_list->SearchFieldsPerRow == 0) {
			$vw_datewise_dash_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_datewise_dash_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_sms_date" class="ew-cell form-group">
		<label for="x_sms_date" class="ew-search-caption ew-label"><?php echo $vw_datewise_dash_list->sms_date->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_sms_date" id="z_sms_date" value="=">
</span>
		<span id="el_vw_datewise_dash_sms_date" class="ew-search-field">
<input type="text" data-table="vw_datewise_dash" data-field="x_sms_date" data-format="7" name="x_sms_date" id="x_sms_date" maxlength="10" value="<?php echo $vw_datewise_dash_list->sms_date->EditValue ?>"<?php echo $vw_datewise_dash_list->sms_date->editAttributes() ?>>
<?php if (!$vw_datewise_dash_list->sms_date->ReadOnly && !$vw_datewise_dash_list->sms_date->Disabled && !isset($vw_datewise_dash_list->sms_date->EditAttrs["readonly"]) && !isset($vw_datewise_dash_list->sms_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_datewise_dashlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_datewise_dashlistsrch", "x_sms_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($vw_datewise_dash_list->SearchColumnCount % $vw_datewise_dash_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_datewise_dash_list->SearchColumnCount % $vw_datewise_dash_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_datewise_dash_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_datewise_dash_list->showPageHeader(); ?>
<?php
$vw_datewise_dash_list->showMessage();
?>
<?php if ($vw_datewise_dash_list->TotalRecords > 0 || $vw_datewise_dash->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_datewise_dash_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_datewise_dash">
<?php if (!$vw_datewise_dash_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_datewise_dash_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_datewise_dash_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_datewise_dash_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_datewise_dashlist" id="fvw_datewise_dashlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_datewise_dash">
<div id="gmp_vw_datewise_dash" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_datewise_dash_list->TotalRecords > 0 || $vw_datewise_dash_list->isGridEdit()) { ?>
<table id="tbl_vw_datewise_dashlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_datewise_dash->RowType = ROWTYPE_HEADER;

// Render list options
$vw_datewise_dash_list->renderListOptions();

// Render list options (header, left)
$vw_datewise_dash_list->ListOptions->render("header", "left");
?>
<?php if ($vw_datewise_dash_list->sms_date->Visible) { // sms_date ?>
	<?php if ($vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->sms_date) == "") { ?>
		<th data-name="sms_date" class="<?php echo $vw_datewise_dash_list->sms_date->headerCellClass() ?>"><div id="elh_vw_datewise_dash_sms_date" class="vw_datewise_dash_sms_date"><div class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->sms_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sms_date" class="<?php echo $vw_datewise_dash_list->sms_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->sms_date) ?>', 2);"><div id="elh_vw_datewise_dash_sms_date" class="vw_datewise_dash_sms_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->sms_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_datewise_dash_list->sms_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_datewise_dash_list->sms_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->percent_completed->Visible) { // percent_completed ?>
	<?php if ($vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->percent_completed) == "") { ?>
		<th data-name="percent_completed" class="<?php echo $vw_datewise_dash_list->percent_completed->headerCellClass() ?>"><div id="elh_vw_datewise_dash_percent_completed" class="vw_datewise_dash_percent_completed"><div class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->percent_completed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="percent_completed" class="<?php echo $vw_datewise_dash_list->percent_completed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->percent_completed) ?>', 2);"><div id="elh_vw_datewise_dash_percent_completed" class="vw_datewise_dash_percent_completed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->percent_completed->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_datewise_dash_list->percent_completed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_datewise_dash_list->percent_completed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->total_Verified->Visible) { // total_Verified ?>
	<?php if ($vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_Verified) == "") { ?>
		<th data-name="total_Verified" class="<?php echo $vw_datewise_dash_list->total_Verified->headerCellClass() ?>"><div id="elh_vw_datewise_dash_total_Verified" class="vw_datewise_dash_total_Verified"><div class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_Verified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_Verified" class="<?php echo $vw_datewise_dash_list->total_Verified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_Verified) ?>', 2);"><div id="elh_vw_datewise_dash_total_Verified" class="vw_datewise_dash_total_Verified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_Verified->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_datewise_dash_list->total_Verified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_datewise_dash_list->total_Verified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->total_CEHP_Created->Visible) { // total_CEHP_Created ?>
	<?php if ($vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_CEHP_Created) == "") { ?>
		<th data-name="total_CEHP_Created" class="<?php echo $vw_datewise_dash_list->total_CEHP_Created->headerCellClass() ?>"><div id="elh_vw_datewise_dash_total_CEHP_Created" class="vw_datewise_dash_total_CEHP_Created"><div class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_CEHP_Created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_CEHP_Created" class="<?php echo $vw_datewise_dash_list->total_CEHP_Created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_CEHP_Created) ?>', 2);"><div id="elh_vw_datewise_dash_total_CEHP_Created" class="vw_datewise_dash_total_CEHP_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_CEHP_Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_datewise_dash_list->total_CEHP_Created->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_datewise_dash_list->total_CEHP_Created->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->total_Auto_created->Visible) { // total_Auto_created ?>
	<?php if ($vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_Auto_created) == "") { ?>
		<th data-name="total_Auto_created" class="<?php echo $vw_datewise_dash_list->total_Auto_created->headerCellClass() ?>"><div id="elh_vw_datewise_dash_total_Auto_created" class="vw_datewise_dash_total_Auto_created"><div class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_Auto_created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_Auto_created" class="<?php echo $vw_datewise_dash_list->total_Auto_created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_Auto_created) ?>', 2);"><div id="elh_vw_datewise_dash_total_Auto_created" class="vw_datewise_dash_total_Auto_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_Auto_created->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_datewise_dash_list->total_Auto_created->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_datewise_dash_list->total_Auto_created->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->total_status_3->Visible) { // total_status_3 ?>
	<?php if ($vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_status_3) == "") { ?>
		<th data-name="total_status_3" class="<?php echo $vw_datewise_dash_list->total_status_3->headerCellClass() ?>"><div id="elh_vw_datewise_dash_total_status_3" class="vw_datewise_dash_total_status_3"><div class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_status_3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_status_3" class="<?php echo $vw_datewise_dash_list->total_status_3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_status_3) ?>', 2);"><div id="elh_vw_datewise_dash_total_status_3" class="vw_datewise_dash_total_status_3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_status_3->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_datewise_dash_list->total_status_3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_datewise_dash_list->total_status_3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_datewise_dash_list->total_station->Visible) { // total_station ?>
	<?php if ($vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_station) == "") { ?>
		<th data-name="total_station" class="<?php echo $vw_datewise_dash_list->total_station->headerCellClass() ?>"><div id="elh_vw_datewise_dash_total_station" class="vw_datewise_dash_total_station"><div class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_station->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_station" class="<?php echo $vw_datewise_dash_list->total_station->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_datewise_dash_list->SortUrl($vw_datewise_dash_list->total_station) ?>', 2);"><div id="elh_vw_datewise_dash_total_station" class="vw_datewise_dash_total_station">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_datewise_dash_list->total_station->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_datewise_dash_list->total_station->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_datewise_dash_list->total_station->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_datewise_dash_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_datewise_dash_list->ExportAll && $vw_datewise_dash_list->isExport()) {
	$vw_datewise_dash_list->StopRecord = $vw_datewise_dash_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_datewise_dash_list->TotalRecords > $vw_datewise_dash_list->StartRecord + $vw_datewise_dash_list->DisplayRecords - 1)
		$vw_datewise_dash_list->StopRecord = $vw_datewise_dash_list->StartRecord + $vw_datewise_dash_list->DisplayRecords - 1;
	else
		$vw_datewise_dash_list->StopRecord = $vw_datewise_dash_list->TotalRecords;
}
$vw_datewise_dash_list->RecordCount = $vw_datewise_dash_list->StartRecord - 1;
if ($vw_datewise_dash_list->Recordset && !$vw_datewise_dash_list->Recordset->EOF) {
	$vw_datewise_dash_list->Recordset->moveFirst();
	$selectLimit = $vw_datewise_dash_list->UseSelectLimit;
	if (!$selectLimit && $vw_datewise_dash_list->StartRecord > 1)
		$vw_datewise_dash_list->Recordset->move($vw_datewise_dash_list->StartRecord - 1);
} elseif (!$vw_datewise_dash->AllowAddDeleteRow && $vw_datewise_dash_list->StopRecord == 0) {
	$vw_datewise_dash_list->StopRecord = $vw_datewise_dash->GridAddRowCount;
}

// Initialize aggregate
$vw_datewise_dash->RowType = ROWTYPE_AGGREGATEINIT;
$vw_datewise_dash->resetAttributes();
$vw_datewise_dash_list->renderRow();
while ($vw_datewise_dash_list->RecordCount < $vw_datewise_dash_list->StopRecord) {
	$vw_datewise_dash_list->RecordCount++;
	if ($vw_datewise_dash_list->RecordCount >= $vw_datewise_dash_list->StartRecord) {
		$vw_datewise_dash_list->RowCount++;

		// Set up key count
		$vw_datewise_dash_list->KeyCount = $vw_datewise_dash_list->RowIndex;

		// Init row class and style
		$vw_datewise_dash->resetAttributes();
		$vw_datewise_dash->CssClass = "";
		if ($vw_datewise_dash_list->isGridAdd()) {
		} else {
			$vw_datewise_dash_list->loadRowValues($vw_datewise_dash_list->Recordset); // Load row values
		}
		$vw_datewise_dash->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_datewise_dash->RowAttrs->merge(["data-rowindex" => $vw_datewise_dash_list->RowCount, "id" => "r" . $vw_datewise_dash_list->RowCount . "_vw_datewise_dash", "data-rowtype" => $vw_datewise_dash->RowType]);

		// Render row
		$vw_datewise_dash_list->renderRow();

		// Render list options
		$vw_datewise_dash_list->renderListOptions();
?>
	<tr <?php echo $vw_datewise_dash->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_datewise_dash_list->ListOptions->render("body", "left", $vw_datewise_dash_list->RowCount);
?>
	<?php if ($vw_datewise_dash_list->sms_date->Visible) { // sms_date ?>
		<td data-name="sms_date" <?php echo $vw_datewise_dash_list->sms_date->cellAttributes() ?>>
<span id="el<?php echo $vw_datewise_dash_list->RowCount ?>_vw_datewise_dash_sms_date">
<span<?php echo $vw_datewise_dash_list->sms_date->viewAttributes() ?>><?php echo $vw_datewise_dash_list->sms_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_datewise_dash_list->percent_completed->Visible) { // percent_completed ?>
		<td data-name="percent_completed" <?php echo $vw_datewise_dash_list->percent_completed->cellAttributes() ?>>
<span id="el<?php echo $vw_datewise_dash_list->RowCount ?>_vw_datewise_dash_percent_completed">
<span<?php echo $vw_datewise_dash_list->percent_completed->viewAttributes() ?>><?php echo $vw_datewise_dash_list->percent_completed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_datewise_dash_list->total_Verified->Visible) { // total_Verified ?>
		<td data-name="total_Verified" <?php echo $vw_datewise_dash_list->total_Verified->cellAttributes() ?>>
<span id="el<?php echo $vw_datewise_dash_list->RowCount ?>_vw_datewise_dash_total_Verified">
<span<?php echo $vw_datewise_dash_list->total_Verified->viewAttributes() ?>><?php echo $vw_datewise_dash_list->total_Verified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_datewise_dash_list->total_CEHP_Created->Visible) { // total_CEHP_Created ?>
		<td data-name="total_CEHP_Created" <?php echo $vw_datewise_dash_list->total_CEHP_Created->cellAttributes() ?>>
<span id="el<?php echo $vw_datewise_dash_list->RowCount ?>_vw_datewise_dash_total_CEHP_Created">
<span<?php echo $vw_datewise_dash_list->total_CEHP_Created->viewAttributes() ?>><?php echo $vw_datewise_dash_list->total_CEHP_Created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_datewise_dash_list->total_Auto_created->Visible) { // total_Auto_created ?>
		<td data-name="total_Auto_created" <?php echo $vw_datewise_dash_list->total_Auto_created->cellAttributes() ?>>
<span id="el<?php echo $vw_datewise_dash_list->RowCount ?>_vw_datewise_dash_total_Auto_created">
<span<?php echo $vw_datewise_dash_list->total_Auto_created->viewAttributes() ?>><?php echo $vw_datewise_dash_list->total_Auto_created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_datewise_dash_list->total_status_3->Visible) { // total_status_3 ?>
		<td data-name="total_status_3" <?php echo $vw_datewise_dash_list->total_status_3->cellAttributes() ?>>
<span id="el<?php echo $vw_datewise_dash_list->RowCount ?>_vw_datewise_dash_total_status_3">
<span<?php echo $vw_datewise_dash_list->total_status_3->viewAttributes() ?>><?php echo $vw_datewise_dash_list->total_status_3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_datewise_dash_list->total_station->Visible) { // total_station ?>
		<td data-name="total_station" <?php echo $vw_datewise_dash_list->total_station->cellAttributes() ?>>
<span id="el<?php echo $vw_datewise_dash_list->RowCount ?>_vw_datewise_dash_total_station">
<span<?php echo $vw_datewise_dash_list->total_station->viewAttributes() ?>><?php echo $vw_datewise_dash_list->total_station->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_datewise_dash_list->ListOptions->render("body", "right", $vw_datewise_dash_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_datewise_dash_list->isGridAdd())
		$vw_datewise_dash_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_datewise_dash->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_datewise_dash_list->Recordset)
	$vw_datewise_dash_list->Recordset->Close();
?>
<?php if (!$vw_datewise_dash_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_datewise_dash_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_datewise_dash_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_datewise_dash_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_datewise_dash_list->TotalRecords == 0 && !$vw_datewise_dash->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_datewise_dash_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_datewise_dash_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_datewise_dash_list->isExport()) { ?>
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
$vw_datewise_dash_list->terminate();
?>