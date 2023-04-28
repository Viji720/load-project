<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_hmsdata_add extends tbl_hmsdata
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_hmsdata';

	// Page object name
	public $PageObjName = "tbl_hmsdata_add";

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

		// Table object (tbl_hmsdata)
		if (!isset($GLOBALS["tbl_hmsdata"]) || get_class($GLOBALS["tbl_hmsdata"]) == PROJECT_NAMESPACE . "tbl_hmsdata") {
			$GLOBALS["tbl_hmsdata"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tbl_hmsdata"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tbl_hmsdata');

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
		global $tbl_hmsdata;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($tbl_hmsdata);
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
					if ($pageName == "tbl_hmsdataview.php")
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
					$this->terminate(GetUrl("tbl_hmsdatalist.php"));
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
		$this->Slno->Visible = FALSE;
		$this->StationId->setVisibility();
		$this->obs_DateTime->setVisibility();
		$this->Temp_water_in_pan_inC_830AM->setVisibility();
		$this->Temp_water_in_pan_inC_530PM->setVisibility();
		$this->App_Evaporation_inMM_830AM->setVisibility();
		$this->App_Evaporation_inMM_530PM->setVisibility();
		$this->Rainfall_inMM_830AM->setVisibility();
		$this->Rainfall_inMM_530PM->setVisibility();
		$this->Evaporation_curing_inMM_830AM->setVisibility();
		$this->Evaporation_curing_inMM_530PM->setVisibility();
		$this->Evaporation_curing_DaywithRain_inMM->setVisibility();
		$this->Evaporation_curing_DaywithNoRain_inMM->setVisibility();
		$this->Dry_Bulb_Temp_inC_830AM->setVisibility();
		$this->Wet_Bulb_Temp_inC_830AM->setVisibility();
		$this->Vapour_Temp_inC_830AM->setVisibility();
		$this->Dry_Bulb_Temp_inC_530PM->setVisibility();
		$this->Wet_Bulb_Temp_inC_530PM->setVisibility();
		$this->Vapour_Temp_inC_530PM->setVisibility();
		$this->Max_Temp_inC->setVisibility();
		$this->Min_Temp_inC->setVisibility();
		$this->Total_Wind_Run_inKM_830AM->setVisibility();
		$this->Total_Wind_Run_inKM_530PM->setVisibility();
		$this->Average_Wind_Speed_inKM->setVisibility();
		$this->Number_of_Hours_of_Brightsuned->setVisibility();
		$this->Relative_Humidity_in_Precentage_830AM->setVisibility();
		$this->Relative_Humidity_in_Precentage_530PM->setVisibility();
		$this->obs_remarks->setVisibility();
		$this->Status->setVisibility();
		$this->Validated->setVisibility();
		$this->isFreeze->setVisibility();
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

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("tbl_hmsdatalist.php");
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
					$this->terminate("tbl_hmsdatalist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "tbl_hmsdatalist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "tbl_hmsdataview.php")
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
		$this->StationId->CurrentValue = NULL;
		$this->StationId->OldValue = $this->StationId->CurrentValue;
		$this->obs_DateTime->CurrentValue = NULL;
		$this->obs_DateTime->OldValue = $this->obs_DateTime->CurrentValue;
		$this->Temp_water_in_pan_inC_830AM->CurrentValue = NULL;
		$this->Temp_water_in_pan_inC_830AM->OldValue = $this->Temp_water_in_pan_inC_830AM->CurrentValue;
		$this->Temp_water_in_pan_inC_530PM->CurrentValue = NULL;
		$this->Temp_water_in_pan_inC_530PM->OldValue = $this->Temp_water_in_pan_inC_530PM->CurrentValue;
		$this->App_Evaporation_inMM_830AM->CurrentValue = NULL;
		$this->App_Evaporation_inMM_830AM->OldValue = $this->App_Evaporation_inMM_830AM->CurrentValue;
		$this->App_Evaporation_inMM_530PM->CurrentValue = NULL;
		$this->App_Evaporation_inMM_530PM->OldValue = $this->App_Evaporation_inMM_530PM->CurrentValue;
		$this->Rainfall_inMM_830AM->CurrentValue = NULL;
		$this->Rainfall_inMM_830AM->OldValue = $this->Rainfall_inMM_830AM->CurrentValue;
		$this->Rainfall_inMM_530PM->CurrentValue = NULL;
		$this->Rainfall_inMM_530PM->OldValue = $this->Rainfall_inMM_530PM->CurrentValue;
		$this->Evaporation_curing_inMM_830AM->CurrentValue = NULL;
		$this->Evaporation_curing_inMM_830AM->OldValue = $this->Evaporation_curing_inMM_830AM->CurrentValue;
		$this->Evaporation_curing_inMM_530PM->CurrentValue = NULL;
		$this->Evaporation_curing_inMM_530PM->OldValue = $this->Evaporation_curing_inMM_530PM->CurrentValue;
		$this->Evaporation_curing_DaywithRain_inMM->CurrentValue = NULL;
		$this->Evaporation_curing_DaywithRain_inMM->OldValue = $this->Evaporation_curing_DaywithRain_inMM->CurrentValue;
		$this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue = NULL;
		$this->Evaporation_curing_DaywithNoRain_inMM->OldValue = $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue;
		$this->Dry_Bulb_Temp_inC_830AM->CurrentValue = NULL;
		$this->Dry_Bulb_Temp_inC_830AM->OldValue = $this->Dry_Bulb_Temp_inC_830AM->CurrentValue;
		$this->Wet_Bulb_Temp_inC_830AM->CurrentValue = NULL;
		$this->Wet_Bulb_Temp_inC_830AM->OldValue = $this->Wet_Bulb_Temp_inC_830AM->CurrentValue;
		$this->Vapour_Temp_inC_830AM->CurrentValue = NULL;
		$this->Vapour_Temp_inC_830AM->OldValue = $this->Vapour_Temp_inC_830AM->CurrentValue;
		$this->Dry_Bulb_Temp_inC_530PM->CurrentValue = NULL;
		$this->Dry_Bulb_Temp_inC_530PM->OldValue = $this->Dry_Bulb_Temp_inC_530PM->CurrentValue;
		$this->Wet_Bulb_Temp_inC_530PM->CurrentValue = NULL;
		$this->Wet_Bulb_Temp_inC_530PM->OldValue = $this->Wet_Bulb_Temp_inC_530PM->CurrentValue;
		$this->Vapour_Temp_inC_530PM->CurrentValue = NULL;
		$this->Vapour_Temp_inC_530PM->OldValue = $this->Vapour_Temp_inC_530PM->CurrentValue;
		$this->Max_Temp_inC->CurrentValue = NULL;
		$this->Max_Temp_inC->OldValue = $this->Max_Temp_inC->CurrentValue;
		$this->Min_Temp_inC->CurrentValue = NULL;
		$this->Min_Temp_inC->OldValue = $this->Min_Temp_inC->CurrentValue;
		$this->Total_Wind_Run_inKM_830AM->CurrentValue = NULL;
		$this->Total_Wind_Run_inKM_830AM->OldValue = $this->Total_Wind_Run_inKM_830AM->CurrentValue;
		$this->Total_Wind_Run_inKM_530PM->CurrentValue = NULL;
		$this->Total_Wind_Run_inKM_530PM->OldValue = $this->Total_Wind_Run_inKM_530PM->CurrentValue;
		$this->Average_Wind_Speed_inKM->CurrentValue = NULL;
		$this->Average_Wind_Speed_inKM->OldValue = $this->Average_Wind_Speed_inKM->CurrentValue;
		$this->Number_of_Hours_of_Brightsuned->CurrentValue = NULL;
		$this->Number_of_Hours_of_Brightsuned->OldValue = $this->Number_of_Hours_of_Brightsuned->CurrentValue;
		$this->Relative_Humidity_in_Precentage_830AM->CurrentValue = NULL;
		$this->Relative_Humidity_in_Precentage_830AM->OldValue = $this->Relative_Humidity_in_Precentage_830AM->CurrentValue;
		$this->Relative_Humidity_in_Precentage_530PM->CurrentValue = NULL;
		$this->Relative_Humidity_in_Precentage_530PM->OldValue = $this->Relative_Humidity_in_Precentage_530PM->CurrentValue;
		$this->obs_remarks->CurrentValue = NULL;
		$this->obs_remarks->OldValue = $this->obs_remarks->CurrentValue;
		$this->Status->CurrentValue = NULL;
		$this->Status->OldValue = $this->Status->CurrentValue;
		$this->Validated->CurrentValue = NULL;
		$this->Validated->OldValue = $this->Validated->CurrentValue;
		$this->isFreeze->CurrentValue = 0;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'StationId' first before field var 'x_StationId'
		$val = $CurrentForm->hasValue("StationId") ? $CurrentForm->getValue("StationId") : $CurrentForm->getValue("x_StationId");
		if (!$this->StationId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StationId->Visible = FALSE; // Disable update for API request
			else
				$this->StationId->setFormValue($val);
		}

		// Check field name 'obs_DateTime' first before field var 'x_obs_DateTime'
		$val = $CurrentForm->hasValue("obs_DateTime") ? $CurrentForm->getValue("obs_DateTime") : $CurrentForm->getValue("x_obs_DateTime");
		if (!$this->obs_DateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->obs_DateTime->Visible = FALSE; // Disable update for API request
			else
				$this->obs_DateTime->setFormValue($val);
			$this->obs_DateTime->CurrentValue = UnFormatDateTime($this->obs_DateTime->CurrentValue, 7);
		}

		// Check field name 'Temp_water_in_pan_inC_830AM' first before field var 'x_Temp_water_in_pan_inC_830AM'
		$val = $CurrentForm->hasValue("Temp_water_in_pan_inC_830AM") ? $CurrentForm->getValue("Temp_water_in_pan_inC_830AM") : $CurrentForm->getValue("x_Temp_water_in_pan_inC_830AM");
		if (!$this->Temp_water_in_pan_inC_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Temp_water_in_pan_inC_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->Temp_water_in_pan_inC_830AM->setFormValue($val);
		}

		// Check field name 'Temp_water_in_pan_inC_530PM' first before field var 'x_Temp_water_in_pan_inC_530PM'
		$val = $CurrentForm->hasValue("Temp_water_in_pan_inC_530PM") ? $CurrentForm->getValue("Temp_water_in_pan_inC_530PM") : $CurrentForm->getValue("x_Temp_water_in_pan_inC_530PM");
		if (!$this->Temp_water_in_pan_inC_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Temp_water_in_pan_inC_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->Temp_water_in_pan_inC_530PM->setFormValue($val);
		}

		// Check field name 'App_Evaporation_inMM_830AM' first before field var 'x_App_Evaporation_inMM_830AM'
		$val = $CurrentForm->hasValue("App_Evaporation_inMM_830AM") ? $CurrentForm->getValue("App_Evaporation_inMM_830AM") : $CurrentForm->getValue("x_App_Evaporation_inMM_830AM");
		if (!$this->App_Evaporation_inMM_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->App_Evaporation_inMM_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->App_Evaporation_inMM_830AM->setFormValue($val);
		}

		// Check field name 'App_Evaporation_inMM_530PM' first before field var 'x_App_Evaporation_inMM_530PM'
		$val = $CurrentForm->hasValue("App_Evaporation_inMM_530PM") ? $CurrentForm->getValue("App_Evaporation_inMM_530PM") : $CurrentForm->getValue("x_App_Evaporation_inMM_530PM");
		if (!$this->App_Evaporation_inMM_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->App_Evaporation_inMM_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->App_Evaporation_inMM_530PM->setFormValue($val);
		}

		// Check field name 'Rainfall_inMM_830AM' first before field var 'x_Rainfall_inMM_830AM'
		$val = $CurrentForm->hasValue("Rainfall_inMM_830AM") ? $CurrentForm->getValue("Rainfall_inMM_830AM") : $CurrentForm->getValue("x_Rainfall_inMM_830AM");
		if (!$this->Rainfall_inMM_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Rainfall_inMM_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->Rainfall_inMM_830AM->setFormValue($val);
		}

		// Check field name 'Rainfall_inMM_530PM' first before field var 'x_Rainfall_inMM_530PM'
		$val = $CurrentForm->hasValue("Rainfall_inMM_530PM") ? $CurrentForm->getValue("Rainfall_inMM_530PM") : $CurrentForm->getValue("x_Rainfall_inMM_530PM");
		if (!$this->Rainfall_inMM_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Rainfall_inMM_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->Rainfall_inMM_530PM->setFormValue($val);
		}

		// Check field name 'Evaporation_curing_inMM_830AM' first before field var 'x_Evaporation_curing_inMM_830AM'
		$val = $CurrentForm->hasValue("Evaporation_curing_inMM_830AM") ? $CurrentForm->getValue("Evaporation_curing_inMM_830AM") : $CurrentForm->getValue("x_Evaporation_curing_inMM_830AM");
		if (!$this->Evaporation_curing_inMM_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Evaporation_curing_inMM_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->Evaporation_curing_inMM_830AM->setFormValue($val);
		}

		// Check field name 'Evaporation_curing_inMM_530PM' first before field var 'x_Evaporation_curing_inMM_530PM'
		$val = $CurrentForm->hasValue("Evaporation_curing_inMM_530PM") ? $CurrentForm->getValue("Evaporation_curing_inMM_530PM") : $CurrentForm->getValue("x_Evaporation_curing_inMM_530PM");
		if (!$this->Evaporation_curing_inMM_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Evaporation_curing_inMM_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->Evaporation_curing_inMM_530PM->setFormValue($val);
		}

		// Check field name 'Evaporation_curing_DaywithRain_inMM' first before field var 'x_Evaporation_curing_DaywithRain_inMM'
		$val = $CurrentForm->hasValue("Evaporation_curing_DaywithRain_inMM") ? $CurrentForm->getValue("Evaporation_curing_DaywithRain_inMM") : $CurrentForm->getValue("x_Evaporation_curing_DaywithRain_inMM");
		if (!$this->Evaporation_curing_DaywithRain_inMM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Evaporation_curing_DaywithRain_inMM->Visible = FALSE; // Disable update for API request
			else
				$this->Evaporation_curing_DaywithRain_inMM->setFormValue($val);
		}

		// Check field name 'Evaporation_curing_DaywithNoRain_inMM' first before field var 'x_Evaporation_curing_DaywithNoRain_inMM'
		$val = $CurrentForm->hasValue("Evaporation_curing_DaywithNoRain_inMM") ? $CurrentForm->getValue("Evaporation_curing_DaywithNoRain_inMM") : $CurrentForm->getValue("x_Evaporation_curing_DaywithNoRain_inMM");
		if (!$this->Evaporation_curing_DaywithNoRain_inMM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Evaporation_curing_DaywithNoRain_inMM->Visible = FALSE; // Disable update for API request
			else
				$this->Evaporation_curing_DaywithNoRain_inMM->setFormValue($val);
		}

		// Check field name 'Dry_Bulb_Temp_inC_830AM' first before field var 'x_Dry_Bulb_Temp_inC_830AM'
		$val = $CurrentForm->hasValue("Dry_Bulb_Temp_inC_830AM") ? $CurrentForm->getValue("Dry_Bulb_Temp_inC_830AM") : $CurrentForm->getValue("x_Dry_Bulb_Temp_inC_830AM");
		if (!$this->Dry_Bulb_Temp_inC_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Dry_Bulb_Temp_inC_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->Dry_Bulb_Temp_inC_830AM->setFormValue($val);
		}

		// Check field name 'Wet_Bulb_Temp_inC_830AM' first before field var 'x_Wet_Bulb_Temp_inC_830AM'
		$val = $CurrentForm->hasValue("Wet_Bulb_Temp_inC_830AM") ? $CurrentForm->getValue("Wet_Bulb_Temp_inC_830AM") : $CurrentForm->getValue("x_Wet_Bulb_Temp_inC_830AM");
		if (!$this->Wet_Bulb_Temp_inC_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Wet_Bulb_Temp_inC_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->Wet_Bulb_Temp_inC_830AM->setFormValue($val);
		}

		// Check field name 'Vapour_Temp_inC_830AM' first before field var 'x_Vapour_Temp_inC_830AM'
		$val = $CurrentForm->hasValue("Vapour_Temp_inC_830AM") ? $CurrentForm->getValue("Vapour_Temp_inC_830AM") : $CurrentForm->getValue("x_Vapour_Temp_inC_830AM");
		if (!$this->Vapour_Temp_inC_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Vapour_Temp_inC_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->Vapour_Temp_inC_830AM->setFormValue($val);
		}

		// Check field name 'Dry_Bulb_Temp_inC_530PM' first before field var 'x_Dry_Bulb_Temp_inC_530PM'
		$val = $CurrentForm->hasValue("Dry_Bulb_Temp_inC_530PM") ? $CurrentForm->getValue("Dry_Bulb_Temp_inC_530PM") : $CurrentForm->getValue("x_Dry_Bulb_Temp_inC_530PM");
		if (!$this->Dry_Bulb_Temp_inC_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Dry_Bulb_Temp_inC_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->Dry_Bulb_Temp_inC_530PM->setFormValue($val);
		}

		// Check field name 'Wet_Bulb_Temp_inC_530PM' first before field var 'x_Wet_Bulb_Temp_inC_530PM'
		$val = $CurrentForm->hasValue("Wet_Bulb_Temp_inC_530PM") ? $CurrentForm->getValue("Wet_Bulb_Temp_inC_530PM") : $CurrentForm->getValue("x_Wet_Bulb_Temp_inC_530PM");
		if (!$this->Wet_Bulb_Temp_inC_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Wet_Bulb_Temp_inC_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->Wet_Bulb_Temp_inC_530PM->setFormValue($val);
		}

		// Check field name 'Vapour_Temp_inC_530PM' first before field var 'x_Vapour_Temp_inC_530PM'
		$val = $CurrentForm->hasValue("Vapour_Temp_inC_530PM") ? $CurrentForm->getValue("Vapour_Temp_inC_530PM") : $CurrentForm->getValue("x_Vapour_Temp_inC_530PM");
		if (!$this->Vapour_Temp_inC_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Vapour_Temp_inC_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->Vapour_Temp_inC_530PM->setFormValue($val);
		}

		// Check field name 'Max_Temp_inC' first before field var 'x_Max_Temp_inC'
		$val = $CurrentForm->hasValue("Max_Temp_inC") ? $CurrentForm->getValue("Max_Temp_inC") : $CurrentForm->getValue("x_Max_Temp_inC");
		if (!$this->Max_Temp_inC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Max_Temp_inC->Visible = FALSE; // Disable update for API request
			else
				$this->Max_Temp_inC->setFormValue($val);
		}

		// Check field name 'Min_Temp_inC' first before field var 'x_Min_Temp_inC'
		$val = $CurrentForm->hasValue("Min_Temp_inC") ? $CurrentForm->getValue("Min_Temp_inC") : $CurrentForm->getValue("x_Min_Temp_inC");
		if (!$this->Min_Temp_inC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Min_Temp_inC->Visible = FALSE; // Disable update for API request
			else
				$this->Min_Temp_inC->setFormValue($val);
		}

		// Check field name 'Total_Wind_Run_inKM_830AM' first before field var 'x_Total_Wind_Run_inKM_830AM'
		$val = $CurrentForm->hasValue("Total_Wind_Run_inKM_830AM") ? $CurrentForm->getValue("Total_Wind_Run_inKM_830AM") : $CurrentForm->getValue("x_Total_Wind_Run_inKM_830AM");
		if (!$this->Total_Wind_Run_inKM_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Total_Wind_Run_inKM_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->Total_Wind_Run_inKM_830AM->setFormValue($val);
		}

		// Check field name 'Total_Wind_Run_inKM_530PM' first before field var 'x_Total_Wind_Run_inKM_530PM'
		$val = $CurrentForm->hasValue("Total_Wind_Run_inKM_530PM") ? $CurrentForm->getValue("Total_Wind_Run_inKM_530PM") : $CurrentForm->getValue("x_Total_Wind_Run_inKM_530PM");
		if (!$this->Total_Wind_Run_inKM_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Total_Wind_Run_inKM_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->Total_Wind_Run_inKM_530PM->setFormValue($val);
		}

		// Check field name 'Average_Wind_Speed_inKM' first before field var 'x_Average_Wind_Speed_inKM'
		$val = $CurrentForm->hasValue("Average_Wind_Speed_inKM") ? $CurrentForm->getValue("Average_Wind_Speed_inKM") : $CurrentForm->getValue("x_Average_Wind_Speed_inKM");
		if (!$this->Average_Wind_Speed_inKM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Average_Wind_Speed_inKM->Visible = FALSE; // Disable update for API request
			else
				$this->Average_Wind_Speed_inKM->setFormValue($val);
		}

		// Check field name 'Number_of_Hours_of_Brightsuned' first before field var 'x_Number_of_Hours_of_Brightsuned'
		$val = $CurrentForm->hasValue("Number_of_Hours_of_Brightsuned") ? $CurrentForm->getValue("Number_of_Hours_of_Brightsuned") : $CurrentForm->getValue("x_Number_of_Hours_of_Brightsuned");
		if (!$this->Number_of_Hours_of_Brightsuned->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Number_of_Hours_of_Brightsuned->Visible = FALSE; // Disable update for API request
			else
				$this->Number_of_Hours_of_Brightsuned->setFormValue($val);
		}

		// Check field name 'Relative_Humidity_in_Precentage_830AM' first before field var 'x_Relative_Humidity_in_Precentage_830AM'
		$val = $CurrentForm->hasValue("Relative_Humidity_in_Precentage_830AM") ? $CurrentForm->getValue("Relative_Humidity_in_Precentage_830AM") : $CurrentForm->getValue("x_Relative_Humidity_in_Precentage_830AM");
		if (!$this->Relative_Humidity_in_Precentage_830AM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Relative_Humidity_in_Precentage_830AM->Visible = FALSE; // Disable update for API request
			else
				$this->Relative_Humidity_in_Precentage_830AM->setFormValue($val);
		}

		// Check field name 'Relative_Humidity_in_Precentage_530PM' first before field var 'x_Relative_Humidity_in_Precentage_530PM'
		$val = $CurrentForm->hasValue("Relative_Humidity_in_Precentage_530PM") ? $CurrentForm->getValue("Relative_Humidity_in_Precentage_530PM") : $CurrentForm->getValue("x_Relative_Humidity_in_Precentage_530PM");
		if (!$this->Relative_Humidity_in_Precentage_530PM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Relative_Humidity_in_Precentage_530PM->Visible = FALSE; // Disable update for API request
			else
				$this->Relative_Humidity_in_Precentage_530PM->setFormValue($val);
		}

		// Check field name 'obs_remarks' first before field var 'x_obs_remarks'
		$val = $CurrentForm->hasValue("obs_remarks") ? $CurrentForm->getValue("obs_remarks") : $CurrentForm->getValue("x_obs_remarks");
		if (!$this->obs_remarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->obs_remarks->Visible = FALSE; // Disable update for API request
			else
				$this->obs_remarks->setFormValue($val);
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

		// Check field name 'isFreeze' first before field var 'x_isFreeze'
		$val = $CurrentForm->hasValue("isFreeze") ? $CurrentForm->getValue("isFreeze") : $CurrentForm->getValue("x_isFreeze");
		if (!$this->isFreeze->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->isFreeze->Visible = FALSE; // Disable update for API request
			else
				$this->isFreeze->setFormValue($val);
		}

		// Check field name 'Slno' first before field var 'x_Slno'
		$val = $CurrentForm->hasValue("Slno") ? $CurrentForm->getValue("Slno") : $CurrentForm->getValue("x_Slno");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->StationId->CurrentValue = $this->StationId->FormValue;
		$this->obs_DateTime->CurrentValue = $this->obs_DateTime->FormValue;
		$this->obs_DateTime->CurrentValue = UnFormatDateTime($this->obs_DateTime->CurrentValue, 7);
		$this->Temp_water_in_pan_inC_830AM->CurrentValue = $this->Temp_water_in_pan_inC_830AM->FormValue;
		$this->Temp_water_in_pan_inC_530PM->CurrentValue = $this->Temp_water_in_pan_inC_530PM->FormValue;
		$this->App_Evaporation_inMM_830AM->CurrentValue = $this->App_Evaporation_inMM_830AM->FormValue;
		$this->App_Evaporation_inMM_530PM->CurrentValue = $this->App_Evaporation_inMM_530PM->FormValue;
		$this->Rainfall_inMM_830AM->CurrentValue = $this->Rainfall_inMM_830AM->FormValue;
		$this->Rainfall_inMM_530PM->CurrentValue = $this->Rainfall_inMM_530PM->FormValue;
		$this->Evaporation_curing_inMM_830AM->CurrentValue = $this->Evaporation_curing_inMM_830AM->FormValue;
		$this->Evaporation_curing_inMM_530PM->CurrentValue = $this->Evaporation_curing_inMM_530PM->FormValue;
		$this->Evaporation_curing_DaywithRain_inMM->CurrentValue = $this->Evaporation_curing_DaywithRain_inMM->FormValue;
		$this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue = $this->Evaporation_curing_DaywithNoRain_inMM->FormValue;
		$this->Dry_Bulb_Temp_inC_830AM->CurrentValue = $this->Dry_Bulb_Temp_inC_830AM->FormValue;
		$this->Wet_Bulb_Temp_inC_830AM->CurrentValue = $this->Wet_Bulb_Temp_inC_830AM->FormValue;
		$this->Vapour_Temp_inC_830AM->CurrentValue = $this->Vapour_Temp_inC_830AM->FormValue;
		$this->Dry_Bulb_Temp_inC_530PM->CurrentValue = $this->Dry_Bulb_Temp_inC_530PM->FormValue;
		$this->Wet_Bulb_Temp_inC_530PM->CurrentValue = $this->Wet_Bulb_Temp_inC_530PM->FormValue;
		$this->Vapour_Temp_inC_530PM->CurrentValue = $this->Vapour_Temp_inC_530PM->FormValue;
		$this->Max_Temp_inC->CurrentValue = $this->Max_Temp_inC->FormValue;
		$this->Min_Temp_inC->CurrentValue = $this->Min_Temp_inC->FormValue;
		$this->Total_Wind_Run_inKM_830AM->CurrentValue = $this->Total_Wind_Run_inKM_830AM->FormValue;
		$this->Total_Wind_Run_inKM_530PM->CurrentValue = $this->Total_Wind_Run_inKM_530PM->FormValue;
		$this->Average_Wind_Speed_inKM->CurrentValue = $this->Average_Wind_Speed_inKM->FormValue;
		$this->Number_of_Hours_of_Brightsuned->CurrentValue = $this->Number_of_Hours_of_Brightsuned->FormValue;
		$this->Relative_Humidity_in_Precentage_830AM->CurrentValue = $this->Relative_Humidity_in_Precentage_830AM->FormValue;
		$this->Relative_Humidity_in_Precentage_530PM->CurrentValue = $this->Relative_Humidity_in_Precentage_530PM->FormValue;
		$this->obs_remarks->CurrentValue = $this->obs_remarks->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->Validated->CurrentValue = $this->Validated->FormValue;
		$this->isFreeze->CurrentValue = $this->isFreeze->FormValue;
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
		$this->StationId->setDbValue($row['StationId']);
		$this->obs_DateTime->setDbValue($row['obs_DateTime']);
		$this->Temp_water_in_pan_inC_830AM->setDbValue($row['Temp_water_in_pan_inC_830AM']);
		$this->Temp_water_in_pan_inC_530PM->setDbValue($row['Temp_water_in_pan_inC_530PM']);
		$this->App_Evaporation_inMM_830AM->setDbValue($row['App_Evaporation_inMM_830AM']);
		$this->App_Evaporation_inMM_530PM->setDbValue($row['App_Evaporation_inMM_530PM']);
		$this->Rainfall_inMM_830AM->setDbValue($row['Rainfall_inMM_830AM']);
		$this->Rainfall_inMM_530PM->setDbValue($row['Rainfall_inMM_530PM']);
		$this->Evaporation_curing_inMM_830AM->setDbValue($row['Evaporation_curing_inMM_830AM']);
		$this->Evaporation_curing_inMM_530PM->setDbValue($row['Evaporation_curing_inMM_530PM']);
		$this->Evaporation_curing_DaywithRain_inMM->setDbValue($row['Evaporation_curing_DaywithRain_inMM']);
		$this->Evaporation_curing_DaywithNoRain_inMM->setDbValue($row['Evaporation_curing_DaywithNoRain_inMM']);
		$this->Dry_Bulb_Temp_inC_830AM->setDbValue($row['Dry_Bulb_Temp_inC_830AM']);
		$this->Wet_Bulb_Temp_inC_830AM->setDbValue($row['Wet_Bulb_Temp_inC_830AM']);
		$this->Vapour_Temp_inC_830AM->setDbValue($row['Vapour_Temp_inC_830AM']);
		$this->Dry_Bulb_Temp_inC_530PM->setDbValue($row['Dry_Bulb_Temp_inC_530PM']);
		$this->Wet_Bulb_Temp_inC_530PM->setDbValue($row['Wet_Bulb_Temp_inC_530PM']);
		$this->Vapour_Temp_inC_530PM->setDbValue($row['Vapour_Temp_inC_530PM']);
		$this->Max_Temp_inC->setDbValue($row['Max_Temp_inC']);
		$this->Min_Temp_inC->setDbValue($row['Min_Temp_inC']);
		$this->Total_Wind_Run_inKM_830AM->setDbValue($row['Total_Wind_Run_inKM_830AM']);
		$this->Total_Wind_Run_inKM_530PM->setDbValue($row['Total_Wind_Run_inKM_530PM']);
		$this->Average_Wind_Speed_inKM->setDbValue($row['Average_Wind_Speed_inKM']);
		$this->Number_of_Hours_of_Brightsuned->setDbValue($row['Number_of_Hours_of_Brightsuned']);
		$this->Relative_Humidity_in_Precentage_830AM->setDbValue($row['Relative_Humidity_in_Precentage_830AM']);
		$this->Relative_Humidity_in_Precentage_530PM->setDbValue($row['Relative_Humidity_in_Precentage_530PM']);
		$this->obs_remarks->setDbValue($row['obs_remarks']);
		$this->Status->setDbValue($row['Status']);
		$this->Validated->setDbValue($row['Validated']);
		$this->isFreeze->setDbValue($row['isFreeze']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['Slno'] = $this->Slno->CurrentValue;
		$row['StationId'] = $this->StationId->CurrentValue;
		$row['obs_DateTime'] = $this->obs_DateTime->CurrentValue;
		$row['Temp_water_in_pan_inC_830AM'] = $this->Temp_water_in_pan_inC_830AM->CurrentValue;
		$row['Temp_water_in_pan_inC_530PM'] = $this->Temp_water_in_pan_inC_530PM->CurrentValue;
		$row['App_Evaporation_inMM_830AM'] = $this->App_Evaporation_inMM_830AM->CurrentValue;
		$row['App_Evaporation_inMM_530PM'] = $this->App_Evaporation_inMM_530PM->CurrentValue;
		$row['Rainfall_inMM_830AM'] = $this->Rainfall_inMM_830AM->CurrentValue;
		$row['Rainfall_inMM_530PM'] = $this->Rainfall_inMM_530PM->CurrentValue;
		$row['Evaporation_curing_inMM_830AM'] = $this->Evaporation_curing_inMM_830AM->CurrentValue;
		$row['Evaporation_curing_inMM_530PM'] = $this->Evaporation_curing_inMM_530PM->CurrentValue;
		$row['Evaporation_curing_DaywithRain_inMM'] = $this->Evaporation_curing_DaywithRain_inMM->CurrentValue;
		$row['Evaporation_curing_DaywithNoRain_inMM'] = $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue;
		$row['Dry_Bulb_Temp_inC_830AM'] = $this->Dry_Bulb_Temp_inC_830AM->CurrentValue;
		$row['Wet_Bulb_Temp_inC_830AM'] = $this->Wet_Bulb_Temp_inC_830AM->CurrentValue;
		$row['Vapour_Temp_inC_830AM'] = $this->Vapour_Temp_inC_830AM->CurrentValue;
		$row['Dry_Bulb_Temp_inC_530PM'] = $this->Dry_Bulb_Temp_inC_530PM->CurrentValue;
		$row['Wet_Bulb_Temp_inC_530PM'] = $this->Wet_Bulb_Temp_inC_530PM->CurrentValue;
		$row['Vapour_Temp_inC_530PM'] = $this->Vapour_Temp_inC_530PM->CurrentValue;
		$row['Max_Temp_inC'] = $this->Max_Temp_inC->CurrentValue;
		$row['Min_Temp_inC'] = $this->Min_Temp_inC->CurrentValue;
		$row['Total_Wind_Run_inKM_830AM'] = $this->Total_Wind_Run_inKM_830AM->CurrentValue;
		$row['Total_Wind_Run_inKM_530PM'] = $this->Total_Wind_Run_inKM_530PM->CurrentValue;
		$row['Average_Wind_Speed_inKM'] = $this->Average_Wind_Speed_inKM->CurrentValue;
		$row['Number_of_Hours_of_Brightsuned'] = $this->Number_of_Hours_of_Brightsuned->CurrentValue;
		$row['Relative_Humidity_in_Precentage_830AM'] = $this->Relative_Humidity_in_Precentage_830AM->CurrentValue;
		$row['Relative_Humidity_in_Precentage_530PM'] = $this->Relative_Humidity_in_Precentage_530PM->CurrentValue;
		$row['obs_remarks'] = $this->obs_remarks->CurrentValue;
		$row['Status'] = $this->Status->CurrentValue;
		$row['Validated'] = $this->Validated->CurrentValue;
		$row['isFreeze'] = $this->isFreeze->CurrentValue;
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

		if ($this->Temp_water_in_pan_inC_830AM->FormValue == $this->Temp_water_in_pan_inC_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->Temp_water_in_pan_inC_830AM->CurrentValue)))
			$this->Temp_water_in_pan_inC_830AM->CurrentValue = ConvertToFloatString($this->Temp_water_in_pan_inC_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Temp_water_in_pan_inC_530PM->FormValue == $this->Temp_water_in_pan_inC_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->Temp_water_in_pan_inC_530PM->CurrentValue)))
			$this->Temp_water_in_pan_inC_530PM->CurrentValue = ConvertToFloatString($this->Temp_water_in_pan_inC_530PM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->App_Evaporation_inMM_830AM->FormValue == $this->App_Evaporation_inMM_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->App_Evaporation_inMM_830AM->CurrentValue)))
			$this->App_Evaporation_inMM_830AM->CurrentValue = ConvertToFloatString($this->App_Evaporation_inMM_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->App_Evaporation_inMM_530PM->FormValue == $this->App_Evaporation_inMM_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->App_Evaporation_inMM_530PM->CurrentValue)))
			$this->App_Evaporation_inMM_530PM->CurrentValue = ConvertToFloatString($this->App_Evaporation_inMM_530PM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Rainfall_inMM_830AM->FormValue == $this->Rainfall_inMM_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->Rainfall_inMM_830AM->CurrentValue)))
			$this->Rainfall_inMM_830AM->CurrentValue = ConvertToFloatString($this->Rainfall_inMM_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Rainfall_inMM_530PM->FormValue == $this->Rainfall_inMM_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->Rainfall_inMM_530PM->CurrentValue)))
			$this->Rainfall_inMM_530PM->CurrentValue = ConvertToFloatString($this->Rainfall_inMM_530PM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Evaporation_curing_inMM_830AM->FormValue == $this->Evaporation_curing_inMM_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->Evaporation_curing_inMM_830AM->CurrentValue)))
			$this->Evaporation_curing_inMM_830AM->CurrentValue = ConvertToFloatString($this->Evaporation_curing_inMM_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Evaporation_curing_inMM_530PM->FormValue == $this->Evaporation_curing_inMM_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->Evaporation_curing_inMM_530PM->CurrentValue)))
			$this->Evaporation_curing_inMM_530PM->CurrentValue = ConvertToFloatString($this->Evaporation_curing_inMM_530PM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Evaporation_curing_DaywithRain_inMM->FormValue == $this->Evaporation_curing_DaywithRain_inMM->CurrentValue && is_numeric(ConvertToFloatString($this->Evaporation_curing_DaywithRain_inMM->CurrentValue)))
			$this->Evaporation_curing_DaywithRain_inMM->CurrentValue = ConvertToFloatString($this->Evaporation_curing_DaywithRain_inMM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Evaporation_curing_DaywithNoRain_inMM->FormValue == $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue && is_numeric(ConvertToFloatString($this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue)))
			$this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue = ConvertToFloatString($this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Dry_Bulb_Temp_inC_830AM->FormValue == $this->Dry_Bulb_Temp_inC_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->Dry_Bulb_Temp_inC_830AM->CurrentValue)))
			$this->Dry_Bulb_Temp_inC_830AM->CurrentValue = ConvertToFloatString($this->Dry_Bulb_Temp_inC_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Wet_Bulb_Temp_inC_830AM->FormValue == $this->Wet_Bulb_Temp_inC_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->Wet_Bulb_Temp_inC_830AM->CurrentValue)))
			$this->Wet_Bulb_Temp_inC_830AM->CurrentValue = ConvertToFloatString($this->Wet_Bulb_Temp_inC_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Vapour_Temp_inC_830AM->FormValue == $this->Vapour_Temp_inC_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->Vapour_Temp_inC_830AM->CurrentValue)))
			$this->Vapour_Temp_inC_830AM->CurrentValue = ConvertToFloatString($this->Vapour_Temp_inC_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Dry_Bulb_Temp_inC_530PM->FormValue == $this->Dry_Bulb_Temp_inC_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->Dry_Bulb_Temp_inC_530PM->CurrentValue)))
			$this->Dry_Bulb_Temp_inC_530PM->CurrentValue = ConvertToFloatString($this->Dry_Bulb_Temp_inC_530PM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Wet_Bulb_Temp_inC_530PM->FormValue == $this->Wet_Bulb_Temp_inC_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->Wet_Bulb_Temp_inC_530PM->CurrentValue)))
			$this->Wet_Bulb_Temp_inC_530PM->CurrentValue = ConvertToFloatString($this->Wet_Bulb_Temp_inC_530PM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Vapour_Temp_inC_530PM->FormValue == $this->Vapour_Temp_inC_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->Vapour_Temp_inC_530PM->CurrentValue)))
			$this->Vapour_Temp_inC_530PM->CurrentValue = ConvertToFloatString($this->Vapour_Temp_inC_530PM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Max_Temp_inC->FormValue == $this->Max_Temp_inC->CurrentValue && is_numeric(ConvertToFloatString($this->Max_Temp_inC->CurrentValue)))
			$this->Max_Temp_inC->CurrentValue = ConvertToFloatString($this->Max_Temp_inC->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Min_Temp_inC->FormValue == $this->Min_Temp_inC->CurrentValue && is_numeric(ConvertToFloatString($this->Min_Temp_inC->CurrentValue)))
			$this->Min_Temp_inC->CurrentValue = ConvertToFloatString($this->Min_Temp_inC->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Total_Wind_Run_inKM_830AM->FormValue == $this->Total_Wind_Run_inKM_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->Total_Wind_Run_inKM_830AM->CurrentValue)))
			$this->Total_Wind_Run_inKM_830AM->CurrentValue = ConvertToFloatString($this->Total_Wind_Run_inKM_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Total_Wind_Run_inKM_530PM->FormValue == $this->Total_Wind_Run_inKM_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->Total_Wind_Run_inKM_530PM->CurrentValue)))
			$this->Total_Wind_Run_inKM_530PM->CurrentValue = ConvertToFloatString($this->Total_Wind_Run_inKM_530PM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Average_Wind_Speed_inKM->FormValue == $this->Average_Wind_Speed_inKM->CurrentValue && is_numeric(ConvertToFloatString($this->Average_Wind_Speed_inKM->CurrentValue)))
			$this->Average_Wind_Speed_inKM->CurrentValue = ConvertToFloatString($this->Average_Wind_Speed_inKM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Number_of_Hours_of_Brightsuned->FormValue == $this->Number_of_Hours_of_Brightsuned->CurrentValue && is_numeric(ConvertToFloatString($this->Number_of_Hours_of_Brightsuned->CurrentValue)))
			$this->Number_of_Hours_of_Brightsuned->CurrentValue = ConvertToFloatString($this->Number_of_Hours_of_Brightsuned->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Relative_Humidity_in_Precentage_830AM->FormValue == $this->Relative_Humidity_in_Precentage_830AM->CurrentValue && is_numeric(ConvertToFloatString($this->Relative_Humidity_in_Precentage_830AM->CurrentValue)))
			$this->Relative_Humidity_in_Precentage_830AM->CurrentValue = ConvertToFloatString($this->Relative_Humidity_in_Precentage_830AM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Relative_Humidity_in_Precentage_530PM->FormValue == $this->Relative_Humidity_in_Precentage_530PM->CurrentValue && is_numeric(ConvertToFloatString($this->Relative_Humidity_in_Precentage_530PM->CurrentValue)))
			$this->Relative_Humidity_in_Precentage_530PM->CurrentValue = ConvertToFloatString($this->Relative_Humidity_in_Precentage_530PM->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Slno
		// StationId
		// obs_DateTime
		// Temp_water_in_pan_inC_830AM
		// Temp_water_in_pan_inC_530PM
		// App_Evaporation_inMM_830AM
		// App_Evaporation_inMM_530PM
		// Rainfall_inMM_830AM
		// Rainfall_inMM_530PM
		// Evaporation_curing_inMM_830AM
		// Evaporation_curing_inMM_530PM
		// Evaporation_curing_DaywithRain_inMM
		// Evaporation_curing_DaywithNoRain_inMM
		// Dry_Bulb_Temp_inC_830AM
		// Wet_Bulb_Temp_inC_830AM
		// Vapour_Temp_inC_830AM
		// Dry_Bulb_Temp_inC_530PM
		// Wet_Bulb_Temp_inC_530PM
		// Vapour_Temp_inC_530PM
		// Max_Temp_inC
		// Min_Temp_inC
		// Total_Wind_Run_inKM_830AM
		// Total_Wind_Run_inKM_530PM
		// Average_Wind_Speed_inKM
		// Number_of_Hours_of_Brightsuned
		// Relative_Humidity_in_Precentage_830AM
		// Relative_Humidity_in_Precentage_530PM
		// obs_remarks
		// Status
		// Validated
		// isFreeze

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Slno
			$this->Slno->ViewValue = $this->Slno->CurrentValue;
			$this->Slno->ViewCustomAttributes = "";

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

			// obs_DateTime
			$this->obs_DateTime->ViewValue = $this->obs_DateTime->CurrentValue;
			$this->obs_DateTime->ViewValue = FormatDateTime($this->obs_DateTime->ViewValue, 7);
			$this->obs_DateTime->ViewCustomAttributes = "";

			// Temp_water_in_pan_inC_830AM
			$this->Temp_water_in_pan_inC_830AM->ViewValue = $this->Temp_water_in_pan_inC_830AM->CurrentValue;
			$this->Temp_water_in_pan_inC_830AM->ViewValue = FormatNumber($this->Temp_water_in_pan_inC_830AM->ViewValue, 1, -2, -2, -2);
			$this->Temp_water_in_pan_inC_830AM->ViewCustomAttributes = "";

			// Temp_water_in_pan_inC_530PM
			$this->Temp_water_in_pan_inC_530PM->ViewValue = $this->Temp_water_in_pan_inC_530PM->CurrentValue;
			$this->Temp_water_in_pan_inC_530PM->ViewValue = FormatNumber($this->Temp_water_in_pan_inC_530PM->ViewValue, 1, -2, -2, -2);
			$this->Temp_water_in_pan_inC_530PM->ViewCustomAttributes = "";

			// App_Evaporation_inMM_830AM
			$this->App_Evaporation_inMM_830AM->ViewValue = $this->App_Evaporation_inMM_830AM->CurrentValue;
			$this->App_Evaporation_inMM_830AM->ViewValue = FormatNumber($this->App_Evaporation_inMM_830AM->ViewValue, 1, -2, -2, -2);
			$this->App_Evaporation_inMM_830AM->ViewCustomAttributes = "";

			// App_Evaporation_inMM_530PM
			$this->App_Evaporation_inMM_530PM->ViewValue = $this->App_Evaporation_inMM_530PM->CurrentValue;
			$this->App_Evaporation_inMM_530PM->ViewValue = FormatNumber($this->App_Evaporation_inMM_530PM->ViewValue, 2, -2, -2, -2);
			$this->App_Evaporation_inMM_530PM->ViewCustomAttributes = "";

			// Rainfall_inMM_830AM
			$this->Rainfall_inMM_830AM->ViewValue = $this->Rainfall_inMM_830AM->CurrentValue;
			$this->Rainfall_inMM_830AM->ViewValue = FormatNumber($this->Rainfall_inMM_830AM->ViewValue, 1, -2, -2, -2);
			$this->Rainfall_inMM_830AM->ViewCustomAttributes = "";

			// Rainfall_inMM_530PM
			$this->Rainfall_inMM_530PM->ViewValue = $this->Rainfall_inMM_530PM->CurrentValue;
			$this->Rainfall_inMM_530PM->ViewValue = FormatNumber($this->Rainfall_inMM_530PM->ViewValue, 1, -2, -2, -2);
			$this->Rainfall_inMM_530PM->ViewCustomAttributes = "";

			// Evaporation_curing_inMM_830AM
			$this->Evaporation_curing_inMM_830AM->ViewValue = $this->Evaporation_curing_inMM_830AM->CurrentValue;
			$this->Evaporation_curing_inMM_830AM->ViewValue = FormatNumber($this->Evaporation_curing_inMM_830AM->ViewValue, 1, -2, -2, -2);
			$this->Evaporation_curing_inMM_830AM->ViewCustomAttributes = "";

			// Evaporation_curing_inMM_530PM
			$this->Evaporation_curing_inMM_530PM->ViewValue = $this->Evaporation_curing_inMM_530PM->CurrentValue;
			$this->Evaporation_curing_inMM_530PM->ViewValue = FormatNumber($this->Evaporation_curing_inMM_530PM->ViewValue, 1, -2, -2, -2);
			$this->Evaporation_curing_inMM_530PM->ViewCustomAttributes = "";

			// Evaporation_curing_DaywithRain_inMM
			$this->Evaporation_curing_DaywithRain_inMM->ViewValue = $this->Evaporation_curing_DaywithRain_inMM->CurrentValue;
			$this->Evaporation_curing_DaywithRain_inMM->ViewValue = FormatNumber($this->Evaporation_curing_DaywithRain_inMM->ViewValue, 1, -2, -2, -2);
			$this->Evaporation_curing_DaywithRain_inMM->ViewCustomAttributes = "";

			// Evaporation_curing_DaywithNoRain_inMM
			$this->Evaporation_curing_DaywithNoRain_inMM->ViewValue = $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue;
			$this->Evaporation_curing_DaywithNoRain_inMM->ViewValue = FormatNumber($this->Evaporation_curing_DaywithNoRain_inMM->ViewValue, 1, -2, -2, -2);
			$this->Evaporation_curing_DaywithNoRain_inMM->ViewCustomAttributes = "";

			// Dry_Bulb_Temp_inC_830AM
			$this->Dry_Bulb_Temp_inC_830AM->ViewValue = $this->Dry_Bulb_Temp_inC_830AM->CurrentValue;
			$this->Dry_Bulb_Temp_inC_830AM->ViewValue = FormatNumber($this->Dry_Bulb_Temp_inC_830AM->ViewValue, 2, -2, -2, -2);
			$this->Dry_Bulb_Temp_inC_830AM->ViewCustomAttributes = "";

			// Wet_Bulb_Temp_inC_830AM
			$this->Wet_Bulb_Temp_inC_830AM->ViewValue = $this->Wet_Bulb_Temp_inC_830AM->CurrentValue;
			$this->Wet_Bulb_Temp_inC_830AM->ViewValue = FormatNumber($this->Wet_Bulb_Temp_inC_830AM->ViewValue, 2, -2, -2, -2);
			$this->Wet_Bulb_Temp_inC_830AM->ViewCustomAttributes = "";

			// Vapour_Temp_inC_830AM
			$this->Vapour_Temp_inC_830AM->ViewValue = $this->Vapour_Temp_inC_830AM->CurrentValue;
			$this->Vapour_Temp_inC_830AM->ViewValue = FormatNumber($this->Vapour_Temp_inC_830AM->ViewValue, 2, -2, -2, -2);
			$this->Vapour_Temp_inC_830AM->ViewCustomAttributes = "";

			// Dry_Bulb_Temp_inC_530PM
			$this->Dry_Bulb_Temp_inC_530PM->ViewValue = $this->Dry_Bulb_Temp_inC_530PM->CurrentValue;
			$this->Dry_Bulb_Temp_inC_530PM->ViewValue = FormatNumber($this->Dry_Bulb_Temp_inC_530PM->ViewValue, 2, -2, -2, -2);
			$this->Dry_Bulb_Temp_inC_530PM->ViewCustomAttributes = "";

			// Wet_Bulb_Temp_inC_530PM
			$this->Wet_Bulb_Temp_inC_530PM->ViewValue = $this->Wet_Bulb_Temp_inC_530PM->CurrentValue;
			$this->Wet_Bulb_Temp_inC_530PM->ViewValue = FormatNumber($this->Wet_Bulb_Temp_inC_530PM->ViewValue, 2, -2, -2, -2);
			$this->Wet_Bulb_Temp_inC_530PM->ViewCustomAttributes = "";

			// Vapour_Temp_inC_530PM
			$this->Vapour_Temp_inC_530PM->ViewValue = $this->Vapour_Temp_inC_530PM->CurrentValue;
			$this->Vapour_Temp_inC_530PM->ViewValue = FormatNumber($this->Vapour_Temp_inC_530PM->ViewValue, 2, -2, -2, -2);
			$this->Vapour_Temp_inC_530PM->ViewCustomAttributes = "";

			// Max_Temp_inC
			$this->Max_Temp_inC->ViewValue = $this->Max_Temp_inC->CurrentValue;
			$this->Max_Temp_inC->ViewValue = FormatNumber($this->Max_Temp_inC->ViewValue, 2, -2, -2, -2);
			$this->Max_Temp_inC->ViewCustomAttributes = "";

			// Min_Temp_inC
			$this->Min_Temp_inC->ViewValue = $this->Min_Temp_inC->CurrentValue;
			$this->Min_Temp_inC->ViewValue = FormatNumber($this->Min_Temp_inC->ViewValue, 2, -2, -2, -2);
			$this->Min_Temp_inC->ViewCustomAttributes = "";

			// Total_Wind_Run_inKM_830AM
			$this->Total_Wind_Run_inKM_830AM->ViewValue = $this->Total_Wind_Run_inKM_830AM->CurrentValue;
			$this->Total_Wind_Run_inKM_830AM->ViewValue = FormatNumber($this->Total_Wind_Run_inKM_830AM->ViewValue, 2, -2, -2, -2);
			$this->Total_Wind_Run_inKM_830AM->ViewCustomAttributes = "";

			// Total_Wind_Run_inKM_530PM
			$this->Total_Wind_Run_inKM_530PM->ViewValue = $this->Total_Wind_Run_inKM_530PM->CurrentValue;
			$this->Total_Wind_Run_inKM_530PM->ViewValue = FormatNumber($this->Total_Wind_Run_inKM_530PM->ViewValue, 2, -2, -2, -2);
			$this->Total_Wind_Run_inKM_530PM->ViewCustomAttributes = "";

			// Average_Wind_Speed_inKM
			$this->Average_Wind_Speed_inKM->ViewValue = $this->Average_Wind_Speed_inKM->CurrentValue;
			$this->Average_Wind_Speed_inKM->ViewValue = FormatNumber($this->Average_Wind_Speed_inKM->ViewValue, 2, -2, -2, -2);
			$this->Average_Wind_Speed_inKM->ViewCustomAttributes = "";

			// Number_of_Hours_of_Brightsuned
			$this->Number_of_Hours_of_Brightsuned->ViewValue = $this->Number_of_Hours_of_Brightsuned->CurrentValue;
			$this->Number_of_Hours_of_Brightsuned->ViewValue = FormatNumber($this->Number_of_Hours_of_Brightsuned->ViewValue, 2, -2, -2, -2);
			$this->Number_of_Hours_of_Brightsuned->ViewCustomAttributes = "";

			// Relative_Humidity_in_Precentage_830AM
			$this->Relative_Humidity_in_Precentage_830AM->ViewValue = $this->Relative_Humidity_in_Precentage_830AM->CurrentValue;
			$this->Relative_Humidity_in_Precentage_830AM->ViewValue = FormatNumber($this->Relative_Humidity_in_Precentage_830AM->ViewValue, 2, -2, -2, -2);
			$this->Relative_Humidity_in_Precentage_830AM->ViewCustomAttributes = "";

			// Relative_Humidity_in_Precentage_530PM
			$this->Relative_Humidity_in_Precentage_530PM->ViewValue = $this->Relative_Humidity_in_Precentage_530PM->CurrentValue;
			$this->Relative_Humidity_in_Precentage_530PM->ViewValue = FormatNumber($this->Relative_Humidity_in_Precentage_530PM->ViewValue, 2, -2, -2, -2);
			$this->Relative_Humidity_in_Precentage_530PM->ViewCustomAttributes = "";

			// obs_remarks
			$this->obs_remarks->ViewValue = $this->obs_remarks->CurrentValue;
			$this->obs_remarks->ViewCustomAttributes = "";

			// Status
			$this->Status->ViewValue = $this->Status->CurrentValue;
			$this->Status->ViewValue = FormatNumber($this->Status->ViewValue, 0, -2, -2, -2);
			$this->Status->ViewCustomAttributes = "";

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

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// obs_DateTime
			$this->obs_DateTime->LinkCustomAttributes = "";
			$this->obs_DateTime->HrefValue = "";
			$this->obs_DateTime->TooltipValue = "";

			// Temp_water_in_pan_inC_830AM
			$this->Temp_water_in_pan_inC_830AM->LinkCustomAttributes = "";
			$this->Temp_water_in_pan_inC_830AM->HrefValue = "";
			$this->Temp_water_in_pan_inC_830AM->TooltipValue = "";

			// Temp_water_in_pan_inC_530PM
			$this->Temp_water_in_pan_inC_530PM->LinkCustomAttributes = "";
			$this->Temp_water_in_pan_inC_530PM->HrefValue = "";
			$this->Temp_water_in_pan_inC_530PM->TooltipValue = "";

			// App_Evaporation_inMM_830AM
			$this->App_Evaporation_inMM_830AM->LinkCustomAttributes = "";
			$this->App_Evaporation_inMM_830AM->HrefValue = "";
			$this->App_Evaporation_inMM_830AM->TooltipValue = "";

			// App_Evaporation_inMM_530PM
			$this->App_Evaporation_inMM_530PM->LinkCustomAttributes = "";
			$this->App_Evaporation_inMM_530PM->HrefValue = "";
			$this->App_Evaporation_inMM_530PM->TooltipValue = "";

			// Rainfall_inMM_830AM
			$this->Rainfall_inMM_830AM->LinkCustomAttributes = "";
			$this->Rainfall_inMM_830AM->HrefValue = "";
			$this->Rainfall_inMM_830AM->TooltipValue = "";

			// Rainfall_inMM_530PM
			$this->Rainfall_inMM_530PM->LinkCustomAttributes = "";
			$this->Rainfall_inMM_530PM->HrefValue = "";
			$this->Rainfall_inMM_530PM->TooltipValue = "";

			// Evaporation_curing_inMM_830AM
			$this->Evaporation_curing_inMM_830AM->LinkCustomAttributes = "";
			$this->Evaporation_curing_inMM_830AM->HrefValue = "";
			$this->Evaporation_curing_inMM_830AM->TooltipValue = "";

			// Evaporation_curing_inMM_530PM
			$this->Evaporation_curing_inMM_530PM->LinkCustomAttributes = "";
			$this->Evaporation_curing_inMM_530PM->HrefValue = "";
			$this->Evaporation_curing_inMM_530PM->TooltipValue = "";

			// Evaporation_curing_DaywithRain_inMM
			$this->Evaporation_curing_DaywithRain_inMM->LinkCustomAttributes = "";
			$this->Evaporation_curing_DaywithRain_inMM->HrefValue = "";
			$this->Evaporation_curing_DaywithRain_inMM->TooltipValue = "";

			// Evaporation_curing_DaywithNoRain_inMM
			$this->Evaporation_curing_DaywithNoRain_inMM->LinkCustomAttributes = "";
			$this->Evaporation_curing_DaywithNoRain_inMM->HrefValue = "";
			$this->Evaporation_curing_DaywithNoRain_inMM->TooltipValue = "";

			// Dry_Bulb_Temp_inC_830AM
			$this->Dry_Bulb_Temp_inC_830AM->LinkCustomAttributes = "";
			$this->Dry_Bulb_Temp_inC_830AM->HrefValue = "";
			$this->Dry_Bulb_Temp_inC_830AM->TooltipValue = "";

			// Wet_Bulb_Temp_inC_830AM
			$this->Wet_Bulb_Temp_inC_830AM->LinkCustomAttributes = "";
			$this->Wet_Bulb_Temp_inC_830AM->HrefValue = "";
			$this->Wet_Bulb_Temp_inC_830AM->TooltipValue = "";

			// Vapour_Temp_inC_830AM
			$this->Vapour_Temp_inC_830AM->LinkCustomAttributes = "";
			$this->Vapour_Temp_inC_830AM->HrefValue = "";
			$this->Vapour_Temp_inC_830AM->TooltipValue = "";

			// Dry_Bulb_Temp_inC_530PM
			$this->Dry_Bulb_Temp_inC_530PM->LinkCustomAttributes = "";
			$this->Dry_Bulb_Temp_inC_530PM->HrefValue = "";
			$this->Dry_Bulb_Temp_inC_530PM->TooltipValue = "";

			// Wet_Bulb_Temp_inC_530PM
			$this->Wet_Bulb_Temp_inC_530PM->LinkCustomAttributes = "";
			$this->Wet_Bulb_Temp_inC_530PM->HrefValue = "";
			$this->Wet_Bulb_Temp_inC_530PM->TooltipValue = "";

			// Vapour_Temp_inC_530PM
			$this->Vapour_Temp_inC_530PM->LinkCustomAttributes = "";
			$this->Vapour_Temp_inC_530PM->HrefValue = "";
			$this->Vapour_Temp_inC_530PM->TooltipValue = "";

			// Max_Temp_inC
			$this->Max_Temp_inC->LinkCustomAttributes = "";
			$this->Max_Temp_inC->HrefValue = "";
			$this->Max_Temp_inC->TooltipValue = "";

			// Min_Temp_inC
			$this->Min_Temp_inC->LinkCustomAttributes = "";
			$this->Min_Temp_inC->HrefValue = "";
			$this->Min_Temp_inC->TooltipValue = "";

			// Total_Wind_Run_inKM_830AM
			$this->Total_Wind_Run_inKM_830AM->LinkCustomAttributes = "";
			$this->Total_Wind_Run_inKM_830AM->HrefValue = "";
			$this->Total_Wind_Run_inKM_830AM->TooltipValue = "";

			// Total_Wind_Run_inKM_530PM
			$this->Total_Wind_Run_inKM_530PM->LinkCustomAttributes = "";
			$this->Total_Wind_Run_inKM_530PM->HrefValue = "";
			$this->Total_Wind_Run_inKM_530PM->TooltipValue = "";

			// Average_Wind_Speed_inKM
			$this->Average_Wind_Speed_inKM->LinkCustomAttributes = "";
			$this->Average_Wind_Speed_inKM->HrefValue = "";
			$this->Average_Wind_Speed_inKM->TooltipValue = "";

			// Number_of_Hours_of_Brightsuned
			$this->Number_of_Hours_of_Brightsuned->LinkCustomAttributes = "";
			$this->Number_of_Hours_of_Brightsuned->HrefValue = "";
			$this->Number_of_Hours_of_Brightsuned->TooltipValue = "";

			// Relative_Humidity_in_Precentage_830AM
			$this->Relative_Humidity_in_Precentage_830AM->LinkCustomAttributes = "";
			$this->Relative_Humidity_in_Precentage_830AM->HrefValue = "";
			$this->Relative_Humidity_in_Precentage_830AM->TooltipValue = "";

			// Relative_Humidity_in_Precentage_530PM
			$this->Relative_Humidity_in_Precentage_530PM->LinkCustomAttributes = "";
			$this->Relative_Humidity_in_Precentage_530PM->HrefValue = "";
			$this->Relative_Humidity_in_Precentage_530PM->TooltipValue = "";

			// obs_remarks
			$this->obs_remarks->LinkCustomAttributes = "";
			$this->obs_remarks->HrefValue = "";
			$this->obs_remarks->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// Validated
			$this->Validated->LinkCustomAttributes = "";
			$this->Validated->HrefValue = "";
			$this->Validated->TooltipValue = "";

			// isFreeze
			$this->isFreeze->LinkCustomAttributes = "";
			$this->isFreeze->HrefValue = "";
			$this->isFreeze->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

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

			// obs_DateTime
			$this->obs_DateTime->EditAttrs["class"] = "form-control";
			$this->obs_DateTime->EditCustomAttributes = "";
			$this->obs_DateTime->EditValue = HtmlEncode(FormatDateTime($this->obs_DateTime->CurrentValue, 7));

			// Temp_water_in_pan_inC_830AM
			$this->Temp_water_in_pan_inC_830AM->EditAttrs["class"] = "form-control";
			$this->Temp_water_in_pan_inC_830AM->EditCustomAttributes = "";
			$this->Temp_water_in_pan_inC_830AM->EditValue = HtmlEncode($this->Temp_water_in_pan_inC_830AM->CurrentValue);
			if (strval($this->Temp_water_in_pan_inC_830AM->EditValue) != "" && is_numeric($this->Temp_water_in_pan_inC_830AM->EditValue))
				$this->Temp_water_in_pan_inC_830AM->EditValue = FormatNumber($this->Temp_water_in_pan_inC_830AM->EditValue, -2, -2, -2, -2);
			

			// Temp_water_in_pan_inC_530PM
			$this->Temp_water_in_pan_inC_530PM->EditAttrs["class"] = "form-control";
			$this->Temp_water_in_pan_inC_530PM->EditCustomAttributes = "";
			$this->Temp_water_in_pan_inC_530PM->EditValue = HtmlEncode($this->Temp_water_in_pan_inC_530PM->CurrentValue);
			if (strval($this->Temp_water_in_pan_inC_530PM->EditValue) != "" && is_numeric($this->Temp_water_in_pan_inC_530PM->EditValue))
				$this->Temp_water_in_pan_inC_530PM->EditValue = FormatNumber($this->Temp_water_in_pan_inC_530PM->EditValue, -2, -2, -2, -2);
			

			// App_Evaporation_inMM_830AM
			$this->App_Evaporation_inMM_830AM->EditAttrs["class"] = "form-control";
			$this->App_Evaporation_inMM_830AM->EditCustomAttributes = "";
			$this->App_Evaporation_inMM_830AM->EditValue = HtmlEncode($this->App_Evaporation_inMM_830AM->CurrentValue);
			if (strval($this->App_Evaporation_inMM_830AM->EditValue) != "" && is_numeric($this->App_Evaporation_inMM_830AM->EditValue))
				$this->App_Evaporation_inMM_830AM->EditValue = FormatNumber($this->App_Evaporation_inMM_830AM->EditValue, -2, -2, -2, -2);
			

			// App_Evaporation_inMM_530PM
			$this->App_Evaporation_inMM_530PM->EditAttrs["class"] = "form-control";
			$this->App_Evaporation_inMM_530PM->EditCustomAttributes = "";
			$this->App_Evaporation_inMM_530PM->EditValue = HtmlEncode($this->App_Evaporation_inMM_530PM->CurrentValue);
			if (strval($this->App_Evaporation_inMM_530PM->EditValue) != "" && is_numeric($this->App_Evaporation_inMM_530PM->EditValue))
				$this->App_Evaporation_inMM_530PM->EditValue = FormatNumber($this->App_Evaporation_inMM_530PM->EditValue, -2, -2, -2, -2);
			

			// Rainfall_inMM_830AM
			$this->Rainfall_inMM_830AM->EditAttrs["class"] = "form-control";
			$this->Rainfall_inMM_830AM->EditCustomAttributes = "";
			$this->Rainfall_inMM_830AM->EditValue = HtmlEncode($this->Rainfall_inMM_830AM->CurrentValue);
			if (strval($this->Rainfall_inMM_830AM->EditValue) != "" && is_numeric($this->Rainfall_inMM_830AM->EditValue))
				$this->Rainfall_inMM_830AM->EditValue = FormatNumber($this->Rainfall_inMM_830AM->EditValue, -2, -2, -2, -2);
			

			// Rainfall_inMM_530PM
			$this->Rainfall_inMM_530PM->EditAttrs["class"] = "form-control";
			$this->Rainfall_inMM_530PM->EditCustomAttributes = "";
			$this->Rainfall_inMM_530PM->EditValue = HtmlEncode($this->Rainfall_inMM_530PM->CurrentValue);
			if (strval($this->Rainfall_inMM_530PM->EditValue) != "" && is_numeric($this->Rainfall_inMM_530PM->EditValue))
				$this->Rainfall_inMM_530PM->EditValue = FormatNumber($this->Rainfall_inMM_530PM->EditValue, -2, -2, -2, -2);
			

			// Evaporation_curing_inMM_830AM
			$this->Evaporation_curing_inMM_830AM->EditAttrs["class"] = "form-control";
			$this->Evaporation_curing_inMM_830AM->EditCustomAttributes = "";
			$this->Evaporation_curing_inMM_830AM->EditValue = HtmlEncode($this->Evaporation_curing_inMM_830AM->CurrentValue);
			if (strval($this->Evaporation_curing_inMM_830AM->EditValue) != "" && is_numeric($this->Evaporation_curing_inMM_830AM->EditValue))
				$this->Evaporation_curing_inMM_830AM->EditValue = FormatNumber($this->Evaporation_curing_inMM_830AM->EditValue, -2, -2, -2, -2);
			

			// Evaporation_curing_inMM_530PM
			$this->Evaporation_curing_inMM_530PM->EditAttrs["class"] = "form-control";
			$this->Evaporation_curing_inMM_530PM->EditCustomAttributes = "";
			$this->Evaporation_curing_inMM_530PM->EditValue = HtmlEncode($this->Evaporation_curing_inMM_530PM->CurrentValue);
			if (strval($this->Evaporation_curing_inMM_530PM->EditValue) != "" && is_numeric($this->Evaporation_curing_inMM_530PM->EditValue))
				$this->Evaporation_curing_inMM_530PM->EditValue = FormatNumber($this->Evaporation_curing_inMM_530PM->EditValue, -2, -2, -2, -2);
			

			// Evaporation_curing_DaywithRain_inMM
			$this->Evaporation_curing_DaywithRain_inMM->EditAttrs["class"] = "form-control";
			$this->Evaporation_curing_DaywithRain_inMM->EditCustomAttributes = "";
			$this->Evaporation_curing_DaywithRain_inMM->EditValue = HtmlEncode($this->Evaporation_curing_DaywithRain_inMM->CurrentValue);
			if (strval($this->Evaporation_curing_DaywithRain_inMM->EditValue) != "" && is_numeric($this->Evaporation_curing_DaywithRain_inMM->EditValue))
				$this->Evaporation_curing_DaywithRain_inMM->EditValue = FormatNumber($this->Evaporation_curing_DaywithRain_inMM->EditValue, -2, -2, -2, -2);
			

			// Evaporation_curing_DaywithNoRain_inMM
			$this->Evaporation_curing_DaywithNoRain_inMM->EditAttrs["class"] = "form-control";
			$this->Evaporation_curing_DaywithNoRain_inMM->EditCustomAttributes = "";
			$this->Evaporation_curing_DaywithNoRain_inMM->EditValue = HtmlEncode($this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue);
			if (strval($this->Evaporation_curing_DaywithNoRain_inMM->EditValue) != "" && is_numeric($this->Evaporation_curing_DaywithNoRain_inMM->EditValue))
				$this->Evaporation_curing_DaywithNoRain_inMM->EditValue = FormatNumber($this->Evaporation_curing_DaywithNoRain_inMM->EditValue, -2, -2, -2, -2);
			

			// Dry_Bulb_Temp_inC_830AM
			$this->Dry_Bulb_Temp_inC_830AM->EditAttrs["class"] = "form-control";
			$this->Dry_Bulb_Temp_inC_830AM->EditCustomAttributes = "";
			$this->Dry_Bulb_Temp_inC_830AM->EditValue = HtmlEncode($this->Dry_Bulb_Temp_inC_830AM->CurrentValue);
			if (strval($this->Dry_Bulb_Temp_inC_830AM->EditValue) != "" && is_numeric($this->Dry_Bulb_Temp_inC_830AM->EditValue))
				$this->Dry_Bulb_Temp_inC_830AM->EditValue = FormatNumber($this->Dry_Bulb_Temp_inC_830AM->EditValue, -2, -2, -2, -2);
			

			// Wet_Bulb_Temp_inC_830AM
			$this->Wet_Bulb_Temp_inC_830AM->EditAttrs["class"] = "form-control";
			$this->Wet_Bulb_Temp_inC_830AM->EditCustomAttributes = "";
			$this->Wet_Bulb_Temp_inC_830AM->EditValue = HtmlEncode($this->Wet_Bulb_Temp_inC_830AM->CurrentValue);
			if (strval($this->Wet_Bulb_Temp_inC_830AM->EditValue) != "" && is_numeric($this->Wet_Bulb_Temp_inC_830AM->EditValue))
				$this->Wet_Bulb_Temp_inC_830AM->EditValue = FormatNumber($this->Wet_Bulb_Temp_inC_830AM->EditValue, -2, -2, -2, -2);
			

			// Vapour_Temp_inC_830AM
			$this->Vapour_Temp_inC_830AM->EditAttrs["class"] = "form-control";
			$this->Vapour_Temp_inC_830AM->EditCustomAttributes = "";
			$this->Vapour_Temp_inC_830AM->EditValue = HtmlEncode($this->Vapour_Temp_inC_830AM->CurrentValue);
			if (strval($this->Vapour_Temp_inC_830AM->EditValue) != "" && is_numeric($this->Vapour_Temp_inC_830AM->EditValue))
				$this->Vapour_Temp_inC_830AM->EditValue = FormatNumber($this->Vapour_Temp_inC_830AM->EditValue, -2, -2, -2, -2);
			

			// Dry_Bulb_Temp_inC_530PM
			$this->Dry_Bulb_Temp_inC_530PM->EditAttrs["class"] = "form-control";
			$this->Dry_Bulb_Temp_inC_530PM->EditCustomAttributes = "";
			$this->Dry_Bulb_Temp_inC_530PM->EditValue = HtmlEncode($this->Dry_Bulb_Temp_inC_530PM->CurrentValue);
			if (strval($this->Dry_Bulb_Temp_inC_530PM->EditValue) != "" && is_numeric($this->Dry_Bulb_Temp_inC_530PM->EditValue))
				$this->Dry_Bulb_Temp_inC_530PM->EditValue = FormatNumber($this->Dry_Bulb_Temp_inC_530PM->EditValue, -2, -2, -2, -2);
			

			// Wet_Bulb_Temp_inC_530PM
			$this->Wet_Bulb_Temp_inC_530PM->EditAttrs["class"] = "form-control";
			$this->Wet_Bulb_Temp_inC_530PM->EditCustomAttributes = "";
			$this->Wet_Bulb_Temp_inC_530PM->EditValue = HtmlEncode($this->Wet_Bulb_Temp_inC_530PM->CurrentValue);
			if (strval($this->Wet_Bulb_Temp_inC_530PM->EditValue) != "" && is_numeric($this->Wet_Bulb_Temp_inC_530PM->EditValue))
				$this->Wet_Bulb_Temp_inC_530PM->EditValue = FormatNumber($this->Wet_Bulb_Temp_inC_530PM->EditValue, -2, -2, -2, -2);
			

			// Vapour_Temp_inC_530PM
			$this->Vapour_Temp_inC_530PM->EditAttrs["class"] = "form-control";
			$this->Vapour_Temp_inC_530PM->EditCustomAttributes = "";
			$this->Vapour_Temp_inC_530PM->EditValue = HtmlEncode($this->Vapour_Temp_inC_530PM->CurrentValue);
			if (strval($this->Vapour_Temp_inC_530PM->EditValue) != "" && is_numeric($this->Vapour_Temp_inC_530PM->EditValue))
				$this->Vapour_Temp_inC_530PM->EditValue = FormatNumber($this->Vapour_Temp_inC_530PM->EditValue, -2, -2, -2, -2);
			

			// Max_Temp_inC
			$this->Max_Temp_inC->EditAttrs["class"] = "form-control";
			$this->Max_Temp_inC->EditCustomAttributes = "";
			$this->Max_Temp_inC->EditValue = HtmlEncode($this->Max_Temp_inC->CurrentValue);
			if (strval($this->Max_Temp_inC->EditValue) != "" && is_numeric($this->Max_Temp_inC->EditValue))
				$this->Max_Temp_inC->EditValue = FormatNumber($this->Max_Temp_inC->EditValue, -2, -2, -2, -2);
			

			// Min_Temp_inC
			$this->Min_Temp_inC->EditAttrs["class"] = "form-control";
			$this->Min_Temp_inC->EditCustomAttributes = "";
			$this->Min_Temp_inC->EditValue = HtmlEncode($this->Min_Temp_inC->CurrentValue);
			if (strval($this->Min_Temp_inC->EditValue) != "" && is_numeric($this->Min_Temp_inC->EditValue))
				$this->Min_Temp_inC->EditValue = FormatNumber($this->Min_Temp_inC->EditValue, -2, -2, -2, -2);
			

			// Total_Wind_Run_inKM_830AM
			$this->Total_Wind_Run_inKM_830AM->EditAttrs["class"] = "form-control";
			$this->Total_Wind_Run_inKM_830AM->EditCustomAttributes = "";
			$this->Total_Wind_Run_inKM_830AM->EditValue = HtmlEncode($this->Total_Wind_Run_inKM_830AM->CurrentValue);
			if (strval($this->Total_Wind_Run_inKM_830AM->EditValue) != "" && is_numeric($this->Total_Wind_Run_inKM_830AM->EditValue))
				$this->Total_Wind_Run_inKM_830AM->EditValue = FormatNumber($this->Total_Wind_Run_inKM_830AM->EditValue, -2, -2, -2, -2);
			

			// Total_Wind_Run_inKM_530PM
			$this->Total_Wind_Run_inKM_530PM->EditAttrs["class"] = "form-control";
			$this->Total_Wind_Run_inKM_530PM->EditCustomAttributes = "";
			$this->Total_Wind_Run_inKM_530PM->EditValue = HtmlEncode($this->Total_Wind_Run_inKM_530PM->CurrentValue);
			if (strval($this->Total_Wind_Run_inKM_530PM->EditValue) != "" && is_numeric($this->Total_Wind_Run_inKM_530PM->EditValue))
				$this->Total_Wind_Run_inKM_530PM->EditValue = FormatNumber($this->Total_Wind_Run_inKM_530PM->EditValue, -2, -2, -2, -2);
			

			// Average_Wind_Speed_inKM
			$this->Average_Wind_Speed_inKM->EditAttrs["class"] = "form-control";
			$this->Average_Wind_Speed_inKM->EditCustomAttributes = "";
			$this->Average_Wind_Speed_inKM->EditValue = HtmlEncode($this->Average_Wind_Speed_inKM->CurrentValue);
			if (strval($this->Average_Wind_Speed_inKM->EditValue) != "" && is_numeric($this->Average_Wind_Speed_inKM->EditValue))
				$this->Average_Wind_Speed_inKM->EditValue = FormatNumber($this->Average_Wind_Speed_inKM->EditValue, -2, -2, -2, -2);
			

			// Number_of_Hours_of_Brightsuned
			$this->Number_of_Hours_of_Brightsuned->EditAttrs["class"] = "form-control";
			$this->Number_of_Hours_of_Brightsuned->EditCustomAttributes = "";
			$this->Number_of_Hours_of_Brightsuned->EditValue = HtmlEncode($this->Number_of_Hours_of_Brightsuned->CurrentValue);
			if (strval($this->Number_of_Hours_of_Brightsuned->EditValue) != "" && is_numeric($this->Number_of_Hours_of_Brightsuned->EditValue))
				$this->Number_of_Hours_of_Brightsuned->EditValue = FormatNumber($this->Number_of_Hours_of_Brightsuned->EditValue, -2, -2, -2, -2);
			

			// Relative_Humidity_in_Precentage_830AM
			$this->Relative_Humidity_in_Precentage_830AM->EditAttrs["class"] = "form-control";
			$this->Relative_Humidity_in_Precentage_830AM->EditCustomAttributes = "";
			$this->Relative_Humidity_in_Precentage_830AM->EditValue = HtmlEncode($this->Relative_Humidity_in_Precentage_830AM->CurrentValue);
			if (strval($this->Relative_Humidity_in_Precentage_830AM->EditValue) != "" && is_numeric($this->Relative_Humidity_in_Precentage_830AM->EditValue))
				$this->Relative_Humidity_in_Precentage_830AM->EditValue = FormatNumber($this->Relative_Humidity_in_Precentage_830AM->EditValue, -2, -2, -2, -2);
			

			// Relative_Humidity_in_Precentage_530PM
			$this->Relative_Humidity_in_Precentage_530PM->EditAttrs["class"] = "form-control";
			$this->Relative_Humidity_in_Precentage_530PM->EditCustomAttributes = "";
			$this->Relative_Humidity_in_Precentage_530PM->EditValue = HtmlEncode($this->Relative_Humidity_in_Precentage_530PM->CurrentValue);
			if (strval($this->Relative_Humidity_in_Precentage_530PM->EditValue) != "" && is_numeric($this->Relative_Humidity_in_Precentage_530PM->EditValue))
				$this->Relative_Humidity_in_Precentage_530PM->EditValue = FormatNumber($this->Relative_Humidity_in_Precentage_530PM->EditValue, -2, -2, -2, -2);
			

			// obs_remarks
			$this->obs_remarks->EditAttrs["class"] = "form-control";
			$this->obs_remarks->EditCustomAttributes = "";
			if (!$this->obs_remarks->Raw)
				$this->obs_remarks->CurrentValue = HtmlDecode($this->obs_remarks->CurrentValue);
			$this->obs_remarks->EditValue = HtmlEncode($this->obs_remarks->CurrentValue);

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);

			// Validated
			$this->Validated->EditAttrs["class"] = "form-control";
			$this->Validated->EditCustomAttributes = "";
			$this->Validated->EditValue = HtmlEncode($this->Validated->CurrentValue);

			// isFreeze
			$this->isFreeze->EditCustomAttributes = "";
			$this->isFreeze->EditValue = $this->isFreeze->options(FALSE);

			// Add refer script
			// StationId

			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";

			// obs_DateTime
			$this->obs_DateTime->LinkCustomAttributes = "";
			$this->obs_DateTime->HrefValue = "";

			// Temp_water_in_pan_inC_830AM
			$this->Temp_water_in_pan_inC_830AM->LinkCustomAttributes = "";
			$this->Temp_water_in_pan_inC_830AM->HrefValue = "";

			// Temp_water_in_pan_inC_530PM
			$this->Temp_water_in_pan_inC_530PM->LinkCustomAttributes = "";
			$this->Temp_water_in_pan_inC_530PM->HrefValue = "";

			// App_Evaporation_inMM_830AM
			$this->App_Evaporation_inMM_830AM->LinkCustomAttributes = "";
			$this->App_Evaporation_inMM_830AM->HrefValue = "";

			// App_Evaporation_inMM_530PM
			$this->App_Evaporation_inMM_530PM->LinkCustomAttributes = "";
			$this->App_Evaporation_inMM_530PM->HrefValue = "";

			// Rainfall_inMM_830AM
			$this->Rainfall_inMM_830AM->LinkCustomAttributes = "";
			$this->Rainfall_inMM_830AM->HrefValue = "";

			// Rainfall_inMM_530PM
			$this->Rainfall_inMM_530PM->LinkCustomAttributes = "";
			$this->Rainfall_inMM_530PM->HrefValue = "";

			// Evaporation_curing_inMM_830AM
			$this->Evaporation_curing_inMM_830AM->LinkCustomAttributes = "";
			$this->Evaporation_curing_inMM_830AM->HrefValue = "";

			// Evaporation_curing_inMM_530PM
			$this->Evaporation_curing_inMM_530PM->LinkCustomAttributes = "";
			$this->Evaporation_curing_inMM_530PM->HrefValue = "";

			// Evaporation_curing_DaywithRain_inMM
			$this->Evaporation_curing_DaywithRain_inMM->LinkCustomAttributes = "";
			$this->Evaporation_curing_DaywithRain_inMM->HrefValue = "";

			// Evaporation_curing_DaywithNoRain_inMM
			$this->Evaporation_curing_DaywithNoRain_inMM->LinkCustomAttributes = "";
			$this->Evaporation_curing_DaywithNoRain_inMM->HrefValue = "";

			// Dry_Bulb_Temp_inC_830AM
			$this->Dry_Bulb_Temp_inC_830AM->LinkCustomAttributes = "";
			$this->Dry_Bulb_Temp_inC_830AM->HrefValue = "";

			// Wet_Bulb_Temp_inC_830AM
			$this->Wet_Bulb_Temp_inC_830AM->LinkCustomAttributes = "";
			$this->Wet_Bulb_Temp_inC_830AM->HrefValue = "";

			// Vapour_Temp_inC_830AM
			$this->Vapour_Temp_inC_830AM->LinkCustomAttributes = "";
			$this->Vapour_Temp_inC_830AM->HrefValue = "";

			// Dry_Bulb_Temp_inC_530PM
			$this->Dry_Bulb_Temp_inC_530PM->LinkCustomAttributes = "";
			$this->Dry_Bulb_Temp_inC_530PM->HrefValue = "";

			// Wet_Bulb_Temp_inC_530PM
			$this->Wet_Bulb_Temp_inC_530PM->LinkCustomAttributes = "";
			$this->Wet_Bulb_Temp_inC_530PM->HrefValue = "";

			// Vapour_Temp_inC_530PM
			$this->Vapour_Temp_inC_530PM->LinkCustomAttributes = "";
			$this->Vapour_Temp_inC_530PM->HrefValue = "";

			// Max_Temp_inC
			$this->Max_Temp_inC->LinkCustomAttributes = "";
			$this->Max_Temp_inC->HrefValue = "";

			// Min_Temp_inC
			$this->Min_Temp_inC->LinkCustomAttributes = "";
			$this->Min_Temp_inC->HrefValue = "";

			// Total_Wind_Run_inKM_830AM
			$this->Total_Wind_Run_inKM_830AM->LinkCustomAttributes = "";
			$this->Total_Wind_Run_inKM_830AM->HrefValue = "";

			// Total_Wind_Run_inKM_530PM
			$this->Total_Wind_Run_inKM_530PM->LinkCustomAttributes = "";
			$this->Total_Wind_Run_inKM_530PM->HrefValue = "";

			// Average_Wind_Speed_inKM
			$this->Average_Wind_Speed_inKM->LinkCustomAttributes = "";
			$this->Average_Wind_Speed_inKM->HrefValue = "";

			// Number_of_Hours_of_Brightsuned
			$this->Number_of_Hours_of_Brightsuned->LinkCustomAttributes = "";
			$this->Number_of_Hours_of_Brightsuned->HrefValue = "";

			// Relative_Humidity_in_Precentage_830AM
			$this->Relative_Humidity_in_Precentage_830AM->LinkCustomAttributes = "";
			$this->Relative_Humidity_in_Precentage_830AM->HrefValue = "";

			// Relative_Humidity_in_Precentage_530PM
			$this->Relative_Humidity_in_Precentage_530PM->LinkCustomAttributes = "";
			$this->Relative_Humidity_in_Precentage_530PM->HrefValue = "";

			// obs_remarks
			$this->obs_remarks->LinkCustomAttributes = "";
			$this->obs_remarks->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// Validated
			$this->Validated->LinkCustomAttributes = "";
			$this->Validated->HrefValue = "";

			// isFreeze
			$this->isFreeze->LinkCustomAttributes = "";
			$this->isFreeze->HrefValue = "";
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
		if ($this->StationId->Required) {
			if (!$this->StationId->IsDetailKey && $this->StationId->FormValue != NULL && $this->StationId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StationId->caption(), $this->StationId->RequiredErrorMessage));
			}
		}
		if ($this->obs_DateTime->Required) {
			if (!$this->obs_DateTime->IsDetailKey && $this->obs_DateTime->FormValue != NULL && $this->obs_DateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->obs_DateTime->caption(), $this->obs_DateTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->obs_DateTime->FormValue)) {
			AddMessage($FormError, $this->obs_DateTime->errorMessage());
		}
		if ($this->Temp_water_in_pan_inC_830AM->Required) {
			if (!$this->Temp_water_in_pan_inC_830AM->IsDetailKey && $this->Temp_water_in_pan_inC_830AM->FormValue != NULL && $this->Temp_water_in_pan_inC_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Temp_water_in_pan_inC_830AM->caption(), $this->Temp_water_in_pan_inC_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckRange($this->Temp_water_in_pan_inC_830AM->FormValue, 0, 70)) {
			AddMessage($FormError, $this->Temp_water_in_pan_inC_830AM->errorMessage());
		}
		if ($this->Temp_water_in_pan_inC_530PM->Required) {
			if (!$this->Temp_water_in_pan_inC_530PM->IsDetailKey && $this->Temp_water_in_pan_inC_530PM->FormValue != NULL && $this->Temp_water_in_pan_inC_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Temp_water_in_pan_inC_530PM->caption(), $this->Temp_water_in_pan_inC_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckRange($this->Temp_water_in_pan_inC_530PM->FormValue, 0, 70)) {
			AddMessage($FormError, $this->Temp_water_in_pan_inC_530PM->errorMessage());
		}
		if ($this->App_Evaporation_inMM_830AM->Required) {
			if (!$this->App_Evaporation_inMM_830AM->IsDetailKey && $this->App_Evaporation_inMM_830AM->FormValue != NULL && $this->App_Evaporation_inMM_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->App_Evaporation_inMM_830AM->caption(), $this->App_Evaporation_inMM_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->App_Evaporation_inMM_830AM->FormValue)) {
			AddMessage($FormError, $this->App_Evaporation_inMM_830AM->errorMessage());
		}
		if ($this->App_Evaporation_inMM_530PM->Required) {
			if (!$this->App_Evaporation_inMM_530PM->IsDetailKey && $this->App_Evaporation_inMM_530PM->FormValue != NULL && $this->App_Evaporation_inMM_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->App_Evaporation_inMM_530PM->caption(), $this->App_Evaporation_inMM_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->App_Evaporation_inMM_530PM->FormValue)) {
			AddMessage($FormError, $this->App_Evaporation_inMM_530PM->errorMessage());
		}
		if ($this->Rainfall_inMM_830AM->Required) {
			if (!$this->Rainfall_inMM_830AM->IsDetailKey && $this->Rainfall_inMM_830AM->FormValue != NULL && $this->Rainfall_inMM_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Rainfall_inMM_830AM->caption(), $this->Rainfall_inMM_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Rainfall_inMM_830AM->FormValue)) {
			AddMessage($FormError, $this->Rainfall_inMM_830AM->errorMessage());
		}
		if ($this->Rainfall_inMM_530PM->Required) {
			if (!$this->Rainfall_inMM_530PM->IsDetailKey && $this->Rainfall_inMM_530PM->FormValue != NULL && $this->Rainfall_inMM_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Rainfall_inMM_530PM->caption(), $this->Rainfall_inMM_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Rainfall_inMM_530PM->FormValue)) {
			AddMessage($FormError, $this->Rainfall_inMM_530PM->errorMessage());
		}
		if ($this->Evaporation_curing_inMM_830AM->Required) {
			if (!$this->Evaporation_curing_inMM_830AM->IsDetailKey && $this->Evaporation_curing_inMM_830AM->FormValue != NULL && $this->Evaporation_curing_inMM_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Evaporation_curing_inMM_830AM->caption(), $this->Evaporation_curing_inMM_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Evaporation_curing_inMM_830AM->FormValue)) {
			AddMessage($FormError, $this->Evaporation_curing_inMM_830AM->errorMessage());
		}
		if ($this->Evaporation_curing_inMM_530PM->Required) {
			if (!$this->Evaporation_curing_inMM_530PM->IsDetailKey && $this->Evaporation_curing_inMM_530PM->FormValue != NULL && $this->Evaporation_curing_inMM_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Evaporation_curing_inMM_530PM->caption(), $this->Evaporation_curing_inMM_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Evaporation_curing_inMM_530PM->FormValue)) {
			AddMessage($FormError, $this->Evaporation_curing_inMM_530PM->errorMessage());
		}
		if ($this->Evaporation_curing_DaywithRain_inMM->Required) {
			if (!$this->Evaporation_curing_DaywithRain_inMM->IsDetailKey && $this->Evaporation_curing_DaywithRain_inMM->FormValue != NULL && $this->Evaporation_curing_DaywithRain_inMM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Evaporation_curing_DaywithRain_inMM->caption(), $this->Evaporation_curing_DaywithRain_inMM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Evaporation_curing_DaywithRain_inMM->FormValue)) {
			AddMessage($FormError, $this->Evaporation_curing_DaywithRain_inMM->errorMessage());
		}
		if ($this->Evaporation_curing_DaywithNoRain_inMM->Required) {
			if (!$this->Evaporation_curing_DaywithNoRain_inMM->IsDetailKey && $this->Evaporation_curing_DaywithNoRain_inMM->FormValue != NULL && $this->Evaporation_curing_DaywithNoRain_inMM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Evaporation_curing_DaywithNoRain_inMM->caption(), $this->Evaporation_curing_DaywithNoRain_inMM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Evaporation_curing_DaywithNoRain_inMM->FormValue)) {
			AddMessage($FormError, $this->Evaporation_curing_DaywithNoRain_inMM->errorMessage());
		}
		if ($this->Dry_Bulb_Temp_inC_830AM->Required) {
			if (!$this->Dry_Bulb_Temp_inC_830AM->IsDetailKey && $this->Dry_Bulb_Temp_inC_830AM->FormValue != NULL && $this->Dry_Bulb_Temp_inC_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dry_Bulb_Temp_inC_830AM->caption(), $this->Dry_Bulb_Temp_inC_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Dry_Bulb_Temp_inC_830AM->FormValue)) {
			AddMessage($FormError, $this->Dry_Bulb_Temp_inC_830AM->errorMessage());
		}
		if ($this->Wet_Bulb_Temp_inC_830AM->Required) {
			if (!$this->Wet_Bulb_Temp_inC_830AM->IsDetailKey && $this->Wet_Bulb_Temp_inC_830AM->FormValue != NULL && $this->Wet_Bulb_Temp_inC_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Wet_Bulb_Temp_inC_830AM->caption(), $this->Wet_Bulb_Temp_inC_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Wet_Bulb_Temp_inC_830AM->FormValue)) {
			AddMessage($FormError, $this->Wet_Bulb_Temp_inC_830AM->errorMessage());
		}
		if ($this->Vapour_Temp_inC_830AM->Required) {
			if (!$this->Vapour_Temp_inC_830AM->IsDetailKey && $this->Vapour_Temp_inC_830AM->FormValue != NULL && $this->Vapour_Temp_inC_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Vapour_Temp_inC_830AM->caption(), $this->Vapour_Temp_inC_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Vapour_Temp_inC_830AM->FormValue)) {
			AddMessage($FormError, $this->Vapour_Temp_inC_830AM->errorMessage());
		}
		if ($this->Dry_Bulb_Temp_inC_530PM->Required) {
			if (!$this->Dry_Bulb_Temp_inC_530PM->IsDetailKey && $this->Dry_Bulb_Temp_inC_530PM->FormValue != NULL && $this->Dry_Bulb_Temp_inC_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dry_Bulb_Temp_inC_530PM->caption(), $this->Dry_Bulb_Temp_inC_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Dry_Bulb_Temp_inC_530PM->FormValue)) {
			AddMessage($FormError, $this->Dry_Bulb_Temp_inC_530PM->errorMessage());
		}
		if ($this->Wet_Bulb_Temp_inC_530PM->Required) {
			if (!$this->Wet_Bulb_Temp_inC_530PM->IsDetailKey && $this->Wet_Bulb_Temp_inC_530PM->FormValue != NULL && $this->Wet_Bulb_Temp_inC_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Wet_Bulb_Temp_inC_530PM->caption(), $this->Wet_Bulb_Temp_inC_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Wet_Bulb_Temp_inC_530PM->FormValue)) {
			AddMessage($FormError, $this->Wet_Bulb_Temp_inC_530PM->errorMessage());
		}
		if ($this->Vapour_Temp_inC_530PM->Required) {
			if (!$this->Vapour_Temp_inC_530PM->IsDetailKey && $this->Vapour_Temp_inC_530PM->FormValue != NULL && $this->Vapour_Temp_inC_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Vapour_Temp_inC_530PM->caption(), $this->Vapour_Temp_inC_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Vapour_Temp_inC_530PM->FormValue)) {
			AddMessage($FormError, $this->Vapour_Temp_inC_530PM->errorMessage());
		}
		if ($this->Max_Temp_inC->Required) {
			if (!$this->Max_Temp_inC->IsDetailKey && $this->Max_Temp_inC->FormValue != NULL && $this->Max_Temp_inC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Max_Temp_inC->caption(), $this->Max_Temp_inC->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Max_Temp_inC->FormValue)) {
			AddMessage($FormError, $this->Max_Temp_inC->errorMessage());
		}
		if ($this->Min_Temp_inC->Required) {
			if (!$this->Min_Temp_inC->IsDetailKey && $this->Min_Temp_inC->FormValue != NULL && $this->Min_Temp_inC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Min_Temp_inC->caption(), $this->Min_Temp_inC->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Min_Temp_inC->FormValue)) {
			AddMessage($FormError, $this->Min_Temp_inC->errorMessage());
		}
		if ($this->Total_Wind_Run_inKM_830AM->Required) {
			if (!$this->Total_Wind_Run_inKM_830AM->IsDetailKey && $this->Total_Wind_Run_inKM_830AM->FormValue != NULL && $this->Total_Wind_Run_inKM_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Total_Wind_Run_inKM_830AM->caption(), $this->Total_Wind_Run_inKM_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Total_Wind_Run_inKM_830AM->FormValue)) {
			AddMessage($FormError, $this->Total_Wind_Run_inKM_830AM->errorMessage());
		}
		if ($this->Total_Wind_Run_inKM_530PM->Required) {
			if (!$this->Total_Wind_Run_inKM_530PM->IsDetailKey && $this->Total_Wind_Run_inKM_530PM->FormValue != NULL && $this->Total_Wind_Run_inKM_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Total_Wind_Run_inKM_530PM->caption(), $this->Total_Wind_Run_inKM_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Total_Wind_Run_inKM_530PM->FormValue)) {
			AddMessage($FormError, $this->Total_Wind_Run_inKM_530PM->errorMessage());
		}
		if ($this->Average_Wind_Speed_inKM->Required) {
			if (!$this->Average_Wind_Speed_inKM->IsDetailKey && $this->Average_Wind_Speed_inKM->FormValue != NULL && $this->Average_Wind_Speed_inKM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Average_Wind_Speed_inKM->caption(), $this->Average_Wind_Speed_inKM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Average_Wind_Speed_inKM->FormValue)) {
			AddMessage($FormError, $this->Average_Wind_Speed_inKM->errorMessage());
		}
		if ($this->Number_of_Hours_of_Brightsuned->Required) {
			if (!$this->Number_of_Hours_of_Brightsuned->IsDetailKey && $this->Number_of_Hours_of_Brightsuned->FormValue != NULL && $this->Number_of_Hours_of_Brightsuned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Number_of_Hours_of_Brightsuned->caption(), $this->Number_of_Hours_of_Brightsuned->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Number_of_Hours_of_Brightsuned->FormValue)) {
			AddMessage($FormError, $this->Number_of_Hours_of_Brightsuned->errorMessage());
		}
		if ($this->Relative_Humidity_in_Precentage_830AM->Required) {
			if (!$this->Relative_Humidity_in_Precentage_830AM->IsDetailKey && $this->Relative_Humidity_in_Precentage_830AM->FormValue != NULL && $this->Relative_Humidity_in_Precentage_830AM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Relative_Humidity_in_Precentage_830AM->caption(), $this->Relative_Humidity_in_Precentage_830AM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Relative_Humidity_in_Precentage_830AM->FormValue)) {
			AddMessage($FormError, $this->Relative_Humidity_in_Precentage_830AM->errorMessage());
		}
		if ($this->Relative_Humidity_in_Precentage_530PM->Required) {
			if (!$this->Relative_Humidity_in_Precentage_530PM->IsDetailKey && $this->Relative_Humidity_in_Precentage_530PM->FormValue != NULL && $this->Relative_Humidity_in_Precentage_530PM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Relative_Humidity_in_Precentage_530PM->caption(), $this->Relative_Humidity_in_Precentage_530PM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Relative_Humidity_in_Precentage_530PM->FormValue)) {
			AddMessage($FormError, $this->Relative_Humidity_in_Precentage_530PM->errorMessage());
		}
		if ($this->obs_remarks->Required) {
			if (!$this->obs_remarks->IsDetailKey && $this->obs_remarks->FormValue != NULL && $this->obs_remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->obs_remarks->caption(), $this->obs_remarks->RequiredErrorMessage));
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

		// StationId
		$this->StationId->setDbValueDef($rsnew, $this->StationId->CurrentValue, NULL, FALSE);

		// obs_DateTime
		$this->obs_DateTime->setDbValueDef($rsnew, UnFormatDateTime($this->obs_DateTime->CurrentValue, 7), NULL, FALSE);

		// Temp_water_in_pan_inC_830AM
		$this->Temp_water_in_pan_inC_830AM->setDbValueDef($rsnew, $this->Temp_water_in_pan_inC_830AM->CurrentValue, NULL, FALSE);

		// Temp_water_in_pan_inC_530PM
		$this->Temp_water_in_pan_inC_530PM->setDbValueDef($rsnew, $this->Temp_water_in_pan_inC_530PM->CurrentValue, NULL, FALSE);

		// App_Evaporation_inMM_830AM
		$this->App_Evaporation_inMM_830AM->setDbValueDef($rsnew, $this->App_Evaporation_inMM_830AM->CurrentValue, NULL, FALSE);

		// App_Evaporation_inMM_530PM
		$this->App_Evaporation_inMM_530PM->setDbValueDef($rsnew, $this->App_Evaporation_inMM_530PM->CurrentValue, NULL, FALSE);

		// Rainfall_inMM_830AM
		$this->Rainfall_inMM_830AM->setDbValueDef($rsnew, $this->Rainfall_inMM_830AM->CurrentValue, NULL, FALSE);

		// Rainfall_inMM_530PM
		$this->Rainfall_inMM_530PM->setDbValueDef($rsnew, $this->Rainfall_inMM_530PM->CurrentValue, NULL, FALSE);

		// Evaporation_curing_inMM_830AM
		$this->Evaporation_curing_inMM_830AM->setDbValueDef($rsnew, $this->Evaporation_curing_inMM_830AM->CurrentValue, NULL, FALSE);

		// Evaporation_curing_inMM_530PM
		$this->Evaporation_curing_inMM_530PM->setDbValueDef($rsnew, $this->Evaporation_curing_inMM_530PM->CurrentValue, NULL, FALSE);

		// Evaporation_curing_DaywithRain_inMM
		$this->Evaporation_curing_DaywithRain_inMM->setDbValueDef($rsnew, $this->Evaporation_curing_DaywithRain_inMM->CurrentValue, NULL, FALSE);

		// Evaporation_curing_DaywithNoRain_inMM
		$this->Evaporation_curing_DaywithNoRain_inMM->setDbValueDef($rsnew, $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue, NULL, FALSE);

		// Dry_Bulb_Temp_inC_830AM
		$this->Dry_Bulb_Temp_inC_830AM->setDbValueDef($rsnew, $this->Dry_Bulb_Temp_inC_830AM->CurrentValue, NULL, FALSE);

		// Wet_Bulb_Temp_inC_830AM
		$this->Wet_Bulb_Temp_inC_830AM->setDbValueDef($rsnew, $this->Wet_Bulb_Temp_inC_830AM->CurrentValue, NULL, FALSE);

		// Vapour_Temp_inC_830AM
		$this->Vapour_Temp_inC_830AM->setDbValueDef($rsnew, $this->Vapour_Temp_inC_830AM->CurrentValue, NULL, FALSE);

		// Dry_Bulb_Temp_inC_530PM
		$this->Dry_Bulb_Temp_inC_530PM->setDbValueDef($rsnew, $this->Dry_Bulb_Temp_inC_530PM->CurrentValue, NULL, FALSE);

		// Wet_Bulb_Temp_inC_530PM
		$this->Wet_Bulb_Temp_inC_530PM->setDbValueDef($rsnew, $this->Wet_Bulb_Temp_inC_530PM->CurrentValue, NULL, FALSE);

		// Vapour_Temp_inC_530PM
		$this->Vapour_Temp_inC_530PM->setDbValueDef($rsnew, $this->Vapour_Temp_inC_530PM->CurrentValue, NULL, FALSE);

		// Max_Temp_inC
		$this->Max_Temp_inC->setDbValueDef($rsnew, $this->Max_Temp_inC->CurrentValue, NULL, FALSE);

		// Min_Temp_inC
		$this->Min_Temp_inC->setDbValueDef($rsnew, $this->Min_Temp_inC->CurrentValue, NULL, FALSE);

		// Total_Wind_Run_inKM_830AM
		$this->Total_Wind_Run_inKM_830AM->setDbValueDef($rsnew, $this->Total_Wind_Run_inKM_830AM->CurrentValue, NULL, FALSE);

		// Total_Wind_Run_inKM_530PM
		$this->Total_Wind_Run_inKM_530PM->setDbValueDef($rsnew, $this->Total_Wind_Run_inKM_530PM->CurrentValue, NULL, FALSE);

		// Average_Wind_Speed_inKM
		$this->Average_Wind_Speed_inKM->setDbValueDef($rsnew, $this->Average_Wind_Speed_inKM->CurrentValue, NULL, FALSE);

		// Number_of_Hours_of_Brightsuned
		$this->Number_of_Hours_of_Brightsuned->setDbValueDef($rsnew, $this->Number_of_Hours_of_Brightsuned->CurrentValue, NULL, FALSE);

		// Relative_Humidity_in_Precentage_830AM
		$this->Relative_Humidity_in_Precentage_830AM->setDbValueDef($rsnew, $this->Relative_Humidity_in_Precentage_830AM->CurrentValue, NULL, FALSE);

		// Relative_Humidity_in_Precentage_530PM
		$this->Relative_Humidity_in_Precentage_530PM->setDbValueDef($rsnew, $this->Relative_Humidity_in_Precentage_530PM->CurrentValue, NULL, FALSE);

		// obs_remarks
		$this->obs_remarks->setDbValueDef($rsnew, $this->obs_remarks->CurrentValue, NULL, FALSE);

		// Status
		$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, 0, FALSE);

		// Validated
		$this->Validated->setDbValueDef($rsnew, $this->Validated->CurrentValue, NULL, FALSE);

		// isFreeze
		$tmpBool = $this->isFreeze->CurrentValue;
		if ($tmpBool != "1" && $tmpBool != "0")
			$tmpBool = !empty($tmpBool) ? "1" : "0";
		$this->isFreeze->setDbValueDef($rsnew, $tmpBool, 0, strval($this->isFreeze->CurrentValue) == "");

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tbl_hmsdatalist.php"), "", $this->TableVar, TRUE);
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
				case "x_StationId":
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