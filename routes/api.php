<?php 
use App\Http\Controllers\API\MovieApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('movies')->group(function () {
    Route::get('/', [MovieApiController::class, 'index']);
    Route::get('/{id}', [MovieApiController::class, 'show']);
    Route::post('/', [MovieApiController::class, 'store']);
    Route::put('/{id}', [MovieApiController::class, 'update']);
    Route::delete('/{id}', [MovieApiController::class, 'destroy']);
    Route::get('/search', [MovieApiController::class, 'search']);
});
