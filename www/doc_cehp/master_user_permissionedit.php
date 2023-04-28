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
$master_user_permission_edit = new master_user_permission_edit();

// Run the page
$master_user_permission_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_user_permission_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmaster_user_permissionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmaster_user_permissionedit = currentForm = new ew.Form("fmaster_user_permissionedit", "edit");

	// Validate form
	fmaster_user_permissionedit.validate = function() {
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
			<?php if ($master_user_permission_edit->userlevelid->Required) { ?>
				elm = this.getElements("x" + infix + "_userlevelid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_permission_edit->userlevelid->caption(), $master_user_permission_edit->userlevelid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_userlevelid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_user_permission_edit->userlevelid->errorMessage()) ?>");
			<?php if ($master_user_permission_edit->_tablename->Required) { ?>
				elm = this.getElements("x" + infix + "__tablename");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_permission_edit->_tablename->caption(), $master_user_permission_edit->_tablename->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($master_user_permission_edit->permission->Required) { ?>
				elm = this.getElements("x" + infix + "_permission");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_user_permission_edit->permission->caption(), $master_user_permission_edit->permission->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_permission");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($master_user_permission_edit->permission->errorMessage()) ?>");

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
	fmaster_user_permissionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmaster_user_permissionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmaster_user_permissionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $master_user_permission_edit->showPageHeader(); ?>
<?php
$master_user_permission_edit->showMessage();
?>
<form name="fmaster_user_permissionedit" id="fmaster_user_permissionedit" class="<?php echo $master_user_permission_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_user_permission">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$master_user_permission_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($master_user_permission_edit->userlevelid->Visible) { // userlevelid ?>
	<div id="r_userlevelid" class="form-group row">
		<label id="elh_master_user_permission_userlevelid" for="x_userlevelid" class="<?php echo $master_user_permission_edit->LeftColumnClass ?>"><?php echo $master_user_permission_edit->userlevelid->caption() ?><?php echo $master_user_permission_edit->userlevelid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_permission_edit->RightColumnClass ?>"><div <?php echo $master_user_permission_edit->userlevelid->cellAttributes() ?>>
<input type="text" data-table="master_user_permission" data-field="x_userlevelid" name="x_userlevelid" id="x_userlevelid" size="30" maxlength="11" value="<?php echo $master_user_permission_edit->userlevelid->EditValue ?>"<?php echo $master_user_permission_edit->userlevelid->editAttributes() ?>>
<input type="hidden" data-table="master_user_permission" data-field="x_userlevelid" name="o_userlevelid" id="o_userlevelid" value="<?php echo HtmlEncode($master_user_permission_edit->userlevelid->OldValue != null ? $master_user_permission_edit->userlevelid->OldValue : $master_user_permission_edit->userlevelid->CurrentValue) ?>">
<?php echo $master_user_permission_edit->userlevelid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_permission_edit->_tablename->Visible) { // tablename ?>
	<div id="r__tablename" class="form-group row">
		<label id="elh_master_user_permission__tablename" for="x__tablename" class="<?php echo $master_user_permission_edit->LeftColumnClass ?>"><?php echo $master_user_permission_edit->_tablename->caption() ?><?php echo $master_user_permission_edit->_tablename->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_permission_edit->RightColumnClass ?>"><div <?php echo $master_user_permission_edit->_tablename->cellAttributes() ?>>
<input type="text" data-table="master_user_permission" data-field="x__tablename" name="x__tablename" id="x__tablename" size="30" maxlength="80" value="<?php echo $master_user_permission_edit->_tablename->EditValue ?>"<?php echo $master_user_permission_edit->_tablename->editAttributes() ?>>
<input type="hidden" data-table="master_user_permission" data-field="x__tablename" name="o__tablename" id="o__tablename" value="<?php echo HtmlEncode($master_user_permission_edit->_tablename->OldValue != null ? $master_user_permission_edit->_tablename->OldValue : $master_user_permission_edit->_tablename->CurrentValue) ?>">
<?php echo $master_user_permission_edit->_tablename->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_user_permission_edit->permission->Visible) { // permission ?>
	<div id="r_permission" class="form-group row">
		<label id="elh_master_user_permission_permission" for="x_permission" class="<?php echo $master_user_permission_edit->LeftColumnClass ?>"><?php echo $master_user_permission_edit->permission->caption() ?><?php echo $master_user_permission_edit->permission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_user_permission_edit->RightColumnClass ?>"><div <?php echo $master_user_permission_edit->permission->cellAttributes() ?>>
<span id="el_master_user_permission_permission">
<input type="text" data-table="master_user_permission" data-field="x_permission" name="x_permission" id="x_permission" size="30" maxlength="11" value="<?php echo $master_user_permission_edit->permission->EditValue ?>"<?php echo $master_user_permission_edit->permission->editAttributes() ?>>
</span>
<?php echo $master_user_permission_edit->permission->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_user_permission_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_user_permission_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_user_permission_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_user_permission_edit->showPageFooter();
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
$master_user_permission_edit->terminate();
?>