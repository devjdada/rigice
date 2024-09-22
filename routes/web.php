<?php

use App\Livewire\About\AboutPage;
use App\Livewire\Blog\BlogPage;
use App\Livewire\Blog\EditBlog;
use App\Livewire\Blog\NewBlog;
use App\Livewire\Contact\ContactPage;
use App\Livewire\Project\EditProject;
use App\Livewire\Project\NewProject;
use App\Livewire\Project\ProjectDetail;
use App\Livewire\Project\ProjectPage;
use App\Livewire\Service\EditService;
use App\Livewire\Service\NewService;
use App\Livewire\Service\ServiceDetail;
use App\Livewire\Service\ServicePage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('coming-soon');
});
Route::get('about', AboutPage::class)->name('about');
Route::get('contact', ContactPage::class)->name('contact');
Route::get('services', ServicePage::class)->name('services');
Route::get('service/[slug]', ServiceDetail::class)->name('service');
Route::get('blogs', BlogPage::class)->name('blogs');
Route::get('blog/[slug]', ServiceDetail::class)->name('blog');
Route::get('projects', ProjectPage::class)->name('projects');
Route::get('project/[slug]', ProjectDetail::class)->name('project');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('new-service', NewService::class)->name('new-service');
    Route::get('edit-service/[slug]', EditService::class)->name('edit-service');

    Route::get('new-blog', NewBlog::class)->name('new-blog');
    Route::get('edit-blog/[slug]', EditBlog::class)->name('edit-blog');

    Route::get('new-project', NewProject::class)->name('new-project');
    Route::get('edit-project/[slug]', EditProject::class)->name('edit-project');
});
