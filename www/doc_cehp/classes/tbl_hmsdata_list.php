<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_hmsdata_list extends tbl_hmsdata
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_hmsdata';

	// Page object name
	public $PageObjName = "tbl_hmsdata_list";

	// Grid form hidden field names
	public $FormName = "ftbl_hmsdatalist";
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

		// Table object (tbl_hmsdata)
		if (!isset($GLOBALS["tbl_hmsdata"]) || get_class($GLOBALS["tbl_hmsdata"]) == PROJECT_NAMESPACE . "tbl_hmsdata") {
			$GLOBALS["tbl_hmsdata"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tbl_hmsdata"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "tbl_hmsdataadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "tbl_hmsdatadelete.php";
		$this->MultiUpdateUrl = "tbl_hmsdataupdate.php";

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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
		$this->FilterOptions->TagClassName = "ew-filter-option ftbl_hmsdatalistsrch";

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
		$this->Slno->setVisibility();
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
		$this->Temp_water_in_pan_inC_830AM->FormValue = ""; // Clear form value
		$this->Temp_water_in_pan_inC_530PM->FormValue = ""; // Clear form value
		$this->App_Evaporation_inMM_830AM->FormValue = ""; // Clear form value
		$this->App_Evaporation_inMM_530PM->FormValue = ""; // Clear form value
		$this->Rainfall_inMM_830AM->FormValue = ""; // Clear form value
		$this->Rainfall_inMM_530PM->FormValue = ""; // Clear form value
		$this->Evaporation_curing_inMM_830AM->FormValue = ""; // Clear form value
		$this->Evaporation_curing_inMM_530PM->FormValue = ""; // Clear form value
		$this->Evaporation_curing_DaywithRain_inMM->FormValue = ""; // Clear form value
		$this->Evaporation_curing_DaywithNoRain_inMM->FormValue = ""; // Clear form value
		$this->Dry_Bulb_Temp_inC_830AM->FormValue = ""; // Clear form value
		$this->Wet_Bulb_Temp_inC_830AM->FormValue = ""; // Clear form value
		$this->Vapour_Temp_inC_830AM->FormValue = ""; // Clear form value
		$this->Dry_Bulb_Temp_inC_530PM->FormValue = ""; // Clear form value
		$this->Wet_Bulb_Temp_inC_530PM->FormValue = ""; // Clear form value
		$this->Vapour_Temp_inC_530PM->FormValue = ""; // Clear form value
		$this->Max_Temp_inC->FormValue = ""; // Clear form value
		$this->Min_Temp_inC->FormValue = ""; // Clear form value
		$this->Total_Wind_Run_inKM_830AM->FormValue = ""; // Clear form value
		$this->Total_Wind_Run_inKM_530PM->FormValue = ""; // Clear form value
		$this->Average_Wind_Speed_inKM->FormValue = ""; // Clear form value
		$this->Number_of_Hours_of_Brightsuned->FormValue = ""; // Clear form value
		$this->Relative_Humidity_in_Precentage_830AM->FormValue = ""; // Clear form value
		$this->Relative_Humidity_in_Precentage_530PM->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_obs_DateTime") && $CurrentForm->hasValue("o_obs_DateTime") && $this->obs_DateTime->CurrentValue != $this->obs_DateTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Temp_water_in_pan_inC_830AM") && $CurrentForm->hasValue("o_Temp_water_in_pan_inC_830AM") && $this->Temp_water_in_pan_inC_830AM->CurrentValue != $this->Temp_water_in_pan_inC_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Temp_water_in_pan_inC_530PM") && $CurrentForm->hasValue("o_Temp_water_in_pan_inC_530PM") && $this->Temp_water_in_pan_inC_530PM->CurrentValue != $this->Temp_water_in_pan_inC_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_App_Evaporation_inMM_830AM") && $CurrentForm->hasValue("o_App_Evaporation_inMM_830AM") && $this->App_Evaporation_inMM_830AM->CurrentValue != $this->App_Evaporation_inMM_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_App_Evaporation_inMM_530PM") && $CurrentForm->hasValue("o_App_Evaporation_inMM_530PM") && $this->App_Evaporation_inMM_530PM->CurrentValue != $this->App_Evaporation_inMM_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Rainfall_inMM_830AM") && $CurrentForm->hasValue("o_Rainfall_inMM_830AM") && $this->Rainfall_inMM_830AM->CurrentValue != $this->Rainfall_inMM_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Rainfall_inMM_530PM") && $CurrentForm->hasValue("o_Rainfall_inMM_530PM") && $this->Rainfall_inMM_530PM->CurrentValue != $this->Rainfall_inMM_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Evaporation_curing_inMM_830AM") && $CurrentForm->hasValue("o_Evaporation_curing_inMM_830AM") && $this->Evaporation_curing_inMM_830AM->CurrentValue != $this->Evaporation_curing_inMM_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Evaporation_curing_inMM_530PM") && $CurrentForm->hasValue("o_Evaporation_curing_inMM_530PM") && $this->Evaporation_curing_inMM_530PM->CurrentValue != $this->Evaporation_curing_inMM_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Evaporation_curing_DaywithRain_inMM") && $CurrentForm->hasValue("o_Evaporation_curing_DaywithRain_inMM") && $this->Evaporation_curing_DaywithRain_inMM->CurrentValue != $this->Evaporation_curing_DaywithRain_inMM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Evaporation_curing_DaywithNoRain_inMM") && $CurrentForm->hasValue("o_Evaporation_curing_DaywithNoRain_inMM") && $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue != $this->Evaporation_curing_DaywithNoRain_inMM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Dry_Bulb_Temp_inC_830AM") && $CurrentForm->hasValue("o_Dry_Bulb_Temp_inC_830AM") && $this->Dry_Bulb_Temp_inC_830AM->CurrentValue != $this->Dry_Bulb_Temp_inC_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Wet_Bulb_Temp_inC_830AM") && $CurrentForm->hasValue("o_Wet_Bulb_Temp_inC_830AM") && $this->Wet_Bulb_Temp_inC_830AM->CurrentValue != $this->Wet_Bulb_Temp_inC_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Vapour_Temp_inC_830AM") && $CurrentForm->hasValue("o_Vapour_Temp_inC_830AM") && $this->Vapour_Temp_inC_830AM->CurrentValue != $this->Vapour_Temp_inC_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Dry_Bulb_Temp_inC_530PM") && $CurrentForm->hasValue("o_Dry_Bulb_Temp_inC_530PM") && $this->Dry_Bulb_Temp_inC_530PM->CurrentValue != $this->Dry_Bulb_Temp_inC_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Wet_Bulb_Temp_inC_530PM") && $CurrentForm->hasValue("o_Wet_Bulb_Temp_inC_530PM") && $this->Wet_Bulb_Temp_inC_530PM->CurrentValue != $this->Wet_Bulb_Temp_inC_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Vapour_Temp_inC_530PM") && $CurrentForm->hasValue("o_Vapour_Temp_inC_530PM") && $this->Vapour_Temp_inC_530PM->CurrentValue != $this->Vapour_Temp_inC_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Max_Temp_inC") && $CurrentForm->hasValue("o_Max_Temp_inC") && $this->Max_Temp_inC->CurrentValue != $this->Max_Temp_inC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Min_Temp_inC") && $CurrentForm->hasValue("o_Min_Temp_inC") && $this->Min_Temp_inC->CurrentValue != $this->Min_Temp_inC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Total_Wind_Run_inKM_830AM") && $CurrentForm->hasValue("o_Total_Wind_Run_inKM_830AM") && $this->Total_Wind_Run_inKM_830AM->CurrentValue != $this->Total_Wind_Run_inKM_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Total_Wind_Run_inKM_530PM") && $CurrentForm->hasValue("o_Total_Wind_Run_inKM_530PM") && $this->Total_Wind_Run_inKM_530PM->CurrentValue != $this->Total_Wind_Run_inKM_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Average_Wind_Speed_inKM") && $CurrentForm->hasValue("o_Average_Wind_Speed_inKM") && $this->Average_Wind_Speed_inKM->CurrentValue != $this->Average_Wind_Speed_inKM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Number_of_Hours_of_Brightsuned") && $CurrentForm->hasValue("o_Number_of_Hours_of_Brightsuned") && $this->Number_of_Hours_of_Brightsuned->CurrentValue != $this->Number_of_Hours_of_Brightsuned->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Relative_Humidity_in_Precentage_830AM") && $CurrentForm->hasValue("o_Relative_Humidity_in_Precentage_830AM") && $this->Relative_Humidity_in_Precentage_830AM->CurrentValue != $this->Relative_Humidity_in_Precentage_830AM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Relative_Humidity_in_Precentage_530PM") && $CurrentForm->hasValue("o_Relative_Humidity_in_Precentage_530PM") && $this->Relative_Humidity_in_Precentage_530PM->CurrentValue != $this->Relative_Humidity_in_Precentage_530PM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_obs_remarks") && $CurrentForm->hasValue("o_obs_remarks") && $this->obs_remarks->CurrentValue != $this->obs_remarks->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Status") && $CurrentForm->hasValue("o_Status") && $this->Status->CurrentValue != $this->Status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Validated") && $CurrentForm->hasValue("o_Validated") && $this->Validated->CurrentValue != $this->Validated->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_isFreeze") && $CurrentForm->hasValue("o_isFreeze") && ConvertToBool($this->isFreeze->CurrentValue) != ConvertToBool($this->isFreeze->OldValue))
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "ftbl_hmsdatalistsrch");
		$filterList = Concat($filterList, $this->Slno->AdvancedSearch->toJson(), ","); // Field Slno
		$filterList = Concat($filterList, $this->StationId->AdvancedSearch->toJson(), ","); // Field StationId
		$filterList = Concat($filterList, $this->obs_DateTime->AdvancedSearch->toJson(), ","); // Field obs_DateTime
		$filterList = Concat($filterList, $this->Temp_water_in_pan_inC_830AM->AdvancedSearch->toJson(), ","); // Field Temp_water_in_pan_inC_830AM
		$filterList = Concat($filterList, $this->Temp_water_in_pan_inC_530PM->AdvancedSearch->toJson(), ","); // Field Temp_water_in_pan_inC_530PM
		$filterList = Concat($filterList, $this->App_Evaporation_inMM_830AM->AdvancedSearch->toJson(), ","); // Field App_Evaporation_inMM_830AM
		$filterList = Concat($filterList, $this->App_Evaporation_inMM_530PM->AdvancedSearch->toJson(), ","); // Field App_Evaporation_inMM_530PM
		$filterList = Concat($filterList, $this->Rainfall_inMM_830AM->AdvancedSearch->toJson(), ","); // Field Rainfall_inMM_830AM
		$filterList = Concat($filterList, $this->Rainfall_inMM_530PM->AdvancedSearch->toJson(), ","); // Field Rainfall_inMM_530PM
		$filterList = Concat($filterList, $this->Evaporation_curing_inMM_830AM->AdvancedSearch->toJson(), ","); // Field Evaporation_curing_inMM_830AM
		$filterList = Concat($filterList, $this->Evaporation_curing_inMM_530PM->AdvancedSearch->toJson(), ","); // Field Evaporation_curing_inMM_530PM
		$filterList = Concat($filterList, $this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->toJson(), ","); // Field Evaporation_curing_DaywithRain_inMM
		$filterList = Concat($filterList, $this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->toJson(), ","); // Field Evaporation_curing_DaywithNoRain_inMM
		$filterList = Concat($filterList, $this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->toJson(), ","); // Field Dry_Bulb_Temp_inC_830AM
		$filterList = Concat($filterList, $this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->toJson(), ","); // Field Wet_Bulb_Temp_inC_830AM
		$filterList = Concat($filterList, $this->Vapour_Temp_inC_830AM->AdvancedSearch->toJson(), ","); // Field Vapour_Temp_inC_830AM
		$filterList = Concat($filterList, $this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->toJson(), ","); // Field Dry_Bulb_Temp_inC_530PM
		$filterList = Concat($filterList, $this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->toJson(), ","); // Field Wet_Bulb_Temp_inC_530PM
		$filterList = Concat($filterList, $this->Vapour_Temp_inC_530PM->AdvancedSearch->toJson(), ","); // Field Vapour_Temp_inC_530PM
		$filterList = Concat($filterList, $this->Max_Temp_inC->AdvancedSearch->toJson(), ","); // Field Max_Temp_inC
		$filterList = Concat($filterList, $this->Min_Temp_inC->AdvancedSearch->toJson(), ","); // Field Min_Temp_inC
		$filterList = Concat($filterList, $this->Total_Wind_Run_inKM_830AM->AdvancedSearch->toJson(), ","); // Field Total_Wind_Run_inKM_830AM
		$filterList = Concat($filterList, $this->Total_Wind_Run_inKM_530PM->AdvancedSearch->toJson(), ","); // Field Total_Wind_Run_inKM_530PM
		$filterList = Concat($filterList, $this->Average_Wind_Speed_inKM->AdvancedSearch->toJson(), ","); // Field Average_Wind_Speed_inKM
		$filterList = Concat($filterList, $this->Number_of_Hours_of_Brightsuned->AdvancedSearch->toJson(), ","); // Field Number_of_Hours_of_Brightsuned
		$filterList = Concat($filterList, $this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->toJson(), ","); // Field Relative_Humidity_in_Precentage_830AM
		$filterList = Concat($filterList, $this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->toJson(), ","); // Field Relative_Humidity_in_Precentage_530PM
		$filterList = Concat($filterList, $this->obs_remarks->AdvancedSearch->toJson(), ","); // Field obs_remarks
		$filterList = Concat($filterList, $this->Status->AdvancedSearch->toJson(), ","); // Field Status
		$filterList = Concat($filterList, $this->Validated->AdvancedSearch->toJson(), ","); // Field Validated
		$filterList = Concat($filterList, $this->isFreeze->AdvancedSearch->toJson(), ","); // Field isFreeze
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
			$UserProfile->setSearchFilters(CurrentUserName(), "ftbl_hmsdatalistsrch", $filters);
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

		// Field obs_DateTime
		$this->obs_DateTime->AdvancedSearch->SearchValue = @$filter["x_obs_DateTime"];
		$this->obs_DateTime->AdvancedSearch->SearchOperator = @$filter["z_obs_DateTime"];
		$this->obs_DateTime->AdvancedSearch->SearchCondition = @$filter["v_obs_DateTime"];
		$this->obs_DateTime->AdvancedSearch->SearchValue2 = @$filter["y_obs_DateTime"];
		$this->obs_DateTime->AdvancedSearch->SearchOperator2 = @$filter["w_obs_DateTime"];
		$this->obs_DateTime->AdvancedSearch->save();

		// Field Temp_water_in_pan_inC_830AM
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->SearchValue = @$filter["x_Temp_water_in_pan_inC_830AM"];
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->SearchOperator = @$filter["z_Temp_water_in_pan_inC_830AM"];
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->SearchCondition = @$filter["v_Temp_water_in_pan_inC_830AM"];
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->SearchValue2 = @$filter["y_Temp_water_in_pan_inC_830AM"];
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_Temp_water_in_pan_inC_830AM"];
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->save();

		// Field Temp_water_in_pan_inC_530PM
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->SearchValue = @$filter["x_Temp_water_in_pan_inC_530PM"];
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->SearchOperator = @$filter["z_Temp_water_in_pan_inC_530PM"];
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->SearchCondition = @$filter["v_Temp_water_in_pan_inC_530PM"];
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->SearchValue2 = @$filter["y_Temp_water_in_pan_inC_530PM"];
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_Temp_water_in_pan_inC_530PM"];
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->save();

		// Field App_Evaporation_inMM_830AM
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->SearchValue = @$filter["x_App_Evaporation_inMM_830AM"];
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->SearchOperator = @$filter["z_App_Evaporation_inMM_830AM"];
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->SearchCondition = @$filter["v_App_Evaporation_inMM_830AM"];
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->SearchValue2 = @$filter["y_App_Evaporation_inMM_830AM"];
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_App_Evaporation_inMM_830AM"];
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->save();

		// Field App_Evaporation_inMM_530PM
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->SearchValue = @$filter["x_App_Evaporation_inMM_530PM"];
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->SearchOperator = @$filter["z_App_Evaporation_inMM_530PM"];
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->SearchCondition = @$filter["v_App_Evaporation_inMM_530PM"];
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->SearchValue2 = @$filter["y_App_Evaporation_inMM_530PM"];
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_App_Evaporation_inMM_530PM"];
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->save();

		// Field Rainfall_inMM_830AM
		$this->Rainfall_inMM_830AM->AdvancedSearch->SearchValue = @$filter["x_Rainfall_inMM_830AM"];
		$this->Rainfall_inMM_830AM->AdvancedSearch->SearchOperator = @$filter["z_Rainfall_inMM_830AM"];
		$this->Rainfall_inMM_830AM->AdvancedSearch->SearchCondition = @$filter["v_Rainfall_inMM_830AM"];
		$this->Rainfall_inMM_830AM->AdvancedSearch->SearchValue2 = @$filter["y_Rainfall_inMM_830AM"];
		$this->Rainfall_inMM_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_Rainfall_inMM_830AM"];
		$this->Rainfall_inMM_830AM->AdvancedSearch->save();

		// Field Rainfall_inMM_530PM
		$this->Rainfall_inMM_530PM->AdvancedSearch->SearchValue = @$filter["x_Rainfall_inMM_530PM"];
		$this->Rainfall_inMM_530PM->AdvancedSearch->SearchOperator = @$filter["z_Rainfall_inMM_530PM"];
		$this->Rainfall_inMM_530PM->AdvancedSearch->SearchCondition = @$filter["v_Rainfall_inMM_530PM"];
		$this->Rainfall_inMM_530PM->AdvancedSearch->SearchValue2 = @$filter["y_Rainfall_inMM_530PM"];
		$this->Rainfall_inMM_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_Rainfall_inMM_530PM"];
		$this->Rainfall_inMM_530PM->AdvancedSearch->save();

		// Field Evaporation_curing_inMM_830AM
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->SearchValue = @$filter["x_Evaporation_curing_inMM_830AM"];
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->SearchOperator = @$filter["z_Evaporation_curing_inMM_830AM"];
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->SearchCondition = @$filter["v_Evaporation_curing_inMM_830AM"];
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->SearchValue2 = @$filter["y_Evaporation_curing_inMM_830AM"];
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_Evaporation_curing_inMM_830AM"];
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->save();

		// Field Evaporation_curing_inMM_530PM
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->SearchValue = @$filter["x_Evaporation_curing_inMM_530PM"];
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->SearchOperator = @$filter["z_Evaporation_curing_inMM_530PM"];
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->SearchCondition = @$filter["v_Evaporation_curing_inMM_530PM"];
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->SearchValue2 = @$filter["y_Evaporation_curing_inMM_530PM"];
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_Evaporation_curing_inMM_530PM"];
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->save();

		// Field Evaporation_curing_DaywithRain_inMM
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->SearchValue = @$filter["x_Evaporation_curing_DaywithRain_inMM"];
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->SearchOperator = @$filter["z_Evaporation_curing_DaywithRain_inMM"];
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->SearchCondition = @$filter["v_Evaporation_curing_DaywithRain_inMM"];
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->SearchValue2 = @$filter["y_Evaporation_curing_DaywithRain_inMM"];
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->SearchOperator2 = @$filter["w_Evaporation_curing_DaywithRain_inMM"];
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->save();

		// Field Evaporation_curing_DaywithNoRain_inMM
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->SearchValue = @$filter["x_Evaporation_curing_DaywithNoRain_inMM"];
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->SearchOperator = @$filter["z_Evaporation_curing_DaywithNoRain_inMM"];
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->SearchCondition = @$filter["v_Evaporation_curing_DaywithNoRain_inMM"];
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->SearchValue2 = @$filter["y_Evaporation_curing_DaywithNoRain_inMM"];
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->SearchOperator2 = @$filter["w_Evaporation_curing_DaywithNoRain_inMM"];
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->save();

		// Field Dry_Bulb_Temp_inC_830AM
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue = @$filter["x_Dry_Bulb_Temp_inC_830AM"];
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->SearchOperator = @$filter["z_Dry_Bulb_Temp_inC_830AM"];
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->SearchCondition = @$filter["v_Dry_Bulb_Temp_inC_830AM"];
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue2 = @$filter["y_Dry_Bulb_Temp_inC_830AM"];
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_Dry_Bulb_Temp_inC_830AM"];
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->save();

		// Field Wet_Bulb_Temp_inC_830AM
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue = @$filter["x_Wet_Bulb_Temp_inC_830AM"];
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->SearchOperator = @$filter["z_Wet_Bulb_Temp_inC_830AM"];
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->SearchCondition = @$filter["v_Wet_Bulb_Temp_inC_830AM"];
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue2 = @$filter["y_Wet_Bulb_Temp_inC_830AM"];
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_Wet_Bulb_Temp_inC_830AM"];
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->save();

		// Field Vapour_Temp_inC_830AM
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->SearchValue = @$filter["x_Vapour_Temp_inC_830AM"];
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->SearchOperator = @$filter["z_Vapour_Temp_inC_830AM"];
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->SearchCondition = @$filter["v_Vapour_Temp_inC_830AM"];
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->SearchValue2 = @$filter["y_Vapour_Temp_inC_830AM"];
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_Vapour_Temp_inC_830AM"];
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->save();

		// Field Dry_Bulb_Temp_inC_530PM
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue = @$filter["x_Dry_Bulb_Temp_inC_530PM"];
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->SearchOperator = @$filter["z_Dry_Bulb_Temp_inC_530PM"];
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->SearchCondition = @$filter["v_Dry_Bulb_Temp_inC_530PM"];
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue2 = @$filter["y_Dry_Bulb_Temp_inC_530PM"];
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_Dry_Bulb_Temp_inC_530PM"];
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->save();

		// Field Wet_Bulb_Temp_inC_530PM
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue = @$filter["x_Wet_Bulb_Temp_inC_530PM"];
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->SearchOperator = @$filter["z_Wet_Bulb_Temp_inC_530PM"];
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->SearchCondition = @$filter["v_Wet_Bulb_Temp_inC_530PM"];
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue2 = @$filter["y_Wet_Bulb_Temp_inC_530PM"];
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_Wet_Bulb_Temp_inC_530PM"];
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->save();

		// Field Vapour_Temp_inC_530PM
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->SearchValue = @$filter["x_Vapour_Temp_inC_530PM"];
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->SearchOperator = @$filter["z_Vapour_Temp_inC_530PM"];
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->SearchCondition = @$filter["v_Vapour_Temp_inC_530PM"];
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->SearchValue2 = @$filter["y_Vapour_Temp_inC_530PM"];
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_Vapour_Temp_inC_530PM"];
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->save();

		// Field Max_Temp_inC
		$this->Max_Temp_inC->AdvancedSearch->SearchValue = @$filter["x_Max_Temp_inC"];
		$this->Max_Temp_inC->AdvancedSearch->SearchOperator = @$filter["z_Max_Temp_inC"];
		$this->Max_Temp_inC->AdvancedSearch->SearchCondition = @$filter["v_Max_Temp_inC"];
		$this->Max_Temp_inC->AdvancedSearch->SearchValue2 = @$filter["y_Max_Temp_inC"];
		$this->Max_Temp_inC->AdvancedSearch->SearchOperator2 = @$filter["w_Max_Temp_inC"];
		$this->Max_Temp_inC->AdvancedSearch->save();

		// Field Min_Temp_inC
		$this->Min_Temp_inC->AdvancedSearch->SearchValue = @$filter["x_Min_Temp_inC"];
		$this->Min_Temp_inC->AdvancedSearch->SearchOperator = @$filter["z_Min_Temp_inC"];
		$this->Min_Temp_inC->AdvancedSearch->SearchCondition = @$filter["v_Min_Temp_inC"];
		$this->Min_Temp_inC->AdvancedSearch->SearchValue2 = @$filter["y_Min_Temp_inC"];
		$this->Min_Temp_inC->AdvancedSearch->SearchOperator2 = @$filter["w_Min_Temp_inC"];
		$this->Min_Temp_inC->AdvancedSearch->save();

		// Field Total_Wind_Run_inKM_830AM
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->SearchValue = @$filter["x_Total_Wind_Run_inKM_830AM"];
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->SearchOperator = @$filter["z_Total_Wind_Run_inKM_830AM"];
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->SearchCondition = @$filter["v_Total_Wind_Run_inKM_830AM"];
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->SearchValue2 = @$filter["y_Total_Wind_Run_inKM_830AM"];
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_Total_Wind_Run_inKM_830AM"];
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->save();

		// Field Total_Wind_Run_inKM_530PM
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->SearchValue = @$filter["x_Total_Wind_Run_inKM_530PM"];
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->SearchOperator = @$filter["z_Total_Wind_Run_inKM_530PM"];
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->SearchCondition = @$filter["v_Total_Wind_Run_inKM_530PM"];
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->SearchValue2 = @$filter["y_Total_Wind_Run_inKM_530PM"];
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_Total_Wind_Run_inKM_530PM"];
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->save();

		// Field Average_Wind_Speed_inKM
		$this->Average_Wind_Speed_inKM->AdvancedSearch->SearchValue = @$filter["x_Average_Wind_Speed_inKM"];
		$this->Average_Wind_Speed_inKM->AdvancedSearch->SearchOperator = @$filter["z_Average_Wind_Speed_inKM"];
		$this->Average_Wind_Speed_inKM->AdvancedSearch->SearchCondition = @$filter["v_Average_Wind_Speed_inKM"];
		$this->Average_Wind_Speed_inKM->AdvancedSearch->SearchValue2 = @$filter["y_Average_Wind_Speed_inKM"];
		$this->Average_Wind_Speed_inKM->AdvancedSearch->SearchOperator2 = @$filter["w_Average_Wind_Speed_inKM"];
		$this->Average_Wind_Speed_inKM->AdvancedSearch->save();

		// Field Number_of_Hours_of_Brightsuned
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->SearchValue = @$filter["x_Number_of_Hours_of_Brightsuned"];
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->SearchOperator = @$filter["z_Number_of_Hours_of_Brightsuned"];
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->SearchCondition = @$filter["v_Number_of_Hours_of_Brightsuned"];
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->SearchValue2 = @$filter["y_Number_of_Hours_of_Brightsuned"];
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->SearchOperator2 = @$filter["w_Number_of_Hours_of_Brightsuned"];
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->save();

		// Field Relative_Humidity_in_Precentage_830AM
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->SearchValue = @$filter["x_Relative_Humidity_in_Precentage_830AM"];
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->SearchOperator = @$filter["z_Relative_Humidity_in_Precentage_830AM"];
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->SearchCondition = @$filter["v_Relative_Humidity_in_Precentage_830AM"];
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->SearchValue2 = @$filter["y_Relative_Humidity_in_Precentage_830AM"];
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->SearchOperator2 = @$filter["w_Relative_Humidity_in_Precentage_830AM"];
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->save();

		// Field Relative_Humidity_in_Precentage_530PM
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->SearchValue = @$filter["x_Relative_Humidity_in_Precentage_530PM"];
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->SearchOperator = @$filter["z_Relative_Humidity_in_Precentage_530PM"];
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->SearchCondition = @$filter["v_Relative_Humidity_in_Precentage_530PM"];
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->SearchValue2 = @$filter["y_Relative_Humidity_in_Precentage_530PM"];
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->SearchOperator2 = @$filter["w_Relative_Humidity_in_Precentage_530PM"];
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->save();

		// Field obs_remarks
		$this->obs_remarks->AdvancedSearch->SearchValue = @$filter["x_obs_remarks"];
		$this->obs_remarks->AdvancedSearch->SearchOperator = @$filter["z_obs_remarks"];
		$this->obs_remarks->AdvancedSearch->SearchCondition = @$filter["v_obs_remarks"];
		$this->obs_remarks->AdvancedSearch->SearchValue2 = @$filter["y_obs_remarks"];
		$this->obs_remarks->AdvancedSearch->SearchOperator2 = @$filter["w_obs_remarks"];
		$this->obs_remarks->AdvancedSearch->save();

		// Field Status
		$this->Status->AdvancedSearch->SearchValue = @$filter["x_Status"];
		$this->Status->AdvancedSearch->SearchOperator = @$filter["z_Status"];
		$this->Status->AdvancedSearch->SearchCondition = @$filter["v_Status"];
		$this->Status->AdvancedSearch->SearchValue2 = @$filter["y_Status"];
		$this->Status->AdvancedSearch->SearchOperator2 = @$filter["w_Status"];
		$this->Status->AdvancedSearch->save();

		// Field Validated
		$this->Validated->AdvancedSearch->SearchValue = @$filter["x_Validated"];
		$this->Validated->AdvancedSearch->SearchOperator = @$filter["z_Validated"];
		$this->Validated->AdvancedSearch->SearchCondition = @$filter["v_Validated"];
		$this->Validated->AdvancedSearch->SearchValue2 = @$filter["y_Validated"];
		$this->Validated->AdvancedSearch->SearchOperator2 = @$filter["w_Validated"];
		$this->Validated->AdvancedSearch->save();

		// Field isFreeze
		$this->isFreeze->AdvancedSearch->SearchValue = @$filter["x_isFreeze"];
		$this->isFreeze->AdvancedSearch->SearchOperator = @$filter["z_isFreeze"];
		$this->isFreeze->AdvancedSearch->SearchCondition = @$filter["v_isFreeze"];
		$this->isFreeze->AdvancedSearch->SearchValue2 = @$filter["y_isFreeze"];
		$this->isFreeze->AdvancedSearch->SearchOperator2 = @$filter["w_isFreeze"];
		$this->isFreeze->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->obs_DateTime, $default, FALSE); // obs_DateTime
		$this->buildSearchSql($where, $this->Temp_water_in_pan_inC_830AM, $default, FALSE); // Temp_water_in_pan_inC_830AM
		$this->buildSearchSql($where, $this->Temp_water_in_pan_inC_530PM, $default, FALSE); // Temp_water_in_pan_inC_530PM
		$this->buildSearchSql($where, $this->App_Evaporation_inMM_830AM, $default, FALSE); // App_Evaporation_inMM_830AM
		$this->buildSearchSql($where, $this->App_Evaporation_inMM_530PM, $default, FALSE); // App_Evaporation_inMM_530PM
		$this->buildSearchSql($where, $this->Rainfall_inMM_830AM, $default, FALSE); // Rainfall_inMM_830AM
		$this->buildSearchSql($where, $this->Rainfall_inMM_530PM, $default, FALSE); // Rainfall_inMM_530PM
		$this->buildSearchSql($where, $this->Evaporation_curing_inMM_830AM, $default, FALSE); // Evaporation_curing_inMM_830AM
		$this->buildSearchSql($where, $this->Evaporation_curing_inMM_530PM, $default, FALSE); // Evaporation_curing_inMM_530PM
		$this->buildSearchSql($where, $this->Evaporation_curing_DaywithRain_inMM, $default, FALSE); // Evaporation_curing_DaywithRain_inMM
		$this->buildSearchSql($where, $this->Evaporation_curing_DaywithNoRain_inMM, $default, FALSE); // Evaporation_curing_DaywithNoRain_inMM
		$this->buildSearchSql($where, $this->Dry_Bulb_Temp_inC_830AM, $default, FALSE); // Dry_Bulb_Temp_inC_830AM
		$this->buildSearchSql($where, $this->Wet_Bulb_Temp_inC_830AM, $default, FALSE); // Wet_Bulb_Temp_inC_830AM
		$this->buildSearchSql($where, $this->Vapour_Temp_inC_830AM, $default, FALSE); // Vapour_Temp_inC_830AM
		$this->buildSearchSql($where, $this->Dry_Bulb_Temp_inC_530PM, $default, FALSE); // Dry_Bulb_Temp_inC_530PM
		$this->buildSearchSql($where, $this->Wet_Bulb_Temp_inC_530PM, $default, FALSE); // Wet_Bulb_Temp_inC_530PM
		$this->buildSearchSql($where, $this->Vapour_Temp_inC_530PM, $default, FALSE); // Vapour_Temp_inC_530PM
		$this->buildSearchSql($where, $this->Max_Temp_inC, $default, FALSE); // Max_Temp_inC
		$this->buildSearchSql($where, $this->Min_Temp_inC, $default, FALSE); // Min_Temp_inC
		$this->buildSearchSql($where, $this->Total_Wind_Run_inKM_830AM, $default, FALSE); // Total_Wind_Run_inKM_830AM
		$this->buildSearchSql($where, $this->Total_Wind_Run_inKM_530PM, $default, FALSE); // Total_Wind_Run_inKM_530PM
		$this->buildSearchSql($where, $this->Average_Wind_Speed_inKM, $default, FALSE); // Average_Wind_Speed_inKM
		$this->buildSearchSql($where, $this->Number_of_Hours_of_Brightsuned, $default, FALSE); // Number_of_Hours_of_Brightsuned
		$this->buildSearchSql($where, $this->Relative_Humidity_in_Precentage_830AM, $default, FALSE); // Relative_Humidity_in_Precentage_830AM
		$this->buildSearchSql($where, $this->Relative_Humidity_in_Precentage_530PM, $default, FALSE); // Relative_Humidity_in_Precentage_530PM
		$this->buildSearchSql($where, $this->obs_remarks, $default, FALSE); // obs_remarks
		$this->buildSearchSql($where, $this->Status, $default, FALSE); // Status
		$this->buildSearchSql($where, $this->Validated, $default, FALSE); // Validated
		$this->buildSearchSql($where, $this->isFreeze, $default, FALSE); // isFreeze

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->Slno->AdvancedSearch->save(); // Slno
			$this->StationId->AdvancedSearch->save(); // StationId
			$this->obs_DateTime->AdvancedSearch->save(); // obs_DateTime
			$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->save(); // Temp_water_in_pan_inC_830AM
			$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->save(); // Temp_water_in_pan_inC_530PM
			$this->App_Evaporation_inMM_830AM->AdvancedSearch->save(); // App_Evaporation_inMM_830AM
			$this->App_Evaporation_inMM_530PM->AdvancedSearch->save(); // App_Evaporation_inMM_530PM
			$this->Rainfall_inMM_830AM->AdvancedSearch->save(); // Rainfall_inMM_830AM
			$this->Rainfall_inMM_530PM->AdvancedSearch->save(); // Rainfall_inMM_530PM
			$this->Evaporation_curing_inMM_830AM->AdvancedSearch->save(); // Evaporation_curing_inMM_830AM
			$this->Evaporation_curing_inMM_530PM->AdvancedSearch->save(); // Evaporation_curing_inMM_530PM
			$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->save(); // Evaporation_curing_DaywithRain_inMM
			$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->save(); // Evaporation_curing_DaywithNoRain_inMM
			$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->save(); // Dry_Bulb_Temp_inC_830AM
			$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->save(); // Wet_Bulb_Temp_inC_830AM
			$this->Vapour_Temp_inC_830AM->AdvancedSearch->save(); // Vapour_Temp_inC_830AM
			$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->save(); // Dry_Bulb_Temp_inC_530PM
			$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->save(); // Wet_Bulb_Temp_inC_530PM
			$this->Vapour_Temp_inC_530PM->AdvancedSearch->save(); // Vapour_Temp_inC_530PM
			$this->Max_Temp_inC->AdvancedSearch->save(); // Max_Temp_inC
			$this->Min_Temp_inC->AdvancedSearch->save(); // Min_Temp_inC
			$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->save(); // Total_Wind_Run_inKM_830AM
			$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->save(); // Total_Wind_Run_inKM_530PM
			$this->Average_Wind_Speed_inKM->AdvancedSearch->save(); // Average_Wind_Speed_inKM
			$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->save(); // Number_of_Hours_of_Brightsuned
			$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->save(); // Relative_Humidity_in_Precentage_830AM
			$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->save(); // Relative_Humidity_in_Precentage_530PM
			$this->obs_remarks->AdvancedSearch->save(); // obs_remarks
			$this->Status->AdvancedSearch->save(); // Status
			$this->Validated->AdvancedSearch->save(); // Validated
			$this->isFreeze->AdvancedSearch->save(); // isFreeze
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
		$this->buildBasicSearchSql($where, $this->obs_remarks, $arKeywords, $type);
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
		if ($this->obs_DateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Temp_water_in_pan_inC_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Temp_water_in_pan_inC_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->App_Evaporation_inMM_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->App_Evaporation_inMM_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Rainfall_inMM_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Rainfall_inMM_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Evaporation_curing_inMM_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Evaporation_curing_inMM_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Vapour_Temp_inC_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Vapour_Temp_inC_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Max_Temp_inC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Min_Temp_inC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Total_Wind_Run_inKM_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Total_Wind_Run_inKM_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Average_Wind_Speed_inKM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Number_of_Hours_of_Brightsuned->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->obs_remarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Validated->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->isFreeze->AdvancedSearch->issetSession())
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
		$this->obs_DateTime->AdvancedSearch->unsetSession();
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->unsetSession();
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->unsetSession();
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->unsetSession();
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->unsetSession();
		$this->Rainfall_inMM_830AM->AdvancedSearch->unsetSession();
		$this->Rainfall_inMM_530PM->AdvancedSearch->unsetSession();
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->unsetSession();
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->unsetSession();
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->unsetSession();
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->unsetSession();
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->unsetSession();
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->unsetSession();
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->unsetSession();
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->unsetSession();
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->unsetSession();
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->unsetSession();
		$this->Max_Temp_inC->AdvancedSearch->unsetSession();
		$this->Min_Temp_inC->AdvancedSearch->unsetSession();
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->unsetSession();
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->unsetSession();
		$this->Average_Wind_Speed_inKM->AdvancedSearch->unsetSession();
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->unsetSession();
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->unsetSession();
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->unsetSession();
		$this->obs_remarks->AdvancedSearch->unsetSession();
		$this->Status->AdvancedSearch->unsetSession();
		$this->Validated->AdvancedSearch->unsetSession();
		$this->isFreeze->AdvancedSearch->unsetSession();
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
		$this->obs_DateTime->AdvancedSearch->load();
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->load();
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->load();
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->load();
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->load();
		$this->Rainfall_inMM_830AM->AdvancedSearch->load();
		$this->Rainfall_inMM_530PM->AdvancedSearch->load();
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->load();
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->load();
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->load();
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->load();
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->load();
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->load();
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->load();
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->load();
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->load();
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->load();
		$this->Max_Temp_inC->AdvancedSearch->load();
		$this->Min_Temp_inC->AdvancedSearch->load();
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->load();
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->load();
		$this->Average_Wind_Speed_inKM->AdvancedSearch->load();
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->load();
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->load();
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->load();
		$this->obs_remarks->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->Validated->AdvancedSearch->load();
		$this->isFreeze->AdvancedSearch->load();
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
			$this->updateSort($this->Slno, $ctrl); // Slno
			$this->updateSort($this->StationId, $ctrl); // StationId
			$this->updateSort($this->obs_DateTime, $ctrl); // obs_DateTime
			$this->updateSort($this->Temp_water_in_pan_inC_830AM, $ctrl); // Temp_water_in_pan_inC_830AM
			$this->updateSort($this->Temp_water_in_pan_inC_530PM, $ctrl); // Temp_water_in_pan_inC_530PM
			$this->updateSort($this->App_Evaporation_inMM_830AM, $ctrl); // App_Evaporation_inMM_830AM
			$this->updateSort($this->App_Evaporation_inMM_530PM, $ctrl); // App_Evaporation_inMM_530PM
			$this->updateSort($this->Rainfall_inMM_830AM, $ctrl); // Rainfall_inMM_830AM
			$this->updateSort($this->Rainfall_inMM_530PM, $ctrl); // Rainfall_inMM_530PM
			$this->updateSort($this->Evaporation_curing_inMM_830AM, $ctrl); // Evaporation_curing_inMM_830AM
			$this->updateSort($this->Evaporation_curing_inMM_530PM, $ctrl); // Evaporation_curing_inMM_530PM
			$this->updateSort($this->Evaporation_curing_DaywithRain_inMM, $ctrl); // Evaporation_curing_DaywithRain_inMM
			$this->updateSort($this->Evaporation_curing_DaywithNoRain_inMM, $ctrl); // Evaporation_curing_DaywithNoRain_inMM
			$this->updateSort($this->Dry_Bulb_Temp_inC_830AM, $ctrl); // Dry_Bulb_Temp_inC_830AM
			$this->updateSort($this->Wet_Bulb_Temp_inC_830AM, $ctrl); // Wet_Bulb_Temp_inC_830AM
			$this->updateSort($this->Vapour_Temp_inC_830AM, $ctrl); // Vapour_Temp_inC_830AM
			$this->updateSort($this->Dry_Bulb_Temp_inC_530PM, $ctrl); // Dry_Bulb_Temp_inC_530PM
			$this->updateSort($this->Wet_Bulb_Temp_inC_530PM, $ctrl); // Wet_Bulb_Temp_inC_530PM
			$this->updateSort($this->Vapour_Temp_inC_530PM, $ctrl); // Vapour_Temp_inC_530PM
			$this->updateSort($this->Max_Temp_inC, $ctrl); // Max_Temp_inC
			$this->updateSort($this->Min_Temp_inC, $ctrl); // Min_Temp_inC
			$this->updateSort($this->Total_Wind_Run_inKM_830AM, $ctrl); // Total_Wind_Run_inKM_830AM
			$this->updateSort($this->Total_Wind_Run_inKM_530PM, $ctrl); // Total_Wind_Run_inKM_530PM
			$this->updateSort($this->Average_Wind_Speed_inKM, $ctrl); // Average_Wind_Speed_inKM
			$this->updateSort($this->Number_of_Hours_of_Brightsuned, $ctrl); // Number_of_Hours_of_Brightsuned
			$this->updateSort($this->Relative_Humidity_in_Precentage_830AM, $ctrl); // Relative_Humidity_in_Precentage_830AM
			$this->updateSort($this->Relative_Humidity_in_Precentage_530PM, $ctrl); // Relative_Humidity_in_Precentage_530PM
			$this->updateSort($this->obs_remarks, $ctrl); // obs_remarks
			$this->updateSort($this->Status, $ctrl); // Status
			$this->updateSort($this->Validated, $ctrl); // Validated
			$this->updateSort($this->isFreeze, $ctrl); // isFreeze
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
				$this->Slno->setSort("");
				$this->StationId->setSort("");
				$this->obs_DateTime->setSort("");
				$this->Temp_water_in_pan_inC_830AM->setSort("");
				$this->Temp_water_in_pan_inC_530PM->setSort("");
				$this->App_Evaporation_inMM_830AM->setSort("");
				$this->App_Evaporation_inMM_530PM->setSort("");
				$this->Rainfall_inMM_830AM->setSort("");
				$this->Rainfall_inMM_530PM->setSort("");
				$this->Evaporation_curing_inMM_830AM->setSort("");
				$this->Evaporation_curing_inMM_530PM->setSort("");
				$this->Evaporation_curing_DaywithRain_inMM->setSort("");
				$this->Evaporation_curing_DaywithNoRain_inMM->setSort("");
				$this->Dry_Bulb_Temp_inC_830AM->setSort("");
				$this->Wet_Bulb_Temp_inC_830AM->setSort("");
				$this->Vapour_Temp_inC_830AM->setSort("");
				$this->Dry_Bulb_Temp_inC_530PM->setSort("");
				$this->Wet_Bulb_Temp_inC_530PM->setSort("");
				$this->Vapour_Temp_inC_530PM->setSort("");
				$this->Max_Temp_inC->setSort("");
				$this->Min_Temp_inC->setSort("");
				$this->Total_Wind_Run_inKM_830AM->setSort("");
				$this->Total_Wind_Run_inKM_530PM->setSort("");
				$this->Average_Wind_Speed_inKM->setSort("");
				$this->Number_of_Hours_of_Brightsuned->setSort("");
				$this->Relative_Humidity_in_Precentage_830AM->setSort("");
				$this->Relative_Humidity_in_Precentage_530PM->setSort("");
				$this->obs_remarks->setSort("");
				$this->Status->setSort("");
				$this->Validated->setSort("");
				$this->isFreeze->setSort("");
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
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
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
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();

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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"ftbl_hmsdatalistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"ftbl_hmsdatalistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.ftbl_hmsdatalist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
					$item->Visible = $Security->canAdd();
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
		$this->isFreeze->OldValue = $this->isFreeze->CurrentValue;
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

		// obs_DateTime
		if (!$this->isAddOrEdit() && $this->obs_DateTime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->obs_DateTime->AdvancedSearch->SearchValue != "" || $this->obs_DateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Temp_water_in_pan_inC_830AM
		if (!$this->isAddOrEdit() && $this->Temp_water_in_pan_inC_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Temp_water_in_pan_inC_830AM->AdvancedSearch->SearchValue != "" || $this->Temp_water_in_pan_inC_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Temp_water_in_pan_inC_530PM
		if (!$this->isAddOrEdit() && $this->Temp_water_in_pan_inC_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Temp_water_in_pan_inC_530PM->AdvancedSearch->SearchValue != "" || $this->Temp_water_in_pan_inC_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// App_Evaporation_inMM_830AM
		if (!$this->isAddOrEdit() && $this->App_Evaporation_inMM_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->App_Evaporation_inMM_830AM->AdvancedSearch->SearchValue != "" || $this->App_Evaporation_inMM_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// App_Evaporation_inMM_530PM
		if (!$this->isAddOrEdit() && $this->App_Evaporation_inMM_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->App_Evaporation_inMM_530PM->AdvancedSearch->SearchValue != "" || $this->App_Evaporation_inMM_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Rainfall_inMM_830AM
		if (!$this->isAddOrEdit() && $this->Rainfall_inMM_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Rainfall_inMM_830AM->AdvancedSearch->SearchValue != "" || $this->Rainfall_inMM_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Rainfall_inMM_530PM
		if (!$this->isAddOrEdit() && $this->Rainfall_inMM_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Rainfall_inMM_530PM->AdvancedSearch->SearchValue != "" || $this->Rainfall_inMM_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Evaporation_curing_inMM_830AM
		if (!$this->isAddOrEdit() && $this->Evaporation_curing_inMM_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Evaporation_curing_inMM_830AM->AdvancedSearch->SearchValue != "" || $this->Evaporation_curing_inMM_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Evaporation_curing_inMM_530PM
		if (!$this->isAddOrEdit() && $this->Evaporation_curing_inMM_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Evaporation_curing_inMM_530PM->AdvancedSearch->SearchValue != "" || $this->Evaporation_curing_inMM_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Evaporation_curing_DaywithRain_inMM
		if (!$this->isAddOrEdit() && $this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->SearchValue != "" || $this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Evaporation_curing_DaywithNoRain_inMM
		if (!$this->isAddOrEdit() && $this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->SearchValue != "" || $this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Dry_Bulb_Temp_inC_830AM
		if (!$this->isAddOrEdit() && $this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue != "" || $this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Wet_Bulb_Temp_inC_830AM
		if (!$this->isAddOrEdit() && $this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue != "" || $this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Vapour_Temp_inC_830AM
		if (!$this->isAddOrEdit() && $this->Vapour_Temp_inC_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Vapour_Temp_inC_830AM->AdvancedSearch->SearchValue != "" || $this->Vapour_Temp_inC_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Dry_Bulb_Temp_inC_530PM
		if (!$this->isAddOrEdit() && $this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue != "" || $this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Wet_Bulb_Temp_inC_530PM
		if (!$this->isAddOrEdit() && $this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue != "" || $this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Vapour_Temp_inC_530PM
		if (!$this->isAddOrEdit() && $this->Vapour_Temp_inC_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Vapour_Temp_inC_530PM->AdvancedSearch->SearchValue != "" || $this->Vapour_Temp_inC_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Max_Temp_inC
		if (!$this->isAddOrEdit() && $this->Max_Temp_inC->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Max_Temp_inC->AdvancedSearch->SearchValue != "" || $this->Max_Temp_inC->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Min_Temp_inC
		if (!$this->isAddOrEdit() && $this->Min_Temp_inC->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Min_Temp_inC->AdvancedSearch->SearchValue != "" || $this->Min_Temp_inC->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Total_Wind_Run_inKM_830AM
		if (!$this->isAddOrEdit() && $this->Total_Wind_Run_inKM_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Total_Wind_Run_inKM_830AM->AdvancedSearch->SearchValue != "" || $this->Total_Wind_Run_inKM_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Total_Wind_Run_inKM_530PM
		if (!$this->isAddOrEdit() && $this->Total_Wind_Run_inKM_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Total_Wind_Run_inKM_530PM->AdvancedSearch->SearchValue != "" || $this->Total_Wind_Run_inKM_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Average_Wind_Speed_inKM
		if (!$this->isAddOrEdit() && $this->Average_Wind_Speed_inKM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Average_Wind_Speed_inKM->AdvancedSearch->SearchValue != "" || $this->Average_Wind_Speed_inKM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Number_of_Hours_of_Brightsuned
		if (!$this->isAddOrEdit() && $this->Number_of_Hours_of_Brightsuned->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Number_of_Hours_of_Brightsuned->AdvancedSearch->SearchValue != "" || $this->Number_of_Hours_of_Brightsuned->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Relative_Humidity_in_Precentage_830AM
		if (!$this->isAddOrEdit() && $this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->SearchValue != "" || $this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Relative_Humidity_in_Precentage_530PM
		if (!$this->isAddOrEdit() && $this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->SearchValue != "" || $this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// obs_remarks
		if (!$this->isAddOrEdit() && $this->obs_remarks->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->obs_remarks->AdvancedSearch->SearchValue != "" || $this->obs_remarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Status
		if (!$this->isAddOrEdit() && $this->Status->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Status->AdvancedSearch->SearchValue != "" || $this->Status->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Validated
		if (!$this->isAddOrEdit() && $this->Validated->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Validated->AdvancedSearch->SearchValue != "" || $this->Validated->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// isFreeze
		if (!$this->isAddOrEdit() && $this->isFreeze->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->isFreeze->AdvancedSearch->SearchValue != "" || $this->isFreeze->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		if (is_array($this->isFreeze->AdvancedSearch->SearchValue))
			$this->isFreeze->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->isFreeze->AdvancedSearch->SearchValue);
		if (is_array($this->isFreeze->AdvancedSearch->SearchValue2))
			$this->isFreeze->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->isFreeze->AdvancedSearch->SearchValue2);
		return $got;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Slno' first before field var 'x_Slno'
		$val = $CurrentForm->hasValue("Slno") ? $CurrentForm->getValue("Slno") : $CurrentForm->getValue("x_Slno");
		if (!$this->Slno->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->Slno->setFormValue($val);

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
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->Slno->CurrentValue = $this->Slno->FormValue;
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

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

			// Slno
			$this->Slno->LinkCustomAttributes = "";
			$this->Slno->HrefValue = "";
			$this->Slno->TooltipValue = "";

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

			// Slno
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
			// Slno

			$this->Slno->LinkCustomAttributes = "";
			$this->Slno->HrefValue = "";

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// Slno
			$this->Slno->EditAttrs["class"] = "form-control";
			$this->Slno->EditCustomAttributes = "";
			$this->Slno->EditValue = $this->Slno->CurrentValue;
			$this->Slno->ViewCustomAttributes = "";

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

			// Edit refer script
			// Slno

			$this->Slno->LinkCustomAttributes = "";
			$this->Slno->HrefValue = "";

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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// Slno
			$this->Slno->EditAttrs["class"] = "form-control";
			$this->Slno->EditCustomAttributes = "";
			$this->Slno->EditValue = HtmlEncode($this->Slno->AdvancedSearch->SearchValue);

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

			// obs_DateTime
			$this->obs_DateTime->EditAttrs["class"] = "form-control";
			$this->obs_DateTime->EditCustomAttributes = "";
			$this->obs_DateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->obs_DateTime->AdvancedSearch->SearchValue, 7), 7));

			// Temp_water_in_pan_inC_830AM
			$this->Temp_water_in_pan_inC_830AM->EditAttrs["class"] = "form-control";
			$this->Temp_water_in_pan_inC_830AM->EditCustomAttributes = "";
			$this->Temp_water_in_pan_inC_830AM->EditValue = HtmlEncode($this->Temp_water_in_pan_inC_830AM->AdvancedSearch->SearchValue);

			// Temp_water_in_pan_inC_530PM
			$this->Temp_water_in_pan_inC_530PM->EditAttrs["class"] = "form-control";
			$this->Temp_water_in_pan_inC_530PM->EditCustomAttributes = "";
			$this->Temp_water_in_pan_inC_530PM->EditValue = HtmlEncode($this->Temp_water_in_pan_inC_530PM->AdvancedSearch->SearchValue);

			// App_Evaporation_inMM_830AM
			$this->App_Evaporation_inMM_830AM->EditAttrs["class"] = "form-control";
			$this->App_Evaporation_inMM_830AM->EditCustomAttributes = "";
			$this->App_Evaporation_inMM_830AM->EditValue = HtmlEncode($this->App_Evaporation_inMM_830AM->AdvancedSearch->SearchValue);

			// App_Evaporation_inMM_530PM
			$this->App_Evaporation_inMM_530PM->EditAttrs["class"] = "form-control";
			$this->App_Evaporation_inMM_530PM->EditCustomAttributes = "";
			$this->App_Evaporation_inMM_530PM->EditValue = HtmlEncode($this->App_Evaporation_inMM_530PM->AdvancedSearch->SearchValue);

			// Rainfall_inMM_830AM
			$this->Rainfall_inMM_830AM->EditAttrs["class"] = "form-control";
			$this->Rainfall_inMM_830AM->EditCustomAttributes = "";
			$this->Rainfall_inMM_830AM->EditValue = HtmlEncode($this->Rainfall_inMM_830AM->AdvancedSearch->SearchValue);

			// Rainfall_inMM_530PM
			$this->Rainfall_inMM_530PM->EditAttrs["class"] = "form-control";
			$this->Rainfall_inMM_530PM->EditCustomAttributes = "";
			$this->Rainfall_inMM_530PM->EditValue = HtmlEncode($this->Rainfall_inMM_530PM->AdvancedSearch->SearchValue);

			// Evaporation_curing_inMM_830AM
			$this->Evaporation_curing_inMM_830AM->EditAttrs["class"] = "form-control";
			$this->Evaporation_curing_inMM_830AM->EditCustomAttributes = "";
			$this->Evaporation_curing_inMM_830AM->EditValue = HtmlEncode($this->Evaporation_curing_inMM_830AM->AdvancedSearch->SearchValue);

			// Evaporation_curing_inMM_530PM
			$this->Evaporation_curing_inMM_530PM->EditAttrs["class"] = "form-control";
			$this->Evaporation_curing_inMM_530PM->EditCustomAttributes = "";
			$this->Evaporation_curing_inMM_530PM->EditValue = HtmlEncode($this->Evaporation_curing_inMM_530PM->AdvancedSearch->SearchValue);

			// Evaporation_curing_DaywithRain_inMM
			$this->Evaporation_curing_DaywithRain_inMM->EditAttrs["class"] = "form-control";
			$this->Evaporation_curing_DaywithRain_inMM->EditCustomAttributes = "";
			$this->Evaporation_curing_DaywithRain_inMM->EditValue = HtmlEncode($this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->SearchValue);

			// Evaporation_curing_DaywithNoRain_inMM
			$this->Evaporation_curing_DaywithNoRain_inMM->EditAttrs["class"] = "form-control";
			$this->Evaporation_curing_DaywithNoRain_inMM->EditCustomAttributes = "";
			$this->Evaporation_curing_DaywithNoRain_inMM->EditValue = HtmlEncode($this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->SearchValue);

			// Dry_Bulb_Temp_inC_830AM
			$this->Dry_Bulb_Temp_inC_830AM->EditAttrs["class"] = "form-control";
			$this->Dry_Bulb_Temp_inC_830AM->EditCustomAttributes = "";
			$this->Dry_Bulb_Temp_inC_830AM->EditValue = HtmlEncode($this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue);

			// Wet_Bulb_Temp_inC_830AM
			$this->Wet_Bulb_Temp_inC_830AM->EditAttrs["class"] = "form-control";
			$this->Wet_Bulb_Temp_inC_830AM->EditCustomAttributes = "";
			$this->Wet_Bulb_Temp_inC_830AM->EditValue = HtmlEncode($this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->SearchValue);

			// Vapour_Temp_inC_830AM
			$this->Vapour_Temp_inC_830AM->EditAttrs["class"] = "form-control";
			$this->Vapour_Temp_inC_830AM->EditCustomAttributes = "";
			$this->Vapour_Temp_inC_830AM->EditValue = HtmlEncode($this->Vapour_Temp_inC_830AM->AdvancedSearch->SearchValue);

			// Dry_Bulb_Temp_inC_530PM
			$this->Dry_Bulb_Temp_inC_530PM->EditAttrs["class"] = "form-control";
			$this->Dry_Bulb_Temp_inC_530PM->EditCustomAttributes = "";
			$this->Dry_Bulb_Temp_inC_530PM->EditValue = HtmlEncode($this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue);

			// Wet_Bulb_Temp_inC_530PM
			$this->Wet_Bulb_Temp_inC_530PM->EditAttrs["class"] = "form-control";
			$this->Wet_Bulb_Temp_inC_530PM->EditCustomAttributes = "";
			$this->Wet_Bulb_Temp_inC_530PM->EditValue = HtmlEncode($this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->SearchValue);

			// Vapour_Temp_inC_530PM
			$this->Vapour_Temp_inC_530PM->EditAttrs["class"] = "form-control";
			$this->Vapour_Temp_inC_530PM->EditCustomAttributes = "";
			$this->Vapour_Temp_inC_530PM->EditValue = HtmlEncode($this->Vapour_Temp_inC_530PM->AdvancedSearch->SearchValue);

			// Max_Temp_inC
			$this->Max_Temp_inC->EditAttrs["class"] = "form-control";
			$this->Max_Temp_inC->EditCustomAttributes = "";
			$this->Max_Temp_inC->EditValue = HtmlEncode($this->Max_Temp_inC->AdvancedSearch->SearchValue);

			// Min_Temp_inC
			$this->Min_Temp_inC->EditAttrs["class"] = "form-control";
			$this->Min_Temp_inC->EditCustomAttributes = "";
			$this->Min_Temp_inC->EditValue = HtmlEncode($this->Min_Temp_inC->AdvancedSearch->SearchValue);

			// Total_Wind_Run_inKM_830AM
			$this->Total_Wind_Run_inKM_830AM->EditAttrs["class"] = "form-control";
			$this->Total_Wind_Run_inKM_830AM->EditCustomAttributes = "";
			$this->Total_Wind_Run_inKM_830AM->EditValue = HtmlEncode($this->Total_Wind_Run_inKM_830AM->AdvancedSearch->SearchValue);

			// Total_Wind_Run_inKM_530PM
			$this->Total_Wind_Run_inKM_530PM->EditAttrs["class"] = "form-control";
			$this->Total_Wind_Run_inKM_530PM->EditCustomAttributes = "";
			$this->Total_Wind_Run_inKM_530PM->EditValue = HtmlEncode($this->Total_Wind_Run_inKM_530PM->AdvancedSearch->SearchValue);

			// Average_Wind_Speed_inKM
			$this->Average_Wind_Speed_inKM->EditAttrs["class"] = "form-control";
			$this->Average_Wind_Speed_inKM->EditCustomAttributes = "";
			$this->Average_Wind_Speed_inKM->EditValue = HtmlEncode($this->Average_Wind_Speed_inKM->AdvancedSearch->SearchValue);

			// Number_of_Hours_of_Brightsuned
			$this->Number_of_Hours_of_Brightsuned->EditAttrs["class"] = "form-control";
			$this->Number_of_Hours_of_Brightsuned->EditCustomAttributes = "";
			$this->Number_of_Hours_of_Brightsuned->EditValue = HtmlEncode($this->Number_of_Hours_of_Brightsuned->AdvancedSearch->SearchValue);

			// Relative_Humidity_in_Precentage_830AM
			$this->Relative_Humidity_in_Precentage_830AM->EditAttrs["class"] = "form-control";
			$this->Relative_Humidity_in_Precentage_830AM->EditCustomAttributes = "";
			$this->Relative_Humidity_in_Precentage_830AM->EditValue = HtmlEncode($this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->SearchValue);

			// Relative_Humidity_in_Precentage_530PM
			$this->Relative_Humidity_in_Precentage_530PM->EditAttrs["class"] = "form-control";
			$this->Relative_Humidity_in_Precentage_530PM->EditCustomAttributes = "";
			$this->Relative_Humidity_in_Precentage_530PM->EditValue = HtmlEncode($this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->SearchValue);

			// obs_remarks
			$this->obs_remarks->EditAttrs["class"] = "form-control";
			$this->obs_remarks->EditCustomAttributes = "";
			if (!$this->obs_remarks->Raw)
				$this->obs_remarks->AdvancedSearch->SearchValue = HtmlDecode($this->obs_remarks->AdvancedSearch->SearchValue);
			$this->obs_remarks->EditValue = HtmlEncode($this->obs_remarks->AdvancedSearch->SearchValue);

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = HtmlEncode($this->Status->AdvancedSearch->SearchValue);

			// Validated
			$this->Validated->EditAttrs["class"] = "form-control";
			$this->Validated->EditCustomAttributes = "";
			$this->Validated->EditValue = HtmlEncode($this->Validated->AdvancedSearch->SearchValue);

			// isFreeze
			$this->isFreeze->EditCustomAttributes = "";
			$this->isFreeze->EditValue = $this->isFreeze->options(FALSE);
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
		if ($this->Slno->Required) {
			if (!$this->Slno->IsDetailKey && $this->Slno->FormValue != NULL && $this->Slno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Slno->caption(), $this->Slno->RequiredErrorMessage));
			}
		}
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

			// StationId
			$this->StationId->setDbValueDef($rsnew, $this->StationId->CurrentValue, NULL, $this->StationId->ReadOnly);

			// obs_DateTime
			$this->obs_DateTime->setDbValueDef($rsnew, UnFormatDateTime($this->obs_DateTime->CurrentValue, 7), NULL, $this->obs_DateTime->ReadOnly);

			// Temp_water_in_pan_inC_830AM
			$this->Temp_water_in_pan_inC_830AM->setDbValueDef($rsnew, $this->Temp_water_in_pan_inC_830AM->CurrentValue, NULL, $this->Temp_water_in_pan_inC_830AM->ReadOnly);

			// Temp_water_in_pan_inC_530PM
			$this->Temp_water_in_pan_inC_530PM->setDbValueDef($rsnew, $this->Temp_water_in_pan_inC_530PM->CurrentValue, NULL, $this->Temp_water_in_pan_inC_530PM->ReadOnly);

			// App_Evaporation_inMM_830AM
			$this->App_Evaporation_inMM_830AM->setDbValueDef($rsnew, $this->App_Evaporation_inMM_830AM->CurrentValue, NULL, $this->App_Evaporation_inMM_830AM->ReadOnly);

			// App_Evaporation_inMM_530PM
			$this->App_Evaporation_inMM_530PM->setDbValueDef($rsnew, $this->App_Evaporation_inMM_530PM->CurrentValue, NULL, $this->App_Evaporation_inMM_530PM->ReadOnly);

			// Rainfall_inMM_830AM
			$this->Rainfall_inMM_830AM->setDbValueDef($rsnew, $this->Rainfall_inMM_830AM->CurrentValue, NULL, $this->Rainfall_inMM_830AM->ReadOnly);

			// Rainfall_inMM_530PM
			$this->Rainfall_inMM_530PM->setDbValueDef($rsnew, $this->Rainfall_inMM_530PM->CurrentValue, NULL, $this->Rainfall_inMM_530PM->ReadOnly);

			// Evaporation_curing_inMM_830AM
			$this->Evaporation_curing_inMM_830AM->setDbValueDef($rsnew, $this->Evaporation_curing_inMM_830AM->CurrentValue, NULL, $this->Evaporation_curing_inMM_830AM->ReadOnly);

			// Evaporation_curing_inMM_530PM
			$this->Evaporation_curing_inMM_530PM->setDbValueDef($rsnew, $this->Evaporation_curing_inMM_530PM->CurrentValue, NULL, $this->Evaporation_curing_inMM_530PM->ReadOnly);

			// Evaporation_curing_DaywithRain_inMM
			$this->Evaporation_curing_DaywithRain_inMM->setDbValueDef($rsnew, $this->Evaporation_curing_DaywithRain_inMM->CurrentValue, NULL, $this->Evaporation_curing_DaywithRain_inMM->ReadOnly);

			// Evaporation_curing_DaywithNoRain_inMM
			$this->Evaporation_curing_DaywithNoRain_inMM->setDbValueDef($rsnew, $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue, NULL, $this->Evaporation_curing_DaywithNoRain_inMM->ReadOnly);

			// Dry_Bulb_Temp_inC_830AM
			$this->Dry_Bulb_Temp_inC_830AM->setDbValueDef($rsnew, $this->Dry_Bulb_Temp_inC_830AM->CurrentValue, NULL, $this->Dry_Bulb_Temp_inC_830AM->ReadOnly);

			// Wet_Bulb_Temp_inC_830AM
			$this->Wet_Bulb_Temp_inC_830AM->setDbValueDef($rsnew, $this->Wet_Bulb_Temp_inC_830AM->CurrentValue, NULL, $this->Wet_Bulb_Temp_inC_830AM->ReadOnly);

			// Vapour_Temp_inC_830AM
			$this->Vapour_Temp_inC_830AM->setDbValueDef($rsnew, $this->Vapour_Temp_inC_830AM->CurrentValue, NULL, $this->Vapour_Temp_inC_830AM->ReadOnly);

			// Dry_Bulb_Temp_inC_530PM
			$this->Dry_Bulb_Temp_inC_530PM->setDbValueDef($rsnew, $this->Dry_Bulb_Temp_inC_530PM->CurrentValue, NULL, $this->Dry_Bulb_Temp_inC_530PM->ReadOnly);

			// Wet_Bulb_Temp_inC_530PM
			$this->Wet_Bulb_Temp_inC_530PM->setDbValueDef($rsnew, $this->Wet_Bulb_Temp_inC_530PM->CurrentValue, NULL, $this->Wet_Bulb_Temp_inC_530PM->ReadOnly);

			// Vapour_Temp_inC_530PM
			$this->Vapour_Temp_inC_530PM->setDbValueDef($rsnew, $this->Vapour_Temp_inC_530PM->CurrentValue, NULL, $this->Vapour_Temp_inC_530PM->ReadOnly);

			// Max_Temp_inC
			$this->Max_Temp_inC->setDbValueDef($rsnew, $this->Max_Temp_inC->CurrentValue, NULL, $this->Max_Temp_inC->ReadOnly);

			// Min_Temp_inC
			$this->Min_Temp_inC->setDbValueDef($rsnew, $this->Min_Temp_inC->CurrentValue, NULL, $this->Min_Temp_inC->ReadOnly);

			// Total_Wind_Run_inKM_830AM
			$this->Total_Wind_Run_inKM_830AM->setDbValueDef($rsnew, $this->Total_Wind_Run_inKM_830AM->CurrentValue, NULL, $this->Total_Wind_Run_inKM_830AM->ReadOnly);

			// Total_Wind_Run_inKM_530PM
			$this->Total_Wind_Run_inKM_530PM->setDbValueDef($rsnew, $this->Total_Wind_Run_inKM_530PM->CurrentValue, NULL, $this->Total_Wind_Run_inKM_530PM->ReadOnly);

			// Average_Wind_Speed_inKM
			$this->Average_Wind_Speed_inKM->setDbValueDef($rsnew, $this->Average_Wind_Speed_inKM->CurrentValue, NULL, $this->Average_Wind_Speed_inKM->ReadOnly);

			// Number_of_Hours_of_Brightsuned
			$this->Number_of_Hours_of_Brightsuned->setDbValueDef($rsnew, $this->Number_of_Hours_of_Brightsuned->CurrentValue, NULL, $this->Number_of_Hours_of_Brightsuned->ReadOnly);

			// Relative_Humidity_in_Precentage_830AM
			$this->Relative_Humidity_in_Precentage_830AM->setDbValueDef($rsnew, $this->Relative_Humidity_in_Precentage_830AM->CurrentValue, NULL, $this->Relative_Humidity_in_Precentage_830AM->ReadOnly);

			// Relative_Humidity_in_Precentage_530PM
			$this->Relative_Humidity_in_Precentage_530PM->setDbValueDef($rsnew, $this->Relative_Humidity_in_Precentage_530PM->CurrentValue, NULL, $this->Relative_Humidity_in_Precentage_530PM->ReadOnly);

			// obs_remarks
			$this->obs_remarks->setDbValueDef($rsnew, $this->obs_remarks->CurrentValue, NULL, $this->obs_remarks->ReadOnly);

			// Status
			$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, 0, $this->Status->ReadOnly);

			// Validated
			$this->Validated->setDbValueDef($rsnew, $this->Validated->CurrentValue, NULL, $this->Validated->ReadOnly);

			// isFreeze
			$tmpBool = $this->isFreeze->CurrentValue;
			if ($tmpBool != "1" && $tmpBool != "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->isFreeze->setDbValueDef($rsnew, $tmpBool, 0, $this->isFreeze->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('StationId')); // StationId
		$hash .= GetFieldHash($rs->fields('obs_DateTime')); // obs_DateTime
		$hash .= GetFieldHash($rs->fields('Temp_water_in_pan_inC_830AM')); // Temp_water_in_pan_inC_830AM
		$hash .= GetFieldHash($rs->fields('Temp_water_in_pan_inC_530PM')); // Temp_water_in_pan_inC_530PM
		$hash .= GetFieldHash($rs->fields('App_Evaporation_inMM_830AM')); // App_Evaporation_inMM_830AM
		$hash .= GetFieldHash($rs->fields('App_Evaporation_inMM_530PM')); // App_Evaporation_inMM_530PM
		$hash .= GetFieldHash($rs->fields('Rainfall_inMM_830AM')); // Rainfall_inMM_830AM
		$hash .= GetFieldHash($rs->fields('Rainfall_inMM_530PM')); // Rainfall_inMM_530PM
		$hash .= GetFieldHash($rs->fields('Evaporation_curing_inMM_830AM')); // Evaporation_curing_inMM_830AM
		$hash .= GetFieldHash($rs->fields('Evaporation_curing_inMM_530PM')); // Evaporation_curing_inMM_530PM
		$hash .= GetFieldHash($rs->fields('Evaporation_curing_DaywithRain_inMM')); // Evaporation_curing_DaywithRain_inMM
		$hash .= GetFieldHash($rs->fields('Evaporation_curing_DaywithNoRain_inMM')); // Evaporation_curing_DaywithNoRain_inMM
		$hash .= GetFieldHash($rs->fields('Dry_Bulb_Temp_inC_830AM')); // Dry_Bulb_Temp_inC_830AM
		$hash .= GetFieldHash($rs->fields('Wet_Bulb_Temp_inC_830AM')); // Wet_Bulb_Temp_inC_830AM
		$hash .= GetFieldHash($rs->fields('Vapour_Temp_inC_830AM')); // Vapour_Temp_inC_830AM
		$hash .= GetFieldHash($rs->fields('Dry_Bulb_Temp_inC_530PM')); // Dry_Bulb_Temp_inC_530PM
		$hash .= GetFieldHash($rs->fields('Wet_Bulb_Temp_inC_530PM')); // Wet_Bulb_Temp_inC_530PM
		$hash .= GetFieldHash($rs->fields('Vapour_Temp_inC_530PM')); // Vapour_Temp_inC_530PM
		$hash .= GetFieldHash($rs->fields('Max_Temp_inC')); // Max_Temp_inC
		$hash .= GetFieldHash($rs->fields('Min_Temp_inC')); // Min_Temp_inC
		$hash .= GetFieldHash($rs->fields('Total_Wind_Run_inKM_830AM')); // Total_Wind_Run_inKM_830AM
		$hash .= GetFieldHash($rs->fields('Total_Wind_Run_inKM_530PM')); // Total_Wind_Run_inKM_530PM
		$hash .= GetFieldHash($rs->fields('Average_Wind_Speed_inKM')); // Average_Wind_Speed_inKM
		$hash .= GetFieldHash($rs->fields('Number_of_Hours_of_Brightsuned')); // Number_of_Hours_of_Brightsuned
		$hash .= GetFieldHash($rs->fields('Relative_Humidity_in_Precentage_830AM')); // Relative_Humidity_in_Precentage_830AM
		$hash .= GetFieldHash($rs->fields('Relative_Humidity_in_Precentage_530PM')); // Relative_Humidity_in_Precentage_530PM
		$hash .= GetFieldHash($rs->fields('obs_remarks')); // obs_remarks
		$hash .= GetFieldHash($rs->fields('Status')); // Status
		$hash .= GetFieldHash($rs->fields('Validated')); // Validated
		$hash .= GetFieldHash($rs->fields('isFreeze')); // isFreeze
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

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->Slno->AdvancedSearch->load();
		$this->StationId->AdvancedSearch->load();
		$this->obs_DateTime->AdvancedSearch->load();
		$this->Temp_water_in_pan_inC_830AM->AdvancedSearch->load();
		$this->Temp_water_in_pan_inC_530PM->AdvancedSearch->load();
		$this->App_Evaporation_inMM_830AM->AdvancedSearch->load();
		$this->App_Evaporation_inMM_530PM->AdvancedSearch->load();
		$this->Rainfall_inMM_830AM->AdvancedSearch->load();
		$this->Rainfall_inMM_530PM->AdvancedSearch->load();
		$this->Evaporation_curing_inMM_830AM->AdvancedSearch->load();
		$this->Evaporation_curing_inMM_530PM->AdvancedSearch->load();
		$this->Evaporation_curing_DaywithRain_inMM->AdvancedSearch->load();
		$this->Evaporation_curing_DaywithNoRain_inMM->AdvancedSearch->load();
		$this->Dry_Bulb_Temp_inC_830AM->AdvancedSearch->load();
		$this->Wet_Bulb_Temp_inC_830AM->AdvancedSearch->load();
		$this->Vapour_Temp_inC_830AM->AdvancedSearch->load();
		$this->Dry_Bulb_Temp_inC_530PM->AdvancedSearch->load();
		$this->Wet_Bulb_Temp_inC_530PM->AdvancedSearch->load();
		$this->Vapour_Temp_inC_530PM->AdvancedSearch->load();
		$this->Max_Temp_inC->AdvancedSearch->load();
		$this->Min_Temp_inC->AdvancedSearch->load();
		$this->Total_Wind_Run_inKM_830AM->AdvancedSearch->load();
		$this->Total_Wind_Run_inKM_530PM->AdvancedSearch->load();
		$this->Average_Wind_Speed_inKM->AdvancedSearch->load();
		$this->Number_of_Hours_of_Brightsuned->AdvancedSearch->load();
		$this->Relative_Humidity_in_Precentage_830AM->AdvancedSearch->load();
		$this->Relative_Humidity_in_Precentage_530PM->AdvancedSearch->load();
		$this->obs_remarks->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->Validated->AdvancedSearch->load();
		$this->isFreeze->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.ftbl_hmsdatalist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.ftbl_hmsdatalist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.ftbl_hmsdatalist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_tbl_hmsdata" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_tbl_hmsdata\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.ftbl_hmsdatalist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"ftbl_hmsdatalistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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