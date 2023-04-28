<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_sms_monthly_day_list extends tbl_sms_monthly_day
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_sms_monthly_day';

	// Page object name
	public $PageObjName = "tbl_sms_monthly_day_list";

	// Grid form hidden field names
	public $FormName = "ftbl_sms_monthly_daylist";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

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

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "tbl_sms_monthly_dayadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "tbl_sms_monthly_daydelete.php";
		$this->MultiUpdateUrl = "tbl_sms_monthly_dayupdate.php";

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions("div");
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions("div");
		$this->FilterOptions->TagClassName = "ew-filter-option ftbl_sms_monthly_daylistsrch";

		// List actions
		$this->ListActions = new ListActions();
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
			SaveDebugMessage();
			AddHeader("Location", $url);
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
						if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0)
							$val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
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

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecords = 25;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "25,50,100,-1"; // Page sizes (comma separated)
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
	public $SearchRowCount = 0; // For extended search
	public $SearchColumnCount = 0; // For extended search
	public $SearchFieldsPerRow = 1; // For extended search
	public $RecordCount = 0; // Record count
	public $EditRowCount;
	public $StartRowCount = 1;
	public $RowCount = 0;
	public $Attrs = []; // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SearchError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canList()) {
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
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
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

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Get custom export parameters
		if ($this->isExport() && $custom != "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (Config("USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (Config("USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
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

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		$this->setupLookupOptions($this->StationId);
		$this->setupLookupOptions($this->month_id);
		$this->setupLookupOptions($this->SubDivisionId);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Check QueryString parameters
			if (Get("action") !== NULL) {
				$this->CurrentAction = Get("action");

				// Clear inline mode
				if ($this->isCancel())
					$this->clearInlineMode();

				// Switch to grid edit mode
				if ($this->isGridEdit())
					$this->gridEditMode();

				// Switch to inline edit mode
				if ($this->isEdit())
					$this->inlineEditMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Grid Update
					if (($this->isGridUpdate() || $this->isGridOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "gridedit") {
						if ($this->validateGridForm()) {
							$gridUpdate = $this->gridUpdate();
						} else {
							$gridUpdate = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridUpdate) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridEditMode(); // Stay in Grid edit mode
						}
					}

					// Inline Update
					if (($this->isUpdate() || $this->isOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "edit")
						$this->inlineUpdate();
				} elseif (@$_SESSION[SESSION_INLINE_MODE] == "gridedit") { // Previously in grid edit mode
					if (Get(Config("TABLE_START_REC")) !== NULL || Get(Config("TABLE_PAGE_NO")) !== NULL) // Stay in grid edit mode if paging
						$this->gridEditMode();
					else // Reset grid edit
						$this->clearInlineMode();
				}
			}

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(["sequence"]);
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = $this->ListOptions["griddelete"];
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get basic search criteria
			if ($SearchError == "")
				$srchBasic = $this->basicSearchWhere();

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
		}

		// Restore display records
		if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
			$this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecords = 25; // Load default
			$this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
		}

		// Load Sorting Order
		if ($this->Command != "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->loadDefault();
			if ($this->BasicSearch->Keyword != "")
				$srchBasic = $this->basicSearchWhere();

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->Command != "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}

		// Export data only
		if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
			$this->exportData();
			$this->terminate();
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRecord = 1;
			$this->DisplayRecords = $this->GridAddRowCount;
			$this->TotalRecords = $this->DisplayRecords;
			$this->StopRecord = $this->DisplayRecords;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecords = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecords = $this->Recordset->RecordCount();
			}
			$this->StartRecord = 1;
			if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecords = $this->TotalRecords;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRecord();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecords == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Set up search panel class
		if ($this->SearchWhere != "")
			AppendClass($this->SearchPanelClass, "show");

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
			$this->terminate(TRUE);
		}

		// Set up pager
		$this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecords()
	{
		$wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
		if ($wrk != "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecords = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecords = -1;
				} else {
					$this->DisplayRecords = 25; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecords); // Save to Session

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->setKey("Slno", ""); // Clear inline edit key
		$this->_01_rf->FormValue = ""; // Clear form value
		$this->_02_rf->FormValue = ""; // Clear form value
		$this->_03_rf->FormValue = ""; // Clear form value
		$this->_04_rf->FormValue = ""; // Clear form value
		$this->_05_rf->FormValue = ""; // Clear form value
		$this->_06_rf->FormValue = ""; // Clear form value
		$this->_07_rf->FormValue = ""; // Clear form value
		$this->_08_rf->FormValue = ""; // Clear form value
		$this->_09_rf->FormValue = ""; // Clear form value
		$this->_10_rf->FormValue = ""; // Clear form value
		$this->_11_rf->FormValue = ""; // Clear form value
		$this->_12_rf->FormValue = ""; // Clear form value
		$this->_13_rf->FormValue = ""; // Clear form value
		$this->_14_rf->FormValue = ""; // Clear form value
		$this->_15_rf->FormValue = ""; // Clear form value
		$this->_16_rf->FormValue = ""; // Clear form value
		$this->_17_rf->FormValue = ""; // Clear form value
		$this->_18_rf->FormValue = ""; // Clear form value
		$this->_19_rf->FormValue = ""; // Clear form value
		$this->_20_rf->FormValue = ""; // Clear form value
		$this->_21_rf->FormValue = ""; // Clear form value
		$this->_22_rf->FormValue = ""; // Clear form value
		$this->_23_rf->FormValue = ""; // Clear form value
		$this->_24_rf->FormValue = ""; // Clear form value
		$this->_25_rf->FormValue = ""; // Clear form value
		$this->_26_rf->FormValue = ""; // Clear form value
		$this->_27_rf->FormValue = ""; // Clear form value
		$this->_28_rf->FormValue = ""; // Clear form value
		$this->_29_rf->FormValue = ""; // Clear form value
		$this->_30_rf->FormValue = ""; // Clear form value
		$this->_31_rf->FormValue = ""; // Clear form value
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Inline Edit mode
	protected function inlineEditMode()
	{
		global $Security, $Language;
		if (!$Security->canEdit())
			return FALSE; // Edit not allowed
		$inlineEdit = TRUE;
		if (Get("Slno") !== NULL) {
			$this->Slno->setQueryStringValue(Get("Slno"));
		} else {
			$inlineEdit = FALSE;
		}
		if ($inlineEdit) {
			if ($this->loadRow()) {
				$this->setKey("Slno", $this->Slno->CurrentValue); // Set up inline edit key
				$_SESSION[SESSION_INLINE_MODE] = "edit"; // Enable inline edit
			}
		}
		return TRUE;
	}

	// Perform update to Inline Edit record
	protected function inlineUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$CurrentForm->Index = 1;
		$this->loadFormValues(); // Get form values

		// Validate form
		$inlineUpdate = TRUE;
		if (!$this->validateForm()) {
			$inlineUpdate = FALSE; // Form error, reset action
			$this->setFailureMessage($FormError);
		} else {
			$inlineUpdate = FALSE;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			if ($this->setupKeyValues($rowkey)) { // Set up key values
				if ($this->checkInlineEditKey()) { // Check key
					$this->SendEmail = TRUE; // Send email on update success
					$inlineUpdate = $this->editRow(); // Update record
				} else {
					$inlineUpdate = FALSE;
				}
			}
		}
		if ($inlineUpdate) { // Update success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
			$this->EventCancelled = TRUE; // Cancel event
			$this->CurrentAction = "edit"; // Stay in edit mode
		}
	}

	// Check Inline Edit key
	public function checkInlineEditKey()
	{
		if ($this->EventCancelled)
			$this->Slno->OldValue = $this->Slno->DbValue;
		$val = $this->Slno->OldValue !== NULL ? $this->Slno->OldValue : $this->Slno->CurrentValue;
		if (strval($this->getKey("Slno")) != strval($val))
			return FALSE;
		return TRUE;
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction != "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey != "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key != "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey != "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter != "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($arKeyFlds) >= 1) {
			$this->Slno->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->Slno->OldValue))
				return FALSE;
		}
		return TRUE;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_StationId") && $CurrentForm->hasValue("o_StationId") && $this->StationId->CurrentValue != $this->StationId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_month_id") && $CurrentForm->hasValue("o_month_id") && $this->month_id->CurrentValue != $this->month_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__01_rf") && $CurrentForm->hasValue("o__01_rf") && $this->_01_rf->CurrentValue != $this->_01_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__02_rf") && $CurrentForm->hasValue("o__02_rf") && $this->_02_rf->CurrentValue != $this->_02_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__03_rf") && $CurrentForm->hasValue("o__03_rf") && $this->_03_rf->CurrentValue != $this->_03_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__04_rf") && $CurrentForm->hasValue("o__04_rf") && $this->_04_rf->CurrentValue != $this->_04_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__05_rf") && $CurrentForm->hasValue("o__05_rf") && $this->_05_rf->CurrentValue != $this->_05_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__06_rf") && $CurrentForm->hasValue("o__06_rf") && $this->_06_rf->CurrentValue != $this->_06_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__07_rf") && $CurrentForm->hasValue("o__07_rf") && $this->_07_rf->CurrentValue != $this->_07_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__08_rf") && $CurrentForm->hasValue("o__08_rf") && $this->_08_rf->CurrentValue != $this->_08_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__09_rf") && $CurrentForm->hasValue("o__09_rf") && $this->_09_rf->CurrentValue != $this->_09_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__10_rf") && $CurrentForm->hasValue("o__10_rf") && $this->_10_rf->CurrentValue != $this->_10_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__11_rf") && $CurrentForm->hasValue("o__11_rf") && $this->_11_rf->CurrentValue != $this->_11_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__12_rf") && $CurrentForm->hasValue("o__12_rf") && $this->_12_rf->CurrentValue != $this->_12_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__13_rf") && $CurrentForm->hasValue("o__13_rf") && $this->_13_rf->CurrentValue != $this->_13_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__14_rf") && $CurrentForm->hasValue("o__14_rf") && $this->_14_rf->CurrentValue != $this->_14_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__15_rf") && $CurrentForm->hasValue("o__15_rf") && $this->_15_rf->CurrentValue != $this->_15_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__16_rf") && $CurrentForm->hasValue("o__16_rf") && $this->_16_rf->CurrentValue != $this->_16_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__17_rf") && $CurrentForm->hasValue("o__17_rf") && $this->_17_rf->CurrentValue != $this->_17_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__18_rf") && $CurrentForm->hasValue("o__18_rf") && $this->_18_rf->CurrentValue != $this->_18_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__19_rf") && $CurrentForm->hasValue("o__19_rf") && $this->_19_rf->CurrentValue != $this->_19_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__20_rf") && $CurrentForm->hasValue("o__20_rf") && $this->_20_rf->CurrentValue != $this->_20_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__21_rf") && $CurrentForm->hasValue("o__21_rf") && $this->_21_rf->CurrentValue != $this->_21_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__22_rf") && $CurrentForm->hasValue("o__22_rf") && $this->_22_rf->CurrentValue != $this->_22_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__23_rf") && $CurrentForm->hasValue("o__23_rf") && $this->_23_rf->CurrentValue != $this->_23_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__24_rf") && $CurrentForm->hasValue("o__24_rf") && $this->_24_rf->CurrentValue != $this->_24_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__25_rf") && $CurrentForm->hasValue("o__25_rf") && $this->_25_rf->CurrentValue != $this->_25_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__26_rf") && $CurrentForm->hasValue("o__26_rf") && $this->_26_rf->CurrentValue != $this->_26_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__27_rf") && $CurrentForm->hasValue("o__27_rf") && $this->_27_rf->CurrentValue != $this->_27_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__28_rf") && $CurrentForm->hasValue("o__28_rf") && $this->_28_rf->CurrentValue != $this->_28_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__29_rf") && $CurrentForm->hasValue("o__29_rf") && $this->_29_rf->CurrentValue != $this->_29_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__30_rf") && $CurrentForm->hasValue("o__30_rf") && $this->_30_rf->CurrentValue != $this->_30_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__31_rf") && $CurrentForm->hasValue("o__31_rf") && $this->_31_rf->CurrentValue != $this->_31_rf->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SubDivisionId") && $CurrentForm->hasValue("o_SubDivisionId") && $this->SubDivisionId->CurrentValue != $this->SubDivisionId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Water_Year") && $CurrentForm->hasValue("o_Water_Year") && $this->Water_Year->CurrentValue != $this->Water_Year->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SenderMobileNumber") && $CurrentForm->hasValue("o_SenderMobileNumber") && $this->SenderMobileNumber->CurrentValue != $this->SenderMobileNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IsChanged") && $CurrentForm->hasValue("o_IsChanged") && $this->IsChanged->CurrentValue != $this->IsChanged->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = [];

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";

		// Load server side filters
		if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile))
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "ftbl_sms_monthly_daylistsrch");
		$filterList = Concat($filterList, $this->Slno->AdvancedSearch->toJson(), ","); // Field Slno
		$filterList = Concat($filterList, $this->StationId->AdvancedSearch->toJson(), ","); // Field StationId
		$filterList = Concat($filterList, $this->month_id->AdvancedSearch->toJson(), ","); // Field month_id
		$filterList = Concat($filterList, $this->_01_rf->AdvancedSearch->toJson(), ","); // Field 01_rf
		$filterList = Concat($filterList, $this->_02_rf->AdvancedSearch->toJson(), ","); // Field 02_rf
		$filterList = Concat($filterList, $this->_03_rf->AdvancedSearch->toJson(), ","); // Field 03_rf
		$filterList = Concat($filterList, $this->_04_rf->AdvancedSearch->toJson(), ","); // Field 04_rf
		$filterList = Concat($filterList, $this->_05_rf->AdvancedSearch->toJson(), ","); // Field 05_rf
		$filterList = Concat($filterList, $this->_06_rf->AdvancedSearch->toJson(), ","); // Field 06_rf
		$filterList = Concat($filterList, $this->_07_rf->AdvancedSearch->toJson(), ","); // Field 07_rf
		$filterList = Concat($filterList, $this->_08_rf->AdvancedSearch->toJson(), ","); // Field 08_rf
		$filterList = Concat($filterList, $this->_09_rf->AdvancedSearch->toJson(), ","); // Field 09_rf
		$filterList = Concat($filterList, $this->_10_rf->AdvancedSearch->toJson(), ","); // Field 10_rf
		$filterList = Concat($filterList, $this->_11_rf->AdvancedSearch->toJson(), ","); // Field 11_rf
		$filterList = Concat($filterList, $this->_12_rf->AdvancedSearch->toJson(), ","); // Field 12_rf
		$filterList = Concat($filterList, $this->_13_rf->AdvancedSearch->toJson(), ","); // Field 13_rf
		$filterList = Concat($filterList, $this->_14_rf->AdvancedSearch->toJson(), ","); // Field 14_rf
		$filterList = Concat($filterList, $this->_15_rf->AdvancedSearch->toJson(), ","); // Field 15_rf
		$filterList = Concat($filterList, $this->_16_rf->AdvancedSearch->toJson(), ","); // Field 16_rf
		$filterList = Concat($filterList, $this->_17_rf->AdvancedSearch->toJson(), ","); // Field 17_rf
		$filterList = Concat($filterList, $this->_18_rf->AdvancedSearch->toJson(), ","); // Field 18_rf
		$filterList = Concat($filterList, $this->_19_rf->AdvancedSearch->toJson(), ","); // Field 19_rf
		$filterList = Concat($filterList, $this->_20_rf->AdvancedSearch->toJson(), ","); // Field 20_rf
		$filterList = Concat($filterList, $this->_21_rf->AdvancedSearch->toJson(), ","); // Field 21_rf
		$filterList = Concat($filterList, $this->_22_rf->AdvancedSearch->toJson(), ","); // Field 22_rf
		$filterList = Concat($filterList, $this->_23_rf->AdvancedSearch->toJson(), ","); // Field 23_rf
		$filterList = Concat($filterList, $this->_24_rf->AdvancedSearch->toJson(), ","); // Field 24_rf
		$filterList = Concat($filterList, $this->_25_rf->AdvancedSearch->toJson(), ","); // Field 25_rf
		$filterList = Concat($filterList, $this->_26_rf->AdvancedSearch->toJson(), ","); // Field 26_rf
		$filterList = Concat($filterList, $this->_27_rf->AdvancedSearch->toJson(), ","); // Field 27_rf
		$filterList = Concat($filterList, $this->_28_rf->AdvancedSearch->toJson(), ","); // Field 28_rf
		$filterList = Concat($filterList, $this->_29_rf->AdvancedSearch->toJson(), ","); // Field 29_rf
		$filterList = Concat($filterList, $this->_30_rf->AdvancedSearch->toJson(), ","); // Field 30_rf
		$filterList = Concat($filterList, $this->_31_rf->AdvancedSearch->toJson(), ","); // Field 31_rf
		$filterList = Concat($filterList, $this->SubDivisionId->AdvancedSearch->toJson(), ","); // Field SubDivisionId
		$filterList = Concat($filterList, $this->Water_Year->AdvancedSearch->toJson(), ","); // Field Water_Year
		$filterList = Concat($filterList, $this->SenderMobileNumber->AdvancedSearch->toJson(), ","); // Field SenderMobileNumber
		$filterList = Concat($filterList, $this->IsChanged->AdvancedSearch->toJson(), ","); // Field IsChanged
		if ($this->BasicSearch->Keyword != "") {
			$wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
			$filterList = Concat($filterList, $wrk, ",");
		}

		// Return filter list in JSON
		if ($filterList != "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList != "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList != "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "ftbl_sms_monthly_daylistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field Slno
		$this->Slno->AdvancedSearch->SearchValue = @$filter["x_Slno"];
		$this->Slno->AdvancedSearch->SearchOperator = @$filter["z_Slno"];
		$this->Slno->AdvancedSearch->SearchCondition = @$filter["v_Slno"];
		$this->Slno->AdvancedSearch->SearchValue2 = @$filter["y_Slno"];
		$this->Slno->AdvancedSearch->SearchOperator2 = @$filter["w_Slno"];
		$this->Slno->AdvancedSearch->save();

		// Field StationId
		$this->StationId->AdvancedSearch->SearchValue = @$filter["x_StationId"];
		$this->StationId->AdvancedSearch->SearchOperator = @$filter["z_StationId"];
		$this->StationId->AdvancedSearch->SearchCondition = @$filter["v_StationId"];
		$this->StationId->AdvancedSearch->SearchValue2 = @$filter["y_StationId"];
		$this->StationId->AdvancedSearch->SearchOperator2 = @$filter["w_StationId"];
		$this->StationId->AdvancedSearch->save();

		// Field month_id
		$this->month_id->AdvancedSearch->SearchValue = @$filter["x_month_id"];
		$this->month_id->AdvancedSearch->SearchOperator = @$filter["z_month_id"];
		$this->month_id->AdvancedSearch->SearchCondition = @$filter["v_month_id"];
		$this->month_id->AdvancedSearch->SearchValue2 = @$filter["y_month_id"];
		$this->month_id->AdvancedSearch->SearchOperator2 = @$filter["w_month_id"];
		$this->month_id->AdvancedSearch->save();

		// Field 01_rf
		$this->_01_rf->AdvancedSearch->SearchValue = @$filter["x__01_rf"];
		$this->_01_rf->AdvancedSearch->SearchOperator = @$filter["z__01_rf"];
		$this->_01_rf->AdvancedSearch->SearchCondition = @$filter["v__01_rf"];
		$this->_01_rf->AdvancedSearch->SearchValue2 = @$filter["y__01_rf"];
		$this->_01_rf->AdvancedSearch->SearchOperator2 = @$filter["w__01_rf"];
		$this->_01_rf->AdvancedSearch->save();

		// Field 02_rf
		$this->_02_rf->AdvancedSearch->SearchValue = @$filter["x__02_rf"];
		$this->_02_rf->AdvancedSearch->SearchOperator = @$filter["z__02_rf"];
		$this->_02_rf->AdvancedSearch->SearchCondition = @$filter["v__02_rf"];
		$this->_02_rf->AdvancedSearch->SearchValue2 = @$filter["y__02_rf"];
		$this->_02_rf->AdvancedSearch->SearchOperator2 = @$filter["w__02_rf"];
		$this->_02_rf->AdvancedSearch->save();

		// Field 03_rf
		$this->_03_rf->AdvancedSearch->SearchValue = @$filter["x__03_rf"];
		$this->_03_rf->AdvancedSearch->SearchOperator = @$filter["z__03_rf"];
		$this->_03_rf->AdvancedSearch->SearchCondition = @$filter["v__03_rf"];
		$this->_03_rf->AdvancedSearch->SearchValue2 = @$filter["y__03_rf"];
		$this->_03_rf->AdvancedSearch->SearchOperator2 = @$filter["w__03_rf"];
		$this->_03_rf->AdvancedSearch->save();

		// Field 04_rf
		$this->_04_rf->AdvancedSearch->SearchValue = @$filter["x__04_rf"];
		$this->_04_rf->AdvancedSearch->SearchOperator = @$filter["z__04_rf"];
		$this->_04_rf->AdvancedSearch->SearchCondition = @$filter["v__04_rf"];
		$this->_04_rf->AdvancedSearch->SearchValue2 = @$filter["y__04_rf"];
		$this->_04_rf->AdvancedSearch->SearchOperator2 = @$filter["w__04_rf"];
		$this->_04_rf->AdvancedSearch->save();

		// Field 05_rf
		$this->_05_rf->AdvancedSearch->SearchValue = @$filter["x__05_rf"];
		$this->_05_rf->AdvancedSearch->SearchOperator = @$filter["z__05_rf"];
		$this->_05_rf->AdvancedSearch->SearchCondition = @$filter["v__05_rf"];
		$this->_05_rf->AdvancedSearch->SearchValue2 = @$filter["y__05_rf"];
		$this->_05_rf->AdvancedSearch->SearchOperator2 = @$filter["w__05_rf"];
		$this->_05_rf->AdvancedSearch->save();

		// Field 06_rf
		$this->_06_rf->AdvancedSearch->SearchValue = @$filter["x__06_rf"];
		$this->_06_rf->AdvancedSearch->SearchOperator = @$filter["z__06_rf"];
		$this->_06_rf->AdvancedSearch->SearchCondition = @$filter["v__06_rf"];
		$this->_06_rf->AdvancedSearch->SearchValue2 = @$filter["y__06_rf"];
		$this->_06_rf->AdvancedSearch->SearchOperator2 = @$filter["w__06_rf"];
		$this->_06_rf->AdvancedSearch->save();

		// Field 07_rf
		$this->_07_rf->AdvancedSearch->SearchValue = @$filter["x__07_rf"];
		$this->_07_rf->AdvancedSearch->SearchOperator = @$filter["z__07_rf"];
		$this->_07_rf->AdvancedSearch->SearchCondition = @$filter["v__07_rf"];
		$this->_07_rf->AdvancedSearch->SearchValue2 = @$filter["y__07_rf"];
		$this->_07_rf->AdvancedSearch->SearchOperator2 = @$filter["w__07_rf"];
		$this->_07_rf->AdvancedSearch->save();

		// Field 08_rf
		$this->_08_rf->AdvancedSearch->SearchValue = @$filter["x__08_rf"];
		$this->_08_rf->AdvancedSearch->SearchOperator = @$filter["z__08_rf"];
		$this->_08_rf->AdvancedSearch->SearchCondition = @$filter["v__08_rf"];
		$this->_08_rf->AdvancedSearch->SearchValue2 = @$filter["y__08_rf"];
		$this->_08_rf->AdvancedSearch->SearchOperator2 = @$filter["w__08_rf"];
		$this->_08_rf->AdvancedSearch->save();

		// Field 09_rf
		$this->_09_rf->AdvancedSearch->SearchValue = @$filter["x__09_rf"];
		$this->_09_rf->AdvancedSearch->SearchOperator = @$filter["z__09_rf"];
		$this->_09_rf->AdvancedSearch->SearchCondition = @$filter["v__09_rf"];
		$this->_09_rf->AdvancedSearch->SearchValue2 = @$filter["y__09_rf"];
		$this->_09_rf->AdvancedSearch->SearchOperator2 = @$filter["w__09_rf"];
		$this->_09_rf->AdvancedSearch->save();

		// Field 10_rf
		$this->_10_rf->AdvancedSearch->SearchValue = @$filter["x__10_rf"];
		$this->_10_rf->AdvancedSearch->SearchOperator = @$filter["z__10_rf"];
		$this->_10_rf->AdvancedSearch->SearchCondition = @$filter["v__10_rf"];
		$this->_10_rf->AdvancedSearch->SearchValue2 = @$filter["y__10_rf"];
		$this->_10_rf->AdvancedSearch->SearchOperator2 = @$filter["w__10_rf"];
		$this->_10_rf->AdvancedSearch->save();

		// Field 11_rf
		$this->_11_rf->AdvancedSearch->SearchValue = @$filter["x__11_rf"];
		$this->_11_rf->AdvancedSearch->SearchOperator = @$filter["z__11_rf"];
		$this->_11_rf->AdvancedSearch->SearchCondition = @$filter["v__11_rf"];
		$this->_11_rf->AdvancedSearch->SearchValue2 = @$filter["y__11_rf"];
		$this->_11_rf->AdvancedSearch->SearchOperator2 = @$filter["w__11_rf"];
		$this->_11_rf->AdvancedSearch->save();

		// Field 12_rf
		$this->_12_rf->AdvancedSearch->SearchValue = @$filter["x__12_rf"];
		$this->_12_rf->AdvancedSearch->SearchOperator = @$filter["z__12_rf"];
		$this->_12_rf->AdvancedSearch->SearchCondition = @$filter["v__12_rf"];
		$this->_12_rf->AdvancedSearch->SearchValue2 = @$filter["y__12_rf"];
		$this->_12_rf->AdvancedSearch->SearchOperator2 = @$filter["w__12_rf"];
		$this->_12_rf->AdvancedSearch->save();

		// Field 13_rf
		$this->_13_rf->AdvancedSearch->SearchValue = @$filter["x__13_rf"];
		$this->_13_rf->AdvancedSearch->SearchOperator = @$filter["z__13_rf"];
		$this->_13_rf->AdvancedSearch->SearchCondition = @$filter["v__13_rf"];
		$this->_13_rf->AdvancedSearch->SearchValue2 = @$filter["y__13_rf"];
		$this->_13_rf->AdvancedSearch->SearchOperator2 = @$filter["w__13_rf"];
		$this->_13_rf->AdvancedSearch->save();

		// Field 14_rf
		$this->_14_rf->AdvancedSearch->SearchValue = @$filter["x__14_rf"];
		$this->_14_rf->AdvancedSearch->SearchOperator = @$filter["z__14_rf"];
		$this->_14_rf->AdvancedSearch->SearchCondition = @$filter["v__14_rf"];
		$this->_14_rf->AdvancedSearch->SearchValue2 = @$filter["y__14_rf"];
		$this->_14_rf->AdvancedSearch->SearchOperator2 = @$filter["w__14_rf"];
		$this->_14_rf->AdvancedSearch->save();

		// Field 15_rf
		$this->_15_rf->AdvancedSearch->SearchValue = @$filter["x__15_rf"];
		$this->_15_rf->AdvancedSearch->SearchOperator = @$filter["z__15_rf"];
		$this->_15_rf->AdvancedSearch->SearchCondition = @$filter["v__15_rf"];
		$this->_15_rf->AdvancedSearch->SearchValue2 = @$filter["y__15_rf"];
		$this->_15_rf->AdvancedSearch->SearchOperator2 = @$filter["w__15_rf"];
		$this->_15_rf->AdvancedSearch->save();

		// Field 16_rf
		$this->_16_rf->AdvancedSearch->SearchValue = @$filter["x__16_rf"];
		$this->_16_rf->AdvancedSearch->SearchOperator = @$filter["z__16_rf"];
		$this->_16_rf->AdvancedSearch->SearchCondition = @$filter["v__16_rf"];
		$this->_16_rf->AdvancedSearch->SearchValue2 = @$filter["y__16_rf"];
		$this->_16_rf->AdvancedSearch->SearchOperator2 = @$filter["w__16_rf"];
		$this->_16_rf->AdvancedSearch->save();

		// Field 17_rf
		$this->_17_rf->AdvancedSearch->SearchValue = @$filter["x__17_rf"];
		$this->_17_rf->AdvancedSearch->SearchOperator = @$filter["z__17_rf"];
		$this->_17_rf->AdvancedSearch->SearchCondition = @$filter["v__17_rf"];
		$this->_17_rf->AdvancedSearch->SearchValue2 = @$filter["y__17_rf"];
		$this->_17_rf->AdvancedSearch->SearchOperator2 = @$filter["w__17_rf"];
		$this->_17_rf->AdvancedSearch->save();

		// Field 18_rf
		$this->_18_rf->AdvancedSearch->SearchValue = @$filter["x__18_rf"];
		$this->_18_rf->AdvancedSearch->SearchOperator = @$filter["z__18_rf"];
		$this->_18_rf->AdvancedSearch->SearchCondition = @$filter["v__18_rf"];
		$this->_18_rf->AdvancedSearch->SearchValue2 = @$filter["y__18_rf"];
		$this->_18_rf->AdvancedSearch->SearchOperator2 = @$filter["w__18_rf"];
		$this->_18_rf->AdvancedSearch->save();

		// Field 19_rf
		$this->_19_rf->AdvancedSearch->SearchValue = @$filter["x__19_rf"];
		$this->_19_rf->AdvancedSearch->SearchOperator = @$filter["z__19_rf"];
		$this->_19_rf->AdvancedSearch->SearchCondition = @$filter["v__19_rf"];
		$this->_19_rf->AdvancedSearch->SearchValue2 = @$filter["y__19_rf"];
		$this->_19_rf->AdvancedSearch->SearchOperator2 = @$filter["w__19_rf"];
		$this->_19_rf->AdvancedSearch->save();

		// Field 20_rf
		$this->_20_rf->AdvancedSearch->SearchValue = @$filter["x__20_rf"];
		$this->_20_rf->AdvancedSearch->SearchOperator = @$filter["z__20_rf"];
		$this->_20_rf->AdvancedSearch->SearchCondition = @$filter["v__20_rf"];
		$this->_20_rf->AdvancedSearch->SearchValue2 = @$filter["y__20_rf"];
		$this->_20_rf->AdvancedSearch->SearchOperator2 = @$filter["w__20_rf"];
		$this->_20_rf->AdvancedSearch->save();

		// Field 21_rf
		$this->_21_rf->AdvancedSearch->SearchValue = @$filter["x__21_rf"];
		$this->_21_rf->AdvancedSearch->SearchOperator = @$filter["z__21_rf"];
		$this->_21_rf->AdvancedSearch->SearchCondition = @$filter["v__21_rf"];
		$this->_21_rf->AdvancedSearch->SearchValue2 = @$filter["y__21_rf"];
		$this->_21_rf->AdvancedSearch->SearchOperator2 = @$filter["w__21_rf"];
		$this->_21_rf->AdvancedSearch->save();

		// Field 22_rf
		$this->_22_rf->AdvancedSearch->SearchValue = @$filter["x__22_rf"];
		$this->_22_rf->AdvancedSearch->SearchOperator = @$filter["z__22_rf"];
		$this->_22_rf->AdvancedSearch->SearchCondition = @$filter["v__22_rf"];
		$this->_22_rf->AdvancedSearch->SearchValue2 = @$filter["y__22_rf"];
		$this->_22_rf->AdvancedSearch->SearchOperator2 = @$filter["w__22_rf"];
		$this->_22_rf->AdvancedSearch->save();

		// Field 23_rf
		$this->_23_rf->AdvancedSearch->SearchValue = @$filter["x__23_rf"];
		$this->_23_rf->AdvancedSearch->SearchOperator = @$filter["z__23_rf"];
		$this->_23_rf->AdvancedSearch->SearchCondition = @$filter["v__23_rf"];
		$this->_23_rf->AdvancedSearch->SearchValue2 = @$filter["y__23_rf"];
		$this->_23_rf->AdvancedSearch->SearchOperator2 = @$filter["w__23_rf"];
		$this->_23_rf->AdvancedSearch->save();

		// Field 24_rf
		$this->_24_rf->AdvancedSearch->SearchValue = @$filter["x__24_rf"];
		$this->_24_rf->AdvancedSearch->SearchOperator = @$filter["z__24_rf"];
		$this->_24_rf->AdvancedSearch->SearchCondition = @$filter["v__24_rf"];
		$this->_24_rf->AdvancedSearch->SearchValue2 = @$filter["y__24_rf"];
		$this->_24_rf->AdvancedSearch->SearchOperator2 = @$filter["w__24_rf"];
		$this->_24_rf->AdvancedSearch->save();

		// Field 25_rf
		$this->_25_rf->AdvancedSearch->SearchValue = @$filter["x__25_rf"];
		$this->_25_rf->AdvancedSearch->SearchOperator = @$filter["z__25_rf"];
		$this->_25_rf->AdvancedSearch->SearchCondition = @$filter["v__25_rf"];
		$this->_25_rf->AdvancedSearch->SearchValue2 = @$filter["y__25_rf"];
		$this->_25_rf->AdvancedSearch->SearchOperator2 = @$filter["w__25_rf"];
		$this->_25_rf->AdvancedSearch->save();

		// Field 26_rf
		$this->_26_rf->AdvancedSearch->SearchValue = @$filter["x__26_rf"];
		$this->_26_rf->AdvancedSearch->SearchOperator = @$filter["z__26_rf"];
		$this->_26_rf->AdvancedSearch->SearchCondition = @$filter["v__26_rf"];
		$this->_26_rf->AdvancedSearch->SearchValue2 = @$filter["y__26_rf"];
		$this->_26_rf->AdvancedSearch->SearchOperator2 = @$filter["w__26_rf"];
		$this->_26_rf->AdvancedSearch->save();

		// Field 27_rf
		$this->_27_rf->AdvancedSearch->SearchValue = @$filter["x__27_rf"];
		$this->_27_rf->AdvancedSearch->SearchOperator = @$filter["z__27_rf"];
		$this->_27_rf->AdvancedSearch->SearchCondition = @$filter["v__27_rf"];
		$this->_27_rf->AdvancedSearch->SearchValue2 = @$filter["y__27_rf"];
		$this->_27_rf->AdvancedSearch->SearchOperator2 = @$filter["w__27_rf"];
		$this->_27_rf->AdvancedSearch->save();

		// Field 28_rf
		$this->_28_rf->AdvancedSearch->SearchValue = @$filter["x__28_rf"];
		$this->_28_rf->AdvancedSearch->SearchOperator = @$filter["z__28_rf"];
		$this->_28_rf->AdvancedSearch->SearchCondition = @$filter["v__28_rf"];
		$this->_28_rf->AdvancedSearch->SearchValue2 = @$filter["y__28_rf"];
		$this->_28_rf->AdvancedSearch->SearchOperator2 = @$filter["w__28_rf"];
		$this->_28_rf->AdvancedSearch->save();

		// Field 29_rf
		$this->_29_rf->AdvancedSearch->SearchValue = @$filter["x__29_rf"];
		$this->_29_rf->AdvancedSearch->SearchOperator = @$filter["z__29_rf"];
		$this->_29_rf->AdvancedSearch->SearchCondition = @$filter["v__29_rf"];
		$this->_29_rf->AdvancedSearch->SearchValue2 = @$filter["y__29_rf"];
		$this->_29_rf->AdvancedSearch->SearchOperator2 = @$filter["w__29_rf"];
		$this->_29_rf->AdvancedSearch->save();

		// Field 30_rf
		$this->_30_rf->AdvancedSearch->SearchValue = @$filter["x__30_rf"];
		$this->_30_rf->AdvancedSearch->SearchOperator = @$filter["z__30_rf"];
		$this->_30_rf->AdvancedSearch->SearchCondition = @$filter["v__30_rf"];
		$this->_30_rf->AdvancedSearch->SearchValue2 = @$filter["y__30_rf"];
		$this->_30_rf->AdvancedSearch->SearchOperator2 = @$filter["w__30_rf"];
		$this->_30_rf->AdvancedSearch->save();

		// Field 31_rf
		$this->_31_rf->AdvancedSearch->SearchValue = @$filter["x__31_rf"];
		$this->_31_rf->AdvancedSearch->SearchOperator = @$filter["z__31_rf"];
		$this->_31_rf->AdvancedSearch->SearchCondition = @$filter["v__31_rf"];
		$this->_31_rf->AdvancedSearch->SearchValue2 = @$filter["y__31_rf"];
		$this->_31_rf->AdvancedSearch->SearchOperator2 = @$filter["w__31_rf"];
		$this->_31_rf->AdvancedSearch->save();

		// Field SubDivisionId
		$this->SubDivisionId->AdvancedSearch->SearchValue = @$filter["x_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->SearchOperator = @$filter["z_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->SearchCondition = @$filter["v_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->SearchValue2 = @$filter["y_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->SearchOperator2 = @$filter["w_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->save();

		// Field Water_Year
		$this->Water_Year->AdvancedSearch->SearchValue = @$filter["x_Water_Year"];
		$this->Water_Year->AdvancedSearch->SearchOperator = @$filter["z_Water_Year"];
		$this->Water_Year->AdvancedSearch->SearchCondition = @$filter["v_Water_Year"];
		$this->Water_Year->AdvancedSearch->SearchValue2 = @$filter["y_Water_Year"];
		$this->Water_Year->AdvancedSearch->SearchOperator2 = @$filter["w_Water_Year"];
		$this->Water_Year->AdvancedSearch->save();

		// Field SenderMobileNumber
		$this->SenderMobileNumber->AdvancedSearch->SearchValue = @$filter["x_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchOperator = @$filter["z_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchCondition = @$filter["v_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->save();

		// Field IsChanged
		$this->IsChanged->AdvancedSearch->SearchValue = @$filter["x_IsChanged"];
		$this->IsChanged->AdvancedSearch->SearchOperator = @$filter["z_IsChanged"];
		$this->IsChanged->AdvancedSearch->SearchCondition = @$filter["v_IsChanged"];
		$this->IsChanged->AdvancedSearch->SearchValue2 = @$filter["y_IsChanged"];
		$this->IsChanged->AdvancedSearch->SearchOperator2 = @$filter["w_IsChanged"];
		$this->IsChanged->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->Slno, $default, FALSE); // Slno
		$this->buildSearchSql($where, $this->StationId, $default, FALSE); // StationId
		$this->buildSearchSql($where, $this->month_id, $default, FALSE); // month_id
		$this->buildSearchSql($where, $this->_01_rf, $default, FALSE); // 01_rf
		$this->buildSearchSql($where, $this->_02_rf, $default, FALSE); // 02_rf
		$this->buildSearchSql($where, $this->_03_rf, $default, FALSE); // 03_rf
		$this->buildSearchSql($where, $this->_04_rf, $default, FALSE); // 04_rf
		$this->buildSearchSql($where, $this->_05_rf, $default, FALSE); // 05_rf
		$this->buildSearchSql($where, $this->_06_rf, $default, FALSE); // 06_rf
		$this->buildSearchSql($where, $this->_07_rf, $default, FALSE); // 07_rf
		$this->buildSearchSql($where, $this->_08_rf, $default, FALSE); // 08_rf
		$this->buildSearchSql($where, $this->_09_rf, $default, FALSE); // 09_rf
		$this->buildSearchSql($where, $this->_10_rf, $default, FALSE); // 10_rf
		$this->buildSearchSql($where, $this->_11_rf, $default, FALSE); // 11_rf
		$this->buildSearchSql($where, $this->_12_rf, $default, FALSE); // 12_rf
		$this->buildSearchSql($where, $this->_13_rf, $default, FALSE); // 13_rf
		$this->buildSearchSql($where, $this->_14_rf, $default, FALSE); // 14_rf
		$this->buildSearchSql($where, $this->_15_rf, $default, FALSE); // 15_rf
		$this->buildSearchSql($where, $this->_16_rf, $default, FALSE); // 16_rf
		$this->buildSearchSql($where, $this->_17_rf, $default, FALSE); // 17_rf
		$this->buildSearchSql($where, $this->_18_rf, $default, FALSE); // 18_rf
		$this->buildSearchSql($where, $this->_19_rf, $default, FALSE); // 19_rf
		$this->buildSearchSql($where, $this->_20_rf, $default, FALSE); // 20_rf
		$this->buildSearchSql($where, $this->_21_rf, $default, FALSE); // 21_rf
		$this->buildSearchSql($where, $this->_22_rf, $default, FALSE); // 22_rf
		$this->buildSearchSql($where, $this->_23_rf, $default, FALSE); // 23_rf
		$this->buildSearchSql($where, $this->_24_rf, $default, FALSE); // 24_rf
		$this->buildSearchSql($where, $this->_25_rf, $default, FALSE); // 25_rf
		$this->buildSearchSql($where, $this->_26_rf, $default, FALSE); // 26_rf
		$this->buildSearchSql($where, $this->_27_rf, $default, FALSE); // 27_rf
		$this->buildSearchSql($where, $this->_28_rf, $default, FALSE); // 28_rf
		$this->buildSearchSql($where, $this->_29_rf, $default, FALSE); // 29_rf
		$this->buildSearchSql($where, $this->_30_rf, $default, FALSE); // 30_rf
		$this->buildSearchSql($where, $this->_31_rf, $default, FALSE); // 31_rf
		$this->buildSearchSql($where, $this->SubDivisionId, $default, FALSE); // SubDivisionId
		$this->buildSearchSql($where, $this->Water_Year, $default, FALSE); // Water_Year
		$this->buildSearchSql($where, $this->SenderMobileNumber, $default, FALSE); // SenderMobileNumber
		$this->buildSearchSql($where, $this->IsChanged, $default, FALSE); // IsChanged

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->Slno->AdvancedSearch->save(); // Slno
			$this->StationId->AdvancedSearch->save(); // StationId
			$this->month_id->AdvancedSearch->save(); // month_id
			$this->_01_rf->AdvancedSearch->save(); // 01_rf
			$this->_02_rf->AdvancedSearch->save(); // 02_rf
			$this->_03_rf->AdvancedSearch->save(); // 03_rf
			$this->_04_rf->AdvancedSearch->save(); // 04_rf
			$this->_05_rf->AdvancedSearch->save(); // 05_rf
			$this->_06_rf->AdvancedSearch->save(); // 06_rf
			$this->_07_rf->AdvancedSearch->save(); // 07_rf
			$this->_08_rf->AdvancedSearch->save(); // 08_rf
			$this->_09_rf->AdvancedSearch->save(); // 09_rf
			$this->_10_rf->AdvancedSearch->save(); // 10_rf
			$this->_11_rf->AdvancedSearch->save(); // 11_rf
			$this->_12_rf->AdvancedSearch->save(); // 12_rf
			$this->_13_rf->AdvancedSearch->save(); // 13_rf
			$this->_14_rf->AdvancedSearch->save(); // 14_rf
			$this->_15_rf->AdvancedSearch->save(); // 15_rf
			$this->_16_rf->AdvancedSearch->save(); // 16_rf
			$this->_17_rf->AdvancedSearch->save(); // 17_rf
			$this->_18_rf->AdvancedSearch->save(); // 18_rf
			$this->_19_rf->AdvancedSearch->save(); // 19_rf
			$this->_20_rf->AdvancedSearch->save(); // 20_rf
			$this->_21_rf->AdvancedSearch->save(); // 21_rf
			$this->_22_rf->AdvancedSearch->save(); // 22_rf
			$this->_23_rf->AdvancedSearch->save(); // 23_rf
			$this->_24_rf->AdvancedSearch->save(); // 24_rf
			$this->_25_rf->AdvancedSearch->save(); // 25_rf
			$this->_26_rf->AdvancedSearch->save(); // 26_rf
			$this->_27_rf->AdvancedSearch->save(); // 27_rf
			$this->_28_rf->AdvancedSearch->save(); // 28_rf
			$this->_29_rf->AdvancedSearch->save(); // 29_rf
			$this->_30_rf->AdvancedSearch->save(); // 30_rf
			$this->_31_rf->AdvancedSearch->save(); // 31_rf
			$this->SubDivisionId->AdvancedSearch->save(); // SubDivisionId
			$this->Water_Year->AdvancedSearch->save(); // Water_Year
			$this->SenderMobileNumber->AdvancedSearch->save(); // SenderMobileNumber
			$this->IsChanged->AdvancedSearch->save(); // IsChanged
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr))
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 != "")
				$wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE"))
			return $fldVal;
		$value = $fldVal;
		if ($fld->isBoolean()) {
			if ($fldVal != "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal != "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->month_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Water_Year, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SenderMobileNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IsChanged, $arKeywords, $type);
		return $where;
	}

	// Build basic search SQL
	protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
	{
		$defCond = ($type == "OR") ? "OR" : "AND";
		$arSql = []; // Array for SQL parts
		$arCond = []; // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$keyword = $arKeywords[$i];
			$keyword = trim($keyword);
			if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
				$keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
				$ar = explode("\\", $keyword);
			} else {
				$ar = [$keyword];
			}
			foreach ($ar as $keyword) {
				if ($keyword != "") {
					$wrk = "";
					if ($keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j - 1] = "OR";
					} elseif ($keyword == Config("NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NULL";
					} elseif ($keyword == Config("NOT_NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NOT NULL";
					} elseif ($fld->IsVirtual) {
						$wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					} elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
						$wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					}
					if ($wrk != "") {
						$arSql[$j] = $wrk;
						$arCond[$j] = $defCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSql);
		$quoted = FALSE;
		$sql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt - 1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$quoted)
						$sql .= "(";
					$quoted = TRUE;
				}
				$sql .= $arSql[$i];
				if ($quoted && $arCond[$i] != "OR") {
					$sql .= ")";
					$quoted = FALSE;
				}
				$sql .= " " . $arCond[$i] . " ";
			}
			$sql .= $arSql[$cnt - 1];
			if ($quoted)
				$sql .= ")";
		}
		if ($sql != "") {
			if ($where != "")
				$where .= " OR ";
			$where .= "(" . $sql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	protected function basicSearchWhere($default = FALSE)
	{
		global $Security;
		$searchStr = "";
		if (!$Security->canSearch())
			return "";
		$searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($searchKeyword != "") {
			$ar = $this->BasicSearch->keywordList($default);

			// Search keyword in any fields
			if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $keyword) {
					if ($keyword != "") {
						if ($searchStr != "")
							$searchStr .= " " . $searchType . " ";
						$searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
					}
				}
			} else {
				$searchStr = $this->basicSearchSql($ar, $searchType);
			}
			if (!$default && in_array($this->Command, ["", "reset", "resetall"]))
				$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($searchKeyword);
			$this->BasicSearch->setType($searchType);
		}
		return $searchStr;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{

		// Check basic search
		if ($this->BasicSearch->issetSession())
			return TRUE;
		if ($this->Slno->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->StationId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->month_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_01_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_02_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_03_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_04_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_05_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_06_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_07_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_08_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_09_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_10_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_11_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_12_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_13_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_14_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_15_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_16_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_17_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_18_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_19_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_20_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_21_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_22_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_23_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_24_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_25_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_26_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_27_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_28_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_29_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_30_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_31_rf->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SubDivisionId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Water_Year->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SenderMobileNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IsChanged->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->resetBasicSearchParms();

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all basic search parameters
	protected function resetBasicSearchParms()
	{
		$this->BasicSearch->unsetSession();
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->Slno->AdvancedSearch->unsetSession();
		$this->StationId->AdvancedSearch->unsetSession();
		$this->month_id->AdvancedSearch->unsetSession();
		$this->_01_rf->AdvancedSearch->unsetSession();
		$this->_02_rf->AdvancedSearch->unsetSession();
		$this->_03_rf->AdvancedSearch->unsetSession();
		$this->_04_rf->AdvancedSearch->unsetSession();
		$this->_05_rf->AdvancedSearch->unsetSession();
		$this->_06_rf->AdvancedSearch->unsetSession();
		$this->_07_rf->AdvancedSearch->unsetSession();
		$this->_08_rf->AdvancedSearch->unsetSession();
		$this->_09_rf->AdvancedSearch->unsetSession();
		$this->_10_rf->AdvancedSearch->unsetSession();
		$this->_11_rf->AdvancedSearch->unsetSession();
		$this->_12_rf->AdvancedSearch->unsetSession();
		$this->_13_rf->AdvancedSearch->unsetSession();
		$this->_14_rf->AdvancedSearch->unsetSession();
		$this->_15_rf->AdvancedSearch->unsetSession();
		$this->_16_rf->AdvancedSearch->unsetSession();
		$this->_17_rf->AdvancedSearch->unsetSession();
		$this->_18_rf->AdvancedSearch->unsetSession();
		$this->_19_rf->AdvancedSearch->unsetSession();
		$this->_20_rf->AdvancedSearch->unsetSession();
		$this->_21_rf->AdvancedSearch->unsetSession();
		$this->_22_rf->AdvancedSearch->unsetSession();
		$this->_23_rf->AdvancedSearch->unsetSession();
		$this->_24_rf->AdvancedSearch->unsetSession();
		$this->_25_rf->AdvancedSearch->unsetSession();
		$this->_26_rf->AdvancedSearch->unsetSession();
		$this->_27_rf->AdvancedSearch->unsetSession();
		$this->_28_rf->AdvancedSearch->unsetSession();
		$this->_29_rf->AdvancedSearch->unsetSession();
		$this->_30_rf->AdvancedSearch->unsetSession();
		$this->_31_rf->AdvancedSearch->unsetSession();
		$this->SubDivisionId->AdvancedSearch->unsetSession();
		$this->Water_Year->AdvancedSearch->unsetSession();
		$this->SenderMobileNumber->AdvancedSearch->unsetSession();
		$this->IsChanged->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->Slno->AdvancedSearch->load();
		$this->StationId->AdvancedSearch->load();
		$this->month_id->AdvancedSearch->load();
		$this->_01_rf->AdvancedSearch->load();
		$this->_02_rf->AdvancedSearch->load();
		$this->_03_rf->AdvancedSearch->load();
		$this->_04_rf->AdvancedSearch->load();
		$this->_05_rf->AdvancedSearch->load();
		$this->_06_rf->AdvancedSearch->load();
		$this->_07_rf->AdvancedSearch->load();
		$this->_08_rf->AdvancedSearch->load();
		$this->_09_rf->AdvancedSearch->load();
		$this->_10_rf->AdvancedSearch->load();
		$this->_11_rf->AdvancedSearch->load();
		$this->_12_rf->AdvancedSearch->load();
		$this->_13_rf->AdvancedSearch->load();
		$this->_14_rf->AdvancedSearch->load();
		$this->_15_rf->AdvancedSearch->load();
		$this->_16_rf->AdvancedSearch->load();
		$this->_17_rf->AdvancedSearch->load();
		$this->_18_rf->AdvancedSearch->load();
		$this->_19_rf->AdvancedSearch->load();
		$this->_20_rf->AdvancedSearch->load();
		$this->_21_rf->AdvancedSearch->load();
		$this->_22_rf->AdvancedSearch->load();
		$this->_23_rf->AdvancedSearch->load();
		$this->_24_rf->AdvancedSearch->load();
		$this->_25_rf->AdvancedSearch->load();
		$this->_26_rf->AdvancedSearch->load();
		$this->_27_rf->AdvancedSearch->load();
		$this->_28_rf->AdvancedSearch->load();
		$this->_29_rf->AdvancedSearch->load();
		$this->_30_rf->AdvancedSearch->load();
		$this->_31_rf->AdvancedSearch->load();
		$this->SubDivisionId->AdvancedSearch->load();
		$this->Water_Year->AdvancedSearch->load();
		$this->SenderMobileNumber->AdvancedSearch->load();
		$this->IsChanged->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for Ctrl pressed
		$ctrl = Get("ctrl") !== NULL;

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->StationId, $ctrl); // StationId
			$this->updateSort($this->month_id, $ctrl); // month_id
			$this->updateSort($this->_01_rf, $ctrl); // 01_rf
			$this->updateSort($this->_02_rf, $ctrl); // 02_rf
			$this->updateSort($this->_03_rf, $ctrl); // 03_rf
			$this->updateSort($this->_04_rf, $ctrl); // 04_rf
			$this->updateSort($this->_05_rf, $ctrl); // 05_rf
			$this->updateSort($this->_06_rf, $ctrl); // 06_rf
			$this->updateSort($this->_07_rf, $ctrl); // 07_rf
			$this->updateSort($this->_08_rf, $ctrl); // 08_rf
			$this->updateSort($this->_09_rf, $ctrl); // 09_rf
			$this->updateSort($this->_10_rf, $ctrl); // 10_rf
			$this->updateSort($this->_11_rf, $ctrl); // 11_rf
			$this->updateSort($this->_12_rf, $ctrl); // 12_rf
			$this->updateSort($this->_13_rf, $ctrl); // 13_rf
			$this->updateSort($this->_14_rf, $ctrl); // 14_rf
			$this->updateSort($this->_15_rf, $ctrl); // 15_rf
			$this->updateSort($this->_16_rf, $ctrl); // 16_rf
			$this->updateSort($this->_17_rf, $ctrl); // 17_rf
			$this->updateSort($this->_18_rf, $ctrl); // 18_rf
			$this->updateSort($this->_19_rf, $ctrl); // 19_rf
			$this->updateSort($this->_20_rf, $ctrl); // 20_rf
			$this->updateSort($this->_21_rf, $ctrl); // 21_rf
			$this->updateSort($this->_22_rf, $ctrl); // 22_rf
			$this->updateSort($this->_23_rf, $ctrl); // 23_rf
			$this->updateSort($this->_24_rf, $ctrl); // 24_rf
			$this->updateSort($this->_25_rf, $ctrl); // 25_rf
			$this->updateSort($this->_26_rf, $ctrl); // 26_rf
			$this->updateSort($this->_27_rf, $ctrl); // 27_rf
			$this->updateSort($this->_28_rf, $ctrl); // 28_rf
			$this->updateSort($this->_29_rf, $ctrl); // 29_rf
			$this->updateSort($this->_30_rf, $ctrl); // 30_rf
			$this->updateSort($this->_31_rf, $ctrl); // 31_rf
			$this->updateSort($this->SubDivisionId, $ctrl); // SubDivisionId
			$this->updateSort($this->Water_Year, $ctrl); // Water_Year
			$this->updateSort($this->SenderMobileNumber, $ctrl); // SenderMobileNumber
			$this->updateSort($this->IsChanged, $ctrl); // IsChanged
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() != "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
				$this->StationId->setSort("ASC");
				$this->month_id->setSort("ASC");
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (StartsString("reset", $this->Command)) {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->StationId->setSort("");
				$this->month_id->setSort("");
				$this->_01_rf->setSort("");
				$this->_02_rf->setSort("");
				$this->_03_rf->setSort("");
				$this->_04_rf->setSort("");
				$this->_05_rf->setSort("");
				$this->_06_rf->setSort("");
				$this->_07_rf->setSort("");
				$this->_08_rf->setSort("");
				$this->_09_rf->setSort("");
				$this->_10_rf->setSort("");
				$this->_11_rf->setSort("");
				$this->_12_rf->setSort("");
				$this->_13_rf->setSort("");
				$this->_14_rf->setSort("");
				$this->_15_rf->setSort("");
				$this->_16_rf->setSort("");
				$this->_17_rf->setSort("");
				$this->_18_rf->setSort("");
				$this->_19_rf->setSort("");
				$this->_20_rf->setSort("");
				$this->_21_rf->setSort("");
				$this->_22_rf->setSort("");
				$this->_23_rf->setSort("");
				$this->_24_rf->setSort("");
				$this->_25_rf->setSort("");
				$this->_26_rf->setSort("");
				$this->_27_rf->setSort("");
				$this->_28_rf->setSort("");
				$this->_29_rf->setSort("");
				$this->_30_rf->setSort("");
				$this->_31_rf->setSort("");
				$this->SubDivisionId->setSort("");
				$this->Water_Year->setSort("");
				$this->SenderMobileNumber->setSort("");
				$this->IsChanged->setSort("");
			}

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = TRUE;
			$item->Visible = FALSE; // Default hidden
		}

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = TRUE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = TRUE;
		$item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
		$item->moveTo(0);
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = TRUE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = $this->ListOptions[$this->ListOptions->GroupOptionName];
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode != "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);

				// Reload hidden key for delete
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . HtmlEncode($rowkey) . "\">";
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->isGridAdd() || $this->isGridEdit()) {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = $options["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}

		// "edit"
		$opt = $this->ListOptions["edit"];
		if ($this->isInlineEditRow()) { // Inline-Edit
			$this->ListOptions->CustomItem = "edit"; // Show edit column only
			$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
				$opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
					"<a class=\"ew-grid-link ew-inline-update\" title=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . UrlAddHash($this->pageName(), "r" . $this->RowCount . "_" . $this->TableVar) . "');\">" . $Language->phrase("UpdateLink") . "</a>&nbsp;" .
					"<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
					"<input type=\"hidden\" name=\"action\" id=\"action\" value=\"update\"></div>";
			$opt->Body .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . HtmlEncode($this->Slno->CurrentValue) . "\">";
			return;
		}

		// "edit"
		$opt = $this->ListOptions["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
			$opt->Body .= "<a class=\"ew-row-link ew-inline-edit\" title=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" href=\"" . HtmlEncode(UrlAddHash($this->InlineEditUrl, "r" . $this->RowCount . "_" . $this->TableVar)) . "\">" . $Language->phrase("InlineEditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// Set up list action buttons
		$opt = $this->ListOptions["listactions"];
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = [];
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = $this->ListOptions["checkbox"];
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->Slno->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		if ($this->isGridEdit() && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->Slno->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;

		// Add grid edit
		$option = $options["addedit"];
		$item = &$option->add("gridedit");
		$item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode($this->GridEditUrl) . "\">" . $Language->phrase("GridEditLink") . "</a>";
		$item->Visible = $this->GridEditUrl != "" && $Security->canEdit();
		$option = $options["action"];

		// Set up options default
		foreach ($options as $option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"ftbl_sms_monthly_daylistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"ftbl_sms_monthly_daylistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.ftbl_sms_monthly_daylist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecords <= 0) {
				$option = $options["addedit"];
				$item = $option["gridedit"];
				if ($item)
					$item->Visible = FALSE;
				$option = $options["action"];
				$option->hideAllOptions();
			}
		} else { // Grid add/edit mode

			// Hide all options first
			foreach ($options as $option)
				$option->hideAllOptions();

			// Grid-Edit
			if ($this->isGridEdit()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = $options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = FALSE;
				}
				$option = $options["action"];
				$option->UseDropDownButton = FALSE;
					$item = &$option->add("gridsave");
					$item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridSaveLink") . "</a>";
					$item = &$option->add("gridcancel");
					$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
					$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}
		}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter != "" && $userAction != "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions[$userAction]->Caption;
				if (!$this->ListActions[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = "";
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage != "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() != "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() != "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up list options (extended codes)
	protected function setupListOptionsExt()
	{
	}

	// Render list options (extended codes)
	protected function renderListOptionsExt()
	{
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->Slno->CurrentValue = NULL;
		$this->Slno->OldValue = $this->Slno->CurrentValue;
		$this->StationId->CurrentValue = NULL;
		$this->StationId->OldValue = $this->StationId->CurrentValue;
		$this->month_id->CurrentValue = NULL;
		$this->month_id->OldValue = $this->month_id->CurrentValue;
		$this->_01_rf->CurrentValue = NULL;
		$this->_01_rf->OldValue = $this->_01_rf->CurrentValue;
		$this->_02_rf->CurrentValue = NULL;
		$this->_02_rf->OldValue = $this->_02_rf->CurrentValue;
		$this->_03_rf->CurrentValue = NULL;
		$this->_03_rf->OldValue = $this->_03_rf->CurrentValue;
		$this->_04_rf->CurrentValue = NULL;
		$this->_04_rf->OldValue = $this->_04_rf->CurrentValue;
		$this->_05_rf->CurrentValue = NULL;
		$this->_05_rf->OldValue = $this->_05_rf->CurrentValue;
		$this->_06_rf->CurrentValue = NULL;
		$this->_06_rf->OldValue = $this->_06_rf->CurrentValue;
		$this->_07_rf->CurrentValue = NULL;
		$this->_07_rf->OldValue = $this->_07_rf->CurrentValue;
		$this->_08_rf->CurrentValue = NULL;
		$this->_08_rf->OldValue = $this->_08_rf->CurrentValue;
		$this->_09_rf->CurrentValue = NULL;
		$this->_09_rf->OldValue = $this->_09_rf->CurrentValue;
		$this->_10_rf->CurrentValue = NULL;
		$this->_10_rf->OldValue = $this->_10_rf->CurrentValue;
		$this->_11_rf->CurrentValue = NULL;
		$this->_11_rf->OldValue = $this->_11_rf->CurrentValue;
		$this->_12_rf->CurrentValue = NULL;
		$this->_12_rf->OldValue = $this->_12_rf->CurrentValue;
		$this->_13_rf->CurrentValue = NULL;
		$this->_13_rf->OldValue = $this->_13_rf->CurrentValue;
		$this->_14_rf->CurrentValue = NULL;
		$this->_14_rf->OldValue = $this->_14_rf->CurrentValue;
		$this->_15_rf->CurrentValue = NULL;
		$this->_15_rf->OldValue = $this->_15_rf->CurrentValue;
		$this->_16_rf->CurrentValue = NULL;
		$this->_16_rf->OldValue = $this->_16_rf->CurrentValue;
		$this->_17_rf->CurrentValue = NULL;
		$this->_17_rf->OldValue = $this->_17_rf->CurrentValue;
		$this->_18_rf->CurrentValue = NULL;
		$this->_18_rf->OldValue = $this->_18_rf->CurrentValue;
		$this->_19_rf->CurrentValue = NULL;
		$this->_19_rf->OldValue = $this->_19_rf->CurrentValue;
		$this->_20_rf->CurrentValue = NULL;
		$this->_20_rf->OldValue = $this->_20_rf->CurrentValue;
		$this->_21_rf->CurrentValue = NULL;
		$this->_21_rf->OldValue = $this->_21_rf->CurrentValue;
		$this->_22_rf->CurrentValue = NULL;
		$this->_22_rf->OldValue = $this->_22_rf->CurrentValue;
		$this->_23_rf->CurrentValue = NULL;
		$this->_23_rf->OldValue = $this->_23_rf->CurrentValue;
		$this->_24_rf->CurrentValue = NULL;
		$this->_24_rf->OldValue = $this->_24_rf->CurrentValue;
		$this->_25_rf->CurrentValue = NULL;
		$this->_25_rf->OldValue = $this->_25_rf->CurrentValue;
		$this->_26_rf->CurrentValue = NULL;
		$this->_26_rf->OldValue = $this->_26_rf->CurrentValue;
		$this->_27_rf->CurrentValue = NULL;
		$this->_27_rf->OldValue = $this->_27_rf->CurrentValue;
		$this->_28_rf->CurrentValue = NULL;
		$this->_28_rf->OldValue = $this->_28_rf->CurrentValue;
		$this->_29_rf->CurrentValue = NULL;
		$this->_29_rf->OldValue = $this->_29_rf->CurrentValue;
		$this->_30_rf->CurrentValue = NULL;
		$this->_30_rf->OldValue = $this->_30_rf->CurrentValue;
		$this->_31_rf->CurrentValue = NULL;
		$this->_31_rf->OldValue = $this->_31_rf->CurrentValue;
		$this->SubDivisionId->CurrentValue = NULL;
		$this->SubDivisionId->OldValue = $this->SubDivisionId->CurrentValue;
		$this->Water_Year->CurrentValue = "2022-23";
		$this->Water_Year->OldValue = $this->Water_Year->CurrentValue;
		$this->SenderMobileNumber->CurrentValue = NULL;
		$this->SenderMobileNumber->OldValue = $this->SenderMobileNumber->CurrentValue;
		$this->IsChanged->CurrentValue = "N";
		$this->IsChanged->OldValue = $this->IsChanged->CurrentValue;
	}

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), FALSE);
		if ($this->BasicSearch->Keyword != "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), FALSE);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;

		// Slno
		if (!$this->isAddOrEdit() && $this->Slno->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Slno->AdvancedSearch->SearchValue != "" || $this->Slno->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// StationId
		if (!$this->isAddOrEdit() && $this->StationId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->StationId->AdvancedSearch->SearchValue != "" || $this->StationId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// month_id
		if (!$this->isAddOrEdit() && $this->month_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->month_id->AdvancedSearch->SearchValue != "" || $this->month_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 01_rf
		if (!$this->isAddOrEdit() && $this->_01_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_01_rf->AdvancedSearch->SearchValue != "" || $this->_01_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 02_rf
		if (!$this->isAddOrEdit() && $this->_02_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_02_rf->AdvancedSearch->SearchValue != "" || $this->_02_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 03_rf
		if (!$this->isAddOrEdit() && $this->_03_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_03_rf->AdvancedSearch->SearchValue != "" || $this->_03_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 04_rf
		if (!$this->isAddOrEdit() && $this->_04_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_04_rf->AdvancedSearch->SearchValue != "" || $this->_04_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 05_rf
		if (!$this->isAddOrEdit() && $this->_05_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_05_rf->AdvancedSearch->SearchValue != "" || $this->_05_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 06_rf
		if (!$this->isAddOrEdit() && $this->_06_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_06_rf->AdvancedSearch->SearchValue != "" || $this->_06_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 07_rf
		if (!$this->isAddOrEdit() && $this->_07_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_07_rf->AdvancedSearch->SearchValue != "" || $this->_07_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 08_rf
		if (!$this->isAddOrEdit() && $this->_08_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_08_rf->AdvancedSearch->SearchValue != "" || $this->_08_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 09_rf
		if (!$this->isAddOrEdit() && $this->_09_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_09_rf->AdvancedSearch->SearchValue != "" || $this->_09_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 10_rf
		if (!$this->isAddOrEdit() && $this->_10_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_10_rf->AdvancedSearch->SearchValue != "" || $this->_10_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 11_rf
		if (!$this->isAddOrEdit() && $this->_11_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_11_rf->AdvancedSearch->SearchValue != "" || $this->_11_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 12_rf
		if (!$this->isAddOrEdit() && $this->_12_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_12_rf->AdvancedSearch->SearchValue != "" || $this->_12_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 13_rf
		if (!$this->isAddOrEdit() && $this->_13_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_13_rf->AdvancedSearch->SearchValue != "" || $this->_13_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 14_rf
		if (!$this->isAddOrEdit() && $this->_14_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_14_rf->AdvancedSearch->SearchValue != "" || $this->_14_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 15_rf
		if (!$this->isAddOrEdit() && $this->_15_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_15_rf->AdvancedSearch->SearchValue != "" || $this->_15_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 16_rf
		if (!$this->isAddOrEdit() && $this->_16_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_16_rf->AdvancedSearch->SearchValue != "" || $this->_16_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 17_rf
		if (!$this->isAddOrEdit() && $this->_17_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_17_rf->AdvancedSearch->SearchValue != "" || $this->_17_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 18_rf
		if (!$this->isAddOrEdit() && $this->_18_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_18_rf->AdvancedSearch->SearchValue != "" || $this->_18_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 19_rf
		if (!$this->isAddOrEdit() && $this->_19_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_19_rf->AdvancedSearch->SearchValue != "" || $this->_19_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 20_rf
		if (!$this->isAddOrEdit() && $this->_20_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_20_rf->AdvancedSearch->SearchValue != "" || $this->_20_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 21_rf
		if (!$this->isAddOrEdit() && $this->_21_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_21_rf->AdvancedSearch->SearchValue != "" || $this->_21_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 22_rf
		if (!$this->isAddOrEdit() && $this->_22_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_22_rf->AdvancedSearch->SearchValue != "" || $this->_22_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 23_rf
		if (!$this->isAddOrEdit() && $this->_23_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_23_rf->AdvancedSearch->SearchValue != "" || $this->_23_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 24_rf
		if (!$this->isAddOrEdit() && $this->_24_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_24_rf->AdvancedSearch->SearchValue != "" || $this->_24_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 25_rf
		if (!$this->isAddOrEdit() && $this->_25_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_25_rf->AdvancedSearch->SearchValue != "" || $this->_25_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 26_rf
		if (!$this->isAddOrEdit() && $this->_26_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_26_rf->AdvancedSearch->SearchValue != "" || $this->_26_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 27_rf
		if (!$this->isAddOrEdit() && $this->_27_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_27_rf->AdvancedSearch->SearchValue != "" || $this->_27_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 28_rf
		if (!$this->isAddOrEdit() && $this->_28_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_28_rf->AdvancedSearch->SearchValue != "" || $this->_28_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 29_rf
		if (!$this->isAddOrEdit() && $this->_29_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_29_rf->AdvancedSearch->SearchValue != "" || $this->_29_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 30_rf
		if (!$this->isAddOrEdit() && $this->_30_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_30_rf->AdvancedSearch->SearchValue != "" || $this->_30_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// 31_rf
		if (!$this->isAddOrEdit() && $this->_31_rf->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_31_rf->AdvancedSearch->SearchValue != "" || $this->_31_rf->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SubDivisionId
		if (!$this->isAddOrEdit() && $this->SubDivisionId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SubDivisionId->AdvancedSearch->SearchValue != "" || $this->SubDivisionId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Water_Year
		if (!$this->isAddOrEdit() && $this->Water_Year->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Water_Year->AdvancedSearch->SearchValue != "" || $this->Water_Year->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SenderMobileNumber
		if (!$this->isAddOrEdit() && $this->SenderMobileNumber->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SenderMobileNumber->AdvancedSearch->SearchValue != "" || $this->SenderMobileNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// IsChanged
		if (!$this->isAddOrEdit() && $this->IsChanged->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->IsChanged->AdvancedSearch->SearchValue != "" || $this->IsChanged->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		return $got;
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
		if (!$this->Slno->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->Slno->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
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

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
			if (!$this->EventCancelled)
				$this->HashValue = $this->getRowHash($rs); // Get hash value for record
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
		$this->loadDefaultValues();
		$row = [];
		$row['Slno'] = $this->Slno->CurrentValue;
		$row['StationId'] = $this->StationId->CurrentValue;
		$row['month_id'] = $this->month_id->CurrentValue;
		$row['01_rf'] = $this->_01_rf->CurrentValue;
		$row['02_rf'] = $this->_02_rf->CurrentValue;
		$row['03_rf'] = $this->_03_rf->CurrentValue;
		$row['04_rf'] = $this->_04_rf->CurrentValue;
		$row['05_rf'] = $this->_05_rf->CurrentValue;
		$row['06_rf'] = $this->_06_rf->CurrentValue;
		$row['07_rf'] = $this->_07_rf->CurrentValue;
		$row['08_rf'] = $this->_08_rf->CurrentValue;
		$row['09_rf'] = $this->_09_rf->CurrentValue;
		$row['10_rf'] = $this->_10_rf->CurrentValue;
		$row['11_rf'] = $this->_11_rf->CurrentValue;
		$row['12_rf'] = $this->_12_rf->CurrentValue;
		$row['13_rf'] = $this->_13_rf->CurrentValue;
		$row['14_rf'] = $this->_14_rf->CurrentValue;
		$row['15_rf'] = $this->_15_rf->CurrentValue;
		$row['16_rf'] = $this->_16_rf->CurrentValue;
		$row['17_rf'] = $this->_17_rf->CurrentValue;
		$row['18_rf'] = $this->_18_rf->CurrentValue;
		$row['19_rf'] = $this->_19_rf->CurrentValue;
		$row['20_rf'] = $this->_20_rf->CurrentValue;
		$row['21_rf'] = $this->_21_rf->CurrentValue;
		$row['22_rf'] = $this->_22_rf->CurrentValue;
		$row['23_rf'] = $this->_23_rf->CurrentValue;
		$row['24_rf'] = $this->_24_rf->CurrentValue;
		$row['25_rf'] = $this->_25_rf->CurrentValue;
		$row['26_rf'] = $this->_26_rf->CurrentValue;
		$row['27_rf'] = $this->_27_rf->CurrentValue;
		$row['28_rf'] = $this->_28_rf->CurrentValue;
		$row['29_rf'] = $this->_29_rf->CurrentValue;
		$row['30_rf'] = $this->_30_rf->CurrentValue;
		$row['31_rf'] = $this->_31_rf->CurrentValue;
		$row['SubDivisionId'] = $this->SubDivisionId->CurrentValue;
		$row['Water_Year'] = $this->Water_Year->CurrentValue;
		$row['SenderMobileNumber'] = $this->SenderMobileNumber->CurrentValue;
		$row['IsChanged'] = $this->IsChanged->CurrentValue;
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

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

			// month_id
			$this->month_id->EditAttrs["class"] = "form-control";
			$this->month_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->month_id->CurrentValue));
			if ($curVal != "")
				$this->month_id->ViewValue = $this->month_id->lookupCacheOption($curVal);
			else
				$this->month_id->ViewValue = $this->month_id->Lookup !== NULL && is_array($this->month_id->Lookup->Options) ? $curVal : NULL;
			if ($this->month_id->ViewValue !== NULL) { // Load from cache
				$this->month_id->EditValue = array_values($this->month_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`month_id`" . SearchString("=", $this->month_id->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->month_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->month_id->EditValue = $arwrk;
			}

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
			$curVal = trim(strval($this->SubDivisionId->CurrentValue));
			if ($curVal != "")
				$this->SubDivisionId->ViewValue = $this->SubDivisionId->lookupCacheOption($curVal);
			else
				$this->SubDivisionId->ViewValue = $this->SubDivisionId->Lookup !== NULL && is_array($this->SubDivisionId->Lookup->Options) ? $curVal : NULL;
			if ($this->SubDivisionId->ViewValue !== NULL) { // Load from cache
				$this->SubDivisionId->EditValue = array_values($this->SubDivisionId->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`SubDivisionId`" . SearchString("=", $this->SubDivisionId->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->SubDivisionId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->SubDivisionId->EditValue = $arwrk;
			}

			// Water_Year
			$this->Water_Year->EditAttrs["class"] = "form-control";
			$this->Water_Year->EditCustomAttributes = "";
			if (!$this->Water_Year->Raw)
				$this->Water_Year->CurrentValue = HtmlDecode($this->Water_Year->CurrentValue);
			$this->Water_Year->EditValue = HtmlEncode($this->Water_Year->CurrentValue);

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			if (!$this->SenderMobileNumber->Raw)
				$this->SenderMobileNumber->CurrentValue = HtmlDecode($this->SenderMobileNumber->CurrentValue);
			$this->SenderMobileNumber->EditValue = HtmlEncode($this->SenderMobileNumber->CurrentValue);

			// IsChanged
			$this->IsChanged->EditAttrs["class"] = "form-control";
			$this->IsChanged->EditCustomAttributes = "";
			if (!$this->IsChanged->Raw)
				$this->IsChanged->CurrentValue = HtmlDecode($this->IsChanged->CurrentValue);
			$this->IsChanged->EditValue = HtmlEncode($this->IsChanged->CurrentValue);

			// Add refer script
			// StationId

			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";

			// month_id
			$this->month_id->LinkCustomAttributes = "";
			$this->month_id->HrefValue = "";

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

			// Water_Year
			$this->Water_Year->LinkCustomAttributes = "";
			$this->Water_Year->HrefValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";

			// IsChanged
			$this->IsChanged->LinkCustomAttributes = "";
			$this->IsChanged->HrefValue = "";
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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// StationId
			$this->StationId->EditAttrs["class"] = "form-control";
			$this->StationId->EditCustomAttributes = "";
			$curVal = trim(strval($this->StationId->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->StationId->AdvancedSearch->ViewValue = $this->StationId->lookupCacheOption($curVal);
			else
				$this->StationId->AdvancedSearch->ViewValue = $this->StationId->Lookup !== NULL && is_array($this->StationId->Lookup->Options) ? $curVal : NULL;
			if ($this->StationId->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->StationId->EditValue = array_values($this->StationId->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`StationId`" . SearchString("=", $this->StationId->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->StationId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->StationId->EditValue = $arwrk;
			}

			// month_id
			$this->month_id->EditAttrs["class"] = "form-control";
			$this->month_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->month_id->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->month_id->AdvancedSearch->ViewValue = $this->month_id->lookupCacheOption($curVal);
			else
				$this->month_id->AdvancedSearch->ViewValue = $this->month_id->Lookup !== NULL && is_array($this->month_id->Lookup->Options) ? $curVal : NULL;
			if ($this->month_id->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->month_id->EditValue = array_values($this->month_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`month_id`" . SearchString("=", $this->month_id->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->month_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->month_id->EditValue = $arwrk;
			}

			// 01_rf
			$this->_01_rf->EditAttrs["class"] = "form-control";
			$this->_01_rf->EditCustomAttributes = "";
			$this->_01_rf->EditValue = HtmlEncode($this->_01_rf->AdvancedSearch->SearchValue);

			// 02_rf
			$this->_02_rf->EditAttrs["class"] = "form-control";
			$this->_02_rf->EditCustomAttributes = "";
			$this->_02_rf->EditValue = HtmlEncode($this->_02_rf->AdvancedSearch->SearchValue);

			// 03_rf
			$this->_03_rf->EditAttrs["class"] = "form-control";
			$this->_03_rf->EditCustomAttributes = "";
			$this->_03_rf->EditValue = HtmlEncode($this->_03_rf->AdvancedSearch->SearchValue);

			// 04_rf
			$this->_04_rf->EditAttrs["class"] = "form-control";
			$this->_04_rf->EditCustomAttributes = "";
			$this->_04_rf->EditValue = HtmlEncode($this->_04_rf->AdvancedSearch->SearchValue);

			// 05_rf
			$this->_05_rf->EditAttrs["class"] = "form-control";
			$this->_05_rf->EditCustomAttributes = "";
			$this->_05_rf->EditValue = HtmlEncode($this->_05_rf->AdvancedSearch->SearchValue);

			// 06_rf
			$this->_06_rf->EditAttrs["class"] = "form-control";
			$this->_06_rf->EditCustomAttributes = "";
			$this->_06_rf->EditValue = HtmlEncode($this->_06_rf->AdvancedSearch->SearchValue);

			// 07_rf
			$this->_07_rf->EditAttrs["class"] = "form-control";
			$this->_07_rf->EditCustomAttributes = "";
			$this->_07_rf->EditValue = HtmlEncode($this->_07_rf->AdvancedSearch->SearchValue);

			// 08_rf
			$this->_08_rf->EditAttrs["class"] = "form-control";
			$this->_08_rf->EditCustomAttributes = "";
			$this->_08_rf->EditValue = HtmlEncode($this->_08_rf->AdvancedSearch->SearchValue);

			// 09_rf
			$this->_09_rf->EditAttrs["class"] = "form-control";
			$this->_09_rf->EditCustomAttributes = "";
			$this->_09_rf->EditValue = HtmlEncode($this->_09_rf->AdvancedSearch->SearchValue);

			// 10_rf
			$this->_10_rf->EditAttrs["class"] = "form-control";
			$this->_10_rf->EditCustomAttributes = "";
			$this->_10_rf->EditValue = HtmlEncode($this->_10_rf->AdvancedSearch->SearchValue);

			// 11_rf
			$this->_11_rf->EditAttrs["class"] = "form-control";
			$this->_11_rf->EditCustomAttributes = "";
			$this->_11_rf->EditValue = HtmlEncode($this->_11_rf->AdvancedSearch->SearchValue);

			// 12_rf
			$this->_12_rf->EditAttrs["class"] = "form-control";
			$this->_12_rf->EditCustomAttributes = "";
			$this->_12_rf->EditValue = HtmlEncode($this->_12_rf->AdvancedSearch->SearchValue);

			// 13_rf
			$this->_13_rf->EditAttrs["class"] = "form-control";
			$this->_13_rf->EditCustomAttributes = "";
			$this->_13_rf->EditValue = HtmlEncode($this->_13_rf->AdvancedSearch->SearchValue);

			// 14_rf
			$this->_14_rf->EditAttrs["class"] = "form-control";
			$this->_14_rf->EditCustomAttributes = "";
			$this->_14_rf->EditValue = HtmlEncode($this->_14_rf->AdvancedSearch->SearchValue);

			// 15_rf
			$this->_15_rf->EditAttrs["class"] = "form-control";
			$this->_15_rf->EditCustomAttributes = "";
			$this->_15_rf->EditValue = HtmlEncode($this->_15_rf->AdvancedSearch->SearchValue);

			// 16_rf
			$this->_16_rf->EditAttrs["class"] = "form-control";
			$this->_16_rf->EditCustomAttributes = "";
			$this->_16_rf->EditValue = HtmlEncode($this->_16_rf->AdvancedSearch->SearchValue);

			// 17_rf
			$this->_17_rf->EditAttrs["class"] = "form-control";
			$this->_17_rf->EditCustomAttributes = "";
			$this->_17_rf->EditValue = HtmlEncode($this->_17_rf->AdvancedSearch->SearchValue);

			// 18_rf
			$this->_18_rf->EditAttrs["class"] = "form-control";
			$this->_18_rf->EditCustomAttributes = "";
			$this->_18_rf->EditValue = HtmlEncode($this->_18_rf->AdvancedSearch->SearchValue);

			// 19_rf
			$this->_19_rf->EditAttrs["class"] = "form-control";
			$this->_19_rf->EditCustomAttributes = "";
			$this->_19_rf->EditValue = HtmlEncode($this->_19_rf->AdvancedSearch->SearchValue);

			// 20_rf
			$this->_20_rf->EditAttrs["class"] = "form-control";
			$this->_20_rf->EditCustomAttributes = "";
			$this->_20_rf->EditValue = HtmlEncode($this->_20_rf->AdvancedSearch->SearchValue);

			// 21_rf
			$this->_21_rf->EditAttrs["class"] = "form-control";
			$this->_21_rf->EditCustomAttributes = "";
			$this->_21_rf->EditValue = HtmlEncode($this->_21_rf->AdvancedSearch->SearchValue);

			// 22_rf
			$this->_22_rf->EditAttrs["class"] = "form-control";
			$this->_22_rf->EditCustomAttributes = "";
			$this->_22_rf->EditValue = HtmlEncode($this->_22_rf->AdvancedSearch->SearchValue);

			// 23_rf
			$this->_23_rf->EditAttrs["class"] = "form-control";
			$this->_23_rf->EditCustomAttributes = "";
			$this->_23_rf->EditValue = HtmlEncode($this->_23_rf->AdvancedSearch->SearchValue);

			// 24_rf
			$this->_24_rf->EditAttrs["class"] = "form-control";
			$this->_24_rf->EditCustomAttributes = "";
			$this->_24_rf->EditValue = HtmlEncode($this->_24_rf->AdvancedSearch->SearchValue);

			// 25_rf
			$this->_25_rf->EditAttrs["class"] = "form-control";
			$this->_25_rf->EditCustomAttributes = "";
			$this->_25_rf->EditValue = HtmlEncode($this->_25_rf->AdvancedSearch->SearchValue);

			// 26_rf
			$this->_26_rf->EditAttrs["class"] = "form-control";
			$this->_26_rf->EditCustomAttributes = "";
			$this->_26_rf->EditValue = HtmlEncode($this->_26_rf->AdvancedSearch->SearchValue);

			// 27_rf
			$this->_27_rf->EditAttrs["class"] = "form-control";
			$this->_27_rf->EditCustomAttributes = "";
			$this->_27_rf->EditValue = HtmlEncode($this->_27_rf->AdvancedSearch->SearchValue);

			// 28_rf
			$this->_28_rf->EditAttrs["class"] = "form-control";
			$this->_28_rf->EditCustomAttributes = "";
			$this->_28_rf->EditValue = HtmlEncode($this->_28_rf->AdvancedSearch->SearchValue);

			// 29_rf
			$this->_29_rf->EditAttrs["class"] = "form-control";
			$this->_29_rf->EditCustomAttributes = "";
			$this->_29_rf->EditValue = HtmlEncode($this->_29_rf->AdvancedSearch->SearchValue);

			// 30_rf
			$this->_30_rf->EditAttrs["class"] = "form-control";
			$this->_30_rf->EditCustomAttributes = "";
			$this->_30_rf->EditValue = HtmlEncode($this->_30_rf->AdvancedSearch->SearchValue);

			// 31_rf
			$this->_31_rf->EditAttrs["class"] = "form-control";
			$this->_31_rf->EditCustomAttributes = "";
			$this->_31_rf->EditValue = HtmlEncode($this->_31_rf->AdvancedSearch->SearchValue);

			// SubDivisionId
			$this->SubDivisionId->EditAttrs["class"] = "form-control";
			$this->SubDivisionId->EditCustomAttributes = "";

			// Water_Year
			$this->Water_Year->EditAttrs["class"] = "form-control";
			$this->Water_Year->EditCustomAttributes = "";
			if (!$this->Water_Year->Raw)
				$this->Water_Year->AdvancedSearch->SearchValue = HtmlDecode($this->Water_Year->AdvancedSearch->SearchValue);
			$this->Water_Year->EditValue = HtmlEncode($this->Water_Year->AdvancedSearch->SearchValue);

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			if (!$this->SenderMobileNumber->Raw)
				$this->SenderMobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->SenderMobileNumber->AdvancedSearch->SearchValue);
			$this->SenderMobileNumber->EditValue = HtmlEncode($this->SenderMobileNumber->AdvancedSearch->SearchValue);

			// IsChanged
			$this->IsChanged->EditAttrs["class"] = "form-control";
			$this->IsChanged->EditCustomAttributes = "";
			if (!$this->IsChanged->Raw)
				$this->IsChanged->AdvancedSearch->SearchValue = HtmlDecode($this->IsChanged->AdvancedSearch->SearchValue);
			$this->IsChanged->EditValue = HtmlEncode($this->IsChanged->AdvancedSearch->SearchValue);
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
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

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['Slno'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
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

	// Load row hash
	protected function loadRowHash()
	{
		$filter = $this->getRecordFilter();

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$rsRow = $conn->Execute($sql);
		$this->HashValue = ($rsRow && !$rsRow->EOF) ? $this->getRowHash($rsRow) : ""; // Get hash value for record
		$rsRow->close();
	}

	// Get Row Hash
	public function getRowHash(&$rs)
	{
		if (!$rs)
			return "";
		$hash = "";
		$hash .= GetFieldHash($rs->fields('01_rf')); // 01_rf
		$hash .= GetFieldHash($rs->fields('02_rf')); // 02_rf
		$hash .= GetFieldHash($rs->fields('03_rf')); // 03_rf
		$hash .= GetFieldHash($rs->fields('04_rf')); // 04_rf
		$hash .= GetFieldHash($rs->fields('05_rf')); // 05_rf
		$hash .= GetFieldHash($rs->fields('06_rf')); // 06_rf
		$hash .= GetFieldHash($rs->fields('07_rf')); // 07_rf
		$hash .= GetFieldHash($rs->fields('08_rf')); // 08_rf
		$hash .= GetFieldHash($rs->fields('09_rf')); // 09_rf
		$hash .= GetFieldHash($rs->fields('10_rf')); // 10_rf
		$hash .= GetFieldHash($rs->fields('11_rf')); // 11_rf
		$hash .= GetFieldHash($rs->fields('12_rf')); // 12_rf
		$hash .= GetFieldHash($rs->fields('13_rf')); // 13_rf
		$hash .= GetFieldHash($rs->fields('14_rf')); // 14_rf
		$hash .= GetFieldHash($rs->fields('15_rf')); // 15_rf
		$hash .= GetFieldHash($rs->fields('16_rf')); // 16_rf
		$hash .= GetFieldHash($rs->fields('17_rf')); // 17_rf
		$hash .= GetFieldHash($rs->fields('18_rf')); // 18_rf
		$hash .= GetFieldHash($rs->fields('19_rf')); // 19_rf
		$hash .= GetFieldHash($rs->fields('20_rf')); // 20_rf
		$hash .= GetFieldHash($rs->fields('21_rf')); // 21_rf
		$hash .= GetFieldHash($rs->fields('22_rf')); // 22_rf
		$hash .= GetFieldHash($rs->fields('23_rf')); // 23_rf
		$hash .= GetFieldHash($rs->fields('24_rf')); // 24_rf
		$hash .= GetFieldHash($rs->fields('25_rf')); // 25_rf
		$hash .= GetFieldHash($rs->fields('26_rf')); // 26_rf
		$hash .= GetFieldHash($rs->fields('27_rf')); // 27_rf
		$hash .= GetFieldHash($rs->fields('28_rf')); // 28_rf
		$hash .= GetFieldHash($rs->fields('29_rf')); // 29_rf
		$hash .= GetFieldHash($rs->fields('30_rf')); // 30_rf
		$hash .= GetFieldHash($rs->fields('31_rf')); // 31_rf
		return md5($hash);
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

		// month_id
		$this->month_id->setDbValueDef($rsnew, $this->month_id->CurrentValue, NULL, FALSE);

		// 01_rf
		$this->_01_rf->setDbValueDef($rsnew, $this->_01_rf->CurrentValue, NULL, FALSE);

		// 02_rf
		$this->_02_rf->setDbValueDef($rsnew, $this->_02_rf->CurrentValue, NULL, FALSE);

		// 03_rf
		$this->_03_rf->setDbValueDef($rsnew, $this->_03_rf->CurrentValue, NULL, FALSE);

		// 04_rf
		$this->_04_rf->setDbValueDef($rsnew, $this->_04_rf->CurrentValue, NULL, FALSE);

		// 05_rf
		$this->_05_rf->setDbValueDef($rsnew, $this->_05_rf->CurrentValue, NULL, FALSE);

		// 06_rf
		$this->_06_rf->setDbValueDef($rsnew, $this->_06_rf->CurrentValue, NULL, FALSE);

		// 07_rf
		$this->_07_rf->setDbValueDef($rsnew, $this->_07_rf->CurrentValue, NULL, FALSE);

		// 08_rf
		$this->_08_rf->setDbValueDef($rsnew, $this->_08_rf->CurrentValue, NULL, FALSE);

		// 09_rf
		$this->_09_rf->setDbValueDef($rsnew, $this->_09_rf->CurrentValue, NULL, FALSE);

		// 10_rf
		$this->_10_rf->setDbValueDef($rsnew, $this->_10_rf->CurrentValue, NULL, FALSE);

		// 11_rf
		$this->_11_rf->setDbValueDef($rsnew, $this->_11_rf->CurrentValue, NULL, FALSE);

		// 12_rf
		$this->_12_rf->setDbValueDef($rsnew, $this->_12_rf->CurrentValue, NULL, FALSE);

		// 13_rf
		$this->_13_rf->setDbValueDef($rsnew, $this->_13_rf->CurrentValue, NULL, FALSE);

		// 14_rf
		$this->_14_rf->setDbValueDef($rsnew, $this->_14_rf->CurrentValue, NULL, FALSE);

		// 15_rf
		$this->_15_rf->setDbValueDef($rsnew, $this->_15_rf->CurrentValue, NULL, FALSE);

		// 16_rf
		$this->_16_rf->setDbValueDef($rsnew, $this->_16_rf->CurrentValue, NULL, FALSE);

		// 17_rf
		$this->_17_rf->setDbValueDef($rsnew, $this->_17_rf->CurrentValue, NULL, FALSE);

		// 18_rf
		$this->_18_rf->setDbValueDef($rsnew, $this->_18_rf->CurrentValue, NULL, FALSE);

		// 19_rf
		$this->_19_rf->setDbValueDef($rsnew, $this->_19_rf->CurrentValue, NULL, FALSE);

		// 20_rf
		$this->_20_rf->setDbValueDef($rsnew, $this->_20_rf->CurrentValue, NULL, FALSE);

		// 21_rf
		$this->_21_rf->setDbValueDef($rsnew, $this->_21_rf->CurrentValue, NULL, FALSE);

		// 22_rf
		$this->_22_rf->setDbValueDef($rsnew, $this->_22_rf->CurrentValue, NULL, FALSE);

		// 23_rf
		$this->_23_rf->setDbValueDef($rsnew, $this->_23_rf->CurrentValue, NULL, FALSE);

		// 24_rf
		$this->_24_rf->setDbValueDef($rsnew, $this->_24_rf->CurrentValue, NULL, FALSE);

		// 25_rf
		$this->_25_rf->setDbValueDef($rsnew, $this->_25_rf->CurrentValue, NULL, FALSE);

		// 26_rf
		$this->_26_rf->setDbValueDef($rsnew, $this->_26_rf->CurrentValue, NULL, FALSE);

		// 27_rf
		$this->_27_rf->setDbValueDef($rsnew, $this->_27_rf->CurrentValue, NULL, FALSE);

		// 28_rf
		$this->_28_rf->setDbValueDef($rsnew, $this->_28_rf->CurrentValue, NULL, FALSE);

		// 29_rf
		$this->_29_rf->setDbValueDef($rsnew, $this->_29_rf->CurrentValue, NULL, FALSE);

		// 30_rf
		$this->_30_rf->setDbValueDef($rsnew, $this->_30_rf->CurrentValue, NULL, FALSE);

		// 31_rf
		$this->_31_rf->setDbValueDef($rsnew, $this->_31_rf->CurrentValue, NULL, FALSE);

		// SubDivisionId
		$this->SubDivisionId->setDbValueDef($rsnew, $this->SubDivisionId->CurrentValue, 0, FALSE);

		// Water_Year
		$this->Water_Year->setDbValueDef($rsnew, $this->Water_Year->CurrentValue, NULL, strval($this->Water_Year->CurrentValue) == "");

		// SenderMobileNumber
		$this->SenderMobileNumber->setDbValueDef($rsnew, $this->SenderMobileNumber->CurrentValue, NULL, FALSE);

		// IsChanged
		$this->IsChanged->setDbValueDef($rsnew, $this->IsChanged->CurrentValue, "", strval($this->IsChanged->CurrentValue) == "");

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

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->Slno->AdvancedSearch->load();
		$this->StationId->AdvancedSearch->load();
		$this->month_id->AdvancedSearch->load();
		$this->_01_rf->AdvancedSearch->load();
		$this->_02_rf->AdvancedSearch->load();
		$this->_03_rf->AdvancedSearch->load();
		$this->_04_rf->AdvancedSearch->load();
		$this->_05_rf->AdvancedSearch->load();
		$this->_06_rf->AdvancedSearch->load();
		$this->_07_rf->AdvancedSearch->load();
		$this->_08_rf->AdvancedSearch->load();
		$this->_09_rf->AdvancedSearch->load();
		$this->_10_rf->AdvancedSearch->load();
		$this->_11_rf->AdvancedSearch->load();
		$this->_12_rf->AdvancedSearch->load();
		$this->_13_rf->AdvancedSearch->load();
		$this->_14_rf->AdvancedSearch->load();
		$this->_15_rf->AdvancedSearch->load();
		$this->_16_rf->AdvancedSearch->load();
		$this->_17_rf->AdvancedSearch->load();
		$this->_18_rf->AdvancedSearch->load();
		$this->_19_rf->AdvancedSearch->load();
		$this->_20_rf->AdvancedSearch->load();
		$this->_21_rf->AdvancedSearch->load();
		$this->_22_rf->AdvancedSearch->load();
		$this->_23_rf->AdvancedSearch->load();
		$this->_24_rf->AdvancedSearch->load();
		$this->_25_rf->AdvancedSearch->load();
		$this->_26_rf->AdvancedSearch->load();
		$this->_27_rf->AdvancedSearch->load();
		$this->_28_rf->AdvancedSearch->load();
		$this->_29_rf->AdvancedSearch->load();
		$this->_30_rf->AdvancedSearch->load();
		$this->_31_rf->AdvancedSearch->load();
		$this->SubDivisionId->AdvancedSearch->load();
		$this->Water_Year->AdvancedSearch->load();
		$this->SenderMobileNumber->AdvancedSearch->load();
		$this->IsChanged->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.ftbl_sms_monthly_daylist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.ftbl_sms_monthly_daylist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.ftbl_sms_monthly_daylist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
		} elseif (SameText($type, "email")) {
			$url = $custom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
			return '<button id="emf_tbl_sms_monthly_day" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_tbl_sms_monthly_day\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.ftbl_sms_monthly_daylist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
		} elseif (SameText($type, "print")) {
			return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Language;

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = FALSE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = FALSE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = FALSE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = FALSE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = TRUE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = TRUE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = TRUE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions("div");
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"ftbl_sms_monthly_daylistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");
		$selectLimit = $this->UseSelectLimit;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecords = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecords = $rs->RecordCount();
		}
		$this->StartRecord = 1;

		// Export all
		if ($this->ExportAll) {
			set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
			$this->DisplayRecords = $this->TotalRecords;
			$this->StopRecord = $this->TotalRecords;
		} else { // Export one page only
			$this->setupStartRecord(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecords <= 0) {
				$this->StopRecord = $this->TotalRecords;
			} else {
				$this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
			}
		}
		if ($selectLimit)
			$rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
		$this->ExportDoc = GetExportDocument($this, "h");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRecord = 1;
			$this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!Config("DEBUG") && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (Config("DEBUG") && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {
			if ($return)
				return $doc->Text; // Return email content
			else
				echo $this->exportEmail($doc->Text); // Send email
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Export email
	protected function exportEmail($emailContent)
	{
		global $TempImages, $Language;
		$sender = Post("sender", "");
		$recipient = Post("recipient", "");
		$cc = Post("cc", "");
		$bcc = Post("bcc", "");

		// Subject
		$subject = Post("subject", "");
		$emailSubject = $subject;

		// Message
		$content = Post("message", "");
		$emailMessage = $content;

		// Check sender
		if ($sender == "") {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterSenderEmail") . "</p>";
		}
		if (!CheckEmail($sender)) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperSenderEmail") . "</p>";
		}

		// Check recipient
		if (!CheckEmailList($recipient, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperRecipientEmail") . "</p>";
		}

		// Check cc
		if (!CheckEmailList($cc, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperCcEmail") . "</p>";
		}

		// Check bcc
		if (!CheckEmailList($bcc, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperBccEmail") . "</p>";
		}

		// Check email sent count
		if (!isset($_SESSION[Config("EXPORT_EMAIL_COUNTER")]))
			$_SESSION[Config("EXPORT_EMAIL_COUNTER")] = 0;
		if ((int)$_SESSION[Config("EXPORT_EMAIL_COUNTER")] > Config("MAX_EMAIL_SENT_COUNT")) {
			return "<p class=\"text-danger\">" . $Language->phrase("ExceedMaxEmailExport") . "</p>";
		}

		// Send email
		$email = new Email();
		$email->Sender = $sender; // Sender
		$email->Recipient = $recipient; // Recipient
		$email->Cc = $cc; // Cc
		$email->Bcc = $bcc; // Bcc
		$email->Subject = $emailSubject; // Subject
		$email->Format = "html";
		if ($emailMessage != "")
			$emailMessage = RemoveXss($emailMessage) . "<br><br>";
		foreach ($TempImages as $tmpImage)
			$email->addEmbeddedImage($tmpImage);
		$email->Content = $emailMessage . CleanEmailContent($emailContent); // Content
		$eventArgs = [];
		if ($this->Recordset)
			$eventArgs["rs"] = &$this->Recordset;
		$emailSent = FALSE;
		if ($this->Email_Sending($email, $eventArgs))
			$emailSent = $email->send();

		// Check email sent status
		if ($emailSent) {

			// Update email sent count
			$_SESSION[Config("EXPORT_EMAIL_COUNTER")]++;

			// Sent email success
			return "<p class=\"text-success\">" . $Language->phrase("SendEmailSuccess") . "</p>"; // Set up success message
		} else {

			// Sent email failure
			return "<p class=\"text-danger\">" . $email->SendErrDescription . "</p>";
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
} // End class
?>