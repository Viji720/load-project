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
$master_dams_add = new master_dams_add();

// Run the page
$master_dams_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_dams_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_damsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmaster_damsadd = currentForm = new ew.Form("fmaster_damsadd", "add");

	// Validate form
	fmaster_damsadd.validate = function() {
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
			<?php if ($master_dams_add->SrNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SrNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->SrNo->caption(), $master_dams_add->SrNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SrNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->SrNo->errorMessage()) ?>");
			<?php if ($master_dams_add->PIC->Required) { ?>
				elm = this.getElements("x" + infix + "_PIC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->PIC->caption(), $master_dams_add->PIC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->kpcl_ID->Required) { ?>
				elm = this.getElements("x" + infix + "_kpcl_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->kpcl_ID->caption(), $master_dams_add->kpcl_ID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->Name_of_Dam->Required) { ?>
				elm = this.getElements("x" + infix + "_Name_of_Dam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Name_of_Dam->caption(), $master_dams_add->Name_of_Dam->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->kpcl_dam_name->Required) { ?>
				elm = this.getElements("x" + infix + "_kpcl_dam_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->kpcl_dam_name->caption(), $master_dams_add->kpcl_dam_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->Ops_ID->Required) { ?>
				elm = this.getElements("x" + infix + "_Ops_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Ops_ID->caption(), $master_dams_add->Ops_ID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->dam_size_type_ID->Required) { ?>
				elm = this.getElements("x" + infix + "_dam_size_type_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->dam_size_type_ID->caption(), $master_dams_add->dam_size_type_ID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->dam_Longitude->Required) { ?>
				elm = this.getElements("x" + infix + "_dam_Longitude");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->dam_Longitude->caption(), $master_dams_add->dam_Longitude->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dam_Longitude");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->dam_Longitude->errorMessage()) ?>");
			<?php if ($master_dams_add->dam_Latitude->Required) { ?>
				elm = this.getElements("x" + infix + "_dam_Latitude");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->dam_Latitude->caption(), $master_dams_add->dam_Latitude->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dam_Latitude");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->dam_Latitude->errorMessage()) ?>");
			<?php if ($master_dams_add->Year_of_Completion->Required) { ?>
				elm = this.getElements("x" + infix + "_Year_of_Completion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Year_of_Completion->caption(), $master_dams_add->Year_of_Completion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->Basin->Required) { ?>
				elm = this.getElements("x" + infix + "_Basin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Basin->caption(), $master_dams_add->Basin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->Sub_Basin->Required) { ?>
				elm = this.getElements("x" + infix + "_Sub_Basin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Sub_Basin->caption(), $master_dams_add->Sub_Basin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->district->Required) { ?>
				elm = this.getElements("x" + infix + "_district");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->district->caption(), $master_dams_add->district->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->Taluka->Required) { ?>
				elm = this.getElements("x" + infix + "_Taluka");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Taluka->caption(), $master_dams_add->Taluka->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->River->Required) { ?>
				elm = this.getElements("x" + infix + "_River");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->River->caption(), $master_dams_add->River->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->Neareast_City->Required) { ?>
				elm = this.getElements("x" + infix + "_Neareast_City");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Neareast_City->caption(), $master_dams_add->Neareast_City->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->dam_construction_type->Required) { ?>
				elm = this.getElements("x" + infix + "_dam_construction_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->dam_construction_type->caption(), $master_dams_add->dam_construction_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->Required) { ?>
				elm = this.getElements("x" + infix + "_Height_above_Lowest_Foundation_Level_in_mtr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->caption(), $master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Height_above_Lowest_Foundation_Level_in_mtr");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->errorMessage()) ?>");
			<?php if ($master_dams_add->Length_of_Dam_in_mtr->Required) { ?>
				elm = this.getElements("x" + infix + "_Length_of_Dam_in_mtr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Length_of_Dam_in_mtr->caption(), $master_dams_add->Length_of_Dam_in_mtr->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Length_of_Dam_in_mtr");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->Length_of_Dam_in_mtr->errorMessage()) ?>");
			<?php if ($master_dams_add->Volume_Content_of_Dam_in_MCM->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume_Content_of_Dam_in_MCM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Volume_Content_of_Dam_in_MCM->caption(), $master_dams_add->Volume_Content_of_Dam_in_MCM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Volume_Content_of_Dam_in_MCM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->Volume_Content_of_Dam_in_MCM->errorMessage()) ?>");
			<?php if ($master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->Required) { ?>
				elm = this.getElements("x" + infix + "_Gross_Storage_Capacity_of_Dam_in_MCM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->caption(), $master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Gross_Storage_Capacity_of_Dam_in_MCM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->errorMessage()) ?>");
			<?php if ($master_dams_add->Reservoir_Area_in_sq_km->Required) { ?>
				elm = this.getElements("x" + infix + "_Reservoir_Area_in_sq_km");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Reservoir_Area_in_sq_km->caption(), $master_dams_add->Reservoir_Area_in_sq_km->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reservoir_Area_in_sq_km");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->Reservoir_Area_in_sq_km->errorMessage()) ?>");
			<?php if ($master_dams_add->Effective_Storage_Capacity_in_MCM->Required) { ?>
				elm = this.getElements("x" + infix + "_Effective_Storage_Capacity_in_MCM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Effective_Storage_Capacity_in_MCM->caption(), $master_dams_add->Effective_Storage_Capacity_in_MCM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Effective_Storage_Capacity_in_MCM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->Effective_Storage_Capacity_in_MCM->errorMessage()) ?>");
			<?php if ($master_dams_add->Purpose->Required) { ?>
				elm = this.getElements("x" + infix + "_Purpose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Purpose->caption(), $master_dams_add->Purpose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->Required) { ?>
				elm = this.getElements("x" + infix + "_Designed_Spillway_Capacity_in_M3_per_sec");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->caption(), $master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Designed_Spillway_Capacity_in_M3_per_sec");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->errorMessage()) ?>");
			<?php if ($master_dams_add->dam_construction_type_ID->Required) { ?>
				elm = this.getElements("x" + infix + "_dam_construction_type_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_dams_add->dam_construction_type_ID->caption(), $master_dams_add->dam_construction_type_ID->RequiredErrorMessage)) ?>");
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
	fmaster_damsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_damsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_damsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_dams_add->showPageHeader(); ?>
<?php
$master_dams_add->showMessage();
?>
<form name="fmaster_damsadd" id="fmaster_damsadd" class="<?php echo $master_dams_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_dams">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$master_dams_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($master_dams_add->SrNo->Visible) { // SrNo ?>
	<div id="r_SrNo" class="form-group row">
		<label id="elh_master_dams_SrNo" for="x_SrNo" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->SrNo->caption() ?><?php echo $master_dams_add->SrNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->SrNo->cellAttributes() ?>>
<span id="el_master_dams_SrNo">
<input type="text" data-table="master_dams" data-field="x_SrNo" name="x_SrNo" id="x_SrNo" size="30" maxlength="11" value="<?php echo $master_dams_add->SrNo->EditValue ?>"<?php echo $master_dams_add->SrNo->editAttributes() ?>>
</span>
<?php echo $master_dams_add->SrNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->PIC->Visible) { // PIC ?>
	<div id="r_PIC" class="form-group row">
		<label id="elh_master_dams_PIC" for="x_PIC" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->PIC->caption() ?><?php echo $master_dams_add->PIC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->PIC->cellAttributes() ?>>
<span id="el_master_dams_PIC">
<input type="text" data-table="master_dams" data-field="x_PIC" name="x_PIC" id="x_PIC" size="30" maxlength="12" value="<?php echo $master_dams_add->PIC->EditValue ?>"<?php echo $master_dams_add->PIC->editAttributes() ?>>
</span>
<?php echo $master_dams_add->PIC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->kpcl_ID->Visible) { // kpcl_ID ?>
	<div id="r_kpcl_ID" class="form-group row">
		<label id="elh_master_dams_kpcl_ID" for="x_kpcl_ID" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->kpcl_ID->caption() ?><?php echo $master_dams_add->kpcl_ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->kpcl_ID->cellAttributes() ?>>
<span id="el_master_dams_kpcl_ID">
<input type="text" data-table="master_dams" data-field="x_kpcl_ID" name="x_kpcl_ID" id="x_kpcl_ID" size="30" maxlength="10" value="<?php echo $master_dams_add->kpcl_ID->EditValue ?>"<?php echo $master_dams_add->kpcl_ID->editAttributes() ?>>
</span>
<?php echo $master_dams_add->kpcl_ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Name_of_Dam->Visible) { // Name_of_Dam ?>
	<div id="r_Name_of_Dam" class="form-group row">
		<label id="elh_master_dams_Name_of_Dam" for="x_Name_of_Dam" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Name_of_Dam->caption() ?><?php echo $master_dams_add->Name_of_Dam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Name_of_Dam->cellAttributes() ?>>
<span id="el_master_dams_Name_of_Dam">
<input type="text" data-table="master_dams" data-field="x_Name_of_Dam" name="x_Name_of_Dam" id="x_Name_of_Dam" size="30" maxlength="255" value="<?php echo $master_dams_add->Name_of_Dam->EditValue ?>"<?php echo $master_dams_add->Name_of_Dam->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Name_of_Dam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->kpcl_dam_name->Visible) { // kpcl_dam_name ?>
	<div id="r_kpcl_dam_name" class="form-group row">
		<label id="elh_master_dams_kpcl_dam_name" for="x_kpcl_dam_name" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->kpcl_dam_name->caption() ?><?php echo $master_dams_add->kpcl_dam_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->kpcl_dam_name->cellAttributes() ?>>
<span id="el_master_dams_kpcl_dam_name">
<input type="text" data-table="master_dams" data-field="x_kpcl_dam_name" name="x_kpcl_dam_name" id="x_kpcl_dam_name" size="30" maxlength="25" value="<?php echo $master_dams_add->kpcl_dam_name->EditValue ?>"<?php echo $master_dams_add->kpcl_dam_name->editAttributes() ?>>
</span>
<?php echo $master_dams_add->kpcl_dam_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Ops_ID->Visible) { // Ops_ID ?>
	<div id="r_Ops_ID" class="form-group row">
		<label id="elh_master_dams_Ops_ID" for="x_Ops_ID" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Ops_ID->caption() ?><?php echo $master_dams_add->Ops_ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Ops_ID->cellAttributes() ?>>
<span id="el_master_dams_Ops_ID">
<input type="text" data-table="master_dams" data-field="x_Ops_ID" name="x_Ops_ID" id="x_Ops_ID" size="30" maxlength="10" value="<?php echo $master_dams_add->Ops_ID->EditValue ?>"<?php echo $master_dams_add->Ops_ID->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Ops_ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->dam_size_type_ID->Visible) { // dam_size_type_ID ?>
	<div id="r_dam_size_type_ID" class="form-group row">
		<label id="elh_master_dams_dam_size_type_ID" for="x_dam_size_type_ID" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->dam_size_type_ID->caption() ?><?php echo $master_dams_add->dam_size_type_ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->dam_size_type_ID->cellAttributes() ?>>
<span id="el_master_dams_dam_size_type_ID">
<input type="text" data-table="master_dams" data-field="x_dam_size_type_ID" name="x_dam_size_type_ID" id="x_dam_size_type_ID" size="30" maxlength="10" value="<?php echo $master_dams_add->dam_size_type_ID->EditValue ?>"<?php echo $master_dams_add->dam_size_type_ID->editAttributes() ?>>
</span>
<?php echo $master_dams_add->dam_size_type_ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->dam_Longitude->Visible) { // dam_Longitude ?>
	<div id="r_dam_Longitude" class="form-group row">
		<label id="elh_master_dams_dam_Longitude" for="x_dam_Longitude" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->dam_Longitude->caption() ?><?php echo $master_dams_add->dam_Longitude->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->dam_Longitude->cellAttributes() ?>>
<span id="el_master_dams_dam_Longitude">
<input type="text" data-table="master_dams" data-field="x_dam_Longitude" name="x_dam_Longitude" id="x_dam_Longitude" size="30" maxlength="12" value="<?php echo $master_dams_add->dam_Longitude->EditValue ?>"<?php echo $master_dams_add->dam_Longitude->editAttributes() ?>>
</span>
<?php echo $master_dams_add->dam_Longitude->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->dam_Latitude->Visible) { // dam_Latitude ?>
	<div id="r_dam_Latitude" class="form-group row">
		<label id="elh_master_dams_dam_Latitude" for="x_dam_Latitude" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->dam_Latitude->caption() ?><?php echo $master_dams_add->dam_Latitude->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->dam_Latitude->cellAttributes() ?>>
<span id="el_master_dams_dam_Latitude">
<input type="text" data-table="master_dams" data-field="x_dam_Latitude" name="x_dam_Latitude" id="x_dam_Latitude" size="30" maxlength="12" value="<?php echo $master_dams_add->dam_Latitude->EditValue ?>"<?php echo $master_dams_add->dam_Latitude->editAttributes() ?>>
</span>
<?php echo $master_dams_add->dam_Latitude->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Year_of_Completion->Visible) { // Year_of_Completion ?>
	<div id="r_Year_of_Completion" class="form-group row">
		<label id="elh_master_dams_Year_of_Completion" for="x_Year_of_Completion" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Year_of_Completion->caption() ?><?php echo $master_dams_add->Year_of_Completion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Year_of_Completion->cellAttributes() ?>>
<span id="el_master_dams_Year_of_Completion">
<input type="text" data-table="master_dams" data-field="x_Year_of_Completion" name="x_Year_of_Completion" id="x_Year_of_Completion" size="30" maxlength="4" value="<?php echo $master_dams_add->Year_of_Completion->EditValue ?>"<?php echo $master_dams_add->Year_of_Completion->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Year_of_Completion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Basin->Visible) { // Basin ?>
	<div id="r_Basin" class="form-group row">
		<label id="elh_master_dams_Basin" for="x_Basin" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Basin->caption() ?><?php echo $master_dams_add->Basin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Basin->cellAttributes() ?>>
<span id="el_master_dams_Basin">
<input type="text" data-table="master_dams" data-field="x_Basin" name="x_Basin" id="x_Basin" size="30" maxlength="100" value="<?php echo $master_dams_add->Basin->EditValue ?>"<?php echo $master_dams_add->Basin->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Basin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Sub_Basin->Visible) { // Sub-Basin ?>
	<div id="r_Sub_Basin" class="form-group row">
		<label id="elh_master_dams_Sub_Basin" for="x_Sub_Basin" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Sub_Basin->caption() ?><?php echo $master_dams_add->Sub_Basin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Sub_Basin->cellAttributes() ?>>
<span id="el_master_dams_Sub_Basin">
<input type="text" data-table="master_dams" data-field="x_Sub_Basin" name="x_Sub_Basin" id="x_Sub_Basin" size="30" maxlength="100" value="<?php echo $master_dams_add->Sub_Basin->EditValue ?>"<?php echo $master_dams_add->Sub_Basin->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Sub_Basin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->district->Visible) { // district ?>
	<div id="r_district" class="form-group row">
		<label id="elh_master_dams_district" for="x_district" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->district->caption() ?><?php echo $master_dams_add->district->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->district->cellAttributes() ?>>
<span id="el_master_dams_district">
<input type="text" data-table="master_dams" data-field="x_district" name="x_district" id="x_district" size="30" maxlength="100" value="<?php echo $master_dams_add->district->EditValue ?>"<?php echo $master_dams_add->district->editAttributes() ?>>
</span>
<?php echo $master_dams_add->district->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Taluka->Visible) { // Taluka ?>
	<div id="r_Taluka" class="form-group row">
		<label id="elh_master_dams_Taluka" for="x_Taluka" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Taluka->caption() ?><?php echo $master_dams_add->Taluka->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Taluka->cellAttributes() ?>>
<span id="el_master_dams_Taluka">
<input type="text" data-table="master_dams" data-field="x_Taluka" name="x_Taluka" id="x_Taluka" size="30" maxlength="100" value="<?php echo $master_dams_add->Taluka->EditValue ?>"<?php echo $master_dams_add->Taluka->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Taluka->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->River->Visible) { // River ?>
	<div id="r_River" class="form-group row">
		<label id="elh_master_dams_River" for="x_River" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->River->caption() ?><?php echo $master_dams_add->River->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->River->cellAttributes() ?>>
<span id="el_master_dams_River">
<input type="text" data-table="master_dams" data-field="x_River" name="x_River" id="x_River" size="30" maxlength="100" value="<?php echo $master_dams_add->River->EditValue ?>"<?php echo $master_dams_add->River->editAttributes() ?>>
</span>
<?php echo $master_dams_add->River->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Neareast_City->Visible) { // Neareast_City ?>
	<div id="r_Neareast_City" class="form-group row">
		<label id="elh_master_dams_Neareast_City" for="x_Neareast_City" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Neareast_City->caption() ?><?php echo $master_dams_add->Neareast_City->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Neareast_City->cellAttributes() ?>>
<span id="el_master_dams_Neareast_City">
<input type="text" data-table="master_dams" data-field="x_Neareast_City" name="x_Neareast_City" id="x_Neareast_City" size="30" maxlength="255" value="<?php echo $master_dams_add->Neareast_City->EditValue ?>"<?php echo $master_dams_add->Neareast_City->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Neareast_City->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->dam_construction_type->Visible) { // dam_construction_type ?>
	<div id="r_dam_construction_type" class="form-group row">
		<label id="elh_master_dams_dam_construction_type" for="x_dam_construction_type" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->dam_construction_type->caption() ?><?php echo $master_dams_add->dam_construction_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->dam_construction_type->cellAttributes() ?>>
<span id="el_master_dams_dam_construction_type">
<input type="text" data-table="master_dams" data-field="x_dam_construction_type" name="x_dam_construction_type" id="x_dam_construction_type" size="30" maxlength="50" value="<?php echo $master_dams_add->dam_construction_type->EditValue ?>"<?php echo $master_dams_add->dam_construction_type->editAttributes() ?>>
</span>
<?php echo $master_dams_add->dam_construction_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->Visible) { // Height_above_Lowest_Foundation_Level_in_mtr ?>
	<div id="r_Height_above_Lowest_Foundation_Level_in_mtr" class="form-group row">
		<label id="elh_master_dams_Height_above_Lowest_Foundation_Level_in_mtr" for="x_Height_above_Lowest_Foundation_Level_in_mtr" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->caption() ?><?php echo $master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->cellAttributes() ?>>
<span id="el_master_dams_Height_above_Lowest_Foundation_Level_in_mtr">
<input type="text" data-table="master_dams" data-field="x_Height_above_Lowest_Foundation_Level_in_mtr" name="x_Height_above_Lowest_Foundation_Level_in_mtr" id="x_Height_above_Lowest_Foundation_Level_in_mtr" size="30" maxlength="12" value="<?php echo $master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->EditValue ?>"<?php echo $master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Height_above_Lowest_Foundation_Level_in_mtr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Length_of_Dam_in_mtr->Visible) { // Length_of_Dam_in_mtr ?>
	<div id="r_Length_of_Dam_in_mtr" class="form-group row">
		<label id="elh_master_dams_Length_of_Dam_in_mtr" for="x_Length_of_Dam_in_mtr" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Length_of_Dam_in_mtr->caption() ?><?php echo $master_dams_add->Length_of_Dam_in_mtr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Length_of_Dam_in_mtr->cellAttributes() ?>>
<span id="el_master_dams_Length_of_Dam_in_mtr">
<input type="text" data-table="master_dams" data-field="x_Length_of_Dam_in_mtr" name="x_Length_of_Dam_in_mtr" id="x_Length_of_Dam_in_mtr" size="30" maxlength="12" value="<?php echo $master_dams_add->Length_of_Dam_in_mtr->EditValue ?>"<?php echo $master_dams_add->Length_of_Dam_in_mtr->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Length_of_Dam_in_mtr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Volume_Content_of_Dam_in_MCM->Visible) { // Volume_Content_of_Dam_in_MCM ?>
	<div id="r_Volume_Content_of_Dam_in_MCM" class="form-group row">
		<label id="elh_master_dams_Volume_Content_of_Dam_in_MCM" for="x_Volume_Content_of_Dam_in_MCM" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Volume_Content_of_Dam_in_MCM->caption() ?><?php echo $master_dams_add->Volume_Content_of_Dam_in_MCM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Volume_Content_of_Dam_in_MCM->cellAttributes() ?>>
<span id="el_master_dams_Volume_Content_of_Dam_in_MCM">
<input type="text" data-table="master_dams" data-field="x_Volume_Content_of_Dam_in_MCM" name="x_Volume_Content_of_Dam_in_MCM" id="x_Volume_Content_of_Dam_in_MCM" size="30" maxlength="12" value="<?php echo $master_dams_add->Volume_Content_of_Dam_in_MCM->EditValue ?>"<?php echo $master_dams_add->Volume_Content_of_Dam_in_MCM->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Volume_Content_of_Dam_in_MCM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->Visible) { // Gross_Storage_Capacity_of_Dam_in_MCM ?>
	<div id="r_Gross_Storage_Capacity_of_Dam_in_MCM" class="form-group row">
		<label id="elh_master_dams_Gross_Storage_Capacity_of_Dam_in_MCM" for="x_Gross_Storage_Capacity_of_Dam_in_MCM" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->caption() ?><?php echo $master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->cellAttributes() ?>>
<span id="el_master_dams_Gross_Storage_Capacity_of_Dam_in_MCM">
<input type="text" data-table="master_dams" data-field="x_Gross_Storage_Capacity_of_Dam_in_MCM" name="x_Gross_Storage_Capacity_of_Dam_in_MCM" id="x_Gross_Storage_Capacity_of_Dam_in_MCM" size="30" maxlength="12" value="<?php echo $master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue ?>"<?php echo $master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Gross_Storage_Capacity_of_Dam_in_MCM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Reservoir_Area_in_sq_km->Visible) { // Reservoir_Area_in_sq_km ?>
	<div id="r_Reservoir_Area_in_sq_km" class="form-group row">
		<label id="elh_master_dams_Reservoir_Area_in_sq_km" for="x_Reservoir_Area_in_sq_km" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Reservoir_Area_in_sq_km->caption() ?><?php echo $master_dams_add->Reservoir_Area_in_sq_km->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Reservoir_Area_in_sq_km->cellAttributes() ?>>
<span id="el_master_dams_Reservoir_Area_in_sq_km">
<input type="text" data-table="master_dams" data-field="x_Reservoir_Area_in_sq_km" name="x_Reservoir_Area_in_sq_km" id="x_Reservoir_Area_in_sq_km" size="30" maxlength="12" value="<?php echo $master_dams_add->Reservoir_Area_in_sq_km->EditValue ?>"<?php echo $master_dams_add->Reservoir_Area_in_sq_km->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Reservoir_Area_in_sq_km->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Effective_Storage_Capacity_in_MCM->Visible) { // Effective_Storage_Capacity_in_MCM ?>
	<div id="r_Effective_Storage_Capacity_in_MCM" class="form-group row">
		<label id="elh_master_dams_Effective_Storage_Capacity_in_MCM" for="x_Effective_Storage_Capacity_in_MCM" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Effective_Storage_Capacity_in_MCM->caption() ?><?php echo $master_dams_add->Effective_Storage_Capacity_in_MCM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Effective_Storage_Capacity_in_MCM->cellAttributes() ?>>
<span id="el_master_dams_Effective_Storage_Capacity_in_MCM">
<input type="text" data-table="master_dams" data-field="x_Effective_Storage_Capacity_in_MCM" name="x_Effective_Storage_Capacity_in_MCM" id="x_Effective_Storage_Capacity_in_MCM" size="30" maxlength="12" value="<?php echo $master_dams_add->Effective_Storage_Capacity_in_MCM->EditValue ?>"<?php echo $master_dams_add->Effective_Storage_Capacity_in_MCM->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Effective_Storage_Capacity_in_MCM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_master_dams_Purpose" for="x_Purpose" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Purpose->caption() ?><?php echo $master_dams_add->Purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Purpose->cellAttributes() ?>>
<span id="el_master_dams_Purpose">
<input type="text" data-table="master_dams" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="50" value="<?php echo $master_dams_add->Purpose->EditValue ?>"<?php echo $master_dams_add->Purpose->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->Visible) { // Designed_Spillway_Capacity_in_M3_per_sec ?>
	<div id="r_Designed_Spillway_Capacity_in_M3_per_sec" class="form-group row">
		<label id="elh_master_dams_Designed_Spillway_Capacity_in_M3_per_sec" for="x_Designed_Spillway_Capacity_in_M3_per_sec" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->caption() ?><?php echo $master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->cellAttributes() ?>>
<span id="el_master_dams_Designed_Spillway_Capacity_in_M3_per_sec">
<input type="text" data-table="master_dams" data-field="x_Designed_Spillway_Capacity_in_M3_per_sec" name="x_Designed_Spillway_Capacity_in_M3_per_sec" id="x_Designed_Spillway_Capacity_in_M3_per_sec" size="30" maxlength="12" value="<?php echo $master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->EditValue ?>"<?php echo $master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->editAttributes() ?>>
</span>
<?php echo $master_dams_add->Designed_Spillway_Capacity_in_M3_per_sec->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_dams_add->dam_construction_type_ID->Visible) { // dam_construction_type_ID ?>
	<div id="r_dam_construction_type_ID" class="form-group row">
		<label id="elh_master_dams_dam_construction_type_ID" for="x_dam_construction_type_ID" class="<?php echo $master_dams_add->LeftColumnClass ?>"><?php echo $master_dams_add->dam_construction_type_ID->caption() ?><?php echo $master_dams_add->dam_construction_type_ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_dams_add->RightColumnClass ?>"><div <?php echo $master_dams_add->dam_construction_type_ID->cellAttributes() ?>>
<span id="el_master_dams_dam_construction_type_ID">
<input type="text" data-table="master_dams" data-field="x_dam_construction_type_ID" name="x_dam_construction_type_ID" id="x_dam_construction_type_ID" size="30" maxlength="10" value="<?php echo $master_dams_add->dam_construction_type_ID->EditValue ?>"<?php echo $master_dams_add->dam_construction_type_ID->editAttributes() ?>>
</span>
<?php echo $master_dams_add->dam_construction_type_ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_dams_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_dams_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_dams_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_dams_add->showPageFooter();
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
$master_dams_add->terminate();
?>