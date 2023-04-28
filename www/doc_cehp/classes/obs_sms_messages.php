<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for obs_sms_messages
 */
class obs_sms_messages extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $message_id;
	public $SMSDateTime;
	public $MobileNumber;
	public $SystemDateTime;
	public $rainfall;
	public $stationid;
	public $SubDivisionId;
	public $SMSText;
	public $sms_statusid;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'obs_sms_messages';
		$this->TableName = 'obs_sms_messages';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`obs_sms_messages`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 10;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// message_id
		$this->message_id = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_message_id', 'message_id', '`message_id`', '`message_id`', 3, 11, -1, FALSE, '`message_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->message_id->IsPrimaryKey = TRUE; // Primary key field
		$this->message_id->Nullable = FALSE; // NOT NULL field
		$this->message_id->Required = TRUE; // Required field
		$this->message_id->Sortable = TRUE; // Allow sort
		$this->message_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['message_id'] = &$this->message_id;

		// SMSDateTime
		$this->SMSDateTime = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_SMSDateTime', 'SMSDateTime', '`SMSDateTime`', CastDateFieldForLike("`SMSDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`SMSDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMSDateTime->Sortable = TRUE; // Allow sort
		$this->SMSDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SMSDateTime'] = &$this->SMSDateTime;

		// MobileNumber
		$this->MobileNumber = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 50, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// SystemDateTime
		$this->SystemDateTime = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_SystemDateTime', 'SystemDateTime', '`SystemDateTime`', CastDateFieldForLike("`SystemDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`SystemDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SystemDateTime->Sortable = TRUE; // Allow sort
		$this->SystemDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SystemDateTime'] = &$this->SystemDateTime;

		// rainfall
		$this->rainfall = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_rainfall', 'rainfall', '`rainfall`', '`rainfall`', 4, 6, -1, FALSE, '`rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->rainfall->Sortable = TRUE; // Allow sort
		$this->rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['rainfall'] = &$this->rainfall;

		// stationid
		$this->stationid = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_stationid', 'stationid', '`stationid`', '`stationid`', 3, 11, -1, FALSE, '`stationid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->stationid->Sortable = TRUE; // Allow sort
		$this->stationid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['stationid'] = &$this->stationid;

		// SubDivisionId
		$this->SubDivisionId = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_SubDivisionId', 'SubDivisionId', '`SubDivisionId`', '`SubDivisionId`', 3, 11, -1, FALSE, '`SubDivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubDivisionId->Sortable = TRUE; // Allow sort
		$this->SubDivisionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivisionId'] = &$this->SubDivisionId;

		// SMSText
		$this->SMSText = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_SMSText', 'SMSText', '`SMSText`', '`SMSText`', 200, 200, -1, FALSE, '`SMSText`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMSText->Sortable = TRUE; // Allow sort
		$this->fields['SMSText'] = &$this->SMSText;

		// sms_statusid
		$this->sms_statusid = new DbField('obs_sms_messages', 'obs_sms_messages', 'x_sms_statusid', 'sms_statusid', '`sms_statusid`', '`sms_statusid`', 3, 11, -1, FALSE, '`sms_statusid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sms_statusid->Sortable = TRUE; // Allow sort
		$this->sms_statusid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sms_statusid'] = &$this->sms_statusid;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Multiple column sort
	public function updateSort(&$fld, $ctrl)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($ctrl) {
				$orderBy = $this->getSessionOrderBy();
				if (ContainsString($orderBy, $sortField . " " . $lastSort)) {
					$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
				} else {
					if ($orderBy != "")
						$orderBy .= ", ";
					$orderBy .= $sortField . " " . $thisSort;
				}
				$this->setSessionOrderBy($orderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
			}
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`obs_sms_messages`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving != "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter, $id = "")
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = $this->UserIDAllowSecurity;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('message_id', $rs))
				AddFilter($where, QuotedName('message_id', $this->Dbid) . '=' . QuotedValue($rs['message_id'], $this->message_id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->message_id->DbValue = $row['message_id'];
		$this->SMSDateTime->DbValue = $row['SMSDateTime'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->SystemDateTime->DbValue = $row['SystemDateTime'];
		$this->rainfall->DbValue = $row['rainfall'];
		$this->stationid->DbValue = $row['stationid'];
		$this->SubDivisionId->DbValue = $row['SubDivisionId'];
		$this->SMSText->DbValue = $row['SMSText'];
		$this->sms_statusid->DbValue = $row['sms_statusid'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`message_id` = @message_id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('message_id', $row) ? $row['message_id'] : NULL;
		else
			$val = $this->message_id->OldValue !== NULL ? $this->message_id->OldValue : $this->message_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@message_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "obs_sms_messageslist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "obs_sms_messagesview.php")
			return $Language->phrase("View");
		elseif ($pageName == "obs_sms_messagesedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "obs_sms_messagesadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "obs_sms_messageslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("obs_sms_messagesview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("obs_sms_messagesview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "obs_sms_messagesadd.php?" . $this->getUrlParm($parm);
		else
			$url = "obs_sms_messagesadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("obs_sms_messagesedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("obs_sms_messagesadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("obs_sms_messagesdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "message_id:" . JsonEncode($this->message_id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		if ($this->message_id->CurrentValue != NULL) {
			$url .= "message_id=" . urlencode($this->message_id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		$arKeys = [];
		$arKey = [];
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("message_id") !== NULL)
				$arKeys[] = Param("message_id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->message_id->CurrentValue = $key;
			else
				$this->message_id->OldValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->message_id->setDbValue($rs->fields('message_id'));
		$this->SMSDateTime->setDbValue($rs->fields('SMSDateTime'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->SystemDateTime->setDbValue($rs->fields('SystemDateTime'));
		$this->rainfall->setDbValue($rs->fields('rainfall'));
		$this->stationid->setDbValue($rs->fields('stationid'));
		$this->SubDivisionId->setDbValue($rs->fields('SubDivisionId'));
		$this->SMSText->setDbValue($rs->fields('SMSText'));
		$this->sms_statusid->setDbValue($rs->fields('sms_statusid'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// message_id
		// SMSDateTime
		// MobileNumber
		// SystemDateTime
		// rainfall
		// stationid
		// SubDivisionId
		// SMSText
		// sms_statusid
		// message_id

		$this->message_id->ViewValue = $this->message_id->CurrentValue;
		$this->message_id->ViewValue = FormatNumber($this->message_id->ViewValue, 0, -2, -2, -2);
		$this->message_id->ViewCustomAttributes = "";

		// SMSDateTime
		$this->SMSDateTime->ViewValue = $this->SMSDateTime->CurrentValue;
		$this->SMSDateTime->ViewValue = FormatDateTime($this->SMSDateTime->ViewValue, 0);
		$this->SMSDateTime->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// SystemDateTime
		$this->SystemDateTime->ViewValue = $this->SystemDateTime->CurrentValue;
		$this->SystemDateTime->ViewValue = FormatDateTime($this->SystemDateTime->ViewValue, 0);
		$this->SystemDateTime->ViewCustomAttributes = "";

		// rainfall
		$this->rainfall->ViewValue = $this->rainfall->CurrentValue;
		$this->rainfall->ViewValue = FormatNumber($this->rainfall->ViewValue, 2, -2, -2, -2);
		$this->rainfall->ViewCustomAttributes = "";

		// stationid
		$this->stationid->ViewValue = $this->stationid->CurrentValue;
		$this->stationid->ViewValue = FormatNumber($this->stationid->ViewValue, 0, -2, -2, -2);
		$this->stationid->ViewCustomAttributes = "";

		// SubDivisionId
		$this->SubDivisionId->ViewValue = $this->SubDivisionId->CurrentValue;
		$this->SubDivisionId->ViewValue = FormatNumber($this->SubDivisionId->ViewValue, 0, -2, -2, -2);
		$this->SubDivisionId->ViewCustomAttributes = "";

		// SMSText
		$this->SMSText->ViewValue = $this->SMSText->CurrentValue;
		$this->SMSText->ViewCustomAttributes = "";

		// sms_statusid
		$this->sms_statusid->ViewValue = $this->sms_statusid->CurrentValue;
		$this->sms_statusid->ViewValue = FormatNumber($this->sms_statusid->ViewValue, 0, -2, -2, -2);
		$this->sms_statusid->ViewCustomAttributes = "";

		// message_id
		$this->message_id->LinkCustomAttributes = "";
		$this->message_id->HrefValue = "";
		$this->message_id->TooltipValue = "";

		// SMSDateTime
		$this->SMSDateTime->LinkCustomAttributes = "";
		$this->SMSDateTime->HrefValue = "";
		$this->SMSDateTime->TooltipValue = "";

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// SystemDateTime
		$this->SystemDateTime->LinkCustomAttributes = "";
		$this->SystemDateTime->HrefValue = "";
		$this->SystemDateTime->TooltipValue = "";

		// rainfall
		$this->rainfall->LinkCustomAttributes = "";
		$this->rainfall->HrefValue = "";
		$this->rainfall->TooltipValue = "";

		// stationid
		$this->stationid->LinkCustomAttributes = "";
		$this->stationid->HrefValue = "";
		$this->stationid->TooltipValue = "";

		// SubDivisionId
		$this->SubDivisionId->LinkCustomAttributes = "";
		$this->SubDivisionId->HrefValue = "";
		$this->SubDivisionId->TooltipValue = "";

		// SMSText
		$this->SMSText->LinkCustomAttributes = "";
		$this->SMSText->HrefValue = "";
		$this->SMSText->TooltipValue = "";

		// sms_statusid
		$this->sms_statusid->LinkCustomAttributes = "";
		$this->sms_statusid->HrefValue = "";
		$this->sms_statusid->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// message_id
		$this->message_id->EditAttrs["class"] = "form-control";
		$this->message_id->EditCustomAttributes = "";
		$this->message_id->EditValue = $this->message_id->CurrentValue;

		// SMSDateTime
		$this->SMSDateTime->EditAttrs["class"] = "form-control";
		$this->SMSDateTime->EditCustomAttributes = "";
		$this->SMSDateTime->EditValue = FormatDateTime($this->SMSDateTime->CurrentValue, 8);

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (!$this->MobileNumber->Raw)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;

		// SystemDateTime
		$this->SystemDateTime->EditAttrs["class"] = "form-control";
		$this->SystemDateTime->EditCustomAttributes = "";
		$this->SystemDateTime->EditValue = FormatDateTime($this->SystemDateTime->CurrentValue, 8);

		// rainfall
		$this->rainfall->EditAttrs["class"] = "form-control";
		$this->rainfall->EditCustomAttributes = "";
		$this->rainfall->EditValue = $this->rainfall->CurrentValue;
		if (strval($this->rainfall->EditValue) != "" && is_numeric($this->rainfall->EditValue))
			$this->rainfall->EditValue = FormatNumber($this->rainfall->EditValue, -2, -2, -2, -2);
		

		// stationid
		$this->stationid->EditAttrs["class"] = "form-control";
		$this->stationid->EditCustomAttributes = "";
		$this->stationid->EditValue = $this->stationid->CurrentValue;

		// SubDivisionId
		$this->SubDivisionId->EditAttrs["class"] = "form-control";
		$this->SubDivisionId->EditCustomAttributes = "";
		$this->SubDivisionId->EditValue = $this->SubDivisionId->CurrentValue;

		// SMSText
		$this->SMSText->EditAttrs["class"] = "form-control";
		$this->SMSText->EditCustomAttributes = "";
		if (!$this->SMSText->Raw)
			$this->SMSText->CurrentValue = HtmlDecode($this->SMSText->CurrentValue);
		$this->SMSText->EditValue = $this->SMSText->CurrentValue;

		// sms_statusid
		$this->sms_statusid->EditAttrs["class"] = "form-control";
		$this->sms_statusid->EditCustomAttributes = "";
		$this->sms_statusid->EditValue = $this->sms_statusid->CurrentValue;

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->message_id);
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->SystemDateTime);
					$doc->exportCaption($this->rainfall);
					$doc->exportCaption($this->stationid);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->SMSText);
					$doc->exportCaption($this->sms_statusid);
				} else {
					$doc->exportCaption($this->message_id);
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->SystemDateTime);
					$doc->exportCaption($this->rainfall);
					$doc->exportCaption($this->stationid);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->SMSText);
					$doc->exportCaption($this->sms_statusid);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->message_id);
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->SystemDateTime);
						$doc->exportField($this->rainfall);
						$doc->exportField($this->stationid);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->SMSText);
						$doc->exportField($this->sms_statusid);
					} else {
						$doc->exportField($this->message_id);
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->SystemDateTime);
						$doc->exportField($this->rainfall);
						$doc->exportField($this->stationid);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->SMSText);
						$doc->exportField($this->sms_statusid);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>