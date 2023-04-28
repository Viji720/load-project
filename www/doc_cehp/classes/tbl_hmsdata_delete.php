<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class tbl_hmsdata_delete extends tbl_hmsdata
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'tbl_hmsdata';

	// Page object name
	public $PageObjName = "tbl_hmsdata_delete";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->Slno->Visible = FALSE;
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
		$this->CurrentAction = Param("action"); // Set up current action
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
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("tbl_hmsdatalist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("tbl_hmsdatalist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("tbl_hmsdatalist.php"); // Return to list
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
		$row = [];
		$row['Slno'] = NULL;
		$row['StationId'] = NULL;
		$row['obs_DateTime'] = NULL;
		$row['Temp_water_in_pan_inC_830AM'] = NULL;
		$row['Temp_water_in_pan_inC_530PM'] = NULL;
		$row['App_Evaporation_inMM_830AM'] = NULL;
		$row['App_Evaporation_inMM_530PM'] = NULL;
		$row['Rainfall_inMM_830AM'] = NULL;
		$row['Rainfall_inMM_530PM'] = NULL;
		$row['Evaporation_curing_inMM_830AM'] = NULL;
		$row['Evaporation_curing_inMM_530PM'] = NULL;
		$row['Evaporation_curing_DaywithRain_inMM'] = NULL;
		$row['Evaporation_curing_DaywithNoRain_inMM'] = NULL;
		$row['Dry_Bulb_Temp_inC_830AM'] = NULL;
		$row['Wet_Bulb_Temp_inC_830AM'] = NULL;
		$row['Vapour_Temp_inC_830AM'] = NULL;
		$row['Dry_Bulb_Temp_inC_530PM'] = NULL;
		$row['Wet_Bulb_Temp_inC_530PM'] = NULL;
		$row['Vapour_Temp_inC_530PM'] = NULL;
		$row['Max_Temp_inC'] = NULL;
		$row['Min_Temp_inC'] = NULL;
		$row['Total_Wind_Run_inKM_830AM'] = NULL;
		$row['Total_Wind_Run_inKM_530PM'] = NULL;
		$row['Average_Wind_Speed_inKM'] = NULL;
		$row['Number_of_Hours_of_Brightsuned'] = NULL;
		$row['Relative_Humidity_in_Precentage_830AM'] = NULL;
		$row['Relative_Humidity_in_Precentage_530PM'] = NULL;
		$row['obs_remarks'] = NULL;
		$row['Status'] = NULL;
		$row['Validated'] = NULL;
		$row['isFreeze'] = NULL;
		return $row;
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tbl_hmsdatalist.php"), "", $this->TableVar, TRUE);
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
} // End class
?>