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
$vw_rpt_sms_analyser_list = new vw_rpt_sms_analyser_list();

// Run the page
$vw_rpt_sms_analyser_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_rpt_sms_analyser_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_rpt_sms_analyser_list->isExport()) { ?>
<script>
var fvw_rpt_sms_analyserlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_rpt_sms_analyserlist = currentForm = new ew.Form("fvw_rpt_sms_analyserlist", "list");
	fvw_rpt_sms_analyserlist.formKeyCountName = '<?php echo $vw_rpt_sms_analyser_list->FormKeyCountName ?>';
	loadjs.done("fvw_rpt_sms_analyserlist");
});
var fvw_rpt_sms_analyserlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_rpt_sms_analyserlistsrch = currentSearchForm = new ew.Form("fvw_rpt_sms_analyserlistsrch");

	// Validate function for search
	fvw_rpt_sms_analyserlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SMSDateTime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_sms_analyser_list->SMSDateTime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_rpt_sms_analyserlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_rpt_sms_analyserlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fvw_rpt_sms_analyserlistsrch.filterList = <?php echo $vw_rpt_sms_analyser_list->getFilterList() ?>;
	loadjs.done("fvw_rpt_sms_analyserlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_rpt_sms_analyser_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_rpt_sms_analyser_list->TotalRecords > 0 && $vw_rpt_sms_analyser_list->ExportOptions->visible()) { ?>
<?php $vw_rpt_sms_analyser_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->ImportOptions->visible()) { ?>
<?php $vw_rpt_sms_analyser_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->SearchOptions->visible()) { ?>
<?php $vw_rpt_sms_analyser_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->FilterOptions->visible()) { ?>
<?php $vw_rpt_sms_analyser_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_rpt_sms_analyser_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_rpt_sms_analyser_list->isExport() && !$vw_rpt_sms_analyser->CurrentAction) { ?>
<form name="fvw_rpt_sms_analyserlistsrch" id="fvw_rpt_sms_analyserlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_rpt_sms_analyserlistsrch-search-panel" class="<?php echo $vw_rpt_sms_analyser_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_rpt_sms_analyser">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_rpt_sms_analyser->RowType = ROWTYPE_SEARCH;
$vw_rpt_sms_analyser->resetAttributes();
$vw_rpt_sms_analyser_list->renderRow();
?>
<?php if ($vw_rpt_sms_analyser_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php
		$vw_rpt_sms_analyser_list->SearchColumnCount++;
		if (($vw_rpt_sms_analyser_list->SearchColumnCount - 1) % $vw_rpt_sms_analyser_list->SearchFieldsPerRow == 0) {
			$vw_rpt_sms_analyser_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_sms_analyser_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SMSDateTime" class="ew-cell form-group">
		<label for="x_SMSDateTime" class="ew-search-caption ew-label"><?php echo $vw_rpt_sms_analyser_list->SMSDateTime->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_SMSDateTime" id="z_SMSDateTime" value="BETWEEN">
</span>
		<span id="el_vw_rpt_sms_analyser_SMSDateTime" class="ew-search-field">
<input type="text" data-table="vw_rpt_sms_analyser" data-field="x_SMSDateTime" data-format="7" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="10" value="<?php echo $vw_rpt_sms_analyser_list->SMSDateTime->EditValue ?>"<?php echo $vw_rpt_sms_analyser_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_sms_analyser_list->SMSDateTime->ReadOnly && !$vw_rpt_sms_analyser_list->SMSDateTime->Disabled && !isset($vw_rpt_sms_analyser_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_sms_analyser_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_sms_analyserlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_sms_analyserlistsrch", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_sms_analyser_SMSDateTime" class="ew-search-field2">
<input type="text" data-table="vw_rpt_sms_analyser" data-field="x_SMSDateTime" data-format="7" name="y_SMSDateTime" id="y_SMSDateTime" maxlength="10" value="<?php echo $vw_rpt_sms_analyser_list->SMSDateTime->EditValue2 ?>"<?php echo $vw_rpt_sms_analyser_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_sms_analyser_list->SMSDateTime->ReadOnly && !$vw_rpt_sms_analyser_list->SMSDateTime->Disabled && !isset($vw_rpt_sms_analyser_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_sms_analyser_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_sms_analyserlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_sms_analyserlistsrch", "y_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($vw_rpt_sms_analyser_list->SearchColumnCount % $vw_rpt_sms_analyser_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_rpt_sms_analyser_list->SearchColumnCount % $vw_rpt_sms_analyser_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_rpt_sms_analyser_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_rpt_sms_analyser_list->showPageHeader(); ?>
<?php
$vw_rpt_sms_analyser_list->showMessage();
?>
<?php if ($vw_rpt_sms_analyser_list->TotalRecords > 0 || $vw_rpt_sms_analyser->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_rpt_sms_analyser_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_rpt_sms_analyser">
<?php if (!$vw_rpt_sms_analyser_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_rpt_sms_analyser_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_sms_analyser_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_sms_analyser_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_rpt_sms_analyserlist" id="fvw_rpt_sms_analyserlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_rpt_sms_analyser">
<div id="gmp_vw_rpt_sms_analyser" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_rpt_sms_analyser_list->TotalRecords > 0 || $vw_rpt_sms_analyser_list->isGridEdit()) { ?>
<table id="tbl_vw_rpt_sms_analyserlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_rpt_sms_analyser->RowType = ROWTYPE_HEADER;

// Render list options
$vw_rpt_sms_analyser_list->renderListOptions();

// Render list options (header, left)
$vw_rpt_sms_analyser_list->ListOptions->render("header", "left");
?>
<?php if ($vw_rpt_sms_analyser_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_sms_analyser_list->SMSDateTime->headerCellClass() ?>"><div id="elh_vw_rpt_sms_analyser_SMSDateTime" class="vw_rpt_sms_analyser_SMSDateTime"><div class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_sms_analyser_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->SMSDateTime) ?>', 2);"><div id="elh_vw_rpt_sms_analyser_SMSDateTime" class="vw_rpt_sms_analyser_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_sms_analyser_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_sms_analyser_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->Num_of_Records->Visible) { // Num_of_Records ?>
	<?php if ($vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Records) == "") { ?>
		<th data-name="Num_of_Records" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Records->headerCellClass() ?>"><div id="elh_vw_rpt_sms_analyser_Num_of_Records" class="vw_rpt_sms_analyser_Num_of_Records"><div class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Records->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Num_of_Records" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Records->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Records) ?>', 2);"><div id="elh_vw_rpt_sms_analyser_Num_of_Records" class="vw_rpt_sms_analyser_Num_of_Records">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Records->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_sms_analyser_list->Num_of_Records->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_sms_analyser_list->Num_of_Records->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->Percent_completed->Visible) { // Percent_completed ?>
	<?php if ($vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Percent_completed) == "") { ?>
		<th data-name="Percent_completed" class="<?php echo $vw_rpt_sms_analyser_list->Percent_completed->headerCellClass() ?>"><div id="elh_vw_rpt_sms_analyser_Percent_completed" class="vw_rpt_sms_analyser_Percent_completed"><div class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Percent_completed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Percent_completed" class="<?php echo $vw_rpt_sms_analyser_list->Percent_completed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Percent_completed) ?>', 2);"><div id="elh_vw_rpt_sms_analyser_Percent_completed" class="vw_rpt_sms_analyser_Percent_completed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Percent_completed->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_sms_analyser_list->Percent_completed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_sms_analyser_list->Percent_completed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->Num_of_SMS_Received->Visible) { // Num_of_SMS_Received ?>
	<?php if ($vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_SMS_Received) == "") { ?>
		<th data-name="Num_of_SMS_Received" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_SMS_Received->headerCellClass() ?>"><div id="elh_vw_rpt_sms_analyser_Num_of_SMS_Received" class="vw_rpt_sms_analyser_Num_of_SMS_Received"><div class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_SMS_Received->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Num_of_SMS_Received" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_SMS_Received->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_SMS_Received) ?>', 2);"><div id="elh_vw_rpt_sms_analyser_Num_of_SMS_Received" class="vw_rpt_sms_analyser_Num_of_SMS_Received">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_SMS_Received->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_sms_analyser_list->Num_of_SMS_Received->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_sms_analyser_list->Num_of_SMS_Received->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->Num_of_Created_1->Visible) { // Num_of_Created_1 ?>
	<?php if ($vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Created_1) == "") { ?>
		<th data-name="Num_of_Created_1" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Created_1->headerCellClass() ?>"><div id="elh_vw_rpt_sms_analyser_Num_of_Created_1" class="vw_rpt_sms_analyser_Num_of_Created_1"><div class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Created_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Num_of_Created_1" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Created_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Created_1) ?>', 2);"><div id="elh_vw_rpt_sms_analyser_Num_of_Created_1" class="vw_rpt_sms_analyser_Num_of_Created_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Created_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_sms_analyser_list->Num_of_Created_1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_sms_analyser_list->Num_of_Created_1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->Visible) { // Num_of_Entered_by_Subdivision ?>
	<?php if ($vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision) == "") { ?>
		<th data-name="Num_of_Entered_by_Subdivision" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->headerCellClass() ?>"><div id="elh_vw_rpt_sms_analyser_Num_of_Entered_by_Subdivision" class="vw_rpt_sms_analyser_Num_of_Entered_by_Subdivision"><div class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Num_of_Entered_by_Subdivision" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision) ?>', 2);"><div id="elh_vw_rpt_sms_analyser_Num_of_Entered_by_Subdivision" class="vw_rpt_sms_analyser_Num_of_Entered_by_Subdivision">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->Num_of_Verified->Visible) { // Num_of_Verified ?>
	<?php if ($vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Verified) == "") { ?>
		<th data-name="Num_of_Verified" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Verified->headerCellClass() ?>"><div id="elh_vw_rpt_sms_analyser_Num_of_Verified" class="vw_rpt_sms_analyser_Num_of_Verified"><div class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Verified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Num_of_Verified" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Verified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Verified) ?>', 2);"><div id="elh_vw_rpt_sms_analyser_Num_of_Verified" class="vw_rpt_sms_analyser_Num_of_Verified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Verified->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_sms_analyser_list->Num_of_Verified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_sms_analyser_list->Num_of_Verified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->Num_of_Status_0->Visible) { // Num_of_Status_0 ?>
	<?php if ($vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Status_0) == "") { ?>
		<th data-name="Num_of_Status_0" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Status_0->headerCellClass() ?>"><div id="elh_vw_rpt_sms_analyser_Num_of_Status_0" class="vw_rpt_sms_analyser_Num_of_Status_0"><div class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Status_0->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Num_of_Status_0" class="<?php echo $vw_rpt_sms_analyser_list->Num_of_Status_0->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_sms_analyser_list->SortUrl($vw_rpt_sms_analyser_list->Num_of_Status_0) ?>', 2);"><div id="elh_vw_rpt_sms_analyser_Num_of_Status_0" class="vw_rpt_sms_analyser_Num_of_Status_0">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_sms_analyser_list->Num_of_Status_0->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_sms_analyser_list->Num_of_Status_0->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_sms_analyser_list->Num_of_Status_0->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_rpt_sms_analyser_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_rpt_sms_analyser_list->ExportAll && $vw_rpt_sms_analyser_list->isExport()) {
	$vw_rpt_sms_analyser_list->StopRecord = $vw_rpt_sms_analyser_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_rpt_sms_analyser_list->TotalRecords > $vw_rpt_sms_analyser_list->StartRecord + $vw_rpt_sms_analyser_list->DisplayRecords - 1)
		$vw_rpt_sms_analyser_list->StopRecord = $vw_rpt_sms_analyser_list->StartRecord + $vw_rpt_sms_analyser_list->DisplayRecords - 1;
	else
		$vw_rpt_sms_analyser_list->StopRecord = $vw_rpt_sms_analyser_list->TotalRecords;
}
$vw_rpt_sms_analyser_list->RecordCount = $vw_rpt_sms_analyser_list->StartRecord - 1;
if ($vw_rpt_sms_analyser_list->Recordset && !$vw_rpt_sms_analyser_list->Recordset->EOF) {
	$vw_rpt_sms_analyser_list->Recordset->moveFirst();
	$selectLimit = $vw_rpt_sms_analyser_list->UseSelectLimit;
	if (!$selectLimit && $vw_rpt_sms_analyser_list->StartRecord > 1)
		$vw_rpt_sms_analyser_list->Recordset->move($vw_rpt_sms_analyser_list->StartRecord - 1);
} elseif (!$vw_rpt_sms_analyser->AllowAddDeleteRow && $vw_rpt_sms_analyser_list->StopRecord == 0) {
	$vw_rpt_sms_analyser_list->StopRecord = $vw_rpt_sms_analyser->GridAddRowCount;
}

// Initialize aggregate
$vw_rpt_sms_analyser->RowType = ROWTYPE_AGGREGATEINIT;
$vw_rpt_sms_analyser->resetAttributes();
$vw_rpt_sms_analyser_list->renderRow();
while ($vw_rpt_sms_analyser_list->RecordCount < $vw_rpt_sms_analyser_list->StopRecord) {
	$vw_rpt_sms_analyser_list->RecordCount++;
	if ($vw_rpt_sms_analyser_list->RecordCount >= $vw_rpt_sms_analyser_list->StartRecord) {
		$vw_rpt_sms_analyser_list->RowCount++;

		// Set up key count
		$vw_rpt_sms_analyser_list->KeyCount = $vw_rpt_sms_analyser_list->RowIndex;

		// Init row class and style
		$vw_rpt_sms_analyser->resetAttributes();
		$vw_rpt_sms_analyser->CssClass = "";
		if ($vw_rpt_sms_analyser_list->isGridAdd()) {
		} else {
			$vw_rpt_sms_analyser_list->loadRowValues($vw_rpt_sms_analyser_list->Recordset); // Load row values
		}
		$vw_rpt_sms_analyser->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_rpt_sms_analyser->RowAttrs->merge(["data-rowindex" => $vw_rpt_sms_analyser_list->RowCount, "id" => "r" . $vw_rpt_sms_analyser_list->RowCount . "_vw_rpt_sms_analyser", "data-rowtype" => $vw_rpt_sms_analyser->RowType]);

		// Render row
		$vw_rpt_sms_analyser_list->renderRow();

		// Render list options
		$vw_rpt_sms_analyser_list->renderListOptions();
?>
	<tr <?php echo $vw_rpt_sms_analyser->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_rpt_sms_analyser_list->ListOptions->render("body", "left", $vw_rpt_sms_analyser_list->RowCount);
?>
	<?php if ($vw_rpt_sms_analyser_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $vw_rpt_sms_analyser_list->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_sms_analyser_list->RowCount ?>_vw_rpt_sms_analyser_SMSDateTime">
<span<?php echo $vw_rpt_sms_analyser_list->SMSDateTime->viewAttributes() ?>><?php echo $vw_rpt_sms_analyser_list->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_sms_analyser_list->Num_of_Records->Visible) { // Num_of_Records ?>
		<td data-name="Num_of_Records" <?php echo $vw_rpt_sms_analyser_list->Num_of_Records->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_sms_analyser_list->RowCount ?>_vw_rpt_sms_analyser_Num_of_Records">
<span<?php echo $vw_rpt_sms_analyser_list->Num_of_Records->viewAttributes() ?>><?php echo $vw_rpt_sms_analyser_list->Num_of_Records->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_sms_analyser_list->Percent_completed->Visible) { // Percent_completed ?>
		<td data-name="Percent_completed" <?php echo $vw_rpt_sms_analyser_list->Percent_completed->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_sms_analyser_list->RowCount ?>_vw_rpt_sms_analyser_Percent_completed">
<span<?php echo $vw_rpt_sms_analyser_list->Percent_completed->viewAttributes() ?>><?php echo $vw_rpt_sms_analyser_list->Percent_completed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_sms_analyser_list->Num_of_SMS_Received->Visible) { // Num_of_SMS_Received ?>
		<td data-name="Num_of_SMS_Received" <?php echo $vw_rpt_sms_analyser_list->Num_of_SMS_Received->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_sms_analyser_list->RowCount ?>_vw_rpt_sms_analyser_Num_of_SMS_Received">
<span<?php echo $vw_rpt_sms_analyser_list->Num_of_SMS_Received->viewAttributes() ?>><?php echo $vw_rpt_sms_analyser_list->Num_of_SMS_Received->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_sms_analyser_list->Num_of_Created_1->Visible) { // Num_of_Created_1 ?>
		<td data-name="Num_of_Created_1" <?php echo $vw_rpt_sms_analyser_list->Num_of_Created_1->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_sms_analyser_list->RowCount ?>_vw_rpt_sms_analyser_Num_of_Created_1">
<span<?php echo $vw_rpt_sms_analyser_list->Num_of_Created_1->viewAttributes() ?>><?php echo $vw_rpt_sms_analyser_list->Num_of_Created_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->Visible) { // Num_of_Entered_by_Subdivision ?>
		<td data-name="Num_of_Entered_by_Subdivision" <?php echo $vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_sms_analyser_list->RowCount ?>_vw_rpt_sms_analyser_Num_of_Entered_by_Subdivision">
<span<?php echo $vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->viewAttributes() ?>><?php echo $vw_rpt_sms_analyser_list->Num_of_Entered_by_Subdivision->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_sms_analyser_list->Num_of_Verified->Visible) { // Num_of_Verified ?>
		<td data-name="Num_of_Verified" <?php echo $vw_rpt_sms_analyser_list->Num_of_Verified->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_sms_analyser_list->RowCount ?>_vw_rpt_sms_analyser_Num_of_Verified">
<span<?php echo $vw_rpt_sms_analyser_list->Num_of_Verified->viewAttributes() ?>><?php echo $vw_rpt_sms_analyser_list->Num_of_Verified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_sms_analyser_list->Num_of_Status_0->Visible) { // Num_of_Status_0 ?>
		<td data-name="Num_of_Status_0" <?php echo $vw_rpt_sms_analyser_list->Num_of_Status_0->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_sms_analyser_list->RowCount ?>_vw_rpt_sms_analyser_Num_of_Status_0">
<span<?php echo $vw_rpt_sms_analyser_list->Num_of_Status_0->viewAttributes() ?>><?php echo $vw_rpt_sms_analyser_list->Num_of_Status_0->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_rpt_sms_analyser_list->ListOptions->render("body", "right", $vw_rpt_sms_analyser_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_rpt_sms_analyser_list->isGridAdd())
		$vw_rpt_sms_analyser_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_rpt_sms_analyser->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_rpt_sms_analyser_list->Recordset)
	$vw_rpt_sms_analyser_list->Recordset->Close();
?>
<?php if (!$vw_rpt_sms_analyser_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_rpt_sms_analyser_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_sms_analyser_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_sms_analyser_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_rpt_sms_analyser_list->TotalRecords == 0 && !$vw_rpt_sms_analyser->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_rpt_sms_analyser_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_rpt_sms_analyser_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_rpt_sms_analyser_list->isExport()) { ?>
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
$vw_rpt_sms_analyser_list->terminate();
?>