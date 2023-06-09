<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for cum_stats
 */
class cum_stats extends DbTable
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
	public $id;
	public $Obs_Date;
	public $CODE;
	public $NAME;
	public $Actutal_for_date;
	public $Normal_for_date;
	public $Deviation_for_date;
	public $Actutal_for_season_cum;
	public $Normal_for_season_cum;
	public $Deviation_for_season_cum;
	public $file_name;
	public $source_id;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'cum_stats';
		$this->TableName = 'cum_stats';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`cum_stats`";
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

		// id
		$this->id = new DbField('cum_stats', 'cum_stats', 'x_id', 'id', '`id`', '`id`', 19, 10, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Obs_Date
		$this->Obs_Date = new DbField('cum_stats', 'cum_stats', 'x_Obs_Date', 'Obs_Date', '`Obs_Date`', CastDateFieldForLike("`Obs_Date`", 7, "DB"), 133, 10, 7, FALSE, '`Obs_Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Obs_Date->Nullable = FALSE; // NOT NULL field
		$this->Obs_Date->Required = TRUE; // Required field
		$this->Obs_Date->Sortable = TRUE; // Allow sort
		$this->Obs_Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['Obs_Date'] = &$this->Obs_Date;

		// CODE
		$this->CODE = new DbField('cum_stats', 'cum_stats', 'x_CODE', 'CODE', '`CODE`', '`CODE`', 19, 10, -1, FALSE, '`CODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CODE->Nullable = FALSE; // NOT NULL field
		$this->CODE->Required = TRUE; // Required field
		$this->CODE->Sortable = TRUE; // Allow sort
		$this->CODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CODE'] = &$this->CODE;

		// NAME
		$this->NAME = new DbField('cum_stats', 'cum_stats', 'x_NAME', 'NAME', '`NAME`', '`NAME`', 200, 100, -1, FALSE, '`NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NAME->Nullable = FALSE; // NOT NULL field
		$this->NAME->Required = TRUE; // Required field
		$this->NAME->Sortable = TRUE; // Allow sort
		$this->fields['NAME'] = &$this->NAME;

		// Actutal_for_date
		$this->Actutal_for_date = new DbField('cum_stats', 'cum_stats', 'x_Actutal_for_date', 'Actutal_for_date', '`Actutal_for_date`', '`Actutal_for_date`', 131, 10, -1, FALSE, '`Actutal_for_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Actutal_for_date->Nullable = FALSE; // NOT NULL field
		$this->Actutal_for_date->Sortable = TRUE; // Allow sort
		$this->Actutal_for_date->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Actutal_for_date'] = &$this->Actutal_for_date;

		// Normal_for_date
		$this->Normal_for_date = new DbField('cum_stats', 'cum_stats', 'x_Normal_for_date', 'Normal_for_date', '`Normal_for_date`', '`Normal_for_date`', 131, 10, -1, FALSE, '`Normal_for_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Normal_for_date->Nullable = FALSE; // NOT NULL field
		$this->Normal_for_date->Sortable = TRUE; // Allow sort
		$this->Normal_for_date->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Normal_for_date'] = &$this->Normal_for_date;

		// Deviation_for_date
		$this->Deviation_for_date = new DbField('cum_stats', 'cum_stats', 'x_Deviation_for_date', 'Deviation_for_date', '`Deviation_for_date`', '`Deviation_for_date`', 131, 6, -1, FALSE, '`Deviation_for_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Deviation_for_date->Nullable = FALSE; // NOT NULL field
		$this->Deviation_for_date->Sortable = TRUE; // Allow sort
		$this->Deviation_for_date->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Deviation_for_date'] = &$this->Deviation_for_date;

		// Actutal_for_season_cum
		$this->Actutal_for_season_cum = new DbField('cum_stats', 'cum_stats', 'x_Actutal_for_season_cum', 'Actutal_for_season_cum', '`Actutal_for_season_cum`', '`Actutal_for_season_cum`', 131, 10, -1, FALSE, '`Actutal_for_season_cum`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Actutal_for_season_cum->Nullable = FALSE; // NOT NULL field
		$this->Actutal_for_season_cum->Sortable = TRUE; // Allow sort
		$this->Actutal_for_season_cum->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Actutal_for_season_cum'] = &$this->Actutal_for_season_cum;

		// Normal_for_season_cum
		$this->Normal_for_season_cum = new DbField('cum_stats', 'cum_stats', 'x_Normal_for_season_cum', 'Normal_for_season_cum', '`Normal_for_season_cum`', '`Normal_for_season_cum`', 131, 10, -1, FALSE, '`Normal_for_season_cum`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Normal_for_season_cum->Nullable = FALSE; // NOT NULL field
		$this->Normal_for_season_cum->Sortable = TRUE; // Allow sort
		$this->Normal_for_season_cum->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Normal_for_season_cum'] = &$this->Normal_for_season_cum;

		// Deviation_for_season_cum
		$this->Deviation_for_season_cum = new DbField('cum_stats', 'cum_stats', 'x_Deviation_for_season_cum', 'Deviation_for_season_cum', '`Deviation_for_season_cum`', '`Deviation_for_season_cum`', 131, 6, -1, FALSE, '`Deviation_for_season_cum`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Deviation_for_season_cum->Nullable = FALSE; // NOT NULL field
		$this->Deviation_for_season_cum->Sortable = TRUE; // Allow sort
		$this->Deviation_for_season_cum->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Deviation_for_season_cum'] = &$this->Deviation_for_season_cum;

		// file_name
		$this->file_name = new DbField('cum_stats', 'cum_stats', 'x_file_name', 'file_name', '`file_name`', '`file_name`', 200, 100, -1, FALSE, '`file_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->file_name->Nullable = FALSE; // NOT NULL field
		$this->file_name->Required = TRUE; // Required field
		$this->file_name->Sortable = TRUE; // Allow sort
		$this->fields['file_name'] = &$this->file_name;

		// source_id
		$this->source_id = new DbField('cum_stats', 'cum_stats', 'x_source_id', 'source_id', '`source_id`', '`source_id`', 200, 2, -1, FALSE, '`source_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->source_id->Nullable = FALSE; // NOT NULL field
		$this->source_id->Sortable = TRUE; // Allow sort
		$this->fields['source_id'] = &$this->source_id;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`cum_stats`";
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

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
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
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
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
		$this->id->DbValue = $row['id'];
		$this->Obs_Date->DbValue = $row['Obs_Date'];
		$this->CODE->DbValue = $row['CODE'];
		$this->NAME->DbValue = $row['NAME'];
		$this->Actutal_for_date->DbValue = $row['Actutal_for_date'];
		$this->Normal_for_date->DbValue = $row['Normal_for_date'];
		$this->Deviation_for_date->DbValue = $row['Deviation_for_date'];
		$this->Actutal_for_season_cum->DbValue = $row['Actutal_for_season_cum'];
		$this->Normal_for_season_cum->DbValue = $row['Normal_for_season_cum'];
		$this->Deviation_for_season_cum->DbValue = $row['Deviation_for_season_cum'];
		$this->file_name->DbValue = $row['file_name'];
		$this->source_id->DbValue = $row['source_id'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "cum_statslist.php";
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
		if ($pageName == "cum_statsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "cum_statsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "cum_statsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "cum_statslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("cum_statsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("cum_statsview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "cum_statsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "cum_statsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("cum_statsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("cum_statsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("cum_statsdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
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
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
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
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
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
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
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
		$this->id->setDbValue($rs->fields('id'));
		$this->Obs_Date->setDbValue($rs->fields('Obs_Date'));
		$this->CODE->setDbValue($rs->fields('CODE'));
		$this->NAME->setDbValue($rs->fields('NAME'));
		$this->Actutal_for_date->setDbValue($rs->fields('Actutal_for_date'));
		$this->Normal_for_date->setDbValue($rs->fields('Normal_for_date'));
		$this->Deviation_for_date->setDbValue($rs->fields('Deviation_for_date'));
		$this->Actutal_for_season_cum->setDbValue($rs->fields('Actutal_for_season_cum'));
		$this->Normal_for_season_cum->setDbValue($rs->fields('Normal_for_season_cum'));
		$this->Deviation_for_season_cum->setDbValue($rs->fields('Deviation_for_season_cum'));
		$this->file_name->setDbValue($rs->fields('file_name'));
		$this->source_id->setDbValue($rs->fields('source_id'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Obs_Date
		// CODE
		// NAME
		// Actutal_for_date
		// Normal_for_date
		// Deviation_for_date
		// Actutal_for_season_cum
		// Normal_for_season_cum
		// Deviation_for_season_cum
		// file_name
		// source_id
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Obs_Date
		$this->Obs_Date->ViewValue = $this->Obs_Date->CurrentValue;
		$this->Obs_Date->ViewValue = FormatDateTime($this->Obs_Date->ViewValue, 7);
		$this->Obs_Date->ViewCustomAttributes = "";

		// CODE
		$this->CODE->ViewValue = $this->CODE->CurrentValue;
		$this->CODE->ViewValue = FormatNumber($this->CODE->ViewValue, 0, -2, -2, -2);
		$this->CODE->ViewCustomAttributes = "";

		// NAME
		$this->NAME->ViewValue = $this->NAME->CurrentValue;
		$this->NAME->ViewCustomAttributes = "";

		// Actutal_for_date
		$this->Actutal_for_date->ViewValue = $this->Actutal_for_date->CurrentValue;
		$this->Actutal_for_date->ViewValue = FormatNumber($this->Actutal_for_date->ViewValue, 2, -2, -2, -2);
		$this->Actutal_for_date->ViewCustomAttributes = "";

		// Normal_for_date
		$this->Normal_for_date->ViewValue = $this->Normal_for_date->CurrentValue;
		$this->Normal_for_date->ViewValue = FormatNumber($this->Normal_for_date->ViewValue, 2, -2, -2, -2);
		$this->Normal_for_date->ViewCustomAttributes = "";

		// Deviation_for_date
		$this->Deviation_for_date->ViewValue = $this->Deviation_for_date->CurrentValue;
		$this->Deviation_for_date->ViewValue = FormatNumber($this->Deviation_for_date->ViewValue, 2, -2, -2, -2);
		$this->Deviation_for_date->ViewCustomAttributes = "";

		// Actutal_for_season_cum
		$this->Actutal_for_season_cum->ViewValue = $this->Actutal_for_season_cum->CurrentValue;
		$this->Actutal_for_season_cum->ViewValue = FormatNumber($this->Actutal_for_season_cum->ViewValue, 2, -2, -2, -2);
		$this->Actutal_for_season_cum->ViewCustomAttributes = "";

		// Normal_for_season_cum
		$this->Normal_for_season_cum->ViewValue = $this->Normal_for_season_cum->CurrentValue;
		$this->Normal_for_season_cum->ViewValue = FormatNumber($this->Normal_for_season_cum->ViewValue, 2, -2, -2, -2);
		$this->Normal_for_season_cum->ViewCustomAttributes = "";

		// Deviation_for_season_cum
		$this->Deviation_for_season_cum->ViewValue = $this->Deviation_for_season_cum->CurrentValue;
		$this->Deviation_for_season_cum->ViewValue = FormatNumber($this->Deviation_for_season_cum->ViewValue, 2, -2, -2, -2);
		$this->Deviation_for_season_cum->ViewCustomAttributes = "";

		// file_name
		$this->file_name->ViewValue = $this->file_name->CurrentValue;
		$this->file_name->ViewCustomAttributes = "";

		// source_id
		$this->source_id->ViewValue = $this->source_id->CurrentValue;
		$this->source_id->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Obs_Date
		$this->Obs_Date->LinkCustomAttributes = "";
		$this->Obs_Date->HrefValue = "";
		$this->Obs_Date->TooltipValue = "";

		// CODE
		$this->CODE->LinkCustomAttributes = "";
		$this->CODE->HrefValue = "";
		$this->CODE->TooltipValue = "";

		// NAME
		$this->NAME->LinkCustomAttributes = "";
		$this->NAME->HrefValue = "";
		$this->NAME->TooltipValue = "";

		// Actutal_for_date
		$this->Actutal_for_date->LinkCustomAttributes = "";
		$this->Actutal_for_date->HrefValue = "";
		$this->Actutal_for_date->TooltipValue = "";

		// Normal_for_date
		$this->Normal_for_date->LinkCustomAttributes = "";
		$this->Normal_for_date->HrefValue = "";
		$this->Normal_for_date->TooltipValue = "";

		// Deviation_for_date
		$this->Deviation_for_date->LinkCustomAttributes = "";
		$this->Deviation_for_date->HrefValue = "";
		$this->Deviation_for_date->TooltipValue = "";

		// Actutal_for_season_cum
		$this->Actutal_for_season_cum->LinkCustomAttributes = "";
		$this->Actutal_for_season_cum->HrefValue = "";
		$this->Actutal_for_season_cum->TooltipValue = "";

		// Normal_for_season_cum
		$this->Normal_for_season_cum->LinkCustomAttributes = "";
		$this->Normal_for_season_cum->HrefValue = "";
		$this->Normal_for_season_cum->TooltipValue = "";

		// Deviation_for_season_cum
		$this->Deviation_for_season_cum->LinkCustomAttributes = "";
		$this->Deviation_for_season_cum->HrefValue = "";
		$this->Deviation_for_season_cum->TooltipValue = "";

		// file_name
		$this->file_name->LinkCustomAttributes = "";
		$this->file_name->HrefValue = "";
		$this->file_name->TooltipValue = "";

		// source_id
		$this->source_id->LinkCustomAttributes = "";
		$this->source_id->HrefValue = "";
		$this->source_id->TooltipValue = "";

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

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Obs_Date
		$this->Obs_Date->EditAttrs["class"] = "form-control";
		$this->Obs_Date->EditCustomAttributes = "";
		$this->Obs_Date->EditValue = FormatDateTime($this->Obs_Date->CurrentValue, 7);

		// CODE
		$this->CODE->EditAttrs["class"] = "form-control";
		$this->CODE->EditCustomAttributes = "";
		$this->CODE->EditValue = $this->CODE->CurrentValue;

		// NAME
		$this->NAME->EditAttrs["class"] = "form-control";
		$this->NAME->EditCustomAttributes = "";
		if (!$this->NAME->Raw)
			$this->NAME->CurrentValue = HtmlDecode($this->NAME->CurrentValue);
		$this->NAME->EditValue = $this->NAME->CurrentValue;

		// Actutal_for_date
		$this->Actutal_for_date->EditAttrs["class"] = "form-control";
		$this->Actutal_for_date->EditCustomAttributes = "";
		$this->Actutal_for_date->EditValue = $this->Actutal_for_date->CurrentValue;
		if (strval($this->Actutal_for_date->EditValue) != "" && is_numeric($this->Actutal_for_date->EditValue))
			$this->Actutal_for_date->EditValue = FormatNumber($this->Actutal_for_date->EditValue, -2, -2, -2, -2);
		

		// Normal_for_date
		$this->Normal_for_date->EditAttrs["class"] = "form-control";
		$this->Normal_for_date->EditCustomAttributes = "";
		$this->Normal_for_date->EditValue = $this->Normal_for_date->CurrentValue;
		if (strval($this->Normal_for_date->EditValue) != "" && is_numeric($this->Normal_for_date->EditValue))
			$this->Normal_for_date->EditValue = FormatNumber($this->Normal_for_date->EditValue, -2, -2, -2, -2);
		

		// Deviation_for_date
		$this->Deviation_for_date->EditAttrs["class"] = "form-control";
		$this->Deviation_for_date->EditCustomAttributes = "";
		$this->Deviation_for_date->EditValue = $this->Deviation_for_date->CurrentValue;
		if (strval($this->Deviation_for_date->EditValue) != "" && is_numeric($this->Deviation_for_date->EditValue))
			$this->Deviation_for_date->EditValue = FormatNumber($this->Deviation_for_date->EditValue, -2, -2, -2, -2);
		

		// Actutal_for_season_cum
		$this->Actutal_for_season_cum->EditAttrs["class"] = "form-control";
		$this->Actutal_for_season_cum->EditCustomAttributes = "";
		$this->Actutal_for_season_cum->EditValue = $this->Actutal_for_season_cum->CurrentValue;
		if (strval($this->Actutal_for_season_cum->EditValue) != "" && is_numeric($this->Actutal_for_season_cum->EditValue))
			$this->Actutal_for_season_cum->EditValue = FormatNumber($this->Actutal_for_season_cum->EditValue, -2, -2, -2, -2);
		

		// Normal_for_season_cum
		$this->Normal_for_season_cum->EditAttrs["class"] = "form-control";
		$this->Normal_for_season_cum->EditCustomAttributes = "";
		$this->Normal_for_season_cum->EditValue = $this->Normal_for_season_cum->CurrentValue;
		if (strval($this->Normal_for_season_cum->EditValue) != "" && is_numeric($this->Normal_for_season_cum->EditValue))
			$this->Normal_for_season_cum->EditValue = FormatNumber($this->Normal_for_season_cum->EditValue, -2, -2, -2, -2);
		

		// Deviation_for_season_cum
		$this->Deviation_for_season_cum->EditAttrs["class"] = "form-control";
		$this->Deviation_for_season_cum->EditCustomAttributes = "";
		$this->Deviation_for_season_cum->EditValue = $this->Deviation_for_season_cum->CurrentValue;
		if (strval($this->Deviation_for_season_cum->EditValue) != "" && is_numeric($this->Deviation_for_season_cum->EditValue))
			$this->Deviation_for_season_cum->EditValue = FormatNumber($this->Deviation_for_season_cum->EditValue, -2, -2, -2, -2);
		

		// file_name
		$this->file_name->EditAttrs["class"] = "form-control";
		$this->file_name->EditCustomAttributes = "";
		if (!$this->file_name->Raw)
			$this->file_name->CurrentValue = HtmlDecode($this->file_name->CurrentValue);
		$this->file_name->EditValue = $this->file_name->CurrentValue;

		// source_id
		$this->source_id->EditAttrs["class"] = "form-control";
		$this->source_id->EditCustomAttributes = "";
		if (!$this->source_id->Raw)
			$this->source_id->CurrentValue = HtmlDecode($this->source_id->CurrentValue);
		$this->source_id->EditValue = $this->source_id->CurrentValue;

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
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Obs_Date);
					$doc->exportCaption($this->CODE);
					$doc->exportCaption($this->NAME);
					$doc->exportCaption($this->Actutal_for_date);
					$doc->exportCaption($this->Normal_for_date);
					$doc->exportCaption($this->Deviation_for_date);
					$doc->exportCaption($this->Actutal_for_season_cum);
					$doc->exportCaption($this->Normal_for_season_cum);
					$doc->exportCaption($this->Deviation_for_season_cum);
					$doc->exportCaption($this->file_name);
					$doc->exportCaption($this->source_id);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Obs_Date);
					$doc->exportCaption($this->CODE);
					$doc->exportCaption($this->NAME);
					$doc->exportCaption($this->Actutal_for_date);
					$doc->exportCaption($this->Normal_for_date);
					$doc->exportCaption($this->Deviation_for_date);
					$doc->exportCaption($this->Actutal_for_season_cum);
					$doc->exportCaption($this->Normal_for_season_cum);
					$doc->exportCaption($this->Deviation_for_season_cum);
					$doc->exportCaption($this->file_name);
					$doc->exportCaption($this->source_id);
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
						$doc->exportField($this->id);
						$doc->exportField($this->Obs_Date);
						$doc->exportField($this->CODE);
						$doc->exportField($this->NAME);
						$doc->exportField($this->Actutal_for_date);
						$doc->exportField($this->Normal_for_date);
						$doc->exportField($this->Deviation_for_date);
						$doc->exportField($this->Actutal_for_season_cum);
						$doc->exportField($this->Normal_for_season_cum);
						$doc->exportField($this->Deviation_for_season_cum);
						$doc->exportField($this->file_name);
						$doc->exportField($this->source_id);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Obs_Date);
						$doc->exportField($this->CODE);
						$doc->exportField($this->NAME);
						$doc->exportField($this->Actutal_for_date);
						$doc->exportField($this->Normal_for_date);
						$doc->exportField($this->Deviation_for_date);
						$doc->exportField($this->Actutal_for_season_cum);
						$doc->exportField($this->Normal_for_season_cum);
						$doc->exportField($this->Deviation_for_season_cum);
						$doc->exportField($this->file_name);
						$doc->exportField($this->source_id);
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