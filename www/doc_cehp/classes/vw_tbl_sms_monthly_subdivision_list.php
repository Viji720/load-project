<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class vw_tbl_sms_monthly_subdivision_list extends vw_tbl_sms_monthly_subdivision
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'vw_tbl_sms_monthly_subdivision';

	// Page object name
	public $PageObjName = "vw_tbl_sms_monthly_subdivision_list";

	// Grid form hidden field names
	public $FormName = "fvw_tbl_sms_monthly_subdivisionlist";
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

		// Table object (vw_tbl_sms_monthly_subdivision)
		if (!isset($GLOBALS["vw_tbl_sms_monthly_subdivision"]) || get_class($GLOBALS["vw_tbl_sms_monthly_subdivision"]) == PROJECT_NAMESPACE . "vw_tbl_sms_monthly_subdivision") {
			$GLOBALS["vw_tbl_sms_monthly_subdivision"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["vw_tbl_sms_monthly_subdivision"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "vw_tbl_sms_monthly_subdivisionadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "vw_tbl_sms_monthly_subdivisiondelete.php";
		$this->MultiUpdateUrl = "vw_tbl_sms_monthly_subdivisionupdate.php";

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'vw_tbl_sms_monthly_subdivision');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fvw_tbl_sms_monthly_subdivisionlistsrch";

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
		global $vw_tbl_sms_monthly_subdivision;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($vw_tbl_sms_monthly_subdivision);
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
	public $DisplayRecords = 31;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "31,62,-1"; // Page sizes (comma separated)
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
				if (strval($Security->currentUserID()) == "") {
					$this->setFailureMessage(DeniedMessage()); // Set no permission
					$this->terminate();
					return;
				}
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
		$this->SubDivisionId->setVisibility();
		$this->SenderMobileNumber->setVisibility();
		$this->Water_Year->setVisibility();
		$this->day_of_month->setVisibility();
		$this->Jun_rainfall->setVisibility();
		$this->Jul_rainfall->setVisibility();
		$this->Aug_rainfall->setVisibility();
		$this->Sep_rainfall->setVisibility();
		$this->Oct_rainfall->setVisibility();
		$this->Nov_rainfall->setVisibility();
		$this->Dec_rainfall->setVisibility();
		$this->Jan_rainfall->setVisibility();
		$this->Feb_rainfall->setVisibility();
		$this->Mar_rainfall->setVisibility();
		$this->Apr_rainfall->setVisibility();
		$this->May_rainfall->setVisibility();
		$this->IsChanged->Visible = FALSE;
		$this->obs_owner->Visible = FALSE;
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
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

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

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
		}

		// Restore display records
		if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
			$this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecords = 31; // Load default
			$this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
		}

		// Load Sorting Order
		if ($this->Command != "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

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
					$this->DisplayRecords = 31; // Non-numeric, load default
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
		$this->Jun_rainfall->FormValue = ""; // Clear form value
		$this->Jul_rainfall->FormValue = ""; // Clear form value
		$this->Aug_rainfall->FormValue = ""; // Clear form value
		$this->Sep_rainfall->FormValue = ""; // Clear form value
		$this->Oct_rainfall->FormValue = ""; // Clear form value
		$this->Nov_rainfall->FormValue = ""; // Clear form value
		$this->Dec_rainfall->FormValue = ""; // Clear form value
		$this->Jan_rainfall->FormValue = ""; // Clear form value
		$this->Feb_rainfall->FormValue = ""; // Clear form value
		$this->Mar_rainfall->FormValue = ""; // Clear form value
		$this->Apr_rainfall->FormValue = ""; // Clear form value
		$this->May_rainfall->FormValue = ""; // Clear form value
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

				// Check if valid User ID
				if (!$this->showOptionLink('edit')) {
					$userIdMsg = $Language->phrase("NoEditPermission");
					$this->setFailureMessage($userIdMsg);
					$this->clearInlineMode(); // Clear inline edit mode
					return FALSE;
				}
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
		if ($CurrentForm->hasValue("x_SubDivisionId") && $CurrentForm->hasValue("o_SubDivisionId") && $this->SubDivisionId->CurrentValue != $this->SubDivisionId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SenderMobileNumber") && $CurrentForm->hasValue("o_SenderMobileNumber") && $this->SenderMobileNumber->CurrentValue != $this->SenderMobileNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Water_Year") && $CurrentForm->hasValue("o_Water_Year") && $this->Water_Year->CurrentValue != $this->Water_Year->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_day_of_month") && $CurrentForm->hasValue("o_day_of_month") && $this->day_of_month->CurrentValue != $this->day_of_month->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Jun_rainfall") && $CurrentForm->hasValue("o_Jun_rainfall") && $this->Jun_rainfall->CurrentValue != $this->Jun_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Jul_rainfall") && $CurrentForm->hasValue("o_Jul_rainfall") && $this->Jul_rainfall->CurrentValue != $this->Jul_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Aug_rainfall") && $CurrentForm->hasValue("o_Aug_rainfall") && $this->Aug_rainfall->CurrentValue != $this->Aug_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Sep_rainfall") && $CurrentForm->hasValue("o_Sep_rainfall") && $this->Sep_rainfall->CurrentValue != $this->Sep_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Oct_rainfall") && $CurrentForm->hasValue("o_Oct_rainfall") && $this->Oct_rainfall->CurrentValue != $this->Oct_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Nov_rainfall") && $CurrentForm->hasValue("o_Nov_rainfall") && $this->Nov_rainfall->CurrentValue != $this->Nov_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Dec_rainfall") && $CurrentForm->hasValue("o_Dec_rainfall") && $this->Dec_rainfall->CurrentValue != $this->Dec_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Jan_rainfall") && $CurrentForm->hasValue("o_Jan_rainfall") && $this->Jan_rainfall->CurrentValue != $this->Jan_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Feb_rainfall") && $CurrentForm->hasValue("o_Feb_rainfall") && $this->Feb_rainfall->CurrentValue != $this->Feb_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mar_rainfall") && $CurrentForm->hasValue("o_Mar_rainfall") && $this->Mar_rainfall->CurrentValue != $this->Mar_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Apr_rainfall") && $CurrentForm->hasValue("o_Apr_rainfall") && $this->Apr_rainfall->CurrentValue != $this->Apr_rainfall->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_May_rainfall") && $CurrentForm->hasValue("o_May_rainfall") && $this->May_rainfall->CurrentValue != $this->May_rainfall->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fvw_tbl_sms_monthly_subdivisionlistsrch");
		$filterList = Concat($filterList, $this->Slno->AdvancedSearch->toJson(), ","); // Field Slno
		$filterList = Concat($filterList, $this->StationId->AdvancedSearch->toJson(), ","); // Field StationId
		$filterList = Concat($filterList, $this->SubDivisionId->AdvancedSearch->toJson(), ","); // Field SubDivisionId
		$filterList = Concat($filterList, $this->SenderMobileNumber->AdvancedSearch->toJson(), ","); // Field SenderMobileNumber
		$filterList = Concat($filterList, $this->Water_Year->AdvancedSearch->toJson(), ","); // Field Water_Year
		$filterList = Concat($filterList, $this->day_of_month->AdvancedSearch->toJson(), ","); // Field day_of_month
		$filterList = Concat($filterList, $this->Jun_rainfall->AdvancedSearch->toJson(), ","); // Field Jun_rainfall
		$filterList = Concat($filterList, $this->Jul_rainfall->AdvancedSearch->toJson(), ","); // Field Jul_rainfall
		$filterList = Concat($filterList, $this->Aug_rainfall->AdvancedSearch->toJson(), ","); // Field Aug_rainfall
		$filterList = Concat($filterList, $this->Sep_rainfall->AdvancedSearch->toJson(), ","); // Field Sep_rainfall
		$filterList = Concat($filterList, $this->Oct_rainfall->AdvancedSearch->toJson(), ","); // Field Oct_rainfall
		$filterList = Concat($filterList, $this->Nov_rainfall->AdvancedSearch->toJson(), ","); // Field Nov_rainfall
		$filterList = Concat($filterList, $this->Dec_rainfall->AdvancedSearch->toJson(), ","); // Field Dec_rainfall
		$filterList = Concat($filterList, $this->Jan_rainfall->AdvancedSearch->toJson(), ","); // Field Jan_rainfall
		$filterList = Concat($filterList, $this->Feb_rainfall->AdvancedSearch->toJson(), ","); // Field Feb_rainfall
		$filterList = Concat($filterList, $this->Mar_rainfall->AdvancedSearch->toJson(), ","); // Field Mar_rainfall
		$filterList = Concat($filterList, $this->Apr_rainfall->AdvancedSearch->toJson(), ","); // Field Apr_rainfall
		$filterList = Concat($filterList, $this->May_rainfall->AdvancedSearch->toJson(), ","); // Field May_rainfall
		$filterList = Concat($filterList, $this->IsChanged->AdvancedSearch->toJson(), ","); // Field IsChanged
		$filterList = Concat($filterList, $this->obs_owner->AdvancedSearch->toJson(), ","); // Field obs_owner

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
			$UserProfile->setSearchFilters(CurrentUserName(), "fvw_tbl_sms_monthly_subdivisionlistsrch", $filters);
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

		// Field SubDivisionId
		$this->SubDivisionId->AdvancedSearch->SearchValue = @$filter["x_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->SearchOperator = @$filter["z_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->SearchCondition = @$filter["v_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->SearchValue2 = @$filter["y_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->SearchOperator2 = @$filter["w_SubDivisionId"];
		$this->SubDivisionId->AdvancedSearch->save();

		// Field SenderMobileNumber
		$this->SenderMobileNumber->AdvancedSearch->SearchValue = @$filter["x_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchOperator = @$filter["z_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchCondition = @$filter["v_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_SenderMobileNumber"];
		$this->SenderMobileNumber->AdvancedSearch->save();

		// Field Water_Year
		$this->Water_Year->AdvancedSearch->SearchValue = @$filter["x_Water_Year"];
		$this->Water_Year->AdvancedSearch->SearchOperator = @$filter["z_Water_Year"];
		$this->Water_Year->AdvancedSearch->SearchCondition = @$filter["v_Water_Year"];
		$this->Water_Year->AdvancedSearch->SearchValue2 = @$filter["y_Water_Year"];
		$this->Water_Year->AdvancedSearch->SearchOperator2 = @$filter["w_Water_Year"];
		$this->Water_Year->AdvancedSearch->save();

		// Field day_of_month
		$this->day_of_month->AdvancedSearch->SearchValue = @$filter["x_day_of_month"];
		$this->day_of_month->AdvancedSearch->SearchOperator = @$filter["z_day_of_month"];
		$this->day_of_month->AdvancedSearch->SearchCondition = @$filter["v_day_of_month"];
		$this->day_of_month->AdvancedSearch->SearchValue2 = @$filter["y_day_of_month"];
		$this->day_of_month->AdvancedSearch->SearchOperator2 = @$filter["w_day_of_month"];
		$this->day_of_month->AdvancedSearch->save();

		// Field Jun_rainfall
		$this->Jun_rainfall->AdvancedSearch->SearchValue = @$filter["x_Jun_rainfall"];
		$this->Jun_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Jun_rainfall"];
		$this->Jun_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Jun_rainfall"];
		$this->Jun_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Jun_rainfall"];
		$this->Jun_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Jun_rainfall"];
		$this->Jun_rainfall->AdvancedSearch->save();

		// Field Jul_rainfall
		$this->Jul_rainfall->AdvancedSearch->SearchValue = @$filter["x_Jul_rainfall"];
		$this->Jul_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Jul_rainfall"];
		$this->Jul_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Jul_rainfall"];
		$this->Jul_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Jul_rainfall"];
		$this->Jul_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Jul_rainfall"];
		$this->Jul_rainfall->AdvancedSearch->save();

		// Field Aug_rainfall
		$this->Aug_rainfall->AdvancedSearch->SearchValue = @$filter["x_Aug_rainfall"];
		$this->Aug_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Aug_rainfall"];
		$this->Aug_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Aug_rainfall"];
		$this->Aug_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Aug_rainfall"];
		$this->Aug_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Aug_rainfall"];
		$this->Aug_rainfall->AdvancedSearch->save();

		// Field Sep_rainfall
		$this->Sep_rainfall->AdvancedSearch->SearchValue = @$filter["x_Sep_rainfall"];
		$this->Sep_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Sep_rainfall"];
		$this->Sep_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Sep_rainfall"];
		$this->Sep_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Sep_rainfall"];
		$this->Sep_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Sep_rainfall"];
		$this->Sep_rainfall->AdvancedSearch->save();

		// Field Oct_rainfall
		$this->Oct_rainfall->AdvancedSearch->SearchValue = @$filter["x_Oct_rainfall"];
		$this->Oct_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Oct_rainfall"];
		$this->Oct_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Oct_rainfall"];
		$this->Oct_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Oct_rainfall"];
		$this->Oct_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Oct_rainfall"];
		$this->Oct_rainfall->AdvancedSearch->save();

		// Field Nov_rainfall
		$this->Nov_rainfall->AdvancedSearch->SearchValue = @$filter["x_Nov_rainfall"];
		$this->Nov_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Nov_rainfall"];
		$this->Nov_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Nov_rainfall"];
		$this->Nov_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Nov_rainfall"];
		$this->Nov_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Nov_rainfall"];
		$this->Nov_rainfall->AdvancedSearch->save();

		// Field Dec_rainfall
		$this->Dec_rainfall->AdvancedSearch->SearchValue = @$filter["x_Dec_rainfall"];
		$this->Dec_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Dec_rainfall"];
		$this->Dec_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Dec_rainfall"];
		$this->Dec_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Dec_rainfall"];
		$this->Dec_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Dec_rainfall"];
		$this->Dec_rainfall->AdvancedSearch->save();

		// Field Jan_rainfall
		$this->Jan_rainfall->AdvancedSearch->SearchValue = @$filter["x_Jan_rainfall"];
		$this->Jan_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Jan_rainfall"];
		$this->Jan_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Jan_rainfall"];
		$this->Jan_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Jan_rainfall"];
		$this->Jan_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Jan_rainfall"];
		$this->Jan_rainfall->AdvancedSearch->save();

		// Field Feb_rainfall
		$this->Feb_rainfall->AdvancedSearch->SearchValue = @$filter["x_Feb_rainfall"];
		$this->Feb_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Feb_rainfall"];
		$this->Feb_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Feb_rainfall"];
		$this->Feb_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Feb_rainfall"];
		$this->Feb_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Feb_rainfall"];
		$this->Feb_rainfall->AdvancedSearch->save();

		// Field Mar_rainfall
		$this->Mar_rainfall->AdvancedSearch->SearchValue = @$filter["x_Mar_rainfall"];
		$this->Mar_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Mar_rainfall"];
		$this->Mar_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Mar_rainfall"];
		$this->Mar_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Mar_rainfall"];
		$this->Mar_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Mar_rainfall"];
		$this->Mar_rainfall->AdvancedSearch->save();

		// Field Apr_rainfall
		$this->Apr_rainfall->AdvancedSearch->SearchValue = @$filter["x_Apr_rainfall"];
		$this->Apr_rainfall->AdvancedSearch->SearchOperator = @$filter["z_Apr_rainfall"];
		$this->Apr_rainfall->AdvancedSearch->SearchCondition = @$filter["v_Apr_rainfall"];
		$this->Apr_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_Apr_rainfall"];
		$this->Apr_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_Apr_rainfall"];
		$this->Apr_rainfall->AdvancedSearch->save();

		// Field May_rainfall
		$this->May_rainfall->AdvancedSearch->SearchValue = @$filter["x_May_rainfall"];
		$this->May_rainfall->AdvancedSearch->SearchOperator = @$filter["z_May_rainfall"];
		$this->May_rainfall->AdvancedSearch->SearchCondition = @$filter["v_May_rainfall"];
		$this->May_rainfall->AdvancedSearch->SearchValue2 = @$filter["y_May_rainfall"];
		$this->May_rainfall->AdvancedSearch->SearchOperator2 = @$filter["w_May_rainfall"];
		$this->May_rainfall->AdvancedSearch->save();

		// Field IsChanged
		$this->IsChanged->AdvancedSearch->SearchValue = @$filter["x_IsChanged"];
		$this->IsChanged->AdvancedSearch->SearchOperator = @$filter["z_IsChanged"];
		$this->IsChanged->AdvancedSearch->SearchCondition = @$filter["v_IsChanged"];
		$this->IsChanged->AdvancedSearch->SearchValue2 = @$filter["y_IsChanged"];
		$this->IsChanged->AdvancedSearch->SearchOperator2 = @$filter["w_IsChanged"];
		$this->IsChanged->AdvancedSearch->save();

		// Field obs_owner
		$this->obs_owner->AdvancedSearch->SearchValue = @$filter["x_obs_owner"];
		$this->obs_owner->AdvancedSearch->SearchOperator = @$filter["z_obs_owner"];
		$this->obs_owner->AdvancedSearch->SearchCondition = @$filter["v_obs_owner"];
		$this->obs_owner->AdvancedSearch->SearchValue2 = @$filter["y_obs_owner"];
		$this->obs_owner->AdvancedSearch->SearchOperator2 = @$filter["w_obs_owner"];
		$this->obs_owner->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->SubDivisionId, $default, FALSE); // SubDivisionId
		$this->buildSearchSql($where, $this->SenderMobileNumber, $default, FALSE); // SenderMobileNumber
		$this->buildSearchSql($where, $this->Water_Year, $default, FALSE); // Water_Year
		$this->buildSearchSql($where, $this->day_of_month, $default, FALSE); // day_of_month
		$this->buildSearchSql($where, $this->Jun_rainfall, $default, FALSE); // Jun_rainfall
		$this->buildSearchSql($where, $this->Jul_rainfall, $default, FALSE); // Jul_rainfall
		$this->buildSearchSql($where, $this->Aug_rainfall, $default, FALSE); // Aug_rainfall
		$this->buildSearchSql($where, $this->Sep_rainfall, $default, FALSE); // Sep_rainfall
		$this->buildSearchSql($where, $this->Oct_rainfall, $default, FALSE); // Oct_rainfall
		$this->buildSearchSql($where, $this->Nov_rainfall, $default, FALSE); // Nov_rainfall
		$this->buildSearchSql($where, $this->Dec_rainfall, $default, FALSE); // Dec_rainfall
		$this->buildSearchSql($where, $this->Jan_rainfall, $default, FALSE); // Jan_rainfall
		$this->buildSearchSql($where, $this->Feb_rainfall, $default, FALSE); // Feb_rainfall
		$this->buildSearchSql($where, $this->Mar_rainfall, $default, FALSE); // Mar_rainfall
		$this->buildSearchSql($where, $this->Apr_rainfall, $default, FALSE); // Apr_rainfall
		$this->buildSearchSql($where, $this->May_rainfall, $default, FALSE); // May_rainfall
		$this->buildSearchSql($where, $this->IsChanged, $default, FALSE); // IsChanged
		$this->buildSearchSql($where, $this->obs_owner, $default, FALSE); // obs_owner

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->Slno->AdvancedSearch->save(); // Slno
			$this->StationId->AdvancedSearch->save(); // StationId
			$this->SubDivisionId->AdvancedSearch->save(); // SubDivisionId
			$this->SenderMobileNumber->AdvancedSearch->save(); // SenderMobileNumber
			$this->Water_Year->AdvancedSearch->save(); // Water_Year
			$this->day_of_month->AdvancedSearch->save(); // day_of_month
			$this->Jun_rainfall->AdvancedSearch->save(); // Jun_rainfall
			$this->Jul_rainfall->AdvancedSearch->save(); // Jul_rainfall
			$this->Aug_rainfall->AdvancedSearch->save(); // Aug_rainfall
			$this->Sep_rainfall->AdvancedSearch->save(); // Sep_rainfall
			$this->Oct_rainfall->AdvancedSearch->save(); // Oct_rainfall
			$this->Nov_rainfall->AdvancedSearch->save(); // Nov_rainfall
			$this->Dec_rainfall->AdvancedSearch->save(); // Dec_rainfall
			$this->Jan_rainfall->AdvancedSearch->save(); // Jan_rainfall
			$this->Feb_rainfall->AdvancedSearch->save(); // Feb_rainfall
			$this->Mar_rainfall->AdvancedSearch->save(); // Mar_rainfall
			$this->Apr_rainfall->AdvancedSearch->save(); // Apr_rainfall
			$this->May_rainfall->AdvancedSearch->save(); // May_rainfall
			$this->IsChanged->AdvancedSearch->save(); // IsChanged
			$this->obs_owner->AdvancedSearch->save(); // obs_owner
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

	// Check if search parm exists
	protected function checkSearchParms()
	{
		if ($this->Slno->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->StationId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SubDivisionId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SenderMobileNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Water_Year->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->day_of_month->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Jun_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Jul_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Aug_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Sep_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Oct_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Nov_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Dec_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Jan_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Feb_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Mar_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Apr_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->May_rainfall->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IsChanged->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->obs_owner->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->Slno->AdvancedSearch->unsetSession();
		$this->StationId->AdvancedSearch->unsetSession();
		$this->SubDivisionId->AdvancedSearch->unsetSession();
		$this->SenderMobileNumber->AdvancedSearch->unsetSession();
		$this->Water_Year->AdvancedSearch->unsetSession();
		$this->day_of_month->AdvancedSearch->unsetSession();
		$this->Jun_rainfall->AdvancedSearch->unsetSession();
		$this->Jul_rainfall->AdvancedSearch->unsetSession();
		$this->Aug_rainfall->AdvancedSearch->unsetSession();
		$this->Sep_rainfall->AdvancedSearch->unsetSession();
		$this->Oct_rainfall->AdvancedSearch->unsetSession();
		$this->Nov_rainfall->AdvancedSearch->unsetSession();
		$this->Dec_rainfall->AdvancedSearch->unsetSession();
		$this->Jan_rainfall->AdvancedSearch->unsetSession();
		$this->Feb_rainfall->AdvancedSearch->unsetSession();
		$this->Mar_rainfall->AdvancedSearch->unsetSession();
		$this->Apr_rainfall->AdvancedSearch->unsetSession();
		$this->May_rainfall->AdvancedSearch->unsetSession();
		$this->IsChanged->AdvancedSearch->unsetSession();
		$this->obs_owner->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore advanced search values
		$this->Slno->AdvancedSearch->load();
		$this->StationId->AdvancedSearch->load();
		$this->SubDivisionId->AdvancedSearch->load();
		$this->SenderMobileNumber->AdvancedSearch->load();
		$this->Water_Year->AdvancedSearch->load();
		$this->day_of_month->AdvancedSearch->load();
		$this->Jun_rainfall->AdvancedSearch->load();
		$this->Jul_rainfall->AdvancedSearch->load();
		$this->Aug_rainfall->AdvancedSearch->load();
		$this->Sep_rainfall->AdvancedSearch->load();
		$this->Oct_rainfall->AdvancedSearch->load();
		$this->Nov_rainfall->AdvancedSearch->load();
		$this->Dec_rainfall->AdvancedSearch->load();
		$this->Jan_rainfall->AdvancedSearch->load();
		$this->Feb_rainfall->AdvancedSearch->load();
		$this->Mar_rainfall->AdvancedSearch->load();
		$this->Apr_rainfall->AdvancedSearch->load();
		$this->May_rainfall->AdvancedSearch->load();
		$this->IsChanged->AdvancedSearch->load();
		$this->obs_owner->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->StationId); // StationId
			$this->updateSort($this->SubDivisionId); // SubDivisionId
			$this->updateSort($this->SenderMobileNumber); // SenderMobileNumber
			$this->updateSort($this->Water_Year); // Water_Year
			$this->updateSort($this->day_of_month); // day_of_month
			$this->updateSort($this->Jun_rainfall); // Jun_rainfall
			$this->updateSort($this->Jul_rainfall); // Jul_rainfall
			$this->updateSort($this->Aug_rainfall); // Aug_rainfall
			$this->updateSort($this->Sep_rainfall); // Sep_rainfall
			$this->updateSort($this->Oct_rainfall); // Oct_rainfall
			$this->updateSort($this->Nov_rainfall); // Nov_rainfall
			$this->updateSort($this->Dec_rainfall); // Dec_rainfall
			$this->updateSort($this->Jan_rainfall); // Jan_rainfall
			$this->updateSort($this->Feb_rainfall); // Feb_rainfall
			$this->updateSort($this->Mar_rainfall); // Mar_rainfall
			$this->updateSort($this->Apr_rainfall); // Apr_rainfall
			$this->updateSort($this->May_rainfall); // May_rainfall
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
				$this->Water_Year->setSort("ASC");
				$this->day_of_month->setSort("ASC");
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
				$this->SubDivisionId->setSort("");
				$this->SenderMobileNumber->setSort("");
				$this->Water_Year->setSort("");
				$this->day_of_month->setSort("");
				$this->Jun_rainfall->setSort("");
				$this->Jul_rainfall->setSort("");
				$this->Aug_rainfall->setSort("");
				$this->Sep_rainfall->setSort("");
				$this->Oct_rainfall->setSort("");
				$this->Nov_rainfall->setSort("");
				$this->Dec_rainfall->setSort("");
				$this->Jan_rainfall->setSort("");
				$this->Feb_rainfall->setSort("");
				$this->Mar_rainfall->setSort("");
				$this->Apr_rainfall->setSort("");
				$this->May_rainfall->setSort("");
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
		if ($Security->canEdit() && $this->showOptionLink('edit')) {
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fvw_tbl_sms_monthly_subdivisionlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fvw_tbl_sms_monthly_subdivisionlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fvw_tbl_sms_monthly_subdivisionlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		$this->SubDivisionId->CurrentValue = NULL;
		$this->SubDivisionId->OldValue = $this->SubDivisionId->CurrentValue;
		$this->SenderMobileNumber->CurrentValue = NULL;
		$this->SenderMobileNumber->OldValue = $this->SenderMobileNumber->CurrentValue;
		$this->Water_Year->CurrentValue = "2022-23";
		$this->Water_Year->OldValue = $this->Water_Year->CurrentValue;
		$this->day_of_month->CurrentValue = NULL;
		$this->day_of_month->OldValue = $this->day_of_month->CurrentValue;
		$this->Jun_rainfall->CurrentValue = NULL;
		$this->Jun_rainfall->OldValue = $this->Jun_rainfall->CurrentValue;
		$this->Jul_rainfall->CurrentValue = NULL;
		$this->Jul_rainfall->OldValue = $this->Jul_rainfall->CurrentValue;
		$this->Aug_rainfall->CurrentValue = NULL;
		$this->Aug_rainfall->OldValue = $this->Aug_rainfall->CurrentValue;
		$this->Sep_rainfall->CurrentValue = NULL;
		$this->Sep_rainfall->OldValue = $this->Sep_rainfall->CurrentValue;
		$this->Oct_rainfall->CurrentValue = NULL;
		$this->Oct_rainfall->OldValue = $this->Oct_rainfall->CurrentValue;
		$this->Nov_rainfall->CurrentValue = NULL;
		$this->Nov_rainfall->OldValue = $this->Nov_rainfall->CurrentValue;
		$this->Dec_rainfall->CurrentValue = NULL;
		$this->Dec_rainfall->OldValue = $this->Dec_rainfall->CurrentValue;
		$this->Jan_rainfall->CurrentValue = NULL;
		$this->Jan_rainfall->OldValue = $this->Jan_rainfall->CurrentValue;
		$this->Feb_rainfall->CurrentValue = NULL;
		$this->Feb_rainfall->OldValue = $this->Feb_rainfall->CurrentValue;
		$this->Mar_rainfall->CurrentValue = NULL;
		$this->Mar_rainfall->OldValue = $this->Mar_rainfall->CurrentValue;
		$this->Apr_rainfall->CurrentValue = NULL;
		$this->Apr_rainfall->OldValue = $this->Apr_rainfall->CurrentValue;
		$this->May_rainfall->CurrentValue = NULL;
		$this->May_rainfall->OldValue = $this->May_rainfall->CurrentValue;
		$this->IsChanged->CurrentValue = "N";
		$this->IsChanged->OldValue = $this->IsChanged->CurrentValue;
		$this->obs_owner->CurrentValue = CurrentUserID();
		$this->obs_owner->OldValue = $this->obs_owner->CurrentValue;
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

		// SubDivisionId
		if (!$this->isAddOrEdit() && $this->SubDivisionId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SubDivisionId->AdvancedSearch->SearchValue != "" || $this->SubDivisionId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SenderMobileNumber
		if (!$this->isAddOrEdit() && $this->SenderMobileNumber->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SenderMobileNumber->AdvancedSearch->SearchValue != "" || $this->SenderMobileNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Water_Year
		if (!$this->isAddOrEdit() && $this->Water_Year->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Water_Year->AdvancedSearch->SearchValue != "" || $this->Water_Year->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// day_of_month
		if (!$this->isAddOrEdit() && $this->day_of_month->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->day_of_month->AdvancedSearch->SearchValue != "" || $this->day_of_month->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Jun_rainfall
		if (!$this->isAddOrEdit() && $this->Jun_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Jun_rainfall->AdvancedSearch->SearchValue != "" || $this->Jun_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Jul_rainfall
		if (!$this->isAddOrEdit() && $this->Jul_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Jul_rainfall->AdvancedSearch->SearchValue != "" || $this->Jul_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Aug_rainfall
		if (!$this->isAddOrEdit() && $this->Aug_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Aug_rainfall->AdvancedSearch->SearchValue != "" || $this->Aug_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Sep_rainfall
		if (!$this->isAddOrEdit() && $this->Sep_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Sep_rainfall->AdvancedSearch->SearchValue != "" || $this->Sep_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Oct_rainfall
		if (!$this->isAddOrEdit() && $this->Oct_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Oct_rainfall->AdvancedSearch->SearchValue != "" || $this->Oct_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Nov_rainfall
		if (!$this->isAddOrEdit() && $this->Nov_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Nov_rainfall->AdvancedSearch->SearchValue != "" || $this->Nov_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Dec_rainfall
		if (!$this->isAddOrEdit() && $this->Dec_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Dec_rainfall->AdvancedSearch->SearchValue != "" || $this->Dec_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Jan_rainfall
		if (!$this->isAddOrEdit() && $this->Jan_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Jan_rainfall->AdvancedSearch->SearchValue != "" || $this->Jan_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Feb_rainfall
		if (!$this->isAddOrEdit() && $this->Feb_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Feb_rainfall->AdvancedSearch->SearchValue != "" || $this->Feb_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Mar_rainfall
		if (!$this->isAddOrEdit() && $this->Mar_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Mar_rainfall->AdvancedSearch->SearchValue != "" || $this->Mar_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Apr_rainfall
		if (!$this->isAddOrEdit() && $this->Apr_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Apr_rainfall->AdvancedSearch->SearchValue != "" || $this->Apr_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// May_rainfall
		if (!$this->isAddOrEdit() && $this->May_rainfall->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->May_rainfall->AdvancedSearch->SearchValue != "" || $this->May_rainfall->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// IsChanged
		if (!$this->isAddOrEdit() && $this->IsChanged->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->IsChanged->AdvancedSearch->SearchValue != "" || $this->IsChanged->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// obs_owner
		if (!$this->isAddOrEdit() && $this->obs_owner->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->obs_owner->AdvancedSearch->SearchValue != "" || $this->obs_owner->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// Check field name 'SubDivisionId' first before field var 'x_SubDivisionId'
		$val = $CurrentForm->hasValue("SubDivisionId") ? $CurrentForm->getValue("SubDivisionId") : $CurrentForm->getValue("x_SubDivisionId");
		if (!$this->SubDivisionId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SubDivisionId->Visible = FALSE; // Disable update for API request
			else
				$this->SubDivisionId->setFormValue($val);
		}

		// Check field name 'SenderMobileNumber' first before field var 'x_SenderMobileNumber'
		$val = $CurrentForm->hasValue("SenderMobileNumber") ? $CurrentForm->getValue("SenderMobileNumber") : $CurrentForm->getValue("x_SenderMobileNumber");
		if (!$this->SenderMobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SenderMobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->SenderMobileNumber->setFormValue($val);
		}

		// Check field name 'Water_Year' first before field var 'x_Water_Year'
		$val = $CurrentForm->hasValue("Water_Year") ? $CurrentForm->getValue("Water_Year") : $CurrentForm->getValue("x_Water_Year");
		if (!$this->Water_Year->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Water_Year->Visible = FALSE; // Disable update for API request
			else
				$this->Water_Year->setFormValue($val);
		}

		// Check field name 'day_of_month' first before field var 'x_day_of_month'
		$val = $CurrentForm->hasValue("day_of_month") ? $CurrentForm->getValue("day_of_month") : $CurrentForm->getValue("x_day_of_month");
		if (!$this->day_of_month->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->day_of_month->Visible = FALSE; // Disable update for API request
			else
				$this->day_of_month->setFormValue($val);
		}

		// Check field name 'Jun_rainfall' first before field var 'x_Jun_rainfall'
		$val = $CurrentForm->hasValue("Jun_rainfall") ? $CurrentForm->getValue("Jun_rainfall") : $CurrentForm->getValue("x_Jun_rainfall");
		if (!$this->Jun_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Jun_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Jun_rainfall->setFormValue($val);
		}

		// Check field name 'Jul_rainfall' first before field var 'x_Jul_rainfall'
		$val = $CurrentForm->hasValue("Jul_rainfall") ? $CurrentForm->getValue("Jul_rainfall") : $CurrentForm->getValue("x_Jul_rainfall");
		if (!$this->Jul_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Jul_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Jul_rainfall->setFormValue($val);
		}

		// Check field name 'Aug_rainfall' first before field var 'x_Aug_rainfall'
		$val = $CurrentForm->hasValue("Aug_rainfall") ? $CurrentForm->getValue("Aug_rainfall") : $CurrentForm->getValue("x_Aug_rainfall");
		if (!$this->Aug_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Aug_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Aug_rainfall->setFormValue($val);
		}

		// Check field name 'Sep_rainfall' first before field var 'x_Sep_rainfall'
		$val = $CurrentForm->hasValue("Sep_rainfall") ? $CurrentForm->getValue("Sep_rainfall") : $CurrentForm->getValue("x_Sep_rainfall");
		if (!$this->Sep_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Sep_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Sep_rainfall->setFormValue($val);
		}

		// Check field name 'Oct_rainfall' first before field var 'x_Oct_rainfall'
		$val = $CurrentForm->hasValue("Oct_rainfall") ? $CurrentForm->getValue("Oct_rainfall") : $CurrentForm->getValue("x_Oct_rainfall");
		if (!$this->Oct_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Oct_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Oct_rainfall->setFormValue($val);
		}

		// Check field name 'Nov_rainfall' first before field var 'x_Nov_rainfall'
		$val = $CurrentForm->hasValue("Nov_rainfall") ? $CurrentForm->getValue("Nov_rainfall") : $CurrentForm->getValue("x_Nov_rainfall");
		if (!$this->Nov_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Nov_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Nov_rainfall->setFormValue($val);
		}

		// Check field name 'Dec_rainfall' first before field var 'x_Dec_rainfall'
		$val = $CurrentForm->hasValue("Dec_rainfall") ? $CurrentForm->getValue("Dec_rainfall") : $CurrentForm->getValue("x_Dec_rainfall");
		if (!$this->Dec_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Dec_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Dec_rainfall->setFormValue($val);
		}

		// Check field name 'Jan_rainfall' first before field var 'x_Jan_rainfall'
		$val = $CurrentForm->hasValue("Jan_rainfall") ? $CurrentForm->getValue("Jan_rainfall") : $CurrentForm->getValue("x_Jan_rainfall");
		if (!$this->Jan_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Jan_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Jan_rainfall->setFormValue($val);
		}

		// Check field name 'Feb_rainfall' first before field var 'x_Feb_rainfall'
		$val = $CurrentForm->hasValue("Feb_rainfall") ? $CurrentForm->getValue("Feb_rainfall") : $CurrentForm->getValue("x_Feb_rainfall");
		if (!$this->Feb_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Feb_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Feb_rainfall->setFormValue($val);
		}

		// Check field name 'Mar_rainfall' first before field var 'x_Mar_rainfall'
		$val = $CurrentForm->hasValue("Mar_rainfall") ? $CurrentForm->getValue("Mar_rainfall") : $CurrentForm->getValue("x_Mar_rainfall");
		if (!$this->Mar_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Mar_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Mar_rainfall->setFormValue($val);
		}

		// Check field name 'Apr_rainfall' first before field var 'x_Apr_rainfall'
		$val = $CurrentForm->hasValue("Apr_rainfall") ? $CurrentForm->getValue("Apr_rainfall") : $CurrentForm->getValue("x_Apr_rainfall");
		if (!$this->Apr_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Apr_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->Apr_rainfall->setFormValue($val);
		}

		// Check field name 'May_rainfall' first before field var 'x_May_rainfall'
		$val = $CurrentForm->hasValue("May_rainfall") ? $CurrentForm->getValue("May_rainfall") : $CurrentForm->getValue("x_May_rainfall");
		if (!$this->May_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->May_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->May_rainfall->setFormValue($val);
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
		$this->SubDivisionId->CurrentValue = $this->SubDivisionId->FormValue;
		$this->SenderMobileNumber->CurrentValue = $this->SenderMobileNumber->FormValue;
		$this->Water_Year->CurrentValue = $this->Water_Year->FormValue;
		$this->day_of_month->CurrentValue = $this->day_of_month->FormValue;
		$this->Jun_rainfall->CurrentValue = $this->Jun_rainfall->FormValue;
		$this->Jul_rainfall->CurrentValue = $this->Jul_rainfall->FormValue;
		$this->Aug_rainfall->CurrentValue = $this->Aug_rainfall->FormValue;
		$this->Sep_rainfall->CurrentValue = $this->Sep_rainfall->FormValue;
		$this->Oct_rainfall->CurrentValue = $this->Oct_rainfall->FormValue;
		$this->Nov_rainfall->CurrentValue = $this->Nov_rainfall->FormValue;
		$this->Dec_rainfall->CurrentValue = $this->Dec_rainfall->FormValue;
		$this->Jan_rainfall->CurrentValue = $this->Jan_rainfall->FormValue;
		$this->Feb_rainfall->CurrentValue = $this->Feb_rainfall->FormValue;
		$this->Mar_rainfall->CurrentValue = $this->Mar_rainfall->FormValue;
		$this->Apr_rainfall->CurrentValue = $this->Apr_rainfall->FormValue;
		$this->May_rainfall->CurrentValue = $this->May_rainfall->FormValue;
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
		$this->SubDivisionId->setDbValue($row['SubDivisionId']);
		$this->SenderMobileNumber->setDbValue($row['SenderMobileNumber']);
		$this->Water_Year->setDbValue($row['Water_Year']);
		$this->day_of_month->setDbValue($row['day_of_month']);
		$this->Jun_rainfall->setDbValue($row['Jun_rainfall']);
		$this->Jul_rainfall->setDbValue($row['Jul_rainfall']);
		$this->Aug_rainfall->setDbValue($row['Aug_rainfall']);
		$this->Sep_rainfall->setDbValue($row['Sep_rainfall']);
		$this->Oct_rainfall->setDbValue($row['Oct_rainfall']);
		$this->Nov_rainfall->setDbValue($row['Nov_rainfall']);
		$this->Dec_rainfall->setDbValue($row['Dec_rainfall']);
		$this->Jan_rainfall->setDbValue($row['Jan_rainfall']);
		$this->Feb_rainfall->setDbValue($row['Feb_rainfall']);
		$this->Mar_rainfall->setDbValue($row['Mar_rainfall']);
		$this->Apr_rainfall->setDbValue($row['Apr_rainfall']);
		$this->May_rainfall->setDbValue($row['May_rainfall']);
		$this->IsChanged->setDbValue($row['IsChanged']);
		$this->obs_owner->setDbValue($row['obs_owner']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['Slno'] = $this->Slno->CurrentValue;
		$row['StationId'] = $this->StationId->CurrentValue;
		$row['SubDivisionId'] = $this->SubDivisionId->CurrentValue;
		$row['SenderMobileNumber'] = $this->SenderMobileNumber->CurrentValue;
		$row['Water_Year'] = $this->Water_Year->CurrentValue;
		$row['day_of_month'] = $this->day_of_month->CurrentValue;
		$row['Jun_rainfall'] = $this->Jun_rainfall->CurrentValue;
		$row['Jul_rainfall'] = $this->Jul_rainfall->CurrentValue;
		$row['Aug_rainfall'] = $this->Aug_rainfall->CurrentValue;
		$row['Sep_rainfall'] = $this->Sep_rainfall->CurrentValue;
		$row['Oct_rainfall'] = $this->Oct_rainfall->CurrentValue;
		$row['Nov_rainfall'] = $this->Nov_rainfall->CurrentValue;
		$row['Dec_rainfall'] = $this->Dec_rainfall->CurrentValue;
		$row['Jan_rainfall'] = $this->Jan_rainfall->CurrentValue;
		$row['Feb_rainfall'] = $this->Feb_rainfall->CurrentValue;
		$row['Mar_rainfall'] = $this->Mar_rainfall->CurrentValue;
		$row['Apr_rainfall'] = $this->Apr_rainfall->CurrentValue;
		$row['May_rainfall'] = $this->May_rainfall->CurrentValue;
		$row['IsChanged'] = $this->IsChanged->CurrentValue;
		$row['obs_owner'] = $this->obs_owner->CurrentValue;
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
		if ($this->Jun_rainfall->FormValue == $this->Jun_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Jun_rainfall->CurrentValue)))
			$this->Jun_rainfall->CurrentValue = ConvertToFloatString($this->Jun_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Jul_rainfall->FormValue == $this->Jul_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Jul_rainfall->CurrentValue)))
			$this->Jul_rainfall->CurrentValue = ConvertToFloatString($this->Jul_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Aug_rainfall->FormValue == $this->Aug_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Aug_rainfall->CurrentValue)))
			$this->Aug_rainfall->CurrentValue = ConvertToFloatString($this->Aug_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Sep_rainfall->FormValue == $this->Sep_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Sep_rainfall->CurrentValue)))
			$this->Sep_rainfall->CurrentValue = ConvertToFloatString($this->Sep_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Oct_rainfall->FormValue == $this->Oct_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Oct_rainfall->CurrentValue)))
			$this->Oct_rainfall->CurrentValue = ConvertToFloatString($this->Oct_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Nov_rainfall->FormValue == $this->Nov_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Nov_rainfall->CurrentValue)))
			$this->Nov_rainfall->CurrentValue = ConvertToFloatString($this->Nov_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Dec_rainfall->FormValue == $this->Dec_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Dec_rainfall->CurrentValue)))
			$this->Dec_rainfall->CurrentValue = ConvertToFloatString($this->Dec_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Jan_rainfall->FormValue == $this->Jan_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Jan_rainfall->CurrentValue)))
			$this->Jan_rainfall->CurrentValue = ConvertToFloatString($this->Jan_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Feb_rainfall->FormValue == $this->Feb_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Feb_rainfall->CurrentValue)))
			$this->Feb_rainfall->CurrentValue = ConvertToFloatString($this->Feb_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Mar_rainfall->FormValue == $this->Mar_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Mar_rainfall->CurrentValue)))
			$this->Mar_rainfall->CurrentValue = ConvertToFloatString($this->Mar_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Apr_rainfall->FormValue == $this->Apr_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->Apr_rainfall->CurrentValue)))
			$this->Apr_rainfall->CurrentValue = ConvertToFloatString($this->Apr_rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->May_rainfall->FormValue == $this->May_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->May_rainfall->CurrentValue)))
			$this->May_rainfall->CurrentValue = ConvertToFloatString($this->May_rainfall->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Slno
		// StationId
		// SubDivisionId
		// SenderMobileNumber
		// Water_Year
		// day_of_month
		// Jun_rainfall
		// Jul_rainfall
		// Aug_rainfall
		// Sep_rainfall
		// Oct_rainfall
		// Nov_rainfall
		// Dec_rainfall
		// Jan_rainfall
		// Feb_rainfall
		// Mar_rainfall
		// Apr_rainfall
		// May_rainfall
		// IsChanged
		// obs_owner

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

			// SenderMobileNumber
			$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
			$this->SenderMobileNumber->ViewCustomAttributes = "";

			// Water_Year
			$this->Water_Year->ViewValue = $this->Water_Year->CurrentValue;
			$this->Water_Year->ViewCustomAttributes = "";

			// day_of_month
			$this->day_of_month->ViewValue = $this->day_of_month->CurrentValue;
			$this->day_of_month->ViewValue = FormatNumber($this->day_of_month->ViewValue, 0, -2, -2, -2);
			$this->day_of_month->ViewCustomAttributes = "";

			// Jun_rainfall
			$this->Jun_rainfall->ViewValue = $this->Jun_rainfall->CurrentValue;
			$this->Jun_rainfall->ViewValue = FormatNumber($this->Jun_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Jun_rainfall->ViewCustomAttributes = "";

			// Jul_rainfall
			$this->Jul_rainfall->ViewValue = $this->Jul_rainfall->CurrentValue;
			$this->Jul_rainfall->ViewValue = FormatNumber($this->Jul_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Jul_rainfall->ViewCustomAttributes = "";

			// Aug_rainfall
			$this->Aug_rainfall->ViewValue = $this->Aug_rainfall->CurrentValue;
			$this->Aug_rainfall->ViewValue = FormatNumber($this->Aug_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Aug_rainfall->ViewCustomAttributes = "";

			// Sep_rainfall
			$this->Sep_rainfall->ViewValue = $this->Sep_rainfall->CurrentValue;
			$this->Sep_rainfall->ViewValue = FormatNumber($this->Sep_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Sep_rainfall->ViewCustomAttributes = "";

			// Oct_rainfall
			$this->Oct_rainfall->ViewValue = $this->Oct_rainfall->CurrentValue;
			$this->Oct_rainfall->ViewValue = FormatNumber($this->Oct_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Oct_rainfall->ViewCustomAttributes = "";

			// Nov_rainfall
			$this->Nov_rainfall->ViewValue = $this->Nov_rainfall->CurrentValue;
			$this->Nov_rainfall->ViewValue = FormatNumber($this->Nov_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Nov_rainfall->ViewCustomAttributes = "";

			// Dec_rainfall
			$this->Dec_rainfall->ViewValue = $this->Dec_rainfall->CurrentValue;
			$this->Dec_rainfall->ViewValue = FormatNumber($this->Dec_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Dec_rainfall->ViewCustomAttributes = "";

			// Jan_rainfall
			$this->Jan_rainfall->ViewValue = $this->Jan_rainfall->CurrentValue;
			$this->Jan_rainfall->ViewValue = FormatNumber($this->Jan_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Jan_rainfall->ViewCustomAttributes = "";

			// Feb_rainfall
			$this->Feb_rainfall->ViewValue = $this->Feb_rainfall->CurrentValue;
			$this->Feb_rainfall->ViewValue = FormatNumber($this->Feb_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Feb_rainfall->ViewCustomAttributes = "";

			// Mar_rainfall
			$this->Mar_rainfall->ViewValue = $this->Mar_rainfall->CurrentValue;
			$this->Mar_rainfall->ViewValue = FormatNumber($this->Mar_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Mar_rainfall->ViewCustomAttributes = "";

			// Apr_rainfall
			$this->Apr_rainfall->ViewValue = $this->Apr_rainfall->CurrentValue;
			$this->Apr_rainfall->ViewValue = FormatNumber($this->Apr_rainfall->ViewValue, 2, -2, -2, -2);
			$this->Apr_rainfall->ViewCustomAttributes = "";

			// May_rainfall
			$this->May_rainfall->ViewValue = $this->May_rainfall->CurrentValue;
			$this->May_rainfall->ViewValue = FormatNumber($this->May_rainfall->ViewValue, 2, -2, -2, -2);
			$this->May_rainfall->ViewCustomAttributes = "";

			// IsChanged
			$this->IsChanged->ViewValue = $this->IsChanged->CurrentValue;
			$this->IsChanged->ViewCustomAttributes = "";

			// obs_owner
			$this->obs_owner->ViewValue = $this->obs_owner->CurrentValue;
			$this->obs_owner->ViewCustomAttributes = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// SubDivisionId
			$this->SubDivisionId->LinkCustomAttributes = "";
			$this->SubDivisionId->HrefValue = "";
			$this->SubDivisionId->TooltipValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";
			$this->SenderMobileNumber->TooltipValue = "";

			// Water_Year
			$this->Water_Year->LinkCustomAttributes = "";
			$this->Water_Year->HrefValue = "";
			$this->Water_Year->TooltipValue = "";

			// day_of_month
			$this->day_of_month->LinkCustomAttributes = "";
			$this->day_of_month->HrefValue = "";
			$this->day_of_month->TooltipValue = "";

			// Jun_rainfall
			$this->Jun_rainfall->LinkCustomAttributes = "";
			$this->Jun_rainfall->HrefValue = "";
			$this->Jun_rainfall->TooltipValue = "";

			// Jul_rainfall
			$this->Jul_rainfall->LinkCustomAttributes = "";
			$this->Jul_rainfall->HrefValue = "";
			$this->Jul_rainfall->TooltipValue = "";

			// Aug_rainfall
			$this->Aug_rainfall->LinkCustomAttributes = "";
			$this->Aug_rainfall->HrefValue = "";
			$this->Aug_rainfall->TooltipValue = "";

			// Sep_rainfall
			$this->Sep_rainfall->LinkCustomAttributes = "";
			$this->Sep_rainfall->HrefValue = "";
			$this->Sep_rainfall->TooltipValue = "";

			// Oct_rainfall
			$this->Oct_rainfall->LinkCustomAttributes = "";
			$this->Oct_rainfall->HrefValue = "";
			$this->Oct_rainfall->TooltipValue = "";

			// Nov_rainfall
			$this->Nov_rainfall->LinkCustomAttributes = "";
			$this->Nov_rainfall->HrefValue = "";
			$this->Nov_rainfall->TooltipValue = "";

			// Dec_rainfall
			$this->Dec_rainfall->LinkCustomAttributes = "";
			$this->Dec_rainfall->HrefValue = "";
			$this->Dec_rainfall->TooltipValue = "";

			// Jan_rainfall
			$this->Jan_rainfall->LinkCustomAttributes = "";
			$this->Jan_rainfall->HrefValue = "";
			$this->Jan_rainfall->TooltipValue = "";

			// Feb_rainfall
			$this->Feb_rainfall->LinkCustomAttributes = "";
			$this->Feb_rainfall->HrefValue = "";
			$this->Feb_rainfall->TooltipValue = "";

			// Mar_rainfall
			$this->Mar_rainfall->LinkCustomAttributes = "";
			$this->Mar_rainfall->HrefValue = "";
			$this->Mar_rainfall->TooltipValue = "";

			// Apr_rainfall
			$this->Apr_rainfall->LinkCustomAttributes = "";
			$this->Apr_rainfall->HrefValue = "";
			$this->Apr_rainfall->TooltipValue = "";

			// May_rainfall
			$this->May_rainfall->LinkCustomAttributes = "";
			$this->May_rainfall->HrefValue = "";
			$this->May_rainfall->TooltipValue = "";
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

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			if (!$this->SenderMobileNumber->Raw)
				$this->SenderMobileNumber->CurrentValue = HtmlDecode($this->SenderMobileNumber->CurrentValue);
			$this->SenderMobileNumber->EditValue = HtmlEncode($this->SenderMobileNumber->CurrentValue);

			// Water_Year
			$this->Water_Year->EditAttrs["class"] = "form-control";
			$this->Water_Year->EditCustomAttributes = "";
			if (!$this->Water_Year->Raw)
				$this->Water_Year->CurrentValue = HtmlDecode($this->Water_Year->CurrentValue);
			$this->Water_Year->EditValue = HtmlEncode($this->Water_Year->CurrentValue);

			// day_of_month
			$this->day_of_month->EditAttrs["class"] = "form-control";
			$this->day_of_month->EditCustomAttributes = "";
			$this->day_of_month->EditValue = HtmlEncode($this->day_of_month->CurrentValue);

			// Jun_rainfall
			$this->Jun_rainfall->EditAttrs["class"] = "form-control";
			$this->Jun_rainfall->EditCustomAttributes = "";
			$this->Jun_rainfall->EditValue = HtmlEncode($this->Jun_rainfall->CurrentValue);
			if (strval($this->Jun_rainfall->EditValue) != "" && is_numeric($this->Jun_rainfall->EditValue))
				$this->Jun_rainfall->EditValue = FormatNumber($this->Jun_rainfall->EditValue, -2, -2, -2, -2);
			

			// Jul_rainfall
			$this->Jul_rainfall->EditAttrs["class"] = "form-control";
			$this->Jul_rainfall->EditCustomAttributes = "";
			$this->Jul_rainfall->EditValue = HtmlEncode($this->Jul_rainfall->CurrentValue);
			if (strval($this->Jul_rainfall->EditValue) != "" && is_numeric($this->Jul_rainfall->EditValue))
				$this->Jul_rainfall->EditValue = FormatNumber($this->Jul_rainfall->EditValue, -2, -2, -2, -2);
			

			// Aug_rainfall
			$this->Aug_rainfall->EditAttrs["class"] = "form-control";
			$this->Aug_rainfall->EditCustomAttributes = "";
			$this->Aug_rainfall->EditValue = HtmlEncode($this->Aug_rainfall->CurrentValue);
			if (strval($this->Aug_rainfall->EditValue) != "" && is_numeric($this->Aug_rainfall->EditValue))
				$this->Aug_rainfall->EditValue = FormatNumber($this->Aug_rainfall->EditValue, -2, -2, -2, -2);
			

			// Sep_rainfall
			$this->Sep_rainfall->EditAttrs["class"] = "form-control";
			$this->Sep_rainfall->EditCustomAttributes = "";
			$this->Sep_rainfall->EditValue = HtmlEncode($this->Sep_rainfall->CurrentValue);
			if (strval($this->Sep_rainfall->EditValue) != "" && is_numeric($this->Sep_rainfall->EditValue))
				$this->Sep_rainfall->EditValue = FormatNumber($this->Sep_rainfall->EditValue, -2, -2, -2, -2);
			

			// Oct_rainfall
			$this->Oct_rainfall->EditAttrs["class"] = "form-control";
			$this->Oct_rainfall->EditCustomAttributes = "";
			$this->Oct_rainfall->EditValue = HtmlEncode($this->Oct_rainfall->CurrentValue);
			if (strval($this->Oct_rainfall->EditValue) != "" && is_numeric($this->Oct_rainfall->EditValue))
				$this->Oct_rainfall->EditValue = FormatNumber($this->Oct_rainfall->EditValue, -2, -2, -2, -2);
			

			// Nov_rainfall
			$this->Nov_rainfall->EditAttrs["class"] = "form-control";
			$this->Nov_rainfall->EditCustomAttributes = "";
			$this->Nov_rainfall->EditValue = HtmlEncode($this->Nov_rainfall->CurrentValue);
			if (strval($this->Nov_rainfall->EditValue) != "" && is_numeric($this->Nov_rainfall->EditValue))
				$this->Nov_rainfall->EditValue = FormatNumber($this->Nov_rainfall->EditValue, -2, -2, -2, -2);
			

			// Dec_rainfall
			$this->Dec_rainfall->EditAttrs["class"] = "form-control";
			$this->Dec_rainfall->EditCustomAttributes = "";
			$this->Dec_rainfall->EditValue = HtmlEncode($this->Dec_rainfall->CurrentValue);
			if (strval($this->Dec_rainfall->EditValue) != "" && is_numeric($this->Dec_rainfall->EditValue))
				$this->Dec_rainfall->EditValue = FormatNumber($this->Dec_rainfall->EditValue, -2, -2, -2, -2);
			

			// Jan_rainfall
			$this->Jan_rainfall->EditAttrs["class"] = "form-control";
			$this->Jan_rainfall->EditCustomAttributes = "";
			$this->Jan_rainfall->EditValue = HtmlEncode($this->Jan_rainfall->CurrentValue);
			if (strval($this->Jan_rainfall->EditValue) != "" && is_numeric($this->Jan_rainfall->EditValue))
				$this->Jan_rainfall->EditValue = FormatNumber($this->Jan_rainfall->EditValue, -2, -2, -2, -2);
			

			// Feb_rainfall
			$this->Feb_rainfall->EditAttrs["class"] = "form-control";
			$this->Feb_rainfall->EditCustomAttributes = "";
			$this->Feb_rainfall->EditValue = HtmlEncode($this->Feb_rainfall->CurrentValue);
			if (strval($this->Feb_rainfall->EditValue) != "" && is_numeric($this->Feb_rainfall->EditValue))
				$this->Feb_rainfall->EditValue = FormatNumber($this->Feb_rainfall->EditValue, -2, -2, -2, -2);
			

			// Mar_rainfall
			$this->Mar_rainfall->EditAttrs["class"] = "form-control";
			$this->Mar_rainfall->EditCustomAttributes = "";
			$this->Mar_rainfall->EditValue = HtmlEncode($this->Mar_rainfall->CurrentValue);
			if (strval($this->Mar_rainfall->EditValue) != "" && is_numeric($this->Mar_rainfall->EditValue))
				$this->Mar_rainfall->EditValue = FormatNumber($this->Mar_rainfall->EditValue, -2, -2, -2, -2);
			

			// Apr_rainfall
			$this->Apr_rainfall->EditAttrs["class"] = "form-control";
			$this->Apr_rainfall->EditCustomAttributes = "";
			$this->Apr_rainfall->EditValue = HtmlEncode($this->Apr_rainfall->CurrentValue);
			if (strval($this->Apr_rainfall->EditValue) != "" && is_numeric($this->Apr_rainfall->EditValue))
				$this->Apr_rainfall->EditValue = FormatNumber($this->Apr_rainfall->EditValue, -2, -2, -2, -2);
			

			// May_rainfall
			$this->May_rainfall->EditAttrs["class"] = "form-control";
			$this->May_rainfall->EditCustomAttributes = "";
			$this->May_rainfall->EditValue = HtmlEncode($this->May_rainfall->CurrentValue);
			if (strval($this->May_rainfall->EditValue) != "" && is_numeric($this->May_rainfall->EditValue))
				$this->May_rainfall->EditValue = FormatNumber($this->May_rainfall->EditValue, -2, -2, -2, -2);
			

			// Add refer script
			// StationId

			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";

			// SubDivisionId
			$this->SubDivisionId->LinkCustomAttributes = "";
			$this->SubDivisionId->HrefValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";

			// Water_Year
			$this->Water_Year->LinkCustomAttributes = "";
			$this->Water_Year->HrefValue = "";

			// day_of_month
			$this->day_of_month->LinkCustomAttributes = "";
			$this->day_of_month->HrefValue = "";

			// Jun_rainfall
			$this->Jun_rainfall->LinkCustomAttributes = "";
			$this->Jun_rainfall->HrefValue = "";

			// Jul_rainfall
			$this->Jul_rainfall->LinkCustomAttributes = "";
			$this->Jul_rainfall->HrefValue = "";

			// Aug_rainfall
			$this->Aug_rainfall->LinkCustomAttributes = "";
			$this->Aug_rainfall->HrefValue = "";

			// Sep_rainfall
			$this->Sep_rainfall->LinkCustomAttributes = "";
			$this->Sep_rainfall->HrefValue = "";

			// Oct_rainfall
			$this->Oct_rainfall->LinkCustomAttributes = "";
			$this->Oct_rainfall->HrefValue = "";

			// Nov_rainfall
			$this->Nov_rainfall->LinkCustomAttributes = "";
			$this->Nov_rainfall->HrefValue = "";

			// Dec_rainfall
			$this->Dec_rainfall->LinkCustomAttributes = "";
			$this->Dec_rainfall->HrefValue = "";

			// Jan_rainfall
			$this->Jan_rainfall->LinkCustomAttributes = "";
			$this->Jan_rainfall->HrefValue = "";

			// Feb_rainfall
			$this->Feb_rainfall->LinkCustomAttributes = "";
			$this->Feb_rainfall->HrefValue = "";

			// Mar_rainfall
			$this->Mar_rainfall->LinkCustomAttributes = "";
			$this->Mar_rainfall->HrefValue = "";

			// Apr_rainfall
			$this->Apr_rainfall->LinkCustomAttributes = "";
			$this->Apr_rainfall->HrefValue = "";

			// May_rainfall
			$this->May_rainfall->LinkCustomAttributes = "";
			$this->May_rainfall->HrefValue = "";
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

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			$this->SenderMobileNumber->EditValue = $this->SenderMobileNumber->CurrentValue;
			$this->SenderMobileNumber->ViewCustomAttributes = "";

			// Water_Year
			$this->Water_Year->EditAttrs["class"] = "form-control";
			$this->Water_Year->EditCustomAttributes = "";
			$this->Water_Year->EditValue = $this->Water_Year->CurrentValue;
			$this->Water_Year->ViewCustomAttributes = "";

			// day_of_month
			$this->day_of_month->EditAttrs["class"] = "form-control";
			$this->day_of_month->EditCustomAttributes = "";
			$this->day_of_month->EditValue = $this->day_of_month->CurrentValue;
			$this->day_of_month->EditValue = FormatNumber($this->day_of_month->EditValue, 0, -2, -2, -2);
			$this->day_of_month->ViewCustomAttributes = "";

			// Jun_rainfall
			$this->Jun_rainfall->EditAttrs["class"] = "form-control";
			$this->Jun_rainfall->EditCustomAttributes = "";
			$this->Jun_rainfall->EditValue = HtmlEncode($this->Jun_rainfall->CurrentValue);
			if (strval($this->Jun_rainfall->EditValue) != "" && is_numeric($this->Jun_rainfall->EditValue))
				$this->Jun_rainfall->EditValue = FormatNumber($this->Jun_rainfall->EditValue, -2, -2, -2, -2);
			

			// Jul_rainfall
			$this->Jul_rainfall->EditAttrs["class"] = "form-control";
			$this->Jul_rainfall->EditCustomAttributes = "";
			$this->Jul_rainfall->EditValue = HtmlEncode($this->Jul_rainfall->CurrentValue);
			if (strval($this->Jul_rainfall->EditValue) != "" && is_numeric($this->Jul_rainfall->EditValue))
				$this->Jul_rainfall->EditValue = FormatNumber($this->Jul_rainfall->EditValue, -2, -2, -2, -2);
			

			// Aug_rainfall
			$this->Aug_rainfall->EditAttrs["class"] = "form-control";
			$this->Aug_rainfall->EditCustomAttributes = "";
			$this->Aug_rainfall->EditValue = HtmlEncode($this->Aug_rainfall->CurrentValue);
			if (strval($this->Aug_rainfall->EditValue) != "" && is_numeric($this->Aug_rainfall->EditValue))
				$this->Aug_rainfall->EditValue = FormatNumber($this->Aug_rainfall->EditValue, -2, -2, -2, -2);
			

			// Sep_rainfall
			$this->Sep_rainfall->EditAttrs["class"] = "form-control";
			$this->Sep_rainfall->EditCustomAttributes = "";
			$this->Sep_rainfall->EditValue = HtmlEncode($this->Sep_rainfall->CurrentValue);
			if (strval($this->Sep_rainfall->EditValue) != "" && is_numeric($this->Sep_rainfall->EditValue))
				$this->Sep_rainfall->EditValue = FormatNumber($this->Sep_rainfall->EditValue, -2, -2, -2, -2);
			

			// Oct_rainfall
			$this->Oct_rainfall->EditAttrs["class"] = "form-control";
			$this->Oct_rainfall->EditCustomAttributes = "";
			$this->Oct_rainfall->EditValue = HtmlEncode($this->Oct_rainfall->CurrentValue);
			if (strval($this->Oct_rainfall->EditValue) != "" && is_numeric($this->Oct_rainfall->EditValue))
				$this->Oct_rainfall->EditValue = FormatNumber($this->Oct_rainfall->EditValue, -2, -2, -2, -2);
			

			// Nov_rainfall
			$this->Nov_rainfall->EditAttrs["class"] = "form-control";
			$this->Nov_rainfall->EditCustomAttributes = "";
			$this->Nov_rainfall->EditValue = HtmlEncode($this->Nov_rainfall->CurrentValue);
			if (strval($this->Nov_rainfall->EditValue) != "" && is_numeric($this->Nov_rainfall->EditValue))
				$this->Nov_rainfall->EditValue = FormatNumber($this->Nov_rainfall->EditValue, -2, -2, -2, -2);
			

			// Dec_rainfall
			$this->Dec_rainfall->EditAttrs["class"] = "form-control";
			$this->Dec_rainfall->EditCustomAttributes = "";
			$this->Dec_rainfall->EditValue = HtmlEncode($this->Dec_rainfall->CurrentValue);
			if (strval($this->Dec_rainfall->EditValue) != "" && is_numeric($this->Dec_rainfall->EditValue))
				$this->Dec_rainfall->EditValue = FormatNumber($this->Dec_rainfall->EditValue, -2, -2, -2, -2);
			

			// Jan_rainfall
			$this->Jan_rainfall->EditAttrs["class"] = "form-control";
			$this->Jan_rainfall->EditCustomAttributes = "";
			$this->Jan_rainfall->EditValue = HtmlEncode($this->Jan_rainfall->CurrentValue);
			if (strval($this->Jan_rainfall->EditValue) != "" && is_numeric($this->Jan_rainfall->EditValue))
				$this->Jan_rainfall->EditValue = FormatNumber($this->Jan_rainfall->EditValue, -2, -2, -2, -2);
			

			// Feb_rainfall
			$this->Feb_rainfall->EditAttrs["class"] = "form-control";
			$this->Feb_rainfall->EditCustomAttributes = "";
			$this->Feb_rainfall->EditValue = HtmlEncode($this->Feb_rainfall->CurrentValue);
			if (strval($this->Feb_rainfall->EditValue) != "" && is_numeric($this->Feb_rainfall->EditValue))
				$this->Feb_rainfall->EditValue = FormatNumber($this->Feb_rainfall->EditValue, -2, -2, -2, -2);
			

			// Mar_rainfall
			$this->Mar_rainfall->EditAttrs["class"] = "form-control";
			$this->Mar_rainfall->EditCustomAttributes = "";
			$this->Mar_rainfall->EditValue = HtmlEncode($this->Mar_rainfall->CurrentValue);
			if (strval($this->Mar_rainfall->EditValue) != "" && is_numeric($this->Mar_rainfall->EditValue))
				$this->Mar_rainfall->EditValue = FormatNumber($this->Mar_rainfall->EditValue, -2, -2, -2, -2);
			

			// Apr_rainfall
			$this->Apr_rainfall->EditAttrs["class"] = "form-control";
			$this->Apr_rainfall->EditCustomAttributes = "";
			$this->Apr_rainfall->EditValue = HtmlEncode($this->Apr_rainfall->CurrentValue);
			if (strval($this->Apr_rainfall->EditValue) != "" && is_numeric($this->Apr_rainfall->EditValue))
				$this->Apr_rainfall->EditValue = FormatNumber($this->Apr_rainfall->EditValue, -2, -2, -2, -2);
			

			// May_rainfall
			$this->May_rainfall->EditAttrs["class"] = "form-control";
			$this->May_rainfall->EditCustomAttributes = "";
			$this->May_rainfall->EditValue = HtmlEncode($this->May_rainfall->CurrentValue);
			if (strval($this->May_rainfall->EditValue) != "" && is_numeric($this->May_rainfall->EditValue))
				$this->May_rainfall->EditValue = FormatNumber($this->May_rainfall->EditValue, -2, -2, -2, -2);
			

			// Edit refer script
			// StationId

			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// SubDivisionId
			$this->SubDivisionId->LinkCustomAttributes = "";
			$this->SubDivisionId->HrefValue = "";
			$this->SubDivisionId->TooltipValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";
			$this->SenderMobileNumber->TooltipValue = "";

			// Water_Year
			$this->Water_Year->LinkCustomAttributes = "";
			$this->Water_Year->HrefValue = "";
			$this->Water_Year->TooltipValue = "";

			// day_of_month
			$this->day_of_month->LinkCustomAttributes = "";
			$this->day_of_month->HrefValue = "";
			$this->day_of_month->TooltipValue = "";

			// Jun_rainfall
			$this->Jun_rainfall->LinkCustomAttributes = "";
			$this->Jun_rainfall->HrefValue = "";

			// Jul_rainfall
			$this->Jul_rainfall->LinkCustomAttributes = "";
			$this->Jul_rainfall->HrefValue = "";

			// Aug_rainfall
			$this->Aug_rainfall->LinkCustomAttributes = "";
			$this->Aug_rainfall->HrefValue = "";

			// Sep_rainfall
			$this->Sep_rainfall->LinkCustomAttributes = "";
			$this->Sep_rainfall->HrefValue = "";

			// Oct_rainfall
			$this->Oct_rainfall->LinkCustomAttributes = "";
			$this->Oct_rainfall->HrefValue = "";

			// Nov_rainfall
			$this->Nov_rainfall->LinkCustomAttributes = "";
			$this->Nov_rainfall->HrefValue = "";

			// Dec_rainfall
			$this->Dec_rainfall->LinkCustomAttributes = "";
			$this->Dec_rainfall->HrefValue = "";

			// Jan_rainfall
			$this->Jan_rainfall->LinkCustomAttributes = "";
			$this->Jan_rainfall->HrefValue = "";

			// Feb_rainfall
			$this->Feb_rainfall->LinkCustomAttributes = "";
			$this->Feb_rainfall->HrefValue = "";

			// Mar_rainfall
			$this->Mar_rainfall->LinkCustomAttributes = "";
			$this->Mar_rainfall->HrefValue = "";

			// Apr_rainfall
			$this->Apr_rainfall->LinkCustomAttributes = "";
			$this->Apr_rainfall->HrefValue = "";

			// May_rainfall
			$this->May_rainfall->LinkCustomAttributes = "";
			$this->May_rainfall->HrefValue = "";
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

			// SubDivisionId
			$this->SubDivisionId->EditAttrs["class"] = "form-control";
			$this->SubDivisionId->EditCustomAttributes = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
			$this->SenderMobileNumber->EditCustomAttributes = "";
			if (!$this->SenderMobileNumber->Raw)
				$this->SenderMobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->SenderMobileNumber->AdvancedSearch->SearchValue);
			$this->SenderMobileNumber->EditValue = HtmlEncode($this->SenderMobileNumber->AdvancedSearch->SearchValue);

			// Water_Year
			$this->Water_Year->EditAttrs["class"] = "form-control";
			$this->Water_Year->EditCustomAttributes = "";
			if (!$this->Water_Year->Raw)
				$this->Water_Year->AdvancedSearch->SearchValue = HtmlDecode($this->Water_Year->AdvancedSearch->SearchValue);
			$this->Water_Year->EditValue = HtmlEncode($this->Water_Year->AdvancedSearch->SearchValue);

			// day_of_month
			$this->day_of_month->EditAttrs["class"] = "form-control";
			$this->day_of_month->EditCustomAttributes = "";
			$this->day_of_month->EditValue = HtmlEncode($this->day_of_month->AdvancedSearch->SearchValue);

			// Jun_rainfall
			$this->Jun_rainfall->EditAttrs["class"] = "form-control";
			$this->Jun_rainfall->EditCustomAttributes = "";
			$this->Jun_rainfall->EditValue = HtmlEncode($this->Jun_rainfall->AdvancedSearch->SearchValue);

			// Jul_rainfall
			$this->Jul_rainfall->EditAttrs["class"] = "form-control";
			$this->Jul_rainfall->EditCustomAttributes = "";
			$this->Jul_rainfall->EditValue = HtmlEncode($this->Jul_rainfall->AdvancedSearch->SearchValue);

			// Aug_rainfall
			$this->Aug_rainfall->EditAttrs["class"] = "form-control";
			$this->Aug_rainfall->EditCustomAttributes = "";
			$this->Aug_rainfall->EditValue = HtmlEncode($this->Aug_rainfall->AdvancedSearch->SearchValue);

			// Sep_rainfall
			$this->Sep_rainfall->EditAttrs["class"] = "form-control";
			$this->Sep_rainfall->EditCustomAttributes = "";
			$this->Sep_rainfall->EditValue = HtmlEncode($this->Sep_rainfall->AdvancedSearch->SearchValue);

			// Oct_rainfall
			$this->Oct_rainfall->EditAttrs["class"] = "form-control";
			$this->Oct_rainfall->EditCustomAttributes = "";
			$this->Oct_rainfall->EditValue = HtmlEncode($this->Oct_rainfall->AdvancedSearch->SearchValue);

			// Nov_rainfall
			$this->Nov_rainfall->EditAttrs["class"] = "form-control";
			$this->Nov_rainfall->EditCustomAttributes = "";
			$this->Nov_rainfall->EditValue = HtmlEncode($this->Nov_rainfall->AdvancedSearch->SearchValue);

			// Dec_rainfall
			$this->Dec_rainfall->EditAttrs["class"] = "form-control";
			$this->Dec_rainfall->EditCustomAttributes = "";
			$this->Dec_rainfall->EditValue = HtmlEncode($this->Dec_rainfall->AdvancedSearch->SearchValue);

			// Jan_rainfall
			$this->Jan_rainfall->EditAttrs["class"] = "form-control";
			$this->Jan_rainfall->EditCustomAttributes = "";
			$this->Jan_rainfall->EditValue = HtmlEncode($this->Jan_rainfall->AdvancedSearch->SearchValue);

			// Feb_rainfall
			$this->Feb_rainfall->EditAttrs["class"] = "form-control";
			$this->Feb_rainfall->EditCustomAttributes = "";
			$this->Feb_rainfall->EditValue = HtmlEncode($this->Feb_rainfall->AdvancedSearch->SearchValue);

			// Mar_rainfall
			$this->Mar_rainfall->EditAttrs["class"] = "form-control";
			$this->Mar_rainfall->EditCustomAttributes = "";
			$this->Mar_rainfall->EditValue = HtmlEncode($this->Mar_rainfall->AdvancedSearch->SearchValue);

			// Apr_rainfall
			$this->Apr_rainfall->EditAttrs["class"] = "form-control";
			$this->Apr_rainfall->EditCustomAttributes = "";
			$this->Apr_rainfall->EditValue = HtmlEncode($this->Apr_rainfall->AdvancedSearch->SearchValue);

			// May_rainfall
			$this->May_rainfall->EditAttrs["class"] = "form-control";
			$this->May_rainfall->EditCustomAttributes = "";
			$this->May_rainfall->EditValue = HtmlEncode($this->May_rainfall->AdvancedSearch->SearchValue);
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
		if ($this->SubDivisionId->Required) {
			if (!$this->SubDivisionId->IsDetailKey && $this->SubDivisionId->FormValue != NULL && $this->SubDivisionId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubDivisionId->caption(), $this->SubDivisionId->RequiredErrorMessage));
			}
		}
		if ($this->SenderMobileNumber->Required) {
			if (!$this->SenderMobileNumber->IsDetailKey && $this->SenderMobileNumber->FormValue != NULL && $this->SenderMobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SenderMobileNumber->caption(), $this->SenderMobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->Water_Year->Required) {
			if (!$this->Water_Year->IsDetailKey && $this->Water_Year->FormValue != NULL && $this->Water_Year->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Water_Year->caption(), $this->Water_Year->RequiredErrorMessage));
			}
		}
		if ($this->day_of_month->Required) {
			if (!$this->day_of_month->IsDetailKey && $this->day_of_month->FormValue != NULL && $this->day_of_month->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->day_of_month->caption(), $this->day_of_month->RequiredErrorMessage));
			}
		}
		if ($this->Jun_rainfall->Required) {
			if (!$this->Jun_rainfall->IsDetailKey && $this->Jun_rainfall->FormValue != NULL && $this->Jun_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jun_rainfall->caption(), $this->Jun_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Jun_rainfall->FormValue)) {
			AddMessage($FormError, $this->Jun_rainfall->errorMessage());
		}
		if ($this->Jul_rainfall->Required) {
			if (!$this->Jul_rainfall->IsDetailKey && $this->Jul_rainfall->FormValue != NULL && $this->Jul_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jul_rainfall->caption(), $this->Jul_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Jul_rainfall->FormValue)) {
			AddMessage($FormError, $this->Jul_rainfall->errorMessage());
		}
		if ($this->Aug_rainfall->Required) {
			if (!$this->Aug_rainfall->IsDetailKey && $this->Aug_rainfall->FormValue != NULL && $this->Aug_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Aug_rainfall->caption(), $this->Aug_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Aug_rainfall->FormValue)) {
			AddMessage($FormError, $this->Aug_rainfall->errorMessage());
		}
		if ($this->Sep_rainfall->Required) {
			if (!$this->Sep_rainfall->IsDetailKey && $this->Sep_rainfall->FormValue != NULL && $this->Sep_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sep_rainfall->caption(), $this->Sep_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Sep_rainfall->FormValue)) {
			AddMessage($FormError, $this->Sep_rainfall->errorMessage());
		}
		if ($this->Oct_rainfall->Required) {
			if (!$this->Oct_rainfall->IsDetailKey && $this->Oct_rainfall->FormValue != NULL && $this->Oct_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Oct_rainfall->caption(), $this->Oct_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Oct_rainfall->FormValue)) {
			AddMessage($FormError, $this->Oct_rainfall->errorMessage());
		}
		if ($this->Nov_rainfall->Required) {
			if (!$this->Nov_rainfall->IsDetailKey && $this->Nov_rainfall->FormValue != NULL && $this->Nov_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nov_rainfall->caption(), $this->Nov_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Nov_rainfall->FormValue)) {
			AddMessage($FormError, $this->Nov_rainfall->errorMessage());
		}
		if ($this->Dec_rainfall->Required) {
			if (!$this->Dec_rainfall->IsDetailKey && $this->Dec_rainfall->FormValue != NULL && $this->Dec_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dec_rainfall->caption(), $this->Dec_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Dec_rainfall->FormValue)) {
			AddMessage($FormError, $this->Dec_rainfall->errorMessage());
		}
		if ($this->Jan_rainfall->Required) {
			if (!$this->Jan_rainfall->IsDetailKey && $this->Jan_rainfall->FormValue != NULL && $this->Jan_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jan_rainfall->caption(), $this->Jan_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Jan_rainfall->FormValue)) {
			AddMessage($FormError, $this->Jan_rainfall->errorMessage());
		}
		if ($this->Feb_rainfall->Required) {
			if (!$this->Feb_rainfall->IsDetailKey && $this->Feb_rainfall->FormValue != NULL && $this->Feb_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Feb_rainfall->caption(), $this->Feb_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Feb_rainfall->FormValue)) {
			AddMessage($FormError, $this->Feb_rainfall->errorMessage());
		}
		if ($this->Mar_rainfall->Required) {
			if (!$this->Mar_rainfall->IsDetailKey && $this->Mar_rainfall->FormValue != NULL && $this->Mar_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mar_rainfall->caption(), $this->Mar_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Mar_rainfall->FormValue)) {
			AddMessage($FormError, $this->Mar_rainfall->errorMessage());
		}
		if ($this->Apr_rainfall->Required) {
			if (!$this->Apr_rainfall->IsDetailKey && $this->Apr_rainfall->FormValue != NULL && $this->Apr_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Apr_rainfall->caption(), $this->Apr_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Apr_rainfall->FormValue)) {
			AddMessage($FormError, $this->Apr_rainfall->errorMessage());
		}
		if ($this->May_rainfall->Required) {
			if (!$this->May_rainfall->IsDetailKey && $this->May_rainfall->FormValue != NULL && $this->May_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->May_rainfall->caption(), $this->May_rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->May_rainfall->FormValue)) {
			AddMessage($FormError, $this->May_rainfall->errorMessage());
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

			// Jun_rainfall
			$this->Jun_rainfall->setDbValueDef($rsnew, $this->Jun_rainfall->CurrentValue, NULL, $this->Jun_rainfall->ReadOnly);

			// Jul_rainfall
			$this->Jul_rainfall->setDbValueDef($rsnew, $this->Jul_rainfall->CurrentValue, NULL, $this->Jul_rainfall->ReadOnly);

			// Aug_rainfall
			$this->Aug_rainfall->setDbValueDef($rsnew, $this->Aug_rainfall->CurrentValue, NULL, $this->Aug_rainfall->ReadOnly);

			// Sep_rainfall
			$this->Sep_rainfall->setDbValueDef($rsnew, $this->Sep_rainfall->CurrentValue, NULL, $this->Sep_rainfall->ReadOnly);

			// Oct_rainfall
			$this->Oct_rainfall->setDbValueDef($rsnew, $this->Oct_rainfall->CurrentValue, NULL, $this->Oct_rainfall->ReadOnly);

			// Nov_rainfall
			$this->Nov_rainfall->setDbValueDef($rsnew, $this->Nov_rainfall->CurrentValue, NULL, $this->Nov_rainfall->ReadOnly);

			// Dec_rainfall
			$this->Dec_rainfall->setDbValueDef($rsnew, $this->Dec_rainfall->CurrentValue, NULL, $this->Dec_rainfall->ReadOnly);

			// Jan_rainfall
			$this->Jan_rainfall->setDbValueDef($rsnew, $this->Jan_rainfall->CurrentValue, NULL, $this->Jan_rainfall->ReadOnly);

			// Feb_rainfall
			$this->Feb_rainfall->setDbValueDef($rsnew, $this->Feb_rainfall->CurrentValue, NULL, $this->Feb_rainfall->ReadOnly);

			// Mar_rainfall
			$this->Mar_rainfall->setDbValueDef($rsnew, $this->Mar_rainfall->CurrentValue, NULL, $this->Mar_rainfall->ReadOnly);

			// Apr_rainfall
			$this->Apr_rainfall->setDbValueDef($rsnew, $this->Apr_rainfall->CurrentValue, NULL, $this->Apr_rainfall->ReadOnly);

			// May_rainfall
			$this->May_rainfall->setDbValueDef($rsnew, $this->May_rainfall->CurrentValue, NULL, $this->May_rainfall->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('Jun_rainfall')); // Jun_rainfall
		$hash .= GetFieldHash($rs->fields('Jul_rainfall')); // Jul_rainfall
		$hash .= GetFieldHash($rs->fields('Aug_rainfall')); // Aug_rainfall
		$hash .= GetFieldHash($rs->fields('Sep_rainfall')); // Sep_rainfall
		$hash .= GetFieldHash($rs->fields('Oct_rainfall')); // Oct_rainfall
		$hash .= GetFieldHash($rs->fields('Nov_rainfall')); // Nov_rainfall
		$hash .= GetFieldHash($rs->fields('Dec_rainfall')); // Dec_rainfall
		$hash .= GetFieldHash($rs->fields('Jan_rainfall')); // Jan_rainfall
		$hash .= GetFieldHash($rs->fields('Feb_rainfall')); // Feb_rainfall
		$hash .= GetFieldHash($rs->fields('Mar_rainfall')); // Mar_rainfall
		$hash .= GetFieldHash($rs->fields('Apr_rainfall')); // Apr_rainfall
		$hash .= GetFieldHash($rs->fields('May_rainfall')); // May_rainfall
		return md5($hash);
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Check if valid User ID
		$validUser = FALSE;
		if ($Security->currentUserID() != "" && !EmptyValue($this->obs_owner->CurrentValue) && !$Security->isAdmin()) { // Non system admin
			$validUser = $Security->isValidUserID($this->obs_owner->CurrentValue);
			if (!$validUser) {
				$userIdMsg = str_replace("%c", CurrentUserID(), $Language->phrase("UnAuthorizedUserID"));
				$userIdMsg = str_replace("%u", $this->obs_owner->CurrentValue, $userIdMsg);
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

		// StationId
		$this->StationId->setDbValueDef($rsnew, $this->StationId->CurrentValue, NULL, FALSE);

		// SubDivisionId
		$this->SubDivisionId->setDbValueDef($rsnew, $this->SubDivisionId->CurrentValue, 0, FALSE);

		// SenderMobileNumber
		$this->SenderMobileNumber->setDbValueDef($rsnew, $this->SenderMobileNumber->CurrentValue, NULL, FALSE);

		// Water_Year
		$this->Water_Year->setDbValueDef($rsnew, $this->Water_Year->CurrentValue, NULL, strval($this->Water_Year->CurrentValue) == "");

		// day_of_month
		$this->day_of_month->setDbValueDef($rsnew, $this->day_of_month->CurrentValue, NULL, FALSE);

		// Jun_rainfall
		$this->Jun_rainfall->setDbValueDef($rsnew, $this->Jun_rainfall->CurrentValue, NULL, FALSE);

		// Jul_rainfall
		$this->Jul_rainfall->setDbValueDef($rsnew, $this->Jul_rainfall->CurrentValue, NULL, FALSE);

		// Aug_rainfall
		$this->Aug_rainfall->setDbValueDef($rsnew, $this->Aug_rainfall->CurrentValue, NULL, FALSE);

		// Sep_rainfall
		$this->Sep_rainfall->setDbValueDef($rsnew, $this->Sep_rainfall->CurrentValue, NULL, FALSE);

		// Oct_rainfall
		$this->Oct_rainfall->setDbValueDef($rsnew, $this->Oct_rainfall->CurrentValue, NULL, FALSE);

		// Nov_rainfall
		$this->Nov_rainfall->setDbValueDef($rsnew, $this->Nov_rainfall->CurrentValue, NULL, FALSE);

		// Dec_rainfall
		$this->Dec_rainfall->setDbValueDef($rsnew, $this->Dec_rainfall->CurrentValue, NULL, FALSE);

		// Jan_rainfall
		$this->Jan_rainfall->setDbValueDef($rsnew, $this->Jan_rainfall->CurrentValue, NULL, FALSE);

		// Feb_rainfall
		$this->Feb_rainfall->setDbValueDef($rsnew, $this->Feb_rainfall->CurrentValue, NULL, FALSE);

		// Mar_rainfall
		$this->Mar_rainfall->setDbValueDef($rsnew, $this->Mar_rainfall->CurrentValue, NULL, FALSE);

		// Apr_rainfall
		$this->Apr_rainfall->setDbValueDef($rsnew, $this->Apr_rainfall->CurrentValue, NULL, FALSE);

		// May_rainfall
		$this->May_rainfall->setDbValueDef($rsnew, $this->May_rainfall->CurrentValue, NULL, FALSE);

		// obs_owner
		if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin
			$rsnew['obs_owner'] = CurrentUserID();
		}

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
		$this->SubDivisionId->AdvancedSearch->load();
		$this->SenderMobileNumber->AdvancedSearch->load();
		$this->Water_Year->AdvancedSearch->load();
		$this->day_of_month->AdvancedSearch->load();
		$this->Jun_rainfall->AdvancedSearch->load();
		$this->Jul_rainfall->AdvancedSearch->load();
		$this->Aug_rainfall->AdvancedSearch->load();
		$this->Sep_rainfall->AdvancedSearch->load();
		$this->Oct_rainfall->AdvancedSearch->load();
		$this->Nov_rainfall->AdvancedSearch->load();
		$this->Dec_rainfall->AdvancedSearch->load();
		$this->Jan_rainfall->AdvancedSearch->load();
		$this->Feb_rainfall->AdvancedSearch->load();
		$this->Mar_rainfall->AdvancedSearch->load();
		$this->Apr_rainfall->AdvancedSearch->load();
		$this->May_rainfall->AdvancedSearch->load();
		$this->IsChanged->AdvancedSearch->load();
		$this->obs_owner->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fvw_tbl_sms_monthly_subdivisionlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fvw_tbl_sms_monthly_subdivisionlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fvw_tbl_sms_monthly_subdivisionlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_vw_tbl_sms_monthly_subdivision" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_vw_tbl_sms_monthly_subdivision\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fvw_tbl_sms_monthly_subdivisionlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$this->ExportOptions->UseDropDownButton = FALSE;
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fvw_tbl_sms_monthly_subdivisionlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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

	// Show link optionally based on User ID
	protected function showOptionLink($id = "")
	{
		global $Security;
		if ($Security->isLoggedIn() && !$Security->isAdmin() && !$this->userIDAllow($id))
			return $Security->isValidUserID($this->obs_owner->CurrentValue);
		return TRUE;
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