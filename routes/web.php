<?php
Route::get('/', function () { return redirect('/admin/home'); });

<<<<<<< HEAD
Route::get('/', function () { return redirect('/admin/home'); });

Route::get('/welcome', function () { return view('/welcome'); });
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('patients', 'Admin\BiodataController');
    Route::post('patients_mass_destroy', ['uses' => 'Admin\BiodataController@massDestroy', 'as' => 'patients.mass_destroy']);
    Route::get('waiting_patients', ['uses' => 'Admin\BiodataController@allWaitingPatients', 'as' => 'patients.waiting_patients']);
    Route::get('/addhmo/{id}', 'Admin\BiodataController@addhmo');
<<<<<<< HEAD
    Route::put('/addhmo/{id}', 'Admin\BiodataController@updatehmo');
    Route::post('/addhmopatient', 'Admin\BiodataController@storepatienthmo');
    Route::post('/uploadPic', 'Admin\BiodataController@storePic');
    Route::get('/addOutsidePatientHistory/{id}', 'Admin\BiodataController@addOutsidePatientHistory');
    Route::get('/getfamilies', 'Admin\BiodataController@getFamilies');
    Route::post('/addFamilyCard', 'Admin\BiodataController@addFamilyCards');
    Route::post('/addMemberToFamily', 'Admin\BiodataController@addMembers');
    Route::get('/unregisteredPatient/{id}', 'Admin\BiodataController@unregisteredPatients');
    Route::post('/unregisteredPatient', 'Admin\BiodataController@fileUpload');


=======
    Route::post('/addhmopatient', 'Admin\BiodataController@storepatienthmo');
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    // clinical History
    Route::get('/clinics/view/{id}', 'Admin\ClinichistoryController@viewHistories');
    //Route::post('/clinics/create', 'Admin\ClinichistoryController@createHistory');
    Route::put('changestatustask', ['as' => 'updateStatus', 'uses' =>'Admin\ClinichistoryController@updateStatus']);
    Route::get('/clinics/nurse/{id}', 'Admin\ClinichistoryController@viewPatientsForNurse');
<<<<<<< HEAD
    Route::get('viewPastHistory', ['as' => 'viewPastHistory', 'uses' =>'Admin\ClinichistoryController@viewPastHistory']);
    Route::post('/clinics/checkPastHistories', 'Admin\ClinichistoryController@checkPastHistories');

    //Route::get('/clinics/reception/{id}', 'Admin\ClinichistoryController@viewPatientsForReception');
    Route::post('/clinics/vitalsign', 'Admin\ClinichistoryController@storeVitalSign');
    Route::post('/clinics/inputoutput', 'Admin\ClinichistoryController@storeInputOutput');
=======
    

    Route::get('/clinics/reception/{id}', 'Admin\ClinichistoryController@viewPatientsForReception');
    Route::post('/clinics/vitalsign', 'Admin\ClinichistoryController@storeVitalSign');
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    Route::post('/clinics/report', 'Admin\ClinichistoryController@storeReport');
    Route::post('createDrugChart', ['as' => 'createDrugChart', 'uses' =>'Admin\ClinichistoryController@createDrugChart']);
    Route::patch('updatedrugchart', ['as' => 'updatedrugchart', 'uses' =>'Admin\ClinichistoryController@updateDrugChart']);
    
    Route::get('/clinics/doctor/{id}', 'Admin\ClinichistoryController@viewPatientsForDoctors');
    Route::put('/clinics/doctor/{id}', 'Admin\ClinichistoryController@updateHistory');
    Route::post('/clinics/doctor/procedure', 'Admin\ClinichistoryController@storeProcedure');
    Route::post('/clinics/doctor/examination', 'Admin\ClinichistoryController@storeExamination');
    Route::post('/clinics/doctor/prescription', 'Admin\ClinichistoryController@storePrescription');
    Route::post('/clinics/doctor/management', 'Admin\ClinichistoryController@storeManagement');
    Route::post('/clinics/doctor/diagnosis', 'Admin\ClinichistoryController@storeDiagnosis');
<<<<<<< HEAD
    Route::post('/clinics/doctor/allergy', 'Admin\ClinichistoryController@storeAllergy');
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    Route::get('/clinics/pharmacy/{id}', 'Admin\ClinichistoryController@viewPatientsForPharmacy');
    Route::get('/clinics/lab/{id}', 'Admin\ClinichistoryController@viewPatientsForLaboratory');
    Route::post('/clinics/lab', 'Admin\ClinichistoryController@storeLab');
    Route::put('/clinics/lab/{id}', 'Admin\ClinichistoryController@updateLab');
