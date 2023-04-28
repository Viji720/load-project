<?php namespace PHPMaker2020\cehp; ?>
<?php

/**
 * Table class for master_station
 */
class master_station extends DbTable
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
	public $StationId;
	public $SubDivisionId;
	public $StationName;
	public $StationName_kn;
	public $MobileNumber;
	public $Longitude;
	public $Latitude;
	public $Altitude_MSL_in_mtrs;
	public $station_type;
	public $IsActive;
	public $last_active_date;
	public $DistrictId;
	public $TalukID;
	public $BasinId;
	public $SubBasinId;
	public $CatchUpId;
	public $PIC;
	public $RiverId;
	public $Address;
	public $max_rainfall_date;
	public $max_rainfall;
	public $last_reading_date;
	public $first_reading_date;
	public $no_of_manual_entry;
	public $no_of_sms;
	public $NewStationCode;
	public $DivisionId;
	public $StationSetup;
	public $StationName_hi;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'master_station';
		$this->TableName = 'master_station';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`master_station`";
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

		// StationId
		$this->StationId = new DbField('master_station', 'master_station', 'x_StationId', 'StationId', '`StationId`', '`StationId`', 3, 11, -1, FALSE, '`StationId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationId->IsPrimaryKey = TRUE; // Primary key field
		$this->StationId->Nullable = FALSE; // NOT NULL field
		$this->StationId->Required = TRUE; // Required field
		$this->StationId->Sortable = TRUE; // Allow sort
		$this->StationId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StationId'] = &$this->StationId;

		// SubDivisionId
		$this->SubDivisionId = new DbField('master_station', 'master_station', 'x_SubDivisionId', 'SubDivisionId', '`SubDivisionId`', '`SubDivisionId`', 3, 11, -1, FALSE, '`SubDivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
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

		// StationName
		$this->StationName = new DbField('master_station', 'master_station', 'x_StationName', 'StationName', '`StationName`', '`StationName`', 200, 30, -1, FALSE, '`StationName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName->Sortable = TRUE; // Allow sort
		$this->fields['StationName'] = &$this->StationName;

		// StationName_kn
		$this->StationName_kn = new DbField('master_station', 'master_station', 'x_StationName_kn', 'StationName_kn', '`StationName_kn`', '`StationName_kn`', 200, 30, -1, FALSE, '`StationName_kn`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName_kn->Sortable = TRUE; // Allow sort
		$this->fields['StationName_kn'] = &$this->StationName_kn;

		// MobileNumber
		$this->MobileNumber = new DbField('master_station', 'master_station', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 15, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// Longitude
		$this->Longitude = new DbField('master_station', 'master_station', 'x_Longitude', 'Longitude', '`Longitude`', '`Longitude`', 131, 8, -1, FALSE, '`Longitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Longitude->Sortable = TRUE; // Allow sort
		$this->Longitude->DefaultErrorMessage = str_replace(["%1", "%2"], ["74", "78.5000"], $Language->phrase("IncorrectRange"));
		$this->fields['Longitude'] = &$this->Longitude;

		// Latitude
		$this->Latitude = new DbField('master_station', 'master_station', 'x_Latitude', 'Latitude', '`Latitude`', '`Latitude`', 131, 8, -1, FALSE, '`Latitude`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Latitude->Sortable = TRUE; // Allow sort
		$this->Latitude->DefaultErrorMessage = str_replace(["%1", "%2"], ["11.5", "18.5"], $Language->phrase("IncorrectRange"));
		$this->fields['Latitude'] = &$this->Latitude;

		// Altitude_MSL_in_mtrs
		$this->Altitude_MSL_in_mtrs = new DbField('master_station', 'master_station', 'x_Altitude_MSL_in_mtrs', 'Altitude_MSL_in_mtrs', '`Altitude_MSL_in_mtrs`', '`Altitude_MSL_in_mtrs`', 131, 10, -1, FALSE, '`Altitude_MSL_in_mtrs`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Altitude_MSL_in_mtrs->Sortable = TRUE; // Allow sort
		$this->Altitude_MSL_in_mtrs->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Altitude_MSL_in_mtrs'] = &$this->Altitude_MSL_in_mtrs;

		// station_type
		$this->station_type = new DbField('master_station', 'master_station', 'x_station_type', 'station_type', '`station_type`', '`station_type`', 3, 2, -1, FALSE, '`station_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->station_type->Sortable = TRUE; // Allow sort
		$this->station_type->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->station_type->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->station_type->Lookup = new Lookup('station_type', 'lkp_station_type', FALSE, 'station_type', ["station_type_name","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->station_type->Lookup = new Lookup('station_type', 'lkp_station_type', FALSE, 'station_type', ["station_type_name","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->station_type->Lookup = new Lookup('station_type', 'lkp_station_type', FALSE, 'station_type', ["station_type_name","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->station_type->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['station_type'] = &$this->station_type;

		// IsActive
		$this->IsActive = new DbField('master_station', 'master_station', 'x_IsActive', 'IsActive', '`IsActive`', '`IsActive`', 200, 1, -1, FALSE, '`IsActive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->IsActive->Nullable = FALSE; // NOT NULL field
		$this->IsActive->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->IsActive->Lookup = new Lookup('IsActive', 'master_station', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->IsActive->Lookup = new Lookup('IsActive', 'master_station', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->IsActive->Lookup = new Lookup('IsActive', 'master_station', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->IsActive->OptionCount = 2;
		$this->fields['IsActive'] = &$this->IsActive;

		// last_active_date
		$this->last_active_date = new DbField('master_station', 'master_station', 'x_last_active_date', 'last_active_date', '`last_active_date`', CastDateFieldForLike("`last_active_date`", 7, "DB"), 133, 10, 7, FALSE, '`last_active_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_active_date->Sortable = TRUE; // Allow sort
		$this->last_active_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['last_active_date'] = &$this->last_active_date;

		// DistrictId
		$this->DistrictId = new DbField('master_station', 'master_station', 'x_DistrictId', 'DistrictId', '`DistrictId`', '`DistrictId`', 3, 11, -1, FALSE, '`DistrictId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DistrictId->Sortable = TRUE; // Allow sort
		$this->DistrictId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DistrictId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->DistrictId->Lookup = new Lookup('DistrictId', 'master_district', FALSE, 'DistrictId', ["DistrictName","","",""], [], ["x_TalukID"], [], [], [], [], '', '');
				break;
			case "kn":
				$this->DistrictId->Lookup = new Lookup('DistrictId', 'master_district', FALSE, 'DistrictId', ["DistrictName","","",""], [], ["x_TalukID"], [], [], [], [], '', '');
				break;
			default:
				$this->DistrictId->Lookup = new Lookup('DistrictId', 'master_district', FALSE, 'DistrictId', ["DistrictName","","",""], [], ["x_TalukID"], [], [], [], [], '', '');
				break;
		}
		$this->DistrictId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DistrictId'] = &$this->DistrictId;

		// TalukID
		$this->TalukID = new DbField('master_station', 'master_station', 'x_TalukID', 'TalukID', '`TalukID`', '`TalukID`', 3, 11, -1, FALSE, '`TalukID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TalukID->Sortable = TRUE; // Allow sort
		$this->TalukID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TalukID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->TalukID->Lookup = new Lookup('TalukID', 'master_taluk', FALSE, 'TalukId', ["TalukName","","",""], ["x_DistrictId"], [], ["DistrictId"], ["x_DistrictId"], [], [], '', '');
				break;
			case "kn":
				$this->TalukID->Lookup = new Lookup('TalukID', 'master_taluk', FALSE, 'TalukId', ["TalukName","","",""], ["x_DistrictId"], [], ["DistrictId"], ["x_DistrictId"], [], [], '', '');
				break;
			default:
				$this->TalukID->Lookup = new Lookup('TalukID', 'master_taluk', FALSE, 'TalukId', ["TalukName","","",""], ["x_DistrictId"], [], ["DistrictId"], ["x_DistrictId"], [], [], '', '');
				break;
		}
		$this->TalukID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TalukID'] = &$this->TalukID;

		// BasinId
		$this->BasinId = new DbField('master_station', 'master_station', 'x_BasinId', 'BasinId', '`BasinId`', '`BasinId`', 3, 11, -1, FALSE, '`BasinId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->BasinId->Sortable = TRUE; // Allow sort
		$this->BasinId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->BasinId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->BasinId->Lookup = new Lookup('BasinId', 'master_basin', FALSE, 'BasinId', ["BasinName","","",""], [], ["x_SubBasinId"], [], [], [], [], '', '');
				break;
			case "kn":
				$this->BasinId->Lookup = new Lookup('BasinId', 'master_basin', FALSE, 'BasinId', ["BasinName","","",""], [], ["x_SubBasinId"], [], [], [], [], '', '');
				break;
			default:
				$this->BasinId->Lookup = new Lookup('BasinId', 'master_basin', FALSE, 'BasinId', ["BasinName","","",""], [], ["x_SubBasinId"], [], [], [], [], '', '');
				break;
		}
		$this->BasinId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BasinId'] = &$this->BasinId;

		// SubBasinId
		$this->SubBasinId = new DbField('master_station', 'master_station', 'x_SubBasinId', 'SubBasinId', '`SubBasinId`', '`SubBasinId`', 3, 11, -1, FALSE, '`SubBasinId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SubBasinId->Sortable = TRUE; // Allow sort
		$this->SubBasinId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SubBasinId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->SubBasinId->Lookup = new Lookup('SubBasinId', 'master_subbasin', FALSE, 'SubBasinId', ["SubBasinName","","",""], ["x_BasinId"], [], ["SubBasinId"], ["x_SubBasinId"], [], [], '', '');
				break;
			case "kn":
				$this->SubBasinId->Lookup = new Lookup('SubBasinId', 'master_subbasin', FALSE, 'SubBasinId', ["SubBasinName","","",""], ["x_BasinId"], [], ["SubBasinId"], ["x_SubBasinId"], [], [], '', '');
				break;
			default:
				$this->SubBasinId->Lookup = new Lookup('SubBasinId', 'master_subbasin', FALSE, 'SubBasinId', ["SubBasinName","","",""], ["x_BasinId"], [], ["SubBasinId"], ["x_SubBasinId"], [], [], '', '');
				break;
		}
		$this->SubBasinId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SubBasinId'] = &$this->SubBasinId;

		// CatchUpId
		$this->CatchUpId = new DbField('master_station', 'master_station', 'x_CatchUpId', 'CatchUpId', '`CatchUpId`', '`CatchUpId`', 3, 11, -1, FALSE, '`CatchUpId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CatchUpId->Sortable = TRUE; // Allow sort
		$this->CatchUpId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CatchUpId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->CatchUpId->Lookup = new Lookup('CatchUpId', 'master_damcatchup', FALSE, 'CatchUpId', ["CatchUpName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->CatchUpId->Lookup = new Lookup('CatchUpId', 'master_damcatchup', FALSE, 'CatchUpId', ["CatchUpName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->CatchUpId->Lookup = new Lookup('CatchUpId', 'master_damcatchup', FALSE, 'CatchUpId', ["CatchUpName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->CatchUpId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CatchUpId'] = &$this->CatchUpId;

		// PIC
		$this->PIC = new DbField('master_station', 'master_station', 'x_PIC', 'PIC', '`PIC`', '`PIC`', 200, 12, -1, FALSE, '`PIC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PIC->Sortable = TRUE; // Allow sort
		$this->PIC->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PIC->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->PIC->Lookup = new Lookup('PIC', 'master_dams', FALSE, 'PIC', ["Name_of_Dam","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->PIC->Lookup = new Lookup('PIC', 'master_dams', FALSE, 'PIC', ["Name_of_Dam","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->PIC->Lookup = new Lookup('PIC', 'master_dams', FALSE, 'PIC', ["Name_of_Dam","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['PIC'] = &$this->PIC;

		// RiverId
		$this->RiverId = new DbField('master_station', 'master_station', 'x_RiverId', 'RiverId', '`RiverId`', '`RiverId`', 3, 11, -1, FALSE, '`RiverId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RiverId->Sortable = TRUE; // Allow sort
		$this->RiverId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RiverId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->RiverId->Lookup = new Lookup('RiverId', 'master_river', FALSE, 'RiverId', ["RiverName","","",""], [], [], [], [], [], [], '', '');
				break;
			case "kn":
				$this->RiverId->Lookup = new Lookup('RiverId', 'master_river', FALSE, 'RiverId', ["RiverName","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->RiverId->Lookup = new Lookup('RiverId', 'master_river', FALSE, 'RiverId', ["RiverName","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->RiverId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RiverId'] = &$this->RiverId;

		// Address
		$this->Address = new DbField('master_station', 'master_station', 'x_Address', 'Address', '`Address`', '`Address`', 200, 50, -1, FALSE, '`Address`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Address->Sortable = TRUE; // Allow sort
		$this->fields['Address'] = &$this->Address;

		// max_rainfall_date
		$this->max_rainfall_date = new DbField('master_station', 'master_station', 'x_max_rainfall_date', 'max_rainfall_date', '`max_rainfall_date`', CastDateFieldForLike("`max_rainfall_date`", 7, "DB"), 133, 10, 7, FALSE, '`max_rainfall_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->max_rainfall_date->Sortable = TRUE; // Allow sort
		$this->max_rainfall_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['max_rainfall_date'] = &$this->max_rainfall_date;

		// max_rainfall
		$this->max_rainfall = new DbField('master_station', 'master_station', 'x_max_rainfall', 'max_rainfall', '`max_rainfall`', '`max_rainfall`', 4, 12, -1, FALSE, '`max_rainfall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->max_rainfall->Sortable = TRUE; // Allow sort
		$this->max_rainfall->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['max_rainfall'] = &$this->max_rainfall;

		// last_reading_date
		$this->last_reading_date = new DbField('master_station', 'master_station', 'x_last_reading_date', 'last_reading_date', '`last_reading_date`', CastDateFieldForLike("`last_reading_date`", 7, "DB"), 133, 10, 7, FALSE, '`last_reading_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_reading_date->Sortable = TRUE; // Allow sort
		$this->last_reading_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['last_reading_date'] = &$this->last_reading_date;

		// first_reading_date
		$this->first_reading_date = new DbField('master_station', 'master_station', 'x_first_reading_date', 'first_reading_date', '`first_reading_date`', CastDateFieldForLike("`first_reading_date`", 7, "DB"), 133, 10, 7, FALSE, '`first_reading_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_reading_date->Sortable = TRUE; // Allow sort
		$this->first_reading_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['first_reading_date'] = &$this->first_reading_date;

		// no_of_manual_entry
		$this->no_of_manual_entry = new DbField('master_station', 'master_station', 'x_no_of_manual_entry', 'no_of_manual_entry', '`no_of_manual_entry`', '`no_of_manual_entry`', 3, 11, -1, FALSE, '`no_of_manual_entry`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->no_of_manual_entry->Sortable = TRUE; // Allow sort
		$this->no_of_manual_entry->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['no_of_manual_entry'] = &$this->no_of_manual_entry;

		// no_of_sms
		$this->no_of_sms = new DbField('master_station', 'master_station', 'x_no_of_sms', 'no_of_sms', '`no_of_sms`', '`no_of_sms`', 3, 11, -1, FALSE, '`no_of_sms`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->no_of_sms->Sortable = TRUE; // Allow sort
		$this->no_of_sms->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['no_of_sms'] = &$this->no_of_sms;

		// NewStationCode
		$this->NewStationCode = new DbField('master_station', 'master_station', 'x_NewStationCode', 'NewStationCode', '`NewStationCode`', '`NewStationCode`', 200, 50, -1, FALSE, '`NewStationCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NewStationCode->Sortable = TRUE; // Allow sort
		$this->fields['NewStationCode'] = &$this->NewStationCode;

		// DivisionId
		$this->DivisionId = new DbField('master_station', 'master_station', 'x_DivisionId', 'DivisionId', '`DivisionId`', '`DivisionId`', 3, 11, -1, FALSE, '`DivisionId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DivisionId->Sortable = TRUE; // Allow sort
		$this->DivisionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DivisionId'] = &$this->DivisionId;

		// StationSetup
		$this->StationSetup = new DbField('master_station', 'master_station', 'x_StationSetup', 'StationSetup', '`StationSetup`', '`StationSetup`', 200, 50, -1, FALSE, '`StationSetup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationSetup->Sortable = TRUE; // Allow sort
		$this->fields['StationSetup'] = &$this->StationSetup;

		// StationName_hi
		$this->StationName_hi = new DbField('master_station', 'master_station', 'x_StationName_hi', 'StationName_hi', '`StationName_hi`', '`StationName_hi`', 200, 30, -1, FALSE, '`StationName_hi`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StationName_hi->Sortable = TRUE; // Allow sort
		$this->fields['StationName_hi'] = &$this->StationName_hi;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`master_station`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`StationName` ASC";
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
		$this->StationId->DbValue = $row['StationId'];
		$this->SubDivisionId->DbValue = $row['SubDivisionId'];
		$this->StationName->DbValue = $row['StationName'];
		$this->StationName_kn->DbValue = $row['StationName_kn'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->Longitude->DbValue = $row['Longitude'];
		$this->Latitude->DbValue = $row['Latitude'];
		$this->Altitude_MSL_in_mtrs->DbValue = $row['Altitude_MSL_in_mtrs'];
		$this->station_type->DbValue = $row['station_type'];
		$this->IsActive->DbValue = $row['IsActive'];
		$this->last_active_date->DbValue = $row['last_active_date'];
		$this->DistrictId->DbValue = $row['DistrictId'];
		$this->TalukID->DbValue = $row['TalukID'];
		$this->BasinId->DbValue = $row['BasinId'];
		$this->SubBasinId->DbValue = $row['SubBasinId'];
		$this->CatchUpId->DbValue = $row['CatchUpId'];
		$this->PIC->DbValue = $row['PIC'];
		$this->RiverId->DbValue = $row['RiverId'];
		$this->Address->DbValue = $row['Address'];
		$this->max_rainfall_date->DbValue = $row['max_rainfall_date'];
		$this->max_rainfall->DbValue = $row['max_rainfall'];
		$this->last_reading_date->DbValue = $row['last_reading_date'];
		$this->first_reading_date->DbValue = $row['first_reading_date'];
		$this->no_of_manual_entry->DbValue = $row['no_of_manual_entry'];
		$this->no_of_sms->DbValue = $row['no_of_sms'];
		$this->NewStationCode->DbValue = $row['NewStationCode'];
		$this->DivisionId->DbValue = $row['DivisionId'];
		$this->StationSetup->DbValue = $row['StationSetup'];
		$this->StationName_hi->DbValue = $row['StationName_hi'];
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
			return "master_stationlist.php";
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
		if ($pageName == "master_stationview.php")
			return $Language->phrase("View");
		elseif ($pageName == "master_stationedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "master_stationadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "master_stationlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("master_stationview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("master_stationview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "master_stationadd.php?" . $this->getUrlParm($parm);
		else
			$url = "master_stationadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("master_stationedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("master_stationadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("master_stationdelete.php", $this->getUrlParm());
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
		$this->StationId->setDbValue($rs->fields('StationId'));
		$this->SubDivisionId->setDbValue($rs->fields('SubDivisionId'));
		$this->StationName->setDbValue($rs->fields('StationName'));
		$this->StationName_kn->setDbValue($rs->fields('StationName_kn'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->Longitude->setDbValue($rs->fields('Longitude'));
		$this->Latitude->setDbValue($rs->fields('Latitude'));
		$this->Altitude_MSL_in_mtrs->setDbValue($rs->fields('Altitude_MSL_in_mtrs'));
		$this->station_type->setDbValue($rs->fields('station_type'));
		$this->IsActive->setDbValue($rs->fields('IsActive'));
		$this->last_active_date->setDbValue($rs->fields('last_active_date'));
		$this->DistrictId->setDbValue($rs->fields('DistrictId'));
		$this->TalukID->setDbValue($rs->fields('TalukID'));
		$this->BasinId->setDbValue($rs->fields('BasinId'));
		$this->SubBasinId->setDbValue($rs->fields('SubBasinId'));
		$this->CatchUpId->setDbValue($rs->fields('CatchUpId'));
		$this->PIC->setDbValue($rs->fields('PIC'));
		$this->RiverId->setDbValue($rs->fields('RiverId'));
		$this->Address->setDbValue($rs->fields('Address'));
		$this->max_rainfall_date->setDbValue($rs->fields('max_rainfall_date'));
		$this->max_rainfall->setDbValue($rs->fields('max_rainfall'));
		$this->last_reading_date->setDbValue($rs->fields('last_reading_date'));
		$this->first_reading_date->setDbValue($rs->fields('first_reading_date'));
		$this->no_of_manual_entry->setDbValue($rs->fields('no_of_manual_entry'));
		$this->no_of_sms->setDbValue($rs->fields('no_of_sms'));
		$this->NewStationCode->setDbValue($rs->fields('NewStationCode'));
		$this->DivisionId->setDbValue($rs->fields('DivisionId'));
		$this->StationSetup->setDbValue($rs->fields('StationSetup'));
		$this->StationName_hi->setDbValue($rs->fields('StationName_hi'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// StationId
		// SubDivisionId
		// StationName
		// StationName_kn
		// MobileNumber
		// Longitude
		// Latitude
		// Altitude_MSL_in_mtrs
		// station_type
		// IsActive
		// last_active_date
		// DistrictId
		// TalukID
		// BasinId
		// SubBasinId
		// CatchUpId
		// PIC
		// RiverId
		// Address
		// max_rainfall_date
		// max_rainfall
		// last_reading_date
		// first_reading_date
		// no_of_manual_entry
		// no_of_sms
		// NewStationCode
		// DivisionId
		// StationSetup
		// StationName_hi

		$this->StationName_hi->CellCssStyle = "white-space: nowrap;";

		// StationId
		$this->StationId->ViewValue = $this->StationId->CurrentValue;
		$this->StationId->ViewValue = FormatNumber($this->StationId->ViewValue, 0, -2, -2, -2);
		$this->StationId->ViewCustomAttributes = "";

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

		// StationName
		$this->StationName->ViewValue = $this->StationName->CurrentValue;
		$this->StationName->ViewCustomAttributes = "";

		// StationName_kn
		$this->StationName_kn->ViewValue = $this->StationName_kn->CurrentValue;
		$this->StationName_kn->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// Longitude
		$this->Longitude->ViewValue = $this->Longitude->CurrentValue;
		$this->Longitude->ViewValue = FormatNumber($this->Longitude->ViewValue, 4, -2, -2, -2);
		$this->Longitude->ViewCustomAttributes = "";

		// Latitude
		$this->Latitude->ViewValue = $this->Latitude->CurrentValue;
		$this->Latitude->ViewValue = FormatNumber($this->Latitude->ViewValue, 4, -1, -2, -2);
		$this->Latitude->ViewCustomAttributes = "";

		// Altitude_MSL_in_mtrs
		$this->Altitude_MSL_in_mtrs->ViewValue = $this->Altitude_MSL_in_mtrs->CurrentValue;
		$this->Altitude_MSL_in_mtrs->ViewValue = FormatNumber($this->Altitude_MSL_in_mtrs->ViewValue, 1, -2, -2, -2);
		$this->Altitude_MSL_in_mtrs->ViewCustomAttributes = "";

		// station_type
		$curVal = strval($this->station_type->CurrentValue);
		if ($curVal != "") {
			$this->station_type->ViewValue = $this->station_type->lookupCacheOption($curVal);
			if ($this->station_type->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`station_type`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->station_type->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->station_type->ViewValue = $this->station_type->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->station_type->ViewValue = $this->station_type->CurrentValue;
				}
			}
		} else {
			$this->station_type->ViewValue = NULL;
		}
		$this->station_type->ViewCustomAttributes = "";

		// IsActive
		if (strval($this->IsActive->CurrentValue) != "") {
			$this->IsActive->ViewValue = $this->IsActive->optionCaption($this->IsActive->CurrentValue);
		} else {
			$this->IsActive->ViewValue = NULL;
		}
		$this->IsActive->ViewCustomAttributes = "";

		// last_active_date
		$this->last_active_date->ViewValue = $this->last_active_date->CurrentValue;
		$this->last_active_date->ViewValue = FormatDateTime($this->last_active_date->ViewValue, 7);
		$this->last_active_date->ViewCustomAttributes = "";

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

		// CatchUpId
		$curVal = strval($this->CatchUpId->CurrentValue);
		if ($curVal != "") {
			$this->CatchUpId->ViewValue = $this->CatchUpId->lookupCacheOption($curVal);
			if ($this->CatchUpId->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`CatchUpId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->CatchUpId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->CatchUpId->ViewValue = $this->CatchUpId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->CatchUpId->ViewValue = $this->CatchUpId->CurrentValue;
				}
			}
		} else {
			$this->CatchUpId->ViewValue = NULL;
		}
		$this->CatchUpId->ViewCustomAttributes = "";

		// PIC
		$curVal = strval($this->PIC->CurrentValue);
		if ($curVal != "") {
			$this->PIC->ViewValue = $this->PIC->lookupCacheOption($curVal);
			if ($this->PIC->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`PIC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->PIC->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->PIC->ViewValue = $this->PIC->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PIC->ViewValue = $this->PIC->CurrentValue;
				}
			}
		} else {
			$this->PIC->ViewValue = NULL;
		}
		$this->PIC->ViewCustomAttributes = "";

		// RiverId
		$curVal = strval($this->RiverId->CurrentValue);
		if ($curVal != "") {
			$this->RiverId->ViewValue = $this->RiverId->lookupCacheOption($curVal);
			if ($this->RiverId->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`RiverId`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->RiverId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->RiverId->ViewValue = $this->RiverId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->RiverId->ViewValue = $this->RiverId->CurrentValue;
				}
			}
		} else {
			$this->RiverId->ViewValue = NULL;
		}
		$this->RiverId->ViewCustomAttributes = "";

		// Address
		$this->Address->ViewValue = $this->Address->CurrentValue;
		$this->Address->ViewCustomAttributes = "";

		// max_rainfall_date
		$this->max_rainfall_date->ViewValue = $this->max_rainfall_date->CurrentValue;
		$this->max_rainfall_date->ViewValue = FormatDateTime($this->max_rainfall_date->ViewValue, 7);
		$this->max_rainfall_date->ViewCustomAttributes = "";

		// max_rainfall
		$this->max_rainfall->ViewValue = $this->max_rainfall->CurrentValue;
		$this->max_rainfall->ViewValue = FormatNumber($this->max_rainfall->ViewValue, 2, -2, -2, -2);
		$this->max_rainfall->ViewCustomAttributes = "";

		// last_reading_date
		$this->last_reading_date->ViewValue = $this->last_reading_date->CurrentValue;
		$this->last_reading_date->ViewValue = FormatDateTime($this->last_reading_date->ViewValue, 7);
		$this->last_reading_date->ViewCustomAttributes = "";

		// first_reading_date
		$this->first_reading_date->ViewValue = $this->first_reading_date->CurrentValue;
		$this->first_reading_date->ViewValue = FormatDateTime($this->first_reading_date->ViewValue, 7);
		$this->first_reading_date->ViewCustomAttributes = "";

		// no_of_manual_entry
		$this->no_of_manual_entry->ViewValue = $this->no_of_manual_entry->CurrentValue;
		$this->no_of_manual_entry->ViewValue = FormatNumber($this->no_of_manual_entry->ViewValue, 0, -2, -2, -2);
		$this->no_of_manual_entry->ViewCustomAttributes = "";

		// no_of_sms
		$this->no_of_sms->ViewValue = $this->no_of_sms->CurrentValue;
		$this->no_of_sms->ViewValue = FormatNumber($this->no_of_sms->ViewValue, 0, -2, -2, -2);
		$this->no_of_sms->ViewCustomAttributes = "";

		// NewStationCode
		$this->NewStationCode->ViewValue = $this->NewStationCode->CurrentValue;
		$this->NewStationCode->ViewCustomAttributes = "";

		// DivisionId
		$this->DivisionId->ViewValue = $this->DivisionId->CurrentValue;
		$this->DivisionId->ViewValue = FormatNumber($this->DivisionId->ViewValue, 0, -2, -2, -2);
		$this->DivisionId->ViewCustomAttributes = "";

		// StationSetup
		$this->StationSetup->ViewValue = $this->StationSetup->CurrentValue;
		$this->StationSetup->ViewCustomAttributes = "";

		// StationName_hi
		$this->StationName_hi->ViewValue = $this->StationName_hi->CurrentValue;
		$this->StationName_hi->ViewCustomAttributes = "";

		// StationId
		$this->StationId->LinkCustomAttributes = "";
		$this->StationId->HrefValue = "";
		$this->StationId->TooltipValue = "";

		// SubDivisionId
		$this->SubDivisionId->LinkCustomAttributes = "";
		$this->SubDivisionId->HrefValue = "";
		$this->SubDivisionId->TooltipValue = "";

		// StationName
		$this->StationName->LinkCustomAttributes = "";
		$this->StationName->HrefValue = "";
		$this->StationName->TooltipValue = "";

		// StationName_kn
		$this->StationName_kn->LinkCustomAttributes = "";
		$this->StationName_kn->HrefValue = "";
		$this->StationName_kn->TooltipValue = "";

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

		// Altitude_MSL_in_mtrs
		$this->Altitude_MSL_in_mtrs->LinkCustomAttributes = "";
		$this->Altitude_MSL_in_mtrs->HrefValue = "";
		$this->Altitude_MSL_in_mtrs->TooltipValue = "";

		// station_type
		$this->station_type->LinkCustomAttributes = "";
		$this->station_type->HrefValue = "";
		$this->station_type->TooltipValue = "";

		// IsActive
		$this->IsActive->LinkCustomAttributes = "";
		$this->IsActive->HrefValue = "";
		$this->IsActive->TooltipValue = "";

		// last_active_date
		$this->last_active_date->LinkCustomAttributes = "";
		$this->last_active_date->HrefValue = "";
		$this->last_active_date->TooltipValue = "";

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

		// CatchUpId
		$this->CatchUpId->LinkCustomAttributes = "";
		$this->CatchUpId->HrefValue = "";
		$this->CatchUpId->TooltipValue = "";

		// PIC
		$this->PIC->LinkCustomAttributes = "";
		$this->PIC->HrefValue = "";
		$this->PIC->TooltipValue = "";

		// RiverId
		$this->RiverId->LinkCustomAttributes = "";
		$this->RiverId->HrefValue = "";
		$this->RiverId->TooltipValue = "";

		// Address
		$this->Address->LinkCustomAttributes = "";
		$this->Address->HrefValue = "";
		$this->Address->TooltipValue = "";

		// max_rainfall_date
		$this->max_rainfall_date->LinkCustomAttributes = "";
		$this->max_rainfall_date->HrefValue = "";
		$this->max_rainfall_date->TooltipValue = "";

		// max_rainfall
		$this->max_rainfall->LinkCustomAttributes = "";
		$this->max_rainfall->HrefValue = "";
		$this->max_rainfall->TooltipValue = "";

		// last_reading_date
		$this->last_reading_date->LinkCustomAttributes = "";
		$this->last_reading_date->HrefValue = "";
		$this->last_reading_date->TooltipValue = "";

		// first_reading_date
		$this->first_reading_date->LinkCustomAttributes = "";
		$this->first_reading_date->HrefValue = "";
		$this->first_reading_date->TooltipValue = "";

		// no_of_manual_entry
		$this->no_of_manual_entry->LinkCustomAttributes = "";
		$this->no_of_manual_entry->HrefValue = "";
		$this->no_of_manual_entry->TooltipValue = "";

		// no_of_sms
		$this->no_of_sms->LinkCustomAttributes = "";
		$this->no_of_sms->HrefValue = "";
		$this->no_of_sms->TooltipValue = "";

		// NewStationCode
		$this->NewStationCode->LinkCustomAttributes = "";
		$this->NewStationCode->HrefValue = "";
		$this->NewStationCode->TooltipValue = "";

		// DivisionId
		$this->DivisionId->LinkCustomAttributes = "";
		$this->DivisionId->HrefValue = "";
		$this->DivisionId->TooltipValue = "";

		// StationSetup
		$this->StationSetup->LinkCustomAttributes = "";
		$this->StationSetup->HrefValue = "";
		$this->StationSetup->TooltipValue = "";

		// StationName_hi
		$this->StationName_hi->LinkCustomAttributes = "";
		$this->StationName_hi->HrefValue = "";
		$this->StationName_hi->TooltipValue = "";

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

		// StationId
		$this->StationId->EditAttrs["class"] = "form-control";
		$this->StationId->EditCustomAttributes = "";
		$this->StationId->EditValue = $this->StationId->CurrentValue;

		// SubDivisionId
		$this->SubDivisionId->EditAttrs["class"] = "form-control";
		$this->SubDivisionId->EditCustomAttributes = "";

		// StationName
		$this->StationName->EditAttrs["class"] = "form-control";
		$this->StationName->EditCustomAttributes = "";
		if (!$this->StationName->Raw)
			$this->StationName->CurrentValue = HtmlDecode($this->StationName->CurrentValue);
		$this->StationName->EditValue = $this->StationName->CurrentValue;

		// StationName_kn
		$this->StationName_kn->EditAttrs["class"] = "form-control";
		$this->StationName_kn->EditCustomAttributes = "";
		if (!$this->StationName_kn->Raw)
			$this->StationName_kn->CurrentValue = HtmlDecode($this->StationName_kn->CurrentValue);
		$this->StationName_kn->EditValue = $this->StationName_kn->CurrentValue;

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
			$this->Latitude->EditValue = FormatNumber($this->Latitude->EditValue, -2, -1, -2, -2);
		

		// Altitude_MSL_in_mtrs
		$this->Altitude_MSL_in_mtrs->EditAttrs["class"] = "form-control";
		$this->Altitude_MSL_in_mtrs->EditCustomAttributes = "";
		$this->Altitude_MSL_in_mtrs->EditValue = $this->Altitude_MSL_in_mtrs->CurrentValue;
		if (strval($this->Altitude_MSL_in_mtrs->EditValue) != "" && is_numeric($this->Altitude_MSL_in_mtrs->EditValue))
			$this->Altitude_MSL_in_mtrs->EditValue = FormatNumber($this->Altitude_MSL_in_mtrs->EditValue, -2, -2, -2, -2);
		

		// station_type
		$this->station_type->EditAttrs["class"] = "form-control";
		$this->station_type->EditCustomAttributes = "";

		// IsActive
		$this->IsActive->EditCustomAttributes = "";
		$this->IsActive->EditValue = $this->IsActive->options(FALSE);

		// last_active_date
		$this->last_active_date->EditAttrs["class"] = "form-control";
		$this->last_active_date->EditCustomAttributes = "";
		$this->last_active_date->EditValue = FormatDateTime($this->last_active_date->CurrentValue, 7);

		// DistrictId
		$this->DistrictId->EditAttrs["class"] = "form-control";
		$this->DistrictId->EditCustomAttributes = "";

		// TalukID
		$this->TalukID->EditAttrs["class"] = "form-control";
		$this->TalukID->EditCustomAttributes = "";

		// BasinId
		$this->BasinId->EditAttrs["class"] = "form-control";
		$this->BasinId->EditCustomAttributes = "";

		// SubBasinId
		$this->SubBasinId->EditAttrs["class"] = "form-control";
		$this->SubBasinId->EditCustomAttributes = "";

		// CatchUpId
		$this->CatchUpId->EditAttrs["class"] = "form-control";
		$this->CatchUpId->EditCustomAttributes = "";

		// PIC
		$this->PIC->EditAttrs["class"] = "form-control";
		$this->PIC->EditCustomAttributes = "";

		// RiverId
		$this->RiverId->EditAttrs["class"] = "form-control";
		$this->RiverId->EditCustomAttributes = "";

		// Address
		$this->Address->EditAttrs["class"] = "form-control";
		$this->Address->EditCustomAttributes = "";
		$this->Address->EditValue = $this->Address->CurrentValue;
		$this->Address->ViewCustomAttributes = "";

		// max_rainfall_date
		$this->max_rainfall_date->EditAttrs["class"] = "form-control";
		$this->max_rainfall_date->EditCustomAttributes = "";
		$this->max_rainfall_date->EditValue = $this->max_rainfall_date->CurrentValue;
		$this->max_rainfall_date->EditValue = FormatDateTime($this->max_rainfall_date->EditValue, 7);
		$this->max_rainfall_date->ViewCustomAttributes = "";

		// max_rainfall
		$this->max_rainfall->EditAttrs["class"] = "form-control";
		$this->max_rainfall->EditCustomAttributes = "";
		$this->max_rainfall->EditValue = $this->max_rainfall->CurrentValue;
		$this->max_rainfall->EditValue = FormatNumber($this->max_rainfall->EditValue, 2, -2, -2, -2);
		$this->max_rainfall->ViewCustomAttributes = "";

		// last_reading_date
		$this->last_reading_date->EditAttrs["class"] = "form-control";
		$this->last_reading_date->EditCustomAttributes = "";
		$this->last_reading_date->EditValue = $this->last_reading_date->CurrentValue;
		$this->last_reading_date->EditValue = FormatDateTime($this->last_reading_date->EditValue, 7);
		$this->last_reading_date->ViewCustomAttributes = "";

		// first_reading_date
		$this->first_reading_date->EditAttrs["class"] = "form-control";
		$this->first_reading_date->EditCustomAttributes = "";
		$this->first_reading_date->EditValue = $this->first_reading_date->CurrentValue;
		$this->first_reading_date->EditValue = FormatDateTime($this->first_reading_date->EditValue, 7);
		$this->first_reading_date->ViewCustomAttributes = "";

		// no_of_manual_entry
		$this->no_of_manual_entry->EditAttrs["class"] = "form-control";
		$this->no_of_manual_entry->EditCustomAttributes = "";
		$this->no_of_manual_entry->EditValue = $this->no_of_manual_entry->CurrentValue;
		$this->no_of_manual_entry->EditValue = FormatNumber($this->no_of_manual_entry->EditValue, 0, -2, -2, -2);
		$this->no_of_manual_entry->ViewCustomAttributes = "";

		// no_of_sms
		$this->no_of_sms->EditAttrs["class"] = "form-control";
		$this->no_of_sms->EditCustomAttributes = "";
		$this->no_of_sms->EditValue = $this->no_of_sms->CurrentValue;
		$this->no_of_sms->EditValue = FormatNumber($this->no_of_sms->EditValue, 0, -2, -2, -2);
		$this->no_of_sms->ViewCustomAttributes = "";

		// NewStationCode
		$this->NewStationCode->EditAttrs["class"] = "form-control";
		$this->NewStationCode->EditCustomAttributes = "";
		if (!$this->NewStationCode->Raw)
			$this->NewStationCode->CurrentValue = HtmlDecode($this->NewStationCode->CurrentValue);
		$this->NewStationCode->EditValue = $this->NewStationCode->CurrentValue;

		// DivisionId
		$this->DivisionId->EditAttrs["class"] = "form-control";
		$this->DivisionId->EditCustomAttributes = "";
		$this->DivisionId->EditValue = $this->DivisionId->CurrentValue;

		// StationSetup
		$this->StationSetup->EditAttrs["class"] = "form-control";
		$this->StationSetup->EditCustomAttributes = "";
		if (!$this->StationSetup->Raw)
			$this->StationSetup->CurrentValue = HtmlDecode($this->StationSetup->CurrentValue);
		$this->StationSetup->EditValue = $this->StationSetup->CurrentValue;

		// StationName_hi
		$this->StationName_hi->EditAttrs["class"] = "form-control";
		$this->StationName_hi->EditCustomAttributes = "";
		if (!$this->StationName_hi->Raw)
			$this->StationName_hi->CurrentValue = HtmlDecode($this->StationName_hi->CurrentValue);
		$this->StationName_hi->EditValue = $this->StationName_hi->CurrentValue;

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
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->StationName_kn);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->Longitude);
					$doc->exportCaption($this->Latitude);
					$doc->exportCaption($this->Altitude_MSL_in_mtrs);
					$doc->exportCaption($this->station_type);
					$doc->exportCaption($this->IsActive);
					$doc->exportCaption($this->last_active_date);
					$doc->exportCaption($this->DistrictId);
					$doc->exportCaption($this->TalukID);
					$doc->exportCaption($this->BasinId);
					$doc->exportCaption($this->SubBasinId);
					$doc->exportCaption($this->CatchUpId);
					$doc->exportCaption($this->PIC);
					$doc->exportCaption($this->RiverId);
					$doc->exportCaption($this->Address);
					$doc->exportCaption($this->max_rainfall_date);
					$doc->exportCaption($this->max_rainfall);
					$doc->exportCaption($this->last_reading_date);
					$doc->exportCaption($this->first_reading_date);
					$doc->exportCaption($this->no_of_manual_entry);
					$doc->exportCaption($this->no_of_sms);
					$doc->exportCaption($this->NewStationCode);
					$doc->exportCaption($this->DivisionId);
					$doc->exportCaption($this->StationSetup);
				} else {
					$doc->exportCaption($this->StationId);
					$doc->exportCaption($this->SubDivisionId);
					$doc->exportCaption($this->StationName);
					$doc->exportCaption($this->StationName_kn);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->Longitude);
					$doc->exportCaption($this->Latitude);
					$doc->exportCaption($this->Altitude_MSL_in_mtrs);
					$doc->exportCaption($this->station_type);
					$doc->exportCaption($this->IsActive);
					$doc->exportCaption($this->last_active_date);
					$doc->exportCaption($this->DistrictId);
					$doc->exportCaption($this->TalukID);
					$doc->exportCaption($this->BasinId);
					$doc->exportCaption($this->SubBasinId);
					$doc->exportCaption($this->CatchUpId);
					$doc->exportCaption($this->PIC);
					$doc->exportCaption($this->RiverId);
					$doc->exportCaption($this->max_rainfall_date);
					$doc->exportCaption($this->max_rainfall);
					$doc->exportCaption($this->last_reading_date);
					$doc->exportCaption($this->first_reading_date);
					$doc->exportCaption($this->no_of_manual_entry);
					$doc->exportCaption($this->no_of_sms);
					$doc->exportCaption($this->NewStationCode);
					$doc->exportCaption($this->DivisionId);
					$doc->exportCaption($this->StationSetup);
					$doc->exportCaption($this->StationName_hi);
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
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->StationName);
						$doc->exportField($this->StationName_kn);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->Longitude);
						$doc->exportField($this->Latitude);
						$doc->exportField($this->Altitude_MSL_in_mtrs);
						$doc->exportField($this->station_type);
						$doc->exportField($this->IsActive);
						$doc->exportField($this->last_active_date);
						$doc->exportField($this->DistrictId);
						$doc->exportField($this->TalukID);
						$doc->exportField($this->BasinId);
						$doc->exportField($this->SubBasinId);
						$doc->exportField($this->CatchUpId);
						$doc->exportField($this->PIC);
						$doc->exportField($this->RiverId);
						$doc->exportField($this->Address);
						$doc->exportField($this->max_rainfall_date);
						$doc->exportField($this->max_rainfall);
						$doc->exportField($this->last_reading_date);
						$doc->exportField($this->first_reading_date);
						$doc->exportField($this->no_of_manual_entry);
						$doc->exportField($this->no_of_sms);
						$doc->exportField($this->NewStationCode);
						$doc->exportField($this->DivisionId);
						$doc->exportField($this->StationSetup);
					} else {
						$doc->exportField($this->StationId);
						$doc->exportField($this->SubDivisionId);
						$doc->exportField($this->StationName);
						$doc->exportField($this->StationName_kn);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->Longitude);
						$doc->exportField($this->Latitude);
						$doc->exportField($this->Altitude_MSL_in_mtrs);
						$doc->exportField($this->station_type);
						$doc->exportField($this->IsActive);
						$doc->exportField($this->last_active_date);
						$doc->exportField($this->DistrictId);
						$doc->exportField($this->TalukID);
						$doc->exportField($this->BasinId);
						$doc->exportField($this->SubBasinId);
						$doc->exportField($this->CatchUpId);
						$doc->exportField($this->PIC);
						$doc->exportField($this->RiverId);
						$doc->exportField($this->max_rainfall_date);
						$doc->exportField($this->max_rainfall);
						$doc->exportField($this->last_reading_date);
						$doc->exportField($this->first_reading_date);
						$doc->exportField($this->no_of_manual_entry);
						$doc->exportField($this->no_of_sms);
						$doc->exportField($this->NewStationCode);
						$doc->exportField($this->DivisionId);
						$doc->exportField($this->StationSetup);
						$doc->exportField($this->StationName_hi);
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