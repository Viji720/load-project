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
$tbl_sms_monthly_day_edit = new tbl_sms_monthly_day_edit();

// Run the page
$tbl_sms_monthly_day_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_sms_monthly_day_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftbl_sms_monthly_dayedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ftbl_sms_monthly_dayedit = currentForm = new ew.Form("ftbl_sms_monthly_dayedit", "edit");

	// Validate form
	ftbl_sms_monthly_dayedit.validate = function() {
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
			<?php if ($tbl_sms_monthly_day_edit->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->StationId->caption(), $tbl_sms_monthly_day_edit->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_edit->month_id->Required) { ?>
				elm = this.getElements("x" + infix + "_month_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->month_id->caption(), $tbl_sms_monthly_day_edit->month_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_edit->_01_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__01_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_01_rf->caption(), $tbl_sms_monthly_day_edit->_01_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__01_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_01_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_02_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__02_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_02_rf->caption(), $tbl_sms_monthly_day_edit->_02_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__02_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_02_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_03_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__03_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_03_rf->caption(), $tbl_sms_monthly_day_edit->_03_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__03_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_03_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_04_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__04_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_04_rf->caption(), $tbl_sms_monthly_day_edit->_04_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__04_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_04_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_05_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__05_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_05_rf->caption(), $tbl_sms_monthly_day_edit->_05_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__05_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_05_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_06_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__06_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_06_rf->caption(), $tbl_sms_monthly_day_edit->_06_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__06_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_06_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_07_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__07_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_07_rf->caption(), $tbl_sms_monthly_day_edit->_07_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__07_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_07_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_08_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__08_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_08_rf->caption(), $tbl_sms_monthly_day_edit->_08_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__08_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_08_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_09_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__09_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_09_rf->caption(), $tbl_sms_monthly_day_edit->_09_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__09_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_09_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_10_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__10_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_10_rf->caption(), $tbl_sms_monthly_day_edit->_10_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__10_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_10_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_11_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__11_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_11_rf->caption(), $tbl_sms_monthly_day_edit->_11_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__11_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_11_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_12_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__12_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_12_rf->caption(), $tbl_sms_monthly_day_edit->_12_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__12_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_12_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_13_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__13_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_13_rf->caption(), $tbl_sms_monthly_day_edit->_13_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__13_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_13_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_14_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__14_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_14_rf->caption(), $tbl_sms_monthly_day_edit->_14_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__14_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_14_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_15_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__15_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_15_rf->caption(), $tbl_sms_monthly_day_edit->_15_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__15_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_15_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_16_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__16_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_16_rf->caption(), $tbl_sms_monthly_day_edit->_16_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__16_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_16_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_17_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__17_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_17_rf->caption(), $tbl_sms_monthly_day_edit->_17_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__17_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_17_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_18_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__18_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_18_rf->caption(), $tbl_sms_monthly_day_edit->_18_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__18_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_18_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_19_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__19_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_19_rf->caption(), $tbl_sms_monthly_day_edit->_19_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__19_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_19_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_20_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__20_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_20_rf->caption(), $tbl_sms_monthly_day_edit->_20_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__20_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_20_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_21_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__21_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_21_rf->caption(), $tbl_sms_monthly_day_edit->_21_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__21_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_21_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_22_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__22_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_22_rf->caption(), $tbl_sms_monthly_day_edit->_22_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__22_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_22_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_23_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__23_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_23_rf->caption(), $tbl_sms_monthly_day_edit->_23_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__23_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_23_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_24_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__24_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_24_rf->caption(), $tbl_sms_monthly_day_edit->_24_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__24_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_24_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_25_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__25_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_25_rf->caption(), $tbl_sms_monthly_day_edit->_25_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__25_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_25_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_26_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__26_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_26_rf->caption(), $tbl_sms_monthly_day_edit->_26_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__26_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_26_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_27_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__27_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_27_rf->caption(), $tbl_sms_monthly_day_edit->_27_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__27_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_27_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_28_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__28_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_28_rf->caption(), $tbl_sms_monthly_day_edit->_28_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__28_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_28_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_29_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__29_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_29_rf->caption(), $tbl_sms_monthly_day_edit->_29_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__29_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_29_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_30_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__30_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_30_rf->caption(), $tbl_sms_monthly_day_edit->_30_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__30_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_30_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->_31_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__31_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->_31_rf->caption(), $tbl_sms_monthly_day_edit->_31_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__31_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_edit->_31_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_edit->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->SubDivisionId->caption(), $tbl_sms_monthly_day_edit->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_edit->Water_Year->Required) { ?>
				elm = this.getElements("x" + infix + "_Water_Year");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->Water_Year->caption(), $tbl_sms_monthly_day_edit->Water_Year->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_edit->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->SenderMobileNumber->caption(), $tbl_sms_monthly_day_edit->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_edit->IsChanged->Required) { ?>
				elm = this.getElements("x" + infix + "_IsChanged");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_edit->IsChanged->caption(), $tbl_sms_monthly_day_edit->IsChanged->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	ftbl_sms_monthly_dayedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_sms_monthly_dayedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ftbl_sms_monthly_dayedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tbl_sms_monthly_day_edit->showPageHeader(); ?>
<?php
$tbl_sms_monthly_day_edit->showMessage();
?>
<form name="ftbl_sms_monthly_dayedit" id="ftbl_sms_monthly_dayedit" class="<?php echo $tbl_sms_monthly_day_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_sms_monthly_day">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tbl_sms_monthly_day_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tbl_sms_monthly_day_edit->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_tbl_sms_monthly_day_StationId" for="x_StationId" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->StationId->caption() ?><?php echo $tbl_sms_monthly_day_edit->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->StationId->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day_StationId">
<span<?php echo $tbl_sms_monthly_day_edit->StationId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_edit->StationId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_StationId" name="x_StationId" id="x_StationId" value="<?php echo HtmlEncode($tbl_sms_monthly_day_edit->StationId->CurrentValue) ?>">
<?php echo $tbl_sms_monthly_day_edit->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->month_id->Visible) { // month_id ?>
	<div id="r_month_id" class="form-group row">
		<label id="elh_tbl_sms_monthly_day_month_id" for="x_month_id" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->month_id->caption() ?><?php echo $tbl_sms_monthly_day_edit->month_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->month_id->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day_month_id">
<span<?php echo $tbl_sms_monthly_day_edit->month_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_edit->month_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_month_id" name="x_month_id" id="x_month_id" value="<?php echo HtmlEncode($tbl_sms_monthly_day_edit->month_id->CurrentValue) ?>">
<?php echo $tbl_sms_monthly_day_edit->month_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_01_rf->Visible) { // 01_rf ?>
	<div id="r__01_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__01_rf" for="x__01_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_01_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_01_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_01_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__01_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__01_rf" name="x__01_rf" id="x__01_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_01_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_01_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_01_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_02_rf->Visible) { // 02_rf ?>
	<div id="r__02_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__02_rf" for="x__02_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_02_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_02_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_02_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__02_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__02_rf" name="x__02_rf" id="x__02_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_02_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_02_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_02_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_03_rf->Visible) { // 03_rf ?>
	<div id="r__03_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__03_rf" for="x__03_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_03_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_03_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_03_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__03_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__03_rf" name="x__03_rf" id="x__03_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_03_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_03_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_03_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_04_rf->Visible) { // 04_rf ?>
	<div id="r__04_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__04_rf" for="x__04_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_04_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_04_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_04_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__04_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__04_rf" name="x__04_rf" id="x__04_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_04_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_04_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_04_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_05_rf->Visible) { // 05_rf ?>
	<div id="r__05_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__05_rf" for="x__05_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_05_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_05_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_05_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__05_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__05_rf" name="x__05_rf" id="x__05_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_05_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_05_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_05_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_06_rf->Visible) { // 06_rf ?>
	<div id="r__06_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__06_rf" for="x__06_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_06_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_06_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_06_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__06_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__06_rf" name="x__06_rf" id="x__06_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_06_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_06_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_06_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_07_rf->Visible) { // 07_rf ?>
	<div id="r__07_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__07_rf" for="x__07_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_07_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_07_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_07_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__07_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__07_rf" name="x__07_rf" id="x__07_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_07_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_07_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_07_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_08_rf->Visible) { // 08_rf ?>
	<div id="r__08_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__08_rf" for="x__08_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_08_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_08_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_08_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__08_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__08_rf" name="x__08_rf" id="x__08_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_08_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_08_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_08_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_09_rf->Visible) { // 09_rf ?>
	<div id="r__09_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__09_rf" for="x__09_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_09_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_09_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_09_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__09_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__09_rf" name="x__09_rf" id="x__09_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_09_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_09_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_09_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_10_rf->Visible) { // 10_rf ?>
	<div id="r__10_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__10_rf" for="x__10_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_10_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_10_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_10_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__10_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__10_rf" name="x__10_rf" id="x__10_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_10_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_10_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_10_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_11_rf->Visible) { // 11_rf ?>
	<div id="r__11_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__11_rf" for="x__11_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_11_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_11_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_11_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__11_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__11_rf" name="x__11_rf" id="x__11_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_11_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_11_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_11_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_12_rf->Visible) { // 12_rf ?>
	<div id="r__12_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__12_rf" for="x__12_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_12_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_12_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_12_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__12_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__12_rf" name="x__12_rf" id="x__12_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_12_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_12_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_12_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_13_rf->Visible) { // 13_rf ?>
	<div id="r__13_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__13_rf" for="x__13_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_13_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_13_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_13_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__13_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__13_rf" name="x__13_rf" id="x__13_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_13_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_13_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_13_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_14_rf->Visible) { // 14_rf ?>
	<div id="r__14_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__14_rf" for="x__14_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_14_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_14_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_14_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__14_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__14_rf" name="x__14_rf" id="x__14_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_14_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_14_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_14_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_15_rf->Visible) { // 15_rf ?>
	<div id="r__15_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__15_rf" for="x__15_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_15_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_15_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_15_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__15_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__15_rf" name="x__15_rf" id="x__15_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_15_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_15_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_15_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_16_rf->Visible) { // 16_rf ?>
	<div id="r__16_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__16_rf" for="x__16_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_16_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_16_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_16_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__16_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__16_rf" name="x__16_rf" id="x__16_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_16_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_16_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_16_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_17_rf->Visible) { // 17_rf ?>
	<div id="r__17_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__17_rf" for="x__17_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_17_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_17_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_17_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__17_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__17_rf" name="x__17_rf" id="x__17_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_17_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_17_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_17_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_18_rf->Visible) { // 18_rf ?>
	<div id="r__18_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__18_rf" for="x__18_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_18_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_18_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_18_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__18_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__18_rf" name="x__18_rf" id="x__18_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_18_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_18_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_18_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_19_rf->Visible) { // 19_rf ?>
	<div id="r__19_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__19_rf" for="x__19_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_19_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_19_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_19_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__19_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__19_rf" name="x__19_rf" id="x__19_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_19_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_19_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_19_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_20_rf->Visible) { // 20_rf ?>
	<div id="r__20_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__20_rf" for="x__20_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_20_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_20_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_20_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__20_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__20_rf" name="x__20_rf" id="x__20_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_20_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_20_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_20_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_21_rf->Visible) { // 21_rf ?>
	<div id="r__21_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__21_rf" for="x__21_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_21_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_21_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_21_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__21_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__21_rf" name="x__21_rf" id="x__21_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_21_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_21_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_21_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_22_rf->Visible) { // 22_rf ?>
	<div id="r__22_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__22_rf" for="x__22_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_22_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_22_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_22_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__22_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__22_rf" name="x__22_rf" id="x__22_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_22_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_22_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_22_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_23_rf->Visible) { // 23_rf ?>
	<div id="r__23_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__23_rf" for="x__23_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_23_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_23_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_23_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__23_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__23_rf" name="x__23_rf" id="x__23_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_23_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_23_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_23_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_24_rf->Visible) { // 24_rf ?>
	<div id="r__24_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__24_rf" for="x__24_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_24_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_24_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_24_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__24_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__24_rf" name="x__24_rf" id="x__24_rf" size="30" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_24_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_24_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_24_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_25_rf->Visible) { // 25_rf ?>
	<div id="r__25_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__25_rf" for="x__25_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_25_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_25_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_25_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__25_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__25_rf" name="x__25_rf" id="x__25_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_25_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_25_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_25_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_26_rf->Visible) { // 26_rf ?>
	<div id="r__26_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__26_rf" for="x__26_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_26_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_26_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_26_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__26_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__26_rf" name="x__26_rf" id="x__26_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_26_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_26_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_26_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_27_rf->Visible) { // 27_rf ?>
	<div id="r__27_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__27_rf" for="x__27_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_27_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_27_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_27_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__27_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__27_rf" name="x__27_rf" id="x__27_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_27_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_27_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_27_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_28_rf->Visible) { // 28_rf ?>
	<div id="r__28_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__28_rf" for="x__28_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_28_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_28_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_28_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__28_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__28_rf" name="x__28_rf" id="x__28_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_28_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_28_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_28_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_29_rf->Visible) { // 29_rf ?>
	<div id="r__29_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__29_rf" for="x__29_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_29_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_29_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_29_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__29_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__29_rf" name="x__29_rf" id="x__29_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_29_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_29_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_29_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_30_rf->Visible) { // 30_rf ?>
	<div id="r__30_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__30_rf" for="x__30_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_30_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_30_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_30_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__30_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__30_rf" name="x__30_rf" id="x__30_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_30_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_30_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_30_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->_31_rf->Visible) { // 31_rf ?>
	<div id="r__31_rf" class="form-group row">
		<label id="elh_tbl_sms_monthly_day__31_rf" for="x__31_rf" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->_31_rf->caption() ?><?php echo $tbl_sms_monthly_day_edit->_31_rf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->_31_rf->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day__31_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__31_rf" name="x__31_rf" id="x__31_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_edit->_31_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_edit->_31_rf->editAttributes() ?>>
</span>
<?php echo $tbl_sms_monthly_day_edit->_31_rf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->SubDivisionId->Visible) { // SubDivisionId ?>
	<div id="r_SubDivisionId" class="form-group row">
		<label id="elh_tbl_sms_monthly_day_SubDivisionId" for="x_SubDivisionId" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->SubDivisionId->caption() ?><?php echo $tbl_sms_monthly_day_edit->SubDivisionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->SubDivisionId->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day_SubDivisionId">
<span<?php echo $tbl_sms_monthly_day_edit->SubDivisionId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_edit->SubDivisionId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_SubDivisionId" name="x_SubDivisionId" id="x_SubDivisionId" value="<?php echo HtmlEncode($tbl_sms_monthly_day_edit->SubDivisionId->CurrentValue) ?>">
<?php echo $tbl_sms_monthly_day_edit->SubDivisionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->Water_Year->Visible) { // Water_Year ?>
	<div id="r_Water_Year" class="form-group row">
		<label id="elh_tbl_sms_monthly_day_Water_Year" for="x_Water_Year" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->Water_Year->caption() ?><?php echo $tbl_sms_monthly_day_edit->Water_Year->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->Water_Year->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day_Water_Year">
<span<?php echo $tbl_sms_monthly_day_edit->Water_Year->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_edit->Water_Year->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_Water_Year" name="x_Water_Year" id="x_Water_Year" value="<?php echo HtmlEncode($tbl_sms_monthly_day_edit->Water_Year->CurrentValue) ?>">
<?php echo $tbl_sms_monthly_day_edit->Water_Year->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<div id="r_SenderMobileNumber" class="form-group row">
		<label id="elh_tbl_sms_monthly_day_SenderMobileNumber" for="x_SenderMobileNumber" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->SenderMobileNumber->caption() ?><?php echo $tbl_sms_monthly_day_edit->SenderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->SenderMobileNumber->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day_SenderMobileNumber">
<span<?php echo $tbl_sms_monthly_day_edit->SenderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_edit->SenderMobileNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_SenderMobileNumber" name="x_SenderMobileNumber" id="x_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_day_edit->SenderMobileNumber->CurrentValue) ?>">
<?php echo $tbl_sms_monthly_day_edit->SenderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_sms_monthly_day_edit->IsChanged->Visible) { // IsChanged ?>
	<div id="r_IsChanged" class="form-group row">
		<label id="elh_tbl_sms_monthly_day_IsChanged" for="x_IsChanged" class="<?php echo $tbl_sms_monthly_day_edit->LeftColumnClass ?>"><?php echo $tbl_sms_monthly_day_edit->IsChanged->caption() ?><?php echo $tbl_sms_monthly_day_edit->IsChanged->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_sms_monthly_day_edit->RightColumnClass ?>"><div <?php echo $tbl_sms_monthly_day_edit->IsChanged->cellAttributes() ?>>
<span id="el_tbl_sms_monthly_day_IsChanged">
<span<?php echo $tbl_sms_monthly_day_edit->IsChanged->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_edit->IsChanged->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_IsChanged" name="x_IsChanged" id="x_IsChanged" value="<?php echo HtmlEncode($tbl_sms_monthly_day_edit->IsChanged->CurrentValue) ?>">
<?php echo $tbl_sms_monthly_day_edit->IsChanged->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_Slno" name="x_Slno" id="x_Slno" value="<?php echo HtmlEncode($tbl_sms_monthly_day_edit->Slno->CurrentValue) ?>">
<?php if (!$tbl_sms_monthly_day_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tbl_sms_monthly_day_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tbl_sms_monthly_day_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tbl_sms_monthly_day_edit->showPageFooter();
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
$tbl_sms_monthly_day_edit->terminate();
?>