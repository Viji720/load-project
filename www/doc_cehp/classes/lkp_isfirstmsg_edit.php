<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class lkp_isfirstmsg_edit extends lkp_isfirstmsg
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'lkp_isfirstmsg';

	// Page object name
	public $PageObjName = "lkp_isfirstmsg_edit";

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

		// Table object (lkp_isfirstmsg)
		if (!isset($GLOBALS["lkp_isfirstmsg"]) || get_class($GLOBALS["lkp_isfirstmsg"]) == PROJECT_NAMESPACE . "lkp_isfirstmsg") {
			$GLOBALS["lkp_isfirstmsg"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lkp_isfirstmsg"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lkp_isfirstmsg');

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
		global $lkp_isfirstmsg;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($lkp_isfirstmsg);
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
					if ($pageName == "lkp_isfirstmsgview.php")
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
			$key .= @$ar['isFirstMsg'];
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
					$this->terminate(GetUrl("lkp_isfirstmsglist.php"));
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
		$this->isFirstMsg->setVisibility();
		$this->isFirstMsgName->setVisibility();
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

		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("lkp_isfirstmsglist.php");
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
			if (Get("isFirstMsg") !== NULL) {
				$this->isFirstMsg->setQueryStringValue(Get("isFirstMsg"));
				$this->isFirstMsg->setOldValue($this->isFirstMsg->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->isFirstMsg->setQueryStringValue(Key(0));
				$this->isFirstMsg->setOldValue($this->isFirstMsg->QueryStringValue);
			} elseif (Post("isFirstMsg") !== NULL) {
				$this->isFirstMsg->setFormValue(Post("isFirstMsg"));
				$this->isFirstMsg->setOldValue($this->isFirstMsg->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->isFirstMsg->setQueryStringValue(Route(2));
				$this->isFirstMsg->setOldValue($this->isFirstMsg->QueryStringValue);
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
				if ($CurrentForm->hasValue("x_isFirstMsg")) {
					$this->isFirstMsg->setFormValue($CurrentForm->getValue("x_isFirstMsg"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("isFirstMsg") !== NULL) {
					$this->isFirstMsg->setQueryStringValue(Get("isFirstMsg"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->isFirstMsg->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->isFirstMsg->CurrentValue = NULL;
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
					$this->terminate("lkp_isfirstmsglist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "lkp_isfirstmsglist.php")
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

		// Check field name 'isFirstMsg' first before field var 'x_isFirstMsg'
		$val = $CurrentForm->hasValue("isFirstMsg") ? $CurrentForm->getValue("isFirstMsg") : $CurrentForm->getValue("x_isFirstMsg");
		if (!$this->isFirstMsg->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->isFirstMsg->Visible = FALSE; // Disable update for API request
			else
				$this->isFirstMsg->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_isFirstMsg"))
			$this->isFirstMsg->setOldValue($CurrentForm->getValue("o_isFirstMsg"));

		// Check field name 'isFirstMsgName' first before field var 'x_isFirstMsgName'
		$val = $CurrentForm->hasValue("isFirstMsgName") ? $CurrentForm->getValue("isFirstMsgName") : $CurrentForm->getValue("x_isFirstMsgName");
		if (!$this->isFirstMsgName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->isFirstMsgName->Visible = FALSE; // Disable update for API request
			else
				$this->isFirstMsgName->setFormValue($val);
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
		$this->isFirstMsg->CurrentValue = $this->isFirstMsg->FormValue;
		$this->isFirstMsgName->CurrentValue = $this->isFirstMsgName->FormValue;
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
		$this->isFirstMsg->setDbValue($row['isFirstMsg']);
		$this->isFirstMsgName->setDbValue($row['isFirstMsgName']);
		$this->is_station_allowed->setDbValue($row['is_station_allowed']);
		$this->is_subdiv_allowed->setDbValue($row['is_subdiv_allowed']);
		$this->is_circle_allowed->setDbValue($row['is_circle_allowed']);
		$this->is_WRDO_allowed->setDbValue($row['is_WRDO_allowed']);
		$this->record_count->setDbValue($row['record_count']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['isFirstMsg'] = NULL;
		$row['isFirstMsgName'] = NULL;
		$row['is_station_allowed'] = NULL;
		$row['is_subdiv_allowed'] = NULL;
		$row['is_circle_allowed'] = NULL;
		$row['is_WRDO_allowed'] = NULL;
		$row['record_count'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("isFirstMsg")) != "")
			$this->isFirstMsg->OldValue = $this->getKey("isFirstMsg"); // isFirstMsg
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
		// isFirstMsg
		// isFirstMsgName
		// is_station_allowed
		// is_subdiv_allowed
		// is_circle_allowed
		// is_WRDO_allowed
		// record_count

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// isFirstMsg
			$this->isFirstMsg->ViewValue = $this->isFirstMsg->CurrentValue;
			$this->isFirstMsg->ViewValue = FormatNumber($this->isFirstMsg->ViewValue, 0, -2, -2, -2);
			$this->isFirstMsg->ViewCustomAttributes = "";

			// isFirstMsgName
			$this->isFirstMsgName->ViewValue = $this->isFirstMsgName->CurrentValue;
			$this->isFirstMsgName->ViewCustomAttributes = "";

			// is_station_allowed
			$this->is_station_allowed->ViewValue = $this->is_station_allowed->CurrentValue;
			$this->is_station_allowed->ViewCustomAttributes = "";

			// is_subdiv_allowed
			$this->is_subdiv_allowed->ViewValue = $this->is_subdiv_allowed->CurrentValue;
			$this->is_subdiv_allowed->ViewCustomAttributes = "";

			// is_circle_allowed
			$this->is_circle_allowed->ViewValue = $this->is_circle_allowed->CurrentValue;
			$this->is_circle_allowed->ViewCustomAttributes = "";

			// is_WRDO_allowed
			$this->is_WRDO_allowed->ViewValue = $this->is_WRDO_allowed->CurrentValue;
			$this->is_WRDO_allowed->ViewCustomAttributes = "";

			// record_count
			$this->record_count->ViewValue = $this->record_count->CurrentValue;
			$this->record_count->ViewValue = FormatNumber($this->record_count->ViewValue, 0, -2, -2, -2);
			$this->record_count->ViewCustomAttributes = "";

			// isFirstMsg
			$this->isFirstMsg->LinkCustomAttributes = "";
			$this->isFirstMsg->HrefValue = "";
			$this->isFirstMsg->TooltipValue = "";

			// isFirstMsgName
			$this->isFirstMsgName->LinkCustomAttributes = "";
			$this->isFirstMsgName->HrefValue = "";
			$this->isFirstMsgName->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// isFirstMsg
			$this->isFirstMsg->EditAttrs["class"] = "form-control";
			$this->isFirstMsg->EditCustomAttributes = "";
			$this->isFirstMsg->EditValue = HtmlEncode($this->isFirstMsg->CurrentValue);

			// isFirstMsgName
			$this->isFirstMsgName->EditAttrs["class"] = "form-control";
			$this->isFirstMsgName->EditCustomAttributes = "";
			if (!$this->isFirstMsgName->Raw)
				$this->isFirstMsgName->CurrentValue = HtmlDecode($this->isFirstMsgName->CurrentValue);
			$this->isFirstMsgName->EditValue = HtmlEncode($this->isFirstMsgName->CurrentValue);

			// is_station_allowed
			$this->is_station_allowed->EditAttrs["class"] = "form-control";
			$this->is_station_allowed->EditCustomAttributes = "";
			if (!$this->is_station_allowed->Raw)
				$this->is_station_allowed->CurrentValue = HtmlDecode($this->is_station_allowed->CurrentValue);
			$this->is_station_allowed->EditValue = HtmlEncode($this->is_station_allowed->CurrentValue);

			// is_subdiv_allowed
			$this->is_subdiv_allowed->EditAttrs["class"] = "form-control";
			$this->is_subdiv_allowed->EditCustomAttributes = "";
			if (!$this->is_subdiv_allowed->Raw)
				$this->is_subdiv_allowed->CurrentValue = HtmlDecode($this->is_subdiv_allowed->CurrentValue);
			$this->is_subdiv_allowed->EditValue = HtmlEncode($this->is_subdiv_allowed->CurrentValue);

			// is_circle_allowed
			$this->is_circle_allowed->EditAttrs["class"] = "form-control";
			$this->is_circle_allowed->EditCustomAttributes = "";
			if (!$this->is_circle_allowed->Raw)
				$this->is_circle_allowed->CurrentValue = HtmlDecode($this->is_circle_allowed->CurrentValue);
			$this->is_circle_allowed->EditValue = HtmlEncode($this->is_circle_allowed->CurrentValue);

			// is_WRDO_allowed
			$this->is_WRDO_allowed->EditAttrs["class"] = "form-control";
			$this->is_WRDO_allowed->EditCustomAttributes = "";
			if (!$this->is_WRDO_allowed->Raw)
				$this->is_WRDO_allowed->CurrentValue = HtmlDecode($this->is_WRDO_allowed->CurrentValue);
			$this->is_WRDO_allowed->EditValue = HtmlEncode($this->is_WRDO_allowed->CurrentValue);

			// record_count
			$this->record_count->EditAttrs["class"] = "form-control";
			$this->record_count->EditCustomAttributes = "";
			$this->record_count->EditValue = HtmlEncode($this->record_count->CurrentValue);

			// Edit refer script
			// isFirstMsg

			$this->isFirstMsg->LinkCustomAttributes = "";
			$this->isFirstMsg->HrefValue = "";

			// isFirstMsgName
			$this->isFirstMsgName->LinkCustomAttributes = "";
			$this->isFirstMsgName->HrefValue = "";

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
		if ($this->isFirstMsg->Required) {
			if (!$this->isFirstMsg->IsDetailKey && $this->isFirstMsg->FormValue != NULL && $this->isFirstMsg->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->isFirstMsg->caption(), $this->isFirstMsg->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->isFirstMsg->FormValue)) {
			AddMessage($FormError, $this->isFirstMsg->errorMessage());
		}
		if ($this->isFirstMsgName->Required) {
			if (!$this->isFirstMsgName->IsDetailKey && $this->isFirstMsgName->FormValue != NULL && $this->isFirstMsgName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->isFirstMsgName->caption(), $this->isFirstMsgName->RequiredErrorMessage));
			}
		}
		if ($this->is_station_allowed->Required) {
			if (!$this->is_station_allowed->IsDetailKey && $this->is_station_allowed->FormValue != NULL && $this->is_station_allowed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->is_station_allowed->caption(), $this->is_station_allowed->RequiredErrorMessage));
			}
		}
		if ($this->is_subdiv_allowed->Required) {
			if (!$this->is_subdiv_allowed->IsDetailKey && $this->is_subdiv_allowed->FormValue != NULL && $this->is_subdiv_allowed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->is_subdiv_allowed->caption(), $this->is_subdiv_allowed->RequiredErrorMessage));
			}
		}
		if ($this->is_circle_allowed->Required) {
			if (!$this->is_circle_allowed->IsDetailKey && $this->is_circle_allowed->FormValue != NULL && $this->is_circle_allowed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->is_circle_allowed->caption(), $this->is_circle_allowed->RequiredErrorMessage));
			}
		}
		if ($this->is_WRDO_allowed->Required) {
			if (!$this->is_WRDO_allowed->IsDetailKey && $this->is_WRDO_allowed->FormValue != NULL && $this->is_WRDO_allowed->FormValue == "") {
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

			// isFirstMsg
			$this->isFirstMsg->setDbValueDef($rsnew, $this->isFirstMsg->CurrentValue, 0, $this->isFirstMsg->ReadOnly);

			// isFirstMsgName
			$this->isFirstMsgName->setDbValueDef($rsnew, $this->isFirstMsgName->CurrentValue, NULL, $this->isFirstMsgName->ReadOnly);

			// is_station_allowed
			$this->is_station_allowed->setDbValueDef($rsnew, $this->is_station_allowed->CurrentValue, NULL, $this->is_station_allowed->ReadOnly);

			// is_subdiv_allowed
			$this->is_subdiv_allowed->setDbValueDef($rsnew, $this->is_subdiv_allowed->CurrentValue, NULL, $this->is_subdiv_allowed->ReadOnly);

			// is_circle_allowed
			$this->is_circle_allowed->setDbValueDef($rsnew, $this->is_circle_allowed->CurrentValue, NULL, $this->is_circle_allowed->ReadOnly);

			// is_WRDO_allowed
			$this->is_WRDO_allowed->setDbValueDef($rsnew, $this->is_WRDO_allowed->CurrentValue, NULL, $this->is_WRDO_allowed->ReadOnly);

			// record_count
			$this->record_count->setDbValueDef($rsnew, $this->record_count->CurrentValue, NULL, $this->record_count->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lkp_isfirstmsglist.php"), "", $this->TableVar, TRUE);
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