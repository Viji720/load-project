<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class master_station_edit extends master_station
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'master_station';

	// Page object name
	public $PageObjName = "master_station_edit";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "master_stationview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;
	public $MultiPages; // Multi pages object

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
			if (!$Security->canEdit()) {
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
			if (!$Security->canEdit()) {
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

		// Create form object
		$CurrentForm = new HttpForm();
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
		$this->DistrictId->Visible = FALSE;
		$this->TalukID->Visible = FALSE;
		$this->BasinId->Visible = FALSE;
		$this->SubBasinId->Visible = FALSE;
		$this->CatchUpId->setVisibility();
		$this->PIC->setVisibility();
		$this->RiverId->setVisibility();
		$this->Address->setVisibility();
		$this->max_rainfall_date->setVisibility();
		$this->max_rainfall->setVisibility();
		$this->last_reading_date->setVisibility();
		$this->first_reading_date->setVisibility();
		$this->no_of_manual_entry->setVisibility();
		$this->no_of_sms->setVisibility();
		$this->NewStationCode->Visible = FALSE;
		$this->DivisionId->Visible = FALSE;
		$this->StationSetup->Visible = FALSE;
		$this->StationName_hi->Visible = FALSE;
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Set up multi page object
		$this->setupMultiPages();

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
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("master_stationlist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {

			// Load key values
			$loaded = TRUE;
			if (Get("StationId") !== NULL) {
				$this->StationId->setQueryStringValue(Get("StationId"));
				$this->StationId->setOldValue($this->StationId->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->StationId->setQueryStringValue(Key(0));
				$this->StationId->setOldValue($this->StationId->QueryStringValue);
			} elseif (Post("StationId") !== NULL) {
				$this->StationId->setFormValue(Post("StationId"));
				$this->StationId->setOldValue($this->StationId->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->StationId->setQueryStringValue(Route(2));
				$this->StationId->setOldValue($this->StationId->QueryStringValue);
			} else {
				$loaded = FALSE; // Unable to load key
			}

			// Load record
			if ($loaded)
				$loaded = $this->loadRow();
			if (!$loaded) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
				$this->terminate();
				return;
			}
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} else {
			if (Post("action") !== NULL) {
				$this->CurrentAction = Post("action"); // Get action code
				if (!$this->isShow()) // Not reload record, handle as postback
					$postBack = TRUE;

				// Load key from Form
				if ($CurrentForm->hasValue("x_StationId")) {
					$this->StationId->setFormValue($CurrentForm->getValue("x_StationId"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("StationId") !== NULL) {
					$this->StationId->setQueryStringValue(Get("StationId"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->StationId->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->StationId->CurrentValue = NULL;
				}
			}

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("master_stationlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "master_stationlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'SubDivisionId' first before field var 'x_SubDivisionId'
		$val = $CurrentForm->hasValue("SubDivisionId") ? $CurrentForm->getValue("SubDivisionId") : $CurrentForm->getValue("x_SubDivisionId");
		if (!$this->SubDivisionId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SubDivisionId->Visible = FALSE; // Disable update for API request
			else
				$this->SubDivisionId->setFormValue($val);
		}

		// Check field name 'StationName' first before field var 'x_StationName'
		$val = $CurrentForm->hasValue("StationName") ? $CurrentForm->getValue("StationName") : $CurrentForm->getValue("x_StationName");
		if (!$this->StationName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StationName->Visible = FALSE; // Disable update for API request
			else
				$this->StationName->setFormValue($val);
		}

		// Check field name 'StationName_kn' first before field var 'x_StationName_kn'
		$val = $CurrentForm->hasValue("StationName_kn") ? $CurrentForm->getValue("StationName_kn") : $CurrentForm->getValue("x_StationName_kn");
		if (!$this->StationName_kn->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StationName_kn->Visible = FALSE; // Disable update for API request
			else
				$this->StationName_kn->setFormValue($val);
		}

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}

		// Check field name 'Longitude' first before field var 'x_Longitude'
		$val = $CurrentForm->hasValue("Longitude") ? $CurrentForm->getValue("Longitude") : $CurrentForm->getValue("x_Longitude");
		if (!$this->Longitude->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Longitude->Visible = FALSE; // Disable update for API request
			else
				$this->Longitude->setFormValue($val);
		}

		// Check field name 'Latitude' first before field var 'x_Latitude'
		$val = $CurrentForm->hasValue("Latitude") ? $CurrentForm->getValue("Latitude") : $CurrentForm->getValue("x_Latitude");
		if (!$this->Latitude->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Latitude->Visible = FALSE; // Disable update for API request
			else
				$this->Latitude->setFormValue($val);
		}

		// Check field name 'Altitude_MSL_in_mtrs' first before field var 'x_Altitude_MSL_in_mtrs'
		$val = $CurrentForm->hasValue("Altitude_MSL_in_mtrs") ? $CurrentForm->getValue("Altitude_MSL_in_mtrs") : $CurrentForm->getValue("x_Altitude_MSL_in_mtrs");
		if (!$this->Altitude_MSL_in_mtrs->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Altitude_MSL_in_mtrs->Visible = FALSE; // Disable update for API request
			else
				$this->Altitude_MSL_in_mtrs->setFormValue($val);
		}

		// Check field name 'station_type' first before field var 'x_station_type'
		$val = $CurrentForm->hasValue("station_type") ? $CurrentForm->getValue("station_type") : $CurrentForm->getValue("x_station_type");
		if (!$this->station_type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->station_type->Visible = FALSE; // Disable update for API request
			else
				$this->station_type->setFormValue($val);
		}

		// Check field name 'IsActive' first before field var 'x_IsActive'
		$val = $CurrentForm->hasValue("IsActive") ? $CurrentForm->getValue("IsActive") : $CurrentForm->getValue("x_IsActive");
		if (!$this->IsActive->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IsActive->Visible = FALSE; // Disable update for API request
			else
				$this->IsActive->setFormValue($val);
		}

		// Check field name 'last_active_date' first before field var 'x_last_active_date'
		$val = $CurrentForm->hasValue("last_active_date") ? $CurrentForm->getValue("last_active_date") : $CurrentForm->getValue("x_last_active_date");
		if (!$this->last_active_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->last_active_date->Visible = FALSE; // Disable update for API request
			else
				$this->last_active_date->setFormValue($val);
			$this->last_active_date->CurrentValue = UnFormatDateTime($this->last_active_date->CurrentValue, 7);
		}

		// Check field name 'CatchUpId' first before field var 'x_CatchUpId'
		$val = $CurrentForm->hasValue("CatchUpId") ? $CurrentForm->getValue("CatchUpId") : $CurrentForm->getValue("x_CatchUpId");
		if (!$this->CatchUpId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CatchUpId->Visible = FALSE; // Disable update for API request
			else
				$this->CatchUpId->setFormValue($val);
		}

		// Check field name 'PIC' first before field var 'x_PIC'
		$val = $CurrentForm->hasValue("PIC") ? $CurrentForm->getValue("PIC") : $CurrentForm->getValue("x_PIC");
		if (!$this->PIC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PIC->Visible = FALSE; // Disable update for API request
			else
				$this->PIC->setFormValue($val);
		}

		// Check field name 'RiverId' first before field var 'x_RiverId'
		$val = $CurrentForm->hasValue("RiverId") ? $CurrentForm->getValue("RiverId") : $CurrentForm->getValue("x_RiverId");
		if (!$this->RiverId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RiverId->Visible = FALSE; // Disable update for API request
			else
				$this->RiverId->setFormValue($val);
		}

		// Check field name 'Address' first before field var 'x_Address'
		$val = $CurrentForm->hasValue("Address") ? $CurrentForm->getValue("Address") : $CurrentForm->getValue("x_Address");
		if (!$this->Address->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Address->Visible = FALSE; // Disable update for API request
			else
				$this->Address->setFormValue($val);
		}

		// Check field name 'max_rainfall_date' first before field var 'x_max_rainfall_date'
		$val = $CurrentForm->hasValue("max_rainfall_date") ? $CurrentForm->getValue("max_rainfall_date") : $CurrentForm->getValue("x_max_rainfall_date");
		if (!$this->max_rainfall_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->max_rainfall_date->Visible = FALSE; // Disable update for API request
			else
				$this->max_rainfall_date->setFormValue($val);
			$this->max_rainfall_date->CurrentValue = UnFormatDateTime($this->max_rainfall_date->CurrentValue, 7);
		}

		// Check field name 'max_rainfall' first before field var 'x_max_rainfall'
		$val = $CurrentForm->hasValue("max_rainfall") ? $CurrentForm->getValue("max_rainfall") : $CurrentForm->getValue("x_max_rainfall");
		if (!$this->max_rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->max_rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->max_rainfall->setFormValue($val);
		}

		// Check field name 'last_reading_date' first before field var 'x_last_reading_date'
		$val = $CurrentForm->hasValue("last_reading_date") ? $CurrentForm->getValue("last_reading_date") : $CurrentForm->getValue("x_last_reading_date");
		if (!$this->last_reading_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->last_reading_date->Visible = FALSE; // Disable update for API request
			else
				$this->last_reading_date->setFormValue($val);
			$this->last_reading_date->CurrentValue = UnFormatDateTime($this->last_reading_date->CurrentValue, 7);
		}

		// Check field name 'first_reading_date' first before field var 'x_first_reading_date'
		$val = $CurrentForm->hasValue("first_reading_date") ? $CurrentForm->getValue("first_reading_date") : $CurrentForm->getValue("x_first_reading_date");
		if (!$this->first_reading_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->first_reading_date->Visible = FALSE; // Disable update for API request
			else
				$this->first_reading_date->setFormValue($val);
			$this->first_reading_date->CurrentValue = UnFormatDateTime($this->first_reading_date->CurrentValue, 7);
		}

		// Check field name 'no_of_manual_entry' first before field var 'x_no_of_manual_entry'
		$val = $CurrentForm->hasValue("no_of_manual_entry") ? $CurrentForm->getValue("no_of_manual_entry") : $CurrentForm->getValue("x_no_of_manual_entry");
		if (!$this->no_of_manual_entry->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->no_of_manual_entry->Visible = FALSE; // Disable update for API request
			else
				$this->no_of_manual_entry->setFormValue($val);
		}

		// Check field name 'no_of_sms' first before field var 'x_no_of_sms'
		$val = $CurrentForm->hasValue("no_of_sms") ? $CurrentForm->getValue("no_of_sms") : $CurrentForm->getValue("x_no_of_sms");
		if (!$this->no_of_sms->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->no_of_sms->Visible = FALSE; // Disable update for API request
			else
				$this->no_of_sms->setFormValue($val);
		}

		// Check field name 'StationId' first before field var 'x_StationId'
		$val = $CurrentForm->hasValue("StationId") ? $CurrentForm->getValue("StationId") : $CurrentForm->getValue("x_StationId");
		if (!$this->StationId->IsDetailKey)
			$this->StationId->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->StationId->CurrentValue = $this->StationId->FormValue;
		$this->SubDivisionId->CurrentValue = $this->SubDivisionId->FormValue;
		$this->StationName->CurrentValue = $this->StationName->FormValue;
		$this->StationName_kn->CurrentValue = $this->StationName_kn->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->Longitude->CurrentValue = $this->Longitude->FormValue;
		$this->Latitude->CurrentValue = $this->Latitude->FormValue;
		$this->Altitude_MSL_in_mtrs->CurrentValue = $this->Altitude_MSL_in_mtrs->FormValue;
		$this->station_type->CurrentValue = $this->station_type->FormValue;
		$this->IsActive->CurrentValue = $this->IsActive->FormValue;
		$this->last_active_date->CurrentValue = $this->last_active_date->FormValue;
		$this->last_active_date->CurrentValue = UnFormatDateTime($this->last_active_date->CurrentValue, 7);
		$this->CatchUpId->CurrentValue = $this->CatchUpId->FormValue;
		$this->PIC->CurrentValue = $this->PIC->FormValue;
		$this->RiverId->CurrentValue = $this->RiverId->FormValue;
		$this->Address->CurrentValue = $this->Address->FormValue;
		$this->max_rainfall_date->CurrentValue = $this->max_rainfall_date->FormValue;
		$this->max_rainfall_date->CurrentValue = UnFormatDateTime($this->max_rainfall_date->CurrentValue, 7);
		$this->max_rainfall->CurrentValue = $this->max_rainfall->FormValue;
		$this->last_reading_date->CurrentValue = $this->last_reading_date->FormValue;
		$this->last_reading_date->CurrentValue = UnFormatDateTime($this->last_reading_date->CurrentValue, 7);
		$this->first_reading_date->CurrentValue = $this->first_reading_date->FormValue;
		$this->first_reading_date->CurrentValue = UnFormatDateTime($this->first_reading_date->CurrentValue, 7);
		$this->no_of_manual_entry->CurrentValue = $this->no_of_manual_entry->FormValue;
		$this->no_of_sms->CurrentValue = $this->no_of_sms->FormValue;
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

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("StationId")) != "")
			$this->StationId->OldValue = $this->getKey("StationId"); // StationId
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

			// Address
			$this->Address->ViewValue = $this->Address->CurrentValue;
			$this->Address->ViewCustomAttributes = "";

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

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";
			$this->Address->TooltipValue = "";

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

			// no_of_manual_entry
			$this->no_of_manual_entry->LinkCustomAttributes = "";
			$this->no_of_manual_entry->HrefValue = "";
			$this->no_of_manual_entry->TooltipValue = "";

			// no_of_sms
			$this->no_of_sms->LinkCustomAttributes = "";
			$this->no_of_sms->HrefValue = "";
			$this->no_of_sms->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

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

			// StationName
			$this->StationName->EditAttrs["class"] = "form-control";
			$this->StationName->EditCustomAttributes = "";
			if (!$this->StationName->Raw)
				$this->StationName->CurrentValue = HtmlDecode($this->StationName->CurrentValue);
			$this->StationName->EditValue = HtmlEncode($this->StationName->CurrentValue);

			// StationName_kn
			$this->StationName_kn->EditAttrs["class"] = "form-control";
			$this->StationName_kn->EditCustomAttributes = "";
			if (!$this->StationName_kn->Raw)
				$this->StationName_kn->CurrentValue = HtmlDecode($this->StationName_kn->CurrentValue);
			$this->StationName_kn->EditValue = HtmlEncode($this->StationName_kn->CurrentValue);

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (!$this->MobileNumber->Raw)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);

			// Longitude
			$this->Longitude->EditAttrs["class"] = "form-control";
			$this->Longitude->EditCustomAttributes = "";
			$this->Longitude->EditValue = HtmlEncode($this->Longitude->CurrentValue);
			if (strval($this->Longitude->EditValue) != "" && is_numeric($this->Longitude->EditValue))
				$this->Longitude->EditValue = FormatNumber($this->Longitude->EditValue, -2, -2, -2, -2);
			

			// Latitude
			$this->Latitude->EditAttrs["class"] = "form-control";
			$this->Latitude->EditCustomAttributes = "";
			$this->Latitude->EditValue = HtmlEncode($this->Latitude->CurrentValue);
			if (strval($this->Latitude->EditValue) != "" && is_numeric($this->Latitude->EditValue))
				$this->Latitude->EditValue = FormatNumber($this->Latitude->EditValue, -2, -1, -2, -2);
			

			// Altitude_MSL_in_mtrs
			$this->Altitude_MSL_in_mtrs->EditAttrs["class"] = "form-control";
			$this->Altitude_MSL_in_mtrs->EditCustomAttributes = "";
			$this->Altitude_MSL_in_mtrs->EditValue = HtmlEncode($this->Altitude_MSL_in_mtrs->CurrentValue);
			if (strval($this->Altitude_MSL_in_mtrs->EditValue) != "" && is_numeric($this->Altitude_MSL_in_mtrs->EditValue))
				$this->Altitude_MSL_in_mtrs->EditValue = FormatNumber($this->Altitude_MSL_in_mtrs->EditValue, -2, -2, -2, -2);
			

			// station_type
			$this->station_type->EditAttrs["class"] = "form-control";
			$this->station_type->EditCustomAttributes = "";
			$curVal = trim(strval($this->station_type->CurrentValue));
			if ($curVal != "")
				$this->station_type->ViewValue = $this->station_type->lookupCacheOption($curVal);
			else
				$this->station_type->ViewValue = $this->station_type->Lookup !== NULL && is_array($this->station_type->Lookup->Options) ? $curVal : NULL;
			if ($this->station_type->ViewValue !== NULL) { // Load from cache
				$this->station_type->EditValue = array_values($this->station_type->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`station_type`" . SearchString("=", $this->station_type->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->station_type->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->station_type->EditValue = $arwrk;
			}

			// IsActive
			$this->IsActive->EditCustomAttributes = "";
			$this->IsActive->EditValue = $this->IsActive->options(FALSE);

			// last_active_date
			$this->last_active_date->EditAttrs["class"] = "form-control";
			$this->last_active_date->EditCustomAttributes = "";
			$this->last_active_date->EditValue = HtmlEncode(FormatDateTime($this->last_active_date->CurrentValue, 7));

			// CatchUpId
			$this->CatchUpId->EditAttrs["class"] = "form-control";
			$this->CatchUpId->EditCustomAttributes = "";
			$curVal = trim(strval($this->CatchUpId->CurrentValue));
			if ($curVal != "")
				$this->CatchUpId->ViewValue = $this->CatchUpId->lookupCacheOption($curVal);
			else
				$this->CatchUpId->ViewValue = $this->CatchUpId->Lookup !== NULL && is_array($this->CatchUpId->Lookup->Options) ? $curVal : NULL;
			if ($this->CatchUpId->ViewValue !== NULL) { // Load from cache
				$this->CatchUpId->EditValue = array_values($this->CatchUpId->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CatchUpId`" . SearchString("=", $this->CatchUpId->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->CatchUpId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->CatchUpId->EditValue = $arwrk;
			}

			// PIC
			$this->PIC->EditAttrs["class"] = "form-control";
			$this->PIC->EditCustomAttributes = "";
			$curVal = trim(strval($this->PIC->CurrentValue));
			if ($curVal != "")
				$this->PIC->ViewValue = $this->PIC->lookupCacheOption($curVal);
			else
				$this->PIC->ViewValue = $this->PIC->Lookup !== NULL && is_array($this->PIC->Lookup->Options) ? $curVal : NULL;
			if ($this->PIC->ViewValue !== NULL) { // Load from cache
				$this->PIC->EditValue = array_values($this->PIC->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`PIC`" . SearchString("=", $this->PIC->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PIC->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->PIC->EditValue = $arwrk;
			}

			// RiverId
			$this->RiverId->EditAttrs["class"] = "form-control";
			$this->RiverId->EditCustomAttributes = "";
			$curVal = trim(strval($this->RiverId->CurrentValue));
			if ($curVal != "")
				$this->RiverId->ViewValue = $this->RiverId->lookupCacheOption($curVal);
			else
				$this->RiverId->ViewValue = $this->RiverId->Lookup !== NULL && is_array($this->RiverId->Lookup->Options) ? $curVal : NULL;
			if ($this->RiverId->ViewValue !== NULL) { // Load from cache
				$this->RiverId->EditValue = array_values($this->RiverId->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`RiverId`" . SearchString("=", $this->RiverId->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->RiverId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->RiverId->EditValue = $arwrk;
			}

			// Address
			$this->Address->EditAttrs["class"] = "form-control";
			$this->Address->EditCustomAttributes = "";
			$this->Address->EditValue = $this->Address->CurrentValue;
			$this->Address->ViewCustomAttributes = "";

			// max_rainfall_date
			$this->max_rainfall_date->EditAttrs["class"] = "form-control";
			$this->max_rainfall_date->EditCustomAttributes = "";
			$this->max_rainfall_date->EditValue = $this->max_rainfall_date->CurrentValue;
			$this->max_rainfall_date->EditValue = FormatDateTime($this->max_rainfall_date->EditValue, 7);
			$this->max_rainfall_date->ViewCustomAttributes = "";

			// max_rainfall
			$this->max_rainfall->EditAttrs["class"] = "form-control";
			$this->max_rainfall->EditCustomAttributes = "";
			$this->max_rainfall->EditValue = $this->max_rainfall->CurrentValue;
			$this->max_rainfall->EditValue = FormatNumber($this->max_rainfall->EditValue, 2, -2, -2, -2);
			$this->max_rainfall->ViewCustomAttributes = "";

			// last_reading_date
			$this->last_reading_date->EditAttrs["class"] = "form-control";
			$this->last_reading_date->EditCustomAttributes = "";
			$this->last_reading_date->EditValue = $this->last_reading_date->CurrentValue;
			$this->last_reading_date->EditValue = FormatDateTime($this->last_reading_date->EditValue, 7);
			$this->last_reading_date->ViewCustomAttributes = "";

			// first_reading_date
			$this->first_reading_date->EditAttrs["class"] = "form-control";
			$this->first_reading_date->EditCustomAttributes = "";
			$this->first_reading_date->EditValue = $this->first_reading_date->CurrentValue;
			$this->first_reading_date->EditValue = FormatDateTime($this->first_reading_date->EditValue, 7);
			$this->first_reading_date->ViewCustomAttributes = "";

			// no_of_manual_entry
			$this->no_of_manual_entry->EditAttrs["class"] = "form-control";
			$this->no_of_manual_entry->EditCustomAttributes = "";
			$this->no_of_manual_entry->EditValue = $this->no_of_manual_entry->CurrentValue;
			$this->no_of_manual_entry->EditValue = FormatNumber($this->no_of_manual_entry->EditValue, 0, -2, -2, -2);
			$this->no_of_manual_entry->ViewCustomAttributes = "";

			// no_of_sms
			$this->no_of_sms->EditAttrs["class"] = "form-control";
			$this->no_of_sms->EditCustomAttributes = "";
			$this->no_of_sms->EditValue = $this->no_of_sms->CurrentValue;
			$this->no_of_sms->EditValue = FormatNumber($this->no_of_sms->EditValue, 0, -2, -2, -2);
			$this->no_of_sms->ViewCustomAttributes = "";

			// Edit refer script
			// SubDivisionId

			$this->SubDivisionId->LinkCustomAttributes = "";
			$this->SubDivisionId->HrefValue = "";

			// StationName
			$this->StationName->LinkCustomAttributes = "";
			$this->StationName->HrefValue = "";

			// StationName_kn
			$this->StationName_kn->LinkCustomAttributes = "";
			$this->StationName_kn->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// Longitude
			$this->Longitude->LinkCustomAttributes = "";
			$this->Longitude->HrefValue = "";

			// Latitude
			$this->Latitude->LinkCustomAttributes = "";
			$this->Latitude->HrefValue = "";

			// Altitude_MSL_in_mtrs
			$this->Altitude_MSL_in_mtrs->LinkCustomAttributes = "";
			$this->Altitude_MSL_in_mtrs->HrefValue = "";

			// station_type
			$this->station_type->LinkCustomAttributes = "";
			$this->station_type->HrefValue = "";

			// IsActive
			$this->IsActive->LinkCustomAttributes = "";
			$this->IsActive->HrefValue = "";

			// last_active_date
			$this->last_active_date->LinkCustomAttributes = "";
			$this->last_active_date->HrefValue = "";

			// CatchUpId
			$this->CatchUpId->LinkCustomAttributes = "";
			$this->CatchUpId->HrefValue = "";

			// PIC
			$this->PIC->LinkCustomAttributes = "";
			$this->PIC->HrefValue = "";

			// RiverId
			$this->RiverId->LinkCustomAttributes = "";
			$this->RiverId->HrefValue = "";

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";
			$this->Address->TooltipValue = "";

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

			// no_of_manual_entry
			$this->no_of_manual_entry->LinkCustomAttributes = "";
			$this->no_of_manual_entry->HrefValue = "";
			$this->no_of_manual_entry->TooltipValue = "";

			// no_of_sms
			$this->no_of_sms->LinkCustomAttributes = "";
			$this->no_of_sms->HrefValue = "";
			$this->no_of_sms->TooltipValue = "";
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
		if ($this->SubDivisionId->Required) {
			if (!$this->SubDivisionId->IsDetailKey && $this->SubDivisionId->FormValue != NULL && $this->SubDivisionId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubDivisionId->caption(), $this->SubDivisionId->RequiredErrorMessage));
			}
		}
		if ($this->StationName->Required) {
			if (!$this->StationName->IsDetailKey && $this->StationName->FormValue != NULL && $this->StationName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StationName->caption(), $this->StationName->RequiredErrorMessage));
			}
		}
		if ($this->StationName_kn->Required) {
			if (!$this->StationName_kn->IsDetailKey && $this->StationName_kn->FormValue != NULL && $this->StationName_kn->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StationName_kn->caption(), $this->StationName_kn->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->Longitude->Required) {
			if (!$this->Longitude->IsDetailKey && $this->Longitude->FormValue != NULL && $this->Longitude->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Longitude->caption(), $this->Longitude->RequiredErrorMessage));
			}
		}
		if (!CheckRange($this->Longitude->FormValue, 74, 78.5000)) {
			AddMessage($FormError, $this->Longitude->errorMessage());
		}
		if ($this->Latitude->Required) {
			if (!$this->Latitude->IsDetailKey && $this->Latitude->FormValue != NULL && $this->Latitude->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Latitude->caption(), $this->Latitude->RequiredErrorMessage));
			}
		}
		if (!CheckRange($this->Latitude->FormValue, 11.5, 18.5)) {
			AddMessage($FormError, $this->Latitude->errorMessage());
		}
		if ($this->Altitude_MSL_in_mtrs->Required) {
			if (!$this->Altitude_MSL_in_mtrs->IsDetailKey && $this->Altitude_MSL_in_mtrs->FormValue != NULL && $this->Altitude_MSL_in_mtrs->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Altitude_MSL_in_mtrs->caption(), $this->Altitude_MSL_in_mtrs->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Altitude_MSL_in_mtrs->FormValue)) {
			AddMessage($FormError, $this->Altitude_MSL_in_mtrs->errorMessage());
		}
		if ($this->station_type->Required) {
			if (!$this->station_type->IsDetailKey && $this->station_type->FormValue != NULL && $this->station_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->station_type->caption(), $this->station_type->RequiredErrorMessage));
			}
		}
		if ($this->IsActive->Required) {
			if ($this->IsActive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IsActive->caption(), $this->IsActive->RequiredErrorMessage));
			}
		}
		if ($this->last_active_date->Required) {
			if (!$this->last_active_date->IsDetailKey && $this->last_active_date->FormValue != NULL && $this->last_active_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->last_active_date->caption(), $this->last_active_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->last_active_date->FormValue)) {
			AddMessage($FormError, $this->last_active_date->errorMessage());
		}
		if ($this->CatchUpId->Required) {
			if (!$this->CatchUpId->IsDetailKey && $this->CatchUpId->FormValue != NULL && $this->CatchUpId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CatchUpId->caption(), $this->CatchUpId->RequiredErrorMessage));
			}
		}
		if ($this->PIC->Required) {
			if (!$this->PIC->IsDetailKey && $this->PIC->FormValue != NULL && $this->PIC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PIC->caption(), $this->PIC->RequiredErrorMessage));
			}
		}
		if ($this->RiverId->Required) {
			if (!$this->RiverId->IsDetailKey && $this->RiverId->FormValue != NULL && $this->RiverId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RiverId->caption(), $this->RiverId->RequiredErrorMessage));
			}
		}
		if ($this->Address->Required) {
			if (!$this->Address->IsDetailKey && $this->Address->FormValue != NULL && $this->Address->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address->caption(), $this->Address->RequiredErrorMessage));
			}
		}
		if ($this->max_rainfall_date->Required) {
			if (!$this->max_rainfall_date->IsDetailKey && $this->max_rainfall_date->FormValue != NULL && $this->max_rainfall_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->max_rainfall_date->caption(), $this->max_rainfall_date->RequiredErrorMessage));
			}
		}
		if ($this->max_rainfall->Required) {
			if (!$this->max_rainfall->IsDetailKey && $this->max_rainfall->FormValue != NULL && $this->max_rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->max_rainfall->caption(), $this->max_rainfall->RequiredErrorMessage));
			}
		}
		if ($this->last_reading_date->Required) {
			if (!$this->last_reading_date->IsDetailKey && $this->last_reading_date->FormValue != NULL && $this->last_reading_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->last_reading_date->caption(), $this->last_reading_date->RequiredErrorMessage));
			}
		}
		if ($this->first_reading_date->Required) {
			if (!$this->first_reading_date->IsDetailKey && $this->first_reading_date->FormValue != NULL && $this->first_reading_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->first_reading_date->caption(), $this->first_reading_date->RequiredErrorMessage));
			}
		}
		if ($this->no_of_manual_entry->Required) {
			if (!$this->no_of_manual_entry->IsDetailKey && $this->no_of_manual_entry->FormValue != NULL && $this->no_of_manual_entry->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->no_of_manual_entry->caption(), $this->no_of_manual_entry->RequiredErrorMessage));
			}
		}
		if ($this->no_of_sms->Required) {
			if (!$this->no_of_sms->IsDetailKey && $this->no_of_sms->FormValue != NULL && $this->no_of_sms->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->no_of_sms->caption(), $this->no_of_sms->RequiredErrorMessage));
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

			// SubDivisionId
			$this->SubDivisionId->setDbValueDef($rsnew, $this->SubDivisionId->CurrentValue, NULL, $this->SubDivisionId->ReadOnly);

			// StationName
			$this->StationName->setDbValueDef($rsnew, $this->StationName->CurrentValue, NULL, $this->StationName->ReadOnly);

			// StationName_kn
			$this->StationName_kn->setDbValueDef($rsnew, $this->StationName_kn->CurrentValue, NULL, $this->StationName_kn->ReadOnly);

			// MobileNumber
			$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, $this->MobileNumber->ReadOnly);

			// Longitude
			$this->Longitude->setDbValueDef($rsnew, $this->Longitude->CurrentValue, NULL, $this->Longitude->ReadOnly);

			// Latitude
			$this->Latitude->setDbValueDef($rsnew, $this->Latitude->CurrentValue, NULL, $this->Latitude->ReadOnly);

			// Altitude_MSL_in_mtrs
			$this->Altitude_MSL_in_mtrs->setDbValueDef($rsnew, $this->Altitude_MSL_in_mtrs->CurrentValue, NULL, $this->Altitude_MSL_in_mtrs->ReadOnly);

			// station_type
			$this->station_type->setDbValueDef($rsnew, $this->station_type->CurrentValue, NULL, $this->station_type->ReadOnly);

			// IsActive
			$this->IsActive->setDbValueDef($rsnew, $this->IsActive->CurrentValue, "", $this->IsActive->ReadOnly);

			// last_active_date
			$this->last_active_date->setDbValueDef($rsnew, UnFormatDateTime($this->last_active_date->CurrentValue, 7), NULL, $this->last_active_date->ReadOnly);

			// CatchUpId
			$this->CatchUpId->setDbValueDef($rsnew, $this->CatchUpId->CurrentValue, NULL, $this->CatchUpId->ReadOnly);

			// PIC
			$this->PIC->setDbValueDef($rsnew, $this->PIC->CurrentValue, NULL, $this->PIC->ReadOnly);

			// RiverId
			$this->RiverId->setDbValueDef($rsnew, $this->RiverId->CurrentValue, NULL, $this->RiverId->ReadOnly);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("master_stationlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Set up multi pages
	protected function setupMultiPages()
	{
		$pages = new SubPages();
		$pages->Style = "tabs";
		$pages->add(0);
		$pages->add(1);
		$pages->add(2);
		$pages->add(3);
		$this->MultiPages = $pages;
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
} // End class
?>