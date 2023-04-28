<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_smsdata_edit extends tbl_smsdata
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_smsdata';

	// Page object name
	public $PageObjName = "tbl_smsdata_edit";

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

		// Table object (tbl_smsdata)
		if (!isset($GLOBALS["tbl_smsdata"]) || get_class($GLOBALS["tbl_smsdata"]) == PROJECT_NAMESPACE . "tbl_smsdata") {
			$GLOBALS["tbl_smsdata"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tbl_smsdata"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tbl_smsdata');

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
		global $tbl_smsdata;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($tbl_smsdata);
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
					if ($pageName == "tbl_smsdataview.php")
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->Slno->Visible = FALSE;
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
			if (!$Security->canEdit()) {
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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("tbl_smsdatalist.php"));
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
		$this->StationId->setVisibility();
		$this->SubDivId->setVisibility();
		$this->SendDateTime->setVisibility();
		$this->rainfall->setVisibility();
		$this->obsremarks->setVisibility();
		$this->Status->setVisibility();
		$this->Validated->setVisibility();
		$this->SenderMobileNumber->setVisibility();
		$this->IsFirstMsg->setVisibility();
		$this->SMSText->setVisibility();
		$this->isFreeze->setVisibility();
		$this->SystemDateTime->setVisibility();
		$this->ConfirmQueryDateTime->setVisibility();
		$this->ConfirmedDateTime->setVisibility();
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
		$this->setupLookupOptions($this->StationId);
		$this->setupLookupOptions($this->SubDivId);
		$this->setupLookupOptions($this->Status);
		$this->setupLookupOptions($this->Validated);
		$this->setupLookupOptions($this->IsFirstMsg);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("tbl_smsdatalist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {

			// Load key values
			$loaded = TRUE;
			if (Get("Slno") !== NULL) {
				$this->Slno->setQueryStringValue(Get("Slno"));
				$this->Slno->setOldValue($this->Slno->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->Slno->setQueryStringValue(Key(0));
				$this->Slno->setOldValue($this->Slno->QueryStringValue);
			} elseif (Post("Slno") !== NULL) {
				$this->Slno->setFormValue(Post("Slno"));
				$this->Slno->setOldValue($this->Slno->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->Slno->setQueryStringValue(Route(2));
				$this->Slno->setOldValue($this->Slno->QueryStringValue);
			} else {
				$loaded = FALSE; // Unable to load key
			}

			// Load record
			if ($loaded)
				$loaded = $this->loadRow();
			if (!$loaded) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
				$this->terminate();
				return;
			}
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} else {
			if (Post("action") !== NULL) {
				$this->CurrentAction = Post("action"); // Get action code
				if (!$this->isShow()) // Not reload record, handle as postback
					$postBack = TRUE;

				// Load key from Form
				if ($CurrentForm->hasValue("x_Slno")) {
					$this->Slno->setFormValue($CurrentForm->getValue("x_Slno"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("Slno") !== NULL) {
					$this->Slno->setQueryStringValue(Get("Slno"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->Slno->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->Slno->CurrentValue = NULL;
				}
			}

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("tbl_smsdatalist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "tbl_smsdatalist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Slno' first before field var 'x_Slno'
		$val = $CurrentForm->hasValue("Slno") ? $CurrentForm->getValue("Slno") : $CurrentForm->getValue("x_Slno");
		if (!$this->Slno->IsDetailKey)
			$this->Slno->setFormValue($val);

		// Check field name 'SMSDateTime' first before field var 'x_SMSDateTime'
		$val = $CurrentForm->hasValue("SMSDateTime") ? $CurrentForm->getValue("SMSDateTime") : $CurrentForm->getValue("x_SMSDateTime");
		if (!$this->SMSDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SMSDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->SMSDateTime->setFormValue($val);
			$this->SMSDateTime->CurrentValue = UnFormatDateTime($this->SMSDateTime->CurrentValue, 7);
		}

		// Check field name 'StationId' first before field var 'x_StationId'
		$val = $CurrentForm->hasValue("StationId") ? $CurrentForm->getValue("StationId") : $CurrentForm->getValue("x_StationId");
		if (!$this->StationId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StationId->Visible = FALSE; // Disable update for API request
			else
				$this->StationId->setFormValue($val);
		}

		// Check field name 'SubDivId' first before field var 'x_SubDivId'
		$val = $CurrentForm->hasValue("SubDivId") ? $CurrentForm->getValue("SubDivId") : $CurrentForm->getValue("x_SubDivId");
		if (!$this->SubDivId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SubDivId->Visible = FALSE; // Disable update for API request
			else
				$this->SubDivId->setFormValue($val);
		}

		// Check field name 'SendDateTime' first before field var 'x_SendDateTime'
		$val = $CurrentForm->hasValue("SendDateTime") ? $CurrentForm->getValue("SendDateTime") : $CurrentForm->getValue("x_SendDateTime");
		if (!$this->SendDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SendDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->SendDateTime->setFormValue($val);
			$this->SendDateTime->CurrentValue = UnFormatDateTime($this->SendDateTime->CurrentValue, 7);
		}

		// Check field name 'rainfall' first before field var 'x_rainfall'
		$val = $CurrentForm->hasValue("rainfall") ? $CurrentForm->getValue("rainfall") : $CurrentForm->getValue("x_rainfall");
		if (!$this->rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->rainfall->setFormValue($val);
		}

		// Check field name 'obsremarks' first before field var 'x_obsremarks'
		$val = $CurrentForm->hasValue("obsremarks") ? $CurrentForm->getValue("obsremarks") : $CurrentForm->getValue("x_obsremarks");
		if (!$this->obsremarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->obsremarks->Visible = FALSE; // Disable update for API request
			else
				$this->obsremarks->setFormValue($val);
		}

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}

		// Check field name 'Validated' first before field var 'x_Validated'
		$val = $CurrentForm->hasValue("Validated") ? $CurrentForm->getValue("Validated") : $CurrentForm->getValue("x_Validated");
		if (!$this->Validated->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Validated->Visible = FALSE; // Disable update for API request
			else
				$this->Validated->setFormValue($val);
		}

		// Check field name 'SenderMobileNumber' first before field var 'x_SenderMobileNumber'
		$val = $CurrentForm->hasValue("SenderMobileNumber") ? $CurrentForm->getValue("SenderMobileNumber") : $CurrentForm->getValue("x_SenderMobileNumber");
		if (!$this->SenderMobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SenderMobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->SenderMobileNumber->setFormValue($val);
		}

		// Check field name 'IsFirstMsg' first before field var 'x_IsFirstMsg'
		$val = $CurrentForm->hasValue("IsFirstMsg") ? $CurrentForm->getValue("IsFirstMsg") : $CurrentForm->getValue("x_IsFirstMsg");
		if (!$this->IsFirstMsg->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IsFirstMsg->Visible = FALSE; // Disable update for API request
			else
				$this->IsFirstMsg->setFormValue($val);
		}

		// Check field name 'SMSText' first before field var 'x_SMSText'
		$val = $CurrentForm->hasValue("SMSText") ? $CurrentForm->getValue("SMSText") : $CurrentForm->getValue("x_SMSText");
		if (!$this->SMSText->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SMSText->Visible = FALSE; // Disable update for API request
			else
				$this->SMSText->setFormValue($val);
		}

		// Check field name 'isFreeze' first before field var 'x_isFreeze'
		$val = $CurrentForm->hasValue("isFreeze") ? $CurrentForm->getValue("isFreeze") : $CurrentForm->getValue("x_isFreeze");
		if (!$this->isFreeze->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->isFreeze->Visible = FALSE; // Disable update for API request
			else
				$this->isFreeze->setFormValue($val);
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
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Slno->CurrentValue = $this->Slno->FormValue;
		$this->SMSDateTime->CurrentValue = $this->SMSDateTime->FormValue;
		$this->SMSDateTime->CurrentValue = UnFormatDateTime($this->SMSDateTime->CurrentValue, 7);
		$this->StationId->CurrentValue = $this->StationId->FormValue;
		$this->SubDivId->CurrentValue = $this->SubDivId->FormValue;
		$this->SendDateTime->CurrentValue = $this->SendDateTime->FormValue;
		$this->SendDateTime->CurrentValue = UnFormatDateTime($this->SendDateTime->CurrentValue, 7);
		$this->rainfall->CurrentValue = $this->rainfall->FormValue;
		$this->obsremarks->CurrentValue = $this->obsremarks->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->Validated->CurrentValue = $this->Validated->FormValue;
		$this->SenderMobileNumber->CurrentValue = $this->SenderMobileNumber->FormValue;
		$this->IsFirstMsg->CurrentValue = $this->IsFirstMsg->FormValue;
		$this->SMSText->CurrentValue = $this->SMSText->FormValue;
		$this->isFreeze->CurrentValue = $this->isFreeze->FormValue;
		$this->SystemDateTime->CurrentValue = $this->SystemDateTime->FormValue;
		$this->SystemDateTime->CurrentValue = UnFormatDateTime($this->SystemDateTime->CurrentValue, 0);
		$this->ConfirmQueryDateTime->CurrentValue = $this->ConfirmQueryDateTime->FormValue;
		$this->ConfirmQueryDateTime->CurrentValue = UnFormatDateTime($this->ConfirmQueryDateTime->CurrentValue, 0);
		$this->ConfirmedDateTime->CurrentValue = $this->ConfirmedDateTime->FormValue;
		$this->ConfirmedDateTime->CurrentValue = UnFormatDateTime($this->ConfirmedDateTime->CurrentValue, 0);
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
		$this->StationId->setDbValue($row['StationId']);
		$this->SubDivId->setDbValue($row['SubDivId']);
		$this->SendDateTime->setDbValue($row['SendDateTime']);
		$this->rainfall->setDbValue($row['rainfall']);
		$this->obsremarks->setDbValue($row['obsremarks']);
		$this->Status->setDbValue($row['Status']);
		$this->Validated->setDbValue($row['Validated']);
		$this->SenderMobileNumber->setDbValue($row['SenderMobileNumber']);
		$this->IsFirstMsg->setDbValue($row['IsFirstMsg']);
		$this->SMSText->setDbValue($row['SMSText']);
		$this->isFreeze->setDbValue($row['isFreeze']);
		$this->SystemDateTime->setDbValue($row['SystemDateTime']);
		$this->ConfirmQueryDateTime->setDbValue($row['ConfirmQueryDateTime']);
		$this->ConfirmedDateTime->setDbValue($row['ConfirmedDateTime']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['Slno'] = NULL;
		$row['SMSDateTime'] = NULL;
		$row['StationId'] = NULL;
		$row['SubDivId'] = NULL;
		$row['SendDateTime'] = NULL;
		$row['rainfall'] = NULL;
		$row['obsremarks'] = NULL;
		$row['Status'] = NULL;
		$row['Validated'] = NULL;
		$row['SenderMobileNumber'] = NULL;
		$row['IsFirstMsg'] = NULL;
		$row['SMSText'] = NULL;
		$row['isFreeze'] = NULL;
		$row['SystemDateTime'] = NULL;
		$row['ConfirmQueryDateTime'] = NULL;
		$row['ConfirmedDateTime'] = NULL;
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

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Slno
		// SMSDateTime
		// StationId
		// SubDivId
		// SendDateTime
		// rainfall
		// obsremarks
		// Status
		// Validated
		// SenderMobileNumber
		// IsFirstMsg
		// SMSText
		// isFreeze
		// SystemDateTime
		// ConfirmQueryDateTime
		// ConfirmedDateTime

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Slno
			$this->Slno->ViewValue = $this->Slno->CurrentValue;
			$this->Slno->ViewValue = FormatNumber($this->Slno->ViewValue, 0, -2, -2, -2);
			$this->Slno->ViewCustomAttributes = "";

			// SMSDateTime
			$this->SMSDateTime->ViewValue = $this->SMSDateTime->CurrentValue;
			$this->SMSDateTime->ViewValue = FormatDateTime($this->SMSDateTime->ViewValue, 7);
			$this->SMSDateTime->ViewCustomAttributes = "";

			// StationId
			$curVal = strval($this->StationId->CurrentValue);
			if ($curVal != "") {
				$this->StationId->ViewValue = $this->StationId->lookupCacheOption($curVal);
				if ($this->StationId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`StationId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->StationId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->StationId->ViewValue = $this->StationId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->StationId->ViewValue = $this->StationId->CurrentValue;
					}
				}
			} else {
				$this->StationId->ViewValue = NULL;
			}
			$this->StationId->ViewCustomAttributes = "";

			// SubDivId
			$curVal = strval($this->SubDivId->CurrentValue);
			if ($curVal != "") {
				$this->SubDivId->ViewValue = $this->SubDivId->lookupCacheOption($curVal);
				if ($this->SubDivId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`SubDivisionId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->SubDivId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->SubDivId->ViewValue = $this->SubDivId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SubDivId->ViewValue = $this->SubDivId->CurrentValue;
					}
				}
			} else {
				$this->SubDivId->ViewValue = NULL;
			}
			$this->SubDivId->ViewCustomAttributes = "";

			// SendDateTime
			$this->SendDateTime->ViewValue = $this->SendDateTime->CurrentValue;
			$this->SendDateTime->ViewValue = FormatDateTime($this->SendDateTime->ViewValue, 7);
			$this->SendDateTime->ViewCustomAttributes = "";

			// rainfall
			$this->rainfall->ViewValue = $this->rainfall->CurrentValue;
			$this->rainfall->ViewValue = FormatNumber($this->rainfall->ViewValue, 2, -2, -2, -2);
			$this->rainfall->ViewCustomAttributes = "";

			// obsremarks
			$this->obsremarks->ViewValue = $this->obsremarks->CurrentValue;
			$this->obsremarks->ViewCustomAttributes = "";

			// Status
			$curVal = strval($this->Status->CurrentValue);
			if ($curVal != "") {
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
				if ($this->Status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Status`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Status->ViewValue = $this->Status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Status->ViewValue = $this->Status->CurrentValue;
					}
				}
			} else {
				$this->Status->ViewValue = NULL;
			}
			$this->Status->ViewCustomAttributes = "";

			// Validated
			$curVal = strval($this->Validated->CurrentValue);
			if ($curVal != "") {
				$this->Validated->ViewValue = $this->Validated->lookupCacheOption($curVal);
				if ($this->Validated->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`validated`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Validated->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Validated->ViewValue = $this->Validated->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Validated->ViewValue = $this->Validated->CurrentValue;
					}
				}
			} else {
				$this->Validated->ViewValue = NULL;
			}
			$this->Validated->ViewCustomAttributes = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
			$this->SenderMobileNumber->ViewCustomAttributes = "";

			// IsFirstMsg
			$curVal = strval($this->IsFirstMsg->CurrentValue);
			if ($curVal != "") {
				$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->lookupCacheOption($curVal);
				if ($this->IsFirstMsg->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`isFirstMsg`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->IsFirstMsg->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->CurrentValue;
					}
				}
			} else {
				$this->IsFirstMsg->ViewValue = NULL;
			}
			$this->IsFirstMsg->ViewCustomAttributes = "";

			// SMSText
			$this->SMSText->ViewValue = $this->SMSText->CurrentValue;
			$this->SMSText->ViewCustomAttributes = "";

			// isFreeze
			if (ConvertToBool($this->isFreeze->CurrentValue)) {
				$this->isFreeze->ViewValue = $this->isFreeze->tagCaption(1) != "" ? $this->isFreeze->tagCaption(1) : "Yes";
			} else {
				$this->isFreeze->ViewValue = $this->isFreeze->tagCaption(2) != "" ? $this->isFreeze->tagCaption(2) : "No";
			}
			$this->isFreeze->ViewCustomAttributes = "";

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

			// Slno
			$this->Slno->LinkCustomAttributes = "";
			$this->Slno->HrefValue = "";
			$this->Slno->TooltipValue = "";

			// SMSDateTime
			$this->SMSDateTime->LinkCustomAttributes = "";
			$this->SMSDateTime->HrefValue = "";
			$this->SMSDateTime->TooltipValue = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// SubDivId
			$this->SubDivId->LinkCustomAttributes = "";
			$this->SubDivId->HrefValue = "";
			$this->SubDivId->TooltipValue = "";

			// SendDateTime
			$this->SendDateTime->LinkCustomAttributes = "";
			$this->SendDateTime->HrefValue = "";
			$this->SendDateTime->TooltipValue = "";

			// rainfall
			$this->rainfall->LinkCustomAttributes = "";
			$this->rainfall->HrefValue = "";
			$this->rainfall->TooltipValue = "";

			// obsremarks
			$this->obsremarks->LinkCustomAttributes = "";
			$this->obsremarks->HrefValue = "";
			$this->obsremarks->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// Validated
			$this->Validated->LinkCustomAttributes = "";
			$this->Validated->HrefValue = "";
			$this->Validated->TooltipValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";
			$this->SenderMobileNumber->TooltipValue = "";

			// IsFirstMsg
			$this->IsFirstMsg->LinkCustomAttributes = "";
			$this->IsFirstMsg->HrefValue = "";
			$this->IsFirstMsg->TooltipValue = "";

			// SMSText
			$this->SMSText->LinkCustomAttributes = "";
			$this->SMSText->HrefValue = "";
			$this->SMSText->TooltipValue = "";

			// isFreeze
			$this->isFreeze->LinkCustomAttributes = "";
			$this->isFreeze->HrefValue = "";
			$this->isFreeze->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// Slno
			$this->Slno->EditAttrs["class"] = "form-control";
			$this->Slno->EditCustomAttributes = "";
			$this->Slno->EditValue = $this->Slno->CurrentValue;
			$this->Slno->EditValue = FormatNumber($this->Slno->EditValue, 0, -2, -2, -2);
			$this->Slno->ViewCustomAttributes = "";

			// SMSDateTime
			$this->SMSDateTime->EditAttrs["class"] = "form-control";
			$this->SMSDateTime->EditCustomAttributes = "";
			$this->SMSDateTime->EditValue = HtmlEncode(FormatDateTime($this->SMSDateTime->CurrentValue, 7));

			// StationId
			$this->StationId->EditAttrs["class"] = "form-control";
			$this->StationId->EditCustomAttributes = "";
			$curVal = trim(strval($this->StationId->CurrentValue));
			if ($curVal != "")
				$this->StationId->ViewValue = $this->StationId->lookupCacheOption($curVal);
			else
				$this->StationId->ViewValue = $this->StationId->Lookup !== NULL && is_array($this->StationId->Lookup->Options) ? $curVal : NULL;
			if ($this->StationId->ViewValue !== NULL) { // Load from cache
				$this->StationId->EditValue = array_values($this->StationId->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`StationId`" . SearchString("=", $this->StationId->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->StationId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->StationId->EditValue = $arwrk;
			}

			// SubDivId
			$this->SubDivId->EditAttrs["class"] = "form-control";
			$this->SubDivId->EditCustomAttributes = "";
			$curVal = trim(strval($this->SubDivId->CurrentValue));
			if ($curVal != "")
				$this->SubDivId->ViewValue = $this->SubDivId->lookupCacheOption($curVal);
			else
				$this->SubDivId->ViewValue = $this->SubDivId->Lookup !== NULL && is_array($this->SubDivId->Lookup->Options) ? $curVal : NULL;
			if ($this->SubDivId->ViewValue !== NULL) { // Load from cache
				$this->SubDivId->EditValue = array_values($this->SubDivId->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`SubDivisionId`" . SearchString("=", $this->SubDivId->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->SubDivId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->SubDivId->EditValue = $arwrk;
			}

			// SendDateTime
			$this->SendDateTime->EditAttrs["class"] = "form-control";
			$this->SendDateTime->EditCustomAttributes = "";
			$this->SendDateTime->EditValue = HtmlEncode(FormatDateTime($this->SendDateTime->CurrentValue, 7));

			// rainfall
			$this->rainfall->EditAttrs["class"] = "form-control";
			$this->rainfall->EditCustomAttributes = "";
			$this->rainfall->EditValue = HtmlEncode($this->rainfall->CurrentValue);
			if (strval($this->rainfall->EditValue) != "" && is_numeric($this->rainfall->EditValue))
				$this->rainfall->EditValue = FormatNumber($this->rainfall->EditValue, -2, -2, -2, -2);
			

			// obsremarks
			$this->obsremarks->EditAttrs["class"] = "form-control";
			$this->obsremarks->EditCustomAttributes = "";
			if (!$this->obsremarks->Raw)
				$this->obsremarks->CurrentValue = HtmlDecode($this->obsremarks->CurrentValue);
			$this->obsremarks->EditValue = HtmlEncode($this->obsremarks->CurrentValue);

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$curVal = trim(strval($this->Status->CurrentValue));
			if ($curVal != "")
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
			else
				$this->Status->ViewValue = $this->Status->Lookup !== NULL && is_array($this->Status->Lookup->Options) ? $curVal : NULL;
			if ($this->Status->ViewValue !== NULL) { // Load from cache
				$this->Status->EditValue = array_values($this->Status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Status`" . SearchString("=", $this->Status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Status->EditValue = $arwrk;
			}

			// Validated
			$this->Validated->EditAttrs["class"] = "form-control";
			$this->Validated->EditCustomAttributes = "";
			$curVal = trim(strval($this->Validated->CurrentValue));
			if ($curVal != "")
				$this->Validated->ViewValue = $this->Validated->lookupCacheOption($curVal);
			else
				$this->Validated->ViewValue = $this->Validated->Lookup !== NULL && is_array($this->Validated->Lookup->Options) ? $curVal : NULL;
			if ($this->Validated->ViewValue !== NULL) { // Load from cache
				$this->Validated->EditValue = array_values($this->Validated->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`validated`" . SearchString("=", $this->Validated->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Validated->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Validated->EditValue = $arwrk;
			}

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			if (!$this->SenderMobileNumber->Raw)
				$this->SenderMobileNumber->CurrentValue = HtmlDecode($this->SenderMobileNumber->CurrentValue);
			$this->SenderMobileNumber->EditValue = HtmlEncode($this->SenderMobileNumber->CurrentValue);

			// IsFirstMsg
			$this->IsFirstMsg->EditCustomAttributes = "";
			$curVal = trim(strval($this->IsFirstMsg->CurrentValue));
			if ($curVal != "")
				$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->lookupCacheOption($curVal);
			else
				$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->Lookup !== NULL && is_array($this->IsFirstMsg->Lookup->Options) ? $curVal : NULL;
			if ($this->IsFirstMsg->ViewValue !== NULL) { // Load from cache
				$this->IsFirstMsg->EditValue = array_values($this->IsFirstMsg->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`isFirstMsg`" . SearchString("=", $this->IsFirstMsg->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->IsFirstMsg->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->IsFirstMsg->EditValue = $arwrk;
			}

			// SMSText
			$this->SMSText->EditAttrs["class"] = "form-control";
			$this->SMSText->EditCustomAttributes = "";
			if (!$this->SMSText->Raw)
				$this->SMSText->CurrentValue = HtmlDecode($this->SMSText->CurrentValue);
			$this->SMSText->EditValue = HtmlEncode($this->SMSText->CurrentValue);

			// isFreeze
			$this->isFreeze->EditCustomAttributes = "";
			$this->isFreeze->EditValue = $this->isFreeze->options(FALSE);

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

			// Edit refer script
			// Slno

			$this->Slno->LinkCustomAttributes = "";
			$this->Slno->HrefValue = "";

			// SMSDateTime
			$this->SMSDateTime->LinkCustomAttributes = "";
			$this->SMSDateTime->HrefValue = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";

			// SubDivId
			$this->SubDivId->LinkCustomAttributes = "";
			$this->SubDivId->HrefValue = "";

			// SendDateTime
			$this->SendDateTime->LinkCustomAttributes = "";
			$this->SendDateTime->HrefValue = "";

			// rainfall
			$this->rainfall->LinkCustomAttributes = "";
			$this->rainfall->HrefValue = "";

			// obsremarks
			$this->obsremarks->LinkCustomAttributes = "";
			$this->obsremarks->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// Validated
			$this->Validated->LinkCustomAttributes = "";
			$this->Validated->HrefValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";

			// IsFirstMsg
			$this->IsFirstMsg->LinkCustomAttributes = "";
			$this->IsFirstMsg->HrefValue = "";

			// SMSText
			$this->SMSText->LinkCustomAttributes = "";
			$this->SMSText->HrefValue = "";

			// isFreeze
			$this->isFreeze->LinkCustomAttributes = "";
			$this->isFreeze->HrefValue = "";

			// SystemDateTime
			$this->SystemDateTime->LinkCustomAttributes = "";
			$this->SystemDateTime->HrefValue = "";

			// ConfirmQueryDateTime
			$this->ConfirmQueryDateTime->LinkCustomAttributes = "";
			$this->ConfirmQueryDateTime->HrefValue = "";

			// ConfirmedDateTime
			$this->ConfirmedDateTime->LinkCustomAttributes = "";
			$this->ConfirmedDateTime->HrefValue = "";
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
		if ($this->SMSDateTime->Required) {
			if (!$this->SMSDateTime->IsDetailKey && $this->SMSDateTime->FormValue != NULL && $this->SMSDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SMSDateTime->caption(), $this->SMSDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->SMSDateTime->FormValue)) {
			AddMessage($FormError, $this->SMSDateTime->errorMessage());
		}
		if ($this->StationId->Required) {
			if (!$this->StationId->IsDetailKey && $this->StationId->FormValue != NULL && $this->StationId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StationId->caption(), $this->StationId->RequiredErrorMessage));
			}
		}
		if ($this->SubDivId->Required) {
			if (!$this->SubDivId->IsDetailKey && $this->SubDivId->FormValue != NULL && $this->SubDivId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubDivId->caption(), $this->SubDivId->RequiredErrorMessage));
			}
		}
		if ($this->SendDateTime->Required) {
			if (!$this->SendDateTime->IsDetailKey && $this->SendDateTime->FormValue != NULL && $this->SendDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SendDateTime->caption(), $this->SendDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->SendDateTime->FormValue)) {
			AddMessage($FormError, $this->SendDateTime->errorMessage());
		}
		if ($this->rainfall->Required) {
			if (!$this->rainfall->IsDetailKey && $this->rainfall->FormValue != NULL && $this->rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->rainfall->caption(), $this->rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckRange($this->rainfall->FormValue, 0.00, 200.00)) {
			AddMessage($FormError, $this->rainfall->errorMessage());
		}
		if ($this->obsremarks->Required) {
			if (!$this->obsremarks->IsDetailKey && $this->obsremarks->FormValue != NULL && $this->obsremarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->obsremarks->caption(), $this->obsremarks->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->Validated->Required) {
			if (!$this->Validated->IsDetailKey && $this->Validated->FormValue != NULL && $this->Validated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Validated->caption(), $this->Validated->RequiredErrorMessage));
			}
		}
		if ($this->SenderMobileNumber->Required) {
			if (!$this->SenderMobileNumber->IsDetailKey && $this->SenderMobileNumber->FormValue != NULL && $this->SenderMobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SenderMobileNumber->caption(), $this->SenderMobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->IsFirstMsg->Required) {
			if ($this->IsFirstMsg->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IsFirstMsg->caption(), $this->IsFirstMsg->RequiredErrorMessage));
			}
		}
		if ($this->SMSText->Required) {
			if (!$this->SMSText->IsDetailKey && $this->SMSText->FormValue != NULL && $this->SMSText->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SMSText->caption(), $this->SMSText->RequiredErrorMessage));
			}
		}
		if ($this->isFreeze->Required) {
			if ($this->isFreeze->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->isFreeze->caption(), $this->isFreeze->RequiredErrorMessage));
			}
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

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// SMSDateTime
			$this->SMSDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SMSDateTime->CurrentValue, 7), NULL, $this->SMSDateTime->ReadOnly);

			// StationId
			$this->StationId->setDbValueDef($rsnew, $this->StationId->CurrentValue, NULL, $this->StationId->ReadOnly);

			// SubDivId
			$this->SubDivId->setDbValueDef($rsnew, $this->SubDivId->CurrentValue, NULL, $this->SubDivId->ReadOnly);

			// SendDateTime
			$this->SendDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SendDateTime->CurrentValue, 7), NULL, $this->SendDateTime->ReadOnly);

			// rainfall
			$this->rainfall->setDbValueDef($rsnew, $this->rainfall->CurrentValue, NULL, $this->rainfall->ReadOnly);

			// obsremarks
			$this->obsremarks->setDbValueDef($rsnew, $this->obsremarks->CurrentValue, NULL, $this->obsremarks->ReadOnly);

			// Status
			$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, 0, $this->Status->ReadOnly);

			// Validated
			$this->Validated->setDbValueDef($rsnew, $this->Validated->CurrentValue, NULL, $this->Validated->ReadOnly);

			// SenderMobileNumber
			$this->SenderMobileNumber->setDbValueDef($rsnew, $this->SenderMobileNumber->CurrentValue, NULL, $this->SenderMobileNumber->ReadOnly);

			// IsFirstMsg
			$this->IsFirstMsg->setDbValueDef($rsnew, $this->IsFirstMsg->CurrentValue, NULL, $this->IsFirstMsg->ReadOnly);

			// SMSText
			$this->SMSText->setDbValueDef($rsnew, $this->SMSText->CurrentValue, NULL, $this->SMSText->ReadOnly);

			// isFreeze
			$tmpBool = $this->isFreeze->CurrentValue;
			if ($tmpBool != "1" && $tmpBool != "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->isFreeze->setDbValueDef($rsnew, $tmpBool, 0, $this->isFreeze->ReadOnly);

			// SystemDateTime
			$this->SystemDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SystemDateTime->CurrentValue, 0), NULL, $this->SystemDateTime->ReadOnly);

			// ConfirmQueryDateTime
			$this->ConfirmQueryDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ConfirmQueryDateTime->CurrentValue, 0), NULL, $this->ConfirmQueryDateTime->ReadOnly);

			// ConfirmedDateTime
			$this->ConfirmedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ConfirmedDateTime->CurrentValue, 0), NULL, $this->ConfirmedDateTime->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew);
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Clean upload path if any
		if ($editRow) {
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tbl_smsdatalist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
				case "x_StationId":
					break;
				case "x_SubDivId":
					break;
				case "x_Status":
					break;
				case "x_Validated":
					break;
				case "x_IsFirstMsg":
					break;
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
						case "x_StationId":
							break;
						case "x_SubDivId":
							break;
						case "x_Status":
							break;
						case "x_Validated":
							break;
						case "x_IsFirstMsg":
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

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($pageNo !== NULL) { // Check for "pageno" parameter first
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			} elseif ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
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