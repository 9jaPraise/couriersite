<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ParcelController;
use Illuminate\Support\Facades\Auth;
use App\Models\Parcel;
use App\Models\Category;
use App\Models\User;

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
//To welcome Page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/track', [WelcomeController::class, 'search'])->name('track.search');
Route::get('/report', [WelcomeController::class, 'history'])->name('report.history');

//To create branch page
Route::get('/branch/create', [BranchController::class, 'create'])->name('branch.create');

//To save branch clear
Route::post('/branch', [BranchController::class, 'store'])->name('branch.store');

//To branch page
Route::get('/branch', [BranchController::class, 'index'])->name('branch.index');

//To edit branch page
Route::get('/branch/{branch}/edit', [BranchController::class, 'edit'])->name('branch.edit');

//To update branch page
Route::put('/branch/{branch}', [BranchController::class, 'update'])->name('branch.update');

//To delete branch
Route::delete('/branch/{branch}', [BranchController::class, 'destroy'])->name('branch.destroy');


//To create staff page
Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create');

//To save branch clear
Route::post('/staff', [UserController::class, 'store'])->name('staff.store');

//To branch page
Route::get('/staff', [UserController::class, 'index'])->name('staff.index');

//To edit branch page
Route::get('/staff/{user}/edit', [UserController::class, 'edit'])->name('staff.edit');

//To update branch page
Route::put('/staff/{user}', [UserController::class, 'update'])->name('staff.update');

//To delete branch
Route::delete('/staff/{user}', [UserController::class, 'destroy'])->name('staff.destroy');

Route::resource('/parcels', ParcelController::class);

Route::resource('/categories', CategoryController::class);


//login and register
Route::get('/dashboard', function () {
    if(Auth::check()){
        $shipped=Parcel::where('category_id','1')->sum('category_id');
    $transit=Parcel::where('user_id','2')->count();

    }

    return view('dashboard', compact('shipped','transit'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
