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
$cum_stats_list = new cum_stats_list();

// Run the page
$cum_stats_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cum_stats_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$cum_stats_list->isExport()) { ?>
<script>
var fcum_statslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcum_statslist = currentForm = new ew.Form("fcum_statslist", "list");
	fcum_statslist.formKeyCountName = '<?php echo $cum_stats_list->FormKeyCountName ?>';
	loadjs.done("fcum_statslist");
});
var fcum_statslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcum_statslistsrch = currentSearchForm = new ew.Form("fcum_statslistsrch");

	// Validate function for search
	fcum_statslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_Obs_Date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($cum_stats_list->Obs_Date->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fcum_statslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcum_statslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fcum_statslistsrch.filterList = <?php echo $cum_stats_list->getFilterList() ?>;
	loadjs.done("fcum_statslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$cum_stats_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($cum_stats_list->TotalRecords > 0 && $cum_stats_list->ExportOptions->visible()) { ?>
<?php $cum_stats_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($cum_stats_list->ImportOptions->visible()) { ?>
<?php $cum_stats_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($cum_stats_list->SearchOptions->visible()) { ?>
<?php $cum_stats_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($cum_stats_list->FilterOptions->visible()) { ?>
<?php $cum_stats_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$cum_stats_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$cum_stats_list->isExport() && !$cum_stats->CurrentAction) { ?>
<form name="fcum_statslistsrch" id="fcum_statslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcum_statslistsrch-search-panel" class="<?php echo $cum_stats_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="cum_stats">
	<div class="ew-extended-search">
<?php

// Render search row
$cum_stats->RowType = ROWTYPE_SEARCH;
$cum_stats->resetAttributes();
$cum_stats_list->renderRow();
?>
<?php if ($cum_stats_list->Obs_Date->Visible) { // Obs_Date ?>
	<?php
		$cum_stats_list->SearchColumnCount++;
		if (($cum_stats_list->SearchColumnCount - 1) % $cum_stats_list->SearchFieldsPerRow == 0) {
			$cum_stats_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $cum_stats_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Obs_Date" class="ew-cell form-group">
		<label for="x_Obs_Date" class="ew-search-caption ew-label"><?php echo $cum_stats_list->Obs_Date->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_Obs_Date" id="z_Obs_Date" value="BETWEEN">
</span>
		<span id="el_cum_stats_Obs_Date" class="ew-search-field">
<input type="text" data-table="cum_stats" data-field="x_Obs_Date" data-format="7" name="x_Obs_Date" id="x_Obs_Date" maxlength="10" value="<?php echo $cum_stats_list->Obs_Date->EditValue ?>"<?php echo $cum_stats_list->Obs_Date->editAttributes() ?>>
<?php if (!$cum_stats_list->Obs_Date->ReadOnly && !$cum_stats_list->Obs_Date->Disabled && !isset($cum_stats_list->Obs_Date->EditAttrs["readonly"]) && !isset($cum_stats_list->Obs_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcum_statslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fcum_statslistsrch", "x_Obs_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_cum_stats_Obs_Date" class="ew-search-field2">
<input type="text" data-table="cum_stats" data-field="x_Obs_Date" data-format="7" name="y_Obs_Date" id="y_Obs_Date" maxlength="10" value="<?php echo $cum_stats_list->Obs_Date->EditValue2 ?>"<?php echo $cum_stats_list->Obs_Date->editAttributes() ?>>
<?php if (!$cum_stats_list->Obs_Date->ReadOnly && !$cum_stats_list->Obs_Date->Disabled && !isset($cum_stats_list->Obs_Date->EditAttrs["readonly"]) && !isset($cum_stats_list->Obs_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcum_statslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fcum_statslistsrch", "y_Obs_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($cum_stats_list->SearchColumnCount % $cum_stats_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($cum_stats_list->SearchColumnCount % $cum_stats_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $cum_stats_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($cum_stats_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($cum_stats_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $cum_stats_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($cum_stats_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($cum_stats_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($cum_stats_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($cum_stats_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $cum_stats_list->showPageHeader(); ?>
<?php
$cum_stats_list->showMessage();
?>
<?php if ($cum_stats_list->TotalRecords > 0 || $cum_stats->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($cum_stats_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> cum_stats">
<?php if (!$cum_stats_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$cum_stats_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $cum_stats_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $cum_stats_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcum_statslist" id="fcum_statslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cum_stats">
<div id="gmp_cum_stats" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($cum_stats_list->TotalRecords > 0 || $cum_stats_list->isGridEdit()) { ?>
<table id="tbl_cum_statslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$cum_stats->RowType = ROWTYPE_HEADER;

// Render list options
$cum_stats_list->renderListOptions();

// Render list options (header, left)
$cum_stats_list->ListOptions->render("header", "left");
?>
<?php if ($cum_stats_list->Obs_Date->Visible) { // Obs_Date ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->Obs_Date) == "") { ?>
		<th data-name="Obs_Date" class="<?php echo $cum_stats_list->Obs_Date->headerCellClass() ?>"><div id="elh_cum_stats_Obs_Date" class="cum_stats_Obs_Date"><div class="ew-table-header-caption"><?php echo $cum_stats_list->Obs_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Obs_Date" class="<?php echo $cum_stats_list->Obs_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->Obs_Date) ?>', 2);"><div id="elh_cum_stats_Obs_Date" class="cum_stats_Obs_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->Obs_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->Obs_Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->Obs_Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->CODE->Visible) { // CODE ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $cum_stats_list->CODE->headerCellClass() ?>"><div id="elh_cum_stats_CODE" class="cum_stats_CODE"><div class="ew-table-header-caption"><?php echo $cum_stats_list->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $cum_stats_list->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->CODE) ?>', 2);"><div id="elh_cum_stats_CODE" class="cum_stats_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->NAME->Visible) { // NAME ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->NAME) == "") { ?>
		<th data-name="NAME" class="<?php echo $cum_stats_list->NAME->headerCellClass() ?>"><div id="elh_cum_stats_NAME" class="cum_stats_NAME"><div class="ew-table-header-caption"><?php echo $cum_stats_list->NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NAME" class="<?php echo $cum_stats_list->NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->NAME) ?>', 2);"><div id="elh_cum_stats_NAME" class="cum_stats_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->NAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->NAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->NAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->Actutal_for_date->Visible) { // Actutal_for_date ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->Actutal_for_date) == "") { ?>
		<th data-name="Actutal_for_date" class="<?php echo $cum_stats_list->Actutal_for_date->headerCellClass() ?>"><div id="elh_cum_stats_Actutal_for_date" class="cum_stats_Actutal_for_date"><div class="ew-table-header-caption"><?php echo $cum_stats_list->Actutal_for_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Actutal_for_date" class="<?php echo $cum_stats_list->Actutal_for_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->Actutal_for_date) ?>', 2);"><div id="elh_cum_stats_Actutal_for_date" class="cum_stats_Actutal_for_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->Actutal_for_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->Actutal_for_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->Actutal_for_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->Normal_for_date->Visible) { // Normal_for_date ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->Normal_for_date) == "") { ?>
		<th data-name="Normal_for_date" class="<?php echo $cum_stats_list->Normal_for_date->headerCellClass() ?>"><div id="elh_cum_stats_Normal_for_date" class="cum_stats_Normal_for_date"><div class="ew-table-header-caption"><?php echo $cum_stats_list->Normal_for_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal_for_date" class="<?php echo $cum_stats_list->Normal_for_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->Normal_for_date) ?>', 2);"><div id="elh_cum_stats_Normal_for_date" class="cum_stats_Normal_for_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->Normal_for_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->Normal_for_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->Normal_for_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->Deviation_for_date->Visible) { // Deviation_for_date ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->Deviation_for_date) == "") { ?>
		<th data-name="Deviation_for_date" class="<?php echo $cum_stats_list->Deviation_for_date->headerCellClass() ?>"><div id="elh_cum_stats_Deviation_for_date" class="cum_stats_Deviation_for_date"><div class="ew-table-header-caption"><?php echo $cum_stats_list->Deviation_for_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Deviation_for_date" class="<?php echo $cum_stats_list->Deviation_for_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->Deviation_for_date) ?>', 2);"><div id="elh_cum_stats_Deviation_for_date" class="cum_stats_Deviation_for_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->Deviation_for_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->Deviation_for_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->Deviation_for_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->Actutal_for_season_cum->Visible) { // Actutal_for_season_cum ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->Actutal_for_season_cum) == "") { ?>
		<th data-name="Actutal_for_season_cum" class="<?php echo $cum_stats_list->Actutal_for_season_cum->headerCellClass() ?>"><div id="elh_cum_stats_Actutal_for_season_cum" class="cum_stats_Actutal_for_season_cum"><div class="ew-table-header-caption"><?php echo $cum_stats_list->Actutal_for_season_cum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Actutal_for_season_cum" class="<?php echo $cum_stats_list->Actutal_for_season_cum->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->Actutal_for_season_cum) ?>', 2);"><div id="elh_cum_stats_Actutal_for_season_cum" class="cum_stats_Actutal_for_season_cum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->Actutal_for_season_cum->caption() ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->Actutal_for_season_cum->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->Actutal_for_season_cum->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->Normal_for_season_cum->Visible) { // Normal_for_season_cum ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->Normal_for_season_cum) == "") { ?>
		<th data-name="Normal_for_season_cum" class="<?php echo $cum_stats_list->Normal_for_season_cum->headerCellClass() ?>"><div id="elh_cum_stats_Normal_for_season_cum" class="cum_stats_Normal_for_season_cum"><div class="ew-table-header-caption"><?php echo $cum_stats_list->Normal_for_season_cum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal_for_season_cum" class="<?php echo $cum_stats_list->Normal_for_season_cum->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->Normal_for_season_cum) ?>', 2);"><div id="elh_cum_stats_Normal_for_season_cum" class="cum_stats_Normal_for_season_cum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->Normal_for_season_cum->caption() ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->Normal_for_season_cum->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->Normal_for_season_cum->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->Deviation_for_season_cum->Visible) { // Deviation_for_season_cum ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->Deviation_for_season_cum) == "") { ?>
		<th data-name="Deviation_for_season_cum" class="<?php echo $cum_stats_list->Deviation_for_season_cum->headerCellClass() ?>"><div id="elh_cum_stats_Deviation_for_season_cum" class="cum_stats_Deviation_for_season_cum"><div class="ew-table-header-caption"><?php echo $cum_stats_list->Deviation_for_season_cum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Deviation_for_season_cum" class="<?php echo $cum_stats_list->Deviation_for_season_cum->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->Deviation_for_season_cum) ?>', 2);"><div id="elh_cum_stats_Deviation_for_season_cum" class="cum_stats_Deviation_for_season_cum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->Deviation_for_season_cum->caption() ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->Deviation_for_season_cum->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->Deviation_for_season_cum->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->file_name->Visible) { // file_name ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->file_name) == "") { ?>
		<th data-name="file_name" class="<?php echo $cum_stats_list->file_name->headerCellClass() ?>"><div id="elh_cum_stats_file_name" class="cum_stats_file_name"><div class="ew-table-header-caption"><?php echo $cum_stats_list->file_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="file_name" class="<?php echo $cum_stats_list->file_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->file_name) ?>', 2);"><div id="elh_cum_stats_file_name" class="cum_stats_file_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->file_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->file_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->file_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cum_stats_list->source_id->Visible) { // source_id ?>
	<?php if ($cum_stats_list->SortUrl($cum_stats_list->source_id) == "") { ?>
		<th data-name="source_id" class="<?php echo $cum_stats_list->source_id->headerCellClass() ?>"><div id="elh_cum_stats_source_id" class="cum_stats_source_id"><div class="ew-table-header-caption"><?php echo $cum_stats_list->source_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="source_id" class="<?php echo $cum_stats_list->source_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cum_stats_list->SortUrl($cum_stats_list->source_id) ?>', 2);"><div id="elh_cum_stats_source_id" class="cum_stats_source_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cum_stats_list->source_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cum_stats_list->source_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cum_stats_list->source_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$cum_stats_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($cum_stats_list->ExportAll && $cum_stats_list->isExport()) {
	$cum_stats_list->StopRecord = $cum_stats_list->TotalRecords;
} else {

	// Set the last record to display
	if ($cum_stats_list->TotalRecords > $cum_stats_list->StartRecord + $cum_stats_list->DisplayRecords - 1)
		$cum_stats_list->StopRecord = $cum_stats_list->StartRecord + $cum_stats_list->DisplayRecords - 1;
	else
		$cum_stats_list->StopRecord = $cum_stats_list->TotalRecords;
}
$cum_stats_list->RecordCount = $cum_stats_list->StartRecord - 1;
if ($cum_stats_list->Recordset && !$cum_stats_list->Recordset->EOF) {
	$cum_stats_list->Recordset->moveFirst();
	$selectLimit = $cum_stats_list->UseSelectLimit;
	if (!$selectLimit && $cum_stats_list->StartRecord > 1)
		$cum_stats_list->Recordset->move($cum_stats_list->StartRecord - 1);
} elseif (!$cum_stats->AllowAddDeleteRow && $cum_stats_list->StopRecord == 0) {
	$cum_stats_list->StopRecord = $cum_stats->GridAddRowCount;
}

// Initialize aggregate
$cum_stats->RowType = ROWTYPE_AGGREGATEINIT;
$cum_stats->resetAttributes();
$cum_stats_list->renderRow();
while ($cum_stats_list->RecordCount < $cum_stats_list->StopRecord) {
	$cum_stats_list->RecordCount++;
	if ($cum_stats_list->RecordCount >= $cum_stats_list->StartRecord) {
		$cum_stats_list->RowCount++;

		// Set up key count
		$cum_stats_list->KeyCount = $cum_stats_list->RowIndex;

		// Init row class and style
		$cum_stats->resetAttributes();
		$cum_stats->CssClass = "";
		if ($cum_stats_list->isGridAdd()) {
		} else {
			$cum_stats_list->loadRowValues($cum_stats_list->Recordset); // Load row values
		}
		$cum_stats->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$cum_stats->RowAttrs->merge(["data-rowindex" => $cum_stats_list->RowCount, "id" => "r" . $cum_stats_list->RowCount . "_cum_stats", "data-rowtype" => $cum_stats->RowType]);

		// Render row
		$cum_stats_list->renderRow();

		// Render list options
		$cum_stats_list->renderListOptions();
?>
	<tr <?php echo $cum_stats->rowAttributes() ?>>
<?php

// Render list options (body, left)
$cum_stats_list->ListOptions->render("body", "left", $cum_stats_list->RowCount);
?>
	<?php if ($cum_stats_list->Obs_Date->Visible) { // Obs_Date ?>
		<td data-name="Obs_Date" <?php echo $cum_stats_list->Obs_Date->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_Obs_Date">
<span<?php echo $cum_stats_list->Obs_Date->viewAttributes() ?>><?php echo $cum_stats_list->Obs_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $cum_stats_list->CODE->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_CODE">
<span<?php echo $cum_stats_list->CODE->viewAttributes() ?>><?php echo $cum_stats_list->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->NAME->Visible) { // NAME ?>
		<td data-name="NAME" <?php echo $cum_stats_list->NAME->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_NAME">
<span<?php echo $cum_stats_list->NAME->viewAttributes() ?>><?php echo $cum_stats_list->NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->Actutal_for_date->Visible) { // Actutal_for_date ?>
		<td data-name="Actutal_for_date" <?php echo $cum_stats_list->Actutal_for_date->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_Actutal_for_date">
<span<?php echo $cum_stats_list->Actutal_for_date->viewAttributes() ?>><?php echo $cum_stats_list->Actutal_for_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->Normal_for_date->Visible) { // Normal_for_date ?>
		<td data-name="Normal_for_date" <?php echo $cum_stats_list->Normal_for_date->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_Normal_for_date">
<span<?php echo $cum_stats_list->Normal_for_date->viewAttributes() ?>><?php echo $cum_stats_list->Normal_for_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->Deviation_for_date->Visible) { // Deviation_for_date ?>
		<td data-name="Deviation_for_date" <?php echo $cum_stats_list->Deviation_for_date->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_Deviation_for_date">
<span<?php echo $cum_stats_list->Deviation_for_date->viewAttributes() ?>><?php echo $cum_stats_list->Deviation_for_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->Actutal_for_season_cum->Visible) { // Actutal_for_season_cum ?>
		<td data-name="Actutal_for_season_cum" <?php echo $cum_stats_list->Actutal_for_season_cum->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_Actutal_for_season_cum">
<span<?php echo $cum_stats_list->Actutal_for_season_cum->viewAttributes() ?>><?php echo $cum_stats_list->Actutal_for_season_cum->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->Normal_for_season_cum->Visible) { // Normal_for_season_cum ?>
		<td data-name="Normal_for_season_cum" <?php echo $cum_stats_list->Normal_for_season_cum->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_Normal_for_season_cum">
<span<?php echo $cum_stats_list->Normal_for_season_cum->viewAttributes() ?>><?php echo $cum_stats_list->Normal_for_season_cum->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->Deviation_for_season_cum->Visible) { // Deviation_for_season_cum ?>
		<td data-name="Deviation_for_season_cum" <?php echo $cum_stats_list->Deviation_for_season_cum->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_Deviation_for_season_cum">
<span<?php echo $cum_stats_list->Deviation_for_season_cum->viewAttributes() ?>><?php echo $cum_stats_list->Deviation_for_season_cum->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->file_name->Visible) { // file_name ?>
		<td data-name="file_name" <?php echo $cum_stats_list->file_name->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_file_name">
<span<?php echo $cum_stats_list->file_name->viewAttributes() ?>><?php echo $cum_stats_list->file_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cum_stats_list->source_id->Visible) { // source_id ?>
		<td data-name="source_id" <?php echo $cum_stats_list->source_id->cellAttributes() ?>>
<span id="el<?php echo $cum_stats_list->RowCount ?>_cum_stats_source_id">
<span<?php echo $cum_stats_list->source_id->viewAttributes() ?>><?php echo $cum_stats_list->source_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$cum_stats_list->ListOptions->render("body", "right", $cum_stats_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$cum_stats_list->isGridAdd())
		$cum_stats_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$cum_stats->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($cum_stats_list->Recordset)
	$cum_stats_list->Recordset->Close();
?>
<?php if (!$cum_stats_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$cum_stats_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $cum_stats_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $cum_stats_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($cum_stats_list->TotalRecords == 0 && !$cum_stats->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $cum_stats_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$cum_stats_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$cum_stats_list->isExport()) { ?>
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
$cum_stats_list->terminate();
?>