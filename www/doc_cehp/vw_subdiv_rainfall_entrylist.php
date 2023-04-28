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
$vw_subdiv_rainfall_entry_list = new vw_subdiv_rainfall_entry_list();

// Run the page
$vw_subdiv_rainfall_entry_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_subdiv_rainfall_entry_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_subdiv_rainfall_entry_list->isExport()) { ?>
<script>
var fvw_subdiv_rainfall_entrylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_subdiv_rainfall_entrylist = currentForm = new ew.Form("fvw_subdiv_rainfall_entrylist", "list");
	fvw_subdiv_rainfall_entrylist.formKeyCountName = '<?php echo $vw_subdiv_rainfall_entry_list->FormKeyCountName ?>';

	// Validate form
	fvw_subdiv_rainfall_entrylist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($vw_subdiv_rainfall_entry_list->obs_date->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->obs_date->caption(), $vw_subdiv_rainfall_entry_list->obs_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_list->stationcode->Required) { ?>
				elm = this.getElements("x" + infix + "_stationcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->stationcode->caption(), $vw_subdiv_rainfall_entry_list->stationcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_list->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->SubDivisionId->caption(), $vw_subdiv_rainfall_entry_list->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_list->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->rainfall->caption(), $vw_subdiv_rainfall_entry_list->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_subdiv_rainfall_entry_list->rainfall->errorMessage()) ?>");
			<?php if ($vw_subdiv_rainfall_entry_list->obs_remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->obs_remarks->caption(), $vw_subdiv_rainfall_entry_list->obs_remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_list->mst_status->Required) { ?>
				elm = this.getElements("x" + infix + "_mst_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->mst_status->caption(), $vw_subdiv_rainfall_entry_list->mst_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_list->mst_validated->Required) { ?>
				elm = this.getElements("x" + infix + "_mst_validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->mst_validated->caption(), $vw_subdiv_rainfall_entry_list->mst_validated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_list->mobile_number->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_number");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->mobile_number->caption(), $vw_subdiv_rainfall_entry_list->mobile_number->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_list->isFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_isFreeze");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->isFreeze->caption(), $vw_subdiv_rainfall_entry_list->isFreeze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_subdiv_rainfall_entry_list->SubDivision_code->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivision_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_subdiv_rainfall_entry_list->SubDivision_code->caption(), $vw_subdiv_rainfall_entry_list->SubDivision_code->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fvw_subdiv_rainfall_entrylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_subdiv_rainfall_entrylist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_subdiv_rainfall_entrylist.lists["x_stationcode"] = <?php echo $vw_subdiv_rainfall_entry_list->stationcode->Lookup->toClientList($vw_subdiv_rainfall_entry_list) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_stationcode"].options = <?php echo JsonEncode($vw_subdiv_rainfall_entry_list->stationcode->lookupOptions()) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_mst_status"] = <?php echo $vw_subdiv_rainfall_entry_list->mst_status->Lookup->toClientList($vw_subdiv_rainfall_entry_list) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_mst_status"].options = <?php echo JsonEncode($vw_subdiv_rainfall_entry_list->mst_status->lookupOptions()) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_mst_validated"] = <?php echo $vw_subdiv_rainfall_entry_list->mst_validated->Lookup->toClientList($vw_subdiv_rainfall_entry_list) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_mst_validated"].options = <?php echo JsonEncode($vw_subdiv_rainfall_entry_list->mst_validated->lookupOptions()) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_isFreeze"] = <?php echo $vw_subdiv_rainfall_entry_list->isFreeze->Lookup->toClientList($vw_subdiv_rainfall_entry_list) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_isFreeze"].options = <?php echo JsonEncode($vw_subdiv_rainfall_entry_list->isFreeze->options(FALSE, TRUE)) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_SubDivision_code"] = <?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->Lookup->toClientList($vw_subdiv_rainfall_entry_list) ?>;
	fvw_subdiv_rainfall_entrylist.lists["x_SubDivision_code"].options = <?php echo JsonEncode($vw_subdiv_rainfall_entry_list->SubDivision_code->lookupOptions()) ?>;
	loadjs.done("fvw_subdiv_rainfall_entrylist");
});
var fvw_subdiv_rainfall_entrylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_subdiv_rainfall_entrylistsrch = currentSearchForm = new ew.Form("fvw_subdiv_rainfall_entrylistsrch");

	// Dynamic selection lists
	// Filters

	fvw_subdiv_rainfall_entrylistsrch.filterList = <?php echo $vw_subdiv_rainfall_entry_list->getFilterList() ?>;
	loadjs.done("fvw_subdiv_rainfall_entrylistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_subdiv_rainfall_entry_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_subdiv_rainfall_entry_list->TotalRecords > 0 && $vw_subdiv_rainfall_entry_list->ExportOptions->visible()) { ?>
<?php $vw_subdiv_rainfall_entry_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->ImportOptions->visible()) { ?>
<?php $vw_subdiv_rainfall_entry_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->SearchOptions->visible()) { ?>
<?php $vw_subdiv_rainfall_entry_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->FilterOptions->visible()) { ?>
<?php $vw_subdiv_rainfall_entry_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_subdiv_rainfall_entry_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_subdiv_rainfall_entry_list->isExport() && !$vw_subdiv_rainfall_entry->CurrentAction) { ?>
<form name="fvw_subdiv_rainfall_entrylistsrch" id="fvw_subdiv_rainfall_entrylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_subdiv_rainfall_entrylistsrch-search-panel" class="<?php echo $vw_subdiv_rainfall_entry_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_subdiv_rainfall_entry">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $vw_subdiv_rainfall_entry_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vw_subdiv_rainfall_entry_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vw_subdiv_rainfall_entry_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vw_subdiv_rainfall_entry_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vw_subdiv_rainfall_entry_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vw_subdiv_rainfall_entry_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_subdiv_rainfall_entry_list->showPageHeader(); ?>
<?php
$vw_subdiv_rainfall_entry_list->showMessage();
?>
<?php if ($vw_subdiv_rainfall_entry_list->TotalRecords > 0 || $vw_subdiv_rainfall_entry->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_subdiv_rainfall_entry_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_subdiv_rainfall_entry">
<?php if (!$vw_subdiv_rainfall_entry_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_subdiv_rainfall_entry_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_subdiv_rainfall_entry_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_subdiv_rainfall_entry_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_subdiv_rainfall_entrylist" id="fvw_subdiv_rainfall_entrylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_subdiv_rainfall_entry">
<div id="gmp_vw_subdiv_rainfall_entry" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_subdiv_rainfall_entry_list->TotalRecords > 0 || $vw_subdiv_rainfall_entry_list->isGridEdit()) { ?>
<table id="tbl_vw_subdiv_rainfall_entrylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_subdiv_rainfall_entry->RowType = ROWTYPE_HEADER;

// Render list options
$vw_subdiv_rainfall_entry_list->renderListOptions();

// Render list options (header, left)
$vw_subdiv_rainfall_entry_list->ListOptions->render("header", "left");
?>
<?php if ($vw_subdiv_rainfall_entry_list->obs_date->Visible) { // obs_date ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->obs_date) == "") { ?>
		<th data-name="obs_date" class="<?php echo $vw_subdiv_rainfall_entry_list->obs_date->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_obs_date" class="vw_subdiv_rainfall_entry_obs_date"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->obs_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_date" class="<?php echo $vw_subdiv_rainfall_entry_list->obs_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->obs_date) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_obs_date" class="vw_subdiv_rainfall_entry_obs_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->obs_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->obs_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->obs_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->stationcode->Visible) { // stationcode ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->stationcode) == "") { ?>
		<th data-name="stationcode" class="<?php echo $vw_subdiv_rainfall_entry_list->stationcode->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_stationcode" class="vw_subdiv_rainfall_entry_stationcode"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->stationcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stationcode" class="<?php echo $vw_subdiv_rainfall_entry_list->stationcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->stationcode) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_stationcode" class="vw_subdiv_rainfall_entry_stationcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->stationcode->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->stationcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->stationcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_SubDivisionId" class="vw_subdiv_rainfall_entry_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->SubDivisionId) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_SubDivisionId" class="vw_subdiv_rainfall_entry_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->rainfall->Visible) { // rainfall ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $vw_subdiv_rainfall_entry_list->rainfall->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_rainfall" class="vw_subdiv_rainfall_entry_rainfall"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $vw_subdiv_rainfall_entry_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->rainfall) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_rainfall" class="vw_subdiv_rainfall_entry_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->obs_remarks->Visible) { // obs_remarks ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->obs_remarks) == "") { ?>
		<th data-name="obs_remarks" class="<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_obs_remarks" class="vw_subdiv_rainfall_entry_obs_remarks"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_remarks" class="<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->obs_remarks) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_obs_remarks" class="vw_subdiv_rainfall_entry_obs_remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->obs_remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->obs_remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->mst_status->Visible) { // mst_status ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->mst_status) == "") { ?>
		<th data-name="mst_status" class="<?php echo $vw_subdiv_rainfall_entry_list->mst_status->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_mst_status" class="vw_subdiv_rainfall_entry_mst_status"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->mst_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mst_status" class="<?php echo $vw_subdiv_rainfall_entry_list->mst_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->mst_status) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_mst_status" class="vw_subdiv_rainfall_entry_mst_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->mst_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->mst_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->mst_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->mst_validated->Visible) { // mst_validated ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->mst_validated) == "") { ?>
		<th data-name="mst_validated" class="<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_mst_validated" class="vw_subdiv_rainfall_entry_mst_validated"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->mst_validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mst_validated" class="<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->mst_validated) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_mst_validated" class="vw_subdiv_rainfall_entry_mst_validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->mst_validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->mst_validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->mst_validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->mobile_number->Visible) { // mobile_number ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->mobile_number) == "") { ?>
		<th data-name="mobile_number" class="<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_mobile_number" class="vw_subdiv_rainfall_entry_mobile_number"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->mobile_number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_number" class="<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->mobile_number) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_mobile_number" class="vw_subdiv_rainfall_entry_mobile_number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->mobile_number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->mobile_number->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->mobile_number->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->isFreeze->Visible) { // isFreeze ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->isFreeze) == "") { ?>
		<th data-name="isFreeze" class="<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_isFreeze" class="vw_subdiv_rainfall_entry_isFreeze"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->isFreeze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isFreeze" class="<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->isFreeze) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_isFreeze" class="vw_subdiv_rainfall_entry_isFreeze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->isFreeze->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->isFreeze->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->isFreeze->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->SubDivision_code->Visible) { // SubDivision_code ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->SubDivision_code) == "") { ?>
		<th data-name="SubDivision_code" class="<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->headerCellClass() ?>"><div id="elh_vw_subdiv_rainfall_entry_SubDivision_code" class="vw_subdiv_rainfall_entry_SubDivision_code"><div class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivision_code" class="<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_subdiv_rainfall_entry_list->SortUrl($vw_subdiv_rainfall_entry_list->SubDivision_code) ?>', 2);"><div id="elh_vw_subdiv_rainfall_entry_SubDivision_code" class="vw_subdiv_rainfall_entry_SubDivision_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_subdiv_rainfall_entry_list->SubDivision_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_subdiv_rainfall_entry_list->SubDivision_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_subdiv_rainfall_entry_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_subdiv_rainfall_entry_list->ExportAll && $vw_subdiv_rainfall_entry_list->isExport()) {
	$vw_subdiv_rainfall_entry_list->StopRecord = $vw_subdiv_rainfall_entry_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_subdiv_rainfall_entry_list->TotalRecords > $vw_subdiv_rainfall_entry_list->StartRecord + $vw_subdiv_rainfall_entry_list->DisplayRecords - 1)
		$vw_subdiv_rainfall_entry_list->StopRecord = $vw_subdiv_rainfall_entry_list->StartRecord + $vw_subdiv_rainfall_entry_list->DisplayRecords - 1;
	else
		$vw_subdiv_rainfall_entry_list->StopRecord = $vw_subdiv_rainfall_entry_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($vw_subdiv_rainfall_entry->isConfirm() || $vw_subdiv_rainfall_entry_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($vw_subdiv_rainfall_entry_list->FormKeyCountName) && ($vw_subdiv_rainfall_entry_list->isGridAdd() || $vw_subdiv_rainfall_entry_list->isGridEdit() || $vw_subdiv_rainfall_entry->isConfirm())) {
		$vw_subdiv_rainfall_entry_list->KeyCount = $CurrentForm->getValue($vw_subdiv_rainfall_entry_list->FormKeyCountName);
		$vw_subdiv_rainfall_entry_list->StopRecord = $vw_subdiv_rainfall_entry_list->StartRecord + $vw_subdiv_rainfall_entry_list->KeyCount - 1;
	}
}
$vw_subdiv_rainfall_entry_list->RecordCount = $vw_subdiv_rainfall_entry_list->StartRecord - 1;
if ($vw_subdiv_rainfall_entry_list->Recordset && !$vw_subdiv_rainfall_entry_list->Recordset->EOF) {
	$vw_subdiv_rainfall_entry_list->Recordset->moveFirst();
	$selectLimit = $vw_subdiv_rainfall_entry_list->UseSelectLimit;
	if (!$selectLimit && $vw_subdiv_rainfall_entry_list->StartRecord > 1)
		$vw_subdiv_rainfall_entry_list->Recordset->move($vw_subdiv_rainfall_entry_list->StartRecord - 1);
} elseif (!$vw_subdiv_rainfall_entry->AllowAddDeleteRow && $vw_subdiv_rainfall_entry_list->StopRecord == 0) {
	$vw_subdiv_rainfall_entry_list->StopRecord = $vw_subdiv_rainfall_entry->GridAddRowCount;
}

