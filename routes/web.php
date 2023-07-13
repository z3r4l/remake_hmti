<?php

use App\Exceptions\Handler;
use App\Http\Controllers\Backend\DashboardCategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DashboardDivisiController;
use App\Http\Controllers\Backend\DashboardPostController;
use App\Http\Controllers\Backend\DashboardProfileController;
use App\Http\Controllers\Backend\DashboardRepositoryContentController;
use App\Http\Controllers\Backend\DashboardRepositoryController;
use App\Http\Controllers\Backend\DashboardStrukturController;
use App\Http\Controllers\Backend\DashboardUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Frontend\ClientController;
use App\Http\Controllers\StrukturController;
use App\Jobs\SendWarnEmailToUser;
use App\View\Components\ClientLayouts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//     // SendWarnEmailToUser::dispatch();
//     // // (new SendWarnEmailToUser())->handle();
//     return view('welcome');
// });

//************************************************** Start Page Frontend **************************************************//
Route::get('/', [ClientController::class, 'index'])->name('beranda');
Route::get('/tentang', [ClientController::class, 'tentang'])->name('tentang');
Route::get('/struktur', [ClientController::class,'struktur'])->name('struktur');
// Route::get('/kegiatan', [ClientController::class,'kegiatan'])->name('kegiatan');
Route::get('/kegiatan', [ClientController::class, 'loadOnScroll']);
Route::get('/posts/{post}', [ClientController::class,'post'])->name('post');
Route::get('/categories/{category:slug}', [ClientController::class, 'categoryLoadOnScroll'])->name('category');
Route::get('/lainnya/hubungi-kami', [ClientController::class,'kritikSaran'])->name('kritikSaran');
Route::get('/lainnya/repository', [ClientController::class, 'repository'])->name('repository');
Route::get('/lainnya/{repository}/repositoryContent', [ClientController::class, 'repositoryContent'])->name('repository.content');
Route::get('/divisi/{divisi}', [ClientController::class, 'divisiIndex'])->name('divisi');

Route::group(['middleware'=> ['auth']], function(){
    // Route Halaman Comentar
        Route::post('/post/comments', [CommentController::class, 'store'])->name('comments.store');
});
//************************************************** End Page Frontend **************************************************//

//************************************************** Start Page Backend **************************************************//
Auth::routes(['verify'  => true]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'  =>['is_admin', 'auth']], function(){
    
    // Route Halaman Dashboard
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    // Route Halaman Dashboard Post
        Route::resource('/dashboard/post', DashboardPostController::class, ['names'  => 'dashboard.posts']);
    // Route Halaman Dashboard Category
        Route::resource('/dashboard/category', DashboardCategoryController::class, ['names'  => 'dashboard.category'])->except('show');
    // Route Halaman Dashboard Struktur
        Route::resource('/dashboard/struktur', DashboardStrukturController::class, ['names'   => 'dashboard.struktur'])->except('show');
    // Route Halaman Dashboard Divisi
        Route::resource('/dashboard/divisi', DashboardDivisiController::class, ['names'   => 'dashboard.divisi'])->except('show');
    // Route Halaman Repository
        Route::resource('/dashboard/repository', DashboardRepositoryController::class, ['names'   => 'dashboard.repository'])->except('show');
    // Route Halaman Repositroy Content
        // Route::resource('/dashboard/repository/content', DashboardRepositoryContentController::class, ['names'   => 'dashboard.repository.content'])->except('show');
        Route::get('/dashboard/repository/content/{repository}', [DashboardRepositoryContentController::class, 'index'])->name('dashboard.repository.content.index');
        Route::post('/dashboard/repository/content/{repository}', [DashboardRepositoryContentController::class, 'store'])->name('dashboard.repository.content.store');
        Route::get('/dashboard/repository/content/table/{repository}', [DashboardRepositoryContentController::class, 'table'])->name('dashboard.repository.content.table');
        Route::get('/dashboard/repository/content/{repositoryContent}/{repository}/edit', [DashboardRepositoryContentController::class, 'edit'])->name('dashboard.repository.content.edit');
        Route::put('/dashboard/repository/content/{repositoryContent}/{repository}', [DashboardRepositoryContentController::class, 'update'])->name('dashboard.repository.content.update');
        Route::delete('/dashboard/repository/content/{repositoryContent}', [DashboardRepositoryContentController::class, 'destroy'])->name('dashboard.repository.content.destroy');
    // Route Halaman User
        Route::resource('/dashboard/user', DashboardUserController::class, [ 'names'    => 'dashboard.user'])->except('show');
    // Route Halaman Profile
        Route::get('/dashboard/{user}/profile', [DashboardProfileController::class,'index'])->name('dashboard.profile.index');
        Route::put('/password/{user}/change-password', [DashboardProfileController::class, 'changePassword'])->name('password.change');
});
//************************************************** End Page Backend **************************************************//

