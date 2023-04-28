<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for vw_staff_rainfall_entry_mob
 */
class vw_staff_rainfall_entry_mob extends DbTable
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
	public $obs_rainfall_ID;
	public $obs_date;
	public $rainfall;
	public $obs_remarks;
	public $mst_status;
	public $mst_validated;
	public $stationcode;
	public $mobile_number;
	public $obs_owner;
	public $SubDivisionId;
	public $SubDivision_code;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'vw_staff_rainfall_entry_mob';
		$this->TableName = 'vw_staff_rainfall_entry_mob';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`vw_staff_rainfall_entry_mob`";
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

		// obs_rainfall_ID
		$this->obs_rainfall_ID = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_obs_rainfall_ID', 'obs_rainfall_ID', '`obs_rainfall_ID`', '`obs_rainfall_ID`', 3, 11, -1, FALSE, '`obs_rainfall_ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->obs_rainfall_ID->IsAutoIncrement = TRUE; // Autoincrement field
		$this->obs_rainfall_ID->IsPrimaryKey = TRUE; // Primary key field
		$this->obs_rainfall_ID->Sortable = TRUE; // Allow sort
		$this->obs_rainfall_ID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['obs_rainfall_ID'] = &$this->obs_rainfall_ID;

		// obs_date
		$this->obs_date = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_obs_date', 'obs_date', '`obs_date`', CastDateFieldForLike("`obs_date`", 7, "DB"), 135, 19, 7, FALSE, '`obs_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->obs_date->Sortable = TRUE; // Allow sort
		$this->obs_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['obs_date'] = &$this->obs_date;

		// rainfall
		$this->rainfall = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_rainfall', 'rainfall', '`rainfall`', '`rainfall`', 4, 7, -1, FALSE, '`rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->rainfall->Required = TRUE; // Required field
		$this->rainfall->Sortable = TRUE; // Allow sort
		$this->rainfall->DefaultErrorMessage = str_replace(["%1", "%2"], ["0.00", "600.00"], $Language->phrase("IncorrectRange"));
		$this->fields['rainfall'] = &$this->rainfall;

		// obs_remarks
		$this->obs_remarks = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_obs_remarks', 'obs_remarks', '`obs_remarks`', '`obs_remarks`', 200, 50, -1, FALSE, '`obs_remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->obs_remarks->Sortable = TRUE; // Allow sort
		$this->fields['obs_remarks'] = &$this->obs_remarks;

		// mst_status
		$this->mst_status = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_mst_status', 'mst_status', '`mst_status`', '`mst_status`', 3, 11, -1, FALSE, '`mst_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->mst_status->Nullable = FALSE; // NOT NULL field
		$this->mst_status->Required = TRUE; // Required field
		$this->mst_status->Sortable = TRUE; // Allow sort
		$this->mst_status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->mst_status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->mst_status->Lookup = new Lookup('mst_status', 'lkp_status', FALSE, 'Status', ["StatusName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->mst_status->Lookup = new Lookup('mst_status', 'lkp_status', FALSE, 'Status', ["StatusName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->mst_status->Lookup = new Lookup('mst_status', 'lkp_status', FALSE, 'Status', ["StatusName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->mst_status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['mst_status'] = &$this->mst_status;

		// mst_validated
		$this->mst_validated = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_mst_validated', 'mst_validated', '`mst_validated`', '`mst_validated`', 3, 11, -1, FALSE, '`mst_validated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->mst_validated->Sortable = TRUE; // Allow sort
		$this->mst_validated->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->mst_validated->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->mst_validated->Lookup = new Lookup('mst_validated', 'lkp_validated', FALSE, 'validated', ["validatedName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->mst_validated->Lookup = new Lookup('mst_validated', 'lkp_validated', FALSE, 'validated', ["validatedName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->mst_validated->Lookup = new Lookup('mst_validated', 'lkp_validated', FALSE, 'validated', ["validatedName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->mst_validated->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['mst_validated'] = &$this->mst_validated;

		// stationcode
		$this->stationcode = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_stationcode', 'stationcode', '`stationcode`', '`stationcode`', 3, 11, -1, FALSE, '`stationcode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->stationcode->Sortable = TRUE; // Allow sort
		$this->stationcode->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->stationcode->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->stationcode->Lookup = new Lookup('stationcode', 'vw_mst_station_mob', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], ["MobileNumber"], ["x_mobile_number"], '', '');
				break;
			case "kn":
				$this->stationcode->Lookup = new Lookup('stationcode', 'vw_mst_station_mob', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], ["MobileNumber"], ["x_mobile_number"], '', '');
				break;
			default:
				$this->stationcode->Lookup = new Lookup('stationcode', 'vw_mst_station_mob', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], ["MobileNumber"], ["x_mobile_number"], '', '');
				break;
		}
		$this->stationcode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['stationcode'] = &$this->stationcode;

		// mobile_number
		$this->mobile_number = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_mobile_number', 'mobile_number', '`mobile_number`', '`mobile_number`', 200, 25, -1, FALSE, '`mobile_number`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_number->Sortable = TRUE; // Allow sort
		$this->fields['mobile_number'] = &$this->mobile_number;

		// obs_owner
		$this->obs_owner = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_obs_owner', 'obs_owner', '`obs_owner`', '`obs_owner`', 200, 25, -1, FALSE, '`obs_owner`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->obs_owner->Sortable = TRUE; // Allow sort
		$this->fields['obs_owner'] = &$this->obs_owner;

		// SubDivisionId
		$this->SubDivisionId = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_SubDivisionId', 'SubDivisionId', '`SubDivisionId`', '`SubDivisionId`', 3, 11, -1, FALSE, '`SubDivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
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

		// SubDivision_code
		$this->SubDivision_code = new DbField('vw_staff_rainfall_entry_mob', 'vw_staff_rainfall_entry_mob', 'x_SubDivision_code', 'SubDivision_code', '`SubDivision_code`', '`SubDivision_code`', 3, 11, -1, FALSE, '`SubDivision_code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubDivision_code->Sortable = TRUE; // Allow sort
		$this->SubDivision_code->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivision_code'] = &$this->SubDivision_code;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`vw_staff_rainfall_entry_mob`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`obs_date` DESC";
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
			$this->obs_rainfall_ID->setDbValue($conn->insert_ID());
			$rs['obs_rainfall_ID'] = $this->obs_rainfall_ID->DbValue;
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
			if (array_key_exists('obs_rainfall_ID', $rs))
				AddFilter($where, QuotedName('obs_rainfall_ID', $this->Dbid) . '=' . QuotedValue($rs['obs_rainfall_ID'], $this->obs_rainfall_ID->DataType, $this->Dbid));
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
		$this->obs_rainfall_ID->DbValue = $row['obs_rainfall_ID'];
		$this->obs_date->DbValue = $row['obs_date'];
		$this->rainfall->DbValue = $row['rainfall'];
		$this->obs_remarks->DbValue = $row['obs_remarks'];
		$this->mst_status->DbValue = $row['mst_status'];
		$this->mst_validated->DbValue = $row['mst_validated'];
		$this->stationcode->DbValue = $row['stationcode'];
		$this->mobile_number->DbValue = $row['mobile_number'];
		$this->obs_owner->DbValue = $row['obs_owner'];
		$this->SubDivisionId->DbValue = $row['SubDivisionId'];
		$this->SubDivision_code->DbValue = $row['SubDivision_code'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`obs_rainfall_ID` = @obs_rainfall_ID@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('obs_rainfall_ID', $row) ? $row['obs_rainfall_ID'] : NULL;
		else
			$val = $this->obs_rainfall_ID->OldValue !== NULL ? $this->obs_rainfall_ID->OldValue : $this->obs_rainfall_ID->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@obs_rainfall_ID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "vw_staff_rainfall_entry_moblist.php";
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
		if ($pageName == "vw_staff_rainfall_entry_mobview.php")
			return $Language->phrase("View");
		elseif ($pageName == "vw_staff_rainfall_entry_mobedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "vw_staff_rainfall_entry_mobadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "vw_staff_rainfall_entry_moblist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("vw_staff_rainfall_entry_mobview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("vw_staff_rainfall_entry_mobview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "vw_staff_rainfall_entry_mobadd.php?" . $this->getUrlParm($parm);
		else
			$url = "vw_staff_rainfall_entry_mobadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("vw_staff_rainfall_entry_mobedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("vw_staff_rainfall_entry_mobadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("vw_staff_rainfall_entry_mobdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "obs_rainfall_ID:" . JsonEncode($this->obs_rainfall_ID->CurrentValue, "number");
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
		if ($this->obs_rainfall_ID->CurrentValue != NULL) {
			$url .= "obs_rainfall_ID=" . urlencode($this->obs_rainfall_ID->CurrentValue);
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
			if (Param("obs_rainfall_ID") !== NULL)
				$arKeys[] = Param("obs_rainfall_ID");
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
				$this->obs_rainfall_ID->CurrentValue = $key;
			else
				$this->obs_rainfall_ID->OldValue = $key;
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
		$this->obs_rainfall_ID->setDbValue($rs->fields('obs_rainfall_ID'));
		$this->obs_date->setDbValue($rs->fields('obs_date'));
		$this->rainfall->setDbValue($rs->fields('rainfall'));
		$this->obs_remarks->setDbValue($rs->fields('obs_remarks'));
		$this->mst_status->setDbValue($rs->fields('mst_status'));
		$this->mst_validated->setDbValue($rs->fields('mst_validated'));
		$this->stationcode->setDbValue($rs->fields('stationcode'));
		$this->mobile_number->setDbValue($rs->fields('mobile_number'));
		$this->obs_owner->setDbValue($rs->fields('obs_owner'));
		$this->SubDivisionId->setDbValue($rs->fields('SubDivisionId'));
		$this->SubDivision_code->setDbValue($rs->fields('SubDivision_code'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// obs_rainfall_ID
		// obs_date
		// rainfall
		// obs_remarks
		// mst_status
		// mst_validated
		// stationcode
		// mobile_number
		// obs_owner
		// SubDivisionId
		// SubDivision_code
		// obs_rainfall_ID

		$this->obs_rainfall_ID->ViewValue = $this->obs_rainfall_ID->CurrentValue;
		$this->obs_rainfall_ID->ViewCustomAttributes = "";

		// obs_date
		$this->obs_date->ViewValue = $this->obs_date->CurrentValue;
		$this->obs_date->ViewValue = FormatDateTime($this->obs_date->ViewValue, 7);
		$this->obs_date->ViewCustomAttributes = "";

		// rainfall
		$this->rainfall->ViewValue = $this->rainfall->CurrentValue;
		$this->rainfall->ViewValue = FormatNumber($this->rainfall->ViewValue, 2, -2, -2, -2);
		$this->rainfall->CellCssStyle .= "text-align: right;";
		$this->rainfall->ViewCustomAttributes = "";

		// obs_remarks
		$this->obs_remarks->ViewValue = $this->obs_remarks->CurrentValue;
		$this->obs_remarks->ViewCustomAttributes = "";

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

		// mobile_number
		$this->mobile_number->ViewValue = $this->mobile_number->CurrentValue;
		$this->mobile_number->ViewCustomAttributes = "";

		// obs_owner
		$this->obs_owner->ViewValue = $this->obs_owner->CurrentValue;
		$this->obs_owner->ViewCustomAttributes = "";

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

		// SubDivision_code
		$this->SubDivision_code->ViewValue = $this->SubDivision_code->CurrentValue;
		$this->SubDivision_code->ViewValue = FormatNumber($this->SubDivision_code->ViewValue, 0, -2, -2, -2);
		$this->SubDivision_code->ViewCustomAttributes = "";

		// obs_rainfall_ID
		$this->obs_rainfall_ID->LinkCustomAttributes = "";
		$this->obs_rainfall_ID->HrefValue = "";
		$this->obs_rainfall_ID->TooltipValue = "";

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

		// mst_status
		$this->mst_status->LinkCustomAttributes = "";
		$this->mst_status->HrefValue = "";
		$this->mst_status->TooltipValue = "";

		// mst_validated
		$this->mst_validated->LinkCustomAttributes = "";
		$this->mst_validated->HrefValue = "";
		$this->mst_validated->TooltipValue = "";

		// stationcode
		$this->stationcode->LinkCustomAttributes = "";
		$this->stationcode->HrefValue = "";
		$this->stationcode->TooltipValue = "";

		// mobile_number
		$this->mobile_number->LinkCustomAttributes = "";
		$this->mobile_number->HrefValue = "";
		$this->mobile_number->TooltipValue = "";

		// obs_owner
		$this->obs_owner->LinkCustomAttributes = "";
		$this->obs_owner->HrefValue = "";
		$this->obs_owner->TooltipValue = "";

		// SubDivisionId
		$this->SubDivisionId->LinkCustomAttributes = "";
		$this->SubDivisionId->HrefValue = "";
		$this->SubDivisionId->TooltipValue = "";

		// SubDivision_code
		$this->SubDivision_code->LinkCustomAttributes = "";
		$this->SubDivision_code->HrefValue = "";
		$this->SubDivision_code->TooltipValue = "";

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

		// obs_rainfall_ID
		$this->obs_rainfall_ID->EditAttrs["class"] = "form-control";
		$this->obs_rainfall_ID->EditCustomAttributes = "";
		$this->obs_rainfall_ID->EditValue = $this->obs_rainfall_ID->CurrentValue;
		$this->obs_rainfall_ID->ViewCustomAttributes = "";

		// obs_date
		$this->obs_date->EditAttrs["class"] = "form-control";
		$this->obs_date->EditCustomAttributes = "";
		$this->obs_date->EditValue = $this->obs_date->CurrentValue;
		$this->obs_date->EditValue = FormatDateTime($this->obs_date->EditValue, 7);
		$this->obs_date->ViewCustomAttributes = "";

		// rainfall
		$this->rainfall->EditAttrs["class"] = "form-control";
		$this->rainfall->EditCustomAttributes = "";
		$this->rainfall->EditValue = $this->rainfall->CurrentValue;
		if (strval($this->rainfall->EditValue) != "" && is_numeric($this->rainfall->EditValue))
			$this->rainfall->EditValue = FormatNumber($this->rainfall->EditValue, -2, -2, -2, -2);
		

		// obs_remarks
		$this->obs_remarks->EditAttrs["class"] = "form-control";
		$this->obs_remarks->EditCustomAttributes = "";
		if (!$this->obs_remarks->Raw)
			$this->obs_remarks->CurrentValue = HtmlDecode($this->obs_remarks->CurrentValue);
		$this->obs_remarks->EditValue = $this->obs_remarks->CurrentValue;

		// mst_status
		$this->mst_status->EditAttrs["class"] = "form-control";
		$this->mst_status->EditCustomAttributes = "";
		$curVal = strval($this->mst_status->CurrentValue);
		if ($curVal != "") {
			$this->mst_status->EditValue = $this->mst_status->lookupCacheOption($curVal);
			if ($this->mst_status->EditValue === NULL) { // Lookup from database
				$filterWrk = "`Status`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->mst_status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->mst_status->EditValue = $this->mst_status->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->mst_status->EditValue = $this->mst_status->CurrentValue;
				}
			}
		} else {
			$this->mst_status->EditValue = NULL;
		}
		$this->mst_status->ViewCustomAttributes = "";

		// mst_validated
		$this->mst_validated->EditAttrs["class"] = "form-control";
		$this->mst_validated->EditCustomAttributes = "";
		$curVal = strval($this->mst_validated->CurrentValue);
		if ($curVal != "") {
			$this->mst_validated->EditValue = $this->mst_validated->lookupCacheOption($curVal);
			if ($this->mst_validated->EditValue === NULL) { // Lookup from database
				$filterWrk = "`validated`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->mst_validated->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->mst_validated->EditValue = $this->mst_validated->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->mst_validated->EditValue = $this->mst_validated->CurrentValue;
				}
			}
		} else {
			$this->mst_validated->EditValue = NULL;
		}
		$this->mst_validated->ViewCustomAttributes = "";

		// stationcode
		$this->stationcode->EditAttrs["class"] = "form-control";
		$this->stationcode->EditCustomAttributes = "";

		// mobile_number
		$this->mobile_number->EditAttrs["class"] = "form-control";
		$this->mobile_number->EditCustomAttributes = "";
		if (!$this->mobile_number->Raw)
			$this->mobile_number->CurrentValue = HtmlDecode($this->mobile_number->CurrentValue);
		$this->mobile_number->EditValue = $this->mobile_number->CurrentValue;

		// obs_owner
		$this->obs_owner->EditAttrs["class"] = "form-control";
		$this->obs_owner->EditCustomAttributes = "";
		if (!$Security->isAdmin() && $Security->isLoggedIn() && !$this->userIDAllow("info")) { // Non system admin
			$this->obs_owner->CurrentValue = CurrentUserID();
			$this->obs_owner->EditValue = $this->obs_owner->CurrentValue;
			$this->obs_owner->ViewCustomAttributes = "";
		} else {
			if (!$this->obs_owner->Raw)
				$this->obs_owner->CurrentValue = HtmlDecode($this->obs_owner->CurrentValue);
			$this->obs_owner->EditValue = $this->obs_owner->CurrentValue;
		}

		// SubDivisionId
		$this->SubDivisionId->EditAttrs["class"] = "form-control";
		$this->SubDivisionId->EditCustomAttributes = "";

		// SubDivision_code
		$this->SubDivision_code->EditAttrs["class"] = "form-control";
		$this->SubDivision_code->EditCustomAttributes = "";
		$this->SubDivision_code->EditValue = $this->SubDivision_code->CurrentValue;

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
					$doc->exportCaption($this->obs_date);
					$doc->exportCaption($this->rainfall);
					$doc->exportCaption($this->obs_remarks);
					$doc->exportCaption($this->mst_status);
					$doc->exportCaption($this->mst_validated);
					$doc->exportCaption($this->stationcode);
					$doc->exportCaption($this->mobile_number);
					$doc->exportCaption($this->SubDivisionId);
				} else {
					$doc->exportCaption($this->obs_rainfall_ID);
					$doc->exportCaption($this->obs_date);
					$doc->exportCaption($this->rainfall);
					$doc->exportCaption($this->obs_remarks);
					$doc->exportCaption($this->mst_status);
					$doc->exportCaption($this->mst_validated);
					$doc->exportCaption($this->stationcode);
					$doc->exportCaption($this->mobile_number);
					$doc->exportCaption($this->obs_owner);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->SubDivision_code);
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
						$doc->exportField($this->obs_date);
						$doc->exportField($this->rainfall);
						$doc->exportField($this->obs_remarks);
						$doc->exportField($this->mst_status);
						$doc->exportField($this->mst_validated);
						$doc->exportField($this->stationcode);
						$doc->exportField($this->mobile_number);
						$doc->exportField($this->SubDivisionId);
					} else {
						$doc->exportField($this->obs_rainfall_ID);
						$doc->exportField($this->obs_date);
						$doc->exportField($this->rainfall);
						$doc->exportField($this->obs_remarks);
						$doc->exportField($this->mst_status);
						$doc->exportField($this->mst_validated);
						$doc->exportField($this->stationcode);
						$doc->exportField($this->mobile_number);
						$doc->exportField($this->obs_owner);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->SubDivision_code);
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
				$filterWrk = '`obs_owner` IN (' . $filterWrk . ')';
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
		$sql = "SELECT " . $masterfld->Expression . " FROM `vw_staff_rainfall_entry_mob`";
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

		$rsnew["mst_status"] = '4'; // Entry by Mobile
		if ($rsnew["rainfall"] > 800) {

			// To cancel, set return value to False
			 $this->CancelMessage = "Rainfall can't be more than 800 mm.";
			 return FALSE;
		}
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