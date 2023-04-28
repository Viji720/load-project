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
$vw_staff_rainfall_entry_mob_list = new vw_staff_rainfall_entry_mob_list();

// Run the page
$vw_staff_rainfall_entry_mob_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_staff_rainfall_entry_mob_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_staff_rainfall_entry_mob_list->isExport()) { ?>
<script>
var fvw_staff_rainfall_entry_moblist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_staff_rainfall_entry_moblist = currentForm = new ew.Form("fvw_staff_rainfall_entry_moblist", "list");
	fvw_staff_rainfall_entry_moblist.formKeyCountName = '<?php echo $vw_staff_rainfall_entry_mob_list->FormKeyCountName ?>';
	loadjs.done("fvw_staff_rainfall_entry_moblist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_staff_rainfall_entry_mob_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_staff_rainfall_entry_mob_list->TotalRecords > 0 && $vw_staff_rainfall_entry_mob_list->ExportOptions->visible()) { ?>
<?php $vw_staff_rainfall_entry_mob_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->ImportOptions->visible()) { ?>
<?php $vw_staff_rainfall_entry_mob_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_staff_rainfall_entry_mob_list->renderOtherOptions();
?>
<?php $vw_staff_rainfall_entry_mob_list->showPageHeader(); ?>
<?php
$vw_staff_rainfall_entry_mob_list->showMessage();
?>
<?php if ($vw_staff_rainfall_entry_mob_list->TotalRecords > 0 || $vw_staff_rainfall_entry_mob->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_staff_rainfall_entry_mob_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_staff_rainfall_entry_mob">
<?php if (!$vw_staff_rainfall_entry_mob_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_staff_rainfall_entry_mob_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_staff_rainfall_entry_mob_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_staff_rainfall_entry_mob_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_staff_rainfall_entry_moblist" id="fvw_staff_rainfall_entry_moblist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_staff_rainfall_entry_mob">
<div id="gmp_vw_staff_rainfall_entry_mob" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_staff_rainfall_entry_mob_list->TotalRecords > 0 || $vw_staff_rainfall_entry_mob_list->isGridEdit()) { ?>
<table id="tbl_vw_staff_rainfall_entry_moblist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_staff_rainfall_entry_mob->RowType = ROWTYPE_HEADER;

// Render list options
$vw_staff_rainfall_entry_mob_list->renderListOptions();

// Render list options (header, left)
$vw_staff_rainfall_entry_mob_list->ListOptions->render("header", "left");
?>
<?php if ($vw_staff_rainfall_entry_mob_list->obs_date->Visible) { // obs_date ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->obs_date) == "") { ?>
		<th data-name="obs_date" class="<?php echo $vw_staff_rainfall_entry_mob_list->obs_date->headerCellClass() ?>"><div id="elh_vw_staff_rainfall_entry_mob_obs_date" class="vw_staff_rainfall_entry_mob_obs_date"><div class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->obs_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_date" class="<?php echo $vw_staff_rainfall_entry_mob_list->obs_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->obs_date) ?>', 2);"><div id="elh_vw_staff_rainfall_entry_mob_obs_date" class="vw_staff_rainfall_entry_mob_obs_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->obs_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_staff_rainfall_entry_mob_list->obs_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_staff_rainfall_entry_mob_list->obs_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->rainfall->Visible) { // rainfall ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $vw_staff_rainfall_entry_mob_list->rainfall->headerCellClass() ?>"><div id="elh_vw_staff_rainfall_entry_mob_rainfall" class="vw_staff_rainfall_entry_mob_rainfall"><div class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $vw_staff_rainfall_entry_mob_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->rainfall) ?>', 2);"><div id="elh_vw_staff_rainfall_entry_mob_rainfall" class="vw_staff_rainfall_entry_mob_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_staff_rainfall_entry_mob_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_staff_rainfall_entry_mob_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->obs_remarks->Visible) { // obs_remarks ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->obs_remarks) == "") { ?>
		<th data-name="obs_remarks" class="<?php echo $vw_staff_rainfall_entry_mob_list->obs_remarks->headerCellClass() ?>"><div id="elh_vw_staff_rainfall_entry_mob_obs_remarks" class="vw_staff_rainfall_entry_mob_obs_remarks"><div class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->obs_remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_remarks" class="<?php echo $vw_staff_rainfall_entry_mob_list->obs_remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->obs_remarks) ?>', 2);"><div id="elh_vw_staff_rainfall_entry_mob_obs_remarks" class="vw_staff_rainfall_entry_mob_obs_remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->obs_remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_staff_rainfall_entry_mob_list->obs_remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_staff_rainfall_entry_mob_list->obs_remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->mst_status->Visible) { // mst_status ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->mst_status) == "") { ?>
		<th data-name="mst_status" class="<?php echo $vw_staff_rainfall_entry_mob_list->mst_status->headerCellClass() ?>"><div id="elh_vw_staff_rainfall_entry_mob_mst_status" class="vw_staff_rainfall_entry_mob_mst_status"><div class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->mst_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mst_status" class="<?php echo $vw_staff_rainfall_entry_mob_list->mst_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->mst_status) ?>', 2);"><div id="elh_vw_staff_rainfall_entry_mob_mst_status" class="vw_staff_rainfall_entry_mob_mst_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->mst_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_staff_rainfall_entry_mob_list->mst_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_staff_rainfall_entry_mob_list->mst_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->mst_validated->Visible) { // mst_validated ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->mst_validated) == "") { ?>
		<th data-name="mst_validated" class="<?php echo $vw_staff_rainfall_entry_mob_list->mst_validated->headerCellClass() ?>"><div id="elh_vw_staff_rainfall_entry_mob_mst_validated" class="vw_staff_rainfall_entry_mob_mst_validated"><div class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->mst_validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mst_validated" class="<?php echo $vw_staff_rainfall_entry_mob_list->mst_validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->mst_validated) ?>', 2);"><div id="elh_vw_staff_rainfall_entry_mob_mst_validated" class="vw_staff_rainfall_entry_mob_mst_validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->mst_validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_staff_rainfall_entry_mob_list->mst_validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_staff_rainfall_entry_mob_list->mst_validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->stationcode->Visible) { // stationcode ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->stationcode) == "") { ?>
		<th data-name="stationcode" class="<?php echo $vw_staff_rainfall_entry_mob_list->stationcode->headerCellClass() ?>"><div id="elh_vw_staff_rainfall_entry_mob_stationcode" class="vw_staff_rainfall_entry_mob_stationcode"><div class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->stationcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stationcode" class="<?php echo $vw_staff_rainfall_entry_mob_list->stationcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->stationcode) ?>', 2);"><div id="elh_vw_staff_rainfall_entry_mob_stationcode" class="vw_staff_rainfall_entry_mob_stationcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->stationcode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_staff_rainfall_entry_mob_list->stationcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_staff_rainfall_entry_mob_list->stationcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->mobile_number->Visible) { // mobile_number ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->mobile_number) == "") { ?>
		<th data-name="mobile_number" class="<?php echo $vw_staff_rainfall_entry_mob_list->mobile_number->headerCellClass() ?>"><div id="elh_vw_staff_rainfall_entry_mob_mobile_number" class="vw_staff_rainfall_entry_mob_mobile_number"><div class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->mobile_number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_number" class="<?php echo $vw_staff_rainfall_entry_mob_list->mobile_number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->mobile_number) ?>', 2);"><div id="elh_vw_staff_rainfall_entry_mob_mobile_number" class="vw_staff_rainfall_entry_mob_mobile_number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->mobile_number->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_staff_rainfall_entry_mob_list->mobile_number->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_staff_rainfall_entry_mob_list->mobile_number->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_staff_rainfall_entry_mob_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_staff_rainfall_entry_mob_SubDivisionId" class="vw_staff_rainfall_entry_mob_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_staff_rainfall_entry_mob_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_staff_rainfall_entry_mob_list->SortUrl($vw_staff_rainfall_entry_mob_list->SubDivisionId) ?>', 2);"><div id="elh_vw_staff_rainfall_entry_mob_SubDivisionId" class="vw_staff_rainfall_entry_mob_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_staff_rainfall_entry_mob_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_staff_rainfall_entry_mob_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_staff_rainfall_entry_mob_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_staff_rainfall_entry_mob_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_staff_rainfall_entry_mob_list->ExportAll && $vw_staff_rainfall_entry_mob_list->isExport()) {
	$vw_staff_rainfall_entry_mob_list->StopRecord = $vw_staff_rainfall_entry_mob_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_staff_rainfall_entry_mob_list->TotalRecords > $vw_staff_rainfall_entry_mob_list->StartRecord + $vw_staff_rainfall_entry_mob_list->DisplayRecords - 1)
		$vw_staff_rainfall_entry_mob_list->StopRecord = $vw_staff_rainfall_entry_mob_list->StartRecord + $vw_staff_rainfall_entry_mob_list->DisplayRecords - 1;
	else
		$vw_staff_rainfall_entry_mob_list->StopRecord = $vw_staff_rainfall_entry_mob_list->TotalRecords;
}
$vw_staff_rainfall_entry_mob_list->RecordCount = $vw_staff_rainfall_entry_mob_list->StartRecord - 1;
if ($vw_staff_rainfall_entry_mob_list->Recordset && !$vw_staff_rainfall_entry_mob_list->Recordset->EOF) {
	$vw_staff_rainfall_entry_mob_list->Recordset->moveFirst();
	$selectLimit = $vw_staff_rainfall_entry_mob_list->UseSelectLimit;
	if (!$selectLimit && $vw_staff_rainfall_entry_mob_list->StartRecord > 1)
		$vw_staff_rainfall_entry_mob_list->Recordset->move($vw_staff_rainfall_entry_mob_list->StartRecord - 1);
} elseif (!$vw_staff_rainfall_entry_mob->AllowAddDeleteRow && $vw_staff_rainfall_entry_mob_list->StopRecord == 0) {
	$vw_staff_rainfall_entry_mob_list->StopRecord = $vw_staff_rainfall_entry_mob->GridAddRowCount;
}

