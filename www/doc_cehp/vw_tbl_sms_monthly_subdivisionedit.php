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
$vw_tbl_sms_monthly_subdivision_edit = new vw_tbl_sms_monthly_subdivision_edit();

// Run the page
$vw_tbl_sms_monthly_subdivision_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_tbl_sms_monthly_subdivision_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fvw_tbl_sms_monthly_subdivisionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fvw_tbl_sms_monthly_subdivisionedit = currentForm = new ew.Form("fvw_tbl_sms_monthly_subdivisionedit", "edit");

	// Validate form
	fvw_tbl_sms_monthly_subdivisionedit.validate = function() {
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
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->StationId->caption(), $vw_tbl_sms_monthly_subdivision_edit->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->caption(), $vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->caption(), $vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Water_Year->Required) { ?>
				elm = this.getElements("x" + infix + "_Water_Year");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Water_Year->caption(), $vw_tbl_sms_monthly_subdivision_edit->Water_Year->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->day_of_month->Required) { ?>
				elm = this.getElements("x" + infix + "_day_of_month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->day_of_month->caption(), $vw_tbl_sms_monthly_subdivision_edit->day_of_month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jun_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jun_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jul_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jul_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Aug_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Aug_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Sep_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Sep_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Oct_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Oct_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Nov_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Nov_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Dec_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Dec_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Jan_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jan_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Feb_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Feb_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Mar_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Mar_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_Apr_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Apr_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->errorMessage()) ?>");
			<?php if ($vw_tbl_sms_monthly_subdivision_edit->May_rainfall->Required) { ?>
				elm = this.getElements("x" + infix + "_May_rainfall");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_tbl_sms_monthly_subdivision_edit->May_rainfall->caption(), $vw_tbl_sms_monthly_subdivision_edit->May_rainfall->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_May_rainfall");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($vw_tbl_sms_monthly_subdivision_edit->May_rainfall->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fvw_tbl_sms_monthly_subdivisionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_tbl_sms_monthly_subdivisionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fvw_tbl_sms_monthly_subdivisionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $vw_tbl_sms_monthly_subdivision_edit->showPageHeader(); ?>
<?php
$vw_tbl_sms_monthly_subdivision_edit->showMessage();
?>
<form name="fvw_tbl_sms_monthly_subdivisionedit" id="fvw_tbl_sms_monthly_subdivisionedit" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_tbl_sms_monthly_subdivision">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$vw_tbl_sms_monthly_subdivision_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($vw_tbl_sms_monthly_subdivision_edit->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_StationId" for="x_StationId" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->StationId->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->StationId->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_StationId">
<span<?php echo $vw_tbl_sms_monthly_subdivision_edit->StationId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_edit->StationId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_StationId" name="x_StationId" id="x_StationId" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_edit->StationId->CurrentValue) ?>">
<?php echo $vw_tbl_sms_monthly_subdivision_edit->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_SubDivisionId" for="x_SubDivisionId" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_SubDivisionId">
<span<?php echo $vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SubDivisionId" name="x_SubDivisionId" id="x_SubDivisionId" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->CurrentValue) ?>">
<?php echo $vw_tbl_sms_monthly_subdivision_edit->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<div id="r_SenderMobileNumber" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_SenderMobileNumber" for="x_SenderMobileNumber" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_SenderMobileNumber">
<span<?php echo $vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_SenderMobileNumber" name="x_SenderMobileNumber" id="x_SenderMobileNumber" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->CurrentValue) ?>">
<?php echo $vw_tbl_sms_monthly_subdivision_edit->SenderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Water_Year->Visible) { // Water_Year ?>
	<div id="r_Water_Year" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Water_Year" for="x_Water_Year" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Water_Year->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Water_Year->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Water_Year->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Water_Year">
<span<?php echo $vw_tbl_sms_monthly_subdivision_edit->Water_Year->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_edit->Water_Year->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Water_Year" name="x_Water_Year" id="x_Water_Year" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_edit->Water_Year->CurrentValue) ?>">
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Water_Year->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->day_of_month->Visible) { // day_of_month ?>
	<div id="r_day_of_month" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_day_of_month" for="x_day_of_month" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->day_of_month->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->day_of_month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->day_of_month->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_day_of_month">
<span<?php echo $vw_tbl_sms_monthly_subdivision_edit->day_of_month->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_tbl_sms_monthly_subdivision_edit->day_of_month->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_day_of_month" name="x_day_of_month" id="x_day_of_month" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_edit->day_of_month->CurrentValue) ?>">
<?php echo $vw_tbl_sms_monthly_subdivision_edit->day_of_month->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->Visible) { // Jun_rainfall ?>
	<div id="r_Jun_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Jun_rainfall" for="x_Jun_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Jun_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jun_rainfall" name="x_Jun_rainfall" id="x_Jun_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jun_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->Visible) { // Jul_rainfall ?>
	<div id="r_Jul_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Jul_rainfall" for="x_Jul_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Jul_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jul_rainfall" name="x_Jul_rainfall" id="x_Jul_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jul_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->Visible) { // Aug_rainfall ?>
	<div id="r_Aug_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Aug_rainfall" for="x_Aug_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Aug_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Aug_rainfall" name="x_Aug_rainfall" id="x_Aug_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Aug_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->Visible) { // Sep_rainfall ?>
	<div id="r_Sep_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Sep_rainfall" for="x_Sep_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Sep_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Sep_rainfall" name="x_Sep_rainfall" id="x_Sep_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Sep_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->Visible) { // Oct_rainfall ?>
	<div id="r_Oct_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Oct_rainfall" for="x_Oct_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Oct_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Oct_rainfall" name="x_Oct_rainfall" id="x_Oct_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Oct_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->Visible) { // Nov_rainfall ?>
	<div id="r_Nov_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Nov_rainfall" for="x_Nov_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Nov_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Nov_rainfall" name="x_Nov_rainfall" id="x_Nov_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Nov_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->Visible) { // Dec_rainfall ?>
	<div id="r_Dec_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Dec_rainfall" for="x_Dec_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Dec_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Dec_rainfall" name="x_Dec_rainfall" id="x_Dec_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Dec_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->Visible) { // Jan_rainfall ?>
	<div id="r_Jan_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Jan_rainfall" for="x_Jan_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Jan_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Jan_rainfall" name="x_Jan_rainfall" id="x_Jan_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Jan_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->Visible) { // Feb_rainfall ?>
	<div id="r_Feb_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Feb_rainfall" for="x_Feb_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Feb_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Feb_rainfall" name="x_Feb_rainfall" id="x_Feb_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Feb_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->Visible) { // Mar_rainfall ?>
	<div id="r_Mar_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Mar_rainfall" for="x_Mar_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Mar_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Mar_rainfall" name="x_Mar_rainfall" id="x_Mar_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Mar_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->Visible) { // Apr_rainfall ?>
	<div id="r_Apr_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_Apr_rainfall" for="x_Apr_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_Apr_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Apr_rainfall" name="x_Apr_rainfall" id="x_Apr_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->Apr_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vw_tbl_sms_monthly_subdivision_edit->May_rainfall->Visible) { // May_rainfall ?>
	<div id="r_May_rainfall" class="form-group row">
		<label id="elh_vw_tbl_sms_monthly_subdivision_May_rainfall" for="x_May_rainfall" class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->LeftColumnClass ?>"><?php echo $vw_tbl_sms_monthly_subdivision_edit->May_rainfall->caption() ?><?php echo $vw_tbl_sms_monthly_subdivision_edit->May_rainfall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->RightColumnClass ?>"><div <?php echo $vw_tbl_sms_monthly_subdivision_edit->May_rainfall->cellAttributes() ?>>
<span id="el_vw_tbl_sms_monthly_subdivision_May_rainfall">
<input type="text" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_May_rainfall" name="x_May_rainfall" id="x_May_rainfall" size="8" maxlength="7" value="<?php echo $vw_tbl_sms_monthly_subdivision_edit->May_rainfall->EditValue ?>"<?php echo $vw_tbl_sms_monthly_subdivision_edit->May_rainfall->editAttributes() ?>>
</span>
<?php echo $vw_tbl_sms_monthly_subdivision_edit->May_rainfall->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="vw_tbl_sms_monthly_subdivision" data-field="x_Slno" name="x_Slno" id="x_Slno" value="<?php echo HtmlEncode($vw_tbl_sms_monthly_subdivision_edit->Slno->CurrentValue) ?>">
<?php if (!$vw_tbl_sms_monthly_subdivision_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $vw_tbl_sms_monthly_subdivision_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $vw_tbl_sms_monthly_subdivision_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$vw_tbl_sms_monthly_subdivision_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$vw_tbl_sms_monthly_subdivision_edit->terminate();
?>