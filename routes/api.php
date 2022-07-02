<?php

use App\Http\Controllers\VaccinationController;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HajInfoController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\PersonWithHajController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SosController;
use App\Http\Controllers\TafwijController;
use App\Http\Controllers\Taskin;
use App\Http\Controllers\UserInfo;
use App\Http\Controllers\UserInfoController;
use App\Models\PersonWithHaj;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ForgotPasswordController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\CompanionController;
use App\Http\Controllers\HajAppController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\PassportInfoController;
use App\Http\Controllers\TaskinController;
use App\Models\CompanyAccount;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('password/forgot-password', [ForgotPasswordController::class, 'sendResetLinkResponse'])->name('passwords.sent');
Route::post('password/reset', [ResetPasswordController::class, 'sendResetResponse'])->name('passwords.reset');

Route::apiResource('indexVaccination', 'App\Http\Controllers\VaccinationController');
Route::post('/login', [RegisterController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/getUserInfo', [UserInfoController::class, 'getUserInfo']);
//getCompanyInfoByUserId
Route::get('/getCompanyInfo', [CompanyController::class, 'getCompanyInfo']);
Route::get('/getCompanyInfoByUserId', [CompanyController::class, 'getCompanyInfoByUserId']);

Route::post('/createCompany', [CompanyController::class, 'createCompany']);
Route::get('/getAllCompanyNames', [CompanyController::class, 'getAllCompanyNames']);

Route::post('/createRating', [RatingController::class, 'createRating']);

Route::post('/createApp', [HajAppController::class, 'createApp']);
Route::get('/getAppBySid', [HajAppController::class, 'getAppBySid']);

Route::post('/createPassportInfo', [PassportInfoController::class, 'createPassportInfo']);
Route::post('/createSos', [SosController::class, 'createSos']);

Route::post('/addCompanion', [CompanionController::class, 'addCompanion']);
Route::get('/getALLCompanionWithHaj', [CompanionController::class, 'getALLCompanionWithHaj']);

Route::get('/getBuildingData', [TaskinController::class, 'getBuildingData']);
Route::get('/getTafwijInfo', [TafwijController::class, 'getTafwijInfo']);
Route::get('/getAllHajAppByCompanyId', [HajAppController::class, 'getAllHajAppByCompanyId']);
Route::get('/getAllSOSByCompanyId', [SosController::class, 'getAllSOSByCompanyId']);
Route::get('/countOfSos', [SosController::class, 'countOfSos']);
Route::get('/getAllSos', [SosController::class, 'getAllSos']);

Route::get('/countOfHajApp', [HajAppController::class, 'countOfHajApp']);
Route::get('/getAllAcceptedPilgrims', [MinistryController::class, 'getAllAcceptedPilgrims']);

Route::get('/test',function(){
    dd('I am online');
});

Route::get('removeCompanion', [CompanionController::class, 'delete']);
Route::get('removeSos', [SosController::class, 'delete']);
Route::post('notifyUser', [UserInfoController::class, 'notifyUser']);
Route::post('/update/{id}', [CompanyController::class, 'update']);