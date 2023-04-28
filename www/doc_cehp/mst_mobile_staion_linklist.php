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
$mst_mobile_staion_link_list = new mst_mobile_staion_link_list();

// Run the page
$mst_mobile_staion_link_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mst_mobile_staion_link_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mst_mobile_staion_link_list->isExport()) { ?>
<script>
var fmst_mobile_staion_linklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmst_mobile_staion_linklist = currentForm = new ew.Form("fmst_mobile_staion_linklist", "list");
	fmst_mobile_staion_linklist.formKeyCountName = '<?php echo $mst_mobile_staion_link_list->FormKeyCountName ?>';
	loadjs.done("fmst_mobile_staion_linklist");
});
var fmst_mobile_staion_linklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmst_mobile_staion_linklistsrch = currentSearchForm = new ew.Form("fmst_mobile_staion_linklistsrch");

	// Validate function for search
	fmst_mobile_staion_linklistsrch.validate = function(fobj) {
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
	fmst_mobile_staion_linklistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmst_mobile_staion_linklistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmst_mobile_staion_linklistsrch.lists["x_StationId"] = <?php echo $mst_mobile_staion_link_list->StationId->Lookup->toClientList($mst_mobile_staion_link_list) ?>;
	fmst_mobile_staion_linklistsrch.lists["x_StationId"].options = <?php echo JsonEncode($mst_mobile_staion_link_list->StationId->lookupOptions()) ?>;

	// Filters
	fmst_mobile_staion_linklistsrch.filterList = <?php echo $mst_mobile_staion_link_list->getFilterList() ?>;
	loadjs.done("fmst_mobile_staion_linklistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mst_mobile_staion_link_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mst_mobile_staion_link_list->TotalRecords > 0 && $mst_mobile_staion_link_list->ExportOptions->visible()) { ?>
<?php $mst_mobile_staion_link_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mst_mobile_staion_link_list->ImportOptions->visible()) { ?>
<?php $mst_mobile_staion_link_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mst_mobile_staion_link_list->SearchOptions->visible()) { ?>
<?php $mst_mobile_staion_link_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mst_mobile_staion_link_list->FilterOptions->visible()) { ?>
<?php $mst_mobile_staion_link_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mst_mobile_staion_link_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mst_mobile_staion_link_list->isExport() && !$mst_mobile_staion_link->CurrentAction) { ?>
<form name="fmst_mobile_staion_linklistsrch" id="fmst_mobile_staion_linklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmst_mobile_staion_linklistsrch-search-panel" class="<?php echo $mst_mobile_staion_link_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mst_mobile_staion_link">
	<div class="ew-extended-search">
<?php

// Render search row
$mst_mobile_staion_link->RowType = ROWTYPE_SEARCH;
$mst_mobile_staion_link->resetAttributes();
$mst_mobile_staion_link_list->renderRow();
?>
<?php if ($mst_mobile_staion_link_list->senderMobileNumber->Visible) { // senderMobileNumber ?>
	<?php
		$mst_mobile_staion_link_list->SearchColumnCount++;
		if (($mst_mobile_staion_link_list->SearchColumnCount - 1) % $mst_mobile_staion_link_list->SearchFieldsPerRow == 0) {
			$mst_mobile_staion_link_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $mst_mobile_staion_link_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_senderMobileNumber" class="ew-cell form-group">
		<label for="x_senderMobileNumber" class="ew-search-caption ew-label"><?php echo $mst_mobile_staion_link_list->senderMobileNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_senderMobileNumber" id="z_senderMobileNumber" value="LIKE">
</span>
		<span id="el_mst_mobile_staion_link_senderMobileNumber" class="ew-search-field">
<input type="text" data-table="mst_mobile_staion_link" data-field="x_senderMobileNumber" name="x_senderMobileNumber" id="x_senderMobileNumber" size="30" maxlength="25" value="<?php echo $mst_mobile_staion_link_list->senderMobileNumber->EditValue ?>"<?php echo $mst_mobile_staion_link_list->senderMobileNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($mst_mobile_staion_link_list->SearchColumnCount % $mst_mobile_staion_link_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($mst_mobile_staion_link_list->StationId->Visible) { // StationId ?>
	<?php
		$mst_mobile_staion_link_list->SearchColumnCount++;
		if (($mst_mobile_staion_link_list->SearchColumnCount - 1) % $mst_mobile_staion_link_list->SearchFieldsPerRow == 0) {
			$mst_mobile_staion_link_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $mst_mobile_staion_link_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationId" class="ew-cell form-group">
		<label for="x_StationId" class="ew-search-caption ew-label"><?php echo $mst_mobile_staion_link_list->StationId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_StationId" id="z_StationId" value="=">
</span>
		<span id="el_mst_mobile_staion_link_StationId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mst_mobile_staion_link" data-field="x_StationId" data-value-separator="<?php echo $mst_mobile_staion_link_list->StationId->displayValueSeparatorAttribute() ?>" id="x_StationId" name="x_StationId"<?php echo $mst_mobile_staion_link_list->StationId->editAttributes() ?>>
			<?php echo $mst_mobile_staion_link_list->StationId->selectOptionListHtml("x_StationId") ?>
		</select>
</div>
<?php echo $mst_mobile_staion_link_list->StationId->Lookup->getParamTag($mst_mobile_staion_link_list, "p_x_StationId") ?>
</span>
	</div>
	<?php if ($mst_mobile_staion_link_list->SearchColumnCount % $mst_mobile_staion_link_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($mst_mobile_staion_link_list->SearchColumnCount % $mst_mobile_staion_link_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $mst_mobile_staion_link_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mst_mobile_staion_link_list->showPageHeader(); ?>
<?php
$mst_mobile_staion_link_list->showMessage();
?>
<?php if ($mst_mobile_staion_link_list->TotalRecords > 0 || $mst_mobile_staion_link->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mst_mobile_staion_link_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mst_mobile_staion_link">
<?php if (!$mst_mobile_staion_link_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mst_mobile_staion_link_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mst_mobile_staion_link_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mst_mobile_staion_link_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmst_mobile_staion_linklist" id="fmst_mobile_staion_linklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mst_mobile_staion_link">
<div id="gmp_mst_mobile_staion_link" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mst_mobile_staion_link_list->TotalRecords > 0 || $mst_mobile_staion_link_list->isGridEdit()) { ?>
<table id="tbl_mst_mobile_staion_linklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mst_mobile_staion_link->RowType = ROWTYPE_HEADER;

// Render list options
$mst_mobile_staion_link_list->renderListOptions();

// Render list options (header, left)
$mst_mobile_staion_link_list->ListOptions->render("header", "left");
?>
<?php if ($mst_mobile_staion_link_list->senderMobileNumber->Visible) { // senderMobileNumber ?>
	<?php if ($mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->senderMobileNumber) == "") { ?>
		<th data-name="senderMobileNumber" class="<?php echo $mst_mobile_staion_link_list->senderMobileNumber->headerCellClass() ?>"><div id="elh_mst_mobile_staion_link_senderMobileNumber" class="mst_mobile_staion_link_senderMobileNumber"><div class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->senderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="senderMobileNumber" class="<?php echo $mst_mobile_staion_link_list->senderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->senderMobileNumber) ?>', 2);"><div id="elh_mst_mobile_staion_link_senderMobileNumber" class="mst_mobile_staion_link_senderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->senderMobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($mst_mobile_staion_link_list->senderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_mobile_staion_link_list->senderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_mobile_staion_link_list->StationId->Visible) { // StationId ?>
	<?php if ($mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $mst_mobile_staion_link_list->StationId->headerCellClass() ?>"><div id="elh_mst_mobile_staion_link_StationId" class="mst_mobile_staion_link_StationId"><div class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $mst_mobile_staion_link_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->StationId) ?>', 2);"><div id="elh_mst_mobile_staion_link_StationId" class="mst_mobile_staion_link_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($mst_mobile_staion_link_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_mobile_staion_link_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_mobile_staion_link_list->Effective_From_Date->Visible) { // Effective_From_Date ?>
	<?php if ($mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->Effective_From_Date) == "") { ?>
		<th data-name="Effective_From_Date" class="<?php echo $mst_mobile_staion_link_list->Effective_From_Date->headerCellClass() ?>"><div id="elh_mst_mobile_staion_link_Effective_From_Date" class="mst_mobile_staion_link_Effective_From_Date"><div class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->Effective_From_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Effective_From_Date" class="<?php echo $mst_mobile_staion_link_list->Effective_From_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->Effective_From_Date) ?>', 2);"><div id="elh_mst_mobile_staion_link_Effective_From_Date" class="mst_mobile_staion_link_Effective_From_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->Effective_From_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($mst_mobile_staion_link_list->Effective_From_Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_mobile_staion_link_list->Effective_From_Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_mobile_staion_link_list->Effective_till_Date->Visible) { // Effective_till_Date ?>
	<?php if ($mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->Effective_till_Date) == "") { ?>
		<th data-name="Effective_till_Date" class="<?php echo $mst_mobile_staion_link_list->Effective_till_Date->headerCellClass() ?>"><div id="elh_mst_mobile_staion_link_Effective_till_Date" class="mst_mobile_staion_link_Effective_till_Date"><div class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->Effective_till_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Effective_till_Date" class="<?php echo $mst_mobile_staion_link_list->Effective_till_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->Effective_till_Date) ?>', 2);"><div id="elh_mst_mobile_staion_link_Effective_till_Date" class="mst_mobile_staion_link_Effective_till_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->Effective_till_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($mst_mobile_staion_link_list->Effective_till_Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_mobile_staion_link_list->Effective_till_Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mst_mobile_staion_link_list->Remarks->Visible) { // Remarks ?>
	<?php if ($mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $mst_mobile_staion_link_list->Remarks->headerCellClass() ?>"><div id="elh_mst_mobile_staion_link_Remarks" class="mst_mobile_staion_link_Remarks"><div class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $mst_mobile_staion_link_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mst_mobile_staion_link_list->SortUrl($mst_mobile_staion_link_list->Remarks) ?>', 2);"><div id="elh_mst_mobile_staion_link_Remarks" class="mst_mobile_staion_link_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mst_mobile_staion_link_list->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($mst_mobile_staion_link_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mst_mobile_staion_link_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mst_mobile_staion_link_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mst_mobile_staion_link_list->ExportAll && $mst_mobile_staion_link_list->isExport()) {
	$mst_mobile_staion_link_list->StopRecord = $mst_mobile_staion_link_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mst_mobile_staion_link_list->TotalRecords > $mst_mobile_staion_link_list->StartRecord + $mst_mobile_staion_link_list->DisplayRecords - 1)
		$mst_mobile_staion_link_list->StopRecord = $mst_mobile_staion_link_list->StartRecord + $mst_mobile_staion_link_list->DisplayRecords - 1;
	else
		$mst_mobile_staion_link_list->StopRecord = $mst_mobile_staion_link_list->TotalRecords;
}
$mst_mobile_staion_link_list->RecordCount = $mst_mobile_staion_link_list->StartRecord - 1;
if ($mst_mobile_staion_link_list->Recordset && !$mst_mobile_staion_link_list->Recordset->EOF) {
	$mst_mobile_staion_link_list->Recordset->moveFirst();
	$selectLimit = $mst_mobile_staion_link_list->UseSelectLimit;
	if (!$selectLimit && $mst_mobile_staion_link_list->StartRecord > 1)
		$mst_mobile_staion_link_list->Recordset->move($mst_mobile_staion_link_list->StartRecord - 1);
} elseif (!$mst_mobile_staion_link->AllowAddDeleteRow && $mst_mobile_staion_link_list->StopRecord == 0) {
	$mst_mobile_staion_link_list->StopRecord = $mst_mobile_staion_link->GridAddRowCount;
}

// Initialize aggregate
$mst_mobile_staion_link->RowType = ROWTYPE_AGGREGATEINIT;
$mst_mobile_staion_link->resetAttributes();
$mst_mobile_staion_link_list->renderRow();
while ($mst_mobile_staion_link_list->RecordCount < $mst_mobile_staion_link_list->StopRecord) {
	$mst_mobile_staion_link_list->RecordCount++;
	if ($mst_mobile_staion_link_list->RecordCount >= $mst_mobile_staion_link_list->StartRecord) {
		$mst_mobile_staion_link_list->RowCount++;

		// Set up key count
		$mst_mobile_staion_link_list->KeyCount = $mst_mobile_staion_link_list->RowIndex;

		// Init row class and style
		$mst_mobile_staion_link->resetAttributes();
		$mst_mobile_staion_link->CssClass = "";
		if ($mst_mobile_staion_link_list->isGridAdd()) {
		} else {
			$mst_mobile_staion_link_list->loadRowValues($mst_mobile_staion_link_list->Recordset); // Load row values
		}
		$mst_mobile_staion_link->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mst_mobile_staion_link->RowAttrs->merge(["data-rowindex" => $mst_mobile_staion_link_list->RowCount, "id" => "r" . $mst_mobile_staion_link_list->RowCount . "_mst_mobile_staion_link", "data-rowtype" => $mst_mobile_staion_link->RowType]);

		// Render row
		$mst_mobile_staion_link_list->renderRow();

		// Render list options
		$mst_mobile_staion_link_list->renderListOptions();
?>
	<tr <?php echo $mst_mobile_staion_link->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mst_mobile_staion_link_list->ListOptions->render("body", "left", $mst_mobile_staion_link_list->RowCount);
?>
	<?php if ($mst_mobile_staion_link_list->senderMobileNumber->Visible) { // senderMobileNumber ?>
		<td data-name="senderMobileNumber" <?php echo $mst_mobile_staion_link_list->senderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_list->RowCount ?>_mst_mobile_staion_link_senderMobileNumber">
<span<?php echo $mst_mobile_staion_link_list->senderMobileNumber->viewAttributes() ?>><?php echo $mst_mobile_staion_link_list->senderMobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_mobile_staion_link_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $mst_mobile_staion_link_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_list->RowCount ?>_mst_mobile_staion_link_StationId">
<span<?php echo $mst_mobile_staion_link_list->StationId->viewAttributes() ?>><?php echo $mst_mobile_staion_link_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_mobile_staion_link_list->Effective_From_Date->Visible) { // Effective_From_Date ?>
		<td data-name="Effective_From_Date" <?php echo $mst_mobile_staion_link_list->Effective_From_Date->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_list->RowCount ?>_mst_mobile_staion_link_Effective_From_Date">
<span<?php echo $mst_mobile_staion_link_list->Effective_From_Date->viewAttributes() ?>><?php echo $mst_mobile_staion_link_list->Effective_From_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_mobile_staion_link_list->Effective_till_Date->Visible) { // Effective_till_Date ?>
		<td data-name="Effective_till_Date" <?php echo $mst_mobile_staion_link_list->Effective_till_Date->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_list->RowCount ?>_mst_mobile_staion_link_Effective_till_Date">
<span<?php echo $mst_mobile_staion_link_list->Effective_till_Date->viewAttributes() ?>><?php echo $mst_mobile_staion_link_list->Effective_till_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mst_mobile_staion_link_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $mst_mobile_staion_link_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $mst_mobile_staion_link_list->RowCount ?>_mst_mobile_staion_link_Remarks">
<span<?php echo $mst_mobile_staion_link_list->Remarks->viewAttributes() ?>><?php echo $mst_mobile_staion_link_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mst_mobile_staion_link_list->ListOptions->render("body", "right", $mst_mobile_staion_link_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mst_mobile_staion_link_list->isGridAdd())
		$mst_mobile_staion_link_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mst_mobile_staion_link->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mst_mobile_staion_link_list->Recordset)
	$mst_mobile_staion_link_list->Recordset->Close();
?>
<?php if (!$mst_mobile_staion_link_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mst_mobile_staion_link_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mst_mobile_staion_link_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mst_mobile_staion_link_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mst_mobile_staion_link_list->TotalRecords == 0 && !$mst_mobile_staion_link->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mst_mobile_staion_link_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mst_mobile_staion_link_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mst_mobile_staion_link_list->isExport()) { ?>
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
$mst_mobile_staion_link_list->terminate();
?>