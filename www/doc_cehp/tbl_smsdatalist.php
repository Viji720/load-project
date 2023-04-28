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
$tbl_smsdata_list = new tbl_smsdata_list();

// Run the page
$tbl_smsdata_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_smsdata_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tbl_smsdata_list->isExport()) { ?>
<script>
var ftbl_smsdatalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftbl_smsdatalist = currentForm = new ew.Form("ftbl_smsdatalist", "list");
	ftbl_smsdatalist.formKeyCountName = '<?php echo $tbl_smsdata_list->FormKeyCountName ?>';

	// Validate form
	ftbl_smsdatalist.validate = function() {
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
			<?php if ($tbl_smsdata_list->Slno->Required) { ?>
				elm = this.getElements("x" + infix + "_Slno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->Slno->caption(), $tbl_smsdata_list->Slno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->SMSDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->SMSDateTime->caption(), $tbl_smsdata_list->SMSDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SMSDateTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_list->SMSDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_list->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->StationId->caption(), $tbl_smsdata_list->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->SubDivId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->SubDivId->caption(), $tbl_smsdata_list->SubDivId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->SendDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SendDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->SendDateTime->caption(), $tbl_smsdata_list->SendDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SendDateTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_list->SendDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_list->rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->rainfall->caption(), $tbl_smsdata_list->rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_rainfall");
				if (elm && !ew.checkRange(elm.value, 0.00, 200.00))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_list->rainfall->errorMessage()) ?>");
			<?php if ($tbl_smsdata_list->obsremarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obsremarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->obsremarks->caption(), $tbl_smsdata_list->obsremarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->Status->caption(), $tbl_smsdata_list->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->Validated->Required) { ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->Validated->caption(), $tbl_smsdata_list->Validated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->SenderMobileNumber->caption(), $tbl_smsdata_list->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->IsFirstMsg->Required) { ?>
				elm = this.getElements("x" + infix + "_IsFirstMsg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->IsFirstMsg->caption(), $tbl_smsdata_list->IsFirstMsg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->SMSText->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSText");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->SMSText->caption(), $tbl_smsdata_list->SMSText->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->isFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_isFreeze[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->isFreeze->caption(), $tbl_smsdata_list->isFreeze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_smsdata_list->SystemDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->SystemDateTime->caption(), $tbl_smsdata_list->SystemDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SystemDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_list->SystemDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_list->ConfirmQueryDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ConfirmQueryDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->ConfirmQueryDateTime->caption(), $tbl_smsdata_list->ConfirmQueryDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConfirmQueryDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_list->ConfirmQueryDateTime->errorMessage()) ?>");
			<?php if ($tbl_smsdata_list->ConfirmedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ConfirmedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_smsdata_list->ConfirmedDateTime->caption(), $tbl_smsdata_list->ConfirmedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConfirmedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_list->ConfirmedDateTime->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ftbl_smsdatalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_smsdatalist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_smsdatalist.lists["x_StationId"] = <?php echo $tbl_smsdata_list->StationId->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalist.lists["x_StationId"].options = <?php echo JsonEncode($tbl_smsdata_list->StationId->lookupOptions()) ?>;
	ftbl_smsdatalist.lists["x_SubDivId"] = <?php echo $tbl_smsdata_list->SubDivId->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalist.lists["x_SubDivId"].options = <?php echo JsonEncode($tbl_smsdata_list->SubDivId->lookupOptions()) ?>;
	ftbl_smsdatalist.lists["x_Status"] = <?php echo $tbl_smsdata_list->Status->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalist.lists["x_Status"].options = <?php echo JsonEncode($tbl_smsdata_list->Status->lookupOptions()) ?>;
	ftbl_smsdatalist.lists["x_Validated"] = <?php echo $tbl_smsdata_list->Validated->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalist.lists["x_Validated"].options = <?php echo JsonEncode($tbl_smsdata_list->Validated->lookupOptions()) ?>;
	ftbl_smsdatalist.lists["x_IsFirstMsg"] = <?php echo $tbl_smsdata_list->IsFirstMsg->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalist.lists["x_IsFirstMsg"].options = <?php echo JsonEncode($tbl_smsdata_list->IsFirstMsg->lookupOptions()) ?>;
	ftbl_smsdatalist.lists["x_isFreeze[]"] = <?php echo $tbl_smsdata_list->isFreeze->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalist.lists["x_isFreeze[]"].options = <?php echo JsonEncode($tbl_smsdata_list->isFreeze->options(FALSE, TRUE)) ?>;
	loadjs.done("ftbl_smsdatalist");
});
var ftbl_smsdatalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftbl_smsdatalistsrch = currentSearchForm = new ew.Form("ftbl_smsdatalistsrch");

	// Validate function for search
	ftbl_smsdatalistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_rainfall");
		if (elm && !ew.checkRange(elm.value, 0.00, 200.00))
			return this.onError(elm, "<?php echo JsEncode($tbl_smsdata_list->rainfall->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ftbl_smsdatalistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_smsdatalistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_smsdatalistsrch.lists["x_StationId"] = <?php echo $tbl_smsdata_list->StationId->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalistsrch.lists["x_StationId"].options = <?php echo JsonEncode($tbl_smsdata_list->StationId->lookupOptions()) ?>;
	ftbl_smsdatalistsrch.lists["x_SubDivId"] = <?php echo $tbl_smsdata_list->SubDivId->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalistsrch.lists["x_SubDivId"].options = <?php echo JsonEncode($tbl_smsdata_list->SubDivId->lookupOptions()) ?>;
	ftbl_smsdatalistsrch.lists["x_Status"] = <?php echo $tbl_smsdata_list->Status->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalistsrch.lists["x_Status"].options = <?php echo JsonEncode($tbl_smsdata_list->Status->lookupOptions()) ?>;
	ftbl_smsdatalistsrch.lists["x_Validated"] = <?php echo $tbl_smsdata_list->Validated->Lookup->toClientList($tbl_smsdata_list) ?>;
	ftbl_smsdatalistsrch.lists["x_Validated"].options = <?php echo JsonEncode($tbl_smsdata_list->Validated->lookupOptions()) ?>;

	// Filters
	ftbl_smsdatalistsrch.filterList = <?php echo $tbl_smsdata_list->getFilterList() ?>;
	loadjs.done("ftbl_smsdatalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tbl_smsdata_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tbl_smsdata_list->TotalRecords > 0 && $tbl_smsdata_list->ExportOptions->visible()) { ?>
<?php $tbl_smsdata_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_smsdata_list->ImportOptions->visible()) { ?>
<?php $tbl_smsdata_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_smsdata_list->SearchOptions->visible()) { ?>
<?php $tbl_smsdata_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_smsdata_list->FilterOptions->visible()) { ?>
<?php $tbl_smsdata_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tbl_smsdata_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tbl_smsdata_list->isExport() && !$tbl_smsdata->CurrentAction) { ?>
<form name="ftbl_smsdatalistsrch" id="ftbl_smsdatalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftbl_smsdatalistsrch-search-panel" class="<?php echo $tbl_smsdata_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tbl_smsdata">
	<div class="ew-extended-search">
<?php

// Render search row
$tbl_smsdata->RowType = ROWTYPE_SEARCH;
$tbl_smsdata->resetAttributes();
$tbl_smsdata_list->renderRow();
?>
<?php if ($tbl_smsdata_list->StationId->Visible) { // StationId ?>
	<?php
		$tbl_smsdata_list->SearchColumnCount++;
		if (($tbl_smsdata_list->SearchColumnCount - 1) % $tbl_smsdata_list->SearchFieldsPerRow == 0) {
			$tbl_smsdata_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_smsdata_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationId" class="ew-cell form-group">
		<label for="x_StationId" class="ew-search-caption ew-label"><?php echo $tbl_smsdata_list->StationId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_StationId" id="z_StationId" value="=">
</span>
		<span id="el_tbl_smsdata_StationId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_StationId" data-value-separator="<?php echo $tbl_smsdata_list->StationId->displayValueSeparatorAttribute() ?>" id="x_StationId" name="x_StationId"<?php echo $tbl_smsdata_list->StationId->editAttributes() ?>>
			<?php echo $tbl_smsdata_list->StationId->selectOptionListHtml("x_StationId") ?>
		</select>
</div>
<?php echo $tbl_smsdata_list->StationId->Lookup->getParamTag($tbl_smsdata_list, "p_x_StationId") ?>
</span>
	</div>
	<?php if ($tbl_smsdata_list->SearchColumnCount % $tbl_smsdata_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->SubDivId->Visible) { // SubDivId ?>
	<?php
		$tbl_smsdata_list->SearchColumnCount++;
		if (($tbl_smsdata_list->SearchColumnCount - 1) % $tbl_smsdata_list->SearchFieldsPerRow == 0) {
			$tbl_smsdata_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_smsdata_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SubDivId" class="ew-cell form-group">
		<label for="x_SubDivId" class="ew-search-caption ew-label"><?php echo $tbl_smsdata_list->SubDivId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubDivId" id="z_SubDivId" value="=">
</span>
		<span id="el_tbl_smsdata_SubDivId" class="ew-search-field">
<?php $tbl_smsdata_list->SubDivId->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_SubDivId" data-value-separator="<?php echo $tbl_smsdata_list->SubDivId->displayValueSeparatorAttribute() ?>" id="x_SubDivId" name="x_SubDivId"<?php echo $tbl_smsdata_list->SubDivId->editAttributes() ?>>
			<?php echo $tbl_smsdata_list->SubDivId->selectOptionListHtml("x_SubDivId") ?>
		</select>
</div>
<?php echo $tbl_smsdata_list->SubDivId->Lookup->getParamTag($tbl_smsdata_list, "p_x_SubDivId") ?>
</span>
	</div>
	<?php if ($tbl_smsdata_list->SearchColumnCount % $tbl_smsdata_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->rainfall->Visible) { // rainfall ?>
	<?php
		$tbl_smsdata_list->SearchColumnCount++;
		if (($tbl_smsdata_list->SearchColumnCount - 1) % $tbl_smsdata_list->SearchFieldsPerRow == 0) {
			$tbl_smsdata_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_smsdata_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_rainfall" class="ew-cell form-group">
		<label for="x_rainfall" class="ew-search-caption ew-label"><?php echo $tbl_smsdata_list->rainfall->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_rainfall" id="z_rainfall" value="BETWEEN">
</span>
		<span id="el_tbl_smsdata_rainfall" class="ew-search-field">
<input type="text" data-table="tbl_smsdata" data-field="x_rainfall" name="x_rainfall" id="x_rainfall" size="30" maxlength="7" value="<?php echo $tbl_smsdata_list->rainfall->EditValue ?>"<?php echo $tbl_smsdata_list->rainfall->editAttributes() ?>>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_tbl_smsdata_rainfall" class="ew-search-field2">
<input type="text" data-table="tbl_smsdata" data-field="x_rainfall" name="y_rainfall" id="y_rainfall" size="30" maxlength="7" value="<?php echo $tbl_smsdata_list->rainfall->EditValue2 ?>"<?php echo $tbl_smsdata_list->rainfall->editAttributes() ?>>
</span>
	</div>
	<?php if ($tbl_smsdata_list->SearchColumnCount % $tbl_smsdata_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->Status->Visible) { // Status ?>
	<?php
		$tbl_smsdata_list->SearchColumnCount++;
		if (($tbl_smsdata_list->SearchColumnCount - 1) % $tbl_smsdata_list->SearchFieldsPerRow == 0) {
			$tbl_smsdata_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_smsdata_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Status" class="ew-cell form-group">
		<label for="x_Status" class="ew-search-caption ew-label"><?php echo $tbl_smsdata_list->Status->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Status" id="z_Status" value="=">
</span>
		<span id="el_tbl_smsdata_Status" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_Status" data-value-separator="<?php echo $tbl_smsdata_list->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $tbl_smsdata_list->Status->editAttributes() ?>>
			<?php echo $tbl_smsdata_list->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
<?php echo $tbl_smsdata_list->Status->Lookup->getParamTag($tbl_smsdata_list, "p_x_Status") ?>
</span>
	</div>
	<?php if ($tbl_smsdata_list->SearchColumnCount % $tbl_smsdata_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->Validated->Visible) { // Validated ?>
	<?php
		$tbl_smsdata_list->SearchColumnCount++;
		if (($tbl_smsdata_list->SearchColumnCount - 1) % $tbl_smsdata_list->SearchFieldsPerRow == 0) {
			$tbl_smsdata_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_smsdata_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Validated" class="ew-cell form-group">
		<label for="x_Validated" class="ew-search-caption ew-label"><?php echo $tbl_smsdata_list->Validated->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Validated" id="z_Validated" value="=">
</span>
		<span id="el_tbl_smsdata_Validated" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_Validated" data-value-separator="<?php echo $tbl_smsdata_list->Validated->displayValueSeparatorAttribute() ?>" id="x_Validated" name="x_Validated"<?php echo $tbl_smsdata_list->Validated->editAttributes() ?>>
			<?php echo $tbl_smsdata_list->Validated->selectOptionListHtml("x_Validated") ?>
		</select>
</div>
<?php echo $tbl_smsdata_list->Validated->Lookup->getParamTag($tbl_smsdata_list, "p_x_Validated") ?>
</span>
	</div>
	<?php if ($tbl_smsdata_list->SearchColumnCount % $tbl_smsdata_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($tbl_smsdata_list->SearchColumnCount % $tbl_smsdata_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $tbl_smsdata_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tbl_smsdata_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tbl_smsdata_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tbl_smsdata_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tbl_smsdata_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tbl_smsdata_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tbl_smsdata_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tbl_smsdata_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tbl_smsdata_list->showPageHeader(); ?>
<?php
$tbl_smsdata_list->showMessage();
?>
<?php if ($tbl_smsdata_list->TotalRecords > 0 || $tbl_smsdata->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tbl_smsdata_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tbl_smsdata">
<?php if (!$tbl_smsdata_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tbl_smsdata_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_smsdata_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_smsdata_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftbl_smsdatalist" id="ftbl_smsdatalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_smsdata">
<div id="gmp_tbl_smsdata" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tbl_smsdata_list->TotalRecords > 0 || $tbl_smsdata_list->isGridEdit()) { ?>
<table id="tbl_tbl_smsdatalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tbl_smsdata->RowType = ROWTYPE_HEADER;

// Render list options
$tbl_smsdata_list->renderListOptions();

// Render list options (header, left)
$tbl_smsdata_list->ListOptions->render("header", "left");
?>
<?php if ($tbl_smsdata_list->Slno->Visible) { // Slno ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->Slno) == "") { ?>
		<th data-name="Slno" class="<?php echo $tbl_smsdata_list->Slno->headerCellClass() ?>"><div id="elh_tbl_smsdata_Slno" class="tbl_smsdata_Slno"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->Slno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Slno" class="<?php echo $tbl_smsdata_list->Slno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->Slno) ?>', 2);"><div id="elh_tbl_smsdata_Slno" class="tbl_smsdata_Slno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->Slno->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->Slno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->Slno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->SMSDateTime->Visible) { // SMSDateTime ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->SMSDateTime) == "") { ?>
		<th data-name="SMSDateTime" class="<?php echo $tbl_smsdata_list->SMSDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_SMSDateTime" class="tbl_smsdata_SMSDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SMSDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSDateTime" class="<?php echo $tbl_smsdata_list->SMSDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->SMSDateTime) ?>', 2);"><div id="elh_tbl_smsdata_SMSDateTime" class="tbl_smsdata_SMSDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SMSDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->SMSDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->SMSDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->StationId->Visible) { // StationId ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $tbl_smsdata_list->StationId->headerCellClass() ?>"><div id="elh_tbl_smsdata_StationId" class="tbl_smsdata_StationId"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $tbl_smsdata_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->StationId) ?>', 2);"><div id="elh_tbl_smsdata_StationId" class="tbl_smsdata_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->SubDivId->Visible) { // SubDivId ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->SubDivId) == "") { ?>
		<th data-name="SubDivId" class="<?php echo $tbl_smsdata_list->SubDivId->headerCellClass() ?>"><div id="elh_tbl_smsdata_SubDivId" class="tbl_smsdata_SubDivId"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SubDivId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivId" class="<?php echo $tbl_smsdata_list->SubDivId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->SubDivId) ?>', 2);"><div id="elh_tbl_smsdata_SubDivId" class="tbl_smsdata_SubDivId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SubDivId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->SubDivId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->SubDivId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->SendDateTime->Visible) { // SendDateTime ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->SendDateTime) == "") { ?>
		<th data-name="SendDateTime" class="<?php echo $tbl_smsdata_list->SendDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_SendDateTime" class="tbl_smsdata_SendDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SendDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SendDateTime" class="<?php echo $tbl_smsdata_list->SendDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->SendDateTime) ?>', 2);"><div id="elh_tbl_smsdata_SendDateTime" class="tbl_smsdata_SendDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SendDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->SendDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->SendDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->rainfall->Visible) { // rainfall ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->rainfall) == "") { ?>
		<th data-name="rainfall" class="<?php echo $tbl_smsdata_list->rainfall->headerCellClass() ?>"><div id="elh_tbl_smsdata_rainfall" class="tbl_smsdata_rainfall"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->rainfall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rainfall" class="<?php echo $tbl_smsdata_list->rainfall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->rainfall) ?>', 2);"><div id="elh_tbl_smsdata_rainfall" class="tbl_smsdata_rainfall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->rainfall->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->rainfall->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->rainfall->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->obsremarks->Visible) { // obsremarks ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->obsremarks) == "") { ?>
		<th data-name="obsremarks" class="<?php echo $tbl_smsdata_list->obsremarks->headerCellClass() ?>"><div id="elh_tbl_smsdata_obsremarks" class="tbl_smsdata_obsremarks"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->obsremarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obsremarks" class="<?php echo $tbl_smsdata_list->obsremarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->obsremarks) ?>', 2);"><div id="elh_tbl_smsdata_obsremarks" class="tbl_smsdata_obsremarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->obsremarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->obsremarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->obsremarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->Status->Visible) { // Status ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $tbl_smsdata_list->Status->headerCellClass() ?>"><div id="elh_tbl_smsdata_Status" class="tbl_smsdata_Status"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $tbl_smsdata_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->Status) ?>', 2);"><div id="elh_tbl_smsdata_Status" class="tbl_smsdata_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->Validated->Visible) { // Validated ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->Validated) == "") { ?>
		<th data-name="Validated" class="<?php echo $tbl_smsdata_list->Validated->headerCellClass() ?>"><div id="elh_tbl_smsdata_Validated" class="tbl_smsdata_Validated"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->Validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Validated" class="<?php echo $tbl_smsdata_list->Validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->Validated) ?>', 2);"><div id="elh_tbl_smsdata_Validated" class="tbl_smsdata_Validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->Validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->Validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->Validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->SenderMobileNumber) == "") { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $tbl_smsdata_list->SenderMobileNumber->headerCellClass() ?>"><div id="elh_tbl_smsdata_SenderMobileNumber" class="tbl_smsdata_SenderMobileNumber"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SenderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $tbl_smsdata_list->SenderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->SenderMobileNumber) ?>', 2);"><div id="elh_tbl_smsdata_SenderMobileNumber" class="tbl_smsdata_SenderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SenderMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->SenderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->SenderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->IsFirstMsg->Visible) { // IsFirstMsg ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->IsFirstMsg) == "") { ?>
		<th data-name="IsFirstMsg" class="<?php echo $tbl_smsdata_list->IsFirstMsg->headerCellClass() ?>"><div id="elh_tbl_smsdata_IsFirstMsg" class="tbl_smsdata_IsFirstMsg"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->IsFirstMsg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsFirstMsg" class="<?php echo $tbl_smsdata_list->IsFirstMsg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->IsFirstMsg) ?>', 2);"><div id="elh_tbl_smsdata_IsFirstMsg" class="tbl_smsdata_IsFirstMsg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->IsFirstMsg->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->IsFirstMsg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->IsFirstMsg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->SMSText->Visible) { // SMSText ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->SMSText) == "") { ?>
		<th data-name="SMSText" class="<?php echo $tbl_smsdata_list->SMSText->headerCellClass() ?>"><div id="elh_tbl_smsdata_SMSText" class="tbl_smsdata_SMSText"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SMSText->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSText" class="<?php echo $tbl_smsdata_list->SMSText->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->SMSText) ?>', 2);"><div id="elh_tbl_smsdata_SMSText" class="tbl_smsdata_SMSText">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SMSText->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->SMSText->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->SMSText->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->isFreeze->Visible) { // isFreeze ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->isFreeze) == "") { ?>
		<th data-name="isFreeze" class="<?php echo $tbl_smsdata_list->isFreeze->headerCellClass() ?>"><div id="elh_tbl_smsdata_isFreeze" class="tbl_smsdata_isFreeze"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->isFreeze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isFreeze" class="<?php echo $tbl_smsdata_list->isFreeze->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->isFreeze) ?>', 2);"><div id="elh_tbl_smsdata_isFreeze" class="tbl_smsdata_isFreeze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->isFreeze->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->isFreeze->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->isFreeze->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->SystemDateTime->Visible) { // SystemDateTime ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->SystemDateTime) == "") { ?>
		<th data-name="SystemDateTime" class="<?php echo $tbl_smsdata_list->SystemDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_SystemDateTime" class="tbl_smsdata_SystemDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SystemDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SystemDateTime" class="<?php echo $tbl_smsdata_list->SystemDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->SystemDateTime) ?>', 2);"><div id="elh_tbl_smsdata_SystemDateTime" class="tbl_smsdata_SystemDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->SystemDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->SystemDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->SystemDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->ConfirmQueryDateTime) == "") { ?>
		<th data-name="ConfirmQueryDateTime" class="<?php echo $tbl_smsdata_list->ConfirmQueryDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_ConfirmQueryDateTime" class="tbl_smsdata_ConfirmQueryDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->ConfirmQueryDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConfirmQueryDateTime" class="<?php echo $tbl_smsdata_list->ConfirmQueryDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->ConfirmQueryDateTime) ?>', 2);"><div id="elh_tbl_smsdata_ConfirmQueryDateTime" class="tbl_smsdata_ConfirmQueryDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->ConfirmQueryDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->ConfirmQueryDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->ConfirmQueryDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_smsdata_list->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
	<?php if ($tbl_smsdata_list->SortUrl($tbl_smsdata_list->ConfirmedDateTime) == "") { ?>
		<th data-name="ConfirmedDateTime" class="<?php echo $tbl_smsdata_list->ConfirmedDateTime->headerCellClass() ?>"><div id="elh_tbl_smsdata_ConfirmedDateTime" class="tbl_smsdata_ConfirmedDateTime"><div class="ew-table-header-caption"><?php echo $tbl_smsdata_list->ConfirmedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConfirmedDateTime" class="<?php echo $tbl_smsdata_list->ConfirmedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_smsdata_list->SortUrl($tbl_smsdata_list->ConfirmedDateTime) ?>', 2);"><div id="elh_tbl_smsdata_ConfirmedDateTime" class="tbl_smsdata_ConfirmedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_smsdata_list->ConfirmedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_smsdata_list->ConfirmedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_smsdata_list->ConfirmedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tbl_smsdata_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tbl_smsdata_list->ExportAll && $tbl_smsdata_list->isExport()) {
	$tbl_smsdata_list->StopRecord = $tbl_smsdata_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tbl_smsdata_list->TotalRecords > $tbl_smsdata_list->StartRecord + $tbl_smsdata_list->DisplayRecords - 1)
		$tbl_smsdata_list->StopRecord = $tbl_smsdata_list->StartRecord + $tbl_smsdata_list->DisplayRecords - 1;
	else
		$tbl_smsdata_list->StopRecord = $tbl_smsdata_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($tbl_smsdata->isConfirm() || $tbl_smsdata_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($tbl_smsdata_list->FormKeyCountName) && ($tbl_smsdata_list->isGridAdd() || $tbl_smsdata_list->isGridEdit() || $tbl_smsdata->isConfirm())) {
		$tbl_smsdata_list->KeyCount = $CurrentForm->getValue($tbl_smsdata_list->FormKeyCountName);
		$tbl_smsdata_list->StopRecord = $tbl_smsdata_list->StartRecord + $tbl_smsdata_list->KeyCount - 1;
	}
}
$tbl_smsdata_list->RecordCount = $tbl_smsdata_list->StartRecord - 1;
if ($tbl_smsdata_list->Recordset && !$tbl_smsdata_list->Recordset->EOF) {
	$tbl_smsdata_list->Recordset->moveFirst();
	$selectLimit = $tbl_smsdata_list->UseSelectLimit;
	if (!$selectLimit && $tbl_smsdata_list->StartRecord > 1)
		$tbl_smsdata_list->Recordset->move($tbl_smsdata_list->StartRecord - 1);
} elseif (!$tbl_smsdata->AllowAddDeleteRow && $tbl_smsdata_list->StopRecord == 0) {
	$tbl_smsdata_list->StopRecord = $tbl_smsdata->GridAddRowCount;
}

// Initialize aggregate
$tbl_smsdata->RowType = ROWTYPE_AGGREGATEINIT;
$tbl_smsdata->resetAttributes();
$tbl_smsdata_list->renderRow();
$tbl_smsdata_list->EditRowCount = 0;
if ($tbl_smsdata_list->isEdit())
	$tbl_smsdata_list->RowIndex = 1;
while ($tbl_smsdata_list->RecordCount < $tbl_smsdata_list->StopRecord) {
	$tbl_smsdata_list->RecordCount++;
	if ($tbl_smsdata_list->RecordCount >= $tbl_smsdata_list->StartRecord) {
		$tbl_smsdata_list->RowCount++;

		// Set up key count
		$tbl_smsdata_list->KeyCount = $tbl_smsdata_list->RowIndex;

		// Init row class and style
		$tbl_smsdata->resetAttributes();
		$tbl_smsdata->CssClass = "";
		if ($tbl_smsdata_list->isGridAdd()) {
			$tbl_smsdata_list->loadRowValues(); // Load default values
		} else {
			$tbl_smsdata_list->loadRowValues($tbl_smsdata_list->Recordset); // Load row values
		}
		$tbl_smsdata->RowType = ROWTYPE_VIEW; // Render view
		if ($tbl_smsdata_list->isEdit()) {
			if ($tbl_smsdata_list->checkInlineEditKey() && $tbl_smsdata_list->EditRowCount == 0) { // Inline edit
				$tbl_smsdata->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($tbl_smsdata_list->isEdit() && $tbl_smsdata->RowType == ROWTYPE_EDIT && $tbl_smsdata->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$tbl_smsdata_list->restoreFormValues(); // Restore form values
		}
		if ($tbl_smsdata->RowType == ROWTYPE_EDIT) // Edit row
			$tbl_smsdata_list->EditRowCount++;

		// Set up row id / data-rowindex
		$tbl_smsdata->RowAttrs->merge(["data-rowindex" => $tbl_smsdata_list->RowCount, "id" => "r" . $tbl_smsdata_list->RowCount . "_tbl_smsdata", "data-rowtype" => $tbl_smsdata->RowType]);

		// Render row
		$tbl_smsdata_list->renderRow();

		// Render list options
		$tbl_smsdata_list->renderListOptions();
?>
	<tr <?php echo $tbl_smsdata->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_smsdata_list->ListOptions->render("body", "left", $tbl_smsdata_list->RowCount);
?>
	<?php if ($tbl_smsdata_list->Slno->Visible) { // Slno ?>
		<td data-name="Slno" <?php echo $tbl_smsdata_list->Slno->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_Slno" class="form-group">
<span<?php echo $tbl_smsdata_list->Slno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_smsdata_list->Slno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_smsdata" data-field="x_Slno" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_Slno" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_smsdata_list->Slno->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_Slno">
<span<?php echo $tbl_smsdata_list->Slno->viewAttributes() ?>><?php echo $tbl_smsdata_list->Slno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->SMSDateTime->Visible) { // SMSDateTime ?>
		<td data-name="SMSDateTime" <?php echo $tbl_smsdata_list->SMSDateTime->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SMSDateTime" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_SMSDateTime" data-format="7" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_SMSDateTime" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_SMSDateTime" maxlength="19" value="<?php echo $tbl_smsdata_list->SMSDateTime->EditValue ?>"<?php echo $tbl_smsdata_list->SMSDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_list->SMSDateTime->ReadOnly && !$tbl_smsdata_list->SMSDateTime->Disabled && !isset($tbl_smsdata_list->SMSDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_list->SMSDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdatalist", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdatalist", "x<?php echo $tbl_smsdata_list->RowIndex ?>_SMSDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SMSDateTime">
<span<?php echo $tbl_smsdata_list->SMSDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_list->SMSDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $tbl_smsdata_list->StationId->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_StationId" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_StationId" data-value-separator="<?php echo $tbl_smsdata_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_StationId" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_StationId"<?php echo $tbl_smsdata_list->StationId->editAttributes() ?>>
			<?php echo $tbl_smsdata_list->StationId->selectOptionListHtml("x{$tbl_smsdata_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $tbl_smsdata_list->StationId->Lookup->getParamTag($tbl_smsdata_list, "p_x" . $tbl_smsdata_list->RowIndex . "_StationId") ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_StationId">
<span<?php echo $tbl_smsdata_list->StationId->viewAttributes() ?>><?php echo $tbl_smsdata_list->StationId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->SubDivId->Visible) { // SubDivId ?>
		<td data-name="SubDivId" <?php echo $tbl_smsdata_list->SubDivId->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SubDivId" class="form-group">
<?php $tbl_smsdata_list->SubDivId->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_SubDivId" data-value-separator="<?php echo $tbl_smsdata_list->SubDivId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_SubDivId" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_SubDivId"<?php echo $tbl_smsdata_list->SubDivId->editAttributes() ?>>
			<?php echo $tbl_smsdata_list->SubDivId->selectOptionListHtml("x{$tbl_smsdata_list->RowIndex}_SubDivId") ?>
		</select>
</div>
<?php echo $tbl_smsdata_list->SubDivId->Lookup->getParamTag($tbl_smsdata_list, "p_x" . $tbl_smsdata_list->RowIndex . "_SubDivId") ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SubDivId">
<span<?php echo $tbl_smsdata_list->SubDivId->viewAttributes() ?>><?php echo $tbl_smsdata_list->SubDivId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->SendDateTime->Visible) { // SendDateTime ?>
		<td data-name="SendDateTime" <?php echo $tbl_smsdata_list->SendDateTime->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SendDateTime" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_SendDateTime" data-format="7" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_SendDateTime" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_SendDateTime" maxlength="19" value="<?php echo $tbl_smsdata_list->SendDateTime->EditValue ?>"<?php echo $tbl_smsdata_list->SendDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_list->SendDateTime->ReadOnly && !$tbl_smsdata_list->SendDateTime->Disabled && !isset($tbl_smsdata_list->SendDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_list->SendDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdatalist", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdatalist", "x<?php echo $tbl_smsdata_list->RowIndex ?>_SendDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SendDateTime">
<span<?php echo $tbl_smsdata_list->SendDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_list->SendDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->rainfall->Visible) { // rainfall ?>
		<td data-name="rainfall" <?php echo $tbl_smsdata_list->rainfall->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_rainfall" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_rainfall" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_rainfall" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_rainfall" size="30" maxlength="7" value="<?php echo $tbl_smsdata_list->rainfall->EditValue ?>"<?php echo $tbl_smsdata_list->rainfall->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_rainfall">
<span<?php echo $tbl_smsdata_list->rainfall->viewAttributes() ?>><?php echo $tbl_smsdata_list->rainfall->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->obsremarks->Visible) { // obsremarks ?>
		<td data-name="obsremarks" <?php echo $tbl_smsdata_list->obsremarks->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_obsremarks" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_obsremarks" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_obsremarks" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_obsremarks" size="30" maxlength="50" value="<?php echo $tbl_smsdata_list->obsremarks->EditValue ?>"<?php echo $tbl_smsdata_list->obsremarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_obsremarks">
<span<?php echo $tbl_smsdata_list->obsremarks->viewAttributes() ?>><?php echo $tbl_smsdata_list->obsremarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $tbl_smsdata_list->Status->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_Status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_Status" data-value-separator="<?php echo $tbl_smsdata_list->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_Status" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_Status"<?php echo $tbl_smsdata_list->Status->editAttributes() ?>>
			<?php echo $tbl_smsdata_list->Status->selectOptionListHtml("x{$tbl_smsdata_list->RowIndex}_Status") ?>
		</select>
</div>
<?php echo $tbl_smsdata_list->Status->Lookup->getParamTag($tbl_smsdata_list, "p_x" . $tbl_smsdata_list->RowIndex . "_Status") ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_Status">
<span<?php echo $tbl_smsdata_list->Status->viewAttributes() ?>><?php echo $tbl_smsdata_list->Status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->Validated->Visible) { // Validated ?>
		<td data-name="Validated" <?php echo $tbl_smsdata_list->Validated->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_Validated" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_smsdata" data-field="x_Validated" data-value-separator="<?php echo $tbl_smsdata_list->Validated->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_Validated" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_Validated"<?php echo $tbl_smsdata_list->Validated->editAttributes() ?>>
			<?php echo $tbl_smsdata_list->Validated->selectOptionListHtml("x{$tbl_smsdata_list->RowIndex}_Validated") ?>
		</select>
</div>
<?php echo $tbl_smsdata_list->Validated->Lookup->getParamTag($tbl_smsdata_list, "p_x" . $tbl_smsdata_list->RowIndex . "_Validated") ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_Validated">
<span<?php echo $tbl_smsdata_list->Validated->viewAttributes() ?>><?php echo $tbl_smsdata_list->Validated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber" <?php echo $tbl_smsdata_list->SenderMobileNumber->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SenderMobileNumber" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_SenderMobileNumber" size="30" maxlength="25" value="<?php echo $tbl_smsdata_list->SenderMobileNumber->EditValue ?>"<?php echo $tbl_smsdata_list->SenderMobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SenderMobileNumber">
<span<?php echo $tbl_smsdata_list->SenderMobileNumber->viewAttributes() ?>><?php echo $tbl_smsdata_list->SenderMobileNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->IsFirstMsg->Visible) { // IsFirstMsg ?>
		<td data-name="IsFirstMsg" <?php echo $tbl_smsdata_list->IsFirstMsg->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_IsFirstMsg" class="form-group">
<div id="tp_x<?php echo $tbl_smsdata_list->RowIndex ?>_IsFirstMsg" class="ew-template"><input type="radio" class="custom-control-input" data-table="tbl_smsdata" data-field="x_IsFirstMsg" data-value-separator="<?php echo $tbl_smsdata_list->IsFirstMsg->displayValueSeparatorAttribute() ?>" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_IsFirstMsg" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_IsFirstMsg" value="{value}"<?php echo $tbl_smsdata_list->IsFirstMsg->editAttributes() ?>></div>
<div id="dsl_x<?php echo $tbl_smsdata_list->RowIndex ?>_IsFirstMsg" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $tbl_smsdata_list->IsFirstMsg->radioButtonListHtml(FALSE, "x{$tbl_smsdata_list->RowIndex}_IsFirstMsg") ?>
</div></div>
<?php echo $tbl_smsdata_list->IsFirstMsg->Lookup->getParamTag($tbl_smsdata_list, "p_x" . $tbl_smsdata_list->RowIndex . "_IsFirstMsg") ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_IsFirstMsg">
<span<?php echo $tbl_smsdata_list->IsFirstMsg->viewAttributes() ?>><?php echo $tbl_smsdata_list->IsFirstMsg->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->SMSText->Visible) { // SMSText ?>
		<td data-name="SMSText" <?php echo $tbl_smsdata_list->SMSText->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SMSText" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_SMSText" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_SMSText" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_SMSText" size="30" maxlength="50" value="<?php echo $tbl_smsdata_list->SMSText->EditValue ?>"<?php echo $tbl_smsdata_list->SMSText->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SMSText">
<span<?php echo $tbl_smsdata_list->SMSText->viewAttributes() ?>><?php echo $tbl_smsdata_list->SMSText->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->isFreeze->Visible) { // isFreeze ?>
		<td data-name="isFreeze" <?php echo $tbl_smsdata_list->isFreeze->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_isFreeze" class="form-group">
<?php
$selwrk = ConvertToBool($tbl_smsdata_list->isFreeze->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="tbl_smsdata" data-field="x_isFreeze" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_isFreeze[]" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_isFreeze[]_169283" value="1"<?php echo $selwrk ?><?php echo $tbl_smsdata_list->isFreeze->editAttributes() ?>>
	<label class="custom-control-label" for="x<?php echo $tbl_smsdata_list->RowIndex ?>_isFreeze[]_169283"></label>
</div>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_isFreeze">
<span<?php echo $tbl_smsdata_list->isFreeze->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_isFreeze" class="custom-control-input" value="<?php echo $tbl_smsdata_list->isFreeze->getViewValue() ?>" disabled<?php if (ConvertToBool($tbl_smsdata_list->isFreeze->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_isFreeze"></label></div></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->SystemDateTime->Visible) { // SystemDateTime ?>
		<td data-name="SystemDateTime" <?php echo $tbl_smsdata_list->SystemDateTime->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SystemDateTime" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_SystemDateTime" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_SystemDateTime" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_SystemDateTime" maxlength="19" value="<?php echo $tbl_smsdata_list->SystemDateTime->EditValue ?>"<?php echo $tbl_smsdata_list->SystemDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_list->SystemDateTime->ReadOnly && !$tbl_smsdata_list->SystemDateTime->Disabled && !isset($tbl_smsdata_list->SystemDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_list->SystemDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdatalist", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdatalist", "x<?php echo $tbl_smsdata_list->RowIndex ?>_SystemDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_SystemDateTime">
<span<?php echo $tbl_smsdata_list->SystemDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_list->SystemDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->ConfirmQueryDateTime->Visible) { // ConfirmQueryDateTime ?>
		<td data-name="ConfirmQueryDateTime" <?php echo $tbl_smsdata_list->ConfirmQueryDateTime->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_ConfirmQueryDateTime" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_ConfirmQueryDateTime" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_ConfirmQueryDateTime" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_ConfirmQueryDateTime" maxlength="19" value="<?php echo $tbl_smsdata_list->ConfirmQueryDateTime->EditValue ?>"<?php echo $tbl_smsdata_list->ConfirmQueryDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_list->ConfirmQueryDateTime->ReadOnly && !$tbl_smsdata_list->ConfirmQueryDateTime->Disabled && !isset($tbl_smsdata_list->ConfirmQueryDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_list->ConfirmQueryDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdatalist", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdatalist", "x<?php echo $tbl_smsdata_list->RowIndex ?>_ConfirmQueryDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_ConfirmQueryDateTime">
<span<?php echo $tbl_smsdata_list->ConfirmQueryDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_list->ConfirmQueryDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_smsdata_list->ConfirmedDateTime->Visible) { // ConfirmedDateTime ?>
		<td data-name="ConfirmedDateTime" <?php echo $tbl_smsdata_list->ConfirmedDateTime->cellAttributes() ?>>
<?php if ($tbl_smsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_ConfirmedDateTime" class="form-group">
<input type="text" data-table="tbl_smsdata" data-field="x_ConfirmedDateTime" name="x<?php echo $tbl_smsdata_list->RowIndex ?>_ConfirmedDateTime" id="x<?php echo $tbl_smsdata_list->RowIndex ?>_ConfirmedDateTime" maxlength="19" value="<?php echo $tbl_smsdata_list->ConfirmedDateTime->EditValue ?>"<?php echo $tbl_smsdata_list->ConfirmedDateTime->editAttributes() ?>>
<?php if (!$tbl_smsdata_list->ConfirmedDateTime->ReadOnly && !$tbl_smsdata_list->ConfirmedDateTime->Disabled && !isset($tbl_smsdata_list->ConfirmedDateTime->EditAttrs["readonly"]) && !isset($tbl_smsdata_list->ConfirmedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_smsdatalist", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_smsdatalist", "x<?php echo $tbl_smsdata_list->RowIndex ?>_ConfirmedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($tbl_smsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_smsdata_list->RowCount ?>_tbl_smsdata_ConfirmedDateTime">
<span<?php echo $tbl_smsdata_list->ConfirmedDateTime->viewAttributes() ?>><?php echo $tbl_smsdata_list->ConfirmedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_smsdata_list->ListOptions->render("body", "right", $tbl_smsdata_list->RowCount);
?>
	</tr>
<?php if ($tbl_smsdata->RowType == ROWTYPE_ADD || $tbl_smsdata->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ftbl_smsdatalist", "load"], function() {
	ftbl_smsdatalist.updateLists(<?php echo $tbl_smsdata_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	if (!$tbl_smsdata_list->isGridAdd())
		$tbl_smsdata_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($tbl_smsdata_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $tbl_smsdata_list->FormKeyCountName ?>" id="<?php echo $tbl_smsdata_list->FormKeyCountName ?>" value="<?php echo $tbl_smsdata_list->KeyCount ?>">
<?php } ?>
<?php if (!$tbl_smsdata->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tbl_smsdata_list->Recordset)
	$tbl_smsdata_list->Recordset->Close();
?>
<?php if (!$tbl_smsdata_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tbl_smsdata_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_smsdata_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_smsdata_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tbl_smsdata_list->TotalRecords == 0 && !$tbl_smsdata->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tbl_smsdata_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tbl_smsdata_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tbl_smsdata_list->isExport()) { ?>
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
$tbl_smsdata_list->terminate();
?>