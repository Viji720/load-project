<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for tbl_smsdata_archive
 */
class tbl_smsdata_archive extends DbTable
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
	public $SMSDateTime;
	public $SystemDateTime;
	public $ConfirmQueryDateTime;
	public $ConfirmedDateTime;
	public $SendDateTime;
	public $SMSText;
	public $Status;
	public $obsremarks;
	public $SenderMobileNumber;
	public $SubDivId;
	public $StationId;
	public $IsFirstMsg;
	public $Validated;
	public $isFreeze;
	public $rainfall;
	public $min_air_temp;
	public $max_air_temp;
	public $atmospheric_pressure;
	public $wind_speed;
	public $precipitation;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tbl_smsdata_archive';
		$this->TableName = 'tbl_smsdata_archive';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`tbl_smsdata_archive`";
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

		// Slno
		$this->Slno = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_Slno', 'Slno', '`Slno`', '`Slno`', 3, 11, -1, FALSE, '`Slno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Slno->IsPrimaryKey = TRUE; // Primary key field
		$this->Slno->Nullable = FALSE; // NOT NULL field
		$this->Slno->Required = TRUE; // Required field
		$this->Slno->Sortable = TRUE; // Allow sort
		$this->Slno->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Slno'] = &$this->Slno;

		// SMSDateTime
		$this->SMSDateTime = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_SMSDateTime', 'SMSDateTime', '`SMSDateTime`', CastDateFieldForLike("`SMSDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`SMSDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMSDateTime->Sortable = TRUE; // Allow sort
		$this->SMSDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SMSDateTime'] = &$this->SMSDateTime;

		// SystemDateTime
		$this->SystemDateTime = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_SystemDateTime', 'SystemDateTime', '`SystemDateTime`', CastDateFieldForLike("`SystemDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`SystemDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SystemDateTime->Sortable = TRUE; // Allow sort
		$this->SystemDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SystemDateTime'] = &$this->SystemDateTime;

		// ConfirmQueryDateTime
		$this->ConfirmQueryDateTime = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_ConfirmQueryDateTime', 'ConfirmQueryDateTime', '`ConfirmQueryDateTime`', CastDateFieldForLike("`ConfirmQueryDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`ConfirmQueryDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ConfirmQueryDateTime->Sortable = TRUE; // Allow sort
		$this->ConfirmQueryDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ConfirmQueryDateTime'] = &$this->ConfirmQueryDateTime;

		// ConfirmedDateTime
		$this->ConfirmedDateTime = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_ConfirmedDateTime', 'ConfirmedDateTime', '`ConfirmedDateTime`', CastDateFieldForLike("`ConfirmedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`ConfirmedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ConfirmedDateTime->Sortable = TRUE; // Allow sort
		$this->ConfirmedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ConfirmedDateTime'] = &$this->ConfirmedDateTime;

		// SendDateTime
		$this->SendDateTime = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_SendDateTime', 'SendDateTime', '`SendDateTime`', CastDateFieldForLike("`SendDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`SendDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SendDateTime->Sortable = TRUE; // Allow sort
		$this->SendDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SendDateTime'] = &$this->SendDateTime;

		// SMSText
		$this->SMSText = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_SMSText', 'SMSText', '`SMSText`', '`SMSText`', 200, 50, -1, FALSE, '`SMSText`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMSText->Sortable = TRUE; // Allow sort
		$this->fields['SMSText'] = &$this->SMSText;

		// Status
		$this->Status = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_Status', 'Status', '`Status`', '`Status`', 3, 11, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Status'] = &$this->Status;

		// obsremarks
		$this->obsremarks = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_obsremarks', 'obsremarks', '`obsremarks`', '`obsremarks`', 200, 50, -1, FALSE, '`obsremarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->obsremarks->Sortable = TRUE; // Allow sort
		$this->fields['obsremarks'] = &$this->obsremarks;

		// SenderMobileNumber
		$this->SenderMobileNumber = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_SenderMobileNumber', 'SenderMobileNumber', '`SenderMobileNumber`', '`SenderMobileNumber`', 200, 25, -1, FALSE, '`SenderMobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SenderMobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['SenderMobileNumber'] = &$this->SenderMobileNumber;

		// SubDivId
		$this->SubDivId = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_SubDivId', 'SubDivId', '`SubDivId`', '`SubDivId`', 3, 11, -1, FALSE, '`SubDivId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubDivId->Sortable = TRUE; // Allow sort
		$this->SubDivId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivId'] = &$this->SubDivId;

		// StationId
		$this->StationId = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;

		// IsFirstMsg
		$this->IsFirstMsg = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_IsFirstMsg', 'IsFirstMsg', '`IsFirstMsg`', '`IsFirstMsg`', 3, 11, -1, FALSE, '`IsFirstMsg`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IsFirstMsg->Sortable = TRUE; // Allow sort
		$this->IsFirstMsg->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['IsFirstMsg'] = &$this->IsFirstMsg;

		// Validated
		$this->Validated = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_Validated', 'Validated', '`Validated`', '`Validated`', 3, 11, -1, FALSE, '`Validated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Validated->Sortable = TRUE; // Allow sort
		$this->Validated->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Validated'] = &$this->Validated;

		// isFreeze
		$this->isFreeze = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_isFreeze', 'isFreeze', '`isFreeze`', '`isFreeze`', 16, 1, -1, FALSE, '`isFreeze`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->isFreeze->Nullable = FALSE; // NOT NULL field
		$this->isFreeze->Sortable = TRUE; // Allow sort
		$this->isFreeze->DataType = DATATYPE_BOOLEAN;
		switch ($CurrentLanguage) {
			case "en":
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_smsdata_archive', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_smsdata_archive', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_smsdata_archive', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->isFreeze->OptionCount = 2;
		$this->isFreeze->DefaultErrorMessage = $Language->phrase("IncorrectField");
		$this->fields['isFreeze'] = &$this->isFreeze;

		// rainfall
		$this->rainfall = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_rainfall', 'rainfall', '`rainfall`', '`rainfall`', 4, 7, -1, FALSE, '`rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->rainfall->Sortable = TRUE; // Allow sort
		$this->rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['rainfall'] = &$this->rainfall;

		// min_air_temp
		$this->min_air_temp = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_min_air_temp', 'min_air_temp', '`min_air_temp`', '`min_air_temp`', 4, 7, -1, FALSE, '`min_air_temp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->min_air_temp->Sortable = TRUE; // Allow sort
		$this->min_air_temp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['min_air_temp'] = &$this->min_air_temp;

		// max_air_temp
		$this->max_air_temp = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_max_air_temp', 'max_air_temp', '`max_air_temp`', '`max_air_temp`', 4, 7, -1, FALSE, '`max_air_temp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->max_air_temp->Sortable = TRUE; // Allow sort
		$this->max_air_temp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['max_air_temp'] = &$this->max_air_temp;

		// atmospheric_pressure
		$this->atmospheric_pressure = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_atmospheric_pressure', 'atmospheric_pressure', '`atmospheric_pressure`', '`atmospheric_pressure`', 4, 7, -1, FALSE, '`atmospheric_pressure`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->atmospheric_pressure->Sortable = TRUE; // Allow sort
		$this->atmospheric_pressure->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['atmospheric_pressure'] = &$this->atmospheric_pressure;

		// wind_speed
		$this->wind_speed = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_wind_speed', 'wind_speed', '`wind_speed`', '`wind_speed`', 4, 7, -1, FALSE, '`wind_speed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->wind_speed->Sortable = TRUE; // Allow sort
		$this->wind_speed->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['wind_speed'] = &$this->wind_speed;

		// precipitation
		$this->precipitation = new DbField('tbl_smsdata_archive', 'tbl_smsdata_archive', 'x_precipitation', 'precipitation', '`precipitation`', '`precipitation`', 4, 7, -1, FALSE, '`precipitation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->precipitation->Sortable = TRUE; // Allow sort
		$this->precipitation->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['precipitation'] = &$this->precipitation;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`tbl_smsdata_archive`";
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
		$this->SMSDateTime->DbValue = $row['SMSDateTime'];
		$this->SystemDateTime->DbValue = $row['SystemDateTime'];
		$this->ConfirmQueryDateTime->DbValue = $row['ConfirmQueryDateTime'];
		$this->ConfirmedDateTime->DbValue = $row['ConfirmedDateTime'];
		$this->SendDateTime->DbValue = $row['SendDateTime'];
		$this->SMSText->DbValue = $row['SMSText'];
		$this->Status->DbValue = $row['Status'];
		$this->obsremarks->DbValue = $row['obsremarks'];
		$this->SenderMobileNumber->DbValue = $row['SenderMobileNumber'];
		$this->SubDivId->DbValue = $row['SubDivId'];
		$this->StationId->DbValue = $row['StationId'];
		$this->IsFirstMsg->DbValue = $row['IsFirstMsg'];
		$this->Validated->DbValue = $row['Validated'];
		$this->isFreeze->DbValue = $row['isFreeze'];
		$this->rainfall->DbValue = $row['rainfall'];
		$this->min_air_temp->DbValue = $row['min_air_temp'];
		$this->max_air_temp->DbValue = $row['max_air_temp'];
		$this->atmospheric_pressure->DbValue = $row['atmospheric_pressure'];
		$this->wind_speed->DbValue = $row['wind_speed'];
		$this->precipitation->DbValue = $row['precipitation'];
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
			return "tbl_smsdata_archivelist.php";
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
		if ($pageName == "tbl_smsdata_archiveview.php")
			return $Language->phrase("View");
		elseif ($pageName == "tbl_smsdata_archiveedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tbl_smsdata_archiveadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tbl_smsdata_archivelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("tbl_smsdata_archiveview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tbl_smsdata_archiveview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "tbl_smsdata_archiveadd.php?" . $this->getUrlParm($parm);
		else
			$url = "tbl_smsdata_archiveadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tbl_smsdata_archiveedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("tbl_smsdata_archiveadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("tbl_smsdata_archivedelete.php", $this->getUrlParm());
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
		$this->SMSDateTime->setDbValue($rs->fields('SMSDateTime'));
		$this->SystemDateTime->setDbValue($rs->fields('SystemDateTime'));
		$this->ConfirmQueryDateTime->setDbValue($rs->fields('ConfirmQueryDateTime'));
		$this->ConfirmedDateTime->setDbValue($rs->fields('ConfirmedDateTime'));
		$this->SendDateTime->setDbValue($rs->fields('SendDateTime'));
		$this->SMSText->setDbValue($rs->fields('SMSText'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->obsremarks->setDbValue($rs->fields('obsremarks'));
		$this->SenderMobileNumber->setDbValue($rs->fields('SenderMobileNumber'));
		$this->SubDivId->setDbValue($rs->fields('SubDivId'));
		$this->StationId->setDbValue($rs->fields('StationId'));
		$this->IsFirstMsg->setDbValue($rs->fields('IsFirstMsg'));
		$this->Validated->setDbValue($rs->fields('Validated'));
		$this->isFreeze->setDbValue($rs->fields('isFreeze'));
		$this->rainfall->setDbValue($rs->fields('rainfall'));
		$this->min_air_temp->setDbValue($rs->fields('min_air_temp'));
		$this->max_air_temp->setDbValue($rs->fields('max_air_temp'));
		$this->atmospheric_pressure->setDbValue($rs->fields('atmospheric_pressure'));
		$this->wind_speed->setDbValue($rs->fields('wind_speed'));
		$this->precipitation->setDbValue($rs->fields('precipitation'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Slno
		// SMSDateTime
		// SystemDateTime
		// ConfirmQueryDateTime
		// ConfirmedDateTime
		// SendDateTime
		// SMSText
		// Status
		// obsremarks
		// SenderMobileNumber
		// SubDivId
		// StationId
		// IsFirstMsg
		// Validated
		// isFreeze
		// rainfall
		// min_air_temp
		// max_air_temp
		// atmospheric_pressure
		// wind_speed
		// precipitation
		// Slno

		$this->Slno->ViewValue = $this->Slno->CurrentValue;
		$this->Slno->ViewValue = FormatNumber($this->Slno->ViewValue, 0, -2, -2, -2);
		$this->Slno->ViewCustomAttributes = "";

		// SMSDateTime
		$this->SMSDateTime->ViewValue = $this->SMSDateTime->CurrentValue;
		$this->SMSDateTime->ViewValue = FormatDateTime($this->SMSDateTime->ViewValue, 0);
		$this->SMSDateTime->ViewCustomAttributes = "";

		// SystemDateTime
		$this->SystemDateTime->ViewValue = $this->SystemDateTime->CurrentValue;
		$this->SystemDateTime->ViewValue = FormatDateTime($this->SystemDateTime->ViewValue, 0);
		$this->SystemDateTime->ViewCustomAttributes = "";

		// ConfirmQueryDateTime
		$this->ConfirmQueryDateTime->ViewValue = $this->ConfirmQueryDateTime->CurrentValue;
		$this->ConfirmQueryDateTime->ViewValue = FormatDateTime($this->ConfirmQueryDateTime->ViewValue, 0);
		$this->ConfirmQueryDateTime->ViewCustomAttributes = "";

		// ConfirmedDateTime
		$this->ConfirmedDateTime->ViewValue = $this->ConfirmedDateTime->CurrentValue;
		$this->ConfirmedDateTime->ViewValue = FormatDateTime($this->ConfirmedDateTime->ViewValue, 0);
		$this->ConfirmedDateTime->ViewCustomAttributes = "";

		// SendDateTime
		$this->SendDateTime->ViewValue = $this->SendDateTime->CurrentValue;
		$this->SendDateTime->ViewValue = FormatDateTime($this->SendDateTime->ViewValue, 0);
		$this->SendDateTime->ViewCustomAttributes = "";

		// SMSText
		$this->SMSText->ViewValue = $this->SMSText->CurrentValue;
		$this->SMSText->ViewCustomAttributes = "";

		// Status
		$this->Status->ViewValue = $this->Status->CurrentValue;
		$this->Status->ViewValue = FormatNumber($this->Status->ViewValue, 0, -2, -2, -2);
		$this->Status->ViewCustomAttributes = "";

		// obsremarks
		$this->obsremarks->ViewValue = $this->obsremarks->CurrentValue;
		$this->obsremarks->ViewCustomAttributes = "";

		// SenderMobileNumber
		$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
		$this->SenderMobileNumber->ViewCustomAttributes = "";

		// SubDivId
		$this->SubDivId->ViewValue = $this->SubDivId->CurrentValue;
		$this->SubDivId->ViewValue = FormatNumber($this->SubDivId->ViewValue, 0, -2, -2, -2);
		$this->SubDivId->ViewCustomAttributes = "";

		// StationId
		$this->StationId->ViewValue = $this->StationId->CurrentValue;
		$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
		$this->StationId->ViewCustomAttributes = "";

		// IsFirstMsg
		$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->CurrentValue;
		$this->IsFirstMsg->ViewValue = FormatNumber($this->IsFirstMsg->ViewValue, 0, -2, -2, -2);
		$this->IsFirstMsg->ViewCustomAttributes = "";

		// Validated
		$this->Validated->ViewValue = $this->Validated->CurrentValue;
		$this->Validated->ViewValue = FormatNumber($this->Validated->ViewValue, 0, -2, -2, -2);
		$this->Validated->ViewCustomAttributes = "";

		// isFreeze
		if (ConvertToBool($this->isFreeze->CurrentValue)) {
			$this->isFreeze->ViewValue = $this->isFreeze->tagCaption(1) != "" ? $this->isFreeze->tagCaption(1) : "Yes";
		} else {
			$this->isFreeze->ViewValue = $this->isFreeze->tagCaption(2) != "" ? $this->isFreeze->tagCaption(2) : "No";
		}
		$this->isFreeze->ViewCustomAttributes = "";

		// rainfall
		$this->rainfall->ViewValue = $this->rainfall->CurrentValue;
		$this->rainfall->ViewValue = FormatNumber($this->rainfall->ViewValue, 2, -2, -2, -2);
		$this->rainfall->ViewCustomAttributes = "";

		// min_air_temp
		$this->min_air_temp->ViewValue = $this->min_air_temp->CurrentValue;
		$this->min_air_temp->ViewValue = FormatNumber($this->min_air_temp->ViewValue, 2, -2, -2, -2);
		$this->min_air_temp->ViewCustomAttributes = "";

		// max_air_temp
		$this->max_air_temp->ViewValue = $this->max_air_temp->CurrentValue;
		$this->max_air_temp->ViewValue = FormatNumber($this->max_air_temp->ViewValue, 2, -2, -2, -2);
		$this->max_air_temp->ViewCustomAttributes = "";

		// atmospheric_pressure
		$this->atmospheric_pressure->ViewValue = $this->atmospheric_pressure->CurrentValue;
		$this->atmospheric_pressure->ViewValue = FormatNumber($this->atmospheric_pressure->ViewValue, 2, -2, -2, -2);
		$this->atmospheric_pressure->ViewCustomAttributes = "";

		// wind_speed
		$this->wind_speed->ViewValue = $this->wind_speed->CurrentValue;
		$this->wind_speed->ViewValue = FormatNumber($this->wind_speed->ViewValue, 2, -2, -2, -2);
		$this->wind_speed->ViewCustomAttributes = "";

		// precipitation
		$this->precipitation->ViewValue = $this->precipitation->CurrentValue;
		$this->precipitation->ViewValue = FormatNumber($this->precipitation->ViewValue, 2, -2, -2, -2);
		$this->precipitation->ViewCustomAttributes = "";

		// Slno
		$this->Slno->LinkCustomAttributes = "";
		$this->Slno->HrefValue = "";
		$this->Slno->TooltipValue = "";

		// SMSDateTime
		$this->SMSDateTime->LinkCustomAttributes = "";
		$this->SMSDateTime->HrefValue = "";
		$this->SMSDateTime->TooltipValue = "";

		// SystemDateTime
		$this->SystemDateTime->LinkCustomAttributes = "";
		$this->SystemDateTime->HrefValue = "";
		$this->SystemDateTime->TooltipValue = "";

		// ConfirmQueryDateTime
		$this->ConfirmQueryDateTime->LinkCustomAttributes = "";
		$this->ConfirmQueryDateTime->HrefValue = "";
		$this->ConfirmQueryDateTime->TooltipValue = "";

		// ConfirmedDateTime
		$this->ConfirmedDateTime->LinkCustomAttributes = "";
		$this->ConfirmedDateTime->HrefValue = "";
		$this->ConfirmedDateTime->TooltipValue = "";

		// SendDateTime
		$this->SendDateTime->LinkCustomAttributes = "";
		$this->SendDateTime->HrefValue = "";
		$this->SendDateTime->TooltipValue = "";

		// SMSText
		$this->SMSText->LinkCustomAttributes = "";
		$this->SMSText->HrefValue = "";
		$this->SMSText->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// obsremarks
		$this->obsremarks->LinkCustomAttributes = "";
		$this->obsremarks->HrefValue = "";
		$this->obsremarks->TooltipValue = "";

		// SenderMobileNumber
		$this->SenderMobileNumber->LinkCustomAttributes = "";
		$this->SenderMobileNumber->HrefValue = "";
		$this->SenderMobileNumber->TooltipValue = "";

		// SubDivId
		$this->SubDivId->LinkCustomAttributes = "";
		$this->SubDivId->HrefValue = "";
		$this->SubDivId->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// IsFirstMsg
		$this->IsFirstMsg->LinkCustomAttributes = "";
		$this->IsFirstMsg->HrefValue = "";
		$this->IsFirstMsg->TooltipValue = "";

		// Validated
		$this->Validated->LinkCustomAttributes = "";
		$this->Validated->HrefValue = "";
		$this->Validated->TooltipValue = "";

		// isFreeze
		$this->isFreeze->LinkCustomAttributes = "";
		$this->isFreeze->HrefValue = "";
		$this->isFreeze->TooltipValue = "";

		// rainfall
		$this->rainfall->LinkCustomAttributes = "";
		$this->rainfall->HrefValue = "";
		$this->rainfall->TooltipValue = "";

		// min_air_temp
		$this->min_air_temp->LinkCustomAttributes = "";
		$this->min_air_temp->HrefValue = "";
		$this->min_air_temp->TooltipValue = "";

		// max_air_temp
		$this->max_air_temp->LinkCustomAttributes = "";
		$this->max_air_temp->HrefValue = "";
		$this->max_air_temp->TooltipValue = "";

		// atmospheric_pressure
		$this->atmospheric_pressure->LinkCustomAttributes = "";
		$this->atmospheric_pressure->HrefValue = "";
		$this->atmospheric_pressure->TooltipValue = "";

		// wind_speed
		$this->wind_speed->LinkCustomAttributes = "";
		$this->wind_speed->HrefValue = "";
		$this->wind_speed->TooltipValue = "";

		// precipitation
		$this->precipitation->LinkCustomAttributes = "";
		$this->precipitation->HrefValue = "";
		$this->precipitation->TooltipValue = "";

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

		// SMSDateTime
		$this->SMSDateTime->EditAttrs["class"] = "form-control";
		$this->SMSDateTime->EditCustomAttributes = "";
		$this->SMSDateTime->EditValue = FormatDateTime($this->SMSDateTime->CurrentValue, 8);

		// SystemDateTime
		$this->SystemDateTime->EditAttrs["class"] = "form-control";
		$this->SystemDateTime->EditCustomAttributes = "";
		$this->SystemDateTime->EditValue = FormatDateTime($this->SystemDateTime->CurrentValue, 8);

		// ConfirmQueryDateTime
		$this->ConfirmQueryDateTime->EditAttrs["class"] = "form-control";
		$this->ConfirmQueryDateTime->EditCustomAttributes = "";
		$this->ConfirmQueryDateTime->EditValue = FormatDateTime($this->ConfirmQueryDateTime->CurrentValue, 8);

		// ConfirmedDateTime
		$this->ConfirmedDateTime->EditAttrs["class"] = "form-control";
		$this->ConfirmedDateTime->EditCustomAttributes = "";
		$this->ConfirmedDateTime->EditValue = FormatDateTime($this->ConfirmedDateTime->CurrentValue, 8);

		// SendDateTime
		$this->SendDateTime->EditAttrs["class"] = "form-control";
		$this->SendDateTime->EditCustomAttributes = "";
		$this->SendDateTime->EditValue = FormatDateTime($this->SendDateTime->CurrentValue, 8);

		// SMSText
		$this->SMSText->EditAttrs["class"] = "form-control";
		$this->SMSText->EditCustomAttributes = "";
		if (!$this->SMSText->Raw)
			$this->SMSText->CurrentValue = HtmlDecode($this->SMSText->CurrentValue);
		$this->SMSText->EditValue = $this->SMSText->CurrentValue;

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";
		$this->Status->EditValue = $this->Status->CurrentValue;

		// obsremarks
		$this->obsremarks->EditAttrs["class"] = "form-control";
		$this->obsremarks->EditCustomAttributes = "";
		if (!$this->obsremarks->Raw)
			$this->obsremarks->CurrentValue = HtmlDecode($this->obsremarks->CurrentValue);
		$this->obsremarks->EditValue = $this->obsremarks->CurrentValue;

		// SenderMobileNumber
		$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
		$this->SenderMobileNumber->EditCustomAttributes = "";
		if (!$this->SenderMobileNumber->Raw)
			$this->SenderMobileNumber->CurrentValue = HtmlDecode($this->SenderMobileNumber->CurrentValue);
		$this->SenderMobileNumber->EditValue = $this->SenderMobileNumber->CurrentValue;

		// SubDivId
		$this->SubDivId->EditAttrs["class"] = "form-control";
		$this->SubDivId->EditCustomAttributes = "";
		$this->SubDivId->EditValue = $this->SubDivId->CurrentValue;

		// StationId
		$this->StationId->EditAttrs["class"] = "form-control";
		$this->StationId->EditCustomAttributes = "";
		$this->StationId->EditValue = $this->StationId->CurrentValue;

		// IsFirstMsg
		$this->IsFirstMsg->EditAttrs["class"] = "form-control";
		$this->IsFirstMsg->EditCustomAttributes = "";
		$this->IsFirstMsg->EditValue = $this->IsFirstMsg->CurrentValue;

		// Validated
		$this->Validated->EditAttrs["class"] = "form-control";
		$this->Validated->EditCustomAttributes = "";
		$this->Validated->EditValue = $this->Validated->CurrentValue;

		// isFreeze
		$this->isFreeze->EditCustomAttributes = "";
		$this->isFreeze->EditValue = $this->isFreeze->options(FALSE);

		// rainfall
		$this->rainfall->EditAttrs["class"] = "form-control";
		$this->rainfall->EditCustomAttributes = "";
		$this->rainfall->EditValue = $this->rainfall->CurrentValue;
		if (strval($this->rainfall->EditValue) != "" && is_numeric($this->rainfall->EditValue))
			$this->rainfall->EditValue = FormatNumber($this->rainfall->EditValue, -2, -2, -2, -2);
		

		// min_air_temp
		$this->min_air_temp->EditAttrs["class"] = "form-control";
		$this->min_air_temp->EditCustomAttributes = "";
		$this->min_air_temp->EditValue = $this->min_air_temp->CurrentValue;
		if (strval($this->min_air_temp->EditValue) != "" && is_numeric($this->min_air_temp->EditValue))
			$this->min_air_temp->EditValue = FormatNumber($this->min_air_temp->EditValue, -2, -2, -2, -2);
		

		// max_air_temp
		$this->max_air_temp->EditAttrs["class"] = "form-control";
		$this->max_air_temp->EditCustomAttributes = "";
		$this->max_air_temp->EditValue = $this->max_air_temp->CurrentValue;
		if (strval($this->max_air_temp->EditValue) != "" && is_numeric($this->max_air_temp->EditValue))
			$this->max_air_temp->EditValue = FormatNumber($this->max_air_temp->EditValue, -2, -2, -2, -2);
		

		// atmospheric_pressure
		$this->atmospheric_pressure->EditAttrs["class"] = "form-control";
		$this->atmospheric_pressure->EditCustomAttributes = "";
		$this->atmospheric_pressure->EditValue = $this->atmospheric_pressure->CurrentValue;
		if (strval($this->atmospheric_pressure->EditValue) != "" && is_numeric($this->atmospheric_pressure->EditValue))
			$this->atmospheric_pressure->EditValue = FormatNumber($this->atmospheric_pressure->EditValue, -2, -2, -2, -2);
		

		// wind_speed
		$this->wind_speed->EditAttrs["class"] = "form-control";
		$this->wind_speed->EditCustomAttributes = "";
		$this->wind_speed->EditValue = $this->wind_speed->CurrentValue;
		if (strval($this->wind_speed->EditValue) != "" && is_numeric($this->wind_speed->EditValue))
			$this->wind_speed->EditValue = FormatNumber($this->wind_speed->EditValue, -2, -2, -2, -2);
		

		// precipitation
		$this->precipitation->EditAttrs["class"] = "form-control";
		$this->precipitation->EditCustomAttributes = "";
		$this->precipitation->EditValue = $this->precipitation->CurrentValue;
		if (strval($this->precipitation->EditValue) != "" && is_numeric($this->precipitation->EditValue))
			$this->precipitation->EditValue = FormatNumber($this->precipitation->EditValue, -2, -2, -2, -2);
		

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
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->SystemDateTime);
					$doc->exportCaption($this->ConfirmQueryDateTime);
					$doc->exportCaption($this->ConfirmedDateTime);
					$doc->exportCaption($this->SendDateTime);
					$doc->exportCaption($this->SMSText);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->obsremarks);
					$doc->exportCaption($this->SenderMobileNumber);
					$doc->exportCaption($this->SubDivId);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->IsFirstMsg);
					$doc->exportCaption($this->Validated);
					$doc->exportCaption($this->isFreeze);
					$doc->exportCaption($this->rainfall);
					$doc->exportCaption($this->min_air_temp);
					$doc->exportCaption($this->max_air_temp);
					$doc->exportCaption($this->atmospheric_pressure);
					$doc->exportCaption($this->wind_speed);
					$doc->exportCaption($this->precipitation);
				} else {
					$doc->exportCaption($this->Slno);
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->SystemDateTime);
					$doc->exportCaption($this->ConfirmQueryDateTime);
					$doc->exportCaption($this->ConfirmedDateTime);
					$doc->exportCaption($this->SendDateTime);
					$doc->exportCaption($this->SMSText);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->obsremarks);
					$doc->exportCaption($this->SenderMobileNumber);
					$doc->exportCaption($this->SubDivId);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->IsFirstMsg);
					$doc->exportCaption($this->Validated);
					$doc->exportCaption($this->isFreeze);
					$doc->exportCaption($this->rainfall);
					$doc->exportCaption($this->min_air_temp);
					$doc->exportCaption($this->max_air_temp);
					$doc->exportCaption($this->atmospheric_pressure);
					$doc->exportCaption($this->wind_speed);
					$doc->exportCaption($this->precipitation);
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
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->SystemDateTime);
						$doc->exportField($this->ConfirmQueryDateTime);
						$doc->exportField($this->ConfirmedDateTime);
						$doc->exportField($this->SendDateTime);
						$doc->exportField($this->SMSText);
						$doc->exportField($this->Status);
						$doc->exportField($this->obsremarks);
						$doc->exportField($this->SenderMobileNumber);
						$doc->exportField($this->SubDivId);
						$doc->exportField($this->StationId);
						$doc->exportField($this->IsFirstMsg);
						$doc->exportField($this->Validated);
						$doc->exportField($this->isFreeze);
						$doc->exportField($this->rainfall);
						$doc->exportField($this->min_air_temp);
						$doc->exportField($this->max_air_temp);
						$doc->exportField($this->atmospheric_pressure);
						$doc->exportField($this->wind_speed);
						$doc->exportField($this->precipitation);
					} else {
						$doc->exportField($this->Slno);
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->SystemDateTime);
						$doc->exportField($this->ConfirmQueryDateTime);
						$doc->exportField($this->ConfirmedDateTime);
						$doc->exportField($this->SendDateTime);
						$doc->exportField($this->SMSText);
						$doc->exportField($this->Status);
						$doc->exportField($this->obsremarks);
						$doc->exportField($this->SenderMobileNumber);
						$doc->exportField($this->SubDivId);
						$doc->exportField($this->StationId);
						$doc->exportField($this->IsFirstMsg);
						$doc->exportField($this->Validated);
						$doc->exportField($this->isFreeze);
						$doc->exportField($this->rainfall);
						$doc->exportField($this->min_air_temp);
						$doc->exportField($this->max_air_temp);
						$doc->exportField($this->atmospheric_pressure);
						$doc->exportField($this->wind_speed);
						$doc->exportField($this->precipitation);
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