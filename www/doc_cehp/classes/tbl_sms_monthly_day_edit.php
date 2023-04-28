<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_sms_monthly_day_edit extends tbl_sms_monthly_day
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_sms_monthly_day';

	// Page object name
	public $PageObjName = "tbl_sms_monthly_day_edit";

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

		// Table object (tbl_sms_monthly_day)
		if (!isset($GLOBALS["tbl_sms_monthly_day"]) || get_class($GLOBALS["tbl_sms_monthly_day"]) == PROJECT_NAMESPACE . "tbl_sms_monthly_day") {
			$GLOBALS["tbl_sms_monthly_day"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tbl_sms_monthly_day"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tbl_sms_monthly_day');

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
		global $tbl_sms_monthly_day;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($tbl_sms_monthly_day);
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
					if ($pageName == "tbl_sms_monthly_dayview.php")
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
					$this->terminate(GetUrl("tbl_sms_monthly_daylist.php"));
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
		$this->month_id->setVisibility();
		$this->_01_rf->setVisibility();
		$this->_02_rf->setVisibility();
		$this->_03_rf->setVisibility();
		$this->_04_rf->setVisibility();
		$this->_05_rf->setVisibility();
		$this->_06_rf->setVisibility();
		$this->_07_rf->setVisibility();
		$this->_08_rf->setVisibility();
		$this->_09_rf->setVisibility();
		$this->_10_rf->setVisibility();
		$this->_11_rf->setVisibility();
		$this->_12_rf->setVisibility();
		$this->_13_rf->setVisibility();
		$this->_14_rf->setVisibility();
		$this->_15_rf->setVisibility();
		$this->_16_rf->setVisibility();
		$this->_17_rf->setVisibility();
		$this->_18_rf->setVisibility();
		$this->_19_rf->setVisibility();
		$this->_20_rf->setVisibility();
		$this->_21_rf->setVisibility();
		$this->_22_rf->setVisibility();
		$this->_23_rf->setVisibility();
		$this->_24_rf->setVisibility();
		$this->_25_rf->setVisibility();
		$this->_26_rf->setVisibility();
		$this->_27_rf->setVisibility();
		$this->_28_rf->setVisibility();
		$this->_29_rf->setVisibility();
		$this->_30_rf->setVisibility();
		$this->_31_rf->setVisibility();
		$this->SubDivisionId->setVisibility();
		$this->Water_Year->setVisibility();
		$this->SenderMobileNumber->setVisibility();
		$this->IsChanged->setVisibility();
		$this->hideFieldsForAddEdit();
		$this->SubDivisionId->Required = FALSE;

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
		$this->setupLookupOptions($this->month_id);
		$this->setupLookupOptions($this->SubDivisionId);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("tbl_sms_monthly_daylist.php");
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
					$this->terminate("tbl_sms_monthly_daylist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "tbl_sms_monthly_daylist.php")
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

		// Check field name 'StationId' first before field var 'x_StationId'
		$val = $CurrentForm->hasValue("StationId") ? $CurrentForm->getValue("StationId") : $CurrentForm->getValue("x_StationId");
		if (!$this->StationId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StationId->Visible = FALSE; // Disable update for API request
			else
				$this->StationId->setFormValue($val);
		}

		// Check field name 'month_id' first before field var 'x_month_id'
		$val = $CurrentForm->hasValue("month_id") ? $CurrentForm->getValue("month_id") : $CurrentForm->getValue("x_month_id");
		if (!$this->month_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->month_id->Visible = FALSE; // Disable update for API request
			else
				$this->month_id->setFormValue($val);
		}

		// Check field name '01_rf' first before field var 'x__01_rf'
		$val = $CurrentForm->hasValue("01_rf") ? $CurrentForm->getValue("01_rf") : $CurrentForm->getValue("x__01_rf");
		if (!$this->_01_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_01_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_01_rf->setFormValue($val);
		}

		// Check field name '02_rf' first before field var 'x__02_rf'
		$val = $CurrentForm->hasValue("02_rf") ? $CurrentForm->getValue("02_rf") : $CurrentForm->getValue("x__02_rf");
		if (!$this->_02_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_02_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_02_rf->setFormValue($val);
		}

		// Check field name '03_rf' first before field var 'x__03_rf'
		$val = $CurrentForm->hasValue("03_rf") ? $CurrentForm->getValue("03_rf") : $CurrentForm->getValue("x__03_rf");
		if (!$this->_03_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_03_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_03_rf->setFormValue($val);
		}

		// Check field name '04_rf' first before field var 'x__04_rf'
		$val = $CurrentForm->hasValue("04_rf") ? $CurrentForm->getValue("04_rf") : $CurrentForm->getValue("x__04_rf");
		if (!$this->_04_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_04_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_04_rf->setFormValue($val);
		}

		// Check field name '05_rf' first before field var 'x__05_rf'
		$val = $CurrentForm->hasValue("05_rf") ? $CurrentForm->getValue("05_rf") : $CurrentForm->getValue("x__05_rf");
		if (!$this->_05_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_05_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_05_rf->setFormValue($val);
		}

		// Check field name '06_rf' first before field var 'x__06_rf'
		$val = $CurrentForm->hasValue("06_rf") ? $CurrentForm->getValue("06_rf") : $CurrentForm->getValue("x__06_rf");
		if (!$this->_06_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_06_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_06_rf->setFormValue($val);
		}

		// Check field name '07_rf' first before field var 'x__07_rf'
		$val = $CurrentForm->hasValue("07_rf") ? $CurrentForm->getValue("07_rf") : $CurrentForm->getValue("x__07_rf");
		if (!$this->_07_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_07_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_07_rf->setFormValue($val);
		}

		// Check field name '08_rf' first before field var 'x__08_rf'
		$val = $CurrentForm->hasValue("08_rf") ? $CurrentForm->getValue("08_rf") : $CurrentForm->getValue("x__08_rf");
		if (!$this->_08_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_08_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_08_rf->setFormValue($val);
		}

		// Check field name '09_rf' first before field var 'x__09_rf'
		$val = $CurrentForm->hasValue("09_rf") ? $CurrentForm->getValue("09_rf") : $CurrentForm->getValue("x__09_rf");
		if (!$this->_09_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_09_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_09_rf->setFormValue($val);
		}

		// Check field name '10_rf' first before field var 'x__10_rf'
		$val = $CurrentForm->hasValue("10_rf") ? $CurrentForm->getValue("10_rf") : $CurrentForm->getValue("x__10_rf");
		if (!$this->_10_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_10_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_10_rf->setFormValue($val);
		}

		// Check field name '11_rf' first before field var 'x__11_rf'
		$val = $CurrentForm->hasValue("11_rf") ? $CurrentForm->getValue("11_rf") : $CurrentForm->getValue("x__11_rf");
		if (!$this->_11_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_11_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_11_rf->setFormValue($val);
		}

		// Check field name '12_rf' first before field var 'x__12_rf'
		$val = $CurrentForm->hasValue("12_rf") ? $CurrentForm->getValue("12_rf") : $CurrentForm->getValue("x__12_rf");
		if (!$this->_12_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_12_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_12_rf->setFormValue($val);
		}

		// Check field name '13_rf' first before field var 'x__13_rf'
		$val = $CurrentForm->hasValue("13_rf") ? $CurrentForm->getValue("13_rf") : $CurrentForm->getValue("x__13_rf");
		if (!$this->_13_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_13_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_13_rf->setFormValue($val);
		}

		// Check field name '14_rf' first before field var 'x__14_rf'
		$val = $CurrentForm->hasValue("14_rf") ? $CurrentForm->getValue("14_rf") : $CurrentForm->getValue("x__14_rf");
		if (!$this->_14_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_14_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_14_rf->setFormValue($val);
		}

		// Check field name '15_rf' first before field var 'x__15_rf'
		$val = $CurrentForm->hasValue("15_rf") ? $CurrentForm->getValue("15_rf") : $CurrentForm->getValue("x__15_rf");
		if (!$this->_15_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_15_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_15_rf->setFormValue($val);
		}

		// Check field name '16_rf' first before field var 'x__16_rf'
		$val = $CurrentForm->hasValue("16_rf") ? $CurrentForm->getValue("16_rf") : $CurrentForm->getValue("x__16_rf");
		if (!$this->_16_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_16_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_16_rf->setFormValue($val);
		}

		// Check field name '17_rf' first before field var 'x__17_rf'
		$val = $CurrentForm->hasValue("17_rf") ? $CurrentForm->getValue("17_rf") : $CurrentForm->getValue("x__17_rf");
		if (!$this->_17_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_17_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_17_rf->setFormValue($val);
		}

		// Check field name '18_rf' first before field var 'x__18_rf'
		$val = $CurrentForm->hasValue("18_rf") ? $CurrentForm->getValue("18_rf") : $CurrentForm->getValue("x__18_rf");
		if (!$this->_18_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_18_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_18_rf->setFormValue($val);
		}

		// Check field name '19_rf' first before field var 'x__19_rf'
		$val = $CurrentForm->hasValue("19_rf") ? $CurrentForm->getValue("19_rf") : $CurrentForm->getValue("x__19_rf");
		if (!$this->_19_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_19_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_19_rf->setFormValue($val);
		}

		// Check field name '20_rf' first before field var 'x__20_rf'
		$val = $CurrentForm->hasValue("20_rf") ? $CurrentForm->getValue("20_rf") : $CurrentForm->getValue("x__20_rf");
		if (!$this->_20_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_20_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_20_rf->setFormValue($val);
		}

		// Check field name '21_rf' first before field var 'x__21_rf'
		$val = $CurrentForm->hasValue("21_rf") ? $CurrentForm->getValue("21_rf") : $CurrentForm->getValue("x__21_rf");
		if (!$this->_21_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_21_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_21_rf->setFormValue($val);
		}

		// Check field name '22_rf' first before field var 'x__22_rf'
		$val = $CurrentForm->hasValue("22_rf") ? $CurrentForm->getValue("22_rf") : $CurrentForm->getValue("x__22_rf");
		if (!$this->_22_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_22_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_22_rf->setFormValue($val);
		}

		// Check field name '23_rf' first before field var 'x__23_rf'
		$val = $CurrentForm->hasValue("23_rf") ? $CurrentForm->getValue("23_rf") : $CurrentForm->getValue("x__23_rf");
		if (!$this->_23_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_23_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_23_rf->setFormValue($val);
		}

		// Check field name '24_rf' first before field var 'x__24_rf'
		$val = $CurrentForm->hasValue("24_rf") ? $CurrentForm->getValue("24_rf") : $CurrentForm->getValue("x__24_rf");
		if (!$this->_24_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_24_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_24_rf->setFormValue($val);
		}

		// Check field name '25_rf' first before field var 'x__25_rf'
		$val = $CurrentForm->hasValue("25_rf") ? $CurrentForm->getValue("25_rf") : $CurrentForm->getValue("x__25_rf");
		if (!$this->_25_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_25_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_25_rf->setFormValue($val);
		}

		// Check field name '26_rf' first before field var 'x__26_rf'
		$val = $CurrentForm->hasValue("26_rf") ? $CurrentForm->getValue("26_rf") : $CurrentForm->getValue("x__26_rf");
		if (!$this->_26_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_26_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_26_rf->setFormValue($val);
		}

		// Check field name '27_rf' first before field var 'x__27_rf'
		$val = $CurrentForm->hasValue("27_rf") ? $CurrentForm->getValue("27_rf") : $CurrentForm->getValue("x__27_rf");
		if (!$this->_27_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_27_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_27_rf->setFormValue($val);
		}

		// Check field name '28_rf' first before field var 'x__28_rf'
		$val = $CurrentForm->hasValue("28_rf") ? $CurrentForm->getValue("28_rf") : $CurrentForm->getValue("x__28_rf");
		if (!$this->_28_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_28_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_28_rf->setFormValue($val);
		}

		// Check field name '29_rf' first before field var 'x__29_rf'
		$val = $CurrentForm->hasValue("29_rf") ? $CurrentForm->getValue("29_rf") : $CurrentForm->getValue("x__29_rf");
		if (!$this->_29_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_29_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_29_rf->setFormValue($val);
		}

		// Check field name '30_rf' first before field var 'x__30_rf'
		$val = $CurrentForm->hasValue("30_rf") ? $CurrentForm->getValue("30_rf") : $CurrentForm->getValue("x__30_rf");
		if (!$this->_30_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_30_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_30_rf->setFormValue($val);
		}

		// Check field name '31_rf' first before field var 'x__31_rf'
		$val = $CurrentForm->hasValue("31_rf") ? $CurrentForm->getValue("31_rf") : $CurrentForm->getValue("x__31_rf");
		if (!$this->_31_rf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_31_rf->Visible = FALSE; // Disable update for API request
			else
				$this->_31_rf->setFormValue($val);
		}

		// Check field name 'SubDivisionId' first before field var 'x_SubDivisionId'
		$val = $CurrentForm->hasValue("SubDivisionId") ? $CurrentForm->getValue("SubDivisionId") : $CurrentForm->getValue("x_SubDivisionId");
		if (!$this->SubDivisionId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SubDivisionId->Visible = FALSE; // Disable update for API request
			else
				$this->SubDivisionId->setFormValue($val);
		}

		// Check field name 'Water_Year' first before field var 'x_Water_Year'
		$val = $CurrentForm->hasValue("Water_Year") ? $CurrentForm->getValue("Water_Year") : $CurrentForm->getValue("x_Water_Year");
		if (!$this->Water_Year->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Water_Year->Visible = FALSE; // Disable update for API request
			else
				$this->Water_Year->setFormValue($val);
		}

		// Check field name 'SenderMobileNumber' first before field var 'x_SenderMobileNumber'
		$val = $CurrentForm->hasValue("SenderMobileNumber") ? $CurrentForm->getValue("SenderMobileNumber") : $CurrentForm->getValue("x_SenderMobileNumber");
		if (!$this->SenderMobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SenderMobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->SenderMobileNumber->setFormValue($val);
		}

		// Check field name 'IsChanged' first before field var 'x_IsChanged'
		$val = $CurrentForm->hasValue("IsChanged") ? $CurrentForm->getValue("IsChanged") : $CurrentForm->getValue("x_IsChanged");
		if (!$this->IsChanged->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IsChanged->Visible = FALSE; // Disable update for API request
			else
				$this->IsChanged->setFormValue($val);
		}

		// Check field name 'Slno' first before field var 'x_Slno'
		$val = $CurrentForm->hasValue("Slno") ? $CurrentForm->getValue("Slno") : $CurrentForm->getValue("x_Slno");
		if (!$this->Slno->IsDetailKey)
			$this->Slno->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Slno->CurrentValue = $this->Slno->FormValue;
		$this->StationId->CurrentValue = $this->StationId->FormValue;
		$this->month_id->CurrentValue = $this->month_id->FormValue;
		$this->_01_rf->CurrentValue = $this->_01_rf->FormValue;
		$this->_02_rf->CurrentValue = $this->_02_rf->FormValue;
		$this->_03_rf->CurrentValue = $this->_03_rf->FormValue;
		$this->_04_rf->CurrentValue = $this->_04_rf->FormValue;
		$this->_05_rf->CurrentValue = $this->_05_rf->FormValue;
		$this->_06_rf->CurrentValue = $this->_06_rf->FormValue;
		$this->_07_rf->CurrentValue = $this->_07_rf->FormValue;
		$this->_08_rf->CurrentValue = $this->_08_rf->FormValue;
		$this->_09_rf->CurrentValue = $this->_09_rf->FormValue;
		$this->_10_rf->CurrentValue = $this->_10_rf->FormValue;
		$this->_11_rf->CurrentValue = $this->_11_rf->FormValue;
		$this->_12_rf->CurrentValue = $this->_12_rf->FormValue;
		$this->_13_rf->CurrentValue = $this->_13_rf->FormValue;
		$this->_14_rf->CurrentValue = $this->_14_rf->FormValue;
		$this->_15_rf->CurrentValue = $this->_15_rf->FormValue;
		$this->_16_rf->CurrentValue = $this->_16_rf->FormValue;
		$this->_17_rf->CurrentValue = $this->_17_rf->FormValue;
		$this->_18_rf->CurrentValue = $this->_18_rf->FormValue;
		$this->_19_rf->CurrentValue = $this->_19_rf->FormValue;
		$this->_20_rf->CurrentValue = $this->_20_rf->FormValue;
		$this->_21_rf->CurrentValue = $this->_21_rf->FormValue;
		$this->_22_rf->CurrentValue = $this->_22_rf->FormValue;
		$this->_23_rf->CurrentValue = $this->_23_rf->FormValue;
		$this->_24_rf->CurrentValue = $this->_24_rf->FormValue;
		$this->_25_rf->CurrentValue = $this->_25_rf->FormValue;
		$this->_26_rf->CurrentValue = $this->_26_rf->FormValue;
		$this->_27_rf->CurrentValue = $this->_27_rf->FormValue;
		$this->_28_rf->CurrentValue = $this->_28_rf->FormValue;
		$this->_29_rf->CurrentValue = $this->_29_rf->FormValue;
		$this->_30_rf->CurrentValue = $this->_30_rf->FormValue;
		$this->_31_rf->CurrentValue = $this->_31_rf->FormValue;
		$this->SubDivisionId->CurrentValue = $this->SubDivisionId->FormValue;
		$this->Water_Year->CurrentValue = $this->Water_Year->FormValue;
		$this->SenderMobileNumber->CurrentValue = $this->SenderMobileNumber->FormValue;
		$this->IsChanged->CurrentValue = $this->IsChanged->FormValue;
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
		$this->month_id->setDbValue($row['month_id']);
		$this->_01_rf->setDbValue($row['01_rf']);
		$this->_02_rf->setDbValue($row['02_rf']);
		$this->_03_rf->setDbValue($row['03_rf']);
		$this->_04_rf->setDbValue($row['04_rf']);
		$this->_05_rf->setDbValue($row['05_rf']);
		$this->_06_rf->setDbValue($row['06_rf']);
		$this->_07_rf->setDbValue($row['07_rf']);
		$this->_08_rf->setDbValue($row['08_rf']);
		$this->_09_rf->setDbValue($row['09_rf']);
		$this->_10_rf->setDbValue($row['10_rf']);
		$this->_11_rf->setDbValue($row['11_rf']);
		$this->_12_rf->setDbValue($row['12_rf']);
		$this->_13_rf->setDbValue($row['13_rf']);
		$this->_14_rf->setDbValue($row['14_rf']);
		$this->_15_rf->setDbValue($row['15_rf']);
		$this->_16_rf->setDbValue($row['16_rf']);
		$this->_17_rf->setDbValue($row['17_rf']);
		$this->_18_rf->setDbValue($row['18_rf']);
		$this->_19_rf->setDbValue($row['19_rf']);
		$this->_20_rf->setDbValue($row['20_rf']);
		$this->_21_rf->setDbValue($row['21_rf']);
		$this->_22_rf->setDbValue($row['22_rf']);
		$this->_23_rf->setDbValue($row['23_rf']);
		$this->_24_rf->setDbValue($row['24_rf']);
		$this->_25_rf->setDbValue($row['25_rf']);
		$this->_26_rf->setDbValue($row['26_rf']);
		$this->_27_rf->setDbValue($row['27_rf']);
		$this->_28_rf->setDbValue($row['28_rf']);
		$this->_29_rf->setDbValue($row['29_rf']);
		$this->_30_rf->setDbValue($row['30_rf']);
		$this->_31_rf->setDbValue($row['31_rf']);
		$this->SubDivisionId->setDbValue($row['SubDivisionId']);
		$this->Water_Year->setDbValue($row['Water_Year']);
		$this->SenderMobileNumber->setDbValue($row['SenderMobileNumber']);
		$this->IsChanged->setDbValue($row['IsChanged']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['Slno'] = NULL;
		$row['StationId'] = NULL;
		$row['month_id'] = NULL;
		$row['01_rf'] = NULL;
		$row['02_rf'] = NULL;
		$row['03_rf'] = NULL;
		$row['04_rf'] = NULL;
		$row['05_rf'] = NULL;
		$row['06_rf'] = NULL;
		$row['07_rf'] = NULL;
		$row['08_rf'] = NULL;
		$row['09_rf'] = NULL;
		$row['10_rf'] = NULL;
		$row['11_rf'] = NULL;
		$row['12_rf'] = NULL;
		$row['13_rf'] = NULL;
		$row['14_rf'] = NULL;
		$row['15_rf'] = NULL;
		$row['16_rf'] = NULL;
		$row['17_rf'] = NULL;
		$row['18_rf'] = NULL;
		$row['19_rf'] = NULL;
		$row['20_rf'] = NULL;
		$row['21_rf'] = NULL;
		$row['22_rf'] = NULL;
		$row['23_rf'] = NULL;
		$row['24_rf'] = NULL;
		$row['25_rf'] = NULL;
		$row['26_rf'] = NULL;
		$row['27_rf'] = NULL;
		$row['28_rf'] = NULL;
		$row['29_rf'] = NULL;
		$row['30_rf'] = NULL;
		$row['31_rf'] = NULL;
		$row['SubDivisionId'] = NULL;
		$row['Water_Year'] = NULL;
		$row['SenderMobileNumber'] = NULL;
		$row['IsChanged'] = NULL;
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

		if ($this->_01_rf->FormValue == $this->_01_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_01_rf->CurrentValue)))
			$this->_01_rf->CurrentValue = ConvertToFloatString($this->_01_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_02_rf->FormValue == $this->_02_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_02_rf->CurrentValue)))
			$this->_02_rf->CurrentValue = ConvertToFloatString($this->_02_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_03_rf->FormValue == $this->_03_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_03_rf->CurrentValue)))
			$this->_03_rf->CurrentValue = ConvertToFloatString($this->_03_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_04_rf->FormValue == $this->_04_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_04_rf->CurrentValue)))
			$this->_04_rf->CurrentValue = ConvertToFloatString($this->_04_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_05_rf->FormValue == $this->_05_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_05_rf->CurrentValue)))
			$this->_05_rf->CurrentValue = ConvertToFloatString($this->_05_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_06_rf->FormValue == $this->_06_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_06_rf->CurrentValue)))
			$this->_06_rf->CurrentValue = ConvertToFloatString($this->_06_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_07_rf->FormValue == $this->_07_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_07_rf->CurrentValue)))
			$this->_07_rf->CurrentValue = ConvertToFloatString($this->_07_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_08_rf->FormValue == $this->_08_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_08_rf->CurrentValue)))
			$this->_08_rf->CurrentValue = ConvertToFloatString($this->_08_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_09_rf->FormValue == $this->_09_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_09_rf->CurrentValue)))
			$this->_09_rf->CurrentValue = ConvertToFloatString($this->_09_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_10_rf->FormValue == $this->_10_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_10_rf->CurrentValue)))
			$this->_10_rf->CurrentValue = ConvertToFloatString($this->_10_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_11_rf->FormValue == $this->_11_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_11_rf->CurrentValue)))
			$this->_11_rf->CurrentValue = ConvertToFloatString($this->_11_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_12_rf->FormValue == $this->_12_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_12_rf->CurrentValue)))
			$this->_12_rf->CurrentValue = ConvertToFloatString($this->_12_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_13_rf->FormValue == $this->_13_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_13_rf->CurrentValue)))
			$this->_13_rf->CurrentValue = ConvertToFloatString($this->_13_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_14_rf->FormValue == $this->_14_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_14_rf->CurrentValue)))
			$this->_14_rf->CurrentValue = ConvertToFloatString($this->_14_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_15_rf->FormValue == $this->_15_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_15_rf->CurrentValue)))
			$this->_15_rf->CurrentValue = ConvertToFloatString($this->_15_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_16_rf->FormValue == $this->_16_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_16_rf->CurrentValue)))
			$this->_16_rf->CurrentValue = ConvertToFloatString($this->_16_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_17_rf->FormValue == $this->_17_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_17_rf->CurrentValue)))
			$this->_17_rf->CurrentValue = ConvertToFloatString($this->_17_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_18_rf->FormValue == $this->_18_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_18_rf->CurrentValue)))
			$this->_18_rf->CurrentValue = ConvertToFloatString($this->_18_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_19_rf->FormValue == $this->_19_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_19_rf->CurrentValue)))
			$this->_19_rf->CurrentValue = ConvertToFloatString($this->_19_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_20_rf->FormValue == $this->_20_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_20_rf->CurrentValue)))
			$this->_20_rf->CurrentValue = ConvertToFloatString($this->_20_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_21_rf->FormValue == $this->_21_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_21_rf->CurrentValue)))
			$this->_21_rf->CurrentValue = ConvertToFloatString($this->_21_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_22_rf->FormValue == $this->_22_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_22_rf->CurrentValue)))
			$this->_22_rf->CurrentValue = ConvertToFloatString($this->_22_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_23_rf->FormValue == $this->_23_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_23_rf->CurrentValue)))
			$this->_23_rf->CurrentValue = ConvertToFloatString($this->_23_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_24_rf->FormValue == $this->_24_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_24_rf->CurrentValue)))
			$this->_24_rf->CurrentValue = ConvertToFloatString($this->_24_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_25_rf->FormValue == $this->_25_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_25_rf->CurrentValue)))
			$this->_25_rf->CurrentValue = ConvertToFloatString($this->_25_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_26_rf->FormValue == $this->_26_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_26_rf->CurrentValue)))
			$this->_26_rf->CurrentValue = ConvertToFloatString($this->_26_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_27_rf->FormValue == $this->_27_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_27_rf->CurrentValue)))
			$this->_27_rf->CurrentValue = ConvertToFloatString($this->_27_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_28_rf->FormValue == $this->_28_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_28_rf->CurrentValue)))
			$this->_28_rf->CurrentValue = ConvertToFloatString($this->_28_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_29_rf->FormValue == $this->_29_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_29_rf->CurrentValue)))
			$this->_29_rf->CurrentValue = ConvertToFloatString($this->_29_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_30_rf->FormValue == $this->_30_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_30_rf->CurrentValue)))
			$this->_30_rf->CurrentValue = ConvertToFloatString($this->_30_rf->CurrentValue);

		// Convert decimal values if posted back
		if ($this->_31_rf->FormValue == $this->_31_rf->CurrentValue && is_numeric(ConvertToFloatString($this->_31_rf->CurrentValue)))
			$this->_31_rf->CurrentValue = ConvertToFloatString($this->_31_rf->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Slno
		// StationId
		// month_id
		// 01_rf
		// 02_rf
		// 03_rf
		// 04_rf
		// 05_rf
		// 06_rf
		// 07_rf
		// 08_rf
		// 09_rf
		// 10_rf
		// 11_rf
		// 12_rf
		// 13_rf
		// 14_rf
		// 15_rf
		// 16_rf
		// 17_rf
		// 18_rf
		// 19_rf
		// 20_rf
		// 21_rf
		// 22_rf
		// 23_rf
		// 24_rf
		// 25_rf
		// 26_rf
		// 27_rf
		// 28_rf
		// 29_rf
		// 30_rf
		// 31_rf
		// SubDivisionId
		// Water_Year
		// SenderMobileNumber
		// IsChanged

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

			// month_id
			$curVal = strval($this->month_id->CurrentValue);
			if ($curVal != "") {
				$this->month_id->ViewValue = $this->month_id->lookupCacheOption($curVal);
				if ($this->month_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`month_id`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->month_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->month_id->ViewValue = $this->month_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->month_id->ViewValue = $this->month_id->CurrentValue;
					}
				}
			} else {
				$this->month_id->ViewValue = NULL;
			}
			$this->month_id->ViewCustomAttributes = "";

			// 01_rf
			$this->_01_rf->ViewValue = $this->_01_rf->CurrentValue;
			$this->_01_rf->ViewValue = FormatNumber($this->_01_rf->ViewValue, 2, -2, -2, -2);
			$this->_01_rf->ViewCustomAttributes = "";

			// 02_rf
			$this->_02_rf->ViewValue = $this->_02_rf->CurrentValue;
			$this->_02_rf->ViewValue = FormatNumber($this->_02_rf->ViewValue, 2, -2, -2, -2);
			$this->_02_rf->ViewCustomAttributes = "";

			// 03_rf
			$this->_03_rf->ViewValue = $this->_03_rf->CurrentValue;
			$this->_03_rf->ViewValue = FormatNumber($this->_03_rf->ViewValue, 2, -2, -2, -2);
			$this->_03_rf->ViewCustomAttributes = "";

			// 04_rf
			$this->_04_rf->ViewValue = $this->_04_rf->CurrentValue;
			$this->_04_rf->ViewValue = FormatNumber($this->_04_rf->ViewValue, 2, -2, -2, -2);
			$this->_04_rf->ViewCustomAttributes = "";

			// 05_rf
			$this->_05_rf->ViewValue = $this->_05_rf->CurrentValue;
			$this->_05_rf->ViewValue = FormatNumber($this->_05_rf->ViewValue, 2, -2, -2, -2);
			$this->_05_rf->ViewCustomAttributes = "";

			// 06_rf
			$this->_06_rf->ViewValue = $this->_06_rf->CurrentValue;
			$this->_06_rf->ViewValue = FormatNumber($this->_06_rf->ViewValue, 2, -2, -2, -2);
			$this->_06_rf->ViewCustomAttributes = "";

			// 07_rf
			$this->_07_rf->ViewValue = $this->_07_rf->CurrentValue;
			$this->_07_rf->ViewValue = FormatNumber($this->_07_rf->ViewValue, 2, -2, -2, -2);
			$this->_07_rf->ViewCustomAttributes = "";

			// 08_rf
			$this->_08_rf->ViewValue = $this->_08_rf->CurrentValue;
			$this->_08_rf->ViewValue = FormatNumber($this->_08_rf->ViewValue, 2, -2, -2, -2);
			$this->_08_rf->ViewCustomAttributes = "";

			// 09_rf
			$this->_09_rf->ViewValue = $this->_09_rf->CurrentValue;
			$this->_09_rf->ViewValue = FormatNumber($this->_09_rf->ViewValue, 2, -2, -2, -2);
			$this->_09_rf->ViewCustomAttributes = "";

			// 10_rf
			$this->_10_rf->ViewValue = $this->_10_rf->CurrentValue;
			$this->_10_rf->ViewValue = FormatNumber($this->_10_rf->ViewValue, 2, -2, -2, -2);
			$this->_10_rf->ViewCustomAttributes = "";

			// 11_rf
			$this->_11_rf->ViewValue = $this->_11_rf->CurrentValue;
			$this->_11_rf->ViewValue = FormatNumber($this->_11_rf->ViewValue, 2, -2, -2, -2);
			$this->_11_rf->ViewCustomAttributes = "";

			// 12_rf
			$this->_12_rf->ViewValue = $this->_12_rf->CurrentValue;
			$this->_12_rf->ViewValue = FormatNumber($this->_12_rf->ViewValue, 2, -2, -2, -2);
			$this->_12_rf->ViewCustomAttributes = "";

			// 13_rf
			$this->_13_rf->ViewValue = $this->_13_rf->CurrentValue;
			$this->_13_rf->ViewValue = FormatNumber($this->_13_rf->ViewValue, 2, -2, -2, -2);
			$this->_13_rf->ViewCustomAttributes = "";

			// 14_rf
			$this->_14_rf->ViewValue = $this->_14_rf->CurrentValue;
			$this->_14_rf->ViewValue = FormatNumber($this->_14_rf->ViewValue, 2, -2, -2, -2);
			$this->_14_rf->ViewCustomAttributes = "";

			// 15_rf
			$this->_15_rf->ViewValue = $this->_15_rf->CurrentValue;
			$this->_15_rf->ViewValue = FormatNumber($this->_15_rf->ViewValue, 2, -2, -2, -2);
			$this->_15_rf->ViewCustomAttributes = "";

			// 16_rf
			$this->_16_rf->ViewValue = $this->_16_rf->CurrentValue;
			$this->_16_rf->ViewValue = FormatNumber($this->_16_rf->ViewValue, 2, -2, -2, -2);
			$this->_16_rf->ViewCustomAttributes = "";

			// 17_rf
			$this->_17_rf->ViewValue = $this->_17_rf->CurrentValue;
			$this->_17_rf->ViewValue = FormatNumber($this->_17_rf->ViewValue, 2, -2, -2, -2);
			$this->_17_rf->ViewCustomAttributes = "";

			// 18_rf
			$this->_18_rf->ViewValue = $this->_18_rf->CurrentValue;
			$this->_18_rf->ViewValue = FormatNumber($this->_18_rf->ViewValue, 2, -2, -2, -2);
			$this->_18_rf->ViewCustomAttributes = "";

			// 19_rf
			$this->_19_rf->ViewValue = $this->_19_rf->CurrentValue;
			$this->_19_rf->ViewValue = FormatNumber($this->_19_rf->ViewValue, 2, -2, -2, -2);
			$this->_19_rf->ViewCustomAttributes = "";

			// 20_rf
			$this->_20_rf->ViewValue = $this->_20_rf->CurrentValue;
			$this->_20_rf->ViewValue = FormatNumber($this->_20_rf->ViewValue, 2, -2, -2, -2);
			$this->_20_rf->ViewCustomAttributes = "";

			// 21_rf
			$this->_21_rf->ViewValue = $this->_21_rf->CurrentValue;
			$this->_21_rf->ViewValue = FormatNumber($this->_21_rf->ViewValue, 2, -2, -2, -2);
			$this->_21_rf->ViewCustomAttributes = "";

			// 22_rf
			$this->_22_rf->ViewValue = $this->_22_rf->CurrentValue;
			$this->_22_rf->ViewValue = FormatNumber($this->_22_rf->ViewValue, 2, -2, -2, -2);
			$this->_22_rf->ViewCustomAttributes = "";

			// 23_rf
			$this->_23_rf->ViewValue = $this->_23_rf->CurrentValue;
			$this->_23_rf->ViewValue = FormatNumber($this->_23_rf->ViewValue, 2, -2, -2, -2);
			$this->_23_rf->ViewCustomAttributes = "";

			// 24_rf
			$this->_24_rf->ViewValue = $this->_24_rf->CurrentValue;
			$this->_24_rf->ViewValue = FormatNumber($this->_24_rf->ViewValue, 2, -2, -2, -2);
			$this->_24_rf->ViewCustomAttributes = "";

			// 25_rf
			$this->_25_rf->ViewValue = $this->_25_rf->CurrentValue;
			$this->_25_rf->ViewValue = FormatNumber($this->_25_rf->ViewValue, 2, -2, -2, -2);
			$this->_25_rf->ViewCustomAttributes = "";

			// 26_rf
			$this->_26_rf->ViewValue = $this->_26_rf->CurrentValue;
			$this->_26_rf->ViewValue = FormatNumber($this->_26_rf->ViewValue, 2, -2, -2, -2);
			$this->_26_rf->ViewCustomAttributes = "";

			// 27_rf
			$this->_27_rf->ViewValue = $this->_27_rf->CurrentValue;
			$this->_27_rf->ViewValue = FormatNumber($this->_27_rf->ViewValue, 2, -2, -2, -2);
			$this->_27_rf->ViewCustomAttributes = "";

			// 28_rf
			$this->_28_rf->ViewValue = $this->_28_rf->CurrentValue;
			$this->_28_rf->ViewValue = FormatNumber($this->_28_rf->ViewValue, 2, -2, -2, -2);
			$this->_28_rf->ViewCustomAttributes = "";

			// 29_rf
			$this->_29_rf->ViewValue = $this->_29_rf->CurrentValue;
			$this->_29_rf->ViewValue = FormatNumber($this->_29_rf->ViewValue, 2, -2, -2, -2);
			$this->_29_rf->ViewCustomAttributes = "";

			// 30_rf
			$this->_30_rf->ViewValue = $this->_30_rf->CurrentValue;
			$this->_30_rf->ViewValue = FormatNumber($this->_30_rf->ViewValue, 2, -2, -2, -2);
			$this->_30_rf->ViewCustomAttributes = "";

			// 31_rf
			$this->_31_rf->ViewValue = $this->_31_rf->CurrentValue;
			$this->_31_rf->ViewValue = FormatNumber($this->_31_rf->ViewValue, 2, -2, -2, -2);
			$this->_31_rf->ViewCustomAttributes = "";

			// SubDivisionId
			$curVal = strval($this->SubDivisionId->CurrentValue);
			if ($curVal != "") {
				$this->SubDivisionId->ViewValue = $this->SubDivisionId->lookupCacheOption($curVal);
				if ($this->SubDivisionId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`SubDivisionId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->SubDivisionId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->SubDivisionId->ViewValue = $this->SubDivisionId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SubDivisionId->ViewValue = $this->SubDivisionId->CurrentValue;
					}
				}
			} else {
				$this->SubDivisionId->ViewValue = NULL;
			}
			$this->SubDivisionId->ViewCustomAttributes = "";

			// Water_Year
			$this->Water_Year->ViewValue = $this->Water_Year->CurrentValue;
			$this->Water_Year->ViewCustomAttributes = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
			$this->SenderMobileNumber->ViewCustomAttributes = "";

			// IsChanged
			$this->IsChanged->ViewValue = $this->IsChanged->CurrentValue;
			$this->IsChanged->ViewCustomAttributes = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// month_id
			$this->month_id->LinkCustomAttributes = "";
			$this->month_id->HrefValue = "";
			$this->month_id->TooltipValue = "";

			// 01_rf
			$this->_01_rf->LinkCustomAttributes = "";
			$this->_01_rf->HrefValue = "";
			$this->_01_rf->TooltipValue = "";

			// 02_rf
			$this->_02_rf->LinkCustomAttributes = "";
			$this->_02_rf->HrefValue = "";
			$this->_02_rf->TooltipValue = "";

			// 03_rf
			$this->_03_rf->LinkCustomAttributes = "";
			$this->_03_rf->HrefValue = "";
			$this->_03_rf->TooltipValue = "";

			// 04_rf
			$this->_04_rf->LinkCustomAttributes = "";
			$this->_04_rf->HrefValue = "";
			$this->_04_rf->TooltipValue = "";

			// 05_rf
			$this->_05_rf->LinkCustomAttributes = "";
			$this->_05_rf->HrefValue = "";
			$this->_05_rf->TooltipValue = "";

			// 06_rf
			$this->_06_rf->LinkCustomAttributes = "";
			$this->_06_rf->HrefValue = "";
			$this->_06_rf->TooltipValue = "";

			// 07_rf
			$this->_07_rf->LinkCustomAttributes = "";
			$this->_07_rf->HrefValue = "";
			$this->_07_rf->TooltipValue = "";

			// 08_rf
			$this->_08_rf->LinkCustomAttributes = "";
			$this->_08_rf->HrefValue = "";
			$this->_08_rf->TooltipValue = "";

			// 09_rf
			$this->_09_rf->LinkCustomAttributes = "";
			$this->_09_rf->HrefValue = "";
			$this->_09_rf->TooltipValue = "";

			// 10_rf
			$this->_10_rf->LinkCustomAttributes = "";
			$this->_10_rf->HrefValue = "";
			$this->_10_rf->TooltipValue = "";

			// 11_rf
			$this->_11_rf->LinkCustomAttributes = "";
			$this->_11_rf->HrefValue = "";
			$this->_11_rf->TooltipValue = "";

			// 12_rf
			$this->_12_rf->LinkCustomAttributes = "";
			$this->_12_rf->HrefValue = "";
			$this->_12_rf->TooltipValue = "";

			// 13_rf
			$this->_13_rf->LinkCustomAttributes = "";
			$this->_13_rf->HrefValue = "";
			$this->_13_rf->TooltipValue = "";

			// 14_rf
			$this->_14_rf->LinkCustomAttributes = "";
			$this->_14_rf->HrefValue = "";
			$this->_14_rf->TooltipValue = "";

			// 15_rf
			$this->_15_rf->LinkCustomAttributes = "";
			$this->_15_rf->HrefValue = "";
			$this->_15_rf->TooltipValue = "";

			// 16_rf
			$this->_16_rf->LinkCustomAttributes = "";
			$this->_16_rf->HrefValue = "";
			$this->_16_rf->TooltipValue = "";

			// 17_rf
			$this->_17_rf->LinkCustomAttributes = "";
			$this->_17_rf->HrefValue = "";
			$this->_17_rf->TooltipValue = "";

			// 18_rf
			$this->_18_rf->LinkCustomAttributes = "";
			$this->_18_rf->HrefValue = "";
			$this->_18_rf->TooltipValue = "";

			// 19_rf
			$this->_19_rf->LinkCustomAttributes = "";
			$this->_19_rf->HrefValue = "";
			$this->_19_rf->TooltipValue = "";

			// 20_rf
			$this->_20_rf->LinkCustomAttributes = "";
			$this->_20_rf->HrefValue = "";
			$this->_20_rf->TooltipValue = "";

			// 21_rf
			$this->_21_rf->LinkCustomAttributes = "";
			$this->_21_rf->HrefValue = "";
			$this->_21_rf->TooltipValue = "";

			// 22_rf
			$this->_22_rf->LinkCustomAttributes = "";
			$this->_22_rf->HrefValue = "";
			$this->_22_rf->TooltipValue = "";

			// 23_rf
			$this->_23_rf->LinkCustomAttributes = "";
			$this->_23_rf->HrefValue = "";
			$this->_23_rf->TooltipValue = "";

			// 24_rf
			$this->_24_rf->LinkCustomAttributes = "";
			$this->_24_rf->HrefValue = "";
			$this->_24_rf->TooltipValue = "";

			// 25_rf
			$this->_25_rf->LinkCustomAttributes = "";
			$this->_25_rf->HrefValue = "";
			$this->_25_rf->TooltipValue = "";

			// 26_rf
			$this->_26_rf->LinkCustomAttributes = "";
			$this->_26_rf->HrefValue = "";
			$this->_26_rf->TooltipValue = "";

			// 27_rf
			$this->_27_rf->LinkCustomAttributes = "";
			$this->_27_rf->HrefValue = "";
			$this->_27_rf->TooltipValue = "";

			// 28_rf
			$this->_28_rf->LinkCustomAttributes = "";
			$this->_28_rf->HrefValue = "";
			$this->_28_rf->TooltipValue = "";

			// 29_rf
			$this->_29_rf->LinkCustomAttributes = "";
			$this->_29_rf->HrefValue = "";
			$this->_29_rf->TooltipValue = "";

			// 30_rf
			$this->_30_rf->LinkCustomAttributes = "";
			$this->_30_rf->HrefValue = "";
			$this->_30_rf->TooltipValue = "";

			// 31_rf
			$this->_31_rf->LinkCustomAttributes = "";
			$this->_31_rf->HrefValue = "";
			$this->_31_rf->TooltipValue = "";

			// SubDivisionId
			$this->SubDivisionId->LinkCustomAttributes = "";
			$this->SubDivisionId->HrefValue = "";
			$this->SubDivisionId->TooltipValue = "";

			// Water_Year
			$this->Water_Year->LinkCustomAttributes = "";
			$this->Water_Year->HrefValue = "";
			$this->Water_Year->TooltipValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";
			$this->SenderMobileNumber->TooltipValue = "";

			// IsChanged
			$this->IsChanged->LinkCustomAttributes = "";
			$this->IsChanged->HrefValue = "";
			$this->IsChanged->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// StationId
			$this->StationId->EditAttrs["class"] = "form-control";
			$this->StationId->EditCustomAttributes = "";
			$curVal = strval($this->StationId->CurrentValue);
			if ($curVal != "") {
				$this->StationId->EditValue = $this->StationId->lookupCacheOption($curVal);
				if ($this->StationId->EditValue === NULL) { // Lookup from database
					$filterWrk = "`StationId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->StationId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->StationId->EditValue = $this->StationId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->StationId->EditValue = $this->StationId->CurrentValue;
					}
				}
			} else {
				$this->StationId->EditValue = NULL;
			}
			$this->StationId->ViewCustomAttributes = "";

			// month_id
			$this->month_id->EditAttrs["class"] = "form-control";
			$this->month_id->EditCustomAttributes = "";
			$curVal = strval($this->month_id->CurrentValue);
			if ($curVal != "") {
				$this->month_id->EditValue = $this->month_id->lookupCacheOption($curVal);
				if ($this->month_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`month_id`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->month_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->month_id->EditValue = $this->month_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->month_id->EditValue = $this->month_id->CurrentValue;
					}
				}
			} else {
				$this->month_id->EditValue = NULL;
			}
			$this->month_id->ViewCustomAttributes = "";

			// 01_rf
			$this->_01_rf->EditAttrs["class"] = "form-control";
			$this->_01_rf->EditCustomAttributes = "";
			$this->_01_rf->EditValue = HtmlEncode($this->_01_rf->CurrentValue);
			if (strval($this->_01_rf->EditValue) != "" && is_numeric($this->_01_rf->EditValue))
				$this->_01_rf->EditValue = FormatNumber($this->_01_rf->EditValue, -2, -2, -2, -2);
			

			// 02_rf
			$this->_02_rf->EditAttrs["class"] = "form-control";
			$this->_02_rf->EditCustomAttributes = "";
			$this->_02_rf->EditValue = HtmlEncode($this->_02_rf->CurrentValue);
			if (strval($this->_02_rf->EditValue) != "" && is_numeric($this->_02_rf->EditValue))
				$this->_02_rf->EditValue = FormatNumber($this->_02_rf->EditValue, -2, -2, -2, -2);
			

			// 03_rf
			$this->_03_rf->EditAttrs["class"] = "form-control";
			$this->_03_rf->EditCustomAttributes = "";
			$this->_03_rf->EditValue = HtmlEncode($this->_03_rf->CurrentValue);
			if (strval($this->_03_rf->EditValue) != "" && is_numeric($this->_03_rf->EditValue))
				$this->_03_rf->EditValue = FormatNumber($this->_03_rf->EditValue, -2, -2, -2, -2);
			

			// 04_rf
			$this->_04_rf->EditAttrs["class"] = "form-control";
			$this->_04_rf->EditCustomAttributes = "";
			$this->_04_rf->EditValue = HtmlEncode($this->_04_rf->CurrentValue);
			if (strval($this->_04_rf->EditValue) != "" && is_numeric($this->_04_rf->EditValue))
				$this->_04_rf->EditValue = FormatNumber($this->_04_rf->EditValue, -2, -2, -2, -2);
			

			// 05_rf
			$this->_05_rf->EditAttrs["class"] = "form-control";
			$this->_05_rf->EditCustomAttributes = "";
			$this->_05_rf->EditValue = HtmlEncode($this->_05_rf->CurrentValue);
			if (strval($this->_05_rf->EditValue) != "" && is_numeric($this->_05_rf->EditValue))
				$this->_05_rf->EditValue = FormatNumber($this->_05_rf->EditValue, -2, -2, -2, -2);
			

			// 06_rf
			$this->_06_rf->EditAttrs["class"] = "form-control";
			$this->_06_rf->EditCustomAttributes = "";
			$this->_06_rf->EditValue = HtmlEncode($this->_06_rf->CurrentValue);
			if (strval($this->_06_rf->EditValue) != "" && is_numeric($this->_06_rf->EditValue))
				$this->_06_rf->EditValue = FormatNumber($this->_06_rf->EditValue, -2, -2, -2, -2);
			

			// 07_rf
			$this->_07_rf->EditAttrs["class"] = "form-control";
			$this->_07_rf->EditCustomAttributes = "";
			$this->_07_rf->EditValue = HtmlEncode($this->_07_rf->CurrentValue);
			if (strval($this->_07_rf->EditValue) != "" && is_numeric($this->_07_rf->EditValue))
				$this->_07_rf->EditValue = FormatNumber($this->_07_rf->EditValue, -2, -2, -2, -2);
			

			// 08_rf
			$this->_08_rf->EditAttrs["class"] = "form-control";
			$this->_08_rf->EditCustomAttributes = "";
			$this->_08_rf->EditValue = HtmlEncode($this->_08_rf->CurrentValue);
			if (strval($this->_08_rf->EditValue) != "" && is_numeric($this->_08_rf->EditValue))
				$this->_08_rf->EditValue = FormatNumber($this->_08_rf->EditValue, -2, -2, -2, -2);
			

			// 09_rf
			$this->_09_rf->EditAttrs["class"] = "form-control";
			$this->_09_rf->EditCustomAttributes = "";
			$this->_09_rf->EditValue = HtmlEncode($this->_09_rf->CurrentValue);
			if (strval($this->_09_rf->EditValue) != "" && is_numeric($this->_09_rf->EditValue))
				$this->_09_rf->EditValue = FormatNumber($this->_09_rf->EditValue, -2, -2, -2, -2);
			

			// 10_rf
			$this->_10_rf->EditAttrs["class"] = "form-control";
			$this->_10_rf->EditCustomAttributes = "";
			$this->_10_rf->EditValue = HtmlEncode($this->_10_rf->CurrentValue);
			if (strval($this->_10_rf->EditValue) != "" && is_numeric($this->_10_rf->EditValue))
				$this->_10_rf->EditValue = FormatNumber($this->_10_rf->EditValue, -2, -2, -2, -2);
			

			// 11_rf
			$this->_11_rf->EditAttrs["class"] = "form-control";
			$this->_11_rf->EditCustomAttributes = "";
			$this->_11_rf->EditValue = HtmlEncode($this->_11_rf->CurrentValue);
			if (strval($this->_11_rf->EditValue) != "" && is_numeric($this->_11_rf->EditValue))
				$this->_11_rf->EditValue = FormatNumber($this->_11_rf->EditValue, -2, -2, -2, -2);
			

			// 12_rf
			$this->_12_rf->EditAttrs["class"] = "form-control";
			$this->_12_rf->EditCustomAttributes = "";
			$this->_12_rf->EditValue = HtmlEncode($this->_12_rf->CurrentValue);
			if (strval($this->_12_rf->EditValue) != "" && is_numeric($this->_12_rf->EditValue))
				$this->_12_rf->EditValue = FormatNumber($this->_12_rf->EditValue, -2, -2, -2, -2);
			

			// 13_rf
			$this->_13_rf->EditAttrs["class"] = "form-control";
			$this->_13_rf->EditCustomAttributes = "";
			$this->_13_rf->EditValue = HtmlEncode($this->_13_rf->CurrentValue);
			if (strval($this->_13_rf->EditValue) != "" && is_numeric($this->_13_rf->EditValue))
				$this->_13_rf->EditValue = FormatNumber($this->_13_rf->EditValue, -2, -2, -2, -2);
			

			// 14_rf
			$this->_14_rf->EditAttrs["class"] = "form-control";
			$this->_14_rf->EditCustomAttributes = "";
			$this->_14_rf->EditValue = HtmlEncode($this->_14_rf->CurrentValue);
			if (strval($this->_14_rf->EditValue) != "" && is_numeric($this->_14_rf->EditValue))
				$this->_14_rf->EditValue = FormatNumber($this->_14_rf->EditValue, -2, -2, -2, -2);
			

			// 15_rf
			$this->_15_rf->EditAttrs["class"] = "form-control";
			$this->_15_rf->EditCustomAttributes = "";
			$this->_15_rf->EditValue = HtmlEncode($this->_15_rf->CurrentValue);
			if (strval($this->_15_rf->EditValue) != "" && is_numeric($this->_15_rf->EditValue))
				$this->_15_rf->EditValue = FormatNumber($this->_15_rf->EditValue, -2, -2, -2, -2);
			

			// 16_rf
			$this->_16_rf->EditAttrs["class"] = "form-control";
			$this->_16_rf->EditCustomAttributes = "";
			$this->_16_rf->EditValue = HtmlEncode($this->_16_rf->CurrentValue);
			if (strval($this->_16_rf->EditValue) != "" && is_numeric($this->_16_rf->EditValue))
				$this->_16_rf->EditValue = FormatNumber($this->_16_rf->EditValue, -2, -2, -2, -2);
			

			// 17_rf
			$this->_17_rf->EditAttrs["class"] = "form-control";
			$this->_17_rf->EditCustomAttributes = "";
			$this->_17_rf->EditValue = HtmlEncode($this->_17_rf->CurrentValue);
			if (strval($this->_17_rf->EditValue) != "" && is_numeric($this->_17_rf->EditValue))
				$this->_17_rf->EditValue = FormatNumber($this->_17_rf->EditValue, -2, -2, -2, -2);
			

			// 18_rf
			$this->_18_rf->EditAttrs["class"] = "form-control";
			$this->_18_rf->EditCustomAttributes = "";
			$this->_18_rf->EditValue = HtmlEncode($this->_18_rf->CurrentValue);
			if (strval($this->_18_rf->EditValue) != "" && is_numeric($this->_18_rf->EditValue))
				$this->_18_rf->EditValue = FormatNumber($this->_18_rf->EditValue, -2, -2, -2, -2);
			

			// 19_rf
			$this->_19_rf->EditAttrs["class"] = "form-control";
			$this->_19_rf->EditCustomAttributes = "";
			$this->_19_rf->EditValue = HtmlEncode($this->_19_rf->CurrentValue);
			if (strval($this->_19_rf->EditValue) != "" && is_numeric($this->_19_rf->EditValue))
				$this->_19_rf->EditValue = FormatNumber($this->_19_rf->EditValue, -2, -2, -2, -2);
			

			// 20_rf
			$this->_20_rf->EditAttrs["class"] = "form-control";
			$this->_20_rf->EditCustomAttributes = "";
			$this->_20_rf->EditValue = HtmlEncode($this->_20_rf->CurrentValue);
			if (strval($this->_20_rf->EditValue) != "" && is_numeric($this->_20_rf->EditValue))
				$this->_20_rf->EditValue = FormatNumber($this->_20_rf->EditValue, -2, -2, -2, -2);
			

			// 21_rf
			$this->_21_rf->EditAttrs["class"] = "form-control";
			$this->_21_rf->EditCustomAttributes = "";
			$this->_21_rf->EditValue = HtmlEncode($this->_21_rf->CurrentValue);
			if (strval($this->_21_rf->EditValue) != "" && is_numeric($this->_21_rf->EditValue))
				$this->_21_rf->EditValue = FormatNumber($this->_21_rf->EditValue, -2, -2, -2, -2);
			

			// 22_rf
			$this->_22_rf->EditAttrs["class"] = "form-control";
			$this->_22_rf->EditCustomAttributes = "";
			$this->_22_rf->EditValue = HtmlEncode($this->_22_rf->CurrentValue);
			if (strval($this->_22_rf->EditValue) != "" && is_numeric($this->_22_rf->EditValue))
				$this->_22_rf->EditValue = FormatNumber($this->_22_rf->EditValue, -2, -2, -2, -2);
			

			// 23_rf
			$this->_23_rf->EditAttrs["class"] = "form-control";
			$this->_23_rf->EditCustomAttributes = "";
			$this->_23_rf->EditValue = HtmlEncode($this->_23_rf->CurrentValue);
			if (strval($this->_23_rf->EditValue) != "" && is_numeric($this->_23_rf->EditValue))
				$this->_23_rf->EditValue = FormatNumber($this->_23_rf->EditValue, -2, -2, -2, -2);
			

			// 24_rf
			$this->_24_rf->EditAttrs["class"] = "form-control";
			$this->_24_rf->EditCustomAttributes = "";
			$this->_24_rf->EditValue = HtmlEncode($this->_24_rf->CurrentValue);
			if (strval($this->_24_rf->EditValue) != "" && is_numeric($this->_24_rf->EditValue))
				$this->_24_rf->EditValue = FormatNumber($this->_24_rf->EditValue, -2, -2, -2, -2);
			

			// 25_rf
			$this->_25_rf->EditAttrs["class"] = "form-control";
			$this->_25_rf->EditCustomAttributes = "";
			$this->_25_rf->EditValue = HtmlEncode($this->_25_rf->CurrentValue);
			if (strval($this->_25_rf->EditValue) != "" && is_numeric($this->_25_rf->EditValue))
				$this->_25_rf->EditValue = FormatNumber($this->_25_rf->EditValue, -2, -2, -2, -2);
			

			// 26_rf
			$this->_26_rf->EditAttrs["class"] = "form-control";
			$this->_26_rf->EditCustomAttributes = "";
			$this->_26_rf->EditValue = HtmlEncode($this->_26_rf->CurrentValue);
			if (strval($this->_26_rf->EditValue) != "" && is_numeric($this->_26_rf->EditValue))
				$this->_26_rf->EditValue = FormatNumber($this->_26_rf->EditValue, -2, -2, -2, -2);
			

			// 27_rf
			$this->_27_rf->EditAttrs["class"] = "form-control";
			$this->_27_rf->EditCustomAttributes = "";
			$this->_27_rf->EditValue = HtmlEncode($this->_27_rf->CurrentValue);
			if (strval($this->_27_rf->EditValue) != "" && is_numeric($this->_27_rf->EditValue))
				$this->_27_rf->EditValue = FormatNumber($this->_27_rf->EditValue, -2, -2, -2, -2);
			

			// 28_rf
			$this->_28_rf->EditAttrs["class"] = "form-control";
			$this->_28_rf->EditCustomAttributes = "";
			$this->_28_rf->EditValue = HtmlEncode($this->_28_rf->CurrentValue);
			if (strval($this->_28_rf->EditValue) != "" && is_numeric($this->_28_rf->EditValue))
				$this->_28_rf->EditValue = FormatNumber($this->_28_rf->EditValue, -2, -2, -2, -2);
			

			// 29_rf
			$this->_29_rf->EditAttrs["class"] = "form-control";
			$this->_29_rf->EditCustomAttributes = "";
			$this->_29_rf->EditValue = HtmlEncode($this->_29_rf->CurrentValue);
			if (strval($this->_29_rf->EditValue) != "" && is_numeric($this->_29_rf->EditValue))
				$this->_29_rf->EditValue = FormatNumber($this->_29_rf->EditValue, -2, -2, -2, -2);
			

			// 30_rf
			$this->_30_rf->EditAttrs["class"] = "form-control";
			$this->_30_rf->EditCustomAttributes = "";
			$this->_30_rf->EditValue = HtmlEncode($this->_30_rf->CurrentValue);
			if (strval($this->_30_rf->EditValue) != "" && is_numeric($this->_30_rf->EditValue))
				$this->_30_rf->EditValue = FormatNumber($this->_30_rf->EditValue, -2, -2, -2, -2);
			

			// 31_rf
			$this->_31_rf->EditAttrs["class"] = "form-control";
			$this->_31_rf->EditCustomAttributes = "";
			$this->_31_rf->EditValue = HtmlEncode($this->_31_rf->CurrentValue);
			if (strval($this->_31_rf->EditValue) != "" && is_numeric($this->_31_rf->EditValue))
				$this->_31_rf->EditValue = FormatNumber($this->_31_rf->EditValue, -2, -2, -2, -2);
			

			// SubDivisionId
			$this->SubDivisionId->EditAttrs["class"] = "form-control";
			$this->SubDivisionId->EditCustomAttributes = "";
			$curVal = strval($this->SubDivisionId->CurrentValue);
			if ($curVal != "") {
				$this->SubDivisionId->EditValue = $this->SubDivisionId->lookupCacheOption($curVal);
				if ($this->SubDivisionId->EditValue === NULL) { // Lookup from database
					$filterWrk = "`SubDivisionId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->SubDivisionId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->SubDivisionId->EditValue = $this->SubDivisionId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SubDivisionId->EditValue = $this->SubDivisionId->CurrentValue;
					}
				}
			} else {
				$this->SubDivisionId->EditValue = NULL;
			}
			$this->SubDivisionId->ViewCustomAttributes = "";

			// Water_Year
			$this->Water_Year->EditAttrs["class"] = "form-control";
			$this->Water_Year->EditCustomAttributes = "";
			$this->Water_Year->EditValue = $this->Water_Year->CurrentValue;
			$this->Water_Year->ViewCustomAttributes = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			$this->SenderMobileNumber->EditValue = $this->SenderMobileNumber->CurrentValue;
			$this->SenderMobileNumber->ViewCustomAttributes = "";

			// IsChanged
			$this->IsChanged->EditAttrs["class"] = "form-control";
			$this->IsChanged->EditCustomAttributes = "";
			$this->IsChanged->EditValue = $this->IsChanged->CurrentValue;
			$this->IsChanged->ViewCustomAttributes = "";

			// Edit refer script
			// StationId

			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// month_id
			$this->month_id->LinkCustomAttributes = "";
			$this->month_id->HrefValue = "";
			$this->month_id->TooltipValue = "";

			// 01_rf
			$this->_01_rf->LinkCustomAttributes = "";
			$this->_01_rf->HrefValue = "";

			// 02_rf
			$this->_02_rf->LinkCustomAttributes = "";
			$this->_02_rf->HrefValue = "";

			// 03_rf
			$this->_03_rf->LinkCustomAttributes = "";
			$this->_03_rf->HrefValue = "";

			// 04_rf
			$this->_04_rf->LinkCustomAttributes = "";
			$this->_04_rf->HrefValue = "";

			// 05_rf
			$this->_05_rf->LinkCustomAttributes = "";
			$this->_05_rf->HrefValue = "";

			// 06_rf
			$this->_06_rf->LinkCustomAttributes = "";
			$this->_06_rf->HrefValue = "";

			// 07_rf
			$this->_07_rf->LinkCustomAttributes = "";
			$this->_07_rf->HrefValue = "";

			// 08_rf
			$this->_08_rf->LinkCustomAttributes = "";
			$this->_08_rf->HrefValue = "";

			// 09_rf
			$this->_09_rf->LinkCustomAttributes = "";
			$this->_09_rf->HrefValue = "";

			// 10_rf
			$this->_10_rf->LinkCustomAttributes = "";
			$this->_10_rf->HrefValue = "";

			// 11_rf
			$this->_11_rf->LinkCustomAttributes = "";
			$this->_11_rf->HrefValue = "";

			// 12_rf
			$this->_12_rf->LinkCustomAttributes = "";
			$this->_12_rf->HrefValue = "";

			// 13_rf
			$this->_13_rf->LinkCustomAttributes = "";
			$this->_13_rf->HrefValue = "";

			// 14_rf
			$this->_14_rf->LinkCustomAttributes = "";
			$this->_14_rf->HrefValue = "";

			// 15_rf
			$this->_15_rf->LinkCustomAttributes = "";
			$this->_15_rf->HrefValue = "";

			// 16_rf
			$this->_16_rf->LinkCustomAttributes = "";
			$this->_16_rf->HrefValue = "";

			// 17_rf
			$this->_17_rf->LinkCustomAttributes = "";
			$this->_17_rf->HrefValue = "";

			// 18_rf
			$this->_18_rf->LinkCustomAttributes = "";
			$this->_18_rf->HrefValue = "";

			// 19_rf
			$this->_19_rf->LinkCustomAttributes = "";
			$this->_19_rf->HrefValue = "";

			// 20_rf
			$this->_20_rf->LinkCustomAttributes = "";
			$this->_20_rf->HrefValue = "";

			// 21_rf
			$this->_21_rf->LinkCustomAttributes = "";
			$this->_21_rf->HrefValue = "";

			// 22_rf
			$this->_22_rf->LinkCustomAttributes = "";
			$this->_22_rf->HrefValue = "";

			// 23_rf
			$this->_23_rf->LinkCustomAttributes = "";
			$this->_23_rf->HrefValue = "";

			// 24_rf
			$this->_24_rf->LinkCustomAttributes = "";
			$this->_24_rf->HrefValue = "";

			// 25_rf
			$this->_25_rf->LinkCustomAttributes = "";
			$this->_25_rf->HrefValue = "";

			// 26_rf
			$this->_26_rf->LinkCustomAttributes = "";
			$this->_26_rf->HrefValue = "";

			// 27_rf
			$this->_27_rf->LinkCustomAttributes = "";
			$this->_27_rf->HrefValue = "";

			// 28_rf
			$this->_28_rf->LinkCustomAttributes = "";
			$this->_28_rf->HrefValue = "";

			// 29_rf
			$this->_29_rf->LinkCustomAttributes = "";
			$this->_29_rf->HrefValue = "";

			// 30_rf
			$this->_30_rf->LinkCustomAttributes = "";
			$this->_30_rf->HrefValue = "";

			// 31_rf
			$this->_31_rf->LinkCustomAttributes = "";
			$this->_31_rf->HrefValue = "";

			// SubDivisionId
			$this->SubDivisionId->LinkCustomAttributes = "";
			$this->SubDivisionId->HrefValue = "";
			$this->SubDivisionId->TooltipValue = "";

			// Water_Year
			$this->Water_Year->LinkCustomAttributes = "";
			$this->Water_Year->HrefValue = "";
			$this->Water_Year->TooltipValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";
			$this->SenderMobileNumber->TooltipValue = "";

			// IsChanged
			$this->IsChanged->LinkCustomAttributes = "";
			$this->IsChanged->HrefValue = "";
			$this->IsChanged->TooltipValue = "";
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
		if ($this->month_id->Required) {
			if (!$this->month_id->IsDetailKey && $this->month_id->FormValue != NULL && $this->month_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->month_id->caption(), $this->month_id->RequiredErrorMessage));
			}
		}
		if ($this->_01_rf->Required) {
			if (!$this->_01_rf->IsDetailKey && $this->_01_rf->FormValue != NULL && $this->_01_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_01_rf->caption(), $this->_01_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_01_rf->FormValue)) {
			AddMessage($FormError, $this->_01_rf->errorMessage());
		}
		if ($this->_02_rf->Required) {
			if (!$this->_02_rf->IsDetailKey && $this->_02_rf->FormValue != NULL && $this->_02_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_02_rf->caption(), $this->_02_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_02_rf->FormValue)) {
			AddMessage($FormError, $this->_02_rf->errorMessage());
		}
		if ($this->_03_rf->Required) {
			if (!$this->_03_rf->IsDetailKey && $this->_03_rf->FormValue != NULL && $this->_03_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_03_rf->caption(), $this->_03_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_03_rf->FormValue)) {
			AddMessage($FormError, $this->_03_rf->errorMessage());
		}
		if ($this->_04_rf->Required) {
			if (!$this->_04_rf->IsDetailKey && $this->_04_rf->FormValue != NULL && $this->_04_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_04_rf->caption(), $this->_04_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_04_rf->FormValue)) {
			AddMessage($FormError, $this->_04_rf->errorMessage());
		}
		if ($this->_05_rf->Required) {
			if (!$this->_05_rf->IsDetailKey && $this->_05_rf->FormValue != NULL && $this->_05_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_05_rf->caption(), $this->_05_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_05_rf->FormValue)) {
			AddMessage($FormError, $this->_05_rf->errorMessage());
		}
		if ($this->_06_rf->Required) {
			if (!$this->_06_rf->IsDetailKey && $this->_06_rf->FormValue != NULL && $this->_06_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_06_rf->caption(), $this->_06_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_06_rf->FormValue)) {
			AddMessage($FormError, $this->_06_rf->errorMessage());
		}
		if ($this->_07_rf->Required) {
			if (!$this->_07_rf->IsDetailKey && $this->_07_rf->FormValue != NULL && $this->_07_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_07_rf->caption(), $this->_07_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_07_rf->FormValue)) {
			AddMessage($FormError, $this->_07_rf->errorMessage());
		}
		if ($this->_08_rf->Required) {
			if (!$this->_08_rf->IsDetailKey && $this->_08_rf->FormValue != NULL && $this->_08_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_08_rf->caption(), $this->_08_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_08_rf->FormValue)) {
			AddMessage($FormError, $this->_08_rf->errorMessage());
		}
		if ($this->_09_rf->Required) {
			if (!$this->_09_rf->IsDetailKey && $this->_09_rf->FormValue != NULL && $this->_09_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_09_rf->caption(), $this->_09_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_09_rf->FormValue)) {
			AddMessage($FormError, $this->_09_rf->errorMessage());
		}
		if ($this->_10_rf->Required) {
			if (!$this->_10_rf->IsDetailKey && $this->_10_rf->FormValue != NULL && $this->_10_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_10_rf->caption(), $this->_10_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_10_rf->FormValue)) {
			AddMessage($FormError, $this->_10_rf->errorMessage());
		}
		if ($this->_11_rf->Required) {
			if (!$this->_11_rf->IsDetailKey && $this->_11_rf->FormValue != NULL && $this->_11_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_11_rf->caption(), $this->_11_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_11_rf->FormValue)) {
			AddMessage($FormError, $this->_11_rf->errorMessage());
		}
		if ($this->_12_rf->Required) {
			if (!$this->_12_rf->IsDetailKey && $this->_12_rf->FormValue != NULL && $this->_12_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_12_rf->caption(), $this->_12_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_12_rf->FormValue)) {
			AddMessage($FormError, $this->_12_rf->errorMessage());
		}
		if ($this->_13_rf->Required) {
			if (!$this->_13_rf->IsDetailKey && $this->_13_rf->FormValue != NULL && $this->_13_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_13_rf->caption(), $this->_13_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_13_rf->FormValue)) {
			AddMessage($FormError, $this->_13_rf->errorMessage());
		}
		if ($this->_14_rf->Required) {
			if (!$this->_14_rf->IsDetailKey && $this->_14_rf->FormValue != NULL && $this->_14_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_14_rf->caption(), $this->_14_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_14_rf->FormValue)) {
			AddMessage($FormError, $this->_14_rf->errorMessage());
		}
		if ($this->_15_rf->Required) {
			if (!$this->_15_rf->IsDetailKey && $this->_15_rf->FormValue != NULL && $this->_15_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_15_rf->caption(), $this->_15_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_15_rf->FormValue)) {
			AddMessage($FormError, $this->_15_rf->errorMessage());
		}
		if ($this->_16_rf->Required) {
			if (!$this->_16_rf->IsDetailKey && $this->_16_rf->FormValue != NULL && $this->_16_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_16_rf->caption(), $this->_16_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_16_rf->FormValue)) {
			AddMessage($FormError, $this->_16_rf->errorMessage());
		}
		if ($this->_17_rf->Required) {
			if (!$this->_17_rf->IsDetailKey && $this->_17_rf->FormValue != NULL && $this->_17_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_17_rf->caption(), $this->_17_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_17_rf->FormValue)) {
			AddMessage($FormError, $this->_17_rf->errorMessage());
		}
		if ($this->_18_rf->Required) {
			if (!$this->_18_rf->IsDetailKey && $this->_18_rf->FormValue != NULL && $this->_18_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_18_rf->caption(), $this->_18_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_18_rf->FormValue)) {
			AddMessage($FormError, $this->_18_rf->errorMessage());
		}
		if ($this->_19_rf->Required) {
			if (!$this->_19_rf->IsDetailKey && $this->_19_rf->FormValue != NULL && $this->_19_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_19_rf->caption(), $this->_19_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_19_rf->FormValue)) {
			AddMessage($FormError, $this->_19_rf->errorMessage());
		}
		if ($this->_20_rf->Required) {
			if (!$this->_20_rf->IsDetailKey && $this->_20_rf->FormValue != NULL && $this->_20_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_20_rf->caption(), $this->_20_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_20_rf->FormValue)) {
			AddMessage($FormError, $this->_20_rf->errorMessage());
		}
		if ($this->_21_rf->Required) {
			if (!$this->_21_rf->IsDetailKey && $this->_21_rf->FormValue != NULL && $this->_21_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_21_rf->caption(), $this->_21_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_21_rf->FormValue)) {
			AddMessage($FormError, $this->_21_rf->errorMessage());
		}
		if ($this->_22_rf->Required) {
			if (!$this->_22_rf->IsDetailKey && $this->_22_rf->FormValue != NULL && $this->_22_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_22_rf->caption(), $this->_22_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_22_rf->FormValue)) {
			AddMessage($FormError, $this->_22_rf->errorMessage());
		}
		if ($this->_23_rf->Required) {
			if (!$this->_23_rf->IsDetailKey && $this->_23_rf->FormValue != NULL && $this->_23_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_23_rf->caption(), $this->_23_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_23_rf->FormValue)) {
			AddMessage($FormError, $this->_23_rf->errorMessage());
		}
		if ($this->_24_rf->Required) {
			if (!$this->_24_rf->IsDetailKey && $this->_24_rf->FormValue != NULL && $this->_24_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_24_rf->caption(), $this->_24_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_24_rf->FormValue)) {
			AddMessage($FormError, $this->_24_rf->errorMessage());
		}
		if ($this->_25_rf->Required) {
			if (!$this->_25_rf->IsDetailKey && $this->_25_rf->FormValue != NULL && $this->_25_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_25_rf->caption(), $this->_25_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_25_rf->FormValue)) {
			AddMessage($FormError, $this->_25_rf->errorMessage());
		}
		if ($this->_26_rf->Required) {
			if (!$this->_26_rf->IsDetailKey && $this->_26_rf->FormValue != NULL && $this->_26_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_26_rf->caption(), $this->_26_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_26_rf->FormValue)) {
			AddMessage($FormError, $this->_26_rf->errorMessage());
		}
		if ($this->_27_rf->Required) {
			if (!$this->_27_rf->IsDetailKey && $this->_27_rf->FormValue != NULL && $this->_27_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_27_rf->caption(), $this->_27_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_27_rf->FormValue)) {
			AddMessage($FormError, $this->_27_rf->errorMessage());
		}
		if ($this->_28_rf->Required) {
			if (!$this->_28_rf->IsDetailKey && $this->_28_rf->FormValue != NULL && $this->_28_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_28_rf->caption(), $this->_28_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_28_rf->FormValue)) {
			AddMessage($FormError, $this->_28_rf->errorMessage());
		}
		if ($this->_29_rf->Required) {
			if (!$this->_29_rf->IsDetailKey && $this->_29_rf->FormValue != NULL && $this->_29_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_29_rf->caption(), $this->_29_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_29_rf->FormValue)) {
			AddMessage($FormError, $this->_29_rf->errorMessage());
		}
		if ($this->_30_rf->Required) {
			if (!$this->_30_rf->IsDetailKey && $this->_30_rf->FormValue != NULL && $this->_30_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_30_rf->caption(), $this->_30_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_30_rf->FormValue)) {
			AddMessage($FormError, $this->_30_rf->errorMessage());
		}
		if ($this->_31_rf->Required) {
			if (!$this->_31_rf->IsDetailKey && $this->_31_rf->FormValue != NULL && $this->_31_rf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_31_rf->caption(), $this->_31_rf->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_31_rf->FormValue)) {
			AddMessage($FormError, $this->_31_rf->errorMessage());
		}
		if ($this->SubDivisionId->Required) {
			if (!$this->SubDivisionId->IsDetailKey && $this->SubDivisionId->FormValue != NULL && $this->SubDivisionId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubDivisionId->caption(), $this->SubDivisionId->RequiredErrorMessage));
			}
		}
		if ($this->Water_Year->Required) {
			if (!$this->Water_Year->IsDetailKey && $this->Water_Year->FormValue != NULL && $this->Water_Year->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Water_Year->caption(), $this->Water_Year->RequiredErrorMessage));
			}
		}
		if ($this->SenderMobileNumber->Required) {
			if (!$this->SenderMobileNumber->IsDetailKey && $this->SenderMobileNumber->FormValue != NULL && $this->SenderMobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SenderMobileNumber->caption(), $this->SenderMobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->IsChanged->Required) {
			if (!$this->IsChanged->IsDetailKey && $this->IsChanged->FormValue != NULL && $this->IsChanged->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IsChanged->caption(), $this->IsChanged->RequiredErrorMessage));
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

			// 01_rf
			$this->_01_rf->setDbValueDef($rsnew, $this->_01_rf->CurrentValue, NULL, $this->_01_rf->ReadOnly);

			// 02_rf
			$this->_02_rf->setDbValueDef($rsnew, $this->_02_rf->CurrentValue, NULL, $this->_02_rf->ReadOnly);

			// 03_rf
			$this->_03_rf->setDbValueDef($rsnew, $this->_03_rf->CurrentValue, NULL, $this->_03_rf->ReadOnly);

			// 04_rf
			$this->_04_rf->setDbValueDef($rsnew, $this->_04_rf->CurrentValue, NULL, $this->_04_rf->ReadOnly);

			// 05_rf
			$this->_05_rf->setDbValueDef($rsnew, $this->_05_rf->CurrentValue, NULL, $this->_05_rf->ReadOnly);

			// 06_rf
			$this->_06_rf->setDbValueDef($rsnew, $this->_06_rf->CurrentValue, NULL, $this->_06_rf->ReadOnly);

			// 07_rf
			$this->_07_rf->setDbValueDef($rsnew, $this->_07_rf->CurrentValue, NULL, $this->_07_rf->ReadOnly);

			// 08_rf
			$this->_08_rf->setDbValueDef($rsnew, $this->_08_rf->CurrentValue, NULL, $this->_08_rf->ReadOnly);

			// 09_rf
			$this->_09_rf->setDbValueDef($rsnew, $this->_09_rf->CurrentValue, NULL, $this->_09_rf->ReadOnly);

			// 10_rf
			$this->_10_rf->setDbValueDef($rsnew, $this->_10_rf->CurrentValue, NULL, $this->_10_rf->ReadOnly);

			// 11_rf
			$this->_11_rf->setDbValueDef($rsnew, $this->_11_rf->CurrentValue, NULL, $this->_11_rf->ReadOnly);

			// 12_rf
			$this->_12_rf->setDbValueDef($rsnew, $this->_12_rf->CurrentValue, NULL, $this->_12_rf->ReadOnly);

			// 13_rf
			$this->_13_rf->setDbValueDef($rsnew, $this->_13_rf->CurrentValue, NULL, $this->_13_rf->ReadOnly);

			// 14_rf
			$this->_14_rf->setDbValueDef($rsnew, $this->_14_rf->CurrentValue, NULL, $this->_14_rf->ReadOnly);

			// 15_rf
			$this->_15_rf->setDbValueDef($rsnew, $this->_15_rf->CurrentValue, NULL, $this->_15_rf->ReadOnly);

			// 16_rf
			$this->_16_rf->setDbValueDef($rsnew, $this->_16_rf->CurrentValue, NULL, $this->_16_rf->ReadOnly);

			// 17_rf
			$this->_17_rf->setDbValueDef($rsnew, $this->_17_rf->CurrentValue, NULL, $this->_17_rf->ReadOnly);

			// 18_rf
			$this->_18_rf->setDbValueDef($rsnew, $this->_18_rf->CurrentValue, NULL, $this->_18_rf->ReadOnly);

			// 19_rf
			$this->_19_rf->setDbValueDef($rsnew, $this->_19_rf->CurrentValue, NULL, $this->_19_rf->ReadOnly);

			// 20_rf
			$this->_20_rf->setDbValueDef($rsnew, $this->_20_rf->CurrentValue, NULL, $this->_20_rf->ReadOnly);

			// 21_rf
			$this->_21_rf->setDbValueDef($rsnew, $this->_21_rf->CurrentValue, NULL, $this->_21_rf->ReadOnly);

			// 22_rf
			$this->_22_rf->setDbValueDef($rsnew, $this->_22_rf->CurrentValue, NULL, $this->_22_rf->ReadOnly);

			// 23_rf
			$this->_23_rf->setDbValueDef($rsnew, $this->_23_rf->CurrentValue, NULL, $this->_23_rf->ReadOnly);

			// 24_rf
			$this->_24_rf->setDbValueDef($rsnew, $this->_24_rf->CurrentValue, NULL, $this->_24_rf->ReadOnly);

			// 25_rf
			$this->_25_rf->setDbValueDef($rsnew, $this->_25_rf->CurrentValue, NULL, $this->_25_rf->ReadOnly);

			// 26_rf
			$this->_26_rf->setDbValueDef($rsnew, $this->_26_rf->CurrentValue, NULL, $this->_26_rf->ReadOnly);

			// 27_rf
			$this->_27_rf->setDbValueDef($rsnew, $this->_27_rf->CurrentValue, NULL, $this->_27_rf->ReadOnly);

			// 28_rf
			$this->_28_rf->setDbValueDef($rsnew, $this->_28_rf->CurrentValue, NULL, $this->_28_rf->ReadOnly);

			// 29_rf
			$this->_29_rf->setDbValueDef($rsnew, $this->_29_rf->CurrentValue, NULL, $this->_29_rf->ReadOnly);

			// 30_rf
			$this->_30_rf->setDbValueDef($rsnew, $this->_30_rf->CurrentValue, NULL, $this->_30_rf->ReadOnly);

			// 31_rf
			$this->_31_rf->setDbValueDef($rsnew, $this->_31_rf->CurrentValue, NULL, $this->_31_rf->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tbl_sms_monthly_daylist.php"), "", $this->TableVar, TRUE);
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
				case "x_month_id":
					break;
				case "x_SubDivisionId":
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
						case "x_month_id":
							break;
						case "x_SubDivisionId":
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