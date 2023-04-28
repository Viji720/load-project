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
$master_user_roles_edit = new master_user_roles_edit();

// Run the page
$master_user_roles_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_roles_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_user_rolesedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_user_rolesedit = currentForm = new ew.Form("fmaster_user_rolesedit", "edit");

	// Validate form
	fmaster_user_rolesedit.validate = function() {
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
			<?php if ($master_user_roles_edit->RoleId->Required) { ?>
				elm = this.getElements("x" + infix + "_RoleId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_roles_edit->RoleId->caption(), $master_user_roles_edit->RoleId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RoleId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_user_roles_edit->RoleId->errorMessage()) ?>");
			<?php if ($master_user_roles_edit->RoleName->Required) { ?>
				elm = this.getElements("x" + infix + "_RoleName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_roles_edit->RoleName->caption(), $master_user_roles_edit->RoleName->RequiredErrorMessage)) ?>");
			<?php } ?>
				var elId = fobj.elements["x" + infix + "_RoleId"];
				var elName = fobj.elements["x" + infix + "_RoleName"];
				if (elId && elName) {
					elId.value = $.trim(elId.value);
					elName.value = $.trim(elName.value);
					if (elId && !ew.checkInteger(elId.value))
						return this.onError(elId, ew.language.phrase("UserLevelIDInteger"));
					var level = parseInt(elId.value, 10);
					if (level == 0 && !ew.sameText(elName.value, "Default")) {
						return this.onError(elName, ew.language.phrase("UserLevelDefaultName"));
					} else if (level == -1 && !ew.sameText(elName.value, "Administrator")) {
						return this.onError(elName, ew.language.phrase("UserLevelAdministratorName"));
					} else if (level == -2 && !ew.sameText(elName.value, "Anonymous")) {
						return this.onError(elName, ew.language.phrase("UserLevelAnonymousName"));
					} else if (level < -2) {
						return this.onError(elId, ew.language.phrase("UserLevelIDIncorrect"));
					} else if (level > 0 && ["anonymous", "administrator", "default"].includes(elName.value.toLowerCase())) {
						return this.onError(elName, ew.language.phrase("UserLevelNameIncorrect"));
					}
				}

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
	fmaster_user_rolesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_user_rolesedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_user_rolesedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_user_roles_edit->showPageHeader(); ?>
<?php
$master_user_roles_edit->showMessage();
?>
<form name="fmaster_user_rolesedit" id="fmaster_user_rolesedit" class="<?php echo $master_user_roles_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user_roles">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_user_roles_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_user_roles_edit->RoleId->Visible) { // RoleId ?>
	<div id="r_RoleId" class="form-group row">
		<label id="elh_master_user_roles_RoleId" for="x_RoleId" class="<?php echo $master_user_roles_edit->LeftColumnClass ?>"><?php echo $master_user_roles_edit->RoleId->caption() ?><?php echo $master_user_roles_edit->RoleId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_roles_edit->RightColumnClass ?>"><div <?php echo $master_user_roles_edit->RoleId->cellAttributes() ?>>
<input type="text" data-table="master_user_roles" data-field="x_RoleId" name="x_RoleId" id="x_RoleId" size="30" maxlength="11" value="<?php echo $master_user_roles_edit->RoleId->EditValue ?>"<?php echo $master_user_roles_edit->RoleId->editAttributes() ?>>
<input type="hidden" data-table="master_user_roles" data-field="x_RoleId" name="o_RoleId" id="o_RoleId" value="<?php echo HtmlEncode($master_user_roles_edit->RoleId->OldValue != null ? $master_user_roles_edit->RoleId->OldValue : $master_user_roles_edit->RoleId->CurrentValue) ?>">
<?php echo $master_user_roles_edit->RoleId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_roles_edit->RoleName->Visible) { // RoleName ?>
	<div id="r_RoleName" class="form-group row">
		<label id="elh_master_user_roles_RoleName" for="x_RoleName" class="<?php echo $master_user_roles_edit->LeftColumnClass ?>"><?php echo $master_user_roles_edit->RoleName->caption() ?><?php echo $master_user_roles_edit->RoleName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_roles_edit->RightColumnClass ?>"><div <?php echo $master_user_roles_edit->RoleName->cellAttributes() ?>>
<span id="el_master_user_roles_RoleName">
<input type="text" data-table="master_user_roles" data-field="x_RoleName" name="x_RoleName" id="x_RoleName" size="30" maxlength="100" value="<?php echo $master_user_roles_edit->RoleName->EditValue ?>"<?php echo $master_user_roles_edit->RoleName->editAttributes() ?>>
</span>
<?php echo $master_user_roles_edit->RoleName->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_user_roles_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_user_roles_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_user_roles_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_user_roles_edit->showPageFooter();
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
$master_user_roles_edit->terminate();
?>