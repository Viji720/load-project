<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class master_dams_list extends master_dams
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'master_dams';

	// Page object name
	public $PageObjName = "master_dams_list";

	// Grid form hidden field names
	public $FormName = "fmaster_damslist";
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

		// Table object (master_dams)
		if (!isset($GLOBALS["master_dams"]) || get_class($GLOBALS["master_dams"]) == PROJECT_NAMESPACE . "master_dams") {
			$GLOBALS["master_dams"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["master_dams"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "master_damsadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "master_damsdelete.php";
		$this->MultiUpdateUrl = "master_damsupdate.php";

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fmaster_damslistsrch";

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

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();

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
		}

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
			$this->PIC->setOldValue($arKeyFlds[0]);
		}
		return TRUE;
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fmaster_damslistsrch");
		$filterList = Concat($filterList, $this->SrNo->AdvancedSearch->toJson(), ","); // Field SrNo
		$filterList = Concat($filterList, $this->PIC->AdvancedSearch->toJson(), ","); // Field PIC
		$filterList = Concat($filterList, $this->kpcl_ID->AdvancedSearch->toJson(), ","); // Field kpcl_ID
		$filterList = Concat($filterList, $this->Name_of_Dam->AdvancedSearch->toJson(), ","); // Field Name_of_Dam
		$filterList = Concat($filterList, $this->kpcl_dam_name->AdvancedSearch->toJson(), ","); // Field kpcl_dam_name
		$filterList = Concat($filterList, $this->Ops_ID->AdvancedSearch->toJson(), ","); // Field Ops_ID
		$filterList = Concat($filterList, $this->dam_size_type_ID->AdvancedSearch->toJson(), ","); // Field dam_size_type_ID
		$filterList = Concat($filterList, $this->dam_Longitude->AdvancedSearch->toJson(), ","); // Field dam_Longitude
		$filterList = Concat($filterList, $this->dam_Latitude->AdvancedSearch->toJson(), ","); // Field dam_Latitude
		$filterList = Concat($filterList, $this->Year_of_Completion->AdvancedSearch->toJson(), ","); // Field Year_of_Completion
		$filterList = Concat($filterList, $this->Basin->AdvancedSearch->toJson(), ","); // Field Basin
		$filterList = Concat($filterList, $this->Sub_Basin->AdvancedSearch->toJson(), ","); // Field Sub-Basin
		$filterList = Concat($filterList, $this->district->AdvancedSearch->toJson(), ","); // Field district
		$filterList = Concat($filterList, $this->Taluka->AdvancedSearch->toJson(), ","); // Field Taluka
		$filterList = Concat($filterList, $this->River->AdvancedSearch->toJson(), ","); // Field River
		$filterList = Concat($filterList, $this->Neareast_City->AdvancedSearch->toJson(), ","); // Field Neareast_City
		$filterList = Concat($filterList, $this->dam_construction_type->AdvancedSearch->toJson(), ","); // Field dam_construction_type
		$filterList = Concat($filterList, $this->Height_above_Lowest_Foundation_Level_in_mtr->AdvancedSearch->toJson(), ","); // Field Height_above_Lowest_Foundation_Level_in_mtr
		$filterList = Concat($filterList, $this->Length_of_Dam_in_mtr->AdvancedSearch->toJson(), ","); // Field Length_of_Dam_in_mtr
		$filterList = Concat($filterList, $this->Volume_Content_of_Dam_in_MCM->AdvancedSearch->toJson(), ","); // Field Volume_Content_of_Dam_in_MCM
		$filterList = Concat($filterList, $this->Gross_Storage_Capacity_of_Dam_in_MCM->AdvancedSearch->toJson(), ","); // Field Gross_Storage_Capacity_of_Dam_in_MCM
		$filterList = Concat($filterList, $this->Reservoir_Area_in_sq_km->AdvancedSearch->toJson(), ","); // Field Reservoir_Area_in_sq_km
		$filterList = Concat($filterList, $this->Effective_Storage_Capacity_in_MCM->AdvancedSearch->toJson(), ","); // Field Effective_Storage_Capacity_in_MCM
		$filterList = Concat($filterList, $this->Purpose->AdvancedSearch->toJson(), ","); // Field Purpose
		$filterList = Concat($filterList, $this->Designed_Spillway_Capacity_in_M3_per_sec->AdvancedSearch->toJson(), ","); // Field Designed_Spillway_Capacity_in_M3_per_sec
		$filterList = Concat($filterList, $this->dam_construction_type_ID->AdvancedSearch->toJson(), ","); // Field dam_construction_type_ID
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fmaster_damslistsrch", $filters);
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

		// Field SrNo
		$this->SrNo->AdvancedSearch->SearchValue = @$filter["x_SrNo"];
		$this->SrNo->AdvancedSearch->SearchOperator = @$filter["z_SrNo"];
		$this->SrNo->AdvancedSearch->SearchCondition = @$filter["v_SrNo"];
		$this->SrNo->AdvancedSearch->SearchValue2 = @$filter["y_SrNo"];
		$this->SrNo->AdvancedSearch->SearchOperator2 = @$filter["w_SrNo"];
		$this->SrNo->AdvancedSearch->save();

		// Field PIC
		$this->PIC->AdvancedSearch->SearchValue = @$filter["x_PIC"];
		$this->PIC->AdvancedSearch->SearchOperator = @$filter["z_PIC"];
		$this->PIC->AdvancedSearch->SearchCondition = @$filter["v_PIC"];
		$this->PIC->AdvancedSearch->SearchValue2 = @$filter["y_PIC"];
		$this->PIC->AdvancedSearch->SearchOperator2 = @$filter["w_PIC"];
		$this->PIC->AdvancedSearch->save();

		// Field kpcl_ID
		$this->kpcl_ID->AdvancedSearch->SearchValue = @$filter["x_kpcl_ID"];
		$this->kpcl_ID->AdvancedSearch->SearchOperator = @$filter["z_kpcl_ID"];
		$this->kpcl_ID->AdvancedSearch->SearchCondition = @$filter["v_kpcl_ID"];
		$this->kpcl_ID->AdvancedSearch->SearchValue2 = @$filter["y_kpcl_ID"];
		$this->kpcl_ID->AdvancedSearch->SearchOperator2 = @$filter["w_kpcl_ID"];
		$this->kpcl_ID->AdvancedSearch->save();

		// Field Name_of_Dam
		$this->Name_of_Dam->AdvancedSearch->SearchValue = @$filter["x_Name_of_Dam"];
		$this->Name_of_Dam->AdvancedSearch->SearchOperator = @$filter["z_Name_of_Dam"];
		$this->Name_of_Dam->AdvancedSearch->SearchCondition = @$filter["v_Name_of_Dam"];
		$this->Name_of_Dam->AdvancedSearch->SearchValue2 = @$filter["y_Name_of_Dam"];
		$this->Name_of_Dam->AdvancedSearch->SearchOperator2 = @$filter["w_Name_of_Dam"];
		$this->Name_of_Dam->AdvancedSearch->save();

		// Field kpcl_dam_name
		$this->kpcl_dam_name->AdvancedSearch->SearchValue = @$filter["x_kpcl_dam_name"];
		$this->kpcl_dam_name->AdvancedSearch->SearchOperator = @$filter["z_kpcl_dam_name"];
		$this->kpcl_dam_name->AdvancedSearch->SearchCondition = @$filter["v_kpcl_dam_name"];
		$this->kpcl_dam_name->AdvancedSearch->SearchValue2 = @$filter["y_kpcl_dam_name"];
		$this->kpcl_dam_name->AdvancedSearch->SearchOperator2 = @$filter["w_kpcl_dam_name"];
		$this->kpcl_dam_name->AdvancedSearch->save();

		// Field Ops_ID
		$this->Ops_ID->AdvancedSearch->SearchValue = @$filter["x_Ops_ID"];
		$this->Ops_ID->AdvancedSearch->SearchOperator = @$filter["z_Ops_ID"];
		$this->Ops_ID->AdvancedSearch->SearchCondition = @$filter["v_Ops_ID"];
		$this->Ops_ID->AdvancedSearch->SearchValue2 = @$filter["y_Ops_ID"];
		$this->Ops_ID->AdvancedSearch->SearchOperator2 = @$filter["w_Ops_ID"];
		$this->Ops_ID->AdvancedSearch->save();

		// Field dam_size_type_ID
		$this->dam_size_type_ID->AdvancedSearch->SearchValue = @$filter["x_dam_size_type_ID"];
		$this->dam_size_type_ID->AdvancedSearch->SearchOperator = @$filter["z_dam_size_type_ID"];
		$this->dam_size_type_ID->AdvancedSearch->SearchCondition = @$filter["v_dam_size_type_ID"];
		$this->dam_size_type_ID->AdvancedSearch->SearchValue2 = @$filter["y_dam_size_type_ID"];
		$this->dam_size_type_ID->AdvancedSearch->SearchOperator2 = @$filter["w_dam_size_type_ID"];
		$this->dam_size_type_ID->AdvancedSearch->save();

		// Field dam_Longitude
		$this->dam_Longitude->AdvancedSearch->SearchValue = @$filter["x_dam_Longitude"];
		$this->dam_Longitude->AdvancedSearch->SearchOperator = @$filter["z_dam_Longitude"];
		$this->dam_Longitude->AdvancedSearch->SearchCondition = @$filter["v_dam_Longitude"];
		$this->dam_Longitude->AdvancedSearch->SearchValue2 = @$filter["y_dam_Longitude"];
		$this->dam_Longitude->AdvancedSearch->SearchOperator2 = @$filter["w_dam_Longitude"];
		$this->dam_Longitude->AdvancedSearch->save();

		// Field dam_Latitude
		$this->dam_Latitude->AdvancedSearch->SearchValue = @$filter["x_dam_Latitude"];
		$this->dam_Latitude->AdvancedSearch->SearchOperator = @$filter["z_dam_Latitude"];
		$this->dam_Latitude->AdvancedSearch->SearchCondition = @$filter["v_dam_Latitude"];
		$this->dam_Latitude->AdvancedSearch->SearchValue2 = @$filter["y_dam_Latitude"];
		$this->dam_Latitude->AdvancedSearch->SearchOperator2 = @$filter["w_dam_Latitude"];
		$this->dam_Latitude->AdvancedSearch->save();

		// Field Year_of_Completion
		$this->Year_of_Completion->AdvancedSearch->SearchValue = @$filter["x_Year_of_Completion"];
		$this->Year_of_Completion->AdvancedSearch->SearchOperator = @$filter["z_Year_of_Completion"];
		$this->Year_of_Completion->AdvancedSearch->SearchCondition = @$filter["v_Year_of_Completion"];
		$this->Year_of_Completion->AdvancedSearch->SearchValue2 = @$filter["y_Year_of_Completion"];
		$this->Year_of_Completion->AdvancedSearch->SearchOperator2 = @$filter["w_Year_of_Completion"];
		$this->Year_of_Completion->AdvancedSearch->save();

		// Field Basin
		$this->Basin->AdvancedSearch->SearchValue = @$filter["x_Basin"];
		$this->Basin->AdvancedSearch->SearchOperator = @$filter["z_Basin"];
		$this->Basin->AdvancedSearch->SearchCondition = @$filter["v_Basin"];
		$this->Basin->AdvancedSearch->SearchValue2 = @$filter["y_Basin"];
		$this->Basin->AdvancedSearch->SearchOperator2 = @$filter["w_Basin"];
		$this->Basin->AdvancedSearch->save();

		// Field Sub-Basin
		$this->Sub_Basin->AdvancedSearch->SearchValue = @$filter["x_Sub_Basin"];
		$this->Sub_Basin->AdvancedSearch->SearchOperator = @$filter["z_Sub_Basin"];
		$this->Sub_Basin->AdvancedSearch->SearchCondition = @$filter["v_Sub_Basin"];
		$this->Sub_Basin->AdvancedSearch->SearchValue2 = @$filter["y_Sub_Basin"];
		$this->Sub_Basin->AdvancedSearch->SearchOperator2 = @$filter["w_Sub_Basin"];
		$this->Sub_Basin->AdvancedSearch->save();

		// Field district
		$this->district->AdvancedSearch->SearchValue = @$filter["x_district"];
		$this->district->AdvancedSearch->SearchOperator = @$filter["z_district"];
		$this->district->AdvancedSearch->SearchCondition = @$filter["v_district"];
		$this->district->AdvancedSearch->SearchValue2 = @$filter["y_district"];
		$this->district->AdvancedSearch->SearchOperator2 = @$filter["w_district"];
		$this->district->AdvancedSearch->save();

		// Field Taluka
		$this->Taluka->AdvancedSearch->SearchValue = @$filter["x_Taluka"];
		$this->Taluka->AdvancedSearch->SearchOperator = @$filter["z_Taluka"];
		$this->Taluka->AdvancedSearch->SearchCondition = @$filter["v_Taluka"];
		$this->Taluka->AdvancedSearch->SearchValue2 = @$filter["y_Taluka"];
		$this->Taluka->AdvancedSearch->SearchOperator2 = @$filter["w_Taluka"];
		$this->Taluka->AdvancedSearch->save();

		// Field River
		$this->River->AdvancedSearch->SearchValue = @$filter["x_River"];
		$this->River->AdvancedSearch->SearchOperator = @$filter["z_River"];
		$this->River->AdvancedSearch->SearchCondition = @$filter["v_River"];
		$this->River->AdvancedSearch->SearchValue2 = @$filter["y_River"];
		$this->River->AdvancedSearch->SearchOperator2 = @$filter["w_River"];
		$this->River->AdvancedSearch->save();

		// Field Neareast_City
		$this->Neareast_City->AdvancedSearch->SearchValue = @$filter["x_Neareast_City"];
		$this->Neareast_City->AdvancedSearch->SearchOperator = @$filter["z_Neareast_City"];
		$this->Neareast_City->AdvancedSearch->SearchCondition = @$filter["v_Neareast_City"];
		$this->Neareast_City->AdvancedSearch->SearchValue2 = @$filter["y_Neareast_City"];
		$this->Neareast_City->AdvancedSearch->SearchOperator2 = @$filter["w_Neareast_City"];
		$this->Neareast_City->AdvancedSearch->save();

		// Field dam_construction_type
		$this->dam_construction_type->AdvancedSearch->SearchValue = @$filter["x_dam_construction_type"];
		$this->dam_construction_type->AdvancedSearch->SearchOperator = @$filter["z_dam_construction_type"];
		$this->dam_construction_type->AdvancedSearch->SearchCondition = @$filter["v_dam_construction_type"];
		$this->dam_construction_type->AdvancedSearch->SearchValue2 = @$filter["y_dam_construction_type"];
		$this->dam_construction_type->AdvancedSearch->SearchOperator2 = @$filter["w_dam_construction_type"];
		$this->dam_construction_type->AdvancedSearch->save();

		// Field Height_above_Lowest_Foundation_Level_in_mtr
		$this->Height_above_Lowest_Foundation_Level_in_mtr->AdvancedSearch->SearchValue = @$filter["x_Height_above_Lowest_Foundation_Level_in_mtr"];
		$this->Height_above_Lowest_Foundation_Level_in_mtr->AdvancedSearch->SearchOperator = @$filter["z_Height_above_Lowest_Foundation_Level_in_mtr"];
		$this->Height_above_Lowest_Foundation_Level_in_mtr->AdvancedSearch->SearchCondition = @$filter["v_Height_above_Lowest_Foundation_Level_in_mtr"];
		$this->Height_above_Lowest_Foundation_Level_in_mtr->AdvancedSearch->SearchValue2 = @$filter["y_Height_above_Lowest_Foundation_Level_in_mtr"];
		$this->Height_above_Lowest_Foundation_Level_in_mtr->AdvancedSearch->SearchOperator2 = @$filter["w_Height_above_Lowest_Foundation_Level_in_mtr"];
		$this->Height_above_Lowest_Foundation_Level_in_mtr->AdvancedSearch->save();

		// Field Length_of_Dam_in_mtr
		$this->Length_of_Dam_in_mtr->AdvancedSearch->SearchValue = @$filter["x_Length_of_Dam_in_mtr"];
		$this->Length_of_Dam_in_mtr->AdvancedSearch->SearchOperator = @$filter["z_Length_of_Dam_in_mtr"];
		$this->Length_of_Dam_in_mtr->AdvancedSearch->SearchCondition = @$filter["v_Length_of_Dam_in_mtr"];
		$this->Length_of_Dam_in_mtr->AdvancedSearch->SearchValue2 = @$filter["y_Length_of_Dam_in_mtr"];
		$this->Length_of_Dam_in_mtr->AdvancedSearch->SearchOperator2 = @$filter["w_Length_of_Dam_in_mtr"];
		$this->Length_of_Dam_in_mtr->AdvancedSearch->save();

		// Field Volume_Content_of_Dam_in_MCM
		$this->Volume_Content_of_Dam_in_MCM->AdvancedSearch->SearchValue = @$filter["x_Volume_Content_of_Dam_in_MCM"];
		$this->Volume_Content_of_Dam_in_MCM->AdvancedSearch->SearchOperator = @$filter["z_Volume_Content_of_Dam_in_MCM"];
		$this->Volume_Content_of_Dam_in_MCM->AdvancedSearch->SearchCondition = @$filter["v_Volume_Content_of_Dam_in_MCM"];
		$this->Volume_Content_of_Dam_in_MCM->AdvancedSearch->SearchValue2 = @$filter["y_Volume_Content_of_Dam_in_MCM"];
		$this->Volume_Content_of_Dam_in_MCM->AdvancedSearch->SearchOperator2 = @$filter["w_Volume_Content_of_Dam_in_MCM"];
		$this->Volume_Content_of_Dam_in_MCM->AdvancedSearch->save();

		// Field Gross_Storage_Capacity_of_Dam_in_MCM
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->AdvancedSearch->SearchValue = @$filter["x_Gross_Storage_Capacity_of_Dam_in_MCM"];
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->AdvancedSearch->SearchOperator = @$filter["z_Gross_Storage_Capacity_of_Dam_in_MCM"];
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->AdvancedSearch->SearchCondition = @$filter["v_Gross_Storage_Capacity_of_Dam_in_MCM"];
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->AdvancedSearch->SearchValue2 = @$filter["y_Gross_Storage_Capacity_of_Dam_in_MCM"];
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->AdvancedSearch->SearchOperator2 = @$filter["w_Gross_Storage_Capacity_of_Dam_in_MCM"];
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->AdvancedSearch->save();

		// Field Reservoir_Area_in_sq_km
		$this->Reservoir_Area_in_sq_km->AdvancedSearch->SearchValue = @$filter["x_Reservoir_Area_in_sq_km"];
		$this->Reservoir_Area_in_sq_km->AdvancedSearch->SearchOperator = @$filter["z_Reservoir_Area_in_sq_km"];
		$this->Reservoir_Area_in_sq_km->AdvancedSearch->SearchCondition = @$filter["v_Reservoir_Area_in_sq_km"];
		$this->Reservoir_Area_in_sq_km->AdvancedSearch->SearchValue2 = @$filter["y_Reservoir_Area_in_sq_km"];
		$this->Reservoir_Area_in_sq_km->AdvancedSearch->SearchOperator2 = @$filter["w_Reservoir_Area_in_sq_km"];
		$this->Reservoir_Area_in_sq_km->AdvancedSearch->save();

		// Field Effective_Storage_Capacity_in_MCM
		$this->Effective_Storage_Capacity_in_MCM->AdvancedSearch->SearchValue = @$filter["x_Effective_Storage_Capacity_in_MCM"];
		$this->Effective_Storage_Capacity_in_MCM->AdvancedSearch->SearchOperator = @$filter["z_Effective_Storage_Capacity_in_MCM"];
		$this->Effective_Storage_Capacity_in_MCM->AdvancedSearch->SearchCondition = @$filter["v_Effective_Storage_Capacity_in_MCM"];
		$this->Effective_Storage_Capacity_in_MCM->AdvancedSearch->SearchValue2 = @$filter["y_Effective_Storage_Capacity_in_MCM"];
		$this->Effective_Storage_Capacity_in_MCM->AdvancedSearch->SearchOperator2 = @$filter["w_Effective_Storage_Capacity_in_MCM"];
		$this->Effective_Storage_Capacity_in_MCM->AdvancedSearch->save();

		// Field Purpose
		$this->Purpose->AdvancedSearch->SearchValue = @$filter["x_Purpose"];
		$this->Purpose->AdvancedSearch->SearchOperator = @$filter["z_Purpose"];
		$this->Purpose->AdvancedSearch->SearchCondition = @$filter["v_Purpose"];
		$this->Purpose->AdvancedSearch->SearchValue2 = @$filter["y_Purpose"];
		$this->Purpose->AdvancedSearch->SearchOperator2 = @$filter["w_Purpose"];
		$this->Purpose->AdvancedSearch->save();

		// Field Designed_Spillway_Capacity_in_M3_per_sec
		$this->Designed_Spillway_Capacity_in_M3_per_sec->AdvancedSearch->SearchValue = @$filter["x_Designed_Spillway_Capacity_in_M3_per_sec"];
		$this->Designed_Spillway_Capacity_in_M3_per_sec->AdvancedSearch->SearchOperator = @$filter["z_Designed_Spillway_Capacity_in_M3_per_sec"];
		$this->Designed_Spillway_Capacity_in_M3_per_sec->AdvancedSearch->SearchCondition = @$filter["v_Designed_Spillway_Capacity_in_M3_per_sec"];
		$this->Designed_Spillway_Capacity_in_M3_per_sec->AdvancedSearch->SearchValue2 = @$filter["y_Designed_Spillway_Capacity_in_M3_per_sec"];
		$this->Designed_Spillway_Capacity_in_M3_per_sec->AdvancedSearch->SearchOperator2 = @$filter["w_Designed_Spillway_Capacity_in_M3_per_sec"];
		$this->Designed_Spillway_Capacity_in_M3_per_sec->AdvancedSearch->save();

		// Field dam_construction_type_ID
		$this->dam_construction_type_ID->AdvancedSearch->SearchValue = @$filter["x_dam_construction_type_ID"];
		$this->dam_construction_type_ID->AdvancedSearch->SearchOperator = @$filter["z_dam_construction_type_ID"];
		$this->dam_construction_type_ID->AdvancedSearch->SearchCondition = @$filter["v_dam_construction_type_ID"];
		$this->dam_construction_type_ID->AdvancedSearch->SearchValue2 = @$filter["y_dam_construction_type_ID"];
		$this->dam_construction_type_ID->AdvancedSearch->SearchOperator2 = @$filter["w_dam_construction_type_ID"];
		$this->dam_construction_type_ID->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->PIC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->kpcl_ID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Name_of_Dam, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->kpcl_dam_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Ops_ID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->dam_size_type_ID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Year_of_Completion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Basin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sub_Basin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->district, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Taluka, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->River, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Neareast_City, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->dam_construction_type, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Purpose, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->dam_construction_type_ID, $arKeywords, $type);
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

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();
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
			$this->updateSort($this->SrNo, $ctrl); // SrNo
			$this->updateSort($this->PIC, $ctrl); // PIC
			$this->updateSort($this->kpcl_ID, $ctrl); // kpcl_ID
			$this->updateSort($this->Name_of_Dam, $ctrl); // Name_of_Dam
			$this->updateSort($this->kpcl_dam_name, $ctrl); // kpcl_dam_name
			$this->updateSort($this->Ops_ID, $ctrl); // Ops_ID
			$this->updateSort($this->dam_size_type_ID, $ctrl); // dam_size_type_ID
			$this->updateSort($this->dam_Longitude, $ctrl); // dam_Longitude
			$this->updateSort($this->dam_Latitude, $ctrl); // dam_Latitude
			$this->updateSort($this->Year_of_Completion, $ctrl); // Year_of_Completion
			$this->updateSort($this->Basin, $ctrl); // Basin
			$this->updateSort($this->Sub_Basin, $ctrl); // Sub-Basin
			$this->updateSort($this->district, $ctrl); // district
			$this->updateSort($this->Taluka, $ctrl); // Taluka
			$this->updateSort($this->River, $ctrl); // River
			$this->updateSort($this->Neareast_City, $ctrl); // Neareast_City
			$this->updateSort($this->dam_construction_type, $ctrl); // dam_construction_type
			$this->updateSort($this->Height_above_Lowest_Foundation_Level_in_mtr, $ctrl); // Height_above_Lowest_Foundation_Level_in_mtr
			$this->updateSort($this->Length_of_Dam_in_mtr, $ctrl); // Length_of_Dam_in_mtr
			$this->updateSort($this->Volume_Content_of_Dam_in_MCM, $ctrl); // Volume_Content_of_Dam_in_MCM
			$this->updateSort($this->Gross_Storage_Capacity_of_Dam_in_MCM, $ctrl); // Gross_Storage_Capacity_of_Dam_in_MCM
			$this->updateSort($this->Reservoir_Area_in_sq_km, $ctrl); // Reservoir_Area_in_sq_km
			$this->updateSort($this->Effective_Storage_Capacity_in_MCM, $ctrl); // Effective_Storage_Capacity_in_MCM
			$this->updateSort($this->Purpose, $ctrl); // Purpose
			$this->updateSort($this->Designed_Spillway_Capacity_in_M3_per_sec, $ctrl); // Designed_Spillway_Capacity_in_M3_per_sec
			$this->updateSort($this->dam_construction_type_ID, $ctrl); // dam_construction_type_ID
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
				$this->SrNo->setSort("");
				$this->PIC->setSort("");
				$this->kpcl_ID->setSort("");
				$this->Name_of_Dam->setSort("");
				$this->kpcl_dam_name->setSort("");
				$this->Ops_ID->setSort("");
				$this->dam_size_type_ID->setSort("");
				$this->dam_Longitude->setSort("");
				$this->dam_Latitude->setSort("");
				$this->Year_of_Completion->setSort("");
				$this->Basin->setSort("");
				$this->Sub_Basin->setSort("");
				$this->district->setSort("");
				$this->Taluka->setSort("");
				$this->River->setSort("");
				$this->Neareast_City->setSort("");
				$this->dam_construction_type->setSort("");
				$this->Height_above_Lowest_Foundation_Level_in_mtr->setSort("");
				$this->Length_of_Dam_in_mtr->setSort("");
				$this->Volume_Content_of_Dam_in_MCM->setSort("");
				$this->Gross_Storage_Capacity_of_Dam_in_MCM->setSort("");
				$this->Reservoir_Area_in_sq_km->setSort("");
				$this->Effective_Storage_Capacity_in_MCM->setSort("");
				$this->Purpose->setSort("");
				$this->Designed_Spillway_Capacity_in_M3_per_sec->setSort("");
				$this->dam_construction_type_ID->setSort("");
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

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
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

		// "edit"
		$opt = $this->ListOptions["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = $this->ListOptions["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";

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
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->PIC->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fmaster_damslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fmaster_damslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fmaster_damslist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), FALSE);
		if ($this->BasicSearch->Keyword != "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), FALSE);
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
		$row = [];
		$row['SrNo'] = NULL;
		$row['PIC'] = NULL;
		$row['kpcl_ID'] = NULL;
		$row['Name_of_Dam'] = NULL;
		$row['kpcl_dam_name'] = NULL;
		$row['Ops_ID'] = NULL;
		$row['dam_size_type_ID'] = NULL;
		$row['dam_Longitude'] = NULL;
		$row['dam_Latitude'] = NULL;
		$row['Year_of_Completion'] = NULL;
		$row['Basin'] = NULL;
		$row['Sub-Basin'] = NULL;
		$row['district'] = NULL;
		$row['Taluka'] = NULL;
		$row['River'] = NULL;
		$row['Neareast_City'] = NULL;
		$row['dam_construction_type'] = NULL;
		$row['Height_above_Lowest_Foundation_Level_in_mtr'] = NULL;
		$row['Length_of_Dam_in_mtr'] = NULL;
		$row['Volume_Content_of_Dam_in_MCM'] = NULL;
		$row['Gross_Storage_Capacity_of_Dam_in_MCM'] = NULL;
		$row['Reservoir_Area_in_sq_km'] = NULL;
		$row['Effective_Storage_Capacity_in_MCM'] = NULL;
		$row['Purpose'] = NULL;
		$row['Designed_Spillway_Capacity_in_M3_per_sec'] = NULL;
		$row['dam_construction_type_ID'] = NULL;
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

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
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fmaster_damslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fmaster_damslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fmaster_damslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_master_dams" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_master_dams\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fmaster_damslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fmaster_damslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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