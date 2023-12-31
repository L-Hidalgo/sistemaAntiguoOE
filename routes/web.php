<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
//Nuestro
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\ImportImagesController;
//use App\Http\Controllers\BuscarDatosImportadosController;
use App\Http\Controllers\RegistrarUsuarioController;
use App\Http\Controllers\IncorporacionesController;
use App\Http\Controllers\CambioItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');



    Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');

	Route::get('/permisos', [UserProfileController::class, 'index'])->name('permisos');

	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
    Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    //Links de Vista Planilla
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

	Route::post('/importaciones', [ExcelImportController::class, 'importExcel'])->name('importaciones')->middleware('auth');
	Route::post('/importar-imagenes', [ImportImagesController::class, 'importImagenes'])->name('importar.imagenes')->middleware('auth');
    Route::get( '/imagen-persona/{personaId}', [ImportImagesController::class, 'getImagenPersona'])->name('imagen-persona')->middleware('auth');
	//Route::get('/buscar-importados', [BuscarDatosImportadosController::class, 'buscarDatosImportados'])->name('importaciones.buscar')->middleware('auth');

	//Links de vista Usuarios
	Route::get('/usuarios', [RegistrarUsuarioController::class, 'mostrarUsuarios'])->name('usuarios'); //mostrar
	Route::post('/registrar', [RegistrarUsuarioController::class, 'registrar'])->name('registrar');

	//Links de Incorporaciones 
	Route::get('/incorporaciones', [IncorporacionesController::class, 'mostarIncorporaciones'])->name('incorporaciones')->middleware('auth');
	//Route::get('/registrar-cambio-de-item', [CambioItemController::class, 'mostrarCambioDeItem'])->name('registrarCambioDeItem');



});
