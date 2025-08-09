<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\FarmController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\WarningController;
use App\Http\Controllers\Api\RecruitmentController;
use App\Http\Controllers\Api\PartnershipController;
use App\Http\Controllers\Api\CashController;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\Api\GoalController;
use App\Http\Controllers\Api\WebhookController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', function(Request $r){ return $r->user(); });

    Route::apiResource('members', MemberController::class);
    Route::apiResource('farms', FarmController::class);
    Route::apiResource('items', ItemController::class);
    Route::apiResource('warnings', WarningController::class);
    Route::apiResource('partnerships', PartnershipController::class);
    Route::apiResource('cash', CashController::class);
    Route::apiResource('warehouse', WarehouseController::class);

    Route::get('recruitments/by-recruiter', [RecruitmentController::class, 'byRecruiter']);
    Route::get('goals/status', [GoalController::class, 'status']);
    Route::post('webhooks/discord', [WebhookController::class, 'discord']);
});
