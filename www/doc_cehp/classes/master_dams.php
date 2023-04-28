<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for master_dams
 */
class master_dams extends DbTable
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
	public $SrNo;
	public $PIC;
	public $kpcl_ID;
	public $Name_of_Dam;
	public $kpcl_dam_name;
	public $Ops_ID;
	public $dam_size_type_ID;
	public $dam_Longitude;
	public $dam_Latitude;
	public $Year_of_Completion;
	public $Basin;
	public $Sub_Basin;
	public $district;
	public $Taluka;
	public $River;
	public $Neareast_City;
	public $dam_construction_type;
	public $Height_above_Lowest_Foundation_Level_in_mtr;
	public $Length_of_Dam_in_mtr;
	public $Volume_Content_of_Dam_in_MCM;
	public $Gross_Storage_Capacity_of_Dam_in_MCM;
	public $Reservoir_Area_in_sq_km;
	public $Effective_Storage_Capacity_in_MCM;
	public $Purpose;
	public $Designed_Spillway_Capacity_in_M3_per_sec;
	public $dam_construction_type_ID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'master_dams';
		$this->TableName = 'master_dams';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`master_dams`";
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

		// SrNo
		$this->SrNo = new DbField('master_dams', 'master_dams', 'x_SrNo', 'SrNo', '`SrNo`', '`SrNo`', 3, 11, -1, FALSE, '`SrNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SrNo->Sortable = TRUE; // Allow sort
		$this->SrNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SrNo'] = &$this->SrNo;

		// PIC
		$this->PIC = new DbField('master_dams', 'master_dams', 'x_PIC', 'PIC', '`PIC`', '`PIC`', 200, 12, -1, FALSE, '`PIC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PIC->IsPrimaryKey = TRUE; // Primary key field
		$this->PIC->Nullable = FALSE; // NOT NULL field
		$this->PIC->Required = TRUE; // Required field
		$this->PIC->Sortable = TRUE; // Allow sort
		$this->fields['PIC'] = &$this->PIC;

		// kpcl_ID
		$this->kpcl_ID = new DbField('master_dams', 'master_dams', 'x_kpcl_ID', 'kpcl_ID', '`kpcl_ID`', '`kpcl_ID`', 200, 10, -1, FALSE, '`kpcl_ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kpcl_ID->Sortable = TRUE; // Allow sort
		$this->fields['kpcl_ID'] = &$this->kpcl_ID;

		// Name_of_Dam
		$this->Name_of_Dam = new DbField('master_dams', 'master_dams', 'x_Name_of_Dam', 'Name_of_Dam', '`Name_of_Dam`', '`Name_of_Dam`', 200, 255, -1, FALSE, '`Name_of_Dam`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name_of_Dam->Sortable = TRUE; // Allow sort
		$this->fields['Name_of_Dam'] = &$this->Name_of_Dam;

		// kpcl_dam_name
		$this->kpcl_dam_name = new DbField('master_dams', 'master_dams', 'x_kpcl_dam_name', 'kpcl_dam_name', '`kpcl_dam_name`', '`kpcl_dam_name`', 200, 25, -1, FALSE, '`kpcl_dam_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kpcl_dam_name->Sortable = TRUE; // Allow sort
		$this->fields['kpcl_dam_name'] = &$this->kpcl_dam_name;

		// Ops_ID
		$this->Ops_ID = new DbField('master_dams', 'master_dams', 'x_Ops_ID', 'Ops_ID', '`Ops_ID`', '`Ops_ID`', 200, 10, -1, FALSE, '`Ops_ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Ops_ID->Sortable = TRUE; // Allow sort
		$this->fields['Ops_ID'] = &$this->Ops_ID;

		// dam_size_type_ID
		$this->dam_size_type_ID = new DbField('master_dams', 'master_dams', 'x_dam_size_type_ID', 'dam_size_type_ID', '`dam_size_type_ID`', '`dam_size_type_ID`', 200, 10, -1, FALSE, '`dam_size_type_ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dam_size_type_ID->Sortable = TRUE; // Allow sort
		$this->fields['dam_size_type_ID'] = &$this->dam_size_type_ID;

		// dam_Longitude
		$this->dam_Longitude = new DbField('master_dams', 'master_dams', 'x_dam_Longitude', 'dam_Longitude', '`dam_Longitude`', '`dam_Longitude`', 4, 12, -1, FALSE, '`dam_Longitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dam_Longitude->Sortable = TRUE; // Allow sort
		$this->dam_Longitude->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['dam_Longitude'] = &$this->dam_Longitude;

		// dam_Latitude
		$this->dam_Latitude = new DbField('master_dams', 'master_dams', 'x_dam_Latitude', 'dam_Latitude', '`dam_Latitude`', '`dam_Latitude`', 4, 12, -1, FALSE, '`dam_Latitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dam_Latitude->Sortable = TRUE; // Allow sort
		$this->dam_Latitude->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['dam_Latitude'] = &$this->dam_Latitude;

		// Year_of_Completion
		$this->Year_of_Completion = new DbField('master_dams', 'master_dams', 'x_Year_of_Completion', 'Year_of_Completion', '`Year_of_Completion`', '`Year_of_Completion`', 200, 4, -1, FALSE, '`Year_of_Completion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Year_of_Completion->Sortable = TRUE; // Allow sort
		$this->fields['Year_of_Completion'] = &$this->Year_of_Completion;

		// Basin
		$this->Basin = new DbField('master_dams', 'master_dams', 'x_Basin', 'Basin', '`Basin`', '`Basin`', 200, 100, -1, FALSE, '`Basin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Basin->Sortable = TRUE; // Allow sort
		$this->fields['Basin'] = &$this->Basin;

		// Sub-Basin
		$this->Sub_Basin = new DbField('master_dams', 'master_dams', 'x_Sub_Basin', 'Sub-Basin', '`Sub-Basin`', '`Sub-Basin`', 200, 100, -1, FALSE, '`Sub-Basin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sub_Basin->Sortable = TRUE; // Allow sort
		$this->fields['Sub-Basin'] = &$this->Sub_Basin;

		// district
		$this->district = new DbField('master_dams', 'master_dams', 'x_district', 'district', '`district`', '`district`', 200, 100, -1, FALSE, '`district`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->district->Sortable = TRUE; // Allow sort
		$this->fields['district'] = &$this->district;

		// Taluka
		$this->Taluka = new DbField('master_dams', 'master_dams', 'x_Taluka', 'Taluka', '`Taluka`', '`Taluka`', 200, 100, -1, FALSE, '`Taluka`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Taluka->Sortable = TRUE; // Allow sort
		$this->fields['Taluka'] = &$this->Taluka;

		// River
		$this->River = new DbField('master_dams', 'master_dams', 'x_River', 'River', '`River`', '`River`', 200, 100, -1, FALSE, '`River`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->River->Sortable = TRUE; // Allow sort
		$this->fields['River'] = &$this->River;

		// Neareast_City
		$this->Neareast_City = new DbField('master_dams', 'master_dams', 'x_Neareast_City', 'Neareast_City', '`Neareast_City`', '`Neareast_City`', 200, 255, -1, FALSE, '`Neareast_City`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Neareast_City->Sortable = TRUE; // Allow sort
		$this->fields['Neareast_City'] = &$this->Neareast_City;

		// dam_construction_type
		$this->dam_construction_type = new DbField('master_dams', 'master_dams', 'x_dam_construction_type', 'dam_construction_type', '`dam_construction_type`', '`dam_construction_type`', 200, 50, -1, FALSE, '`dam_construction_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dam_construction_type->Sortable = TRUE; // Allow sort
		$this->fields['dam_construction_type'] = &$this->dam_construction_type;

		// Height_above_Lowest_Foundation_Level_in_mtr
		$this->Height_above_Lowest_Foundation_Level_in_mtr = new DbField('master_dams', 'master_dams', 'x_Height_above_Lowest_Foundation_Level_in_mtr', 'Height_above_Lowest_Foundation_Level_in_mtr', '`Height_above_Lowest_Foundation_Level_in_mtr`', '`Height_above_Lowest_Foundation_Level_in_mtr`', 4, 12, -1, FALSE, '`Height_above_Lowest_Foundation_Level_in_mtr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Height_above_Lowest_Foundation_Level_in_mtr->Sortable = TRUE; // Allow sort
		$this->Height_above_Lowest_Foundation_Level_in_mtr->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Height_above_Lowest_Foundation_Level_in_mtr'] = &$this->Height_above_Lowest_Foundation_Level_in_mtr;

		// Length_of_Dam_in_mtr
		$this->Length_of_Dam_in_mtr = new DbField('master_dams', 'master_dams', 'x_Length_of_Dam_in_mtr', 'Length_of_Dam_in_mtr', '`Length_of_Dam_in_mtr`', '`Length_of_Dam_in_mtr`', 4, 12, -1, FALSE, '`Length_of_Dam_in_mtr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Length_of_Dam_in_mtr->Sortable = TRUE; // Allow sort
		$this->Length_of_Dam_in_mtr->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Length_of_Dam_in_mtr'] = &$this->Length_of_Dam_in_mtr;

		// Volume_Content_of_Dam_in_MCM
		$this->Volume_Content_of_Dam_in_MCM = new DbField('master_dams', 'master_dams', 'x_Volume_Content_of_Dam_in_MCM', 'Volume_Content_of_Dam_in_MCM', '`Volume_Content_of_Dam_in_MCM`', '`Volume_Content_of_Dam_in_MCM`', 4, 12, -1, FALSE, '`Volume_Content_of_Dam_in_MCM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume_Content_of_Dam_in_MCM->Sortable = TRUE; // Allow sort
		$this->Volume_Content_of_Dam_in_MCM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Volume_Content_of_Dam_in_MCM'] = &$this->Volume_Content_of_Dam_in_MCM;

		// Gross_Storage_Capacity_of_Dam_in_MCM
		$this->Gross_Storage_Capacity_of_Dam_in_MCM = new DbField('master_dams', 'master_dams', 'x_Gross_Storage_Capacity_of_Dam_in_MCM', 'Gross_Storage_Capacity_of_Dam_in_MCM', '`Gross_Storage_Capacity_of_Dam_in_MCM`', '`Gross_Storage_Capacity_of_Dam_in_MCM`', 4, 12, -1, FALSE, '`Gross_Storage_Capacity_of_Dam_in_MCM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->Sortable = TRUE; // Allow sort
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Gross_Storage_Capacity_of_Dam_in_MCM'] = &$this->Gross_Storage_Capacity_of_Dam_in_MCM;

		// Reservoir_Area_in_sq_km
		$this->Reservoir_Area_in_sq_km = new DbField('master_dams', 'master_dams', 'x_Reservoir_Area_in_sq_km', 'Reservoir_Area_in_sq_km', '`Reservoir_Area_in_sq_km`', '`Reservoir_Area_in_sq_km`', 4, 12, -1, FALSE, '`Reservoir_Area_in_sq_km`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reservoir_Area_in_sq_km->Sortable = TRUE; // Allow sort
		$this->Reservoir_Area_in_sq_km->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Reservoir_Area_in_sq_km'] = &$this->Reservoir_Area_in_sq_km;

		// Effective_Storage_Capacity_in_MCM
		$this->Effective_Storage_Capacity_in_MCM = new DbField('master_dams', 'master_dams', 'x_Effective_Storage_Capacity_in_MCM', 'Effective_Storage_Capacity_in_MCM', '`Effective_Storage_Capacity_in_MCM`', '`Effective_Storage_Capacity_in_MCM`', 4, 12, -1, FALSE, '`Effective_Storage_Capacity_in_MCM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Effective_Storage_Capacity_in_MCM->Sortable = TRUE; // Allow sort
		$this->Effective_Storage_Capacity_in_MCM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Effective_Storage_Capacity_in_MCM'] = &$this->Effective_Storage_Capacity_in_MCM;

		// Purpose
		$this->Purpose = new DbField('master_dams', 'master_dams', 'x_Purpose', 'Purpose', '`Purpose`', '`Purpose`', 200, 50, -1, FALSE, '`Purpose`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Purpose->Sortable = TRUE; // Allow sort
		$this->fields['Purpose'] = &$this->Purpose;

		// Designed_Spillway_Capacity_in_M3_per_sec
		$this->Designed_Spillway_Capacity_in_M3_per_sec = new DbField('master_dams', 'master_dams', 'x_Designed_Spillway_Capacity_in_M3_per_sec', 'Designed_Spillway_Capacity_in_M3_per_sec', '`Designed_Spillway_Capacity_in_M3_per_sec`', '`Designed_Spillway_Capacity_in_M3_per_sec`', 4, 12, -1, FALSE, '`Designed_Spillway_Capacity_in_M3_per_sec`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Designed_Spillway_Capacity_in_M3_per_sec->Sortable = TRUE; // Allow sort
		$this->Designed_Spillway_Capacity_in_M3_per_sec->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Designed_Spillway_Capacity_in_M3_per_sec'] = &$this->Designed_Spillway_Capacity_in_M3_per_sec;

		// dam_construction_type_ID
		$this->dam_construction_type_ID = new DbField('master_dams', 'master_dams', 'x_dam_construction_type_ID', 'dam_construction_type_ID', '`dam_construction_type_ID`', '`dam_construction_type_ID`', 200, 10, -1, FALSE, '`dam_construction_type_ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dam_construction_type_ID->Sortable = TRUE; // Allow sort
		$this->fields['dam_construction_type_ID'] = &$this->dam_construction_type_ID;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`master_dams`";
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
			if (array_key_exists('PIC', $rs))
				AddFilter($where, QuotedName('PIC', $this->Dbid) . '=' . QuotedValue($rs['PIC'], $this->PIC->DataType, $this->Dbid));
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
		$this->SrNo->DbValue = $row['SrNo'];
		$this->PIC->DbValue = $row['PIC'];
		$this->kpcl_ID->DbValue = $row['kpcl_ID'];
		$this->Name_of_Dam->DbValue = $row['Name_of_Dam'];
		$this->kpcl_dam_name->DbValue = $row['kpcl_dam_name'];
		$this->Ops_ID->DbValue = $row['Ops_ID'];
		$this->dam_size_type_ID->DbValue = $row['dam_size_type_ID'];
		$this->dam_Longitude->DbValue = $row['dam_Longitude'];
		$this->dam_Latitude->DbValue = $row['dam_Latitude'];
		$this->Year_of_Completion->DbValue = $row['Year_of_Completion'];
		$this->Basin->DbValue = $row['Basin'];
		$this->Sub_Basin->DbValue = $row['Sub-Basin'];
		$this->district->DbValue = $row['district'];
		$this->Taluka->DbValue = $row['Taluka'];
		$this->River->DbValue = $row['River'];
		$this->Neareast_City->DbValue = $row['Neareast_City'];
		$this->dam_construction_type->DbValue = $row['dam_construction_type'];
		$this->Height_above_Lowest_Foundation_Level_in_mtr->DbValue = $row['Height_above_Lowest_Foundation_Level_in_mtr'];
		$this->Length_of_Dam_in_mtr->DbValue = $row['Length_of_Dam_in_mtr'];
		$this->Volume_Content_of_Dam_in_MCM->DbValue = $row['Volume_Content_of_Dam_in_MCM'];
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->DbValue = $row['Gross_Storage_Capacity_of_Dam_in_MCM'];
		$this->Reservoir_Area_in_sq_km->DbValue = $row['Reservoir_Area_in_sq_km'];
		$this->Effective_Storage_Capacity_in_MCM->DbValue = $row['Effective_Storage_Capacity_in_MCM'];
		$this->Purpose->DbValue = $row['Purpose'];
		$this->Designed_Spillway_Capacity_in_M3_per_sec->DbValue = $row['Designed_Spillway_Capacity_in_M3_per_sec'];
		$this->dam_construction_type_ID->DbValue = $row['dam_construction_type_ID'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`PIC` = '@PIC@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('PIC', $row) ? $row['PIC'] : NULL;
		else
			$val = $this->PIC->OldValue !== NULL ? $this->PIC->OldValue : $this->PIC->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@PIC@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "master_damslist.php";
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
		if ($pageName == "master_damsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "master_damsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "master_damsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "master_damslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("master_damsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("master_damsview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "master_damsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "master_damsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("master_damsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("master_damsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("master_damsdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "PIC:" . JsonEncode($this->PIC->CurrentValue, "string");
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
		if ($this->PIC->CurrentValue != NULL) {
			$url .= "PIC=" . urlencode($this->PIC->CurrentValue);
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
			if (Param("PIC") !== NULL)
				$arKeys[] = Param("PIC");
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
				$this->PIC->CurrentValue = $key;
			else
				$this->PIC->OldValue = $key;
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
		$this->SrNo->setDbValue($rs->fields('SrNo'));
		$this->PIC->setDbValue($rs->fields('PIC'));
		$this->kpcl_ID->setDbValue($rs->fields('kpcl_ID'));
		$this->Name_of_Dam->setDbValue($rs->fields('Name_of_Dam'));
		$this->kpcl_dam_name->setDbValue($rs->fields('kpcl_dam_name'));
		$this->Ops_ID->setDbValue($rs->fields('Ops_ID'));
		$this->dam_size_type_ID->setDbValue($rs->fields('dam_size_type_ID'));
		$this->dam_Longitude->setDbValue($rs->fields('dam_Longitude'));
		$this->dam_Latitude->setDbValue($rs->fields('dam_Latitude'));
		$this->Year_of_Completion->setDbValue($rs->fields('Year_of_Completion'));
		$this->Basin->setDbValue($rs->fields('Basin'));
		$this->Sub_Basin->setDbValue($rs->fields('Sub-Basin'));
		$this->district->setDbValue($rs->fields('district'));
		$this->Taluka->setDbValue($rs->fields('Taluka'));
		$this->River->setDbValue($rs->fields('River'));
		$this->Neareast_City->setDbValue($rs->fields('Neareast_City'));
		$this->dam_construction_type->setDbValue($rs->fields('dam_construction_type'));
		$this->Height_above_Lowest_Foundation_Level_in_mtr->setDbValue($rs->fields('Height_above_Lowest_Foundation_Level_in_mtr'));
		$this->Length_of_Dam_in_mtr->setDbValue($rs->fields('Length_of_Dam_in_mtr'));
		$this->Volume_Content_of_Dam_in_MCM->setDbValue($rs->fields('Volume_Content_of_Dam_in_MCM'));
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->setDbValue($rs->fields('Gross_Storage_Capacity_of_Dam_in_MCM'));
		$this->Reservoir_Area_in_sq_km->setDbValue($rs->fields('Reservoir_Area_in_sq_km'));
		$this->Effective_Storage_Capacity_in_MCM->setDbValue($rs->fields('Effective_Storage_Capacity_in_MCM'));
		$this->Purpose->setDbValue($rs->fields('Purpose'));
		$this->Designed_Spillway_Capacity_in_M3_per_sec->setDbValue($rs->fields('Designed_Spillway_Capacity_in_M3_per_sec'));
		$this->dam_construction_type_ID->setDbValue($rs->fields('dam_construction_type_ID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// SrNo
		// PIC
		// kpcl_ID
		// Name_of_Dam
		// kpcl_dam_name
		// Ops_ID
		// dam_size_type_ID
		// dam_Longitude
		// dam_Latitude
		// Year_of_Completion
		// Basin
		// Sub-Basin
		// district
		// Taluka
		// River
		// Neareast_City
		// dam_construction_type
		// Height_above_Lowest_Foundation_Level_in_mtr
		// Length_of_Dam_in_mtr
		// Volume_Content_of_Dam_in_MCM
		// Gross_Storage_Capacity_of_Dam_in_MCM
		// Reservoir_Area_in_sq_km
		// Effective_Storage_Capacity_in_MCM
		// Purpose
		// Designed_Spillway_Capacity_in_M3_per_sec
		// dam_construction_type_ID
		// SrNo

		$this->SrNo->ViewValue = $this->SrNo->CurrentValue;
		$this->SrNo->ViewValue = FormatNumber($this->SrNo->ViewValue, 0, -2, -2, -2);
		$this->SrNo->ViewCustomAttributes = "";

		// PIC
		$this->PIC->ViewValue = $this->PIC->CurrentValue;
		$this->PIC->ViewCustomAttributes = "";

		// kpcl_ID
		$this->kpcl_ID->ViewValue = $this->kpcl_ID->CurrentValue;
		$this->kpcl_ID->ViewCustomAttributes = "";

		// Name_of_Dam
		$this->Name_of_Dam->ViewValue = $this->Name_of_Dam->CurrentValue;
		$this->Name_of_Dam->ViewCustomAttributes = "";

		// kpcl_dam_name
		$this->kpcl_dam_name->ViewValue = $this->kpcl_dam_name->CurrentValue;
		$this->kpcl_dam_name->ViewCustomAttributes = "";

		// Ops_ID
		$this->Ops_ID->ViewValue = $this->Ops_ID->CurrentValue;
		$this->Ops_ID->ViewCustomAttributes = "";

		// dam_size_type_ID
		$this->dam_size_type_ID->ViewValue = $this->dam_size_type_ID->CurrentValue;
		$this->dam_size_type_ID->ViewCustomAttributes = "";

		// dam_Longitude
		$this->dam_Longitude->ViewValue = $this->dam_Longitude->CurrentValue;
		$this->dam_Longitude->ViewValue = FormatNumber($this->dam_Longitude->ViewValue, 2, -2, -2, -2);
		$this->dam_Longitude->ViewCustomAttributes = "";

		// dam_Latitude
		$this->dam_Latitude->ViewValue = $this->dam_Latitude->CurrentValue;
		$this->dam_Latitude->ViewValue = FormatNumber($this->dam_Latitude->ViewValue, 2, -2, -2, -2);
		$this->dam_Latitude->ViewCustomAttributes = "";

		// Year_of_Completion
		$this->Year_of_Completion->ViewValue = $this->Year_of_Completion->CurrentValue;
		$this->Year_of_Completion->ViewCustomAttributes = "";

		// Basin
		$this->Basin->ViewValue = $this->Basin->CurrentValue;
		$this->Basin->ViewCustomAttributes = "";

		// Sub-Basin
		$this->Sub_Basin->ViewValue = $this->Sub_Basin->CurrentValue;
		$this->Sub_Basin->ViewCustomAttributes = "";

		// district
		$this->district->ViewValue = $this->district->CurrentValue;
		$this->district->ViewCustomAttributes = "";

		// Taluka
		$this->Taluka->ViewValue = $this->Taluka->CurrentValue;
		$this->Taluka->ViewCustomAttributes = "";

		// River
		$this->River->ViewValue = $this->River->CurrentValue;
		$this->River->ViewCustomAttributes = "";

		// Neareast_City
		$this->Neareast_City->ViewValue = $this->Neareast_City->CurrentValue;
		$this->Neareast_City->ViewCustomAttributes = "";

		// dam_construction_type
		$this->dam_construction_type->ViewValue = $this->dam_construction_type->CurrentValue;
		$this->dam_construction_type->ViewCustomAttributes = "";

		// Height_above_Lowest_Foundation_Level_in_mtr
		$this->Height_above_Lowest_Foundation_Level_in_mtr->ViewValue = $this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue;
		$this->Height_above_Lowest_Foundation_Level_in_mtr->ViewValue = FormatNumber($this->Height_above_Lowest_Foundation_Level_in_mtr->ViewValue, 2, -2, -2, -2);
		$this->Height_above_Lowest_Foundation_Level_in_mtr->ViewCustomAttributes = "";

		// Length_of_Dam_in_mtr
		$this->Length_of_Dam_in_mtr->ViewValue = $this->Length_of_Dam_in_mtr->CurrentValue;
		$this->Length_of_Dam_in_mtr->ViewValue = FormatNumber($this->Length_of_Dam_in_mtr->ViewValue, 2, -2, -2, -2);
		$this->Length_of_Dam_in_mtr->ViewCustomAttributes = "";

		// Volume_Content_of_Dam_in_MCM
		$this->Volume_Content_of_Dam_in_MCM->ViewValue = $this->Volume_Content_of_Dam_in_MCM->CurrentValue;
		$this->Volume_Content_of_Dam_in_MCM->ViewValue = FormatNumber($this->Volume_Content_of_Dam_in_MCM->ViewValue, 2, -2, -2, -2);
		$this->Volume_Content_of_Dam_in_MCM->ViewCustomAttributes = "";

		// Gross_Storage_Capacity_of_Dam_in_MCM
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->ViewValue = $this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue;
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->ViewValue = FormatNumber($this->Gross_Storage_Capacity_of_Dam_in_MCM->ViewValue, 2, -2, -2, -2);
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->ViewCustomAttributes = "";

		// Reservoir_Area_in_sq_km
		$this->Reservoir_Area_in_sq_km->ViewValue = $this->Reservoir_Area_in_sq_km->CurrentValue;
		$this->Reservoir_Area_in_sq_km->ViewValue = FormatNumber($this->Reservoir_Area_in_sq_km->ViewValue, 2, -2, -2, -2);
		$this->Reservoir_Area_in_sq_km->ViewCustomAttributes = "";

		// Effective_Storage_Capacity_in_MCM
		$this->Effective_Storage_Capacity_in_MCM->ViewValue = $this->Effective_Storage_Capacity_in_MCM->CurrentValue;
		$this->Effective_Storage_Capacity_in_MCM->ViewValue = FormatNumber($this->Effective_Storage_Capacity_in_MCM->ViewValue, 2, -2, -2, -2);
		$this->Effective_Storage_Capacity_in_MCM->ViewCustomAttributes = "";

		// Purpose
		$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
		$this->Purpose->ViewCustomAttributes = "";

		// Designed_Spillway_Capacity_in_M3_per_sec
		$this->Designed_Spillway_Capacity_in_M3_per_sec->ViewValue = $this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue;
		$this->Designed_Spillway_Capacity_in_M3_per_sec->ViewValue = FormatNumber($this->Designed_Spillway_Capacity_in_M3_per_sec->ViewValue, 2, -2, -2, -2);
		$this->Designed_Spillway_Capacity_in_M3_per_sec->ViewCustomAttributes = "";

		// dam_construction_type_ID
		$this->dam_construction_type_ID->ViewValue = $this->dam_construction_type_ID->CurrentValue;
		$this->dam_construction_type_ID->ViewCustomAttributes = "";

		// SrNo
		$this->SrNo->LinkCustomAttributes = "";
		$this->SrNo->HrefValue = "";
		$this->SrNo->TooltipValue = "";

		// PIC
		$this->PIC->LinkCustomAttributes = "";
		$this->PIC->HrefValue = "";
		$this->PIC->TooltipValue = "";

		// kpcl_ID
		$this->kpcl_ID->LinkCustomAttributes = "";
		$this->kpcl_ID->HrefValue = "";
		$this->kpcl_ID->TooltipValue = "";

		// Name_of_Dam
		$this->Name_of_Dam->LinkCustomAttributes = "";
		$this->Name_of_Dam->HrefValue = "";
		$this->Name_of_Dam->TooltipValue = "";

		// kpcl_dam_name
		$this->kpcl_dam_name->LinkCustomAttributes = "";
		$this->kpcl_dam_name->HrefValue = "";
		$this->kpcl_dam_name->TooltipValue = "";

		// Ops_ID
		$this->Ops_ID->LinkCustomAttributes = "";
		$this->Ops_ID->HrefValue = "";
		$this->Ops_ID->TooltipValue = "";

		// dam_size_type_ID
		$this->dam_size_type_ID->LinkCustomAttributes = "";
		$this->dam_size_type_ID->HrefValue = "";
		$this->dam_size_type_ID->TooltipValue = "";

		// dam_Longitude
		$this->dam_Longitude->LinkCustomAttributes = "";
		$this->dam_Longitude->HrefValue = "";
		$this->dam_Longitude->TooltipValue = "";

		// dam_Latitude
		$this->dam_Latitude->LinkCustomAttributes = "";
		$this->dam_Latitude->HrefValue = "";
		$this->dam_Latitude->TooltipValue = "";

		// Year_of_Completion
		$this->Year_of_Completion->LinkCustomAttributes = "";
		$this->Year_of_Completion->HrefValue = "";
		$this->Year_of_Completion->TooltipValue = "";

		// Basin
		$this->Basin->LinkCustomAttributes = "";
		$this->Basin->HrefValue = "";
		$this->Basin->TooltipValue = "";

		// Sub-Basin
		$this->Sub_Basin->LinkCustomAttributes = "";
		$this->Sub_Basin->HrefValue = "";
		$this->Sub_Basin->TooltipValue = "";

		// district
		$this->district->LinkCustomAttributes = "";
		$this->district->HrefValue = "";
		$this->district->TooltipValue = "";

		// Taluka
		$this->Taluka->LinkCustomAttributes = "";
		$this->Taluka->HrefValue = "";
		$this->Taluka->TooltipValue = "";

		// River
		$this->River->LinkCustomAttributes = "";
		$this->River->HrefValue = "";
		$this->River->TooltipValue = "";

		// Neareast_City
		$this->Neareast_City->LinkCustomAttributes = "";
		$this->Neareast_City->HrefValue = "";
		$this->Neareast_City->TooltipValue = "";

		// dam_construction_type
		$this->dam_construction_type->LinkCustomAttributes = "";
		$this->dam_construction_type->HrefValue = "";
		$this->dam_construction_type->TooltipValue = "";

		// Height_above_Lowest_Foundation_Level_in_mtr
		$this->Height_above_Lowest_Foundation_Level_in_mtr->LinkCustomAttributes = "";
		$this->Height_above_Lowest_Foundation_Level_in_mtr->HrefValue = "";
		$this->Height_above_Lowest_Foundation_Level_in_mtr->TooltipValue = "";

		// Length_of_Dam_in_mtr
		$this->Length_of_Dam_in_mtr->LinkCustomAttributes = "";
		$this->Length_of_Dam_in_mtr->HrefValue = "";
		$this->Length_of_Dam_in_mtr->TooltipValue = "";

		// Volume_Content_of_Dam_in_MCM
		$this->Volume_Content_of_Dam_in_MCM->LinkCustomAttributes = "";
		$this->Volume_Content_of_Dam_in_MCM->HrefValue = "";
		$this->Volume_Content_of_Dam_in_MCM->TooltipValue = "";

		// Gross_Storage_Capacity_of_Dam_in_MCM
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->LinkCustomAttributes = "";
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->HrefValue = "";
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->TooltipValue = "";

		// Reservoir_Area_in_sq_km
		$this->Reservoir_Area_in_sq_km->LinkCustomAttributes = "";
		$this->Reservoir_Area_in_sq_km->HrefValue = "";
		$this->Reservoir_Area_in_sq_km->TooltipValue = "";

		// Effective_Storage_Capacity_in_MCM
		$this->Effective_Storage_Capacity_in_MCM->LinkCustomAttributes = "";
		$this->Effective_Storage_Capacity_in_MCM->HrefValue = "";
		$this->Effective_Storage_Capacity_in_MCM->TooltipValue = "";

		// Purpose
		$this->Purpose->LinkCustomAttributes = "";
		$this->Purpose->HrefValue = "";
		$this->Purpose->TooltipValue = "";

		// Designed_Spillway_Capacity_in_M3_per_sec
		$this->Designed_Spillway_Capacity_in_M3_per_sec->LinkCustomAttributes = "";
		$this->Designed_Spillway_Capacity_in_M3_per_sec->HrefValue = "";
		$this->Designed_Spillway_Capacity_in_M3_per_sec->TooltipValue = "";

		// dam_construction_type_ID
		$this->dam_construction_type_ID->LinkCustomAttributes = "";
		$this->dam_construction_type_ID->HrefValue = "";
		$this->dam_construction_type_ID->TooltipValue = "";

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

		// SrNo
		$this->SrNo->EditAttrs["class"] = "form-control";
		$this->SrNo->EditCustomAttributes = "";
		$this->SrNo->EditValue = $this->SrNo->CurrentValue;

		// PIC
		$this->PIC->EditAttrs["class"] = "form-control";
		$this->PIC->EditCustomAttributes = "";
		if (!$this->PIC->Raw)
			$this->PIC->CurrentValue = HtmlDecode($this->PIC->CurrentValue);
		$this->PIC->EditValue = $this->PIC->CurrentValue;

		// kpcl_ID
		$this->kpcl_ID->EditAttrs["class"] = "form-control";
		$this->kpcl_ID->EditCustomAttributes = "";
		if (!$this->kpcl_ID->Raw)
			$this->kpcl_ID->CurrentValue = HtmlDecode($this->kpcl_ID->CurrentValue);
		$this->kpcl_ID->EditValue = $this->kpcl_ID->CurrentValue;

		// Name_of_Dam
		$this->Name_of_Dam->EditAttrs["class"] = "form-control";
		$this->Name_of_Dam->EditCustomAttributes = "";
		if (!$this->Name_of_Dam->Raw)
			$this->Name_of_Dam->CurrentValue = HtmlDecode($this->Name_of_Dam->CurrentValue);
		$this->Name_of_Dam->EditValue = $this->Name_of_Dam->CurrentValue;

		// kpcl_dam_name
		$this->kpcl_dam_name->EditAttrs["class"] = "form-control";
		$this->kpcl_dam_name->EditCustomAttributes = "";
		if (!$this->kpcl_dam_name->Raw)
			$this->kpcl_dam_name->CurrentValue = HtmlDecode($this->kpcl_dam_name->CurrentValue);
		$this->kpcl_dam_name->EditValue = $this->kpcl_dam_name->CurrentValue;

		// Ops_ID
		$this->Ops_ID->EditAttrs["class"] = "form-control";
		$this->Ops_ID->EditCustomAttributes = "";
		if (!$this->Ops_ID->Raw)
			$this->Ops_ID->CurrentValue = HtmlDecode($this->Ops_ID->CurrentValue);
		$this->Ops_ID->EditValue = $this->Ops_ID->CurrentValue;

		// dam_size_type_ID
		$this->dam_size_type_ID->EditAttrs["class"] = "form-control";
		$this->dam_size_type_ID->EditCustomAttributes = "";
		if (!$this->dam_size_type_ID->Raw)
			$this->dam_size_type_ID->CurrentValue = HtmlDecode($this->dam_size_type_ID->CurrentValue);
		$this->dam_size_type_ID->EditValue = $this->dam_size_type_ID->CurrentValue;

		// dam_Longitude
		$this->dam_Longitude->EditAttrs["class"] = "form-control";
		$this->dam_Longitude->EditCustomAttributes = "";
		$this->dam_Longitude->EditValue = $this->dam_Longitude->CurrentValue;
		if (strval($this->dam_Longitude->EditValue) != "" && is_numeric($this->dam_Longitude->EditValue))
			$this->dam_Longitude->EditValue = FormatNumber($this->dam_Longitude->EditValue, -2, -2, -2, -2);
		

		// dam_Latitude
		$this->dam_Latitude->EditAttrs["class"] = "form-control";
		$this->dam_Latitude->EditCustomAttributes = "";
		$this->dam_Latitude->EditValue = $this->dam_Latitude->CurrentValue;
		if (strval($this->dam_Latitude->EditValue) != "" && is_numeric($this->dam_Latitude->EditValue))
			$this->dam_Latitude->EditValue = FormatNumber($this->dam_Latitude->EditValue, -2, -2, -2, -2);
		

		// Year_of_Completion
		$this->Year_of_Completion->EditAttrs["class"] = "form-control";
		$this->Year_of_Completion->EditCustomAttributes = "";
		if (!$this->Year_of_Completion->Raw)
			$this->Year_of_Completion->CurrentValue = HtmlDecode($this->Year_of_Completion->CurrentValue);
		$this->Year_of_Completion->EditValue = $this->Year_of_Completion->CurrentValue;

		// Basin
		$this->Basin->EditAttrs["class"] = "form-control";
		$this->Basin->EditCustomAttributes = "";
		if (!$this->Basin->Raw)
			$this->Basin->CurrentValue = HtmlDecode($this->Basin->CurrentValue);
		$this->Basin->EditValue = $this->Basin->CurrentValue;

		// Sub-Basin
		$this->Sub_Basin->EditAttrs["class"] = "form-control";
		$this->Sub_Basin->EditCustomAttributes = "";
		if (!$this->Sub_Basin->Raw)
			$this->Sub_Basin->CurrentValue = HtmlDecode($this->Sub_Basin->CurrentValue);
		$this->Sub_Basin->EditValue = $this->Sub_Basin->CurrentValue;

		// district
		$this->district->EditAttrs["class"] = "form-control";
		$this->district->EditCustomAttributes = "";
		if (!$this->district->Raw)
			$this->district->CurrentValue = HtmlDecode($this->district->CurrentValue);
		$this->district->EditValue = $this->district->CurrentValue;

		// Taluka
		$this->Taluka->EditAttrs["class"] = "form-control";
		$this->Taluka->EditCustomAttributes = "";
		if (!$this->Taluka->Raw)
			$this->Taluka->CurrentValue = HtmlDecode($this->Taluka->CurrentValue);
		$this->Taluka->EditValue = $this->Taluka->CurrentValue;

		// River
		$this->River->EditAttrs["class"] = "form-control";
		$this->River->EditCustomAttributes = "";
		if (!$this->River->Raw)
			$this->River->CurrentValue = HtmlDecode($this->River->CurrentValue);
		$this->River->EditValue = $this->River->CurrentValue;

		// Neareast_City
		$this->Neareast_City->EditAttrs["class"] = "form-control";
		$this->Neareast_City->EditCustomAttributes = "";
		if (!$this->Neareast_City->Raw)
			$this->Neareast_City->CurrentValue = HtmlDecode($this->Neareast_City->CurrentValue);
		$this->Neareast_City->EditValue = $this->Neareast_City->CurrentValue;

		// dam_construction_type
		$this->dam_construction_type->EditAttrs["class"] = "form-control";
		$this->dam_construction_type->EditCustomAttributes = "";
		if (!$this->dam_construction_type->Raw)
			$this->dam_construction_type->CurrentValue = HtmlDecode($this->dam_construction_type->CurrentValue);
		$this->dam_construction_type->EditValue = $this->dam_construction_type->CurrentValue;

		// Height_above_Lowest_Foundation_Level_in_mtr
		$this->Height_above_Lowest_Foundation_Level_in_mtr->EditAttrs["class"] = "form-control";
		$this->Height_above_Lowest_Foundation_Level_in_mtr->EditCustomAttributes = "";
		$this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue = $this->Height_above_Lowest_Foundation_Level_in_mtr->CurrentValue;
		if (strval($this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue) != "" && is_numeric($this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue))
			$this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue = FormatNumber($this->Height_above_Lowest_Foundation_Level_in_mtr->EditValue, -2, -2, -2, -2);
		

		// Length_of_Dam_in_mtr
		$this->Length_of_Dam_in_mtr->EditAttrs["class"] = "form-control";
		$this->Length_of_Dam_in_mtr->EditCustomAttributes = "";
		$this->Length_of_Dam_in_mtr->EditValue = $this->Length_of_Dam_in_mtr->CurrentValue;
		if (strval($this->Length_of_Dam_in_mtr->EditValue) != "" && is_numeric($this->Length_of_Dam_in_mtr->EditValue))
			$this->Length_of_Dam_in_mtr->EditValue = FormatNumber($this->Length_of_Dam_in_mtr->EditValue, -2, -2, -2, -2);
		

		// Volume_Content_of_Dam_in_MCM
		$this->Volume_Content_of_Dam_in_MCM->EditAttrs["class"] = "form-control";
		$this->Volume_Content_of_Dam_in_MCM->EditCustomAttributes = "";
		$this->Volume_Content_of_Dam_in_MCM->EditValue = $this->Volume_Content_of_Dam_in_MCM->CurrentValue;
		if (strval($this->Volume_Content_of_Dam_in_MCM->EditValue) != "" && is_numeric($this->Volume_Content_of_Dam_in_MCM->EditValue))
			$this->Volume_Content_of_Dam_in_MCM->EditValue = FormatNumber($this->Volume_Content_of_Dam_in_MCM->EditValue, -2, -2, -2, -2);
		

		// Gross_Storage_Capacity_of_Dam_in_MCM
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->EditAttrs["class"] = "form-control";
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->EditCustomAttributes = "";
		$this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue = $this->Gross_Storage_Capacity_of_Dam_in_MCM->CurrentValue;
		if (strval($this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue) != "" && is_numeric($this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue))
			$this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue = FormatNumber($this->Gross_Storage_Capacity_of_Dam_in_MCM->EditValue, -2, -2, -2, -2);
		

		// Reservoir_Area_in_sq_km
		$this->Reservoir_Area_in_sq_km->EditAttrs["class"] = "form-control";
		$this->Reservoir_Area_in_sq_km->EditCustomAttributes = "";
		$this->Reservoir_Area_in_sq_km->EditValue = $this->Reservoir_Area_in_sq_km->CurrentValue;
		if (strval($this->Reservoir_Area_in_sq_km->EditValue) != "" && is_numeric($this->Reservoir_Area_in_sq_km->EditValue))
			$this->Reservoir_Area_in_sq_km->EditValue = FormatNumber($this->Reservoir_Area_in_sq_km->EditValue, -2, -2, -2, -2);
		

		// Effective_Storage_Capacity_in_MCM
		$this->Effective_Storage_Capacity_in_MCM->EditAttrs["class"] = "form-control";
		$this->Effective_Storage_Capacity_in_MCM->EditCustomAttributes = "";
		$this->Effective_Storage_Capacity_in_MCM->EditValue = $this->Effective_Storage_Capacity_in_MCM->CurrentValue;
		if (strval($this->Effective_Storage_Capacity_in_MCM->EditValue) != "" && is_numeric($this->Effective_Storage_Capacity_in_MCM->EditValue))
			$this->Effective_Storage_Capacity_in_MCM->EditValue = FormatNumber($this->Effective_Storage_Capacity_in_MCM->EditValue, -2, -2, -2, -2);
		

		// Purpose
		$this->Purpose->EditAttrs["class"] = "form-control";
		$this->Purpose->EditCustomAttributes = "";
		if (!$this->Purpose->Raw)
			$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
		$this->Purpose->EditValue = $this->Purpose->CurrentValue;

		// Designed_Spillway_Capacity_in_M3_per_sec
		$this->Designed_Spillway_Capacity_in_M3_per_sec->EditAttrs["class"] = "form-control";
		$this->Designed_Spillway_Capacity_in_M3_per_sec->EditCustomAttributes = "";
		$this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue = $this->Designed_Spillway_Capacity_in_M3_per_sec->CurrentValue;
		if (strval($this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue) != "" && is_numeric($this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue))
			$this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue = FormatNumber($this->Designed_Spillway_Capacity_in_M3_per_sec->EditValue, -2, -2, -2, -2);
		

		// dam_construction_type_ID
		$this->dam_construction_type_ID->EditAttrs["class"] = "form-control";
		$this->dam_construction_type_ID->EditCustomAttributes = "";
		if (!$this->dam_construction_type_ID->Raw)
			$this->dam_construction_type_ID->CurrentValue = HtmlDecode($this->dam_construction_type_ID->CurrentValue);
		$this->dam_construction_type_ID->EditValue = $this->dam_construction_type_ID->CurrentValue;

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
					$doc->exportCaption($this->SrNo);
					$doc->exportCaption($this->PIC);
					$doc->exportCaption($this->kpcl_ID);
					$doc->exportCaption($this->Name_of_Dam);
					$doc->exportCaption($this->kpcl_dam_name);
					$doc->exportCaption($this->Ops_ID);
					$doc->exportCaption($this->dam_size_type_ID);
					$doc->exportCaption($this->dam_Longitude);
					$doc->exportCaption($this->dam_Latitude);
					$doc->exportCaption($this->Year_of_Completion);
					$doc->exportCaption($this->Basin);
					$doc->exportCaption($this->Sub_Basin);
					$doc->exportCaption($this->district);
					$doc->exportCaption($this->Taluka);
					$doc->exportCaption($this->River);
					$doc->exportCaption($this->Neareast_City);
					$doc->exportCaption($this->dam_construction_type);
					$doc->exportCaption($this->Height_above_Lowest_Foundation_Level_in_mtr);
					$doc->exportCaption($this->Length_of_Dam_in_mtr);
					$doc->exportCaption($this->Volume_Content_of_Dam_in_MCM);
					$doc->exportCaption($this->Gross_Storage_Capacity_of_Dam_in_MCM);
					$doc->exportCaption($this->Reservoir_Area_in_sq_km);
					$doc->exportCaption($this->Effective_Storage_Capacity_in_MCM);
					$doc->exportCaption($this->Purpose);
					$doc->exportCaption($this->Designed_Spillway_Capacity_in_M3_per_sec);
					$doc->exportCaption($this->dam_construction_type_ID);
				} else {
					$doc->exportCaption($this->SrNo);
					$doc->exportCaption($this->PIC);
					$doc->exportCaption($this->kpcl_ID);
					$doc->exportCaption($this->Name_of_Dam);
					$doc->exportCaption($this->kpcl_dam_name);
					$doc->exportCaption($this->Ops_ID);
					$doc->exportCaption($this->dam_size_type_ID);
					$doc->exportCaption($this->dam_Longitude);
					$doc->exportCaption($this->dam_Latitude);
					$doc->exportCaption($this->Year_of_Completion);
					$doc->exportCaption($this->Basin);
					$doc->exportCaption($this->Sub_Basin);
					$doc->exportCaption($this->district);
					$doc->exportCaption($this->Taluka);
					$doc->exportCaption($this->River);
					$doc->exportCaption($this->Neareast_City);
					$doc->exportCaption($this->dam_construction_type);
					$doc->exportCaption($this->Height_above_Lowest_Foundation_Level_in_mtr);
					$doc->exportCaption($this->Length_of_Dam_in_mtr);
					$doc->exportCaption($this->Volume_Content_of_Dam_in_MCM);
					$doc->exportCaption($this->Gross_Storage_Capacity_of_Dam_in_MCM);
					$doc->exportCaption($this->Reservoir_Area_in_sq_km);
					$doc->exportCaption($this->Effective_Storage_Capacity_in_MCM);
					$doc->exportCaption($this->Purpose);
					$doc->exportCaption($this->Designed_Spillway_Capacity_in_M3_per_sec);
					$doc->exportCaption($this->dam_construction_type_ID);
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
						$doc->exportField($this->SrNo);
						$doc->exportField($this->PIC);
						$doc->exportField($this->kpcl_ID);
						$doc->exportField($this->Name_of_Dam);
						$doc->exportField($this->kpcl_dam_name);
						$doc->exportField($this->Ops_ID);
						$doc->exportField($this->dam_size_type_ID);
						$doc->exportField($this->dam_Longitude);
						$doc->exportField($this->dam_Latitude);
						$doc->exportField($this->Year_of_Completion);
						$doc->exportField($this->Basin);
						$doc->exportField($this->Sub_Basin);
						$doc->exportField($this->district);
						$doc->exportField($this->Taluka);
						$doc->exportField($this->River);
						$doc->exportField($this->Neareast_City);
						$doc->exportField($this->dam_construction_type);
						$doc->exportField($this->Height_above_Lowest_Foundation_Level_in_mtr);
						$doc->exportField($this->Length_of_Dam_in_mtr);
						$doc->exportField($this->Volume_Content_of_Dam_in_MCM);
						$doc->exportField($this->Gross_Storage_Capacity_of_Dam_in_MCM);
						$doc->exportField($this->Reservoir_Area_in_sq_km);
						$doc->exportField($this->Effective_Storage_Capacity_in_MCM);
						$doc->exportField($this->Purpose);
						$doc->exportField($this->Designed_Spillway_Capacity_in_M3_per_sec);
						$doc->exportField($this->dam_construction_type_ID);
					} else {
						$doc->exportField($this->SrNo);
						$doc->exportField($this->PIC);
						$doc->exportField($this->kpcl_ID);
						$doc->exportField($this->Name_of_Dam);
						$doc->exportField($this->kpcl_dam_name);
						$doc->exportField($this->Ops_ID);
						$doc->exportField($this->dam_size_type_ID);
						$doc->exportField($this->dam_Longitude);
						$doc->exportField($this->dam_Latitude);
						$doc->exportField($this->Year_of_Completion);
						$doc->exportField($this->Basin);
						$doc->exportField($this->Sub_Basin);
						$doc->exportField($this->district);
						$doc->exportField($this->Taluka);
						$doc->exportField($this->River);
						$doc->exportField($this->Neareast_City);
						$doc->exportField($this->dam_construction_type);
						$doc->exportField($this->Height_above_Lowest_Foundation_Level_in_mtr);
						$doc->exportField($this->Length_of_Dam_in_mtr);
						$doc->exportField($this->Volume_Content_of_Dam_in_MCM);
						$doc->exportField($this->Gross_Storage_Capacity_of_Dam_in_MCM);
						$doc->exportField($this->Reservoir_Area_in_sq_km);
						$doc->exportField($this->Effective_Storage_Capacity_in_MCM);
						$doc->exportField($this->Purpose);
						$doc->exportField($this->Designed_Spillway_Capacity_in_M3_per_sec);
						$doc->exportField($this->dam_construction_type_ID);
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