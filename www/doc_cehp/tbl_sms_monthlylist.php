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
$tbl_sms_monthly_list = new tbl_sms_monthly_list();

// Run the page
$tbl_sms_monthly_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_sms_monthly_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tbl_sms_monthly_list->isExport()) { ?>
<script>
var ftbl_sms_monthlylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftbl_sms_monthlylist = currentForm = new ew.Form("ftbl_sms_monthlylist", "list");
	ftbl_sms_monthlylist.formKeyCountName = '<?php echo $tbl_sms_monthly_list->FormKeyCountName ?>';

	// Validate form
	ftbl_sms_monthlylist.validate = function() {
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
			<?php if ($tbl_sms_monthly_list->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->StationId->caption(), $tbl_sms_monthly_list->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_list->Water_Year->Required) { ?>
				elm = this.getElements("x" + infix + "_Water_Year");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Water_Year->caption(), $tbl_sms_monthly_list->Water_Year->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_list->day_of_month->Required) { ?>
				elm = this.getElements("x" + infix + "_day_of_month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->day_of_month->caption(), $tbl_sms_monthly_list->day_of_month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_list->Jun_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jun_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Jun_rainfall->caption(), $tbl_sms_monthly_list->Jun_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jun_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Jun_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Jul_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jul_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Jul_rainfall->caption(), $tbl_sms_monthly_list->Jul_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jul_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Jul_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Aug_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Aug_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Aug_rainfall->caption(), $tbl_sms_monthly_list->Aug_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Aug_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Aug_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Sep_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Sep_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Sep_rainfall->caption(), $tbl_sms_monthly_list->Sep_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Sep_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Sep_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Oct_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Oct_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Oct_rainfall->caption(), $tbl_sms_monthly_list->Oct_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Oct_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Oct_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Nov_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Nov_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Nov_rainfall->caption(), $tbl_sms_monthly_list->Nov_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Nov_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Nov_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Dec_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Dec_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Dec_rainfall->caption(), $tbl_sms_monthly_list->Dec_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Dec_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Dec_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Jan_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jan_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Jan_rainfall->caption(), $tbl_sms_monthly_list->Jan_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jan_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Jan_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Feb_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Feb_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Feb_rainfall->caption(), $tbl_sms_monthly_list->Feb_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Feb_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Feb_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Mar_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Mar_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Mar_rainfall->caption(), $tbl_sms_monthly_list->Mar_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Mar_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Mar_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->Apr_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Apr_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->Apr_rainfall->caption(), $tbl_sms_monthly_list->Apr_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Apr_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->Apr_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->May_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_May_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->May_rainfall->caption(), $tbl_sms_monthly_list->May_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_May_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_list->May_rainfall->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_list->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->SenderMobileNumber->caption(), $tbl_sms_monthly_list->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_list->IsChanged->Required) { ?>
				elm = this.getElements("x" + infix + "_IsChanged");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->IsChanged->caption(), $tbl_sms_monthly_list->IsChanged->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_list->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_list->SubDivisionId->caption(), $tbl_sms_monthly_list->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ftbl_sms_monthlylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_sms_monthlylist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_sms_monthlylist.lists["x_StationId"] = <?php echo $tbl_sms_monthly_list->StationId->Lookup->toClientList($tbl_sms_monthly_list) ?>;
	ftbl_sms_monthlylist.lists["x_StationId"].options = <?php echo JsonEncode($tbl_sms_monthly_list->StationId->lookupOptions()) ?>;
	loadjs.done("ftbl_sms_monthlylist");
});
var ftbl_sms_monthlylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftbl_sms_monthlylistsrch = currentSearchForm = new ew.Form("ftbl_sms_monthlylistsrch");

	// Validate function for search
	ftbl_sms_monthlylistsrch.validate = function(fobj) {
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
	ftbl_sms_monthlylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_sms_monthlylistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	ftbl_sms_monthlylistsrch.filterList = <?php echo $tbl_sms_monthly_list->getFilterList() ?>;
	loadjs.done("ftbl_sms_monthlylistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tbl_sms_monthly_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tbl_sms_monthly_list->TotalRecords > 0 && $tbl_sms_monthly_list->ExportOptions->visible()) { ?>
<?php $tbl_sms_monthly_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->ImportOptions->visible()) { ?>
<?php $tbl_sms_monthly_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->SearchOptions->visible()) { ?>
<?php $tbl_sms_monthly_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->FilterOptions->visible()) { ?>
<?php $tbl_sms_monthly_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tbl_sms_monthly_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tbl_sms_monthly_list->isExport() && !$tbl_sms_monthly->CurrentAction) { ?>
<form name="ftbl_sms_monthlylistsrch" id="ftbl_sms_monthlylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftbl_sms_monthlylistsrch-search-panel" class="<?php echo $tbl_sms_monthly_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tbl_sms_monthly">
	<div class="ew-extended-search">
<?php

// Render search row
$tbl_sms_monthly->RowType = ROWTYPE_SEARCH;
$tbl_sms_monthly->resetAttributes();
$tbl_sms_monthly_list->renderRow();
?>
<?php if ($tbl_sms_monthly_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<?php
		$tbl_sms_monthly_list->SearchColumnCount++;
		if (($tbl_sms_monthly_list->SearchColumnCount - 1) % $tbl_sms_monthly_list->SearchFieldsPerRow == 0) {
			$tbl_sms_monthly_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_sms_monthly_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SenderMobileNumber" class="ew-cell form-group">
		<label for="x_SenderMobileNumber" class="ew-search-caption ew-label"><?php echo $tbl_sms_monthly_list->SenderMobileNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SenderMobileNumber" id="z_SenderMobileNumber" value="LIKE">
</span>
		<span id="el_tbl_sms_monthly_SenderMobileNumber" class="ew-search-field">
<?php if (!$Security->isAdmin() && $Security->isLoggedIn() && !$tbl_sms_monthly->userIDAllow($tbl_sms_monthly->CurrentAction)) { // Non system admin ?>
<span<?php echo $tbl_sms_monthly_list->SenderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->SenderMobileNumber->EditValue)) ?>"></span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="x_SenderMobileNumber" id="x_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SenderMobileNumber->AdvancedSearch->SearchValue) ?>">
<?php } else { ?>
<input type="text" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="x_SenderMobileNumber" id="x_SenderMobileNumber" size="15" maxlength="25" value="<?php echo $tbl_sms_monthly_list->SenderMobileNumber->EditValue ?>"<?php echo $tbl_sms_monthly_list->SenderMobileNumber->editAttributes() ?>>
<?php } ?>
</span>
	</div>
	<?php if ($tbl_sms_monthly_list->SearchColumnCount % $tbl_sms_monthly_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($tbl_sms_monthly_list->SearchColumnCount % $tbl_sms_monthly_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $tbl_sms_monthly_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tbl_sms_monthly_list->showPageHeader(); ?>
<?php
$tbl_sms_monthly_list->showMessage();
?>
<?php if ($tbl_sms_monthly_list->TotalRecords > 0 || $tbl_sms_monthly->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tbl_sms_monthly_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tbl_sms_monthly">
<?php if (!$tbl_sms_monthly_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tbl_sms_monthly_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_sms_monthly_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_sms_monthly_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftbl_sms_monthlylist" id="ftbl_sms_monthlylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_sms_monthly">
<div id="gmp_tbl_sms_monthly" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tbl_sms_monthly_list->TotalRecords > 0 || $tbl_sms_monthly_list->isGridEdit()) { ?>
<table id="tbl_tbl_sms_monthlylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tbl_sms_monthly->RowType = ROWTYPE_HEADER;

// Render list options
$tbl_sms_monthly_list->renderListOptions();

// Render list options (header, left)
$tbl_sms_monthly_list->ListOptions->render("header", "left");
?>
<?php if ($tbl_sms_monthly_list->StationId->Visible) { // StationId ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $tbl_sms_monthly_list->StationId->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_StationId" class="tbl_sms_monthly_StationId"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $tbl_sms_monthly_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->StationId) ?>', 1);"><div id="elh_tbl_sms_monthly_StationId" class="tbl_sms_monthly_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Water_Year->Visible) { // Water_Year ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Water_Year) == "") { ?>
		<th data-name="Water_Year" class="<?php echo $tbl_sms_monthly_list->Water_Year->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Water_Year" class="tbl_sms_monthly_Water_Year"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Water_Year->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Water_Year" class="<?php echo $tbl_sms_monthly_list->Water_Year->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Water_Year) ?>', 1);"><div id="elh_tbl_sms_monthly_Water_Year" class="tbl_sms_monthly_Water_Year">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Water_Year->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Water_Year->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Water_Year->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->day_of_month->Visible) { // day_of_month ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->day_of_month) == "") { ?>
		<th data-name="day_of_month" class="<?php echo $tbl_sms_monthly_list->day_of_month->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day_of_month" class="tbl_sms_monthly_day_of_month"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->day_of_month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="day_of_month" class="<?php echo $tbl_sms_monthly_list->day_of_month->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->day_of_month) ?>', 1);"><div id="elh_tbl_sms_monthly_day_of_month" class="tbl_sms_monthly_day_of_month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->day_of_month->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->day_of_month->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->day_of_month->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Jun_rainfall->Visible) { // Jun_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Jun_rainfall) == "") { ?>
		<th data-name="Jun_rainfall" class="<?php echo $tbl_sms_monthly_list->Jun_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Jun_rainfall" class="tbl_sms_monthly_Jun_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Jun_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jun_rainfall" class="<?php echo $tbl_sms_monthly_list->Jun_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Jun_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Jun_rainfall" class="tbl_sms_monthly_Jun_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Jun_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Jun_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Jun_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Jul_rainfall->Visible) { // Jul_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Jul_rainfall) == "") { ?>
		<th data-name="Jul_rainfall" class="<?php echo $tbl_sms_monthly_list->Jul_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Jul_rainfall" class="tbl_sms_monthly_Jul_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Jul_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jul_rainfall" class="<?php echo $tbl_sms_monthly_list->Jul_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Jul_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Jul_rainfall" class="tbl_sms_monthly_Jul_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Jul_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Jul_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Jul_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Aug_rainfall->Visible) { // Aug_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Aug_rainfall) == "") { ?>
		<th data-name="Aug_rainfall" class="<?php echo $tbl_sms_monthly_list->Aug_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Aug_rainfall" class="tbl_sms_monthly_Aug_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Aug_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aug_rainfall" class="<?php echo $tbl_sms_monthly_list->Aug_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Aug_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Aug_rainfall" class="tbl_sms_monthly_Aug_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Aug_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Aug_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Aug_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Sep_rainfall->Visible) { // Sep_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Sep_rainfall) == "") { ?>
		<th data-name="Sep_rainfall" class="<?php echo $tbl_sms_monthly_list->Sep_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Sep_rainfall" class="tbl_sms_monthly_Sep_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Sep_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sep_rainfall" class="<?php echo $tbl_sms_monthly_list->Sep_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Sep_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Sep_rainfall" class="tbl_sms_monthly_Sep_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Sep_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Sep_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Sep_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Oct_rainfall->Visible) { // Oct_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Oct_rainfall) == "") { ?>
		<th data-name="Oct_rainfall" class="<?php echo $tbl_sms_monthly_list->Oct_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Oct_rainfall" class="tbl_sms_monthly_Oct_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Oct_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Oct_rainfall" class="<?php echo $tbl_sms_monthly_list->Oct_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Oct_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Oct_rainfall" class="tbl_sms_monthly_Oct_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Oct_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Oct_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Oct_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Nov_rainfall->Visible) { // Nov_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Nov_rainfall) == "") { ?>
		<th data-name="Nov_rainfall" class="<?php echo $tbl_sms_monthly_list->Nov_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Nov_rainfall" class="tbl_sms_monthly_Nov_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Nov_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nov_rainfall" class="<?php echo $tbl_sms_monthly_list->Nov_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Nov_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Nov_rainfall" class="tbl_sms_monthly_Nov_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Nov_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Nov_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Nov_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Dec_rainfall->Visible) { // Dec_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Dec_rainfall) == "") { ?>
		<th data-name="Dec_rainfall" class="<?php echo $tbl_sms_monthly_list->Dec_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Dec_rainfall" class="tbl_sms_monthly_Dec_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Dec_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dec_rainfall" class="<?php echo $tbl_sms_monthly_list->Dec_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Dec_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Dec_rainfall" class="tbl_sms_monthly_Dec_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Dec_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Dec_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Dec_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Jan_rainfall->Visible) { // Jan_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Jan_rainfall) == "") { ?>
		<th data-name="Jan_rainfall" class="<?php echo $tbl_sms_monthly_list->Jan_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Jan_rainfall" class="tbl_sms_monthly_Jan_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Jan_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jan_rainfall" class="<?php echo $tbl_sms_monthly_list->Jan_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Jan_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Jan_rainfall" class="tbl_sms_monthly_Jan_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Jan_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Jan_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Jan_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Feb_rainfall->Visible) { // Feb_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Feb_rainfall) == "") { ?>
		<th data-name="Feb_rainfall" class="<?php echo $tbl_sms_monthly_list->Feb_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Feb_rainfall" class="tbl_sms_monthly_Feb_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Feb_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Feb_rainfall" class="<?php echo $tbl_sms_monthly_list->Feb_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Feb_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Feb_rainfall" class="tbl_sms_monthly_Feb_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Feb_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Feb_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Feb_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Mar_rainfall->Visible) { // Mar_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Mar_rainfall) == "") { ?>
		<th data-name="Mar_rainfall" class="<?php echo $tbl_sms_monthly_list->Mar_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Mar_rainfall" class="tbl_sms_monthly_Mar_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Mar_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mar_rainfall" class="<?php echo $tbl_sms_monthly_list->Mar_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Mar_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Mar_rainfall" class="tbl_sms_monthly_Mar_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Mar_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Mar_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Mar_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->Apr_rainfall->Visible) { // Apr_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Apr_rainfall) == "") { ?>
		<th data-name="Apr_rainfall" class="<?php echo $tbl_sms_monthly_list->Apr_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_Apr_rainfall" class="tbl_sms_monthly_Apr_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Apr_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Apr_rainfall" class="<?php echo $tbl_sms_monthly_list->Apr_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->Apr_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_Apr_rainfall" class="tbl_sms_monthly_Apr_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->Apr_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->Apr_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->Apr_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->May_rainfall->Visible) { // May_rainfall ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->May_rainfall) == "") { ?>
		<th data-name="May_rainfall" class="<?php echo $tbl_sms_monthly_list->May_rainfall->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_May_rainfall" class="tbl_sms_monthly_May_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->May_rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="May_rainfall" class="<?php echo $tbl_sms_monthly_list->May_rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->May_rainfall) ?>', 1);"><div id="elh_tbl_sms_monthly_May_rainfall" class="tbl_sms_monthly_May_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->May_rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->May_rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->May_rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->SenderMobileNumber) == "") { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $tbl_sms_monthly_list->SenderMobileNumber->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_SenderMobileNumber" class="tbl_sms_monthly_SenderMobileNumber"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->SenderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $tbl_sms_monthly_list->SenderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->SenderMobileNumber) ?>', 1);"><div id="elh_tbl_sms_monthly_SenderMobileNumber" class="tbl_sms_monthly_SenderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->SenderMobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->SenderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->SenderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->IsChanged->Visible) { // IsChanged ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->IsChanged) == "") { ?>
		<th data-name="IsChanged" class="<?php echo $tbl_sms_monthly_list->IsChanged->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_IsChanged" class="tbl_sms_monthly_IsChanged"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->IsChanged->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsChanged" class="<?php echo $tbl_sms_monthly_list->IsChanged->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->IsChanged) ?>', 1);"><div id="elh_tbl_sms_monthly_IsChanged" class="tbl_sms_monthly_IsChanged">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->IsChanged->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->IsChanged->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->IsChanged->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $tbl_sms_monthly_list->SubDivisionId->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_SubDivisionId" class="tbl_sms_monthly_SubDivisionId"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $tbl_sms_monthly_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_list->SortUrl($tbl_sms_monthly_list->SubDivisionId) ?>', 1);"><div id="elh_tbl_sms_monthly_SubDivisionId" class="tbl_sms_monthly_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tbl_sms_monthly_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tbl_sms_monthly_list->ExportAll && $tbl_sms_monthly_list->isExport()) {
	$tbl_sms_monthly_list->StopRecord = $tbl_sms_monthly_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tbl_sms_monthly_list->TotalRecords > $tbl_sms_monthly_list->StartRecord + $tbl_sms_monthly_list->DisplayRecords - 1)
		$tbl_sms_monthly_list->StopRecord = $tbl_sms_monthly_list->StartRecord + $tbl_sms_monthly_list->DisplayRecords - 1;
	else
		$tbl_sms_monthly_list->StopRecord = $tbl_sms_monthly_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($tbl_sms_monthly->isConfirm() || $tbl_sms_monthly_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($tbl_sms_monthly_list->FormKeyCountName) && ($tbl_sms_monthly_list->isGridAdd() || $tbl_sms_monthly_list->isGridEdit() || $tbl_sms_monthly->isConfirm())) {
		$tbl_sms_monthly_list->KeyCount = $CurrentForm->getValue($tbl_sms_monthly_list->FormKeyCountName);
		$tbl_sms_monthly_list->StopRecord = $tbl_sms_monthly_list->StartRecord + $tbl_sms_monthly_list->KeyCount - 1;
	}
}
$tbl_sms_monthly_list->RecordCount = $tbl_sms_monthly_list->StartRecord - 1;
if ($tbl_sms_monthly_list->Recordset && !$tbl_sms_monthly_list->Recordset->EOF) {
	$tbl_sms_monthly_list->Recordset->moveFirst();
	$selectLimit = $tbl_sms_monthly_list->UseSelectLimit;
	if (!$selectLimit && $tbl_sms_monthly_list->StartRecord > 1)
		$tbl_sms_monthly_list->Recordset->move($tbl_sms_monthly_list->StartRecord - 1);
} elseif (!$tbl_sms_monthly->AllowAddDeleteRow && $tbl_sms_monthly_list->StopRecord == 0) {
	$tbl_sms_monthly_list->StopRecord = $tbl_sms_monthly->GridAddRowCount;
}

// Initialize aggregate
$tbl_sms_monthly->RowType = ROWTYPE_AGGREGATEINIT;
$tbl_sms_monthly->resetAttributes();
$tbl_sms_monthly_list->renderRow();
$tbl_sms_monthly_list->EditRowCount = 0;
if ($tbl_sms_monthly_list->isEdit())
	$tbl_sms_monthly_list->RowIndex = 1;
if ($tbl_sms_monthly_list->isGridEdit())
	$tbl_sms_monthly_list->RowIndex = 0;
while ($tbl_sms_monthly_list->RecordCount < $tbl_sms_monthly_list->StopRecord) {
	$tbl_sms_monthly_list->RecordCount++;
	if ($tbl_sms_monthly_list->RecordCount >= $tbl_sms_monthly_list->StartRecord) {
		$tbl_sms_monthly_list->RowCount++;
		if ($tbl_sms_monthly_list->isGridAdd() || $tbl_sms_monthly_list->isGridEdit() || $tbl_sms_monthly->isConfirm()) {
			$tbl_sms_monthly_list->RowIndex++;
			$CurrentForm->Index = $tbl_sms_monthly_list->RowIndex;
			if ($CurrentForm->hasValue($tbl_sms_monthly_list->FormActionName) && ($tbl_sms_monthly->isConfirm() || $tbl_sms_monthly_list->EventCancelled))
				$tbl_sms_monthly_list->RowAction = strval($CurrentForm->getValue($tbl_sms_monthly_list->FormActionName));
			elseif ($tbl_sms_monthly_list->isGridAdd())
				$tbl_sms_monthly_list->RowAction = "insert";
			else
				$tbl_sms_monthly_list->RowAction = "";
		}

		// Set up key count
		$tbl_sms_monthly_list->KeyCount = $tbl_sms_monthly_list->RowIndex;

		// Init row class and style
		$tbl_sms_monthly->resetAttributes();
		$tbl_sms_monthly->CssClass = "";
		if ($tbl_sms_monthly_list->isGridAdd()) {
			$tbl_sms_monthly_list->loadRowValues(); // Load default values
		} else {
			$tbl_sms_monthly_list->loadRowValues($tbl_sms_monthly_list->Recordset); // Load row values
		}
		$tbl_sms_monthly->RowType = ROWTYPE_VIEW; // Render view
		if ($tbl_sms_monthly_list->isEdit()) {
			if ($tbl_sms_monthly_list->checkInlineEditKey() && $tbl_sms_monthly_list->EditRowCount == 0) { // Inline edit
				$tbl_sms_monthly->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($tbl_sms_monthly_list->isGridEdit()) { // Grid edit
			if ($tbl_sms_monthly->EventCancelled)
				$tbl_sms_monthly_list->restoreCurrentRowFormValues($tbl_sms_monthly_list->RowIndex); // Restore form values
			if ($tbl_sms_monthly_list->RowAction == "insert")
				$tbl_sms_monthly->RowType = ROWTYPE_ADD; // Render add
			else
				$tbl_sms_monthly->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_sms_monthly_list->isEdit() && $tbl_sms_monthly->RowType == ROWTYPE_EDIT && $tbl_sms_monthly->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$tbl_sms_monthly_list->restoreFormValues(); // Restore form values
		}
		if ($tbl_sms_monthly_list->isGridEdit() && ($tbl_sms_monthly->RowType == ROWTYPE_EDIT || $tbl_sms_monthly->RowType == ROWTYPE_ADD) && $tbl_sms_monthly->EventCancelled) // Update failed
			$tbl_sms_monthly_list->restoreCurrentRowFormValues($tbl_sms_monthly_list->RowIndex); // Restore form values
		if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) // Edit row
			$tbl_sms_monthly_list->EditRowCount++;

		// Set up row id / data-rowindex
		$tbl_sms_monthly->RowAttrs->merge(["data-rowindex" => $tbl_sms_monthly_list->RowCount, "id" => "r" . $tbl_sms_monthly_list->RowCount . "_tbl_sms_monthly", "data-rowtype" => $tbl_sms_monthly->RowType]);

		// Render row
		$tbl_sms_monthly_list->renderRow();

		// Render list options
		$tbl_sms_monthly_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_sms_monthly_list->RowAction != "delete" && $tbl_sms_monthly_list->RowAction != "insertdelete" && !($tbl_sms_monthly_list->RowAction == "insert" && $tbl_sms_monthly->isConfirm() && $tbl_sms_monthly_list->emptyRow())) {
?>
	<tr <?php echo $tbl_sms_monthly->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_sms_monthly_list->ListOptions->render("body", "left", $tbl_sms_monthly_list->RowCount);
?>
	<?php if ($tbl_sms_monthly_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $tbl_sms_monthly_list->StationId->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_StationId" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly" data-field="x_StationId" data-value-separator="<?php echo $tbl_sms_monthly_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId"<?php echo $tbl_sms_monthly_list->StationId->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_list->StationId->selectOptionListHtml("x{$tbl_sms_monthly_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_list->StationId->Lookup->getParamTag($tbl_sms_monthly_list, "p_x" . $tbl_sms_monthly_list->RowIndex . "_StationId") ?>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_StationId" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($tbl_sms_monthly_list->StationId->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_StationId" class="form-group">
<span<?php echo $tbl_sms_monthly_list->StationId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->StationId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_StationId" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($tbl_sms_monthly_list->StationId->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_StationId">
<span<?php echo $tbl_sms_monthly_list->StationId->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->StationId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Slno" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Slno" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Slno->CurrentValue) ?>">
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Slno" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Slno" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Slno->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT || $tbl_sms_monthly->CurrentMode == "edit") { ?>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Slno" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Slno" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Slno->CurrentValue) ?>">
<?php } ?>
	<?php if ($tbl_sms_monthly_list->Water_Year->Visible) { // Water_Year ?>
		<td data-name="Water_Year" <?php echo $tbl_sms_monthly_list->Water_Year->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Water_Year" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Water_Year" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Water_Year->EditValue ?>"<?php echo $tbl_sms_monthly_list->Water_Year->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Water_Year" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Water_Year->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Water_Year" class="form-group">
<span<?php echo $tbl_sms_monthly_list->Water_Year->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->Water_Year->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Water_Year" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Water_Year->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Water_Year">
<span<?php echo $tbl_sms_monthly_list->Water_Year->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Water_Year->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->day_of_month->Visible) { // day_of_month ?>
		<td data-name="day_of_month" <?php echo $tbl_sms_monthly_list->day_of_month->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_day_of_month" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_day_of_month" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" size="10" maxlength="2" value="<?php echo $tbl_sms_monthly_list->day_of_month->EditValue ?>"<?php echo $tbl_sms_monthly_list->day_of_month->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_day_of_month" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" value="<?php echo HtmlEncode($tbl_sms_monthly_list->day_of_month->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_day_of_month" class="form-group">
<span<?php echo $tbl_sms_monthly_list->day_of_month->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->day_of_month->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_day_of_month" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" value="<?php echo HtmlEncode($tbl_sms_monthly_list->day_of_month->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_day_of_month">
<span<?php echo $tbl_sms_monthly_list->day_of_month->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->day_of_month->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Jun_rainfall->Visible) { // Jun_rainfall ?>
		<td data-name="Jun_rainfall" <?php echo $tbl_sms_monthly_list->Jun_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jun_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jun_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jun_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jun_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Jun_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Jun_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jun_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jun_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jun_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jun_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jun_rainfall">
<span<?php echo $tbl_sms_monthly_list->Jun_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Jun_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Jul_rainfall->Visible) { // Jul_rainfall ?>
		<td data-name="Jul_rainfall" <?php echo $tbl_sms_monthly_list->Jul_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jul_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jul_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jul_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jul_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Jul_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Jul_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jul_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jul_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jul_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jul_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jul_rainfall">
<span<?php echo $tbl_sms_monthly_list->Jul_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Jul_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Aug_rainfall->Visible) { // Aug_rainfall ?>
		<td data-name="Aug_rainfall" <?php echo $tbl_sms_monthly_list->Aug_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Aug_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Aug_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Aug_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Aug_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Aug_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Aug_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Aug_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Aug_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Aug_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Aug_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Aug_rainfall">
<span<?php echo $tbl_sms_monthly_list->Aug_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Aug_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Sep_rainfall->Visible) { // Sep_rainfall ?>
		<td data-name="Sep_rainfall" <?php echo $tbl_sms_monthly_list->Sep_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Sep_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Sep_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Sep_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Sep_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Sep_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Sep_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Sep_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Sep_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Sep_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Sep_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Sep_rainfall">
<span<?php echo $tbl_sms_monthly_list->Sep_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Sep_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Oct_rainfall->Visible) { // Oct_rainfall ?>
		<td data-name="Oct_rainfall" <?php echo $tbl_sms_monthly_list->Oct_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Oct_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Oct_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Oct_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Oct_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Oct_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Oct_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Oct_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Oct_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Oct_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Oct_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Oct_rainfall">
<span<?php echo $tbl_sms_monthly_list->Oct_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Oct_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Nov_rainfall->Visible) { // Nov_rainfall ?>
		<td data-name="Nov_rainfall" <?php echo $tbl_sms_monthly_list->Nov_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Nov_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Nov_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Nov_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Nov_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Nov_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Nov_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Nov_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Nov_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Nov_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Nov_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Nov_rainfall">
<span<?php echo $tbl_sms_monthly_list->Nov_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Nov_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Dec_rainfall->Visible) { // Dec_rainfall ?>
		<td data-name="Dec_rainfall" <?php echo $tbl_sms_monthly_list->Dec_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Dec_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Dec_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Dec_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Dec_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Dec_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Dec_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Dec_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Dec_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Dec_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Dec_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Dec_rainfall">
<span<?php echo $tbl_sms_monthly_list->Dec_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Dec_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Jan_rainfall->Visible) { // Jan_rainfall ?>
		<td data-name="Jan_rainfall" <?php echo $tbl_sms_monthly_list->Jan_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jan_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jan_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jan_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jan_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Jan_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Jan_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jan_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jan_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jan_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jan_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Jan_rainfall">
<span<?php echo $tbl_sms_monthly_list->Jan_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Jan_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Feb_rainfall->Visible) { // Feb_rainfall ?>
		<td data-name="Feb_rainfall" <?php echo $tbl_sms_monthly_list->Feb_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Feb_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Feb_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Feb_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Feb_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Feb_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Feb_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Feb_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Feb_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Feb_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Feb_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Feb_rainfall">
<span<?php echo $tbl_sms_monthly_list->Feb_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Feb_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Mar_rainfall->Visible) { // Mar_rainfall ?>
		<td data-name="Mar_rainfall" <?php echo $tbl_sms_monthly_list->Mar_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Mar_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Mar_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Mar_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Mar_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Mar_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Mar_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Mar_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Mar_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Mar_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Mar_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Mar_rainfall">
<span<?php echo $tbl_sms_monthly_list->Mar_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Mar_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Apr_rainfall->Visible) { // Apr_rainfall ?>
		<td data-name="Apr_rainfall" <?php echo $tbl_sms_monthly_list->Apr_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Apr_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Apr_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Apr_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Apr_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Apr_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Apr_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Apr_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Apr_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Apr_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Apr_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_Apr_rainfall">
<span<?php echo $tbl_sms_monthly_list->Apr_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->Apr_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->May_rainfall->Visible) { // May_rainfall ?>
		<td data-name="May_rainfall" <?php echo $tbl_sms_monthly_list->May_rainfall->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_May_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_May_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->May_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->May_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_May_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->May_rainfall->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_May_rainfall" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_May_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->May_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->May_rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_May_rainfall">
<span<?php echo $tbl_sms_monthly_list->May_rainfall->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->May_rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber" <?php echo $tbl_sms_monthly_list->SenderMobileNumber->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn() && !$tbl_sms_monthly->userIDAllow($tbl_sms_monthly->CurrentAction)) { // Non system admin ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_SenderMobileNumber" class="form-group">
<span<?php echo $tbl_sms_monthly_list->SenderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->SenderMobileNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SenderMobileNumber->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_SenderMobileNumber" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" size="15" maxlength="25" value="<?php echo $tbl_sms_monthly_list->SenderMobileNumber->EditValue ?>"<?php echo $tbl_sms_monthly_list->SenderMobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SenderMobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_SenderMobileNumber" class="form-group">
<span<?php echo $tbl_sms_monthly_list->SenderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->SenderMobileNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SenderMobileNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_SenderMobileNumber">
<span<?php echo $tbl_sms_monthly_list->SenderMobileNumber->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->SenderMobileNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->IsChanged->Visible) { // IsChanged ?>
		<td data-name="IsChanged" <?php echo $tbl_sms_monthly_list->IsChanged->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_IsChanged" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_IsChanged" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" size="10" maxlength="1" value="<?php echo $tbl_sms_monthly_list->IsChanged->EditValue ?>"<?php echo $tbl_sms_monthly_list->IsChanged->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_IsChanged" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" value="<?php echo HtmlEncode($tbl_sms_monthly_list->IsChanged->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_IsChanged" class="form-group">
<span<?php echo $tbl_sms_monthly_list->IsChanged->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->IsChanged->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_IsChanged" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" value="<?php echo HtmlEncode($tbl_sms_monthly_list->IsChanged->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_IsChanged">
<span<?php echo $tbl_sms_monthly_list->IsChanged->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->IsChanged->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $tbl_sms_monthly_list->SubDivisionId->cellAttributes() ?>>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_SubDivisionId" class="form-group">
<input type="text" data-table="tbl_sms_monthly" data-field="x_SubDivisionId" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" size="10" maxlength="11" value="<?php echo $tbl_sms_monthly_list->SubDivisionId->EditValue ?>"<?php echo $tbl_sms_monthly_list->SubDivisionId->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SubDivisionId" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SubDivisionId->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_SubDivisionId" class="form-group">
<span<?php echo $tbl_sms_monthly_list->SubDivisionId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->SubDivisionId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SubDivisionId" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SubDivisionId->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_list->RowCount ?>_tbl_sms_monthly_SubDivisionId">
<span<?php echo $tbl_sms_monthly_list->SubDivisionId->viewAttributes() ?>><?php echo $tbl_sms_monthly_list->SubDivisionId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_sms_monthly_list->ListOptions->render("body", "right", $tbl_sms_monthly_list->RowCount);
?>
	</tr>
<?php if ($tbl_sms_monthly->RowType == ROWTYPE_ADD || $tbl_sms_monthly->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ftbl_sms_monthlylist", "load"], function() {
	ftbl_sms_monthlylist.updateLists(<?php echo $tbl_sms_monthly_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$tbl_sms_monthly_list->isGridAdd())
		if (!$tbl_sms_monthly_list->Recordset->EOF)
			$tbl_sms_monthly_list->Recordset->moveNext();
}
?>
<?php
	if ($tbl_sms_monthly_list->isGridAdd() || $tbl_sms_monthly_list->isGridEdit()) {
		$tbl_sms_monthly_list->RowIndex = '$rowindex$';
		$tbl_sms_monthly_list->loadRowValues();

		// Set row properties
		$tbl_sms_monthly->resetAttributes();
		$tbl_sms_monthly->RowAttrs->merge(["data-rowindex" => $tbl_sms_monthly_list->RowIndex, "id" => "r0_tbl_sms_monthly", "data-rowtype" => ROWTYPE_ADD]);
		$tbl_sms_monthly->RowAttrs->appendClass("ew-template");
		$tbl_sms_monthly->RowType = ROWTYPE_ADD;

		// Render row
		$tbl_sms_monthly_list->renderRow();

		// Render list options
		$tbl_sms_monthly_list->renderListOptions();
		$tbl_sms_monthly_list->StartRowCount = 0;
?>
	<tr <?php echo $tbl_sms_monthly->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_sms_monthly_list->ListOptions->render("body", "left", $tbl_sms_monthly_list->RowIndex);
?>
	<?php if ($tbl_sms_monthly_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId">
<span id="el$rowindex$_tbl_sms_monthly_StationId" class="form-group tbl_sms_monthly_StationId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly" data-field="x_StationId" data-value-separator="<?php echo $tbl_sms_monthly_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId"<?php echo $tbl_sms_monthly_list->StationId->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_list->StationId->selectOptionListHtml("x{$tbl_sms_monthly_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_list->StationId->Lookup->getParamTag($tbl_sms_monthly_list, "p_x" . $tbl_sms_monthly_list->RowIndex . "_StationId") ?>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_StationId" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($tbl_sms_monthly_list->StationId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Water_Year->Visible) { // Water_Year ?>
		<td data-name="Water_Year">
<span id="el$rowindex$_tbl_sms_monthly_Water_Year" class="form-group tbl_sms_monthly_Water_Year">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Water_Year" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Water_Year->EditValue ?>"<?php echo $tbl_sms_monthly_list->Water_Year->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Water_Year" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Water_Year->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->day_of_month->Visible) { // day_of_month ?>
		<td data-name="day_of_month">
<span id="el$rowindex$_tbl_sms_monthly_day_of_month" class="form-group tbl_sms_monthly_day_of_month">
<input type="text" data-table="tbl_sms_monthly" data-field="x_day_of_month" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" size="10" maxlength="2" value="<?php echo $tbl_sms_monthly_list->day_of_month->EditValue ?>"<?php echo $tbl_sms_monthly_list->day_of_month->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_day_of_month" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_day_of_month" value="<?php echo HtmlEncode($tbl_sms_monthly_list->day_of_month->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Jun_rainfall->Visible) { // Jun_rainfall ?>
		<td data-name="Jun_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Jun_rainfall" class="form-group tbl_sms_monthly_Jun_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jun_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jun_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jun_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Jun_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jun_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Jun_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Jul_rainfall->Visible) { // Jul_rainfall ?>
		<td data-name="Jul_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Jul_rainfall" class="form-group tbl_sms_monthly_Jul_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jul_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jul_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jul_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Jul_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jul_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Jul_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Aug_rainfall->Visible) { // Aug_rainfall ?>
		<td data-name="Aug_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Aug_rainfall" class="form-group tbl_sms_monthly_Aug_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Aug_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Aug_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Aug_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Aug_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Aug_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Aug_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Sep_rainfall->Visible) { // Sep_rainfall ?>
		<td data-name="Sep_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Sep_rainfall" class="form-group tbl_sms_monthly_Sep_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Sep_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Sep_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Sep_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Sep_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Sep_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Sep_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Oct_rainfall->Visible) { // Oct_rainfall ?>
		<td data-name="Oct_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Oct_rainfall" class="form-group tbl_sms_monthly_Oct_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Oct_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Oct_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Oct_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Oct_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Oct_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Oct_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Nov_rainfall->Visible) { // Nov_rainfall ?>
		<td data-name="Nov_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Nov_rainfall" class="form-group tbl_sms_monthly_Nov_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Nov_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Nov_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Nov_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Nov_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Nov_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Nov_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Dec_rainfall->Visible) { // Dec_rainfall ?>
		<td data-name="Dec_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Dec_rainfall" class="form-group tbl_sms_monthly_Dec_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Dec_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Dec_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Dec_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Dec_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Dec_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Dec_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Jan_rainfall->Visible) { // Jan_rainfall ?>
		<td data-name="Jan_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Jan_rainfall" class="form-group tbl_sms_monthly_Jan_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Jan_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Jan_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Jan_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Jan_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Jan_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Jan_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Feb_rainfall->Visible) { // Feb_rainfall ?>
		<td data-name="Feb_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Feb_rainfall" class="form-group tbl_sms_monthly_Feb_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Feb_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Feb_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Feb_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Feb_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Feb_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Feb_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Mar_rainfall->Visible) { // Mar_rainfall ?>
		<td data-name="Mar_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Mar_rainfall" class="form-group tbl_sms_monthly_Mar_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Mar_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Mar_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Mar_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Mar_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Mar_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Mar_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->Apr_rainfall->Visible) { // Apr_rainfall ?>
		<td data-name="Apr_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_Apr_rainfall" class="form-group tbl_sms_monthly_Apr_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_Apr_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->Apr_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->Apr_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_Apr_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_Apr_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->Apr_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->May_rainfall->Visible) { // May_rainfall ?>
		<td data-name="May_rainfall">
<span id="el$rowindex$_tbl_sms_monthly_May_rainfall" class="form-group tbl_sms_monthly_May_rainfall">
<input type="text" data-table="tbl_sms_monthly" data-field="x_May_rainfall" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" size="8" maxlength="7" value="<?php echo $tbl_sms_monthly_list->May_rainfall->EditValue ?>"<?php echo $tbl_sms_monthly_list->May_rainfall->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_May_rainfall" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_May_rainfall" value="<?php echo HtmlEncode($tbl_sms_monthly_list->May_rainfall->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber">
<?php if (!$Security->isAdmin() && $Security->isLoggedIn() && !$tbl_sms_monthly->userIDAllow($tbl_sms_monthly->CurrentAction)) { // Non system admin ?>
<span id="el$rowindex$_tbl_sms_monthly_SenderMobileNumber" class="form-group tbl_sms_monthly_SenderMobileNumber">
<span<?php echo $tbl_sms_monthly_list->SenderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_list->SenderMobileNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SenderMobileNumber->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_tbl_sms_monthly_SenderMobileNumber" class="form-group tbl_sms_monthly_SenderMobileNumber">
<input type="text" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" size="15" maxlength="25" value="<?php echo $tbl_sms_monthly_list->SenderMobileNumber->EditValue ?>"<?php echo $tbl_sms_monthly_list->SenderMobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SenderMobileNumber" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SenderMobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->IsChanged->Visible) { // IsChanged ?>
		<td data-name="IsChanged">
<span id="el$rowindex$_tbl_sms_monthly_IsChanged" class="form-group tbl_sms_monthly_IsChanged">
<input type="text" data-table="tbl_sms_monthly" data-field="x_IsChanged" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" size="10" maxlength="1" value="<?php echo $tbl_sms_monthly_list->IsChanged->EditValue ?>"<?php echo $tbl_sms_monthly_list->IsChanged->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_IsChanged" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_IsChanged" value="<?php echo HtmlEncode($tbl_sms_monthly_list->IsChanged->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId">
<span id="el$rowindex$_tbl_sms_monthly_SubDivisionId" class="form-group tbl_sms_monthly_SubDivisionId">
<input type="text" data-table="tbl_sms_monthly" data-field="x_SubDivisionId" name="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" id="x<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" size="10" maxlength="11" value="<?php echo $tbl_sms_monthly_list->SubDivisionId->EditValue ?>"<?php echo $tbl_sms_monthly_list->SubDivisionId->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly" data-field="x_SubDivisionId" name="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" id="o<?php echo $tbl_sms_monthly_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($tbl_sms_monthly_list->SubDivisionId->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_sms_monthly_list->ListOptions->render("body", "right", $tbl_sms_monthly_list->RowIndex);
?>
<script>
loadjs.ready(["ftbl_sms_monthlylist", "load"], function() {
	ftbl_sms_monthlylist.updateLists(<?php echo $tbl_sms_monthly_list->RowIndex ?>);
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
<?php if ($tbl_sms_monthly_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $tbl_sms_monthly_list->FormKeyCountName ?>" id="<?php echo $tbl_sms_monthly_list->FormKeyCountName ?>" value="<?php echo $tbl_sms_monthly_list->KeyCount ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $tbl_sms_monthly_list->FormKeyCountName ?>" id="<?php echo $tbl_sms_monthly_list->FormKeyCountName ?>" value="<?php echo $tbl_sms_monthly_list->KeyCount ?>">
<?php echo $tbl_sms_monthly_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$tbl_sms_monthly->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tbl_sms_monthly_list->Recordset)
	$tbl_sms_monthly_list->Recordset->Close();
?>
<?php if (!$tbl_sms_monthly_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tbl_sms_monthly_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_sms_monthly_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_sms_monthly_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tbl_sms_monthly_list->TotalRecords == 0 && !$tbl_sms_monthly->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tbl_sms_monthly_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tbl_sms_monthly_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tbl_sms_monthly_list->isExport()) { ?>
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
$tbl_sms_monthly_list->terminate();
?>