<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class master_user_add extends master_user
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'master_user';

	// Page object name
	public $PageObjName = "master_user_add";

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

		// Table object (master_user)
		if (!isset($GLOBALS["master_user"]) || get_class($GLOBALS["master_user"]) == PROJECT_NAMESPACE . "master_user") {
			$GLOBALS["master_user"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["master_user"];
		}

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'master_user');

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
		global $master_user;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($master_user);
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
					if ($pageName == "master_userview.php")
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
			$key .= @$ar['UserId'];
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
					$this->terminate(GetUrl("master_userlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
				if (strval($Security->currentUserID()) == "") {
					$this->setFailureMessage(DeniedMessage()); // Set no permission
					$this->terminate(GetUrl("master_userlist.php"));
					return;
				}
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->_UserId->setVisibility();
		$this->UserName->setVisibility();
		$this->UserAddress->setVisibility();
		$this->StationId->setVisibility();
		$this->TalukId->setVisibility();
		$this->DistrictId->setVisibility();
		$this->SubDivsionId->setVisibility();
		$this->DivisionId->setVisibility();
		$this->RoleId->setVisibility();
		$this->UserPassword->setVisibility();
		$this->UserEmail->setVisibility();
		$this->UserMobileNumber->setVisibility();
		$this->_UserProfile->setVisibility();
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
		$this->setupLookupOptions($this->RoleId);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("master_userlist.php");
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
			if (Get("_UserId") !== NULL) {
				$this->_UserId->setQueryStringValue(Get("_UserId"));
				$this->setKey("_UserId", $this->_UserId->CurrentValue); // Set up key
			} else {
				$this->setKey("_UserId", ""); // Clear key
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
					$this->terminate("master_userlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "master_userlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "master_userview.php")
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
		$this->_UserId->CurrentValue = NULL;
		$this->_UserId->OldValue = $this->_UserId->CurrentValue;
		$this->UserName->CurrentValue = NULL;
		$this->UserName->OldValue = $this->UserName->CurrentValue;
		$this->UserAddress->CurrentValue = NULL;
		$this->UserAddress->OldValue = $this->UserAddress->CurrentValue;
		$this->StationId->CurrentValue = NULL;
		$this->StationId->OldValue = $this->StationId->CurrentValue;
		$this->TalukId->CurrentValue = NULL;
		$this->TalukId->OldValue = $this->TalukId->CurrentValue;
		$this->DistrictId->CurrentValue = NULL;
		$this->DistrictId->OldValue = $this->DistrictId->CurrentValue;
		$this->SubDivsionId->CurrentValue = NULL;
		$this->SubDivsionId->OldValue = $this->SubDivsionId->CurrentValue;
		$this->DivisionId->CurrentValue = NULL;
		$this->DivisionId->OldValue = $this->DivisionId->CurrentValue;
		$this->RoleId->CurrentValue = NULL;
		$this->RoleId->OldValue = $this->RoleId->CurrentValue;
		$this->UserPassword->CurrentValue = NULL;
		$this->UserPassword->OldValue = $this->UserPassword->CurrentValue;
		$this->UserEmail->CurrentValue = NULL;
		$this->UserEmail->OldValue = $this->UserEmail->CurrentValue;
		$this->UserMobileNumber->CurrentValue = NULL;
		$this->UserMobileNumber->OldValue = $this->UserMobileNumber->CurrentValue;
		$this->_UserProfile->CurrentValue = NULL;
		$this->_UserProfile->OldValue = $this->_UserProfile->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'UserId' first before field var 'x__UserId'
		$val = $CurrentForm->hasValue("UserId") ? $CurrentForm->getValue("UserId") : $CurrentForm->getValue("x__UserId");
		if (!$this->_UserId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_UserId->Visible = FALSE; // Disable update for API request
			else
				$this->_UserId->setFormValue($val);
		}

		// Check field name 'UserName' first before field var 'x_UserName'
		$val = $CurrentForm->hasValue("UserName") ? $CurrentForm->getValue("UserName") : $CurrentForm->getValue("x_UserName");
		if (!$this->UserName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UserName->Visible = FALSE; // Disable update for API request
			else
				$this->UserName->setFormValue($val);
		}

		// Check field name 'UserAddress' first before field var 'x_UserAddress'
		$val = $CurrentForm->hasValue("UserAddress") ? $CurrentForm->getValue("UserAddress") : $CurrentForm->getValue("x_UserAddress");
		if (!$this->UserAddress->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UserAddress->Visible = FALSE; // Disable update for API request
			else
				$this->UserAddress->setFormValue($val);
		}

		// Check field name 'StationId' first before field var 'x_StationId'
		$val = $CurrentForm->hasValue("StationId") ? $CurrentForm->getValue("StationId") : $CurrentForm->getValue("x_StationId");
		if (!$this->StationId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StationId->Visible = FALSE; // Disable update for API request
			else
				$this->StationId->setFormValue($val);
		}

		// Check field name 'TalukId' first before field var 'x_TalukId'
		$val = $CurrentForm->hasValue("TalukId") ? $CurrentForm->getValue("TalukId") : $CurrentForm->getValue("x_TalukId");
		if (!$this->TalukId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TalukId->Visible = FALSE; // Disable update for API request
			else
				$this->TalukId->setFormValue($val);
		}

		// Check field name 'DistrictId' first before field var 'x_DistrictId'
		$val = $CurrentForm->hasValue("DistrictId") ? $CurrentForm->getValue("DistrictId") : $CurrentForm->getValue("x_DistrictId");
		if (!$this->DistrictId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DistrictId->Visible = FALSE; // Disable update for API request
			else
				$this->DistrictId->setFormValue($val);
		}

		// Check field name 'SubDivsionId' first before field var 'x_SubDivsionId'
		$val = $CurrentForm->hasValue("SubDivsionId") ? $CurrentForm->getValue("SubDivsionId") : $CurrentForm->getValue("x_SubDivsionId");
		if (!$this->SubDivsionId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SubDivsionId->Visible = FALSE; // Disable update for API request
			else
				$this->SubDivsionId->setFormValue($val);
		}

		// Check field name 'DivisionId' first before field var 'x_DivisionId'
		$val = $CurrentForm->hasValue("DivisionId") ? $CurrentForm->getValue("DivisionId") : $CurrentForm->getValue("x_DivisionId");
		if (!$this->DivisionId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DivisionId->Visible = FALSE; // Disable update for API request
			else
				$this->DivisionId->setFormValue($val);
		}

		// Check field name 'RoleId' first before field var 'x_RoleId'
		$val = $CurrentForm->hasValue("RoleId") ? $CurrentForm->getValue("RoleId") : $CurrentForm->getValue("x_RoleId");
		if (!$this->RoleId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RoleId->Visible = FALSE; // Disable update for API request
			else
				$this->RoleId->setFormValue($val);
		}

		// Check field name 'UserPassword' first before field var 'x_UserPassword'
		$val = $CurrentForm->hasValue("UserPassword") ? $CurrentForm->getValue("UserPassword") : $CurrentForm->getValue("x_UserPassword");
		if (!$this->UserPassword->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UserPassword->Visible = FALSE; // Disable update for API request
			else
				if (Config("ENCRYPTED_PASSWORD")) // Encrypted password, use raw value
					$this->UserPassword->setRawFormValue($val);
				else
					$this->UserPassword->setFormValue($val);
		}

		// Check field name 'UserEmail' first before field var 'x_UserEmail'
		$val = $CurrentForm->hasValue("UserEmail") ? $CurrentForm->getValue("UserEmail") : $CurrentForm->getValue("x_UserEmail");
		if (!$this->UserEmail->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UserEmail->Visible = FALSE; // Disable update for API request
			else
				$this->UserEmail->setFormValue($val);
		}

		// Check field name 'UserMobileNumber' first before field var 'x_UserMobileNumber'
		$val = $CurrentForm->hasValue("UserMobileNumber") ? $CurrentForm->getValue("UserMobileNumber") : $CurrentForm->getValue("x_UserMobileNumber");
		if (!$this->UserMobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UserMobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->UserMobileNumber->setFormValue($val);
		}

		// Check field name 'UserProfile' first before field var 'x__UserProfile'
		$val = $CurrentForm->hasValue("UserProfile") ? $CurrentForm->getValue("UserProfile") : $CurrentForm->getValue("x__UserProfile");
		if (!$this->_UserProfile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_UserProfile->Visible = FALSE; // Disable update for API request
			else
				$this->_UserProfile->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->_UserId->CurrentValue = $this->_UserId->FormValue;
		$this->UserName->CurrentValue = $this->UserName->FormValue;
		$this->UserAddress->CurrentValue = $this->UserAddress->FormValue;
		$this->StationId->CurrentValue = $this->StationId->FormValue;
		$this->TalukId->CurrentValue = $this->TalukId->FormValue;
		$this->DistrictId->CurrentValue = $this->DistrictId->FormValue;
		$this->SubDivsionId->CurrentValue = $this->SubDivsionId->FormValue;
		$this->DivisionId->CurrentValue = $this->DivisionId->FormValue;
		$this->RoleId->CurrentValue = $this->RoleId->FormValue;
		$this->UserPassword->CurrentValue = $this->UserPassword->FormValue;
		$this->UserEmail->CurrentValue = $this->UserEmail->FormValue;
		$this->UserMobileNumber->CurrentValue = $this->UserMobileNumber->FormValue;
		$this->_UserProfile->CurrentValue = $this->_UserProfile->FormValue;
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

		// Check if valid User ID
		if ($res) {
			$res = $this->showOptionLink('add');
			if (!$res) {
				$userIdMsg = DeniedMessage();
				$this->setFailureMessage($userIdMsg);
			}
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
		$this->_UserId->setDbValue($row['UserId']);
		$this->UserName->setDbValue($row['UserName']);
		$this->UserAddress->setDbValue($row['UserAddress']);
		$this->StationId->setDbValue($row['StationId']);
		$this->TalukId->setDbValue($row['TalukId']);
		$this->DistrictId->setDbValue($row['DistrictId']);
		$this->SubDivsionId->setDbValue($row['SubDivsionId']);
		$this->DivisionId->setDbValue($row['DivisionId']);
		$this->RoleId->setDbValue($row['RoleId']);
		$this->UserPassword->setDbValue($row['UserPassword']);
		$this->UserEmail->setDbValue($row['UserEmail']);
		$this->UserMobileNumber->setDbValue($row['UserMobileNumber']);
		$this->_UserProfile->setDbValue($row['UserProfile']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['UserId'] = $this->_UserId->CurrentValue;
		$row['UserName'] = $this->UserName->CurrentValue;
		$row['UserAddress'] = $this->UserAddress->CurrentValue;
		$row['StationId'] = $this->StationId->CurrentValue;
		$row['TalukId'] = $this->TalukId->CurrentValue;
		$row['DistrictId'] = $this->DistrictId->CurrentValue;
		$row['SubDivsionId'] = $this->SubDivsionId->CurrentValue;
		$row['DivisionId'] = $this->DivisionId->CurrentValue;
		$row['RoleId'] = $this->RoleId->CurrentValue;
		$row['UserPassword'] = $this->UserPassword->CurrentValue;
		$row['UserEmail'] = $this->UserEmail->CurrentValue;
		$row['UserMobileNumber'] = $this->UserMobileNumber->CurrentValue;
		$row['UserProfile'] = $this->_UserProfile->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("_UserId")) != "")
			$this->_UserId->OldValue = $this->getKey("_UserId"); // UserId
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
		// UserId
		// UserName
		// UserAddress
		// StationId
		// TalukId
		// DistrictId
		// SubDivsionId
		// DivisionId
		// RoleId
		// UserPassword
		// UserEmail
		// UserMobileNumber
		// UserProfile

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// UserId
			$this->_UserId->ViewValue = $this->_UserId->CurrentValue;
			$this->_UserId->ViewCustomAttributes = "";

			// UserName
			$this->UserName->ViewValue = $this->UserName->CurrentValue;
			$this->UserName->ViewCustomAttributes = "";

			// UserAddress
			$this->UserAddress->ViewValue = $this->UserAddress->CurrentValue;
			$this->UserAddress->ViewCustomAttributes = "";

			// StationId
			$this->StationId->ViewValue = $this->StationId->CurrentValue;
			$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
			$this->StationId->ViewCustomAttributes = "";

			// TalukId
			$this->TalukId->ViewValue = $this->TalukId->CurrentValue;
			$this->TalukId->ViewValue = FormatNumber($this->TalukId->ViewValue, 0, -2, -2, -2);
			$this->TalukId->ViewCustomAttributes = "";

			// DistrictId
			$this->DistrictId->ViewValue = $this->DistrictId->CurrentValue;
			$this->DistrictId->ViewValue = FormatNumber($this->DistrictId->ViewValue, 0, -2, -2, -2);
			$this->DistrictId->ViewCustomAttributes = "";

			// SubDivsionId
			$this->SubDivsionId->ViewValue = $this->SubDivsionId->CurrentValue;
			$this->SubDivsionId->ViewValue = FormatNumber($this->SubDivsionId->ViewValue, 0, -2, -2, -2);
			$this->SubDivsionId->ViewCustomAttributes = "";

			// DivisionId
			$this->DivisionId->ViewValue = $this->DivisionId->CurrentValue;
			$this->DivisionId->ViewValue = FormatNumber($this->DivisionId->ViewValue, 0, -2, -2, -2);
			$this->DivisionId->ViewCustomAttributes = "";

			// RoleId
			if ($Security->canAdmin()) { // System admin
				$curVal = strval($this->RoleId->CurrentValue);
				if ($curVal != "") {
					$this->RoleId->ViewValue = $this->RoleId->lookupCacheOption($curVal);
					if ($this->RoleId->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`RoleId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->RoleId->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->RoleId->ViewValue = $this->RoleId->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->RoleId->ViewValue = $this->RoleId->CurrentValue;
						}
					}
				} else {
					$this->RoleId->ViewValue = NULL;
				}
			} else {
				$this->RoleId->ViewValue = $Language->phrase("PasswordMask");
			}
			$this->RoleId->ViewCustomAttributes = "";

			// UserPassword
			$this->UserPassword->ViewValue = $this->UserPassword->CurrentValue;
			$this->UserPassword->ViewCustomAttributes = "";

			// UserEmail
			$this->UserEmail->ViewValue = $this->UserEmail->CurrentValue;
			$this->UserEmail->ViewCustomAttributes = "";

			// UserMobileNumber
			$this->UserMobileNumber->ViewValue = $this->UserMobileNumber->CurrentValue;
			$this->UserMobileNumber->ViewCustomAttributes = "";

			// UserProfile
			$this->_UserProfile->ViewValue = $this->_UserProfile->CurrentValue;
			$this->_UserProfile->ViewCustomAttributes = "";

			// UserId
			$this->_UserId->LinkCustomAttributes = "";
			$this->_UserId->HrefValue = "";
			$this->_UserId->TooltipValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
			$this->UserName->TooltipValue = "";

			// UserAddress
			$this->UserAddress->LinkCustomAttributes = "";
			$this->UserAddress->HrefValue = "";
			$this->UserAddress->TooltipValue = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// TalukId
			$this->TalukId->LinkCustomAttributes = "";
			$this->TalukId->HrefValue = "";
			$this->TalukId->TooltipValue = "";

			// DistrictId
			$this->DistrictId->LinkCustomAttributes = "";
			$this->DistrictId->HrefValue = "";
			$this->DistrictId->TooltipValue = "";

			// SubDivsionId
			$this->SubDivsionId->LinkCustomAttributes = "";
			$this->SubDivsionId->HrefValue = "";
			$this->SubDivsionId->TooltipValue = "";

			// DivisionId
			$this->DivisionId->LinkCustomAttributes = "";
			$this->DivisionId->HrefValue = "";
			$this->DivisionId->TooltipValue = "";

			// RoleId
			$this->RoleId->LinkCustomAttributes = "";
			$this->RoleId->HrefValue = "";
			$this->RoleId->TooltipValue = "";

			// UserPassword
			$this->UserPassword->LinkCustomAttributes = "";
			$this->UserPassword->HrefValue = "";
			$this->UserPassword->TooltipValue = "";

			// UserEmail
			$this->UserEmail->LinkCustomAttributes = "";
			$this->UserEmail->HrefValue = "";
			$this->UserEmail->TooltipValue = "";

			// UserMobileNumber
			$this->UserMobileNumber->LinkCustomAttributes = "";
			$this->UserMobileNumber->HrefValue = "";
			$this->UserMobileNumber->TooltipValue = "";

			// UserProfile
			$this->_UserProfile->LinkCustomAttributes = "";
			$this->_UserProfile->HrefValue = "";
			$this->_UserProfile->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// UserId
			$this->_UserId->EditAttrs["class"] = "form-control";
			$this->_UserId->EditCustomAttributes = "";
			if (!$Security->isAdmin() && $Security->isLoggedIn() && !$this->userIDAllow("add")) { // Non system admin
				$this->_UserId->CurrentValue = CurrentUserID();
				$this->_UserId->EditValue = $this->_UserId->CurrentValue;
				$this->_UserId->ViewCustomAttributes = "";
			} else {
				if (!$this->_UserId->Raw)
					$this->_UserId->CurrentValue = HtmlDecode($this->_UserId->CurrentValue);
				$this->_UserId->EditValue = HtmlEncode($this->_UserId->CurrentValue);
			}

			// UserName
			$this->UserName->EditAttrs["class"] = "form-control";
			$this->UserName->EditCustomAttributes = "";
			if (!$this->UserName->Raw)
				$this->UserName->CurrentValue = HtmlDecode($this->UserName->CurrentValue);
			$this->UserName->EditValue = HtmlEncode($this->UserName->CurrentValue);

			// UserAddress
			$this->UserAddress->EditAttrs["class"] = "form-control";
			$this->UserAddress->EditCustomAttributes = "";
			$this->UserAddress->EditValue = HtmlEncode($this->UserAddress->CurrentValue);

			// StationId
			$this->StationId->EditAttrs["class"] = "form-control";
			$this->StationId->EditCustomAttributes = "";
			$this->StationId->EditValue = HtmlEncode($this->StationId->CurrentValue);

			// TalukId
			$this->TalukId->EditAttrs["class"] = "form-control";
			$this->TalukId->EditCustomAttributes = "";
			$this->TalukId->EditValue = HtmlEncode($this->TalukId->CurrentValue);

			// DistrictId
			$this->DistrictId->EditAttrs["class"] = "form-control";
			$this->DistrictId->EditCustomAttributes = "";
			$this->DistrictId->EditValue = HtmlEncode($this->DistrictId->CurrentValue);

			// SubDivsionId
			$this->SubDivsionId->EditAttrs["class"] = "form-control";
			$this->SubDivsionId->EditCustomAttributes = "";
			$this->SubDivsionId->EditValue = HtmlEncode($this->SubDivsionId->CurrentValue);

			// DivisionId
			$this->DivisionId->EditAttrs["class"] = "form-control";
			$this->DivisionId->EditCustomAttributes = "";
			$this->DivisionId->EditValue = HtmlEncode($this->DivisionId->CurrentValue);

			// RoleId
			$this->RoleId->EditAttrs["class"] = "form-control";
			$this->RoleId->EditCustomAttributes = "";
			if (!$Security->canAdmin()) { // System admin
				$this->RoleId->EditValue = $Language->phrase("PasswordMask");
			} else {
				$curVal = trim(strval($this->RoleId->CurrentValue));
				if ($curVal != "")
					$this->RoleId->ViewValue = $this->RoleId->lookupCacheOption($curVal);
				else
					$this->RoleId->ViewValue = $this->RoleId->Lookup !== NULL && is_array($this->RoleId->Lookup->Options) ? $curVal : NULL;
				if ($this->RoleId->ViewValue !== NULL) { // Load from cache
					$this->RoleId->EditValue = array_values($this->RoleId->Lookup->Options);
				} else { // Lookup from database
					if ($curVal == "") {
						$filterWrk = "0=1";
					} else {
						$filterWrk = "`RoleId`" . SearchString("=", $this->RoleId->CurrentValue, DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->RoleId->Lookup->getSql(TRUE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					$arwrk = $rswrk ? $rswrk->getRows() : [];
					if ($rswrk)
						$rswrk->close();
					$this->RoleId->EditValue = $arwrk;
				}
			}

			// UserPassword
			$this->UserPassword->EditAttrs["class"] = "form-control";
			$this->UserPassword->EditCustomAttributes = "";
			if (!$this->UserPassword->Raw)
				$this->UserPassword->CurrentValue = HtmlDecode($this->UserPassword->CurrentValue);
			$this->UserPassword->EditValue = HtmlEncode($this->UserPassword->CurrentValue);

			// UserEmail
			$this->UserEmail->EditAttrs["class"] = "form-control";
			$this->UserEmail->EditCustomAttributes = "";
			if (!$this->UserEmail->Raw)
				$this->UserEmail->CurrentValue = HtmlDecode($this->UserEmail->CurrentValue);
			$this->UserEmail->EditValue = HtmlEncode($this->UserEmail->CurrentValue);

			// UserMobileNumber
			$this->UserMobileNumber->EditAttrs["class"] = "form-control";
			$this->UserMobileNumber->EditCustomAttributes = "";
			if (!$this->UserMobileNumber->Raw)
				$this->UserMobileNumber->CurrentValue = HtmlDecode($this->UserMobileNumber->CurrentValue);
			$this->UserMobileNumber->EditValue = HtmlEncode($this->UserMobileNumber->CurrentValue);

			// UserProfile
			$this->_UserProfile->EditAttrs["class"] = "form-control";
			$this->_UserProfile->EditCustomAttributes = "";
			$this->_UserProfile->EditValue = HtmlEncode($this->_UserProfile->CurrentValue);

			// Add refer script
			// UserId

			$this->_UserId->LinkCustomAttributes = "";
			$this->_UserId->HrefValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";

			// UserAddress
			$this->UserAddress->LinkCustomAttributes = "";
			$this->UserAddress->HrefValue = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";

			// TalukId
			$this->TalukId->LinkCustomAttributes = "";
			$this->TalukId->HrefValue = "";

			// DistrictId
			$this->DistrictId->LinkCustomAttributes = "";
			$this->DistrictId->HrefValue = "";

			// SubDivsionId
			$this->SubDivsionId->LinkCustomAttributes = "";
			$this->SubDivsionId->HrefValue = "";

			// DivisionId
			$this->DivisionId->LinkCustomAttributes = "";
			$this->DivisionId->HrefValue = "";

			// RoleId
			$this->RoleId->LinkCustomAttributes = "";
			$this->RoleId->HrefValue = "";

			// UserPassword
			$this->UserPassword->LinkCustomAttributes = "";
			$this->UserPassword->HrefValue = "";

			// UserEmail
			$this->UserEmail->LinkCustomAttributes = "";
			$this->UserEmail->HrefValue = "";

			// UserMobileNumber
			$this->UserMobileNumber->LinkCustomAttributes = "";
			$this->UserMobileNumber->HrefValue = "";

			// UserProfile
			$this->_UserProfile->LinkCustomAttributes = "";
			$this->_UserProfile->HrefValue = "";
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
		if ($this->_UserId->Required) {
			if (!$this->_UserId->IsDetailKey && $this->_UserId->FormValue != NULL && $this->_UserId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_UserId->caption(), $this->_UserId->RequiredErrorMessage));
			}
		}
		if ($this->UserName->Required) {
			if (!$this->UserName->IsDetailKey && $this->UserName->FormValue != NULL && $this->UserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserName->caption(), $this->UserName->RequiredErrorMessage));
			}
		}
		if ($this->UserAddress->Required) {
			if (!$this->UserAddress->IsDetailKey && $this->UserAddress->FormValue != NULL && $this->UserAddress->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserAddress->caption(), $this->UserAddress->RequiredErrorMessage));
			}
		}
		if ($this->StationId->Required) {
			if (!$this->StationId->IsDetailKey && $this->StationId->FormValue != NULL && $this->StationId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StationId->caption(), $this->StationId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->StationId->FormValue)) {
			AddMessage($FormError, $this->StationId->errorMessage());
		}
		if ($this->TalukId->Required) {
			if (!$this->TalukId->IsDetailKey && $this->TalukId->FormValue != NULL && $this->TalukId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TalukId->caption(), $this->TalukId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TalukId->FormValue)) {
			AddMessage($FormError, $this->TalukId->errorMessage());
		}
		if ($this->DistrictId->Required) {
			if (!$this->DistrictId->IsDetailKey && $this->DistrictId->FormValue != NULL && $this->DistrictId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DistrictId->caption(), $this->DistrictId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DistrictId->FormValue)) {
			AddMessage($FormError, $this->DistrictId->errorMessage());
		}
		if ($this->SubDivsionId->Required) {
			if (!$this->SubDivsionId->IsDetailKey && $this->SubDivsionId->FormValue != NULL && $this->SubDivsionId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubDivsionId->caption(), $this->SubDivsionId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SubDivsionId->FormValue)) {
			AddMessage($FormError, $this->SubDivsionId->errorMessage());
		}
		if ($this->DivisionId->Required) {
			if (!$this->DivisionId->IsDetailKey && $this->DivisionId->FormValue != NULL && $this->DivisionId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DivisionId->caption(), $this->DivisionId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DivisionId->FormValue)) {
			AddMessage($FormError, $this->DivisionId->errorMessage());
		}
		if ($this->RoleId->Required) {
			if (!$this->RoleId->IsDetailKey && $this->RoleId->FormValue != NULL && $this->RoleId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RoleId->caption(), $this->RoleId->RequiredErrorMessage));
			}
		}
		if ($this->UserPassword->Required) {
			if (!$this->UserPassword->IsDetailKey && $this->UserPassword->FormValue != NULL && $this->UserPassword->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserPassword->caption(), $this->UserPassword->RequiredErrorMessage));
			}
		}
		if ($this->UserEmail->Required) {
			if (!$this->UserEmail->IsDetailKey && $this->UserEmail->FormValue != NULL && $this->UserEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserEmail->caption(), $this->UserEmail->RequiredErrorMessage));
			}
		}
		if ($this->UserMobileNumber->Required) {
			if (!$this->UserMobileNumber->IsDetailKey && $this->UserMobileNumber->FormValue != NULL && $this->UserMobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserMobileNumber->caption(), $this->UserMobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->_UserProfile->Required) {
			if (!$this->_UserProfile->IsDetailKey && $this->_UserProfile->FormValue != NULL && $this->_UserProfile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_UserProfile->caption(), $this->_UserProfile->RequiredErrorMessage));
			}
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

		// Check if valid User ID
		$validUser = FALSE;
		if ($Security->currentUserID() != "" && !EmptyValue($this->_UserId->CurrentValue) && !$Security->isAdmin()) { // Non system admin
			$validUser = $Security->isValidUserID($this->_UserId->CurrentValue);
			if (!$validUser) {
				$userIdMsg = str_replace("%c", CurrentUserID(), $Language->phrase("UnAuthorizedUserID"));
				$userIdMsg = str_replace("%u", $this->_UserId->CurrentValue, $userIdMsg);
				$this->setFailureMessage($userIdMsg);
				return FALSE;
			}
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// UserId
		$this->_UserId->setDbValueDef($rsnew, $this->_UserId->CurrentValue, "", FALSE);

		// UserName
		$this->UserName->setDbValueDef($rsnew, $this->UserName->CurrentValue, "", strval($this->UserName->CurrentValue) == "");

		// UserAddress
		$this->UserAddress->setDbValueDef($rsnew, $this->UserAddress->CurrentValue, NULL, FALSE);

		// StationId
		$this->StationId->setDbValueDef($rsnew, $this->StationId->CurrentValue, NULL, FALSE);

		// TalukId
		$this->TalukId->setDbValueDef($rsnew, $this->TalukId->CurrentValue, NULL, FALSE);

		// DistrictId
		$this->DistrictId->setDbValueDef($rsnew, $this->DistrictId->CurrentValue, NULL, FALSE);

		// SubDivsionId
		$this->SubDivsionId->setDbValueDef($rsnew, $this->SubDivsionId->CurrentValue, NULL, FALSE);

		// DivisionId
		$this->DivisionId->setDbValueDef($rsnew, $this->DivisionId->CurrentValue, NULL, FALSE);

		// RoleId
		
		if ($Security->canAdmin()) { // System admin
			
			$this->RoleId->setDbValueDef($rsnew, $this->RoleId->CurrentValue, NULL, FALSE);
			
		}
		

		// UserPassword
		$this->UserPassword->setDbValueDef($rsnew, $this->UserPassword->CurrentValue, NULL, FALSE);

		// UserEmail
		$this->UserEmail->setDbValueDef($rsnew, $this->UserEmail->CurrentValue, NULL, FALSE);

		// UserMobileNumber
		$this->UserMobileNumber->setDbValueDef($rsnew, $this->UserMobileNumber->CurrentValue, "", strval($this->UserMobileNumber->CurrentValue) == "");

		// UserProfile
		$this->_UserProfile->setDbValueDef($rsnew, $this->_UserProfile->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['UserId']) == "") {
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

	// Show link optionally based on User ID
	protected function showOptionLink($id = "")
	{
		global $Security;
		if ($Security->isLoggedIn() && !$Security->isAdmin() && !$this->userIDAllow($id))
			return $Security->isValidUserID($this->_UserId->CurrentValue);
		return TRUE;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("master_userlist.php"), "", $this->TableVar, TRUE);
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
				case "x_RoleId":
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
						case "x_RoleId":
							break;
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