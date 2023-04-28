<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class lkp_validated_add extends lkp_validated
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'lkp_validated';

	// Page object name
	public $PageObjName = "lkp_validated_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (lkp_validated)
		if (!isset($GLOBALS["lkp_validated"]) || get_class($GLOBALS["lkp_validated"]) == PROJECT_NAMESPACE . "lkp_validated") {
			$GLOBALS["lkp_validated"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lkp_validated"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lkp_validated');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (master_user)
		$UserTable = $UserTable ?: new master_user();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $lkp_validated;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($lkp_validated);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "lkp_validatedview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['validated'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
		$Security->UserID_Loading();
		$Security->loadUserID();
		$Security->UserID_Loaded();
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canAdd()) {
				SetStatus(401); // Unauthorized
				return;
			}
		} else {
			$Security = new AdvancedSecurity();
			if (IsPasswordExpired())
				$this->terminate(GetUrl("changepwd.php"));
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("lkp_validatedlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->validated->setVisibility();
		$this->validatedName->setVisibility();
		$this->is_station_allowed->setVisibility();
		$this->is_subdiv_allowed->setVisibility();
		$this->is_circle_allowed->setVisibility();
		$this->is_WRDO_allowed->setVisibility();
		$this->record_count->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Check permission

		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("lkp_validatedlist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("validated") !== NULL) {
				$this->validated->setQueryStringValue(Get("validated"));
				$this->setKey("validated", $this->validated->CurrentValue); // Set up key
			} else {
				$this->setKey("validated", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("lkp_validatedlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "lkp_validatedlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "lkp_validatedview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->validated->CurrentValue = NULL;
		$this->validated->OldValue = $this->validated->CurrentValue;
		$this->validatedName->CurrentValue = NULL;
		$this->validatedName->OldValue = $this->validatedName->CurrentValue;
		$this->is_station_allowed->CurrentValue = "Y";
		$this->is_subdiv_allowed->CurrentValue = "Y";
		$this->is_circle_allowed->CurrentValue = "Y";
		$this->is_WRDO_allowed->CurrentValue = "Y";
		$this->record_count->CurrentValue = 0;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'validated' first before field var 'x_validated'
		$val = $CurrentForm->hasValue("validated") ? $CurrentForm->getValue("validated") : $CurrentForm->getValue("x_validated");
		if (!$this->validated->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->validated->Visible = FALSE; // Disable update for API request
			else
				$this->validated->setFormValue($val);
		}

		// Check field name 'validatedName' first before field var 'x_validatedName'
		$val = $CurrentForm->hasValue("validatedName") ? $CurrentForm->getValue("validatedName") : $CurrentForm->getValue("x_validatedName");
		if (!$this->validatedName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->validatedName->Visible = FALSE; // Disable update for API request
			else
				$this->validatedName->setFormValue($val);
		}

		// Check field name 'is_station_allowed' first before field var 'x_is_station_allowed'
		$val = $CurrentForm->hasValue("is_station_allowed") ? $CurrentForm->getValue("is_station_allowed") : $CurrentForm->getValue("x_is_station_allowed");
		if (!$this->is_station_allowed->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->is_station_allowed->Visible = FALSE; // Disable update for API request
			else
				$this->is_station_allowed->setFormValue($val);
		}

		// Check field name 'is_subdiv_allowed' first before field var 'x_is_subdiv_allowed'
		$val = $CurrentForm->hasValue("is_subdiv_allowed") ? $CurrentForm->getValue("is_subdiv_allowed") : $CurrentForm->getValue("x_is_subdiv_allowed");
		if (!$this->is_subdiv_allowed->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->is_subdiv_allowed->Visible = FALSE; // Disable update for API request
			else
				$this->is_subdiv_allowed->setFormValue($val);
		}

		// Check field name 'is_circle_allowed' first before field var 'x_is_circle_allowed'
		$val = $CurrentForm->hasValue("is_circle_allowed") ? $CurrentForm->getValue("is_circle_allowed") : $CurrentForm->getValue("x_is_circle_allowed");
		if (!$this->is_circle_allowed->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->is_circle_allowed->Visible = FALSE; // Disable update for API request
			else
				$this->is_circle_allowed->setFormValue($val);
		}

		// Check field name 'is_WRDO_allowed' first before field var 'x_is_WRDO_allowed'
		$val = $CurrentForm->hasValue("is_WRDO_allowed") ? $CurrentForm->getValue("is_WRDO_allowed") : $CurrentForm->getValue("x_is_WRDO_allowed");
		if (!$this->is_WRDO_allowed->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->is_WRDO_allowed->Visible = FALSE; // Disable update for API request
			else
				$this->is_WRDO_allowed->setFormValue($val);
		}

		// Check field name 'record_count' first before field var 'x_record_count'
		$val = $CurrentForm->hasValue("record_count") ? $CurrentForm->getValue("record_count") : $CurrentForm->getValue("x_record_count");
		if (!$this->record_count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->record_count->Visible = FALSE; // Disable update for API request
			else
				$this->record_count->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->validated->CurrentValue = $this->validated->FormValue;
		$this->validatedName->CurrentValue = $this->validatedName->FormValue;
		$this->is_station_allowed->CurrentValue = $this->is_station_allowed->FormValue;
		$this->is_subdiv_allowed->CurrentValue = $this->is_subdiv_allowed->FormValue;
		$this->is_circle_allowed->CurrentValue = $this->is_circle_allowed->FormValue;
		$this->is_WRDO_allowed->CurrentValue = $this->is_WRDO_allowed->FormValue;
		$this->record_count->CurrentValue = $this->record_count->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->validated->setDbValue($row['validated']);
		$this->validatedName->setDbValue($row['validatedName']);
		$this->is_station_allowed->setDbValue($row['is_station_allowed']);
		$this->is_subdiv_allowed->setDbValue($row['is_subdiv_allowed']);
		$this->is_circle_allowed->setDbValue($row['is_circle_allowed']);
		$this->is_WRDO_allowed->setDbValue($row['is_WRDO_allowed']);
		$this->record_count->setDbValue($row['record_count']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['validated'] = $this->validated->CurrentValue;
		$row['validatedName'] = $this->validatedName->CurrentValue;
		$row['is_station_allowed'] = $this->is_station_allowed->CurrentValue;
		$row['is_subdiv_allowed'] = $this->is_subdiv_allowed->CurrentValue;
		$row['is_circle_allowed'] = $this->is_circle_allowed->CurrentValue;
		$row['is_WRDO_allowed'] = $this->is_WRDO_allowed->CurrentValue;
		$row['record_count'] = $this->record_count->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("validated")) != "")
			$this->validated->OldValue = $this->getKey("validated"); // validated
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// validated
		// validatedName
		// is_station_allowed
		// is_subdiv_allowed
		// is_circle_allowed
		// is_WRDO_allowed
		// record_count

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// validated
			$this->validated->ViewValue = $this->validated->CurrentValue;
			$this->validated->ViewValue = FormatNumber($this->validated->ViewValue, 0, -2, -2, -2);
			$this->validated->ViewCustomAttributes = "";

			// validatedName
			$this->validatedName->ViewValue = $this->validatedName->CurrentValue;
			$this->validatedName->ViewCustomAttributes = "";

			// is_station_allowed
			if (strval($this->is_station_allowed->CurrentValue) != "") {
				$this->is_station_allowed->ViewValue = $this->is_station_allowed->optionCaption($this->is_station_allowed->CurrentValue);
			} else {
				$this->is_station_allowed->ViewValue = NULL;
			}
			$this->is_station_allowed->ViewCustomAttributes = "";

			// is_subdiv_allowed
			if (strval($this->is_subdiv_allowed->CurrentValue) != "") {
				$this->is_subdiv_allowed->ViewValue = $this->is_subdiv_allowed->optionCaption($this->is_subdiv_allowed->CurrentValue);
			} else {
				$this->is_subdiv_allowed->ViewValue = NULL;
			}
			$this->is_subdiv_allowed->ViewCustomAttributes = "";

			// is_circle_allowed
			if (strval($this->is_circle_allowed->CurrentValue) != "") {
				$this->is_circle_allowed->ViewValue = $this->is_circle_allowed->optionCaption($this->is_circle_allowed->CurrentValue);
			} else {
				$this->is_circle_allowed->ViewValue = NULL;
			}
			$this->is_circle_allowed->ViewCustomAttributes = "";

			// is_WRDO_allowed
			if (strval($this->is_WRDO_allowed->CurrentValue) != "") {
				$this->is_WRDO_allowed->ViewValue = $this->is_WRDO_allowed->optionCaption($this->is_WRDO_allowed->CurrentValue);
			} else {
				$this->is_WRDO_allowed->ViewValue = NULL;
			}
			$this->is_WRDO_allowed->ViewCustomAttributes = "";

			// record_count
			$this->record_count->ViewValue = $this->record_count->CurrentValue;
			$this->record_count->ViewValue = FormatNumber($this->record_count->ViewValue, 0, -2, -2, -2);
			$this->record_count->ViewCustomAttributes = "";

			// validated
			$this->validated->LinkCustomAttributes = "";
			$this->validated->HrefValue = "";
			$this->validated->TooltipValue = "";

			// validatedName
			$this->validatedName->LinkCustomAttributes = "";
			$this->validatedName->HrefValue = "";
			$this->validatedName->TooltipValue = "";

			// is_station_allowed
			$this->is_station_allowed->LinkCustomAttributes = "";
			$this->is_station_allowed->HrefValue = "";
			$this->is_station_allowed->TooltipValue = "";

			// is_subdiv_allowed
			$this->is_subdiv_allowed->LinkCustomAttributes = "";
			$this->is_subdiv_allowed->HrefValue = "";
			$this->is_subdiv_allowed->TooltipValue = "";

			// is_circle_allowed
			$this->is_circle_allowed->LinkCustomAttributes = "";
			$this->is_circle_allowed->HrefValue = "";
			$this->is_circle_allowed->TooltipValue = "";

			// is_WRDO_allowed
			$this->is_WRDO_allowed->LinkCustomAttributes = "";
			$this->is_WRDO_allowed->HrefValue = "";
			$this->is_WRDO_allowed->TooltipValue = "";

			// record_count
			$this->record_count->LinkCustomAttributes = "";
			$this->record_count->HrefValue = "";
			$this->record_count->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// validated
			$this->validated->EditAttrs["class"] = "form-control";
			$this->validated->EditCustomAttributes = "";
			$this->validated->EditValue = HtmlEncode($this->validated->CurrentValue);

			// validatedName
			$this->validatedName->EditAttrs["class"] = "form-control";
			$this->validatedName->EditCustomAttributes = "";
			if (!$this->validatedName->Raw)
				$this->validatedName->CurrentValue = HtmlDecode($this->validatedName->CurrentValue);
			$this->validatedName->EditValue = HtmlEncode($this->validatedName->CurrentValue);

			// is_station_allowed
			$this->is_station_allowed->EditCustomAttributes = "";
			$this->is_station_allowed->EditValue = $this->is_station_allowed->options(FALSE);

			// is_subdiv_allowed
			$this->is_subdiv_allowed->EditCustomAttributes = "";
			$this->is_subdiv_allowed->EditValue = $this->is_subdiv_allowed->options(FALSE);

			// is_circle_allowed
			$this->is_circle_allowed->EditCustomAttributes = "";
			$this->is_circle_allowed->EditValue = $this->is_circle_allowed->options(FALSE);

			// is_WRDO_allowed
			$this->is_WRDO_allowed->EditCustomAttributes = "";
			$this->is_WRDO_allowed->EditValue = $this->is_WRDO_allowed->options(FALSE);

			// record_count
			$this->record_count->EditAttrs["class"] = "form-control";
			$this->record_count->EditCustomAttributes = "";
			$this->record_count->EditValue = HtmlEncode($this->record_count->CurrentValue);

			// Add refer script
			// validated

			$this->validated->LinkCustomAttributes = "";
			$this->validated->HrefValue = "";

			// validatedName
			$this->validatedName->LinkCustomAttributes = "";
			$this->validatedName->HrefValue = "";

			// is_station_allowed
			$this->is_station_allowed->LinkCustomAttributes = "";
			$this->is_station_allowed->HrefValue = "";

			// is_subdiv_allowed
			$this->is_subdiv_allowed->LinkCustomAttributes = "";
			$this->is_subdiv_allowed->HrefValue = "";

			// is_circle_allowed
			$this->is_circle_allowed->LinkCustomAttributes = "";
			$this->is_circle_allowed->HrefValue = "";

			// is_WRDO_allowed
			$this->is_WRDO_allowed->LinkCustomAttributes = "";
			$this->is_WRDO_allowed->HrefValue = "";

			// record_count
			$this->record_count->LinkCustomAttributes = "";
			$this->record_count->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->validated->Required) {
			if (!$this->validated->IsDetailKey && $this->validated->FormValue != NULL && $this->validated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->validated->caption(), $this->validated->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->validated->FormValue)) {
			AddMessage($FormError, $this->validated->errorMessage());
		}
		if ($this->validatedName->Required) {
			if (!$this->validatedName->IsDetailKey && $this->validatedName->FormValue != NULL && $this->validatedName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->validatedName->caption(), $this->validatedName->RequiredErrorMessage));
			}
		}
		if ($this->is_station_allowed->Required) {
			if ($this->is_station_allowed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->is_station_allowed->caption(), $this->is_station_allowed->RequiredErrorMessage));
			}
		}
		if ($this->is_subdiv_allowed->Required) {
			if ($this->is_subdiv_allowed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->is_subdiv_allowed->caption(), $this->is_subdiv_allowed->RequiredErrorMessage));
			}
		}
		if ($this->is_circle_allowed->Required) {
			if ($this->is_circle_allowed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->is_circle_allowed->caption(), $this->is_circle_allowed->RequiredErrorMessage));
			}
		}
		if ($this->is_WRDO_allowed->Required) {
			if ($this->is_WRDO_allowed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->is_WRDO_allowed->caption(), $this->is_WRDO_allowed->RequiredErrorMessage));
			}
		}
		if ($this->record_count->Required) {
			if (!$this->record_count->IsDetailKey && $this->record_count->FormValue != NULL && $this->record_count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->record_count->caption(), $this->record_count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->record_count->FormValue)) {
			AddMessage($FormError, $this->record_count->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// validated
		$this->validated->setDbValueDef($rsnew, $this->validated->CurrentValue, 0, FALSE);

		// validatedName
		$this->validatedName->setDbValueDef($rsnew, $this->validatedName->CurrentValue, NULL, FALSE);

		// is_station_allowed
		$this->is_station_allowed->setDbValueDef($rsnew, $this->is_station_allowed->CurrentValue, NULL, strval($this->is_station_allowed->CurrentValue) == "");

		// is_subdiv_allowed
		$this->is_subdiv_allowed->setDbValueDef($rsnew, $this->is_subdiv_allowed->CurrentValue, NULL, strval($this->is_subdiv_allowed->CurrentValue) == "");

		// is_circle_allowed
		$this->is_circle_allowed->setDbValueDef($rsnew, $this->is_circle_allowed->CurrentValue, NULL, strval($this->is_circle_allowed->CurrentValue) == "");

		// is_WRDO_allowed
		$this->is_WRDO_allowed->setDbValueDef($rsnew, $this->is_WRDO_allowed->CurrentValue, NULL, strval($this->is_WRDO_allowed->CurrentValue) == "");

		// record_count
		$this->record_count->setDbValueDef($rsnew, $this->record_count->CurrentValue, NULL, strval($this->record_count->CurrentValue) == "");

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['validated']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check for duplicate key
		if ($insertRow && $this->ValidateKey) {
			$filter = $this->getRecordFilter($rsnew);
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
				$this->setFailureMessage($keyErrMsg);
				$rsChk->close();
				$insertRow = FALSE;
			}
		}
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Clean upload path if any
		if ($addRow) {
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lkp_validatedlist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_is_station_allowed":
					break;
				case "x_is_subdiv_allowed":
					break;
				case "x_is_circle_allowed":
					break;
				case "x_is_WRDO_allowed":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>