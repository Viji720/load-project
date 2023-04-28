<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for vw_rpt_sms_analyser_subdivision
 */
class vw_rpt_sms_analyser_subdivision extends DbTable
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
	public $SMSDateTime;
	public $SubDivId;
	public $Num_of_Records;
	public $Percent_completed;
	public $Num_of_SMS_Received;
	public $Num_of_Created_1;
	public $Num_of_Entered_by_Subdivision;
	public $Num_of_Verified;
	public $Num_of_Status_0;
	public $Num_of_Not_Given;
	public $Sub_division;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'vw_rpt_sms_analyser_subdivision';
		$this->TableName = 'vw_rpt_sms_analyser_subdivision';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`vw_rpt_sms_analyser_subdivision`";
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

		// SMSDateTime
		$this->SMSDateTime = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_SMSDateTime', 'SMSDateTime', '`SMSDateTime`', CastDateFieldForLike("`SMSDateTime`", 7, "DB"), 133, 10, 7, FALSE, '`SMSDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMSDateTime->Sortable = TRUE; // Allow sort
		$this->SMSDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['SMSDateTime'] = &$this->SMSDateTime;

		// SubDivId
		$this->SubDivId = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_SubDivId', 'SubDivId', '`SubDivId`', '`SubDivId`', 3, 11, -1, FALSE, '`SubDivId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SubDivId->Sortable = TRUE; // Allow sort
		$this->SubDivId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SubDivId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->SubDivId->Lookup = new Lookup('SubDivId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->SubDivId->Lookup = new Lookup('SubDivId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->SubDivId->Lookup = new Lookup('SubDivId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->SubDivId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivId'] = &$this->SubDivId;

		// Num_of_Records
		$this->Num_of_Records = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Num_of_Records', 'Num_of_Records', '`Num_of_Records`', '`Num_of_Records`', 131, 23, -1, FALSE, '`Num_of_Records`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Num_of_Records->Sortable = TRUE; // Allow sort
		$this->Num_of_Records->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Num_of_Records'] = &$this->Num_of_Records;

		// Percent_completed
		$this->Percent_completed = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Percent_completed', 'Percent_completed', '`Percent_completed`', '`Percent_completed`', 131, 28, -1, FALSE, '`Percent_completed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Percent_completed->Sortable = TRUE; // Allow sort
		$this->Percent_completed->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Percent_completed'] = &$this->Percent_completed;

		// Num_of_SMS_Received
		$this->Num_of_SMS_Received = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Num_of_SMS_Received', 'Num_of_SMS_Received', '`Num_of_SMS_Received`', '`Num_of_SMS_Received`', 131, 23, -1, FALSE, '`Num_of_SMS_Received`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Num_of_SMS_Received->Sortable = TRUE; // Allow sort
		$this->Num_of_SMS_Received->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Num_of_SMS_Received'] = &$this->Num_of_SMS_Received;

		// Num_of_Created_1
		$this->Num_of_Created_1 = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Num_of_Created_1', 'Num_of_Created_1', '`Num_of_Created_1`', '`Num_of_Created_1`', 131, 23, -1, FALSE, '`Num_of_Created_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Num_of_Created_1->Sortable = TRUE; // Allow sort
		$this->Num_of_Created_1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Num_of_Created_1'] = &$this->Num_of_Created_1;

		// Num_of_Entered_by_Subdivision
		$this->Num_of_Entered_by_Subdivision = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Num_of_Entered_by_Subdivision', 'Num_of_Entered_by_Subdivision', '`Num_of_Entered_by_Subdivision`', '`Num_of_Entered_by_Subdivision`', 131, 23, -1, FALSE, '`Num_of_Entered_by_Subdivision`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Num_of_Entered_by_Subdivision->Sortable = TRUE; // Allow sort
		$this->Num_of_Entered_by_Subdivision->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Num_of_Entered_by_Subdivision'] = &$this->Num_of_Entered_by_Subdivision;

		// Num_of_Verified
		$this->Num_of_Verified = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Num_of_Verified', 'Num_of_Verified', '`Num_of_Verified`', '`Num_of_Verified`', 131, 23, -1, FALSE, '`Num_of_Verified`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Num_of_Verified->Sortable = TRUE; // Allow sort
		$this->Num_of_Verified->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Num_of_Verified'] = &$this->Num_of_Verified;

		// Num_of_Status_0
		$this->Num_of_Status_0 = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Num_of_Status_0', 'Num_of_Status_0', '`Num_of_Status_0`', '`Num_of_Status_0`', 131, 23, -1, FALSE, '`Num_of_Status_0`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Num_of_Status_0->Sortable = TRUE; // Allow sort
		$this->Num_of_Status_0->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Num_of_Status_0'] = &$this->Num_of_Status_0;

		// Num_of_Not_Given
		$this->Num_of_Not_Given = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Num_of_Not_Given', 'Num_of_Not_Given', '`Num_of_Not_Given`', '`Num_of_Not_Given`', 131, 23, -1, FALSE, '`Num_of_Not_Given`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Num_of_Not_Given->Sortable = TRUE; // Allow sort
		$this->Num_of_Not_Given->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Num_of_Not_Given'] = &$this->Num_of_Not_Given;

		// Sub_division
		$this->Sub_division = new DbField('vw_rpt_sms_analyser_subdivision', 'vw_rpt_sms_analyser_subdivision', 'x_Sub_division', 'Sub_division', '`Sub_division`', '`Sub_division`', 200, 18, -1, FALSE, '`Sub_division`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sub_division->Sortable = TRUE; // Allow sort
		$this->fields['Sub_division'] = &$this->Sub_division;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`vw_rpt_sms_analyser_subdivision`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`SMSDateTime` DESC";
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
		$this->SMSDateTime->DbValue = $row['SMSDateTime'];
		$this->SubDivId->DbValue = $row['SubDivId'];
		$this->Num_of_Records->DbValue = $row['Num_of_Records'];
		$this->Percent_completed->DbValue = $row['Percent_completed'];
		$this->Num_of_SMS_Received->DbValue = $row['Num_of_SMS_Received'];
		$this->Num_of_Created_1->DbValue = $row['Num_of_Created_1'];
		$this->Num_of_Entered_by_Subdivision->DbValue = $row['Num_of_Entered_by_Subdivision'];
		$this->Num_of_Verified->DbValue = $row['Num_of_Verified'];
		$this->Num_of_Status_0->DbValue = $row['Num_of_Status_0'];
		$this->Num_of_Not_Given->DbValue = $row['Num_of_Not_Given'];
		$this->Sub_division->DbValue = $row['Sub_division'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
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
			return "vw_rpt_sms_analyser_subdivisionlist.php";
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
		if ($pageName == "vw_rpt_sms_analyser_subdivisionview.php")
			return $Language->phrase("View");
		elseif ($pageName == "vw_rpt_sms_analyser_subdivisionedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "vw_rpt_sms_analyser_subdivisionadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "vw_rpt_sms_analyser_subdivisionlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("vw_rpt_sms_analyser_subdivisionview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("vw_rpt_sms_analyser_subdivisionview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "vw_rpt_sms_analyser_subdivisionadd.php?" . $this->getUrlParm($parm);
		else
			$url = "vw_rpt_sms_analyser_subdivisionadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("vw_rpt_sms_analyser_subdivisionedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("vw_rpt_sms_analyser_subdivisionadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("vw_rpt_sms_analyser_subdivisiondelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
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

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
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
		$this->SMSDateTime->setDbValue($rs->fields('SMSDateTime'));
		$this->SubDivId->setDbValue($rs->fields('SubDivId'));
		$this->Num_of_Records->setDbValue($rs->fields('Num_of_Records'));
		$this->Percent_completed->setDbValue($rs->fields('Percent_completed'));
		$this->Num_of_SMS_Received->setDbValue($rs->fields('Num_of_SMS_Received'));
		$this->Num_of_Created_1->setDbValue($rs->fields('Num_of_Created_1'));
		$this->Num_of_Entered_by_Subdivision->setDbValue($rs->fields('Num_of_Entered_by_Subdivision'));
		$this->Num_of_Verified->setDbValue($rs->fields('Num_of_Verified'));
		$this->Num_of_Status_0->setDbValue($rs->fields('Num_of_Status_0'));
		$this->Num_of_Not_Given->setDbValue($rs->fields('Num_of_Not_Given'));
		$this->Sub_division->setDbValue($rs->fields('Sub_division'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// SMSDateTime
		// SubDivId
		// Num_of_Records
		// Percent_completed
		// Num_of_SMS_Received
		// Num_of_Created_1
		// Num_of_Entered_by_Subdivision
		// Num_of_Verified
		// Num_of_Status_0
		// Num_of_Not_Given
		// Sub_division
		// SMSDateTime

		$this->SMSDateTime->ViewValue = $this->SMSDateTime->CurrentValue;
		$this->SMSDateTime->ViewValue = FormatDateTime($this->SMSDateTime->ViewValue, 7);
		$this->SMSDateTime->ViewCustomAttributes = "";

		// SubDivId
		$curVal = strval($this->SubDivId->CurrentValue);
		if ($curVal != "") {
			$this->SubDivId->ViewValue = $this->SubDivId->lookupCacheOption($curVal);
			if ($this->SubDivId->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`SubDivisionId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->SubDivId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->SubDivId->ViewValue = $this->SubDivId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->SubDivId->ViewValue = $this->SubDivId->CurrentValue;
				}
			}
		} else {
			$this->SubDivId->ViewValue = NULL;
		}
		$this->SubDivId->ViewCustomAttributes = "";

		// Num_of_Records
		$this->Num_of_Records->ViewValue = $this->Num_of_Records->CurrentValue;
		$this->Num_of_Records->ViewValue = FormatNumber($this->Num_of_Records->ViewValue, 0, -2, -2, -2);
		$this->Num_of_Records->CellCssStyle .= "text-align: right;";
		$this->Num_of_Records->ViewCustomAttributes = "";

		// Percent_completed
		$this->Percent_completed->ViewValue = $this->Percent_completed->CurrentValue;
		$this->Percent_completed->ViewValue = FormatPercent($this->Percent_completed->ViewValue, 3, -2, -2, -2);
		$this->Percent_completed->CellCssStyle .= "text-align: right;";
		$this->Percent_completed->ViewCustomAttributes = "";

		// Num_of_SMS_Received
		$this->Num_of_SMS_Received->ViewValue = $this->Num_of_SMS_Received->CurrentValue;
		$this->Num_of_SMS_Received->ViewValue = FormatNumber($this->Num_of_SMS_Received->ViewValue, 0, -2, -2, -2);
		$this->Num_of_SMS_Received->CellCssStyle .= "text-align: right;";
		$this->Num_of_SMS_Received->ViewCustomAttributes = "";

		// Num_of_Created_1
		$this->Num_of_Created_1->ViewValue = $this->Num_of_Created_1->CurrentValue;
		$this->Num_of_Created_1->ViewValue = FormatNumber($this->Num_of_Created_1->ViewValue, 0, -2, -2, -2);
		$this->Num_of_Created_1->CellCssStyle .= "text-align: right;";
		$this->Num_of_Created_1->ViewCustomAttributes = "";

		// Num_of_Entered_by_Subdivision
		$this->Num_of_Entered_by_Subdivision->ViewValue = $this->Num_of_Entered_by_Subdivision->CurrentValue;
		$this->Num_of_Entered_by_Subdivision->ViewValue = FormatNumber($this->Num_of_Entered_by_Subdivision->ViewValue, 0, -2, -2, -2);
		$this->Num_of_Entered_by_Subdivision->CellCssStyle .= "text-align: right;";
		$this->Num_of_Entered_by_Subdivision->ViewCustomAttributes = "";

		// Num_of_Verified
		$this->Num_of_Verified->ViewValue = $this->Num_of_Verified->CurrentValue;
		$this->Num_of_Verified->ViewValue = FormatNumber($this->Num_of_Verified->ViewValue, 0, -2, -2, -2);
		$this->Num_of_Verified->CellCssStyle .= "text-align: right;";
		$this->Num_of_Verified->ViewCustomAttributes = "";

		// Num_of_Status_0
		$this->Num_of_Status_0->ViewValue = $this->Num_of_Status_0->CurrentValue;
		$this->Num_of_Status_0->ViewValue = FormatNumber($this->Num_of_Status_0->ViewValue, 0, -2, -2, -2);
		$this->Num_of_Status_0->CellCssStyle .= "text-align: right;";
		$this->Num_of_Status_0->ViewCustomAttributes = "";

		// Num_of_Not_Given
		$this->Num_of_Not_Given->ViewValue = $this->Num_of_Not_Given->CurrentValue;
		$this->Num_of_Not_Given->ViewValue = FormatNumber($this->Num_of_Not_Given->ViewValue, 0, -2, -2, -2);
		$this->Num_of_Not_Given->CssClass = "font-italic";
		$this->Num_of_Not_Given->CellCssStyle .= "text-align: right;";
		$this->Num_of_Not_Given->ViewCustomAttributes = "";

		// Sub_division
		$this->Sub_division->ViewValue = $this->Sub_division->CurrentValue;
		$this->Sub_division->ViewCustomAttributes = "";

		// SMSDateTime
		$this->SMSDateTime->LinkCustomAttributes = "";
		$this->SMSDateTime->HrefValue = "";
		$this->SMSDateTime->TooltipValue = "";

		// SubDivId
		$this->SubDivId->LinkCustomAttributes = "";
		$this->SubDivId->HrefValue = "";
		$this->SubDivId->TooltipValue = "";

		// Num_of_Records
		$this->Num_of_Records->LinkCustomAttributes = "";
		$this->Num_of_Records->HrefValue = "";
		$this->Num_of_Records->TooltipValue = "";

		// Percent_completed
		$this->Percent_completed->LinkCustomAttributes = "";
		$this->Percent_completed->HrefValue = "";
		$this->Percent_completed->TooltipValue = "";

		// Num_of_SMS_Received
		$this->Num_of_SMS_Received->LinkCustomAttributes = "";
		$this->Num_of_SMS_Received->HrefValue = "";
		$this->Num_of_SMS_Received->TooltipValue = "";

		// Num_of_Created_1
		$this->Num_of_Created_1->LinkCustomAttributes = "";
		$this->Num_of_Created_1->HrefValue = "";
		$this->Num_of_Created_1->TooltipValue = "";

		// Num_of_Entered_by_Subdivision
		$this->Num_of_Entered_by_Subdivision->LinkCustomAttributes = "";
		$this->Num_of_Entered_by_Subdivision->HrefValue = "";
		$this->Num_of_Entered_by_Subdivision->TooltipValue = "";

		// Num_of_Verified
		$this->Num_of_Verified->LinkCustomAttributes = "";
		$this->Num_of_Verified->HrefValue = "";
		$this->Num_of_Verified->TooltipValue = "";

		// Num_of_Status_0
		$this->Num_of_Status_0->LinkCustomAttributes = "";
		$this->Num_of_Status_0->HrefValue = "";
		$this->Num_of_Status_0->TooltipValue = "";

		// Num_of_Not_Given
		$this->Num_of_Not_Given->LinkCustomAttributes = "";
		$this->Num_of_Not_Given->HrefValue = "";
		$this->Num_of_Not_Given->TooltipValue = "";

		// Sub_division
		$this->Sub_division->LinkCustomAttributes = "";
		$this->Sub_division->HrefValue = "";
		$this->Sub_division->TooltipValue = "";

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

		// SMSDateTime
		$this->SMSDateTime->EditAttrs["class"] = "form-control";
		$this->SMSDateTime->EditCustomAttributes = "";
		$this->SMSDateTime->EditValue = FormatDateTime($this->SMSDateTime->CurrentValue, 7);

		// SubDivId
		$this->SubDivId->EditAttrs["class"] = "form-control";
		$this->SubDivId->EditCustomAttributes = "";

		// Num_of_Records
		$this->Num_of_Records->EditAttrs["class"] = "form-control";
		$this->Num_of_Records->EditCustomAttributes = "";
		$this->Num_of_Records->EditValue = $this->Num_of_Records->CurrentValue;
		if (strval($this->Num_of_Records->EditValue) != "" && is_numeric($this->Num_of_Records->EditValue))
			$this->Num_of_Records->EditValue = FormatNumber($this->Num_of_Records->EditValue, -2, -2, -2, -2);
		

		// Percent_completed
		$this->Percent_completed->EditAttrs["class"] = "form-control";
		$this->Percent_completed->EditCustomAttributes = "";
		$this->Percent_completed->EditValue = $this->Percent_completed->CurrentValue;
		if (strval($this->Percent_completed->EditValue) != "" && is_numeric($this->Percent_completed->EditValue))
			$this->Percent_completed->EditValue = FormatNumber($this->Percent_completed->EditValue, -2, -1, -2, 0);
		

		// Num_of_SMS_Received
		$this->Num_of_SMS_Received->EditAttrs["class"] = "form-control";
		$this->Num_of_SMS_Received->EditCustomAttributes = "";
		$this->Num_of_SMS_Received->EditValue = $this->Num_of_SMS_Received->CurrentValue;
		if (strval($this->Num_of_SMS_Received->EditValue) != "" && is_numeric($this->Num_of_SMS_Received->EditValue))
			$this->Num_of_SMS_Received->EditValue = FormatNumber($this->Num_of_SMS_Received->EditValue, -2, -2, -2, -2);
		

		// Num_of_Created_1
		$this->Num_of_Created_1->EditAttrs["class"] = "form-control";
		$this->Num_of_Created_1->EditCustomAttributes = "";
		$this->Num_of_Created_1->EditValue = $this->Num_of_Created_1->CurrentValue;
		if (strval($this->Num_of_Created_1->EditValue) != "" && is_numeric($this->Num_of_Created_1->EditValue))
			$this->Num_of_Created_1->EditValue = FormatNumber($this->Num_of_Created_1->EditValue, -2, -2, -2, -2);
		

		// Num_of_Entered_by_Subdivision
		$this->Num_of_Entered_by_Subdivision->EditAttrs["class"] = "form-control";
		$this->Num_of_Entered_by_Subdivision->EditCustomAttributes = "";
		$this->Num_of_Entered_by_Subdivision->EditValue = $this->Num_of_Entered_by_Subdivision->CurrentValue;
		if (strval($this->Num_of_Entered_by_Subdivision->EditValue) != "" && is_numeric($this->Num_of_Entered_by_Subdivision->EditValue))
			$this->Num_of_Entered_by_Subdivision->EditValue = FormatNumber($this->Num_of_Entered_by_Subdivision->EditValue, -2, -2, -2, -2);
		

		// Num_of_Verified
		$this->Num_of_Verified->EditAttrs["class"] = "form-control";
		$this->Num_of_Verified->EditCustomAttributes = "";
		$this->Num_of_Verified->EditValue = $this->Num_of_Verified->CurrentValue;
		if (strval($this->Num_of_Verified->EditValue) != "" && is_numeric($this->Num_of_Verified->EditValue))
			$this->Num_of_Verified->EditValue = FormatNumber($this->Num_of_Verified->EditValue, -2, -2, -2, -2);
		

		// Num_of_Status_0
		$this->Num_of_Status_0->EditAttrs["class"] = "form-control";
		$this->Num_of_Status_0->EditCustomAttributes = "";
		$this->Num_of_Status_0->EditValue = $this->Num_of_Status_0->CurrentValue;
		if (strval($this->Num_of_Status_0->EditValue) != "" && is_numeric($this->Num_of_Status_0->EditValue))
			$this->Num_of_Status_0->EditValue = FormatNumber($this->Num_of_Status_0->EditValue, -2, -2, -2, -2);
		

		// Num_of_Not_Given
		$this->Num_of_Not_Given->EditAttrs["class"] = "form-control";
		$this->Num_of_Not_Given->EditCustomAttributes = "";
		$this->Num_of_Not_Given->EditValue = $this->Num_of_Not_Given->CurrentValue;
		if (strval($this->Num_of_Not_Given->EditValue) != "" && is_numeric($this->Num_of_Not_Given->EditValue))
			$this->Num_of_Not_Given->EditValue = FormatNumber($this->Num_of_Not_Given->EditValue, -2, -2, -2, -2);
		

		// Sub_division
		$this->Sub_division->EditAttrs["class"] = "form-control";
		$this->Sub_division->EditCustomAttributes = "";
		if (!$this->Sub_division->Raw)
			$this->Sub_division->CurrentValue = HtmlDecode($this->Sub_division->CurrentValue);
		$this->Sub_division->EditValue = $this->Sub_division->CurrentValue;

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
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->SubDivId);
					$doc->exportCaption($this->Num_of_Records);
					$doc->exportCaption($this->Percent_completed);
					$doc->exportCaption($this->Num_of_SMS_Received);
					$doc->exportCaption($this->Num_of_Created_1);
					$doc->exportCaption($this->Num_of_Entered_by_Subdivision);
					$doc->exportCaption($this->Num_of_Verified);
					$doc->exportCaption($this->Num_of_Status_0);
					$doc->exportCaption($this->Num_of_Not_Given);
					$doc->exportCaption($this->Sub_division);
				} else {
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->SubDivId);
					$doc->exportCaption($this->Num_of_Records);
					$doc->exportCaption($this->Percent_completed);
					$doc->exportCaption($this->Num_of_SMS_Received);
					$doc->exportCaption($this->Num_of_Created_1);
					$doc->exportCaption($this->Num_of_Entered_by_Subdivision);
					$doc->exportCaption($this->Num_of_Verified);
					$doc->exportCaption($this->Num_of_Status_0);
					$doc->exportCaption($this->Num_of_Not_Given);
					$doc->exportCaption($this->Sub_division);
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
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->SubDivId);
						$doc->exportField($this->Num_of_Records);
						$doc->exportField($this->Percent_completed);
						$doc->exportField($this->Num_of_SMS_Received);
						$doc->exportField($this->Num_of_Created_1);
						$doc->exportField($this->Num_of_Entered_by_Subdivision);
						$doc->exportField($this->Num_of_Verified);
						$doc->exportField($this->Num_of_Status_0);
						$doc->exportField($this->Num_of_Not_Given);
						$doc->exportField($this->Sub_division);
					} else {
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->SubDivId);
						$doc->exportField($this->Num_of_Records);
						$doc->exportField($this->Percent_completed);
						$doc->exportField($this->Num_of_SMS_Received);
						$doc->exportField($this->Num_of_Created_1);
						$doc->exportField($this->Num_of_Entered_by_Subdivision);
						$doc->exportField($this->Num_of_Verified);
						$doc->exportField($this->Num_of_Status_0);
						$doc->exportField($this->Num_of_Not_Given);
						$doc->exportField($this->Sub_division);
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