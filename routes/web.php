<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PagesComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\SingleblogComponent;
use App\Http\Livewire\CatelistComponent;
use App\Http\Livewire\TaglistComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\SliderComponent;
use App\Http\Livewire\Admin\PageComponent;
use App\Http\Livewire\Admin\PagecreateComponent;
use App\Http\Livewire\Admin\PageupdateComponent;
use App\Http\Livewire\Admin\PostComponent;
use App\Http\Livewire\Admin\PostcreateComponent;
use App\Http\Livewire\Admin\PostupdateComponent;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\OpinionComponent;

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



Route::get('/', HomeComponent::class)->name('home');
Route::get('/page/{slug}', PagesComponent::class)->name('page');
Route::get('/blog', BlogComponent::class)->name('blog');
Route::get('/blog/{slug}', SingleblogComponent::class)->name('blog.details');
Route::get('/category/{cate_slug}', CatelistComponent::class)->name('category.list');
Route::get('/tag/{tag_slug}', TaglistComponent::class)->name('tag.list');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });


//admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function() {
	Route::get('/admin', DashboardComponent::class)->name('admin.dashboard');
     Route::get('/dashboard', DashboardComponent::class)->name('admin.dashboard');
     Route::get('/admin/slider', SliderComponent::class)->name('admin.slider');
     Route::get('/admin/page', PageComponent::class)->name('admin.page');
     Route::get('/admin/pagecreate', PagecreateComponent::class)->name('admin.pagecreate');
     Route::get('/admin/pageupdate/{id}', PageupdateComponent::class)->name('admin.pageupdate');
     Route::get('/admin/post', PostComponent::class)->name('admin.post');
     Route::get('/admin/postcreate', PostcreateComponent::class)->name('admin.postcreate');
     Route::get('/admin/postupdate/{id}', PostupdateComponent::class)->name('admin.postupdate');
     Route::get('/admin/cate', CategoryComponent::class)->name('admin.cate');
     Route::get('/admin/opinion', OpinionComponent::class)->name('admin.opinion');
});
