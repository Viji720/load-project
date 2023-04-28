<?php
namespace PHPMaker2020\cehp;

/**
 * Page class
 */
class vw_tbl_sms_monthly_subdivision_edit extends vw_tbl_sms_monthly_subdivision
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

	// Table name
	public $TableName = 'vw_tbl_sms_monthly_subdivision';

	// Page object name
	public $PageObjName = "vw_tbl_sms_monthly_subdivision_edit";

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

		// Table object (master_user)
		if (!isset($GLOBALS['master_user']))
			$GLOBALS['master_user'] = new master_user();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "vw_tbl_sms_monthly_subdivisionview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
					$this->terminate(GetUrl("vw_tbl_sms_monthly_subdivisionlist.php"));
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
					$this->terminate(GetUrl("vw_tbl_sms_monthly_subdivisionlist.php"));
					return;
				}
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
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
		$this->SubDivisionId->Required = FALSE;

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
		$this->setupLookupOptions($this->SubDivisionId);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("vw_tbl_sms_monthly_subdivisionlist.php");
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
			if (Get("Slno") !== NULL) {
				$this->Slno->setQueryStringValue(Get("Slno"));
				$this->Slno->setOldValue($this->Slno->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->Slno->setQueryStringValue(Key(0));
				$this->Slno->setOldValue($this->Slno->QueryStringValue);
			} elseif (Post("Slno") !== NULL) {
				$this->Slno->setFormValue(Post("Slno"));
				$this->Slno->setOldValue($this->Slno->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->Slno->setQueryStringValue(Route(2));
				$this->Slno->setOldValue($this->Slno->QueryStringValue);
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
				if ($CurrentForm->hasValue("x_Slno")) {
					$this->Slno->setFormValue($CurrentForm->getValue("x_Slno"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("Slno") !== NULL) {
					$this->Slno->setQueryStringValue(Get("Slno"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->Slno->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->Slno->CurrentValue = NULL;
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
					$this->terminate("vw_tbl_sms_monthly_subdivisionlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "vw_tbl_sms_monthly_subdivisionlist.php")
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
		if (!$this->Slno->IsDetailKey)
			$this->Slno->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
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
			$res = $this->showOptionLink('edit');
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
		$row = [];
		$row['Slno'] = NULL;
		$row['StationId'] = NULL;
		$row['SubDivisionId'] = NULL;
		$row['SenderMobileNumber'] = NULL;
		$row['Water_Year'] = NULL;
		$row['day_of_month'] = NULL;
		$row['Jun_rainfall'] = NULL;
		$row['Jul_rainfall'] = NULL;
		$row['Aug_rainfall'] = NULL;
		$row['Sep_rainfall'] = NULL;
		$row['Oct_rainfall'] = NULL;
		$row['Nov_rainfall'] = NULL;
		$row['Dec_rainfall'] = NULL;
		$row['Jan_rainfall'] = NULL;
		$row['Feb_rainfall'] = NULL;
		$row['Mar_rainfall'] = NULL;
		$row['Apr_rainfall'] = NULL;
		$row['May_rainfall'] = NULL;
		$row['IsChanged'] = NULL;
		$row['obs_owner'] = NULL;
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("vw_tbl_sms_monthly_subdivisionlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
} // End class
?>