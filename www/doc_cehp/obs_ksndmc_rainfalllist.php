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
$obs_ksndmc_rainfall_list = new obs_ksndmc_rainfall_list();

// Run the page
$obs_ksndmc_rainfall_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obs_ksndmc_rainfall_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$obs_ksndmc_rainfall_list->isExport()) { ?>
<script>
var fobs_ksndmc_rainfalllist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fobs_ksndmc_rainfalllist = currentForm = new ew.Form("fobs_ksndmc_rainfalllist", "list");
	fobs_ksndmc_rainfalllist.formKeyCountName = '<?php echo $obs_ksndmc_rainfall_list->FormKeyCountName ?>';
	loadjs.done("fobs_ksndmc_rainfalllist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$obs_ksndmc_rainfall_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($obs_ksndmc_rainfall_list->TotalRecords > 0 && $obs_ksndmc_rainfall_list->ExportOptions->visible()) { ?>
<?php $obs_ksndmc_rainfall_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_list->ImportOptions->visible()) { ?>
<?php $obs_ksndmc_rainfall_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$obs_ksndmc_rainfall_list->renderOtherOptions();
?>
<?php $obs_ksndmc_rainfall_list->showPageHeader(); ?>
<?php
$obs_ksndmc_rainfall_list->showMessage();
?>
<?php if ($obs_ksndmc_rainfall_list->TotalRecords > 0 || $obs_ksndmc_rainfall->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($obs_ksndmc_rainfall_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> obs_ksndmc_rainfall">
<?php if (!$obs_ksndmc_rainfall_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$obs_ksndmc_rainfall_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $obs_ksndmc_rainfall_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $obs_ksndmc_rainfall_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fobs_ksndmc_rainfalllist" id="fobs_ksndmc_rainfalllist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obs_ksndmc_rainfall">
<div id="gmp_obs_ksndmc_rainfall" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($obs_ksndmc_rainfall_list->TotalRecords > 0 || $obs_ksndmc_rainfall_list->isGridEdit()) { ?>
<table id="tbl_obs_ksndmc_rainfalllist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$obs_ksndmc_rainfall->RowType = ROWTYPE_HEADER;

// Render list options
$obs_ksndmc_rainfall_list->renderListOptions();

// Render list options (header, left)
$obs_ksndmc_rainfall_list->ListOptions->render("header", "left");
?>
<?php if ($obs_ksndmc_rainfall_list->Raingauge_id->Visible) { // Raingauge_id ?>
	<?php if ($obs_ksndmc_rainfall_list->SortUrl($obs_ksndmc_rainfall_list->Raingauge_id) == "") { ?>
		<th data-name="Raingauge_id" class="<?php echo $obs_ksndmc_rainfall_list->Raingauge_id->headerCellClass() ?>"><div id="elh_obs_ksndmc_rainfall_Raingauge_id" class="obs_ksndmc_rainfall_Raingauge_id"><div class="ew-table-header-caption"><?php echo $obs_ksndmc_rainfall_list->Raingauge_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Raingauge_id" class="<?php echo $obs_ksndmc_rainfall_list->Raingauge_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_ksndmc_rainfall_list->SortUrl($obs_ksndmc_rainfall_list->Raingauge_id) ?>', 2);"><div id="elh_obs_ksndmc_rainfall_Raingauge_id" class="obs_ksndmc_rainfall_Raingauge_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_ksndmc_rainfall_list->Raingauge_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_ksndmc_rainfall_list->Raingauge_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_ksndmc_rainfall_list->Raingauge_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_list->obs_datetime->Visible) { // obs_datetime ?>
	<?php if ($obs_ksndmc_rainfall_list->SortUrl($obs_ksndmc_rainfall_list->obs_datetime) == "") { ?>
		<th data-name="obs_datetime" class="<?php echo $obs_ksndmc_rainfall_list->obs_datetime->headerCellClass() ?>"><div id="elh_obs_ksndmc_rainfall_obs_datetime" class="obs_ksndmc_rainfall_obs_datetime"><div class="ew-table-header-caption"><?php echo $obs_ksndmc_rainfall_list->obs_datetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_datetime" class="<?php echo $obs_ksndmc_rainfall_list->obs_datetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_ksndmc_rainfall_list->SortUrl($obs_ksndmc_rainfall_list->obs_datetime) ?>', 2);"><div id="elh_obs_ksndmc_rainfall_obs_datetime" class="obs_ksndmc_rainfall_obs_datetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_ksndmc_rainfall_list->obs_datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_ksndmc_rainfall_list->obs_datetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_ksndmc_rainfall_list->obs_datetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obs_ksndmc_rainfall_list->rainfall->Visible) { // rainfall ?>
	<?php if ($obs_ksndmc_rainfall_list->SortUrl($obs_ksndmc_rainfall_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $obs_ksndmc_rainfall_list->rainfall->headerCellClass() ?>"><div id="elh_obs_ksndmc_rainfall_rainfall" class="obs_ksndmc_rainfall_rainfall"><div class="ew-table-header-caption"><?php echo $obs_ksndmc_rainfall_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $obs_ksndmc_rainfall_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obs_ksndmc_rainfall_list->SortUrl($obs_ksndmc_rainfall_list->rainfall) ?>', 2);"><div id="elh_obs_ksndmc_rainfall_rainfall" class="obs_ksndmc_rainfall_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obs_ksndmc_rainfall_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($obs_ksndmc_rainfall_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obs_ksndmc_rainfall_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$obs_ksndmc_rainfall_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($obs_ksndmc_rainfall_list->ExportAll && $obs_ksndmc_rainfall_list->isExport()) {
	$obs_ksndmc_rainfall_list->StopRecord = $obs_ksndmc_rainfall_list->TotalRecords;
} else {

	// Set the last record to display
	if ($obs_ksndmc_rainfall_list->TotalRecords > $obs_ksndmc_rainfall_list->StartRecord + $obs_ksndmc_rainfall_list->DisplayRecords - 1)
		$obs_ksndmc_rainfall_list->StopRecord = $obs_ksndmc_rainfall_list->StartRecord + $obs_ksndmc_rainfall_list->DisplayRecords - 1;
	else
		$obs_ksndmc_rainfall_list->StopRecord = $obs_ksndmc_rainfall_list->TotalRecords;
}
$obs_ksndmc_rainfall_list->RecordCount = $obs_ksndmc_rainfall_list->StartRecord - 1;
if ($obs_ksndmc_rainfall_list->Recordset && !$obs_ksndmc_rainfall_list->Recordset->EOF) {
	$obs_ksndmc_rainfall_list->Recordset->moveFirst();
	$selectLimit = $obs_ksndmc_rainfall_list->UseSelectLimit;
	if (!$selectLimit && $obs_ksndmc_rainfall_list->StartRecord > 1)
		$obs_ksndmc_rainfall_list->Recordset->move($obs_ksndmc_rainfall_list->StartRecord - 1);
} elseif (!$obs_ksndmc_rainfall->AllowAddDeleteRow && $obs_ksndmc_rainfall_list->StopRecord == 0) {
	$obs_ksndmc_rainfall_list->StopRecord = $obs_ksndmc_rainfall->GridAddRowCount;
}

// Initialize aggregate
$obs_ksndmc_rainfall->RowType = ROWTYPE_AGGREGATEINIT;
$obs_ksndmc_rainfall->resetAttributes();
$obs_ksndmc_rainfall_list->renderRow();
while ($obs_ksndmc_rainfall_list->RecordCount < $obs_ksndmc_rainfall_list->StopRecord) {
	$obs_ksndmc_rainfall_list->RecordCount++;
	if ($obs_ksndmc_rainfall_list->RecordCount >= $obs_ksndmc_rainfall_list->StartRecord) {
		$obs_ksndmc_rainfall_list->RowCount++;

		// Set up key count
		$obs_ksndmc_rainfall_list->KeyCount = $obs_ksndmc_rainfall_list->RowIndex;

		// Init row class and style
		$obs_ksndmc_rainfall->resetAttributes();
		$obs_ksndmc_rainfall->CssClass = "";
		if ($obs_ksndmc_rainfall_list->isGridAdd()) {
		} else {
			$obs_ksndmc_rainfall_list->loadRowValues($obs_ksndmc_rainfall_list->Recordset); // Load row values
		}
		$obs_ksndmc_rainfall->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$obs_ksndmc_rainfall->RowAttrs->merge(["data-rowindex" => $obs_ksndmc_rainfall_list->RowCount, "id" => "r" . $obs_ksndmc_rainfall_list->RowCount . "_obs_ksndmc_rainfall", "data-rowtype" => $obs_ksndmc_rainfall->RowType]);

		// Render row
		$obs_ksndmc_rainfall_list->renderRow();

		// Render list options
		$obs_ksndmc_rainfall_list->renderListOptions();
?>
	<tr <?php echo $obs_ksndmc_rainfall->rowAttributes() ?>>
<?php

// Render list options (body, left)
$obs_ksndmc_rainfall_list->ListOptions->render("body", "left", $obs_ksndmc_rainfall_list->RowCount);
?>
	<?php if ($obs_ksndmc_rainfall_list->Raingauge_id->Visible) { // Raingauge_id ?>
		<td data-name="Raingauge_id" <?php echo $obs_ksndmc_rainfall_list->Raingauge_id->cellAttributes() ?>>
<span id="el<?php echo $obs_ksndmc_rainfall_list->RowCount ?>_obs_ksndmc_rainfall_Raingauge_id">
<span<?php echo $obs_ksndmc_rainfall_list->Raingauge_id->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_list->Raingauge_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_ksndmc_rainfall_list->obs_datetime->Visible) { // obs_datetime ?>
		<td data-name="obs_datetime" <?php echo $obs_ksndmc_rainfall_list->obs_datetime->cellAttributes() ?>>
<span id="el<?php echo $obs_ksndmc_rainfall_list->RowCount ?>_obs_ksndmc_rainfall_obs_datetime">
<span<?php echo $obs_ksndmc_rainfall_list->obs_datetime->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_list->obs_datetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obs_ksndmc_rainfall_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $obs_ksndmc_rainfall_list->rainfall->cellAttributes() ?>>
<span id="el<?php echo $obs_ksndmc_rainfall_list->RowCount ?>_obs_ksndmc_rainfall_rainfall">
<span<?php echo $obs_ksndmc_rainfall_list->rainfall->viewAttributes() ?>><?php echo $obs_ksndmc_rainfall_list->rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$obs_ksndmc_rainfall_list->ListOptions->render("body", "right", $obs_ksndmc_rainfall_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$obs_ksndmc_rainfall_list->isGridAdd())
		$obs_ksndmc_rainfall_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$obs_ksndmc_rainfall->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($obs_ksndmc_rainfall_list->Recordset)
	$obs_ksndmc_rainfall_list->Recordset->Close();
?>
<?php if (!$obs_ksndmc_rainfall_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$obs_ksndmc_rainfall_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $obs_ksndmc_rainfall_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $obs_ksndmc_rainfall_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($obs_ksndmc_rainfall_list->TotalRecords == 0 && !$obs_ksndmc_rainfall->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $obs_ksndmc_rainfall_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$obs_ksndmc_rainfall_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$obs_ksndmc_rainfall_list->isExport()) { ?>
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
$obs_ksndmc_rainfall_list->terminate();
?>