<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for tbl_hmsdata
 */
class tbl_hmsdata extends DbTable
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
	public $obs_DateTime;
	public $Temp_water_in_pan_inC_830AM;
	public $Temp_water_in_pan_inC_530PM;
	public $App_Evaporation_inMM_830AM;
	public $App_Evaporation_inMM_530PM;
	public $Rainfall_inMM_830AM;
	public $Rainfall_inMM_530PM;
	public $Evaporation_curing_inMM_830AM;
	public $Evaporation_curing_inMM_530PM;
	public $Evaporation_curing_DaywithRain_inMM;
	public $Evaporation_curing_DaywithNoRain_inMM;
	public $Dry_Bulb_Temp_inC_830AM;
	public $Wet_Bulb_Temp_inC_830AM;
	public $Vapour_Temp_inC_830AM;
	public $Dry_Bulb_Temp_inC_530PM;
	public $Wet_Bulb_Temp_inC_530PM;
	public $Vapour_Temp_inC_530PM;
	public $Max_Temp_inC;
	public $Min_Temp_inC;
	public $Total_Wind_Run_inKM_830AM;
	public $Total_Wind_Run_inKM_530PM;
	public $Average_Wind_Speed_inKM;
	public $Number_of_Hours_of_Brightsuned;
	public $Relative_Humidity_in_Precentage_830AM;
	public $Relative_Humidity_in_Precentage_530PM;
	public $obs_remarks;
	public $Status;
	public $Validated;
	public $isFreeze;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tbl_hmsdata';
		$this->TableName = 'tbl_hmsdata';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`tbl_hmsdata`";
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
		$this->Slno = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Slno', 'Slno', '`Slno`', '`Slno`', 3, 11, -1, FALSE, '`Slno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Slno->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Slno->IsPrimaryKey = TRUE; // Primary key field
		$this->Slno->Sortable = TRUE; // Allow sort
		$this->Slno->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Slno'] = &$this->Slno;

		// StationId
		$this->StationId = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
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

		// obs_DateTime
		$this->obs_DateTime = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_obs_DateTime', 'obs_DateTime', '`obs_DateTime`', CastDateFieldForLike("`obs_DateTime`", 7, "DB"), 133, 10, 7, FALSE, '`obs_DateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->obs_DateTime->Sortable = TRUE; // Allow sort
		$this->obs_DateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['obs_DateTime'] = &$this->obs_DateTime;

		// Temp_water_in_pan_inC_830AM
		$this->Temp_water_in_pan_inC_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Temp_water_in_pan_inC_830AM', 'Temp_water_in_pan_inC_830AM', '`Temp_water_in_pan_inC_830AM`', '`Temp_water_in_pan_inC_830AM`', 131, 7, -1, FALSE, '`Temp_water_in_pan_inC_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Temp_water_in_pan_inC_830AM->Sortable = TRUE; // Allow sort
		$this->Temp_water_in_pan_inC_830AM->DefaultErrorMessage = str_replace(["%1", "%2"], ["0", "70"], $Language->phrase("IncorrectRange"));
		$this->fields['Temp_water_in_pan_inC_830AM'] = &$this->Temp_water_in_pan_inC_830AM;

		// Temp_water_in_pan_inC_530PM
		$this->Temp_water_in_pan_inC_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Temp_water_in_pan_inC_530PM', 'Temp_water_in_pan_inC_530PM', '`Temp_water_in_pan_inC_530PM`', '`Temp_water_in_pan_inC_530PM`', 131, 7, -1, FALSE, '`Temp_water_in_pan_inC_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Temp_water_in_pan_inC_530PM->Sortable = TRUE; // Allow sort
		$this->Temp_water_in_pan_inC_530PM->DefaultErrorMessage = str_replace(["%1", "%2"], ["0", "70"], $Language->phrase("IncorrectRange"));
		$this->fields['Temp_water_in_pan_inC_530PM'] = &$this->Temp_water_in_pan_inC_530PM;

		// App_Evaporation_inMM_830AM
		$this->App_Evaporation_inMM_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_App_Evaporation_inMM_830AM', 'App_Evaporation_inMM_830AM', '`App_Evaporation_inMM_830AM`', '`App_Evaporation_inMM_830AM`', 131, 7, -1, FALSE, '`App_Evaporation_inMM_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->App_Evaporation_inMM_830AM->Sortable = TRUE; // Allow sort
		$this->App_Evaporation_inMM_830AM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['App_Evaporation_inMM_830AM'] = &$this->App_Evaporation_inMM_830AM;

		// App_Evaporation_inMM_530PM
		$this->App_Evaporation_inMM_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_App_Evaporation_inMM_530PM', 'App_Evaporation_inMM_530PM', '`App_Evaporation_inMM_530PM`', '`App_Evaporation_inMM_530PM`', 131, 7, -1, FALSE, '`App_Evaporation_inMM_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->App_Evaporation_inMM_530PM->Sortable = TRUE; // Allow sort
		$this->App_Evaporation_inMM_530PM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['App_Evaporation_inMM_530PM'] = &$this->App_Evaporation_inMM_530PM;

		// Rainfall_inMM_830AM
		$this->Rainfall_inMM_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Rainfall_inMM_830AM', 'Rainfall_inMM_830AM', '`Rainfall_inMM_830AM`', '`Rainfall_inMM_830AM`', 131, 7, -1, FALSE, '`Rainfall_inMM_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Rainfall_inMM_830AM->Sortable = TRUE; // Allow sort
		$this->Rainfall_inMM_830AM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Rainfall_inMM_830AM'] = &$this->Rainfall_inMM_830AM;

		// Rainfall_inMM_530PM
		$this->Rainfall_inMM_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Rainfall_inMM_530PM', 'Rainfall_inMM_530PM', '`Rainfall_inMM_530PM`', '`Rainfall_inMM_530PM`', 131, 7, -1, FALSE, '`Rainfall_inMM_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Rainfall_inMM_530PM->Sortable = TRUE; // Allow sort
		$this->Rainfall_inMM_530PM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Rainfall_inMM_530PM'] = &$this->Rainfall_inMM_530PM;

		// Evaporation_curing_inMM_830AM
		$this->Evaporation_curing_inMM_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Evaporation_curing_inMM_830AM', 'Evaporation_curing_inMM_830AM', '`Evaporation_curing_inMM_830AM`', '`Evaporation_curing_inMM_830AM`', 131, 7, -1, FALSE, '`Evaporation_curing_inMM_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Evaporation_curing_inMM_830AM->Sortable = TRUE; // Allow sort
		$this->Evaporation_curing_inMM_830AM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Evaporation_curing_inMM_830AM'] = &$this->Evaporation_curing_inMM_830AM;

		// Evaporation_curing_inMM_530PM
		$this->Evaporation_curing_inMM_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Evaporation_curing_inMM_530PM', 'Evaporation_curing_inMM_530PM', '`Evaporation_curing_inMM_530PM`', '`Evaporation_curing_inMM_530PM`', 131, 7, -1, FALSE, '`Evaporation_curing_inMM_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Evaporation_curing_inMM_530PM->Sortable = TRUE; // Allow sort
		$this->Evaporation_curing_inMM_530PM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Evaporation_curing_inMM_530PM'] = &$this->Evaporation_curing_inMM_530PM;

		// Evaporation_curing_DaywithRain_inMM
		$this->Evaporation_curing_DaywithRain_inMM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Evaporation_curing_DaywithRain_inMM', 'Evaporation_curing_DaywithRain_inMM', '`Evaporation_curing_DaywithRain_inMM`', '`Evaporation_curing_DaywithRain_inMM`', 131, 7, -1, FALSE, '`Evaporation_curing_DaywithRain_inMM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Evaporation_curing_DaywithRain_inMM->Sortable = TRUE; // Allow sort
		$this->Evaporation_curing_DaywithRain_inMM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Evaporation_curing_DaywithRain_inMM'] = &$this->Evaporation_curing_DaywithRain_inMM;

		// Evaporation_curing_DaywithNoRain_inMM
		$this->Evaporation_curing_DaywithNoRain_inMM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Evaporation_curing_DaywithNoRain_inMM', 'Evaporation_curing_DaywithNoRain_inMM', '`Evaporation_curing_DaywithNoRain_inMM`', '`Evaporation_curing_DaywithNoRain_inMM`', 131, 7, -1, FALSE, '`Evaporation_curing_DaywithNoRain_inMM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Evaporation_curing_DaywithNoRain_inMM->Sortable = TRUE; // Allow sort
		$this->Evaporation_curing_DaywithNoRain_inMM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Evaporation_curing_DaywithNoRain_inMM'] = &$this->Evaporation_curing_DaywithNoRain_inMM;

		// Dry_Bulb_Temp_inC_830AM
		$this->Dry_Bulb_Temp_inC_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Dry_Bulb_Temp_inC_830AM', 'Dry_Bulb_Temp_inC_830AM', '`Dry_Bulb_Temp_inC_830AM`', '`Dry_Bulb_Temp_inC_830AM`', 131, 7, -1, FALSE, '`Dry_Bulb_Temp_inC_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dry_Bulb_Temp_inC_830AM->Sortable = TRUE; // Allow sort
		$this->Dry_Bulb_Temp_inC_830AM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Dry_Bulb_Temp_inC_830AM'] = &$this->Dry_Bulb_Temp_inC_830AM;

		// Wet_Bulb_Temp_inC_830AM
		$this->Wet_Bulb_Temp_inC_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Wet_Bulb_Temp_inC_830AM', 'Wet_Bulb_Temp_inC_830AM', '`Wet_Bulb_Temp_inC_830AM`', '`Wet_Bulb_Temp_inC_830AM`', 131, 7, -1, FALSE, '`Wet_Bulb_Temp_inC_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Wet_Bulb_Temp_inC_830AM->Sortable = TRUE; // Allow sort
		$this->Wet_Bulb_Temp_inC_830AM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Wet_Bulb_Temp_inC_830AM'] = &$this->Wet_Bulb_Temp_inC_830AM;

		// Vapour_Temp_inC_830AM
		$this->Vapour_Temp_inC_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Vapour_Temp_inC_830AM', 'Vapour_Temp_inC_830AM', '`Vapour_Temp_inC_830AM`', '`Vapour_Temp_inC_830AM`', 131, 7, -1, FALSE, '`Vapour_Temp_inC_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Vapour_Temp_inC_830AM->Sortable = TRUE; // Allow sort
		$this->Vapour_Temp_inC_830AM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Vapour_Temp_inC_830AM'] = &$this->Vapour_Temp_inC_830AM;

		// Dry_Bulb_Temp_inC_530PM
		$this->Dry_Bulb_Temp_inC_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Dry_Bulb_Temp_inC_530PM', 'Dry_Bulb_Temp_inC_530PM', '`Dry_Bulb_Temp_inC_530PM`', '`Dry_Bulb_Temp_inC_530PM`', 131, 7, -1, FALSE, '`Dry_Bulb_Temp_inC_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dry_Bulb_Temp_inC_530PM->Sortable = TRUE; // Allow sort
		$this->Dry_Bulb_Temp_inC_530PM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Dry_Bulb_Temp_inC_530PM'] = &$this->Dry_Bulb_Temp_inC_530PM;

		// Wet_Bulb_Temp_inC_530PM
		$this->Wet_Bulb_Temp_inC_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Wet_Bulb_Temp_inC_530PM', 'Wet_Bulb_Temp_inC_530PM', '`Wet_Bulb_Temp_inC_530PM`', '`Wet_Bulb_Temp_inC_530PM`', 131, 7, -1, FALSE, '`Wet_Bulb_Temp_inC_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Wet_Bulb_Temp_inC_530PM->Sortable = TRUE; // Allow sort
		$this->Wet_Bulb_Temp_inC_530PM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Wet_Bulb_Temp_inC_530PM'] = &$this->Wet_Bulb_Temp_inC_530PM;

		// Vapour_Temp_inC_530PM
		$this->Vapour_Temp_inC_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Vapour_Temp_inC_530PM', 'Vapour_Temp_inC_530PM', '`Vapour_Temp_inC_530PM`', '`Vapour_Temp_inC_530PM`', 131, 7, -1, FALSE, '`Vapour_Temp_inC_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Vapour_Temp_inC_530PM->Sortable = TRUE; // Allow sort
		$this->Vapour_Temp_inC_530PM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Vapour_Temp_inC_530PM'] = &$this->Vapour_Temp_inC_530PM;

		// Max_Temp_inC
		$this->Max_Temp_inC = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Max_Temp_inC', 'Max_Temp_inC', '`Max_Temp_inC`', '`Max_Temp_inC`', 131, 7, -1, FALSE, '`Max_Temp_inC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Max_Temp_inC->Sortable = TRUE; // Allow sort
		$this->Max_Temp_inC->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Max_Temp_inC'] = &$this->Max_Temp_inC;

		// Min_Temp_inC
		$this->Min_Temp_inC = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Min_Temp_inC', 'Min_Temp_inC', '`Min_Temp_inC`', '`Min_Temp_inC`', 131, 7, -1, FALSE, '`Min_Temp_inC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Min_Temp_inC->Sortable = TRUE; // Allow sort
		$this->Min_Temp_inC->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Min_Temp_inC'] = &$this->Min_Temp_inC;

		// Total_Wind_Run_inKM_830AM
		$this->Total_Wind_Run_inKM_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Total_Wind_Run_inKM_830AM', 'Total_Wind_Run_inKM_830AM', '`Total_Wind_Run_inKM_830AM`', '`Total_Wind_Run_inKM_830AM`', 131, 7, -1, FALSE, '`Total_Wind_Run_inKM_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total_Wind_Run_inKM_830AM->Sortable = TRUE; // Allow sort
		$this->Total_Wind_Run_inKM_830AM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Total_Wind_Run_inKM_830AM'] = &$this->Total_Wind_Run_inKM_830AM;

		// Total_Wind_Run_inKM_530PM
		$this->Total_Wind_Run_inKM_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Total_Wind_Run_inKM_530PM', 'Total_Wind_Run_inKM_530PM', '`Total_Wind_Run_inKM_530PM`', '`Total_Wind_Run_inKM_530PM`', 131, 7, -1, FALSE, '`Total_Wind_Run_inKM_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total_Wind_Run_inKM_530PM->Sortable = TRUE; // Allow sort
		$this->Total_Wind_Run_inKM_530PM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Total_Wind_Run_inKM_530PM'] = &$this->Total_Wind_Run_inKM_530PM;

		// Average_Wind_Speed_inKM
		$this->Average_Wind_Speed_inKM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Average_Wind_Speed_inKM', 'Average_Wind_Speed_inKM', '`Average_Wind_Speed_inKM`', '`Average_Wind_Speed_inKM`', 131, 7, -1, FALSE, '`Average_Wind_Speed_inKM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Average_Wind_Speed_inKM->Sortable = TRUE; // Allow sort
		$this->Average_Wind_Speed_inKM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Average_Wind_Speed_inKM'] = &$this->Average_Wind_Speed_inKM;

		// Number_of_Hours_of_Brightsuned
		$this->Number_of_Hours_of_Brightsuned = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Number_of_Hours_of_Brightsuned', 'Number_of_Hours_of_Brightsuned', '`Number_of_Hours_of_Brightsuned`', '`Number_of_Hours_of_Brightsuned`', 131, 7, -1, FALSE, '`Number_of_Hours_of_Brightsuned`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Number_of_Hours_of_Brightsuned->Sortable = TRUE; // Allow sort
		$this->Number_of_Hours_of_Brightsuned->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Number_of_Hours_of_Brightsuned'] = &$this->Number_of_Hours_of_Brightsuned;

		// Relative_Humidity_in_Precentage_830AM
		$this->Relative_Humidity_in_Precentage_830AM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Relative_Humidity_in_Precentage_830AM', 'Relative_Humidity_in_Precentage_830AM', '`Relative_Humidity_in_Precentage_830AM`', '`Relative_Humidity_in_Precentage_830AM`', 131, 7, -1, FALSE, '`Relative_Humidity_in_Precentage_830AM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Relative_Humidity_in_Precentage_830AM->Sortable = TRUE; // Allow sort
		$this->Relative_Humidity_in_Precentage_830AM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Relative_Humidity_in_Precentage_830AM'] = &$this->Relative_Humidity_in_Precentage_830AM;

		// Relative_Humidity_in_Precentage_530PM
		$this->Relative_Humidity_in_Precentage_530PM = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Relative_Humidity_in_Precentage_530PM', 'Relative_Humidity_in_Precentage_530PM', '`Relative_Humidity_in_Precentage_530PM`', '`Relative_Humidity_in_Precentage_530PM`', 131, 7, -1, FALSE, '`Relative_Humidity_in_Precentage_530PM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Relative_Humidity_in_Precentage_530PM->Sortable = TRUE; // Allow sort
		$this->Relative_Humidity_in_Precentage_530PM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Relative_Humidity_in_Precentage_530PM'] = &$this->Relative_Humidity_in_Precentage_530PM;

		// obs_remarks
		$this->obs_remarks = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_obs_remarks', 'obs_remarks', '`obs_remarks`', '`obs_remarks`', 200, 50, -1, FALSE, '`obs_remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->obs_remarks->Sortable = TRUE; // Allow sort
		$this->fields['obs_remarks'] = &$this->obs_remarks;

		// Status
		$this->Status = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Status', 'Status', '`Status`', '`Status`', 3, 11, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Status->Nullable = FALSE; // NOT NULL field
		$this->Status->Required = TRUE; // Required field
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Status'] = &$this->Status;

		// Validated
		$this->Validated = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_Validated', 'Validated', '`Validated`', '`Validated`', 3, 11, -1, FALSE, '`Validated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Validated->Sortable = TRUE; // Allow sort
		$this->Validated->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Validated'] = &$this->Validated;

		// isFreeze
		$this->isFreeze = new DbField('tbl_hmsdata', 'tbl_hmsdata', 'x_isFreeze', 'isFreeze', '`isFreeze`', '`isFreeze`', 16, 1, -1, FALSE, '`isFreeze`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->isFreeze->Nullable = FALSE; // NOT NULL field
		$this->isFreeze->Sortable = TRUE; // Allow sort
		$this->isFreeze->DataType = DATATYPE_BOOLEAN;
		switch ($CurrentLanguage) {
			case "en":
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_hmsdata', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_hmsdata', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->isFreeze->Lookup = new Lookup('isFreeze', 'tbl_hmsdata', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->isFreeze->OptionCount = 2;
		$this->isFreeze->DefaultErrorMessage = $Language->phrase("IncorrectField");
		$this->fields['isFreeze'] = &$this->isFreeze;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`tbl_hmsdata`";
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
		$this->obs_DateTime->DbValue = $row['obs_DateTime'];
		$this->Temp_water_in_pan_inC_830AM->DbValue = $row['Temp_water_in_pan_inC_830AM'];
		$this->Temp_water_in_pan_inC_530PM->DbValue = $row['Temp_water_in_pan_inC_530PM'];
		$this->App_Evaporation_inMM_830AM->DbValue = $row['App_Evaporation_inMM_830AM'];
		$this->App_Evaporation_inMM_530PM->DbValue = $row['App_Evaporation_inMM_530PM'];
		$this->Rainfall_inMM_830AM->DbValue = $row['Rainfall_inMM_830AM'];
		$this->Rainfall_inMM_530PM->DbValue = $row['Rainfall_inMM_530PM'];
		$this->Evaporation_curing_inMM_830AM->DbValue = $row['Evaporation_curing_inMM_830AM'];
		$this->Evaporation_curing_inMM_530PM->DbValue = $row['Evaporation_curing_inMM_530PM'];
		$this->Evaporation_curing_DaywithRain_inMM->DbValue = $row['Evaporation_curing_DaywithRain_inMM'];
		$this->Evaporation_curing_DaywithNoRain_inMM->DbValue = $row['Evaporation_curing_DaywithNoRain_inMM'];
		$this->Dry_Bulb_Temp_inC_830AM->DbValue = $row['Dry_Bulb_Temp_inC_830AM'];
		$this->Wet_Bulb_Temp_inC_830AM->DbValue = $row['Wet_Bulb_Temp_inC_830AM'];
		$this->Vapour_Temp_inC_830AM->DbValue = $row['Vapour_Temp_inC_830AM'];
		$this->Dry_Bulb_Temp_inC_530PM->DbValue = $row['Dry_Bulb_Temp_inC_530PM'];
		$this->Wet_Bulb_Temp_inC_530PM->DbValue = $row['Wet_Bulb_Temp_inC_530PM'];
		$this->Vapour_Temp_inC_530PM->DbValue = $row['Vapour_Temp_inC_530PM'];
		$this->Max_Temp_inC->DbValue = $row['Max_Temp_inC'];
		$this->Min_Temp_inC->DbValue = $row['Min_Temp_inC'];
		$this->Total_Wind_Run_inKM_830AM->DbValue = $row['Total_Wind_Run_inKM_830AM'];
		$this->Total_Wind_Run_inKM_530PM->DbValue = $row['Total_Wind_Run_inKM_530PM'];
		$this->Average_Wind_Speed_inKM->DbValue = $row['Average_Wind_Speed_inKM'];
		$this->Number_of_Hours_of_Brightsuned->DbValue = $row['Number_of_Hours_of_Brightsuned'];
		$this->Relative_Humidity_in_Precentage_830AM->DbValue = $row['Relative_Humidity_in_Precentage_830AM'];
		$this->Relative_Humidity_in_Precentage_530PM->DbValue = $row['Relative_Humidity_in_Precentage_530PM'];
		$this->obs_remarks->DbValue = $row['obs_remarks'];
		$this->Status->DbValue = $row['Status'];
		$this->Validated->DbValue = $row['Validated'];
		$this->isFreeze->DbValue = $row['isFreeze'];
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
			return "tbl_hmsdatalist.php";
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
		if ($pageName == "tbl_hmsdataview.php")
			return $Language->phrase("View");
		elseif ($pageName == "tbl_hmsdataedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tbl_hmsdataadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tbl_hmsdatalist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("tbl_hmsdataview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tbl_hmsdataview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "tbl_hmsdataadd.php?" . $this->getUrlParm($parm);
		else
			$url = "tbl_hmsdataadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tbl_hmsdataedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("tbl_hmsdataadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("tbl_hmsdatadelete.php", $this->getUrlParm());
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
		$this->obs_DateTime->setDbValue($rs->fields('obs_DateTime'));
		$this->Temp_water_in_pan_inC_830AM->setDbValue($rs->fields('Temp_water_in_pan_inC_830AM'));
		$this->Temp_water_in_pan_inC_530PM->setDbValue($rs->fields('Temp_water_in_pan_inC_530PM'));
		$this->App_Evaporation_inMM_830AM->setDbValue($rs->fields('App_Evaporation_inMM_830AM'));
		$this->App_Evaporation_inMM_530PM->setDbValue($rs->fields('App_Evaporation_inMM_530PM'));
		$this->Rainfall_inMM_830AM->setDbValue($rs->fields('Rainfall_inMM_830AM'));
		$this->Rainfall_inMM_530PM->setDbValue($rs->fields('Rainfall_inMM_530PM'));
		$this->Evaporation_curing_inMM_830AM->setDbValue($rs->fields('Evaporation_curing_inMM_830AM'));
		$this->Evaporation_curing_inMM_530PM->setDbValue($rs->fields('Evaporation_curing_inMM_530PM'));
		$this->Evaporation_curing_DaywithRain_inMM->setDbValue($rs->fields('Evaporation_curing_DaywithRain_inMM'));
		$this->Evaporation_curing_DaywithNoRain_inMM->setDbValue($rs->fields('Evaporation_curing_DaywithNoRain_inMM'));
		$this->Dry_Bulb_Temp_inC_830AM->setDbValue($rs->fields('Dry_Bulb_Temp_inC_830AM'));
		$this->Wet_Bulb_Temp_inC_830AM->setDbValue($rs->fields('Wet_Bulb_Temp_inC_830AM'));
		$this->Vapour_Temp_inC_830AM->setDbValue($rs->fields('Vapour_Temp_inC_830AM'));
		$this->Dry_Bulb_Temp_inC_530PM->setDbValue($rs->fields('Dry_Bulb_Temp_inC_530PM'));
		$this->Wet_Bulb_Temp_inC_530PM->setDbValue($rs->fields('Wet_Bulb_Temp_inC_530PM'));
		$this->Vapour_Temp_inC_530PM->setDbValue($rs->fields('Vapour_Temp_inC_530PM'));
		$this->Max_Temp_inC->setDbValue($rs->fields('Max_Temp_inC'));
		$this->Min_Temp_inC->setDbValue($rs->fields('Min_Temp_inC'));
		$this->Total_Wind_Run_inKM_830AM->setDbValue($rs->fields('Total_Wind_Run_inKM_830AM'));
		$this->Total_Wind_Run_inKM_530PM->setDbValue($rs->fields('Total_Wind_Run_inKM_530PM'));
		$this->Average_Wind_Speed_inKM->setDbValue($rs->fields('Average_Wind_Speed_inKM'));
		$this->Number_of_Hours_of_Brightsuned->setDbValue($rs->fields('Number_of_Hours_of_Brightsuned'));
		$this->Relative_Humidity_in_Precentage_830AM->setDbValue($rs->fields('Relative_Humidity_in_Precentage_830AM'));
		$this->Relative_Humidity_in_Precentage_530PM->setDbValue($rs->fields('Relative_Humidity_in_Precentage_530PM'));
		$this->obs_remarks->setDbValue($rs->fields('obs_remarks'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->Validated->setDbValue($rs->fields('Validated'));
		$this->isFreeze->setDbValue($rs->fields('isFreeze'));
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
		// obs_DateTime
		// Temp_water_in_pan_inC_830AM
		// Temp_water_in_pan_inC_530PM
		// App_Evaporation_inMM_830AM
		// App_Evaporation_inMM_530PM
		// Rainfall_inMM_830AM
		// Rainfall_inMM_530PM
		// Evaporation_curing_inMM_830AM
		// Evaporation_curing_inMM_530PM
		// Evaporation_curing_DaywithRain_inMM
		// Evaporation_curing_DaywithNoRain_inMM
		// Dry_Bulb_Temp_inC_830AM
		// Wet_Bulb_Temp_inC_830AM
		// Vapour_Temp_inC_830AM
		// Dry_Bulb_Temp_inC_530PM
		// Wet_Bulb_Temp_inC_530PM
		// Vapour_Temp_inC_530PM
		// Max_Temp_inC
		// Min_Temp_inC
		// Total_Wind_Run_inKM_830AM
		// Total_Wind_Run_inKM_530PM
		// Average_Wind_Speed_inKM
		// Number_of_Hours_of_Brightsuned
		// Relative_Humidity_in_Precentage_830AM
		// Relative_Humidity_in_Precentage_530PM
		// obs_remarks
		// Status
		// Validated
		// isFreeze
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

		// obs_DateTime
		$this->obs_DateTime->ViewValue = $this->obs_DateTime->CurrentValue;
		$this->obs_DateTime->ViewValue = FormatDateTime($this->obs_DateTime->ViewValue, 7);
		$this->obs_DateTime->ViewCustomAttributes = "";

		// Temp_water_in_pan_inC_830AM
		$this->Temp_water_in_pan_inC_830AM->ViewValue = $this->Temp_water_in_pan_inC_830AM->CurrentValue;
		$this->Temp_water_in_pan_inC_830AM->ViewValue = FormatNumber($this->Temp_water_in_pan_inC_830AM->ViewValue, 1, -2, -2, -2);
		$this->Temp_water_in_pan_inC_830AM->ViewCustomAttributes = "";

		// Temp_water_in_pan_inC_530PM
		$this->Temp_water_in_pan_inC_530PM->ViewValue = $this->Temp_water_in_pan_inC_530PM->CurrentValue;
		$this->Temp_water_in_pan_inC_530PM->ViewValue = FormatNumber($this->Temp_water_in_pan_inC_530PM->ViewValue, 1, -2, -2, -2);
		$this->Temp_water_in_pan_inC_530PM->ViewCustomAttributes = "";

		// App_Evaporation_inMM_830AM
		$this->App_Evaporation_inMM_830AM->ViewValue = $this->App_Evaporation_inMM_830AM->CurrentValue;
		$this->App_Evaporation_inMM_830AM->ViewValue = FormatNumber($this->App_Evaporation_inMM_830AM->ViewValue, 1, -2, -2, -2);
		$this->App_Evaporation_inMM_830AM->ViewCustomAttributes = "";

		// App_Evaporation_inMM_530PM
		$this->App_Evaporation_inMM_530PM->ViewValue = $this->App_Evaporation_inMM_530PM->CurrentValue;
		$this->App_Evaporation_inMM_530PM->ViewValue = FormatNumber($this->App_Evaporation_inMM_530PM->ViewValue, 2, -2, -2, -2);
		$this->App_Evaporation_inMM_530PM->ViewCustomAttributes = "";

		// Rainfall_inMM_830AM
		$this->Rainfall_inMM_830AM->ViewValue = $this->Rainfall_inMM_830AM->CurrentValue;
		$this->Rainfall_inMM_830AM->ViewValue = FormatNumber($this->Rainfall_inMM_830AM->ViewValue, 1, -2, -2, -2);
		$this->Rainfall_inMM_830AM->ViewCustomAttributes = "";

		// Rainfall_inMM_530PM
		$this->Rainfall_inMM_530PM->ViewValue = $this->Rainfall_inMM_530PM->CurrentValue;
		$this->Rainfall_inMM_530PM->ViewValue = FormatNumber($this->Rainfall_inMM_530PM->ViewValue, 1, -2, -2, -2);
		$this->Rainfall_inMM_530PM->ViewCustomAttributes = "";

		// Evaporation_curing_inMM_830AM
		$this->Evaporation_curing_inMM_830AM->ViewValue = $this->Evaporation_curing_inMM_830AM->CurrentValue;
		$this->Evaporation_curing_inMM_830AM->ViewValue = FormatNumber($this->Evaporation_curing_inMM_830AM->ViewValue, 1, -2, -2, -2);
		$this->Evaporation_curing_inMM_830AM->ViewCustomAttributes = "";

		// Evaporation_curing_inMM_530PM
		$this->Evaporation_curing_inMM_530PM->ViewValue = $this->Evaporation_curing_inMM_530PM->CurrentValue;
		$this->Evaporation_curing_inMM_530PM->ViewValue = FormatNumber($this->Evaporation_curing_inMM_530PM->ViewValue, 1, -2, -2, -2);
		$this->Evaporation_curing_inMM_530PM->ViewCustomAttributes = "";

		// Evaporation_curing_DaywithRain_inMM
		$this->Evaporation_curing_DaywithRain_inMM->ViewValue = $this->Evaporation_curing_DaywithRain_inMM->CurrentValue;
		$this->Evaporation_curing_DaywithRain_inMM->ViewValue = FormatNumber($this->Evaporation_curing_DaywithRain_inMM->ViewValue, 1, -2, -2, -2);
		$this->Evaporation_curing_DaywithRain_inMM->ViewCustomAttributes = "";

		// Evaporation_curing_DaywithNoRain_inMM
		$this->Evaporation_curing_DaywithNoRain_inMM->ViewValue = $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue;
		$this->Evaporation_curing_DaywithNoRain_inMM->ViewValue = FormatNumber($this->Evaporation_curing_DaywithNoRain_inMM->ViewValue, 1, -2, -2, -2);
		$this->Evaporation_curing_DaywithNoRain_inMM->ViewCustomAttributes = "";

		// Dry_Bulb_Temp_inC_830AM
		$this->Dry_Bulb_Temp_inC_830AM->ViewValue = $this->Dry_Bulb_Temp_inC_830AM->CurrentValue;
		$this->Dry_Bulb_Temp_inC_830AM->ViewValue = FormatNumber($this->Dry_Bulb_Temp_inC_830AM->ViewValue, 2, -2, -2, -2);
		$this->Dry_Bulb_Temp_inC_830AM->ViewCustomAttributes = "";

		// Wet_Bulb_Temp_inC_830AM
		$this->Wet_Bulb_Temp_inC_830AM->ViewValue = $this->Wet_Bulb_Temp_inC_830AM->CurrentValue;
		$this->Wet_Bulb_Temp_inC_830AM->ViewValue = FormatNumber($this->Wet_Bulb_Temp_inC_830AM->ViewValue, 2, -2, -2, -2);
		$this->Wet_Bulb_Temp_inC_830AM->ViewCustomAttributes = "";

		// Vapour_Temp_inC_830AM
		$this->Vapour_Temp_inC_830AM->ViewValue = $this->Vapour_Temp_inC_830AM->CurrentValue;
		$this->Vapour_Temp_inC_830AM->ViewValue = FormatNumber($this->Vapour_Temp_inC_830AM->ViewValue, 2, -2, -2, -2);
		$this->Vapour_Temp_inC_830AM->ViewCustomAttributes = "";

		// Dry_Bulb_Temp_inC_530PM
		$this->Dry_Bulb_Temp_inC_530PM->ViewValue = $this->Dry_Bulb_Temp_inC_530PM->CurrentValue;
		$this->Dry_Bulb_Temp_inC_530PM->ViewValue = FormatNumber($this->Dry_Bulb_Temp_inC_530PM->ViewValue, 2, -2, -2, -2);
		$this->Dry_Bulb_Temp_inC_530PM->ViewCustomAttributes = "";

		// Wet_Bulb_Temp_inC_530PM
		$this->Wet_Bulb_Temp_inC_530PM->ViewValue = $this->Wet_Bulb_Temp_inC_530PM->CurrentValue;
		$this->Wet_Bulb_Temp_inC_530PM->ViewValue = FormatNumber($this->Wet_Bulb_Temp_inC_530PM->ViewValue, 2, -2, -2, -2);
		$this->Wet_Bulb_Temp_inC_530PM->ViewCustomAttributes = "";

		// Vapour_Temp_inC_530PM
		$this->Vapour_Temp_inC_530PM->ViewValue = $this->Vapour_Temp_inC_530PM->CurrentValue;
		$this->Vapour_Temp_inC_530PM->ViewValue = FormatNumber($this->Vapour_Temp_inC_530PM->ViewValue, 2, -2, -2, -2);
		$this->Vapour_Temp_inC_530PM->ViewCustomAttributes = "";

		// Max_Temp_inC
		$this->Max_Temp_inC->ViewValue = $this->Max_Temp_inC->CurrentValue;
		$this->Max_Temp_inC->ViewValue = FormatNumber($this->Max_Temp_inC->ViewValue, 2, -2, -2, -2);
		$this->Max_Temp_inC->ViewCustomAttributes = "";

		// Min_Temp_inC
		$this->Min_Temp_inC->ViewValue = $this->Min_Temp_inC->CurrentValue;
		$this->Min_Temp_inC->ViewValue = FormatNumber($this->Min_Temp_inC->ViewValue, 2, -2, -2, -2);
		$this->Min_Temp_inC->ViewCustomAttributes = "";

		// Total_Wind_Run_inKM_830AM
		$this->Total_Wind_Run_inKM_830AM->ViewValue = $this->Total_Wind_Run_inKM_830AM->CurrentValue;
		$this->Total_Wind_Run_inKM_830AM->ViewValue = FormatNumber($this->Total_Wind_Run_inKM_830AM->ViewValue, 2, -2, -2, -2);
		$this->Total_Wind_Run_inKM_830AM->ViewCustomAttributes = "";

		// Total_Wind_Run_inKM_530PM
		$this->Total_Wind_Run_inKM_530PM->ViewValue = $this->Total_Wind_Run_inKM_530PM->CurrentValue;
		$this->Total_Wind_Run_inKM_530PM->ViewValue = FormatNumber($this->Total_Wind_Run_inKM_530PM->ViewValue, 2, -2, -2, -2);
		$this->Total_Wind_Run_inKM_530PM->ViewCustomAttributes = "";

		// Average_Wind_Speed_inKM
		$this->Average_Wind_Speed_inKM->ViewValue = $this->Average_Wind_Speed_inKM->CurrentValue;
		$this->Average_Wind_Speed_inKM->ViewValue = FormatNumber($this->Average_Wind_Speed_inKM->ViewValue, 2, -2, -2, -2);
		$this->Average_Wind_Speed_inKM->ViewCustomAttributes = "";

		// Number_of_Hours_of_Brightsuned
		$this->Number_of_Hours_of_Brightsuned->ViewValue = $this->Number_of_Hours_of_Brightsuned->CurrentValue;
		$this->Number_of_Hours_of_Brightsuned->ViewValue = FormatNumber($this->Number_of_Hours_of_Brightsuned->ViewValue, 2, -2, -2, -2);
		$this->Number_of_Hours_of_Brightsuned->ViewCustomAttributes = "";

		// Relative_Humidity_in_Precentage_830AM
		$this->Relative_Humidity_in_Precentage_830AM->ViewValue = $this->Relative_Humidity_in_Precentage_830AM->CurrentValue;
		$this->Relative_Humidity_in_Precentage_830AM->ViewValue = FormatNumber($this->Relative_Humidity_in_Precentage_830AM->ViewValue, 2, -2, -2, -2);
		$this->Relative_Humidity_in_Precentage_830AM->ViewCustomAttributes = "";

		// Relative_Humidity_in_Precentage_530PM
		$this->Relative_Humidity_in_Precentage_530PM->ViewValue = $this->Relative_Humidity_in_Precentage_530PM->CurrentValue;
		$this->Relative_Humidity_in_Precentage_530PM->ViewValue = FormatNumber($this->Relative_Humidity_in_Precentage_530PM->ViewValue, 2, -2, -2, -2);
		$this->Relative_Humidity_in_Precentage_530PM->ViewCustomAttributes = "";

		// obs_remarks
		$this->obs_remarks->ViewValue = $this->obs_remarks->CurrentValue;
		$this->obs_remarks->ViewCustomAttributes = "";

		// Status
		$this->Status->ViewValue = $this->Status->CurrentValue;
		$this->Status->ViewValue = FormatNumber($this->Status->ViewValue, 0, -2, -2, -2);
		$this->Status->ViewCustomAttributes = "";

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

		// Slno
		$this->Slno->LinkCustomAttributes = "";
		$this->Slno->HrefValue = "";
		$this->Slno->TooltipValue = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// obs_DateTime
		$this->obs_DateTime->LinkCustomAttributes = "";
		$this->obs_DateTime->HrefValue = "";
		$this->obs_DateTime->TooltipValue = "";

		// Temp_water_in_pan_inC_830AM
		$this->Temp_water_in_pan_inC_830AM->LinkCustomAttributes = "";
		$this->Temp_water_in_pan_inC_830AM->HrefValue = "";
		$this->Temp_water_in_pan_inC_830AM->TooltipValue = "";

		// Temp_water_in_pan_inC_530PM
		$this->Temp_water_in_pan_inC_530PM->LinkCustomAttributes = "";
		$this->Temp_water_in_pan_inC_530PM->HrefValue = "";
		$this->Temp_water_in_pan_inC_530PM->TooltipValue = "";

		// App_Evaporation_inMM_830AM
		$this->App_Evaporation_inMM_830AM->LinkCustomAttributes = "";
		$this->App_Evaporation_inMM_830AM->HrefValue = "";
		$this->App_Evaporation_inMM_830AM->TooltipValue = "";

		// App_Evaporation_inMM_530PM
		$this->App_Evaporation_inMM_530PM->LinkCustomAttributes = "";
		$this->App_Evaporation_inMM_530PM->HrefValue = "";
		$this->App_Evaporation_inMM_530PM->TooltipValue = "";

		// Rainfall_inMM_830AM
		$this->Rainfall_inMM_830AM->LinkCustomAttributes = "";
		$this->Rainfall_inMM_830AM->HrefValue = "";
		$this->Rainfall_inMM_830AM->TooltipValue = "";

		// Rainfall_inMM_530PM
		$this->Rainfall_inMM_530PM->LinkCustomAttributes = "";
		$this->Rainfall_inMM_530PM->HrefValue = "";
		$this->Rainfall_inMM_530PM->TooltipValue = "";

		// Evaporation_curing_inMM_830AM
		$this->Evaporation_curing_inMM_830AM->LinkCustomAttributes = "";
		$this->Evaporation_curing_inMM_830AM->HrefValue = "";
		$this->Evaporation_curing_inMM_830AM->TooltipValue = "";

		// Evaporation_curing_inMM_530PM
		$this->Evaporation_curing_inMM_530PM->LinkCustomAttributes = "";
		$this->Evaporation_curing_inMM_530PM->HrefValue = "";
		$this->Evaporation_curing_inMM_530PM->TooltipValue = "";

		// Evaporation_curing_DaywithRain_inMM
		$this->Evaporation_curing_DaywithRain_inMM->LinkCustomAttributes = "";
		$this->Evaporation_curing_DaywithRain_inMM->HrefValue = "";
		$this->Evaporation_curing_DaywithRain_inMM->TooltipValue = "";

		// Evaporation_curing_DaywithNoRain_inMM
		$this->Evaporation_curing_DaywithNoRain_inMM->LinkCustomAttributes = "";
		$this->Evaporation_curing_DaywithNoRain_inMM->HrefValue = "";
		$this->Evaporation_curing_DaywithNoRain_inMM->TooltipValue = "";

		// Dry_Bulb_Temp_inC_830AM
		$this->Dry_Bulb_Temp_inC_830AM->LinkCustomAttributes = "";
		$this->Dry_Bulb_Temp_inC_830AM->HrefValue = "";
		$this->Dry_Bulb_Temp_inC_830AM->TooltipValue = "";

		// Wet_Bulb_Temp_inC_830AM
		$this->Wet_Bulb_Temp_inC_830AM->LinkCustomAttributes = "";
		$this->Wet_Bulb_Temp_inC_830AM->HrefValue = "";
		$this->Wet_Bulb_Temp_inC_830AM->TooltipValue = "";

		// Vapour_Temp_inC_830AM
		$this->Vapour_Temp_inC_830AM->LinkCustomAttributes = "";
		$this->Vapour_Temp_inC_830AM->HrefValue = "";
		$this->Vapour_Temp_inC_830AM->TooltipValue = "";

		// Dry_Bulb_Temp_inC_530PM
		$this->Dry_Bulb_Temp_inC_530PM->LinkCustomAttributes = "";
		$this->Dry_Bulb_Temp_inC_530PM->HrefValue = "";
		$this->Dry_Bulb_Temp_inC_530PM->TooltipValue = "";

		// Wet_Bulb_Temp_inC_530PM
		$this->Wet_Bulb_Temp_inC_530PM->LinkCustomAttributes = "";
		$this->Wet_Bulb_Temp_inC_530PM->HrefValue = "";
		$this->Wet_Bulb_Temp_inC_530PM->TooltipValue = "";

		// Vapour_Temp_inC_530PM
		$this->Vapour_Temp_inC_530PM->LinkCustomAttributes = "";
		$this->Vapour_Temp_inC_530PM->HrefValue = "";
		$this->Vapour_Temp_inC_530PM->TooltipValue = "";

		// Max_Temp_inC
		$this->Max_Temp_inC->LinkCustomAttributes = "";
		$this->Max_Temp_inC->HrefValue = "";
		$this->Max_Temp_inC->TooltipValue = "";

		// Min_Temp_inC
		$this->Min_Temp_inC->LinkCustomAttributes = "";
		$this->Min_Temp_inC->HrefValue = "";
		$this->Min_Temp_inC->TooltipValue = "";

		// Total_Wind_Run_inKM_830AM
		$this->Total_Wind_Run_inKM_830AM->LinkCustomAttributes = "";
		$this->Total_Wind_Run_inKM_830AM->HrefValue = "";
		$this->Total_Wind_Run_inKM_830AM->TooltipValue = "";

		// Total_Wind_Run_inKM_530PM
		$this->Total_Wind_Run_inKM_530PM->LinkCustomAttributes = "";
		$this->Total_Wind_Run_inKM_530PM->HrefValue = "";
		$this->Total_Wind_Run_inKM_530PM->TooltipValue = "";

		// Average_Wind_Speed_inKM
		$this->Average_Wind_Speed_inKM->LinkCustomAttributes = "";
		$this->Average_Wind_Speed_inKM->HrefValue = "";
		$this->Average_Wind_Speed_inKM->TooltipValue = "";

		// Number_of_Hours_of_Brightsuned
		$this->Number_of_Hours_of_Brightsuned->LinkCustomAttributes = "";
		$this->Number_of_Hours_of_Brightsuned->HrefValue = "";
		$this->Number_of_Hours_of_Brightsuned->TooltipValue = "";

		// Relative_Humidity_in_Precentage_830AM
		$this->Relative_Humidity_in_Precentage_830AM->LinkCustomAttributes = "";
		$this->Relative_Humidity_in_Precentage_830AM->HrefValue = "";
		$this->Relative_Humidity_in_Precentage_830AM->TooltipValue = "";

		// Relative_Humidity_in_Precentage_530PM
		$this->Relative_Humidity_in_Precentage_530PM->LinkCustomAttributes = "";
		$this->Relative_Humidity_in_Precentage_530PM->HrefValue = "";
		$this->Relative_Humidity_in_Precentage_530PM->TooltipValue = "";

		// obs_remarks
		$this->obs_remarks->LinkCustomAttributes = "";
		$this->obs_remarks->HrefValue = "";
		$this->obs_remarks->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// Validated
		$this->Validated->LinkCustomAttributes = "";
		$this->Validated->HrefValue = "";
		$this->Validated->TooltipValue = "";

		// isFreeze
		$this->isFreeze->LinkCustomAttributes = "";
		$this->isFreeze->HrefValue = "";
		$this->isFreeze->TooltipValue = "";

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

		// obs_DateTime
		$this->obs_DateTime->EditAttrs["class"] = "form-control";
		$this->obs_DateTime->EditCustomAttributes = "";
		$this->obs_DateTime->EditValue = FormatDateTime($this->obs_DateTime->CurrentValue, 7);

		// Temp_water_in_pan_inC_830AM
		$this->Temp_water_in_pan_inC_830AM->EditAttrs["class"] = "form-control";
		$this->Temp_water_in_pan_inC_830AM->EditCustomAttributes = "";
		$this->Temp_water_in_pan_inC_830AM->EditValue = $this->Temp_water_in_pan_inC_830AM->CurrentValue;
		if (strval($this->Temp_water_in_pan_inC_830AM->EditValue) != "" && is_numeric($this->Temp_water_in_pan_inC_830AM->EditValue))
			$this->Temp_water_in_pan_inC_830AM->EditValue = FormatNumber($this->Temp_water_in_pan_inC_830AM->EditValue, -2, -2, -2, -2);
		

		// Temp_water_in_pan_inC_530PM
		$this->Temp_water_in_pan_inC_530PM->EditAttrs["class"] = "form-control";
		$this->Temp_water_in_pan_inC_530PM->EditCustomAttributes = "";
		$this->Temp_water_in_pan_inC_530PM->EditValue = $this->Temp_water_in_pan_inC_530PM->CurrentValue;
		if (strval($this->Temp_water_in_pan_inC_530PM->EditValue) != "" && is_numeric($this->Temp_water_in_pan_inC_530PM->EditValue))
			$this->Temp_water_in_pan_inC_530PM->EditValue = FormatNumber($this->Temp_water_in_pan_inC_530PM->EditValue, -2, -2, -2, -2);
		

		// App_Evaporation_inMM_830AM
		$this->App_Evaporation_inMM_830AM->EditAttrs["class"] = "form-control";
		$this->App_Evaporation_inMM_830AM->EditCustomAttributes = "";
		$this->App_Evaporation_inMM_830AM->EditValue = $this->App_Evaporation_inMM_830AM->CurrentValue;
		if (strval($this->App_Evaporation_inMM_830AM->EditValue) != "" && is_numeric($this->App_Evaporation_inMM_830AM->EditValue))
			$this->App_Evaporation_inMM_830AM->EditValue = FormatNumber($this->App_Evaporation_inMM_830AM->EditValue, -2, -2, -2, -2);
		

		// App_Evaporation_inMM_530PM
		$this->App_Evaporation_inMM_530PM->EditAttrs["class"] = "form-control";
		$this->App_Evaporation_inMM_530PM->EditCustomAttributes = "";
		$this->App_Evaporation_inMM_530PM->EditValue = $this->App_Evaporation_inMM_530PM->CurrentValue;
		if (strval($this->App_Evaporation_inMM_530PM->EditValue) != "" && is_numeric($this->App_Evaporation_inMM_530PM->EditValue))
			$this->App_Evaporation_inMM_530PM->EditValue = FormatNumber($this->App_Evaporation_inMM_530PM->EditValue, -2, -2, -2, -2);
		

		// Rainfall_inMM_830AM
		$this->Rainfall_inMM_830AM->EditAttrs["class"] = "form-control";
		$this->Rainfall_inMM_830AM->EditCustomAttributes = "";
		$this->Rainfall_inMM_830AM->EditValue = $this->Rainfall_inMM_830AM->CurrentValue;
		if (strval($this->Rainfall_inMM_830AM->EditValue) != "" && is_numeric($this->Rainfall_inMM_830AM->EditValue))
			$this->Rainfall_inMM_830AM->EditValue = FormatNumber($this->Rainfall_inMM_830AM->EditValue, -2, -2, -2, -2);
		

		// Rainfall_inMM_530PM
		$this->Rainfall_inMM_530PM->EditAttrs["class"] = "form-control";
		$this->Rainfall_inMM_530PM->EditCustomAttributes = "";
		$this->Rainfall_inMM_530PM->EditValue = $this->Rainfall_inMM_530PM->CurrentValue;
		if (strval($this->Rainfall_inMM_530PM->EditValue) != "" && is_numeric($this->Rainfall_inMM_530PM->EditValue))
			$this->Rainfall_inMM_530PM->EditValue = FormatNumber($this->Rainfall_inMM_530PM->EditValue, -2, -2, -2, -2);
		

		// Evaporation_curing_inMM_830AM
		$this->Evaporation_curing_inMM_830AM->EditAttrs["class"] = "form-control";
		$this->Evaporation_curing_inMM_830AM->EditCustomAttributes = "";
		$this->Evaporation_curing_inMM_830AM->EditValue = $this->Evaporation_curing_inMM_830AM->CurrentValue;
		if (strval($this->Evaporation_curing_inMM_830AM->EditValue) != "" && is_numeric($this->Evaporation_curing_inMM_830AM->EditValue))
			$this->Evaporation_curing_inMM_830AM->EditValue = FormatNumber($this->Evaporation_curing_inMM_830AM->EditValue, -2, -2, -2, -2);
		

		// Evaporation_curing_inMM_530PM
		$this->Evaporation_curing_inMM_530PM->EditAttrs["class"] = "form-control";
		$this->Evaporation_curing_inMM_530PM->EditCustomAttributes = "";
		$this->Evaporation_curing_inMM_530PM->EditValue = $this->Evaporation_curing_inMM_530PM->CurrentValue;
		if (strval($this->Evaporation_curing_inMM_530PM->EditValue) != "" && is_numeric($this->Evaporation_curing_inMM_530PM->EditValue))
			$this->Evaporation_curing_inMM_530PM->EditValue = FormatNumber($this->Evaporation_curing_inMM_530PM->EditValue, -2, -2, -2, -2);
		

		// Evaporation_curing_DaywithRain_inMM
		$this->Evaporation_curing_DaywithRain_inMM->EditAttrs["class"] = "form-control";
		$this->Evaporation_curing_DaywithRain_inMM->EditCustomAttributes = "";
		$this->Evaporation_curing_DaywithRain_inMM->EditValue = $this->Evaporation_curing_DaywithRain_inMM->CurrentValue;
		if (strval($this->Evaporation_curing_DaywithRain_inMM->EditValue) != "" && is_numeric($this->Evaporation_curing_DaywithRain_inMM->EditValue))
			$this->Evaporation_curing_DaywithRain_inMM->EditValue = FormatNumber($this->Evaporation_curing_DaywithRain_inMM->EditValue, -2, -2, -2, -2);
		

		// Evaporation_curing_DaywithNoRain_inMM
		$this->Evaporation_curing_DaywithNoRain_inMM->EditAttrs["class"] = "form-control";
		$this->Evaporation_curing_DaywithNoRain_inMM->EditCustomAttributes = "";
		$this->Evaporation_curing_DaywithNoRain_inMM->EditValue = $this->Evaporation_curing_DaywithNoRain_inMM->CurrentValue;
		if (strval($this->Evaporation_curing_DaywithNoRain_inMM->EditValue) != "" && is_numeric($this->Evaporation_curing_DaywithNoRain_inMM->EditValue))
			$this->Evaporation_curing_DaywithNoRain_inMM->EditValue = FormatNumber($this->Evaporation_curing_DaywithNoRain_inMM->EditValue, -2, -2, -2, -2);
		

		// Dry_Bulb_Temp_inC_830AM
		$this->Dry_Bulb_Temp_inC_830AM->EditAttrs["class"] = "form-control";
		$this->Dry_Bulb_Temp_inC_830AM->EditCustomAttributes = "";
		$this->Dry_Bulb_Temp_inC_830AM->EditValue = $this->Dry_Bulb_Temp_inC_830AM->CurrentValue;
		if (strval($this->Dry_Bulb_Temp_inC_830AM->EditValue) != "" && is_numeric($this->Dry_Bulb_Temp_inC_830AM->EditValue))
			$this->Dry_Bulb_Temp_inC_830AM->EditValue = FormatNumber($this->Dry_Bulb_Temp_inC_830AM->EditValue, -2, -2, -2, -2);
		

		// Wet_Bulb_Temp_inC_830AM
		$this->Wet_Bulb_Temp_inC_830AM->EditAttrs["class"] = "form-control";
		$this->Wet_Bulb_Temp_inC_830AM->EditCustomAttributes = "";
		$this->Wet_Bulb_Temp_inC_830AM->EditValue = $this->Wet_Bulb_Temp_inC_830AM->CurrentValue;
		if (strval($this->Wet_Bulb_Temp_inC_830AM->EditValue) != "" && is_numeric($this->Wet_Bulb_Temp_inC_830AM->EditValue))
			$this->Wet_Bulb_Temp_inC_830AM->EditValue = FormatNumber($this->Wet_Bulb_Temp_inC_830AM->EditValue, -2, -2, -2, -2);
		

		// Vapour_Temp_inC_830AM
		$this->Vapour_Temp_inC_830AM->EditAttrs["class"] = "form-control";
		$this->Vapour_Temp_inC_830AM->EditCustomAttributes = "";
		$this->Vapour_Temp_inC_830AM->EditValue = $this->Vapour_Temp_inC_830AM->CurrentValue;
		if (strval($this->Vapour_Temp_inC_830AM->EditValue) != "" && is_numeric($this->Vapour_Temp_inC_830AM->EditValue))
			$this->Vapour_Temp_inC_830AM->EditValue = FormatNumber($this->Vapour_Temp_inC_830AM->EditValue, -2, -2, -2, -2);
		

		// Dry_Bulb_Temp_inC_530PM
		$this->Dry_Bulb_Temp_inC_530PM->EditAttrs["class"] = "form-control";
		$this->Dry_Bulb_Temp_inC_530PM->EditCustomAttributes = "";
		$this->Dry_Bulb_Temp_inC_530PM->EditValue = $this->Dry_Bulb_Temp_inC_530PM->CurrentValue;
		if (strval($this->Dry_Bulb_Temp_inC_530PM->EditValue) != "" && is_numeric($this->Dry_Bulb_Temp_inC_530PM->EditValue))
			$this->Dry_Bulb_Temp_inC_530PM->EditValue = FormatNumber($this->Dry_Bulb_Temp_inC_530PM->EditValue, -2, -2, -2, -2);
		

		// Wet_Bulb_Temp_inC_530PM
		$this->Wet_Bulb_Temp_inC_530PM->EditAttrs["class"] = "form-control";
		$this->Wet_Bulb_Temp_inC_530PM->EditCustomAttributes = "";
		$this->Wet_Bulb_Temp_inC_530PM->EditValue = $this->Wet_Bulb_Temp_inC_530PM->CurrentValue;
		if (strval($this->Wet_Bulb_Temp_inC_530PM->EditValue) != "" && is_numeric($this->Wet_Bulb_Temp_inC_530PM->EditValue))
			$this->Wet_Bulb_Temp_inC_530PM->EditValue = FormatNumber($this->Wet_Bulb_Temp_inC_530PM->EditValue, -2, -2, -2, -2);
		

		// Vapour_Temp_inC_530PM
		$this->Vapour_Temp_inC_530PM->EditAttrs["class"] = "form-control";
		$this->Vapour_Temp_inC_530PM->EditCustomAttributes = "";
		$this->Vapour_Temp_inC_530PM->EditValue = $this->Vapour_Temp_inC_530PM->CurrentValue;
		if (strval($this->Vapour_Temp_inC_530PM->EditValue) != "" && is_numeric($this->Vapour_Temp_inC_530PM->EditValue))
			$this->Vapour_Temp_inC_530PM->EditValue = FormatNumber($this->Vapour_Temp_inC_530PM->EditValue, -2, -2, -2, -2);
		

		// Max_Temp_inC
		$this->Max_Temp_inC->EditAttrs["class"] = "form-control";
		$this->Max_Temp_inC->EditCustomAttributes = "";
		$this->Max_Temp_inC->EditValue = $this->Max_Temp_inC->CurrentValue;
		if (strval($this->Max_Temp_inC->EditValue) != "" && is_numeric($this->Max_Temp_inC->EditValue))
			$this->Max_Temp_inC->EditValue = FormatNumber($this->Max_Temp_inC->EditValue, -2, -2, -2, -2);
		

		// Min_Temp_inC
		$this->Min_Temp_inC->EditAttrs["class"] = "form-control";
		$this->Min_Temp_inC->EditCustomAttributes = "";
		$this->Min_Temp_inC->EditValue = $this->Min_Temp_inC->CurrentValue;
		if (strval($this->Min_Temp_inC->EditValue) != "" && is_numeric($this->Min_Temp_inC->EditValue))
			$this->Min_Temp_inC->EditValue = FormatNumber($this->Min_Temp_inC->EditValue, -2, -2, -2, -2);
		

		// Total_Wind_Run_inKM_830AM
		$this->Total_Wind_Run_inKM_830AM->EditAttrs["class"] = "form-control";
		$this->Total_Wind_Run_inKM_830AM->EditCustomAttributes = "";
		$this->Total_Wind_Run_inKM_830AM->EditValue = $this->Total_Wind_Run_inKM_830AM->CurrentValue;
		if (strval($this->Total_Wind_Run_inKM_830AM->EditValue) != "" && is_numeric($this->Total_Wind_Run_inKM_830AM->EditValue))
			$this->Total_Wind_Run_inKM_830AM->EditValue = FormatNumber($this->Total_Wind_Run_inKM_830AM->EditValue, -2, -2, -2, -2);
		

		// Total_Wind_Run_inKM_530PM
		$this->Total_Wind_Run_inKM_530PM->EditAttrs["class"] = "form-control";
		$this->Total_Wind_Run_inKM_530PM->EditCustomAttributes = "";
		$this->Total_Wind_Run_inKM_530PM->EditValue = $this->Total_Wind_Run_inKM_530PM->CurrentValue;
		if (strval($this->Total_Wind_Run_inKM_530PM->EditValue) != "" && is_numeric($this->Total_Wind_Run_inKM_530PM->EditValue))
			$this->Total_Wind_Run_inKM_530PM->EditValue = FormatNumber($this->Total_Wind_Run_inKM_530PM->EditValue, -2, -2, -2, -2);
		

		// Average_Wind_Speed_inKM
		$this->Average_Wind_Speed_inKM->EditAttrs["class"] = "form-control";
		$this->Average_Wind_Speed_inKM->EditCustomAttributes = "";
		$this->Average_Wind_Speed_inKM->EditValue = $this->Average_Wind_Speed_inKM->CurrentValue;
		if (strval($this->Average_Wind_Speed_inKM->EditValue) != "" && is_numeric($this->Average_Wind_Speed_inKM->EditValue))
			$this->Average_Wind_Speed_inKM->EditValue = FormatNumber($this->Average_Wind_Speed_inKM->EditValue, -2, -2, -2, -2);
		

		// Number_of_Hours_of_Brightsuned
		$this->Number_of_Hours_of_Brightsuned->EditAttrs["class"] = "form-control";
		$this->Number_of_Hours_of_Brightsuned->EditCustomAttributes = "";
		$this->Number_of_Hours_of_Brightsuned->EditValue = $this->Number_of_Hours_of_Brightsuned->CurrentValue;
		if (strval($this->Number_of_Hours_of_Brightsuned->EditValue) != "" && is_numeric($this->Number_of_Hours_of_Brightsuned->EditValue))
			$this->Number_of_Hours_of_Brightsuned->EditValue = FormatNumber($this->Number_of_Hours_of_Brightsuned->EditValue, -2, -2, -2, -2);
		

		// Relative_Humidity_in_Precentage_830AM
		$this->Relative_Humidity_in_Precentage_830AM->EditAttrs["class"] = "form-control";
		$this->Relative_Humidity_in_Precentage_830AM->EditCustomAttributes = "";
		$this->Relative_Humidity_in_Precentage_830AM->EditValue = $this->Relative_Humidity_in_Precentage_830AM->CurrentValue;
		if (strval($this->Relative_Humidity_in_Precentage_830AM->EditValue) != "" && is_numeric($this->Relative_Humidity_in_Precentage_830AM->EditValue))
			$this->Relative_Humidity_in_Precentage_830AM->EditValue = FormatNumber($this->Relative_Humidity_in_Precentage_830AM->EditValue, -2, -2, -2, -2);
		

		// Relative_Humidity_in_Precentage_530PM
		$this->Relative_Humidity_in_Precentage_530PM->EditAttrs["class"] = "form-control";
		$this->Relative_Humidity_in_Precentage_530PM->EditCustomAttributes = "";
		$this->Relative_Humidity_in_Precentage_530PM->EditValue = $this->Relative_Humidity_in_Precentage_530PM->CurrentValue;
		if (strval($this->Relative_Humidity_in_Precentage_530PM->EditValue) != "" && is_numeric($this->Relative_Humidity_in_Precentage_530PM->EditValue))
			$this->Relative_Humidity_in_Precentage_530PM->EditValue = FormatNumber($this->Relative_Humidity_in_Precentage_530PM->EditValue, -2, -2, -2, -2);
		

		// obs_remarks
		$this->obs_remarks->EditAttrs["class"] = "form-control";
		$this->obs_remarks->EditCustomAttributes = "";
		if (!$this->obs_remarks->Raw)
			$this->obs_remarks->CurrentValue = HtmlDecode($this->obs_remarks->CurrentValue);
		$this->obs_remarks->EditValue = $this->obs_remarks->CurrentValue;

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";
		$this->Status->EditValue = $this->Status->CurrentValue;

		// Validated
		$this->Validated->EditAttrs["class"] = "form-control";
		$this->Validated->EditCustomAttributes = "";
		$this->Validated->EditValue = $this->Validated->CurrentValue;

		// isFreeze
		$this->isFreeze->EditCustomAttributes = "";
		$this->isFreeze->EditValue = $this->isFreeze->options(FALSE);

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
					$doc->exportCaption($this->obs_DateTime);
					$doc->exportCaption($this->Temp_water_in_pan_inC_830AM);
					$doc->exportCaption($this->Temp_water_in_pan_inC_530PM);
					$doc->exportCaption($this->App_Evaporation_inMM_830AM);
					$doc->exportCaption($this->App_Evaporation_inMM_530PM);
					$doc->exportCaption($this->Rainfall_inMM_830AM);
					$doc->exportCaption($this->Rainfall_inMM_530PM);
					$doc->exportCaption($this->Evaporation_curing_inMM_830AM);
					$doc->exportCaption($this->Evaporation_curing_inMM_530PM);
					$doc->exportCaption($this->Evaporation_curing_DaywithRain_inMM);
					$doc->exportCaption($this->Evaporation_curing_DaywithNoRain_inMM);
					$doc->exportCaption($this->Dry_Bulb_Temp_inC_830AM);
					$doc->exportCaption($this->Wet_Bulb_Temp_inC_830AM);
					$doc->exportCaption($this->Vapour_Temp_inC_830AM);
					$doc->exportCaption($this->Dry_Bulb_Temp_inC_530PM);
					$doc->exportCaption($this->Wet_Bulb_Temp_inC_530PM);
					$doc->exportCaption($this->Vapour_Temp_inC_530PM);
					$doc->exportCaption($this->Max_Temp_inC);
					$doc->exportCaption($this->Min_Temp_inC);
					$doc->exportCaption($this->Total_Wind_Run_inKM_830AM);
					$doc->exportCaption($this->Total_Wind_Run_inKM_530PM);
					$doc->exportCaption($this->Average_Wind_Speed_inKM);
					$doc->exportCaption($this->Number_of_Hours_of_Brightsuned);
					$doc->exportCaption($this->Relative_Humidity_in_Precentage_830AM);
					$doc->exportCaption($this->Relative_Humidity_in_Precentage_530PM);
					$doc->exportCaption($this->obs_remarks);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->Validated);
					$doc->exportCaption($this->isFreeze);
				} else {
					$doc->exportCaption($this->Slno);
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->obs_DateTime);
					$doc->exportCaption($this->Temp_water_in_pan_inC_830AM);
					$doc->exportCaption($this->Temp_water_in_pan_inC_530PM);
					$doc->exportCaption($this->App_Evaporation_inMM_830AM);
					$doc->exportCaption($this->App_Evaporation_inMM_530PM);
					$doc->exportCaption($this->Rainfall_inMM_830AM);
					$doc->exportCaption($this->Rainfall_inMM_530PM);
					$doc->exportCaption($this->Evaporation_curing_inMM_830AM);
					$doc->exportCaption($this->Evaporation_curing_inMM_530PM);
					$doc->exportCaption($this->Evaporation_curing_DaywithRain_inMM);
					$doc->exportCaption($this->Evaporation_curing_DaywithNoRain_inMM);
					$doc->exportCaption($this->Dry_Bulb_Temp_inC_830AM);
					$doc->exportCaption($this->Wet_Bulb_Temp_inC_830AM);
					$doc->exportCaption($this->Vapour_Temp_inC_830AM);
					$doc->exportCaption($this->Dry_Bulb_Temp_inC_530PM);
					$doc->exportCaption($this->Wet_Bulb_Temp_inC_530PM);
					$doc->exportCaption($this->Vapour_Temp_inC_530PM);
					$doc->exportCaption($this->Max_Temp_inC);
					$doc->exportCaption($this->Min_Temp_inC);
					$doc->exportCaption($this->Total_Wind_Run_inKM_830AM);
					$doc->exportCaption($this->Total_Wind_Run_inKM_530PM);
					$doc->exportCaption($this->Average_Wind_Speed_inKM);
					$doc->exportCaption($this->Number_of_Hours_of_Brightsuned);
					$doc->exportCaption($this->Relative_Humidity_in_Precentage_830AM);
					$doc->exportCaption($this->Relative_Humidity_in_Precentage_530PM);
					$doc->exportCaption($this->obs_remarks);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->Validated);
					$doc->exportCaption($this->isFreeze);
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
						$doc->exportField($this->obs_DateTime);
						$doc->exportField($this->Temp_water_in_pan_inC_830AM);
						$doc->exportField($this->Temp_water_in_pan_inC_530PM);
						$doc->exportField($this->App_Evaporation_inMM_830AM);
						$doc->exportField($this->App_Evaporation_inMM_530PM);
						$doc->exportField($this->Rainfall_inMM_830AM);
						$doc->exportField($this->Rainfall_inMM_530PM);
						$doc->exportField($this->Evaporation_curing_inMM_830AM);
						$doc->exportField($this->Evaporation_curing_inMM_530PM);
						$doc->exportField($this->Evaporation_curing_DaywithRain_inMM);
						$doc->exportField($this->Evaporation_curing_DaywithNoRain_inMM);
						$doc->exportField($this->Dry_Bulb_Temp_inC_830AM);
						$doc->exportField($this->Wet_Bulb_Temp_inC_830AM);
						$doc->exportField($this->Vapour_Temp_inC_830AM);
						$doc->exportField($this->Dry_Bulb_Temp_inC_530PM);
						$doc->exportField($this->Wet_Bulb_Temp_inC_530PM);
						$doc->exportField($this->Vapour_Temp_inC_530PM);
						$doc->exportField($this->Max_Temp_inC);
						$doc->exportField($this->Min_Temp_inC);
						$doc->exportField($this->Total_Wind_Run_inKM_830AM);
						$doc->exportField($this->Total_Wind_Run_inKM_530PM);
						$doc->exportField($this->Average_Wind_Speed_inKM);
						$doc->exportField($this->Number_of_Hours_of_Brightsuned);
						$doc->exportField($this->Relative_Humidity_in_Precentage_830AM);
						$doc->exportField($this->Relative_Humidity_in_Precentage_530PM);
						$doc->exportField($this->obs_remarks);
						$doc->exportField($this->Status);
						$doc->exportField($this->Validated);
						$doc->exportField($this->isFreeze);
					} else {
						$doc->exportField($this->Slno);
						$doc->exportField($this->StationId);
						$doc->exportField($this->obs_DateTime);
						$doc->exportField($this->Temp_water_in_pan_inC_830AM);
						$doc->exportField($this->Temp_water_in_pan_inC_530PM);
						$doc->exportField($this->App_Evaporation_inMM_830AM);
						$doc->exportField($this->App_Evaporation_inMM_530PM);
						$doc->exportField($this->Rainfall_inMM_830AM);
						$doc->exportField($this->Rainfall_inMM_530PM);
						$doc->exportField($this->Evaporation_curing_inMM_830AM);
						$doc->exportField($this->Evaporation_curing_inMM_530PM);
						$doc->exportField($this->Evaporation_curing_DaywithRain_inMM);
						$doc->exportField($this->Evaporation_curing_DaywithNoRain_inMM);
						$doc->exportField($this->Dry_Bulb_Temp_inC_830AM);
						$doc->exportField($this->Wet_Bulb_Temp_inC_830AM);
						$doc->exportField($this->Vapour_Temp_inC_830AM);
						$doc->exportField($this->Dry_Bulb_Temp_inC_530PM);
						$doc->exportField($this->Wet_Bulb_Temp_inC_530PM);
						$doc->exportField($this->Vapour_Temp_inC_530PM);
						$doc->exportField($this->Max_Temp_inC);
						$doc->exportField($this->Min_Temp_inC);
						$doc->exportField($this->Total_Wind_Run_inKM_830AM);
						$doc->exportField($this->Total_Wind_Run_inKM_530PM);
						$doc->exportField($this->Average_Wind_Speed_inKM);
						$doc->exportField($this->Number_of_Hours_of_Brightsuned);
						$doc->exportField($this->Relative_Humidity_in_Precentage_830AM);
						$doc->exportField($this->Relative_Humidity_in_Precentage_530PM);
						$doc->exportField($this->obs_remarks);
						$doc->exportField($this->Status);
						$doc->exportField($this->Validated);
						$doc->exportField($this->isFreeze);
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