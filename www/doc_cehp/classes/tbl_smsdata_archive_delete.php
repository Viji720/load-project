<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_smsdata_archive_delete extends tbl_smsdata_archive
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_smsdata_archive';

	// Page object name
	public $PageObjName = "tbl_smsdata_archive_delete";

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

		// Table object (tbl_smsdata_archive)
		if (!isset($GLOBALS["tbl_smsdata_archive"]) || get_class($GLOBALS["tbl_smsdata_archive"]) == PROJECT_NAMESPACE . "tbl_smsdata_archive") {
			$GLOBALS["tbl_smsdata_archive"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tbl_smsdata_archive"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tbl_smsdata_archive');

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
		global $tbl_smsdata_archive;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($tbl_smsdata_archive);
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
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $TotalRecords = 0;
	public $RecordCount;
	public $RecKeys = [];
	public $StartRowCount = 1;
	public $RowCount = 0;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canDelete()) {
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
			if (!$Security->canDelete()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("tbl_smsdata_archivelist.php"));
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
		$this->CurrentAction = Param("action"); // Set up current action
		$this->Slno->setVisibility();
		$this->SMSDateTime->setVisibility();
		$this->SystemDateTime->setVisibility();
		$this->ConfirmQueryDateTime->setVisibility();
		$this->ConfirmedDateTime->setVisibility();
		$this->SendDateTime->setVisibility();
		$this->SMSText->setVisibility();
		$this->Status->setVisibility();
		$this->obsremarks->setVisibility();
		$this->SenderMobileNumber->setVisibility();
		$this->SubDivId->setVisibility();
		$this->StationId->setVisibility();
		$this->IsFirstMsg->setVisibility();
		$this->Validated->setVisibility();
		$this->isFreeze->setVisibility();
		$this->rainfall->setVisibility();
		$this->min_air_temp->setVisibility();
		$this->max_air_temp->setVisibility();
		$this->atmospheric_pressure->setVisibility();
		$this->wind_speed->setVisibility();
		$this->precipitation->setVisibility();
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

		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("tbl_smsdata_archivelist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("tbl_smsdata_archivelist.php"); // Prevent SQL injection, return to list
			return;
		}

		// Set up filter (WHERE Clause)
		$this->CurrentFilter = $filter;

		// Get action
		if (IsApi()) {
			$this->CurrentAction = "delete"; // Delete record directly
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action");
		} elseif (Get("action") == "1") {
			$this->CurrentAction = "delete"; // Delete record directly
		} else {
			$this->CurrentAction = "show"; // Display record
		}
		if ($this->isDelete()) {
			$this->SendEmail = TRUE; // Send email on delete success
			if ($this->deleteRows()) { // Delete rows
				if ($this->getSuccessMessage() == "")
					$this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
				if (IsApi()) {
					$this->terminate(TRUE);
					return;
				} else {
					$this->terminate($this->getReturnUrl()); // Return to caller
				}
			} else { // Delete failed
				if (IsApi()) {
					$this->terminate();
					return;
				}
				$this->CurrentAction = "show"; // Display record
			}
		}
		if ($this->isShow()) { // Load records for display
			if ($this->Recordset = $this->loadRecordset())
				$this->TotalRecords = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecords <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->close();
				$this->terminate("tbl_smsdata_archivelist.php"); // Return to list
			}
		}
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
		$this->Slno->setDbValue($row['Slno']);
		$this->SMSDateTime->setDbValue($row['SMSDateTime']);
		$this->SystemDateTime->setDbValue($row['SystemDateTime']);
		$this->ConfirmQueryDateTime->setDbValue($row['ConfirmQueryDateTime']);
		$this->ConfirmedDateTime->setDbValue($row['ConfirmedDateTime']);
		$this->SendDateTime->setDbValue($row['SendDateTime']);
		$this->SMSText->setDbValue($row['SMSText']);
		$this->Status->setDbValue($row['Status']);
		$this->obsremarks->setDbValue($row['obsremarks']);
		$this->SenderMobileNumber->setDbValue($row['SenderMobileNumber']);
		$this->SubDivId->setDbValue($row['SubDivId']);
		$this->StationId->setDbValue($row['StationId']);
		$this->IsFirstMsg->setDbValue($row['IsFirstMsg']);
		$this->Validated->setDbValue($row['Validated']);
		$this->isFreeze->setDbValue($row['isFreeze']);
		$this->rainfall->setDbValue($row['rainfall']);
		$this->min_air_temp->setDbValue($row['min_air_temp']);
		$this->max_air_temp->setDbValue($row['max_air_temp']);
		$this->atmospheric_pressure->setDbValue($row['atmospheric_pressure']);
		$this->wind_speed->setDbValue($row['wind_speed']);
		$this->precipitation->setDbValue($row['precipitation']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['Slno'] = NULL;
		$row['SMSDateTime'] = NULL;
		$row['SystemDateTime'] = NULL;
		$row['ConfirmQueryDateTime'] = NULL;
		$row['ConfirmedDateTime'] = NULL;
		$row['SendDateTime'] = NULL;
		$row['SMSText'] = NULL;
		$row['Status'] = NULL;
		$row['obsremarks'] = NULL;
		$row['SenderMobileNumber'] = NULL;
		$row['SubDivId'] = NULL;
		$row['StationId'] = NULL;
		$row['IsFirstMsg'] = NULL;
		$row['Validated'] = NULL;
		$row['isFreeze'] = NULL;
		$row['rainfall'] = NULL;
		$row['min_air_temp'] = NULL;
		$row['max_air_temp'] = NULL;
		$row['atmospheric_pressure'] = NULL;
		$row['wind_speed'] = NULL;
		$row['precipitation'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->rainfall->FormValue == $this->rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->rainfall->CurrentValue)))
			$this->rainfall->CurrentValue = ConvertToFloatString($this->rainfall->CurrentValue);

		// Convert decimal values if posted back
		if ($this->min_air_temp->FormValue == $this->min_air_temp->CurrentValue && is_numeric(ConvertToFloatString($this->min_air_temp->CurrentValue)))
			$this->min_air_temp->CurrentValue = ConvertToFloatString($this->min_air_temp->CurrentValue);

		// Convert decimal values if posted back
		if ($this->max_air_temp->FormValue == $this->max_air_temp->CurrentValue && is_numeric(ConvertToFloatString($this->max_air_temp->CurrentValue)))
			$this->max_air_temp->CurrentValue = ConvertToFloatString($this->max_air_temp->CurrentValue);

		// Convert decimal values if posted back
		if ($this->atmospheric_pressure->FormValue == $this->atmospheric_pressure->CurrentValue && is_numeric(ConvertToFloatString($this->atmospheric_pressure->CurrentValue)))
			$this->atmospheric_pressure->CurrentValue = ConvertToFloatString($this->atmospheric_pressure->CurrentValue);

		// Convert decimal values if posted back
		if ($this->wind_speed->FormValue == $this->wind_speed->CurrentValue && is_numeric(ConvertToFloatString($this->wind_speed->CurrentValue)))
			$this->wind_speed->CurrentValue = ConvertToFloatString($this->wind_speed->CurrentValue);

		// Convert decimal values if posted back
		if ($this->precipitation->FormValue == $this->precipitation->CurrentValue && is_numeric(ConvertToFloatString($this->precipitation->CurrentValue)))
			$this->precipitation->CurrentValue = ConvertToFloatString($this->precipitation->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Slno
		// SMSDateTime
		// SystemDateTime
		// ConfirmQueryDateTime
		// ConfirmedDateTime
		// SendDateTime
		// SMSText
		// Status
		// obsremarks
		// SenderMobileNumber
		// SubDivId
		// StationId
		// IsFirstMsg
		// Validated
		// isFreeze
		// rainfall
		// min_air_temp
		// max_air_temp
		// atmospheric_pressure
		// wind_speed
		// precipitation

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Slno
			$this->Slno->ViewValue = $this->Slno->CurrentValue;
			$this->Slno->ViewValue = FormatNumber($this->Slno->ViewValue, 0, -2, -2, -2);
			$this->Slno->ViewCustomAttributes = "";

			// SMSDateTime
			$this->SMSDateTime->ViewValue = $this->SMSDateTime->CurrentValue;
			$this->SMSDateTime->ViewValue = FormatDateTime($this->SMSDateTime->ViewValue, 0);
			$this->SMSDateTime->ViewCustomAttributes = "";

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

			// SendDateTime
			$this->SendDateTime->ViewValue = $this->SendDateTime->CurrentValue;
			$this->SendDateTime->ViewValue = FormatDateTime($this->SendDateTime->ViewValue, 0);
			$this->SendDateTime->ViewCustomAttributes = "";

			// SMSText
			$this->SMSText->ViewValue = $this->SMSText->CurrentValue;
			$this->SMSText->ViewCustomAttributes = "";

			// Status
			$this->Status->ViewValue = $this->Status->CurrentValue;
			$this->Status->ViewValue = FormatNumber($this->Status->ViewValue, 0, -2, -2, -2);
			$this->Status->ViewCustomAttributes = "";

			// obsremarks
			$this->obsremarks->ViewValue = $this->obsremarks->CurrentValue;
			$this->obsremarks->ViewCustomAttributes = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
			$this->SenderMobileNumber->ViewCustomAttributes = "";

			// SubDivId
			$this->SubDivId->ViewValue = $this->SubDivId->CurrentValue;
			$this->SubDivId->ViewValue = FormatNumber($this->SubDivId->ViewValue, 0, -2, -2, -2);
			$this->SubDivId->ViewCustomAttributes = "";

			// StationId
			$this->StationId->ViewValue = $this->StationId->CurrentValue;
			$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
			$this->StationId->ViewCustomAttributes = "";

			// IsFirstMsg
			$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->CurrentValue;
			$this->IsFirstMsg->ViewValue = FormatNumber($this->IsFirstMsg->ViewValue, 0, -2, -2, -2);
			$this->IsFirstMsg->ViewCustomAttributes = "";

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

			// rainfall
			$this->rainfall->ViewValue = $this->rainfall->CurrentValue;
			$this->rainfall->ViewValue = FormatNumber($this->rainfall->ViewValue, 2, -2, -2, -2);
			$this->rainfall->ViewCustomAttributes = "";

			// min_air_temp
			$this->min_air_temp->ViewValue = $this->min_air_temp->CurrentValue;
			$this->min_air_temp->ViewValue = FormatNumber($this->min_air_temp->ViewValue, 2, -2, -2, -2);
			$this->min_air_temp->ViewCustomAttributes = "";

			// max_air_temp
			$this->max_air_temp->ViewValue = $this->max_air_temp->CurrentValue;
			$this->max_air_temp->ViewValue = FormatNumber($this->max_air_temp->ViewValue, 2, -2, -2, -2);
			$this->max_air_temp->ViewCustomAttributes = "";

			// atmospheric_pressure
			$this->atmospheric_pressure->ViewValue = $this->atmospheric_pressure->CurrentValue;
			$this->atmospheric_pressure->ViewValue = FormatNumber($this->atmospheric_pressure->ViewValue, 2, -2, -2, -2);
			$this->atmospheric_pressure->ViewCustomAttributes = "";

			// wind_speed
			$this->wind_speed->ViewValue = $this->wind_speed->CurrentValue;
			$this->wind_speed->ViewValue = FormatNumber($this->wind_speed->ViewValue, 2, -2, -2, -2);
			$this->wind_speed->ViewCustomAttributes = "";

			// precipitation
			$this->precipitation->ViewValue = $this->precipitation->CurrentValue;
			$this->precipitation->ViewValue = FormatNumber($this->precipitation->ViewValue, 2, -2, -2, -2);
			$this->precipitation->ViewCustomAttributes = "";

			// Slno
			$this->Slno->LinkCustomAttributes = "";
			$this->Slno->HrefValue = "";
			$this->Slno->TooltipValue = "";

			// SMSDateTime
			$this->SMSDateTime->LinkCustomAttributes = "";
			$this->SMSDateTime->HrefValue = "";
			$this->SMSDateTime->TooltipValue = "";

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

			// SendDateTime
			$this->SendDateTime->LinkCustomAttributes = "";
			$this->SendDateTime->HrefValue = "";
			$this->SendDateTime->TooltipValue = "";

			// SMSText
			$this->SMSText->LinkCustomAttributes = "";
			$this->SMSText->HrefValue = "";
			$this->SMSText->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// obsremarks
			$this->obsremarks->LinkCustomAttributes = "";
			$this->obsremarks->HrefValue = "";
			$this->obsremarks->TooltipValue = "";

			// SenderMobileNumber
			$this->SenderMobileNumber->LinkCustomAttributes = "";
			$this->SenderMobileNumber->HrefValue = "";
			$this->SenderMobileNumber->TooltipValue = "";

			// SubDivId
			$this->SubDivId->LinkCustomAttributes = "";
			$this->SubDivId->HrefValue = "";
			$this->SubDivId->TooltipValue = "";

			// StationId
			$this->StationId->LinkCustomAttributes = "";
			$this->StationId->HrefValue = "";
			$this->StationId->TooltipValue = "";

			// IsFirstMsg
			$this->IsFirstMsg->LinkCustomAttributes = "";
			$this->IsFirstMsg->HrefValue = "";
			$this->IsFirstMsg->TooltipValue = "";

			// Validated
			$this->Validated->LinkCustomAttributes = "";
			$this->Validated->HrefValue = "";
			$this->Validated->TooltipValue = "";

			// isFreeze
			$this->isFreeze->LinkCustomAttributes = "";
			$this->isFreeze->HrefValue = "";
			$this->isFreeze->TooltipValue = "";

			// rainfall
			$this->rainfall->LinkCustomAttributes = "";
			$this->rainfall->HrefValue = "";
			$this->rainfall->TooltipValue = "";

			// min_air_temp
			$this->min_air_temp->LinkCustomAttributes = "";
			$this->min_air_temp->HrefValue = "";
			$this->min_air_temp->TooltipValue = "";

			// max_air_temp
			$this->max_air_temp->LinkCustomAttributes = "";
			$this->max_air_temp->HrefValue = "";
			$this->max_air_temp->TooltipValue = "";

			// atmospheric_pressure
			$this->atmospheric_pressure->LinkCustomAttributes = "";
			$this->atmospheric_pressure->HrefValue = "";
			$this->atmospheric_pressure->TooltipValue = "";

			// wind_speed
			$this->wind_speed->LinkCustomAttributes = "";
			$this->wind_speed->HrefValue = "";
			$this->wind_speed->TooltipValue = "";

			// precipitation
			$this->precipitation->LinkCustomAttributes = "";
			$this->precipitation->HrefValue = "";
			$this->precipitation->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		$conn->beginTrans();

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
		if ($deleteRows) {
			$conn->commitTrans(); // Commit the changes
		} else {
			$conn->rollbackTrans(); // Rollback changes
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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tbl_smsdata_archivelist.php"), "", $this->TableVar, TRUE);
		$pageId = "delete";
		$Breadcrumb->add("delete", $pageId, $url);
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
} // End class
?>