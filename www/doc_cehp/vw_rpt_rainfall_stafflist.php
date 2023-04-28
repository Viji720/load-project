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
$vw_rpt_rainfall_staff_list = new vw_rpt_rainfall_staff_list();

// Run the page
$vw_rpt_rainfall_staff_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_rpt_rainfall_staff_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_rpt_rainfall_staff_list->isExport()) { ?>
<script>
var fvw_rpt_rainfall_stafflist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_rpt_rainfall_stafflist = currentForm = new ew.Form("fvw_rpt_rainfall_stafflist", "list");
	fvw_rpt_rainfall_stafflist.formKeyCountName = '<?php echo $vw_rpt_rainfall_staff_list->FormKeyCountName ?>';
	loadjs.done("fvw_rpt_rainfall_stafflist");
});
var fvw_rpt_rainfall_stafflistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_rpt_rainfall_stafflistsrch = currentSearchForm = new ew.Form("fvw_rpt_rainfall_stafflistsrch");

	// Validate function for search
	fvw_rpt_rainfall_stafflistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SMSDateTime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_rainfall_staff_list->SMSDateTime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Rainfall");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_rainfall_staff_list->Rainfall->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_rpt_rainfall_stafflistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_rpt_rainfall_stafflistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fvw_rpt_rainfall_stafflistsrch.filterList = <?php echo $vw_rpt_rainfall_staff_list->getFilterList() ?>;
	loadjs.done("fvw_rpt_rainfall_stafflistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_rpt_rainfall_staff_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_rpt_rainfall_staff_list->TotalRecords > 0 && $vw_rpt_rainfall_staff_list->ExportOptions->visible()) { ?>
<?php $vw_rpt_rainfall_staff_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->ImportOptions->visible()) { ?>
<?php $vw_rpt_rainfall_staff_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->SearchOptions->visible()) { ?>
<?php $vw_rpt_rainfall_staff_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->FilterOptions->visible()) { ?>
<?php $vw_rpt_rainfall_staff_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_rpt_rainfall_staff_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_rpt_rainfall_staff_list->isExport() && !$vw_rpt_rainfall_staff->CurrentAction) { ?>
<form name="fvw_rpt_rainfall_stafflistsrch" id="fvw_rpt_rainfall_stafflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_rpt_rainfall_stafflistsrch-search-panel" class="<?php echo $vw_rpt_rainfall_staff_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_rpt_rainfall_staff">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_rpt_rainfall_staff->RowType = ROWTYPE_SEARCH;
$vw_rpt_rainfall_staff->resetAttributes();
$vw_rpt_rainfall_staff_list->renderRow();
?>
<?php if ($vw_rpt_rainfall_staff_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php
		$vw_rpt_rainfall_staff_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_staff_list->SearchColumnCount - 1) % $vw_rpt_rainfall_staff_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_staff_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_staff_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SMSDateTime" class="ew-cell form-group">
		<label for="x_SMSDateTime" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_SMSDateTime" id="z_SMSDateTime" value="BETWEEN">
</span>
		<span id="el_vw_rpt_rainfall_staff_SMSDateTime" class="ew-search-field">
<input type="text" data-table="vw_rpt_rainfall_staff" data-field="x_SMSDateTime" data-format="7" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="19" value="<?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->EditValue ?>"<?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_rainfall_staff_list->SMSDateTime->ReadOnly && !$vw_rpt_rainfall_staff_list->SMSDateTime->Disabled && !isset($vw_rpt_rainfall_staff_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_rainfall_staff_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_rainfall_stafflistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_rainfall_stafflistsrch", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_rainfall_staff_SMSDateTime" class="ew-search-field2">
<input type="text" data-table="vw_rpt_rainfall_staff" data-field="x_SMSDateTime" data-format="7" name="y_SMSDateTime" id="y_SMSDateTime" maxlength="19" value="<?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->EditValue2 ?>"<?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_rainfall_staff_list->SMSDateTime->ReadOnly && !$vw_rpt_rainfall_staff_list->SMSDateTime->Disabled && !isset($vw_rpt_rainfall_staff_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_rainfall_staff_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_rainfall_stafflistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_rainfall_stafflistsrch", "y_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_staff_list->SearchColumnCount % $vw_rpt_rainfall_staff_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->Rainfall->Visible) { // Rainfall ?>
	<?php
		$vw_rpt_rainfall_staff_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_staff_list->SearchColumnCount - 1) % $vw_rpt_rainfall_staff_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_staff_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_staff_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Rainfall" class="ew-cell form-group">
		<label for="x_Rainfall" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_staff_list->Rainfall->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_Rainfall" id="z_Rainfall" value="BETWEEN">
</span>
		<span id="el_vw_rpt_rainfall_staff_Rainfall" class="ew-search-field">
<input type="text" data-table="vw_rpt_rainfall_staff" data-field="x_Rainfall" name="x_Rainfall" id="x_Rainfall" size="30" maxlength="7" value="<?php echo $vw_rpt_rainfall_staff_list->Rainfall->EditValue ?>"<?php echo $vw_rpt_rainfall_staff_list->Rainfall->editAttributes() ?>>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_rainfall_staff_Rainfall" class="ew-search-field2">
<input type="text" data-table="vw_rpt_rainfall_staff" data-field="x_Rainfall" name="y_Rainfall" id="y_Rainfall" size="30" maxlength="7" value="<?php echo $vw_rpt_rainfall_staff_list->Rainfall->EditValue2 ?>"<?php echo $vw_rpt_rainfall_staff_list->Rainfall->editAttributes() ?>>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_staff_list->SearchColumnCount % $vw_rpt_rainfall_staff_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->SearchColumnCount % $vw_rpt_rainfall_staff_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_rpt_rainfall_staff_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_rpt_rainfall_staff_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_rpt_rainfall_staff_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_rpt_rainfall_staff_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_staff_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_staff_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_staff_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_staff_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_rpt_rainfall_staff_list->showPageHeader(); ?>
<?php
$vw_rpt_rainfall_staff_list->showMessage();
?>
<?php if ($vw_rpt_rainfall_staff_list->TotalRecords > 0 || $vw_rpt_rainfall_staff->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_rpt_rainfall_staff_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_rpt_rainfall_staff">
<?php if (!$vw_rpt_rainfall_staff_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_rpt_rainfall_staff_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_rainfall_staff_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_staff_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_rpt_rainfall_stafflist" id="fvw_rpt_rainfall_stafflist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_rpt_rainfall_staff">
<div id="gmp_vw_rpt_rainfall_staff" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_rpt_rainfall_staff_list->TotalRecords > 0 || $vw_rpt_rainfall_staff_list->isGridEdit()) { ?>
<table id="tbl_vw_rpt_rainfall_stafflist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_rpt_rainfall_staff->RowType = ROWTYPE_HEADER;

// Render list options
$vw_rpt_rainfall_staff_list->renderListOptions();

// Render list options (header, left)
$vw_rpt_rainfall_staff_list->ListOptions->render("header", "left");
?>
<?php if ($vw_rpt_rainfall_staff_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_SMSDateTime" class="vw_rpt_rainfall_staff_SMSDateTime"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->SMSDateTime) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_SMSDateTime" class="vw_rpt_rainfall_staff_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_rainfall_staff_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_SubDivisionId" class="vw_rpt_rainfall_staff_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_rainfall_staff_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->SubDivisionId) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_SubDivisionId" class="vw_rpt_rainfall_staff_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->StationId->Visible) { // StationId ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $vw_rpt_rainfall_staff_list->StationId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_StationId" class="vw_rpt_rainfall_staff_StationId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $vw_rpt_rainfall_staff_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->StationId) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_StationId" class="vw_rpt_rainfall_staff_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->Rainfall->Visible) { // Rainfall ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->Rainfall) == "") { ?>
		<th data-name="Rainfall" class="<?php echo $vw_rpt_rainfall_staff_list->Rainfall->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_Rainfall" class="vw_rpt_rainfall_staff_Rainfall"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->Rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rainfall" class="<?php echo $vw_rpt_rainfall_staff_list->Rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->Rainfall) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_Rainfall" class="vw_rpt_rainfall_staff_Rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->Rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->Rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->Rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->Status->Visible) { // Status ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $vw_rpt_rainfall_staff_list->Status->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_Status" class="vw_rpt_rainfall_staff_Status"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $vw_rpt_rainfall_staff_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->Status) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_Status" class="vw_rpt_rainfall_staff_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->Validated->Visible) { // Validated ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->Validated) == "") { ?>
		<th data-name="Validated" class="<?php echo $vw_rpt_rainfall_staff_list->Validated->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_Validated" class="vw_rpt_rainfall_staff_Validated"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->Validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Validated" class="<?php echo $vw_rpt_rainfall_staff_list->Validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->Validated) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_Validated" class="vw_rpt_rainfall_staff_Validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->Validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->Validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->Validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->StationCode->Visible) { // StationCode ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->StationCode) == "") { ?>
		<th data-name="StationCode" class="<?php echo $vw_rpt_rainfall_staff_list->StationCode->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_StationCode" class="vw_rpt_rainfall_staff_StationCode"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->StationCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationCode" class="<?php echo $vw_rpt_rainfall_staff_list->StationCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->StationCode) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_StationCode" class="vw_rpt_rainfall_staff_StationCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->StationCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->StationCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->StationCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_rainfall_staff_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_MobileNumber" class="vw_rpt_rainfall_staff_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_rainfall_staff_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->MobileNumber) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_MobileNumber" class="vw_rpt_rainfall_staff_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->IsActive->Visible) { // IsActive ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->IsActive) == "") { ?>
		<th data-name="IsActive" class="<?php echo $vw_rpt_rainfall_staff_list->IsActive->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_IsActive" class="vw_rpt_rainfall_staff_IsActive"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->IsActive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsActive" class="<?php echo $vw_rpt_rainfall_staff_list->IsActive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->IsActive) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_IsActive" class="vw_rpt_rainfall_staff_IsActive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->IsActive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->IsActive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->IsActive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->DivisionId->Visible) { // DivisionId ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->DivisionId) == "") { ?>
		<th data-name="DivisionId" class="<?php echo $vw_rpt_rainfall_staff_list->DivisionId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_DivisionId" class="vw_rpt_rainfall_staff_DivisionId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->DivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DivisionId" class="<?php echo $vw_rpt_rainfall_staff_list->DivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->DivisionId) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_DivisionId" class="vw_rpt_rainfall_staff_DivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->DivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->DivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->DivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->DistrictId->Visible) { // DistrictId ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->DistrictId) == "") { ?>
		<th data-name="DistrictId" class="<?php echo $vw_rpt_rainfall_staff_list->DistrictId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_DistrictId" class="vw_rpt_rainfall_staff_DistrictId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->DistrictId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictId" class="<?php echo $vw_rpt_rainfall_staff_list->DistrictId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->DistrictId) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_DistrictId" class="vw_rpt_rainfall_staff_DistrictId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->DistrictId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->DistrictId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->DistrictId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->TalukID->Visible) { // TalukID ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->TalukID) == "") { ?>
		<th data-name="TalukID" class="<?php echo $vw_rpt_rainfall_staff_list->TalukID->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_TalukID" class="vw_rpt_rainfall_staff_TalukID"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->TalukID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukID" class="<?php echo $vw_rpt_rainfall_staff_list->TalukID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->TalukID) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_TalukID" class="vw_rpt_rainfall_staff_TalukID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->TalukID->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->TalukID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->TalukID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->BasinId->Visible) { // BasinId ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->BasinId) == "") { ?>
		<th data-name="BasinId" class="<?php echo $vw_rpt_rainfall_staff_list->BasinId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_BasinId" class="vw_rpt_rainfall_staff_BasinId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->BasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinId" class="<?php echo $vw_rpt_rainfall_staff_list->BasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->BasinId) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_BasinId" class="vw_rpt_rainfall_staff_BasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->BasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->BasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->BasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->SubBasinId->Visible) { // SubBasinId ?>
	<?php if ($vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->SubBasinId) == "") { ?>
		<th data-name="SubBasinId" class="<?php echo $vw_rpt_rainfall_staff_list->SubBasinId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_staff_SubBasinId" class="vw_rpt_rainfall_staff_SubBasinId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->SubBasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinId" class="<?php echo $vw_rpt_rainfall_staff_list->SubBasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_staff_list->SortUrl($vw_rpt_rainfall_staff_list->SubBasinId) ?>', 2);"><div id="elh_vw_rpt_rainfall_staff_SubBasinId" class="vw_rpt_rainfall_staff_SubBasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_staff_list->SubBasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_staff_list->SubBasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_staff_list->SubBasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_rpt_rainfall_staff_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_rpt_rainfall_staff_list->ExportAll && $vw_rpt_rainfall_staff_list->isExport()) {
	$vw_rpt_rainfall_staff_list->StopRecord = $vw_rpt_rainfall_staff_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_rpt_rainfall_staff_list->TotalRecords > $vw_rpt_rainfall_staff_list->StartRecord + $vw_rpt_rainfall_staff_list->DisplayRecords - 1)
		$vw_rpt_rainfall_staff_list->StopRecord = $vw_rpt_rainfall_staff_list->StartRecord + $vw_rpt_rainfall_staff_list->DisplayRecords - 1;
	else
		$vw_rpt_rainfall_staff_list->StopRecord = $vw_rpt_rainfall_staff_list->TotalRecords;
}
$vw_rpt_rainfall_staff_list->RecordCount = $vw_rpt_rainfall_staff_list->StartRecord - 1;
if ($vw_rpt_rainfall_staff_list->Recordset && !$vw_rpt_rainfall_staff_list->Recordset->EOF) {
	$vw_rpt_rainfall_staff_list->Recordset->moveFirst();
	$selectLimit = $vw_rpt_rainfall_staff_list->UseSelectLimit;
	if (!$selectLimit && $vw_rpt_rainfall_staff_list->StartRecord > 1)
		$vw_rpt_rainfall_staff_list->Recordset->move($vw_rpt_rainfall_staff_list->StartRecord - 1);
} elseif (!$vw_rpt_rainfall_staff->AllowAddDeleteRow && $vw_rpt_rainfall_staff_list->StopRecord == 0) {
	$vw_rpt_rainfall_staff_list->StopRecord = $vw_rpt_rainfall_staff->GridAddRowCount;
}

