<?php

use App\Http\Controllers\HomebaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
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
});