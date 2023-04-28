<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for newstationslist
 */
class newstationslist extends DbTable
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
	public $StationName;
	public $District;
	public $Taluk;
	public $NameofSubDivision;
	public $TypeofStation;
	public $BasinName;
	public $SubBasinname;
	public $DamCatchment;
	public $Longitude;
	public $Latitude;
	public $MobileNumber;
	public $senderMobileNumber;
	public $StationId;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'newstationslist';
		$this->TableName = 'newstationslist';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`newstationslist`";
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

		// StationName
		$this->StationName = new DbField('newstationslist', 'newstationslist', 'x_StationName', 'StationName', '`StationName`', '`StationName`', 200, 255, -1, FALSE, '`StationName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName->Sortable = TRUE; // Allow sort
		$this->fields['StationName'] = &$this->StationName;

		// District
		$this->District = new DbField('newstationslist', 'newstationslist', 'x_District', 'District', '`District`', '`District`', 200, 255, -1, FALSE, '`District`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->District->Sortable = TRUE; // Allow sort
		$this->fields['District'] = &$this->District;

		// Taluk
		$this->Taluk = new DbField('newstationslist', 'newstationslist', 'x_Taluk', 'Taluk', '`Taluk`', '`Taluk`', 200, 255, -1, FALSE, '`Taluk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Taluk->Sortable = TRUE; // Allow sort
		$this->fields['Taluk'] = &$this->Taluk;

		// NameofSubDivision
		$this->NameofSubDivision = new DbField('newstationslist', 'newstationslist', 'x_NameofSubDivision', 'NameofSubDivision', '`NameofSubDivision`', '`NameofSubDivision`', 200, 255, -1, FALSE, '`NameofSubDivision`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NameofSubDivision->Sortable = TRUE; // Allow sort
		$this->fields['NameofSubDivision'] = &$this->NameofSubDivision;

		// TypeofStation
		$this->TypeofStation = new DbField('newstationslist', 'newstationslist', 'x_TypeofStation', 'TypeofStation', '`TypeofStation`', '`TypeofStation`', 200, 255, -1, FALSE, '`TypeofStation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TypeofStation->Sortable = TRUE; // Allow sort
		$this->fields['TypeofStation'] = &$this->TypeofStation;

		// BasinName
		$this->BasinName = new DbField('newstationslist', 'newstationslist', 'x_BasinName', 'BasinName', '`BasinName`', '`BasinName`', 200, 255, -1, FALSE, '`BasinName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BasinName->Sortable = TRUE; // Allow sort
		$this->fields['BasinName'] = &$this->BasinName;

		// SubBasinname
		$this->SubBasinname = new DbField('newstationslist', 'newstationslist', 'x_SubBasinname', 'SubBasinname', '`SubBasinname`', '`SubBasinname`', 200, 255, -1, FALSE, '`SubBasinname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubBasinname->Sortable = TRUE; // Allow sort
		$this->fields['SubBasinname'] = &$this->SubBasinname;

		// DamCatchment
		$this->DamCatchment = new DbField('newstationslist', 'newstationslist', 'x_DamCatchment', 'DamCatchment', '`DamCatchment`', '`DamCatchment`', 200, 255, -1, FALSE, '`DamCatchment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DamCatchment->Sortable = TRUE; // Allow sort
		$this->fields['DamCatchment'] = &$this->DamCatchment;

		// Longitude
		$this->Longitude = new DbField('newstationslist', 'newstationslist', 'x_Longitude', 'Longitude', '`Longitude`', '`Longitude`', 4, 12, -1, FALSE, '`Longitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Longitude->Sortable = TRUE; // Allow sort
		$this->Longitude->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Longitude'] = &$this->Longitude;

		// Latitude
		$this->Latitude = new DbField('newstationslist', 'newstationslist', 'x_Latitude', 'Latitude', '`Latitude`', '`Latitude`', 4, 12, -1, FALSE, '`Latitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Latitude->Sortable = TRUE; // Allow sort
		$this->Latitude->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Latitude'] = &$this->Latitude;

		// MobileNumber
		$this->MobileNumber = new DbField('newstationslist', 'newstationslist', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 25, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// senderMobileNumber
		$this->senderMobileNumber = new DbField('newstationslist', 'newstationslist', 'x_senderMobileNumber', 'senderMobileNumber', '`senderMobileNumber`', '`senderMobileNumber`', 200, 25, -1, FALSE, '`senderMobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->senderMobileNumber->Nullable = FALSE; // NOT NULL field
		$this->senderMobileNumber->Required = TRUE; // Required field
		$this->senderMobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['senderMobileNumber'] = &$this->senderMobileNumber;

		// StationId
		$this->StationId = new DbField('newstationslist', 'newstationslist', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`newstationslist`";
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
		$this->StationName->DbValue = $row['StationName'];
		$this->District->DbValue = $row['District'];
		$this->Taluk->DbValue = $row['Taluk'];
		$this->NameofSubDivision->DbValue = $row['NameofSubDivision'];
		$this->TypeofStation->DbValue = $row['TypeofStation'];
		$this->BasinName->DbValue = $row['BasinName'];
		$this->SubBasinname->DbValue = $row['SubBasinname'];
		$this->DamCatchment->DbValue = $row['DamCatchment'];
		$this->Longitude->DbValue = $row['Longitude'];
		$this->Latitude->DbValue = $row['Latitude'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->senderMobileNumber->DbValue = $row['senderMobileNumber'];
		$this->StationId->DbValue = $row['StationId'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
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
			return "newstationslistlist.php";
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
		if ($pageName == "newstationslistview.php")
			return $Language->phrase("View");
		elseif ($pageName == "newstationslistedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "newstationslistadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "newstationslistlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("newstationslistview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("newstationslistview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "newstationslistadd.php?" . $this->getUrlParm($parm);
		else
			$url = "newstationslistadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("newstationslistedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("newstationslistadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("newstationslistdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
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
		$this->StationName->setDbValue($rs->fields('StationName'));
		$this->District->setDbValue($rs->fields('District'));
		$this->Taluk->setDbValue($rs->fields('Taluk'));
		$this->NameofSubDivision->setDbValue($rs->fields('NameofSubDivision'));
		$this->TypeofStation->setDbValue($rs->fields('TypeofStation'));
		$this->BasinName->setDbValue($rs->fields('BasinName'));
		$this->SubBasinname->setDbValue($rs->fields('SubBasinname'));
		$this->DamCatchment->setDbValue($rs->fields('DamCatchment'));
		$this->Longitude->setDbValue($rs->fields('Longitude'));
		$this->Latitude->setDbValue($rs->fields('Latitude'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->senderMobileNumber->setDbValue($rs->fields('senderMobileNumber'));
		$this->StationId->setDbValue($rs->fields('StationId'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// StationName
		// District
		// Taluk
		// NameofSubDivision
		// TypeofStation
		// BasinName
		// SubBasinname
		// DamCatchment
		// Longitude
		// Latitude
		// MobileNumber
		// senderMobileNumber
		// StationId
		// StationName

		$this->StationName->ViewValue = $this->StationName->CurrentValue;
		$this->StationName->ViewCustomAttributes = "";

		// District
		$this->District->ViewValue = $this->District->CurrentValue;
		$this->District->ViewCustomAttributes = "";

		// Taluk
		$this->Taluk->ViewValue = $this->Taluk->CurrentValue;
		$this->Taluk->ViewCustomAttributes = "";

		// NameofSubDivision
		$this->NameofSubDivision->ViewValue = $this->NameofSubDivision->CurrentValue;
		$this->NameofSubDivision->ViewCustomAttributes = "";

		// TypeofStation
		$this->TypeofStation->ViewValue = $this->TypeofStation->CurrentValue;
		$this->TypeofStation->ViewCustomAttributes = "";

		// BasinName
		$this->BasinName->ViewValue = $this->BasinName->CurrentValue;
		$this->BasinName->ViewCustomAttributes = "";

		// SubBasinname
		$this->SubBasinname->ViewValue = $this->SubBasinname->CurrentValue;
		$this->SubBasinname->ViewCustomAttributes = "";

		// DamCatchment
		$this->DamCatchment->ViewValue = $this->DamCatchment->CurrentValue;
		$this->DamCatchment->ViewCustomAttributes = "";

		// Longitude
		$this->Longitude->ViewValue = $this->Longitude->CurrentValue;
		$this->Longitude->ViewValue = FormatNumber($this->Longitude->ViewValue, 2, -2, -2, -2);
		$this->Longitude->ViewCustomAttributes = "";

		// Latitude
		$this->Latitude->ViewValue = $this->Latitude->CurrentValue;
		$this->Latitude->ViewValue = FormatNumber($this->Latitude->ViewValue, 2, -2, -2, -2);
		$this->Latitude->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// senderMobileNumber
		$this->senderMobileNumber->ViewValue = $this->senderMobileNumber->CurrentValue;
		$this->senderMobileNumber->ViewCustomAttributes = "";

		// StationId
		$this->StationId->ViewValue = $this->StationId->CurrentValue;
		$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
		$this->StationId->ViewCustomAttributes = "";

		// StationName
		$this->StationName->LinkCustomAttributes = "";
		$this->StationName->HrefValue = "";
		$this->StationName->TooltipValue = "";

		// District
		$this->District->LinkCustomAttributes = "";
		$this->District->HrefValue = "";
		$this->District->TooltipValue = "";

		// Taluk
		$this->Taluk->LinkCustomAttributes = "";
		$this->Taluk->HrefValue = "";
		$this->Taluk->TooltipValue = "";

		// NameofSubDivision
		$this->NameofSubDivision->LinkCustomAttributes = "";
		$this->NameofSubDivision->HrefValue = "";
		$this->NameofSubDivision->TooltipValue = "";

		// TypeofStation
		$this->TypeofStation->LinkCustomAttributes = "";
		$this->TypeofStation->HrefValue = "";
		$this->TypeofStation->TooltipValue = "";

		// BasinName
		$this->BasinName->LinkCustomAttributes = "";
		$this->BasinName->HrefValue = "";
		$this->BasinName->TooltipValue = "";

		// SubBasinname
		$this->SubBasinname->LinkCustomAttributes = "";
		$this->SubBasinname->HrefValue = "";
		$this->SubBasinname->TooltipValue = "";

		// DamCatchment
		$this->DamCatchment->LinkCustomAttributes = "";
		$this->DamCatchment->HrefValue = "";
		$this->DamCatchment->TooltipValue = "";

		// Longitude
		$this->Longitude->LinkCustomAttributes = "";
		$this->Longitude->HrefValue = "";
		$this->Longitude->TooltipValue = "";

		// Latitude
		$this->Latitude->LinkCustomAttributes = "";
		$this->Latitude->HrefValue = "";
		$this->Latitude->TooltipValue = "";

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// senderMobileNumber
		$this->senderMobileNumber->LinkCustomAttributes = "";
		$this->senderMobileNumber->HrefValue = "";
		$this->senderMobileNumber->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

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

		// StationName
		$this->StationName->EditAttrs["class"] = "form-control";
		$this->StationName->EditCustomAttributes = "";
		if (!$this->StationName->Raw)
			$this->StationName->CurrentValue = HtmlDecode($this->StationName->CurrentValue);
		$this->StationName->EditValue = $this->StationName->CurrentValue;

		// District
		$this->District->EditAttrs["class"] = "form-control";
		$this->District->EditCustomAttributes = "";
		if (!$this->District->Raw)
			$this->District->CurrentValue = HtmlDecode($this->District->CurrentValue);
		$this->District->EditValue = $this->District->CurrentValue;

		// Taluk
		$this->Taluk->EditAttrs["class"] = "form-control";
		$this->Taluk->EditCustomAttributes = "";
		if (!$this->Taluk->Raw)
			$this->Taluk->CurrentValue = HtmlDecode($this->Taluk->CurrentValue);
		$this->Taluk->EditValue = $this->Taluk->CurrentValue;

		// NameofSubDivision
		$this->NameofSubDivision->EditAttrs["class"] = "form-control";
		$this->NameofSubDivision->EditCustomAttributes = "";
		if (!$this->NameofSubDivision->Raw)
			$this->NameofSubDivision->CurrentValue = HtmlDecode($this->NameofSubDivision->CurrentValue);
		$this->NameofSubDivision->EditValue = $this->NameofSubDivision->CurrentValue;

		// TypeofStation
		$this->TypeofStation->EditAttrs["class"] = "form-control";
		$this->TypeofStation->EditCustomAttributes = "";
		if (!$this->TypeofStation->Raw)
			$this->TypeofStation->CurrentValue = HtmlDecode($this->TypeofStation->CurrentValue);
		$this->TypeofStation->EditValue = $this->TypeofStation->CurrentValue;

		// BasinName
		$this->BasinName->EditAttrs["class"] = "form-control";
		$this->BasinName->EditCustomAttributes = "";
		if (!$this->BasinName->Raw)
			$this->BasinName->CurrentValue = HtmlDecode($this->BasinName->CurrentValue);
		$this->BasinName->EditValue = $this->BasinName->CurrentValue;

		// SubBasinname
		$this->SubBasinname->EditAttrs["class"] = "form-control";
		$this->SubBasinname->EditCustomAttributes = "";
		if (!$this->SubBasinname->Raw)
			$this->SubBasinname->CurrentValue = HtmlDecode($this->SubBasinname->CurrentValue);
		$this->SubBasinname->EditValue = $this->SubBasinname->CurrentValue;

		// DamCatchment
		$this->DamCatchment->EditAttrs["class"] = "form-control";
		$this->DamCatchment->EditCustomAttributes = "";
		if (!$this->DamCatchment->Raw)
			$this->DamCatchment->CurrentValue = HtmlDecode($this->DamCatchment->CurrentValue);
		$this->DamCatchment->EditValue = $this->DamCatchment->CurrentValue;

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
		

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (!$this->MobileNumber->Raw)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;

		// senderMobileNumber
		$this->senderMobileNumber->EditAttrs["class"] = "form-control";
		$this->senderMobileNumber->EditCustomAttributes = "";
		if (!$this->senderMobileNumber->Raw)
			$this->senderMobileNumber->CurrentValue = HtmlDecode($this->senderMobileNumber->CurrentValue);
		$this->senderMobileNumber->EditValue = $this->senderMobileNumber->CurrentValue;

		// StationId
		$this->StationId->EditAttrs["class"] = "form-control";
		$this->StationId->EditCustomAttributes = "";
		$this->StationId->EditValue = $this->StationId->CurrentValue;

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
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->District);
					$doc->exportCaption($this->Taluk);
					$doc->exportCaption($this->NameofSubDivision);
					$doc->exportCaption($this->TypeofStation);
					$doc->exportCaption($this->BasinName);
					$doc->exportCaption($this->SubBasinname);
					$doc->exportCaption($this->DamCatchment);
					$doc->exportCaption($this->Longitude);
					$doc->exportCaption($this->Latitude);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->senderMobileNumber);
					$doc->exportCaption($this->StationId);
				} else {
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->District);
					$doc->exportCaption($this->Taluk);
					$doc->exportCaption($this->NameofSubDivision);
					$doc->exportCaption($this->TypeofStation);
					$doc->exportCaption($this->BasinName);
					$doc->exportCaption($this->SubBasinname);
					$doc->exportCaption($this->DamCatchment);
					$doc->exportCaption($this->Longitude);
					$doc->exportCaption($this->Latitude);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->senderMobileNumber);
					$doc->exportCaption($this->StationId);
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
						$doc->exportField($this->StationName);
						$doc->exportField($this->District);
						$doc->exportField($this->Taluk);
						$doc->exportField($this->NameofSubDivision);
						$doc->exportField($this->TypeofStation);
						$doc->exportField($this->BasinName);
						$doc->exportField($this->SubBasinname);
						$doc->exportField($this->DamCatchment);
						$doc->exportField($this->Longitude);
						$doc->exportField($this->Latitude);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->senderMobileNumber);
						$doc->exportField($this->StationId);
					} else {
						$doc->exportField($this->StationName);
						$doc->exportField($this->District);
						$doc->exportField($this->Taluk);
						$doc->exportField($this->NameofSubDivision);
						$doc->exportField($this->TypeofStation);
						$doc->exportField($this->BasinName);
						$doc->exportField($this->SubBasinname);
						$doc->exportField($this->DamCatchment);
						$doc->exportField($this->Longitude);
						$doc->exportField($this->Latitude);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->senderMobileNumber);
						$doc->exportField($this->StationId);
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