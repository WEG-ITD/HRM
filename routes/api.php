<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SidemenuController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PositionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['namespace' => 'Api'], function () {
//     require __DIR__ . '/api/user.php';
// });
Route::post('user/login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('user/logout',[UserController::class, 'logout']);
});

Route::group(['middleware' => ['auth:sanctum','permission:DASHBOARD']], function () {
    Route::get('user/home', [HomeController::class, 'userDashboard']);
});

// Route::group(['middleware' => ['auth:sanctum', 'permission:Branch']], function () {
    // Route::get('')
// });
#region Permission
Route::post('/permissions/update/{Role_id}', [PermissionController::class, 'update'])->name('permissions/update')->can('update','App\Models\Permission');;

#endregion Permission
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('user/addRole', [UserController::class, 'addRole']);
    Route::get('user/removeRole/{roleUser_id}', [UserController::class, 'removeRole']);
    Route::post('user/resetPassword', [UserController::class, 'resetPassword']);
    Route::get('user/{user_id}/roles', [UserController::class, 'getUserRoles']);
    Route::post('/sendmail', [MailController::class, 'sendMail']);
    Route::apiResources([
        'roles'=>RoleController::class,
        'users'=>UserController::class,
        'modules' => ModuleController::class,
        'sidemenus' => SidemenuController::class,
        'branches' => BranchController::class,
        'schools' => SchoolController::class,
        'countries' => CountryController::class,
        'religions' => ReligionController::class,
        'languages' => LanguageController::class,
        'positions' => PositionController::class,
        'certificate-templates' => CertificateController::class,
    ]);
});



Route::group(['middleware' => ['auth:api','permission:PERMISSION']], function () {
    Route::get('permissions/{role_id}', [PermissionController::class, 'get']);
    Route::post('permissions/{role_id}', [PermissionController::class, 'update']);
});

