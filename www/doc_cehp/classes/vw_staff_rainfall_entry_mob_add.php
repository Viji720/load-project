<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class vw_staff_rainfall_entry_mob_add extends vw_staff_rainfall_entry_mob
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'vw_staff_rainfall_entry_mob';

	// Page object name
	public $PageObjName = "vw_staff_rainfall_entry_mob_add";

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

		// Table object (vw_staff_rainfall_entry_mob)
		if (!isset($GLOBALS["vw_staff_rainfall_entry_mob"]) || get_class($GLOBALS["vw_staff_rainfall_entry_mob"]) == PROJECT_NAMESPACE . "vw_staff_rainfall_entry_mob") {
			$GLOBALS["vw_staff_rainfall_entry_mob"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["vw_staff_rainfall_entry_mob"];
		}

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Table object (vw_mst_station_mob)
		if (!isset($GLOBALS['vw_mst_station_mob']))
			$GLOBALS['vw_mst_station_mob'] = new vw_mst_station_mob();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'vw_staff_rainfall_entry_mob');

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
		global $vw_staff_rainfall_entry_mob;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($vw_staff_rainfall_entry_mob);
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
					if ($pageName == "vw_staff_rainfall_entry_mobview.php")
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
			$key .= @$ar['obs_rainfall_ID'];
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
			$this->obs_rainfall_ID->Visible = FALSE;
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
					$this->terminate(GetUrl("vw_staff_rainfall_entry_moblist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
				if (strval($Security->currentUserID()) == "") {
					$this->setFailureMessage(DeniedMessage()); // Set no permission
					$this->terminate(GetUrl("vw_staff_rainfall_entry_moblist.php"));
					return;
				}
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->obs_rainfall_ID->Visible = FALSE;
		$this->stationcode->setVisibility();
		$this->obs_date->setVisibility();
		$this->SubDivisionId->Visible = FALSE;
		$this->rainfall->setVisibility();
		$this->obs_remarks->setVisibility();
		$this->mobile_number->setVisibility();
		$this->obs_owner->Visible = FALSE;
		$this->SubDivision_code->Visible = FALSE;
		$this->mst_status->setVisibility();
		$this->mst_validated->setVisibility();
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
		$this->setupLookupOptions($this->stationcode);
		$this->setupLookupOptions($this->SubDivisionId);
		$this->setupLookupOptions($this->mst_status);
		$this->setupLookupOptions($this->mst_validated);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("vw_staff_rainfall_entry_moblist.php");
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
			if (Get("obs_rainfall_ID") !== NULL) {
				$this->obs_rainfall_ID->setQueryStringValue(Get("obs_rainfall_ID"));
				$this->setKey("obs_rainfall_ID", $this->obs_rainfall_ID->CurrentValue); // Set up key
			} else {
				$this->setKey("obs_rainfall_ID", ""); // Clear key
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
					$this->terminate("vw_staff_rainfall_entry_moblist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "vw_staff_rainfall_entry_moblist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "vw_staff_rainfall_entry_mobview.php")
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
		$this->obs_rainfall_ID->CurrentValue = NULL;
		$this->obs_rainfall_ID->OldValue = $this->obs_rainfall_ID->CurrentValue;
		$this->stationcode->CurrentValue = NULL;
		$this->stationcode->OldValue = $this->stationcode->CurrentValue;
		$this->obs_date->CurrentValue = NULL;
		$this->obs_date->OldValue = $this->obs_date->CurrentValue;
		$this->SubDivisionId->CurrentValue = NULL;
		$this->SubDivisionId->OldValue = $this->SubDivisionId->CurrentValue;
		$this->rainfall->CurrentValue = NULL;
		$this->rainfall->OldValue = $this->rainfall->CurrentValue;
		$this->obs_remarks->CurrentValue = NULL;
		$this->obs_remarks->OldValue = $this->obs_remarks->CurrentValue;
		$this->mobile_number->CurrentValue = NULL;
		$this->mobile_number->OldValue = $this->mobile_number->CurrentValue;
		$this->obs_owner->CurrentValue = CurrentUserID();
		$this->SubDivision_code->CurrentValue = NULL;
		$this->SubDivision_code->OldValue = $this->SubDivision_code->CurrentValue;
		$this->mst_status->CurrentValue = NULL;
		$this->mst_status->OldValue = $this->mst_status->CurrentValue;
		$this->mst_validated->CurrentValue = NULL;
		$this->mst_validated->OldValue = $this->mst_validated->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'stationcode' first before field var 'x_stationcode'
		$val = $CurrentForm->hasValue("stationcode") ? $CurrentForm->getValue("stationcode") : $CurrentForm->getValue("x_stationcode");
		if (!$this->stationcode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->stationcode->Visible = FALSE; // Disable update for API request
			else
				$this->stationcode->setFormValue($val);
		}

		// Check field name 'obs_date' first before field var 'x_obs_date'
		$val = $CurrentForm->hasValue("obs_date") ? $CurrentForm->getValue("obs_date") : $CurrentForm->getValue("x_obs_date");
		if (!$this->obs_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->obs_date->Visible = FALSE; // Disable update for API request
			else
				$this->obs_date->setFormValue($val);
			$this->obs_date->CurrentValue = UnFormatDateTime($this->obs_date->CurrentValue, 7);
		}

		// Check field name 'rainfall' first before field var 'x_rainfall'
		$val = $CurrentForm->hasValue("rainfall") ? $CurrentForm->getValue("rainfall") : $CurrentForm->getValue("x_rainfall");
		if (!$this->rainfall->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->rainfall->Visible = FALSE; // Disable update for API request
			else
				$this->rainfall->setFormValue($val);
		}

		// Check field name 'obs_remarks' first before field var 'x_obs_remarks'
		$val = $CurrentForm->hasValue("obs_remarks") ? $CurrentForm->getValue("obs_remarks") : $CurrentForm->getValue("x_obs_remarks");
		if (!$this->obs_remarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->obs_remarks->Visible = FALSE; // Disable update for API request
			else
				$this->obs_remarks->setFormValue($val);
		}

		// Check field name 'mobile_number' first before field var 'x_mobile_number'
		$val = $CurrentForm->hasValue("mobile_number") ? $CurrentForm->getValue("mobile_number") : $CurrentForm->getValue("x_mobile_number");
		if (!$this->mobile_number->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mobile_number->Visible = FALSE; // Disable update for API request
			else
				$this->mobile_number->setFormValue($val);
		}

		// Check field name 'mst_status' first before field var 'x_mst_status'
		$val = $CurrentForm->hasValue("mst_status") ? $CurrentForm->getValue("mst_status") : $CurrentForm->getValue("x_mst_status");
		if (!$this->mst_status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mst_status->Visible = FALSE; // Disable update for API request
			else
				$this->mst_status->setFormValue($val);
		}

		// Check field name 'mst_validated' first before field var 'x_mst_validated'
		$val = $CurrentForm->hasValue("mst_validated") ? $CurrentForm->getValue("mst_validated") : $CurrentForm->getValue("x_mst_validated");
		if (!$this->mst_validated->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mst_validated->Visible = FALSE; // Disable update for API request
			else
				$this->mst_validated->setFormValue($val);
		}

		// Check field name 'obs_rainfall_ID' first before field var 'x_obs_rainfall_ID'
		$val = $CurrentForm->hasValue("obs_rainfall_ID") ? $CurrentForm->getValue("obs_rainfall_ID") : $CurrentForm->getValue("x_obs_rainfall_ID");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->stationcode->CurrentValue = $this->stationcode->FormValue;
		$this->obs_date->CurrentValue = $this->obs_date->FormValue;
		$this->obs_date->CurrentValue = UnFormatDateTime($this->obs_date->CurrentValue, 7);
		$this->rainfall->CurrentValue = $this->rainfall->FormValue;
		$this->obs_remarks->CurrentValue = $this->obs_remarks->FormValue;
		$this->mobile_number->CurrentValue = $this->mobile_number->FormValue;
		$this->mst_status->CurrentValue = $this->mst_status->FormValue;
		$this->mst_validated->CurrentValue = $this->mst_validated->FormValue;
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

		// Check if valid User ID
		if ($res) {
			$res = $this->showOptionLink('add');
			if (!$res) {
				$userIdMsg = DeniedMessage();
				$this->setFailureMessage($userIdMsg);
			}
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
		$this->obs_rainfall_ID->setDbValue($row['obs_rainfall_ID']);
		$this->stationcode->setDbValue($row['stationcode']);
		$this->obs_date->setDbValue($row['obs_date']);
		$this->SubDivisionId->setDbValue($row['SubDivisionId']);
		$this->rainfall->setDbValue($row['rainfall']);
		$this->obs_remarks->setDbValue($row['obs_remarks']);
		$this->mobile_number->setDbValue($row['mobile_number']);
		$this->obs_owner->setDbValue($row['obs_owner']);
		$this->SubDivision_code->setDbValue($row['SubDivision_code']);
		$this->mst_status->setDbValue($row['mst_status']);
		$this->mst_validated->setDbValue($row['mst_validated']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['obs_rainfall_ID'] = $this->obs_rainfall_ID->CurrentValue;
		$row['stationcode'] = $this->stationcode->CurrentValue;
		$row['obs_date'] = $this->obs_date->CurrentValue;
		$row['SubDivisionId'] = $this->SubDivisionId->CurrentValue;
		$row['rainfall'] = $this->rainfall->CurrentValue;
		$row['obs_remarks'] = $this->obs_remarks->CurrentValue;
		$row['mobile_number'] = $this->mobile_number->CurrentValue;
		$row['obs_owner'] = $this->obs_owner->CurrentValue;
		$row['SubDivision_code'] = $this->SubDivision_code->CurrentValue;
		$row['mst_status'] = $this->mst_status->CurrentValue;
		$row['mst_validated'] = $this->mst_validated->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("obs_rainfall_ID")) != "")
			$this->obs_rainfall_ID->OldValue = $this->getKey("obs_rainfall_ID"); // obs_rainfall_ID
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

		if ($this->rainfall->FormValue == $this->rainfall->CurrentValue && is_numeric(ConvertToFloatString($this->rainfall->CurrentValue)))
			$this->rainfall->CurrentValue = ConvertToFloatString($this->rainfall->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// obs_rainfall_ID
		// stationcode
		// obs_date
		// SubDivisionId
		// rainfall
		// obs_remarks
		// mobile_number
		// obs_owner
		// SubDivision_code
		// mst_status
		// mst_validated

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// obs_rainfall_ID
			$this->obs_rainfall_ID->ViewValue = $this->obs_rainfall_ID->CurrentValue;
			$this->obs_rainfall_ID->ViewCustomAttributes = "";

			// stationcode
			$curVal = strval($this->stationcode->CurrentValue);
			if ($curVal != "") {
				$this->stationcode->ViewValue = $this->stationcode->lookupCacheOption($curVal);
				if ($this->stationcode->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`StationId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->stationcode->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->stationcode->ViewValue = $this->stationcode->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->stationcode->ViewValue = $this->stationcode->CurrentValue;
					}
				}
			} else {
				$this->stationcode->ViewValue = NULL;
			}
			$this->stationcode->ViewCustomAttributes = "";

			// obs_date
			$this->obs_date->ViewValue = $this->obs_date->CurrentValue;
			$this->obs_date->ViewValue = FormatDateTime($this->obs_date->ViewValue, 7);
			$this->obs_date->ViewCustomAttributes = "";

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

			// rainfall
			$this->rainfall->ViewValue = $this->rainfall->CurrentValue;
			$this->rainfall->ViewValue = FormatNumber($this->rainfall->ViewValue, 2, -2, -2, -2);
			$this->rainfall->CellCssStyle .= "text-align: right;";
			$this->rainfall->ViewCustomAttributes = "";

			// obs_remarks
			$this->obs_remarks->ViewValue = $this->obs_remarks->CurrentValue;
			$this->obs_remarks->ViewCustomAttributes = "";

			// mobile_number
			$this->mobile_number->ViewValue = $this->mobile_number->CurrentValue;
			$this->mobile_number->ViewCustomAttributes = "";

			// obs_owner
			$this->obs_owner->ViewValue = $this->obs_owner->CurrentValue;
			$this->obs_owner->ViewCustomAttributes = "";

			// SubDivision_code
			$this->SubDivision_code->ViewValue = $this->SubDivision_code->CurrentValue;
			$this->SubDivision_code->ViewValue = FormatNumber($this->SubDivision_code->ViewValue, 0, -2, -2, -2);
			$this->SubDivision_code->ViewCustomAttributes = "";

			// mst_status
			$curVal = strval($this->mst_status->CurrentValue);
			if ($curVal != "") {
				$this->mst_status->ViewValue = $this->mst_status->lookupCacheOption($curVal);
				if ($this->mst_status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Status`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->mst_status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->mst_status->ViewValue = $this->mst_status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->mst_status->ViewValue = $this->mst_status->CurrentValue;
					}
				}
			} else {
				$this->mst_status->ViewValue = NULL;
			}
			$this->mst_status->ViewCustomAttributes = "";

			// mst_validated
			$curVal = strval($this->mst_validated->CurrentValue);
			if ($curVal != "") {
				$this->mst_validated->ViewValue = $this->mst_validated->lookupCacheOption($curVal);
				if ($this->mst_validated->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`validated`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->mst_validated->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->mst_validated->ViewValue = $this->mst_validated->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->mst_validated->ViewValue = $this->mst_validated->CurrentValue;
					}
				}
			} else {
				$this->mst_validated->ViewValue = NULL;
			}
			$this->mst_validated->ViewCustomAttributes = "";

			// stationcode
			$this->stationcode->LinkCustomAttributes = "";
			$this->stationcode->HrefValue = "";
			$this->stationcode->TooltipValue = "";

			// obs_date
			$this->obs_date->LinkCustomAttributes = "";
			$this->obs_date->HrefValue = "";
			$this->obs_date->TooltipValue = "";

			// rainfall
			$this->rainfall->LinkCustomAttributes = "";
			$this->rainfall->HrefValue = "";
			$this->rainfall->TooltipValue = "";

			// obs_remarks
			$this->obs_remarks->LinkCustomAttributes = "";
			$this->obs_remarks->HrefValue = "";
			$this->obs_remarks->TooltipValue = "";

			// mobile_number
			$this->mobile_number->LinkCustomAttributes = "";
			$this->mobile_number->HrefValue = "";
			$this->mobile_number->TooltipValue = "";

			// mst_status
			$this->mst_status->LinkCustomAttributes = "";
			$this->mst_status->HrefValue = "";
			$this->mst_status->TooltipValue = "";

			// mst_validated
			$this->mst_validated->LinkCustomAttributes = "";
			$this->mst_validated->HrefValue = "";
			$this->mst_validated->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// stationcode
			$this->stationcode->EditAttrs["class"] = "form-control";
			$this->stationcode->EditCustomAttributes = "";
			$curVal = trim(strval($this->stationcode->CurrentValue));
			if ($curVal != "")
				$this->stationcode->ViewValue = $this->stationcode->lookupCacheOption($curVal);
			else
				$this->stationcode->ViewValue = $this->stationcode->Lookup !== NULL && is_array($this->stationcode->Lookup->Options) ? $curVal : NULL;
			if ($this->stationcode->ViewValue !== NULL) { // Load from cache
				$this->stationcode->EditValue = array_values($this->stationcode->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`StationId`" . SearchString("=", $this->stationcode->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->stationcode->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->stationcode->EditValue = $arwrk;
			}

			// obs_date
			$this->obs_date->EditAttrs["class"] = "form-control";
			$this->obs_date->EditCustomAttributes = "";
			$this->obs_date->EditValue = HtmlEncode(FormatDateTime($this->obs_date->CurrentValue, 7));
			$this->obs_date->PlaceHolder = RemoveHtml($this->obs_date->caption());

			// rainfall
			$this->rainfall->EditAttrs["class"] = "form-control";
			$this->rainfall->EditCustomAttributes = "";
			$this->rainfall->EditValue = HtmlEncode($this->rainfall->CurrentValue);
			$this->rainfall->PlaceHolder = RemoveHtml($this->rainfall->caption());
			if (strval($this->rainfall->EditValue) != "" && is_numeric($this->rainfall->EditValue))
				$this->rainfall->EditValue = FormatNumber($this->rainfall->EditValue, -2, -2, -2, -2);
			

			// obs_remarks
			$this->obs_remarks->EditAttrs["class"] = "form-control";
			$this->obs_remarks->EditCustomAttributes = "";
			if (!$this->obs_remarks->Raw)
				$this->obs_remarks->CurrentValue = HtmlDecode($this->obs_remarks->CurrentValue);
			$this->obs_remarks->EditValue = HtmlEncode($this->obs_remarks->CurrentValue);
			$this->obs_remarks->PlaceHolder = RemoveHtml($this->obs_remarks->caption());

			// mobile_number
			$this->mobile_number->EditAttrs["class"] = "form-control";
			$this->mobile_number->EditCustomAttributes = "";
			if (!$this->mobile_number->Raw)
				$this->mobile_number->CurrentValue = HtmlDecode($this->mobile_number->CurrentValue);
			$this->mobile_number->EditValue = HtmlEncode($this->mobile_number->CurrentValue);
			$this->mobile_number->PlaceHolder = RemoveHtml($this->mobile_number->caption());

			// mst_status
			$this->mst_status->EditAttrs["class"] = "form-control";
			$this->mst_status->EditCustomAttributes = "";
			$curVal = trim(strval($this->mst_status->CurrentValue));
			if ($curVal != "")
				$this->mst_status->ViewValue = $this->mst_status->lookupCacheOption($curVal);
			else
				$this->mst_status->ViewValue = $this->mst_status->Lookup !== NULL && is_array($this->mst_status->Lookup->Options) ? $curVal : NULL;
			if ($this->mst_status->ViewValue !== NULL) { // Load from cache
				$this->mst_status->EditValue = array_values($this->mst_status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Status`" . SearchString("=", $this->mst_status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->mst_status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->mst_status->EditValue = $arwrk;
			}

			// mst_validated
			$this->mst_validated->EditAttrs["class"] = "form-control";
			$this->mst_validated->EditCustomAttributes = "";
			$curVal = trim(strval($this->mst_validated->CurrentValue));
			if ($curVal != "")
				$this->mst_validated->ViewValue = $this->mst_validated->lookupCacheOption($curVal);
			else
				$this->mst_validated->ViewValue = $this->mst_validated->Lookup !== NULL && is_array($this->mst_validated->Lookup->Options) ? $curVal : NULL;
			if ($this->mst_validated->ViewValue !== NULL) { // Load from cache
				$this->mst_validated->EditValue = array_values($this->mst_validated->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`validated`" . SearchString("=", $this->mst_validated->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->mst_validated->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->mst_validated->EditValue = $arwrk;
			}

			// Add refer script
			// stationcode

			$this->stationcode->LinkCustomAttributes = "";
			$this->stationcode->HrefValue = "";

			// obs_date
			$this->obs_date->LinkCustomAttributes = "";
			$this->obs_date->HrefValue = "";

			// rainfall
			$this->rainfall->LinkCustomAttributes = "";
			$this->rainfall->HrefValue = "";

			// obs_remarks
			$this->obs_remarks->LinkCustomAttributes = "";
			$this->obs_remarks->HrefValue = "";

			// mobile_number
			$this->mobile_number->LinkCustomAttributes = "";
			$this->mobile_number->HrefValue = "";

			// mst_status
			$this->mst_status->LinkCustomAttributes = "";
			$this->mst_status->HrefValue = "";

			// mst_validated
			$this->mst_validated->LinkCustomAttributes = "";
			$this->mst_validated->HrefValue = "";
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
		if ($this->stationcode->Required) {
			if (!$this->stationcode->IsDetailKey && $this->stationcode->FormValue != NULL && $this->stationcode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->stationcode->caption(), $this->stationcode->RequiredErrorMessage));
			}
		}
		if ($this->obs_date->Required) {
			if (!$this->obs_date->IsDetailKey && $this->obs_date->FormValue != NULL && $this->obs_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->obs_date->caption(), $this->obs_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->obs_date->FormValue)) {
			AddMessage($FormError, $this->obs_date->errorMessage());
		}
		if ($this->rainfall->Required) {
			if (!$this->rainfall->IsDetailKey && $this->rainfall->FormValue != NULL && $this->rainfall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->rainfall->caption(), $this->rainfall->RequiredErrorMessage));
			}
		}
		if (!CheckRange($this->rainfall->FormValue, 0.00, 200.00)) {
			AddMessage($FormError, $this->rainfall->errorMessage());
		}
		if ($this->obs_remarks->Required) {
			if (!$this->obs_remarks->IsDetailKey && $this->obs_remarks->FormValue != NULL && $this->obs_remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->obs_remarks->caption(), $this->obs_remarks->RequiredErrorMessage));
			}
		}
		if ($this->mobile_number->Required) {
			if (!$this->mobile_number->IsDetailKey && $this->mobile_number->FormValue != NULL && $this->mobile_number->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobile_number->caption(), $this->mobile_number->RequiredErrorMessage));
			}
		}
		if ($this->mst_status->Required) {
			if (!$this->mst_status->IsDetailKey && $this->mst_status->FormValue != NULL && $this->mst_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mst_status->caption(), $this->mst_status->RequiredErrorMessage));
			}
		}
		if ($this->mst_validated->Required) {
			if (!$this->mst_validated->IsDetailKey && $this->mst_validated->FormValue != NULL && $this->mst_validated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mst_validated->caption(), $this->mst_validated->RequiredErrorMessage));
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

		// stationcode
		$this->stationcode->setDbValueDef($rsnew, $this->stationcode->CurrentValue, NULL, FALSE);

		// obs_date
		$this->obs_date->setDbValueDef($rsnew, UnFormatDateTime($this->obs_date->CurrentValue, 7), NULL, FALSE);

		// rainfall
		$this->rainfall->setDbValueDef($rsnew, $this->rainfall->CurrentValue, NULL, FALSE);

		// obs_remarks
		$this->obs_remarks->setDbValueDef($rsnew, $this->obs_remarks->CurrentValue, NULL, FALSE);

		// mobile_number
		$this->mobile_number->setDbValueDef($rsnew, $this->mobile_number->CurrentValue, NULL, FALSE);

		// mst_status
		$this->mst_status->setDbValueDef($rsnew, $this->mst_status->CurrentValue, 0, FALSE);

		// mst_validated
		$this->mst_validated->setDbValueDef($rsnew, $this->mst_validated->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("vw_staff_rainfall_entry_moblist.php"), "", $this->TableVar, TRUE);
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
				case "x_stationcode":
					break;
				case "x_SubDivisionId":
					break;
				case "x_mst_status":
					break;
				case "x_mst_validated":
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
						case "x_stationcode":
							break;
						case "x_SubDivisionId":
							break;
						case "x_mst_status":
							break;
						case "x_mst_validated":
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>