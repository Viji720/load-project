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
$lkp_tblsms_date_list = new lkp_tblsms_date_list();

// Run the page
$lkp_tblsms_date_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lkp_tblsms_date_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lkp_tblsms_date_list->isExport()) { ?>
<script>
var flkp_tblsms_datelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flkp_tblsms_datelist = currentForm = new ew.Form("flkp_tblsms_datelist", "list");
	flkp_tblsms_datelist.formKeyCountName = '<?php echo $lkp_tblsms_date_list->FormKeyCountName ?>';
	loadjs.done("flkp_tblsms_datelist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lkp_tblsms_date_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lkp_tblsms_date_list->TotalRecords > 0 && $lkp_tblsms_date_list->ExportOptions->visible()) { ?>
<?php $lkp_tblsms_date_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lkp_tblsms_date_list->ImportOptions->visible()) { ?>
<?php $lkp_tblsms_date_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lkp_tblsms_date_list->renderOtherOptions();
?>
<?php $lkp_tblsms_date_list->showPageHeader(); ?>
<?php
$lkp_tblsms_date_list->showMessage();
?>
<?php if ($lkp_tblsms_date_list->TotalRecords > 0 || $lkp_tblsms_date->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lkp_tblsms_date_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lkp_tblsms_date">
<?php if (!$lkp_tblsms_date_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lkp_tblsms_date_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lkp_tblsms_date_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lkp_tblsms_date_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flkp_tblsms_datelist" id="flkp_tblsms_datelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lkp_tblsms_date">
<div id="gmp_lkp_tblsms_date" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lkp_tblsms_date_list->TotalRecords > 0 || $lkp_tblsms_date_list->isGridEdit()) { ?>
<table id="tbl_lkp_tblsms_datelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lkp_tblsms_date->RowType = ROWTYPE_HEADER;

// Render list options
$lkp_tblsms_date_list->renderListOptions();

// Render list options (header, left)
$lkp_tblsms_date_list->ListOptions->render("header", "left");
?>
<?php if ($lkp_tblsms_date_list->tblSMS_date->Visible) { // tblSMS_date ?>
	<?php if ($lkp_tblsms_date_list->SortUrl($lkp_tblsms_date_list->tblSMS_date) == "") { ?>
		<th data-name="tblSMS_date" class="<?php echo $lkp_tblsms_date_list->tblSMS_date->headerCellClass() ?>"><div id="elh_lkp_tblsms_date_tblSMS_date" class="lkp_tblsms_date_tblSMS_date"><div class="ew-table-header-caption"><?php echo $lkp_tblsms_date_list->tblSMS_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tblSMS_date" class="<?php echo $lkp_tblsms_date_list->tblSMS_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lkp_tblsms_date_list->SortUrl($lkp_tblsms_date_list->tblSMS_date) ?>', 2);"><div id="elh_lkp_tblsms_date_tblSMS_date" class="lkp_tblsms_date_tblSMS_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lkp_tblsms_date_list->tblSMS_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($lkp_tblsms_date_list->tblSMS_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lkp_tblsms_date_list->tblSMS_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lkp_tblsms_date_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lkp_tblsms_date_list->ExportAll && $lkp_tblsms_date_list->isExport()) {
	$lkp_tblsms_date_list->StopRecord = $lkp_tblsms_date_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lkp_tblsms_date_list->TotalRecords > $lkp_tblsms_date_list->StartRecord + $lkp_tblsms_date_list->DisplayRecords - 1)
		$lkp_tblsms_date_list->StopRecord = $lkp_tblsms_date_list->StartRecord + $lkp_tblsms_date_list->DisplayRecords - 1;
	else
		$lkp_tblsms_date_list->StopRecord = $lkp_tblsms_date_list->TotalRecords;
}
$lkp_tblsms_date_list->RecordCount = $lkp_tblsms_date_list->StartRecord - 1;
if ($lkp_tblsms_date_list->Recordset && !$lkp_tblsms_date_list->Recordset->EOF) {
	$lkp_tblsms_date_list->Recordset->moveFirst();
	$selectLimit = $lkp_tblsms_date_list->UseSelectLimit;
	if (!$selectLimit && $lkp_tblsms_date_list->StartRecord > 1)
		$lkp_tblsms_date_list->Recordset->move($lkp_tblsms_date_list->StartRecord - 1);
} elseif (!$lkp_tblsms_date->AllowAddDeleteRow && $lkp_tblsms_date_list->StopRecord == 0) {
	$lkp_tblsms_date_list->StopRecord = $lkp_tblsms_date->GridAddRowCount;
}

// Initialize aggregate
$lkp_tblsms_date->RowType = ROWTYPE_AGGREGATEINIT;
$lkp_tblsms_date->resetAttributes();
$lkp_tblsms_date_list->renderRow();
while ($lkp_tblsms_date_list->RecordCount < $lkp_tblsms_date_list->StopRecord) {
	$lkp_tblsms_date_list->RecordCount++;
	if ($lkp_tblsms_date_list->RecordCount >= $lkp_tblsms_date_list->StartRecord) {
		$lkp_tblsms_date_list->RowCount++;

		// Set up key count
		$lkp_tblsms_date_list->KeyCount = $lkp_tblsms_date_list->RowIndex;

		// Init row class and style
		$lkp_tblsms_date->resetAttributes();
		$lkp_tblsms_date->CssClass = "";
		if ($lkp_tblsms_date_list->isGridAdd()) {
		} else {
			$lkp_tblsms_date_list->loadRowValues($lkp_tblsms_date_list->Recordset); // Load row values
		}
		$lkp_tblsms_date->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lkp_tblsms_date->RowAttrs->merge(["data-rowindex" => $lkp_tblsms_date_list->RowCount, "id" => "r" . $lkp_tblsms_date_list->RowCount . "_lkp_tblsms_date", "data-rowtype" => $lkp_tblsms_date->RowType]);

		// Render row
		$lkp_tblsms_date_list->renderRow();

		// Render list options
		$lkp_tblsms_date_list->renderListOptions();
?>
	<tr <?php echo $lkp_tblsms_date->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lkp_tblsms_date_list->ListOptions->render("body", "left", $lkp_tblsms_date_list->RowCount);
?>
	<?php if ($lkp_tblsms_date_list->tblSMS_date->Visible) { // tblSMS_date ?>
		<td data-name="tblSMS_date" <?php echo $lkp_tblsms_date_list->tblSMS_date->cellAttributes() ?>>
<span id="el<?php echo $lkp_tblsms_date_list->RowCount ?>_lkp_tblsms_date_tblSMS_date">
<span<?php echo $lkp_tblsms_date_list->tblSMS_date->viewAttributes() ?>><?php echo $lkp_tblsms_date_list->tblSMS_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lkp_tblsms_date_list->ListOptions->render("body", "right", $lkp_tblsms_date_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lkp_tblsms_date_list->isGridAdd())
		$lkp_tblsms_date_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lkp_tblsms_date->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lkp_tblsms_date_list->Recordset)
	$lkp_tblsms_date_list->Recordset->Close();
?>
<?php if (!$lkp_tblsms_date_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lkp_tblsms_date_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lkp_tblsms_date_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lkp_tblsms_date_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lkp_tblsms_date_list->TotalRecords == 0 && !$lkp_tblsms_date->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lkp_tblsms_date_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lkp_tblsms_date_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lkp_tblsms_date_list->isExport()) { ?>
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
$lkp_tblsms_date_list->terminate();
?>