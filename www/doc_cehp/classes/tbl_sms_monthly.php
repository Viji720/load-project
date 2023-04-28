<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for tbl_sms_monthly
 */
class tbl_sms_monthly extends DbTable
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
	public $Slno;
	public $StationId;
	public $Water_Year;
	public $day_of_month;
	public $Jun_rainfall;
	public $Jul_rainfall;
	public $Aug_rainfall;
	public $Sep_rainfall;
	public $Oct_rainfall;
	public $Nov_rainfall;
	public $Dec_rainfall;
	public $Jan_rainfall;
	public $Feb_rainfall;
	public $Mar_rainfall;
	public $Apr_rainfall;
	public $May_rainfall;
	public $SenderMobileNumber;
	public $IsChanged;
	public $SubDivisionId;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tbl_sms_monthly';
		$this->TableName = 'tbl_sms_monthly';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`tbl_sms_monthly`";
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
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// Slno
		$this->Slno = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Slno', 'Slno', '`Slno`', '`Slno`', 3, 11, -1, FALSE, '`Slno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Slno->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Slno->IsPrimaryKey = TRUE; // Primary key field
		$this->Slno->Sortable = TRUE; // Allow sort
		$this->Slno->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Slno'] = &$this->Slno;

		// StationId
		$this->StationId = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->StationId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '`StationName`', '');
				break;
			case "kn":
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '`StationName`', '');
				break;
			default:
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '`StationName`', '');
				break;
		}
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;

		// Water_Year
		$this->Water_Year = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Water_Year', 'Water_Year', '`Water_Year`', '`Water_Year`', 200, 9, -1, FALSE, '`Water_Year`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Water_Year->Sortable = TRUE; // Allow sort
		$this->fields['Water_Year'] = &$this->Water_Year;

		// day_of_month
		$this->day_of_month = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_day_of_month', 'day_of_month', '`day_of_month`', '`day_of_month`', 3, 2, -1, FALSE, '`day_of_month`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->day_of_month->Sortable = TRUE; // Allow sort
		$this->day_of_month->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['day_of_month'] = &$this->day_of_month;

		// Jun_rainfall
		$this->Jun_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Jun_rainfall', 'Jun_rainfall', '`Jun_rainfall`', '`Jun_rainfall`', 4, 7, -1, FALSE, '`Jun_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Jun_rainfall->Sortable = TRUE; // Allow sort
		$this->Jun_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Jun_rainfall'] = &$this->Jun_rainfall;

		// Jul_rainfall
		$this->Jul_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Jul_rainfall', 'Jul_rainfall', '`Jul_rainfall`', '`Jul_rainfall`', 4, 7, -1, FALSE, '`Jul_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Jul_rainfall->Sortable = TRUE; // Allow sort
		$this->Jul_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Jul_rainfall'] = &$this->Jul_rainfall;

		// Aug_rainfall
		$this->Aug_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Aug_rainfall', 'Aug_rainfall', '`Aug_rainfall`', '`Aug_rainfall`', 4, 7, -1, FALSE, '`Aug_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Aug_rainfall->Sortable = TRUE; // Allow sort
		$this->Aug_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Aug_rainfall'] = &$this->Aug_rainfall;

		// Sep_rainfall
		$this->Sep_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Sep_rainfall', 'Sep_rainfall', '`Sep_rainfall`', '`Sep_rainfall`', 4, 7, -1, FALSE, '`Sep_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sep_rainfall->Sortable = TRUE; // Allow sort
		$this->Sep_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Sep_rainfall'] = &$this->Sep_rainfall;

		// Oct_rainfall
		$this->Oct_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Oct_rainfall', 'Oct_rainfall', '`Oct_rainfall`', '`Oct_rainfall`', 4, 7, -1, FALSE, '`Oct_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Oct_rainfall->Sortable = TRUE; // Allow sort
		$this->Oct_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Oct_rainfall'] = &$this->Oct_rainfall;

		// Nov_rainfall
		$this->Nov_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Nov_rainfall', 'Nov_rainfall', '`Nov_rainfall`', '`Nov_rainfall`', 4, 7, -1, FALSE, '`Nov_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nov_rainfall->Sortable = TRUE; // Allow sort
		$this->Nov_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Nov_rainfall'] = &$this->Nov_rainfall;

		// Dec_rainfall
		$this->Dec_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Dec_rainfall', 'Dec_rainfall', '`Dec_rainfall`', '`Dec_rainfall`', 4, 7, -1, FALSE, '`Dec_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dec_rainfall->Sortable = TRUE; // Allow sort
		$this->Dec_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Dec_rainfall'] = &$this->Dec_rainfall;

		// Jan_rainfall
		$this->Jan_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Jan_rainfall', 'Jan_rainfall', '`Jan_rainfall`', '`Jan_rainfall`', 4, 7, -1, FALSE, '`Jan_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Jan_rainfall->Sortable = TRUE; // Allow sort
		$this->Jan_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Jan_rainfall'] = &$this->Jan_rainfall;

		// Feb_rainfall
		$this->Feb_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Feb_rainfall', 'Feb_rainfall', '`Feb_rainfall`', '`Feb_rainfall`', 4, 7, -1, FALSE, '`Feb_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Feb_rainfall->Sortable = TRUE; // Allow sort
		$this->Feb_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Feb_rainfall'] = &$this->Feb_rainfall;

		// Mar_rainfall
		$this->Mar_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Mar_rainfall', 'Mar_rainfall', '`Mar_rainfall`', '`Mar_rainfall`', 4, 7, -1, FALSE, '`Mar_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mar_rainfall->Sortable = TRUE; // Allow sort
		$this->Mar_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Mar_rainfall'] = &$this->Mar_rainfall;

		// Apr_rainfall
		$this->Apr_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_Apr_rainfall', 'Apr_rainfall', '`Apr_rainfall`', '`Apr_rainfall`', 4, 7, -1, FALSE, '`Apr_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Apr_rainfall->Sortable = TRUE; // Allow sort
		$this->Apr_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Apr_rainfall'] = &$this->Apr_rainfall;

		// May_rainfall
		$this->May_rainfall = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_May_rainfall', 'May_rainfall', '`May_rainfall`', '`May_rainfall`', 4, 7, -1, FALSE, '`May_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->May_rainfall->Sortable = TRUE; // Allow sort
		$this->May_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['May_rainfall'] = &$this->May_rainfall;

		// SenderMobileNumber
		$this->SenderMobileNumber = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_SenderMobileNumber', 'SenderMobileNumber', '`SenderMobileNumber`', '`SenderMobileNumber`', 200, 25, -1, FALSE, '`SenderMobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SenderMobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['SenderMobileNumber'] = &$this->SenderMobileNumber;

		// IsChanged
		$this->IsChanged = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_IsChanged', 'IsChanged', '`IsChanged`', '`IsChanged`', 200, 1, -1, FALSE, '`IsChanged`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IsChanged->Nullable = FALSE; // NOT NULL field
		$this->IsChanged->Sortable = TRUE; // Allow sort
		$this->fields['IsChanged'] = &$this->IsChanged;

		// SubDivisionId
		$this->SubDivisionId = new DbField('tbl_sms_monthly', 'tbl_sms_monthly', 'x_SubDivisionId', 'SubDivisionId', '`SubDivisionId`', '`SubDivisionId`', 3, 11, -1, FALSE, '`SubDivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubDivisionId->Nullable = FALSE; // NOT NULL field
		$this->SubDivisionId->Required = TRUE; // Required field
		$this->SubDivisionId->Sortable = TRUE; // Allow sort
		$this->SubDivisionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivisionId'] = &$this->SubDivisionId;
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

	// Single column sort
	public function updateSort(&$fld)
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
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`tbl_sms_monthly`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`Water_Year` ASC,`day_of_month` ASC";
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
		global $Security;

		// Add User ID filter
		if ($Security->currentUserID() != "" && !$Security->isAdmin()) { // Non system admin
			$filter = $this->addUserIDFilter($filter, $id);
		}
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

			// Get insert id if necessary
			$this->Slno->setDbValue($conn->insert_ID());
			$rs['Slno'] = $this->Slno->DbValue;
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
			if (array_key_exists('Slno', $rs))
				AddFilter($where, QuotedName('Slno', $this->Dbid) . '=' . QuotedValue($rs['Slno'], $this->Slno->DataType, $this->Dbid));
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
		$this->Slno->DbValue = $row['Slno'];
		$this->StationId->DbValue = $row['StationId'];
		$this->Water_Year->DbValue = $row['Water_Year'];
		$this->day_of_month->DbValue = $row['day_of_month'];
		$this->Jun_rainfall->DbValue = $row['Jun_rainfall'];
		$this->Jul_rainfall->DbValue = $row['Jul_rainfall'];
		$this->Aug_rainfall->DbValue = $row['Aug_rainfall'];
		$this->Sep_rainfall->DbValue = $row['Sep_rainfall'];
		$this->Oct_rainfall->DbValue = $row['Oct_rainfall'];
		$this->Nov_rainfall->DbValue = $row['Nov_rainfall'];
		$this->Dec_rainfall->DbValue = $row['Dec_rainfall'];
		$this->Jan_rainfall->DbValue = $row['Jan_rainfall'];
		$this->Feb_rainfall->DbValue = $row['Feb_rainfall'];
		$this->Mar_rainfall->DbValue = $row['Mar_rainfall'];
		$this->Apr_rainfall->DbValue = $row['Apr_rainfall'];
		$this->May_rainfall->DbValue = $row['May_rainfall'];
		$this->SenderMobileNumber->DbValue = $row['SenderMobileNumber'];
		$this->IsChanged->DbValue = $row['IsChanged'];
		$this->SubDivisionId->DbValue = $row['SubDivisionId'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`Slno` = @Slno@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('Slno', $row) ? $row['Slno'] : NULL;
		else
			$val = $this->Slno->OldValue !== NULL ? $this->Slno->OldValue : $this->Slno->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@Slno@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "tbl_sms_monthlylist.php";
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
		if ($pageName == "tbl_sms_monthlyview.php")
			return $Language->phrase("View");
		elseif ($pageName == "tbl_sms_monthlyedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tbl_sms_monthlyadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tbl_sms_monthlylist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("tbl_sms_monthlyview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tbl_sms_monthlyview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "tbl_sms_monthlyadd.php?" . $this->getUrlParm($parm);
		else
			$url = "tbl_sms_monthlyadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tbl_sms_monthlyedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("tbl_sms_monthlyadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("tbl_sms_monthlydelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "Slno:" . JsonEncode($this->Slno->CurrentValue, "number");
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
		if ($this->Slno->CurrentValue != NULL) {
			$url .= "Slno=" . urlencode($this->Slno->CurrentValue);
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
			if (Param("Slno") !== NULL)
				$arKeys[] = Param("Slno");
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
				$this->Slno->CurrentValue = $key;
			else
				$this->Slno->OldValue = $key;
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
		$this->Slno->setDbValue($rs->fields('Slno'));
		$this->StationId->setDbValue($rs->fields('StationId'));
		$this->Water_Year->setDbValue($rs->fields('Water_Year'));
		$this->day_of_month->setDbValue($rs->fields('day_of_month'));
		$this->Jun_rainfall->setDbValue($rs->fields('Jun_rainfall'));
		$this->Jul_rainfall->setDbValue($rs->fields('Jul_rainfall'));
		$this->Aug_rainfall->setDbValue($rs->fields('Aug_rainfall'));
		$this->Sep_rainfall->setDbValue($rs->fields('Sep_rainfall'));
		$this->Oct_rainfall->setDbValue($rs->fields('Oct_rainfall'));
		$this->Nov_rainfall->setDbValue($rs->fields('Nov_rainfall'));
		$this->Dec_rainfall->setDbValue($rs->fields('Dec_rainfall'));
		$this->Jan_rainfall->setDbValue($rs->fields('Jan_rainfall'));
		$this->Feb_rainfall->setDbValue($rs->fields('Feb_rainfall'));
		$this->Mar_rainfall->setDbValue($rs->fields('Mar_rainfall'));
		$this->Apr_rainfall->setDbValue($rs->fields('Apr_rainfall'));
		$this->May_rainfall->setDbValue($rs->fields('May_rainfall'));
		$this->SenderMobileNumber->setDbValue($rs->fields('SenderMobileNumber'));
		$this->IsChanged->setDbValue($rs->fields('IsChanged'));
		$this->SubDivisionId->setDbValue($rs->fields('SubDivisionId'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Slno
		// StationId
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
		// SenderMobileNumber
		// IsChanged
		// SubDivisionId
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

		// SenderMobileNumber
		$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
		$this->SenderMobileNumber->ViewCustomAttributes = "";

		// IsChanged
		$this->IsChanged->ViewValue = $this->IsChanged->CurrentValue;
		$this->IsChanged->ViewCustomAttributes = "";

		// SubDivisionId
		$this->SubDivisionId->ViewValue = $this->SubDivisionId->CurrentValue;
		$this->SubDivisionId->ViewValue = FormatNumber($this->SubDivisionId->ViewValue, 0, -2, -2, -2);
		$this->SubDivisionId->ViewCustomAttributes = "";

		// Slno
		$this->Slno->LinkCustomAttributes = "";
		$this->Slno->HrefValue = "";
		$this->Slno->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

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

		// SenderMobileNumber
		$this->SenderMobileNumber->LinkCustomAttributes = "";
		$this->SenderMobileNumber->HrefValue = "";
		$this->SenderMobileNumber->TooltipValue = "";

		// IsChanged
		$this->IsChanged->LinkCustomAttributes = "";
		$this->IsChanged->HrefValue = "";
		$this->IsChanged->TooltipValue = "";

		// SubDivisionId
		$this->SubDivisionId->LinkCustomAttributes = "";
		$this->SubDivisionId->HrefValue = "";
		$this->SubDivisionId->TooltipValue = "";

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

		// Slno
		$this->Slno->EditAttrs["class"] = "form-control";
		$this->Slno->EditCustomAttributes = "";
		$this->Slno->EditValue = $this->Slno->CurrentValue;
		$this->Slno->ViewCustomAttributes = "";

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
		$this->Jun_rainfall->EditValue = $this->Jun_rainfall->CurrentValue;
		if (strval($this->Jun_rainfall->EditValue) != "" && is_numeric($this->Jun_rainfall->EditValue))
			$this->Jun_rainfall->EditValue = FormatNumber($this->Jun_rainfall->EditValue, -2, -2, -2, -2);
		

		// Jul_rainfall
		$this->Jul_rainfall->EditAttrs["class"] = "form-control";
		$this->Jul_rainfall->EditCustomAttributes = "";
		$this->Jul_rainfall->EditValue = $this->Jul_rainfall->CurrentValue;
		if (strval($this->Jul_rainfall->EditValue) != "" && is_numeric($this->Jul_rainfall->EditValue))
			$this->Jul_rainfall->EditValue = FormatNumber($this->Jul_rainfall->EditValue, -2, -2, -2, -2);
		

		// Aug_rainfall
		$this->Aug_rainfall->EditAttrs["class"] = "form-control";
		$this->Aug_rainfall->EditCustomAttributes = "";
		$this->Aug_rainfall->EditValue = $this->Aug_rainfall->CurrentValue;
		if (strval($this->Aug_rainfall->EditValue) != "" && is_numeric($this->Aug_rainfall->EditValue))
			$this->Aug_rainfall->EditValue = FormatNumber($this->Aug_rainfall->EditValue, -2, -2, -2, -2);
		

		// Sep_rainfall
		$this->Sep_rainfall->EditAttrs["class"] = "form-control";
		$this->Sep_rainfall->EditCustomAttributes = "";
		$this->Sep_rainfall->EditValue = $this->Sep_rainfall->CurrentValue;
		if (strval($this->Sep_rainfall->EditValue) != "" && is_numeric($this->Sep_rainfall->EditValue))
			$this->Sep_rainfall->EditValue = FormatNumber($this->Sep_rainfall->EditValue, -2, -2, -2, -2);
		

		// Oct_rainfall
		$this->Oct_rainfall->EditAttrs["class"] = "form-control";
		$this->Oct_rainfall->EditCustomAttributes = "";
		$this->Oct_rainfall->EditValue = $this->Oct_rainfall->CurrentValue;
		if (strval($this->Oct_rainfall->EditValue) != "" && is_numeric($this->Oct_rainfall->EditValue))
			$this->Oct_rainfall->EditValue = FormatNumber($this->Oct_rainfall->EditValue, -2, -2, -2, -2);
		

		// Nov_rainfall
		$this->Nov_rainfall->EditAttrs["class"] = "form-control";
		$this->Nov_rainfall->EditCustomAttributes = "";
		$this->Nov_rainfall->EditValue = $this->Nov_rainfall->CurrentValue;
		if (strval($this->Nov_rainfall->EditValue) != "" && is_numeric($this->Nov_rainfall->EditValue))
			$this->Nov_rainfall->EditValue = FormatNumber($this->Nov_rainfall->EditValue, -2, -2, -2, -2);
		

		// Dec_rainfall
		$this->Dec_rainfall->EditAttrs["class"] = "form-control";
		$this->Dec_rainfall->EditCustomAttributes = "";
		$this->Dec_rainfall->EditValue = $this->Dec_rainfall->CurrentValue;
		if (strval($this->Dec_rainfall->EditValue) != "" && is_numeric($this->Dec_rainfall->EditValue))
			$this->Dec_rainfall->EditValue = FormatNumber($this->Dec_rainfall->EditValue, -2, -2, -2, -2);
		

		// Jan_rainfall
		$this->Jan_rainfall->EditAttrs["class"] = "form-control";
		$this->Jan_rainfall->EditCustomAttributes = "";
		$this->Jan_rainfall->EditValue = $this->Jan_rainfall->CurrentValue;
		if (strval($this->Jan_rainfall->EditValue) != "" && is_numeric($this->Jan_rainfall->EditValue))
			$this->Jan_rainfall->EditValue = FormatNumber($this->Jan_rainfall->EditValue, -2, -2, -2, -2);
		

		// Feb_rainfall
		$this->Feb_rainfall->EditAttrs["class"] = "form-control";
		$this->Feb_rainfall->EditCustomAttributes = "";
		$this->Feb_rainfall->EditValue = $this->Feb_rainfall->CurrentValue;
		if (strval($this->Feb_rainfall->EditValue) != "" && is_numeric($this->Feb_rainfall->EditValue))
			$this->Feb_rainfall->EditValue = FormatNumber($this->Feb_rainfall->EditValue, -2, -2, -2, -2);
		

		// Mar_rainfall
		$this->Mar_rainfall->EditAttrs["class"] = "form-control";
		$this->Mar_rainfall->EditCustomAttributes = "";
		$this->Mar_rainfall->EditValue = $this->Mar_rainfall->CurrentValue;
		if (strval($this->Mar_rainfall->EditValue) != "" && is_numeric($this->Mar_rainfall->EditValue))
			$this->Mar_rainfall->EditValue = FormatNumber($this->Mar_rainfall->EditValue, -2, -2, -2, -2);
		

		// Apr_rainfall
		$this->Apr_rainfall->EditAttrs["class"] = "form-control";
		$this->Apr_rainfall->EditCustomAttributes = "";
		$this->Apr_rainfall->EditValue = $this->Apr_rainfall->CurrentValue;
		if (strval($this->Apr_rainfall->EditValue) != "" && is_numeric($this->Apr_rainfall->EditValue))
			$this->Apr_rainfall->EditValue = FormatNumber($this->Apr_rainfall->EditValue, -2, -2, -2, -2);
		

		// May_rainfall
		$this->May_rainfall->EditAttrs["class"] = "form-control";
		$this->May_rainfall->EditCustomAttributes = "";
		$this->May_rainfall->EditValue = $this->May_rainfall->CurrentValue;
		if (strval($this->May_rainfall->EditValue) != "" && is_numeric($this->May_rainfall->EditValue))
			$this->May_rainfall->EditValue = FormatNumber($this->May_rainfall->EditValue, -2, -2, -2, -2);
		

		// SenderMobileNumber
		$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
		$this->SenderMobileNumber->EditCustomAttributes = "";
		$this->SenderMobileNumber->EditValue = $this->SenderMobileNumber->CurrentValue;
		$this->SenderMobileNumber->ViewCustomAttributes = "";

		// IsChanged
		$this->IsChanged->EditAttrs["class"] = "form-control";
		$this->IsChanged->EditCustomAttributes = "";
		$this->IsChanged->EditValue = $this->IsChanged->CurrentValue;
		$this->IsChanged->ViewCustomAttributes = "";

		// SubDivisionId
		$this->SubDivisionId->EditAttrs["class"] = "form-control";
		$this->SubDivisionId->EditCustomAttributes = "";
		$this->SubDivisionId->EditValue = $this->SubDivisionId->CurrentValue;
		$this->SubDivisionId->EditValue = FormatNumber($this->SubDivisionId->EditValue, 0, -2, -2, -2);
		$this->SubDivisionId->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->Slno);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->Water_Year);
					$doc->exportCaption($this->day_of_month);
					$doc->exportCaption($this->Jun_rainfall);
					$doc->exportCaption($this->Jul_rainfall);
					$doc->exportCaption($this->Aug_rainfall);
					$doc->exportCaption($this->Sep_rainfall);
					$doc->exportCaption($this->Oct_rainfall);
					$doc->exportCaption($this->Nov_rainfall);
					$doc->exportCaption($this->Dec_rainfall);
					$doc->exportCaption($this->Jan_rainfall);
					$doc->exportCaption($this->Feb_rainfall);
					$doc->exportCaption($this->Mar_rainfall);
					$doc->exportCaption($this->Apr_rainfall);
					$doc->exportCaption($this->May_rainfall);
					$doc->exportCaption($this->SenderMobileNumber);
					$doc->exportCaption($this->IsChanged);
					$doc->exportCaption($this->SubDivisionId);
				} else {
					$doc->exportCaption($this->Slno);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->Water_Year);
					$doc->exportCaption($this->day_of_month);
					$doc->exportCaption($this->Jun_rainfall);
					$doc->exportCaption($this->Jul_rainfall);
					$doc->exportCaption($this->Aug_rainfall);
					$doc->exportCaption($this->Sep_rainfall);
					$doc->exportCaption($this->Oct_rainfall);
					$doc->exportCaption($this->Nov_rainfall);
					$doc->exportCaption($this->Dec_rainfall);
					$doc->exportCaption($this->Jan_rainfall);
					$doc->exportCaption($this->Feb_rainfall);
					$doc->exportCaption($this->Mar_rainfall);
					$doc->exportCaption($this->Apr_rainfall);
					$doc->exportCaption($this->May_rainfall);
					$doc->exportCaption($this->SenderMobileNumber);
					$doc->exportCaption($this->IsChanged);
					$doc->exportCaption($this->SubDivisionId);
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
						$doc->exportField($this->Slno);
						$doc->exportField($this->StationId);
						$doc->exportField($this->Water_Year);
						$doc->exportField($this->day_of_month);
						$doc->exportField($this->Jun_rainfall);
						$doc->exportField($this->Jul_rainfall);
						$doc->exportField($this->Aug_rainfall);
						$doc->exportField($this->Sep_rainfall);
						$doc->exportField($this->Oct_rainfall);
						$doc->exportField($this->Nov_rainfall);
						$doc->exportField($this->Dec_rainfall);
						$doc->exportField($this->Jan_rainfall);
						$doc->exportField($this->Feb_rainfall);
						$doc->exportField($this->Mar_rainfall);
						$doc->exportField($this->Apr_rainfall);
						$doc->exportField($this->May_rainfall);
						$doc->exportField($this->SenderMobileNumber);
						$doc->exportField($this->IsChanged);
						$doc->exportField($this->SubDivisionId);
					} else {
						$doc->exportField($this->Slno);
						$doc->exportField($this->StationId);
						$doc->exportField($this->Water_Year);
						$doc->exportField($this->day_of_month);
						$doc->exportField($this->Jun_rainfall);
						$doc->exportField($this->Jul_rainfall);
						$doc->exportField($this->Aug_rainfall);
						$doc->exportField($this->Sep_rainfall);
						$doc->exportField($this->Oct_rainfall);
						$doc->exportField($this->Nov_rainfall);
						$doc->exportField($this->Dec_rainfall);
						$doc->exportField($this->Jan_rainfall);
						$doc->exportField($this->Feb_rainfall);
						$doc->exportField($this->Mar_rainfall);
						$doc->exportField($this->Apr_rainfall);
						$doc->exportField($this->May_rainfall);
						$doc->exportField($this->SenderMobileNumber);
						$doc->exportField($this->IsChanged);
						$doc->exportField($this->SubDivisionId);
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

	// Add User ID filter
	public function addUserIDFilter($filter = "", $id = "")
	{
		global $Security;
		$filterWrk = "";
		if ($id == "")
			$id = (CurrentPageID() == "list") ? $this->CurrentAction : CurrentPageID();
		if (!$this->userIDAllow($id) && !$Security->isAdmin()) {
			$filterWrk = $Security->userIdList();
			if ($filterWrk != "")
				$filterWrk = '`SenderMobileNumber` IN (' . $filterWrk . ')';
		}

		// Call User ID Filtering event
		$this->UserID_Filtering($filterWrk);
		AddFilter($filter, $filterWrk);
		return $filter;
	}

	// User ID subquery
	public function getUserIDSubquery(&$fld, &$masterfld)
	{
		global $UserTable;
		$wrk = "";
		$sql = "SELECT " . $masterfld->Expression . " FROM `tbl_sms_monthly`";
		$filter = $this->addUserIDFilter("");
		if ($filter != "")
			$sql .= " WHERE " . $filter;

		// Use subquery
		if (Config("USE_SUBQUERY_FOR_MASTER_USER_ID")) {
			$wrk = $sql;
		} else {

			// List all values
			if ($rs = Conn($UserTable->Dbid)->execute($sql)) {
				while (!$rs->EOF) {
					if ($wrk != "")
						$wrk .= ",";
					$wrk .= QuotedValue($rs->fields[0], $masterfld->DataType, Config("USER_TABLE_DBID"));
					$rs->moveNext();
				}
				$rs->close();
			}
		}
		if ($wrk != "")
			$wrk = $fld->Expression . " IN (" . $wrk . ")";
		else
			$wrk = "0=1"; // No User ID value found
		return $wrk;
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

		$rsnew["IsChanged"] = 'Y';
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