// Initialize aggregate
$vw_staff_rainfall_entry_mob->RowType = ROWTYPE_AGGREGATEINIT;
$vw_staff_rainfall_entry_mob->resetAttributes();
$vw_staff_rainfall_entry_mob_list->renderRow();
while ($vw_staff_rainfall_entry_mob_list->RecordCount < $vw_staff_rainfall_entry_mob_list->StopRecord) {
	$vw_staff_rainfall_entry_mob_list->RecordCount++;
	if ($vw_staff_rainfall_entry_mob_list->RecordCount >= $vw_staff_rainfall_entry_mob_list->StartRecord) {
		$vw_staff_rainfall_entry_mob_list->RowCount++;

		// Set up key count
		$vw_staff_rainfall_entry_mob_list->KeyCount = $vw_staff_rainfall_entry_mob_list->RowIndex;

		// Init row class and style
		$vw_staff_rainfall_entry_mob->resetAttributes();
		$vw_staff_rainfall_entry_mob->CssClass = "";
		if ($vw_staff_rainfall_entry_mob_list->isGridAdd()) {
		} else {
			$vw_staff_rainfall_entry_mob_list->loadRowValues($vw_staff_rainfall_entry_mob_list->Recordset); // Load row values
		}
		$vw_staff_rainfall_entry_mob->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_staff_rainfall_entry_mob->RowAttrs->merge(["data-rowindex" => $vw_staff_rainfall_entry_mob_list->RowCount, "id" => "r" . $vw_staff_rainfall_entry_mob_list->RowCount . "_vw_staff_rainfall_entry_mob", "data-rowtype" => $vw_staff_rainfall_entry_mob->RowType]);

		// Render row
		$vw_staff_rainfall_entry_mob_list->renderRow();

		// Render list options
		$vw_staff_rainfall_entry_mob_list->renderListOptions();
?>
	<tr <?php echo $vw_staff_rainfall_entry_mob->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_staff_rainfall_entry_mob_list->ListOptions->render("body", "left", $vw_staff_rainfall_entry_mob_list->RowCount);
?>
	<?php if ($vw_staff_rainfall_entry_mob_list->obs_date->Visible) { // obs_date ?>
		<td data-name="obs_date" <?php echo $vw_staff_rainfall_entry_mob_list->obs_date->cellAttributes() ?>>
<span id="el<?php echo $vw_staff_rainfall_entry_mob_list->RowCount ?>_vw_staff_rainfall_entry_mob_obs_date">
<span<?php echo $vw_staff_rainfall_entry_mob_list->obs_date->viewAttributes() ?>><?php echo $vw_staff_rainfall_entry_mob_list->obs_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $vw_staff_rainfall_entry_mob_list->rainfall->cellAttributes() ?>>
<span id="el<?php echo $vw_staff_rainfall_entry_mob_list->RowCount ?>_vw_staff_rainfall_entry_mob_rainfall">
<span<?php echo $vw_staff_rainfall_entry_mob_list->rainfall->viewAttributes() ?>><?php echo $vw_staff_rainfall_entry_mob_list->rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->obs_remarks->Visible) { // obs_remarks ?>
		<td data-name="obs_remarks" <?php echo $vw_staff_rainfall_entry_mob_list->obs_remarks->cellAttributes() ?>>
<span id="el<?php echo $vw_staff_rainfall_entry_mob_list->RowCount ?>_vw_staff_rainfall_entry_mob_obs_remarks">
<span<?php echo $vw_staff_rainfall_entry_mob_list->obs_remarks->viewAttributes() ?>><?php echo $vw_staff_rainfall_entry_mob_list->obs_remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->mst_status->Visible) { // mst_status ?>
		<td data-name="mst_status" <?php echo $vw_staff_rainfall_entry_mob_list->mst_status->cellAttributes() ?>>
<span id="el<?php echo $vw_staff_rainfall_entry_mob_list->RowCount ?>_vw_staff_rainfall_entry_mob_mst_status">
<span<?php echo $vw_staff_rainfall_entry_mob_list->mst_status->viewAttributes() ?>><?php echo $vw_staff_rainfall_entry_mob_list->mst_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->mst_validated->Visible) { // mst_validated ?>
		<td data-name="mst_validated" <?php echo $vw_staff_rainfall_entry_mob_list->mst_validated->cellAttributes() ?>>
<span id="el<?php echo $vw_staff_rainfall_entry_mob_list->RowCount ?>_vw_staff_rainfall_entry_mob_mst_validated">
<span<?php echo $vw_staff_rainfall_entry_mob_list->mst_validated->viewAttributes() ?>><?php echo $vw_staff_rainfall_entry_mob_list->mst_validated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->stationcode->Visible) { // stationcode ?>
		<td data-name="stationcode" <?php echo $vw_staff_rainfall_entry_mob_list->stationcode->cellAttributes() ?>>
<span id="el<?php echo $vw_staff_rainfall_entry_mob_list->RowCount ?>_vw_staff_rainfall_entry_mob_stationcode">
<span<?php echo $vw_staff_rainfall_entry_mob_list->stationcode->viewAttributes() ?>><?php echo $vw_staff_rainfall_entry_mob_list->stationcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->mobile_number->Visible) { // mobile_number ?>
		<td data-name="mobile_number" <?php echo $vw_staff_rainfall_entry_mob_list->mobile_number->cellAttributes() ?>>
<span id="el<?php echo $vw_staff_rainfall_entry_mob_list->RowCount ?>_vw_staff_rainfall_entry_mob_mobile_number">
<span<?php echo $vw_staff_rainfall_entry_mob_list->mobile_number->viewAttributes() ?>><?php echo $vw_staff_rainfall_entry_mob_list->mobile_number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_staff_rainfall_entry_mob_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_staff_rainfall_entry_mob_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_staff_rainfall_entry_mob_list->RowCount ?>_vw_staff_rainfall_entry_mob_SubDivisionId">
<span<?php echo $vw_staff_rainfall_entry_mob_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_staff_rainfall_entry_mob_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_staff_rainfall_entry_mob_list->ListOptions->render("body", "right", $vw_staff_rainfall_entry_mob_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_staff_rainfall_entry_mob_list->isGridAdd())
		$vw_staff_rainfall_entry_mob_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_staff_rainfall_entry_mob->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_staff_rainfall_entry_mob_list->Recordset)
	$vw_staff_rainfall_entry_mob_list->Recordset->Close();
?>
<?php if (!$vw_staff_rainfall_entry_mob_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_staff_rainfall_entry_mob_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_staff_rainfall_entry_mob_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_staff_rainfall_entry_mob_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_staff_rainfall_entry_mob_list->TotalRecords == 0 && !$vw_staff_rainfall_entry_mob->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_staff_rainfall_entry_mob_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_staff_rainfall_entry_mob_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_staff_rainfall_entry_mob_list->isExport()) { ?>
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
$vw_staff_rainfall_entry_mob_list->terminate();
?>