<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeesController;
use App\Models\Comapany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if(Auth::check() === false){

        return view('login');
    }else{
        return redirect('/dashboard');
    }
});

Route::post('post', function(Request $req){
    $email = $req->email;
    $password = $req->password;
    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        return redirect()->intended('/company-show');

    }else{
        return "<script>alert('Invalid Username or Password')</script>";
    }

});
Route::get('dashboard', function(){
    if(Auth::check() === true){

        return view('dashboard');
    }else{
        return redirect('/');
    }
});

Route::get('logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::get('company-show', [CompanyController::class, 'index']);
Route::get('add-company', [CompanyController::class, 'create']);
Route::post('store-company', [CompanyController::class, 'store']);
Route::get('edit-company/{company}', [CompanyController::class, 'edit']);
Route::post('update-company/{id}', [CompanyController::class, 'update']);
Route::get('delete-company/{id}', [CompanyController::class, 'destroy']);


Route::get('employees-show', [EmployeesController::class, 'index']);
Route::get('add-employees', [EmployeesController::class, 'create']);
Route::post('store-employees', [EmployeesController::class, 'store']);
Route::get('edit-employees/{employees}', [EmployeesController::class, 'edit']);
Route::post('update-employees/{id}', [EmployeesController::class, 'update']);
Route::get('delete-employees/{id}', [EmployeesController::class, 'destroy']);
