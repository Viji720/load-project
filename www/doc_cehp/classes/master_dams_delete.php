<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class master_dams_delete extends master_dams
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'master_dams';

	// Page object name
	public $PageObjName = "master_dams_delete";

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

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

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
					$this->terminate(GetUrl("master_damslist.php"));
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
			$this->terminate("master_damslist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("master_damslist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("master_damslist.php"); // Return to list
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

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
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
				$thisKey .= $row['PIC'];
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("master_damslist.php"), "", $this->TableVar, TRUE);
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