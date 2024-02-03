<?php

use App\Http\Controllers\HomebaseController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'admin/home');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/myprofile', 'HomeController@myProfile')->name('myprofile');
    Route::get('/updateprofile', 'HomeController@updateProfile')->name('updateprofile');
    Route::post('/saveprofile', 'HomeController@saveProfile')->name('saveprofile');

    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
    Route::get('/user/view_users_pin','Admin\UsersController@usersPin')->name('user.pin');
    Route::get('/user/set_users_pin/{user}','Admin\UsersController@setPIN')->name('user.set-pin');
    Route::post('/user/update_users_pin/{user}','Admin\UsersController@updatePIN')->name('user.update-pin');
    Route::get('/user/set_users_birthday','Admin\UsersController@setBirthday')->name('user.set-birthday');
    Route::post('/user/update_users_birthday','Admin\UsersController@updateBirthday')->name('user.update-birthday');
    Route::resource('scan-logs', 'ScanlogController');
    Route::get('/scan-log/detail/', 'ScanlogController@detailData')->name('scanlogs.detail');
    Route::get('/scan-log/detail/filter', 'ScanlogController@detailDataFilter')->name('scanlogs.detail.filter');
    Route::get('/scan-log/print', 'ScanlogController@print')->name('scanlogs.print');
    Route::get('/scan-log/print/result', 'ScanlogController@printResult')->name('scanlogs.print.result');
    Route::get('/scan-log/filter/', 'ScanlogController@filterDate')->name('scanlogs.search');
    Route::get('/presensi','ScanlogController@presensi')->name('presensi');   
    Route::get('/scan-log/myattendances','ScanlogController@myAttendances')->name('scan-log.my-attendances');
    Route::get('/scan-log/myattendancesfilter/','ScanlogController@myAttendancesFilter')->name('scan-log.my-attendances-filter');
    Route::get('/scan-log/view_request_attendances_filter/','ScanlogController@filterRequestAttendances')->name('scan-log.request-attendances-filter');
    Route::get('scan-log/request_attendances/','ScanlogController@requestAttendances')->name('scan-log.request-attendances');
    Route::post('scan-log/request_attendances_store/','ScanlogController@requestAttendanceStore')->name('scan-log.request-attendances-store');
    Route::post('/scan-log/request_attendances_process/{request}','ScanlogController@processRequest')->name('scan-log.request-attendances-process');
    Route::post('/scan-log/request_attendances_reject/{request}','ScanlogController@rejectRequest')->name('scan-log.request-attendances-reject');
    Route::get('/scan-log/view_request_attendances/','ScanlogController@viewRequestAttendances')->name('scan-log.view-request-attendances');
    Route::get('/scan-log/check_attendances/','ScanlogController@checkAttendance')->name('scan-log.check-attendances');
    Route::get('/scan-log/check_attendances_filter/','ScanlogController@checkAttendanceFilter')->name('scan-log.check-attendances-filter');

    //Route activities
    Route::resource('activities', 'ActivityController');
    //End Route activities
    //Route homebases
    Route::resource('homebases', 'HomebaseController');
    //End Route homebases
    //Route departmens
    Route::resource('departmens', 'DepartmenController');
    //End Route departmens
    //Route university
    Route::resource('universities', 'UniversityController');
    //End Route university
    //Route study_programs
    Route::resource('study-programs', 'StudyProgramController');
    //End Route study_programs
    //Route level
    Route::resource('levels', 'LevelController');
    //End Route level
    //Route knowledges
    Route::resource('knowledges', 'KnowledgeController');
    //End Route knowledges
    //Route functional_positions
    Route::resource('functional-positions', 'FunctionalPositionController');
    //End Route functional_ranks
    //Route functional_positions
    Route::resource('functional-ranks', 'FunctionalRankController');
    //End Route functional_ranks
    //Route certificate-types
    Route::resource('certificate-types', 'CertificateTypeController');
    //End Route certificate-types
    //Route educational-staffs
    Route::resource('educational-staffs', 'EducationalStaffController');
    Route::get('/educational-staff/inactive/', 'EducationalStaffController@inactive')->name('educational-staff.inactive');
    Route::post('/educational-staff/setstatus/', 'EducationalStaffController@setStatus')->name('educational-staff.setstatus');
    //End Route educational-staffs
    //Route Educational Staff Education
    Route::resource('educational-staff-educations', 'EducationalStaffEducationController');
    //End Route Educational Staff Education
    //Route Educational Staff Certificate
    Route::resource('educational-staff-certificates', 'EducationalStaffCertificateController');
    //End Route Educational Staff Certificate
    //Route Lecturer
    Route::resource('lecturers', 'LecturerController');
    Route::get('/lecturer/inactive/', 'LecturerController@inactive')->name('lecturer.inactive');
    Route::post('/lecturer/setstatus/', 'LecturerController@setStatus')->name('lecturer.setstatus');
    //End Route Lecturer
    //Route Lecturer Education
    Route::resource('lecturer-educations', 'LecturerEducationController');
    //End Route Lecturer Education
    //Route Lecturer Certificate
    Route::resource('lecturer-certificates', 'LecturerCertificateController');
    //End Route Lecturer Certificate
    //Route Inpassings
    Route::resource('inpassings', 'InpassingController');
    //End Route Inpassings
    //Route Lecturer Functional Position
    Route::resource('lecturer-functional-positions', 'LecturerFunctionalPositionController');
    //End Route Lecturer Functional Position
    //Route Scan Logs Extra
    Route::resource('scan-logs-extras','ScanLogsExtraController');
    Route::get('/scan-log-extra/filter/','ScanLogsExtraController@filter')->name('scan-log-extra.filter');
    //End route Scan Logs Extra
    //Route Willingness
    Route::resource('willingnesses','WillingnessController');
    Route::get('/willingness/set_time/{user}','WillingnessController@setTime')->name('willingness.setTime');
    Route::get('/willingness/get_time/{user}','WillingnessController@getTime')->name('willingness.getTime');
    Route::post('/willingness/store_time/','WillingnessController@storeTime')->name('willingness.storeTime');
    Route::post('/willingness/update_time/','WillingnessController@updateTime')->name('willingness.updateTime');
    Route::post('/willingness/import/','ImportExcelController@importWillingness')->name('willingness.import');
    //End Route Willingness
    //Route Check Late
    Route::get('/scan-log/check-late','ScanlogController@selectPeriodLate')->name('scan-log.selectLate');
    Route::get('/scan-log/result-late','ScanlogController@resultLate')->name('scan-log.resultLate');
    //End Route Check Late
    //Route Holidays
    Route::resource('holidays', 'HolidayController');
    Route::post('/holiday/import/','ImportExcelController@importHolidays')->name('holidays.import');
    Route::delete('/holiday/bulk-destroy-last/', 'HolidayController@destroyLastYear')->name('holidays.destroy-last-year');
    Route::delete('/holiday/bulk-destroy-current/', 'HolidayController@destroyCurrentYear')->name('holidays.destroy-current-year');
    //End Route Holidays
});