// Initialize aggregate
$vw_subdiv_rainfall_entry->RowType = ROWTYPE_AGGREGATEINIT;
$vw_subdiv_rainfall_entry->resetAttributes();
$vw_subdiv_rainfall_entry_list->renderRow();
$vw_subdiv_rainfall_entry_list->EditRowCount = 0;
if ($vw_subdiv_rainfall_entry_list->isEdit())
	$vw_subdiv_rainfall_entry_list->RowIndex = 1;
if ($vw_subdiv_rainfall_entry_list->isGridEdit())
	$vw_subdiv_rainfall_entry_list->RowIndex = 0;
while ($vw_subdiv_rainfall_entry_list->RecordCount < $vw_subdiv_rainfall_entry_list->StopRecord) {
	$vw_subdiv_rainfall_entry_list->RecordCount++;
	if ($vw_subdiv_rainfall_entry_list->RecordCount >= $vw_subdiv_rainfall_entry_list->StartRecord) {
		$vw_subdiv_rainfall_entry_list->RowCount++;
		if ($vw_subdiv_rainfall_entry_list->isGridAdd() || $vw_subdiv_rainfall_entry_list->isGridEdit() || $vw_subdiv_rainfall_entry->isConfirm()) {
			$vw_subdiv_rainfall_entry_list->RowIndex++;
			$CurrentForm->Index = $vw_subdiv_rainfall_entry_list->RowIndex;
			if ($CurrentForm->hasValue($vw_subdiv_rainfall_entry_list->FormActionName) && ($vw_subdiv_rainfall_entry->isConfirm() || $vw_subdiv_rainfall_entry_list->EventCancelled))
				$vw_subdiv_rainfall_entry_list->RowAction = strval($CurrentForm->getValue($vw_subdiv_rainfall_entry_list->FormActionName));
			elseif ($vw_subdiv_rainfall_entry_list->isGridAdd())
				$vw_subdiv_rainfall_entry_list->RowAction = "insert";
			else
				$vw_subdiv_rainfall_entry_list->RowAction = "";
		}

		// Set up key count
		$vw_subdiv_rainfall_entry_list->KeyCount = $vw_subdiv_rainfall_entry_list->RowIndex;

		// Init row class and style
		$vw_subdiv_rainfall_entry->resetAttributes();
		$vw_subdiv_rainfall_entry->CssClass = "";
		if ($vw_subdiv_rainfall_entry_list->isGridAdd()) {
			$vw_subdiv_rainfall_entry_list->loadRowValues(); // Load default values
		} else {
			$vw_subdiv_rainfall_entry_list->loadRowValues($vw_subdiv_rainfall_entry_list->Recordset); // Load row values
		}
		$vw_subdiv_rainfall_entry->RowType = ROWTYPE_VIEW; // Render view
		if ($vw_subdiv_rainfall_entry_list->isEdit()) {
			if ($vw_subdiv_rainfall_entry_list->checkInlineEditKey() && $vw_subdiv_rainfall_entry_list->EditRowCount == 0) { // Inline edit
				$vw_subdiv_rainfall_entry->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($vw_subdiv_rainfall_entry_list->isGridEdit()) { // Grid edit
			if ($vw_subdiv_rainfall_entry->EventCancelled)
				$vw_subdiv_rainfall_entry_list->restoreCurrentRowFormValues($vw_subdiv_rainfall_entry_list->RowIndex); // Restore form values
			if ($vw_subdiv_rainfall_entry_list->RowAction == "insert")
				$vw_subdiv_rainfall_entry->RowType = ROWTYPE_ADD; // Render add
			else
				$vw_subdiv_rainfall_entry->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($vw_subdiv_rainfall_entry_list->isEdit() && $vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT && $vw_subdiv_rainfall_entry->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$vw_subdiv_rainfall_entry_list->restoreFormValues(); // Restore form values
		}
		if ($vw_subdiv_rainfall_entry_list->isGridEdit() && ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT || $vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) && $vw_subdiv_rainfall_entry->EventCancelled) // Update failed
			$vw_subdiv_rainfall_entry_list->restoreCurrentRowFormValues($vw_subdiv_rainfall_entry_list->RowIndex); // Restore form values
		if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) // Edit row
			$vw_subdiv_rainfall_entry_list->EditRowCount++;

		// Set up row id / data-rowindex
		$vw_subdiv_rainfall_entry->RowAttrs->merge(["data-rowindex" => $vw_subdiv_rainfall_entry_list->RowCount, "id" => "r" . $vw_subdiv_rainfall_entry_list->RowCount . "_vw_subdiv_rainfall_entry", "data-rowtype" => $vw_subdiv_rainfall_entry->RowType]);

		// Render row
		$vw_subdiv_rainfall_entry_list->renderRow();

		// Render list options
		$vw_subdiv_rainfall_entry_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($vw_subdiv_rainfall_entry_list->RowAction != "delete" && $vw_subdiv_rainfall_entry_list->RowAction != "insertdelete" && !($vw_subdiv_rainfall_entry_list->RowAction == "insert" && $vw_subdiv_rainfall_entry->isConfirm() && $vw_subdiv_rainfall_entry_list->emptyRow())) {
?>
	<tr <?php echo $vw_subdiv_rainfall_entry->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_subdiv_rainfall_entry_list->ListOptions->render("body", "left", $vw_subdiv_rainfall_entry_list->RowCount);
?>
	<?php if ($vw_subdiv_rainfall_entry_list->obs_date->Visible) { // obs_date ?>
		<td data-name="obs_date" <?php echo $vw_subdiv_rainfall_entry_list->obs_date->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_obs_date" class="form-group">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_date" data-format="7" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" maxlength="19" value="<?php echo $vw_subdiv_rainfall_entry_list->obs_date->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->obs_date->editAttributes() ?>>
<?php if (!$vw_subdiv_rainfall_entry_list->obs_date->ReadOnly && !$vw_subdiv_rainfall_entry_list->obs_date->Disabled && !isset($vw_subdiv_rainfall_entry_list->obs_date->EditAttrs["readonly"]) && !isset($vw_subdiv_rainfall_entry_list->obs_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_subdiv_rainfall_entrylist", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_subdiv_rainfall_entrylist", "x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_date" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->obs_date->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_obs_date" class="form-group">
<span<?php echo $vw_subdiv_rainfall_entry_list->obs_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_subdiv_rainfall_entry_list->obs_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_date" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->obs_date->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_obs_date">
<span<?php echo $vw_subdiv_rainfall_entry_list->obs_date->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->obs_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_rainfall_ID" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_rainfall_ID" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_rainfall_ID" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->obs_rainfall_ID->CurrentValue) ?>">
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_rainfall_ID" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_rainfall_ID" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_rainfall_ID" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->obs_rainfall_ID->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT || $vw_subdiv_rainfall_entry->CurrentMode == "edit") { ?>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_rainfall_ID" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_rainfall_ID" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_rainfall_ID" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->obs_rainfall_ID->CurrentValue) ?>">
<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->stationcode->Visible) { // stationcode ?>
		<td data-name="stationcode" <?php echo $vw_subdiv_rainfall_entry_list->stationcode->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_stationcode" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_stationcode" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->stationcode->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode"<?php echo $vw_subdiv_rainfall_entry_list->stationcode->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->stationcode->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_stationcode") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->stationcode->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_stationcode") ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_stationcode" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->stationcode->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_stationcode" class="form-group">
<span<?php echo $vw_subdiv_rainfall_entry_list->stationcode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_subdiv_rainfall_entry_list->stationcode->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_stationcode" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->stationcode->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_stationcode">
<span<?php echo $vw_subdiv_rainfall_entry_list->stationcode->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->stationcode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_SubDivisionId" class="form-group">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivisionId" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" size="30" maxlength="11" value="<?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivisionId" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->SubDivisionId->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_SubDivisionId" class="form-group">
<span<?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_subdiv_rainfall_entry_list->SubDivisionId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivisionId" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->SubDivisionId->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_SubDivisionId">
<span<?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $vw_subdiv_rainfall_entry_list->rainfall->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_rainfall" class="form-group">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_rainfall" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" size="30" maxlength="7" value="<?php echo $vw_subdiv_rainfall_entry_list->rainfall->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_rainfall" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_rainfall" class="form-group">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_rainfall" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" size="30" maxlength="7" value="<?php echo $vw_subdiv_rainfall_entry_list->rainfall->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_rainfall">
<span<?php echo $vw_subdiv_rainfall_entry_list->rainfall->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->obs_remarks->Visible) { // obs_remarks ?>
		<td data-name="obs_remarks" <?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_obs_remarks" class="form-group">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_remarks" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" size="30" maxlength="50" value="<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_remarks" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->obs_remarks->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_obs_remarks" class="form-group">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_remarks" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" size="30" maxlength="50" value="<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_obs_remarks">
<span<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->mst_status->Visible) { // mst_status ?>
		<td data-name="mst_status" <?php echo $vw_subdiv_rainfall_entry_list->mst_status->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mst_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_status" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->mst_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status"<?php echo $vw_subdiv_rainfall_entry_list->mst_status->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->mst_status->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_mst_status") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->mst_status->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_mst_status") ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_status" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->mst_status->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mst_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_status" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->mst_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status"<?php echo $vw_subdiv_rainfall_entry_list->mst_status->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->mst_status->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_mst_status") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->mst_status->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_mst_status") ?>
</span>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mst_status">
<span<?php echo $vw_subdiv_rainfall_entry_list->mst_status->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->mst_status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->mst_validated->Visible) { // mst_validated ?>
		<td data-name="mst_validated" <?php echo $vw_subdiv_rainfall_entry_list->mst_validated->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mst_validated" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_validated" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated"<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_mst_validated") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_mst_validated") ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_validated" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->mst_validated->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mst_validated" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_validated" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated"<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_mst_validated") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_mst_validated") ?>
</span>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mst_validated">
<span<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->mst_validated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->mobile_number->Visible) { // mobile_number ?>
		<td data-name="mobile_number" <?php echo $vw_subdiv_rainfall_entry_list->mobile_number->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mobile_number" class="form-group">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_mobile_number" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" size="30" maxlength="25" value="<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_mobile_number" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->mobile_number->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mobile_number" class="form-group">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_mobile_number" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" size="30" maxlength="25" value="<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_mobile_number">
<span<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->mobile_number->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->isFreeze->Visible) { // isFreeze ?>
		<td data-name="isFreeze" <?php echo $vw_subdiv_rainfall_entry_list->isFreeze->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_isFreeze" class="form-group">
<div id="tp_x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" class="ew-template"><input type="radio" class="custom-control-input" data-table="vw_subdiv_rainfall_entry" data-field="x_isFreeze" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->displayValueSeparatorAttribute() ?>" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" value="{value}"<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->editAttributes() ?>></div>
<div id="dsl_x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->radioButtonListHtml(FALSE, "x{$vw_subdiv_rainfall_entry_list->RowIndex}_isFreeze") ?>
</div></div>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_isFreeze" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->isFreeze->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_isFreeze" class="form-group">
<span<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_subdiv_rainfall_entry_list->isFreeze->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_isFreeze" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->isFreeze->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_isFreeze">
<span<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->isFreeze->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SubDivision_code->Visible) { // SubDivision_code ?>
		<td data-name="SubDivision_code" <?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->cellAttributes() ?>>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_SubDivision_code" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivision_code" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code"<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_SubDivision_code") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_SubDivision_code") ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivision_code" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->SubDivision_code->OldValue) ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_SubDivision_code" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivision_code" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code"<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_SubDivision_code") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_SubDivision_code") ?>
