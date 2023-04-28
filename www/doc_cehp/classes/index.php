<?php
namespace PHPMaker2020\cehp;

/**
 * Class for index
 */
class index
{

	// Project ID
	public $ProjectID = "{05E6FA99-8810-4D67-B99E-99E893A4E81D}";

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

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Constructor
	public function __construct() {
		$this->CheckToken = Config("CHECK_TOKEN");
	}

	// Terminate page
	public function terminate($url = "")
	{

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Page Redirecting event
		$this->Page_Redirecting($url);

		// Go to URL if specified
		if ($url != "") {
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	//
	// Page run
	//

	public function run()
	{
		global $Language, $UserProfile, $Security, $Breadcrumb;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// User profile
		$UserProfile = new UserProfile();

		// Security object
		$Security = new AdvancedSecurity();
		if (!$Security->isLoggedIn())
			$Security->autoLogin();
		$Security->loadUserLevel(); // Load User Level

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Breadcrumb
		$Breadcrumb = new Breadcrumb();

		// If session expired, show session expired message
		if (Get("expired") == "1")
			$this->setFailureMessage($Language->phrase("SessionExpired"));
		if (!$Security->isLoggedIn())
			$Security->autoLogin();
		$Security->loadUserLevel(); // Load User Level
		if ($Security->allowList(CurrentProjectID() . 'master_station'))
			$this->terminate("master_stationlist.php"); // Exit and go to default page
		if ($Security->allowList(CurrentProjectID() . 'awaiteddata_temp'))
			$this->terminate("awaiteddata_templist.php");
		if ($Security->allowList(CurrentProjectID() . 'cum_stats'))
			$this->terminate("cum_statslist.php");
		if ($Security->allowList(CurrentProjectID() . 'daily_rain'))
			$this->terminate("daily_rainlist.php");
		if ($Security->allowList(CurrentProjectID() . 'dmcrainfalldata'))
			$this->terminate("dmcrainfalldatalist.php");
		if ($Security->allowList(CurrentProjectID() . 'lkp_isfirstmsg'))
			$this->terminate("lkp_isfirstmsglist.php");
		if ($Security->allowList(CurrentProjectID() . 'lkp_month_id'))
			$this->terminate("lkp_month_idlist.php");
		if ($Security->allowList(CurrentProjectID() . 'lkp_station_type'))
			$this->terminate("lkp_station_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'lkp_status'))
			$this->terminate("lkp_statuslist.php");
		if ($Security->allowList(CurrentProjectID() . 'lkp_tblsms_date'))
			$this->terminate("lkp_tblsms_datelist.php");
		if ($Security->allowList(CurrentProjectID() . 'lkp_validated'))
			$this->terminate("lkp_validatedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_basin'))
			$this->terminate("master_basinlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_circle'))
			$this->terminate("master_circlelist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_damcatchup'))
			$this->terminate("master_damcatchuplist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_district'))
			$this->terminate("master_districtlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_division'))
			$this->terminate("master_divisionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_river'))
			$this->terminate("master_riverlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_subbasin'))
			$this->terminate("master_subbasinlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_subdivision'))
			$this->terminate("master_subdivisionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_taluk'))
			$this->terminate("master_taluklist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_user'))
			$this->terminate("master_userlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_user_permission'))
			$this->terminate("master_user_permissionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_user_roles'))
			$this->terminate("master_user_roleslist.php");
		if ($Security->allowList(CurrentProjectID() . 'mst_ksndmc_station'))
			$this->terminate("mst_ksndmc_stationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'mst_mobile_staion_link'))
			$this->terminate("mst_mobile_staion_linklist.php");
		if ($Security->allowList(CurrentProjectID() . 'newstations'))
			$this->terminate("newstationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'newstationslist'))
			$this->terminate("newstationslistlist.php");
		if ($Security->allowList(CurrentProjectID() . 'obs_ksndmc_rainfall'))
			$this->terminate("obs_ksndmc_rainfalllist.php");
		if ($Security->allowList(CurrentProjectID() . 'obs_rainfall'))
			$this->terminate("obs_rainfalllist.php");
		if ($Security->allowList(CurrentProjectID() . 'obs_sms_messages'))
			$this->terminate("obs_sms_messageslist.php");
		if ($Security->allowList(CurrentProjectID() . 'oldstations'))
			$this->terminate("oldstationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'tbl_hmsdata'))
			$this->terminate("tbl_hmsdatalist.php");
		if ($Security->allowList(CurrentProjectID() . 'tbl_sms_monthly'))
			$this->terminate("tbl_sms_monthlylist.php");
		if ($Security->allowList(CurrentProjectID() . 'tbl_sms_monthly_day'))
			$this->terminate("tbl_sms_monthly_daylist.php");
		if ($Security->allowList(CurrentProjectID() . 'tbl_smsdata'))
			$this->terminate("tbl_smsdatalist.php");
		if ($Security->allowList(CurrentProjectID() . 'tbl_smsdata_archive'))
			$this->terminate("tbl_smsdata_archivelist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_datewise_dash'))
			$this->terminate("vw_datewise_dashlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_dist_rainfall'))
			$this->terminate("vw_dist_rainfalllist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_excp_dupmobilenumber'))
			$this->terminate("vw_excp_dupmobilenumberlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_excp_mobilenumbernotmapped'))
			$this->terminate("vw_excp_mobilenumbernotmappedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_mst_station_mob'))
			$this->terminate("vw_mst_station_moblist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_mst_station_subdivision'))
			$this->terminate("vw_mst_station_subdivisionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_rpt_dmcreport'))
			$this->terminate("vw_rpt_dmcreportlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_rpt_invalidmessages'))
			$this->terminate("vw_rpt_invalidmessageslist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_rpt_mst_station'))
			$this->terminate("vw_rpt_mst_stationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_rpt_rainfall'))
			$this->terminate("vw_rpt_rainfalllist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_rpt_rainfall_staff'))
			$this->terminate("vw_rpt_rainfall_stafflist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_rpt_rainfall_subdivision'))
			$this->terminate("vw_rpt_rainfall_subdivisionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_rpt_sms_analyser'))
			$this->terminate("vw_rpt_sms_analyserlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_rpt_sms_analyser_subdivision'))
			$this->terminate("vw_rpt_sms_analyser_subdivisionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_smsdata_firstlast'))
			$this->terminate("vw_smsdata_firstlastlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_staff_rainfall_entry'))
			$this->terminate("vw_staff_rainfall_entrylist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_staff_rainfall_entry_mob'))
			$this->terminate("vw_staff_rainfall_entry_moblist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_subdiv_rainfall_entry'))
			$this->terminate("vw_subdiv_rainfall_entrylist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_subdivision_dash'))
			$this->terminate("vw_subdivision_dashlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_tbl_sms_monthly_subdivision'))
			$this->terminate("vw_tbl_sms_monthly_subdivisionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_top_10_stations'))
			$this->terminate("vw_top_10_stationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'vw_validate_smsdata'))
			$this->terminate("vw_validate_smsdatalist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_dams'))
			$this->terminate("master_damslist.php");
		if ($Security->isLoggedIn()) {
			$this->setFailureMessage(DeniedMessage() . "<br><br><a href=\"logout.php\">" . $Language->phrase("BackToLogin") . "</a>");
		} else {
			$this->terminate("login.php"); // Exit and go to login page
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
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		//if ($type == 'success') $msg = "your success message";

	}
}
?>