<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class mst_ksndmc_station_add extends mst_ksndmc_station
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'mst_ksndmc_station';

	// Page object name
	public $PageObjName = "mst_ksndmc_station_add";

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

		// Table object (mst_ksndmc_station)
		if (!isset($GLOBALS["mst_ksndmc_station"]) || get_class($GLOBALS["mst_ksndmc_station"]) == PROJECT_NAMESPACE . "mst_ksndmc_station") {
			$GLOBALS["mst_ksndmc_station"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["mst_ksndmc_station"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'mst_ksndmc_station');

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
		global $mst_ksndmc_station;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($mst_ksndmc_station);
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
					if ($pageName == "mst_ksndmc_stationview.php")
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
			$key .= @$ar['Raingauge_id'];
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

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
			if (!$Security->canAdd()) {
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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("mst_ksndmc_stationlist.php"));
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
		$this->Raingauge_id->setVisibility();
		$this->District_name->setVisibility();
		$this->Taluka_name->setVisibility();
		$this->station_name->setVisibility();
		$this->station_latitude->setVisibility();
		$this->station_longitude->setVisibility();
		$this->kgis_district_id->Visible = FALSE;
		$this->kgis_taluka_id->Visible = FALSE;
		$this->kgis_hobli_id->Visible = FALSE;
		$this->kgis_village_id->Visible = FALSE;
		$this->kwris_basin_id->Visible = FALSE;
		$this->kwris_subbasin_id->Visible = FALSE;
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

		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("mst_ksndmc_stationlist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("Raingauge_id") !== NULL) {
				$this->Raingauge_id->setQueryStringValue(Get("Raingauge_id"));
				$this->setKey("Raingauge_id", $this->Raingauge_id->CurrentValue); // Set up key
			} else {
				$this->setKey("Raingauge_id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("mst_ksndmc_stationlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "mst_ksndmc_stationlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "mst_ksndmc_stationview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->Raingauge_id->CurrentValue = NULL;
		$this->Raingauge_id->OldValue = $this->Raingauge_id->CurrentValue;
		$this->District_name->CurrentValue = NULL;
		$this->District_name->OldValue = $this->District_name->CurrentValue;
		$this->Taluka_name->CurrentValue = NULL;
		$this->Taluka_name->OldValue = $this->Taluka_name->CurrentValue;
		$this->station_name->CurrentValue = NULL;
		$this->station_name->OldValue = $this->station_name->CurrentValue;
		$this->station_latitude->CurrentValue = NULL;
		$this->station_latitude->OldValue = $this->station_latitude->CurrentValue;
		$this->station_longitude->CurrentValue = NULL;
		$this->station_longitude->OldValue = $this->station_longitude->CurrentValue;
		$this->kgis_district_id->CurrentValue = NULL;
		$this->kgis_district_id->OldValue = $this->kgis_district_id->CurrentValue;
		$this->kgis_taluka_id->CurrentValue = NULL;
		$this->kgis_taluka_id->OldValue = $this->kgis_taluka_id->CurrentValue;
		$this->kgis_hobli_id->CurrentValue = NULL;
		$this->kgis_hobli_id->OldValue = $this->kgis_hobli_id->CurrentValue;
		$this->kgis_village_id->CurrentValue = NULL;
		$this->kgis_village_id->OldValue = $this->kgis_village_id->CurrentValue;
		$this->kwris_basin_id->CurrentValue = NULL;
		$this->kwris_basin_id->OldValue = $this->kwris_basin_id->CurrentValue;
		$this->kwris_subbasin_id->CurrentValue = NULL;
		$this->kwris_subbasin_id->OldValue = $this->kwris_subbasin_id->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Raingauge_id' first before field var 'x_Raingauge_id'
		$val = $CurrentForm->hasValue("Raingauge_id") ? $CurrentForm->getValue("Raingauge_id") : $CurrentForm->getValue("x_Raingauge_id");
		if (!$this->Raingauge_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Raingauge_id->Visible = FALSE; // Disable update for API request
			else
				$this->Raingauge_id->setFormValue($val);
		}

		// Check field name 'District_name' first before field var 'x_District_name'
		$val = $CurrentForm->hasValue("District_name") ? $CurrentForm->getValue("District_name") : $CurrentForm->getValue("x_District_name");
		if (!$this->District_name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->District_name->Visible = FALSE; // Disable update for API request
			else
				$this->District_name->setFormValue($val);
		}

		// Check field name 'Taluka_name' first before field var 'x_Taluka_name'
		$val = $CurrentForm->hasValue("Taluka_name") ? $CurrentForm->getValue("Taluka_name") : $CurrentForm->getValue("x_Taluka_name");
		if (!$this->Taluka_name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Taluka_name->Visible = FALSE; // Disable update for API request
			else
				$this->Taluka_name->setFormValue($val);
		}

		// Check field name 'station_name' first before field var 'x_station_name'
		$val = $CurrentForm->hasValue("station_name") ? $CurrentForm->getValue("station_name") : $CurrentForm->getValue("x_station_name");
		if (!$this->station_name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->station_name->Visible = FALSE; // Disable update for API request
			else
				$this->station_name->setFormValue($val);
		}

		// Check field name 'station_latitude' first before field var 'x_station_latitude'
		$val = $CurrentForm->hasValue("station_latitude") ? $CurrentForm->getValue("station_latitude") : $CurrentForm->getValue("x_station_latitude");
		if (!$this->station_latitude->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->station_latitude->Visible = FALSE; // Disable update for API request
			else
				$this->station_latitude->setFormValue($val);
		}

		// Check field name 'station_longitude' first before field var 'x_station_longitude'
		$val = $CurrentForm->hasValue("station_longitude") ? $CurrentForm->getValue("station_longitude") : $CurrentForm->getValue("x_station_longitude");
		if (!$this->station_longitude->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->station_longitude->Visible = FALSE; // Disable update for API request
			else
				$this->station_longitude->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Raingauge_id->CurrentValue = $this->Raingauge_id->FormValue;
		$this->District_name->CurrentValue = $this->District_name->FormValue;
		$this->Taluka_name->CurrentValue = $this->Taluka_name->FormValue;
		$this->station_name->CurrentValue = $this->station_name->FormValue;
		$this->station_latitude->CurrentValue = $this->station_latitude->FormValue;
		$this->station_longitude->CurrentValue = $this->station_longitude->FormValue;
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
		$this->Raingauge_id->setDbValue($row['Raingauge_id']);
		$this->District_name->setDbValue($row['District_name']);
		$this->Taluka_name->setDbValue($row['Taluka_name']);
		$this->station_name->setDbValue($row['station_name']);
		$this->station_latitude->setDbValue($row['station_latitude']);
		$this->station_longitude->setDbValue($row['station_longitude']);
		$this->kgis_district_id->setDbValue($row['kgis_district_id']);
		$this->kgis_taluka_id->setDbValue($row['kgis_taluka_id']);
		$this->kgis_hobli_id->setDbValue($row['kgis_hobli_id']);
		$this->kgis_village_id->setDbValue($row['kgis_village_id']);
		$this->kwris_basin_id->setDbValue($row['kwris_basin_id']);
		$this->kwris_subbasin_id->setDbValue($row['kwris_subbasin_id']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['Raingauge_id'] = $this->Raingauge_id->CurrentValue;
		$row['District_name'] = $this->District_name->CurrentValue;
		$row['Taluka_name'] = $this->Taluka_name->CurrentValue;
		$row['station_name'] = $this->station_name->CurrentValue;
		$row['station_latitude'] = $this->station_latitude->CurrentValue;
		$row['station_longitude'] = $this->station_longitude->CurrentValue;
		$row['kgis_district_id'] = $this->kgis_district_id->CurrentValue;
		$row['kgis_taluka_id'] = $this->kgis_taluka_id->CurrentValue;
		$row['kgis_hobli_id'] = $this->kgis_hobli_id->CurrentValue;
		$row['kgis_village_id'] = $this->kgis_village_id->CurrentValue;
		$row['kwris_basin_id'] = $this->kwris_basin_id->CurrentValue;
		$row['kwris_subbasin_id'] = $this->kwris_subbasin_id->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("Raingauge_id")) != "")
			$this->Raingauge_id->OldValue = $this->getKey("Raingauge_id"); // Raingauge_id
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

		if ($this->station_latitude->FormValue == $this->station_latitude->CurrentValue && is_numeric(ConvertToFloatString($this->station_latitude->CurrentValue)))
			$this->station_latitude->CurrentValue = ConvertToFloatString($this->station_latitude->CurrentValue);

		// Convert decimal values if posted back
		if ($this->station_longitude->FormValue == $this->station_longitude->CurrentValue && is_numeric(ConvertToFloatString($this->station_longitude->CurrentValue)))
			$this->station_longitude->CurrentValue = ConvertToFloatString($this->station_longitude->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Raingauge_id
		// District_name
		// Taluka_name
		// station_name
		// station_latitude
		// station_longitude
		// kgis_district_id
		// kgis_taluka_id
		// kgis_hobli_id
		// kgis_village_id
		// kwris_basin_id
		// kwris_subbasin_id

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Raingauge_id
			$this->Raingauge_id->ViewValue = $this->Raingauge_id->CurrentValue;
			$this->Raingauge_id->ViewCustomAttributes = "";

			// District_name
			$this->District_name->ViewValue = $this->District_name->CurrentValue;
			$this->District_name->ViewCustomAttributes = "";

			// Taluka_name
			$this->Taluka_name->ViewValue = $this->Taluka_name->CurrentValue;
			$this->Taluka_name->ViewCustomAttributes = "";

			// station_name
			$this->station_name->ViewValue = $this->station_name->CurrentValue;
			$this->station_name->ViewCustomAttributes = "";

			// station_latitude
			$this->station_latitude->ViewValue = $this->station_latitude->CurrentValue;
			$this->station_latitude->ViewValue = FormatNumber($this->station_latitude->ViewValue, 2, -2, -2, -2);
			$this->station_latitude->ViewCustomAttributes = "";

			// station_longitude
			$this->station_longitude->ViewValue = $this->station_longitude->CurrentValue;
			$this->station_longitude->ViewValue = FormatNumber($this->station_longitude->ViewValue, 2, -2, -2, -2);
			$this->station_longitude->ViewCustomAttributes = "";

			// kgis_district_id
			$this->kgis_district_id->ViewValue = $this->kgis_district_id->CurrentValue;
			$this->kgis_district_id->ViewValue = FormatNumber($this->kgis_district_id->ViewValue, 0, -2, -2, -2);
			$this->kgis_district_id->ViewCustomAttributes = "";

			// kgis_taluka_id
			$this->kgis_taluka_id->ViewValue = $this->kgis_taluka_id->CurrentValue;
			$this->kgis_taluka_id->ViewValue = FormatNumber($this->kgis_taluka_id->ViewValue, 0, -2, -2, -2);
			$this->kgis_taluka_id->ViewCustomAttributes = "";

			// kgis_hobli_id
			$this->kgis_hobli_id->ViewValue = $this->kgis_hobli_id->CurrentValue;
			$this->kgis_hobli_id->ViewValue = FormatNumber($this->kgis_hobli_id->ViewValue, 0, -2, -2, -2);
			$this->kgis_hobli_id->ViewCustomAttributes = "";

			// kgis_village_id
			$this->kgis_village_id->ViewValue = $this->kgis_village_id->CurrentValue;
			$this->kgis_village_id->ViewValue = FormatNumber($this->kgis_village_id->ViewValue, 0, -2, -2, -2);
			$this->kgis_village_id->ViewCustomAttributes = "";

			// kwris_basin_id
			$this->kwris_basin_id->ViewValue = $this->kwris_basin_id->CurrentValue;
			$this->kwris_basin_id->ViewValue = FormatNumber($this->kwris_basin_id->ViewValue, 0, -2, -2, -2);
			$this->kwris_basin_id->ViewCustomAttributes = "";

			// kwris_subbasin_id
			$this->kwris_subbasin_id->ViewValue = $this->kwris_subbasin_id->CurrentValue;
			$this->kwris_subbasin_id->ViewValue = FormatNumber($this->kwris_subbasin_id->ViewValue, 0, -2, -2, -2);
			$this->kwris_subbasin_id->ViewCustomAttributes = "";

			// Raingauge_id
			$this->Raingauge_id->LinkCustomAttributes = "";
			$this->Raingauge_id->HrefValue = "";
			$this->Raingauge_id->TooltipValue = "";

			// District_name
			$this->District_name->LinkCustomAttributes = "";
			$this->District_name->HrefValue = "";
			$this->District_name->TooltipValue = "";

			// Taluka_name
			$this->Taluka_name->LinkCustomAttributes = "";
			$this->Taluka_name->HrefValue = "";
			$this->Taluka_name->TooltipValue = "";

			// station_name
			$this->station_name->LinkCustomAttributes = "";
			$this->station_name->HrefValue = "";
			$this->station_name->TooltipValue = "";

			// station_latitude
			$this->station_latitude->LinkCustomAttributes = "";
			$this->station_latitude->HrefValue = "";
			$this->station_latitude->TooltipValue = "";

			// station_longitude
			$this->station_longitude->LinkCustomAttributes = "";
			$this->station_longitude->HrefValue = "";
			$this->station_longitude->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Raingauge_id
			$this->Raingauge_id->EditAttrs["class"] = "form-control";
			$this->Raingauge_id->EditCustomAttributes = "";
			$this->Raingauge_id->EditValue = HtmlEncode($this->Raingauge_id->CurrentValue);

			// District_name
			$this->District_name->EditAttrs["class"] = "form-control";
			$this->District_name->EditCustomAttributes = "";
			if (!$this->District_name->Raw)
				$this->District_name->CurrentValue = HtmlDecode($this->District_name->CurrentValue);
			$this->District_name->EditValue = HtmlEncode($this->District_name->CurrentValue);

			// Taluka_name
			$this->Taluka_name->EditAttrs["class"] = "form-control";
			$this->Taluka_name->EditCustomAttributes = "";
			if (!$this->Taluka_name->Raw)
				$this->Taluka_name->CurrentValue = HtmlDecode($this->Taluka_name->CurrentValue);
			$this->Taluka_name->EditValue = HtmlEncode($this->Taluka_name->CurrentValue);

			// station_name
			$this->station_name->EditAttrs["class"] = "form-control";
			$this->station_name->EditCustomAttributes = "";
			if (!$this->station_name->Raw)
				$this->station_name->CurrentValue = HtmlDecode($this->station_name->CurrentValue);
			$this->station_name->EditValue = HtmlEncode($this->station_name->CurrentValue);

			// station_latitude
			$this->station_latitude->EditAttrs["class"] = "form-control";
			$this->station_latitude->EditCustomAttributes = "";
			$this->station_latitude->EditValue = HtmlEncode($this->station_latitude->CurrentValue);
			if (strval($this->station_latitude->EditValue) != "" && is_numeric($this->station_latitude->EditValue))
				$this->station_latitude->EditValue = FormatNumber($this->station_latitude->EditValue, -2, -2, -2, -2);
			

			// station_longitude
			$this->station_longitude->EditAttrs["class"] = "form-control";
			$this->station_longitude->EditCustomAttributes = "";
			$this->station_longitude->EditValue = HtmlEncode($this->station_longitude->CurrentValue);
			if (strval($this->station_longitude->EditValue) != "" && is_numeric($this->station_longitude->EditValue))
				$this->station_longitude->EditValue = FormatNumber($this->station_longitude->EditValue, -2, -2, -2, -2);
			

			// Add refer script
			// Raingauge_id

			$this->Raingauge_id->LinkCustomAttributes = "";
			$this->Raingauge_id->HrefValue = "";

			// District_name
			$this->District_name->LinkCustomAttributes = "";
			$this->District_name->HrefValue = "";

			// Taluka_name
			$this->Taluka_name->LinkCustomAttributes = "";
			$this->Taluka_name->HrefValue = "";

			// station_name
			$this->station_name->LinkCustomAttributes = "";
			$this->station_name->HrefValue = "";

			// station_latitude
			$this->station_latitude->LinkCustomAttributes = "";
			$this->station_latitude->HrefValue = "";

			// station_longitude
			$this->station_longitude->LinkCustomAttributes = "";
			$this->station_longitude->HrefValue = "";
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
		if ($this->Raingauge_id->Required) {
			if (!$this->Raingauge_id->IsDetailKey && $this->Raingauge_id->FormValue != NULL && $this->Raingauge_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Raingauge_id->caption(), $this->Raingauge_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Raingauge_id->FormValue)) {
			AddMessage($FormError, $this->Raingauge_id->errorMessage());
		}
		if ($this->District_name->Required) {
			if (!$this->District_name->IsDetailKey && $this->District_name->FormValue != NULL && $this->District_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->District_name->caption(), $this->District_name->RequiredErrorMessage));
			}
		}
		if ($this->Taluka_name->Required) {
			if (!$this->Taluka_name->IsDetailKey && $this->Taluka_name->FormValue != NULL && $this->Taluka_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Taluka_name->caption(), $this->Taluka_name->RequiredErrorMessage));
			}
		}
		if ($this->station_name->Required) {
			if (!$this->station_name->IsDetailKey && $this->station_name->FormValue != NULL && $this->station_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->station_name->caption(), $this->station_name->RequiredErrorMessage));
			}
		}
		if ($this->station_latitude->Required) {
			if (!$this->station_latitude->IsDetailKey && $this->station_latitude->FormValue != NULL && $this->station_latitude->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->station_latitude->caption(), $this->station_latitude->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->station_latitude->FormValue)) {
			AddMessage($FormError, $this->station_latitude->errorMessage());
		}
		if ($this->station_longitude->Required) {
			if (!$this->station_longitude->IsDetailKey && $this->station_longitude->FormValue != NULL && $this->station_longitude->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->station_longitude->caption(), $this->station_longitude->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->station_longitude->FormValue)) {
			AddMessage($FormError, $this->station_longitude->errorMessage());
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

		// Raingauge_id
		$this->Raingauge_id->setDbValueDef($rsnew, $this->Raingauge_id->CurrentValue, 0, FALSE);

		// District_name
		$this->District_name->setDbValueDef($rsnew, $this->District_name->CurrentValue, NULL, FALSE);

		// Taluka_name
		$this->Taluka_name->setDbValueDef($rsnew, $this->Taluka_name->CurrentValue, NULL, FALSE);

		// station_name
		$this->station_name->setDbValueDef($rsnew, $this->station_name->CurrentValue, NULL, FALSE);

		// station_latitude
		$this->station_latitude->setDbValueDef($rsnew, $this->station_latitude->CurrentValue, NULL, FALSE);

		// station_longitude
		$this->station_longitude->setDbValueDef($rsnew, $this->station_longitude->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['Raingauge_id']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check for duplicate key
		if ($insertRow && $this->ValidateKey) {
			$filter = $this->getRecordFilter($rsnew);
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
				$this->setFailureMessage($keyErrMsg);
				$rsChk->close();
				$insertRow = FALSE;
			}
		}
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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("mst_ksndmc_stationlist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>