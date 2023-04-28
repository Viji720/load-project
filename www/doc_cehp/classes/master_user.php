<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for master_user
 */
class master_user extends DbTable
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
	public $_UserId;
	public $UserName;
	public $UserAddress;
	public $StationId;
	public $TalukId;
	public $DistrictId;
	public $SubDivsionId;
	public $DivisionId;
	public $RoleId;
	public $UserPassword;
	public $UserEmail;
	public $UserMobileNumber;
	public $_UserProfile;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'master_user';
		$this->TableName = 'master_user';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`master_user`";
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

		// UserId
		$this->_UserId = new DbField('master_user', 'master_user', 'x__UserId', 'UserId', '`UserId`', '`UserId`', 200, 30, -1, FALSE, '`UserId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_UserId->IsPrimaryKey = TRUE; // Primary key field
		$this->_UserId->Nullable = FALSE; // NOT NULL field
		$this->_UserId->Required = TRUE; // Required field
		$this->_UserId->Sortable = TRUE; // Allow sort
		$this->fields['UserId'] = &$this->_UserId;

		// UserName
		$this->UserName = new DbField('master_user', 'master_user', 'x_UserName', 'UserName', '`UserName`', '`UserName`', 200, 100, -1, FALSE, '`UserName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UserName->Nullable = FALSE; // NOT NULL field
		$this->UserName->Required = TRUE; // Required field
		$this->UserName->Sortable = TRUE; // Allow sort
		$this->fields['UserName'] = &$this->UserName;

		// UserAddress
		$this->UserAddress = new DbField('master_user', 'master_user', 'x_UserAddress', 'UserAddress', '`UserAddress`', '`UserAddress`', 201, 500, -1, FALSE, '`UserAddress`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->UserAddress->Sortable = TRUE; // Allow sort
		$this->fields['UserAddress'] = &$this->UserAddress;

		// StationId
		$this->StationId = new DbField('master_user', 'master_user', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;

		// TalukId
		$this->TalukId = new DbField('master_user', 'master_user', 'x_TalukId', 'TalukId', '`TalukId`', '`TalukId`', 3, 11, -1, FALSE, '`TalukId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TalukId->Sortable = TRUE; // Allow sort
		$this->TalukId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TalukId'] = &$this->TalukId;

		// DistrictId
		$this->DistrictId = new DbField('master_user', 'master_user', 'x_DistrictId', 'DistrictId', '`DistrictId`', '`DistrictId`', 3, 11, -1, FALSE, '`DistrictId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DistrictId->Sortable = TRUE; // Allow sort
		$this->DistrictId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DistrictId'] = &$this->DistrictId;

		// SubDivsionId
		$this->SubDivsionId = new DbField('master_user', 'master_user', 'x_SubDivsionId', 'SubDivsionId', '`SubDivsionId`', '`SubDivsionId`', 3, 11, -1, FALSE, '`SubDivsionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubDivsionId->Sortable = TRUE; // Allow sort
		$this->SubDivsionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubDivsionId'] = &$this->SubDivsionId;

		// DivisionId
		$this->DivisionId = new DbField('master_user', 'master_user', 'x_DivisionId', 'DivisionId', '`DivisionId`', '`DivisionId`', 3, 11, -1, FALSE, '`DivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DivisionId->Sortable = TRUE; // Allow sort
		$this->DivisionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DivisionId'] = &$this->DivisionId;

		// RoleId
		$this->RoleId = new DbField('master_user', 'master_user', 'x_RoleId', 'RoleId', '`RoleId`', '`RoleId`', 3, 11, -1, FALSE, '`RoleId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RoleId->Sortable = TRUE; // Allow sort
		$this->RoleId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RoleId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->RoleId->Lookup = new Lookup('RoleId', 'master_user_roles', FALSE, 'RoleId', ["RoleName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->RoleId->Lookup = new Lookup('RoleId', 'master_user_roles', FALSE, 'RoleId', ["RoleName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->RoleId->Lookup = new Lookup('RoleId', 'master_user_roles', FALSE, 'RoleId', ["RoleName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->RoleId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RoleId'] = &$this->RoleId;

		// UserPassword
		$this->UserPassword = new DbField('master_user', 'master_user', 'x_UserPassword', 'UserPassword', '`UserPassword`', '`UserPassword`', 200, 50, -1, FALSE, '`UserPassword`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UserPassword->Required = TRUE; // Required field
		$this->UserPassword->Sortable = TRUE; // Allow sort
		$this->fields['UserPassword'] = &$this->UserPassword;

		// UserEmail
		$this->UserEmail = new DbField('master_user', 'master_user', 'x_UserEmail', 'UserEmail', '`UserEmail`', '`UserEmail`', 200, 100, -1, FALSE, '`UserEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UserEmail->Sortable = TRUE; // Allow sort
		$this->fields['UserEmail'] = &$this->UserEmail;

		// UserMobileNumber
		$this->UserMobileNumber = new DbField('master_user', 'master_user', 'x_UserMobileNumber', 'UserMobileNumber', '`UserMobileNumber`', '`UserMobileNumber`', 200, 13, -1, FALSE, '`UserMobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UserMobileNumber->Nullable = FALSE; // NOT NULL field
		$this->UserMobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['UserMobileNumber'] = &$this->UserMobileNumber;

		// UserProfile
		$this->_UserProfile = new DbField('master_user', 'master_user', 'x__UserProfile', 'UserProfile', '`UserProfile`', '`UserProfile`', 201, 500, -1, FALSE, '`UserProfile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->_UserProfile->Sortable = TRUE; // Allow sort
		$this->fields['UserProfile'] = &$this->_UserProfile;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`master_user`";
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
			if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME"))
				$value = Config("CASE_SENSITIVE_PASSWORD") ? EncryptPassword($value) : EncryptPassword(strtolower($value));
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
			if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME")) {
				if ($value == $this->fields[$name]->OldValue) // No need to update hashed password if not changed
					continue;
				$value = Config("CASE_SENSITIVE_PASSWORD") ? EncryptPassword($value) : EncryptPassword(strtolower($value));
			}
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
			if (array_key_exists('UserId', $rs))
				AddFilter($where, QuotedName('UserId', $this->Dbid) . '=' . QuotedValue($rs['UserId'], $this->_UserId->DataType, $this->Dbid));
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
		$this->_UserId->DbValue = $row['UserId'];
		$this->UserName->DbValue = $row['UserName'];
		$this->UserAddress->DbValue = $row['UserAddress'];
		$this->StationId->DbValue = $row['StationId'];
		$this->TalukId->DbValue = $row['TalukId'];
		$this->DistrictId->DbValue = $row['DistrictId'];
		$this->SubDivsionId->DbValue = $row['SubDivsionId'];
		$this->DivisionId->DbValue = $row['DivisionId'];
		$this->RoleId->DbValue = $row['RoleId'];
		$this->UserPassword->DbValue = $row['UserPassword'];
		$this->UserEmail->DbValue = $row['UserEmail'];
		$this->UserMobileNumber->DbValue = $row['UserMobileNumber'];
		$this->_UserProfile->DbValue = $row['UserProfile'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`UserId` = '@_UserId@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('UserId', $row) ? $row['UserId'] : NULL;
		else
			$val = $this->_UserId->OldValue !== NULL ? $this->_UserId->OldValue : $this->_UserId->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@_UserId@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "master_userlist.php";
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
		if ($pageName == "master_userview.php")
			return $Language->phrase("View");
		elseif ($pageName == "master_useredit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "master_useradd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "master_userlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("master_userview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("master_userview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "master_useradd.php?" . $this->getUrlParm($parm);
		else
			$url = "master_useradd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("master_useredit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("master_useradd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("master_userdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "_UserId:" . JsonEncode($this->_UserId->CurrentValue, "string");
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
		if ($this->_UserId->CurrentValue != NULL) {
			$url .= "_UserId=" . urlencode($this->_UserId->CurrentValue);
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
			if (Param("_UserId") !== NULL)
				$arKeys[] = Param("_UserId");
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
				$this->_UserId->CurrentValue = $key;
			else
				$this->_UserId->OldValue = $key;
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
		$this->_UserId->setDbValue($rs->fields('UserId'));
		$this->UserName->setDbValue($rs->fields('UserName'));
		$this->UserAddress->setDbValue($rs->fields('UserAddress'));
		$this->StationId->setDbValue($rs->fields('StationId'));
		$this->TalukId->setDbValue($rs->fields('TalukId'));
		$this->DistrictId->setDbValue($rs->fields('DistrictId'));
		$this->SubDivsionId->setDbValue($rs->fields('SubDivsionId'));
		$this->DivisionId->setDbValue($rs->fields('DivisionId'));
		$this->RoleId->setDbValue($rs->fields('RoleId'));
		$this->UserPassword->setDbValue($rs->fields('UserPassword'));
		$this->UserEmail->setDbValue($rs->fields('UserEmail'));
		$this->UserMobileNumber->setDbValue($rs->fields('UserMobileNumber'));
		$this->_UserProfile->setDbValue($rs->fields('UserProfile'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// UserId
		// UserName
		// UserAddress
		// StationId
		// TalukId
		// DistrictId
		// SubDivsionId
		// DivisionId
		// RoleId
		// UserPassword
		// UserEmail
		// UserMobileNumber
		// UserProfile
		// UserId

		$this->_UserId->ViewValue = $this->_UserId->CurrentValue;
		$this->_UserId->ViewCustomAttributes = "";

		// UserName
		$this->UserName->ViewValue = $this->UserName->CurrentValue;
		$this->UserName->ViewCustomAttributes = "";

		// UserAddress
		$this->UserAddress->ViewValue = $this->UserAddress->CurrentValue;
		$this->UserAddress->ViewCustomAttributes = "";

		// StationId
		$this->StationId->ViewValue = $this->StationId->CurrentValue;
		$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
		$this->StationId->ViewCustomAttributes = "";

		// TalukId
		$this->TalukId->ViewValue = $this->TalukId->CurrentValue;
		$this->TalukId->ViewValue = FormatNumber($this->TalukId->ViewValue, 0, -2, -2, -2);
		$this->TalukId->ViewCustomAttributes = "";

		// DistrictId
		$this->DistrictId->ViewValue = $this->DistrictId->CurrentValue;
		$this->DistrictId->ViewValue = FormatNumber($this->DistrictId->ViewValue, 0, -2, -2, -2);
		$this->DistrictId->ViewCustomAttributes = "";

		// SubDivsionId
		$this->SubDivsionId->ViewValue = $this->SubDivsionId->CurrentValue;
		$this->SubDivsionId->ViewValue = FormatNumber($this->SubDivsionId->ViewValue, 0, -2, -2, -2);
		$this->SubDivsionId->ViewCustomAttributes = "";

		// DivisionId
		$this->DivisionId->ViewValue = $this->DivisionId->CurrentValue;
		$this->DivisionId->ViewValue = FormatNumber($this->DivisionId->ViewValue, 0, -2, -2, -2);
		$this->DivisionId->ViewCustomAttributes = "";

		// RoleId
		if ($Security->canAdmin()) { // System admin
			$curVal = strval($this->RoleId->CurrentValue);
			if ($curVal != "") {
				$this->RoleId->ViewValue = $this->RoleId->lookupCacheOption($curVal);
				if ($this->RoleId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`RoleId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->RoleId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RoleId->ViewValue = $this->RoleId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RoleId->ViewValue = $this->RoleId->CurrentValue;
					}
				}
			} else {
				$this->RoleId->ViewValue = NULL;
			}
		} else {
			$this->RoleId->ViewValue = $Language->phrase("PasswordMask");
		}
		$this->RoleId->ViewCustomAttributes = "";

		// UserPassword
		$this->UserPassword->ViewValue = $this->UserPassword->CurrentValue;
		$this->UserPassword->ViewCustomAttributes = "";

		// UserEmail
		$this->UserEmail->ViewValue = $this->UserEmail->CurrentValue;
		$this->UserEmail->ViewCustomAttributes = "";

		// UserMobileNumber
		$this->UserMobileNumber->ViewValue = $this->UserMobileNumber->CurrentValue;
		$this->UserMobileNumber->ViewCustomAttributes = "";

		// UserProfile
		$this->_UserProfile->ViewValue = $this->_UserProfile->CurrentValue;
		$this->_UserProfile->ViewCustomAttributes = "";

		// UserId
		$this->_UserId->LinkCustomAttributes = "";
		$this->_UserId->HrefValue = "";
		$this->_UserId->TooltipValue = "";

		// UserName
		$this->UserName->LinkCustomAttributes = "";
		$this->UserName->HrefValue = "";
		$this->UserName->TooltipValue = "";

		// UserAddress
		$this->UserAddress->LinkCustomAttributes = "";
		$this->UserAddress->HrefValue = "";
		$this->UserAddress->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// TalukId
		$this->TalukId->LinkCustomAttributes = "";
		$this->TalukId->HrefValue = "";
		$this->TalukId->TooltipValue = "";

		// DistrictId
		$this->DistrictId->LinkCustomAttributes = "";
		$this->DistrictId->HrefValue = "";
		$this->DistrictId->TooltipValue = "";

		// SubDivsionId
		$this->SubDivsionId->LinkCustomAttributes = "";
		$this->SubDivsionId->HrefValue = "";
		$this->SubDivsionId->TooltipValue = "";

		// DivisionId
		$this->DivisionId->LinkCustomAttributes = "";
		$this->DivisionId->HrefValue = "";
		$this->DivisionId->TooltipValue = "";

		// RoleId
		$this->RoleId->LinkCustomAttributes = "";
		$this->RoleId->HrefValue = "";
		$this->RoleId->TooltipValue = "";

		// UserPassword
		$this->UserPassword->LinkCustomAttributes = "";
		$this->UserPassword->HrefValue = "";
		$this->UserPassword->TooltipValue = "";

		// UserEmail
		$this->UserEmail->LinkCustomAttributes = "";
		$this->UserEmail->HrefValue = "";
		$this->UserEmail->TooltipValue = "";

		// UserMobileNumber
		$this->UserMobileNumber->LinkCustomAttributes = "";
		$this->UserMobileNumber->HrefValue = "";
		$this->UserMobileNumber->TooltipValue = "";

		// UserProfile
		$this->_UserProfile->LinkCustomAttributes = "";
		$this->_UserProfile->HrefValue = "";
		$this->_UserProfile->TooltipValue = "";

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

		// UserId
		$this->_UserId->EditAttrs["class"] = "form-control";
		$this->_UserId->EditCustomAttributes = "";
		if (!$this->_UserId->Raw)
			$this->_UserId->CurrentValue = HtmlDecode($this->_UserId->CurrentValue);
		$this->_UserId->EditValue = $this->_UserId->CurrentValue;

		// UserName
		$this->UserName->EditAttrs["class"] = "form-control";
		$this->UserName->EditCustomAttributes = "";
		if (!$this->UserName->Raw)
			$this->UserName->CurrentValue = HtmlDecode($this->UserName->CurrentValue);
		$this->UserName->EditValue = $this->UserName->CurrentValue;

		// UserAddress
		$this->UserAddress->EditAttrs["class"] = "form-control";
		$this->UserAddress->EditCustomAttributes = "";
		$this->UserAddress->EditValue = $this->UserAddress->CurrentValue;

		// StationId
		$this->StationId->EditAttrs["class"] = "form-control";
		$this->StationId->EditCustomAttributes = "";
		$this->StationId->EditValue = $this->StationId->CurrentValue;

		// TalukId
		$this->TalukId->EditAttrs["class"] = "form-control";
		$this->TalukId->EditCustomAttributes = "";
		$this->TalukId->EditValue = $this->TalukId->CurrentValue;

		// DistrictId
		$this->DistrictId->EditAttrs["class"] = "form-control";
		$this->DistrictId->EditCustomAttributes = "";
		$this->DistrictId->EditValue = $this->DistrictId->CurrentValue;

		// SubDivsionId
		$this->SubDivsionId->EditAttrs["class"] = "form-control";
		$this->SubDivsionId->EditCustomAttributes = "";
		$this->SubDivsionId->EditValue = $this->SubDivsionId->CurrentValue;

		// DivisionId
		$this->DivisionId->EditAttrs["class"] = "form-control";
		$this->DivisionId->EditCustomAttributes = "";
		$this->DivisionId->EditValue = $this->DivisionId->CurrentValue;

		// RoleId
		$this->RoleId->EditAttrs["class"] = "form-control";
		$this->RoleId->EditCustomAttributes = "";
		if (!$Security->canAdmin()) { // System admin
			$this->RoleId->EditValue = $Language->phrase("PasswordMask");
		} else {
		}

		// UserPassword
		$this->UserPassword->EditAttrs["class"] = "form-control";
		$this->UserPassword->EditCustomAttributes = "";
		if (!$this->UserPassword->Raw)
			$this->UserPassword->CurrentValue = HtmlDecode($this->UserPassword->CurrentValue);
		$this->UserPassword->EditValue = $this->UserPassword->CurrentValue;

		// UserEmail
		$this->UserEmail->EditAttrs["class"] = "form-control";
		$this->UserEmail->EditCustomAttributes = "";
		if (!$this->UserEmail->Raw)
			$this->UserEmail->CurrentValue = HtmlDecode($this->UserEmail->CurrentValue);
		$this->UserEmail->EditValue = $this->UserEmail->CurrentValue;

		// UserMobileNumber
		$this->UserMobileNumber->EditAttrs["class"] = "form-control";
		$this->UserMobileNumber->EditCustomAttributes = "";
		if (!$this->UserMobileNumber->Raw)
			$this->UserMobileNumber->CurrentValue = HtmlDecode($this->UserMobileNumber->CurrentValue);
		$this->UserMobileNumber->EditValue = $this->UserMobileNumber->CurrentValue;

		// UserProfile
		$this->_UserProfile->EditAttrs["class"] = "form-control";
		$this->_UserProfile->EditCustomAttributes = "";
		$this->_UserProfile->EditValue = $this->_UserProfile->CurrentValue;

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
					$doc->exportCaption($this->_UserId);
					$doc->exportCaption($this->UserName);
					$doc->exportCaption($this->UserAddress);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->TalukId);
					$doc->exportCaption($this->DistrictId);
					$doc->exportCaption($this->SubDivsionId);
					$doc->exportCaption($this->DivisionId);
					$doc->exportCaption($this->RoleId);
					$doc->exportCaption($this->UserPassword);
					$doc->exportCaption($this->UserEmail);
					$doc->exportCaption($this->UserMobileNumber);
					$doc->exportCaption($this->_UserProfile);
				} else {
					$doc->exportCaption($this->_UserId);
					$doc->exportCaption($this->UserName);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->TalukId);
					$doc->exportCaption($this->DistrictId);
					$doc->exportCaption($this->SubDivsionId);
					$doc->exportCaption($this->DivisionId);
					$doc->exportCaption($this->RoleId);
					$doc->exportCaption($this->UserPassword);
					$doc->exportCaption($this->UserEmail);
					$doc->exportCaption($this->UserMobileNumber);
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
						$doc->exportField($this->_UserId);
						$doc->exportField($this->UserName);
						$doc->exportField($this->UserAddress);
						$doc->exportField($this->StationId);
						$doc->exportField($this->TalukId);
						$doc->exportField($this->DistrictId);
						$doc->exportField($this->SubDivsionId);
						$doc->exportField($this->DivisionId);
						$doc->exportField($this->RoleId);
						$doc->exportField($this->UserPassword);
						$doc->exportField($this->UserEmail);
						$doc->exportField($this->UserMobileNumber);
						$doc->exportField($this->_UserProfile);
					} else {
						$doc->exportField($this->_UserId);
						$doc->exportField($this->UserName);
						$doc->exportField($this->StationId);
						$doc->exportField($this->TalukId);
						$doc->exportField($this->DistrictId);
						$doc->exportField($this->SubDivsionId);
						$doc->exportField($this->DivisionId);
						$doc->exportField($this->RoleId);
						$doc->exportField($this->UserPassword);
						$doc->exportField($this->UserEmail);
						$doc->exportField($this->UserMobileNumber);
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

	// User ID filter
	public function getUserIDFilter($userId)
	{
		$userIdFilter = '`UserId` = ' . QuotedValue($userId, DATATYPE_STRING, Config("USER_TABLE_DBID"));
		return $userIdFilter;
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
				$filterWrk = '`UserId` IN (' . $filterWrk . ')';
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
		$sql = "SELECT " . $masterfld->Expression . " FROM `master_user`";
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