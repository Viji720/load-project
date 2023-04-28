<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_smsdata_list extends tbl_smsdata
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_smsdata';

	// Page object name
	public $PageObjName = "tbl_smsdata_list";

	// Grid form hidden field names
	public $FormName = "ftbl_smsdatalist";
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

		// Table object (tbl_smsdata)
		if (!isset($GLOBALS["tbl_smsdata"]) || get_class($GLOBALS["tbl_smsdata"]) == PROJECT_NAMESPACE . "tbl_smsdata") {
			$GLOBALS["tbl_smsdata"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tbl_smsdata"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "tbl_smsdataadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "tbl_smsdatadelete.php";
		$this->MultiUpdateUrl = "tbl_smsdataupdate.php";

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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
		$this->FilterOptions->TagClassName = "ew-filter-option ftbl_smsdatalistsrch";

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
	public $SearchFieldsPerRow = 3; // For extended search
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
		$this->setupLookupOptions($this->SubDivId);
		$this->setupLookupOptions($this->Status);
		$this->setupLookupOptions($this->Validated);
		$this->setupLookupOptions($this->IsFirstMsg);

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

				// Switch to inline edit mode
				if ($this->isEdit())
					$this->inlineEditMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Inline Update
					if (($this->isUpdate() || $this->isOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "edit")
						$this->inlineUpdate();
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
		$this->rainfall->FormValue = ""; // Clear form value
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
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

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";

		// Load server side filters
		if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile))
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "ftbl_smsdatalistsrch");
		$filterList = Concat($filterList, $this->Slno->AdvancedSearch->toJson(), ","); // Field Slno
		$filterList = Concat($filterList, $this->SMSDateTime->AdvancedSearch->toJson(), ","); // Field SMSDateTime
		$filterList = Concat($filterList, $this->StationId->AdvancedSearch->toJson(), ","); // Field StationId
		$filterList = Concat($filterList, $this->SubDivId->AdvancedSearch->toJson(), ","); // Field SubDivId
		$filterList = Concat($filterList, $this->SendDateTime->AdvancedSearch->toJson(), ","); // Field SendDateTime
		$filterList = Concat($filterList, $this->rainfall->AdvancedSearch->toJson(), ","); // Field rainfall
		$filterList = Concat($filterList, $this->obsremarks->AdvancedSearch->toJson(), ","); // Field obsremarks
		$filterList = Concat($filterList, $this->Status->AdvancedSearch->toJson(), ","); // Field Status
		$filterList = Concat($filterList, $this->Validated->AdvancedSearch->toJson(), ","); // Field Validated
		$filterList = Concat($filterList, $this->SenderMobileNumber->AdvancedSearch->toJson(), ","); // Field SenderMobileNumber
		$filterList = Concat($filterList, $this->IsFirstMsg->AdvancedSearch->toJson(), ","); // Field IsFirstMsg
		$filterList = Concat($filterList, $this->SMSText->AdvancedSearch->toJson(), ","); // Field SMSText
		$filterList = Concat($filterList, $this->isFreeze->AdvancedSearch->toJson(), ","); // Field isFreeze
		$filterList = Concat($filterList, $this->SystemDateTime->AdvancedSearch->toJson(), ","); // Field SystemDateTime
		$filterList = Concat($filterList, $this->ConfirmQueryDateTime->AdvancedSearch->toJson(), ","); // Field ConfirmQueryDateTime
		$filterList = Concat($filterList, $this->ConfirmedDateTime->AdvancedSearch->toJson(), ","); // Field ConfirmedDateTime
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
			$UserProfile->setSearchFilters(CurrentUserName(), "ftbl_smsdatalistsrch", $filters);
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

		// Field SMSDateTime
		$this->SMSDateTime->AdvancedSearch->SearchValue = @$filter["x_SMSDateTime"];
		$this->SMSDateTime->AdvancedSearch->SearchOperator = @$filter["z_SMSDateTime"];
		$this->SMSDateTime->AdvancedSearch->SearchCondition = @$filter["v_SMSDateTime"];
		$this->SMSDateTime->AdvancedSearch->SearchValue2 = @$filter["y_SMSDateTime"];
		$this->SMSDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_SMSDateTime"];
		$this->SMSDateTime->AdvancedSearch->save();

		// Field StationId
		$this->StationId->AdvancedSearch->SearchValue = @$filter["x_StationId"];
		$this->StationId->AdvancedSearch->SearchOperator = @$filter["z_StationId"];
		$this->StationId->AdvancedSearch->SearchCondition = @$filter["v_StationId"];
		$this->StationId->AdvancedSearch->SearchValue2 = @$filter["y_StationId"];
		$this->StationId->AdvancedSearch->SearchOperator2 = @$filter["w_StationId"];
		$this->StationId->AdvancedSearch->save();

		// Field SubDivId
		$this->SubDivId->AdvancedSearch->SearchValue = @$filter["x_SubDivId"];
		$this->SubDivId->AdvancedSearch->SearchOperator = @$filter["z_SubDivId"];
		$this->SubDivId->AdvancedSearch->SearchCondition = @$filter["v_SubDivId"];
		$this->SubDivId->AdvancedSearch->SearchValue2 = @$filter["y_SubDivId"];
		$this->SubDivId->AdvancedSearch->SearchOperator2 = @$filter["w_SubDivId"];
		$this->SubDivId->AdvancedSearch->save();

		// Field SendDateTime
		$this->SendDateTime->AdvancedSearch->SearchValue = @$filter["x_SendDateTime"];
		$this->SendDateTime->AdvancedSearch->SearchOperator = @$filter["z_SendDateTime"];
		$this->SendDateTime->AdvancedSearch->SearchCondition = @$filter["v_SendDateTime"];
		$this->SendDateTime->AdvancedSearch->SearchValue2 = @$filter["y_SendDateTime"];
		$this->SendDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_SendDateTime"];
		$this->SendDateTime->AdvancedSearch->save();

		// Field rainfall
		$this->rainfall->AdvancedSearch->SearchValue = @$filter["x_rainfall"];
		$this->rainfall->AdvancedSearch->SearchOperator = @$filter["z_rainfall"];
		$this->rainfall->AdvancedSearch->SearchCondition = @$filter["v_rainfall"];
		$this->rainfall->AdvancedSearch->SearchValue2 = @$filter["y_rainfall"];
		$this->rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_rainfall"];
		$this->rainfall->AdvancedSearch->save();

		// Field obsremarks
		$this->obsremarks->AdvancedSearch->SearchValue = @$filter["x_obsremarks"];
		$this->obsremarks->AdvancedSearch->SearchOperator = @$filter["z_obsremarks"];
		$this->obsremarks->AdvancedSearch->SearchCondition = @$filter["v_obsremarks"];
		$this->obsremarks->AdvancedSearch->SearchValue2 = @$filter["y_obsremarks"];
		$this->obsremarks->AdvancedSearch->SearchOperator2 = @$filter["w_obsremarks"];
		$this->obsremarks->AdvancedSearch->save();

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

		// Field SenderMobileNumber
		$this->SenderMobileNumber->AdvancedSearch->SearchValue = @$filter["x_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchOperator = @$filter["z_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchCondition = @$filter["v_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->save();

		// Field IsFirstMsg
		$this->IsFirstMsg->AdvancedSearch->SearchValue = @$filter["x_IsFirstMsg"];
		$this->IsFirstMsg->AdvancedSearch->SearchOperator = @$filter["z_IsFirstMsg"];
		$this->IsFirstMsg->AdvancedSearch->SearchCondition = @$filter["v_IsFirstMsg"];
		$this->IsFirstMsg->AdvancedSearch->SearchValue2 = @$filter["y_IsFirstMsg"];
		$this->IsFirstMsg->AdvancedSearch->SearchOperator2 = @$filter["w_IsFirstMsg"];
		$this->IsFirstMsg->AdvancedSearch->save();

		// Field SMSText
		$this->SMSText->AdvancedSearch->SearchValue = @$filter["x_SMSText"];
		$this->SMSText->AdvancedSearch->SearchOperator = @$filter["z_SMSText"];
		$this->SMSText->AdvancedSearch->SearchCondition = @$filter["v_SMSText"];
		$this->SMSText->AdvancedSearch->SearchValue2 = @$filter["y_SMSText"];
		$this->SMSText->AdvancedSearch->SearchOperator2 = @$filter["w_SMSText"];
		$this->SMSText->AdvancedSearch->save();

		// Field isFreeze
		$this->isFreeze->AdvancedSearch->SearchValue = @$filter["x_isFreeze"];
		$this->isFreeze->AdvancedSearch->SearchOperator = @$filter["z_isFreeze"];
		$this->isFreeze->AdvancedSearch->SearchCondition = @$filter["v_isFreeze"];
		$this->isFreeze->AdvancedSearch->SearchValue2 = @$filter["y_isFreeze"];
		$this->isFreeze->AdvancedSearch->SearchOperator2 = @$filter["w_isFreeze"];
		$this->isFreeze->AdvancedSearch->save();

		// Field SystemDateTime
		$this->SystemDateTime->AdvancedSearch->SearchValue = @$filter["x_SystemDateTime"];
		$this->SystemDateTime->AdvancedSearch->SearchOperator = @$filter["z_SystemDateTime"];
		$this->SystemDateTime->AdvancedSearch->SearchCondition = @$filter["v_SystemDateTime"];
		$this->SystemDateTime->AdvancedSearch->SearchValue2 = @$filter["y_SystemDateTime"];
		$this->SystemDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_SystemDateTime"];
		$this->SystemDateTime->AdvancedSearch->save();

		// Field ConfirmQueryDateTime
		$this->ConfirmQueryDateTime->AdvancedSearch->SearchValue = @$filter["x_ConfirmQueryDateTime"];
		$this->ConfirmQueryDateTime->AdvancedSearch->SearchOperator = @$filter["z_ConfirmQueryDateTime"];
		$this->ConfirmQueryDateTime->AdvancedSearch->SearchCondition = @$filter["v_ConfirmQueryDateTime"];
		$this->ConfirmQueryDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ConfirmQueryDateTime"];
		$this->ConfirmQueryDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ConfirmQueryDateTime"];
		$this->ConfirmQueryDateTime->AdvancedSearch->save();

		// Field ConfirmedDateTime
		$this->ConfirmedDateTime->AdvancedSearch->SearchValue = @$filter["x_ConfirmedDateTime"];
		$this->ConfirmedDateTime->AdvancedSearch->SearchOperator = @$filter["z_ConfirmedDateTime"];
		$this->ConfirmedDateTime->AdvancedSearch->SearchCondition = @$filter["v_ConfirmedDateTime"];
		$this->ConfirmedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ConfirmedDateTime"];
		$this->ConfirmedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ConfirmedDateTime"];
		$this->ConfirmedDateTime->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->SMSDateTime, $default, FALSE); // SMSDateTime
		$this->buildSearchSql($where, $this->StationId, $default, FALSE); // StationId
		$this->buildSearchSql($where, $this->SubDivId, $default, FALSE); // SubDivId
		$this->buildSearchSql($where, $this->SendDateTime, $default, FALSE); // SendDateTime
		$this->buildSearchSql($where, $this->rainfall, $default, FALSE); // rainfall
		$this->buildSearchSql($where, $this->obsremarks, $default, FALSE); // obsremarks
		$this->buildSearchSql($where, $this->Status, $default, FALSE); // Status
		$this->buildSearchSql($where, $this->Validated, $default, FALSE); // Validated
		$this->buildSearchSql($where, $this->SenderMobileNumber, $default, FALSE); // SenderMobileNumber
		$this->buildSearchSql($where, $this->IsFirstMsg, $default, FALSE); // IsFirstMsg
		$this->buildSearchSql($where, $this->SMSText, $default, FALSE); // SMSText
		$this->buildSearchSql($where, $this->isFreeze, $default, FALSE); // isFreeze
		$this->buildSearchSql($where, $this->SystemDateTime, $default, FALSE); // SystemDateTime
		$this->buildSearchSql($where, $this->ConfirmQueryDateTime, $default, FALSE); // ConfirmQueryDateTime
		$this->buildSearchSql($where, $this->ConfirmedDateTime, $default, FALSE); // ConfirmedDateTime

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->Slno->AdvancedSearch->save(); // Slno
			$this->SMSDateTime->AdvancedSearch->save(); // SMSDateTime
			$this->StationId->AdvancedSearch->save(); // StationId
			$this->SubDivId->AdvancedSearch->save(); // SubDivId
			$this->SendDateTime->AdvancedSearch->save(); // SendDateTime
			$this->rainfall->AdvancedSearch->save(); // rainfall
			$this->obsremarks->AdvancedSearch->save(); // obsremarks
			$this->Status->AdvancedSearch->save(); // Status
			$this->Validated->AdvancedSearch->save(); // Validated
			$this->SenderMobileNumber->AdvancedSearch->save(); // SenderMobileNumber
			$this->IsFirstMsg->AdvancedSearch->save(); // IsFirstMsg
			$this->SMSText->AdvancedSearch->save(); // SMSText
			$this->isFreeze->AdvancedSearch->save(); // isFreeze
			$this->SystemDateTime->AdvancedSearch->save(); // SystemDateTime
			$this->ConfirmQueryDateTime->AdvancedSearch->save(); // ConfirmQueryDateTime
			$this->ConfirmedDateTime->AdvancedSearch->save(); // ConfirmedDateTime
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
		$this->buildBasicSearchSql($where, $this->obsremarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SenderMobileNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SMSText, $arKeywords, $type);
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
		if ($this->SMSDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->StationId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SubDivId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SendDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->obsremarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Validated->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SenderMobileNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IsFirstMsg->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SMSText->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->isFreeze->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SystemDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ConfirmQueryDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ConfirmedDateTime->AdvancedSearch->issetSession())
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
		$this->SMSDateTime->AdvancedSearch->unsetSession();
		$this->StationId->AdvancedSearch->unsetSession();
		$this->SubDivId->AdvancedSearch->unsetSession();
		$this->SendDateTime->AdvancedSearch->unsetSession();
		$this->rainfall->AdvancedSearch->unsetSession();
		$this->obsremarks->AdvancedSearch->unsetSession();
		$this->Status->AdvancedSearch->unsetSession();
		$this->Validated->AdvancedSearch->unsetSession();
		$this->SenderMobileNumber->AdvancedSearch->unsetSession();
		$this->IsFirstMsg->AdvancedSearch->unsetSession();
		$this->SMSText->AdvancedSearch->unsetSession();
		$this->isFreeze->AdvancedSearch->unsetSession();
		$this->SystemDateTime->AdvancedSearch->unsetSession();
		$this->ConfirmQueryDateTime->AdvancedSearch->unsetSession();
		$this->ConfirmedDateTime->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->Slno->AdvancedSearch->load();
		$this->SMSDateTime->AdvancedSearch->load();
		$this->StationId->AdvancedSearch->load();
		$this->SubDivId->AdvancedSearch->load();
		$this->SendDateTime->AdvancedSearch->load();
		$this->rainfall->AdvancedSearch->load();
		$this->obsremarks->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->Validated->AdvancedSearch->load();
		$this->SenderMobileNumber->AdvancedSearch->load();
		$this->IsFirstMsg->AdvancedSearch->load();
		$this->SMSText->AdvancedSearch->load();
		$this->isFreeze->AdvancedSearch->load();
		$this->SystemDateTime->AdvancedSearch->load();
		$this->ConfirmQueryDateTime->AdvancedSearch->load();
		$this->ConfirmedDateTime->AdvancedSearch->load();
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
			$this->updateSort($this->SMSDateTime, $ctrl); // SMSDateTime
			$this->updateSort($this->StationId, $ctrl); // StationId
			$this->updateSort($this->SubDivId, $ctrl); // SubDivId
			$this->updateSort($this->SendDateTime, $ctrl); // SendDateTime
			$this->updateSort($this->rainfall, $ctrl); // rainfall
			$this->updateSort($this->obsremarks, $ctrl); // obsremarks
			$this->updateSort($this->Status, $ctrl); // Status
			$this->updateSort($this->Validated, $ctrl); // Validated
			$this->updateSort($this->SenderMobileNumber, $ctrl); // SenderMobileNumber
			$this->updateSort($this->IsFirstMsg, $ctrl); // IsFirstMsg
			$this->updateSort($this->SMSText, $ctrl); // SMSText
			$this->updateSort($this->isFreeze, $ctrl); // isFreeze
			$this->updateSort($this->SystemDateTime, $ctrl); // SystemDateTime
			$this->updateSort($this->ConfirmQueryDateTime, $ctrl); // ConfirmQueryDateTime
			$this->updateSort($this->ConfirmedDateTime, $ctrl); // ConfirmedDateTime
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
				$this->SMSDateTime->setSort("");
				$this->StationId->setSort("");
				$this->SubDivId->setSort("");
				$this->SendDateTime->setSort("");
				$this->rainfall->setSort("");
				$this->obsremarks->setSort("");
				$this->Status->setSort("");
				$this->Validated->setSort("");
				$this->SenderMobileNumber->setSort("");
				$this->IsFirstMsg->setSort("");
				$this->SMSText->setSort("");
				$this->isFreeze->setSort("");
				$this->SystemDateTime->setSort("");
				$this->ConfirmQueryDateTime->setSort("");
				$this->ConfirmedDateTime->setSort("");
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
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"ftbl_smsdatalistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"ftbl_smsdatalistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.ftbl_smsdatalist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->Slno->CurrentValue = NULL;
		$this->Slno->OldValue = $this->Slno->CurrentValue;
		$this->SMSDateTime->CurrentValue = NULL;
		$this->SMSDateTime->OldValue = $this->SMSDateTime->CurrentValue;
		$this->StationId->CurrentValue = NULL;
		$this->StationId->OldValue = $this->StationId->CurrentValue;
		$this->SubDivId->CurrentValue = NULL;
		$this->SubDivId->OldValue = $this->SubDivId->CurrentValue;
		$this->SendDateTime->CurrentValue = NULL;
		$this->SendDateTime->OldValue = $this->SendDateTime->CurrentValue;
		$this->rainfall->CurrentValue = NULL;
		$this->rainfall->OldValue = $this->rainfall->CurrentValue;
		$this->obsremarks->CurrentValue = NULL;
		$this->obsremarks->OldValue = $this->obsremarks->CurrentValue;
		$this->Status->CurrentValue = NULL;
		$this->Status->OldValue = $this->Status->CurrentValue;
		$this->Validated->CurrentValue = NULL;
		$this->Validated->OldValue = $this->Validated->CurrentValue;
		$this->SenderMobileNumber->CurrentValue = NULL;
		$this->SenderMobileNumber->OldValue = $this->SenderMobileNumber->CurrentValue;
		$this->IsFirstMsg->CurrentValue = NULL;
		$this->IsFirstMsg->OldValue = $this->IsFirstMsg->CurrentValue;
		$this->SMSText->CurrentValue = NULL;
		$this->SMSText->OldValue = $this->SMSText->CurrentValue;
		$this->isFreeze->CurrentValue = 0;
		$this->SystemDateTime->CurrentValue = NULL;
		$this->SystemDateTime->OldValue = $this->SystemDateTime->CurrentValue;
		$this->ConfirmQueryDateTime->CurrentValue = NULL;
		$this->ConfirmQueryDateTime->OldValue = $this->ConfirmQueryDateTime->CurrentValue;
		$this->ConfirmedDateTime->CurrentValue = NULL;
		$this->ConfirmedDateTime->OldValue = $this->ConfirmedDateTime->CurrentValue;
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

		// SMSDateTime
		if (!$this->isAddOrEdit() && $this->SMSDateTime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SMSDateTime->AdvancedSearch->SearchValue != "" || $this->SMSDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// StationId
		if (!$this->isAddOrEdit() && $this->StationId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->StationId->AdvancedSearch->SearchValue != "" || $this->StationId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SubDivId
		if (!$this->isAddOrEdit() && $this->SubDivId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SubDivId->AdvancedSearch->SearchValue != "" || $this->SubDivId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SendDateTime
		if (!$this->isAddOrEdit() && $this->SendDateTime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SendDateTime->AdvancedSearch->SearchValue != "" || $this->SendDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// rainfall
		if (!$this->isAddOrEdit() && $this->rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->rainfall->AdvancedSearch->SearchValue != "" || $this->rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// obsremarks
		if (!$this->isAddOrEdit() && $this->obsremarks->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->obsremarks->AdvancedSearch->SearchValue != "" || $this->obsremarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// SenderMobileNumber
		if (!$this->isAddOrEdit() && $this->SenderMobileNumber->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SenderMobileNumber->AdvancedSearch->SearchValue != "" || $this->SenderMobileNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// IsFirstMsg
		if (!$this->isAddOrEdit() && $this->IsFirstMsg->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->IsFirstMsg->AdvancedSearch->SearchValue != "" || $this->IsFirstMsg->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SMSText
		if (!$this->isAddOrEdit() && $this->SMSText->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SMSText->AdvancedSearch->SearchValue != "" || $this->SMSText->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// SystemDateTime
		if (!$this->isAddOrEdit() && $this->SystemDateTime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SystemDateTime->AdvancedSearch->SearchValue != "" || $this->SystemDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ConfirmQueryDateTime
		if (!$this->isAddOrEdit() && $this->ConfirmQueryDateTime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ConfirmQueryDateTime->AdvancedSearch->SearchValue != "" || $this->ConfirmQueryDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ConfirmedDateTime
		if (!$this->isAddOrEdit() && $this->ConfirmedDateTime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ConfirmedDateTime->AdvancedSearch->SearchValue != "" || $this->ConfirmedDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
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
		if (!$this->isGridAdd() && !$this->isAdd())
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
		$this->loadDefaultValues();
		$row = [];
		$row['Slno'] = $this->Slno->CurrentValue;
		$row['SMSDateTime'] = $this->SMSDateTime->CurrentValue;
		$row['StationId'] = $this->StationId->CurrentValue;
		$row['SubDivId'] = $this->SubDivId->CurrentValue;
		$row['SendDateTime'] = $this->SendDateTime->CurrentValue;
		$row['rainfall'] = $this->rainfall->CurrentValue;
		$row['obsremarks'] = $this->obsremarks->CurrentValue;
		$row['Status'] = $this->Status->CurrentValue;
		$row['Validated'] = $this->Validated->CurrentValue;
		$row['SenderMobileNumber'] = $this->SenderMobileNumber->CurrentValue;
		$row['IsFirstMsg'] = $this->IsFirstMsg->CurrentValue;
		$row['SMSText'] = $this->SMSText->CurrentValue;
		$row['isFreeze'] = $this->isFreeze->CurrentValue;
		$row['SystemDateTime'] = $this->SystemDateTime->CurrentValue;
		$row['ConfirmQueryDateTime'] = $this->ConfirmQueryDateTime->CurrentValue;
		$row['ConfirmedDateTime'] = $this->ConfirmedDateTime->CurrentValue;
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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Slno
			// SMSDateTime

			$this->SMSDateTime->EditAttrs["class"] = "form-control";
			$this->SMSDateTime->EditCustomAttributes = "";
			$this->SMSDateTime->EditValue = HtmlEncode(FormatDateTime($this->SMSDateTime->CurrentValue, 7));

			// StationId
			$this->StationId->EditAttrs["class"] = "form-control";
			$this->StationId->EditCustomAttributes = "";

			// SubDivId
			$this->SubDivId->EditAttrs["class"] = "form-control";
			$this->SubDivId->EditCustomAttributes = "";

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

			// Validated
			$this->Validated->EditAttrs["class"] = "form-control";
			$this->Validated->EditCustomAttributes = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			if (!$this->SenderMobileNumber->Raw)
				$this->SenderMobileNumber->CurrentValue = HtmlDecode($this->SenderMobileNumber->CurrentValue);
			$this->SenderMobileNumber->EditValue = HtmlEncode($this->SenderMobileNumber->CurrentValue);

			// IsFirstMsg
			$this->IsFirstMsg->EditCustomAttributes = "";

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

			// Add refer script
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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// Slno
			$this->Slno->EditAttrs["class"] = "form-control";
			$this->Slno->EditCustomAttributes = "";
			$this->Slno->EditValue = HtmlEncode($this->Slno->AdvancedSearch->SearchValue);

			// SMSDateTime
			$this->SMSDateTime->EditAttrs["class"] = "form-control";
			$this->SMSDateTime->EditCustomAttributes = "";
			$this->SMSDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SMSDateTime->AdvancedSearch->SearchValue, 7), 7));

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

			// SubDivId
			$this->SubDivId->EditAttrs["class"] = "form-control";
			$this->SubDivId->EditCustomAttributes = "";
			$curVal = trim(strval($this->SubDivId->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->SubDivId->AdvancedSearch->ViewValue = $this->SubDivId->lookupCacheOption($curVal);
			else
				$this->SubDivId->AdvancedSearch->ViewValue = $this->SubDivId->Lookup !== NULL && is_array($this->SubDivId->Lookup->Options) ? $curVal : NULL;
			if ($this->SubDivId->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->SubDivId->EditValue = array_values($this->SubDivId->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`SubDivisionId`" . SearchString("=", $this->SubDivId->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
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
			$this->SendDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SendDateTime->AdvancedSearch->SearchValue, 7), 7));

			// rainfall
			$this->rainfall->EditAttrs["class"] = "form-control";
			$this->rainfall->EditCustomAttributes = "";
			$this->rainfall->EditValue = HtmlEncode($this->rainfall->AdvancedSearch->SearchValue);
			$this->rainfall->EditAttrs["class"] = "form-control";
			$this->rainfall->EditCustomAttributes = "";
			$this->rainfall->EditValue2 = HtmlEncode($this->rainfall->AdvancedSearch->SearchValue2);

			// obsremarks
			$this->obsremarks->EditAttrs["class"] = "form-control";
			$this->obsremarks->EditCustomAttributes = "";
			if (!$this->obsremarks->Raw)
				$this->obsremarks->AdvancedSearch->SearchValue = HtmlDecode($this->obsremarks->AdvancedSearch->SearchValue);
			$this->obsremarks->EditValue = HtmlEncode($this->obsremarks->AdvancedSearch->SearchValue);

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$curVal = trim(strval($this->Status->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Status->AdvancedSearch->ViewValue = $this->Status->lookupCacheOption($curVal);
			else
				$this->Status->AdvancedSearch->ViewValue = $this->Status->Lookup !== NULL && is_array($this->Status->Lookup->Options) ? $curVal : NULL;
			if ($this->Status->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Status->EditValue = array_values($this->Status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Status`" . SearchString("=", $this->Status->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
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
			$curVal = trim(strval($this->Validated->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Validated->AdvancedSearch->ViewValue = $this->Validated->lookupCacheOption($curVal);
			else
				$this->Validated->AdvancedSearch->ViewValue = $this->Validated->Lookup !== NULL && is_array($this->Validated->Lookup->Options) ? $curVal : NULL;
			if ($this->Validated->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Validated->EditValue = array_values($this->Validated->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`validated`" . SearchString("=", $this->Validated->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
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
				$this->SenderMobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->SenderMobileNumber->AdvancedSearch->SearchValue);
			$this->SenderMobileNumber->EditValue = HtmlEncode($this->SenderMobileNumber->AdvancedSearch->SearchValue);

			// IsFirstMsg
			$this->IsFirstMsg->EditCustomAttributes = "";

			// SMSText
			$this->SMSText->EditAttrs["class"] = "form-control";
			$this->SMSText->EditCustomAttributes = "";
			if (!$this->SMSText->Raw)
				$this->SMSText->AdvancedSearch->SearchValue = HtmlDecode($this->SMSText->AdvancedSearch->SearchValue);
			$this->SMSText->EditValue = HtmlEncode($this->SMSText->AdvancedSearch->SearchValue);

			// isFreeze
			$this->isFreeze->EditCustomAttributes = "";
			$this->isFreeze->EditValue = $this->isFreeze->options(FALSE);

			// SystemDateTime
			$this->SystemDateTime->EditAttrs["class"] = "form-control";
			$this->SystemDateTime->EditCustomAttributes = "";
			$this->SystemDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SystemDateTime->AdvancedSearch->SearchValue, 0), 8));

			// ConfirmQueryDateTime
			$this->ConfirmQueryDateTime->EditAttrs["class"] = "form-control";
			$this->ConfirmQueryDateTime->EditCustomAttributes = "";
			$this->ConfirmQueryDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ConfirmQueryDateTime->AdvancedSearch->SearchValue, 0), 8));

			// ConfirmedDateTime
			$this->ConfirmedDateTime->EditAttrs["class"] = "form-control";
			$this->ConfirmedDateTime->EditCustomAttributes = "";
			$this->ConfirmedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ConfirmedDateTime->AdvancedSearch->SearchValue, 0), 8));
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
		if (!CheckRange($this->rainfall->AdvancedSearch->SearchValue, 0.00, 200.00)) {
			AddMessage($SearchError, $this->rainfall->errorMessage());
		}
		if (!CheckRange($this->rainfall->AdvancedSearch->SearchValue2, 0.00, 200.00)) {
			AddMessage($SearchError, $this->rainfall->errorMessage());
		}

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
		$hash .= GetFieldHash($rs->fields('SMSDateTime')); // SMSDateTime
		$hash .= GetFieldHash($rs->fields('StationId')); // StationId
		$hash .= GetFieldHash($rs->fields('SubDivId')); // SubDivId
		$hash .= GetFieldHash($rs->fields('SendDateTime')); // SendDateTime
		$hash .= GetFieldHash($rs->fields('rainfall')); // rainfall
		$hash .= GetFieldHash($rs->fields('obsremarks')); // obsremarks
		$hash .= GetFieldHash($rs->fields('Status')); // Status
		$hash .= GetFieldHash($rs->fields('Validated')); // Validated
		$hash .= GetFieldHash($rs->fields('SenderMobileNumber')); // SenderMobileNumber
		$hash .= GetFieldHash($rs->fields('IsFirstMsg')); // IsFirstMsg
		$hash .= GetFieldHash($rs->fields('SMSText')); // SMSText
		$hash .= GetFieldHash($rs->fields('isFreeze')); // isFreeze
		$hash .= GetFieldHash($rs->fields('SystemDateTime')); // SystemDateTime
		$hash .= GetFieldHash($rs->fields('ConfirmQueryDateTime')); // ConfirmQueryDateTime
		$hash .= GetFieldHash($rs->fields('ConfirmedDateTime')); // ConfirmedDateTime
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

		// SMSDateTime
		$this->SMSDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SMSDateTime->CurrentValue, 7), NULL, FALSE);

		// StationId
		$this->StationId->setDbValueDef($rsnew, $this->StationId->CurrentValue, NULL, FALSE);

		// SubDivId
		$this->SubDivId->setDbValueDef($rsnew, $this->SubDivId->CurrentValue, NULL, FALSE);

		// SendDateTime
		$this->SendDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SendDateTime->CurrentValue, 7), NULL, FALSE);

		// rainfall
		$this->rainfall->setDbValueDef($rsnew, $this->rainfall->CurrentValue, NULL, FALSE);

		// obsremarks
		$this->obsremarks->setDbValueDef($rsnew, $this->obsremarks->CurrentValue, NULL, FALSE);

		// Status
		$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, 0, FALSE);

		// Validated
		$this->Validated->setDbValueDef($rsnew, $this->Validated->CurrentValue, NULL, FALSE);

		// SenderMobileNumber
		$this->SenderMobileNumber->setDbValueDef($rsnew, $this->SenderMobileNumber->CurrentValue, NULL, FALSE);

		// IsFirstMsg
		$this->IsFirstMsg->setDbValueDef($rsnew, $this->IsFirstMsg->CurrentValue, NULL, FALSE);

		// SMSText
		$this->SMSText->setDbValueDef($rsnew, $this->SMSText->CurrentValue, NULL, FALSE);

		// isFreeze
		$tmpBool = $this->isFreeze->CurrentValue;
		if ($tmpBool != "1" && $tmpBool != "0")
			$tmpBool = !empty($tmpBool) ? "1" : "0";
		$this->isFreeze->setDbValueDef($rsnew, $tmpBool, 0, strval($this->isFreeze->CurrentValue) == "");

		// SystemDateTime
		$this->SystemDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->SystemDateTime->CurrentValue, 0), NULL, FALSE);

		// ConfirmQueryDateTime
		$this->ConfirmQueryDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ConfirmQueryDateTime->CurrentValue, 0), NULL, FALSE);

		// ConfirmedDateTime
		$this->ConfirmedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ConfirmedDateTime->CurrentValue, 0), NULL, FALSE);

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
		$this->SMSDateTime->AdvancedSearch->load();
		$this->StationId->AdvancedSearch->load();
		$this->SubDivId->AdvancedSearch->load();
		$this->SendDateTime->AdvancedSearch->load();
		$this->rainfall->AdvancedSearch->load();
		$this->obsremarks->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->Validated->AdvancedSearch->load();
		$this->SenderMobileNumber->AdvancedSearch->load();
		$this->IsFirstMsg->AdvancedSearch->load();
		$this->SMSText->AdvancedSearch->load();
		$this->isFreeze->AdvancedSearch->load();
		$this->SystemDateTime->AdvancedSearch->load();
		$this->ConfirmQueryDateTime->AdvancedSearch->load();
		$this->ConfirmedDateTime->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.ftbl_smsdatalist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.ftbl_smsdatalist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.ftbl_smsdatalist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_tbl_smsdata" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_tbl_smsdata\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.ftbl_smsdatalist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"ftbl_smsdatalistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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