<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for tbl_sms_monthly_day
 */
class tbl_sms_monthly_day extends DbTable
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
	public $month_id;
	public $_01_rf;
	public $_02_rf;
	public $_03_rf;
	public $_04_rf;
	public $_05_rf;
	public $_06_rf;
	public $_07_rf;
	public $_08_rf;
	public $_09_rf;
	public $_10_rf;
	public $_11_rf;
	public $_12_rf;
	public $_13_rf;
	public $_14_rf;
	public $_15_rf;
	public $_16_rf;
	public $_17_rf;
	public $_18_rf;
	public $_19_rf;
	public $_20_rf;
	public $_21_rf;
	public $_22_rf;
	public $_23_rf;
	public $_24_rf;
	public $_25_rf;
	public $_26_rf;
	public $_27_rf;
	public $_28_rf;
	public $_29_rf;
	public $_30_rf;
	public $_31_rf;
	public $SubDivisionId;
	public $Water_Year;
	public $SenderMobileNumber;
	public $IsChanged;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tbl_sms_monthly_day';
		$this->TableName = 'tbl_sms_monthly_day';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`tbl_sms_monthly_day`";
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
		$this->Slno = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x_Slno', 'Slno', '`Slno`', '`Slno`', 3, 11, -1, FALSE, '`Slno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Slno->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Slno->IsPrimaryKey = TRUE; // Primary key field
		$this->Slno->Sortable = TRUE; // Allow sort
		$this->Slno->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Slno'] = &$this->Slno;

		// StationId
		$this->StationId = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->StationId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
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

		// month_id
		$this->month_id = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x_month_id', 'month_id', '`month_id`', '`month_id`', 200, 2, -1, FALSE, '`month_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->month_id->Sortable = TRUE; // Allow sort
		$this->month_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->month_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->month_id->Lookup = new Lookup('month_id', 'lkp_month_id', FALSE, 'month_id', ["month_Name","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->month_id->Lookup = new Lookup('month_id', 'lkp_month_id', FALSE, 'month_id', ["month_Name","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->month_id->Lookup = new Lookup('month_id', 'lkp_month_id', FALSE, 'month_id', ["month_Name","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['month_id'] = &$this->month_id;

		// 01_rf
		$this->_01_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__01_rf', '01_rf', '`01_rf`', '`01_rf`', 4, 7, -1, FALSE, '`01_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_01_rf->Sortable = TRUE; // Allow sort
		$this->_01_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['01_rf'] = &$this->_01_rf;

		// 02_rf
		$this->_02_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__02_rf', '02_rf', '`02_rf`', '`02_rf`', 4, 7, -1, FALSE, '`02_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_02_rf->Sortable = TRUE; // Allow sort
		$this->_02_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['02_rf'] = &$this->_02_rf;

		// 03_rf
		$this->_03_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__03_rf', '03_rf', '`03_rf`', '`03_rf`', 4, 7, -1, FALSE, '`03_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_03_rf->Sortable = TRUE; // Allow sort
		$this->_03_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['03_rf'] = &$this->_03_rf;

		// 04_rf
		$this->_04_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__04_rf', '04_rf', '`04_rf`', '`04_rf`', 4, 7, -1, FALSE, '`04_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_04_rf->Sortable = TRUE; // Allow sort
		$this->_04_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['04_rf'] = &$this->_04_rf;

		// 05_rf
		$this->_05_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__05_rf', '05_rf', '`05_rf`', '`05_rf`', 4, 7, -1, FALSE, '`05_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_05_rf->Sortable = TRUE; // Allow sort
		$this->_05_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['05_rf'] = &$this->_05_rf;

		// 06_rf
		$this->_06_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__06_rf', '06_rf', '`06_rf`', '`06_rf`', 4, 7, -1, FALSE, '`06_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_06_rf->Sortable = TRUE; // Allow sort
		$this->_06_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['06_rf'] = &$this->_06_rf;

		// 07_rf
		$this->_07_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__07_rf', '07_rf', '`07_rf`', '`07_rf`', 4, 7, -1, FALSE, '`07_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_07_rf->Sortable = TRUE; // Allow sort
		$this->_07_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['07_rf'] = &$this->_07_rf;

		// 08_rf
		$this->_08_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__08_rf', '08_rf', '`08_rf`', '`08_rf`', 4, 7, -1, FALSE, '`08_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_08_rf->Sortable = TRUE; // Allow sort
		$this->_08_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['08_rf'] = &$this->_08_rf;

		// 09_rf
		$this->_09_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__09_rf', '09_rf', '`09_rf`', '`09_rf`', 4, 7, -1, FALSE, '`09_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_09_rf->Sortable = TRUE; // Allow sort
		$this->_09_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['09_rf'] = &$this->_09_rf;

		// 10_rf
		$this->_10_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__10_rf', '10_rf', '`10_rf`', '`10_rf`', 4, 7, -1, FALSE, '`10_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_10_rf->Sortable = TRUE; // Allow sort
		$this->_10_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['10_rf'] = &$this->_10_rf;

		// 11_rf
		$this->_11_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__11_rf', '11_rf', '`11_rf`', '`11_rf`', 4, 7, -1, FALSE, '`11_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_11_rf->Sortable = TRUE; // Allow sort
		$this->_11_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['11_rf'] = &$this->_11_rf;

		// 12_rf
		$this->_12_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__12_rf', '12_rf', '`12_rf`', '`12_rf`', 4, 7, -1, FALSE, '`12_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_12_rf->Sortable = TRUE; // Allow sort
		$this->_12_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['12_rf'] = &$this->_12_rf;

		// 13_rf
		$this->_13_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__13_rf', '13_rf', '`13_rf`', '`13_rf`', 4, 7, -1, FALSE, '`13_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_13_rf->Sortable = TRUE; // Allow sort
		$this->_13_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['13_rf'] = &$this->_13_rf;

		// 14_rf
		$this->_14_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__14_rf', '14_rf', '`14_rf`', '`14_rf`', 4, 7, -1, FALSE, '`14_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_14_rf->Sortable = TRUE; // Allow sort
		$this->_14_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['14_rf'] = &$this->_14_rf;

		// 15_rf
		$this->_15_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__15_rf', '15_rf', '`15_rf`', '`15_rf`', 4, 7, -1, FALSE, '`15_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_15_rf->Sortable = TRUE; // Allow sort
		$this->_15_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['15_rf'] = &$this->_15_rf;

		// 16_rf
		$this->_16_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__16_rf', '16_rf', '`16_rf`', '`16_rf`', 4, 7, -1, FALSE, '`16_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_16_rf->Sortable = TRUE; // Allow sort
		$this->_16_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['16_rf'] = &$this->_16_rf;

		// 17_rf
		$this->_17_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__17_rf', '17_rf', '`17_rf`', '`17_rf`', 4, 7, -1, FALSE, '`17_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_17_rf->Sortable = TRUE; // Allow sort
		$this->_17_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['17_rf'] = &$this->_17_rf;

		// 18_rf
		$this->_18_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__18_rf', '18_rf', '`18_rf`', '`18_rf`', 4, 7, -1, FALSE, '`18_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_18_rf->Sortable = TRUE; // Allow sort
		$this->_18_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['18_rf'] = &$this->_18_rf;

		// 19_rf
		$this->_19_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__19_rf', '19_rf', '`19_rf`', '`19_rf`', 4, 7, -1, FALSE, '`19_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_19_rf->Sortable = TRUE; // Allow sort
		$this->_19_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['19_rf'] = &$this->_19_rf;

		// 20_rf
		$this->_20_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__20_rf', '20_rf', '`20_rf`', '`20_rf`', 4, 7, -1, FALSE, '`20_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_20_rf->Sortable = TRUE; // Allow sort
		$this->_20_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['20_rf'] = &$this->_20_rf;

		// 21_rf
		$this->_21_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__21_rf', '21_rf', '`21_rf`', '`21_rf`', 4, 7, -1, FALSE, '`21_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_21_rf->Sortable = TRUE; // Allow sort
		$this->_21_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['21_rf'] = &$this->_21_rf;

		// 22_rf
		$this->_22_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__22_rf', '22_rf', '`22_rf`', '`22_rf`', 4, 7, -1, FALSE, '`22_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_22_rf->Sortable = TRUE; // Allow sort
		$this->_22_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['22_rf'] = &$this->_22_rf;

		// 23_rf
		$this->_23_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__23_rf', '23_rf', '`23_rf`', '`23_rf`', 4, 7, -1, FALSE, '`23_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_23_rf->Sortable = TRUE; // Allow sort
		$this->_23_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['23_rf'] = &$this->_23_rf;

		// 24_rf
		$this->_24_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__24_rf', '24_rf', '`24_rf`', '`24_rf`', 4, 7, -1, FALSE, '`24_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_24_rf->Sortable = TRUE; // Allow sort
		$this->_24_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['24_rf'] = &$this->_24_rf;

		// 25_rf
		$this->_25_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__25_rf', '25_rf', '`25_rf`', '`25_rf`', 4, 7, -1, FALSE, '`25_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_25_rf->Sortable = TRUE; // Allow sort
		$this->_25_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['25_rf'] = &$this->_25_rf;

		// 26_rf
		$this->_26_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__26_rf', '26_rf', '`26_rf`', '`26_rf`', 4, 7, -1, FALSE, '`26_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_26_rf->Sortable = TRUE; // Allow sort
		$this->_26_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['26_rf'] = &$this->_26_rf;

		// 27_rf
		$this->_27_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__27_rf', '27_rf', '`27_rf`', '`27_rf`', 4, 7, -1, FALSE, '`27_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_27_rf->Sortable = TRUE; // Allow sort
		$this->_27_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['27_rf'] = &$this->_27_rf;

		// 28_rf
		$this->_28_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__28_rf', '28_rf', '`28_rf`', '`28_rf`', 4, 7, -1, FALSE, '`28_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_28_rf->Sortable = TRUE; // Allow sort
		$this->_28_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['28_rf'] = &$this->_28_rf;

		// 29_rf
		$this->_29_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__29_rf', '29_rf', '`29_rf`', '`29_rf`', 4, 7, -1, FALSE, '`29_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_29_rf->Sortable = TRUE; // Allow sort
		$this->_29_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['29_rf'] = &$this->_29_rf;

		// 30_rf
		$this->_30_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__30_rf', '30_rf', '`30_rf`', '`30_rf`', 4, 7, -1, FALSE, '`30_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_30_rf->Sortable = TRUE; // Allow sort
		$this->_30_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['30_rf'] = &$this->_30_rf;

		// 31_rf
		$this->_31_rf = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x__31_rf', '31_rf', '`31_rf`', '`31_rf`', 4, 7, -1, FALSE, '`31_rf`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_31_rf->Sortable = TRUE; // Allow sort
		$this->_31_rf->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['31_rf'] = &$this->_31_rf;

		// SubDivisionId
		$this->SubDivisionId = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x_SubDivisionId', 'SubDivisionId', '`SubDivisionId`', '`SubDivisionId`', 3, 11, -1, FALSE, '`SubDivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SubDivisionId->Nullable = FALSE; // NOT NULL field
		$this->SubDivisionId->Required = TRUE; // Required field
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

		// Water_Year
		$this->Water_Year = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x_Water_Year', 'Water_Year', '`Water_Year`', '`Water_Year`', 200, 9, -1, FALSE, '`Water_Year`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Water_Year->Sortable = TRUE; // Allow sort
		$this->fields['Water_Year'] = &$this->Water_Year;

		// SenderMobileNumber
		$this->SenderMobileNumber = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x_SenderMobileNumber', 'SenderMobileNumber', '`SenderMobileNumber`', '`SenderMobileNumber`', 200, 25, -1, FALSE, '`SenderMobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SenderMobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['SenderMobileNumber'] = &$this->SenderMobileNumber;

		// IsChanged
		$this->IsChanged = new DbField('tbl_sms_monthly_day', 'tbl_sms_monthly_day', 'x_IsChanged', 'IsChanged', '`IsChanged`', '`IsChanged`', 200, 1, -1, FALSE, '`IsChanged`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IsChanged->Nullable = FALSE; // NOT NULL field
		$this->IsChanged->Sortable = TRUE; // Allow sort
		$this->fields['IsChanged'] = &$this->IsChanged;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`tbl_sms_monthly_day`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`StationId` ASC,`month_id` ASC";
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
		$this->month_id->DbValue = $row['month_id'];
		$this->_01_rf->DbValue = $row['01_rf'];
		$this->_02_rf->DbValue = $row['02_rf'];
		$this->_03_rf->DbValue = $row['03_rf'];
		$this->_04_rf->DbValue = $row['04_rf'];
		$this->_05_rf->DbValue = $row['05_rf'];
		$this->_06_rf->DbValue = $row['06_rf'];
		$this->_07_rf->DbValue = $row['07_rf'];
		$this->_08_rf->DbValue = $row['08_rf'];
		$this->_09_rf->DbValue = $row['09_rf'];
		$this->_10_rf->DbValue = $row['10_rf'];
		$this->_11_rf->DbValue = $row['11_rf'];
		$this->_12_rf->DbValue = $row['12_rf'];
		$this->_13_rf->DbValue = $row['13_rf'];
		$this->_14_rf->DbValue = $row['14_rf'];
		$this->_15_rf->DbValue = $row['15_rf'];
		$this->_16_rf->DbValue = $row['16_rf'];
		$this->_17_rf->DbValue = $row['17_rf'];
		$this->_18_rf->DbValue = $row['18_rf'];
		$this->_19_rf->DbValue = $row['19_rf'];
		$this->_20_rf->DbValue = $row['20_rf'];
		$this->_21_rf->DbValue = $row['21_rf'];
		$this->_22_rf->DbValue = $row['22_rf'];
		$this->_23_rf->DbValue = $row['23_rf'];
		$this->_24_rf->DbValue = $row['24_rf'];
		$this->_25_rf->DbValue = $row['25_rf'];
		$this->_26_rf->DbValue = $row['26_rf'];
		$this->_27_rf->DbValue = $row['27_rf'];
		$this->_28_rf->DbValue = $row['28_rf'];
		$this->_29_rf->DbValue = $row['29_rf'];
		$this->_30_rf->DbValue = $row['30_rf'];
		$this->_31_rf->DbValue = $row['31_rf'];
		$this->SubDivisionId->DbValue = $row['SubDivisionId'];
		$this->Water_Year->DbValue = $row['Water_Year'];
		$this->SenderMobileNumber->DbValue = $row['SenderMobileNumber'];
		$this->IsChanged->DbValue = $row['IsChanged'];
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
			return "tbl_sms_monthly_daylist.php";
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
		if ($pageName == "tbl_sms_monthly_dayview.php")
			return $Language->phrase("View");
		elseif ($pageName == "tbl_sms_monthly_dayedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tbl_sms_monthly_dayadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tbl_sms_monthly_daylist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("tbl_sms_monthly_dayview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tbl_sms_monthly_dayview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "tbl_sms_monthly_dayadd.php?" . $this->getUrlParm($parm);
		else
			$url = "tbl_sms_monthly_dayadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tbl_sms_monthly_dayedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("tbl_sms_monthly_dayadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("tbl_sms_monthly_daydelete.php", $this->getUrlParm());
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
		$this->month_id->setDbValue($rs->fields('month_id'));
		$this->_01_rf->setDbValue($rs->fields('01_rf'));
		$this->_02_rf->setDbValue($rs->fields('02_rf'));
		$this->_03_rf->setDbValue($rs->fields('03_rf'));
		$this->_04_rf->setDbValue($rs->fields('04_rf'));
		$this->_05_rf->setDbValue($rs->fields('05_rf'));
		$this->_06_rf->setDbValue($rs->fields('06_rf'));
		$this->_07_rf->setDbValue($rs->fields('07_rf'));
		$this->_08_rf->setDbValue($rs->fields('08_rf'));
		$this->_09_rf->setDbValue($rs->fields('09_rf'));
		$this->_10_rf->setDbValue($rs->fields('10_rf'));
		$this->_11_rf->setDbValue($rs->fields('11_rf'));
		$this->_12_rf->setDbValue($rs->fields('12_rf'));
		$this->_13_rf->setDbValue($rs->fields('13_rf'));
		$this->_14_rf->setDbValue($rs->fields('14_rf'));
		$this->_15_rf->setDbValue($rs->fields('15_rf'));
		$this->_16_rf->setDbValue($rs->fields('16_rf'));
		$this->_17_rf->setDbValue($rs->fields('17_rf'));
		$this->_18_rf->setDbValue($rs->fields('18_rf'));
		$this->_19_rf->setDbValue($rs->fields('19_rf'));
		$this->_20_rf->setDbValue($rs->fields('20_rf'));
		$this->_21_rf->setDbValue($rs->fields('21_rf'));
		$this->_22_rf->setDbValue($rs->fields('22_rf'));
		$this->_23_rf->setDbValue($rs->fields('23_rf'));
		$this->_24_rf->setDbValue($rs->fields('24_rf'));
		$this->_25_rf->setDbValue($rs->fields('25_rf'));
		$this->_26_rf->setDbValue($rs->fields('26_rf'));
		$this->_27_rf->setDbValue($rs->fields('27_rf'));
		$this->_28_rf->setDbValue($rs->fields('28_rf'));
		$this->_29_rf->setDbValue($rs->fields('29_rf'));
		$this->_30_rf->setDbValue($rs->fields('30_rf'));
		$this->_31_rf->setDbValue($rs->fields('31_rf'));
		$this->SubDivisionId->setDbValue($rs->fields('SubDivisionId'));
		$this->Water_Year->setDbValue($rs->fields('Water_Year'));
		$this->SenderMobileNumber->setDbValue($rs->fields('SenderMobileNumber'));
		$this->IsChanged->setDbValue($rs->fields('IsChanged'));
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
		// month_id
		// 01_rf
		// 02_rf
		// 03_rf
		// 04_rf
		// 05_rf
		// 06_rf
		// 07_rf
		// 08_rf
		// 09_rf
		// 10_rf
		// 11_rf
		// 12_rf
		// 13_rf
		// 14_rf
		// 15_rf
		// 16_rf
		// 17_rf
		// 18_rf
		// 19_rf
		// 20_rf
		// 21_rf
		// 22_rf
		// 23_rf
		// 24_rf
		// 25_rf
		// 26_rf
		// 27_rf
		// 28_rf
		// 29_rf
		// 30_rf
		// 31_rf
		// SubDivisionId
		// Water_Year
		// SenderMobileNumber
		// IsChanged
		// Slno

		$this->Slno->ViewValue = $this->Slno->CurrentValue;
		$this->Slno->ViewCustomAttributes = "";

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

		// month_id
		$curVal = strval($this->month_id->CurrentValue);
		if ($curVal != "") {
			$this->month_id->ViewValue = $this->month_id->lookupCacheOption($curVal);
			if ($this->month_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`month_id`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->month_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->month_id->ViewValue = $this->month_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->month_id->ViewValue = $this->month_id->CurrentValue;
				}
			}
		} else {
			$this->month_id->ViewValue = NULL;
		}
		$this->month_id->ViewCustomAttributes = "";

		// 01_rf
		$this->_01_rf->ViewValue = $this->_01_rf->CurrentValue;
		$this->_01_rf->ViewValue = FormatNumber($this->_01_rf->ViewValue, 2, -2, -2, -2);
		$this->_01_rf->ViewCustomAttributes = "";

		// 02_rf
		$this->_02_rf->ViewValue = $this->_02_rf->CurrentValue;
		$this->_02_rf->ViewValue = FormatNumber($this->_02_rf->ViewValue, 2, -2, -2, -2);
		$this->_02_rf->ViewCustomAttributes = "";

		// 03_rf
		$this->_03_rf->ViewValue = $this->_03_rf->CurrentValue;
		$this->_03_rf->ViewValue = FormatNumber($this->_03_rf->ViewValue, 2, -2, -2, -2);
		$this->_03_rf->ViewCustomAttributes = "";

		// 04_rf
		$this->_04_rf->ViewValue = $this->_04_rf->CurrentValue;
		$this->_04_rf->ViewValue = FormatNumber($this->_04_rf->ViewValue, 2, -2, -2, -2);
		$this->_04_rf->ViewCustomAttributes = "";

		// 05_rf
		$this->_05_rf->ViewValue = $this->_05_rf->CurrentValue;
		$this->_05_rf->ViewValue = FormatNumber($this->_05_rf->ViewValue, 2, -2, -2, -2);
		$this->_05_rf->ViewCustomAttributes = "";

		// 06_rf
		$this->_06_rf->ViewValue = $this->_06_rf->CurrentValue;
		$this->_06_rf->ViewValue = FormatNumber($this->_06_rf->ViewValue, 2, -2, -2, -2);
		$this->_06_rf->ViewCustomAttributes = "";

		// 07_rf
		$this->_07_rf->ViewValue = $this->_07_rf->CurrentValue;
		$this->_07_rf->ViewValue = FormatNumber($this->_07_rf->ViewValue, 2, -2, -2, -2);
		$this->_07_rf->ViewCustomAttributes = "";

		// 08_rf
		$this->_08_rf->ViewValue = $this->_08_rf->CurrentValue;
		$this->_08_rf->ViewValue = FormatNumber($this->_08_rf->ViewValue, 2, -2, -2, -2);
		$this->_08_rf->ViewCustomAttributes = "";

		// 09_rf
		$this->_09_rf->ViewValue = $this->_09_rf->CurrentValue;
		$this->_09_rf->ViewValue = FormatNumber($this->_09_rf->ViewValue, 2, -2, -2, -2);
		$this->_09_rf->ViewCustomAttributes = "";

		// 10_rf
		$this->_10_rf->ViewValue = $this->_10_rf->CurrentValue;
		$this->_10_rf->ViewValue = FormatNumber($this->_10_rf->ViewValue, 2, -2, -2, -2);
		$this->_10_rf->ViewCustomAttributes = "";

		// 11_rf
		$this->_11_rf->ViewValue = $this->_11_rf->CurrentValue;
		$this->_11_rf->ViewValue = FormatNumber($this->_11_rf->ViewValue, 2, -2, -2, -2);
		$this->_11_rf->ViewCustomAttributes = "";

		// 12_rf
		$this->_12_rf->ViewValue = $this->_12_rf->CurrentValue;
		$this->_12_rf->ViewValue = FormatNumber($this->_12_rf->ViewValue, 2, -2, -2, -2);
		$this->_12_rf->ViewCustomAttributes = "";

		// 13_rf
		$this->_13_rf->ViewValue = $this->_13_rf->CurrentValue;
		$this->_13_rf->ViewValue = FormatNumber($this->_13_rf->ViewValue, 2, -2, -2, -2);
		$this->_13_rf->ViewCustomAttributes = "";

		// 14_rf
		$this->_14_rf->ViewValue = $this->_14_rf->CurrentValue;
		$this->_14_rf->ViewValue = FormatNumber($this->_14_rf->ViewValue, 2, -2, -2, -2);
		$this->_14_rf->ViewCustomAttributes = "";

		// 15_rf
		$this->_15_rf->ViewValue = $this->_15_rf->CurrentValue;
		$this->_15_rf->ViewValue = FormatNumber($this->_15_rf->ViewValue, 2, -2, -2, -2);
		$this->_15_rf->ViewCustomAttributes = "";

		// 16_rf
		$this->_16_rf->ViewValue = $this->_16_rf->CurrentValue;
		$this->_16_rf->ViewValue = FormatNumber($this->_16_rf->ViewValue, 2, -2, -2, -2);
		$this->_16_rf->ViewCustomAttributes = "";

		// 17_rf
		$this->_17_rf->ViewValue = $this->_17_rf->CurrentValue;
		$this->_17_rf->ViewValue = FormatNumber($this->_17_rf->ViewValue, 2, -2, -2, -2);
		$this->_17_rf->ViewCustomAttributes = "";

		// 18_rf
		$this->_18_rf->ViewValue = $this->_18_rf->CurrentValue;
		$this->_18_rf->ViewValue = FormatNumber($this->_18_rf->ViewValue, 2, -2, -2, -2);
		$this->_18_rf->ViewCustomAttributes = "";

		// 19_rf
		$this->_19_rf->ViewValue = $this->_19_rf->CurrentValue;
		$this->_19_rf->ViewValue = FormatNumber($this->_19_rf->ViewValue, 2, -2, -2, -2);
		$this->_19_rf->ViewCustomAttributes = "";

		// 20_rf
		$this->_20_rf->ViewValue = $this->_20_rf->CurrentValue;
		$this->_20_rf->ViewValue = FormatNumber($this->_20_rf->ViewValue, 2, -2, -2, -2);
		$this->_20_rf->ViewCustomAttributes = "";

		// 21_rf
		$this->_21_rf->ViewValue = $this->_21_rf->CurrentValue;
		$this->_21_rf->ViewValue = FormatNumber($this->_21_rf->ViewValue, 2, -2, -2, -2);
		$this->_21_rf->ViewCustomAttributes = "";

		// 22_rf
		$this->_22_rf->ViewValue = $this->_22_rf->CurrentValue;
		$this->_22_rf->ViewValue = FormatNumber($this->_22_rf->ViewValue, 2, -2, -2, -2);
		$this->_22_rf->ViewCustomAttributes = "";

		// 23_rf
		$this->_23_rf->ViewValue = $this->_23_rf->CurrentValue;
		$this->_23_rf->ViewValue = FormatNumber($this->_23_rf->ViewValue, 2, -2, -2, -2);
		$this->_23_rf->ViewCustomAttributes = "";

		// 24_rf
		$this->_24_rf->ViewValue = $this->_24_rf->CurrentValue;
		$this->_24_rf->ViewValue = FormatNumber($this->_24_rf->ViewValue, 2, -2, -2, -2);
		$this->_24_rf->ViewCustomAttributes = "";

		// 25_rf
		$this->_25_rf->ViewValue = $this->_25_rf->CurrentValue;
		$this->_25_rf->ViewValue = FormatNumber($this->_25_rf->ViewValue, 2, -2, -2, -2);
		$this->_25_rf->ViewCustomAttributes = "";

		// 26_rf
		$this->_26_rf->ViewValue = $this->_26_rf->CurrentValue;
		$this->_26_rf->ViewValue = FormatNumber($this->_26_rf->ViewValue, 2, -2, -2, -2);
		$this->_26_rf->ViewCustomAttributes = "";

		// 27_rf
		$this->_27_rf->ViewValue = $this->_27_rf->CurrentValue;
		$this->_27_rf->ViewValue = FormatNumber($this->_27_rf->ViewValue, 2, -2, -2, -2);
		$this->_27_rf->ViewCustomAttributes = "";

		// 28_rf
		$this->_28_rf->ViewValue = $this->_28_rf->CurrentValue;
		$this->_28_rf->ViewValue = FormatNumber($this->_28_rf->ViewValue, 2, -2, -2, -2);
		$this->_28_rf->ViewCustomAttributes = "";

		// 29_rf
		$this->_29_rf->ViewValue = $this->_29_rf->CurrentValue;
		$this->_29_rf->ViewValue = FormatNumber($this->_29_rf->ViewValue, 2, -2, -2, -2);
		$this->_29_rf->ViewCustomAttributes = "";

		// 30_rf
		$this->_30_rf->ViewValue = $this->_30_rf->CurrentValue;
		$this->_30_rf->ViewValue = FormatNumber($this->_30_rf->ViewValue, 2, -2, -2, -2);
		$this->_30_rf->ViewCustomAttributes = "";

		// 31_rf
		$this->_31_rf->ViewValue = $this->_31_rf->CurrentValue;
		$this->_31_rf->ViewValue = FormatNumber($this->_31_rf->ViewValue, 2, -2, -2, -2);
		$this->_31_rf->ViewCustomAttributes = "";

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

		// Water_Year
		$this->Water_Year->ViewValue = $this->Water_Year->CurrentValue;
		$this->Water_Year->ViewCustomAttributes = "";

		// SenderMobileNumber
		$this->SenderMobileNumber->ViewValue = $this->SenderMobileNumber->CurrentValue;
		$this->SenderMobileNumber->ViewCustomAttributes = "";

		// IsChanged
		$this->IsChanged->ViewValue = $this->IsChanged->CurrentValue;
		$this->IsChanged->ViewCustomAttributes = "";

		// Slno
		$this->Slno->LinkCustomAttributes = "";
		$this->Slno->HrefValue = "";
		$this->Slno->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// month_id
		$this->month_id->LinkCustomAttributes = "";
		$this->month_id->HrefValue = "";
		$this->month_id->TooltipValue = "";

		// 01_rf
		$this->_01_rf->LinkCustomAttributes = "";
		$this->_01_rf->HrefValue = "";
		$this->_01_rf->TooltipValue = "";

		// 02_rf
		$this->_02_rf->LinkCustomAttributes = "";
		$this->_02_rf->HrefValue = "";
		$this->_02_rf->TooltipValue = "";

		// 03_rf
		$this->_03_rf->LinkCustomAttributes = "";
		$this->_03_rf->HrefValue = "";
		$this->_03_rf->TooltipValue = "";

		// 04_rf
		$this->_04_rf->LinkCustomAttributes = "";
		$this->_04_rf->HrefValue = "";
		$this->_04_rf->TooltipValue = "";

		// 05_rf
		$this->_05_rf->LinkCustomAttributes = "";
		$this->_05_rf->HrefValue = "";
		$this->_05_rf->TooltipValue = "";

		// 06_rf
		$this->_06_rf->LinkCustomAttributes = "";
		$this->_06_rf->HrefValue = "";
		$this->_06_rf->TooltipValue = "";

		// 07_rf
		$this->_07_rf->LinkCustomAttributes = "";
		$this->_07_rf->HrefValue = "";
		$this->_07_rf->TooltipValue = "";

		// 08_rf
		$this->_08_rf->LinkCustomAttributes = "";
		$this->_08_rf->HrefValue = "";
		$this->_08_rf->TooltipValue = "";

		// 09_rf
		$this->_09_rf->LinkCustomAttributes = "";
		$this->_09_rf->HrefValue = "";
		$this->_09_rf->TooltipValue = "";

		// 10_rf
		$this->_10_rf->LinkCustomAttributes = "";
		$this->_10_rf->HrefValue = "";
		$this->_10_rf->TooltipValue = "";

		// 11_rf
		$this->_11_rf->LinkCustomAttributes = "";
		$this->_11_rf->HrefValue = "";
		$this->_11_rf->TooltipValue = "";

		// 12_rf
		$this->_12_rf->LinkCustomAttributes = "";
		$this->_12_rf->HrefValue = "";
		$this->_12_rf->TooltipValue = "";

		// 13_rf
		$this->_13_rf->LinkCustomAttributes = "";
		$this->_13_rf->HrefValue = "";
		$this->_13_rf->TooltipValue = "";

		// 14_rf
		$this->_14_rf->LinkCustomAttributes = "";
		$this->_14_rf->HrefValue = "";
		$this->_14_rf->TooltipValue = "";

		// 15_rf
		$this->_15_rf->LinkCustomAttributes = "";
		$this->_15_rf->HrefValue = "";
		$this->_15_rf->TooltipValue = "";

		// 16_rf
		$this->_16_rf->LinkCustomAttributes = "";
		$this->_16_rf->HrefValue = "";
		$this->_16_rf->TooltipValue = "";

		// 17_rf
		$this->_17_rf->LinkCustomAttributes = "";
		$this->_17_rf->HrefValue = "";
		$this->_17_rf->TooltipValue = "";

		// 18_rf
		$this->_18_rf->LinkCustomAttributes = "";
		$this->_18_rf->HrefValue = "";
		$this->_18_rf->TooltipValue = "";

		// 19_rf
		$this->_19_rf->LinkCustomAttributes = "";
		$this->_19_rf->HrefValue = "";
		$this->_19_rf->TooltipValue = "";

		// 20_rf
		$this->_20_rf->LinkCustomAttributes = "";
		$this->_20_rf->HrefValue = "";
		$this->_20_rf->TooltipValue = "";

		// 21_rf
		$this->_21_rf->LinkCustomAttributes = "";
		$this->_21_rf->HrefValue = "";
		$this->_21_rf->TooltipValue = "";

		// 22_rf
		$this->_22_rf->LinkCustomAttributes = "";
		$this->_22_rf->HrefValue = "";
		$this->_22_rf->TooltipValue = "";

		// 23_rf
		$this->_23_rf->LinkCustomAttributes = "";
		$this->_23_rf->HrefValue = "";
		$this->_23_rf->TooltipValue = "";

		// 24_rf
		$this->_24_rf->LinkCustomAttributes = "";
		$this->_24_rf->HrefValue = "";
		$this->_24_rf->TooltipValue = "";

		// 25_rf
		$this->_25_rf->LinkCustomAttributes = "";
		$this->_25_rf->HrefValue = "";
		$this->_25_rf->TooltipValue = "";

		// 26_rf
		$this->_26_rf->LinkCustomAttributes = "";
		$this->_26_rf->HrefValue = "";
		$this->_26_rf->TooltipValue = "";

		// 27_rf
		$this->_27_rf->LinkCustomAttributes = "";
		$this->_27_rf->HrefValue = "";
		$this->_27_rf->TooltipValue = "";

		// 28_rf
		$this->_28_rf->LinkCustomAttributes = "";
		$this->_28_rf->HrefValue = "";
		$this->_28_rf->TooltipValue = "";

		// 29_rf
		$this->_29_rf->LinkCustomAttributes = "";
		$this->_29_rf->HrefValue = "";
		$this->_29_rf->TooltipValue = "";

		// 30_rf
		$this->_30_rf->LinkCustomAttributes = "";
		$this->_30_rf->HrefValue = "";
		$this->_30_rf->TooltipValue = "";

		// 31_rf
		$this->_31_rf->LinkCustomAttributes = "";
		$this->_31_rf->HrefValue = "";
		$this->_31_rf->TooltipValue = "";

		// SubDivisionId
		$this->SubDivisionId->LinkCustomAttributes = "";
		$this->SubDivisionId->HrefValue = "";
		$this->SubDivisionId->TooltipValue = "";

		// Water_Year
		$this->Water_Year->LinkCustomAttributes = "";
		$this->Water_Year->HrefValue = "";
		$this->Water_Year->TooltipValue = "";

		// SenderMobileNumber
		$this->SenderMobileNumber->LinkCustomAttributes = "";
		$this->SenderMobileNumber->HrefValue = "";
		$this->SenderMobileNumber->TooltipValue = "";

		// IsChanged
		$this->IsChanged->LinkCustomAttributes = "";
		$this->IsChanged->HrefValue = "";
		$this->IsChanged->TooltipValue = "";

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
		$curVal = strval($this->StationId->CurrentValue);
		if ($curVal != "") {
			$this->StationId->EditValue = $this->StationId->lookupCacheOption($curVal);
			if ($this->StationId->EditValue === NULL) { // Lookup from database
				$filterWrk = "`StationId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->StationId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->StationId->EditValue = $this->StationId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->StationId->EditValue = $this->StationId->CurrentValue;
				}
			}
		} else {
			$this->StationId->EditValue = NULL;
		}
		$this->StationId->ViewCustomAttributes = "";

		// month_id
		$this->month_id->EditAttrs["class"] = "form-control";
		$this->month_id->EditCustomAttributes = "";
		$curVal = strval($this->month_id->CurrentValue);
		if ($curVal != "") {
			$this->month_id->EditValue = $this->month_id->lookupCacheOption($curVal);
			if ($this->month_id->EditValue === NULL) { // Lookup from database
				$filterWrk = "`month_id`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->month_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->month_id->EditValue = $this->month_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->month_id->EditValue = $this->month_id->CurrentValue;
				}
			}
		} else {
			$this->month_id->EditValue = NULL;
		}
		$this->month_id->ViewCustomAttributes = "";

		// 01_rf
		$this->_01_rf->EditAttrs["class"] = "form-control";
		$this->_01_rf->EditCustomAttributes = "";
		$this->_01_rf->EditValue = $this->_01_rf->CurrentValue;
		if (strval($this->_01_rf->EditValue) != "" && is_numeric($this->_01_rf->EditValue))
			$this->_01_rf->EditValue = FormatNumber($this->_01_rf->EditValue, -2, -2, -2, -2);
		

		// 02_rf
		$this->_02_rf->EditAttrs["class"] = "form-control";
		$this->_02_rf->EditCustomAttributes = "";
		$this->_02_rf->EditValue = $this->_02_rf->CurrentValue;
		if (strval($this->_02_rf->EditValue) != "" && is_numeric($this->_02_rf->EditValue))
			$this->_02_rf->EditValue = FormatNumber($this->_02_rf->EditValue, -2, -2, -2, -2);
		

		// 03_rf
		$this->_03_rf->EditAttrs["class"] = "form-control";
		$this->_03_rf->EditCustomAttributes = "";
		$this->_03_rf->EditValue = $this->_03_rf->CurrentValue;
		if (strval($this->_03_rf->EditValue) != "" && is_numeric($this->_03_rf->EditValue))
			$this->_03_rf->EditValue = FormatNumber($this->_03_rf->EditValue, -2, -2, -2, -2);
		

		// 04_rf
		$this->_04_rf->EditAttrs["class"] = "form-control";
		$this->_04_rf->EditCustomAttributes = "";
		$this->_04_rf->EditValue = $this->_04_rf->CurrentValue;
		if (strval($this->_04_rf->EditValue) != "" && is_numeric($this->_04_rf->EditValue))
			$this->_04_rf->EditValue = FormatNumber($this->_04_rf->EditValue, -2, -2, -2, -2);
		

		// 05_rf
		$this->_05_rf->EditAttrs["class"] = "form-control";
		$this->_05_rf->EditCustomAttributes = "";
		$this->_05_rf->EditValue = $this->_05_rf->CurrentValue;
		if (strval($this->_05_rf->EditValue) != "" && is_numeric($this->_05_rf->EditValue))
			$this->_05_rf->EditValue = FormatNumber($this->_05_rf->EditValue, -2, -2, -2, -2);
		

		// 06_rf
		$this->_06_rf->EditAttrs["class"] = "form-control";
		$this->_06_rf->EditCustomAttributes = "";
		$this->_06_rf->EditValue = $this->_06_rf->CurrentValue;
		if (strval($this->_06_rf->EditValue) != "" && is_numeric($this->_06_rf->EditValue))
			$this->_06_rf->EditValue = FormatNumber($this->_06_rf->EditValue, -2, -2, -2, -2);
		

		// 07_rf
		$this->_07_rf->EditAttrs["class"] = "form-control";
		$this->_07_rf->EditCustomAttributes = "";
		$this->_07_rf->EditValue = $this->_07_rf->CurrentValue;
		if (strval($this->_07_rf->EditValue) != "" && is_numeric($this->_07_rf->EditValue))
			$this->_07_rf->EditValue = FormatNumber($this->_07_rf->EditValue, -2, -2, -2, -2);
		

		// 08_rf
		$this->_08_rf->EditAttrs["class"] = "form-control";
		$this->_08_rf->EditCustomAttributes = "";
		$this->_08_rf->EditValue = $this->_08_rf->CurrentValue;
		if (strval($this->_08_rf->EditValue) != "" && is_numeric($this->_08_rf->EditValue))
			$this->_08_rf->EditValue = FormatNumber($this->_08_rf->EditValue, -2, -2, -2, -2);
		

		// 09_rf
		$this->_09_rf->EditAttrs["class"] = "form-control";
		$this->_09_rf->EditCustomAttributes = "";
		$this->_09_rf->EditValue = $this->_09_rf->CurrentValue;
		if (strval($this->_09_rf->EditValue) != "" && is_numeric($this->_09_rf->EditValue))
			$this->_09_rf->EditValue = FormatNumber($this->_09_rf->EditValue, -2, -2, -2, -2);
		

		// 10_rf
		$this->_10_rf->EditAttrs["class"] = "form-control";
		$this->_10_rf->EditCustomAttributes = "";
		$this->_10_rf->EditValue = $this->_10_rf->CurrentValue;
		if (strval($this->_10_rf->EditValue) != "" && is_numeric($this->_10_rf->EditValue))
			$this->_10_rf->EditValue = FormatNumber($this->_10_rf->EditValue, -2, -2, -2, -2);
		

		// 11_rf
		$this->_11_rf->EditAttrs["class"] = "form-control";
		$this->_11_rf->EditCustomAttributes = "";
		$this->_11_rf->EditValue = $this->_11_rf->CurrentValue;
		if (strval($this->_11_rf->EditValue) != "" && is_numeric($this->_11_rf->EditValue))
			$this->_11_rf->EditValue = FormatNumber($this->_11_rf->EditValue, -2, -2, -2, -2);
		

		// 12_rf
		$this->_12_rf->EditAttrs["class"] = "form-control";
		$this->_12_rf->EditCustomAttributes = "";
		$this->_12_rf->EditValue = $this->_12_rf->CurrentValue;
		if (strval($this->_12_rf->EditValue) != "" && is_numeric($this->_12_rf->EditValue))
			$this->_12_rf->EditValue = FormatNumber($this->_12_rf->EditValue, -2, -2, -2, -2);
		

		// 13_rf
		$this->_13_rf->EditAttrs["class"] = "form-control";
		$this->_13_rf->EditCustomAttributes = "";
		$this->_13_rf->EditValue = $this->_13_rf->CurrentValue;
		if (strval($this->_13_rf->EditValue) != "" && is_numeric($this->_13_rf->EditValue))
			$this->_13_rf->EditValue = FormatNumber($this->_13_rf->EditValue, -2, -2, -2, -2);
		

		// 14_rf
		$this->_14_rf->EditAttrs["class"] = "form-control";
		$this->_14_rf->EditCustomAttributes = "";
		$this->_14_rf->EditValue = $this->_14_rf->CurrentValue;
		if (strval($this->_14_rf->EditValue) != "" && is_numeric($this->_14_rf->EditValue))
			$this->_14_rf->EditValue = FormatNumber($this->_14_rf->EditValue, -2, -2, -2, -2);
		

		// 15_rf
		$this->_15_rf->EditAttrs["class"] = "form-control";
		$this->_15_rf->EditCustomAttributes = "";
		$this->_15_rf->EditValue = $this->_15_rf->CurrentValue;
		if (strval($this->_15_rf->EditValue) != "" && is_numeric($this->_15_rf->EditValue))
			$this->_15_rf->EditValue = FormatNumber($this->_15_rf->EditValue, -2, -2, -2, -2);
		

		// 16_rf
		$this->_16_rf->EditAttrs["class"] = "form-control";
		$this->_16_rf->EditCustomAttributes = "";
		$this->_16_rf->EditValue = $this->_16_rf->CurrentValue;
		if (strval($this->_16_rf->EditValue) != "" && is_numeric($this->_16_rf->EditValue))
			$this->_16_rf->EditValue = FormatNumber($this->_16_rf->EditValue, -2, -2, -2, -2);
		

		// 17_rf
		$this->_17_rf->EditAttrs["class"] = "form-control";
		$this->_17_rf->EditCustomAttributes = "";
		$this->_17_rf->EditValue = $this->_17_rf->CurrentValue;
		if (strval($this->_17_rf->EditValue) != "" && is_numeric($this->_17_rf->EditValue))
			$this->_17_rf->EditValue = FormatNumber($this->_17_rf->EditValue, -2, -2, -2, -2);
		

		// 18_rf
		$this->_18_rf->EditAttrs["class"] = "form-control";
		$this->_18_rf->EditCustomAttributes = "";
		$this->_18_rf->EditValue = $this->_18_rf->CurrentValue;
		if (strval($this->_18_rf->EditValue) != "" && is_numeric($this->_18_rf->EditValue))
			$this->_18_rf->EditValue = FormatNumber($this->_18_rf->EditValue, -2, -2, -2, -2);
		

		// 19_rf
		$this->_19_rf->EditAttrs["class"] = "form-control";
		$this->_19_rf->EditCustomAttributes = "";
		$this->_19_rf->EditValue = $this->_19_rf->CurrentValue;
		if (strval($this->_19_rf->EditValue) != "" && is_numeric($this->_19_rf->EditValue))
			$this->_19_rf->EditValue = FormatNumber($this->_19_rf->EditValue, -2, -2, -2, -2);
		

		// 20_rf
		$this->_20_rf->EditAttrs["class"] = "form-control";
		$this->_20_rf->EditCustomAttributes = "";
		$this->_20_rf->EditValue = $this->_20_rf->CurrentValue;
		if (strval($this->_20_rf->EditValue) != "" && is_numeric($this->_20_rf->EditValue))
			$this->_20_rf->EditValue = FormatNumber($this->_20_rf->EditValue, -2, -2, -2, -2);
		

		// 21_rf
		$this->_21_rf->EditAttrs["class"] = "form-control";
		$this->_21_rf->EditCustomAttributes = "";
		$this->_21_rf->EditValue = $this->_21_rf->CurrentValue;
		if (strval($this->_21_rf->EditValue) != "" && is_numeric($this->_21_rf->EditValue))
			$this->_21_rf->EditValue = FormatNumber($this->_21_rf->EditValue, -2, -2, -2, -2);
		

		// 22_rf
		$this->_22_rf->EditAttrs["class"] = "form-control";
		$this->_22_rf->EditCustomAttributes = "";
		$this->_22_rf->EditValue = $this->_22_rf->CurrentValue;
		if (strval($this->_22_rf->EditValue) != "" && is_numeric($this->_22_rf->EditValue))
			$this->_22_rf->EditValue = FormatNumber($this->_22_rf->EditValue, -2, -2, -2, -2);
		

		// 23_rf
		$this->_23_rf->EditAttrs["class"] = "form-control";
		$this->_23_rf->EditCustomAttributes = "";
		$this->_23_rf->EditValue = $this->_23_rf->CurrentValue;
		if (strval($this->_23_rf->EditValue) != "" && is_numeric($this->_23_rf->EditValue))
			$this->_23_rf->EditValue = FormatNumber($this->_23_rf->EditValue, -2, -2, -2, -2);
		

		// 24_rf
		$this->_24_rf->EditAttrs["class"] = "form-control";
		$this->_24_rf->EditCustomAttributes = "";
		$this->_24_rf->EditValue = $this->_24_rf->CurrentValue;
		if (strval($this->_24_rf->EditValue) != "" && is_numeric($this->_24_rf->EditValue))
			$this->_24_rf->EditValue = FormatNumber($this->_24_rf->EditValue, -2, -2, -2, -2);
		

		// 25_rf
		$this->_25_rf->EditAttrs["class"] = "form-control";
		$this->_25_rf->EditCustomAttributes = "";
		$this->_25_rf->EditValue = $this->_25_rf->CurrentValue;
		if (strval($this->_25_rf->EditValue) != "" && is_numeric($this->_25_rf->EditValue))
			$this->_25_rf->EditValue = FormatNumber($this->_25_rf->EditValue, -2, -2, -2, -2);
		

		// 26_rf
		$this->_26_rf->EditAttrs["class"] = "form-control";
		$this->_26_rf->EditCustomAttributes = "";
		$this->_26_rf->EditValue = $this->_26_rf->CurrentValue;
		if (strval($this->_26_rf->EditValue) != "" && is_numeric($this->_26_rf->EditValue))
			$this->_26_rf->EditValue = FormatNumber($this->_26_rf->EditValue, -2, -2, -2, -2);
		

		// 27_rf
		$this->_27_rf->EditAttrs["class"] = "form-control";
		$this->_27_rf->EditCustomAttributes = "";
		$this->_27_rf->EditValue = $this->_27_rf->CurrentValue;
		if (strval($this->_27_rf->EditValue) != "" && is_numeric($this->_27_rf->EditValue))
			$this->_27_rf->EditValue = FormatNumber($this->_27_rf->EditValue, -2, -2, -2, -2);
		

		// 28_rf
		$this->_28_rf->EditAttrs["class"] = "form-control";
		$this->_28_rf->EditCustomAttributes = "";
		$this->_28_rf->EditValue = $this->_28_rf->CurrentValue;
		if (strval($this->_28_rf->EditValue) != "" && is_numeric($this->_28_rf->EditValue))
			$this->_28_rf->EditValue = FormatNumber($this->_28_rf->EditValue, -2, -2, -2, -2);
		

		// 29_rf
		$this->_29_rf->EditAttrs["class"] = "form-control";
		$this->_29_rf->EditCustomAttributes = "";
		$this->_29_rf->EditValue = $this->_29_rf->CurrentValue;
		if (strval($this->_29_rf->EditValue) != "" && is_numeric($this->_29_rf->EditValue))
			$this->_29_rf->EditValue = FormatNumber($this->_29_rf->EditValue, -2, -2, -2, -2);
		

		// 30_rf
		$this->_30_rf->EditAttrs["class"] = "form-control";
		$this->_30_rf->EditCustomAttributes = "";
		$this->_30_rf->EditValue = $this->_30_rf->CurrentValue;
		if (strval($this->_30_rf->EditValue) != "" && is_numeric($this->_30_rf->EditValue))
			$this->_30_rf->EditValue = FormatNumber($this->_30_rf->EditValue, -2, -2, -2, -2);
		

		// 31_rf
		$this->_31_rf->EditAttrs["class"] = "form-control";
		$this->_31_rf->EditCustomAttributes = "";
		$this->_31_rf->EditValue = $this->_31_rf->CurrentValue;
		if (strval($this->_31_rf->EditValue) != "" && is_numeric($this->_31_rf->EditValue))
			$this->_31_rf->EditValue = FormatNumber($this->_31_rf->EditValue, -2, -2, -2, -2);
		

		// SubDivisionId
		$this->SubDivisionId->EditAttrs["class"] = "form-control";
		$this->SubDivisionId->EditCustomAttributes = "";
		$curVal = strval($this->SubDivisionId->CurrentValue);
		if ($curVal != "") {
			$this->SubDivisionId->EditValue = $this->SubDivisionId->lookupCacheOption($curVal);
			if ($this->SubDivisionId->EditValue === NULL) { // Lookup from database
				$filterWrk = "`SubDivisionId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->SubDivisionId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->SubDivisionId->EditValue = $this->SubDivisionId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->SubDivisionId->EditValue = $this->SubDivisionId->CurrentValue;
				}
			}
		} else {
			$this->SubDivisionId->EditValue = NULL;
		}
		$this->SubDivisionId->ViewCustomAttributes = "";

		// Water_Year
		$this->Water_Year->EditAttrs["class"] = "form-control";
		$this->Water_Year->EditCustomAttributes = "";
		$this->Water_Year->EditValue = $this->Water_Year->CurrentValue;
		$this->Water_Year->ViewCustomAttributes = "";

		// SenderMobileNumber
		$this->SenderMobileNumber->EditAttrs["class"] = "form-control";
		$this->SenderMobileNumber->EditCustomAttributes = "";
		$this->SenderMobileNumber->EditValue = $this->SenderMobileNumber->CurrentValue;
		$this->SenderMobileNumber->ViewCustomAttributes = "";

		// IsChanged
		$this->IsChanged->EditAttrs["class"] = "form-control";
		$this->IsChanged->EditCustomAttributes = "";
		$this->IsChanged->EditValue = $this->IsChanged->CurrentValue;
		$this->IsChanged->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->month_id);
					$doc->exportCaption($this->_01_rf);
					$doc->exportCaption($this->_02_rf);
					$doc->exportCaption($this->_03_rf);
					$doc->exportCaption($this->_04_rf);
					$doc->exportCaption($this->_05_rf);
					$doc->exportCaption($this->_06_rf);
					$doc->exportCaption($this->_07_rf);
					$doc->exportCaption($this->_08_rf);
					$doc->exportCaption($this->_09_rf);
					$doc->exportCaption($this->_10_rf);
					$doc->exportCaption($this->_11_rf);
					$doc->exportCaption($this->_12_rf);
					$doc->exportCaption($this->_13_rf);
					$doc->exportCaption($this->_14_rf);
					$doc->exportCaption($this->_15_rf);
					$doc->exportCaption($this->_16_rf);
					$doc->exportCaption($this->_17_rf);
					$doc->exportCaption($this->_18_rf);
					$doc->exportCaption($this->_19_rf);
					$doc->exportCaption($this->_20_rf);
					$doc->exportCaption($this->_21_rf);
					$doc->exportCaption($this->_22_rf);
					$doc->exportCaption($this->_23_rf);
					$doc->exportCaption($this->_24_rf);
					$doc->exportCaption($this->_25_rf);
					$doc->exportCaption($this->_26_rf);
					$doc->exportCaption($this->_27_rf);
					$doc->exportCaption($this->_28_rf);
					$doc->exportCaption($this->_29_rf);
					$doc->exportCaption($this->_30_rf);
					$doc->exportCaption($this->_31_rf);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->Water_Year);
					$doc->exportCaption($this->SenderMobileNumber);
					$doc->exportCaption($this->IsChanged);
				} else {
					$doc->exportCaption($this->Slno);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->month_id);
					$doc->exportCaption($this->_01_rf);
					$doc->exportCaption($this->_02_rf);
					$doc->exportCaption($this->_03_rf);
					$doc->exportCaption($this->_04_rf);
					$doc->exportCaption($this->_05_rf);
					$doc->exportCaption($this->_06_rf);
					$doc->exportCaption($this->_07_rf);
					$doc->exportCaption($this->_08_rf);
					$doc->exportCaption($this->_09_rf);
					$doc->exportCaption($this->_10_rf);
					$doc->exportCaption($this->_11_rf);
					$doc->exportCaption($this->_12_rf);
					$doc->exportCaption($this->_13_rf);
					$doc->exportCaption($this->_14_rf);
					$doc->exportCaption($this->_15_rf);
					$doc->exportCaption($this->_16_rf);
					$doc->exportCaption($this->_17_rf);
					$doc->exportCaption($this->_18_rf);
					$doc->exportCaption($this->_19_rf);
					$doc->exportCaption($this->_20_rf);
					$doc->exportCaption($this->_21_rf);
					$doc->exportCaption($this->_22_rf);
					$doc->exportCaption($this->_23_rf);
					$doc->exportCaption($this->_24_rf);
					$doc->exportCaption($this->_25_rf);
					$doc->exportCaption($this->_26_rf);
					$doc->exportCaption($this->_27_rf);
					$doc->exportCaption($this->_28_rf);
					$doc->exportCaption($this->_29_rf);
					$doc->exportCaption($this->_30_rf);
					$doc->exportCaption($this->_31_rf);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->Water_Year);
					$doc->exportCaption($this->SenderMobileNumber);
					$doc->exportCaption($this->IsChanged);
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
						$doc->exportField($this->month_id);
						$doc->exportField($this->_01_rf);
						$doc->exportField($this->_02_rf);
						$doc->exportField($this->_03_rf);
						$doc->exportField($this->_04_rf);
						$doc->exportField($this->_05_rf);
						$doc->exportField($this->_06_rf);
						$doc->exportField($this->_07_rf);
						$doc->exportField($this->_08_rf);
						$doc->exportField($this->_09_rf);
						$doc->exportField($this->_10_rf);
						$doc->exportField($this->_11_rf);
						$doc->exportField($this->_12_rf);
						$doc->exportField($this->_13_rf);
						$doc->exportField($this->_14_rf);
						$doc->exportField($this->_15_rf);
						$doc->exportField($this->_16_rf);
						$doc->exportField($this->_17_rf);
						$doc->exportField($this->_18_rf);
						$doc->exportField($this->_19_rf);
						$doc->exportField($this->_20_rf);
						$doc->exportField($this->_21_rf);
						$doc->exportField($this->_22_rf);
						$doc->exportField($this->_23_rf);
						$doc->exportField($this->_24_rf);
						$doc->exportField($this->_25_rf);
						$doc->exportField($this->_26_rf);
						$doc->exportField($this->_27_rf);
						$doc->exportField($this->_28_rf);
						$doc->exportField($this->_29_rf);
						$doc->exportField($this->_30_rf);
						$doc->exportField($this->_31_rf);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->Water_Year);
						$doc->exportField($this->SenderMobileNumber);
						$doc->exportField($this->IsChanged);
					} else {
						$doc->exportField($this->Slno);
						$doc->exportField($this->StationId);
						$doc->exportField($this->month_id);
						$doc->exportField($this->_01_rf);
						$doc->exportField($this->_02_rf);
						$doc->exportField($this->_03_rf);
						$doc->exportField($this->_04_rf);
						$doc->exportField($this->_05_rf);
						$doc->exportField($this->_06_rf);
						$doc->exportField($this->_07_rf);
						$doc->exportField($this->_08_rf);
						$doc->exportField($this->_09_rf);
						$doc->exportField($this->_10_rf);
						$doc->exportField($this->_11_rf);
						$doc->exportField($this->_12_rf);
						$doc->exportField($this->_13_rf);
						$doc->exportField($this->_14_rf);
						$doc->exportField($this->_15_rf);
						$doc->exportField($this->_16_rf);
						$doc->exportField($this->_17_rf);
						$doc->exportField($this->_18_rf);
						$doc->exportField($this->_19_rf);
						$doc->exportField($this->_20_rf);
						$doc->exportField($this->_21_rf);
						$doc->exportField($this->_22_rf);
						$doc->exportField($this->_23_rf);
						$doc->exportField($this->_24_rf);
						$doc->exportField($this->_25_rf);
						$doc->exportField($this->_26_rf);
						$doc->exportField($this->_27_rf);
						$doc->exportField($this->_28_rf);
						$doc->exportField($this->_29_rf);
						$doc->exportField($this->_30_rf);
						$doc->exportField($this->_31_rf);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->Water_Year);
						$doc->exportField($this->SenderMobileNumber);
						$doc->exportField($this->IsChanged);
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