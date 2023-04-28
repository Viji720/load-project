<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for lkp_status
 */
class lkp_status extends DbTable
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
	public $Status;
	public $StatusName;
	public $is_station_allowed;
	public $is_subdiv_allowed;
	public $is_circle_allowed;
	public $is_WRDO_allowed;
	public $record_count;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'lkp_status';
		$this->TableName = 'lkp_status';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`lkp_status`";
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

		// Status
		$this->Status = new DbField('lkp_status', 'lkp_status', 'x_Status', 'Status', '`Status`', '`Status`', 3, 11, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Status->IsPrimaryKey = TRUE; // Primary key field
		$this->Status->Nullable = FALSE; // NOT NULL field
		$this->Status->Required = TRUE; // Required field
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Status'] = &$this->Status;

		// StatusName
		$this->StatusName = new DbField('lkp_status', 'lkp_status', 'x_StatusName', 'StatusName', '`StatusName`', '`StatusName`', 200, 100, -1, FALSE, '`StatusName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StatusName->Sortable = TRUE; // Allow sort
		$this->fields['StatusName'] = &$this->StatusName;

		// is_station_allowed
		$this->is_station_allowed = new DbField('lkp_status', 'lkp_status', 'x_is_station_allowed', 'is_station_allowed', '`is_station_allowed`', '`is_station_allowed`', 200, 1, -1, FALSE, '`is_station_allowed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->is_station_allowed->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->is_station_allowed->Lookup = new Lookup('is_station_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->is_station_allowed->Lookup = new Lookup('is_station_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->is_station_allowed->Lookup = new Lookup('is_station_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->is_station_allowed->OptionCount = 2;
		$this->fields['is_station_allowed'] = &$this->is_station_allowed;

		// is_subdiv_allowed
		$this->is_subdiv_allowed = new DbField('lkp_status', 'lkp_status', 'x_is_subdiv_allowed', 'is_subdiv_allowed', '`is_subdiv_allowed`', '`is_subdiv_allowed`', 200, 1, -1, FALSE, '`is_subdiv_allowed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->is_subdiv_allowed->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->is_subdiv_allowed->Lookup = new Lookup('is_subdiv_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->is_subdiv_allowed->Lookup = new Lookup('is_subdiv_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->is_subdiv_allowed->Lookup = new Lookup('is_subdiv_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->is_subdiv_allowed->OptionCount = 2;
		$this->fields['is_subdiv_allowed'] = &$this->is_subdiv_allowed;

		// is_circle_allowed
		$this->is_circle_allowed = new DbField('lkp_status', 'lkp_status', 'x_is_circle_allowed', 'is_circle_allowed', '`is_circle_allowed`', '`is_circle_allowed`', 200, 1, -1, FALSE, '`is_circle_allowed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->is_circle_allowed->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->is_circle_allowed->Lookup = new Lookup('is_circle_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->is_circle_allowed->Lookup = new Lookup('is_circle_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->is_circle_allowed->Lookup = new Lookup('is_circle_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->is_circle_allowed->OptionCount = 2;
		$this->fields['is_circle_allowed'] = &$this->is_circle_allowed;

		// is_WRDO_allowed
		$this->is_WRDO_allowed = new DbField('lkp_status', 'lkp_status', 'x_is_WRDO_allowed', 'is_WRDO_allowed', '`is_WRDO_allowed`', '`is_WRDO_allowed`', 200, 1, -1, FALSE, '`is_WRDO_allowed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->is_WRDO_allowed->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->is_WRDO_allowed->Lookup = new Lookup('is_WRDO_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->is_WRDO_allowed->Lookup = new Lookup('is_WRDO_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->is_WRDO_allowed->Lookup = new Lookup('is_WRDO_allowed', 'lkp_status', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->is_WRDO_allowed->OptionCount = 2;
		$this->fields['is_WRDO_allowed'] = &$this->is_WRDO_allowed;

		// record_count
		$this->record_count = new DbField('lkp_status', 'lkp_status', 'x_record_count', 'record_count', '`record_count`', '`record_count`', 3, 11, -1, FALSE, '`record_count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->record_count->Sortable = TRUE; // Allow sort
		$this->record_count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['record_count'] = &$this->record_count;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`lkp_status`";
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
			if (array_key_exists('Status', $rs))
				AddFilter($where, QuotedName('Status', $this->Dbid) . '=' . QuotedValue($rs['Status'], $this->Status->DataType, $this->Dbid));
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
		$this->Status->DbValue = $row['Status'];
		$this->StatusName->DbValue = $row['StatusName'];
		$this->is_station_allowed->DbValue = $row['is_station_allowed'];
		$this->is_subdiv_allowed->DbValue = $row['is_subdiv_allowed'];
		$this->is_circle_allowed->DbValue = $row['is_circle_allowed'];
		$this->is_WRDO_allowed->DbValue = $row['is_WRDO_allowed'];
		$this->record_count->DbValue = $row['record_count'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`Status` = @Status@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('Status', $row) ? $row['Status'] : NULL;
		else
			$val = $this->Status->OldValue !== NULL ? $this->Status->OldValue : $this->Status->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@Status@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "lkp_statuslist.php";
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
		if ($pageName == "lkp_statusview.php")
			return $Language->phrase("View");
		elseif ($pageName == "lkp_statusedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "lkp_statusadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "lkp_statuslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("lkp_statusview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("lkp_statusview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "lkp_statusadd.php?" . $this->getUrlParm($parm);
		else
			$url = "lkp_statusadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("lkp_statusedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("lkp_statusadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("lkp_statusdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "Status:" . JsonEncode($this->Status->CurrentValue, "number");
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
		if ($this->Status->CurrentValue != NULL) {
			$url .= "Status=" . urlencode($this->Status->CurrentValue);
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
			if (Param("Status") !== NULL)
				$arKeys[] = Param("Status");
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
				$this->Status->CurrentValue = $key;
			else
				$this->Status->OldValue = $key;
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
		$this->Status->setDbValue($rs->fields('Status'));
		$this->StatusName->setDbValue($rs->fields('StatusName'));
		$this->is_station_allowed->setDbValue($rs->fields('is_station_allowed'));
		$this->is_subdiv_allowed->setDbValue($rs->fields('is_subdiv_allowed'));
		$this->is_circle_allowed->setDbValue($rs->fields('is_circle_allowed'));
		$this->is_WRDO_allowed->setDbValue($rs->fields('is_WRDO_allowed'));
		$this->record_count->setDbValue($rs->fields('record_count'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Status
		// StatusName
		// is_station_allowed
		// is_subdiv_allowed
		// is_circle_allowed
		// is_WRDO_allowed
		// record_count
		// Status

		$this->Status->ViewValue = $this->Status->CurrentValue;
		$this->Status->ViewValue = FormatNumber($this->Status->ViewValue, 0, -2, -2, -2);
		$this->Status->ViewCustomAttributes = "";

		// StatusName
		$this->StatusName->ViewValue = $this->StatusName->CurrentValue;
		$this->StatusName->ViewCustomAttributes = "";

		// is_station_allowed
		if (strval($this->is_station_allowed->CurrentValue) != "") {
			$this->is_station_allowed->ViewValue = $this->is_station_allowed->optionCaption($this->is_station_allowed->CurrentValue);
		} else {
			$this->is_station_allowed->ViewValue = NULL;
		}
		$this->is_station_allowed->ViewCustomAttributes = "";

		// is_subdiv_allowed
		if (strval($this->is_subdiv_allowed->CurrentValue) != "") {
			$this->is_subdiv_allowed->ViewValue = $this->is_subdiv_allowed->optionCaption($this->is_subdiv_allowed->CurrentValue);
		} else {
			$this->is_subdiv_allowed->ViewValue = NULL;
		}
		$this->is_subdiv_allowed->ViewCustomAttributes = "";

		// is_circle_allowed
		if (strval($this->is_circle_allowed->CurrentValue) != "") {
			$this->is_circle_allowed->ViewValue = $this->is_circle_allowed->optionCaption($this->is_circle_allowed->CurrentValue);
		} else {
			$this->is_circle_allowed->ViewValue = NULL;
		}
		$this->is_circle_allowed->ViewCustomAttributes = "";

		// is_WRDO_allowed
		if (strval($this->is_WRDO_allowed->CurrentValue) != "") {
			$this->is_WRDO_allowed->ViewValue = $this->is_WRDO_allowed->optionCaption($this->is_WRDO_allowed->CurrentValue);
		} else {
			$this->is_WRDO_allowed->ViewValue = NULL;
		}
		$this->is_WRDO_allowed->ViewCustomAttributes = "";

		// record_count
		$this->record_count->ViewValue = $this->record_count->CurrentValue;
		$this->record_count->ViewValue = FormatNumber($this->record_count->ViewValue, 0, -2, -2, -2);
		$this->record_count->ViewCustomAttributes = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// StatusName
		$this->StatusName->LinkCustomAttributes = "";
		$this->StatusName->HrefValue = "";
		$this->StatusName->TooltipValue = "";

		// is_station_allowed
		$this->is_station_allowed->LinkCustomAttributes = "";
		$this->is_station_allowed->HrefValue = "";
		$this->is_station_allowed->TooltipValue = "";

		// is_subdiv_allowed
		$this->is_subdiv_allowed->LinkCustomAttributes = "";
		$this->is_subdiv_allowed->HrefValue = "";
		$this->is_subdiv_allowed->TooltipValue = "";

		// is_circle_allowed
		$this->is_circle_allowed->LinkCustomAttributes = "";
		$this->is_circle_allowed->HrefValue = "";
		$this->is_circle_allowed->TooltipValue = "";

		// is_WRDO_allowed
		$this->is_WRDO_allowed->LinkCustomAttributes = "";
		$this->is_WRDO_allowed->HrefValue = "";
		$this->is_WRDO_allowed->TooltipValue = "";

		// record_count
		$this->record_count->LinkCustomAttributes = "";
		$this->record_count->HrefValue = "";
		$this->record_count->TooltipValue = "";

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

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";
		$this->Status->EditValue = $this->Status->CurrentValue;

		// StatusName
		$this->StatusName->EditAttrs["class"] = "form-control";
		$this->StatusName->EditCustomAttributes = "";
		if (!$this->StatusName->Raw)
			$this->StatusName->CurrentValue = HtmlDecode($this->StatusName->CurrentValue);
		$this->StatusName->EditValue = $this->StatusName->CurrentValue;

		// is_station_allowed
		$this->is_station_allowed->EditCustomAttributes = "";
		$this->is_station_allowed->EditValue = $this->is_station_allowed->options(FALSE);

		// is_subdiv_allowed
		$this->is_subdiv_allowed->EditCustomAttributes = "";
		$this->is_subdiv_allowed->EditValue = $this->is_subdiv_allowed->options(FALSE);

		// is_circle_allowed
		$this->is_circle_allowed->EditCustomAttributes = "";
		$this->is_circle_allowed->EditValue = $this->is_circle_allowed->options(FALSE);

		// is_WRDO_allowed
		$this->is_WRDO_allowed->EditCustomAttributes = "";
		$this->is_WRDO_allowed->EditValue = $this->is_WRDO_allowed->options(FALSE);

		// record_count
		$this->record_count->EditAttrs["class"] = "form-control";
		$this->record_count->EditCustomAttributes = "";
		$this->record_count->EditValue = $this->record_count->CurrentValue;

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
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->StatusName);
					$doc->exportCaption($this->is_station_allowed);
					$doc->exportCaption($this->is_subdiv_allowed);
					$doc->exportCaption($this->is_circle_allowed);
					$doc->exportCaption($this->is_WRDO_allowed);
					$doc->exportCaption($this->record_count);
				} else {
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->StatusName);
					$doc->exportCaption($this->is_station_allowed);
					$doc->exportCaption($this->is_subdiv_allowed);
					$doc->exportCaption($this->is_circle_allowed);
					$doc->exportCaption($this->is_WRDO_allowed);
					$doc->exportCaption($this->record_count);
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
						$doc->exportField($this->Status);
						$doc->exportField($this->StatusName);
						$doc->exportField($this->is_station_allowed);
						$doc->exportField($this->is_subdiv_allowed);
						$doc->exportField($this->is_circle_allowed);
						$doc->exportField($this->is_WRDO_allowed);
						$doc->exportField($this->record_count);
					} else {
						$doc->exportField($this->Status);
						$doc->exportField($this->StatusName);
						$doc->exportField($this->is_station_allowed);
						$doc->exportField($this->is_subdiv_allowed);
						$doc->exportField($this->is_circle_allowed);
						$doc->exportField($this->is_WRDO_allowed);
						$doc->exportField($this->record_count);
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