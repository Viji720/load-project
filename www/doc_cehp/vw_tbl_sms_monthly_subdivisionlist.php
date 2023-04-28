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
$vw_tbl_sms_monthly_subdivision_list = new vw_tbl_sms_monthly_subdivision_list();

// Run the page
$vw_tbl_sms_monthly_subdivision_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_tbl_sms_monthly_subdivision_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vw_tbl_sms_monthly_subdivision_list->isExport()) { ?>
<script>
var fvw_tbl_sms_monthly_subdivisionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvw_tbl_sms_monthly_subdivisionlist = currentForm = new ew.Form("fvw_tbl_sms_monthly_subdivisionlist", "list");
	fvw_tbl_sms_monthly_subdivisionlist.formKeyCountName = '<?php echo $vw_tbl_sms_monthly_subdivision_list->FormKeyCountName ?>';

	// Validate form
	fvw_tbl_sms_monthly_subdivisionlist.validate = function() {
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
			<?php if ($vw_tbl_sms_monthly_subdivision_list->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->StationId->caption(), $vw_tbl_sms_monthly_subdivision_list->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->caption(), $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->caption(), $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Water_Year->Required) { ?>
				elm = this.getElements("x" + infix + "_Water_Year");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Water_Year->caption(), $vw_tbl_sms_monthly_subdivision_list->Water_Year->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_list->day_of_month->Required) { ?>
				elm = this.getElements("x" + infix + "_day_of_month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->day_of_month->caption(), $vw_tbl_sms_monthly_subdivision_list->day_of_month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jun_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jun_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jul_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jul_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Aug_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Aug_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Sep_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Sep_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Oct_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Oct_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Nov_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Nov_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Dec_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Dec_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jan_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jan_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Feb_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Feb_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Mar_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Mar_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Apr_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Apr_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_list->May_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_May_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_list->May_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_list->May_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_May_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_list->May_rainfall->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fvw_tbl_sms_monthly_subdivisionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_tbl_sms_monthly_subdivisionlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_tbl_sms_monthly_subdivisionlist.lists["x_StationId"] = <?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->Lookup->toClientList($vw_tbl_sms_monthly_subdivision_list) ?>;
	fvw_tbl_sms_monthly_subdivisionlist.lists["x_StationId"].options = <?php echo JsonEncode($vw_tbl_sms_monthly_subdivision_list->StationId->lookupOptions()) ?>;
	fvw_tbl_sms_monthly_subdivisionlist.lists["x_SubDivisionId"] = <?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->Lookup->toClientList($vw_tbl_sms_monthly_subdivision_list) ?>;
	fvw_tbl_sms_monthly_subdivisionlist.lists["x_SubDivisionId"].options = <?php echo JsonEncode($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->lookupOptions()) ?>;
	loadjs.done("fvw_tbl_sms_monthly_subdivisionlist");
});
var fvw_tbl_sms_monthly_subdivisionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvw_tbl_sms_monthly_subdivisionlistsrch = currentSearchForm = new ew.Form("fvw_tbl_sms_monthly_subdivisionlistsrch");

	// Validate function for search
	fvw_tbl_sms_monthly_subdivisionlistsrch.validate = function(fobj) {
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
	fvw_tbl_sms_monthly_subdivisionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_tbl_sms_monthly_subdivisionlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_tbl_sms_monthly_subdivisionlistsrch.lists["x_StationId"] = <?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->Lookup->toClientList($vw_tbl_sms_monthly_subdivision_list) ?>;
	fvw_tbl_sms_monthly_subdivisionlistsrch.lists["x_StationId"].options = <?php echo JsonEncode($vw_tbl_sms_monthly_subdivision_list->StationId->lookupOptions()) ?>;

	// Filters
	fvw_tbl_sms_monthly_subdivisionlistsrch.filterList = <?php echo $vw_tbl_sms_monthly_subdivision_list->getFilterList() ?>;
	loadjs.done("fvw_tbl_sms_monthly_subdivisionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vw_tbl_sms_monthly_subdivision_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vw_tbl_sms_monthly_subdivision_list->TotalRecords > 0 && $vw_tbl_sms_monthly_subdivision_list->ExportOptions->visible()) { ?>
<?php $vw_tbl_sms_monthly_subdivision_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->ImportOptions->visible()) { ?>
<?php $vw_tbl_sms_monthly_subdivision_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->SearchOptions->visible()) { ?>
<?php $vw_tbl_sms_monthly_subdivision_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->FilterOptions->visible()) { ?>
<?php $vw_tbl_sms_monthly_subdivision_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vw_tbl_sms_monthly_subdivision_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vw_tbl_sms_monthly_subdivision_list->isExport() && !$vw_tbl_sms_monthly_subdivision->CurrentAction) { ?>
<form name="fvw_tbl_sms_monthly_subdivisionlistsrch" id="fvw_tbl_sms_monthly_subdivisionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvw_tbl_sms_monthly_subdivisionlistsrch-search-panel" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vw_tbl_sms_monthly_subdivision">
	<div class="ew-extended-search">
<?php

// Render search row
$vw_tbl_sms_monthly_subdivision->RowType = ROWTYPE_SEARCH;
$vw_tbl_sms_monthly_subdivision->resetAttributes();
$vw_tbl_sms_monthly_subdivision_list->renderRow();
?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->StationId->Visible) { // StationId ?>
	<?php
		$vw_tbl_sms_monthly_subdivision_list->SearchColumnCount++;
		if (($vw_tbl_sms_monthly_subdivision_list->SearchColumnCount - 1) % $vw_tbl_sms_monthly_subdivision_list->SearchFieldsPerRow == 0) {
			$vw_tbl_sms_monthly_subdivision_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $vw_tbl_sms_monthly_subdivision_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationId" class="ew-cell form-group">
		<label for="x_StationId" class="ew-search-caption ew-label"><?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_StationId" id="z_StationId" value="=">
</span>
		<span id="el_vw_tbl_sms_monthly_subdivision_StationId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_StationId" data-value-separator="<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->displayValueSeparatorAttribute() ?>" id="x_StationId" name="x_StationId"<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->editAttributes() ?>>
			<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->selectOptionListHtml("x_StationId") ?>
		</select>
</div>
<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->Lookup->getParamTag($vw_tbl_sms_monthly_subdivision_list, "p_x_StationId") ?>
</span>
	</div>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SearchColumnCount % $vw_tbl_sms_monthly_subdivision_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SearchColumnCount % $vw_tbl_sms_monthly_subdivision_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $vw_tbl_sms_monthly_subdivision_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vw_tbl_sms_monthly_subdivision_list->showPageHeader(); ?>
<?php
$vw_tbl_sms_monthly_subdivision_list->showMessage();
?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->TotalRecords > 0 || $vw_tbl_sms_monthly_subdivision->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vw_tbl_sms_monthly_subdivision_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vw_tbl_sms_monthly_subdivision">
<?php if (!$vw_tbl_sms_monthly_subdivision_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vw_tbl_sms_monthly_subdivision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_tbl_sms_monthly_subdivision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_tbl_sms_monthly_subdivision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvw_tbl_sms_monthly_subdivisionlist" id="fvw_tbl_sms_monthly_subdivisionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_tbl_sms_monthly_subdivision">
<div id="gmp_vw_tbl_sms_monthly_subdivision" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vw_tbl_sms_monthly_subdivision_list->TotalRecords > 0 || $vw_tbl_sms_monthly_subdivision_list->isGridEdit()) { ?>
<table id="tbl_vw_tbl_sms_monthly_subdivisionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vw_tbl_sms_monthly_subdivision->RowType = ROWTYPE_HEADER;

// Render list options
$vw_tbl_sms_monthly_subdivision_list->renderListOptions();

// Render list options (header, left)
$vw_tbl_sms_monthly_subdivision_list->ListOptions->render("header", "left");
?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->StationId->Visible) { // StationId ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_StationId" class="vw_tbl_sms_monthly_subdivision_StationId"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->StationId) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_StationId" class="vw_tbl_sms_monthly_subdivision_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_SubDivisionId" class="vw_tbl_sms_monthly_subdivision_SubDivisionId"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->SubDivisionId) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_SubDivisionId" class="vw_tbl_sms_monthly_subdivision_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber) == "") { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_SenderMobileNumber" class="vw_tbl_sms_monthly_subdivision_SenderMobileNumber"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_SenderMobileNumber" class="vw_tbl_sms_monthly_subdivision_SenderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Water_Year->Visible) { // Water_Year ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Water_Year) == "") { ?>
		<th data-name="Water_Year" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Water_Year" class="vw_tbl_sms_monthly_subdivision_Water_Year"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Water_Year" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Water_Year) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Water_Year" class="vw_tbl_sms_monthly_subdivision_Water_Year">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Water_Year->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Water_Year->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->day_of_month->Visible) { // day_of_month ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->day_of_month) == "") { ?>
		<th data-name="day_of_month" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_day_of_month" class="vw_tbl_sms_monthly_subdivision_day_of_month"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="day_of_month" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->day_of_month) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_day_of_month" class="vw_tbl_sms_monthly_subdivision_day_of_month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->day_of_month->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->day_of_month->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->Visible) { // Jun_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall) == "") { ?>
		<th data-name="Jun_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Jun_rainfall" class="vw_tbl_sms_monthly_subdivision_Jun_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jun_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Jun_rainfall" class="vw_tbl_sms_monthly_subdivision_Jun_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->Visible) { // Jul_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall) == "") { ?>
		<th data-name="Jul_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Jul_rainfall" class="vw_tbl_sms_monthly_subdivision_Jul_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jul_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Jul_rainfall" class="vw_tbl_sms_monthly_subdivision_Jul_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->Visible) { // Aug_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall) == "") { ?>
		<th data-name="Aug_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Aug_rainfall" class="vw_tbl_sms_monthly_subdivision_Aug_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aug_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Aug_rainfall" class="vw_tbl_sms_monthly_subdivision_Aug_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->Visible) { // Sep_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall) == "") { ?>
		<th data-name="Sep_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Sep_rainfall" class="vw_tbl_sms_monthly_subdivision_Sep_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sep_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Sep_rainfall" class="vw_tbl_sms_monthly_subdivision_Sep_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->Visible) { // Oct_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall) == "") { ?>
		<th data-name="Oct_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Oct_rainfall" class="vw_tbl_sms_monthly_subdivision_Oct_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Oct_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Oct_rainfall" class="vw_tbl_sms_monthly_subdivision_Oct_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->Visible) { // Nov_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall) == "") { ?>
		<th data-name="Nov_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Nov_rainfall" class="vw_tbl_sms_monthly_subdivision_Nov_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nov_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Nov_rainfall" class="vw_tbl_sms_monthly_subdivision_Nov_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->Visible) { // Dec_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall) == "") { ?>
		<th data-name="Dec_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Dec_rainfall" class="vw_tbl_sms_monthly_subdivision_Dec_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dec_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Dec_rainfall" class="vw_tbl_sms_monthly_subdivision_Dec_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->Visible) { // Jan_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall) == "") { ?>
		<th data-name="Jan_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Jan_rainfall" class="vw_tbl_sms_monthly_subdivision_Jan_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jan_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Jan_rainfall" class="vw_tbl_sms_monthly_subdivision_Jan_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->Visible) { // Feb_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall) == "") { ?>
		<th data-name="Feb_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Feb_rainfall" class="vw_tbl_sms_monthly_subdivision_Feb_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Feb_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Feb_rainfall" class="vw_tbl_sms_monthly_subdivision_Feb_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->Visible) { // Mar_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall) == "") { ?>
		<th data-name="Mar_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Mar_rainfall" class="vw_tbl_sms_monthly_subdivision_Mar_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mar_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Mar_rainfall" class="vw_tbl_sms_monthly_subdivision_Mar_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->Visible) { // Apr_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall) == "") { ?>
		<th data-name="Apr_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_Apr_rainfall" class="vw_tbl_sms_monthly_subdivision_Apr_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Apr_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_Apr_rainfall" class="vw_tbl_sms_monthly_subdivision_Apr_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->May_rainfall->Visible) { // May_rainfall ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->May_rainfall) == "") { ?>
		<th data-name="May_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->headerCellClass() ?>"><div id="elh_vw_tbl_sms_monthly_subdivision_May_rainfall" class="vw_tbl_sms_monthly_subdivision_May_rainfall"><div class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="May_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vw_tbl_sms_monthly_subdivision_list->SortUrl($vw_tbl_sms_monthly_subdivision_list->May_rainfall) ?>', 1);"><div id="elh_vw_tbl_sms_monthly_subdivision_May_rainfall" class="vw_tbl_sms_monthly_subdivision_May_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($vw_tbl_sms_monthly_subdivision_list->May_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vw_tbl_sms_monthly_subdivision_list->May_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vw_tbl_sms_monthly_subdivision_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vw_tbl_sms_monthly_subdivision_list->ExportAll && $vw_tbl_sms_monthly_subdivision_list->isExport()) {
	$vw_tbl_sms_monthly_subdivision_list->StopRecord = $vw_tbl_sms_monthly_subdivision_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vw_tbl_sms_monthly_subdivision_list->TotalRecords > $vw_tbl_sms_monthly_subdivision_list->StartRecord + $vw_tbl_sms_monthly_subdivision_list->DisplayRecords - 1)
		$vw_tbl_sms_monthly_subdivision_list->StopRecord = $vw_tbl_sms_monthly_subdivision_list->StartRecord + $vw_tbl_sms_monthly_subdivision_list->DisplayRecords - 1;
	else
		$vw_tbl_sms_monthly_subdivision_list->StopRecord = $vw_tbl_sms_monthly_subdivision_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($vw_tbl_sms_monthly_subdivision->isConfirm() || $vw_tbl_sms_monthly_subdivision_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($vw_tbl_sms_monthly_subdivision_list->FormKeyCountName) && ($vw_tbl_sms_monthly_subdivision_list->isGridAdd() || $vw_tbl_sms_monthly_subdivision_list->isGridEdit() || $vw_tbl_sms_monthly_subdivision->isConfirm())) {
		$vw_tbl_sms_monthly_subdivision_list->KeyCount = $CurrentForm->getValue($vw_tbl_sms_monthly_subdivision_list->FormKeyCountName);
		$vw_tbl_sms_monthly_subdivision_list->StopRecord = $vw_tbl_sms_monthly_subdivision_list->StartRecord + $vw_tbl_sms_monthly_subdivision_list->KeyCount - 1;
	}
}
$vw_tbl_sms_monthly_subdivision_list->RecordCount = $vw_tbl_sms_monthly_subdivision_list->StartRecord - 1;
if ($vw_tbl_sms_monthly_subdivision_list->Recordset && !$vw_tbl_sms_monthly_subdivision_list->Recordset->EOF) {
	$vw_tbl_sms_monthly_subdivision_list->Recordset->moveFirst();
	$selectLimit = $vw_tbl_sms_monthly_subdivision_list->UseSelectLimit;
	if (!$selectLimit && $vw_tbl_sms_monthly_subdivision_list->StartRecord > 1)
		$vw_tbl_sms_monthly_subdivision_list->Recordset->move($vw_tbl_sms_monthly_subdivision_list->StartRecord - 1);
} elseif (!$vw_tbl_sms_monthly_subdivision->AllowAddDeleteRow && $vw_tbl_sms_monthly_subdivision_list->StopRecord == 0) {
	$vw_tbl_sms_monthly_subdivision_list->StopRecord = $vw_tbl_sms_monthly_subdivision->GridAddRowCount;
}

// Initialize aggregate
$vw_tbl_sms_monthly_subdivision->RowType = ROWTYPE_AGGREGATEINIT;
$vw_tbl_sms_monthly_subdivision->resetAttributes();
$vw_tbl_sms_monthly_subdivision_list->renderRow();
$vw_tbl_sms_monthly_subdivision_list->EditRowCount = 0;
if ($vw_tbl_sms_monthly_subdivision_list->isEdit())
	$vw_tbl_sms_monthly_subdivision_list->RowIndex = 1;
if ($vw_tbl_sms_monthly_subdivision_list->isGridEdit())
	$vw_tbl_sms_monthly_subdivision_list->RowIndex = 0;
while ($vw_tbl_sms_monthly_subdivision_list->RecordCount < $vw_tbl_sms_monthly_subdivision_list->StopRecord) {
	$vw_tbl_sms_monthly_subdivision_list->RecordCount++;
	if ($vw_tbl_sms_monthly_subdivision_list->RecordCount >= $vw_tbl_sms_monthly_subdivision_list->StartRecord) {
		$vw_tbl_sms_monthly_subdivision_list->RowCount++;
		if ($vw_tbl_sms_monthly_subdivision_list->isGridAdd() || $vw_tbl_sms_monthly_subdivision_list->isGridEdit() || $vw_tbl_sms_monthly_subdivision->isConfirm()) {
			$vw_tbl_sms_monthly_subdivision_list->RowIndex++;
			$CurrentForm->Index = $vw_tbl_sms_monthly_subdivision_list->RowIndex;
			if ($CurrentForm->hasValue($vw_tbl_sms_monthly_subdivision_list->FormActionName) && ($vw_tbl_sms_monthly_subdivision->isConfirm() || $vw_tbl_sms_monthly_subdivision_list->EventCancelled))
				$vw_tbl_sms_monthly_subdivision_list->RowAction = strval($CurrentForm->getValue($vw_tbl_sms_monthly_subdivision_list->FormActionName));
			elseif ($vw_tbl_sms_monthly_subdivision_list->isGridAdd())
				$vw_tbl_sms_monthly_subdivision_list->RowAction = "insert";
			else
				$vw_tbl_sms_monthly_subdivision_list->RowAction = "";
		}

		// Set up key count
		$vw_tbl_sms_monthly_subdivision_list->KeyCount = $vw_tbl_sms_monthly_subdivision_list->RowIndex;

		// Init row class and style
		$vw_tbl_sms_monthly_subdivision->resetAttributes();
		$vw_tbl_sms_monthly_subdivision->CssClass = "";
		if ($vw_tbl_sms_monthly_subdivision_list->isGridAdd()) {
			$vw_tbl_sms_monthly_subdivision_list->loadRowValues(); // Load default values
		} else {
			$vw_tbl_sms_monthly_subdivision_list->loadRowValues($vw_tbl_sms_monthly_subdivision_list->Recordset); // Load row values
		}
		$vw_tbl_sms_monthly_subdivision->RowType = ROWTYPE_VIEW; // Render view
		if ($vw_tbl_sms_monthly_subdivision_list->isEdit()) {
			if ($vw_tbl_sms_monthly_subdivision_list->checkInlineEditKey() && $vw_tbl_sms_monthly_subdivision_list->EditRowCount == 0) { // Inline edit
				$vw_tbl_sms_monthly_subdivision->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($vw_tbl_sms_monthly_subdivision_list->isGridEdit()) { // Grid edit
			if ($vw_tbl_sms_monthly_subdivision->EventCancelled)
				$vw_tbl_sms_monthly_subdivision_list->restoreCurrentRowFormValues($vw_tbl_sms_monthly_subdivision_list->RowIndex); // Restore form values
			if ($vw_tbl_sms_monthly_subdivision_list->RowAction == "insert")
				$vw_tbl_sms_monthly_subdivision->RowType = ROWTYPE_ADD; // Render add
			else
				$vw_tbl_sms_monthly_subdivision->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($vw_tbl_sms_monthly_subdivision_list->isEdit() && $vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT && $vw_tbl_sms_monthly_subdivision->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$vw_tbl_sms_monthly_subdivision_list->restoreFormValues(); // Restore form values
		}
		if ($vw_tbl_sms_monthly_subdivision_list->isGridEdit() && ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT || $vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) && $vw_tbl_sms_monthly_subdivision->EventCancelled) // Update failed
			$vw_tbl_sms_monthly_subdivision_list->restoreCurrentRowFormValues($vw_tbl_sms_monthly_subdivision_list->RowIndex); // Restore form values
		if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) // Edit row
			$vw_tbl_sms_monthly_subdivision_list->EditRowCount++;

		// Set up row id / data-rowindex
		$vw_tbl_sms_monthly_subdivision->RowAttrs->merge(["data-rowindex" => $vw_tbl_sms_monthly_subdivision_list->RowCount, "id" => "r" . $vw_tbl_sms_monthly_subdivision_list->RowCount . "_vw_tbl_sms_monthly_subdivision", "data-rowtype" => $vw_tbl_sms_monthly_subdivision->RowType]);

		// Render row
		$vw_tbl_sms_monthly_subdivision_list->renderRow();

		// Render list options
		$vw_tbl_sms_monthly_subdivision_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($vw_tbl_sms_monthly_subdivision_list->RowAction != "delete" && $vw_tbl_sms_monthly_subdivision_list->RowAction != "insertdelete" && !($vw_tbl_sms_monthly_subdivision_list->RowAction == "insert" && $vw_tbl_sms_monthly_subdivision->isConfirm() && $vw_tbl_sms_monthly_subdivision_list->emptyRow())) {
?>
	<tr <?php echo $vw_tbl_sms_monthly_subdivision->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_tbl_sms_monthly_subdivision_list->ListOptions->render("body", "left", $vw_tbl_sms_monthly_subdivision_list->RowCount);
?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_StationId" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_StationId" data-value-separator="<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId"<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->editAttributes() ?>>
			<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->selectOptionListHtml("x{$vw_tbl_sms_monthly_subdivision_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->Lookup->getParamTag($vw_tbl_sms_monthly_subdivision_list, "p_x" . $vw_tbl_sms_monthly_subdivision_list->RowIndex . "_StationId") ?>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_StationId" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->StationId->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_StationId" class="form-group">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_list->StationId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_StationId" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->StationId->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_StationId">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Slno" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Slno" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Slno->CurrentValue) ?>">
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Slno" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Slno" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Slno->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT || $vw_tbl_sms_monthly_subdivision->CurrentMode == "edit") { ?>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Slno" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Slno" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Slno->CurrentValue) ?>">
<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_SubDivisionId" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SubDivisionId" data-value-separator="<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId"<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->editAttributes() ?>>
			<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->selectOptionListHtml("x{$vw_tbl_sms_monthly_subdivision_list->RowIndex}_SubDivisionId") ?>
		</select>
</div>
<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->Lookup->getParamTag($vw_tbl_sms_monthly_subdivision_list, "p_x" . $vw_tbl_sms_monthly_subdivision_list->RowIndex . "_SubDivisionId") ?>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SubDivisionId" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_SubDivisionId" class="form-group">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SubDivisionId" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_SubDivisionId">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber" <?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_SenderMobileNumber" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SenderMobileNumber" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" size="12" maxlength="25" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SenderMobileNumber" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_SenderMobileNumber" class="form-group">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SenderMobileNumber" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_SenderMobileNumber">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Water_Year->Visible) { // Water_Year ?>
		<td data-name="Water_Year" <?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Water_Year" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Water_Year" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" size="10" maxlength="9" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Water_Year" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Water_Year->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Water_Year" class="form-group">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_list->Water_Year->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Water_Year" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Water_Year->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Water_Year">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->day_of_month->Visible) { // day_of_month ?>
		<td data-name="day_of_month" <?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_day_of_month" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_day_of_month" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" size="7" maxlength="2" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_day_of_month" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->day_of_month->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_day_of_month" class="form-group">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_list->day_of_month->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_day_of_month" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->day_of_month->CurrentValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_day_of_month">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->Visible) { // Jun_rainfall ?>
		<td data-name="Jun_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jun_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jun_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jun_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jun_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jun_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jun_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->Visible) { // Jul_rainfall ?>
		<td data-name="Jul_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jul_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jul_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jul_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jul_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jul_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jul_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->Visible) { // Aug_rainfall ?>
		<td data-name="Aug_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Aug_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Aug_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Aug_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Aug_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Aug_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Aug_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->Visible) { // Sep_rainfall ?>
		<td data-name="Sep_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Sep_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Sep_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Sep_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Sep_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Sep_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Sep_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->Visible) { // Oct_rainfall ?>
		<td data-name="Oct_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Oct_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Oct_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Oct_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Oct_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Oct_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Oct_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->Visible) { // Nov_rainfall ?>
		<td data-name="Nov_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Nov_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Nov_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Nov_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Nov_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Nov_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Nov_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->Visible) { // Dec_rainfall ?>
		<td data-name="Dec_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Dec_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Dec_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Dec_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Dec_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Dec_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Dec_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->Visible) { // Jan_rainfall ?>
		<td data-name="Jan_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jan_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jan_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jan_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jan_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jan_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Jan_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->Visible) { // Feb_rainfall ?>
		<td data-name="Feb_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Feb_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Feb_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Feb_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Feb_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Feb_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Feb_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->Visible) { // Mar_rainfall ?>
		<td data-name="Mar_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Mar_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Mar_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Mar_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Mar_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Mar_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Mar_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->Visible) { // Apr_rainfall ?>
		<td data-name="Apr_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Apr_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Apr_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Apr_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Apr_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Apr_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_Apr_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->May_rainfall->Visible) { // May_rainfall ?>
		<td data-name="May_rainfall" <?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->cellAttributes() ?>>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_May_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_May_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_May_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->May_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_May_rainfall" class="form-group">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_May_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vw_tbl_sms_monthly_subdivision_list->RowCount ?>_vw_tbl_sms_monthly_subdivision_May_rainfall">
<span<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->viewAttributes() ?>><?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_tbl_sms_monthly_subdivision_list->ListOptions->render("body", "right", $vw_tbl_sms_monthly_subdivision_list->RowCount);
?>
	</tr>
<?php if ($vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_ADD || $vw_tbl_sms_monthly_subdivision->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fvw_tbl_sms_monthly_subdivisionlist", "load"], function() {
	fvw_tbl_sms_monthly_subdivisionlist.updateLists(<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$vw_tbl_sms_monthly_subdivision_list->isGridAdd())
		if (!$vw_tbl_sms_monthly_subdivision_list->Recordset->EOF)
			$vw_tbl_sms_monthly_subdivision_list->Recordset->moveNext();
}
?>
<?php
	if ($vw_tbl_sms_monthly_subdivision_list->isGridAdd() || $vw_tbl_sms_monthly_subdivision_list->isGridEdit()) {
		$vw_tbl_sms_monthly_subdivision_list->RowIndex = '$rowindex$';
		$vw_tbl_sms_monthly_subdivision_list->loadRowValues();

		// Set row properties
		$vw_tbl_sms_monthly_subdivision->resetAttributes();
		$vw_tbl_sms_monthly_subdivision->RowAttrs->merge(["data-rowindex" => $vw_tbl_sms_monthly_subdivision_list->RowIndex, "id" => "r0_vw_tbl_sms_monthly_subdivision", "data-rowtype" => ROWTYPE_ADD]);
		$vw_tbl_sms_monthly_subdivision->RowAttrs->appendClass("ew-template");
		$vw_tbl_sms_monthly_subdivision->RowType = ROWTYPE_ADD;

		// Render row
		$vw_tbl_sms_monthly_subdivision_list->renderRow();

		// Render list options
		$vw_tbl_sms_monthly_subdivision_list->renderListOptions();
		$vw_tbl_sms_monthly_subdivision_list->StartRowCount = 0;
?>
	<tr <?php echo $vw_tbl_sms_monthly_subdivision->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vw_tbl_sms_monthly_subdivision_list->ListOptions->render("body", "left", $vw_tbl_sms_monthly_subdivision_list->RowIndex);
?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_StationId" class="form-group vw_tbl_sms_monthly_subdivision_StationId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_StationId" data-value-separator="<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId"<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->editAttributes() ?>>
			<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->selectOptionListHtml("x{$vw_tbl_sms_monthly_subdivision_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $vw_tbl_sms_monthly_subdivision_list->StationId->Lookup->getParamTag($vw_tbl_sms_monthly_subdivision_list, "p_x" . $vw_tbl_sms_monthly_subdivision_list->RowIndex . "_StationId") ?>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_StationId" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->StationId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_SubDivisionId" class="form-group vw_tbl_sms_monthly_subdivision_SubDivisionId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SubDivisionId" data-value-separator="<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId"<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->editAttributes() ?>>
			<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->selectOptionListHtml("x{$vw_tbl_sms_monthly_subdivision_list->RowIndex}_SubDivisionId") ?>
		</select>
</div>
<?php echo $vw_tbl_sms_monthly_subdivision_list->SubDivisionId->Lookup->getParamTag($vw_tbl_sms_monthly_subdivision_list, "p_x" . $vw_tbl_sms_monthly_subdivision_list->RowIndex . "_SubDivisionId") ?>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SubDivisionId" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->SubDivisionId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_SenderMobileNumber" class="form-group vw_tbl_sms_monthly_subdivision_SenderMobileNumber">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SenderMobileNumber" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" size="12" maxlength="25" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SenderMobileNumber" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->SenderMobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Water_Year->Visible) { // Water_Year ?>
		<td data-name="Water_Year">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Water_Year" class="form-group vw_tbl_sms_monthly_subdivision_Water_Year">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Water_Year" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" size="10" maxlength="9" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Water_Year->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Water_Year" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Water_Year->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->day_of_month->Visible) { // day_of_month ?>
		<td data-name="day_of_month">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_day_of_month" class="form-group vw_tbl_sms_monthly_subdivision_day_of_month">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_day_of_month" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" size="7" maxlength="2" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->day_of_month->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_day_of_month" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_day_of_month" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->day_of_month->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->Visible) { // Jun_rainfall ?>
		<td data-name="Jun_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Jun_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Jun_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jun_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jun_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jun_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Jun_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->Visible) { // Jul_rainfall ?>
		<td data-name="Jul_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Jul_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Jul_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jul_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jul_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jul_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Jul_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->Visible) { // Aug_rainfall ?>
		<td data-name="Aug_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Aug_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Aug_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Aug_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Aug_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Aug_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Aug_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->Visible) { // Sep_rainfall ?>
		<td data-name="Sep_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Sep_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Sep_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Sep_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Sep_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Sep_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Sep_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->Visible) { // Oct_rainfall ?>
		<td data-name="Oct_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Oct_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Oct_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Oct_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Oct_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Oct_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Oct_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->Visible) { // Nov_rainfall ?>
		<td data-name="Nov_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Nov_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Nov_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Nov_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Nov_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Nov_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Nov_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->Visible) { // Dec_rainfall ?>
		<td data-name="Dec_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Dec_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Dec_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Dec_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Dec_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Dec_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Dec_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->Visible) { // Jan_rainfall ?>
		<td data-name="Jan_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Jan_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Jan_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jan_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jan_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Jan_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Jan_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->Visible) { // Feb_rainfall ?>
		<td data-name="Feb_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Feb_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Feb_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Feb_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Feb_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Feb_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Feb_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->Visible) { // Mar_rainfall ?>
		<td data-name="Mar_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Mar_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Mar_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Mar_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Mar_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Mar_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Mar_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->Visible) { // Apr_rainfall ?>
		<td data-name="Apr_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_Apr_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_Apr_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Apr_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Apr_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_Apr_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->Apr_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vw_tbl_sms_monthly_subdivision_list->May_rainfall->Visible) { // May_rainfall ?>
		<td data-name="May_rainfall">
<span id="el$rowindex$_vw_tbl_sms_monthly_subdivision_May_rainfall" class="form-group vw_tbl_sms_monthly_subdivision_May_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_May_rainfall" name="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" id="x<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_list->May_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_May_rainfall" name="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" id="o<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>_May_rainfall" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_list->May_rainfall->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vw_tbl_sms_monthly_subdivision_list->ListOptions->render("body", "right", $vw_tbl_sms_monthly_subdivision_list->RowIndex);
?>
<script>
loadjs.ready(["fvw_tbl_sms_monthly_subdivisionlist", "load"], function() {
	fvw_tbl_sms_monthly_subdivisionlist.updateLists(<?php echo $vw_tbl_sms_monthly_subdivision_list->RowIndex ?>);
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
<?php if ($vw_tbl_sms_monthly_subdivision_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $vw_tbl_sms_monthly_subdivision_list->FormKeyCountName ?>" id="<?php echo $vw_tbl_sms_monthly_subdivision_list->FormKeyCountName ?>" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->KeyCount ?>">
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $vw_tbl_sms_monthly_subdivision_list->FormKeyCountName ?>" id="<?php echo $vw_tbl_sms_monthly_subdivision_list->FormKeyCountName ?>" value="<?php echo $vw_tbl_sms_monthly_subdivision_list->KeyCount ?>">
<?php echo $vw_tbl_sms_monthly_subdivision_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$vw_tbl_sms_monthly_subdivision->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vw_tbl_sms_monthly_subdivision_list->Recordset)
	$vw_tbl_sms_monthly_subdivision_list->Recordset->Close();
?>
<?php if (!$vw_tbl_sms_monthly_subdivision_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vw_tbl_sms_monthly_subdivision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vw_tbl_sms_monthly_subdivision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vw_tbl_sms_monthly_subdivision_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_list->TotalRecords == 0 && !$vw_tbl_sms_monthly_subdivision->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vw_tbl_sms_monthly_subdivision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vw_tbl_sms_monthly_subdivision_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vw_tbl_sms_monthly_subdivision_list->isExport()) { ?>
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
$vw_tbl_sms_monthly_subdivision_list->terminate();
?>