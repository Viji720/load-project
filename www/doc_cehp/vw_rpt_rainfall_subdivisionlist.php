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
$vw_rpt_rainfall_subdivision_list = new vw_rpt_rainfall_subdivision_list();

// Run the page
$vw_rpt_rainfall_subdivision_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_rpt_rainfall_subdivision_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_rpt_rainfall_subdivision_list->isExport()) { ?>
<script>
var fvw_rpt_rainfall_subdivisionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_rpt_rainfall_subdivisionlist = currentForm = new ew.Form("fvw_rpt_rainfall_subdivisionlist", "list");
	fvw_rpt_rainfall_subdivisionlist.formKeyCountName = '<?php echo $vw_rpt_rainfall_subdivision_list->FormKeyCountName ?>';
	loadjs.done("fvw_rpt_rainfall_subdivisionlist");
});
var fvw_rpt_rainfall_subdivisionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_rpt_rainfall_subdivisionlistsrch = currentSearchForm = new ew.Form("fvw_rpt_rainfall_subdivisionlistsrch");

	// Validate function for search
	fvw_rpt_rainfall_subdivisionlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SMSDateTime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_rainfall_subdivision_list->SMSDateTime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Rainfall");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($vw_rpt_rainfall_subdivision_list->Rainfall->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fvw_rpt_rainfall_subdivisionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_rpt_rainfall_subdivisionlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fvw_rpt_rainfall_subdivisionlistsrch.filterList = <?php echo $vw_rpt_rainfall_subdivision_list->getFilterList() ?>;
	loadjs.done("fvw_rpt_rainfall_subdivisionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_rpt_rainfall_subdivision_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_rpt_rainfall_subdivision_list->TotalRecords > 0 && $vw_rpt_rainfall_subdivision_list->ExportOptions->visible()) { ?>
<?php $vw_rpt_rainfall_subdivision_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->ImportOptions->visible()) { ?>
<?php $vw_rpt_rainfall_subdivision_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->SearchOptions->visible()) { ?>
<?php $vw_rpt_rainfall_subdivision_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->FilterOptions->visible()) { ?>
<?php $vw_rpt_rainfall_subdivision_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_rpt_rainfall_subdivision_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_rpt_rainfall_subdivision_list->isExport() && !$vw_rpt_rainfall_subdivision->CurrentAction) { ?>
<form name="fvw_rpt_rainfall_subdivisionlistsrch" id="fvw_rpt_rainfall_subdivisionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_rpt_rainfall_subdivisionlistsrch-search-panel" class="<?php echo $vw_rpt_rainfall_subdivision_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_rpt_rainfall_subdivision">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_rpt_rainfall_subdivision->RowType = ROWTYPE_SEARCH;
$vw_rpt_rainfall_subdivision->resetAttributes();
$vw_rpt_rainfall_subdivision_list->renderRow();
?>
<?php if ($vw_rpt_rainfall_subdivision_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php
		$vw_rpt_rainfall_subdivision_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_subdivision_list->SearchColumnCount - 1) % $vw_rpt_rainfall_subdivision_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_subdivision_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_subdivision_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SMSDateTime" class="ew-cell form-group">
		<label for="x_SMSDateTime" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_SMSDateTime" id="z_SMSDateTime" value="BETWEEN">
</span>
		<span id="el_vw_rpt_rainfall_subdivision_SMSDateTime" class="ew-search-field">
<input type="text" data-table="vw_rpt_rainfall_subdivision" data-field="x_SMSDateTime" data-format="7" name="x_SMSDateTime" id="x_SMSDateTime" maxlength="19" value="<?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->EditValue ?>"<?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_rainfall_subdivision_list->SMSDateTime->ReadOnly && !$vw_rpt_rainfall_subdivision_list->SMSDateTime->Disabled && !isset($vw_rpt_rainfall_subdivision_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_rainfall_subdivision_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_rainfall_subdivisionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_rainfall_subdivisionlistsrch", "x_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_rainfall_subdivision_SMSDateTime" class="ew-search-field2">
<input type="text" data-table="vw_rpt_rainfall_subdivision" data-field="x_SMSDateTime" data-format="7" name="y_SMSDateTime" id="y_SMSDateTime" maxlength="19" value="<?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->EditValue2 ?>"<?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->editAttributes() ?>>
<?php if (!$vw_rpt_rainfall_subdivision_list->SMSDateTime->ReadOnly && !$vw_rpt_rainfall_subdivision_list->SMSDateTime->Disabled && !isset($vw_rpt_rainfall_subdivision_list->SMSDateTime->EditAttrs["readonly"]) && !isset($vw_rpt_rainfall_subdivision_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_rpt_rainfall_subdivisionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_rpt_rainfall_subdivisionlistsrch", "y_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_subdivision_list->SearchColumnCount % $vw_rpt_rainfall_subdivision_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->Rainfall->Visible) { // Rainfall ?>
	<?php
		$vw_rpt_rainfall_subdivision_list->SearchColumnCount++;
		if (($vw_rpt_rainfall_subdivision_list->SearchColumnCount - 1) % $vw_rpt_rainfall_subdivision_list->SearchFieldsPerRow == 0) {
			$vw_rpt_rainfall_subdivision_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_rpt_rainfall_subdivision_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Rainfall" class="ew-cell form-group">
		<label for="x_Rainfall" class="ew-search-caption ew-label"><?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_Rainfall" id="z_Rainfall" value="BETWEEN">
</span>
		<span id="el_vw_rpt_rainfall_subdivision_Rainfall" class="ew-search-field">
<input type="text" data-table="vw_rpt_rainfall_subdivision" data-field="x_Rainfall" name="x_Rainfall" id="x_Rainfall" size="30" maxlength="7" value="<?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->EditValue ?>"<?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->editAttributes() ?>>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_vw_rpt_rainfall_subdivision_Rainfall" class="ew-search-field2">
<input type="text" data-table="vw_rpt_rainfall_subdivision" data-field="x_Rainfall" name="y_Rainfall" id="y_Rainfall" size="30" maxlength="7" value="<?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->EditValue2 ?>"<?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->editAttributes() ?>>
</span>
	</div>
	<?php if ($vw_rpt_rainfall_subdivision_list->SearchColumnCount % $vw_rpt_rainfall_subdivision_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SearchColumnCount % $vw_rpt_rainfall_subdivision_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_rpt_rainfall_subdivision_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_rpt_rainfall_subdivision_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_rpt_rainfall_subdivision_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_rpt_rainfall_subdivision_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_subdivision_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_subdivision_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_subdivision_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_rpt_rainfall_subdivision_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_rpt_rainfall_subdivision_list->showPageHeader(); ?>
<?php
$vw_rpt_rainfall_subdivision_list->showMessage();
?>
<?php if ($vw_rpt_rainfall_subdivision_list->TotalRecords > 0 || $vw_rpt_rainfall_subdivision->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_rpt_rainfall_subdivision_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_rpt_rainfall_subdivision">
<?php if (!$vw_rpt_rainfall_subdivision_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_rpt_rainfall_subdivision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_rainfall_subdivision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_subdivision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_rpt_rainfall_subdivisionlist" id="fvw_rpt_rainfall_subdivisionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_rpt_rainfall_subdivision">
<div id="gmp_vw_rpt_rainfall_subdivision" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_rpt_rainfall_subdivision_list->TotalRecords > 0 || $vw_rpt_rainfall_subdivision_list->isGridEdit()) { ?>
<table id="tbl_vw_rpt_rainfall_subdivisionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_rpt_rainfall_subdivision->RowType = ROWTYPE_HEADER;

// Render list options
$vw_rpt_rainfall_subdivision_list->renderListOptions();

// Render list options (header, left)
$vw_rpt_rainfall_subdivision_list->ListOptions->render("header", "left");
?>
<?php if ($vw_rpt_rainfall_subdivision_list->Slno->Visible) { // Slno ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->Slno) == "") { ?>
		<th data-name="Slno" class="<?php echo $vw_rpt_rainfall_subdivision_list->Slno->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_Slno" class="vw_rpt_rainfall_subdivision_Slno"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->Slno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Slno" class="<?php echo $vw_rpt_rainfall_subdivision_list->Slno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->Slno) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_Slno" class="vw_rpt_rainfall_subdivision_Slno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->Slno->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->Slno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->Slno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_SMSDateTime" class="vw_rpt_rainfall_subdivision_SMSDateTime"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->SMSDateTime) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_SMSDateTime" class="vw_rpt_rainfall_subdivision_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_rainfall_subdivision_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_SubDivisionId" class="vw_rpt_rainfall_subdivision_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_rpt_rainfall_subdivision_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->SubDivisionId) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_SubDivisionId" class="vw_rpt_rainfall_subdivision_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->StationId->Visible) { // StationId ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $vw_rpt_rainfall_subdivision_list->StationId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_StationId" class="vw_rpt_rainfall_subdivision_StationId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $vw_rpt_rainfall_subdivision_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->StationId) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_StationId" class="vw_rpt_rainfall_subdivision_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->Rainfall->Visible) { // Rainfall ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->Rainfall) == "") { ?>
		<th data-name="Rainfall" class="<?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_Rainfall" class="vw_rpt_rainfall_subdivision_Rainfall"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rainfall" class="<?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->Rainfall) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_Rainfall" class="vw_rpt_rainfall_subdivision_Rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->Rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->Rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->Status->Visible) { // Status ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $vw_rpt_rainfall_subdivision_list->Status->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_Status" class="vw_rpt_rainfall_subdivision_Status"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $vw_rpt_rainfall_subdivision_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->Status) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_Status" class="vw_rpt_rainfall_subdivision_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->Validated->Visible) { // Validated ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->Validated) == "") { ?>
		<th data-name="Validated" class="<?php echo $vw_rpt_rainfall_subdivision_list->Validated->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_Validated" class="vw_rpt_rainfall_subdivision_Validated"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->Validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Validated" class="<?php echo $vw_rpt_rainfall_subdivision_list->Validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->Validated) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_Validated" class="vw_rpt_rainfall_subdivision_Validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->Validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->Validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->Validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_rainfall_subdivision_list->MobileNumber->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_MobileNumber" class="vw_rpt_rainfall_subdivision_MobileNumber"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $vw_rpt_rainfall_subdivision_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->MobileNumber) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_MobileNumber" class="vw_rpt_rainfall_subdivision_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->IsActive->Visible) { // IsActive ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->IsActive) == "") { ?>
		<th data-name="IsActive" class="<?php echo $vw_rpt_rainfall_subdivision_list->IsActive->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_IsActive" class="vw_rpt_rainfall_subdivision_IsActive"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->IsActive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsActive" class="<?php echo $vw_rpt_rainfall_subdivision_list->IsActive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->IsActive) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_IsActive" class="vw_rpt_rainfall_subdivision_IsActive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->IsActive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->IsActive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->IsActive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->DivisionId->Visible) { // DivisionId ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->DivisionId) == "") { ?>
		<th data-name="DivisionId" class="<?php echo $vw_rpt_rainfall_subdivision_list->DivisionId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_DivisionId" class="vw_rpt_rainfall_subdivision_DivisionId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->DivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DivisionId" class="<?php echo $vw_rpt_rainfall_subdivision_list->DivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->DivisionId) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_DivisionId" class="vw_rpt_rainfall_subdivision_DivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->DivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->DivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->DivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->DistrictId->Visible) { // DistrictId ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->DistrictId) == "") { ?>
		<th data-name="DistrictId" class="<?php echo $vw_rpt_rainfall_subdivision_list->DistrictId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_DistrictId" class="vw_rpt_rainfall_subdivision_DistrictId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->DistrictId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DistrictId" class="<?php echo $vw_rpt_rainfall_subdivision_list->DistrictId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->DistrictId) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_DistrictId" class="vw_rpt_rainfall_subdivision_DistrictId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->DistrictId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->DistrictId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->DistrictId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->TalukID->Visible) { // TalukID ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->TalukID) == "") { ?>
		<th data-name="TalukID" class="<?php echo $vw_rpt_rainfall_subdivision_list->TalukID->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_TalukID" class="vw_rpt_rainfall_subdivision_TalukID"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->TalukID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TalukID" class="<?php echo $vw_rpt_rainfall_subdivision_list->TalukID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->TalukID) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_TalukID" class="vw_rpt_rainfall_subdivision_TalukID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->TalukID->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->TalukID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->TalukID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->BasinId->Visible) { // BasinId ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->BasinId) == "") { ?>
		<th data-name="BasinId" class="<?php echo $vw_rpt_rainfall_subdivision_list->BasinId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_BasinId" class="vw_rpt_rainfall_subdivision_BasinId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->BasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BasinId" class="<?php echo $vw_rpt_rainfall_subdivision_list->BasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->BasinId) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_BasinId" class="vw_rpt_rainfall_subdivision_BasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->BasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->BasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->BasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->SubBasinId->Visible) { // SubBasinId ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->SubBasinId) == "") { ?>
		<th data-name="SubBasinId" class="<?php echo $vw_rpt_rainfall_subdivision_list->SubBasinId->headerCellClass() ?>"><div id="elh_vw_rpt_rainfall_subdivision_SubBasinId" class="vw_rpt_rainfall_subdivision_SubBasinId"><div class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->SubBasinId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubBasinId" class="<?php echo $vw_rpt_rainfall_subdivision_list->SubBasinId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_rpt_rainfall_subdivision_list->SortUrl($vw_rpt_rainfall_subdivision_list->SubBasinId) ?>', 2);"><div id="elh_vw_rpt_rainfall_subdivision_SubBasinId" class="vw_rpt_rainfall_subdivision_SubBasinId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_rpt_rainfall_subdivision_list->SubBasinId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_rpt_rainfall_subdivision_list->SubBasinId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_rpt_rainfall_subdivision_list->SubBasinId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_rpt_rainfall_subdivision_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_rpt_rainfall_subdivision_list->ExportAll && $vw_rpt_rainfall_subdivision_list->isExport()) {
	$vw_rpt_rainfall_subdivision_list->StopRecord = $vw_rpt_rainfall_subdivision_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_rpt_rainfall_subdivision_list->TotalRecords > $vw_rpt_rainfall_subdivision_list->StartRecord + $vw_rpt_rainfall_subdivision_list->DisplayRecords - 1)
		$vw_rpt_rainfall_subdivision_list->StopRecord = $vw_rpt_rainfall_subdivision_list->StartRecord + $vw_rpt_rainfall_subdivision_list->DisplayRecords - 1;
	else
		$vw_rpt_rainfall_subdivision_list->StopRecord = $vw_rpt_rainfall_subdivision_list->TotalRecords;
}
$vw_rpt_rainfall_subdivision_list->RecordCount = $vw_rpt_rainfall_subdivision_list->StartRecord - 1;
if ($vw_rpt_rainfall_subdivision_list->Recordset && !$vw_rpt_rainfall_subdivision_list->Recordset->EOF) {
	$vw_rpt_rainfall_subdivision_list->Recordset->moveFirst();
	$selectLimit = $vw_rpt_rainfall_subdivision_list->UseSelectLimit;
	if (!$selectLimit && $vw_rpt_rainfall_subdivision_list->StartRecord > 1)
		$vw_rpt_rainfall_subdivision_list->Recordset->move($vw_rpt_rainfall_subdivision_list->StartRecord - 1);
} elseif (!$vw_rpt_rainfall_subdivision->AllowAddDeleteRow && $vw_rpt_rainfall_subdivision_list->StopRecord == 0) {
	$vw_rpt_rainfall_subdivision_list->StopRecord = $vw_rpt_rainfall_subdivision->GridAddRowCount;
}

// Initialize aggregate
$vw_rpt_rainfall_subdivision->RowType = ROWTYPE_AGGREGATEINIT;
$vw_rpt_rainfall_subdivision->resetAttributes();
$vw_rpt_rainfall_subdivision_list->renderRow();
while ($vw_rpt_rainfall_subdivision_list->RecordCount < $vw_rpt_rainfall_subdivision_list->StopRecord) {
	$vw_rpt_rainfall_subdivision_list->RecordCount++;
	if ($vw_rpt_rainfall_subdivision_list->RecordCount >= $vw_rpt_rainfall_subdivision_list->StartRecord) {
		$vw_rpt_rainfall_subdivision_list->RowCount++;

		// Set up key count
		$vw_rpt_rainfall_subdivision_list->KeyCount = $vw_rpt_rainfall_subdivision_list->RowIndex;

		// Init row class and style
		$vw_rpt_rainfall_subdivision->resetAttributes();
		$vw_rpt_rainfall_subdivision->CssClass = "";
		if ($vw_rpt_rainfall_subdivision_list->isGridAdd()) {
		} else {
			$vw_rpt_rainfall_subdivision_list->loadRowValues($vw_rpt_rainfall_subdivision_list->Recordset); // Load row values
		}
		$vw_rpt_rainfall_subdivision->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vw_rpt_rainfall_subdivision->RowAttrs->merge(["data-rowindex" => $vw_rpt_rainfall_subdivision_list->RowCount, "id" => "r" . $vw_rpt_rainfall_subdivision_list->RowCount . "_vw_rpt_rainfall_subdivision", "data-rowtype" => $vw_rpt_rainfall_subdivision->RowType]);

		// Render row
		$vw_rpt_rainfall_subdivision_list->renderRow();

		// Render list options
		$vw_rpt_rainfall_subdivision_list->renderListOptions();
?>
	<tr <?php echo $vw_rpt_rainfall_subdivision->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_rpt_rainfall_subdivision_list->ListOptions->render("body", "left", $vw_rpt_rainfall_subdivision_list->RowCount);
?>
	<?php if ($vw_rpt_rainfall_subdivision_list->Slno->Visible) { // Slno ?>
		<td data-name="Slno" <?php echo $vw_rpt_rainfall_subdivision_list->Slno->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_Slno">
<span<?php echo $vw_rpt_rainfall_subdivision_list->Slno->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->Slno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_SMSDateTime">
<span<?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->SMSDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_rpt_rainfall_subdivision_list->SubDivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_SubDivisionId">
<span<?php echo $vw_rpt_rainfall_subdivision_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->SubDivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $vw_rpt_rainfall_subdivision_list->StationId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_StationId">
<span<?php echo $vw_rpt_rainfall_subdivision_list->StationId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->StationId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->Rainfall->Visible) { // Rainfall ?>
		<td data-name="Rainfall" <?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_Rainfall">
<span<?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->Rainfall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $vw_rpt_rainfall_subdivision_list->Status->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_Status">
<span<?php echo $vw_rpt_rainfall_subdivision_list->Status->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->Validated->Visible) { // Validated ?>
		<td data-name="Validated" <?php echo $vw_rpt_rainfall_subdivision_list->Validated->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_Validated">
<span<?php echo $vw_rpt_rainfall_subdivision_list->Validated->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->Validated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $vw_rpt_rainfall_subdivision_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_MobileNumber">
<span<?php echo $vw_rpt_rainfall_subdivision_list->MobileNumber->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->IsActive->Visible) { // IsActive ?>
		<td data-name="IsActive" <?php echo $vw_rpt_rainfall_subdivision_list->IsActive->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_IsActive">
<span<?php echo $vw_rpt_rainfall_subdivision_list->IsActive->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->IsActive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->DivisionId->Visible) { // DivisionId ?>
		<td data-name="DivisionId" <?php echo $vw_rpt_rainfall_subdivision_list->DivisionId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_DivisionId">
<span<?php echo $vw_rpt_rainfall_subdivision_list->DivisionId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->DivisionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->DistrictId->Visible) { // DistrictId ?>
		<td data-name="DistrictId" <?php echo $vw_rpt_rainfall_subdivision_list->DistrictId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_DistrictId">
<span<?php echo $vw_rpt_rainfall_subdivision_list->DistrictId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->DistrictId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->TalukID->Visible) { // TalukID ?>
		<td data-name="TalukID" <?php echo $vw_rpt_rainfall_subdivision_list->TalukID->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_TalukID">
<span<?php echo $vw_rpt_rainfall_subdivision_list->TalukID->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->TalukID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->BasinId->Visible) { // BasinId ?>
		<td data-name="BasinId" <?php echo $vw_rpt_rainfall_subdivision_list->BasinId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_BasinId">
<span<?php echo $vw_rpt_rainfall_subdivision_list->BasinId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->BasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vw_rpt_rainfall_subdivision_list->SubBasinId->Visible) { // SubBasinId ?>
		<td data-name="SubBasinId" <?php echo $vw_rpt_rainfall_subdivision_list->SubBasinId->cellAttributes() ?>>
<span id="el<?php echo $vw_rpt_rainfall_subdivision_list->RowCount ?>_vw_rpt_rainfall_subdivision_SubBasinId">
<span<?php echo $vw_rpt_rainfall_subdivision_list->SubBasinId->viewAttributes() ?>><?php echo $vw_rpt_rainfall_subdivision_list->SubBasinId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_rpt_rainfall_subdivision_list->ListOptions->render("body", "right", $vw_rpt_rainfall_subdivision_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vw_rpt_rainfall_subdivision_list->isGridAdd())
		$vw_rpt_rainfall_subdivision_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vw_rpt_rainfall_subdivision->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_rpt_rainfall_subdivision_list->Recordset)
	$vw_rpt_rainfall_subdivision_list->Recordset->Close();
?>
<?php if (!$vw_rpt_rainfall_subdivision_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_rpt_rainfall_subdivision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_rpt_rainfall_subdivision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_subdivision_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_rpt_rainfall_subdivision_list->TotalRecords == 0 && !$vw_rpt_rainfall_subdivision->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_rpt_rainfall_subdivision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_rpt_rainfall_subdivision_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_rpt_rainfall_subdivision_list->isExport()) { ?>
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
$vw_rpt_rainfall_subdivision_list->terminate();
?>