<<<<<<< HEAD
    Route::delete('/clinics/prescription/{id}', 'Admin\ClinichistoryController@destroyPrescription');
    Route::post('dispense', ['as' => 'dispense', 'uses' =>'Admin\ClinichistoryController@addDrugToDispensed']);
    Route::patch('discontinue', ['as' => 'discontinue', 'uses' =>'Admin\ClinichistoryController@updateDiscontinue']);
   
    Route::get('/medicalcalculator', function(){
        return view('admin.clinics.calculator');
    });
    
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    //pharmacy
    Route::resource('pharmacy', 'Admin\PharmacyController');
    Route::post('pharmacy_mass_destroy', ['uses' => 'Admin\PharmacyController@massDestroy', 'as' => 'pharmacy.mass_destroy']);
    Route::get('/getDrugs', 'Admin\PharmacyController@getDrugs');
<<<<<<< HEAD
    Route::get('/expireDrug', 'Admin\PharmacyController@expireDrugs');
    Route::get('/dispense', 'Admin\PharmacyController@allDispenseDrug');
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    //Procedure
    Route::resource('procedure', 'Admin\ProcedureController');
    Route::post('procedure_mass_destroy', ['uses' => 'Admin\ProcedureController@massDestroy', 'as' => 'procedure.mass_destroy']);
    Route::get('/pros', 'Admin\ProcedureController@show');
    // summary
    Route::get('/clinics/summary/{id}', 'Admin\ClinichistoryController@viewSummary');

    //Notification
<<<<<<< HEAD
    //Route::resource('notifications', 'Admin\NotificationController');
    Route::get('/unreadnotifications', 'Admin\NotificationController@unreadNotification');
    Route::put('/markAsRead', 'Admin\NotificationController@markAsRead');
=======
    Route::resource('notifications', 'Admin\NotificationController');
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    //Laboratory
    Route::resource('laboratories', 'Admin\LaboratoryController');
    Route::post('lab_mass_destroy', ['uses' => 'Admin\LaboratoryController@massDestroy', 'as' => 'lab.mass_destroy']);
    Route::get('/labs', 'Admin\LaboratoryController@show');
<<<<<<< HEAD
    Route::get('getfileUpload', ['as'=>'getfileUpload','uses'=>'Admin\LaboratoryController@getFileUpload']);
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    //Billings
    Route::resource('billings', 'Admin\BillingController');
    Route::get('/billings/view/{id}', 'Admin\BillingController@view');
    Route::get('/currentMonthly', 'Admin\BillingController@getCurrentbillMonth');
    Route::get('/lastMonthly', 'Admin\BillingController@getLastbillMonth');
<<<<<<< HEAD
    Route::get('/outstandingBalance', 'Admin\BillingController@getOutstandingBalance');
    Route::patch('/makeOutstandingPayment', 'Admin\BillingController@makeOutstandingPayment');
    Route::get('/family', 'Admin\BillingController@getFamily');
    Route::post('/familydeposit', 'Admin\BillingController@createFamilyDeposit');
    Route::get('/familyAccountAmount', 'Admin\BillingController@getFamilyAccountDeposits');
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    //Surgeries
    Route::get('/surgeries/index/{id}', 'Admin\SurgeryController@index');
    Route::get('/surgeries/nurse/{id}', 'Admin\SurgeryController@nursepage');
    Route::post('/surgeries/preoperative', 'Admin\SurgeryController@storePreOperative');
    Route::post('/surgeries/intraoperative', 'Admin\SurgeryController@storeIntraOperative');
    Route::post('/surgeries/operative', 'Admin\SurgeryController@storeOperative');
    Route::post('/surgeries/postoperative', 'Admin\SurgeryController@storePostOperative');
    Route::post('/surgeries/postoperativeorder', 'Admin\SurgeryController@storePostOperativeOrder');
<<<<<<< HEAD
     Route::post('/surgeries/prescription', 'Admin\SurgeryController@storePrescription');
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    //Antenatal 
    Route::get('/antenatal/index/{id}', 'Admin\AntenatalController@index');
    Route::get('/antenatal/nurse/{id}', 'Admin\AntenatalController@nursepage');
    Route::post('/antenatal/antenatal', 'Admin\AntenatalController@storeAntenatal');
    Route::post('/antenatal/visits', 'Admin\AntenatalController@storeAntenatalVisits');
