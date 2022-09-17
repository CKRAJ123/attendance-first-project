<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('user_details', [AuthController::class,'userDetails']);
Route::get('parking_details', [AuthController::class,'parkingDetails']);
Route::get('wfh_details', [AuthController::class,'wfhDetails']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/accept/{id}', [AuthController::class, 'accept'])->name('accept');
Route::get('reject/{id}', [AuthController::class, 'reject'])->name('reject');
Route::get('office', [AuthController::class, 'office'])->name('office');
Route::post('store', [AuthController::class, 'store'])->name('store');
// Route::get('reject/{id}' , function($id) {
//     return response()->json( ['id' => $id] , 200 );
// } );

// Route::get('reject/{id}', [
//     "uses" => 'AuthController@reject',
//     "as" => 'reject'
// ]);