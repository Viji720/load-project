<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class master_dams_add extends master_dams
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'master_dams';

	// Page object name
	public $PageObjName = "master_dams_add";

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

		// Table object (master_dams)
		if (!isset($GLOBALS["master_dams"]) || get_class($GLOBALS["master_dams"]) == PROJECT_NAMESPACE . "master_dams") {
			$GLOBALS["master_dams"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["master_dams"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'master_dams');

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
		global $master_dams;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($master_dams);
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
					if ($pageName == "master_damsview.php")
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
			$key .= @$ar['PIC'];
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
					$this->terminate(GetUrl("master_damslist.php"));
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
		$this->SrNo->setVisibility();
		$this->PIC->setVisibility();
		$this->kpcl_ID->setVisibility();
		$this->Name_of_Dam->setVisibility();
		$this->kpcl_dam_name->setVisibility();
		$this->Ops_ID->setVisibility();
		$this->dam_size_type_ID->setVisibility();
		$this->dam_Longitude->setVisibility();
		$this->dam_Latitude->setVisibility();
		$this->Year_of_Completion->setVisibility();
		$this->Basin->setVisibility();
		$this->Sub_Basin->setVisibility();
		$this->district->setVisibility();
		$this->Taluka->setVisibility();
		$this->River->setVisibility();
		$this->Neareast_City->setVisibility();
		$this->dam_construction_type->setVisibility();
		$this->Height_above_Lowest_Foundation_Level_in_mtr->setVisibility();
		$this->Length_of_Dam_in_mtr->setVisibility();
		$this->Volume_Content_of_Dam_in_MCM->setVisibility();
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->setVisibility();
		$this->Reservoir_Area_in_sq_km->setVisibility();
		$this->Effective_Storage_Capacity_in_MCM->setVisibility();
		$this->Purpose->setVisibility();
		$this->Designed_Spillway_Capacity_in_M3_per_sec->setVisibility();
		$this->dam_construction_type_ID->setVisibility();
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
			$this->terminate("master_damslist.php");
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
			if (Get("PIC") !== NULL) {
				$this->PIC->setQueryStringValue(Get("PIC"));
				$this->setKey("PIC", $this->PIC->CurrentValue); // Set up key
			} else {
				$this->setKey("PIC", ""); // Clear key
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
					$this->terminate("master_damslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "master_damslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "master_damsview.php")
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
		$this->SrNo->CurrentValue = NULL;
		$this->SrNo->OldValue = $this->SrNo->CurrentValue;
		$this->PIC->CurrentValue = NULL;
		$this->PIC->OldValue = $this->PIC->CurrentValue;
		$this->kpcl_ID->CurrentValue = NULL;
		$this->kpcl_ID->OldValue = $this->kpcl_ID->CurrentValue;
		$this->Name_of_Dam->CurrentValue = NULL;
		$this->Name_of_Dam->OldValue = $this->Name_of_Dam->CurrentValue;
		$this->kpcl_dam_name->CurrentValue = NULL;
		$this->kpcl_dam_name->OldValue = $this->kpcl_dam_name->CurrentValue;
		$this->Ops_ID->CurrentValue = NULL;
		$this->Ops_ID->OldValue = $this->Ops_ID->CurrentValue;
		$this->dam_size_type_ID->CurrentValue = NULL;
		$this->dam_size_type_ID->OldValue = $this->dam_size_type_ID->CurrentValue;
		$this->dam_Longitude->CurrentValue = NULL;
		$this->dam_Longitude->OldValue = $this->dam_Longitude->CurrentValue;
		$this->dam_Latitude->CurrentValue = NULL;
		$this->dam_Latitude->OldValue = $this->dam_Latitude->CurrentValue;
		$this->Year_of_Completion->CurrentValue = NULL;
		$this->Year_of_Completion->OldValue = $this->Year_of_Completion->CurrentValue;
		$this->Basin->CurrentValue = NULL;
		$this->Basin->OldValue = $this->Basin->CurrentValue;
		$this->Sub_Basin->CurrentValue = NULL;
		$this->Sub_Basin->OldValue = $this->Sub_Basin->CurrentValue;
		$this->district->CurrentValue = NULL;
		$this->district->OldValue = $this->district->CurrentValue;
		$this->Taluka->CurrentValue = NULL;
		$this->Taluka->OldValue = $this->Taluka->CurrentValue;
		$this->River->CurrentValue = NULL;
		$this->River->OldValue = $this->River->CurrentValue;
		$this->Neareast_City->CurrentValue = NULL;
		$this->Neareast_City->OldValue = $this->Neareast_City->CurrentValue;
		$this->dam_construction_type->CurrentValue = NULL;
		$this->dam_construction_type->OldValue = $this->dam_construction_type->CurrentValue;
		$this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue = NULL;
		$this->Height_above_Lowest_Foundation_Level_in_mtr->OldValue = $this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue;
		$this->Length_of_Dam_in_mtr->CurrentValue = NULL;
		$this->Length_of_Dam_in_mtr->OldValue = $this->Length_of_Dam_in_mtr->CurrentValue;
		$this->Volume_Content_of_Dam_in_MCM->CurrentValue = NULL;
		$this->Volume_Content_of_Dam_in_MCM->OldValue = $this->Volume_Content_of_Dam_in_MCM->CurrentValue;
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue = NULL;
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->OldValue = $this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue;
		$this->Reservoir_Area_in_sq_km->CurrentValue = NULL;
		$this->Reservoir_Area_in_sq_km->OldValue = $this->Reservoir_Area_in_sq_km->CurrentValue;
		$this->Effective_Storage_Capacity_in_MCM->CurrentValue = NULL;
		$this->Effective_Storage_Capacity_in_MCM->OldValue = $this->Effective_Storage_Capacity_in_MCM->CurrentValue;
		$this->Purpose->CurrentValue = NULL;
		$this->Purpose->OldValue = $this->Purpose->CurrentValue;
		$this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue = NULL;
		$this->Designed_Spillway_Capacity_in_M3_per_sec->OldValue = $this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue;
		$this->dam_construction_type_ID->CurrentValue = NULL;
		$this->dam_construction_type_ID->OldValue = $this->dam_construction_type_ID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'SrNo' first before field var 'x_SrNo'
		$val = $CurrentForm->hasValue("SrNo") ? $CurrentForm->getValue("SrNo") : $CurrentForm->getValue("x_SrNo");
		if (!$this->SrNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SrNo->Visible = FALSE; // Disable update for API request
			else
				$this->SrNo->setFormValue($val);
		}

		// Check field name 'PIC' first before field var 'x_PIC'
		$val = $CurrentForm->hasValue("PIC") ? $CurrentForm->getValue("PIC") : $CurrentForm->getValue("x_PIC");
		if (!$this->PIC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PIC->Visible = FALSE; // Disable update for API request
			else
				$this->PIC->setFormValue($val);
		}

		// Check field name 'kpcl_ID' first before field var 'x_kpcl_ID'
		$val = $CurrentForm->hasValue("kpcl_ID") ? $CurrentForm->getValue("kpcl_ID") : $CurrentForm->getValue("x_kpcl_ID");
		if (!$this->kpcl_ID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->kpcl_ID->Visible = FALSE; // Disable update for API request
			else
				$this->kpcl_ID->setFormValue($val);
		}

		// Check field name 'Name_of_Dam' first before field var 'x_Name_of_Dam'
		$val = $CurrentForm->hasValue("Name_of_Dam") ? $CurrentForm->getValue("Name_of_Dam") : $CurrentForm->getValue("x_Name_of_Dam");
		if (!$this->Name_of_Dam->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Name_of_Dam->Visible = FALSE; // Disable update for API request
			else
				$this->Name_of_Dam->setFormValue($val);
		}

		// Check field name 'kpcl_dam_name' first before field var 'x_kpcl_dam_name'
		$val = $CurrentForm->hasValue("kpcl_dam_name") ? $CurrentForm->getValue("kpcl_dam_name") : $CurrentForm->getValue("x_kpcl_dam_name");
		if (!$this->kpcl_dam_name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->kpcl_dam_name->Visible = FALSE; // Disable update for API request
			else
				$this->kpcl_dam_name->setFormValue($val);
		}

		// Check field name 'Ops_ID' first before field var 'x_Ops_ID'
		$val = $CurrentForm->hasValue("Ops_ID") ? $CurrentForm->getValue("Ops_ID") : $CurrentForm->getValue("x_Ops_ID");
		if (!$this->Ops_ID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Ops_ID->Visible = FALSE; // Disable update for API request
			else
				$this->Ops_ID->setFormValue($val);
		}

		// Check field name 'dam_size_type_ID' first before field var 'x_dam_size_type_ID'
		$val = $CurrentForm->hasValue("dam_size_type_ID") ? $CurrentForm->getValue("dam_size_type_ID") : $CurrentForm->getValue("x_dam_size_type_ID");
		if (!$this->dam_size_type_ID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dam_size_type_ID->Visible = FALSE; // Disable update for API request
			else
				$this->dam_size_type_ID->setFormValue($val);
		}

		// Check field name 'dam_Longitude' first before field var 'x_dam_Longitude'
		$val = $CurrentForm->hasValue("dam_Longitude") ? $CurrentForm->getValue("dam_Longitude") : $CurrentForm->getValue("x_dam_Longitude");
		if (!$this->dam_Longitude->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dam_Longitude->Visible = FALSE; // Disable update for API request
			else
				$this->dam_Longitude->setFormValue($val);
		}

		// Check field name 'dam_Latitude' first before field var 'x_dam_Latitude'
		$val = $CurrentForm->hasValue("dam_Latitude") ? $CurrentForm->getValue("dam_Latitude") : $CurrentForm->getValue("x_dam_Latitude");
		if (!$this->dam_Latitude->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dam_Latitude->Visible = FALSE; // Disable update for API request
			else
				$this->dam_Latitude->setFormValue($val);
		}

		// Check field name 'Year_of_Completion' first before field var 'x_Year_of_Completion'
		$val = $CurrentForm->hasValue("Year_of_Completion") ? $CurrentForm->getValue("Year_of_Completion") : $CurrentForm->getValue("x_Year_of_Completion");
		if (!$this->Year_of_Completion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Year_of_Completion->Visible = FALSE; // Disable update for API request
			else
				$this->Year_of_Completion->setFormValue($val);
		}

		// Check field name 'Basin' first before field var 'x_Basin'
		$val = $CurrentForm->hasValue("Basin") ? $CurrentForm->getValue("Basin") : $CurrentForm->getValue("x_Basin");
		if (!$this->Basin->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Basin->Visible = FALSE; // Disable update for API request
			else
				$this->Basin->setFormValue($val);
		}

		// Check field name 'Sub-Basin' first before field var 'x_Sub_Basin'
		$val = $CurrentForm->hasValue("Sub-Basin") ? $CurrentForm->getValue("Sub-Basin") : $CurrentForm->getValue("x_Sub_Basin");
		if (!$this->Sub_Basin->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Sub_Basin->Visible = FALSE; // Disable update for API request
			else
				$this->Sub_Basin->setFormValue($val);
		}

		// Check field name 'district' first before field var 'x_district'
		$val = $CurrentForm->hasValue("district") ? $CurrentForm->getValue("district") : $CurrentForm->getValue("x_district");
		if (!$this->district->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->district->Visible = FALSE; // Disable update for API request
			else
				$this->district->setFormValue($val);
		}

		// Check field name 'Taluka' first before field var 'x_Taluka'
		$val = $CurrentForm->hasValue("Taluka") ? $CurrentForm->getValue("Taluka") : $CurrentForm->getValue("x_Taluka");
		if (!$this->Taluka->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Taluka->Visible = FALSE; // Disable update for API request
			else
				$this->Taluka->setFormValue($val);
		}

		// Check field name 'River' first before field var 'x_River'
		$val = $CurrentForm->hasValue("River") ? $CurrentForm->getValue("River") : $CurrentForm->getValue("x_River");
		if (!$this->River->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->River->Visible = FALSE; // Disable update for API request
			else
				$this->River->setFormValue($val);
		}

		// Check field name 'Neareast_City' first before field var 'x_Neareast_City'
		$val = $CurrentForm->hasValue("Neareast_City") ? $CurrentForm->getValue("Neareast_City") : $CurrentForm->getValue("x_Neareast_City");
		if (!$this->Neareast_City->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Neareast_City->Visible = FALSE; // Disable update for API request
			else
				$this->Neareast_City->setFormValue($val);
		}

		// Check field name 'dam_construction_type' first before field var 'x_dam_construction_type'
		$val = $CurrentForm->hasValue("dam_construction_type") ? $CurrentForm->getValue("dam_construction_type") : $CurrentForm->getValue("x_dam_construction_type");
		if (!$this->dam_construction_type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dam_construction_type->Visible = FALSE; // Disable update for API request
			else
				$this->dam_construction_type->setFormValue($val);
		}

		// Check field name 'Height_above_Lowest_Foundation_Level_in_mtr' first before field var 'x_Height_above_Lowest_Foundation_Level_in_mtr'
		$val = $CurrentForm->hasValue("Height_above_Lowest_Foundation_Level_in_mtr") ? $CurrentForm->getValue("Height_above_Lowest_Foundation_Level_in_mtr") : $CurrentForm->getValue("x_Height_above_Lowest_Foundation_Level_in_mtr");
		if (!$this->Height_above_Lowest_Foundation_Level_in_mtr->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Height_above_Lowest_Foundation_Level_in_mtr->Visible = FALSE; // Disable update for API request
			else
				$this->Height_above_Lowest_Foundation_Level_in_mtr->setFormValue($val);
		}

		// Check field name 'Length_of_Dam_in_mtr' first before field var 'x_Length_of_Dam_in_mtr'
		$val = $CurrentForm->hasValue("Length_of_Dam_in_mtr") ? $CurrentForm->getValue("Length_of_Dam_in_mtr") : $CurrentForm->getValue("x_Length_of_Dam_in_mtr");
		if (!$this->Length_of_Dam_in_mtr->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Length_of_Dam_in_mtr->Visible = FALSE; // Disable update for API request
			else
				$this->Length_of_Dam_in_mtr->setFormValue($val);
		}

		// Check field name 'Volume_Content_of_Dam_in_MCM' first before field var 'x_Volume_Content_of_Dam_in_MCM'
		$val = $CurrentForm->hasValue("Volume_Content_of_Dam_in_MCM") ? $CurrentForm->getValue("Volume_Content_of_Dam_in_MCM") : $CurrentForm->getValue("x_Volume_Content_of_Dam_in_MCM");
		if (!$this->Volume_Content_of_Dam_in_MCM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Volume_Content_of_Dam_in_MCM->Visible = FALSE; // Disable update for API request
			else
				$this->Volume_Content_of_Dam_in_MCM->setFormValue($val);
		}

		// Check field name 'Gross_Storage_Capacity_of_Dam_in_MCM' first before field var 'x_Gross_Storage_Capacity_of_Dam_in_MCM'
		$val = $CurrentForm->hasValue("Gross_Storage_Capacity_of_Dam_in_MCM") ? $CurrentForm->getValue("Gross_Storage_Capacity_of_Dam_in_MCM") : $CurrentForm->getValue("x_Gross_Storage_Capacity_of_Dam_in_MCM");
		if (!$this->Gross_Storage_Capacity_of_Dam_in_MCM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Gross_Storage_Capacity_of_Dam_in_MCM->Visible = FALSE; // Disable update for API request
			else
				$this->Gross_Storage_Capacity_of_Dam_in_MCM->setFormValue($val);
		}

		// Check field name 'Reservoir_Area_in_sq_km' first before field var 'x_Reservoir_Area_in_sq_km'
		$val = $CurrentForm->hasValue("Reservoir_Area_in_sq_km") ? $CurrentForm->getValue("Reservoir_Area_in_sq_km") : $CurrentForm->getValue("x_Reservoir_Area_in_sq_km");
		if (!$this->Reservoir_Area_in_sq_km->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Reservoir_Area_in_sq_km->Visible = FALSE; // Disable update for API request
			else
				$this->Reservoir_Area_in_sq_km->setFormValue($val);
		}

		// Check field name 'Effective_Storage_Capacity_in_MCM' first before field var 'x_Effective_Storage_Capacity_in_MCM'
		$val = $CurrentForm->hasValue("Effective_Storage_Capacity_in_MCM") ? $CurrentForm->getValue("Effective_Storage_Capacity_in_MCM") : $CurrentForm->getValue("x_Effective_Storage_Capacity_in_MCM");
		if (!$this->Effective_Storage_Capacity_in_MCM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Effective_Storage_Capacity_in_MCM->Visible = FALSE; // Disable update for API request
			else
				$this->Effective_Storage_Capacity_in_MCM->setFormValue($val);
		}

		// Check field name 'Purpose' first before field var 'x_Purpose'
		$val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
		if (!$this->Purpose->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Purpose->Visible = FALSE; // Disable update for API request
			else
				$this->Purpose->setFormValue($val);
		}

		// Check field name 'Designed_Spillway_Capacity_in_M3_per_sec' first before field var 'x_Designed_Spillway_Capacity_in_M3_per_sec'
		$val = $CurrentForm->hasValue("Designed_Spillway_Capacity_in_M3_per_sec") ? $CurrentForm->getValue("Designed_Spillway_Capacity_in_M3_per_sec") : $CurrentForm->getValue("x_Designed_Spillway_Capacity_in_M3_per_sec");
		if (!$this->Designed_Spillway_Capacity_in_M3_per_sec->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Designed_Spillway_Capacity_in_M3_per_sec->Visible = FALSE; // Disable update for API request
			else
				$this->Designed_Spillway_Capacity_in_M3_per_sec->setFormValue($val);
		}

		// Check field name 'dam_construction_type_ID' first before field var 'x_dam_construction_type_ID'
		$val = $CurrentForm->hasValue("dam_construction_type_ID") ? $CurrentForm->getValue("dam_construction_type_ID") : $CurrentForm->getValue("x_dam_construction_type_ID");
		if (!$this->dam_construction_type_ID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dam_construction_type_ID->Visible = FALSE; // Disable update for API request
			else
				$this->dam_construction_type_ID->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->SrNo->CurrentValue = $this->SrNo->FormValue;
		$this->PIC->CurrentValue = $this->PIC->FormValue;
		$this->kpcl_ID->CurrentValue = $this->kpcl_ID->FormValue;
		$this->Name_of_Dam->CurrentValue = $this->Name_of_Dam->FormValue;
		$this->kpcl_dam_name->CurrentValue = $this->kpcl_dam_name->FormValue;
		$this->Ops_ID->CurrentValue = $this->Ops_ID->FormValue;
		$this->dam_size_type_ID->CurrentValue = $this->dam_size_type_ID->FormValue;
		$this->dam_Longitude->CurrentValue = $this->dam_Longitude->FormValue;
		$this->dam_Latitude->CurrentValue = $this->dam_Latitude->FormValue;
		$this->Year_of_Completion->CurrentValue = $this->Year_of_Completion->FormValue;
		$this->Basin->CurrentValue = $this->Basin->FormValue;
		$this->Sub_Basin->CurrentValue = $this->Sub_Basin->FormValue;
		$this->district->CurrentValue = $this->district->FormValue;
		$this->Taluka->CurrentValue = $this->Taluka->FormValue;
		$this->River->CurrentValue = $this->River->FormValue;
		$this->Neareast_City->CurrentValue = $this->Neareast_City->FormValue;
		$this->dam_construction_type->CurrentValue = $this->dam_construction_type->FormValue;
		$this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue = $this->Height_above_Lowest_Foundation_Level_in_mtr->FormValue;
		$this->Length_of_Dam_in_mtr->CurrentValue = $this->Length_of_Dam_in_mtr->FormValue;
		$this->Volume_Content_of_Dam_in_MCM->CurrentValue = $this->Volume_Content_of_Dam_in_MCM->FormValue;
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue = $this->Gross_Storage_Capacity_of_Dam_in_MCM->FormValue;
		$this->Reservoir_Area_in_sq_km->CurrentValue = $this->Reservoir_Area_in_sq_km->FormValue;
		$this->Effective_Storage_Capacity_in_MCM->CurrentValue = $this->Effective_Storage_Capacity_in_MCM->FormValue;
		$this->Purpose->CurrentValue = $this->Purpose->FormValue;
		$this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue = $this->Designed_Spillway_Capacity_in_M3_per_sec->FormValue;
		$this->dam_construction_type_ID->CurrentValue = $this->dam_construction_type_ID->FormValue;
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
		$this->SrNo->setDbValue($row['SrNo']);
		$this->PIC->setDbValue($row['PIC']);
		$this->kpcl_ID->setDbValue($row['kpcl_ID']);
		$this->Name_of_Dam->setDbValue($row['Name_of_Dam']);
		$this->kpcl_dam_name->setDbValue($row['kpcl_dam_name']);
		$this->Ops_ID->setDbValue($row['Ops_ID']);
		$this->dam_size_type_ID->setDbValue($row['dam_size_type_ID']);
		$this->dam_Longitude->setDbValue($row['dam_Longitude']);
		$this->dam_Latitude->setDbValue($row['dam_Latitude']);
		$this->Year_of_Completion->setDbValue($row['Year_of_Completion']);
		$this->Basin->setDbValue($row['Basin']);
		$this->Sub_Basin->setDbValue($row['Sub-Basin']);
		$this->district->setDbValue($row['district']);
		$this->Taluka->setDbValue($row['Taluka']);
		$this->River->setDbValue($row['River']);
		$this->Neareast_City->setDbValue($row['Neareast_City']);
		$this->dam_construction_type->setDbValue($row['dam_construction_type']);
		$this->Height_above_Lowest_Foundation_Level_in_mtr->setDbValue($row['Height_above_Lowest_Foundation_Level_in_mtr']);
		$this->Length_of_Dam_in_mtr->setDbValue($row['Length_of_Dam_in_mtr']);
		$this->Volume_Content_of_Dam_in_MCM->setDbValue($row['Volume_Content_of_Dam_in_MCM']);
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->setDbValue($row['Gross_Storage_Capacity_of_Dam_in_MCM']);
		$this->Reservoir_Area_in_sq_km->setDbValue($row['Reservoir_Area_in_sq_km']);
		$this->Effective_Storage_Capacity_in_MCM->setDbValue($row['Effective_Storage_Capacity_in_MCM']);
		$this->Purpose->setDbValue($row['Purpose']);
		$this->Designed_Spillway_Capacity_in_M3_per_sec->setDbValue($row['Designed_Spillway_Capacity_in_M3_per_sec']);
		$this->dam_construction_type_ID->setDbValue($row['dam_construction_type_ID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['SrNo'] = $this->SrNo->CurrentValue;
		$row['PIC'] = $this->PIC->CurrentValue;
		$row['kpcl_ID'] = $this->kpcl_ID->CurrentValue;
		$row['Name_of_Dam'] = $this->Name_of_Dam->CurrentValue;
		$row['kpcl_dam_name'] = $this->kpcl_dam_name->CurrentValue;
		$row['Ops_ID'] = $this->Ops_ID->CurrentValue;
		$row['dam_size_type_ID'] = $this->dam_size_type_ID->CurrentValue;
		$row['dam_Longitude'] = $this->dam_Longitude->CurrentValue;
		$row['dam_Latitude'] = $this->dam_Latitude->CurrentValue;
		$row['Year_of_Completion'] = $this->Year_of_Completion->CurrentValue;
		$row['Basin'] = $this->Basin->CurrentValue;
		$row['Sub-Basin'] = $this->Sub_Basin->CurrentValue;
		$row['district'] = $this->district->CurrentValue;
		$row['Taluka'] = $this->Taluka->CurrentValue;
		$row['River'] = $this->River->CurrentValue;
		$row['Neareast_City'] = $this->Neareast_City->CurrentValue;
		$row['dam_construction_type'] = $this->dam_construction_type->CurrentValue;
		$row['Height_above_Lowest_Foundation_Level_in_mtr'] = $this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue;
		$row['Length_of_Dam_in_mtr'] = $this->Length_of_Dam_in_mtr->CurrentValue;
		$row['Volume_Content_of_Dam_in_MCM'] = $this->Volume_Content_of_Dam_in_MCM->CurrentValue;
		$row['Gross_Storage_Capacity_of_Dam_in_MCM'] = $this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue;
		$row['Reservoir_Area_in_sq_km'] = $this->Reservoir_Area_in_sq_km->CurrentValue;
		$row['Effective_Storage_Capacity_in_MCM'] = $this->Effective_Storage_Capacity_in_MCM->CurrentValue;
		$row['Purpose'] = $this->Purpose->CurrentValue;
		$row['Designed_Spillway_Capacity_in_M3_per_sec'] = $this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue;
		$row['dam_construction_type_ID'] = $this->dam_construction_type_ID->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("PIC")) != "")
			$this->PIC->OldValue = $this->getKey("PIC"); // PIC
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

		if ($this->dam_Longitude->FormValue == $this->dam_Longitude->CurrentValue && is_numeric(ConvertToFloatString($this->dam_Longitude->CurrentValue)))
			$this->dam_Longitude->CurrentValue = ConvertToFloatString($this->dam_Longitude->CurrentValue);

		// Convert decimal values if posted back
		if ($this->dam_Latitude->FormValue == $this->dam_Latitude->CurrentValue && is_numeric(ConvertToFloatString($this->dam_Latitude->CurrentValue)))
			$this->dam_Latitude->CurrentValue = ConvertToFloatString($this->dam_Latitude->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Height_above_Lowest_Foundation_Level_in_mtr->FormValue == $this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue && is_numeric(ConvertToFloatString($this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue)))
			$this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue = ConvertToFloatString($this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Length_of_Dam_in_mtr->FormValue == $this->Length_of_Dam_in_mtr->CurrentValue && is_numeric(ConvertToFloatString($this->Length_of_Dam_in_mtr->CurrentValue)))
			$this->Length_of_Dam_in_mtr->CurrentValue = ConvertToFloatString($this->Length_of_Dam_in_mtr->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Volume_Content_of_Dam_in_MCM->FormValue == $this->Volume_Content_of_Dam_in_MCM->CurrentValue && is_numeric(ConvertToFloatString($this->Volume_Content_of_Dam_in_MCM->CurrentValue)))
			$this->Volume_Content_of_Dam_in_MCM->CurrentValue = ConvertToFloatString($this->Volume_Content_of_Dam_in_MCM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Gross_Storage_Capacity_of_Dam_in_MCM->FormValue == $this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue && is_numeric(ConvertToFloatString($this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue)))
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue = ConvertToFloatString($this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Reservoir_Area_in_sq_km->FormValue == $this->Reservoir_Area_in_sq_km->CurrentValue && is_numeric(ConvertToFloatString($this->Reservoir_Area_in_sq_km->CurrentValue)))
			$this->Reservoir_Area_in_sq_km->CurrentValue = ConvertToFloatString($this->Reservoir_Area_in_sq_km->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Effective_Storage_Capacity_in_MCM->FormValue == $this->Effective_Storage_Capacity_in_MCM->CurrentValue && is_numeric(ConvertToFloatString($this->Effective_Storage_Capacity_in_MCM->CurrentValue)))
			$this->Effective_Storage_Capacity_in_MCM->CurrentValue = ConvertToFloatString($this->Effective_Storage_Capacity_in_MCM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Designed_Spillway_Capacity_in_M3_per_sec->FormValue == $this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue && is_numeric(ConvertToFloatString($this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue)))
			$this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue = ConvertToFloatString($this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// SrNo
		// PIC
		// kpcl_ID
		// Name_of_Dam
		// kpcl_dam_name
		// Ops_ID
		// dam_size_type_ID
		// dam_Longitude
		// dam_Latitude
		// Year_of_Completion
		// Basin
		// Sub-Basin
		// district
		// Taluka
		// River
		// Neareast_City
		// dam_construction_type
		// Height_above_Lowest_Foundation_Level_in_mtr
		// Length_of_Dam_in_mtr
		// Volume_Content_of_Dam_in_MCM
		// Gross_Storage_Capacity_of_Dam_in_MCM
		// Reservoir_Area_in_sq_km
		// Effective_Storage_Capacity_in_MCM
		// Purpose
		// Designed_Spillway_Capacity_in_M3_per_sec
		// dam_construction_type_ID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// SrNo
			$this->SrNo->ViewValue = $this->SrNo->CurrentValue;
			$this->SrNo->ViewValue = FormatNumber($this->SrNo->ViewValue, 0, -2, -2, -2);
			$this->SrNo->ViewCustomAttributes = "";

			// PIC
			$this->PIC->ViewValue = $this->PIC->CurrentValue;
			$this->PIC->ViewCustomAttributes = "";

			// kpcl_ID
			$this->kpcl_ID->ViewValue = $this->kpcl_ID->CurrentValue;
			$this->kpcl_ID->ViewCustomAttributes = "";

			// Name_of_Dam
			$this->Name_of_Dam->ViewValue = $this->Name_of_Dam->CurrentValue;
			$this->Name_of_Dam->ViewCustomAttributes = "";

			// kpcl_dam_name
			$this->kpcl_dam_name->ViewValue = $this->kpcl_dam_name->CurrentValue;
			$this->kpcl_dam_name->ViewCustomAttributes = "";

			// Ops_ID
			$this->Ops_ID->ViewValue = $this->Ops_ID->CurrentValue;
			$this->Ops_ID->ViewCustomAttributes = "";

			// dam_size_type_ID
			$this->dam_size_type_ID->ViewValue = $this->dam_size_type_ID->CurrentValue;
			$this->dam_size_type_ID->ViewCustomAttributes = "";

			// dam_Longitude
			$this->dam_Longitude->ViewValue = $this->dam_Longitude->CurrentValue;
			$this->dam_Longitude->ViewValue = FormatNumber($this->dam_Longitude->ViewValue, 2, -2, -2, -2);
			$this->dam_Longitude->ViewCustomAttributes = "";

			// dam_Latitude
			$this->dam_Latitude->ViewValue = $this->dam_Latitude->CurrentValue;
			$this->dam_Latitude->ViewValue = FormatNumber($this->dam_Latitude->ViewValue, 2, -2, -2, -2);
			$this->dam_Latitude->ViewCustomAttributes = "";

			// Year_of_Completion
			$this->Year_of_Completion->ViewValue = $this->Year_of_Completion->CurrentValue;
			$this->Year_of_Completion->ViewCustomAttributes = "";

			// Basin
			$this->Basin->ViewValue = $this->Basin->CurrentValue;
			$this->Basin->ViewCustomAttributes = "";

			// Sub-Basin
			$this->Sub_Basin->ViewValue = $this->Sub_Basin->CurrentValue;
			$this->Sub_Basin->ViewCustomAttributes = "";

			// district
			$this->district->ViewValue = $this->district->CurrentValue;
			$this->district->ViewCustomAttributes = "";

			// Taluka
			$this->Taluka->ViewValue = $this->Taluka->CurrentValue;
			$this->Taluka->ViewCustomAttributes = "";

			// River
			$this->River->ViewValue = $this->River->CurrentValue;
			$this->River->ViewCustomAttributes = "";

			// Neareast_City
			$this->Neareast_City->ViewValue = $this->Neareast_City->CurrentValue;
			$this->Neareast_City->ViewCustomAttributes = "";

			// dam_construction_type
			$this->dam_construction_type->ViewValue = $this->dam_construction_type->CurrentValue;
			$this->dam_construction_type->ViewCustomAttributes = "";

			// Height_above_Lowest_Foundation_Level_in_mtr
			$this->Height_above_Lowest_Foundation_Level_in_mtr->ViewValue = $this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue;
			$this->Height_above_Lowest_Foundation_Level_in_mtr->ViewValue = FormatNumber($this->Height_above_Lowest_Foundation_Level_in_mtr->ViewValue, 2, -2, -2, -2);
			$this->Height_above_Lowest_Foundation_Level_in_mtr->ViewCustomAttributes = "";

			// Length_of_Dam_in_mtr
			$this->Length_of_Dam_in_mtr->ViewValue = $this->Length_of_Dam_in_mtr->CurrentValue;
			$this->Length_of_Dam_in_mtr->ViewValue = FormatNumber($this->Length_of_Dam_in_mtr->ViewValue, 2, -2, -2, -2);
			$this->Length_of_Dam_in_mtr->ViewCustomAttributes = "";

			// Volume_Content_of_Dam_in_MCM
			$this->Volume_Content_of_Dam_in_MCM->ViewValue = $this->Volume_Content_of_Dam_in_MCM->CurrentValue;
			$this->Volume_Content_of_Dam_in_MCM->ViewValue = FormatNumber($this->Volume_Content_of_Dam_in_MCM->ViewValue, 2, -2, -2, -2);
			$this->Volume_Content_of_Dam_in_MCM->ViewCustomAttributes = "";

			// Gross_Storage_Capacity_of_Dam_in_MCM
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->ViewValue = $this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue;
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->ViewValue = FormatNumber($this->Gross_Storage_Capacity_of_Dam_in_MCM->ViewValue, 2, -2, -2, -2);
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->ViewCustomAttributes = "";

			// Reservoir_Area_in_sq_km
			$this->Reservoir_Area_in_sq_km->ViewValue = $this->Reservoir_Area_in_sq_km->CurrentValue;
			$this->Reservoir_Area_in_sq_km->ViewValue = FormatNumber($this->Reservoir_Area_in_sq_km->ViewValue, 2, -2, -2, -2);
			$this->Reservoir_Area_in_sq_km->ViewCustomAttributes = "";

			// Effective_Storage_Capacity_in_MCM
			$this->Effective_Storage_Capacity_in_MCM->ViewValue = $this->Effective_Storage_Capacity_in_MCM->CurrentValue;
			$this->Effective_Storage_Capacity_in_MCM->ViewValue = FormatNumber($this->Effective_Storage_Capacity_in_MCM->ViewValue, 2, -2, -2, -2);
			$this->Effective_Storage_Capacity_in_MCM->ViewCustomAttributes = "";

			// Purpose
			$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
			$this->Purpose->ViewCustomAttributes = "";

			// Designed_Spillway_Capacity_in_M3_per_sec
			$this->Designed_Spillway_Capacity_in_M3_per_sec->ViewValue = $this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue;
			$this->Designed_Spillway_Capacity_in_M3_per_sec->ViewValue = FormatNumber($this->Designed_Spillway_Capacity_in_M3_per_sec->ViewValue, 2, -2, -2, -2);
			$this->Designed_Spillway_Capacity_in_M3_per_sec->ViewCustomAttributes = "";

			// dam_construction_type_ID
			$this->dam_construction_type_ID->ViewValue = $this->dam_construction_type_ID->CurrentValue;
			$this->dam_construction_type_ID->ViewCustomAttributes = "";

			// SrNo
			$this->SrNo->LinkCustomAttributes = "";
			$this->SrNo->HrefValue = "";
			$this->SrNo->TooltipValue = "";

			// PIC
			$this->PIC->LinkCustomAttributes = "";
			$this->PIC->HrefValue = "";
			$this->PIC->TooltipValue = "";

			// kpcl_ID
			$this->kpcl_ID->LinkCustomAttributes = "";
			$this->kpcl_ID->HrefValue = "";
			$this->kpcl_ID->TooltipValue = "";

			// Name_of_Dam
			$this->Name_of_Dam->LinkCustomAttributes = "";
			$this->Name_of_Dam->HrefValue = "";
			$this->Name_of_Dam->TooltipValue = "";

			// kpcl_dam_name
			$this->kpcl_dam_name->LinkCustomAttributes = "";
			$this->kpcl_dam_name->HrefValue = "";
			$this->kpcl_dam_name->TooltipValue = "";

			// Ops_ID
			$this->Ops_ID->LinkCustomAttributes = "";
			$this->Ops_ID->HrefValue = "";
			$this->Ops_ID->TooltipValue = "";

			// dam_size_type_ID
			$this->dam_size_type_ID->LinkCustomAttributes = "";
			$this->dam_size_type_ID->HrefValue = "";
			$this->dam_size_type_ID->TooltipValue = "";

			// dam_Longitude
			$this->dam_Longitude->LinkCustomAttributes = "";
			$this->dam_Longitude->HrefValue = "";
			$this->dam_Longitude->TooltipValue = "";

			// dam_Latitude
			$this->dam_Latitude->LinkCustomAttributes = "";
			$this->dam_Latitude->HrefValue = "";
			$this->dam_Latitude->TooltipValue = "";

			// Year_of_Completion
			$this->Year_of_Completion->LinkCustomAttributes = "";
			$this->Year_of_Completion->HrefValue = "";
			$this->Year_of_Completion->TooltipValue = "";

			// Basin
			$this->Basin->LinkCustomAttributes = "";
			$this->Basin->HrefValue = "";
			$this->Basin->TooltipValue = "";

			// Sub-Basin
			$this->Sub_Basin->LinkCustomAttributes = "";
			$this->Sub_Basin->HrefValue = "";
			$this->Sub_Basin->TooltipValue = "";

			// district
			$this->district->LinkCustomAttributes = "";
			$this->district->HrefValue = "";
			$this->district->TooltipValue = "";

			// Taluka
			$this->Taluka->LinkCustomAttributes = "";
			$this->Taluka->HrefValue = "";
			$this->Taluka->TooltipValue = "";

			// River
			$this->River->LinkCustomAttributes = "";
			$this->River->HrefValue = "";
			$this->River->TooltipValue = "";

			// Neareast_City
			$this->Neareast_City->LinkCustomAttributes = "";
			$this->Neareast_City->HrefValue = "";
			$this->Neareast_City->TooltipValue = "";

			// dam_construction_type
			$this->dam_construction_type->LinkCustomAttributes = "";
			$this->dam_construction_type->HrefValue = "";
			$this->dam_construction_type->TooltipValue = "";

			// Height_above_Lowest_Foundation_Level_in_mtr
			$this->Height_above_Lowest_Foundation_Level_in_mtr->LinkCustomAttributes = "";
			$this->Height_above_Lowest_Foundation_Level_in_mtr->HrefValue = "";
			$this->Height_above_Lowest_Foundation_Level_in_mtr->TooltipValue = "";

			// Length_of_Dam_in_mtr
			$this->Length_of_Dam_in_mtr->LinkCustomAttributes = "";
			$this->Length_of_Dam_in_mtr->HrefValue = "";
			$this->Length_of_Dam_in_mtr->TooltipValue = "";

			// Volume_Content_of_Dam_in_MCM
			$this->Volume_Content_of_Dam_in_MCM->LinkCustomAttributes = "";
			$this->Volume_Content_of_Dam_in_MCM->HrefValue = "";
			$this->Volume_Content_of_Dam_in_MCM->TooltipValue = "";

			// Gross_Storage_Capacity_of_Dam_in_MCM
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->LinkCustomAttributes = "";
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->HrefValue = "";
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->TooltipValue = "";

			// Reservoir_Area_in_sq_km
			$this->Reservoir_Area_in_sq_km->LinkCustomAttributes = "";
			$this->Reservoir_Area_in_sq_km->HrefValue = "";
			$this->Reservoir_Area_in_sq_km->TooltipValue = "";

			// Effective_Storage_Capacity_in_MCM
			$this->Effective_Storage_Capacity_in_MCM->LinkCustomAttributes = "";
			$this->Effective_Storage_Capacity_in_MCM->HrefValue = "";
			$this->Effective_Storage_Capacity_in_MCM->TooltipValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";
			$this->Purpose->TooltipValue = "";

			// Designed_Spillway_Capacity_in_M3_per_sec
			$this->Designed_Spillway_Capacity_in_M3_per_sec->LinkCustomAttributes = "";
			$this->Designed_Spillway_Capacity_in_M3_per_sec->HrefValue = "";
			$this->Designed_Spillway_Capacity_in_M3_per_sec->TooltipValue = "";

			// dam_construction_type_ID
			$this->dam_construction_type_ID->LinkCustomAttributes = "";
			$this->dam_construction_type_ID->HrefValue = "";
			$this->dam_construction_type_ID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// SrNo
			$this->SrNo->EditAttrs["class"] = "form-control";
			$this->SrNo->EditCustomAttributes = "";
			$this->SrNo->EditValue = HtmlEncode($this->SrNo->CurrentValue);

			// PIC
			$this->PIC->EditAttrs["class"] = "form-control";
			$this->PIC->EditCustomAttributes = "";
			if (!$this->PIC->Raw)
				$this->PIC->CurrentValue = HtmlDecode($this->PIC->CurrentValue);
			$this->PIC->EditValue = HtmlEncode($this->PIC->CurrentValue);

			// kpcl_ID
			$this->kpcl_ID->EditAttrs["class"] = "form-control";
			$this->kpcl_ID->EditCustomAttributes = "";
			if (!$this->kpcl_ID->Raw)
				$this->kpcl_ID->CurrentValue = HtmlDecode($this->kpcl_ID->CurrentValue);
			$this->kpcl_ID->EditValue = HtmlEncode($this->kpcl_ID->CurrentValue);

			// Name_of_Dam
			$this->Name_of_Dam->EditAttrs["class"] = "form-control";
			$this->Name_of_Dam->EditCustomAttributes = "";
			if (!$this->Name_of_Dam->Raw)
				$this->Name_of_Dam->CurrentValue = HtmlDecode($this->Name_of_Dam->CurrentValue);
			$this->Name_of_Dam->EditValue = HtmlEncode($this->Name_of_Dam->CurrentValue);

			// kpcl_dam_name
			$this->kpcl_dam_name->EditAttrs["class"] = "form-control";
			$this->kpcl_dam_name->EditCustomAttributes = "";
			if (!$this->kpcl_dam_name->Raw)
				$this->kpcl_dam_name->CurrentValue = HtmlDecode($this->kpcl_dam_name->CurrentValue);
			$this->kpcl_dam_name->EditValue = HtmlEncode($this->kpcl_dam_name->CurrentValue);

			// Ops_ID
			$this->Ops_ID->EditAttrs["class"] = "form-control";
			$this->Ops_ID->EditCustomAttributes = "";
			if (!$this->Ops_ID->Raw)
				$this->Ops_ID->CurrentValue = HtmlDecode($this->Ops_ID->CurrentValue);
			$this->Ops_ID->EditValue = HtmlEncode($this->Ops_ID->CurrentValue);

			// dam_size_type_ID
			$this->dam_size_type_ID->EditAttrs["class"] = "form-control";
			$this->dam_size_type_ID->EditCustomAttributes = "";
			if (!$this->dam_size_type_ID->Raw)
				$this->dam_size_type_ID->CurrentValue = HtmlDecode($this->dam_size_type_ID->CurrentValue);
			$this->dam_size_type_ID->EditValue = HtmlEncode($this->dam_size_type_ID->CurrentValue);

			// dam_Longitude
			$this->dam_Longitude->EditAttrs["class"] = "form-control";
			$this->dam_Longitude->EditCustomAttributes = "";
			$this->dam_Longitude->EditValue = HtmlEncode($this->dam_Longitude->CurrentValue);
			if (strval($this->dam_Longitude->EditValue) != "" && is_numeric($this->dam_Longitude->EditValue))
				$this->dam_Longitude->EditValue = FormatNumber($this->dam_Longitude->EditValue, -2, -2, -2, -2);
			

			// dam_Latitude
			$this->dam_Latitude->EditAttrs["class"] = "form-control";
			$this->dam_Latitude->EditCustomAttributes = "";
			$this->dam_Latitude->EditValue = HtmlEncode($this->dam_Latitude->CurrentValue);
			if (strval($this->dam_Latitude->EditValue) != "" && is_numeric($this->dam_Latitude->EditValue))
				$this->dam_Latitude->EditValue = FormatNumber($this->dam_Latitude->EditValue, -2, -2, -2, -2);
			

			// Year_of_Completion
			$this->Year_of_Completion->EditAttrs["class"] = "form-control";
			$this->Year_of_Completion->EditCustomAttributes = "";
			if (!$this->Year_of_Completion->Raw)
				$this->Year_of_Completion->CurrentValue = HtmlDecode($this->Year_of_Completion->CurrentValue);
			$this->Year_of_Completion->EditValue = HtmlEncode($this->Year_of_Completion->CurrentValue);

			// Basin
			$this->Basin->EditAttrs["class"] = "form-control";
			$this->Basin->EditCustomAttributes = "";
			if (!$this->Basin->Raw)
				$this->Basin->CurrentValue = HtmlDecode($this->Basin->CurrentValue);
			$this->Basin->EditValue = HtmlEncode($this->Basin->CurrentValue);

			// Sub-Basin
			$this->Sub_Basin->EditAttrs["class"] = "form-control";
			$this->Sub_Basin->EditCustomAttributes = "";
			if (!$this->Sub_Basin->Raw)
				$this->Sub_Basin->CurrentValue = HtmlDecode($this->Sub_Basin->CurrentValue);
			$this->Sub_Basin->EditValue = HtmlEncode($this->Sub_Basin->CurrentValue);

			// district
			$this->district->EditAttrs["class"] = "form-control";
			$this->district->EditCustomAttributes = "";
			if (!$this->district->Raw)
				$this->district->CurrentValue = HtmlDecode($this->district->CurrentValue);
			$this->district->EditValue = HtmlEncode($this->district->CurrentValue);

			// Taluka
			$this->Taluka->EditAttrs["class"] = "form-control";
			$this->Taluka->EditCustomAttributes = "";
			if (!$this->Taluka->Raw)
				$this->Taluka->CurrentValue = HtmlDecode($this->Taluka->CurrentValue);
			$this->Taluka->EditValue = HtmlEncode($this->Taluka->CurrentValue);

			// River
			$this->River->EditAttrs["class"] = "form-control";
			$this->River->EditCustomAttributes = "";
			if (!$this->River->Raw)
				$this->River->CurrentValue = HtmlDecode($this->River->CurrentValue);
			$this->River->EditValue = HtmlEncode($this->River->CurrentValue);

			// Neareast_City
			$this->Neareast_City->EditAttrs["class"] = "form-control";
			$this->Neareast_City->EditCustomAttributes = "";
			if (!$this->Neareast_City->Raw)
				$this->Neareast_City->CurrentValue = HtmlDecode($this->Neareast_City->CurrentValue);
			$this->Neareast_City->EditValue = HtmlEncode($this->Neareast_City->CurrentValue);

			// dam_construction_type
			$this->dam_construction_type->EditAttrs["class"] = "form-control";
			$this->dam_construction_type->EditCustomAttributes = "";
			if (!$this->dam_construction_type->Raw)
				$this->dam_construction_type->CurrentValue = HtmlDecode($this->dam_construction_type->CurrentValue);
			$this->dam_construction_type->EditValue = HtmlEncode($this->dam_construction_type->CurrentValue);

			// Height_above_Lowest_Foundation_Level_in_mtr
			$this->Height_above_Lowest_Foundation_Level_in_mtr->EditAttrs["class"] = "form-control";
			$this->Height_above_Lowest_Foundation_Level_in_mtr->EditCustomAttributes = "";
			$this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue = HtmlEncode($this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue);
			if (strval($this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue) != "" && is_numeric($this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue))
				$this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue = FormatNumber($this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue, -2, -2, -2, -2);
			

			// Length_of_Dam_in_mtr
			$this->Length_of_Dam_in_mtr->EditAttrs["class"] = "form-control";
			$this->Length_of_Dam_in_mtr->EditCustomAttributes = "";
			$this->Length_of_Dam_in_mtr->EditValue = HtmlEncode($this->Length_of_Dam_in_mtr->CurrentValue);
			if (strval($this->Length_of_Dam_in_mtr->EditValue) != "" && is_numeric($this->Length_of_Dam_in_mtr->EditValue))
				$this->Length_of_Dam_in_mtr->EditValue = FormatNumber($this->Length_of_Dam_in_mtr->EditValue, -2, -2, -2, -2);
			

			// Volume_Content_of_Dam_in_MCM
			$this->Volume_Content_of_Dam_in_MCM->EditAttrs["class"] = "form-control";
			$this->Volume_Content_of_Dam_in_MCM->EditCustomAttributes = "";
			$this->Volume_Content_of_Dam_in_MCM->EditValue = HtmlEncode($this->Volume_Content_of_Dam_in_MCM->CurrentValue);
			if (strval($this->Volume_Content_of_Dam_in_MCM->EditValue) != "" && is_numeric($this->Volume_Content_of_Dam_in_MCM->EditValue))
				$this->Volume_Content_of_Dam_in_MCM->EditValue = FormatNumber($this->Volume_Content_of_Dam_in_MCM->EditValue, -2, -2, -2, -2);
			

			// Gross_Storage_Capacity_of_Dam_in_MCM
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->EditAttrs["class"] = "form-control";
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->EditCustomAttributes = "";
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue = HtmlEncode($this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue);
			if (strval($this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue) != "" && is_numeric($this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue))
				$this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue = FormatNumber($this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue, -2, -2, -2, -2);
			

			// Reservoir_Area_in_sq_km
			$this->Reservoir_Area_in_sq_km->EditAttrs["class"] = "form-control";
			$this->Reservoir_Area_in_sq_km->EditCustomAttributes = "";
			$this->Reservoir_Area_in_sq_km->EditValue = HtmlEncode($this->Reservoir_Area_in_sq_km->CurrentValue);
			if (strval($this->Reservoir_Area_in_sq_km->EditValue) != "" && is_numeric($this->Reservoir_Area_in_sq_km->EditValue))
				$this->Reservoir_Area_in_sq_km->EditValue = FormatNumber($this->Reservoir_Area_in_sq_km->EditValue, -2, -2, -2, -2);
			

			// Effective_Storage_Capacity_in_MCM
			$this->Effective_Storage_Capacity_in_MCM->EditAttrs["class"] = "form-control";
			$this->Effective_Storage_Capacity_in_MCM->EditCustomAttributes = "";
			$this->Effective_Storage_Capacity_in_MCM->EditValue = HtmlEncode($this->Effective_Storage_Capacity_in_MCM->CurrentValue);
			if (strval($this->Effective_Storage_Capacity_in_MCM->EditValue) != "" && is_numeric($this->Effective_Storage_Capacity_in_MCM->EditValue))
				$this->Effective_Storage_Capacity_in_MCM->EditValue = FormatNumber($this->Effective_Storage_Capacity_in_MCM->EditValue, -2, -2, -2, -2);
			

			// Purpose
			$this->Purpose->EditAttrs["class"] = "form-control";
			$this->Purpose->EditCustomAttributes = "";
			if (!$this->Purpose->Raw)
				$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
			$this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);

			// Designed_Spillway_Capacity_in_M3_per_sec
			$this->Designed_Spillway_Capacity_in_M3_per_sec->EditAttrs["class"] = "form-control";
			$this->Designed_Spillway_Capacity_in_M3_per_sec->EditCustomAttributes = "";
			$this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue = HtmlEncode($this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue);
			if (strval($this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue) != "" && is_numeric($this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue))
				$this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue = FormatNumber($this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue, -2, -2, -2, -2);
			

			// dam_construction_type_ID
			$this->dam_construction_type_ID->EditAttrs["class"] = "form-control";
			$this->dam_construction_type_ID->EditCustomAttributes = "";
			if (!$this->dam_construction_type_ID->Raw)
				$this->dam_construction_type_ID->CurrentValue = HtmlDecode($this->dam_construction_type_ID->CurrentValue);
			$this->dam_construction_type_ID->EditValue = HtmlEncode($this->dam_construction_type_ID->CurrentValue);

			// Add refer script
			// SrNo

			$this->SrNo->LinkCustomAttributes = "";
			$this->SrNo->HrefValue = "";

			// PIC
			$this->PIC->LinkCustomAttributes = "";
			$this->PIC->HrefValue = "";

			// kpcl_ID
			$this->kpcl_ID->LinkCustomAttributes = "";
			$this->kpcl_ID->HrefValue = "";

			// Name_of_Dam
			$this->Name_of_Dam->LinkCustomAttributes = "";
			$this->Name_of_Dam->HrefValue = "";

			// kpcl_dam_name
			$this->kpcl_dam_name->LinkCustomAttributes = "";
			$this->kpcl_dam_name->HrefValue = "";

			// Ops_ID
			$this->Ops_ID->LinkCustomAttributes = "";
			$this->Ops_ID->HrefValue = "";

			// dam_size_type_ID
			$this->dam_size_type_ID->LinkCustomAttributes = "";
			$this->dam_size_type_ID->HrefValue = "";

			// dam_Longitude
			$this->dam_Longitude->LinkCustomAttributes = "";
			$this->dam_Longitude->HrefValue = "";

			// dam_Latitude
			$this->dam_Latitude->LinkCustomAttributes = "";
			$this->dam_Latitude->HrefValue = "";

			// Year_of_Completion
			$this->Year_of_Completion->LinkCustomAttributes = "";
			$this->Year_of_Completion->HrefValue = "";

			// Basin
			$this->Basin->LinkCustomAttributes = "";
			$this->Basin->HrefValue = "";

			// Sub-Basin
			$this->Sub_Basin->LinkCustomAttributes = "";
			$this->Sub_Basin->HrefValue = "";

			// district
			$this->district->LinkCustomAttributes = "";
			$this->district->HrefValue = "";

			// Taluka
			$this->Taluka->LinkCustomAttributes = "";
			$this->Taluka->HrefValue = "";

			// River
			$this->River->LinkCustomAttributes = "";
			$this->River->HrefValue = "";

			// Neareast_City
			$this->Neareast_City->LinkCustomAttributes = "";
			$this->Neareast_City->HrefValue = "";

			// dam_construction_type
			$this->dam_construction_type->LinkCustomAttributes = "";
			$this->dam_construction_type->HrefValue = "";

			// Height_above_Lowest_Foundation_Level_in_mtr
			$this->Height_above_Lowest_Foundation_Level_in_mtr->LinkCustomAttributes = "";
			$this->Height_above_Lowest_Foundation_Level_in_mtr->HrefValue = "";

			// Length_of_Dam_in_mtr
			$this->Length_of_Dam_in_mtr->LinkCustomAttributes = "";
			$this->Length_of_Dam_in_mtr->HrefValue = "";

			// Volume_Content_of_Dam_in_MCM
			$this->Volume_Content_of_Dam_in_MCM->LinkCustomAttributes = "";
			$this->Volume_Content_of_Dam_in_MCM->HrefValue = "";

			// Gross_Storage_Capacity_of_Dam_in_MCM
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->LinkCustomAttributes = "";
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->HrefValue = "";

			// Reservoir_Area_in_sq_km
			$this->Reservoir_Area_in_sq_km->LinkCustomAttributes = "";
			$this->Reservoir_Area_in_sq_km->HrefValue = "";

			// Effective_Storage_Capacity_in_MCM
			$this->Effective_Storage_Capacity_in_MCM->LinkCustomAttributes = "";
			$this->Effective_Storage_Capacity_in_MCM->HrefValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";

			// Designed_Spillway_Capacity_in_M3_per_sec
			$this->Designed_Spillway_Capacity_in_M3_per_sec->LinkCustomAttributes = "";
			$this->Designed_Spillway_Capacity_in_M3_per_sec->HrefValue = "";

			// dam_construction_type_ID
			$this->dam_construction_type_ID->LinkCustomAttributes = "";
			$this->dam_construction_type_ID->HrefValue = "";
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
		if ($this->SrNo->Required) {
			if (!$this->SrNo->IsDetailKey && $this->SrNo->FormValue != NULL && $this->SrNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SrNo->caption(), $this->SrNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SrNo->FormValue)) {
			AddMessage($FormError, $this->SrNo->errorMessage());
		}
		if ($this->PIC->Required) {
			if (!$this->PIC->IsDetailKey && $this->PIC->FormValue != NULL && $this->PIC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PIC->caption(), $this->PIC->RequiredErrorMessage));
			}
		}
		if ($this->kpcl_ID->Required) {
			if (!$this->kpcl_ID->IsDetailKey && $this->kpcl_ID->FormValue != NULL && $this->kpcl_ID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kpcl_ID->caption(), $this->kpcl_ID->RequiredErrorMessage));
			}
		}
		if ($this->Name_of_Dam->Required) {
			if (!$this->Name_of_Dam->IsDetailKey && $this->Name_of_Dam->FormValue != NULL && $this->Name_of_Dam->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name_of_Dam->caption(), $this->Name_of_Dam->RequiredErrorMessage));
			}
		}
		if ($this->kpcl_dam_name->Required) {
			if (!$this->kpcl_dam_name->IsDetailKey && $this->kpcl_dam_name->FormValue != NULL && $this->kpcl_dam_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kpcl_dam_name->caption(), $this->kpcl_dam_name->RequiredErrorMessage));
			}
		}
		if ($this->Ops_ID->Required) {
			if (!$this->Ops_ID->IsDetailKey && $this->Ops_ID->FormValue != NULL && $this->Ops_ID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Ops_ID->caption(), $this->Ops_ID->RequiredErrorMessage));
			}
		}
		if ($this->dam_size_type_ID->Required) {
			if (!$this->dam_size_type_ID->IsDetailKey && $this->dam_size_type_ID->FormValue != NULL && $this->dam_size_type_ID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dam_size_type_ID->caption(), $this->dam_size_type_ID->RequiredErrorMessage));
			}
		}
		if ($this->dam_Longitude->Required) {
			if (!$this->dam_Longitude->IsDetailKey && $this->dam_Longitude->FormValue != NULL && $this->dam_Longitude->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dam_Longitude->caption(), $this->dam_Longitude->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->dam_Longitude->FormValue)) {
			AddMessage($FormError, $this->dam_Longitude->errorMessage());
		}
		if ($this->dam_Latitude->Required) {
			if (!$this->dam_Latitude->IsDetailKey && $this->dam_Latitude->FormValue != NULL && $this->dam_Latitude->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dam_Latitude->caption(), $this->dam_Latitude->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->dam_Latitude->FormValue)) {
			AddMessage($FormError, $this->dam_Latitude->errorMessage());
		}
		if ($this->Year_of_Completion->Required) {
			if (!$this->Year_of_Completion->IsDetailKey && $this->Year_of_Completion->FormValue != NULL && $this->Year_of_Completion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Year_of_Completion->caption(), $this->Year_of_Completion->RequiredErrorMessage));
			}
		}
		if ($this->Basin->Required) {
			if (!$this->Basin->IsDetailKey && $this->Basin->FormValue != NULL && $this->Basin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Basin->caption(), $this->Basin->RequiredErrorMessage));
			}
		}
		if ($this->Sub_Basin->Required) {
			if (!$this->Sub_Basin->IsDetailKey && $this->Sub_Basin->FormValue != NULL && $this->Sub_Basin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sub_Basin->caption(), $this->Sub_Basin->RequiredErrorMessage));
			}
		}
		if ($this->district->Required) {
			if (!$this->district->IsDetailKey && $this->district->FormValue != NULL && $this->district->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->district->caption(), $this->district->RequiredErrorMessage));
			}
		}
		if ($this->Taluka->Required) {
			if (!$this->Taluka->IsDetailKey && $this->Taluka->FormValue != NULL && $this->Taluka->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Taluka->caption(), $this->Taluka->RequiredErrorMessage));
			}
		}
		if ($this->River->Required) {
			if (!$this->River->IsDetailKey && $this->River->FormValue != NULL && $this->River->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->River->caption(), $this->River->RequiredErrorMessage));
			}
		}
		if ($this->Neareast_City->Required) {
			if (!$this->Neareast_City->IsDetailKey && $this->Neareast_City->FormValue != NULL && $this->Neareast_City->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Neareast_City->caption(), $this->Neareast_City->RequiredErrorMessage));
			}
		}
		if ($this->dam_construction_type->Required) {
			if (!$this->dam_construction_type->IsDetailKey && $this->dam_construction_type->FormValue != NULL && $this->dam_construction_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dam_construction_type->caption(), $this->dam_construction_type->RequiredErrorMessage));
			}
		}
		if ($this->Height_above_Lowest_Foundation_Level_in_mtr->Required) {
			if (!$this->Height_above_Lowest_Foundation_Level_in_mtr->IsDetailKey && $this->Height_above_Lowest_Foundation_Level_in_mtr->FormValue != NULL && $this->Height_above_Lowest_Foundation_Level_in_mtr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Height_above_Lowest_Foundation_Level_in_mtr->caption(), $this->Height_above_Lowest_Foundation_Level_in_mtr->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Height_above_Lowest_Foundation_Level_in_mtr->FormValue)) {
			AddMessage($FormError, $this->Height_above_Lowest_Foundation_Level_in_mtr->errorMessage());
		}
		if ($this->Length_of_Dam_in_mtr->Required) {
			if (!$this->Length_of_Dam_in_mtr->IsDetailKey && $this->Length_of_Dam_in_mtr->FormValue != NULL && $this->Length_of_Dam_in_mtr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Length_of_Dam_in_mtr->caption(), $this->Length_of_Dam_in_mtr->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Length_of_Dam_in_mtr->FormValue)) {
			AddMessage($FormError, $this->Length_of_Dam_in_mtr->errorMessage());
		}
		if ($this->Volume_Content_of_Dam_in_MCM->Required) {
			if (!$this->Volume_Content_of_Dam_in_MCM->IsDetailKey && $this->Volume_Content_of_Dam_in_MCM->FormValue != NULL && $this->Volume_Content_of_Dam_in_MCM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume_Content_of_Dam_in_MCM->caption(), $this->Volume_Content_of_Dam_in_MCM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Volume_Content_of_Dam_in_MCM->FormValue)) {
			AddMessage($FormError, $this->Volume_Content_of_Dam_in_MCM->errorMessage());
		}
		if ($this->Gross_Storage_Capacity_of_Dam_in_MCM->Required) {
			if (!$this->Gross_Storage_Capacity_of_Dam_in_MCM->IsDetailKey && $this->Gross_Storage_Capacity_of_Dam_in_MCM->FormValue != NULL && $this->Gross_Storage_Capacity_of_Dam_in_MCM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gross_Storage_Capacity_of_Dam_in_MCM->caption(), $this->Gross_Storage_Capacity_of_Dam_in_MCM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Gross_Storage_Capacity_of_Dam_in_MCM->FormValue)) {
			AddMessage($FormError, $this->Gross_Storage_Capacity_of_Dam_in_MCM->errorMessage());
		}
		if ($this->Reservoir_Area_in_sq_km->Required) {
			if (!$this->Reservoir_Area_in_sq_km->IsDetailKey && $this->Reservoir_Area_in_sq_km->FormValue != NULL && $this->Reservoir_Area_in_sq_km->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reservoir_Area_in_sq_km->caption(), $this->Reservoir_Area_in_sq_km->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Reservoir_Area_in_sq_km->FormValue)) {
			AddMessage($FormError, $this->Reservoir_Area_in_sq_km->errorMessage());
		}
		if ($this->Effective_Storage_Capacity_in_MCM->Required) {
			if (!$this->Effective_Storage_Capacity_in_MCM->IsDetailKey && $this->Effective_Storage_Capacity_in_MCM->FormValue != NULL && $this->Effective_Storage_Capacity_in_MCM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Effective_Storage_Capacity_in_MCM->caption(), $this->Effective_Storage_Capacity_in_MCM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Effective_Storage_Capacity_in_MCM->FormValue)) {
			AddMessage($FormError, $this->Effective_Storage_Capacity_in_MCM->errorMessage());
		}
		if ($this->Purpose->Required) {
			if (!$this->Purpose->IsDetailKey && $this->Purpose->FormValue != NULL && $this->Purpose->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
			}
		}
		if ($this->Designed_Spillway_Capacity_in_M3_per_sec->Required) {
			if (!$this->Designed_Spillway_Capacity_in_M3_per_sec->IsDetailKey && $this->Designed_Spillway_Capacity_in_M3_per_sec->FormValue != NULL && $this->Designed_Spillway_Capacity_in_M3_per_sec->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Designed_Spillway_Capacity_in_M3_per_sec->caption(), $this->Designed_Spillway_Capacity_in_M3_per_sec->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Designed_Spillway_Capacity_in_M3_per_sec->FormValue)) {
			AddMessage($FormError, $this->Designed_Spillway_Capacity_in_M3_per_sec->errorMessage());
		}
		if ($this->dam_construction_type_ID->Required) {
			if (!$this->dam_construction_type_ID->IsDetailKey && $this->dam_construction_type_ID->FormValue != NULL && $this->dam_construction_type_ID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dam_construction_type_ID->caption(), $this->dam_construction_type_ID->RequiredErrorMessage));
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
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// SrNo
		$this->SrNo->setDbValueDef($rsnew, $this->SrNo->CurrentValue, NULL, FALSE);

		// PIC
		$this->PIC->setDbValueDef($rsnew, $this->PIC->CurrentValue, "", FALSE);

		// kpcl_ID
		$this->kpcl_ID->setDbValueDef($rsnew, $this->kpcl_ID->CurrentValue, NULL, FALSE);

		// Name_of_Dam
		$this->Name_of_Dam->setDbValueDef($rsnew, $this->Name_of_Dam->CurrentValue, NULL, FALSE);

		// kpcl_dam_name
		$this->kpcl_dam_name->setDbValueDef($rsnew, $this->kpcl_dam_name->CurrentValue, NULL, FALSE);

		// Ops_ID
		$this->Ops_ID->setDbValueDef($rsnew, $this->Ops_ID->CurrentValue, NULL, FALSE);

		// dam_size_type_ID
		$this->dam_size_type_ID->setDbValueDef($rsnew, $this->dam_size_type_ID->CurrentValue, NULL, FALSE);

		// dam_Longitude
		$this->dam_Longitude->setDbValueDef($rsnew, $this->dam_Longitude->CurrentValue, NULL, FALSE);

		// dam_Latitude
		$this->dam_Latitude->setDbValueDef($rsnew, $this->dam_Latitude->CurrentValue, NULL, FALSE);

		// Year_of_Completion
		$this->Year_of_Completion->setDbValueDef($rsnew, $this->Year_of_Completion->CurrentValue, NULL, FALSE);

		// Basin
		$this->Basin->setDbValueDef($rsnew, $this->Basin->CurrentValue, NULL, FALSE);

		// Sub-Basin
		$this->Sub_Basin->setDbValueDef($rsnew, $this->Sub_Basin->CurrentValue, NULL, FALSE);

		// district
		$this->district->setDbValueDef($rsnew, $this->district->CurrentValue, NULL, FALSE);

		// Taluka
		$this->Taluka->setDbValueDef($rsnew, $this->Taluka->CurrentValue, NULL, FALSE);

		// River
		$this->River->setDbValueDef($rsnew, $this->River->CurrentValue, NULL, FALSE);

		// Neareast_City
		$this->Neareast_City->setDbValueDef($rsnew, $this->Neareast_City->CurrentValue, NULL, FALSE);

		// dam_construction_type
		$this->dam_construction_type->setDbValueDef($rsnew, $this->dam_construction_type->CurrentValue, NULL, FALSE);

		// Height_above_Lowest_Foundation_Level_in_mtr
		$this->Height_above_Lowest_Foundation_Level_in_mtr->setDbValueDef($rsnew, $this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue, NULL, FALSE);

		// Length_of_Dam_in_mtr
		$this->Length_of_Dam_in_mtr->setDbValueDef($rsnew, $this->Length_of_Dam_in_mtr->CurrentValue, NULL, FALSE);

		// Volume_Content_of_Dam_in_MCM
		$this->Volume_Content_of_Dam_in_MCM->setDbValueDef($rsnew, $this->Volume_Content_of_Dam_in_MCM->CurrentValue, NULL, FALSE);

		// Gross_Storage_Capacity_of_Dam_in_MCM
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->setDbValueDef($rsnew, $this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue, NULL, FALSE);

		// Reservoir_Area_in_sq_km
		$this->Reservoir_Area_in_sq_km->setDbValueDef($rsnew, $this->Reservoir_Area_in_sq_km->CurrentValue, NULL, FALSE);

		// Effective_Storage_Capacity_in_MCM
		$this->Effective_Storage_Capacity_in_MCM->setDbValueDef($rsnew, $this->Effective_Storage_Capacity_in_MCM->CurrentValue, NULL, FALSE);

		// Purpose
		$this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, NULL, FALSE);

		// Designed_Spillway_Capacity_in_M3_per_sec
		$this->Designed_Spillway_Capacity_in_M3_per_sec->setDbValueDef($rsnew, $this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue, NULL, FALSE);

		// dam_construction_type_ID
		$this->dam_construction_type_ID->setDbValueDef($rsnew, $this->dam_construction_type_ID->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['PIC']) == "") {
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("master_damslist.php"), "", $this->TableVar, TRUE);
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