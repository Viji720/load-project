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
$tbl_hmsdata_edit = new tbl_hmsdata_edit();

// Run the page
$tbl_hmsdata_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_hmsdata_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftbl_hmsdataedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ftbl_hmsdataedit = currentForm = new ew.Form("ftbl_hmsdataedit", "edit");

	// Validate form
	ftbl_hmsdataedit.validate = function() {
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
			<?php if ($tbl_hmsdata_edit->Slno->Required) { ?>
				elm = this.getElements("x" + infix + "_Slno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Slno->caption(), $tbl_hmsdata_edit->Slno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_hmsdata_edit->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->StationId->caption(), $tbl_hmsdata_edit->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_hmsdata_edit->obs_DateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_DateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->obs_DateTime->caption(), $tbl_hmsdata_edit->obs_DateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_obs_DateTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->obs_DateTime->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Temp_water_in_pan_inC_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->caption(), $tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Temp_water_in_pan_inC_830AM");
				if (elm && !ew.checkRange(elm.value, 0, 70))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Temp_water_in_pan_inC_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->caption(), $tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Temp_water_in_pan_inC_530PM");
				if (elm && !ew.checkRange(elm.value, 0, 70))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->App_Evaporation_inMM_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_App_Evaporation_inMM_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->App_Evaporation_inMM_830AM->caption(), $tbl_hmsdata_edit->App_Evaporation_inMM_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_App_Evaporation_inMM_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->App_Evaporation_inMM_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->App_Evaporation_inMM_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_App_Evaporation_inMM_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->App_Evaporation_inMM_530PM->caption(), $tbl_hmsdata_edit->App_Evaporation_inMM_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_App_Evaporation_inMM_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->App_Evaporation_inMM_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Rainfall_inMM_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Rainfall_inMM_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Rainfall_inMM_830AM->caption(), $tbl_hmsdata_edit->Rainfall_inMM_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Rainfall_inMM_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Rainfall_inMM_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Rainfall_inMM_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Rainfall_inMM_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Rainfall_inMM_530PM->caption(), $tbl_hmsdata_edit->Rainfall_inMM_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Rainfall_inMM_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Rainfall_inMM_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_inMM_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->caption(), $tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_inMM_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_inMM_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->caption(), $tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_inMM_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->Required) { ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_DaywithRain_inMM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->caption(), $tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_DaywithRain_inMM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->Required) { ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_DaywithNoRain_inMM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->caption(), $tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_DaywithNoRain_inMM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Dry_Bulb_Temp_inC_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->caption(), $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Dry_Bulb_Temp_inC_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Wet_Bulb_Temp_inC_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->caption(), $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Wet_Bulb_Temp_inC_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Vapour_Temp_inC_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Vapour_Temp_inC_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Vapour_Temp_inC_830AM->caption(), $tbl_hmsdata_edit->Vapour_Temp_inC_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vapour_Temp_inC_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Vapour_Temp_inC_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Dry_Bulb_Temp_inC_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->caption(), $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Dry_Bulb_Temp_inC_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Wet_Bulb_Temp_inC_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->caption(), $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Wet_Bulb_Temp_inC_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Vapour_Temp_inC_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Vapour_Temp_inC_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Vapour_Temp_inC_530PM->caption(), $tbl_hmsdata_edit->Vapour_Temp_inC_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vapour_Temp_inC_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Vapour_Temp_inC_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Max_Temp_inC->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Temp_inC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Max_Temp_inC->caption(), $tbl_hmsdata_edit->Max_Temp_inC->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Max_Temp_inC");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Max_Temp_inC->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Min_Temp_inC->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Temp_inC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Min_Temp_inC->caption(), $tbl_hmsdata_edit->Min_Temp_inC->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Min_Temp_inC");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Min_Temp_inC->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Total_Wind_Run_inKM_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->caption(), $tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Total_Wind_Run_inKM_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Total_Wind_Run_inKM_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->caption(), $tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Total_Wind_Run_inKM_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Average_Wind_Speed_inKM->Required) { ?>
				elm = this.getElements("x" + infix + "_Average_Wind_Speed_inKM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Average_Wind_Speed_inKM->caption(), $tbl_hmsdata_edit->Average_Wind_Speed_inKM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Average_Wind_Speed_inKM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Average_Wind_Speed_inKM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->Required) { ?>
				elm = this.getElements("x" + infix + "_Number_of_Hours_of_Brightsuned");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->caption(), $tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Number_of_Hours_of_Brightsuned");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Relative_Humidity_in_Precentage_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->caption(), $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Relative_Humidity_in_Precentage_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Relative_Humidity_in_Precentage_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->caption(), $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Relative_Humidity_in_Precentage_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->obs_remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->obs_remarks->caption(), $tbl_hmsdata_edit->obs_remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_hmsdata_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Status->caption(), $tbl_hmsdata_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Status->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->Validated->Required) { ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->Validated->caption(), $tbl_hmsdata_edit->Validated->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_edit->Validated->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_edit->isFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_isFreeze[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_edit->isFreeze->caption(), $tbl_hmsdata_edit->isFreeze->RequiredErrorMessage)) ?>");
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
	ftbl_hmsdataedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_hmsdataedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_hmsdataedit.lists["x_StationId"] = <?php echo $tbl_hmsdata_edit->StationId->Lookup->toClientList($tbl_hmsdata_edit) ?>;
	ftbl_hmsdataedit.lists["x_StationId"].options = <?php echo JsonEncode($tbl_hmsdata_edit->StationId->lookupOptions()) ?>;
	ftbl_hmsdataedit.lists["x_isFreeze[]"] = <?php echo $tbl_hmsdata_edit->isFreeze->Lookup->toClientList($tbl_hmsdata_edit) ?>;
	ftbl_hmsdataedit.lists["x_isFreeze[]"].options = <?php echo JsonEncode($tbl_hmsdata_edit->isFreeze->options(FALSE, TRUE)) ?>;
	loadjs.done("ftbl_hmsdataedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tbl_hmsdata_edit->showPageHeader(); ?>
<?php
$tbl_hmsdata_edit->showMessage();
?>
<form name="ftbl_hmsdataedit" id="ftbl_hmsdataedit" class="<?php echo $tbl_hmsdata_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_hmsdata">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tbl_hmsdata_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tbl_hmsdata_edit->Slno->Visible) { // Slno ?>
	<div id="r_Slno" class="form-group row">
		<label id="elh_tbl_hmsdata_Slno" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Slno->caption() ?><?php echo $tbl_hmsdata_edit->Slno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Slno->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Slno">
<span<?php echo $tbl_hmsdata_edit->Slno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_hmsdata_edit->Slno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Slno" name="x_Slno" id="x_Slno" value="<?php echo HtmlEncode($tbl_hmsdata_edit->Slno->CurrentValue) ?>">
<?php echo $tbl_hmsdata_edit->Slno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->StationId->Visible) { // StationId ?>
	<div id="r_StationId" class="form-group row">
		<label id="elh_tbl_hmsdata_StationId" for="x_StationId" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->StationId->caption() ?><?php echo $tbl_hmsdata_edit->StationId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->StationId->cellAttributes() ?>>
<span id="el_tbl_hmsdata_StationId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_hmsdata" data-field="x_StationId" data-value-separator="<?php echo $tbl_hmsdata_edit->StationId->displayValueSeparatorAttribute() ?>" id="x_StationId" name="x_StationId"<?php echo $tbl_hmsdata_edit->StationId->editAttributes() ?>>
			<?php echo $tbl_hmsdata_edit->StationId->selectOptionListHtml("x_StationId") ?>
		</select>
</div>
<?php echo $tbl_hmsdata_edit->StationId->Lookup->getParamTag($tbl_hmsdata_edit, "p_x_StationId") ?>
</span>
<?php echo $tbl_hmsdata_edit->StationId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->obs_DateTime->Visible) { // obs_DateTime ?>
	<div id="r_obs_DateTime" class="form-group row">
		<label id="elh_tbl_hmsdata_obs_DateTime" for="x_obs_DateTime" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->obs_DateTime->caption() ?><?php echo $tbl_hmsdata_edit->obs_DateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->obs_DateTime->cellAttributes() ?>>
<span id="el_tbl_hmsdata_obs_DateTime">
<input type="text" data-table="tbl_hmsdata" data-field="x_obs_DateTime" data-format="7" name="x_obs_DateTime" id="x_obs_DateTime" maxlength="10" value="<?php echo $tbl_hmsdata_edit->obs_DateTime->EditValue ?>"<?php echo $tbl_hmsdata_edit->obs_DateTime->editAttributes() ?>>
<?php if (!$tbl_hmsdata_edit->obs_DateTime->ReadOnly && !$tbl_hmsdata_edit->obs_DateTime->Disabled && !isset($tbl_hmsdata_edit->obs_DateTime->EditAttrs["readonly"]) && !isset($tbl_hmsdata_edit->obs_DateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_hmsdataedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_hmsdataedit", "x_obs_DateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $tbl_hmsdata_edit->obs_DateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->Visible) { // Temp_water_in_pan_inC_830AM ?>
	<div id="r_Temp_water_in_pan_inC_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_Temp_water_in_pan_inC_830AM" for="x_Temp_water_in_pan_inC_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->caption() ?><?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Temp_water_in_pan_inC_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_830AM" name="x_Temp_water_in_pan_inC_830AM" id="x_Temp_water_in_pan_inC_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->Visible) { // Temp_water_in_pan_inC_530PM ?>
	<div id="r_Temp_water_in_pan_inC_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_Temp_water_in_pan_inC_530PM" for="x_Temp_water_in_pan_inC_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->caption() ?><?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Temp_water_in_pan_inC_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_530PM" name="x_Temp_water_in_pan_inC_530PM" id="x_Temp_water_in_pan_inC_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Temp_water_in_pan_inC_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->App_Evaporation_inMM_830AM->Visible) { // App_Evaporation_inMM_830AM ?>
	<div id="r_App_Evaporation_inMM_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_App_Evaporation_inMM_830AM" for="x_App_Evaporation_inMM_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_830AM->caption() ?><?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_App_Evaporation_inMM_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_830AM" name="x_App_Evaporation_inMM_830AM" id="x_App_Evaporation_inMM_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->App_Evaporation_inMM_530PM->Visible) { // App_Evaporation_inMM_530PM ?>
	<div id="r_App_Evaporation_inMM_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_App_Evaporation_inMM_530PM" for="x_App_Evaporation_inMM_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_530PM->caption() ?><?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_App_Evaporation_inMM_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_530PM" name="x_App_Evaporation_inMM_530PM" id="x_App_Evaporation_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->App_Evaporation_inMM_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Rainfall_inMM_830AM->Visible) { // Rainfall_inMM_830AM ?>
	<div id="r_Rainfall_inMM_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_Rainfall_inMM_830AM" for="x_Rainfall_inMM_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Rainfall_inMM_830AM->caption() ?><?php echo $tbl_hmsdata_edit->Rainfall_inMM_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Rainfall_inMM_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Rainfall_inMM_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_830AM" name="x_Rainfall_inMM_830AM" id="x_Rainfall_inMM_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Rainfall_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Rainfall_inMM_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Rainfall_inMM_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Rainfall_inMM_530PM->Visible) { // Rainfall_inMM_530PM ?>
	<div id="r_Rainfall_inMM_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_Rainfall_inMM_530PM" for="x_Rainfall_inMM_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Rainfall_inMM_530PM->caption() ?><?php echo $tbl_hmsdata_edit->Rainfall_inMM_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Rainfall_inMM_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Rainfall_inMM_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_530PM" name="x_Rainfall_inMM_530PM" id="x_Rainfall_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Rainfall_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Rainfall_inMM_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Rainfall_inMM_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->Visible) { // Evaporation_curing_inMM_830AM ?>
	<div id="r_Evaporation_curing_inMM_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_Evaporation_curing_inMM_830AM" for="x_Evaporation_curing_inMM_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->caption() ?><?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Evaporation_curing_inMM_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_830AM" name="x_Evaporation_curing_inMM_830AM" id="x_Evaporation_curing_inMM_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->Visible) { // Evaporation_curing_inMM_530PM ?>
	<div id="r_Evaporation_curing_inMM_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_Evaporation_curing_inMM_530PM" for="x_Evaporation_curing_inMM_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->caption() ?><?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Evaporation_curing_inMM_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_530PM" name="x_Evaporation_curing_inMM_530PM" id="x_Evaporation_curing_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Evaporation_curing_inMM_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->Visible) { // Evaporation_curing_DaywithRain_inMM ?>
	<div id="r_Evaporation_curing_DaywithRain_inMM" class="form-group row">
		<label id="elh_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM" for="x_Evaporation_curing_DaywithRain_inMM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->caption() ?><?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithRain_inMM" name="x_Evaporation_curing_DaywithRain_inMM" id="x_Evaporation_curing_DaywithRain_inMM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithRain_inMM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->Visible) { // Evaporation_curing_DaywithNoRain_inMM ?>
	<div id="r_Evaporation_curing_DaywithNoRain_inMM" class="form-group row">
		<label id="elh_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM" for="x_Evaporation_curing_DaywithNoRain_inMM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->caption() ?><?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithNoRain_inMM" name="x_Evaporation_curing_DaywithNoRain_inMM" id="x_Evaporation_curing_DaywithNoRain_inMM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Evaporation_curing_DaywithNoRain_inMM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->Visible) { // Dry_Bulb_Temp_inC_830AM ?>
	<div id="r_Dry_Bulb_Temp_inC_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM" for="x_Dry_Bulb_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->caption() ?><?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_830AM" name="x_Dry_Bulb_Temp_inC_830AM" id="x_Dry_Bulb_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->Visible) { // Wet_Bulb_Temp_inC_830AM ?>
	<div id="r_Wet_Bulb_Temp_inC_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM" for="x_Wet_Bulb_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->caption() ?><?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_830AM" name="x_Wet_Bulb_Temp_inC_830AM" id="x_Wet_Bulb_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Vapour_Temp_inC_830AM->Visible) { // Vapour_Temp_inC_830AM ?>
	<div id="r_Vapour_Temp_inC_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_Vapour_Temp_inC_830AM" for="x_Vapour_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_830AM->caption() ?><?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Vapour_Temp_inC_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_830AM" name="x_Vapour_Temp_inC_830AM" id="x_Vapour_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->Visible) { // Dry_Bulb_Temp_inC_530PM ?>
	<div id="r_Dry_Bulb_Temp_inC_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM" for="x_Dry_Bulb_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->caption() ?><?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_530PM" name="x_Dry_Bulb_Temp_inC_530PM" id="x_Dry_Bulb_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Dry_Bulb_Temp_inC_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->Visible) { // Wet_Bulb_Temp_inC_530PM ?>
	<div id="r_Wet_Bulb_Temp_inC_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM" for="x_Wet_Bulb_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->caption() ?><?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_530PM" name="x_Wet_Bulb_Temp_inC_530PM" id="x_Wet_Bulb_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Wet_Bulb_Temp_inC_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Vapour_Temp_inC_530PM->Visible) { // Vapour_Temp_inC_530PM ?>
	<div id="r_Vapour_Temp_inC_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_Vapour_Temp_inC_530PM" for="x_Vapour_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_530PM->caption() ?><?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Vapour_Temp_inC_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_530PM" name="x_Vapour_Temp_inC_530PM" id="x_Vapour_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Vapour_Temp_inC_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Max_Temp_inC->Visible) { // Max_Temp_inC ?>
	<div id="r_Max_Temp_inC" class="form-group row">
		<label id="elh_tbl_hmsdata_Max_Temp_inC" for="x_Max_Temp_inC" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Max_Temp_inC->caption() ?><?php echo $tbl_hmsdata_edit->Max_Temp_inC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Max_Temp_inC->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Max_Temp_inC">
<input type="text" data-table="tbl_hmsdata" data-field="x_Max_Temp_inC" name="x_Max_Temp_inC" id="x_Max_Temp_inC" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Max_Temp_inC->EditValue ?>"<?php echo $tbl_hmsdata_edit->Max_Temp_inC->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Max_Temp_inC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Min_Temp_inC->Visible) { // Min_Temp_inC ?>
	<div id="r_Min_Temp_inC" class="form-group row">
		<label id="elh_tbl_hmsdata_Min_Temp_inC" for="x_Min_Temp_inC" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Min_Temp_inC->caption() ?><?php echo $tbl_hmsdata_edit->Min_Temp_inC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Min_Temp_inC->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Min_Temp_inC">
<input type="text" data-table="tbl_hmsdata" data-field="x_Min_Temp_inC" name="x_Min_Temp_inC" id="x_Min_Temp_inC" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Min_Temp_inC->EditValue ?>"<?php echo $tbl_hmsdata_edit->Min_Temp_inC->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Min_Temp_inC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->Visible) { // Total_Wind_Run_inKM_830AM ?>
	<div id="r_Total_Wind_Run_inKM_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_Total_Wind_Run_inKM_830AM" for="x_Total_Wind_Run_inKM_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->caption() ?><?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Total_Wind_Run_inKM_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_830AM" name="x_Total_Wind_Run_inKM_830AM" id="x_Total_Wind_Run_inKM_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->Visible) { // Total_Wind_Run_inKM_530PM ?>
	<div id="r_Total_Wind_Run_inKM_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_Total_Wind_Run_inKM_530PM" for="x_Total_Wind_Run_inKM_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->caption() ?><?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Total_Wind_Run_inKM_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_530PM" name="x_Total_Wind_Run_inKM_530PM" id="x_Total_Wind_Run_inKM_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Total_Wind_Run_inKM_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Average_Wind_Speed_inKM->Visible) { // Average_Wind_Speed_inKM ?>
	<div id="r_Average_Wind_Speed_inKM" class="form-group row">
		<label id="elh_tbl_hmsdata_Average_Wind_Speed_inKM" for="x_Average_Wind_Speed_inKM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Average_Wind_Speed_inKM->caption() ?><?php echo $tbl_hmsdata_edit->Average_Wind_Speed_inKM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Average_Wind_Speed_inKM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Average_Wind_Speed_inKM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Average_Wind_Speed_inKM" name="x_Average_Wind_Speed_inKM" id="x_Average_Wind_Speed_inKM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Average_Wind_Speed_inKM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Average_Wind_Speed_inKM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Average_Wind_Speed_inKM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->Visible) { // Number_of_Hours_of_Brightsuned ?>
	<div id="r_Number_of_Hours_of_Brightsuned" class="form-group row">
		<label id="elh_tbl_hmsdata_Number_of_Hours_of_Brightsuned" for="x_Number_of_Hours_of_Brightsuned" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->caption() ?><?php echo $tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Number_of_Hours_of_Brightsuned">
<input type="text" data-table="tbl_hmsdata" data-field="x_Number_of_Hours_of_Brightsuned" name="x_Number_of_Hours_of_Brightsuned" id="x_Number_of_Hours_of_Brightsuned" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->EditValue ?>"<?php echo $tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Number_of_Hours_of_Brightsuned->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->Visible) { // Relative_Humidity_in_Precentage_830AM ?>
	<div id="r_Relative_Humidity_in_Precentage_830AM" class="form-group row">
		<label id="elh_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM" for="x_Relative_Humidity_in_Precentage_830AM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->caption() ?><?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_830AM" name="x_Relative_Humidity_in_Precentage_830AM" id="x_Relative_Humidity_in_Precentage_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_830AM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->Visible) { // Relative_Humidity_in_Precentage_530PM ?>
	<div id="r_Relative_Humidity_in_Precentage_530PM" class="form-group row">
		<label id="elh_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM" for="x_Relative_Humidity_in_Precentage_530PM" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->caption() ?><?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_530PM" name="x_Relative_Humidity_in_Precentage_530PM" id="x_Relative_Humidity_in_Precentage_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->EditValue ?>"<?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Relative_Humidity_in_Precentage_530PM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->obs_remarks->Visible) { // obs_remarks ?>
	<div id="r_obs_remarks" class="form-group row">
		<label id="elh_tbl_hmsdata_obs_remarks" for="x_obs_remarks" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->obs_remarks->caption() ?><?php echo $tbl_hmsdata_edit->obs_remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->obs_remarks->cellAttributes() ?>>
<span id="el_tbl_hmsdata_obs_remarks">
<input type="text" data-table="tbl_hmsdata" data-field="x_obs_remarks" name="x_obs_remarks" id="x_obs_remarks" size="30" maxlength="50" value="<?php echo $tbl_hmsdata_edit->obs_remarks->EditValue ?>"<?php echo $tbl_hmsdata_edit->obs_remarks->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->obs_remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_tbl_hmsdata_Status" for="x_Status" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Status->caption() ?><?php echo $tbl_hmsdata_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Status->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Status">
<input type="text" data-table="tbl_hmsdata" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="11" value="<?php echo $tbl_hmsdata_edit->Status->EditValue ?>"<?php echo $tbl_hmsdata_edit->Status->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->Validated->Visible) { // Validated ?>
	<div id="r_Validated" class="form-group row">
		<label id="elh_tbl_hmsdata_Validated" for="x_Validated" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->Validated->caption() ?><?php echo $tbl_hmsdata_edit->Validated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->Validated->cellAttributes() ?>>
<span id="el_tbl_hmsdata_Validated">
<input type="text" data-table="tbl_hmsdata" data-field="x_Validated" name="x_Validated" id="x_Validated" size="30" maxlength="11" value="<?php echo $tbl_hmsdata_edit->Validated->EditValue ?>"<?php echo $tbl_hmsdata_edit->Validated->editAttributes() ?>>
</span>
<?php echo $tbl_hmsdata_edit->Validated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tbl_hmsdata_edit->isFreeze->Visible) { // isFreeze ?>
	<div id="r_isFreeze" class="form-group row">
		<label id="elh_tbl_hmsdata_isFreeze" class="<?php echo $tbl_hmsdata_edit->LeftColumnClass ?>"><?php echo $tbl_hmsdata_edit->isFreeze->caption() ?><?php echo $tbl_hmsdata_edit->isFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tbl_hmsdata_edit->RightColumnClass ?>"><div <?php echo $tbl_hmsdata_edit->isFreeze->cellAttributes() ?>>
<span id="el_tbl_hmsdata_isFreeze">
<?php
$selwrk = ConvertToBool($tbl_hmsdata_edit->isFreeze->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="tbl_hmsdata" data-field="x_isFreeze" name="x_isFreeze[]" id="x_isFreeze[]_281218" value="1"<?php echo $selwrk ?><?php echo $tbl_hmsdata_edit->isFreeze->editAttributes() ?>>
	<label class="custom-control-label" for="x_isFreeze[]_281218"></label>
</div>
</span>
<?php echo $tbl_hmsdata_edit->isFreeze->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tbl_hmsdata_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tbl_hmsdata_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tbl_hmsdata_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tbl_hmsdata_edit->showPageFooter();
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
$tbl_hmsdata_edit->terminate();
?>