<<<<<<< HEAD
    Route::put('/antenatal/visits/{id}', 'Admin\AntenatalController@updateAntenatalVisits');
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    //Labour
    Route::get('/labour/index/{id}', 'Admin\LabourController@index');
    Route::get('/labour/nurse/{id}', 'Admin\LabourController@nursepage');
    Route::post('/labour/labour', 'Admin\LabourController@storeLabour');
    Route::post('/labour/signs', 'Admin\LabourController@storeSigns');
    Route::post('/labour/reviews', 'Admin\LabourController@storeReviews');
    Route::post('/labour/postdelivery', 'Admin\LabourController@storePostDelivery');
<<<<<<< HEAD
    Route::post('/labour/prescription', 'Admin\LabourController@storePrescription');
    Route::get('birthrecords', 'Admin\LabourController@getBirthRecords');
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    //HMO
    Route::resource('hmos', 'Admin\HmoController');
    Route::post('importfileDrug', ['as' => 'importfileDrug', 'uses' =>'Admin\HmoController@importfileDrug']);
    Route::post('importfileProcedure', ['as' => 'importfileProcedure', 'uses' =>'Admin\HmoController@importfileProcedure']);
    Route::post('importfileLab', ['as' => 'importfileLab', 'uses' =>'Admin\HmoController@importfileLab']);
    Route::post('addPlan', ['as' => 'addPlan', 'uses' =>'Admin\HmoController@addPlan']);
    Route::get('getPlan', ['as' => 'getplan', 'uses' =>'Admin\HmoController@getPlan']);
