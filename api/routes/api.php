<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\LoyaltyCardEmployeeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseProductController;
use App\Http\Controllers\ReferentController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SubEnterpriseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Resources\SubEnterpriseClient;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['api', 'auth:api'])->prefix('req')->group(function () {
    Route::apiResources([
        'bill' => BillController::class,
        'category' => CategoryController::class,
        'department' => DepartmentController::class,
        'enterprise' => EnterpriseController::class,
        'loyalty_card_employee' => LoyaltyCardEmployeeController::class,
        'partner' => PartnerController::class,
        'product' => ProductController::class,
        'purchase' => PurchaseController::class,
        'purchase_product' => PurchaseProductController::class,
        'referent' => ReferentController::class,
        'stock' => StockController::class,
        'sub_enterprise_client' => SubEnterpriseClient::class,
        'sub_enterprise' => SubEnterpriseController::class,
        'warehouse' => WarehouseController::class,
        'user' => UserController::class,
    ]);
});

Route::apiResources([
    'langue' => LangueController::class,
]);

Route::middleware('api')->prefix('auth')->group(function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});
