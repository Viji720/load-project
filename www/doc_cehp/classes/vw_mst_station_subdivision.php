<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for vw_mst_station_subdivision
 */
class vw_mst_station_subdivision extends DbTable
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
	public $StationId;
	public $StationCode;
	public $StationName;
	public $MobileNumber;
	public $SubDivisionId;
	public $last_reading_date;
	public $first_reading_date;
	public $StationName_kn;
	public $mst_station_owner;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'vw_mst_station_subdivision';
		$this->TableName = 'vw_mst_station_subdivision';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`vw_mst_station_subdivision`";
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

		// StationId
		$this->StationId = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationId->IsPrimaryKey = TRUE; // Primary key field
		$this->StationId->Nullable = FALSE; // NOT NULL field
		$this->StationId->Required = TRUE; // Required field
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;

		// StationCode
		$this->StationCode = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_StationCode', 'StationCode', '`StationCode`', '`StationCode`', 3, 11, -1, FALSE, '`StationCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->StationCode->Nullable = FALSE; // NOT NULL field
		$this->StationCode->Required = TRUE; // Required field
		$this->StationCode->Sortable = TRUE; // Allow sort
		$this->StationCode->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->StationCode->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->StationCode->Lookup = new Lookup('StationCode', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->StationCode->Lookup = new Lookup('StationCode', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->StationCode->Lookup = new Lookup('StationCode', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->StationCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationCode'] = &$this->StationCode;

		// StationName
		$this->StationName = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_StationName', 'StationName', '`StationName`', '`StationName`', 200, 30, -1, FALSE, '`StationName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName->Sortable = TRUE; // Allow sort
		$this->fields['StationName'] = &$this->StationName;

		// MobileNumber
		$this->MobileNumber = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 15, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// SubDivisionId
		$this->SubDivisionId = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_SubDivisionId', 'SubDivisionId', '`SubDivisionId`', '`SubDivisionId`', 3, 11, -1, FALSE, '`SubDivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SubDivisionId->Sortable = TRUE; // Allow sort
		$this->SubDivisionId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SubDivisionId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->SubDivisionId->Lookup = new Lookup('SubDivisionId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->SubDivisionId->Lookup = new Lookup('SubDivisionId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->SubDivisionId->Lookup = new Lookup('SubDivisionId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->SubDivisionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivisionId'] = &$this->SubDivisionId;

		// last_reading_date
		$this->last_reading_date = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_last_reading_date', 'last_reading_date', '`last_reading_date`', CastDateFieldForLike("`last_reading_date`", 7, "DB"), 133, 10, 7, FALSE, '`last_reading_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_reading_date->Sortable = TRUE; // Allow sort
		$this->last_reading_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['last_reading_date'] = &$this->last_reading_date;

		// first_reading_date
		$this->first_reading_date = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_first_reading_date', 'first_reading_date', '`first_reading_date`', CastDateFieldForLike("`first_reading_date`", 7, "DB"), 133, 10, 7, FALSE, '`first_reading_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_reading_date->Sortable = TRUE; // Allow sort
		$this->first_reading_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['first_reading_date'] = &$this->first_reading_date;

		// StationName_kn
		$this->StationName_kn = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_StationName_kn', 'StationName_kn', '`StationName_kn`', '`StationName_kn`', 200, 30, -1, FALSE, '`StationName_kn`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName_kn->Sortable = TRUE; // Allow sort
		$this->fields['StationName_kn'] = &$this->StationName_kn;

		// mst_station_owner
		$this->mst_station_owner = new DbField('vw_mst_station_subdivision', 'vw_mst_station_subdivision', 'x_mst_station_owner', 'mst_station_owner', '`mst_station_owner`', '`mst_station_owner`', 200, 18, -1, FALSE, '`mst_station_owner`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mst_station_owner->Sortable = TRUE; // Allow sort
		$this->fields['mst_station_owner'] = &$this->mst_station_owner;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`vw_mst_station_subdivision`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`last_reading_date` DESC";
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
			if (array_key_exists('StationId', $rs))
				AddFilter($where, QuotedName('StationId', $this->Dbid) . '=' . QuotedValue($rs['StationId'], $this->StationId->DataType, $this->Dbid));
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
		$this->StationId->DbValue = $row['StationId'];
		$this->StationCode->DbValue = $row['StationCode'];
		$this->StationName->DbValue = $row['StationName'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->SubDivisionId->DbValue = $row['SubDivisionId'];
		$this->last_reading_date->DbValue = $row['last_reading_date'];
		$this->first_reading_date->DbValue = $row['first_reading_date'];
		$this->StationName_kn->DbValue = $row['StationName_kn'];
		$this->mst_station_owner->DbValue = $row['mst_station_owner'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`StationId` = @StationId@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('StationId', $row) ? $row['StationId'] : NULL;
		else
			$val = $this->StationId->OldValue !== NULL ? $this->StationId->OldValue : $this->StationId->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@StationId@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "vw_mst_station_subdivisionlist.php";
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
		if ($pageName == "vw_mst_station_subdivisionview.php")
			return $Language->phrase("View");
		elseif ($pageName == "vw_mst_station_subdivisionedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "vw_mst_station_subdivisionadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "vw_mst_station_subdivisionlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("vw_mst_station_subdivisionview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("vw_mst_station_subdivisionview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "vw_mst_station_subdivisionadd.php?" . $this->getUrlParm($parm);
		else
			$url = "vw_mst_station_subdivisionadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("vw_mst_station_subdivisionedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("vw_mst_station_subdivisionadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("vw_mst_station_subdivisiondelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "StationId:" . JsonEncode($this->StationId->CurrentValue, "number");
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
		if ($this->StationId->CurrentValue != NULL) {
			$url .= "StationId=" . urlencode($this->StationId->CurrentValue);
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
			if (Param("StationId") !== NULL)
				$arKeys[] = Param("StationId");
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
				$this->StationId->CurrentValue = $key;
			else
				$this->StationId->OldValue = $key;
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
		$this->StationId->setDbValue($rs->fields('StationId'));
		$this->StationCode->setDbValue($rs->fields('StationCode'));
		$this->StationName->setDbValue($rs->fields('StationName'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->SubDivisionId->setDbValue($rs->fields('SubDivisionId'));
		$this->last_reading_date->setDbValue($rs->fields('last_reading_date'));
		$this->first_reading_date->setDbValue($rs->fields('first_reading_date'));
		$this->StationName_kn->setDbValue($rs->fields('StationName_kn'));
		$this->mst_station_owner->setDbValue($rs->fields('mst_station_owner'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// StationId
		// StationCode
		// StationName
		// MobileNumber
		// SubDivisionId
		// last_reading_date
		// first_reading_date
		// StationName_kn
		// mst_station_owner
		// StationId

		$this->StationId->ViewValue = $this->StationId->CurrentValue;
		$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
		$this->StationId->ViewCustomAttributes = "";

		// StationCode
		$curVal = strval($this->StationCode->CurrentValue);
		if ($curVal != "") {
			$this->StationCode->ViewValue = $this->StationCode->lookupCacheOption($curVal);
			if ($this->StationCode->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`StationId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->StationCode->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->StationCode->ViewValue = $this->StationCode->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->StationCode->ViewValue = $this->StationCode->CurrentValue;
				}
			}
		} else {
			$this->StationCode->ViewValue = NULL;
		}
		$this->StationCode->ViewCustomAttributes = "";

		// StationName
		$this->StationName->ViewValue = $this->StationName->CurrentValue;
		$this->StationName->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

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

		// last_reading_date
		$this->last_reading_date->ViewValue = $this->last_reading_date->CurrentValue;
		$this->last_reading_date->ViewValue = FormatDateTime($this->last_reading_date->ViewValue, 7);
		$this->last_reading_date->ViewCustomAttributes = "";

		// first_reading_date
		$this->first_reading_date->ViewValue = $this->first_reading_date->CurrentValue;
		$this->first_reading_date->ViewValue = FormatDateTime($this->first_reading_date->ViewValue, 7);
		$this->first_reading_date->ViewCustomAttributes = "";

		// StationName_kn
		$this->StationName_kn->ViewValue = $this->StationName_kn->CurrentValue;
		$this->StationName_kn->ViewCustomAttributes = "";

		// mst_station_owner
		$this->mst_station_owner->ViewValue = $this->mst_station_owner->CurrentValue;
		$this->mst_station_owner->ViewCustomAttributes = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// StationCode
		$this->StationCode->LinkCustomAttributes = "";
		$this->StationCode->HrefValue = "";
		$this->StationCode->TooltipValue = "";

		// StationName
		$this->StationName->LinkCustomAttributes = "";
		$this->StationName->HrefValue = "";
		$this->StationName->TooltipValue = "";

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// SubDivisionId
		$this->SubDivisionId->LinkCustomAttributes = "";
		$this->SubDivisionId->HrefValue = "";
		$this->SubDivisionId->TooltipValue = "";

		// last_reading_date
		$this->last_reading_date->LinkCustomAttributes = "";
		$this->last_reading_date->HrefValue = "";
		$this->last_reading_date->TooltipValue = "";

		// first_reading_date
		$this->first_reading_date->LinkCustomAttributes = "";
		$this->first_reading_date->HrefValue = "";
		$this->first_reading_date->TooltipValue = "";

		// StationName_kn
		$this->StationName_kn->LinkCustomAttributes = "";
		$this->StationName_kn->HrefValue = "";
		$this->StationName_kn->TooltipValue = "";

		// mst_station_owner
		$this->mst_station_owner->LinkCustomAttributes = "";
		$this->mst_station_owner->HrefValue = "";
		$this->mst_station_owner->TooltipValue = "";

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

		// StationId
		$this->StationId->EditAttrs["class"] = "form-control";
		$this->StationId->EditCustomAttributes = "";
		$this->StationId->EditValue = $this->StationId->CurrentValue;

		// StationCode
		$this->StationCode->EditAttrs["class"] = "form-control";
		$this->StationCode->EditCustomAttributes = "";

		// StationName
		$this->StationName->EditAttrs["class"] = "form-control";
		$this->StationName->EditCustomAttributes = "";
		if (!$this->StationName->Raw)
			$this->StationName->CurrentValue = HtmlDecode($this->StationName->CurrentValue);
		$this->StationName->EditValue = $this->StationName->CurrentValue;

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (!$this->MobileNumber->Raw)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;

		// SubDivisionId
		$this->SubDivisionId->EditAttrs["class"] = "form-control";
		$this->SubDivisionId->EditCustomAttributes = "";

		// last_reading_date
		$this->last_reading_date->EditAttrs["class"] = "form-control";
		$this->last_reading_date->EditCustomAttributes = "";
		$this->last_reading_date->EditValue = FormatDateTime($this->last_reading_date->CurrentValue, 7);

		// first_reading_date
		$this->first_reading_date->EditAttrs["class"] = "form-control";
		$this->first_reading_date->EditCustomAttributes = "";
		$this->first_reading_date->EditValue = FormatDateTime($this->first_reading_date->CurrentValue, 7);

		// StationName_kn
		$this->StationName_kn->EditAttrs["class"] = "form-control";
		$this->StationName_kn->EditCustomAttributes = "";
		if (!$this->StationName_kn->Raw)
			$this->StationName_kn->CurrentValue = HtmlDecode($this->StationName_kn->CurrentValue);
		$this->StationName_kn->EditValue = $this->StationName_kn->CurrentValue;

		// mst_station_owner
		$this->mst_station_owner->EditAttrs["class"] = "form-control";
		$this->mst_station_owner->EditCustomAttributes = "";
		if (!$Security->isAdmin() && $Security->isLoggedIn() && !$this->userIDAllow("info")) { // Non system admin
			$this->mst_station_owner->CurrentValue = CurrentUserID();
			$this->mst_station_owner->EditValue = $this->mst_station_owner->CurrentValue;
			$this->mst_station_owner->ViewCustomAttributes = "";
		} else {
			if (!$this->mst_station_owner->Raw)
				$this->mst_station_owner->CurrentValue = HtmlDecode($this->mst_station_owner->CurrentValue);
			$this->mst_station_owner->EditValue = $this->mst_station_owner->CurrentValue;
		}

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
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->StationCode);
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->last_reading_date);
					$doc->exportCaption($this->first_reading_date);
					$doc->exportCaption($this->StationName_kn);
					$doc->exportCaption($this->mst_station_owner);
				} else {
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->StationCode);
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->last_reading_date);
					$doc->exportCaption($this->first_reading_date);
					$doc->exportCaption($this->StationName_kn);
					$doc->exportCaption($this->mst_station_owner);
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
						$doc->exportField($this->StationId);
						$doc->exportField($this->StationCode);
						$doc->exportField($this->StationName);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->last_reading_date);
						$doc->exportField($this->first_reading_date);
						$doc->exportField($this->StationName_kn);
						$doc->exportField($this->mst_station_owner);
					} else {
						$doc->exportField($this->StationId);
						$doc->exportField($this->StationCode);
						$doc->exportField($this->StationName);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->last_reading_date);
						$doc->exportField($this->first_reading_date);
						$doc->exportField($this->StationName_kn);
						$doc->exportField($this->mst_station_owner);
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
				$filterWrk = '`mst_station_owner` IN (' . $filterWrk . ')';
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
		$sql = "SELECT " . $masterfld->Expression . " FROM `vw_mst_station_subdivision`";
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