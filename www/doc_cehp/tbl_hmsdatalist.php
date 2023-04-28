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
$tbl_hmsdata_list = new tbl_hmsdata_list();

// Run the page
$tbl_hmsdata_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tbl_hmsdata_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tbl_hmsdata_list->isExport()) { ?>
<script>
var ftbl_hmsdatalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftbl_hmsdatalist = currentForm = new ew.Form("ftbl_hmsdatalist", "list");
	ftbl_hmsdatalist.formKeyCountName = '<?php echo $tbl_hmsdata_list->FormKeyCountName ?>';

	// Validate form
	ftbl_hmsdatalist.validate = function() {
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
			<?php if ($tbl_hmsdata_list->Slno->Required) { ?>
				elm = this.getElements("x" + infix + "_Slno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Slno->caption(), $tbl_hmsdata_list->Slno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_hmsdata_list->StationId->Required) { ?>
				elm = this.getElements("x" + infix + "_StationId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->StationId->caption(), $tbl_hmsdata_list->StationId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_hmsdata_list->obs_DateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_DateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->obs_DateTime->caption(), $tbl_hmsdata_list->obs_DateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_obs_DateTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->obs_DateTime->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Temp_water_in_pan_inC_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->caption(), $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Temp_water_in_pan_inC_830AM");
				if (elm && !ew.checkRange(elm.value, 0, 70))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Temp_water_in_pan_inC_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->caption(), $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Temp_water_in_pan_inC_530PM");
				if (elm && !ew.checkRange(elm.value, 0, 70))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->App_Evaporation_inMM_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_App_Evaporation_inMM_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->App_Evaporation_inMM_830AM->caption(), $tbl_hmsdata_list->App_Evaporation_inMM_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_App_Evaporation_inMM_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->App_Evaporation_inMM_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->App_Evaporation_inMM_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_App_Evaporation_inMM_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->App_Evaporation_inMM_530PM->caption(), $tbl_hmsdata_list->App_Evaporation_inMM_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_App_Evaporation_inMM_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->App_Evaporation_inMM_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Rainfall_inMM_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Rainfall_inMM_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Rainfall_inMM_830AM->caption(), $tbl_hmsdata_list->Rainfall_inMM_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Rainfall_inMM_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Rainfall_inMM_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Rainfall_inMM_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Rainfall_inMM_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Rainfall_inMM_530PM->caption(), $tbl_hmsdata_list->Rainfall_inMM_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Rainfall_inMM_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Rainfall_inMM_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_inMM_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->caption(), $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_inMM_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_inMM_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->caption(), $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_inMM_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->Required) { ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_DaywithRain_inMM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->caption(), $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_DaywithRain_inMM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->Required) { ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_DaywithNoRain_inMM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->caption(), $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Evaporation_curing_DaywithNoRain_inMM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Dry_Bulb_Temp_inC_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->caption(), $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Dry_Bulb_Temp_inC_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Wet_Bulb_Temp_inC_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->caption(), $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Wet_Bulb_Temp_inC_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Vapour_Temp_inC_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Vapour_Temp_inC_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Vapour_Temp_inC_830AM->caption(), $tbl_hmsdata_list->Vapour_Temp_inC_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vapour_Temp_inC_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Vapour_Temp_inC_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Dry_Bulb_Temp_inC_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->caption(), $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Dry_Bulb_Temp_inC_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Wet_Bulb_Temp_inC_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->caption(), $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Wet_Bulb_Temp_inC_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Vapour_Temp_inC_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Vapour_Temp_inC_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Vapour_Temp_inC_530PM->caption(), $tbl_hmsdata_list->Vapour_Temp_inC_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vapour_Temp_inC_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Vapour_Temp_inC_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Max_Temp_inC->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Temp_inC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Max_Temp_inC->caption(), $tbl_hmsdata_list->Max_Temp_inC->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Max_Temp_inC");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Max_Temp_inC->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Min_Temp_inC->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Temp_inC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Min_Temp_inC->caption(), $tbl_hmsdata_list->Min_Temp_inC->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Min_Temp_inC");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Min_Temp_inC->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Total_Wind_Run_inKM_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->caption(), $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Total_Wind_Run_inKM_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Total_Wind_Run_inKM_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->caption(), $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Total_Wind_Run_inKM_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Average_Wind_Speed_inKM->Required) { ?>
				elm = this.getElements("x" + infix + "_Average_Wind_Speed_inKM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Average_Wind_Speed_inKM->caption(), $tbl_hmsdata_list->Average_Wind_Speed_inKM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Average_Wind_Speed_inKM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Average_Wind_Speed_inKM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->Required) { ?>
				elm = this.getElements("x" + infix + "_Number_of_Hours_of_Brightsuned");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->caption(), $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Number_of_Hours_of_Brightsuned");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->Required) { ?>
				elm = this.getElements("x" + infix + "_Relative_Humidity_in_Precentage_830AM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->caption(), $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Relative_Humidity_in_Precentage_830AM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->Required) { ?>
				elm = this.getElements("x" + infix + "_Relative_Humidity_in_Precentage_530PM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->caption(), $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Relative_Humidity_in_Precentage_530PM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->obs_remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_obs_remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->obs_remarks->caption(), $tbl_hmsdata_list->obs_remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tbl_hmsdata_list->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Status->caption(), $tbl_hmsdata_list->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Status->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->Validated->Required) { ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->Validated->caption(), $tbl_hmsdata_list->Validated->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Validated");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($tbl_hmsdata_list->Validated->errorMessage()) ?>");
			<?php if ($tbl_hmsdata_list->isFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_isFreeze[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tbl_hmsdata_list->isFreeze->caption(), $tbl_hmsdata_list->isFreeze->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ftbl_hmsdatalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_hmsdatalist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_hmsdatalist.lists["x_StationId"] = <?php echo $tbl_hmsdata_list->StationId->Lookup->toClientList($tbl_hmsdata_list) ?>;
	ftbl_hmsdatalist.lists["x_StationId"].options = <?php echo JsonEncode($tbl_hmsdata_list->StationId->lookupOptions()) ?>;
	ftbl_hmsdatalist.lists["x_isFreeze[]"] = <?php echo $tbl_hmsdata_list->isFreeze->Lookup->toClientList($tbl_hmsdata_list) ?>;
	ftbl_hmsdatalist.lists["x_isFreeze[]"].options = <?php echo JsonEncode($tbl_hmsdata_list->isFreeze->options(FALSE, TRUE)) ?>;
	loadjs.done("ftbl_hmsdatalist");
});
var ftbl_hmsdatalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftbl_hmsdatalistsrch = currentSearchForm = new ew.Form("ftbl_hmsdatalistsrch");

	// Validate function for search
	ftbl_hmsdatalistsrch.validate = function(fobj) {
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
	ftbl_hmsdatalistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftbl_hmsdatalistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftbl_hmsdatalistsrch.lists["x_StationId"] = <?php echo $tbl_hmsdata_list->StationId->Lookup->toClientList($tbl_hmsdata_list) ?>;
	ftbl_hmsdatalistsrch.lists["x_StationId"].options = <?php echo JsonEncode($tbl_hmsdata_list->StationId->lookupOptions()) ?>;

	// Filters
	ftbl_hmsdatalistsrch.filterList = <?php echo $tbl_hmsdata_list->getFilterList() ?>;
	loadjs.done("ftbl_hmsdatalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tbl_hmsdata_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tbl_hmsdata_list->TotalRecords > 0 && $tbl_hmsdata_list->ExportOptions->visible()) { ?>
<?php $tbl_hmsdata_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->ImportOptions->visible()) { ?>
<?php $tbl_hmsdata_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->SearchOptions->visible()) { ?>
<?php $tbl_hmsdata_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->FilterOptions->visible()) { ?>
<?php $tbl_hmsdata_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tbl_hmsdata_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tbl_hmsdata_list->isExport() && !$tbl_hmsdata->CurrentAction) { ?>
<form name="ftbl_hmsdatalistsrch" id="ftbl_hmsdatalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftbl_hmsdatalistsrch-search-panel" class="<?php echo $tbl_hmsdata_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tbl_hmsdata">
	<div class="ew-extended-search">
<?php

// Render search row
$tbl_hmsdata->RowType = ROWTYPE_SEARCH;
$tbl_hmsdata->resetAttributes();
$tbl_hmsdata_list->renderRow();
?>
<?php if ($tbl_hmsdata_list->StationId->Visible) { // StationId ?>
	<?php
		$tbl_hmsdata_list->SearchColumnCount++;
		if (($tbl_hmsdata_list->SearchColumnCount - 1) % $tbl_hmsdata_list->SearchFieldsPerRow == 0) {
			$tbl_hmsdata_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $tbl_hmsdata_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_StationId" class="ew-cell form-group">
		<label for="x_StationId" class="ew-search-caption ew-label"><?php echo $tbl_hmsdata_list->StationId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_StationId" id="z_StationId" value="=">
</span>
		<span id="el_tbl_hmsdata_StationId" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_hmsdata" data-field="x_StationId" data-value-separator="<?php echo $tbl_hmsdata_list->StationId->displayValueSeparatorAttribute() ?>" id="x_StationId" name="x_StationId"<?php echo $tbl_hmsdata_list->StationId->editAttributes() ?>>
			<?php echo $tbl_hmsdata_list->StationId->selectOptionListHtml("x_StationId") ?>
		</select>
</div>
<?php echo $tbl_hmsdata_list->StationId->Lookup->getParamTag($tbl_hmsdata_list, "p_x_StationId") ?>
</span>
	</div>
	<?php if ($tbl_hmsdata_list->SearchColumnCount % $tbl_hmsdata_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($tbl_hmsdata_list->SearchColumnCount % $tbl_hmsdata_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $tbl_hmsdata_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tbl_hmsdata_list->BasicSearch->getKeyword()) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tbl_hmsdata_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tbl_hmsdata_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tbl_hmsdata_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tbl_hmsdata_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tbl_hmsdata_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tbl_hmsdata_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tbl_hmsdata_list->showPageHeader(); ?>
<?php
$tbl_hmsdata_list->showMessage();
?>
<?php if ($tbl_hmsdata_list->TotalRecords > 0 || $tbl_hmsdata->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tbl_hmsdata_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tbl_hmsdata">
<?php if (!$tbl_hmsdata_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tbl_hmsdata_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_hmsdata_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_hmsdata_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftbl_hmsdatalist" id="ftbl_hmsdatalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tbl_hmsdata">
<div id="gmp_tbl_hmsdata" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tbl_hmsdata_list->TotalRecords > 0 || $tbl_hmsdata_list->isGridEdit()) { ?>
<table id="tbl_tbl_hmsdatalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tbl_hmsdata->RowType = ROWTYPE_HEADER;

// Render list options
$tbl_hmsdata_list->renderListOptions();

// Render list options (header, left)
$tbl_hmsdata_list->ListOptions->render("header", "left");
?>
<?php if ($tbl_hmsdata_list->Slno->Visible) { // Slno ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Slno) == "") { ?>
		<th data-name="Slno" class="<?php echo $tbl_hmsdata_list->Slno->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Slno" class="tbl_hmsdata_Slno"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Slno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Slno" class="<?php echo $tbl_hmsdata_list->Slno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Slno) ?>', 2);"><div id="elh_tbl_hmsdata_Slno" class="tbl_hmsdata_Slno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Slno->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Slno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Slno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->StationId->Visible) { // StationId ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->StationId) == "") { ?>
		<th data-name="StationId" class="<?php echo $tbl_hmsdata_list->StationId->headerCellClass() ?>"><div id="elh_tbl_hmsdata_StationId" class="tbl_hmsdata_StationId"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->StationId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StationId" class="<?php echo $tbl_hmsdata_list->StationId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->StationId) ?>', 2);"><div id="elh_tbl_hmsdata_StationId" class="tbl_hmsdata_StationId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->StationId->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->StationId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->StationId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->obs_DateTime->Visible) { // obs_DateTime ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->obs_DateTime) == "") { ?>
		<th data-name="obs_DateTime" class="<?php echo $tbl_hmsdata_list->obs_DateTime->headerCellClass() ?>"><div id="elh_tbl_hmsdata_obs_DateTime" class="tbl_hmsdata_obs_DateTime"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->obs_DateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_DateTime" class="<?php echo $tbl_hmsdata_list->obs_DateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->obs_DateTime) ?>', 2);"><div id="elh_tbl_hmsdata_obs_DateTime" class="tbl_hmsdata_obs_DateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->obs_DateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->obs_DateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->obs_DateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->Visible) { // Temp_water_in_pan_inC_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM) == "") { ?>
		<th data-name="Temp_water_in_pan_inC_830AM" class="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Temp_water_in_pan_inC_830AM" class="tbl_hmsdata_Temp_water_in_pan_inC_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp_water_in_pan_inC_830AM" class="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_Temp_water_in_pan_inC_830AM" class="tbl_hmsdata_Temp_water_in_pan_inC_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->Visible) { // Temp_water_in_pan_inC_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM) == "") { ?>
		<th data-name="Temp_water_in_pan_inC_530PM" class="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Temp_water_in_pan_inC_530PM" class="tbl_hmsdata_Temp_water_in_pan_inC_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp_water_in_pan_inC_530PM" class="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_Temp_water_in_pan_inC_530PM" class="tbl_hmsdata_Temp_water_in_pan_inC_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->App_Evaporation_inMM_830AM->Visible) { // App_Evaporation_inMM_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->App_Evaporation_inMM_830AM) == "") { ?>
		<th data-name="App_Evaporation_inMM_830AM" class="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_App_Evaporation_inMM_830AM" class="tbl_hmsdata_App_Evaporation_inMM_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="App_Evaporation_inMM_830AM" class="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->App_Evaporation_inMM_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_App_Evaporation_inMM_830AM" class="tbl_hmsdata_App_Evaporation_inMM_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->App_Evaporation_inMM_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->App_Evaporation_inMM_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->App_Evaporation_inMM_530PM->Visible) { // App_Evaporation_inMM_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->App_Evaporation_inMM_530PM) == "") { ?>
		<th data-name="App_Evaporation_inMM_530PM" class="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_App_Evaporation_inMM_530PM" class="tbl_hmsdata_App_Evaporation_inMM_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="App_Evaporation_inMM_530PM" class="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->App_Evaporation_inMM_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_App_Evaporation_inMM_530PM" class="tbl_hmsdata_App_Evaporation_inMM_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->App_Evaporation_inMM_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->App_Evaporation_inMM_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Rainfall_inMM_830AM->Visible) { // Rainfall_inMM_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Rainfall_inMM_830AM) == "") { ?>
		<th data-name="Rainfall_inMM_830AM" class="<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Rainfall_inMM_830AM" class="tbl_hmsdata_Rainfall_inMM_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rainfall_inMM_830AM" class="<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Rainfall_inMM_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_Rainfall_inMM_830AM" class="tbl_hmsdata_Rainfall_inMM_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Rainfall_inMM_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Rainfall_inMM_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Rainfall_inMM_530PM->Visible) { // Rainfall_inMM_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Rainfall_inMM_530PM) == "") { ?>
		<th data-name="Rainfall_inMM_530PM" class="<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Rainfall_inMM_530PM" class="tbl_hmsdata_Rainfall_inMM_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rainfall_inMM_530PM" class="<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Rainfall_inMM_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_Rainfall_inMM_530PM" class="tbl_hmsdata_Rainfall_inMM_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Rainfall_inMM_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Rainfall_inMM_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->Visible) { // Evaporation_curing_inMM_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Evaporation_curing_inMM_830AM) == "") { ?>
		<th data-name="Evaporation_curing_inMM_830AM" class="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Evaporation_curing_inMM_830AM" class="tbl_hmsdata_Evaporation_curing_inMM_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Evaporation_curing_inMM_830AM" class="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Evaporation_curing_inMM_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_Evaporation_curing_inMM_830AM" class="tbl_hmsdata_Evaporation_curing_inMM_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->Visible) { // Evaporation_curing_inMM_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Evaporation_curing_inMM_530PM) == "") { ?>
		<th data-name="Evaporation_curing_inMM_530PM" class="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Evaporation_curing_inMM_530PM" class="tbl_hmsdata_Evaporation_curing_inMM_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Evaporation_curing_inMM_530PM" class="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Evaporation_curing_inMM_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_Evaporation_curing_inMM_530PM" class="tbl_hmsdata_Evaporation_curing_inMM_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->Visible) { // Evaporation_curing_DaywithRain_inMM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM) == "") { ?>
		<th data-name="Evaporation_curing_DaywithRain_inMM" class="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM" class="tbl_hmsdata_Evaporation_curing_DaywithRain_inMM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Evaporation_curing_DaywithRain_inMM" class="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM) ?>', 2);"><div id="elh_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM" class="tbl_hmsdata_Evaporation_curing_DaywithRain_inMM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->Visible) { // Evaporation_curing_DaywithNoRain_inMM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM) == "") { ?>
		<th data-name="Evaporation_curing_DaywithNoRain_inMM" class="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM" class="tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Evaporation_curing_DaywithNoRain_inMM" class="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM) ?>', 2);"><div id="elh_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM" class="tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->Visible) { // Dry_Bulb_Temp_inC_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM) == "") { ?>
		<th data-name="Dry_Bulb_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM" class="tbl_hmsdata_Dry_Bulb_Temp_inC_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dry_Bulb_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM" class="tbl_hmsdata_Dry_Bulb_Temp_inC_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->Visible) { // Wet_Bulb_Temp_inC_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM) == "") { ?>
		<th data-name="Wet_Bulb_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM" class="tbl_hmsdata_Wet_Bulb_Temp_inC_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Wet_Bulb_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM" class="tbl_hmsdata_Wet_Bulb_Temp_inC_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Vapour_Temp_inC_830AM->Visible) { // Vapour_Temp_inC_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Vapour_Temp_inC_830AM) == "") { ?>
		<th data-name="Vapour_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Vapour_Temp_inC_830AM" class="tbl_hmsdata_Vapour_Temp_inC_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vapour_Temp_inC_830AM" class="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Vapour_Temp_inC_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_Vapour_Temp_inC_830AM" class="tbl_hmsdata_Vapour_Temp_inC_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Vapour_Temp_inC_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Vapour_Temp_inC_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->Visible) { // Dry_Bulb_Temp_inC_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM) == "") { ?>
		<th data-name="Dry_Bulb_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM" class="tbl_hmsdata_Dry_Bulb_Temp_inC_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dry_Bulb_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM" class="tbl_hmsdata_Dry_Bulb_Temp_inC_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->Visible) { // Wet_Bulb_Temp_inC_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM) == "") { ?>
		<th data-name="Wet_Bulb_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM" class="tbl_hmsdata_Wet_Bulb_Temp_inC_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Wet_Bulb_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM" class="tbl_hmsdata_Wet_Bulb_Temp_inC_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Vapour_Temp_inC_530PM->Visible) { // Vapour_Temp_inC_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Vapour_Temp_inC_530PM) == "") { ?>
		<th data-name="Vapour_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Vapour_Temp_inC_530PM" class="tbl_hmsdata_Vapour_Temp_inC_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vapour_Temp_inC_530PM" class="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Vapour_Temp_inC_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_Vapour_Temp_inC_530PM" class="tbl_hmsdata_Vapour_Temp_inC_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Vapour_Temp_inC_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Vapour_Temp_inC_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Max_Temp_inC->Visible) { // Max_Temp_inC ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Max_Temp_inC) == "") { ?>
		<th data-name="Max_Temp_inC" class="<?php echo $tbl_hmsdata_list->Max_Temp_inC->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Max_Temp_inC" class="tbl_hmsdata_Max_Temp_inC"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Max_Temp_inC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Temp_inC" class="<?php echo $tbl_hmsdata_list->Max_Temp_inC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Max_Temp_inC) ?>', 2);"><div id="elh_tbl_hmsdata_Max_Temp_inC" class="tbl_hmsdata_Max_Temp_inC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Max_Temp_inC->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Max_Temp_inC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Max_Temp_inC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Min_Temp_inC->Visible) { // Min_Temp_inC ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Min_Temp_inC) == "") { ?>
		<th data-name="Min_Temp_inC" class="<?php echo $tbl_hmsdata_list->Min_Temp_inC->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Min_Temp_inC" class="tbl_hmsdata_Min_Temp_inC"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Min_Temp_inC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Temp_inC" class="<?php echo $tbl_hmsdata_list->Min_Temp_inC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Min_Temp_inC) ?>', 2);"><div id="elh_tbl_hmsdata_Min_Temp_inC" class="tbl_hmsdata_Min_Temp_inC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Min_Temp_inC->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Min_Temp_inC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Min_Temp_inC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->Visible) { // Total_Wind_Run_inKM_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM) == "") { ?>
		<th data-name="Total_Wind_Run_inKM_830AM" class="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Total_Wind_Run_inKM_830AM" class="tbl_hmsdata_Total_Wind_Run_inKM_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total_Wind_Run_inKM_830AM" class="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_Total_Wind_Run_inKM_830AM" class="tbl_hmsdata_Total_Wind_Run_inKM_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->Visible) { // Total_Wind_Run_inKM_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM) == "") { ?>
		<th data-name="Total_Wind_Run_inKM_530PM" class="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Total_Wind_Run_inKM_530PM" class="tbl_hmsdata_Total_Wind_Run_inKM_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total_Wind_Run_inKM_530PM" class="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_Total_Wind_Run_inKM_530PM" class="tbl_hmsdata_Total_Wind_Run_inKM_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Average_Wind_Speed_inKM->Visible) { // Average_Wind_Speed_inKM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Average_Wind_Speed_inKM) == "") { ?>
		<th data-name="Average_Wind_Speed_inKM" class="<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Average_Wind_Speed_inKM" class="tbl_hmsdata_Average_Wind_Speed_inKM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Average_Wind_Speed_inKM" class="<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Average_Wind_Speed_inKM) ?>', 2);"><div id="elh_tbl_hmsdata_Average_Wind_Speed_inKM" class="tbl_hmsdata_Average_Wind_Speed_inKM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Average_Wind_Speed_inKM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Average_Wind_Speed_inKM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->Visible) { // Number_of_Hours_of_Brightsuned ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned) == "") { ?>
		<th data-name="Number_of_Hours_of_Brightsuned" class="<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Number_of_Hours_of_Brightsuned" class="tbl_hmsdata_Number_of_Hours_of_Brightsuned"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Number_of_Hours_of_Brightsuned" class="<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned) ?>', 2);"><div id="elh_tbl_hmsdata_Number_of_Hours_of_Brightsuned" class="tbl_hmsdata_Number_of_Hours_of_Brightsuned">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->Visible) { // Relative_Humidity_in_Precentage_830AM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM) == "") { ?>
		<th data-name="Relative_Humidity_in_Precentage_830AM" class="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM" class="tbl_hmsdata_Relative_Humidity_in_Precentage_830AM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Relative_Humidity_in_Precentage_830AM" class="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM) ?>', 2);"><div id="elh_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM" class="tbl_hmsdata_Relative_Humidity_in_Precentage_830AM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->Visible) { // Relative_Humidity_in_Precentage_530PM ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM) == "") { ?>
		<th data-name="Relative_Humidity_in_Precentage_530PM" class="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM" class="tbl_hmsdata_Relative_Humidity_in_Precentage_530PM"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Relative_Humidity_in_Precentage_530PM" class="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM) ?>', 2);"><div id="elh_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM" class="tbl_hmsdata_Relative_Humidity_in_Precentage_530PM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->obs_remarks->Visible) { // obs_remarks ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->obs_remarks) == "") { ?>
		<th data-name="obs_remarks" class="<?php echo $tbl_hmsdata_list->obs_remarks->headerCellClass() ?>"><div id="elh_tbl_hmsdata_obs_remarks" class="tbl_hmsdata_obs_remarks"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->obs_remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="obs_remarks" class="<?php echo $tbl_hmsdata_list->obs_remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->obs_remarks) ?>', 2);"><div id="elh_tbl_hmsdata_obs_remarks" class="tbl_hmsdata_obs_remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->obs_remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->obs_remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->obs_remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Status->Visible) { // Status ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $tbl_hmsdata_list->Status->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Status" class="tbl_hmsdata_Status"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $tbl_hmsdata_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Status) ?>', 2);"><div id="elh_tbl_hmsdata_Status" class="tbl_hmsdata_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->Validated->Visible) { // Validated ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Validated) == "") { ?>
		<th data-name="Validated" class="<?php echo $tbl_hmsdata_list->Validated->headerCellClass() ?>"><div id="elh_tbl_hmsdata_Validated" class="tbl_hmsdata_Validated"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Validated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Validated" class="<?php echo $tbl_hmsdata_list->Validated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->Validated) ?>', 2);"><div id="elh_tbl_hmsdata_Validated" class="tbl_hmsdata_Validated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->Validated->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->Validated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->Validated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tbl_hmsdata_list->isFreeze->Visible) { // isFreeze ?>
	<?php if ($tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->isFreeze) == "") { ?>
		<th data-name="isFreeze" class="<?php echo $tbl_hmsdata_list->isFreeze->headerCellClass() ?>"><div id="elh_tbl_hmsdata_isFreeze" class="tbl_hmsdata_isFreeze"><div class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->isFreeze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isFreeze" class="<?php echo $tbl_hmsdata_list->isFreeze->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tbl_hmsdata_list->SortUrl($tbl_hmsdata_list->isFreeze) ?>', 2);"><div id="elh_tbl_hmsdata_isFreeze" class="tbl_hmsdata_isFreeze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tbl_hmsdata_list->isFreeze->caption() ?></span><span class="ew-table-header-sort"><?php if ($tbl_hmsdata_list->isFreeze->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tbl_hmsdata_list->isFreeze->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tbl_hmsdata_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tbl_hmsdata_list->ExportAll && $tbl_hmsdata_list->isExport()) {
	$tbl_hmsdata_list->StopRecord = $tbl_hmsdata_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tbl_hmsdata_list->TotalRecords > $tbl_hmsdata_list->StartRecord + $tbl_hmsdata_list->DisplayRecords - 1)
		$tbl_hmsdata_list->StopRecord = $tbl_hmsdata_list->StartRecord + $tbl_hmsdata_list->DisplayRecords - 1;
	else
		$tbl_hmsdata_list->StopRecord = $tbl_hmsdata_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($tbl_hmsdata->isConfirm() || $tbl_hmsdata_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($tbl_hmsdata_list->FormKeyCountName) && ($tbl_hmsdata_list->isGridAdd() || $tbl_hmsdata_list->isGridEdit() || $tbl_hmsdata->isConfirm())) {
		$tbl_hmsdata_list->KeyCount = $CurrentForm->getValue($tbl_hmsdata_list->FormKeyCountName);
		$tbl_hmsdata_list->StopRecord = $tbl_hmsdata_list->StartRecord + $tbl_hmsdata_list->KeyCount - 1;
	}
}
$tbl_hmsdata_list->RecordCount = $tbl_hmsdata_list->StartRecord - 1;
if ($tbl_hmsdata_list->Recordset && !$tbl_hmsdata_list->Recordset->EOF) {
	$tbl_hmsdata_list->Recordset->moveFirst();
	$selectLimit = $tbl_hmsdata_list->UseSelectLimit;
	if (!$selectLimit && $tbl_hmsdata_list->StartRecord > 1)
		$tbl_hmsdata_list->Recordset->move($tbl_hmsdata_list->StartRecord - 1);
} elseif (!$tbl_hmsdata->AllowAddDeleteRow && $tbl_hmsdata_list->StopRecord == 0) {
	$tbl_hmsdata_list->StopRecord = $tbl_hmsdata->GridAddRowCount;
}

// Initialize aggregate
$tbl_hmsdata->RowType = ROWTYPE_AGGREGATEINIT;
$tbl_hmsdata->resetAttributes();
$tbl_hmsdata_list->renderRow();
$tbl_hmsdata_list->EditRowCount = 0;
if ($tbl_hmsdata_list->isEdit())
	$tbl_hmsdata_list->RowIndex = 1;
if ($tbl_hmsdata_list->isGridEdit())
	$tbl_hmsdata_list->RowIndex = 0;
while ($tbl_hmsdata_list->RecordCount < $tbl_hmsdata_list->StopRecord) {
	$tbl_hmsdata_list->RecordCount++;
	if ($tbl_hmsdata_list->RecordCount >= $tbl_hmsdata_list->StartRecord) {
		$tbl_hmsdata_list->RowCount++;
		if ($tbl_hmsdata_list->isGridAdd() || $tbl_hmsdata_list->isGridEdit() || $tbl_hmsdata->isConfirm()) {
			$tbl_hmsdata_list->RowIndex++;
			$CurrentForm->Index = $tbl_hmsdata_list->RowIndex;
			if ($CurrentForm->hasValue($tbl_hmsdata_list->FormActionName) && ($tbl_hmsdata->isConfirm() || $tbl_hmsdata_list->EventCancelled))
				$tbl_hmsdata_list->RowAction = strval($CurrentForm->getValue($tbl_hmsdata_list->FormActionName));
			elseif ($tbl_hmsdata_list->isGridAdd())
				$tbl_hmsdata_list->RowAction = "insert";
			else
				$tbl_hmsdata_list->RowAction = "";
		}

		// Set up key count
		$tbl_hmsdata_list->KeyCount = $tbl_hmsdata_list->RowIndex;

		// Init row class and style
		$tbl_hmsdata->resetAttributes();
		$tbl_hmsdata->CssClass = "";
		if ($tbl_hmsdata_list->isGridAdd()) {
			$tbl_hmsdata_list->loadRowValues(); // Load default values
		} else {
			$tbl_hmsdata_list->loadRowValues($tbl_hmsdata_list->Recordset); // Load row values
		}
		$tbl_hmsdata->RowType = ROWTYPE_VIEW; // Render view
		if ($tbl_hmsdata_list->isEdit()) {
			if ($tbl_hmsdata_list->checkInlineEditKey() && $tbl_hmsdata_list->EditRowCount == 0) { // Inline edit
				$tbl_hmsdata->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($tbl_hmsdata_list->isGridEdit()) { // Grid edit
			if ($tbl_hmsdata->EventCancelled)
				$tbl_hmsdata_list->restoreCurrentRowFormValues($tbl_hmsdata_list->RowIndex); // Restore form values
			if ($tbl_hmsdata_list->RowAction == "insert")
				$tbl_hmsdata->RowType = ROWTYPE_ADD; // Render add
			else
				$tbl_hmsdata->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_hmsdata_list->isEdit() && $tbl_hmsdata->RowType == ROWTYPE_EDIT && $tbl_hmsdata->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$tbl_hmsdata_list->restoreFormValues(); // Restore form values
		}
		if ($tbl_hmsdata_list->isGridEdit() && ($tbl_hmsdata->RowType == ROWTYPE_EDIT || $tbl_hmsdata->RowType == ROWTYPE_ADD) && $tbl_hmsdata->EventCancelled) // Update failed
			$tbl_hmsdata_list->restoreCurrentRowFormValues($tbl_hmsdata_list->RowIndex); // Restore form values
		if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) // Edit row
			$tbl_hmsdata_list->EditRowCount++;

		// Set up row id / data-rowindex
		$tbl_hmsdata->RowAttrs->merge(["data-rowindex" => $tbl_hmsdata_list->RowCount, "id" => "r" . $tbl_hmsdata_list->RowCount . "_tbl_hmsdata", "data-rowtype" => $tbl_hmsdata->RowType]);

		// Render row
		$tbl_hmsdata_list->renderRow();

		// Render list options
		$tbl_hmsdata_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_hmsdata_list->RowAction != "delete" && $tbl_hmsdata_list->RowAction != "insertdelete" && !($tbl_hmsdata_list->RowAction == "insert" && $tbl_hmsdata->isConfirm() && $tbl_hmsdata_list->emptyRow())) {
?>
	<tr <?php echo $tbl_hmsdata->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_hmsdata_list->ListOptions->render("body", "left", $tbl_hmsdata_list->RowCount);
?>
	<?php if ($tbl_hmsdata_list->Slno->Visible) { // Slno ?>
		<td data-name="Slno" <?php echo $tbl_hmsdata_list->Slno->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Slno" class="form-group"></span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Slno" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Slno" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_hmsdata_list->Slno->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Slno" class="form-group">
<span<?php echo $tbl_hmsdata_list->Slno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tbl_hmsdata_list->Slno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Slno" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Slno" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_hmsdata_list->Slno->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Slno">
<span<?php echo $tbl_hmsdata_list->Slno->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Slno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId" <?php echo $tbl_hmsdata_list->StationId->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_StationId" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_hmsdata" data-field="x_StationId" data-value-separator="<?php echo $tbl_hmsdata_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId"<?php echo $tbl_hmsdata_list->StationId->editAttributes() ?>>
			<?php echo $tbl_hmsdata_list->StationId->selectOptionListHtml("x{$tbl_hmsdata_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $tbl_hmsdata_list->StationId->Lookup->getParamTag($tbl_hmsdata_list, "p_x" . $tbl_hmsdata_list->RowIndex . "_StationId") ?>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_StationId" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($tbl_hmsdata_list->StationId->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_StationId" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_hmsdata" data-field="x_StationId" data-value-separator="<?php echo $tbl_hmsdata_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId"<?php echo $tbl_hmsdata_list->StationId->editAttributes() ?>>
			<?php echo $tbl_hmsdata_list->StationId->selectOptionListHtml("x{$tbl_hmsdata_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $tbl_hmsdata_list->StationId->Lookup->getParamTag($tbl_hmsdata_list, "p_x" . $tbl_hmsdata_list->RowIndex . "_StationId") ?>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_StationId">
<span<?php echo $tbl_hmsdata_list->StationId->viewAttributes() ?>><?php echo $tbl_hmsdata_list->StationId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->obs_DateTime->Visible) { // obs_DateTime ?>
		<td data-name="obs_DateTime" <?php echo $tbl_hmsdata_list->obs_DateTime->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_obs_DateTime" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_obs_DateTime" data-format="7" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" maxlength="10" value="<?php echo $tbl_hmsdata_list->obs_DateTime->EditValue ?>"<?php echo $tbl_hmsdata_list->obs_DateTime->editAttributes() ?>>
<?php if (!$tbl_hmsdata_list->obs_DateTime->ReadOnly && !$tbl_hmsdata_list->obs_DateTime->Disabled && !isset($tbl_hmsdata_list->obs_DateTime->EditAttrs["readonly"]) && !isset($tbl_hmsdata_list->obs_DateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_hmsdatalist", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_hmsdatalist", "x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_obs_DateTime" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" value="<?php echo HtmlEncode($tbl_hmsdata_list->obs_DateTime->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_obs_DateTime" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_obs_DateTime" data-format="7" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" maxlength="10" value="<?php echo $tbl_hmsdata_list->obs_DateTime->EditValue ?>"<?php echo $tbl_hmsdata_list->obs_DateTime->editAttributes() ?>>
<?php if (!$tbl_hmsdata_list->obs_DateTime->ReadOnly && !$tbl_hmsdata_list->obs_DateTime->Disabled && !isset($tbl_hmsdata_list->obs_DateTime->EditAttrs["readonly"]) && !isset($tbl_hmsdata_list->obs_DateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_hmsdatalist", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_hmsdatalist", "x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_obs_DateTime">
<span<?php echo $tbl_hmsdata_list->obs_DateTime->viewAttributes() ?>><?php echo $tbl_hmsdata_list->obs_DateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->Visible) { // Temp_water_in_pan_inC_830AM ?>
		<td data-name="Temp_water_in_pan_inC_830AM" <?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Temp_water_in_pan_inC_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Temp_water_in_pan_inC_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Temp_water_in_pan_inC_830AM">
<span<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->Visible) { // Temp_water_in_pan_inC_530PM ?>
		<td data-name="Temp_water_in_pan_inC_530PM" <?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Temp_water_in_pan_inC_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Temp_water_in_pan_inC_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Temp_water_in_pan_inC_530PM">
<span<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->App_Evaporation_inMM_830AM->Visible) { // App_Evaporation_inMM_830AM ?>
		<td data-name="App_Evaporation_inMM_830AM" <?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_App_Evaporation_inMM_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->App_Evaporation_inMM_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_App_Evaporation_inMM_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_App_Evaporation_inMM_830AM">
<span<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->App_Evaporation_inMM_530PM->Visible) { // App_Evaporation_inMM_530PM ?>
		<td data-name="App_Evaporation_inMM_530PM" <?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_App_Evaporation_inMM_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->App_Evaporation_inMM_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_App_Evaporation_inMM_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_App_Evaporation_inMM_530PM">
<span<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Rainfall_inMM_830AM->Visible) { // Rainfall_inMM_830AM ?>
		<td data-name="Rainfall_inMM_830AM" <?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Rainfall_inMM_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Rainfall_inMM_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Rainfall_inMM_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Rainfall_inMM_830AM">
<span<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Rainfall_inMM_530PM->Visible) { // Rainfall_inMM_530PM ?>
		<td data-name="Rainfall_inMM_530PM" <?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Rainfall_inMM_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Rainfall_inMM_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Rainfall_inMM_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Rainfall_inMM_530PM">
<span<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->Visible) { // Evaporation_curing_inMM_830AM ?>
		<td data-name="Evaporation_curing_inMM_830AM" <?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_inMM_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_inMM_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_inMM_830AM">
<span<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->Visible) { // Evaporation_curing_inMM_530PM ?>
		<td data-name="Evaporation_curing_inMM_530PM" <?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_inMM_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_inMM_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_inMM_530PM">
<span<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->Visible) { // Evaporation_curing_DaywithRain_inMM ?>
		<td data-name="Evaporation_curing_DaywithRain_inMM" <?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithRain_inMM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithRain_inMM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithRain_inMM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM">
<span<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->Visible) { // Evaporation_curing_DaywithNoRain_inMM ?>
		<td data-name="Evaporation_curing_DaywithNoRain_inMM" <?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithNoRain_inMM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithNoRain_inMM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithNoRain_inMM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM">
<span<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->Visible) { // Dry_Bulb_Temp_inC_830AM ?>
		<td data-name="Dry_Bulb_Temp_inC_830AM" <?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM">
<span<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->Visible) { // Wet_Bulb_Temp_inC_830AM ?>
		<td data-name="Wet_Bulb_Temp_inC_830AM" <?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM">
<span<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Vapour_Temp_inC_830AM->Visible) { // Vapour_Temp_inC_830AM ?>
		<td data-name="Vapour_Temp_inC_830AM" <?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Vapour_Temp_inC_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Vapour_Temp_inC_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Vapour_Temp_inC_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Vapour_Temp_inC_830AM">
<span<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->Visible) { // Dry_Bulb_Temp_inC_530PM ?>
		<td data-name="Dry_Bulb_Temp_inC_530PM" <?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM">
<span<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->Visible) { // Wet_Bulb_Temp_inC_530PM ?>
		<td data-name="Wet_Bulb_Temp_inC_530PM" <?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM">
<span<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Vapour_Temp_inC_530PM->Visible) { // Vapour_Temp_inC_530PM ?>
		<td data-name="Vapour_Temp_inC_530PM" <?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Vapour_Temp_inC_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Vapour_Temp_inC_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Vapour_Temp_inC_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Vapour_Temp_inC_530PM">
<span<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Max_Temp_inC->Visible) { // Max_Temp_inC ?>
		<td data-name="Max_Temp_inC" <?php echo $tbl_hmsdata_list->Max_Temp_inC->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Max_Temp_inC" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Max_Temp_inC" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Max_Temp_inC->EditValue ?>"<?php echo $tbl_hmsdata_list->Max_Temp_inC->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Max_Temp_inC" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" value="<?php echo HtmlEncode($tbl_hmsdata_list->Max_Temp_inC->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Max_Temp_inC" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Max_Temp_inC" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Max_Temp_inC->EditValue ?>"<?php echo $tbl_hmsdata_list->Max_Temp_inC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Max_Temp_inC">
<span<?php echo $tbl_hmsdata_list->Max_Temp_inC->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Max_Temp_inC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Min_Temp_inC->Visible) { // Min_Temp_inC ?>
		<td data-name="Min_Temp_inC" <?php echo $tbl_hmsdata_list->Min_Temp_inC->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Min_Temp_inC" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Min_Temp_inC" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Min_Temp_inC->EditValue ?>"<?php echo $tbl_hmsdata_list->Min_Temp_inC->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Min_Temp_inC" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" value="<?php echo HtmlEncode($tbl_hmsdata_list->Min_Temp_inC->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Min_Temp_inC" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Min_Temp_inC" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Min_Temp_inC->EditValue ?>"<?php echo $tbl_hmsdata_list->Min_Temp_inC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Min_Temp_inC">
<span<?php echo $tbl_hmsdata_list->Min_Temp_inC->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Min_Temp_inC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->Visible) { // Total_Wind_Run_inKM_830AM ?>
		<td data-name="Total_Wind_Run_inKM_830AM" <?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Total_Wind_Run_inKM_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Total_Wind_Run_inKM_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Total_Wind_Run_inKM_830AM">
<span<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->Visible) { // Total_Wind_Run_inKM_530PM ?>
		<td data-name="Total_Wind_Run_inKM_530PM" <?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Total_Wind_Run_inKM_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Total_Wind_Run_inKM_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Total_Wind_Run_inKM_530PM">
<span<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Average_Wind_Speed_inKM->Visible) { // Average_Wind_Speed_inKM ?>
		<td data-name="Average_Wind_Speed_inKM" <?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Average_Wind_Speed_inKM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Average_Wind_Speed_inKM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->EditValue ?>"<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Average_Wind_Speed_inKM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Average_Wind_Speed_inKM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Average_Wind_Speed_inKM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Average_Wind_Speed_inKM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->EditValue ?>"<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Average_Wind_Speed_inKM">
<span<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->Visible) { // Number_of_Hours_of_Brightsuned ?>
		<td data-name="Number_of_Hours_of_Brightsuned" <?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Number_of_Hours_of_Brightsuned" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Number_of_Hours_of_Brightsuned" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->EditValue ?>"<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Number_of_Hours_of_Brightsuned" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" value="<?php echo HtmlEncode($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Number_of_Hours_of_Brightsuned" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Number_of_Hours_of_Brightsuned" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->EditValue ?>"<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Number_of_Hours_of_Brightsuned">
<span<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->Visible) { // Relative_Humidity_in_Precentage_830AM ?>
		<td data-name="Relative_Humidity_in_Precentage_830AM" <?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM">
<span<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->Visible) { // Relative_Humidity_in_Precentage_530PM ?>
		<td data-name="Relative_Humidity_in_Precentage_530PM" <?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM">
<span<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->obs_remarks->Visible) { // obs_remarks ?>
		<td data-name="obs_remarks" <?php echo $tbl_hmsdata_list->obs_remarks->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_obs_remarks" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_obs_remarks" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" size="30" maxlength="50" value="<?php echo $tbl_hmsdata_list->obs_remarks->EditValue ?>"<?php echo $tbl_hmsdata_list->obs_remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_obs_remarks" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" value="<?php echo HtmlEncode($tbl_hmsdata_list->obs_remarks->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_obs_remarks" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_obs_remarks" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" size="30" maxlength="50" value="<?php echo $tbl_hmsdata_list->obs_remarks->EditValue ?>"<?php echo $tbl_hmsdata_list->obs_remarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_obs_remarks">
<span<?php echo $tbl_hmsdata_list->obs_remarks->viewAttributes() ?>><?php echo $tbl_hmsdata_list->obs_remarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $tbl_hmsdata_list->Status->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Status" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Status" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" size="30" maxlength="11" value="<?php echo $tbl_hmsdata_list->Status->EditValue ?>"<?php echo $tbl_hmsdata_list->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Status" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($tbl_hmsdata_list->Status->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Status" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Status" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" size="30" maxlength="11" value="<?php echo $tbl_hmsdata_list->Status->EditValue ?>"<?php echo $tbl_hmsdata_list->Status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Status">
<span<?php echo $tbl_hmsdata_list->Status->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Validated->Visible) { // Validated ?>
		<td data-name="Validated" <?php echo $tbl_hmsdata_list->Validated->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Validated" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Validated" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" size="30" maxlength="11" value="<?php echo $tbl_hmsdata_list->Validated->EditValue ?>"<?php echo $tbl_hmsdata_list->Validated->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Validated" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" value="<?php echo HtmlEncode($tbl_hmsdata_list->Validated->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Validated" class="form-group">
<input type="text" data-table="tbl_hmsdata" data-field="x_Validated" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" size="30" maxlength="11" value="<?php echo $tbl_hmsdata_list->Validated->EditValue ?>"<?php echo $tbl_hmsdata_list->Validated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_Validated">
<span<?php echo $tbl_hmsdata_list->Validated->viewAttributes() ?>><?php echo $tbl_hmsdata_list->Validated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->isFreeze->Visible) { // isFreeze ?>
		<td data-name="isFreeze" <?php echo $tbl_hmsdata_list->isFreeze->cellAttributes() ?>>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_isFreeze" class="form-group">
<?php
$selwrk = ConvertToBool($tbl_hmsdata_list->isFreeze->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="tbl_hmsdata" data-field="x_isFreeze" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]_137229" value="1"<?php echo $selwrk ?><?php echo $tbl_hmsdata_list->isFreeze->editAttributes() ?>>
	<label class="custom-control-label" for="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]_137229"></label>
</div>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_isFreeze" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]" value="<?php echo HtmlEncode($tbl_hmsdata_list->isFreeze->OldValue) ?>">
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_isFreeze" class="form-group">
<?php
$selwrk = ConvertToBool($tbl_hmsdata_list->isFreeze->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="tbl_hmsdata" data-field="x_isFreeze" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]_668220" value="1"<?php echo $selwrk ?><?php echo $tbl_hmsdata_list->isFreeze->editAttributes() ?>>
	<label class="custom-control-label" for="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]_668220"></label>
</div>
</span>
<?php } ?>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tbl_hmsdata_list->RowCount ?>_tbl_hmsdata_isFreeze">
<span<?php echo $tbl_hmsdata_list->isFreeze->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_isFreeze" class="custom-control-input" value="<?php echo $tbl_hmsdata_list->isFreeze->getViewValue() ?>" disabled<?php if (ConvertToBool($tbl_hmsdata_list->isFreeze->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_isFreeze"></label></div></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_hmsdata_list->ListOptions->render("body", "right", $tbl_hmsdata_list->RowCount);
?>
	</tr>
<?php if ($tbl_hmsdata->RowType == ROWTYPE_ADD || $tbl_hmsdata->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ftbl_hmsdatalist", "load"], function() {
	ftbl_hmsdatalist.updateLists(<?php echo $tbl_hmsdata_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$tbl_hmsdata_list->isGridAdd())
		if (!$tbl_hmsdata_list->Recordset->EOF)
			$tbl_hmsdata_list->Recordset->moveNext();
}
?>
<?php
	if ($tbl_hmsdata_list->isGridAdd() || $tbl_hmsdata_list->isGridEdit()) {
		$tbl_hmsdata_list->RowIndex = '$rowindex$';
		$tbl_hmsdata_list->loadRowValues();

		// Set row properties
		$tbl_hmsdata->resetAttributes();
		$tbl_hmsdata->RowAttrs->merge(["data-rowindex" => $tbl_hmsdata_list->RowIndex, "id" => "r0_tbl_hmsdata", "data-rowtype" => ROWTYPE_ADD]);
		$tbl_hmsdata->RowAttrs->appendClass("ew-template");
		$tbl_hmsdata->RowType = ROWTYPE_ADD;

		// Render row
		$tbl_hmsdata_list->renderRow();

		// Render list options
		$tbl_hmsdata_list->renderListOptions();
		$tbl_hmsdata_list->StartRowCount = 0;
?>
	<tr <?php echo $tbl_hmsdata->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_hmsdata_list->ListOptions->render("body", "left", $tbl_hmsdata_list->RowIndex);
?>
	<?php if ($tbl_hmsdata_list->Slno->Visible) { // Slno ?>
		<td data-name="Slno">
<span id="el$rowindex$_tbl_hmsdata_Slno" class="form-group tbl_hmsdata_Slno"></span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Slno" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Slno" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Slno" value="<?php echo HtmlEncode($tbl_hmsdata_list->Slno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->StationId->Visible) { // StationId ?>
		<td data-name="StationId">
<span id="el$rowindex$_tbl_hmsdata_StationId" class="form-group tbl_hmsdata_StationId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tbl_hmsdata" data-field="x_StationId" data-value-separator="<?php echo $tbl_hmsdata_list->StationId->displayValueSeparatorAttribute() ?>" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId"<?php echo $tbl_hmsdata_list->StationId->editAttributes() ?>>
			<?php echo $tbl_hmsdata_list->StationId->selectOptionListHtml("x{$tbl_hmsdata_list->RowIndex}_StationId") ?>
		</select>
</div>
<?php echo $tbl_hmsdata_list->StationId->Lookup->getParamTag($tbl_hmsdata_list, "p_x" . $tbl_hmsdata_list->RowIndex . "_StationId") ?>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_StationId" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_StationId" value="<?php echo HtmlEncode($tbl_hmsdata_list->StationId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->obs_DateTime->Visible) { // obs_DateTime ?>
		<td data-name="obs_DateTime">
<span id="el$rowindex$_tbl_hmsdata_obs_DateTime" class="form-group tbl_hmsdata_obs_DateTime">
<input type="text" data-table="tbl_hmsdata" data-field="x_obs_DateTime" data-format="7" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" maxlength="10" value="<?php echo $tbl_hmsdata_list->obs_DateTime->EditValue ?>"<?php echo $tbl_hmsdata_list->obs_DateTime->editAttributes() ?>>
<?php if (!$tbl_hmsdata_list->obs_DateTime->ReadOnly && !$tbl_hmsdata_list->obs_DateTime->Disabled && !isset($tbl_hmsdata_list->obs_DateTime->EditAttrs["readonly"]) && !isset($tbl_hmsdata_list->obs_DateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftbl_hmsdatalist", "datetimepicker"], function() {
	ew.createDateTimePicker("ftbl_hmsdatalist", "x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_obs_DateTime" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_DateTime" value="<?php echo HtmlEncode($tbl_hmsdata_list->obs_DateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->Visible) { // Temp_water_in_pan_inC_830AM ?>
		<td data-name="Temp_water_in_pan_inC_830AM">
<span id="el$rowindex$_tbl_hmsdata_Temp_water_in_pan_inC_830AM" class="form-group tbl_hmsdata_Temp_water_in_pan_inC_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Temp_water_in_pan_inC_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->Visible) { // Temp_water_in_pan_inC_530PM ?>
		<td data-name="Temp_water_in_pan_inC_530PM">
<span id="el$rowindex$_tbl_hmsdata_Temp_water_in_pan_inC_530PM" class="form-group tbl_hmsdata_Temp_water_in_pan_inC_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Temp_water_in_pan_inC_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Temp_water_in_pan_inC_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Temp_water_in_pan_inC_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->App_Evaporation_inMM_830AM->Visible) { // App_Evaporation_inMM_830AM ?>
		<td data-name="App_Evaporation_inMM_830AM">
<span id="el$rowindex$_tbl_hmsdata_App_Evaporation_inMM_830AM" class="form-group tbl_hmsdata_App_Evaporation_inMM_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->App_Evaporation_inMM_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->App_Evaporation_inMM_530PM->Visible) { // App_Evaporation_inMM_530PM ?>
		<td data-name="App_Evaporation_inMM_530PM">
<span id="el$rowindex$_tbl_hmsdata_App_Evaporation_inMM_530PM" class="form-group tbl_hmsdata_App_Evaporation_inMM_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->App_Evaporation_inMM_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_App_Evaporation_inMM_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_App_Evaporation_inMM_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->App_Evaporation_inMM_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Rainfall_inMM_830AM->Visible) { // Rainfall_inMM_830AM ?>
		<td data-name="Rainfall_inMM_830AM">
<span id="el$rowindex$_tbl_hmsdata_Rainfall_inMM_830AM" class="form-group tbl_hmsdata_Rainfall_inMM_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Rainfall_inMM_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Rainfall_inMM_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Rainfall_inMM_530PM->Visible) { // Rainfall_inMM_530PM ?>
		<td data-name="Rainfall_inMM_530PM">
<span id="el$rowindex$_tbl_hmsdata_Rainfall_inMM_530PM" class="form-group tbl_hmsdata_Rainfall_inMM_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Rainfall_inMM_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Rainfall_inMM_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Rainfall_inMM_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Rainfall_inMM_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->Visible) { // Evaporation_curing_inMM_830AM ?>
		<td data-name="Evaporation_curing_inMM_830AM">
<span id="el$rowindex$_tbl_hmsdata_Evaporation_curing_inMM_830AM" class="form-group tbl_hmsdata_Evaporation_curing_inMM_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Evaporation_curing_inMM_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->Visible) { // Evaporation_curing_inMM_530PM ?>
		<td data-name="Evaporation_curing_inMM_530PM">
<span id="el$rowindex$_tbl_hmsdata_Evaporation_curing_inMM_530PM" class="form-group tbl_hmsdata_Evaporation_curing_inMM_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_inMM_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_inMM_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_inMM_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Evaporation_curing_inMM_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->Visible) { // Evaporation_curing_DaywithRain_inMM ?>
		<td data-name="Evaporation_curing_DaywithRain_inMM">
<span id="el$rowindex$_tbl_hmsdata_Evaporation_curing_DaywithRain_inMM" class="form-group tbl_hmsdata_Evaporation_curing_DaywithRain_inMM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithRain_inMM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithRain_inMM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithRain_inMM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Evaporation_curing_DaywithRain_inMM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->Visible) { // Evaporation_curing_DaywithNoRain_inMM ?>
		<td data-name="Evaporation_curing_DaywithNoRain_inMM">
<span id="el$rowindex$_tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM" class="form-group tbl_hmsdata_Evaporation_curing_DaywithNoRain_inMM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithNoRain_inMM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" size="7" maxlength="7" value="<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->EditValue ?>"<?php echo $tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Evaporation_curing_DaywithNoRain_inMM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Evaporation_curing_DaywithNoRain_inMM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Evaporation_curing_DaywithNoRain_inMM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->Visible) { // Dry_Bulb_Temp_inC_830AM ?>
		<td data-name="Dry_Bulb_Temp_inC_830AM">
<span id="el$rowindex$_tbl_hmsdata_Dry_Bulb_Temp_inC_830AM" class="form-group tbl_hmsdata_Dry_Bulb_Temp_inC_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Dry_Bulb_Temp_inC_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->Visible) { // Wet_Bulb_Temp_inC_830AM ?>
		<td data-name="Wet_Bulb_Temp_inC_830AM">
<span id="el$rowindex$_tbl_hmsdata_Wet_Bulb_Temp_inC_830AM" class="form-group tbl_hmsdata_Wet_Bulb_Temp_inC_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Wet_Bulb_Temp_inC_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Vapour_Temp_inC_830AM->Visible) { // Vapour_Temp_inC_830AM ?>
		<td data-name="Vapour_Temp_inC_830AM">
<span id="el$rowindex$_tbl_hmsdata_Vapour_Temp_inC_830AM" class="form-group tbl_hmsdata_Vapour_Temp_inC_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Vapour_Temp_inC_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->Visible) { // Dry_Bulb_Temp_inC_530PM ?>
		<td data-name="Dry_Bulb_Temp_inC_530PM">
<span id="el$rowindex$_tbl_hmsdata_Dry_Bulb_Temp_inC_530PM" class="form-group tbl_hmsdata_Dry_Bulb_Temp_inC_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Dry_Bulb_Temp_inC_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Dry_Bulb_Temp_inC_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Dry_Bulb_Temp_inC_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->Visible) { // Wet_Bulb_Temp_inC_530PM ?>
		<td data-name="Wet_Bulb_Temp_inC_530PM">
<span id="el$rowindex$_tbl_hmsdata_Wet_Bulb_Temp_inC_530PM" class="form-group tbl_hmsdata_Wet_Bulb_Temp_inC_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Wet_Bulb_Temp_inC_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Wet_Bulb_Temp_inC_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Wet_Bulb_Temp_inC_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Vapour_Temp_inC_530PM->Visible) { // Vapour_Temp_inC_530PM ?>
		<td data-name="Vapour_Temp_inC_530PM">
<span id="el$rowindex$_tbl_hmsdata_Vapour_Temp_inC_530PM" class="form-group tbl_hmsdata_Vapour_Temp_inC_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Vapour_Temp_inC_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Vapour_Temp_inC_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Vapour_Temp_inC_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Vapour_Temp_inC_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Max_Temp_inC->Visible) { // Max_Temp_inC ?>
		<td data-name="Max_Temp_inC">
<span id="el$rowindex$_tbl_hmsdata_Max_Temp_inC" class="form-group tbl_hmsdata_Max_Temp_inC">
<input type="text" data-table="tbl_hmsdata" data-field="x_Max_Temp_inC" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Max_Temp_inC->EditValue ?>"<?php echo $tbl_hmsdata_list->Max_Temp_inC->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Max_Temp_inC" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Max_Temp_inC" value="<?php echo HtmlEncode($tbl_hmsdata_list->Max_Temp_inC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Min_Temp_inC->Visible) { // Min_Temp_inC ?>
		<td data-name="Min_Temp_inC">
<span id="el$rowindex$_tbl_hmsdata_Min_Temp_inC" class="form-group tbl_hmsdata_Min_Temp_inC">
<input type="text" data-table="tbl_hmsdata" data-field="x_Min_Temp_inC" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Min_Temp_inC->EditValue ?>"<?php echo $tbl_hmsdata_list->Min_Temp_inC->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Min_Temp_inC" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Min_Temp_inC" value="<?php echo HtmlEncode($tbl_hmsdata_list->Min_Temp_inC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->Visible) { // Total_Wind_Run_inKM_830AM ?>
		<td data-name="Total_Wind_Run_inKM_830AM">
<span id="el$rowindex$_tbl_hmsdata_Total_Wind_Run_inKM_830AM" class="form-group tbl_hmsdata_Total_Wind_Run_inKM_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Total_Wind_Run_inKM_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->Visible) { // Total_Wind_Run_inKM_530PM ?>
		<td data-name="Total_Wind_Run_inKM_530PM">
<span id="el$rowindex$_tbl_hmsdata_Total_Wind_Run_inKM_530PM" class="form-group tbl_hmsdata_Total_Wind_Run_inKM_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Total_Wind_Run_inKM_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Total_Wind_Run_inKM_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Total_Wind_Run_inKM_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Average_Wind_Speed_inKM->Visible) { // Average_Wind_Speed_inKM ?>
		<td data-name="Average_Wind_Speed_inKM">
<span id="el$rowindex$_tbl_hmsdata_Average_Wind_Speed_inKM" class="form-group tbl_hmsdata_Average_Wind_Speed_inKM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Average_Wind_Speed_inKM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->EditValue ?>"<?php echo $tbl_hmsdata_list->Average_Wind_Speed_inKM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Average_Wind_Speed_inKM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Average_Wind_Speed_inKM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Average_Wind_Speed_inKM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->Visible) { // Number_of_Hours_of_Brightsuned ?>
		<td data-name="Number_of_Hours_of_Brightsuned">
<span id="el$rowindex$_tbl_hmsdata_Number_of_Hours_of_Brightsuned" class="form-group tbl_hmsdata_Number_of_Hours_of_Brightsuned">
<input type="text" data-table="tbl_hmsdata" data-field="x_Number_of_Hours_of_Brightsuned" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->EditValue ?>"<?php echo $tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Number_of_Hours_of_Brightsuned" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Number_of_Hours_of_Brightsuned" value="<?php echo HtmlEncode($tbl_hmsdata_list->Number_of_Hours_of_Brightsuned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->Visible) { // Relative_Humidity_in_Precentage_830AM ?>
		<td data-name="Relative_Humidity_in_Precentage_830AM">
<span id="el$rowindex$_tbl_hmsdata_Relative_Humidity_in_Precentage_830AM" class="form-group tbl_hmsdata_Relative_Humidity_in_Precentage_830AM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_830AM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->EditValue ?>"<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_830AM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_830AM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Relative_Humidity_in_Precentage_830AM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->Visible) { // Relative_Humidity_in_Precentage_530PM ?>
		<td data-name="Relative_Humidity_in_Precentage_530PM">
<span id="el$rowindex$_tbl_hmsdata_Relative_Humidity_in_Precentage_530PM" class="form-group tbl_hmsdata_Relative_Humidity_in_Precentage_530PM">
<input type="text" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_530PM" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" size="30" maxlength="7" value="<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->EditValue ?>"<?php echo $tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Relative_Humidity_in_Precentage_530PM" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Relative_Humidity_in_Precentage_530PM" value="<?php echo HtmlEncode($tbl_hmsdata_list->Relative_Humidity_in_Precentage_530PM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->obs_remarks->Visible) { // obs_remarks ?>
		<td data-name="obs_remarks">
<span id="el$rowindex$_tbl_hmsdata_obs_remarks" class="form-group tbl_hmsdata_obs_remarks">
<input type="text" data-table="tbl_hmsdata" data-field="x_obs_remarks" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" size="30" maxlength="50" value="<?php echo $tbl_hmsdata_list->obs_remarks->EditValue ?>"<?php echo $tbl_hmsdata_list->obs_remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_obs_remarks" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_obs_remarks" value="<?php echo HtmlEncode($tbl_hmsdata_list->obs_remarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Status->Visible) { // Status ?>
		<td data-name="Status">
<span id="el$rowindex$_tbl_hmsdata_Status" class="form-group tbl_hmsdata_Status">
<input type="text" data-table="tbl_hmsdata" data-field="x_Status" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" size="30" maxlength="11" value="<?php echo $tbl_hmsdata_list->Status->EditValue ?>"<?php echo $tbl_hmsdata_list->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Status" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($tbl_hmsdata_list->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->Validated->Visible) { // Validated ?>
		<td data-name="Validated">
<span id="el$rowindex$_tbl_hmsdata_Validated" class="form-group tbl_hmsdata_Validated">
<input type="text" data-table="tbl_hmsdata" data-field="x_Validated" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" size="30" maxlength="11" value="<?php echo $tbl_hmsdata_list->Validated->EditValue ?>"<?php echo $tbl_hmsdata_list->Validated->editAttributes() ?>>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_Validated" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_Validated" value="<?php echo HtmlEncode($tbl_hmsdata_list->Validated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tbl_hmsdata_list->isFreeze->Visible) { // isFreeze ?>
		<td data-name="isFreeze">
<span id="el$rowindex$_tbl_hmsdata_isFreeze" class="form-group tbl_hmsdata_isFreeze">
<?php
$selwrk = ConvertToBool($tbl_hmsdata_list->isFreeze->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="tbl_hmsdata" data-field="x_isFreeze" name="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]" id="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]_749917" value="1"<?php echo $selwrk ?><?php echo $tbl_hmsdata_list->isFreeze->editAttributes() ?>>
	<label class="custom-control-label" for="x<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]_749917"></label>
</div>
</span>
<input type="hidden" data-table="tbl_hmsdata" data-field="x_isFreeze" name="o<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]" id="o<?php echo $tbl_hmsdata_list->RowIndex ?>_isFreeze[]" value="<?php echo HtmlEncode($tbl_hmsdata_list->isFreeze->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_hmsdata_list->ListOptions->render("body", "right", $tbl_hmsdata_list->RowIndex);
?>
<script>
loadjs.ready(["ftbl_hmsdatalist", "load"], function() {
	ftbl_hmsdatalist.updateLists(<?php echo $tbl_hmsdata_list->RowIndex ?>);
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
<?php if ($tbl_hmsdata_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $tbl_hmsdata_list->FormKeyCountName ?>" id="<?php echo $tbl_hmsdata_list->FormKeyCountName ?>" value="<?php echo $tbl_hmsdata_list->KeyCount ?>">
<?php } ?>
<?php if ($tbl_hmsdata_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $tbl_hmsdata_list->FormKeyCountName ?>" id="<?php echo $tbl_hmsdata_list->FormKeyCountName ?>" value="<?php echo $tbl_hmsdata_list->KeyCount ?>">
<?php echo $tbl_hmsdata_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$tbl_hmsdata->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tbl_hmsdata_list->Recordset)
	$tbl_hmsdata_list->Recordset->Close();
?>
<?php if (!$tbl_hmsdata_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tbl_hmsdata_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tbl_hmsdata_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tbl_hmsdata_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tbl_hmsdata_list->TotalRecords == 0 && !$tbl_hmsdata->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tbl_hmsdata_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tbl_hmsdata_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tbl_hmsdata_list->isExport()) { ?>
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
$tbl_hmsdata_list->terminate();
?>