// Initialize aggregate
$vw_rpt_rainfall_staff->RowType = ROWTYPE_AGGREGATEINIT;
$vw_rpt_rainfall_staff->resetAttributes();
$vw_rpt_rainfall_staff_list->renderRow();
while ($vw_rpt_rainfall_staff_list->RecordCount < $vw_rpt_rainfall_staff_list->StopRecord) {
	$vw_rpt_rainfall_staff_list->RecordCount++;
	if ($vw_rpt_rainfall_staff_list->RecordCount >= $vw_rpt_rainfall_staff_list->StartRecord) {
		$vw_rpt_rainfall_staff_list->RowCount++;

		// Set up key count
		$vw_rpt_rainfall_staff_list->KeyCount = $vw_rpt_rainfall_staff_list->RowIndex;

		// Init row class and style
		$vw_rpt_rainfall_staff->resetAttributes();
		$vw_rpt_rainfall_staff->CssClass = "";
		if ($vw_rpt_rainfall_staff_list->isGridAdd()) {
		} else {
			$vw_rpt_rainfall_staff_list->loadRowValues($vw_rpt_rainfall_staff_list->Recordset); // Load row values
		}
		$vw_rpt_rainfall_staff->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_rpt_rainfall_staff->RowAttrs->merge(["data-rowindex" => $vw_rpt_rainfall_staff_list->RowCount, "id" => "r" . $vw_rpt_rainfall_staff_list->RowCount . "_vw_rpt_rainfall_staff", "data-rowtype" => $vw_rpt_rainfall_staff->RowType]);

		// Render row
		$vw_rpt_rainfall_staff_list->renderRow();

		// Render list options
		$vw_rpt_rainfall_staff_list->renderListOptions();
?>
	<tr <?php echo $vw_rpt_rainfall_staff->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_rpt_rainfall_staff_list->ListOptions->render("body", "left", $vw_rpt_rainfall_staff_list->RowCount);
?>
	<?php if ($vw_rpt_rainfall_staff_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_SMSDateTime">
<span<?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_rpt_rainfall_staff_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_SubDivisionId">
<span<?php echo $vw_rpt_rainfall_staff_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $vw_rpt_rainfall_staff_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_StationId">
<span<?php echo $vw_rpt_rainfall_staff_list->StationId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->Rainfall->Visible) { // Rainfall ?>
		<td data-name="Rainfall" <?php echo $vw_rpt_rainfall_staff_list->Rainfall->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_Rainfall">
<span<?php echo $vw_rpt_rainfall_staff_list->Rainfall->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->Rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $vw_rpt_rainfall_staff_list->Status->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_Status">
<span<?php echo $vw_rpt_rainfall_staff_list->Status->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->Validated->Visible) { // Validated ?>
		<td data-name="Validated" <?php echo $vw_rpt_rainfall_staff_list->Validated->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_Validated">
<span<?php echo $vw_rpt_rainfall_staff_list->Validated->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->Validated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->StationCode->Visible) { // StationCode ?>
		<td data-name="StationCode" <?php echo $vw_rpt_rainfall_staff_list->StationCode->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_StationCode">
<span<?php echo $vw_rpt_rainfall_staff_list->StationCode->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->StationCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_rpt_rainfall_staff_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_MobileNumber">
<span<?php echo $vw_rpt_rainfall_staff_list->MobileNumber->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->IsActive->Visible) { // IsActive ?>
		<td data-name="IsActive" <?php echo $vw_rpt_rainfall_staff_list->IsActive->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_IsActive">
<span<?php echo $vw_rpt_rainfall_staff_list->IsActive->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->IsActive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->DivisionId->Visible) { // DivisionId ?>
		<td data-name="DivisionId" <?php echo $vw_rpt_rainfall_staff_list->DivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_DivisionId">
<span<?php echo $vw_rpt_rainfall_staff_list->DivisionId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->DivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->DistrictId->Visible) { // DistrictId ?>
		<td data-name="DistrictId" <?php echo $vw_rpt_rainfall_staff_list->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_DistrictId">
<span<?php echo $vw_rpt_rainfall_staff_list->DistrictId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->DistrictId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->TalukID->Visible) { // TalukID ?>
		<td data-name="TalukID" <?php echo $vw_rpt_rainfall_staff_list->TalukID->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_TalukID">
<span<?php echo $vw_rpt_rainfall_staff_list->TalukID->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->TalukID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->BasinId->Visible) { // BasinId ?>
		<td data-name="BasinId" <?php echo $vw_rpt_rainfall_staff_list->BasinId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_BasinId">
<span<?php echo $vw_rpt_rainfall_staff_list->BasinId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->BasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_staff_list->SubBasinId->Visible) { // SubBasinId ?>
		<td data-name="SubBasinId" <?php echo $vw_rpt_rainfall_staff_list->SubBasinId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_staff_list->RowCount ?>_vw_rpt_rainfall_staff_SubBasinId">
<span<?php echo $vw_rpt_rainfall_staff_list->SubBasinId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_staff_list->SubBasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_rpt_rainfall_staff_list->ListOptions->render("body", "right", $vw_rpt_rainfall_staff_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_rpt_rainfall_staff_list->isGridAdd())
		$vw_rpt_rainfall_staff_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_rpt_rainfall_staff->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_rpt_rainfall_staff_list->Recordset)
	$vw_rpt_rainfall_staff_list->Recordset->Close();
?>
<?php if (!$vw_rpt_rainfall_staff_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_rpt_rainfall_staff_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_rainfall_staff_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_staff_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_rpt_rainfall_staff_list->TotalRecords == 0 && !$vw_rpt_rainfall_staff->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_staff_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_rpt_rainfall_staff_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_rpt_rainfall_staff_list->isExport()) { ?>
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
$vw_rpt_rainfall_staff_list->terminate();
?>