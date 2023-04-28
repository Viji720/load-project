<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for vw_rpt_rainfall
 */
class vw_rpt_rainfall extends DbTable
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
	public $DistrictId;
	public $TalukID;
	public $StationCode;
	public $StationName;
	public $SubDivisionId;
	public $BasinId;
	public $SubBasinId;
	public $SMSDateTime;
	public $Rainfall;
	public $Status;
	public $Validated;
	public $MobileNumber;
	public $IsActive;
	public $DivisionId;
	public $StationName_kn;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'vw_rpt_rainfall';
		$this->TableName = 'vw_rpt_rainfall';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`vw_rpt_rainfall`";
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
		$this->Slno = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_Slno', 'Slno', '`Slno`', '`Slno`', 3, 11, -1, FALSE, '`Slno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Slno->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Slno->IsPrimaryKey = TRUE; // Primary key field
		$this->Slno->Sortable = TRUE; // Allow sort
		$this->Slno->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Slno'] = &$this->Slno;

		// StationId
		$this->StationId = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationId->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->StationId->Lookup = new Lookup('StationId', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;

		// DistrictId
		$this->DistrictId = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_DistrictId', 'DistrictId', '`DistrictId`', '`DistrictId`', 3, 11, -1, FALSE, '`DistrictId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DistrictId->Sortable = TRUE; // Allow sort
		$this->DistrictId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DistrictId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->DistrictId->Lookup = new Lookup('DistrictId', 'master_district', FALSE, 'DistrictId', ["DistrictName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->DistrictId->Lookup = new Lookup('DistrictId', 'master_district', FALSE, 'DistrictId', ["DistrictName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->DistrictId->Lookup = new Lookup('DistrictId', 'master_district', FALSE, 'DistrictId', ["DistrictName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->DistrictId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DistrictId'] = &$this->DistrictId;

		// TalukID
		$this->TalukID = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_TalukID', 'TalukID', '`TalukID`', '`TalukID`', 3, 11, -1, FALSE, '`TalukID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TalukID->Sortable = TRUE; // Allow sort
		$this->TalukID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TalukID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->TalukID->Lookup = new Lookup('TalukID', 'master_taluk', FALSE, 'TalukId', ["TalukName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->TalukID->Lookup = new Lookup('TalukID', 'master_taluk', FALSE, 'TalukId', ["TalukName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->TalukID->Lookup = new Lookup('TalukID', 'master_taluk', FALSE, 'TalukId', ["TalukName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->TalukID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TalukID'] = &$this->TalukID;

		// StationCode
		$this->StationCode = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_StationCode', 'StationCode', '`StationCode`', '`StationCode`', 3, 11, -1, FALSE, '`StationCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->StationCode->Sortable = TRUE; // Allow sort
		$this->StationCode->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->StationCode->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->StationCode->Lookup = new Lookup('StationCode', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '`StationName`', '');
				break;
			case "kn":
				$this->StationCode->Lookup = new Lookup('StationCode', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '`StationName`', '');
				break;
			default:
				$this->StationCode->Lookup = new Lookup('StationCode', 'master_station', FALSE, 'StationId', ["StationName","","",""], [], [], [], [], [], [], '`StationName`', '');
				break;
		}
		$this->StationCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationCode'] = &$this->StationCode;

		// StationName
		$this->StationName = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_StationName', 'StationName', '`StationName`', '`StationName`', 200, 30, -1, FALSE, '`StationName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName->Sortable = TRUE; // Allow sort
		$this->fields['StationName'] = &$this->StationName;

		// SubDivisionId
		$this->SubDivisionId = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_SubDivisionId', 'SubDivisionId', '`SubDivisionId`', '`SubDivisionId`', 3, 11, -1, FALSE, '`SubDivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
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

		// BasinId
		$this->BasinId = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_BasinId', 'BasinId', '`BasinId`', '`BasinId`', 3, 11, -1, FALSE, '`BasinId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->BasinId->Sortable = TRUE; // Allow sort
		$this->BasinId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->BasinId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->BasinId->Lookup = new Lookup('BasinId', 'master_basin', FALSE, 'BasinId', ["BasinName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->BasinId->Lookup = new Lookup('BasinId', 'master_basin', FALSE, 'BasinId', ["BasinName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->BasinId->Lookup = new Lookup('BasinId', 'master_basin', FALSE, 'BasinId', ["BasinName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->BasinId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BasinId'] = &$this->BasinId;

		// SubBasinId
		$this->SubBasinId = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_SubBasinId', 'SubBasinId', '`SubBasinId`', '`SubBasinId`', 3, 11, -1, FALSE, '`SubBasinId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubBasinId->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->SubBasinId->Lookup = new Lookup('SubBasinId', 'master_subbasin', FALSE, 'SubBasinId', ["SubBasinName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->SubBasinId->Lookup = new Lookup('SubBasinId', 'master_subbasin', FALSE, 'SubBasinId', ["SubBasinName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->SubBasinId->Lookup = new Lookup('SubBasinId', 'master_subbasin', FALSE, 'SubBasinId', ["SubBasinName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->SubBasinId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubBasinId'] = &$this->SubBasinId;

		// SMSDateTime
		$this->SMSDateTime = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_SMSDateTime', 'SMSDateTime', '`SMSDateTime`', CastDateFieldForLike("`SMSDateTime`", 7, "DB"), 135, 19, 7, FALSE, '`SMSDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMSDateTime->Sortable = TRUE; // Allow sort
		$this->SMSDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['SMSDateTime'] = &$this->SMSDateTime;

		// Rainfall
		$this->Rainfall = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_Rainfall', 'Rainfall', '`Rainfall`', '`Rainfall`', 4, 7, -1, FALSE, '`Rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Rainfall->Sortable = TRUE; // Allow sort
		$this->Rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Rainfall'] = &$this->Rainfall;

		// Status
		$this->Status = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_Status', 'Status', '`Status`', '`Status`', 3, 11, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
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
		$this->Validated = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_Validated', 'Validated', '`Validated`', '`Validated`', 3, 11, -1, FALSE, '`Validated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
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

		// MobileNumber
		$this->MobileNumber = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 15, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// IsActive
		$this->IsActive = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_IsActive', 'IsActive', '`IsActive`', '`IsActive`', 200, 1, -1, FALSE, '`IsActive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->IsActive->Nullable = FALSE; // NOT NULL field
		$this->IsActive->Sortable = TRUE; // Allow sort
		$this->IsActive->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->IsActive->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->IsActive->Lookup = new Lookup('IsActive', 'vw_rpt_rainfall', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->IsActive->Lookup = new Lookup('IsActive', 'vw_rpt_rainfall', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->IsActive->Lookup = new Lookup('IsActive', 'vw_rpt_rainfall', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->IsActive->OptionCount = 2;
		$this->fields['IsActive'] = &$this->IsActive;

		// DivisionId
		$this->DivisionId = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_DivisionId', 'DivisionId', '`DivisionId`', '`DivisionId`', 3, 11, -1, FALSE, '`DivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DivisionId->Sortable = TRUE; // Allow sort
		$this->DivisionId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DivisionId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->DivisionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DivisionId'] = &$this->DivisionId;

		// StationName_kn
		$this->StationName_kn = new DbField('vw_rpt_rainfall', 'vw_rpt_rainfall', 'x_StationName_kn', 'StationName_kn', '`StationName_kn`', '`StationName_kn`', 200, 30, -1, FALSE, '`StationName_kn`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName_kn->Sortable = TRUE; // Allow sort
		$this->fields['StationName_kn'] = &$this->StationName_kn;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`vw_rpt_rainfall`";
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
		$this->StationId->DbValue = $row['StationId'];
		$this->DistrictId->DbValue = $row['DistrictId'];
		$this->TalukID->DbValue = $row['TalukID'];
		$this->StationCode->DbValue = $row['StationCode'];
		$this->StationName->DbValue = $row['StationName'];
		$this->SubDivisionId->DbValue = $row['SubDivisionId'];
		$this->BasinId->DbValue = $row['BasinId'];
		$this->SubBasinId->DbValue = $row['SubBasinId'];
		$this->SMSDateTime->DbValue = $row['SMSDateTime'];
		$this->Rainfall->DbValue = $row['Rainfall'];
		$this->Status->DbValue = $row['Status'];
		$this->Validated->DbValue = $row['Validated'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->IsActive->DbValue = $row['IsActive'];
		$this->DivisionId->DbValue = $row['DivisionId'];
		$this->StationName_kn->DbValue = $row['StationName_kn'];
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
			return "vw_rpt_rainfalllist.php";
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
		if ($pageName == "vw_rpt_rainfallview.php")
			return $Language->phrase("View");
		elseif ($pageName == "vw_rpt_rainfalledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "vw_rpt_rainfalladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "vw_rpt_rainfalllist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("vw_rpt_rainfallview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("vw_rpt_rainfallview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "vw_rpt_rainfalladd.php?" . $this->getUrlParm($parm);
		else
			$url = "vw_rpt_rainfalladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("vw_rpt_rainfalledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("vw_rpt_rainfalladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("vw_rpt_rainfalldelete.php", $this->getUrlParm());
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
		$this->DistrictId->setDbValue($rs->fields('DistrictId'));
		$this->TalukID->setDbValue($rs->fields('TalukID'));
		$this->StationCode->setDbValue($rs->fields('StationCode'));
		$this->StationName->setDbValue($rs->fields('StationName'));
		$this->SubDivisionId->setDbValue($rs->fields('SubDivisionId'));
		$this->BasinId->setDbValue($rs->fields('BasinId'));
		$this->SubBasinId->setDbValue($rs->fields('SubBasinId'));
		$this->SMSDateTime->setDbValue($rs->fields('SMSDateTime'));
		$this->Rainfall->setDbValue($rs->fields('Rainfall'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->Validated->setDbValue($rs->fields('Validated'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->IsActive->setDbValue($rs->fields('IsActive'));
		$this->DivisionId->setDbValue($rs->fields('DivisionId'));
		$this->StationName_kn->setDbValue($rs->fields('StationName_kn'));
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
		// DistrictId
		// TalukID
		// StationCode
		// StationName
		// SubDivisionId
		// BasinId
		// SubBasinId
		// SMSDateTime
		// Rainfall
		// Status
		// Validated
		// MobileNumber
		// IsActive
		// DivisionId
		// StationName_kn
		// Slno

		$this->Slno->ViewValue = $this->Slno->CurrentValue;
		$this->Slno->ViewCustomAttributes = "";

		// StationId
		$this->StationId->ViewValue = $this->StationId->CurrentValue;
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

		// DistrictId
		$curVal = strval($this->DistrictId->CurrentValue);
		if ($curVal != "") {
			$this->DistrictId->ViewValue = $this->DistrictId->lookupCacheOption($curVal);
			if ($this->DistrictId->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`DistrictId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->DistrictId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->DistrictId->ViewValue = $this->DistrictId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DistrictId->ViewValue = $this->DistrictId->CurrentValue;
				}
			}
		} else {
			$this->DistrictId->ViewValue = NULL;
		}
		$this->DistrictId->ViewCustomAttributes = "";

		// TalukID
		$curVal = strval($this->TalukID->CurrentValue);
		if ($curVal != "") {
			$this->TalukID->ViewValue = $this->TalukID->lookupCacheOption($curVal);
			if ($this->TalukID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TalukId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->TalukID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TalukID->ViewValue = $this->TalukID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TalukID->ViewValue = $this->TalukID->CurrentValue;
				}
			}
		} else {
			$this->TalukID->ViewValue = NULL;
		}
		$this->TalukID->ViewCustomAttributes = "";

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

		// BasinId
		$curVal = strval($this->BasinId->CurrentValue);
		if ($curVal != "") {
			$this->BasinId->ViewValue = $this->BasinId->lookupCacheOption($curVal);
			if ($this->BasinId->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`BasinId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->BasinId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->BasinId->ViewValue = $this->BasinId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->BasinId->ViewValue = $this->BasinId->CurrentValue;
				}
			}
		} else {
			$this->BasinId->ViewValue = NULL;
		}
		$this->BasinId->ViewCustomAttributes = "";

		// SubBasinId
		$this->SubBasinId->ViewValue = $this->SubBasinId->CurrentValue;
		$curVal = strval($this->SubBasinId->CurrentValue);
		if ($curVal != "") {
			$this->SubBasinId->ViewValue = $this->SubBasinId->lookupCacheOption($curVal);
			if ($this->SubBasinId->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`SubBasinId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->SubBasinId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->SubBasinId->ViewValue = $this->SubBasinId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->SubBasinId->ViewValue = $this->SubBasinId->CurrentValue;
				}
			}
		} else {
			$this->SubBasinId->ViewValue = NULL;
		}
		$this->SubBasinId->ViewCustomAttributes = "";

		// SMSDateTime
		$this->SMSDateTime->ViewValue = $this->SMSDateTime->CurrentValue;
		$this->SMSDateTime->ViewValue = FormatDateTime($this->SMSDateTime->ViewValue, 7);
		$this->SMSDateTime->ViewCustomAttributes = "";

		// Rainfall
		$this->Rainfall->ViewValue = $this->Rainfall->CurrentValue;
		$this->Rainfall->ViewValue = FormatNumber($this->Rainfall->ViewValue, 2, -2, -2, -2);
		$this->Rainfall->CellCssStyle .= "text-align: right;";
		$this->Rainfall->ViewCustomAttributes = "";

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

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// IsActive
		if (strval($this->IsActive->CurrentValue) != "") {
			$this->IsActive->ViewValue = $this->IsActive->optionCaption($this->IsActive->CurrentValue);
		} else {
			$this->IsActive->ViewValue = NULL;
		}
		$this->IsActive->ViewCustomAttributes = "";

		// DivisionId
		$this->DivisionId->ViewValue = FormatNumber($this->DivisionId->ViewValue, 0, -2, -2, -2);
		$this->DivisionId->ViewCustomAttributes = "";

		// StationName_kn
		$this->StationName_kn->ViewValue = $this->StationName_kn->CurrentValue;
		$this->StationName_kn->ViewCustomAttributes = "";

		// Slno
		$this->Slno->LinkCustomAttributes = "";
		$this->Slno->HrefValue = "";
		$this->Slno->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// DistrictId
		$this->DistrictId->LinkCustomAttributes = "";
		$this->DistrictId->HrefValue = "";
		$this->DistrictId->TooltipValue = "";

		// TalukID
		$this->TalukID->LinkCustomAttributes = "";
		$this->TalukID->HrefValue = "";
		$this->TalukID->TooltipValue = "";

		// StationCode
		$this->StationCode->LinkCustomAttributes = "";
		$this->StationCode->HrefValue = "";
		$this->StationCode->TooltipValue = "";

		// StationName
		$this->StationName->LinkCustomAttributes = "";
		$this->StationName->HrefValue = "";
		$this->StationName->TooltipValue = "";

		// SubDivisionId
		$this->SubDivisionId->LinkCustomAttributes = "";
		$this->SubDivisionId->HrefValue = "";
		$this->SubDivisionId->TooltipValue = "";

		// BasinId
		$this->BasinId->LinkCustomAttributes = "";
		$this->BasinId->HrefValue = "";
		$this->BasinId->TooltipValue = "";

		// SubBasinId
		$this->SubBasinId->LinkCustomAttributes = "";
		$this->SubBasinId->HrefValue = "";
		$this->SubBasinId->TooltipValue = "";

		// SMSDateTime
		$this->SMSDateTime->LinkCustomAttributes = "";
		$this->SMSDateTime->HrefValue = "";
		$this->SMSDateTime->TooltipValue = "";

		// Rainfall
		$this->Rainfall->LinkCustomAttributes = "";
		$this->Rainfall->HrefValue = "";
		$this->Rainfall->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// Validated
		$this->Validated->LinkCustomAttributes = "";
		$this->Validated->HrefValue = "";
		$this->Validated->TooltipValue = "";

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// IsActive
		$this->IsActive->LinkCustomAttributes = "";
		$this->IsActive->HrefValue = "";
		$this->IsActive->TooltipValue = "";

		// DivisionId
		$this->DivisionId->LinkCustomAttributes = "";
		$this->DivisionId->HrefValue = "";
		$this->DivisionId->TooltipValue = "";

		// StationName_kn
		$this->StationName_kn->LinkCustomAttributes = "";
		$this->StationName_kn->HrefValue = "";
		$this->StationName_kn->TooltipValue = "";

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
		$this->StationId->EditValue = $this->StationId->CurrentValue;

		// DistrictId
		$this->DistrictId->EditAttrs["class"] = "form-control";
		$this->DistrictId->EditCustomAttributes = "";

		// TalukID
		$this->TalukID->EditAttrs["class"] = "form-control";
		$this->TalukID->EditCustomAttributes = "";

		// StationCode
		$this->StationCode->EditAttrs["class"] = "form-control";
		$this->StationCode->EditCustomAttributes = "";

		// StationName
		$this->StationName->EditAttrs["class"] = "form-control";
		$this->StationName->EditCustomAttributes = "";
		if (!$this->StationName->Raw)
			$this->StationName->CurrentValue = HtmlDecode($this->StationName->CurrentValue);
		$this->StationName->EditValue = $this->StationName->CurrentValue;

		// SubDivisionId
		$this->SubDivisionId->EditAttrs["class"] = "form-control";
		$this->SubDivisionId->EditCustomAttributes = "";

		// BasinId
		$this->BasinId->EditAttrs["class"] = "form-control";
		$this->BasinId->EditCustomAttributes = "";

		// SubBasinId
		$this->SubBasinId->EditAttrs["class"] = "form-control";
		$this->SubBasinId->EditCustomAttributes = "";
		$this->SubBasinId->EditValue = $this->SubBasinId->CurrentValue;

		// SMSDateTime
		$this->SMSDateTime->EditAttrs["class"] = "form-control";
		$this->SMSDateTime->EditCustomAttributes = "";
		$this->SMSDateTime->EditValue = FormatDateTime($this->SMSDateTime->CurrentValue, 7);

		// Rainfall
		$this->Rainfall->EditAttrs["class"] = "form-control";
		$this->Rainfall->EditCustomAttributes = "";
		$this->Rainfall->EditValue = $this->Rainfall->CurrentValue;
		if (strval($this->Rainfall->EditValue) != "" && is_numeric($this->Rainfall->EditValue))
			$this->Rainfall->EditValue = FormatNumber($this->Rainfall->EditValue, -2, -2, -2, -2);
		

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";

		// Validated
		$this->Validated->EditAttrs["class"] = "form-control";
		$this->Validated->EditCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (!$this->MobileNumber->Raw)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;

		// IsActive
		$this->IsActive->EditAttrs["class"] = "form-control";
		$this->IsActive->EditCustomAttributes = "";
		$this->IsActive->EditValue = $this->IsActive->options(TRUE);

		// DivisionId
		$this->DivisionId->EditAttrs["class"] = "form-control";
		$this->DivisionId->EditCustomAttributes = "";

		// StationName_kn
		$this->StationName_kn->EditAttrs["class"] = "form-control";
		$this->StationName_kn->EditCustomAttributes = "";
		if (!$this->StationName_kn->Raw)
			$this->StationName_kn->CurrentValue = HtmlDecode($this->StationName_kn->CurrentValue);
		$this->StationName_kn->EditValue = $this->StationName_kn->CurrentValue;

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
					$doc->exportCaption($this->DistrictId);
					$doc->exportCaption($this->TalukID);
					$doc->exportCaption($this->StationCode);
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->BasinId);
					$doc->exportCaption($this->SubBasinId);
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->Rainfall);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->Validated);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->IsActive);
					$doc->exportCaption($this->DivisionId);
					$doc->exportCaption($this->StationName_kn);
				} else {
					$doc->exportCaption($this->Slno);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->DistrictId);
					$doc->exportCaption($this->TalukID);
					$doc->exportCaption($this->StationCode);
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->BasinId);
					$doc->exportCaption($this->SubBasinId);
					$doc->exportCaption($this->SMSDateTime);
					$doc->exportCaption($this->Rainfall);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->Validated);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->IsActive);
					$doc->exportCaption($this->DivisionId);
					$doc->exportCaption($this->StationName_kn);
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
						$doc->exportField($this->DistrictId);
						$doc->exportField($this->TalukID);
						$doc->exportField($this->StationCode);
						$doc->exportField($this->StationName);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->BasinId);
						$doc->exportField($this->SubBasinId);
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->Rainfall);
						$doc->exportField($this->Status);
						$doc->exportField($this->Validated);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->IsActive);
						$doc->exportField($this->DivisionId);
						$doc->exportField($this->StationName_kn);
					} else {
						$doc->exportField($this->Slno);
						$doc->exportField($this->StationId);
						$doc->exportField($this->DistrictId);
						$doc->exportField($this->TalukID);
						$doc->exportField($this->StationCode);
						$doc->exportField($this->StationName);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->BasinId);
						$doc->exportField($this->SubBasinId);
						$doc->exportField($this->SMSDateTime);
						$doc->exportField($this->Rainfall);
						$doc->exportField($this->Status);
						$doc->exportField($this->Validated);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->IsActive);
						$doc->exportField($this->DivisionId);
						$doc->exportField($this->StationName_kn);
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