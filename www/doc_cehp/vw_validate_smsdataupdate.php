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
$vw_validate_smsdata_update = new vw_validate_smsdata_update();

// Run the page
$vw_validate_smsdata_update->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vw_validate_smsdata_update->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fvw_validate_smsdataupdate, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "update";
	fvw_validate_smsdataupdate = currentForm = new ew.Form("fvw_validate_smsdataupdate", "update");

	// Validate form
	fvw_validate_smsdataupdate.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		if (!ew.updateSelected(fobj)) {
			ew.alert(ew.language.phrase("NoFieldSelected"));
			return false;
		}
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($vw_validate_smsdata_update->mst_validated->Required) { ?>
				elm = this.getElements("x" + infix + "_mst_validated");
				uelm = this.getElements("u" + infix + "_mst_validated");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vw_validate_smsdata_update->mst_validated->caption(), $vw_validate_smsdata_update->mst_validated->RequiredErrorMessage)) ?>");
				}
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fvw_validate_smsdataupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fvw_validate_smsdataupdate.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fvw_validate_smsdataupdate.lists["x_mst_validated"] = <?php echo $vw_validate_smsdata_update->mst_validated->Lookup->toClientList($vw_validate_smsdata_update) ?>;
	fvw_validate_smsdataupdate.lists["x_mst_validated"].options = <?php echo JsonEncode($vw_validate_smsdata_update->mst_validated->lookupOptions()) ?>;
	loadjs.done("fvw_validate_smsdataupdate");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $vw_validate_smsdata_update->showPageHeader(); ?>
<?php
$vw_validate_smsdata_update->showMessage();
?>
<form name="fvw_validate_smsdataupdate" id="fvw_validate_smsdataupdate" class="<?php echo $vw_validate_smsdata_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vw_validate_smsdata">
<?php if ($vw_validate_smsdata->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$vw_validate_smsdata_update->IsModal ?>">
<?php foreach ($vw_validate_smsdata_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_vw_validate_smsdataupdate" class="ew-update-div"><!-- page -->
	<div class="custom-control custom-checkbox">
		<input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"<?php echo $vw_validate_smsdata_update->Disabled ?>><label class="custom-control-label" for="u"><?php echo $Language->phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($vw_validate_smsdata_update->mst_validated->Visible) { // mst_validated ?>
	<div id="r_mst_validated" class="form-group row">
		<label for="x_mst_validated" class="<?php echo $vw_validate_smsdata_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<?php if (!$vw_validate_smsdata->isConfirm()) { ?>
<input type="checkbox" name="u_mst_validated" id="u_mst_validated" class="custom-control-input ew-multi-select" value="1"<?php echo $vw_validate_smsdata_update->mst_validated->MultiUpdate == "1" ? " checked" : "" ?>>
<?php } else { ?>
<input type="hidden" name="u_mst_validated" id="u_mst_validated" value="<?php echo $vw_validate_smsdata_update->mst_validated->MultiUpdate ?>">
<input type="checkbox" class="custom-control-input" disabled<?php echo $vw_validate_smsdata_update->mst_validated->MultiUpdate == "1" ? " checked" : "" ?>>
<?php } ?>
<label class="custom-control-label" for="u_mst_validated"><?php echo $vw_validate_smsdata_update->mst_validated->caption() ?></label></div></label>
		<div class="<?php echo $vw_validate_smsdata_update->RightColumnClass ?>"><div <?php echo $vw_validate_smsdata_update->mst_validated->cellAttributes() ?>>
<?php if (!$vw_validate_smsdata->isConfirm()) { ?>
<span id="el_vw_validate_smsdata_mst_validated">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="vw_validate_smsdata" data-field="x_mst_validated" data-value-separator="<?php echo $vw_validate_smsdata_update->mst_validated->displayValueSeparatorAttribute() ?>" id="x_mst_validated" name="x_mst_validated"<?php echo $vw_validate_smsdata_update->mst_validated->editAttributes() ?>>
			<?php echo $vw_validate_smsdata_update->mst_validated->selectOptionListHtml("x_mst_validated") ?>
		</select>
</div>
<?php echo $vw_validate_smsdata_update->mst_validated->Lookup->getParamTag($vw_validate_smsdata_update, "p_x_mst_validated") ?>
</span>
<?php } else { ?>
<span id="el_vw_validate_smsdata_mst_validated">
<span<?php echo $vw_validate_smsdata_update->mst_validated->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($vw_validate_smsdata_update->mst_validated->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="vw_validate_smsdata" data-field="x_mst_validated" name="x_mst_validated" id="x_mst_validated" value="<?php echo HtmlEncode($vw_validate_smsdata_update->mst_validated->FormValue) ?>">
<?php } ?>
<?php echo $vw_validate_smsdata_update->mst_validated->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page -->
<?php if (!$vw_validate_smsdata_update->IsModal) { ?>
	<div class="form-group row"><!-- buttons .form-group -->
		<div class="<?php echo $vw_validate_smsdata_update->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$vw_validate_smsdata->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $vw_validate_smsdata_update->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("ConfirmBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="submit" onclick="this.form.action.value='cancel';"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } ?>
		</div><!-- /buttons offset -->
	</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$vw_validate_smsdata_update->showPageFooter();
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
$vw_validate_smsdata_update->terminate();
?>