</span>
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_subdiv_rainfall_entry_list->RowCount ?>_vw_subdiv_rainfall_entry_SubDivision_code">
<span<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->viewAttributes() ?>><?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_subdiv_rainfall_entry_list->ListOptions->render("body", "right", $vw_subdiv_rainfall_entry_list->RowCount);
?>
	</tr>
<?php if ($vw_subdiv_rainfall_entry->RowType == ROWTYPE_ADD || $vw_subdiv_rainfall_entry->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fvw_subdiv_rainfall_entrylist", "load"], function() {
	fvw_subdiv_rainfall_entrylist.updateLists(<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$vw_subdiv_rainfall_entry_list->isGridAdd())
		if (!$vw_subdiv_rainfall_entry_list->Recordset->EOF)
			$vw_subdiv_rainfall_entry_list->Recordset->moveNext();
}
?>
<?php
	if ($vw_subdiv_rainfall_entry_list->isGridAdd() || $vw_subdiv_rainfall_entry_list->isGridEdit()) {
		$vw_subdiv_rainfall_entry_list->RowIndex = '$rowindex$';
		$vw_subdiv_rainfall_entry_list->loadRowValues();

		// Set row properties
		$vw_subdiv_rainfall_entry->resetAttributes();
		$vw_subdiv_rainfall_entry->RowAttrs->merge(["data-rowindex" => $vw_subdiv_rainfall_entry_list->RowIndex, "id" => "r0_vw_subdiv_rainfall_entry", "data-rowtype" => ROWTYPE_ADD]);
		$vw_subdiv_rainfall_entry->RowAttrs->appendClass("ew-template");
		$vw_subdiv_rainfall_entry->RowType = ROWTYPE_ADD;

		// Render row
		$vw_subdiv_rainfall_entry_list->renderRow();

		// Render list options
		$vw_subdiv_rainfall_entry_list->renderListOptions();
		$vw_subdiv_rainfall_entry_list->StartRowCount = 0;
?>
	<tr <?php echo $vw_subdiv_rainfall_entry->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_subdiv_rainfall_entry_list->ListOptions->render("body", "left", $vw_subdiv_rainfall_entry_list->RowIndex);
?>
	<?php if ($vw_subdiv_rainfall_entry_list->obs_date->Visible) { // obs_date ?>
		<td data-name="obs_date">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_obs_date" class="form-group vw_subdiv_rainfall_entry_obs_date">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_date" data-format="7" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" maxlength="19" value="<?php echo $vw_subdiv_rainfall_entry_list->obs_date->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->obs_date->editAttributes() ?>>
<?php if (!$vw_subdiv_rainfall_entry_list->obs_date->ReadOnly && !$vw_subdiv_rainfall_entry_list->obs_date->Disabled && !isset($vw_subdiv_rainfall_entry_list->obs_date->EditAttrs["readonly"]) && !isset($vw_subdiv_rainfall_entry_list->obs_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fvw_subdiv_rainfall_entrylist", "datetimepicker"], function() {
	ew.createDateTimePicker("fvw_subdiv_rainfall_entrylist", "x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_date" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_date" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->obs_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->stationcode->Visible) { // stationcode ?>
		<td data-name="stationcode">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_stationcode" class="form-group vw_subdiv_rainfall_entry_stationcode">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_stationcode" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->stationcode->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode"<?php echo $vw_subdiv_rainfall_entry_list->stationcode->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->stationcode->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_stationcode") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->stationcode->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_stationcode") ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_stationcode" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_stationcode" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->stationcode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_SubDivisionId" class="form-group vw_subdiv_rainfall_entry_SubDivisionId">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivisionId" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" size="30" maxlength="11" value="<?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->SubDivisionId->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivisionId" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->SubDivisionId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_rainfall" class="form-group vw_subdiv_rainfall_entry_rainfall">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_rainfall" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" size="30" maxlength="7" value="<?php echo $vw_subdiv_rainfall_entry_list->rainfall->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_rainfall" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_rainfall" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->obs_remarks->Visible) { // obs_remarks ?>
		<td data-name="obs_remarks">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_obs_remarks" class="form-group vw_subdiv_rainfall_entry_obs_remarks">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_remarks" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" size="30" maxlength="50" value="<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->obs_remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_obs_remarks" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_obs_remarks" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->obs_remarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->mst_status->Visible) { // mst_status ?>
		<td data-name="mst_status">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_mst_status" class="form-group vw_subdiv_rainfall_entry_mst_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_status" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->mst_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status"<?php echo $vw_subdiv_rainfall_entry_list->mst_status->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->mst_status->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_mst_status") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->mst_status->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_mst_status") ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_status" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_status" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->mst_status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->mst_validated->Visible) { // mst_validated ?>
		<td data-name="mst_validated">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_mst_validated" class="form-group vw_subdiv_rainfall_entry_mst_validated">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_validated" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated"<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_mst_validated") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->mst_validated->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_mst_validated") ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_mst_validated" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mst_validated" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->mst_validated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->mobile_number->Visible) { // mobile_number ?>
		<td data-name="mobile_number">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_mobile_number" class="form-group vw_subdiv_rainfall_entry_mobile_number">
<input type="text" data-table="vw_subdiv_rainfall_entry" data-field="x_mobile_number" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" size="30" maxlength="25" value="<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->EditValue ?>"<?php echo $vw_subdiv_rainfall_entry_list->mobile_number->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_mobile_number" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_mobile_number" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->mobile_number->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->isFreeze->Visible) { // isFreeze ?>
		<td data-name="isFreeze">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_isFreeze" class="form-group vw_subdiv_rainfall_entry_isFreeze">
<div id="tp_x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" class="ew-template"><input type="radio" class="custom-control-input" data-table="vw_subdiv_rainfall_entry" data-field="x_isFreeze" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->displayValueSeparatorAttribute() ?>" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" value="{value}"<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->editAttributes() ?>></div>
<div id="dsl_x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $vw_subdiv_rainfall_entry_list->isFreeze->radioButtonListHtml(FALSE, "x{$vw_subdiv_rainfall_entry_list->RowIndex}_isFreeze") ?>
</div></div>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_isFreeze" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_isFreeze" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->isFreeze->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_subdiv_rainfall_entry_list->SubDivision_code->Visible) { // SubDivision_code ?>
		<td data-name="SubDivision_code">
<span id="el$rowindex$_vw_subdiv_rainfall_entry_SubDivision_code" class="form-group vw_subdiv_rainfall_entry_SubDivision_code">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivision_code" data-value-separator="<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code" name="x<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code"<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->editAttributes() ?>>
			<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->selectOptionListHtml("x{$vw_subdiv_rainfall_entry_list->RowIndex}_SubDivision_code") ?>
		</select>
</div>
<?php echo $vw_subdiv_rainfall_entry_list->SubDivision_code->Lookup->getParamTag($vw_subdiv_rainfall_entry_list, "p_x" . $vw_subdiv_rainfall_entry_list->RowIndex . "_SubDivision_code") ?>
</span>
<input type="hidden" data-table="vw_subdiv_rainfall_entry" data-field="x_SubDivision_code" name="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code" id="o<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>_SubDivision_code" value="<?php echo HtmlEncode($vw_subdiv_rainfall_entry_list->SubDivision_code->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_subdiv_rainfall_entry_list->ListOptions->render("body", "right", $vw_subdiv_rainfall_entry_list->RowIndex);
?>
<script>
loadjs.ready(["fvw_subdiv_rainfall_entrylist", "load"], function() {
	fvw_subdiv_rainfall_entrylist.updateLists(<?php echo $vw_subdiv_rainfall_entry_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($vw_subdiv_rainfall_entry_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $vw_subdiv_rainfall_entry_list->FormKeyCountName ?>" id="<?php echo $vw_subdiv_rainfall_entry_list->FormKeyCountName ?>" value="<?php echo $vw_subdiv_rainfall_entry_list->KeyCount ?>">
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $vw_subdiv_rainfall_entry_list->FormKeyCountName ?>" id="<?php echo $vw_subdiv_rainfall_entry_list->FormKeyCountName ?>" value="<?php echo $vw_subdiv_rainfall_entry_list->KeyCount ?>">
<?php echo $vw_subdiv_rainfall_entry_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$vw_subdiv_rainfall_entry->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_subdiv_rainfall_entry_list->Recordset)
	$vw_subdiv_rainfall_entry_list->Recordset->Close();
?>
<?php if (!$vw_subdiv_rainfall_entry_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_subdiv_rainfall_entry_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_subdiv_rainfall_entry_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_subdiv_rainfall_entry_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_subdiv_rainfall_entry_list->TotalRecords == 0 && !$vw_subdiv_rainfall_entry->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_subdiv_rainfall_entry_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_subdiv_rainfall_entry_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_subdiv_rainfall_entry_list->isExport()) { ?>
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
$vw_subdiv_rainfall_entry_list->terminate();
?>