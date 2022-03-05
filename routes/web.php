<?php

use App\Http\Controllers\DashboardMenuController;
use App\Models\Menu;
use App\Models\Pegawai;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PembelianController;

use function GuzzleHttp\Promise\all;

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
    return view('dashboard.index', [
        "title" => "Cofflux | Dashboard"
    ]);
});


Route::get('/about', function () {
    return view('dashboard.about', [
        "title" => "Cofflux | About",
        "name" => "Eko Setyono Wibowo",
        "email" => "webowoma11@gmail.com",
        "image" => "img/webowo.jpeg"
    ]);
})->name("about");




// Halaman All menu
route::get('/menus', [MenuController::class, 'index']);

// Halaman Single Menu
Route::get('/menus/{menu:slug}', [MenuController::class, 'show']);


// Halaman Single Category
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('menus', [
        'title' => $category->name,
        'menus' => $category->menus,
        'category' => $category->name
    ]);
});


// Halaman Categories
Route::get('/categories', function () {
    return view('categories', [
        'title' => "Cofflux | Categories",
        'categories' => Category::All()
    ]);
});


// Halaman Barista
Route::get('/barista/{pegawai:username}', function (Pegawai $pegawai) {
    return view('menus', [
        'title' => "Cofflux | Barista",
        // 'topline' => "Barista : $pegawai->pembuat",
        'menus' => $pegawai->menus->load('category', 'pegawai')->paginate(7),
        // 'menus' => Pegawai::all()->paginate(10)
    ]);
});


// Name Berfungsi Untuk menama Route
// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Route Auth Login
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route Register 
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Route Store data register
Route::post('/register', [RegisterController::class, 'store']);


// Route Dashboard
Route::get('/dashboard', function () {
    return view('dashboardAdmin.index');
})->middleware('auth');

// Route Resource DashboardAdmin Menu Page
Route::resource('/dashboard/menus', DashboardMenuController::class)->middleware('auth');

// Route Resource DashboardAdmin User Page
Route::resource('/dashboard/users', DataUserController::class)->middleware('auth');

// Route Resource DashboardAdmin Transaksi Page
Route::resource('/dashboard/transaksis', TransaksiController::class)->middleware('auth');

Route::resource('/transaksi', PembelianController::class)->middleware('auth');








// Route Get checkSlug Untuk Sluggable
Route::get('/dashboard/menus/checkSlug', [DashboardMenuController::class, 'checkSlug'])->middleware('auth');
