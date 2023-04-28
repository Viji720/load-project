<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class master_station_delete extends master_station
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'master_station';

	// Page object name
	public $PageObjName = "master_station_delete";

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

		// Table object (master_station)
		if (!isset($GLOBALS["master_station"]) || get_class($GLOBALS["master_station"]) == PROJECT_NAMESPACE . "master_station") {
			$GLOBALS["master_station"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["master_station"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'master_station');

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
		global $master_station;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($master_station);
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
			$key .= @$ar['StationId'];
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
					$this->terminate(GetUrl("master_stationlist.php"));
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
		$this->StationId->Visible = FALSE;
		$this->SubDivisionId->setVisibility();
		$this->StationName->setVisibility();
		$this->StationName_kn->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Longitude->setVisibility();
		$this->Latitude->setVisibility();
		$this->Altitude_MSL_in_mtrs->setVisibility();
		$this->station_type->setVisibility();
		$this->IsActive->setVisibility();
		$this->last_active_date->setVisibility();
		$this->DistrictId->setVisibility();
		$this->TalukID->setVisibility();
		$this->BasinId->setVisibility();
		$this->SubBasinId->setVisibility();
		$this->CatchUpId->setVisibility();
		$this->PIC->setVisibility();
		$this->RiverId->setVisibility();
		$this->Address->Visible = FALSE;
		$this->max_rainfall_date->setVisibility();
		$this->max_rainfall->setVisibility();
		$this->last_reading_date->setVisibility();
		$this->first_reading_date->setVisibility();
		$this->no_of_manual_entry->Visible = FALSE;
		$this->no_of_sms->Visible = FALSE;
		$this->NewStationCode->Visible = FALSE;
		$this->DivisionId->Visible = FALSE;
		$this->StationSetup->Visible = FALSE;
		$this->StationName_hi->Visible = FALSE;
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
		$this->setupLookupOptions($this->SubDivisionId);
		$this->setupLookupOptions($this->station_type);
		$this->setupLookupOptions($this->DistrictId);
		$this->setupLookupOptions($this->TalukID);
		$this->setupLookupOptions($this->BasinId);
		$this->setupLookupOptions($this->SubBasinId);
		$this->setupLookupOptions($this->CatchUpId);
		$this->setupLookupOptions($this->PIC);
		$this->setupLookupOptions($this->RiverId);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("master_stationlist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("master_stationlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("master_stationlist.php"); // Return to list
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
		$this->StationId->setDbValue($row['StationId']);
		$this->SubDivisionId->setDbValue($row['SubDivisionId']);
		$this->StationName->setDbValue($row['StationName']);
		$this->StationName_kn->setDbValue($row['StationName_kn']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Longitude->setDbValue($row['Longitude']);
		$this->Latitude->setDbValue($row['Latitude']);
		$this->Altitude_MSL_in_mtrs->setDbValue($row['Altitude_MSL_in_mtrs']);
		$this->station_type->setDbValue($row['station_type']);
		$this->IsActive->setDbValue($row['IsActive']);
		$this->last_active_date->setDbValue($row['last_active_date']);
		$this->DistrictId->setDbValue($row['DistrictId']);
		$this->TalukID->setDbValue($row['TalukID']);
		$this->BasinId->setDbValue($row['BasinId']);
		$this->SubBasinId->setDbValue($row['SubBasinId']);
		$this->CatchUpId->setDbValue($row['CatchUpId']);
		$this->PIC->setDbValue($row['PIC']);
		$this->RiverId->setDbValue($row['RiverId']);
		$this->Address->setDbValue($row['Address']);
		$this->max_rainfall_date->setDbValue($row['max_rainfall_date']);
		$this->max_rainfall->setDbValue($row['max_rainfall']);
		$this->last_reading_date->setDbValue($row['last_reading_date']);
		$this->first_reading_date->setDbValue($row['first_reading_date']);
		$this->no_of_manual_entry->setDbValue($row['no_of_manual_entry']);
		$this->no_of_sms->setDbValue($row['no_of_sms']);
		$this->NewStationCode->setDbValue($row['NewStationCode']);
		$this->DivisionId->setDbValue($row['DivisionId']);
		$this->StationSetup->setDbValue($row['StationSetup']);
		$this->StationName_hi->setDbValue($row['StationName_hi']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['StationId'] = NULL;
		$row['SubDivisionId'] = NULL;
		$row['StationName'] = NULL;
		$row['StationName_kn'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['Longitude'] = NULL;
		$row['Latitude'] = NULL;
		$row['Altitude_MSL_in_mtrs'] = NULL;
		$row['station_type'] = NULL;
		$row['IsActive'] = NULL;
		$row['last_active_date'] = NULL;
		$row['DistrictId'] = NULL;
		$row['TalukID'] = NULL;
		$row['BasinId'] = NULL;
		$row['SubBasinId'] = NULL;
		$row['CatchUpId'] = NULL;
		$row['PIC'] = NULL;
		$row['RiverId'] = NULL;
		$row['Address'] = NULL;
		$row['max_rainfall_date'] = NULL;
		$row['max_rainfall'] = NULL;
		$row['last_reading_date'] = NULL;
		$row['first_reading_date'] = NULL;
		$row['no_of_manual_entry'] = NULL;
		$row['no_of_sms'] = NULL;
		$row['NewStationCode'] = NULL;
		$row['DivisionId'] = NULL;
		$row['StationSetup'] = NULL;
		$row['StationName_hi'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->Longitude->FormValue == $this->Longitude->CurrentValue && is_numeric(ConvertToFloatString($this->Longitude->CurrentValue)))
			$this->Longitude->CurrentValue = ConvertToFloatString($this->Longitude->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Latitude->FormValue == $this->Latitude->CurrentValue && is_numeric(ConvertToFloatString($this->Latitude->CurrentValue)))
			$this->Latitude->CurrentValue = ConvertToFloatString($this->Latitude->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Altitude_MSL_in_mtrs->FormValue == $this->Altitude_MSL_in_mtrs->CurrentValue && is_numeric(ConvertToFloatString($this->Altitude_MSL_in_mtrs->CurrentValue)))
			$this->Altitude_MSL_in_mtrs->CurrentValue = ConvertToFloatString($this->Altitude_MSL_in_mtrs->CurrentValue);

		// Convert decimal values if posted back
		if ($this->max_rainfall->FormValue == $this->max_rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->max_rainfall->CurrentValue)))
			$this->max_rainfall->CurrentValue = ConvertToFloatString($this->max_rainfall->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// StationId
		// SubDivisionId
		// StationName
		// StationName_kn
		// MobileNumber
		// Longitude
		// Latitude
		// Altitude_MSL_in_mtrs
		// station_type
		// IsActive
		// last_active_date
		// DistrictId
		// TalukID
		// BasinId
		// SubBasinId
		// CatchUpId
		// PIC
		// RiverId
		// Address
		// max_rainfall_date
		// max_rainfall
		// last_reading_date
		// first_reading_date
		// no_of_manual_entry
		// no_of_sms
		// NewStationCode
		// DivisionId
		// StationSetup
		// StationName_hi

		$this->StationName_hi->CellCssStyle = "white-space: nowrap;";
		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// StationId
			$this->StationId->ViewValue = $this->StationId->CurrentValue;
			$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
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

			// StationName
			$this->StationName->ViewValue = $this->StationName->CurrentValue;
			$this->StationName->ViewCustomAttributes = "";

			// StationName_kn
			$this->StationName_kn->ViewValue = $this->StationName_kn->CurrentValue;
			$this->StationName_kn->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Longitude
			$this->Longitude->ViewValue = $this->Longitude->CurrentValue;
			$this->Longitude->ViewValue = FormatNumber($this->Longitude->ViewValue, 4, -2, -2, -2);
			$this->Longitude->ViewCustomAttributes = "";

			// Latitude
			$this->Latitude->ViewValue = $this->Latitude->CurrentValue;
			$this->Latitude->ViewValue = FormatNumber($this->Latitude->ViewValue, 4, -1, -2, -2);
			$this->Latitude->ViewCustomAttributes = "";

			// Altitude_MSL_in_mtrs
			$this->Altitude_MSL_in_mtrs->ViewValue = $this->Altitude_MSL_in_mtrs->CurrentValue;
			$this->Altitude_MSL_in_mtrs->ViewValue = FormatNumber($this->Altitude_MSL_in_mtrs->ViewValue, 1, -2, -2, -2);
			$this->Altitude_MSL_in_mtrs->ViewCustomAttributes = "";

			// station_type
			$curVal = strval($this->station_type->CurrentValue);
			if ($curVal != "") {
				$this->station_type->ViewValue = $this->station_type->lookupCacheOption($curVal);
				if ($this->station_type->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`station_type`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->station_type->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->station_type->ViewValue = $this->station_type->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->station_type->ViewValue = $this->station_type->CurrentValue;
					}
				}
			} else {
				$this->station_type->ViewValue = NULL;
			}
			$this->station_type->ViewCustomAttributes = "";

			// IsActive
			if (strval($this->IsActive->CurrentValue) != "") {
				$this->IsActive->ViewValue = $this->IsActive->optionCaption($this->IsActive->CurrentValue);
			} else {
				$this->IsActive->ViewValue = NULL;
			}
			$this->IsActive->ViewCustomAttributes = "";

			// last_active_date
			$this->last_active_date->ViewValue = $this->last_active_date->CurrentValue;
			$this->last_active_date->ViewValue = FormatDateTime($this->last_active_date->ViewValue, 7);
			$this->last_active_date->ViewCustomAttributes = "";

			// DistrictId
			$curVal = strval($this->DistrictId->CurrentValue);
			if ($curVal != "") {
				$this->DistrictId->ViewValue = $this->DistrictId->lookupCacheOption($curVal);
				if ($this->DistrictId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`DistrictId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->DistrictId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->DistrictId->ViewValue = $this->DistrictId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DistrictId->ViewValue = $this->DistrictId->CurrentValue;
					}
				}
			} else {
				$this->DistrictId->ViewValue = NULL;
			}
			$this->DistrictId->ViewCustomAttributes = "";

			// TalukID
			$curVal = strval($this->TalukID->CurrentValue);
			if ($curVal != "") {
				$this->TalukID->ViewValue = $this->TalukID->lookupCacheOption($curVal);
				if ($this->TalukID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TalukId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->TalukID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TalukID->ViewValue = $this->TalukID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TalukID->ViewValue = $this->TalukID->CurrentValue;
					}
				}
			} else {
				$this->TalukID->ViewValue = NULL;
			}
			$this->TalukID->ViewCustomAttributes = "";

			// BasinId
			$curVal = strval($this->BasinId->CurrentValue);
			if ($curVal != "") {
				$this->BasinId->ViewValue = $this->BasinId->lookupCacheOption($curVal);
				if ($this->BasinId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BasinId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BasinId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->BasinId->ViewValue = $this->BasinId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BasinId->ViewValue = $this->BasinId->CurrentValue;
					}
				}
			} else {
				$this->BasinId->ViewValue = NULL;
			}
			$this->BasinId->ViewCustomAttributes = "";

			// SubBasinId
			$curVal = strval($this->SubBasinId->CurrentValue);
			if ($curVal != "") {
				$this->SubBasinId->ViewValue = $this->SubBasinId->lookupCacheOption($curVal);
				if ($this->SubBasinId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`SubBasinId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->SubBasinId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->SubBasinId->ViewValue = $this->SubBasinId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SubBasinId->ViewValue = $this->SubBasinId->CurrentValue;
					}
				}
			} else {
				$this->SubBasinId->ViewValue = NULL;
			}
			$this->SubBasinId->ViewCustomAttributes = "";

			// CatchUpId
			$curVal = strval($this->CatchUpId->CurrentValue);
			if ($curVal != "") {
				$this->CatchUpId->ViewValue = $this->CatchUpId->lookupCacheOption($curVal);
				if ($this->CatchUpId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CatchUpId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->CatchUpId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->CatchUpId->ViewValue = $this->CatchUpId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CatchUpId->ViewValue = $this->CatchUpId->CurrentValue;
					}
				}
			} else {
				$this->CatchUpId->ViewValue = NULL;
			}
			$this->CatchUpId->ViewCustomAttributes = "";

			// PIC
			$curVal = strval($this->PIC->CurrentValue);
			if ($curVal != "") {
				$this->PIC->ViewValue = $this->PIC->lookupCacheOption($curVal);
				if ($this->PIC->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`PIC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PIC->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->PIC->ViewValue = $this->PIC->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PIC->ViewValue = $this->PIC->CurrentValue;
					}
				}
			} else {
				$this->PIC->ViewValue = NULL;
			}
			$this->PIC->ViewCustomAttributes = "";

			// RiverId
			$curVal = strval($this->RiverId->CurrentValue);
			if ($curVal != "") {
				$this->RiverId->ViewValue = $this->RiverId->lookupCacheOption($curVal);
				if ($this->RiverId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`RiverId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->RiverId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RiverId->ViewValue = $this->RiverId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RiverId->ViewValue = $this->RiverId->CurrentValue;
					}
				}
			} else {
				$this->RiverId->ViewValue = NULL;
			}
			$this->RiverId->ViewCustomAttributes = "";

			// max_rainfall_date
			$this->max_rainfall_date->ViewValue = $this->max_rainfall_date->CurrentValue;
			$this->max_rainfall_date->ViewValue = FormatDateTime($this->max_rainfall_date->ViewValue, 7);
			$this->max_rainfall_date->ViewCustomAttributes = "";

			// max_rainfall
			$this->max_rainfall->ViewValue = $this->max_rainfall->CurrentValue;
			$this->max_rainfall->ViewValue = FormatNumber($this->max_rainfall->ViewValue, 2, -2, -2, -2);
			$this->max_rainfall->ViewCustomAttributes = "";

			// last_reading_date
			$this->last_reading_date->ViewValue = $this->last_reading_date->CurrentValue;
			$this->last_reading_date->ViewValue = FormatDateTime($this->last_reading_date->ViewValue, 7);
			$this->last_reading_date->ViewCustomAttributes = "";

			// first_reading_date
			$this->first_reading_date->ViewValue = $this->first_reading_date->CurrentValue;
			$this->first_reading_date->ViewValue = FormatDateTime($this->first_reading_date->ViewValue, 7);
			$this->first_reading_date->ViewCustomAttributes = "";

			// no_of_manual_entry
			$this->no_of_manual_entry->ViewValue = $this->no_of_manual_entry->CurrentValue;
			$this->no_of_manual_entry->ViewValue = FormatNumber($this->no_of_manual_entry->ViewValue, 0, -2, -2, -2);
			$this->no_of_manual_entry->ViewCustomAttributes = "";

			// no_of_sms
			$this->no_of_sms->ViewValue = $this->no_of_sms->CurrentValue;
			$this->no_of_sms->ViewValue = FormatNumber($this->no_of_sms->ViewValue, 0, -2, -2, -2);
			$this->no_of_sms->ViewCustomAttributes = "";

			// NewStationCode
			$this->NewStationCode->ViewValue = $this->NewStationCode->CurrentValue;
			$this->NewStationCode->ViewCustomAttributes = "";

			// DivisionId
			$this->DivisionId->ViewValue = $this->DivisionId->CurrentValue;
			$this->DivisionId->ViewValue = FormatNumber($this->DivisionId->ViewValue, 0, -2, -2, -2);
			$this->DivisionId->ViewCustomAttributes = "";

			// StationSetup
			$this->StationSetup->ViewValue = $this->StationSetup->CurrentValue;
			$this->StationSetup->ViewCustomAttributes = "";

			// StationName_hi
			$this->StationName_hi->ViewValue = $this->StationName_hi->CurrentValue;
			$this->StationName_hi->ViewCustomAttributes = "";

			// SubDivisionId
			$this->SubDivisionId->LinkCustomAttributes = "";
			$this->SubDivisionId->HrefValue = "";
			$this->SubDivisionId->TooltipValue = "";

			// StationName
			$this->StationName->LinkCustomAttributes = "";
			$this->StationName->HrefValue = "";
			$this->StationName->TooltipValue = "";

			// StationName_kn
			$this->StationName_kn->LinkCustomAttributes = "";
			$this->StationName_kn->HrefValue = "";
			$this->StationName_kn->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// Longitude
			$this->Longitude->LinkCustomAttributes = "";
			$this->Longitude->HrefValue = "";
			$this->Longitude->TooltipValue = "";

			// Latitude
			$this->Latitude->LinkCustomAttributes = "";
			$this->Latitude->HrefValue = "";
			$this->Latitude->TooltipValue = "";

			// Altitude_MSL_in_mtrs
			$this->Altitude_MSL_in_mtrs->LinkCustomAttributes = "";
			$this->Altitude_MSL_in_mtrs->HrefValue = "";
			$this->Altitude_MSL_in_mtrs->TooltipValue = "";

			// station_type
			$this->station_type->LinkCustomAttributes = "";
			$this->station_type->HrefValue = "";
			$this->station_type->TooltipValue = "";

			// IsActive
			$this->IsActive->LinkCustomAttributes = "";
			$this->IsActive->HrefValue = "";
			$this->IsActive->TooltipValue = "";

			// last_active_date
			$this->last_active_date->LinkCustomAttributes = "";
			$this->last_active_date->HrefValue = "";
			$this->last_active_date->TooltipValue = "";

			// DistrictId
			$this->DistrictId->LinkCustomAttributes = "";
			$this->DistrictId->HrefValue = "";
			$this->DistrictId->TooltipValue = "";

			// TalukID
			$this->TalukID->LinkCustomAttributes = "";
			$this->TalukID->HrefValue = "";
			$this->TalukID->TooltipValue = "";

			// BasinId
			$this->BasinId->LinkCustomAttributes = "";
			$this->BasinId->HrefValue = "";
			$this->BasinId->TooltipValue = "";

			// SubBasinId
			$this->SubBasinId->LinkCustomAttributes = "";
			$this->SubBasinId->HrefValue = "";
			$this->SubBasinId->TooltipValue = "";

			// CatchUpId
			$this->CatchUpId->LinkCustomAttributes = "";
			$this->CatchUpId->HrefValue = "";
			$this->CatchUpId->TooltipValue = "";

			// PIC
			$this->PIC->LinkCustomAttributes = "";
			$this->PIC->HrefValue = "";
			$this->PIC->TooltipValue = "";

			// RiverId
			$this->RiverId->LinkCustomAttributes = "";
			$this->RiverId->HrefValue = "";
			$this->RiverId->TooltipValue = "";

			// max_rainfall_date
			$this->max_rainfall_date->LinkCustomAttributes = "";
			$this->max_rainfall_date->HrefValue = "";
			$this->max_rainfall_date->TooltipValue = "";

			// max_rainfall
			$this->max_rainfall->LinkCustomAttributes = "";
			$this->max_rainfall->HrefValue = "";
			$this->max_rainfall->TooltipValue = "";

			// last_reading_date
			$this->last_reading_date->LinkCustomAttributes = "";
			$this->last_reading_date->HrefValue = "";
			$this->last_reading_date->TooltipValue = "";

			// first_reading_date
			$this->first_reading_date->LinkCustomAttributes = "";
			$this->first_reading_date->HrefValue = "";
			$this->first_reading_date->TooltipValue = "";
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
				$thisKey .= $row['StationId'];
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("master_stationlist.php"), "", $this->TableVar, TRUE);
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
				case "x_SubDivisionId":
					break;
				case "x_station_type":
					break;
				case "x_IsActive":
					break;
				case "x_DistrictId":
					break;
				case "x_TalukID":
					break;
				case "x_BasinId":
					break;
				case "x_SubBasinId":
					break;
				case "x_CatchUpId":
					break;
				case "x_PIC":
					break;
				case "x_RiverId":
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
						case "x_SubDivisionId":
							break;
						case "x_station_type":
							break;
						case "x_DistrictId":
							break;
						case "x_TalukID":
							break;
						case "x_BasinId":
							break;
						case "x_SubBasinId":
							break;
						case "x_CatchUpId":
							break;
						case "x_PIC":
							break;
						case "x_RiverId":
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