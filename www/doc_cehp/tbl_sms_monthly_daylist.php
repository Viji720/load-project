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
$tbl_sms_monthly_day_list = new tbl_sms_monthly_day_list();

// Run the page
$tbl_sms_monthly_day_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_sms_monthly_day_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tbl_sms_monthly_day_list->isExport()) { ?>
<script>
var ftbl_sms_monthly_daylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftbl_sms_monthly_daylist = currentForm = new ew.Form("ftbl_sms_monthly_daylist", "list");
	ftbl_sms_monthly_daylist.formKeyCountName = '<?php echo $tbl_sms_monthly_day_list->FormKeyCountName ?>';

	// Validate form
	ftbl_sms_monthly_daylist.validate = function() {
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
			<?php if ($tbl_sms_monthly_day_list->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->StationId->caption(), $tbl_sms_monthly_day_list->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_list->month_id->Required) { ?>
				elm = this.getElements("x" + infix + "_month_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->month_id->caption(), $tbl_sms_monthly_day_list->month_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_list->_01_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__01_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_01_rf->caption(), $tbl_sms_monthly_day_list->_01_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__01_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_01_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_02_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__02_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_02_rf->caption(), $tbl_sms_monthly_day_list->_02_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__02_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_02_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_03_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__03_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_03_rf->caption(), $tbl_sms_monthly_day_list->_03_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__03_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_03_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_04_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__04_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_04_rf->caption(), $tbl_sms_monthly_day_list->_04_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__04_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_04_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_05_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__05_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_05_rf->caption(), $tbl_sms_monthly_day_list->_05_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__05_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_05_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_06_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__06_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_06_rf->caption(), $tbl_sms_monthly_day_list->_06_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__06_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_06_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_07_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__07_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_07_rf->caption(), $tbl_sms_monthly_day_list->_07_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__07_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_07_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_08_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__08_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_08_rf->caption(), $tbl_sms_monthly_day_list->_08_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__08_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_08_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_09_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__09_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_09_rf->caption(), $tbl_sms_monthly_day_list->_09_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__09_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_09_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_10_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__10_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_10_rf->caption(), $tbl_sms_monthly_day_list->_10_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__10_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_10_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_11_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__11_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_11_rf->caption(), $tbl_sms_monthly_day_list->_11_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__11_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_11_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_12_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__12_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_12_rf->caption(), $tbl_sms_monthly_day_list->_12_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__12_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_12_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_13_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__13_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_13_rf->caption(), $tbl_sms_monthly_day_list->_13_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__13_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_13_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_14_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__14_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_14_rf->caption(), $tbl_sms_monthly_day_list->_14_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__14_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_14_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_15_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__15_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_15_rf->caption(), $tbl_sms_monthly_day_list->_15_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__15_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_15_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_16_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__16_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_16_rf->caption(), $tbl_sms_monthly_day_list->_16_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__16_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_16_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_17_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__17_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_17_rf->caption(), $tbl_sms_monthly_day_list->_17_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__17_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_17_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_18_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__18_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_18_rf->caption(), $tbl_sms_monthly_day_list->_18_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__18_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_18_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_19_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__19_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_19_rf->caption(), $tbl_sms_monthly_day_list->_19_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__19_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_19_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_20_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__20_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_20_rf->caption(), $tbl_sms_monthly_day_list->_20_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__20_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_20_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_21_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__21_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_21_rf->caption(), $tbl_sms_monthly_day_list->_21_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__21_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_21_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_22_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__22_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_22_rf->caption(), $tbl_sms_monthly_day_list->_22_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__22_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_22_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_23_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__23_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_23_rf->caption(), $tbl_sms_monthly_day_list->_23_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__23_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_23_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_24_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__24_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_24_rf->caption(), $tbl_sms_monthly_day_list->_24_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__24_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_24_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_25_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__25_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_25_rf->caption(), $tbl_sms_monthly_day_list->_25_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__25_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_25_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_26_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__26_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_26_rf->caption(), $tbl_sms_monthly_day_list->_26_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__26_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_26_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_27_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__27_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_27_rf->caption(), $tbl_sms_monthly_day_list->_27_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__27_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_27_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_28_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__28_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_28_rf->caption(), $tbl_sms_monthly_day_list->_28_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__28_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_28_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_29_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__29_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_29_rf->caption(), $tbl_sms_monthly_day_list->_29_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__29_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_29_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_30_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__30_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_30_rf->caption(), $tbl_sms_monthly_day_list->_30_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__30_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_30_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->_31_rf->Required) { ?>
				elm = this.getElements("x" + infix + "__31_rf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->_31_rf->caption(), $tbl_sms_monthly_day_list->_31_rf->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__31_rf");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_sms_monthly_day_list->_31_rf->errorMessage()) ?>");
			<?php if ($tbl_sms_monthly_day_list->SubDivisionId->Required) { ?>
				elm = this.getElements("x" + infix + "_SubDivisionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->SubDivisionId->caption(), $tbl_sms_monthly_day_list->SubDivisionId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_list->Water_Year->Required) { ?>
				elm = this.getElements("x" + infix + "_Water_Year");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->Water_Year->caption(), $tbl_sms_monthly_day_list->Water_Year->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_list->SenderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_SenderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->SenderMobileNumber->caption(), $tbl_sms_monthly_day_list->SenderMobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_sms_monthly_day_list->IsChanged->Required) { ?>
				elm = this.getElements("x" + infix + "_IsChanged");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_sms_monthly_day_list->IsChanged->caption(), $tbl_sms_monthly_day_list->IsChanged->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ftbl_sms_monthly_daylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_sms_monthly_daylist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_sms_monthly_daylist.lists["x_StationId"] = <?php echo $tbl_sms_monthly_day_list->StationId->Lookup->toClientList($tbl_sms_monthly_day_list) ?>;
	ftbl_sms_monthly_daylist.lists["x_StationId"].options = <?php echo JsonEncode($tbl_sms_monthly_day_list->StationId->lookupOptions()) ?>;
	ftbl_sms_monthly_daylist.lists["x_month_id"] = <?php echo $tbl_sms_monthly_day_list->month_id->Lookup->toClientList($tbl_sms_monthly_day_list) ?>;
	ftbl_sms_monthly_daylist.lists["x_month_id"].options = <?php echo JsonEncode($tbl_sms_monthly_day_list->month_id->lookupOptions()) ?>;
	ftbl_sms_monthly_daylist.lists["x_SubDivisionId"] = <?php echo $tbl_sms_monthly_day_list->SubDivisionId->Lookup->toClientList($tbl_sms_monthly_day_list) ?>;
	ftbl_sms_monthly_daylist.lists["x_SubDivisionId"].options = <?php echo JsonEncode($tbl_sms_monthly_day_list->SubDivisionId->lookupOptions()) ?>;
	loadjs.done("ftbl_sms_monthly_daylist");
});
var ftbl_sms_monthly_daylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftbl_sms_monthly_daylistsrch = currentSearchForm = new ew.Form("ftbl_sms_monthly_daylistsrch");

	// Validate function for search
	ftbl_sms_monthly_daylistsrch.validate = function(fobj) {
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
	ftbl_sms_monthly_daylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_sms_monthly_daylistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_sms_monthly_daylistsrch.lists["x_StationId"] = <?php echo $tbl_sms_monthly_day_list->StationId->Lookup->toClientList($tbl_sms_monthly_day_list) ?>;
	ftbl_sms_monthly_daylistsrch.lists["x_StationId"].options = <?php echo JsonEncode($tbl_sms_monthly_day_list->StationId->lookupOptions()) ?>;
	ftbl_sms_monthly_daylistsrch.lists["x_month_id"] = <?php echo $tbl_sms_monthly_day_list->month_id->Lookup->toClientList($tbl_sms_monthly_day_list) ?>;
	ftbl_sms_monthly_daylistsrch.lists["x_month_id"].options = <?php echo JsonEncode($tbl_sms_monthly_day_list->month_id->lookupOptions()) ?>;

	// Filters
	ftbl_sms_monthly_daylistsrch.filterList = <?php echo $tbl_sms_monthly_day_list->getFilterList() ?>;
	loadjs.done("ftbl_sms_monthly_daylistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tbl_sms_monthly_day_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tbl_sms_monthly_day_list->TotalRecords > 0 && $tbl_sms_monthly_day_list->ExportOptions->visible()) { ?>
<?php $tbl_sms_monthly_day_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->ImportOptions->visible()) { ?>
<?php $tbl_sms_monthly_day_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->SearchOptions->visible()) { ?>
<?php $tbl_sms_monthly_day_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->FilterOptions->visible()) { ?>
<?php $tbl_sms_monthly_day_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tbl_sms_monthly_day_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tbl_sms_monthly_day_list->isExport() && !$tbl_sms_monthly_day->CurrentAction) { ?>
<form name="ftbl_sms_monthly_daylistsrch" id="ftbl_sms_monthly_daylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftbl_sms_monthly_daylistsrch-search-panel" class="<?php echo $tbl_sms_monthly_day_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tbl_sms_monthly_day">
	<div class="ew-extended-search">
<?php

// Render search row
$tbl_sms_monthly_day->RowType = ROWTYPE_SEARCH;
$tbl_sms_monthly_day->resetAttributes();
$tbl_sms_monthly_day_list->renderRow();
?>
<?php if ($tbl_sms_monthly_day_list->StationId->Visible) { // StationId ?>
	<?php
		$tbl_sms_monthly_day_list->SearchColumnCount++;
		if (($tbl_sms_monthly_day_list->SearchColumnCount - 1) % $tbl_sms_monthly_day_list->SearchFieldsPerRow == 0) {
			$tbl_sms_monthly_day_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_sms_monthly_day_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationId" class="ew-cell form-group">
		<label for="x_StationId" class="ew-search-caption ew-label"><?php echo $tbl_sms_monthly_day_list->StationId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_StationId" id="z_StationId" value="=">
</span>
		<span id="el_tbl_sms_monthly_day_StationId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly_day" data-field="x_StationId" data-value-separator="<?php echo $tbl_sms_monthly_day_list->StationId->displayValueSeparatorAttribute() ?>" id="x_StationId" name="x_StationId"<?php echo $tbl_sms_monthly_day_list->StationId->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_day_list->StationId->selectOptionListHtml("x_StationId") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_day_list->StationId->Lookup->getParamTag($tbl_sms_monthly_day_list, "p_x_StationId") ?>
</span>
	</div>
	<?php if ($tbl_sms_monthly_day_list->SearchColumnCount % $tbl_sms_monthly_day_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->month_id->Visible) { // month_id ?>
	<?php
		$tbl_sms_monthly_day_list->SearchColumnCount++;
		if (($tbl_sms_monthly_day_list->SearchColumnCount - 1) % $tbl_sms_monthly_day_list->SearchFieldsPerRow == 0) {
			$tbl_sms_monthly_day_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_sms_monthly_day_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_month_id" class="ew-cell form-group">
		<label for="x_month_id" class="ew-search-caption ew-label"><?php echo $tbl_sms_monthly_day_list->month_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_month_id" id="z_month_id" value="LIKE">
</span>
		<span id="el_tbl_sms_monthly_day_month_id" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly_day" data-field="x_month_id" data-value-separator="<?php echo $tbl_sms_monthly_day_list->month_id->displayValueSeparatorAttribute() ?>" id="x_month_id" name="x_month_id"<?php echo $tbl_sms_monthly_day_list->month_id->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_day_list->month_id->selectOptionListHtml("x_month_id") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_day_list->month_id->Lookup->getParamTag($tbl_sms_monthly_day_list, "p_x_month_id") ?>
</span>
	</div>
	<?php if ($tbl_sms_monthly_day_list->SearchColumnCount % $tbl_sms_monthly_day_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->SearchColumnCount % $tbl_sms_monthly_day_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $tbl_sms_monthly_day_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tbl_sms_monthly_day_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tbl_sms_monthly_day_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tbl_sms_monthly_day_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tbl_sms_monthly_day_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tbl_sms_monthly_day_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tbl_sms_monthly_day_list->showPageHeader(); ?>
<?php
$tbl_sms_monthly_day_list->showMessage();
?>
<?php if ($tbl_sms_monthly_day_list->TotalRecords > 0 || $tbl_sms_monthly_day->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tbl_sms_monthly_day_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tbl_sms_monthly_day">
<?php if (!$tbl_sms_monthly_day_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tbl_sms_monthly_day_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_sms_monthly_day_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_sms_monthly_day_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftbl_sms_monthly_daylist" id="ftbl_sms_monthly_daylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_sms_monthly_day">
<div id="gmp_tbl_sms_monthly_day" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tbl_sms_monthly_day_list->TotalRecords > 0 || $tbl_sms_monthly_day_list->isGridEdit()) { ?>
<table id="tbl_tbl_sms_monthly_daylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tbl_sms_monthly_day->RowType = ROWTYPE_HEADER;

// Render list options
$tbl_sms_monthly_day_list->renderListOptions();

// Render list options (header, left)
$tbl_sms_monthly_day_list->ListOptions->render("header", "left");
?>
<?php if ($tbl_sms_monthly_day_list->StationId->Visible) { // StationId ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $tbl_sms_monthly_day_list->StationId->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day_StationId" class="tbl_sms_monthly_day_StationId"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $tbl_sms_monthly_day_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->StationId) ?>', 2);"><div id="elh_tbl_sms_monthly_day_StationId" class="tbl_sms_monthly_day_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->month_id->Visible) { // month_id ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->month_id) == "") { ?>
		<th data-name="month_id" class="<?php echo $tbl_sms_monthly_day_list->month_id->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day_month_id" class="tbl_sms_monthly_day_month_id"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->month_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="month_id" class="<?php echo $tbl_sms_monthly_day_list->month_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->month_id) ?>', 2);"><div id="elh_tbl_sms_monthly_day_month_id" class="tbl_sms_monthly_day_month_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->month_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->month_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->month_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_01_rf->Visible) { // 01_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_01_rf) == "") { ?>
		<th data-name="_01_rf" class="<?php echo $tbl_sms_monthly_day_list->_01_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__01_rf" class="tbl_sms_monthly_day__01_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_01_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_01_rf" class="<?php echo $tbl_sms_monthly_day_list->_01_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_01_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__01_rf" class="tbl_sms_monthly_day__01_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_01_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_01_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_01_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_02_rf->Visible) { // 02_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_02_rf) == "") { ?>
		<th data-name="_02_rf" class="<?php echo $tbl_sms_monthly_day_list->_02_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__02_rf" class="tbl_sms_monthly_day__02_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_02_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_02_rf" class="<?php echo $tbl_sms_monthly_day_list->_02_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_02_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__02_rf" class="tbl_sms_monthly_day__02_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_02_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_02_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_02_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_03_rf->Visible) { // 03_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_03_rf) == "") { ?>
		<th data-name="_03_rf" class="<?php echo $tbl_sms_monthly_day_list->_03_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__03_rf" class="tbl_sms_monthly_day__03_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_03_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_03_rf" class="<?php echo $tbl_sms_monthly_day_list->_03_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_03_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__03_rf" class="tbl_sms_monthly_day__03_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_03_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_03_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_03_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_04_rf->Visible) { // 04_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_04_rf) == "") { ?>
		<th data-name="_04_rf" class="<?php echo $tbl_sms_monthly_day_list->_04_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__04_rf" class="tbl_sms_monthly_day__04_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_04_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_04_rf" class="<?php echo $tbl_sms_monthly_day_list->_04_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_04_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__04_rf" class="tbl_sms_monthly_day__04_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_04_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_04_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_04_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_05_rf->Visible) { // 05_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_05_rf) == "") { ?>
		<th data-name="_05_rf" class="<?php echo $tbl_sms_monthly_day_list->_05_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__05_rf" class="tbl_sms_monthly_day__05_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_05_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_05_rf" class="<?php echo $tbl_sms_monthly_day_list->_05_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_05_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__05_rf" class="tbl_sms_monthly_day__05_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_05_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_05_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_05_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_06_rf->Visible) { // 06_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_06_rf) == "") { ?>
		<th data-name="_06_rf" class="<?php echo $tbl_sms_monthly_day_list->_06_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__06_rf" class="tbl_sms_monthly_day__06_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_06_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_06_rf" class="<?php echo $tbl_sms_monthly_day_list->_06_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_06_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__06_rf" class="tbl_sms_monthly_day__06_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_06_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_06_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_06_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_07_rf->Visible) { // 07_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_07_rf) == "") { ?>
		<th data-name="_07_rf" class="<?php echo $tbl_sms_monthly_day_list->_07_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__07_rf" class="tbl_sms_monthly_day__07_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_07_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_07_rf" class="<?php echo $tbl_sms_monthly_day_list->_07_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_07_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__07_rf" class="tbl_sms_monthly_day__07_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_07_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_07_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_07_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_08_rf->Visible) { // 08_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_08_rf) == "") { ?>
		<th data-name="_08_rf" class="<?php echo $tbl_sms_monthly_day_list->_08_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__08_rf" class="tbl_sms_monthly_day__08_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_08_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_08_rf" class="<?php echo $tbl_sms_monthly_day_list->_08_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_08_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__08_rf" class="tbl_sms_monthly_day__08_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_08_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_08_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_08_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_09_rf->Visible) { // 09_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_09_rf) == "") { ?>
		<th data-name="_09_rf" class="<?php echo $tbl_sms_monthly_day_list->_09_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__09_rf" class="tbl_sms_monthly_day__09_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_09_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_09_rf" class="<?php echo $tbl_sms_monthly_day_list->_09_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_09_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__09_rf" class="tbl_sms_monthly_day__09_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_09_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_09_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_09_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_10_rf->Visible) { // 10_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_10_rf) == "") { ?>
		<th data-name="_10_rf" class="<?php echo $tbl_sms_monthly_day_list->_10_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__10_rf" class="tbl_sms_monthly_day__10_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_10_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_10_rf" class="<?php echo $tbl_sms_monthly_day_list->_10_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_10_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__10_rf" class="tbl_sms_monthly_day__10_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_10_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_10_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_10_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_11_rf->Visible) { // 11_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_11_rf) == "") { ?>
		<th data-name="_11_rf" class="<?php echo $tbl_sms_monthly_day_list->_11_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__11_rf" class="tbl_sms_monthly_day__11_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_11_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_11_rf" class="<?php echo $tbl_sms_monthly_day_list->_11_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_11_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__11_rf" class="tbl_sms_monthly_day__11_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_11_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_11_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_11_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_12_rf->Visible) { // 12_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_12_rf) == "") { ?>
		<th data-name="_12_rf" class="<?php echo $tbl_sms_monthly_day_list->_12_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__12_rf" class="tbl_sms_monthly_day__12_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_12_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_12_rf" class="<?php echo $tbl_sms_monthly_day_list->_12_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_12_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__12_rf" class="tbl_sms_monthly_day__12_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_12_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_12_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_12_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_13_rf->Visible) { // 13_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_13_rf) == "") { ?>
		<th data-name="_13_rf" class="<?php echo $tbl_sms_monthly_day_list->_13_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__13_rf" class="tbl_sms_monthly_day__13_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_13_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_13_rf" class="<?php echo $tbl_sms_monthly_day_list->_13_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_13_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__13_rf" class="tbl_sms_monthly_day__13_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_13_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_13_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_13_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_14_rf->Visible) { // 14_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_14_rf) == "") { ?>
		<th data-name="_14_rf" class="<?php echo $tbl_sms_monthly_day_list->_14_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__14_rf" class="tbl_sms_monthly_day__14_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_14_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_14_rf" class="<?php echo $tbl_sms_monthly_day_list->_14_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_14_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__14_rf" class="tbl_sms_monthly_day__14_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_14_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_14_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_14_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_15_rf->Visible) { // 15_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_15_rf) == "") { ?>
		<th data-name="_15_rf" class="<?php echo $tbl_sms_monthly_day_list->_15_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__15_rf" class="tbl_sms_monthly_day__15_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_15_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_15_rf" class="<?php echo $tbl_sms_monthly_day_list->_15_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_15_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__15_rf" class="tbl_sms_monthly_day__15_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_15_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_15_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_15_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_16_rf->Visible) { // 16_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_16_rf) == "") { ?>
		<th data-name="_16_rf" class="<?php echo $tbl_sms_monthly_day_list->_16_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__16_rf" class="tbl_sms_monthly_day__16_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_16_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_16_rf" class="<?php echo $tbl_sms_monthly_day_list->_16_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_16_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__16_rf" class="tbl_sms_monthly_day__16_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_16_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_16_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_16_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_17_rf->Visible) { // 17_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_17_rf) == "") { ?>
		<th data-name="_17_rf" class="<?php echo $tbl_sms_monthly_day_list->_17_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__17_rf" class="tbl_sms_monthly_day__17_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_17_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_17_rf" class="<?php echo $tbl_sms_monthly_day_list->_17_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_17_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__17_rf" class="tbl_sms_monthly_day__17_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_17_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_17_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_17_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_18_rf->Visible) { // 18_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_18_rf) == "") { ?>
		<th data-name="_18_rf" class="<?php echo $tbl_sms_monthly_day_list->_18_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__18_rf" class="tbl_sms_monthly_day__18_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_18_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_18_rf" class="<?php echo $tbl_sms_monthly_day_list->_18_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_18_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__18_rf" class="tbl_sms_monthly_day__18_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_18_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_18_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_18_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_19_rf->Visible) { // 19_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_19_rf) == "") { ?>
		<th data-name="_19_rf" class="<?php echo $tbl_sms_monthly_day_list->_19_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__19_rf" class="tbl_sms_monthly_day__19_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_19_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_19_rf" class="<?php echo $tbl_sms_monthly_day_list->_19_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_19_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__19_rf" class="tbl_sms_monthly_day__19_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_19_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_19_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_19_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_20_rf->Visible) { // 20_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_20_rf) == "") { ?>
		<th data-name="_20_rf" class="<?php echo $tbl_sms_monthly_day_list->_20_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__20_rf" class="tbl_sms_monthly_day__20_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_20_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_20_rf" class="<?php echo $tbl_sms_monthly_day_list->_20_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_20_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__20_rf" class="tbl_sms_monthly_day__20_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_20_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_20_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_20_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_21_rf->Visible) { // 21_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_21_rf) == "") { ?>
		<th data-name="_21_rf" class="<?php echo $tbl_sms_monthly_day_list->_21_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__21_rf" class="tbl_sms_monthly_day__21_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_21_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_21_rf" class="<?php echo $tbl_sms_monthly_day_list->_21_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_21_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__21_rf" class="tbl_sms_monthly_day__21_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_21_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_21_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_21_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_22_rf->Visible) { // 22_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_22_rf) == "") { ?>
		<th data-name="_22_rf" class="<?php echo $tbl_sms_monthly_day_list->_22_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__22_rf" class="tbl_sms_monthly_day__22_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_22_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_22_rf" class="<?php echo $tbl_sms_monthly_day_list->_22_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_22_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__22_rf" class="tbl_sms_monthly_day__22_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_22_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_22_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_22_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_23_rf->Visible) { // 23_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_23_rf) == "") { ?>
		<th data-name="_23_rf" class="<?php echo $tbl_sms_monthly_day_list->_23_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__23_rf" class="tbl_sms_monthly_day__23_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_23_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_23_rf" class="<?php echo $tbl_sms_monthly_day_list->_23_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_23_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__23_rf" class="tbl_sms_monthly_day__23_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_23_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_23_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_23_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_24_rf->Visible) { // 24_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_24_rf) == "") { ?>
		<th data-name="_24_rf" class="<?php echo $tbl_sms_monthly_day_list->_24_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__24_rf" class="tbl_sms_monthly_day__24_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_24_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_24_rf" class="<?php echo $tbl_sms_monthly_day_list->_24_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_24_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__24_rf" class="tbl_sms_monthly_day__24_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_24_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_24_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_24_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_25_rf->Visible) { // 25_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_25_rf) == "") { ?>
		<th data-name="_25_rf" class="<?php echo $tbl_sms_monthly_day_list->_25_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__25_rf" class="tbl_sms_monthly_day__25_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_25_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_25_rf" class="<?php echo $tbl_sms_monthly_day_list->_25_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_25_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__25_rf" class="tbl_sms_monthly_day__25_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_25_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_25_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_25_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_26_rf->Visible) { // 26_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_26_rf) == "") { ?>
		<th data-name="_26_rf" class="<?php echo $tbl_sms_monthly_day_list->_26_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__26_rf" class="tbl_sms_monthly_day__26_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_26_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_26_rf" class="<?php echo $tbl_sms_monthly_day_list->_26_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_26_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__26_rf" class="tbl_sms_monthly_day__26_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_26_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_26_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_26_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_27_rf->Visible) { // 27_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_27_rf) == "") { ?>
		<th data-name="_27_rf" class="<?php echo $tbl_sms_monthly_day_list->_27_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__27_rf" class="tbl_sms_monthly_day__27_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_27_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_27_rf" class="<?php echo $tbl_sms_monthly_day_list->_27_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_27_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__27_rf" class="tbl_sms_monthly_day__27_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_27_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_27_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_27_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_28_rf->Visible) { // 28_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_28_rf) == "") { ?>
		<th data-name="_28_rf" class="<?php echo $tbl_sms_monthly_day_list->_28_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__28_rf" class="tbl_sms_monthly_day__28_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_28_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_28_rf" class="<?php echo $tbl_sms_monthly_day_list->_28_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_28_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__28_rf" class="tbl_sms_monthly_day__28_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_28_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_28_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_28_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_29_rf->Visible) { // 29_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_29_rf) == "") { ?>
		<th data-name="_29_rf" class="<?php echo $tbl_sms_monthly_day_list->_29_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__29_rf" class="tbl_sms_monthly_day__29_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_29_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_29_rf" class="<?php echo $tbl_sms_monthly_day_list->_29_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_29_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__29_rf" class="tbl_sms_monthly_day__29_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_29_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_29_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_29_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_30_rf->Visible) { // 30_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_30_rf) == "") { ?>
		<th data-name="_30_rf" class="<?php echo $tbl_sms_monthly_day_list->_30_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__30_rf" class="tbl_sms_monthly_day__30_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_30_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_30_rf" class="<?php echo $tbl_sms_monthly_day_list->_30_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_30_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__30_rf" class="tbl_sms_monthly_day__30_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_30_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_30_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_30_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->_31_rf->Visible) { // 31_rf ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_31_rf) == "") { ?>
		<th data-name="_31_rf" class="<?php echo $tbl_sms_monthly_day_list->_31_rf->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day__31_rf" class="tbl_sms_monthly_day__31_rf"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_31_rf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_31_rf" class="<?php echo $tbl_sms_monthly_day_list->_31_rf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->_31_rf) ?>', 2);"><div id="elh_tbl_sms_monthly_day__31_rf" class="tbl_sms_monthly_day__31_rf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->_31_rf->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->_31_rf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->_31_rf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->SubDivisionId->Visible) { // SubDivisionId ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->SubDivisionId) == "") { ?>
		<th data-name="SubDivisionId" class="<?php echo $tbl_sms_monthly_day_list->SubDivisionId->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day_SubDivisionId" class="tbl_sms_monthly_day_SubDivisionId"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->SubDivisionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubDivisionId" class="<?php echo $tbl_sms_monthly_day_list->SubDivisionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->SubDivisionId) ?>', 2);"><div id="elh_tbl_sms_monthly_day_SubDivisionId" class="tbl_sms_monthly_day_SubDivisionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->SubDivisionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->SubDivisionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->SubDivisionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->Water_Year->Visible) { // Water_Year ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->Water_Year) == "") { ?>
		<th data-name="Water_Year" class="<?php echo $tbl_sms_monthly_day_list->Water_Year->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day_Water_Year" class="tbl_sms_monthly_day_Water_Year"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->Water_Year->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Water_Year" class="<?php echo $tbl_sms_monthly_day_list->Water_Year->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->Water_Year) ?>', 2);"><div id="elh_tbl_sms_monthly_day_Water_Year" class="tbl_sms_monthly_day_Water_Year">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->Water_Year->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->Water_Year->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->Water_Year->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->SenderMobileNumber) == "") { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day_SenderMobileNumber" class="tbl_sms_monthly_day_SenderMobileNumber"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SenderMobileNumber" class="<?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->SenderMobileNumber) ?>', 2);"><div id="elh_tbl_sms_monthly_day_SenderMobileNumber" class="tbl_sms_monthly_day_SenderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->SenderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->SenderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->IsChanged->Visible) { // IsChanged ?>
	<?php if ($tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->IsChanged) == "") { ?>
		<th data-name="IsChanged" class="<?php echo $tbl_sms_monthly_day_list->IsChanged->headerCellClass() ?>"><div id="elh_tbl_sms_monthly_day_IsChanged" class="tbl_sms_monthly_day_IsChanged"><div class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->IsChanged->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsChanged" class="<?php echo $tbl_sms_monthly_day_list->IsChanged->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_sms_monthly_day_list->SortUrl($tbl_sms_monthly_day_list->IsChanged) ?>', 2);"><div id="elh_tbl_sms_monthly_day_IsChanged" class="tbl_sms_monthly_day_IsChanged">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_sms_monthly_day_list->IsChanged->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_sms_monthly_day_list->IsChanged->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_sms_monthly_day_list->IsChanged->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tbl_sms_monthly_day_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tbl_sms_monthly_day_list->ExportAll && $tbl_sms_monthly_day_list->isExport()) {
	$tbl_sms_monthly_day_list->StopRecord = $tbl_sms_monthly_day_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tbl_sms_monthly_day_list->TotalRecords > $tbl_sms_monthly_day_list->StartRecord + $tbl_sms_monthly_day_list->DisplayRecords - 1)
		$tbl_sms_monthly_day_list->StopRecord = $tbl_sms_monthly_day_list->StartRecord + $tbl_sms_monthly_day_list->DisplayRecords - 1;
	else
		$tbl_sms_monthly_day_list->StopRecord = $tbl_sms_monthly_day_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($tbl_sms_monthly_day->isConfirm() || $tbl_sms_monthly_day_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($tbl_sms_monthly_day_list->FormKeyCountName) && ($tbl_sms_monthly_day_list->isGridAdd() || $tbl_sms_monthly_day_list->isGridEdit() || $tbl_sms_monthly_day->isConfirm())) {
		$tbl_sms_monthly_day_list->KeyCount = $CurrentForm->getValue($tbl_sms_monthly_day_list->FormKeyCountName);
		$tbl_sms_monthly_day_list->StopRecord = $tbl_sms_monthly_day_list->StartRecord + $tbl_sms_monthly_day_list->KeyCount - 1;
	}
}
$tbl_sms_monthly_day_list->RecordCount = $tbl_sms_monthly_day_list->StartRecord - 1;
if ($tbl_sms_monthly_day_list->Recordset && !$tbl_sms_monthly_day_list->Recordset->EOF) {
	$tbl_sms_monthly_day_list->Recordset->moveFirst();
	$selectLimit = $tbl_sms_monthly_day_list->UseSelectLimit;
	if (!$selectLimit && $tbl_sms_monthly_day_list->StartRecord > 1)
		$tbl_sms_monthly_day_list->Recordset->move($tbl_sms_monthly_day_list->StartRecord - 1);
} elseif (!$tbl_sms_monthly_day->AllowAddDeleteRow && $tbl_sms_monthly_day_list->StopRecord == 0) {
	$tbl_sms_monthly_day_list->StopRecord = $tbl_sms_monthly_day->GridAddRowCount;
}

// Initialize aggregate
$tbl_sms_monthly_day->RowType = ROWTYPE_AGGREGATEINIT;
$tbl_sms_monthly_day->resetAttributes();
$tbl_sms_monthly_day_list->renderRow();
$tbl_sms_monthly_day_list->EditRowCount = 0;
if ($tbl_sms_monthly_day_list->isEdit())
	$tbl_sms_monthly_day_list->RowIndex = 1;
if ($tbl_sms_monthly_day_list->isGridEdit())
	$tbl_sms_monthly_day_list->RowIndex = 0;
while ($tbl_sms_monthly_day_list->RecordCount < $tbl_sms_monthly_day_list->StopRecord) {
	$tbl_sms_monthly_day_list->RecordCount++;
	if ($tbl_sms_monthly_day_list->RecordCount >= $tbl_sms_monthly_day_list->StartRecord) {
		$tbl_sms_monthly_day_list->RowCount++;
		if ($tbl_sms_monthly_day_list->isGridAdd() || $tbl_sms_monthly_day_list->isGridEdit() || $tbl_sms_monthly_day->isConfirm()) {
			$tbl_sms_monthly_day_list->RowIndex++;
			$CurrentForm->Index = $tbl_sms_monthly_day_list->RowIndex;
			if ($CurrentForm->hasValue($tbl_sms_monthly_day_list->FormActionName) && ($tbl_sms_monthly_day->isConfirm() || $tbl_sms_monthly_day_list->EventCancelled))
				$tbl_sms_monthly_day_list->RowAction = strval($CurrentForm->getValue($tbl_sms_monthly_day_list->FormActionName));
			elseif ($tbl_sms_monthly_day_list->isGridAdd())
				$tbl_sms_monthly_day_list->RowAction = "insert";
			else
				$tbl_sms_monthly_day_list->RowAction = "";
		}

		// Set up key count
		$tbl_sms_monthly_day_list->KeyCount = $tbl_sms_monthly_day_list->RowIndex;

		// Init row class and style
		$tbl_sms_monthly_day->resetAttributes();
		$tbl_sms_monthly_day->CssClass = "";
		if ($tbl_sms_monthly_day_list->isGridAdd()) {
			$tbl_sms_monthly_day_list->loadRowValues(); // Load default values
		} else {
			$tbl_sms_monthly_day_list->loadRowValues($tbl_sms_monthly_day_list->Recordset); // Load row values
		}
		$tbl_sms_monthly_day->RowType = ROWTYPE_VIEW; // Render view
		if ($tbl_sms_monthly_day_list->isEdit()) {
			if ($tbl_sms_monthly_day_list->checkInlineEditKey() && $tbl_sms_monthly_day_list->EditRowCount == 0) { // Inline edit
				$tbl_sms_monthly_day->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($tbl_sms_monthly_day_list->isGridEdit()) { // Grid edit
			if ($tbl_sms_monthly_day->EventCancelled)
				$tbl_sms_monthly_day_list->restoreCurrentRowFormValues($tbl_sms_monthly_day_list->RowIndex); // Restore form values
			if ($tbl_sms_monthly_day_list->RowAction == "insert")
				$tbl_sms_monthly_day->RowType = ROWTYPE_ADD; // Render add
			else
				$tbl_sms_monthly_day->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_sms_monthly_day_list->isEdit() && $tbl_sms_monthly_day->RowType == ROWTYPE_EDIT && $tbl_sms_monthly_day->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$tbl_sms_monthly_day_list->restoreFormValues(); // Restore form values
		}
		if ($tbl_sms_monthly_day_list->isGridEdit() && ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT || $tbl_sms_monthly_day->RowType == ROWTYPE_ADD) && $tbl_sms_monthly_day->EventCancelled) // Update failed
			$tbl_sms_monthly_day_list->restoreCurrentRowFormValues($tbl_sms_monthly_day_list->RowIndex); // Restore form values
		if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) // Edit row
			$tbl_sms_monthly_day_list->EditRowCount++;

		// Set up row id / data-rowindex
		$tbl_sms_monthly_day->RowAttrs->merge(["data-rowindex" => $tbl_sms_monthly_day_list->RowCount, "id" => "r" . $tbl_sms_monthly_day_list->RowCount . "_tbl_sms_monthly_day", "data-rowtype" => $tbl_sms_monthly_day->RowType]);

		// Render row
		$tbl_sms_monthly_day_list->renderRow();

		// Render list options
		$tbl_sms_monthly_day_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_sms_monthly_day_list->RowAction != "delete" && $tbl_sms_monthly_day_list->RowAction != "insertdelete" && !($tbl_sms_monthly_day_list->RowAction == "insert" && $tbl_sms_monthly_day->isConfirm() && $tbl_sms_monthly_day_list->emptyRow())) {
?>
	<tr <?php echo $tbl_sms_monthly_day->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_sms_monthly_day_list->ListOptions->render("body", "left", $tbl_sms_monthly_day_list->RowCount);
?>
	<?php if ($tbl_sms_monthly_day_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $tbl_sms_monthly_day_list->StationId->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_StationId" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly_day" data-field="x_StationId" data-value-separator="<?php echo $tbl_sms_monthly_day_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId"<?php echo $tbl_sms_monthly_day_list->StationId->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_day_list->StationId->selectOptionListHtml("x{$tbl_sms_monthly_day_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_day_list->StationId->Lookup->getParamTag($tbl_sms_monthly_day_list, "p_x" . $tbl_sms_monthly_day_list->RowIndex . "_StationId") ?>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_StationId" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->StationId->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_StationId" class="form-group">
<span<?php echo $tbl_sms_monthly_day_list->StationId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_list->StationId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_StationId" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->StationId->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_StationId">
<span<?php echo $tbl_sms_monthly_day_list->StationId->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->StationId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_Slno" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Slno" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->Slno->CurrentValue) ?>">
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_Slno" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Slno" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->Slno->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT || $tbl_sms_monthly_day->CurrentMode == "edit") { ?>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_Slno" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Slno" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->Slno->CurrentValue) ?>">
<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->month_id->Visible) { // month_id ?>
		<td data-name="month_id" <?php echo $tbl_sms_monthly_day_list->month_id->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_month_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly_day" data-field="x_month_id" data-value-separator="<?php echo $tbl_sms_monthly_day_list->month_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id"<?php echo $tbl_sms_monthly_day_list->month_id->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_day_list->month_id->selectOptionListHtml("x{$tbl_sms_monthly_day_list->RowIndex}_month_id") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_day_list->month_id->Lookup->getParamTag($tbl_sms_monthly_day_list, "p_x" . $tbl_sms_monthly_day_list->RowIndex . "_month_id") ?>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_month_id" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->month_id->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_month_id" class="form-group">
<span<?php echo $tbl_sms_monthly_day_list->month_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_list->month_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_month_id" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->month_id->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_month_id">
<span<?php echo $tbl_sms_monthly_day_list->month_id->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->month_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_01_rf->Visible) { // 01_rf ?>
		<td data-name="_01_rf" <?php echo $tbl_sms_monthly_day_list->_01_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__01_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__01_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_01_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_01_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__01_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_01_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__01_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__01_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_01_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_01_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__01_rf">
<span<?php echo $tbl_sms_monthly_day_list->_01_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_01_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_02_rf->Visible) { // 02_rf ?>
		<td data-name="_02_rf" <?php echo $tbl_sms_monthly_day_list->_02_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__02_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__02_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_02_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_02_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__02_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_02_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__02_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__02_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_02_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_02_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__02_rf">
<span<?php echo $tbl_sms_monthly_day_list->_02_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_02_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_03_rf->Visible) { // 03_rf ?>
		<td data-name="_03_rf" <?php echo $tbl_sms_monthly_day_list->_03_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__03_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__03_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_03_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_03_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__03_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_03_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__03_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__03_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_03_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_03_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__03_rf">
<span<?php echo $tbl_sms_monthly_day_list->_03_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_03_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_04_rf->Visible) { // 04_rf ?>
		<td data-name="_04_rf" <?php echo $tbl_sms_monthly_day_list->_04_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__04_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__04_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_04_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_04_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__04_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_04_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__04_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__04_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_04_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_04_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__04_rf">
<span<?php echo $tbl_sms_monthly_day_list->_04_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_04_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_05_rf->Visible) { // 05_rf ?>
		<td data-name="_05_rf" <?php echo $tbl_sms_monthly_day_list->_05_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__05_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__05_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_05_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_05_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__05_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_05_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__05_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__05_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_05_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_05_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__05_rf">
<span<?php echo $tbl_sms_monthly_day_list->_05_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_05_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_06_rf->Visible) { // 06_rf ?>
		<td data-name="_06_rf" <?php echo $tbl_sms_monthly_day_list->_06_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__06_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__06_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_06_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_06_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__06_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_06_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__06_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__06_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_06_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_06_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__06_rf">
<span<?php echo $tbl_sms_monthly_day_list->_06_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_06_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_07_rf->Visible) { // 07_rf ?>
		<td data-name="_07_rf" <?php echo $tbl_sms_monthly_day_list->_07_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__07_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__07_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_07_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_07_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__07_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_07_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__07_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__07_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_07_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_07_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__07_rf">
<span<?php echo $tbl_sms_monthly_day_list->_07_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_07_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_08_rf->Visible) { // 08_rf ?>
		<td data-name="_08_rf" <?php echo $tbl_sms_monthly_day_list->_08_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__08_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__08_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_08_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_08_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__08_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_08_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__08_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__08_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_08_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_08_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__08_rf">
<span<?php echo $tbl_sms_monthly_day_list->_08_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_08_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_09_rf->Visible) { // 09_rf ?>
		<td data-name="_09_rf" <?php echo $tbl_sms_monthly_day_list->_09_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__09_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__09_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_09_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_09_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__09_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_09_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__09_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__09_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_09_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_09_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__09_rf">
<span<?php echo $tbl_sms_monthly_day_list->_09_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_09_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_10_rf->Visible) { // 10_rf ?>
		<td data-name="_10_rf" <?php echo $tbl_sms_monthly_day_list->_10_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__10_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__10_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_10_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_10_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__10_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_10_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__10_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__10_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_10_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_10_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__10_rf">
<span<?php echo $tbl_sms_monthly_day_list->_10_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_10_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_11_rf->Visible) { // 11_rf ?>
		<td data-name="_11_rf" <?php echo $tbl_sms_monthly_day_list->_11_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__11_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__11_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_11_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_11_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__11_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_11_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__11_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__11_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_11_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_11_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__11_rf">
<span<?php echo $tbl_sms_monthly_day_list->_11_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_11_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_12_rf->Visible) { // 12_rf ?>
		<td data-name="_12_rf" <?php echo $tbl_sms_monthly_day_list->_12_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__12_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__12_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_12_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_12_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__12_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_12_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__12_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__12_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_12_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_12_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__12_rf">
<span<?php echo $tbl_sms_monthly_day_list->_12_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_12_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_13_rf->Visible) { // 13_rf ?>
		<td data-name="_13_rf" <?php echo $tbl_sms_monthly_day_list->_13_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__13_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__13_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_13_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_13_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__13_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_13_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__13_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__13_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_13_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_13_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__13_rf">
<span<?php echo $tbl_sms_monthly_day_list->_13_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_13_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_14_rf->Visible) { // 14_rf ?>
		<td data-name="_14_rf" <?php echo $tbl_sms_monthly_day_list->_14_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__14_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__14_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_14_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_14_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__14_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_14_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__14_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__14_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_14_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_14_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__14_rf">
<span<?php echo $tbl_sms_monthly_day_list->_14_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_14_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_15_rf->Visible) { // 15_rf ?>
		<td data-name="_15_rf" <?php echo $tbl_sms_monthly_day_list->_15_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__15_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__15_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_15_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_15_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__15_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_15_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__15_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__15_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_15_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_15_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__15_rf">
<span<?php echo $tbl_sms_monthly_day_list->_15_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_15_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_16_rf->Visible) { // 16_rf ?>
		<td data-name="_16_rf" <?php echo $tbl_sms_monthly_day_list->_16_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__16_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__16_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_16_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_16_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__16_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_16_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__16_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__16_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_16_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_16_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__16_rf">
<span<?php echo $tbl_sms_monthly_day_list->_16_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_16_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_17_rf->Visible) { // 17_rf ?>
		<td data-name="_17_rf" <?php echo $tbl_sms_monthly_day_list->_17_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__17_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__17_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_17_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_17_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__17_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_17_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__17_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__17_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_17_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_17_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__17_rf">
<span<?php echo $tbl_sms_monthly_day_list->_17_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_17_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_18_rf->Visible) { // 18_rf ?>
		<td data-name="_18_rf" <?php echo $tbl_sms_monthly_day_list->_18_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__18_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__18_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_18_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_18_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__18_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_18_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__18_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__18_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_18_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_18_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__18_rf">
<span<?php echo $tbl_sms_monthly_day_list->_18_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_18_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_19_rf->Visible) { // 19_rf ?>
		<td data-name="_19_rf" <?php echo $tbl_sms_monthly_day_list->_19_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__19_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__19_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_19_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_19_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__19_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_19_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__19_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__19_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_19_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_19_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__19_rf">
<span<?php echo $tbl_sms_monthly_day_list->_19_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_19_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_20_rf->Visible) { // 20_rf ?>
		<td data-name="_20_rf" <?php echo $tbl_sms_monthly_day_list->_20_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__20_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__20_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_20_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_20_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__20_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_20_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__20_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__20_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_20_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_20_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__20_rf">
<span<?php echo $tbl_sms_monthly_day_list->_20_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_20_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_21_rf->Visible) { // 21_rf ?>
		<td data-name="_21_rf" <?php echo $tbl_sms_monthly_day_list->_21_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__21_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__21_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_21_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_21_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__21_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_21_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__21_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__21_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_21_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_21_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__21_rf">
<span<?php echo $tbl_sms_monthly_day_list->_21_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_21_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_22_rf->Visible) { // 22_rf ?>
		<td data-name="_22_rf" <?php echo $tbl_sms_monthly_day_list->_22_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__22_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__22_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_22_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_22_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__22_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_22_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__22_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__22_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_22_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_22_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__22_rf">
<span<?php echo $tbl_sms_monthly_day_list->_22_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_22_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_23_rf->Visible) { // 23_rf ?>
		<td data-name="_23_rf" <?php echo $tbl_sms_monthly_day_list->_23_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__23_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__23_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_23_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_23_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__23_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_23_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__23_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__23_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_23_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_23_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__23_rf">
<span<?php echo $tbl_sms_monthly_day_list->_23_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_23_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_24_rf->Visible) { // 24_rf ?>
		<td data-name="_24_rf" <?php echo $tbl_sms_monthly_day_list->_24_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__24_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__24_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" size="30" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_24_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_24_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__24_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_24_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__24_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__24_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" size="30" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_24_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_24_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__24_rf">
<span<?php echo $tbl_sms_monthly_day_list->_24_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_24_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_25_rf->Visible) { // 25_rf ?>
		<td data-name="_25_rf" <?php echo $tbl_sms_monthly_day_list->_25_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__25_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__25_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_25_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_25_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__25_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_25_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__25_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__25_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_25_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_25_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__25_rf">
<span<?php echo $tbl_sms_monthly_day_list->_25_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_25_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_26_rf->Visible) { // 26_rf ?>
		<td data-name="_26_rf" <?php echo $tbl_sms_monthly_day_list->_26_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__26_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__26_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_26_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_26_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__26_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_26_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__26_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__26_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_26_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_26_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__26_rf">
<span<?php echo $tbl_sms_monthly_day_list->_26_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_26_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_27_rf->Visible) { // 27_rf ?>
		<td data-name="_27_rf" <?php echo $tbl_sms_monthly_day_list->_27_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__27_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__27_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_27_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_27_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__27_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_27_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__27_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__27_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_27_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_27_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__27_rf">
<span<?php echo $tbl_sms_monthly_day_list->_27_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_27_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_28_rf->Visible) { // 28_rf ?>
		<td data-name="_28_rf" <?php echo $tbl_sms_monthly_day_list->_28_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__28_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__28_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_28_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_28_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__28_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_28_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__28_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__28_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_28_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_28_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__28_rf">
<span<?php echo $tbl_sms_monthly_day_list->_28_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_28_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_29_rf->Visible) { // 29_rf ?>
		<td data-name="_29_rf" <?php echo $tbl_sms_monthly_day_list->_29_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__29_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__29_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_29_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_29_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__29_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_29_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__29_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__29_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_29_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_29_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__29_rf">
<span<?php echo $tbl_sms_monthly_day_list->_29_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_29_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_30_rf->Visible) { // 30_rf ?>
		<td data-name="_30_rf" <?php echo $tbl_sms_monthly_day_list->_30_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__30_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__30_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_30_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_30_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__30_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_30_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__30_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__30_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_30_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_30_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__30_rf">
<span<?php echo $tbl_sms_monthly_day_list->_30_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_30_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_31_rf->Visible) { // 31_rf ?>
		<td data-name="_31_rf" <?php echo $tbl_sms_monthly_day_list->_31_rf->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__31_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__31_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_31_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_31_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__31_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_31_rf->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__31_rf" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__31_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_31_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_31_rf->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day__31_rf">
<span<?php echo $tbl_sms_monthly_day_list->_31_rf->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->_31_rf->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId" <?php echo $tbl_sms_monthly_day_list->SubDivisionId->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_SubDivisionId" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly_day" data-field="x_SubDivisionId" data-value-separator="<?php echo $tbl_sms_monthly_day_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId"<?php echo $tbl_sms_monthly_day_list->SubDivisionId->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_day_list->SubDivisionId->selectOptionListHtml("x{$tbl_sms_monthly_day_list->RowIndex}_SubDivisionId") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_day_list->SubDivisionId->Lookup->getParamTag($tbl_sms_monthly_day_list, "p_x" . $tbl_sms_monthly_day_list->RowIndex . "_SubDivisionId") ?>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_SubDivisionId" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->SubDivisionId->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_SubDivisionId" class="form-group">
<span<?php echo $tbl_sms_monthly_day_list->SubDivisionId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_list->SubDivisionId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_SubDivisionId" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->SubDivisionId->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_SubDivisionId">
<span<?php echo $tbl_sms_monthly_day_list->SubDivisionId->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->SubDivisionId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->Water_Year->Visible) { // Water_Year ?>
		<td data-name="Water_Year" <?php echo $tbl_sms_monthly_day_list->Water_Year->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_Water_Year" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x_Water_Year" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" size="30" maxlength="9" value="<?php echo $tbl_sms_monthly_day_list->Water_Year->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->Water_Year->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_Water_Year" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->Water_Year->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_Water_Year" class="form-group">
<span<?php echo $tbl_sms_monthly_day_list->Water_Year->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_list->Water_Year->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_Water_Year" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->Water_Year->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_Water_Year">
<span<?php echo $tbl_sms_monthly_day_list->Water_Year->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->Water_Year->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber" <?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_SenderMobileNumber" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" size="30" maxlength="25" value="<?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_SenderMobileNumber" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->SenderMobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_SenderMobileNumber" class="form-group">
<span<?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_list->SenderMobileNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->SenderMobileNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_SenderMobileNumber">
<span<?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->IsChanged->Visible) { // IsChanged ?>
		<td data-name="IsChanged" <?php echo $tbl_sms_monthly_day_list->IsChanged->cellAttributes() ?>>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_IsChanged" class="form-group">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x_IsChanged" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" size="30" maxlength="1" value="<?php echo $tbl_sms_monthly_day_list->IsChanged->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->IsChanged->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_IsChanged" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->IsChanged->OldValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_IsChanged" class="form-group">
<span<?php echo $tbl_sms_monthly_day_list->IsChanged->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_sms_monthly_day_list->IsChanged->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_IsChanged" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->IsChanged->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_sms_monthly_day_list->RowCount ?>_tbl_sms_monthly_day_IsChanged">
<span<?php echo $tbl_sms_monthly_day_list->IsChanged->viewAttributes() ?>><?php echo $tbl_sms_monthly_day_list->IsChanged->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_sms_monthly_day_list->ListOptions->render("body", "right", $tbl_sms_monthly_day_list->RowCount);
?>
	</tr>
<?php if ($tbl_sms_monthly_day->RowType == ROWTYPE_ADD || $tbl_sms_monthly_day->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ftbl_sms_monthly_daylist", "load"], function() {
	ftbl_sms_monthly_daylist.updateLists(<?php echo $tbl_sms_monthly_day_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$tbl_sms_monthly_day_list->isGridAdd())
		if (!$tbl_sms_monthly_day_list->Recordset->EOF)
			$tbl_sms_monthly_day_list->Recordset->moveNext();
}
?>
<?php
	if ($tbl_sms_monthly_day_list->isGridAdd() || $tbl_sms_monthly_day_list->isGridEdit()) {
		$tbl_sms_monthly_day_list->RowIndex = '$rowindex$';
		$tbl_sms_monthly_day_list->loadRowValues();

		// Set row properties
		$tbl_sms_monthly_day->resetAttributes();
		$tbl_sms_monthly_day->RowAttrs->merge(["data-rowindex" => $tbl_sms_monthly_day_list->RowIndex, "id" => "r0_tbl_sms_monthly_day", "data-rowtype" => ROWTYPE_ADD]);
		$tbl_sms_monthly_day->RowAttrs->appendClass("ew-template");
		$tbl_sms_monthly_day->RowType = ROWTYPE_ADD;

		// Render row
		$tbl_sms_monthly_day_list->renderRow();

		// Render list options
		$tbl_sms_monthly_day_list->renderListOptions();
		$tbl_sms_monthly_day_list->StartRowCount = 0;
?>
	<tr <?php echo $tbl_sms_monthly_day->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_sms_monthly_day_list->ListOptions->render("body", "left", $tbl_sms_monthly_day_list->RowIndex);
?>
	<?php if ($tbl_sms_monthly_day_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId">
<span id="el$rowindex$_tbl_sms_monthly_day_StationId" class="form-group tbl_sms_monthly_day_StationId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly_day" data-field="x_StationId" data-value-separator="<?php echo $tbl_sms_monthly_day_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId"<?php echo $tbl_sms_monthly_day_list->StationId->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_day_list->StationId->selectOptionListHtml("x{$tbl_sms_monthly_day_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_day_list->StationId->Lookup->getParamTag($tbl_sms_monthly_day_list, "p_x" . $tbl_sms_monthly_day_list->RowIndex . "_StationId") ?>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_StationId" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->StationId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->month_id->Visible) { // month_id ?>
		<td data-name="month_id">
<span id="el$rowindex$_tbl_sms_monthly_day_month_id" class="form-group tbl_sms_monthly_day_month_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly_day" data-field="x_month_id" data-value-separator="<?php echo $tbl_sms_monthly_day_list->month_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id"<?php echo $tbl_sms_monthly_day_list->month_id->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_day_list->month_id->selectOptionListHtml("x{$tbl_sms_monthly_day_list->RowIndex}_month_id") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_day_list->month_id->Lookup->getParamTag($tbl_sms_monthly_day_list, "p_x" . $tbl_sms_monthly_day_list->RowIndex . "_month_id") ?>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_month_id" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_month_id" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->month_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_01_rf->Visible) { // 01_rf ?>
		<td data-name="_01_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__01_rf" class="form-group tbl_sms_monthly_day__01_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__01_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_01_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_01_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__01_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__01_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_01_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_02_rf->Visible) { // 02_rf ?>
		<td data-name="_02_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__02_rf" class="form-group tbl_sms_monthly_day__02_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__02_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_02_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_02_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__02_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__02_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_02_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_03_rf->Visible) { // 03_rf ?>
		<td data-name="_03_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__03_rf" class="form-group tbl_sms_monthly_day__03_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__03_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_03_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_03_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__03_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__03_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_03_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_04_rf->Visible) { // 04_rf ?>
		<td data-name="_04_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__04_rf" class="form-group tbl_sms_monthly_day__04_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__04_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_04_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_04_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__04_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__04_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_04_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_05_rf->Visible) { // 05_rf ?>
		<td data-name="_05_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__05_rf" class="form-group tbl_sms_monthly_day__05_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__05_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_05_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_05_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__05_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__05_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_05_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_06_rf->Visible) { // 06_rf ?>
		<td data-name="_06_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__06_rf" class="form-group tbl_sms_monthly_day__06_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__06_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_06_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_06_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__06_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__06_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_06_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_07_rf->Visible) { // 07_rf ?>
		<td data-name="_07_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__07_rf" class="form-group tbl_sms_monthly_day__07_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__07_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_07_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_07_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__07_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__07_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_07_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_08_rf->Visible) { // 08_rf ?>
		<td data-name="_08_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__08_rf" class="form-group tbl_sms_monthly_day__08_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__08_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_08_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_08_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__08_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__08_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_08_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_09_rf->Visible) { // 09_rf ?>
		<td data-name="_09_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__09_rf" class="form-group tbl_sms_monthly_day__09_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__09_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_09_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_09_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__09_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__09_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_09_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_10_rf->Visible) { // 10_rf ?>
		<td data-name="_10_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__10_rf" class="form-group tbl_sms_monthly_day__10_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__10_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_10_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_10_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__10_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__10_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_10_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_11_rf->Visible) { // 11_rf ?>
		<td data-name="_11_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__11_rf" class="form-group tbl_sms_monthly_day__11_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__11_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_11_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_11_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__11_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__11_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_11_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_12_rf->Visible) { // 12_rf ?>
		<td data-name="_12_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__12_rf" class="form-group tbl_sms_monthly_day__12_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__12_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_12_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_12_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__12_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__12_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_12_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_13_rf->Visible) { // 13_rf ?>
		<td data-name="_13_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__13_rf" class="form-group tbl_sms_monthly_day__13_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__13_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_13_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_13_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__13_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__13_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_13_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_14_rf->Visible) { // 14_rf ?>
		<td data-name="_14_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__14_rf" class="form-group tbl_sms_monthly_day__14_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__14_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_14_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_14_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__14_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__14_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_14_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_15_rf->Visible) { // 15_rf ?>
		<td data-name="_15_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__15_rf" class="form-group tbl_sms_monthly_day__15_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__15_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_15_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_15_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__15_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__15_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_15_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_16_rf->Visible) { // 16_rf ?>
		<td data-name="_16_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__16_rf" class="form-group tbl_sms_monthly_day__16_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__16_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_16_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_16_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__16_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__16_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_16_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_17_rf->Visible) { // 17_rf ?>
		<td data-name="_17_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__17_rf" class="form-group tbl_sms_monthly_day__17_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__17_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_17_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_17_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__17_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__17_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_17_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_18_rf->Visible) { // 18_rf ?>
		<td data-name="_18_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__18_rf" class="form-group tbl_sms_monthly_day__18_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__18_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_18_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_18_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__18_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__18_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_18_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_19_rf->Visible) { // 19_rf ?>
		<td data-name="_19_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__19_rf" class="form-group tbl_sms_monthly_day__19_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__19_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_19_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_19_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__19_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__19_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_19_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_20_rf->Visible) { // 20_rf ?>
		<td data-name="_20_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__20_rf" class="form-group tbl_sms_monthly_day__20_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__20_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_20_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_20_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__20_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__20_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_20_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_21_rf->Visible) { // 21_rf ?>
		<td data-name="_21_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__21_rf" class="form-group tbl_sms_monthly_day__21_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__21_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_21_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_21_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__21_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__21_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_21_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_22_rf->Visible) { // 22_rf ?>
		<td data-name="_22_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__22_rf" class="form-group tbl_sms_monthly_day__22_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__22_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_22_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_22_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__22_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__22_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_22_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_23_rf->Visible) { // 23_rf ?>
		<td data-name="_23_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__23_rf" class="form-group tbl_sms_monthly_day__23_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__23_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_23_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_23_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__23_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__23_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_23_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_24_rf->Visible) { // 24_rf ?>
		<td data-name="_24_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__24_rf" class="form-group tbl_sms_monthly_day__24_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__24_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" size="30" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_24_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_24_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__24_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__24_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_24_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_25_rf->Visible) { // 25_rf ?>
		<td data-name="_25_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__25_rf" class="form-group tbl_sms_monthly_day__25_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__25_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_25_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_25_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__25_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__25_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_25_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_26_rf->Visible) { // 26_rf ?>
		<td data-name="_26_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__26_rf" class="form-group tbl_sms_monthly_day__26_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__26_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_26_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_26_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__26_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__26_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_26_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_27_rf->Visible) { // 27_rf ?>
		<td data-name="_27_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__27_rf" class="form-group tbl_sms_monthly_day__27_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__27_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_27_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_27_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__27_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__27_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_27_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_28_rf->Visible) { // 28_rf ?>
		<td data-name="_28_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__28_rf" class="form-group tbl_sms_monthly_day__28_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__28_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_28_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_28_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__28_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__28_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_28_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_29_rf->Visible) { // 29_rf ?>
		<td data-name="_29_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__29_rf" class="form-group tbl_sms_monthly_day__29_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__29_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_29_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_29_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__29_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__29_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_29_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_30_rf->Visible) { // 30_rf ?>
		<td data-name="_30_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__30_rf" class="form-group tbl_sms_monthly_day__30_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__30_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_30_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_30_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__30_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__30_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_30_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->_31_rf->Visible) { // 31_rf ?>
		<td data-name="_31_rf">
<span id="el$rowindex$_tbl_sms_monthly_day__31_rf" class="form-group tbl_sms_monthly_day__31_rf">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x__31_rf" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" size="5" maxlength="7" value="<?php echo $tbl_sms_monthly_day_list->_31_rf->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->_31_rf->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x__31_rf" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>__31_rf" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->_31_rf->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->SubDivisionId->Visible) { // SubDivisionId ?>
		<td data-name="SubDivisionId">
<span id="el$rowindex$_tbl_sms_monthly_day_SubDivisionId" class="form-group tbl_sms_monthly_day_SubDivisionId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_sms_monthly_day" data-field="x_SubDivisionId" data-value-separator="<?php echo $tbl_sms_monthly_day_list->SubDivisionId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId"<?php echo $tbl_sms_monthly_day_list->SubDivisionId->editAttributes() ?>>
			<?php echo $tbl_sms_monthly_day_list->SubDivisionId->selectOptionListHtml("x{$tbl_sms_monthly_day_list->RowIndex}_SubDivisionId") ?>
		</select>
</div>
<?php echo $tbl_sms_monthly_day_list->SubDivisionId->Lookup->getParamTag($tbl_sms_monthly_day_list, "p_x" . $tbl_sms_monthly_day_list->RowIndex . "_SubDivisionId") ?>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_SubDivisionId" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SubDivisionId" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->SubDivisionId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->Water_Year->Visible) { // Water_Year ?>
		<td data-name="Water_Year">
<span id="el$rowindex$_tbl_sms_monthly_day_Water_Year" class="form-group tbl_sms_monthly_day_Water_Year">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x_Water_Year" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" size="30" maxlength="9" value="<?php echo $tbl_sms_monthly_day_list->Water_Year->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->Water_Year->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_Water_Year" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_Water_Year" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->Water_Year->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->SenderMobileNumber->Visible) { // SenderMobileNumber ?>
		<td data-name="SenderMobileNumber">
<span id="el$rowindex$_tbl_sms_monthly_day_SenderMobileNumber" class="form-group tbl_sms_monthly_day_SenderMobileNumber">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x_SenderMobileNumber" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" size="30" maxlength="25" value="<?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->SenderMobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_SenderMobileNumber" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_SenderMobileNumber" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->SenderMobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_sms_monthly_day_list->IsChanged->Visible) { // IsChanged ?>
		<td data-name="IsChanged">
<span id="el$rowindex$_tbl_sms_monthly_day_IsChanged" class="form-group tbl_sms_monthly_day_IsChanged">
<input type="text" data-table="tbl_sms_monthly_day" data-field="x_IsChanged" name="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" id="x<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" size="30" maxlength="1" value="<?php echo $tbl_sms_monthly_day_list->IsChanged->EditValue ?>"<?php echo $tbl_sms_monthly_day_list->IsChanged->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_sms_monthly_day" data-field="x_IsChanged" name="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" id="o<?php echo $tbl_sms_monthly_day_list->RowIndex ?>_IsChanged" value="<?php echo HtmlEncode($tbl_sms_monthly_day_list->IsChanged->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_sms_monthly_day_list->ListOptions->render("body", "right", $tbl_sms_monthly_day_list->RowIndex);
?>
<script>
loadjs.ready(["ftbl_sms_monthly_daylist", "load"], function() {
	ftbl_sms_monthly_daylist.updateLists(<?php echo $tbl_sms_monthly_day_list->RowIndex ?>);
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
<?php if ($tbl_sms_monthly_day_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $tbl_sms_monthly_day_list->FormKeyCountName ?>" id="<?php echo $tbl_sms_monthly_day_list->FormKeyCountName ?>" value="<?php echo $tbl_sms_monthly_day_list->KeyCount ?>">
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $tbl_sms_monthly_day_list->FormKeyCountName ?>" id="<?php echo $tbl_sms_monthly_day_list->FormKeyCountName ?>" value="<?php echo $tbl_sms_monthly_day_list->KeyCount ?>">
<?php echo $tbl_sms_monthly_day_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$tbl_sms_monthly_day->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tbl_sms_monthly_day_list->Recordset)
	$tbl_sms_monthly_day_list->Recordset->Close();
?>
<?php if (!$tbl_sms_monthly_day_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tbl_sms_monthly_day_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_sms_monthly_day_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_sms_monthly_day_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tbl_sms_monthly_day_list->TotalRecords == 0 && !$tbl_sms_monthly_day->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tbl_sms_monthly_day_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tbl_sms_monthly_day_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tbl_sms_monthly_day_list->isExport()) { ?>
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
$tbl_sms_monthly_day_list->terminate();
?>