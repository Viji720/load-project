<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_smsdata_archive_add extends tbl_smsdata_archive
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_smsdata_archive';

	// Page object name
	public $PageObjName = "tbl_smsdata_archive_add";

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

		// Table object (tbl_smsdata_archive)
		if (!isset($GLOBALS["tbl_smsdata_archive"]) || get_class($GLOBALS["tbl_smsdata_archive"]) == PROJECT_NAMESPACE . "tbl_smsdata_archive") {
			$GLOBALS["tbl_smsdata_archive"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tbl_smsdata_archive"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tbl_smsdata_archive');

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
		global $tbl_smsdata_archive;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($tbl_smsdata_archive);
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
					if ($pageName == "tbl_smsdata_archiveview.php")
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
			$key .= @$ar['Slno'];
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
					$this->terminate(GetUrl("tbl_smsdata_archivelist.php"));
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
		$this->Slno->setVisibility();
		$this->SMSDateTime->setVisibility();
		$this->SystemDateTime->setVisibility();
		$this->ConfirmQueryDateTime->setVisibility();
		$this->ConfirmedDateTime->setVisibility();
		$this->SendDateTime->setVisibility();
		$this->SMSText->setVisibility();
		$this->Status->setVisibility();
		$this->obsremarks->setVisibility();
		$this->SenderMobileNumber->setVisibility();
		$this->SubDivId->setVisibility();
		$this->StationId->setVisibility();
		$this->IsFirstMsg->setVisibility();
		$this->Validated->setVisibility();
		$this->isFreeze->setVisibility();
		$this->rainfall->setVisibility();
		$this->min_air_temp->setVisibility();
		$this->max_air_temp->setVisibility();
		$this->atmospheric_pressure->setVisibility();
		$this->wind_speed->setVisibility();
		$this->precipitation->setVisibility();
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
			$this->terminate("tbl_smsdata_archivelist.php");
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
			if (Get("Slno") !== NULL) {
				$this->Slno->setQueryStringValue(Get("Slno"));
				$this->setKey("Slno", $this->Slno->CurrentValue); // Set up key
			} else {
				$this->setKey("Slno", ""); // Clear key
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
					$this->terminate("tbl_smsdata_archivelist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "tbl_smsdata_archivelist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "tbl_smsdata_archiveview.php")
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
		$this->Slno->CurrentValue = NULL;
		$this->Slno->OldValue = $this->Slno->CurrentValue;
		$this->SMSDateTime->CurrentValue = NULL;
		$this->SMSDateTime->OldValue = $this->SMSDateTime->CurrentValue;
		$this->SystemDateTime->CurrentValue = NULL;
		$this->SystemDateTime->OldValue = $this->SystemDateTime->CurrentValue;
		$this->ConfirmQueryDateTime->CurrentValue = NULL;
		$this->ConfirmQueryDateTime->OldValue = $this->ConfirmQueryDateTime->CurrentValue;
		$this->ConfirmedDateTime->CurrentValue = NULL;
		$this->ConfirmedDateTime->OldValue = $this->ConfirmedDateTime->CurrentValue;
		$this->SendDateTime->CurrentValue = NULL;
		$this->SendDateTime->OldValue = $this->SendDateTime->CurrentValue;
		$this->SMSText->CurrentValue = NULL;
		$this->SMSText->OldValue = $this->SMSText->CurrentValue;
		$this->Status->CurrentValue = NULL;
		$this->Status->OldValue = $this->Status->CurrentValue;
		$this->obsremarks->CurrentValue = NULL;
		$this->obsremarks->OldValue = $this->obsremarks->CurrentValue;
		$this->SenderMobileNumber->CurrentValue = NULL;
		$this->SenderMobileNumber->OldValue = $this->SenderMobileNumber->CurrentValue;
		$this->SubDivId->CurrentValue = NULL;
		$this->SubDivId->OldValue = $this->SubDivId->CurrentValue;
		$this->StationId->CurrentValue = NULL;
		$this->StationId->OldValue = $this->StationId->CurrentValue;
		$this->IsFirstMsg->CurrentValue = NULL;
		$this->IsFirstMsg->OldValue = $this->IsFirstMsg->CurrentValue;
		$this->Validated->CurrentValue = NULL;
		$this->Validated->OldValue = $this->Validated->CurrentValue;
		$this->isFreeze->CurrentValue = 0;
		$this->rainfall->CurrentValue = NULL;
		$this->rainfall->OldValue = $this->rainfall->CurrentValue;
		$this->min_air_temp->CurrentValue = NULL;
		$this->min_air_temp->OldValue = $this->min_air_temp->CurrentValue;
		$this->max_air_temp->CurrentValue = NULL;
		$this->max_air_temp->OldValue = $this->max_air_temp->CurrentValue;
		$this->atmospheric_pressure->CurrentValue = NULL;
		$this->atmospheric_pressure->OldValue = $this->atmospheric_pressure->CurrentValue;
		$this->wind_speed->CurrentValue = NULL;
		$this->wind_speed->OldValue = $this->wind_speed->CurrentValue;
		$this->precipitation->CurrentValue = NULL;
		$this->precipitation->OldValue = $this->precipitation->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Slno' first before field var 'x_Slno'
		$val = $CurrentForm->hasValue("Slno") ? $CurrentForm->getValue("Slno") : $CurrentForm->getValue("x_Slno");
		if (!$this->Slno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Slno->Visible = FALSE; // Disable update for API request
			else
				$this->Slno->setFormValue($val);
		}

		// Check field name 'SMSDateTime' first before field var 'x_SMSDateTime'
		$val = $CurrentForm->hasValue("SMSDateTime") ? $CurrentForm->getValue("SMSDateTime") : $CurrentForm->getValue("x_SMSDateTime");
		if (!$this->SMSDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SMSDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->SMSDateTime->setFormValue($val);
			$this->SMSDateTime->CurrentValue = UnFormatDateTime($this->SMSDateTime->CurrentValue, 0);
		}

		// Check field name 'SystemDateTime' first before field var 'x_SystemDateTime'
		$val = $CurrentForm->hasValue("SystemDateTime") ? $CurrentForm->getValue("SystemDateTime") : $CurrentForm->getValue("x_SystemDateTime");
		if (!$this->SystemDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SystemDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->SystemDateTime->setFormValue($val);
			$this->SystemDateTime->CurrentValue = UnFormatDateTime($this->SystemDateTime->CurrentValue, 0);
		}

		// Check field name 'ConfirmQueryDateTime' first before field var 'x_ConfirmQueryDateTime'
		$val = $CurrentForm->hasValue("ConfirmQueryDateTime") ? $CurrentForm->getValue("ConfirmQueryDateTime") : $CurrentForm->getValue("x_ConfirmQueryDateTime");
		if (!$this->ConfirmQueryDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ConfirmQueryDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ConfirmQueryDateTime->setFormValue($val);
			$this->ConfirmQueryDateTime->CurrentValue = UnFormatDateTime($this->ConfirmQueryDateTime->CurrentValue, 0);
		}

		// Check field name 'ConfirmedDateTime' first before field var 'x_ConfirmedDateTime'
		$val = $CurrentForm->hasValue("ConfirmedDateTime") ? $CurrentForm->getValue("ConfirmedDateTime") : $CurrentForm->getValue("x_ConfirmedDateTime");
		if (!$this->ConfirmedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ConfirmedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ConfirmedDateTime->setFormValue($val);
			$this->ConfirmedDateTime->CurrentValue = UnFormatDateTime($this->ConfirmedDateTime->CurrentValue, 0);
		}

		// Check field name 'SendDateTime' first before field var 'x_SendDateTime'
		$val = $CurrentForm->hasValue("SendDateTime") ? $CurrentForm->getValue("SendDateTime") : $CurrentForm->getValue("x_SendDateTime");
		if (!$this->SendDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SendDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->SendDateTime->setFormValue($val);
			$this->SendDateTime->CurrentValue = UnFormatDateTime($this->SendDateTime->CurrentValue, 0);
		}

		// Check field name 'SMSText' first before field var 'x_SMSText'
		$val = $CurrentForm->hasValue("SMSText") ? $CurrentForm->getValue("SMSText") : $CurrentForm->getValue("x_SMSText");
		if (!$this->SMSText->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SMSText->Visible = FALSE; // Disable update for API request
			else
				$this->SMSText->setFormValue($val);
		}

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}

		// Check field name 'obsremarks' first before field var 'x_obsremarks'
		$val = $CurrentForm->hasValue("obsremarks") ? $CurrentForm->getValue("obsremarks") : $CurrentForm->getValue("x_obsremarks");
		if (!$this->obsremarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->obsremarks->Visible = FALSE; // Disable update for API request
			else
				$this->obsremarks->setFormValue($val);
		}

		// Check field name 'SenderMobileNumber' first before field var 'x_SenderMobileNumber'
		$val = $CurrentForm->hasValue("SenderMobileNumber") ? $CurrentForm->getValue("SenderMobileNumber") : $CurrentForm->getValue("x_SenderMobileNumber");
		if (!$this->SenderMobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SenderMobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->SenderMobileNumber->setFormValue($val);
		}

		// Check field name 'SubDivId' first before field var 'x_SubDivId'
		$val = $CurrentForm->hasValue("SubDivId") ? $CurrentForm->getValue("SubDivId") : $CurrentForm->getValue("x_SubDivId");
		if (!$this->SubDivId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SubDivId->Visible = FALSE; // Disable update for API request
			else
				$this->SubDivId->setFormValue($val);
		}

		// Check field name 'StationId' first before field var 'x_StationId'
		$val = $CurrentForm->hasValue("StationId") ? $CurrentForm->getValue("StationId") : $CurrentForm->getValue("x_StationId");
		if (!$this->StationId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StationId->Visible = FALSE; // Disable update for API request
			else
				$this->StationId->setFormValue($val);
		}

		// Check field name 'IsFirstMsg' first before field var 'x_IsFirstMsg'
		$val = $CurrentForm->hasValue("IsFirstMsg") ? $CurrentForm->getValue("IsFirstMsg") : $CurrentForm->getValue("x_IsFirstMsg");
		if (!$this->IsFirstMsg->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IsFirstMsg->Visible = FALSE; // Disable update for API request
			else
				$this->IsFirstMsg->setFormValue($val);
		}

		// Check field name 'Validated' first before field var 'x_Validated'
		$val = $CurrentForm->hasValue("Validated") ? $CurrentForm->getValue("Validated") : $CurrentForm->getValue("x_Validated");
		if (!$this->Validated->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Validated->Visible = FALSE; // Disable update for API request
			else
				$this->Validated->setFormValue($val);
		}

		// Check field name 'isFreeze' first before field var 'x_isFreeze'
		$val = $CurrentForm->hasValue("isFreeze") ? $CurrentForm->getValue("isFreeze") : $CurrentForm->getValue("x_isFreeze");
		if (!$this->isFreeze->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->isFreeze->Visible = FALSE; // Disable update for API request
			else
				$this->isFreeze->setFormValue($val);
		}

		// Check field name 'rainfall' first before field var 'x_rainfall'
		$val = $CurrentForm->hasValue("rainfall") ? $CurrentForm->getValue("rainfall") : $CurrentForm->getValue("x_rainfall");
		if (!$this->rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->rainfall->setFormValue($val);
		}

		// Check field name 'min_air_temp' first before field var 'x_min_air_temp'
		$val = $CurrentForm->hasValue("min_air_temp") ? $CurrentForm->getValue("min_air_temp") : $CurrentForm->getValue("x_min_air_temp");
		if (!$this->min_air_temp->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->min_air_temp->Visible = FALSE; // Disable update for API request
			else
				$this->min_air_temp->setFormValue($val);
		}

		// Check field name 'max_air_temp' first before field var 'x_max_air_temp'
		$val = $CurrentForm->hasValue("max_air_temp") ? $CurrentForm->getValue("max_air_temp") : $CurrentForm->getValue("x_max_air_temp");
		if (!$this->max_air_temp->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->max_air_temp->Visible = FALSE; // Disable update for API request
			else
				$this->max_air_temp->setFormValue($val);
		}

		// Check field name 'atmospheric_pressure' first before field var 'x_atmospheric_pressure'
		$val = $CurrentForm->hasValue("atmospheric_pressure") ? $CurrentForm->getValue("atmospheric_pressure") : $CurrentForm->getValue("x_atmospheric_pressure");
		if (!$this->atmospheric_pressure->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->atmospheric_pressure->Visible = FALSE; // Disable update for API request
			else
				$this->atmospheric_pressure->setFormValue($val);
		}

		// Check field name 'wind_speed' first before field var 'x_wind_speed'
		$val = $CurrentForm->hasValue("wind_speed") ? $CurrentForm->getValue("wind_speed") : $CurrentForm->getValue("x_wind_speed");
		if (!$this->wind_speed->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->wind_speed->Visible = FALSE; // Disable update for API request
			else
				$this->wind_speed->setFormValue($val);
		}

		// Check field name 'precipitation' first before field var 'x_precipitation'
		$val = $CurrentForm->hasValue("precipitation") ? $CurrentForm->getValue("precipitation") : $CurrentForm->getValue("x_precipitation");
		if (!$this->precipitation->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->precipitation->Visible = FALSE; // Disable update for API request
			else
				$this->precipitation->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Slno->CurrentValue = $this->Slno->FormValue;
		$this->SMSDateTime->CurrentValue = $this->SMSDateTime->FormValue;
		$this->SMSDateTime->CurrentValue = UnFormatDateTime($this->SMSDateTime->CurrentValue, 0);
		$this->SystemDateTime->CurrentValue = $this->SystemDateTime->FormValue;
		$this->SystemDateTime->CurrentValue = UnFormatDateTime($this->SystemDateTime->CurrentValue, 0);
		$this->ConfirmQueryDateTime->CurrentValue = $this->ConfirmQueryDateTime->FormValue;
		$this->ConfirmQueryDateTime->CurrentValue = UnFormatDateTime($this->ConfirmQueryDateTime->CurrentValue, 0);
		$this->ConfirmedDateTime->CurrentValue = $this->ConfirmedDateTime->FormValue;
		$this->ConfirmedDateTime->CurrentValue = UnFormatDateTime($this->ConfirmedDateTime->CurrentValue, 0);
		$this->SendDateTime->CurrentValue = $this->SendDateTime->FormValue;
		$this->SendDateTime->CurrentValue = UnFormatDateTime($this->SendDateTime->CurrentValue, 0);
		$this->SMSText->CurrentValue = $this->SMSText->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->obsremarks->CurrentValue = $this->obsremarks->FormValue;
		$this->SenderMobileNumber->CurrentValue = $this->SenderMobileNumber->FormValue;
		$this->SubDivId->CurrentValue = $this->SubDivId->FormValue;
		$this->StationId->CurrentValue = $this->StationId->FormValue;
		$this->IsFirstMsg->CurrentValue = $this->IsFirstMsg->FormValue;
		$this->Validated->CurrentValue = $this->Validated->FormValue;
		$this->isFreeze->CurrentValue = $this->isFreeze->FormValue;
		$this->rainfall->CurrentValue = $this->rainfall->FormValue;
		$this->min_air_temp->CurrentValue = $this->min_air_temp->FormValue;
		$this->max_air_temp->CurrentValue = $this->max_air_temp->FormValue;
		$this->atmospheric_pressure->CurrentValue = $this->atmospheric_pressure->FormValue;
		$this->wind_speed->CurrentValue = $this->wind_speed->FormValue;
		$this->precipitation->CurrentValue = $this->precipitation->FormValue;
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
		$this->Slno->setDbValue($row['Slno']);
		$this->SMSDateTime->setDbValue($row['SMSDateTime']);
		$this->SystemDateTime->setDbValue($row['SystemDateTime']);
		$this->ConfirmQueryDateTime->setDbValue($row['ConfirmQueryDateTime']);
		$this->ConfirmedDateTime->setDbValue($row['ConfirmedDateTime']);
		$this->SendDateTime->setDbValue($row['SendDateTime']);
		$this->SMSText->setDbValue($row['SMSText']);
		$this->Status->setDbValue($row['Status']);
		$this->obsremarks->setDbValue($row['obsremarks']);
		$this->SenderMobileNumber->setDbValue($row['SenderMobileNumber']);
		$this->SubDivId->setDbValue($row['SubDivId']);
		$this->StationId->setDbValue($row['StationId']);
		$this->IsFirstMsg->setDbValue($row['IsFirstMsg']);
		$this->Validated->setDbValue($row['Validated']);
		$this->isFreeze->setDbValue($row['isFreeze']);
		$this->rainfall->setDbValue($row['rainfall']);
		$this->min_air_temp->setDbValue($row['min_air_temp']);
		$this->max_air_temp->setDbValue($row['max_air_temp']);
		$this->atmospheric_pressure->setDbValue($row['atmospheric_pressure']);
		$this->wind_speed->setDbValue($row['wind_speed']);
		$this->precipitation->setDbValue($row['precipitation']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['Slno'] = $this->Slno->CurrentValue;
		$row['SMSDateTime'] = $this->SMSDateTime->CurrentValue;
		$row['SystemDateTime'] = $this->SystemDateTime->CurrentValue;
		$row['ConfirmQueryDateTime'] = $this->ConfirmQueryDateTime->CurrentValue;
		$row['ConfirmedDateTime'] = $this->ConfirmedDateTime->CurrentValue;
		$row['SendDateTime'] = $this->SendDateTime->CurrentValue;
		$row['SMSText'] = $this->SMSText->CurrentValue;
		$row['Status'] = $this->Status->CurrentValue;
		$row['obsremarks'] = $this->obsremarks->CurrentValue;
		$row['SenderMobileNumber'] = $this->SenderMobileNumber->CurrentValue;
		$row['SubDivId'] = $this->SubDivId->CurrentValue;
		$row['StationId'] = $this->StationId->CurrentValue;
		$row['IsFirstMsg'] = $this->IsFirstMsg->CurrentValue;
		$row['Validated'] = $this->Validated->CurrentValue;
		$row['isFreeze'] = $this->isFreeze->CurrentValue;
		$row['rainfall'] = $this->rainfall->CurrentValue;
		$row['min_air_temp'] = $this->min_air_temp->CurrentValue;
		$row['max_air_temp'] = $this->max_air_temp->CurrentValue;
		$row['atmospheric_pressure'] = $this->atmospheric_pressure->CurrentValue;
		$row['wind_speed'] = $this->wind_speed->CurrentValue;
		$row['precipitation'] = $this->precipitation->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("Slno")) != "")
			$this->Slno->OldValue = $this->getKey("Slno"); // Slno
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
		// Convert decimal values if posted back

		if ($this->rainfall->FormValue == $this->rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->rainfall->CurrentValue)))
			$this->rainfall->CurrentValue = ConvertToFloatString($this->rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->min_air_temp->FormValue == $this->min_air_temp->CurrentValue && is_numeric(ConvertToFloatString($this->min_air_temp->CurrentValue)))
			$this->min_air_temp->CurrentValue = ConvertToFloatString($this->min_air_temp->CurrentValue);

		// Convert decimal values if posted back
		if ($this->max_air_temp->FormValue == $this->max_air_temp->CurrentValue && is_numeric(ConvertToFloatString($this->max_air_temp->CurrentValue)))
			$this->max_air_temp->CurrentValue = ConvertToFloatString($this->max_air_temp->CurrentValue);

		// Convert decimal values if posted back
		if ($this->atmospheric_pressure->FormValue == $this->atmospheric_pressure->CurrentValue && is_numeric(ConvertToFloatString($this->atmospheric_pressure->CurrentValue)))
			$this->atmospheric_pressure->CurrentValue = ConvertToFloatString($this->atmospheric_pressure->CurrentValue);

		// Convert decimal values if posted back
		if ($this->wind_speed->FormValue == $this->wind_speed->CurrentValue && is_numeric(ConvertToFloatString($this->wind_speed->CurrentValue)))
			$this->wind_speed->CurrentValue = ConvertToFloatString($this->wind_speed->CurrentValue);

		// Convert decimal values if posted back
		if ($this->precipitation->FormValue == $this->precipitation->CurrentValue && is_numeric(ConvertToFloatString($this->precipitation->CurrentValue)))
			$this->precipitation->CurrentValue = ConvertToFloatString($this->precipitation->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Slno
		// SMSDateTime
		// SystemDateTime
		// ConfirmQueryDateTime
		// ConfirmedDateTime
		// SendDateTime
		// SMSText
		// Status
		// obsremarks
		// SenderMobileNumber
		// SubDivId
		// StationId
		// IsFirstMsg
		// Validated
		// isFreeze
		// rainfall
		// min_air_temp
		// max_air_temp
		// atmospheric_pressure
		// wind_speed
		// precipitation

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Slno
			$this->Slno->ViewValue = $this->Slno->CurrentValue;
			$this->Slno->ViewValue = FormatNumber($this->Slno->ViewValue, 0, -2, -2, -2);
			$this->Slno->ViewCustomAttributes = "";

			// SMSDateTime
			$this->SMSDateTime->ViewValue = $this->SMSDateTime->CurrentValue;
			$this->SMSDateTime->ViewValue = FormatDateTime($this->SMSDateTime->ViewValue, 0);
			$this->SMSDateTime->ViewCustomAttributes = "";

			// SystemDateTime
			$this->SystemDateTime->ViewValue = $this->SystemDateTime->CurrentValue;
			$this->SystemDateTime->ViewValue = FormatDateTime($this->SystemDateTime->ViewValue, 0);
			$this->SystemDateTime->ViewCustomAttributes = "";

			// ConfirmQueryDateTime
			$this->ConfirmQueryDateTime->ViewValue = $this->ConfirmQueryDateTime->CurrentValue;
			$this->ConfirmQueryDateTime->ViewValue = FormatDateTime($this->ConfirmQueryDateTime->ViewValue, 0);
			$this->ConfirmQueryDateTime->ViewCustomAttributes = "";

			// ConfirmedDateTime
			$this->ConfirmedDateTime->ViewValue = $this->ConfirmedDateTime->CurrentValue;
			$this->ConfirmedDateTime->ViewValue = FormatDateTime($this->ConfirmedDateTime->ViewValue, 0);
			$this->ConfirmedDateTime->ViewCustomAttributes = "";

			// SendDateTime
			$this->SendDateTime->ViewValue = $this->SendDateTime->CurrentValue;
			$this->SendDateTime->ViewValue = FormatDateTime($this->SendDateTime->ViewValue, 0);
			$this->SendDateTime->ViewCustomAttributes = "";

			// SMSText
			$this->SMSText->ViewValue = $this->SMSText->CurrentValue;
			$this->SMSText->ViewCustomAttributes = "";

			// Status
			$this->Status->ViewValue = $this->Status->CurrentValue;
			$this->Status->ViewValue = FormatNumber($this->Status->ViewValue, 0, -2, -2, -2);
			$this->Status->ViewCustomAttributes = "";

			// obsremarks
			$this->obsremarks->ViewValue = $this->obsremarks->CurrentValue;
			$this->obsremarks->ViewCustomAttributes = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
			$this->SenderMobileNumber->ViewCustomAttributes = "";

			// SubDivId
			$this->SubDivId->ViewValue = $this->SubDivId->CurrentValue;
			$this->SubDivId->ViewValue = FormatNumber($this->SubDivId->ViewValue, 0, -2, -2, -2);
			$this->SubDivId->ViewCustomAttributes = "";

			// StationId
			$this->StationId->ViewValue = $this->StationId->CurrentValue;
			$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
			$this->StationId->ViewCustomAttributes = "";

			// IsFirstMsg
			$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->CurrentValue;
			$this->IsFirstMsg->ViewValue = FormatNumber($this->IsFirstMsg->ViewValue, 0, -2, -2, -2);
			$this->IsFirstMsg->ViewCustomAttributes = "";

			// Validated
			$this->Validated->ViewValue = $this->Validated->CurrentValue;
			$this->Validated->ViewValue = FormatNumber($this->Validated->ViewValue, 0, -2, -2, -2);
			$this->Validated->ViewCustomAttributes = "";

			// isFreeze
			if (ConvertToBool($this->isFreeze->CurrentValue)) {
				$this->isFreeze->ViewValue = $this->isFreeze->tagCaption(1) != "" ? $this->isFreeze->tagCaption(1) : "Yes";
			} else {
				$this->isFreeze->ViewValue = $this->isFreeze->tagCaption(2) != "" ? $this->isFreeze->tagCaption(2) : "No";
			}
			$this->isFreeze->ViewCustomAttributes = "";

			// rainfall
			$this->rainfall->ViewValue = $this->rainfall->CurrentValue;
			$this->rainfall->ViewValue = FormatNumber($this->rainfall->ViewValue, 2, -2, -2, -2);
			$this->rainfall->ViewCustomAttributes = "";

			// min_air_temp
			$this->min_air_temp->ViewValue = $this->min_air_temp->CurrentValue;
			$this->min_air_temp->ViewValue = FormatNumber($this->min_air_temp->ViewValue, 2, -2, -2, -2);
			$this->min_air_temp->ViewCustomAttributes = "";

			// max_air_temp
			$this->max_air_temp->ViewValue = $this->max_air_temp->CurrentValue;
			$this->max_air_temp->ViewValue = FormatNumber($this->max_air_temp->ViewValue, 2, -2, -2, -2);
			$this->max_air_temp->ViewCustomAttributes = "";

			// atmospheric_pressure
			$this->atmospheric_pressure->ViewValue = $this->atmospheric_pressure->CurrentValue;
			$this->atmospheric_pressure->ViewValue = FormatNumber($this->atmospheric_pressure->ViewValue, 2, -2, -2, -2);
			$this->atmospheric_pressure->ViewCustomAttributes = "";

			// wind_speed
			$this->wind_speed->ViewValue = $this->wind_speed->CurrentValue;
			$this->wind_speed->ViewValue = FormatNumber($this->wind_speed->ViewValue, 2, -2, -2, -2);
			$this->wind_speed->ViewCustomAttributes = "";

			// precipitation
			$this->precipitation->ViewValue = $this->precipitation->CurrentValue;
			$this->precipitation->ViewValue = FormatNumber($this->precipitation->ViewValue, 2, -2, -2, -2);
			$this->precipitation->ViewCustomAttributes = "";

			// Slno
			$this->Slno->LinkCustomAttributes = "";
			$this->Slno->HrefValue = "";
			$this->Slno->TooltipValue = "";

			// SMSDateTime
			$this->SMSDateTime->LinkCustomAttributes = "";
			$this->SMSDateTime->HrefValue = "";
			$this->SMSDateTime->TooltipValue = "";

			// SystemDateTime
			$this->SystemDateTime->LinkCustomAttributes = "";
			$this->SystemDateTime->HrefValue = "";
			$this->SystemDateTime->TooltipValue = "";

			// ConfirmQueryDateTime
			$this->ConfirmQueryDateTime->LinkCustomAttributes = "";
			$this->ConfirmQueryDateTime->HrefValue = "";
			$this->ConfirmQueryDateTime->TooltipValue = "";

			// ConfirmedDateTime
			$this->ConfirmedDateTime->LinkCustomAttributes = "";
			$this->ConfirmedDateTime->HrefValue = "";
			$this->ConfirmedDateTime->TooltipValue = "";

			// SendDateTime
			$this->SendDateTime->LinkCustomAttributes = "";
			$this->SendDateTime->HrefValue = "";
			$this->SendDateTime->TooltipValue = "";

			// SMSText
			$this->SMSText->LinkCustomAttributes = "";
			$this->SMSText->HrefValue = "";
			$this->SMSText->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// obsremarks
			$this->obsremarks->LinkCustomAttributes = "";
			$this->obsremarks->HrefValue = "";
			$this->obsremarks->TooltipValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";
			$this->SenderMobileNumber->TooltipValue = "";

			// SubDivId
			$this->SubDivId->LinkCustomAttributes = "";
			$this->SubDivId->HrefValue = "";
			$this->SubDivId->TooltipValue = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// IsFirstMsg
			$this->IsFirstMsg->LinkCustomAttributes = "";
			$this->IsFirstMsg->HrefValue = "";
			$this->IsFirstMsg->TooltipValue = "";

			// Validated
			$this->Validated->LinkCustomAttributes = "";
			$this->Validated->HrefValue = "";
			$this->Validated->TooltipValue = "";

			// isFreeze
			$this->isFreeze->LinkCustomAttributes = "";
			$this->isFreeze->HrefValue = "";
			$this->isFreeze->TooltipValue = "";

			// rainfall
			$this->rainfall->LinkCustomAttributes = "";
			$this->rainfall->HrefValue = "";
			$this->rainfall->TooltipValue = "";

			// min_air_temp
			$this->min_air_temp->LinkCustomAttributes = "";
			$this->min_air_temp->HrefValue = "";
			$this->min_air_temp->TooltipValue = "";

			// max_air_temp
			$this->max_air_temp->LinkCustomAttributes = "";
			$this->max_air_temp->HrefValue = "";
			$this->max_air_temp->TooltipValue = "";

			// atmospheric_pressure
			$this->atmospheric_pressure->LinkCustomAttributes = "";
			$this->atmospheric_pressure->HrefValue = "";
			$this->atmospheric_pressure->TooltipValue = "";

			// wind_speed
			$this->wind_speed->LinkCustomAttributes = "";
			$this->wind_speed->HrefValue = "";
			$this->wind_speed->TooltipValue = "";

			// precipitation
			$this->precipitation->LinkCustomAttributes = "";
			$this->precipitation->HrefValue = "";
			$this->precipitation->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Slno
			$this->Slno->EditAttrs["class"] = "form-control";
			$this->Slno->EditCustomAttributes = "";
			$this->Slno->EditValue = HtmlEncode($this->Slno->CurrentValue);

			// SMSDateTime
			$this->SMSDateTime->EditAttrs["class"] = "form-control";
			$this->SMSDateTime->EditCustomAttributes = "";
			$this->SMSDateTime->EditValue = HtmlEncode(FormatDateTime($this->SMSDateTime->CurrentValue, 8));

			// SystemDateTime
			$this->SystemDateTime->EditAttrs["class"] = "form-control";
			$this->SystemDateTime->EditCustomAttributes = "";
			$this->SystemDateTime->EditValue = HtmlEncode(FormatDateTime($this->SystemDateTime->CurrentValue, 8));

			// ConfirmQueryDateTime
			$this->ConfirmQueryDateTime->EditAttrs["class"] = "form-control";
			$this->ConfirmQueryDateTime->EditCustomAttributes = "";
			$this->ConfirmQueryDateTime->EditValue = HtmlEncode(FormatDateTime($this->ConfirmQueryDateTime->CurrentValue, 8));

			// ConfirmedDateTime
			$this->ConfirmedDateTime->EditAttrs["class"] = "form-control";
			$this->ConfirmedDateTime->EditCustomAttributes = "";
			$this->ConfirmedDateTime->EditValue = HtmlEncode(FormatDateTime($this->ConfirmedDateTime->CurrentValue, 8));

			// SendDateTime
			$this->SendDateTime->EditAttrs["class"] = "form-control";
			$this->SendDateTime->EditCustomAttributes = "";
			$this->SendDateTime->EditValue = HtmlEncode(FormatDateTime($this->SendDateTime->CurrentValue, 8));

			// SMSText
			$this->SMSText->EditAttrs["class"] = "form-control";
			$this->SMSText->EditCustomAttributes = "";
			if (!$this->SMSText->Raw)
				$this->SMSText->CurrentValue = HtmlDecode($this->SMSText->CurrentValue);
			$this->SMSText->EditValue = HtmlEncode($this->SMSText->CurrentValue);

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);

			// obsremarks
			$this->obsremarks->EditAttrs["class"] = "form-control";
			$this->obsremarks->EditCustomAttributes = "";
			if (!$this->obsremarks->Raw)
				$this->obsremarks->CurrentValue = HtmlDecode($this->obsremarks->CurrentValue);
			$this->obsremarks->EditValue = HtmlEncode($this->obsremarks->CurrentValue);

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			if (!$this->SenderMobileNumber->Raw)
				$this->SenderMobileNumber->CurrentValue = HtmlDecode($this->SenderMobileNumber->CurrentValue);
			$this->SenderMobileNumber->EditValue = HtmlEncode($this->SenderMobileNumber->CurrentValue);

			// SubDivId
			$this->SubDivId->EditAttrs["class"] = "form-control";
			$this->SubDivId->EditCustomAttributes = "";
			$this->SubDivId->EditValue = HtmlEncode($this->SubDivId->CurrentValue);

			// StationId
			$this->StationId->EditAttrs["class"] = "form-control";
			$this->StationId->EditCustomAttributes = "";
			$this->StationId->EditValue = HtmlEncode($this->StationId->CurrentValue);

			// IsFirstMsg
			$this->IsFirstMsg->EditAttrs["class"] = "form-control";
			$this->IsFirstMsg->EditCustomAttributes = "";
			$this->IsFirstMsg->EditValue = HtmlEncode($this->IsFirstMsg->CurrentValue);

			// Validated
			$this->Validated->EditAttrs["class"] = "form-control";
			$this->Validated->EditCustomAttributes = "";
			$this->Validated->EditValue = HtmlEncode($this->Validated->CurrentValue);

			// isFreeze
			$this->isFreeze->EditCustomAttributes = "";
			$this->isFreeze->EditValue = $this->isFreeze->options(FALSE);

			// rainfall
			$this->rainfall->EditAttrs["class"] = "form-control";
			$this->rainfall->EditCustomAttributes = "";
			$this->rainfall->EditValue = HtmlEncode($this->rainfall->CurrentValue);
			if (strval($this->rainfall->EditValue) != "" && is_numeric($this->rainfall->EditValue))
				$this->rainfall->EditValue = FormatNumber($this->rainfall->EditValue, -2, -2, -2, -2);
			

			// min_air_temp
			$this->min_air_temp->EditAttrs["class"] = "form-control";
			$this->min_air_temp->EditCustomAttributes = "";
			$this->min_air_temp->EditValue = HtmlEncode($this->min_air_temp->CurrentValue);
			if (strval($this->min_air_temp->EditValue) != "" && is_numeric($this->min_air_temp->EditValue))
				$this->min_air_temp->EditValue = FormatNumber($this->min_air_temp->EditValue, -2, -2, -2, -2);
			

			// max_air_temp
			$this->max_air_temp->EditAttrs["class"] = "form-control";
			$this->max_air_temp->EditCustomAttributes = "";
			$this->max_air_temp->EditValue = HtmlEncode($this->max_air_temp->CurrentValue);
			if (strval($this->max_air_temp->EditValue) != "" && is_numeric($this->max_air_temp->EditValue))
				$this->max_air_temp->EditValue = FormatNumber($this->max_air_temp->EditValue, -2, -2, -2, -2);
			

			// atmospheric_pressure
			$this->atmospheric_pressure->EditAttrs["class"] = "form-control";
			$this->atmospheric_pressure->EditCustomAttributes = "";
			$this->atmospheric_pressure->EditValue = HtmlEncode($this->atmospheric_pressure->CurrentValue);
			if (strval($this->atmospheric_pressure->EditValue) != "" && is_numeric($this->atmospheric_pressure->EditValue))
				$this->atmospheric_pressure->EditValue = FormatNumber($this->atmospheric_pressure->EditValue, -2, -2, -2, -2);
			

			// wind_speed
			$this->wind_speed->EditAttrs["class"] = "form-control";
			$this->wind_speed->EditCustomAttributes = "";
			$this->wind_speed->EditValue = HtmlEncode($this->wind_speed->CurrentValue);
			if (strval($this->wind_speed->EditValue) != "" && is_numeric($this->wind_speed->EditValue))
				$this->wind_speed->EditValue = FormatNumber($this->wind_speed->EditValue, -2, -2, -2, -2);
			

			// precipitation
			$this->precipitation->EditAttrs["class"] = "form-control";
			$this->precipitation->EditCustomAttributes = "";
			$this->precipitation->EditValue = HtmlEncode($this->precipitation->CurrentValue);
			if (strval($this->precipitation->EditValue) != "" && is_numeric($this->precipitation->EditValue))
				$this->precipitation->EditValue = FormatNumber($this->precipitation->EditValue, -2, -2, -2, -2);
			

			// Add refer script
			// Slno

			$this->Slno->LinkCustomAttributes = "";
			$this->Slno->HrefValue = "";

			// SMSDateTime
			$this->SMSDateTime->LinkCustomAttributes = "";
			$this->SMSDateTime->HrefValue = "";

			// SystemDateTime
			$this->SystemDateTime->LinkCustomAttributes = "";
			$this->SystemDateTime->HrefValue = "";

			// ConfirmQueryDateTime
			$this->ConfirmQueryDateTime->LinkCustomAttributes = "";
			$this->ConfirmQueryDateTime->HrefValue = "";

			// ConfirmedDateTime
			$this->ConfirmedDateTime->LinkCustomAttributes = "";
			$this->ConfirmedDateTime->HrefValue = "";

			// SendDateTime
			$this->SendDateTime->LinkCustomAttributes = "";
			$this->SendDateTime->HrefValue = "";

			// SMSText
			$this->SMSText->LinkCustomAttributes = "";
			$this->SMSText->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// obsremarks
			$this->obsremarks->LinkCustomAttributes = "";
			$this->obsremarks->HrefValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";

			// SubDivId
			$this->SubDivId->LinkCustomAttributes = "";
			$this->SubDivId->HrefValue = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";

			// IsFirstMsg
			$this->IsFirstMsg->LinkCustomAttributes = "";
			$this->IsFirstMsg->HrefValue = "";

			// Validated
			$this->Validated->LinkCustomAttributes = "";
			$this->Validated->HrefValue = "";

			// isFreeze
			$this->isFreeze->LinkCustomAttributes = "";
			$this->isFreeze->HrefValue = "";

			// rainfall
			$this->rainfall->LinkCustomAttributes = "";
			$this->rainfall->HrefValue = "";

			// min_air_temp
			$this->min_air_temp->LinkCustomAttributes = "";
			$this->min_air_temp->HrefValue = "";

			// max_air_temp
			$this->max_air_temp->LinkCustomAttributes = "";
			$this->max_air_temp->HrefValue = "";

			// atmospheric_pressure
			$this->atmospheric_pressure->LinkCustomAttributes = "";
			$this->atmospheric_pressure->HrefValue = "";

			// wind_speed
			$this->wind_speed->LinkCustomAttributes = "";
			$this->wind_speed->HrefValue = "";

			// precipitation
			$this->precipitation->LinkCustomAttributes = "";
			$this->precipitation->HrefValue = "";
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
		if ($this->Slno->Required) {
			if (!$this->Slno->IsDetailKey && $this->Slno->FormValue != NULL && $this->Slno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Slno->caption(), $this->Slno->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Slno->FormValue)) {
			AddMessage($FormError, $this->Slno->errorMessage());
		}
		if ($this->SMSDateTime->Required) {
			if (!$this->SMSDateTime->IsDetailKey && $this->SMSDateTime->FormValue != NULL && $this->SMSDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SMSDateTime->caption(), $this->SMSDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SMSDateTime->FormValue)) {
			AddMessage($FormError, $this->SMSDateTime->errorMessage());
		}
		if ($this->SystemDateTime->Required) {
			if (!$this->SystemDateTime->IsDetailKey && $this->SystemDateTime->FormValue != NULL && $this->SystemDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SystemDateTime->caption(), $this->SystemDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SystemDateTime->FormValue)) {
			AddMessage($FormError, $this->SystemDateTime->errorMessage());
		}
		if ($this->ConfirmQueryDateTime->Required) {
			if (!$this->ConfirmQueryDateTime->IsDetailKey && $this->ConfirmQueryDateTime->FormValue != NULL && $this->ConfirmQueryDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ConfirmQueryDateTime->caption(), $this->ConfirmQueryDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ConfirmQueryDateTime->FormValue)) {
			AddMessage($FormError, $this->ConfirmQueryDateTime->errorMessage());
		}
		if ($this->ConfirmedDateTime->Required) {
			if (!$this->ConfirmedDateTime->IsDetailKey && $this->ConfirmedDateTime->FormValue != NULL && $this->ConfirmedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ConfirmedDateTime->caption(), $this->ConfirmedDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ConfirmedDateTime->FormValue)) {
			AddMessage($FormError, $this->ConfirmedDateTime->errorMessage());
		}
		if ($this->SendDateTime->Required) {
			if (!$this->SendDateTime->IsDetailKey && $this->SendDateTime->FormValue != NULL && $this->SendDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SendDateTime->caption(), $this->SendDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SendDateTime->FormValue)) {
			AddMessage($FormError, $this->SendDateTime->errorMessage());
		}
		if ($this->SMSText->Required) {
			if (!$this->SMSText->IsDetailKey && $this->SMSText->FormValue != NULL && $this->SMSText->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SMSText->caption(), $this->SMSText->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Status->FormValue)) {
			AddMessage($FormError, $this->Status->errorMessage());
		}
		if ($this->obsremarks->Required) {
			if (!$this->obsremarks->IsDetailKey && $this->obsremarks->FormValue != NULL && $this->obsremarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->obsremarks->caption(), $this->obsremarks->RequiredErrorMessage));
			}
		}
		if ($this->SenderMobileNumber->Required) {
			if (!$this->SenderMobileNumber->IsDetailKey && $this->SenderMobileNumber->FormValue != NULL && $this->SenderMobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SenderMobileNumber->caption(), $this->SenderMobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->SubDivId->Required) {
			if (!$this->SubDivId->IsDetailKey && $this->SubDivId->FormValue != NULL && $this->SubDivId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubDivId->caption(), $this->SubDivId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SubDivId->FormValue)) {
			AddMessage($FormError, $this->SubDivId->errorMessage());
		}
		if ($this->StationId->Required) {
			if (!$this->StationId->IsDetailKey && $this->StationId->FormValue != NULL && $this->StationId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StationId->caption(), $this->StationId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->StationId->FormValue)) {
			AddMessage($FormError, $this->StationId->errorMessage());
		}
		if ($this->IsFirstMsg->Required) {
			if (!$this->IsFirstMsg->IsDetailKey && $this->IsFirstMsg->FormValue != NULL && $this->IsFirstMsg->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IsFirstMsg->caption(), $this->IsFirstMsg->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->IsFirstMsg->FormValue)) {
			AddMessage($FormError, $this->IsFirstMsg->errorMessage());
		}
		if ($this->Validated->Required) {
			if (!$this->Validated->IsDetailKey && $this->Validated->FormValue != NULL && $this->Validated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Validated->caption(), $this->Validated->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Validated->FormValue)) {
			AddMessage($FormError, $this->Validated->errorMessage());
		}
		if ($this->isFreeze->Required) {
			if ($this->isFreeze->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->isFreeze->caption(), $this->isFreeze->RequiredErrorMessage));
			}
		}
		if ($this->rainfall->Required) {
			if (!$this->rainfall->IsDetailKey && $this->rainfall->FormValue != NULL && $this->rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->rainfall->caption(), $this->rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->rainfall->FormValue)) {
			AddMessage($FormError, $this->rainfall->errorMessage());
		}
		if ($this->min_air_temp->Required) {
			if (!$this->min_air_temp->IsDetailKey && $this->min_air_temp->FormValue != NULL && $this->min_air_temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->min_air_temp->caption(), $this->min_air_temp->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->min_air_temp->FormValue)) {
			AddMessage($FormError, $this->min_air_temp->errorMessage());
		}
		if ($this->max_air_temp->Required) {
			if (!$this->max_air_temp->IsDetailKey && $this->max_air_temp->FormValue != NULL && $this->max_air_temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->max_air_temp->caption(), $this->max_air_temp->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->max_air_temp->FormValue)) {
			AddMessage($FormError, $this->max_air_temp->errorMessage());
		}
		if ($this->atmospheric_pressure->Required) {
			if (!$this->atmospheric_pressure->IsDetailKey && $this->atmospheric_pressure->FormValue != NULL && $this->atmospheric_pressure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->atmospheric_pressure->caption(), $this->atmospheric_pressure->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->atmospheric_pressure->FormValue)) {
			AddMessage($FormError, $this->atmospheric_pressure->errorMessage());
		}
		if ($this->wind_speed->Required) {
			if (!$this->wind_speed->IsDetailKey && $this->wind_speed->FormValue != NULL && $this->wind_speed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->wind_speed->caption(), $this->wind_speed->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->wind_speed->FormValue)) {
			AddMessage($FormError, $this->wind_speed->errorMessage());
		}
		if ($this->precipitation->Required) {
			if (!$this->precipitation->IsDetailKey && $this->precipitation->FormValue != NULL && $this->precipitation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->precipitation->caption(), $this->precipitation->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->precipitation->FormValue)) {
			AddMessage($FormError, $this->precipitation->errorMessage());
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

		// Slno
		$this->Slno->setDbValueDef($rsnew, $this->Slno->CurrentValue, 0, FALSE);

		// SMSDateTime
		$this->SMSDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SMSDateTime->CurrentValue, 0), NULL, FALSE);

		// SystemDateTime
		$this->SystemDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SystemDateTime->CurrentValue, 0), NULL, FALSE);

		// ConfirmQueryDateTime
		$this->ConfirmQueryDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ConfirmQueryDateTime->CurrentValue, 0), NULL, FALSE);

		// ConfirmedDateTime
		$this->ConfirmedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ConfirmedDateTime->CurrentValue, 0), NULL, FALSE);

		// SendDateTime
		$this->SendDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SendDateTime->CurrentValue, 0), NULL, FALSE);

		// SMSText
		$this->SMSText->setDbValueDef($rsnew, $this->SMSText->CurrentValue, NULL, FALSE);

		// Status
		$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, FALSE);

		// obsremarks
		$this->obsremarks->setDbValueDef($rsnew, $this->obsremarks->CurrentValue, NULL, FALSE);

		// SenderMobileNumber
		$this->SenderMobileNumber->setDbValueDef($rsnew, $this->SenderMobileNumber->CurrentValue, NULL, FALSE);

		// SubDivId
		$this->SubDivId->setDbValueDef($rsnew, $this->SubDivId->CurrentValue, NULL, FALSE);

		// StationId
		$this->StationId->setDbValueDef($rsnew, $this->StationId->CurrentValue, NULL, FALSE);

		// IsFirstMsg
		$this->IsFirstMsg->setDbValueDef($rsnew, $this->IsFirstMsg->CurrentValue, NULL, FALSE);

		// Validated
		$this->Validated->setDbValueDef($rsnew, $this->Validated->CurrentValue, NULL, FALSE);

		// isFreeze
		$tmpBool = $this->isFreeze->CurrentValue;
		if ($tmpBool != "1" && $tmpBool != "0")
			$tmpBool = !empty($tmpBool) ? "1" : "0";
		$this->isFreeze->setDbValueDef($rsnew, $tmpBool, 0, strval($this->isFreeze->CurrentValue) == "");

		// rainfall
		$this->rainfall->setDbValueDef($rsnew, $this->rainfall->CurrentValue, NULL, FALSE);

		// min_air_temp
		$this->min_air_temp->setDbValueDef($rsnew, $this->min_air_temp->CurrentValue, NULL, FALSE);

		// max_air_temp
		$this->max_air_temp->setDbValueDef($rsnew, $this->max_air_temp->CurrentValue, NULL, FALSE);

		// atmospheric_pressure
		$this->atmospheric_pressure->setDbValueDef($rsnew, $this->atmospheric_pressure->CurrentValue, NULL, FALSE);

		// wind_speed
		$this->wind_speed->setDbValueDef($rsnew, $this->wind_speed->CurrentValue, NULL, FALSE);

		// precipitation
		$this->precipitation->setDbValueDef($rsnew, $this->precipitation->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['Slno']) == "") {
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tbl_smsdata_archivelist.php"), "", $this->TableVar, TRUE);
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
				case "x_isFreeze":
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