<<<<<<< HEAD
    Route::get('authcode', ['as' => 'authcode', 'uses' =>'Admin\HmoController@getAuthCode']);
    Route::post('authcode', ['as' => 'authcode', 'uses' =>'Admin\HmoController@saveAuthCode']);
    Route::get('logAuthCode', ['as' => 'authcode', 'uses' =>'Admin\HmoController@getlogAuthCode']);

    //STAT
    Route::get('getStat', ['as' => 'getStat', 'uses' =>'Admin\StatController@getStat']);
    Route::get('getStatProcedure', ['as' => 'getStatProcedure', 'uses' =>'Admin\StatController@getStatProcedure']);
    Route::get('getStatLab', ['as' => 'getStatLab', 'uses' =>'Admin\StatController@getStatLab']);
    Route::get('getAllPatients', ['as' => 'getAllPatients', 'uses' =>'Admin\StatController@getAllPatients']);
    Route::get('getAllPatientsOnAdmission', ['as' => 'getAllPatientsOnAdmission', 'uses' =>'Admin\StatController@getAllPatientsOnAdmission']);
    
    //Upload lab
    Route::post('fileUpload', ['as'=>'fileUpload','uses'=>'Admin\ClinichistoryController@fileUpload']);

    //Admission
    Route::post('/storeAdmission', 'Admin\ClinichistoryController@storeAdmission');

    //check Balance status
    Route::get('checkBalanceStatus', ['as' => 'checkBalanceStatus', 'uses' =>'HomeController@checkBalanceStatus']);

    // Expenditure 
    Route::resource('expenditure', 'Admin\ExpenditureController');
    Route::post('/expenditure/payment', 'Admin\ExpenditureController@storePayment');
    Route::post('/expenditure/monthly', 'Admin\ExpenditureController@getAllExpenditureInMonth');
    Route::delete('/payment/{id}', 'Admin\ExpenditureController@destroyPayment');
    Route::get('payrolls', ['as' => 'payrolls', 'uses' =>'Admin\ExpenditureController@getMonthlyPayroll']);
    Route::get('reconcillations', ['as' => 'reconcillations', 'uses' =>'Admin\ExpenditureController@getReconcillation']);
    Route::post('reconcillations', ['as' => 'reconcillations', 'uses' =>'Admin\ExpenditureController@storeReconcillation']);
    Route::put('updateReconcillation', ['as' => 'updateReconcillation', 'uses' =>'Admin\ExpenditureController@updateReconcillation']);
    Route::get('cashbook', ['as' => 'cashbook', 'uses' =>'Admin\ExpenditureController@getCashBook']);
    Route::put('updateAmountReceived', ['as' => 'updateAmountReceived', 'uses' =>'Admin\ExpenditureController@updateCashBook']);
    Route::get('cashbooklog', ['as' => 'cashbooklog', 'uses' =>'Admin\ExpenditureController@getCashBookLog']);

    //Incomes
    Route::get('/allIncomes', 'Admin\ExpenditureController@getAllIncomes');
    Route::post('/allIncomesPerMonth', 'Admin\ExpenditureController@getAllIncomeInMonth');

    // Account
    Route::get('/accountPayable', 'Admin\ExpenditureController@getAccountPayable');
    Route::get('/accountReceiveable', 'Admin\ExpenditureController@getAccountReceiveable');
    Route::get('/hmoReceiveable', 'Admin\ExpenditureController@getHmoAccountReceiveable');
    Route::get('/familyAccountDeposits', 'Admin\ExpenditureController@getFamilyAccountDeposits');

    // Store 
    Route::resource('store', 'Admin\StoreController');
    Route::put('updateStore', ['as' => 'updateStore', 'uses' =>'Admin\StoreController@updateStore']);
    Route::get('showOutOfStock', ['as' => 'showOutOfStock', 'uses' =>'Admin\StoreController@showOutOfStock']);
    Route::get('showDrugLog', ['as' => 'showDrugLog', 'uses' =>'Admin\StoreController@showDrugLog']);
    Route::get('showMovement', ['as' => 'showMovement', 'uses' =>'Admin\StoreController@showInventoryMovement']);
    Route::post('storeMovement', ['as' => 'storeMovement', 'uses' =>'Admin\StoreController@storeInventoryMovement']);
     Route::put('updateMovement', ['as' => 'updateMovement', 'uses' =>'Admin\StoreController@updateInventoryMovement']);


    // Human Resource
     Route::resource('humanresource', 'Admin\HumanresourceController');
     Route::get('payroll', ['as' => 'payroll', 'uses' =>'Admin\HumanresourceController@getPayrolls']);
     Route::get('/leaveslogs', 'Admin\HumanresourceController@getAllLeavesRecords');
     Route::get('/terminatelogs', 'Admin\HumanresourceController@getAllTerminatedRecords');
     Route::get('/pensionlogs', 'Admin\HumanresourceController@getAllPensionRecords');
     Route::post('/leave', 'Admin\HumanresourceController@createLeave');
     Route::post('/pension', 'Admin\HumanresourceController@createPension');
     Route::post('/terminatelogs', 'Admin\HumanresourceController@createTerminate');


    //  Route::post('/changeLeave', 'Admin\HumanresourceControllerr@updateLeave');
     Route::post('changeLeave', ['as' => 'changeLeave', 'uses' =>'Admin\HumanresourceController@updateLeave']);
    
     //Performamce Appraisal
    Route::resource('performance', 'Admin\PerformancesController');
    Route::get('/index', 'Admin\PerformancesController@index');
    Route::get('/appraisal', 'Admin\PerformancesController@show');
    
    //Talent Management
    Route::resource('talent', 'Admin\TalentsController');
    Route::get('/index', 'Admin\TalentsController@index');
    Route::get('/talent/planning', 'Admin\TalentsController@show');
    Route::get('/interview/index', 'Admin\InterviewsController@index');
    

    //Training and Development
    Route::resource('development', 'Admin\TrainingsController');
    Route::get('/index', 'Admin\TrainingsController@index');

    //Promotion
    Route::resource('promotion', 'Admin\PromotionsController');
    Route::get('/index', 'Admin\PromotionsController@index');
 

    //Manpower Reports
    Route::resource('manpower', 'Admin\ManpowersController');
    Route::get('/index', 'Admin\ManpowersController@index');
    

     //Staff Document
    Route::post('staffdocument', ['as'=>'staffdocument','uses'=>'Admin\HumanresourceController@staffDocuments']);

    //Requisition
    Route::resource('requisition', 'Admin\RequisitionController');
    Route::put('updateQuantity', ['as' => 'updateQuantity', 'uses' =>'Admin\RequisitionController@updateQuantity']);
    Route::post('/updateApproval', 'Admin\RequisitionController@updateApproval');
    Route::get('/logApproval', 'Admin\RequisitionController@logApproval');

    //charts
    Route::get('/charts/index', 'Admin\ChartsController@index');




=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
});


