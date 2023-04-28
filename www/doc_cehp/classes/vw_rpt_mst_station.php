<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for vw_rpt_mst_station
 */
class vw_rpt_mst_station extends DbTable
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
	public $SubDivisionId;
	public $SubDivisionName;
	public $StationId;
	public $StationName;
	public $MobileNumber;
	public $Longitude;
	public $Latitude;
	public $IsActive;
	public $StationSetup;
	public $station_type_name;
	public $SubBasinName;
	public $BasinName;
	public $DistrictName;
	public $TalukName;
	public $DistrictId;
	public $TalukID;
	public $BasinId;
	public $SubBasinId;
	public $station_type;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'vw_rpt_mst_station';
		$this->TableName = 'vw_rpt_mst_station';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`vw_rpt_mst_station`";
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

		// SubDivisionId
		$this->SubDivisionId = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_SubDivisionId', 'SubDivisionId', '`SubDivisionId`', '`SubDivisionId`', 3, 11, -1, FALSE, '`SubDivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubDivisionId->Sortable = TRUE; // Allow sort
		$this->SubDivisionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivisionId'] = &$this->SubDivisionId;

		// SubDivisionName
		$this->SubDivisionName = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_SubDivisionName', 'SubDivisionName', '`SubDivisionName`', '`SubDivisionName`', 200, 100, -1, FALSE, '`SubDivisionName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubDivisionName->Sortable = TRUE; // Allow sort
		$this->fields['SubDivisionName'] = &$this->SubDivisionName;

		// StationId
		$this->StationId = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationId->IsPrimaryKey = TRUE; // Primary key field
		$this->StationId->Nullable = FALSE; // NOT NULL field
		$this->StationId->Required = TRUE; // Required field
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;

		// StationName
		$this->StationName = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_StationName', 'StationName', '`StationName`', '`StationName`', 200, 30, -1, FALSE, '`StationName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName->Sortable = TRUE; // Allow sort
		$this->fields['StationName'] = &$this->StationName;

		// MobileNumber
		$this->MobileNumber = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 15, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// Longitude
		$this->Longitude = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_Longitude', 'Longitude', '`Longitude`', '`Longitude`', 131, 8, -1, FALSE, '`Longitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Longitude->Sortable = TRUE; // Allow sort
		$this->Longitude->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Longitude'] = &$this->Longitude;

		// Latitude
		$this->Latitude = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_Latitude', 'Latitude', '`Latitude`', '`Latitude`', 131, 8, -1, FALSE, '`Latitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Latitude->Sortable = TRUE; // Allow sort
		$this->Latitude->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Latitude'] = &$this->Latitude;

		// IsActive
		$this->IsActive = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_IsActive', 'IsActive', '`IsActive`', '`IsActive`', 200, 1, -1, FALSE, '`IsActive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IsActive->Nullable = FALSE; // NOT NULL field
		$this->IsActive->Sortable = TRUE; // Allow sort
		$this->fields['IsActive'] = &$this->IsActive;

		// StationSetup
		$this->StationSetup = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_StationSetup', 'StationSetup', '`StationSetup`', '`StationSetup`', 200, 50, -1, FALSE, '`StationSetup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationSetup->Sortable = TRUE; // Allow sort
		$this->fields['StationSetup'] = &$this->StationSetup;

		// station_type_name
		$this->station_type_name = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_station_type_name', 'station_type_name', '`station_type_name`', '`station_type_name`', 200, 50, -1, FALSE, '`station_type_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->station_type_name->Sortable = TRUE; // Allow sort
		$this->fields['station_type_name'] = &$this->station_type_name;

		// SubBasinName
		$this->SubBasinName = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_SubBasinName', 'SubBasinName', '`SubBasinName`', '`SubBasinName`', 200, 100, -1, FALSE, '`SubBasinName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubBasinName->Sortable = TRUE; // Allow sort
		$this->fields['SubBasinName'] = &$this->SubBasinName;

		// BasinName
		$this->BasinName = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_BasinName', 'BasinName', '`BasinName`', '`BasinName`', 200, 100, -1, FALSE, '`BasinName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BasinName->Sortable = TRUE; // Allow sort
		$this->fields['BasinName'] = &$this->BasinName;

		// DistrictName
		$this->DistrictName = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_DistrictName', 'DistrictName', '`DistrictName`', '`DistrictName`', 200, 100, -1, FALSE, '`DistrictName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DistrictName->Sortable = TRUE; // Allow sort
		$this->fields['DistrictName'] = &$this->DistrictName;

		// TalukName
		$this->TalukName = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_TalukName', 'TalukName', '`TalukName`', '`TalukName`', 200, 100, -1, FALSE, '`TalukName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TalukName->Sortable = TRUE; // Allow sort
		$this->fields['TalukName'] = &$this->TalukName;

		// DistrictId
		$this->DistrictId = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_DistrictId', 'DistrictId', '`DistrictId`', '`DistrictId`', 3, 11, -1, FALSE, '`DistrictId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DistrictId->Sortable = TRUE; // Allow sort
		$this->DistrictId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DistrictId'] = &$this->DistrictId;

		// TalukID
		$this->TalukID = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_TalukID', 'TalukID', '`TalukID`', '`TalukID`', 3, 11, -1, FALSE, '`TalukID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TalukID->Sortable = TRUE; // Allow sort
		$this->TalukID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TalukID'] = &$this->TalukID;

		// BasinId
		$this->BasinId = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_BasinId', 'BasinId', '`BasinId`', '`BasinId`', 3, 11, -1, FALSE, '`BasinId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BasinId->Sortable = TRUE; // Allow sort
		$this->BasinId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BasinId'] = &$this->BasinId;

		// SubBasinId
		$this->SubBasinId = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_SubBasinId', 'SubBasinId', '`SubBasinId`', '`SubBasinId`', 3, 11, -1, FALSE, '`SubBasinId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubBasinId->Sortable = TRUE; // Allow sort
		$this->SubBasinId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubBasinId'] = &$this->SubBasinId;

		// station_type
		$this->station_type = new DbField('vw_rpt_mst_station', 'vw_rpt_mst_station', 'x_station_type', 'station_type', '`station_type`', '`station_type`', 3, 2, -1, FALSE, '`station_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->station_type->Sortable = TRUE; // Allow sort
		$this->station_type->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['station_type'] = &$this->station_type;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`vw_rpt_mst_station`";
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
		$this->SubDivisionId->DbValue = $row['SubDivisionId'];
		$this->SubDivisionName->DbValue = $row['SubDivisionName'];
		$this->StationId->DbValue = $row['StationId'];
		$this->StationName->DbValue = $row['StationName'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->Longitude->DbValue = $row['Longitude'];
		$this->Latitude->DbValue = $row['Latitude'];
		$this->IsActive->DbValue = $row['IsActive'];
		$this->StationSetup->DbValue = $row['StationSetup'];
		$this->station_type_name->DbValue = $row['station_type_name'];
		$this->SubBasinName->DbValue = $row['SubBasinName'];
		$this->BasinName->DbValue = $row['BasinName'];
		$this->DistrictName->DbValue = $row['DistrictName'];
		$this->TalukName->DbValue = $row['TalukName'];
		$this->DistrictId->DbValue = $row['DistrictId'];
		$this->TalukID->DbValue = $row['TalukID'];
		$this->BasinId->DbValue = $row['BasinId'];
		$this->SubBasinId->DbValue = $row['SubBasinId'];
		$this->station_type->DbValue = $row['station_type'];
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
			return "vw_rpt_mst_stationlist.php";
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
		if ($pageName == "vw_rpt_mst_stationview.php")
			return $Language->phrase("View");
		elseif ($pageName == "vw_rpt_mst_stationedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "vw_rpt_mst_stationadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "vw_rpt_mst_stationlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("vw_rpt_mst_stationview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("vw_rpt_mst_stationview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "vw_rpt_mst_stationadd.php?" . $this->getUrlParm($parm);
		else
			$url = "vw_rpt_mst_stationadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("vw_rpt_mst_stationedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("vw_rpt_mst_stationadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("vw_rpt_mst_stationdelete.php", $this->getUrlParm());
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
		$this->SubDivisionId->setDbValue($rs->fields('SubDivisionId'));
		$this->SubDivisionName->setDbValue($rs->fields('SubDivisionName'));
		$this->StationId->setDbValue($rs->fields('StationId'));
		$this->StationName->setDbValue($rs->fields('StationName'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->Longitude->setDbValue($rs->fields('Longitude'));
		$this->Latitude->setDbValue($rs->fields('Latitude'));
		$this->IsActive->setDbValue($rs->fields('IsActive'));
		$this->StationSetup->setDbValue($rs->fields('StationSetup'));
		$this->station_type_name->setDbValue($rs->fields('station_type_name'));
		$this->SubBasinName->setDbValue($rs->fields('SubBasinName'));
		$this->BasinName->setDbValue($rs->fields('BasinName'));
		$this->DistrictName->setDbValue($rs->fields('DistrictName'));
		$this->TalukName->setDbValue($rs->fields('TalukName'));
		$this->DistrictId->setDbValue($rs->fields('DistrictId'));
		$this->TalukID->setDbValue($rs->fields('TalukID'));
		$this->BasinId->setDbValue($rs->fields('BasinId'));
		$this->SubBasinId->setDbValue($rs->fields('SubBasinId'));
		$this->station_type->setDbValue($rs->fields('station_type'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// SubDivisionId
		// SubDivisionName
		// StationId
		// StationName
		// MobileNumber
		// Longitude
		// Latitude
		// IsActive
		// StationSetup
		// station_type_name
		// SubBasinName
		// BasinName
		// DistrictName
		// TalukName
		// DistrictId
		// TalukID
		// BasinId
		// SubBasinId
		// station_type
		// SubDivisionId

		$this->SubDivisionId->ViewValue = $this->SubDivisionId->CurrentValue;
		$this->SubDivisionId->ViewValue = FormatNumber($this->SubDivisionId->ViewValue, 0, -2, -2, -2);
		$this->SubDivisionId->ViewCustomAttributes = "";

		// SubDivisionName
		$this->SubDivisionName->ViewValue = $this->SubDivisionName->CurrentValue;
		$this->SubDivisionName->ViewCustomAttributes = "";

		// StationId
		$this->StationId->ViewValue = $this->StationId->CurrentValue;
		$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
		$this->StationId->ViewCustomAttributes = "";

		// StationName
		$this->StationName->ViewValue = $this->StationName->CurrentValue;
		$this->StationName->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// Longitude
		$this->Longitude->ViewValue = $this->Longitude->CurrentValue;
		$this->Longitude->ViewValue = FormatNumber($this->Longitude->ViewValue, 2, -2, -2, -2);
		$this->Longitude->ViewCustomAttributes = "";

		// Latitude
		$this->Latitude->ViewValue = $this->Latitude->CurrentValue;
		$this->Latitude->ViewValue = FormatNumber($this->Latitude->ViewValue, 2, -2, -2, -2);
		$this->Latitude->ViewCustomAttributes = "";

		// IsActive
		$this->IsActive->ViewValue = $this->IsActive->CurrentValue;
		$this->IsActive->ViewCustomAttributes = "";

		// StationSetup
		$this->StationSetup->ViewValue = $this->StationSetup->CurrentValue;
		$this->StationSetup->ViewCustomAttributes = "";

		// station_type_name
		$this->station_type_name->ViewValue = $this->station_type_name->CurrentValue;
		$this->station_type_name->ViewCustomAttributes = "";

		// SubBasinName
		$this->SubBasinName->ViewValue = $this->SubBasinName->CurrentValue;
		$this->SubBasinName->ViewCustomAttributes = "";

		// BasinName
		$this->BasinName->ViewValue = $this->BasinName->CurrentValue;
		$this->BasinName->ViewCustomAttributes = "";

		// DistrictName
		$this->DistrictName->ViewValue = $this->DistrictName->CurrentValue;
		$this->DistrictName->ViewCustomAttributes = "";

		// TalukName
		$this->TalukName->ViewValue = $this->TalukName->CurrentValue;
		$this->TalukName->ViewCustomAttributes = "";

		// DistrictId
		$this->DistrictId->ViewValue = $this->DistrictId->CurrentValue;
		$this->DistrictId->ViewValue = FormatNumber($this->DistrictId->ViewValue, 0, -2, -2, -2);
		$this->DistrictId->ViewCustomAttributes = "";

		// TalukID
		$this->TalukID->ViewValue = $this->TalukID->CurrentValue;
		$this->TalukID->ViewValue = FormatNumber($this->TalukID->ViewValue, 0, -2, -2, -2);
		$this->TalukID->ViewCustomAttributes = "";

		// BasinId
		$this->BasinId->ViewValue = $this->BasinId->CurrentValue;
		$this->BasinId->ViewValue = FormatNumber($this->BasinId->ViewValue, 0, -2, -2, -2);
		$this->BasinId->ViewCustomAttributes = "";

		// SubBasinId
		$this->SubBasinId->ViewValue = $this->SubBasinId->CurrentValue;
		$this->SubBasinId->ViewValue = FormatNumber($this->SubBasinId->ViewValue, 0, -2, -2, -2);
		$this->SubBasinId->ViewCustomAttributes = "";

		// station_type
		$this->station_type->ViewValue = $this->station_type->CurrentValue;
		$this->station_type->ViewValue = FormatNumber($this->station_type->ViewValue, 0, -2, -2, -2);
		$this->station_type->ViewCustomAttributes = "";

		// SubDivisionId
		$this->SubDivisionId->LinkCustomAttributes = "";
		$this->SubDivisionId->HrefValue = "";
		$this->SubDivisionId->TooltipValue = "";

		// SubDivisionName
		$this->SubDivisionName->LinkCustomAttributes = "";
		$this->SubDivisionName->HrefValue = "";
		$this->SubDivisionName->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// StationName
		$this->StationName->LinkCustomAttributes = "";
		$this->StationName->HrefValue = "";
		$this->StationName->TooltipValue = "";

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// Longitude
		$this->Longitude->LinkCustomAttributes = "";
		$this->Longitude->HrefValue = "";
		$this->Longitude->TooltipValue = "";

		// Latitude
		$this->Latitude->LinkCustomAttributes = "";
		$this->Latitude->HrefValue = "";
		$this->Latitude->TooltipValue = "";

		// IsActive
		$this->IsActive->LinkCustomAttributes = "";
		$this->IsActive->HrefValue = "";
		$this->IsActive->TooltipValue = "";

		// StationSetup
		$this->StationSetup->LinkCustomAttributes = "";
		$this->StationSetup->HrefValue = "";
		$this->StationSetup->TooltipValue = "";

		// station_type_name
		$this->station_type_name->LinkCustomAttributes = "";
		$this->station_type_name->HrefValue = "";
		$this->station_type_name->TooltipValue = "";

		// SubBasinName
		$this->SubBasinName->LinkCustomAttributes = "";
		$this->SubBasinName->HrefValue = "";
		$this->SubBasinName->TooltipValue = "";

		// BasinName
		$this->BasinName->LinkCustomAttributes = "";
		$this->BasinName->HrefValue = "";
		$this->BasinName->TooltipValue = "";

		// DistrictName
		$this->DistrictName->LinkCustomAttributes = "";
		$this->DistrictName->HrefValue = "";
		$this->DistrictName->TooltipValue = "";

		// TalukName
		$this->TalukName->LinkCustomAttributes = "";
		$this->TalukName->HrefValue = "";
		$this->TalukName->TooltipValue = "";

		// DistrictId
		$this->DistrictId->LinkCustomAttributes = "";
		$this->DistrictId->HrefValue = "";
		$this->DistrictId->TooltipValue = "";

		// TalukID
		$this->TalukID->LinkCustomAttributes = "";
		$this->TalukID->HrefValue = "";
		$this->TalukID->TooltipValue = "";

		// BasinId
		$this->BasinId->LinkCustomAttributes = "";
		$this->BasinId->HrefValue = "";
		$this->BasinId->TooltipValue = "";

		// SubBasinId
		$this->SubBasinId->LinkCustomAttributes = "";
		$this->SubBasinId->HrefValue = "";
		$this->SubBasinId->TooltipValue = "";

		// station_type
		$this->station_type->LinkCustomAttributes = "";
		$this->station_type->HrefValue = "";
		$this->station_type->TooltipValue = "";

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

		// SubDivisionId
		$this->SubDivisionId->EditAttrs["class"] = "form-control";
		$this->SubDivisionId->EditCustomAttributes = "";
		$this->SubDivisionId->EditValue = $this->SubDivisionId->CurrentValue;

		// SubDivisionName
		$this->SubDivisionName->EditAttrs["class"] = "form-control";
		$this->SubDivisionName->EditCustomAttributes = "";
		if (!$this->SubDivisionName->Raw)
			$this->SubDivisionName->CurrentValue = HtmlDecode($this->SubDivisionName->CurrentValue);
		$this->SubDivisionName->EditValue = $this->SubDivisionName->CurrentValue;

		// StationId
		$this->StationId->EditAttrs["class"] = "form-control";
		$this->StationId->EditCustomAttributes = "";
		$this->StationId->EditValue = $this->StationId->CurrentValue;

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

		// Longitude
		$this->Longitude->EditAttrs["class"] = "form-control";
		$this->Longitude->EditCustomAttributes = "";
		$this->Longitude->EditValue = $this->Longitude->CurrentValue;
		if (strval($this->Longitude->EditValue) != "" && is_numeric($this->Longitude->EditValue))
			$this->Longitude->EditValue = FormatNumber($this->Longitude->EditValue, -2, -2, -2, -2);
		

		// Latitude
		$this->Latitude->EditAttrs["class"] = "form-control";
		$this->Latitude->EditCustomAttributes = "";
		$this->Latitude->EditValue = $this->Latitude->CurrentValue;
		if (strval($this->Latitude->EditValue) != "" && is_numeric($this->Latitude->EditValue))
			$this->Latitude->EditValue = FormatNumber($this->Latitude->EditValue, -2, -2, -2, -2);
		

		// IsActive
		$this->IsActive->EditAttrs["class"] = "form-control";
		$this->IsActive->EditCustomAttributes = "";
		if (!$this->IsActive->Raw)
			$this->IsActive->CurrentValue = HtmlDecode($this->IsActive->CurrentValue);
		$this->IsActive->EditValue = $this->IsActive->CurrentValue;

		// StationSetup
		$this->StationSetup->EditAttrs["class"] = "form-control";
		$this->StationSetup->EditCustomAttributes = "";
		if (!$this->StationSetup->Raw)
			$this->StationSetup->CurrentValue = HtmlDecode($this->StationSetup->CurrentValue);
		$this->StationSetup->EditValue = $this->StationSetup->CurrentValue;

		// station_type_name
		$this->station_type_name->EditAttrs["class"] = "form-control";
		$this->station_type_name->EditCustomAttributes = "";
		if (!$this->station_type_name->Raw)
			$this->station_type_name->CurrentValue = HtmlDecode($this->station_type_name->CurrentValue);
		$this->station_type_name->EditValue = $this->station_type_name->CurrentValue;

		// SubBasinName
		$this->SubBasinName->EditAttrs["class"] = "form-control";
		$this->SubBasinName->EditCustomAttributes = "";
		if (!$this->SubBasinName->Raw)
			$this->SubBasinName->CurrentValue = HtmlDecode($this->SubBasinName->CurrentValue);
		$this->SubBasinName->EditValue = $this->SubBasinName->CurrentValue;

		// BasinName
		$this->BasinName->EditAttrs["class"] = "form-control";
		$this->BasinName->EditCustomAttributes = "";
		if (!$this->BasinName->Raw)
			$this->BasinName->CurrentValue = HtmlDecode($this->BasinName->CurrentValue);
		$this->BasinName->EditValue = $this->BasinName->CurrentValue;

		// DistrictName
		$this->DistrictName->EditAttrs["class"] = "form-control";
		$this->DistrictName->EditCustomAttributes = "";
		if (!$this->DistrictName->Raw)
			$this->DistrictName->CurrentValue = HtmlDecode($this->DistrictName->CurrentValue);
		$this->DistrictName->EditValue = $this->DistrictName->CurrentValue;

		// TalukName
		$this->TalukName->EditAttrs["class"] = "form-control";
		$this->TalukName->EditCustomAttributes = "";
		if (!$this->TalukName->Raw)
			$this->TalukName->CurrentValue = HtmlDecode($this->TalukName->CurrentValue);
		$this->TalukName->EditValue = $this->TalukName->CurrentValue;

		// DistrictId
		$this->DistrictId->EditAttrs["class"] = "form-control";
		$this->DistrictId->EditCustomAttributes = "";
		$this->DistrictId->EditValue = $this->DistrictId->CurrentValue;

		// TalukID
		$this->TalukID->EditAttrs["class"] = "form-control";
		$this->TalukID->EditCustomAttributes = "";
		$this->TalukID->EditValue = $this->TalukID->CurrentValue;

		// BasinId
		$this->BasinId->EditAttrs["class"] = "form-control";
		$this->BasinId->EditCustomAttributes = "";
		$this->BasinId->EditValue = $this->BasinId->CurrentValue;

		// SubBasinId
		$this->SubBasinId->EditAttrs["class"] = "form-control";
		$this->SubBasinId->EditCustomAttributes = "";
		$this->SubBasinId->EditValue = $this->SubBasinId->CurrentValue;

		// station_type
		$this->station_type->EditAttrs["class"] = "form-control";
		$this->station_type->EditCustomAttributes = "";
		$this->station_type->EditValue = $this->station_type->CurrentValue;

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
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->SubDivisionName);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->Longitude);
					$doc->exportCaption($this->Latitude);
					$doc->exportCaption($this->IsActive);
					$doc->exportCaption($this->StationSetup);
					$doc->exportCaption($this->station_type_name);
					$doc->exportCaption($this->SubBasinName);
					$doc->exportCaption($this->BasinName);
					$doc->exportCaption($this->DistrictName);
					$doc->exportCaption($this->TalukName);
					$doc->exportCaption($this->DistrictId);
					$doc->exportCaption($this->TalukID);
					$doc->exportCaption($this->BasinId);
					$doc->exportCaption($this->SubBasinId);
					$doc->exportCaption($this->station_type);
				} else {
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->SubDivisionName);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->Longitude);
					$doc->exportCaption($this->Latitude);
					$doc->exportCaption($this->IsActive);
					$doc->exportCaption($this->StationSetup);
					$doc->exportCaption($this->station_type_name);
					$doc->exportCaption($this->SubBasinName);
					$doc->exportCaption($this->BasinName);
					$doc->exportCaption($this->DistrictName);
					$doc->exportCaption($this->TalukName);
					$doc->exportCaption($this->DistrictId);
					$doc->exportCaption($this->TalukID);
					$doc->exportCaption($this->BasinId);
					$doc->exportCaption($this->SubBasinId);
					$doc->exportCaption($this->station_type);
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
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->SubDivisionName);
						$doc->exportField($this->StationId);
						$doc->exportField($this->StationName);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->Longitude);
						$doc->exportField($this->Latitude);
						$doc->exportField($this->IsActive);
						$doc->exportField($this->StationSetup);
						$doc->exportField($this->station_type_name);
						$doc->exportField($this->SubBasinName);
						$doc->exportField($this->BasinName);
						$doc->exportField($this->DistrictName);
						$doc->exportField($this->TalukName);
						$doc->exportField($this->DistrictId);
						$doc->exportField($this->TalukID);
						$doc->exportField($this->BasinId);
						$doc->exportField($this->SubBasinId);
						$doc->exportField($this->station_type);
					} else {
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->SubDivisionName);
						$doc->exportField($this->StationId);
						$doc->exportField($this->StationName);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->Longitude);
						$doc->exportField($this->Latitude);
						$doc->exportField($this->IsActive);
						$doc->exportField($this->StationSetup);
						$doc->exportField($this->station_type_name);
						$doc->exportField($this->SubBasinName);
						$doc->exportField($this->BasinName);
						$doc->exportField($this->DistrictName);
						$doc->exportField($this->TalukName);
						$doc->exportField($this->DistrictId);
						$doc->exportField($this->TalukID);
						$doc->exportField($this->BasinId);
						$doc->exportField($this->SubBasinId);
						$doc->exportField($this->station_type);
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