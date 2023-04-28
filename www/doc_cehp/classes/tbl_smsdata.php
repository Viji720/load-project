<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for tbl_smsdata
 */
class tbl_smsdata extends DbTable
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
	public $StationId;
	public $SubDivId;
	public $SendDateTime;
	public $rainfall;
	public $obsremarks;
	public $Status;
	public $Validated;
	public $SenderMobileNumber;
	public $IsFirstMsg;
	public $SMSText;
	public $isFreeze;
	public $SystemDateTime;
	public $ConfirmQueryDateTime;
	public $ConfirmedDateTime;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tbl_smsdata';
		$this->TableName = 'tbl_smsdata';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`tbl_smsdata`";
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
		$this->Slno = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_Slno', 'Slno', '`Slno`', '`Slno`', 3, 11, -1, FALSE, '`Slno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Slno->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Slno->IsPrimaryKey = TRUE; // Primary key field
		$this->Slno->Sortable = TRUE; // Allow sort
		$this->Slno->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Slno'] = &$this->Slno;

		// SMSDateTime
		$this->SMSDateTime = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_SMSDateTime', 'SMSDateTime', '`SMSDateTime`', CastDateFieldForLike("`SMSDateTime`", 7, "DB"), 135, 19, 7, FALSE, '`SMSDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMSDateTime->Sortable = TRUE; // Allow sort
		$this->SMSDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['SMSDateTime'] = &$this->SMSDateTime;

		// StationId
		$this->StationId = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->StationId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], ["x_SubDivId"], [], ["SubDivisionId"], ["x_SubDivisionId"], [], [], '', '');
				break;
			case "kn":
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], ["x_SubDivId"], [], ["SubDivisionId"], ["x_SubDivisionId"], [], [], '', '');
				break;
			default:
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], ["x_SubDivId"], [], ["SubDivisionId"], ["x_SubDivisionId"], [], [], '', '');
				break;
		}
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;

		// SubDivId
		$this->SubDivId = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_SubDivId', 'SubDivId', '`SubDivId`', '`SubDivId`', 3, 11, -1, FALSE, '`SubDivId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SubDivId->Sortable = TRUE; // Allow sort
		$this->SubDivId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SubDivId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->SubDivId->Lookup = new Lookup('SubDivId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], ["x_StationId"], [], [], [], [], '', '');
				break;
			case "kn":
				$this->SubDivId->Lookup = new Lookup('SubDivId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], ["x_StationId"], [], [], [], [], '', '');
				break;
			default:
				$this->SubDivId->Lookup = new Lookup('SubDivId', 'master_subdivision', FALSE, 'SubDivisionId', ["SubDivisionName","","",""], [], ["x_StationId"], [], [], [], [], '', '');
				break;
		}
		$this->SubDivId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivId'] = &$this->SubDivId;

		// SendDateTime
		$this->SendDateTime = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_SendDateTime', 'SendDateTime', '`SendDateTime`', CastDateFieldForLike("`SendDateTime`", 7, "DB"), 135, 19, 7, FALSE, '`SendDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SendDateTime->Sortable = TRUE; // Allow sort
		$this->SendDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['SendDateTime'] = &$this->SendDateTime;

		// rainfall
		$this->rainfall = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_rainfall', 'rainfall', '`rainfall`', '`rainfall`', 4, 7, -1, FALSE, '`rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->rainfall->Sortable = TRUE; // Allow sort
		$this->rainfall->DefaultErrorMessage = str_replace(["%1", "%2"], ["0.00", "200.00"], $Language->phrase("IncorrectRange"));
		$this->fields['rainfall'] = &$this->rainfall;

		// obsremarks
		$this->obsremarks = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_obsremarks', 'obsremarks', '`obsremarks`', '`obsremarks`', 200, 50, -1, FALSE, '`obsremarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->obsremarks->Sortable = TRUE; // Allow sort
		$this->fields['obsremarks'] = &$this->obsremarks;

		// Status
		$this->Status = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_Status', 'Status', '`Status`', '`Status`', 3, 11, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Status->Nullable = FALSE; // NOT NULL field
		$this->Status->Required = TRUE; // Required field
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->Status->Lookup = new Lookup('Status', 'lkp_status', FALSE, 'Status', ["StatusName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->Status->Lookup = new Lookup('Status', 'lkp_status', FALSE, 'Status', ["StatusName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->Status->Lookup = new Lookup('Status', 'lkp_status', FALSE, 'Status', ["StatusName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->Status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Status'] = &$this->Status;

		// Validated
		$this->Validated = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_Validated', 'Validated', '`Validated`', '`Validated`', 3, 11, -1, FALSE, '`Validated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Validated->Sortable = TRUE; // Allow sort
		$this->Validated->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Validated->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->Validated->Lookup = new Lookup('Validated', 'lkp_validated', FALSE, 'validated', ["validatedName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->Validated->Lookup = new Lookup('Validated', 'lkp_validated', FALSE, 'validated', ["validatedName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->Validated->Lookup = new Lookup('Validated', 'lkp_validated', FALSE, 'validated', ["validatedName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->Validated->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Validated'] = &$this->Validated;

		// SenderMobileNumber
		$this->SenderMobileNumber = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_SenderMobileNumber', 'SenderMobileNumber', '`SenderMobileNumber`', '`SenderMobileNumber`', 200, 25, -1, FALSE, '`SenderMobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SenderMobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['SenderMobileNumber'] = &$this->SenderMobileNumber;

		// IsFirstMsg
		$this->IsFirstMsg = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_IsFirstMsg', 'IsFirstMsg', '`IsFirstMsg`', '`IsFirstMsg`', 3, 11, -1, FALSE, '`IsFirstMsg`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->IsFirstMsg->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->IsFirstMsg->Lookup = new Lookup('IsFirstMsg', 'lkp_isfirstmsg', FALSE, 'isFirstMsg', ["isFirstMsgName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->IsFirstMsg->Lookup = new Lookup('IsFirstMsg', 'lkp_isfirstmsg', FALSE, 'isFirstMsg', ["isFirstMsgName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->IsFirstMsg->Lookup = new Lookup('IsFirstMsg', 'lkp_isfirstmsg', FALSE, 'isFirstMsg', ["isFirstMsgName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->IsFirstMsg->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['IsFirstMsg'] = &$this->IsFirstMsg;

		// SMSText
		$this->SMSText = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_SMSText', 'SMSText', '`SMSText`', '`SMSText`', 200, 50, -1, FALSE, '`SMSText`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMSText->Sortable = TRUE; // Allow sort
		$this->fields['SMSText'] = &$this->SMSText;

		// isFreeze
		$this->isFreeze = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_isFreeze', 'isFreeze', '`isFreeze`', '`isFreeze`', 16, 1, -1, FALSE, '`isFreeze`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->isFreeze->Nullable = FALSE; // NOT NULL field
		$this->isFreeze->Sortable = TRUE; // Allow sort
		$this->isFreeze->DataType = DATATYPE_BOOLEAN;
		switch ($CurrentLanguage) {
			case "en":
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_smsdata', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_smsdata', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_smsdata', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->isFreeze->OptionCount = 2;
		$this->isFreeze->DefaultErrorMessage = $Language->phrase("IncorrectField");
		$this->fields['isFreeze'] = &$this->isFreeze;

		// SystemDateTime
		$this->SystemDateTime = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_SystemDateTime', 'SystemDateTime', '`SystemDateTime`', CastDateFieldForLike("`SystemDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`SystemDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SystemDateTime->Sortable = TRUE; // Allow sort
		$this->SystemDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SystemDateTime'] = &$this->SystemDateTime;

		// ConfirmQueryDateTime
		$this->ConfirmQueryDateTime = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_ConfirmQueryDateTime', 'ConfirmQueryDateTime', '`ConfirmQueryDateTime`', CastDateFieldForLike("`ConfirmQueryDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`ConfirmQueryDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ConfirmQueryDateTime->Sortable = TRUE; // Allow sort
		$this->ConfirmQueryDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ConfirmQueryDateTime'] = &$this->ConfirmQueryDateTime;

		// ConfirmedDateTime
		$this->ConfirmedDateTime = new DbField('tbl_smsdata', 'tbl_smsdata', 'x_ConfirmedDateTime', 'ConfirmedDateTime', '`ConfirmedDateTime`', CastDateFieldForLike("`ConfirmedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`ConfirmedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ConfirmedDateTime->Sortable = TRUE; // Allow sort
		$this->ConfirmedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ConfirmedDateTime'] = &$this->ConfirmedDateTime;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`tbl_smsdata`";
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
		$this->SMSDateTime->DbValue = $row['SMSDateTime'];
		$this->StationId->DbValue = $row['StationId'];
		$this->SubDivId->DbValue = $row['SubDivId'];
		$this->SendDateTime->DbValue = $row['SendDateTime'];
		$this->rainfall->DbValue = $row['rainfall'];
		$this->obsremarks->DbValue = $row['obsremarks'];
		$this->Status->DbValue = $row['Status'];
		$this->Validated->DbValue = $row['Validated'];
		$this->SenderMobileNumber->DbValue = $row['SenderMobileNumber'];
		$this->IsFirstMsg->DbValue = $row['IsFirstMsg'];
		$this->SMSText->DbValue = $row['SMSText'];
		$this->isFreeze->DbValue = $row['isFreeze'];
		$this->SystemDateTime->DbValue = $row['SystemDateTime'];
		$this->ConfirmQueryDateTime->DbValue = $row['ConfirmQueryDateTime'];
		$this->ConfirmedDateTime->DbValue = $row['ConfirmedDateTime'];
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
			return "tbl_smsdatalist.php";
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
		if ($pageName == "tbl_smsdataview.php")
			return $Language->phrase("View");
		elseif ($pageName == "tbl_smsdataedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tbl_smsdataadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tbl_smsdatalist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("tbl_smsdataview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tbl_smsdataview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "tbl_smsdataadd.php?" . $this->getUrlParm($parm);
		else
			$url = "tbl_smsdataadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tbl_smsdataedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("tbl_smsdataadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("tbl_smsdatadelete.php", $this->getUrlParm());
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
		$this->StationId->setDbValue($rs->fields('StationId'));
		$this->SubDivId->setDbValue($rs->fields('SubDivId'));
		$this->SendDateTime->setDbValue($rs->fields('SendDateTime'));
		$this->rainfall->setDbValue($rs->fields('rainfall'));
		$this->obsremarks->setDbValue($rs->fields('obsremarks'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->Validated->setDbValue($rs->fields('Validated'));
		$this->SenderMobileNumber->setDbValue($rs->fields('SenderMobileNumber'));
		$this->IsFirstMsg->setDbValue($rs->fields('IsFirstMsg'));
		$this->SMSText->setDbValue($rs->fields('SMSText'));
		$this->isFreeze->setDbValue($rs->fields('isFreeze'));
		$this->SystemDateTime->setDbValue($rs->fields('SystemDateTime'));
		$this->ConfirmQueryDateTime->setDbValue($rs->fields('ConfirmQueryDateTime'));
		$this->ConfirmedDateTime->setDbValue($rs->fields('ConfirmedDateTime'));
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
		// StationId
		// SubDivId
		// SendDateTime
		// rainfall
		// obsremarks
		// Status
		// Validated
		// SenderMobileNumber
		// IsFirstMsg
		// SMSText
		// isFreeze
		// SystemDateTime
		// ConfirmQueryDateTime
		// ConfirmedDateTime
		// Slno

		$this->Slno->ViewValue = $this->Slno->CurrentValue;
		$this->Slno->ViewValue = FormatNumber($this->Slno->ViewValue, 0, -2, -2, -2);
		$this->Slno->ViewCustomAttributes = "";

		// SMSDateTime
		$this->SMSDateTime->ViewValue = $this->SMSDateTime->CurrentValue;
		$this->SMSDateTime->ViewValue = FormatDateTime($this->SMSDateTime->ViewValue, 7);
		$this->SMSDateTime->ViewCustomAttributes = "";

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

		// SendDateTime
		$this->SendDateTime->ViewValue = $this->SendDateTime->CurrentValue;
		$this->SendDateTime->ViewValue = FormatDateTime($this->SendDateTime->ViewValue, 7);
		$this->SendDateTime->ViewCustomAttributes = "";

		// rainfall
		$this->rainfall->ViewValue = $this->rainfall->CurrentValue;
		$this->rainfall->ViewValue = FormatNumber($this->rainfall->ViewValue, 2, -2, -2, -2);
		$this->rainfall->ViewCustomAttributes = "";

		// obsremarks
		$this->obsremarks->ViewValue = $this->obsremarks->CurrentValue;
		$this->obsremarks->ViewCustomAttributes = "";

		// Status
		$curVal = strval($this->Status->CurrentValue);
		if ($curVal != "") {
			$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
			if ($this->Status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Status`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Status->ViewValue = $this->Status->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Status->ViewValue = $this->Status->CurrentValue;
				}
			}
		} else {
			$this->Status->ViewValue = NULL;
		}
		$this->Status->ViewCustomAttributes = "";

		// Validated
		$curVal = strval($this->Validated->CurrentValue);
		if ($curVal != "") {
			$this->Validated->ViewValue = $this->Validated->lookupCacheOption($curVal);
			if ($this->Validated->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`validated`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Validated->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Validated->ViewValue = $this->Validated->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Validated->ViewValue = $this->Validated->CurrentValue;
				}
			}
		} else {
			$this->Validated->ViewValue = NULL;
		}
		$this->Validated->ViewCustomAttributes = "";

		// SenderMobileNumber
		$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
		$this->SenderMobileNumber->ViewCustomAttributes = "";

		// IsFirstMsg
		$curVal = strval($this->IsFirstMsg->CurrentValue);
		if ($curVal != "") {
			$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->lookupCacheOption($curVal);
			if ($this->IsFirstMsg->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`isFirstMsg`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->IsFirstMsg->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->IsFirstMsg->ViewValue = $this->IsFirstMsg->CurrentValue;
				}
			}
		} else {
			$this->IsFirstMsg->ViewValue = NULL;
		}
		$this->IsFirstMsg->ViewCustomAttributes = "";

		// SMSText
		$this->SMSText->ViewValue = $this->SMSText->CurrentValue;
		$this->SMSText->ViewCustomAttributes = "";

		// isFreeze
		if (ConvertToBool($this->isFreeze->CurrentValue)) {
			$this->isFreeze->ViewValue = $this->isFreeze->tagCaption(1) != "" ? $this->isFreeze->tagCaption(1) : "Yes";
		} else {
			$this->isFreeze->ViewValue = $this->isFreeze->tagCaption(2) != "" ? $this->isFreeze->tagCaption(2) : "No";
		}
		$this->isFreeze->ViewCustomAttributes = "";

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

		// Slno
		$this->Slno->LinkCustomAttributes = "";
		$this->Slno->HrefValue = "";
		$this->Slno->TooltipValue = "";

		// SMSDateTime
		$this->SMSDateTime->LinkCustomAttributes = "";
		$this->SMSDateTime->HrefValue = "";
		$this->SMSDateTime->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// SubDivId
		$this->SubDivId->LinkCustomAttributes = "";
		$this->SubDivId->HrefValue = "";
		$this->SubDivId->TooltipValue = "";

		// SendDateTime
		$this->SendDateTime->LinkCustomAttributes = "";
		$this->SendDateTime->HrefValue = "";
		$this->SendDateTime->TooltipValue = "";

		// rainfall
		$this->rainfall->LinkCustomAttributes = "";
		$this->rainfall->HrefValue = "";
		$this->rainfall->TooltipValue = "";

		// obsremarks
		$this->obsremarks->LinkCustomAttributes = "";
		$this->obsremarks->HrefValue = "";
		$this->obsremarks->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// Validated
		$this->Validated->LinkCustomAttributes = "";
		$this->Validated->HrefValue = "";
		$this->Validated->TooltipValue = "";

		// SenderMobileNumber
		$this->SenderMobileNumber->LinkCustomAttributes = "";
		$this->SenderMobileNumber->HrefValue = "";
		$this->SenderMobileNumber->TooltipValue = "";

		// IsFirstMsg
		$this->IsFirstMsg->LinkCustomAttributes = "";
		$this->IsFirstMsg->HrefValue = "";
		$this->IsFirstMsg->TooltipValue = "";

		// SMSText
		$this->SMSText->LinkCustomAttributes = "";
		$this->SMSText->HrefValue = "";
		$this->SMSText->TooltipValue = "";

		// isFreeze
		$this->isFreeze->LinkCustomAttributes = "";
		$this->isFreeze->HrefValue = "";
		$this->isFreeze->TooltipValue = "";

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
		$this->Slno->EditValue = FormatNumber($this->Slno->EditValue, 0, -2, -2, -2);
		$this->Slno->ViewCustomAttributes = "";

		// SMSDateTime
		$this->SMSDateTime->EditAttrs["class"] = "form-control";
		$this->SMSDateTime->EditCustomAttributes = "";
		$this->SMSDateTime->EditValue = FormatDateTime($this->SMSDateTime->CurrentValue, 7);

		// StationId
		$this->StationId->EditAttrs["class"] = "form-control";
		$this->StationId->EditCustomAttributes = "";

		// SubDivId
		$this->SubDivId->EditAttrs["class"] = "form-control";
		$this->SubDivId->EditCustomAttributes = "";

		// SendDateTime
		$this->SendDateTime->EditAttrs["class"] = "form-control";
		$this->SendDateTime->EditCustomAttributes = "";
		$this->SendDateTime->EditValue = FormatDateTime($this->SendDateTime->CurrentValue, 7);

		// rainfall
		$this->rainfall->EditAttrs["class"] = "form-control";
		$this->rainfall->EditCustomAttributes = "";
		$this->rainfall->EditValue = $this->rainfall->CurrentValue;
		if (strval($this->rainfall->EditValue) != "" && is_numeric($this->rainfall->EditValue))
			$this->rainfall->EditValue = FormatNumber($this->rainfall->EditValue, -2, -2, -2, -2);
		

		// obsremarks
		$this->obsremarks->EditAttrs["class"] = "form-control";
		$this->obsremarks->EditCustomAttributes = "";
		if (!$this->obsremarks->Raw)
			$this->obsremarks->CurrentValue = HtmlDecode($this->obsremarks->CurrentValue);
		$this->obsremarks->EditValue = $this->obsremarks->CurrentValue;

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";

		// Validated
		$this->Validated->EditAttrs["class"] = "form-control";
		$this->Validated->EditCustomAttributes = "";

		// SenderMobileNumber
		$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
		$this->SenderMobileNumber->EditCustomAttributes = "";
		if (!$this->SenderMobileNumber->Raw)
			$this->SenderMobileNumber->CurrentValue = HtmlDecode($this->SenderMobileNumber->CurrentValue);
		$this->SenderMobileNumber->EditValue = $this->SenderMobileNumber->CurrentValue;

		// IsFirstMsg
		$this->IsFirstMsg->EditCustomAttributes = "";

		// SMSText
		$this->SMSText->EditAttrs["class"] = "form-control";
		$this->SMSText->EditCustomAttributes = "";
		if (!$this->SMSText->Raw)
			$this->SMSText->CurrentValue = HtmlDecode($this->SMSText->CurrentValue);
		$this->SMSText->EditValue = $this->SMSText->CurrentValue;

		// isFreeze
		$this->isFreeze->EditCustomAttributes = "";
		$this->isFreeze->EditValue = $this->isFreeze->options(FALSE);

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
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->SubDivId);
					$doc->exportCaption($this->SendDateTime);
					$doc->exportCaption($this->rainfall);
					$doc->exportCaption($this->obsremarks);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->Validated);
					$doc->exportCaption($this->SenderMobileNumber);
					$doc->exportCaption($this->IsFirstMsg);
					$doc->exportCaption($this->SMSText);
					$doc->exportCaption($this->isFreeze);
					$doc->exportCaption($this->SystemDateTime);
					$doc->exportCaption($this->ConfirmQueryDateTime);
					$doc->exportCaption($this->ConfirmedDateTime);
				} else {
					$doc->exportCaption($this->Slno);
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->SubDivId);
					$doc->exportCaption($this->SendDateTime);
					$doc->exportCaption($this->rainfall);
					$doc->exportCaption($this->obsremarks);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->Validated);
					$doc->exportCaption($this->SenderMobileNumber);
					$doc->exportCaption($this->IsFirstMsg);
					$doc->exportCaption($this->SMSText);
					$doc->exportCaption($this->isFreeze);
					$doc->exportCaption($this->SystemDateTime);
					$doc->exportCaption($this->ConfirmQueryDateTime);
					$doc->exportCaption($this->ConfirmedDateTime);
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
						$doc->exportField($this->StationId);
						$doc->exportField($this->SubDivId);
						$doc->exportField($this->SendDateTime);
						$doc->exportField($this->rainfall);
						$doc->exportField($this->obsremarks);
						$doc->exportField($this->Status);
						$doc->exportField($this->Validated);
						$doc->exportField($this->SenderMobileNumber);
						$doc->exportField($this->IsFirstMsg);
						$doc->exportField($this->SMSText);
						$doc->exportField($this->isFreeze);
						$doc->exportField($this->SystemDateTime);
						$doc->exportField($this->ConfirmQueryDateTime);
						$doc->exportField($this->ConfirmedDateTime);
					} else {
						$doc->exportField($this->Slno);
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->StationId);
						$doc->exportField($this->SubDivId);
						$doc->exportField($this->SendDateTime);
						$doc->exportField($this->rainfall);
						$doc->exportField($this->obsremarks);
						$doc->exportField($this->Status);
						$doc->exportField($this->Validated);
						$doc->exportField($this->SenderMobileNumber);
						$doc->exportField($this->IsFirstMsg);
						$doc->exportField($this->SMSText);
						$doc->exportField($this->isFreeze);
						$doc->exportField($this->SystemDateTime);
						$doc->exportField($this->ConfirmQueryDateTime);
						$doc->exportField($this->ConfirmedDateTime);
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

		 if ($rsnew["rainfall"] > 1000.1) {

			// To cancel, set return value to False
			 $this->CancelMessage = "The rainfall at station can not be more than 1000.";
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