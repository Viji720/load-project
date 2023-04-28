<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for mst_ksndmc_station
 */
class mst_ksndmc_station extends DbTable
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
	public $Raingauge_id;
	public $District_name;
	public $Taluka_name;
	public $station_name;
	public $station_latitude;
	public $station_longitude;
	public $kgis_district_id;
	public $kgis_taluka_id;
	public $kgis_hobli_id;
	public $kgis_village_id;
	public $kwris_basin_id;
	public $kwris_subbasin_id;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'mst_ksndmc_station';
		$this->TableName = 'mst_ksndmc_station';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`mst_ksndmc_station`";
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

		// Raingauge_id
		$this->Raingauge_id = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_Raingauge_id', 'Raingauge_id', '`Raingauge_id`', '`Raingauge_id`', 3, 11, -1, FALSE, '`Raingauge_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Raingauge_id->IsPrimaryKey = TRUE; // Primary key field
		$this->Raingauge_id->Nullable = FALSE; // NOT NULL field
		$this->Raingauge_id->Required = TRUE; // Required field
		$this->Raingauge_id->Sortable = TRUE; // Allow sort
		$this->Raingauge_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Raingauge_id'] = &$this->Raingauge_id;

		// District_name
		$this->District_name = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_District_name', 'District_name', '`District_name`', '`District_name`', 200, 50, -1, FALSE, '`District_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->District_name->Sortable = TRUE; // Allow sort
		$this->fields['District_name'] = &$this->District_name;

		// Taluka_name
		$this->Taluka_name = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_Taluka_name', 'Taluka_name', '`Taluka_name`', '`Taluka_name`', 200, 50, -1, FALSE, '`Taluka_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Taluka_name->Sortable = TRUE; // Allow sort
		$this->fields['Taluka_name'] = &$this->Taluka_name;

		// station_name
		$this->station_name = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_station_name', 'station_name', '`station_name`', '`station_name`', 200, 50, -1, FALSE, '`station_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->station_name->Sortable = TRUE; // Allow sort
		$this->fields['station_name'] = &$this->station_name;

		// station_latitude
		$this->station_latitude = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_station_latitude', 'station_latitude', '`station_latitude`', '`station_latitude`', 4, 10, -1, FALSE, '`station_latitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->station_latitude->Sortable = TRUE; // Allow sort
		$this->station_latitude->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['station_latitude'] = &$this->station_latitude;

		// station_longitude
		$this->station_longitude = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_station_longitude', 'station_longitude', '`station_longitude`', '`station_longitude`', 4, 10, -1, FALSE, '`station_longitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->station_longitude->Sortable = TRUE; // Allow sort
		$this->station_longitude->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['station_longitude'] = &$this->station_longitude;

		// kgis_district_id
		$this->kgis_district_id = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_kgis_district_id', 'kgis_district_id', '`kgis_district_id`', '`kgis_district_id`', 3, 11, -1, FALSE, '`kgis_district_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kgis_district_id->Sortable = TRUE; // Allow sort
		$this->kgis_district_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kgis_district_id'] = &$this->kgis_district_id;

		// kgis_taluka_id
		$this->kgis_taluka_id = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_kgis_taluka_id', 'kgis_taluka_id', '`kgis_taluka_id`', '`kgis_taluka_id`', 3, 11, -1, FALSE, '`kgis_taluka_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kgis_taluka_id->Sortable = TRUE; // Allow sort
		$this->kgis_taluka_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kgis_taluka_id'] = &$this->kgis_taluka_id;

		// kgis_hobli_id
		$this->kgis_hobli_id = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_kgis_hobli_id', 'kgis_hobli_id', '`kgis_hobli_id`', '`kgis_hobli_id`', 3, 11, -1, FALSE, '`kgis_hobli_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kgis_hobli_id->Sortable = TRUE; // Allow sort
		$this->kgis_hobli_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kgis_hobli_id'] = &$this->kgis_hobli_id;

		// kgis_village_id
		$this->kgis_village_id = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_kgis_village_id', 'kgis_village_id', '`kgis_village_id`', '`kgis_village_id`', 3, 11, -1, FALSE, '`kgis_village_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kgis_village_id->Sortable = TRUE; // Allow sort
		$this->kgis_village_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kgis_village_id'] = &$this->kgis_village_id;

		// kwris_basin_id
		$this->kwris_basin_id = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_kwris_basin_id', 'kwris_basin_id', '`kwris_basin_id`', '`kwris_basin_id`', 3, 11, -1, FALSE, '`kwris_basin_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kwris_basin_id->Sortable = TRUE; // Allow sort
		$this->kwris_basin_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kwris_basin_id'] = &$this->kwris_basin_id;

		// kwris_subbasin_id
		$this->kwris_subbasin_id = new DbField('mst_ksndmc_station', 'mst_ksndmc_station', 'x_kwris_subbasin_id', 'kwris_subbasin_id', '`kwris_subbasin_id`', '`kwris_subbasin_id`', 3, 11, -1, FALSE, '`kwris_subbasin_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kwris_subbasin_id->Sortable = TRUE; // Allow sort
		$this->kwris_subbasin_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kwris_subbasin_id'] = &$this->kwris_subbasin_id;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`mst_ksndmc_station`";
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
			if (array_key_exists('Raingauge_id', $rs))
				AddFilter($where, QuotedName('Raingauge_id', $this->Dbid) . '=' . QuotedValue($rs['Raingauge_id'], $this->Raingauge_id->DataType, $this->Dbid));
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
		$this->Raingauge_id->DbValue = $row['Raingauge_id'];
		$this->District_name->DbValue = $row['District_name'];
		$this->Taluka_name->DbValue = $row['Taluka_name'];
		$this->station_name->DbValue = $row['station_name'];
		$this->station_latitude->DbValue = $row['station_latitude'];
		$this->station_longitude->DbValue = $row['station_longitude'];
		$this->kgis_district_id->DbValue = $row['kgis_district_id'];
		$this->kgis_taluka_id->DbValue = $row['kgis_taluka_id'];
		$this->kgis_hobli_id->DbValue = $row['kgis_hobli_id'];
		$this->kgis_village_id->DbValue = $row['kgis_village_id'];
		$this->kwris_basin_id->DbValue = $row['kwris_basin_id'];
		$this->kwris_subbasin_id->DbValue = $row['kwris_subbasin_id'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`Raingauge_id` = @Raingauge_id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('Raingauge_id', $row) ? $row['Raingauge_id'] : NULL;
		else
			$val = $this->Raingauge_id->OldValue !== NULL ? $this->Raingauge_id->OldValue : $this->Raingauge_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@Raingauge_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "mst_ksndmc_stationlist.php";
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
		if ($pageName == "mst_ksndmc_stationview.php")
			return $Language->phrase("View");
		elseif ($pageName == "mst_ksndmc_stationedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "mst_ksndmc_stationadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "mst_ksndmc_stationlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("mst_ksndmc_stationview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("mst_ksndmc_stationview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "mst_ksndmc_stationadd.php?" . $this->getUrlParm($parm);
		else
			$url = "mst_ksndmc_stationadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("mst_ksndmc_stationedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("mst_ksndmc_stationadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("mst_ksndmc_stationdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "Raingauge_id:" . JsonEncode($this->Raingauge_id->CurrentValue, "number");
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
		if ($this->Raingauge_id->CurrentValue != NULL) {
			$url .= "Raingauge_id=" . urlencode($this->Raingauge_id->CurrentValue);
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
			if (Param("Raingauge_id") !== NULL)
				$arKeys[] = Param("Raingauge_id");
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
				$this->Raingauge_id->CurrentValue = $key;
			else
				$this->Raingauge_id->OldValue = $key;
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
		$this->Raingauge_id->setDbValue($rs->fields('Raingauge_id'));
		$this->District_name->setDbValue($rs->fields('District_name'));
		$this->Taluka_name->setDbValue($rs->fields('Taluka_name'));
		$this->station_name->setDbValue($rs->fields('station_name'));
		$this->station_latitude->setDbValue($rs->fields('station_latitude'));
		$this->station_longitude->setDbValue($rs->fields('station_longitude'));
		$this->kgis_district_id->setDbValue($rs->fields('kgis_district_id'));
		$this->kgis_taluka_id->setDbValue($rs->fields('kgis_taluka_id'));
		$this->kgis_hobli_id->setDbValue($rs->fields('kgis_hobli_id'));
		$this->kgis_village_id->setDbValue($rs->fields('kgis_village_id'));
		$this->kwris_basin_id->setDbValue($rs->fields('kwris_basin_id'));
		$this->kwris_subbasin_id->setDbValue($rs->fields('kwris_subbasin_id'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Raingauge_id
		// District_name
		// Taluka_name
		// station_name
		// station_latitude
		// station_longitude
		// kgis_district_id
		// kgis_taluka_id
		// kgis_hobli_id
		// kgis_village_id
		// kwris_basin_id
		// kwris_subbasin_id
		// Raingauge_id

		$this->Raingauge_id->ViewValue = $this->Raingauge_id->CurrentValue;
		$this->Raingauge_id->ViewCustomAttributes = "";

		// District_name
		$this->District_name->ViewValue = $this->District_name->CurrentValue;
		$this->District_name->ViewCustomAttributes = "";

		// Taluka_name
		$this->Taluka_name->ViewValue = $this->Taluka_name->CurrentValue;
		$this->Taluka_name->ViewCustomAttributes = "";

		// station_name
		$this->station_name->ViewValue = $this->station_name->CurrentValue;
		$this->station_name->ViewCustomAttributes = "";

		// station_latitude
		$this->station_latitude->ViewValue = $this->station_latitude->CurrentValue;
		$this->station_latitude->ViewValue = FormatNumber($this->station_latitude->ViewValue, 2, -2, -2, -2);
		$this->station_latitude->ViewCustomAttributes = "";

		// station_longitude
		$this->station_longitude->ViewValue = $this->station_longitude->CurrentValue;
		$this->station_longitude->ViewValue = FormatNumber($this->station_longitude->ViewValue, 2, -2, -2, -2);
		$this->station_longitude->ViewCustomAttributes = "";

		// kgis_district_id
		$this->kgis_district_id->ViewValue = $this->kgis_district_id->CurrentValue;
		$this->kgis_district_id->ViewValue = FormatNumber($this->kgis_district_id->ViewValue, 0, -2, -2, -2);
		$this->kgis_district_id->ViewCustomAttributes = "";

		// kgis_taluka_id
		$this->kgis_taluka_id->ViewValue = $this->kgis_taluka_id->CurrentValue;
		$this->kgis_taluka_id->ViewValue = FormatNumber($this->kgis_taluka_id->ViewValue, 0, -2, -2, -2);
		$this->kgis_taluka_id->ViewCustomAttributes = "";

		// kgis_hobli_id
		$this->kgis_hobli_id->ViewValue = $this->kgis_hobli_id->CurrentValue;
		$this->kgis_hobli_id->ViewValue = FormatNumber($this->kgis_hobli_id->ViewValue, 0, -2, -2, -2);
		$this->kgis_hobli_id->ViewCustomAttributes = "";

		// kgis_village_id
		$this->kgis_village_id->ViewValue = $this->kgis_village_id->CurrentValue;
		$this->kgis_village_id->ViewValue = FormatNumber($this->kgis_village_id->ViewValue, 0, -2, -2, -2);
		$this->kgis_village_id->ViewCustomAttributes = "";

		// kwris_basin_id
		$this->kwris_basin_id->ViewValue = $this->kwris_basin_id->CurrentValue;
		$this->kwris_basin_id->ViewValue = FormatNumber($this->kwris_basin_id->ViewValue, 0, -2, -2, -2);
		$this->kwris_basin_id->ViewCustomAttributes = "";

		// kwris_subbasin_id
		$this->kwris_subbasin_id->ViewValue = $this->kwris_subbasin_id->CurrentValue;
		$this->kwris_subbasin_id->ViewValue = FormatNumber($this->kwris_subbasin_id->ViewValue, 0, -2, -2, -2);
		$this->kwris_subbasin_id->ViewCustomAttributes = "";

		// Raingauge_id
		$this->Raingauge_id->LinkCustomAttributes = "";
		$this->Raingauge_id->HrefValue = "";
		$this->Raingauge_id->TooltipValue = "";

		// District_name
		$this->District_name->LinkCustomAttributes = "";
		$this->District_name->HrefValue = "";
		$this->District_name->TooltipValue = "";

		// Taluka_name
		$this->Taluka_name->LinkCustomAttributes = "";
		$this->Taluka_name->HrefValue = "";
		$this->Taluka_name->TooltipValue = "";

		// station_name
		$this->station_name->LinkCustomAttributes = "";
		$this->station_name->HrefValue = "";
		$this->station_name->TooltipValue = "";

		// station_latitude
		$this->station_latitude->LinkCustomAttributes = "";
		$this->station_latitude->HrefValue = "";
		$this->station_latitude->TooltipValue = "";

		// station_longitude
		$this->station_longitude->LinkCustomAttributes = "";
		$this->station_longitude->HrefValue = "";
		$this->station_longitude->TooltipValue = "";

		// kgis_district_id
		$this->kgis_district_id->LinkCustomAttributes = "";
		$this->kgis_district_id->HrefValue = "";
		$this->kgis_district_id->TooltipValue = "";

		// kgis_taluka_id
		$this->kgis_taluka_id->LinkCustomAttributes = "";
		$this->kgis_taluka_id->HrefValue = "";
		$this->kgis_taluka_id->TooltipValue = "";

		// kgis_hobli_id
		$this->kgis_hobli_id->LinkCustomAttributes = "";
		$this->kgis_hobli_id->HrefValue = "";
		$this->kgis_hobli_id->TooltipValue = "";

		// kgis_village_id
		$this->kgis_village_id->LinkCustomAttributes = "";
		$this->kgis_village_id->HrefValue = "";
		$this->kgis_village_id->TooltipValue = "";

		// kwris_basin_id
		$this->kwris_basin_id->LinkCustomAttributes = "";
		$this->kwris_basin_id->HrefValue = "";
		$this->kwris_basin_id->TooltipValue = "";

		// kwris_subbasin_id
		$this->kwris_subbasin_id->LinkCustomAttributes = "";
		$this->kwris_subbasin_id->HrefValue = "";
		$this->kwris_subbasin_id->TooltipValue = "";

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

		// Raingauge_id
		$this->Raingauge_id->EditAttrs["class"] = "form-control";
		$this->Raingauge_id->EditCustomAttributes = "";
		$this->Raingauge_id->EditValue = $this->Raingauge_id->CurrentValue;

		// District_name
		$this->District_name->EditAttrs["class"] = "form-control";
		$this->District_name->EditCustomAttributes = "";
		if (!$this->District_name->Raw)
			$this->District_name->CurrentValue = HtmlDecode($this->District_name->CurrentValue);
		$this->District_name->EditValue = $this->District_name->CurrentValue;

		// Taluka_name
		$this->Taluka_name->EditAttrs["class"] = "form-control";
		$this->Taluka_name->EditCustomAttributes = "";
		if (!$this->Taluka_name->Raw)
			$this->Taluka_name->CurrentValue = HtmlDecode($this->Taluka_name->CurrentValue);
		$this->Taluka_name->EditValue = $this->Taluka_name->CurrentValue;

		// station_name
		$this->station_name->EditAttrs["class"] = "form-control";
		$this->station_name->EditCustomAttributes = "";
		if (!$this->station_name->Raw)
			$this->station_name->CurrentValue = HtmlDecode($this->station_name->CurrentValue);
		$this->station_name->EditValue = $this->station_name->CurrentValue;

		// station_latitude
		$this->station_latitude->EditAttrs["class"] = "form-control";
		$this->station_latitude->EditCustomAttributes = "";
		$this->station_latitude->EditValue = $this->station_latitude->CurrentValue;
		if (strval($this->station_latitude->EditValue) != "" && is_numeric($this->station_latitude->EditValue))
			$this->station_latitude->EditValue = FormatNumber($this->station_latitude->EditValue, -2, -2, -2, -2);
		

		// station_longitude
		$this->station_longitude->EditAttrs["class"] = "form-control";
		$this->station_longitude->EditCustomAttributes = "";
		$this->station_longitude->EditValue = $this->station_longitude->CurrentValue;
		if (strval($this->station_longitude->EditValue) != "" && is_numeric($this->station_longitude->EditValue))
			$this->station_longitude->EditValue = FormatNumber($this->station_longitude->EditValue, -2, -2, -2, -2);
		

		// kgis_district_id
		$this->kgis_district_id->EditAttrs["class"] = "form-control";
		$this->kgis_district_id->EditCustomAttributes = "";
		$this->kgis_district_id->EditValue = $this->kgis_district_id->CurrentValue;

		// kgis_taluka_id
		$this->kgis_taluka_id->EditAttrs["class"] = "form-control";
		$this->kgis_taluka_id->EditCustomAttributes = "";
		$this->kgis_taluka_id->EditValue = $this->kgis_taluka_id->CurrentValue;

		// kgis_hobli_id
		$this->kgis_hobli_id->EditAttrs["class"] = "form-control";
		$this->kgis_hobli_id->EditCustomAttributes = "";
		$this->kgis_hobli_id->EditValue = $this->kgis_hobli_id->CurrentValue;

		// kgis_village_id
		$this->kgis_village_id->EditAttrs["class"] = "form-control";
		$this->kgis_village_id->EditCustomAttributes = "";
		$this->kgis_village_id->EditValue = $this->kgis_village_id->CurrentValue;

		// kwris_basin_id
		$this->kwris_basin_id->EditAttrs["class"] = "form-control";
		$this->kwris_basin_id->EditCustomAttributes = "";
		$this->kwris_basin_id->EditValue = $this->kwris_basin_id->CurrentValue;

		// kwris_subbasin_id
		$this->kwris_subbasin_id->EditAttrs["class"] = "form-control";
		$this->kwris_subbasin_id->EditCustomAttributes = "";
		$this->kwris_subbasin_id->EditValue = $this->kwris_subbasin_id->CurrentValue;

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
					$doc->exportCaption($this->Raingauge_id);
					$doc->exportCaption($this->District_name);
					$doc->exportCaption($this->Taluka_name);
					$doc->exportCaption($this->station_name);
					$doc->exportCaption($this->station_latitude);
					$doc->exportCaption($this->station_longitude);
					$doc->exportCaption($this->kgis_district_id);
					$doc->exportCaption($this->kgis_taluka_id);
					$doc->exportCaption($this->kgis_hobli_id);
					$doc->exportCaption($this->kgis_village_id);
					$doc->exportCaption($this->kwris_basin_id);
					$doc->exportCaption($this->kwris_subbasin_id);
				} else {
					$doc->exportCaption($this->Raingauge_id);
					$doc->exportCaption($this->District_name);
					$doc->exportCaption($this->Taluka_name);
					$doc->exportCaption($this->station_name);
					$doc->exportCaption($this->station_latitude);
					$doc->exportCaption($this->station_longitude);
					$doc->exportCaption($this->kgis_district_id);
					$doc->exportCaption($this->kgis_taluka_id);
					$doc->exportCaption($this->kgis_hobli_id);
					$doc->exportCaption($this->kgis_village_id);
					$doc->exportCaption($this->kwris_basin_id);
					$doc->exportCaption($this->kwris_subbasin_id);
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
						$doc->exportField($this->Raingauge_id);
						$doc->exportField($this->District_name);
						$doc->exportField($this->Taluka_name);
						$doc->exportField($this->station_name);
						$doc->exportField($this->station_latitude);
						$doc->exportField($this->station_longitude);
						$doc->exportField($this->kgis_district_id);
						$doc->exportField($this->kgis_taluka_id);
						$doc->exportField($this->kgis_hobli_id);
						$doc->exportField($this->kgis_village_id);
						$doc->exportField($this->kwris_basin_id);
						$doc->exportField($this->kwris_subbasin_id);
					} else {
						$doc->exportField($this->Raingauge_id);
						$doc->exportField($this->District_name);
						$doc->exportField($this->Taluka_name);
						$doc->exportField($this->station_name);
						$doc->exportField($this->station_latitude);
						$doc->exportField($this->station_longitude);
						$doc->exportField($this->kgis_district_id);
						$doc->exportField($this->kgis_taluka_id);
						$doc->exportField($this->kgis_hobli_id);
						$doc->exportField($this->kgis_village_id);
						$doc->exportField($this->kwris_basin_id);
						$doc->exportField($this->kwris_subbasin_id);
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